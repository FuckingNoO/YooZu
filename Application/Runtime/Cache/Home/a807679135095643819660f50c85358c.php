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
	
<!--Bootstrap Lib js-->
<script src="/xiangmu/YooZu/Public/static/bootstrap/js/bootstrap.min.js"></script>

	
<!--other Lib

<script>
    //全局内容的定义
    var _ROOT_ = "/xiangmu/YooZu";
    var MID = "<?php echo is_login();?>";
    var MODULE_NAME="<?php echo MODULE_NAME; ?>";
</script>	-->
	
	
	
	
	
	
	
	
	

<title>Welcome</title>
</head>
<body>
<nav class="navbar navbar-default navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo U('Index/index');?>">Brand</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?php echo U('User/login');?>">Log in</a></li>
        <li><a href="<?php echo U('User/signup');?>">Sign Up</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#"></a></li>
            <li><a href="#"></a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>





	<div class="container-fluid">
	        <div id="">
	        	<div class="row">
	        		<h1>Welcome,myfriend!:D</h1>
	        	</div>
	        </div>
            <div id="register-content">	 	
        	<div class="row">
        	<div class="form  col-sm-6 col-sm-offset-3 col-md-offset-3 col-md-6">
        			<div class="form-group form-group-lg">
        				<input type="text"  name="username" id="username" class="form-control fo" placeholder="Username">
        			</div>
                    <div class="form-group form-group-lg">
        				<input type="password" name="userpwd" id="userpwd" class="form-control" placeholder="password" >
        			</div>
        			<div class="form-group form-group-lg">
        				<input type="password" name="repassword" id="repassword" class="form-control" placeholder="password_confirm" >
        			</div>
        			<div class="form-group form-group-lg">
        				<input type="email" name="email" id="email" class="form-control" placeholder="e-mail address" >
        			</div>
        			<button type="button" class="btn btn-default pull-right" id="register_btn">Submit</button>
        	</div>
          </div>	
        </div>

    <footer>
    	<p class="pull-right"><a href="#top">回到顶部</a></p>
    	<p>@YooZu-share everthing</p>
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
			alert(data);
		}
	  });
	});
</script>

</body>
</html>