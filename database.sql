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

/*Table structure for table `chapter_versions` */

DROP TABLE IF EXISTS `chapter_versions`;

CREATE TABLE `chapter_versions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  `image` text,
  `link` text,
  `sequence` int(11) DEFAULT NULL,
  `media_id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `chapter_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `media_id` (`media_id`),
  KEY `chapter_id` (`chapter_id`),
  CONSTRAINT `chapter_versions_ibfk_1` FOREIGN KEY (`media_id`) REFERENCES `media` (`id`),
  CONSTRAINT `chapter_versions_ibfk_2` FOREIGN KEY (`chapter_id`) REFERENCES `chapters` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8;

/*Data for the table `chapter_versions` */

insert  into `chapter_versions`(`id`,`name`,`description`,`image`,`link`,`sequence`,`media_id`,`created`,`chapter_id`) values (1,'Dragonmount','',NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Prologue',NULL,1,'2014-09-09 08:52:36',1),(2,'An Empty Road',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_1',NULL,1,'2014-09-09 08:55:03',2),(3,'Strangers',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_2',NULL,1,'2014-09-09 08:55:51',3),(4,'Dragonmount','',NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Prologue',NULL,1,'2014-09-09 08:59:19',1),(5,'Dragonmount','',NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Prologue',1,1,'2014-09-09 09:00:03',1),(6,'Dragonmount','',NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Prologue',1,1,'2014-09-09 09:00:12',1),(7,'Dragonmount','',NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Prologue',1,1,'2014-09-09 09:02:44',1),(8,'Dragonmount','',NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Prologue',1,1,'2014-09-09 09:03:16',1),(9,'Dragonmount','',NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Prologue',1,1,'2014-09-09 09:05:05',1),(10,'Dragonmount','',NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Prologue',0,1,'2014-09-09 09:05:10',1),(11,'An Empty Road',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_1',1,1,'2014-09-09 09:05:14',2),(12,'Strangers',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_2',2,1,'2014-09-09 09:05:17',3),(13,'The Peddler',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_3',3,1,'2014-09-09 09:13:45',4),(14,'The Gleeman',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_4',4,1,'2014-09-09 09:15:02',5),(15,'Winternight',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_5',5,1,'2014-09-09 09:15:39',6),(16,'The Westwood',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_6',6,1,'2014-09-09 09:15:54',7),(17,'Out of the Woods',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_7',7,1,'2014-09-09 09:16:05',8),(18,'A Place of Safety',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_8',8,1,'2014-09-09 09:16:18',9),(19,'Tellings of the Wheel',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_9',9,1,'2014-09-09 09:16:27',10),(20,'Leavetaking',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_10',10,1,'2014-09-09 09:16:37',11),(21,'The Road to Taren Ferry',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_11',11,1,'2014-09-09 09:16:49',12),(22,'Across the Taren',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_12',12,1,'2014-09-09 09:17:04',13),(23,'Choices',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_13',13,1,'2014-09-09 09:17:12',14),(24,'The Stag and Lion',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_14',14,1,'2014-09-09 09:17:20',15),(25,'Strangers and Friends',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_15',15,1,'2014-09-09 09:17:29',16),(26,'The Wisdom',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_16',16,1,'2014-09-09 09:17:37',17),(27,'Watchers and Hunters',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_17',17,1,'2014-09-09 09:19:29',18),(28,'The Caemlyn Road',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_18',18,1,'2014-09-09 09:19:38',19),(29,'Shadow\'s Waiting',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_19',19,1,'2014-09-09 09:19:46',20),(30,'Dust on the Wind',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_20',20,1,'2014-09-09 09:19:54',21),(31,'Listen to the Wind',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_21',21,1,'2014-09-09 09:20:02',22),(32,'A Path Chosen',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_22',22,1,'2014-09-09 10:17:19',23),(33,'Wolfbrother',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_23',23,1,'2014-09-09 10:17:26',24),(34,'Flight Down the Arinelle',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_24',24,1,'2014-09-09 10:17:37',25),(35,'The Traveling People',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_25',25,1,'2014-09-09 10:17:47',26),(36,'Whitebridge',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_26',26,1,'2014-09-09 10:17:57',27),(37,'Shelter from the Storm',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_27',27,1,'2014-09-09 10:18:06',28),(38,'Footprints in Air',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_28',28,1,'2014-09-09 10:18:17',29),(39,'Eyes Without Pity',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_29',29,1,'2014-09-09 10:18:25',30),(40,'Children of Shadow',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_30',30,1,'2014-09-09 10:18:36',31),(41,'Play for Your Supper',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_31',31,1,'2014-09-09 10:18:46',32),(42,'Four Kings in Shadow',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_32',32,1,'2014-09-09 10:18:53',33),(43,'The Dark Waits',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_33',33,1,'2014-09-09 10:19:02',34),(44,'The Last Village',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_34',34,1,'2014-09-09 10:19:09',35),(45,'Caemlyn',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_35',35,1,'2014-09-09 10:19:17',36),(46,'Web of the Pattern',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_36',36,1,'2014-09-09 10:19:24',37),(47,'The Long Chase',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_37',37,1,'2014-09-09 10:19:32',38),(48,'Rescue',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_38',38,1,'2014-09-09 10:19:40',39),(49,'Weaving of the Web',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_39',39,1,'2014-09-09 10:19:48',40),(50,'The Web Tightens',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_40',40,1,'2014-09-09 10:19:56',41),(51,'Old Friends and New Threats',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_41',41,1,'2014-09-09 10:20:04',42),(52,'Remembrance of Dreams',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_42',41,1,'2014-09-09 10:20:09',43),(53,'Remembrance of Dreams',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_42',42,1,'2014-09-09 10:20:25',43),(54,'Decisions and Apparitions',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_43',43,1,'2014-09-09 10:20:39',44),(55,'The Dark Along the Ways',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_44',44,1,'2014-09-09 10:20:47',45),(56,'What Follows in Shadow',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_45',45,1,'2014-09-09 10:20:53',46),(57,'Fal Dara',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_46',46,1,'2014-09-09 10:21:01',47),(58,'More Tales of the Wheel',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_47',47,1,'2014-09-09 10:21:07',48),(59,'The Blight',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_48',48,1,'2014-09-09 10:21:17',49),(60,'The Dark One Stirs',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_49',49,1,'2014-09-09 10:21:23',50),(61,'Meetings at the Eye',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_50',50,1,'2014-09-09 10:21:31',51),(62,'Against the Shadow',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_51',501,1,'2014-09-09 10:21:37',52),(63,'Against the Shadow',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_51',51,1,'2014-09-09 10:21:45',52),(64,'Neither Beginning Nor End',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_52',522,1,'2014-09-09 10:21:56',53),(65,'The Wheel Turns',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_53',53,1,'2014-09-09 10:22:04',54),(66,'Neither Beginning Nor End',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_52',52,1,'2014-09-09 10:22:09',53);

/*Table structure for table `chapters` */

DROP TABLE IF EXISTS `chapters`;

CREATE TABLE `chapters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  `image` text,
  `link` text,
  `sequence` int(11) DEFAULT NULL,
  `media_id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `media_id` (`media_id`),
  CONSTRAINT `chapters_ibfk_1` FOREIGN KEY (`media_id`) REFERENCES `media` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8;

/*Data for the table `chapters` */

insert  into `chapters`(`id`,`name`,`description`,`image`,`link`,`sequence`,`media_id`,`created`) values (1,'Dragonmount','',NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Prologue',0,1,'2014-09-09 08:52:36'),(2,'An Empty Road',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_1',1,1,'2014-09-09 08:55:03'),(3,'Strangers',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_2',2,1,'2014-09-09 08:55:51'),(4,'The Peddler',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_3',3,1,'2014-09-09 09:13:45'),(5,'The Gleeman',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_4',4,1,'2014-09-09 09:15:02'),(6,'Winternight',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_5',5,1,'2014-09-09 09:15:39'),(7,'The Westwood',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_6',6,1,'2014-09-09 09:15:54'),(8,'Out of the Woods',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_7',7,1,'2014-09-09 09:16:05'),(9,'A Place of Safety',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_8',8,1,'2014-09-09 09:16:18'),(10,'Tellings of the Wheel',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_9',9,1,'2014-09-09 09:16:27'),(11,'Leavetaking',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_10',10,1,'2014-09-09 09:16:37'),(12,'The Road to Taren Ferry',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_11',11,1,'2014-09-09 09:16:49'),(13,'Across the Taren',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_12',12,1,'2014-09-09 09:17:04'),(14,'Choices',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_13',13,1,'2014-09-09 09:17:12'),(15,'The Stag and Lion',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_14',14,1,'2014-09-09 09:17:20'),(16,'Strangers and Friends',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_15',15,1,'2014-09-09 09:17:28'),(17,'The Wisdom',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_16',16,1,'2014-09-09 09:17:37'),(18,'Watchers and Hunters',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_17',17,1,'2014-09-09 09:19:29'),(19,'The Caemlyn Road',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_18',18,1,'2014-09-09 09:19:38'),(20,'Shadow\'s Waiting',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_19',19,1,'2014-09-09 09:19:46'),(21,'Dust on the Wind',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_20',20,1,'2014-09-09 09:19:54'),(22,'Listen to the Wind',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_21',21,1,'2014-09-09 09:20:02'),(23,'A Path Chosen',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_22',22,1,'2014-09-09 10:17:19'),(24,'Wolfbrother',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_23',23,1,'2014-09-09 10:17:26'),(25,'Flight Down the Arinelle',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_24',24,1,'2014-09-09 10:17:37'),(26,'The Traveling People',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_25',25,1,'2014-09-09 10:17:47'),(27,'Whitebridge',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_26',26,1,'2014-09-09 10:17:57'),(28,'Shelter from the Storm',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_27',27,1,'2014-09-09 10:18:06'),(29,'Footprints in Air',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_28',28,1,'2014-09-09 10:18:17'),(30,'Eyes Without Pity',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_29',29,1,'2014-09-09 10:18:25'),(31,'Children of Shadow',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_30',30,1,'2014-09-09 10:18:36'),(32,'Play for Your Supper',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_31',31,1,'2014-09-09 10:18:46'),(33,'Four Kings in Shadow',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_32',32,1,'2014-09-09 10:18:53'),(34,'The Dark Waits',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_33',33,1,'2014-09-09 10:19:02'),(35,'The Last Village',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_34',34,1,'2014-09-09 10:19:09'),(36,'Caemlyn',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_35',35,1,'2014-09-09 10:19:17'),(37,'Web of the Pattern',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_36',36,1,'2014-09-09 10:19:24'),(38,'The Long Chase',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_37',37,1,'2014-09-09 10:19:32'),(39,'Rescue',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_38',38,1,'2014-09-09 10:19:40'),(40,'Weaving of the Web',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_39',39,1,'2014-09-09 10:19:48'),(41,'The Web Tightens',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_40',40,1,'2014-09-09 10:19:56'),(42,'Old Friends and New Threats',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_41',41,1,'2014-09-09 10:20:04'),(43,'Remembrance of Dreams',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_42',42,1,'2014-09-09 10:20:09'),(44,'Decisions and Apparitions',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_43',43,1,'2014-09-09 10:20:39'),(45,'The Dark Along the Ways',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_44',44,1,'2014-09-09 10:20:47'),(46,'What Follows in Shadow',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_45',45,1,'2014-09-09 10:20:53'),(47,'Fal Dara',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_46',46,1,'2014-09-09 10:21:01'),(48,'More Tales of the Wheel',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_47',47,1,'2014-09-09 10:21:07'),(49,'The Blight',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_48',48,1,'2014-09-09 10:21:17'),(50,'The Dark One Stirs',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_49',49,1,'2014-09-09 10:21:23'),(51,'Meetings at the Eye',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_50',50,1,'2014-09-09 10:21:31'),(52,'Against the Shadow',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_51',51,1,'2014-09-09 10:21:37'),(53,'Neither Beginning Nor End',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_52',52,1,'2014-09-09 10:21:56'),(54,'The Wheel Turns',NULL,NULL,'http://wot.wikia.com/wiki/The_Eye_of_the_World/Chapter_53',53,1,'2014-09-09 10:22:04');

/*Table structure for table `character_versions` */

DROP TABLE IF EXISTS `character_versions`;

CREATE TABLE `character_versions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  `image` text,
  `link` text,
  `universe_id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `character_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `universe_id` (`universe_id`),
  KEY `character_id` (`character_id`),
  CONSTRAINT `character_versions_ibfk_1` FOREIGN KEY (`universe_id`) REFERENCES `universes` (`id`),
  CONSTRAINT `character_versions_ibfk_2` FOREIGN KEY (`character_id`) REFERENCES `characters` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

