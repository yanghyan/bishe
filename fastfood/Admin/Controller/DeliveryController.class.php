<?php
//配送员管理模块
namespace Admin\Controller;
class DeliveryController extends CommonController {
	//浏览、分页和搜索（按名字、辖区搜）
    public function index(){
       $mod 	= 	M("Delivery");
	   $mod1 	= 	M("Users");
       //判断并封装搜索信息信息
       $map 	= 	array();
       if($_GET['username']){
           $map['username']   =  array("like","%{$_GET['username']}%");
       	   $list 			  =  $mod1->where($map)->select(); //获取单表users中的信息

       		foreach ($list as $k => $v) {
       			$arr[] = $v['id'];       			
       		}
       		$map['uid'] = array("in",$arr);
       }
       if(!empty($_GET['area'])){
           $map['area'] = array("eq","{$_GET['area']}");
       }


		

		$count 	= 	$mod->where($map)->count();
		$page 	= 	new \Think\Page($count,5);//实例化分页类
		$list 	= 	$mod->where($map)->limit($page->firstRow.','.$page->listRows)->select();

		$page   -> 	setConfig('theme','<ul class="pagination pagination-sm no-margin pull-right">
					<li>%FIRST%</li>
                    <li>%UP_PAGE%</li>
                    <li>%LINK_PAGE%</li>
                    <li>%DOWN_PAGE%</li>
                    <li>%END%</li></ul>');
		// 遍历获取配送员的用户名和昵称
		foreach ($list as $k => $v) {
			$user = $mod1->find($v['uid']);
			$list[$k]['username'] = $user['username'];
			$list[$k]['name'] = $user['name'];
		}
		// var_dump($list);
		
		$show 	= 	$page->show();
		$this	->	assign("page",$show);
		$this	->	assign("list",$list);
        $this	->	display("Delivery/index");
    }
	
	//载入添加界面
	public function add(){
		$this->display("Delivery/add");
	}
	
	//执行添加
	public function insert(){
		$mod 	= 	D("Users");
		$mod1	= 	D("Delivery");

		if(!$mod->create()){
			$this->error("验证失败","add",3);
		}else{
			$mod->state = 4;//设置用户身份为配送员
			if ($mod->add()) {
				$list = $mod->where("username='".$_POST['username']."'")->select();
				$_POST['uid'] = $list[0]['id'];
				if(!$mod1->create()){
					$this->error("验证失败","add",3);
				}else{
					if ($mod1->add()) {
						$this->success("添加成功","index",1);
					}else{
						$this->error("添加失败");
					}
				}
			}else{
				$this->error("添加失败","add",3);
			}
		}

	}
	
	//载入修改页面（加入隐藏的id框，用来获取被修改的数据）
	public function edit($id=0){
		$mod 	= 	M("Users");
		$mod1	= 	M("Delivery");
		$d 		=	$mod1->find($_GET['id']);
		$u 		= 	$mod->find($d['uid']);
		$this->assign("u",$u);
		$this->assign("d",$d);
		$this->display("Delivery/edit");
	}
	
	//执行修改
	public function update(){
		$mod1 	= 	D("Users");
		$mod	= 	D("Delivery");
		$arr = array();
		// 修改配送员表
		if(!$mod->create()){
			$this->error("验证失败","edit",3);
		}else{
			// var_dump($mod);
			if($mod->save()){				
				$arr['b'] = true;
			}else{
				$arr['b'] = false;
			}
		}
		// 修改会员表
		if(!$mod1->create()){
			$this->error("验证失败","edit",3);
		}else{
			$data['id'] 	=   $_POST['uid'];
			$data['name'] 	=   $_POST['name'];
			$data['sex']	=	$_POST['sex'];
			$data['phone']  = 	$_POST['phone'];
			$data['email']	= 	$_POST['email'];
			if($mod1->save($data)){
				$arr['c'] 	= 	true;
			}else{
				$arr['c'] 	=  	false;
			}
		}
		// 判断是否更新成功，只要有一个更新成功便都更新成功
		if($arr['b']||$arr['c']){
			$this->success("更新成功","index",1);
		}else{
			$this->error("更新失败！");
		}

		
	}
	
	//执行删除(弹框：确定删除吗?)
	public function del($id=0){

		$mod  	=  	M("Users");
		$mod1	= 	D("Delivery");
		$deli 	=	$mod1->find($_GET['id']);
		// var_dump($deli);
		$m      =  	$mod1->delete($_GET['id']);
		$n 		= 	$mod ->delete($deli['uid']);
		$data 	=  	array();

		if ($m>0&&$n>0) {
			$data['b'] 	= 	true;
		}else{
			$data['b'] 	= 	false;
		}

		$this->ajaxReturn($data,'json');
	}

}