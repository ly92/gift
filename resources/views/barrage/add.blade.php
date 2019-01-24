<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>大家一起聊</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <!-- Custom styles for our template -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap-theme.css') }}" media="screen" >
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('js/highlight/styles/monokai.css') }}">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="{{ asset('js/html5shiv.js') }}"></script>
    <script src="{{ asset('js/respond.min.js') }}"></script>
    <![endif]-->

    <style>
        body {
            font-family: "Microsoft YaHei" ! important;
            font-color:#222;
        }
        pre {
            line-height: 2em;
            font-family: "Microsoft YaHei" ! important;
        }
        h4 {
            line-height: 2em;
        }
        #danmuarea {
            position: relative;
            background: #222;
            width:800px;
            height: 445px;
            margin-left: auto;
            margin-right: auto;
        }


        .ctr {
            font-size: 1em;
            line-height: 2em;
        }
    </style>

</head>

<body class="home">

<!-- Intro -->
<div class="container text-center">
    <br> <br>

    <div class="text-center ctr" >
        <br>

        发弹幕:
        <select  name="color" id="color" >
            <option value="white">白色</option>
            <option value="red">红色</option>
            <option value="green">绿色</option>
            <option value="blue">蓝色</option>
            <option value="yellow">黄色</option>
        </select>
        <select name="size" id="text_size" >
            <option value="1">大文字</option>
            <option value="0">小文字</option>
        </select>

        <br>
        昵称：
        <input type="textarea" id="nickName" max=100 />
        <br>
        <br>
        <input type="textarea" id="text" max=300 />
        <button type="button"  onclick="send()">发送</button>
    </div><br>


</div>

</div>	<!-- /container -->

<script src="{{ asset('js/jquery-1.11.1.min.js') }}"></script>
<script src="{{ asset('js/jQuery.headroom.min.js') }}"></script>

<script>



    function send(){
        var device = navigator.platform;
        var nickName = document.getElementById('nickName').value;
        var avatar = "";
        var text = document.getElementById('text').value;
        var color = document.getElementById('color').value;
        var size =document.getElementById('text_size').value;
        //保存
        var data = {device:device, nickName:nickName, avatar:avatar, text:text, color:color, size:size, isnew:"1"};

        $.post("/api/barrage/add",data);
    }

</script>

</body>
</html>