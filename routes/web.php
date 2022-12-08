<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

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

Route::get('/', function () { return view('welcome');});

Route::get('/login', function () { return view('auth.login');});
Route::get('/register', function () { return view('auth.register');});

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::middleware('auth')->group(function () {

    Route::get('/home', [HomeController::class, 'home'])->name('home');
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

    Route::get('/employee', function () { return view('employee');})->name('employee');
    Route::get('/role', function () { return view('role');})->name('role');
    Route::get('/group', function () { return view('group');})->name('group');
    Route::get('/product', function () { return view('product');})->name('product');
    Route::get('/step', function () { return view('step');})->name('step');

    Route::get('/users-tab', function () { return view('users-tab');})
        ->middleware('can:access_by_system')->name('users-tab');
});

