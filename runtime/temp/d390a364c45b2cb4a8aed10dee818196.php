<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:62:"C:\phpStudy\PHPTutorial\WWW/APP/daili\view\index\chongzhi.html";i:1564049955;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title><?php echo $siteinfo['sitename']; ?> - 充值中心</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="__STATIC__/layui/css/layui.css">
    <link rel="stylesheet" href="__STATIC__/css/dailiCenter.css">
    <link rel="stylesheet" href="__STATIC__/css/font.css">
    <script src="__STATIC__/layui/layui.js" charset="utf-8"></script>
    <!-- 注意：如果你直接复制所有代码到本地，上述css路径需要改成你本地的 -->
</head>

<body>
    <div class="layui-container">
        <blockquote class="layui-elem-quote layui-text">
            最低1一元起充。告知
        </blockquote>
        <fieldset class="layui-elem-field">
            <legend>充值订单信息</legend>
            <div class="layui-field-box">
                <form class="layui-form" action="/daili/index/Payload">
                    <input type="text" name="paytype" value="8" hidden>
                    <div class="layui-form-item">
                        <div class="layui-inline">
                            <label class="layui-form-label">联系方式：</label>
                            <div class="layui-input-inline">
                                <input type="tel" name="email" lay-verify="required" autocomplete="off"
                                    class="layui-input">
                            </div>
                        </div>
                        <div class="layui-inline">
                            <label class="layui-form-label">充值金额：</label>
                            <div class="layui-input-inline">
                                <input type="text" name="summoney" maxlength="3" lay-verify="required" autocomplete="off"
                                    class="layui-input">
                            </div>
                            <div class="layui-form-mid layui-word-aux">最大充值额度999元</div>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">支付方式：</label>
                        <div class="layui-input-block">
                            <?php if(($siteinfo['alipay'] == 1)): ?>
                            <input type="radio" name="type" value="alipay" title="支付宝" checked="">
                            <?php endif; if(($siteinfo['wxpay'] == 1)): ?>
                            <input type="radio" name="type" value="wxpay" title="微信">
                            <?php endif; if(($siteinfo['qqpay'] == 1)): ?>
                            <input type="radio" name="type" value="qqpay" title="QQ钱包">
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <button class="layui-btn" lay-submit="" lay-filter="demo1">立即提交</button>
                            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                        </div>
                    </div>
                </form>
            </div>
        </fieldset>

    </div>
    <script>
        layui.use(['form'], function () {
            var form = layui.form
                , layer = layui.layer
        });
    </script>

</body>

</html>