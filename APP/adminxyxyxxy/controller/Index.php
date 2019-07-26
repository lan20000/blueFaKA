<?php
namespace app\adminxyxyxxy\controller;
use app\adminxyxyxxy\model\Category as CategoryModel;
use app\adminxyxyxxy\model\Goods as GoodsModel;
use app\adminxyxyxxy\model\Kami as KamiModel;
use app\adminxyxyxxy\model\Order as OrderModel;
use app\adminxyxyxxy\model\Option as OptionModel;
use app\adminxyxyxxy\model\Links as LinksModel;
use app\adminxyxyxxy\model\Daili as DailiModel;
use app\adminxyxyxxy\model\memberOption as memberOpMd;

use think\Db;
use think\Session;
use think\Request;
class Index extends Common
{
    function _initialize(){
        $res=(new OptionModel())->getinfo();
        $this->assign('siteinfo',$res);
    }
	function __destruct(){
		cache('goods', null);
		cache('ms', null);
	}
    public function welcome()
    {
        $order=(new OrderModel())->getorderinfo();

        $category=(new CategoryModel())->getcat();
        $this->assign('category',count($category));
        $good=(new GoodsModel())->getgoods();
        $this->assign('good',count($good));

        
        // $ttt = '1111';
        $todybuyok=0.00;
        $todymoney=0.00;

        foreach($order as $val){
            $b = substr($val['time'],0,10); 
            $c = date('Y-m-d');

            if($val->getData('status')==1&&$b==$c){
                $todybuyok++;
                $todymoney=$todymoney+$val['price'];
            }
  
        }
        $info = array(
        '操作系统'=>PHP_OS,
        '运行环境'=>$_SERVER["SERVER_SOFTWARE"],
        'PHP运行方式'=>php_sapi_name(),
        'ThinkPHP版本'=>THINK_VERSION.' [ <a href="http://thinkphp.cn" target="_blank">查看最新版本</a> ]',
        '上传附件限制'=>ini_get('upload_max_filesize'),
        '执行时间限制'=>ini_get('max_execution_time').'秒',
        '服务器时间'=>date("Y年n月j日 H:i:s"),
        '北京时间'=>gmdate("Y年n月j日 H:i:s",time()+8*3600),
        '服务器域名/IP'=>$_SERVER['SERVER_NAME'].' [ '.gethostbyname($_SERVER['SERVER_NAME']).' ]'
        );
        $this->assign('serverinfo',$info);
        // $this->assign('ttt',$ttt);
        $this->assign('todybuyok',$todybuyok);
        $this->assign('todymoney',$todymoney);

        return view();
    }
    public function index()
    {
        return view();
    }
    public function loginout()
    {
        Session::clear();
        $this->success('退出成功','adminxyxyxxy/index/index');exit;
    }
    public function category()
    {
        return view();
    }
    public function categorydata($page,$limit,$keyword='')
    {
        $res=(new CategoryModel())->category($page,$limit,$keyword); 
        $res=json_decode( json_encode( $res),true);
        $rescount=(new CategoryModel())->categorycount($keyword);
        $data=$data=['code'=>0,'msg'=>'','count'=>$rescount,'data'=>[]];
        foreach ($res as $value) {
           $data['data'][]=[
               'id'=>$value['id'],
               'name'=>$value['name'],
               'image'=>'<img src="'.$value['image'].'" onclick="lookimg(this)">',
               'abridge'=>$value['abridge'],
               'sort'=>$value['sort'],
            ];
        }
        return json($data);
    }
    
