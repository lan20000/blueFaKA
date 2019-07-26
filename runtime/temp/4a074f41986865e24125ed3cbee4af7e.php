<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:82:"D:\PHPstroe\phpStudySetup\PHPTutorial\WWW/APP/adminxyxyxxy\view\index\editcat.html";i:1532440668;s:74:"D:\PHPstroe\phpStudySetup\PHPTutorial\WWW/APP/adminxyxyxxy\view\index.html";i:1563081704;}*/ ?>
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
            
<form class="layui-form" action="/adminxyxyxxy/index/posteditcat" style="margin-top:20px" method="post">
    <div class="layui-form-item">
            <label class="layui-form-label">分类编号</label>
            <div class="layui-input-block">
              <input type="text" class="layui-input" value="<?php echo $res['id']; ?>" disabled> <input type="hidden" name="id" class="layui-input" value="<?php echo $res['id']; ?>">
            </div>
          </div>
        <div class="layui-form-item">
          <label class="layui-form-label">分类名</label>
          <div class="layui-input-block">
            <input type="text" name="name" placeholder="请输入分类名" class="layui-input" value="<?php echo $res['name']; ?>">
          </div>
        </div>
        <div class="layui-form-item">
          <label class="layui-form-label">分类简称</label>
          <div class="layui-input-block">
            <input type="text" name="abridge" placeholder="字母或者数字" class="layui-input" value="<?php echo $res['abridge']; ?>">
          </div>
        </div>
        <div class="layui-form-item">
                <label class="layui-form-label">分类图片</label>
                <div class="layui-input-block">
                  <input type="text" name="image" placeholder="请输入带http://的图片链接" class="layui-input" value="<?php echo $res['image']; ?>">
                </div>
              </div>
              <div class="layui-form-item">
                  <label class="layui-form-label">分类排序</label>
                  <div class="layui-input-block">
                    <input type="number" name="sort" placeholder="数字" class="layui-input" value="<?php echo $res['sort']; ?>">
                  </div>
                </div>
              <div class="layui-form-item">
                    <div class="layui-input-block">
                      <button class="layui-btn" lay-submit="" lay-filter="demo1">立即提交</button>
                      <a class="layui-btn layui-btn-normal" href="/adminxyxyxxy/index/category.html">返回</a>
                    </div>
                  </div>
        </form>


    </div>
</body>

</html>