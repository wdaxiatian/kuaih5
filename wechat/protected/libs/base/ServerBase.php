<?php

class ServerBase extends CComponent {

    //组合字段
    public static function comParams($params = array(), $condition = 'and', $nub = "-4") {
        $param = '';
        foreach ($params as $k => $v) {

            $param .= "$k='$v' $condition ";
        }
        $param = substr($param, 0, $nub);

        return $param;
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
