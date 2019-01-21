<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Danmu extends Model
{
    protected $dates = ['published_at'];
//    protected $fillable = ['nickName', 'avatar', 'text', 'color', 'size', 'position', 'time', 'isnew'];
    protected $fillable = ['text', 'color', 'size', 'position', 'time', 'isnew'];
}
