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
	
	
	
	
	
	
	
	
	

		<title>编辑资料</title>
	    <link rel="stylesheet" type="text/css" href="/xiangmu/YooZu/Public/Usercenter/css/usereditor.css"/>
	    <link rel="stylesheet" href="/xiangmu/YooZu/Public/static/Jcrop/css/jquery.Jcrop.min.css" />
	    <script type="text/javascript" src="/xiangmu/YooZu/Public/static/Jcrop/js/jquery.Jcrop.min.js"></script>
	    <script type="text/javascript" src="/xiangmu/YooZu/Public/static/browser/jquery.browser.js"></script>
	    <script type="text/javascript" src="/xiangmu/YooZu/Public/static/form/jquery.form.js"></script>
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
	 	    var Url="/xiangmu/YooZu/index.php/Usercenter/Editor/accept_weibo";
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
	 		    $.post('/xiangmu/YooZu/index.php/Usercenter/Editor/dosendComment',
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
	
	
	
	

			<div class="container">
				<div class="panel panel-default">
				    <div class="panel-heading">
				    	<h2>个人设置</h2>
				    </div>
					<div class="panel-body">
						<ul class="list-group">
							<li class="list-group-item"><span class="">基本资料</span>
							    <a data-toggle="collapse" href="#collapse1"><span class="badge pull-right">编辑</span></a> 
								<div id="collapse1" class="panel-collapse collapse">
    <div class="panel-body">
        <form action="" method="post">
            <input type="text" name="" id="" value="" class="input-group"/>
            <input type="number" name="" id="" value="" class="input-group"/>
            <input type="checkbox" name="" id="" value="" class="input-group"/>
            <input type="submit" value=""/>
         </form>
    </div>
</div> 
<script type="text/javascripts">
	
</script>

							</li>
							<li class="list-group-item"><span class="">扩展资料</span>
								<a data-toggle="collapse" href="#collapse2"><span class="badge pull-right">编辑</span></a>
						            <div id="collapse2" class="panel-collapse collapse">
        <div class="panel-body">
            <h2>兴趣爱好</h2>
             <textarea name="" rows="10" cols="10"></textarea>
            </div>
    </div>
    <script type="text/javascript">
    	
    </script>   
							</li>
							<li class="list-group-item"><span class="">修改头像</span>
								<a data-toggle="collapse" href="#collapse3"><span class="badge pull-right">编辑</span></a>
                                <style>
        .jcrop-holder > div > div {
            border-radius: 50%;
        }
</style>
<?php $user = query_user(array('avatar128')); ?>
<div id="collapse3" class="panel-collapse collapse">
  <div class="panel-body">
    <div class="panel-body-rightcolumn">
      <div class="row">
        <div class="panel-body-leftcolumn col-lg-6 col-md-6">
          <h3>当前头像</h3>
          <img src="<?php echo ($user["avatar128"]); ?>" alt="" width="100px" height="100px"/>
        </div>
      <div class="panel-body-rightcolumn col-lg-6 col-md-6">
          <h4>设置新头像</h4>
          <p class="text-muted">支持jpg，png，gif，bmp等格式，可以在大照片中裁剪比较满意的部分</p>
          <form id="avatar_form" enctype="multipart/form-data" action="/xiangmu/YooZu/index.php/Usercenter/Editor/doUploadAvatar" method="post">
             <p class="hide"><input type="file" name="image" class="avatar-input"/></p>
            <div class="btn btn-primary" id="select_avatar_btn">更换头像</div>
            <p class="text-error" id="submitTip"></p>
          </form>
          <p id="upload_tip" class="text-danger"></p>
          <div id="uploaded_image_div" style="display: none;">
          		<div class="thumbnail">
                    <img id="uploaded_image" style="max-width: 100%;" class="thumbnails"/>
                </div>
                <p class="text-danger" id="save_avatar_tip"></p>
                <p>
                  <a class="btn btn-primary" id="save_avatar_button" data-url="<?php echo U('Usercenter/Editor/doCropAvatar');?>">选区裁剪后保存头像</a>
                </p>
          </div>
      </div>
    </div>
  </div>
</div>
</div>
  <script type="text/javascript">
    var temp;
  $(function(){
  	var crop;
  	var jcrop_api;
  	
    	$('#select_avatar_btn').click(function(){
    		$('.avatar-input').trigger('click');
    	});
          
      $('.avatar-input').change(function(){	
          	$(this).parent().submit();
          });
           
      $('#avatar_form').on('submit',function(e){ 
      		e.preventDefault();
      		
      		$.ajax(this.action, {
                    files: $(":file", this),
                    iframe: true,
                    processData: false
      		}).complete(function(data) {
      			 var json=data.responseJSON;
      			 
      			 $('#avatar_form').trigger('onJson',[json]);
      		});
      	});
      	
      	$('#avatar_form').bind('onJson',function(e,json){
      		 if (!json.success) {
                    $('#upload_tip').text(json.message);
               }
                //隐藏图片上传表单
                $('#avatar_form').hide();
                //显示图片内容
                $('#uploaded_image').attr('src', json.image);
                $('#uploaded_image_div').show();
              
                $('#uploaded_image').load(function () {
                    $('#uploaded_image').Jcrop({
                        aspectRatio: 1,
                        onSelect: updateCoordinate,
                        minSize: [64,64],
                        setSelect: [0,0,366,366]
                    },function(){
                        jcrop_api=this;
                        crop=jcrop_api.tellScaled();
                    });
                })
      	});
      	
      	function showAvatarTip(a){
      		$('#save_avatar_button').text(a);
      	}
      	
      	function updateCoordinate(c) {
                crop = c;
            }
      	
      		
      	$('#save_avatar_button').click(function(){
      		   if(crop.w==undefined||crop.w==0){
      		   	$('#save_avatar_tip').text('请先选出您需要的部分');
      		   	return ;
      		   }
      		    
                //显示正在保存
                $(this).text('正在保存');
                $(this).addClass('disabled');

                //隐藏错误消息
                showAvatarTip('');
                
                var url=$(this).attr('data-url');
                var imageWidth=$('.jcrop-holder img').width();
                var imageHeight=$('.jcrop-holder img').height();
                var mycrop=crop.x / imageWidth + ',' + crop.y / imageHeight + ',' + crop.w / imageWidth + ',' + crop.h / imageHeight;
                $.post(url,{crop:mycrop},function(data){
                	if(data.status==1){
                		window.location.href = data.url;
                	}else{
                	showAvatarTip(data.info);
                  //恢复按钮
                  $('#save_avatar_button').text('保存头像');
                  $('#save_avatar_button').removeClass('disabled');
                  }
                });
  
      	});
  
  });
  </script>                             
  
							</li>
							<li class="list-group-item"><span class="">背景图片</span>
								<a data-toggle="collapse" href="#collapse4"><span class="badge pull-right">编辑</span></a>
								<div id="collapse4" class="panel-collapse collapse">
    <div class="panel-body">
        <div class="row">
            <div class="panel-body-leftcolumn col-lg-6 col-md-6">
                <h3>当前背景图</h3>
                    <img src="/xiangmu/YooZu/Public/Usercenter/image/003.jpg" alt="" width="200px" height="100px"/>
            </div>
        <div class="panel-body-rightcolumn col-lg-6 col-md-6">
            <h4>设置新背景</h4>
            <p class="text-muted">支持jpg，png，gif，bmp等格式，可以在大照片中裁剪比较满意的部分</p>
            <form action="/xiangmu/YooZu/index.php/Usercenter/Editor/doUploadAvatar" method="post" enctype="multipart/form-data" id="bg-form">
            <p class="hide"><input type="file" name="image" class="bg-input"/></p>
            <div class="btn btn-primary" id="select_bg_file">更换背景</div>
        </form>
         <p class="bg-text-error"></p>
        <div id="bg-uploaded-div" style="display: none;">
         <div class="thumbnails">	
        	<img id="upload_bg_img" style="max-width: 100%;" class="thumbnails"/>
        </div>	
        	<p class="bg-text-danger"></p>
        	<div class="btn btn-default" id="select_bg_btn">保存背景</div>
        </div>	
         </div>
    </div>   
</div>
</div>
<script type="text/javascript">
$(function(){
		
	$('#select_bg_file').click(function(){
	    $('.bg-input').trigger('click');
	});
	
	$('.bg-input').change(function(){
		$('#bg-form').submit();
	});
	
	$('#bg-form').on('submit',function(e){
		e.preventDefault();
		
		$.ajax(this.action,{
			files:$(':file',this),
			iframe:true,
			processdata:false
		}).complete(function(data){
			var json=data.responseJSON;
			$('#bg-form').trigger('onJson',[json]);
		});
	});
	     $('#bg-form').bind('onJson',function(e,json){
	     	if(!json.success){
	     		$('.bg-text-error').text(json.message); 
	     	}
	     	$('#bg-form').hide();
	     	$('#upload_bg_img').attr('src',json.image);
	     	$('#bg-uploaded-div').show();
	     });
	     
	     $('#select_bg_btn').on('click',function(){
	     	window.location.href=location.href;
	     });
	
});
</script>

							</li>
							<li class="list-group-item"><span class="">更改密码</span>
								<a data-toggle="collapse" href="#collapse5"><span class="badge pull-right">编辑</span></a>
                                <div id="collapse5" class="panel-collapse collapse">
    <div class="panel-body">
        <form action="" method="post">
            <input type="" name="" id="" value="" />
            <input type="" name="" id="" value="" />
            <input type="submit" value=""/>
        </form>
    </div>
</div>
<script type="text/javascript">
	
</script>

							</li>
						</ul>
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

		<script type="text/javascript">

		</script>
	</body>
</html>