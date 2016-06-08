<?php if (!defined('THINK_PATH')) exit();?>  <?php $UID=get_uid(); $bgimg=getUserBackground($pw[uid]); ?>
   <div class="w3-card-12 profilecard" style="width:100%;height: 100%;">
   	<div class="w3-display-container profilecard-display-container">
        <img src="<?php echo ($bgimg); ?>" alt="user-bg" style="width:100%"> 
        <?php if($pw["can_delete"] != 1): ?><div class="w3-display-topright w3-container profilecard-bg-square-right">
        	<a href="javascript:void(0);" class="profilecard-addfriend-btn" id="addfriend_<?php echo ($pw["id"]); ?>_btn">
        		<span class="fa fa-plus-square" style="font-size: 30px;margin-top: 10px;color: lightgoldenrodyellow;"><span>
        	</a>
        </div><?php endif; ?>
    </div>
        <div class="w3-container w3-center">
        	
            <img src="<?php echo ($pw["user"]["avatar128"]); ?>" width="90px" height="90px" style="border-radius: 6px;margin-top: 15px;"/>
            <h3>FuckingNoOB</h3>
            <h4>Thoughts from the shower. Usually stolen from showerthoughts.</h4><!-----TODO--------->  
        </div>
    </div>
    <!--editor modal-->
    <!--<div id="id01" class="w3-modal">
      <div class="w3-modal-content w3-animate-right w3-card-8">
        <header class="w3-container w3-teal"> 
          <span onclick="document.getElementById('id01').style.display='none'" 
            class="w3-closebtn">&times;</span>
        <h2>Modal Header</h2>
        </header>
      <div class="w3-container">
        <p>Some text..</p>
        <p>Some text..</p>
      </div>
      <footer class="w3-container w3-teal">
        <p>Modal Footer</p>
      </footer>
    </div>
</div>-->
    <!--js area-->	
    <script type="text/javascript">
    	//添加好友区域
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
    					return ;
    				}
    				alert(a.info);
    			});
    		});
    			
    	});
    </script>