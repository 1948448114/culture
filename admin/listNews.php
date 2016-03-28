<?php
require_once '../include.php';
$rows=getAllNews();
if(!$rows){
    alertMes("No news.","addNews.php");
    exit;
}
?>
<!--表格-->
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html" charset="utf-8">
<title>新闻列表</title>
<link rel="stylesheet" href="style/backstage.css">
</head>
<body>
<div class="details">
<div class="details_operation clearfix">
    <div class="bui_select">
        <input type="button" value="添&nbsp;&nbsp;加" class="add" onclick="addNews()">
    </div>
    <div class="fr">
        <div class="text">
            <span>新闻名称：</span>
            <div class="bui_select">
                <select name="" id="" class="select">
                    <option value="1">测试内容</option>
                    <option value="1">测试内容</option>
                    <option value="1">测试内容</option>
                </select>
            </div>
        </div>
        <div class="text">
            <span>发布时间：</span>
            <div class="bui_select">
                <select name="" id="" class="select">
                    <option value="1">测试内容</option>
                    <option value="1">测试内容</option>
                    <option value="1">测试内容</option>
                </select>
            </div>
        </div>
        <div class="text">
            <span>搜索</span>
            <input type="text" value="" class="search">
        </div>
    </div>
</div>
<table class="table" cellspacing="0" cellpadding="0">
    <thead>
        <tr>
            <th width="7%">序号</th>
            <th width="7%">ID</th>
            <th width="18%">标题</th>
            <th width="10%">作者</th>
            <th width="20%">新闻地址</th>
            <th width="18%">发布时间</th>
            <th width="20%">操作</th>
        </tr>
    </thead>
    <tbody>
        <?php $i=1; foreach ($rows as $row): ?>
        <tr>
            <!-- loop -->
            <td align="center">
                <?php echo $i; ?>
            </td>
            <td align="center">
                <label for="c1" class="label"><?php echo $row['news_id']; ?></label>
            </td>
            <td align="center">
                <?php echo $row['news_title']; ?>
            </td>
            <td align="center">
            	<?php echo $row['news_author']; ?>
            </td>
            <td align="center">
                <a href="..//<?php echo $row['news_link']; ?>">..//<?php echo $row['news_link']; ?></a> 
            </td>
            <td align="center">
            	<?php echo date("Y-m-d h:i:s ", $row['news_time']); ?>
            </td>
            <td align="center">
                <input type="button" value="修改" class="btn" onclick="editNews(<?php echo $row['news_id']; ?>)" />
                <input type="button" value="删除" class="btn" onclick="deleteNews(<?php echo $row['news_id']; ?>)" />
            </td>
        </tr>
        <?php $i++; endforeach ?>
    </tbody>
</table>
</body>
<script type="text/javascript">
    function addNews(){
         window.location="addNews.php";
    }
    function editNews(id){
        window.location="editNews.php?id="+id;
    }
    function deleteNews(id){
        if(window.confirm("不可逆的操作，继续吗？")){
            window.location="doAdminAction.php?act=deleteNews&id="+id;
        }
    }
</script>
</html>