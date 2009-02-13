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
# Date/time:                    2009-02-13 21:00:41
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
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8;



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
	(30,1,NULL,NULL,'Albums',58,83),
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
	(41,1,NULL,NULL,'Images',84,105),
	(42,41,NULL,NULL,'index',85,86),
	(43,41,NULL,NULL,'view',87,88),
	(44,41,NULL,NULL,'add',89,90),
	(45,41,NULL,NULL,'edit',91,92),
	(46,41,NULL,NULL,'delete',93,94),
	(47,41,NULL,NULL,'admin_index',95,96),
	(48,41,NULL,NULL,'admin_view',97,98),
	(49,41,NULL,NULL,'admin_add',99,100),
	(50,41,NULL,NULL,'admin_edit',101,102),
	(51,41,NULL,NULL,'admin_delete',103,104),
	(59,30,'Album',5,'Album::5',79,80),
	(60,30,'Album',4,'Album::4',81,82),
	(61,1,NULL,NULL,'Pages',106,111),
	(62,61,NULL,NULL,'display',107,108),
	(63,61,NULL,NULL,'admin_index',109,110);
/*!40000 ALTER TABLE `acos` ENABLE KEYS*/;
UNLOCK TABLES;


#
# Table structure for table 'albums'
#

CREATE TABLE /*!32312 IF NOT EXISTS*/ `albums` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
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
REPLACE INTO `albums` (`id`, `name`, `image`, `image_count`, `created`, `modified`) VALUES
	('1','User4-1','no image',NULL,'2009-02-12 19:58:20','2009-02-12 19:59:38'),
	('2','user2-1','no image',NULL,'2009-02-12 20:05:44','2009-02-12 20:34:02'),
	('3','user6-1','no image',NULL,'2009-02-12 20:33:47','2009-02-12 20:34:08'),
	('4','user1-1','no image',NULL,'2009-02-12 20:36:02','2009-02-12 20:36:02'),
	('5','user1-2','no img',NULL,'2009-02-12 20:51:01','2009-02-12 20:51:01');
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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;



#
# Dumping data for table 'aros'
#

LOCK TABLES `aros` WRITE;
/*!40000 ALTER TABLE `aros` DISABLE KEYS*/;
REPLACE INTO `aros` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
	(1,NULL,'Group',1,'Admin',1,8),
	(2,1,'Group',2,'Super',2,5),
	(3,NULL,'Group',3,'Moderator ',9,10),
	(4,NULL,'Group',4,'User',11,20),
	(5,NULL,'Group',5,'Guest',21,24),
	(7,1,'User',1,'Admin::1',6,7),
	(8,2,'User',2,'Kondrat::2',3,4),
	(9,4,'User',3,'user1::3',12,13),
	(11,4,'User',5,'user2::5',14,15),
	(12,4,'User',6,'user3::6',16,17),
	(13,4,'User',7,'user4::7',18,19),
	(14,5,'User',8,'user6::8',22,23);
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;



#
# Dumping data for table 'aros_acos'
#

LOCK TABLES `aros_acos` WRITE;
/*!40000 ALTER TABLE `aros_acos` DISABLE KEYS*/;
REPLACE INTO `aros_acos` (`id`, `aro_id`, `aco_id`, `_create`, `_read`, `_update`, `_delete`) VALUES
	(1,1,1,'1','1','1','1'),
	(2,13,33,'1','1','1','1'),
	(3,11,33,'1','1','1','1'),
	(4,5,30,'1','1','1','1'),
	(5,9,30,'-1','-1','-1','-1'),
	(6,9,33,'1','1','1','1'),
	(7,5,60,'-1','-1','-1','-1'),
	(8,9,60,'1','1','1','1'),
	(9,9,32,'1','1','1','1');
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;



#
# Dumping data for table 'users'
#

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS*/;
REPLACE INTO `users` (`id`, `username`, `group_id`, `password`, `email`, `contact`, `phone`, `company`, `business`, `website`, `address1`, `bank_detail`, `active`, `created`, `birthday`) VALUES
	('1','admin',1,'c129b324aee662b04eccf68babba85851346dff9','4116457@mail.ru',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,'0000-00-00 00:00:00',NULL),
	('2','kondrat',2,'c129b324aee662b04eccf68babba85851346dff9','4116458@mail.ru',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,'0000-00-00 00:00:00',NULL),
	('3','user1',4,'c129b324aee662b04eccf68babba85851346dff9','user1@mm.ru',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,'2009-02-11 20:48:31',NULL),
	('5','user2',4,'c129b324aee662b04eccf68babba85851346dff9','user2@mm.ru',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,'2009-02-11 21:04:16',NULL),
	('7','user4',4,'c129b324aee662b04eccf68babba85851346dff9','user4@mm.ru',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,'2009-02-12 19:46:57',NULL),
	('8','user6',5,'c129b324aee662b04eccf68babba85851346dff9','user6@mm.ru',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,'2009-02-12 20:23:52',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS*/;
UNLOCK TABLES;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS*/;
