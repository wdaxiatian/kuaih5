<?php
//微信菜单
class WxMenuServer extends ServerBase{
	//查询列表
	public static function getMenulist($params=array()){
		
		$model = new Wxmenu();
		$criteria=new CDbCriteria;
		$criteria->select ='*';
		$criteria->condition = 'pid=:pid';//查询条件
		$criteria->params = array(':pid'=>$params['pid']);
		$rs = $model->findAll($criteria);
		return $rs;
	}
	//查询条
	public static function getMenu($id){
		$model = new Wxmenu();
		$criteria=new CDbCriteria;
		$criteria->select ='*';
		$criteria->condition = 'id=:id';//查询条件
		$criteria->params = array(':id'=>$id);
		$rs = $model->find($criteria);
		return $rs;
	
	}

	//添加
	public static function menuAdd($params){
		$model = new Wxmenu();
		$model->attributes = $params;
		$rs = $model->save();
		if($rs){
			return array('code'=>'000000','message'=>'添加成功');
		}else{
			return array('code'=>'100001','message'=>'添加失败');
		}
	
	}
	//修改
	public static function menuEdit($id,$params){
		$rs = Wxmenu::model()->updateAll($params,'id=:id',array(':id'=>$id));
		if($rs){
			return array('code'=>'000000','message'=>'修改成功');
		}else{
			return array('code'=>'100001','message'=>'修改失败');
		}
	
	}
	//删除
	public static function menuDel($id){
		$criteria=new CDbCriteria;
		$criteria->condition = 'id=:id';
		$criteria->params = array(':id'=>$id);
		$rs = Wxmenu::model()->deleteAll($criteria);
		if($rs){
			return array('code'=>'000000','message'=>'删除成功');
		}else{
			return array('code'=>'100001','message'=>'删除失败');
		}		
	}
	
}