<?php

namespace App\Http\Controllers\Diary;

use App\Models\Diary\Diary;
use App\Models\Diary\DiaryCategory;
use App\Models\Diary\DiaryComment;
use App\Models\Diary\DiaryTag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DiaryController extends Controller
{

    protected $fields = [
        'category_id' => '',
        'content' => '',
    ];

    protected $tagFields = [
        'title' => '',
        'p_id' => '',
    ];


    //日记列表
    public function diaries(Request $request){
        $index = $request->get('index');
        $limit = $request->get('limit');

        $diaries = Diary::where('is_delete', '0')->offset($index)->limit($limit)->get();

        return $diaries->toJson();
    }

    //日记详情
    public function detail(Request $request){
        $diary_id = $request->get('id');
        $diary = Diary::where('id', $diary_id)->first();

        return $diary->toJson();
    }

    //新建日记
    public function create(Request $request){
        $diary = new Diary;
        foreach (array_keys($this->fields) as $field){
            $diary->$field = $request->get($field);
        }

        $result = $diary->save();
        if ($result){
            return 'success';
        }else{
            return 'fail';
        }
    }

    //删除日记
    public function delete(Request $request){
        $diary_id = $request->get('id');
        $diary = Diary::where('id', $diary_id)->first();
        $diary['is_delete'] = 1;

        $result = $diary->save();
        if ($result){
            return 'success';
        }else{
            return 'fail';
        }
    }

    //日记标签
    //列表
    public function tags(){
        return DiaryTag::all();
    }

    //新增
    public function createTag(Request $request){
        $tag = new DiaryTag;
        foreach (array_keys($this->tagFields) as $field){
            $tag->$field = $request->get($field);
        }
        $result = $tag->save();
        if ($result){
            return 'success';
        }else{
            return 'fail';
        }
    }


    //日记分类
    //列表
    public function categorys(){
        return DiaryCategory::all();
    }

    //新增
    public function createCategory(Request $request){
        $category = new DiaryCategory;
        $category['title'] = $request->get('title');
        $result = $category->save();
        if ($result){
            return 'success';
        }else{
            return 'fail';
        }
    }

    //日记感言
    public function comments(Request $request){
        $diary_id = $request->get('diary_id');
        $comments = DiaryCategory::where('diary_id', $diary_id);
        return $comments->toJson();
    }

    //新增日记感言
    public function createComment(Request $request){
        $comment = new DiaryComment;
        $comment['title'] = $request->get('title');
        $comment['diary_id'] = $request->get('diary_id');

        $result = $comment->save();
        if ($result){
            return 'success';
        }else{
            return 'fail';
        }
    }


}
