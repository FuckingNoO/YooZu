<?php
 function sendMail($to, $title, $content) {
   Vendor('PHPMailer.PHPMailerAutoload');
   $mail = new PHPMailer(); //实例化
   $mail->IsSMTP(); // 启用SMTP
   $mail->Host=C('MAIL_HOST'); //smtp服务器的名称（这里以QQ邮箱为例）
   $mail->SMTPAuth = C('MAIL_SMTPAUTH'); //启用smtp认证
   $mail->Username = C('MAIL_USERNAME'); //你的邮箱名
   $mail->Password = C('MAIL_PASSWORD') ; //邮箱密码
   $mail->From = C('MAIL_FROM'); //发件人地址（也就是你的邮箱地址）
   $mail->FromName = C('MAIL_FROMNAME'); //发件人姓名
   $mail->AddAddress($to,"尊敬的客户");
   $mail->WordWrap = 50; //设置每行字符长度
   $mail->IsHTML(C('MAIL_ISHTML')); // 是否HTML格式邮件
   $mail->CharSet=C('MAIL_CHARSET'); //设置邮件编码
   $mail->Subject =$title; //邮件主题
   $mail->Body = $content; //邮件内容
   $mail->AltBody = "这是一个纯文本的身体在非营利的HTML电子邮件客户端"; //邮件正文不支持HTML的备用显示
   return($mail->Send());
 }
   
   function create_verify(){
   		$config_verify=array(
		'fontSize'=>15,
		'imageW'=>100,
		'imageH'=>40,
		'length'=>3,
		'useNoise'=>false,
		'codeSet'=>'0123456789',
		);
		 $Verify=new \Think\Verify($config_verify);
		 $Verify->entry();
   }
   
   function check_verify($code, $id=""){
   	$config = array ('reset' => false);
    $verify = new \Think\Verify($config);  
    return $verify->check($code, $id);  
}
   
   	function is_login(){
    $user = session('user_auth');
    if (empty($user)) 
        {return 0;}
        else {
        return session('user_auth_sign') == data_auth_sign($user) ? $user['uid'] : 0;
    }
}
	//	说明：检测用户是否是超级管理员
    //  返回值 boolean true-管理员，false-非管理员
     function is_administrator($uid = null){
     	
     }
   	
     // 说明：字符串转换为数组，与explode功能相同，只是参数顺序不同
     // 参数 string $str 要分割的字符串
     //参数 string $glue 分割符
     // 返回值 array
	function str2arr($str, $glue = ',' ){

		}

//		说明：调用系统的API接口的静态方法，例如：api('User/getName','id=5');// 调用公共模块的User接口的getName方法
//		参数 string $name 格式 [模块名]/接口名/静态方法名
//		参数 array|string $vars 参数
     function api($name,$vars=array()){
     	
     }
       
//     说明：根据用户ID获取用户昵称。首先会尝试从session获取，其次尝试从缓存获取，如果没有获取到，从数据库获取并缓存。
//     根据用户ID获取用户昵称
//     参数 integer $uid 用户ID
//     返回值 string 用户昵称
      function get_nickname($uid = 0){
      
      }
	  
//      说明：根据用户ID获取用户名。首先会尝试从session获取，其次尝试从缓存获取，如果没有获取到，从数据库获取并缓存。
//      参数 integer $uid 用户ID 返回值 string 用户名
      function get_username($uid = 0){
      	
      }
 
 