<?php

class BaseController extends CController {

    public $js_ticket = array();

    //检查后台是否登陆
    public function checkLogin() {
        if (isset(Yii::app()->session['admin']))
            return true;
        else
            return false;
    }

    /**
     * 创建表单令牌
     * -----------------------------------------------
     * 加密通过配置项进行,所以验证时应在渲染模版的控制器进行
     * -----------------------------------------------
     */
    function tokenCreate() {
        $key = uniqid();         //令牌 id值
        $hash = 'HASH';
        $value = sha1($key . $hash); //令牌value//
        Yii::app()->session[$key] = $value; //令牌存入session
        return $key;
    }

    //提示页面
    function showMessage($content, $url = '', $time = 1550) {
        if (is_array($content)) {
            $re = array(
                'content' => $content['content'],
                'url' => $content['url'],
                'time' => $content['time']
            );
        } else {
            $re = array(
                'content' => $content,
                'url' => $url,
                'time' => $time
            );
        }
        $isAjax = Yii::app()->request->getIsAjaxRequest();

        $this->renderPartial('//show_message', array('msg' => $re, 'isAjax' => $isAjax));
        Yii::app()->end();
    }

    //异步信息
    function showBox($content, $url = '', $type = 1, $time = 1550, $callback = '') {
        if (is_array($content)) {
            $re = array(
                'content' => $content['content'],
                'url' => $content['url'] == '' ? false : $content['url'],
                'type' => $content['type'],
                'time' => $content['time'],
                'callback' => $content['callback']
            );
        } else {
            $re = array(
                'content' => $content,
                'url' => $url == '' ? false : $url,
                'type' => $type,
                'time' => $time,
                'callback' => $callback
            );
        }
        echo json_encode($re);
        Yii::app()->end();
    }

    /**
     * 根据id验证表单令牌
     * @param string $id
     */
    public function tokenCheck($id) {
        if (!isset(Yii::app()->session[$id]))
            return false;
        $hash = 'HASH';
        $value = sha1($id . $hash); //令牌value//
        if (Yii::app()->session[$id] == $value) {
            unset(Yii::app()->session[$id]); //验证通过 销毁令牌
            return true;
        }
        return false;
    }

    //输出
    public function alert($restul, $cb) {
        $restul = $cb . '(' . json_encode($restul) . ')';
        echo $restul;
        exit;
    }

    //输出json
    public function returnJson($restul) {
        $restul = json_encode($restul);
        echo $restul;
        exit;
    }

    //curl post
    //公共方法
    public function postCurl($url, $post) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url); //The URL to fetch.
        curl_setopt($ch, CURLOPT_HEADER, 0); //TRUE to include the header in the output.
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json;charset=UTF-8", "Content-length: " . strlen($post)));
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

    //公共方法
    public function getCurl($url) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url); //The URL to fetch.
        curl_setopt($ch, CURLOPT_HEADER, 0); //TRUE to include the header in the output.
        //post
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); //不验证证书

        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); //不验证证书
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $data = curl_exec($ch);
        curl_close($ch);
        return json_decode($data, true);
    }


}
