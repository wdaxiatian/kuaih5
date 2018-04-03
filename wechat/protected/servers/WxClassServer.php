<?php
//根据消息类型进行分类处理
class WxClassServer extends ServerBase{
	
	public $_data='';
	
	public function __construct($data)
	{
		$this->_data = $data;
	}
	
	public function run(){
		$Rx_Type = trim($this->_data['MsgType']); 
		//$send = new WxSendServer(array('type'=>'text','str'=>$Rx_Type)); 
		//$send->run();
		//判断消息类型(没有认证无法发送图片)
		switch($Rx_Type)
		{
			case "text":
				//$Msg = new WxMsgServer($this->_data);
				//$Msg->run();
				break;
			case "image":
				//$Msg = new WxMsgServer($this->_data);
				//$Msg->run();
				break;
			case "voice":
				//$Msg = new WxMsgServer($this->_data);
				//$Msg->run();
				break;
			case "video":
				//$Msg = new WxMsgServer($this->_data);
				//$Msg->run();
				break;
			case "location":
				//$Msg = new WxMsgServer($this->_data);
				//$Msg->run();
				break;
			case "link":
				//$Msg = new WxMsgServer($this->_data);
				//$Msg->run();
				break;
				//事件推送接口
			case "event":
				$event = new WxEventServer($this->_data);
				$event->run();
				break;
			default:
				echo "Unknow msg type: ".$Rx_Type;
				break;
		}
		
	}
	
	
}