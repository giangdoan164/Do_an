/*
SQLyog Enterprise - MySQL GUI v8.12 
MySQL - 5.6.21 : Database - mvc
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`mvc` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;

USE `mvc`;

/*Table structure for table `t_annnounce_type` */

DROP TABLE IF EXISTS `t_annnounce_type`;

CREATE TABLE `t_annnounce_type` (
  `PK_CATEGORY` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `C_NAME` varchar(50) DEFAULT NULL,
  `C_DESCRIPTION` text,
  PRIMARY KEY (`PK_CATEGORY`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `t_annnounce_type` */

insert  into `t_annnounce_type`(`PK_CATEGORY`,`C_NAME`,`C_DESCRIPTION`) values (1,'Chung','Quản lý các loại trao đổi , thông báo chung'),(2,'Học tập','Quản lý các loại trao đổi , thông báo về tình hình học tập'),(3,'Kỷ luật',NULL);

/*Table structure for table `t_announce` */

DROP TABLE IF EXISTS `t_announce`;

CREATE TABLE `t_announce` (
  `PK_ANNOUNCE` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `FK_CATEGORY` tinyint(4) DEFAULT NULL,
  `FK_TEACHER_USER` int(11) DEFAULT NULL,
  `FK_PARENT_USER` int(11) DEFAULT NULL,
  `FK_CLASS` tinyint(4) DEFAULT NULL,
  `FK_GRADE` tinyint(4) DEFAULT NULL,
  `C_DATE` datetime DEFAULT NULL,
  `C_CONTENT` text,
  PRIMARY KEY (`PK_ANNOUNCE`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8;

/*Data for the table `t_announce` */

insert  into `t_announce`(`PK_ANNOUNCE`,`FK_CATEGORY`,`FK_TEACHER_USER`,`FK_PARENT_USER`,`FK_CLASS`,`FK_GRADE`,`C_DATE`,`C_CONTENT`) values (1,1,39,475,3,1,'2015-05-06 23:22:27','Học sinh được nghỉ học ngày 11/5'),(2,1,39,476,3,1,'2015-05-06 23:22:27','Học sinh được nghỉ học ngày 11/5'),(3,1,39,477,3,1,'2015-05-06 23:22:27','Học sinh được nghỉ học ngày 11/5'),(4,1,39,478,3,1,'2015-05-06 23:22:27','Học sinh được nghỉ học ngày 11/5'),(5,1,39,479,3,1,'2015-05-06 23:22:27','Học sinh được nghỉ học ngày 11/5'),(6,1,536,465,6,2,'2015-05-11 07:22:20','Thông báo học sinh toàn trường được nghỉ ngày 11/5'),(7,1,536,466,6,2,'2015-05-11 07:22:20','Thông báo học sinh toàn trường được nghỉ ngày 11/5'),(8,1,536,467,6,2,'2015-05-11 07:22:20','Thông báo học sinh toàn trường được nghỉ ngày 11/5'),(9,1,536,468,6,2,'2015-05-11 07:22:20','Thông báo học sinh toàn trường được nghỉ ngày 11/5'),(10,1,536,469,6,2,'2015-05-11 07:22:20','Thông báo học sinh toàn trường được nghỉ ngày 11/5'),(11,1,536,470,6,2,'2015-05-11 07:22:20','Thông báo học sinh toàn trường được nghỉ ngày 11/5'),(12,1,536,471,6,2,'2015-05-11 07:22:20','Thông báo học sinh toàn trường được nghỉ ngày 11/5'),(13,1,536,472,6,2,'2015-05-11 07:22:20','Thông báo học sinh toàn trường được nghỉ ngày 11/5'),(14,1,536,473,6,2,'2015-05-11 07:22:20','Thông báo học sinh toàn trường được nghỉ ngày 11/5'),(15,1,536,474,6,2,'2015-05-11 07:22:20','Thông báo học sinh toàn trường được nghỉ ngày 11/5'),(16,1,536,475,3,2,'2015-05-11 07:22:20','Thông báo học sinh toàn trường được nghỉ ngày 11/5'),(17,1,536,476,3,2,'2015-05-11 07:22:20','Thông báo học sinh toàn trường được nghỉ ngày 11/5'),(18,1,536,477,3,2,'2015-05-11 07:22:20','Thông báo học sinh toàn trường được nghỉ ngày 11/5'),(19,1,536,478,3,2,'2015-05-11 07:22:20','Thông báo học sinh toàn trường được nghỉ ngày 11/5'),(20,1,536,479,3,2,'2015-05-11 07:22:20','Thông báo học sinh toàn trường được nghỉ ngày 11/5'),(21,1,536,480,9,2,'2015-05-11 07:22:20','Thông báo học sinh toàn trường được nghỉ ngày 11/5'),(22,1,536,481,9,2,'2015-05-11 07:22:20','Thông báo học sinh toàn trường được nghỉ ngày 11/5'),(23,1,536,482,9,2,'2015-05-11 07:22:20','Thông báo học sinh toàn trường được nghỉ ngày 11/5'),(24,1,536,483,9,2,'2015-05-11 07:22:20','Thông báo học sinh toàn trường được nghỉ ngày 11/5'),(25,1,536,484,9,2,'2015-05-11 07:22:20','Thông báo học sinh toàn trường được nghỉ ngày 11/5'),(26,1,536,485,10,2,'2015-05-11 07:22:20','Thông báo học sinh toàn trường được nghỉ ngày 11/5'),(27,1,536,486,10,2,'2015-05-11 07:22:20','Thông báo học sinh toàn trường được nghỉ ngày 11/5'),(28,1,536,487,10,2,'2015-05-11 07:22:20','Thông báo học sinh toàn trường được nghỉ ngày 11/5'),(29,1,536,488,10,2,'2015-05-11 07:22:20','Thông báo học sinh toàn trường được nghỉ ngày 11/5'),(30,1,536,489,10,2,'2015-05-11 07:22:20','Thông báo học sinh toàn trường được nghỉ ngày 11/5'),(31,1,536,505,1,1,'2015-05-11 07:22:20','Thông báo học sinh toàn trường được nghỉ ngày 11/5'),(32,1,536,506,1,1,'2015-05-11 07:22:20','Thông báo học sinh toàn trường được nghỉ ngày 11/5'),(33,1,536,507,1,1,'2015-05-11 07:22:20','Thông báo học sinh toàn trường được nghỉ ngày 11/5'),(34,1,536,508,1,1,'2015-05-11 07:22:20','Thông báo học sinh toàn trường được nghỉ ngày 11/5'),(35,1,536,509,2,1,'2015-05-11 07:22:20','Thông báo học sinh toàn trường được nghỉ ngày 11/5'),(36,1,536,510,2,1,'2015-05-11 07:22:20','Thông báo học sinh toàn trường được nghỉ ngày 11/5'),(37,1,536,511,2,1,'2015-05-11 07:22:20','Thông báo học sinh toàn trường được nghỉ ngày 11/5'),(38,1,536,512,2,1,'2015-05-11 07:22:20','Thông báo học sinh toàn trường được nghỉ ngày 11/5'),(39,1,536,513,2,1,'2015-05-11 07:22:20','Thông báo học sinh toàn trường được nghỉ ngày 11/5'),(40,1,536,514,8,2,'2015-05-11 07:22:20','Thông báo học sinh toàn trường được nghỉ ngày 11/5'),(41,1,536,515,8,2,'2015-05-11 07:22:20','Thông báo học sinh toàn trường được nghỉ ngày 11/5'),(42,1,536,516,8,2,'2015-05-11 07:22:20','Thông báo học sinh toàn trường được nghỉ ngày 11/5'),(43,1,536,517,8,2,'2015-05-11 07:22:20','Thông báo học sinh toàn trường được nghỉ ngày 11/5'),(44,1,536,518,8,2,'2015-05-11 07:22:20','Thông báo học sinh toàn trường được nghỉ ngày 11/5'),(45,1,536,519,4,1,'2015-05-11 07:22:20','Thông báo học sinh toàn trường được nghỉ ngày 11/5'),(46,1,536,520,4,1,'2015-05-11 07:22:20','Thông báo học sinh toàn trường được nghỉ ngày 11/5'),(47,1,536,521,4,1,'2015-05-11 07:22:20','Thông báo học sinh toàn trường được nghỉ ngày 11/5'),(48,1,536,522,4,1,'2015-05-11 07:22:20','Thông báo học sinh toàn trường được nghỉ ngày 11/5'),(49,1,536,523,4,1,'2015-05-11 07:22:20','Thông báo học sinh toàn trường được nghỉ ngày 11/5'),(50,1,536,524,5,1,'2015-05-11 07:22:20','Thông báo học sinh toàn trường được nghỉ ngày 11/5'),(51,1,536,525,5,1,'2015-05-11 07:22:20','Thông báo học sinh toàn trường được nghỉ ngày 11/5'),(52,1,536,526,5,1,'2015-05-11 07:22:20','Thông báo học sinh toàn trường được nghỉ ngày 11/5'),(53,1,536,527,5,1,'2015-05-11 07:22:20','Thông báo học sinh toàn trường được nghỉ ngày 11/5'),(54,1,536,528,5,1,'2015-05-11 07:22:20','Thông báo học sinh toàn trường được nghỉ ngày 11/5'),(55,1,536,532,5,1,'2015-05-11 07:22:20','Thông báo học sinh toàn trường được nghỉ ngày 11/5'),(56,1,536,533,5,1,'2015-05-11 07:22:20','Thông báo học sinh toàn trường được nghỉ ngày 11/5');

/*Table structure for table `t_category` */

DROP TABLE IF EXISTS `t_category`;

CREATE TABLE `t_category` (
  `PK_CATEGORY` tinyint(4) NOT NULL AUTO_INCREMENT,
  `C_NAME` varchar(255) DEFAULT NULL,
  `C_DESCRIPTION` text,
  PRIMARY KEY (`PK_CATEGORY`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `t_category` */

insert  into `t_category`(`PK_CATEGORY`,`C_NAME`,`C_DESCRIPTION`) values (1,'Trao đổi chung','Nơi thảo luận các vấn đề chung\r\n'),(2,'Góc học tập','Nơi trao đổi các vấn đề học tập'),(3,'Góc kỷ luật','Nơi thảo luận các vấn đề vui chơi , giải trí');

/*Table structure for table `t_class` */

DROP TABLE IF EXISTS `t_class`;

CREATE TABLE `t_class` (
  `PK_CLASS` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `C_CLASS_NAME` varchar(2) CHARACTER SET utf8 DEFAULT NULL,
  `FK_GRADE` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`PK_CLASS`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

/*Data for the table `t_class` */

insert  into `t_class`(`PK_CLASS`,`C_CLASS_NAME`,`FK_GRADE`) values (1,'1A',1),(2,'1B',1),(3,'1C',1),(4,'1D',1),(5,'1E',1),(6,'2A',2),(7,'2B',2),(8,'2C',2),(9,'2D',2),(10,'2E',2),(18,'4C',4);

/*Table structure for table `t_current_time` */

DROP TABLE IF EXISTS `t_current_time`;

CREATE TABLE `t_current_time` (
  `C_SEMESTER` tinyint(1) DEFAULT NULL,
  `C_SCHOOL_YEAR` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `C_ACTIVE` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_current_time` */

insert  into `t_current_time`(`C_SEMESTER`,`C_SCHOOL_YEAR`,`C_ACTIVE`) values (1,'2015-2016',1);

/*Table structure for table `t_detail_school_record` */

DROP TABLE IF EXISTS `t_detail_school_record`;

CREATE TABLE `t_detail_school_record` (
  `PK_DETAIL_RECORD` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `FK_SCHOOL_RECORD` int(10) unsigned DEFAULT NULL,
  `FK_SUBJECT` tinyint(4) DEFAULT NULL,
  `FK_GRADE` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `C_TEACHER_REMARK` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`PK_DETAIL_RECORD`)
) ENGINE=InnoDB AUTO_INCREMENT=225 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_detail_school_record` */

insert  into `t_detail_school_record`(`PK_DETAIL_RECORD`,`FK_SCHOOL_RECORD`,`FK_SUBJECT`,`FK_GRADE`,`C_TEACHER_REMARK`) values (120,21,1,'8','Em học rất tốt'),(121,21,2,'9','Em học rất tốt'),(122,21,3,'8','Em học rất tốt'),(123,21,4,'9','Em học rất tốt'),(124,21,5,'9','Em học rất tốt'),(125,21,6,'9','Em học rất tốt'),(126,21,7,'8','Em có năng khiếu về tiếng anh'),(127,22,1,'9',NULL),(128,22,2,'9',NULL),(129,22,3,'8',NULL),(130,22,4,'9',NULL),(131,22,5,'9',NULL),(132,22,6,'9',NULL),(133,22,7,'8',NULL),(134,23,1,'9',NULL),(135,23,2,'10',NULL),(136,23,3,'8',NULL),(137,23,4,'9',NULL),(138,23,5,'9',NULL),(139,23,6,'9',NULL),(140,23,7,'8',NULL),(141,24,1,'8',NULL),(142,24,2,'8',NULL),(143,24,3,'8',NULL),(144,24,4,'9',NULL),(145,24,5,'9',NULL),(146,24,6,'6',NULL),(147,24,7,'8',NULL),(148,25,1,'5',NULL),(149,25,2,'6',NULL),(150,25,3,'8',NULL),(151,25,4,'9',NULL),(152,25,5,'9',NULL),(153,25,6,'7',NULL),(154,25,7,'8',NULL),(155,26,1,'8',NULL),(156,26,2,'9',NULL),(157,26,3,'6',NULL),(158,26,4,'8',NULL),(159,26,5,'9',NULL),(160,26,6,NULL,NULL),(161,26,7,NULL,NULL),(162,27,1,'9',NULL),(163,27,2,'9',NULL),(164,27,3,'4',NULL),(165,27,4,'8',NULL),(166,27,5,'10',NULL),(167,27,6,NULL,NULL),(168,27,7,NULL,NULL),(169,28,1,'9',NULL),(170,28,2,'10',NULL),(171,28,3,'5',NULL),(172,28,4,'8',NULL),(173,28,5,'10',NULL),(174,28,6,NULL,NULL),(175,28,7,NULL,NULL),(176,29,1,'5',NULL),(177,29,2,'6',NULL),(178,29,3,'6',NULL),(179,29,4,'8',NULL),(180,29,5,'10',NULL),(181,29,6,NULL,NULL),(182,29,7,NULL,NULL),(183,30,1,'8',NULL),(184,30,2,'8',NULL),(185,30,3,'7',NULL),(186,30,4,'8',NULL),(187,30,5,'10',NULL),(188,30,6,NULL,NULL),(189,30,7,NULL,NULL),(190,31,1,'8',NULL),(191,31,2,'9',NULL),(192,31,3,'5',NULL),(193,31,4,'9',NULL),(194,31,5,'9',NULL),(195,31,6,'8',NULL),(196,31,7,'9',NULL),(197,32,1,'9',NULL),(198,32,2,'9',NULL),(199,32,3,'8',NULL),(200,32,4,'9',NULL),(201,32,5,'9',NULL),(202,32,6,'8',NULL),(203,32,7,'9',NULL),(204,33,1,'9',NULL),(205,33,2,'10',NULL),(206,33,3,'8',NULL),(207,33,4,'9',NULL),(208,33,5,'9',NULL),(209,33,6,'9',NULL),(210,33,7,'9',NULL),(211,34,1,'5',NULL),(212,34,2,'6',NULL),(213,34,3,'8',NULL),(214,34,4,'9',NULL),(215,34,5,'9',NULL),(216,34,6,'0',NULL),(217,34,7,'9',NULL),(218,35,1,'8',NULL),(219,35,2,'8',NULL),(220,35,3,'8',NULL),(221,35,4,'9',NULL),(222,35,5,'9',NULL),(223,35,6,'9',NULL),(224,35,7,'9',NULL);

/*Table structure for table `t_grade` */

DROP TABLE IF EXISTS `t_grade`;

CREATE TABLE `t_grade` (
  `PK_GRADE` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `C_GRADE_NAME` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`PK_GRADE`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `t_grade` */

insert  into `t_grade`(`PK_GRADE`,`C_GRADE_NAME`) values (1,'Khối 1'),(2,'Khối 2'),(3,'Khối 3'),(4,'Khối 4'),(5,'Khối 5');

/*Table structure for table `t_grade_subject` */

DROP TABLE IF EXISTS `t_grade_subject`;

CREATE TABLE `t_grade_subject` (
  `FK_GRADE` tinyint(4) DEFAULT NULL,
  `FK_SUBJECT` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_grade_subject` */

insert  into `t_grade_subject`(`FK_GRADE`,`FK_SUBJECT`) values (1,1),(1,2),(1,3),(1,4),(1,5),(1,6),(1,7),(2,1),(2,2),(2,3),(2,4),(2,5),(2,6),(2,7),(3,1),(3,2),(3,3),(3,4),(3,5),(3,6),(3,7),(3,8),(4,1),(4,2),(4,4),(4,5),(4,6),(4,7),(4,8),(4,9),(4,10),(4,11),(4,12),(5,1),(5,2),(5,5),(5,5),(5,6),(5,7),(5,8),(5,9),(5,10),(5,11),(5,12),(5,13);

/*Table structure for table `t_group_level` */

DROP TABLE IF EXISTS `t_group_level`;

CREATE TABLE `t_group_level` (
  `PK_GROUP` int(2) unsigned NOT NULL AUTO_INCREMENT,
  `C_NAME` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `C_LEVEL` tinyint(2) unsigned DEFAULT NULL,
  PRIMARY KEY (`PK_GROUP`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `t_group_level` */

insert  into `t_group_level`(`PK_GROUP`,`C_NAME`,`C_LEVEL`) values (1,'Admin',1),(2,'GlobalTeacher',2),(3,'Teacher',3),(4,'Parents',4);

/*Table structure for table `t_private_message` */

DROP TABLE IF EXISTS `t_private_message`;

CREATE TABLE `t_private_message` (
  `PK_MESSAGE` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `FK_THREAD` int(10) unsigned DEFAULT NULL,
  `C_CONTENT` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `FK_SENDING_USER` int(11) DEFAULT NULL,
  `C_SENT_DATE` datetime DEFAULT NULL,
  PRIMARY KEY (`PK_MESSAGE`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;

/*Data for the table `t_private_message` */

insert  into `t_private_message`(`PK_MESSAGE`,`FK_THREAD`,`C_CONTENT`,`FK_SENDING_USER`,`C_SENT_DATE`) values (23,16,'&lt;p&gt;1234&lt;/p&gt;\r\n',39,'2015-05-08 00:35:45'),(24,17,'&lt;p&gt;213123&lt;/p&gt;\r\n',39,'2015-05-08 00:36:14'),(25,16,'&lt;p&gt;Trao doi 3&lt;/p&gt;\r\n',39,'2015-05-08 00:38:19'),(26,18,'&lt;p&gt;234235234234&lt;/p&gt;\r\n',39,'2015-05-08 00:51:31'),(27,17,'&lt;p&gt;23124123123&lt;/p&gt;\r\n',39,'2015-05-08 00:51:59'),(28,17,'&lt;p&gt;qqqqqqq&lt;/p&gt;\r\n',39,'2015-05-08 00:52:08'),(29,18,'&lt;p&gt;12121231241123123&lt;/p&gt;\r\n',39,'2015-05-08 01:23:44'),(30,18,'&lt;p&gt;12121231241123123&lt;/p&gt;\r\n',39,'2015-05-08 01:24:10'),(31,18,'&lt;p&gt;121212&lt;/p&gt;\r\n',39,'2015-05-08 01:24:14'),(32,17,'&lt;p&gt;&amp;aacute;dasdasdwa&lt;/p&gt;\r\n',39,'2015-05-08 01:32:58'),(33,16,'&lt;p&gt;11111&lt;/p&gt;\r\n',39,'2015-05-08 01:33:06'),(34,19,'&lt;p&gt;123123123&lt;/p&gt;\r\n',39,'2015-05-08 01:59:20'),(35,20,'&lt;p&gt;7777777777777777777777777&lt;/p&gt;\r\n',39,'2015-05-08 01:59:32'),(36,21,'&lt;p&gt;44444444444444&lt;/p&gt;\r\n',39,'2015-05-08 01:59:58'),(37,22,'&lt;p&gt;aasdawdawdasdwadawd&lt;/p&gt;\r\n',39,'2015-05-08 02:02:16'),(38,23,'&lt;p&gt;312312314234123412341234&lt;/p&gt;\r\n',39,'2015-05-08 02:02:45'),(39,24,'&lt;p&gt;313241351341234&lt;/p&gt;\r\n',39,'2015-05-08 02:03:00'),(40,17,'&lt;p&gt;121212&lt;/p&gt;\r\n',39,'2015-05-08 02:43:38'),(41,25,'&lt;p&gt;234234234213413&lt;/p&gt;\r\n',475,'2015-05-08 11:06:30'),(42,25,'&lt;p&gt;1212121212&lt;/p&gt;\r\n',475,'2015-05-09 10:31:22'),(43,16,'&lt;p&gt;oke&lt;/p&gt;\r\n',475,'2015-05-09 14:40:32'),(44,26,'&lt;p&gt;&lt;strong&gt;Học sinh kh&amp;ocirc;ng chịu tiếp thu b&amp;agrave;i tr&amp;ecirc;n lớp&lt;/strong&gt;&lt;/p&gt;\r\n',39,'2015-05-09 14:55:11'),(45,22,'&lt;p&gt;12314123&lt;/p&gt;\r\n',39,'2015-05-09 14:59:38'),(46,22,'&lt;p&gt;123124123&lt;/p&gt;\r\n',479,'2015-05-09 15:00:27'),(47,22,'&lt;blockquote&gt;\r\n&lt;p&gt;&lt;strong&gt;D&amp;acirc;n tr&amp;iacute; akbcassadwj&lt;/strong&gt;&lt;/p&gt;\r\n&lt;/blockquote&gt;\r\n',479,'2015-05-09 15:03:41'),(48,17,'&lt;p&gt;đ&amp;acirc;sfawawd&lt;/p&gt;\r\n',475,'2015-05-09 15:27:35'),(49,27,'&lt;p&gt;123&lt;/p&gt;\r\n',475,'2015-05-09 15:49:54');

/*Table structure for table `t_private_message_read_state` */

DROP TABLE IF EXISTS `t_private_message_read_state`;

CREATE TABLE `t_private_message_read_state` (
  `FK_MESSAGE` int(10) unsigned DEFAULT NULL,
  `FK_USER` int(10) unsigned DEFAULT NULL,
  `C_READ_DATE` datetime DEFAULT NULL,
  `C_READ_STATE` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `t_private_message_read_state` */

insert  into `t_private_message_read_state`(`FK_MESSAGE`,`FK_USER`,`C_READ_DATE`,`C_READ_STATE`) values (23,39,NULL,1),(23,475,NULL,1),(24,39,NULL,1),(24,475,NULL,1),(25,39,NULL,1),(25,475,NULL,1),(26,39,NULL,1),(26,475,'2015-05-09 17:14:20',1),(27,39,NULL,1),(27,475,NULL,1),(28,39,NULL,1),(28,475,NULL,1),(29,39,NULL,1),(29,475,'2015-05-09 17:14:20',1),(30,39,NULL,1),(30,475,'2015-05-09 17:14:20',1),(31,39,NULL,1),(31,475,'2015-05-09 17:14:20',1),(32,39,NULL,1),(32,475,NULL,1),(33,39,NULL,1),(33,475,NULL,1),(34,39,NULL,1),(34,476,NULL,0),(35,39,NULL,1),(35,477,NULL,0),(36,39,NULL,1),(36,478,NULL,0),(37,39,NULL,1),(37,479,NULL,1),(38,39,NULL,1),(38,478,NULL,0),(39,39,NULL,1),(39,478,NULL,0),(40,39,NULL,1),(40,475,NULL,1),(41,475,NULL,1),(42,475,NULL,1),(42,NULL,NULL,0),(43,475,NULL,1),(43,39,NULL,1),(44,39,NULL,1),(44,479,NULL,1),(45,39,NULL,1),(45,479,NULL,1),(46,479,NULL,1),(46,39,NULL,1),(47,479,NULL,1),(47,39,NULL,1),(48,475,NULL,1),(48,39,NULL,0),(49,475,NULL,1),(49,39,NULL,0);

/*Table structure for table `t_private_thread` */

DROP TABLE IF EXISTS `t_private_thread`;

CREATE TABLE `t_private_thread` (
  `PK_THREAD` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `C_TITLE` text,
  `C_CREATED_DATE` datetime DEFAULT NULL,
  `C_CREATED_USER` int(10) unsigned DEFAULT NULL,
  `C_LATEST_DATE` datetime DEFAULT NULL,
  PRIMARY KEY (`PK_THREAD`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

/*Data for the table `t_private_thread` */

insert  into `t_private_thread`(`PK_THREAD`,`C_TITLE`,`C_CREATED_DATE`,`C_CREATED_USER`,`C_LATEST_DATE`) values (16,'trao doi 1','2015-05-08 00:35:45',39,'2015-05-09 14:40:32'),(17,'trao doi 2','2015-05-08 00:36:14',39,'2015-05-09 15:27:35'),(18,'252525','2015-05-08 00:51:31',39,'2015-05-08 01:24:14'),(19,'12314123','2015-05-08 01:59:20',39,'2015-05-08 01:59:20'),(20,'7777777777777777777','2015-05-08 01:59:32',39,'2015-05-08 01:59:32'),(21,'43444444444444','2015-05-08 01:59:58',39,'2015-05-08 01:59:58'),(22,'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa','2015-05-08 02:02:16',39,'2015-05-09 15:03:41'),(23,'112312312312312412','2015-05-08 02:02:45',39,'2015-05-08 02:02:45'),(24,'2342342','2015-04-08 02:03:00',39,'2015-05-08 02:03:00'),(25,'2342134234','2015-05-08 11:06:30',475,'2015-05-09 10:31:22'),(26,'Tình hình học tập của em rất kém ','2015-05-09 14:55:11',39,'2015-05-09 14:55:11'),(27,'113','2015-05-09 15:49:54',475,'2015-05-09 15:49:54');

/*Table structure for table `t_private_thread_participant` */

DROP TABLE IF EXISTS `t_private_thread_participant`;

CREATE TABLE `t_private_thread_participant` (
  `FK_THREAD` int(10) unsigned DEFAULT NULL,
  `FK_USER` int(10) unsigned DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `t_private_thread_participant` */

insert  into `t_private_thread_participant`(`FK_THREAD`,`FK_USER`) values (16,39),(16,475),(17,39),(17,475),(18,39),(18,475),(19,39),(19,476),(20,39),(20,477),(21,39),(21,478),(22,39),(22,479),(23,39),(23,478),(24,39),(24,478),(25,475),(26,39),(26,479),(27,475),(27,39);

/*Table structure for table `t_public_post` */

DROP TABLE IF EXISTS `t_public_post`;

CREATE TABLE `t_public_post` (
  `PK_POST` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `FK_TOPIC` int(11) DEFAULT NULL,
  `C_CONTENT` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `C_POSTED_DATE` datetime DEFAULT NULL,
  `C_POSTED_USER` int(11) DEFAULT NULL,
  PRIMARY KEY (`PK_POST`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

/*Data for the table `t_public_post` */

insert  into `t_public_post`(`PK_POST`,`FK_TOPIC`,`C_CONTENT`,`C_POSTED_DATE`,`C_POSTED_USER`) values (1,1,'&lt;p&gt;1341212312312341&lt;/p&gt;\r\n','2015-05-06 06:17:57',39),(2,1,'&lt;p&gt;g.vsndadlklnwrg;bnclcADLKc xzlnclzkxcn&lt;/p&gt;\r\n\r\n&lt;p&gt;dv;jkcv;zjxcv&lt;/p&gt;\r\n\r\n&lt;p&gt;dfc;lkSNvclkncv&lt;/p&gt;\r\n\r\n&lt;p&gt;zcv;zjkxncv;zjn&lt;/p&gt;\r\n\r\n&lt;p&gt;fasc&amp;#39;lakcnw&lt;/p&gt;\r\n\r\n&lt;p&gt;caakcjns;dkjvnz;kjxcnv&lt;br /&gt;\r\n&amp;Agrave;;sjnvs;jkznvz;njv&lt;/p&gt;\r\n\r\n&lt;p&gt;ckjsznv;kjnzsd&lt;/p&gt;\r\n\r\n&lt;p&gt;vd;SKNv;czv&lt;/p&gt;\r\n','2015-05-06 07:01:16',39),(3,1,'&lt;p&gt;sdfkjvhnsfv&lt;/p&gt;\r\n\r\n&lt;p&gt;sdvljhsv&lt;/p&gt;\r\n\r\n&lt;p&gt;skvjsdvjksdv&lt;/p&gt;\r\n\r\n&lt;p&gt;sdvbzshcvbxzv&amp;#39;&amp;aacute;dcdkqwfc&lt;/p&gt;\r\n\r\n&lt;p&gt;qa&lt;/p&gt;\r\n','2015-05-06 07:01:43',39),(4,2,'&lt;p&gt;23123123&lt;/p&gt;\r\n','2015-05-06 18:39:49',39),(5,3,'&lt;p&gt;45645645&lt;/p&gt;\r\n','2015-05-06 18:39:58',39),(7,2,'&lt;p&gt;&lt;strong&gt;lkdfj;lqejfc;lakjs;lqkefqe&lt;/strong&gt;&lt;/p&gt;\r\n','2015-05-09 15:15:57',479),(9,6,'&lt;p&gt;23123123&lt;/p&gt;\r\n','2015-05-09 15:49:43',475),(10,6,'&lt;ol&gt;\r\n	&lt;li&gt;&lt;s&gt;&lt;em&gt;&lt;strong&gt;123124123123&lt;/strong&gt;&lt;/em&gt;&lt;/s&gt;&lt;/li&gt;\r\n&lt;/ol&gt;\r\n','2015-05-09 16:54:26',39),(11,6,'&lt;p&gt;123&lt;/p&gt;\r\n','2015-05-09 17:24:58',39),(12,7,'&lt;p&gt;3123123&lt;/p&gt;\r\n','2015-05-10 17:44:41',39),(13,8,'&lt;p&gt;123123123123&lt;/p&gt;\r\n','2015-05-10 17:44:45',39),(14,9,'&lt;p&gt;23123123123&lt;/p&gt;\r\n','2015-05-10 17:46:29',39),(15,10,'&lt;p&gt;12312412312&lt;/p&gt;\r\n','2015-05-10 17:47:00',39),(16,11,'&lt;p&gt;213124123&lt;/p&gt;\r\n','2015-05-10 17:47:31',39),(17,12,'&lt;p&gt;124123123123&lt;/p&gt;\r\n','2015-05-10 17:48:02',39),(21,12,'&lt;p&gt;12412412312412&lt;/p&gt;\r\n','2015-05-10 17:48:51',39),(22,10,'&lt;p&gt;15351234134134&lt;/p&gt;\r\n','2015-05-10 17:49:07',39),(23,9,'&lt;p&gt;324123513123&lt;/p&gt;\r\n','2015-05-10 17:49:15',39),(24,9,'&lt;p&gt;1351234134234&lt;/p&gt;\r\n','2015-05-10 17:49:20',39),(26,11,'&lt;p&gt;1414213124123&lt;/p&gt;\r\n','2015-05-10 17:49:43',39),(27,13,'&lt;p&gt;Ng&amp;agrave;y 25/5 C&amp;aacute;c em sẽ đi tham quan bảo t&amp;agrave;ng lịch sử.&lt;/p&gt;\r\n\r\n&lt;p&gt;Đề nghị phụ huynh chuẩn bị cho con em m&amp;igrave;nh đầy đủ vật dụng cần thiết&lt;/p&gt;\r\n','2015-05-10 17:58:32',39),(28,13,'&lt;p&gt;Danh s&amp;aacute;ch chuẩn bị bao gồm những g&amp;igrave; l&amp;agrave; hợp l&amp;yacute; :&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;ol&gt;\r\n	&lt;li&gt;Đồ ăn&lt;/li&gt;\r\n	&lt;li&gt;Nước uống&lt;/li&gt;\r\n	&lt;li&gt;Mũ&lt;/li&gt;\r\n&lt;/ol&gt;\r\n\r\n&lt;p&gt;Mọi người cho th&amp;ecirc;m &amp;yacute; kiến được kh&amp;ocirc;ng?&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n','2015-05-10 18:01:08',514),(29,14,'&lt;p&gt;123123123&lt;/p&gt;\r\n','2015-05-10 19:17:51',39),(30,14,'&lt;p&gt;123123123&lt;/p&gt;\r\n','2015-05-10 22:27:49',43),(31,15,'&lt;p&gt;3123123&lt;/p&gt;\r\n','2015-05-10 22:27:58',43),(32,16,'&lt;p&gt;414123123&lt;/p&gt;\r\n','2015-05-10 22:28:08',43),(33,17,'&lt;p&gt;312312312&lt;/p&gt;\r\n','2015-05-10 22:28:16',43),(35,19,'&lt;p&gt;21212&lt;/p&gt;\r\n','2015-05-10 22:29:47',43);

/*Table structure for table `t_public_topic` */

DROP TABLE IF EXISTS `t_public_topic`;

CREATE TABLE `t_public_topic` (
  `PK_TOPIC` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `FK_CLASS` tinyint(4) unsigned DEFAULT NULL,
  `FK_CATEGORY` tinyint(4) unsigned DEFAULT NULL,
  `C_TITLE` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `C_CREATED_DATE` datetime DEFAULT NULL,
  `C_LATEST_DATE` datetime DEFAULT NULL,
  `C_CREATER_USER` int(11) DEFAULT NULL,
  `C_LAST_USER` int(11) DEFAULT NULL,
  `C_POST_NUMBER` int(10) unsigned DEFAULT NULL,
  `C_VIEW_NUMBER` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`PK_TOPIC`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

/*Data for the table `t_public_topic` */

insert  into `t_public_topic`(`PK_TOPIC`,`FK_CLASS`,`FK_CATEGORY`,`C_TITLE`,`C_CREATED_DATE`,`C_LATEST_DATE`,`C_CREATER_USER`,`C_LAST_USER`,`C_POST_NUMBER`,`C_VIEW_NUMBER`) values (2,3,2,'1231','2015-05-06 18:39:49','2015-05-09 15:15:57',39,479,2,5),(9,3,3,'Hoạt động kỷ niệm ngày Nhà giáo Việt Nam 20-11','2015-05-10 17:46:29','2015-05-10 17:49:20',39,39,3,6),(10,3,2,'Kế hoạch nhỏ','2015-05-10 17:47:00','2015-05-10 17:49:07',39,39,2,4),(11,3,3,'Đánh giá phong trào hoạt động thi đua khen thưởng','2015-05-10 17:47:31','2015-05-10 17:49:43',39,39,2,4),(12,3,2,'Kế hoạch ủng hộ đồng bào lũ lụt ','2015-05-10 17:48:02','2015-05-10 17:48:51',39,39,2,4),(13,3,1,'Kế hoạch đi tham quan bảo tàng lịch sử','2015-05-10 17:48:22','2015-05-10 18:01:08',39,514,6,19),(14,4,1,'123124','2015-05-10 22:27:49','2015-05-10 22:27:49',43,43,1,1),(15,4,1,'12312','2015-05-10 22:27:58','2015-05-10 22:27:58',43,43,1,1),(16,4,2,'41241','2015-05-10 22:28:08','2015-05-10 22:28:08',43,43,1,1),(17,4,3,'12312','2015-05-10 22:28:16','2015-05-10 22:28:16',43,43,1,1),(19,0,1,'121','2015-05-10 22:29:47','2015-05-10 22:29:47',43,43,1,1);

/*Table structure for table `t_school_record` */

DROP TABLE IF EXISTS `t_school_record`;

CREATE TABLE `t_school_record` (
  `PK_SCHOOL_RECORD` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `C_STUDENT_CODE` varchar(7) COLLATE utf8_unicode_ci DEFAULT NULL,
  `C_SEMESTER` tinyint(4) DEFAULT NULL,
  `C_YEAR` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `C_TITLE` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `C_TEACHER_CODE` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `C_REMARK_FINAL` text COLLATE utf8_unicode_ci,
  `C_CLASS` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `C_TEACHER_NAME` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`PK_SCHOOL_RECORD`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_school_record` */

insert  into `t_school_record`(`PK_SCHOOL_RECORD`,`C_STUDENT_CODE`,`C_SEMESTER`,`C_YEAR`,`C_TITLE`,`C_TEACHER_CODE`,`C_REMARK_FINAL`,`C_CLASS`,`C_TEACHER_NAME`) values (21,'HS14011',1,'2014-2015',' Học sinh Giỏi','GV0801','Học sinh hoàn thành tốt nhiệm vụ năm học','1C','Nguyễn Minh Thảo'),(22,'HS14012',1,'2014-2015',' Học sinh Giỏi','GV0801','','1C','Nguyễn Minh Thảo'),(23,'HS14013',1,'2014-2015',' Học sinh Khá','GV0801','','1C','Nguyễn Minh Thảo'),(24,'HS14015',1,'2014-2015',' Học sinhKhá','GV0801','','1C','Nguyễn Minh Thảo'),(25,'HS14014',1,'2014-2015',' Học sinh Trung Bình','GV0801','','1C','Nguyễn Minh Thảo'),(26,'HS14016',1,'2014-2015',' Học sinh Giỏi','GV0802',NULL,NULL,NULL),(27,'HS14017',1,'2014-2015',' Học sinh Giỏi','GV0802',NULL,NULL,NULL),(28,'HS14018',1,'2014-2015',' Học sinh Khá','GV0802',NULL,NULL,NULL),(29,'HS14019',1,'2014-2015',' Học sinh Trung Bình','GV0802',NULL,NULL,NULL),(30,'HS14020',1,'2014-2015',' Học sinhKhá','GV0802',NULL,NULL,NULL),(31,'HS14011',2,'2014-2015',' Học sinh Giỏi','GV0801',NULL,'1C','Nguyễn Minh Thảo'),(32,'HS14012',2,'2014-2015',' Học sinh Giỏi','GV0801',NULL,'1C','Nguyễn Minh Thảo'),(33,'HS14013',2,'2014-2015',' Học sinh Khá','GV0801',NULL,'1C','Nguyễn Minh Thảo'),(34,'HS14014',2,'2014-2015',' Học sinh Trung Bình','GV0801',NULL,'1C','Nguyễn Minh Thảo'),(35,'HS14015',2,'2014-2015',' Học sinhKhá','GV0801',NULL,'1C','Nguyễn Minh Thảo');

/*Table structure for table `t_subject` */

DROP TABLE IF EXISTS `t_subject`;

CREATE TABLE `t_subject` (
  `PK_SUBJECT` tinyint(4) NOT NULL AUTO_INCREMENT,
  `C_SUBJECT_NAME` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  UNIQUE KEY `PK_SUBJECT` (`PK_SUBJECT`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_subject` */

insert  into `t_subject`(`PK_SUBJECT`,`C_SUBJECT_NAME`) values (1,'Toán'),(2,'Tiếng Việt'),(3,'Thủ Công'),(4,'Âm Nhạc '),(5,'Mỹ Thuật'),(6,'Thể Dục'),(7,'Tiếng Anh'),(8,'Tin học'),(9,'Đạo đức'),(10,'Lịch sử'),(11,'Địa Lý'),(12,'Kỹ Thuật'),(13,'Khoa Học'),(14,NULL);

/*Table structure for table `t_user` */

DROP TABLE IF EXISTS `t_user`;

CREATE TABLE `t_user` (
  `PK_USER` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `C_NAME` varchar(255) DEFAULT NULL,
  `C_CODE` varchar(7) DEFAULT NULL,
  `C_PHONE` varchar(12) DEFAULT NULL,
  `C_ADDRESS` text,
  `C_EMAIL` varchar(20) DEFAULT NULL,
  `FK_CLASS` varchar(2) DEFAULT NULL,
  `C_LOGIN_NAME` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `C_PASSWORD` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `FK_GROUP` int(11) DEFAULT NULL,
  `FK_GRADE` int(11) DEFAULT NULL,
  `C_FATHER_NAME` varchar(255) DEFAULT NULL,
  `C_MOTHER_NAME` varchar(255) DEFAULT NULL,
  `C_STUDENT_BIRTH` date DEFAULT NULL,
  `C_DELETED` tinyint(4) DEFAULT '0',
  `C_POST_NUMBER` int(11) DEFAULT '0',
  PRIMARY KEY (`PK_USER`)
) ENGINE=InnoDB AUTO_INCREMENT=537 DEFAULT CHARSET=utf8;

/*Data for the table `t_user` */

insert  into `t_user`(`PK_USER`,`C_NAME`,`C_CODE`,`C_PHONE`,`C_ADDRESS`,`C_EMAIL`,`FK_CLASS`,`C_LOGIN_NAME`,`C_PASSWORD`,`FK_GROUP`,`FK_GRADE`,`C_FATHER_NAME`,`C_MOTHER_NAME`,`C_STUDENT_BIRTH`,`C_DELETED`,`C_POST_NUMBER`) values (39,'Nguyễn Minh Thảo','GV0801','1223','12312312','3123123@gmail.com','3','nguyenminhthao','e10adc3949ba59abbe56e057f20f883e',3,1,NULL,NULL,'0000-00-00',0,59),(40,'GV Trường','GV0901','12','asdagadfadasdwwd','12@gmail.com','','giaovientruong','e10adc3949ba59abbe56e057f20f883e',2,0,NULL,NULL,NULL,0,0),(47,'admin',NULL,NULL,NULL,NULL,NULL,'admin','e10adc3949ba59abbe56e057f20f883e',1,NULL,NULL,NULL,NULL,0,4),(465,'Phạm Minh Tuấn','HS14001','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','nxb1208@gmail.com','6','phamminhtuan02012008','e10adc3949ba59abbe56e057f20f883e',4,2,'Nguyễn Xuân Bách','Phạm Thu Hương ','2008-01-02',0,0),(466,'Nguyễn Thành Trung','HS14002','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','nvb1398@gmail.com','6','nguyenthanhtrung03012008','e10adc3949ba59abbe56e057f20f883e',4,2,'Nguyễn Văn Bằng','Phạm Thúy Hằng','2008-01-03',0,0),(467,'Lê Xuân Quỳnh','HS14003','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','ltc1408@gmail.com','6','lexuanquynh04012008','e10adc3949ba59abbe56e057f20f883e',4,2,'Lê Tiến Châu','Vũ Thị Hiền','2008-01-04',0,0),(468,'Hoàng Thị Vân','HS14004','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','ttđ1508@gmail.com','6','hoangthivan05012008','e10adc3949ba59abbe56e057f20f883e',4,2,'Trần Tiến Đức','Trương Thị Lệ Khanh','2008-01-05',0,0),(469,'Nguyễn Quỳnh Chi','HS14005','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','pvd1608@gmail.com','6','nguyenquynhchi06012008','e10adc3949ba59abbe56e057f20f883e',4,2,'Phạm Văn Dũng','Nguyễn Hoàng Yến','2008-01-06',0,0),(470,'Phạm Bích Nga','HS14006','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','ptđ1708@gmail.com','6','phambichnga07012008','e10adc3949ba59abbe56e057f20f883e',4,2,'Phạm Tiến Đức','Chu Thị Bình','2008-01-07',0,0),(471,'Phạm Minh Sơn','HS14007','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','tqd1808@gmail.com','6','phamminhson08012008','e10adc3949ba59abbe56e057f20f883e',4,2,'Tạ Quang Dũng','Phan Thi Hương','2008-01-08',0,0),(472,'Tạ Thu Hiền','HS14008','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','lmg1908@gmail.com','6','tathuhien09012008','e10adc3949ba59abbe56e057f20f883e',4,2,'Lê Minh Giang','Nguyễn Thị Kim Xuân','2008-01-09',0,0),(473,'Nguyễn Hoàng Lam','HS14009','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','hmg110008@gmail.com','6','nguyenhoanglam10012008','e10adc3949ba59abbe56e057f20f883e',4,2,'Hoàng Minh Giám','Nguyễn Thị Như Loan','2008-01-10',0,0),(474,'Phạm Ngoc Long','HS14010','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','hvt111008@gmail.com','6','phamngoclong11012008','e10adc3949ba59abbe56e057f20f883e',4,2,'Hoàng Văn Thái','Đặng Ngọc Lan','2008-01-11',0,0),(475,'Nguyễn Thúy Quỳnh','HS14011','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','lth112008@gmail.com','3','nguyenthuyquynh12012008','e10adc3949ba59abbe56e057f20f883e',4,2,'Lý Trần Hiệp','Phùng Minh Nguyệt','2008-01-12',0,1),(476,'Phạm Văn Mách','HS14012','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','cđh113008@gmail.com','3','phamvanmach13012008','e10adc3949ba59abbe56e057f20f883e',4,2,'Chu Đình Hào','Đặng Thị Hoàng Yến','2008-01-13',0,0),(477,'Nguyễn Quỳnh Trang','HS14013','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','lth114008@gmail.com','3','nguyenquynhtrang14012008','e10adc3949ba59abbe56e057f20f883e',4,2,'Lý Trần Hiệp','Nguyễn Thị Diệu Hiền','2008-01-14',0,0),(478,'Nguyễn Tự Nguyện','HS14014','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','nmh115008@gmail.com','3','nguyentunguyen15012008','e10adc3949ba59abbe56e057f20f883e',4,2,'Nguyễn Minh Hoàng','Phạm Thị Lê','2008-01-15',0,0),(479,'Trần Đình Quang','HS14015','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','nth116008@gmail.com','3','trandinhquang16012008','e10adc3949ba59abbe56e057f20f883e',4,2,'Nguyễn Trí Huân','Cao Thị Ngọc Dung','2008-01-16',0,2),(480,'Đoàn Thúy Hường','HS14016','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','nvt118008@gmail.com','9','doanthuyhuong18012008','e10adc3949ba59abbe56e057f20f883e',4,2,'Nguyễn Việt Thái','Huỳnh Quế Hà','2008-01-18',0,0),(481,'Trần Đình Tùng','HS14017','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','pqh119008@gmail.com','9','trandinhtung19012008','e10adc3949ba59abbe56e057f20f883e',4,2,'Phạm Quang Huy','Lê Thị Dịu Minh','2008-01-19',0,0),(482,'Phạm Đan Trường','HS14018','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','nkd120008@gmail.com','9','phamdantruong20012008','e10adc3949ba59abbe56e057f20f883e',4,2,'Nguyễn Khánh Dựng','Phạm Hồng Linh','2008-01-20',0,0),(483,'Nguyễn Lan Anh','HS14019','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','ntl121008@gmail.com','9','nguyenlananh21012008','e10adc3949ba59abbe56e057f20f883e',4,2,'Nguyễn Thanh Lâm','Mai Kiều Liên','2008-01-21',0,0),(484,'Nguyễn Thị Thúy Hồng','HS14020','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','tvl122008@gmail.com','9','nguyenthithuyhong22012008','e10adc3949ba59abbe56e057f20f883e',4,2,'Trần Văn Long','Trương Thị Thanh','2008-01-22',0,0),(485,'Trần Hồng Hạnh','HS14021','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','nnm123008@gmail.com','10','tranhonghanh23012008','e10adc3949ba59abbe56e057f20f883e',4,2,'Nguyễn Nhật Minh','Quách Thị Nga','2008-01-23',0,0),(486,'Phạm Thành Sơn','HS14022','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','nvn124008@gmail.com','10','phamthanhson24012008','e10adc3949ba59abbe56e057f20f883e',4,2,'Nguyễn Văn Nhất','Ngô Thị Thông','2008-01-24',0,0),(487,'Trần Thanh Sơn','HS14023','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','pvh125008@gmail.com','10','tranthanhson25012008','e10adc3949ba59abbe56e057f20f883e',4,2,'Phạm Văn Hùng','Nguyễn Thị Kim Xuân','2008-01-25',0,0),(488,'Phạm Thị Huệ','HS14024','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','tta126008@gmail.com','10','phamthihue26012008','e10adc3949ba59abbe56e057f20f883e',4,2,'Trần Thái Anh','Nguyễn Thái Nga','2008-01-26',0,0),(489,'Nguyễn Kim Tường','HS14025','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','nda127008@gmail.com','10','nguyenkimtuong27012008','e10adc3949ba59abbe56e057f20f883e',4,2,'Nguyễn Duy Anh','Đỗ Thị Thu Hà','2008-01-27',0,0),(505,'Nguyễn Thành Trung','HS14002','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','nvb1398@gmail.com','1','nguyenthanhtrung030120082','e10adc3949ba59abbe56e057f20f883e',4,1,'Nguyễn Văn Bằng','Phạm Thúy Hằng','2008-01-03',0,0),(506,'Lê Xuân Quỳnh','HS14003','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','ltc1408@gmail.com','1','lexuanquynh040120082','e10adc3949ba59abbe56e057f20f883e',4,1,'Lê Tiến Châu','Vũ Thị Hiền','2008-01-04',0,0),(507,'Hoàng Thị Vân','HS14004','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','ttđ1508@gmail.com','1','hoangthivan050120082','e10adc3949ba59abbe56e057f20f883e',4,1,'Trần Tiến Đức','Trương Thị Lệ Khanh','2008-01-05',0,0),(508,'Nguyễn Quỳnh Chi','HS14005','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','pvd1608@gmail.com','1','nguyenquynhchi060120082','e10adc3949ba59abbe56e057f20f883e',4,1,'Phạm Văn Dũng','Nguyễn Hoàng Yến','2008-01-06',0,0),(509,'Phạm Bích Nga','HS14006','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','ptđ1708@gmail.com','2','phambichnga070120082','e10adc3949ba59abbe56e057f20f883e',4,1,'Phạm Tiến Đức','Chu Thị Bình','2008-01-07',0,0),(510,'Phạm Minh Sơn','HS14007','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','tqd1808@gmail.com','2','phamminhson080120082','e10adc3949ba59abbe56e057f20f883e',4,1,'Tạ Quang Dũng','Phan Thi Hương','2008-01-08',0,0),(511,'Tạ Thu Hiền','HS14008','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','lmg1908@gmail.com','2','tathuhien090120082','e10adc3949ba59abbe56e057f20f883e',4,1,'Lê Minh Giang','Nguyễn Thị Kim Xuân','2008-01-09',0,0),(512,'Nguyễn Hoàng Lam','HS14009','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','hmg110008@gmail.com','2','nguyenhoanglam100120082','e10adc3949ba59abbe56e057f20f883e',4,1,'Hoàng Minh Giám','Nguyễn Thị Như Loan','2008-01-10',0,0),(513,'Phạm Ngoc Long','HS14010','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','hvt111008@gmail.com','2','phamngoclong110120082','e10adc3949ba59abbe56e057f20f883e',4,1,'Hoàng Văn Thái','Đặng Ngọc Lan','2008-01-11',0,0),(514,'Nguyễn Thúy Quỳnh','HS14011','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','lth112008@gmail.com','8','nguyenthuyquynh120120082','e10adc3949ba59abbe56e057f20f883e',4,2,'Lý Trần Hiệp','Phùng Minh Nguyệt','2008-01-12',0,1),(515,'Phạm Văn Mách','HS14012','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','cđh113008@gmail.com','8','phamvanmach130120082','e10adc3949ba59abbe56e057f20f883e',4,2,'Chu Đình Hào','Đặng Thị Hoàng Yến','2008-01-13',0,0),(516,'Nguyễn Quỳnh Trang','HS14013','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','lth114008@gmail.com','8','nguyenquynhtrang140120082','e10adc3949ba59abbe56e057f20f883e',4,2,'Lý Trần Hiệp','Nguyễn Thị Diệu Hiền','2008-01-14',0,0),(517,'Nguyễn Tự Nguyện','HS14014','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','nmh115008@gmail.com','8','nguyentunguyen150120082','e10adc3949ba59abbe56e057f20f883e',4,2,'Nguyễn Minh Hoàng','Phạm Thị Lê','2008-01-15',0,0),(518,'Trần Đình Quang','HS14015','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','nth116008@gmail.com','8','trandinhquang160120082','e10adc3949ba59abbe56e057f20f883e',4,2,'Nguyễn Trí Huân','Cao Thị Ngọc Dung','2008-01-16',0,0),(519,'Đoàn Thúy Hường','HS14016','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','nvt118008@gmail.com','4','doanthuyhuong180120082','e10adc3949ba59abbe56e057f20f883e',4,1,'Nguyễn Việt Thái','Huỳnh Quế Hà','2008-01-18',0,0),(520,'Trần Đình Tùng','HS14017','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','pqh119008@gmail.com','4','trandinhtung190120082','e10adc3949ba59abbe56e057f20f883e',4,1,'Phạm Quang Huy','Lê Thị Dịu Minh','2008-01-19',0,0),(521,'Phạm Đan Trường','HS14018','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','nkd120008@gmail.com','4','phamdantruong200120082','e10adc3949ba59abbe56e057f20f883e',4,1,'Nguyễn Khánh Dựng','Phạm Hồng Linh','2008-01-20',0,0),(522,'Nguyễn Lan Anh','HS14019','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','ntl121008@gmail.com','4','nguyenlananh210120082','e10adc3949ba59abbe56e057f20f883e',4,1,'Nguyễn Thanh Lâm','Mai Kiều Liên','2008-01-21',0,0),(523,'Nguyễn Thị Thúy Hồng','HS14020','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','tvl122008@gmail.com','4','nguyenthithuyhong220120082','e10adc3949ba59abbe56e057f20f883e',4,1,'Trần Văn Long','Trương Thị Thanh','2008-01-22',0,0),(524,'Trần Hồng Hạnh','HS14021','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','nnm123008@gmail.com','5','tranhonghanh230120082','e10adc3949ba59abbe56e057f20f883e',4,1,'Nguyễn Nhật Minh','Quách Thị Nga','2008-01-23',0,0),(525,'Phạm Thành Sơn','HS14022','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','nvn124008@gmail.com','5','phamthanhson240120082','e10adc3949ba59abbe56e057f20f883e',4,1,'Nguyễn Văn Nhất','Ngô Thị Thông','2008-01-24',0,0),(526,'Trần Thanh Sơn','HS14023','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','pvh125008@gmail.com','5','tranthanhson250120082','e10adc3949ba59abbe56e057f20f883e',4,1,'Phạm Văn Hùng','Nguyễn Thị Kim Xuân','2008-01-25',0,0),(527,'Phạm Thị Huệ','HS14024','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','tta126008@gmail.com','5','phamthihue260120082','e10adc3949ba59abbe56e057f20f883e',4,1,'Trần Thái Anh','Nguyễn Thái Nga','2008-01-26',0,0),(528,'Nguyễn Kim Tường','HS14025','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','nda127008@gmail.com','5','nguyenkimtuong270120082','e10adc3949ba59abbe56e057f20f883e',4,1,'Nguyễn Duy Anh','Đỗ Thị Thu Hà','2008-01-27',0,0),(532,'Nguyễn Tuấn Hùng','HS14111','012842323','Khâm Thiên','3123123@gmail.com','5','nguyentuanhung12052013','e10adc3949ba59abbe56e057f20f883e',4,1,'1231231231','2312312312','2013-05-12',0,0),(533,'Nguyễn Tuấn Hải','22113','132123123','123123123','23123@adasd.fdgdfg','5','nguyentuanhai31052009','e10adc3949ba59abbe56e057f20f883e',4,1,'12312','123123','2009-05-31',0,0),(534,'Nguyễn Hoàng Lan','GV0701','12123','123123123','12312312@gangn.df','1','nguyenhoanglan15051986','e10adc3949ba59abbe56e057f20f883e',3,1,NULL,NULL,'1986-05-15',0,0),(535,'Đỗ Hoàng Lan','GV8701','1231231','2312312','313123@gmai.com','2','dohoanglan12031985','e10adc3949ba59abbe56e057f20f883e',3,1,NULL,NULL,'1985-03-12',0,0),(536,'giaovientruong','GV0101','1231231231','231231231','231223@asdasd.dfgdfg','','giaovientruong29051970','e10adc3949ba59abbe56e057f20f883e',2,0,NULL,NULL,'1970-05-29',0,0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
