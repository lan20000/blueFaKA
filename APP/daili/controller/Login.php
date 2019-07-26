<?php
/**
 * Created by PhpStorm.
 * User: 刘洋
 * Date: 2019/7/21
 * Time: 22:31
 */

namespace app\daili\controller;
use think\Controller;
use think\captcha\Captcha;
use think\Request;
use app\daili\model\Login as LoginMD;
use app\index\model\Option as OptionModel;


class Login extends Controller
{
    function _initialize(){
        $res=(new OptionModel())->getinfo();
        $this->assign('siteinfo',$res);
    }
    public function login()
    {
        if(request()->ispost()){
            if(!captcha_check($_POST['dailiCode'])){
                $this->success('验证码输入错误','/daili/login');exit;
            };
            $res=(new LoginMD())->login($_POST);
            if($res['valid']){
                //成功
                $this->success($res['msg'],'/daili/index');exit;
            }else{
                $this->error($res['msg']);exit;
            }
        }

        return view();
    }
    public function img()
    {
        $captcha = new Captcha(['length'=>4,'useCurve'=>false,'fontSize'=>35,'codeSet'=>'123456789']);
        return $captcha->entry();
    }
    public function index()
    {
        if(!empty(session('dailiuid'))){
            $this->redirect('/daili',302);
        }
        return view();
    }
}