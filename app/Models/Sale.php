<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    //
    protected $fillable = [
        'product',
        'description',
        'price',
        'category_id',
        'user_id',
        'isSold',
        'buyer_id',
        'img'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

}