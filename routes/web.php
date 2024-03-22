<?php


use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view ('welcome');
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/welcome', [UserController::class, 'logout'])->name('logout');
    Route::get('/login', [UserController::class, 'login'])->name('login');
    Route::post('/login', [UserController::class, 'loginPost'])->name('login');
    Route::get('/signup', [UserController::class, 'signup'])->name('signup');
    
});


Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'dashboard'])->name('dashboard');
    Route::delete('/logout', [UserController::class, 'logout'])->name('logout');
    
});

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
