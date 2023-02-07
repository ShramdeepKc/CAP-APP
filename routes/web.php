<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UrlController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Console\Application;

// use App\Http\Controllers\ClientController;

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

// Route::resource('/', [WelcomeController::class, 'index']);
// Route::get('/dashboard', function () {
//     return view('aaplications');
// })->middleware(['auth'])->name('dashboard');
Route::resource('apps',AppController::class)->middleware(['auth']);
// Route::resource('clients',ClientController::class)->middleware(['auth']);
Route::resource('urls',UrlController::class)->middleware(['auth']);
// Route::resource('/', DashboardController::class);
Route::resource('applications',ApplicationController::class)->middleware(['auth']);
// Route::resource('/',WelcomeController::class);
Route::resource('/', WelcomeController::class);

require __DIR__.'/auth.php';
