<?php
//网站前台执行登录、退出、获取验证码和用户商家配送员的注册，短信、忘记密码等操作的控制器
namespace Home\Controller;
use Think\Controller;
class PublicController extends Controller {

    //提供登录表单（载入登录页面）
	public function index(){
        $type1 = $_REQUEST["url"];
        $type2 = $_REQUEST['type'];
        if($type1){
            $type = $type1;
        }elseif($type2){
            $type = $type2;
        }
        $id = $_REQUEST["id"];
        $this->assign("type",$type);
        $this->assign("id",$id);
        $this->display("Public/login");
    }
	
	//执行登录（js验证用户名、密码、验证码）
	public function doLogin(){
			//执行会员登录
	    	$mod 				= 	M("users");

	    	$map 				= 	array();

	    	$zhi				= 	$_POST['username'];

	    	$map['pass'] 		= 	md5($_POST['pass']);

	    	$usersf 			=	$_GET['s'];
	    	// var_dump($zhi);



	    	// 判断接收过来的值是手机、邮箱、还是用户名
	    	if (preg_match("/^[\w-]+(\.[\w-]+)*@[\w-]+(\.[\w-]+)+$/i",$zhi)!=null) {
	    		
	    		$map['email']   =	$zhi; 

	    	}else if(preg_match("/^1[34578]\d{9}$/",$zhi)){

	    		$map['phone']   =	$zhi; 

	    	}else{
	    		$map['username'] =	$zhi; 
	    	}

	    	//判断是哪个页面传过来的
           /* $type = $_GET["url"];
            if($type == 1){
                $url = "Index/index";
            }*/
	    	// 判断是用户登录，还是商家登录，还是配送员登录
	    	// $u = array();

	    	if ($usersf=="users") {//用户登录

	    		$u = $mod->where($map)->find();

	    		if($u){

		    		session("homeuser",$u);

		    		$homeuser	=	session("homeuser");

                    //判断是哪个页面传过来的,1:首页，退出登录
                    $type = $_REQUEST["type"];
                    $id = $_REQUEST["id"];
                    /*D("Demo")->add(array("name"=>$type,"num"=>$id));*/
                    if($type == 1){
                        $this->redirect("Index/index");
                    }else if($type == 2){
                        $this->redirect("Detail/index",array("id"=>$id));
                    }

                   /* $preUrl =	$_SERVER['HTTP_REFERER'];
                    header("location:".$preUrl);*/

		    	}else{

		    		$this->assign("info","账户或密码错误");

		    		$this->index();

		    	}

	    	}else if ($usersf=="shop") {//商户登录

	    		$map['state'] 	= 	3;

	    		$u = $mod->where($map)->find();

	    		if($u){

		    		session("shopuser",$u);

		    		$homeuser	=	session("shopuser");
		    		
		    		$this->redirect("Seller/index");

		    	}else{
		    		// echo "账户或密码错误";
		    		$this->assign("info","账户或密码错误");

		    		$this->slogin();

		    	}

	    	}else if($usersf=="peisong"){//配送员

	    		$map['state'] 	= 	4;

	    		$u = $mod->where($map)->find();

	    		if($u){

		    		session("homeuser",$u);

		    		$homeuser	=	session("homeuser");
		    		
		    		$this->redirect("Index/index");

		    	}else{

		    		$this->assign("info","账户或密码错误");

		    		$this->index();

		    	}
	    	}


	    	
	}
	//手机验证码执行登录
	public function doPLogin(){
			//执行会员登录
 				$mod 			= 	M("users");

 				$yzm			=	$_POST['ddmm'];//验证码

			// 2min后
			if ((time() - session('yzmtime')) > 1800) {
			    
			    session('yzm',null);//半个小时失效

			}

 			if ($yzm==session('yzm')) {

 				session('yzm',null);//清除验证码的session

	    		$map 			= 	array();

	    		$map['phone']   = 	$_POST['phone'];

	    		$u 				= 	$mod->where($map)->find();

	    		$name 			=	empty($u['name'])?'用户':$u['name'];

	    		if(!empty($u['name'])){

	    			session("homeuser",$u);

                    $type = $_GET["type"];
                    if($type == 1){
                        $this->redirect("Index/index");
                    }

	    		}else{

	    			$this		->	assign("info1","此账号不存在！");

	    			$this		->	index();

	    		}
	    	
			}else{
					$this		->	assign("info1","动态密码不正确！");

	    			$this		->	index();
			}

		}

