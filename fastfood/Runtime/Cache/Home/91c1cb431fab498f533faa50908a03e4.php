<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html>    
    <head>        
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--[if lt IE 9]>
        <script src="/bishe/CLY/Public/js/html5shiv.js"></script>
        <![endif]-->
        <title>美食美客商户中心</title>     
        <link rel="stylesheet" type="text/css" href="/bishe/CLY/Public/css/normalize-css-pkg__7094b92.css" />
        <link rel="stylesheet" type="text/css" href="/bishe/CLY/Public/css/lbc-base-pkg__78af025.css" />
        <link rel="stylesheet" type="text/css" href="/bishe/CLY/Public/css/login-package__aa6cd1b.css" />
        <link rel="stylesheet" type="text/css" href="/bishe/CLY/Public/css/lbc-overlay-pkg__0fc0082.css" />
        <link rel="stylesheet" type="text/css" href="/bishe/CLY/Public/css/jquery-ui-resizable-pkg__ea1de83.css" />
        <link rel="stylesheet" type="text/css" href="/bishe/CLY/Public/css/jquery-form-validator-pkg__bb6d5f3.css" />
        <link rel="stylesheet" type="text/css" href="/bishe/CLY/Public/css/jquery-ui-pkg__7165df7.css" />
        <link rel="stylesheet" type="text/css" href="/bishe/CLY/Public/css/jquery-ui-dialog-pkg__7e24435.css" />
        <link rel="stylesheet" type="text/css" href="/bishe/CLY/Public/css/jquery-ui-pbox-pkg__a49eb26.css" />
        <link rel="stylesheet" type="text/css" href="/bishe/CLY/Public/css/lbc-datatables-pkg__0603c0d.css" />
        <link rel="stylesheet" type="text/css" href="/bishe/CLY/Public/css/lbc-tooltip-pkg__e2a69df.css" />
        <link rel="stylesheet" type="text/css" href="/bishe/CLY/Public/css/lbc-select2-pkg__bdb004c.css" />
        <link rel="stylesheet" type="text/css" href="/bishe/CLY/Public/css/lbc-tabs-pkg__209ca68.css" />
        <link rel="stylesheet" type="text/css" href="/bishe/CLY/Public/css/jquery-ui-datepicker-pkg__dc5cf96.css" />
        <link rel="stylesheet" type="text/css" href="/bishe/CLY/Public/css/lbc-datepicker-pkg__eb47669.css" />
        <link rel="stylesheet" type="text/css" href="/bishe/CLY/Public/css/jquery-ui-daterange-pkg__f235954.css" />
        <link rel="stylesheet" type="text/css" href="/bishe/CLY/Public/css/lbc-page-pkg__4fc5da8.css" />
        <link rel="stylesheet" type="text/css" href="/bishe/CLY/Public/css/lbc-webuploader-pkg__7eaf0fa.css" />
        <link rel="stylesheet" type="text/css" href="/bishe/CLY/Public/css/webuploader-pkg__2e740e2.css" />
        <link rel="stylesheet" type="text/css" href="/bishe/CLY/Public/css/lbc-frame-pkg__1ae4ecc.css" />
        <link rel="stylesheet" type="text/css" href="/bishe/CLY/Public/css/lbc-slide-pkg__433605f.css" />
        <link rel="stylesheet" type="text/css" href="/bishe/CLY/Public/css/lbc-verification-code-pkg__5dfacfb.css" />
    </head>    
     <body>
        <!-- DP监控 -->
        <!-- <script> alog('speed.set', 'ht', +new Date); </script> -->
        <header class="header-box-background">
            <section class="header-box">
                <hgroup class="logo-box">
                    <div class="nuomi-logo"><a href="/"></a></div>
                    <h2 class="merchant-logo"><a href="/">商户版</a></h2>
                </hgroup>
            </section>
        </header>
        <!--[if lt IE 9]>
        <section class="login-content-box ielt9">
        <![endif]-->
        <!--[if gte IE 9]><section class="login-content-box"><![endif]-->
        <!--[if !IE]><!-->
        <section class="login-content-box">

            <div class="left-shadow"></div>
            <div class="right-shadow"></div>
            <!--<![endif]-->
           <div class="add-area">
             <div class="item active">
                <a href="#">
                    <img src="/bishe/CLY/Public/images/ad4__cd7bfed.jpg" id="login-ad1">
                </a>
             </div>          
            </div> 
            <div class="login-box">
                <!--[if lte IE 7]>
                <div class="browser-tip">您使用的浏览器版本过低， 2015年11月1日起，百度糯米不再支持IE7及以下版本，请升级您的浏览器。<br >
                    推荐使用
                    <a style="margin-right: 5px;" href="http://liulanqi.baidu.com" target="_blank">百度浏览器</a>
                    <a href="http://www.firefox.com.cn" target="_blank">火狐浏览器</a></div>
                <![endif]-->
                <div id="login" class="login-area">
                    <ul class="login-tab">
                        <li>
                            <a class="cur login-tab-head " href="#login-acccount" id="tabzhanghao">账号登录</a>
                        </li>
                        <li>
                            <!-- <a class="login-tab-head" href="#login-phone" id="tabphone">手机号登录</a> -->
                        </li>
                    </ul>
                    <!-- 账号登录 -->
                    <div id="login-acccount" class="login-tab-cnt uc-common-login">
                       
                        <div id="common-login" class="login uc-common-login-small new-account-login" >
                            <div class="login-shadow"></div>
                            <span class="watermark"></span>
                            <!-- 用户名、手机号、邮箱登录 -->
                            <form id="uc-login"  action="/bishe/CLY/index.php/Home/Public/doLogin/s/shop" method="post" onsubmit="return doSubmit()" >
                                <div class="login-info">
                                    <p id="login-error" class="error">
                                         <span  id="info" <?php if($info!=''): ?>style="display:block"<?php else: ?>style="display:none"<?php endif; ?>><?php echo ($info); ?></span>
                                    </p>
                                    <div class="account">
                                        <span></span>
                                        <label class="input-label name-pwd-label">用户名</label>
                                        <input type="text" id="uc-common-account" name="username" autocomplete="off" placeholder="手机/邮箱/用户名" tabindex="1" maxlength="100">
                                    </div>
                                    <p id="account-error" class="error"></p>
                                    <div class="password">
                                        <span></span>
                                        <div id="uc-safe-pwd-input" class="safe-input">
                                            <label class="input-label name-pwd-label">密码</label>
                                            <input name="pass" id="ucsl-password-edit" type="password" autocomplete="off" placeholder="密码" tabindex="2" style="box-sizing:border-box;width:100%;height:100%;padding-left:0; ">
                                        </div>
                                    </div>
                                    <p id="password-error" class="error"></p>
                                    <div class="token new-token">
                                    </div>
                                    <p id="token-error" class="error"></p>
                                </div>
                                <div class="login-action">
                                    <div id="is-auto-login-container" class="is-auto-login">
                                        <label for="is-auto-login" style="display: none;">30天内免登录</label>
                                        <label class="checkbox">
                                        <input id="is-auto-login" name="isAutoLogin" type="checkbox" checked="" value="1">
                                            <span class="icon"></span> 记住账户
                                        </label>
                                        <div class="fr">
                                            <a href="/mct/findPwd/index?page=true" target="_blank">忘记密码</a>
                                        </div>
                                    </div>
                                    <input id="submit-form" class="submit" type="submit" value="登  录">
                                    <div class="other">
                                        <div class="fl">
                                            <div class="protocol">
                                                <a href="/login/protocol" target="_blank">同意并接受商户协议</a>
                                            </div>
                                        </div>
                                        <div class="fr">
                                            <a href="/bishe/CLY/index.php/Home/Public/sregister" target="_blank">免费入驻</a>
                                        </div>
                                    </div>
                                </div>
                            </form>                                                
                        </div>
                    </div>
                    <div id="login-phone" class="login-tab-cnt" style="display: none;">
                        <form class="login-phone-form">
                            <p class="error-phone error"></p>
                            <div class="phone-account">
                                <span></span>
                                <label class="input-label name-pwd-label">手机号</label>
                                <input id="phone-number" type="text" placeholder="手机号" maxlength="11">
                            </div>
                            <p class="error-img-verify-code error"></p>
                            <div class="img-verify-code">
                                <label class="input-label ">验证码</label>
                                <input class="img-verify-code-input" type="text" placeholder="验证码" maxlength="4">
                                <img class="verify-img" src="" />
                            </div>
                            <p class="error-verify-code error"></p>
                            <div class="phone-code">
                                <label class="input-label ">输入短信验证码</label>
                                <input class="verify-code" type="text" placeholder="输入短信验证码" maxlength="6">
                                <input class="verify-btn" type="button" value="获取验证码" loadType="button">
                            </div>
                            <div class="login-link" style="margin-bottom: 15px;">
                                <div class="fl">
                                    <label class="checkbox"><input id="is-auto-login-phone" name="isAutoLogin" type="checkbox" checked="" value="1">
                                        <span class="icon"></span> 记住账户
                                    </label>
                                </div>
                                <div class="fr" style="margin-top: 5px;">
                                    <a href="/mct/findPwd/index?page=true" target="_blank">忘记密码</a>
                                </div>
                            </div>
                            <button class="submit-btn-phone">登  录</button>
                            <div class="login-link">
                                <div class="fl">
                                    <a href="/login/protocol" target="_blank">同意并接受商户协议</a>
                                </div>
                                <div class="fr">
                                    <a href="/bishe/CLY/index.php/Home/Public/sregister" target="_blank">免费入驻</a>
                                </div>
                            </div>
                        </form>
                      <!--  
                        <div style="position: absolute; left: -1px; bottom: -1px; z-index: 0; width: 0px; height: 0px; overflow: hidden; visibility: hidden; display: ;">
                            <iframe name="phone_iframe" src="/bishe/CLY/Public/html/v3Jump.html" style="width: 0px; height: 0px; visibility: hidden; display: none;"></iframe>
                        </div>
                        <div style="position: absolute; left: -1px; bottom: -1px; z-index: 0; width: 0px; height: 0px; overflow: hidden; visibility: hidden; display: ;">
                            <iframe name="uc-login-iframe" src="/bishe/CLY/Public/html/v3Jump.html" style="width: 0px; height: 0px; visibility: hidden; display: none;"></iframe>
                        </div> -->
                    </div>
                </div>
            </div>
        </section>

        <footer class="footer-box-background">
            <div class="footer-bd">
                <ul class="footer-help">
                    <li>
                        <a class="first" href="javascript:void(0);">
                            <h4>电话验证</h4>
                            <span>400-028-0088</span>
                        </a>
                    </li>
                    <li class="divide"></li>
                    <li>
                        <a class="second" href="javascript:void(0);">
                            <h4>商家咨询( 9:00-22:00 )</h4>
                            <span>4006-028-111</span>
                        </a>
                    </li>
                    <li class="divide"></li>
                    <li>
                        <a class="third" href="javascript:void(0);">
                            <h4>商家入驻热线( 9:00-18:00 )</h4>
                            <span>4009-208-258</span>
                        </a>
                    </li>
                    <li class="divide"></li>
                    <li>
                        <a class="last" href="javascript:void(0);">
                            <h4>廉政邮箱</h4>
                            <span>BDNM_jiancha@baidu.com</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="footer-ft">
                <p class="link">
                    <a href="http://www.nuomi.com/about" target="_blank">关于糯米</a>
                    <b>|</b>
                    <a href="http://www.nuomi.com/intention" target="_blank">市场合作</a>
                    <b>|</b>
                    <a href="http://b.nuomi.com" target="_blank">商家后台手机版</a>
                    <b>|</b>
                    <a href="http://help.nuomi.com/commonQuestion.html" target="_blank">常见问题</a>
                </p>

                <p class="copyright">
                    <span title="SJSWT39-170.opi.com">&copy;</span>2015 nuomi.com
                    <a href="http://www.miitbeian.gov.cn" target="_blank">京ICP证060807号 </a> 京公网安备110105006181号
                    <a href="http://s0.nuomi.bdimg.com/img/license.jpg" target="_blank">工商注册号110108009499245</a>
                </p>
            </div>
        </footer>

        <div class="" id="account-info-dialog" style="display: none;">
    <div class="alert alert-warning" role="alert">此手机号绑定多个账号，请选择账号登录</div>
    <div class="account-info-list">

    </div>
