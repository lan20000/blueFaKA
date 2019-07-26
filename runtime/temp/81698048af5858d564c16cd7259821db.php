<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:68:"C:\phpStudy\PHPTutorial\WWW/APP/adminxyxyxxy\view\index\addgood.html";i:1563780869;}*/ ?>
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
        <form class="layui-form" class="layui-form" action="/adminxyxyxxy/index/addgood" method="post" onsubmit="return addgood()" lay-filter="component-form-group">
          <div class="layui-form-item">
            <label class="layui-form-label">商品名称</label>
            <div class="layui-input-block">
              <input type="text" name="name" lay-verify="title" autocomplete="off" placeholder="请输入商品名称"
                class="layui-input">
            </div>
          </div>
          <div class="layui-form-item">
            <div class="layui-inline">
              <label class="layui-form-label">商品状态</label>
              <div class="layui-input-block">
                <input type="radio" name="status" value="0" title="出售中" checked="">
                <input type="radio" name="status" value="1" title="已下架">
              </div>
            </div>
          </div>

          <div class="layui-form-item">
            <div class="layui-inline">
              <label class="layui-form-label">所属分类</label>
              <div class="layui-input-inline">
                <select name="abridge" lay-filter="aihao">
                  <?php foreach($fenlei as $vo): ?>
                  <option value="<?php echo $vo['abridge']; ?>"><?php echo $vo['name']; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="layui-inline">
              <label class="layui-form-label">商品价格</label>
              <div class="layui-input-inline">
                <input type="text" name="price" placeholder="请输入商品价格" class="layui-input">
              </div>
            </div>
            <div class="layui-inline">
              <label class="layui-form-label">代理价格</label>
              <div class="layui-input-inline">
                <input type="text" name="dailiprice" placeholder="请输入代理提卡价格" class="layui-input">
              </div>
            </div>
          </div>
          <div class="layui-form-item">
            <div class="layui-inline">
              <label class="layui-form-label">活动数量1</label>
              <div class="layui-input-inline">
                <input type="text" name="actnum" placeholder="请输入活动数量，不设置活动设置0" class="layui-input" value="0">
              </div>
            </div>
            <div class="layui-inline">
              <label class="layui-form-label">活动价格1</label>
              <div class="layui-input-inline">
                <input type="text" name="actprice" placeholder="请输入活动价格，不设置活动价格设置0" class="layui-input" value="0">
              </div>
            </div>
          </div>
          <div class="layui-form-item">
            <div class="layui-inline">
              <label class="layui-form-label">活动数量2</label>
              <div class="layui-input-inline">
                <input type="text" name="actnum2" placeholder="请输入活动数量，不设置活动设置0" class="layui-input" value="0">
              </div>
            </div>
            <div class="layui-inline">
              <label class="layui-form-label">活动价格2</label>
              <div class="layui-input-inline">
                <input type="text" name="actprice2" placeholder="请输入活动价格，不设置活动价格设置0" class="layui-input" value="0">
              </div>
            </div>
          </div>
          <div class="layui-form-item">
            <div class="layui-inline">
              <label class="layui-form-label">活动数量3</label>
              <div class="layui-input-inline">
                <input type="text" name="actnum3" placeholder="请输入活动数量，不设置活动设置0" class="layui-input" value="0">
              </div>
            </div>
            <div class="layui-inline">
              <label class="layui-form-label">活动价格3</label>
              <div class="layui-input-inline">
                <input type="text" name="actprice3" placeholder="请输入活动价格，不设置活动价格设置0" class="layui-input" value="0">
              </div>
            </div>
          </div>
          <div class="layui-form-item">
            <div class="layui-inline">
              <label class="layui-form-label">活动数量4</label>
              <div class="layui-input-inline">
                <input type="text" name="actnum4" placeholder="请输入活动数量，不设置活动设置0" class="layui-input" value="0">
              </div>
            </div>
            <div class="layui-inline">
              <label class="layui-form-label">活动价格4</label>
              <div class="layui-input-inline">
                <input type="text" name="actprice4" placeholder="请输入活动价格，不设置活动价格设置0" class="layui-input" value="0">
              </div>
            </div>
          </div>

          <div class="layui-form-item">
            <div class="layui-inline">
              <label class="layui-form-label">最小限购</label>
              <div class="layui-input-inline">
                <input type="number" name="xiangoumin" placeholder="单次购买最大限购数量，不限制限购设置0" class="layui-input" value="0">
              </div>
            </div>
            <div class="layui-inline">
              <label class="layui-form-label">最大限购</label>
              <div class="layui-input-inline">
                <input type="number" name="xiangou" placeholder="单次购买最大限购数量，不限制限购设置0" class="layui-input" value="0">
              </div>
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
            <div class="layui-input-inline">
              <input type="number" name="sort" placeholder="数字越小越靠前" class="layui-input">
            </div>

          </div>
          <div class="layui-form-item">
            <label class="layui-form-label">商品介绍</label>
            <div class="layui-input-block">
              <textarea id="Introduction" name="Introduction" style="width: 800px;height: 100px;">

                      </textarea>
            </div>



            <div class="layui-form-item layui-layout-admin">
              <div class="layui-input-block">
                <div class="layui-footer" style="left: 0;">
                  <button class="layui-btn" lay-submit="" lay-filter="component-form-demo1">立即提交</button>
                  <button type="reset" class="layui-btn layui-btn-primary">重置</button>
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
      var $ = layui.$
        , admin = layui.admin
        , element = layui.element
        , layer = layui.layer
        , laydate = layui.laydate
        , form = layui.form;

      form.render(null, 'component-form-group');

      laydate.render({
        elem: '#LAY-component-form-group-date'
      });



    });
  </script>
</body>

</html>