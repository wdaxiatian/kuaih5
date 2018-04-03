<?php
//微信消息类
class WxMsgServer extends ServerBase{
	public $_data= '';
	
	public function __construct($data)
	{
		$this->_data = $data;
	}
	
	public function run()
	{
		$Rx_Type = trim($this->_data['MsgType']);
		//判断消息类型(进行发送逻辑)
		switch($Rx_Type)
		{
			case "text":
				$result = $this->text(); 
				break;
			case "image":
				$result = $this->image();
				break;
			case "voice":
				$result = $this->voice();
				break;
			case "video":
				$result = $this->video();
				break;
			case "location":
				$result = $this->location();
				break;
			case "link":
				$result = $this->link();
				break;
			default:
				echo "Unknow msg type: ".$Rx_Type;
				break;
		}
			$send = new WxSendServer($result); 
			$send->run();
	}
	
	public function text(){
		$result = array('type'=>'text','str'=>'');
		return $result;	
		
	}
	public function image(){
		$result = array('type'=>'text','str'=>'');
		return $result;	
	
	}
	public function voice(){
		$result = array('type'=>'text','str'=>'');
		return $result;	
	
	}
	public function location(){
		$result = array('type'=>'text','str'=>'');
		return $result;	
	
	}
	public function link(){
		$result = array('type'=>'text','str'=>'');
		return $result;	
	
	} 

	
}