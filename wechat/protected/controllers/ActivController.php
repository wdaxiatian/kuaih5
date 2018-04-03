<?php

//全民投票

class ActivController extends BaseController {

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
        //获取活动列表
        $url = API . 'WeChat/GetActionsPhone';
        $rs = $this->getCurl($url);
        $data = array();
        if ($rs['resCode'] == 1)
            $data = $rs['data']['data'];

        $this->render('index', array('data' => $data, 'token' => $token));
    }

    public function actionInfo() {
        $token = !empty($_REQUEST['token']) ? $_REQUEST['token'] : '';
        $id = !empty($_REQUEST['id']) ? $_REQUEST['id'] : '';
        if (!$id)
            $this->returnJson(['code' => 100001, 'msg' => '数据不能为空']);
        //获取单个活动
        $url = API . 'WeChat/GetActionsPhone?actionId=' . $id;
        $rs = $this->getCurl($url);
        $data = array();
        if ($rs['resCode'] == 1)
            $data = $rs['data']['data'][0];

        $this->render('info', array('data' => $data, 'pid' => $id, 'token' => $token));
    }

    public function actionList() {
        $actionid = !empty($_REQUEST['actionid']) ? $_REQUEST['actionid'] : '';
        $jid = !empty($_REQUEST['jid']) ? $_REQUEST['jid'] : '';
        $sorttype = !empty($_REQUEST['sorttype']) ? $_REQUEST['sorttype'] : '';
        $pageIndex = !empty($_REQUEST['pageIndex']) ? $_REQUEST['pageIndex'] : '1';
        $pageSize = !empty($_REQUEST['pageSize']) ? $_REQUEST['pageSize'] : '9999';
        if (empty($actionid))
            $this->returnJson(['code' => 100001, 'msg' => '数据不能为空']);
        //获取单个活动
        $url = API . 'WeChat/GetJoinerWeChat';
        $rs = $this->getCurl($url . '?' . http_build_query(array('actionid' => $actionid, 'numbering' => $jid, 'sorttype' => $sorttype, 'pageIndex' => $pageIndex, 'pageSize' => $pageSize)));
        $data = array();

        if (isset($rs['resCode']) && $rs['resCode'] == 1)
            $data = $rs['data']['data'];

        echo json_encode($data);
    }

    public function actionApply() {
        $token = !empty($_REQUEST['token']) ? $_REQUEST['token'] : '';
        $id = !empty($_REQUEST['id']) ? $_REQUEST['id'] : '';
        $actname = !empty($_REQUEST['actname']) ? $_REQUEST['actname'] : '';
        if ( empty($id) || empty($actname))
            $this->returnJson(['code' => 100001, 'msg' => '数据不能为空']);
        $this->render('apply', array('actname' => $actname, 'token' => $token, 'id' => $id));
    }

    public function actionAddact() {
        $token = !empty($_REQUEST['token']) ? $_REQUEST['token'] : '';
        $id = !empty($_REQUEST['id']) ? $_REQUEST['id'] : '';
        $name = !empty($_REQUEST['name']) ? $_REQUEST['name'] : '';
        $js = !empty($_REQUEST['js']) ? $_REQUEST['js'] : '';
        $dh = !empty($_REQUEST['dh']) ? $_REQUEST['dh'] : '';
        $img = !empty($_REQUEST['img']) ? $_REQUEST['img'] : '';

        if (empty($token) || empty($id) || empty($name) || empty($js) || empty($dh) || empty($img) ||
                $name == '请填写姓名' || $js == '介绍' || $dh == '请填写联系电话')
            $this->returnJson(['code' => 100001, 'msg' => '数据不能为空']);

        //用于上传图片
        $access_token = $this->getAccesstoken();
        $img = "https://api.weixin.qq.com/cgi-bin/media/get?access_token=$access_token&media_id=$img";
        //file_put_contents('aa.php',$img);
        //图片传到服务器上
        $img_name = time() . rand(0, 9999) . '.jpg';
        $img_path = 'wechat/bm/';
        $rs_ftp = FtpServer::upload('jj', $img, $img_path . $img_name);
        if ($rs_ftp != 4)
            $this->returnJson(['code' => 100002, 'msg' => '图片上传失败']);
        //活动报名接口
        $url = API . 'WeChat/AddJoinerStyle';
        $rs = $this->postCurl($url, json_encode(array("OPENID" => $token,
            "NAME" => $name, "IMG" => $img_path . $img_name, "TEL" => $dh, "INTRODUCE" => $js, "ACTIONID" => $id)));
        // file_put_contents('aa.php', json_encode(array("OPENID" => $token, "NAME" => $name, "IMG" => $img_path . $img_name, "TEL" => $dh, "INTRODUCE" => $js, "ACTIONID" => $id)));

        if ($rs['resCode'] == 1)
            $this->returnJson(['code' => 0, 'msg' => '成功']);
        else
            $this->returnJson(['code' => 100003, 'msg' => '失败']);
    }

    public function actionAddvote() {
        $token = !empty($_REQUEST['token']) ? $_REQUEST['token'] : '';
        $id = !empty($_REQUEST['id']) ? $_REQUEST['id'] : '';
        $nb = !empty($_REQUEST['nb']) ? $_REQUEST['nb'] : '';
        if (empty($token) || empty($nb) || empty($id))
            $this->returnJson(['code' => 100001, 'msg' => '数据不能为空']);
        //投票
        $url = API . 'WeChat/AddVote';
        $rs = $this->getCurl($url . '?' . http_build_query(array('openid' => $token, 'joinerid' => $nb, 'ACTIONID' => $id)));

        if (isset($rs['resCode']) && $rs['resCode'] == 1)
            $this->returnJson(['code' => 0, 'msg' => '投票成功']);
        else
            $this->returnJson(['code' => 10002, 'msg' => '投票失败']);
    }

}