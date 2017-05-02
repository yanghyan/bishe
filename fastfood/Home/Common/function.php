<?php
	// 设置时区
	date_default_timezone_set('Asia/Shanghai'); 
	// 发送短信函数	
	 function sendMSM($SmsFreeSignName="CLY食客",$SmsParam,$RecNum,$SmsTemplateCode)
 	{	
 		Vendor('Alidayu.TopSdk','','.php'); 		
		$c = new TopClient;
		$c->appkey = '23460483';
		$c->secretKey = '791a469dfb046f0b2d69b3dedf757ada';
		$req = new AlibabaAliqinFcSmsNumSendRequest;
		$req->setExtend("");
		$req->setSmsType("normal");
		$req->setSmsFreeSignName($SmsFreeSignName);
		$req->setSmsParam($SmsParam);
		$req->setRecNum($RecNum);
		$req->setSmsTemplateCode($SmsTemplateCode);
		$req = $c->execute($req);
		return $req;
		// var_dump($c->execute($req));
 	}