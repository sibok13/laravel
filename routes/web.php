<?php

use App\Http\Controllers\Account\IndexController as AccountController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\ParseController as AdminResurceController;
use App\Http\Controllers\Admin\ParserController as AdminParserController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\ContactController as ContactController;
use App\Http\Controllers\SocialController;

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
        Route::resource('/resurce', AdminResurceController::class);
        Route::resource('/users', AdminUserController::class);
        Route::get('/parser', AdminParserController::class)
        ->name('parser');

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

Route::group(['middleware' => 'guest'], function(){
    Route::get('auth/{network}/redirect', [SocialController::class, 'redirect'])
        ->where('network', '\w+')
        ->name('auth.redirect');
    Route::get('auth/{network}/callback', [SocialController::class, 'callback'])
        ->where('network', '\w+')
        ->name('auth.callback');
});