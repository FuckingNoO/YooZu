<?php

	namespace Common\Api;
	use Exception\ApiException;
	
	class Api
	{
		protected function apiSuccess($message, $extra = array())
        {
        return $this->apiReturn(true, $message, $extra);
        }

        protected function apiError($message)
       {
        throw new ApiException($message);
        return null; // 这句话是为了消除IDE的警告
        }

        protected function apiReturn($success, $message, $extra)
       {
        $result = array('success' => boolval($success), 'message' => strval($message));
        $result = array_merge($result, $extra);
        return $result;
       }
		//重置最后发送时间
		public function resetLastSendTime()
        {
             session('last_send_time', 0);
        }
		
		//更新最后发送时间
		public function updateLastSendTime()
		{
             session('last_send_time', time());
		}
		
	 /**
     * 发送微博、评论等，不能太频繁，否则抛出异常。
     */
		public function requireSendInterval()
		{
		//获取最后的时间
        $lastSendTime = session('last_send_time');
        if (time() - $lastSendTime < 8) {
            throw new ApiException('操作太频繁，请稍后重试');
           }
		}
		
		//need to log in
        public function requireLogin()
		{
			if (!is_login()) 
			{
                 throw new ApiException('需要登录', ErrorCodeApi::REQUIRE_LOGIN);
            }
		}
		
		protected function getUserStructure($uid){
        //请不要在这里增加用户敏感信息，可能会暴露用户隐私
//          $fields = array('uid', 'nickname', 'avatar32', 'avatar64', 'avatar128', 'avatar256', 'avatar512');
            $fields=array('avatar32','avatar64','avatar128','avatar256','avatar512');
            return query_user($fields, $uid);
        }
		
	
	}
