CREATE DATABASE  IF NOT EXISTS `vfm` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `vfm`;
-- MySQL dump 10.13  Distrib 5.6.17, for Win64 (x86_64)
--
-- Host: localhost    Database: vfm
-- ------------------------------------------------------
-- Server version	5.6.21-log

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
-- Table structure for table `sector_ekab`
--

DROP TABLE IF EXISTS `sector_ekab`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sector_ekab` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `code` varchar(45) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sector_ekab`
--

LOCK TABLES `sector_ekab` WRITE;
/*!40000 ALTER TABLE `sector_ekab` DISABLE KEYS */;
INSERT INTO `sector_ekab` VALUES (1,'Ambulance ','1','ambulance ');
/*!40000 ALTER TABLE `sector_ekab` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehicle`
--

DROP TABLE IF EXISTS `vehicle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vehicle` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `license_plate` varchar(45) DEFAULT NULL,
  `running_distance` int(11) DEFAULT NULL,
  `manufacture_date` date DEFAULT NULL,
  `registration_date` date DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `vehicle_type` varchar(45) DEFAULT NULL,
  `sector_ekab_id` int(10) unsigned DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `vehicle_sectorekab_fk` (`sector_ekab_id`),
  CONSTRAINT `vehicle_sectorekab_fk` FOREIGN KEY (`sector_ekab_id`) REFERENCES `sector_ekab` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehicle`
--

LOCK TABLES `vehicle` WRITE;
/*!40000 ALTER TABLE `vehicle` DISABLE KEYS */;
INSERT INTO `vehicle` VALUES (2,'INI 3435',123,'2012-12-12','2012-12-12','NA','car',1),(3,'INO 4546',123,'2012-12-12','2012-12-12','NA','CAR',1);
/*!40000 ALTER TABLE `vehicle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehicle_service`
--

DROP TABLE IF EXISTS `vehicle_service`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vehicle_service` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `service_status` varchar(45) DEFAULT NULL,
  `service_date` date DEFAULT NULL,
  `description` text,
  `running_distance` int(11) DEFAULT NULL,
  `vehicle_part` varchar(45) DEFAULT NULL,
  `vehicle_part_quantity` int(11) DEFAULT NULL,
  `price` varchar(45) DEFAULT NULL,
  `invoice_number` varchar(45) DEFAULT NULL,
  `garage` text,
  `vehicle_id` int(10) unsigned DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `vehicleservice_vehicle_fk` (`vehicle_id`),
  CONSTRAINT `vehicleservice_vehicle_fk` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicle` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehicle_service`
--

LOCK TABLES `vehicle_service` WRITE;
/*!40000 ALTER TABLE `vehicle_service` DISABLE KEYS */;
/*!40000 ALTER TABLE `vehicle_service` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehicle_shift`
--

DROP TABLE IF EXISTS `vehicle_shift`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vehicle_shift` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `shift_start_km` int(11) DEFAULT NULL,
  `shift_end_km` int(11) DEFAULT NULL,
  `shift_used_fuel` int(11) DEFAULT NULL,
  `shift_start_datetime` datetime DEFAULT NULL,
  `shift_end_datetime` datetime DEFAULT NULL,
  `vehicle_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `vehicleshift_vehicle_fk_idx` (`vehicle_id`),
  CONSTRAINT `vehicleshift_vehicle_fk` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicle` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehicle_shift`
--

LOCK TABLES `vehicle_shift` WRITE;
/*!40000 ALTER TABLE `vehicle_shift` DISABLE KEYS */;
INSERT INTO `vehicle_shift` VALUES (9,12000,23333,111,'2015-01-28 10:32:08','2015-01-28 10:33:20',NULL),(10,12345,NULL,NULL,'2015-01-28 10:32:51','2015-01-28 10:32:51',NULL);
/*!40000 ALTER TABLE `vehicle_shift` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-01-28 10:36:11
