<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>jQuery.danmu.js jQuery弹幕插件</title>

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

    <div id="danmuarea" class=text-center">
    <div id="danmu" >
    </div>

</div>


<div class="text-center ctr" >
    <br>

    <button type="button"  onclick="resumer() ">弹幕开始/继续</button>&nbsp;&nbsp;&nbsp;&nbsp;
    <button type="button"  onclick="pauser()">弹幕暂停</button>  &nbsp;&nbsp;&nbsp;&nbsp;
    显示弹幕:<input type='checkbox' checked='checked' id='ishide' value='is' onchange='changehide()'> &nbsp;&nbsp;&nbsp;&nbsp;
    弹幕透明度:
    <input type="range" name="op" id="op" onchange="op()" value="100"> <br>
    当前弹幕运行时间(分秒)：<span id="time"></span>&nbsp;&nbsp;
    设置当前弹幕时间(分秒)： <input type="text" id="set_time" max=20 />
    <button type="button"  onclick="settime()">设置</button>

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
    <select name="position" id="position"   >
        <option value="0">滚动</option>
        <option value="1">顶端</option>
        <option value="2">底端</option>
    </select>
    <input type="textarea" id="text" max=300 />
    <button type="button"  onclick="send()">发送</button>
</div><br>


</div>

</div>	<!-- /container -->

<!-- Social links. @TODO: replace by link/instructions in template -->
{{--<section id="social">--}}
    {{--<div class="container">--}}
        {{--<div class="wrapper clearfix">--}}
            {{--<!-- AddThis Button BEGIN -->--}}
            {{--<div class="addthis_toolbox addthis_default_style">--}}
                {{--<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>--}}
                {{--<a class="addthis_button_tweet"></a>--}}
                {{--<a class="addthis_button_linkedin_counter"></a>--}}
                {{--<a class="addthis_button_google_plusone" g:plusone:size="medium"></a>--}}
            {{--</div>--}}
            {{--<!-- AddThis Button END -->--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</section>--}}
<!-- /social links -->



<!-- JavaScript libs are placed at the end of the document so the pages load faster -->

<script src="{{ asset('js/jquery-1.11.1.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.js') }}"></script>
<script src="{{ asset('js/headroom.min.js') }}"></script>
<script src="{{ asset('js/jQuery.headroom.min.js') }}"></script>
<script src="{{ asset('js/template.js') }}"></script>
<script src="{{ asset('js/highlight/highlight.pack.js') }}"></script>
<script src="{{ asset('js/jquery.danmu.js') }}"></script>
<script>hljs.initHighlightingOnLoad();</script>


<script>
    (function(){
        $("#danmu").danmu({
                // left:$("#danmuarea").offset().left,
                // top:$("#danmuarea").offset().top,
                // height: 445,
                //    width: 800,
                left:0,
                top:0,
                height:"100%",
                width:"100%",
                speed:30000,
                opacity:1,
                font_size_small:16,
                font_size_big:24,
                top_botton_danmu_time:6000
            }
        );
    })(jQuery);


    query();
    timedCount();


    var first=true;

    function timedCount()
    {
        $("#time").text($('#danmu').data("nowtime"));

        t=setTimeout("timedCount()",50)

    }



    function starter(){

        $('#danmu').danmu('danmu_start');

    }
    function pauser(){

        $('#danmu').danmu('danmu_pause');
    }
    function resumer(){

        $('#danmu').danmu('danmu_resume');
    }
    function stoper(){
        $('#danmu').danmu('danmu_stop');
    }

    function getime(){
        alert($('#danmu').data("nowtime"));
    }

    function getpaused(){
        alert($('#danmu').data("paused"));
    }

    function add(){
        var newd=
            { "text":"new2" , "color":"green" ,"size":"1","position":"0","time":60};

        $('#danmu').danmu("add_danmu",newd);
    }
    function insert(){
        var newd= { "text":"new2" , "color":"green" ,"size":"1","position":"0","time":50};
        str_newd=JSON.stringify(newd);
        $.post("stone.php",{danmu:str_newd},function(data,status){alert(data)});
    }
    function query() {
        $.get("api/barrage/list",function(data){
            var danmu_from_sql=eval(data);

            for (var i=0;i<danmu_from_sql.length;i++){
                var danmu = danmu_from_sql[i];
                var newd = { "text":danmu["text"] , "color":danmu["color"] ,"size":danmu["size"],"position":danmu["position"],"time":danmu["time"], "isnew":danmu["isnew"]};
                $('#danmu').danmu("add_danmu",newd);
            }
        });
    }

    function send(){
        var text = document.getElementById('text').value;
        var color = document.getElementById('color').value;
        var position = document.getElementById('position').value;
        var time = $('#danmu').data("nowtime")+5;
        var size =document.getElementById('text_size').value;

        //保存
        var data = {text:text, color:color, position:position, time:time, size:size, isnew:"1"};
        $.post("api/barrage/add",data);

        var text_obj='{ "text":"'+text+'","color":"'+color+'","size":"'+size+'","position":"'+position+'","time":'+time+',"isnew":""}';
        var new_obj=eval('('+text_obj+')');
        $('#danmu').danmu("add_danmu",new_obj);
        document.getElementById('text').value='';
    }

    function op(){
        var op=document.getElementById('op').value;
        $('#danmu').data("opacity",op);
    }


    function changehide() {
        var op = document.getElementById('op').value;
        op = op / 100;
        if (document.getElementById("ishide").checked) {
            jQuery('#danmu').data("opacity", op);
            jQuery(".flying").css({
                "opacity": op
            });
        } else {
            jQuery('#danmu').data("opacity", 0);
            jQuery(".flying").css({
                "opacity": 0
            });
        }
    }


    function settime(){
        var t=document.getElementById("set_time").value;
        t=parseInt(t)
        console.log(t)
        $('#danmu').data("nowtime",t);
    }
</script>

</body>
</html>