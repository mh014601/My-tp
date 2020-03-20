<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-Hans">
<head>
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta charset="utf-8">
    <title>商品详情</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="Cache-Control" content="no-siteapp">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="format-detection" content="telephone=no">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <script src="https://libs.baidu.com/jquery/1.11.3/jquery.min.js"></script>

    <script type="text/javascript" src="/Public/Home/js/jquery.SuperSlide.2.1.js" ></script>
    <script src="/Public/Home/js/hmt.js" type="text/javascript"></script>
    <script type="text/javascript" src="/Public/Home/js/swipe.js"></script>
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/base.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/common.css"/>
</head>
<body class="shoucang">
<div class="warp clearfix">
    <!--header star-->
    <div class="header2 clearfloat box-s" id="header">
        <div class="left1 clearfloat fl">
            <a href="#" class="back"></a>
        </div>
        <div class="middle clearfloat fl">
            商品详情
        </div>
        <div class="right1 fr clearfloat">
            <a href="#" class="back back1"></a>
        </div>
    </div>
    <!--header end-->
    <div id="main" class="clearfloat">
        <!--banner star-->
        <div class="banenr1" id="banner_box">
            <ul>
                <li class="dian">
                    <a href="#">
                        <img class="dis_block" src="/Public/Admin/goods/<?php echo ($row['goods_pic']); ?>">
                    </a>
                </li>
                <li class="dian">
                    <a href="#">
                        <img class="dis_block" src="/Public/Admin/goods/<?php echo ($row['goods_pic']); ?>">
                    </a>
                </li>
            </ul>
            <ol>
                <li>1/4</li>
            </ol>
        </div>
        <!--banner end-->
        <div class="pro-top clearfix box-s">
            <p class="tit"><?php echo ($row['goods_name']); ?></p>
            <p class="price"><span>原价：¥500.00</span>&nbsp<?php echo ($row['goods_price']); ?></p>
        </div>
        <div class="pro-bottom clearfix box-s fl">
            <ul>
                <li>库存：<?php echo ($row['goods_num']); ?></li>
                <li class="shoucang">收藏</li>
                <li class="zixun">在线咨询</li>
            </ul>
        </div>
        <div class="pro-tab">
            <div class="hd">
                <ul>
                    <li>商品详情</li>
                    <li>商品属性</li>
                    <li>评价</li>
                </ul>
            </div>
            <div class="bd clearfix box-s">
                <div class="lh">
                    <?php echo ($row['goods_detail']); ?>
                </div>
                <div class="lh">
                    2
                </div>
                <div class="lh">
                    1
                </div>
            </div>
        </div>

    </div>
    <!--footer star-->
    <div class="footer footer1 clearfloat box-s" id="footer">
        <ul>
            <li class="list">
                <a href="#">
                    <p class="icon31"></p>
                    <p class="tit">在线服务</p>
                </a>
            </li>
            <li class="list">
                <a href="<?php echo U('Goods/cart');?>">
                    <p class="icon14"></p>
                    <p class="tit">购物车</p>
                </a>
            </li>
            <li class="btn">
                <a href="javascript:void(0)" class="jiaj" onclick="addCart(<?php echo ($row['id']); ?>)">
                    <span>加入购物车</span>
                </a>
            </li>
            <li class="btn btn1">
                <input id="min1" onclick="acc()" class="am-btn am-btn-default" name="" type="button" value="-" />
                <input id="text_box" name="" type="text" value="1" style="width:30px;" />
                <input id="add1" onclick="add()" class="am-btn am-btn-default" name="" type="button" value="+" />
            </li>
        </ul>
    </div>
    <!--footer end-->
</div>
<script>
    function add(){
        var num =  $('#text_box').val();//获取当前数量
        if(num < <?php echo ($row['goods_num']); ?>) {
            num++;
            $('#text_box').val(num);
        }
    }
    function acc(){
        var num =  $('#text_box').val();
        if(num > 1){  //购买数量不能为零
            num--;
            $('#text_box').val(num);

        }
    }
    function addCart(id){
        var num = $('#text_box').val();
        $.post("<?php echo U('ajaxAddCart');?>",{id:id,num:num},function(data){
            if(data.status == 0){
                alert('添加购物车成功');
                // 跳转到购物车页面
                // location.href = "<?php echo U('Goods/cart');?>"
            }else if(data.status == 1){
                alert('商品添加失败')
            }else{
                alert("请登录");
                // 跳登录
                location.href = "<?php echo U('Home/Index/login');?>?url=<?php echo ($url); ?>&id=<?php echo ($row['id']); ?>"
            }
        },'json')
    }
</script>
</body>
</html>