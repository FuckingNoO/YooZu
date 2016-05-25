<?php
	
	namespace Usercenter\Widget;
	use Think\Controller;
	
	class WeiboDetailWidget extends Controller
	{
		public function detail($weibo)
		{
			$this->assign('weibo',$weibo);
            $this->display('Widget/detail');
		}
		
		public function weibo_html($weibo)
		{
			$this->assign('weibo',$weibo);
            return $this->fetch("Widget/detail");
		}
	}
