<?php
namespace app\adminxyxyxxy\model;
use think\Model;

class Option extends Model
{
    protected $pk='id';
    protected $table='options';
    public function option($data)
    {
        //dump($data);
        //$data['oldpwd']
        $optioninfo=$this->where(['id'=>1])->select();
        if(!password_verify($data['oldpwd'],$optioninfo[0]['adminpass']))
        {
        	return ['valid'=>0,'msg'=>'原密码输入不正确'];
			
        }else{
            if($data['newpwd']!=$data['newpwd1']){
                return ['valid'=>0,'msg'=>'两次密码输入不一致'];    
            }else{
            	$psw=password_hash($data['newpwd'],PASSWORD_DEFAULT);				
                $this->where(['id'=>1])->update(['adminpass'=>$psw]);
                return ['valid'=>1,'msg'=>'密码修改成功']; 
            }
        }
    }
    public function getinfo()
    {
        $res=$this->where(['id'=>1])->find();
        return $res;
    }
    public function updateinfo($data)
    {
        $res=$this->where(['id'=>1])->update([
            'sitename'=>$data['sitename'],
            'siteurl'=>$data['siteurl'],
            'qq'=>$data['qq'],
            'logoimg'=>$data['logoimg'],
            'alipay'=>$data['alipay'],
            'wxpay'=>$data['wxpay'],
            'qqpay'=>$data['qqpay'],
            'mailon'=>$data['mailon'],
            'emailhost'=>$data['emailhost'],
            'emailport'=>$data['emailport'],
            'emailuser'=>$data['emailuser'],
            'emailpass'=>$data['emailpass'],
            'tongji'=>$data['tongji'],
            'gonggao'=>$data['gonggao'],
            'goodgg'=>$data['goodgg'],
            'indexmode'=>$data['indexmode'],
            'opdl'=>$data['opdl'],
        ]);
        if($res){
            return '1';
        }else{
            return '0';
        }
    }
    public function updatepay($data)
    {
         $res=$this->where(['id'=>1])->update([
            'partner'=>$data['partner'],
            'key'=>$data['key'],
            'mzfid'=>$data['mzfid'],
            'mzftoken'=>$data['mzftoken'],
            'mzfkey'=>$data['mzfkey'],
            'paytype'=>$data['paytype'],
        ]);
        if($res){
            return '1';
        }else{
            return '0';
        }
    }
}