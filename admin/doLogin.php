<?php
//error_reporting(0);
require_once '../include.php';
$username=$_POST['username'];
//$password=md5($_POST['password']);
$password=md5($_POST['password']);
$verify=$_POST['verify'];
$verify1=$_SESSION['verify'];
$autoFlag=$_POST['autoFlag'];
if(strtolower($verify)==strtolower($verify1)){
	$sql="select * from ".ADMINTABLE." where admin_username='".$username."' AND admin_password='".$password."'";
	$row=checkAdmin($sql);
	//var_dump($res);
	//print_r($res);
	if($row){
		//如果选择了一周内自动登陆
		if($autoFLag){
			setcookie("adminId",$row['id'],time()+7*24*3600);
			setcookie("adminName",$row['username'],time()+7*24*3600);
		}
		$_SESSION['adminName']=$row['admin_username'];
		$url="index.php";
		echo "<script>window.location='{$url}';</script>";
	}else{
		alertMes("登陆失败，重新登录","admin.html");
	}
}else{
	alertMes("验证码错误","admin.html");
}
?>