<?php

use App\Http\Controllers\Account\IndexController as AccountController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\ParseController as AdminParseController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::group(['middleware'=>'auth'], function(){
    Route::get('/account', AccountController::class)
        ->name('account');

    Route::get('/logout', function(){
        Auth::logout();
        return redirect()->route('main');
    }) ->name('account.logout');

    Route::group(['as'=>'admin.', 'prefix' => 'admin', 'middleware' => 'admin'], function(){
        Route::resource('/category', AdminCategoryController::class);
        Route::resource('/news', AdminNewsController::class);
        Route::resource('/parse', AdminParseController::class);
        Route::resource('/users', AdminUserController::class);
    });
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
