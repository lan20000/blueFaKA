<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:80:"D:\PHPstroe\phpStudySetup\PHPTutorial\WWW/APP/adminxyxyxxy\view\index\order.html";i:1532440668;s:74:"D:\PHPstroe\phpStudySetup\PHPTutorial\WWW/APP/adminxyxyxxy\view\index.html";i:1563081704;}*/ ?>
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
            
<div class="demoTable">
  <div class="layui-inline">
    <input class="layui-input"  id="demoReload" autocomplete="off" placeholder="订单号/联系方式">
  </div>
  <button class="layui-btn" data-type="reload">查询</button>
  <!-- <button class="layui-btn" data-type="getCheckData">获取选中行数据</button> -->
</div>
<table class="layui-hide" id="order" lay-filter="order"></table>
<script type="text/html" id="barDemo">
  <a class="layui-btn layui-btn-xs layui-btn-primary" lay-event="detail"><i class="layui-icon">&#xe615;</i>详情</a>
</script>
<script>
  layui.use('table', function () {
    var table = layui.table;
    table.render({
      elem: '#order'
      , url: '/adminxyxyxxy/index/orderdata'
      , cellMinWidth: 20
      , skin: 'row'
      , even: true
      , cols: [[
          //  { type: 'checkbox', fixed: 'left'}
          { field: 'ddid',  title: '订单号', sort: true, align: 'center' }
         , { field: 'name',  title: '商品名称', width: 400, align: 'center' }
         , { field: 'time',  title: '交易时间' , align: 'center'}
         , { field: 'count',  title: '数量', sort: true , align: 'center'}
         , { field: 'email',  title: '购买者信息' , align: 'center'}
         , { field: 'type',  title: '支付方式', align: 'center' }
         , { field: 'status', title: '状态', align: 'center' }
         , { fixed: '', title: '详情', align: 'center', toolbar: '#barDemo' }
      ]]
      , page: true
      , limit:20
    });
    table.on('tool(order)', function (obj) {
      var data = obj.data;
      if (obj.event === 'detail') {
        $.ajax({
          url: '/adminxyxyxxy/index/orderdetail.html',
          type: 'GET',
          data: 'ddid=' + data.ddid,
          success: function (data) {
           layer.alert(data);
          }
        });
        
      }
    });
    var $ = layui.$, active = {
        reload: function () {
          var demoReload = $('#demoReload');
          //执行重载
          table.reload('order', {
            page: {
              curr: 1 //重新从第 1 页开始
            }
            , where: {
                keyword: demoReload.val()
            }
          });
        }
      //   , getCheckData: function () { //获取选中数据
      //   var checkStatus = table.checkStatus('order')
      //     , dataok = checkStatus.data;      
      //   layer.alert(data_tatal);
      // }

      };
      $('.demoTable .layui-btn').on('click', function () {
        var type = $(this).data('type');
        active[type] ? active[type].call(this) : '';
      });
  });

</script>

    </div>
</body>

</html>