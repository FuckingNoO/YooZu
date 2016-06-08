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
<link rel="stylesheet" href="/xiangmu/YooZu/Public/static/w3.css"/>


<!---+-------------------------------------------------------------------------------------------------------------------------------------
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
	  	<div class="row">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><span class="fa fa-foursquare" aria-hidden="true" style="font-size: 60px; color: #00FFFF; margin-left: 20px;"></span></a>
    </div>
     
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <div class="col-lg-6">
            <div class="input-group" style="margin-top: 20px;">
            	<input type="text" class="form-control input-lg" placeholder="Search for..." style="border-radius: 10px;">
                <span class="input-group-btn">
                <button class="btn btn-default btn-lg" type="button"><span class="fa fa-search">
                </span></button>
                </span>
        </div><!-- /input-group -->
    </div>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?php echo U('Public/userfp',array('uid'=>get_uid()));?>"><span class="fa fa-university" aria-hidden="true" style="font-size: 60px;"></span></a></li>
        <li><a href="<?php echo U('Lease/lease',array('uid'=>get_uid()));?>"><span class="fa fa-bicycle" aria-hidden="trues" style="font-size: 60px;"></span></a></li>
        <li><a href="#" class="navbar-chatting-model"><span class="fa fa-comments" aria-hidden="true" style="font-size: 60px;"></span></a></li>
        <li class="dropdown">
        	<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-envelope-o" aria-hidden="true" style="font-size: 60px;"></span></a>
        </li>
        <li><a href="<?php echo U('Profile/profile',array('uid'=>get_uid()));?>"><span class="fa fa-cog" aria-hidden="true" style="font-size: 60px;"></span></a></li>
        <li><a href="javascript:void(0)" data-toggle="modal" data-target="#sendblock"><span class="fa fa-pencil" aria-hidden="true" style="font-size: 60px;color: #00FFFF;"></span></a></li>
      </ul>
        </div>
    </div>
    </div>
    <!-- /.navbar-collapse -->
</nav>
 
	<body>
		<!--Modal-->
  
<div class="fade modal" id="sendblock" tabindex="-1" role="dialog" aria-labelledby="mysendModalLabel">
		<div class="modal-dialog">
		  <div class="modal-content">	
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<p class="text-muted" style="font-size: 30px; text-align: center;">hello,write something here!</p>
			</div>
			<div class="modal-body">
				<form role="form">
                    <div class="form-group">
                    	  <input type="text" class="form-control input-lg weibo-title-input" placeholder="写一个标题........" aria-describedby="basic-addon2" style="margin-bottom: 10px;">
                        <textarea name="content" class="form-control" rows="5" id="weibo_post_content" placeholder="发表些什么吧.........."></textarea>
                    </div>
                </form>
              <!--显示图片的区域-->  
        <div id="uploadimg-div" style="display: none;">
        	<div class="thumbnails w3-display-container">
        	    <img class="thumbnails" id="uploadweibo_image" style="width: 100%;"/>
        	    <div class="w3-display-topright w3-container">
        	      <a href="javascript:void(0);" class="weibo-img-delete-btn"><span class="fa fa-times" style="font-size: 30px;margin-top: 15px;"><span></a>
        	    </div>	
        	</div>
        </div>        
			</div>
			<div class="modal-footer">
		      <ul class="pull-left">		
				     <?php echo W('InsertImage/insertImage');?>
				     <?php echo W('InsertFace/insertFace');?>
		      </ul>	
				<button type="button" class="btn btn-info btn-lg" id="weibo_post_btn">发送</button>
			</div>
	    </div>
	  </div> 
	</div>
	
	<!--commentModal-->
	<div class="fade modal" id="commentblock" tabindex="-1" role="dialog" aria-labelledby="mycommentModalLabel">
	  <div class="modal-dialog">
	      <div class="modal-content" style="padding: 0px;">
	      	<div class="modal-header">
	      		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	      		<h3><strong>给他/她写一些评论？</strong></h3>
	      	</div>
	      	<div class="modal-body" id="weibo_comment_list">
	      		    
	      	</div>
	      	<div class="modal-footer" id="weibo_input_comment">
	      		<div class="input-group">
                <input type="text" class="form-control input-lg" id="comment-input-text" placeholder="写一些感言吧。。。。">
                <span class="input-group-btn">
                <button class="btn btn-primary btn-lg" id="comment-send-btn" type="button">发送</button>
                </span>
            </div>
	      	</div>
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
	<!--Editor Modal-->
	
	<!--js block-->
	<script type="text/javascript">
$(function(){
	
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
	 		  attach_id:$('#uploadweibo_image').attr('attach_id'),
	 		  title: $('.weibo-title-input').val(),
	 	};
	 		postweibo(Url,postdata);
	 });
	 
	 function postweibo(Url,postdata)
	 {
	 	$.post(Url,postdata,function(result){
	 		if(result.status){
//	 		handleAjax(result);
      alert(result.info);
	 		$('#weibo_post_content').val('');
	 		$('.weibo-title-input').val('');
	 		setTimeout(function(){
	 			$('#weibo_list').prepend(result.html);
	 			$('#myWeibolist').prepend(result.html);
	 		},1000);
	 	}
	  });
	  $('#uploadweibo_image').attr('attach_id','');
	 }
	 
	 
	    $('#comment-send-btn').on('click',function(){
	    	
	        var weiboid=$(this).parent().parent().parent().parent().parent().parent().attr('data-weibo-id');
	        var commentcount=$(this).parent().parent().parent().parent().parent().parent().attr('data-weibo-comment-count');
	 		    $.post('/xiangmu/YooZu/index.php/Usercenter/Profile/dosendComment',
      			   {
      				weibo_id: weiboid,
      				content:$('#comment-input-text').val(),
      			    },  
      			    function(a){
      				if(a.status){
      					$('#comment-input-text').val('');
      					$('#weibo_comment_list').prepend(a.html);
      					$('#comment_count_'+weiboid).html(++commentcount);
      					$('#commentblock').attr('data-weibo-comment-count',commentcount);
      					alert(a.info);
      				}	
      			});
	    });
	    
	  $('.weibo-img-delete-btn').on('click',function(){
	        	$('#uploadweibo_image').attr('src');
	        	$('#uploadimg-div').hide();
	  });
	     
});
	</script>
	
	
	
	

		<?php $url=getUserBackground($uid=get_uid()); ?>
		<div class="profile-user-bgpicture">
                 <img src="<?php echo ($url); ?>" alt="userbackground" width="100%" />
        </div>
        <div class="container">
            <div class="row" id="userprofile-weibolist">
            	<!------------------------------------------>
            	<div class="profile_left_column col-sm-4 col-md-4">
            		    <div class="panel panel-default user-profilecard">
            		    	<div class="panel-heading user-profilecard-heading" style="padding: 0;">
            		    		<a href="#"><img src="<?php echo ($url); ?>" 
            		    			width="100%" height="100%"/></a>
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
                           <div class="panel-footer user-profilecard-footer" style="">
                           	<a href="<?php echo U('Editor/usereditor',array());?>" class="profilecard-footer-modify">编辑资料</a>
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