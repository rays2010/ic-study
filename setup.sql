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
  `avatar`   varchar(128) NOT NULL COMMENT '头像',
  `group`	varchar(16) NOT NULL COMMENT '所属组',
  `register_time` datetime NOT NULL COMMENT '注册时间',
  `last_login_time` datetime NOT NULL COMMENT '最近一次登录时间',
  PRIMARY KEY (`uid`),
  UNIQUE KEY `name` (`nickname`,`mail`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='用户表';

INSERT INTO `users` VALUES(1, 'bzyzwang@163.com', 'b713fa25054286805a947a2586381e2c', '极地', 'xxx', 'admin', '2014-07-01 00:00:00', '2014-07-01 00:00:00');