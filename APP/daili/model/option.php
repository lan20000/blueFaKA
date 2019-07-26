<?php
namespace app\daili\model;
use think\Model;

class option extends Model
{
    protected $pk='id';
    protected $table='dailioptions';
    public function optionInfo()
    {
        $res=$this->where(['id'=>1])->find();
        return $res;
    }
    
}