    public function addcat()
    {
        if(request()->ispost()){
            $res=(new CategoryModel())->addcat($_POST);
            if($res){
                $this->success($res['msg'],'/adminxyxyxxy/index/category');
            }else{
                $this->error($res['msg']);
            }
        }
        return view();
    }
    public function delcat($id)
    {
           
            $catinfo= (new CategoryModel())->editcat($id);
            $goodinfo=(new GoodsModel())->delcat_good($catinfo['abridge']);
            if($goodinfo){
                echo '0';
            }else{
                $res=(new CategoryModel())->delcat($id);
                echo $res;
            }
             
    }
    public function editcat($id)
    {
        $res=(new CategoryModel())->editcat($id);
        $this->assign('res',$res);
        return view();
    }
    public function posteditcat()
    {
        if(request()->ispost())
        {
            $res=(new CategoryModel())->posteditcat($_POST);
            if($res){
                $this->success($res['msg'],'/adminxyxyxxy/index/category');
            }else{
                $this->error($res['msg']);
            }
        }
    }
    public function goods()
    {
        $rescount=2;
        $this->assign('rescount',$rescount);
        return view();
    }
    public function gooddata($page,$limit,$keyword='')
    {
        $res=(new GoodsModel())->goods($page,$limit,$keyword);
        $res=json_decode( json_encode( $res),true);
        $rescount=(new GoodsModel())->goodcount($keyword);
        $data=['code'=>0,'msg'=>'','count'=>$rescount,'data'=>[]];

        foreach ($res as $value) {

			$kucun=(new KamiModel())->kmnum($value['id']);
			
           $data['data'][]=[
               'id'=>$value['id'],
               'name'=>$value['name'],
               'abridge'=>$value['abridge'],
               'price'=>$value['price'],
               'dailiprice'=>$value['dailiprice'],
               'status'=>$value['status'],
               'kucun'=>$kucun,
               'sales'=>$value['sales'],
               'actnum'=>$value['actnum'],
               'actprice'=>$value['actprice'],
            ];
        }
       return json($data);
     
    }
    public function addgood(){
        if(request()->post()){
            $res=(new GoodsModel())->addgood($_POST);
            if($res){
                $this->success($res['msg'],'/adminxyxyxxy/index/goods');
            }else{
                $this->error($res['msg']);
            }
        }
        $fenlei=(new CategoryModel())->getcat();
        $this->assign('fenlei',$fenlei);
        return view();
    }
    public function delgood($id){

            $res=(new GoodsModel())->delgood($id);
            echo $res;

       
    }
    public function editgood($id)
    {
        $res=(new GoodsModel())->editgood($id);
        $this->assign('res',$res);
        $fenlei=(new CategoryModel())->getcat();
        $this->assign('fenlei',$fenlei);
        $this->assign('status',$res->getData('status'));
        return view();
    }
    public function posteditgood()
    {
        if(request()->ispost()){
            $res=(new GoodsModel())->posteditgood($_POST);
            if($res){
                $this->success($res['msg'],'/adminxyxyxxy/index/goods');
            }else{
                $this->error($res['msg']);
            }
        }
    }
    public function kami()
    {
        $res=(new GoodsModel())->getgoods();
        $this->assign('res',$res); 
        return view();
        
    }
    public function kamidata($page,$limit,$id='',$status='')
    {
         $res=(new KamiModel())->kami($page,$limit,$id,$status);
         $res=json_decode( json_encode( $res),true);
         $rescount=(new KamiModel())->kamicount($id,$status);
         $data=['code'=>0,'msg'=>'','count'=>$rescount,'data'=>[]];
         foreach ($res as $value) {
           $kmname=(new GoodsModel())->find_good($value['goodid']);
           $data['data'][]=[
               'id'=>$value['id'],
               'name'=>$kmname['name'],
               'kahao'=>$value['kahao'],
               'mima'=>$value['mima'],
               'status'=>$value['status'],
            ];
        }
       return json($data);
    }
    public function deleteKami($date1,$date2)
    {
    	$res=(new kamiModel())->deleteKami($date1,$date2);
    	return $res;
    }
    public function addkami()
    {
        if(request()->ispost())
        {
            $res=(new KamiModel())->addkami($_POST);
            if($res){
                $this->success($res['msg'],'/adminxyxyxxy/index/addkami');
            }else{
                $this->error($res['msg']);
            }
        }
        $good=(new GoodsModel())->getgoods();
        $this->assign('good',$good);
        return view();
    }
    public function delkami($id)
    {
           $res=(new KamiModel())->delkami($id);
           return $res;
       
    }
    public function kamiinfo($id)
    {
        $kami=(new KamiModel())->find_km_id($id);
        $good=(new GoodsModel())->find_good($kami['goodid']);
        return '卡密编号：'.$kami['id'].
               '<br>所属商品：'.$good['name'].
               '<br>卡号信息：'.$kami['kahao'].
               '<br>使用类型：'.$kami['mima'].
               '<br>卡密状态：'.$kami['status'].
               '<br>所属订单：'.$kami['ddid'].
               '<br>发卡时间：'.$kami['time']
               ;
    }
    public function order()
    {
        return view();
    }
    public function orderdata($page,$limit,$keyword='')
    {
        // dump($page);
        // dump($limit);
        // exit;
        $res=(new OrderModel())->ordata($page,$limit,$keyword);
        $odcount=(new OrderModel())->ordercount($keyword);
        $res=json_decode( json_encode( $res),true);
        //print_r($res);
        $data=['code'=>0,'msg'=>'','count'=>$odcount,'data'=>[]];
        foreach ($res as $value) {
           $data['data'][]=[
               'ddid'=>$value['ddid'],
               'name'=>$value['name'],
               'time'=>$value['time'],
               'count'=>$value['count'],
               'email'=>$value['email'],
               'type'=>$value['type'],
               'status'=>$value['status'],
            ];
        }
       return json($data);
    }
    /**
     * 会员配置
     */
    public function mboptions()
    {
        if(request()->ispost()){
            $update=(new memberOpMd())->updatembOption($_POST);
            if($update){
                 $this->success('修改成功');
            }else{
                 $this->error('修改失败');
            }
        }
       $res=(new memberOpMd())->optionInfo();
       $this->assign('res',$res);
       return view();
    }
    public function option()
    {
        if(request()->ispost()){
            //dump($_POST);
            $update=(new OptionModel())->updateinfo($_POST);
            if($update){
                 $this->success('修改成功','/adminxyxyxxy/index/option');
            }else{
                 $this->error('修改失败');
            }

        }
       $res=(new OptionModel())->getinfo();
       $this->assign('res',$res);
       // dump($_POST);
        return view();
        
    }
	public function ms()
	{
		if(Request::instance()->isPost())
		{
			$ms=$_POST['editorValue'];
			$ms=str_replace('<nbsp>', '&', $ms);
			$name=input('post.msname','兑换地址');
$emptycontent=<<<xml
<?xml version="1.0" encoding="utf-8"?>
<user>
<des><![CDATA[[11111111]]]></des>
<name><![CDATA[[2222222]]]></name>
 </user>
xml;
          $emptycontent=str_replace('[11111111]', $ms, $emptycontent);
		  $emptycontent=str_replace('[2222222]', $name, $emptycontent);
          $exec=new \SimpleXMLElement($emptycontent); 	
		  $exec->asXML('public\static\des.xml');		
		}		
		error_reporting(0); 
		 $obj=simplexml_load_file('public\static\des.xml');
		 $this->assign('value',$obj->name);		 	
		 return view();
	}
	public function getms()
	{
		$obj=simplexml_load_file('public\static\des.xml');
		return stripcslashes($obj->des);
	}
    public function delsold($id)
    {
        $res=(new KamiModel())->delsold($id);
        echo $res;
    }
    public function delkm($id)
    {
        $res=(new KamiModel())->delkm($id);
        if($res=='1'){
                 $this->success('清空成功','/adminxyxyxxy/index/goods.html');
        }else{
                $this->error('清空失败');
        }
    }
    public function apipay()
    {
    	
        if(request()->ispost()){
        	if(input('post.paytype',0,'int')==1){
        		if(empty(input('post.mzfid',0,'int')))$this->error('码支付ID设置错误');
        	}
            $update=(new OptionModel())->updatepay($_POST);
            if($update){
                 $this->success('修改成功','/adminxyxyxxy/index/apipay.html');
            }else{
                 $this->error('修改失败');
            }

        }
        $res=(new OptionModel())->getinfo();
        $this->assign('res',$res);

        return view();
    }
    public function password()
    {
        if(request()->ispost())
        {
            $res=(new OptionModel())->option($_POST);
            if($res['valid']){
                Session::clear();
                $this->success($res['msg'],'/adminxyxyxxy/index/password');
            }else{
                $this->error($res['msg']);
            }
        }
        return view();
    }
    public function links()
    {
        return view();
    }
    public function linkdata($page,$limit,$keyword='')
    {
         $link=(new LinksModel())->getlink($page,$limit,$keyword);
         $linkcount=(new LinksModel())->linkcount($keyword);
         $data=['code'=>0,'msg'=>'','count'=>$linkcount,'data'=>[]];
          foreach ($link as $value) {
           $data['data'][]=[
               'id'=>$value['id'],
               'sitename'=>$value['sitename'],
               'siteurl'=>$value['siteurl'],
               'sort'=>$value['sort'],
            ];
        }
       return json($data);

    }
    public function addlink()
    {
        if(request()->ispost()){
            $res=(new LinksModel())->addlinks($_POST);
            if($res['valid']){
                $this->success($res['msg'],'/adminxyxyxxy/index/addlink');
            }else{
                $this->error($res['msg']);
            }
        }
        return view();
    }
    public function dellink($id)
    {
        $res=(new LinksModel())->dellink($id);
        if($res){
            return '1';//成功
        }else{
           return '0';//失败
        }
    }
    public function editlink($id)
    {
        $res=(new LinksModel())->findlink($id);
        if(request()->ispost()){
            $res=(new LinksModel())->editlink($_POST);
            if($res['valid']){
                $this->success($res['msg'],'/adminxyxyxxy/index/links');
            }else{
                $this->error($res['msg']);
            }
        }
        $this->assign('link',$res);
        return view();
    }
    public function daili()
    {
        return view();
    }
    public function dailidata($page,$limit,$keyword='')
    {
        $dlinfo=(new DailiModel())->dailiinfo($page,$limit,$keyword);
        $dlcount=(new DailiModel())->dlcount($keyword);
        $data=['code'=>0,'msg'=>'','count'=>$dlcount,'data'=>[]];
        foreach ($dlinfo as $value) {
           $data['data'][]=[
               'id'=>$value['id'],
               'username'=>$value['username'],
               'email'=>$value['email'],
               'money'=>$value['money'],
               'level'=>$value['level'],
               'time'=>$value['create_time']
            ];
        }
       return json($data);
    }
    
