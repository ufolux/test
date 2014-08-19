<?php
return array(
	//'配置项'=>'配置值'
	// 添加数据库配置信息
    'LOG_RECORD'=>true,//开启了日志记录
  	'LOG_RECORD_LEVEL'=>array('EMERG','ALERT','ERROR'),
 
        
	'APP_STATUS' => 'debug',//debug模式
	'SHOW_PAGE_TRACE'=>1,//page trace模式

	'DB_TYPE' => 'mysql', // 数据库类型
	'DB_HOST' => 'localhost', // 服务器地址
	'DB_NAME' => 'test', // 数据库名
	'DB_USER' => 'root', // 用户名
	'DB_PWD' => '123321', // 密码
	'DB_PORT' => 3306, // 端口
	'DB_PREFIX' => 'maxiaohao_', // 数据库表前缀
	'DB_FIELDS_CACHE'=>false, //不缓存字段
	'TMPL_PARSE_STRING'=> array('__PUBLIC__' => '/test/Public/'),


);


?>