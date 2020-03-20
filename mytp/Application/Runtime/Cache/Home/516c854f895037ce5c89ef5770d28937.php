<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--   <title>我的生活</title> -->
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- <link rel="shortcut icon" href="/favicon.ico"> -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link rel="stylesheet" href="http://g.alicdn.com/msui/sm/0.6.2/css/sm.min.css">
    <link rel="stylesheet" href="http://g.alicdn.com/msui/sm/0.6.2/css/sm-extend.min.css">
    <link rel="stylesheet" type="text/css" href="/Public/Homewx/css/font-awesome.css" />
    <link rel="stylesheet" type="text/css" href="/Public/layui/css/layui.css" />
    <style type="text/css">
        .image-roll {
            width: 100%;
            height: 80%;
        }

        .swiper-container {
            /*height: 200px;*/
            padding-bottom: 0px;
        }

        .head-new {
            background-color: #fff;
            height: 80px;
            margin-bottom: 5px;
        }

        .head-new-left {
            height: 80px;
            width: 20%;
            float: left;
        }

        .head-new-right {
            height: 80px;
            float: left;
            width: 80%;
        }

        .head-img {
            width: 80px;
        }

        .text-head {
            font-size: 16px;
            padding-top: 12px;
            padding-right: 14px;
            overflow: hidden;
        }

        .bcolor {
            background-color: #fff;
        }

        .content-block {
            margin: 0;
            padding: 0;
        }

        .list-content {
            padding: 10px;
        }

        .buttons-tab:after {
            background-color: rgba(208, 208, 208, 0.28);
        ;
        }

        .buttons-tab .button.active {
            color: #f97711;
            border-color: #f97711;
        }

        .card {
            box-shadow: 0 0 0 rgba(0, 0, 0, .3);
        }

        .text-c {
            overflow: hidden;
            padding: 5px;
        }

        .img-c {
            width: 32%;
            float: left;
            padding-left: 5px;
        }

        .icon-c {
            color: #f97711;
            padding-right: 5px;
        }

        .foot-c {
            width: 60px;
            float: left;
        }

        .infinite-scroll-preloader {
            margin-top: 40px;
        }

        .head-btn {
            color: #f97711;
            font-size: 25px;
            width: 100%;
            top: 60px;
            z-index: 2000;
            position: absolute;
        }

        .btn-left {
            width: 15%;
            float: left;
            padding-left: 2%;
        }

        .btn-right {
            width: 15%;
            float: right;
        }

        .btn1 {
            z-index: 3333;
            height: 50px;
            color: #fff;
        }

        .item-img {
            border-radius: 27px;
        }

        .facebook-avatar {
            margin-right: 15px;
        }

        .facebook-date {
            margin-top: 7px;
        }

        .card {
            padding-bottom: 10px;
            border-bottom: 1px solid rgba(208, 208, 208, 0.28);
        }

        .total-num {
            color: #f97711;
            font-size: 13px;
            float: right;
        }

        .left-user {
            background-color: #fff;
            border-right: 1px solid rgba(208, 208, 208, 0.28);
        }

        .left-head-1 {
            position: absolute;
            left: 50%;
            margin-left: -30px;
            top: 5%;
        }

        .left-user-1 {
            width: 60px;
            height: 60px;
            border-radius: 30px;
            border: 2px solid #fff;
        }

        .left-con {
            font-size: 16px;
            padding-left: 15px;
            padding-right: 15px;
        }

        .list-block {
            padding-left: 0rem;
        }

        .item-l {
            border-bottom: 1px solid rgba(51, 51, 51, 0.07);
        ;
            padding-left: 0px!important;
        }

        .list-block .item-media+.item-inner {
            margin-left: 0px!important;
        }

        .item-title {
            font-size: 16px;
        }

        .dot-left {
            margin-right: 10px;
            width: 10px;
        }

        .morecon {
            margin: 4px;
            color: #f97711;
        }

        .upmore {
            margin: 4px;
            color: #f97711;
        }

        .o-color {
            color: #f97711;
        }

        .dong {
            height: auto;
            transition: height 2s;
            -moz-transition: height 2s;
            /* Firefox 4 */
            -webkit-transition: height 2s;
            /* Safari 和 Chrome */
            -o-transition: height 2s;
            /* Opera */
        }

        .height-a {
            height: 72px;
        }

        .w-color {
            background-color: #fff;
        }

        .c-head {
            margin: 0px;
        }

        .edit {
            z-index: 9999;
            position: absolute;
            left: 80%;
            top: 90%;
        }

        .list-block ul:before {
            background-color: #fff;
        }

        .list-block ul:after {
            background-color: #fff;
        }

        .my-info {
            padding-left: 10px
        }
    </style>
</head>

