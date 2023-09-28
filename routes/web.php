<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;



Route::get('login', [LoginController::class, 'login'])->name('auth');
Route::post('login', [LoginController::class, 'authenticate'])->name('auth');
