<?php if (!defined('THINK_PATH')) exit();?><script>
    var _hmt = _hmt || [];
    (function() {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?20dda60e93ca81dfa5cb1bac550671d0";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();
</script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LOVE YOU</title>
    <script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
    <link rel="stylesheet" href="http://apps.bdimg.com/libs/bootstrap/3.3.4/css/bootstrap.min.css" >
    <script src="https://cdn.bootcss.com/clipboard.js/2.0.1/clipboard.min.js"></script>
    <link rel="stylesheet" href="https://cdn.bootcss.com/weui/1.1.3/style/weui.min.css">
    <link href="https://cdn.bootcss.com/jquery-weui/1.2.1/css/jquery-weui.min.css" rel="stylesheet">
    <script src="https://cdn.bootcss.com/jquery-weui/1.2.1/js/jquery-weui.min.js"></script>
    <style>
        body{
            background: #f2709c;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #ff9472, #f2709c);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #ff9472, #f2709c); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

        }
    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
</head>
<body>
<div class="container">
    <center>
        <div class="row col-md-3"></div>
        <div class="row col-md-6" >
            <div class="row question">
                <div class="col-md-6 col-xs-12">
                    <p style="line-height: 50px;font-size: 16px;color:#fff">“小姐姐，我观察你很久了”</p>
                    <p style="line-height: 50px;font-size: 25px;color:#fff">做我女朋友好不好？</p>
                </div>
                <div class="col-md-6 col-xs-12">
                    <img src="http://b.love.wakew.cn/page/last/1.png" alt="" style="height: 200px;">
                </div>
            </div>
            <div class="row question" style="margin-top: 20px;">
                <div class="col-md-6 col-xs-6" style="text-align: center;">
                    <button type="button" class="btn btn-success cr" style="width: 80%" id="no">好</button>
                </div>
                <div class="col-md-6 col-xs-6" style="text-align: center;">
                    <button type="button" class="btn btn-danger cr" style="width: 80%" id="ok">不好</button>
                </div>
            </div>
            <div class="col-md-12 col-xs-12 hide" id="success">
                <img src="http://b.love.wakew.cn/page/last/love.jpg" alt="" style="width: 100%;">
            </div>
        </div>

        <div class="row col-md-3"></div>
    </center>
</div>
<script>
    var i=1;
    var ok=false;
    $(document).ready(function(){
        $("#no").click(function(){
            $.alert("真的吗？你答应了？",function(){
                $.alert("给我发消息吧，爱你",function(){
                    $(".question").addClass('hide');
                    $("#success").removeClass('hide');
                    ok=true;
                });
            });
        });
        $("#ok").click(function(){
            switch(i){
                case 1: $.alert('工资上交');break;case 2: $.alert('会做饭');break;case 3: $.alert('保大');break;case 4: $.alert('没有女闺蜜');break;case 5: $.alert('我妈会游泳');break;case 6: $.alert('永远永远爱你');break;                default:
                    $.alert("答应我吧");
            }
            i++;
        });
    });
</script>
</body>
</html>