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
                    $query->where('title', 'like' , '%' . $search. '%')
                          ->orwhere('body', 'like' , '%' . $search. '%'));

        $query->when($filters['category'] ?? false, fn($query,$category) =>
                    // $query->whereExists(fn($query) => 
                    //     $query->from('categories')
                    //         ->where('categories.id','posts.category_id')
                    //         ->where('categories.slug',$category))
                $query->whereHas('category' , fn($query) =>
                $query->where('slug',$category))
        );
    }
}
