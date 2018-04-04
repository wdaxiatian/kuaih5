<?php

//微信公众号信息设置
class Wsettingcontroller extends CenterController {

    public $page = 1;
    public $pagesize = 20;
    public $layout = 'admin'; //定义布局

    public function init() {
        parent::init();
        if (!$this->checkLogin('admin'))
            $this->showMessage('未登录', U('admin/login/login'));
    }

    //获取信息
    public function actionList() {
        $rs = WsettingServer::getList();
        $accesstoken = AccessTokenServer::getAccessToken();
        $jsticket = JsticketServer::getJsApiTicket();
        $this->render('list', array('data' => $rs,'accesstoken'=>$accesstoken,'jsticket'=>$jsticket));
    }

    //修改
    public function actionEdit() {

        $isajax = Yii::app()->request->isAjaxRequest;
        if (!empty($_POST) && $isajax) {
            $params['appId'] = $_POST['appId'];
            $params['AppSecret'] = $_POST['AppSecret'];
            $params['ip'] = $_POST['ip'];
            $params['url'] = $_POST['url'];
            $params['token'] = $_POST['token'];
            $params['AESKey'] = $_POST['AESKey'];
            $params['AESKeytype'] = $_POST['AESKeytype'];
            $params['path'] = $_POST['path'];
            $params['jspath'] = $_POST['jspath'];
            $params['trustpath'] = $_POST['trustpath'];
            //修改    
            foreach ($params as $k => $v) {
                $restul = WsettingServer::updateContent(array('name' => $k), array('content' => $v));
            }
            $this->showBox('ok', '', '1');
        }
        //直接展示
        $rs = WsettingServer::getList();
        $this->render('edit', array('data' => $rs));
    }

}
