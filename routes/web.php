<?php

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => ['web']], function () {
    Route::GET('/login', function () {
        return view('loginForm');
    });

    Route::POST('/login', [UserController::class, 'login'])->name('login');

    Route::GET('/profile', function (Request $request) {
        if (session('lifeTime') + 60 <= Carbon::now()->timestamp) {
            Auth::logout();
            return redirect()->route('login');
        }
        return view('profile', ['userName' => $request->userName]);
    })->name('profile')->middleware('auth');
});
