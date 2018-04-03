<?php
//微信事件类
class WxEventServer extends ServerBase{
	
	public $_data='';
	
	public function __construct($data)
	{
		$this->_data = $data;
	}
	public function run(){ 
		$Rx_Type = trim($this->_data['Event']);
		//判断消息事件
		switch($Rx_Type)
		{
			case "subscribe":
				$result = $this->subscribe();
				break;
			case "unsubscribe":
				$result = $this->unsubscribe();
				break;
			case "SCAN":
				$result = $this->SCAN();
				break;
			case "LOCATION":
				$result = $this->LOCATION();
				break;
			case "CLICK":
				$result = $this->CLICK();
				break;
			default:
				echo  "Unknow msg type: ".$Rx_Type;
				break;
		}
			$send = new WxSendServer($result); 
			$send->run();
	}
	public function subscribe(){
		/* $model = new Rank();
		$criteria=new CDbCriteria;
		$criteria->select ='*';
		$criteria->condition = 'openid=:openid';//查询条件
		$criteria->params = array(':openid'=>$this->_data['FromUserName']);
		$rs = $model->find($criteria);
		if(!$rs){
			$params['openid'] = $this->_data['FromUserName'];
			$params['addtime'] = time();
			$model->attributes = $params;
			$rs = $model->save();
		} */
		$a = $this->_data['EventKey'];
		$a = str_replace('qrscene_','',$a);
		$result = array('type'=>'text','str'=>$a);
		return $result;	
		
	}
	public function unsubscribe(){
		$result = array('type'=>'text','str'=>'感谢你的订阅！');
		return $result;	
	
	}
	public function SCAN(){
		$a = $this->_data['EventKey'];
		$result = array('type'=>'text','str'=>$a);
		return $result;	
	
	}
	public function LOCATION(){
		$result = array('type'=>'text','str'=>'你在地球上');
		return $result;	
	
	}
	public function CLICK(){
		$res = WxUserinfoServer::userinfoMb4(array('openid'=>$this->_data['FromUserName']));
		if($res){
			if($res['status']==0 && $res['score'] !=0){
				$str = "您冰块互动的得分为$res[score],快去领奖吧！,你的领奖码为00$res[id]";
				$data['openid']=$this->_data['FromUserName'];
				$data['status'] = 1;
				$r = WxUserinfoServer::userinfoUpdateSMb4($data);
			}else{
				$str = "您冰块互动的得分为$res[score]";
			}
		}else{
			$str = "你还没有参与游戏！"; 
		}
		$result = array('type'=>'text','str'=>$str);
		return $result;	
	
	}
}