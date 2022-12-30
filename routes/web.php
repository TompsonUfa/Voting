<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VotingController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CreateVotingController;

Route::get('/', [MainController::class, 'show']);

Route::get('/users', [UserController::class, 'show']);

Route::get('/result/{id}', [VotingController::class, 'result']);

Route::get('/voting/{id}', [VotingController::class, 'show']);
Route::post('/voting/{id}', [VotingController::class, 'post']);

Route::get('/list-voting', [VotingController::class, 'list']);
Route::post('/list-voting', [VotingController::class, 'status']);

Route::get('/create-voting', [CreateVotingController::class, 'show']);
Route::post('/create-voting', [CreateVotingController::class, 'create']);

Route::get('login', [LoginController::class, 'login'])->name('auth');
Route::post('login', [LoginController::class, 'authenticate'])->name('auth');

Route::get('register', [RegisterController::class, 'register'])->name('register');
Route::post('register', [RegisterController::class, 'create'])->name('create');