	//退出登录（清除session）
	public function doLogout(){

		session("homeuser",null);
        $type = $_GET["url"];
        $this->assign("type",$type);
	    $this->display("login");

	}
	
	//验证码的输出
	public function verify(){

		$Verify 			= 	new \Think\Verify();

        $Verify->length 	= 	4; //验证码位数

        //$Verify->useCurve = false; //是否使用混淆曲线 默认为true
        
        $Verify->useNoise 	= 	false; //是否添加杂点 默认为true
        
        $Verify->entry();

	}
	//验证验证码
	public function checkVerify(){

    	$verify = new \Think\Verify();

    	$data = array();

    	if(!$verify->check($_POST['mycode'])){

	          $data['b'] = false;

	    }else{

	      	  $data['b'] = true;

	    }

	    $this->ajaxReturn($data,'json');
	}
	
	//载入注册页面（用户）
	public function register(){

		$this->display("Public/register");

	}
	
	//将用户注册信息插入数据库
	public function insert(){
		//执行会员注册
		$mod 			= 	D("Users");

		$yzm			=	$_POST['code'];//验证码

		// 2min后
		if ((time() - session('yzmtime')) > 1800) {
		    
		    session('regyzm',null);//半个小时失效

		}

		if ($yzm==session('regyzm')) {

			// 执行插入数据库操作
			if(!$mod->create()){

				$this->error("验证失败！");

			}else{
				// var_dump($mod);
				if ($mod->add()) {

					$this->success("注册成功！请登录！","index",1);

				}else{

					$this->error("注册失败！");

				}
			}	

		}else{
			$this		->	assign("info","验证码不正确！");

	    	$this		->	register();
		}

	}
	
	// 检测用户的用户名、邮箱、手机号是否唯一
	public function check(){

		$mod 				= 	M("users");

	    $map 				= 	array();

		$zhi 				= 	$_POST['val'];

		//判断传过来的是用户名、邮箱、还是手机号
		if (preg_match("/^[\w-]+(\.[\w-]+)*@[\w-]+(\.[\w-]+)+$/i",$zhi)!=null) {
	    		
    		$map['email']   =	$zhi; 

    	}else if(preg_match("/^1[34578]\d{9}$/",$zhi)){

    		$map['phone']   =	$zhi; 

    	}else{
    		$map['username'] =	$zhi; 
    	}

    	$u 					 = 	$mod->where($map)->find();

    	$data 				 = 	array();

	    if($u){

	    	$data['b']		 =	false;//如果存在该用户名返回false

	    	$data['name']	 =  $u['username'];

	    	$this->ajaxReturn($data,'json');

	    }else{

	    	$data['b']		 =	true;//如果不存在该用户返回true

	    	$data['name']	 =	null;

	    	$this->ajaxReturn($data,'json');
	    	
	    }



	}
	// 载入商家登录界面
	public function slogin(){

		$this->display("Public/slogin");

	}

	//载入商家注册页面
	public function sregister(){

		$mod1 	= 	M("kind");		

		$kind 	= 	$mod1->where("pid=0")->select();	

		$this->assign("kind",$kind);

		$this->display("Public/sRegister");

	}
	
