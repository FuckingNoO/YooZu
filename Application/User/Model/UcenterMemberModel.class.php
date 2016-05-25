<?php

namespace User\Model;
use Think\Model;

require_once(APP_PATH.'User/Conf/config.php');
require_once(APP_PATH.'User/Common/function.php');

class UcenterMemberModel extends Model{
	
	/* 用户模型自动验证 */
	protected $_validate = array(
		/* 验证用户名 */
		array('username', '1,20',"username is too long", self::EXISTS_VALIDATE, 'length'), //用户名长度不合法
		array('username', 'checkDenyMember', "this username is not allowed!", self::EXISTS_VALIDATE, 'callback'), //用户名禁止注册
        array('username', 'checkUsername', "this username is not allowed!", self::EXISTS_VALIDATE, 'callback'),
		array('username', '', "this username already exists!", self::EXISTS_VALIDATE, 'unique'), //用户名被占用

		/* 验证密码 */
		array('userpwd', '6,30', "the password length is not valid!", self::EXISTS_VALIDATE, 'length'), //密码长度不合法
		array('repassword','userpwd','the repassword is invalid!',0,'confirm',1), // 验证确认密码是否和密码一致

		/* 验证邮箱 */
		array('email', 'email', "the email format is invalid!", self::EXISTS_VALIDATE), //邮箱格式不正确
		array('email', '1,32', "the email length is invalid!", self::EXISTS_VALIDATE, 'length'), //邮箱长度不合法
		array('email', 'checkDenyEmail', "the email is banned!", self::EXISTS_VALIDATE, 'callback'), //邮箱禁止注册
		//array('email', '', "this email address already exists!", self::EXISTS_VALIDATE, 'unique'), //邮箱被占用
		
		/* 验证手机号码 
		array('mobile', '//', -9, self::EXISTS_VALIDATE), //手机格式不正确 TODO:
		array('mobile', 'checkDenyMobile', -10, self::EXISTS_VALIDATE, 'callback'), //手机禁止注册
		array('mobile', '', -11, self::EXISTS_VALIDATE, 'unique'), //手机号被占用*/
	);
		/* 用户模型自动完成 */
	protected $_auto = array(
//		array('userpwd', 'think_ucenter_md5', self::MODEL_BOTH, 'function', UC_AUTH_KEY),
		array('reg_time', NOW_TIME, self::MODEL_INSERT),
		array('reg_ip', 'get_client_ip', self::MODEL_INSERT, 'function', 1),
		array('update_time', NOW_TIME),
		array('status', 'getStatus', self::MODEL_BOTH, 'callback'),
	);
	
		/**
	 * 检测用户名是不是被禁止注册
	 * @param  string $username 用户名
	 * @return boolean          ture - 未禁用，false - 禁止注册
	 */
	protected function checkDenyMember($username){
		return true; 
	}

	/**
	 * 检测邮箱是不是被禁止注册
	 * @param  string $email 邮箱
	 * @return boolean       ture - 未禁用，false - 禁止注册
	 */
	protected function checkDenyEmail($emailn ){
		return true; 
	}

    protected function checkUsername($username) {
        //如果用户名中有空格，不允许注册
        if(strpos($username, ' ') !== false) {
            return false;
        }
        return true;
    }

	/**
	 * 检测手机是不是被禁止注册
	 * @param  string $mobile 手机
	 * @return boolean        ture - 未禁用，false - 禁止注册
	 */
//	protected function checkDenyMobile($mobile){
//		return true;
//	}	
	
	/**
	 * 根据配置指定用户状态
	 * @return integer 用户状态
	 */
	protected function getStatus(){
		return true; //TODO: 暂不限制，下一个版本完善
	}
	
