<?php

use Illuminate\Support\Facades\Route;

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
    return redirect()->route('login');
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/search', [App\Http\Controllers\HomeController::class, 'search'])->name('search');
Route::get('/watch', [App\Http\Controllers\WatchController::class, 'index'])->name('watch');
Route::get('/callback', [App\Http\Controllers\SpotifyConnectController::class, 'callback'])->name('callback');

Route::get('/getToken', [App\Http\Controllers\SpotifyConnectController::class, 'index'])->name('getToken');
