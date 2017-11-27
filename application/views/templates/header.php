<!doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <title><?php echo $title; ?></title>
    <meta name="keywords" content="邮件追踪">
    <meta name="description" content="外星人是一项简单易用的电子邮件追踪服务，帮助您追踪已经发送的邮件。">
    <link href="/static/css/css.min.150107.css" rel="stylesheet">
    <link href="/static/css/dui.dialog.css" rel="stylesheet">
    <script type="text/javascript" src="http://static.ifread.com/js/jquery.min.js"></script>
    <script type="text/javascript" src="http://static.ifread.com/js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="http://static.ifread.com/js/jquery.form.min.js"></script>
    <script type="text/javascript" src="http://static.ifread.com/js/jquery.tooltip.pack.js"></script>
    <script type="text/javascript" src="http://static.ifread.com/js/dui.dialog.js"></script>
</head>

<body>
    <div id="wrapper">
        <noscript>您的浏览器似乎已禁用或不支持 JavaScript；请更改您的浏览器选项以启用 JavaScript。</noscript>

        <div id="header">
        <h1><a href="/"><img src="/static/img/logo.png" border="0" alt="电子邮件追踪服务" title="电子邮件追踪服务"><span class="sr-only">阅否电子邮件追踪服务</span></a></h1>
        <h2 class="fleft">简单易用的电子邮件追踪服务</h2>
        <div class="fright" id="header-navigation">
        <?php $username = $this->session->mail;
        if($username){
            echo $username;
         ?>
        <a href="/">首页</a><a href="/account">管理</a><a href="/account/logout">退出</span></a></div>
        <?php }else{ ?>
        <a href="/">首页</a><a href="/account/login">登录</a><a href="/account/register">注册</span></a></div>
        <?php } ?>
    </div>