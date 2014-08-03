SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- 用户表
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增主键',
  `mail` varchar(255) NOT NULL COMMENT '邮箱地址',
  `password` varchar(255) NOT NULL COMMENT '密码（md5加密）',
  `nickname` varchar(255) NOT NULL COMMENT '昵称',
  `location` varchar(255) COMMENT '居住地',
  `avatar`   varchar(128) NOT NULL COMMENT '头像',
  `group`	varchar(16) NOT NULL COMMENT '所属组',
  `register_time` datetime NOT NULL COMMENT '注册时间',
  `last_login_time` datetime NOT NULL COMMENT '最近一次登录时间',
  PRIMARY KEY (`uid`),
  UNIQUE KEY `name` (`nickname`,`mail`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='用户表';

INSERT INTO `users` VALUES(1, 'bzyzwang@163.com', 'b713fa25054286805a947a2586381e2c', '极地', 'xxx', 'admin', '2014-07-01 00:00:00', '2014-07-01 00:00:00');

-- ----------------------------
-- 文章表
-- ----------------------------
DROP TABLE IF EXISTS `items`;
CREATE TABLE `items` (
  `iid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'post表主键',
  `parent_id` int(10) unsigned COMMENT '父id',
  `title` varchar(200) NOT NULL COMMENT '内容标题',
  `slug` varchar(200) DEFAULT NULL COMMENT '内容缩略名',
  `created` datetime NOT NULL COMMENT '内容生成时的GMT unix时间戳',
  `modified` datetime NOT NULL COMMENT '内容更改时的GMT unix时间戳',
  `text` text NOT NULL COMMENT '内容文字',
  `cover` varchar(128) NOT NULL COMMENT '配图',
  `author_id` int(10) unsigned NOT NULL COMMENT '用户id',
  `type` varchar(16) DEFAULT 'post' NOT NULL COMMENT '内容类别',
  `status` varchar(16) DEFAULT 'publish' NOT NULL COMMENT '内容状态',
  `comment_count` int(10) unsigned DEFAULT '0' COMMENT '评论数',
  `praise_count` int(10) unsigned DEFAULT '0' COMMENT '点赞数',
  PRIMARY KEY (`iid`),
  KEY `created` (`created`),
  KEY `author_id` (`author_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

-- ----------------------------
-- 话题表
-- ----------------------------
DROP TABLE IF EXISTS `topics`;
CREATE TABLE `topics` (
	`tid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'topic表主键',
	`t_title` varchar(200) NOT NULL COMMENT '话题名称',
	`t_excerpt` varchar(200) NOT NULL COMMENT '话题摘要',
	`t_cover` varchar(128) NOT NULL COMMENT '配图',
	`t_author_id` int(10) unsigned NOT NULL COMMENT '用户id',
	`t_created` datetime NOT NULL COMMENT '内容生成时的GMT unix时间戳',
	`t_modified` datetime NOT NULL COMMENT '内容更改时的GMT unix时间戳',
	PRIMARY KEY (`tid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

-- ----------------------------
-- 管理音乐表
-- ----------------------------
DROP TABLE IF EXISTS `musics`;
CREATE TABLE `musics` (
	`pid` int(10) unsigned NOT NULL COMMENT '父',
	`source` varchar(200) DEFAULT NULL COMMENT '来源',
	`mp3_url` varchar(128) COMMENT 'mp3地址',
	`web_url` varchar(128) COMMENT '网页播放地址',
	`mobile_url` varchar(128) COMMENT '手机播放地址',
	PRIMARY KEY (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------

-- ----------------------------
-- 点赞表
-- ----------------------------
DROP TABLE IF EXISTS `praises`;
CREATE TABLE `praises` (
  `p_author` int(10) unsigned NOT NULL COMMENT '点赞者id',
  `p_item` int(10) unsigned NOT NULL COMMENT '被点赞的文章id',
  `created` datetime NOT NULL COMMENT '点赞时间',
  PRIMARY KEY (`p_author`,`p_item`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------

-- 关系表
-- ----------------------------
DROP TABLE IF EXISTS `relationships`;
CREATE TABLE `relationships` (
  `parent_id` int(10) unsigned NOT NULL COMMENT '父',
  `child_id` int(10) unsigned NOT NULL COMMENT '从属',
  PRIMARY KEY (`parent_id`,`child_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- ----------------------------
-- 私信表
-- ----------------------------

DROP TABLE IF EXISTS `letters`;
CREATE TABLE `letters` (
  `lid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '私信表主键',
  `content` text NOT NULL COMMENT '正文',
  `sender_id` int(11) unsigned NOT NULL COMMENT '发信人id',
  `receiver_id` int(11) unsigned NOT NULL COMMENT '收信人id',
  `unread` int(11) unsigned NOT NULL COMMENT '父id',
  `created` datetime NOT NULL COMMENT '内容生成时的GMT unix时间戳',
  `modified` datetime NOT NULL COMMENT '内容更改时的GMT unix时间戳',
  PRIMARY KEY (`lid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

-- ----------------------------
-- 评论表
-- ----------------------------

DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `cid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '评论表主键',
  `item_id` int(10) unsigned NOT NULL COMMENT '所属文章id',
  `author_id` int(11) unsigned NOT NULL COMMENT '评论作者id',
  `parent_id` int(11) unsigned NOT NULL COMMENT '父评论id',
  `content` varchar(200) NOT NULL COMMENT '正文',
  `agent` varchar(255) NOT NULL COMMENT '用户代理信息',
  `ip`  varchar(100) NOT NULL COMMENT '用户ip',
  `created` datetime NOT NULL COMMENT '内容生成时的GMT unix时间戳',
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;
