<?php if (!defined('THINK_PATH')) exit();?><div class="row" id="weibo_<?php echo ($weibo["id"]); ?>">
<!--Avatar-->
    <div class="col-md-2 col-sm-2 col-xs-12 text-center" id="user_avatar" style="position: relative">
    	<a href="">
    		<img src="/xiangmu/YooZu/Public/home/image/nobody.jpg"/>	
    	</a>
    </div> 
    
<!--Content-->
    <div class="col-md-10 col-sm-10 col-xs-12" id="weibo_content_list">
    	<div class="weibo_post_header row">
    		
    	</div>
    	
    	<div class="weibo_post_body row">
    		<?php echo ($weibo["fetchContent"]); ?>,hello
    	</div>
    	<div class="weibo_post_footer row">
    		
    	</div>
    </div>
</div>