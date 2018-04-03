<?php
//微信事件类
class EveContentServer extends ServerBase{
	//查询分类列表
	public static function getEvelist($params=array()){
		$offset = ($params['page']-1)*$params['pagesize'];
		$model = new EveContent();
		$criteria=new CDbCriteria;
		$criteria->select ='*';
		$criteria->limit =$params['pagesize'];   //取1条数据，如果小于0，则不作处理
	    $criteria->offset =$offset;   //两条合并起来，则表示 limit 10
		$rs = $model->findAll($criteria);
		return $rs;
	}
	//添加
	public static function eveAdd($params){
		$model = new EveContent();
		$model->attributes = $params;
		$rs = $model->save();
		if($rs){
			return array('code'=>'000000','message'=>'添加成功');
		}else{
			return array('code'=>'100001','message'=>'添加失败');
		}
	
	}
	//修改
	public static function eveEdit($id,$params){ 
		$rs = EveContent::model()->updateAll($params,'id=:id',array(':id'=>$id)); 
		if($rs){
			return array('code'=>'000000','message'=>'修改成功');
		}else{
			return array('code'=>'100001','message'=>'修改失败');
		}
	
	}
	//查询单条
	public static function getEve($id){
		$model = new EveContent();
		$criteria=new CDbCriteria;
		$criteria->select ='*';
		$criteria->condition = 'id=:id';//查询条件
		$criteria->params = array(':id'=>$id);
		$rs = $model->find($criteria);
		return $rs;
	
	}
	//删除
	public static function eveDel($id){
		$criteria=new CDbCriteria;
		$criteria->condition = 'id=:id';
		$criteria->params = array(':id'=>$id);
		$rs = EveContent::model()->deleteAll($criteria);
		if($rs){
			return array('code'=>'000000','message'=>'删除成功');
		}else{
			return array('code'=>'100001','message'=>'删除失败');
		}		
	}
	//获取文章总数量
	public static function eveCount($params=array()){
		$model = new EveContent();
		$rs = $model->count();
		return $rs;
	}

	
}