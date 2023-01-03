<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Vote;
use App\Models\Voting;
use App\Models\Question;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use Mockery\Matcher\Not;

class VotingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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
    public function post($id, Request $request)
    {
        $votingId = decrypt($id);
        $userId = auth()->user()->id;
        $voting = Voting::where('encrypted_id', '=', $id)
            ->where('close', false)
            ->get();
        $userVoted = Vote::where('voting_id', '=', $votingId)->where('user_id', '=', $userId)->first();
        if (empty($voting[0]) || !is_null($userVoted)) {
            return response()->json(['success' => "Вы уже проголосовали."]);
        } else {
            $userVoices = $request->userVoices;
            foreach ($userVoices as $voice) {
                $questionId = $voice['questionId'];
                $questionVote = $voice['questionVote'];
                Question::where('id', $questionId)
                    ->increment($questionVote);
            }
            $vote = new vote;
            $vote->voting_id = $votingId;
            $vote->user_id = $userId;
            $vote->save();
            if ($vote) {
                return response()->json(['success' => "Ваш голос принят."]);
            } else {
                return response()->json(['errors' => "Произошла ошибка, обратитесь к администратору или повторите попытку."]);
            }
        }
    }
    public function status(Request $request)
    {
        $id = $request->id;
        return tap(Voting::where('id', '=', $id))
            ->update(['close' => DB::raw('not close')])
            ->first();
    }
    public function list()
    {
        $votings = Voting::all();
        $user = auth()->user();
        if ($user->moderator) {
            return view('voting.list', ['votings' => $votings]);
        } else {
            redirect('/');
        }
    }
    public function result($id)
    {
        $votingId = decrypt($id);
        $userId = auth()->user()->id;
        $userVoted = Vote::where('voting_id', '=', $votingId)->where('user_id', '=', $userId)->first();
        $questions = Question::where('voting_id', "=", $votingId)->get();
        if (!empty($voting[0]) || is_null($userVoted)) {
            return redirect('/');
        } else {
            return view('voting.result', ['questions' => $questions]);
        }
    }
}
