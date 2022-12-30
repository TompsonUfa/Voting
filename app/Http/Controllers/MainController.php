<?php

namespace App\Http\Controllers;

use App\Models\Voting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function show()
    {
        $voting = Voting::all();
        return view('welcome', ['allVoting' => $voting]);
    }
}
