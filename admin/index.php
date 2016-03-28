<?php
require_once '../include.php';
checkLogined();
?>
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html" charset="utf-8">
<title>管理界面</title>
<html xmlns="http://www.w3.org/1999/xhtml" >
<link rel="stylesheet" href="style/backstage.css">
</head>

<body style="height:100%">
    <div class="head">
        <h3 class="head_text fr">东南大学文化治理研究所--后台管理系统</h3>
    </div>
    <div class="operation_user clearfix">
        <div class="link fl"><a href="#">后台</a><span>&gt;&gt;</span><a href="#">管理</a></div>
        <div class="link fr">
            <p1 class="icon">欢迎您>&gt;
            <?php
            if(isset($_SESSION['adminName'])){
                echo $_SESSION['adminName'];
            }elseif (isset($_COOKIE['adminName'])){
                echo $_COOKIE['adminName'];
            }
            ?></p1>
<!--             <a href="#" class="icon icon_i">首页</a><span></span>
            <a href="#" class="icon icon_j">前进</a><span></span>
            <a href="#" class="icon icon_t">后退</a><span></span> -->
            操作：
            <a href="index.php" class="icon icon_n">刷新</a><span></span>
            <a href="doAdminAction.php?act=logout" class="icon icon_e">退出</a>
        </div>
    </div>

    <div class="content clearfix">
        <div class="main">
            <!--右侧内容-->
            <div class="cont" >
                <div class="title">后台管理</div>
                <!--嵌套网页开始-->
                <iframe src="main.php" frameborder="0" scrolling="no" name="mainFrame" width="100%" height="1100" ></iframe>
                <!--嵌套网页结束-->
            </div>
        </div>
        

        <!--左侧列表-->
        <div class="menu">
            <div class="cont">
                <div class="title">管理员</div>
                <ul class="mList">
                                    <li>
                        <h3 class="directory" onclick="listmenu2()"><span>+</span>新闻管理</h3>
                        <dl id="menu2" style="display:none;">
                            <dd><a href="listNews.php" target="mainFrame">新闻列表</a></dd>
                            <dd><a href="addNews.php" target="mainFrame">添加新闻</a></dd>
                        </dl>
                    </li>
                    <li>
                        <h3 class="directory" onclick="listmenu1()"><span>+</span>管理员账户</h3>
                        <dl  id="menu1" style="display:none;">
                            <dd><a href="listAdmin.php" target="mainFrame">管理员列表</a></dd>
                            <dd><a href="addAdmin.php" target="mainFrame">添加管理员</a></dd>
                        </dl>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</body>
<script language="javascript"> 
   function listmenu1() 
        { 
           document.all.menu1.style.display=(document.all.menu1.style.display=='none')?'':'none';
}
   function listmenu2() 
        { 
           document.all.menu2.style.display=(document.all.menu2.style.display=='none')?'':'none';
}
</script> 
</html>