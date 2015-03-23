/*
SQLyog Enterprise - MySQL GUI v8.12 
MySQL - 5.5.36 : Database - mvc
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`mvc` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `mvc`;

/*Table structure for table `t_class` */

DROP TABLE IF EXISTS `t_class`;

CREATE TABLE `t_class` (
  `PK_CLASS` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `C_CLASS_NAME` varchar(2) CHARACTER SET utf8 DEFAULT NULL,
  `FK_GRADE` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`PK_CLASS`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `t_class` */

insert  into `t_class`(`PK_CLASS`,`C_CLASS_NAME`,`FK_GRADE`) values (2,'1A',1),(3,'1C',1),(4,'1D',1),(5,'1E',1),(6,'1F',1),(7,'2A',2),(8,'2B',2),(9,'2C',2),(10,'2D',2),(11,'2E',2),(12,'2F',2),(13,'1T',1);

/*Table structure for table `t_grade` */

DROP TABLE IF EXISTS `t_grade`;

CREATE TABLE `t_grade` (
  `PK_GRADE` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `C_GRADE_NAME` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`PK_GRADE`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `t_grade` */

insert  into `t_grade`(`PK_GRADE`,`C_GRADE_NAME`) values (1,'Khối 1'),(2,'Khối 2'),(3,'Khối 3'),(4,'Khối 4'),(5,'Khối 5');

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

/*Table structure for table `t_teacher` */

DROP TABLE IF EXISTS `t_teacher`;

CREATE TABLE `t_teacher` (
  `PK_USER` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `C_NAME` varchar(255) DEFAULT NULL,
  `C_PHONE` varchar(12) DEFAULT NULL,
  `C_ADDRESS` text,
  `C_EMAIL` varchar(20) DEFAULT NULL,
  `FK_CLASS` varchar(2) DEFAULT NULL,
  `C_LOGIN_NAME` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `C_PASSWORD` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `FK_GROUP` int(11) DEFAULT NULL,
  `FK_GRADE` int(11) DEFAULT NULL,
  PRIMARY KEY (`PK_USER`)
) ENGINE=InnoDB AUTO_INCREMENT=682 DEFAULT CHARSET=utf8;

/*Data for the table `t_teacher` */

insert  into `t_teacher`(`PK_USER`,`C_NAME`,`C_PHONE`,`C_ADDRESS`,`C_EMAIL`,`FK_CLASS`,`C_LOGIN_NAME`,`C_PASSWORD`,`FK_GROUP`,`FK_GRADE`) values (1,'Đỗ Tuấn Anh','0987365736','Hà Nội','dta4323@gmail.com','2',NULL,NULL,3,1),(17,'giang','','','','2',NULL,NULL,3,1),(667,'Nghĩa','','','','2',NULL,NULL,3,1),(668,'Vữ','','','','4',NULL,NULL,3,2),(669,'Vữ',NULL,NULL,NULL,'2',NULL,NULL,NULL,1),(670,'Vữ',NULL,NULL,NULL,'2',NULL,NULL,NULL,1),(671,'Vữ',NULL,NULL,NULL,'2',NULL,NULL,NULL,1),(672,'Vữ',NULL,NULL,NULL,'2',NULL,NULL,NULL,1),(673,'Vữ',NULL,NULL,NULL,'2',NULL,NULL,NULL,1),(674,'Vữ',NULL,NULL,NULL,'2',NULL,NULL,NULL,1),(675,'Vữ',NULL,NULL,NULL,'2',NULL,NULL,NULL,1),(676,'Vữ',NULL,NULL,NULL,'2',NULL,NULL,NULL,1),(677,'Vữ',NULL,NULL,NULL,'2',NULL,NULL,NULL,1),(678,'Vữ',NULL,NULL,NULL,'2',NULL,NULL,NULL,1),(679,'Vữ',NULL,NULL,NULL,'2',NULL,NULL,NULL,1),(680,'Vữ',NULL,NULL,NULL,'2',NULL,NULL,NULL,1),(681,NULL,NULL,NULL,NULL,'2',NULL,NULL,NULL,NULL);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(25) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id`,`login`,`password`) values (6,'giang','123456'),(7,'tuan','1234565'),(8,'nghia','1234556'),(11,'admin','123456');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
