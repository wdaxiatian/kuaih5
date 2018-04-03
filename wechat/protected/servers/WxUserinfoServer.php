<?php
//微信用户信息类
class WxUserinfoServer extends ServerBase{
	//添加
	public static function userinfoAdd($params){
		$model = new WxUserinfo();
		$model->attributes = $params;
		$rs = $model->save();
		if($rs){
			return array('code'=>'000000','message'=>'添加成功');
		}else{
			return array('code'=>'100001','message'=>'添加失败');
		}
	
	}
	//查询mb4
	public static function userinfoMb4($params){
		$model = new WxUserinfoMb4();
		$criteria=new CDbCriteria;
		$criteria->select ='*';
		$criteria->condition = 'openid=:openid';//查询条件
		$criteria->params = array(':openid'=>$params['openid']);
		$rs = $model->find($criteria);
		return $rs;
	}
	//添加mb4
	public static function userinfoAddMb4($params){
		$model = new WxUserinfoMb4();
		$model->attributes = $params;
		$rs = $model->save();
		if($rs){
			return array('code'=>'000000','message'=>'添加成功');
		}else{
			return array('code'=>'100001','message'=>'添加失败');
		}
	
	}
	//修改mb4
	public static function userinfoUpdateMb4($params){
		$rs = WxUserinfoMb4::model()->updateAll(array('score'=>$params['score']),'openid=:openid',array(':openid'=>$params['openid']));
		return $rs;
	
	}
	//修改Smb4
	public static function userinfoUpdateSMb4($params){
		$rs = WxUserinfoMb4::model()->updateAll(array('status'=>$params['status']),'openid=:openid',array(':openid'=>$params['openid']));
		return $rs;
	
	}

	
}