<?php
//微信发送类（所有发送消息都从这里出）
class WxSendServer extends ServerBase{
	private $_data=array();
	private $_ToUserName='';
	private $_FromUserName='';
	private $_MsgType='';
	private $_MediaId='';//媒体公共ID
	private $_Content='';//文本
	private $_PicUrl='';//图片
	private $_Format='';//语音
	private $_ThumbMediaId='';//视频
	private $_Location_X ='';//地理位置维度
	private $_Location_Y ='';//地理位置经度
	private $_Scale ='';//地图缩放大小
	private $_Label ='';//地理位置信息
	private $_Title ='';//消息标题
	private $_Description ='';//消息描述
	private $_Url ='';//消息链接
	private $contentStr ='';//发送的消息
	private $type ='';//发送消息的类型
	
	public function __construct($arr)
	{
		$this->_data = WxInterface::getMsg($GLOBALS["HTTP_RAW_POST_DATA"]);
		$this->contentStr = $arr['str'];
		$this->type = $arr['type'];
	}
	
	public function run()
	{
		if($this->_data){ echo 1;
			$this->_ToUserName = $this->_data['ToUserName'];
			$this->_FromUserName = $this->_data['FromUserName'];
			$this->_MsgType = $this->_data['MsgType'];
			$this->_MediaId = isset($this->_data['MediaId'])?trim($this->_data['MediaId']):'';
			$this->_Content = isset($this->_data['Content'])?trim($this->_data['Content']):'';
			$this->_PicUrl = isset($this->_data['PicUrl'])?trim($this->_data['PicUrl']):'';
			$this->_Format = isset($this->_data['Format'])?trim($this->_data['Format']):'';
			$this->_ThumbMediaId = isset($this->_data['ThumbMediaId'])?trim($this->_data['ThumbMediaId']):'';
			$this->_Location_X = isset($this->_data['Location_X'])?trim($this->_data['Location_X']):'';
			$this->_Location_Y = isset($this->_data['Location_Y'])?trim($this->_data['Location_Y']):'';
			$this->_Scale = isset($this->_data['Scale'])?trim($this->_data['Scale']):'';
			$this->_Label = isset($this->_data['Label'])?trim($this->_data['Label']):'';
			$this->_Title = isset($this->_data['Title'])?trim($this->_data['Title']):'';
			$this->_Description = isset($this->_data['Description'])?trim($this->_data['Description']):'';
			$this->_Url = isset($this->_data['Url'])?trim($this->_data['Url']):'';
			//执行分类发送
			$this->MsgSend();
		}else  {echo('data is empty!');exit;}
	
	}
	
	//发送
	public function MsgSend()
	{
		$msgType = $this->type;
		$fromUsername = trim($this->_FromUserName);
		$toUsername = trim($this->_ToUserName);
		$time = time();
		$textTpl = "<xml>
                    <ToUserName><![CDATA[%s]]></ToUserName>
                    <FromUserName><![CDATA[%s]]></FromUserName>
                    <CreateTime>%s</CreateTime>
                    <MsgType><![CDATA[%s]]></MsgType>
                    <Content><![CDATA[%s]]></Content>
                    <FuncFlag>0</FuncFlag>
                    </xml>";
		//动态改变消息发送
		if(empty($this->contentStr)){
			$this->contentStr = $this->MsgContent();
		}
		$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $this->contentStr);
		echo $resultStr;
	}
	
	//调用文本库修改发送内容
	public function MsgContent()
	{
		$contentcode = $this->_Content;
		//加载消息范例
		$Example = MsgContentServer::getMsglist(array('page'=>1,'pagesize'=>9999,'type'=>'addtime'));
		//匹配文本
		$contentStr = '';
		foreach($Example as $k=>$v){
			if($v['back'] == $contentcode){
				$contentStr = $v['send'];
				break;
			}
		}
		if(empty($contentStr)) $contentStr = '谢谢！';
		return $contentStr;
	
	}
	
}