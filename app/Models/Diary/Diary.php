<?php

namespace App\Models\Diary;

use Illuminate\Database\Eloquent\Model;

class Diary extends Model
{
    protected $fillable = ['category_id', 'content'];

    public function tags(){
        return $this->belongsToMany(DiaryTag::class, 'diary_tag_pivot');
    }



}
