<?php
return array(
	//邮件配置
	'MAIL_HOST' =>'smtp.sina.com',//smtp服务器的名称
    'MAIL_SMTPAUTH' =>TRUE, //启用smtp认证
    'MAIL_USERNAME' =>'yilixiaomaizi@sina.com',//你的邮箱名
    'MAIL_FROM' =>'yilixiaomaizi@sina.com',//发件人地址
    'MAIL_FROMNAME'=>'Tumblr ',//发件人姓名
    'MAIL_PASSWORD' =>'zhujiahao11',//邮箱密码
    'MAIL_CHARSET' =>'utf-8',//设置邮件编码
    'MAIL_ISHTML' =>TRUE, // 是否HTML格式邮件
    
    /* 数据库配置 */
    'DB_TYPE'   => 'mysql', // 数据库类型
    'DB_HOST'   => '127.0.0.1', // 服务器地址
    'DB_NAME'   => 'Yoozu', // 数据库名
    'DB_USER'   => 'root', // 用户名
    'DB_PWD'    => 'zhujiahao',  // 密码
    'DB_PORT'   => '3306', // 端口
    'DB_PREFIX' => 'yz_', // 数据库表前缀
    
    /* 用户相关设置 */
    'USER_MAX_CACHE'     => 1000, //最大缓存用户数
    'USER_ADMINISTRATOR' => 1, //管理员用户ID
    
     /* 模板相关配置 */
    'TMPL_PARSE_STRING' => array(
        '__STATIC__' => __ROOT__ . '/Public/static',
        '__ADDONS__' => __ROOT__ . '/Public/' . MODULE_NAME . '/Addons',
        '__IMG__'    => __ROOT__ . '/Public/' . MODULE_NAME . '/images',
        '__CSS__'    => __ROOT__ . '/Public/' . MODULE_NAME . '/css',
        '__JS__'     => __ROOT__ . '/Public/' . MODULE_NAME . '/js',
        
		    /* SESSION 和 COOKIE 配置 */
        'SESSION_PREFIX' => 'yoozu_home', //session前缀
        'COOKIE_PREFIX' => 'yoozu_home_', // Cookie前缀 避免冲突
    ),
);