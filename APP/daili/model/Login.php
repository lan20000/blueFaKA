<?php
namespace app\daili\model;
use think\Model;
use think\Request;
use think\Loader;
use Org\Net\IpLocation;
use think\Db;
class Login extends Model
{
    protected $pk='id';
    protected $table='daili';
    public function islock(){
        
    }
    public function login($data)
    {
        $res=$this->where(['username'=>$data['dailiname']])->find();
        
        if(!count($res)){
            return ['valid'=>0,'msg'=>'安全验证失败，用户名错误或者不存在'];
        }
        if(!md5(md5($data['dailipass']))===$res['password'])
        {
            return ['valid'=>0,'msg'=>'安全验证失败，密码错误'];
        }
        $this->IPsava($res['id']);
        session('dailiname',$res['username']);
        session('dailiuid',$res['id']);
        return ['valid'=>1,'msg'=>'登陆成功'];
    }
    protected function IPsava($ids){
        if(empty($ids)){
            return;
        }
        $url='http://whois.pconline.com.cn/ip.jsp';
        $html = file_get_contents($url); 
        $html = iconv("gb2312", "utf-8//IGNORE",$html);
        if(!empty($html))
        {
            $data = ['usernid' => $ids, 'ip' => $html, 'createtime' =>  date('Y-m-d h:i:s', time())];
            Db::table('dailirecord')->insert($data);
        }
    }
}
