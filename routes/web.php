<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController; #untuk memanggil profile controller
use App\Http\Controllers\UserController; #untuk memanggil profile controller
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

Route::get('/profile/{nama}/{npm}/{kelas}', [ProfileController::class, 'profile']);

Route::get('/user', [UserController::class, 'index'])->name('user.index');
Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
Route::post('/user', [UserController::class, 'store'])->name('user.store');
// Route::get('/user/{user}', [UserController::class, 'show']);
// Route::get('/user/{user}/edit', [UserController::class, 'edit']);
// Route::put('/user/{user}', [UserController::class, 'update']);
// Route::delete('/user/{user}', [UserController::class, 'destroy']);
