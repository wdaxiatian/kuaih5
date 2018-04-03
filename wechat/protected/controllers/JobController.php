<?php

//企业招聘

class JobController extends BaseController {

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
        //获取岗位列表
        $url = API . 'WeChat/GetCompanyBulletin';
        $rs = $this->getCurl($url);
        $data = array();
        if ($rs['resCode'] == 1)
            $data = $rs['data']['data'];

        $this->render('index', array('data' => $data, 'token' => $token));
    }

    //招聘详情
    public function actionInfo() {
        $token = !empty($_REQUEST['token']) ? $_REQUEST['token'] : '';
        $pid = !empty($_REQUEST['pid']) ? $_REQUEST['pid'] : '';
        $name = !empty($_REQUEST['name']) ? $_REQUEST['name'] : '';
        if (!$pid)
            $this->returnJson(['code' => 100001, 'msg' => '数据不能为空']);
        //获取岗位列表
        $url = API . 'User/GetConditionBulletin';
        $rs = $this->getCurl($url . '?' . http_build_query(array('COMPANYID' => $pid, 'POSITIONNAME' => $name)));
        $data = array();
        if ($rs['resCode'] == 1)
            $data = $rs['data']['data'][0];

        $this->render('info', array('data' => $data, 'token' => $token));
    }

}
