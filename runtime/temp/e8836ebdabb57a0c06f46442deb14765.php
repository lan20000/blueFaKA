<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:69:"C:\phpStudy\PHPTutorial\WWW/APP/adminxyxyxxy\view\index\adddaili.html";i:1532440667;s:60:"C:\phpStudy\PHPTutorial\WWW/APP/adminxyxyxxy\view\index.html";i:1563778070;}*/ ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>后台管理中心-<?php echo $siteinfo['sitename']; ?></title>
	<meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="stylesheet" href="__STATIC__/css/font.css">
    <!-- <link rel="stylesheet" href="__STATIC__/css/xadmin.css"> -->
    <link rel="stylesheet" href="__STATIC__/layui/css/layui.css">
    <script src="http://libs.baidu.com/jquery/1.8.3/jquery.js"></script>
    <script src="__STATIC__/layui/layui.js" charset="utf-8"></script>
    <!-- <script type="text/javascript" src="__STATIC__/js/xadmin.js"></script> -->
    <script type="text/javascript" src="http://at.alicdn.com/t/font_486278_on5t8whs6aymygb9.js"></script>
    
     <style type="text/css"> 
     .icon { 
         width: 1em; 
         height: 1em;
         vertical-align: -0.15em;
         fill: currentColor; 
         overflow: hidden; 
         font-size: 25px
         }
        body{
            background-color: #ffffff;
        }
    </style>

</head>
<body>
    <div style="padding:10px">
            
<blockquote class="layui-elem-quote">新用户用户名与密码一致</blockquote>
<form class="layui-form" action="" method="post">
    <div class="layui-form-item">
        <label class="layui-form-label">用户名</label>
        <div class="layui-input-inline">
        <input type="text" name="username" lay-verify="username" autocomplete="off" placeholder="字母或数字" class="layui-input">
        </div>
        <div class="layui-form-mid layui-word-aux">用户名不支持修改</div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">邮箱</label>
        <div class="layui-input-inline">
            <input type="email" name="email" lay-verify="email" autocomplete="off" placeholder="请输入邮箱" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-input-block">
            <button class="layui-btn" lay-submit="" lay-filter="demo1">立即添加</button>
        </div>
    </div>

</form>

    </div>
</body>

</html>