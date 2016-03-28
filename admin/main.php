<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html" charset="utf-8">
<title>配置信息</title>
</head>
<body>
    <center>
        <h3>系统信息</h3>
        <table width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
            <tr>
                <th>操作系统</th>
                <td><?php echo PHP_OS;?></td>
            </tr>
            <tr>
                <th>Apache版本</th>
                <td><?php echo apache_get_version();?></td>
            </tr>
            <tr>
                <th>PHP版本</th>
                <td><?php echo PHP_VERSION;?></td>
            </tr>
            <tr>
                <th>运行方式</th>
                <td><?php echo PHP_SAPI;?></td>
            </tr>
        </table>
        <h3>软件信息</h3>
         <table width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
            <tr>
                <th>系统名称</th>
                <td>东南大学文化治理研究所网站后台</td>
            </tr>
            <tr>
                <th>开发团队</th>
                <td>软件学院Linux俱乐部</td>
            </tr>
            <tr>
                <th>起始运行</th>
                <td>2016-3-26</td>
            </tr>
        </table>
    </center>
</body>
</html>

