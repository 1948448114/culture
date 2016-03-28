<?php
require_once '../include.php';
$title=$_POST['title'];
$author=$_POST['author'];
$bodycontent=$_POST['htmlContent'];
$time= time()+3600*8;
$timestr=date("Y-m-d h:i:s ", $time);

$row=getMaxId("news_table");
$maxid=$row['max(news_id)']+1;
$rows=getAllNews();
$filename=$maxid."-news.html"."";
$path="newshtml/";
$turePath=$path.'/'.$filename;
$link="admin/".'/'.$turePath."";
//insert
$sql="insert into news_table(news_title,news_author,news_time,news_content,news_link) values('".$title."','".$author."','".$time."','".$bodycontent."','".$link."');";
$insertResult=insertNews($sql);
//
$myfile=fopen($turePath,'w') or die("Unable to open file!");
$htmlcontent=trans($bodycontent,$title,$author,$timestr);
//
fwrite($myfile,$htmlcontent);
fclose($myfile);
if($insertResult){
	$mes="添加成功!<br/><a href='addNews.php'>继续添加</a>|<a href='listNews.php'>查看新闻列表</a>";
}
else{
	$mes="添加失败!<br/><a href='addNews.php'>重新添加</a>";
}
echo $mes;

function trans($bodycontent,$title,$author,$timestr){
	$htmlcontent="<!DOCTYPE html>
<html lang='en'>
<head>
	<meta charset='UTF-8'>
	<title>Document</title>
      <!-- 通过360 cdn引入bootstrap css-->
      <link href='http://libs.useso.com/js/bootstrap/3.2.0/css/bootstrap.min.css' rel='stylesheet'>
      <script src='http://libs.baidu.com/jquery/1.10.2/jquery.min.js'></script>
      <link rel='stylesheet' type='text/css' href='/ui/css/news.css'>
      <title>东南大学文化治理研究所</title>
   </head>
   <body class='content' style='background-color: #f2f2f2'>
      <div id='my_header'>
         <nav class='navbar' role='navigation'>
            <div class='navbar-header'>
               <button type='button' class='navbar-toggle' data-toggle='collapse'
               data-target='#my-navbar-collapse'>
               <span class='icon-bar'></span>
               <span class='icon-bar'></span>
               <span class='icon-bar'></span>
               
               </button>
               <a class='navbar-brand' href='/ui'>东南大学文化治理研究所</a>
            </div>
            <div class='collapse navbar-collapse' id='my-navbar-collapse'>
               <ul class='nav navbar-nav'>
                  <li><a href='/ui/index.html'>首页</a></li>
                  <li class='active'><a href='/ui/news.html'>新闻动态</a></li>
                  <li><a href='/ui/study.html'>学术研究</a></li>
                  <li><a href='/ui/team.html'>合作团队</a></li>
                  <li><a href='/ui/aboutUs.html'>关于我们</a></li>
                  <li class='active'><a href='/ui/people.html'>招贤纳士</a></li>
               </ul>
            </div>
            
         </nav>
      </div>

<div class='panel panel-default' style='min-height: 550px'>
   <div class='panel-body'>
      <h3 style='text-align: center'>{$title}</h3>
      <small style='padding-left: 85%;color:#999999' id='author'>{$author}</small>
      <small style='padding-left: 2%;color:#999999' id='time'>{$timestr}</small>
      <div>{$bodycontent}</div>
   </div>

</div>
      
      <div class='footer' style='position: relative;min-height: 100%'>
         <span> 
            &copy 2013-2016 东南大学文化治理研究所
        </span>
       <script src='/ui/js/news_detail.js'></script>
</body>
</html>";
	return $htmlcontent;
}
?>