/*Data for the table `character_versions` */

insert  into `character_versions`(`id`,`name`,`description`,`image`,`link`,`universe_id`,`created`,`character_id`) values (1,'Rand al\'Thor',NULL,'http://localhost/mapster-api/img/CharacterVersions/540e4b60bab61.jpeg','http://wot.wikia.com/wiki/Rand_al%27Thor',1,'2014-09-09 10:35:44',1),(2,'Perrin Aybara',NULL,'http://localhost/mapster-api/img/CharacterVersions/540e4b85a3fee.jpeg','http://wot.wikia.com/wiki/Perrin_Aybara',1,'2014-09-09 10:36:21',2),(3,'Matrim Cauthon',NULL,'http://localhost/mapster-api/img/CharacterVersions/540e4b9f17bd3.jpeg','http://wot.wikia.com/wiki/Matrim_Cauthon',1,'2014-09-09 10:36:47',3),(4,'Aviendha',NULL,'http://localhost/mapster-api/img/CharacterVersions/540e4bb80dd07.jpeg','http://wot.wikia.com/wiki/Aviendha',1,'2014-09-09 10:37:12',4),(5,'Elayne Trakand',NULL,'http://localhost/mapster-api/img/CharacterVersions/540e4bd1b91e6.jpeg','http://wot.wikia.com/wiki/Elayne_Trakand',1,'2014-09-09 10:37:37',5),(6,'Elmindreda Farshaw',NULL,'http://localhost/mapster-api/img/CharacterVersions/540e4bebedc70.jpeg','http://wot.wikia.com/wiki/Min_Farshaw',1,'2014-09-09 10:38:04',6),(7,'Zarine ni Bashere t\'Aybara',NULL,'http://localhost/mapster-api/img/CharacterVersions/540e4c05499a2.jpeg','http://wot.wikia.com/wiki/Faile_Bashere',1,'2014-09-09 10:38:29',7),(8,'el\'Nynaeve ti al\'Meara Mandragoran',NULL,'http://localhost/mapster-api/img/CharacterVersions/540e4c32c59af.jpeg','http://wot.wikia.com/wiki/Nynaeve_al%27Meara',1,'2014-09-09 10:39:14',8),(9,'Egwene al\'Vere',NULL,'http://localhost/mapster-api/img/CharacterVersions/540e4c4cb12ba.jpeg','http://wot.wikia.com/wiki/Egwene_al%27Vere',1,'2014-09-09 10:39:40',9);

