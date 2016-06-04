<?php
	
	namespace Common\Model;
	use Think\Model;
	
	
	class FriendsModel extends Model{
		
		protected $_auto=array(
		
		array('create_time',NOW_TIME,self::MODEL_INSERT),
		array('status',0,self::MODEL_INSERT),
	);
		
		
		
		//添加好友
		public function addfriend($map=array(),$uid,$friendid){
		   if($uid==$friendid){
			return false;
		   }	
			$map=array('uid'=>$uid,'friendid'=>$friendid);
			$info=$this->create($map);
		    if(!$info) return false;
			$id=$this->add($info);
			return $id;
		}
		
		
		//删除好友
		public function deletefriend(){/////////////////////////////////TODO
			
			
			
			
		}
		
}
