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
# Date/time:                    2009-03-04 22:05:17
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
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=utf8;



#
# Dumping data for table 'acos'
#

LOCK TABLES `acos` WRITE;
/*!40000 ALTER TABLE `acos` DISABLE KEYS*/;
REPLACE INTO `acos` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
	(1,NULL,NULL,NULL,'controllers',1,130),
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
	(30,1,NULL,NULL,'Albums',58,107),
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
	(41,1,NULL,NULL,'Images',108,129),
	(42,41,NULL,NULL,'index',109,110),
	(43,41,NULL,NULL,'view',111,112),
	(44,41,NULL,NULL,'add',113,114),
	(45,41,NULL,NULL,'edit',115,116),
	(46,41,NULL,NULL,'delete',117,118),
	(47,41,NULL,NULL,'admin_index',119,120),
	(48,41,NULL,NULL,'admin_view',121,122),
	(49,41,NULL,NULL,'admin_add',123,124),
	(50,41,NULL,NULL,'admin_edit',125,126),
	(51,41,NULL,NULL,'admin_delete',127,128),
	(74,30,'Album',1,NULL,79,80),
	(75,30,'Album',2,NULL,81,82),
	(76,30,'Album',3,NULL,83,84),
	(84,30,'Album',4,NULL,85,86),
	(85,30,'Album',5,NULL,87,88),
	(86,30,'Album',6,NULL,89,90),
	(87,30,'Album',7,NULL,91,92),
	(88,30,'Album',8,NULL,93,94),
	(89,30,'Album',9,NULL,95,96),
	(90,30,'Album',10,NULL,97,98),
	(91,30,'Album',11,NULL,99,100),
	(92,30,'Album',12,NULL,101,102),
	(93,30,'Album',13,NULL,103,104),
	(94,30,'Album',14,NULL,105,106);
/*!40000 ALTER TABLE `acos` ENABLE KEYS*/;
UNLOCK TABLES;


#
# Table structure for table 'albums'
#

CREATE TABLE /*!32312 IF NOT EXISTS*/ `albums` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(150) NOT NULL DEFAULT '',
  `path` char(32) DEFAULT NULL,
  `image` text,
  `image_count` int(12) unsigned DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;



#
# Dumping data for table 'albums'
#

LOCK TABLES `albums` WRITE;
/*!40000 ALTER TABLE `albums` DISABLE KEYS*/;
REPLACE INTO `albums` (`id`, `user_id`, `name`, `path`, `image`, `image_count`, `created`, `modified`) VALUES
	('1',11,'newAlbum1',NULL,'default.jpg <br /><br />vjhvb<br /><br />bo','32','2009-02-19 17:50:53','2009-03-04 19:18:39'),
	('2',12,'newAlbum2',NULL,'default.jpg\r\n234','56','2009-02-19 21:04:26','2009-03-04 18:04:16'),
	('3',13,'newAlbum3',NULL,'sdf sdfg  fdg','1','2009-02-19 21:13:30','2009-03-04 19:07:29'),
	('14',2,'dddd23','8c923eab54c82b76963da9deddb61f9a','ssww','0','2009-03-04 22:01:26','2009-03-04 22:01:26');
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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;



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
	(17,4,'User',11,'user8::11',12,13),
	(18,4,'User',12,NULL,14,15),
	(19,4,'User',13,NULL,16,17);
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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;



#
# Dumping data for table 'aros_acos'
#

LOCK TABLES `aros_acos` WRITE;
/*!40000 ALTER TABLE `aros_acos` DISABLE KEYS*/;
REPLACE INTO `aros_acos` (`id`, `aro_id`, `aco_id`, `_create`, `_read`, `_update`, `_delete`) VALUES
	(1,1,1,'1','1','1','1'),
	(4,5,30,'1','1','1','1'),
	(11,4,30,'-1','-1','-1','-1'),
	(12,8,84,'1','1','1','1'),
	(13,8,85,'1','1','1','1'),
	(14,8,86,'1','1','1','1'),
	(15,8,87,'1','1','1','1'),
	(16,8,88,'1','1','1','1'),
	(17,8,89,'1','1','1','1'),
	(18,8,90,'1','1','1','1'),
	(19,8,91,'1','1','1','1'),
	(20,8,92,'1','1','1','1'),
	(21,8,93,'1','1','1','1'),
	(22,8,94,'1','1','1','1');
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
  `image` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `album` (`album_id`)
) ENGINE=InnoDB AUTO_INCREMENT=143 DEFAULT CHARSET=utf8;



