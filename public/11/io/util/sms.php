<?php
define("ADMIN_PHONE","18988829020,");
define("SMS_USER","jonver");
define("SMS_KEY","C1E6D4DFE5AD6553D9255EC243CBECFE");

define("SMS2_USER","wljclub");
define("SMS2_KEY","ec831a6d19934498f90e44f516864e78");

define("SMS3_APPKEY","23375833");
define("SMS3_APPSecret","eb26b0e0aba57e40ad65e729ae67c06f");

function SendSMS($phone,$content)
{
	
	//$content=iconv("utf-8","gb2312",$content);
	$content=urlencode($content);
	//$url="http://sms.webchinese.cn/web_api/?Uid=".constant("SMS_USER")."&Key=".constant("SMS_KEY")."&smsMob=".$phone."&smsText=".$content;
	$url="http://utf8.sms.webchinese.cn/?Uid=".constant("SMS_USER")."&KeyMD5=".strtoupper(constant("SMS_KEY"))."&smsMob=".$phone."&smsText=".$content;
	
	//echo $url."<br/>";
	if(function_exists('file_get_contents'))
	{
		$file_contents = file_get_contents($url);
	}
	else
	{
		$ch = curl_init();
		$timeout = 5;
		curl_setopt ($ch, CURLOPT_URL, $url);
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
		$file_contents = curl_exec($ch);
		curl_close($ch);
	}
	return $file_contents;
}
//echo SendSMS(constant("ADMIN_PHONE"),"绿深态杏花鸡订单");

function SendSMSLianZongApi($phone,$content)
{
	
	$content=iconv("utf-8","gb2312",$content);
	$content=urlencode($content);
	$url="http://58.83.147.92:8080/qxt/smssenderv2";
	//$url="http://58.83.148.102:8080/qxt/smssenderv2";
	$param="?user=".constant("SMS2_USER")."&password=".constant("SMS2_KEY")."&tele=".$phone."&msg=".urlencode($content)."&extno=1";

	$postparam="user=".constant("SMS2_USER")."&password=".constant("SMS2_KEY")."&tele=".$phone."&msg=".$content."&extno=1";
	//echo file_get_contents($url.$param);
	//return;
	$fields = array(
		'user' => constant("SMS2_USER"),
		'password' => constant("SMS2_KEY"),
		'tele' => $phone,
		'msg' => $content,
		'extno' => ''
	);
	//foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
	//rtrim($fields_string, '&');
	
	$ch = curl_init();
	$timeout = 10;
	curl_setopt ($ch, CURLOPT_URL, $url);
	curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt ($ch, CURLOPT_POST, 1);
	curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
	curl_setopt ($ch, CURLOPT_POSTFIELDS, $postparam);
	$file_contents = curl_exec($ch);
	curl_close($ch);
	$file_contents = iconv("gb2312","utf-8",$file_contents);
	return $file_contents;
}
function SendSMSAli($phone,$content)
{
	//$content=iconv("utf-8","gb2312",$content);
	//$content=urlencode($content);
	$url="http://gw.api.taobao.com/router/rest";
	$fields = array(
		'app_key' => constant("SMS3_APPKEY"),
		'app_secret' => constant("SMS3_APPSecret"),
		'method' => "alibaba.aliqin.fc.sms.num.send",
		'format' => "json",
		'v' => "2.0",
//-d 'sign=44D75C2A9BB9B4FE8B069D988C469551' \
//-d 'sign_method=hmac' \
//-d 'timestamp=2016-06-22+23%3A02%3A47' \
		
		'sms_type' => "normal",
		'sms_free_sign_name' => urlencode("王老吉"),
		'sms_template_code' => 'SMS_11010004',
		'rec_num' => $phone,
		'sms_param' => json_encode($content)
	);
	foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
	rtrim($fields_string, '&');
	
	$ch = curl_init();
	$timeout = 10;
	curl_setopt ($ch, CURLOPT_URL, $url);
	curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt ($ch, CURLOPT_POST, 1);
	curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
	curl_setopt ($ch, CURLOPT_POSTFIELDS, $fields_string);
	$file_contents = curl_exec($ch);
	curl_close($ch);
	
	return $file_contents;
}
?>