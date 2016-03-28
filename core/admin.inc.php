<?php
function checkAdmin($sql){
	return fetchOne($sql);
}
function checkLogined(){
	if($_SESSION['adminName']==""&&$_COOKIE['adminName']==""){
		alertMes("请先登录","admin.html");
	}
}

function addAdmin(){
	$arr=$_POST;
	$arr['password']=md5($_POST['password']);
	if(insert("admins_table",$arr)){
		$mes="添加成功!<br/><a href='addAdmin.php'>继续添加</a>|<a href='listAdmin.php'>查看管理员列表</a>";
	}else{
		$mes="添加失败!<br/><a href='addAdmin.php'>重新添加</a>";
	}
	return $mes;
}
function getAllAdmin(){
	$sql="select * from admins_table;";
	$rows=fetchAll($sql);
	return $rows;
}

function editAdmin($username){
	$arr=$_POST;
	$arr['admin_password']=md5($_POST['admin_password']);
	if(!update("admins_table",$arr,"admin_username='{$username}';")){
		$mes="编辑成功!<br/><a href='listAdmin.php'>查看管理员列表</a>";
	}else{
		$mes="编辑失败!<br/><a href='listAdmin.php'>回到管理员列表</a>";
	}
	return $mes;
}

function deleteAdmin($username){
	if(!delete("admins_table","admin_username='{$username}'")){
		$mes="删除成功!<br/><a href='listAdmin.php'>查看管理员列表</a>";
	}else{
		$mes="删除失败!<br/><a href='listAdmin.php'>回到管理员列表</a>";
	}
	return $mes;
}

function logout(){
	$_SESSION=array();
	if(isset($_COOKIE[session_name()])){
		setcookie(session_name(),"",time()-1);
	}
	if(isset($_COOKIE['adminId'])){
		setcookie("adminId","",time()-1);
	}
	if(isset($_COOKIE['adminName'])){
		setcookie("adminName","",time()-1);
	}
	session_destroy();
	alertMes("注销成功","admin.html");
}


?>