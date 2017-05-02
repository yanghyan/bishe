<?php
//详情页管理
namespace Home\Controller;
//use Think\Controller;
class DetailController extends CommonController {
	/*载入详情页*/
	//1.加载该店的基本信息find(id)
	//2.遍历该店的所有菜单（按所属分类）
    public function index(){
    	$mod = M("shop");  //店铺
    	$menu = M("Menu"); //菜单
    	$comment = M("Comment");  //评论
    	$tag = M("Tag");    //标签
    	$user = M("Users"); //用户
    	$cart = M("Cart");  //购物车
    	$collect = M("Collect");  //收藏

    	$id = $_GET['id'];
    	$info = $mod->find($id);
    	$cinfo = $comment->field("avg(score),count(uid)")->where("sid=".$id)->select();
    	//该店铺的平均分数
    	$info['avgscore'] = number_format($cinfo[0]['avg(score)'],1,'.','');
    	//评价该店铺的总人数
    	$info['count'] = $cinfo[0]['count(uid)'];
    	
    	for($i = 1 ;$i<=5; $i++){
    		$cinfo = $comment->field("count(uid)")->where("sid=".$id." and score=".$i)->select();
    		//每个分数的评论数量
    		$info[$i.'fen'] = $cinfo[0]['count(uid)'];
    		//每个分数对应的条形图的长度
    		$info[$i.'px'] = 150*($cinfo[0]['count(uid)']/$info['count']);
    	}
    	//平均分数对应的星星
    	$info["avgscorePx"] =  72*($info['avgscore']/5.0);

    	//遍历该店铺的销量前四的菜品
    	$hotlist = $menu->where("sid=".$id)->order("num desc")->limit(4)->select();


    	//按菜单类别遍历菜单
    	$menulist = $menu->where("sid=".$id)->select();
 
    	foreach ($menulist as $k => $v) {
    		$taglist = $tag->where("id=".$v['label_id']." and tag_kind=1 ")->select();
    		foreach ($taglist as $key => $value) {
    			$menulist[$k]['tag2'] = $value["tag"];
    		}
    	}
    	
    	//遍历所有的评论
    	$commentlist = $comment->where("sid=".$id)->select();
    	foreach ($commentlist as $k => $v) {
    		$commentlist[$k]["addtime"] = date("Y-m-d",$v["addtime"]);
    		$commentlist[$k]["scorePX"] = 72*($v["score"]/5.0);
    		$userinfo = $user->where("id=".$v["uid"])->select();
    		foreach ($userinfo as $key => $value) {
    			$commentlist[$k]["username"] = $value["username"];
    		}
    	}
    	
    	//遍历该用户的购物车
		$u = session("homeuser");
		$uid = $u['id'];
		
		$map = array();
		$map["uid"] = array("eq",$uid);
		$map["sid"] = array("eq",$id);
		$map["num"] = array("neq",0);

		$cartlist = $cart->where($map)->select();

		$sum = 0;
		foreach ($cartlist as $key => $value) {
			$cartlist[$key]["username"] = $u;
			
			$menuinfo = $menu->where("id=".$value["mid"])->select();
			foreach($menuinfo as $k => $v) {
				$cartlist[$key]["menu"] = $v["menu"];
				$cartlist[$key]["price"] = $v["price"];
				
			}	
			$sum += $cartlist[$key]["num"]*$cartlist[$key]["price"];
		}

		if($sum<20){
			$cha = 20-$sum;
		}
		
		//查看收藏表，看该用户是否收藏此店
		$collectinfo = $collect->where($map)->select();

		
		$this->assign("collectinfo",$collectinfo);
		$this->assign("sum",$sum);
		$this->assign("cha",$cha);
		$this->assign("cartlist",$cartlist);
		$this->assign("commentlist",$commentlist);
    	$this->assign("menulist",$menulist);
    	//$this->assign("taglist",$taglist);
    	//$this->assign("hotlist",$hotlist);
    	$this->assign("info",$info);

		$this->display("Detail/detail");
    }
	
    //购物车(按店显示车内物品)
	public function cart(){

	}


    public function addCart($mid=0){
    	$menu = M("Menu");
		$cart = M("Cart");
		$users = M("Users");

		$menuinfo = $menu->find($mid);
		$user = session("homeuser");
		$uid = $user['id'];
	
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
				$this->error($cart->getError());
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
				$this->error($cart->getError());
			}
			$m = $cart->add();
			if($m>0){
				$cartinfo = $cart->find($m);
				$cartinfo["menu"] = $menuinfo["menu"];
				$cartinfo["price"] = $menuinfo["price"];
				$cartinfo["b"] = 2;
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

		$user = session("homeuser");
		$uid = $user['id'];
		
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
				$this->error($cart->getError());
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
			$u = session("homeuser");
			$uid = $u['id'];
			
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

	//收藏店铺
	public function addCollect(){
		$collect = M("Collect");
		$user = M("Users");
		//获取用户uid
		$u = session("homeuser");
		$uid = $u['id'];
		
		$_POST["uid"] = $uid;
		$_POST["addtime"] = time();

		if(!$collect->create()){
			$this->error($collect->getError());
		}
		$m = $collect->add();
		if($m>0){
			$coll = $collect->find($m);
			$this->ajaxReturn($coll,'json');
		}else{
			$this->ajaxReturn(null,'json');
		}
	}

	public function delCollect(){
		$collect = M("Collect");
		$user = M("Users");
		//获取用户uid
		$u = session("homeuser");
		$uid = $u['id'];
		
		$sid = $_POST["sid"];
		$map = array();
		$map["uid"] = array("eq",$uid);
		$map["sid"] = array("eq",$sid);

		$m = $collect->where($map)->delete();
		if($m>0){
			$this->ajaxReturn($sid,'json');
		}else{
			$this->ajaxReturn(null,'json');
		}
	}
	
}