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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('registerSave',[UserController::class, 'register'])->name('registerSave');

Route::post('loginMatch',[UserController::class,'login'])->name('loginMatch');

Route::get('dashboard', [UserController::class,'dashboardPage'])->name('dashboard');

Route::get('logout', [UserController::class,'logout'])->name('logout');

Route::get('dashboard/inner', [UserController::class,'innerPage'])->name('inner');
