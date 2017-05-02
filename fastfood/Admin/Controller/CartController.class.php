<?php
//购物车模块
namespace Admin\Controller;
class CartController extends CommonController {
	//浏览、分页和搜索（按用户和添加时间搜）
    public function index(){
        //判断并封装搜索信息信息
		$map = array();
		//按用户搜
		if($_GET['cname']){
           $map['score'] = array("eq",$_GET['cscore']);
		}
		
		//按添加时间搜
        $ctime1 = $_GET["ctime1"];
        $ctime2 = $_GET["ctime2"];
        if($ctime1 || $ctime2){
			if(!empty($ctime1)){
				$map["addtime"] = array('EGT',strtotime($ctime1));
			}
			if(!empty($ctime2)){
				$map["addtime"] = array('ELT',strtotime($ctime2));
			}
			if(!empty($ctime1)&&($ctime2)){
				$map['addtime&addtime'] =array(array('EGT',strtotime($ctime1)),array('ELT',strtotime($ctime2)),'_multi'=>true);
			}
		}
		
		//实例model类
		$mod = M("cart");
		$mod1 = M("users");
		$mod2 = M("menu");
		$mod3 = M("shop");
		
		if($_GET['username']){
           $map['username']   =  array("like","%{$_GET['username']}%");
       	   $list 			  =  $mod1->where($map)->select(); //获取单表users中的信息
			//var_dump($list);
       		foreach ($list as $k => $v) {
       			$arr[] = $v['id'];   
				//var_dump($v['id']);    			
       		}
			
       		$map['uid'] = array("in",$arr);
			//var_dump($map['uid']);
			
		}
       
		//获取数据条数，实例化分页类
		$total = $mod->where($map)->count();
		$page = new \Think\Page($total,3);
		$page->setConfig('theme',"<ul class='pagination'><li>%FIRST%</li><li>%UP_PAGE%</li><li>%LINK_PAGE%</li><li>%DOWN_PAGE%</li><li>%END%</li></ul>");
		//获取所有信息(当前页信息)
		$list = $mod->where($map)->limit($page->firstRow.','.$page->listRows)->select();
		//var_dump($list);
		foreach($list as $k=>$v){
			$com = $mod1->find($v["uid"]);
			$com2 = $mod2->find($v["mid"]);
			$com3 = $mod3->find($v["sid"]);
			//var_dump($v["mid"]);
			$list[$k]["username"] = $com["username"];
			$list[$k]["menu"] = $com2["menu"];
			$list[$k]["shopname"] = $com3["shopname"];
		}
		//var_dump($list);
		
		//放置到模板中
		$this->assign("list",$list);
		$this->assign("pageinfo",$page->show()); //将分页信息放置到模板中

        //加载模板输出
		$this->display("index");
    }
	
	//定时清除购物车（暂定3个月）
	//public function clear(){}
}