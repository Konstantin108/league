<?php

use App\Http\Controllers\UserController;
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

Route::get('/', [UserController::class, 'index'])
    ->name('index');

Route::get('/one/{id}', [UserController::class, 'one'])
    ->where('id', '\d+')
    ->name('one');

Route::post('/update/{id}', [UserController::class, 'update'])
    ->where('id', '\d+')
    ->name('update');

Route::get('/create/{id}', [UserController::class, 'create'])
    ->where('id', '\d+')
    ->name('create');

Route::post('/store', [UserController::class, 'store'])
    ->name('store');

Route::get('/delete/{id}', [UserController::class, 'delete'])
    ->where('id', '\d+')
    ->name('delete');
