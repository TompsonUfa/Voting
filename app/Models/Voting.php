<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voting extends Model
{
    use HasFactory;
    protected $table = "voting";
    protected $fillable = [
        'name',
        'type',
        'encrypted_id',
        'close',
    ];
    protected $perPage = 5;

    public function checkVote()
    {
        $userId = auth()->user()->id;
        return Vote::where('voting_id', $this->id)->where('user_id', '=', $userId)->first() ? true : false;
    }
    public function checkClose()
    {
        return Voting::where('id', $this->id)->where('close', '=', '1')->first() ? true : false;
    }
}
