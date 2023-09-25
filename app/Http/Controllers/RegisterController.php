<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Mockery\Undefined;

class RegisterController extends Controller
{
    public function register()
    {
        $user = auth()->user();
        if ($user->admin) {
            return view('auth.register');
        } else {
            return redirect('/');
        }
    }
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'surname' => 'required|string|max:100',
            'middlename' => 'required|string|max:100',
            'email' => 'required|string|max:200|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|same:password',
        ]);
        if ($request->admin != null) {
            $admin = 1;
        } else {
            $admin = 0;
        }
        if ($request->moderator != null || $request->admin != null) {
            $moderator = 1;
        } else {
            $moderator = 0;
        }
        $user = new User;
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->middlename = $request->middlename;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->admin = $admin;
        $user->moderator = $moderator;
        $user->save();
        if ($user) {
            return response()->json(['success' => $request->surname . " " . $request->name . " " . $request->middlename . " зарегистрирован."]);
        }
    }
}