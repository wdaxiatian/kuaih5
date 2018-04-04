<?php

//jsticket

class Jsticket extends CActiveRecord {

    public $id; //主键
    public $jsticket;
    public $time; //
 

    //Model静态方法为必须有的方法
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    //tableName方法也是必须有的方法
    public function tableName() {
        return '{{jsticket}}';
    }

    public function primaryKey() {
        return 'id';
    }

    public function rules() {
        return array(
            array('id,jsticket,time', 'safe'),
        );
    }

}
