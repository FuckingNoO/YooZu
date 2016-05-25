<?php
	
	namespace Usercenter\Widget;
	use Think\Controller;
	
	class SupportWidget extends Controller{
		
		public function support($params){
			$this->display('Widget/support');
		}
	}
