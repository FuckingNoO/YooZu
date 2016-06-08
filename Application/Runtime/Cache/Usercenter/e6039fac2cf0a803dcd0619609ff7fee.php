<?php if (!defined('THINK_PATH')) exit();?>    	<?php $weiboCommentTotalCount = $weibo['comment_count']; ?>
    	<a href="javascript:void(0)" class="comment-commit-btn" id="comment_btn_<?php echo ($weiboId); ?>" 
    		data-weibo-id="<?php echo ($weiboId); ?>" comment-count="<?php echo ($weiboCommentTotalCount); ?>" data-toggle="modal" data-target="#commentblock"> 	
    	   	<img src="/xiangmu/YooZu/Public/Usercenter/image/comment_32.109589041096px_1195191_easyicon.net.png"/>
      	</a>
      	<span id="comment_count_<?php echo ($weiboId); ?>"><?php echo ($weiboCommentTotalCount); ?></span>
      
      
      <!--JavaScript Section-->
      	<script type="text/javascript">
      	
      	$(function(){
      		$('#comment_btn_<?php echo ($weiboId); ?>').on('click',function(){
      			
      			var weiboid=$(this).attr('data-weibo-id');
      			var weibocommentcount=<?php echo ($weiboCommentTotalCount); ?>;
      			$('#commentblock').attr('data-weibo-id',weiboid);
      			$('#commentblock').attr('data-weibo-comment-count',weibocommentcount);
      			
      	        $.post('/xiangmu/YooZu/index.php/Usercenter/Profile/loadComment',{weibo_id:'<?php echo ($weiboId); ?>'},function(result){ 
      	        	if(result.status==0)
                    	$('#weibo_comment_list').text('no comments! :D');
                    else
                     	$('#weibo_comment_list').html(result);
      	        });
      		});
      		
      	});
      	</script>