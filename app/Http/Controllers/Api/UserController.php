<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->content = array();
    }
    public function login()
    {
        // dd(request('name'));
        if(Auth::attempt(['name' => request('name'), 'password' => request('password')]))
        {
            $user = Auth::user();
            $this->content['token'] =  $user->createToken('Pi App')->accessToken;
            $status = 200;
        } else {

            $this->content['error'] = "未授权";
            $status = 401;
        }
        return response()->json($this->content, $status);
    }
    public function passport()
    {
        return response()->json(['user' => Auth::user()]);
    }

}
