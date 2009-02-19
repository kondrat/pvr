﻿# HeidiSQL Dump 
#
# --------------------------------------------------------
# Host:                         127.0.0.1
# Database:                     pvr
# Server version:               5.1.23-rc-community
# Server OS:                    Win32
# Target compatibility:         mysqldump+mysqlcli 5.0
# Target max_allowed_packet:    1048576
# HeidiSQL version:             4.0 RC3
# Date/time:                    2009-02-19 22:24:24
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
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8;



#
# Dumping data for table 'acos'
#

LOCK TABLES `acos` WRITE;
/*!40000 ALTER TABLE `acos` DISABLE KEYS*/;
REPLACE INTO `acos` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
	(1,NULL,NULL,NULL,'controllers',1,108),
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
	(30,1,NULL,NULL,'Albums',58,85),
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
	(41,1,NULL,NULL,'Images',86,107),
	(42,41,NULL,NULL,'index',87,88),
	(43,41,NULL,NULL,'view',89,90),
	(44,41,NULL,NULL,'add',91,92),
	(45,41,NULL,NULL,'edit',93,94),
	(46,41,NULL,NULL,'delete',95,96),
	(47,41,NULL,NULL,'admin_index',97,98),
	(48,41,NULL,NULL,'admin_view',99,100),
	(49,41,NULL,NULL,'admin_add',101,102),
	(50,41,NULL,NULL,'admin_edit',103,104),
	(51,41,NULL,NULL,'admin_delete',105,106),
	(74,30,'Album',1,NULL,79,80),
	(75,30,'Album',2,NULL,81,82),
	(76,30,'Album',3,NULL,83,84);
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;



#
# Dumping data for table 'albums'
#

LOCK TABLES `albums` WRITE;
/*!40000 ALTER TABLE `albums` DISABLE KEYS*/;
REPLACE INTO `albums` (`id`, `user_id`, `name`, `image`, `image_count`, `created`, `modified`) VALUES
	('1',11,'newAlbum','default.jpg','0','2009-02-19 17:50:53','2009-02-19 17:50:53'),
	('2',12,'newAlbum','default.jpg','0','2009-02-19 21:04:26','2009-02-19 21:04:26'),
	('3',13,'newAlbum','default.jpg','0','2009-02-19 21:13:30','2009-02-19 21:13:30');
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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;



#
# Dumping data for table 'aros_acos'
#

LOCK TABLES `aros_acos` WRITE;
/*!40000 ALTER TABLE `aros_acos` DISABLE KEYS*/;
REPLACE INTO `aros_acos` (`id`, `aro_id`, `aco_id`, `_create`, `_read`, `_update`, `_delete`) VALUES
	(1,1,1,'1','1','1','1'),
	(4,5,30,'1','1','1','1'),
	(11,4,30,'-1','-1','-1','-1');
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



#
# Dumping data for table 'images'
#

# No data found.



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
