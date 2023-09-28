<?php

use App\Http\Controllers\VotingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RegisterController;


Route::get('/', MainController::class)->name('home');

Route::get('register', [RegisterController::class, 'register'])->name('register');

Route::post('register', [RegisterController::class, 'create'])->name('create');


Route::prefix('users')->as('users.')->group(function (){

    Route::get('', [UserController::class, 'index'])->name('index');

    Route::get('/{users}/edit', [UserController::class, 'edit'])->name('edit');

    Route::post('/{users}', [UserController::class, 'update'])->name('update');

});

Route::prefix('voting')->as('voting.')->group(function (){

    Route::get('', [VotingController::class, 'index'])->name('index');

    Route::get('/create', [VotingController::class, 'create'])->name('create');

    Route::post('', [VotingController::class, 'store'])->name('store');

    Route::get('/{voting}', [VotingController::class, 'show'])->name('show');

    Route::get('/{voting}/edit', [VotingController::class, 'edit'])->name('edit');

    Route::put('/{voting}', [VotingController::class, 'update'])->name('update');

    Route::delete('/{voting}', [VotingController::class, 'destroy'])->name('destroy');

    Route::get('/{voting}/users', [VotingController::class, 'users'])->name('users');

    Route::post('/{voting}', [VotingController::class, 'vote'])->name('vote');

    Route::get('/{voting}/result', [VotingController::class, 'result'])->name('result');
});

