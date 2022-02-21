<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AboutAsController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\LoginController;


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

Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/blog',[BlogController::class,'index'])->name('blog');
Route::get('/about_us',[AboutAsController::class,'index'])->name('about_us');
Route::get('/film',[FilmController::class,'index'])->name('film');
Route::get('/blog/article/{articlesId}',[ArticleController::class,'show'])->name('blogArticle');
Route::get('contacts',[ContactUsController::class, 'view'])->name('contactUs')->middleware('log.activity:sendContactUs');
Route::post('contacts',[ContactUsController::class, 'send'])->name('contactUs.send');
Route::get('/film/article/{articlesId}',[FilmController::class,'show'])->name('filmArticle');
Route::name('user.')->group(function(){
    Route::view('/private', 'private')->middleware('auth')->name('private');
    Route::get('/login', [LoginController::class,'index'])->name('login');
    Route::post('/login',[LoginController::class,'login']);
    Route::get('/logout', [LoginController::class,'loginout'])->name('logout');
    Route::get('/registration',[RegistrationController::class,'index'])->name('registration');
    Route::post('/registration',[RegistrationController::class,'save'])->name('registration');

});
