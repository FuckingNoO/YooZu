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
<link rel="stylesheet" type="text/css" href="/xiangmu/YooZu/Public/static/WebUIpopover/css/jquery.webui-popover.min.css"/>
<!--Bootstrap Lib js-->
<script src="/xiangmu/YooZu/Public/static/bootstrap/js/bootstrap.min.js"></script>

<!--other Lib-->
<script type="text/javascript" src="/xiangmu/YooZu/Public/static/slimscroll/jquery.slimscroll.min.js"></script>
<script type="text/javascript" src="/xiangmu/YooZu/Public/static/WebUIpopover/js/jquery.webui-popover.js"></script>


<!--
<script>
    //全局内容的定义
    var _ROOT_ = "/xiangmu/YooZu";
    var MID = "<?php echo is_login();?>";
    var MODULE_NAME="<?php echo MODULE_NAME; ?>";
</script>	-->
	
	
	
	
	
	
	
	
	

    <title></title>
    <link rel="stylesheet" href="/xiangmu/YooZu/Public/Usercenter/css/profilecard.css" />
    <link rel="stylesheet" href="/xiangmu/YooZu/Public/Usercenter/css/profile.css" />
	</head>
	 <nav class="navbar navbar-default navbar-fixed-top">
	  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><img src="/xiangmu/YooZu/Public/Usercenter/image/year_of_monkey_48px_1168430_easyicon.net.png"/></a>
    </div>
     
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">GO</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?php echo U('Public/userfp',array('uid'=>get_uid()));?>"><img src="/xiangmu/YooZu/Public/Usercenter/image/home_48px_1196787_easyicon.net.png"></a></li>
        <li><a href="<?php echo U('Lease/lease');?>"><img src="/xiangmu/YooZu/Public/Usercenter/image/Bicycle_48px_1177189_easyicon.net.png"/></a></li>
        <li><a href="#" class="navbar-chatting-model"><img src="/xiangmu/YooZu/Public/Usercenter/image/speech_balloon_49.088659793814px_1196235_easyicon.net.png"/></a></li>
        <li class="dropdown">
        	<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="/xiangmu/YooZu/Public/Usercenter/image/email_67.505016722408px_1197077_easyicon.net.png"></a>
        </li>
        <li><a href="<?php echo U('Profile/profile',array('uid'=>get_uid()));?>"><img src="/xiangmu/YooZu/Public/Usercenter/image/user_man_setting_48px_1174256_easyicon.net.png"></a></li>
        <li><a href="javascript:void(0)" data-toggle="modal" data-target="#sendblock"><img src="/xiangmu/YooZu/Public/Usercenter/image/Pencil_47.900207900208px_1190350_easyicon.net.png"></a></li>
      </ul>
        </div>
    </div>
    <!-- /.navbar-collapse -->
</nav>
 
	<body>
		<!--Modal-->
     	<div class="fade modal" id="sendblock">
		<div class="modal-content container">
			<div class="modal-header">
				<h4 style="text-align: center;">hello,write something here! :D</h4>
			</div>
			<div class="modal-body">
				<form role="form">
                    <div class="form-group">
                        <label for="comment">write something here</label>
                        <textarea name="content" class="form-control" rows="5" id="weibo_post_content"></textarea>
                     </div>
                </form>
			</div>
			<div class="modal-footer">
				<button class="btn btn-default" id="add_picture_btn"><span class="glyphicon glyphicon-picture"></span></button>
				<button type="button" class="btn btn-default" id="weibo_post_btn">send</button>
			</div>
	    </div>
	</div>
	<!--Session block-->
	<div id="sessionblock">
		<div class="container-fluid">
		    <div class="row">
		    </div>
		</div>
	</div>
	<!--js block-->
	<script>
	$('.navbar-chatting-model').webuiPopover({
		placement:'auto',
		container: '.navbar-chatting-model',
		trigger: 'click',
		height:400,
		width: 250,
		url:'#sessionblock',
		animation: 'pop',
	    offsetTop:0,  // offset the top of the popover
        offsetLeft:0,
	});
	
	 $("#weibo_post_btn").click(function(){
	 	    var Url="/xiangmu/YooZu/index.php/Usercenter/Profile/accept_weibo";
	 	    var postdata={
	 		content:$("#weibo_post_content").val(),
	 	};
	 		postweibo(Url,postdata);}
	 );
	 function postweibo(Url,postdata)
	 {
	 	$.post(Url,postdata,function(result){
	 		if(result.status){
//	 		handleAjax(result);
	 		$('#weibo_post_content').val('');
	 		alert(result.info);
	 		setTimeout(function(){
	 			$('#weibo_list').prepend(result.html);
	 			$('#myWeibolist').prepend(result.html);
	 		},1000);
	 	}
	  });
	 }
	</script>
	
	
	
	

		<div class="profile-user-bgpicture">
                 <img src="/xiangmu/YooZu/Public/Usercenter/image/003.jpg" alt="userbackground" width="100%" />
        </div>
        <div class="container">
            <div class="row" id="userprofile-weibolist">
            	<!------------------------------------------>
            	<div class="profile_left_column col-sm-4 col-md-4">
            		    <div class="panel panel-default user-profilecard">
            		    	<div class="panel-heading user-profilecard-heading">
            		    		<a href="#"><img src="/xiangmu/YooZu/Public/Usercenter/image/012.jpg" width="100%" height="100%"/></a>
            		    	</div>
            		    	<div class="panel-body user-profilecard-body">
                                <ul class="list-group user-profilecard-list-group">
                                	<li class="list-group-item user-profilecard-Nickname"><a href="">昵称:</a>
                                		<span class="pull-right">zhujiahao</span>
                                	</li>
                                	<li class="list-group-item user-profilecard-activities"><a href="">我的活动</a>
                                		<span class="badge">1</span>
                                	</li>
                                	<li class="list-group-item user-profilecard-followers"><a href="">支持者</a>
                                		<span class="badge">2</span>
                                	</li>
                                	<li class="list-group-item user-profilecard-following"><a href="">正在关注</a>
                                		<span class="badge">3</span>
                                	</li>
                                </ul>
                           </div>
                           <div class="panel-footer user-profilecard-footer">
                           	<a href="<?php echo U('Editor/usereditor',array());?>" class="profilecard-footer-modify"><span class="pull-right">编辑资料</span></a></li>
                           </div>
            		    </div>
            	</div>
            	<!------------------------------------------->
            	<div class="profile_right_column col-sm-8 col-md-8">
            		<div id="myWeibolist">
            			<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$weibo): $mod = ($i % 2 );++$i; echo W('WeiboDetail/detail',array('weibo'=>$weibo)); endforeach; endif; else: echo "" ;endif; ?>
<script>
	lastId='<?php echo ($lastId); ?>';
</script>
            		</div>
            	</div>
            </div>
        </div>
        <footer>
	<div class="container user-profile-footer">
	    <div class="row user-profile-footer-row">
	    <ul class="user-profile-list pull-right">
	    	<li><a href="#">关于我们</a></li>
	        <li><a href="#">联系我们</a></li>
	        <li><a href="#">隐私</a></li>
	        <li><a href="#">法律</a></li>
	    </ul>	
	    </div>
	</div>
</footer>

	</body>
</html>