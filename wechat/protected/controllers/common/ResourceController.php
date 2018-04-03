<?php
//公共资源类

class ResourceController extends BaseController
{
	//获取图片或者声音保存到服务器
	public function actionRes(){ 
		$cb = !empty($_REQUEST['cb'])?$_REQUEST['cb']:'';
		$mid  = !empty($_REQUEST['mid'])?$_REQUEST['mid']:'';
		$dir = !empty($_REQUEST['dir'])?$_REQUEST['dir']:'video';
		$accesstoken  = !empty($_REQUEST['accesstoken'])?$_REQUEST['accesstoken']:'';
		$type  = !empty($_REQUEST['type'])?$_REQUEST['type']:'';
		if(empty($mid) || empty($accesstoken) || empty($type)){
			$restul['code'] = 100005;
			$restul['msg'] = '数据不能为空';
			$this->alert($restul,$cb);
		}
		//创建文件夹
		$h5 ="/web/www/h5/uploads/$dir/";
		$h5s = "/web/www/h5s/uploads/$dir/";
		$dir_h5 = Tools::createDir($h5);
		$dir_h5s = Tools::createDir($h5s);
		//检查文件夹存不存在
		if(!$dir_h5 && !$dir_h5s){
			$restul['code'] = 100003;
			$restul['msg'] = '创建文件夹失败';
			$this->alert($restul,$cb);
		}
		if($type=='img'){
			$a = $this->media($accesstoken,$mid);
			$path_name = time().rand(100001,999999).'.jpg'; 
			@file_put_contents("$h5$path_name",$a);
			@file_put_contents("$h5s$path_name",$a);
			if(file_exists("$h5$path_name") && file_exists("$h5s$path_name")){
				$result['code'] = 0;
				$result['msg'] = '添加成功';
				$result['img'] = "/uploads/$dir/".$path_name;
				$this->alert($result,$cb);
			}else{
				$restul['code'] = 100002;
				$restul['msg'] = '提交失败';
				$this->alert($restul,$cb);
			}
		}elseif($type=='video'){
			$a = $this->media($accesstoken,$mid);
			$path_name = time().rand(100001,999999); 
			@file_put_contents($h5.$path_name.'.amr',$a);
			$strh5 = "ffmpeg -i $h5$path_name.amr -ar 24000 -ab 96 -ac 2 $h5$path_name.mp3";
			$strh5s = "ffmpeg -i $h5$path_name.amr -ar 24000 -ab 96 -ac 2 $h5s$path_name.mp3"; 
			system($strh5);
			system($strh5s);
			if(file_exists("$h5$path_name.mp3") && file_exists("$h5s$path_name.mp3")){
				$restul['code'] = 0;
				$restul['msg'] = '添加成功';
				$restul['video'] = "/uploads/$dir/$path_name.mp3";
				$this->alert($restul,$cb);
			}else{
				$restul['code'] = 100002;
				$restul['msg'] = '提交失败';
				$this->alert($restul,$cb);
			}
		}else{
			$restul['code'] = 100004;
			$restul['msg'] = '类型错误';
			$this->alert($restul,$cb);
		}
	
	
	}
	//微信资源下载接口
	public function media($accesstoken,$mid){
		$url = "http://file.api.weixin.qq.com/cgi-bin/media/get?access_token=$accesstoken&media_id=$mid";
		$ch=curl_init();
		curl_setopt($ch,CURLOPT_URL,$url);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		$res=curl_exec($ch);
		return $res;
	}
	
	
	//获取传递过来的数据，生成小图片
	public function actionIcon(){
		$cb = !empty($_REQUEST['cb'])?$_REQUEST['cb']:'';
		$icon  = !empty($_REQUEST['icon'])?$_REQUEST['icon']:'';
		$name  = !empty($_REQUEST['name'])?$_REQUEST['name']:'';
		$dir  = !empty($_REQUEST['dir'])?$_REQUEST['dir']:'icon';
		$status = !empty($_REQUEST['status'])?$_REQUEST['status']:'';
		if(empty($icon)){
			$restul['code'] = 100005;
			$restul['msg'] = '数据不能为空';
			$this->alert($restul,$cb);
		}
		//创建文件夹
		$h5 ="/web/www/h5/uploads/$dir/";
		$dir_h5 = Tools::createDir($h5);
		//检查文件夹存不存在
		if(!$dir_h5){
			$restul['code'] = 100003;
			$restul['msg'] = '创建文件夹失败';
			$this->alert($restul,$cb);
		}
		if($status==0){
			$path_name = 'c'.time().rand(100001,999999).'.jpg';
			$icon = substr(strstr($icon,','),1);
			@file_put_contents("$h5$path_name",$icon);
			$result['code'] = 0;
			$result['msg'] = '查询成功';
			$result['result'] = "/uploads/$dir/$path_name";
			$result['name'] = $path_name;
			$this->alert($result,$cb);
		}elseif($status==1){
			@file_put_contents("$h5$name",$icon,FILE_APPEND);
			$result['code'] = 0;
			$result['msg'] = '查询成功';
			$result['result'] = "/uploads/$dir/$name";
			$result['name'] = $name;
			$this->alert($result,$cb);
		}elseif($status==2){
			@file_put_contents("$h5$name",$icon,FILE_APPEND);
			$a = file_get_contents("$h5$name");
			$img = base64_decode($a);
			@file_put_contents("$h5$name",$img);
			$result['code'] = 0;
			$result['msg'] = '查询成功';
			$result['result'] = "/uploads/$dir/$name";
			$result['name'] = $name;
			$this->alert($result,$cb);
		}elseif($status==3){
			$path_name = 'c'.time().rand(100001,999999).'.jpg';
			$icon = substr(strstr($icon,','),1);
			$img = base64_decode($icon);
			@file_put_contents("$h5$path_name",$img);
			$result['code'] = 0;
			$result['msg'] = '查询成功';
			$result['result'] = "/uploads/$dir/$path_name";
			$result['name'] = $path_name;
			$this->alert($result,$cb);
		}else{
			$restul['code'] = 100004;
			$restul['msg'] = '状态不能为空';
			$this->alert($restul,$cb);
		}
	}
	
}