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

Route::redirect('/', '/login');
//Route::get('/', function () {
//    return Inertia::render('Welcome', [
//        'canLogin' => Route::has('login'),
//        'canRegister' => Route::has('register'),
//        'laravelVersion' => Application::VERSION,
//        'phpVersion' => PHP_VERSION,
//    ]);
//});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/Home', function () {
        return Inertia::render('Home');
    })->name('home');
    Route::get('/features', function () {
        return Inertia::render('Features');
    })->name('features');
    Route::get('/pricing', function () {
        return Inertia::render('Pricing');
    })->name('pricing');
    Route::get('/Event/Show', function () {
        return Inertia::render('Event/Show');
    })->name('Show');
});
Route::inertia('/about', 'About');
