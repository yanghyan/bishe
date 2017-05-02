<?php
//列表页管理
namespace Home\Controller;
use Think\Controller;
class ListController extends Controller {
    /*加载列表页*/
	//1.遍历标签（不同类的区分遍历）
	//2.遍历所有店铺（分页和搜索）
	//3.搜索（按标签、价格、销量搜）
	public function index(){

		//遍历标签
		$mod = M("tag");
		$map1 = array();
		$map2 = array();
		$map3 = array();
		$map1["tag_kind"] = array("eq",1);
		$map2["tag_kind"] = array("eq",2);
		$map3["tag_kind"] = array("eq",3);
		$list1 = $mod->where($map1)->select();
		$list2 = $mod->where($map2)->select();
		$list3 = $mod->where($map3)->select();
		$this->assign("taglist1",$list1); //分类
		$this->assign("taglist2",$list2); //区域
		$this->assign("taglist3",$list3); //价格

		//var_dump($list2);

		$menu = M("Menu");
		$shop = M("Shop");
		$comment = M("Comment");
		
		$map = array();
		
		$map["state"] = array("eq",2);


		

		if($_GET['kind']){
			$map['kind'] = array("eq",$_GET['kind']);
			$kind 	=	$_GET['kind'];
		}
		if($_GET['area']){
			$map['address'] = array("eq",$_GET['area']);
			$area	=	$_GET['area'];
			// $taglist = $mod->where($map)->select();
		}
		if($_GET['price']){
			//$map['price'] = array("eq",$_GET['price']);
			// $taglist = $mod->where($map)->select();
		}

		//按店名或地点查
		if($_GET["shop"]){
			$s = $_GET["shop"];
			if(strpos($s,"小店")!== false){
				$map["address"] = array("eq",1);
			}else if(strpos($s,"迎泽")!== false){
				$map["address"] = array("eq",2);
			}else if(strpos($s,"杏花岭")!== false){
				$map["address"] = array("eq",3);
			}else if(strpos($s,"尖草坪")!== false){
				$map["address"] = array("eq",4);
			}else if(strpos($s,"万柏林")!== false){
				$map["address"] = array("eq",5);
			}else if(strpos($s,"晋源")!== false){
				$map["address"] = array("eq",6);
			}else{
				$map["shopname"] = array("like","%{$_GET['shop']}%");
			}
 		}
		$list = $shop->where($map)->select();
		

		$total = $shop->where($map)->count();
		$page 	= 	new \Think\Page($total,15);//实例化分页类
		
		$page->setConfig("prev","<");
		$page->setConfig("next",">");
		$page->setConfig("first","<<");
		$page->setConfig("last",">>");
		
		$list = $shop->where($map)->limit($page->firstRow.','.$page->listRows)->select();
		foreach($list as $k=>$v){
			//取到所有店铺的销售数量和最低价格
			$mlist = $menu->field('sid,sum(num),min(price)')->group('sid')->where("sid=".$v['id'])->select();
			foreach($mlist as $a=>$b){

				if($list[$k]["id"] == $mlist[$a]["sid"]){

					$list[$k]["num"] = $mlist[$a]["sum(num)"];
					$list[$k]["price"] = $mlist[$a]["min(price)"];

				}
			}

			//取到店铺的评价
			$clist = $comment->field('sid,sum(score),count(uid)')->group('sid')->where('sid='.$v['id'])->select();
			foreach ($clist as $key => $value) {
				$q =$clist[$key]["sum(score)"]/$clist[$key]["count(uid)"];
				$clist[$key]['avgscore'] = number_format($q,1,'.','');
				if($list[$k]['id'] == $clist[$key]['sid']){
					$list[$k]['score'] = $clist[$key]['avgscore'];
				}
			}

			$menulist = $menu->where("sid=".$v['id'])->select();
			
		}

		if(!empty($_GET['sort'])){
			switch ($_GET['sort']) {
				case "x": //按销量的降序排列
					foreach ($list as $k=> $v) {
					$num[$k] = $v['num'];
					}
					array_multisort($num,SORT_DESC,$list);
					break;
				case "p": //按价格的升序排列
					foreach ($list as $k=> $v) {
					$price[$k] = $v['price'];
					}
					array_multisort($price,SORT_ASC,$list);
					break;
				case "t": //按时间的降序排列
					foreach ($list as $k=> $v) {
					$addtime[$k] = $v['addtime'];
					}
					array_multisort($addtime,SORT_DESC,$list);
					break;
			}
		}
		
		$this->assign("kind",$kind);
		$this->assign("area",$area);
		$this->assign("pageinfo",$page->show());
		$this->assign("count",$total);
		$this->assign("shoplist",$list);
		$this->display("List/list");
    }
}