<?php
namespace app\index\controller;
use think\Db;
use think\Controller;
use think\Request;
use think\View;
use app\index\model\Item as ItemModel;
use app\index\model\Alipaysubmit as SubmitModel;
use app\index\model\Notify as NotifyModel;
use app\index\model\Search as SearchModel;
use app\index\model\Km as KmModel;
use app\index\model\Order as OrderModel;
use app\index\model\Option as OptionModel;
use app\index\model\Category as CategoryModel;
use app\index\model\Link as LinkModel;
use app\index\model\yuepay as yuepayMD;
use app\index\model\Alipay;
use think\captcha\Captcha;
use think\Session;

/*
 * index对外开放
 */
class check extends  Controller{
    /**
     * @param $abridge
     * 单独查询
     */
    public function screenItem($abridge)
    {
        return  $res=(new OptionModel())->getinfo();
    }
}

class Index extends Controller
{
    public function selectcode()
    {
        $captcha = new Captcha(['length'=>4,'useCurve'=>false,'fontSize'=>35,'codeSet'=>'123456789']);
        return $captcha->entry(); 
    }
    public function queryorder() {
        if(request()->ispost()){
            if(!captcha_check($_POST['code'])){
        		$this->success('验证码输入错误');exit;
            };
            if(!preg_match("/^[0-9A-Za-z]{3,100}$/",$_POST['number'])){
            	$this->error('订单格式错误');exit;
            }
            $str = "1234567890asdfghjklqwertyuiopzxcvbnmASDFGHJKLZXCVBNMPOIUYTREWQ";
            session('secretKey',base64_encode(substr(str_shuffle($str),0,10).rand(0, 48)) );
            // dump(session('secretKey'));
            $this->redirect('/search.html?ddid='.$_POST['number'].'&secretKey='.session('secretKey'));
        }
    }
    
    function _initialize(){
     $res=(new OptionModel())->getinfo();
     $this->assign('siteinfo',$res);
	 error_reporting(0); 
	 $obj=simplexml_load_file('public\static\des.xml');	 
	 $this->assign('mstitle',$obj->name);
    }
    
	public function ms()
	{
	   $data=cache('ms');
	   if(!empty($data)){
	   	 return $data;
	   }
		$this->assign('data',stripcslashes($obj->des));
		$data=$this->fetch();
		cache('ms',$data);
		return $data;
	}
    public function index()
    {       
       $data=cache('goods');
	   if(!empty($data)){
	   	 return $data;
	   }
	   
       $res2=(new CategoryModel())->getcat();
       $res=(new ItemModel())->itemall();
       $link=(new LinkModel())->getlink();
       $this->assign('res',$res);
       $this->assign('res2',$res2);
       $i=0;
       foreach($res as $value){
       	 $kucun=(new KmModel())->kucun_km2($value['id']);	
       	 $res[$i]['kucun']=$kucun;
       	 $i++;
       }
       $this->assign('link',$link);      
       $data=$this->fetch();
	   cache('goods', $data);
	   return $data;
    }

    public function screenItem()
    {
        
    }

