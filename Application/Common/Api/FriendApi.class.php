<?php
	
	namespace Common\Api;
	use Common\Model;
	
	
	class FriendApi extends Api{
		
		private $friendModel;
		
		//
		public function __construct(){
			$this->friendModel=D('Friends');
		}
		
		public function isSendFriendRequestRepeatly($map=array()){
			
			if($this->friendModel->where($map)->count()>0){
				return false;
			}
			return true;
		}
		
		
		public function addfriend($map=array(),$uid,$friendid){
			
			$result=$this->friendModel->addfriend(array(),$uid,$friendid);
			
			if(!$result) return $this->apiReturn(0, $this->friendModel->getError(), array());
			
			return $this->apiSuccess('好友请求请求已经发送！',array());
		}
		
		//删除好友
		public function deletefriend(){
			
			return $this->friendModel->deletefriend();
			
		}
		
		
	}