/*Table structure for table `characters` */

DROP TABLE IF EXISTS `characters`;

CREATE TABLE `characters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  `image` text,
  `link` text,
  `universe_id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `universe_id` (`universe_id`),
  CONSTRAINT `characters_ibfk_1` FOREIGN KEY (`universe_id`) REFERENCES `universes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

/*Data for the table `characters` */

insert  into `characters`(`id`,`name`,`description`,`image`,`link`,`universe_id`,`created`) values (1,'Rand al\'Thor',NULL,'http://localhost/mapster-api/img/character/540e4b60a2e7f.jpeg','http://wot.wikia.com/wiki/Rand_al%27Thor',1,'2014-09-09 10:35:44'),(2,'Perrin Aybara',NULL,'http://localhost/mapster-api/img/character/540e4b858eef9.jpeg','http://wot.wikia.com/wiki/Perrin_Aybara',1,'2014-09-09 10:36:21'),(3,'Matrim Cauthon',NULL,'http://localhost/mapster-api/img/character/540e4b9f02e2f.jpeg','http://wot.wikia.com/wiki/Matrim_Cauthon',1,'2014-09-09 10:36:47'),(4,'Aviendha',NULL,'http://localhost/mapster-api/img/character/540e4bb7ee812.jpeg','http://wot.wikia.com/wiki/Aviendha',1,'2014-09-09 10:37:12'),(5,'Elayne Trakand',NULL,'http://localhost/mapster-api/img/character/540e4bd1a16b6.jpeg','http://wot.wikia.com/wiki/Elayne_Trakand',1,'2014-09-09 10:37:37'),(6,'Elmindreda Farshaw',NULL,'http://localhost/mapster-api/img/character/540e4bebd7793.jpeg','http://wot.wikia.com/wiki/Min_Farshaw',1,'2014-09-09 10:38:03'),(7,'Zarine ni Bashere t\'Aybara',NULL,'http://localhost/mapster-api/img/character/540e4c053365d.jpeg','http://wot.wikia.com/wiki/Faile_Bashere',1,'2014-09-09 10:38:29'),(8,'el\'Nynaeve ti al\'Meara Mandragoran',NULL,'http://localhost/mapster-api/img/character/540e4c32aefb9.jpeg','http://wot.wikia.com/wiki/Nynaeve_al%27Meara',1,'2014-09-09 10:39:14'),(9,'Egwene al\'Vere',NULL,'http://localhost/mapster-api/img/character/540e4c4c9ca66.jpeg','http://wot.wikia.com/wiki/Egwene_al%27Vere',1,'2014-09-09 10:39:40');

/*Table structure for table `map_versions` */

DROP TABLE IF EXISTS `map_versions`;

CREATE TABLE `map_versions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  `image` text,
  `link` text,
  `universe_id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `map_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `universe_id` (`universe_id`),
  KEY `map_id` (`map_id`),
  CONSTRAINT `map_versions_ibfk_1` FOREIGN KEY (`universe_id`) REFERENCES `universes` (`id`),
  CONSTRAINT `map_versions_ibfk_2` FOREIGN KEY (`map_id`) REFERENCES `maps` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `map_versions` */

