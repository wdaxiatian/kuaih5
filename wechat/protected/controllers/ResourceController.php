<?php

//资源汇聚

class ResourceController extends BaseController {

    public $layout = 'site'; //定义布局
    public $pagesize = 20;

    public function init() {
        //查询token是否正确，若没有或错误则授权重新进入
        $token = !empty($_REQUEST['token']) ? $_REQUEST['token'] : '';
        $accesstoken = $this->getAccesstoken();
        OpenidServer::checkopenidback($token, $accesstoken);
        $this->getjsticket();
    }

    public function actionIndex() {
        $this->render('index');
    }

}
