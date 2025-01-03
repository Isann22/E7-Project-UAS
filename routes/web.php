<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GithubController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TournamentController;


Route::get('/',[HomeController::class,'index'])->name('home');

Route::get('/dashboard', [TournamentController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('tournaments')->name('tournament.')->group(function () {
        Route::get('/', [TournamentController::class, 'showAllTournaments'])->name('showAllTournaments');
        Route::post('/search', [TournamentController::class, 'search'])->name('search');
        Route::get('/detail/{id?}', [TournamentController::class, 'show'])->name('show');
    });
});



Route::controller(GithubController::class)->group(function () {
    Route::get('auth/github', 'redirectToGithub')->name('auth.github');
    Route::get('auth/github/callback', 'handleGithubCallback');
});

Route::controller(GoogleController::class)->group(function () {
    Route::get('auth/google', 'redirect')->name('auth.google');
    Route::get('auth/google/callback', 'googleCallback');
});

//test
Route::get('/test/order', function () {
    return view('orders.index');
});

require __DIR__ . '/auth.php';

Route::get('/home', [HomeController::class, 'index'])->name('home');