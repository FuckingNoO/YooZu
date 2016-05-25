<?php
	
	namespace Weibo\Model;
	use Think\Model;
	class SupportModel extends Model{
		
	protected $_auto=array( 
	    array('appname','Weibo',self::MODEL_INSERT), 
		array('create_time', NOW_TIME, self::MODEL_INSERT),
        array('table','weibo',SELF::MODEL_INSERT),
		);
		
		public function addsupport($weiboid,$uid){
			$data=array('row'=>$weiboid,'uid'=>$uid);
			$data=$this->create($data);
			if(!$data)return false;
			$id=$this->add($data);
			D('Weibo/Weibo')->where(array('id'=>$weiboid))->setInc('support_count');
			S('weibo_' . $weiboid,null);
			return $id;
		}
	}
