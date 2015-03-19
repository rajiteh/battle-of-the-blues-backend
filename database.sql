# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.5.42)
# Database: botb
# Generation Time: 2015-03-19 01:32:14 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table active_users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `active_users`;

CREATE TABLE `active_users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `amount` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table analytics
# ------------------------------------------------------------

DROP TABLE IF EXISTS `analytics`;

CREATE TABLE `analytics` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `type` varchar(11) NOT NULL DEFAULT '',
  `query` text,
  `cached` tinyint(1) unsigned DEFAULT NULL,
  `start` bigint(20) unsigned DEFAULT NULL,
  `duration` float unsigned DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `exception` text,
  `stacktrace` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table members
# ------------------------------------------------------------

DROP TABLE IF EXISTS `members`;

CREATE TABLE `members` (
  `member_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `lastname` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `login` varchar(100) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `passwd` varchar(32) CHARACTER SET latin1 NOT NULL DEFAULT '',
  PRIMARY KEY (`member_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



# Dump of table players
# ------------------------------------------------------------

DROP TABLE IF EXISTS `players`;

CREATE TABLE `players` (
  `id` int(10) NOT NULL,
  `ball` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `name` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `runs` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `batting` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table score
# ------------------------------------------------------------

DROP TABLE IF EXISTS `score`;

CREATE TABLE `score` (
  `score` int(10) DEFAULT NULL,
  `wickets` int(10) DEFAULT NULL,
  `overs` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `old` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `other` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `day` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `innings` varchar(11) DEFAULT NULL,
  `bat` varchar(10) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `text` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `vdo` varchar(250) CHARACTER SET latin1 DEFAULT NULL,
  `id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table scorecard
# ------------------------------------------------------------

DROP TABLE IF EXISTS `scorecard`;

CREATE TABLE `scorecard` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `text` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table subscribers
# ------------------------------------------------------------

DROP TABLE IF EXISTS `subscribers`;

CREATE TABLE `subscribers` (
  `uuid` varchar(255) NOT NULL DEFAULT '',
  `last_seen` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `expired` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table text
# ------------------------------------------------------------

DROP TABLE IF EXISTS `text`;

CREATE TABLE `text` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `commentary` text CHARACTER SET latin1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table total_users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `total_users`;

CREATE TABLE `total_users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `amount` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
