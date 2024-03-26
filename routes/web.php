<?php


use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\PortfolioController;
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
    Route::post('/signup', [UserController::class, 'new_signup'])->name('new_signup');
    
});


Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'dashboard'])->name('dashboard');
    Route::delete('/welcome', [UserController::class, 'logout'])->name('welcome');
    Route::get('/blog', [BlogController::class, 'blog'])->name('blog');
    Route::get('/certificate', [CertificateController::class, 'certificates'])->name('certificate');
    Route::get('/portfolio', [PortfolioController::class, 'portfolio'])->name('portfolio');
    Route::get('/testimonial', [TestimonialController::class, 'testimonial'])->name('testimonial');
    ROute::get('/users', [UserController::class, 'users'])->name('users');
});


Route::group(['middleware' => 'Spectator'], function(){
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/blog', [BlogController::class, 'blog'])->name('blog');
    Route::get('/certificate', [CertificateController::class, 'certificates'])->name('certificate');
    Route::get('/portfolio', [PortfolioController::class, 'portfolio'])->name('portfolio');
    ROute::get('/users', [UserController::class, 'users'])->name('users');
 
    Route::get('/welcome', function () { return view ('welcome');});
    Route::get('/login', function () { return view ('login');});
    Route::get('/signup', function () { return view ('signup');});
    
});
// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
