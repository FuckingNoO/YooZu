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
<script src="/xiangmu/YooZu/Public/static/jquery.iframe-transport.js" type="text/javascript"></script>
<script type="text/javascript" src="/xiangmu/YooZu/Public/static/WebUIpopover/js/jquery.webui-popover.js"></script>


<!--
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
	 	    var Url="/xiangmu/YooZu/index.php/Usercenter/Editor/accept_weibo";
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
                                <div id="collapse3" class="panel-collapse collapse">
  <div class="panel-body">
    <div class="panel-body-rightcolumn">
      <div class="row">
        <div class="panel-body-leftcolumn col-lg-6 col-md-6">
          <h3>当前头像</h3>
          <img src="/xiangmu/YooZu/Public/Usercenter/image/012.jpg" alt="" width="100px" height="100px"/>
        </div>
      <div class="panel-body-rightcolumn col-lg-6 col-md-6">
          <h4>设置新头像</h4>
          <p class="text-muted">支持jpg，png，gif，bmp等格式，可以在大照片中裁剪比较满意的部分</p>
          <form id="avatar_form" enctype="multipart/form-data" action="/xiangmu/YooZu/index.php/Usercenter/Editor/doUploadAvatar" method="post">
             <p class="hide"><input type="file" name="image" class="avatar-input"/></p>
            <div class="btn btn-primary" id="select_avatar_btn">更换头像</div>
            <!--<input type="submit" value="submit" id="submit_btn"/>-->
            <p class="text-error" id="submitTip"></p>
          </form>
          <p id="upload_tip" class="text-danger"></p>
          <div id="uploaded_image_div" style="display: none;">
          		<div class="thumbnail">
                    <img id="uploaded_image" style="width: 100%;" class="thumbnails"/>
                </div>
                <p class="text-danger" id="save_avatar_tip"></p>
                <p>
                  <a class="btn btn-primary" id="save_avatar_button" data-url="<?php echo U('UserCenter/Config/doCropAvatar');?>">选区裁剪后保存头像</a>
                </p>
          </div>
      </div>
    </div>
  </div>
</div>
</div>
  <script type="text/javascript">
  $(function(){
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
      	function updateCoordinate(c) {
                crop = c;
            }
  
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
        <div class="btn btn-primary" id="select_bg_btn">更换背景</div>
         </div>
    </div>   
</div>
</div>
<script type="text/javascript">
		$('#select_bg_btn').click(function(){
	            $('[name=image]').trigger('click');
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