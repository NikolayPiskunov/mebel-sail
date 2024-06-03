<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\Dashboard\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/editor', [\App\Http\Controllers\Dashboard\DashboardController::class, 'edit'])->name('editor');

    Route::prefix('orders')->name('orders.')->group(function () {
        Route::get('/', [\App\Http\Controllers\OrderController::class, 'index'])->name('index');
        Route::post('/', [\App\Http\Controllers\OrderController::class, 'store'])->name('store');
        Route::get('/{order}/edit', [\App\Http\Controllers\OrderController::class, 'edit'])->name('edit');
        Route::put('/{order}/edit', [\App\Http\Controllers\OrderController::class, 'update'])->name('update');
    });

    Route::prefix('clients')->name('clients')->group(function () {
        Route::get('/', [\App\Http\Controllers\ClientController::class, 'index']);
    });

});
