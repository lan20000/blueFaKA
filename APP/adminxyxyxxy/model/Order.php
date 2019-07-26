<?php
namespace app\adminxyxyxxy\model;
use think\Model;

class Order extends Model
{
    protected $pk='id';
    protected $table='order';
    public function getStatusAttr($value)
    {
        $status = [1=>'<svg class="icon" aria-hidden="true">
                       <use xlink:href="#icon-yifukuan"></use>
                       </svg>',
                   0=>'<svg class="icon" aria-hidden="true">
                       <use xlink:href="#icon-chaoshiweifukuan"></use>
                       </svg>'];
        return $status[$value];
    }
    public function getTypeAttr($value)
    {
       if($value=='alipay'){
           return  '<svg class="icon" aria-hidden="true">
                    <use xlink:href="#icon-zhifubao"></use>
                    </svg>';
       }else if($value=='qqpay'){
        return  '<svg class="icon" aria-hidden="true">
                 <use xlink:href="#icon-QQqianbaozhifu"></use>
                 </svg>';
       }else if($value=='wxpay'){
        return  '<svg class="icon" aria-hidden="true">
                 <use xlink:href="#icon-weixinzhifu"></use>
                 </svg>';
       }else if($value=='daili'){
         return  '<svg class="icon" aria-hidden="true">
                 <use xlink:href="#icon-dailishang"></use>
                 </svg>';
       }
    }
    public function getKahaoAttr($value)
    {
       if($value==null){
           return '无';
       }else{
           return $value;
       }
    }
    public function getMimaAttr($value)
    {
       if($value==null){
           return '无';
       }else{
        return $value;
        }
    }
    public function ordata($page,$limit,$keyword)
    {
        if($keyword!=''){
        	$resorder = $this->where(['ddid'=>$keyword,'status'=>1])->order('id desc')->page($page,$limit)->select();
			if(count($resorder)>0){
				return $resorder;
			}
            $resorder = $this->where(['email'=>$keyword,'status'=>1])->order('id desc')->page($page,$limit)->select();
        }else{
            $resorder = $this->where(['status'=>1])->order('id desc')->page($page,$limit)->select();
        }
        
        return $resorder;
    }
    public function ordercount($keyword)
    {
        if($keyword!=''){
            $res=$this->where(['ddid'=>$keyword,'status'=>1])->count();
			if($res>0){
				return $res;
			}			
			$res=$this->where(['email'=>$keyword,'status'=>1])->count();
        }else{
             $res=$this->count();
        }
        return $res;
    }
    public function cleardata($oper)
    {
        if($oper=='wfk'){
            $order_tatal=$this->where(['status'=>0])->select();
            foreach ($order_tatal as $val) {
                $b = substr($val['time'],0,10);
                $c = date('Y-m-d');
                if($b!=$c){
                    $clearwfk=$this->where(['ddid'=>$val['ddid']])->delete();
                }
            }
            return '删除完成';
        }
    }
    public function deleteorder($oper,$date1,$date2)
    {
        if($oper=='wfk'){
        	$date1=strtotime($date1.' 00:00:00');
            $date2=strtotime($date2.' 23:59:59');
            $num=$this->where("timestamp>=$date1 and timestamp<=$date2")->delete();                        
            return "删除成功个{$num}订单";
        }
    }    
    public function getorderinfo()
    {
        $res=$this->select();
        return $res;
    }
    public function findorder($ddid)
    {
        $res=$this->where(['ddid'=>$ddid])->find();
        return $res;
    }
}