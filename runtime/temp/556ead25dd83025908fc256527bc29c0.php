<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:68:"C:\phpStudy\PHPTutorial\WWW/APP/adminxyxyxxy\view\index\addkami.html";i:1532440669;}*/ ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="__STATIC__/layui/css/layui.css">
  <script src="__STATIC__/layui/layui.js"></script>
</head>
<body>
    <form class="layui-form" action="/adminxyxyxxy/index/addkami" style="padding:20px" method="post">
      <blockquote class="layui-elem-quote">一行一个,卡号和密码请用一个空格分开,若无卡号直接填密码即可</blockquote>
      <div class="layui-form-item">
              <label class="layui-form-label">所属商品</label>
              <div class="layui-input-block">
                <select name="goodid" lay-filter="aihao">
                     <?php foreach($good as $vo): ?>
                  <option value="<?php echo $vo['id']; ?>"><?php echo $vo['name']; ?></option>
                     <?php endforeach; ?>
                </select>
              </div>
            </div>
      <!-- <div class="layui-form-item">
              <label class="layui-form-label">卡号</label>
              <div class="layui-input-block">
                <input type="text" name="kahao" placeholder="卡号" class="layui-input">
              </div>
            </div>
            <div class="layui-form-item">
                  <label class="layui-form-label">密码</label>
                  <div class="layui-input-block">
                    <input type="text" name="kami" placeholder="卡密" class="layui-input">
                  </div>
                </div> -->
                
                <div class="layui-form-item layui-form-text">
                    
                    <label class="layui-form-label">卡号密码</label>
                    <div class="layui-input-block">
                      <textarea placeholder="请输入内容" class="layui-textarea" name="km"></textarea>
                    </div>
                  </div>
            <div class="layui-form-item">
                  <div class="layui-input-block">
                    <button class="layui-btn" lay-submit="" lay-filter="demo1">立即提交</button>
                  </div>
                </div>
      </form>
</body>
<script>
    layui.use('form', function(){
    var form = layui.form; //只有执行了这一步，部分表单元素才会自动修饰成功
    form.render();
  }); 
</script>
</html>