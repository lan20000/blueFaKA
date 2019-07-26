<?php
//000000000000
 exit();?>
s:12259:"<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>首页-常德QQ</title>
    <link rel="stylesheet" href="/public/static/layui/css/layui.css">
    <link rel="stylesheet" href="/public/static/css/style.css">
    <!--<link rel="stylesheet" href="./public/static/layui/css/layui.css">-->
    <!--<link rel="stylesheet" href="./public/static/css/style.css">-->
    <script src="/public/static/layui/layui.js"></script>
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
        <div class="mainwidth">严禁利用本平台做一些非法事情，一旦本站发现此类情况，本站将全力配合有关部门予以打击！ 客服 QQ：123 </div>
    </div>
    <ul class="layui-nav "
        style="border-radius:0; margin-bottom:5px;border-bottom: solid 3px #093;background-color: #fff;">
        <div class="layui-container">
            <!--<li class="layui-nav-item"><a href="/"><span ><img style="font-size:25px;color:#FFFFFF;line-height: 50px;" src="/logo.jpg" alt="常德QQ" height="60px"></span></a></li>-->
            <li class="layui-nav-item"><a href="/"
                    style="font-size:25px;color:#000;line-height: 50px;">常德QQ</a></li>
            <li class="layui-nav-item"><a href="/index/index/ms" style="font-size: 20px;color:#000"><i
                        class="layui-icon" target="_blank" style="font-size: 20px;">&#xe64c;</i>&nbsp;软件下载</a></li>
            <li class="layui-nav-item"><a href="http://wpa.qq.com/msgrd?v=3&uin=123&site=qq&menu=yes"
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
        

       <div class="gonggao">     
                                                                                                                                                                                                                                                           <div style="padding:20px;font-size:20px;color:yellow" class="layui-bg-gray">公告：下单步骤为：选择商品-选择付款方式-付款(本站24小时自动发货)</div>                                                                                                                                                                                                                                                                                               </div>
        <div style="background-color: #fff;">
            <h2 style="padding: 28px 0px 0px 12px;">宝贝筛选</h2>
            <ul class="goods_screen">
                <li class="goods_screen_this" onclick="goodsScreen(0,this)">
                    全部
                </li>
                                    <li data-type="0" onclick="goodsScreen(0+1,this,1)">
                        爱奇艺会员                    </li>
                                        <li data-type="1" onclick="goodsScreen(1+1,this,2)">
                        优酷会员                    </li>
                                        <li data-type="2" onclick="goodsScreen(2+1,this,3)">
                        芒果TV会员                    </li>
                                        <li data-type="3" onclick="goodsScreen(3+1,this,15)">
                        111                    </li>
                                </ul>
        </div>
       <div class="goods">   
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
                                                                                      <tr>
                                               <td colspan="4" style="background-color:#5FB878;color:#fff;text-align:center">爱奇艺会员</td>
                                             </tr>
                                                                                            <tr  class="subclass0">
                                                  <td><font color="black">爱奇艺会员2个月【测试】</font></td>
                                                  <td>0.80元</td>
                                                  <td>0</td>
                                                  <td style="text-align:center">
                                                    <a href="/trade/29.html" class="layui-btn layui-btn-normal layui-btn-danger">购买
                                                        <i class="layui-icon">&#xe654;</i>  </a>
                                                  </td>
                                                </tr>
                                                                                                <tr  class="subclass0">
                                                  <td><font color="black">爱奇艺会员一个月【测试】</font></td>
                                                  <td>0.01元</td>
                                                  <td>6</td>
                                                  <td style="text-align:center">
                                                    <a href="/trade/1.html" class="layui-btn layui-btn-normal layui-btn-danger">购买
                                                        <i class="layui-icon">&#xe654;</i>  </a>
                                                  </td>
                                                </tr>
                                                                                                <tr  class="subclass0">
                                                  <td><font color="black">商品吧</font></td>
                                                  <td>2.00元</td>
                                                  <td>0</td>
                                                  <td style="text-align:center">
                                                    <a href="/trade/34.html" class="layui-btn layui-btn-normal layui-btn-danger">购买
                                                        <i class="layui-icon">&#xe654;</i>  </a>
                                                  </td>
                                                </tr>
                                                                                             <tr>
                                               <td colspan="4" style="background-color:#5FB878;color:#fff;text-align:center">优酷会员</td>
                                             </tr>
                                                                                            <tr  class="subclass1">
                                                  <td><font color="black">优酷会员一个月【测试】</font></td>
                                                  <td>0.02元</td>
                                                  <td>5</td>
                                                  <td style="text-align:center">
                                                    <a href="/trade/2.html" class="layui-btn layui-btn-normal layui-btn-danger">购买
                                                        <i class="layui-icon">&#xe654;</i>  </a>
                                                  </td>
                                                </tr>
                                                                                             <tr>
                                               <td colspan="4" style="background-color:#5FB878;color:#fff;text-align:center">芒果TV会员</td>
                                             </tr>
                                                                                            <tr  class="subclass2">
                                                  <td><font color="black">芒果tv会员永久【测试】</font></td>
                                                  <td>0.03元</td>
                                                  <td>0</td>
                                                  <td style="text-align:center">
                                                    <a href="/trade/3.html" class="layui-btn layui-btn-normal layui-btn-danger">购买
                                                        <i class="layui-icon">&#xe654;</i>  </a>
                                                  </td>
                                                </tr>
                                                                                             <tr>
                                               <td colspan="4" style="background-color:#5FB878;color:#fff;text-align:center">111</td>
                                             </tr>
                                                                              </tbody>
                                </table>
                                                                
      </div>

        <hr>
        <div style="text-align:center;color:#808080;">Copyright © 常德QQ All Rights Reserved</div>
        <div style="text-align:center">111</div>
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

</html>";