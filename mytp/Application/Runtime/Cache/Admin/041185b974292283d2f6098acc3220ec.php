<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
< xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>欢迎登录后台管理系统</title>
    <link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
    <script language="JavaScript" src="/Public/Admin/js/jquery.min.js"></script>
    <script src="/Public/Admin/js/cloud.js" type="text/javascript"></script>
    <script src="/Public/layui/layui/layui.js"></script>

</head>

<body style="background-color:#1c77ac;background-repeat:no-repeat; background-position:center top; overflow:hidden;">

<div id="mainBody">
    <div id="cloud1" class="cloud"></div>
    <div id="cloud2" class="cloud"></div>
</div>

<div class="logintop">
    <span>欢迎登录后台管理界面平台</span>
    <ul>
        <li><a href="#">回首页</a></li>
        <li><a href="#">帮助</a></li>
        <li><a href="#">关于</a></li>
    </ul>
</div>

<div class="loginbody">
    <span class="systemlogo"></span>
    <div class="loginbox loginbox1">

        <form action="<?php echo U('loginAction');?>" method="post">
<!--            {csrf_field()}-->
            <ul>
                <li><input name="uname" value="" type="text" class="loginuser" placeholder="用户名"  /></li>
                <li><input name="upass" value="" type="password" class="loginpwd" placeholder="密　码" /></li>
                <li class="yzm">
                    <span><input name="verify1" id="verify1" type="text" placeholder="验证码" /></span>
                    <cite><img src="<?php echo U('createVerify');?>" alt="" onclick="this.src=this.src+'?rand='+Math.random()"></cite>
                </li>
                <li>
                    <input name="login" type="submit" class="loginbtn" value="登录"   />
                    <label><input name="" type="checkbox" value="" checked="checked" />记住密码</label>
                    <label><a href="#">忘记密码？</a></label>
                </li>
            </ul>
        </form>
    </div>
</div>

</body>
<script language="javascript">
    $(function(){
        $('.loginbox').css({'position':'absolute','left':($(window).width()-692)/2});
        $(window).resize(function(){
            $('.loginbox').css({'position':'absolute','left':($(window).width()-692)/2});
        })
    });
</script>
<script>
    $('#verify1').blur(function () {
        var verify1 = $('#verify1').val();
        if(verify1!=""){
            var _token = "{csrf_token()}";
            $.post("<?php echo U('ajax_verify');?>",{_token:_token,verify1:verify1},function(data){
                if(data.status==1){
                    layui.use('layer', function() {
                        var layer = layui.layer;
                        layer.msg('验证码正确!');
                })
                }if(data.status==2) {
                    layui.use('layer', function () {
                        var layer = layui.layer;
                        layer.msg('验证码错误!');
                    })
                }

            },'json')

        }else{
            layui.use('layer', function() {
                var layer = layui.layer;
                layer.msg('验证码不能为空');
            })
        }

    })
</script>
</html>