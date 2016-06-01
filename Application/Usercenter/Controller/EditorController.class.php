<?php
	
	namespace Usercenter\Controller;
	use Think\Controller;
	
	class EditorController extends BaseController{
		
		public function usereditor(){
			
		$this->display();		
		}
		
		public function doUploadAvatar(){
            $result=callApi('User/uploadTempAvatar');
			$this->ensureApiSuccess($result);
		    $this->iframeReturnf($result);
		}
		
		public function doCropAvatar($crop){
			$result=callApi('User/applyAvatar',array($crop));
			$this->ensureApiSuccess($result);
			
			//消除微博的缓存,显示新的头像
			$map=array('uid'=>get_uid(),'status'=>1);
			
			$list=D('Weibo/Weibo')->where($map)->order('create_time desc')->select();
			foreach($list as $value){
				S('weibo_'.$value['id'],null);
			}
            $this->success($result['message'], U('Usercenter/Editor/usereditor', array('tab' => 'avatar')));
		}
		
		private function iframeReturnf($result){
	        $json = json_encode($result);
            $json = htmlspecialchars($json);
            $html = "<textarea data-type=\"application/json\">$json</textarea>";
            echo $html;
            exit;
		}
	}
