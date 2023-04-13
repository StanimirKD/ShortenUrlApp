<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShortUrlController;
use App\Http\Controllers\RedirectController;

// Public routes
Route::get('/', function () {
    return view('welcome');
});

// Authentication routes
Auth::routes();

// Authenticated routes
Route::middleware(['auth'])->group(function () {

    // Dashboard route(the dashboard page)
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

    // Short URL routes(used to add,edit and remove links)
    Route::get('/shorturls/create', [ShortUrlController::class, 'create'])->name('shorturls.create');
    Route::post('/shorturls', [ShortUrlController::class, 'store'])->name('shorturls.store');
    Route::get('/shorturls/{id}/edit', [ShortUrlController::class, 'edit'])->name('shorturls.edit');
    Route::put('/shorturls/{id}', [ShortUrlController::class, 'update'])->name('shorturls.update');
    Route::delete('/shorturls/{id}', [ShortUrlController::class, 'destroy'])->name('shorturls.destroy');

    // Short URL redirect route(used to click on the short links)
    Route::get('/{short_link}', [RedirectController::class, 'redirect'])->name('shorturl.redirect');

    // Short URL show route
    Route::get('/shortlink/{shortLink}', 'ShortUrlController@show')->name('shortlink');
});
