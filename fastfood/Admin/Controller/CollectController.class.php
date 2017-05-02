<?php
//收藏管理模块
namespace Admin\Controller;
class CollectController extends CommonController {
	//浏览、分页和搜索（按店铺和用户搜）
    public function index(){
		$mod = M("Collect"); //实例化收藏表
		$user = M("Users"); //实例化用户信息表
		$shop = M("Shop");  //实例化店铺表
		$map = array();
		if($_GET["username"]){
			$list = $user->where($map)->select(); //获取单表users中的信息
			foreach($list as $k=>$v){;
				$arr[] = $v["id"];
			}
			$map["uid"] = array("in",$arr);
		}
		if($_GET["shopname"]){
			$map["shopname"] = array("like","%{$_GET['shopname']}%");
			$slist = $shop->where($map)->select();
			foreach($slist as $k=>$v){
				$arra[] = $v["id"];
			}
			$map["sid"] = array("in",$arra);
		}
		
		$total = $mod->where($map)->count();
	    $page = new \Think\Page($total,3);
	    $page->setConfig('theme',"<ul class='pagination'><li>%FIRST%</li><li>%UP_PAGE%</li><li>%LINK_PAGE%</li><li>%DOWN_PAGE%</li><li>%END%</li></ul>");
	    //获取所有信息(当前页信息)
	    $list = $mod->where($map)->limit($page->firstRow.','.$page->listRows)->select();
		foreach($list as $k=>$v){
			$u = $user->find($v["uid"]);
			$s = $shop->find($v["sid"]);
			$list[$k]["username"] = $u["username"];
			$list[$k]["shopname"] = $s["shopname"];
			$list[$k]['addtime'] = date("Y-m-d",$list[$k]['addtime']);
		}
		
        //放置到模板中
        $this->assign("pageinfo",$page->show()); //将分页信息放置到模板中
		$this->assign("collectlist",$list);
        $this->display("Collect/index");
    }
}