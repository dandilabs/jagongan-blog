<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;


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

Route::get('/', 'App\Http\Controllers\BlogController@index');
Route::get('/isi-post/{slug}', 'App\Http\Controllers\BlogController@isiblog')->name('blog.isi');
Route::get('/list-post', 'App\Http\Controllers\BlogController@list_blog')->name('blog.list');
Route::get('/list-category/{category}', 'App\Http\Controllers\BlogController@list_category')->name('blog.category');
Route::get('/cari', 'App\Http\Controllers\BlogController@cari')->name('blog.cari');
Route::get('/home', function () {
    return view('layout');
})->name('home');

Auth::routes();

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'
])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/dashboard', function () { return view('dashboard'); })->name('dashboard');
    Route::resource('/category', CategoryController::class);
    Route::resource('/tag', TagController::class);

    Route::get('/post/datasoft', 'App\Http\Controllers\PostController@datasoft')->name('post.datasoft');
    Route::get('/post/restore/{id}', 'App\Http\Controllers\PostController@restore')->name('post.restore');
    Route::delete('/post/kill/{id}', 'App\Http\Controllers\PostController@kill')->name('post.kill');
    Route::resource('/post', PostController::class);
    Route::resource('/user', UserController::class);
});
