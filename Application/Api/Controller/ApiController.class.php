<?php
	
	namespace Api\Controller;
	use Think\Controller;
	use User\Api\UserApi;
	use Addons\Avatar\AvatarAddon;
	use Api\Exception\ReturnException; 
	
	require_once(dirname(__FILE__).'/../Common/function.php');
	
	class ApiController extends Controller{
		protected $api;
		protected $isinternalCall;
		
		public function _initialize(){
			
			
			//定义Api
			$this->api= new UserApi();
			$this->isinternalCall=false;
		}
		
		public function setInternalCallApi($value=true) {
        $this->isInternalCall = $value ? true : false;
        }
		
		//找不到接口是调用的方法
		public function _empty() {
        $this->apiError(404, "找不到该接口");
        }
		
		protected function apiReturn($success, $error_code=0, $message=null, $redirect=null, $extra=null) {
        //生成返回信息
        $result = array();
        $result['success'] = $success;
        $result['error_code'] = $error_code;
        if($message !== null) {
            $result['message'] = $message;
        }
        if($redirect !== null) {
            $result['redirect'] = $redirect;
        }
        foreach($extra as $key=>$value) {
            $result[$key] = $value;
        }
        //将返回信息进行编码
        $format = $_REQUEST['format'] ? $_REQUEST['format'] : 'json';//返回值格式，默认json
        if($this->isInternalCall) {
            throw new ReturnException($result);
        } else if($format == 'json') {
            echo json_encode($result);
            exit;
        } else if($format == 'xml') {
            echo xml_encode($result);
            exit;
        } else {
            $_GET['format'] = 'json';
            $_REQUEST['format'] = 'json';
            return $this->apiError(400, "format参数错误");
        }
    }
    //成功是返回成功信息
    protected function apiSuccess($message, $redirect=null, $extra=null) {
        return $this->apiReturn(true, 0, $message, $redirect, $extra);
    }

    //失败时返回失败信息
    protected function apiError($error_code, $message, $redirect=null, $extra=null) {
        return $this->apiReturn(false, $error_code, $message, $redirect, $extra);
    }
	
	//返回当前用户UID
	protected function getUid(){
		return is_login();
	}
	
	//需要用户登录
	protected function requireLogin() {
        $uid = $this->getUid();
        if(!$uid) {
            $this->apiError(401,"需要登录");
        } 
    }
	
	
}
