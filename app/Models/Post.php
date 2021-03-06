<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Category;
use App\Models\Comment;

class Post extends Model
{
    use HasFactory;
    
    // protected $guarded = [];

    /**
     * section 04 , Eager Load Relationships on an Existing Model
     */
    // protected $with = ['category' , 'author'];

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

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, fn($query,$search) =>
                $query->where(fn($query) => 
                    $query->where('title', 'like' , '%' . $search. '%')
                          ->orwhere('body', 'like' , '%' . $search. '%')));

        $query->when($filters['category'] ?? false, fn($query,$category) =>
                $query->whereHas('category' , fn($query) =>
                $query->where('slug',$category))
        );

        $query->when($filters['author'] ?? false, fn($query,$author) =>
        $query->whereHas('author' , fn($query) =>
        $query->where('username',$author))
        );
    }

    /**
     * section_10 function for comment
     */
    public function comment()
    {
        return $this->hasMany(Comment::class);
    }
}
