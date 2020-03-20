<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-Hans">
<head>
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta charset="utf-8">
    <title>产品列表</title>
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
    <link rel="stylesheet" type="text/css" href="/Public/Homewx/css/menu_sideslide.css" />
</head>
<body>
<div class="warp clearfloat">
    <div class="menu-wrap">
        <nav class="menu">
            <div class="icon-list">
                <?php if(is_array($rows)): foreach($rows as $key=>$ro): ?><a href="javascript:void(0)" onclick="menu(<?php echo ($ro['id']); ?>)">
                        <span><?php echo ($ro['cate_name']); ?></span>
                    </a><?php endforeach; endif; ?>
            </div>
        </nav>
        <button class="close-button" id="close-button">Close Menu</button>
    </div>
    <!--header star-->
    <div class="header header3 clearfloat box-s" id="header">
        <div class="left fl clearfloat">
            <span class="icon32 menu-button" id="open-button"></span>
        </div>
        <div class="search clearfloat fr">
            <input type="button" id="" value="" class="btn fl" />
            <input type="text" id="" value="" placeholder="搜索你需要的宝贝" class="text" />
        </div>
    </div>
    <!--header end-->
    <!--main star-->
    <div class="clearfloat content-wrap" id="main">
        <div class="product-list clearfix" id="main1">
            <?php if(is_array($god)): foreach($god as $key=>$fo): ?><div class="list clearfix fl">
                    <a href="<?php echo U('Goods/goodsDetail');?>?id=<?php echo ($fo['id']); ?>">
                        <div class="tu">
                            <span></span>
                            <img src="/Public/Admin/goods/<?php echo ($fo['goods_pic']); ?>"/>
                        </div>
                        <p class="tit"><?php echo ($fo['goods_name']); ?></p>
                        <p class="price">价格:￥<?php echo ($fo['goods_price']); ?></p>
                    </a>
                </div><?php endforeach; endif; ?>
        </div>
    </div>
    <script>
        var str = '';
        function menu(id) {
            $.post("<?php echo U('Cate/ajaxCheck');?>",{id:id},function (rows) {
                for (var i in rows){
                    str += "<div class=\"list clearfix fl\">"
                    str += "<a href=\"pro-content.html\">"
                    str += "<div class=\"tu\">"
                    str += "<span></span>"
                    str += "<img src=\"/Public/Homewx/upload/1.jpg\"/>"
                    str += "</div>"
                    str += "<p class=\"tit\">"+rows[i].goods_name+"</p>"
                    str += "<p class=\"price\">价格：￥"+rows[i].goods_price+"</p>"
                    str += "</a>"
                    str += "</div>"
                }
                $('#main1').empty();
                $('#main1').html(str);
            },'json')

        }
    </script>
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
<script type="text/javascript" src="/Public/Home/js/classie.js"></script>
<script type="text/javascript" src="/Public/Home/js/main.js"></script>
</body>
</html>