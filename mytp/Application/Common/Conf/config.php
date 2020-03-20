<?php
return array(
	//'配置项'=>'配置值'
    //    'DEFAULT_ACTION'        =>  'test', // 默认操作名称
    'MODULE_ALLOW_LIST'    =>    array('Home','Admin'),
    //'配置项'=>'配置值'
//    'URL_HTML_SUFFIX'=>'pdf',
    'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  'localhost', // 服务器地址
    'DB_NAME'               =>  'shop1',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  'root',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  '',    // 数据库表前缀
    //默认错误跳转对应的模板文件
    'TMPL_ACTION_ERROR' => 'Public:error',
    //默认成功跳转对应的模板文件
    'TMPL_ACTION_SUCCESS' => 'Public:success',
    'SHOW_PAGE_TRACE' =>false,
);