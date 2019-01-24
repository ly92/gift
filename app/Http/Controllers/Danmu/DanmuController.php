<?php

namespace App\Http\Controllers\Danmu;

use App\Models\Danmu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DanmuController extends Controller
{

    protected $fields = [
        'device' => '',
        'nickName' => '',
        'avatar' => '',
        'text' => '',
        'color' => 'green',
        'size' => '1',
        'isnew' => '1',
    ];


    public function index()
    {
        return view('barrage.index');
    }

    //
    public function create()
    {
        return view('barrage.add');
    }


    public function add(Request $request)
    {
        $danmu = new Danmu();

        foreach (array_keys($this->fields) as $field){
            $danmu->$field = $request->post($field);
        }
        $danmu->save();
    }


    //获取所有
    public function getAll(){
        $danmus = Danmu::all();

        return $danmus;
    }



}
