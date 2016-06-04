-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-06-04 10:20:28
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `yoozu`
--

-- --------------------------------------------------------

--
-- 表的结构 `yz_addons`
--

CREATE TABLE IF NOT EXISTS `yz_addons` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `name` varchar(40) NOT NULL COMMENT '插件名或标识',
  `title` varchar(20) NOT NULL DEFAULT '' COMMENT '中文名',
  `description` text COMMENT '插件描述',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态',
  `config` text COMMENT '配置',
  `author` varchar(40) DEFAULT '' COMMENT '作者',
  `version` varchar(20) DEFAULT '' COMMENT '版本号',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '安装时间',
  `has_adminlist` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否有后台列表',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='插件表' AUTO_INCREMENT=94 ;

--
-- 转存表中的数据 `yz_addons`
--

INSERT INTO `yz_addons` (`id`, `name`, `title`, `description`, `status`, `config`, `author`, `version`, `create_time`, `has_adminlist`) VALUES
(15, 'EditorForAdmin', '后台编辑器', '用于增强整站长文本的输入和显示', 1, '{"editor_type":"2","editor_wysiwyg":"1","editor_height":"500px","editor_resize_type":"1"}', 'thinkphp', '0.1', 1383126253, 0),
(2, 'SiteStat', '站点统计信息', '统计站点的基础信息', 1, '{"title":"\\u7cfb\\u7edf\\u4fe1\\u606f","width":"1","display":"1","status":"0"}', 'thinkphp', '0.1', 1379512015, 0),
(89, 'DevTeam', '开发团队信息', '开发团队成员信息', 1, '{"title":"ThinkOX\\u5f00\\u53d1\\u56e2\\u961f","width":"2","display":"1"}', 'thinkphp', '0.1', 1409038881, 0),
(4, 'SystemInfo', '系统环境信息', '用于显示一些服务器的信息', 1, '{"title":"\\u7cfb\\u7edf\\u4fe1\\u606f","width":"2","display":"1"}', 'thinkphp', '0.1', 1379512036, 0),
(5, 'Editor', '前台编辑器', '用于增强整站长文本的输入和显示', 1, '{"editor_type":"2","editor_wysiwyg":"1","editor_height":"300px","editor_resize_type":"1"}', 'thinkphp', '0.1', 1379830910, 0),
(6, 'Attachment', '附件', '用于文档模型上传附件', 1, 'null', 'thinkphp', '0.1', 1379842319, 1),
(9, 'SocialComment', '通用社交化评论', '集成了各种社交化评论插件，轻松集成到系统中。', 1, '{"comment_type":"1","comment_uid_youyan":"","comment_short_name_duoshuo":"","comment_data_list_duoshuo":""}', 'thinkphp', '0.1', 1380273962, 0),
(16, 'Avatar', '头像插件', '用于头像的上传', 1, '{"random":"1"}', 'caipeichao', '0.1', 1394449710, 1),
(49, 'Checkin', '签到', '签到积分', 1, '{"random":"1"}', '想天软件工作室', '0.1', 1403764341, 1),
(58, 'SyncLogin', '同步登陆', '同步登陆', 1, '{"type":null,"meta":"","bind":"0","QqKEY":"","QqSecret":"","SinaKEY":"","SinaSecret":""}', 'xjw129xjt', '0.1', 1406598876, 0),
(41, 'LocalComment', '本地评论', '本地评论插件，不依赖社会化评论平台', 1, '{"can_guest_comment":"1"}', 'caipeichao', '0.1', 1399440324, 0),
(44, 'InsertImage', '插入图片', '微博上传图片', 1, 'null', '想天软件工作室', '0.1', 1402390777, 0),
(48, 'Repost', '转发', '转发', 1, 'null', '想天软件工作室', '0.1', 1403763025, 0),
(63, 'Advertising', '广告位置', '广告位插件', 1, 'null', 'onep2p', '0.1', 1406689090, 1),
(64, 'Advs', '广告管理', '广告插件', 1, 'null', 'onep2p', '0.1', 1406689131, 1),
(68, 'ImageSlider', '图片轮播', '图片轮播，需要先通过 http://www.onethink.cn/topic/2153.html 的方法，让配置支持多图片上传', 1, '{"second":"3000","direction":"horizontal","imgWidth":"760","imgHeight":"350","url":"","images":"92,93,94"}', 'birdy', '0.1', 1407144129, 0),
(70, 'SuperLinks', '合作单位', '合作单位', 1, '{"random":"1"}', '苏南 newsn.net', '0.1', 1407156572, 1),
(91, 'Rank_checkin', '签到排名', '设置每天某一时刻开始 按时间先后 签到排名，取前十', 1, '{"random":"1","ranktime":null}', '嘉兴想天信息科技有限公司', '0.1', 1409109841, 1),
(84, 'Support', '赞', '赞的功能', 1, 'null', '嘉兴想天信息科技有限公司', '0.1', 1408499141, 0);

