<?php
/*
 * 
 */
	
	namespace Common\Model;
	use Think\Model;
	
	class FollowModel extends Model
	{
		
		protected $_auto=array(
		array('create_time',NOW_TIME,self::MODEL_INSERT)
		);
		
//		follow function
     public function follow($uid){
     	$follow["who_follow"]=is_login();
		$follow["follow_who"]=$uid;
		if($follow["who_follow"]==$follow["follow_who"]){
			return 0;
		}
		if(D('Follow')->where($follow)->count()>0){
			return 0;
		}
		$follow=$this->create($follow);
		clean_query_user_cache($uid,'fans');
        clean_query_user_cache(is_login(),'following');
        S('atUsersJson_'.is_login(),null);
		$user = query_user(array('id', 'username', 'space_url'));
        
        D('Message')->sendMessage($uid, $user['username'] . ' 关注了你。', '粉丝数增加', $user['space_url'], is_login(), 0);
        return $this->add($follow);
        }
	 
//	 unfollowv function
	    public function unfollow($uid){
	 	$follow['who_follow'] = is_login();
        $follow['follow_who'] = $uid;
        clean_query_user_cache($uid,'fans');
        clean_query_user_cache(is_login(),'following');
        S('atUsersJson_'.is_login(),null);
        $user = query_user(array('id', 'username', 'space_url'));
        D('Message')->sendMessage($uid, $user['username'] . '取消了对你的关注', '粉丝数减少', $user['space_url'], is_login(), 0);
        return $this->where($follow)->delete();
	    }
		
		public function getAllFriends($uid=0){
			if($uid==0){
				$uid=is_login();
			}
			$model_follow=D('Follow');
			$i_follow=$model_follow->where(array('who_follow'=>$uid))->limit(999)->select();
			foreach($i_follow as $key=>$user){
				if($model_follow->where(array('follow_who'=>$uid,'who_follow'=>$user['follow_who']))->count()){
					continue;
				 }
				else
					unset($i_follow[$key]);
			}
			return $i_follow;
		}
		
	 }
