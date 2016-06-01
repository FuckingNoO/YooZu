<?php
	namespace Usercenter\Controller;
	use Think\Controller;
	use Lease\Api\LeaseApi;
	
	class LeaseController extends Controller{
		private $leaseApi;	
		
		//初始化类
		public function _initialize(){
			$this->leaseApi = new LeaseApi();
		}
		
		
		public function lease($uid=null){
			
		if($uid){
			
			$result=$this->leaseApi->listAllgoodsByType(); 
			
			//模板中的关键变量
			$this->assign('glist',$result['list']);
            $this->assign('lastid',$result['lastid']);
			
			$this->display();
			}
			else $this->error("404,please log in first!",U('Home/Index/index'));
		}
		
		//根据物品的种类加载物品信息
		public function loadgoodlistByType($map=array(),$loadcount=1,$lastid=0,$type='transport'){
			
			$result=$this->leaseApi->listAllgoodsByType(array(),$loadcount,$lastid,$type);
			
 			$this->assign(''.$type.'',$result['list']);
			$this->display('Lease/'.$type.'');
		}		
		
		
		//在确定物品种类前提下加载更多该类物品
		public function loadMoreGoodsBYType(){
			
			
			
		}
		
		
        //
     	public function douploadgoodsimg(){
	     	$model=M('goodsimg');
		    $config=C('GOODS_UPLOAD');
		    $upload = new \Think\Upload($config);
		    $info=$upload->upload();
		    if($info){
			    foreach($info as $key=>&$value){
			        $data=array('path'=>'Uploads/Goods/'.$value['savepath'].$value['savename'],'uid'=>get_uid(),'create_time'=>NOW_TIME,'status'=>1,'is_temp'=>1);
			}
			    if($id=$model->add($data)){
				    $result=array('id'=>$id,'image'=>getRootUrl().$data['path'],'success'=>1,'message'=>'成功');
				    $this->iframeReturnf($result);
			        }
		        $this->error($model->getError());    		
		    }
		
		    $this->error('上传失败！');
	    }
	
	    public function dosubmitgoods($content,$type,$attach_id){
		
		    if($attach_id){
			    $x=M('goodsimg');
			    $map['id']=$attach_id;
			    $x->is_temp=0;
			    $x->where($map)->save();				
		    }
		
		    $good_data='';
		    $good_data['attach_id']=$attach_id;
		
		    $result=$this->leaseApi->Addgood(get_uid(),$content,$type,$good_data);
		    $result['html']=R('',array(),'Widget');
		    $this->ajaxReturn(apiToAjax($result));
      	}
	
		private function iframeReturnf($result){
	        $json = json_encode($result);
            $json = htmlspecialchars($json);
            $html = "<textarea data-type=\"application/json\">$json</textarea>";
            echo $html;
            exit;
		}
		
}
