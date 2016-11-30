--
-- Database: `FINAL`
--

CREATE DATABASE IF NOT EXISTS  `FINAL`;


--
-- Table structure for table `weight_history`
--

CREATE TABLE IF NOT EXISTS `FINAL`.`weight_history` (
  `user_id` int(10) unsigned NOT NULL,
  -- Timestamp format: YYYY-MM-DD HH:MI:SS
  `weight_date` timestamp NOT NULL,
  `weight` decimal(6,2) NOT NULL,
  `bmr` decimal(8,4) NOT NULL,
  PRIMARY KEY (`weight_date`),
  UNIQUE KEY `user_id` (`user_id`,`weight_date`)
) ENGINE=InnoDB;





LOCK TABLES `weight_history` WRITE;
INSERT INTO `weight_history` VALUES (9,'2015-10-19 01:37:05',150.50,1900.00),(9,'2015-11-19 01:37:05',145.50,1800.00),(9,'2015-12-19 08:37:05',155.50,2200.00);
UNLOCK TABLES;