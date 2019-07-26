<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:72:"/data/home/xyu3109030001/htdocs/APP/adminxyxyxxy/view/index/welcome.html";i:1532440668;s:64:"/data/home/xyu3109030001/htdocs/APP/adminxyxyxxy/view/index.html";i:1532440666;}*/ ?>
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
            
    <div class="layui-row">

        <div class="layui-col-xs6 layui-col-md6">
                <div style="padding:5px">
                    <div style="background-color:#23b7e5;text-align:center;border-radius:0;padding:5px;height:75px">
                        <div style="font-size:36px;color:#fff;font-weight: 300;"><?php echo $category; ?></div><span style="color:#b0e1f1">总分类</span>
                      </div>       
              </div>
              </div>
    <div class="layui-col-xs6 layui-col-md6">
        <div style="padding:5px">
            <div style="background-color:#23b7e5;text-align:center;border-radius:0;padding:5px;height:75px">
                <div style="font-size:36px;color:#fff;font-weight: 300;"><?php echo $good; ?></div><span style="color:#b0e1f1">在售商品</span>
                </div>       
        </div>
        </div>
    </div>
    <div class="layui-row">
            <div class="layui-col-xs6 layui-col-md6">
                    <div style="padding:5px">
                        <div style="background-color:#23b7e5;text-align:center;border-radius:0;padding:5px;height:75px">
                            <div style="font-size:36px;color:#fff;font-weight: 300;"><?php echo $todybuyok; ?></div><span style="color:#b0e1f1">今日订单</span>
                            </div>       
                    </div>
                    </div>
            <div class="layui-col-xs6 layui-col-md6">
                    <div style="padding:5px">
                        <div style="background-color:#23b7e5;text-align:center;border-radius:0;padding:5px;height:75px">
                            <div style="font-size:36px;color:#fff;font-weight: 300;"><?php echo $todymoney; ?>元</div><span style="color:#b0e1f1">今日收入</span>
                            </div>       
                    </div>
                    </div>

        
    
      </div>

      <blockquote class="layui-elem-quote layui-quote-nm">
        
    </div>
      </blockquote>


    </div>
</body>

</html>