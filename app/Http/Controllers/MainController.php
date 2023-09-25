<?php

namespace App\Http\Controllers;

use App\Models\Voting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function __invoke()
    {
        $voting = Voting::latest()->get();
        return view('welcome', ['allVoting' => $voting]);
    }
}
