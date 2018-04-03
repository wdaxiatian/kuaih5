<?php

//问答献策

class AnsQusController extends BaseController {

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
        $url = API . 'WeChat/GetProblemList';
        $rs = $this->getCurl($url . '?' . http_build_query(array('type' => 2)));
        $data = array();
        if ($rs['resCode'] == 1)
            $data = $rs['data']['data'];

        $this->render('index', array('data' => $data, 'token' => $token));
    }

    public function actionAdd() {
        $openid = !empty($_REQUEST['token']) ? $_REQUEST['token'] : '';
        $content = !empty($_REQUEST['nr']) ? $_REQUEST['nr'] : '';
        $problemclass = !empty($_REQUEST['status']) ? $_REQUEST['status'] : '';
        if (empty($openid) || empty($content) || empty($problemclass) || $content == '请输入您的问题')
            $this->returnJson(['code' => 100001, 'msg' => '数据不能为空']);

        //入库
        $url = API . 'WeChat/AddProblemInfo';
        $rs = $this->postCurl($url . '?' . http_build_query(array('openid' => $openid, 'content' => $content, 'problemclass' => $problemclass)), 'null');

        if (isset($rs['resCode']) && $rs['resCode'] == 1)
            $this->returnJson(['code' => 0, 'msg' => '提交成功']);
        else
            $this->returnJson(['code' => 100002, 'msg' => '提交失败']);
    }

}
