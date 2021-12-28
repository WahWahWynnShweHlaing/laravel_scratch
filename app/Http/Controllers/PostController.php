<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;

class PostController extends Controller
{
    public function index()
    {
        // return Post::latest()->filter(
        //     request(['search','category','author'])
        // )->paginate(3);

        return view('posts.index',[
            "posts" => Post::latest()->filter(
                    request(['search','category','author'])
                )->paginate(1)->withQueryString()   //->simplePaginate(1) 
        ]);
    }

    public function show(Post $post) 
    {
        return view('posts.show',[
            "post" => $post
        ]);
    }

    // protected function getPosts()
    // {
    //     return Post::latest()->filter()->get();
    // }
}
