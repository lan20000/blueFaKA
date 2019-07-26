<?php
namespace app\adminxyxyxxy\model;
use think\Model;

class Goods extends Model
{
    protected $pk='id';
    protected $table='goods';
    public function getStatusAttr($value)
    {
         $status = [0=>'出售中',1=>'已下架'];
         return $status[$value];
    }
    public function goods($page,$limit,$keyword)
    {
        if($keyword!=''){
             $res=$this->where('name','like','%'.$keyword.'%')->page($page,$limit)->select();
        }else{
             $res=$this->page($page,$limit)->select();
        }
       
        return $res;
    }
    public function goodcount($keyword)
    {
        if($keyword!=''){
             $res=$this->where('name','like','%'.$keyword.'%')->count();
        }else{
             $res=$this->count();
        }
       
        return $res;
    }
    public function addgood($data)
    {
        if(floatval($data['price'])!=0){
            if($data['image']==''){
                $data['image']="__STATIC__/images/noimg.jpg";
            }
			$data['xiangou']=(int)$data['xiangou'];
			if($data['xiangou']<0){
				$data['xiangou']=0;
			}
			$data['xiangoumin']=(int)$data['xiangoumin'];
			if($data['xiangoumin']<0){
				$data['xiangoumin']=0;
			}			
            $res=$this->insert([
                'name'=>$data['name'],
                'abridge'=>$data['abridge'],
                'price'=>$data['price'],
                'dailiprice'=>$data['dailiprice'],
                'images'=>$data['image'],
                'sort'=>$data['sort'],
                'Introduction'=>$data['Introduction'],
                'status'=>$data['status'],
                'xiangou'=>$data['xiangou'],
                'xiangoumin'=>$data['xiangoumin'],
                'actnum'=>$data['actnum'],
                'actprice'=>$data['actprice'],
                'actnum2'=>$data['actnum2'],
                'actprice2'=>$data['actprice2'],                
                'actnum3'=>$data['actnum3'],
                'actprice3'=>$data['actprice3'],	
                'actnum4'=>$data['actnum4'],
                'actprice4'=>$data['actprice4'],                			
            ]);
            if($res){
                return ['valid'=>1,'msg'=>'添加成功'];
            }else{
                return ['valid'=>0,'msg'=>'添加失败'];
            }
        }else{
            return ['valid'=>0,'msg'=>'价格设置不正确'];
        }
     
        
    }
    public function delgood($id)
    {
        $res=$this->where(['id'=>$id])->delete();
        if($res){
            return '1';
        }else{
            return '2';
        }
    }
    public function editgood($id)
    {
        $res=$this->where(['id'=>$id])->find();
        return $res;
    }
    public function posteditgood($data)
    {
        $data['xiangou']=(int)$data['xiangou'];
		if($data['xiangou']<0){
			$data['xiangou']=0;
		}
        $data['xiangoumin']=(int)$data['xiangoumin'];
		if($data['xiangoumin']<0){
			$data['xiangoumin']=0;
		}		
        $res=$this->where(['id'=>$data['id']])->update([
            'name'=>$data['name'],
            'abridge'=>$data['abridge'],
            'images'=>$data['image'],
            'dailiprice'=>$data['dailiprice'],
            'price'=>$data['price'],
            'sort'=>$data['sort'],
            'Introduction'=>$data['Introduction'],
            'status'=>$data['status'],
            'xiangou'=>$data['xiangou'],
            'xiangoumin'=>$data['xiangoumin'],
             'actnum'=>$data['actnum'],
             'actprice'=>$data['actprice'],  
                'actnum2'=>$data['actnum2'],
                'actprice2'=>$data['actprice2'],                
                'actnum3'=>$data['actnum3'],
                'actprice3'=>$data['actprice3'],	 
                'actnum4'=>$data['actnum4'],
                'actprice4'=>$data['actprice4'],                                      
            ]);
        if($res){
            return ['valid'=>1,'msg'=>'修改成功'];
        }else{
            return ['valid'=>0,'msg'=>'修改失败'];
        }
    }
    public function getgoods()
    {
        $res=$this->select();
        return $res;
    }
    public function delcat_good($abridge)
    {
        $res=$this->where(['abridge'=>$abridge])->find();
        return $res;
    }
    public function find_good($id)
    {
        $res=$this->where(['id'=>$id])->find();
        return $res;
    }
}