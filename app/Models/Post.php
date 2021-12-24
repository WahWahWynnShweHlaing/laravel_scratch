<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use File;

class Post
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * section 2 , 12 (find a composer package for post metadata)
     * 
     */
    public $title;

    public function __construct($title) {
        $this -> title = $title;
    }

    /**
     * use model with directory
     * 
     */
    public static function all () {
        $files = File::files(resources_path("posts/"));

        return array_map(fn($files) => $file->getContents() , $files);
    }

    /**
     * use model with directory
     * 
     * @param $slug
     */
    public static function find($slug) {

        $path = resource_path("posts/{$slug}.html");
        if(! file_exists($path)) {
            abort(404);
        }
    
        return $post = file_get_contents($path);
    }

}
