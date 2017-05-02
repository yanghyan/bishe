<?php
//配送员管理
namespace Home\Controller;
class DeliveryController extends CommonController {
    //遍历所处理过的订单（分页，搜索：按时间、订单号和状态搜）
	public function index(){
		$mod = M("users");
		$mod1 = M("indent");
		$mod2 = M("delivery");
		$mod3 = M("shop");
		$mod4 = M("menu");
		$map = array();
		$map["state"] = array('neq',"1");
		$map["visable"] = array('eq',"1");
		$ilist = $mod1->where($map)->select();
		//var_dump($ilist);
		
		//取到当前用户,配送员
		//session("homeuser","xiaoliu456");
		$se = session("homeuser");
		//$list = $mod->where("username = '".$se."'")->select();
		//var_dump($se);
		//$deid = $list[0]["id"];
		$deid = $se["id"];
		
		$d = $mod2->where("uid = '".$deid."'")->select();
		
		//配送员的area字段
		$darea = $d[0]["area"];
		//var_dump($darea);
		
		foreach($ilist as $k=>$v){
			$saddr = $mod3->find($v["sid"]);
			//var_dump($saddr["address"]);
			
			$ilist[$k]["address"] = $saddr["address"];
			
			$usid = $mod->find($v["uid"]);
			$shid = $mod3->find($v["sid"]);
			$meid = $mod4->find($v["mid"]);
			
			$ilist[$k]["username"] = $usid["username"];
			$ilist[$k]["shopname"] = $shid["shopname"];
			$ilist[$k]["menu"] = $meid["menu"];
		}
		$same = array();
		foreach($ilist as $k=>$v){
			if($ilist[$k]["address"] == $darea){
				$same[] = $ilist[$k];
			}
		}
		//var_dump($same);
		$this->assign("same",$same);
		$this->display("Delivery/deliInfo");
    }
	
	//接单
	public function accept(){
		$mod = M("users");
		$mod1 = M("indent");
		$mod2 = M("delivery");
		$mod3 = M("shop");
		$mod4 = M("menu");
		$ilist = $mod1->where("state = 1")->select();
		//var_dump($list);
		
		//取到当前用户,配送员
		//session("homeuser","xiaoliu456");
		$se = session("homeuser");
		//$list = $mod->where("username = '".$se."'")->select();
		//var_dump($list);
		//$deid = $list[0]["id"];
		$deid = $se["id"];
		
		$d = $mod2->where("uid = '".$deid."'")->select();
		
		//配送员的area字段
		$darea = $d[0]["area"];
		//var_dump($darea);
		
		foreach($ilist as $k=>$v){
			$saddr = $mod3->find($v["sid"]);
			//var_dump($saddr["address"]);
			
			$ilist[$k]["address"] = $saddr["address"];
			
			$usid = $mod->find($v["uid"]);
			$shid = $mod3->find($v["sid"]);
			$meid = $mod4->find($v["mid"]);
			
			$ilist[$k]["username"] = $usid["username"];
			$ilist[$k]["shopname"] = $shid["shopname"];
			$ilist[$k]["menu"] = $meid["menu"];
		}
		$same = array();
		foreach($ilist as $k=>$v){
			if($ilist[$k]["address"] == $darea){
				$same[] = $ilist[$k];
			}
			
		}
		//var_dump($same);
		$this->assign("same",$same);
		$this->display("Delivery/waitInfo");
	}
	
	//执行接单
	public function doAccept(){
		$mod = M("indent");
		$ind = $_GET["id"];
		
		$data['state'] = '3';
		$mod->where("id = '".$ind."'")->save($data); // 根据条件保存修改的数据
		$this->redirect("Delivery/index");
		//$this->success('接单完成','Delivery/index');
	}
	
	//送达
	public function served(){
		$mod = M("indent");
		$ind = $_GET["id"];
		
		$data['state'] = '4';
		$data['end_time'] = time();
		$m = $mod->where("id = '".$ind."'")->save($data); // 根据条件保存修改的数据
		$data = array();
        if($m>0){
            $data['b'] = true;
        }else{
            $data['b']= false;
        }
        $this->ajaxReturn($data);
		//$this->redirect("Delivery/index");
	}
	
	//删除订单（只能删自己看到的，不能删订单库里的）
	public function delOrder(){
		//实例化model类
		$mod = M("indent");
		$ind = $_GET["id"];
		$data['visable'] = "0";
		$m = $mod->where("id = '".$ind."'")->save($data); // 根据条件保存修改的数据
		$data = array();
        if($m>0){
            $data['b'] = true;
        }else{
            $data['b']= false;
        }
        $this->ajaxReturn($data);
	}
}