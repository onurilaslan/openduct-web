<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\PostImage;

class Post extends Model {

    protected $table = 'posts';

    protected $fillable = [
        'title',
        'content',
        'slug',
    ];
    

    public function scopeSlugLike($query, $slug)
    {
        return $query->where('slug', 'like', $slug . '%');
    }

    public function scopeWithSlug($query, $slug)
    {
        return $query->whereSlug($slug);
    }

    public function author() {
        return $this->belongsTo(User::class);
    }
    
    public function post_images() {
        return $this->hasMany(PostImage::class);
    }

}