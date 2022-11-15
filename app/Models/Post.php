<?php

namespace App\Models;

use App\Models\Post\PostImage;
use App\Models\Post\PostLike;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'body', 'type'];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function photo()
    {
        return $this->hasOne(PostImage::class,'post_id');
    }

    public function likes()
    {
        return $this->hasMany(PostLike::class, 'post_id');
    }

}
