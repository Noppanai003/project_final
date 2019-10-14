<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $fillable =
    [
        'user_id',
        'posts_id',

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
