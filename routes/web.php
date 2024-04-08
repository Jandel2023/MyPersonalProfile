<?php


use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\HomeController;
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
    Route::get('/signin', [UserController::class, 'login'])->name('login');
    Route::post('/loginpost', [UserController::class, 'loginPost'])->name('loginpost');
    Route::get('/signup', [UserController::class, 'signup'])->name('signup');
    Route::post('/signup', [UserController::class, 'new_signup'])->name('new_signup');


    Route::get('/', [UserController::class, 'viewtowelcome'])->name('viewtowelcome');
    // Route::get('/', [PortfolioController::class, 'viewtowelcome'])->name('fromportfolio');
    
});


Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');


    Route::delete('/logout', [UserController::class, 'logout'])->name('logout');
    Route::get('/users', [UserController::class, 'users'])->name('users');
    Route::delete('/users/{user}',[UserController::class,'destroy'])->name('destroyuser');
    Route::get('/editprofile', [UserController::class, 'editprofile'])->name('editprofile');
    Route::post('/updateprofile', [UserController::class, 'updateprofile'])->name('updateprofile');
    Route::get('/changepassword', [UserController::class, 'changepass'])->name('changepassword');
    Route::post('/changepassword', [UserController::class, 'changepassword'])->name('changepassword');

    Route::resource('/blogs', BlogController::class);
   

    Route::resource('/certificates', CertificateController::class);

    Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio');
    Route::get('/addnewportfolio', [PortfolioController::class, 'addnewportfolio'])->name('addnewportfolio');
    Route::post('/createportfolio', [PortfolioController::class, 'createportfolio'])->name('createportfolio');
    Route::get('/editportfolio/{id}', [PortfolioController::class, 'edit'])->name('editportfolio');
    Route::put('/editportfolio/{portfolio}', [PortfolioController::class, 'update'])->name('updateportfolio');
    Route::delete('/destroyportfolio/{portfolio}', [PortfolioController::class, 'destroy'])->name('destroyportfolio');
   
    Route::post('/createtestimonial', [TestimonialController::class, 'createtestimonial'])->name('createtestimonial');
    Route::get('/testimonial', [TestimonialController::class, 'index'])->name('testimonial');
    Route::get('/addnewtestimonial', [TestimonialController::class, 'addnewtestimonial'])->name('addnewtestimonial');
    Route::delete('/testimonial/{testimonial}', [TestimonialController::class, 'destroy'])->name('destroytestimonial');
    Route::get('/edittestimonial/{id}', [TestimonialController::class, 'edit'])->name('edittestimonial');
    Route::put('/edittestimonial/{testimonial}', [TestimonialController::class, 'update'])->name('updatetestimonial');


});


Route::group(['middleware' => 'Spectator'], function(){
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');


    // Route::delete('/logout', [UserController::class, 'logout'])->name('logout');
    Route::get('/users', [UserController::class, 'users'])->name('users');
    Route::get('/editprofile', [UserController::class, 'editprofile'])->name('editprofile');
    Route::post('/updateprofile', [UserController::class, 'updateprofile'])->name('updateprofile');
    Route::get('/changepassword', [UserController::class, 'changepass'])->name('changepassword');
    Route::post('/changepassword', [UserController::class, 'changepassword'])->name('changepassword');

    Route::resource('/blogs', BlogController::class);
   

    Route::resource('/certificates', CertificateController::class);

    Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio');
    Route::get('/addnewportfolio', [PortfolioController::class, 'addnewportfolio'])->name('addnewportfolio');
    Route::post('/createportfolio', [PortfolioController::class, 'createportfolio'])->name('createportfolio');
    Route::get('/editportfolio/{id}', [PortfolioController::class, 'edit'])->name('editportfolio');
    Route::put('/editportfolio/{portfolio}', [PortfolioController::class, 'update'])->name('updateportfolio');
    Route::delete('/destroyportfolio/{portfolio}', [PortfolioController::class, 'destroy'])->name('destroyportfolio');
    
   
   

});


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
