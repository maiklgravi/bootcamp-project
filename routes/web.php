<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AboutAsController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BlogCommentController;
use App\Http\Controllers\FilmsCommentController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\JSHomeWorkController;
use App\Http\Controllers\LikeDislikeFilmController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PrivateController;

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

Route::get('/articles/most-poupular',[ArticleController::class,'readMostPopularArticles'])->name('mostPopularArticles');
Route::get('/film/{id}/like', [LikeDislikeFilmController::class, 'getInfo']);
Route::post('/articles', [ArticleController::class, 'createArticle']);
Route::post('/blog/article/{id}/comment',[BlogCommentController::class,'leaveComment']);
Route::post('/film/{id}/comment', [FilmsCommentController::class, 'leaveComment']);
Route::get('/blog/article/{id}/delete', [ArticleController::class, 'deleteArticle']);
Route::post('/film/{id}/like', [LikeDislikeFilmController::class, 'makeLikeOrDislike']);
Route::get('/blog/article/{articlesId}/edit',[ArticleController::class,'formEditArticle'])->name('editArticle');
Route::post('/article/{articlesId}',[ArticleController::class,'editArticle']);
Route::get('/blog/article/create',[ArticleController::class,'formCreateArticle'])->name('formCreateArticle');
Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/jshome',[JSHomeWorkController::class,'index'])->name('jshome');
Route::get('/jshome/cart',[JSHomeWorkController::class,'cart'])->name('cart');
Route::get('/blog',[BlogController::class,'index'])->name('blog');
Route::get('/my_article',[BlogController::class,'myArticle'])->name('myArticle');
Route::get('/about_us',[AboutAsController::class,'index'])->name('about_us');
Route::get('/films',[FilmController::class,'index'])->name('film');
Route::get('/blog/article/{articlesId}',[ArticleController::class,'show'])->name('blogArticle');
Route::get('contacts',[ContactUsController::class, 'view'])->name('contactUs')->middleware('log.activity:sendContactUs');
Route::post('contacts',[ContactUsController::class, 'send'])->name('contactUs.send');
Route::get('/payment',[PaymentController::class,'index'])->name('paymnetForm');
Route::post('/payment',[PaymentController::class,'payment'])->name('paymentSubscribe');
Route::get('/film/{articlesId}',[FilmController::class,'show'])->name('filmArticle');
Route::name('user.')->group(function(){
    Route::get('/private', [PrivateController::class, 'showWelcomePage'])
        ->middleware('auth')
        ->name('private');
    Route::get('/login', [LoginController::class,'index'])->name('login');
    Route::post('/login',[LoginController::class,'login']);
    Route::get('/logout', [LoginController::class,'loginout'])->name('logout');
    Route::get('/registration',[RegistrationController::class,'index'])->name('registration');
    Route::post('/registration',[RegistrationController::class,'save']);
});
