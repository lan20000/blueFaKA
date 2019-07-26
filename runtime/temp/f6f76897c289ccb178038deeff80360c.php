<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:83:"D:\PHPstroe\phpStudySetup\PHPTutorial\WWW/APP/adminxyxyxxy\view\index\password.html";i:1532440668;s:74:"D:\PHPstroe\phpStudySetup\PHPTutorial\WWW/APP/adminxyxyxxy\view\index.html";i:1563081704;}*/ ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>-<?php echo $siteinfo['sitename']; ?></title>
	<meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="stylesheet" href="__STATIC__/css/font.css">
    <link rel="stylesheet" href="__STATIC__/css/xadmin.css">
    <link rel="stylesheet" href="__STATIC__/layui/css/layui.css">
    <script src="http://libs.baidu.com/jquery/1.8.3/jquery.js"></script>
    <script src="__STATIC__/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="__STATIC__/js/xadmin.js"></script>
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
    </style>

</head>
<body>
    <div style="padding:10px">
            
<form action="" method="post">
        <div class="layui-form-item">
          <label class="layui-form-label">原密码</label>
          <div class="layui-input-inline">
            <input type="password" name="oldpwd" lay-verify="pass" placeholder="请输入原密码" autocomplete="off" class="layui-input">
          </div>
          <div class="layui-form-mid layui-word-aux">请填写6到12位密码</div>
        </div>
        <div class="layui-form-item">
          <label class="layui-form-label">新密码</label>
          <div class="layui-input-inline">
            <input type="password" name="newpwd" lay-verify="pass" placeholder="请输入新密码" autocomplete="off" class="layui-input">
          </div>
          <div class="layui-form-mid layui-word-aux">请填写6到12位密码</div>
        </div>
        <div class="layui-form-item">
          <label class="layui-form-label">确认密码</label>
          <div class="layui-input-inline">
            <input type="password" name="newpwd1" lay-verify="pass" placeholder="请输入再输入一遍新密码" autocomplete="off" class="layui-input">
          </div>
          <div class="layui-form-mid layui-word-aux">请填写6到12位密码</div>
        </div>
        <div class="layui-form-item">
          <div class="layui-input-block">
    
            <input class="layui-btn"  lay-filter="demo1" value="立即提交" type="submit">
          </div>
        </div>
      </form>
  <script>
        layui.use('element', function(){
                var element = layui.element;
                
                //一些事件监听
                element.on('tab(demo)', function(data){
                  console.log(data);
                });
              });
        </script>

    </div>
</body>

</html>