<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use App\Http\Controllers\PostController;

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

Route::get('/', [PostController::class,'index' ])->name('home');

// section 2 , 07 (make a route and link to it)
Route::get('/post', function () {
    return view('post_route');
});

// section 2 , 08 (Store blog post as HTML) using slug
Route::get('posts/{post}', function ($slug) {

    $path = __DIR__."/../resources/posts/{$slug}.html";

    // ddd($path);   // section 2 , 09 (route wildcard constraints)

    if(! file_exists($path)) {
        return redirect('/');
        //dd("file does not exits"); // dd show
        // abort(404);             //404 error
    }

    $post = file_get_contents($path);

    return view('post',[
        'post' => $post // return $post 
    ]);
});
// })->whereAlpha('post');  // section 2 , 09 (route wildcard constraints)
// })->whereNumber('post');  // section 2 , 09 (route wildcard constraints)


Route::get('posts/{post:slug}', [PostController::class , 'show']);


//section_03 
//section_03 , part_01 (Blade the absolute basic)
Route::get('/section03/posts', function () {
    $files = File::files(resource_path("posts"));

    $posts = [];
    foreach($files as $file) {
        $document = YamlFrontMatter::parseFile($file);

        $posts[] = new Post (
            $document -> title,
            $document -> excerpt,
            $document -> date,
            $document -> body(),
            $document -> slug
        );
        // ddd($posts);
    }
        return view('section_03/posts', [
            "posts" => $posts
        ]);
});
Route::get('posts/{post}', function ($slug) {
    $post = Post::findOrFail($slug);

    return view('post',[
        'post' => $post // return $post 
    ]);
});

//section_04
Route::get('categories/{category:slug}', function (Category $category) {

    return view('posts',[
        'posts' => $category->posts->load(['category' , 'author']),
        'currentCategory' => $category,
        'categories' => Category::all()
    ]);
})->name('category');

Route::get('authors/{author:username}', function (User $author) {

    return view('posts',[
        'posts' => $author->posts->load(['category' , 'author']),
        'categories' => Category::all()
    ]);
});