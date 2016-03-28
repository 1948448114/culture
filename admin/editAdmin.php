<?php
require_once '../include.php';
$username=$_REQUEST['username'];
$sql="select admin_username,admin_password from admins_table where admin_username='{$username}'";
$row=fetchOne($sql);
?>
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html"  charset="utf-8">
<title>编辑管理员</title>
</head>
<body>
	<h3>编辑管理员</h3>
	<form action="doAdminAction.php?act=editAdmin&username=<?php echo $row['admin_username']; ?>" method="post">
		<table width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
			<tr>
				<td>管理员名称</td>
				<td><input type="text" name="admin_username" placeholder="<?php echo $row['admin_username']; ?>" /></td>
			</tr>
			<tr>
				<td>管理员密码</td>
				<td><input type="password" name="admin_password" placeholder="<?php echo $row['admin_password']; ?>" /></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" value="保存编辑" /></td>
			</tr>
		</table>
	</form>
</body>
</html>