-- --------------------------------------------------------

--
-- 表的结构 `yz_avatar`
--

CREATE TABLE IF NOT EXISTS `yz_avatar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `path` varchar(200) NOT NULL,
  `create_time` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `is_temp` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=70 ;

--
-- 转存表中的数据 `yz_avatar`
--

INSERT INTO `yz_avatar` (`id`, `uid`, `path`, `create_time`, `status`, `is_temp`) VALUES
(42, 2, '2016-05-26/5746d38a13fa1-254c0a7f.jpg', 1464259469, 1, 0),
(58, 6, '2016-05-27/57480f24c7c63.jpg', 1464340260, 1, 1),
(59, 2, '2016-05-27/57480f72434f9.jpg', 1464340338, 1, 1),
(68, 1, '2016-05-29/574b0d7cdcf6a-6f252b39.jpg', 1464536448, 1, 0),
(69, 1, '2016-05-29/574b0d99b1c5e.jpg', 1464536473, 1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `yz_file`
--

CREATE TABLE IF NOT EXISTS `yz_file` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` char(30) NOT NULL,
  `savename` char(20) NOT NULL,
  `savepath` char(30) NOT NULL,
  `ext` char(5) NOT NULL,
  `mime` char(40) NOT NULL,
  `size` int(10) unsigned NOT NULL,
  `md5` char(32) NOT NULL,
  `sha1` char(40) NOT NULL,
  `location` tinyint(3) unsigned NOT NULL,
  `create_time` int(10) unsigned NOT NULL,
  `driver` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `yz_follow`
--

CREATE TABLE IF NOT EXISTS `yz_follow` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `follow_who` int(11) NOT NULL,
  `who_follow` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `yz_friends`
--

CREATE TABLE IF NOT EXISTS `yz_friends` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `uid` int(10) NOT NULL,
  `friendid` int(10) NOT NULL,
  `create_time` int(10) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `yz_friends`
--

INSERT INTO `yz_friends` (`id`, `uid`, `friendid`, `create_time`, `status`) VALUES
(1, 1, 6, 1464938707, 0),
(2, 2, 1, 1464959693, 0),
(3, 2, 6, 1464959717, 0);

-- --------------------------------------------------------

--
-- 表的结构 `yz_goods`
--

CREATE TABLE IF NOT EXISTS `yz_goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) unsigned NOT NULL,
  `expandinfo` text NOT NULL,
  `create_time` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `type` varchar(16) NOT NULL,
  `data` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- 转存表中的数据 `yz_goods`
--

INSERT INTO `yz_goods` (`id`, `uid`, `expandinfo`, `create_time`, `status`, `type`, `data`) VALUES
(26, 1, 'tel:15061110931', 1464749275, 1, 'transport', 'a:1:{s:9:"attach_id";s:2:"33";}'),
(27, 1, 'tel?15061110931', 1464766746, 1, 'PE', 'a:1:{s:9:"attach_id";s:2:"34";}'),
(28, 1, 'tel?110', 1464768080, 1, 'studying', 'a:1:{s:9:"attach_id";s:2:"35";}'),
(29, 1, 'tel:13182900508', 1464768375, 1, 'entertainment', 'a:1:{s:9:"attach_id";s:2:"36";}'),
(30, 1, 'tel:119', 1464768660, 1, 'other', 'a:1:{s:9:"attach_id";s:2:"37";}'),
(31, 1, 'beutiful,tel:xxxxxxxxxxx', 1464768845, 1, 'transport', 'a:1:{s:9:"attach_id";s:2:"38";}'),
(32, 1, 'useful, $5', 1464768985, 1, 'studying', 'a:1:{s:9:"attach_id";s:2:"39";}'),
(33, 2, 'nice good? ?340 tel?199992323232', 1464769283, 1, 'entertainment', 'a:1:{s:9:"attach_id";s:2:"40";}');

-- --------------------------------------------------------

--
-- 表的结构 `yz_goodsimg`
--

CREATE TABLE IF NOT EXISTS `yz_goodsimg` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL,
  `path` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `create_time` int(10) NOT NULL,
  `is_temp` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- 转存表中的数据 `yz_goodsimg`
--

INSERT INTO `yz_goodsimg` (`id`, `uid`, `path`, `status`, `create_time`, `is_temp`) VALUES
(33, 1, 'Uploads/Goods/2016-06-01/574e4cd974094.jpg', 1, 1464749273, 0),
(34, 1, 'Uploads/Goods/2016-06-01/574e9117647a6.jpg', 1, 1464766743, 0),
(35, 1, 'Uploads/Goods/2016-06-01/574e964e66d82.jpg', 1, 1464768078, 0),
(36, 1, 'Uploads/Goods/2016-06-01/574e97751380a.jpg', 1, 1464768372, 0),
(37, 1, 'Uploads/Goods/2016-06-01/574e9890cb362.jpg', 1, 1464768656, 0),
(38, 1, 'Uploads/Goods/2016-06-01/574e994a453e0.jpg', 1, 1464768842, 0),
(39, 1, 'Uploads/Goods/2016-06-01/574e99d76d881.jpg', 1, 1464768983, 0),
(40, 2, 'Uploads/Goods/2016-06-01/574e9b0117a1b.jpg', 1, 1464769280, 0);

-- --------------------------------------------------------

--
-- 表的结构 `yz_hooks`
--

CREATE TABLE IF NOT EXISTS `yz_hooks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `name` varchar(40) NOT NULL DEFAULT '' COMMENT '钩子名称',
  `description` text NOT NULL COMMENT '描述',
  `type` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '类型',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `addons` varchar(255) NOT NULL DEFAULT '' COMMENT '钩子挂载的插件 ''，''分割',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=38 ;

