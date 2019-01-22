<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Danmu extends Model
{
    protected $dates = ['published_at'];
    protected $fillable = ['device', 'nickName', 'avatar', 'text', 'color', 'size', 'isnew'];
}