<body>
<!--  <img class="image-roll" src="./images/test.jpg" alt=""> -->
<!-- 你的html代码 -->
<!-- page集合的容器，里面放多个平行的.page，其他.page作为内联页面由路由控制展示 -->
<div class="page-group">
    <!-- 单个page ,第一个.page默认被展示-->
    <div class="page">
        <div class="content-block" style="background: #fff!important;height:800px;">
            <div>
                <div class="left-head-1">
                    <img class="left-user-1" src="/Public/Homewx/img/left-user.jpg">
                    <div style="margin-left:0px;color:#fff;font-size:15px;margin-top:10px">欢迎注册！</div>
                </div>
                <img style="width:100%" src="/Public/Homewx/img/left-head-all.png">
            </div>
            <form action="<?php echo U('regAction');?>" method="post">
            <div class="left-con " style="margin-top:-40px">
                <div class="list-block">
                    <ul>
                        <li>
                            <div class="item-content">
                                <div class="item-media"><i class="icon icon-form-name"></i></div>
                                <div class="item-inner">
                                    <div class="item-title label">昵&nbsp&nbsp&nbsp&nbsp称</div>
                                    <div class="item-input">
                                        <input type="text" id="uname" name="uname" placeholder="请输入昵称">
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="item-content">
                                <div class="item-media"><i class="icon icon-form-name"></i></div>
                                <div class="item-inner">
                                    <div class="item-title label">手机号</div>
                                    <div class="item-input">
                                        <input type="text" id="phone" name="phone" placeholder="请输入手机号">
                                    </div>
                                </div>
                            </div>
                            <span id="ph"></span>
                        </li>
                        <li>
                            <div class="item-content">
                                <div class="item-media"><i class="icon icon-form-email"></i></div>
                                <div class="item-inner">
                                    <div class="item-title label">验证码</div>
                                    <div class="item-input">
                                        <input type="text" name="verify" id="verify" placeholder="请输入验证码">
                                    </div>
                                </div>
                                <div style="position:absolute;top:10px;right:0px;width:100px;text-align:center;border-radius:4px;border-color:#ff6800;color:#ff6800;">
                                    <img src="/index.php/Home/Index/verify" alt="" onclick="this.src = this.src+'?rand='+'Math.random()'"></div>
                            </div>
                            <span id="sp"></span>
                        </li>
                        <li>
                            <div class="item-content">
                                <div class="item-media"><i class="icon icon-form-password"></i></div>
                                <div class="item-inner">
                                    <div class="item-title label">密&nbsp&nbsp&nbsp&nbsp码</div>
                                    <div class="item-input">
                                        <input type="password" name="upass" value="" id="upass" placeholder="请输入密码" class="">
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                        <li>
                            <div class="item-content">
                                <div class="item-media"><i class="icon icon-form-password"></i></div>
                                <div class="item-inner">
                                    <div class="item-title label">确认密码</div>
                                    <div class="item-input">
                                        <input type="password" id="repass" value=""  placeholder="请再次输入密码" class="">
                                    </div>
                                </div>
                            </div>
                        <span id="spa"></span>
                        </li>
                        <li>
                    </ul>
                    <div class="content-block">
                        <div class="row" style="margin-top:30px">
                            <div class="col-100"><input type="submit" class=" button button-big button-fill " style="background-color:#ff6800">注册</div>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>

    </div>
</div>
<script type='text/javascript' src='http://g.alicdn.com/sj/lib/zepto/zepto.min.js' charset='utf-8'></script>
<script type='text/javascript' src='http://g.alicdn.com/msui/sm/0.6.2/js/sm.min.js' charset='utf-8'></script>
<script type='text/javascript' src='http://g.alicdn.com/msui/sm/0.6.2/js/sm-extend.min.js' charset='utf-8'></script>
<script type="text/javascript" src="/Public/Common/jquery.js"></script>
<script type="text/javascript" src="/Public/layui/layui.js"></script>
<script>
    $('#repass').blur(function () {
        var up = $('#upass').val();
        var rep = $('#repass').val();
        if (!(up == rep)){
            $('#spa').text('请保持密码和确认密码一致!!!').css('color','red')

        }
    })

    $('#phone').blur(function () {
        var phone = $('#phone').val();
        reg = /^1([38][0-9]|4[579]|5[0-3,5-9]|6[6]|7[0135678]|9[89])\d{8}$/;
        if (!reg.test(phone)){
            $('#ph').text('请输入正确的手机格式!!!').css('color','red')
        }
    })

    $('form').submit(function (e) {
        var uname = $('#uname').val();
        var phone = $('#phone').val();
        var verify = $('#verify').val();
        var upass = $('#upass').val();
        var repass = $('#repass').val();

        if (!uname){
            layui.use('layer', function () {
                var layer = layui.layer;
                layer.msg('请填写昵称!!!');
            })
            return false;
        }
        if (!phone){
            layui.use('layer', function () {
                var layer = layui.layer;
                layer.msg('请填写手机号!!!');
            })
            return false;
        }
        if (!verify){
            layui.use('layer', function () {
                var layer = layui.layer;
                layer.msg('请填写验证码!!!');
            })
            return false;
        }
        if (!upass){
            layui.use('layer', function () {
                var layer = layui.layer;
                layer.msg('请填写密码!!!');
            })
            return false;
        }
        if (!repass){
            layui.use('layer', function () {
                var layer = layui.layer;
                layer.msg('请填写确认密码!!!');
            })
            return false;
        }
    })
</script>
<script>
    $('#verify').blur(function () {
        var verify = $('#verify').val();
        $.post("<?php echo U('ajaxVerify');?>",{verify:verify},function (data) {
            if (data.status == 1){
                $('#sp').text('验证码正确!!!')
            }else{
                $('#sp').text('验证码错误!!!').css('color','red')
            }
        },'json');
    })
</script>


</body>

</html>