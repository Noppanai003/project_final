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
        'license',
        'fname',
        'lname',
        'user_id' 

    ];
    
    public function Makecar()
    {
        return $this->belongsTo(Makecar::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function Notification()
    {
        return $this->hasMany(Notification::class);
    }

    public function deleteImage()
    {
        Storage::delete($this->image2);
    }
}
