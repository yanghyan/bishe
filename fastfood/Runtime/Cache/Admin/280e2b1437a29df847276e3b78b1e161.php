<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>美食美客</title>
    <!-- 告诉浏览器响应屏幕宽度 -->
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="/bishe/CLY/Public/Admin/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
    <!-- FontAwesome 4.3.0 -->
    <!--<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />-->
    <link href="/bishe/CLY/Public/Admin/bootstrap/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <!--<link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />-->   
    <link href="/bishe/CLY/Public/Admin/bootstrap/css/ionicons.min.css" rel="stylesheet" type="text/css" />    
    <!-- Theme style -->
    <link href="/bishe/CLY/Public/Admin/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="/bishe/CLY/Public/Admin/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="/bishe/CLY/Public/Admin/plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="/bishe/CLY/Public/Admin/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="/bishe/CLY/Public/Admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="/bishe/CLY/Public/Admin/plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="/bishe/CLY/Public/Admin/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <link href="/bishe/CLY/Public/Admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />

  <!--日历插件的CSS-->
  <link rel="stylesheet" href="/bishe/CLY/Public/Admin/layui/css/layui.css"  media="all">
	<!--日历插件的CSS-->
	<link rel="stylesheet" href="/bishe/CLY/Public/Admin/layui/css/layui.css"  media="all">

    <!-- self -->
    <!-- <script src="/bishe/CLY/Public/Admin/js/jquery.min.js"></script> -->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="bootstrap/js/html5shiv.min.js"></script>
        <script src="bootstrap/js/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="skin-blue sidebar-mini">
    <div class="wrapper">
      
      <header class="main-header">
        <!-- Logo -->
        <a href="index2.html" class="logo">
          <!-- 对于侧边栏迷你50x50像素迷你标志 -->
          <span class="logo-mini"><b>A</b>LT</span>
          <!-- 正常状态和移动设备标识 -->
          <span class="logo-lg">网站后台管理</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">切换导航</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              <li class="dropdown messages-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-envelope-o"></i>
                  <span class="label label-success">4</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">你有4条短信</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li><!-- start message -->
                        <a href="#">
                          <div class="pull-left">
                            <img src="/bishe/CLY/Public/Admin/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
                          </div>
                          <h4>
                            支持团队
                            <small><i class="fa fa-clock-o"></i> 5分钟</small>
                          </h4>
                          <p>为什么不买一个新的令人敬畏的主题？</p>
                        </a>
                      </li><!-- end message -->
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <img src="/bishe/CLY/Public/Admin/dist/img/user3-128x128.jpg" class="img-circle" alt="user image"/>
                          </div>
                          <h4>
                            AdminLTE 设计团队
                            <small><i class="fa fa-clock-o"></i> 2小时</small>
                          </h4>
                          <p>为什么不买一个新的令人敬畏的主题？</p>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <img src="/bishe/CLY/Public/Admin/dist/img/user4-128x128.jpg" class="img-circle" alt="user image"/>
                          </div>
                          <h4>
                            开发商
                            <small><i class="fa fa-clock-o"></i> 今天</small>
                          </h4>
                          <p>为什么不买一个新的令人敬畏的主题？</p>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <img src="/bishe/CLY/Public/Admin/dist/img/user3-128x128.jpg" class="img-circle" alt="user image"/>
                          </div>
                          <h4>
                            卖场部
                            <small><i class="fa fa-clock-o"></i> 昨天</small>
                          </h4>
                          <p>为什么不买一个新的令人敬畏的主题？</p>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <img src="/bishe/CLY/Public/Admin/dist/img/user4-128x128.jpg" class="img-circle" alt="user image"/>
                          </div>
                          <h4>
                            审稿人
                            <small><i class="fa fa-clock-o"></i>2天</small>
                          </h4>
                          <p>为什么不买一个新的令人敬畏的主题？</p>
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="footer"><a href="#">看到所有的消息</a></li>
                </ul>
              </li>
              
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="/bishe/CLY/Public/Admin/dist/img/user2-160x160.jpg" class="user-image" alt="User Image"/>
                  <span class="hidden-xs"><?php echo ($_SESSION['adminuser']['name']); ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="/bishe/CLY/Public/Admin/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
                    <p>
                     美食美客后台管理
                      <small>会员于2017-03</small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <li class="user-body">
                    <div class="col-xs-4 text-center">
                      <a href="#">追随者</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">销售</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">朋友</a>
                    </div>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">简介</a>
                    </div>
                    <div class="pull-right">
                      <a href="/bishe/CLY/index.php/Admin/Public/doLogout" class="btn btn-default btn-flat">退出</a>
                    </div>
                  </li>
                </ul>
              </li>
              
            </ul>
          </div>
        </nav>
      </header>
      
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="/bishe/CLY/Public/Admin/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p><?php echo ($_SESSION['adminuser']['name']); ?></p>

              <a href="#"><i class="fa fa-circle text-success"></i> 在线</a>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">主导航</li>
            <li class="active treeview">
              <a href="#">
                <i class="fa fa-user"></i> <span>会员管理</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="active"><a href="/bishe/CLY/index.php/Admin/Users/add"><i class="fa fa-circle-o"></i> 添加会员信息</a></li>
                <li><a href="/bishe/CLY/index.php/Admin/Users/index"><i class="fa fa-circle-o"></i> 浏览会员信息</a></li>
              </ul>
            </li>

            <li class="active treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>配送员管理</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="/bishe/CLY/index.php/Admin/Delivery/add"><i class="fa fa-circle-o"></i> 添加配送员信息</a></li>
                <li><a href="/bishe/CLY/index.php/Admin/Delivery/index"><i class="fa fa-circle-o"></i> 浏览配送员信息</a></li>
              </ul>
            </li>
            <li class="active treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>店铺管理</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li ><a href="/bishe/CLY/index.php/Admin/Shop/add"><i class="fa fa-circle-o"></i> 添加店铺信息</a></li>
                <li><a href="/bishe/CLY/index.php/Admin/Shop/index"><i class="fa fa-circle-o"></i> 浏览店铺信息</a></li>
              </ul>
            </li>
            <li><a href="/bishe/CLY/index.php/Admin/Addr/index"><i class="fa fa-circle-o text-blue"></i> <span>地址管理</span></a></li>
            

            <li><a href="/bishe/CLY/index.php/Admin/Kind/index"><i class="fa  fa-pencil-square text-blue"></i><span>类别管理</span></a></li>
            <li><a href="/bishe/CLY/index.php/Admin/Collect/index"><i class="fa fa-heart text-red"></i><span>收藏管理</span></a></li>
			<li class="active treeview">
              <a href="/bishe/CLY/index.php/Admin/Slide/index">
                <i class="fa fa-image text-yellow"></i> <span>轮播图管理</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="active"><a href="/bishe/CLY/index.php/Admin/Slide/add"><i class="fa fa-file-image-o text-orange"></i> 添加轮播图信息</a></li>
                <li><a href="/bishe/CLY/index.php/Admin/Slide/index"><i class="fa  fa-eye text-blue"></i> 浏览轮播图信息</a></li>
              </ul>
            </li>
			<li><a href="/bishe/CLY/index.php/Admin/Tag/index"><i class="fa fa-tag text-red"></i><span>标签管理</span></a></li>
            <li class="treeview">
              <a href="/bishe/CLY/index.php/Admin/Menu/index">
                <i class="fa fa-edit text-green"></i>
                <span>菜单管理</span>
              </a>
            </li>
            <li class="treeview">
              <a href="/bishe/CLY/index.php/Admin/Indent/index">
                <i class="fa fa-book text-yellow"></i>
                <span>订单管理</span>
              </a>
            </li>
            <li class="treeview">
              <a href="/bishe/CLY/index.php/Admin/Comment/index">
                <i class="fa fa-comments text-blue"></i>
                  <span>评论管理</span>
              </a>
            </li>
            <li class="treeview">
              <a href="/bishe/CLY/index.php/Admin/Cart/index">
                <i class="fa fa-shopping-cart text-red"></i>
                  <span>购物车</span>
              </a>
            </li>
             <li class="treeview">
                <a href="/bishe/CLY/index.php/Admin/Link/index">
                <i class="fa fa-shopping-cart text-aqua"></i>
                <span>友情链接</span>
                </a>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-folder"></i> <span>实例</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="pages/examples/invoice.html"><i class="fa fa-circle-o"></i> 发票联</a></li>
                <li><a href="pages/examples/login.html"><i class="fa fa-circle-o"></i> 登录</a></li>
                <li><a href="pages/examples/register.html"><i class="fa fa-circle-o"></i> 注册Register</a></li>
                <li><a href="pages/examples/lockscreen.html"><i class="fa fa-circle-o"></i> 锁屏</a></li>
                <li><a href="pages/examples/404.html"><i class="fa fa-circle-o"></i> 404 Error</a></li>
                <li><a href="pages/examples/500.html"><i class="fa fa-circle-o"></i> 500 Error</a></li>
                <li><a href="pages/examples/blank.html"><i class="fa fa-circle-o"></i> 空白页</a></li>
              </ul>
            </li>
            
      
            <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>重要</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>警告</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>问询处</span></a></li>
            
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        
    <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <i class="fa fa-calendar"></i>
			       会员管理
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
            <li><a href="#">会员管理</a></li>
            <li class="active">编辑会员信息</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- right column -->
            <div class="col-md-12">
              <!-- Horizontal Form -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title"><i class="fa fa-plus"></i> 编辑会员信息</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" action="/bishe/CLY/index.php/Admin/Users/update" method="post" onsubmit="return doSubmit()" enctype="multipart/form-data">
                  <input type="hidden" value="<?php echo ($user["id"]); ?>" name="id">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">用户名</label><span style="font-size:12px;color:#fc0;" id="user"></span>
                      <div class="col-sm-4">
                        <input type="input" class="form-control" name="username" placeholder="UserName" onblur="checkUserName()" onfocus="checkUser()" value="<?php echo ($user["username"]); ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">昵称</label><span style="font-size:12px;color:#fc0;" id="name" ></span>
                      <div class="col-sm-4">
                        <input type="input" class="form-control" name="name" placeholder="UserName" value="<?php echo ($user["name"]); ?>"  onfocus="checkFName()" onblur="checkName()">
                      </div>
                    </div>
                     <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">性别</label><span style="font-size:12px;color:#fc0;" id="sex"></span>
                      <div class="col-sm-4">
                        <input type="radio" name="sex"  value="1" <?php if(($user["sex"]) == "1"): ?>checked<?php endif; ?>>男
                        <input type="radio" name="sex"  value="0" <?php if(($user["sex"]) == "0"): ?>checked<?php endif; ?>>女
                        <input type="radio" name="sex"  value="" <?php if(($user["sex"]) == ""): ?>checked<?php endif; ?>>未知
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">电话</label><span style="font-size:12px;color:#fc0;" id="phone"></span>
                      <div class="col-sm-4">
                        <input type="input" class="form-control" name="phone" placeholder="Phone" value="<?php echo ($user["phone"]); ?>"  onfocus="checkFPhone()" onblur="checkPhone()">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">邮箱</label><span style="font-size:12px;color:#fc0;" id="email"></span>
                      <div class="col-sm-4">
                        <input type="email" class="form-control" name="email" placeholder="Email" onblur="checkEmail()" onfocus="checkEm()" value="<?php echo ($user["email"]); ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">身份</label><span style="font-size:12px;color:#fc0;" id="user"></span>
                      <div class="col-sm-4">
                        <input type="radio" name="state"  value="1" onclick="pu()"<?php if(($user["state"]) == "1"): ?>checked<?php endif; ?>>管理员                       
                        <input type="radio" name="state"  value="2" onclick="pu()" <?php if(($user["state"]) == "2"): ?>checked<?php endif; ?>>普通用户
                        <input type="radio" name="state"  value="3" <?php if(($user["state"]) == "3"): ?>checked<?php endif; ?> onclick="shop(<?php echo ($user["state"]); ?>)">商户
                        <input type="radio" name="state"  value="4" <?php if(($user["state"]) == "4"): ?>checked<?php endif; ?> onclick="peisong(<?php echo ($user["state"]); ?>)">配送员
                         <input type="radio" name="state"  value="0" onclick="pu()" <?php if(($user["state"]) == "0"): ?>checked<?php endif; ?>>禁用
                      </div>
                    </div>
					         <!-- 配送员详细信息 -->
                    <div id="peisong" style="display:none">
                        <div class="form-group">
                          <input type="hidden" name="uid" value="<?php echo ($user["id"]); ?>">
                          <label for="inputEmail3" class="col-sm-2 control-label">管辖区域</label><span style="font-size:12px;color:#fc0;" id="area"></span>
                          <div class="col-sm-4">
                             <select class="form-control" name="area">
                                <option value="0">--请选择辖区--</option>
                                <option value="1">小店区</option>
                                <option value="2">迎泽区</option>
                                <option value="3">杏花岭区</option>
                                <option value="4">尖草坪区</option>
                                <option value="5">万柏林区</option>
                                <option value="6">晋源区</option>
                              </select>
                          </div>
                        </div>
                    </div>
                    <!-- 商铺详细信息 -->
                    <div id="shop" style="display:none">
                         <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">店铺名</label><span style="font-size:12px;color:#fc0;" id="shopname"></span>
                            <div class="col-sm-4">
                              <input type="input" class="form-control" name="shopname" placeholder="ShopName" onblur="checkShopName()" onfocus="checkShop()">
                            </div>
                          </div>
                          <div class="form-group">
                             <label for="inputEmail3" class="col-sm-2 control-label" for="address">位置</label><span style="font-size:12px;color:#fc0;" id="address"></span>
                            <div class="col-sm-4">
                              <select class="form-control" name="address">
                                <option value="">--请选择区域--</option>
                                <option value="1">小店区</option>
                                <option value="2">迎泽区</option>
                                <option value="3">杏花岭区</option>
                                <option value="4">尖草坪区</option>
                                <option value="5">万柏林区</option>
                                <option value="6">晋源区</option>                   
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">详细地址</label><span style="font-size:12px;color:#fc0;" id="detail_add"></span>
                            <div class="col-sm-4">
                              <input type="input" class="form-control" name="detail_add" placeholder="DetailAddress" value="<?php echo ($addr["detail_add"]); ?>"  onfocus="checkFDtail()" onblur="checkDtail()">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">经营范围</label><span style="font-size:12px;color:#fc0;" id="kind"></span>
                            <div class="col-sm-4">
                              <select class="form-control" name="kind">
                                <option value="">--请选择类别--</option>
                                <?php if(is_array($kind)): foreach($kind as $key=>$vo): ?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["classname"]); ?></option><?php endforeach; endif; ?>               
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">商户类型</label><span style="font-size:12px;color:#fc0;" id="shoptype"></span>
                            <div class="col-sm-4">
                              <input type="radio" name="shoptype"  value="1" checked>个体商户
                              <input type="radio" name="shoptype"  value="0" >企业商户
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">图片信息</label><span style="font-size:12px;color:#fc0;" id="sex"></span>
                            <div class="col-sm-2">
                              1.店铺门脸图                              
                            </div>
                            <div class="col-sm-2">
                              2.店内环境图
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label"></label><span style="font-size:12px;color:#fc0;" id="tupian"></span>
                            <div class="col-sm-2">
                              <div id="previewDoor">
                                <img id="imgheadDoor" border="0" src="/bishe/CLY/Public/images/photo_icon.png" width="90" height="90" onclick="$('#previewImgDoor').click();">
                             </div>         
                              <input type="file" onchange="previewImage(this,'Door')" style="display: none;" id="previewImgDoor" name="door_pic">
                            </div>
                            <div class="col-sm-2">
                              <div id="previewEnv">
                                <img id="imgheadEnv" border="0" src="/bishe/CLY/Public/images/photo_icon.png" width="90" height="90" onclick="$('#previewImgEnv').click();">
                             </div>         
                              <input type="file" onchange="previewImage(this,'Env')" style="display: none;" id="previewImgEnv" name="env_pic">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">资质信息</label><span style="font-size:12px;color:#fc0;" id="info"></span>
                            <div class="col-sm-4">
                              <input type="radio" name="info"  value="0" checked>营业执照
                              <input type="radio" name="info"  value="1" >餐饮服务许可证
                              <input type="radio" name="info"  value="2" >其他资质
                              <input type="radio" name="info"  value="3" >无资质
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label"></label><span style="font-size:12px;color:#fc0;" id="info"></span>
                            <div class="col-sm-4">
                              <div id="previewInfo">
                                <img id="imgheadInfo" border="0" src="/bishe/CLY/Public/images/photo_icon.png" width="90" height="90" onclick="$('#previewImgInfo').click();">
                             </div>         
                              <input type="file" onchange="previewImage(this,'Info')" style="display: none;" id="previewImgInfo" name="info_pic">
                            </div>                           
                          </div>

                    </div>
                  </div><!-- /.box-body -->
                  <div class="box-footer">
          				    <div class="col-sm-offset-2 col-sm-1">
          						    <button type="submit" class="btn btn-primary">修改</button>
                      </div>
          					  <div class="col-sm-1">
          						    <button type="submit" class="btn btn-primary">重置</button>
          					  </div>
                  </div><!-- /.box-footer -->
                </form>
				        <div class="row"><div class="col-sm-12">&nbsp;</div></div>
              </div><!-- /.box -->
       
            </div><!--/.col (right) -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->

      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>版本</b> 2.0
        </div>
        <strong>Copyright &copy; 2014-2017 <a href="http://almsaeedstudio.com">Almsaeed 工作室</a>.</strong> 保留所有权利.
      </footer>
      
      
    </div><!-- ./wrapper -->
  
  <!-- system modal start -->
    <div id="xdl-alert" class="modal">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
            <h5 class="modal-title"><i class="fa fa-exclamation-circle"></i> [Title]</h5>
          </div>
          <div class="modal-body small">
            <p>[Message]</p>
          </div>
          <div class="modal-footer" >
            <button type="button" class="btn btn-primary ok" data-dismiss="modal">[BtnOk]</button>
            <button type="button" class="btn btn-default cancel" data-dismiss="modal">[BtnCancel]</button>
          </div>
        </div>
      </div>
    </div>

    <!-- jQuery 2.1.4 -->
    <script src="/bishe/CLY/Public/Admin/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="/bishe/CLY/Public/Admin/bootstrap/js/jquery-ui.min.js" type="text/javascript"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="/bishe/CLY/Public/Admin/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>    
    <!-- Morris.js charts -->
    <script src="/bishe/CLY/Public/Admin/bootstrap/js/raphael-min.js"></script>

  <!--图片上传-->
    <!-- <script src="/bishe/CLY/Public/Admin/bootstrap/js/jquery_1.10.2_jquery.min.js"></script> -->
    <script src="/bishe/CLY/Public/Admin/plugins/morris/morris.min.js" type="text/javascript"></script>
    <!-- Sparkline -->
    <script src="/bishe/CLY/Public/Admin/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <!-- jvectormap -->
    <script src="/bishe/CLY/Public/Admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
    <script src="/bishe/CLY/Public/Admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
    <!-- jQuery Knob Chart -->
    <script src="/bishe/CLY/Public/Admin/plugins/knob/jquery.knob.js" type="text/javascript"></script>
    <!-- daterangepicker -->
    <script src="/bishe/CLY/Public/Admin/bootstrap/js/moment.min.js" type="text/javascript"></script>
    <script src="/bishe/CLY/Public/Admin/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <!-- datepicker -->
    <script src="/bishe/CLY/Public/Admin/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="/bishe/CLY/Public/Admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
    <!-- Slimscroll -->
    <script src="/bishe/CLY/Public/Admin/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='/bishe/CLY/Public/Admin/plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="/bishe/CLY/Public/Admin/dist/js/app.min.js" type="text/javascript"></script>    
    <!--日历插件-->
    <script src="/bishe/CLY/Public/Admin/layui/layui.js" charset="utf-8"></script>   
    
    <!-- AdminLTE 用于演示目的 -->
    <script src="/bishe/CLY/Public/Admin/dist/js/demo.js" type="text/javascript"></script>
  
   <script type="text/javascript">
        $(function(){
        
          window.Modal = function (){
            var reg = new RegExp("\\[([^\\[\\]]*?)\\]", 'igm');
            var alr = $("#xdl-alert");
            var ahtml = alr.html();

            //关闭时恢复 modal html 原样，供下次调用时 replace 用
            //var _init = function () {
            //  alr.on("hidden.bs.modal", function (e) {
            //    $(this).html(ahtml);
            //  });
            //}();

            /* html 复原不在 _init() 里面做了，重复调用时会有问题，直接在 _alert/_confirm 里面做 */


            var _alert = function (options) {
              alr.html(ahtml);  // 复原
              alr.find('.ok').removeClass('btn-success').addClass('btn-primary');
              alr.find('.cancel').hide();
              _dialog(options);

              return{
                on: function (callback){
                  if(callback && callback instanceof Function) {
                    alr.find('.ok').click(function () { callback(true) });
                  }
                }
              };
            };

            var _confirm = function (options){
              alr.html(ahtml); // 复原
              alr.find('.ok').removeClass('btn-primary').addClass('btn-success');
              alr.find('.cancel').show();
              _dialog(options);

              return {
                on: function (callback) {
                  if (callback && callback instanceof Function) {
                    alr.find('.ok').click(function () { callback(true) });
                    alr.find('.cancel').click(function () { callback(false) });
                  }
                }
              };
            };

            var _dialog = function (options) {
              var ops = {
                msg: "提示内容",
                title: "操作提示",
                btnok: "确定",
                btncl: "取消"
              };

              $.extend(ops, options);

              console.log(alr);

              var html = alr.html().replace(reg, function (node, key) {
                return {
                  Title: ops.title,
                  Message: ops.msg,
                  BtnOk: ops.btnok,
                  BtnCancel: ops.btncl
                }[key];
              });
              
              alr.html(html);
              alr.modal({
                width: 500,
                backdrop: 'static'
              });
            }

            return {
              alert: _alert,
              confirm: _confirm
            }

          }();
          
          //Modal.alert({msg:'内容2',title:'标题2',btnok:'确定2',btncl:'取消2'});
        });
    </script>
  
  
      <script type="text/javascript">
          //表单提交限制
          function doSubmit() {
            return checkUserName()&&checkEmail()&&checkPhone();
          }
          //检测用户名
          function checkUser() {
            var user = $("input[name='username']").val();
            $("#user").html("账号由5-12位字母、数字或下划线组成");
            $("#user").css("color","#fc0");
          }          
          function checkUserName() {
            var user = $("input[name='username']").val();
            if(user.match(/^[a-zA-Z0-9_]{5,12}$/)==null){
                 $("#user").html("请输入正确的账户格式");
                 $("#user").css("color","red");
                return false;
            }else if(user.match(/(^\_)|(\__)|(\_+$)/)){
                $("#user").html("用户名首尾不能出现下划线\'_\'");
                $("#user").css("color","red");
                return false;
            }else if(user.match(/^\d+\d+\d$/)){
                 $("#user").html("用户名不能全为数字");
                 $("#user").css("color","red");
                return false;
            }else{
                 $("#user").html("");
                 $("#user").css("color","#fc0");
                 return true;
            }

          }
          //检测邮箱
          function checkEm() {
            var email = $("input[name='email']").val();
            $("#email").html("邮箱格式为：xxx@xx.xx");
            $("#email").css("color","#fc0");
          }
          function checkEmail() {
            var email = $("input[name='email']").val();
            if(email.match(/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/)==null){
                 $("#email").html("请输入正确的邮箱");
                 $("#email").css("color","red");
                return false;
            }else{
                 $("#email").html("");
                 $("#email").css("color","#fc0");
                 return true;
            }
          }

          //检测name
          function checkFName() {
              $("#name").html("请填写昵称");
              $("#name").css("color","#fc0");
          }
          function checkName() {
              $("#name").html("");
          }
          //检测地址
          function checkFAddr(){
            $("#address").html("请填写您的所在地名称");
            $("#address").css("color","#fc0");
          }
          function checkAddr(){
            $("#address").html("");
            $("#address").css("color","#fc0");
          }
          //检测手机
          function checkFPhone(){
              $("#phone").html("请正确填写电话");
              $("#phone").css("color","#fc0");
          }
          function checkPhone(){
              var phone = $("input[name='phone']").val();
              if (phone) {
                if (phone.match(/^1[34578]\d{9}$/)==null) {
                  $("#phone").html("格式不正确呢");
                  $("#phone").css("color","red");
                  return false;
                }else{
                  $("#phone").html("");
                  $("#phone").css("color","#fc0");
                  return true;
                }
              }else{
                $("#phone").html("");
                return true;
              }
          }

          //选择了配送员
          function peisong(state){
              $("#shop").css("display","none");
              if (state!=4) {
                $("#peisong").css("display","block");
              }
          }
          //选择了商户
          function shop(state){
              $("#peisong").css("display","none");
              if (state!=3) {
                $("#shop").css("display","block");
              }
          }
          //选择
          function pu(){
            $("#peisong").css("display","none");
            $("#shop").css("display","none");
          }

      //图片上传预览    IE是用了滤镜。
        function previewImage(file,name)
        {
          var MAXWIDTH  = 90; 
          var MAXHEIGHT = 90;
          var div = document.getElementById('preview'+name);
          if (file.files && file.files[0])
          {
              div.innerHTML ='<img id=imghead'+name+' onclick=$("#previewImg'+name+'").click()>';
              var img = document.getElementById('imghead'+name);
              img.onload = function(){
                var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
                img.width  =  rect.width;
                img.height =  rect.height;
//                 img.style.marginLeft = rect.left+'px';
                img.style.marginTop = rect.top+'px';
              }
              var reader = new FileReader();
              reader.onload = function(evt){img.src = evt.target.result;}
              reader.readAsDataURL(file.files[0]);
          }
          else //兼容IE
          {
            var sFilter='filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale,src="';
            file.select();
            var src = document.selection.createRange().text;
            div.innerHTML = '<img id=imghead>';
            var img = document.getElementById('imghead'+name);
            img.filters.item('DXImageTransform.Microsoft.AlphaImageLoader').src = src;
            var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
            status =('rect:'+rect.top+','+rect.left+','+rect.width+','+rect.height);
            div.innerHTML = "<div id=divhead style='width:"+rect.width+"px;height:"+rect.height+"px;margin-top:"+rect.top+"px;"+sFilter+src+"\"'></div>";
          }
        }
        function clacImgZoomParam( maxWidth, maxHeight, width, height ){
            var param = {top:0, left:0, width:width, height:height};
            if( width>maxWidth || height>maxHeight ){
                rateWidth = width / maxWidth;
                rateHeight = height / maxHeight;
                
                if( rateWidth > rateHeight ){
                    param.width =  maxWidth;
                    param.height = Math.round(height / rateWidth);
                }else{
                    param.width = Math.round(width / rateHeight);
                    param.height = maxHeight;
                }
            }
            param.left = Math.round((maxWidth - param.width) / 2);
            param.top = Math.round((maxHeight - param.height) / 2);
            return param;
        }
      </script>
  

  </body>
</html>