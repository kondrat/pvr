#App sql generated on: 2009-03-14 15:03:54 : 1237032174

DROP TABLE IF EXISTS `acos`;
DROP TABLE IF EXISTS `albums`;
DROP TABLE IF EXISTS `aros`;
DROP TABLE IF EXISTS `aros_acos`;
DROP TABLE IF EXISTS `groups`;
DROP TABLE IF EXISTS `images`;
DROP TABLE IF EXISTS `users`;


CREATE TABLE `acos` (
	`id` int(10) NOT NULL AUTO_INCREMENT,
	`parent_id` int(10) DEFAULT NULL,
	`model` varchar(255) DEFAULT NULL,
	`foreign_key` int(10) DEFAULT NULL,
	`alias` varchar(255) DEFAULT NULL,
	`lft` int(10) DEFAULT NULL,
	`rght` int(10) DEFAULT NULL,	PRIMARY KEY  (`id`));

CREATE TABLE `albums` (
	`id` int(10) NOT NULL AUTO_INCREMENT,
	`user_id` int(11) DEFAULT NULL,
	`name` varchar(150) NOT NULL,
	`path` varchar(32) DEFAULT NULL,
	`image` text DEFAULT NULL,
	`image_count` int(12) DEFAULT 0,
	`created` datetime DEFAULT NULL,
	`modified` datetime DEFAULT NULL,	PRIMARY KEY  (`id`));

CREATE TABLE `aros` (
	`id` int(10) NOT NULL AUTO_INCREMENT,
	`parent_id` int(10) DEFAULT NULL,
	`model` varchar(255) DEFAULT NULL,
	`foreign_key` int(10) DEFAULT NULL,
	`alias` varchar(255) DEFAULT NULL,
	`lft` int(10) DEFAULT NULL,
	`rght` int(10) DEFAULT NULL,	PRIMARY KEY  (`id`));

CREATE TABLE `aros_acos` (
	`id` int(10) NOT NULL AUTO_INCREMENT,
	`aro_id` int(10) NOT NULL,
	`aco_id` int(10) NOT NULL,
	`_create` varchar(2) DEFAULT '0' NOT NULL,
	`_read` varchar(2) DEFAULT '0' NOT NULL,
	`_update` varchar(2) DEFAULT '0' NOT NULL,
	`_delete` varchar(2) DEFAULT '0' NOT NULL,	PRIMARY KEY  (`id`),
	UNIQUE KEY ARO_ACO_KEY (`aro_id`, `aco_id`));

CREATE TABLE `groups` (
	`id` int(10) NOT NULL AUTO_INCREMENT,
	`name` varchar(64) NOT NULL,	PRIMARY KEY  (`id`));

CREATE TABLE `images` (
	`id` int(10) NOT NULL AUTO_INCREMENT,
	`album_id` int(10) DEFAULT NULL,
	`name` varchar(150) NOT NULL,
	`image` text DEFAULT NULL,
	`created` datetime DEFAULT NULL,
	`modified` datetime DEFAULT NULL,	PRIMARY KEY  (`id`),
	KEY album (`album_id`));

CREATE TABLE `users` (
	`id` int(10) NOT NULL AUTO_INCREMENT,
	`username` varchar(64) NOT NULL,
	`group_id` int(11) DEFAULT 0 NOT NULL,
	`password` varchar(64) NOT NULL,
	`email` varchar(100) NOT NULL,
	`contact` varchar(50) DEFAULT NULL,
	`phone` varchar(50) DEFAULT NULL,
	`company` varchar(50) DEFAULT NULL,
	`business` text DEFAULT NULL,
	`website` varchar(250) DEFAULT NULL,
	`address1` text DEFAULT NULL,
	`bank_detail` text DEFAULT NULL,
	`active` tinyint(1) DEFAULT 0 NOT NULL,
	`created` datetime DEFAULT NULL,
	`birthday` date DEFAULT NULL,	PRIMARY KEY  (`id`),
	UNIQUE KEY username (`username`));

