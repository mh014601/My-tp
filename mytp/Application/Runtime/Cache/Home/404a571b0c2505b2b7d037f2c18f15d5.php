<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<table>
    <tr>
        <td>编号</td>
        <td>名称</td>
        <td>密码</td>
        <td>操作</td>
    </tr>
    <?php if(is_array($rows)): foreach($rows as $key=>$vo): ?><tr>
        <td><?php echo ($vo["id"]); ?></td>
        <td><?php echo ($vo["uname"]); ?></td>
        <td><?php echo ($vo["upass"]); ?></td>
        <td>删除|编辑</td>
    </tr><?php endforeach; endif; ?>

</table>
</body>
</html>