	//将商户注册信息插入数据库
	public function sinsert(){
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
						$this->success("注册成功","slogin",1);
					}else{
						$this->error("注册失败");
					}
				}
			}else{
				$this->error("添加失败","add",3);
			}
		}
	}
	
	// 载入配送员登录界面
	public function plogin(){

		$this->display("Public/plogin");

	}
	
	//载入密码忘记页面
	public function forgetPW(){

		$this->display("Public/forget1");	

	}
	public function forget2(){

		$phone	= 	$_POST['username'];

		if (empty($phone)) {

       		$this->redirect("Public/forgetPW");

       		exit;

       	}

		$sphone	=	substr_replace($phone,'****',3,4);

		$this->assign("phone",$phone);

		$this->assign("sphone",$sphone);

		$this->display("Public/forget2");

	}
	public function forget3(){

			$mod 	=	M("users");

			$phone	= 	$_POST['phone'];

			if (empty($phone)) {

	       		$this->redirect("Public/forgetPW");

	       		exit;

       		}
			

			$yzm 	=	$_POST['mobileVcode'];

			// 2min后
			if ((time() - session('yzmtime')) > 1800) {
			    
			    session('yzm',null);//半个小时失效

			}

 			if ($yzm==session('yzm')) {

 				session('yzm',null);//清除验证码的session

 				$map['phone']   =	$phone; 

 				$u 	=	$mod->where($map)->find();

 				
 				$this->redirect("Home/Public/page3/u/{$u['username']}");	    	
	    	
			}else{

				$this		->	assign("info","手机验证码不正确！");

				$sphone	 	=	substr_replace($phone,'****',3,4);

				$this		->	assign("sphone",$sphone);

				$this		->	assign("phone",$phone);

    			$this		->	display("Public/forget2");

			}

	}
	// 加载页面三
	public function  page3(){

		$u 	=	$_GET['u'];

		if (empty($u)) {

       		$this->redirect("Public/forgetPW");

       		exit;

       	}

		$this->assign("username",$u);

		$this->display("Public/forget3");
	}
	// 重置密码
	public function czPass(){

		$mod 				= 	M("Users");

		$map 				=	array();

		$username			=	$_POST['username'];

		$map['username'] 	=	$username;

		$u 					=	$mod->where($map)->find();

		$data 				=	array();

		$data['id'] 		=	$u['id'];

		$data['pass']		=	md5($_POST['pass']);

		if ($mod->save($data)) {

			$this->success("重置成功,请登录","index",1);

		}else{

			$this->error("重置失败");

		}
		

	}
	//登录短信验证码方法
	public function messageCode(){

		    $mod 			= 	M("users");
 
	    	$map 			= 	array();

	    	$map['phone']   = 	$_POST['phone'];

	    	$u 				= 	$mod->where($map)->find();

	    	$phone 		 	= 	$_POST['phone'];

	    	$name 			=	empty($u['name'])?'用户':$u['name'];//如果数据库中有对应的电话则返回数据库中的名字，否则使用"用户"
	    	
	    	$code			=	rand(pow(10,(4-1)), pow(10,4)-1);// 随机生成四位数的验证码

	    	$data 			=	array();

	    	session("yzm",$code);

	    	session("yzmtime",time());

	  //   	$resp	  		=	sendMSM("CLY食客","{\"name\":\"".$name."\",\"code\":\"".$code."\"}",$phone,"SMS_52935036");

	  // 	  	$xml 			= 	$resp;

			// $err_code 		= 	(string) $xml->result->err_code;

			// $model 			= 	(string) $xml->result->model;

			// $success 		= 	(string) $xml->result->success;
			
	    	$success 			= 	true;

	    	if(isset($success)){

	    	  $data['b']	=	true;

	    	  $data['c']	=	$code;

	    	}else{

	    	  $data['b']	=	false;

	    	  $data['m']  	= 	$err_code;

	    	}
	        
	    	$this->ajaxReturn($data,'json');
	    	

	}
	// 注册用户的短信验证码
	public function regMessage(){
		     
	    	$phone 		 	= 	$_POST['phone'];
	    	
	    	$reg 			=	$_POST['reg'];

	    	$code			=	rand(pow(10,(4-1)), pow(10,4)-1);// 随机生成四位数的验证码

	    	$data 			=	array();

	    	session("regyzm",$code);

	    	session("yzmtime",time());

	    	//判断$reg确认是商家注册还是用户注册
	    	if ($reg=="user") {

	    		$resp	  		=	sendMSM("CLY食客","{\"number\":\"".$code."\"}",$phone,"SMS_50960105");

	    	}else if ($reg=="shop") {

	    		$resp	  		=	sendMSM("CLY食客","{\"number\":\"".$code."\"}",$phone,"SMS_50995045");

	    	}
	    	

	  	  	$xml 			= 	$resp;

			$err_code 		= 	(string) $xml->result->err_code;

			$model 			= 	(string) $xml->result->model;

			$success 		= 	(string) $xml->result->success;
			
	    	// $success 			= 	true;

	    	if(isset($success)){

	    	  $data['b']	=	true;

	    	  $data['c']	=	$code;

	    	}else{

	    	  $data['b']	=	false;

	    	  $data['m']  	= 	$err_code;

	    	}
	        
	    	$this->ajaxReturn($data,'json');
	}



}