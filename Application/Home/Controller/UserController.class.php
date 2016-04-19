<?php
namespace Home\Controller;
use Think\Controller;
use User\Api\UserApi;
class UserController extends Controller {

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
			else    // error
			exit($index->getError());
	}
	
	//user log in
		public function login_user(){
		/*$verify=trim(I('post.login_captcha',''));
        $index=D('Index');
		$data['username']=$_POST['username'];
		$data['password']=$_POST['userpwd'];
		if(!$index->where($data)->find()){
		echo "用户不存在！";
		exit();
       }
		if(!check_verify($verify)){
			echo '验证码错误！';
			exit();
		}
        echo '1';*/
         if (IS_POST) { //登录验证
            /* 检测验证码 */
            if (C('VERIFY_OPEN') == 1 or C('VERIFY_OPEN') == 3) {
                if (!check_verify($verify)) {
                    $this->error('验证码输入错误。');
                }
            }

            /* 调用UC登录接口登录 */
            $user = new UserApi;
            $uid = $user->login($_POST[''], $_POST['']);
            if ($uid>0) { //UC登录成功
                /* 登录用户 */
                $Member = D('Member');
                if ($Member->login($uid,$remember=='on')) { //登录用户
                    //TODO:跳转到登录前页面
                    $this->success('登录成功！', U('Home/Index/index'));
                } else {
                    $this->error($Member->getError());
                }

            } else { //登录失败
                switch ($uid) {
                    case -1:
                        $error = '用户不存在或被禁用！';
                        break; //系统级别禁用
                    case -2:
                        $error = '密码错误！';
                        break;
                    default:
                        $error = '未知错误27！';
                        break; // 0-接口参数错误（调试阶段使用）
                }
                $this->error($error);
            }

        } else { //显示登录表单
            if (is_login()) {
                redirect(U('Weibo/Index/index'));
            }
            $this->display();
        }
	}
		
	//log out
    public function logout(){
       /*if (is_login()) {
            D('Member')->logout();
            $this->success('退出成功！', U('User/login'));
        } else {
            $this->redirect('User/login');
        }*/
    }
		//verify
		public function create_vf(){
			create_verify();
		}
}

