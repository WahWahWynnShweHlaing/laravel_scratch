<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\PostCommentsController;

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
Route::get('ping', function() {
    $mailchimp = new \MailchimpMarketing\ApiClient();

    $mailchimp->setConfig([
        'apiKey' => config('services.mailchimp.key'),
        'server' => 'us20'
    ]);

    // $response = $mailchimp->ping->get();
    $response = $mailchimp->lists->getAllLists();
    // $response = $mailchimp->lists->addListMember('d3c0c95629',[
    //     'email_address' => 'wahwahwynnshwe@gmail.com',
    //     'status' => 'subscribed'
    // ]);
    ddd($response);
});

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

