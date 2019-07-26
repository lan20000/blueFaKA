<?php
namespace app\index\model;
use think\Model;
use think\Session;

class yuepay extends Model
{
    protected $pk='id';
    protected $table='daili';
    /***
     * 查询余额
     */
    public function inquirebalance($data)
    {
      if(!empty(Session::get('dailiname'))&&!empty(Session::get('dailiuid')))
       {
         $res=$this->where(['id'=>Session::get('dailiuid')])->find();
       }else{
         $this->error('安全验证失效，请登录');exit;
       }
       return $res;
    }
    /**
     * $data->uids,deductmoney
     */
    public function insertbalance($data)
    {
       $res=$this->where(['id'=>Session::get('dailiuid')])->update(['money'=>$data]);
       return $goodinfo;
    }
}