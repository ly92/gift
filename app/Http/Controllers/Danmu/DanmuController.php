<?php

namespace App\Http\Controllers\Danmu;

use App\Models\Danmu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DanmuController extends Controller
{

    protected $fields = [
//        'nickName' => '',
//        'avatar' => '',
        'text' => '',
        'color' => 'green',
        'size' => '1',
        'position' => '0',
        'time' => 60,
        'isnew' => '1',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('barrage.danmu');
    }



    public function add(Request $request)
    {

        $danmu = new Danmu();
        foreach (array_keys($this->fields) as $field){
            $danmu->$field = $request->post($field);
        }
        $danmu->save();
    }


    public function getAll(){
        $danmus = Danmu::all();
        return $danmus;
    }

}
