<?php
/**
 * Created by PhpStorm.
 * User: ly
 * Date: 2019/1/2
 * Time: 下午10:54
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $fillable = ['name', 'url', 'sequence'];
}