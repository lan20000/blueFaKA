<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:60:"C:\phpStudy\PHPTutorial\WWW/APP/index\view\index\search.html";i:1564019222;s:52:"C:\phpStudy\PHPTutorial\WWW/APP/index\view\base.html";i:1563966804;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
订单查询
-<?php echo $siteinfo['sitename']; ?></title>
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
    </style>

</head>

<style>

</style>

<body>
    <div class="top0">
        <div class="mainwidth">严禁利用本平台做一些非法事情，一旦本站发现此类情况，本站将全力配合有关部门予以打击！ 客服 QQ：<?php echo $siteinfo['qq']; ?> </div>
    </div>
    <ul class="layui-nav "
        style="border-radius:0; margin-bottom:5px;border-bottom: solid 3px #093;background-color: #fff;">
        <div class="layui-container">
            <!--<li class="layui-nav-item"><a href="/"><span ><img style="font-size:25px;color:#FFFFFF;line-height: 50px;" src="/logo.jpg" alt="<?php echo $siteinfo['sitename']; ?>" height="60px"></span></a></li>-->
            <li class="layui-nav-item"><a href="/"
                    style="font-size:25px;color:#000;line-height: 50px;"><?php echo $siteinfo['sitename']; ?></a></li>
            <li class="layui-nav-item"><a href="/index/index/ms" style="font-size: 20px;color:#000"><i
                        class="layui-icon" target="_blank" style="font-size: 20px;">&#xe64c;</i>&nbsp;<?php echo $mstitle; ?></a></li>
            <li class="layui-nav-item"><a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $siteinfo['qq']; ?>&site=qq&menu=yes"
                    style="font-size: 20px;color:#000"><i class="layui-icon" style="font-size: 20px;">&#xe606;
                    </i>联系客服</a></li>
            <li class="layui-nav-item"><a href="/daili/login" target="_blank" style="font-size: 20px;color:#000"><i class="layui-icon"
                        style="font-size: 20px;">&#xe653;</i>&nbsp;会员中心</a></li>
            <li class="layui-nav-item"><a href="/index/index/inquire" target="_blank" style="font-size: 20px;color:#000"><i class="layui-icon"
                            style="font-size: 20px;">&#xe615;</i>&nbsp;查询订单</a></li>
    
            <!--<li class="layui-nav-item" onclick="return searchbtn()"><a href="/" style="font-size: 20px;color:#FFFFFF"><i class="layui-icon" style="font-size: 20px;">&#xe615;</i></i>查询订单</a></li>-->

        </div>
    </ul>


    <div class="layui-container">
        
<div style="margin-top:20px;color:green;font-size:30px">您的订单信息如下</div>
<?php foreach($orderinfo as $val): ?>
<table class="layui-table">
  
    <tr>
      <td style="width:30%">订单编号</td><td><?php echo $val['ddid']; ?></td>
    </tr>
    <tr>
      <td>商品名称</td><td><?php echo $val['name']; ?></td>
    </tr>
    <tr>
      <td>下单时间</td>
      <td><?php echo $val['time']; ?></td>
    </tr>
    <tr>
      <td>支付价格</td><td><?php echo $val['price']; ?>元</td>
    </tr>
    <tr>
      <td>购买数量</td><td><?php echo $val['count']; ?>件</td>
    </tr>
    <tr>
      <td>联系方式</td>
      <td><?php echo $val['email']; ?></td>
    </tr>
    <tr>
      <td>卡密信息</td><td style="color:red">
      <p id="<?php echo $val['ddid']; ?>"></p>
      <button class="layui-btn layui-btn-primary layui-btn-sm" onclick="lookkm('<?php echo $val['ddid']; ?>')" id="btn-<?php echo $val['ddid']; ?>">查看卡密</button>
      </td>
    </tr>
    <tr>
      <?php if($val['type']==null): ?>
      <td>支付方式</td><td>会员支付</td>
      <?php else: ?>
      <td>支付方式</td><td><?php echo $val['type']; ?></td>
      <?php endif; ?>
    </tr>
    <tr>
      <td>订单状态</td><td><span id="status-<?php echo $val['ddid']; ?>"><?php echo $val['status']; ?></span></td>
    </tr>
   
 
</table>
<?php endforeach; ?>
<div id="fenye"></div>
<script>
  function lookkm(ddid){
    $.ajax({
      url: '/index/index/kminfo.html',
      type: 'GET',
      data: 'ddid=' + ddid,
      success: function (data) {
        $.each(data, function (key, value) {  //循环遍历后台传过来的json数据 
          $("#" + ddid).append(value.kahao +'<br/>');
        });
        $("#btn-"+ ddid).remove();
      }
    });
  }
  // layui.use('laypage', function () {
  //     var laypage = layui.laypage;

  //     //执行一个laypage实例
  //     laypage.render({
  //       elem: 'fenye' //注意，这里的 test1 是 ID，不用加 # 号
  //       ,count: <?php echo $count; ?> //数据总数，从服务端得到
  //       ,curr: <?php echo \think\Request::instance()->get('page'); ?>
  //       , limit: 5 
  //       , jump: function (obj, first) {
  //         //obj包含了当前分页的所有参数，比如：
  //         //alert(obj.curr)
  //         if (!first) {
  //            window.location.href = "/search.html?ddid=<?php echo \think\Request::instance()->get('ddid'); ?>&page=" + obj.curr;
  //         }
         

  //       }
  //     });
  //   });
</script>



    </div>
    <script>
  layui.use('form', function(){
    var form = layui.form; 
    form.render();
  }); 
    </script>
</body>

</html>