insert  into `map_versions`(`id`,`name`,`description`,`image`,`link`,`universe_id`,`created`,`map_id`) values (1,'Westlands','The Westlands is one of several names given to the continent or subcontinent that stretches from the Aiel Waste to the Aryth Ocean, and from the Great Blight to the Sea of Storms. It forms the westernmost part of one large landmass that also incorporates the Aiel Waste and the land of Shara, as well as a number of offshore islands belonging to the Sea Folk.','http://localhost/mapster-api/img/MapVersions/540e4da1da109.jpeg','http://wot.wikia.com/wiki/Westlands',1,'2014-09-09 10:45:21',1),(2,'Westlands','The Westlands is one of several names given to the continent or subcontinent that stretches from the Aiel Waste to the Aryth Ocean, and from the Great Blight to the Sea of Storms. It forms the westernmost part of one large landmass that also incorporates the Aiel Waste and the land of Shara, as well as a number of offshore islands belonging to the Sea Folk.','http://localhost/mapster-api/img/MapVersions/540fe8d045718.jpg','http://wot.wikia.com/wiki/Westlands',1,'2014-09-10 15:59:44',1);

/*Table structure for table `maps` */

DROP TABLE IF EXISTS `maps`;

CREATE TABLE `maps` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  `image` text,
  `link` text,
  `universe_id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `universe_id` (`universe_id`),
  CONSTRAINT `maps_ibfk_1` FOREIGN KEY (`universe_id`) REFERENCES `universes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `maps` */

insert  into `maps`(`id`,`name`,`description`,`image`,`link`,`universe_id`,`created`) values (1,'Westlands','The Westlands is one of several names given to the continent or subcontinent that stretches from the Aiel Waste to the Aryth Ocean, and from the Great Blight to the Sea of Storms. It forms the westernmost part of one large landmass that also incorporates the Aiel Waste and the land of Shara, as well as a number of offshore islands belonging to the Sea Folk.','http://localhost/mapster-api/img/Map/540fe8d0aa33b.jpg','http://wot.wikia.com/wiki/Westlands',1,'2014-09-09 10:45:21');

/*Table structure for table `mapster_entities` */

DROP TABLE IF EXISTS `mapster_entities`;

CREATE TABLE `mapster_entities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `plural` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Data for the table `mapster_entities` */

insert  into `mapster_entities`(`id`,`name`,`plural`) values (1,'Universe','Universes'),(2,'Media','Media'),(3,'Chapter','Chapters'),(4,'Character','Characters'),(5,'Map','Maps'),(6,'Place','Places'),(7,'Place Type','Place Types');

/*Table structure for table `mapster_entity_field_types` */

DROP TABLE IF EXISTS `mapster_entity_field_types`;

CREATE TABLE `mapster_entity_field_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

/*Data for the table `mapster_entity_field_types` */

insert  into `mapster_entity_field_types`(`id`,`name`) values (1,'name'),(2,'description'),(3,'image'),(4,'link'),(5,'abbreviation'),(6,'universe'),(7,'media'),(8,'sequence'),(9,'map'),(10,'coordinates'),(11,'place-type');

/*Table structure for table `mapster_entity_fields` */

DROP TABLE IF EXISTS `mapster_entity_fields`;

