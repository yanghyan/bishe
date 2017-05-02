<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<!--[if lt IE 7]><html class="ie6"><![endif]--><!--[if IE 7]><html class="ie7"><![endif]--><!--[if IE 8]><html class="ie8"><![endif]--><!--[if IE 9]><html class="ie9"><![endif]--><!--[if !IE]><!-->
<html>
	<head>
		<meta charset="utf-8">
		<link rel="shortcut icon" href="//www.nuomi.com/static/common/img/favicon.ico">
		<meta http-equiv="X-UA-Compatible" content="IE=Edge">
		<meta name="renderer" content="webkit">


		<title>美食美客</title>

		<link rel="stylesheet" type="text/css" href="/bishe/CLY/Public/css/global_20a287f.css"/>
		<link rel="stylesheet" type="text/css" href="/bishe/CLY/Public/css/common_38c5655.css"/>
		<link rel="stylesheet" type="text/css" href="/bishe/CLY/Public/css/user_93e8dac.css"/>
		<link rel="stylesheet" type="text/css" href="/bishe/CLY/Public/css/user_93e8dac.css"/>
		<link rel="stylesheet" type="text/css" href="/bishe/CLY/Public/css/font-awesome.css"/>
		<link rel="stylesheet" type="text/css" href="/bishe/CLY/Public/css/font-awesome.min.css"/>
		<link rel="stylesheet" type="text/css" href="/bishe/CLY/Public/css/font-awesome-ie7.min.css"/>
		<link rel="stylesheet" type="text/css" href="/bishe/CLY/Public/css/login.css"/>
		<link rel="stylesheet" type="text/css" href="/bishe/CLY/Public/css/forget.css">
		

		<!-- <link rel="stylesheet" type="text/css" href="/bishe/CLY/Public/css/uni_login_merge_24c3446.css"/> -->
	</head>

	<body mon="page=login" class="gl-normal-screen">

		<ul id="j-go-top" class="nav n-go-top" mon="area=right_anchor">
			<li>
				<a href="#" mon="element=gotop&position=0" class="item with-top-border go-top-2">
					<span class="gotop-ico inner-ico">
						<i class="fa fa-chevron-up fa-2x"></i>
					</span>
					<span class="inner-text">回到顶部</span>
				</a>
			</li>
			<li>
				<a target="_blank" class="item" href="#">
					<span class="question-ico inner-ico">
						<i class="fa  fa-edit fa-2x"></i>
					</span>
					<span class="inner-text">问卷调查</span>
				</a>
			</li>
		</ul>
		<div class="p-login">
			<div class="header">
				<div class="wrap clearfix">
				
					<div class="logo">
						<a href="//www.nuomi.com"></a>
					</div>
					<div class="login-text">找回密码</div>
					<div class="reg-area">还没有美食美客帐号
						<a href="/bishe/CLY/index.php/Home/Public/register" class="reg-btn">注册</a>
					</div>
				</div>
			</div>
			<div class="body">
				<div class="wrap clearfix">
					<div class="mod-forgot">
                		<ul class="mod-sub-nav">
							<li class="mod-sub-list1 list1-active">确认帐号</li>
							<li class="mod-sub-list2">安全验证</li>
							<li class="mod-sub-list3">重置密码</li>
						</ul>
						<form action="/bishe/CLY/index.php/Home/Public/forget2" method="post" id="forgotsel" onsubmit="return doSubmit()">
						<div class="mod-step-detail">
						<p class="step-email-info">请填写您需要找回的帐号,海外用户请点击<a id="overseas">海外手机号找回密码</a></p>
						 <div class="pass-input-container clearfix" id="pass-auth-select">
						<input type="text" class="pass-input pass-input-forgot" name="username" value="" id="account" placeholder="请您输入手机" />
						<label class="pass-input-label input-label-new1 w260"></label>
						<span class="fix-clear userName-clearbtn" id="userName_clearBtn"></span>
						<span class="pass-input-msg l-h40" id="usererror"></span>
						</div>
						<div class="pass-account-slect clearfix m_b15 hide" style="position:relative;">
						<p>请协助我们确认一下您输入的内容，便于更快的定位您的信息：</p>
						<p class="pass-radio pass-radio-list" s="username">我输入的是用户名</p>
						<p class="pass-radio pass-radio-list" s="securemobil">我输入的是手机号</p>
						</div>
						<div class="pass-input-container vcode-container clearfix">
						<input type="text" class="pass-input pass-input-forgot vcode-input vcode-input-width" name="code" value="" id="veritycode" placeholder="请输入验证码" />
						<label class="pass-input-label input-label-new1 vcode-label"></label>
						<img class="vcode-img vcode-img-big hide" alt="验证码图片" title="验证码图片" src="/bishe/CLY/index.php/Home/Public/verify" onclick="this.src='/bishe/CLY/index.php/Home/Public/verify/rand/'+Math.random()" style="display: inline;" >
					<!-- 	<a href="#" class="vcode-img-change p-t13" onclick="reloadCode()">换一张</a> -->
						<input type="hidden" name="captcha_str" value=""/>
						<span class="pass-input-msg l-h40" id="erroryzm"></span>
						</div>
						<div>
						<input type="hidden" name="bdstoken" value="ebea7bff2a8b63a5223ce790dd9c6d75"/>
						<input type="hidden" name="tpl" value="nuomi"/>
						<input type="hidden" name="index" value=""/>
						<input type="hidden" name="countrycode" value="" id="countrycode"/>
						<input type="submit" name="" value="下一步" class="pass-button-submit" id="submit"/>
						<input type="hidden" value="" id="error">
						<input type="hidden" value="" id="username">
						<input type="hidden" value="" id="veritycode">
						<input type="hidden" value="" id="bdErrMsg">
						</div>
						</div>
						</form>
						</div>
				</div>
			</div>
		</div>
		<div class="w-footer-mini" alog-alias="bainuo-order-footermini" alog-group="bainuo-order-footermini">
			<div class="wrap">
				<div class="links">
					<a href="//www.nuomi.com/about" class="link">关于美食美客</a><span>|</span>
					<a href="//www.nuomi.com/help" class="link">常见问题</a><span>|</span>
					<a href="javascript:;" class="link" id="j-tttel">违规投诉&amp;廉政举报</a><span>|</span>
					<a href="//www.nuomi.com/help/api" class="link">开放平台</a><span>|</span>
					<a href="//www.nuomi.com/about/eula" class="link">用户协议</a><span>|</span>
					客服电话：<span class="tel">4006-888-887</span>（每天9:00 - 22:00）
				</div>
				<div class="site-info">
					<span class="copyright">&copy;</span>2015&nbsp;msmk.com&nbsp;
					<a href="http://www.miitbeian.gov.cn" class="link" target="_blank">京ICP证030173号</a>
					&nbsp;京公网安备11010802014106号
				</div>
			</div>
		</div>
	</body>
	<script src="/bishe/CLY/Public/js/jquery-1.8.2.min.js"></script>
	<!-- <script type="text/javascript" src="/bishe/CLY/Public/js/getVerifyCode.js"></script> -->
	<script type="text/javascript">
	
		function doSubmit(){
			 return checkUserName()&&checkYzm();
		}
		function checkUserName(){
			 var user = $("input[name='username']").val();
			 if(user==""){
			 	$("#usererror").html("请填写账号信息");
                return false;
			 }else{
	          	$("#usererror").html("");
	           	return true;
	         }
		}
		function checkYzm(){
			var code = $("input[name='code']").val();
			if (code=="") {
				$("#erroryzm").html("请输入验证码");
				return false;
			}else{
				// 验证码
				  $.ajax({
			          type : "post",
			          url  : "/bishe/CLY/index.php/Home/Public/checkVerify",
			          data : "mycode="+code,
			          dataType : "json",
			          async: false,
			          success  : function(data){
			            if (data.b) {
			               $("#erroryzm").html("");
			               c = true;
			            }else{
			              $("#erroryzm").html("验证码错误");
			               c = false;
			            }
			          },
			          error : function(){
			            //return false;
			          }
			        });
			        if (c) {
			          return true;
			        }else{
			          return false;
			        }

			}
		}
		
	
	</script>
</html>