<?php
namespace app\index\model;
use think\Model;

class Item extends Model
{
    protected $pk='id';
	protected $table='goods';
    public function item($abridge)
    {
       $goodinfo=$this->where(['abridge'=>$abridge])->where(['status'=>0])->order('sort asc')->select();
       return $goodinfo;
    }
    public function itemall()
    {
        $goodinfo=$this->where(['status'=>0])->order('sort asc')->select();
       return $goodinfo;
    }
    public function getgoodinfo($id)
    {
        $res=$this->where(['id'=>$id])->find();
        return $res;
    }
	
     public function update_sales($goodid,$sales)//销量增加
    {
        $res=$this->where(['id'=>$goodid])->find();
        $res2=$this->where(['id'=>$goodid])->update(['sales'=>$sales+$res['sales']]);
    }
}