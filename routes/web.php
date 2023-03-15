<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\MasyarakatController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

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
    return view('layouts.master');
});

Route::get('/register', [RegisterController::class, 'showRegisterMasyarakat'])->name('register');
Route::post('/register', [RegisterController::class, 'registerMasyarakat']);

Route::get('/login', [LoginController::class, 'showLoginMasyarakat'])->name('login');
Route::post('/login', [LoginController::class, 'loginMasyarakat']);

Route::get('/petugas/login', [LoginController::class, 'showLoginPetugas'])->name('petugas.login');
Route::post('/petugas/login', [LoginController::class, 'loginPetugas']);

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/masyarakat', [MasyarakatController::class, 'landing'])->name('masyarakat.landing');
Route::get('/petugas/masyarakat', [MasyarakatController::class, 'index'])->name('masyarakat.index');