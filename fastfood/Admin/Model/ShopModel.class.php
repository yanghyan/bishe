<?php
//自定义的Model类实现数据的操作
namespace Admin\Model;
use Think\Model\RelationModel;
class ShopModel extends RelationModel {
    //字段验证
    protected $_validate = array();
	
	//自动完成
	protected $_auto = array(
		array('addtime','time',1,'function'), // 对addtime字段在更新的时候写入当前时间戳
		array('state','1'),  // 新增的时候把state字段设置为1
	);
}