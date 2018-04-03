<?php

//港城简介

class SiteController extends BaseController {

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
        $token = !empty($_REQUEST['token']) ? $_REQUEST['token'] : '';
        //查询
        $url = API . 'NewsManage/GetMlgcSmall?SMALLCLASS=128';
        $rs = $this->getCurl($url);
        $data = array();
        if ($rs['resCode'] == 1)
            $data = $rs['data']['data'][0];
      //  print_r($data);exit;
        $this->render('index',array('token'=>$token,'data'=>$data));
    }

}
