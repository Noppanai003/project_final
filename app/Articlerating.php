<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articlerating extends Model
{
    protected $fillable =
    [
        'posts_id',
        'user_id',
        'rating',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function posts()
    {
        return $this->belongsTo(Post::class);
    }   
}
