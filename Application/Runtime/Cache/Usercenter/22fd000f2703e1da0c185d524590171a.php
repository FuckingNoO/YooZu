<?php if (!defined('THINK_PATH')) exit();?><div class="row" id="weibo_<?php echo ($weibo["id"]); ?>">
<!--Avatar-->
    <div class="col-md-2 col-sm-2 col-xs-12 text-center" style="position: relative;">
    	<a href="javascript:void(0);" id="user_avatar_<?php echo ($weibo["id"]); ?>">
    		<img src="<?php echo ($weibo["user"]["avatar128"]); ?>" style="width: 90px; border-radius: 20px;"/>
    	</a>
    </div> 
<!--Content-->
    <div class="col-md-10 col-sm-10 col-xs-12 panel panel-default" id="weibo_content_list">
    	<div class="panel-heading row">
    		<p style="font-size: 20px;">斑马斑马</p>
    	</div>
    	
    	<div class="panel-body row">
    		<?php if($weibo.is_attachimg): ?><a href="javascript:void(0);"><img src="<?php echo ($weibo["imgurl"]); ?>" width="100%" height="100%"/></a><?php endif; ?>
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
			$('#user_avatar_'+'<?php echo ($weibo["id"]); ?>').webuiPopover({
				trigger:'hover',
				placement: 'auto',
				container:'#user_avatar_'+'<?php echo ($weibo["id"]); ?>',
				title:'title',
				type:'async',
                url:'https://api.github.com/',
                content:function(data){
                            var html = '<ul>';
                            for(var key in data){html+='<li>'+data[key]+'</li>';}
                            html+='</ul>';
                            return html;
                },
				offsetTop:70,// offset the top of the popover
                offsetLeft:20,
                animation:'pop',
                arrow:false,
                multi:true,
			   });
			});
	</script>