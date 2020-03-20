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
    <link rel="stylesheet" type="text/css" href="./css/font-awesome/css/font-awesome.css">
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
                    <img class="left-user-1" src="./images/left-user.jpg">
                    <div style="margin-left:0px;color:#fff;font-size:15px;margin-top:10px">欢迎注册！</div>
                </div>
                <img style="width:100%" src="./images/left-head-all.png">
            </div>
            <div class="left-con " style="margin-top:-40px">
                <div class="list-block">
                    <ul>
                        <li>
                            <div class="item-content">
                                <div class="item-media"><i class="icon icon-form-name"></i></div>
                                <div class="item-inner">
                                    <div class="item-title label">昵&nbsp&nbsp&nbsp&nbsp称</div>
                                    <div class="item-input">
                                        <input type="text" placeholder="请输入昵称">
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
                                        <input type="text" placeholder="请输入手机号">
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="item-content">
                                <div class="item-media"><i class="icon icon-form-email"></i></div>
                                <div class="item-inner">
                                    <div class="item-title label">验证码</div>
                                    <div class="item-input">
                                        <input type="email" placeholder="请输入验证码">
                                    </div>
                                </div>
                                <div style="position:absolute;top:10px;right:0px;border:1px solid #999;width:100px;text-align:center;border-radius:4px;border-color:#ff6800;color:#ff6800;">发送验证码</div>
                            </div>
                        </li>
                        <li>
                            <div class="item-content">
                                <div class="item-media"><i class="icon icon-form-password"></i></div>
                                <div class="item-inner">
                                    <div class="item-title label">密&nbsp&nbsp&nbsp&nbsp码</div>
                                    <div class="item-input">
                                        <input type="password" placeholder="请输入密码" class="">
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
                                        <input type="password" placeholder="请再次输入密码" class="">
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                    </ul>
                    <div class="content-block">
                        <div class="row" style="margin-top:30px">
                            <div class="col-100"><a href="#" class=" button button-big button-fill " style="background-color:#ff6800">注册</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type='text/javascript' src='http://g.alicdn.com/sj/lib/zepto/zepto.min.js' charset='utf-8'></script>
<script type='text/javascript' src='http://g.alicdn.com/msui/sm/0.6.2/js/sm.min.js' charset='utf-8'></script>
<script type='text/javascript' src='http://g.alicdn.com/msui/sm/0.6.2/js/sm-extend.min.js' charset='utf-8'></script>
<script>
    $.init();
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $(".text-c").each(function() {
            height = $(this).height();
            if (height > 72) {
                $(this).addClass("height-a");
                $(this).after("<p class=\"morecon\" >点开更多内容&nbsp&nbsp&or;</p>");
            }
        });


        $(".morecon").click(function() {
            $(this).parent().children(".text-c").removeClass("height-a");
            $(this).parent().children(".text-c").addClass("dong");
            //$(this).parent().children(".text-c").css("height","auto");


            $(this).css("display", "none");

        });

    });
    // 加载flag
    var loading = false;
    // 最多可加载的条目
    var maxItems = 100;

    // 每次加载添加多少条目
    var itemsPerLoad = 2;

    function addItems(number, lastIndex) {
        // 生成新条目的HTML
        var html = '';
        for (var i = lastIndex + 1; i <= lastIndex + number; i++) {
            html += '<li class="card facebook-card">' +
                '<div class="card-header no-border">' +
                '<div style="float:right">' +
                '<span style="color:#f97711;font-size:13px;">置顶</span>' +
                '</div>' +
                '<div class="facebook-avatar"><img src="./images/user.png" width="44" height="44"></div>' +
                '<div class="facebook-name">李女士</div>' +
                '<div class="facebook-date">一天前&nbsp&nbsp&nbsp&nbsp&nbsp来自<span style="color:#f97711">健康养生话题</span></div>' +
                '</div>' +
                '<div class="text-c">测试2测试2测试2测试2测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试</div>' +
                '<div class="card-content"><img class="img-c" src="http://gqianniu.alicdn.com/bao/uploaded/i4//tfscom/i3/TB10LfcHFXXXXXKXpXXXXXXXXXX_!!0-item_pic.jpg_250x250q60.jpg">' +
                '<img class="img-c" src="http://gqianniu.alicdn.com/bao/uploaded/i4//tfscom/i3/TB10LfcHFXXXXXKXpXXXXXXXXXX_!!0-item_pic.jpg_250x250q60.jpg">' +
                '<img class="img-c" src="http://gqianniu.alicdn.com/bao/uploaded/i4//tfscom/i3/TB10LfcHFXXXXXKXpXXXXXXXXXX_!!0-item_pic.jpg_250x250q60.jpg"></div>' +
                '<div class="card-footer no-border" style="    width: 220px;padding-left:5px;background-color:#fff">' +
                '<div class="foot-c"><a href="#"><i class="fa fa-eye icon-c"></i>231</a></div>' +
                '<div class="foot-c"><a href="#"><i class="fa fa-thumbs-o-up icon-c"></i>231</a></div>' +
                '<div class="foot-c"><a href="#"><i class="fa fa-comment-o icon-c"></i>231</a></div>' +
                '</div>' +
                '</li>'
        }
        // 添加新条目
        $('.infinite-scroll-bottom .list-container').append(html);

    }
    //预先加载20条
    addItems(itemsPerLoad, 0);

    // 上次加载的序号

    var lastIndex = 20;

    // 注册'infinite'事件处理函数
    $(document).on('infinite', '.infinite-scroll-bottom', function() {

        // 如果正在加载，则退出
        if (loading) return;

        // 设置flag
        loading = true;

        // 模拟1s的加载过程
        setTimeout(function() {
            // 重置加载flag
            loading = false;

            if (lastIndex >= maxItems) {
                // 加载完毕，则注销无限加载事件，以防不必要的加载
                $.detachInfiniteScroll($('.infinite-scroll'));
                // 删除加载提示符
                $('.infinite-scroll-preloader').remove();
                return;
            }

            // 添加新条目
            addItems(itemsPerLoad, lastIndex);
            // 更新最后加载的序号
            lastIndex = $('.list-container li').length;
            //容器发生改变,如果是js滚动，需要刷新滚动
            $.refreshScroller();
        }, 1000);
    });

    $(document).on('refresh', '.pull-to-refresh-content', function(e) {
        // 模拟2s的加载过程
        setTimeout(function() {
            var cardNumber = $(e.target).find('.card').length + 1;
            var cardHTML = '<div class="card">' +
                '<div class="card-header">card' + cardNumber + '</div>' +
                '<div class="card-content">' +
                '<div class="card-content-inner">' +
                '这里是第' + cardNumber + '个card，下拉刷新会出现第' + (cardNumber + 1) + '个card。' +
                '</div>' +
                '</div>' +
                '</div>';

            $(e.target).find('.card-container').prepend(cardHTML);
            // 加载完毕需要重置
            $.pullToRefreshDone('.pull-to-refresh-content');
        }, 2000);
    });
</script>
</body>

</html>