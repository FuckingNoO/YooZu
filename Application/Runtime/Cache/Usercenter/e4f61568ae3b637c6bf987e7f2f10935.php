<?php if (!defined('THINK_PATH')) exit();?><form action="/xiangmu/YooZu/index.php/Usercenter/Editor/uploadImage" method="post" enctype="multipart/form-data" id="uploadimg-form">
<p class="hide"><input type="file" name="image" class="weiboimg_input"/></p>
</form>
<a href="javascript:void(0);">
	<span  class="fa fa-camera" aria-hidden="true" style="font-size: 50px;color: #B9BDB6;"></span>
</a>
<script type="text/javascript">
$(function(){
	var attach_id;

	 $('.fa-camera').on('click',function(){
	 	$('.weiboimg_input').trigger('click');
	 });
	 
	 $('.weiboimg_input').change(function(){
	    $('#uploadimg-form').submit();
	 });
	 
	 $('#uploadimg-form').on('submit',function(e){
	 	e.preventDefault();
	 	
	 	$.ajax(this.action,{
	 	    files:$(':file',this),
	 	    iframe:true,
	 		processData:false
	  	}).complete(function(data){
            var json=data.responseJSON;
   	 		$('#uploadimg-form').trigger('onJson',[json]); 
	 	});
	 });
	    
	    $('#uploadimg-form').bind('onJson',function(e,json){	
	    	   
	    	if(!json.success){
	            alert(json.message);
	    	}
	    	    $('#uploadimg-form').hide();
                $('#uploadweibo_image').attr('src',json.image);
                $('#uploadweibo_image').attr('attach_id',json.id);
	 	        $('#uploadimg-div').show();
	 	   });	 
});
</script>