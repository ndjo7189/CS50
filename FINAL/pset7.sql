-- MySQL dump 10.13  Distrib 5.5.46, for debian-linux-gnu (x86_64)
--
-- Host: 0.0.0.0    Database: pset7
-- ------------------------------------------------------
-- Server version	5.5.46-0ubuntu0.14.04.2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `portfolios`
--

DROP TABLE IF EXISTS `portfolios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `portfolios` (
  `id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `symbol` varchar(5) NOT NULL,
  `shares` int(11) NOT NULL,
  UNIQUE KEY `user_id` (`user_id`,`symbol`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `portfolios`
--

LOCK TABLES `portfolios` WRITE;
/*!40000 ALTER TABLE `portfolios` DISABLE KEYS */;
INSERT INTO `portfolios` VALUES (0,9,'AMZN',3),(0,9,'CMCSA',26),(0,9,'DAL',40),(0,9,'DIS',21),(0,9,'FREE',50),(0,9,'GE',10),(0,9,'GOOG',5),(0,9,'IBM',10),(0,9,'MSFT',39),(0,9,'T',9);
/*!40000 ALTER TABLE `portfolios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transactionHistory`
--

DROP TABLE IF EXISTS `transactionHistory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transactionHistory` (
  `transactionDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(10) unsigned NOT NULL,
  `symbol` varchar(5) CHARACTER SET latin1 DEFAULT NULL,
  `transactionShares` int(11) DEFAULT NULL,
  `sharePrice` float DEFAULT NULL,
  `transactionType` varchar(4) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`transactionDate`),
  UNIQUE KEY `transactionDate` (`transactionDate`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transactionHistory`
--

LOCK TABLES `transactionHistory` WRITE;
/*!40000 ALTER TABLE `transactionHistory` DISABLE KEYS */;
INSERT INTO `transactionHistory` VALUES ('2015-10-19 01:37:05',9,'FREE',10,0.035,'SELL'),('2015-10-19 02:46:17',9,'FREE',20,0.035,'BUY'),('2016-02-11 16:49:43',9,'cmcsa',5,54.765,'SELL'),('2016-02-11 17:07:33',9,'CMCSA',1,54.99,'Buy'),('2016-02-11 17:09:24',9,'APPL',1,96.11,'Buy'),('2016-02-11 17:41:49',9,'free',1,0.0772,'BUY'),('2016-02-11 17:56:31',9,'FREE',1,0.0779,'SELL'),('2016-02-11 17:57:24',9,'FRee',1,0.0779,'BUY'),('2016-02-11 18:01:38',9,'aapl',2,186.46,'BUY'),('2016-02-11 19:34:42',9,'CMCSA',1,55.37,'BUY '),('2016-02-11 19:35:23',9,'FREE',10,0.0787,'BUY '),('2016-02-11 19:36:05',9,'FREE',10,0.0787,'BUY '),('2016-02-11 19:38:10',9,'FREE',10,0.0787,'BUY '),('2016-02-11 20:08:35',9,'FREE',1,0.075,'BUY '),('2016-02-11 20:09:29',9,'FREE',1,0.0752,'BUY '),('2016-02-11 20:12:08',9,'FREE',1,0.0775,'BUY '),('2016-02-11 20:13:16',9,'FREE',10,0.0775,'BUY '),('2016-02-11 20:20:17',9,'free',10,0.075,'SELL'),('2016-02-11 20:20:40',9,'free',10,0.0775,'SELL'),('2016-02-11 20:21:42',9,'free',10,0.0775,'SELL'),('2016-02-11 20:21:52',9,'free',14,0.0775,'SELL'),('2016-02-11 20:22:02',9,'aapl',2,93.78,'SELL'),('2016-02-11 20:22:12',9,'FREE',100,0.0775,'BUY '),('2016-02-11 20:25:38',9,'FREE',100,0.0775,'BUY '),('2016-02-11 20:48:41',9,'CMCSA',50,56.02,'BUY '),('2016-02-11 20:49:16',9,'FOXA',50,24.795,'BUY '),('2016-02-11 20:49:21',9,'DISN',50,0,'BUY '),('2016-02-11 20:49:43',9,'DIS',50,90.76,'BUY '),('2016-02-11 20:57:14',9,'DIS',1,90.8101,'SELL'),('2016-02-11 21:19:10',9,'cmcsa',50,56.04,'SELL'),('2016-02-11 21:21:42',9,'DFDSS',1,0,'BUY '),('2016-02-11 22:08:02',9,'CMCSA',10,56.04,'BUY '),('2016-02-11 22:10:22',9,'CMCSA',10,56.04,'SELL'),('2016-02-11 22:10:46',9,'FREE',200,0.073,'SELL'),('2016-02-11 22:14:47',9,'CMCSA',10,56.04,'BUY '),('2016-02-11 22:15:14',9,'CMCSA',10,56.04,'BUY '),('2016-02-11 22:20:31',9,'DIS',20,90.31,'BUY '),('2016-02-11 22:20:36',9,'FREE',20,0.073,'BUY '),('2016-02-11 22:20:43',9,'CMCSA',5,56.04,'BUY '),('2016-02-11 22:24:19',9,'DIS',1,90.31,'BUY '),('2016-02-11 22:35:00',9,'GOOG',1,683.11,'BUY '),('2016-02-12 00:35:26',9,'FREE',1,0.073,'SELL'),('2016-02-12 00:35:44',9,'FREE',1,0.073,'SELL'),('2016-02-12 00:51:02',9,'MSFT',40,49.69,'BUY '),('2016-02-12 01:03:45',9,'CMCSA',1,56.04,'SELL'),('2016-02-12 01:14:55',9,'FREE',1,0.073,'SELL'),('2016-02-12 01:15:21',9,'FREE',1,0.073,'SELL'),('2016-02-12 01:20:47',9,'CMCSA',1,56.04,'SELL'),('2016-02-12 01:35:04',9,'GOOG',1,683.11,'SELL'),('2016-02-12 01:35:15',9,'GOOG',5,683.11,'BUY '),('2016-02-12 01:36:03',9,'AMZN',10,503.82,'BUY '),('2016-02-12 01:38:10',9,'T',10,36.21,'BUY '),('2016-02-12 01:42:02',9,'IBM',10,117.85,'BUY '),('2016-02-12 01:42:17',9,'DAL',40,42.7,'BUY '),('2016-02-12 14:41:33',9,'FREE',10,0.073,'SELL'),('2016-02-12 14:44:37',9,'AMZN',1,503.82,'SELL'),('2016-02-12 14:48:07',9,'FREE',1,0.076,'SELL'),('2016-02-12 14:55:27',9,'AMZN',1,513,'SELL'),('2016-02-12 15:02:10',9,'FREE',1,0.0748,'SELL'),('2016-02-12 16:18:57',9,'AMZN',1,512.975,'SELL'),('2016-02-12 16:31:04',9,'FREE',1,0.062,'SELL'),('2016-02-12 16:31:54',9,'FREE',1,0.0649,'SELL'),('2016-02-12 16:32:14',9,'FREE',1,0.0649,'SELL'),('2016-02-12 16:32:25',9,'AMZN',1,515,'SELL'),('2016-02-12 16:32:46',9,'MSFT',1,50.31,'SELL'),('2016-02-12 16:33:04',9,'AMZN',1,514.43,'SELL'),('2016-02-12 16:33:25',9,'T',1,36.3839,'SELL'),('2016-02-12 16:35:16',9,'AMZN',1,514.33,'SELL'),('2016-02-12 16:35:36',9,'T',1,36.4062,'SELL'),('2016-02-12 16:36:59',9,'AMZN',1,513.45,'SELL'),('2016-02-12 16:38:06',9,'T',1,36.41,'SELL'),('2016-02-12 16:57:05',9,'T',1,36.38,'BUY'),('2016-02-12 16:57:21',9,'T',1,36.37,'BUY'),('2016-02-12 16:58:15',9,'CMCSA',1,56.81,'BUY'),('2016-02-12 16:59:14',9,'CMCSA',1,56.785,'BUY'),('2016-02-12 16:59:48',9,'CMCSA',1,56.79,'BUY'),('2016-02-12 17:00:05',9,'CMCSA',1,56.8,'BUY'),('2016-02-12 17:00:13',9,'CMCSA',1,56.8001,'SELL'),('2016-02-12 19:39:26',9,'FREE',2,0.0622,'SELL'),('2016-02-12 19:40:36',9,'FREE',5,0.0622,'BUY'),('2016-02-12 19:40:41',9,'FREE',5,0.0622,'SELL'),('2016-02-12 19:40:49',9,'FREE',50,0.0622,'BUY'),('2016-02-12 19:40:59',9,'GE',10,28.015,'BUY');
/*!40000 ALTER TABLE `transactionHistory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `hash` varchar(255) NOT NULL,
  `cash` decimal(65,4) unsigned NOT NULL DEFAULT '0.0000',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'andi','$2y$10$c.e4DK7pVyLT.stmHxgAleWq4yViMmkwKz3x8XCo4b/u3r8g5OTnS',10000.0000),(2,'caesar','$2y$10$0p2dlmu6HnhzEMf9UaUIfuaQP7tFVDMxgFcVs0irhGqhOxt6hJFaa',10000.0000),(3,'eli','$2y$10$COO6EnTVrCPCEddZyWeEJeH9qPCwPkCS0jJpusNiru.XpRN6Jf7HW',10000.0000),(4,'hdan','$2y$10$o9a4ZoHqVkVHSno6j.k34.wC.qzgeQTBHiwa3rpnLq7j2PlPJHo1G',10000.0000),(5,'jason','$2y$10$ci2zwcWLJmSSqyhCnHKUF.AjoysFMvlIb1w4zfmCS7/WaOrmBnLNe',10000.0000),(6,'john','$2y$10$dy.LVhWgoxIQHAgfCStWietGdJCPjnNrxKNRs5twGcMrQvAPPIxSy',10000.0000),(7,'levatich','$2y$10$fBfk7L/QFiplffZdo6etM.096pt4Oyz2imLSp5s8HUAykdLXaz6MK',10000.0000),(8,'rob','$2y$10$3pRWcBbGdAdzdDiVVybKSeFq6C50g80zyPRAxcsh2t5UnwAkG.I.2',10000.0000),(9,'skroob','$2y$10$395b7wODm.o2N7W5UZSXXuXwrC0OtFB17w4VjPnCIn/nvv9e4XUQK',8808.2055),(10,'zamyla','$2y$10$UOaRF0LGOaeHG4oaEkfO4O7vfI34B1W23WqHr9zCpXL68hfQsS3/e',10000.0000),(12,'ndjo','$2y$10$7OZH8JaKjW2lQUH6FqhLp.5V0ta4oEsXAeudrDoU/BTJJLNqh6.pC',10000.0000);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-02-12 19:42:23
