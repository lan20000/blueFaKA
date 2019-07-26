<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:73:"D:\PHPstroe\phpStudySetup\PHPTutorial\WWW/APP/daili\view\login\index.html";i:1563809878;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title> - 会员登陆</title>
    <link rel="stylesheet" href="__STATIC__/css/font.css">
    <link rel="stylesheet" href="__STATIC__/layui/css/layui.css">
    <link rel="stylesheet" href="__STATIC__/css/daili.css" media="all">
    <style>
        /* 覆盖原框架样式 */
        .layui-elem-quote{background-color: inherit!important;}
        .layui-input, .layui-select, .layui-textarea{background-color: inherit; padding-left: 30px;}
    </style>
</head>
<body>
<!-- Head -->
<div class="layui-fluid">
    <div class="layui-row layui-col-space15">
        <div class="layui-col-sm12 layui-col-md12 zyl_mar_01">
            <blockquote class="layui-elem-quote">安全 · 高效 · 专注发卡！</blockquote>
        </div>
    </div>
</div>
<!-- Head End -->

<!-- Carousel -->
<div class="layui-row" style="height: 500px;">
    <div class="layui-col-sm12 layui-col-md12" style="height: inherit;">
        <div class="zyl_login_cont"></div>
    </div>
</div>
<!-- Carousel End -->

<!-- Footer -->
<div class="layui-row">
    <div class="layui-col-sm12 layui-col-md12 zyl_center zyl_mar_01">
        © 2019 简约后台登陆界面版权所有
    </div>
</div>
<!-- Footer End -->



<!-- LoginForm -->
<div class="zyl_lofo_main">
    <div style="background-color:#00868B;padding: 22px 0px;margin-bottom: 27px; position: relative;left: -15px;-moz-box-shadow:1px 1px 13px #BFACA5; -webkit-box-shadow:1px 1px 13px #BFACA5; box-shadow:1px 1px 13px #BFACA5;"/>
    <fieldset class="layui-elem-field layui-field-title zyl_mar_02">
        <legend>会员登陆 - </legend>
    </fieldset>
    </div>
    <div class="layui-row layui-col-space15">
        <form class="layui-form zyl_pad_01" action="">
            <div class="layui-col-sm12 layui-col-md12">
                <div class="layui-form-item">
                    <input type="text" name="userName" lay-verify="required|userName" autocomplete="off" placeholder="账号" class="layui-input">
                    <i class="layui-icon layui-icon-username zyl_lofo_icon"></i>
                </div>
            </div>
            <div class="layui-col-sm12 layui-col-md12">
                <div class="layui-form-item">
                    <input type="password" name="nuse" lay-verify="required|pass" autocomplete="off" placeholder="密码" class="layui-input">
                    <i class="layui-icon layui-icon-password zyl_lofo_icon"></i>
                </div>
            </div>
            <div class="layui-col-sm12 layui-col-md12">
                <div class="layui-row">
                    <div class="layui-col-xs4 layui-col-sm4 layui-col-md4">
                        <div class="layui-form-item">
                            <input type="text" name="vercode" id="vercode" lay-verify="required|vercodes" autocomplete="off" placeholder="验证码" class="layui-input" maxlength="4">
                            <i class="layui-icon layui-icon-vercode zyl_lofo_icon"></i>
                        </div>
                    </div>
                    <div class="layui-col-xs4 layui-col-sm4 layui-col-md4">
                        <div class="zyl_lofo_vercode zylVerCode" ><img src="" onclick="newcode(this)" style="width: 100%;" /></div>
                    </div>
                </div>
            </div>
            <div class="layui-col-sm12 layui-col-md12">
                <button class="layui-btn layui-btn-fluid" lay-submit="" lay-filter="demo1">立即登录</button>
                &nbsp;&nbsp;&nbsp;
                <a href="#" id="forgetpassword" class="layadmin-user-jump-change layadmin-link" style="margin-top: 7px;">忘记密码？</a>
                &nbsp;&nbsp;&nbsp;
                <a href="#" id="registerMember" class="layadmin-user-jump-change layadmin-link" style="margin-top: 7px;">注册会员</a>
            </div>

        </form>
    </div>
</div>
<!-- LoginForm End -->

<script src="__STATIC__/layui/layui.js" charset="utf-8"></script>
<!-- Jquery Js -->
<script type="text/javascript" src="__STATIC__/js/jquery.min.js"></script>
<!-- Jqarticle Js -->
<script type="text/javascript" src="__STATIC__/js/jparticle.jquery.min.js"></script>
<script>
    layui.use('layer', function(){
        var layer = layui.layer;
        $('#forgetpassword').on('click', function(){
                layer.alert('找回密码通道已关闭，请联系客服辅助找回会员密码。', {
                    icon: 1,
                    skin: 'layer-ext-moon' //该皮肤由layer.seaning.com友情扩展。关于皮肤的扩展规则，去这里查阅
                })
            });
        $('#registerMember').on('click', function(){
            layer.alert('注册会员通道已关闭，请联系客服注册账户。', {
                icon: 1,
                skin: 'layer-ext-moon' //该皮肤由layer.seaning.com友情扩展。关于皮肤的扩展规则，去这里查阅
         });
        });
    });
    function newcode(obj){
        obj.src='/daili/login/img?t='+Math.random();
    }

        //粒子线条
        $(".zyl_login_cont").jParticle({
            background: "#388E8E",//背景颜色
            color: "#fff",//粒子和连线的颜色
            particlesNumber:100,//粒子数量
            //disableLinks:true,//禁止粒子间连线
            //disableMouse:true,//禁止粒子间连线(鼠标)
            particle: {
                minSize: 1,//最小粒子
                maxSize: 3,//最大粒子
                speed: 30,//粒子的动画速度
            }
        });
    window.onload=function()
    {
        document.getElementsByTagName('img')[0].src='/daili/Login/img?t='+Math.random();
    }
</script>
</body>
</html>

