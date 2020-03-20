<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-Hans">
<head>
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta charset="utf-8">
    <title>确认订单</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="Cache-Control" content="no-siteapp">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="format-detection" content="telephone=no">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <script src="/Public/Home/js/jquery-1.8.3.min.js" type="text/javascript"></script>
    <script src="/Public/Home/js/hmt.js" type="text/javascript"></script>
    <script type="text/javascript" src="/Public/Home/js/swipe.js"></script>
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/base.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/order.css"/>
</head>
<body class="ordercontent">
<div class="warp clearfloat">
    <!--header star-->
    <div class="header2 headerbak clearfloat box-s" id="header">
        <div class="left1 left2 clearfloat fl">
            <a href="#" class="back"></a>
        </div>
        <div class="middle middle1 clearfloat fl">
            确认订单
        </div>
    </div>
    <!--header end-->
    <!--sign star-->
    <div id="main">
        <div class="order clearfloat">
            <div class="order-header clearfloat box-s">
                <ul>
                    <li class="fl">
                        <a href="#">
                            1.购物车列表
                        </a>
                    </li>
                    <li class="fl cur">
                        <a href="#">
                            2.确认订单
                        </a>
                    </li>
                    <li class="fl">
                        <a href="#">
                            3.购买成功
                        </a>
                    </li>
                </ul>
            </div>
            <div class="order-one clearfloat">
                <div class="top clearfloat">
                    <div class="left fl clearfloat">
                        收货人名称：金城
                    </div>
                    <div class="right fl clearfloat">
                        <span><img src="/Public/Home/img/ddtel.png"/></span>
                        18505511251
                        <a href="#" class="fr">修改</a>
                    </div>
                </div>
                <div class="bottom clearfloat">
                    详细地址：安徽省合肥市高新区
                </div>
            </div>
            <div class="order-two clearfloat">
                <div class="top clearfloat">
                    配送方式<span class="ml10">必填</span>
                    <samp class="ml20">圆通速递</samp>
                </div>
                <div class="top clearfloat">
                    支付方式<span class="ml10">必填</span>
                    <samp class="ml20">银行汇款/转账</samp>
                </div>
                <div class="bottom clearfloat">
                    <p>
                        <input type="radio" name="pay" id="pay" class="fl dian" value=""/><label class="pay" for="pay">支付宝【￥0.00】</label>
                    </p>
                    <p>
                        <input type="radio" name="pay" id="pay1" class="fl dian" value=""/><label class="pay" for="pay1">支付宝免签约支付【￥0.00】</label>
                    </p>
                    <p>
                        <input type="radio" name="pay" id="pay2" class="fl dian" value=""/><label class="pay" for="pay2">货到付款【￥0.00】</label>
                    </p>
                    <p>
                        <input type="radio" name="pay" id="pay3" class="fl dian" value=""/><label class="pay" for="pay3">银行汇款/转账【￥0.00】</label>
                    </p>
                    <p>
                        <input type="radio" name="pay" id="pay4" class="fl dian" value=""/><label class="pay" for="pay4">余额支付【￥0.00】</label>
                    </p>
                </div>
            </div>
            <div class="order-three clearfloat box-s">
                <p class="tit fl">留言备注</p>
                <input type="text" id="" value="" placeholder="请输入订单备注" />
            </div>
            <div class="order-two order-four clearfloat">
                <div class="top clearfloat">
                    商品列表<span class="fr">修改</span>
                </div>
                <div class="bottom clearfloat">
                    <p class="tit fl">玫琳凯中性洗面乳绿2号</p>
                    <p class="shu fl">x 1</p>
                    <p class="price fl">￥69.00</p>
                </div>
                <div class="zprice clearfloat">
                    <p class="fr zongjia">商品总价：<span>￥69.00</span> +配送费用：<span>￥5.00</span></p>
                    <p class="fr yingfu">应付款金额：<span>￥74.00</span></p>
                </div>
            </div>
            <input type="button" id="" value="提交订单" class="tbtn clearfloat" />
        </div>
    </div>
    <!--sign end-->
</div>
</body>
</html>