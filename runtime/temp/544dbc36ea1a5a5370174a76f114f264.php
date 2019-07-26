<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:67:"C:\phpStudy\PHPTutorial\WWW/APP/adminxyxyxxy\view\index\apipay.html";i:1532440669;s:60:"C:\phpStudy\PHPTutorial\WWW/APP/adminxyxyxxy\view\index.html";i:1563778070;}*/ ?>
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
            
<form action="" method="post"  class="layui-form">
    <fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
      <legend>选择支付接口</legend>
    </fieldset>

  <div class="layui-form-item">
    <label class="layui-form-label">支付接口</label>
    <div class="layui-input-block">
      
      <input type="radio" name="paytype" value="1" title="码支付" <?php if(($res['paytype'] == 1)): ?>checked=""<?php endif; ?>> 
      <input type="radio" name="paytype" value="3" title="优云宝" <?php if(($res['paytype'] == 3)): ?>checked=""<?php endif; ?>> 
      <input type="radio" name="paytype" value="2" title="支付宝即时到账" <?php if(($res['paytype'] == 2)): ?>checked=""<?php endif; ?>>
      <input type="radio" name="paytype" value="0" title="面对面支付" <?php if(($res['paytype'] == 0)): ?>checked=""<?php endif; ?>>
    </div>
  </div>
<div >
	  <fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
    <legend>优云宝配置</legend>
  </fieldset>
<div class="layui-form-item">
    <label class="layui-form-label">APP ID</label>
    <div class="layui-input-inline">
      <input type="text" name="partner" value="<?php echo $res['partner']; ?>" class="layui-input">
    </div>
  </div>
  <div class="layui-form-item">
      <label class="layui-form-label">APP KEY</label>
      <div class="layui-input-inline">
        <input type="text" name="key" value="<?php echo $res['key']; ?>" class="layui-input">
      </div>
    </div>

</div>
    
    
  <fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
    <legend>码支付配置</legend>
  </fieldset>
  <div class="layui-form-item">
    <label class="layui-form-label">商户ID</label>
    <div class="layui-input-inline">
      <input type="text'" name="mzfid" value="<?php echo $res['mzfid']; ?>" class="layui-input">
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">token</label>
    <div class="layui-input-inline">
      <input type="text'" name="mzftoken" value="<?php echo $res['mzftoken']; ?>" class="layui-input">
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">通信密匙</label>
    <div class="layui-input-inline">
      <input type="text" name="mzfkey" value="<?php echo $res['mzfkey']; ?>" class="layui-input">
    </div>

  </div>
  
    <div class="layui-form-item">
      <div class="layui-input-block">
        <button class="layui-btn" lay-submit="" lay-filter="demo1">立即提交</button>
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