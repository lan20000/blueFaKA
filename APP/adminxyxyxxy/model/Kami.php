<?php
namespace app\adminxyxyxxy\model;
use think\Model;

class Kami extends Model
{
    protected $pk='id';
    protected $table='kami';

    public function getStatusAttr($value)
    {
        $status = [1=>'<span class="layui-badge">已售出</span>',0=>'<span class="layui-badge layui-bg-green">库存中</span>'];
        return $status[$value];
    }
    public function kamicount($id,$status)
    {
         if($id==''&&$status==''){
            $res=$this->select();
        }else{
            if($status=='2'){
                if($id=='all'){
                    $res=$this->select();
                }else{
                    $res=$this->where(['goodid'=>$id])->select();
                }
            }elseif ($status=='0') {
                if($id=='all'){
                    $res=$this->where(['status'=>0])->select();
                }else{
                    $res=$this->where(['goodid'=>$id])->where(['status'=>0])->select();
                }
                
            }else{
                if($id=='all'){
                    $res=$this->where(['status'=>1])->select();
                }else{
                    $res=$this->where(['goodid'=>$id])->where(['status'=>1])->select();
                }
                 
            }
            
        }
        return count($res);
    }
    public function kami($page,$limit,$id,$status)
    {   
        if($id==''&&$status==''){
            $res=$this->page($page,$limit)->select();
        }else{
            if($status=='2'){
                if($id=='all'){
                    $res=$this->page($page,$limit)->select();
                }else{
                     $res=$this->where(['goodid'=>$id])->page($page,$limit)->select();
                }
              
            }elseif ($status=='0') {
                if($id=='all'){
                     $res=$this->where(['status'=>0])->page($page,$limit)->select();
                }else{
                     $res=$this->where(['goodid'=>$id])->where(['status'=>0])->page($page,$limit)->select();
                }
               
            }else{
                if($id=='all'){
                     $res=$this->where(['status'=>1])->page($page,$limit)->select();
                }else{
                     $res=$this->where(['goodid'=>$id])->where(['status'=>1])->page($page,$limit)->select();
                }
                
            }
            
        } 
		for ($i=0; $i <count($res) ; $i++) { 
			$x=strjm($res[$i]['kahao'], 'D',config('jmkey'));
			if(!empty($x)){
				$res[$i]['kahao']=$x;
			}
		}  
        return $res;
    }
    public function addkami($data)
    {
            $data['km']=explode("\r\n",$data['km']);
			
            for($j=0;$j<count($data['km']);$j++){
            	$data['km'][$j]=trim($data['km'][$j]);
            	if(!empty($data['km'][$j]))
            	{
                     $res=$this->insert([
                        'goodid'=>$data['goodid'],
                        'kahao'=>strjm($data['km'][$j], 'E',config('jmkey')),
                        'status'=>0,
                    ]);             		
            	}           	                
            }
            return ['valid'=>1,'msg'=>'添加成功'];
    }
    public function delkami($id)
    {
        $res=$this->where(['id'=>$id])->delete();
        if($res){
            return '0';
        }else{
            return '1';
        }
        
    }
    public function deleteKami($date1,$date2)
    {
    	$date1=strtotime($date1.' 00:00:00');
    	$date2=strtotime($date2.' 23:59:59');
    	$num=$this->where("timestamp>$date1 and timestamp<$date2")->delete();
    	return "成功删除{$num}个";
    }
    public function dckami($goods,$num)
    {
    	 $res=$this->where(['goodid'=>$goods,'status'=>0])->order('id')->limit($num)->select();
    	 $array=[];
    	 $time=time();
    	 foreach($res as $val)
    	 {
    	 	if($this->where("id={$val['id']}")->update(['status'=>1,'mima'=>'手工导出','timestamp'=>$time])>0)
    	 	{
    	 		$x=strjm($val['kahao'], 'D',config('jmkey'));
    	 		if(empty($x)){
    	 			$x=$val['kahao'];
    	 		}
    	 		$array[]=$x;
    	 	}    	 	    	 	
    	 }
    	 return join('<br/>',$array);
    }
    public function querykami($timestamp)
    {
    	$res=$this->where(['timestamp'=>$timestamp,'mima'=>'手工导出'])->select();
    	 foreach($res as $val)
    	 {
    	 	$x=strjm($val['kahao'], 'D',config('jmkey'));
    	 	if(empty($x)){
    	 		$x=$val['kahao'];
    	 	}
    	 	$array[]=$x;   	 	   	 	    	 	
    	 }
    	 return join('<br/>',$array);    	
    }    
    public function delsold($id)
    {
        $res=$this->where(['goodid'=>$id])->where(['status'=>1])->delete();
        if($res){
            return '已清空';
        }else{
            return '清空失败';
        }
    }
    public function delkm($id)
    {
        $res=$this->where(['goodid'=>$id])->delete();
        if($res){
            return '1';
        }else{
            return '2';
        }
    }
    public function pldelekm($data)//批量删除卡密
    {
        foreach($data as $val){
            $this->where(['id'=>$val['id']])->delete();
        }
        return '1';
    }
    public function getkckm()
    {
        $res=$this->where(['status'=>0])->select();
		for ($i=0; $i <count($res) ; $i++) { 
			$x=strjm($res[$i]['kahao'], 'D',config('jmkey'));
			if(!empty($x)){
				$res[$i]['kahao']=$x;
			}
		}		
        return $res;
    }
    public function kmtatal($id)
    {
        $res=$this->where(['goodid'=>$id])->select();
		for ($i=0; $i <count($res) ; $i++) { 
			$x=strjm($res[$i]['kahao'], 'D',config('jmkey'));
			if(!empty($x)){
				$res[$i]['kahao']=$x;
			}
		}		
        return $res;
    }
    public function kmnum($id)
    {
        $res=$this->where(['goodid'=>$id,'status'=>0])->count();		
        return $res;
    }	
	
    public function find_km($id)
    {
        $res=$this->where(['goodid'=>$id])->find();
        $res['kahao']=strjm($res['kahao'], 'D',config('jmkey'));		
        return $res;
    }
    public function find_km_id($id)
    {
        $res=$this->where(['id'=>$id])->find();
		$res['kahao']=strjm($res['kahao'], 'D',config('jmkey'));		 
         return $res;
    }

}