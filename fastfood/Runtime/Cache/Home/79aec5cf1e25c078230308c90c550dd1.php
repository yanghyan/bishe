<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link type="text/css" rel="stylesheet" href="/bishe/CLY/Public/shop/css/style.css" /> 
    <script type="text/javascript" src="/bishe/CLY/Public/shop/js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="/bishe/CLY/Public/shop/js/menu.js"></script>    
	<script type="text/javascript" src="/bishe/CLY/Public/shop/js/select.js"></script>
<title>美食美客商户中心</title>
</head>
<body>  
<!--Begin Header Begin-->
<div class="soubg">
	<div class="sou">
    	
        <span class="fr">
        	<span class="fl">你好，<?php echo ($_SESSION['shopuser']['username']); ?>
                    <!-- <a href="/bishe/CLY/index.php/Home/Public/index" mon="element=login">登录</a> -->

                  <!-- <a href="/bishe/CLY/index.php/Home/Public/sRegister" style="color:#FF5C89">注册</a>&nbsp; -->
                  |&nbsp;<a href="#">我的订单</a>&nbsp;|</span>
        	<span class="ss">
            	<!-- <div class="ss_list">
                	<a href="#">收藏夹</a>
                    <div class="ss_list_bg">
                    	<div class="s_city_t"></div>
                        <div class="ss_list_c">
                        	<ul>
                            	<li><a href="#">我的收藏夹</a></li>
                                <li><a href="#">我的收藏夹</a></li>
                            </ul>
                        </div>
                    </div>     
                </div> -->
                <div class="ss_list">
                	<a href="#">客户服务</a>
                    <div class="ss_list_bg">
                    	<div class="s_city_t"></div>
                        <div class="ss_list_c">
                        	<ul>
                            	<li><a href="#">客户服务</a></li>
                                <li><a href="#">客户服务</a></li>
                                <li><a href="#">客户服务</a></li>
                            </ul>
                        </div>
                    </div>    
                </div>
                <div class="ss_list">
                	<a href="#">网站导航</a>
                    <div class="ss_list_bg">
                    	<div class="s_city_t"></div>
                        <div class="ss_list_c">
                        	<ul>
                            	<li><a href="#">网站导航</a></li>
                                <li><a href="#">网站导航</a></li>
                            </ul>
                        </div>
                    </div>    
                </div>
            </span>
            
        </span>
    </div>
</div> 
<div class="m_top_bg" style="background-color:#FF5C89">
    <div class="top" >
        <div class="m_logo"><img src="/bishe/CLY/Public/shop/images/logo.png"/></div>
        <div class="m_search">
            <form>
                <input type="text" value="" class="m_ipt" />
                <input type="submit" value="搜索" class="m_btn" />
            </form>                      
        </div>
    </div>
