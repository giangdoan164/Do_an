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
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;

/*Data for the table `t_announce` */

insert  into `t_announce`(`PK_ANNOUNCE`,`FK_CATEGORY`,`FK_TEACHER_USER`,`FK_PARENT_USER`,`FK_CLASS`,`FK_GRADE`,`C_DATE`,`C_CONTENT`) values (1,1,39,35,3,1,'2015-02-18 10:15:55','Học sinh A đi học muộn'),(2,1,39,36,3,1,'2015-02-11 10:16:39','Học sinh B không làm bài kiểm tra'),(3,1,39,37,3,1,'2015-02-26 10:17:04','Thông báo nghỉ học'),(4,2,39,37,3,1,'2015-03-23 10:17:38','sdasdwdaw'),(5,3,39,38,3,1,'2015-02-11 10:17:53','ádwdasdgfgdfg'),(6,2,39,38,3,1,'2014-12-17 10:18:17','ădasdasdadfsdf'),(7,1,40,38,3,NULL,'2015-03-03 11:28:58','sdfsdfsfese'),(8,1,43,45,4,1,'2015-03-11 11:31:29','dfsdfsacef'),(9,2,43,46,4,1,'2015-03-13 11:31:31','dfgdfgsdvrvr'),(10,1,40,45,4,1,'2015-03-15 11:31:34','fsefsdfsdfsf'),(11,2,40,46,4,1,'2015-03-09 11:31:37','Thong bao moi'),(12,1,1,1,1,1,'2014-01-01 00:00:00','hoho haha'),(13,1,60,61,5,1,'2015-03-28 14:30:46','aaaaaaaaaaaaaaaaaaaaaaa'),(14,1,60,62,5,1,'2015-03-28 14:30:46','aaaaaaaaaaaaaaaaaaaaaaa'),(15,1,60,63,5,1,'2015-03-28 14:30:46','aaaaaaaaaaaaaaaaaaaaaaa'),(16,1,39,35,3,1,'2015-03-28 14:38:13','Thông báo phụ huynh mời các con em đi học vào ngày mai'),(17,1,39,36,3,1,'2015-03-28 14:38:13','Thông báo phụ huynh mời các con em đi học vào ngày mai'),(18,1,39,37,3,1,'2015-03-28 14:38:13','Thông báo phụ huynh mời các con em đi học vào ngày mai'),(19,1,39,38,3,1,'2015-03-28 14:38:13','Thông báo phụ huynh mời các con em đi học vào ngày mai'),(20,3,39,35,3,1,'2015-03-28 14:41:22','HỌc sinh đi học muộn'),(21,3,39,36,3,1,'2015-03-28 14:41:22','HỌc sinh đi học muộn'),(22,3,39,37,3,1,'2015-03-28 14:41:22','HỌc sinh đi học muộn'),(23,3,39,38,3,1,'2015-03-28 14:41:22','HỌc sinh đi học muộn'),(24,1,60,61,5,1,'2015-03-28 17:13:23','Thong bao nghi hoc'),(25,1,60,63,5,1,'2015-03-28 17:13:23','Thong bao nghi hoc'),(26,2,60,61,5,1,'2015-03-28 17:32:28','Đi học muộn'),(27,2,60,62,5,1,'2015-03-28 17:32:28','Làm bài không đầy đủ'),(28,1,60,63,5,1,'2015-03-29 03:20:03','Học bài đầy đủ nhé'),(29,1,39,35,3,1,'2015-03-29 05:05:07','abc'),(30,1,39,36,3,1,'2015-03-29 05:05:07','abc'),(31,1,39,37,3,1,'2015-03-29 05:05:07','abc'),(32,1,39,38,3,1,'2015-03-29 05:05:07','abc'),(33,1,40,35,3,1,'2015-03-29 05:32:40','Thông báo học sinh toàn trường được nghỉ học'),(34,1,40,36,3,1,'2015-03-29 05:32:40','Thông báo học sinh toàn trường được nghỉ học'),(35,1,40,37,3,1,'2015-03-29 05:32:40','Thông báo học sinh toàn trường được nghỉ học'),(36,1,40,38,3,1,'2015-03-29 05:32:40','Thông báo học sinh toàn trường được nghỉ học'),(37,1,40,44,4,1,'2015-03-29 05:32:40','Thông báo học sinh toàn trường được nghỉ học'),(38,1,40,45,4,1,'2015-03-29 05:32:40','Thông báo học sinh toàn trường được nghỉ học'),(39,1,40,46,4,1,'2015-03-29 05:32:40','Thông báo học sinh toàn trường được nghỉ học'),(40,1,40,61,5,1,'2015-03-29 05:32:40','Thông báo học sinh toàn trường được nghỉ học'),(41,1,40,62,5,1,'2015-03-29 05:32:40','Thông báo học sinh toàn trường được nghỉ học'),(42,1,40,63,5,1,'2015-03-29 05:32:40','Thông báo học sinh toàn trường được nghỉ học'),(43,1,39,35,3,1,'2015-04-03 04:52:04','lkhdlkghsldkghd'),(44,1,39,36,3,1,'2015-04-03 04:52:04','lkhdlkghsldkghd'),(45,1,39,37,3,1,'2015-04-03 04:52:04','lkhdlkghsldkghd'),(46,1,39,38,3,1,'2015-04-03 04:52:04','lkhdlkghsldkghd'),(47,3,39,36,3,1,'2015-04-03 04:53:10','thong bao hoc sinh di hoc muon');

