<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:82:"D:\PHPstroe\phpStudySetup\PHPTutorial\WWW/APP/adminxyxyxxy\view\index\welcome.html";i:1563775996;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>layuiAdmin 主页示例模板二</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">


    <link rel="stylesheet" href="__STATIC__/dist/layuiadmin/layui/css/layui.css" media="all">
    <link rel="stylesheet" href="__STATIC__/dist/layuiadmin/style/admin.css" media="all">
    <!-- __STATIC__/layui/ -->
    <script src="__STATIC__/layui/layui.js" charset="utf-8"></script>
</head>

<body>

    <div class="layui-fluid">
        <blockquote class="layui-elem-quote" style="background-color: #fff;">警告：管理员注意经常修改管理信息。比如：后台管理账号和密码</blockquote>
        <div class="layui-row layui-col-space15">
            <div class="layui-col-sm6 layui-col-md3">
                <div class="layui-card">
                    <div class="layui-card-header">
                        今日订单
                        <span class="layui-badge layui-bg-blue layuiadmin-badge">今</span>
                    </div>
                    <div class="layui-card-body layuiadmin-card-list">
                        <p class="layuiadmin-big-font"><?php echo $todybuyok; ?></p>
                        <p>
                            今日订单总数量
                            <!-- <span class="layuiadmin-span-color">88万 <i class="layui-inline layui-icon layui-icon-flag"></i></span> -->
                        </p>
                    </div>
                </div>
            </div>
            <div class="layui-col-sm6 layui-col-md3">
                <div class="layui-card">
                    <div class="layui-card-header">
                        今日总收入
                        <span class="layui-badge layui-bg-cyan layuiadmin-badge">今</span>
                    </div>
                    <div class="layui-card-body layuiadmin-card-list">
                        <p class="layuiadmin-big-font"><?php echo $todymoney; ?></p>
                        <p>
                            营业额
                            <!-- <span class="layuiadmin-span-color">10% <i class="layui-inline layui-icon layui-icon-face-smile-b"></i></span> -->
                        </p>
                    </div>
                </div>
            </div>
            <div class="layui-col-sm6 layui-col-md3">
                <div class="layui-card">
                    <div class="layui-card-header">
                        在售商品
                        <span class="layui-badge layui-bg-green layuiadmin-badge">总</span>
                    </div>
                    <div class="layui-card-body layuiadmin-card-list">

                        <p class="layuiadmin-big-font"><?php echo $good; ?></p>
                        <p>
                            总数量
                            <!-- <span class="layuiadmin-span-color"><i class="layui-inline layui-icon layui-icon-dollar"></i></span> -->
                        </p>
                    </div>
                </div>
            </div>
            <div class="layui-col-sm6 layui-col-md3">
                <div class="layui-card">
                    <div class="layui-card-header">
                        今日新增会员
                        <span class="layui-badge layui-bg-orange layuiadmin-badge">今</span>
                    </div>
                    <div class="layui-card-body layuiadmin-card-list">

                        <p class="layuiadmin-big-font"></p>
                        <p>
                            总数量：
                            <span class="layuiadmin-span-color"><i
                                    class="layui-inline layui-icon layui-icon-user"></i></span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="layui-row layui-col-space15">
            <div class="layui-col-sm12 layui-col-md6">
                <div class="layui-card">
                    <div class="layui-card-body">
                        <fieldset class="layui-elem-field">
                            <legend>服务器基本信息</legend>
                            <div class="layui-field-box">

                                <div class="layui-card-body layui-text">
                                    <table class="layui-table">
                                        <colgroup>
                                            <col width="100">
                                            <col>
                                        </colgroup>
                                        <tbody>
                                            <?php if(is_array($serverinfo) || $serverinfo instanceof \think\Collection || $serverinfo instanceof \think\Paginator): $i = 0; $__LIST__ = $serverinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                                            <tr>
                                                <td style="width: 100px;"><?php echo $key; ?></td>
                                                <td><?php echo $v; ?></td>
                                            </tr>
                                            <?php endforeach; endif; else: echo "" ;endif; ?>
                                            <tr>
                                                <td>基于框架</td>
                                                <td>
                                                    <script type="text/html" template>
                                                layui-v{{ layui.v }}
                                                </script>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
            <div class="layui-col-sm12 layui-col-md6">
                <div class="layui-card">
                    <div class="layui-card-header">
                        
                        <i class="layui-icon layui-icon-tips" lay-tips="要支持的噢" lay-offset="5"></i>
                    </div>
                    <div class="layui-card-body layui-text layadmin-text">
                        <p>本站已经防护加密，禁止外漏。如果发现，后果自负！</p>
                        <p>1.采用Layui框架和ThinkPHP渲染框架，请熟知</p>
                        <p>—— Blue</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script>
        layui.config({
            base: 'http://localhost/public/static/dist/layuiadmin/' //静态资源所在路径
        }).extend({
            index: 'lib/index' //主入口模块
        }).use(['index', 'sample']);
    </script>
</body>

</html>