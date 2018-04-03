<?php
/**
 * 公共接口类
 */
require_once 'HttpClient.class.php';
require_once 'SendSmsByDlsw.php';
class CommonInterface extends InterfaceBase
{
	//给手机发短信
	 public static function sendMsg($username,$password,$content,$phone){
		$rs = dlswSdk::sendSms($username,$password,$content,$phone);
		if($rs == '000000'){
			return array('code'=>'000000','msg'=>'发送成功');
		}else{
			return array('code'=>'100000','msg'=>'发送失败');
		}
		
	 }
	
}


?> 
