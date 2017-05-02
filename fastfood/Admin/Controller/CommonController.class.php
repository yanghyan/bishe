<?php
//公共控制器类
namespace Admin\Controller;
use Think\Controller;
class CommonController extends Controller {
    //判断是否登录（检测session）
	public function _initialize(){
       	//判断是否登录
        $user = session("adminuser");
       	if (empty($user)) {
       		$this->redirect("Public/login");
       		exit;
       	}
    }
}