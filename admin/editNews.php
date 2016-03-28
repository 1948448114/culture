<?php
require_once("../include.php");
$id=$_REQUEST["id"];
$sql="select * from news_table where news_id='".$id."';";
$row=fetchOne($sql);
$title=$row['news_title'];
$author=$row['news_author'];
$content=$row['news_content'];
$id=$row['news_id'];
//转义content中的""
$strings=explode("\"", $content);
$trans_content=implode("\\\"",$strings);
?>
<!DOCTYPE HTML>
<html>
<head>

    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <title>news broad</title>
<!--     <link href="richtext/themes/default/css/umeditor.css" type="text/css" rel="stylesheet"> -->
    <link href="richtext/themes/default/css/umeditor.min.css" type="text/css" rel="stylesheet">
    <script type="text/javascript" src="richtext/third-party/jquery.min.js"></script>
    <script type="text/javascript" charset="utf-8" src="richtext/umeditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="richtext/umeditor.min.js"></script>
    <script type="text/javascript" src="richtext/lang/zh-cn/zh-cn.js"></script>
    <link rel="stylesheet" type="text/css" href="richtext/richEditor.css"></link>
</head>
<body>
    <form action="editNewsOperation.php" method="post" id="newsForm" name="newsForm">
    <h1>新闻发布平台</h1>
    <br/>
    <table width="330px" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
            <tr>
                <td>标题</td>
                <td><input type="text" name="title" style="width:250px;height:25px" value="<?php echo $title; ?>" /></td>
            </tr>
            <tr>
                <td>作者</td>
                <td><input type="text" name="author" style="width:250px;height:25px" value="<?php echo $author; ?>"/></td>
            </tr>
            <tr>
                <input type="hidden" id="newsContent" name="htmlContent" value=".."/>
            </tr>
            <tr>
                <input type="hidden" id="newsId" name="newsId" value="<?php echo $id; ?>" />
            </tr>
        </table>
    <br/>
    <script type="text/plain" id="myEditor" style="height:600px" >
    </script>
    <div>
        <button id="button" style="margin-top:10px" class="button" type="submit">更新</button>
    </div>

    <script type="text/javascript">
    //实例化编辑器
    var um = UM.getEditor('myEditor');
    um.setContent("<?php echo $trans_content; ?>");
    document.getElementById("button").addEventListener("click",function(){
        document.getElementById("newsContent").value=um.getContent();
    });
    </script>
    </form>
</body>
</html>