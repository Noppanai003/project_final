<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Confirm extends Model
{
    protected $fillable =
    [
        'user_id',
        'call_mechanics_id',
        'status',
      
    ];
}
