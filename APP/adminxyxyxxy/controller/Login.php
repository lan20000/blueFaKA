<?php
namespace app\adminxyxyxxy\controller;
use think\Controller;
use app\adminxyxyxxy\model\Login as LoginModel;
use app\adminxyxyxxy\model\Option as OptionModel;
use think\captcha\Captcha;
class Login extends Controller
{
    function _initialize(){
    //（左侧）模块循环
        $res=(new OptionModel())->getinfo();
        $this->assign('siteinfo',$res);
    }
    public function login()
    {
        if(request()->ispost()){
        	if(!captcha_check($_POST['code'])){
        		$this->success('验证码输入错误','/adminxyxyxxy/login/login');exit;
        	};
            $res=(new LoginModel())->login($_POST);
            if($res['valid']){
                //成功
                $this->success($res['msg'],'/adminxyxyxxy/index/index');exit;
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
  
}