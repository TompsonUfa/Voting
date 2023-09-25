<?php

namespace App\Services;

use App\Models\Question;

class QuestionServices
{
    public function store($voting, $questions)
    {
        foreach ($questions as $question)
        {
            Question::create(
                [
                    'full_name' => $question['challenger'],
                    'description' => $question['desc'],
                    'voting_id'=> $voting,
                ]
            );
            return response()->json(['success' => "Голосование создано."]);
        }
    }
    public function update($voting, $questions)
    {
        $questionsDb = Question::where('voting_id', $voting->id)->get();
        foreach ($questionsDb as $questionDb){
            $idDb = $questionDb->id;
            $issetItem = false;
            foreach ($questions as $question){
                $questionId = $question['id'];
                if ($idDb == $questionId){
                    $issetItem = true;
                }
            }
            if ($issetItem === false) {
                Question::where('id', $idDb)->delete();
            }
        }
        foreach ($questions as $question) {
            $id = $question['id'];
            $challenger = $question['challenger'];
            $desc = $question['desc'];
            if(isset($id)){
                Question::find($id)->update(['full_name' => $challenger, 'description' => $desc]);
            } else {
                Question::create([
                    'full_name' => $challenger,
                    'description' => $desc,
                    'voting_id'=> $voting->id,
                ]);
            }
        }
    }
}