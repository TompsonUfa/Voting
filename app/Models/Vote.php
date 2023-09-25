<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use App\Models\Voting;
use App\Models\User;
class Vote extends Model
{
    use HasFactory;
    protected $table = "vote";
    protected $fillable = [
        'voting_id',
        'user_id',
    ];
    public function voting()
    {
        return $this->hasMany(Voting::class, 'id', 'voting_id');
    }
    public function user()
    {
        return $this->hasMany(User::class, 'id', 'user_id');
    }
}
