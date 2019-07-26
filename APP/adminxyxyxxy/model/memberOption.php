<?php
namespace app\adminxyxyxxy\model;
use think\Model;

class memberOption extends Model
{
    protected $pk='id';
    protected $table='dailioptions';
    public function optionInfo()
    {
        $res=$this->where(['id'=>1])->find();
        return $res;
    }
    public function updatembOption($data)
    {
        $res=$this->where(['id'=>1])->update([
            'affiche'=>$data['info'],
            'popup'=>$data['info1'],
        ]);
        if($res){
            return '1';
        }else{
            return '0';
        }
    }
}