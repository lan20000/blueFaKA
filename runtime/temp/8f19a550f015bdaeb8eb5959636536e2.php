<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:71:"/data/home/xyu3109030001/htdocs/APP/adminxyxyxxy/view/index/option.html";i:1532440668;s:64:"/data/home/xyu3109030001/htdocs/APP/adminxyxyxxy/view/index.html";i:1532440666;}*/ ?>
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
            

            <form action="" method="post" onsubmit="return editgonggao()" class="layui-form">
              <fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
                <legend>基本配置</legend>
              </fieldset>
            <div class="layui-form-item">
                <label class="layui-form-label">网站名称</label>
                <div class="layui-input-inline">
                  <input type="text" name="sitename" value="<?php echo $res['sitename']; ?>" class="layui-input">
                </div>
                <div class="layui-form-mid layui-word-aux">不要超过八个汉字</div>
              </div>
              <div class="layui-form-item">
                  <label class="layui-form-label">网站域名</label>
                  <div class="layui-input-inline">
                    <input type="text" name="siteurl" value="<?php echo $res['siteurl']; ?>" class="layui-input">
                  </div>
                  <div class="layui-form-mid layui-word-aux">必须以斜杠"/"结尾</div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">联系QQ</label>
                    <div class="layui-input-inline">
                      <input type="text" name="qq" value="<?php echo $res['qq']; ?>" class="layui-input">
                    </div>
                    <div class="layui-form-mid layui-word-aux">不能超过11位</div>
                  </div>
                  <div class="layui-form-item">
                    <label class="layui-form-label">LOGO图片</label>
                    <div class="layui-input-inline">
                      <input type="text" name="logoimg" value="<?php echo $res['logoimg']; ?>" class="layui-input">
                    </div>
                    <div class="layui-form-mid layui-word-aux">带http或者https的图片链接</div>
                  </div>
                  <div class="layui-form-item">
                    <label class="layui-form-label">首页模式</label>
                    <div class="layui-input-block">
                      <input type="radio" name="indexmode" value="0" title="分类模式" <?php if(($res['indexmode'] == 0)): ?>checked="" <?php endif; ?>>
                      <input type="radio" name="indexmode" value="1" title="列表模式" <?php if(($res['indexmode'] == 1)): ?>checked="" <?php endif; ?>>
                    </div>
                  </div>
                  <fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
                    <legend>代理设置</legend>
                  </fieldset>
                  <div class="layui-form-item">
                    <label class="layui-form-label">开通价格</label>
                    <div class="layui-input-inline">
                      <input type="text" name="opdl" value="<?php echo $res['opdl']; ?>" class="layui-input">
                    </div>
                    <div class="layui-form-mid layui-word-aux">自助开通代理账户的价格</div>
                  </div>
                  <fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
                    <legend>支付方式</legend>
                  </fieldset>

                  <div class="layui-form-item">
                    <label class="layui-form-label">支付宝支付</label>
                    <div class="layui-input-block">
                      <input type="radio" name="alipay" value="1" title="开启" <?php if(($res['alipay'] == 1)): ?>checked="" <?php endif; ?>>
                      <input type="radio" name="alipay" value="0" title="不开启" <?php if(($res['alipay'] == 0)): ?>checked="" <?php endif; ?>>
                    </div>
                  </div>
                 
                  <div class="layui-form-item">
                    <label class="layui-form-label">微信支付</label>
                    <div class="layui-input-block">
                      <input type="radio" name="wxpay" value="1" title="开启" <?php if(($res['wxpay'] == 1)): ?>checked="" <?php endif; ?>>
                      <input type="radio" name="wxpay" value="0" title="不开启" <?php if(($res['wxpay'] == 0)): ?>checked="" <?php endif; ?>>
                    </div>
                  </div>

                  <div class="layui-form-item">
                    <label class="layui-form-label">QQ钱包支付</label>
                    <div class="layui-input-block">
                      <input type="radio" name="qqpay" value="1" title="开启" <?php if(($res['qqpay'] == 1)): ?>checked="" <?php endif; ?>>
                      <input type="radio" name="qqpay" value="0" title="不开启" <?php if(($res['qqpay'] == 0)): ?>checked="" <?php endif; ?>>
                    </div>
                  </div>
                  <fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
                    <legend>邮箱配置</legend>
                  </fieldset>
                
                    <div class="layui-form-item">
                      <label class="layui-form-label">邮箱发卡</label>
                      <div class="layui-input-block">
                        <input type="radio" name="mailon" value="1" title="开启" <?php if(($res['mailon'] == 1)): ?>checked="" <?php endif; ?>>
                        <input type="radio" name="mailon" value="0" title="不开启" <?php if(($res['mailon'] == 0)): ?>checked="" <?php endif; ?>>
                      </div>
                    </div>
                    <div class="layui-form-item">
                      <label class="layui-form-label">邮箱服务器</label>
                      <div class="layui-input-inline">
                        <input type="text" name="emailhost" value="<?php echo $res['emailhost']; ?>" class="layui-input">
                      </div>
                      <div class="layui-form-mid layui-word-aux">如：smtp.exmail.qq.com</div>
                    </div>
                    <div class="layui-form-item">
                      <label class="layui-form-label">邮箱端口</label>
                      <div class="layui-input-inline">
                        <input type="text" name="emailport" value="<?php echo $res['emailport']; ?>" class="layui-input">
                      </div>
                      <div class="layui-form-mid layui-word-aux">如：25</div>
                    </div>
                    <div class="layui-form-item">
                      <label class="layui-form-label">邮箱账号</label>
                      <div class="layui-input-inline">
                        <input type="text" name="emailuser" value="<?php echo $res['emailuser']; ?>" class="layui-input">
                      </div>
                
                    </div>
                    <div class="layui-form-item">
                      <label class="layui-form-label">邮箱密码</label>
                      <div class="layui-input-inline">
                        <input type="password" name="emailpass" value="<?php echo $res['emailpass']; ?>" class="layui-input">
                      </div>
                    
                    </div>
                    <fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
                      <legend>其他配置</legend>
                    </fieldset>
                      <div class="layui-form-item">
                          <label class="layui-form-label">统计代码</label>
                          <div class="layui-input-block">
                              <textarea name="tongji" placeholder="请输入" class="layui-textarea"><?php echo $res['tongji']; ?></textarea>
                          </div>
                          
                        </div>
                        <div class="layui-form-item">
                          <label class="layui-form-label">首页公告</label>
                          <div class="layui-input-block">
                            <textarea id="gonggao" name="gonggao"  class="layui-textarea">
                           <?php echo $res['gonggao']; ?>
                            </textarea>
                          </div>

                        </div>
                    <div class="layui-form-item">
                      <label class="layui-form-label">商品页公告</label>
                      <div class="layui-input-block">
                        <textarea id="goodgg" name="goodgg"   class="layui-textarea">
                           <?php echo $res['goodgg']; ?>
                            </textarea>
                      </div>

                    </div>           
                    </div>
                    <div class="layui-form-item">
                      <div class="layui-input-block">
                        <button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
                      </div>
                    </div>
                  </form>
  <script charset="utf-8" src="__STATIC__/editor/kindeditor-all.js"></script>
  <script charset="utf-8" src="__STATIC__/editor/lang/zh-CN.js"></script>
<script>
  layui.use('form', function () {
      var form = layui.form;
    form.render();
      //各种基于事件的操作，下面会有进一步介绍
    });
             KindEditor.ready(function (K) {
                window.editor = K.create('#gonggao',{
                  width: '100%',
                  height:'300px',
                  items:[
                    'source', 'justifycenter','justifyright','insertorderedlist','insertunorderedlist','fontname','fontsize','forecolor','hilitecolor','bold','italic','underline','strikethrough','image','hr','emoticons','link','unlink'
                    ]
                });
                window.editor = K.create('#goodgg', {
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