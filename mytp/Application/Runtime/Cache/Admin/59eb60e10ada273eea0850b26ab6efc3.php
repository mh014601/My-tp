<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
    <link href="/Public/Admin/css/select.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/Public/Admin/js/jquery.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/jquery.idTabs.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/select-ui.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/kindeditor/kindeditor-all.js"></script>
    <link rel="stylesheet" href="/Public/Common/layui/css/layui.css">
    <script src="/Public/Common/layui/layui.js"></script>
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
            <form action="<?php echo U('Cate/cateAddAction');?>" method="post" id="form1" onsubmit="fun()" class="layui-form">
                <ul class="forminfo">
                    <li>
                        <label>商品分类名称<b>*</b></label>
                        <input name="cate_name" type="text" class="dfinput" placeholder="请填写分类名称"  style="width:518px;"/>
                    </li>
                    <li>
                        <label>分类名称<b>*</b></label>
                        <div class="vocation">
                            <!--  选择框中name="id":值为value="" -->
                            <select name="id">
                                <option value="0">根分类</option>
                                <?php if(is_array($rows)): foreach($rows as $key=>$fo): ?><option value="<?php echo ($fo["id"]); ?>">|-<?php echo str_repeat("----",substr_count($fo['path'],',')); echo ($fo["cate_name"]); ?></option><?php endforeach; endif; ?>
                            </select>
                        </div>
                    </li>
                    <li>
                        <label>&nbsp;</label>
                        <input name="" type="submit" class="btn" value="添加"/>
                    </li>
                </ul>
            </form>
        </div>
    </div>
</div>
</body>
<script>
    //Demo
    layui.use('form', function(){
        var form = layui.form;

        //监听提交
        form.on('submit(formDemo)', function(data){
            layer.msg(JSON.stringify(data.field));
            return false;
        });
    });
</script>
<script type="text/javascript">

    // function fun(){
    //
    //     return false;
    // }


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