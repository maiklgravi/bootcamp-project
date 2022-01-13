<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AboutAsController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\PersonalCabinet;
use App\Http\Controllers\ArticleController;

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
Route::get('/personal_cabinet',[PersonalCabinet::class,'index'])->name('cabinet');
Route::get('/blog/article/{articlesId}',[ArticleController::class,'show'])->name('blogArticle');
Route::get('contacts',[ContactUsController::class, 'view'])->name('contactUs');
Route::post('contacts',[ContactUsController::class, 'send'])->name('contactUs.send');
