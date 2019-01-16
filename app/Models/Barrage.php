<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barrage extends Model
{
    protected $dates = ['published_at'];
    protected $fillable = ['nickName', 'avatar', 'content'];

}
