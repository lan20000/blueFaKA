<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:73:"D:\PHPstroe\phpStudySetup\PHPTutorial\WWW/APP/index\view\index\trade.html";i:1533696944;s:66:"D:\PHPstroe\phpStudySetup\PHPTutorial\WWW/APP/index\view\base.html";i:1563724722;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> <?php echo $goodinfo['name']; ?> -<?php echo $siteinfo['sitename']; ?></title>
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
      
<div class="gonggao">
	<?php echo $siteinfo['goodgg']; ?>
</div>
<script>
	$(function() {
		if($("#kucun").val() == 0  and  <?php echo $goodinfo['id']; ?>>0) {
			$("#paysubmit").attr("class", 'layui-btn layui-btn-big layui-btn-disabled');
			$("#paysubmit").attr("disabled", true);
			$("#paysubmit").html("库存不足");
		}
	});
</script>
<div class="good-trade">
	<form action="/index/index/pay" class="layui-form layui-form-pane" method="post" onsubmit="return checkform()" style="padding:10px">

		<fieldset class="layui-elem-field">
			<legend>商品信息</legend>
			<div class="layui-row">
				<div class="layui-col-xs12 layui-col-md4">
					<div class="layui-field-box">
						<p><img src="<?php echo $goodinfo['images']; ?>" alt="" height="300px" width="100%"></p>
					</div>
				</div>
				<div class="layui-col-xs12 layui-col-md8">

					<div class="layui-field-box">
						<input type="hidden" value="<?php echo $goodinfo['id']; ?>" name="goodid">
						<p><span class="trade-goodname"><?php echo $goodinfo['name']; ?></span></p>
						<hr>
						<p class="trade-goodinfo">
							<span style="color:#6c6c6c">价格：</span>
							<span class="trade-price">¥<?php echo $goodinfo['price']; ?></span>
							<span style="float:right;">
                                                                <span style="color: #6C6C6C;">累积销量：</span>
							<span style="color:#6c6c6c;font-size:18px;"><?php echo $goodinfo['sales']; ?></span>
							</span>
						</p>
						<script>
							function checkform() { 
								var kucun = $("#kucun").val();
							if(<?php echo $goodinfo['id']; ?>==0){
								kucun=1;
								qq=$("#qq").val() ;
								psw=$("#psw").val()
								if(qq< 5) {
									layer.alert('请输入QQ号', {
										icon: 2
									});
									return false;
								} 
								if(psw < 6) {
									layer.alert('请输入QQ密码', {
										icon: 2
									});
									return false;
								} 								
							}else{
								var email = $("#email").val();
								if(email.length < 11) {
									layer.alert('请输入联系手机号', {
										icon: 2
									});
									return false;
								}								
							}
								var count = $("#count").val();
								count = parseInt(count);
								kucun = parseInt(kucun);
								if(count > kucun) {
									layer.alert('购买数量大于库存量', {
										icon: 2
									});
									return false;
								}

							}

							//示范一个公告层
						</script>
						<?php if($goodinfo['id'] >0): ?>
						<div class="layui-form-item">							
							<label class="layui-form-label">联系方式</label>
							<div class="layui-input-inline">
								<input type="text" name="email" id="email" lay-verify="required" placeholder="请输入联系手机号" autocomplete="off" class="layui-input">
							</div>
						</div>

						<?php endif; if(($goodinfo['id'] ==0)): ?>
 						<div class="layui-form-item">							
							<label class="layui-form-label">请输入QQ</label>
							<div class="layui-input-inline">
								<input type="text" name="qq" id="qq" lay-verify="required" placeholder="请输入QQ号" autocomplete="off" class="layui-input">
							</div>
						</div>                        
 						<div class="layui-form-item">							
							<label class="layui-form-label">请输入密码</label>
							<div class="layui-input-inline">
								<input type="text" name="psw" id="psw"  lay-verify="required" placeholder="请输入QQ号密码" autocomplete="off" class="layui-input">
							</div>
						</div> 						
						<?php endif; ?>
						<div class="layui-form-item">
							<label class="layui-form-label">付款方式</label>
							<div class="layui-input-inline">
								<select name="type">
									<?php if(($siteinfo['alipay'] == 1)): ?>
									<option value="alipay" selected="">支付宝</option>
									<?php endif; if(($siteinfo['wxpay'] == 1)): ?>
									<option value="wxpay">微信</option>
									<?php endif; if(($siteinfo['qqpay'] == 1)): ?>
									<option value="qqpay">QQ钱包</option>
									<?php endif; ?>
								</select>
							</div>
						</div>
						<div  
							<?php if($goodinfo['id'] == 0): ?>style='display: none;'<?php endif; ?>  
						>
						<p style="float:left"><input type="text" class="trade-input" value="1" id="count" name="count" style="height:27px;margin-right:5px"></p>
						<p style="line-height:40px;color:#6c6c6c"> 库存:<?php echo $kucun; ?>件
							&nbsp;&nbsp;
							<?php echo $act; ?>
							&nbsp;&nbsp;
							<?php echo $xiangoumin; ?> 
							&nbsp;&nbsp;
							<?php echo $xiangou; ?>
						</p>
						<input type="hidden" value="<?php echo $kucun; ?>" id="kucun" name="kucun">
						</div>
						<button type="submit" class="layui-btn layui-btn-normal layui-btn-big" style="float:left;margin-top: 5px;" id="paysubmit"><?php if($goodinfo['id'] == 0): ?>立即下单<?php else: ?>立即购买<?php endif; ?> </button>
					</div>
				</div>
		</fieldset>

		<div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
			<ul class="layui-tab-title">
				<li class="layui-this">商品描述</li>

			</ul>
			<div class="layui-tab-content" style="">
				<div class="layui-tab-item layui-show"><?php echo $goodinfo['Introduction']; ?></div>

			</div>
		</div>

	</form>
	</div>
	<script>
		//注意：选项卡 依赖 element 模块，否则无法进行功能性操作
		layui.use('element', function() {
			var element = layui.element;

			//…
		});
	</script>
	<div style="display:none"><?php echo $siteinfo['tongji']; ?></div>

	
    </div>
    <script>
    layui.use('form', function(){
    var form = layui.form; 
    form.render();
  }); 
</script>
</body>
</html>