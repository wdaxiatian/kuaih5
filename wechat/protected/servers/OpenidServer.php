<?php

//微信类(授权获取openid)
class OpenidServer extends ServerBase {
    /*
      $params[appid]	必传   appid
      $params[secret]	必传   secret
      $params[code]	必传   code
      $params[state]	必传   state
      $params[url]	可选   跳转地址  //传值跳转，不传返回数据
      $params[status]	可选   授权方式 //传值为显性，不传为隐形
      $params[db]		可选   openid是否存入数据库 //传值为存，不传为不存
      $params[test]	可选   是否测试

     */

    public static function openidlist($params) {
        //获取access_token
        $res = self::getWebtoken($params['code'], $params['state'], $params['appid'], $params['secret']);

        if (isset($params['status'])) {
            //刷新access_token
            // $res = self::refWebtoken($params['appid'], $res['refresh_token']);
            //检验授权凭证（access_token）是否有效
            //   $check = self::checkToken($res['access_token'], $res['openid']);
            //获取用户信息
            $res = self::getWebuserinfo($res['access_token'], $res['openid']);
        }
        if (isset($params['url'])) {
            if (isset($params['status'])) {
                //print_r($res);exit;
                //存储用户授权
                $data['OPENID'] = $res['openid'];
                $data['NICKNAME'] = $res['nickname'];
                $data['HEADIMGURL'] = $res['headimgurl'];
                $data['SEX'] = $res['sex'];
                $data['PROVINCE'] = $res['province'];
                $data['CITY'] = $res['city'];
                $data['COUNTRY'] = $res['country'];

                $rs = self::saveInfo(API . 'WeChat/AddWechatuserInfo', json_encode($data));
                //   print_r($rs);exit;
                if ($rs['resCode'] != 1) {
                    echo '保存信息错误，无法进入';
                    exit;
                }
                $url = "$params[url]token=$res[openid]";
            } else {
                $url = "$params[url]token=$res[openid]";
            }
            if (isset($params['test'])) {
                echo $url;
                exit;
            }

            echo '<script>';
            echo 'location.href="' . $url . '"';
            echo '</script>';
        } else {
            return $res;
        }
    }

    //验证openid（错误或者没有则重新授权）
    public static function checkopenidback($openid, $accesstoken) {
        if ($openid) {
            $url = 'https://api.weixin.qq.com/cgi-bin/user/info';
            $post['access_token'] = $accesstoken;
            $post['openid'] = $openid;
            $rs = self::saveInfo($url . '?' . http_build_query($post),'');      
            if (!empty($rs) && isset($rs['errcode'])) {
                //重新授权
                //获取跳转url
                $link_data = $_GET;
                if (isset($link_data['token'])) //去除token
                    unset($link_data['token']);
                $url = LINK;
                foreach ($link_data as $k => $v) {
                    $url .= ',' . $k . '=' . $v;
                }
                $type = WECHATTYPE;
                $r_url = RURL;
                $appid = APPID;
                $name = NAME;
                $url = "http://open.weixin.qq.com/connect/oauth2/authorize?appid=$appid&redirect_uri=$r_url&response_type=code&scope=snsapi_$type&state=$url,n=$name,t=$type&connect_redirect=1#wechat_redirect";
                echo '<script>';
                echo 'location.href="' . $url . '"';
                echo '</script>';
            }
        } else {
            //重新授权
            //获取跳转url
            $link_data = $_GET;
            if (isset($link_data['token'])) //去除token
                unset($link_data['token']);
            $url = LINK;
            foreach ($link_data as $k => $v) {
                $url .= ',' . $k . '=' . $v;
            }
            $type = 'userinfo';
            $r_url = 'http%3a%2f%2fltwxtest.mynatapp.cc%2fcxg%2findex.php%3fr%3dopenid%2fopenids';
            $appid = APPID;
            $name = 'xx';
            $url = "http://open.weixin.qq.com/connect/oauth2/authorize?appid=$appid&redirect_uri=$r_url&response_type=code&scope=snsapi_$type&state=$url,n=$name,t=$type&connect_redirect=1#wechat_redirect";
            echo '<script>';
            echo 'location.href="' . $url . '"';
            echo '</script>';
        }
    }



    public static function saveInfo($url, $post) {

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url); //The URL to fetch.
        curl_setopt($ch, CURLOPT_HEADER, 0); //TRUE to include the header in the output.
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json;charset=UTF-8"));

        //post
     
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
      

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); //不验证证书

        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); //不验证证书
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $data = curl_exec($ch);
        curl_close($ch);
        return json_decode($data, true);
    }

    //获取access_token用于授权
    public static function getWebtoken($code, $state, $appid, $secret) {
        $res = WxInterface::getWebtoken($code, $state, $appid, $secret);

        if (!isset($res['access_token'])) {
            echo 'error1';
            exit;
        } else
            return $res;
    }

    //刷新access_token
    public static function refWebtoken($appid, $refresh_token) {
        $res = WxInterface::refWebtoken($appid, $refresh_token);
        if (!isset($res['access_token'])) {
            echo 'error2';
            exit;
        } else
            return $res;
    }

    //检验授权凭证（access_token）是否有效
    public static function checkToken($access_token, $openid) {
        $res = WxInterface::checkToken($access_token, $openid);
        if ($res['errcode'] != 0) {
            echo 'error3';
            exit;
        }
    }

    //获取用户信息
    public static function getWebuserinfo($access_token, $openid) {
        $res = WxInterface::getWebuserinfo($access_token, $openid);
        if (!isset($res['openid'])) {
            echo 'error4';
            exit;
        } else
            return $res;
    }

}
