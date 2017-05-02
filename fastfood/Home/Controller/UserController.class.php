<?php
//个人中心管理
namespace Home\Controller;
class UserController extends CommonController {
    /*个人信息*/
	//载入个人中心页面
	public function index(){
		$mod = M("users");
		
		//取到当前用户
		//session("homeuser","zhangsan");
		$se = session("homeuser");
		$id = $se["id"];
		$list = $mod->where("id = '".$id."'")->select();
		//var_dump($list);
		// $list = $mod->where("username = '".$se."'")->select();
		$li = $list[0];
		//var_dump($li);
		$this->assign("li",$li);
		$this->display("User/userinfo");
    }
	
	//加载修改密码页面
	public function mPass($id){
		$mod = M("users");
		$list = $mod->find($id);
		$this->assign("list",$list);
		$this->display("User/mPass");
	}
	//修改密码
	public function cPass(){
		$mod = D("users");
		
		//将POST中的信息封装到model中（准备要添加的数据）
		$mod->create();
		//执行更新，并判断
		if($mod->save()){
			$this->success("密码修改成功",U("User/index"));
		}else{
			$this->error("密码修改失败");
		}
	}
	
	//载入头像修改页面
	public function hPage($id=0){
		$mod = M("users");
		$list = $mod->find($id);
		//var_dump($list);
		$this->assign("list",$list);
		$this->display("User/mHead");
	}
	
	//用户头像设置（修改头像）
	public function hSet(){
		$mod = M("users");
		//var_dump($_FILES);exit;
		if($_FILES['pic']['error']!=4){
			//echo "success";exit;
			$upload = new \Think\Upload();// 实例化上传类
			$upload->maxSize   =     3145728 ;// 设置附件上传大小
			$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
			$upload->rootPath  =     './Public/Admin/Uploads/'; // 设置附件上传根目录
			$upload->savePath  =     ''; // 设置附件上传（子）目录
			$upload->autoSub   =   false; //关闭上传文件的子目录创建
			//上传文件 
			$info   =   $upload->upload();
			if(!$info) {
				// 上传错误提示错误信息
				$this->error($upload->getError());
			}else{
				//$this->success('上传成功！');
				//遍历上传后的图片并执行图片缩放
				$image = new \Think\Image(); 
				foreach($info as $file){
					
				//echo $file['savepath'].$file['savename']."<br/>";
				$image->open('./Public/Admin/Uploads/'.$file['savename']);
				//按照原图的比例生成一个最大为200*200的缩略图另存为带s_前缀的图片
				$image->thumb(200, 200)->save('./Public/Admin/Uploads/s_'.$file['savename']);	
				}
				 
				$fe = $mod->find($_GET['id']);
				//var_dump($_GET['id']);exit;
				$name = $fe['pic'];
				
			if($name){
				unlink("./Public/Admin/Uploads/{$name}");
				unlink("./Public/Admin/Uploads/s_{$name}");
			}
			
			$_POST["user_pic"] = $file['savename'];
			$mod->create();
			$m = $mod->save();
			
			}
		}
		
		if($m > 0){
			$this->success("头像修改成功",U("User/index"));
		}else{
			$this->error("头像修改失败！");
		}
	}
	
	//修改个人资料（载入修改界面）
	public function mPersonal($id){
		$mod = M("users");
		$list = $mod->find($_GET['id']);
		$this->assign("list",$list);
		//载入修改界面
		$this->display("User/mUserinfo");
	}
	
	//执行个人资料的修改
	public function updatePerson(){
		//实例化model类
		$mod = M("users");
		//将POST中的信息封装到model中（准备要添加的数据）
		$mod->create();
		//执行更新，并判断
		$m = $mod->save();
		//exit;
		if($m>0){
			$this->success("个人资料修改成功",U("User/index"));
		}else{
			$this->error("个人资料修改失败");
		}
	}
	
	/*收货地址*/
	//遍历收货地址
	public function showAddr(){
		$mod = M("address");
		$mod2 = M("users");
		//取到当前用户
		//session("homeuser","zhangsan");
		
		$se = session("homeuser");
		//var_dump($se);
		$uname = $mod2->where("username = '".$se."'")->select();
		$id = $se["id"];
		//var_dump($id);
		/*foreach($uname as $k=>$v){
			$id = $uname[$k]["id"];
			//var_dump($id);
		}*/
		
		$map = array();
		$map["uid"] = array('eq',$id);
		
		//获取数据条数，实例化分页类
		$total = $mod->where($map)->count();
		$page = new \Think\Page($total,3);
		
		$page->setConfig("prev","<");
		$page->setConfig("next",">");
		$page->setConfig("first","<<");
		$page->setConfig("last",">>");
		
		//获取所有信息(当前页信息)
		$list = $mod->where($map)->limit($page->firstRow.','.$page->listRows)->select();

		//var_dump($list);
		$this->assign("list",$list);
		$this->assign("pageinfo",$page->show()); //将分页信息放置到模板中
		$this->display("User/userAddr");
	}
	
