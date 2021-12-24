<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * section 2 , 12 (find a composer package for post metadata)
     * 
     */
    public $title;
    public $excerpt;
    public $date;
    public $body;
    public $slug;

    public function __construct($title , $excerpt , $date , $body ,$slug) {
        $this -> title = $title;
        $this -> excerpt = $excerpt;
        $this -> date = $date;
        $this -> body = $body;
    }

    /**
     * use model with directory
     * 
     */
    public static function all () {
        $files = File::files(resource_path("posts/"));

        return array_map(fn($file) => $file->getContents() , $files);

        // other way
        // return cache()->rememberForever('posts.all') , function () {
        // return collect(File::files(resource_path("posts/")))
        //     ->map(fn($file) => YamlFrontMatter::parseFile($file))
        //     ->map(fn($document) => new Post(
        //         $document -> title,
        //         $document -> excerpt,
        //         $document -> date,
        //         $document -> body(),
        //         $document -> slug
        //     ))
        //     ->sortBy('date');
        // });
    }

    /**
     * use model with directory
     * 
     * @param $slug
     */
    public static function find($slug) 
    {
        $path = resource_path("posts/{$slug}.html");
        if(! file_exists($path)) {
            abort(404);
        }
    
        return $post = file_get_contents($path);

        // otherr way , section 02 , 12 (find a composer package for metadata)
            // $posts = static::all();
            // return $posts->firstWhere('slug', $slug);
    }

}
