<?php
//error_reporting(0);
function getAllNews(){
	$sql="select * from news_table;";
	$rows=fetchAll($sql);
	return $rows;
}
// function addNews(){

// }
// function editNews(){
	
// }
function deleteNews($where){
	if(!delete("news_table",$where)){
		$mes="删除成功!<br/><a href='listNews.php'>查看新闻列表</a>";
	}else{
		$mes="删除失败!<br/><a href='listNews.php'>回到新闻列表</a>";
	}
	return $mes;
}
?>