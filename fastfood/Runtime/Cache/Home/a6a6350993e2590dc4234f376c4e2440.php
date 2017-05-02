<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
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
						<a href="/bishe/CLY/index.php/Home/Public/forget3" class="reg-btn">注册</a>
					</div>
				</div>
			</div>
			<div class="body">
				<div class="wrap clearfix">
					<div class="mod-forgot"> 
				     <ul class="mod-sub-nav"> 
				      <li class="mod-sub-list1">确认帐号</li> 
				      <li class="mod-sub-list2 list2-active">安全验证</li> 
				      <li class="mod-sub-list3">重置密码</li> 
				     </ul>
				     <div class="mod-step-detail" style="position:relative;"> 
				      <div class="forgot-auth-container"> 
				       <p class="step-form-info">为了你的帐号安全，请完成身份验证</p> 
				       <div class="forgot-auth-type m-t10" id="mobile-auth"> 
				        <form action="/bishe/CLY/index.php/Home/Public/forget3" method="post" class="form-2" id="form-mobile" onsubmit="return doSubmit()"> 
				         <div class="forgot-auth-title">
				          手机验证
				         </div> 
				         <div class="form-2-item clearfix pass-input-container"> 
				          <label class="form-2-label">手机号：</label> 
				          <div class="form-2-content line-32">
				            <?php echo ($sphone); ?>
				          </div> 

				         </div>
				         <input type="hidden" value="<?php echo ($phone); ?>" name="phone"> 
				         <p class="verify-method">验证码：</p> 
				         <div class="form-2-item clearfix"> 
				          <div class="form-2-content pass-input-container vcode-container m-b-mobile"> 
				           <input type="text" class="pass-input vcode-input pass-input-new" name="mobileVcode" value="" id=""  placeholder="手机验证码" /> 
				           <label class="pass-input-label input-label-new1"></label> 
				           <div class="pass-button-timer" id="pass-button-new1" onclick="sendPass()">
				            发送验证码
				           </div> 

				            <span class="pass-input-msg" id="info"><?php echo ($info); ?></span> 
				       <!--     <span class="pass-input-stip" id="forgot-mobileVcode-success">1323</span>  -->
				           <div class="clear"></div> 
				           <a class="pass-input-stip" id="forgot-mobileVcode-unreceived" style="margin-left:0;display:none;">收不到短信验证码?</a> 
				          
				          </div> 
				         </div> 
				         <div style="margin-bottom:10px;">
				          <a href="http://passport.baidu.com/?getpassappeal&amp;tpl=nuomi&amp;code=0bf01940daa0dabd96245759&amp;bdToken=ebea7bff2a8b63a5223ce790dd9c6d75&amp;sub_source=un_mobile">手机号不可用？</a>
				         </div> 
				         <div class="m-b30"> 
				          <input class="pass-button-submit pass-submit-form pass-button-new1" type="submit" name="" value="下一步" id="submit-mobile" t="mobile" /> 
				         </div> 
				        </form> 
				        <div id="upsms-auth" class="hide"> 
				         <div class="forgot-auth-title">
				          手机验证：
				         </div> 
				         <p class="step-form-info">请使用手机183******82发送短信到 10698000036581</p> 
				         <div class="upsms-auth-content clearfix"> 
				          <div class="upsms-auth-left"> 
				           <p>编辑短信：<em id="upsms-vcode"></em></p> 
				           <p>发送到 1069 8000 0365 81</p> 
				           <p class="upsms-auth-tip">可能会由运营商收取0.1元短信费用</p> 
				          </div> 
				          <div class="upsms-auth-right"> 
				           <div id="upsms-qrcode">
				            <img width="80" height="80" />
				           </div> 
				           <p class="upsms-mt10">也可扫描二维码发送短信</p> 
				          </div> 
				         </div> 
				         <div class="clearfix"> 
				          <input class="pass-button-submit left" type="submit" name="" value="返回" id="back-mobile-auth" /> 
				          <span class="pass-input-msg"></span> 
				         </div> 
				        </div> 
				       </div> 
				      </div> 
				   <!--    <div class="step-tip m-t0"> 
				       <ul> 
				        <li class="clearfix"> 
				         <div class="img-info left">
				          <img src="/static/passpc-security/img/forgot/info.png" width="12" height="13" />
				         </div>如果您的密保工具都已无法使用，可使用<a href="http://passport.baidu.com/?getpassappeal&amp;tpl=nuomi&amp;code=0bf01940daa0dabd96245759&amp;bdToken=ebea7bff2a8b63a5223ce790dd9c6d75&amp;sub_source=un_all" target="_blank">点此申诉</a>，成功后可更换。
				         </li> 
				       </ul> 
				      </div>  -->
				     </div> 
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
	
		// 当使用账号登录时
		function doSubmit(){
			 return checkYzm();
		}
		function checkYzm(){
			var mobileVcode = $("input[name='mobileVcode']").val();
			if (mobileVcode=="") {
				$("#info").html("请填写手机验证码");
				return false;
			}else{
				$("#info").html("");
				return true;
			}
		}		
	
         // 发送动态密码
         function sendPass(){
         	//先检测一下手机号是否存在
         	
         	var phone = $("input[name='phone']").val();
         	if (phone=="") {
			  $("#info1").html("请填写手机号");
              return false;
          	} else{
              //Ajax再发送信息
               $(".loginError span").css("display","none");
               $("#info1").html("");
                $.ajax({
                      type:"post",
                      url:"/bishe/CLY/index.php/Home/Public/messageCode",
                      data:"phone="+phone,
                      dataType:"json",
                      success:function (data){
                      
                        if(data.b){
                        	console.log(data.c);
		  					var time = 30;
		                  	var timer = setInterval(function(){
		                  		time--;
			                  	$("#pass-button-new1").removeAttr("onclick");
			                  	$("#pass-button-new1").html("重新发送("+time+")");
		                  	
			                  	if (time==0) {
			                  		clearInterval(timer);
			                  		$("#pass-button-new1").attr("onclick","sendPass()");
			                  		$("#pass-button-new1").html("重新发送");
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
</html>