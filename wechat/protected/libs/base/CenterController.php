<?php

class CenterController extends BaseController{

    function init(){
		//判断有没有登录
		if(!$this->checkLogin()) $this->showMessage('未登录后台管理系统',U('admin/login/index'),3000);
	}
	
}