--
-- 转存表中的数据 `yz_hooks`
--

INSERT INTO `yz_hooks` (`id`, `name`, `description`, `type`, `update_time`, `addons`) VALUES
(1, 'pageHeader', '页面header钩子，一般用于加载插件CSS文件和代码', 1, 0, 'ImageSlider'),
(2, 'pageFooter', '页面footer钩子，一般用于加载插件JS文件和JS代码', 1, 0, 'SuperLinks'),
(3, 'documentEditForm', '添加编辑表单的 扩展内容钩子', 1, 0, 'Attachment'),
(4, 'documentDetailAfter', '文档末尾显示', 1, 0, 'Attachment,SocialComment,Avatar'),
(5, 'documentDetailBefore', '页面内容前显示用钩子', 1, 0, ''),
(6, 'documentSaveComplete', '保存文档数据后的扩展钩子', 2, 0, 'Attachment'),
(7, 'documentEditFormContent', '添加编辑表单的内容显示钩子', 1, 0, 'Editor'),
(8, 'adminArticleEdit', '后台内容编辑页编辑器', 1, 1378982734, 'EditorForAdmin'),
(13, 'AdminIndex', '首页小格子个性化显示', 1, 1382596073, 'SiteStat,SystemInfo,SyncLogin,Advertising,DevTeam'),
(14, 'topicComment', '评论提交方式扩展钩子。', 1, 1380163518, 'Editor'),
(16, 'app_begin', '应用开始', 2, 1384481614, 'Iswaf'),
(17, 'checkin', '签到', 1, 1395371353, 'Checkin'),
(18, 'Rank', '签到排名钩子', 1, 1395387442, 'Rank_checkin'),
(20, 'support', '赞', 1, 1398264759, 'Support'),
(21, 'localComment', '本地评论插件', 1, 1399440321, 'LocalComment'),
(22, 'weiboType', '微博类型', 1, 1409121894, 'InsertImage'),
(23, 'repost', '转发钩子', 1, 1403668286, 'Repost'),
(24, 'syncLogin', '第三方登陆位置', 1, 1403700579, 'SyncLogin'),
(25, 'syncMeta', '第三方登陆meta接口', 1, 1403700633, 'SyncLogin'),
(26, 'J_China_City', '每个系统都需要的一个中国省市区三级联动插件。', 1, 1403841931, 'ChinaCity'),
(27, 'Advs', '广告位插件', 1, 1406687667, 'Advs'),
(28, 'imageSlider', '图片轮播钩子', 1, 1407144022, 'ImageSlider'),
(29, 'friendLink', '友情链接插件', 1, 1407156413, 'SuperLinks'),
(30, 'beforeSendWeibo', '在发微博之前预处理微博', 2, 1408084504, 'InsertFile'),
(31, 'beforeSendRepost', '转发微博前的预处理钩子', 2, 1408085689, ''),
(32, 'parseWeiboContent', '解析微博内容钩子', 2, 1409121261, ''),
(33, 'userConfig', '用户配置页面钩子', 1, 1417137557, 'SyncLogin'),
(34, 'weiboSide', '微博侧边钩子', 1, 1417063425, 'Retopic'),
(35, 'personalMenus', '顶部导航栏个人下拉菜单', 1, 1417146501, ''),
(36, 'dealPicture', '上传图片处理', 2, 1417139975, ''),
(37, 'ucenterSideMenu', '用户中心左侧菜单', 1, 1417161205, '');

