<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:70:"/data/home/xyu3109030001/htdocs/APP/adminxyxyxxy/view/index/clear.html";i:1532440668;s:64:"/data/home/xyu3109030001/htdocs/APP/adminxyxyxxy/view/index.html";i:1532440666;}*/ ?>
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
            
<button class="layui-btn layui-btn-danger" onclick="clearwfk()">删除所有未付款订单</button><span style="color:#999"> 今日的未付款订单不会被清理</span>
<br /><br />
<hr />
<br /><br />
<div style="width: 500px;">
	<div style="width: 200px;float: left;"><input type="text" placeholder="开始时间" class="layui-input" id="date1"></div>
	<div style="width: 200px;float: left;"><input type="text" placeholder="结束时间" class="layui-input" id="date2"></div>
</div>
<button class="layui-btn layui-btn-danger" onclick="deleteOrder()">删除已卖出订单</button>
<br /><br />
<hr />
<br /><br />
<div style="width: 500px;">
	<div style="width: 200px;float: left;"><input type="text" placeholder="开始时间" class="layui-input" id="date3"></div>
	<div style="width: 200px;float: left;"><input type="text" placeholder="结束时间" class="layui-input" id="date4"></div>
</div>
<button class="layui-btn layui-btn-danger" onclick="deleteKami()">删除已卖出卡密</button>
<br /><br />
<hr />
<br /><br />

<form class="layui-form" action="/adminxyxyxxy/index/dckami" target="_blank"  method="post">
	<div class="layui-form-item">
		<label class="layui-form-label">商品名称</label>
		<div class="layui-input-block" >
			<select  name="goods" lay-filter="aihao">
			 <?php foreach($res as $vo): ?>
				<option value="<?php echo $vo['id']; ?>"><?php echo $vo['name']; ?></option>
			<?php endforeach; ?>
			</select>
		</div>	
		
		<br />
		<label class="layui-form-label">导出数量</label>
		<div class="layui-input-block" style="width: 100px;">	
			<input  type="text" class="layui-input" value="1" name="num"/><br />
			<button class="layui-btn layui-btn-danger" >导出未售出卡密</button>
		</div>
		
	</div>
</form>
<script>
	function clearwfk() {
		layer.confirm('确定清空所有未付款订单吗?', function(index) {
			$.ajax({
				type: "GET",
				url: "/adminxyxyxxy/index/cleardata.html",
				data: 'oper=wfk',
				success: function(data) {
					layer.alert(data);
				}
			});

			layer.close(index);
		});
	}
	layui.use('laydate', function() {
		var laydate = layui.laydate;
		//执行一个laydate实例
		laydate.render({
			elem: '#date1' //指定元素
		});
	});
	layui.use('laydate', function() {
		var laydate = layui.laydate;
		//执行一个laydate实例
		laydate.render({
			elem: '#date2' //指定元素
		});
	});	
	layui.use('laydate', function() {
		var laydate = layui.laydate;
		//执行一个laydate实例
		laydate.render({
			elem: '#date3' //指定元素
		});
	});
	layui.use('laydate', function() {
		var laydate = layui.laydate;
		//执行一个laydate实例
		laydate.render({
			elem: '#date4' //指定元素
		});
	});		
	function deleteOrder() {
		if($('#date1').val().length<10 ||  $('#date2').val().length<10){
			layer.alert('请先选择删除时间');
			return;
		}
		layer.confirm('你确定删除订单吗?', function(index) {
			$.ajax({
				type: "GET",
				url: "/adminxyxyxxy/index/deleteorder.html",
				data: "oper=wfk&date1="+$('#date1').val()+"&date2="+$('#date2').val(),
				success: function(data) {
					layer.alert(data);
				}
			});

			layer.close(index);
		});
	}	
	function deleteKami() {
		if($('#date3').val().length<10 ||  $('#date4').val().length<10){
			layer.alert('请先选择删除时间');
			return;
		}
		layer.confirm('你确定删除已卖出卡密吗?', function(index) {
			$.ajax({
				type: "GET",
				url: "/adminxyxyxxy/index/deleteKami.html",
				data: "oper=wfk&date1="+$('#date3').val()+"&date2="+$('#date4').val(),
				success: function(data) {
					layer.alert(data);
				}
			});

			layer.close(index);
		});
	}	
</script>

    </div>
</body>

</html>