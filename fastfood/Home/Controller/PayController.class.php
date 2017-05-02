<?php
//列表页管理
namespace Home\Controller;

//use Think\Controller;

class PayController extends CommonController {
    /*提交订单*/
	public function index(){
    	$menu = M("Menu"); //菜单
    	$user = M("Users"); //用户
    	$cart = M("Cart");  //购物车
    	$address = M("Address"); //用户地址

    	$sid = $_GET["sid"]; //详情页传过来的店铺id

		//遍历该用户在该店的购物车内容
		$u = session("homeuser");
		$uid = $u['id'];
		
		$map = array();
		$map["uid"] = array("eq",$uid);
		$map["sid"] = array("eq",$sid);
		$map["num"] = array("neq",0);

		$sum = 0;
		$i = 0;
        $total = 0;
		$cartlist = $cart->where($map)->select();
		foreach ($cartlist as $key => $value) {
			$cartlist[$key]["username"] = $u;
			$menuinfo = $menu->where("id=".$value["mid"])->select();
			foreach($menuinfo as $k => $v) {
				$cartlist[$key]["menu_pic"] = $v["menu_pic"];
				$cartlist[$key]["menu"] = $v["menu"];
				$cartlist[$key]["price"] = $v["price"];
				$cartlist[$key]["sum"] = $cartlist[$key]["num"]*$cartlist[$key]["price"];
				$cartlist[$key]["number"] += $i;
				$i++;
			}	
			$total += $cartlist[$key]["num"]*$cartlist[$key]["price"];

		}

		$number = count($cartlist);

		$order_num =  date('Ymd').substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8);

		//用户的收货地址
		$mapa = array();
		$mapa["uid"] = array("eq",$uid);
		$mapa["state"] = array("eq",0);
		$a = $address->where($mapa)->select();
		$addr = $a[0]["detail_add"];
		
		$this->assign("addr",$addr);
		$this->assign("number",$number);
		$this->assign("order_num",$order_num);
		$this->assign("cartlist",$cartlist);
		$this->assign("total",$total);
		$this->display("Pay/index");
    }

    public function addIndent(){
    	$indent = M("Indent");
    	$menu = M("Menu");
    	$_POST["start_time"] = time();
    	$_POST["state"] = 1;
    	//在订单表中添加相应的信息
    	if(!$indent->create()){
			$this->error($indent->getError());
		}
		$m = $indent->add();
		//在菜单表中修改对应菜的已售出数量
		$map = array();
		$map["sid"] = array("eq",$_POST["sid"]);
		$map["id"] = array("eq",$_POST["mid"]);
		$menuinfo = $menu->where($map)->select();
		$_POST["id"] = $_POST["mid"];
		$_POST["num"] = $menuinfo[0]["num"]+$_POST["num"];
		if(!$menu->create()){
			$this->error($menu->getError());
		}
		$s = $menu->save();
		if($m>0){
			$indent = $indent->find($m);
			$this->ajaxReturn($indent,'json');
		}else{
			$this->ajaxReturn(null,'json');
		}
    }
}