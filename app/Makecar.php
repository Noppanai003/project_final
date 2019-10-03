<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Makecar extends Model
{
    protected $fillable = ['title'];

    public function Post1()
    {
        return $this->hasMany(Post1::class);
    }
}
