<?php
	
	namespace Lease\Api;
    use Common\Api\Api;
	use Common\Exception\ApiException;
	
	class LeaseApi extends Api{
	  
	    private $leaseModel;
	  
	    public function __construct(){
	    	
			$this->leaseModel=D('Lease/Goods');
	
	    }
	 
	    public function listAllgoodsByType($map=array(),$loadcount=1,$lastid=0,$type='transport'){
	  	    
			$map=array('status'=>1,'type'=>$type);
			
			if($loadcount=1)
		        $list=$this->leaseModel->field('id')->where($map)->order('create_time desc')->limit(10)->select();
			
			if($loadcount>1){
				
				$map['_string']='id<'.$lastid.'';
				$list=$this->leaseModel->field('id')->where($map)->order('create_time desc')->limit(10)->select();	
			}
			
			if(!$list) {throw new Exception("Error Processing Request", 1);}
		    
		    foreach($list as &$x){
			    $x=$this->getgoodsStructure($x['id']);
			}
			unset($x);
			$message="成功！";
			return $this->apiSuccess($message,array('list'=>$list,'lastid'=>$list[count($list)-1]['id']));
	    }
		
		/*添加商品*/
		public function Addgood($uid=null,$content,$type,$good_data=array()){
			
			$goodid=$this->leaseModel->addgood($uid,$content,$type,$good_data);
			if(!$goodid){
				throw new Exception("Error Processing Request", 1);	
			}
			$message="提交成功！";
			    return $this->apiSuccess($message,array('id'=>$goodid));
		}
		
		
		public function getgoodsStructure($id){
			$good=S('good_'.$id);
			if(empty($good)){
				$good=$this->leaseModel->find($id);
				$good_data=unserialize($good['data']);
			    $fetchContent="<p class='text-muted'>".$good['expandinfo']."</p>";
			$good=array(
			    'id'=>$good['id'],
			    'uid'=>$good['uid'],
			    'fetchContent'=>$fetchContent,
			    'content'=>$good['expandinfo'],
			    'data'=>$good_data,
			    'is_Candelete'=>1,
			    'type'=>$good['type'],
			    'imgurl'=>getGoodattachimg($good_data['attach_id']),
			    'user'=>$this->getUserStructure($good['uid']),
			);
			S('good_'.$good['id']);
			}
			$good['is_Candelete']=$this->isCanDeletegood($good);
			return $good;
		}
		
		public function getgoodDetails(){
			
			
			
		}
		
		private function isCanDeletegood($good){
			if($good['uid']==get_uid()){
				return true;
			}
			return false;	
		}
		
		
		
		
	}
