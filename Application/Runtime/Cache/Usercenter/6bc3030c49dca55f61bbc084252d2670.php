<?php if (!defined('THINK_PATH')) exit();?><div class="row" id="good_<?php echo ($good["id"]); ?>" style="margin-top: 20px;" data-url="<?php echo U('Public/profilecard',array($good[id]));?>">
	
	<!--用于显示用户的信息与头像-->
	<div class="col-md-3 col-sm-3">
		<a href="#" class='good_user_avatar' id="good_useravatar_<?php echo ($good["id"]); ?>"><img src="<?php echo ($good["user"]["avatar128"]); ?>" style="border-radius: 10px;width: 90px;"/></a>
	</div>
	<!--用于显示商品的信息-->
  <div class="col-md-9 col-sm-9 panel panel-default"> 
  	<div class="panel-heading">
  		<h2>我的自行车</h2>
  	</div>
  	<div class="panel-body">
  	<div class="goods_img_<?php echo ($good["id"]); ?>">
  		<a href="javascript:void(0)"><img src="<?php echo ($good["imgurl"]); ?>" alt="" width="100%"/></a>
  	</div>	
  		<!--商品的详细信息-->
  		<?php echo ($good["fetchContent"]); ?>
  	</div>
  	<div class="panel-footer">
  	</div>
  </div>
</div>

<script type="text/javascript">
	$(function(){

        //调用悬浮框插件
		$('#good_useravatar_<?php echo ($good["id"]); ?>').webuiPopover({
		    trigger:'hover',
			placement: 'bottom-right',
			container:'#good_useravatar_<?php echo ($good["id"]); ?>',
			type:'async',
            url:$('#good_<?php echo ($good["id"]); ?>').attr('data-url'),
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