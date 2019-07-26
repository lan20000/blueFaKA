<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:70:"/data/home/xyu3109030001/htdocs/APP/adminxyxyxxy/view/index/index.html";i:1532440668;}*/ ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>后台管理中心-<?php echo $siteinfo['sitename']; ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link rel="stylesheet" href="__STATIC__/css/font.css">
    <link rel="stylesheet" href="__STATIC__/layui/css/layui.css">
    <link rel="stylesheet" href="__STATIC__/css/xadmin.css">
    <script src="http://libs.baidu.com/jquery/1.8.3/jquery.js"></script>
    <script src="__STATIC__/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="__STATIC__/js/xadmin.js"></script>

</head>
<body>
    <!-- 顶部开始 -->
    <div class="container">
        <div class="logo"><a href="/adminxyxyxxy/index/index.html"><?php echo $siteinfo['sitename']; ?>后台管理</a></div>
        <div class="left_open">
            <i title="展开左侧栏" class="iconfont">&#xe699;</i>
        </div>
        <ul class="layui-nav left fast-add" lay-filter="">
                <li class="layui-nav-item">
                    
                  <a href=""><i class="layui-icon">&#xe68e;</i> 后台首页</a>
                  
                </li>
        </ul>
        <ul class="layui-nav right" lay-filter="">
          <li class="layui-nav-item" style="">
            <a href="javascript:;"><?php echo \think\Session::get('username'); ?></a>
            <dl class="layui-nav-child"> <!-- 二级菜单 -->
              <!-- <dd><a onclick="x_admin_show('个人信息','http://www.baidu.com')">个人信息</a></dd>
              <dd><a onclick="x_admin_show('切换帐号','http://www.baidu.com')">切换帐号</a></dd> -->
              <dd><a href="/adminxyxyxxy/index/loginout.html">退出</a></dd>
            </dl>
          </li>
          <li class="layui-nav-item to-index"><a href="/"  target="_blank">前台首页</a></li>
        </ul>
        
    </div>
    <!-- 顶部结束 -->
    <!-- 中部开始 -->
     <!-- 左侧菜单开始 -->
    <div class="left-nav">
      <div id="side-nav">
        <ul id="nav">

                    <li>
                        <a _href="/adminxyxyxxy/index/order">
                            <i class="layui-icon">&#xe60e;</i>
                            <cite>订单记录</cite>
                        </a>
                    </li >


                <ul class="sub-menu">
                    <li>
                        <a _href="/adminxyxyxxy/index/category">
                            <i class="layui-icon">&#xe705;</i>
                            <cite>分类列表</cite>
                        </a>
                    </li >
                    <li>
                        <a _href="/adminxyxyxxy/index/addcat.html">
                            <i class="layui-icon">&#xe63c;</i>
                            <cite>添加分类</cite>
                        </a>
                    </li >
                </ul>


                <ul class="sub-menu">
                    <li>
                        <a _href="/adminxyxyxxy/index/goods.html">
                            <i class="layui-icon">&#xe64d;</i>
                            <cite>商品列表</cite>
                        </a>
                    </li >
                    <li>
                        <a _href="/adminxyxyxxy/index/addgood.html">
                            <i class="layui-icon">&#xe622;</i>
                            <cite>添加商品</cite>
                        </a>
                    </li >
                </ul>



                <ul class="sub-menu">
                    <li>
                        <a _href="/adminxyxyxxy/index/kami.html">
                            <i class="layui-icon">&#xe65f;</i>
                            <cite>卡密列表</cite>
                        </a>
                    </li >
                    <li>
                            <a _href="/adminxyxyxxy/index/addkami.html">
                                <i class="layui-icon">&#xe671;</i>
                                <cite>添加卡密</cite>
                            </a>
                        </li >
                </ul>



            <li>
                <a href="javascript:;">
                        <i class="layui-icon">&#xe631;</i>
                    <cite>网站设置</cite>
                    <i class="iconfont nav_right">&#xe697;</i>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a _href="/adminxyxyxxy/index/option.html">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>常用设置</cite>
                        </a>
                    </li >
                    <li>
                        <a _href="/adminxyxyxxy/index/ms.html">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>菜单页面</cite>
                        </a>
                    </li >                    
                    <li>
                            <a _href="/adminxyxyxxy/index/apipay.html">
                                <i class="iconfont">&#xe6a7;</i>
                                <cite>支付接口</cite>
                            </a>
                        </li>
<!--                        <li>
                                <a _href="/adminxyxyxxy/index/links.html">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>友情链接</cite>
                                </a>
                            </li>-->
                        <li>
                            <a _href="/adminxyxyxxy/index/clear.html">
                                <i class="iconfont">&#xe6a7;</i>
                                <cite>数据清理</cite>
                            </a>
                        </li>
                        <li>
                                <a _href="/adminxyxyxxy/index/password.html">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>修改密码</cite>
                                </a>
                            </li >
                </ul>
            </li>
        </ul>
      </div>
    </div>
    <!-- <div class="x-slide_left"></div> -->
    <!-- 左侧菜单结束 -->
    <!-- 右侧主体开始 -->
    <div class="page-content">
        <div class="layui-tab tab" lay-filter="xbs_tab" lay-allowclose="false">
          <ul class="layui-tab-title">
            <li>首页</li>
          </ul>
          <div class="layui-tab-content">
            <div class="layui-tab-item layui-show">
                <iframe src='/adminxyxyxxy/index/welcome.html' frameborder="0" scrolling="yes" class="x-iframe"></iframe>
            </div>
          </div>
        </div>
    </div>
    <div class="page-content-bg"></div>
    <!-- 右侧主体结束 -->
    <!-- 中部结束 -->
    <!-- 底部开始 -->
    <div class="footer">
        <div class="copyright">Copyright ©2017 <?php echo \think\Config::get('weboption.sitename'); ?> All Rights Reserved</div>  
    </div>
    <!-- 底部结束 -->
    
</body>
</html>