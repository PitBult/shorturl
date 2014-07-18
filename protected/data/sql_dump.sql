/*
SQLyog Ultimate v11.33 (32 bit)
MySQL - 5.5.16 : Database - shorturl
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`shorturl` /*!40100 DEFAULT CHARACTER SET utf8 */;

/*Table structure for table `tbl_urls` */

DROP TABLE IF EXISTS `tbl_urls`;

CREATE TABLE `tbl_urls` (
  `url_id` int(11) NOT NULL AUTO_INCREMENT,
  `url_long_url` varchar(1000) NOT NULL,
  `url_short_code` varchar(50) NOT NULL,
  `url_create_date` datetime DEFAULT NULL,
  `url_create_ip` varchar(50) DEFAULT NULL,
  `url_counter` int(11) DEFAULT '0',
  PRIMARY KEY (`url_id`),
  UNIQUE KEY `UNIQUE` (`url_short_code`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_urls` */

insert  into `tbl_urls`(`url_id`,`url_long_url`,`url_short_code`,`url_create_date`,`url_create_ip`,`url_counter`) values (6,'http://www.snippetit.com/2009/04/php-short-url-algorithm-implementation/123','8a03e703','2014-07-18 10:46:07','127.0.0.1',0),(7,'http://www.snippetit.com/2009/04/php-short-url-algorithm-implementation/1234','7f2e9d4a','2014-07-18 10:46:10','127.0.0.1',2),(8,'http://www.snippetit.com/2009/04/php-short-url-algorithm-implementation/','e3a8c1db','2014-07-18 10:46:14','127.0.0.1',3),(9,'http://stackoverflow.com/questions/959957/php-short-hash-like-url-shortening-websites','b13353a1','2014-07-18 10:54:05','127.0.0.1',0),(10,'http://www.sitepoint.com/building-your-own-url-shortener/','c91e53e3','2014-07-18 11:15:49','127.0.0.1',0),(11,'http://snook.ca/archives/php/url-shortener','11b0d3dc','2014-07-18 11:28:13','127.0.0.1',0),(12,'http://snook.ca/archives/php/url-shortene','8f3e1339','2014-07-18 11:32:05','127.0.0.1',0),(13,'http://shorturl2.md/e3a8c1db','4d91c01f','2014-07-18 11:41:31','127.0.0.1',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
