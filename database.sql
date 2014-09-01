-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.20-log - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             8.3.0.4694
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for mapster
DROP DATABASE IF EXISTS `mapster`;
CREATE DATABASE IF NOT EXISTS `mapster` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `mapster`;


-- Dumping structure for table mapster.entities
DROP TABLE IF EXISTS `entities`;
CREATE TABLE IF NOT EXISTS `entities` (
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

-- Dumping data for table mapster.entities: ~0 rows (approximately)
/*!40000 ALTER TABLE `entities` DISABLE KEYS */;
INSERT INTO `entities` (`id`, `name`, `plural`, `table_name`, `foreign_id`) VALUES
	(1, 'Universe', 'Universes', 'universes', 'universe_id'),
	(2, 'Media', 'Media', 'media', 'media_id');
/*!40000 ALTER TABLE `entities` ENABLE KEYS */;


-- Dumping structure for table mapster.universes
DROP TABLE IF EXISTS `universes`;
CREATE TABLE IF NOT EXISTS `universes` (
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

-- Dumping data for table mapster.universes: ~3 rows (approximately)
/*!40000 ALTER TABLE `universes` DISABLE KEYS */;
INSERT INTO `universes` (`id`, `name`, `abbreviation`, `description`, `image`, `link`, `created`) VALUES
	(1, 'The Wheel of Time', 'WoT', 'The Wheel of Time is a series of epic fantasy novels written by American author James Oliver Rigney, Jr., under the pen name Robert Jordan. Originally planned as a six-book series, The Wheel of Time now spans fourteen volumes, in addition to a prequel novel and a companion book. Jordan began writing the first volume, The Eye of the World, in 1984 and it was published in January 1990.', NULL, 'http://wot.wikia.com/', '2014-08-30 14:57:14'),
	(2, 'The Lord of the Rings', 'LotR', 'The Lord of the Rings is an epic high fantasy novel written by English philologist and University of Oxford professor J. R. R. Tolkien. The story began as a sequel to Tolkien\'s 1937 children\'s fantasy novel The Hobbit, but eventually developed into a much larger work. It was written in stages between 1937 and 1949, much of it during World War II. It is the third best-selling novel ever written, with over 150 million copies sold.', NULL, 'http://lotr.wikia.com', '2014-08-30 14:57:14'),
	(3, 'Game of Thrones', 'GoT', 'Game of Thrones is a television series produced by HBO based on the Song of Ice and Fire novels written by George R.R. Martin, debuting in April 2011. This wiki is specifically based on the television series and spoilers from the novels are not permitted.', NULL, 'http://gameofthrones.wikia.com/', '2014-08-30 15:22:08');
/*!40000 ALTER TABLE `universes` ENABLE KEYS */;


-- Dumping structure for table mapster.universe_versions
DROP TABLE IF EXISTS `universe_versions`;
CREATE TABLE IF NOT EXISTS `universe_versions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `abbreviation` char(10) DEFAULT NULL,
  `description` text,
  `image` text,
  `link` text,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `version_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `FK_universe_versions_universes` (`version_id`),
  CONSTRAINT `FK_universe_versions_universes` FOREIGN KEY (`version_id`) REFERENCES `universes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table mapster.universe_versions: ~0 rows (approximately)
/*!40000 ALTER TABLE `universe_versions` DISABLE KEYS */;
/*!40000 ALTER TABLE `universe_versions` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
