<?php if (!defined('THINK_PATH')) exit();?><div class="row" id="weibo_<?php echo ($weibo["id"]); ?>">
<!--Avatar-->
    <div class="col-md-2 col-sm-2 col-xs-12 text-center" style="position: relative;">
    	<a href="javascript:void(0);" id="user_avatar_<?php echo ($weibo["id"]); ?>">
    		<img src="/xiangmu/YooZu/Public/home/image/nobody.jpg" width="90px" height="90px"/>	
    	</a>
    </div> 

<!--Content-->
    <div class="col-md-10 col-sm-10 col-xs-12 panel panel-default" id="weibo_content_list">
    	<div class="panel-heading row">
    		<p>nihao</p>
    	</div>
    	
    	<div class="panel-body row">
    		<a>
    			<img alt="image" src="/xiangmu/YooZu/Public/Usercenter/image/proxy.jpg" width="100%" height="100%"/>
    		</a>
    		<?php echo ($weibo["fetchContent"]); ?>
    	</div>
    	<div class="panel-footer row">
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
    	$.post('/xiangmu/YooZu/index.php/Usercenter/Profile/dodeleteWeibo',{weiboid:'<?php echo ($weibo["id"]); ?>'},function(result){
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
			$('#user_avatar_'+'<?php echo ($weibo["id"]); ?>').webuiPopover({
				trigger:'hover',
				placement: 'right',
				container:'#user_avatar_'+'<?php echo ($weibo["id"]); ?>',
				content:'1234567891011111111111',
				offsetTop:70,// offset the top of the popover
                offsetLeft:20,
                animation:'pop',
                multi:true,
			   });
			});
	</script>