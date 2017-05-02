<?php
//自定义的Model类实现数据的操作
namespace Admin\Model;
use Think\Model;
class DeliveryModel extends Model {
	//自动完成
	protected $_auto = array(
		array('addtime','time',1,'function'), // 对addtime字段在新增的时候写入当前时间戳
		array('status','2'),  // 新增的时候把state字段设置为2
	);
}