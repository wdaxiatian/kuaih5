<?php

//微信基础设置

class Wsetting extends CActiveRecord {

    public $id; //主键
    public $name;
    public $content; //密码
  

    //Model静态方法为必须有的方法
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    //tableName方法也是必须有的方法
    public function tableName() {
        return '{{wsetting}}';
    }

    public function primaryKey() {
        return 'id';
    }

    public function rules() {
        return array(
            array('id,name,content', 'safe'),
        );
    }

}
