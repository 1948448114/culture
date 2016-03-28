<?php
require_once '../include.php';
$act=$_REQUEST['act'];
$admin_username=$_REQUEST['username'];
$id=$_REQUEST['id'];
if($act=="logout"){
	logout();
}elseif($act=="addAdmin"){
	$mes=addAdmin();
}elseif($act=="editAdmin"){
	$mes=editAdmin($admin_username);
}elseif ($act=="deleteAdmin") {
	$mes=deleteAdmin($admin_username);
// elseif ($act=="addNews") {
// 	$mes=addNews();
// }elseif ($act=="editNews") {
// 	$mes=editNews();
}elseif ($act=="deleteNews"){
	$where="news_id={$id}";
	$mes=deleteNews($where);
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>= =</title>
</head>
<body>
<?php
if($mes){
	echo $mes;
}
?>
</body>
</html>
