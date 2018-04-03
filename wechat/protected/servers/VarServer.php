<?php
//模拟变量类

class VarServer extends ServerBase{
	
	//添加变量
	public static function VarAdd($params){
		$model = new Vars();
		$model->attributes = $params;
		$rs = $model->save();
		return $rs;
	
	}
	//查询变量
	public static function VarSel($params,$str=''){
		$param = self::comParams($params);
		$model = new Vars();
		$criteria=new CDbCriteria;
		$criteria->select ='*';
		$criteria->condition = $param.$str; 
		$rs = $model->find($criteria);
		return $rs;
	}
	
	//修改变量
	public static function VarUpdate($name,$params){
		$rs = Vars::model()->updateAll($params,'name=:name',array(':name'=>$name));
		return $rs;
	}
	
	
}