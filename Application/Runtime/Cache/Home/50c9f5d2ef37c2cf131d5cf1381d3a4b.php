<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0,user-scalable=no">

<!-- jQueryLib -->
<!--[if gte IE 9]><!-->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.2.3.min.js"></script>
<!--<!--[endif]-->
<!--[if lt IE 9]><!-->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.3.min.js"></script>
<!--<![endif]-->

<!--Bootstrap-->
<link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	
<!--other lib-->

<title>Welcome! My friend</title>
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
        <li><a href="<?php echo U('Login/login');?>">Log in</a></li>
        <li><a href="<?php echo U('SignUp/signup');?>">Sign Up</a></li>
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
            <div id="login-content">	 	
        	<div class="row">
        	<div class="form  col-sm-6 col-sm-offset-3 col-md-offset-3 col-md-6">
        			<div class="form-group form-group-lg">
        				<input type="text"  name="username" id="username" class="form-control " placeholder="Username">
        			</div>
                    <div class="form-group form-group-lg">
        				<input type="password" name="userpwd" id="userpwd" class="form-control" placeholder="password" >
        			</div>
        			<div class="form-group">
                      <input type="text" name="login_captcha" id="login_captcha" class="form-control" placeholder="captcha" aria-describedby="basic-addon3">
                    </div>
                    <button type="button" class="btn btn-default pull-right" id="login_btn">Login</button>
                   <img  src="<?php echo U('Home/Login/create_vf',array());?>" id="captcha" class="pull-left"/>
                   <a href="javascript:void(0)" class="pull-left" id="refresh_captcha">看不清？</a>
            </div>
        	</div>
          </div>	
        </div>

    <footer>
    	<p class="pull-right"><a href="#top">回到顶部</a></p>
    	<p>@YooZu-share everthing</p>
    </footer>


    <script>
	$(document).ready(function(){ 
		$("#login_btn").click(function(){
	    var Url='/YooZu/index.php/Home/Login/login_user';
	    var post_data={
	    	username:$("#username").val(),
	    	userpwd:$("#userpwd").val(),
	    	login_captcha:$("#login_captcha").val(),
	    };
		$.post(Url,post_data,success);
		function success(data){
			if(data=='1')
			window.location.href="<?php echo U('Userfp/userfp');?>";
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