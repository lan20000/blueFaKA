<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:66:"C:\phpStudy\PHPTutorial\WWW/APP/adminxyxyxxy\view\index\links.html";i:1532440669;s:60:"C:\phpStudy\PHPTutorial\WWW/APP/adminxyxyxxy\view\index.html";i:1563778070;}*/ ?>
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
    <input class="layui-input"  id="demoReload" autocomplete="off" placeholder="分类名称/分类简称">  
  </div>
  <button class="layui-btn" data-type="reload">查询</button>
  <button class="layui-btn" onclick="addlink()">添加</button>
</div>

<table class="layui-hide" id="link" lay-filter="link"></table>
<script type="text/html" id="barDemo">
  <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
  <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
</script>
      
      <script>
          layui.use('table', function () {
              var table = layui.table;
              table.render({
                elem: '#link'
                , url: '/adminxyxyxxy/index/linkdata'
                , cellMinWidth: 80
                , skin: 'row'
                , even: true
                , cols: [[
                  { field: 'id', title: 'ID', sort: true, align: 'center' }
                  , { field: 'sitename', title: '网站名称', align: 'center' }
                  , { field: 'siteurl', title: '网站链接', align: 'center' }
                  , { field: 'sort', title: '排序', sort: true, align: 'center' }
                  , { width: 178, align: 'center', toolbar: '#barDemo' }
                ]]
                , page: true
                , limit: 20
              });
              table.on('tool(link)', function (obj) {
                var tbdata = obj.data;
                if (obj.event === 'del') {
                  layer.confirm('真的删除链接么', function (index) {
                    //del star
                    $.ajax({
                      type: "POST",
                      url: "/adminxyxyxxy/index/dellink.html",
                      data: 'id=' + tbdata.id,
                      success: function (data) {
                      if(data=='1'){
                        layer.msg('删除成功');
                        obj.del();
                      }else{
                         layer.msg('删除失败');
                      }
                      }
                    });
                    //del end
                    layer.close(index);
                  });
                } else if (obj.event === 'edit') {
                  window.location.href = '/adminxyxyxxy/index/editlink.html?id=' + tbdata.id;
                }
              });
             var $ = layui.$, active = {
                reload: function () {
                  var demoReload = $('#demoReload');

                  //执行重载
                  table.reload('link', {
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
     function addlink(){
        layer.open({
        type: 2,
        title: '添加站点',
        shadeClose: true,
        shade: 0.8,
        area: ['400px', '50%'],
        content: '/adminxyxyxxy/index/addlink' //iframe的url
        }); 
     }
     function dellink(id){
      layer.confirm('删除?', function(index){
        window.location.href="/adminxyxyxxy/index/dellink.html?id="+id; 
  
     layer.close(index);
    });       
     }
      </script>

    </div>
</body>

</html>