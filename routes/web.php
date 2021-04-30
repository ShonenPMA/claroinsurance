<?php

use App\Http\Controllers\Web\IndexController;
use App\Http\Controllers\Web\RegisterController;
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

Auth::routes([
    'login' => true,
    'register' => false,
    'reset' =>false,
    'verifiy' => false,
    'confirm' => false
    ]);