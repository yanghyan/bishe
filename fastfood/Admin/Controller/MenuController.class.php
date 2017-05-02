<?php
//菜单管理模块
namespace Admin\Controller;
class MenuController extends CommonController {
    //浏览、分页和搜索（按菜名、单价区间和已售出数量区间）
	public function index(){
		//判断并封装搜索信息信息
		$map = array();
		//按菜名搜
		if($_GET['mname']){
           $map['menu'] = array("like","%{$_GET['mname']}%");
		}
		//按数量搜
		if($_GET['mnum']){
			$map['num'] = array("like","%{$_GET['mnum']}%");
		}
		//$map['price_range'] = array("between","{$_GET['num1']}","{$_GET['num2']}");
		
		//按单价区间搜
        $mprice1 = $_GET["mprice1"];
        $mprice2 = $_GET["mprice2"];

		if($mprice1 || $mprice2){
			if(!empty($mprice1)){
				$map["price"] = array('EGT',$mprice1);
			}
			if(!empty($mprice2)){
				$map["price"] = array('ELT',$mprice2);
			}
			if(!empty($mprice1)&& !empty($mprice2)){
				$map['price&price'] =array(array('EGT',$mprice1),array('ELT',$mprice2),'_multi'=>true);
			}
			//$map['price&price'] =array(array('EGT',$_GET['mprice1']),array('ELT',$_GET['mprice2']),'_multi'=>true);
			
		}
		
		//实例model类
		$mod = M("Menu");
		//$mod1 = M("kind");
		$mod2 = M("shop");
       
		//获取数据条数，实例化分页类
		$total = $mod->where($map)->count();
		$page = new \Think\Page($total,3);
		$page->setConfig('theme',"<ul class='pagination'><li>%FIRST%</li><li>%UP_PAGE%</li><li>%LINK_PAGE%</li><li>%DOWN_PAGE%</li><li>%END%</li></ul>");
		//获取所有信息(当前页信息)
		$list = $mod->where($map)->limit($page->firstRow.','.$page->listRows)->select();
        //var_dump($list);
	    foreach($list as $k => $v){
			//$men = $mod1->find($v["label_id"]);
			$men2 = $mod2->find($v["sid"]);
			//var_dump($men2);
			//$list[$k]["classname"] = $men["classname"];
			$list[$k]["shopname"] = $men2["shopname"];
			
		}
		//var_dump($list);
		//放置到模板中
		$this->assign("list",$list);
		$this->assign("pageinfo",$page->show()); //将分页信息放置到模板中

        //加载模板输出
		$this->display("index");
    }
	
	//强行下架（弹框：确定下架吗?）
	public function off(){
		$mod = M("Menu");
		$mod->state = 0;
		$mod->id = $_GET["id"];
		//$_POST["state"] = 0;
		//$mod->create();
		$res = $mod->save();
		if($res > 0){
			$res = $mod->find($_GET["id"]);
			$this->ajaxReturn($res,"json");
		}else{
			$this->ajaxReturn(null,"json");
		}
	}
	
	//重新上架（弹框：确定重新上架？）
	public function on(){
		$mod = M("Menu");
		$mod->state = 1;
		$mod->id = $_GET["id"];
		
		$res = $mod->save();
		if($res > 0){
			$res = $mod->find($_GET["id"]);
			$this->ajaxReturn($res,"json");
		}else{
			$this->ajaxReturn(null,"json");
		}
	}
}