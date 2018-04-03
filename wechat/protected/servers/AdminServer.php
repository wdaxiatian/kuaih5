<?php
//用户类逻辑

class AdminServer extends ServerBase{
	
	//用户登录
	public static  function doLogin($params=array()){ 
		$model = new Admin();
		$criteria=new CDbCriteria;
		$criteria->select ='*';
		$criteria->condition = 'username=:username';//查询条件
		$criteria->params = array(':username'=>$params['username']);
		$rs = $model->find($criteria);
		if($rs){
			if($rs['password'] !=$params['password'])return array('code'=>'100001','message'=>'密码错误');
			
			else return array('code'=>'000000','message'=>'正在登录','data'=>$rs);
		}else{
			return array('code'=>'100002','message'=>'用户不存在');
		}
		
	}
	//修改密码
	public static function updatePassword($params){
		$rs = Admin::model()->updateAll(array('password'=>Tools::setpwd($params['password'])),'username=:username',array(':username'=>$params['username']));
		if($rs){
			return array('code'=>'000000','message'=>'修改成功');
		}else{
			return array('code'=>'100001','message'=>'修改失败');
		}
	
	}
	//登录后修改时间和IP
	public static function updateMsg($username){
		$rs = Admin::model()->updateAll(array('last_time'=>time(),'last_ip'=>$_SERVER['REMOTE_ADDR']),'username=:username',array(':username'=>$username));
		if($rs){
			return array('code'=>'000000','message'=>'修改成功');
		}else{
			return array('code'=>'100001','message'=>'修改失败');
		}
	} 
	//获取用户信息
	public static function getAdmin($id){
		$model = new Admin();
		$criteria=new CDbCriteria;
		$criteria->select ='*';
		$criteria->condition = 'id=:id';//查询条件
		$criteria->params = array(':id'=>$id);
		$rs = $model->find($criteria);
		if($rs){
			unset($rs['password']);
			return array('code'=>'000000','message'=>'用户存在','data'=>$rs);
		}else{
			return array('code'=>'100001','message'=>'用户不存在');
		}
	}
	//获取管理员列表
	public static function getAdminlist($params=array()){
		$offset = ($params['page']-1)*$params['pagesize'];
		$model = new Admin();
		$criteria=new CDbCriteria;
		$criteria->select ='id,username,name,email,lastlogintime,lastloginip,status';
	    $criteria->limit =$params['pagesize'];   //取1条数据，如果小于0，则不作处理
	    $criteria->offset =$offset;   //两条合并起来，则表示 limit 10
		$rs = $model->findAll($criteria);
		return $rs;
	}
	//添加管理员
	public static function adminAdd($params){
		$params['password'] = Tools::setpwd($params['password']); 
		$model = new Admin();
		$model->attributes = $params;
		$rs = $model->save();
		if($rs){
			return array('code'=>'000000','message'=>'添加成功');
		}else{
			return array('code'=>'100001','message'=>'添加失败');
		}
	
	}
	//修改管理员信息
	public static function adminEdit($id,$params){
		$rs = Admin::model()->updateAll($params,'id=:id',array(':id'=>$id));
		if($rs){
			return array('code'=>'000000','message'=>'修改成功');
		}else{
			return array('code'=>'100001','message'=>'修改失败');
		}
	
	}
	//删除管理员
	public static function adminDel($id){
		$criteria=new CDbCriteria;
		$criteria->condition = 'id=:id';
		$criteria->params = array(':id'=>$id);
		$rs = Admin::model()->deleteAll($criteria);
		if($rs){
			return array('code'=>'000000','message'=>'删除成功');
		}else{
			return array('code'=>'100001','message'=>'删除失败');
		}		
	}
	//锁定修改
	public static function adminLock($id,$status){ 
		$rs = Admin::model()->updateAll(array('status'=>$status),'id=:id',array(':id'=>$id));
		if($rs){
			return array('code'=>'000000','message'=>'修改成功');
		}else{
			return array('code'=>'100001','message'=>'修改失败');
		}
	
	}
	//检测用户名是否存在
	public static function checkAdmin($username){
		$model = new Admin();
		$criteria=new CDbCriteria;
		$criteria->select ='id,username,email';
		$criteria->condition = 'username=:username';//查询条件
		$criteria->params = array(':username'=>$username);
		$rs = $model->find($criteria);
		if($rs){
			return array('code'=>'000000','message'=>'用户存在','data'=>$rs);
		}else{
			return array('code'=>'100001','message'=>'用户不存在');
		}
	
	}
	//检测密码
	public static function checkPassword($password){
		$model = new Admin();
		$criteria=new CDbCriteria;
		$criteria->select ='id';
		$criteria->condition = 'password=:password';//查询条件
		$criteria->params = array(':password'=>Tools::setpwd($password));
		$rs = $model->find($criteria);
		if($rs){
			return array('code'=>'000000','message'=>'密码正确');
		}else{
			return array('code'=>'100001','message'=>'密码不正确');
		}
	
	}
	
	//检测邮箱是否存在
	public static function checkEmail(){
		$model = new Admin();
		$criteria=new CDbCriteria;
		$criteria->select ='id,email';
		$criteria->condition = 'email=:email';//查询条件
		$criteria->params = array(':email'=>$email);
		$rs = $model->find($criteria);
		if($rs){
			return array('code'=>'000000','message'=>'邮箱存在');
		}else{
			return array('code'=>'100001','message'=>'邮箱不存在');
		}
	
	}
	//获取总数量
	public static function adminCount($params=array()){
		$model = new Admin();
		$rs = $model->count();
		return $rs;
	}
	
	
}