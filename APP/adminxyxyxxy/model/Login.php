<?php
namespace app\adminxyxyxxy\model;
use think\Model;

class Login extends Model
{
    protected $pk='id';
    protected $table='options';

    public function login($data)
    {
        // dump($data);
        if(!preg_match("/^[0-1A-Za-z_]{3,50}$/",$data['username'])){
        	return ['valid'=>0,'msg'=>'用户名格式错误'];
        }
        $userinfo=$this->where(['adminuser'=>$data['username']])->select();
        if(!count($userinfo)){
			return ['valid'=>0,'msg'=>'用户名不正确'];
        }
        // dump($data);
        // dump(!password_verify($data['password'],$userinfo[0]['adminpass']));
        // dump(password_verify($data['password'],$userinfo[0]['adminpass']));
        // exit;
		if(!password_verify($data['password'],$userinfo[0]['adminpass']))
		{
			return ['valid'=>0,'msg'=>'密码不正确'];
		}
		
        session('username',$userinfo[0]['adminuser']);
        return ['valid'=>1,'msg'=>'登陆成功'];
    }
}
    