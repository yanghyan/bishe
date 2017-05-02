<?php
//商户中心管理
namespace Home\Controller;
class SellerController extends SCommonController {
    //载入商户中心首页
	public function index(){
		$mod = M("shop");
		$mod1 = M("users");
		$mod2 =	M("Kind");
		//取到当前用户

		$se = session("shopuser");
		$list = $mod1->where("username = '".$se['username']."'")->select();


		
		$id = $list[0]["id"];
		$shop = $mod->where("uid = '".$id."'")->select();
		$sh = $shop[0];
		
		$kind = $mod2->find($sh['kind']);
		//var_dump($kind);
		$sh["k"] = $kind['classname'];
		//var_dump($sh["k"]);
		//var_dump($sh);
		$this->assign("sh",$sh);
        $this->display("Seller/index");
    }
	
	/*菜单管理*/
	//查看菜单
	public function showMenu(){
		$mod = M("menu");
		$mod1 = M("users");
		$mod2 = M("shop");

		//取到当前商户
		// session("homeuser","top123");
		$se = session("shopuser");
		$list = $mod1->where("username = '".$se['username']."'")->select();

		
		$id = $list[0]["id"];
		$shop = $mod2->where("uid = '".$id."'")->select();
		
		$sid = $shop[0]["id"];
		$mlist = $mod->where("sid = '".$sid."'")->select();
		$this->assign("list",$mlist);
		$this->display("Seller/menu");
		
	}
	
	
	//载入菜单添加页
	public function addMenu(){
		// 所属类别
		$mod 	=	M("tag");
		$mod1 	= 	M("users");
		$mod2 	= 	M("shop");
		// 查看类别
		$kind 	=	$mod->where("tag_kind=1")->select();	
		// 获取sid
		$se 	= 	session("shopuser");	
		$list 	= 	$mod1->where("username = '".$se['username']."'")->select();
		$id 	= 	$list[0]["id"];
		$shop 	= 	$mod2->where("uid = '".$id."'")->select();
		$sid 	= 	$shop[0]["id"];

		$this->assign("sid",$sid);
		$this->assign("kind",$kind);		
		$this->display("Seller/addmenu");
	}

	//执行，添加菜单
	public function insertMenu(){
		//上传图片处理
		$upload 		   = 	 new \Think\Upload();// 实例化上传类
		$upload->maxSize   =     3145728 ;// 设置附件上传大小
		$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		$upload->autoSub   =	 false;
		$upload->rootPath  =     './Public/Uploads/'; // 设置附件上传目录
		// 上传文件 
		$inf   =   $upload->upload();
		// var_dump($inf);
		if(!$inf) {// 上传错误提示错误信息    
			$this->error($upload->getError());
		}else{// 上传成功 获取上传文件信息    
			foreach($inf as $file){        
				// echo $file['savepath'].$file['savename'];
				$image = new \Think\Image(); 
				$image->open('./Public/Uploads/'.$file['savename']);
				// 按照原图的比例生成一个最大为150*150的缩略图并保存为thumb.jpg
				$image->thumb(120, 120)->save('./Public/Uploads/s_'.$file['savename']);    
			}
		}


		$mod = M("Menu");
		$info['sid'] 		= 	$_POST['sid'];
		$info['menu'] 		=	$_POST['menu'];
		$info['price'] 		=	$_POST['price'];
		$info['label_id']	=	$_POST['label_id'];
		$info['menu_pic']	=	$inf['menu_pic']['savename'];
		$info['state']		=	1;
		$info['addtime']	=	time();
		if ($mod->add($info)) {			
			$this->success("添加成功","showMenu",1);
		}else{
			$this->error("添加失败","addMenu",3);
		}

	}
	

	//载入菜单编辑页（弹框）
	public function editMenu(){
		
	}
	
	//执行，修改菜单操作
	public function updateMenu(){
		
	}
	
	//执行删除菜单操作
	public function delMenu(){
		$mod 	= 	M("menu");
		$n 		=	$mod->find($_GET['id']);
		@unlink("./Public/Uploads/{$n['menu_pic']}");
		@unlink("./Public/Uploads/{$n['menu_pic']}");
		$m    =  $mod->delete($_GET['id']);
		$data =  array();
		if ($m>0) {
			$data['b'] = true;
		}else{
			$data['b'] = false;
		}
		 $this->ajaxReturn($data,'json');
	}
	//强行下架（弹框：确定下架吗?）
	public function off(){
		$mod = M("Menu");
		$mod->state = 0;
		$mod->id = $_GET["id"];
		//$_POST["state"] = 0;
		//$mod->create();
		$res = $mod->save();
		if($res > 0){
			$res = $mod->find($_GET["id"]);
			$this->ajaxReturn($res,"json");
		}else{
			$this->ajaxReturn(null,"json");
		}
	}
	
