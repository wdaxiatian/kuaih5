<?php

//获取授权地址
class UserinfoController extends CenterController {

    public $page = 1;
    public $pagesize = 20;
    public $layout = 'admin'; //定义布局

    public function init() {
        parent::init();
        if (!$this->checkLogin('admin'))
            $this->showMessage('未登录', U('admin/login/login'));
    }

    //主页
    public function actionIndex() {
        $this->render('index');
    }
    
    //生成图片二维码
    public function actionQrcode() {
        $url =  $_GET['url'];
        Tools::createImg($url);
        
    }


}
