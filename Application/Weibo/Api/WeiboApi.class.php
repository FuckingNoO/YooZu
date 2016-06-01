<?php

	namespace Weibo\Api;
	use Common\Api\Api;
	use Common\Exception\ApiException;
	use Think\Hook;
	
	class WeiboApi extends Api
	{
		private $weiboModel;   
		private $weibocommentModel;
		private $supportModel;
		
		public function __construct()
		{
			$this->weiboModel=D('Weibo/Weibo');
			$this->weibocommentModel=D('Weibo/WeiboComment');
			$this->supportModel=D('Weibo/Support');
		}
		
       //list all weibo
       public function listAllWeibo($map = array(), $loadCount = 1, $lastId = 0, $keywords = '')
	   {
        $map['status']=1;
		$model=$this->weiboModel;
		$list=$model->field('id')->where($map)->order('create_time desc')->limit(10)->select();
		
		if($loadCount >1&&$loadCount<=4){
			$map['_string']='id<'.$lastId.'';
	       $list=$model->field('id')->where($map)->order('create_time desc')->limit(10)->select();
		}elseif($loadCount>4){
			return $this->apiError('没有更多的!');
		}
		//get weibo structure
        foreach ($list as &$e) {
            $e = $this->getWeiboStructure($e['id']);
        }
        unset($e);
        //return weibo list
        return $this->apiSuccess('获取成功', array('list' => arrayval($list), 'lastId' => $list[count($list)-1]['id']));
	   }
		
		//我的主页是需要加载自己的微博
		public function listmyWeibo($map=array(),$uid,$loadcount=1,$lastId=0){
			$map['uid']=$uid;
			$map['status']= 1;
			$model=$this->weiboModel;
		    $list=$model->field('id')->where($map)->order('create_time desc')->limit(10)->select();
			if($loadcount>1){
			$map['_string']='id<'.$lastId.'';
	        $list=$model->field('id')->where($map)->order('create_time desc')->limit(10)->select();
			}
			foreach($list as &$e){
				$e=$this->getWeiboStructure($e['id']);
			}
			unset($e);
			return $this->apiSuccess('获取成功', array('list' => arrayval($list), 'lastId' => $list[count($list)-1]['id']));
		}
		
		public function listRecommendations($map=array(),$uid){
		    $map['status']= 1;
      		$map['_string']='uid!='.$uid.'';
			$model=$this->weiboModel;
			$list=$model->field('id')->where($map)->order('support_count desc')->limit(5)->select();
			foreach($list as &$e){
				$e=$this->getWeiboStructure($e['id']);
			}
			unset($e);
			$message="获取成功";
			return $this->apiSuccess($message,array('recommendlist'=>arrayval($list)));
		}
		
		public function sendWeibo($content, $type = 'feed', $feed_data = '', $from = '')
		{
			$this->requireLogin();
			$this->requireSendInterval();
			
			if($feed_data['attach_id']){
			    $type="image";	
			}
			//write into database
			$weibo_id=$this->weiboModel->addWeibo(get_uid(),$content,$type,$feed_data,$from);
			if(!$weibo_id){
				throw new ApiException("failed send".$this->weiboModel->getError());
			}
			//send successfully
			$this->updateLastSendTime();
			$message='post successfully!';
			return $this->apiSuccess($message, array('weibo_id' => $weibo_id,'detail'=>$this->getWeiboDetail($weibo_id)));
    }
		
		public function listWeiboComments($weibo_id,$map=array()){
			$list=$this->weibocommentModel->where(array('weibo_id'=>$weibo_id,'status'=>1))->order('create_time desc')->select();
			foreach($list as &$e){
				$e=$this->getCommentStructure($e['id']);
			}
			unset($e);
			return $this->apiSuccess("load successfully!",array('list'=>arrayval($list)));
		}
	
		public function deleteWeibo($weibo)
		{
			if(!$this->canDeleteWeibo($weibo))
			throw new ApiException("您没有权限删除该微博!");
			else{
				$map=array('id'=>$weibo['id'],'uid'=>$weibo['uid']);
				if($this->weiboModel->deleteWeibo($map)){
					S('weibo_'.$weibo['id'],null);
					$data['row']=$weibo['id'];
					$this->supportModel->where($data)->delete();
					return $this->apiSuccess("删除微博成功！",array());
				}
				throw new ApiException("删除微博失败!".$this->weiboModel->getError());
           }
		}
		
		public function sendComment($map=array(), $uid, $weibo_id, $content, $comment_id = 0)
		{
			$map['status']=1;
			$model=$this->weibocommentModel;
			$commentid=$model->addComment($uid, $weibo_id, $content, $comment_id);
			$comment=$this->getCommentStructure($commentid);
			if(empty($comment)){
			    throw new ApiException('failed send! ',$this->weibocommentModel->getError());
			}else{
				$message='successfully! :D';
				return $this->apiSuccess($message,array('comment'=>$comment));
			}
		}
		//support weibo
		public function supportweibo($weiboid,$uid){
			
			$result=$this->supportModel->addsupport($weiboid,$uid);
			if(!$result)
			throw new ApiException('failel support!',$this->supportModel->getError());
			elseif(count($result)>1){
				$message="您已经赞过!";
				return $this->apiError($message);
			}
			else return $this->apiSuccess('成功！',array());	
		}
		
		public function deleteComment()
		{
			
			
			
		}
		
		//获取微博的架构
	   public function getWeiboStructure($id)
	{
		$weibo=S('weibo_'.$id);
		if(Empty($weibo)){
			$weibo=$this->weiboModel->find($id);
			
			$weibo_data = unserialize($weibo['data']);
			$fetchContent="<p class='word-wrap' style='font-size: 30px;font-weight: 500'>".parse_weibo_content($weibo['content'])."</p>";
			$weibo = array(
                'id' => intval($weibo['id']),
                'content' => strval($weibo['content']),
                'create_time' => intval($weibo['create_time']),
                'type' => $weibo['type'],
                'data'=>unserialize($weibo['data']),
                'weibo_data' => $weibo_data,
                'comment_count' => intval($weibo['comment_count']),
                'repost_count' => intval($weibo['repost_count']),
                'support_count'=>intval($weibo['support_count']),
                'can_delete' => 0,
                'is_attachimg'=>0,
                'imgurl'=>getWeiboattachimg($weibo_data['attach_id']),
                'user' => $this->getUserStructure($weibo['uid']),
                'is_top' => $weibo['is_top'],
                'uid' => $weibo['uid'],
                'fetchContent' => $fetchContent,
                'from' => $weibo['from']
            );
			S('weibo_' . $id, $weibo);
		}
		$weibo['can_delete']=$this->canDeleteWeibo($weibo);
		if($weibo_data['attach_id']){
			 $weibo['is_attachimg']=1;
		}
        return $weibo;
	}
		//获取评论架构
	    public  function getCommentStructure($id)
    {
        $comment = $this->weibocommentModel->find($id);
        $canDelete = $this->canDeleteComment($id);
        return array(
            'id' => intval($comment['id']),
            'content' => strval($comment['content']),
            'create_time' => intval($comment['create_time']),
            'can_delete' => boolval($canDelete),
//          'user' => $this->getUserStructure($comment['uid']),
        );
    }

    public function getWeiboDetail($id)
	{
		$this->requireWeiboExist($id);
		$weibo=$this->getWeiboStructure($id);
		return $this->apiSuccess("acquire :D!",array('weibo'=>$weibo));
	} 
    	

		
		//需要微博存在
	    private function requireWeiboExist($id)
        {
            $weibo = $this->weiboModel->where(array('id' => $id, 'status' => 1))->find();
            if (!$weibo) {
            throw new ApiException('微博不存在');
            }
        }
		
		private function canDeleteWeibo($weibo)
    {
        //如果是管理员，则可以删除微博
//      if (is_administrator(get_uid()) || check_auth('deleteWeibo')) {
//          return true;
//      }

        //如果是自己发送的微博，可以删除微博
        if ($weibo['uid'] == get_uid()){
            return true;
        }

        //返回，不能删除微博
		else return false;
    }
	
	//是否有权限删除评论
	private function canDeleteComment($comment_id)
    {
        //如果是管理员，则可以删除
        if (is_administrator(get_uid())) {
            return true;
        }

        //如果评论是自己发送的，则可以删除微博
        $comment = $this->weibocommentModel->find($comment_id);
        if ($comment['uid'] == get_uid()) {
            return true;
        }

        //其他情况不能删除微博
        return false;
    }
}

