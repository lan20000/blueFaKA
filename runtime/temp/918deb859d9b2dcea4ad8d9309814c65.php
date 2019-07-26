<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:69:"C:\phpStudy\PHPTutorial\WWW/APP/adminxyxyxxy\view\index\editgood.html";i:1563785772;}*/ ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>表单组合</title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <link rel="stylesheet" href="__STATIC__/dist/layuiadmin/layui/css/layui.css" media="all">
  <link rel="stylesheet" href="__STATIC__/dist/layuiadmin/style/admin.css" media="all">
  <!-- __STATIC__/layui/ -->
  <script src="__STATIC__/layui/layui.js" charset="utf-8"></script>
</head>

<body>

  <div class="layui-fluid">
    <div class="layui-card">
      <div class="layui-card-header">添加商品</div>
      <div class="layui-card-body" style="padding: 15px;">
        <form class="layui-form" class="layui-form" action="/adminxyxyxxy/index/posteditgood" method="post"
          onsubmit="return addgood()" lay-filter="component-form-group">
          <div class="layui-form-item">
            <label class="layui-form-label">商品名称</label>
            <div class="layui-input-block">
              <input type="text" name="name" placeholder="请输入商品名称" class="layui-input" value="<?php echo $res['name']; ?>">
            </div>
          </div>
          <div class="layui-form-item">
            <div class="layui-inline">
              <label class="layui-form-label">商品编号</label>
              <div class="layui-input-inline">
                <input type="text" class="layui-input" value="<?php echo $res['id']; ?>" disabled><input type="hidden" name="id"
                  value="<?php echo $res['id']; ?>">
              </div>
            </div>
          </div>
          <div class="layui-form-item">
            <div class="layui-form-item">
                <label class="layui-form-label">商品状态</label>
                <div class="layui-input-block">
                  <input type="radio" name="status" value="0" title="出售中" <?php if(($status == 0)): ?>checked="" <?php endif; ?>>
                  <input type="radio" name="status" value="1" title="已下架" <?php if(($status == 1)): ?>checked="" <?php endif; ?>>
                </div>
              </div>
          </div>

          <div class="layui-form-item">
            <div class="layui-inline">
                <label class="layui-form-label">所属分类</label>
                <div class="layui-input-block">
                  <select name="abridge" lay-filter="aihao">
                        <?php foreach($fenlei as $vo): ?> 
                    <option value="<?php echo $vo['abridge']; ?>" <?php if(($res['abridge'] == $vo['abridge'])): ?>selected=""<?php endif; ?>><?php echo $vo['name']; ?></option>
                        <?php endforeach; ?>
                  </select>
                </div>
            </div>
            <div class="layui-inline">
              <label class="layui-form-label">商品价格</label>
              <div class="layui-input-inline">
                  <input type="text" name="price" placeholder="请输入商品价格" class="layui-input" value="<?php echo $res['price']; ?>">
              </div>
            </div>
            <div class="layui-inline">
              <label class="layui-form-label">代理价格</label>
              <div class="layui-input-inline">
                  <input type="text" name="dailiprice" placeholder="请输入商品价格" class="layui-input" value="<?php echo $res['dailiprice']; ?>">
              </div>
            </div>
          </div>
          <div class="layui-form-item">
            <div class="layui-inline">
              <label class="layui-form-label">活动数量1</label>
              <div class="layui-input-inline">
                  <input type="text" name="actnum" placeholder="请输入活动数量，不设置活动设置0" class="layui-input" value="<?php echo $res['actnum']; ?>">
              </div>
            </div>
            <div class="layui-inline">
              <label class="layui-form-label">活动价格1</label>
              <div class="layui-input-inline">
                  <input type="text" name="actprice" placeholder="请输入活动价格，不设置活动价格设置0" class="layui-input" value="<?php echo $res['actprice']; ?>">
              </div>
            </div>
          </div>
          <div class="layui-form-item">
            <div class="layui-inline">
              <label class="layui-form-label">活动数量2</label>
              <div class="layui-input-inline">
                  <input type="text" name="actnum2" placeholder="请输入活动数量，不设置活动设置0" class="layui-input" value="<?php echo $res['actnum2']; ?>">
              </div>
            </div>
            <div class="layui-inline">
              <label class="layui-form-label">活动价格2</label>
              <div class="layui-input-inline">
                  <input type="text" name="actprice2" placeholder="请输入活动价格，不设置活动价格设置0" class="layui-input" value="<?php echo $res['actprice2']; ?>">
              </div>
            </div>
          </div>
          <div class="layui-form-item">
            <div class="layui-inline">
              <label class="layui-form-label">活动数量3</label>
              <div class="layui-input-inline">
                  <input type="text" name="actnum3" placeholder="请输入活动数量，不设置活动设置0" class="layui-input" value="<?php echo $res['actnum3']; ?>">
              </div>
            </div>
            <div class="layui-inline">
              <label class="layui-form-label">活动价格3</label>
              <div class="layui-input-inline">
                  <input type="text" name="actprice3" placeholder="请输入活动价格，不设置活动价格设置0" class="layui-input" value="<?php echo $res['actprice3']; ?>">
              </div>
            </div>
          </div>
          <div class="layui-form-item">
            <div class="layui-inline">
              <label class="layui-form-label">活动数量4</label>
              <div class="layui-input-inline">
                  <input type="text" name="actnum4" placeholder="请输入活动数量，不设置活动设置0" class="layui-input" value="<?php echo $res['actnum4']; ?>">
              </div>
            </div>
            <div class="layui-inline">
              <label class="layui-form-label">活动价格4</label>
              <div class="layui-input-inline">
                  <input type="text" name="actprice4" placeholder="请输入活动价格，不设置活动价格设置0" class="layui-input" value="<?php echo $res['actprice4']; ?>">
              </div>
            </div>
          </div>

          <div class="layui-form-item">
            <div class="layui-inline">
              <label class="layui-form-label">最小限购</label>
              <div class="layui-input-inline">
                  <input type="text" name="xiangoumin" placeholder="单次购买最小限购数量，不限制限购设置0" class="layui-input" value="<?php echo $res['xiangoumin']; ?>">
              </div>
            </div>
            <div class="layui-inline">
              <label class="layui-form-label">最大限购</label>
              <div class="layui-input-inline">
                  <input type="text" name="xiangou" placeholder="单次购买最大限购数量，不限制限购设置0" class="layui-input" value="<?php echo $res['xiangou']; ?>">
              </div>
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
            <div class="layui-input-inline">
                <input type="number" name="sort" placeholder="数字越小越靠前" class="layui-input" value="<?php echo $res['sort']; ?>">
            </div>

          </div>
          <div class="layui-form-item">
            <label class="layui-form-label">商品介绍</label>
            <div class="layui-input-block">
              <textarea id="Introduction" name="Introduction" style="width: 800px;height: 100px;">
                  <?php echo $res['Introduction']; ?>
                      </textarea>
            </div>



            <div class="layui-form-item layui-layout-admin">
              <div class="layui-input-block">
                <div class="layui-footer" style="left: 0;">
                  <button class="layui-btn" lay-submit="" lay-filter="component-form-demo1">立即提交</button>
                  <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                  <a href="/adminxyxyxxy/index/goods.html" class="layui-btn layui-btn-primary">返回</a>
                </div>
              </div>
            </div>
        </form>
      </div>
    </div>
  </div>


  <script>
    layui.config({
      base: window.location.protocol + "//" + window.location.host + '/public/static/dist/layuiadmin/' //静态资源所在路径
    }).extend({
      index: 'lib/index' //主入口模块
    }).use(['index', 'form', 'laydate'], function () {
      
    });
  </script>
</body>

</html>