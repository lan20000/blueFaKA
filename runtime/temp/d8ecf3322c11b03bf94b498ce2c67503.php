<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:70:"C:\phpStudy\PHPTutorial\WWW/APP/adminxyxyxxy\view\index\mboptions.html";i:1563880044;s:60:"C:\phpStudy\PHPTutorial\WWW/APP/adminxyxyxxy\view\index.html";i:1563778070;}*/ ?>
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
            

<form action="/adminxyxyxxy/index/mboptions" method="post" onsubmit="return editgonggao()" class="layui-form">
    <fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
        <legend>基本配置</legend>
    </fieldset>
    <div class="layui-form-item">
        <label class="layui-form-label">滚动公告：</label>
        <div class="layui-input-block">
            <textarea id="goodgg" name="info" class="layui-textarea"><?php echo $res['affiche']; ?></textarea>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">弹窗公告：</label>
        <div class="layui-input-block">
            <textarea id="goodgg" name="info1" class="layui-textarea"><?php echo $res['popup']; ?></textarea>
        </div>
    </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-input-block">
            <button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
        </div>
    </div>
</form>
<script>
    layui.use('form', function () {
        var form = layui.form;
        form.render();
        //各种基于事件的操作，下面会有进一步介绍
    });
    // KindEditor.ready(function (K) {
    //     window.editor = K.create('#gonggao', {
    //         width: '100%',
    //         height: '300px',
    //         items: [
    //             'source', 'justifycenter', 'justifyright', 'insertorderedlist', 'insertunorderedlist', 'fontname', 'fontsize', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline', 'strikethrough', 'image', 'hr', 'emoticons', 'link', 'unlink'
    //         ]
    //     });
    //     window.editor = K.create('#goodgg', {
    //         width: '100%',
    //         height: '300px',
    //         items: [
    //             'source', 'justifycenter', 'justifyright', 'insertorderedlist', 'insertunorderedlist', 'fontname', 'fontsize', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline', 'strikethrough', 'image', 'hr', 'emoticons', 'link', 'unlink'
    //         ]
    //     });
    // });
</script>


    </div>
</body>

</html>