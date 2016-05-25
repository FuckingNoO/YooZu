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
		
		private function iframeReturnf($result){
	        $json = json_encode($result);
            $json = htmlspecialchars($json);
            $html = "<textarea data-type=\"application/json\">$json</textarea>";
            echo $html;
            exit;
		}
	}
