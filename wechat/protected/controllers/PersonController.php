<?php

//个人中心

class PersonController extends BaseController {

    public $layout = 'site'; //定义布局
    public $pagesize = 20;

    public function init() {
        //查询token是否正确，若没有或错误则授权重新进入
        $token = !empty($_REQUEST['token']) ? $_REQUEST['token'] : '';
        $accesstoken = $this->getAccesstoken();
        OpenidServer::checkopenidback($token, $accesstoken);
        $this->getjsticket();
    }

    //主页
    public function actionIndex() {
        $token = !empty($_REQUEST['token']) ? $_REQUEST['token'] : '';

        //根据openid获取昵称头像
        $url = API . 'WeChat/GetWechatuserInfo';
        $rs = $this->getCurl($url . '?' . http_build_query(array('openid' => $token)));
        $data = array();
        if ($rs['resCode'] == 1)
            $data = $rs['data']['data'][0];

        $this->render('index', array('token' => $token, 'data' => $data));
    }

    //物业服务
    public function actionService() {
        $token = !empty($_REQUEST['token']) ? $_REQUEST['token'] : '';
        //获取列表
        $url = API . 'WeChat/GetProblemWe';
        $rs = $this->getCurl($url . '?' . http_build_query(array('problemclass' => 1, 'openid' => $token)));
        $data = array();
        if ($rs['resCode'] == 1)
            $data = $rs['data']['data'];
        $this->render('service', array('token' => $token, 'data' => $data));
    }

    //问答献策
    public function actionAnsqus() {
        $token = !empty($_REQUEST['token']) ? $_REQUEST['token'] : '';
        //获取列表
        $url = API . 'WeChat/GetProblemWe';
        $rs = $this->getCurl($url . '?' . http_build_query(array('problemclass' => 2, 'openid' => $token)));
        $data = array();
        if ($rs['resCode'] == 1)
            $data = $rs['data']['data'];
        $this->render('ansqus', array('token' => $token, 'data' => $data));
    }

    //参加活动
    public function actionAct() {
        $token = !empty($_REQUEST['token']) ? $_REQUEST['token'] : '';
        //获取列表
        $url = API . 'WeChat/GetActionsUsers';
        $rs = $this->getCurl($url . '?' . http_build_query(array('openid' => $token)));
        $data = array();
        if ($rs['resCode'] == 1)
            $data = $rs['data']['data'];
        $this->render('act', array('token' => $token, 'data' => $data));
    }

    //我的投诉
    public function actionComplaint() {
        $token = !empty($_REQUEST['token']) ? $_REQUEST['token'] : '';
        //获取列表
        $url = API . 'WeChat/GetCaseReportWe';
        $rs = $this->getCurl($url . '?' . http_build_query(array('openid' => $token)));
        $data = array();
        if ($rs['resCode'] == 1)
            $data = $rs['data']['data'];
        $this->render('complaint', array('token' => $token, 'data' => $data));
    }

    //投诉详情
    public function actionComplaintinfo() {
        $token = !empty($_REQUEST['token']) ? $_REQUEST['token'] : '';
        $id = !empty($_REQUEST['id']) ? $_REQUEST['id'] : '';
        //获取列表
        $url = API . 'WeChat/getcasereportdetails';
        $rs = $this->getCurl($url . '?' . http_build_query(array('id' => $id)));
        $data = array();
        if ($rs['resCode'] == 1)
            $data = $rs['data'];
        $this->render('complaintinfo', array('token' => $token, 'data' => $data));
    }

}
