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
    Route::delete('/welcome', [UserController::class, 'logout'])->name('logout');
    Route::get('/login', [UserController::class, 'login'])->name('login');
    Route::post('/loginpost', [UserController::class, 'loginPost'])->name('loginpost');
    Route::get('/signup', [UserController::class, 'signup'])->name('signup');
    Route::post('/signup', [UserController::class, 'new_signup'])->name('new_signup');
    Route::get('/', [TestimonialController::class, 'viewtowelcome'])->name('viewtowelcome');

});


Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::delete('/logout', [UserController::class, 'logout'])->name('logout');
    Route::get('/blog', [BlogController::class, 'blog'])->name('blog');
    Route::get('/certificate', [CertificateController::class, 'certificates'])->name('certificate');
    Route::get('/portfolio', [PortfolioController::class, 'portfolio'])->name('portfolio');
    Route::post('/createtestimonial', [TestimonialController::class, 'createtestimonial'])->name('createtestimonial');
    Route::get('/users', [UserController::class, 'users'])->name('users');
    Route::get('/editprofile', [UserController::class, 'editprofile'])->name('editprofile');
    Route::post('/updateprofile', [UserController::class, 'updateprofile'])->name('updateprofile');
    Route::get('/testimonial', [TestimonialController::class, 'index'])->name('testimonial');
    Route::get('/addnewtestimonial', [TestimonialController::class, 'addnewtestimonial'])->name('addnewtestimonial');
    Route::delete('/testimonial/{testimonial}', [TestimonialController::class, 'destroy'])->name('destroytestimonial');
    Route::get('/edittestimonial/{id}', [TestimonialController::class, 'edit'])->name('edittestimonial');
    // Route::patch('/edittestimonial/{testimonial}', [TestimonialController::class, 'update'])->name('edittestimonial');
    Route::put('/edittestimonial/{testimonial}', [TestimonialController::class, 'update'])->name('updatetestimonial');
});


Route::group(['middleware' => 'Spectator'], function(){
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/blog', [BlogController::class, 'blog'])->name('blog');
    Route::get('/certificate', [CertificateController::class, 'certificates'])->name('certificate');
    Route::get('/portfolio', [PortfolioController::class, 'portfolio'])->name('portfolio');
    ROute::get('/users', [UserController::class, 'users'])->name('users');
 
   
   

});
// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
