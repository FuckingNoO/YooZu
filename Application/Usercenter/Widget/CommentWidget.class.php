<?php
	
	namespace Usercenter\Widget;
	use Think\Controller;
	
	class CommentWidget extends Controller{
		
		public function comment($comment){
			$weiboid=$comment['id'];
			$this->assign('weiboId',$weiboid);
			$this->display('Widget/comment');
		}
	    //display comment
		public function comment_detail($comment){
//			$commentid=$comment['id'];
//			$content=$comment['content'];
//			$this->assign('commentId',$commentid);
//			$this->assign('content',$content);
            $this->assign('comment',$comment);
			$this->display('Widget/commentdetail');
		}
 		
		//fetch comment html
		public function comment_html($comment){
			
			$this->assign('comment',$comment);
			return $this->fetch('Widget/commentdetail');
		}
	}
