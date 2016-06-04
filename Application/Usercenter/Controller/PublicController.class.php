<?php
namespace Usercenter\Controller;
use Think\Controller;
use Weibo\Api\WeiboApi;
use Common\Api\FriendApi;
use Common\Model;
use Think\Hook;

class PublicController extends Controller {
    private $weiboApi;
	
	public function _initialize()
	{
		 $this->friendApi=new FriendApi();
	    $this->weiboApi=new WeiboApi();
	}
	
	public function userfp($uid=0,$lastId=0){
		if($uid=get_uid()){
		//display weibo list
		$result=$this->weiboApi->listAllWeibo(array(),1, $lastId);
		$data=$this->weiboApi->listRecommendations(array(),$uid);
		//display recommendation list
		
	    $this->assign('list',$result['list']);
		$this->assign('rlist',$data['recommendlist']);
     	$this->assign('lastId',$result['lastId']);
		$this->assign("auth",session('user_auth'));
		$this->display();
		}
		else{
		$this->error("404,please log in first!",U('Home/Index/index'));
	}
  }
	
    public function accept_weibo($content,$attach_id='',$type="feed",$map=array()) 
	{
		if($attach_id){
			$picture=M('picture');
			$map['id']=$attach_id;
			$picture->is_temp=0;
			$picture->where($map)->save();
		}
		
		
		$feed_data='';
        $feed_data['attach_id']=$attach_id;
        
		$result=$this->weiboApi->sendWeibo($content,$type,$feed_data);
		$weibo=$this->weiboApi->getWeiboDetail($result['weibo_id']);
		$result['html'] = R('WeiboDetail/weibo_html', array('weibo' => $weibo['weibo']), 'Widget');

		$this->ajaxReturn(apiToAjax($result));
	}
	
	//load weibo
	public function loadweibo($uid = 0, $loadCount = 1, $lastId = 0, $keywords = '')
	{
        if ($uid=get_uid()) {
        	$map=array();
            $result = $this->weiboApi->listAllWeibo($map,$loadCount, $lastId, $keywords);
        }
        if (!$result['list']) {
            $this->error('no more! :(');
        }
		
        $this->assign('list', $result['list']);
        $this->assign('lastId', $result['lastId']);
        $this->display();
	}
	
	//search
	public function search()
	{
		///////////////////TODO
	}
	
	//send weibo comment
	public function dosendComment($weibo_id, $content, $comment_id = 0,$uid=0)
	{
		if($uid=get_uid()){
			$result=$this->weiboApi->sendComment(array(),$uid,$weibo_id,$content,$comment_id);
			$comment=$this->weiboApi->getCommentStructure($result['comment']['id']);
		}	
		$result['html']=R('Comment/comment_html',array('comment'=>$comment),'Widget');
		$this->ajaxReturn(apiToAjax($result));
	}
	
	//loadweibocomment
	public function loadComment($weibo_id,$uid=0){ 
 	    if($uid=get_uid()){
 	        $result=$this->weiboApi->listWeiboComments($weibo_id,array());
			$this->assign('comment_list',$result['list']);
            $this->display();
 	    }
    }
	
	//验证是否可以删除微博
	public function dodeleteWeibo($weiboid)
	{
		$weibo=$this->weiboApi->getWeiboDetail($weiboid);
	    $result=$this->weiboApi->deleteWeibo($weibo['weibo']);
	    $this->ajaxReturn(apiToAjax($result));
	}
	
	//验证是否可以删除评论
	public function dodeleteComment($commentid){
	
      //	$this->weiboApi->  ;/////////////////////TODO
	}
	
	public function dosupport($weiboid,$uid=0){
		$uid=get_uid();
        $data=array('row'=>$weiboid,'uid'=>$uid);
		if(D('Weibo/Support')->where($data)->count()){
			$result=array('status'=>0,'info'=>"您已经赞过!");
			$this->ajaxReturn($result);
			}else{
		    $result=$this->weiboApi->supportweibo($weiboid,$uid);
		    $this->ajaxReturn(apiToAjax($result));
	    }
	}
	
	public function uploadImage(){
		$model=M('picture');
		$config=C('PICTURE_UPLOAD');
		$upload = new \Think\Upload($config);// 实例化上传类
        $info = $upload->upload();
		if($info){
			foreach ($info as $key => &$value){
                $data=array('path'=>'Uploads/Picture/'.$value['savepath'].$value['savename'],'uid'=>get_uid(),'create_time'=>NOW_TIME,'status'=>1,'is_temp'=>1);
			}
			if($imgid=$model->add($data)){
			    $result=array('success'=>1,'message'=>'成功!','image'=>getRootUrl().$data['path'],'id'=>$imgid);
				$this->iframeReturnf($result);
			}
			$this->error($model->getError());
		}
		$this->error();
	}
	
	private function iframeReturnf($result){
	        $json = json_encode($result);
            $json = htmlspecialchars($json);
            $html = "<textarea data-type=\"application/json\">$json</textarea>";
            echo $html;
            exit;
		}
	
	//从前端穿来的显示用户信息卡的请求
	public function profilecard($weibo){
		
		$result=$this->weiboApi->getWeiboDetail($weibo);
		
		$this->assign('pw',$result['weibo']);
	    
		$this->display();
	}
	
	//从前端传来添加好友请求
	public function doaddFriendRequest($friendid,$uid){
		
		$info=$this->friendApi->isSendFriendRequestRepeatly(array('uid'=>$uid,'friendid'=>$friendid));
		if(!$info){
			$info=array('success'=>0,'message'=>'您已经发送过请求！');
			$this->ajaxReturn(apiToAjax($info));
		}
		
		    $result = $this->friendApi->addfriend(array(),$uid,$friendid);
		    $this->ajaxReturn(apiToAjax($result));
	
	}
	
	
	
}


 