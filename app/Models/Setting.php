<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'settings';

    protected $fillable = [
        "id",
        "name",
        "maxImages" ,
        "created_at" ,
        "updated_at"
    ];
}