    public function item($abridge)
    {
        $abridge=xss_clean($abridge);
        $res=(new ItemModel())->item($abridge);
        $this->assign('res',$res);
        $catname=(new CategoryModel())->getcatname($abridge);
        $this->assign('title',$catname['name']);
        return view();
    }
   public function trade($id)
    {
        $goodinfo=(new ItemModel())->getgoodinfo($id); 
        if($goodinfo['status']==1){
             $this->error('此商品已下架');exit;
        }
        $kucun=(new KmModel())->kucun_km2($id);
        // ifdailiprice
        if(!empty(Session::get('dailiuid'))&&!empty(Session::get('dailiname'))){
            $this->assign('isdaili',true);
        }else{
            $this->assign('isdaili',false);
        }
        $this->assign('goodinfo',$goodinfo);
        $this->assign('kucun', $kucun);
		if(empty($goodinfo['xiangou'])){
			$xiangou=' ';
		}else $xiangou='   限购：'.$goodinfo['xiangou'].'件';
		if(empty($goodinfo['xiangoumin'])){
			$xiangoumin=' ';
		}else $xiangoumin=" <i class=\"layui-icon\" style=\"font-size: 30px; color: red;\">&#xe69c;</i>本商品单次最少需要购买：".$goodinfo['xiangoumin'].'件';		
		if(!empty($goodinfo['actnum']) and  !empty($goodinfo['actprice'])){
			$act="<br/><i class=\"layui-icon\" style=\"font-size: 30px;\">&#xe645;</i>满减活动<hr/>购买满{$goodinfo['actnum']}件单价为{$goodinfo['actprice']}元<br/>";
		}else $act=' ';	
		if(!empty($goodinfo['actnum2']) and  !empty($goodinfo['actprice2'])){
			$act=$act."购买满{$goodinfo['actnum2']}件单价为{$goodinfo['actprice2']}元<br/>";
		}else $act=$act.' ';	
		if(!empty($goodinfo['actnum3']) and  !empty($goodinfo['actprice3'])){
			$act=$act."购买满{$goodinfo['actnum3']}件单价为{$goodinfo['actprice3']}元<br/>";
		}else $act=$act.' ';	
		if(!empty($goodinfo['actnum4']) and  !empty($goodinfo['actprice4'])){
			$act=$act."购买满{$goodinfo['actnum4']}件单价为{$goodinfo['actprice4']}元<br/>";
		}else $act=$act.' ';							
		$this->assign('xiangou',$xiangou);
		$this->assign('xiangoumin',$xiangoumin);
		$this->assign('act',$act);
        return view();
    }
    public function pay()
    {  

        $a=array_keys ($_POST);
        for($i=0;$i<count($_POST);$i++){
            str_xss($_POST[$a[$i]]);
        }     	
        
            $siteinfo=(new OptionModel())->getinfo();
            $ddid=date("YmdHis").mt_rand(10000,99999);
            $tkcount=input('count',1,'int');         
            $type = input('type','alipay','string');//支付方式           
            $goodid= input('goodid',1,'int');

            $money= input('money',1,'int');
            $paytype= input('paytype',0,'int');
            $email = input('email',0,'string');

			if($goodid==0){
				$qq=input('qq','','string');
				$psw=input('psw','','string');
				if(empty($qq) or empty($psw)){
					$this->error("您输入的QQ账号或密码不能为空");exit;
				}
				str_xss($qq);
				str_xss($psw);
				$email=$qq.'----'.$psw;
			}else{
                $email=xss_clean($email);  
                str_xss($email);
            }
            
            //输入密码
            if(!empty(Session::get('dailiuid'))&&!empty(Session::get('dailiname'))&&empty($paytype)){
                $psw=input('psw','','string');
                $psw=xss_clean($psw);  
                str_xss($psw);
            }
            
            str_xss($tkcount);             
            str_xss($type);
            str_xss($goodid);
            str_xss($email);
            str_xss($paytype); 
            str_xss($money);                
            $out_trade_no = $ddid;//订单号    
            //充值模式
            if(empty($paytype)){
                $res=(new ItemModel())->getgoodinfo($goodid); 
                $name = $res['name'];//商品名称
                if(empty(Session::get('dailiuid'))&&empty(Session::get('dailiname'))){
                    /*活动start*/
                    if($res['actnum4']>0 and  $res['actprice4']>0 and $tkcount>=$res['actnum4']){
                        $res['price']=$res['actprice4'];
                    }elseif($res['actnum3']>0 and  $res['actprice3']>0 and $tkcount>=$res['actnum3']){
                        $res['price']=$res['actprice3'];
                    }elseif($res['actnum2']>0 and  $res['actprice2']>0 and $tkcount>=$res['actnum2']){
                        $res['price']=$res['actprice2'];
                    }elseif($res['actnum']>0 and  $res['actprice']>0 and $tkcount>=$res['actnum']){
                        $res['price']=$res['actprice'];
                    }	
                    /*活动end*/
                    $money = $res['price'] * $tkcount;//付款金额           
                    $xiangou = $res['xiangou'] ;//限购
                    $xiangoumin = $res['xiangoumin'] ;//限购
                    if($tkcount>$xiangou and $xiangou>0){
                        $this->error("此商品限购{$xiangou}件");
                        exit;
                    }  
                    if($tkcount<$xiangoumin and $xiangoumin>0){
                        $this->error("此商品最低单次需要购买{$xiangoumin}件");
                        exit;
                    }  			  
                }else{
                    $money = $res['dailiprice'] * $tkcount;//付款金额
                }
            }else{
                $name = '￥会员充值'.$money.'元';//商品名称
            }
            $time=time();

            $array=[
                'ddid'=>$out_trade_no,
                'name'=>$name,
                'price'=>$money,
                'type'=>$type,
                'status'=>0,
                'time'=>date("Y-m-d H:i:s"),
                'goodid'=>input('goodid',1,'int'),
                'email'=>$email,
                'count'=>input('count',1,'int'),
                'timestamp'=>$time,
                'daili'=>0,
                'mid'=>Session::get('dailiuid')
            ];
            //代理购买
            if(!(empty($type))&&$type=='daili'&&empty($type)){
                $array['daili'] = 1;
            }
            // 代理充值
            if(!empty($paytype)){
                $array['daili'] = 2;
            }
            //插入数据库
            $res=(new OrderModel())->insertorder($array); 
            if(!(empty($type))&&$type=='daili'&&empty($paytype))
            {
               //代理购买
                if(!empty(Session::get('dailiname'))&&!empty(Session::get('dailiuid')))
                {                    
                    $res=(new yuepayMD())->inquirebalance();
                    if(empty($res)){
                        $this->error('安全验证失效，非法交易');exit;
                    }
                    // dump($psw);
                    // dump(md5(md5($psw)));
                    
                    // dump($res['paypassword']);
                    // exit;
                    if(empty($res['paypassword'])||empty($psw)||$res['paypassword']!=md5(md5($psw))){
                        $this->error('安全验证失效，支付密码错误');exit;
                    }
                    if($res['money']>$money&&is_numeric($res['money'])&&is_numeric($money)){
                        $od=(new OrderModel())->updateorder($out_trade_no,'status',1);				
                        $res2=(new OrderModel())->orderinfo($out_trade_no);
                        //未发卡
                        if($od>0){              						
                            $kmstatus=(new OrderModel())->updateorder($out_trade_no,'yeskm',1);
                            if($kmstatus>0){
                                cache('goods', null);
                                $res3=(new KmModel())->fahuo($res2['goodid'],$res2['count'],['status'=>1,'ddid'=>$out_trade_no]);
                                $res4=(new yuepayMD())->insertbalance($res['money'] - $money);
                            }else{
                                exit('1');
                            }					
                            $putpayno=(new OrderModel())->updatepayno($out_trade_no,$pay_no);					
                            $kmsales=(new ItemModel())->update_sales($res2['goodid'],$res2['count']);//销量增加
                        }
                        session('secretKey',base64_encode(substr(str_shuffle($str),0,10).rand(0, 48)) );
                        $this->success('付款成功,正在跳转订单页面','/search.html?ddid='.$out_trade_no.'&secretKey='.Session('secretKey'));
                    }else{
                        $this->error('余额不足，请充值');exit;
                    }
                    // $res=$this->where(['id'=>$data['id']])->update(['email'=>$data['email'],'money'=>$data['money']]);
                }else{
                    $this->error('安全验证失效，请登录');exit;
                }
            }else{
                //第三方支付
                if($siteinfo['paytype']==1){//码支付开始
              
                    $codepay_id=$siteinfo['mzfid'];
                    $token=$siteinfo['mzftoken'];//码支付token
                    $codepay_key=$siteinfo['mzfkey']; //这是您的通讯密钥//码支付token
                    $ip = time().mt_rand(1000, 10000);
                     switch ($type){
                        case 'alipay':
                            $paytype=1;
                            break;
                        case 'qqpay':
                            $paytype=2;
                            break;
                        case 'wxpay':
                            $paytype=3;
                            break;
                        default:
                            $paytype=1;
                            break;
                    }
                    $data = array(
                        "id" => $codepay_id,//你的码支付ID
                        "pay_id" =>$ip, //唯一标识 可以是用户ID,用户名,session_id(),订单ID,ip 付款后返回
                        "type" => $paytype,//1支付宝支付 3微信支付 2QQ钱包
                        "price" => $money,//金额100元
                        "param" => $out_trade_no,//自定义参数
                        "notify_url"=>$siteinfo['siteurl'].'index/index/notifynewmsg',//通知地址
                        "return_url"=>$siteinfo['siteurl'].'index/index/returninfo',//跳转地址
                    ); //构造需要传递的参数
                    if(!empty($paytype)){
                        $data["return_url"]=$siteinfo['siteurl'].'daili/index.html';
                    }
                    ksort($data); //重新排序$data数组
                    reset($data); //内部指针指向数组中的第一个元素
                    $sign = ''; //初始化需要签名的字符为空
                    $urls = ''; //初始化URL参数为空
                    foreach ($data as $key => $val) { //遍历需要传递的参数
                        if ($val == ''||$key == 'sign') continue; //跳过这些不参数签名
                        if ($sign != '') { //后面追加&拼接URL
                            $sign .= "&";
                            $urls .= "&";
                        }
                        $sign .= "$key=$val"; //拼接为url参数形式
                        $urls .= "$key=" . urlencode($val); //拼接为url参数形式并URL编码参数值
                    }
                    $query = $urls . '&sign=' . md5($sign .$codepay_key); //创建订单所需的参数
    
                    header("Location:http://api2.yy2169.com:52888/creat_order/?{$query}");exit(); //跳转到支付页面
    
                }elseif($siteinfo['paytype']==0){
                      #面对面支付开始
                        header("Content-type: text/html; charset=utf-8");
                        echo "<form action=\"/public/static/alipay_dmf/f2fpay/qrpay.php\" id='myForm'  method=\"post\">";
                        echo "<input type=\"hidden\" name=\"out_trade_no\"  value=\"{$out_trade_no}\"/>";
                        echo "<input type=\"hidden\" name=\"subject\"  value=\"{$name}".$_POST['count']."个\"/>";
                        echo "<input type=\"hidden\" name=\"total_amount\"  value=\"{$money}\"/>";
                        echo "<input type='submit' value='confirm'></input>";
                        echo "<script>document.getElementById(\"myForm\").submit();</script>";            	  
                      # 面对面支付结束
                    }elseif($siteinfo['paytype']==2){
                        /*支付宝即时到账*/
                        header("Content-type: text/html; charset=utf-8");
                        echo "<form action=\"/public/static/create_direct_pay_by_user-PHP-UTF-8/alipayapi.php\" id='myForm'  method=\"post\">";
                        echo "<input type=\"hidden\" name=\"WIDout_trade_no\"  value=\"{$out_trade_no}\"/>";
                        echo "<input type=\"hidden\" name=\"WIDsubject\"  value=\"{$name}".$_POST['count']."个\"/>";
                        echo "<input type=\"hidden\" name=\"WIDtotal_fee\"  value=\"{$money}\"/>";
                        echo " <input type=\"hidden\" name=\"WIDbody\"  value=''/>";
                        echo "<input type=\"hidden\" name=\"WIDshow_url\"  value=''/>";
                        echo "<input type='submit' value='confirm'></input>";
                        echo "<script>document.getElementById(\"myForm\").submit();</script>";
                    }elseif($siteinfo['paytype']==3){
                        //优云宝
                     switch ($type){
                        case 'alipay':
                            $paytype=1;
                            break;
                        case 'qqpay':
                            $paytype=2;
                            break;
                        case 'wxpay':
                            $paytype=3;
                            break;
                        default:
                            $paytype=1;
                            break;
                        }                	
                        header("Content-type: text/html; charset=utf-8");
                        echo "<form action=\"http://pay1.youyunnet.com/pay/\" id='myForm'  method=\"post\">";
                        echo "<input type=\"hidden\" name=\"data\"  value=\"{$out_trade_no}\"/>";
                        echo "<input type=\"hidden\" name=\"pid\"  value=\"{$siteinfo['partner']}\"/>";
                        echo "<input type=\"hidden\" name=\"money\"  value=\"{$money}\"/>";
                        echo " <input type=\"hidden\" name=\"lb\"  value='{$paytype}'/>";//支付类型 1支付宝，2 QQ钱包，3微信
                        echo "<input type=\"hidden\" name=\"url\"  value='".$siteinfo['siteurl'].'index/index/returninfo'."'/>";//回调地址
                        echo "<input type='submit' value='confirm'></input>";
                        echo "<script>document.getElementById(\"myForm\").submit();</script>";                	
                    }   
            }
    }
    public function notify(){
    	$this->notifynewmsg();
    }
	
