<?php
namespace app\daili\model;
use think\Model;

class Order extends Model
{
    protected $pk = 'id';
    protected $table='order';
    /**
     * 订单列表
     */
    public function orderList($memberid,$page,$limit){
        $odcount=$this->dailicount($memberid);
        if(!empty($odcount)){
            $res=$this->where(['mid'=>$memberid])->page($page,$limit)->select();
            $data=['code'=>0,'msg'=>'','count'=>$odcount,'data'=>[]];
            foreach ($res as $value) {
                if($value['type']=='alipay'){
                    $value['type']='<svg class="icon" aria-hidden="true">
                            <use xlink:href="#icon-zhifubao"></use>
                            </svg>';
                }else if($value['type']=='qqpay'){
                    $value['type']='<svg class="icon" aria-hidden="true">
                        <use xlink:href="#icon-QQqianbaozhifu"></use>
                        </svg>';
                }else if($value['type']=='wxpay'){
                    $value['type']='<svg class="icon" aria-hidden="true">
                        <use xlink:href="#icon-weixinzhifu"></use>
                        </svg>';
                }else if($value['type']=='daili'){
                    $value['type']='<svg class="icon" aria-hidden="true">
                        <use xlink:href="#icon-dailishang"></use>
                        </svg>';
                }
                if ($value['status']==0) {
                    $value['status'] = '未支付';
                }else if($value['status']==1){
                    $value['status'] = '支付完成';
                }
                $data['data'][]=[
                    'daili_orderId'=>$value['ddid'],
                    'daili_createTime'=>$value['time'],
                    'daili_goodsPrice'=>$value['price'],
                    'daili_goodsNname'=>$value['name'],
                    'daili_pay'=>$value['type'],
                    'daili_member'=>$value['member'],
                    'daili_count'=>$value['count'],
                    'status'=>$value['status']
                ];
            };
            return $data;
        }else{
           return $res=['code'=>0,'msg'=>'','count'=>0,'data'=>[]];
        }        
    }
    public function dailicount($uids)
    {
        if(empty(session('dailiuid'))){
            return null;
        }
        $res=$this->where(['mid'=>$uids])->count();
        return $res;
    }
}
