<?php

//港城新闻

class NewsController extends BaseController {

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
        $this->render('index', array('token' => $token));
    }

    public function actionInfo() {
        $token = !empty($_REQUEST['token']) ? $_REQUEST['token'] : '';
        $type = !empty($_REQUEST['type']) ? $_REQUEST['type'] : '';
        $pid = !empty($_REQUEST['pid']) ? $_REQUEST['pid'] : '';
        $data = '122';
        if ($type == 'yw')
            $data = '122';
        if ($type == 'zc')
            $data = '123';
        if ($type == 'dt')
            $data = '124';
        if ($type == 'bd')
            $data = '126';
        //获取列表
        $url = API . 'WeChat/WeChatNewsViewModel';
        $rs = $this->getCurl($url . '?' . http_build_query(array('SMALLCLASS' => $data, 'nums' => 99)));
        $data = array();
        if ($rs['resCode'] == 1)
            $data = $rs['data']['data'];
        foreach ($data as $k => $v) {
            if ($v['ARTICLEID'] == $pid)
                $data = $data[$k];
        }

        $this->render('info', array('token' => $token, 'data' => $data));
    }

    //获取新闻列表
    public function actionAjax() {
        $type = !empty($_REQUEST['type']) ? $_REQUEST['type'] : '';
        $data = '122';
        if ($type == 'yw')
            $data = '122';
        if ($type == 'zc')
            $data = '123';
        if ($type == 'dt')
            $data = '124';
        if ($type == 'bd')
            $data = '126';
        //获取列表
        $url = API . 'WeChat/WeChatNewsViewModel';
        $rs = $this->getCurl($url . '?' . http_build_query(array('SMALLCLASS' => $data, 'nums' => 99)));
        $data = array();
        if ($rs['resCode'] == 1)
            $data = $rs['data']['data'];
        echo json_encode($data);
    }

}
