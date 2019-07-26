<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:70:"/data/home/xyu3109030001/htdocs/APP/adminxyxyxxy/view/login/login.html";i:1532440668;}*/ ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>后台登录-<?php echo $siteinfo['sitename']; ?></title>
	<meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="stylesheet" href="__STATIC__/css/font.css">
    <link rel="stylesheet" href="__STATIC__/css/xadmin.css">
    <script src="__STATIC__/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="__STATIC__/js/xadmin.js"></script>
</head>
<body class="login-bg">
    
    <div class="login">
        <div class="message"><?php echo $siteinfo['sitename']; ?>-管理登录</div>
        <div id="darkbannerwrap"></div>
        <form method="post" class="layui-form" action="">

            <div><img src="" alt="验证码" onclick="newcode(this)"/></div>
            <input name="code" lay-verify="required" placeholder="验证码"  type="text" class="layui-input">
           <hr class="hr15">
           
            <input name="username" placeholder="用户名"  type="text" lay-verify="required" class="layui-input" >
            <hr class="hr15">
            <input name="password" lay-verify="required" placeholder="密码"  type="password" class="layui-input">
            <hr class="hr20" >
            <input value="登录" lay-submit lay-filter="login" style="width:100%;" type="submit">   
        </form>
    </div>
    <script>
    	function newcode(obj){
    		obj.src='/adminxyxyxxy/login/img?t='+Math.random();
    	}
    	window.onload=function()
    	{
    		document.getElementsByTagName('img')[0].src='/adminxyxyxxy/login/img?t='+Math.random();
    	}
    </script>
</body>
</html>