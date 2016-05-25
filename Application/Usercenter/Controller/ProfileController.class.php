<?php
	
	namespace Usercenter\Controller;
	use Think\Controller;
	use Weibo\Api\WeiboApi;
	
	class ProfileController extends Controller{
    private $weiboapi;
	private $error;
	
	public function _initialize()
	{
	    $this->weiboapi=new WeiboApi();
	}
		
		public function profile($uid,$loadcount=1,$lastId=0){
	    	
	    $result=$this->weiboapi->listmyWeibo(array(),$uid,$loadcount,$lastId);
	    $this->assign('list',$result['list']);
     	$this->assign('lastId',$result['lastId']);
		$this->display();	
		}
		
		public function loadmyweibo($map=array(),$uid,$loadcount,$lastid){
			
			
			
		}
		
		public function accept_weibo($content,$type="feed"){
		    $result=$this->weiboapi->sendWeibo($content,$type);
		    $weibo=$this->weiboapi->getWeiboDetail($result['weibo_id']);
		    $result['html'] = R('WeiboDetail/weibo_html', array('weibo' => $weibo['weibo']), 'Widget');
		    $this->ajaxReturn(apiToAjax($result));
	    }
		
		public function upload($uid,$img,$crop=null ){
			if(!$uid){
				$this->error="uid不能为空！";
				return false;
			}
			if(!$image){
				$this->error="图像不能为空！";
				return false;
			}
		}
	}
