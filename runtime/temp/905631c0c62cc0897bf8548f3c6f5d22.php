<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:66:"C:\phpStudy\PHPTutorial\WWW/APP/adminxyxyxxy\view\index\daili.html";i:1532440669;s:60:"C:\phpStudy\PHPTutorial\WWW/APP/adminxyxyxxy\view\index.html";i:1563778070;}*/ ?>
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
        <input class="layui-input" id="demoReload" autocomplete="off" placeholder="代理编号/用户名">
    </div>
    <button class="layui-btn" data-type="reload">查询</button>
</div>
<table class="layui-hide" id="daili" lay-filter="demo"></table>
<script type="text/html" id="barDemo">
    <a class="layui-btn layui-btn-xs layui-btn-normal" lay-event="jiakuan">加款</a>
    <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
    <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
</script>
<script>
    layui.use('table', function () {
        var table = layui.table;

        table.render({
            elem: '#daili'
            , url: '/adminxyxyxxy/index/dailidata'
            , cellMinWidth: 80
            , skin: 'row'
            , even: true
            , cols: [[
                  { field: 'id', title: '代理编号', sort: true, align: 'center' }
                , { field: 'username', title: '用户名', align: 'center' }
                , { field: 'email', title: '邮箱', align: 'center' }
                , { field: 'money', title: '余额/元', sort: true, align: 'center' }
                , { field: 'level', title: '等级', align: 'center' }
                , { field: 'time', title: '注册时间', align: 'center' }
                , { title: '操作',  align: 'center', toolbar: '#barDemo' }

            ]]
            , page: true
            , limit: 20
        });
        table.on('tool(demo)', function (obj) {
                var data = obj.data;
                if (obj.event === 'jiakuan') {
                    //jiakuan 
                    //prompt层
                    layer.prompt({ title: '请输入金额[负数为扣款]', formType: 3 }, function (money, index) {
                        layer.close(index);
                        layer.confirm('确定给编号为' + data.id + '的代理加款' + money + '元吗?', function (index) {
                            $.ajax({
                                type: "GET",
                                url: "/adminxyxyxxy/index/dljiakuan.html",
                                data: 'dlid=' + data.id + '&money=' + money,
                                success: function (data) {
                                    layer.msg(data);
                                     table.reload('daili', {
                                        });
                                }
                            });

                            layer.close(index);
                        });

                    });
                    //jiakuan end
                } else if (obj.event === 'del') {
                    layer.confirm('真的删除编号为'+data.id+'的代理么?', function (index) {
                        //del
                        $.ajax({
                            type: "GET",
                            url: "/adminxyxyxxy/index/deldaili.html",
                            data: 'dlid=' + data.id,
                            success: function (data) {
                                
                                if(data=='1'){
                                    layer.msg('删除成功');
                                    obj.del();
                                }else{
                                    layer.msg('删除成功');
                                }
                               
                            }
                        });
                        //del end
                        
                        layer.close(index);
                    });
                } else if (obj.event === 'edit') {
                    window.location.href='/adminxyxyxxy/index/editdaili.html?id='+data.id;
                }
            });

        var $ = layui.$, active = {
            reload: function () {
                var demoReload = $('#demoReload');

                //执行重载
                table.reload('daili', {
                    // page: {
                    //     curr: 1 //重新从第 1 页开始
                    // }
                    // , 
                    where: {
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