<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:69:"/data/home/xyu3109030001/htdocs/APP/adminxyxyxxy/view/index/kami.html";i:1532440668;s:64:"/data/home/xyu3109030001/htdocs/APP/adminxyxyxxy/view/index.html";i:1532440666;}*/ ?>
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
  <div class="layui-inline layui-form " style="">
  <select id="cat" lay-filter="cat" >
    <option value="all">全部商品</option>
    <?php foreach($res as $vo): ?>
    <option value="<?php echo $vo['id']; ?>"><?php echo $vo['name']; ?></option>
    <?php endforeach; ?>
  </select>
  </div>
  <div class="layui-inline layui-form " style="">
    <select id="status" lay-filter="status">
    <option value="2">全部</option>
    <option value="1">已售出</option>
    <option value="0">库存中</option>
    </select>
  
  </div>
  <button class="layui-btn" data-type="reload">查询</button>
  <button class="layui-btn" data-type="delData">删除</button>
</div>
<table class="layui-hide" id="kami" lay-filter="demo"></table>
<script type="text/html" id="barDemo">
  <a class="layui-btn layui-btn-xs" lay-event="del"><i class="layui-icon">&#xe640;</i>删除</a>
    <a class="layui-btn layui-btn-xs layui-btn-primary" lay-event="detail"><i class="layui-icon">&#xe615;</i>详情</a>
</script>
 <script>
  layui.use('table', function () {
    var table = layui.table;

    table.render({
      elem: '#kami'
      , url: '/adminxyxyxxy/index/kamidata'
      , cellMinWidth: 80
      , skin: 'row'
      , even: true
      , cols: [[
          { type: 'checkbox' }
        , { field: 'id', title: '卡密编号', sort: true, align: 'center' }
        , { field: 'name', title: '商品名称', align: 'center' }
        , { field: 'kahao', title: '卡号', align: 'center' }

        , { field: 'status', title: '状态', align: 'center' }
        , { title: '操作',width: 250, align: 'center', toolbar: '#barDemo' }

      ]]
      , page: true
      , limit: 20
    });
    table.on('tool(demo)', function (obj) {
      var tbdata = obj.data;
      if (obj.event === 'del') {
        layer.confirm('真的删除此卡密么？', function (index) {
          //del star
          $.ajax({
            type: "GET",
            url: "/adminxyxyxxy/index/delkami.html",
            data: 'id=' + tbdata.id,
            success: function (data) {
              // layer.alert(data);
              if (data == "0") {
                layer.msg('删除成功');
                obj.del();
              } else if (data == "1") {
                layer.msg('删除失败');
                
              }
            }
          });
          //del end
          layer.close(index);
        });
      } else if (obj.event === 'detail') {
        $.ajax({
          type: "GET",
          url: "/adminxyxyxxy/index/kamiinfo.html",
          data: 'id=' + tbdata.id,
          success: function (data) {
             layer.alert(data);
          }
        });
      }
    });
    var $ = layui.$, active = {
      reload: function () {
        var demoReload = $('#cat');
        var statusreload = $('#status');

        //执行重载
        table.reload('kami', {
           where: {
            id: demoReload.val(),
            status: statusreload.val()

          }
        });
      }
        , delData: function () { //获取选中数据
        var checkStatus = table.checkStatus('kami')
          , data = checkStatus.data;
         layer.confirm('确定这些卡密么', function (index) {
        $.ajax({
            type: "GET",
            url: "/adminxyxyxxy/index/pldelkm.html",
            data: 'data=' + JSON.stringify(data),
            success: function (data) {
              layer.msg(data);
              table.reload('kami', {
              });
              
            }
          });
          });
          //
      }
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