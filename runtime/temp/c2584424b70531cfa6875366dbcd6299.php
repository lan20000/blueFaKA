<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:61:"C:\phpStudy\PHPTutorial\WWW/APP/index\view\index\inquire.html";i:1563961150;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>首页-<?php echo $siteinfo['sitename']; ?></title>
    <link rel="stylesheet" href="__STATIC__/layui/css/layui.css">
    <link rel="stylesheet" href="__STATIC__/css/style.css">
    <!--<link rel="stylesheet" href="./public/static/layui/css/layui.css">-->
    <!--<link rel="stylesheet" href="./public/static/css/style.css">-->
    <script src="__STATIC__/layui/layui.js"></script>
    <script src="http://libs.baidu.com/jquery/1.8.3/jquery.js"></script>
    <script type="text/javascript" src="http://at.alicdn.com/t/font_486278_vzxioem775t81tt9.js"></script>
    <style type="text/css">
        .layui-table td,
        .layui-table th,
        .layui-table tr {
            border-bottom: dashed 1px #ccc;
        }

        .layui-table td {
            border-width: 0px;
            border-style: none;
        }

        .icon {
            width: 1em;
            height: 1em;
            vertical-align: -0.15em;
            fill: currentColor;
            overflow: hidden;
            font-size: 25px
        }
        .layui-elem-quote{background-color: #fff;}
    </style>

</head>



<blockquote class="layui-elem-quote">各位客户，请认真填写您的订单信息。以免不必要的重复查询！</blockquote>
 
<div class="layui-nav-item" id="header_form">
    <form class="layui-form zyl_pad_01" method="post" action="/index/index/queryorder" οnsubmit="return searchbtn()">
        <div style="width: 150px;float: left;height: 40px;">
            <img src="" alt="" onclick="newcode(this)" style="width: 100%;float: left;height: 100%;">
        </div>
        <input class="font header_form_input" type="text" name="code" id="code" style="width:90px;margin-right: 10px;"
            placeholder="请输入验证码" />
        <input class="font header_form_input" type="text" id="list" name="number"
            onkeyup="value=value.replace(/[^\d]/g,'')" placeholder="请输入订单号或者联系手机号">

        <input type="submit" class="font searchbtn" value="提交" id="inquire">
    </form>
</div>

<!-- 注意：如果你直接复制所有代码到本地，上述js路径需要改成你本地的 -->
<script>
    layui.use('form', function () {
        var form = layui.form;
        console.log()
        form.render();
        $('#inquire').on('click', function (event) {
            console.log();
            if ($("#list").val().length < 5 || $("#list").val() == '') {
                layer.open({
                    type: 1
                    , title: false //不显示标题栏
                    , closeBtn: false
                    , area: '300px;'
                    , shade: 0.8
                    , id: 'LAY_layuipro' //设定一个id，防止重复弹出
                    , btn: ['确定']
                    , btnAlign: 'c'
                    , moveType: 1 //拖拽模式，0或者1
                    , content: '<div style="padding: 20px;text-align: center;">请输入正确订单号！</div>'
                    , success: function (layero) {
                    }
                });
                event.preventDefault();
                return;
            }
            if ($("#code").val().length < 3 || $("#code").val() == '') {
                layer.open({
                    type: 1
                    , title: false //不显示标题栏
                    , closeBtn: false
                    , area: '300px;'
                    , shade: 0.8
                    , id: 'LAY_layuipro' //设定一个id，防止重复弹出
                    , btn: ['确定']
                    , btnAlign: 'c'
                    , moveType: 1 //拖拽模式，0或者1
                    , content: '<div style="padding: 20px;text-align: center;">请输入验证码</div>'
                    , success: function (layero) {
                    }
                });
                event.preventDefault();
                return;
            }
        });

    });
    function newcode(obj) {
        obj.src = '/index/index/selectcode?t=' + Math.random();
    }
    window.onload = function () {
        document.getElementsByTagName('img')[0].src = '/daili/Login/img?t=' + Math.random();
    }

</script>

</body>

</html>