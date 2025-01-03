<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GithubController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TournamentController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', [TournamentController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('tournaments')->name('tournament.')->group(function () {
        Route::get('/', [TournamentController::class, 'showAllTournaments'])->name('showAllTournaments');
        Route::post('/search', [TournamentController::class, 'search'])->name('search');
        Route::get('/detail/{id?}', [TournamentController::class, 'show'])->name('show');
    });

    Route::prefix('orders')->name('orders.')->group(function () {
        Route::get('/history', [OrderController::class, 'history'])->name('history');
        Route::delete('/order/{id}', [OrderController::class, 'destroy'])->name('destroy');
        Route::post('/', [OrderController::class, 'store'])->name('store');
        Route::get('/{ticket_id?}', [OrderController::class, 'index'])->name('index');
        Route::get('/count', [OrderController::class, 'showOrderCount'])->name('count');
    });

    Route::prefix('payments')->name('payments.')->group(function () {
        Route::post('/checkout', [PaymentController::class, 'payOrder'])->name('pay');
        Route::get('/checkout/{payment}', [PaymentController::class, 'checkout'])->name('checkout');
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
