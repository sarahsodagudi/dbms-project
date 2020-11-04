-- MariaDB dump 10.17  Distrib 10.4.8-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: project
-- ------------------------------------------------------
-- Server version	10.4.8-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `band`
--

DROP TABLE IF EXISTS `band`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `band` (
  `BandId` int(4) NOT NULL,
  `BandName` varchar(15) NOT NULL,
  PRIMARY KEY (`BandId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `band`
--

LOCK TABLES `band` WRITE;
/*!40000 ALTER TABLE `band` DISABLE KEYS */;
INSERT INTO `band` VALUES (1001,'EXO'),(1002,'BTS'),(1003,'Blackpink');
/*!40000 ALTER TABLE `band` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `concert`
--

DROP TABLE IF EXISTS `concert`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `concert` (
  `concertId` int(4) NOT NULL,
  `concertName` varchar(20) DEFAULT NULL,
  `BandId` int(4) DEFAULT NULL,
  `SingerId` int(4) DEFAULT NULL,
  `c_venue` varchar(30) DEFAULT NULL,
  `c_date` date DEFAULT NULL,
  `time` varchar(20) DEFAULT NULL,
  `price_dollar` int(4) DEFAULT NULL,
  `no_of_seats` int(8) DEFAULT NULL,
  PRIMARY KEY (`concertId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `concert`
--

LOCK TABLES `concert` WRITE;
/*!40000 ALTER TABLE `concert` DISABLE KEYS */;
INSERT INTO `concert` VALUES (1782,'Japan showcase',1003,NULL,'Nippon Budakon','2019-11-19','18:00',150,14000),(2573,'Magicshop',1002,NULL,'Auxillary Stadium','2020-06-19','18:00',200,69000),(6402,'Arena Tour',1003,NULL,'Kyocera Dome','2020-06-24','17:00',160,45000),(6737,'EXplOration',1001,NULL,'KSPO Dome','2019-12-19','18:00',200,42000),(7243,'Elyxion',1001,NULL,'Gocheok Sky Dome','2020-02-19','17:00',170,45000),(7423,'Happy Ever After',1002,NULL,'Gocheok Sky Dome','2019-12-24','17:00',160,51997),(8127,'Exo\'luxion',1001,NULL,'Olympic Gymnastics Area','2020-11-24','18:00',195,67000),(8139,'House Of Armys',1002,NULL,'Hwajung Gymnasium','2020-11-24','18:00',215,58000),(8319,'World Tour',1003,NULL,'KSPO Dome','2020-08-12','18:00',215,52000);
/*!40000 ALTER TABLE `concert` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `matchs`
--

DROP TABLE IF EXISTS `matchs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `matchs` (
  `user_name` varchar(20) DEFAULT NULL,
  `concertId` int(4) DEFAULT NULL,
  `ticket_no` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `matchs`
--

LOCK TABLES `matchs` WRITE;
/*!40000 ALTER TABLE `matchs` DISABLE KEYS */;
INSERT INTO `matchs` VALUES ('sarah',1782,887160),('sarahs',1782,573607),('',1782,910515),('',7423,133876);
/*!40000 ALTER TABLE `matchs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `user_name` varchar(20) DEFAULT NULL,
  `no_of_tickets` int(4) DEFAULT NULL,
  `phone_no` bigint(12) NOT NULL,
  `concertName` varchar(30) DEFAULT NULL,
  `payment_info` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`phone_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-11-09 14:20:05
