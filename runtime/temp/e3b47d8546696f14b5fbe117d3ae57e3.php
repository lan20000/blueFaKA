<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:80:"D:\PHPstroe\phpStudySetup\PHPTutorial\WWW/APP/adminxyxyxxy\view\index\goods.html";i:1532440668;s:74:"D:\PHPstroe\phpStudySetup\PHPTutorial\WWW/APP/adminxyxyxxy\view\index.html";i:1563778070;}*/ ?>
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
    <!-- <link rel="stylesheet" href="__STATIC__/css/xadmin.css"> -->
    <link rel="stylesheet" href="__STATIC__/layui/css/layui.css">
    <script src="http://libs.baidu.com/jquery/1.8.3/jquery.js"></script>
    <script src="__STATIC__/layui/layui.js" charset="utf-8"></script>
    <!-- <script type="text/javascript" src="__STATIC__/js/xadmin.js"></script> -->
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
        body{
            background-color: #ffffff;
        }
    </style>

</head>
<body>
    <div style="padding:10px">
            
<div class="demoTable">
  <div class="layui-inline">
    <input class="layui-input" id="demoReload" autocomplete="off" placeholder="商品名称">
  </div>
  <button class="layui-btn" data-type="reload">查询</button>
</div>
<table class="layui-hide" id="good" lay-filter="demo"></table>
<script type="text/html" id="barDemo">
  <a class="layui-btn layui-btn-xs layui-btn-normal" lay-event="link">链接</a>
  <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
  <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
  <a class="layui-btn layui-btn-warm layui-btn-xs" lay-event="delkm">清空卡密</a>
</script>
<script>
  layui.use('table', function () {
    var table = layui.table
    table.render({
      elem: '#good'
      , url: '/adminxyxyxxy/index/gooddata'
      , cellMinWidth: 80
      , skin: 'row'
      , even: true
      , cols: [[
        { field: 'id', title: 'ID', sort: true, align: 'center' }
        , { field: 'name', title: '名称',width: 250, align: 'center',}
        , { field: 'abridge', title: '分类', align: 'center' }
        , { field: 'price', title: '价格/元', sort: true, align: 'center' }
        , { field: 'actnum', title: '活动数量/元', sort: true, align: 'center' }
        , { field: 'actprice', title: '活动价格/元', sort: true, align: 'center' }
        , { field: 'status', title: '状态',  sort: true,align: 'center' }
        , { field: 'kucun', title: '库存/张', sort: true,align: 'center' }
        , { field: 'sales', title: '已售/张', sort: true,align: 'center' }
        , {   width: 230, align: 'center', toolbar: '#barDemo' }
        
      ]]
      , page: true
      , limit: 20
    });

    table.on('tool(demo)', function (obj) {
      var tbdata = obj.data;
      if (obj.event === 'del') {
        layer.confirm('真的删除此商品么', function (index) {
          //del star
          $.ajax({
            type: "POST",
            url: "/adminxyxyxxy/index/delgood.html",
            data: 'id=' + tbdata.id,
            success: function (data) {
              // layer.alert(data);
              if (data == "0") {
                layer.msg('删除失败,该分类下存在卡密');
              } else if (data == "1") {
                layer.msg('删除成功');
                obj.del();
              } else if (data == "2") {
                layer.msg('删除失败');
              }
            }
          });
          //del end
          layer.close(index);
        });
      } else if (obj.event === 'edit') {
        window.location.href = '/adminxyxyxxy/index/editgood.html?id=' + tbdata.id;
      } else if (obj.event === 'link') {
        layer.alert('<?php echo $siteinfo['siteurl']; ?>/trade/'+ tbdata.id+'.html');
      } else if (obj.event === 'delkm') {
        layer.confirm('此操作会清空未售和已售卡密,确定吗？', function (index) {
          window.location.href = '/adminxyxyxxy/index/delkm.html?id=' + tbdata.id;

        layer.close(index);
        });
      }
    });
    var $ = layui.$, active = {
      reload: function () {
        var demoReload = $('#demoReload');

        //执行重载
        table.reload('good', {
          page: {
            curr: 1 //重新从第 1 页开始
          }
          , where: {
            keyword: demoReload.val()
          }
        });
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