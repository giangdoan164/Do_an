/*
SQLyog Ultimate v10.00 Beta1
MySQL - 5.5.29 : Database - mvc
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `t_class` */

DROP TABLE IF EXISTS `t_class`;

CREATE TABLE `t_class` (
  `PK_CLASS` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `C_CLASS_NAME` varchar(2) CHARACTER SET utf8 DEFAULT NULL,
  `FK_GRADE` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`PK_CLASS`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `t_class` */

insert  into `t_class`(`PK_CLASS`,`C_CLASS_NAME`,`FK_GRADE`) values (1,'1B',1),(2,'1A',1),(3,'1C',1),(4,'1D',1),(5,'1E',1),(6,'1F',1),(7,'2A',2),(8,'2B',2),(9,'2C',2),(10,'2D',2),(11,'2E',2),(12,'2F',2);

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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

/*Data for the table `t_teacher` */

insert  into `t_teacher`(`PK_USER`,`C_NAME`,`C_PHONE`,`C_ADDRESS`,`C_EMAIL`,`FK_CLASS`,`C_LOGIN_NAME`,`C_PASSWORD`,`FK_GROUP`,`FK_GRADE`) values (1,'Đỗ Tuấn Anh','0987365736',NULL,'dta4323@gmail.com','1',NULL,NULL,NULL,1),(2,'Đoàn Văn Giang','0988736421',NULL,'dvg8678@gmail.com','2',NULL,NULL,NULL,1),(3,'Nguyễn Thị Thanh Nga','0985746374',NULL,'nttn8593@gmail.com','3',NULL,NULL,NULL,1),(4,'Phạm Văn Hanh','093748274',NULL,'pvh9583@gmail.com','4',NULL,NULL,NULL,1),(5,'Nguyễn Thanh Nhàn','01668374957',NULL,'ntn9485@gmail.com','5',NULL,NULL,NULL,1),(14,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1);

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
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;