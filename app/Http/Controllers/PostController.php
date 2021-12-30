<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    public function index()
    {
        // $this->authorize('admin');
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
}
