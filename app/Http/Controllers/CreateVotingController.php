<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Voting;
use App\Models\Question;
use Illuminate\Support\Facades\Crypt;


class CreateVotingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function show()
    {
        $user = auth()->user();
        if ($user->moderator || $user->admin) {
            return view('create-voting.index');
        } else {
            return redirect('/');
        }
    }
    public function create(Request $request)
    {

        $name = $request->input('voting.name');
        $type = $request->input('voting.type');
        $choice = $request->input('voting.choice');

        $request->request->add(['name' => $name]);
        $request->request->add(['type' => $type]);
        $request->validate([
            'name' => 'required|string|max:300',
            'type' => 'required|string|max:100',
        ]);
        $voting = new Voting;
        $voting->name = $request->name;
        $voting->type = $request->type;
        $voting->save();
        $voting->encrypted_id = Crypt::encrypt($voting->id);
        $voting->save();

        $successChoice = true;
        foreach ($choice as $el) {
            $id = $el['id'];
            $challenger = $el['challenger'];
            $desc = $el['desc'];
            $choice = new Question;
            $choice->full_name = $challenger;
            $choice->description = $desc;
            $choice->voting_id = $voting->id;
            $choice->save();
            if (!$choice) {
                $successChoice = false;
                return response()->json(['errors' => "Голосование не создано. Так как, какой то из выборов не загружен."]);
            }
        }
        if ($voting && $successChoice) {
            return response()->json(['success' => "Голосование создано."]);
        }
    }
}
