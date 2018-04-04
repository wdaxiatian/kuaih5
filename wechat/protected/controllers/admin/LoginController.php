<?php

//登录类
class LoginController extends BaseController {

    public $layout = 'login'; //定义布局

    //登录

    public function actionIndex() {
        //如果登录了，直接跳转
        if ($this->checkLogin())
            $this->showMessage('你已经登录', U('admin/index/index'));
        $isajax = Yii::app()->request->isAjaxRequest;
        if (!empty($_POST) && $isajax) {
            $params['username'] = $_POST['username'];
            $params['password'] = Tools::setpwd($_POST['password']);
            $params['remember'] = $_POST['remember'];
           
            $restul = AdminServer::doLogin($params);
            if ($restul['code'] == "000000") {
                unset($restul['data']['password']); //把用户信息保存在SESSION里
                Yii::app()->session['admin'] = $restul['data'];
                AdminServer::updateMsg($params['username']); //修改最后一次登录信息

                $this->showBox($restul['message'], U('admin/index/index'), '1');
            } else
                $this->showBox($restul['message'], '', '0');
        }
        $this->render('index');
    }

    //登出
    public function actionLoginout() {
        unset(Yii::app()->session['admin']);
        $this->showMessage('正在退出', U('admin/login/index'));
    }

}
