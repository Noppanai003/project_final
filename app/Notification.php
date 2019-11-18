<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'user_id',
        'post1s_id',
        'nonti_data',
        'startdate',
        'deadline'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function Post1()
    {
        return $this->belongsTo(Post1::class);
    }

    public function getStartDateAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

    public function getDeadlineAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }
}
