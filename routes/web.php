<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use Spatie\YamlFrontMatter\YamlFrontMatter;

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
    // return view('my_blog');

    // use model with directory
    // return view('my_blog', [
    //     "my_blog" => Post::all()
    // ]);
    $posts = [];

    foreach($files as $file) {
        $path = __DIR__."/../resources/posts/my_first_blog.html";
        $document = YamlFrontMatter::parse($path);

        $posts[] = new Post (
            $document -> title,
        );
    }

    ddd($document);
});

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


// section 2 , 11 (use filesystem class to read the Directory)
Route::get('posts/{post}', function ($slug) {
    $post = Post::find($slug);

    return view('post',[
        'post' => $post // return $post 
    ]);
});
