<?php
namespace app\daili\model;
use think\Model;
use think\Db;
class userInfo extends Model
{
    protected $pk='id';
    protected $table='daili';
    public function info($uid)
    {
        $data=$this->where(['id'=>$uid])->find();
        return $data;
    }
    public function loginRecord(){
        if(!empty(session('dailiuid'))){
            $res = Db::table('dailirecord')->where(['usernid'=>session('dailiuid')])->order('createtime desc')->limit(0,1)->select();
        }
        return $res;
    }
}