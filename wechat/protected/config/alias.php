<?php
/**
 * 别名 常量定义文件
 * 路径文件皆为物理地址

 */
$baseDir = dirname(__FILE__);
$uploads = $baseDir.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..';  
$siteUrl='http://ltwxtest.mynatapp.cc/cxg';
define('LINK', 'ltwxtest.mynatapp.cc/cxg/index-test.php');  
//$siteUrl='http://localhost/cxg';
define('UPLOAD_PATH', $uploads.'/uploads');                              
define('STATICS', $siteUrl.'/statics');		//网站静态文件路径 css js images  
define('HASH', 'wangqingchen');		//表单令牌加密字符串
define('APPID','wx5070e4bae04cf7c8');
define('APPSECRET','180565f1522e0c62b822ec8af55b2726');
define('STATICS_IMG','http://192.168.100.102:5678/Portal/');
define('API','http://192.168.100.102:6085/api/');
define('HOST','192.168.100.102');
define('HOST_USERNAME','file');
define('HOST_PASSWORD','geodept3');
define('NAME','xx');
define('WECHATTYPE','userinfo');
define('RURL','http%3a%2f%2fltwxtest.mynatapp.cc%2fcxg%2findex.php%3fr%3dopenid%2fopenids');

  
