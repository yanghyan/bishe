<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>会员登陆</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
     <!-- Bootstrap 3.3.4 -->
    <link href="/bishe/CLY/Public/admin/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="/bishe/CLY/Public/admin/bootstrap/css/font-awesome.min.css" rel="stylesheet" type="text/css" /> 
    <!-- Theme style -->
    <link href="/bishe/CLY/Public/admin/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="/bishe/CLY/Public/admin/plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="/bishe/CLY/Public/admin/bootstrap/js/html5shiv.min.js"></script>
        <script src="/bishe/CLY/Public/admin/bootstrap/js/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="../../index2.html"><b>管理员登陆页</b></a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg" id="info" style="color:red;"><?php echo ($info); ?></p>
        <form action="/bishe/CLY/index.php/Admin/Public/doLogin" method="post" onsubmit="return doSubmit()" >
          <div class="form-group has-feedback">
            <input type="username" id="username" name="username" class="form-control" placeholder="username" onblur="checkUser()" />
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" name="pass" id="pass" class="form-control" placeholder="Password" onblur="checkPass()" />
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
          <div class="col-xs-6"> 
              <div class="form-group has-feedback" style="width:140px;">
                <input type="text" name="code" class="form-control" placeholder="code"  />
                <span class="glyphicon glyphicon-th form-control-feedback"></span>
              </div>
          </div>
          <div class="col-xs-6">
              <img src="/bishe/CLY/index.php/Admin/Public/verify" onclick="this.src='/bishe/CLY/index.php/Admin/Public/verify/id/'+Math.random()" width="100" height="34"/>
          </div>
          </div>
          <div class="row">
            <div class="col-xs-8">    
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox"> Remember Me
                </label>
              </div>                        
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">登 陆</button>
            </div><!-- /.col -->
          </div>
        </form>

        <a href="#" style="font-size:12px;">忘记密码</a>&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="register.html" class="text-center" style="font-size:12px;">注册会员</a>

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
    
    <!-- jQuery 2.1.4 -->
    <script src="/bishe/CLY/Public/admin/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="/bishe/CLY/Public/admin/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>  
    <!-- iCheck -->
    <script src="/bishe/CLY/Public/admin/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
      function doSubmit(){
        return checkUser()&&checkPass()&&checkCode();
      }
      //检测用户名
      function checkUser(){
        var user = $("input[name='username']").val();
          if(user.match(/^[a-zA-Z0-9_]{3,12}$/)==null){
               $("#info").html("账号信息不正确！");
              return false;
          }else{
           $("#info").html("");
           return true;
          }
      }
      //检测密码
      function checkPass(){
        var pass = $("input[name='pass']").val();
        if(pass.match(/^[a-zA-Z0-9_]{5,12}$/)==null){
             $("#info").html("密码格式不正确");
            return false;
        }else{
           $("#info").html("");
           return true;
        }
      }
      //检测验证码
      function checkCode(){
        var code = $("input[name='code']").val();
        if(code.match(/^[a-zA-Z0-9]{4}$/)==null){
             $("#info").html("请填写完整验证码");
            return false;
        }
        var c;
        $.ajax({
          type : "post",
          url  : "/bishe/CLY/index.php/Admin/Public/checkVerify",
          data : "mycode="+code,
          dataType : "json",
          async: false,
          success  : function(data){
            if (data.b) {
               $("#info").html("");
               c = true;
            }else{
              $("#info").html("验证码错误");
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

    </script>
  </body>
</html>