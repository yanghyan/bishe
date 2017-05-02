<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="//www.nuomi.com/static/common/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta name="renderer" content="webkit">
	
	<title>百度糯米</title>
	
	<link rel="stylesheet" type="text/css" href="/bishe/CLY/Public/css/global_20a287f.css"/>
	<link rel="stylesheet" type="text/css" href="/bishe/CLY/Public/css/common_a6bd374.css"/>
	<link rel="stylesheet" type="text/css" href="/bishe/CLY/Public/css/header_18a1d26.css"/>
	<link rel="stylesheet" type="text/css" href="/bishe/CLY/Public/css/user_93e8dac.css"/>
	<link rel="stylesheet" href="/bishe/CLY/Public/Admin/layui/css/layui.css"  media="all">
	<!--<script src="/bishe/CLY/Public/Admin/js/jquery-1.10.2.js"></script>-->
</head>

<body mon="page=order_list" class="gl-normal-screen">
	

	<ul id="j-go-top" class="nav n-go-top" mon="area=right_anchor">
		<li>
			<a href="#" mon="element=gotop&position=0" class="item with-top-border go-top-2">
				<span class="gotop-ico inner-ico">
					<i class="iconfont">&#xe62d;</i>
				</span>
				<span class="inner-text">回到顶部</span>
			</a>
		</li>
		<li>
			<div class="qrcode-side item">
				<i class="iconfont">&#xe63c;</i>
				<div class="qrcode-img">
					<a href="#" mon="element=erweima&position=1" target="_blank">
						<p class="img">二维码</p>
					</a>
				</div>
			</div>
		</li>
		<li>
			<a target="_blank" class="item" href="#">
				<span class="question-ico inner-ico">
					<i class="iconfont">&#xe62a;</i>
				</span>
				<span class="inner-text">问卷调查</span>
			</a>
		</li>
	</ul>

