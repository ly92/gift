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

    public  function getStatusAttribute($value){
        return $value == 1 ? '私密' : '公开';
    }


    public function tag(){
        return $this->belongsToMany(Tag::class, 'article_tags', 'article_id', 'tag_id');
    }

    public function category(){
        return $this->belongsTo(Category::class, 'cate_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}