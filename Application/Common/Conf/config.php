<?php
return array(

     /*system config*/
    'AUTOLOAD_NAMESPACE' => array('Addons' => ONETHINK_ADDON_PATH),
    /*加载其他文件*/
    'LOAD_EXT_FILE'=>'type,api,parse,query_user,thumb',
    'LOAD_EXT_CONFIG'=>'tags',
    /* 系统数据加密设置 */
    'DATA_AUTH_KEY' => '#9IB"p/`e&-])|*1uFVNl}DdKJ0^fv?_,;YRU8>+', //默认数据加密KEY
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
    /* 文档模型配置 (文档模型核心配置，请勿更改) */
    'DOCUMENT_MODEL_TYPE' => array(2 => '主题', 1 => '目录', 3 => '段落'),
    'LOAD_EXT_CONFIG' => 'router',
    /*文件上传相关配置*/
    'DOWNLOAD_UPLOAD' => array(
        'mimes'    => '', //允许上传的文件MiMe类型
        'maxSize'  => 5*1024*1024, //上传的文件大小限制 (0-不做限制)
        'exts'     => 'jpg,gif,png,jpeg,zip,rar,tar,gz,7z,doc,docx,txt,xml', //允许上传的文件后缀
        'autoSub'  => true, //自动子目录保存文件
        'subName'  => array('date', 'Y-m-d'), //子目录创建方式，[0]-函数名，[1]-参数，多个参数使用数组
        'rootPath' => './Uploads/Download/', //保存根路径
        'savePath' => '', //保存路径
        'saveName' => array('uniqid', ''), //上传文件命名规则，[0]-函数名，[1]-参数，多个参数使用数组
        'saveExt'  => '', //文件保存后缀，空则使用原后缀
        'replace'  => false, //存在同名是否覆盖
        'hash'     => true, //是否生成hash编码
        'callback' => false, //检测文件是否存在回调函数，如果存在返回文件信息数组
), 
    
	/* 图片上传相关配置 */
'PICTURE_UPLOAD' => array(
'mimes'    => '', //允许上传的文件MiMe类型
'maxSize'  => 2*1024*1024, //上传的文件大小限制 (0-不做限制)
'exts'     => 'jpg,gif,png,jpeg', //允许上传的文件后缀
'autoSub'  => true, //自动子目录保存文件
'subName'  => array('date', 'Y-m-d'), //子目录创建方式，[0]-函数名，[1]-参数，多个参数使用数组
'rootPath' => './Uploads/Picture/', //保存根路径
'savePath' => '', //保存路径
'saveName' => array('uniqid', ''), //上传文件命名规则，[0]-函数名，[1]-参数，多个参数使用数组
'saveExt'  => '', //文件保存后缀，空则使用原后缀
'replace'  => true, //存在同名是否覆盖
'hash'     => true, //是否生成hash编码
'callback' => false, //检测文件是否存在回调函数，如果存在返回文件信息数组
), //图片上传相关配置（文件上传类配置）

'PICTURE_UPLOAD_DRIVER'=>'local',
'DOWNLOAD_UPLOAD_DRIVER'=>'local',
//本地上传文件驱动配置
'UPLOAD_LOCAL_CONFIG'=>array(),

/* 编辑器图片上传相关配置 */
'EDITOR_UPLOAD' => array(
'mimes'    => '', //允许上传的文件MiMe类型
'maxSize'  => 2*1024*1024, //上传的文件大小限制 (0-不做限制)
'exts'     => 'jpg,gif,png,jpeg', //允许上传的文件后缀
'autoSub'  => true, //自动子目录保存文件
'subName'  => array('date', 'Y-m-d'), //子目录创建方式，[0]-函数名，[1]-参数，多个参数使用数组
'rootPath' => './Uploads/Editor/', //保存根路径
'savePath' => '', //保存路径
'saveName' => array('uniqid', ''), //上传文件命名规则，[0]-函数名，[1]-参数，多个参数使用数组
'saveExt'  => '', //文件保存后缀，空则使用原后缀
'replace'  => false, //存在同名是否覆盖
'hash'     => true, //是否生成hash编码
'callback' => false, //检测文件是否存在回调函数，如果存在返回文件信息数组
),
    
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