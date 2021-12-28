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
        return view('section_03/posts',[
            "posts" => Post::latest()->filter(request(['search']))->get(),
            'categories' => Category::all()
        ]);
    }

    public function show(Post $post) 
    {
        return view('post',[
            "post" => $post
        ]);
    }

    // protected function getPosts()
    // {
    //     return Post::latest()->filter()->get();
    // }
}
