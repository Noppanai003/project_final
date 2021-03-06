<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role', 'idcard', 'phone', 'photo'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // กำหนดว่าจะให้แอดมินทำอะไร
    public function isAdmin()
    {
        return $this->role == 'admin';
    }

    public function deleteImage()
    {
        Storage::delete($this->photo);
    }

    public function isUser()
    {
        return $this->role == 'user';
    }

    public function isRevenue_officer()
    {
        return $this->role == 'revenue_officer';
    }

    public function isMember()
    {
        return $this->role == 'member';
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function Post1()
    {
        return $this->hasMany(Post1::class);
    }

    public function Notification()
    {
        return $this->hasMany(Notification::class);
    }

    public function CallMechanic()
    {
        return $this->hasMany(CallMechanic::class);
    }

    public function Promotion()
    {
        return $this->hasMany(Promotion::class);
    }

    public function Bill()
    {
        return $this->hasMany(Bill::class);
    }

    public function Articlerating()
    {
        return $this->hasMany(Articlerating::class);
    }
}
