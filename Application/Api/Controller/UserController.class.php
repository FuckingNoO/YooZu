<?php
	
    namespace Api\Controller;
	use Addons\Avatar\AvatarAddon;
	
	
	class UserController extends  ApiController{
/**
     * 上传头像并裁剪保存。
     * @param null $crop 字符串。格式为x,y,width,height，单位为像素
     */
    public function uploadAvatar($crop = null)
    {
        $this->requireLogin();
        //读取上传的图片
        $image = $this->getImageFromForm();
        //保存临时头像、裁剪、保存头像
        $uid = $this->getUid();
        $addon = new AvatarAddon();
        $result = $addon->upload($uid, $image, $crop);
        if (!$result) {
            $this->apiError(0, $addon->getError());
        }
        //返回成功消息
        $this->apiSuccess('头像保存成功');
    }	


    /**
     * 上传临时头像
     */
    public function uploadTempAvatar(){
        $this->requireLogin();
        //读取上传的图片
        $image = $this->getImageFromForm();
        //保存临时头像
        $uid = $this->getUid();
        $addon = new AvatarAddon();
        $result = $addon->uploadTemp($uid, $image);
        if (!$result) {
            $this->apiError(0, $addon->getError());
        }
        //获取临时头像
        $image = $addon->getTempAvatar($uid);
        //返回成功消息
        $this->apiSuccess('头像保存成功', null, array('image' => $image));
    }
	
	
	//从表格中获取图像
    private function getImageFromForm(){
        if (!$_FILES['image']) {
            $this->apiError(1103, '图像不能为空');
		}
        return $_FILES['image'];
    }
	
	public function applyAvatar($crop){
		$this->requireLogin();
        //裁剪、保存头像
        $addon = new AvatarAddon();
        $result = $addon->apply($this->getUid(), $crop);
        if (!$result) {
            $this->apiError(0, $addon->getError());
        }
        //返回成功消息
        $this->apiSuccess('头像保存成功');
	}
	
	
}
