<?php
	
	namespace Lease\Model;
    use Think\Model;
	
	class GoodsModel extends Model{
	   
	   protected $_validate=array();////////////////////////////////////////TODO
	    
	
	    protected $_auto=array(
		array('create_time',NOW_TIME,self::MODEL_INSERT),
		array('status', '1', self::MODEL_INSERT),
		);
		
		
		public function addgood($uid,$content,$type,$good_data){
			
			$data=array('uid'=>$uid,'expandinfo'=>$content,'type'=>$type,'data'=>serialize($good_data));
			$data=$this->create($data);
			if(!$data) return false;
			$goodid=$this->add($data);
			return $goodid;
		}
		
		public function deletegoods(){
			
			
			
		}
	
	}
