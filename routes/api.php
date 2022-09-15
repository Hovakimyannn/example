<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::GET('/login', function () {
    return view('loginForm');
});
Route::POST('/login', [UserController::class, 'login'])->name('login');
Route::GET('/profile', function () {
    return view('profile');
})->name('profile');




//GET /login stex forman a html erevum
//POST /login stex login anelu hamar, successic heto redirect a linum /profile
//GET /profile stex el output a anum welcome {username}
