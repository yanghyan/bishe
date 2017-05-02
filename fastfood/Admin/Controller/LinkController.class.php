<?php
//友情链接管理
namespace Admin\Controller;
class LinkController extends CommonController {
	//浏览、分页
    public function index(){
		//实例model类
		$mod = M("link");
       
		//获取数据条数，实例化分页类
		$total = $mod->count();
		$page = new \Think\Page($total,3);
		$page->setConfig('theme',"<ul class='pagination'><li>%FIRST%</li><li>%UP_PAGE%</li><li>%LINK_PAGE%</li><li>%DOWN_PAGE%</li><li>%END%</li></ul>");
		//获取所有信息(当前页信息)
		$list = $mod->limit($page->firstRow.','.$page->listRows)->select();
       
		//放置到模板中
		$this->assign("list",$list);
		$this->assign("pageinfo",$page->show()); //将分页信息放置到模板中

        //加载模板输出
		$this->display("index");
    }
	
	//载入添加页面（弹框。js：链接名非空，链接地址非空）
	public function add(){
		$this->display("add");
	}
	
	//执行添加
	public function insert(){
		$mod = M("link");
        $name = $_POST["name"];
        $url = $_POST["url"];
        if(!empty($name) && !empty($url)){
			$_POST["addtime"] = time(); 
			if(!$mod->create()){
				$this->error($mod->getError());
			}
			$m = $mod->add(); //执行添加
			if($m>0){
			   $link = $mod->find($m);
			   $link['addtime'] = date("Y-m-d",$link['addtime']);
			   $this->ajaxReturn($link); //返回添加成功的信息 
			}else{
			   $this->ajaxReturn(null);
			}
		}
	}
	
	//载入编辑页面（弹框）
	public function edit($id=0){
		$link = M("link")->find($id);
		$this->ajaxReturn($link);
	}
	
	//执行更新
	public function update(){
		$mod = M("link");
        if(!$mod->create()){
            $this->error($mod->getError());
        }
        $m = $mod->save(); //执行更新
        if($m>0){
           $link = $mod->find($_POST["id"]);
           $this->ajaxReturn($link); //返回更新成功的信息 
        }else{
           $this->ajaxReturn(null);
        }
	}
	
	//执行删除（弹框。js：确认删除？）
	public function del($id=0){
		$m = M("link")->delete($id);
        $data = array();
        if($m>0){
            $data['b'] = true;
        }else{
            $data['b']= false;
        }
        $this->ajaxReturn($data);
	}
}