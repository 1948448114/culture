<?php
require_once '../include.php';
$action=$_GET['action'];
if($action=="max_num"){
	$row=getNewsNum("news_table");
	$maxnum=$row['count(*)'];
	echo $maxnum;
}
if($action=="news"){
$page=intval($_GET['page']);
$item=intval($_GET['item']);
$numVerPage=10;
$startInt=($page-1)*10;
$number=$startInt+$item;
$sql="select news_title,news_time,news_link from news_table limit {$number},1;";
$rows=fetchAll($sql);
$row=$rows[0];
$list=array("title"=>$row['news_title'],"time"=>date("Y-m-d h:i:s ",$row['news_time']),"link"=>$row['news_link']); 
// foreach($rows as $row ){
// $list=array("title"=>$row['news_title'],"time"=>date("Y-m-d h:i:s ",$row['news_time']),"link"=>$row['news_link']); 
echo json_encode($list);
// }
}
?>