<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class UserController
{
    public function login(Request $request): string
    {
        $user = User::where([
            'user_name' => $request->userName,
            'password' => $request->password,
        ])->get();

        if ($user->isNotEmpty()) {
            Auth::login($user->first());
            if (Auth::check()) {
                return redirect()->route('profile', ['userName' => $request->userName]);
            }
        }
        return back()->with('error', 'Incorrect login or password');
    }

    public function profile(Request $request)
    {
        return view('profile', ['userName' => $request->userName]);

    }
}
