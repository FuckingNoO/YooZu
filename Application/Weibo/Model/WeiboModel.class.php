<?php
	
	namespace Weibo\Model;
	use Think\Model;
	
	class WeiboModel extends Model
	{
		protected $_validate = array(
        array('content', '1,99999', '内容不能为空', self::EXISTS_VALIDATE, 'length'),
        array('content', '0,500', '内容太长', self::EXISTS_VALIDATE, 'length'),
    );

        protected $_auto = array(
        array('create_time', NOW_TIME, self::MODEL_INSERT),
        array('status', '1', self::MODEL_INSERT),
    );
		
		public function addWeibo($uid, $content='',$title,$type='feed',$feed_data=array(),$from='')
		{
			 //写入数据库
            $data = array('uid'=>$uid,'content'=>$content,'title'=>$title,'type'=>$type,'data'=>serialize($feed_data),'from'=>$from);
            $data = $this->create($data);
            if(!$data) return false;
            $weibo_id = $this->add($data);

            //返回微博编号
            return $weibo_id;
		}
		//删除微博
		public function deleteWeibo($map=array()){
		return $this->where($map)->delete();
		}
		
	}
