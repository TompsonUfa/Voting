<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use App\Services\UserServices;

class UserController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        if ($user->admin) {
            $users = User::orderBy('surname', 'asc')->paginate(10);
            return view('users.index', ['users' => $users]);
        } else {
            return redirect('/');
        }
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit', ['user' => $user]);
    }

    public function update(Request $request, $id, UserServices $services)
    {
        $validated = $request->validate([
            'name' => 'required|min:4|max:255',
            'surname' => 'required|min:4|max:255',
            'middlename' => 'required|min:4|max:255',
            'email' => 'required|min:6|max:255',
            'admin' => 'nullable',
            'moderator' => 'nullable',
            'password' => 'nullable|min:8|confirmed',
        ]);
        $user = auth()->user();
        if ($user->admin) {
            $user = User::find($id);
            return $services->update($user, $validated);
        } else {
            return redirect('/');
        }
    }
}