</div>
<div class="" id="ztc-info-dialog" style="display: none;">
    <div class="account-info-list">

    </div>
</div>        
    <div id="unbind-account-dialog" style="display: none;">
    <h3>手机号暂未绑定任何账号，不能直接登录</h3>
    <button class="btn btn-major-min bind-account" type="button">绑定已有账号</button>
    <button class="btn btn-major-min register" type="button">去注册</button>
</div>
        <script type="text/javascript">
            $("#tabzhanghao").click(function(){
                $("#login-phone").hide();
                $("#uc-login").show();
            });
           $("#tabphone").click(function(){
                $("#uc-login").hide();
                $("#login-phone").show();
            });
        </script>
        <script type="text/javascript" src="/bishe/CLY/Public/js/api.js"></script>
        
        <!-- DP监控 -->
         <!--    <script type="text/javascript" src="/bishe/CLY/Public/js/mod.js"></script>
            <script type="text/javascript" src="/bishe/CLY/Public/js/jquery-pkg__bcf640a.js"></script>
            <script type="text/javascript" src="/bishe/CLY/Public/js/declare-pkg__c9e7107.js"></script>
            <script type="text/javascript" src="/bishe/CLY/Public/js/aop-pkg__864c9ee.js"></script>
            <script type="text/javascript" src="/bishe/CLY/Public/js/underscore-pkg__435c231.js"></script>
            <script type="text/javascript" src="/bishe/CLY/Public/js/jquery-ui-pkg__9386d6b.js"></script>
            <script type="text/javascript" src="/bishe/CLY/Public/js/lbc-overlay-pkg__a7b394b.js"></script>
            <script type="text/javascript" src="/bishe/CLY/Public/js/lbc-base-pkg__3d0a17e.js"></script><script type="text/javascript" src="/bishe/CLY/Public/js/util-pkg__11eb6fa.js"></script>
            <script type="text/javascript" src="/bishe/CLY/Public/js/jquery-ui-mouse-pkg__fc7f69f.js"></script>
            <script type="text/javascript" src="/bishe/CLY/Public/js/jquery-ui-sortable-pkg__67dc899.js"></script><script type="text/javascript" src="/bishe/CLY/Public/js/jquery-ui-draggable-pkg__5bf9c6f.js"></script><script type="text/javascript" src="/bishe/CLY/Public/js/jquery-ui-droppable-pkg__f2ae9c3.js"></script><script type="text/javascript" src="/bishe/CLY/Public/js/jquery-ui-position-pkg__032ebfd.js"></script><script type="text/javascript" src="/bishe/CLY/Public/js/jquery-ui-resizable-pkg__fa002e8.js"></script><script type="text/javascript" src="/bishe/CLY/Public/js/jquery-form-validator-pkg__e936fb6.js"></script><script type="text/javascript" src="/bishe/CLY/Public/js/jquery-ui-dialog-pkg__f83f512.js"></script><script type="text/javascript" src="/bishe/CLY/Public/js/jquery-ui-pbox-pkg__2c623c6.js"></script><script type="text/javascript" src="/bishe/CLY/Public/js/jquery-migrate-pkg__ac0bc84.js"></script><script type="text/javascript" src="/bishe/CLY/Public/js/jquery-grouptoggle-pkg__cf8fe23.js"></script><script type="text/javascript" src="/bishe/CLY/Public/js/lbc-datatables-pkg__cf8f457.js"></script><script type="text/javascript" src="/bishe/CLY/Public/js/lbc-tooltip-pkg__0792ee1.js"></script><script type="text/javascript" src="/bishe/CLY/Public/js/lbc-select2-pkg__f801ac4.js"></script><script type="text/javascript" src="/bishe/CLY/Public/js/lbc-tabs-pkg__ec0971f.js"></script><script type="text/javascript" src="/bishe/CLY/Public/js/lbc-iajax-pkg__2305cd3.js"></script><script type="text/javascript" src="/bishe/CLY/Public/js/jquery-ui-datepicker-pkg__0576237.js"></script><script type="text/javascript" src="/bishe/CLY/Public/js/lbc-datepicker-pkg__352eae7.js"></script><script type="text/javascript" src="/bishe/CLY/Public/js/moment-pkg__284e975.js"></script><script type="text/javascript" src="/bishe/CLY/Public/js/jquery-ui-daterange-pkg__020b146.js"></script><script type="text/javascript" src="/bishe/CLY/Public/js/lbc-page-pkg__d4b5bf1.js"></script><script type="text/javascript" src="/bishe/CLY/Public/js/webuploader-pkg__6a5c571.js"></script><script type="text/javascript" src="/bishe/CLY/Public/js/lbc-webuploader-pkg__936b426.js"></script><script type="text/javascript" src="/bishe/CLY/Public/js/dp-monitor-pkg__73ef697.js"></script><script type="text/javascript" src="/bishe/CLY/Public/js/backbone-pkg__279fdd2.js"></script><script type="text/javascript" src="/bishe/CLY/Public/js/json2-pkg__1b1079e.js"></script><script type="text/javascript" src="/bishe/CLY/Public/js/store-pkg__eeda214.js"></script><script type="text/javascript" src="/bishe/CLY/Public/js/blog-pkg__6a336c0.js"></script><script type="text/javascript" src="/bishe/CLY/Public/js/libcomet-pkg__523ebc7.js"></script><script type="text/javascript" src="/bishe/CLY/Public/js/lbc-frame-pkg__2d8597f.js"></script><script type="text/javascript" src="/bishe/CLY/Public/js/lbc-slide-pkg__41715fb.js"></script><script type="text/javascript" src="/bishe/CLY/Public/js/jquery-cookie-pkg__eee1508.js"></script><script type="text/javascript" src="/bishe/CLY/Public/js/lbc-verification-code-pkg__f85fa12.js"></script> -->
            <!-- <script type="text/javascript" src="/bishe/CLY/Public/js/login-package__14cb4d7.js"></script> -->
          
            <script type="text/javascript">;
                // window.$ = $ = require('component:components/jquery/jquery.js');
                    ;require("login:static/js/newLogin.js").init();
                    // ;var $ = require('component:components/jquery/jquery.js');
                    // $(function(){
                    // alog('speed.set', 'drt', +new Date);
                    // }
                // );
            </script>

</body>     
</html> <!--34249174500426952458030109-->
<!-- <script> var _trace_page_logid = 3424917450; </script> -->