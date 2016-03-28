<?php
require_once '../include.php';
$rows=getAllAdmin();
if(!$rows){
    alertMes("No admin.","addAdmin.php");
    exit;
}
?>
<!--表格-->
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html" charset="utf-8">
<title>管理员列表</title>
<link rel="stylesheet" href="style/backstage.css">
</head>
<body>
<div class="details">
<div class="details_operation clearfix">
    <p3>管理员列表</p3>
</div>
<table class="table" cellspacing="0" cellpadding="0">
    <thead>
        <tr>
            <th width="20%">序号</th>
            <th width="30%">管理员名称</th>
            <th width="50%">操作</th>
        </tr>
    </thead>
    <tbody>
        <?php $i=1; foreach ($rows as $row): ?>
        <tr>
            <!-- loop -->
            <td align="center">
                <label for="c1" class="label"><?php echo $i; ?></label>
            </td>
            <td align="center">
                <?php echo $row['admin_username']; ?>
            </td>
            <td align="center">
                <input type="button" value="修改" class="btn" onclick="editAdmin('<?php echo $row['admin_username']; ?>')" />
                <input type="button" value="删除" class="btn" onclick="deleteAdmin('<?php echo $row['admin_username']; ?>')" />
            </td>
            <?php $i++; ?>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>
</div>
</body>
<script type="text/javascript">
    function editAdmin(username){
        window.location="editAdmin.php?username="+username;
    }
    function deleteAdmin(username){
        if(window.confirm("不可逆的操作，继续吗？")){
            window.location="doAdminAction.php?act=deleteAdmin&username="+username;
        }
    }
</script>
</html>