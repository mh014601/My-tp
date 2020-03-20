<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>商品列表页</title>
    <link href="/Public/Admin/css/app.css" rel="stylesheet" type="text/css" />
    <link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
    <link href="/Public/Admin/css/select.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/Public/Admin/js/jquery.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/jquery.idTabs.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/select-ui.min.js"></script>
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
        <div id="tab2" class="tabson">
            <!-- 搜索 -->
            <form action="<?php echo U('Goods/goodsList');?>" method="post">
                <ul class="seachform">
                    <input type="hidden" value="search" name="search">
                    <li>
                        <label>综合查询</label>
                        <input name="keyword" type="text" class="scinput" value="<?php echo ($keyword); ?>" />
                    </li>
                    <li>
                        <label>分类</label>
                        <div class="vocation" style="width: 200px;">
                            <select class="select3" name="cate_id" style="width: 200px">
                                <option value="0">全部</option>
                                <?php if(is_array($rows)): foreach($rows as $key=>$fo): ?><option value="<?php echo ($fo['id']); ?>"
                                >
                                    <?php echo ($fo['cate_name']); ?></option><?php endforeach; endif; ?>
                            </select>
                        </div>
                    </li>
                    <li>
                        <label>&nbsp;</label>
                        <input name="" type="submit" class="scbtn" value="查询"/>
                    </li>
                </ul>
            </form>
            <!-- 列表 -->
            <table class="tablelist">
                <thead>
                <tr>
                    <th><input name="" type="checkbox" value="" checked="checked"/></th>
                    <th>编号<i class="sort"><img src="/Public/Admin/images/px.gif" /></i></th>
                    <th>商品名称</th>
                    <th>所属分类</th>
                    <th>商品描述</th>
                    <th>商品图片</th>
                    <th>价格</th>
                    <th>添加时间</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <?php if(is_array($rows)): foreach($rows as $key=>$fo): ?><tr id="id_<?php echo ($fo['gid']); ?>">
                    <td>
                        <input name="" type="checkbox" value="" />
                    </td>
                    <td><?php echo ($fo['gid']); ?></td>
                    <td><?php echo ($fo['goods_name']); ?></td>
                    <td><?php echo ($fo['cate_name']); ?></td>
                    <td><?php echo ($fo['goods_detail']); ?></td>
                    <td><img src="/Public/Admin/goods/<?php echo ($fo['goods_pic']); ?>" alt="" width="50"></td>
                    <td><?php echo ($fo['goods_price']); ?></td>
                    <td><?php echo date("Y-m-d H:i:s",$fo['add_time']);?></td>
                    <td>
                        <a href="<?php echo U('Goods/goodsEdit');?>?gid=<?php echo ($fo['gid']); ?>" class="tablelink" >编辑</a>
                        <a href="javascript:void(0)" class="tablelink" onclick="goodsDel(<?php echo ($fo["gid"]); ?>)">删除</a>
                    </td>
                </tr><?php endforeach; endif; ?>
                </tbody>
            </table>

            <!-- 分页 -->
            <div class="pagin">

            </div>
        </div>
    </div>
</div>
</body>
<script>
    function goodsDel(id){
        var bool = confirm("确定要删除吗？")
        if(bool){
            var _token = '{csrf_token()}'
            //删除
            // 1.效果
            $('#id_'+id).remove();
            // 2.删除数据库
            $.post("<?php echo U('Goods/ajaxGoodsDel');?>",{id:id},function (data) {
                if(data.status ==1){
                    alert("删除成功")
                }else{
                    alert("删除失败")
                }
            })
        }
    }
</script>
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
        $("#usual1 ul").idTabs();
        $('.tablelist tbody tr:odd').addClass('odd');
    });
</script>
</html>