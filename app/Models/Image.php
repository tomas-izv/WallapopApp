<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'sale_id',
        'route',
    ];

    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }
}