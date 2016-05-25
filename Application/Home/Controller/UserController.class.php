<?php
namespace Home\Controller;
use User\Api\UserApi;
class UserController extends HomeController {
    
	public function signup(){
		$this->display();	
	}
	
	public function login(){
		$this->display();		
	}
	//user sign up
    public function register_user(){ 
	     $User = new UserApi;
         $uid = $User->register($_POST['username'], $_POST['userpwd'],$_POST['repassword'],$_POST['email']);
            if ($uid>0) { //注册成功
                $title='a letter from your friend named RaspoOB :D!';
	            $content="Dear :{$_POST['username']},welcome to join us! :)!";
                sendMail($_POST['email'],$title,$content);
				echo 'register successfully!';
                //$uid = $User->login($username, $password);  
            } 
				echo $uid;                  
	}
	
	//user log in
		public function login_user(){ 
       $User=new UserApi;
	   $uid=$User->login($_POST['username'],$_POST['userpwd']);
	   if($uid<0){
	   switch($uid){
	   	case -1: echo "the username does not exist!";break;
		case -2: echo "password wrong!";break;
	        }
	    }
	   else if(!check_verify($_POST['login_captcha']))
	   echo "the verifycode is wrong!";
	   else
	      echo 1;
   }
		
	//log out
    public function logout(){
    	$user=new UserApi;
       if (is_login()) {
            $user->logout();
            $this->success('退出成功！', U('User/login'));
        } else {
            $this->redirect('User/login');
        }
    }
		//verify
		public function create_vf(){
			create_verify();
		}
}

