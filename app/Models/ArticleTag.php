<?php
/**
 * Created by PhpStorm.
 * User: ly
 * Date: 2019/1/2
 * Time: 下午10:53
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class ArticleTag extends Model
{
    protected $fillable = ['article_id', 'tag_id'];

    public $timestamps = false;
}