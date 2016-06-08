<?php if (!defined('THINK_PATH')) exit(); if(is_array($comment_list)): $i = 0; $__LIST__ = $comment_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$comment): $mod = ($i % 2 );++$i;?><ul class="w3-ul w3-card-4 comment-lists-group">
   	<?php echo W('Comment/comment_detail',array('comment'=>$comment));?>
   </ul><?php endforeach; endif; else: echo "" ;endif; ?>