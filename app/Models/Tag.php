<?php
/**
 * Created by PhpStorm.
 * User: ly
 * Date: 2019/1/2
 * Time: 下午10:55
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['tag_name', 'article_number'];

    protected $table = 'tags';


    public function article(){
        return $this->belongsToMany(Article::class, 'article_tags', 'tag_id', 'article_id');
    }
}