	/**
	 * 注册一个新用户
	 * @param  string $username 用户名
	 * @param  string $password 用户密码
	 * @param  string $email    用户邮箱
	 * @param  string $mobile   用户手机号码
	 * @return integer          注册成功-用户信息，注册失败-错误编号
	 */
	public function register($username, $password,$repassword,$email){
		$data = array(
			'username' => $username,
			'userpwd' => $password,
			'repassword'=>$repassword,
			'email'=> $email,
		);

		//验证手机
		//if(empty($data['mobile'])) unset($data['mobile']);

		/* 添加用户 */
		if($this->create($data)){
			$uid = $this->add();
			return $uid ? $uid : 0; //0-未知错误，大于0-注册成功
		} else {
			return $this->getError(); //错误详情见自动验证注释
		}
	}
	
	/**
	 * 用户登录认证
	 * @param  string  $username 用户名
	 * @param  string  $password 用户密码
	 * @param  integer $type     用户名类型 （1-用户名，2-邮箱，3-手机，4-UID）
	 * @return integer           登录成功-用户ID，登录失败-错误编号
	 */
	public function login($username, $password, $type = 1){
		$map = array();
		switch ($type) {
			case 1:
				$map['username'] = $username;
				break;
			case 2:
				$map['email'] = $username;
				break;
//		    case 3:
//			     $map['mobile'] = $username;
//			break;
			case 3:
				$map['id'] = $username;
				break;
			default:
				return 0; //参数错误
		}

		/* 获取用户数据 */
		$user = $this->where($map)->find();
		if(is_array($user) && $user['status']){
			/* 验证用户密码 */
//			if(think_ucenter_md5($password, UC_AUTH_KEY) === $user['userpwd']){
	          if($password===$user['userpwd']){
				$this->updateLogin($user); //更新用户登录信息
				return $user['id']; //登录成功，返回用户ID
			} else {
				return -2; //密码错误
			}
		} else {
			return -1; //用户不存在或被禁用
		}
	}
	/**
	 * 用户密码找回认证
	 * @param  string  $username 用户名
	 * @param  string  $password 用户密码
	 * @param  integer $type     用户名类型 （1-用户名，2-邮箱，3-手机，4-UID）
	 * @return integer           登录成功-用户ID，登录失败-错误编号
	 */
	public function lomi($username, $email){
		$map = array();
        $map['username'] = $username;
		$map['email'] = $email;
		/* 获取用户数据 */
		$user = $this->where($map)->find();
		if(is_array($user)){
			/* 验证用户 */
			//if($user['last_login_time']){
			//return $user['last_login_time']; //成功，返回用户最后登录时间
			return $user; //成功，返回用户最后登录时间
			//}else{
			//return $user['reg_time']; //返回用户注册时间
			//return -1; //成功，返回用户最后登录时间
			//}
		} else {
			return -2; //用户和邮箱不符
		}
		}
	/**
	 * 用户密码找回认证2
	 * @param  string  $username 用户名
	 * @param  string  $password 用户密码
	 * @param  integer $type     用户名类型 （1-用户名，2-邮箱，3-手机，4-UID）
	 * @return integer           登录成功-用户ID，登录失败-错误编号
	 */
	public function reset($uid){
		$map = array();
        $map['id'] = $uid;
		/* 获取用户数据 */
		$user = $this->where($map)->find();
		if(is_array($user)){
			return $user; //成功，返回用户数据

		} else {
			return -2; //用户和邮箱不符
		}
		}
		/**
	 * 根据IP获取用户最后注册时间
	 * @param  string  $uid         用户ID或用户名
	 * @param  boolean $is_username 是否使用用户名查询
	 * @return array                用户信息
	 */
	public function infos($regip){
		$map['reg_ip'] = $regip;
		$user = $this->where($map)->max('reg_time');
		if($user){
			return  $user;
		} else {
			return -1; //用户不存在或被禁用
		}
	}
	/**
	 * 获取用户信息
	 * @param  string  $uid         用户ID或用户名
	 * @param  boolean $is_username 是否使用用户名查询
	 * @return array                用户信息
	 */
	public function info($uid, $is_username = false){
		$map = array();
		if($is_username){ //通过用户名获取
			$map['username'] = $uid;
		} else {
			$map['id'] = $uid;
		}

		$user = $this->where($map)->field('id,username,email,status')->find();
		if(is_array($user) && $user['status'] = 1){
			return array($user['id'], $user['username'], $user['email']);
		} else {
			return -1; //用户不存在或被禁用
		}
	}
    /**
	 * 检测用户信息
	 * @param  string  $field  用户名
	 * @param  integer $type   用户名类型 1-用户名，2-用户邮箱，3-用户电话
	 * @return integer         错误编号
	 */
	public function checkField($field, $type = 1){
		$data = array();
		switch ($type) {
			case 1:
				$data['username'] = $field;
				break;
			case 2:
				$data['email'] = $field;
				break;
//			case 3:
//				$data['mobile'] = $field;
//				break;
			default:
				return 0; //参数错误
		}

		return $this->create($data) ? 1 : $this->getError();
	}
	/**
	 * 更新用户登录信息
	 * @param  integer $uid 用户ID
	 */
	protected function updateLogin($user){
		$data = array(
			'id'              => $user['id'],
			'last_login_time' => NOW_TIME,
			'last_login_ip'   => get_client_ip(1),
		);
		$this->save($data);
		
		$auth = array(
            'uid' => $user['id'],
            'username' => get_username($user['id']),
            'last_login_time' => $user['last_login_time'],
        );
       // set session 
        session('user_auth', $auth);
        session('user_auth_sign', data_auth_sign($auth));
	}
	/**
	 * 更新用户信息
	 * @param int $uid 用户id
	 * @param string $password 密码，用来验证
	 * @param array $data 修改的字段数组
	 * @return true 修改成功，false 修改失败
	 * @author huajie <banhuajie@163.com>
	 */
	public function updateUserFields($uid, $password, $data){
		if(empty($uid) || empty($password) || empty($data)){
			$this->error = '参数错误！25';
			return false;
		}

		//更新前检查用户密码
		if(!$this->verifyUser($uid, $password)){
			$this->error = '验证出错：密码不正确！';
			return false;
		}

		//更新用户信息
        $data = $this->create($data,2);//指定此处为更新数据
		if($data){
			return $this->where(array('id'=>$uid))->save($data);
		}
		return false;
	}
	/**
	 * 重置用户密码
	 * @param int $uid 用户id
	 * @param string $password 密码，用来验证
	 * @param array $data 修改的字段数组
	 * @return true 修改成功，false 修改失败
	 * @author huajie <banhuajie@163.com>
	 */
	public function updateUserFieldss($uid, $data){
		if(empty($uid) || empty($data)){
			$this->error = '参数错误！26';
			return false;
		}
		//更新用户信息
		$data = $this->create($data,2);
		if($data){
			return $this->where(array('id'=>$uid))->save($data);
		}
		return false;
	}
	/**
	 * 验证用户密码
	 * @param int $uid 用户id
	 * @param string $password_in 密码
	 * @return true 验证成功，false 验证失败
	 * @author huajie <banhuajie@163.com>
	 */
	public function verifyUser($uid, $password_in){
		$password = $this->getFieldById($uid, 'password');
		if(think_ucenter_md5($password_in, UC_AUTH_KEY) === $password){
			return true;
		}
		return false;
	}
	