    public function deldaili($dlid)
    {
        $deldaili=(new DailiModel())->deldaili($dlid);
        if($deldaili){
             return '1';
        }else{
             return '2';
        }
    }
    public function editdaili($id)
    {
        if(request()->ispost()){
             $dlinfo=(new DailiModel())->editdaili($_POST);
             //dump($_POST);
             if($dlinfo){
                $this->success('修改成功','/adminxyxyxxy/index/daili.html');
            }else{
                $this->error('修改失败');
            }
        }
        $dlinfo=(new DailiModel())->daili($id);
        $this->assign('dlinfo',$dlinfo);
         return view();
    }
    public function adddaili()
    {
        if(request()->ispost()){
            $add=(new DailiModel())->adddaili($_POST);
            if($add['vaild']){
                $this->success($add['msg'],'/adminxyxyxxy/index/daili.html');
            }else{
                 $this->error($add['msg']);
            }
        }
        return view();
    }
    public function pldelkm($data){
         $data=json_decode($data, true);
         if(!$data){
             return '没有选中任何记录';
         }

        $res=(new KamiModel())->pldelekm($data);
        if($res=='1'){
            return '删除成功';
        }
    }
    public function dljiakuan($dlid,$money)
    {
        $jiakuan=(new DailiModel())->jiakuan($dlid,$money);
        if($jiakuan=='1'){
            return '已经成功给编号为'.$dlid.'的代理加款'.$money.'元';
        }
    }
    public function dckami($goods,$num)
    {
    	$res=(new kamiModel())->dckami($goods,$num);
    	return $res;
    }
    public function querykami($time)
    {
    	$res=(new kamiModel())->querykami($time);
    	return $res;
    }    
    public function clear()
    {
        $res=(new GoodsModel())->getgoods();
        $this->assign('res',$res); 
        return view();
    }
    public function cleardata($oper)
    {
       $res=(new OrderModel())->cleardata($oper);
       return $res;
    }
    public function deleteorder($oper,$date1,$date2)
    {
       $res=(new OrderModel())->deleteorder($oper,$date1,$date2);
       return $res;    	
    }
    public function orderdetail($ddid)
    {
       $orderinfo=(new OrderModel())->findorder($ddid);
       return     '订单编号：'.$orderinfo['ddid'].
              '<br>商品编号：'.$orderinfo['goodid'].
              '<br>商品名称：'.$orderinfo['name'].
              '<br>订单金额：'.$orderinfo['price'].
              '<br>购买数量：'.$orderinfo['count'].
              '<br>买家信息：'.$orderinfo['email'].
              '<br>支付方式：'.$orderinfo['type'].
              '<br>订单状态：'.$orderinfo['status'].
              '<br>下单时间：'.$orderinfo['time'].
              '<br>是否发卡：'.$orderinfo['yeskm'].
              '<br>卡密信息：'.'<a target="_blank" href="/search.html?ddid='.$orderinfo['ddid'].'&page=1">点此查看</a>'.
              '<br>代理编号：'.$orderinfo['daili'].
              '<br>流水编号：'.$orderinfo['payno']
              ;
    }
    
}