/*Table structure for table `t_category` */

DROP TABLE IF EXISTS `t_category`;

CREATE TABLE `t_category` (
  `PK_CATEGORY` tinyint(4) NOT NULL AUTO_INCREMENT,
  `C_NAME` varchar(255) DEFAULT NULL,
  `C_DESCRIPTION` text,
  PRIMARY KEY (`PK_CATEGORY`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `t_category` */

insert  into `t_category`(`PK_CATEGORY`,`C_NAME`,`C_DESCRIPTION`) values (1,'Trao đổi chung',NULL),(2,'Góc học tập',NULL),(3,'Góc kỷ luật',NULL),(4,'Giải trí',NULL),(5,'Vui chơi',NULL);

/*Table structure for table `t_class` */

DROP TABLE IF EXISTS `t_class`;

CREATE TABLE `t_class` (
  `PK_CLASS` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `C_CLASS_NAME` varchar(2) CHARACTER SET utf8 DEFAULT NULL,
  `FK_GRADE` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`PK_CLASS`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `t_class` */

insert  into `t_class`(`PK_CLASS`,`C_CLASS_NAME`,`FK_GRADE`) values (1,'1B',1),(3,'1C',1),(4,'1D',1),(5,'1E',1),(6,'1F',1),(7,'2A',2),(8,'2B',2),(9,'2C',2),(10,'2D',2),(12,'2F',2);

/*Table structure for table `t_detail_school_record_1` */

DROP TABLE IF EXISTS `t_detail_school_record_1`;

CREATE TABLE `t_detail_school_record_1` (
  `PK_DETAIL_RECORD` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `FK_SCHOOL_RECORD` int(10) unsigned DEFAULT NULL,
  `FK_SUBJECT` tinyint(4) DEFAULT NULL,
  `FK_GRADE` tinyint(4) DEFAULT NULL,
  `C_TEACHER_REMARK` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`PK_DETAIL_RECORD`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_detail_school_record_1` */

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
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

/*Data for the table `t_private_message` */

insert  into `t_private_message`(`PK_MESSAGE`,`FK_THREAD`,`C_CONTENT`,`FK_SENDING_USER`,`C_SENT_DATE`) values (19,6,'&lt;p&gt;11111&lt;/p&gt;\r\n',39,'2015-04-13 21:58:46'),(20,7,'&lt;p&gt;22222&lt;/p&gt;\r\n',38,'2015-04-13 22:05:33'),(21,6,'&lt;p&gt;2222&lt;/p&gt;\r\n',38,'2015-04-13 22:08:40'),(22,8,'&lt;p&gt;121212&lt;/p&gt;\r\n',39,'2015-04-13 22:27:44'),(23,9,'&lt;p&gt;123&lt;/p&gt;\r\n',36,'2015-04-13 23:10:37'),(24,10,'&lt;p&gt;1111&lt;/p&gt;\r\n',36,'2015-04-13 23:40:41'),(25,11,'&lt;p&gt;sdsdsd&lt;/p&gt;\r\n',36,'2015-04-13 23:42:56'),(26,12,'&lt;p&gt;12121&lt;/p&gt;\r\n',39,'2015-04-16 22:25:14'),(27,13,'&lt;p&gt;điểm to&amp;aacute;n thấp&lt;/p&gt;\r\n',39,'2015-04-17 10:28:39'),(28,13,'&lt;p&gt;Thắc mắc l&amp;yacute; do con học k&amp;eacute;m&lt;/p&gt;\r\n',35,'2015-04-17 10:30:34');

/*Table structure for table `t_private_message_read_state` */

DROP TABLE IF EXISTS `t_private_message_read_state`;

CREATE TABLE `t_private_message_read_state` (
  `FK_MESSAGE` int(10) unsigned DEFAULT NULL,
  `FK_USER` int(10) unsigned DEFAULT NULL,
  `C_READ_DATE` datetime DEFAULT NULL,
  `C_READ_STATE` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `t_private_message_read_state` */

insert  into `t_private_message_read_state`(`FK_MESSAGE`,`FK_USER`,`C_READ_DATE`,`C_READ_STATE`) values (19,39,NULL,1),(19,38,NULL,1),(20,38,NULL,1),(20,39,NULL,1),(21,38,NULL,1),(21,39,NULL,1),(22,39,NULL,1),(22,38,NULL,0),(23,36,NULL,1),(23,39,NULL,1),(24,36,NULL,1),(24,39,NULL,1),(25,36,NULL,1),(25,39,NULL,1),(26,39,NULL,1),(26,35,NULL,0),(27,39,NULL,1),(27,35,NULL,1),(28,35,NULL,1),(28,39,NULL,1);

/*Table structure for table `t_private_thread` */

DROP TABLE IF EXISTS `t_private_thread`;

CREATE TABLE `t_private_thread` (
  `PK_THREAD` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `C_TITLE` text,
  `C_CREATED_DATE` datetime DEFAULT NULL,
  `C_CREATED_USER` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`PK_THREAD`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

/*Data for the table `t_private_thread` */

insert  into `t_private_thread`(`PK_THREAD`,`C_TITLE`,`C_CREATED_DATE`,`C_CREATED_USER`) values (6,'1111','2015-04-13 21:58:46',39),(7,'222','2015-04-13 22:05:33',38),(8,'1212','2015-04-13 22:27:44',39),(9,'123','2015-04-13 23:10:37',36),(10,'111','2015-04-13 23:40:41',36),(11,'sds','2015-04-13 23:42:56',36),(12,'1212','2015-04-16 22:25:14',39),(13,'tinh hình học tập con phụ huynh','2015-04-17 10:28:39',39);

/*Table structure for table `t_private_thread_participant` */

DROP TABLE IF EXISTS `t_private_thread_participant`;

CREATE TABLE `t_private_thread_participant` (
  `FK_THREAD` int(10) unsigned DEFAULT NULL,
  `FK_USER` int(10) unsigned DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `t_private_thread_participant` */

insert  into `t_private_thread_participant`(`FK_THREAD`,`FK_USER`) values (6,38),(7,38),(7,39),(8,39),(8,38),(9,36),(10,36),(10,39),(11,36),(11,39),(12,39),(12,35),(13,39);

/*Table structure for table `t_public_post` */

DROP TABLE IF EXISTS `t_public_post`;

CREATE TABLE `t_public_post` (
  `PK_POST` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `FK_TOPIC` int(11) DEFAULT NULL,
  `C_CONTENT` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `C_POSTED_DATE` datetime DEFAULT NULL,
  `C_POSTED_USER` int(11) DEFAULT NULL,
  PRIMARY KEY (`PK_POST`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

/*Data for the table `t_public_post` */

insert  into `t_public_post`(`PK_POST`,`FK_TOPIC`,`C_CONTENT`,`C_POSTED_DATE`,`C_POSTED_USER`) values (1,1,'hoc sinh dioc nghi hoc vao ngay ngay','2015-04-04 00:00:00',39),(2,1,'Tai sao lai phai nghi','2015-05-04 00:00:00',37),(3,1,'Phai nghi chu','2015-04-06 00:00:00',35),(4,2,'oho','2015-04-06 00:00:00',39),(5,2,'aha','2015-04-06 00:00:00',38),(6,1,'23434234','2015-04-06 00:00:00',37),(7,15,'Kế hoạch là ngày 24 xuât phát','2015-04-07 12:56:46',39),(8,16,'Ngày 25/12 là họp phụ huynh ','2015-04-07 13:01:23',39),(9,17,'Hôm nay học sinh được nghỉ học','2015-04-07 13:02:58',39),(10,18,'Tiền học tháng 3','2015-04-07 13:04:25',39),(12,0,'','2015-04-08 03:13:56',39),(13,18,'&lt;p&gt;lsdkgjsad&lt;/p&gt;\r\n','2015-04-08 03:14:45',39),(14,18,'&lt;p&gt;&lt;em&gt;&lt;strong&gt;tien hoc thang 4&lt;/strong&gt;&lt;/em&gt;&lt;/p&gt;\r\n','2015-04-08 15:48:09',39),(15,18,'&lt;blockquote&gt;\r\n&lt;p&gt;gdlkfjgdjfkgsfgsdgaasd&lt;/p&gt;\r\n&lt;/blockquote&gt;\r\n','2015-04-08 15:48:27',39),(16,18,'&lt;h1&gt;asdasdasdasdw&lt;/h1&gt;\r\n','2015-04-08 15:48:36',39),(17,0,'','2015-04-08 16:14:11',39),(18,16,'&lt;h2&gt;Đề nghị phụ huynh họp đ&amp;uacute;ng h&lt;/h2&gt;\r\n','2015-04-08 21:22:42',39),(19,16,'&lt;p&gt;dfahgdhaef&lt;/p&gt;\r\n','2015-04-08 21:28:42',39),(20,18,'&lt;p&gt;&amp;egrave;dssveq&lt;/p&gt;\r\n','2015-04-08 21:28:57',39),(21,19,'SDASDASD','2015-04-08 21:29:28',39),(22,18,'&lt;ul&gt;\r\n	&lt;li&gt;học sinn n&amp;ecirc;n l&amp;agrave;m b&amp;agrave;i đầy đủ&lt;/li&gt;\r\n	&lt;li&gt;kh&amp;ocirc;ng được chơi game&lt;/li&gt;\r\n&lt;/ul&gt;\r\n','2015-04-08 21:36:23',39),(23,0,'','2015-04-08 21:52:49',39),(24,18,'&lt;p&gt;fghdy&lt;/p&gt;\r\n','2015-04-08 22:13:25',39),(25,0,'','2015-04-08 22:58:48',39),(26,0,'','2015-04-08 22:58:56',39),(27,18,'&lt;p&gt;hjllutc&lt;/p&gt;\r\n','2015-04-08 23:56:31',39),(28,18,'&lt;p&gt;hjllutc&lt;/p&gt;\r\n','2015-04-08 23:59:20',39),(29,18,'&lt;p&gt;hjllutc&lt;/p&gt;\r\n','2015-04-09 00:00:36',39),(30,18,'&lt;p&gt;hjllutc&lt;/p&gt;\r\n','2015-04-09 00:01:15',39),(31,18,'&lt;p&gt;hoho haha&lt;/p&gt;\r\n','2015-04-09 00:02:42',39),(32,16,'&lt;p&gt;d&amp;agrave;qga&lt;/p&gt;\r\n','2015-04-09 00:03:19',39),(33,0,'','2015-04-08 23:38:01',39),(34,0,'','2015-04-08 23:38:13',39),(35,16,'&lt;p&gt;ạilsdkgjlksjdg&lt;/p&gt;\r\n','2015-04-17 09:27:51',39),(36,20,'121212','2015-04-17 09:28:19',39),(37,20,'&lt;p&gt;okeeeoke&lt;/p&gt;\r\n','2015-04-17 09:43:13',38);

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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

/*Data for the table `t_public_topic` */

insert  into `t_public_topic`(`PK_TOPIC`,`FK_CLASS`,`FK_CATEGORY`,`C_TITLE`,`C_CREATED_DATE`,`C_LATEST_DATE`,`C_CREATER_USER`,`C_LAST_USER`,`C_POST_NUMBER`,`C_VIEW_NUMBER`) values (1,3,3,'33333333333333333','2015-03-04 00:00:10','2015-03-04 00:00:10',NULL,35,2,2),(2,3,3,'333444444','2015-03-04 00:00:11','2015-03-04 00:00:11',NULL,36,2,2),(3,3,3,'3erer3546363452','2015-02-04 00:00:09','2015-02-04 00:00:09',NULL,37,2,2),(4,3,3,'quefsdfzfzsdf','2015-02-04 00:00:08','2015-02-04 00:00:08',NULL,38,2,2),(5,3,2,'ádasdawdas','2015-02-01 00:00:07','2015-02-01 00:00:07',NULL,39,2,3),(6,3,2,'adsfdsfgdxvxvzsd','2015-02-04 01:01:01','2015-02-04 01:01:01',NULL,35,2,6),(7,3,1,'ádasczxcdfasd','2015-02-04 01:01:05','2015-02-04 01:01:05',NULL,36,2,2),(8,3,3,'dfsdfzfvWESC','2015-02-04 00:01:09','2015-02-04 00:01:09',NULL,37,2,3),(9,3,3,'asdasdwqdasd','2015-02-05 00:00:00','2015-02-05 00:00:00',NULL,38,2,2),(10,3,3,'adasdxd','2015-06-05 00:00:00','2015-06-05 00:00:00',NULL,39,2,5),(11,4,4,'ádasdefDf','2015-06-05 00:00:00','0000-00-00 00:00:00',NULL,35,2,11),(12,1,1,'1','0000-00-00 00:00:00','0000-00-00 00:00:00',1,1,1,1),(13,3,1,'sadadsglkhafkjg','2015-04-06 19:00:34','2015-04-06 19:00:34',39,39,1,6),(14,3,1,'mêmo','2015-04-07 01:35:25','0000-00-00 00:00:00',39,12,12,2),(15,3,1,'Thông báo đi thăm quan viện bảo tàng lịch sử','2015-04-07 12:56:46','2015-04-07 12:56:46',39,39,1,17),(16,3,1,'Thông báo họp phụ huynh','2015-04-07 13:01:23','2015-04-17 09:27:51',39,39,5,24),(17,3,1,'Thông báo nghỉ học','2015-04-07 13:02:58','2015-04-07 13:02:58',39,39,1,10),(18,3,1,'Thông báo tiền học','2015-04-07 13:04:25','2015-04-09 00:02:42',39,39,13,65),(19,3,1,'ádasdad','2015-04-08 21:29:28','2015-04-08 21:29:28',39,39,1,1),(20,3,1,'nghi 30 /4','2015-04-17 09:28:19','2015-04-17 09:43:13',39,38,2,3);

/*Table structure for table `t_school_record_1` */

DROP TABLE IF EXISTS `t_school_record_1`;

CREATE TABLE `t_school_record_1` (
  `PK_SCHOOL_RECORD` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `C_STUDENT_CODE` varchar(7) COLLATE utf8_unicode_ci DEFAULT NULL,
  `C_SEMESTER` tinyint(4) DEFAULT NULL,
  `C_YEAR` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `C_TITLE` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `C_TEACHER_CODE` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`PK_SCHOOL_RECORD`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_school_record_1` */

/*Table structure for table `t_school_report` */

DROP TABLE IF EXISTS `t_school_report`;

CREATE TABLE `t_school_report` (
  `PK_RECORD` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `FK_TEACHER_USER` int(10) unsigned DEFAULT NULL,
  `FK_STUDENT_USER` int(10) unsigned DEFAULT NULL,
  `FK_GRADE` tinyint(3) unsigned DEFAULT NULL,
  `FK_CLASS` tinyint(3) unsigned DEFAULT NULL,
  `C_SEMESTER` tinyint(4) DEFAULT NULL,
  `C_YEAR` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `C_MATH_GRADE` tinyint(3) unsigned DEFAULT NULL,
  `C_LITERATURE_GRADE` tinyint(3) unsigned DEFAULT NULL,
  `C_FINAL_GRADE` tinyint(4) DEFAULT NULL,
  `C_TEACHER_REMARK` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`PK_RECORD`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `t_school_report` */

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
  `C_STUDENT_CODE` varchar(7) DEFAULT NULL,
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
  `C_POST_NUMBER` int(11) DEFAULT NULL,
  PRIMARY KEY (`PK_USER`)
) ENGINE=InnoDB AUTO_INCREMENT=188 DEFAULT CHARSET=utf8;

/*Data for the table `t_user` */

insert  into `t_user`(`PK_USER`,`C_NAME`,`C_STUDENT_CODE`,`C_PHONE`,`C_ADDRESS`,`C_EMAIL`,`FK_CLASS`,`C_LOGIN_NAME`,`C_PASSWORD`,`FK_GROUP`,`FK_GRADE`,`C_FATHER_NAME`,`C_MOTHER_NAME`,`C_STUDENT_BIRTH`,`C_DELETED`,`C_POST_NUMBER`) values (35,'Phạm Minh Tuấn','HS14001','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','nxb1208@gmail.com','3','phamminhtuan01022008','123456',4,1,'Nguyễn Xuân Bách','Phạm Thu Hương ','2008-02-01',0,4),(36,'Nguyễn Thành Trung','HS14002','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','nvb1398@gmail.com','3','nguyenthanhtrung01032008','123456',4,1,'Nguyễn Văn Bằng','Phạm Thúy Hằng','2008-03-01',0,4),(37,'Lê Xuân Quỳnh','HS14003','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','ltc1408@gmail.com','3','lexuanquynh01042008','123456',4,1,'Lê Tiến Châu','Vũ Thị Hiền','2008-04-01',0,4),(38,'Hoàng Thị Vân','HS14004','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','ttđ1508@gmail.com','3','hoangthivan01052008','123456',4,1,'Trần Tiến Đức','Trương Thị Lệ Khanh','2008-05-01',0,5),(39,'Nguyễn Minh Thảo  1C',NULL,'','','','3','nguyenminhthao','123456',3,1,NULL,NULL,NULL,0,7),(40,'GV Trường',NULL,'','','','','giaovientruong','123456',2,0,NULL,NULL,NULL,0,4),(43,'Nguyễn Minh Trang 1D',NULL,'','','','4','nguyenminhtrang','123456',3,1,NULL,NULL,NULL,0,4),(44,'Nguyễn Văn Long',NULL,'(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','nxb1208@gmail.com','4',NULL,'123456',4,1,'Nguyễn Xuân Bách','Phạm Thu Hương ','2008-02-01',0,4),(45,'Trần Thái Hoàng',NULL,'(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','nvb1398@gmail.com','4',NULL,'123456',4,1,'Nguyễn Văn Bằng','Phạm Thúy Hằng','2008-03-01',0,4),(46,'Lê Văn Quý Hoàng',NULL,'(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','ltc1408@gmail.com','4','lvqh','123456',4,1,'Lê Tiến Châu','Vũ Thị Hiền','2008-04-01',0,4),(47,'admin',NULL,NULL,NULL,NULL,NULL,'admin','123456',1,NULL,NULL,NULL,NULL,0,4),(60,'Nguyễn Hoàng Giang',NULL,'01348737847','','','5','nguyenhoanggiang','123456',3,1,NULL,NULL,NULL,0,4),(61,'Nguyễn Văn Long',NULL,'(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','nxb1208@gmail.com','5',NULL,'123456',4,1,'Nguyễn Xuân Bách','Phạm Thu Hương ','2008-02-01',0,4),(62,'Trần Thái Hoàng',NULL,'(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','nvb1398@gmail.com','5',NULL,'123456',4,1,'Nguyễn Văn Bằng','Phạm Thúy Hằng','2008-03-01',0,4),(63,'Lê Văn Quý Hoàng',NULL,'(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','ltc1408@gmail.com','5','lvqh2','123456',4,1,'Lê Tiến Châu','Vũ Thị Hiền','2008-04-01',0,4),(64,'Phạm Tuấn Hảo',NULL,'(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','nxb1208@gmail.com','7',NULL,'123456',4,2,'Nguyễn Xuân Bách','Phạm Thu Hương ','2008-02-01',0,4),(65,'Nguyễn Minh Thùy',NULL,'(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','nvb1398@gmail.com','7',NULL,'123456',4,2,'Nguyễn Văn Bằng','Phạm Thúy Hằng','2008-03-01',0,4),(66,'Trần Văn Quyết',NULL,'(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','ltc1408@gmail.com','7',NULL,'123456',4,2,'Lê Tiến Châu','Vũ Thị Hiền','2008-04-01',0,4),(67,'Đoàn Văn Tiến',NULL,'(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','ttđ1508@gmail.com','7',NULL,'123456',4,2,'Trần Tiến Đức','Trương Thị Lệ Khanh','2008-05-01',0,4),(172,'Phạm Tuấn Hảo',NULL,'(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','nxb1208@gmail.com','11','phamtuanhao010220086','123456',4,2,'Nguyễn Xuân Bách','Phạm Thu Hương ','2008-02-01',0,4),(173,'Nguyễn Minh Thùy',NULL,'(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','nvb1398@gmail.com','11','nguyenminhthuy010320086','123456',4,2,'Nguyễn Văn Bằng','Phạm Thúy Hằng','2008-03-01',0,4),(174,'Trần Văn Quyết',NULL,'(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','ltc1408@gmail.com','11','tranvanquyet010420086','123456',4,2,'Lê Tiến Châu','Vũ Thị Hiền','2008-04-01',0,4),(175,'Đoàn Văn Tiến',NULL,'(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','ttđ1508@gmail.com','11','doanvantien010520086','123456',4,2,'Trần Tiến Đức','Trương Thị Lệ Khanh','2008-05-01',0,4),(180,'Phạm Tuấn Hảo',NULL,'(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','nxb1208@gmail.com','11','phamtuanhao010220083','123456',4,2,'Nguyễn Xuân Bách','Phạm Thu Hương ','2008-02-01',0,4),(181,'Nguyễn Minh Thùy',NULL,'(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','nvb1398@gmail.com','11','nguyenminhthuy010320083','123456',4,2,'Nguyễn Văn Bằng','Phạm Thúy Hằng','2008-03-01',0,4),(182,'Trần Văn Quyết',NULL,'(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','ltc1408@gmail.com','11','tranvanquyet010420083','123456',4,2,'Lê Tiến Châu','Vũ Thị Hiền','2008-04-01',0,4),(183,'Đoàn Văn Tiến',NULL,'(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','ttđ1508@gmail.com','11','doanvantien010520083','123456',4,2,'Trần Tiến Đức','Trương Thị Lệ Khanh','2008-05-01',0,4),(184,'Phạm Tuấn Hảo',NULL,'(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','nxb1208@gmail.com','1','phamtuanhao010220084','123456',4,1,'Nguyễn Xuân Bách','Phạm Thu Hương ','2008-02-01',0,4),(185,'Nguyễn Minh Thùy',NULL,'(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','nvb1398@gmail.com','1','nguyenminhthuy010320084','123456',4,1,'Nguyễn Văn Bằng','Phạm Thúy Hằng','2008-03-01',0,4),(186,'Trần Văn Quyết',NULL,'(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','ltc1408@gmail.com','1','tranvanquyet010420084','123456',4,1,'Lê Tiến Châu','Vũ Thị Hiền','2008-04-01',0,4),(187,'Đoàn Văn Tiến',NULL,'(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','ttđ1508@gmail.com','1','doanvantien010520084','123456',4,1,'Trần Tiến Đức','Trương Thị Lệ Khanh','2008-05-01',0,4);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
