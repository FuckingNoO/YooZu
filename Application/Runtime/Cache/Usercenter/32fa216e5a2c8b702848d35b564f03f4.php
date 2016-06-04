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
	
	
	
	
	
	
	
	
	

		<title>hello,<?php echo ($auth["username"]); ?></title>
		<link rel="stylesheet" href="/xiangmu/YooZu/Public/Usercenter/css/userfp.css" />
		<link rel="stylesheet" href="/xiangmu/YooZu/Public/Usercenter/css/profilecard.css" />
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
      <a class="navbar-brand" href="#"><span class="fa fa-foursquare" aria-hidden="true" style="font-size: 60px; color: #00FFFF;"></span></a>
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
    <!-- /.navbar-collapse -->
</nav>
 
	<body>
		<!--Modal-->
  
<div class="fade modal" id="sendblock" tabindex="-1" role="dialog" aria-labelledby="mysendModalLabel">
		<div class="modal-dialog">
		  <div class="modal-content">	
			<div class="modal-header">
				<p class="text-muted" style="font-size: 30px; text-align: center;">hello,write something here!</p>
			</div>
			<div class="modal-body">
				<form role="form">
                    <div class="form-group">
                        <textarea name="content" class="form-control" rows="5" id="weibo_post_content" placeholder="发表些什么吧.........."></textarea>
                     </div>
                </form>
              <!--显示图片的区域-->  
        <div id="uploadimg-div" style="display: none;">
        	<div class="thumbnails">
        	    <img class="thumbnails" id="uploadweibo_image" style="width: 100%;"/>
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
	<!--Session block-->
	<div id="sessionblock">
		<div class="container-fluid">
		    <div class="row">
		    </div>
		</div>
	</div>
	<!--js block-->
	<script>
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
	 	    var Url="/xiangmu/YooZu/index.php/Usercenter/Public/accept_weibo";
	 	    var postdata={
	 		  content:$("#weibo_post_content").val(),
	 		  attach_id:$('#uploadweibo_image').attr('attach_id'),
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
	 		setTimeout(function(){
	 			$('#weibo_list').prepend(result.html);
	 			$('#myWeibolist').prepend(result.html);
	 		},1000);
	 	}
	  });
	  $('#uploadweibo_image').attr('attach_id','');
	 }
	 
	 });
	</script>
	
	
	
	

		<div class="container">
			<div class="row">
				
		    <!------------------------广告位TODO---------------------------------------------------------->
			<div class="usc_left_column-weibo col-sm-8 col-md-8">
				<div id="weibo_list">
					<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$weibo): $mod = ($i % 2 );++$i; echo W('WeiboDetail/detail',array('weibo'=>$weibo)); endforeach; endif; else: echo "" ;endif; ?>
<script>
	lastId='<?php echo ($lastId); ?>';
