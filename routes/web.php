<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\ParseController as AdminParseController;
use App\Http\Controllers\ContactController as ContactController;


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

// Route::get('/', function () {
//     return view('welcome');
// });

// News

Route::group(['as'=>'admin.', 'prefix' => 'admin'], function(){
    Route::resource('/category', AdminCategoryController::class);
    Route::resource('/news', AdminNewsController::class);
    Route::resource('/parse', AdminParseController::class);
});

Route::get('/', [MainController::class, 'index'])
    ->name('main');

Route::get('/category', [CategoryController::class, 'index'])
    ->name('category.index');

Route::get('/category/{category}', [NewsController::class, 'showNewsCategory'])
    ->name('category.news');

Route::get('/news/{news}', [NewsController::class, 'showItem'])
    ->where('news', '\d+')
    ->name('news.item');

Route::resource('/contact', ContactController::class);