<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-Hans">
<head>
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta charset="utf-8">
    <title>分类</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="Cache-Control" content="no-siteapp">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="format-detection" content="telephone=no">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <script type="text/javascript" src="/Public/Common/jquery.js"></script>
    <script type="text/javascript" src="/Public/Home/js/hmt.js"></script>
    <script type="text/javascript" src="/Public/Home/js/swipe.js"></script>
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/base.css" />
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/common.css" />
</head>
<body class="shoucang">
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
            <p class="t_c">在线服务</p>
        </div>
    </div>
    <!--header end-->

    <!--main star-->
    <div class="main clearfloat" id="main">
        <div class="pro-tit box-s">
            产品分类
        </div>
        <div class="pro-ctent clearfloat">

            <?php if(is_array($rows)): foreach($rows as $key=>$fo): ?><div class="list fl clearfloat box-s">
                    <a href="<?php echo U('Cate/goodsList');?>?id=<?php echo ($fo['id']); ?>">
							<span class="icon5">
								<i></i>
								<img src=""/>
							</span>
                        <p class="tit"><?php echo ($fo['cate_name']); ?></p>
                    </a>
                </div><?php endforeach; endif; ?>
        </div>
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
<script type="text/javascript" src="/Public/Home/js/hmt.js"></script>
<script type="text/javascript" src="/Public/Home/js/scale.js"></script>
<script type="text/javascript" src="/Public/Home/js/hammer.min.js"></script>
</body>
</html>