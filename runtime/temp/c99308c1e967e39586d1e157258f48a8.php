<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:59:"C:\phpStudy\PHPTutorial\WWW/APP/daili\view\index\index.html";i:1564047948;}*/ ?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title><?php echo $siteinfo['sitename']; ?> - 会员中心</title>
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" href="__STATIC__/layui/css/layui.css">
	<link rel="stylesheet" href="__STATIC__/css/dailiCenter.css">
	<link rel="stylesheet" href="__STATIC__/css/font.css">
	<script src="__STATIC__/layui/layui.js" charset="utf-8"></script>
	<script type="text/javascript" src="http://at.alicdn.com/t/font_486278_vzxioem775t81tt9.js"></script>
	<!-- 注意：如果你直接复制所有代码到本地，上述css路径需要改成你本地的 -->
	<style>
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
	<!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
	<!--[if lt IE 9]>
  <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
  <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
	<ul class="layui-nav" style="width: 100%;z-index: 99;position: fixed;">
		<li class="layui-nav-item" style="float: right;" lay-unselect="">
			<a href="javascript:;"><img src="//t.cn/RCzsdCq" class="layui-nav-img">欢迎你回来，<?php echo $userInfo['id']; ?></a>
			<dl class="layui-nav-child">
				<dd><a href="javascript:;">修改信息</a></dd>
				<dd><a href="/daili/index/dailiout">退出登录</a></dd>
			</dl>
		</li>
		<!-- <li class="layui-nav-item">
			<a href="">个人中心<span class="layui-badge-dot"></span></a>
		</li> -->
		<li class="layui-nav-item">
			<a href="/index/index">前往商城<span class="layui-badge">0</span></a>
		</li>
	</ul>
	<div class="layui-container">
		<div style="padding: 20px; background-color: #F2F2F2;margin-bottom: 24px;">
			<div class="layui-row layui-col-space15">
				<div class="layui-col-md6">
					<div class="layui-card">
						<div class="layui-card-body" id="info">
							<div class="layui-row" style="margin-bottom: 10px;">
								<div class="layui-col-xs6">
									<button type="button" class="layui-btn layui-btn-primary"><i
											class="layui-icon">&#xe60c;</i><?php echo $userInfo['id']; ?></button>
								</div>
								<div class="layui-col-xs6">
									<button type="button" class="layui-btn layui-btn-primary"
										style="color: red;font-size: 20px;font-weight: bold;">
										<?php echo $userInfo['balance']; ?>
									</button>
									<a href="/daili/index/chongzhi.html" style="margin-left: 10px;">充值</a>
								</div>
							</div>
							<div class="layui-row" style="margin-bottom: 10px;">
								<div class="layui-col-xs6">

									<button type="button" class="layui-btn layui-btn-primary"><i
											class="layui-icon">&#xe60e;</i>登陆时间：<?php echo $IP['createtime']; ?></button>
								</div>
								<div class="layui-col-xs6">
									<button type="button" class="layui-btn layui-btn-primary"><i
											class="layui-icon">&#xe64c;</i>登陆IP：<?php echo $IP['ip']; ?></button>
								</div>
							</div>
							<div class="layui-row" style="margin-bottom: 10px;">
								<div class="layui-col-xs6">
									<div class="layui-col-xs6">
										<button type="button"
											class="layui-btn layui-btn-primary"><?php echo $userInfo['status']; ?></button>
									</div>
								</div>
								<div class="layui-col-xs6">

								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="layui-col-md6">
					<div class="layui-card">
						<div class="layui-card-header" style="color: red;font-weight: bold;">公告</div>
						<div class="layui-card-body">
							<?php echo $dataInfo['affiche']; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- <span class="layui-breadcrumb">
			<a href="/">首页</a>
			<a href="/demo/">演示</a>
			<a><cite>导航元素</cite></a>
		</span>
		<br> -->

		<fieldset class="layui-elem-field">
			<legend>会员须知</legend>
			<div class="layui-field-box">
				1.及时修改账号和密码，防止泄露<br />
				2.千防万防，防自己。本站号码一切安全才上架，请放心购买<br />
				<span style="color:red;">3.如果有任何问题，请在购买候2个小时内联系客服<br /></span>
			</div>
		</fieldset>

		<button data-method="notice" id="noticeAlert" class="layui-btn" style="display: none;">示范一个公告层</button>
		<div>
			<fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
				<legend>快捷中心</legend>
			</fieldset>
			<blockquote class="layui-elem-quote">注意：严禁利用本平台做一些非法事情，一旦本站发现此类情况，本站将全力配合有关部门予以打击！</blockquote>
			<div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
				<ul class="layui-tab-title">
					<li class="layui-this">我的订单</li>
					<li>登录记录</li>
					<li>充值记录</li>
				</ul>
				<div class="layui-tab-content" style="height: 100px;">
					<div class="layui-tab-item layui-show">
						<fieldset class="layui-elem-field">
							<legend style="color: red;font-weight:bold;">注意详情</legend>
							<div class="layui-field-box">
								所有会员的订单为48小时数清除一次。

							</div>
						</fieldset>
						<table class="layui-hide" id="test" lay-filter="test"></table>
					</div>
					<div class="layui-tab-item">
						<fieldset class="layui-elem-field">
							<legend style="color: red;font-weight:bold;">警告</legend>
							<div class="layui-field-box">
								暂未开放
							</div>
						</fieldset>
						<!-- <table class="layui-hide" id="loginrecord" lay-filter="loginrecord"></table> -->
					</div>
					<div class="layui-tab-item">
						<fieldset class="layui-elem-field">
							<legend style="color: red;font-weight:bold;">警告</legend>
							<div class="layui-field-box">
								暂未开放
							</div>
						</fieldset>
						<!-- <table class="layui-hide" id="rechargeRecord" lay-filter="rechargeRecord"></table> -->
					</div>
				</div>
			</div>
		</div>
	</div>

	<script type="text/html" id="barDemo">
		<a href="#" class="layui-btn layui-btn-xs" >详情</a>
		<a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
	  </script>

	<script>
		layui.use(['element', 'table', 'layer'], function () {
			var $ = layui.jquery, layer = layui.layer; //独立版的layer无需执行这一句
			//触发事件
			var active = {
				notice: function () {
					//示范一个公告层
					layer.open({
						type: 1
						, title: false //不显示标题栏
						, closeBtn: false
						, area: '300px;'
						, shade: 0.8
						, id: 'LAY_layuipro' //设定一个id，防止重复弹出
						, btn: ['确定']
						, btnAlign: 'c'
						, moveType: 1 //拖拽模式，0或者1
						, content: '<div style="padding: 50px; line-height: 22px; background-color: #393D49; color: #fff; font-weight: 300;"><?php echo $dataInfo['popup']; ?></div>'
						, success: function (layero) {
							// var btn = layero.find('.layui-layer-btn');
							// btn.find('.layui-layer-btn0').attr({
							// 	href: 'http://www.layui.com/'
							// 	,target: '_blank'
							// });
						}
					});
				}

			};

			$('.layui-btn').on('click', function () {
				var othis = $(this), method = othis.data('method');
				active[method] ? active[method].call(this, othis) : '';
			});
			// if(<?php echo $dataInfo; ?>){
			// 	$('#noticeAlert').trigger('click');
			// }

			var element = layui.element; //导航的hover效果、二级菜单等功能，需要依赖element模块

			//监听导航点击
			element.on('nav(demo)', function (elem) {
				//console.log(elem)
				layer.msg(elem.text());
			});

			var table = layui.table;
			// table.render({
			// 	elem: '#test'
			// 	, url: '/daili/index/orderlist'
			// 	, toolbar: '#loginrecord'
			// 	, title: '用户数据表'
			// 	, cols: [[
			// 		{ type: 'checkbox', fixed: 'left' },
			// 		{ field: 'daili_orderId', title: '订单号', width: 230, },
			// 		{ field: 'daili_goodsNname', title: '商品名称', width: 230, }
			// 		, { field: 'daili_goodsPrice', title: '总金额', width: 130, sort: true }
			// 		, { field: 'daili_pay', title: '支付方式', width: 130, sort: true }
			// 		, { field: 'daili_createTime', title: '下单时间', width: 180, sort: true }
			// 		, { fixed: 'right', title: '操作', toolbar: '#barDemo' }
			// 	]]
			// 	, page: true,
			// 	limit: 20
			// });
			// table.render({
			// 	elem: '#test'
			// 	, url: '/daili/index/orderlist'
			// 	, toolbar: '#rechargeRecord'
			// 	, title: '用户数据表'
			// 	, cols: [[
			// 		{ type: 'checkbox', fixed: 'left' },
			// 		{ field: 'daili_orderId', title: '订单号', width: 230, },
			// 		{ field: 'daili_goodsNname', title: '商品名称', width: 230, }
			// 		, { field: 'daili_goodsPrice', title: '总金额', width: 130, sort: true }
			// 		, { field: 'daili_pay', title: '支付方式', width: 130, sort: true }
			// 		, { field: 'daili_createTime', title: '下单时间', width: 180, sort: true }
			// 		, { fixed: 'right', title: '操作', toolbar: '#barDemo' }
			// 	]]
			// 	, page: true,
			// 	limit: 20
			// });
			// 		elem: '#order'
			//   , url: '/adminxyxyxxy/index/orderdata'
			//   , cols: [[
			//       //  { type: 'checkbox', fixed: 'left'}
			//       { field: 'ddid',  title: '订单号', sort: true, align: 'center' }
			//      , { field: 'name',  title: '商品名称', width: 400, align: 'center' }
			//      , { field: 'time',  title: '交易时间' , align: 'center'}
			//      , { field: 'count',  title: '数量', sort: true , align: 'center'}
			//      , { field: 'email',  title: '购买者信息' , align: 'center'}
			//      , { field: 'type',  title: '支付方式', align: 'center' }
			//      , { field: 'status', title: '状态', align: 'center' }
			//      , { fixed: '', title: '详情', align: 'center', toolbar: '#barDemo' }
			//   ]]
			//   , page: true
			//   , limit:20

			table.render({
				elem: '#test'
				, url: '/daili/index/orderlist'
				, cellMinWidth: 10
				, skin: 'row'
				, even: true
				, title: '用户数据表'
				, cols: [[
					{ type: 'checkbox', fixed: 'left' },
					{ field: 'daili_orderId', title: '订单号', width: 230, },
					{ field: 'daili_goodsNname', title: '商品名称', width: 230, }
					, { field: 'daili_goodsPrice', title: '总金额', width: 130, sort: true }
					, { field: 'daili_count', title: '总数量', width: 130, sort: true }
					, { field: 'daili_pay', title: '支付方式', width: 80, sort: true }
					, { field: 'status', title: '支付状态', width: 130, sort: true }
					, { field: 'daili_createTime', title: '下单时间', width: 180, sort: true }
					, { fixed: 'right', title: '操作', width: 130, toolbar: '#barDemo' }
				]]
				, page: true,
				limit: 10
			});

			//监听行工具事件
			table.on('tool(test)', function (obj) {
				var data = obj.data;
				//console.log(obj)
				if (obj.event === 'del') {
					layer.confirm('确定将此订单永久删除吗？(删除后将不提供恢复)', function (index) {
						layer.close(index);
					});
				}
			});
		});
	</script>

</body>

</html>