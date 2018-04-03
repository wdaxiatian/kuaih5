<?php

//企业风采

class PrettyController extends BaseController {

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
        $url = API . 'CompanyStyle/GetCompanyStyleType?sourceType=155';
        $rs = $this->getCurl($url);
        $data = array();
        if ($rs['resCode'] == 1)
            $data = $rs['data'];

        $this->render('index', array('token' => $token, 'data' => $data));
    }

    public function actionInfo() {
        $token = !empty($_REQUEST['token']) ? $_REQUEST['token'] : '';
        $eid = !empty($_REQUEST['eid']) ? $_REQUEST['eid'] : '';
        if (!$eid)
            $this->returnJson(['code' => 100001, 'msg' => '数据不能为空']);
        //查询
        $url = API . 'CompanyStyle/GetCompanyStyleType?sourceType=155';
        $rs = $this->getCurl($url);
        $data = array();
        if ($rs['resCode'] == 1)
            $data = $rs['data'];
        $list = array();
        //循环读取这条数据
        foreach ($data as $k => $v) {
            if ($v['eid'] == $eid) {
                $list = $data[$k];
            }
        }
        $this->render('info', array('token' => $token, 'data' => $list));
    }

}
