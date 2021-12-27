<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * section 04 ,Show All Posts Associated With a Category
     * 
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
