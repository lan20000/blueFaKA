<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:63:"C:\phpStudy\PHPTutorial\WWW/APP/adminxyxyxxy\view\index\ms.html";i:1532440669;s:33:"public/static/umeditor/index.html";i:1515725567;}*/ ?>
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
		<link href="__STATIC__/umeditor/themes/default/css/umeditor.css" type="text/css" rel="stylesheet">
		<script type="text/javascript" src="__STATIC__/umeditor/third-party/jquery.min.js"></script>
		<script type="text/javascript" charset="utf-8" src="__STATIC__/umeditor/umeditor.config.js"></script>
		<script type="text/javascript" charset="utf-8" src="__STATIC__/umeditor/umeditor.min.js"></script>
		<script type="text/javascript" src="__STATIC__/umeditor/lang/zh-cn/zh-cn.js"></script>
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
			<form action="" method="post" class="layui-form">
				
				<fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
					<legend>菜单页面</legend>
				</fieldset>
                   <div style="font-size: 20px;">
                       菜单名称：<input type="text" name="msname"  value="<?php echo $value; ?>"/><br /><br /><br />      	
                  </div>
				
<!--style给定宽度可以影响编辑器的最终宽度-->
<script type="text/plain" id="myEditor" style="width:800px;height:300px;">
    <p></p>
</script>


<script type="text/javascript">
    //实例化编辑器
    var um = UM.getEditor('myEditor');
    um.addListener('blur',function(){
        $('#focush2').html('编辑器失去焦点了')
    });
    um.addListener('focus',function(){
        $('#focush2').html('')
    });
    //按钮的操作
    function insertHtml() {
        var value = prompt('插入html代码', '');
        um.execCommand('insertHtml', value)
    }
    function isFocus(){
        alert(um.isFocus())
    }
    function doBlur(){
        um.blur()
    }
    function createEditor() {
        enableBtn();
        um = UM.getEditor('myEditor');
    }
    function getAllHtml() {
        alert(UM.getEditor('myEditor').getAllHtml())
    }
    function getContent() {
    	return UM.getEditor('myEditor').getContent();
        //var arr = [];
        //arr.push("使用editor.getContent()方法可以获得编辑器的内容");
       // arr.push("内容为：");
        //arr.push(UM.getEditor('myEditor').getContent());
        //alert(arr.join("\n"));
    }
    function getPlainTxt() {
        return UM.getEditor('myEditor').getPlainTxt();
  
    }
    function setContent(isAppendTo) {
        //var arr = [];
        //arr.push("使用editor.setContent('欢迎使用umeditor')方法可以设置编辑器的内容");
        UM.getEditor('myEditor').setContent( isAppendTo);
        //alert(arr.join("\n"));
    }
    function setDisabled() {
        UM.getEditor('myEditor').setDisabled('fullscreen');
        disableBtn("enable");
    }

    function setEnabled() {
        UM.getEditor('myEditor').setEnabled();
        enableBtn();
    }

    function getText() {
        //当你点击按钮时编辑区域已经失去了焦点，如果直接用getText将不会得到内容，所以要在选回来，然后取得内容
        var range = UM.getEditor('myEditor').selection.getRange();
        range.select();
        var txt = UM.getEditor('myEditor').selection.getText();
        alert(txt)
    }

    function getContentTxt() {
        var arr = [];
        arr.push("使用editor.getContentTxt()方法可以获得编辑器的纯文本内容");
        arr.push("编辑器的纯文本内容为：");
        arr.push(UM.getEditor('myEditor').getContentTxt());
        alert(arr.join("\n"));
    }
    function hasContent() {
        var arr = [];
        arr.push("使用editor.hasContents()方法判断编辑器里是否有内容");
        arr.push("判断结果为：");
        arr.push(UM.getEditor('myEditor').hasContents());
        alert(arr.join("\n"));
    }
    function setFocus() {
        UM.getEditor('myEditor').focus();
    }
    function deleteEditor() {
        disableBtn();
        UM.getEditor('myEditor').destroy();
    }
    function disableBtn(str) {
        var div = document.getElementById('btns');
        var btns = domUtils.getElementsByTagName(div, "button");
        for (var i = 0, btn; btn = btns[i++];) {
            if (btn.id == str) {
                domUtils.removeAttributes(btn, ["disabled"]);
            } else {
                btn.setAttribute("disabled", "true");
            }
        }
    }
    function enableBtn() {
        var div = document.getElementById('btns');
        var btns = domUtils.getElementsByTagName(div, "button");
        for (var i = 0, btn; btn = btns[i++];) {
            domUtils.removeAttributes(btn, ["disabled"]);
        }
    }
</script>
                <p style="width: 800px;text-align: center;"><br />
                	<input type="submit" onsubmit="check(this)" class="layui-btn layui-btn-danger" value="提交"/>
                </p>
			</form>
		</div>
		<script>
			function check(obj){
				Content=getContent();
				obj.editorValue.value=Content.replace(/&/g,'<nbsp>');				
			}
			window.onload=function()
			{
            	$.get('getms.html',function(a,b){
            		setContent(a);
            	});				
			}
		</script>
	</body>

</html>