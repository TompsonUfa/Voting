<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Vote;
use App\Models\Voting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use App\Services\VotingServices;
use App\Services\QuestionServices;

class VotingController extends Controller
{
    public function index()
    {
        $votings = Voting::orderBy('created_at', 'desc')->get();;
        $user = auth()->user();
        if ($user->moderator || $user->admin) {
            return view('voting.list', ['votings' => $votings]);
        } else {
            redirect('/');
        }
    }

    public function create()
    {
        $user = auth()->user();
        if ($user->moderator || $user->admin) {
            return view('voting.create');
        } else {
            return redirect('/');
        }
    }

    public function store(Request $request, QuestionServices $questionServices)
    {
        if(isset($request->id)){
            $id = $request->id;
            return tap(Voting::where('id', '=', $id))
                ->update(['close' => DB::raw('not close')])
                ->first();
        } else {
            $name = $request->input('voting.name');
            $questions = $request->input('voting.choice');
            $request->request->add(['name' => $name]);
            $request->validate([
                'name' => 'required|string|max:300',
            ]);
            $voting = new Voting;
            $voting->name = $request->name;
            $voting->type = "Тайное голосование";
            $voting->save();
            $voting->encrypted_id = Crypt::encrypt($voting->id);
            $voting->save();
            return $questionServices->store($voting->id, $questions);
        }
    }

    public function show($id)
    {
        $votingId = decrypt($id);
        $userId = auth()->user()->id;
        $voting = DB::table('voting')
            ->where('encrypted_id', '=', $id)
            ->where('close', false)
            ->get();
        $userVoted = Vote::where('voting_id', '=', $votingId)->where('user_id', '=', $userId)->first();
        if (empty($voting[0]) || !is_null($userVoted)) {
            return redirect('/');
        } else {
            $votingId = $voting[0]->id;
            $questions = Question::where('voting_id', "=", $votingId)->get();
            return view('voting.index', ['voting' => $voting, 'questions' => $questions]);
        }
    }

    public function edit($id)
    {
        $user = auth()->user();
        if ($user->moderator || $user->admin) {
            $voting = Voting::find($id);
            $questions = Question::where('voting_id', $id)->get();
            return view('voting.edit', ["voting" => $voting, "questions" => $questions]);
        } else {
            return redirect('/');
        }
    }

    public function update(Request $request, $id ,VotingServices $services, QuestionServices $questionServices)
    {
        $voting = Voting::find($id);
        $name = $request->input('voting.name');
        $questions = $request->input('voting.choice');
        $services->update($voting, $name);
        $questionServices->update($voting, $questions);
        return response()->json(['success' => "Голосование обновлено."]);
    }

    public function destroy($id)
    {
        //
    }

    public function users($id){
        $users = Vote::where('voting_id', $id)->get();
        return view('voting.users', ['users' => $users]);
    }

    public function vote(Request $request, $id , VotingServices $services)
    {
        $votingId = decrypt($id);
        $userId = auth()->user()->id;
        $userVoices = $request->userVoices;
        return $services->vote($votingId,$id, $userId, $userVoices);
    }

    public function result($id)
    {
        $votingId = decrypt($id);
        $userId = auth()->user()->id;
        $userVoted = Vote::where('voting_id', '=', $votingId)->where('user_id', '=', $userId)->first();
        $numberOfVotes = Vote::where('voting_id', '=', $votingId)->count();
        $questions = Question::where('voting_id', "=", $votingId)->get();
        if (!empty($voting[0]) || is_null($userVoted)) {
            return redirect('/');
        } else {
            return view('voting.result', ['questions' => $questions, 'numberOfVotes' => $numberOfVotes]);
        }
    }
}
