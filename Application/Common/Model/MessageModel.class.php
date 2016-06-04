<?php
	
	
	namespace use Common\Model;
	use Think\Model;
	
	class MessageModel extends Model{
		
		protected $_auto=array(
		array('create_time',NOW_TIME,self::),
		array('status',1,self::),
		);
		
		
		
		//获取信息中心中的未读消息
	    public function getUserMessage(){
	    	
			
			
			
			
	    }
		
		
		//根据type来发送消息到信息中心
		public function sendMessageByType(){
			
			
			
		}
		
		
	}