	//载入添加地址页面
	public function addAddr(){
		$mod = M("address");
		$this->assign("list",$list);
		//加载模板
		$this->display("User/addAddr");
	}
	
	//执行，添加收货地址
	public function insertAddr(){
		$mod = M("address");
		$mod2 = M("users");
		//取到当前用户
		//session("homeuser","zhangsan");
		
		$se = session("homeuser");
		//var_dump($se);
		//$uname = $mod2->where("username = '".$se."'")->select();
		$id = $se["id"];
		//var_dump($uname);
		// foreach($uname as $k=>$v){
			// $id = $uname[$k]["id"];
			// //var_dump($id);
		// }
		
		$_POST["addtime"] = time();
		$_POST["state"] = 1;
		$_POST["uid"] = $id;
		
		//封装信息，并验证
		if(!$mod->create()){
			$this->error($mod->geterror());
		}
		if($mod->add()){
			//设置成功后跳转的页面，默认的返回页面是$_SERVER['HTTP_REFERER']
			$this->success("收货地址添加成功",U("User/showAddr"));
		}else{
			//错误页面的默认跳转页是前一页，通常不需要设置
			$this->error("收货地址添加失败");
		}
		//$this->display("User/userAddr");
	}
	
	//载入更新地址页面
	public function editAddr($id=0){
		//获取要编辑的信息，并放到模板中
		$this->assign("list",M("address")->find($id));
		//加载模板
		$this->display("User/editAddr");
	}
	
	//执行，更新收货地址
	public function updateAddr(){
		//实例化model类
		$mod = M("address");

		//将POST中的信息封装到model中（准备要添加的数据）
		$mod->create();
		//执行更新，并判断
		if($mod->save()){
			$this->success("收货地址修改成功",U("User/showAddr"));
		}else{
			$this->error("收货地址修改失败");
		}
	}
	
	//执行，删除收货地址
	public function delAddr($id=0){
		$m = M("address")->delete($id);
		
        $data = array();
        if($m>0){
            $data['b'] = true;
        }else{
            $data['b']= false;
        }
        $this->ajaxReturn($data);
	}
	
	//执行，设为默认地址（默认地址只有一个）
	public function defaultAddr(){
		$mod = M("address");
		
		$mod2 = M("users");
		//取到当前用户
		//session("homeuser","zhangsan");
		$se = session("homeuser");
		
		/*$uname = $mod2->where("username = '".$se."'")->select();
		foreach($uname as $k=>$v){
			$id = $uname[0]["id"];
		}*/
		
		$id = $se["id"];
		$map = array();
		$map["uid"] = array("eq",$id);
		$map["state"] = array("eq","0");
		$addrlist = $mod->where($map)->select();
		$addrid = $addrlist[0]["id"];
		$data["state"] = 1;
		$mod->where("id = '".$addrid."'")->data($data)->save();
		// var_dump($addrlist);exit;
		// $mod->state = 1;
		// $mod->create();
		// $m = $mod->save();
	
		$mod->state = 0;
		$mod->id = $_GET["id"];
		$res = $mod->save();
		$r = array();
		if($res > 0){
			$u = $mod->find($_GET["id"]);
			$r['b'] = true;
			$r['id']= $u['id'];
			$r['oid']= $addrlist[0]["id"];
		}else{
			$r['b'] = false;
		}
		$this->ajaxReturn($r);
	}
	
