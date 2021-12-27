<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Category;

class Post extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    // protected $fillable = ['title','excerpt','body', 'id'];

    /**
     * section 04 Route Model Binding
     * 
     */
    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }

    /**
     * section 04 ,Your First Eloquent Relationship
     * 
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

     /**
     * section 04 , Database Seeding Saves Timep
     * 
     */
    public function author()
    {
        return $this->belongsTo(User::class , 'user_id');
    }
}
