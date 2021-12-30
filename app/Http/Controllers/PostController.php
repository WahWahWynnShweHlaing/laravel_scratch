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

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'title' => 'required',
            'thumbnail' => 'required|image',
            'slug' => 'required',
            'excerpt'=>'required',
            'body'=> 'required',
            'category_id' => 'required'
        ]);


        $attributes['user_id'] = auth()->id();
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');

        Post::create($attributes);

        return redirect('/');

    }
}
