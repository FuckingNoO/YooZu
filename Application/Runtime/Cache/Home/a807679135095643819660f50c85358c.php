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
<link rel="stylesheet" type="text/css" href="/xiangmu/YooZu/Public/home/css/sticky-footer.css"/>	
<!--Bootstrap Lib js-->
<script src="/xiangmu/YooZu/Public/static/bootstrap/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="/xiangmu/YooZu/Public/home/css/signup.css"/>
<!--other Lib-->
<script type="text/javascript" src="/xiangmu/YooZu/Public/static/slimscroll/jquery.slimscroll.min.js"></script>


<!--
<script>
    //全局内容的定义
    var _ROOT_ = "/xiangmu/YooZu";
    var MID = "<?php echo is_login();?>";
    var MODULE_NAME="<?php echo MODULE_NAME; ?>";
</script>	-->
	
	
	
	
	
	
	
	
	

<title>Welcome</title>
</head>
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
 //present the useravadar 
 <?php if($uid != 0): ?><div id="">
  	<img src=""/>
  </div><?php endif; ?>
  </div><!-- /.container-fluid -->
</nav>




<body>

	<div class="container">
              <form class="form-signup">	
            	<label for="username" class="sr-only">Uername</label>
        			<input type="text"  name="username" id="username" class="form-control fo" placeholder="Username">
                <label for="userpwd" class="sr-only">Password</label>
        			<input type="password" name="userpwd" id="userpwd" class="form-control" placeholder="Password" >
        		<label for="repassword" class="sr-only">Confirm</label>
        		    <input type="password" name="repassword" id="repassword" class="form-control" placeholder="Password_confirm" >
        		<label for="email" class="sr-only">Email</label>
        		    <input type="email" name="email" id="email" class="form-control" placeholder="Email address" >
        			<button type="button" class="btn btn-lg btn-default btn-block" id="register_btn" style="color: white;">Submit</button>
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
$(document).ready(function(){ $("#register_btn").click( function(){
	    var Url='/xiangmu/YooZu/index.php/Home/User/register_user';
	    var post_data={
	    	username:$("#username").val(),
	    	userpwd:$("#userpwd").val(),
	    	repassword:$("#repassword").val(),
	    	email:$("#email").val(),
	    };
		$.post(Url,post_data,success);
		function success(data){
			//alert(data);
			window.location.href="<?php echo U('Home/Index/index');?>";
		}
	  });
	});
</script>

</body>
</html>