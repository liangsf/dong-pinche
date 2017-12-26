<?php
return array(
	// '配置项'=>'配置值'
    'APP_DEBUG' =>false,
    'DB_TYPE'   => 'mysql',
    'DB_HOST'   => 'localhost',
	'DB_NAME'   => 'pinche',
	'DB_USER'   => 'root',
	'DB_PWD'    => '',
	'DB_PORT'   => '3306',
    'DB_PREFIX' => '',

    'SHOW_PAGE_TRACE' => false,
    'HTML_CACHE_ON'   => false,
    'TMPL_CACHE_ON'   => false,
    'URL_CASE_INSENSITIVE'  => true,
    'SITEURL'         => 'http://127.0.0.27/',

    'COOKIE_TIME'     => 86400*5,

    'APP_GROUP_LIST' => 'Home,Admin,App',
    'DEFAULT_GROUP' => 'App',
	'WX_AppID' => 'wx14b66dadd382b11f',
	'WX_AppSecret' => '10fc80d0ac60c254245bec8837baf722',
);
?>