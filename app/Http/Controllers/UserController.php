<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function show()
    {
        $user = auth()->user();
        if ($user->admin) {
            $users = User::all();
            return view('users.index', ['users' => $users]);
        } else {
            return redirect('/');
        }
    }
}
