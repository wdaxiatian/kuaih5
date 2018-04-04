<?php

//配置文件(后台)
require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'alias.php'); //加载别名文件
require_once(dirname(__FILE__).DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.DIRECTORY_SEPARATOR.'libs'.DIRECTORY_SEPARATOR.'function'.DIRECTORY_SEPARATOR.'global.func.php'); //加载全局函数

return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'cxg',
	'defaultController'=>'admin/login/index',  //默认控制器
	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.servers.*', //逻辑类
		'application.interfaces.*', //逻辑类
		'application.libs.base.*',
		'application.libs.tools.*',   
		'ext.PHPExcel.PHPExcel'  ,     			//excel报表		
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		/*
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'Enter Your Password Here',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		*/
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		
	'urlManager'=>array(
			'caseSensitive'=>true,//大小写不敏感
			
		),

		'db'=>array(
			'class'=>'CDbConnection',
			'connectionString' => 'mysql:host=127.0.0.1;dbname=wechat',
			'emulatePrepare' => true,
			'username' =>'root',
			'password' => '',
			'charset' => 'utf8mb4',
			'tablePrefix' => 'w_'
		), 
		
		//redis 缓存  调用方法 Yii::app()->redis->set();
		'redis'=>array(
		        'class'=>'ext.YiiRedis.ARedisConnection',
	            "hostname" => "127.0.0.1",
                "port" => 6379,
                "database" => 0,  //redis 数据存放在 redis库 1中 默认为0
                "prefix" => "mone.redis."
		),
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
	/* 	'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				array(
                            'class'=>'CWebLogRoute',
                            'levels'=>'trace',     //级别为trace
                            'categories'=>'system.db.*' //只显示关于数据库信息,包括数据库连接,数据库执行语句
                    )
			
			),
		), */
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		//'adminEmail'=>'webmaster@example.com',
	),
);