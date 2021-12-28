<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class PostImage extends Model {

    protected $table = 'post_images';

    protected $fillable = [
        'post_id',
        'post_image_path',
    ];
    
    public function post() {
        return $this->belongsTo(Post::class);
    }
}