#
# Dumping data for table 'images'
#

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS*/;
REPLACE INTO `images` (`id`, `album_id`, `name`, `image`, `created`, `modified`) VALUES
	('43','2','sdf','3230-20.jpg','2009-03-02 13:07:15','2009-03-04 17:53:24'),
	('44','2','','32300.jpg','2009-03-02 17:30:12','2009-03-02 17:30:12'),
	('45','2','','DSC051570.JPG','2009-03-02 18:32:53','2009-03-02 18:32:53'),
	('46','2','','test20.jpg','2009-03-02 18:33:57','2009-03-02 18:33:57'),
	('48','2','','199837_source1.jpg','2009-03-02 18:51:05','2009-03-02 18:51:05'),
	('49','2','','199837_source2.jpg','2009-03-02 18:51:08','2009-03-02 18:51:08'),
	('50','1','','logo_ferre0.jpg','2009-03-02 18:52:56','2009-03-02 18:52:56'),
	('51','1','','logo_usb0.jpg','2009-03-02 18:53:02','2009-03-02 18:53:02'),
	('52','2','','test21.jpg','2009-03-02 18:53:49','2009-03-02 18:53:49'),
	('53','2','','3230-30.jpg','2009-03-02 20:19:04','2009-03-02 20:19:04'),
	('54','2','','3230-31.jpg','2009-03-02 20:20:24','2009-03-02 20:20:24'),
	('55','2','','3230-32.jpg','2009-03-02 20:20:59','2009-03-02 20:20:59'),
	('56','2','','3230-33.jpg','2009-03-02 20:21:56','2009-03-02 20:21:56'),
	('57','2','','3230-34.jpg','2009-03-02 20:23:07','2009-03-02 20:23:07'),
	('58','2','','3230-35.jpg','2009-03-02 20:23:12','2009-03-02 20:23:12'),
	('59','2','','test22.jpg','2009-03-02 20:23:47','2009-03-02 20:23:47'),
	('60','2','','test23.jpg','2009-03-02 20:24:45','2009-03-02 20:24:45'),
	('61','2','','test24.jpg','2009-03-02 20:25:02','2009-03-02 20:25:02'),
	('62','2','','test25.jpg','2009-03-02 20:25:30','2009-03-02 20:25:30'),
	('63','2','','test26.jpg','2009-03-02 20:25:46','2009-03-02 20:25:46'),
	('64','2','','test27.jpg','2009-03-02 20:27:53','2009-03-02 20:27:53'),
	('65','2','','test10.JPG','2009-03-02 20:29:09','2009-03-02 20:29:09'),
	('66','2','','test11.JPG','2009-03-02 20:37:21','2009-03-02 20:37:21'),
	('67','2','','test12.JPG','2009-03-02 20:37:31','2009-03-02 20:37:31'),
	('68','2','','test13.JPG','2009-03-02 20:38:44','2009-03-02 20:38:44'),
	('69','2','','test14.JPG','2009-03-02 20:40:13','2009-03-02 20:40:13'),
	('70','2','','DSC051571.JPG','2009-03-02 20:40:56','2009-03-02 20:40:56'),
	('71','2','','DSC051572.JPG','2009-03-02 20:42:16','2009-03-02 20:42:16'),
	('72','2','','199837_source20.jpg','2009-03-02 20:42:38','2009-03-02 20:42:38'),
	('73','2','','DSC051580.JPG','2009-03-02 20:44:03','2009-03-02 20:44:03'),
	('74','2','','Untitled-20.jpg','2009-03-02 20:44:15','2009-03-02 20:44:15'),
	('75','2','','DSC051573.JPG','2009-03-02 20:45:41','2009-03-02 20:45:41'),
	('76','2','','default0.jpg','2009-03-02 20:46:52','2009-03-02 20:46:52'),
	('77','2','','199837_source3.jpg','2009-03-02 20:47:44','2009-03-02 20:47:44'),
	('78','2','','199837_source4.jpg','2009-03-02 20:48:38','2009-03-02 20:48:38'),
	('79','2','','DSC051590.JPG','2009-03-02 20:49:11','2009-03-02 20:49:11'),
	('81','1','','logo_toys0.jpg','2009-03-02 20:49:49','2009-03-02 20:49:49'),
	('82','1','','logo_ferre1.jpg','2009-03-02 20:51:04','2009-03-02 20:51:04'),
	('83','1','','logo_ferre2.jpg','2009-03-02 20:51:17','2009-03-02 20:51:17'),
	('84','1','','logo_toys1.jpg','2009-03-02 20:51:24','2009-03-02 20:51:24'),
	('85','1','','logo_toys2.jpg','2009-03-02 20:51:27','2009-03-02 20:51:27'),
	('86','1','','logo_toys3.jpg','2009-03-02 20:51:27','2009-03-02 20:51:27'),
	('88','2','','199837_source5.jpg','2009-03-02 20:51:38','2009-03-02 20:51:38'),
	('89','2','','199837_source6.jpg','2009-03-02 20:52:30','2009-03-02 20:52:30'),
	('90','2','','199837_source7.jpg','2009-03-02 20:53:52','2009-03-02 20:53:52'),
	('91','1','','a400m-20.jpg','2009-03-02 20:55:01','2009-03-02 20:55:01'),
	('92','2','','DSC051574.JPG','2009-03-02 20:55:45','2009-03-02 20:55:45'),
	('93','1','','a400m-21.jpg','2009-03-02 20:55:53','2009-03-02 20:55:53'),
	('94','2','','DSC051581.JPG','2009-03-02 21:26:20','2009-03-02 21:26:20'),
	('95','1','','logoTa0.jpg','2009-03-03 13:32:22','2009-03-03 13:32:22'),
	('96','1','','logoTa1.jpg','2009-03-03 13:33:31','2009-03-03 13:33:31'),
	('97','1','','test28.jpg','2009-03-03 13:33:45','2009-03-03 13:33:45'),
	('98','1','','test29.jpg','2009-03-03 13:37:54','2009-03-03 13:37:54'),
	('99','1','','test15.JPG','2009-03-03 13:38:30','2009-03-03 13:38:30'),
	('100','1','','DSC051575.JPG','2009-03-03 14:25:55','2009-03-03 14:25:55'),
	('101','1','','DSC051592.JPG','2009-03-03 14:53:35','2009-03-03 14:53:35'),
	('102','1','','logoTa2.jpg','2009-03-03 14:55:16','2009-03-03 14:55:16'),
	('103','1','','DSC051593.JPG','2009-03-03 14:55:56','2009-03-03 14:55:56'),
	('104','1','','test16.JPG','2009-03-03 14:57:05','2009-03-03 14:57:05'),
	('105','1','','test17.JPG','2009-03-03 14:58:11','2009-03-03 14:58:11'),
	('106','1','','logoTa3.jpg','2009-03-03 14:59:11','2009-03-03 14:59:11'),
	('107','1','','test18.JPG','2009-03-03 14:59:44','2009-03-03 14:59:44'),
	('108','1','','logoTa4.jpg','2009-03-03 15:00:47','2009-03-03 15:00:47'),
	('109','1','','test19.JPG','2009-03-03 15:06:35','2009-03-03 15:06:35'),
	('110','1','','test110.JPG','2009-03-03 15:31:47','2009-03-03 15:31:47'),
	('111','1','','test111.JPG','2009-03-03 15:36:02','2009-03-03 15:36:02'),
	('113',NULL,'',NULL,'2009-03-03 15:41:00','2009-03-03 15:41:00'),
	('114',NULL,'',NULL,'2009-03-03 15:41:41','2009-03-03 15:41:41'),
	('115','1','','DSC051600.JPG','2009-03-03 15:42:45','2009-03-03 15:42:45'),
	('116','1','','DSC051594.JPG','2009-03-03 17:07:16','2009-03-03 17:07:16'),
	('117','2','','30.jpg','2009-03-03 20:33:09','2009-03-03 20:33:09'),
	('118','1','','a400m-22.jpg','2009-03-03 20:35:15','2009-03-03 20:35:15'),
	('119','2','','31.jpg','2009-03-03 20:37:27','2009-03-03 20:37:27'),
	('120','2','','32.jpg','2009-03-03 20:38:33','2009-03-03 20:38:33'),
	('121','2','','10.jpg','2009-03-03 20:39:24','2009-03-03 20:39:24'),
	('122','2','','11.jpg','2009-03-03 20:43:39','2009-03-03 20:43:39'),
	('123','2','','12.jpg','2009-03-03 20:45:03','2009-03-03 20:45:03'),
	('124','2','','13.jpg','2009-03-03 20:46:23','2009-03-03 20:46:23'),
	('125','2','','14.jpg','2009-03-03 20:51:59','2009-03-03 20:51:59'),
	('126','2','','33.jpg','2009-03-03 20:57:54','2009-03-03 20:57:54'),
	('127','2','','15.jpg','2009-03-03 21:01:19','2009-03-03 21:01:19'),
	('128','2','','16.jpg','2009-03-03 21:01:36','2009-03-03 21:01:36'),
	('129','2','','34.jpg','2009-03-03 21:02:13','2009-03-03 21:02:13'),
	('130','2','','35.jpg','2009-03-03 21:04:03','2009-03-03 21:04:03'),
	('131','2','','36.JPG','2009-03-03 21:07:11','2009-03-03 21:07:11'),
	('132','2','','020300490.JPG','2009-03-03 21:09:29','2009-03-03 21:09:29'),
	('133',NULL,'','020300491.JPG','2009-03-03 21:18:36','2009-03-03 21:18:36'),
	('134','2','','IMG_02450.jpg','2009-03-03 21:25:35','2009-03-03 21:25:35'),
	('135','1','','qwer10.jpg','2009-03-03 21:26:41','2009-03-03 21:26:41'),
	('138',NULL,'','ScanImage0020.jpg','2009-03-03 21:28:04','2009-03-03 21:28:04'),
	('139','3','','m601-20.jpg','2009-03-03 21:29:27','2009-03-03 21:29:27'),
	('141','2','','-92-20.jpg','2009-03-03 21:32:04','2009-03-03 21:32:04'),
	('142','1','','17.jpg','2009-03-04 13:19:21','2009-03-04 13:19:21');
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
  `contact` varchar(50) DEFAULT NULL,
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
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;



#
# Dumping data for table 'users'
#

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS*/;
REPLACE INTO `users` (`id`, `username`, `group_id`, `password`, `email`, `contact`, `phone`, `company`, `business`, `website`, `address1`, `bank_detail`, `active`, `created`, `birthday`) VALUES
	('1','admin',1,'c129b324aee662b04eccf68babba85851346dff9','4116457@mail.ru',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,'0000-00-00 00:00:00',NULL),
	('2','kondrat',2,'c129b324aee662b04eccf68babba85851346dff9','4116458@mail.ru',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,'0000-00-00 00:00:00',NULL),
	('11','user8',4,'c129b324aee662b04eccf68babba85851346dff9','user8@mm.ru',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,'2009-02-19 17:50:53',NULL),
	('12','user1',4,'c129b324aee662b04eccf68babba85851346dff9','user1@mm.ru',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,'2009-02-19 21:04:26',NULL),
	('13','user2',4,'c129b324aee662b04eccf68babba85851346dff9','user2@mm.ru',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,'2009-02-19 21:13:30',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS*/;
UNLOCK TABLES;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS*/;
