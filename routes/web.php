<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\NewsletterController;

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
Route::post('newsletter', [NewsletterController::class, 'index']);

Route::get('/', [PostController::class,'index' ])->name('home');



Route::get('posts/{post:slug}', [PostController::class , 'show']);
Route::post('posts/{post:slug}/comments', [PostCommentsController::class , 'store']);

Route::get('authors/{author:username}', function (User $author) {

    return view('posts.index',[
        'posts' => $author->posts->load(['category' , 'author'])
    ]);
});

//section_09 Build a Register User Page
Route::get('register', [RegisterController::class,'create' ])->middleware('guest');
Route::post('register', [RegisterController::class,'store' ])->middleware('guest');

Route::get('login', [SessionsController::class,'create' ])->middleware('guest');
Route::post('login', [SessionsController::class,'store' ])->middleware('guest');
Route::post('logout', [SessionsController::class,'destory' ])->middleware('auth');

Route::get('admin/posts/create', [PostController::class, 'create'])->middleware('admin');
Route::post('admin/posts', [PostController::class, 'store'])->middleware('admin');