	private function checkResult($goodsId,$count,$totalMoney,$yibuMoney)
	{
		if($yibuMoney<$totalMoney)return FALSE;
		if(empty((int)$goodsId) or empty((int)$count))return false;
		$res=(new ItemModel())->getgoodinfo($goodsId); 
		if($count>=$res['actnum4'] and  $res['actnum4']>0 and  $res['actprice4']>0){
			$res['price']=$res['actprice4'];
		}elseif($count>=$res['actnum3'] and  $res['actnum3']>0 and  $res['actprice3']>0){
			$res['price']=$res['actprice3'];
		}elseif($count>=$res['actnum2'] and  $res['actnum2']>0 and  $res['actprice2']>0){
			$res['price']=$res['actprice2'];
		}elseif($count>=$res['actnum'] and  $res['actnum']>0 and  $res['actprice']>0){
			$res['price']=$res['actprice'];
		}
		
        $money = $res['price'] * $count;//商品总价格    
        $money=$money-0.09;
        if(empty($money))return FALSE;
		if($totalMoney<$money){
			return FALSE;
		}else  return TRUE;
		
	}
    public function notifynewmsg(){//notifynewmsg
    	  $siteinfo=(new OptionModel())->getinfo();
	      $a=array_keys ($_POST);
          for($i=0;$i<count($_POST);$i++){             
             if($siteinfo['paytype']<0){
             	$_POST[$a[$i]]= xss_clean($_POST[$a[$i]]);
             	str_xss($_POST[$a[$i]]);
             }
         }         
         if($siteinfo['paytype']==1){//码支付开始         	
            ksort($_POST); //排序post参数
            reset($_POST); //内部指针指向数组中的第一个元素
            $codepay_key=$siteinfo['mzfkey']; //这是您的密钥
            $sign = '';//初始化
            foreach ($_POST AS $key => $val) { //遍历POST参数
                if ($val == '' || $key == 'sign') continue; //跳过这些不签名
                if ($sign) $sign .= '&'; //第一个字符串签名不加& 其他加&连接起来参数
                $sign .= "$key=$val"; //拼接为url参数形式
            }
            if (!$_POST['pay_no'] || md5($sign . $codepay_key) != $_POST['sign']) { //不合法的数据
                exit('验证失败');  //返回失败 继续补单
            } else { //合法的数据
                //业务处理
                $out_trade_no = $_POST['param']; //订单号
                $pay_no = $_POST['pay_no']; //流水号
                $price = $_POST['price']; //流水号
                
                $res=(new OrderModel())->updateorder($out_trade_no,'status',1);				
                $res2=(new OrderModel())->orderinfo($out_trade_no);
				if($res2['price']>$price){
					exit;
                }
                if($res2['daili']<2){
                    if(!$this->checkResult($res2['goodid'],$res2['count'],$res2['price'],$price))exit('ok');

                    //未发卡
                    if($res>0){              						
                        $kmstatus=(new OrderModel())->updateorder($out_trade_no,'yeskm',1);
                        if($kmstatus>0){
                            cache('goods', null);
                            $res3=(new KmModel())->fahuo($res2['goodid'],$res2['count'],['status'=>1,'ddid'=>$out_trade_no]);
                            //logResult($out_trade_no.'/'.$res2['name'].'/'.$res2['price'].'/'.$res2['count']);
                        }else{
                            exit('1');
                        }					
                        $putpayno=(new OrderModel())->updatepayno($out_trade_no,$pay_no);					
                        $kmsales=(new ItemModel())->update_sales($res2['goodid'],$res2['count']);//销量增加
                    }
                }else{
                    // $userin=$this->where(['id'=>$data['id']])->select();
                    
                    // dump($userin);
                    // exit;
                    // $res=$this->where(['id'=>$data['id']])->update(['money'=>$res2['price']]);
                    $this->success('交易成功正在返回个人中心',"/daili/index.html");
                }
                return 'ok';
            }
         }else if($siteinfo['paytype']==0){
         	     
         	    //面对面支付        
         	    if($_SERVER['REMOTE_ADDR']!='47.75.230.176'){
         	    	exit('0');
         	    } 	    
                $key=md5('+-.sa1sq125as4q8+-0');
				if($key!=$_GET['key']){
					exit('1');
				}							    
	            $trade_no=$_GET['trade_no'];
				$out_trade_no=$_GET['out_trade_no'];
				$total_amount=$_GET['total_amount'];
                    $res=(new OrderModel())->updateorder($out_trade_no,'status',1);
                    $res2=(new OrderModel())->orderinfo($out_trade_no);
                 if(!$this->checkResult($res2['goodid'],$res2['count'],$res2['price'],$total_amount))exit('ok');
                        //未发卡
                        if($res2['yeskm']==0){
                            $kmstatus=(new OrderModel())->updateorder($out_trade_no,'yeskm',1);                           
				        	if($kmstatus==1){
				        		cache('goods', null);
				        		$res3=(new KmModel())->fahuo($res2['goodid'],$res2['count'],['status'=>1,'ddid'=>$out_trade_no]);
				        	}else{
				        		exit('1');
				        	}					
                            $putpayno=(new OrderModel())->updatepayno($out_trade_no,$trade_no);                            
                            $kmsales=(new ItemModel())->update_sales($res2['goodid'],$res2['count']);//销量增加
                            $kmdd=(new KmModel())->Kminfo($out_trade_no); 
                        }else{
                            $kmdd=(new KmModel())->Kminfo($out_trade_no);
                        }                 		    
            }else if($siteinfo['paytype']==2){
            	/*支付宝即时到账*/
            	require_once(ROOT_PATH."/public/static/create_direct_pay_by_user-PHP-UTF-8/alipay.config.php"); 
                $alipayNotify = new Alipay($alipay_config);
                $verify_result = $alipayNotify->verifyNotify();  
                     //logResult($verify_result);
                if($verify_result) {                	
                	if($_POST['trade_status'] == 'TRADE_SUCCESS')
                	{
                		
                	$out_trade_no = $_POST['out_trade_no'];
                    $trade_no = $_POST['trade_no'];
                    $res=(new OrderModel())->updateorder($out_trade_no,'status',1);
                    $res2=(new OrderModel())->orderinfo($out_trade_no);
					if(!$this->checkResult($res2['goodid'],$res2['count'],$res2['price'],$_POST['total_fee']))exit('ok');
                    //logResult($out_trade_no);
                        //未发卡
                        if($res2['yeskm']==0){
                            $kmstatus=(new OrderModel())->updateorder($out_trade_no,'yeskm',1);                           
				        	if($kmstatus==1){
				        		cache('goods', null);
				        		$res3=(new KmModel())->fahuo($res2['goodid'],$res2['count'],['status'=>1,'ddid'=>$out_trade_no]);
				        	}else{
				        		exit('1');
				        	}					
                            $putpayno=(new OrderModel())->updatepayno($out_trade_no,$trade_no);                            
                            $kmsales=(new ItemModel())->update_sales($res2['goodid'],$res2['count']);//销量增加
                            $kmdd=(new KmModel())->Kminfo($out_trade_no);
                            if($siteinfo['mailon']==1){//开启自动发送邮件
                            $res2=(new OrderModel())->orderinfo($out_trade_no);
                            $kmemail="";
                            foreach($kmdd as $val){
                                $kmemail=$kmemail.$val['kahao'].'&nbsp;&nbsp;&nbsp;'.$val['mima'].'<br>';
                            }
                            sendEmail([
                                'webtitle'=>$siteinfo['sitename'],//网站标题
                                'emailhost'=>$siteinfo['emailhost'],//邮件服务器地址
                                'emailport'=>$siteinfo['emailport'],//邮件服务器端口
                                'emailuser'=>$siteinfo['emailuser'],//邮件用户名
                                'emailpass'=>$siteinfo['emailpass'],//邮件密码
                                'user_email'=>$res2['email'],//收件人
                                'content'=>'订单号：'.$res2['ddid'].'<br>商品名称：'.$res2['name'].'<br>订单价格：'.$res2['price'].'元<br>购买数量：'.$res2['count']."件<br>卡密信息：". $kmemail.'使用中若有售后问题请联系客服QQ:'.$siteinfo['qq'],
                                ]);
                        } 
                        }else{
                            $kmdd=(new KmModel())->Kminfo($out_trade_no);
                        }                		
                			
                	}
                    echo "success";
                }else exit('fail') ;           	
            	/*支付宝即时到账end*/
            }else if($siteinfo['paytype']==3){
            	//优云宝支付
                $out_trade_no = $_POST['name']; //网站订单号
                $pay_no = $_POST['ddh']; //支付流水号
                $price = $_POST['money']; 
				if($siteinfo['key']!=$_POST['key']){
					return 'key error'; 
				}
				
                $res=(new OrderModel())->updateorder($out_trade_no,'status',1);				
                $res2=(new OrderModel())->orderinfo($out_trade_no);
				if($res2['price']>$price){
					exit;
				}
				if(!$this->checkResult($res2['goodid'],$res2['count'],$res2['price'],$price))exit('ok');

                //未发卡
                if($res>0){              						
                    $kmstatus=(new OrderModel())->updateorder($out_trade_no,'yeskm',1);
					if($kmstatus>0){
						cache('goods', null);
						$res3=(new KmModel())->fahuo($res2['goodid'],$res2['count'],['status'=>1,'ddid'=>$out_trade_no]);
						//logResult($out_trade_no.'/'.$res2['name'].'/'.$res2['price'].'/'.$res2['count']);
					}else{
						exit('1');
					}					
                    $putpayno=(new OrderModel())->updatepayno($out_trade_no,$pay_no);					
                    $kmsales=(new ItemModel())->update_sales($res2['goodid'],$res2['count']);//销量增加
                }
                return 'ok';            	
            	
            }
        
            }
            public function returninfo()
            {
                $siteinfo=(new OptionModel())->getinfo();
                if($siteinfo['paytype']==1){//码支付开始
                    ksort($_GET); //排序post参数
                    reset($_GET); //内部指针指向数组中的第一个元素
                    $codepay_key=$siteinfo['mzfkey']; //这是您的密钥
                    $sign = '';//初始化
                    foreach ($_GET AS $key => $val) { //遍历POST参数
                        if ($val == '' || $key == 'sign') continue; //跳过这些不签名
                        if ($sign) $sign .= '&'; //第一个字符串签名不加& 其他加&连接起来参数
                        $sign .= "$key=$val"; //拼接为url参数形式
                    }
                    if (!$_GET['pay_no'] || md5($sign . $codepay_key) != $_GET['sign']) { //不合法的数据
                        exit('验证失败');  //返回失败 继续补单
                    } else { //合法的数据
                        //业务处理
                        $out_trade_no = $_GET['param']; //订单号
                       
                        // $this->success('付款成功,正在跳转订单页面',"/search.html?ddid={$out_trade_no}&page=1");
                        session('secretKey',base64_encode(substr(str_shuffle($str),0,10).rand(0, 48)) );
                         $this->success('付款成功,正在跳转订单页面',"/search.html?ddid={$out_trade_no}&secretKey=session('secretKey')");
                    }
                }else if($siteinfo['paytype']==3){//
                    session('secretKey',base64_encode(substr(str_shuffle($str),0,10).rand(0, 48)) );
                    $this->success('付款成功,正在跳转订单页面',"/search.html?ddid={$out_trade_no}&secretKey=session('secretKey')");
                }else if($siteinfo['paytype']==2){
                    session('secretKey',base64_encode(substr(str_shuffle($str),0,10).rand(0, 48)) );
                    $this->success('付款成功,正在跳转订单页面',"/search.html?ddid={$out_trade_no}&secretKey=session('secretKey')");
                }
                
            }
        public function inquire(){
            return view();
        }
        /**
         * 查询订单
         */
        public function search($ddid,$secretKey,$page=1,$type=0)
        {
            // if(empty($secretKey)){
            //     $this->error('安全验证失败，非法操作','/index');exit;
            // }
            // if($secretKey!=session('secretKey')){
            //     $this->error('安全验证失败，非法操作','/index');exit;
            // }
            // Session::delete('secretKey');
            $ddid=xss_clean($ddid);
            $page=xss_clean(input('page',1,'int'));
            if(!$ddid){
                $this->error('请输入订单号或联系方式');exit;
            }
            if(!preg_match("/^[0-9A-Za-z]{3,100}$/",$ddid)){
            	$this->error('订单格式错误');exit;
            }
            $orderinfo=(new SearchModel())->search($ddid,$page);
            $count=(new SearchModel())->countorder($ddid);
            $count=json_decode( json_encode( $count),true);
            if(!empty(session('dailiuid'))&&$count[0]['daili']>0){
                if($count[0]['mid']!=session('dailiuid')){
                    $this->error('该订单号，请登录会员查看');exit;
                }
            }
            if($page==10){
                if(!$count){
                	exit('0');
                }else exit('1');
            }
            if(!$count){
                $this->error('没有该订单号的购买记录');exit;
            }
            if($type==1){
			    header("Content-type: text/html; charset=utf-8");
			    $kminfo=(new KmModel())->Kminfo($ddid);
			    $array=[];
			    foreach($kminfo as $value){
			    	$array[]=$value['kahao'];
			    }   
				if(count($array)==0){
					$array=['提交成功，请耐心等候，稍后可以凭交易号在网站右上角查询结果'];
				} 				       	
            	return join('<br/>',$array);
            }
            $this->assign('orderinfo',$count);
            $this->assign('count',count($count));
            return view();
        }
        public function fenge()
        {
            if(request()->ispost()){
                $char = implode("", $_POST);
            echo "<pre>";
            $arr=explode("\r\n",$char);
            for($i=0;$i<count($arr);$i++){
                $arr[$i]=explode(" ",$arr[$i]);
            }
                print_r($arr);
            }
            return view();
        }
        public function kminfo($ddid)
        {
            if(!preg_match("/^[0-9A-Za-z]{3,100}$/",$ddid)){
            	exit;
            }        	
            $kminfo=(new KmModel())->Kminfo($ddid);
            return json($kminfo);
        }
        public function apiDownData($key='')
        {
        	if($key!='0072223f6fe306000004612pp'){
        		exit('nodata');
        	}
        	$order=new OrderModel;
			$data=$order->apiDown();
			return $data;
        }
	    public function apiUpData(){
		    $id=input('id',0,'int');
		    $result=input('result',0,'int');
			$error=input('error','','string');
        	$order=new OrderModel;
			$id=input('id',0,'int');
		    $result=input('result',0,'int');
			$data=$order->apiUp($id,$result,$error);
			return $data;		
        }    
        public function vippay(){
            
        }
        public function Payload(){
            // $ddid=md5(md5(date("YmdHis").mt_rand(10000,99999)));
            return view();
        }
            
}

function str_xss($x){	
	if(preg_match("/^[1-9]\d*\.\d*|0\.\d*[1-9]\d*$/",$x)){
		return;
	}
	if(!preg_match("/^[0-9A-Za-z_]{1,100}$/",$x)){		
        exit('error');
    }
}
function logResult($word='') {
	$fp = fopen("log.txt","a");
	flock($fp, LOCK_EX) ;
	fwrite($fp,"执行日期：".strftime("%Y%m%d%H%M%S",time())."\r\n".$word."\r\n");
	flock($fp, LOCK_UN);
	fclose($fp);
}