<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:70:"D:\PHPstroe\phpStudySetup\PHPTutorial\WWW/APP/index\view\index\ms.html";i:1532440668;s:66:"D:\PHPstroe\phpStudySetup\PHPTutorial\WWW/APP/index\view\base.html";i:1563724722;}*/ ?>
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

        .layui-table td, .layui-table th,.layui-table tr{
            border-bottom: dashed 1px #ccc;
        }
        .layui-table td{
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


    </style>
    
</head>
<script>function searchbtn() {
    // location.href='/search.html?page=1&ddid='+text;
}</script>
<style>
  
</style>
<body>
<div class="top0">
    <div class="mainwidth">严禁利用本平台做一些非法事情，一旦本站发现此类情况，本站将全力配合有关部门予以打击！  客服 QQ：<?php echo $siteinfo['qq']; ?>  </div>
</div>
          <ul class="layui-nav " style="border-radius:0; margin-bottom:5px;border-bottom: solid 3px #093;background-color: #fff;" >
                <div class="layui-container">
                <!--<li class="layui-nav-item"><a href="/"><span ><img style="font-size:25px;color:#FFFFFF;line-height: 50px;" src="/logo.jpg" alt="<?php echo $siteinfo['sitename']; ?>" height="60px"></span></a></li>-->
                <li class="layui-nav-item"><a href="/" style="font-size:25px;color:#000;line-height: 50px;"><?php echo $siteinfo['sitename']; ?></a></li>
                <li class="layui-nav-item"><a href="/index/index/ms" style="font-size: 20px;color:#000"><i class="layui-icon" style="font-size: 20px;">&#xe64c;</i>&nbsp;<?php echo $mstitle; ?></a></li>
                    <li class="layui-nav-item"><a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $siteinfo['qq']; ?>&site=qq&menu=yes" style="font-size: 20px;color:#000"><i class="layui-icon" style="font-size: 20px;">&#xe606;
                    </i>联系客服</a></li>
                    <li class="layui-nav-item"><a href="/daili/login" style="font-size: 20px;color:#000"><i class="layui-icon" style="font-size: 20px;">&#xe653;</i>&nbsp;会员中心</a></li>
                <!--<li class="layui-nav-item" onclick="return searchbtn()"><a href="/" style="font-size: 20px;color:#FFFFFF"><i class="layui-icon" style="font-size: 20px;">&#xe615;</i></i>查询订单</a></li>-->
                <li class="layui-nav-item" id="header_form">
                    <input class="font" type="text" name="ddh" onkeyup = "value=value.replace(/[^\d]/g,'')" placeholder="请输入订单号或者联系手机号">
                    <button class="font" onclick="searchbtn()">查    询</button>
                </li>
                </div>
              </ul>
              
              
      <div class="layui-container">
      
<?php echo $data; ?>

    </div>
    <script>
    layui.use('form', function(){
    var form = layui.form; 
    form.render();
  }); 
</script>
</body>
</html>