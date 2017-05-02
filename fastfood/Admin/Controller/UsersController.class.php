<?php
//会员管理模块
namespace Admin\Controller;
class UsersController extends CommonController {
    //查询，分页和搜索（按用户名、状态和性别搜索）
	public function index(){
		//判断并封装搜索信息信息
       $map = array();
       if($_GET['username']){
           $map['username'] = array("like","%{$_GET['username']}%");
       }
       if(!empty($_GET['sex'])||$_GET['sex']==="0"){
           $map['sex'] = array("eq","{$_GET['sex']}");
       }
       if(!empty($_GET['state'])||$_GET['state']==="0"){
           $map['state'] = array("eq","{$_GET['state']}");
       }

		$mod = M("users");
		$count = $mod->where($map)->count();
		$page = new \Think\Page($count,5);//实例化分页类
		$list = $mod->where($map)->limit($page->firstRow.','.$page->listRows)->select();
		$page->setConfig('theme','<ul class="pagination pagination-sm no-margin pull-right">
					<li>%FIRST%</li>
                    <li>%UP_PAGE%</li>
                    <li>%LINK_PAGE%</li>
                    <li>%DOWN_PAGE%</li>
                    <li>%END%</li></ul>');
		$show = $page->show();
		$this->assign("page",$show);
		$this->assign("myuser",$list);
		$this->display("Users/index");
    }
	
	//载入添加页面
	public function add(){	

		$this->display("Users/add");
	}
	
	//执行添加
	public function insert(){
		$mod = D("Users");
		if(!$mod->create()){
			$this->error("验证失败","add",3);
		}else{
			if ($mod->add()) {
				$this->success("添加成功","index",1);
			}else{
				$this->error("添加失败","add",3);
			}
		}
	}
	
	//加载修改界面（加入隐藏的id框，用来获取被修改的数据）
	public function edit($id=0){
		$mod 	= 	M("Users");
		$mod1 	= 	M("kind");		
		$user 	= 	$mod->find($_GET['id']);
		$kind 	= 	$mod1->where("pid=0")->select();	

		$this->assign("user",$user);
		$this->assign("kind",$kind);
		$this->display("Users/edit");
	}
	
	//执行修改
	public function update(){
		$mod 	= 	M("Users");	
		$mod1	= 	D("Delivery");
		$mod2	= 	D("Shop");

		if(!$mod->create()){
			$this->error("验证失败","edit",3);
		}else{
			if ($mod->save()) {
				// 判断是否为配送员area是否为0，如果是则不执行添加，否则执行添加
				if ($_POST['area']!=0) {
					$data['uid']  = $_POST['id'];					
					$data['area'] = $_POST['area'];
					if (!$mod1->create($data)) {
						$this->error("增加验证失败");
					}else{
						// var_dump($mod1);exit;
						if ($mod1->add()) {
							$this->success("更新成功","index",1);
						}else{
							$this->error("更新失败");
						}
					}
				}elseif($_POST['state']==3){//判断是否为商户
					
					//上传图片处理
					$upload = new \Think\Upload();// 实例化上传类
					$upload->maxSize   =     3145728 ;// 设置附件上传大小
					$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
					$upload->autoSub   =	 false;
					$upload->rootPath  =     './Public/Uploads/'; // 设置附件上传目录
					// 上传文件 
					$inf   =   $upload->upload();
					if(!$inf) {// 上传错误提示错误信息    
						$this->error($upload->getError());
					}else{// 上传成功 获取上传文件信息    
						foreach($inf as $file){        
							// echo $file['savepath'].$file['savename'];
							$image = new \Think\Image(); 
							$image->open('./Public/Uploads/'.$file['savename']);
							// 按照原图的比例生成一个最大为150*150的缩略图并保存为thumb.jpg
							$image->thumb(100, 100)->save('./Public/Uploads/s_'.$file['savename']);    
						}
					}
					//获取商户信息
					$info['uid'] 		= 	$_POST['uid'];
					$info['shopname'] 	= 	$_POST['shopname'];
					$info['address']	=	$_POST['address'];
					$info['detail_add'] =	$_POST['detail_add'];
					$info['kind']		= 	$_POST['kind'];
					$info['shoptype']	=	$_POST['shoptype'];
					$info['env_pic']	=	$inf['env_pic']['savename'];
					$info['door_pic']	=	$inf['door_pic']['savename'];
					$info['info']		=	$_POST['info'];
					$info['info_pic']	=	$inf['info_pic']['savename'];
					//执行数据库添加
					if (!$mod2->create($info)) {
						$this->error("增加验证失败");
					}else{
						// var_dump($mod1);exit;
						if ($mod2->add()) {
							$this->success("更新成功","index",1);
						}else{
							$this->error("更新失败");
						}
					}
				}else{			
					$this->success("更新成功","index",1);
				}	
			}else{
				$this->error("更新失败");
			}
		}
	}
	
	//执行删除
	public function del($id=0){
		$mod  =  D("Users");
		$m    =  $mod->delete($_GET['id']);
		$data =  array();
		if ($m>0) {
			$data['b'] = true;
		}else{
			$data['b'] = false;
		}
		 $this->ajaxReturn($data,'json');
	}

	//加载修改密码页面
	public function pass(){
		$mod = M("Users");
		$user = $mod->find($_GET['id']);
		$this->assign("user",$user);
		$this->display("Users/pass");
	}

	//执行修改密码
	public function xgpass(){
		$mod = D("Users");
		if(!$mod->create()){
			$this->error("验证失败","edit",3);
		}else{
			if ($mod->save()) {
				$this->success("重置成功","index",1);
			}else{
				$this->error("重置失败");
			}
		}
	}


}