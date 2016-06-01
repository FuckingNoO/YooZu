<?php if (!defined('THINK_PATH')) exit();?><a href="javascript:void(0)" id="support_btn_<?php echo ($weibo["id"]); ?>" data-weibo-id="<?php echo ($weibo["id"]); ?>">
	<img src="/xiangmu/YooZu/Public/Usercenter/image/heart_39.36690647482px_1197877_easyicon.net.png"/>
</a>
<span id="s_count_<?php echo ($weibo["id"]); ?>" support-count='<?php echo ($weibo["support_count"]); ?>'><?php echo ($weibo["support_count"]); ?></span>
<script type="text/javascript">
		$('#support_btn_'+'<?php echo ($weibo["id"]); ?>').click(function(){
			var weiboId=$('#support_btn_'+'<?php echo ($weibo["id"]); ?>').attr('data-weibo-id');
			var supportcount=$('#s_count_'+'<?php echo ($weibo["id"]); ?>').attr('support-count');
			$.post('/xiangmu/YooZu/index.php/Usercenter/Public/dosupport',
			{weiboid:weiboId},
			function(data){
				if(data.status==1){
					supportcount++;
					alert(data.info);
					$('#s_count_'+'<?php echo ($weibo["id"]); ?>').html(supportcount);
				}else{
					alert(data.info);
				}
			});
		});
</script>