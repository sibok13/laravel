<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;

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

Route::group(['as'=>'Admin.', 'prefix' => 'admin'], function(){
    Route::resource('/category', AdminCategoryController::class);
    Route::resource('/news', AdminNewsController::class);
});

Route::get('/', [MainController::class, 'index'])
    ->name('main');

Route::get('/category', [CategoryController::class, 'index'])
    ->name('category.index');

Route::get('/category/{category}', [CategoryController::class, 'showCategory'])
    ->name('category.news');

Route::get('/news/{id}', [NewsController::class, 'showItem'])
    ->where('id', '\d+')
    ->name('news.item');