CREATE TABLE `mapster_entity_fields` (
  `mapster_entity_id` int(11) NOT NULL,
  `mapster_entity_field_type_id` int(11) NOT NULL,
  `sequence` int(11) DEFAULT '0',
  PRIMARY KEY (`mapster_entity_id`,`mapster_entity_field_type_id`),
  KEY `mapster_entity_field_type_id` (`mapster_entity_field_type_id`),
  CONSTRAINT `mapster_entity_fields_ibfk_1` FOREIGN KEY (`mapster_entity_id`) REFERENCES `mapster_entity_field_types` (`id`),
  CONSTRAINT `mapster_entity_fields_ibfk_2` FOREIGN KEY (`mapster_entity_field_type_id`) REFERENCES `mapster_entity_field_types` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `mapster_entity_fields` */

insert  into `mapster_entity_fields`(`mapster_entity_id`,`mapster_entity_field_type_id`,`sequence`) values (1,1,0),(1,2,2),(1,3,3),(1,4,4),(1,5,1),(2,1,0),(2,2,2),(2,3,3),(2,4,4),(2,5,1),(2,6,5),(2,8,6),(3,1,0),(3,2,1),(3,3,2),(3,4,3),(3,7,4),(3,8,5),(4,1,0),(4,2,1),(4,3,2),(4,4,3),(4,6,4),(5,1,0),(5,2,1),(5,3,2),(5,4,3),(5,6,4),(6,1,0),(6,2,1),(6,3,2),(6,4,3),(6,9,5),(6,10,6),(6,11,4),(7,1,0),(7,2,1),(7,3,2),(7,4,3);

/*Table structure for table `media` */

DROP TABLE IF EXISTS `media`;

CREATE TABLE `media` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `abbreviation` char(10) DEFAULT NULL,
  `description` text,
  `image` text,
  `link` text,
  `sequence` int(11) NOT NULL DEFAULT '1',
  `universe_id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `universe_id` (`universe_id`),
  CONSTRAINT `media_ibfk_1` FOREIGN KEY (`universe_id`) REFERENCES `universes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

/*Data for the table `media` */

insert  into `media`(`id`,`name`,`abbreviation`,`description`,`image`,`link`,`sequence`,`universe_id`,`created`) values (1,'The Eye of the World','tEotW','The Eye of the World is the first book in The Wheel of Time series. It was published by Tor Books and released on January 15, 1990. It is 814 pages long. ','http://localhost/mapster-api/img/Media/5417bd961471c.jpg','http://wot.wikia.com/wiki/The_Eye_of_the_World',1,1,'2014-09-08 12:54:13'),(2,'The Great Hunt','TGH','The Great Hunt is the second book of The Wheel of Time series. It was published by Tor Books and released on November 15, 1990. It is 705 pages long.','http://localhost/mapster-api/img/Media/5417be06b3e70.png','http://wot.wikia.com/wiki/The_Great_Hunt',2,1,'2014-09-08 14:06:42'),(3,'The Dragon Reborn','tDR','The Dragon Reborn is the third book of the The Wheel of Time series. It was published by Tor Books and released on September 15, 1991. It is 699 pages long.','http://localhost/mapster-api/img/Media/5417be0f6fecf.jpg','http://wot.wikia.com/wiki/The_Dragon_Reborn',3,1,'2014-09-08 14:18:00'),(4,'The Shadow Rising','tSR','The Shadow Rising is the fourth book in the Wheel of Time series. It was published by Tor Books and released on September 15, 1992. It is 1004 pages long.','http://localhost/mapster-api/img/Media/5417be1853126.jpg','http://wot.wikia.com/wiki/The_Shadow_Rising',4,1,'2014-09-08 14:19:04'),(5,'The Fires of Heaven','tFoH','The Fires of Heaven is the fifth book in The Wheel of Time series. It was published by Tor Books and released on October 15, 1993. It is 992 pages long.','http://localhost/mapster-api/img/Media/5417be20af12a.jpg','http://wot.wikia.com/wiki/The_Fires_of_Heaven',5,1,'2014-09-08 16:20:34'),(6,'Lord of Chaos','LoC','Lord of Chaos is the sixth book in the main series of The Wheel of Time. It was published by Tor Books and was released on October 15, 1994. It is 1007 pages long.','http://localhost/mapster-api/img/Media/5417be2eebdf3.jpg','http://wot.wikia.com/wiki/Lord_of_Chaos',6,1,'2014-09-08 16:21:27'),(7,'A Crown of Swords','aCoS','A Crown of Swords is the seventh book of The Wheel of Time. It was published by Tor Books and released on May 15, 1996. It is 880 pages long.','http://localhost/mapster-api/img/Media/5417bed03cb31.jpg','http://wot.wikia.com/wiki/A_Crown_of_Swords',7,1,'2014-09-08 16:22:34'),(8,'The Path of Daggers','tPoD','The Path of Daggers is the eighth book of The Wheel of Time series. It was published by Tor Books and released on October 20, 1998. Upon its release, it immediately rose to the #1 position on the New York Times hardcover fiction bestseller list, making it the first Wheel of Time book to reach the #1 position on that list. It remained on the list for the next two months. It is 685 pages long, making it the shortest book in the main series.','http://localhost/mapster-api/img/Media/5417be7f8f3bd.jpg','http://wot.wikia.com/wiki/The_Path_of_Daggers',8,1,'2014-09-08 16:23:35'),(9,'Winter\'s Heart','WH','Winter\'s Heart is the ninth book of the Wheel of Time series. It was published by Tor Books and released on November 7, 2000. Upon its release, it immediately rose to the #1 position on the New York Times hardcover fiction bestseller list, making it the second Wheel of Time book to reach the #1 position on that list. It remained on the list for the next two months. It is 780 pages long.','http://localhost/mapster-api/img/Media/5417be86deb16.jpg','http://wot.wikia.com/wiki/Winter%27s_Heart',9,1,'2014-09-08 16:24:22'),(10,'Crossroads of Twilight','CoT','Crossroads of Twilight is the tenth book of The Wheel of Time series. It was published by Tor Books and released on January 7, 2003. Upon its release, it immediately rose to the #1 position on the New York Times hardcover fiction bestseller list, making it the third Wheel of Time book to reach the #1 position on that list. It remained on the list for the next three months. It is 846 pages long.','http://localhost/mapster-api/img/Media/5417be8ef1ce2.jpg','http://wot.wikia.com/wiki/Crossroads_of_Twilight',10,1,'2014-09-08 16:25:02'),(11,'Knife of Dreams','KoD','Knife of Dreams is the eleventh book in the The Wheel of Time series. It was published by Tor Books in the U.S. and Orbit in the UK, and released on October 11, 2005. It is 859 pages long.','http://localhost/mapster-api/img/Media/5417be9c72d4d.jpg','http://wot.wikia.com/wiki/Knife_of_Dreams',11,1,'2014-09-08 16:25:42'),(12,'The Gathering Storm','tGS','The Gathering Storm is the twelfth novel in the Wheel of Time sequence. It was originally thought that it would be under the super title A Memory of Light, but is now being marketed as \'Book Twelve\'. The Gathering Storm will be the first of three novels that will make up what was planned as A Memory of Light.','http://localhost/mapster-api/img/Media/5417bea4cf276.jpg','http://wot.wikia.com/wiki/The_Gathering_Storm',12,1,'2014-09-08 16:26:26'),(13,'Towers of Midnight','ToM','Towers of Midnight is the name of the thirteenth and penultimate volume of The Wheel of Time series. The working title Shifting Winds was adopted for a time, but the name was replaced at Brandon Sanderson\'s urging in September 2009.  It is 1264 pages long.','http://localhost/mapster-api/img/Media/5417beae436e9.png','http://wot.wikia.com/wiki/Towers_of_Midnight',13,1,'2014-09-08 16:27:43'),(14,'A Memory of Light','aMoL','A Memory of Light is the name given to the fourteenth and final novel of The Wheel of Time. It was due for publication in late 2012, however Tor later announced that the final volume would be released on January 8, 2013.','http://localhost/mapster-api/img/Media/5417beb5b339c.jpg','http://wot.wikia.com/wiki/A_Memory_of_Light',14,1,'2014-09-08 16:29:26');

/*Table structure for table `media_versions` */

DROP TABLE IF EXISTS `media_versions`;

CREATE TABLE `media_versions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `abbreviation` char(10) DEFAULT NULL,
  `description` text,
  `image` text,
  `link` text,
  `sequence` int(11) NOT NULL DEFAULT '1',
  `universe_id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `media_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `universe_id` (`universe_id`),
  KEY `media_id` (`media_id`),
  CONSTRAINT `media_versions_ibfk_1` FOREIGN KEY (`universe_id`) REFERENCES `universes` (`id`),
  CONSTRAINT `media_versions_ibfk_2` FOREIGN KEY (`media_id`) REFERENCES `media` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `media_versions` */

/*Table structure for table `place_type_versions` */

DROP TABLE IF EXISTS `place_type_versions`;

CREATE TABLE `place_type_versions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  `image` text,
  `link` text,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `place_type_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `place_type_id` (`place_type_id`),
  CONSTRAINT `place_type_versions_ibfk_1` FOREIGN KEY (`place_type_id`) REFERENCES `place_types` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `place_type_versions` */

/*Table structure for table `place_types` */

DROP TABLE IF EXISTS `place_types`;

CREATE TABLE `place_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  `image` text,
  `link` text,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `place_types` */

insert  into `place_types`(`id`,`name`,`description`,`image`,`link`,`created`) values (1,'Nation','',NULL,NULL,'2014-09-09 13:41:17'),(2,'City-State',NULL,NULL,NULL,'2014-09-09 14:00:20');

/*Table structure for table `place_versions` */

DROP TABLE IF EXISTS `place_versions`;

CREATE TABLE `place_versions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  `image` text,
  `link` text,
  `place_type_id` int(11) NOT NULL,
  `coordinates` text NOT NULL,
  `map_id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `place_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `map_id` (`map_id`),
  KEY `place_id` (`place_id`),
  KEY `place_type_id` (`place_type_id`),
  CONSTRAINT `place_versions_ibfk_1` FOREIGN KEY (`map_id`) REFERENCES `maps` (`id`),
  CONSTRAINT `place_versions_ibfk_2` FOREIGN KEY (`place_id`) REFERENCES `places` (`id`),
  CONSTRAINT `place_versions_ibfk_3` FOREIGN KEY (`place_type_id`) REFERENCES `place_types` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

/*Data for the table `place_versions` */

insert  into `place_versions`(`id`,`name`,`description`,`image`,`link`,`place_type_id`,`coordinates`,`map_id`,`created`,`place_id`) values (6,'Altara',NULL,'http://localhost/mapster-api/img/PlaceVersions/540fd917463bd.jpg','http://wot.wikia.com/wiki/Altara',1,'223 412,224 403,223 393,224 385,228 380,231 375,232 365,238 356,247 348,254 338,250 320,238 305,220 290,202 270,224 280,238 286,253 288,256 298,264 304,272 311,280 315,301 322,298 345,299 356,308 364,313 375,305 409,287 411,276 410,266 416,268 425,270 433,262 436,251 438,238 443,225 445,210 443,205 436,215 425,210 422',1,'2014-09-10 14:52:39',1),(7,'Altara','Altara is a country located in the south-central part of the Westlands.\n\nThe sign of Altara is two golden leopards on a field checked four-by-four in red and blue.','http://localhost/mapster-api/img/Place/540fd9178dcd3.jpg','http://wot.wikia.com/wiki/Altara',1,'223 412,224 403,223 393,224 385,228 380,231 375,232 365,238 356,247 348,254 338,250 320,238 305,220 290,202 270,224 280,238 286,253 288,256 298,264 304,272 311,280 315,301 322,298 345,299 356,308 364,313 375,305 409,287 411,276 410,266 416,268 425,270 433,262 436,251 438,238 443,225 445,210 443,205 436,215 425,210 422',1,'2014-09-10 14:53:33',1),(8,'Amadacia','Amadicia is a southern nation of the Westlands. It is the home of the Children of the Light.','http://localhost/mapster-api/img/place/540e911876b1a.jpg','http://wot.wikia.com/wiki/Amadicia',1,'123 undefined,222 407,211 401,203 401,191 400,179 399,168 396,155 379,169 368,180 358,190 347,192 333,200 330,209 338,214 348,218 353,227 353,232 361,232 370,228 381,223 385,223 396',1,'2014-09-10 14:55:08',6),(9,'Amadacia','Amadicia is a southern nation of the Westlands. It is the home of the Children of the Light.','http://localhost/mapster-api/img/place/540e911876b1a.jpg','http://wot.wikia.com/wiki/Amadicia',1,'222 407,211 401,203 401,191 400,179 399,168 396,155 379,169 368,180 358,190 347,192 333,200 330,209 338,214 348,218 353,227 353,232 361,232 370,228 381,223 385,223 396',1,'2014-09-10 14:56:23',6),(10,'Andor','Andor is a country in the heart of the Westlands. It is the largest and most populous country in the West. After the Borderlands, it also has the largest and most well-trained army.\n\nFormerly a province under gubernatorial rule, it was declared a sovereign nation, and is the oldest and largest of the nations formed after Artur Hawkwing\'s empire collapsed. The capital of Andor is Caemlyn.','http://localhost/mapster-api/img/PlaceVersions/5410dcd5da5ec.jpg','http://wot.wikia.com/wiki/Andor',1,'301 322,287 319,278 314,269 309,259 301,256 292,246 287,234 284,218 277,206 274,200 236,211 237,220 241,229 250,240 254,250 254,257 264,266 266,450 274,447 285,453 290,459 301,463 313,445 328,425 330,408 340,398 348,385 350,379 348,380 339,382 330,375 325,361 322',1,'2014-09-11 09:20:54',7),(11,'Arafel',NULL,'http://localhost/mapster-api/img/PlaceVersions/5410e69fb5bf1.jpg','http://wot.wikia.com/wiki/Arafel',1,'537 99,524 105,510 105,510 115,498 121,488 132,481 143,471 126,462 103,470 91,490 88,516 83,535 85',1,'2014-09-11 10:02:40',9),(12,'Amadacia','Amadicia is a southern nation of the Westlands. It is the home of the Children of the Light.','http://localhost/mapster-api/img/PlaceVersions/5417bf4cb1731.jpg','http://wot.wikia.com/wiki/Amadicia',1,'222 407,211 401,203 401,191 400,179 399,168 396,155 379,169 368,180 358,190 347,192 333,200 330,209 338,214 348,218 353,227 353,232 361,232 370,228 381,223 385,223 396',1,'2014-09-16 14:40:45',6),(13,'Arad Doman',NULL,'http://localhost/mapster-api/img/PlaceVersions/5417bf5f5104f.jpg','http://wot.wikia.com/wiki/Arad_Doman',1,'68 208,80 210,100 213,115 217,131 224,145 226,156 219,162 200,161 176,142 174,126 179,112 173,99 162,92 159,89 168,81 166,70 169,57 170,47 178,36 185,33 191,45 192,53 193,60 200',1,'2014-09-16 14:41:03',8),(14,'Cairhien',NULL,'http://localhost/mapster-api/img/PlaceVersions/5417bf6b1018b.jpg','http://wot.wikia.com/wiki/Cairhien',1,'468 316,467 306,462 296,454 288,449 281,452 275,447 263,440 258,442 249,448 241,457 226,461 215,461 200,506 198,525 184,544 174,566 166,571 209,573 248,571 277,546 288,505 304',1,'2014-09-16 14:41:15',10),(15,'Ghealdan','','http://localhost/mapster-api/img/PlaceVersions/5417bfe1c1959.jpg','http://wot.wikia.com/wiki/Ghealdan',1,'235 358,243 354,251 343,252 327,245 310,230 302,218 292,208 280,197 278,194 294,199 305,197 319,196 328,208 333,213 344,217 353,227 353',1,'2014-09-16 14:43:14',11);

/*Table structure for table `places` */

DROP TABLE IF EXISTS `places`;

CREATE TABLE `places` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  `image` text,
  `link` text,
  `place_type_id` int(11) NOT NULL,
  `coordinates` text NOT NULL,
  `map_id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `map_id` (`map_id`),
  KEY `place_type_id` (`place_type_id`),
  CONSTRAINT `places_ibfk_1` FOREIGN KEY (`map_id`) REFERENCES `maps` (`id`),
  CONSTRAINT `places_ibfk_2` FOREIGN KEY (`place_type_id`) REFERENCES `place_types` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

/*Data for the table `places` */

insert  into `places`(`id`,`name`,`description`,`image`,`link`,`place_type_id`,`coordinates`,`map_id`,`created`) values (1,'Altara','Altara is a country located in the south-central part of the Westlands.\n\nThe sign of Altara is two golden leopards on a field checked four-by-four in red and blue.','http://localhost/mapster-api/img/Place/540fd9178dcd3.jpg','http://wot.wikia.com/wiki/Altara',1,'223 412,224 403,223 393,224 385,228 380,231 375,232 365,238 356,247 348,254 338,250 320,238 305,220 290,202 270,224 280,238 286,253 288,256 298,264 304,272 311,280 315,301 322,298 345,299 356,308 364,313 375,305 409,287 411,276 410,266 416,268 425,270 433,262 436,251 438,238 443,225 445,210 443,205 436,215 425,210 422',1,'2014-09-09 14:01:11'),(6,'Amadacia','Amadicia is a southern nation of the Westlands. It is the home of the Children of the Light.','http://localhost/mapster-api/img/Place/5417bf4d3fd08.jpg','http://wot.wikia.com/wiki/Amadicia',1,'222 407,211 401,203 401,191 400,179 399,168 396,155 379,169 368,180 358,190 347,192 333,200 330,209 338,214 348,218 353,227 353,232 361,232 370,228 381,223 385,223 396',1,'2014-09-09 15:33:12'),(7,'Andor','Andor is a country in the heart of the Westlands. It is the largest and most populous country in the West. After the Borderlands, it also has the largest and most well-trained army.\n\nFormerly a province under gubernatorial rule, it was declared a sovereign nation, and is the oldest and largest of the nations formed after Artur Hawkwing\'s empire collapsed. The capital of Andor is Caemlyn.','http://localhost/mapster-api/img/Place/5410dcd606096.jpg','http://wot.wikia.com/wiki/Andor',1,'301 322,287 319,278 314,269 309,259 301,256 292,246 287,234 284,218 277,206 274,200 236,211 237,220 241,229 250,240 254,250 254,257 264,266 266,450 274,447 285,453 290,459 301,463 313,445 328,425 330,408 340,398 348,385 350,379 348,380 339,382 330,375 325,361 322',1,'2014-09-09 15:45:05'),(8,'Arad Doman',NULL,'http://localhost/mapster-api/img/Place/5417bf5fbc65f.jpg','http://wot.wikia.com/wiki/Arad_Doman',1,'68 208,80 210,100 213,115 217,131 224,145 226,156 219,162 200,161 176,142 174,126 179,112 173,99 162,92 159,89 168,81 166,70 169,57 170,47 178,36 185,33 191,45 192,53 193,60 200',1,'2014-09-11 09:26:44'),(9,'Arafel',NULL,'http://localhost/mapster-api/img/Place/5410e6a009814.jpg','http://wot.wikia.com/wiki/Arafel',1,'537 99,524 105,510 105,510 115,498 121,488 132,481 143,471 126,462 103,470 91,490 88,516 83,535 85',1,'2014-09-11 10:01:34'),(10,'Cairhien',NULL,'http://localhost/mapster-api/img/Place/5417bf6b7e9cb.jpg','http://wot.wikia.com/wiki/Cairhien',1,'468 316,467 306,462 296,454 288,449 281,452 275,447 263,440 258,442 249,448 241,457 226,461 215,461 200,506 198,525 184,544 174,566 166,571 209,573 248,571 277,546 288,505 304',1,'2014-09-11 10:04:06'),(11,'Ghealdan','','http://localhost/mapster-api/img/Place/5417bfe22df14.jpg','http://wot.wikia.com/wiki/Ghealdan',1,'235 358,243 354,251 343,252 327,245 310,230 302,218 292,208 280,197 278,194 294,199 305,197 319,196 328,208 333,213 344,217 353,227 353',1,'2014-09-11 10:07:25'),(12,'Illian',NULL,'http://localhost/mapster-api/img/Place/5410e8278fa4a.jpg','http://wot.wikia.com/wiki/Illian',1,'309 411,310 393,313 378,318 368,335 366,351 377,373 386,389 414,396 430,400 439,389 443,376 449,363 456,354 464,338 462,325 455,322 444,327 428,327 419',1,'2014-09-11 10:09:12'),(13,'Kandor',NULL,'http://localhost/mapster-api/img/Place/5410eaac1a037.jpg','http://wot.wikia.com/wiki/Kandor',1,'480 144,455 146,431 146,415 137,407 121,412 106,426 98,446 100,461 105',1,'2014-09-11 10:19:56'),(14,'Murandy',NULL,'http://localhost/mapster-api/img/Place/5410ebd36b686.jpg','http://wot.wikia.com/wiki/Murandy',1,'315 371,311 363,304 351,302 335,309 325,328 324,355 324,373 328,382 339,377 349,374 358,371 367,365 376,358 379,352 376,343 365,334 365',1,'2014-09-11 10:24:51'),(15,'Saldaea',NULL,'http://localhost/mapster-api/img/Place/5410ec6b5b871.jpg','http://wot.wikia.com/wiki/Saldaea',1,'167 134,194 152,206 162,212 175,224 191,233 204,241 179,244 168,244 157,251 142,266 140,289 132,306 133,316 110,320 89,296 81,267 83,227 90,194 102,176 110',1,'2014-09-11 10:27:23'),(16,'Shienar',NULL,'http://localhost/mapster-api/img/Place/5410ecbe5419f.jpg','http://wot.wikia.com/wiki/Shienar',1,'494 132,505 137,517 130,526 129,537 132,548 127,562 126,572 123,585 118,600 99,590 79,579 68,568 69,564 77,558 86,551 87,545 88,538 98,529 104,520 105,510 110,507 120',1,'2014-09-11 10:28:46'),(17,'Tarabon',NULL,'http://localhost/mapster-api/img/Place/5410eff0a4c39.jpg','http://wot.wikia.com/wiki/Tarabon',1,'35 347,65 352,94 364,135 374,152 379,153 359,152 338,146 313,136 293,113 282,84 279,58 280,47 295,33 311,23 329,26 339',1,'2014-09-11 10:42:25'),(18,'Tear',NULL,'http://localhost/mapster-api/img/Place/5410f06e62646.jpg','http://wot.wikia.com/wiki/Tear',1,'451 425,453 407,481 398,513 396,547 400,562 407,584 429,577 439,585 450,577 459,555 462,541 460,549 451,557 442,558 434,544 430,523 426,505 425,490 431,472 431,456 431',1,'2014-09-11 10:44:30'),(19,'Falme',NULL,NULL,'http://wot.wikia.com/wiki/Falme',2,'12 259',1,'2014-09-11 10:49:31'),(20,'Far Madding',NULL,NULL,'http://wot.wikia.com/wiki/Far_Madding',2,'465 368',1,'2014-09-11 10:51:03'),(21,'Mayene',NULL,'http://localhost/mapster-api/img/Place/5410f2292f3fa.jpg','http://wot.wikia.com/wiki/Mayene',2,'605 449',1,'2014-09-11 10:51:53'),(22,'Tar Valon',NULL,'http://localhost/mapster-api/img/Place/5410f25e327c3.jpg','http://wot.wikia.com/wiki/Tar_Valon',2,'454 183',1,'2014-09-11 10:52:46');

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
  `universe_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_universe_versions_universes` (`universe_id`),
  CONSTRAINT `universe_versions_ibfk_1` FOREIGN KEY (`universe_id`) REFERENCES `universes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `universe_versions` */

insert  into `universe_versions`(`id`,`name`,`abbreviation`,`description`,`image`,`link`,`created`,`universe_id`) values (1,'The Wheel of Time','WoT','The Wheel of Time is a series of epic fantasy novels written by American author James Oliver Rigney, Jr., under the pen name Robert Jordan. Originally planned as a six-book series, The Wheel of Time now spans fourteen volumes, in addition to a prequel novel and a companion book. Jordan began writing the first volume, The Eye of the World, in 1984 and it was published in January 1990.','http://localhost/mapster-api/img/UniverseVersions/54124cce84a82.png','http://wot.wikia.com/','2014-09-12 11:30:55',1);

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

insert  into `universes`(`id`,`name`,`abbreviation`,`description`,`image`,`link`,`created`) values (1,'The Wheel of Time','WoT','The Wheel of Time is a series of epic fantasy novels written by American author James Oliver Rigney, Jr., under the pen name Robert Jordan. Originally planned as a six-book series, The Wheel of Time now spans fourteen volumes, in addition to a prequel novel and a companion book. Jordan began writing the first volume, The Eye of the World, in 1984 and it was published in January 1990.','http://localhost/mapster-api/img/Universe/54124ccf3215c.png','http://wot.wikia.com/','2014-08-30 14:57:14'),(2,'The Lord of the Rings','LotR','The Lord of the Rings is an epic high fantasy novel written by English philologist and University of Oxford professor J. R. R. Tolkien. The story began as a sequel to Tolkien\'s 1937 children\'s fantasy novel The Hobbit, but eventually developed into a much larger work. It was written in stages between 1937 and 1949, much of it during World War II. It is the third best-selling novel ever written, with over 150 million copies sold.',NULL,'http://lotr.wikia.com','2014-08-30 14:57:14'),(3,'Game of Thrones','GoT','Game of Thrones is a television series produced by HBO based on the Song of Ice and Fire novels written by George R.R. Martin, debuting in April 2011. This wiki is specifically based on the television series and spoilers from the novels are not permitted.',NULL,'http://gameofthrones.wikia.com/','2014-08-30 15:22:08');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
