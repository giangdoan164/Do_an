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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `t_announce` */

insert  into `t_announce`(`PK_ANNOUNCE`,`FK_CATEGORY`,`FK_TEACHER_USER`,`FK_PARENT_USER`,`FK_CLASS`,`FK_GRADE`,`C_DATE`,`C_CONTENT`) values (1,1,39,475,3,1,'2015-05-06 23:22:27','Học sinh được nghỉ học ngày 11/5'),(2,1,39,476,3,1,'2015-05-06 23:22:27','Học sinh được nghỉ học ngày 11/5'),(3,1,39,477,3,1,'2015-05-06 23:22:27','Học sinh được nghỉ học ngày 11/5'),(4,1,39,478,3,1,'2015-05-06 23:22:27','Học sinh được nghỉ học ngày 11/5'),(5,1,39,479,3,1,'2015-05-06 23:22:27','Học sinh được nghỉ học ngày 11/5');

/*Table structure for table `t_category` */

DROP TABLE IF EXISTS `t_category`;

CREATE TABLE `t_category` (
  `PK_CATEGORY` tinyint(4) NOT NULL AUTO_INCREMENT,
  `C_NAME` varchar(255) DEFAULT NULL,
  `C_DESCRIPTION` text,
  PRIMARY KEY (`PK_CATEGORY`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `t_category` */

insert  into `t_category`(`PK_CATEGORY`,`C_NAME`,`C_DESCRIPTION`) values (1,'Trao đổi chung',NULL),(2,'Góc học tập','Nơi trao đổi các vấn đề học tập'),(3,'Góc kỷ luật','Nơi thảo luận các vấn đề vui chơi , giải trí');

/*Table structure for table `t_class` */

DROP TABLE IF EXISTS `t_class`;

CREATE TABLE `t_class` (
  `PK_CLASS` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `C_CLASS_NAME` varchar(2) CHARACTER SET utf8 DEFAULT NULL,
  `FK_GRADE` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`PK_CLASS`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

/*Data for the table `t_class` */

insert  into `t_class`(`PK_CLASS`,`C_CLASS_NAME`,`FK_GRADE`) values (1,'1A',1),(2,'1B',1),(3,'1C',1),(4,'1D',1),(5,'1E',1),(6,'2A',2),(7,'2B',2),(8,'2C',2),(9,'2D',2),(10,'2E',2),(11,'3A',3),(12,'3B',3),(13,'3C',3),(18,'4C',4);

/*Table structure for table `t_current_time` */

DROP TABLE IF EXISTS `t_current_time`;

CREATE TABLE `t_current_time` (
  `C_SEMESTER` tinyint(1) DEFAULT NULL,
  `C_SCHOOL_YEAR` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `C_ACTIVE` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_current_time` */

insert  into `t_current_time`(`C_SEMESTER`,`C_SCHOOL_YEAR`,`C_ACTIVE`) values (2,'2014-2015',1);

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

insert  into `t_detail_school_record`(`PK_DETAIL_RECORD`,`FK_SCHOOL_RECORD`,`FK_SUBJECT`,`FK_GRADE`,`C_TEACHER_REMARK`) values (155,26,1,'8',NULL),(156,26,2,'9',NULL),(157,26,3,'6',NULL),(158,26,4,'8',NULL),(159,26,5,'9',NULL),(160,26,6,NULL,NULL),(161,26,7,NULL,NULL),(162,27,1,'9',NULL),(163,27,2,'9',NULL),(164,27,3,'4',NULL),(165,27,4,'8',NULL),(166,27,5,'10',NULL),(167,27,6,NULL,NULL),(168,27,7,NULL,NULL),(169,28,1,'9',NULL),(170,28,2,'10',NULL),(171,28,3,'5',NULL),(172,28,4,'8',NULL),(173,28,5,'10',NULL),(174,28,6,NULL,NULL),(175,28,7,NULL,NULL),(176,29,1,'5',NULL),(177,29,2,'6',NULL),(178,29,3,'6',NULL),(179,29,4,'8',NULL),(180,29,5,'10',NULL),(181,29,6,NULL,NULL),(182,29,7,NULL,NULL),(183,30,1,'8',NULL),(184,30,2,'8',NULL),(185,30,3,'7',NULL),(186,30,4,'8',NULL),(187,30,5,'10',NULL),(188,30,6,NULL,NULL),(189,30,7,NULL,NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8;

/*Data for the table `t_private_message` */

insert  into `t_private_message`(`PK_MESSAGE`,`FK_THREAD`,`C_CONTENT`,`FK_SENDING_USER`,`C_SENT_DATE`) values (50,28,'&lt;p&gt;123123123&lt;/p&gt;\r\n',39,'2015-05-11 23:56:04');

/*Table structure for table `t_private_message_read_state` */

DROP TABLE IF EXISTS `t_private_message_read_state`;

CREATE TABLE `t_private_message_read_state` (
  `FK_MESSAGE` int(10) unsigned DEFAULT NULL,
  `FK_USER` int(10) unsigned DEFAULT NULL,
  `C_READ_DATE` datetime DEFAULT NULL,
  `C_READ_STATE` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `t_private_message_read_state` */

insert  into `t_private_message_read_state`(`FK_MESSAGE`,`FK_USER`,`C_READ_DATE`,`C_READ_STATE`) values (50,39,NULL,1);

/*Table structure for table `t_private_thread` */

DROP TABLE IF EXISTS `t_private_thread`;

CREATE TABLE `t_private_thread` (
  `PK_THREAD` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `C_TITLE` text,
  `C_CREATED_DATE` datetime DEFAULT NULL,
  `C_CREATED_USER` int(10) unsigned DEFAULT NULL,
  `C_LATEST_DATE` datetime DEFAULT NULL,
  PRIMARY KEY (`PK_THREAD`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

/*Data for the table `t_private_thread` */

insert  into `t_private_thread`(`PK_THREAD`,`C_TITLE`,`C_CREATED_DATE`,`C_CREATED_USER`,`C_LATEST_DATE`) values (28,'123123','2015-05-11 23:56:04',39,'2015-05-11 23:56:04');

/*Table structure for table `t_private_thread_participant` */

DROP TABLE IF EXISTS `t_private_thread_participant`;

CREATE TABLE `t_private_thread_participant` (
  `FK_THREAD` int(10) unsigned DEFAULT NULL,
  `FK_USER` int(10) unsigned DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `t_private_thread_participant` */

insert  into `t_private_thread_participant`(`FK_THREAD`,`FK_USER`) values (28,39),(29,39),(30,39),(31,39),(32,39);

/*Table structure for table `t_public_post` */

DROP TABLE IF EXISTS `t_public_post`;

CREATE TABLE `t_public_post` (
  `PK_POST` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `FK_TOPIC` int(11) DEFAULT NULL,
  `C_CONTENT` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `C_POSTED_DATE` datetime DEFAULT NULL,
  `C_POSTED_USER` int(11) DEFAULT NULL,
  PRIMARY KEY (`PK_POST`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

/*Data for the table `t_public_post` */

insert  into `t_public_post`(`PK_POST`,`FK_TOPIC`,`C_CONTENT`,`C_POSTED_DATE`,`C_POSTED_USER`) values (1,1,'&lt;p&gt;1341212312312341&lt;/p&gt;\r\n','2015-05-06 06:17:57',39),(2,1,'&lt;p&gt;g.vsndadlklnwrg;bnclcADLKc xzlnclzkxcn&lt;/p&gt;\r\n\r\n&lt;p&gt;dv;jkcv;zjxcv&lt;/p&gt;\r\n\r\n&lt;p&gt;dfc;lkSNvclkncv&lt;/p&gt;\r\n\r\n&lt;p&gt;zcv;zjkxncv;zjn&lt;/p&gt;\r\n\r\n&lt;p&gt;fasc&amp;#39;lakcnw&lt;/p&gt;\r\n\r\n&lt;p&gt;caakcjns;dkjvnz;kjxcnv&lt;br /&gt;\r\n&amp;Agrave;;sjnvs;jkznvz;njv&lt;/p&gt;\r\n\r\n&lt;p&gt;ckjsznv;kjnzsd&lt;/p&gt;\r\n\r\n&lt;p&gt;vd;SKNv;czv&lt;/p&gt;\r\n','2015-05-06 07:01:16',39),(3,1,'&lt;p&gt;sdfkjvhnsfv&lt;/p&gt;\r\n\r\n&lt;p&gt;sdvljhsv&lt;/p&gt;\r\n\r\n&lt;p&gt;skvjsdvjksdv&lt;/p&gt;\r\n\r\n&lt;p&gt;sdvbzshcvbxzv&amp;#39;&amp;aacute;dcdkqwfc&lt;/p&gt;\r\n\r\n&lt;p&gt;qa&lt;/p&gt;\r\n','2015-05-06 07:01:43',39),(4,2,'&lt;p&gt;23123123&lt;/p&gt;\r\n','2015-05-06 18:39:49',39),(5,3,'&lt;p&gt;45645645&lt;/p&gt;\r\n','2015-05-06 18:39:58',39),(6,4,'&lt;p&gt;123123124123&lt;/p&gt;\r\n','2015-05-06 18:40:10',39),(7,2,'&lt;p&gt;&lt;strong&gt;lkdfj;lqejfc;lakjs;lqkefqe&lt;/strong&gt;&lt;/p&gt;\r\n','2015-05-09 15:15:57',479),(8,5,'&lt;p&gt;231254123124123&lt;/p&gt;\r\n','2015-05-09 15:20:35',479),(9,6,'&lt;p&gt;23123123&lt;/p&gt;\r\n','2015-05-09 15:49:43',475),(10,6,'&lt;ol&gt;\r\n	&lt;li&gt;&lt;s&gt;&lt;em&gt;&lt;strong&gt;123124123123&lt;/strong&gt;&lt;/em&gt;&lt;/s&gt;&lt;/li&gt;\r\n&lt;/ol&gt;\r\n','2015-05-09 16:54:26',39),(11,6,'&lt;p&gt;123&lt;/p&gt;\r\n','2015-05-09 17:24:58',39),(12,7,'&lt;p&gt;3123123&lt;/p&gt;\r\n','2015-05-10 17:44:41',39),(13,8,'&lt;p&gt;123123123123&lt;/p&gt;\r\n','2015-05-10 17:44:45',39),(14,9,'&lt;p&gt;23123123123&lt;/p&gt;\r\n','2015-05-10 17:46:29',39),(15,10,'&lt;p&gt;12312412312&lt;/p&gt;\r\n','2015-05-10 17:47:00',39),(16,11,'&lt;p&gt;213124123&lt;/p&gt;\r\n','2015-05-10 17:47:31',39),(17,12,'&lt;p&gt;124123123123&lt;/p&gt;\r\n','2015-05-10 17:48:02',39),(21,12,'&lt;p&gt;12412412312412&lt;/p&gt;\r\n','2015-05-10 17:48:51',39),(22,10,'&lt;p&gt;15351234134134&lt;/p&gt;\r\n','2015-05-10 17:49:07',39),(23,9,'&lt;p&gt;324123513123&lt;/p&gt;\r\n','2015-05-10 17:49:15',39),(24,9,'&lt;p&gt;1351234134234&lt;/p&gt;\r\n','2015-05-10 17:49:20',39),(26,11,'&lt;p&gt;1414213124123&lt;/p&gt;\r\n','2015-05-10 17:49:43',39),(27,13,'&lt;p&gt;Ng&amp;agrave;y 25/5 C&amp;aacute;c em sẽ đi tham quan bảo t&amp;agrave;ng lịch sử.&lt;/p&gt;\r\n\r\n&lt;p&gt;Đề nghị phụ huynh chuẩn bị cho con em m&amp;igrave;nh đầy đủ vật dụng cần thiết&lt;/p&gt;\r\n','2015-05-10 17:58:32',39),(28,13,'&lt;p&gt;Danh s&amp;aacute;ch chuẩn bị bao gồm những g&amp;igrave; l&amp;agrave; hợp l&amp;yacute; :&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;ol&gt;\r\n	&lt;li&gt;Đồ ăn&lt;/li&gt;\r\n	&lt;li&gt;Nước uống&lt;/li&gt;\r\n	&lt;li&gt;Mũ&lt;/li&gt;\r\n&lt;/ol&gt;\r\n\r\n&lt;p&gt;Mọi người cho th&amp;ecirc;m &amp;yacute; kiến được kh&amp;ocirc;ng?&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n','2015-05-10 18:01:08',514),(29,14,'&lt;p&gt;123123123&lt;/p&gt;\r\n','2015-05-10 19:17:51',39);

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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

/*Data for the table `t_public_topic` */

insert  into `t_public_topic`(`PK_TOPIC`,`FK_CLASS`,`FK_CATEGORY`,`C_TITLE`,`C_CREATED_DATE`,`C_LATEST_DATE`,`C_CREATER_USER`,`C_LAST_USER`,`C_POST_NUMBER`,`C_VIEW_NUMBER`) values (2,3,2,'1231','2015-05-06 18:39:49','2015-05-09 15:15:57',39,479,2,5),(4,3,4,'113','2015-05-06 18:40:10','2015-05-06 18:40:10',39,39,1,1),(5,3,4,'123124231231','2015-05-09 15:20:35','2015-05-09 15:20:35',479,479,1,1),(9,3,3,'Hoạt động kỷ niệm ngày Nhà giáo Việt Nam 20-11','2015-05-10 17:46:29','2015-05-10 17:49:20',39,39,3,6),(10,3,2,'Kế hoạch nhỏ','2015-05-10 17:47:00','2015-05-10 17:49:07',39,39,2,4),(11,3,3,'Đánh giá phong trào hoạt động thi đua khen thưởng','2015-05-10 17:47:31','2015-05-10 17:49:43',39,39,2,4),(12,3,2,'Kế hoạch ủng hộ đồng bào lũ lụt ','2015-05-10 17:48:02','2015-05-10 17:48:51',39,39,2,4),(13,3,1,'Kế hoạch đi tham quan bảo tàng lịch sử','2015-05-10 17:48:22','2015-05-10 18:01:08',39,514,6,20);

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
  PRIMARY KEY (`PK_SCHOOL_RECORD`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_school_record` */

insert  into `t_school_record`(`PK_SCHOOL_RECORD`,`C_STUDENT_CODE`,`C_SEMESTER`,`C_YEAR`,`C_TITLE`,`C_TEACHER_CODE`,`C_REMARK_FINAL`) values (26,'HS14016',1,'2014-2015',' Học sinh Giỏi','GV0802',NULL),(27,'HS14017',1,'2014-2015',' Học sinh Giỏi','GV0802',NULL),(28,'HS14018',1,'2014-2015',' Học sinh Khá','GV0802',NULL),(29,'HS14019',1,'2014-2015',' Học sinh Trung Bình','GV0802',NULL),(30,'HS14020',1,'2014-2015',' Học sinhKhá','GV0802',NULL);

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
  `C_POST_NUMBER` int(11) DEFAULT NULL,
  PRIMARY KEY (`PK_USER`)
) ENGINE=InnoDB AUTO_INCREMENT=529 DEFAULT CHARSET=utf8;

/*Data for the table `t_user` */

insert  into `t_user`(`PK_USER`,`C_NAME`,`C_CODE`,`C_PHONE`,`C_ADDRESS`,`C_EMAIL`,`FK_CLASS`,`C_LOGIN_NAME`,`C_PASSWORD`,`FK_GROUP`,`FK_GRADE`,`C_FATHER_NAME`,`C_MOTHER_NAME`,`C_STUDENT_BIRTH`,`C_DELETED`,`C_POST_NUMBER`) values (39,'Nguyễn Minh Thảo  ','GV0801','','','','3','nguyenminhthao','e10adc3949ba59abbe56e057f20f883e',3,1,NULL,NULL,NULL,0,59),(40,'GV Trường','GV0901','12','asdagadfadasdwwd','12@gmail.com','','giaovientruong','e10adc3949ba59abbe56e057f20f883e',2,0,NULL,NULL,NULL,0,0),(43,'Nguyễn Minh Trang ','GV0802','','','','4','nguyenminhtrang','e10adc3949ba59abbe56e057f20f883e',3,1,NULL,NULL,NULL,0,4),(47,'admin',NULL,NULL,NULL,NULL,NULL,'admin','e10adc3949ba59abbe56e057f20f883e',1,NULL,NULL,NULL,NULL,0,4),(465,'Phạm Minh Tuấn','HS14001','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','nxb1208@gmail.com','6','phamminhtuan02012008','e10adc3949ba59abbe56e057f20f883e',4,2,'Nguyễn Xuân Bách','Phạm Thu Hương ','2008-01-02',0,0),(466,'Nguyễn Thành Trung','HS14002','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','nvb1398@gmail.com','6','nguyenthanhtrung03012008','e10adc3949ba59abbe56e057f20f883e',4,2,'Nguyễn Văn Bằng','Phạm Thúy Hằng','2008-01-03',0,0),(467,'Lê Xuân Quỳnh','HS14003','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','ltc1408@gmail.com','6','lexuanquynh04012008','e10adc3949ba59abbe56e057f20f883e',4,2,'Lê Tiến Châu','Vũ Thị Hiền','2008-01-04',0,0),(468,'Hoàng Thị Vân','HS14004','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','ttđ1508@gmail.com','6','hoangthivan05012008','e10adc3949ba59abbe56e057f20f883e',4,2,'Trần Tiến Đức','Trương Thị Lệ Khanh','2008-01-05',0,0),(469,'Nguyễn Quỳnh Chi','HS14005','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','pvd1608@gmail.com','6','nguyenquynhchi06012008','e10adc3949ba59abbe56e057f20f883e',4,2,'Phạm Văn Dũng','Nguyễn Hoàng Yến','2008-01-06',0,0),(470,'Phạm Bích Nga','HS14006','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','ptđ1708@gmail.com','6','phambichnga07012008','e10adc3949ba59abbe56e057f20f883e',4,2,'Phạm Tiến Đức','Chu Thị Bình','2008-01-07',0,0),(471,'Phạm Minh Sơn','HS14007','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','tqd1808@gmail.com','6','phamminhson08012008','e10adc3949ba59abbe56e057f20f883e',4,2,'Tạ Quang Dũng','Phan Thi Hương','2008-01-08',0,0),(472,'Tạ Thu Hiền','HS14008','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','lmg1908@gmail.com','6','tathuhien09012008','e10adc3949ba59abbe56e057f20f883e',4,2,'Lê Minh Giang','Nguyễn Thị Kim Xuân','2008-01-09',0,0),(473,'Nguyễn Hoàng Lam','HS14009','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','hmg110008@gmail.com','6','nguyenhoanglam10012008','e10adc3949ba59abbe56e057f20f883e',4,2,'Hoàng Minh Giám','Nguyễn Thị Như Loan','2008-01-10',0,0),(474,'Phạm Ngoc Long','HS14010','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','hvt111008@gmail.com','6','phamngoclong11012008','e10adc3949ba59abbe56e057f20f883e',4,2,'Hoàng Văn Thái','Đặng Ngọc Lan','2008-01-11',0,0),(475,'Nguyễn Thúy Quỳnh','HS14011','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','lth112008@gmail.com','8','nguyenthuyquynh12012008','e10adc3949ba59abbe56e057f20f883e',4,2,'Lý Trần Hiệp','Phùng Minh Nguyệt','2008-01-12',0,1),(476,'Phạm Văn Mách','HS14012','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','cđh113008@gmail.com','8','phamvanmach13012008','e10adc3949ba59abbe56e057f20f883e',4,2,'Chu Đình Hào','Đặng Thị Hoàng Yến','2008-01-13',0,0),(477,'Nguyễn Quỳnh Trang','HS14013','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','lth114008@gmail.com','8','nguyenquynhtrang14012008','e10adc3949ba59abbe56e057f20f883e',4,2,'Lý Trần Hiệp','Nguyễn Thị Diệu Hiền','2008-01-14',0,0),(478,'Nguyễn Tự Nguyện','HS14014','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','nmh115008@gmail.com','8','nguyentunguyen15012008','e10adc3949ba59abbe56e057f20f883e',4,2,'Nguyễn Minh Hoàng','Phạm Thị Lê','2008-01-15',0,0),(479,'Trần Đình Quang','HS14015','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','nth116008@gmail.com','8','trandinhquang16012008','e10adc3949ba59abbe56e057f20f883e',4,2,'Nguyễn Trí Huân','Cao Thị Ngọc Dung','2008-01-16',0,2),(480,'Đoàn Thúy Hường','HS14016','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','nvt118008@gmail.com','9','doanthuyhuong18012008','e10adc3949ba59abbe56e057f20f883e',4,2,'Nguyễn Việt Thái','Huỳnh Quế Hà','2008-01-18',0,0),(481,'Trần Đình Tùng','HS14017','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','pqh119008@gmail.com','9','trandinhtung19012008','e10adc3949ba59abbe56e057f20f883e',4,2,'Phạm Quang Huy','Lê Thị Dịu Minh','2008-01-19',0,0),(482,'Phạm Đan Trường','HS14018','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','nkd120008@gmail.com','9','phamdantruong20012008','e10adc3949ba59abbe56e057f20f883e',4,2,'Nguyễn Khánh Dựng','Phạm Hồng Linh','2008-01-20',0,0),(483,'Nguyễn Lan Anh','HS14019','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','ntl121008@gmail.com','9','nguyenlananh21012008','e10adc3949ba59abbe56e057f20f883e',4,2,'Nguyễn Thanh Lâm','Mai Kiều Liên','2008-01-21',0,0),(484,'Nguyễn Thị Thúy Hồng','HS14020','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','tvl122008@gmail.com','9','nguyenthithuyhong22012008','e10adc3949ba59abbe56e057f20f883e',4,2,'Trần Văn Long','Trương Thị Thanh','2008-01-22',0,0),(485,'Trần Hồng Hạnh','HS14021','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','nnm123008@gmail.com','10','tranhonghanh23012008','e10adc3949ba59abbe56e057f20f883e',4,2,'Nguyễn Nhật Minh','Quách Thị Nga','2008-01-23',0,0),(486,'Phạm Thành Sơn','HS14022','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','nvn124008@gmail.com','10','phamthanhson24012008','e10adc3949ba59abbe56e057f20f883e',4,2,'Nguyễn Văn Nhất','Ngô Thị Thông','2008-01-24',0,0),(487,'Trần Thanh Sơn','HS14023','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','pvh125008@gmail.com','10','tranthanhson25012008','e10adc3949ba59abbe56e057f20f883e',4,2,'Phạm Văn Hùng','Nguyễn Thị Kim Xuân','2008-01-25',0,0),(488,'Phạm Thị Huệ','HS14024','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','tta126008@gmail.com','10','phamthihue26012008','e10adc3949ba59abbe56e057f20f883e',4,2,'Trần Thái Anh','Nguyễn Thái Nga','2008-01-26',0,0),(489,'Nguyễn Kim Tường','HS14025','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','nda127008@gmail.com','10','nguyenkimtuong27012008','e10adc3949ba59abbe56e057f20f883e',4,2,'Nguyễn Duy Anh','Đỗ Thị Thu Hà','2008-01-27',0,0),(503,'6666','666666','6666','Hà Nội','6666@gamil.com','18',NULL,NULL,3,4,NULL,NULL,NULL,0,NULL),(504,'Phạm Minh Tuấn','HS14001','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','nxb1208@gmail.com','1','phamminhtuan020120082','e10adc3949ba59abbe56e057f20f883e',4,1,'Nguyễn Xuân Bách','Phạm Thu Hương ','2008-01-02',0,0),(505,'Nguyễn Thành Trung','HS14002','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','nvb1398@gmail.com','1','nguyenthanhtrung030120082','e10adc3949ba59abbe56e057f20f883e',4,1,'Nguyễn Văn Bằng','Phạm Thúy Hằng','2008-01-03',0,0),(506,'Lê Xuân Quỳnh','HS14003','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','ltc1408@gmail.com','1','lexuanquynh040120082','e10adc3949ba59abbe56e057f20f883e',4,1,'Lê Tiến Châu','Vũ Thị Hiền','2008-01-04',0,0),(507,'Hoàng Thị Vân','HS14004','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','ttđ1508@gmail.com','1','hoangthivan050120082','e10adc3949ba59abbe56e057f20f883e',4,1,'Trần Tiến Đức','Trương Thị Lệ Khanh','2008-01-05',0,0),(508,'Nguyễn Quỳnh Chi','HS14005','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','pvd1608@gmail.com','1','nguyenquynhchi060120082','e10adc3949ba59abbe56e057f20f883e',4,1,'Phạm Văn Dũng','Nguyễn Hoàng Yến','2008-01-06',0,0),(509,'Phạm Bích Nga','HS14006','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','ptđ1708@gmail.com','2','phambichnga070120082','e10adc3949ba59abbe56e057f20f883e',4,1,'Phạm Tiến Đức','Chu Thị Bình','2008-01-07',0,0),(510,'Phạm Minh Sơn','HS14007','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','tqd1808@gmail.com','2','phamminhson080120082','e10adc3949ba59abbe56e057f20f883e',4,1,'Tạ Quang Dũng','Phan Thi Hương','2008-01-08',0,0),(511,'Tạ Thu Hiền','HS14008','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','lmg1908@gmail.com','2','tathuhien090120082','e10adc3949ba59abbe56e057f20f883e',4,1,'Lê Minh Giang','Nguyễn Thị Kim Xuân','2008-01-09',0,0),(512,'Nguyễn Hoàng Lam','HS14009','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','hmg110008@gmail.com','2','nguyenhoanglam100120082','e10adc3949ba59abbe56e057f20f883e',4,1,'Hoàng Minh Giám','Nguyễn Thị Như Loan','2008-01-10',0,0),(513,'Phạm Ngoc Long','HS14010','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','hvt111008@gmail.com','2','phamngoclong110120082','e10adc3949ba59abbe56e057f20f883e',4,1,'Hoàng Văn Thái','Đặng Ngọc Lan','2008-01-11',0,0),(519,'Đoàn Thúy Hường','HS14016','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','nvt118008@gmail.com','4','doanthuyhuong180120082','e10adc3949ba59abbe56e057f20f883e',4,1,'Nguyễn Việt Thái','Huỳnh Quế Hà','2008-01-18',0,0),(520,'Trần Đình Tùng','HS14017','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','pqh119008@gmail.com','4','trandinhtung190120082','e10adc3949ba59abbe56e057f20f883e',4,1,'Phạm Quang Huy','Lê Thị Dịu Minh','2008-01-19',0,0),(521,'Phạm Đan Trường','HS14018','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','nkd120008@gmail.com','4','phamdantruong200120082','e10adc3949ba59abbe56e057f20f883e',4,1,'Nguyễn Khánh Dựng','Phạm Hồng Linh','2008-01-20',0,0),(522,'Nguyễn Lan Anh','HS14019','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','ntl121008@gmail.com','4','nguyenlananh210120082','e10adc3949ba59abbe56e057f20f883e',4,1,'Nguyễn Thanh Lâm','Mai Kiều Liên','2008-01-21',0,0),(523,'Nguyễn Thị Thúy Hồng','HS14020','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','tvl122008@gmail.com','4','nguyenthithuyhong220120082','e10adc3949ba59abbe56e057f20f883e',4,1,'Trần Văn Long','Trương Thị Thanh','2008-01-22',0,0),(524,'Trần Hồng Hạnh','HS14021','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','nnm123008@gmail.com','5','tranhonghanh230120082','e10adc3949ba59abbe56e057f20f883e',4,1,'Nguyễn Nhật Minh','Quách Thị Nga','2008-01-23',0,0),(525,'Phạm Thành Sơn','HS14022','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','nvn124008@gmail.com','5','phamthanhson240120082','e10adc3949ba59abbe56e057f20f883e',4,1,'Nguyễn Văn Nhất','Ngô Thị Thông','2008-01-24',0,0),(526,'Trần Thanh Sơn','HS14023','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','pvh125008@gmail.com','5','tranthanhson250120082','e10adc3949ba59abbe56e057f20f883e',4,1,'Phạm Văn Hùng','Nguyễn Thị Kim Xuân','2008-01-25',0,0),(527,'Phạm Thị Huệ','HS14024','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','tta126008@gmail.com','5','phamthihue260120082','e10adc3949ba59abbe56e057f20f883e',4,1,'Trần Thái Anh','Nguyễn Thái Nga','2008-01-26',0,0),(528,'Nguyễn Kim Tường','HS14025','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','nda127008@gmail.com','5','nguyenkimtuong270120082','e10adc3949ba59abbe56e057f20f883e',4,1,'Nguyễn Duy Anh','Đỗ Thị Thu Hà','2008-01-27',0,0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