	/*我的订单*/
	//遍历用户订单
	public function showOrder(){
		//实例订单、菜单、用户和商店类
		$mod = M("indent");
		$mod1 = M("menu");
		$mod2 = M("users");
		$mod3 = M("shop");
		
		//取到当前用户
		
		$se = session("homeuser");
		$id = $se["id"];
		/*$uname = $mod2->where("username = '".$se."'")->select();
		
		//var_dump($uname);
		foreach($uname as $k=>$v){
			$id = $uname[$k]["id"];
			//var_dump($id);
		}*/
		
		$map = array();
		$map["uid"] = array('eq',$id);
		
		//获取数据条数，实例化分页类
		$total = $mod->where($map)->count();
		$page = new \Think\Page($total,3);
		
		$page->setConfig("prev","<");
		$page->setConfig("next",">");
		$page->setConfig("first","<<");
		$page->setConfig("last",">>");
				
		//获取所有信息(当前页信息)
		$list = $mod->where($map)->limit($page->firstRow.','.$page->listRows)->select();
		
		//var_dump($list);
		foreach($list as $k => $v){
			$ind = $mod1->find($v["mid"]);
			//$ind2 = $mod2->find($v["uid"]);
			
			$ind3 = $mod3->find($v["sid"]);
			
			$list[$k]["menu"] = $ind["menu"];
			$list[$k]["menu_pic"] = $ind["menu_pic"];
			$list[$k]["price"] = $ind["price"];
			//$list[$k]["username"] = $ind2["username"];
			$list[$k]["username"] = $se;
			$list[$k]["shopname"] = $ind3["shopname"];		
		}
		//var_dump($list);
		
		//放置到模板中
		$this->assign("list",$list);
		$this->assign("pageinfo",$page->show()); //将分页信息放置到模板中

        //加载模板输出
		$this->display("user/order");
	}
	
	//用户订单详情
	public function orderDetail($id){
		//实例订单、菜单、用户和商店类
		$mod = M("indent");
		$mod1 = M("menu");
		$mod2 = M("users");
		$mod3 = M("shop");
		
		//获取所有信息(当前页信息)
		$list = $mod->find($id);
		
		$ind = $mod1->find($list["mid"]);
		$ind2 = $mod2->find($list["uid"]);
		$ind3 = $mod3->find($list["sid"]);
		$ind4 = $mod2->find($list["did"]);
		//var_dump($list["mid"]);
		$list["menu"] = $ind["menu"];
		$list["username"] = $ind2["username"];
		$list["shopname"] = $ind3["shopname"];
		$list["dname"] = $ind4["id"];
		//var_dump($ind4["id"]);
		$ind5 = $mod2->where("state = 4")->find($ind4["id"]);
		$list["name"] = $ind5["username"];
		$list["phone"] = $ind5["phone"];
			
		//var_dump($list);
		
		//放置到模板中
		$this->assign("list",$list);
		
        //加载模板输出
		$this->display("user/orderDetail");
	}
	
	//删除订单
	public function delOrder($id=0){
		$m = M("indent")->delete($id);
        $data = array();
        if($m>0){
            $data['b'] = true;
        }else{
            $data['b']= false;
        }
        $this->ajaxReturn($data);
	}
	
