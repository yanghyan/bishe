<?php
//类别管理模块
namespace Admin\Controller;
class KindController extends CommonController {
    //浏览、分页
	public function index(){
		$mod = M("Kind"); //实例化类别表
		$map = array(); //封装搜索条件
		//获取类别名称并加入搜索条件中
		if(!empty($_GET["name"])){
			 $map["classname"] = array("like","%{$_GET["name"]}%");
		 }
        //获取父ID并加入搜索条件中
		 if(!empty($_GET["pid"]) || $_GET["pid"]=== "0"){
			 $map["pid"] = array("EQ",$_GET["pid"]);
		 }
		//获取符合条件的总数量
		$total = $mod->where($map)->count();
	    $page = new \Think\Page($total,6);
	    $page->setConfig('theme',"<ul class='pagination'><li>%FIRST%</li><li>%UP_PAGE%</li><li>%LINK_PAGE%</li><li>%DOWN_PAGE%</li><li>%END%</li></ul>");
	    //获取所有信息(当前页信息)
	    $list = $mod->where($map)->limit($page->firstRow.','.$page->listRows)->select();
		foreach($list as $k=>$v){
			$list[$k]["num"] = substr_count($v["path"],",");
			$list[$k]["nbsp"] = str_repeat("&nbsp;&nbsp;",$list[$k]["num"]);
		}
        //放置到模板中
        $this->assign("pageinfo",$page->show()); //将分页信息放置到模板中
		$this->assign("kindlist",$list);
        $this->display("Kind/index");
    }
	
	//载入添加页面（弹框）
	public function addch($id=0){
		$mod = M("Kind");
		$kind = $mod->find($id);
		if($kind){
			$this->ajaxReturn($kind,'json');
		}else{
			$this->ajaxReturn(null,'json');
		}
	}
	
	//执行添加
	public function insert(){
		$mod = M("Kind");
		if(!empty($_POST["classname"])){
			$_POST["pid"] = $_POST["pid"]?$_POST["pid"]:0;
			$_POST["path"] = $_POST["path"]?($_POST["path"].$_POST["pid"].","):"0,";
			if(!$mod->create()){
				$this->error($mod->getError());
			}
			$m = $mod->add();
			if($m>0){
				$kind = $mod->find($m);
				$kind["b"] = true;
				$kind["num"] = substr_count($kind["path"],",");
				$kind["nbsp"] = str_repeat("&nbsp;&nbsp;",$kind["num"]);
				$this->ajaxReturn($kind,'json');
			}
		}else{
			$kind["b"] = false;
			$kind["info"] = "类别名不能为空！";
			$this->ajaxReturn($kind,'json');
		}
	}
	
	
	//载入修改页面（弹框）
	public function edit($id=0){
		$mod = M("Kind");
		$kind = $mod->find($id);
		if($kind){
			$this->ajaxReturn($kind,'json');
		}else{
			$this->ajaxReturn(null,'json');
		}
	}
	
	//执行修改
	public function update(){
		$mod = M("Kind");
		if(!empty($_POST["classname"])){
			if(!$mod->create()){
				$this->error($mod->getError());
			}	
			$m = $mod->save();
			if($m>0){
				$kind = $mod->find($_POST['id']);
				$kind["b"] = true;
				$kind["num"] = substr_count($kind["path"],",");
				$kind["nbsp"] = str_repeat("&nbsp;&nbsp;",$kind["num"]);
			}
		}else{
			$kind["b"] = false;
			$kind["info"] = "类别名不能为空！";
		}
		$this->ajaxReturn($kind,'json');
	}
	
	//执行删除
	public function del($id=0){
		$mod = M("Kind");
		$map = array();
		$map['pid'] = array("EQ",$id);
		$total = $mod->where($map)->count();
		$data = array();
		if($total>0){
			$data["b"] = false;
			$data["info"] = "有子分类不能删除！";
		}else{
			$d = $mod->delete($id);
			if($d){
				$data["b"] = true;
			}else{
				$data["b"] = false;
				$data["info"] = "删除失败！";
			}
		}
		$this->ajaxReturn($data,'json');
	}
}