	//重新上架（弹框：确定重新上架？）
	public function on(){
		$mod = M("Menu");
		$mod->state = 1;
		$mod->id = $_GET["id"];
		
		$res = $mod->save();
		if($res > 0){
			$res = $mod->find($_GET["id"]);
			$this->ajaxReturn($res,"json");
		}else{
			$this->ajaxReturn(null,"json");
		}
	}
	/*会员管理*/
	//查看来本店消费的会员信息
	public function showMember(){

		$mod 		= 		M("shop");
		$mod1 		=		M("users");
		$mod2 		=		M("indent");

		// 根据店铺id找到对应的所有订单
		$se 		= 		session("shopuser");
		$user 		= 		$mod1->where("username = '".$se['username']."'")->select();
		
		$uid 		=		$user[0]['id'];
		$shop  		= 		$mod->where("uid=".$uid)->select();

		$shopid 	=		$shop[0]['id'];
		// select indent.uid,sum(menu.price) from indent,menu where indent.sid = 10 and menu.id=indent.mid group by indent.uid 
		// $count 		=		$mod->query("select indent.uid,sum(menu.price) from indent,menu where indent.sid = 10 and menu.id=indent.mid group by indent.uid ");
		$list  		=		$mod->query("select users.username,users.sex,users.phone,users.email,sum(menu.price) sum from indent,menu,users where indent.sid = ".$shopid." and menu.id=indent.mid and users.id = indent.uid  group by users.id order by sum desc");
		
		
		//将所有用户的信息放入list中
		$this->assign("list",$list);

		$this->display("Seller/member");
	}
	
	/*口碑评价*/
	//显示对本店的所有评价（分页、搜索：按评分和时间搜）
	public function showComment(){
		//实例model类
		$mod2 		= 		M("comment");
		$mod1 		= 		M("users");
		$mod 		= 		M("shop");
		$mod3 		= 		M("delivery");

		// 获取店铺id
     	$se 		= 		session("shopuser");
		$user 		= 		$mod1->where("username = '".$se['username']."'")->select();
		
		$uid 		=		$user[0]['id'];
		$shop  		= 		$mod->where("uid=".$uid)->select();

		$shopid 	=		$shop[0]['id'];

		//获取所有信息(当前页信息)
		$list 		= 		$mod2->where("sid=".$shopid)->select();//取得该店铺下的所有评论
		// var_dump($list);
		// 遍历所有信息，找到评论的用户名，被评论的配送员名
		foreach($list as $k=>$v){
			// 找到所有评论用户名
			$user   =       $mod1->find($v['uid']);
			$list[$k]['username'] 		=		$user['username'];

			// 找到被评论的配送员
			$deli 	=		$mod3->find($v['did']);
			$duser 	=		$mod1->find($deli['uid']);
			$list[$k]['dname'] 		=		$duser['username'];


		}
		
		//放置到模板中
		$this->assign("list",$list);
		
		$this->display("Seller/comment");
	}
	
	/*订单管理*/
	//遍历所有订单（分页、搜索：按状态、时间和订单号搜）
	public function showOrder(){
		//实例model类
		$mod 		= 		M("shop");
		$mod1 		= 		M("users");	
		$mod2 		= 		M("indent");			
		$mod3 		= 		M("delivery");
		$mod4 		=		M("menu");

		// 获取店铺id
     	$se 		= 		session("shopuser");
		$user 		= 		$mod1->where("username = '".$se['username']."'")->select();
		
		$uid 		=		$user[0]['id'];
		$shop  		= 		$mod->where("uid=".$uid)->select();

		$shopid 	=		$shop[0]['id'];

		//获取所有信息(当前页信息)
		$list 		= 		$mod2->where("sid=".$shopid)->select();//取得该店铺下的所有订单

		
		// 遍历所有信息，找到评论的用户名，被评论的配送员名
		foreach($list as $k=>$v){
			// 找到所有评论用户名
			$user   =       $mod1->find($v['uid']);
			$list[$k]['username'] 		=		$user['username'];

			// 找到被评论的配送员
			$deli 	=		$mod3->find($v['did']);
			$duser 	=		$mod1->find($deli['uid']);
			$list[$k]['dname'] 		   =		$duser['username'];

			// 菜名
			$menu   = 		 $mod4->find($v['mid']);
			$list[$k]['menu']		    =		$menu['menu']; 

		}
		$this->assign("list",$list);
		$this->display("Seller/order");
	}
	
	//删除订单
	public function delOrder(){
		
	}
	
	//接单
	public function accept(){
		// 把状态改为2
		 
	}
	
	//发货
	public function send(){
		
	}
	
	//拒绝接单
	public function refuse(){
		
	}
}