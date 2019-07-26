<?php
/**
 * Created by PhpStorm.
 * User: 刘洋
 * Date: 2019/7/21
 * Time: 22:25
 */

namespace app\daili\controller;
use think\Db;
use think\Controller;
use think\Request;
use think\View;
use app\daili\model\Order as OrderMD;
use app\daili\model\option as optionMD;
use app\daili\model\userInfo as userInfoMD;
use app\index\model\Option as OptionModel;
use think\Session;

class Index extends Common
{
    function _initialize(){
        $res=(new OptionModel())->getinfo();
        $this->assign('siteinfo',$res);
    }
    public function index(){
        $user = (new userInfoMD())->info(session('dailiuid'));
        $ip = (new userInfoMD())->loginRecord(session('dailiuid'));
        if(!empty($user)||!empty($ip)){
            $data = [];
            $data['id'] = 'ID：' . $user['username'];
            $data['balance'] = '当前余额：￥' . $user['money'];
            $data['level'] = '当前等级：' . $user['level'];
            if($user['lock']==0){
                $data['status'] = '<span style="color:red;">账户状态：锁定</span>';
            }else if($user['lock']==1){
                $data['status'] = '<span style="color:#5FB878;">账户状态：正常</span>';
            }else {
                $data['status'] = '<span style="color:red;">账户状态：其他</span>';
            }
        }else {
            Session::clear();
            $this->success('非法登录','/daili/login/');exit;
        }
        
        $dataInfo=(new optionMD())->optionInfo();
        $this->assign('userInfo',$data);
        $this->assign('IP',$ip[0]);
        $this->assign('dataInfo',$dataInfo);
        return view();
    }
    public function dailiout()
    {
        Session::clear();
        $this->success('已安全退出','/daili/login');exit;
    }
    public function orderlist($page,$limit){       
        if(!empty(session('dailiuid'))){
            $res=(new OrderMD())->orderList(session('dailiuid'),$page,$limit);
            return $res=json_decode( json_encode( $res),true);
        }
        return $res=['code'=>0,'msg'=>'','count'=>0,'data'=>[]];
    }
    public function chongzhi(){
        return view();
    }
    public function payload(){
        $a=array_keys ($_POST);
        for($i=0;$i<count($_POST);$i++){
            str_xss($_POST[$a[$i]]);
        }
        $array=[
            'email'=>input('email',1,'int'),
            'name'=>input('type','alipay','string'),       
            "summoney"=> input('summoney',1,'int'),       
            "paytype"=> input('paytype',8,'int')
        ];
        $this->assign("chongdata",$array);
        return view();
    }
}