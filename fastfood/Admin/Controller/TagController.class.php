<?php
//收藏管理模块
namespace Admin\Controller;
class tagController extends CommonController {
	//浏览、分页和搜索（按店铺和用户搜）
    public function index(){
		$mod = M("Tag");
		
		$map = array();
		
		if($_GET["tag"]){
			$map["tag"] = array("like","%{$_GET["tag"]}%");
		}
		
		if($_GET["tag_kind"]){
			$map["tag_kind"] = array("eq","{$_GET["tag_kind"]}");
		}
		$total = $mod->where($map)->count();
	    $page = new \Think\Page($total,3);
	    $page->setConfig('theme',"<ul class='pagination'><li>%FIRST%</li><li>%UP_PAGE%</li><li>%LINK_PAGE%</li><li>%DOWN_PAGE%</li><li>%END%</li></ul>");
	    //获取所有信息(当前页信息)
	    $list = $mod->where($map)->limit($page->firstRow.','.$page->listRows)->select();
		foreach($list as $k=>$v){
			/*$u = $user->find($v["uid"]);
			$s = $shop->find($v["sid"]);
			$list[$k]["username"] = $u["username"];
			$list[$k]["shopname"] = $s["shopname"];*/
			$list[$k]['addtime'] = date("Y-m-d",$list[$k]['addtime']);
		}
		
        //放置到模板中
        $this->assign("pageinfo",$page->show()); //将分页信息放置到模板中
		$this->assign("taglist",$list);
        $this->display("tag/index");
    }
	
	public function insert(){
		$mod = M("Tag");
        $tag = $_POST["tag"];
        $tagkind = $_POST["tag_kind"];

		if(!empty($tag) && !empty($tagkind)){

			$_POST["addtime"] = time();
			if(!$mod->create()){
				
				$this->error($mod->getError());
			}
			$m = $mod->add();
			
			if($m>0){
				$tag = $mod->find($m);
				$tag["b"] = true;
				$tag["addtime"] = date("Y-m-d",$tag["addtime"]);
				//$this->ajaxReturn($tag,'json');
			}
			
		}else{
			$tag["b"] = false;
			$tag["info"] = "标签名和标签类型都不能为空！";
			
		}
		$this->ajaxReturn($tag,'json');
	}
	public function del($id=0){
		$mod = M("Tag");
		if(!empty($_GET["id"])){
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
	
	//加载修改表单
	public function edit($id=0)
	{
		$mod = M("tag");
		$tag = $mod->find($id);
		if($tag){
			$this->ajaxReturn($tag,"json");
		}else{
			$this->ajaxReturn(null,'json');
		}
	}
	//执行修改
	public function update(){
		$mod = M('tag');
        $tag = $_POST["tag"];
        $tagkind = $_POST["tag_kind"];

        if(!empty($tag) && !empty($tagkind)){
			if(!$mod->create()){
				$this->error($mod->getError());
			}		
			$m = $mod->save();
			if($m>0){
				$tag = $mod->find($_POST['id']);
				$tag["b"] = true;
				$tag['addtime'] = date("Y-m-d",$tag['addtime']);
			}
		}else{
			$tag["b"] = false;
			$tag["info"] = "标签名和标签类型都不能为空！";		
		}
		$this->ajaxReturn($tag,'json');
	}
}