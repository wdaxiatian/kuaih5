<?php
//微信类
class WeixinServer extends ServerBase{
	//查询列表
	public static function getwxconfiglist($params=array()){
		//$offset = ($params['page']-1)*$params['pagesize'];
		$model = new Wxconfig();
		$criteria=new CDbCriteria;
		$criteria->select ='*';
		$criteria->order ='id desc';
	    //$criteria->limit =$params['pagesize'];   //取1条数据，如果小于0，则不作处理
	   // $criteria->offset =$offset;   //两条合并起来，则表示 limit 10
		$rs = $model->findAll($criteria);
		return $rs;
	}
	//添加
	public static function wxconfigAdd($params){
		$model = new Wxconfig();
		$model->attributes = $params;
		$rs = $model->save();
		if($rs){
			return array('code'=>'000000','message'=>'添加成功');
		}else{
			return array('code'=>'100001','message'=>'添加失败');
		}
	
	}
	//修改
	public static function wxconfigEdit($id,$params){
		$rs = Wxconfig::model()->updateAll($params,'id=:id',array(':id'=>$id));
		if($rs){
			return array('code'=>'000000','message'=>'修改成功');
		}else{
			return array('code'=>'100001','message'=>'修改失败');
		}
	
	}
	
}