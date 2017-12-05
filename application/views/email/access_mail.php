<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="UTF-8" />
<title>通知邮件</title>
<style type="text/css">
body {margin:5px auto 5px;padding:0;width: 665px;}
p {text-indent:50px;}
table {margin:5px auto 5px;border:1px solid black;border-collapse: collapse;}
tr {display: table-row;vertical-align:inherit;border-color:inherit;}
tr:nth-child {background-color: #fff;}
td {border-bottom: 1px solid #ddd;border-right: 1px solid #ddd; border-left: 1px solid #ddd;
text-align:center;padding:3px;}
th {border-bottom: 1px solid #ddd;border-right: 1px solid #ddd; border-left: 1px solid #ddd;
text-align:left;padding:3px;}
</style>
</head>
<body>
Dear admin:<br />
<p>您的邮件有被查看，详细信息如下：</p>
<p>邮件主题：<?php echo $title;?></p>
<table>
<tr><td width="180px">时间</td><td width="140px">访问IP</td><td width="200px">访问地址</td></tr>
<?php foreach ($items as $item):?>
<tr><th><?php echo $item['time']?></th><th><?php echo $item['ip']?></th><th><?php echo $item['addr']?></th></tr>
<?php endforeach;?>
</table>
<p>此邮件为通知邮件，请不要回复此邮件；</p>
<p>如果不想再接受通知邮件，请点击此连接退订。</p>

</body>

</html>