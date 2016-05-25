<?php
	
	namespace Usercenter\Widget;
	use Think\Controller;
	
	class RepostWidget extends Controller{
		
		public function repost($params){
			
			$this->assign();
			$this->display('Widget/repost');
		}
	}