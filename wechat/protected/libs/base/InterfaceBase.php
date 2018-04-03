<?php

/**
 * 接口基类
 */
class InterfaceBase extends CComponent {

    /**
     * curl 访问接口
     *
     * @param string   $url            url
     * @param array    $post           是否为post访问
     * @param int      $timeout        访问限时
     * @param string   $cookie
     * @param string   $decode			是否自动解析成数据
     * 
     */
    public static function curlOpen($url, $post = '', $timeout = 30, $cookie = '', $decode = 0) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url); //The URL to fetch.
        curl_setopt($ch, CURLOPT_HEADER, 0); //TRUE to include the header in the output.
        //post
        if (!empty($post)) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json;charset=UTF-8", "Content-length: " . strlen($post)));
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
            curl_setopt($ch, CURLOPT_POSTFIELDS, 1);
        }
        curl_setopt($ch, CURLOPT_TIMEOUT, $timeout); //The maximum number of seconds to allow CURL functions to execute.
        if ($cookie) {
            curl_setopt($ch, CURLOPT_COOKIE, $cookie); //The contents of the "Set-Cookie: " header to be used in the HTTP request.
        }
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); //不验证证书

        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); //不验证证书
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $data = curl_exec($ch);
        curl_close($ch);
        if ($decode == 1 && !is_null(json_decode($data))) {
            $data = json_decode($data, true);
        }
        return $data;
    }

}
