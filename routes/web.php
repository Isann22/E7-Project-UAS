<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\GithubController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TournamentController;
use App\Http\Controllers\Organizer\TicketController as orgTicket;
use App\Http\Controllers\Organizer\TournamentController as orgTournament;

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
        Route::put('/order/{id}/update', [OrderController::class, 'update'])->name('update');
        Route::post('/', [OrderController::class, 'store'])->name('store');
        Route::get('/{ticket_id?}', [OrderController::class, 'index'])->name('index');
        Route::get('/count', [OrderController::class, 'showOrderCount'])->name('count');
        Route::post('/history/filter', [OrderController::class, 'filter'])->name('filter');
    });

    Route::prefix('payments')->name('payments.')->group(function () {
        Route::post('/checkout', [PaymentController::class, 'payOrder'])->name('pay');
        Route::get('/checkout/{payment}', [PaymentController::class, 'checkout'])->name('checkout');
    });
});

Route::middleware(['auth', 'verified', 'role:organizer'])->prefix('organizer')->name('organizer.')->group(function () {

    Route::get('/', function () {
        return view('organizer.index');
    })->name('index');

    Route::prefix('tournaments')->name('tournaments.')->group(function () {
        Route::get('/', [orgTournament::class, 'index'])->name('index');
        Route::get('/export', [orgTournament::class, 'export'])->name('export');
        Route::post('/create', [orgTournament::class, 'store'])->name('store');
        Route::put('/{id}/edit', [orgTournament::class, 'update'])->name('update');
        Route::delete('/{id}', [orgTournament::class, 'destroy'])->name('destroy');
    });

    Route::prefix('tickets')->name('tickets.')->group(function () {
        Route::get('/', [orgTicket::class, 'index'])->name('index');
        Route::post('/create', [orgTicket::class, 'store'])->name('store');
        Route::put('/{id}/edit', [orgTicket::class, 'update'])->name('update');
        Route::delete('/{id}', [orgTicket::class, 'destroy'])->name('destroy');
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

Route::get('/sponsor', function () {
    return view('sponsor.blade.php');
});

require __DIR__ . '/auth.php';

Route::get('/home', [HomeController::class, 'index'])->name('home');
