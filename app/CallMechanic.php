<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class CallMechanic extends Model
{
    protected $fillable =
    [
        'user_id',
        'posts_id',
        'post1s_id',
        'gencode',    
        'info', 
        'cartel',        
        'image3',  
        'lat',
        'long',
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
