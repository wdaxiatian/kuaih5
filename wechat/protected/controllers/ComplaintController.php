<?php

//我要投诉  

class ComplaintController extends BaseController {

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
        //获取列表
        $url = API . 'Common/getDICTSelect';
        $rs = $this->getCurl($url . '?' . http_build_query(array('DICTID' => 105)));
        $data = array();
        if ($rs['resCode'] == 1)
            $data = $rs['data'];

        $this->render('index', array('token' => $token, 'data' => $data));
    }

    public function actionAddcom() {
        $token = !empty($_REQUEST['token']) ? $_REQUEST['token'] : '';
        $name = !empty($_REQUEST['name']) ? $_REQUEST['name'] : '';
        $js = !empty($_REQUEST['js']) ? $_REQUEST['js'] : '';
        $dh = !empty($_REQUEST['dh']) ? $_REQUEST['dh'] : '';
        $type = !empty($_REQUEST['type']) ? $_REQUEST['type'] : '';
        $img = !empty($_REQUEST['img']) ? $_REQUEST['img'] : '';
        $latitude = !empty($_REQUEST['latitude']) ? $_REQUEST['latitude'] : '';
        $longitude = !empty($_REQUEST['longitude']) ? $_REQUEST['longitude'] : '';


        if (empty($token) || empty($type) || empty($name) || empty($js) || empty($dh) ||
                $name == '请填写姓名' || $js == '输入您的投诉或建议内容' || $dh == '请填写联系电话')
            $this->returnJson(['code' => 100001, 'msg' => '数据不能为空']);
        if (empty($latitude) || empty($longitude))
            $this->returnJson(['code' => 100004, 'msg' => '无法获取地理位置']);
        $imglist = ''; //本地图片列表
        if ($img) {
            $img = explode(',', $img); //传过来的数据是拼接的
            //循环上传
            foreach ($img as $k => $v) {
                //用于上传图片
                $access_token = $this->getAccesstoken();
                $img = "https://api.weixin.qq.com/cgi-bin/media/get?access_token=$access_token&media_id=$v";
                //file_put_contents('aa.php',$img);
                //图片传到服务器上
                $img_name = time() . rand(0, 9999) . '.jpg';
                $img_path = 'wechat/aj/';
                $rs_ftp = FtpServer::upload('jj', $img, $img_path . $img_name);
                if ($rs_ftp != 4)
                    $this->returnJson(['code' => 100002, 'msg' => '图片上传失败']);
                $imglist = $imglist . ',' . $img_path . $img_name;
            }
            $imglist = substr($imglist, 1);
        }

        //案件上报
        $url = API . 'WeChat/AddCaseReport';
        $rs = $this->postCurl($url, json_encode(array("OPENID" => $token,
            "NAME" => $name, "WECHATIMG" => $imglist, "TEL" => $dh, "REMARK" => $js, "TYPE" => $type, 'LONGITUDE' => $latitude, 'LATITUDE' => $longitude)));
        //  file_put_contents('aa.php',json_encode(array("OPENID" => $token,"NAME" => $name, "WECHATIMG" => $imglist, "TEL" => $dh, "REMARK" => $js, "TYPE" => $type,'LONGITUDE'=>$latitude,'LATITUDE'=>$longitude)));

        if ($rs['resCode'] == 1)
            $this->returnJson(['code' => 0, 'msg' => '成功']);
        else
            $this->returnJson(['code' => 100003, 'msg' => '失败']);
    }

}
