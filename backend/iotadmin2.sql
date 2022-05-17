-- MySQL dump 10.13  Distrib 8.0.29, for Linux (x86_64)
--
-- Host: localhost    Database: office
-- ------------------------------------------------------
-- Server version	8.0.29

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `eui_008000000400AEAA`
--

DROP TABLE IF EXISTS `eui_008000000400AEAA`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `eui_008000000400AEAA` (
  `device_id` char(23) NOT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `presence_21` int DEFAULT NULL,
  `presence_55` int DEFAULT NULL,
  `temperature_2` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eui_008000000400AEAA`
--

LOCK TABLES `eui_008000000400AEAA` WRITE;
/*!40000 ALTER TABLE `eui_008000000400AEAA` DISABLE KEYS */;
INSERT INTO `eui_008000000400AEAA` VALUES ('placepod-aeaa','2022-05-11 11:41:32',0,NULL,NULL),('placepod-aeaa','2022-05-11 11:42:11',0,NULL,NULL),('placepod-aeaa','2022-05-11 12:10:20',NULL,0,NULL),('placepod-aeaa','2022-05-11 12:10:40',0,NULL,NULL),('placepod-aeaa','2022-05-11 12:13:11',1,NULL,NULL),('placepod-aeaa','2022-05-11 12:16:49',0,NULL,NULL),('placepod-aeaa','2022-05-11 13:16:56',NULL,0,24),('placepod-aeaa','2022-05-12 07:24:05',1,NULL,NULL);
/*!40000 ALTER TABLE `eui_008000000400AEAA` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eui_24E124116B208822`
--

DROP TABLE IF EXISTS `eui_24E124116B208822`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `eui_24E124116B208822` (
  `device_id` char(23) NOT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `din1` varchar(50) DEFAULT NULL,
  `din2` varchar(50) DEFAULT NULL,
  `dout1` varchar(50) DEFAULT NULL,
  `dout2` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eui_24E124116B208822`
--

LOCK TABLES `eui_24E124116B208822` WRITE;
/*!40000 ALTER TABLE `eui_24E124116B208822` DISABLE KEYS */;
INSERT INTO `eui_24E124116B208822` VALUES ('uc1114','2022-05-11 11:41:27','off','off','off','off'),('uc1114','2022-05-11 11:44:27','off','off','off','off'),('uc1114','2022-05-11 11:44:32',NULL,NULL,'off',NULL),('uc1114','2022-05-11 11:44:38',NULL,NULL,'off',NULL),('uc1114','2022-05-11 12:11:27','off','off','off','off'),('uc1114','2022-05-11 12:11:32',NULL,NULL,'off',NULL),('uc1114','2022-05-11 12:14:27','off','off','off','off'),('uc1114','2022-05-11 12:14:33',NULL,NULL,'on','off'),('uc1114','2022-05-11 12:16:28','off','off','on','off'),('uc1114','2022-05-11 12:17:28','off','off','on','off'),('uc1114','2022-05-11 12:17:34',NULL,NULL,'off','off'),('uc1114','2022-05-11 12:18:28','off','off','off','off'),('uc1114','2022-05-11 12:19:28','off','off','off','off'),('uc1114','2022-05-11 12:20:28','off','off','off','off'),('uc1114','2022-05-11 12:21:28','off','off','off','off'),('uc1114','2022-05-11 12:22:28','off','off','off','off'),('uc1114','2022-05-11 12:23:28','off','off','off','off'),('uc1114','2022-05-11 12:24:28','off','off','off','off'),('uc1114','2022-05-11 12:25:28','off','off','off','off'),('uc1114','2022-05-11 12:26:28','off','off','off','off'),('uc1114','2022-05-11 12:27:28','off','off','off','off'),('uc1114','2022-05-11 12:28:28','off','off','off','off'),('uc1114','2022-05-11 12:29:28','off','off','off','off'),('uc1114','2022-05-11 12:30:28','off','off','off','off'),('uc1114','2022-05-11 12:31:28','off','off','off','off'),('uc1114','2022-05-11 12:32:28','off','off','off','off'),('uc1114','2022-05-11 12:33:28','off','off','off','off'),('uc1114','2022-05-11 12:34:28','off','off','off','off'),('uc1114','2022-05-11 12:35:28','off','off','off','off'),('uc1114','2022-05-11 12:36:28','off','off','off','off'),('uc1114','2022-05-11 12:37:28','off','off','off','off'),('uc1114','2022-05-11 12:38:28','off','off','off','off'),('uc1114','2022-05-11 12:39:28','off','off','off','off'),('uc1114','2022-05-11 12:40:28','off','off','off','off'),('uc1114','2022-05-11 12:41:28','off','off','off','off'),('uc1114','2022-05-11 12:42:28','off','off','off','off'),('uc1114','2022-05-11 12:43:28','off','off','off','off'),('uc1114','2022-05-11 12:44:28','off','off','off','off'),('uc1114','2022-05-11 12:45:29','off','off','off','off'),('uc1114','2022-05-11 12:46:28','off','off','off','off'),('uc1114','2022-05-11 12:47:28','off','off','off','off'),('uc1114','2022-05-11 12:48:28','off','off','off','off'),('uc1114','2022-05-11 12:49:28','off','off','off','off'),('uc1114','2022-05-11 12:50:28','off','off','off','off'),('uc1114','2022-05-11 12:51:28','off','off','off','off'),('uc1114','2022-05-11 12:52:28','off','off','off','off'),('uc1114','2022-05-11 12:53:28','off','off','off','off'),('uc1114','2022-05-11 12:54:28','off','off','off','off'),('uc1114','2022-05-11 12:55:28','off','off','off','off'),('uc1114','2022-05-11 12:56:28','off','off','off','off'),('uc1114','2022-05-11 12:57:28','off','off','off','off'),('uc1114','2022-05-11 12:58:28','off','off','off','off'),('uc1114','2022-05-11 12:59:28','off','off','off','off'),('uc1114','2022-05-11 13:00:28','off','off','off','off'),('uc1114','2022-05-11 13:01:28','off','off','off','off'),('uc1114','2022-05-11 13:02:28','off','off','off','off'),('uc1114','2022-05-11 13:03:28','off','off','off','off'),('uc1114','2022-05-11 13:04:28','off','off','off','off'),('uc1114','2022-05-11 13:05:28','off','off','off','off'),('uc1114','2022-05-11 13:06:28','off','off','off','off'),('uc1114','2022-05-11 13:07:28','off','off','off','off'),('uc1114','2022-05-11 13:08:28','off','off','off','off'),('uc1114','2022-05-11 13:09:28','off','off','off','off'),('uc1114','2022-05-11 13:10:28','off','off','off','off'),('uc1114','2022-05-11 13:11:28','off','off','off','off'),('uc1114','2022-05-11 13:12:28','off','off','off','off'),('uc1114','2022-05-11 13:13:28','off','off','off','off'),('uc1114','2022-05-11 13:14:28','off','off','off','off'),('uc1114','2022-05-11 13:15:28','off','off','off','off'),('uc1114','2022-05-11 13:16:28','off','off','off','off'),('uc1114','2022-05-11 13:17:28','off','off','off','off'),('uc1114','2022-05-11 13:18:28','off','off','off','off'),('uc1114','2022-05-11 13:19:28','off','off','off','off'),('uc1114','2022-05-11 13:20:28','off','off','off','off'),('uc1114','2022-05-11 13:21:28','off','off','off','off'),('uc1114','2022-05-11 13:22:28','off','off','off','off'),('uc1114','2022-05-11 13:23:28','off','off','off','off'),('uc1114','2022-05-11 13:24:28','off','off','off','off'),('uc1114','2022-05-11 13:25:28','off','off','off','off'),('uc1114','2022-05-11 13:26:28','off','off','off','off'),('uc1114','2022-05-11 13:27:28','off','off','off','off'),('uc1114','2022-05-11 13:28:28','off','off','off','off'),('uc1114','2022-05-11 13:29:28','off','off','off','off'),('uc1114','2022-05-11 13:30:28','off','off','off','off'),('uc1114','2022-05-11 13:31:28','off','off','off','off'),('uc1114','2022-05-11 13:32:28','off','off','off','off'),('uc1114','2022-05-11 13:33:28','off','off','off','off'),('uc1114','2022-05-11 13:34:42','off','off','off','off'),('uc1114','2022-05-12 07:14:35','off','off','off','off'),('uc1114','2022-05-12 07:15:35','off','off','off','off'),('uc1114','2022-05-12 07:16:35','off','off','off','off'),('uc1114','2022-05-12 07:17:35','off','off','off','off'),('uc1114','2022-05-12 07:18:35','off','off','off','off'),('uc1114','2022-05-12 07:19:35','off','off','off','off'),('uc1114','2022-05-12 07:20:35','off','off','off','off'),('uc1114','2022-05-12 07:21:35','off','off','off','off'),('uc1114','2022-05-12 07:22:35','off','off','off','off'),('uc1114','2022-05-12 07:23:35','off','off','off','off'),('uc1114','2022-05-12 07:24:35','off','off','off','off'),('uc1114','2022-05-12 07:24:41',NULL,NULL,'on','off'),('uc1114','2022-05-12 07:25:35','off','off','on','off'),('uc1114','2022-05-12 07:26:35','off','off','on','off'),('uc1114','2022-05-12 07:30:35','off','off','on','off'),('uc1114','2022-05-12 07:31:35','off','off','on','off'),('uc1114','2022-05-12 07:32:35','off','off','on','off'),('uc1114','2022-05-12 07:33:35','off','off','on','off'),('uc1114','2022-05-12 07:34:35','off','off','on','off'),('uc1114','2022-05-12 07:35:35','off','off','on','off');
/*!40000 ALTER TABLE `eui_24E124116B208822` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eui_24E124707B427586`
--

DROP TABLE IF EXISTS `eui_24E124707B427586`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `eui_24E124707B427586` (
  `device_id` char(23) NOT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `humidity` float DEFAULT NULL,
  `temperature` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eui_24E124707B427586`
--

LOCK TABLES `eui_24E124707B427586` WRITE;
/*!40000 ALTER TABLE `eui_24E124707B427586` DISABLE KEYS */;
INSERT INTO `eui_24E124707B427586` VALUES ('am307','2022-05-12 07:15:22',37.5,23.7),('am307','2022-05-12 07:18:18',37.5,23.7),('am307','2022-05-12 07:21:20',37.5,23.7),('am307','2022-05-12 07:24:18',37.5,23.8),('am307','2022-05-12 07:30:19',37.5,23.8),('am307','2022-05-12 07:33:20',37.5,23.9),('am307','2022-05-12 07:36:18',37,23.9);
/*!40000 ALTER TABLE `eui_24E124707B427586` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sensors`
--

DROP TABLE IF EXISTS `sensors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sensors` (
  `device_id` char(23) NOT NULL,
  `battery_level` float NOT NULL DEFAULT '0',
  `last_heard` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `dev_eui` char(16) NOT NULL,
  `rssi` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sensors`
--

LOCK TABLES `sensors` WRITE;
/*!40000 ALTER TABLE `sensors` DISABLE KEYS */;
INSERT INTO `sensors` VALUES ('placepod-aeaa',0,'2022-05-12 07:24:05','008000000400AEAA',42),('uc1114',0,'2022-05-12 07:35:35','24E124116B208822',-47),('am307',0,'2022-05-12 07:36:17','24E124707B427586',-39);
/*!40000 ALTER TABLE `sensors` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-05-12  9:37:36
