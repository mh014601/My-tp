<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>列表页</title>
    <link href="/Public/Admin/css/app.css" rel="stylesheet" type="text/css" />
    <link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
    <link href="/Public/Admin/css/select.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/PublicAdmin/js/jquery.min.js"></script>
    <script src="https://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="/PublicAdmin/js/jquery.idTabs.min.js"></script>
    <script type="text/javascript" src="/PublicAdmin/js/select-ui.min.js"></script>
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
            <ul class="seachform">
                <form action="" method="post">

                    <li>
                        <label>分类名称</label>
                        <input name="keyword" type="text" class="scinput" value=""/>
                    </li>
                    <li>
                        <label>指派</label>
                        <div class="vocation">
                            <select class="select3">
                                <option>全部</option>
                                <option>其他</option>
                            </select>
                        </div>
                    </li>
                    <li>
                        <label>&nbsp;</label>
                        <input name="" type="submit" class="scbtn" value="查询"/>
                    </li>
                </form>
            </ul>

            <!-- 列表 -->
            <table class="tablelist">
                <thead>
                <tr>
                    <th><input name="" type="checkbox" value="" checked="checked"/></th>
                    <th>编号<i class="sort"><img src="/Public/Admin/images/px.gif" /></i></th>
                    <th>用户</th>


                    <th>操作</th>
<!--                    <if condition="strtoupper($user['name']) neq 'THINKPHP'">ThinkPHP-->
                </tr>
                </thead>
                <tbody>
                <?php if(is_array($rows)): foreach($rows as $key=>$fo): ?><tr id="id_<?php echo ($fo['id']); ?>" f="f_<?php echo ($fo['pid']); ?>" onclick="menu(<?php echo ($fo["id"]); ?>)">
                    <td>
                        <input name="" type="checkbox" value="" />
                    </td>
                    <td><?php echo ($fo["id"]); ?></td>
                    <?php if(substr_count($fo['path'],',') == 1): ?><td style="color:red">
                        |--<?php echo str_repeat("----",substr_count($fo['path'],','));?>
                        <?php echo ($fo["cate_name"]); ?>
                    </td>
                        <?php elseif(substr_count($fo['path'],',') == 2): ?>
                        <td style="color:green">
                        |--<?php echo str_repeat("----",substr_count($fo['path'],','));?>
                        <?php echo ($fo["cate_name"]); ?>
                        </td>
                    <?php else: ?>
                    <td style="color:blue">
                        |--<?php echo str_repeat("----",substr_count($fo['path'],','));?>
                        <?php echo ($fo["cate_name"]); ?>
                    </td><?php endif; ?>
                        <td>
                        <a href="#" class="tablelink">查看</a>
                        <a href="javascript:void(0)" onclick="cateDel(<?php echo ($fo["id"]); ?>)" class="tablelink">删除</a>
                    </td>

                </tr>
<!--                @empty-->
<!--                <tr >-->
<!--                    <td colspan="5">没有数据</td>-->
<!--                </tr>--><?php endforeach; endif; ?>

                </tbody>
            </table>

            <!-- 分页 -->
            <tr>

            </tr>
        </div>
    </div>
</div>
</body>
<script>
    $("tr[f!='f_0']").hide();
    function menu(id) {
        $("tr[f='f_"+id+"']").toggle();
    }
</script>
<script>
    function cateDel(id) {
        var bool = confirm('你确定要删除吗?');
        if (bool){
            $.post("<?php echo U('Cate/cateDel');?>",{id:id},function (data) {
                if (data.status == 1){
                    $('#id_'+id).remove();
                    alert('删除成功!')
                }else if(data.status == 2){
                    alert('请先删除分类下的商品!')
                }else if(data.status == 3){
                    alert('请先删除子分类!')
                }
            },'json')
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