<?php

//微信授权类
class OpenidController extends BaseController {

    //验证openid的有效性
    public function actionCheckopenid() {
        $openid = !empty($_REQUEST['openid']) ? $_REQUEST['openid'] : '';
        if (!empty($openid)) {
            $result = OpenidServer::checkopenid($openid);
            print_r($result);
            exit;
        }
    }

    ////////////获取微信信息列表
    public function actionIndexList() {
        $name = isset($_REQUEST['name']) ? $_REQUEST['name'] : '';
        $state = isset($_REQUEST['url']) ? $_REQUEST['url'] : '';
        $type = isset($_REQUEST['type']) ? $_REQUEST['type'] : 'base';
        $wx = $this->wxlist($name);
        $appid = $wx['appid'];
        $r_url = 'http%3a%2f%2fltwxtest.mynatapp.cc%2fcxg%2findex.php%3fr%3dopenid%2fopenids';
        $url = "http://open.weixin.qq.com/connect/oauth2/authorize?appid=$appid&redirect_uri=$r_url&response_type=code&scope=snsapi_$type&state=$state,n=$name,t=$type&connect_redirect=1#wechat_redirect";
        echo $url;
        exit;
    }

    //获取openid列表接口
    public function actionOpenids() {
        if (empty($_GET['code']) || empty($_GET['state'])) {
            echo 'params is not empty';
            exit;
        }
        $params['code'] = $_GET['code'];
        $params['state'] = $_GET['state'];
        //url
        $arr = explode(",", $params['state']);
        $str = $params['state'] . '?';
        if (isset($arr[1])) {
            $total = count($arr);
            $str = $arr[0] . '?' . $arr[1];
            for ($i = 2; $i < $total; $i++) {
                $str .= '&' . $arr[$i];
            }
            $str = $str . '&';
        }
        $params['url'] = "http://" . $str;

        if (strpos($arr[$total - 1], 'userinfo')) {
            $params['status'] = 1; //授权方式userinfo,不传为base。  
            $params['img'] = 1; //不传就不传递头像 ,不传为base。 
        }
        //获取微信APPID和APPSECRET
        $name = substr($arr[$total - 2], 2);
        $wxmsg = $this->wxlist($name);
        $params['appid'] = $wxmsg['appid'];
        $params['secret'] = $wxmsg['appsecret'];

        //$params['db'] = 1; //不传openid不录入数据库
        //$params['test'] = 1;//不传就不测试

        $result = OpenidServer::openidlist($params);
        print_r($result);
    }

    //其他公司的微信信息
    public function wxlist($name = '') {
        $list = array(
            'xx' => array('appid' => APPID, 'appsecret' => APPSECRET)//xx
        );
        if (array_key_exists($name, $list)) {
            return $list[$name];
        } else {
            echo '公众号信息不存在';
            exit;
        }
    }

}
