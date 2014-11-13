CREATE DATABASE  IF NOT EXISTS `vfm` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `vfm`;
-- MySQL dump 10.13  Distrib 5.5.16, for Win32 (x86)
--
-- Host: localhost    Database: vfm
-- ------------------------------------------------------
-- Server version	5.5.19

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sector_ekab`
--

LOCK TABLES `sector_ekab` WRITE;
/*!40000 ALTER TABLE `sector_ekab` DISABLE KEYS */;
/*!40000 ALTER TABLE `sector_ekab` ENABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehicle`
--

LOCK TABLES `vehicle` WRITE;
/*!40000 ALTER TABLE `vehicle` DISABLE KEYS */;
/*!40000 ALTER TABLE `vehicle` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-09-04 15:49:00
