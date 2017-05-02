<?php
//订单管理模块
namespace Admin\Controller;
class IndentController extends CommonController {
    //浏览、分页和搜索（按订单号和下单时间搜）
	public function index(){
        //判断并封装搜索信息信息
		$map = array();
		//按订单号搜
		if($_GET['onum']){
           $map['order_num'] = array("like","%{$_GET['onum']}%");
		}
		//按下单时间搜
        $otime1 = $_GET["otime1"]; //起始时间
        $otime2 = $_GET["otime2"]; //结束时间
		if($otime1 || $otime2){
			if(!empty($otime1)){
				$map["start_time"] = array('EGT',strtotime($otime1));
			}
			if(!empty($otime2)){
				$map["start_time"] = array('ELT',strtotime($otime2));
			}
			if(!empty($otime1)&& !empty($otime2)){
				$map['start_time&start_time'] =array(array('EGT',strtotime($otime1)),array('ELT',strtotime($otime2)),'_multi'=>true);
			}
    }
    //实例model类
		$mod = M("indent");
		$mod1 = M("menu");
		$mod2 = M("users");
		$mod3 = M("shop");
		//获取数据条数，实例化分页类
		$total = $mod->where($map)->count();
		$page = new \Think\Page($total,3);
		$page->setConfig('theme',"<ul class='pagination'><li>%FIRST%</li><li>%UP_PAGE%</li><li>%LINK_PAGE%</li><li>%DOWN_PAGE%</li><li>%END%</li></ul>");
		//获取所有信息(当前页信息)
		$list = $mod->where($map)->limit($page->firstRow.','.$page->listRows)->select();
		foreach($list as $k => $v){
			$ind = $mod1->find($v["mid"]);
			$ind2 = $mod2->find($v["uid"]);
			$ind3 = $mod3->find($v["sid"]);
			$ind4 = $mod2->find($v["did"]);
			$list[$k]["menu"] = $ind["menu"];
			$list[$k]["username"] = $ind2["username"];
			$list[$k]["shopname"] = $ind3["shopname"];
			$list[$k]["dname"] = $ind4["id"];
			$ind5 = $mod2->where("state = 4")->find($ind4["id"]);
			$list[$k]["name"] = $ind5["username"];
		}
		//放置到模板中
		$this->assign("list",$list);
		$this->assign("pageinfo",$page->show()); //将分页信息放置到模板中
        //加载模板输出
		$this->display("index");
    }
}