--
-- Database: `FINAL`
--

CREATE DATABASE IF NOT EXISTS  `FINAL`;


--
-- Table structure for table `exercises`
--

CREATE TABLE IF NOT EXISTS `FINAL`.`exercises` (
  `activity` varchar(180) NOT NULL,
  `calorie` decimal(20,19) NOT NULL,
  PRIMARY KEY (`Activity`)
) ENGINE=InnoDB;