</div>
<!--End Header End--> 
<div class="i_bg bg_color">
    <!--Begin 用户中心 Begin -->
	<div class="m_content">
   		<div class="m_left">
            <div class="left_m">
            	<div class="left_n" style="background-color:#FF5C89" onclick="doshow(1)">菜单管理</div>
                <ul id="u1">
                	<li><a href="/bishe/CLY/index.php/Home/Seller/showMenu">查看菜单</a></li>
                    <li><a href="/bishe/CLY/index.php/Home/Seller/addMenu">添加菜单</a></li>
                </ul>
            </div>
            <div class="left_m">
            	<div class="left_n" style="background-color:#FF5C89" onclick="doshow(2)">店铺管理</div>
                <ul id="u2">
                	<li><a href="/bishe/CLY/index.php/Home/Seller/showMember">本店会员</a></li> 
                    <li><a href="/bishe/CLY/index.php/Home/Seller/showComment">所有评价</a></li>    
                    <li><a href="/bishe/CLY/index.php/Home/Seller/showOrder">本店订单</a></li>  
                </ul>
            </div>
        
        </div>
		<div class="m_right">
            
          <div class="mem_t">添加菜单</div>
          <form action="insertMenu" method="post" enctype="multipart/form-data">
            <table border="0" style="width:390px; font-size:14px; margin-top:30px;" cellspacing="0" cellpadding="0" >
              <input type="hidden" name="sid" value="<?php echo ($sid); ?>">
              <tr height="70">
                <td>菜&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;名</td>
                <td><input type="text" value="" class="l_put" name="menu" /></td>
              </tr>
              <tr height="70">
                <td>单&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;价</td>
                <td><input type="text" value="" class="l_put" name="price" /></td>
              </tr>
              <tr height="70">
                <td>所属类别</td>
                <td>
                  <select name="label_id" class="l_select">
                    <option value="">----请选择----</option>
                    <?php if(is_array($kind)): foreach($kind as $key=>$k): ?><option value="<?php echo ($k["id"]); ?>"><?php echo ($k["tag"]); ?></option><?php endforeach; endif; ?>
                  </select>
                </td>
              </tr>
             
              <tr height="70">
                <td>图&nbsp;片</td>
                <td>
                 <div id="previewDoor">
                    <img id="imgheadDoor" border="0" src="/bishe/CLY/Public/images/photo_icon.png" width="90" height="90" onclick="$('#previewImgDoor').click();">
                   </div>         
                    <input type="file" onchange="previewImage(this,'Door')" style="display: none;" id="previewImgDoor" name="menu_pic">
               </td>
              </tr>
              <tr height="60">
                <td>&nbsp;</td>
                <td><input type="submit" value="添加" class="log_btn" /></td>
              </tr>
            </table>
            </form>  

        </div>
    </div>
	<!--End 用户中心 End--> 
    <!--Begin Footer Begin -->
    <div class="b_nav">
    	<dl>                                                                                            
        	<dt><a href="#">新手上路</a></dt>
            <dd><a href="#">售后流程</a></dd>
            <dd><a href="#">购物流程</a></dd>
            <dd><a href="#">订购方式</a></dd>
            <dd><a href="#">隐私声明</a></dd>
            <dd><a href="#">推荐分享说明</a></dd>
        </dl>
        <dl>
        	<dt><a href="#">配送与支付</a></dt>
            <dd><a href="#">货到付款区域</a></dd>
            <dd><a href="#">配送支付查询</a></dd>
            <dd><a href="#">支付方式说明</a></dd>
        </dl>
        <dl>
        	<dt><a href="#">会员中心</a></dt>
            <dd><a href="#">资金管理</a></dd>
            <dd><a href="#">我的收藏</a></dd>
            <dd><a href="#">我的订单</a></dd>
        </dl>
        <dl>
        	<dt><a href="#">服务保证</a></dt>
            <dd><a href="#">退换货原则</a></dd>
            <dd><a href="#">售后服务保证</a></dd>
            <dd><a href="#">产品质量保证</a></dd>
        </dl>
        <dl>
        	<dt><a href="#">联系我们</a></dt>
            <dd><a href="#">网站故障报告</a></dd>
            <dd><a href="#">购物咨询</a></dd>
            <dd><a href="#">投诉与建议</a></dd>
        </dl>
        <div class="b_tel_bg">
        	<a href="#" class="b_sh1">新浪微博</a>            
        	<a href="#" class="b_sh2">腾讯微博</a>
            <p>
            服务热线：<br />
            <span style="color:#FF5C89">183-000-3282</span>
            </p>
        </div>
        <div class="b_er">
            <div class="b_er_c"><img src="/bishe/CLY/Public/shop/images/weixin.jpg" width="118" height="118" /></div>
            <img src="/bishe/CLY/Public/shop/images/ss.png" />
        </div>
    </div>    
    <div class="btmbg">
		<div class="btm">
        	备案/许可证编号：晋ICP备12009302号-1-www.msmk.com   Copyright © 2016-2017 美食美客 All Rights Reserved. 复制必究 , Technical Support: msmk Group <br />
            <img src="/bishe/CLY/Public/shop/images/b_1.gif" width="98" height="33" /><img src="/bishe/CLY/Public/shop/images/b_2.gif" width="98" height="33" /><img src="/bishe/CLY/Public/shop/images/b_3.gif" width="98" height="33" /><img src="/bishe/CLY/Public/shop/images/b_4.gif" width="98" height="33" /><img src="/bishe/CLY/Public/shop/images/b_5.gif" width="98" height="33" /><img src="/bishe/CLY/Public/shop/images/b_6.gif" width="98" height="33" />
        </div>    	
    </div>
    <!--End Footer End -->    
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
    <script src="/bishe/CLY/Public/Admin/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    
    
    <script type="text/javascript">
               //图片上传预览    IE是用了滤镜。
        function previewImage(file,name)
        {
          var MAXWIDTH  = 90; 
          var MAXHEIGHT = 90;
          var div = document.getElementById('preview'+name);
          if (file.files && file.files[0])
          {
              div.innerHTML ='<img id=imghead'+name+'  onclick=$("#previewImg'+name+'").click()>';
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
            div.innerHTML = '<img id=imghead'+name+'>';
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