<?php
//公共文档
class VarController extends BaseController
{
	//模拟变量用于项目--------查询
	public function actionVarsel(){
		$cb = !empty($_REQUEST['cb'])?$_REQUEST['cb']:'';
		$params['name'] = !empty($_REQUEST['name'])?$_REQUEST['name']:'';
		if(empty($params['name'])){
			$restul['code'] = 100005;
			$restul['msg'] = 'name不能为空';
			$this->alert($restul,$cb);
		}
		$r = VarServer::VarSel($params);
		if($r){
			$restul['code'] = 0;
			$restul['msg'] = '查询成功';
			$restul['value'] = $r['value'];
			$this->alert($restul,$cb);
		}else{
			$restul['code'] = 100001;
			$restul['msg'] = '查询失败';
			$this->alert($restul,$cb);
		}
	}
	
	//模拟变量用于项目--------添加
	public function actionVaradd(){
		$cb = !empty($_REQUEST['cb'])?$_REQUEST['cb']:'';
		$params['name'] = !empty($_REQUEST['name'])?$_REQUEST['name']:'';
		$params['value'] = !empty($_REQUEST['value'])?$_REQUEST['value']:'';
		$params['addtime'] = time();
		if(empty($params['name'])){
			$restul['code'] = 100005;
			$restul['msg'] = 'name不能为空';
			$this->alert($restul,$cb);
		}
		$data = VarServer::VarSel(array('name'=>$params['name']));
		if($data){
			$restul['code'] = 100002;
			$restul['msg'] = '已经存在';
			$this->alert($restul,$cb);
		}
		$r = VarServer::VarAdd($params);
		if($r){
			$restul['code'] = 0;
			$restul['msg'] = '提交成功';
			$this->alert($restul,$cb);
		}else{
			$restul['code'] = 100001;
			$restul['msg'] = '提交失败';
			$this->alert($restul,$cb);
		}
	}

	
	//模拟变量用于项目--------修改
	public function actionVarupt(){
		$cb = !empty($_REQUEST['cb'])?$_REQUEST['cb']:'';
		$params['name'] = !empty($_REQUEST['name'])?$_REQUEST['name']:'';
		$params['value'] = !empty($_REQUEST['value'])?$_REQUEST['value']:''; 
		if(empty($params['name'])){
			$restul['code'] = 100005;
			$restul['msg'] = 'name不能为空';
			$this->alert($restul,$cb);
		}
		$data = VarServer::VarSel(array('name'=>$params['name']));
		if(!$data){
			$restul['code'] = 100003;
			$restul['msg'] = '不存在name';
			$this->alert($restul,$cb);
		}
		$r = VarServer::VarUpdate($params['name'],array('value'=>$params['value']));
		if($r){
			$restul['code'] = 0;
			$restul['msg'] = '修改成功';
			$this->alert($restul,$cb);
		}else{
			$restul['code'] = 100001;
			$restul['msg'] = '修改失败';
			$this->alert($restul,$cb);
		}
	}
	
}