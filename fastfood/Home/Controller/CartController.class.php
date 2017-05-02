<?php
//购物车管理
namespace Home\Controller;
class CartController extends CommonController {
    //遍历购物车中的所有菜（某家店铺）
	public function index(){
        $this->display("Detail/index");
    }
	public function addCart($mid=0){
    	$menu = M("Menu");
		$cart = M("Cart");
		$users = M("Users");
		
		$menuinfo = $menu->find($mid);
	//var_dump($menuinfo);exit;
		//session("homeuser","lilei123");
		$user = session("homeuser");
		$uname = $users->where("username='".$user."'")->select();
		foreach ($uname as $k => $v) {
			$uid = $uname[$k]['id'];
		}
		$map = array();
		$map["uid"] = array("eq",$uid);
		$map["sid"] = array("eq",$menuinfo["sid"]);
		$map["mid"] = array("eq",$mid);
		$_POST["uid"] = $uid;
		$_POST["sid"] = $menuinfo["sid"];
		$_POST["addtime"] = time();
		$cartlist = $cart->where($map)->select();
		$cartinfo = array();
		if(!empty($cartlist)){
		//if(!empty($cartlist) || $cartlist[0]["num"]==0 ){
			$_POST["id"] = $cartlist[0]["id"];
			$_POST["num"] = $cartlist[0]["num"]+1;
			if(!$cart->create()){
				$this->error($mod->getError());
			}
			$m = $cart->save();
			if($m>0){
				$cartinfo = $cart->find($cartlist[0]["id"]);
				$cartinfo["menu"] = $menuinfo["menu"];
				$cartinfo["price"] = $menuinfo["price"];
				$cartinfo["b"] = 1;
				$this->ajaxReturn($cartinfo,"json");
 			}else{
 				$this->ajaxReturn(null,'json');
 			}
		}else{
			$_POST["num"] = 1;
			if(!$cart->create()){
				$this->error($mod->getError());
			}
			$m = $cart->add();
			if($m>0){
				$cartinfo = $cart->find($m);
				$cartinfo["menu"] = $menuinfo["menu"];
				$cartinfo["price"] = $menuinfo["price"];
				$cartinfo["b"] = 2;
				//var_dump($cartinfo);exit;
				$this->ajaxReturn($cartinfo,"json");
			}else{
				$this->ajaxReturn(null,'json');
			}
		}
	}

	//购物车减一
	public function minusCart($mid=0){
		$menu = M("Menu");
		$cart = M("Cart");
		$users = M("Users");
		
		$menuinfo = $menu->find($mid);

		//session("homeuser","lilei123");
		$user = session("homeuser");
		$uname = $users->where("username='".$user."'")->select();
		foreach ($uname as $k => $v) {
			$uid = $uname[$k]['id'];
		}
		$map = array();
		$map["uid"] = array("eq",$uid);
		$map["sid"] = array("eq",$menuinfo["sid"]);
		$map["mid"] = array("eq",$mid);

		$_POST["uid"] = $uid;
		$_POST["sid"] = $menuinfo["sid"];
		$_POST["addtime"] = time();
		$cartlist = $cart->where($map)->select();
		
		$cartinfo = array();
		if(!empty($cartlist)){
			$_POST["id"] = $cartlist[0]["id"];
			//var_dump($cartlist);exit;
			if($cartlist[0]["num"]>0){
				$_POST["num"] = $cartlist[0]["num"]-1;
			}
			//var_dump($_POST["num"]);exit;
			if(!$cart->create()){
				$this->error($mod->getError());
			}
			$m = $cart->save();

			if($m>0){
				$cartinfo = $cart->find($cartlist[0]["id"]);
				$cartinfo["menu"] = $menuinfo["menu"];
				$cartinfo["price"] = $menuinfo["price"];
				//var_dump($cartinfo);exit;
				$this->ajaxReturn($cartinfo,"json");
 			}else{
 				$this->ajaxReturn(null,'json');
 			}
		}
	}

	//清空购物车
	public function doClear(){
		$cart = M("Cart");
		$user = M("Users");

		if($_POST["sid"]){
			//session("homeuser","lilei123");
			$u = session("homeuser");
			$uname = $user->where("username='".$u."'")->select();
			foreach ($uname as $k => $v) {
				$uid = $uname[$k]['id'];
			}
			$map = array();
			$map["uid"] = array("eq",$uid);
			$map["sid"] = array("eq",$_POST["sid"]);

			$m = $cart->where($map)->delete();

			$data = array();
	        if($m>0){
	            $data['b'] = true;
	        }else{
	            $data['b']= false;
	        }
			$data["sid"] = $_POST["sid"];
	        $this->ajaxReturn($data,"json");
		}
	}
	//执行添加，加入购物车
	public function insert(){
		
	}
	
	//删除某个菜
	public function dodel(){
		
	}
	
	//清空购物车
	public function dodelAll(){
		
	}
	
	//某个菜的数量加操作
	public function doPlus(){
		
	}
	
	//某个菜的数量减操作
	public function doMinus(){
		
	}
}