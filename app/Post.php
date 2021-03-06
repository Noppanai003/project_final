<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    protected $fillable =
    [
        'title',
        'fname',
        'lname',
        'description',
        'content',
        'city_name',
        'amphur',
        'district',
        // 'postcode',
        'tel',
        'category_id',
        'user_id',
        'image',
        'image1',
        'lat',
        'long',
        // 'day',
        'time_start',
        'time_end',

        // วันเปิดทำการ
        'mon',
        'tue',
        'wed',
        'thu',
        'fri',
        'sat',
        'sun',

        // ประเภทการบริการ
        'engine',
        'suspension',
        'electrical',
        'tank',
        'betterlet',

        //รายละเอียดเพิ่มเติม
        'detail_engine',
        'detail_suspension',
        'detail_electrical',
        'detail_tank',
        'detail_betterlet',

        //เรทราคาเริ่มต้น
        'start_price_engine',
        'start_price_suspension',
        'start_price_electrical',
        'start_price_tank',
        'start_price_betterlet',

        //ราคาสิ้นสุด
        'end_price_engine',
        'end_price_suspension',
        'end_price_electrical',
        'end_price_tank',
        'end_price_betterlet',

        // 'day_start',
        // 'day_end'

    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function Bill()
    {
        return $this->hasMany(Bill::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function CallMechanic()
    {
        return $this->hasMany(CallMechanic::class);
    }

    public function Articlerating()
    {
        return $this->hasMany(Articlerating::class);
    }

    public function category_store()
    {
        return $this->belongsTo(category_store::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function hasTag($tagId)
    {
        return in_array($tagId, $this->tags->pluck('id')->toArray());
    }

    public function deleteImage()
    {
        Storage::delete($this->image);
    }
}
