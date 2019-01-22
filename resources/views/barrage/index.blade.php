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
    <div id="danmuarea" class=text-center">
        <div id="danmu"></div>
    </div>
</div>

</div>	<!-- /container -->

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

    starter();

    function starter(){

        $('#danmu').danmu('danmu_start');

    }

    // function pauser(){
    //
    //     $('#danmu').danmu('danmu_pause');
    // }
    // function resumer(){
    //
    //     $('#danmu').danmu('danmu_resume');
    // }
    // function stoper(){
    //     $('#danmu').danmu('danmu_stop');
    // }
    //
    // function getime(){
    //     alert($('#danmu').data("nowtime"));
    // }
    //
    // function getpaused(){
    //     alert($('#danmu').data("paused"));
    // }


    function query() {
        $.get("api/barrage/list",function(data){

            var danmu_from_sql=eval(data);
            for (var i=0;i<danmu_from_sql.length;i++){
                var danmu = danmu_from_sql[i];

                var date = danmu["created_at"];
                date = date.substring(0,19);
                date = date.replace(/-/g,'/');
                var timestamp = new Date(date).getTime()/1000;

                if (danmu['isnew'] == '1'){
                    var newd = { "nickName":danmu["nickName"], "avatar":danmu["avatar"], "text":danmu["text"], "color":danmu["color"], "size":danmu["size"], "time":timestamp};
                    $('#danmu').danmu("add_danmu",newd);
                }

            }
        });
    }

</script>

</body>
</html>