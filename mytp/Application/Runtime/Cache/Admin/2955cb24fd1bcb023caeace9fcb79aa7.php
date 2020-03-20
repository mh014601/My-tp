<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>列表页</title>
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
            <ul class="seachform">
                <!-- action=""相当于又走了路由 -->
                <form action="" method="post">
                    <li>
                        <label>管理员名称</label>
                        <input name="keyword" type="text" class="scinput" value="<?php echo ($keyword); ?>"/>
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
                    <th>发布时间</th>
                    <th>是否禁用</th>
<!--                    <?php if($id < 5 ): ?>-->
                    <th>操作</th>
<!--<?php endif; ?>-->
                </tr>
                </thead>
                <tbody>
                <?php if(is_array($rows)): foreach($rows as $key=>$fo): ?><tr id="id_<?php echo ($fo["id"]); ?>">
                    <td>
                        <input name="" type="checkbox" value="" />
                    </td>
                    <td><?php echo ($fo["id"]); ?></td>
                    <td><?php echo ($fo["admin_name"]); ?></td>
                    <td><?php echo ($fo["add_time"]); ?></td>
                    <td>
                        <?php if($fo["status"] == 1 ): ?><span style="color: green">已启用</span>
                        <?php else: ?>
                        <span style="color: red">已禁用</span><?php endif; ?>
                    </td>
<!--                    @if($row->id ==1)-->
                    <td>
                        <a href="<?php echo U('Manager/managerEdit');?>?id=<?php echo ($fo["id"]); ?>" class="tablelink">编辑</a>

                        <a href="javascript:void(0)" onclick="delManager(<?php echo ($fo["id"]); ?>)" class="tablelink">删除</a>
                    </td>
<!--                    @endif-->
                </tr>
<!--                @empty-->
<!--                <tr>-->
<!--                    <td colspan="6">   没有数据。。。</td>-->
<!--                </tr>--><?php endforeach; endif; ?>

                </tbody>
            </table>

            <!-- 分页 -->
            <tr>
                <td colspan="6">
                <?php echo ($page->show()); ?>
                </td>
            </tr>
        </div>
    </div>
</div>
</body>
<script>
    function delManager(id) {
        var bool = confirm("你确定要删除吗？");
        if(bool){
            // 1. 效果 对用上面的<tr id="id_{<?php echo ($v->id); ?>}">即var aid = id="id_{<?php echo ($v->id); ?>}
            var aid = "id_"+id;
            $('#'+aid).remove();
            // 2. 数据库
            var _token = "{csrf_token()}";
            $.post("<?php echo U('Manager/managerDel');?>",{_token:_token,id:id},function (data) {
                if(data.status == 1){
                    alert('删除成功!');
                    location.href = "";
                }
                else{
                    alert('删除失败!')
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