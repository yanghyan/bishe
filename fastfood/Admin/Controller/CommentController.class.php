<?php
//评论管理模块
namespace Admin\Controller;
class CommentController extends CommonController {
	//浏览、分页和搜索（按评分和时间段搜）
    public function index(){
        //判断并封装搜索信息信息
		$map = array();
		//按评分搜
		if($_GET['cscore']){
           $map['score'] = array("eq",$_GET['cscore']);
		}
		
		//按时间段搜
        $ctime1 = $_GET["ctime1"];
        $ctime2 = $_GET["ctime2"];
		if($ctime1 || $ctime2){
			if(!empty($ctime1)){
				$map["addtime"] = array('EGT',strtotime($ctime1));
			}
			if(!empty($ctime2)){
				$map["addtime"] = array('ELT',strtotime($ctime2));
			}
			if(!empty($ctime1)&& !empty($ctime2)){
				$map['addtime&addtime'] =array(array('EGT',strtotime($ctime1)),array('ELT',strtotime($ctime2)),'_multi'=>true);
			}
		}
		
		//实例model类
		$mod = M("comment");
		$mod1 = M("users");
		$mod2 = M("shop");
		$mod3 = M("delivery");
       
		//获取数据条数，实例化分页类
		$total = $mod->where($map)->count();
		$page = new \Think\Page($total,3);
		$page->setConfig('theme',"<ul class='pagination'><li>%FIRST%</li><li>%UP_PAGE%</li><li>%LINK_PAGE%</li><li>%DOWN_PAGE%</li><li>%END%</li></ul>");
		//获取所有信息(当前页信息)
		$list = $mod->where($map)->limit($page->firstRow.','.$page->listRows)->select();
		//var_dump($list);
		foreach($list as $k=>$v){
			$com = $mod1->find($v["uid"]);
			$com2 = $mod2->find($v["sid"]);
			$com3 = $mod3->find($v["uid"]);
			//var_dump($com3);
			$list[$k]["username"] = $com["username"];
			$list[$k]["shopname"] = $com2["shopname"];
			$list[$k]["dname"] = $com3["uid"];
			$com4 = $mod1->where("state = 4")->find($com3["uid"]);
			$list[$k]["name"] = $com4["username"];
			//var_dump($com4);
		}
		//var_dump($list);
		
		//放置到模板中
		$this->assign("list",$list);
		$this->assign("pageinfo",$page->show()); //将分页信息放置到模板中

        //加载模板输出
		$this->display("index");
    }
	
	//执行删除（弹框：确认删除吗？）
	public function del($id=0)
    {
        $m = M("comment")->delete($id);
        $data=array();
        if($m>0){
            $data['b'] = true;
        }else{
            $data['b']= false;
        }
        $this->ajaxReturn($data);
    }
}