	/*我的评价*/
	//载入（已）评价页面
	public function comment(){		
		//实例model类
		$mod = M("comment");
		$mod1 = M("users");
		$mod2 = M("shop");
		$mod3 = M("delivery");
       
		//取到当前用户
		$se = session("homeuser");
		$id = $se["id"];
		$map = array();
		$map["uid"] = array('eq',$id);
	   
		//获取数据条数，实例化分页类
		$total = $mod->where($map)->count();
		$page = new \Think\Page($total,3);
		
		$page->setConfig("prev","<");
		$page->setConfig("next",">");
		$page->setConfig("first","<<");
		$page->setConfig("last",">>");
		
		//获取所有信息(当前页信息)
		$list = $mod->where($map)->limit($page->firstRow.','.$page->listRows)->select();
		//var_dump($list);
		foreach($list as $k=>$v){
			$com = $mod1->find($v["uid"]);
			$com2 = $mod2->find($v["sid"]);
			$com3 = $mod3->find($v["did"]);
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
		$this->display("user/uComment");
	}
	//修改评价（已评价）
	public function mComment($id=0){
		//载入评论编辑页面
		$mod = M("comment");
		$list = $mod->find($id);
		//var_dump($list);
		$this->assign("list",$list);
		$this->display("user/mComment");
	}
	
	//更新评价
	public function updateComment(){
		//实例化model类
		$mod = M("comment");
		//将POST中的信息封装到model中（准备要添加的数据）
		$mod->create();
		//执行更新，并判断
		if($mod->save()){
			$this->success("评论修改成功",U("user/comment"));
		}else{
			$this->error("评论修改失败");
		}
	}
	
	//评价（待评价）
	public function waitComment(){
		//载入未评价页面
		//实例model类
		$mod = M("comment");
		$mod1 = M("users");
		$mod2 = M("shop");
		$mod3 = M("delivery");
		$mod4 = M("indent");
		
		
		//取到当前用户
		$se = session("homeuser");
		$id = $se['id'];//当前用户的id
		
		//找到当前用户的未评价的订单
		
		
		//1.先找到当前用户的所有订单
		$indsid = $mod4->where("uid=".$id)->select();
		
		//2.再找到这些订单对应的评价
		foreach($indsid as $k => $v){
			
			$isid = $v["sid"];
			$map["sid"] = array("eq",$isid);
			$map['uid'] = array("eq",$id);
			$list = $mod->where($map)->limit($page->firstRow.','.$page->listRows)->select();
			
			//3.如果找到证明已经评价，无需遍历；如果没有找到证明没有评价，遍历信息
			if(empty($list)){
				$shoplist = $mod2->where("id =".$isid)->select();
				$shop[$k] = $shoplist[0];
			}
		}
		
	    $this->assign("shoplist",$shop);
		
		//获取数据条数，实例化分页类
		$total = $mod->where($map)->count();
		$page = new \Think\Page($total,3);
		
		$page->setConfig("prev","<");
		$page->setConfig("next",">");
		$page->setConfig("first","<<");
		$page->setConfig("last",">>");
		
		//放置到模板中
		$this->assign("list",$list);
		$this->assign("pageinfo",$page->show()); //将分页信息放置到模板中
		$this->display("User/noComment");
	}
	
	//插入评价页面
	public function addComment($id=0){
		$mod = M("comment");
		$mod1 = M("indent");
		$mod2 = M("shop");
		$mod3 = M("delivery");
		$mod4 = M("users");
		
		//取到当前用户
		$se 	= 	session("homeuser");
		$id 	= 	$se['id'];//当前用户的id
		$sid 	= 	$_GET["id"];//接收传过来的商店的id
		
		$map = array();
		$map["sid"] = array("eq",$sid);
		$map['uid'] = array("eq",$id);
		
		$list = $mod1->where($map)->find();//根据商店id和用户id找到对应的订单
		$com2 = $mod2->find($list["sid"]);//根据订单sid找出对应的商铺信息
		$com3 = $mod3->find($list["did"]);//根据订单did找出对应的配送员信息
		//var_dump($list);
		$this->assign("li",$list);
		//载入准备评价页面
		$this->display("User/addComment");
	}
	
	//添加评价
	public function insertComment(){
		$mod = M("comment");
		$_POST["addtime"] = time();
		//封装信息，并验证
		if(!$mod->create()){
			$this->error($mod->geterror());
		}else{
			//var_dump($mod);exit;
			if($mod->add()){
				
				//设置成功后跳转的页面，默认的返回页面是$_SERVER['HTTP_REFERER']
				 $this->success("评价成功","Comment");
			}else{
				//错误页面的默认跳转页是前一页，通常不需要设置
				$this->error("评价失败");
			}
		}
		//$this->display("user/uComment");
	}
	
	/*我的收藏*/
	//遍历所有收藏
	public function showCollect(){
		//实例收藏、用户和商店类
		$mod = M("collect");
		$mod1 = M("users");
		$mod2 = M("shop");
		
		//取到当前用户
		//session("homeuser","zhangsan");
		$se = session("homeuser");
		$id = $se['id'];
		
		$map = array();
		$map["uid"] = array('eq',$id);
		
		//获取数据条数，实例化分页类
		$total = $mod->where($map)->count();
		$page = new \Think\Page($total,3);
		
		$page->setConfig("prev","<");
		$page->setConfig("next",">");
		$page->setConfig("first","<<");
		$page->setConfig("last",">>");
		
		//获取所有信息(当前页信息)
		$list = $mod->where($map)->limit($page->firstRow.','.$page->listRows)->select();
		
		//var_dump($list);
		foreach($list as $k => $v){
			$col1 = $mod1->find($v["uid"]);
			$col2 = $mod2->find($v["sid"]);
			//var_dump($col2);
			$list[$k]["username"] = $col1["username"];
			//$list[$k]["username"] = $se;
			$list[$k]["shopname"] = $col2["shopname"];
		}
		//var_dump($list);
		//放置到模板中
		$this->assign("list",$list);
		$this->assign("pageinfo",$page->show()); //将分页信息放置到模板中
        //加载模板输出
		$this->display("User/collect");
	}
	
	//删除收藏
	public function delCollect($id=0){
		$m = M("collect")->delete($id);
        $data = array();
        if($m>0){
            $data['b'] = true;
        }else{
            $data['b'] = false;
        }
        $this->ajaxReturn($data);
	}
	
	//全部取消收藏
	public function delAll(){
		$mod = M("collect");
		$mod1 = M("users");
		//取到当前用户
		//session("homeuser","zhangsan");
		$se = session("homeuser");
		$id = $se['id'];
		
		$m = $mod->where("uid = '".$id."'")->delete();
		$data = array();
        if($m>0){
            $data['b'] = true;
        }else{
            $data['b'] = false;
        }
        $this->ajaxReturn($data);
	}
}