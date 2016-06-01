<?php if (!defined('THINK_PATH')) exit();?>    	<?php $weiboCommentTotalCount = $weibo['comment_count']; ?>
    	<a href="javascript:void(0)" class="comment-commit-btn" id="comment_btn_<?php echo ($weiboId); ?>" data-weibo-id="<?php echo ($weiboId); ?>" comment-count="<?php echo ($weiboCommentTotalCount); ?>"> 	
    	   	<img src="/xiangmu/YooZu/Public/Usercenter/image/comment_32.109589041096px_1195191_easyicon.net.png"/>
      	</a>
      	<span id="comment_count_<?php echo ($weiboId); ?>"><?php echo ($weiboCommentTotalCount); ?></span>
      <!--Comment section-->
      <div id="comment_block_<?php echo ($weiboId); ?>" style="display: none;width: 400px;height: 400px;background-color: #AFAFAF;">
      	<div class="container">
      	    <div class="row comment-block-header">
      	        write something here :D
      		</div>
      	    <div class="row comment-block-body" id="comment_list_<?php echo ($weiboId); ?>">
                 <!--list weibo comments -->
      	    </div>
      	    <div  class="row comment-block-footer">
      	      <textarea name="content" rows="1" cols="20" id="commentpostcontent_<?php echo ($weiboId); ?>"></textarea>
      	      <button id="cmt_send_btn_<?php echo ($weiboId); ?>">Submit</button>
      	    </div>
      	</div>
      </div>  
      
      <!--JavaScript Section-->
      	<script>
      	$('#comment_btn_' + '<?php echo ($weiboId); ?>').click(function(e){
      			var mousePos = mousePosition(e);  
                var  xOffset = 20;  
                var  yOffset = 25;  
                $('#comment_block_'+'<?php echo ($weiboId); ?>').css("display","block").css("position","absolute").css("top",(mousePos.y - yOffset) + "px").css("left",(mousePos.x + xOffset) + "px");
   		        $.post('/xiangmu/YooZu/index.php/Usercenter/Public/loadComment',{weibo_id:'<?php echo ($weiboId); ?>'},function(result){ 
                       if(result.status==0){
                       	$('#comment_list_'+'<?php echo ($weiboId); ?>').text('no comments! :D');}
                       else{
                       	$('#comment_list_'+'<?php echo ($weiboId); ?>').html(result);}
      		    });
          });
          
          //send comment btn
      		$('#cmt_send_btn_'+'<?php echo ($weiboId); ?>').click(function(){
      			var commentcount=$('#comment_btn_'+'<?php echo ($weiboId); ?>').attr('comment-count');
      			    $.post('/xiangmu/YooZu/index.php/Usercenter/Public/dosendComment',
      			   {
      				weibo_id:'<?php echo ($weiboId); ?>',
      				content:$('#commentpostcontent_'+'<?php echo ($weiboId); ?>').val(),
      			    },  
      			    function(data){
      				if(data.status){
      					$('#comment_list_'+'<?php echo ($weiboId); ?>').prepend(data.html);
      					$('#commentpostcontent_'+'<?php echo ($weiboId); ?>').val('');
      					alert(data.info);
      					commentcount++;
      					$('#comment_count_'+'<?php echo ($weiboId); ?>').html(commentcount);
      				}	
      			});
      		});
      		//send comments to php server
      		
      		//acquire the mouse offset
      		function mousePosition(ev){   
                ev = ev || window.event;   
                if(ev.pageX || ev.pageY){   
                return {x:ev.pageX, y:ev.pageY};   
                }   
                return {   
                x:ev.clientX + document.body.scrollLeft - document.body.clientLeft,   
                y:ev.clientY + document.body.scrollTop - document.body.clientTop   
                };  
            }
      	</script>