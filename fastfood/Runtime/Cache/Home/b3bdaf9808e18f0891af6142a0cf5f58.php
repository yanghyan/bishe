<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html>
<!--STATUS OK-->
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>注册美食美客帐号</title>
	<!-- <link rel="shortcut icon" href="https://www.baidu.com/favicon.ico" type="image/x-icon" /> -->
	<!-- <link rel="icon" sizes="any" mask href="https://www.baidu.com/img/baidu.svg">   -->
	<link href="/0308/CLY/Public/css/base.css" type="text/css" rel="stylesheet" />        
	<!-- <link href="/0308/CLY/Public/css/ui.css" type="text/css" rel="stylesheet" />                         -->
	<link href="/0308/CLY/Public/css/boot_reg_bedb924.css" type="text/css" rel="stylesheet" />
</head>
<body>
	<div id="wrapper" class="">
		<div id="head">
			<div class="mod-header">
				<a href="http://www.baidu.com/">
					<img src="/0308/CLY/Public/images/logo-nuomi.png" alt="logo">
				</a>
				
			</div>
		</div>
		<div id="nav">
			<div class="nav-2">
				<div class="mod-nav clearfix">
					<h1 style="color:#FF6699"></h1>
				</div>
			</div>
		</div>
		<div id="content">
			<div  class="mod-reg clearfix mod-reg-pink">
				<div class="reg-content" id="reg_content">
					<form action="/0308/CLY/index.php/Home/Public/insert" method="post" onsubmit="return doSubmit()">
						<p class="registerinfo">
							<label>用户名:</label><input type="text" name="username" autocomplete="off" title="用户名" placeholder="请设置用户名" id="user" />
						</p>
						<p class="registerinfo">
							<label for="">密&nbsp;&nbsp;  码：</label>
							<input type="password" name="pass" title="密码" autocomplete="off" placeholder="请设置登录密码" onkeyup="pwStrength(this.value)" id="pass" />
							 <ul class="pass_set">
							    <li id="strength_L">弱</li>
							    <li id="strength_M">中</li>
							    <li id="strength_H">强</li>
							  </ul>

						</p>
						<div class="pwdyq" style="display:none">
							<ol>
								<li>1、长度为6~18位</li>
								<li>2、支持数字、大小写字母</li>
								<li>3、不能全为数字</li>
							</ol>
						</div>
						<p class="registerinfo">
							<label for="">确认密码：</label>
							<input type="password" name="qrpass" title="确认密码" autocomplete="off" placeholder="请再次输入密码" id="qrpass" />							

						</p>
						<p class="registerinfo">
							<label>邮&nbsp;&nbsp;  箱：</label><input type="text" name="email" autocomplete="off" title="邮箱" placeholder="邮箱" id="email" />
						</p>
						<p class="registerinfo">
							<label for="">手机号：</label>
							<input type="text" name="phone" autocomplete="off" title="手机号" placeholder="可用于登录和找回密码" id="phone" /><br/><br/>						

						</p>
						<span class="hqcode" onclick="sendPass()" id="send">
							 	<a href="#"  class="yzm" id="senda">
										点击获取短信动态验证码
								</a>
						</span>
						<p class="registerinfo">
							<label for="">验证码：</label>
							<input type="text" name="code" autocomplete="off" title="验证码" placeholder="请输入验证码" id="code" />
							<span style='font-size:12px;color:#fc4343;;' <?php if($info!=''): ?>style="display:block"<?php else: ?>style="display:none"<?php endif; ?>><?php echo ($info); ?></span>
						</p>
						
						
						<p class="loginnotice">
							<span>
								<input type="checkbox" checked="checked">
								阅读并接受
								<a href="#">
									《美食美客用户协议》
								</a>
							</span>
						</p>
						<p class="loginsubmit">
							<!-- 注册 -->
							<input type="submit" value="注册"/>
						</p>
					</form>
				</div>
				<div class="reg-sms">
					<h3 class="reg-sms-title">手机快速注册</h3>
					<div class="reg-sms-content">
						<p class="reg-sms-p reg-sms-p-text">请使用中国大陆手机号，编辑短信：</p>
						<p class="reg-sms-p reg-sms-p-warn">6-14位字符（支持数字/字母/符号）</p>
						<p class="reg-sms-p reg-sms-p-text">作为登录密码，发送至：</p>
						<p class="reg-sms-p reg-sms-p-warn">1069 80000 36590</p>
						<p class="reg-sms-p reg-sms-p-last">即可注册成功，手机号即为登录帐号。</p>
					</div>
				</div>
				<div class="login-link" id="login_link">
					<span>我已注册，现在就</span>
					<!-- <a href="/0308/CLY/index.php/Home/Public/index" class="login-btn" id="login_btn">登录</a> -->
					<button class="login-btn" id="login_btn" onclick="login()">登录</button>
				</div>
			</div>
		</div>
		<div id="foot">
			<div class="mod-footer">
				<div class="copy-box">2017&nbsp;&copy;ABADB3BaiduE3E9EF</div>
			</div>
		</div>
	</div>
	<script src="/0308/CLY/Public/js/jquery-1.8.2.min.js"></script>
	<script type="text/javascript">
		 //表单提交限制
          function doSubmit() {
            return checkUserName()&&checkPass()&&checkRPass()&&checkEmail()&&checkPhone()&&checkCode();
          }
		
		//检测
		 function checkUserName() {
            var user = $("input[name='username']").val();
            if (user=="") {
            	$("#user").next("span").remove();
				$("#user").css("borderColor","#ddd");
            	$("#user").css("borderColor","#fc4343");				
				$("#user").after("<span style='font-size:12px;color:#fc4343;;'>请您填写用户名</span>");
				return false;
            }else if(user.match(/^[a-zA-Z0-9_]{5,12}$/)==null){  
            	$("#user").next("span").remove();
				$("#user").css("borderColor","#ddd");             
                $("#user").css("borderColor","#fc4343");			
				$("#user").after("<span style='font-size:12px;color:#fc4343;'>请输入正确的账户格式</span>");
                return false;
            }else if(user.match(/(^\_)|(\__)|(\_+$)/)){
            	$("#user").next("span").remove();
				$("#user").css("borderColor","#ddd");
            	$("#user").css("borderColor","#fc4343");			
				$("#user").after("<span style='font-size:12px;color:#fc4343;'>用户名首尾不能出现下划线\'_\'</span>");
                return false;
            }else if(user.match(/^\d+\d+\d$/)){
            	$("#user").next("span").remove();
				$("#user").css("borderColor","#ddd");
				$("#user").css("borderColor","#fc4343");			
				$("#user").after("<span style='font-size:12px;color:#fc4343;'>用户名不能全为数字</span>");
                return false;
            }else{     
            	//ajax判断该用户名是否已经注册，要求用户名唯一
            	   var c;
            	   $.ajax({
                      type:"post",
                      url:"/0308/CLY/index.php/Home/Public/check",
                      data:"val="+user,
                      dataType:"json",
                      async: false,
                      success:function (data){
                      	 if(data.b){
                      	 	c = true;
                      	 }else{
                      	 	c = false;
                      	 }

                      },
                      error:function () {
                          
                      }
                 });  
                 if (c) {
                 	$("#user").next("span").remove();
					$("#user").css("borderColor","#ddd");			
					$("#user").after("<span style='font-size:12px;color:#66FF66;'>该用户名可用</span>");
	                 return true;	
                 }else{
                 	$("#user").next("span").remove();
					$("#user").css("borderColor","#ddd");
	            	$("#user").css("borderColor","#fc4343");			
					$("#user").after("<span style='font-size:12px;color:#fc4343;'>该用户名已被注册！</span>");
					return false;	
                 }   
               
            }

         }
         function checkEmail() {
            var email = $("input[name='email']").val();
            if (email=="") {
            	$("#email").next("span").remove();
				$("#email").css("borderColor","#ddd");
            	$("#email").css("borderColor","#fc4343");				
				$("#email").after("<span style='font-size:12px;color:#fc4343;;'>请您填写邮箱</span>");
				return false;
            }else if(email.match(/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/)==null){
            	$("#email").next("span").remove();
				$("#email").css("borderColor","#ddd");
                $("#email").css("borderColor","#fc4343");				
				$("#email").after("<span style='font-size:12px;color:#fc4343;;'>请您输入正确的邮箱</span>");
                return false;
            }else{
            	// 检测该邮箱是否已注册，要求邮箱唯一
            	 var c;
            	 $.ajax({
                      type:"post",
                      url:"/0308/CLY/index.php/Home/Public/check",
                      data:"val="+email,
                      dataType:"json",
                      async: false,
                      success:function (data){
                      	 if(data.b){
                      	 	c = true;
                      	 }else{
                      	 	c = false;
                      	 }

                      },
                      error:function () {
                          
                      }
                 });  
                 if (c) {
                 	$("#email").next("span").remove();
					$("#email").css("borderColor","#ddd");			
					$("#email").after("<span style='font-size:12px;color:#66FF66;'>该邮箱可用</span>");
	                 return true;	
                 }else{
                 	$("#email").next("span").remove();
					$("#email").css("borderColor","#ddd");
	            	$("#email").css("borderColor","#fc4343");			
					$("#email").after("<span style='font-size:12px;color:#fc4343;'>该邮箱已被使用！</span>");
					return false;	
                 }   

            }
         }

         function checkPhone(){
            var phone = $("input[name='phone']").val();

            if (phone=="") {
             	$("#phone").next("span").remove();
				$("#phone").css("borderColor","#ddd");
             	$("#phone").css("borderColor","#fc4343");				
				$("#phone").after("<span style='font-size:12px;color:#fc4343;;'>请您填写手机号码</span>");
				return false;
            }else if (phone.match(/^1[34578]\d{9}$/)==null) {
	            $("#phone").next("span").remove();
				$("#phone").css("borderColor","#ddd");
             	$("#phone").css("borderColor","#fc4343");				
				$("#phone").after("<span style='font-size:12px;color:#fc4343;;'>您的手机号码格式不正确</span>");
				return false;
            }else{
            	// 检测该手机是否已注册，要求手机唯一
            	 var c;
            	 $.ajax({
                      type:"post",
                      url:"/0308/CLY/index.php/Home/Public/check",
                      data:"val="+phone,
                      dataType:"json",
                      async: false,
                      success:function (data){
                      	 if(data.b){
                      	 	c = true;
                      	 }else{
                      	 	c = false;
                      	 }

                      },
                      error:function () {
                          
                      }
                 });  
                 if (c) {
                 	$("#phone").next("span").remove();
					$("#phone").css("borderColor","#ddd");			
					$("#phone").after("<span style='font-size:12px;color:#66FF66;'>该手机号可用</span>");
	                 return true;	
                 }else{
                 	$("#phone").next("span").remove();
					$("#phone").css("borderColor","#ddd");
	            	$("#phone").css("borderColor","#fc4343");			
					$("#phone").after("<span style='font-size:12px;color:#fc4343;'>该手机号已被注册！</span>");
					return false;	
                 }   

            }
             
          }

        function checkPass() {
             var pass = $("input[name='pass']").val();
             if (pass=="") {
             	$("#pass").next("span").remove();
				$("#pass").css("borderColor","#ddd");
             	$("#pass").css("borderColor","#fc4343");				
				$("#pass").after("<span style='font-size:12px;color:#fc4343;;'>请您填写密码</span>");
				return false;
             }else if(pass.match(/^(.+){6,18}$/)==null){
             	$("#pass").next("span").remove();
				$("#pass").css("borderColor","#ddd");
                $("#pass").css("borderColor","#fc4343");				
				$("#pass").after("<span style='font-size:12px;color:#fc4343;;'>请您输入6-18位密码</span>");
                return false;
            }else if(pass.match(/^\d+\d+\d$/)){
            	$("#pass").next("span").remove();
				$("#pass").css("borderColor","#ddd");
                $("#pass").css("borderColor","#fc4343");				
				$("#pass").after("<span style='font-size:12px;color:#fc4343;;'>密码不能全为数字</span>");
                return false;
            }else{
                $("#pass").next("span").remove();
				$("#pass").css("borderColor","#ddd");
                return true;
            }
        }


        function checkRPass() {
            var pass   = $("input[name='pass']").val();
            var qrpass = $("input[name='qrpass']").val();

            if (qrpass=="") {
             	$("#qrpass").next("span").remove();
				$("#qrpass").css("borderColor","#ddd");
             	$("#qrpass").css("borderColor","#fc4343");				
				$("#qrpass").after("<span style='font-size:12px;color:#fc4343;;'>请您填写确认密码</span>");
				return false;
             }else if (pass!=qrpass) {
                $("#qrpass").css("borderColor","#fc4343");				
				$("#qrpass").after("<span style='font-size:12px;color:#fc4343;;'>确认密码与密码不一致</span>");
                return false;
            }else{
            	$("#qrpass").next("span").remove();
				$("#qrpass").css("borderColor","#ddd");
                return true;
            }
         } 

          function checkCode(){
         	var code = $("input[name='code']").val();
         	if(code==""){
         	  $(".loginError span").css("display","block");
			  $("#code").next("span").remove();
			  $("#code").css("borderColor","#ddd");
         	  $("#code").css("borderColor","#fc4343");				
			  $("#code").after("<span style='font-size:12px;color:#fc4343;;'>请您填写验证码</span>");
              return false;
         	}else{
         	  $("#code").next("span").remove();
			  $("#code").css("borderColor","#ddd");
              return true;
         	}
         }

	     /*
	      *鼠标聚焦和失去焦点事件，提示用户输入信息
	      * 
	      */
		$("input[name='username']").focus(function(){
			$(this).next("span").remove();
			$(this).css("borderColor","#ddd");
			$(this).css("borderColor","#FF6699");
			//在当前输入框节点后添加一个span兄弟节点				
			$(this).after("<span style='font-size:12px;color:#999999;'>设置后不可更改，由5~12位字母、数字或下划线组成,不能全为数字</span>");
		}).blur(function(){
			$(this).next("span").remove();
			$(this).css("borderColor","#ddd");
			//执行节点删除
			$(this).next("span").remove();
			$(this).css("borderColor","#ddd");
		});
		
		$("input[name='email']").focus(function(){
			$(this).next("span").remove();
			$(this).css("borderColor","#ddd");
			$(this).css("borderColor","#FF6699");
			//在当前输入框节点后添加一个span兄弟节点				
			$(this).after("<span style='font-size:12px;color:#999999;'>请正确填写邮箱信息</span>");
		}).blur(function(){
			//执行节点删除
			$(this).next("span").remove();
			$(this).css("borderColor","#ddd");
		});
		
		$("input[name='phone']").focus(function(){
			$(this).next("span").remove();
			$(this).css("borderColor","#ddd");
			$(this).css("borderColor","#FF6699");
			//在当前输入框节点后添加一个span兄弟节点				
			$(this).after("<span style='font-size:12px;color:#999999;'>请输入中国大陆手机号，其他用户不可见</span>");
		}).blur(function(){
			//执行节点删除
			$(this).next("span").remove();
			$(this).css("borderColor","#ddd");
		});
		
		$("input[name='pass']").focus(function(){
			$(this).next("span").remove();
			$(this).css("borderColor","#ddd");
			$(this).css("borderColor","#FF6699");
			//在当前输入框节点后添加一个span兄弟节点				
			$(".pwdyq").show();
		}).blur(function(){
			//执行节点删除
			$(".pwdyq").hide();
			$(this).css("borderColor","#ddd");
		});
		$("input[name='code']").focus(function(){
			$(this).next("span").remove();
			$(this).css("borderColor","#ddd");
			$(this).css("borderColor","#FF6699");
			//在当前输入框节点后添加一个span兄弟节点				
			$(this).after("<span style='font-size:12px;color:#999999;'>请输入您的手机验证码</span>");
		}).blur(function(){
			//执行节点删除
			$(this).next("span").remove();
			$(this).css("borderColor","#ddd");
		});
		$("input[name='qrpass']").focus(function(){
			$(this).next("span").remove();
			$(this).css("borderColor","#ddd");
			$(this).css("borderColor","#FF6699");
			//在当前输入框节点后添加一个span兄弟节点				
			$(this).after("<span style='font-size:12px;color:#999999;'>请再次输入您的密码</span>");
		}).blur(function(){			
			//执行节点删除
			$(this).next("span").remove();
			$(this).css("borderColor","#ddd");
		});
		function login() {
			window.location.href="/0308/CLY/index.php/Home/Public/index";
		}
		/*
		 *密码强度检测
		 *
		 */
		//显示颜色  
		function pwStrength(pwd) {
			O_color = "#eeeeee";
			L_color = "#ffd8b4";
			M_color = "#ffaf56";
			H_color = "#e85959";
			if (pwd == null || pwd == '') {
				Lcolor = Mcolor = Hcolor = O_color;
			} else {
				S_level = checkStrong(pwd);
				switch (S_level) {
				case 0:
					Lcolor = Mcolor = Hcolor = O_color;
				case 1:
					Lcolor = L_color;
					Mcolor = Hcolor = O_color;
					break;
				case 2:
					Lcolor = L_color;
					Mcolor = M_color;
					Hcolor = O_color;
					break;
				default:
					Lcolor = L_color;
					Mcolor = M_color;
					Hcolor = H_color;
				}
			}
			$("#strength_L").css('background-color', Lcolor);
			$("#strength_M").css('background-color', Mcolor);
			$("#strength_H").css('background-color', Hcolor);
			return;
		}

		//判断输入密码的类型  
		function CharMode(iN) {
			if (iN >= 48 && iN <= 57) //数字  
			return 1;
			if (iN >= 65 && iN <= 90) //大写  
			return 2;
			if (iN >= 97 && iN <= 122) //小写  
			return 4;
			else return 8;
		}
		//bitTotal函数  
		//计算密码模式  
		function bitTotal(num) {
			modes = 0;
			for (i = 0; i < 4; i++) {
				if (num & 1) modes++;
				num >>>= 1;
			}
			return modes;
		}
		//返回强度级别  
		function checkStrong(sPW) {
			if (sPW.length <= 4) return 0; //密码太短  
			Modes = 0;
			for (i = 0; i < sPW.length; i++) {
				//密码模式  
				Modes |= CharMode(sPW.charCodeAt(i));
			}
			return bitTotal(Modes);
		}

		/*
		 *发送手机验证码
		 * 
		 */ 
         function sendPass(){
         	//先检测一下手机号是否存在
         	
         	var phone = $("input[name='phone']").val();
         	 if (phone=="") {
             	$("#phone").next("span").remove();
				$("#phone").css("borderColor","#ddd");
             	$("#phone").css("borderColor","#fc4343");				
				$("#phone").after("<span style='font-size:12px;color:#fc4343;;'>请您填写手机号码</span>");
				return false;
            }else if (phone.match(/^1[34578]\d{9}$/)==null) {
	            $("#phone").next("span").remove();
				$("#phone").css("borderColor","#ddd");
             	$("#phone").css("borderColor","#fc4343");				
				$("#phone").after("<span style='font-size:12px;color:#fc4343;;'>您的手机号码格式不正确</span>");
				return false;
            }else{
              //Ajax再发送信息
                $("#phone").next("span").remove();
				$("#phone").css("borderColor","#ddd");
                $.ajax({
                      type:"post",
                      url:"/0308/CLY/index.php/Home/Public/regMessage",
                      data:"phone="+phone+"&reg=user",
                      dataType:"json",
                      success:function (data){
                      
                        if(data.b){
                        	console.log(data.c);
		  					var time = 30;
		                  	var timer = setInterval(function(){
		                  		time--;
			                  	$("#send").removeAttr("onclick");
			                  	$("#senda").html("重新发送("+time+")");
		                  	
			                  	if (time==0) {
			                  		clearInterval(timer);
			                  		$("#send").attr("onclick","sendPass()");
			                  		$("#senda").html("重新发送");
			                  	}
		          	
		        		  },1000);
		                }else{
		                	console.log("错误码为："+data.m);
		                	alert("短信发送失败，请重试！");
		                }

                      },
                      error:function () {
                          
                      }
                 });
         		return false;
         }
        }
	</script>
	</body>
</html>