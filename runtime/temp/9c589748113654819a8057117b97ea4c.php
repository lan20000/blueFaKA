<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:72:"/data/home/xyu3109030001/htdocs/APP/adminxyxyxxy/view/index/addgood.html";i:1532440666;s:64:"/data/home/xyu3109030001/htdocs/APP/adminxyxyxxy/view/index.html";i:1532440666;}*/ ?>
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
            
<form class="layui-form" action="/adminxyxyxxy/index/addgood" style="margin-top:20px" method="post" onsubmit="return addgood()">
        <div class="layui-form-item">
          <label class="layui-form-label">商品名称</label>
          <div class="layui-input-block">
            <input type="text" name="name" placeholder="请输入商品名称" class="layui-input">
          </div>
        </div>
        <div class="layui-form-item">
          <label class="layui-form-label">商品状态</label>
          <div class="layui-input-block">
            <input type="radio" name="status" value="0" title="出售中" checked="">
            <input type="radio" name="status" value="1" title="已下架">
          </div>
        </div>
        <div class="layui-form-item">
                <label class="layui-form-label">所属分类</label>
                <div class="layui-input-block">
                  <select name="abridge" lay-filter="aihao">
                        <?php foreach($fenlei as $vo): ?> 
                    <option value="<?php echo $vo['abridge']; ?>"><?php echo $vo['name']; ?></option>
                        <?php endforeach; ?>
                  </select>
                </div>
              </div>
        <div class="layui-form-item">
                <label class="layui-form-label">商品价格</label>
                <div class="layui-input-block">
                  <input type="text" name="price" placeholder="请输入商品价格" class="layui-input">
                </div>
              </div>
              <div class="layui-form-item" style="display: none;">
                <label class="layui-form-label">代理价格</label>
                <div class="layui-input-block">
                  <input type="text" name="dailiprice" placeholder="请输入代理提卡价格" class="layui-input">
                </div>
              </div>
              
               <div class="layui-form-item">
                <label class="layui-form-label">活动数量1</label>
                <div class="layui-input-block">
                  <input type="text" name="actnum" placeholder="请输入活动数量，不设置活动设置0" class="layui-input" value="0">
                </div>
              </div>             
                <div class="layui-form-item">
                <label class="layui-form-label">活动价格1</label>
                <div class="layui-input-block">
                  <input type="text" name="actprice" placeholder="请输入活动价格，不设置活动价格设置0" class="layui-input" value="0">
                </div>
              </div>                
               <div class="layui-form-item">
                <label class="layui-form-label">活动数量2</label>
                <div class="layui-input-block">
                  <input type="text" name="actnum2" placeholder="请输入活动数量，不设置活动设置0" class="layui-input" value="0">
                </div>
              </div>             
                <div class="layui-form-item">
                <label class="layui-form-label">活动价格2</label>
                <div class="layui-input-block">
                  <input type="text" name="actprice2" placeholder="请输入活动价格，不设置活动价格设置0" class="layui-input" value="0">
                </div>
              </div>                
               <div class="layui-form-item">
                <label class="layui-form-label">活动数量3</label>
                <div class="layui-input-block">
                  <input type="text" name="actnum3" placeholder="请输入活动数量，不设置活动设置0" class="layui-input" value="0">
                </div>
              </div>             
                <div class="layui-form-item">
                <label class="layui-form-label">活动价格3</label>
                <div class="layui-input-block">
                  <input type="text" name="actprice3" placeholder="请输入活动价格，不设置活动价格设置0" class="layui-input" value="0">
                </div>
              </div>                
               <div class="layui-form-item">
                <label class="layui-form-label">活动数量4</label>
                <div class="layui-input-block">
                  <input type="text" name="actnum4" placeholder="请输入活动数量，不设置活动设置0" class="layui-input" value="0">
                </div>
              </div>             
                <div class="layui-form-item">
                <label class="layui-form-label">活动价格4</label>
                <div class="layui-input-block">
                  <input type="text" name="actprice4" placeholder="请输入活动价格，不设置活动价格设置0" class="layui-input" value="0">
                </div>
              </div>               
               <div class="layui-form-item">
                <label class="layui-form-label">最小限购</label>
                <div class="layui-input-block">
                  <input type="text" name="xiangoumin" placeholder="单次购买最小限购数量，不限制限购设置0" class="layui-input">
                </div>
              </div>               
               <div class="layui-form-item">
                <label class="layui-form-label">最大限购</label>
                <div class="layui-input-block">
                  <input type="text" name="xiangou" placeholder="单次购买最大限购数量，不限制限购设置0" class="layui-input">
                </div>
              </div>              
              <div class="layui-form-item">
                    <label class="layui-form-label">商品图片</label>
                    <div class="layui-input-block">
                      <input type="text" name="image" placeholder="请输入带http://的图片链接" class="layui-input">
                    </div>
                  </div>
                  <div class="layui-form-item">
                      <label class="layui-form-label">商品排序</label>
                      <div class="layui-input-block">
                        <input type="number" name="sort" placeholder="数字越小越靠前" class="layui-input">
                      </div>
                    </div>
                  <div class="layui-form-item">
                    <label class="layui-form-label">商品介绍</label>
                    <div class="layui-input-block">
                      <textarea id="Introduction" name="Introduction" style="width: 800px;height: 100px;">
                          
                            </textarea>
                    </div>

                  </div>
              <div class="layui-form-item">
                    <div class="layui-input-block">
                      <button class="layui-btn" lay-submit="" lay-filter="demo1">立即提交</button>
                      
                    </div>
                  </div>
        </form>
        <script charset="utf-8" src="__STATIC__/editor/kindeditor-all.js"></script>
        <script charset="utf-8" src="__STATIC__/editor/lang/zh-CN.js"></script>
        <script type="text/javascript">
          KindEditor.ready(function (K) {
            window.editor = K.create('#Introduction', {
              width: '100%',
              height: '300px',
              items: [
                'source', 'justifycenter', 'justifyright', 'insertorderedlist', 'insertunorderedlist', 'fontname', 'fontsize', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline', 'strikethrough', 'image', 'hr', 'emoticons', 'link', 'unlink'
              ]
            });
          });
        </script>

    </div>
</body>

</html>