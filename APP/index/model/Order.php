<?php
namespace app\index\model;
use think\Model;

class Order extends Model
{
    protected $pk='id';
    protected $table='order';

    public function orderinfo($ddid)
    {
      $res=$this->where(['ddid'=>$ddid])->find();
      return $res;
    }
    public function updateorder($ddid,$ziduan,$value)
    {
        if($this->where(['ddid'=>$ddid])->update([$ziduan=>$value])>0){
        	return 1;
        }
        return 0;
    }
	
    public function insertorder($data)
    {
        $this->insert([
                    'ddid'=>$data['ddid'],
                    'name'=>$data['name'],
                    'price'=>$data['price'],
                    'type'=>$data['type'],
                    'status'=>0,
                    'time'=>$data['time'],
                    'goodid'=>$data['goodid'],
                    'email'=>$data['email'],
                    'count'=>$data['count'],
                    'timestamp'=>$data['timestamp'],
                    'daili'=>$data['daili'],
                    'mid'=>$data['mid'],
                ]);
    }
    public function updatepayno($ddid,$pay_no)
    {
        $this->where(['ddid'=>$ddid])->update(['payno'=>$pay_no]);
    }
    public function apiDown()
    {
    	//daili=0 未下载  1 已下载  2 成功    3失败
    	$res=$this->where(['status'=>1,'goodid'=>0,'daili'=>0])->order('id')->select();
		$data='';
		foreach ($res as $array) {
			if($this->where(['id'=>$array['id']])->update(['daili'=>1,'email'=>'[已下载]'.$array['email']])>0){
				if(empty($data)){
					$data=$array['email'].'----'.$array['id'];
				}else{
					$data=$data.'###'.$array['email'].'----'.$array['id'];
				}
			}
		}
     return $data;
    }
	public function apiUp($id,$result,$error){
		//daili=0 未下载  1 已经下载  2 解封完成 3解封失败	
		$res=$this->where(['id'=>$id])->find();	
		if($result=2){
			$x='[成功]';
		}else{
			$x='[失败：'.$error.']';
		}
		return $this->where(['id'=>$id])->update(['daili'=>$result,'email'=>$x.$res['email']]);
	}
}