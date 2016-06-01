<?php
	
    namespace Usercenter\Widget;
	use Think\Controller;
	
	class GoodDetailWidget extends Controller{
		
		
		public function detail($good){
			$this->assign('good',$good);
			$this->display('Widget/gooddetail');
		}
		
		public function goodhtml($good){
		    $this->assign('good',$good);
			return $this->fetch('Widget/gooddetail');
		}
		
	}
