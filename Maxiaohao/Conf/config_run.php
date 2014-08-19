<?php
return array(
	//'配置项'=>'配置值'
	// 添加数据库配置信息
	'APP_STATUS' => 'debug',//debug模式
	'SHOW_PAGE_TRACE'=>1,//page trace模式

	'DB_TYPE' => 'mysql', // 数据库类型
	'DB_HOST' => 'mysql.3owl.com', // 服务器地址
	'DB_NAME' => 'u334435172_test', // 数据库名
	'DB_USER' => 'u334435172_test', // 用户名
	'DB_PWD' => 'maxiaohao163', // 密码
	'DB_PORT' => 3306, // 端口
	'DB_PREFIX' => 'maxiaohao_', // 数据库表前缀
	'DB_FIELDS_CACHE'=>false, //不缓存字段
	'TMPL_PARSE_STRING'=> array('__PUBLIC__' => '/test/Public/'),


);


?>