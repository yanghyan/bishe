<?php
//轮播管理模块
namespace Admin\Controller;
class SlideController extends CommonController {
	//浏览、分页
    public function index(){
		$mod = M("Slide");
		$map = array();
		if(!empty($_GET["state"])||$_GET["state"]==="0"){
			$map["state"] = array("EQ","{$_GET["state"]}");
		}
		$total = $mod->where($map)->count();
	    $page = new \Think\Page($total,3);
	    $page->setConfig('theme',"<ul class='pagination'><li>%FIRST%</li><li>%UP_PAGE%</li><li>%LINK_PAGE%</li><li>%DOWN_PAGE%</li><li>%END%</li></ul>");
	    //获取所有信息(当前页信息)
	    $list = $mod->where($map)->limit($page->firstRow.','.$page->listRows)->select();
		foreach($list as $k=>$v){
			$list[$k]['addtime'] = date("Y-m-d",$list[$k]['addtime']);
		}
		
        //放置到模板中
        $this->assign("pageinfo",$page->show()); //将分页信息放置到模板中
		$this->assign("slidelist",$list);
        $this->display("Slide/index");
    }
	
	//载入添加页面（弹框。js：图片必须存在，链接地址不能为空）
	public function add(){
		$this->display("Slide/add");
	}
	
	//执行添加
	public function insert(){
		$upload = new \Think\Upload();// 实例化上传类
		$mod = new \Think\Model("Slide");
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath  =     './Public/Admin/Uploads/'; // 设置附件上传根目录
        $upload->savePath  =     ''; // 设置附件上传（子）目录
        $upload->autoSub   =   false; //关闭上传文件的子目录创建
        // 上传文件 
        $info   =   $upload->upload();
        if(!$info) {// 上传错误提示错误信息
            $this->error($upload->getError());
        }else{// 上传成功
            //$this->success('上传成功！');
            //遍历上传后的图片并执行图片缩放
            $image = new \Think\Image(); 
            foreach($info as $file){
                //echo $file['savepath'].$file['savename']."<br/>";
                $image->open('./Public/Admin/Uploads/'.$file['savename']);
                // 按照原图的比例生成一个最大为200*200的缩略图另存为带s_前缀的图片
                $image->thumb(200, 200)->save('./Public/Admin/Uploads/s_'.$file['savename']);
				$data['pic'] = $file['savename'];
				$data['desc'] = $_POST['desc'];
				$data["link"] = $_POST["link"];
				$data["state"] = 0;
				$data["addtime"] = time();
				$m = $mod->add($data);
				if($m){
					$this->success("上传成功！","index",3);
				}else{
					$this->error("上传失败！","add",3);
				}
            }
        }
	}
	
	//载入编辑页面（弹框）
	public function edit($id=0){
		$mod = M("Slide");
		$slide = $mod->find($id);
		$this->assign("slide",$slide);
		$this->display("Slide/edit");
	}
	
	//执行更新
	public function update(){
		$mod = M("Slide");
		
		if($_POST['desc']){
			$mod->create();
			$d = $mod->save();
		}
		
		if(!empty($_FILES['pic']['tmp_name'])){
			
			$upload = new \Think\Upload();// 实例化上传类
			$upload->maxSize   =     3145728 ;// 设置附件上传大小
			$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
			$upload->rootPath  =     './Public/Admin/Uploads/'; // 设置附件上传根目录
			$upload->savePath  =     ''; // 设置附件上传（子）目录
			$upload->autoSub   =   false; //关闭上传文件的子目录创建
			// 上传文件 
			$info   =   $upload->upload();
			if(!$info) {// 上传错误提示错误信息
				$this->error($upload->getError());
			}else{// 上传成功
				//$this->success('上传成功！');
				//遍历上传后的图片并执行图片缩放
				$image = new \Think\Image(); 
				foreach($info as $file){
					
				   // echo $file['savepath'].$file['savename']."<br/>";
					$image->open('./Public/Admin/Uploads/'.$file['savename']);
					// 按照原图的比例生成一个最大为200*200的缩略图另存为带s_前缀的图片
					$image->thumb(200, 200)->save('./Public/Admin/Uploads/s_'.$file['savename']);
					
				}
				 
				$f = $mod->find($_GET['id']);
				$name = $f[pic];
				//var_dump($filename);
				if($name){
					unlink("./Public/Admin/Uploads/{$name}");
					unlink("./Public/Admin/Uploads/s_{$name}");
				}
				 
				$_POST["pic"] = $file['savename'];
				$mod->create();
				$p = $mod->save();
			}
		}
		if($_POST["link"]){
			$mod->create();
			$l = $mod->save();
		}
		if($d>0 || $p >0 ||$l >0){
			$this->index();
		}else{
			$this->error("修改失败！","index",3);
		}
	}
	
	//执行删除
	public function del($id=0){
		$mod = M("Slide");
		if(!empty($_GET['id'])){
			$m = $mod->delete($_GET['id']);
			$data = array();
			if($m>0){
				$data["b"] = true;
				$this->ajaxReturn($data,"json");
			}else{
				$data["b"] = false;
				$this->ajaxReturn(null,"json");
			}
			$file = $mod->find($_GET['id']);
			$pic = $file[pic];
			//var_dump($filename);
			if($pic){
				unlink("./Public/Admin/Uploads/{$pic}");
				unlink("./Public/Admin/Uploads/s_{$pic}");
			}
		}
	}
	
	//修改图片状态
	//启用
	public function updateState($id=0){
		$mod = M("Slide");
		$map = array();
		$data = array();
		$map["state"] = array("EQ",1);
		$num = $mod->where($map)->count();
		if($num>=5){
			$data["b"] = false;
			$data["info"] = "显示的轮播图数量最大为5，已达到上限，若确定要启用该图片，请先禁用一些图片！";
		}else{
			$mod->state = 1;
			$m = $mod->where("id={$id}")->save();
			if($m>0){
				$data["b"] = true;
				$data["state"] = 1;
				
			}else{
				$data["b"] = false;
				$data["info"] = "启用失败！";
			}
		}
		$this->ajaxReturn($data,"json");
	}
	
	//禁用
	public function updateState1($id=0){
		$mod = M("Slide");
		$map = array();
		$data = array();
		$map["state"] = array("EQ",1);
		$num = $mod->where($map)->count();
		if($num<=1){
			$data["b"] = false;
			$data["info"] = "显示的轮播图数量最小为1！";
		}else{
			$mod->state = 0;
			$m = $mod->where("id={$id}")->save();
			if($m>0){
				$data["b"] = true;
				$data["state"] = 0;
				
			}else{
				$data["b"] = false;
				$data["info"] = "禁用失败！";
			}
		}
		$this->ajaxReturn($data,"json");
	}
}