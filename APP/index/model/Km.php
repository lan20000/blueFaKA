<?php
namespace app\index\model;
use think\Model;

class Km extends Model
{
    protected $pk='id';
    protected $table='kami';

 public function getKahaoAttr($value)
    {
       if(!$value){
           return '';
       }else{
           return $value;
       }
    }
    
    public function Kminfo($ddid)
    {
    	if(empty($ddid)){
    		return '';
    	}
        $res=$this->where(['ddid'=>$ddid])->select();
		for ($i=0; $i <count($res) ; $i++) { 
			$x=strjm($res[$i]['kahao'], 'D',config('jmkey'));
			if(!empty($x)){
				$res[$i]['kahao']=$x;
			}
		}
        return $res;
    }
    public function kucun_km($goodid)
    {
        $res3=$this->where(['goodid'=>$goodid])->where(['status'=>0])->select();
        return $res3;
    }
    public function kucun_km2($goodid)
    {
        $res3=$this->where(['goodid'=>$goodid,'status'=>0])->count();
        return $res3;
    }	
    public function fahuo($goodid,$num,$data)
    {
        $res3=$this->where(['goodid'=>$goodid])->where(['status'=>0])->order('id')->limit($num)->update(['status'=>$data['status'],'ddid'=>$data['ddid'],'timestamp'=>time(),'time'=>date("Y-m-d H:i:s")]);
        return $res3;
    }	
	
    public function update_km($kmid,$data)
    {
        $this->where(['id'=>$kmid])->update(['status'=>$data['status'],'ddid'=>$data['ddid'],'timestamp'=>time(),'time'=>date("Y-m-d H:i:s")]);
    }
   
    
}