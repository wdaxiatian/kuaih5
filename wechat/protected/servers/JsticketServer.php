<?php

//微信类(获取微信ticket)
class JsticketServer extends ServerBase {

    public static function getTicket() {
        
        $jsapiTicket = self::getJsApiTicket();
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        $url = "$protocol$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";	//接口自带的获取链接的方法
        //$url = "$protocol$lburl";
        $timestamp = time();
        $nonceStr = self::createNonceStr();

        // 这里参数的顺序要按照 key 值 ASCII 码升序排序
        $string = "jsapi_ticket=$jsapiTicket&noncestr=$nonceStr&timestamp=$timestamp&url=$url";

        $signature = sha1($string);

        $signPackage = array(
            "appId" =>APPID,
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

        // jsapi_ticket 应该全局存储与更新，以下代码以写入到文件中做示例
        $data = @json_decode(file_get_contents("jsapi_ticket.json"), true);
        if ($data['expire_time'] < time()) {
            $accessToken = self::getAccessToken();
            // 如果是企业号用以下 URL 获取 ticket

            $url = "https://api.weixin.qq.com/cgi-bin/ticket/getticket?type=jsapi&access_token=$accessToken";
            $res = json_decode(self::httpGet($url), true);
            $ticket = $res['ticket'];
            if ($ticket) {
                $data['expire_time'] = time() + 7000;
                $data['jsapi_ticket'] = $ticket;
              
                @file_put_contents('jsapi_ticket.json',json_encode($data));
            }
        } else {
            $ticket = $data['jsapi_ticket'];
        }

        return $ticket;
    }

    public static function getAccessToken() {
        // access_token 应该全局存储与更新，以下代码以写入到文件中做示例
        $data = @json_decode(file_get_contents("access_token.json"), true);
        if ($data['expire_time'] < time()) {
            // 如果是企业号用以下URL获取access_token
            $appId = APPID;
            $appSecret = APPSECRET;

            $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=$appId&secret=$appSecret";
            $res = json_decode(self::httpGet($url), true);
            
            $access_token = $res['access_token'];
            if ($access_token) {

                $data['expire_time'] = time() + 7000;
                $data['access_token'] = $access_token;
                   
               @file_put_contents('access_token.json',json_encode($data));
               
            }
        } else {
            $access_token = $data['access_token'];
        }
        return $access_token;
    }

    public static function httpGet($url) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url); //The URL to fetch.
        curl_setopt($ch, CURLOPT_HEADER, 0); //TRUE to include the header in the output.
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); //不验证证书
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); //不验证证书
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $data = curl_exec($ch);
        curl_close($ch);

        return $data;
    }

}
