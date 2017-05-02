<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
	/*载入首页*/
	//遍历子类、分类
	//遍历热门推荐店铺
	//遍历不同类别下的最热店铺

    public function index(){    	

		$menu 			= 	M("Menu");

		$shop 			= 	M("Shop");

		$comment 		= 	M("Comment");

		$lunbo 			=	M("slide");
		
		$map 			= 	array();//最热推荐条件

		$map1 			=	array();//品牌馆条件
		
		// 查询所有
		$map["state"] 	= 	array("eq",2);

		$list 			= 	$shop->where($map)->order("addtime asc")->select();
 		


		// $map1["state"] 	= 	array("eq",2);

		// $map1['kind']	=	array("eq",1);

		// $list1			=	$shop->where($map1)->select();

		foreach($list as $k=>$v){

			//取到所有店铺的销售数量和最低价格
			$mlist 		= 	$menu->field('sid,sum(num),min(price)')->group('sid')->where("sid=".$v['id'])->select();

			foreach($mlist as $a=>$b){

				if($list[$k]["id"] 		==	 $mlist[$a]["sid"]){

					$list[$k]["num"] 	= 	$mlist[$a]["sum(num)"];

					$list[$k]["price"] 	= 	$mlist[$a]["min(price)"];

				}

			}

			//取到店铺的评价
			$clist 		= 	$comment->field('sid,sum(score),count(uid)')->group('sid')->where('sid='.$v['id'])->select();
				
			foreach ($clist as $key => $value) {

				$q 		=	$clist[$key]["sum(score)"]/$clist[$key]["count(uid)"];

				$clist[$key]['avgscore']	 =	 number_format($q,1,'.','');

				if($list[$k]['id'] 	== $clist[$key]['sid']){

					$list[$k]['score'] = empty($clist[$key]['avgscore'])?0:$clist[$key]['avgscore'];
					// var_dump($clist[$key]['avgscore']);
					
				}

			}

			$menulist = $menu->where("sid=".$v['id'])->select();
			
		}
		// 按照销售数量的降序排序(最热推荐)
		// foreach ($list as $k => $v) {
		// 	$num[$k] = $v['num'];
			
		// }
		// $list = array_multisort($num,SORT_DESC,$list);

		// 按照评分的降序排序(最热推荐)
		foreach ($list as $k => $v) {
			$score[$k] = empty($v['score'])?0:$v['score'];
			
		}
		array_multisort($score,SORT_DESC,$list);

		// 查询不同类别
		$list1 = array();$list2 = array();$list3 = array();
		$list4 = array();$list5 = array();$list6 = array();$list7 = array();

		foreach ($list as $k => $v) {
			switch ($v['kind']) {
				case 1:
					$list1[$k] = $v;
					break;
				case 2:
					$list2[$k] = $v;
					break;
				case 3:
					$list3[$k] = $v;
					break;
				case 4:
					$list4[$k] = $v;
					break;
				case 5:
					$list5[$k] = $v;
					break;
				case 6:
					$list6[$k] = $v;
					break;
				case 7:
					$list7[$k] = $v;
					break;
				default:
					$list1[$k] = $v;
					break;
			}
			
			
		}
		// var_dump($list1);

		$list = array_slice($list, 0, 15);
		$list1 = array_slice($list1, 0, 10);
		$list2 = array_slice($list2, 0, 10);
		$list3 = array_slice($list3, 0, 10);
		$list4 = array_slice($list4, 0, 10);
		$list5 = array_slice($list5, 0, 10);
		$list6 = array_slice($list6, 0, 10);
		$list7 = array_slice($list7, 0, 10);

		$this->assign("shoplist",$list);
		$this->assign("list1",$list1);
		$this->assign("list2",$list2);
		$this->assign("list3",$list3);
		$this->assign("list4",$list4);
		$this->assign("list5",$list5);
		$this->assign("list6",$list6);
		$this->assign("list7",$list7);

		// 遍历轮播图
		$map1["state"] 	= 	array("eq",1);
		$slide 			=	$lunbo->where($map1)->order("addtime desc")->limit(5)->select();
        //dump($slide);
		$this->assign("slide",$slide);
		$this->display("Index/index");

	}

}