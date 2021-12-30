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
use App\Http\Controllers\AdminPostController;

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


//admin
Route::middleware('can:admin')->group(function() {
    Route::resource('admin/posts', AdminPostController::class)->except('show');
    // Route::get('admin/posts/create', [AdminPostController::class, 'create']);
    // Route::post('admin/posts', [AdminPostController::class, 'store']);
    
    // Route::get('admin/posts', [AdminPostController::class, 'index']);
    // Route::get('admin/posts/{post}/edit', [AdminPostController::class, 'edit']);
    // Route::patch('admin/posts/{post}', [AdminPostController::class, 'update']);
    // Route::delete('admin/posts/{post}', [AdminPostController::class, 'destroy']);
});




