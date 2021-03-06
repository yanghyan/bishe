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
	
	<!--分页css-->
	<link rel="stylesheet" type="text/css" href="/bishe/CLY/Public/css/page.css"/>
	
	<link rel="stylesheet" href="/bishe/CLY/Public/Admin/layui/css/layui.css"  media="all">
	<script src="/bishe/CLY/Public/Admin/js/jquery.min.js"></script>
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
					<a href="//ty.nuomi.com/search?k=%E8%81%9A%E4%BC%98%E6%83%A0%E9%A4%90%E9%A5%AE&rid=fe77bf3498d1513520f71d009009f144" mon="element=hot_query&position=0">聚优惠餐饮</a>
				</li>
				<li>
					<a href="//ty.nuomi.com/search?k=%E4%B8%AD%E6%AD%A3%E5%A4%A9%E8%A1%97&rid=fe77bf3498d1513520f71d009009f144" mon="element=hot_query&position=1">中正天街</a>
				</li>
				<li>
					<a href="//ty.nuomi.com/search?k=%E7%94%9F%E6%97%A5%E8%9B%8B%E7%B3%95&rid=fe77bf3498d1513520f71d009009f144" mon="element=hot_query&position=2">生日蛋糕</a>
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
					<div class="left-menu clearfix" id="j-catg-list">
						<div class="level-item" catg-id="326">
							<div class="second-level with-min" mon="area=catg_hover_326">
								<div class="section clearfix">
									<div class="section-item clearfix  no-top-border ">
										<h3>热门分类</h3>
										<ul>
											<li>
												<a href="//t10.nuomi.com/pc/t10/index" target="_top" class="hot" mon="element=精选品牌">精选品牌</a>
											</li>
											<li>
												<a href="//ty.nuomi.com/327" target="_top" class="" mon="element=其他美食">其他美食</a>
											</li>
											<li>
												<a href="//ty.nuomi.com/364" target="_top" class="" mon="element=火锅">火锅</a>
											</li>
											<li>
												<a href="//ty.nuomi.com/380" target="_top" class="" mon="element=小吃快餐">小吃快餐</a>
											</li>
											<li>
												<a href="//ty.nuomi.com/392" target="_top" class="" mon="element=自助餐">自助餐</a>
											</li>
											<li>
												<a href="//ty.nuomi.com/439" target="_top" class="" mon="element=海鲜">海鲜</a>
											</li>
											<li>
												<a href="//ty.nuomi.com/460" target="_top" class="" mon="element=烧烤/烤肉">烧烤/烤肉</a>
											</li>
											<li>
												<a href="//ty.nuomi.com/690" target="_top" class="" mon="element=干锅/香锅">干锅/香锅</a>
											</li>
											<li>	
												<a href="//ty.nuomi.com/880" target="_top" class="" mon="element=甜品">甜品</a>
											</li>
											<li>
												<a href="//ty.nuomi.com/881" target="_top" class="" mon="element=蛋糕">蛋糕</a>
											</li>
											<li>
												<a href="//ty.nuomi.com/954" target="_top" class="" mon="element=咖啡">咖啡</a>
											</li>
											<li>
												<a href="//ty.nuomi.com/2016" target="_top" class="" mon="element=婚宴">婚宴</a>
											</li>
											<li>
												<a href="//ty.nuomi.com/2049" target="_top" class="" mon="element=夏日饮品">夏日饮品</a>
											</li>
											<li>
												<a href="//ty.nuomi.com/2050" target="_top" class="" mon="element=小龙虾">小龙虾</a>
											</li>
											<li>
												<a href="//ty.nuomi.com/2051" target="_top" class="" mon="element=酒吧">酒吧</a>
											</li>
											<li>
												<a href="//ty.nuomi.com/2052" target="_top" class="" mon="element=粥店">粥店</a>
											</li>
										</ul>
									</div>
									<div class="section-item clearfix ">
										<h3>中国菜</h3>
										<ul>
											<li>
												<a href="//ty.nuomi.com/388" target="_top" class="" mon="element=粤菜">粤菜</a>
											</li>
											<li>
												<a href="//ty.nuomi.com/393" target="_top" class="" mon="element=川湘菜">川湘菜</a>
											</li>
											<li>
												<a href="//ty.nuomi.com/424" target="_top" class="" mon="element=江浙菜">江浙菜</a>
											</li>
											<li>
												<a href="//ty.nuomi.com/450" target="_top" class="" mon="element=北京菜">北京菜</a>
											</li>
											<li>
												<a href="//ty.nuomi.com/451" target="_top" class="" mon="element=新疆菜">新疆菜</a>
											</li>
											<li>
												<a href="//ty.nuomi.com/504" target="_top" class="" mon="element=东北菜">东北菜</a>
											</li>
											<li>
												<a href="//ty.nuomi.com/509" target="_top" class="" mon="element=云贵菜">云贵菜</a>
											</li>
											<li>
												<a href="//ty.nuomi.com/652" target="_top" class="" mon="element=鲁菜">鲁菜</a>
											</li>
											<li>
												<a href="//ty.nuomi.com/653" target="_top" class="" mon="element=西北菜">西北菜</a>
											</li>
											<li>
												<a href="//ty.nuomi.com/655" target="_top" class="" mon="element=素食">素食</a>
											</li>
											<li>
												<a href="//ty.nuomi.com/692" target="_top" class="" mon="element=创意菜/私房菜">创意菜/私房菜</a>
											</li>
											<li>
												<a href="//ty.nuomi.com/696" target="_top" class="" mon="element=台湾菜/客家菜">台湾菜/客家菜</a>
											</li>
											<li>
												<a href="//ty.nuomi.com/874" target="_top" class="" mon="element=徽菜">徽菜</a>
											</li>
											<li>
												<a href="//ty.nuomi.com/878" target="_top" class="" mon="element=烤鱼">烤鱼</a>
											</li>
											<li>
												<a href="//ty.nuomi.com/883" target="_top" class="" mon="element=烤鸭">烤鸭</a>
											</li>
											<li>
												<a href="//ty.nuomi.com/884" target="_top" class="" mon="element=麻辣烫/冒菜">麻辣烫/冒菜</a>
											</li>
											<li>
												<a href="//ty.nuomi.com/962" target="_top" class="" mon="element=中餐/家常菜">中餐/家常菜</a>
											</li>
										</ul>
									</div>
									<div class="section-item clearfix ">
										<h3>外国菜</h3>
										<ul>
											<li>
												<a href="//ty.nuomi.com/389" target="_top" class="" mon="element=日韩料理">日韩料理</a>
											</li>
											<li>
												<a href="//ty.nuomi.com/390" target="_top" class="" mon="element=东南亚菜">东南亚菜</a>
											</li>
											<li>
												<a href="//ty.nuomi.com/391" target="_top" class="" mon="element=西餐">西餐</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
					</div>
					</div>
				</li>
				<li class="nav-item nav-item-first">
					<a href="/bishe/CLY/index.php/Home/Index/index" target="_top" class="item first active" mon="element=首页">首页</a>
				</li>
				<li class="nav-item hot-item-l">
					<a href="/bishe/CLY/index.php/Home/List/index" target="_top" class="item " mon="element=品牌馆">品牌馆</a>
				</li>
				<li class="nav-item hot-item-s">
					<a href="/bishe/CLY/index.php/Home/List/index" target="_blank" class="item " mon="element=小吃快餐">小吃快餐</a>
				</li>
				<li class="nav-item">
					<a href="/bishe/CLY/index.php/Home/List/index" target="_top" class="item " mon="element=地方菜">地方菜</a>
				</li>
				<li class="nav-item">
					<a href="/bishe/CLY/index.php/Home/List/index" target="_top" class="item " mon="element=异国风味">异国风味</a>
				</li>
				<li class="nav-item">
					<a href="/bishe/CLY/index.php/Home/List/index" target="_top" class="item " mon="element=烧烤海鲜">烧烤海鲜</a>
				</li>
				<li class="nav-item">
					<a href="/bishe/CLY/index.php/Home/List/index" target="_top" class="item " mon="element=甜点饮品">甜点饮品</a>
				</li>
				<li class="nav-item">
					<a href="/bishe/CLY/index.php/Home/List/index" target="_top" class="item " mon="element=水果鲜生">水果生鲜</a>
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
							<a href="javascript:;" class="first">我的收藏</a>
						</li>
								
						<table id="test" class="layui-table" lay-even="" lay-skin="row">
						  
						  <thead>
							<tr>
							  <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;用户名</th>
							  <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;店铺名</th>
							  <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;添加时间</th>
							  <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;操作</th>
							</tr> 
						  </thead>
						  <tbody>
						   <?php if(is_array($list)): foreach($list as $key=>$col): ?><tr>
							  <td><?php echo ($col["username"]); ?></td>
							  <td><?php echo ($col["shopname"]); ?></td>
							  <td><?php echo (date("Y-m-d H:i:s",$col["addtime"])); ?></td>
							  <td>
								<a onclick="doDel(<?php echo ($col["id"]); ?>,this);" class="link" id="">删除收藏</a>
							  </td>
							</tr>
						  </tbody><?php endforeach; endif; ?>
						</table>
						
						<a onclick="delAll(<?php echo ($col["id"]); ?>,this);" class="link" id="">全部取消收藏</a>
					</ul>
					<div class="sabrosus">
						<?php echo ($pageinfo); ?>
					</div>
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
	<!--layui插件的js-->
    <script src="/bishe/CLY/Public/Admin/layui/layui.js" charset="utf-8"></script> 
	<script>
		function doshow(d){
			var ul = document.getElementById("u"+d);
			if(ul.style.display == "none"){
				ul.style.display = "block";
			}else{
				ul.style.display = "none";
			}
		}
		
		//删除收藏
		function doDel(id,bt){
			layui.use(['layer', 'form'], function(){
			  var layer = layui.layer;
			  layer.confirm('确定删除收藏吗？', {
				  btn: ['确定','取消'] 
				}, function(){
				  //执行Ajax发送并执行删除操作
					$.ajax({
						type:"GET",
						url: '/bishe/CLY/index.php/Home/User/delCollect',
						data:"id="+id,
						dataType:"json",
						success:function(res){
							if(res.b){
								//删除节点
								$(bt).parents("tr").remove();
							}
						}
					});
				  layer.msg('已删除', {icon: 1});
				});
			});
		}
		
		//删除所有收藏
		function delAll(id,bt){
			layui.use(['layer', 'form'], function(){
			  var layer = layui.layer;
			  layer.confirm('确定取消所有收藏吗？', {
				  btn: ['确定','取消'] 
				}, function(){
				  //执行Ajax发送并执行删除操作
					$.ajax({
						type:"GET",
						url: '/bishe/CLY/index.php/Home/User/delAll',
						data:"id="+id,
						dataType:"json",
						success:function(res){
							if(res.b){
								//删除节点
								$("#test tbody").remove();
								$(".sabrosus").hide();
							}
						}
					});
				  layer.msg('已清空', {icon: 1});
				});
			});
		}
	</script>
</body>
</html>