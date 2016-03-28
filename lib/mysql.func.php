<?php
function connect(){
	$link=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD)or die ("数据库连接失败");
	mysqli_set_charset($link,DB_CHARSET);
	mysqli_select_db($link,DB_DBNAME)or die("打开指定数据失败");
	return $link;
}
function insert($table,$array){
	$keys=join(",",array_keys($array));
	$values="'".join("','",array_values($array))."'";
	$sql="insert {$table} values({$values});";
	return mysqli_query(connect(),$sql);
}
function insertNews($sql){
	return mysqli_query(connect(),$sql);
}
function update($table,$array,$where=null){
	foreach($array as $key=>$values){
		if($str==null){
			$sep="";
		}else{
			$sep=",";
		}
		$str.=$sep.$key."='".$values."'";
	}
	$sql="update {$table} set {$str} ".($where==null?null:"where ".$where);
	mysqli_query(connect(),$sql);
	return mysqli_affected_rows();
}
function updateNews($sql){
	mysqli_query(connect(),$sql);
	return mysqli_affected_rows();
}
function delete($table,$where=null){
	$where=($where==null?null:"where ".$where);
	$sql="delete from {$table} {$where}";
	mysqli_query(connect(),$sql);
	return mysqli_affected_rows();
}
function fetchOne($sql,$result_type=MYSQLI_ASSOC){
	$result=mysqli_query(connect(),$sql);
	$row=mysqli_fetch_assoc($result);
	return $row;
}
function fetchAll($sql,$result=MYSQLI_ASSOC){
	$result=mysqli_query(connect(),$sql);
	$rows=array();
	while(@$row=mysqli_fetch_assoc($result)){
		$rows[]=$row;
	}
	return $rows;
}
function getResultNum($sql){
	$result=mysqli_query(connect(),$sql);
	return mysqli_num_rows($result);
}
function getMaxId($table){
	$sql="select max(news_id) from ".$table." ;";
	$result=mysqli_query(connect(),$sql);
	$row=mysqli_fetch_assoc($result);
	return $row;
}
function getNewsNum($table){
	$sql="select count(*) from ".$table." ;";
	$result=mysqli_query(connect(),$sql);
	$row=mysqli_fetch_assoc($result);
	return $row;
}
?>