<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserServices
{
    public function update($user, $data)
    {
        $user->name = $data['name'];
        $user->surname = $data['surname'];
        $user->middlename = $data['middlename'];
        $user->email = $data['email'];

        if(isset($data['admin'])){
            $user->admin = 1;
        } else {
            $user->admin = 0;
        }

        if(isset($data['moderator'])){
            $user->moderator = 1;
        } else {
            $user->moderator = 0;
        }

        if(isset($data['password'])){
           $user->password = Hash::make($data['password']);
        }

        $user->save();

        return response()->json(['success' => "Пользователь обновлен."]);
    }
}