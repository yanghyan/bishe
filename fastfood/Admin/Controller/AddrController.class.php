<?php
//地址管理模块
namespace Admin\Controller;
class AddrController extends CommonController {
    //浏览、分页和搜索（按用户名、姓名和性别查）
	public function index(){
	   $mod 	= 	M("address");
	   $mod1	=	M("Users");

	   $map 	= 	array();
       if($_GET['username']){
       		$map['username']   =  array("like","%{$_GET['username']}%");
       		$list 			   =  $mod1->where($map)->select(); //获取单表users中的信息

       		foreach ($list as $k => $v) {
       			$arr[] = $v['id'];       			
       		}
       		$map['uid'] = array("in",$arr);       		
       }

       if($_GET['name']){
           $map['name']      =  array("like","%{$_GET['name']}%");
       }
       if(!empty($_GET['sex'])||$_GET['sex']==="0"){
           $map['sex']       =  array("eq","{$_GET['sex']}");
       }
		
		$count  = 	$mod->where($map)->count();
		$page 	= 	new \Think\Page($count,5);//实例化分页类
		$list 	= 	$mod->where($map)->limit($page->firstRow.','.$page->listRows)->select();
		$page   ->  setConfig('theme','<ul class="pagination pagination-sm no-margin pull-right">
					<li>%FIRST%</li>
                    <li>%UP_PAGE%</li>
                    <li>%LINK_PAGE%</li>
                    <li>%DOWN_PAGE%</li>
                    <li>%END%</li></ul>');
		foreach ($list as $k => $v) {
			$user 					=		$mod1->find($v['uid']);
			$list[$k]['username'] 	= 		$user['username'];
		}
		$show 	= 	$page->show();
		$this   ->  assign("page",$show);
		$this   ->  assign("list",$list);
		$this   ->  display("Addr/index");
    }
   	//设为默认
   	public function mo(){
   		$mod			= 	M("address");   	
		$data['id'] 	= 	$_GET['id'];		
		$arr 			= 	array();
		
		if ($_GET['state']==1) {
			$data['state']	= 	0;
		}else{
			$data['state']	= 	1;
		}

		if ($mod->save($data)) {
			$arr['b']	=	true;
		}else{
			$arr['b']	=	false;
		}
		$arr['a']	=	$data['state'];
		$arr['id']	=	$data['id'];

		$this->ajaxReturn($arr,'json');	

   	}
	
	//载入修改界面
	public function edit(){
		$mod				=		M("address");
		$mod1				=		M("users");
		$addr 				=		$mod->find($_GET['id']);
		$user 				= 		$mod1->find($addr['uid']);
		$addr['username'] 	= 		$user['username'];
		
		$this->assign("addr",$addr);
		$this->display("Addr/edit");
	}
	
	//执行修改
	public function update(){
		$mod = M("address");
		if(!$mod->create()){
			$this->error("验证失败","edit",3);
		}else{
			if ($mod->save()) {
				$this->success("更新成功","index",1);
			}else{
				$this->error("更新失败");
			}
		}
	}
}