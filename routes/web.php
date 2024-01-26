<?php

use App\Http\Controllers\Author\CategoryController;
use App\Http\Controllers\Author\PostController as AuthorPostController;
use App\Http\Controllers\Author\TagController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::redirect('/', 'posts');

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

Route::redirect('/home', 'author/posts');

Route::group(['middleware'=>'auth', 'prefix'=>'author', 'as'=>'author.'], function() {
    # Routes for Managing the Categories
    Route::resource('categories', CategoryController::class)->except('show');

    # Routes for Managing the Tags
    Route::resource('tags', TagController::class)->except('show');

    # Routes for Managing the Posts
    Route::resource('posts', AuthorPostController::class);
});

# Routes for showing and Listing Posts to the End Users
Route::resource('posts', PostController::class)->only(['index', 'show']);