	 /**
     * 注销当前用户
     * @return void
     */
    public function logout()
    {
        session('user_auth', null);
        session('user_auth_sign', null);
        cookie('OX_LOGGED_USER', NULL);
    }
	
	 /**
     * 自动登录用户
     * @param  integer $user 用户信息数组
     */
    private function autoLogin($user, $remember = false){
    	 /* 更新登录信息 */
        $data = array(
            'uid' => $user['uid'],
            'login' => array('exp', '`login`+1'),
            'last_login_time' => NOW_TIME,
            'last_login_ip' => get_client_ip(1),
        );
        $this->save($data);

        /* 记录登录SESSION和COOKIES */
        $auth = array(
            'uid' => $user['uid'],
            'username' => get_username($user['uid']),
            'last_login_time' => $user['last_login_time'],
        );

        session('user_auth', $auth);
        session('user_auth_sign', data_auth_sign($auth));

        if ($remember) {
            $token = build_auth_key();
            $user1 = D('user_token')->where('uid=' . $user['uid'])->find();
            $data['token'] = $token;
            $data['time'] = time();
            if ($user1 == null) {
                $data['uid'] = $user['uid'];
                D('user_token')->add($data);
            } else {
                D('user_token')->where('uid=' . $user['uid'])->save($data);
            }
        }
        //设置cookie
        if (!$this->getCookieUid() && $remember) {
            $expire = 3600 * 24 * 7;
            cookie('OX_LOGGED_USER', $this->jiami($this->change() . ".{$user['uid']}.{$token}"), $expire);
	}
	}
	
