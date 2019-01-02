<?php
/**
 * Created by PhpStorm.
 * User: ly
 * Date: 2019/1/2
 * Time: 下午10:53
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';

    protected $guarded = ['id'];


    public function articleTag(){
        return $this->hasMany(ArticleTag::class, 'article_id', 'id');
    }

    
}