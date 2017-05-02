<?php
//公共控制器类
namespace Home\Controller;
use Think\Controller;
class SCommonController extends Controller {
    //判断是否登录（检测session）
	public function _initialize(){
       	//判断是否登录
        $user = session("shopuser");
       	if (empty($user)) {
       		$this->redirect("Public/slogin");
       		exit;
       	}
    }
}