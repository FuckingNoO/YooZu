<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
		  $this->assign('userid',$userid=get_uid());
		  $this->display();
    }
}
