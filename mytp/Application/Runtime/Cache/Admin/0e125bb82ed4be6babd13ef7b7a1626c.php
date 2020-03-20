<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>无标题文档</title>

    <link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
    <link href="/Public/Admin/css/select.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/Public/Admin/js/jquery.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/jquery.idTabs.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/select-ui.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/kindeditor/kindeditor-all.js"></script>
<!--    {{&#45;&#45;<link rel="stylesheet" href="/Public/Common/layui/css/layui.css">&#45;&#45;}}-->
<!--    {{&#45;&#45;<script src="/Public/Common/layui/layui.js"></script>&#45;&#45;}}-->
</head>
<body>

<div class="place">
    <span>位置：</span>
    <ul class="placeul">
        <li><a href="#">首页</a></li>
        <li><a href="#">系统设置</a></li>
    </ul>
</div>

<div class="formbody">
    <div id="usual1" class="usual">
        <div id="tab1" class="tabson">
            <form action="<?php echo U('Goods/goodsEditAction');?>" method="post" enctype="multipart/form-data">
                <input type="hidden" value="<?php echo ($row['id']); ?>" name="id">
                <ul class="forminfo">
                    <li>
                        <label>商品名称<b>*</b></label>
                        <input name="goods_name" type="text" class="dfinput" style="width:518px;" value="<?php echo ($row['goods_name']); ?>"/>
                    </li>
                    <li>
                        <label>商品价格<b>*</b></label>
                        <input name="goods_price" type="text" class="dfinput"  style="width:518px;" value="<?php echo ($row['goods_price']); ?>"/>
                    </li>
                    <li>
                        <label>商品库存<b>*</b></label>
                        <input name="goods_num" type="text" class="dfinput"  style="width:518px;" value="<?php echo ($row['goods_num']); ?>"/>
                    </li>
                    <li>
                        <label>商品原图<b>*</b></label>
                        <img src="/Public/Admin/upload/<?php echo ($row['goods_pic']); ?>" alt="" width="200">
                    </li>
                    <li>
                        <label>商品图片<b>*</b></label>
                        <input name="goods_pic" type="file" src="/Public/Admin/upload/<?php echo ($row['goods_pic']); ?>" class="dfinput"   style="width:518px;" />
                    </li>
                    <li>
                        <label>所属分类<b>*</b></label>
                        <div class="vocation">
                            <select class="select1" name="cate_id" id="changeCate">
                                <option value="0">请选择分类</option>
                                <?php if(is_array($rows)): foreach($rows as $key=>$fo): ?><option value="<?php echo ($fo['id']); ?>"
                                    <?php if($fo['id'] == $row['cate_id'] ): ?>selected<?php endif; ?>
                                    > |--<?php echo str_repeat("----",substr_count($fo['path'],','));?>
                                    <?php echo ($fo['cate_name']); ?></option><?php endforeach; endif; ?>
                            </select>
                        </div>
                    </li>
                    <li>
                        <label>商品描述<b>*</b></label>
                        <textarea id="content" name="goods_detail" style="width:700px;height:250px;">
                          <?php echo ($row['goods_detail']); ?>
                        </textarea>
                    </li>
                    <li>
                        <label>&nbsp;</label>
                        <input name="" type="submit" class="btn" value="马上发布" id="btn" />
                    </li>
                </ul>
            </form>
        </div>
    </div>
</div>
</body>
<script type="text/javascript">
    $(document).ready(function(e) {
        $(".select1").uedSelect({
            width : 345
        });
        $(".select2").uedSelect({
            width : 167
        });
        $(".select3").uedSelect({
            width : 100
        });
        //加载富文本编辑器
        KindEditor.ready(function(K) {
            K.create('#content', {
                allowFileManager : true,
                filterMode:true,
                afterBlur:function(){
                    this.sync("#content");
                }
            });
        });
    });
</script>
</html>