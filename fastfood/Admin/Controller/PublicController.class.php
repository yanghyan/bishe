<?php
//网站后台执行登录、退出和获取验证码的控制器
namespace Admin\Controller;
use Think\Controller;
class PublicController extends Controller {
    //载入登录界面
	public function login(){
        $this->display("Public/login");
    }
	
	//执行登录验证
	public function doLogin(){
			//执行会员登录
	    	$mod = M("users");
	    	$map = array();
	    	$map['username'] = $_POST['username'];
	    	$map['pass'] = md5($_POST['pass']);
	    	$map['state'] = '1';
	    	$u = $mod->where($map)->find();
	    	if($u){
	    		session("adminuser",$u);
	    		$this->redirect("Index/index");
	    	}else{
	    		$this->assign("info","账户或密码错误");
	    		$this->login();
	    	}
	}
	
	//执行退出
	public function doLogout(){
			session("adminuser",null);
	    	$this->display("login");
	}
	
	//验证码的输出
	public function verify(){
        $config =    array(    
        	'fontSize'    =>    30,    // 验证码字体大小    
        	'length'      =>    4,     // 验证码位数    
        	'useNoise'    =>    false, // 关闭验证码杂点
        	);
        $Verify =     new \Think\Verify($config);
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
}