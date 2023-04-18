<?php

use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('welcome');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/games', [App\Http\Controllers\GameController::class, 'showAll']);

Route::get('/game/addgame', [App\Http\Controllers\GameController::class, 'create']);
Route::post('/game/addgame', [App\Http\Controllers\GameController::class, 'create']);

Route::get('/game/editgame/{game}', [App\Http\Controllers\GameController::class, 'edit']);
Route::post('/game/editgame/{game}', [App\Http\Controllers\GameController::class, 'edit']);

Route::get('/game/delgame/{id}', [App\Http\Controllers\GameController::class, 'deletegame']);

Route::get('/game/reset', [App\Http\Controllers\GameController::class, 'reset']);

Route::post('/login', [App\Http\Controllers\AuthController::class, 'login']);

Route::post('/register', [App\Http\Controllers\RegisterController::class, 'register']);

Route::post('/logout', [App\Http\Controllers\UserController::class, 'logout']);