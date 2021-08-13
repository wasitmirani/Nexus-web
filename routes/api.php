<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ArticleController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('article')->group(function () {
    Route::get('/articles',[ArticleController::class,'getArticles']);
    Route::post('/post',[ArticleController::class,'createArticle']);
    Route::get('/get/{id?}',[ArticleController::class,'getArticle']);
    Route::post('/update',[ArticleController::class,'updateArticle']);
    Route::get('/delete/{id?}',[ArticleController::class,'deleteArticle']);
});



Route::prefix('blog')->group(function () {
    Route::get('/blogs',[BlogController::class,'getBlogs']);
    Route::post('/post',[BlogController::class,'createBlog']);
    Route::get('/get/{id?}',[BlogController::class,'getBlog']);
    Route::post('/update',[BlogController::class,'updateBlog']);
    Route::get('/delete/{id?}',[BlogController::class,'deleteBlog']);
});




Route::prefix('app')->group(function () {

    Route::prefix('article')->group(function () {
        Route::get('/articles',[ArticleController::class,'getArticles']);
    });
});
