<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class PostCommentsController extends Controller
{
    public function store(Post $post)
    {
        Post::create(request()->all());
        request()->validate([
            'body' => 'required'
        ]);

        $post->comment()->create([
            'user_id' => request()->user()->id,
            'body' => request('body')
        ]);

        return back();
    }
}
