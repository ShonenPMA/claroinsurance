<?php

use App\Http\Controllers\Web\EmailController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\IndexController;
use App\Http\Controllers\Web\RegisterController;
use App\Http\Controllers\Web\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [IndexController::class, 'view'])->name('welcome');
Route::get('/registro', [RegisterController::class, 'view'])->name('register');
Route::post('/registro', [RegisterController::class, 'loadData'])->name('loadData');
Route::post('/registro/save', [RegisterController::class, 'register'])->name('save');


Route::middleware(['auth'])->group(function () {
    Route::get('home', [HomeController::class, 'view'])->name('home');

    Route::middleware(['can:list-users'])->group(function () {
        Route::get('users', [UserController::class , 'index'])->name('users.index');
        Route::put('users', [UserController::class , 'update'])->name('users.update');
        Route::get('users/{user}', [UserController::class , 'destroy'])->name('users.destroy');
    });


    Route::get('emails', [EmailController::class , 'index'])->name('emails.index');
    Route::get('emails/create', [EmailController::class , 'create'])->name('emails.create');
    
});


Auth::routes([
    'login' => true,
    'register' => false,
    'reset' =>false,
    'verifiy' => false,
    'confirm' => false
    ]);