# HeidiSQL Dump 
#
# --------------------------------------------------------
# Host:                         127.0.0.1
# Database:                     pvr
# Server version:               5.1.23-rc-community
# Server OS:                    Win32
# Target compatibility:         mysqldump+mysqlcli 5.0
# Target max_allowed_packet:    1048576
# HeidiSQL version:             4.0 RC3
# Date/time:                    2009-03-26 22:11:34
# --------------------------------------------------------

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0*/;


#
# Database structure for database 'pvr'
#

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `pvr` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `pvr`;


#
# Table structure for table 'acos'
#

CREATE TABLE /*!32312 IF NOT EXISTS*/ `acos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=utf8;



#
# Dumping data for table 'acos'
#

LOCK TABLES `acos` WRITE;
/*!40000 ALTER TABLE `acos` DISABLE KEYS*/;
REPLACE INTO `acos` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
	(1,NULL,NULL,NULL,'controllers',1,112),
	(2,1,NULL,NULL,'Users',2,35),
	(3,2,NULL,NULL,'index',3,4),
	(4,2,NULL,NULL,'login',5,6),
	(5,2,NULL,NULL,'logout',7,8),
	(6,2,NULL,NULL,'reg',9,10),
	(7,2,NULL,NULL,'thanks',11,12),
	(8,2,NULL,NULL,'reset',13,14),
	(9,2,NULL,NULL,'edit',15,16),
	(10,2,NULL,NULL,'delete',17,18),
	(11,2,NULL,NULL,'view',19,20),
	(12,2,NULL,NULL,'admin_index',21,22),
	(13,2,NULL,NULL,'admin_edit',23,24),
	(14,2,NULL,NULL,'admin_delete',25,26),
	(15,2,NULL,NULL,'admin_view',27,28),
	(16,2,NULL,NULL,'acoset',29,30),
	(17,2,NULL,NULL,'aroset',31,32),
	(18,2,NULL,NULL,'permset',33,34),
	(19,1,NULL,NULL,'Groups',36,57),
	(20,19,NULL,NULL,'index',37,38),
	(21,19,NULL,NULL,'view',39,40),
	(22,19,NULL,NULL,'add',41,42),
	(23,19,NULL,NULL,'edit',43,44),
	(24,19,NULL,NULL,'delete',45,46),
	(25,19,NULL,NULL,'admin_index',47,48),
	(26,19,NULL,NULL,'admin_view',49,50),
	(27,19,NULL,NULL,'admin_add',51,52),
	(28,19,NULL,NULL,'admin_edit',53,54),
	(29,19,NULL,NULL,'admin_delete',55,56),
	(30,1,NULL,NULL,'Albums',58,89),
	(31,30,NULL,NULL,'index',59,60),
	(32,30,NULL,NULL,'view',61,62),
	(33,30,NULL,NULL,'add',63,64),
	(34,30,NULL,NULL,'edit',65,66),
	(35,30,NULL,NULL,'delete',67,68),
	(36,30,NULL,NULL,'admin_index',69,70),
	(37,30,NULL,NULL,'admin_view',71,72),
	(38,30,NULL,NULL,'admin_add',73,74),
	(39,30,NULL,NULL,'admin_edit',75,76),
	(40,30,NULL,NULL,'admin_delete',77,78),
	(41,1,NULL,NULL,'Images',90,111),
	(42,41,NULL,NULL,'index',91,92),
	(43,41,NULL,NULL,'view',93,94),
	(44,41,NULL,NULL,'add',95,96),
	(45,41,NULL,NULL,'edit',97,98),
	(46,41,NULL,NULL,'delete',99,100),
	(47,41,NULL,NULL,'admin_index',101,102),
	(48,41,NULL,NULL,'admin_view',103,104),
	(49,41,NULL,NULL,'admin_add',105,106),
	(50,41,NULL,NULL,'admin_edit',107,108),
	(51,41,NULL,NULL,'admin_delete',109,110),
	(98,30,'Album',1,NULL,79,80),
	(99,30,'Album',2,NULL,81,82),
	(100,30,'Album',3,NULL,83,84),
	(101,30,'Album',4,NULL,85,86),
	(102,30,'Album',5,NULL,87,88);
/*!40000 ALTER TABLE `acos` ENABLE KEYS*/;
UNLOCK TABLES;


#
# Table structure for table 'albums'
#

CREATE TABLE /*!32312 IF NOT EXISTS*/ `albums` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(150) NOT NULL DEFAULT '',
  `image` text,
  `image_count` int(12) unsigned DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;



#
# Dumping data for table 'albums'
#

LOCK TABLES `albums` WRITE;
/*!40000 ALTER TABLE `albums` DISABLE KEYS*/;
REPLACE INTO `albums` (`id`, `user_id`, `name`, `image`, `image_count`, `created`, `modified`) VALUES
	('1',14,'newAlbum','default.jpg','49','2009-03-16 16:43:04','2009-03-16 16:43:04'),
	('2',15,'newAlbum','default.jpg','0','2009-03-16 17:09:05','2009-03-16 17:09:05'),
	('3',1,'newAlbum','default.jpg','0','2009-03-16 18:46:19','2009-03-16 18:46:19'),
	('4',1,'albumAdmin','default.jpg','25','2009-03-16 18:47:42','2009-03-16 18:47:42'),
	('5',16,'newAlbum','default.jpg','0','2009-03-16 20:49:02','2009-03-16 20:49:02');
/*!40000 ALTER TABLE `albums` ENABLE KEYS*/;
UNLOCK TABLES;


#
# Table structure for table 'aros'
#

CREATE TABLE /*!32312 IF NOT EXISTS*/ `aros` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;



#
# Dumping data for table 'aros'
#

LOCK TABLES `aros` WRITE;
/*!40000 ALTER TABLE `aros` DISABLE KEYS*/;
REPLACE INTO `aros` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
	(1,NULL,'Group',1,'Admin',1,8),
	(2,1,'Group',2,'Super',2,5),
	(3,NULL,'Group',3,'Moderator ',9,10),
	(4,NULL,'Group',4,'User',11,18),
	(5,NULL,'Group',5,'Guest',19,20),
	(7,1,'User',1,'Admin::1',6,7),
	(8,2,'User',2,'Kondrat::2',3,4),
	(20,4,'User',14,NULL,12,13),
	(21,4,'User',15,NULL,14,15),
	(22,4,'User',16,NULL,16,17);
/*!40000 ALTER TABLE `aros` ENABLE KEYS*/;
UNLOCK TABLES;


#
# Table structure for table 'aros_acos'
#

CREATE TABLE /*!32312 IF NOT EXISTS*/ `aros_acos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `aro_id` int(10) NOT NULL,
  `aco_id` int(10) NOT NULL,
  `_create` varchar(2) NOT NULL DEFAULT '0',
  `_read` varchar(2) NOT NULL DEFAULT '0',
  `_update` varchar(2) NOT NULL DEFAULT '0',
  `_delete` varchar(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `ARO_ACO_KEY` (`aro_id`,`aco_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;



#
# Dumping data for table 'aros_acos'
#

LOCK TABLES `aros_acos` WRITE;
/*!40000 ALTER TABLE `aros_acos` DISABLE KEYS*/;
REPLACE INTO `aros_acos` (`id`, `aro_id`, `aco_id`, `_create`, `_read`, `_update`, `_delete`) VALUES
	(1,1,1,'1','1','1','1'),
	(4,5,30,'1','1','1','1'),
	(11,4,30,'-1','-1','-1','-1'),
	(23,4,33,'1','1','1','1'),
	(26,7,100,'1','1','1','1'),
	(27,7,101,'1','1','1','1');
/*!40000 ALTER TABLE `aros_acos` ENABLE KEYS*/;
UNLOCK TABLES;


#
# Table structure for table 'groups'
#

CREATE TABLE /*!32312 IF NOT EXISTS*/ `groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;



#
# Dumping data for table 'groups'
#

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS*/;
REPLACE INTO `groups` (`id`, `name`) VALUES
	('1','admin'),
	('2','super'),
	('3','moderator'),
	('4','user'),
	('5','guest');
/*!40000 ALTER TABLE `groups` ENABLE KEYS*/;
UNLOCK TABLES;


#
# Table structure for table 'images'
#

CREATE TABLE /*!32312 IF NOT EXISTS*/ `images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `album_id` int(10) unsigned DEFAULT NULL,
  `name` varchar(150) NOT NULL DEFAULT '',
  `farm` int(10) unsigned DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  `image` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `album` (`album_id`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8;



#
# Dumping data for table 'images'
#

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS*/;
REPLACE INTO `images` (`id`, `album_id`, `name`, `farm`, `path`, `image`, `created`, `modified`) VALUES
	('1','1','',NULL,NULL,'0_5bbd_8529a79a_orig0.jpg','2009-03-16 19:38:26','2009-03-16 19:38:26'),
	('2','4','',NULL,NULL,'49827-49bfd683bc3f4.jpg','2009-03-17 19:57:40','2009-03-17 19:57:40'),
	('3','4','',NULL,NULL,'84070-49bfd7bd7fb28.jpg','2009-03-17 20:02:54','2009-03-17 20:02:54'),
	('4','4','',NULL,NULL,'88235-49bfd7c78db00.jpg','2009-03-17 20:03:04','2009-03-17 20:03:04'),
	('5','4','',NULL,NULL,'93018-49bfd8614edf1.jpg','2009-03-17 20:05:38','2009-03-17 20:05:38'),
	('6','4','',NULL,NULL,'91680-49bfd89b074b3.jpg','2009-03-17 20:06:35','2009-03-17 20:06:35'),
	('7','4','',NULL,NULL,'28268-49bfd944411d8.jpg','2009-03-17 20:09:24','2009-03-17 20:09:24'),
	('8','4','',NULL,NULL,'93906-49bfd992a7eb5.jpg','2009-03-17 20:10:42','2009-03-17 20:10:42'),
	('9','4','',NULL,NULL,'46876-49bfd9c750425.jpg','2009-03-17 20:11:35','2009-03-17 20:11:35'),
	('10','4','',NULL,NULL,'78952-49bfdb1fd92d9.jpg','2009-03-17 20:17:22','2009-03-17 20:17:22'),
	('11','4','',NULL,NULL,'48110-49bfdb3da03c4.jpg','2009-03-17 20:17:51','2009-03-17 20:17:51'),
	('12','4','',NULL,NULL,'14751-49bfdbd0420e3.jpg','2009-03-17 20:20:16','2009-03-17 20:20:16'),
	('13','4','',NULL,NULL,'41976-49bfdbe1efb90.jpg','2009-03-17 20:20:34','2009-03-17 20:20:34'),
	('14','4','',NULL,NULL,'83674-49bfdc0753cb0.jpg','2009-03-17 20:21:11','2009-03-17 20:21:11'),
	('15','4','',NULL,NULL,'21379-49bfe4db84b11','2009-03-17 20:58:51','2009-03-17 20:58:51'),
	('16','4','',NULL,NULL,'14496-49bfe51defe54','2009-03-17 20:59:58','2009-03-17 20:59:58'),
	('17','4','',NULL,NULL,'67274-49bfe59040213','2009-03-17 21:02:01','2009-03-17 21:02:01'),
	('18','4','',NULL,NULL,'87287-49bfe5ff0f1f0','2009-03-17 21:03:52','2009-03-17 21:03:52'),
	('19','4','',NULL,NULL,'24540-49bfe67e982e8','2009-03-17 21:05:51','2009-03-17 21:05:51'),
	('20','4','',NULL,NULL,'57794-49bfe98eca344','2009-03-17 21:18:55','2009-03-17 21:18:55'),
	('21','4','',NULL,NULL,'60172-49bfea40b0736','2009-03-17 21:21:52','2009-03-17 21:21:52'),
	('22','4','',NULL,NULL,'30892-49bfeaf63ebb6','2009-03-17 21:24:54','2009-03-17 21:24:54'),
	('23','4','',NULL,NULL,'63483-49bfeb7353f60','2009-03-17 21:27:00','2009-03-17 21:27:00'),
	('24','4','',NULL,NULL,'10951-49bfebd057a75','2009-03-17 21:28:32','2009-03-17 21:28:32'),
	('25','4','',NULL,NULL,'32844-49bfec0a94933','2009-03-17 21:29:30','2009-03-17 21:29:30'),
	('26','4','',NULL,NULL,'21579-49bfec206075f','2009-03-17 21:29:53','2009-03-17 21:29:53'),
	('27','1','',NULL,NULL,'30410-49c0ef5b19f44','2009-03-18 15:55:55','2009-03-18 15:55:55'),
	('28','1','',NULL,NULL,'74901-49c0f5571bbcf','2009-03-18 16:21:27','2009-03-18 16:21:27'),
	('29','1','',NULL,NULL,'26698-49c0f5fb1c6cb','2009-03-18 16:24:11','2009-03-18 16:24:11'),
	('30','1','',NULL,NULL,'67092-49c0f88433112','2009-03-18 16:35:00','2009-03-18 16:35:00'),
	('31','1','',NULL,NULL,'50375-49c234f38153a','2009-03-19 15:05:08','2009-03-19 15:05:08'),
	('32','1','',NULL,NULL,'56232-49c235ab65f5f','2009-03-19 15:08:11','2009-03-19 15:08:11'),
	('33','1','',NULL,NULL,'93982-49c37b3fed53d','2009-03-20 14:17:21','2009-03-20 14:17:21'),
	('34','1','',NULL,NULL,'25173-49cb83d7c8ae7','2009-03-26 16:32:08','2009-03-26 16:32:08'),
	('35','1','',NULL,NULL,'29691-49cb89375f18e','2009-03-26 16:55:04','2009-03-26 16:55:04'),
	('36','1','',NULL,NULL,'92245-49cb8943dd299','2009-03-26 16:55:16','2009-03-26 16:55:16'),
	('37','1','',NULL,NULL,'78124-49cb899f88c9a','2009-03-26 16:56:48','2009-03-26 16:56:48'),
	('38','1','',NULL,NULL,'50303-49cb89abb5cfd','2009-03-26 16:57:00','2009-03-26 16:57:00'),
	('39','1','',NULL,NULL,'12471-49cb8a126e541','2009-03-26 16:58:43','2009-03-26 16:58:43'),
	('40','1','',NULL,NULL,'14710-49cb8c095c182','2009-03-26 17:07:06','2009-03-26 17:07:06'),
	('41','1','',NULL,NULL,'41142-49cb8c13dc6d0','2009-03-26 17:07:16','2009-03-26 17:07:16'),
	('42','1','',NULL,NULL,'56490-49cb8c66ab37a','2009-03-26 17:08:40','2009-03-26 17:08:40'),
	('43','1','',NULL,NULL,'11820-49cb8c727e158','2009-03-26 17:08:51','2009-03-26 17:08:51'),
	('44','1','',NULL,NULL,'29628-49cb8ce7d0a3d','2009-03-26 17:10:48','2009-03-26 17:10:48'),
	('45','1','',NULL,NULL,'36992-49cb8d9461769','2009-03-26 17:13:41','2009-03-26 17:13:41'),
	('46','1','',NULL,NULL,'15166-49cb8da1f0e6a','2009-03-26 17:13:54','2009-03-26 17:13:54'),
	('47','1','',NULL,NULL,'93497-49cb94571b841','2009-03-26 17:42:32','2009-03-26 17:42:32'),
	('48','1','',NULL,NULL,'69788-49cba31922169','2009-03-26 18:45:29','2009-03-26 18:45:29'),
	('49','1','',NULL,NULL,'34809-49cba53cc19cf','2009-03-26 18:54:36','2009-03-26 18:54:36'),
	('50','1','',NULL,NULL,'97873-49cba76d8d5d4','2009-03-26 19:03:58','2009-03-26 19:03:58'),
	('51','1','',NULL,NULL,'13997-49cba77d7a6c2','2009-03-26 19:04:13','2009-03-26 19:04:13'),
	('52','1','',NULL,NULL,'61226-49cbb5af79f52','2009-03-26 20:04:48','2009-03-26 20:04:48'),
	('53','1','',NULL,NULL,'84196-49cbb94206190','2009-03-26 20:20:02','2009-03-26 20:20:02'),
	('54','1','',NULL,NULL,'24649-49cbb94a93e03','2009-03-26 20:20:10','2009-03-26 20:20:10'),
	('55','1','',NULL,NULL,'79509-49cbbb6167f29','2009-03-26 20:29:05','2009-03-26 20:29:05'),
	('56','1','',NULL,NULL,'92953-49cbbc1b00c5d','2009-03-26 20:32:11','2009-03-26 20:32:11'),
	('57','1','',NULL,NULL,'66142-49cbbe5205d25','2009-03-26 20:41:38','2009-03-26 20:41:38'),
	('58','1','',NULL,NULL,'17650-49cbc54fca80f','2009-03-26 21:11:28','2009-03-26 21:11:28'),
	('59','1','',NULL,NULL,'10562-49cbc59a0e0c5-lrg','2009-03-26 21:12:42','2009-03-26 21:12:42'),
	('60','1','',NULL,NULL,'45985-49cbc65f0499f-lrg','2009-03-26 21:15:59','2009-03-26 21:15:59'),
	('61','1','',NULL,NULL,'63042-49cbc80eace9f-md','2009-03-26 21:23:11','2009-03-26 21:23:11'),
	('62','1','',NULL,NULL,'33409-49cbc8c4edf9f-md','2009-03-26 21:26:13','2009-03-26 21:26:13'),
	('63','1','',NULL,NULL,'14188-49cbc8db48ab2-lrg','2009-03-26 21:26:35','2009-03-26 21:26:35'),
	('64','1','',NULL,NULL,'78060-49cbc962377f0-md','2009-03-26 21:28:51','2009-03-26 21:28:51'),
	('65','1','',NULL,NULL,'71033-49cbc980a13f3-md','2009-03-26 21:29:21','2009-03-26 21:29:21'),
	('66','1','',NULL,NULL,'78154-49cbc9d299ab0-lrg','2009-03-26 21:30:42','2009-03-26 21:30:42'),
	('67','1','',NULL,NULL,'66830-49cbc9ef0c8fb-md','2009-03-26 21:31:11','2009-03-26 21:31:11'),
	('68','1','',NULL,NULL,'61578-49cbcad72b492-md','2009-03-26 21:35:04','2009-03-26 21:35:04'),
	('69','1','',NULL,NULL,'67436-49cbcb006c50d-md','2009-03-26 21:35:45','2009-03-26 21:35:45'),
	('70','1','',NULL,NULL,'53834-49cbd0a388a4a-md','2009-03-26 21:59:48','2009-03-26 21:59:48'),
	('71','1','',NULL,NULL,'33956-49cbd0b0e849b-md','2009-03-26 22:00:01','2009-03-26 22:00:01'),
	('72','1','',NULL,NULL,'52037-49cbd0ba8f126-lrg','2009-03-26 22:00:10','2009-03-26 22:00:10'),
	('73','1','',NULL,NULL,'19560-49cbd0c1bb8e0-md','2009-03-26 22:00:20','2009-03-26 22:00:20'),
	('74','1','',NULL,NULL,'35063-49cbd0cf4fdfc-md','2009-03-26 22:00:32','2009-03-26 22:00:32');
/*!40000 ALTER TABLE `images` ENABLE KEYS*/;
UNLOCK TABLES;


#
# Table structure for table 'users'
#

CREATE TABLE /*!32312 IF NOT EXISTS*/ `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `group_id` int(11) NOT NULL DEFAULT '0',
  `password` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `uuid` varchar(50) NOT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `company` varchar(50) DEFAULT NULL,
  `business` text,
  `website` varchar(250) DEFAULT NULL,
  `address1` text,
  `bank_detail` text,
  `active` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `uuid` (`uuid`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;



#
# Dumping data for table 'users'
#

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS*/;
REPLACE INTO `users` (`id`, `username`, `group_id`, `password`, `email`, `uuid`, `phone`, `company`, `business`, `website`, `address1`, `bank_detail`, `active`, `created`, `birthday`) VALUES
	('1','admin',1,'c129b324aee662b04eccf68babba85851346dff9','4116457@mail.ru','49be585a29f64',NULL,NULL,NULL,NULL,NULL,NULL,0,'0000-00-00 00:00:00',NULL),
	('2','kondrat',2,'c129b324aee662b04eccf68babba85851346dff9','4116458@mail.ru','49be585a29f76',NULL,NULL,NULL,NULL,NULL,NULL,0,'0000-00-00 00:00:00',NULL),
	('14','user3',4,'c129b324aee662b04eccf68babba85851346dff9','sdfd4@mmm.rl','49be5768a8f30',NULL,NULL,NULL,NULL,NULL,NULL,0,'2009-03-16 16:43:04',NULL),
	('15','user4',4,'c129b324aee662b04eccf68babba85851346dff9','sdfd41@mmm.rl','49be5d81b1fd5',NULL,NULL,NULL,NULL,NULL,NULL,0,'2009-03-16 17:09:05',NULL),
	('16','user5',4,'c129b324aee662b04eccf68babba85851346dff9','sss5@mm.ru','49be910e8f83b',NULL,NULL,NULL,NULL,NULL,NULL,0,'2009-03-16 20:49:02',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS*/;
UNLOCK TABLES;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS*/;
