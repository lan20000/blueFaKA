<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:83:"D:\PHPstroe\phpStudySetup\PHPTutorial\WWW/APP/adminxyxyxxy\view\index\editgood.html";i:1532440668;s:74:"D:\PHPstroe\phpStudySetup\PHPTutorial\WWW/APP/adminxyxyxxy\view\index.html";i:1563081704;}*/ ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>-<?php echo $siteinfo['sitename']; ?></title>
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
            
<form class="layui-form" action="/adminxyxyxxy/index/posteditgood" style="margin-top:20px" method="post" onsubmit="return editgood()">
    <div class="layui-form-item">
            <label class="layui-form-label">商品编号</label>
            <div class="layui-input-block">
              <input type="text"  class="layui-input" value="<?php echo $res['id']; ?>" disabled><input type="hidden" name="id" value="<?php echo $res['id']; ?>">
            </div>
          </div>
        <div class="layui-form-item">
          <label class="layui-form-label">商品名称</label>
          <div class="layui-input-block">
            <input type="text" name="name" placeholder="请输入商品名称" class="layui-input" value="<?php echo $res['name']; ?>">
          </div>
        </div>

        <div class="layui-form-item">
          <label class="layui-form-label">商品状态</label>
          <div class="layui-input-block">
            <input type="radio" name="status" value="0" title="出售中" <?php if(($status == 0)): ?>checked="" <?php endif; ?>>
            <input type="radio" name="status" value="1" title="已下架" <?php if(($status == 1)): ?>checked="" <?php endif; ?>>
          </div>
        </div>
        <div class="layui-form-item">
                <label class="layui-form-label">所属分类</label>
                <div class="layui-input-block">
                  <select name="abridge" lay-filter="aihao">
                        <?php foreach($fenlei as $vo): ?> 
                    <option value="<?php echo $vo['abridge']; ?>" <?php if(($res['abridge'] == $vo['abridge'])): ?>selected=""<?php endif; ?>><?php echo $vo['name']; ?></option>
                        <?php endforeach; ?>
                  </select>
                </div>
              </div>
        <div class="layui-form-item">
                <label class="layui-form-label">商品价格</label>
                <div class="layui-input-block">
                  <input type="text" name="price" placeholder="请输入商品价格" class="layui-input" value="<?php echo $res['price']; ?>">
                </div>
              </div>
              <div class="layui-form-item" style="display: none;">
                <label class="layui-form-label">代理价格</label>
                <div class="layui-input-block">
                  <input type="text" name="dailiprice" placeholder="请输入商品价格" class="layui-input" value="<?php echo $res['dailiprice']; ?>">
                </div>
              </div>
               <div class="layui-form-item">
                <label class="layui-form-label">活动数量1</label>
                <div class="layui-input-block">
                  <input type="text" name="actnum" placeholder="请输入活动数量，不设置活动设置0" class="layui-input" value="<?php echo $res['actnum']; ?>">
                </div>
              </div>             
                <div class="layui-form-item">
                <label class="layui-form-label">活动价格1</label>
                <div class="layui-input-block">
                  <input type="text" name="actprice" placeholder="请输入活动价格，不设置活动价格设置0" class="layui-input" value="<?php echo $res['actprice']; ?>">
                </div>
              </div>               
               <div class="layui-form-item">
                <label class="layui-form-label">活动数量2</label>
                <div class="layui-input-block">
                  <input type="text" name="actnum2" placeholder="请输入活动数量，不设置活动设置0" class="layui-input" value="<?php echo $res['actnum2']; ?>">
                </div>
              </div>             
                <div class="layui-form-item">
                <label class="layui-form-label">活动价格2</label>
                <div class="layui-input-block">
                  <input type="text" name="actprice2" placeholder="请输入活动价格，不设置活动价格设置0" class="layui-input" value="<?php echo $res['actprice2']; ?>">
                </div>
              </div>                
               <div class="layui-form-item">
                <label class="layui-form-label">活动数量3</label>
                <div class="layui-input-block">
                  <input type="text" name="actnum3" placeholder="请输入活动数量，不设置活动设置0" class="layui-input" value="<?php echo $res['actnum3']; ?>">
                </div>
              </div>             
                <div class="layui-form-item">
                <label class="layui-form-label">活动价格3</label>
                <div class="layui-input-block">
                  <input type="text" name="actprice3" placeholder="请输入活动价格，不设置活动价格设置0" class="layui-input" value="<?php echo $res['actprice3']; ?>">
                </div>
              </div>      
                <div class="layui-form-item">
                <label class="layui-form-label">活动数量4</label>
                <div class="layui-input-block">
                  <input type="text" name="actnum4" placeholder="请输入活动数量，不设置活动设置0" class="layui-input" value="<?php echo $res['actnum4']; ?>">
                </div>
              </div>             
                <div class="layui-form-item">
                <label class="layui-form-label">活动价格4</label>
                <div class="layui-input-block">
                  <input type="text" name="actprice4" placeholder="请输入活动价格，不设置活动价格设置0" class="layui-input" value="<?php echo $res['actprice4']; ?>">
                </div>
              </div>              
              <div class="layui-form-item">
                <label class="layui-form-label">最小限购</label>
                <div class="layui-input-block">
                  <input type="text" name="xiangoumin" placeholder="单次购买最小限购数量，不限制限购设置0" class="layui-input" value="<?php echo $res['xiangoumin']; ?>">
                </div>
              </div>               
              <div class="layui-form-item">
                <label class="layui-form-label">最大限购</label>
                <div class="layui-input-block">
                  <input type="text" name="xiangou" placeholder="单次购买最大限购数量，不限制限购设置0" class="layui-input" value="<?php echo $res['xiangou']; ?>">
                </div>
              </div>              
              <div class="layui-form-item">
                    <label class="layui-form-label">商品图片</label>
                    <div class="layui-input-block">
                      <input type="text" name="image" placeholder="请输入带http://的图片链接" class="layui-input" value="<?php echo $res['images']; ?>">
                    </div>
                  </div>
                  <div class="layui-form-item">
                      <label class="layui-form-label">商品排序</label>
                      <div class="layui-input-block">
                        <input type="number" name="sort" placeholder="数字越小越靠前" class="layui-input" value="<?php echo $res['sort']; ?>">
                      </div>
                    </div>
                    <div class="layui-form-item">
                      <label class="layui-form-label">商品介绍</label>
                      <div class="layui-input-block">
                        <textarea id="Introduction" name="Introduction"  style="width: 800px;height: 100px;">
                           <?php echo $res['Introduction']; ?>
                            </textarea>
                      </div>

                    </div>
              <div class="layui-form-item">
                    <div class="layui-input-block">
                      <button class="layui-btn" lay-submit="" lay-filter="demo1">立即提交</button>
                      <a class="layui-btn" href="/adminxyxyxxy/index/goods.html">返回</a>
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