</script>
				</div>
				<div id="load_weibo" class="text-center text-muted">        
					<p id="load_more_text">载入更多</p>
				</div>
			</div>
			
			<!--user's information list-->
			<div class="usc_right_column-recommendation col-sm-4 col-md-4">
			   <div class="panel panel-default recommendation-panel">
	<div class="panel-heading recommendation-panel-heading">
		<h3><strong>推荐的活动</strong></h3>
	</div>
	<div class="panel-body recommendation-panel-body">
	    <ul class="list-group recommendation-panel-list-group">
            <?php if(is_array($rlist)): $i = 0; $__LIST__ = $rlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$weibo): $mod = ($i % 2 );++$i;?><li class="list-group-item recommendation-group" id="recommend_weibo_<?php echo ($weibo["id"]); ?>" data-url = "<?php echo U('Public/profilecard',array('weibo'=>$weibo[id]));?>">
	                <a href="#" id="recommendation-uavatar-<?php echo ($weibo["id"]); ?>"><img src="<?php echo ($weibo["user"]["avatar64"]); ?>"/></a>
	                <span class="list-group-item-weibocontent"><?php echo ($weibo["content"]); ?></span>
	                <span class="fa fa-plus-square btn pull-right" id="plus_<?php echo ($weibo["id"]); ?>" aria-hidden="true" style="font-size: 45px;color: #999999;"></span>
                </li>
    <script type="text/javascript"> 
    $(function(){
        $('#recommendation-uavatar-<?php echo ($weibo["id"]); ?>').webuiPopover({
			trigger:'hover',
			placement: 'bottom',
			container:'#recommendation-uavatar-<?php echo ($weibo["id"]); ?>',
			type:'async',
            url:$('#recommend_weibo_<?php echo ($weibo["id"]); ?>').attr('data-url'),
		    offsetTop:40,// offset the top of the popover
            offsetLeft:20,
            animation:'pop',
            arrow:false,
            width:400,
            padding:false,
		});
		
		$('#plus_<?php echo ($weibo["id"]); ?>').mouseover(function(){
			$(this).css('color','#787878');
		});
		$('#plus_<?php echo ($weibo["id"]); ?>').mouseleave(function(){
			
			$(this).css('color','#999999');
		});
		
		$('#recommend_weibo_<?php echo ($weibo["id"]); ?>').mousemove(function(){
			$(this).css('background-color','#253E5A');
		});
		
		$('#recommend_weibo_<?php echo ($weibo["id"]); ?>').mouseleave(function(){
			$(this).css('background-color','#36465d');
		});
    });
		</script><?php endforeach; endif; else: echo "" ;endif; ?> 
        </ul>
    </div>
</div>
			   <div class="panel weeklytalk-panel">
			   	    <h3>每周话题</h3>
			   	    <span class="weeklytalk-text-span"><p>你会做出什么选择？</p></span>
			        <div class="weeklytalk-img-span">
			            <a href="#" id="weeklytalk-img"><img src="/xiangmu/YooZu/Public/Usercenter/image/giphy.gif"/></a>	
			        </div>
			        <div class="weeklytalk-option-div panel">
			        	<div class="panel-body">
			        	<a href=""><span class="fa fa-thumbs-o-up pull-left"><i class="weeklytalk-support-count">:3</i></span></a>
			        	<a href=""><span class="fa fa-thumbs-down pull-right"><i class="weeklytalk-dismiss-count">:4</i></span></a>
			        	</div>
			        </div>
			   </div>
			</div>
		</div>
		</div>
	</body>
	<script>
	    var isLoadingWeibo=false;
	    var noMoreweibo = false; 
	    //
	    var loadCount = 1;
        var lastId = '<?php echo ($lastId); ?>';
		$(document).ready(function(){
			//gun dong di bu shi
			$(window).on('scroll',function(){
				if(noMoreweibo){
					return ;
				}
				if(isLoadingWeibo){
					return ;
				}
				if (isLoadMoreVisible()){
					loadCount=loadCount+1;
                    loadWeiboList(loadCount,lastId);
                 }
			});
			$(window).trigger('scroll');
		});
		
	//js function
    function isLoadMoreVisible()
{
	var visibleHeight=$(window.top).height();
	var loadMoreOffset = $('#load_weibo').offset(); 
    return visibleHeight + $(window).scrollTop() > loadMoreOffset.top;
}

    function loadWeiboList(loadCount,lastId){

    isLoadingWeibo = true;
    var url="/xiangmu/YooZu/index.php/Usercenter/Public/loadweibo";
    $('#load_more_text').text('load more...');
    $.post(url, {loadCount:loadCount,lastId:lastId}, function (result) {
        if (result.status == 0) {
            noMoreweibo = true;
            $('#load_more_text').text('没有了');
        }else{
        $('#weibo_list').append(result);
        $('#load_more_text').text('');
        isLoadingWeibo = false;
        }
    });
}
	</script>
</html>