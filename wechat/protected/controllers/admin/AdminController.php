<?php

//后台管理员设置
class AdminController extends CenterController {

    public $page = 1;
    public $pagesize = 20;
    public $layout = 'admin'; //定义布局

    public function init() {
        parent::init();
        if (!$this->checkLogin('admin'))
            $this->showMessage('未登录', U('admin/login/login'));
    }

    //管理员列表
    public function actionList() {
        $this->render('list');
    }
    


}
