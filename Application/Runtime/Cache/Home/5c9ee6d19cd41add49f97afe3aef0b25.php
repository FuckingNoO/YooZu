<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0,user-scalable=no">

<!-- jQueryLib -->
<!--[if gte IE 9]><!-->
<script type="text/javascript" src="/xiangmu/YooZu/Public/static/jquery-2.0.3.min.js"></script>
<!--<!--[endif]-->
<!--[if lt IE 9]><!-->
<script type="text/javascript" src="/xiangmu/YooZu/Public/static/jquery-1.10.2.min.js"></script>
<!--<![endif]-->

<!-- 增强IE兼容性 -->
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]><!-->
<script src="/xiangmu/YooZu/Public/static/bootstrap/js/html5shiv.js"></script>
<script src="/xiangmu/YooZu/Public/static/bootstrap/js/respond.js"></script>
<!--<!--[endif]-->

<!-- 为了让html5shiv生效，请将所有的CSS都添加到此处 -->
<link type="text/css" rel="stylesheet" href="/xiangmu/YooZu/Public/static/bootstrap/css/bootstrap.min.css"/>	
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="/xiangmu/YooZu/Public/home/css/sticky-footer.css"/>	
<link rel="stylesheet" type="text/css" href="/xiangmu/YooZu/Public/static/WebUIpopover/css/jquery.webui-popover.min.css"/>
<!--Bootstrap Lib js-->
<script src="/xiangmu/YooZu/Public/static/bootstrap/js/bootstrap.min.js"></script>

<!--other Lib-->
<script type="text/javascript" src="/xiangmu/YooZu/Public/static/slimscroll/jquery.slimscroll.min.js"></script>
<script src="/xiangmu/YooZu/Public/static/jquery.iframe-transport.js" type="text/javascript"></script>
<script type="text/javascript" src="/xiangmu/YooZu/Public/static/WebUIpopover/js/jquery.webui-popover.js"></script>


<!--
<script>
    //全局内容的定义
    var _ROOT_ = "/xiangmu/YooZu";
    var MID = "<?php echo is_login();?>";
    var MODULE_NAME="<?php echo MODULE_NAME; ?>";
</script>	-->
	
	
	
	
	
	
	
	
	

		<link rel="stylesheet" type="text/css" href="/xiangmu/YooZu/Public/home/css/login.css"/>
		<title>Welcome! My friend</title>
	</head>
<body>
	<nav class="navbar navbar-default navbar-inverse" style="height: 80px;">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
      <a class="navbar-brand" href="<?php echo U('Index/index');?>" style="margin-top: 15px;font-size: 40px;"><b>Yoozu</b></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="navbar">
    <?php if($uid == 0): ?><ul class="nav navbar-nav navbar-right" style="margin-top: 15px;">
        <li><a href="<?php echo U('User/login');?>" style="font-size: 30px;"><strong>Log In</strong></a></li>
        <li><a href="<?php echo U('User/signup');?>" style="font-size: 30px;"><strong>Sign Up</strong></a></li>
      </ul><?php endif; ?>
    </div><!-- /.navbar-collapse -->
<!-- present the useravadar -->
 <?php if($uid != 0): ?><div id="">
  	<img src=""/>
  </div><?php endif; ?>
  </div><!-- /.container-fluid -->
</nav>




	<div class="container">
        	<form class="form-login">
        		    <label for="username" class="sr-only">Username</label>
        				<input type="text"  name="username" id="username" class="form-control " placeholder="Username" required autofocus>
                    <span id="username_info"></span>
                   <label for="userpwd" class="sr-only">Password</label>
        				<input type="password" name="userpwd" id="userpwd" class="form-control" placeholder="Password" required autofocus>
        			<span id="password_info"></span>
        			<label for="login_captcha" class="sr-only">Captcha</label>
                      <input type="text" name="login_captcha" id="login_captcha" class="form-control" placeholder="Captcha" aria-describedby="basic-addon3" required>     
                    <span id="captcha_info"></span>     
                    <button type="button" class="btn btn-lg btn-default btn-block" id="login_btn" style="color: white;">Login</button>
                    <div class="checkbox" class="pull-right">
                         <label><input type="checkbox" value="remember-me"> Remember me</label>                  
                     </div>
                    <img  src="<?php echo U('Home/User/create_vf',array());?>" id="captcha" class="pull-left"/>
                   <a href="javascript:void(0)" class="pull-left" id="refresh_captcha">看不清？</a>
        	</form>	
        </div>
            <footer class="footer">
      <div class="container">	
           <div class="row">
           	<div class="col-md-3">
           		<h5 style="font-size: 40px;"><b>YooZu@<b></h5>
           		<p><b>Changzhou Office</b></p>
           		<p><b>1832 Buchanan Street #201,</b></p>
           		<p><b>San Francisco, CA 94115</b></p>
           	</div>
           	<div class="col-md-3">
           		<ul>
           			<li><a href="#" style="font-size: 40px;"><b>Company</b></a></li>
           			<li><a href="#">Blog</a></li>
           			<li><a href="#">About</a></li>
           			<li><a href="#">Contact</a></li>
           		</ul>
           	</div>
           	<div class="col-md-3">
           		<ul>
           			<li><a href="#" style="font-size: 40px;"><b>YooZu</b></a></li>
           			<li><a href="#">what can it do</a></li>
           			<li><a href="#">how</a></li>
           		</ul>
           	</div>
           	<div class="col-md-3">
           		<ul>
           			<li><a href="#" style="font-size: 40px;"><b>Contact</b></a></li>
           			<li>Tel:15061110931</li>
           			<li>Email:1158656977@qq.com</li>
           		</ul>
           	</div>
           </div>
           <div class="row">
           	
           </div>
      </div>
    </footer>

        <script>
	$(document).ready(function(){ 
		$("#login_btn").click(function(){
	    var Url='/xiangmu/YooZu/index.php/Home/User/login_user';
	    var post_data={
	    	username:$("#username").val(),
	    	userpwd:$("#userpwd").val(),
	    	login_captcha:$("#login_captcha").val(),
	    };
		$.post(Url,post_data,success);
		function success(data){
			if(data=='1')
			window.location.href="<?php echo U('Usercenter/Public/userfp');?>";
			else
			alert(data);
		}
		});
		$("#refresh_captcha").click(function(){ 
        	var verifyurl=$("#captcha").attr("src");
        	if( verifyurl.indexOf('?')>0){  
              $("#captcha").attr("src",verifyurl+'&random='+Math.random());  
            }
              $("#captcha").attr("src",verifyurl.replace(/\?.*$/,'')+'?'+Math.random());     
        	});
	  });
	</script>
 </body>
 </html>