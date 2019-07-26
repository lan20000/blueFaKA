<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:71:"/data/home/xyu3109030001/htdocs/APP/adminxyxyxxy/view/index/addcat.html";i:1532440666;s:64:"/data/home/xyu3109030001/htdocs/APP/adminxyxyxxy/view/index.html";i:1532440666;}*/ ?>
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
            
<form class="layui-form" action="/adminxyxyxxy/index/addcat" style="margin-top:20px" method="post">
        <div class="layui-form-item">
          <label class="layui-form-label">分类名</label>
          <div class="layui-input-block">
            <input type="text" name="name" placeholder="请输入分类名" class="layui-input">
          </div>
        </div>
        <div class="layui-form-item">
          <label class="layui-form-label">分类简称</label>
          <div class="layui-input-block">
            <input type="text" name="abridge" placeholder="字母或者数字(不建议用汉字)" class="layui-input">
          </div>
        </div>
        <div class="layui-form-item">
                <label class="layui-form-label">分类图片</label>
                <div class="layui-input-block">
                  <input type="text" name="image" placeholder="请输入带http://的图片链接" class="layui-input">
                </div>
              </div>
              <div class="layui-form-item">
                  <label class="layui-form-label">分类排序</label>
                  <div class="layui-input-block">
                    <input type="number" name="sort" placeholder="数字越小越靠前" class="layui-input">
                  </div>
                </div>
              <div class="layui-form-item">
                    <div class="layui-input-block">
                      <button class="layui-btn" lay-submit="" lay-filter="demo1">立即提交</button>
                    </div>
                  </div>
        </form>


    </div>
</body>

</html>