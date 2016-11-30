--
-- Database: `FINAL`
--

CREATE DATABASE IF NOT EXISTS  `FINAL`;


--
-- Table structure for table `weight_history`
--

CREATE TABLE IF NOT EXISTS `FINAL`.`history` (
  `history_date` timestamp NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  -- Timestamp format: YYYY-MM-DD HH:MI:SS
  `task` varchar(40) NOT NULL,
  `task_unit` decimal(23,19) NOT NULL,
  `task_amount` decimal(5,2) NOT NULL,
  `task_type` varchar(10) NOT NULL,
  PRIMARY KEY (`history_date`),
  UNIQUE KEY `user_id` (`user_id`,`history_date`)
) ENGINE=InnoDB;


LOCK TABLES `history` WRITE;
INSERT INTO `history` VALUES 
('2015-10-19 12:15:45',9,'Weight',1,150.55,'Weight'),
('2015-10-19 14:12:12',9,'BMR',1,1850,'BMR'),
('2015-11-19 08:40:05',9,'Weight',1,145,'Weight'),
('2016-11-19 22:40:48',9,'BMR',1,1900,'BMR'),
('2016-12-25 22:40:48',9,'Weight',1,156,'Weight'),
('2015-12-25 12:37:05',9,'BMR',1,2300,'BMR');
UNLOCK TABLES;