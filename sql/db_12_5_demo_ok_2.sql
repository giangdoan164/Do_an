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

insert  into `t_annnounce_type`(`PK_CATEGORY`,`C_NAME`,`C_DESCRIPTION`) values (1,'Chung','Thông báo chung'),(2,'Học tập','Thông báo về tình hình học tập'),(3,'Kỷ luật',NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8;

/*Data for the table `t_announce` */

insert  into `t_announce`(`PK_ANNOUNCE`,`FK_CATEGORY`,`FK_TEACHER_USER`,`FK_PARENT_USER`,`FK_CLASS`,`FK_GRADE`,`C_DATE`,`C_CONTENT`) values (1,1,61,42,10,4,'2015-05-12 22:50:05','THông báo học sinh nghỉ học ngày 20/5'),(2,1,61,43,10,4,'2015-05-12 22:50:05','THông báo học sinh nghỉ học ngày 20/5'),(3,1,61,44,10,4,'2015-05-12 22:50:05','THông báo học sinh nghỉ học ngày 20/5'),(4,1,61,45,10,4,'2015-05-12 22:50:05','THông báo học sinh nghỉ học ngày 20/5'),(5,1,61,46,10,4,'2015-05-12 22:50:05','THông báo học sinh nghỉ học ngày 20/5'),(6,1,61,47,11,4,'2015-05-12 22:50:05','THông báo học sinh nghỉ học ngày 20/5'),(7,1,61,48,11,4,'2015-05-12 22:50:05','THông báo học sinh nghỉ học ngày 20/5'),(8,1,61,49,11,4,'2015-05-12 22:50:05','THông báo học sinh nghỉ học ngày 20/5'),(9,1,61,50,11,4,'2015-05-12 22:50:05','THông báo học sinh nghỉ học ngày 20/5'),(10,1,61,51,11,4,'2015-05-12 22:50:05','THông báo học sinh nghỉ học ngày 20/5'),(11,1,61,52,12,4,'2015-05-12 22:50:05','THông báo học sinh nghỉ học ngày 20/5'),(12,1,61,53,12,4,'2015-05-12 22:50:05','THông báo học sinh nghỉ học ngày 20/5'),(13,1,61,54,12,4,'2015-05-12 22:50:05','THông báo học sinh nghỉ học ngày 20/5'),(14,1,61,55,12,4,'2015-05-12 22:50:05','THông báo học sinh nghỉ học ngày 20/5'),(15,1,61,56,12,4,'2015-05-12 22:50:05','THông báo học sinh nghỉ học ngày 20/5'),(16,1,61,62,7,3,'2015-05-12 22:50:05','THông báo học sinh nghỉ học ngày 20/5'),(17,1,61,63,7,3,'2015-05-12 22:50:05','THông báo học sinh nghỉ học ngày 20/5'),(18,1,61,64,7,3,'2015-05-12 22:50:05','THông báo học sinh nghỉ học ngày 20/5'),(19,1,61,65,7,3,'2015-05-12 22:50:05','THông báo học sinh nghỉ học ngày 20/5'),(20,1,61,66,7,3,'2015-05-12 22:50:05','THông báo học sinh nghỉ học ngày 20/5'),(21,1,61,67,8,3,'2015-05-12 22:50:05','THông báo học sinh nghỉ học ngày 20/5'),(22,1,61,68,8,3,'2015-05-12 22:50:05','THông báo học sinh nghỉ học ngày 20/5'),(23,1,61,69,8,3,'2015-05-12 22:50:05','THông báo học sinh nghỉ học ngày 20/5'),(24,1,61,70,8,3,'2015-05-12 22:50:05','THông báo học sinh nghỉ học ngày 20/5'),(25,1,61,71,8,3,'2015-05-12 22:50:05','THông báo học sinh nghỉ học ngày 20/5'),(26,1,61,72,9,3,'2015-05-12 22:50:05','THông báo học sinh nghỉ học ngày 20/5'),(27,1,61,73,9,3,'2015-05-12 22:50:05','THông báo học sinh nghỉ học ngày 20/5'),(28,1,61,74,9,3,'2015-05-12 22:50:05','THông báo học sinh nghỉ học ngày 20/5'),(29,1,61,75,9,3,'2015-05-12 22:50:05','THông báo học sinh nghỉ học ngày 20/5'),(30,1,61,76,9,3,'2015-05-12 22:50:05','THông báo học sinh nghỉ học ngày 20/5'),(31,1,61,87,4,2,'2015-05-12 22:50:05','THông báo học sinh nghỉ học ngày 20/5'),(32,1,61,88,4,2,'2015-05-12 22:50:05','THông báo học sinh nghỉ học ngày 20/5'),(33,1,61,89,4,2,'2015-05-12 22:50:05','THông báo học sinh nghỉ học ngày 20/5'),(34,1,61,90,4,2,'2015-05-12 22:50:05','THông báo học sinh nghỉ học ngày 20/5'),(35,1,61,91,4,2,'2015-05-12 22:50:05','THông báo học sinh nghỉ học ngày 20/5'),(36,1,61,92,5,2,'2015-05-12 22:50:05','THông báo học sinh nghỉ học ngày 20/5'),(37,1,61,93,5,2,'2015-05-12 22:50:05','THông báo học sinh nghỉ học ngày 20/5'),(38,1,61,94,5,2,'2015-05-12 22:50:05','THông báo học sinh nghỉ học ngày 20/5'),(39,1,61,95,5,2,'2015-05-12 22:50:05','THông báo học sinh nghỉ học ngày 20/5'),(40,1,61,96,5,2,'2015-05-12 22:50:05','THông báo học sinh nghỉ học ngày 20/5'),(41,1,61,97,6,2,'2015-05-12 22:50:05','THông báo học sinh nghỉ học ngày 20/5'),(42,1,61,98,6,2,'2015-05-12 22:50:05','THông báo học sinh nghỉ học ngày 20/5'),(43,1,61,99,6,2,'2015-05-12 22:50:05','THông báo học sinh nghỉ học ngày 20/5'),(44,1,61,100,6,2,'2015-05-12 22:50:05','THông báo học sinh nghỉ học ngày 20/5'),(45,1,61,101,6,2,'2015-05-12 22:50:05','THông báo học sinh nghỉ học ngày 20/5'),(46,1,61,102,1,1,'2015-05-12 22:50:05','THông báo học sinh nghỉ học ngày 20/5'),(47,1,61,103,1,1,'2015-05-12 22:50:05','THông báo học sinh nghỉ học ngày 20/5'),(48,1,61,104,1,1,'2015-05-12 22:50:05','THông báo học sinh nghỉ học ngày 20/5'),(49,1,61,105,1,1,'2015-05-12 22:50:05','THông báo học sinh nghỉ học ngày 20/5'),(50,1,61,106,1,1,'2015-05-12 22:50:05','THông báo học sinh nghỉ học ngày 20/5'),(51,1,61,107,2,1,'2015-05-12 22:50:05','THông báo học sinh nghỉ học ngày 20/5'),(52,1,61,108,2,1,'2015-05-12 22:50:05','THông báo học sinh nghỉ học ngày 20/5'),(53,1,61,109,2,1,'2015-05-12 22:50:05','THông báo học sinh nghỉ học ngày 20/5'),(54,1,61,110,2,1,'2015-05-12 22:50:05','THông báo học sinh nghỉ học ngày 20/5'),(55,1,61,111,2,1,'2015-05-12 22:50:05','THông báo học sinh nghỉ học ngày 20/5'),(56,1,61,112,3,1,'2015-05-12 22:50:05','THông báo học sinh nghỉ học ngày 20/5'),(57,1,61,113,3,1,'2015-05-12 22:50:05','THông báo học sinh nghỉ học ngày 20/5'),(58,1,61,114,3,1,'2015-05-12 22:50:05','THông báo học sinh nghỉ học ngày 20/5'),(59,1,61,115,3,1,'2015-05-12 22:50:05','THông báo học sinh nghỉ học ngày 20/5'),(60,1,61,116,3,1,'2015-05-12 22:50:05','THông báo học sinh nghỉ học ngày 20/5'),(61,1,61,42,10,4,'2015-05-12 22:51:06','Thông báo học sinh khối 4 ngày 20/6 đến trường dọn vệ sinh'),(62,1,61,43,10,4,'2015-05-12 22:51:06','Thông báo học sinh khối 4 ngày 20/6 đến trường dọn vệ sinh'),(63,1,61,44,10,4,'2015-05-12 22:51:06','Thông báo học sinh khối 4 ngày 20/6 đến trường dọn vệ sinh'),(64,1,61,45,10,4,'2015-05-12 22:51:06','Thông báo học sinh khối 4 ngày 20/6 đến trường dọn vệ sinh'),(65,1,61,46,10,4,'2015-05-12 22:51:06','Thông báo học sinh khối 4 ngày 20/6 đến trường dọn vệ sinh'),(66,1,61,47,11,4,'2015-05-12 22:51:06','Thông báo học sinh khối 4 ngày 20/6 đến trường dọn vệ sinh'),(67,1,61,48,11,4,'2015-05-12 22:51:06','Thông báo học sinh khối 4 ngày 20/6 đến trường dọn vệ sinh'),(68,1,61,49,11,4,'2015-05-12 22:51:06','Thông báo học sinh khối 4 ngày 20/6 đến trường dọn vệ sinh'),(69,1,61,50,11,4,'2015-05-12 22:51:06','Thông báo học sinh khối 4 ngày 20/6 đến trường dọn vệ sinh'),(70,1,61,51,11,4,'2015-05-12 22:51:06','Thông báo học sinh khối 4 ngày 20/6 đến trường dọn vệ sinh'),(71,1,61,52,12,4,'2015-05-12 22:51:06','Thông báo học sinh khối 4 ngày 20/6 đến trường dọn vệ sinh'),(72,1,61,53,12,4,'2015-05-12 22:51:06','Thông báo học sinh khối 4 ngày 20/6 đến trường dọn vệ sinh'),(73,1,61,54,12,4,'2015-05-12 22:51:06','Thông báo học sinh khối 4 ngày 20/6 đến trường dọn vệ sinh'),(74,1,61,55,12,4,'2015-05-12 22:51:06','Thông báo học sinh khối 4 ngày 20/6 đến trường dọn vệ sinh'),(75,1,61,56,12,4,'2015-05-12 22:51:06','Thông báo học sinh khối 4 ngày 20/6 đến trường dọn vệ sinh'),(76,2,13,52,12,4,'2015-05-12 23:11:21','Em học  kém môn Toán '),(77,3,13,52,12,4,'2015-05-12 23:11:49','Học sinh còn hay ngủ gật trong lớp'),(78,3,13,53,12,4,'2015-05-12 23:11:49','Học sinh còn hay ngủ gật trong lớp'),(79,2,13,54,12,4,'2015-05-12 23:36:09','Học sinh còn viết chữ xấu');

/*Table structure for table `t_category` */

DROP TABLE IF EXISTS `t_category`;

CREATE TABLE `t_category` (
  `PK_CATEGORY` tinyint(4) NOT NULL AUTO_INCREMENT,
  `C_NAME` varchar(255) DEFAULT NULL,
  `C_DESCRIPTION` text,
  PRIMARY KEY (`PK_CATEGORY`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `t_category` */

insert  into `t_category`(`PK_CATEGORY`,`C_NAME`,`C_DESCRIPTION`) values (1,'Trao đổi chung','Nơi thảo luận các vấn đề chung '),(2,'Góc học tập','Nơi thảo luận các vấn đề học tập'),(3,'Góc kỷ luật','Nơi thảo luận các vấn đề vui chơi , giải trí'),(4,'Góc giải trí','Nơi thảo luận các vấn đề giải trí cho các em');

/*Table structure for table `t_class` */

DROP TABLE IF EXISTS `t_class`;

CREATE TABLE `t_class` (
  `PK_CLASS` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `C_CLASS_NAME` varchar(2) CHARACTER SET utf8 DEFAULT NULL,
  `FK_GRADE` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`PK_CLASS`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `t_class` */

insert  into `t_class`(`PK_CLASS`,`C_CLASS_NAME`,`FK_GRADE`) values (1,'1A',1),(2,'1B',1),(3,'1C',1),(4,'2A',2),(5,'2B',2),(6,'2C',2),(7,'3A',3),(8,'3B',3),(9,'3C',3),(10,'4A',4),(11,'4B',4),(12,'4C',4),(13,'5A',5),(14,'5B',5),(15,'5C',5);

/*Table structure for table `t_current_time` */

DROP TABLE IF EXISTS `t_current_time`;

CREATE TABLE `t_current_time` (
  `C_SEMESTER` tinyint(1) DEFAULT NULL,
  `C_SCHOOL_YEAR` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `C_ACTIVE` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_current_time` */

insert  into `t_current_time`(`C_SEMESTER`,`C_SCHOOL_YEAR`,`C_ACTIVE`) values (2,'2013-2014',0);

/*Table structure for table `t_detail_school_record` */

DROP TABLE IF EXISTS `t_detail_school_record`;

CREATE TABLE `t_detail_school_record` (
  `PK_DETAIL_RECORD` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `FK_SCHOOL_RECORD` int(10) unsigned DEFAULT NULL,
  `FK_SUBJECT` tinyint(4) DEFAULT NULL,
  `FK_GRADE` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `C_TEACHER_REMARK` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`PK_DETAIL_RECORD`)
) ENGINE=InnoDB AUTO_INCREMENT=975 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_detail_school_record` */

insert  into `t_detail_school_record`(`PK_DETAIL_RECORD`,`FK_SCHOOL_RECORD`,`FK_SUBJECT`,`FK_GRADE`,`C_TEACHER_REMARK`) values (610,61,1,'8','Em học rất tốt'),(611,61,2,'9','Em học rất tốt'),(612,61,3,'9','Em học rất tốt'),(613,61,4,'8','Em học rất tốt'),(614,61,5,'7','Cần cố gắng hơn'),(615,61,6,'9','Em học rất tốt'),(616,61,7,'9','Em học rất tốt'),(617,62,1,'9','Em học rất tốt'),(618,62,2,'9','Em học rất tốt'),(619,62,3,'9','Em học rất tốt'),(620,62,4,'9','Em học rất tốt'),(621,62,5,'9','Em học rất tốt'),(622,62,6,'8','Em học rất tốt'),(623,62,7,'8','Em học rất tốt'),(624,63,1,'9','Em học rất tốt'),(625,63,2,'10','Em học rất tốt'),(626,63,3,'9','Em học rất tốt'),(627,63,4,'8','Em học rất tốt'),(628,63,5,'9','Em học rất tốt'),(629,63,6,'9','Em học rất tốt'),(630,63,7,'9','Em học rất tốt'),(631,64,1,'5','Em học kém môn Toán, cần cố gắng hơn'),(632,64,2,'6','Em học kém môn Tiếng Việt, cần cố gắng hơn'),(633,64,3,'9','Em học rất tốt'),(634,64,4,'9','Em học rất tốt'),(635,64,5,'8','Em học rất tốt'),(636,64,6,'9','Em học rất tốt'),(637,64,7,'9','Em học rất tốt'),(638,65,1,'8','Em học rất tốt '),(639,65,2,'8','Em học rất tốt'),(640,65,3,'9','Em học rất tốt'),(641,65,4,'8','Em học rất tốt'),(642,65,5,'8','Em học rất tốt'),(643,65,6,'9','Em học rất tốt'),(644,65,7,'9','Em học rất tốt'),(645,66,1,'8','Em học tốt'),(646,66,2,'9','Em học tốt'),(647,66,3,'9','Em học tốt'),(648,66,4,'9','Em học tốt'),(649,66,5,'9','Em học tốt'),(650,66,6,'8','Chú ý phát triển thể lực hơn'),(651,66,7,'9','Em học tót, có năng khiếu về ngoại ngữ'),(652,67,1,'9','Em học tốt môn học'),(653,67,2,'9','Em học tốt môn học'),(654,67,3,'9','Em học tốt môn học'),(655,67,4,'8','Em học tốt môn học'),(656,67,5,'9','Em học tốt môn học'),(657,67,6,'8','Em học tốt môn học'),(658,67,7,'9','Em học tốt môn học'),(659,68,1,'9','Em học  rất tốt'),(660,68,2,'10','Em học  rất tốt'),(661,68,3,'9','Em học  rất tốt'),(662,68,4,'8','Em học  rất tốt'),(663,68,5,'9','Em học  rất tốt'),(664,68,6,'9','Em học  rất tốt'),(665,68,7,'8','Em học  rất tốt'),(666,69,1,'8','Em học khá'),(667,69,2,'8','Em học khá'),(668,69,3,'9','Em học khá'),(669,69,4,'9','Em học khá'),(670,69,5,'9','Em học khá'),(671,69,6,'9','Em học khá'),(672,69,7,'8','Em học khá'),(673,70,1,'8','Em tiếp thu khá môn học'),(674,70,2,'8','Em tiếp thu khá môn học'),(675,70,3,'9','Em tiếp thu khá môn học'),(676,70,4,'8','Em tiếp thu khá môn học'),(677,70,5,'9','Em tiếp thu khá môn học'),(678,70,6,'8','Em tiếp thu khá môn học'),(679,70,7,'8','Em tiếp thu khá môn học'),(680,71,1,'9','Em tiếp thu tốt môn học'),(681,71,2,'8','Em tiếp thu tốt môn học'),(682,71,3,'8','Em tiếp thu tốt môn học'),(683,71,4,'9','Em tiếp thu tốt môn học'),(684,71,5,'9','Em tiếp thu tốt môn học'),(685,71,6,'9','Em tiếp thu tốt môn học'),(686,71,7,'9','Em tiếp thu tốt môn học'),(687,72,1,'9','Em tiếp thu tốt môn học'),(688,72,2,'8','Em tiếp thu tốt môn họcq'),(689,72,3,'9','Em tiếp thu tốt môn học'),(690,72,4,'8','Em tiếp thu tốt môn học'),(691,72,5,'8','Em tiếp thu tốt môn học'),(692,72,6,'9','Em tiếp thu tốt môn học'),(693,72,7,'9','Em tiếp thu tốt môn học'),(694,73,1,'9','Em tiếp thu môn học tốt'),(695,73,2,'8','Em tiếp thu môn học tốt'),(696,73,3,'9','Em tiếp thu môn học tốt'),(697,73,4,'9','Em tiếp thu môn học tốt'),(698,73,5,'9','Em tiếp thu môn học tốt'),(699,73,6,'8','Em tiếp thu môn học tốt'),(700,73,7,'8','Em tiếp thu môn học tốt'),(701,74,1,'9','Em học rất tốt'),(702,74,2,'9','Em học rất tốt'),(703,74,3,'8','Em học rất tốt'),(704,74,4,'8','Em học rất tốt'),(705,74,5,'9','Em học rất tốt'),(706,74,6,'9','Em học rất tốt'),(707,74,7,'9','Em học rất tốt'),(708,75,1,'7','Em tiếp thu môn toán còn chậm'),(709,75,2,'8','Em hoàn thành tốt nội dung môn học'),(710,75,3,'9','Em hoàn thành tốt nội dung môn học'),(711,75,4,'9','Em hoàn thành tốt nội dung môn học'),(712,75,5,'9','Em hoàn thành tốt nội dung môn học'),(713,75,6,'9','Em hoàn thành tốt nội dung môn học'),(714,75,7,'9','Em hoàn thành tốt nội dung môn học'),(715,76,1,'10','Em tiếp thu rất tốt nội dung môn học'),(716,76,2,'9','Em tiếp thu rất tốt nội dung môn học'),(717,76,3,'9','Em tiếp thu rất tốt nội dung môn học'),(718,76,4,'9','Em tiếp thu rất tốt nội dung môn học'),(719,76,5,'9','Em tiếp thu rất tốt nội dung môn học'),(720,76,6,'9','Em tiếp thu rất tốt nội dung môn học'),(721,76,7,'9','Em tiếp thu rất tốt nội dung môn học'),(722,77,1,'10','Em tiếp thu tốt kiến thức môn học'),(723,77,2,'9','Em tiếp thu tốt kiến thức môn học'),(724,77,3,'9','Em tiếp thu tốt kiến thức môn học'),(725,77,4,'9','Em tiếp thu tốt kiến thức môn học'),(726,77,5,'9','Em tiếp thu tốt kiến thức môn học'),(727,77,6,'8','Em tiếp thu tốt kiến thức môn học'),(728,77,7,'7','Em tiếp thu khá môn học'),(729,78,1,'10','Em tiếp thu tốt nội dung môn học'),(730,78,2,'10','Em tiếp thu tốt nội dung môn học'),(731,78,3,'9','Em tiếp thu tốt nội dung môn học'),(732,78,4,'9','Em tiếp thu tốt nội dung môn học'),(733,78,5,'9','Em tiếp thu tốt nội dung môn học'),(734,78,6,'7','Em tiếp thu tốt nội dung môn học'),(735,78,7,'8','Em tiếp thu tốt nội dung môn học'),(736,79,1,'10','Em tiếp thu rất tốt nội dung môn học '),(737,79,2,'10','Em tiếp thu rất tốt nội dung môn học '),(738,79,3,'9','Em tiếp thu  tốt nội dung môn học '),(739,79,4,'9','Em tiếp thu  tốt nội dung môn học '),(740,79,5,'9','Em tiếp thu tốt nội dung môn học '),(741,79,6,'8','Em tiếp thu  tốt nội dung môn học '),(742,79,7,'8','Em tiếp thu  tốt nội dung môn học '),(743,80,1,'10','Em có năng khiếu về tính toán'),(744,80,2,'10','Em tiếp thu tốt nội dung môn học'),(745,80,3,'9','Em tiếp thu tốt nội dung môn học'),(746,80,4,'9','Em tiếp thu tốt nội dung môn học'),(747,80,5,'9','Em tiếp thu tốt nội dung môn học'),(748,80,6,'8','Em tiếp thu tốt nội dung môn học'),(749,80,7,'8','Em tiếp thu tốt nội dung môn học'),(750,81,1,'8','Tiếp thu tốt, chưa chịu khó học bài'),(751,81,2,'8','Tiếp thu môn học tốt'),(752,81,3,'9','Tiếp thu môn học tốt'),(753,81,4,'8','Tiếp thu môn học tốt'),(754,81,5,'9','Tiếp thu môn học tốt'),(755,81,6,'8','Tiếp thu môn học tốt'),(756,81,7,'9','Tiếp thu môn học tốt'),(757,82,1,'8','Học tốt nhưng còn hay xao lãng'),(758,82,2,'9','Học tốt nhưng còn hay xao lãng'),(759,82,3,'9','Học tốt nhưng còn hay xao lãng'),(760,82,4,'9','Tiếp thu tốt nội dung môn học'),(761,82,5,'9','Tiếp thu tốt nội dung môn học'),(762,82,6,'9','Tiếp thu tốt nội dung môn học'),(763,82,7,'9','Tiếp thu tốt nội dung môn học'),(764,83,1,'8','Em học tiếp thu rất tốt kiến thức nội dung môn học'),(765,83,2,'8','Em học tiếp thu rất tốt kiến thức nội dung môn học'),(766,83,3,'9','Em học tiếp thu rất tốt kiến thức nội dung môn học'),(767,83,4,'8','Em có năng khiếu về hát nhạc'),(768,83,5,'9','Em có tiếp thu tốt nội dung môn học'),(769,83,6,'9','Em có tiếp thu tốt nội dung môn học'),(770,83,7,'9','Em có tiếp thu tốt nội dung môn học'),(771,84,1,'8','Em tiếp thu tương đối nội dung môn học'),(772,84,2,'9','Em tiếp thu tốt nội dung môn học'),(773,84,3,'9','Em rất khéo tay'),(774,84,4,'9','Em tiếp thu tốt nội dung môn học'),(775,84,5,'9','Em tiếp thu tốt nội dung môn học'),(776,84,6,'9','Em tiếp thu tốt nội dung môn học'),(777,84,7,'9','Em tiếp thu tốt nội dung môn học'),(778,85,1,'8','Em học tiếp thu tốt nội dung môn học'),(779,85,2,'10','Em học tiếp thu tốt nội dung môn học'),(780,85,3,'9','Em học tiếp thu tốt nội dung môn học'),(781,85,4,'9','Em học tiếp thu tốt nội dung môn học'),(782,85,5,'9','Em học tiếp thu tốt nội dung môn học'),(783,85,6,'9','Em học tiếp thu tốt nội dung môn học'),(784,85,7,'9','Em học tiếp thu tốt nội dung môn học'),(785,86,1,'10','Em tiếp thu rất tốt nội dung môn học'),(786,86,2,'9','Em tiếp thu rất tốt nội dung môn học'),(787,86,3,'9','Em tiếp thu rất tốt nội dung môn học'),(788,86,4,'8','Em tiếp thu rất tốt nội dung môn học'),(789,86,5,'9','Em vẽ rất đẹp'),(790,86,6,'8','Em tiếp thu rất tốt nội dung môn học'),(791,86,7,'9','Em có năng khiếu về tiếng anh'),(792,86,8,'8','Em tiếp thu rất tốt nội dung môn học'),(793,87,1,'10','Em có năng khiếu về môn Toán'),(794,87,2,'9','Em tiếp thu rất tốt nội dung môn học'),(795,87,3,'9','Em tiếp thu rất tốt nội dung môn học'),(796,87,4,'7','Em tiếp thu tốt môn học'),(797,87,5,'9','Em tiếp thu rất tốt nội dung môn học'),(798,87,6,'9','Em tiếp thu rất tốt nội dung môn học'),(799,87,7,'8','Em tiếp thu rất tốt nội dung môn học'),(800,87,8,'8','Em tiếp thu rất tốt nội dung môn học'),(801,88,1,'10','Em có năng khiếu về môn Toán'),(802,88,2,'10','Em có năng khiếu về môn Văn'),(803,88,3,'9','Em tiếp thu rất tốt nội dung môn học'),(804,88,4,'9','Em tiếp thu rất tốt nội dung môn học'),(805,88,5,'9','Em tiếp thu rất tốt nội dung môn học'),(806,88,6,'9','Em tiếp thu rất tốt nội dung môn học'),(807,88,7,'7','Em hoàn thành kiến thức môn học'),(808,88,8,'9','Em tiếp thu rất tốt nội dung môn học'),(809,89,1,'10','Em có năng khiếu về môn Toán'),(810,89,2,'10','Em có năng khiếu về môn Văn'),(811,89,3,'9','Em học tốt  môn học'),(812,89,4,'8','Em học tốt  môn học'),(813,89,5,'8','Em học tốt  môn học'),(814,89,6,'9','Em học tốt  môn học'),(815,89,7,'8','Em học tốt  môn học'),(816,89,8,'8','Em tiếp thu rất tốt nội dung môn học'),(817,90,1,'10','Em có năng khiếu về môn Toán'),(818,90,2,'10','Em tiếp thu rất tốt nội dung môn học'),(819,90,3,'8','Em hoàn thành nội dung kiến thức môn học'),(820,90,4,'9','Em hoàn thành nội dung kiến thức môn học'),(821,90,5,'8','Em học tốt môn học'),(822,90,6,'8','Em học tốt môn học'),(823,90,7,'7','Em hoàn thành nôi dung môn học'),(824,90,8,'8','Em học tốt môn học'),(825,91,1,'10','Em tiếp thu rất tốt nội dung môn học'),(826,91,2,'9','Em tiếp thu rất tốt nội dung môn học'),(827,91,3,'9','Em tiếp thu rất tốt nội dung môn học'),(828,91,4,'8','Em tiếp thu rất tốt nội dung môn học'),(829,91,5,'9','Em tiếp thu rất tốt nội dung môn học'),(830,91,6,'9','Em tiếp thu rất tốt nội dung môn học'),(831,91,7,'9','Em tiếp thu rất tốt nội dung môn học'),(832,91,8,'8','Em tiếp thu rất tốt nội dung môn học'),(833,92,1,'10','Em có năng khiếu về môn Toán'),(834,92,2,'9','Em có năng khiếu về môn Văn'),(835,92,3,'9','Em có hoa tay'),(836,92,4,'8','Em tiếp thu khá nội dung môn học'),(837,92,5,'8','Em tiếp thu khá nội dung môn học'),(838,92,6,'9','Em tiếp thu khá tốt nội dung môn học'),(839,92,7,'8','Em tiếp thu khá nội dung môn học'),(840,92,8,'8','Em tiếp thu khá tốt nội dung môn học'),(841,93,1,'10','Em có năng khiếu về môn Toán'),(842,93,2,'10','Em có năng khiếu về môn Văn'),(843,93,3,'9','Em học rất tốt'),(844,93,4,'8','Em học rất tốt'),(845,93,5,'9','Em học rất tốt'),(846,93,6,'8','Em học rất tốt'),(847,93,7,'8','Em học rất tốt'),(848,93,8,'8','Em học rất tốt'),(849,94,1,'10','Em tiếp thu kiến thức môn học rất tốt, hăng hái xây dựng bài, phát biểu'),(850,94,2,'10','Em tiếp thu kiến thức môn học rất tố'),(851,94,3,'9','Em tiếp thu kiến thức môn học rất tốt'),(852,94,4,'8','Em tiếp thu kiến thức môn học rất tốt'),(853,94,5,'8','Em tiếp thu kiến thức môn học rất tốt'),(854,94,6,'8','Em tiếp thu kiến thức môn học rất tốt'),(855,94,7,'9','Em tiếp thu kiến thức môn học rất tốt'),(856,94,8,'9','Em tiếp thu kiến thức môn học rất tốt'),(857,95,1,'10','Em hoàn thành tốt nội dung kiến thức môn học'),(858,95,2,'10','Em hoàn thành tốt nội dung kiến thức môn học'),(859,95,3,'9','Em hoàn thành tốt nội dung kiến thức môn học'),(860,95,4,'8','Em hoàn thành tốt nội dung kiến thức môn học'),(861,95,5,'9','Em hoàn thành tốt nội dung kiến thức môn học'),(862,95,6,'9','Em hoàn thành tốt nội dung kiến thức môn học'),(863,95,7,'8','Em hoàn thành tốt nội dung kiến thức môn học'),(864,95,8,'9','Em hoàn thành tốt nội dung kiến thức môn học'),(865,96,1,'9','Em có năng khiếu về môn Toán'),(866,96,2,'9','Em có năng khiếu về môn Văn'),(867,96,4,'8','Em hoàn thành nội dung kiến thức môn học'),(868,96,5,'7','Em hoàn thành nội dung kiến thức môn học'),(869,96,6,'7','Em hoàn thành nội dung kiến thức môn học'),(870,96,7,'8','Em hoàn thành nội dung kiến thức môn học'),(871,96,8,'8','Em hoàn thành nội dung kiến thức môn học'),(872,96,9,'9','Em hoàn thành nội dung kiến thức môn học'),(873,96,10,'9','Em hoàn thành nội dung kiến thức môn học'),(874,96,11,'9','Em hoàn thành nội dung kiến thức môn học'),(875,96,12,'9','Em hoàn thành nội dung kiến thức môn học'),(876,97,1,'9','Em có năng khiếu về môn Toán'),(877,97,2,'9','Em học tốt môn học'),(878,97,4,'9','Em học tốt môn học'),(879,97,5,'8','Em học tốt môn học'),(880,97,6,'8','Em học tốt môn học'),(881,97,7,'9','Em học tốt môn học'),(882,97,8,'7','Em tiếp thu môn học còn chậm'),(883,97,9,'8','Em học tốt môn học'),(884,97,10,'9','Em học tốt môn học'),(885,97,11,'8','Em học tốt môn học'),(886,97,12,'8','Em học tốt môn học'),(887,98,1,'9','Em học tốt môn toán'),(888,98,2,'8','Em học tốt môn văn'),(889,98,4,'9','Em hoàn thành tốt nội dung kiến thức môn học'),(890,98,5,'7','Em hoàn thành tốt nội dung kiến thức môn học'),(891,98,6,'8','Em hoàn thành tốt nội dung kiến thức môn học'),(892,98,7,'7','Em hoàn thành tốt nội dung kiến thức môn học'),(893,98,8,'9','Em hoàn thành tốt nội dung kiến thức môn học'),(894,98,9,'9','Em hoàn thành tốt nội dung kiến thức môn học'),(895,98,10,'8','Em hoàn thành tốt nội dung kiến thức môn học'),(896,98,11,'9','Em hoàn thành tốt nội dung kiến thức môn học'),(897,98,12,'8','Em hoàn thành tốt nội dung kiến thức môn học'),(898,99,1,'9','Em có năng khiếu về môn Toán'),(899,99,2,'8','Em học tốt môn Văn'),(900,99,4,'8','Em tiếp thu rất tốt nội dung môn học'),(901,99,5,'9','Em tiếp thu rất tốt nội dung môn học'),(902,99,6,'9','Em tiếp thu rất tốt nội dung môn học'),(903,99,7,'9','Em tiếp thu rất tốt nội dung môn học'),(904,99,8,'7','Em hoàn thành kiến nội dung môn học'),(905,99,9,'7','Em hoàn thành kiến nội dung môn học'),(906,99,10,'7','Em hoàn thành kiến nội dung môn học'),(907,99,11,'8','Em hoàn thành kiến nội dung môn học'),(908,99,12,'7','Em hoàn thành kiến nội dung môn học'),(909,100,1,'9','Em có năng khiếu về môn Toán'),(910,100,2,'8','Em học tốt môn Văn'),(911,100,4,'7','Em hoàn thành nội dung kiến thức môn học'),(912,100,5,'9','Em hoàn thành nội dung kiến thức môn học'),(913,100,6,'7','Em hoàn thành nội dung kiến thức môn học'),(914,100,7,'8','Em hoàn thành nội dung kiến thức môn học'),(915,100,8,'9','Em hoàn thành nội dung kiến thức môn học'),(916,100,9,'9','Em hoàn thành nội dung kiến thức môn học'),(917,100,10,'8','Em hoàn thành nội dung kiến thức môn học'),(918,100,11,'7','Em hoàn thành nội dung kiến thức môn học'),(919,100,12,'9','Em hoàn thành nội dung kiến thức môn học');

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `t_private_message` */

insert  into `t_private_message`(`PK_MESSAGE`,`FK_THREAD`,`C_CONTENT`,`FK_SENDING_USER`,`C_SENT_DATE`) values (1,1,'&lt;p&gt;T&amp;ocirc;i nhận được th&amp;ocirc;ng b&amp;aacute;o l&amp;agrave; Con hay ngủ gật .C&amp;oacute; thể l&amp;yacute; do l&amp;agrave;ch&amp;aacute;u đi ngủ cũng muộn, hay xem phim&lt;/p&gt;\r\n',52,'2015-05-12 23:13:48'),(2,2,'&lt;p&gt;&lt;strong&gt;T&amp;ocirc;i kiểm tra b&amp;agrave;i ch&amp;aacute;u vẫn n&amp;oacute;i được, nhưng kh&amp;ocirc;ng hiểu sao tr&amp;ecirc;n lớp lại kh&amp;ocirc;ng trả lời được?&lt;/strong&gt;&lt;/p&gt;\r\n',53,'2015-05-12 23:15:29'),(3,2,'&lt;p&gt;Ch&amp;aacute;u vẫn tiếp thu được b&amp;agrave;i tr&amp;ecirc;n lớp nhưng chữ viết c&amp;ograve;n xấu&lt;/p&gt;\r\n',13,'2015-05-12 23:27:58'),(4,3,'&lt;p&gt;Ch&amp;aacute;u nh&amp;agrave; t&amp;ocirc;i l&amp;uacute;c viết nhanh, l&amp;uacute;c viết chậm, thỉnh thoảng viết tay tr&amp;aacute;i&lt;/p&gt;\r\n',53,'2015-05-12 23:29:26'),(5,4,'&lt;p&gt;Ch&amp;aacute;u n&amp;oacute;i l&amp;agrave; l&amp;agrave;m b&amp;agrave;i tập&lt;/p&gt;\r\n',56,'2015-05-12 23:30:49'),(6,5,'&lt;p&gt;Ch&amp;aacute;u viết chữ rất xấu&lt;/p&gt;\r\n',56,'2015-05-12 23:31:17'),(7,6,'&lt;p&gt;Ch&amp;aacute;u nh&amp;agrave; t&amp;ocirc;i viết chữ rất xấu&lt;/p&gt;\r\n',42,'2015-05-12 23:33:00'),(8,7,'&lt;p&gt;Ch&amp;aacute;u hay n&amp;oacute;i chuy&amp;ecirc;n ri&amp;ecirc;ng trong giờ học&lt;/p&gt;\r\n',11,'2015-05-12 23:34:10');

/*Table structure for table `t_private_message_read_state` */

DROP TABLE IF EXISTS `t_private_message_read_state`;

CREATE TABLE `t_private_message_read_state` (
  `FK_MESSAGE` int(10) unsigned DEFAULT NULL,
  `FK_USER` int(10) unsigned DEFAULT NULL,
  `C_READ_DATE` datetime DEFAULT NULL,
  `C_READ_STATE` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `t_private_message_read_state` */

insert  into `t_private_message_read_state`(`FK_MESSAGE`,`FK_USER`,`C_READ_DATE`,`C_READ_STATE`) values (1,52,NULL,1),(1,13,'2015-05-12 23:49:31',1),(2,53,NULL,1),(2,13,'2015-05-12 23:27:59',1),(3,13,NULL,1),(3,53,NULL,0),(4,53,NULL,1),(4,13,NULL,0),(5,56,NULL,1),(5,13,NULL,0),(6,56,NULL,1),(6,13,NULL,0),(7,42,NULL,1),(7,11,NULL,0),(8,11,NULL,1),(8,44,NULL,0);

/*Table structure for table `t_private_thread` */

DROP TABLE IF EXISTS `t_private_thread`;

CREATE TABLE `t_private_thread` (
  `PK_THREAD` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `C_TITLE` text,
  `C_CREATED_DATE` datetime DEFAULT NULL,
  `C_CREATED_USER` int(10) unsigned DEFAULT NULL,
  `C_LATEST_DATE` datetime DEFAULT NULL,
  PRIMARY KEY (`PK_THREAD`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Data for the table `t_private_thread` */

insert  into `t_private_thread`(`PK_THREAD`,`C_TITLE`,`C_CREATED_DATE`,`C_CREATED_USER`,`C_LATEST_DATE`) values (1,'Thắc mắc về tình hình kỷ luật','2015-05-12 23:13:48',52,'2015-05-12 23:13:48'),(2,'Việc học tập của cháu Mách','2015-05-12 23:15:29',53,'2015-05-12 23:27:58'),(3,'Thắc mắc về vấn đề chữ viết của cháu','2015-05-12 23:29:26',53,'2015-05-12 23:29:26'),(4,'Cháu nhà tôi hay thức khuya','2015-05-12 23:30:49',56,'2015-05-12 23:30:49'),(5,'Chữ viết cháu rất xấu','2015-05-12 23:31:17',56,'2015-05-12 23:31:17'),(6,'Chữ viết cháu rất xấu','2015-05-12 23:33:00',42,'2015-05-12 23:33:00'),(7,'Cháu hay nói chuyên riêng trong giờ học','2015-05-12 23:34:10',11,'2015-05-12 23:34:10');

/*Table structure for table `t_private_thread_participant` */

DROP TABLE IF EXISTS `t_private_thread_participant`;

CREATE TABLE `t_private_thread_participant` (
  `FK_THREAD` int(10) unsigned DEFAULT NULL,
  `FK_USER` int(10) unsigned DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `t_private_thread_participant` */

insert  into `t_private_thread_participant`(`FK_THREAD`,`FK_USER`) values (1,52),(1,13),(2,53),(2,13),(3,53),(3,13),(4,56),(4,13),(5,56),(5,13),(6,42),(6,11),(7,11),(7,44);

/*Table structure for table `t_public_post` */

DROP TABLE IF EXISTS `t_public_post`;

CREATE TABLE `t_public_post` (
  `PK_POST` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `FK_TOPIC` int(11) DEFAULT NULL,
  `C_CONTENT` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `C_POSTED_DATE` datetime DEFAULT NULL,
  `C_POSTED_USER` int(11) DEFAULT NULL,
  PRIMARY KEY (`PK_POST`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

/*Data for the table `t_public_post` */

insert  into `t_public_post`(`PK_POST`,`FK_TOPIC`,`C_CONTENT`,`C_POSTED_DATE`,`C_POSTED_USER`) values (1,1,'&lt;ol&gt;\r\n	&lt;li&gt;Tiền mua giấy kiểm tra : 20 000&lt;/li&gt;\r\n	&lt;li&gt;Tiền mua b&amp;uacute;t vẽ : 50 000&lt;/li&gt;\r\n	&lt;li&gt;Tiền mua s&amp;aacute;ch gi&amp;aacute;o khoa : 420&amp;nbsp;000&lt;/li&gt;\r\n&lt;/ol&gt;\r\n','2015-05-12 23:19:14',13),(2,2,'&lt;ol&gt;\r\n	&lt;li&gt;11/4 : Thi văn&lt;/li&gt;\r\n	&lt;li&gt;12/4: Thi To&amp;aacute;n&lt;/li&gt;\r\n	&lt;li&gt;13/4 :Thi Anh&lt;/li&gt;\r\n&lt;/ol&gt;\r\n','2015-05-12 23:20:58',13),(3,2,'&lt;p&gt;C&amp;aacute;c m&amp;ocirc;n kh&amp;aacute;c c&amp;aacute;c em đ&amp;atilde; thi xong&lt;/p&gt;\r\n','2015-05-12 23:21:22',13),(4,3,'&lt;p&gt;Học sinh sẽ được ph&amp;acirc;n th&amp;agrave;nh c&amp;aacute;c nh&amp;oacute;m như thể n&amp;agrave;o để tiện đ&amp;aacute;nh gi&amp;aacute;&lt;/p&gt;\r\n','2015-05-12 23:22:19',52),(5,4,'&lt;p&gt;Nghỉ bao nhi&amp;ecirc;u buổi sẽ bị đ&amp;aacute;nh gi&amp;aacute; về vấn đề hạnh kiểm&lt;/p&gt;\r\n','2015-05-12 23:23:22',52),(6,5,'&lt;ol&gt;\r\n	&lt;li&gt;Học sinh kh&amp;ocirc;ng được mang đồ chơi đến lớp&lt;/li&gt;\r\n	&lt;li&gt;Mặc đồng phục nghi&amp;ecirc;m chỉnh&lt;/li&gt;\r\n&lt;/ol&gt;\r\n','2015-05-12 23:24:25',13),(7,4,'&lt;p&gt;Th&amp;ocirc;ng thường l&amp;agrave; 20% số buổi trở l&amp;ecirc;n sẽ bị hạ một bậc trừ khi c&amp;oacute; bệnh c&amp;oacute; giấy x&amp;aacute;c nhận của b&amp;aacute;c sĩ&lt;/p&gt;\r\n','2015-05-12 23:24:51',13),(8,6,'&lt;p&gt;12/5 học sinh sẽ đi tham quan bảo t&amp;agrave;ng lịch sử Hồ Ch&amp;iacute; Minh&lt;/p&gt;\r\n','2015-05-12 23:26:20',13),(9,7,'&lt;p&gt;Học sinh chỉ c&amp;oacute; 2 bộ đồng phục mặc thay đổi&lt;/p&gt;\r\n','2015-05-12 23:32:36',42);

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Data for the table `t_public_topic` */

insert  into `t_public_topic`(`PK_TOPIC`,`FK_CLASS`,`FK_CATEGORY`,`C_TITLE`,`C_CREATED_DATE`,`C_LATEST_DATE`,`C_CREATER_USER`,`C_LAST_USER`,`C_POST_NUMBER`,`C_VIEW_NUMBER`) values (1,12,1,'Thông tin chi tiết về các khoản đóng góp ','2015-05-12 23:19:14','2015-05-12 23:19:14',13,13,1,3),(2,12,1,'Lịch thi cụ thể chi tiết','2015-05-12 23:20:58','2015-05-12 23:21:22',13,13,2,4),(3,12,2,'Thắc mắc về quá trình học nhóm của học sinh','2015-05-12 23:22:19','2015-05-12 23:22:19',52,52,1,1),(4,12,3,'Thắc mắc về số buổi nghỉ học của học sinh','2015-05-12 23:23:22','2015-05-12 23:24:51',52,13,2,5),(5,12,3,'Nội quy lớp học','2015-05-12 23:24:25','2015-05-12 23:24:25',13,13,1,3),(6,12,4,'Kế hoạch đi tham quan bảo tàng lịch sử','2015-05-12 23:26:20','2015-05-12 23:26:20',13,13,1,2),(7,10,1,'Thắc mắc về đồng phục của học sinh','2015-05-12 23:32:36','2015-05-12 23:32:36',42,42,1,1);

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
  `C_CLASS` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `C_TEACHER_NAME` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`PK_SCHOOL_RECORD`)
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_school_record` */

insert  into `t_school_record`(`PK_SCHOOL_RECORD`,`C_STUDENT_CODE`,`C_SEMESTER`,`C_YEAR`,`C_TITLE`,`C_TEACHER_CODE`,`C_REMARK_FINAL`,`C_CLASS`,`C_TEACHER_NAME`) values (61,'HS10011',1,'2010-2011',' Học sinh Giỏi','GV8503','Em học đều các môn, ý thức rèn luyện kỷ luật tốt','1C','Nguyễn Minh Thảo'),(62,'HS10012',1,'2010-2011',' Học sinh Giỏi','GV8503','Em học đều các môn, ý thức rèn luyện kỷ luật tốt','1C','Nguyễn Minh Thảo'),(63,'HS10013',1,'2010-2011',' Học sinh Khá','GV8503','Em học đều các môn, ý thức rèn luyện kỷ luật tốt','1C','Nguyễn Minh Thảo'),(64,'HS10014',1,'2010-2011',' Học sinh Trung Bình','GV8503','Cần cố gắng hơn trong học tập','1C','Nguyễn Minh Thảo'),(65,'HS10015',1,'2010-2011',' Học sinh Khá','GV8503','Em học khá các môn','1C','Nguyễn Minh Thảo'),(66,'HS10011',2,'2010-2011',' Học sinh Giỏi','GV8503','Em hoàn thành tốt các nội dung môn học, ý thức rèn luyên tốt','1C','Nguyễn Minh Thảo'),(67,'HS10012',2,'2010-2011',' Học sinh Giỏi','GV8503','Em hoàn thành tốt các nội dung môn học,ý thức rèn luyên tốt','1C','Nguyễn Minh Thảo'),(68,'HS10013',2,'2010-2011',' Học sinh Giỏi','GV8503','Em hoàn thành tốt các nội dung môn học,ý thức rèn luyên tốt','1C','Nguyễn Minh Thảo'),(69,'HS10014',2,'2010-2011',' Học sinh Tiên Tiến','GV8503','Em hoàn thành tốt các nội dung môn học,ý thức rèn luyên tốt','1C','Nguyễn Minh Thảo'),(70,'HS10015',2,'2010-2011',' Học sinh Tiên Tiến','GV8503','Em hoàn thành tốt các nội dung môn học,ý thức rèn luyên tốt','1C','Nguyễn Minh Thảo'),(71,'HS10011',1,'2011-2012',' Học sinh Giỏi','GV8506','Em hoàn thành tốt các nội dung môn học, ý thức rèn luyên tốt','2C','Vũ Thị Tâm'),(72,'HS10012',1,'2011-2012',' Học sinh Giỏi','GV8506','Em hoàn thành tốt các nội dung môn học, ý thức rèn luyên tốt','2C','Vũ Thị Tâm'),(73,'HS10013',1,'2011-2012',' Học sinh Khá','GV8506','Em hoàn thành tốt các nội dung môn học, ý thức rèn luyên tốt','2C','Vũ Thị Tâm'),(74,'HS10014',1,'2011-2012',' Học sinh Trung Bình','GV8506','Em còn tiếp thu chậm, ý thức rèn luyện kỷ luật khá','2C','Vũ Thị Tâm'),(75,'HS10015',1,'2011-2012',' Học sinh Khá','GV8506','Em hoàn thành tốt các nội dung môn học,ý thức rèn luyên tốt','2C','Vũ Thị Tâm'),(76,'HS10011',2,'2011-2012',' Học sinh Giỏi','GV8506','Em hoàn thành tốt các nội dung môn học, ý thức rèn luyên tốt, hăng hái giơ tay phát biểu','2C','Vũ Thị Tâm'),(77,'HS10012',2,'2011-2012',' Học sinh Giỏi','GV8506','Em hoàn thành tốt các nội dung môn học, ý thức rèn luyên tốt, hăng hái giơ tay phát biểu','2C','Vũ Thị Tâm'),(78,'HS10013',2,'2011-2012',' Học sinh Giỏi','GV8506','Em hoàn thành tốt các nội dung môn học, ý thức rèn luyên tốt, hăng hái giơ tay phát biểu','2C','Vũ Thị Tâm'),(79,'HS10014',2,'2011-2012',' Học sinh Giỏi','GV8506','Em hoàn thành tốt các nội dung môn học, ý thức rèn luyên tốt, hăng hái giơ tay phát biểu','2C','Vũ Thị Tâm'),(80,'HS10015',2,'2011-2012',' Học sinh Giỏi','GV8506','Em hoàn thành tốt các nội dung môn học, ý thức rèn luyên tốt, hăng hái giơ tay phát biểu','2C','Vũ Thị Tâm'),(81,'HS10011',1,'2012-2013',' Học sinh Tiên Tiến','GV8509','Em hoàn thành tốt các nội dung môn học, hay mải chơi','3C','Dương Ngọc Mai'),(82,'HS10012',1,'2012-2013',' Học sinh Tiên Giỏi','GV8509','Em tiếp thu tốt nội dung môn học, ý thức rèn luyện tốt','3C','Dương Ngọc Mai'),(83,'HS10013',1,'2012-2013',' Học sinh Tiên Tiến','GV8509','Em tiếp thu tốt nội dung môn học, ý thức rèn luyện tốt','3C','Dương Ngọc Mai'),(84,'HS10014',1,'2012-2013',' Học sinh Giỏi','GV8509','Em tiếp thu tốt nội dung môn học, ý thức rèn luyện tốt','3C','Dương Ngọc Mai'),(85,'HS10015',1,'2012-2013',' Học sinh Giỏi','GV8509','Em tiếp thu tốt nội dung môn học, ý thức rèn luyện tốt','3C','Dương Ngọc Mai'),(86,'HS10011',2,'2012-2013',' Học sinh Giỏi','GV8509','Em hoàn thành tốt các nội dung môn học, ý thức rèn luyên tốt','3C','Dương Ngọc Mai'),(87,'HS10012',2,'2012-2013',' Học sinh Giỏi','GV8509','Em hoàn thành tốt các nội dung môn học, ý thức rèn luyên tốt','3C','Dương Ngọc Mai'),(88,'HS10013',2,'2012-2013',' Học sinh Giỏi','GV8509','Em hoàn thành tốt các nội dung môn học, ý thức rèn luyên tốt','3C','Dương Ngọc Mai'),(89,'HS10014',2,'2012-2013',' Học sinh Giỏi','GV8509','Em hoàn thành tốt các nội dung môn học, ý thức rèn luyên tốt','3C','Dương Ngọc Mai'),(90,'HS10015',2,'2012-2013',' Học sinh Giỏi','GV8509','Em hoàn thành tốt các nội dung môn học, ý thức rèn luyên tốt','3C','Dương Ngọc Mai'),(91,'HS10011',1,'2013-2014',' Học sinh Giỏi','GB8512','Em hoàn thành tốt các nội dung môn học, ý thức rèn luyên tốt','4C','Nguyễn Tú Anh'),(92,'HS10012',1,'2013-2014',' Học sinh Giỏi','GB8512','Em hoàn thành tốt các nội dung môn học, ý thức rèn luyên tốt','4C','Nguyễn Tú Anh'),(93,'HS10013',1,'2013-2014',' Học sinh Giỏi','GB8512','Em hoàn thành tốt các nội dung môn học, ý thức rèn luyên tốt','4C','Nguyễn Tú Anh'),(94,'HS10014',1,'2013-2014',' Học sinh Giỏi','GB8512','Em hoàn thành tốt các nội dung môn học, ý thức rèn luyên tốt','4C','Nguyễn Tú Anh'),(95,'HS10015',1,'2013-2014',' Học sinh Giỏi','GB8512','Em hoàn thành tốt các nội dung môn học, ý thức rèn luyên tốt','4C','Nguyễn Tú Anh'),(96,'HS10011',2,'2013-2014',' Học sinh Giỏi','GV8512','Em có ý thức vươn lên trong học tập, hòa đồng , hăng hái giơ tay phát biểu','4C','Nguyễn Tú Anh'),(97,'HS10012',2,'2013-2014',' Học sinh Giỏi','GV8512','Em tiếp thu tốt nội dung các môn học trong năm học','4C','Nguyễn Tú Anh'),(98,'HS10013',2,'2013-2014',' Học sinh Tiên Tiến','GV8512','Em có ý thức vươn lên trong học tập, hòa đồng , hăng hái giơ tay phát biểu','4C','Nguyễn Tú Anh'),(99,'HS10014',2,'2013-2014',' Học sinh Tiên Tiến','GV8512','Em tiếp thu tốt nội dung các môn học trong năm học','4C','Nguyễn Tú Anh'),(100,'HS10015',2,'2013-2014',' Học sinh Tiên Tiến','GV8512','Em hoàn thành tốt các nội dung môn học,ý thức rèn luyên tốt','4C','Nguyễn Tú Anh');

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
) ENGINE=InnoDB AUTO_INCREMENT=117 DEFAULT CHARSET=utf8;

/*Data for the table `t_user` */

insert  into `t_user`(`PK_USER`,`C_NAME`,`C_CODE`,`C_PHONE`,`C_ADDRESS`,`C_EMAIL`,`FK_CLASS`,`C_LOGIN_NAME`,`C_PASSWORD`,`FK_GROUP`,`FK_GRADE`,`C_FATHER_NAME`,`C_MOTHER_NAME`,`C_STUDENT_BIRTH`,`C_DELETED`,`C_POST_NUMBER`) values (1,'Quản trị hệ thống',NULL,NULL,NULL,NULL,NULL,'admin','e10adc3949ba59abbe56e057f20f883e',1,NULL,NULL,NULL,NULL,0,NULL),(2,'Lưu Hải Yến','GV8501','0988715937','Hà Nội','gv01@gmail.com','1','luuhaiyen06041985','e10adc3949ba59abbe56e057f20f883e',3,1,NULL,NULL,'1985-06-04',0,NULL),(3,'Nguyễn Thị Hải Yến','GV8502','0937564837','Hà Nội','gv02@gmail.com','2','nguyenthihaiyen06041985','e10adc3949ba59abbe56e057f20f883e',3,1,NULL,NULL,'1985-06-04',0,NULL),(4,'Nguyễn Minh Thảo','GV8503','09846737562','Hà Nội','gv03@gmail.com','3','nguyenminhthao06041985','e10adc3949ba59abbe56e057f20f883e',3,1,NULL,NULL,'1985-06-04',0,1),(5,'Trần Ánh Tuyết','GV8504','0946352745','Hà Nội','gv04@gmail.com','4','trananhtuyet06041985','e10adc3949ba59abbe56e057f20f883e',3,2,NULL,NULL,'1985-06-04',0,NULL),(6,'Nguyễn Xuân Thủy','GV8505','0947362548','Hà Nội','gv05@gmail.com','5','nguyenxuanthuy06041985','e10adc3949ba59abbe56e057f20f883e',3,2,NULL,NULL,'1985-06-04',0,NULL),(7,'Vũ Thị Tâm','GV8506','0947364726','Hà Nội','gv06@gmail.com','6','vuthitam06041985','e10adc3949ba59abbe56e057f20f883e',3,2,NULL,NULL,'1985-06-04',0,NULL),(8,'Vũ Thị Oanh','GV8507','0184746278','Hà Nội','gv07@gmail.com','7','vuthioanh06041985','e10adc3949ba59abbe56e057f20f883e',3,3,NULL,NULL,'1985-06-04',0,NULL),(9,'Trần Thị Ngân','GV8508','0956473625','Hà Nội','gv08@gmail.com','8','tranthingan06041985','e10adc3949ba59abbe56e057f20f883e',3,3,NULL,NULL,'1985-06-04',0,NULL),(10,'Dương Ngọc Mai','GV8509','09857364523','Hà Nội','gv09@gmail.com','9','duongngocmai06041985','e10adc3949ba59abbe56e057f20f883e',3,3,NULL,NULL,'1985-06-04',0,NULL),(11,'Lương Thị Thu Hà','GV8510','0988574657','Hà Nội','gv10@gmail.com','10','luongthithuha06041985','e10adc3949ba59abbe56e057f20f883e',3,4,NULL,NULL,'1985-06-04',0,NULL),(12,'Nguyễn Thị Hồng Hạnh','GV8511','095847563','Hà Nội','gv11@gmail.com','11','nguyenthihonghanh06041985','e10adc3949ba59abbe56e057f20f883e',3,4,NULL,NULL,'1985-06-04',0,NULL),(13,'Nguyễn Tú Anh','GV8512','0947838462','Hà Nội','gv12@gmail.com','12','nguyentuanh06041985','e10adc3949ba59abbe56e057f20f883e',3,4,NULL,NULL,'1985-06-04',0,6),(14,'Nguyễn Thu Trang','GV8513','0948573623','Hà Nội','gv13@gmail.com','13','nguyenthutrang06041985','e10adc3949ba59abbe56e057f20f883e',3,5,NULL,NULL,'1985-06-04',0,NULL),(15,'Phạm Thị Tươi','GV8514','0968573787','Hà Nội','gv14@gmail.com','14','phamthituoi06041985','e10adc3949ba59abbe56e057f20f883e',3,5,NULL,NULL,'1985-06-04',0,NULL),(16,'Nguyễn Thị Thảo','GV8515','09474628364','Hà Nội','gv15@gmail.com','15','nguyenthithao06041985','e10adc3949ba59abbe56e057f20f883e',3,5,NULL,NULL,'1985-06-04',0,NULL),(42,'Phạm Minh Tuấn','HS10001','(+84)9746284','Bà Triệu, Hoàn Kiếm,Hà Nội','nxb1208@gmail.com','10','phamminhtuan01012003','e10adc3949ba59abbe56e057f20f883e',4,4,'Nguyễn Xuân Bách','Phạm Thu Hương ','2003-01-01',0,1),(43,'Nguyễn Thành Trung','HS10002','(+84)9746284','Tràng Tiền, Hoàn Kiếm,Hà Nội','nvb1398@gmail.com','10','nguyenthanhtrung02012003','e10adc3949ba59abbe56e057f20f883e',4,4,'Nguyễn Văn Bằng','Phạm Thúy Hằng','2003-01-02',0,0),(44,'Lê Xuân Quỳnh','HS10003','(+84)9746284','Chùa Bộc,Đống Đa,Hà Nội','ltc1408@gmail.com','10','lexuanquynh03012003','e10adc3949ba59abbe56e057f20f883e',4,4,'Lê Tiến Châu','Vũ Thị Hiền','2003-01-03',0,0),(45,'Hoàng Thị Vân','HS10004','(+84)9746284','Lò Đúc, Hoàn Kiếm,Hà Nội','ttđ1508@gmail.com','10','hoangthivan04012003','e10adc3949ba59abbe56e057f20f883e',4,4,'Trần Tiến Đức','Trương Thị Lệ Khanh','2003-01-04',0,0),(46,'Nguyễn Quỳnh Chi','HS10005','(+84)9746284','Đội Cấn, Đống Đa,Hà Nội','pvd1608@gmail.com','10','nguyenquynhchi05012003','e10adc3949ba59abbe56e057f20f883e',4,4,'Phạm Văn Dũng','Nguyễn Hoàng Yến','2003-01-05',0,0),(47,'Phạm Bích Nga','HS10006','(+84)9746284','Lương Thế Vinh, Thanh Xuân,Hà Nội','ptđ1708@gmail.com','11','phambichnga06012003','e10adc3949ba59abbe56e057f20f883e',4,4,'Phạm Tiến Đức','Chu Thị Bình','2003-01-06',0,0),(48,'Phạm Minh Sơn','HS10007','(+84)9746284','Khuất Duy Tiến, Thanh Xuân,Hà Nội','tqd1808@gmail.com','11','phamminhson07012003','e10adc3949ba59abbe56e057f20f883e',4,4,'Tạ Quang Dũng','Phan Thi Hương','2003-01-07',0,0),(49,'Tạ Thu Hiền','HS10008','(+84)9746284','gò Đống Đa,Đống Đa,Hà Nội','lmg1908@gmail.com','11','tathuhien08012003','e10adc3949ba59abbe56e057f20f883e',4,4,'Lê Minh Giang','Nguyễn Thị Kim Xuân','2003-01-08',0,0),(50,'Nguyễn Hoàng Lam','HS10009','(+84)9746284','Khương Trung, Thanh Xuân,Hà Nội','hmg110008@gmail.com','11','nguyenhoanglam09012003','e10adc3949ba59abbe56e057f20f883e',4,4,'Hoàng Minh Giám','Nguyễn Thị Như Loan','2003-01-09',0,0),(51,'Phạm Ngoc Long','HS10010','(+84)9746284','Văn Quán, Hà Đông, Hà Nội','hvt111008@gmail.com','11','phamngoclong10012003','e10adc3949ba59abbe56e057f20f883e',4,4,'Hoàng Văn Thái','Đặng Ngọc Lan','2003-01-10',0,0),(52,'Nguyễn Thúy Quỳnh','HS10011','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','lth112008@gmail.com','12','nguyenthuyquynh11012003','e10adc3949ba59abbe56e057f20f883e',4,4,'Lý Trần Hiệp','Phùng Minh Nguyệt','2003-01-11',0,2),(53,'Phạm Văn Mách','HS10012','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','cđh113008@gmail.com','12','phamvanmach12012003','e10adc3949ba59abbe56e057f20f883e',4,4,'Chu Đình Hào','Đặng Thị Hoàng Yến','2003-01-12',0,0),(54,'Nguyễn Quỳnh Trang','HS10013','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','lth114008@gmail.com','12','nguyenquynhtrang13012003','e10adc3949ba59abbe56e057f20f883e',4,4,'Lý Trần Hiệp','Nguyễn Thị Diệu Hiền','2003-01-13',0,0),(55,'Đào Tấn Tùng','HS10014','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','nmh115008@gmail.com','12','daotantung14012003','e10adc3949ba59abbe56e057f20f883e',4,4,'Nguyễn Minh Hoàng','Phạm Thị Lê','2003-01-14',0,0),(56,'Nguyễn Tự Nguyện','HS10015','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','nmh115008@gmail.com','12','nguyentunguyen15012003','e10adc3949ba59abbe56e057f20f883e',4,4,'Nguyễn Minh Hoàng','Phạm Thị Lê','2003-01-15',0,0),(61,'giaovientruong','Gv8516','0958583748','Hà Nội','gv16@gmail.com','','giaovientruong06041985','e10adc3949ba59abbe56e057f20f883e',2,0,NULL,NULL,'1985-04-06',0,NULL),(62,'Nguyễn Kim Tường','HS11001','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','nxb1208@gmail.com','7','nguyenkimtuong02012004','e10adc3949ba59abbe56e057f20f883e',4,3,'Nguyễn Xuân Bách','Phạm Thu Hương ','2004-01-02',0,0),(63,'Đoàn Văn Giang','HS11002','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','nvb1398@gmail.com','7','doanvangiang03012004','e10adc3949ba59abbe56e057f20f883e',4,3,'Nguyễn Văn Bằng','Phạm Thúy Hằng','2004-01-03',0,0),(64,'Nguyễn Văn Sử','HS11003','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','ltc1408@gmail.com','7','nguyenvansu04012004','e10adc3949ba59abbe56e057f20f883e',4,3,'Lê Tiến Châu','Vũ Thị Hiền','2004-01-04',0,0),(65,'Nguyễn Việt ','HS11004','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','ttđ1508@gmail.com','7','nguyenviet05012004','e10adc3949ba59abbe56e057f20f883e',4,3,'Trần Tiến Đức','Trương Thị Lệ Khanh','2004-01-05',0,0),(66,'Nguyễn Việt Thái','HS11005','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','pvd1608@gmail.com','7','nguyenvietthai06012004','e10adc3949ba59abbe56e057f20f883e',4,3,'Phạm Văn Dũng','Nguyễn Hoàng Yến','2004-01-06',0,0),(67,'Phạm Quang Huy','HS11006','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','ptđ1708@gmail.com','8','phamquanghuy07012004','e10adc3949ba59abbe56e057f20f883e',4,3,'Phạm Tiến Đức','Chu Thị Bình','2004-01-07',0,0),(68,'Nguyễn Khánh Dựng','HS11007','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','tqd1808@gmail.com','8','nguyenkhanhdung08012004','e10adc3949ba59abbe56e057f20f883e',4,3,'Tạ Quang Dũng','Phan Thi Hương','2004-01-08',0,0),(69,'Nguyễn Thanh Lâm','HS11008','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','lmg1908@gmail.com','8','nguyenthanhlam09012004','e10adc3949ba59abbe56e057f20f883e',4,3,'Lê Minh Giang','Nguyễn Thị Kim Xuân','2004-01-09',0,0),(70,'Trần Văn Long','HS11009','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','hmg110008@gmail.com','8','tranvanlong10012004','e10adc3949ba59abbe56e057f20f883e',4,3,'Hoàng Minh Giám','Nguyễn Thị Như Loan','2004-01-10',0,0),(71,'Nguyễn Nhật Minh','HS11010','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','hvt111008@gmail.com','8','nguyennhatminh11012004','e10adc3949ba59abbe56e057f20f883e',4,3,'Hoàng Văn Thái','Đặng Ngọc Lan','2004-01-11',0,0),(72,'Mai Kiều Liên','HS11011','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','lth112008@gmail.com','9','maikieulien12012004','e10adc3949ba59abbe56e057f20f883e',4,3,'Lý Trần Hiệp','Phùng Minh Nguyệt','2004-01-12',0,0),(73,'Trương Thị Thanh','HS11012','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','cđh113008@gmail.com','9','truongthithanh13012004','e10adc3949ba59abbe56e057f20f883e',4,3,'Chu Đình Hào','Đặng Thị Hoàng Yến','2004-01-13',0,0),(74,'Quách Thị Nga','HS11013','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','lth114008@gmail.com','9','quachthinga14012004','e10adc3949ba59abbe56e057f20f883e',4,3,'Lý Trần Hiệp','Nguyễn Thị Diệu Hiền','2004-01-14',0,0),(75,'Ngô Thị Thông','HS11014','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','nmh115008@gmail.com','9','ngothithong15012004','e10adc3949ba59abbe56e057f20f883e',4,3,'Nguyễn Minh Hoàng','Phạm Thị Lê','2004-01-15',0,0),(76,'Nguyễn Thị Kim Xuân','HS11015','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','nmh115008@gmail.com','9','nguyenthikimxuan16012004','e10adc3949ba59abbe56e057f20f883e',4,3,'Nguyễn Minh Hoàng','Phạm Thị Lê','2004-01-16',0,0),(87,'Đinh Xuân Trường','HS12001','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','nxb1208@gmail.com','4','dinhxuantruong02012005','e10adc3949ba59abbe56e057f20f883e',4,2,'Nguyễn Xuân Bách','Phạm Thu Hương ','2005-01-02',0,0),(88,'Đỗ Khánh Tùng','HS12002','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','nvb1398@gmail.com','4','dokhanhtung03012005','e10adc3949ba59abbe56e057f20f883e',4,2,'Nguyễn Văn Bằng','Phạm Thúy Hằng','2005-01-03',0,0),(89,'Nguyễn Ngọc Anh','HS12003','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','ltc1408@gmail.com','4','nguyenngocanh04012005','e10adc3949ba59abbe56e057f20f883e',4,2,'Lê Tiến Châu','Vũ Thị Hiền','2005-01-04',0,0),(90,'Hoàng Văn Đạt','HS12004','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','ttđ1508@gmail.com','4','hoangvandat05012005','e10adc3949ba59abbe56e057f20f883e',4,2,'Trần Tiến Đức','Trương Thị Lệ Khanh','2005-01-05',0,0),(91,'Nguyễn Thiên Hà','HS12005','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','pvd1608@gmail.com','4','nguyenthienha06012005','e10adc3949ba59abbe56e057f20f883e',4,2,'Phạm Văn Dũng','Nguyễn Hoàng Yến','2005-01-06',0,0),(92,'Nguyễn An Hảo','HS12006','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','ptđ1708@gmail.com','5','nguyenanhao07012005','e10adc3949ba59abbe56e057f20f883e',4,2,'Phạm Tiến Đức','Chu Thị Bình','2005-01-07',0,0),(93,'Phạm Văn Hạ','HS12007','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','tqd1808@gmail.com','5','phamvanha08012005','e10adc3949ba59abbe56e057f20f883e',4,2,'Tạ Quang Dũng','Phan Thi Hương','2005-01-08',0,0),(94,'Trần Văn Hoàn','HS12008','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','lmg1908@gmail.com','5','tranvanhoan09012005','e10adc3949ba59abbe56e057f20f883e',4,2,'Lê Minh Giang','Nguyễn Thị Kim Xuân','2005-01-09',0,0),(95,'Nguyễn Hữu Hoạt','HS12009','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','hmg110008@gmail.com','5','nguyenhuuhoat10012005','e10adc3949ba59abbe56e057f20f883e',4,2,'Hoàng Minh Giám','Nguyễn Thị Như Loan','2005-01-10',0,0),(96,'Nguyễn Thế Hùng','HS12010','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','hvt111008@gmail.com','5','nguyenthehung11012005','e10adc3949ba59abbe56e057f20f883e',4,2,'Hoàng Văn Thái','Đặng Ngọc Lan','2005-01-11',0,0),(97,'Mai Kiều Liên','HS12011','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','lth112008@gmail.com','6','maikieulien12012005','e10adc3949ba59abbe56e057f20f883e',4,2,'Lý Trần Hiệp','Phùng Minh Nguyệt','2005-01-12',0,0),(98,'Trương Thị Thanh','HS12012','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','cđh113008@gmail.com','6','truongthithanh13012005','e10adc3949ba59abbe56e057f20f883e',4,2,'Chu Đình Hào','Đặng Thị Hoàng Yến','2005-01-13',0,0),(99,'Đặng Đình Hưng','HS12013','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','lth114008@gmail.com','6','dangdinhhung14012005','e10adc3949ba59abbe56e057f20f883e',4,2,'Lý Trần Hiệp','Nguyễn Thị Diệu Hiền','2005-01-14',0,0),(100,'Trần Văn Hưng','HS12014','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','nmh115008@gmail.com','6','tranvanhung15012005','e10adc3949ba59abbe56e057f20f883e',4,2,'Nguyễn Minh Hoàng','Phạm Thị Lê','2005-01-15',0,0),(101,'Trần Thành Nam','HS12015','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','nmh115008@gmail.com','6','tranthanhnam16012005','e10adc3949ba59abbe56e057f20f883e',4,2,'Nguyễn Minh Hoàng','Phạm Thị Lê','2005-01-16',0,0),(102,'Trần Như Tài','HS13001','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','nxb1208@gmail.com','1','trannhutai02012006','e10adc3949ba59abbe56e057f20f883e',4,1,'Nguyễn Xuân Bách','Phạm Thu Hương ','2006-01-02',0,0),(103,'Bùi Quốc Thái','HS13002','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','nvb1398@gmail.com','1','buiquocthai03012006','e10adc3949ba59abbe56e057f20f883e',4,1,'Nguyễn Văn Bằng','Phạm Thúy Hằng','2006-01-03',0,0),(104,'Nguyễn Xuân Thắng','HS13003','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','ltc1408@gmail.com','1','nguyenxuanthang04012006','e10adc3949ba59abbe56e057f20f883e',4,1,'Lê Tiến Châu','Vũ Thị Hiền','2006-01-04',0,0),(105,'Trần Việt Thắng','HS13004','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','ttđ1508@gmail.com','1','tranvietthang05012006','e10adc3949ba59abbe56e057f20f883e',4,1,'Trần Tiến Đức','Trương Thị Lệ Khanh','2006-01-05',0,0),(106,'Nguyễn Văn Toàn','HS13005','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','pvd1608@gmail.com','1','nguyenvantoan06012006','e10adc3949ba59abbe56e057f20f883e',4,1,'Phạm Văn Dũng','Nguyễn Hoàng Yến','2006-01-06',0,0),(107,'Lê Hải Trúc','HS13006','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','ptđ1708@gmail.com','2','lehaitruc07012006','e10adc3949ba59abbe56e057f20f883e',4,1,'Phạm Tiến Đức','Chu Thị Bình','2006-01-07',0,0),(108,'Lê Anh Tuấn','HS13007','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','tqd1808@gmail.com','2','leanhtuan08012006','e10adc3949ba59abbe56e057f20f883e',4,1,'Tạ Quang Dũng','Phan Thi Hương','2006-01-08',0,0),(109,'Lê Văn Vĩnh','HS13008','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','lmg1908@gmail.com','2','levanvinh09012006','e10adc3949ba59abbe56e057f20f883e',4,1,'Lê Minh Giang','Nguyễn Thị Kim Xuân','2006-01-09',0,0),(110,'Đào Việt Hà','HS13009','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','hmg110008@gmail.com','2','daovietha10012006','e10adc3949ba59abbe56e057f20f883e',4,1,'Hoàng Minh Giám','Nguyễn Thị Như Loan','2006-01-10',0,0),(111,'Lê Văn Hào','HS13010','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','hvt111008@gmail.com','2','levanhao11012006','e10adc3949ba59abbe56e057f20f883e',4,1,'Hoàng Văn Thái','Đặng Ngọc Lan','2006-01-11',0,0),(112,'Vũ Đình Hoan','HS13011','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','lth112008@gmail.com','3','vudinhhoan12012006','e10adc3949ba59abbe56e057f20f883e',4,1,'Lý Trần Hiệp','Phùng Minh Nguyệt','2006-01-12',0,0),(113,'Hoàng Ngọc Phúc','HS13012','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','cđh113008@gmail.com','3','hoangngocphuc13012006','e10adc3949ba59abbe56e057f20f883e',4,1,'Chu Đình Hào','Đặng Thị Hoàng Yến','2006-01-13',0,0),(114,'Đặng Văn Thức','HS13013','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','lth114008@gmail.com','3','dangvanthuc14012006','e10adc3949ba59abbe56e057f20f883e',4,1,'Lý Trần Hiệp','Nguyễn Thị Diệu Hiền','2006-01-14',0,0),(115,'Nguyễn Văn Tuấn ','HS13014','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','nmh115008@gmail.com','3','nguyenvantuan15012006','e10adc3949ba59abbe56e057f20f883e',4,1,'Nguyễn Minh Hoàng','Phạm Thị Lê','2006-01-15',0,0),(116,'Nguyễn Hoàng Anh','HS13015','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','nmh115008@gmail.com','3','nguyenhoanganh16012006','e10adc3949ba59abbe56e057f20f883e',4,1,'Nguyễn Minh Hoàng','Phạm Thị Lê','2006-01-16',0,0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
