<?php if (!defined('THINK_PATH')) exit();?><div class="row" id="weibo_<?php echo ($weibo["id"]); ?>" data-url = "<?php echo U('Public/profilecard',array('weibo'=>$weibo[id]));?>">
<!--Avatar-->
<?php $url=U('Public/profilecard',array('weibo'=>$weibo)); ?>
    <div class="col-md-2 col-sm-2 col-xs-12 text-center" style="position: relative;">
    	<a href="javascript:void(0);" id="user_avatar_<?php echo ($weibo["id"]); ?>">
    		<img src="<?php echo ($weibo["user"]["avatar128"]); ?>" class="weibo_user_avatar"/>
    	</a>
    </div> 
<!--Content-->
    <div class="col-md-10 col-sm-10 col-xs-12 panel panel-default weibo-content-panel" id="weibo_content_list">
    	<div class="panel-heading weibo-content-panel-heading">
    		<p class="weibo_title" id="weibo_title_<?php echo ($weibo["id"]); ?>">斑马斑马</p>
    	</div>
    	
    	<div class="panel-body weibo-content-panel-body">
    			<a href="javascript:void(0);"><img src="<?php echo ($weibo["imgurl"]); ?>" width="100%" height="100%" 
    			<?php if($weibo["imgurl"] == null): ?>style="display :none;"<?php endif; ?>/></a>
    		<div class="weibo_ftContent"><?php echo ($weibo["fetchContent"]); ?></div>
    	</div>
    	<div class="panel-footer">
    	  <div id="weibo_post_footer_content" class="pull-right">
    	  	<?php echo W('Support/support',array());?>
<?php echo W('Repost/repost',array());?>
<?php echo W('Comment/comment',array('comment'=>$weibo));?>
<?php if($weibo["uid"] == get_uid()): ?><a href="javascript:void(0);" id="setting-owner_<?php echo ($weibo["id"]); ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
	<img src="/xiangmu/YooZu/Public/Usercenter/image/setting_32px_1194517_easyicon.net.png"/></a><?php endif; ?>
  <ul class="dropdown-menu" id="dropdown_<?php echo ($weibo["id"]); ?>" aria-labelledby="dropdownMenu1">
    <li><a href="#" id="weibo_delete_<?php echo ($weibo["id"]); ?>">Delete</a></li>
    <li><a href="#">Another action</a></li>
  </ul>
  <script>
  	$('#weibo_delete_'+'<?php echo ($weibo["id"]); ?>').click(function(){
    	$.post('/xiangmu/YooZu/index.php/Usercenter/Public/dodeleteWeibo',{weiboid:'<?php echo ($weibo["id"]); ?>'},function(result){
    		if(result.status==1){
    			alert(result.info);
    			$('#weibo_'+'<?php echo ($weibo["id"]); ?>').empty();
    			$('#weibo_'+'<?php echo ($weibo["id"]); ?>').css("display","none");
    		}else{
    			alert(result.info);
    		}
    	});
   });
  </script>
    	

    	  </div>
    	</div>
    </div>
</div>
<!--JS-->
     <script type="text/javascript">
    $(function(){
    	//调用悬浮框插件
			$('#user_avatar_'+'<?php echo ($weibo["id"]); ?>').webuiPopover({
				trigger:'hover',
				placement: 'bottom-right',
				container:'#user_avatar_'+'<?php echo ($weibo["id"]); ?>',
				type:'async',
                url:$('#weibo_<?php echo ($weibo["id"]); ?>').attr('data-url'),
				offsetTop:70,// offset the top of the popover
                offsetLeft:20,
                animation:'pop',
                arrow:false,
                multi:true,
                width:400,
                padding:false,
			   });
			});
	</script>