<?php
//自定义的Model类实现数据的操作
namespace Admin\Model;
use Think\Model\RelationModel;
class UsersModel extends RelationModel {
    //字段验证
    protected $_validate = array(
		array('username','require','用户名必须填写！'), //默认情况下用正则进行验证
		array('username','','用户名信息已经存在！',0,'unique',1), // 在新增的时候验证username字段是否唯一
		array('pass','/^[a-zA-Z0-9_]{6,18}$/','密码必须为字母、数字和下划线组成，且长度为6-18位！'), //默认情况下用正则进行验证
	);
	
	//自动完成
	protected $_auto = array(
		array('addtime','time',1,'function'), // 对addtime字段在更新的时候写入当前时间戳
		array('pass','md5',3,'function') , // 对pass字段在新增和编辑的时候使md5函数处理
		array('state','2'),  // 新增的时候把state字段设置为2
	);
	
}