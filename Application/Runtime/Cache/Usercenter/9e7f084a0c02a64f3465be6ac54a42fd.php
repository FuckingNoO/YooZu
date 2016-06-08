<?php if (!defined('THINK_PATH')) exit();?><li class="w3-padding-16" id="comment_<?php echo ($comment["id"]); ?>" style="height: auto;">
    <?php if($comment["can_delete"] == 1): ?><span id="comment_delete_btn_<?php echo ($comment["id"]); ?>" class="w3-closebtn w3-padding w3-margin-right w3-medium"><span class="fa fa-times" aria-hidden="true"></span></span><?php endif; ?>
    <img src="<?php echo ($comment["user"]["avatar128"]); ?>" class="w3-left w3-circle w3-margin-right" style="width:60px">
    <span class="w3-xlarge">Mike</span><br>
    <span><?php echo ($comment["content"]); ?></span>
</li>    
    
    
    <script type="text/javascript">
     $('#comment_delete_btn_<?php echo ($comment["id"]); ?>').on('click',function(){
     	$(this).parent().css('display','none');
     	var count=$(this).parent().parent().parent().parent().parent().parent().attr('data-weibo-comment-count');
     	var weiboid=$(this).parent().parent().parent().parent().parent().parent().attr('data-weibo-id');
     	var url="/xiangmu/YooZu/index.php/Usercenter/Public/dodeleteComment";
   	    $.post(url,{commentid:<?php echo ($comment["id"]); ?>},function(a){
   	  	    if(a.status==1){
   	  	    	$('#comment_count_'+weiboid).html(count--);
   	  	        alert(a.info);
   	  	    } 
   	 });
     	
});
</script>