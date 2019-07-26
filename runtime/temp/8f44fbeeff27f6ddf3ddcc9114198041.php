<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:73:"D:\PHPstroe\phpStudySetup\PHPTutorial\WWW/APP/index\view\index\index.html";i:1563090747;s:66:"D:\PHPstroe\phpStudySetup\PHPTutorial\WWW/APP/index\view\base.html";i:1563724722;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>首页-<?php echo $siteinfo['sitename']; ?></title>
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
       <?php echo $siteinfo['gonggao']; ?>
       </div>
        <div style="background-color: #fff;">
            <h2 style="padding: 28px 0px 0px 12px;">宝呗筛选</h2>
            <ul class="goods_screen">
                <li class="goods_screen_this" onclick="goodsScreen(0,this)">
                    全部
                </li>
                <?php if($siteinfo['indexmode'] == '1'): foreach($res2 as  $key =>$cat): ?>
                    <li data-type="<?php echo $key; ?>" onclick="goodsScreen(<?php echo $key; ?>+1,this)">
                        <?php echo $cat['name']; ?>
                    </li>
                    <?php endforeach; endif; ?>
            </ul>
        </div>
       <div class="goods">   
                           <?php if($siteinfo['indexmode'] == '1'): ?>
                                <table class="layui-table">
                                  <thead>
                                    <tr >
                                      <th><font color="#5FB878">商品标题</font></th>
                                      <th><font color="#5FB878">价格</font></th>
                                      <th><font color="#5FB878">库存</font></th>
                                      <th style="text-align:center"><font color="#5FB878">操作</font></th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                         <?php foreach($res2 as $key =>$cat): ?>
                                             <tr>
                                               <td colspan="4" style="background-color:#5FB878;color:#fff;text-align:center"><?php echo $cat['name']; ?></td>
                                             </tr>
                                            <?php foreach($res as $good): if($good['abridge'] == $cat['abridge']): ?>
                                                <tr  class="subclass<?php echo $key; ?>">
                                                  <td><font color="black"><?php echo $good['name']; ?></font></td>
                                                  <td><?php echo $good['price']; ?>元</td>
                                                  <td><?php echo $good['kucun']; ?></td>
                                                  <td style="text-align:center">
                                                    <a href="/trade/<?php echo $good['id']; ?>.html" class="layui-btn layui-btn-normal layui-btn-danger">购买
                                                        <i class="layui-icon">&#xe654;</i>  </a>
                                                  </td>
                                                </tr>
                                                <?php endif; endforeach; endforeach; ?>
                                  </tbody>
                                </table>
                                <?php else: ?>
                                <div class="layui-row layui-col-space10">
                                  <?php foreach($res2 as $cat): ?>
                                  <div class="layui-col-xs6 layui-col-md3">
                                    <div class="index-good">
                                      <a href="/item/<?php echo $cat['abridge']; ?>.html">
                                        <div class="index-goodimg">
                                          <img src="<?php echo $cat['image']; ?>" alt="" height="100%" width="100%">
                                        </div>
                                        <hr>
                                        <div class="index-goodname"><?php echo $cat['name']; ?></div>
                                      </a>
                                    </div>
                                  </div>
                                  <?php endforeach; ?>
                                </div>
                                
                          <?php endif; ?>
                                
      </div>

        <hr>
        <div style="text-align:center;color:#808080;">Copyright © <?php echo $siteinfo['sitename']; ?> All Rights Reserved</div>
        <div style="text-align:center"><?php echo $siteinfo['tongji']; ?></div>
     <script>
         function goodsScreen(val,_this){
             for (let i=0;i<_this.parentNode.children.length;i++){
                 if (val==i){
                     _this.parentNode.children[i].className = 'goods_screen_this';
                 }else{
                     _this.parentNode.children[i].className = '';
                 }
             }
         }

        layui.use('carousel', function(){
          var carousel = layui.carousel;
          //建造实例
          carousel.render({
            elem: '#test10'
            ,width: '100%' //设置容器宽度
            ,arrow: 'always' //始终显示箭头
            //,anim: 'updown' //切换动画方式
          });
        });
        layui.use('carousel', function(){
        var carousel = layui.carousel;
        //建造实例
        carousel.render({
          elem: '#test1'
          ,width: '100%' //设置容器宽度
          ,arrow: 'always' //始终显示箭头
          //,anim: 'updown' //切换动画方式
        });
      });
</script>
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