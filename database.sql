/*
SQLyog Community v11.52 (64 bit)
MySQL - 5.5.38-0ubuntu0.14.04.1 : Database - mapster
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`mapster` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `mapster`;

/*Table structure for table `entities` */

DROP TABLE IF EXISTS `entities`;

CREATE TABLE `entities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `plural` varchar(50) NOT NULL,
  `table_name` varchar(50) NOT NULL,
  `foreign_id` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  UNIQUE KEY `table_name` (`table_name`),
  UNIQUE KEY `foreign_id` (`foreign_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `entities` */

insert  into `entities`(`id`,`name`,`plural`,`table_name`,`foreign_id`) values (1,'Universe','Universes','universes','universe_id'),(2,'Media','Media','media','media_id');

/*Table structure for table `entity_field_types` */

DROP TABLE IF EXISTS `entity_field_types`;

CREATE TABLE `entity_field_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `entity_field_types` */

insert  into `entity_field_types`(`id`,`name`) values (1,'name'),(2,'description'),(3,'image'),(4,'link'),(5,'abbreviation');

/*Table structure for table `entity_fields` */

DROP TABLE IF EXISTS `entity_fields`;

CREATE TABLE `entity_fields` (
  `entity_id` int(11) NOT NULL,
  `entity_field_type_id` int(11) NOT NULL,
  `sequence` int(11) DEFAULT '0',
  PRIMARY KEY (`entity_id`,`entity_field_type_id`),
  KEY `entity_field_type_id` (`entity_field_type_id`),
  CONSTRAINT `entity_fields_ibfk_1` FOREIGN KEY (`entity_field_type_id`) REFERENCES `entity_field_types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `entity_fields_ibfk_2` FOREIGN KEY (`entity_id`) REFERENCES `entities` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `entity_fields` */

insert  into `entity_fields`(`entity_id`,`entity_field_type_id`,`sequence`) values (1,1,0),(1,2,2),(1,3,3),(1,4,4),(1,5,1);

/*Table structure for table `universe_versions` */

DROP TABLE IF EXISTS `universe_versions`;

CREATE TABLE `universe_versions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `abbreviation` char(10) DEFAULT NULL,
  `description` text,
  `image` text,
  `link` text,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `version_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_universe_versions_universes` (`version_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `universe_versions` */

/*Table structure for table `universes` */

DROP TABLE IF EXISTS `universes`;

CREATE TABLE `universes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `abbreviation` char(10) DEFAULT NULL,
  `description` text,
  `image` text,
  `link` text,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `universes` */

insert  into `universes`(`id`,`name`,`abbreviation`,`description`,`image`,`link`,`created`) values (1,'The Wheel of Time','WoT','The Wheel of Time is a series of epic fantasy novels written by American author James Oliver Rigney, Jr., under the pen name Robert Jordan. Originally planned as a six-book series, The Wheel of Time now spans fourteen volumes, in addition to a prequel novel and a companion book. Jordan began writing the first volume, The Eye of the World, in 1984 and it was published in January 1990.',NULL,'http://wot.wikia.com/','2014-08-30 14:57:14'),(2,'The Lord of the Rings','LotR','The Lord of the Rings is an epic high fantasy novel written by English philologist and University of Oxford professor J. R. R. Tolkien. The story began as a sequel to Tolkien\'s 1937 children\'s fantasy novel The Hobbit, but eventually developed into a much larger work. It was written in stages between 1937 and 1949, much of it during World War II. It is the third best-selling novel ever written, with over 150 million copies sold.',NULL,'http://lotr.wikia.com','2014-08-30 14:57:14'),(3,'Game of Thrones','GoT','Game of Thrones is a television series produced by HBO based on the Song of Ice and Fire novels written by George R.R. Martin, debuting in April 2011. This wiki is specifically based on the television series and spoilers from the novels are not permitted.',NULL,'http://gameofthrones.wikia.com/','2014-08-30 15:22:08');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
