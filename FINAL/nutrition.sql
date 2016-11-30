--
-- Database: `FINAL`
--

CREATE DATABASE IF NOT EXISTS  `FINAL`;


--
-- Table structure for table `nutrition`
--

CREATE TABLE IF NOT EXISTS `FINAL`.`nutrition` (
  `list` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `food` varchar(40) NOT NULL,
  `measure` varchar(30) NOT NULL,
  `weight` decimal(7,3) NOT NULL,
  `energy` decimal(7,3) NOT NULL,
  `fat` decimal(7,3) NOT NULL,
  `carb` decimal(7,3) NOT NULL,
  `protein` decimal(7,3) NOT NULL,
  PRIMARY KEY (`list`),
  UNIQUE KEY `list` (`list`)
) ENGINE=InnoDB;
