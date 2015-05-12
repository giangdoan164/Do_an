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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `t_announce` */

/*Table structure for table `t_category` */

DROP TABLE IF EXISTS `t_category`;

CREATE TABLE `t_category` (
  `PK_CATEGORY` tinyint(4) NOT NULL AUTO_INCREMENT,
  `C_NAME` varchar(255) DEFAULT NULL,
  `C_DESCRIPTION` text,
  PRIMARY KEY (`PK_CATEGORY`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `t_category` */

insert  into `t_category`(`PK_CATEGORY`,`C_NAME`,`C_DESCRIPTION`) values (1,'Trao đổi chung','Nơi thảo luận các vấn đề chung '),(2,'Góc học tập','Nơi thảo luận các vấn đề học tập'),(3,'Góc kỷ luật','Nơi thảo luận các vấn đề vui chơi , giải trí');

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

insert  into `t_current_time`(`C_SEMESTER`,`C_SCHOOL_YEAR`,`C_ACTIVE`) values (2,'2010-2011',1);

/*Table structure for table `t_detail_school_record` */

DROP TABLE IF EXISTS `t_detail_school_record`;

CREATE TABLE `t_detail_school_record` (
  `PK_DETAIL_RECORD` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `FK_SCHOOL_RECORD` int(10) unsigned DEFAULT NULL,
  `FK_SUBJECT` tinyint(4) DEFAULT NULL,
  `FK_GRADE` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `C_TEACHER_REMARK` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`PK_DETAIL_RECORD`)
) ENGINE=InnoDB AUTO_INCREMENT=680 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_detail_school_record` */

insert  into `t_detail_school_record`(`PK_DETAIL_RECORD`,`FK_SCHOOL_RECORD`,`FK_SUBJECT`,`FK_GRADE`,`C_TEACHER_REMARK`) values (610,61,1,'8','Em học rất tốt'),(611,61,2,'9','Em học rất tốt'),(612,61,3,'9','Em học rất tốt'),(613,61,4,'8','Em học rất tốt'),(614,61,5,'7','Cần cố gắng hơn'),(615,61,6,'9','Em học rất tốt'),(616,61,7,'9','Em học rất tốt'),(617,62,1,'9','Em học rất tốt'),(618,62,2,'9','Em học rất tốt'),(619,62,3,'9','Em học rất tốt'),(620,62,4,'9','Em học rất tốt'),(621,62,5,'9','Em học rất tốt'),(622,62,6,'8','Em học rất tốt'),(623,62,7,'8','Em học rất tốt'),(624,63,1,'9','Em học rất tốt'),(625,63,2,'10','Em học rất tốt'),(626,63,3,'9','Em học rất tốt'),(627,63,4,'8','Em học rất tốt'),(628,63,5,'9','Em học rất tốt'),(629,63,6,'9','Em học rất tốt'),(630,63,7,'9','Em học rất tốt'),(631,64,1,'5','Em học kém môn Toán, cần cố gắng hơn'),(632,64,2,'6','Em học kém môn Tiếng Việt, cần cố gắng hơn'),(633,64,3,'9','Em học rất tốt'),(634,64,4,'9','Em học rất tốt'),(635,64,5,'8','Em học rất tốt'),(636,64,6,'9','Em học rất tốt'),(637,64,7,'9','Em học rất tốt'),(638,65,1,'8','Em học rất tốt '),(639,65,2,'8','Em học rất tốt'),(640,65,3,'9','Em học rất tốt'),(641,65,4,'8','Em học rất tốt'),(642,65,5,'8','Em học rất tốt'),(643,65,6,'9','Em học rất tốt'),(644,65,7,'9','Em học rất tốt'),(645,66,1,'8','Em học tốt'),(646,66,2,'9','Em học tốt'),(647,66,3,'9','Em học tốt'),(648,66,4,'9','Em học tốt'),(649,66,5,'9','Em học tốt'),(650,66,6,'8','Chú ý phát triển thể lực hơn'),(651,66,7,'9','Em học tót, có năng khiếu về ngoại ngữ'),(652,67,1,'9','Em học tốt môn học'),(653,67,2,'9','Em học tốt môn học'),(654,67,3,'9','Em học tốt môn học'),(655,67,4,'8','Em học tốt môn học'),(656,67,5,'9','Em học tốt môn học'),(657,67,6,'8','Em học tốt môn học'),(658,67,7,'9','Em học tốt môn học'),(659,68,1,'9','Em học  rất tốt'),(660,68,2,'10','Em học  rất tốt'),(661,68,3,'9','Em học  rất tốt'),(662,68,4,'8','Em học  rất tốt'),(663,68,5,'9','Em học  rất tốt'),(664,68,6,'9','Em học  rất tốt'),(665,68,7,'8','Em học  rất tốt'),(666,69,1,'8','Em học khá'),(667,69,2,'8','Em học khá'),(668,69,3,'9','Em học khá'),(669,69,4,'9','Em học khá'),(670,69,5,'9','Em học khá'),(671,69,6,'9','Em học khá'),(672,69,7,'8','Em học khá'),(673,70,1,'8','Em tiếp thu khá môn học'),(674,70,2,'8','Em tiếp thu khá môn học'),(675,70,3,'9','Em tiếp thu khá môn học'),(676,70,4,'8','Em tiếp thu khá môn học'),(677,70,5,'9','Em tiếp thu khá môn học'),(678,70,6,'8','Em tiếp thu khá môn học'),(679,70,7,'8','Em tiếp thu khá môn học');

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
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;

/*Data for the table `t_private_message` */

insert  into `t_private_message`(`PK_MESSAGE`,`FK_THREAD`,`C_CONTENT`,`FK_SENDING_USER`,`C_SENT_DATE`) values (51,29,'&lt;p&gt;123123&lt;/p&gt;\r\n',52,'2015-05-12 12:43:47');

/*Table structure for table `t_private_message_read_state` */

DROP TABLE IF EXISTS `t_private_message_read_state`;

CREATE TABLE `t_private_message_read_state` (
  `FK_MESSAGE` int(10) unsigned DEFAULT NULL,
  `FK_USER` int(10) unsigned DEFAULT NULL,
  `C_READ_DATE` datetime DEFAULT NULL,
  `C_READ_STATE` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `t_private_message_read_state` */

insert  into `t_private_message_read_state`(`FK_MESSAGE`,`FK_USER`,`C_READ_DATE`,`C_READ_STATE`) values (51,52,NULL,1),(51,4,NULL,0);

/*Table structure for table `t_private_thread` */

DROP TABLE IF EXISTS `t_private_thread`;

CREATE TABLE `t_private_thread` (
  `PK_THREAD` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `C_TITLE` text,
  `C_CREATED_DATE` datetime DEFAULT NULL,
  `C_CREATED_USER` int(10) unsigned DEFAULT NULL,
  `C_LATEST_DATE` datetime DEFAULT NULL,
  PRIMARY KEY (`PK_THREAD`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

/*Data for the table `t_private_thread` */

insert  into `t_private_thread`(`PK_THREAD`,`C_TITLE`,`C_CREATED_DATE`,`C_CREATED_USER`,`C_LATEST_DATE`) values (29,'123','2015-05-12 12:43:47',52,'2015-05-12 12:43:47');

/*Table structure for table `t_private_thread_participant` */

DROP TABLE IF EXISTS `t_private_thread_participant`;

CREATE TABLE `t_private_thread_participant` (
  `FK_THREAD` int(10) unsigned DEFAULT NULL,
  `FK_USER` int(10) unsigned DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `t_private_thread_participant` */

insert  into `t_private_thread_participant`(`FK_THREAD`,`FK_USER`) values (29,52),(29,4);

/*Table structure for table `t_public_post` */

DROP TABLE IF EXISTS `t_public_post`;

CREATE TABLE `t_public_post` (
  `PK_POST` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `FK_TOPIC` int(11) DEFAULT NULL,
  `C_CONTENT` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `C_POSTED_DATE` datetime DEFAULT NULL,
  `C_POSTED_USER` int(11) DEFAULT NULL,
  PRIMARY KEY (`PK_POST`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

/*Data for the table `t_public_post` */

insert  into `t_public_post`(`PK_POST`,`FK_TOPIC`,`C_CONTENT`,`C_POSTED_DATE`,`C_POSTED_USER`) values (30,14,'&lt;p&gt;3123123123&lt;/p&gt;\r\n','2015-05-12 12:43:09',4);

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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

/*Data for the table `t_public_topic` */

insert  into `t_public_topic`(`PK_TOPIC`,`FK_CLASS`,`FK_CATEGORY`,`C_TITLE`,`C_CREATED_DATE`,`C_LATEST_DATE`,`C_CREATER_USER`,`C_LAST_USER`,`C_POST_NUMBER`,`C_VIEW_NUMBER`) values (14,3,1,'12312','2015-05-12 12:43:09','2015-05-12 12:43:09',4,4,1,1);

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
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `t_school_record` */

insert  into `t_school_record`(`PK_SCHOOL_RECORD`,`C_STUDENT_CODE`,`C_SEMESTER`,`C_YEAR`,`C_TITLE`,`C_TEACHER_CODE`,`C_REMARK_FINAL`,`C_CLASS`,`C_TEACHER_NAME`) values (61,'HS10011',1,'2010-2011',' Học sinh Giỏi','GV8503','Em học đều các môn, ý thức rèn luyện kỷ luật tốt','1C','Nguyễn Minh Thảo'),(62,'HS10012',1,'2010-2011',' Học sinh Giỏi','GV8503','Em học đều các môn, ý thức rèn luyện kỷ luật tốt','1C','Nguyễn Minh Thảo'),(63,'HS10013',1,'2010-2011',' Học sinh Khá','GV8503','Em học đều các môn, ý thức rèn luyện kỷ luật tốt','1C','Nguyễn Minh Thảo'),(64,'HS10014',1,'2010-2011',' Học sinh Trung Bình','GV8503','Cần cố gắng hơn trong học tập','1C','Nguyễn Minh Thảo'),(65,'HS10015',1,'2010-2011',' Học sinh Khá','GV8503','Em học khá các môn','1C','Nguyễn Minh Thảo'),(66,'HS10011',2,'2010-2011',' Học sinh Giỏi','GV8503','Em hoàn thành tốt các nội dung môn học, ý thức rèn luyên tốt','1C','Nguyễn Minh Thảo'),(67,'HS10012',2,'2010-2011',' Học sinh Giỏi','GV8503','Em hoàn thành tốt các nội dung môn học,ý thức rèn luyên tốt','1C','Nguyễn Minh Thảo'),(68,'HS10013',2,'2010-2011',' Học sinh Giỏi','GV8503','Em hoàn thành tốt các nội dung môn học,ý thức rèn luyên tốt','1C','Nguyễn Minh Thảo'),(69,'HS10014',2,'2010-2011',' Học sinh Tiên Tiến','GV8503','Em hoàn thành tốt các nội dung môn học,ý thức rèn luyên tốt','1C','Nguyễn Minh Thảo'),(70,'HS10015',2,'2010-2011',' Học sinh Tiên Tiến','GV8503','Em hoàn thành tốt các nội dung môn học,ý thức rèn luyên tốt','1C','Nguyễn Minh Thảo');

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
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8;

/*Data for the table `t_user` */

insert  into `t_user`(`PK_USER`,`C_NAME`,`C_CODE`,`C_PHONE`,`C_ADDRESS`,`C_EMAIL`,`FK_CLASS`,`C_LOGIN_NAME`,`C_PASSWORD`,`FK_GROUP`,`FK_GRADE`,`C_FATHER_NAME`,`C_MOTHER_NAME`,`C_STUDENT_BIRTH`,`C_DELETED`,`C_POST_NUMBER`) values (1,'Quản trị hệ thống',NULL,NULL,NULL,NULL,NULL,'admin','e10adc3949ba59abbe56e057f20f883e',1,NULL,NULL,NULL,NULL,0,NULL),(2,'Lưu Hải Yên','GV8501','0988715937','Hà Nội','gv01@gmail.com','1','luuhaiyen04061985','e10adc3949ba59abbe56e057f20f883e',3,1,NULL,NULL,'1985-06-04',0,NULL),(3,'Nguyễn Thị Hải Yến','GV8502','0937564837','Hà Nội','gv02@gmail.com','2','nguyenthihaiyen04061985','e10adc3949ba59abbe56e057f20f883e',3,1,NULL,NULL,'1985-06-04',0,NULL),(4,'Nguyễn Minh Thảo','GV8503','09846737562','Hà Nội','gv03@gmail.com','3','nguyenminhthao04061985','e10adc3949ba59abbe56e057f20f883e',3,1,NULL,NULL,'1985-06-04',0,1),(5,'Trần Ánh Tuyết','GV8504','0946352745','Hà Nội','gv04@gmail.com','4','trananhtuyet04061985','e10adc3949ba59abbe56e057f20f883e',3,2,NULL,NULL,'1985-06-04',0,NULL),(6,'Nguyễn Xuân Thủy','GV8505','0947362548','Hà Nội','gv05@gmail.com','5','nguyenxuanthuy04061985','e10adc3949ba59abbe56e057f20f883e',3,2,NULL,NULL,'1985-06-04',0,NULL),(7,'Vũ Thị Tâm','GV8506','0947364726','Hà Nội','gv06@gmail.com','6','vuthitam04061985','e10adc3949ba59abbe56e057f20f883e',3,2,NULL,NULL,'1985-06-04',0,NULL),(8,'Vũ Thị Oanh','GV8507','0184746278','Hà Nội','gv07@gmail.com','7','vuthioanh04061985','e10adc3949ba59abbe56e057f20f883e',3,3,NULL,NULL,'1985-06-04',0,NULL),(9,'Trần Thị Ngân','GV8508','0956473625','Hà Nội','gv08@gmail.com','8','tranthingan04061985','e10adc3949ba59abbe56e057f20f883e',3,3,NULL,NULL,'1985-06-04',0,NULL),(10,'Dương Ngọc Mai','GV8509','09857364523','Hà Nội','gv09@gmail.com','9','duongngocmai04061985','e10adc3949ba59abbe56e057f20f883e',3,3,NULL,NULL,'1985-06-04',0,NULL),(11,'Lương Thị Thu Hà','GV8510','0988574657','Hà Nội','gv10@gmail.com','10','luongthithuha04061985','e10adc3949ba59abbe56e057f20f883e',3,4,NULL,NULL,'1985-06-04',0,NULL),(12,'Nguyễn Thị Hồng Hạnh','GV8511','095847563','Hà Nội','gv11@gmail.com','11','nguyenthihonghanh04061985','e10adc3949ba59abbe56e057f20f883e',3,4,NULL,NULL,'1985-06-04',0,NULL),(13,'Nguyễn Tú Anh','GV8512','0947838462','Hà Nội','gv12@gmail.com','12','nguyentuanh04061985','e10adc3949ba59abbe56e057f20f883e',3,4,NULL,NULL,'1985-06-04',0,NULL),(14,'Nguyễn Thu Trang','GV8513','0948573623','Hà Nội','gv13@gmail.com','13','nguyenthutrang04061985','e10adc3949ba59abbe56e057f20f883e',3,5,NULL,NULL,'1985-06-04',0,NULL),(15,'Phạm Thị Tươi','GV8514','0968573787','Hà Nội','gv14@gmail.com','14','phamthituoi04061985','e10adc3949ba59abbe56e057f20f883e',3,5,NULL,NULL,'1985-06-04',0,NULL),(16,'Nguyễn Thị Thảo','GV8515','09474628364','Hà Nội','gv15@gmail.com','15','nguyenthithao04061985','e10adc3949ba59abbe56e057f20f883e',3,5,NULL,NULL,'1985-06-04',0,NULL),(42,'Phạm Minh Tuấn','HS10001','(+84)9746284','Bà Triệu, Hoàn Kiếm,Hà Nội','nxb1208@gmail.com','1','phamminhtuan01012003','e10adc3949ba59abbe56e057f20f883e',4,1,'Nguyễn Xuân Bách','Phạm Thu Hương ','2003-01-01',0,0),(43,'Nguyễn Thành Trung','HS10002','(+84)9746284','Tràng Tiền, Hoàn Kiếm,Hà Nội','nvb1398@gmail.com','1','nguyenthanhtrung02012003','e10adc3949ba59abbe56e057f20f883e',4,1,'Nguyễn Văn Bằng','Phạm Thúy Hằng','2003-01-02',0,0),(44,'Lê Xuân Quỳnh','HS10003','(+84)9746284','Chùa Bộc,Đống Đa,Hà Nội','ltc1408@gmail.com','1','lexuanquynh03012003','e10adc3949ba59abbe56e057f20f883e',4,1,'Lê Tiến Châu','Vũ Thị Hiền','2003-01-03',0,0),(45,'Hoàng Thị Vân','HS10004','(+84)9746284','Lò Đúc, Hoàn Kiếm,Hà Nội','ttđ1508@gmail.com','1','hoangthivan04012003','e10adc3949ba59abbe56e057f20f883e',4,1,'Trần Tiến Đức','Trương Thị Lệ Khanh','2003-01-04',0,0),(46,'Nguyễn Quỳnh Chi','HS10005','(+84)9746284','Đội Cấn, Đống Đa,Hà Nội','pvd1608@gmail.com','1','nguyenquynhchi05012003','e10adc3949ba59abbe56e057f20f883e',4,1,'Phạm Văn Dũng','Nguyễn Hoàng Yến','2003-01-05',0,0),(47,'Phạm Bích Nga','HS10006','(+84)9746284','Lương Thế Vinh, Thanh Xuân,Hà Nội','ptđ1708@gmail.com','2','phambichnga06012003','e10adc3949ba59abbe56e057f20f883e',4,1,'Phạm Tiến Đức','Chu Thị Bình','2003-01-06',0,0),(48,'Phạm Minh Sơn','HS10007','(+84)9746284','Khuất Duy Tiến, Thanh Xuân,Hà Nội','tqd1808@gmail.com','2','phamminhson07012003','e10adc3949ba59abbe56e057f20f883e',4,1,'Tạ Quang Dũng','Phan Thi Hương','2003-01-07',0,0),(49,'Tạ Thu Hiền','HS10008','(+84)9746284','gò Đống Đa,Đống Đa,Hà Nội','lmg1908@gmail.com','2','tathuhien08012003','e10adc3949ba59abbe56e057f20f883e',4,1,'Lê Minh Giang','Nguyễn Thị Kim Xuân','2003-01-08',0,0),(50,'Nguyễn Hoàng Lam','HS10009','(+84)9746284','Khương Trung, Thanh Xuân,Hà Nội','hmg110008@gmail.com','2','nguyenhoanglam09012003','e10adc3949ba59abbe56e057f20f883e',4,1,'Hoàng Minh Giám','Nguyễn Thị Như Loan','2003-01-09',0,0),(51,'Phạm Ngoc Long','HS10010','(+84)9746284','Văn Quán, Hà Đông, Hà Nội','hvt111008@gmail.com','2','phamngoclong10012003','e10adc3949ba59abbe56e057f20f883e',4,1,'Hoàng Văn Thái','Đặng Ngọc Lan','2003-01-10',0,0),(52,'Nguyễn Thúy Quỳnh','HS10011','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','lth112008@gmail.com','3','nguyenthuyquynh11012003','e10adc3949ba59abbe56e057f20f883e',4,1,'Lý Trần Hiệp','Phùng Minh Nguyệt','2003-01-11',0,0),(53,'Phạm Văn Mách','HS10012','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','cđh113008@gmail.com','3','phamvanmach12012003','e10adc3949ba59abbe56e057f20f883e',4,1,'Chu Đình Hào','Đặng Thị Hoàng Yến','2003-01-12',0,0),(54,'Nguyễn Quỳnh Trang','HS10013','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','lth114008@gmail.com','3','nguyenquynhtrang13012003','e10adc3949ba59abbe56e057f20f883e',4,1,'Lý Trần Hiệp','Nguyễn Thị Diệu Hiền','2003-01-13',0,0),(55,'Đào Tấn Tùng','HS10014','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','nmh115008@gmail.com','3','daotantung14012003','e10adc3949ba59abbe56e057f20f883e',4,1,'Nguyễn Minh Hoàng','Phạm Thị Lê','2003-01-14',0,0),(56,'Nguyễn Tự Nguyện','HS10015','(+84)9746284','Tôn Đức Thắng,Đống Đa,Hà Nội','nmh115008@gmail.com','3','nguyentunguyen15012003','e10adc3949ba59abbe56e057f20f883e',4,1,'Nguyễn Minh Hoàng','Phạm Thị Lê','2003-01-15',0,0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
