<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UrlController;
use App\Http\Controllers\UserController;
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

Route::get('/users',[UserController::class,'index'])->name('users.index');
// Route::delete('/users',[UserController::class,'destroy'])->name('users.index');
Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::post('/users/{user}/roles', [UserController::class, 'assignRole'])->name('users.roles');
    Route::post('/users/{user}/roles', [UserController::class, 'assignRole'])->name('users.roles');
    Route::delete('/users/{user}/roles/{role}', [UserController::class, 'removeRole'])->name('users.roles.remove');
    Route::post('/users/{user}/permissions', [UserController::class, 'givePermission'])->name('users.permissions');
    Route::delete('/users/{user}/permissions/{permission}', [UserController::class, 'revokePermission'])->name('users.permissions.revoke');

  
    Route::resource('roles',RoleController::class)->middleware(['auth']);
    Route::post('/roles/{role}/permission',[RoleController::class,'givePermission'])->name('roles.permission');
    Route::delete('/roles/{role}/permission/{permission}', [RoleController::class, 'revokePermission'])->name('roles.permission.revoke');
    Route::resource('permission',PermissionController::class)->middleware(['auth']);

require __DIR__.'/auth.php';
