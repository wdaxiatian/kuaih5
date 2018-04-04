<?php

//微信类(获取微信Asstoken)
class AccessTokenServer extends ServerBase {

    public static function getAccessToken() {
        //抓取数据
        $data = self::getdbAccesstoken();
        if ($data['time'] < time()) {
            $appId = '';
            $AppSecret ='';
            //获取$appId和$AppSecret
            $list = WsettingServer::getList();
            foreach ($list as $k => $v) {
                if ($v['name'] == 'appId')
                    $appId = $v['content'];
                if ($v['name'] == 'AppSecret')
                    $AppSecret = $v['content'];
            }
            
            $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=$appId&secret=$AppSecret";
            $res = json_decode(self::httpGet($url), true);

            $access_token = $res['access_token'];
            if ($access_token) {
                //更新数据
                $data['time'] = time() + 3600;
                $data['accesstoken'] = $access_token;
                self::update(array('id'=>1), $data);
            }
        } else {
            $access_token = $data['accesstoken'];
        }
        return $access_token;
    }

    //数据库里读取accesstoken
    public static function getdbAccesstoken() {
        $model = new Accesstoken();
        $criteria = new CDbCriteria;
        $criteria->select = '*';
        $rs = $model->find($criteria);
        return $rs;
    }
    
       //修改数据
    public static function update($condition,$params) {   
        $param = self::comParams($condition);
        $rs = Accesstoken::model()->updateAll($params,$param);
        return $rs;
    }

}
