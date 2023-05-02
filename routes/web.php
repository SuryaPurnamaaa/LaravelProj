<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GameController;

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

// Public routes
Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

Route::get('/register', function () {
    return view('register');
});

// Protected routes
Route::middleware(['auth'])->group(function () {
    Route::get('/games', [GameController::class, 'showAll']);

    Route::get('/game/addgame', [GameController::class, 'create']);
    Route::post('/game/addgame', [GameController::class, 'create']);

    Route::get('/game/editgame/{game}', [GameController::class, 'edit']);
    Route::post('/game/editgame/{game}', [GameController::class, 'edit']);

    Route::get('/game/delgame/{id}', [GameController::class, 'deletegame']);

    Route::get('/game/reset', [GameController::class, 'reset']);

    Route::post('/logout', [UserController::class, 'logout']);
});

// Auth routes
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [RegisterController::class, 'register']);
