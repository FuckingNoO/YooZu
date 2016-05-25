<?php
	
	namespace Weibo\Model;
	use Think\Model;
	
	class WeiboCommentModel extends Model
	{
		protected $_validate=array(
		array('content', '1,99999', '内容不能为空', self::EXISTS_VALIDATE, 'length'),
        array('content', '0,500', '内容太长', self::EXISTS_VALIDATE, 'length'),
		);
		
		protected $_auto=array( 
		array('create_time', NOW_TIME, self::MODEL_INSERT),
        array('status', '1', self::MODEL_INSERT),
		);
		
//		add comments
		public function addComment($uid, $weibo_id, $content, $comment_id = 0)
		{
			// datas add to database
            $data = array('uid' => $uid, 'content' => $content, 'weibo_id' => $weibo_id, 'comment_id' => $comment_id);
            $data = $this->create($data);
            if (!$data) return false;
            $comment_id = $this->add($data);

            //increase the amount of weibo comments
            D('Weibo/Weibo')->where(array('id' => $weibo_id))->setInc('comment_count');

            S('weibo_' . $weibo_id,null);
            //返回评论编号
            return $comment_id;	
		}
		
		public function deleteComment()
		{
			//获取微博编号
            $comment = D('Weibo/WeiboComment')->find($comment_id);
            $weibo_id = $comment['weibo_id'];

            //将评论标记为已经删除
            D('Weibo/WeiboComment')->where(array('id' => $comment_id))->setField('status', -1);

            //减少微博的评论数量
            D('Weibo/Weibo')->where(array('id' => $weibo_id))->setDec('comment_count');
            S('weibo_' . $weibo_id,null);
            //返回成功结果
            return true;
		}
	
	}
