<?php

namespace App\Services;

use App\Models\Question;
use App\Models\Vote;
use App\Models\Voting;

class VotingServices
{
    public function update($voting, $name)
    {
        $voting->update(['name' => $name]);
    }
    public function vote($votingId, $id, $userId, $userVoices)
    {
        $voting = Voting::where('encrypted_id', '=', $id)
            ->where('close', false)
            ->get();
        $userVoted = Vote::where('voting_id', '=', $votingId)->where('user_id', '=', $userId)->first();
        if (empty($voting[0]) || !is_null($userVoted)) {
            return response()->json(['success' => "Вы уже проголосовали."]);
        } else {
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
}