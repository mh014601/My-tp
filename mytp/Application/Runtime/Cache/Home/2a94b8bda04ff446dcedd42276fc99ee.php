<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-Hans">
<head>
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta charset="utf-8">
    <title>首页</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="Cache-Control" content="no-siteapp">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="format-detection" content="telephone=no">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <script type="text/javascript" src="/Public/Common/jquery.js"></script>
    <script type="text/javascript" src="/Public/Homewx/js/hmt.js"></script>
    <script type="text/javascript" src="/Public/Homewx/js/swipe.js"></script>
    <link rel="stylesheet" type="text/css" href="/Public/Homewx/css/base.css" />
    <link rel="stylesheet" type="text/css" href="/Public/Homewx/css/common.css" />
</head>
<body>
<div class="warp clearfloat">
    <!--header star-->
    <div class="header clearfloat box-s" id="header">
        <div class="search clearfloat fl">
            <input type="button" id="" value="" class="btn fl" />
            <input type="text" id="" value="" placeholder="搜索你需要的宝贝" class="text" />
        </div>
        <div class="left fr clearfloat">
            <span class="icon2"></span>
            <p class="t_c">购物车</p>
        </div>
        <div class="left fr clearfloat">
            <span class="icon1"></span>
            <p class="t_c">欢迎,<?php echo ($row['username']); ?></p>

        </div>
    </div>
    <!--header end-->
    <!--main star-->
    <div class="clearfloat" id="main">
        <!--banner star-->
        <div class="banenr" id="banner_box">
            <ul>
                <li class="dian">
                    <a href="#">
                        <img class="dis_block" src="/Public/Homewx/upload/banner.jpg">
                    </a>
                </li>
                <li class="dian">
                    <a href="#">
                        <img class="dis_block" src="/Public/Homewx/upload/banner.jpg">
                    </a>
                </li>
                <li class="dian">
                    <a href="#">
                        <img class="dis_block" src="/Public/Homewx/upload/banner.jpg">
                    </a>
                </li>
            </ul>
            <ol>
                <script>
                    $(".dian").each(function () {
                        document.write('<li class=""></li>')
                    });
                </script>
            </ol>
        </div>
        <!--banner end-->

        <!--town star-->
        <div class="town clearfloat">
            <div class="tit clearfloat">
                <img src="/Public/Homewx/upload/tit.png"/>
            </div>
            <div class="bottom clearfloat">
                <div class="zuo clearfloat fl box-s">
                    <a href="pro-content.html">
                        <span></span>
                        <img src="/Public/Homewx/upload/1.jpg"/>
                    </a>
                </div>
                <div class="you clearfloat fr box-s">
                    <div class="shang clearfloat fl box-s">
                        <a href="pro-content.html">
                            <span></span>
                            <img src="/Public/Homewx/upload/2.jpg"/>
                        </a>
                    </div>
                    <div class="shang xia clearfloat fl box-s">
                        <a href="pro-content.html">
                            <span></span>
                            <img src="/Public/Homewx/upload/3.jpg"/>
                        </a>
                    </div>
                </div>
                <div class="last clearfloat box-s fl">
                    <a href="pro-content.html">
                        <span></span>
                        <img src="/Public/Homewx/upload/4.jpg"/>
                    </a>
                </div>
            </div>
        </div>
        <!--town end-->
        <!--products star-->
        <div class="products clearfloat">
            <div class="tit clearfloat">
                <img src="/Public/Homewx/upload/tit1.png"/>
            </div>
            <div class="lists clearfloat">
                <div class="list fl clearfloat box-s">
                    <a href="pro-content.html">
                        <span></span>
                        <img src="/Public/Homewx/upload/5.jpg"/>
                        <div class="bt clearfloat">
                            <samp class="opa8"></samp>
                            <p class="nr t_c">超值价：￥233.00</p>
                        </div>
                    </a>
                </div>
                <div class="list fr clearfloat box-s">
                    <a href="pro-content.html">
                        <span></span>
                        <img src="/Public/Homewx/upload/5.jpg"/>
                        <div class="bt clearfloat">
                            <samp class="opa8"></samp>
                            <p class="nr t_c">超值价：￥233.00</p>
                        </div>
                    </a>
                </div>
                <div class="list fl clearfloat box-s">
                    <a href="pro-content.html">
                        <span></span>
                        <img src="/Public/Homewx/upload/5.jpg"/>
                        <div class="bt clearfloat">
                            <samp class="opa8"></samp>
                            <p class="nr t_c">超值价：￥233.00</p>
                        </div>
                    </a>
                </div>
                <div class="list fr clearfloat box-s">
                    <a href="pro-content.html">
                        <span></span>
                        <img src="/Public/Homewx/upload/5.jpg"/>
                        <div class="bt clearfloat">
                            <samp class="opa8"></samp>
                            <p class="nr t_c">超值价：￥233.00</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <!--products end-->
    </div>
    <!--main end-->
    <!--footer star-->
    <div class="footer clearfloat box-s" id="footer">
    <ul>
        <li class="cur">
            <a href="<?php echo U('Home/Index/index');?>">
                <p class="icon12"></p>
                <p class="tit">首页</p>
            </a>
        </li>
        <li>
            <a href="<?php echo U('Cate/cateList',[row['id']]);?>">
                <p class="icon13"></p>
                <p class="tit">分类</p>
            </a>
        </li>
        <li>
            <a href="shopcar.html">
                <p class="icon14"></p>
                <p class="tit">购物车</p>
            </a>
        </li>
        <li>
            <a href="p-center.html">
                <p class="icon15"></p>
                <p class="tit">个人中心</p>
            </a>
        </li>
    </ul>
</div>
    <!--footer end-->
</div>
<script>
    $(function () {
        new Swipe(document.getElementById('banner_box'), {
            speed: 500,
            auto: 3000,
            callback: function () {
                var lis = $(this.element).next("ol").children();
                lis.removeClass("on").eq(this.index + 1).addClass("on");
            }
        });
    });
</script>
</body>
</html>