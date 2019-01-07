<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;



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
        if (strpos($last_message, 'dgit ev') === 0){
            system('sudo git checkout dev');
            system('sudo git pull');
        }elseif (strpos($last_message, 'master') === 0) {
            system('sudo git checkout master');
            system('sudo git pull');
        }else{

        }

        $ee = system('whoami');

    return $ee;
//        return 'hello ly!';
    }





}
