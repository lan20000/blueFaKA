<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:60:"/data/home/xyu3109030001/htdocs/APP/index/view/index/ms.html";i:1532440668;s:56:"/data/home/xyu3109030001/htdocs/APP/index/view/base.html";i:1532440668;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>首页-<?php echo $siteinfo['sitename']; ?></title>
    <link rel="stylesheet" href="__STATIC__/layui/css/layui.css">
    <link rel="stylesheet" href="__STATIC__/css/style.css">
    <script src="__STATIC__/layui/layui.js"></script>
    <script src="http://libs.baidu.com/jquery/1.8.3/jquery.js"></script>
    <script type="text/javascript" src="http://at.alicdn.com/t/font_486278_vzxioem775t81tt9.js"></script>
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
<script>function searchbtn() {
	layer.prompt({
		title: '请输入订单号或者联系手机号',
		formType: 0
	}, function(text, index) {
		layer.close(index);
		location.href='/search.html?page=1&ddid='+text;
	});
	return false;
}</script>
<style>
  
</style>
<body>
          <ul class="layui-nav layui-bg-blue" style="border-radius:0; margin-bottom:5px" >
                <div class="layui-container">
                <!--<li class="layui-nav-item"><a href="/"><span ><img style="font-size:25px;color:#FFFFFF;line-height: 50px;" src="/logo.jpg" alt="<?php echo $siteinfo['sitename']; ?>" height="60px"></span></a></li>-->
                <li class="layui-nav-item"><a href="/" style="font-size:25px;color:#FFFFFF;line-height: 50px;"><?php echo $siteinfo['sitename']; ?></a></li>
                <li class="layui-nav-item"><a href="/" style="font-size: 20px;color:#FFFFFF"><i class="layui-icon" style="font-size: 20px;;">&#xe68e;</i></i>首页</a></li>
                <li class="layui-nav-item"><a href="/index/index/ms" style="font-size: 20px;color:#FFFFFF"><i class="layui-icon" style="font-size: 20px;">&#xe64c;</i></i><?php echo $mstitle; ?></a></li>
                <li class="layui-nav-item"><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $siteinfo['qq']; ?>&site=qq&menu=yes" style="font-size: 20px;color:#FFFFFF"><i class="layui-icon" style="font-size: 20px;">&#xe63a;</i></i>联系客服</a></li>
                <li class="layui-nav-item" onclick="return searchbtn()"><a href="/" style="font-size: 20px;color:#FFFFFF"><i class="layui-icon" style="font-size: 20px;">&#xe615;</i></i>查询订单</a></li>
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