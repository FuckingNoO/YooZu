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
	
	
	
	
	
	
	
	
	

<link type="text/css" rel="stylesheet" href="/xiangmu/YooZu/Public/home/css/home.css"/>
<title>Yoozu-share things here</title>
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




<div class="jumbotron" style="padding-top: 60px;margin-top: -20px;">
  <div class="container">
  	<div class="row">
  	  <div class="col-md-6 col-sm-12"><img src="/xiangmu/YooZu/Public/home/image/claim.png" alt="claim.png" width="450px" height="450px"/></div>
      <div class="col-md-6 col-sm-12" id="text_content">
        <h1 style="font-size: 7em;">hello,myfriend</h1>
        <p style="font-size: 2em;">Welcome to Yoozu ! Now you can enjoy doing what you want to do here! :)</p>
        <p><a class="btn btn-primary btn-lg" href="#" role="button" style="font-size: 30px;"><b>Join us</b></a></p>
      </div>
  </div>
</div>
</div>
<div class="container">
     <div class="row">
     	<div class="jumbotron">
     		<div class="container">
     	 <p style="text-align: center; font-size: 60px;">You can share things here like this ! </p>
     	</div>
     	</div>
     	 <img src="/xiangmu/YooZu/Public/home/image/image2.jpg" alt="image1.jpg" style="width: 100%;"/>
     </div>
     <div class="row">
     	  <div class="jumbotron">
     	  <div class="container">
     	  <p style="text-align: center;font-size: 60px;">You can do what you want with other people,Like this!</p>
     	  </div>
     	  </div>
     	   <img src="/xiangmu/YooZu/Public/home/image/image1.jpg" alt="image2.jpg" style="width: 100%;"/>
     </div>
     <hr>
     <div class="row">
     	<div class="jumbotron">
     	<div class="container">
      <p style="text-align: center;font-size: 60px;">You can make friends like this!</p>
     	</div>
     	</div>
     	<img src="/xiangmu/YooZu/Public/home/image/image2.jpg"alt="image3.png" style="width: 100%;"/>
     </div>
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

</body>
</html>