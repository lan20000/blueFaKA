<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:80:"D:\PHPstroe\phpStudySetup\PHPTutorial\WWW/APP/adminxyxyxxy\view\login\login.html";i:1563082727;}*/ ?>
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
    <link rel="stylesheet" href="__STATIC__/layui/css/layui.css">
    <script src="__STATIC__/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="__STATIC__/js/xadmin.js"></script>
</head>
<body class="login-bg">
    
    <div class="login">
        <form method="post" class="layui-form" action="">
           <hr class="hr15">
            <div class="layui-form-item">
                <label class="layui-form-label">
                    <img src="" alt="验证码" onclick="newcode(this)" style="height: 100%;width: 100%;" />
                </label>
                <div class="layui-input-block">
                    <input name="code" lay-verify="required" placeholder="验证码"  type="text" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">
                    用户名
                </label>
                <div class="layui-input-block">
                    <input name="username" placeholder="用户名"  type="text" lay-verify="required" class="layui-input" >
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">
                    密码
                </label>
                <div class="layui-input-block">
                    <input name="password" lay-verify="required" placeholder="密码"  type="password" class="layui-input">
                </div>
            </div>
            <input value="登录" lay-submit lay-filter="login" style="width:100%;" type="submit">   
        </form>
        <div class="login-footer">
            <p><span>Copyright © <?php echo $siteinfo['sitename']; ?> 2019 by </span></p>
        </div>
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