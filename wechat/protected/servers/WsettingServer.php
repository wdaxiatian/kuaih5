<?php

//微信基础信息类

class WsettingServer extends ServerBase {

    //用户登录
    public static function getList($params = array()) {
        $model = new Wsetting();
        $criteria = new CDbCriteria;
        $criteria->select = '*';
        if ($params) {
            $criteria->condition = 'name=:name'; //查询条件
            $criteria->params = array(':name' => $params['name']);
        }
        $rs = $model->findAll($criteria);
        return $rs;
    }

    //修改数据
    public static function updateContent($condition,$params) {   
        $param = self::comParams($condition);
        $rs = Wsetting::model()->updateAll($params,$param);
        return $rs;
    }

}
