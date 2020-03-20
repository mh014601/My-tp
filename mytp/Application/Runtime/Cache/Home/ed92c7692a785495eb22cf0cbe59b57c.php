<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<table>
    <tr>
        <th>编号</th>
        <th>名称</th>
        <th>价格</th>
        <th>操作</th>
    </tr>
    <?php if(is_array($goodsList)): foreach($goodsList as $key=>$fo): ?><tr>
            <td><?php echo ($fo["id"]); ?></td>
            <td><?php echo ($fo["goods_name"]); ?></td>
            <td><?php echo ($fo["goods_price"]); ?></td>
            <td>编辑|删除</td>
        </tr><?php endforeach; endif; ?>
</table>

<?php echo ($page->show()); ?>


</body>
</html>