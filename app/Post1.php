<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Post1 extends Model
{
    protected $fillable =
    [
        'make',
        'model',
        'image2',
        'license' 

    ];

    public function deleteImage()
    {
        Storage::delete($this->image2);
    }
}