<div class="header-bar static-hook-real static-hook-id-1" mon="area=navigation" id="header-bar">
		<div class="header-inner clearfix flexible ">
			<ul class="left-city first-level">
				<li class="with-padding">所在区域：山西太原</li>
			
			</ul>
	
			<ul class="right-util first-level" id="j-ucLoginList">
				<li class="welcome-text">
					<span class="welcome-tag" id="j-welcomeTag"></span>
				</li>
				<!-- 判断是否有session -->
				
				<li class="login" <?php if(empty($_SESSION['homeuser']['username'])): ?>style="display:inline-block"<?php else: ?>style="display:none"<?php endif; ?> >
					<a href="/bishe/CLY/index.php/Home/Public/index" mon="element=login">登录</a>
					<span class="sep-lines"></span>
				</li>
				<li class="reg" <?php if(empty($_SESSION['homeuser']['username'])): ?>style="display:inline-block"<?php else: ?>style="display:none"<?php endif; ?> >
					<a href="/bishe/CLY/index.php/Home/Public/register" id="j-barRegBtn" mon="element=register">注册</a>
					<span class="sep-lines"></span>
				</li>
				<li class="reg" <?php if(empty($_SESSION['homeuser']['username'])): ?>style="display:none"<?php else: ?>style="display:inline-block"<?php endif; ?> >
					<a href="#" id="j-barRegBtn" mon="element=register">Hi，<?php echo ($_SESSION['homeuser']['username']); ?></a>
					<span class="sep-lines"></span>
				</li>
				<li class="login"  <?php if(empty($_SESSION['homeuser']['username'])): ?>style="display:none"<?php else: ?>style="display:inline-block"<?php endif; ?> >
					<a href="/bishe/CLY/index.php/Home/Public/doLogout" mon="element=login">退出</a>
					<span class="sep-lines"></span>
				</li>
				

				<li>
					<a href="/bishe/CLY/index.php/Home/User/showOrder" mon="element=my_order">我的订单</a>
					<span class="sep-lines"></span>
				</li>

				<li class="j-bar-dropdown">
					<a href="/bishe/CLY/index.php/Home/User/showOrder" id="my_meishi" mon="element=my_nuomi">我的美食<span class="arrow-down-logo"></span></a>
					<span class="sep-lines"></span>
					<div class="uc-list header-dropmenu">
						<a href="/bishe/CLY/index.php/Home/User/showOrder" class="link">我的订单</a>
						<a href="/bishe/CLY/index.php/Home/User/showCollect" class="link">我的收藏</a>
						<a href="/bishe/CLY/index.php/Home/User/mComment" class="link">我的评价</a>
						<a href="/bishe/CLY/index.php/Home/User/index" class="link">帐户设置</a>
					</div>
				</li>

				<li class="j-bar-dropdown" id="shop">
					<a href="#" ><span>我是商家</span><span class="arrow-down-logo"></span></a>
					<span class="sep-lines"></span>
					<div class="merchant-list header-dropmenu">
						<a href="/bishe/CLY/index.php/Home/Seller/index" class="link" target="_blank">商户中心</a>
						<a href="/bishe/CLY/index.php/Home/Public/sRegister" class="link" target="_blank">我想合作</a>
					</div>
				</li>
				<li class="j-bar-dropdown">
					<a href="/bishe/CLY/index.php/Home/Delivery/index" id="shop"><span>我是配送员</span><span class="arrow-down-logo"></span></a>
				</li>
				<li>
					<a href="#" mon="element=collection" id="addFav">收藏</a>
					<span class="sep-lines"></span>
				</li>
				<li class="j-bar-dropdown">
					<a href="#" id="interest">
						<span class="j-visitedArea-title">关注</span>
					</a>
					<div class="notice-drop">
						<span class="arrow-down-logo" style="margin-left:-80px;">
							<img src="/bishe/CLY/Public/images/weixin.jpg" width="100"/>
						</span>
						<div class="new-erweima"></div>
						<h4>美食美客：<span class="hot">   π先生</span></h4>
					</div>
				</li>
			</ul>
		</div>
	</div>

	
	<div class="search-bar clearfix flexible static-hook-real static-hook-id-2" mon="area=searchTop">
		<div class="logo-area">
			<a href="/bishe/CLY/index.php/Home/Index/index" class="logo" mon="element=logo" title="美食美客">
				<i class="new-logo"></i>
			</a>
		</div>
		<div class="search-area clearfix">
			<div data-ui-id="main-searcher" class="form-wrap clearfix">
				<form method="get" action="//www.nuomi.com/search" id="j-searchForm" >
					<input type="text" id="j-searchInput" class="searchinput" name="k" value="" data-placeholder=""placeholder="搜索商家或地点" autocomplete="off" mon="element=search_input"/>
					<div class="searchbtn-wrap">
						<input type="submit" class="searchbtn" id="j-searchBtn" value="" mon="element=search_button"/>
						<i class="iconfont"><img src="/bishe/CLY/Public/images/search-icon_40f1403.png"/></i>
					</div>
					<input type="hidden" id="j-input-hidden" name="rid" value="4176517b7a91194553c22ea6a81cbc11"/>
				</form>
			</div>
			<ul class="reco-list">
				<li>
					<a href="#" mon="element=hot_query&position=0">聚优惠餐饮</a>
				</li>
				<li>
					<a href="#" mon="element=hot_query&position=1">中正天街</a>
				</li>
				<li>
					<a href="#" mon="element=hot_query&position=2">生日蛋糕</a>
				</li>
			</ul>
		</div>
		<div class="utils clearfix">
			<a href="#" mon="element=just_retire" target="_blank">
				<div class="util-item refund">
					<i class="iconfont"><img src="/bishe/CLY/Public/images/tui_5097eac.png"/></i>
					<div class="util-tip">未消费，随便退！</div>
				</div>
				<div class="util-item mid">
					<i class="iconfont"><img src="/bishe/CLY/Public/images/pei_b814caf.png"/></i>
					<div class="util-tip">消费不满意先行赔付！</div>
				</div>
			</a>
		</div>
	</div>
	<div class="nav-bar-header nav-area-index static-hook-real static-hook-id-3" >
		<div class="nav-inner flexible clearfix">
			<ul class="nav-list clearfix" mon="area=nav&element_type=nav" id="j-catg">
				<li class="nav-item cate-row all-cate deep">
					<span class="item ">全部分类</span>
				</li>
			</ul>	
		</div>
	</div>

	<div class="uc p-order-list clearfix">
		
		<div class="uc-wrap">
			<div class="uc-side fl">
				<ul class="w-nav clearfix" id="j-uc-nav" mon="element_type=nav" alog-alias="bainuo-user-pagetab" alog-group="bainuo-user-pagetab">
					<li class="nav-active">
						<a class="nav-txt j-nav" href="/bishe/CLY/index.php/Home/User/showOrder">我的订单</a>
					</li>
					
					<li class="nav-active">
						<a class="nav-txt nav-link" href="/bishe/CLY/index.php/Home/User/showCollect">我的收藏</a>
					</li>
					<li class="nav-active last">
						<a class="nav-txt j-nav" href="javascript:;" onclick="doshow(1)">我的账户</a>
						<ul class="sub-nav" mon="area=subNav" id="u1">
							<li>
							<a href="/bishe/CLY/index.php/Home/User/index" class="">
								<span class="sub-nav-ico">&#149;</span>个人资料
							</a>
							</li>
							<li>
								<a href="/bishe/CLY/index.php/Home/User/showAddr" class="">
									<span class="sub-nav-ico">&#149;</span>收货地址
								</a>
							</li>
							
							
						</ul>
					</li>
					
					<li class="nav-active">
						<a class="nav-txt j-nav" href="javascript:;" onclick="doshow(2)">我的评价</a>
						<ul class="sub-nav" mon="area=subNav" id="u2">
							<li>
								<a href="/bishe/CLY/index.php/Home/User/waitComment" class="">
									<span class="sub-nav-ico">&#149;</span>待评价
								</a>
							</li>
							<li>
								<a href="/bishe/CLY/index.php/Home/User/comment" class="">
									<span class="sub-nav-ico">&#149;</span>已评价
								</a>
							</li>
						</ul>
					</li>
				</ul>
			</div>
			
			<div class="uc-main fr">
				<div class="w-list" id="J-orders-wrap">
					<ul class="w-status-tab clearfix" mon="area=filterStatus">
						<li class="current">
							<a href="javascript:;" class="first">个人资料</a>
						</li>
						
						<table border="0" style="width:670px; line-height:22px;" cellspacing="0" cellpadding="0">
						  <tr style="float:left;">
							<td width="100">
								<img src="/bishe/CLY/Public/Admin/Uploads/s_<?php echo ($li["user_pic"]); ?>" width="90" height="90">
							</td>
							<td width="200">
								<span>
									<font color="#FF318C" style="font-size:17px;"><?php echo ($li["username"]); ?></font><br>
									<a href="/bishe/CLY/index.php/Home/User/hPage/id/<?php echo ($li["id"]); ?>" id="" class="link">修改头像</a><br>
									<font color="#FF318C">注册时间：<?php echo (date("Y-m-d",$li["addtime"])); ?></font>
								</span>
							</td>
						  </tr>
						</table>
							
						<table class="layui-table" lay-even="" lay-skin="row">
						  
						  <thead>
							<tr>
							  <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;用户名</th>
							  <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($li["username"]); ?></th>
							  <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;昵称</th>
							  <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($li["name"]); ?></th>
							</tr> 
						  </thead>
						  <tbody>
							<tr>
							  <td>性别</td>
							  <td>
							    <!--<?php if($list[0].sex === 0): ?>女
									<?php elseif($list[0].sex == 1): ?>男<?php endif; ?> 
								<?php echo ($list[0]["sex"]); ?>-->
								<?php if(($li["sex"] == 1) ): ?>男
									<?php elseif(($li["sex"] === '0') ): ?>女<?php endif; ?>
							  </td>
							  <td>电话</td>
							  <td><?php echo ($li["phone"]); ?></td>
							</tr>
							<tr>
							  <td>邮箱</td>
							  <td><?php echo ($li["email"]); ?></td>
							  <td>状态</td>
							  <td>
								<?php if($li["state"] == 1): elseif($li["state"] == 3): ?>
									<?php elseif($li["state"] == 4): ?>
									<?php else: ?>普通用户<?php endif; ?>
							  </td>
							</tr>
							<tr>
							  <td>注册时间</td>
							  <td><?php echo (date("Y-m-d",$li["addtime"])); ?></td>
							  <td>个性签名</td>
							  <td>Life is either a daring adventure or nothing.</td>
							</tr>
						  </tbody>
						</table>
						<span class="account-info-btn">
							<a href="/bishe/CLY/index.php/Home/User/mPersonal/id/<?php echo ($li["id"]); ?>" id="" class="link">修改个人资料</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<a href="/bishe/CLY/index.php/Home/User/mPass/id/<?php echo ($li["id"]); ?>" class="link">修改密码</a>
						</span>
					</ul>
				</div>
			</div>
		</div>
	</div>


	<!-- 尾部 -->
	<div class="footer-content">
		<div id="footer" class="footer">
			<div class="footer-inner clearfix flexible">
				<div class="footer-size">
					<h3>用户帮助</h3>
					<ul>
						<li><a href="//www.nuomi.com/help" >常见团购问题</a></li>
						<li><a href="//www.nuomi.com/help/api" >开放API</a></li>
					</ul>
				</div>
				<div class="footer-size-2">
					<h3>手机百度助手</h3>
					<ul>
						<li><a href="https://m.nuomi.com"  target="_blank">美食美客触屏版</a></li>
					</ul>
				</div>
				<div class="footer-size-2">
					<h3>商务合作</h3>
					<ul>
						<li><a href="//www.nuomi.com/links">友情链接</a></li>
						<li><a href="http://cooperation.nuomi.com/clue/index">市场合作</a></li>
					</ul>
				</div>
				<div class="footer-size-2">
					<h3>公司信息</h3>
					<ul>
						<li><a href="//www.nuomi.com/about">关于美食美客</a></li>
						<li><a href="http://weibo.com/nuomiwang" target="_blank">美食美客新浪微博</a></li>
						<li><a href="javascript:;"  id="j-tttel">违规投诉&amp;廉政举报</a></li>
					</ul>
				</div>
				<div class="footer-size-3">
					<h3>4006-888-887</h3>
					<ul>
						<li>周一至周日&nbsp;9:00-22:00</li>
						<li>客服电话&nbsp;免长途费</li>
					</ul>
					<a href="//d.nuomi.com/inter/group?from=WebRootWord" class="mobile-btn">手机专享优惠</a>
				</div>
			</div>
		</div>
		<div id="copyright-info">
			<div class="site-info">
				<span class="copyright">&copy;</span>2017&nbsp;msmk.com  &nbsp;
				<a href="http://www.miitbeian.gov.cn" class="link" target="_blank">京ICP证030173号</a>
			&nbsp;京公网安备11010802014106号
			&nbsp;<a href="/pcindex/main/about/openinfo">营业执照信息</a>
			</div>
			<div class="icons">
			<span class="ico-zhifubao">支付宝-特约商家</span>
			<span class="ico-kexin">可信网站 身份验证</span>
			<span class="ico-web-trust">网站认证 Web Trust</span>
			</div>
		</div>
		<div style="width:300px;margin:0 auto; padding:20px 0;">
			<a target="_blank" href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=11000002000001" style="display:inline-block;text-decoration:none;height:20px;line-height:20px;"><img src="/bishe/CLY/Public/images/police_logo_2aa5dfa.png" style="float:left;"/><p style="float:left;height:20px;line-height:20px;margin: 0px 0px 0px 5px; color:#939393;">京公网安备 11000002000001号</p></a>
		</div>
	</div>
	<script>
		function doshow(d){
			var ul = document.getElementById("u"+d);
			if(ul.style.display == "none"){
				ul.style.display = "block";
			}else{
				ul.style.display = "none";
			}
		}
	</script>
</body>
</html>