	public function need_login(){
        if ($uid = $this->getCookieUid()) {
            $this->login($uid);
            return true;
        }
    }
     
	//获取cookieid
    public function getCookieUid()
    {
        static $cookie_uid = null;
        if (isset($cookie_uid) && $cookie_uid !== null) {
            return $cookie_uid;
        }
        $cookie = cookie('OX_LOGGED_USER');
        $cookie = explode(".", $this->jiemi($cookie));
        $map['uid'] = $cookie[1];
        $user = D('user_token')->where($map)->find();
        $cookie_uid = ($cookie[0] != $this->change()) || ($cookie[2] != $user['token']) ? false : $cookie[1];
        $cookie_uid =  $user['time']-time() >= 3600*24*7 ? false:$cookie_uid;
        return $cookie_uid;
    }
	 /**
     * 加密函数
     * @param string $txt 需加密的字符串
     * @param string $key 加密密钥，默认读取SECURE_CODE配置
     * @return string 加密后的字符串
     */
    private function jiami($txt, $key = null)
    {
        empty($key) && $key = $this->change();

        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789-=_";
        $nh = rand(0, 64);
        $ch = $chars[$nh];
        $mdKey = md5($key . $ch);
        $mdKey = substr($mdKey, $nh % 8, $nh % 8 + 7);
        $txt = base64_encode($txt);
        $tmp = '';
        $i = 0;
        $j = 0;
        $k = 0;
        for ($i = 0; $i < strlen($txt); $i++) {
            $k = $k == strlen($mdKey) ? 0 : $k;
            $j = ($nh + strpos($chars, $txt [$i]) + ord($mdKey[$k++])) % 64;
            $tmp .= $chars[$j];
        }
        return $ch . $tmp;
    }

    /**
     * 解密函数
     * @param string $txt 待解密的字符串
     * @param string $key 解密密钥，默认读取SECURE_CODE配置
     * @return string 解密后的字符串
     */
    private function jiemi($txt, $key = null)
    {
        empty($key) && $key = $this->change();

        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789-=_";
        $ch = $txt[0];
        $nh = strpos($chars, $ch);
        $mdKey = md5($key . $ch);
        $mdKey = substr($mdKey, $nh % 8, $nh % 8 + 7);
        $txt = substr($txt, 1);
        $tmp = '';
        $i = 0;
        $j = 0;
        $k = 0;
        for ($i = 0; $i < strlen($txt); $i++) {
            $k = $k == strlen($mdKey) ? 0 : $k;
            $j = strpos($chars, $txt[$i]) - $nh - ord($mdKey[$k++]);
            while ($j < 0) {
                $j += 64;
            }
            $tmp .= $chars[$j];
        }

        return base64_decode($tmp);
    }

    private function change()
    {
        preg_match_all('/\w/', C('DATA_AUTH_KEY'), $sss);
        $str1 = '';
        foreach ($sss[0] as $v) {
            $str1 .= $v;
        }
        return $str1;
    }
}
