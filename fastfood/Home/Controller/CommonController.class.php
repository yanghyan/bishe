<?php
//公共控制器类
namespace Home\Controller;
use Think\Controller;
class CommonController extends Controller {
    //判断是否登录（检测session）
	public function _initialize(){
       	//判断是否登录
        $user = session("homeuser");
       	if (empty($user)) {
            $type = $_GET["url"];
            $id = $_GET["id"];
       		$this->redirect("Public/index",array("type"=>$type,"id"=>$id));
       		exit;
       	}
    }
}