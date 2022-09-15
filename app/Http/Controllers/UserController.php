<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController
{
    public function login(Request $request) : string
    {
        $user = User::where([
            'user_name' => $request->userName,
            'password'  => $request->password,
        ])->get();
        if ($user->isNotEmpty()) {
            return redirect()->route('profile', ['userName' => $request->userName]);
        }
        return back()->with('error', 'Incorrect login or password');
    }
}