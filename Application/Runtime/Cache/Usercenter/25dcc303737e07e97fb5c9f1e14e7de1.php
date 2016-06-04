<?php if (!defined('THINK_PATH')) exit();?>    <?php $UID=get_uid() ?>
    <div id="userblock_<?php echo ($pw["id"]); ?>" class="panel panel-default" style="padding: 10px;padding: 0px;">
	    <div class="panel-heading" style="padding: 0px;">
			<a href="#"><img src="/xiangmu/YooZu/Public/Usercenter/image/003.jpg" alt="003.jpg" width="100%" height="100%"/></a>
	    </div>
        <div class="panel-body" id="user-block">
                     <a href="#" class=""><img src="<?php echo ($pw["user"]["avatar128"]); ?>" width="68px" height="68px" style="border-radius: 10px;"/></a>
                     <label><strong>NickName:</strong></label><a href="#" class="pull-right">1234</a>
                        <div class="btn user-add-btn pull-right" id="addfriend_<?php echo ($pw["id"]); ?>_btn" <?php if($UID == $pw['uid']): ?>style="display :none;"<?php endif; ?>>
                     	<span class="fa fa-plus-square" style="font-size: 30px;margin-top: 10px;"><span></div>
        </div>
        <div class="panel-footer"> 
                    <ul class="ProfileCardStats-statList">             <!------   css TODO      ------->
                    	<li class="ProfileCardStats-stat"><a href="#" class="ProfileCardStats-statLink">
                    		<span class="ProfileCardStats-statLabel">Activities</span>
                    		<span class="ProfileCardStats-statValue">1</span>
                    	</a></li>
                        <li class="ProfileCardStats-stat"><a href="#" class="ProfileCardStats-statLink">
                        	<span class="ProfileCardStats-statLabel">Following</span>
                        	<span class="ProfileCardStats-statValue">0</span>
                        </a></li>
                        <li class="ProfileCardStats-stat"><a href="#" class="ProfileCardStats-statLink">
                        	<span class="ProfileCardStats-statLabel">Followers</span>
                            <span class="ProfileCardStats-statValue">3</span>
                        </a></li>
                    </ul>  
        </div>
    </div>
    <script type="text/javascript">
    	//
    	$(function(){
    		$('#addfriend_<?php echo ($pw["id"]); ?>_btn').on('click',function(){
    			var friendid=<?php echo ($pw["uid"]); ?>;
    			var Currentuid=<?php echo ($UID); ?>;
    			var url='/xiangmu/YooZu/index.php/Usercenter/Public/doaddFriendRequest';
    			var datalist={
    			   friendid:friendid,
    			   uid:Currentuid,
    			};
    			$.post(url,datalist,function(a){
    				if(a.status==0){
    					alert(a.info);
    				}
    				alert(a.info);
    			});
    		});
    			
    	});
    </script>