-- --------------------------------------------------------

--
-- 表的结构 `yz_member`
--

CREATE TABLE IF NOT EXISTS `yz_member` (
  `uid` int(10) unsigned NOT NULL,
  `truename` char(16) NOT NULL,
  `nickname` char(16) NOT NULL,
  `reg_ip` bigint(20) NOT NULL,
  `reg_time` int(10) unsigned NOT NULL,
  `last_login_ip` bigint(20) NOT NULL,
  `last_login_time` int(10) unsigned DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `interest` varchar(32) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 表的结构 `yz_message`
--

CREATE TABLE IF NOT EXISTS `yz_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `touid` int(10) NOT NULL,
  `uid` int(10) NOT NULL,
  `create_time` int(10) NOT NULL,
  `is_read` tinyint(4) NOT NULL,
  `content` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `yz_picture`
--

CREATE TABLE IF NOT EXISTS `yz_picture` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) NOT NULL,
  `path` varchar(100) NOT NULL,
  `w_id` int(10) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `create_time` int(10) NOT NULL,
  `is_temp` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=74 ;

--
-- 转存表中的数据 `yz_picture`
--

INSERT INTO `yz_picture` (`id`, `uid`, `path`, `w_id`, `status`, `create_time`, `is_temp`) VALUES
(45, 1, 'Uploads/Picture/2016-05-30/574bfc3e4c5fa.jpg', 0, 1, 1464597566, 0),
(46, 1, 'Uploads/Picture/2016-05-30/574bfc89a94b8.jpg', 0, 1, 1464597641, 0),
(47, 1, 'Uploads/Picture/2016-05-30/574c02689c072.jpg', 0, 1, 1464599144, 0),
(48, 1, 'Uploads/Picture/2016-05-30/574c030e983fd.jpg', 0, 1, 1464599310, 0),
(49, 1, 'Uploads/Picture/2016-05-30/574c03f1e8b85.jpg', 0, 1, 1464599537, 0),
(50, 1, 'Uploads/Picture/2016-05-30/574c04335d68f.jpg', 0, 1, 1464599603, 0),
(51, 1, 'Uploads/Picture/2016-05-30/574c04dee6d12.jpg', 0, 1, 1464599774, 0),
(52, 1, 'Uploads/Picture/2016-05-30/574c065ea218d.jpg', 0, 1, 1464600158, 0),
(53, 1, 'Uploads/Picture/2016-05-30/574c1acd70df5.jpg', 0, 1, 1464605389, 0),
(54, 1, 'Uploads/Picture/2016-05-30/574c1b1462a31.jpg', 0, 1, 1464605460, 0),
(55, 1, 'Uploads/Picture/2016-05-30/574c2020ba6c4.jpg', 0, 1, 1464606752, 0),
(56, 2, 'Uploads/Picture/2016-05-30/574c214c01960.jpg', 0, 1, 1464607051, 0),
(57, 1, 'Uploads/Picture/2016-05-30/574c228393c87.jpg', 0, 1, 1464607363, 0),
(58, 6, 'Uploads/Picture/2016-05-30/574c22ea2eeba.jpg', 0, 1, 1464607466, 0),
(59, 1, 'Uploads/Picture/2016-05-30/574c25135f2ef.jpg', 0, 1, 1464608019, 0),
(60, 1, 'Uploads/Picture/2016-05-30/574c257e45551.jpg', 0, 1, 1464608126, 0),
(61, 1, 'Uploads/Picture/2016-05-30/574c281c4a4b4.jpg', 0, 1, 1464608796, 0),
(62, 1, 'Uploads/Picture/2016-05-30/574c287e36aa4.jpg', 0, 1, 1464608894, 0),
(63, 1, 'Uploads/Picture/2016-05-30/574c2a4f39021.jpg', 0, 1, 1464609359, 0),
(64, 1, 'Uploads/Picture/2016-05-30/574c2af60002c.jpg', 0, 1, 1464609525, 0),
(65, 1, 'Uploads/Picture/2016-05-30/574c2b8795044.jpg', 0, 1, 1464609671, 0),
(66, 1, 'Uploads/Picture/2016-05-30/574c2c234eae6.jpg', 0, 1, 1464609827, 0),
(67, 1, 'Uploads/Picture/2016-06-03/5750daeb28a0c.jpg', 0, 1, 1464916714, 1),
(68, 1, 'Uploads/Picture/2016-06-03/5750db0d3ec9c.jpg', 0, 1, 1464916749, 0),
(69, 2, 'Uploads/Picture/2016-06-03/5751836441ac8.jpg', 0, 1, 1464959844, 0),
(70, 6, 'Uploads/Picture/2016-06-03/575183ec5238f.jpg', 0, 1, 1464959980, 0),
(71, 1, 'Uploads/Picture/2016-06-04/575271682fdd3.gif', 0, 1, 1465020776, 0),
(72, 1, 'Uploads/Picture/2016-06-04/575273650bc1c.gif', 0, 1, 1465021284, 0),
(73, 1, 'Uploads/Picture/2016-06-04/5752738da8160.gif', 0, 1, 1465021325, 0);

-- --------------------------------------------------------

--
-- 表的结构 `yz_support`
--

CREATE TABLE IF NOT EXISTS `yz_support` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `appname` varchar(20) NOT NULL COMMENT '应用名',
  `row` int(11) NOT NULL COMMENT '应用标识',
  `uid` int(11) NOT NULL COMMENT '用户',
  `create_time` int(11) NOT NULL COMMENT '发布时间',
  `table` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='支持的表' AUTO_INCREMENT=139 ;

--
-- 转存表中的数据 `yz_support`
--

INSERT INTO `yz_support` (`id`, `appname`, `row`, `uid`, `create_time`, `table`) VALUES
(130, 'Weibo', 159, 1, 1464609680, 'weibo'),
(131, 'Weibo', 158, 1, 1464609682, 'weibo'),
(132, 'Weibo', 160, 2, 1464769308, 'weibo'),
(133, 'Weibo', 163, 1, 1464916684, 'weibo'),
(136, 'Weibo', 165, 2, 1464959861, 'weibo'),
(135, 'Weibo', 160, 1, 1464916691, 'weibo'),
(126, 'Weibo', 145, 1, 1464607925, 'weibo'),
(127, 'Weibo', 144, 1, 1464607928, 'weibo'),
(120, 'Weibo', 147, 6, 1464607484, 'weibo'),
(138, 'Weibo', 166, 6, 1464959953, 'weibo'),
(122, 'Weibo', 145, 6, 1464607493, 'weibo'),
(123, 'Weibo', 144, 6, 1464607495, 'weibo'),
(124, 'Weibo', 147, 1, 1464607921, 'weibo');

-- --------------------------------------------------------

--
-- 表的结构 `yz_ucenter_member`
--

CREATE TABLE IF NOT EXISTS `yz_ucenter_member` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` char(16) DEFAULT NULL,
  `userpwd` char(32) NOT NULL,
  `email` char(32) DEFAULT NULL,
  `reg_time` int(10) unsigned DEFAULT NULL,
  `reg_ip` bigint(20) DEFAULT NULL,
  `last_login_ip` bigint(20) DEFAULT NULL,
  `last_login_time` int(10) unsigned DEFAULT NULL,
  `update_time` int(10) unsigned DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `yz_ucenter_member`
--

INSERT INTO `yz_ucenter_member` (`id`, `username`, `userpwd`, `email`, `reg_time`, `reg_ip`, `last_login_ip`, `last_login_time`, `update_time`, `status`) VALUES
(1, 'zhujiahao', 'zhujiahao', '1158656977@qq.com', 1461683364, 2130706433, 2130706433, 1465017107, 1461683364, 1),
(2, '1234', '123456', '734250020@qq.com', 1462070115, 2130706433, 2130706433, 1465027161, 1462070115, 1),
(6, 'zhangfei', '123456', '656186117@qq.com', 1464337166, 2130706433, 2130706433, 1464959913, 1464337166, 1);

-- --------------------------------------------------------

--
-- 表的结构 `yz_weibo`
--

CREATE TABLE IF NOT EXISTS `yz_weibo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `content` text NOT NULL,
  `create_time` int(11) NOT NULL,
  `comment_count` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `is_top` tinyint(4) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `data` text,
  `repost_count` int(11) DEFAULT '0',
  `support_count` int(11) NOT NULL DEFAULT '0',
  `from_where` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=173 ;

--
-- 转存表中的数据 `yz_weibo`
--

INSERT INTO `yz_weibo` (`id`, `uid`, `content`, `create_time`, `comment_count`, `status`, `is_top`, `type`, `data`, `repost_count`, `support_count`, `from_where`) VALUES
(144, 1, '你好世界', 1464606754, 0, 1, NULL, 'image', 'a:1:{s:9:"attach_id";s:2:"55";}', 0, 2, NULL),
(145, 2, '哈哈哈', 1464607053, 0, 1, NULL, 'image', 'a:1:{s:9:"attach_id";s:2:"56";}', 0, 2, NULL),
(147, 6, '你好，宇智波佐助', 1464607467, 0, 1, NULL, 'image', 'a:1:{s:9:"attach_id";s:2:"58";}', 0, 2, NULL),
(156, 1, '哈哈哈', 1464608895, 0, 1, NULL, 'image', 'a:1:{s:9:"attach_id";s:2:"62";}', 0, 0, NULL),
(158, 1, '你好世界，我是php', 1464609527, 0, 1, NULL, 'image', 'a:1:{s:9:"attach_id";s:2:"64";}', 0, 1, NULL),
(159, 1, '斑马斑马，你睡吧睡吧！', 1464609673, 0, 1, NULL, 'image', 'a:1:{s:9:"attach_id";s:2:"65";}', 0, 1, NULL),
(160, 1, '大师大师大师', 1464609832, 0, 1, NULL, 'image', 'a:1:{s:9:"attach_id";s:2:"66";}', 0, 2, NULL),
(163, 1, '世界那么大，我想出去走走：D', 1464916677, 0, 1, NULL, 'feed', 'a:1:{s:9:"attach_id";s:0:"";}', 0, 1, NULL),
(165, 2, '国光帮帮忙！', 1464959846, 0, 1, NULL, 'image', 'a:1:{s:9:"attach_id";s:2:"69";}', 0, 1, NULL),
(166, 6, '电玩正妹现身！男人的最爱！', 1464959940, 0, 1, NULL, 'feed', 'a:1:{s:9:"attach_id";s:0:"";}', 0, 1, NULL),
(167, 6, '三号蛮吸引人的', 1464959982, 0, 1, NULL, 'image', 'a:1:{s:9:"attach_id";s:2:"70";}', 0, 0, NULL),
(168, 1, '我的睡美人啊！：D', 1465020792, 0, 1, NULL, 'image', 'a:1:{s:9:"attach_id";s:2:"71";}', 0, 0, NULL),
(169, 1, 'lonely：D', 1465021291, 0, 1, NULL, 'image', 'a:1:{s:9:"attach_id";s:2:"72";}', 0, 0, NULL),
(170, 1, 'LoL，what the fuck：（', 1465021353, 0, 1, NULL, 'image', 'a:1:{s:9:"attach_id";s:2:"73";}', 0, 0, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `yz_weibo_comment`
--

CREATE TABLE IF NOT EXISTS `yz_weibo_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `weibo_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `create_time` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `to_comment_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=37 ;

--
-- 转存表中的数据 `yz_weibo_comment`
--

INSERT INTO `yz_weibo_comment` (`id`, `uid`, `weibo_id`, `content`, `create_time`, `status`, `to_comment_id`) VALUES
(21, 1, 52, '2222222', 1463201815, 1, 0),
(22, 2, 53, '11111', 1463242252, 1, 0),
(23, 2, 53, '3333', 1463242398, 1, 0),
(24, 1, 61, '1111111', 1463374985, 1, 0),
(25, 1, 61, '33333333', 1463374992, 1, 0),
(26, 1, 57, '444444', 1463375032, 1, 0),
(27, 1, 63, '11111', 1463407244, 1, 0),
(28, 1, 64, '你妈', 1463407265, 1, 0),
(29, 1, 64, '哈哈', 1463407849, 1, 0),
(30, 1, 57, '1111', 1463411725, 1, 0),
(31, 1, 74, 'NIHAO', 1463549942, 1, 0),
(32, 1, 75, '哈哈哈', 1463551589, 1, 0),
(33, 1, 75, '哈哈哈', 1463551998, 1, 0),
(34, 1, 73, 'sb', 1463552035, 1, 0),
(35, 1, 83, '111111', 1463813160, 1, 0),
(36, 1, 90, '你好', 1463904315, 1, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
