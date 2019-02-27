<?php

namespace App\Models\Diary;

use Illuminate\Database\Eloquent\Model;

class DiaryCategory extends Model
{

    public function diaries(){
        return $this->hasMany(Diary::class, 'category_id');
    }
}
