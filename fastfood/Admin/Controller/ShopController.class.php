<?php
//店铺管理模块
namespace Admin\Controller;
class ShopController extends CommonController {
    //查询、分页和搜索（按店名、所属类别和地址区域搜）
	public function index(){
        //判断并封装搜索信息信息
       $map = array();
       //按照店名查找
       if($_GET['shopname']){
           $map['shopname'] = array("like","%{$_GET['shopname']}%");
       }      
       //按照所属类别查找
       if(!empty($_GET['kind'])){
           $map['kind'] = array("eq","{$_GET['kind']}");
       }
       //按照地址区域查找
       if(!empty($_GET['address'])){
           $map['address'] = array("eq","{$_GET['address']}");
       }

		$mod 	= 	M("Shop");
		$mod1 	= 	M("Users");
		$mod2	=	M("Kind");
		$count 	= 	$mod->where($map)->count();
		$page 	= 	new \Think\Page($count,5);//实例化分页类
		$list 	= 	$mod->where($map)->limit($page->firstRow.','.$page->listRows)->select();

		$page   -> 	setConfig('theme','<ul class="pagination pagination-sm no-margin pull-right">
					<li>%FIRST%</li>
                    <li>%UP_PAGE%</li>
                    <li>%LINK_PAGE%</li>
                    <li>%DOWN_PAGE%</li>
                    <li>%END%</li></ul>');
		//遍历获取配送员的用户名和昵称
		foreach ($list as $k => $v) {
			$user 					= 	$mod1->find($v['uid']);
			$list[$k]['username'] 	= 	$user['username'];
			$kind  					= 	$mod2->find($v['kind']);
			$list[$k]['k'] 	= 	$kind['classname'];
		}
		$kind 	= 	$mod2->where("pid=0")->select();			
		$show 	= 	$page->show();
		$this	->	assign("kind",$kind);
		$this	->	assign("page",$show);
		$this	->	assign("list",$list);
        $this	->	display("Shop/index");
    }
	
	//载入添加页
	public function add(){
		$mod1 	= 	M("kind");		
		$kind 	= 	$mod1->where("pid=0")->select();	
		$this->assign("kind",$kind);
		$this->display("add");
	}
	
	//执行添加
	public function insert(){
		$mod 	= 	D("Users");
		$mod1	= 	D("Shop");

		if(!$mod->create()){
			$this->error("验证失败","add",3);
		}else{
			$mod->state = 3;//设置用户身份为配送员
			if ($mod->add()) {
				
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
				$list 				= 	$mod->where("username='".$_POST['username']."'")->find();

				$info['uid'] 		= 	$list['id'];
				$info['shopname'] 	= 	$_POST['shopname'];
				$info['address']	=	$_POST['address'];
				$info['detail_add'] =	$_POST['detail_add'];
				$info['kind']		= 	$_POST['kind'];
				$info['shoptype']	=	$_POST['shoptype'];
				$info['env_pic']	=	$inf['env_pic']['savename'];
				$info['door_pic']	=	$inf['door_pic']['savename'];
				$info['info']		=	$_POST['info'];
				$info['info_pic']	=	$inf['info_pic']['savename'];
				//var_dump($info);
				//执行数据库添加
				if (!$mod1->create($info)) {
					$this->error("增加验证失败");
				}else{
					// var_dump($mod1);exit;
					if ($mod1->add()) {
						$this->success("更新成功","index",1);
					}else{
						$this->error("更新失败");
					}
				}
			}else{
				$this->error("添加失败","add",3);
			}
		}
	}
	
	//载入编辑页面（加隐藏input框，id）
	public function edit($id=0){
		$mod 	= 	D("Users");
		$mod1	= 	D("Shop");
		$mod2 	= 	M("kind");		
		$kind 	= 	$mod2->where("pid=0")->select();		
		$s 		=	$mod1->find($_GET['id']);
		$u 		=	$mod->find($s['uid']);
		$this->assign("kind",$kind);
		$this->assign("s",$s);
		$this->assign("u",$u);
		$this->display("Shop/edit");
	}
	
	//执行修改
	public function update(){
		$mod 	=	M("shop");
		//判断是否修改了图片		
		if($_FILES['door_pic']['error']==4&&$_FILES['env_pic']['error']==4&&$_FILES['info_pic']['error']==4){//没有修改图片
			if (!$mod->create()) {
				$this->error("验证失败");
			}else{
				// var_dump($mod);
				if($mod->save()) {
					$this->success("更新成功","index",1);
				}else{
					$this->error("更新失败");
				}
			}
		}else{
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
					// // 按照原图的比例生成一个最大为150*150的缩略图并保存为thumb.jpg
					$image->thumb(100, 100)->save('./Public/Uploads/s_'.$file['savename']);    
				}
			}
			$lastdata			=	$mod->find($_POST['id']);
			if (!empty($inf['env_pic']['savename'])) {
				@unlink("./Public/Uploads/{$lastdata['env_pic']}");
			}else if(!empty($inf['door_pic']['savename'])){
				@unlink("./Public/Uploads/{$lastdata['door_pic']}");
			}elseif (!empty($inf['info_pic']['savename'])) {
				@unlink("./Public/Uploads/{$lastdata['info_pic']}");
			}
			$info['id']			=	$_POST['id'];
			$info['shopname'] 	= 	$_POST['shopname'];
			$info['address']	=	$_POST['address'];
			$info['detail_add'] =	$_POST['detail_add'];
			$info['kind']		= 	$_POST['kind'];
			$info['shoptype']	=	$_POST['shoptype'];
			$info['env_pic']	=	empty($inf['env_pic']['savename'])?$lastdata['env_pic']:$inf['env_pic']['savename'];
			$info['door_pic']	=	empty($inf['door_pic']['savename'])?$lastdata['door_pic']:$inf['door_pic']['savename'];
			$info['info']		=	$_POST['info'];
			$info['info_pic']	=	empty($inf['info_pic']['savename'])?$lastdata['info_pic']:$inf['info_pic']['savename'];
			if($mod->save($info)) {
				$this->success("更新成功","index",1);
			}else{
				$this->error("更新失败");
			}

		}
		
	}
	
	//执行删除
	public function del($id=0){
		$mod 	= 	M("shop");
		$n 		=	$mod->find($_GET['id']);
		@unlink("./Public/Uploads/{$n['env_pic']}");
		@unlink("./Public/Uploads/{$n['door_pic']}");
		@unlink("./Public/Uploads/{$n['info_pic']}");
		@unlink("./Public/Uploads/s_{$n['env_pic']}");
		@unlink("./Public/Uploads/s_{$n['door_pic']}");
		@unlink("./Public/Uploads/s_{$n['info_pic']}");
		$m    =  $mod->delete($_GET['id']);
		$data =  array();
		if ($m>0) {
			$data['b'] = true;
		}else{
			$data['b'] = false;
		}
		 $this->ajaxReturn($data,'json');
	}
	//状态函数
	public function doShen()
	{
		$mod			= 	M("shop");   	
		$data['id'] 	= 	$_GET['id'];

		if ($_GET['state']==1) {
			$data['state']	=	2;		
		}elseif($_GET['state']==2){
			$data['state']	=	0;
		}elseif($_GET['state']==='0'){
			$data['state']	=	1;
		}

		$arr  	= 	array();

		if ($mod->save($data)) {
			$arr['b']	=	true;			

		}else{
			$arr['b']	=	false;
		}
		$arr['a']	=	$data['state'];
		$arr['id']	=	$data['id'];

		$this->ajaxReturn($arr,'json');	
	}
}