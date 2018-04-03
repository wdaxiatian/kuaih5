<?php
//验证码挂件
class ValidateCodController extends Controller{
	public function actionindex(){
		$file = dirname(__file__);
		include($file.'/../../libs/tools/ValidateCod.class.php');
		$cod = new ValidateCode(130,38); 
		$cod->doimg();
		Yii::app()->session['vcod']= $cod->getCode();//验证码保存到SESSION中
	
	}




}