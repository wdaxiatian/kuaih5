<?php

//微信类(获取微信ticket)
class JsticketServer extends ServerBase {

    public static function getTicket() {

        $jsapiTicket = self::getJsApiTicket();
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        $url = "$protocol$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; //接口自带的获取链接的方法
        //$url = "$protocol$lburl";
        $timestamp = time();
        $nonceStr = self::createNonceStr();

        // 这里参数的顺序要按照 key 值 ASCII 码升序排序
        $string = "jsapi_ticket=$jsapiTicket&noncestr=$nonceStr&timestamp=$timestamp&url=$url";

        $signature = sha1($string);

        $appId = '';
        //获取$appId
        $list = WsettingServer::getList();
        foreach ($list as $k => $v) {
            if ($v['name'] == 'appId')
                $appId = $v['content'];
        }
        $signPackage = array(
            "appId" => $appId,
            "nonceStr" => $nonceStr,
            "timestamp" => $timestamp,
            "url" => $url,
            "signature" => $signature,
            "rawString" => $string
        );
        return $signPackage;
    }

    public static function createNonceStr($length = 16) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $str = "";
        for ($i = 0; $i < $length; $i++) {
            $str .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
        }
        return $str;
    }

    public static function getJsApiTicket() {

        //抓取数据
        $data = self::getdbJsticket();
        if ($data['time'] < time()) {
            $accessToken = AccessTokenServer::getAccessToken();
            // 如果是企业号用以下 URL 获取 ticket
           
            $url = "https://api.weixin.qq.com/cgi-bin/ticket/getticket?type=jsapi&access_token=$accessToken";
            $res = json_decode(self::httpGet($url), true);
            
            $ticket = $res['ticket'];
            if ($ticket) {
                $data['time'] = time() + 3600;
                $data['jsticket'] = $ticket;
                self::update(array('id' => 1), $data);
            }
        } else {
            $ticket = $data['jsticket'];
        }

        return $ticket;
    }

    //数据库里读取ticket
    public static function getdbJsticket() {
        $model = new Jsticket();
        $criteria = new CDbCriteria;
        $criteria->select = '*';
        $rs = $model->find($criteria);
        return $rs;
    }

    //修改数据
    public static function update($condition, $params) {
        $param = self::comParams($condition);
        $rs = Jsticket::model()->updateAll($params, $param);
        return $rs;
    }

}
