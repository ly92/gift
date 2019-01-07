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



    /**
    webhook

     */
    public function hook(Request $request){

        //查看当前账户，我服务器用的是nginx，所以这里返回的用户是‘nginx’
        // system('whoami');

        //重定位
        system('sudo cd /home/gift');
        //这一步很关键
        system('sudo unset GIT_DIR');
        //获取最新代码
        system('sudo git pull');

        //此次push的commit内容
        $messages = json_decode($request->get('commits'),true);
        $last_message = $messages[0]['message'];
        //选择分支
        if (strpos($last_message, 'dev') === 0){
            system('sudo git checkout dev');
            system('sudo git pull');
        }elseif (strpos($last_message, 'master') === 0) {
            system('sudo git checkout master');
            system('sudo git pull');
        }elseif(strpos($last_message,'passport') === 0){
            system('composer require laravel/passport');
            system('php artisan migrate');
            system('php artisan passport:install');

        }

        return 'hello ly!';
    }

}
