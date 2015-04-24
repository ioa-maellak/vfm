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
-- Table structure for table `authassignment`
--

DROP TABLE IF EXISTS `authassignment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `authassignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,`userid`),
  CONSTRAINT `authassignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `authassignment`
--

LOCK TABLES `authassignment` WRITE;
/*!40000 ALTER TABLE `authassignment` DISABLE KEYS */;
INSERT INTO `authassignment` VALUES ('Admin','1',NULL,'N;'),('operator','3',NULL,'N;'),('operator','4',NULL,'N;'),('operator','5',NULL,'N;'),('operator','6',NULL,'N;');
/*!40000 ALTER TABLE `authassignment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `authitem`
--

DROP TABLE IF EXISTS `authitem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `authitem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `authitem`
--

LOCK TABLES `authitem` WRITE;
/*!40000 ALTER TABLE `authitem` DISABLE KEYS */;
INSERT INTO `authitem` VALUES ('Admin',2,NULL,NULL,'N;'),('Authentication',2,'Authentication',NULL,'N;'),('Guest',2,'Guest',NULL,'N;'),('operator',2,'operator',NULL,'N;'),('SectorEkab.*',1,NULL,NULL,'N;'),('SectorEkab.Admin',0,NULL,NULL,'N;'),('SectorEkab.Create',0,NULL,NULL,'N;'),('SectorEkab.Delete',0,NULL,NULL,'N;'),('SectorEkab.Index',0,NULL,NULL,'N;'),('SectorEkab.Update',0,NULL,NULL,'N;'),('SectorEkab.View',0,NULL,NULL,'N;'),('Site.*',1,NULL,NULL,'N;'),('Site.Contact',0,NULL,NULL,'N;'),('Site.Error',0,NULL,NULL,'N;'),('Site.Index',0,NULL,NULL,'N;'),('Site.Login',0,NULL,NULL,'N;'),('Site.Logout',0,NULL,NULL,'N;'),('User.Activation.*',1,NULL,NULL,'N;'),('User.Activation.Activation',0,NULL,NULL,'N;'),('User.Admin.*',1,NULL,NULL,'N;'),('User.Admin.Admin',0,NULL,NULL,'N;'),('User.Admin.Create',0,NULL,NULL,'N;'),('User.Admin.Delete',0,NULL,NULL,'N;'),('User.Admin.Update',0,NULL,NULL,'N;'),('User.Admin.View',0,NULL,NULL,'N;'),('User.Default.*',1,NULL,NULL,'N;'),('User.Default.Index',0,NULL,NULL,'N;'),('User.Login.*',1,NULL,NULL,'N;'),('User.Login.Login',0,NULL,NULL,'N;'),('User.Logout.*',1,NULL,NULL,'N;'),('User.Logout.Logout',0,NULL,NULL,'N;'),('User.Profile.*',1,NULL,NULL,'N;'),('User.Profile.Changepassword',0,NULL,NULL,'N;'),('User.Profile.Edit',0,NULL,NULL,'N;'),('User.Profile.Profile',0,NULL,NULL,'N;'),('User.ProfileField.*',1,NULL,NULL,'N;'),('User.ProfileField.Admin',0,NULL,NULL,'N;'),('User.ProfileField.Create',0,NULL,NULL,'N;'),('User.ProfileField.Delete',0,NULL,NULL,'N;'),('User.ProfileField.Update',0,NULL,NULL,'N;'),('User.ProfileField.View',0,NULL,NULL,'N;'),('User.Recovery.*',1,NULL,NULL,'N;'),('User.Recovery.Recovery',0,NULL,NULL,'N;'),('User.Registration.*',1,NULL,NULL,'N;'),('User.Registration.Registration',0,NULL,NULL,'N;'),('User.User.*',1,NULL,NULL,'N;'),('User.User.Index',0,NULL,NULL,'N;'),('User.User.View',0,NULL,NULL,'N;'),('Vehicle.*',1,NULL,NULL,'N;'),('Vehicle.Admin',0,NULL,NULL,'N;'),('Vehicle.Create',0,NULL,NULL,'N;'),('Vehicle.Delete',0,NULL,NULL,'N;'),('Vehicle.Index',0,NULL,NULL,'N;'),('Vehicle.Update',0,NULL,NULL,'N;'),('Vehicle.View',0,NULL,NULL,'N;'),('VehicleService.*',1,NULL,NULL,'N;'),('VehicleService.Admin',0,NULL,NULL,'N;'),('VehicleService.Create',0,NULL,NULL,'N;'),('VehicleService.Delete',0,NULL,NULL,'N;'),('VehicleService.Index',0,NULL,NULL,'N;'),('VehicleService.Update',0,NULL,NULL,'N;'),('VehicleService.View',0,NULL,NULL,'N;'),('VehicleShift.*',1,NULL,NULL,'N;'),('VehicleShift.Admin',0,NULL,NULL,'N;'),('VehicleShift.Create',0,NULL,NULL,'N;'),('VehicleShift.Delete',0,NULL,NULL,'N;'),('VehicleShift.Index',0,NULL,NULL,'N;'),('VehicleShift.Update',0,NULL,NULL,'N;'),('VehicleShift.View',0,NULL,NULL,'N;');
/*!40000 ALTER TABLE `authitem` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `authitemchild`
--

DROP TABLE IF EXISTS `authitemchild`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `authitemchild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `authitemchild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `authitemchild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `authitemchild`
--

LOCK TABLES `authitemchild` WRITE;
/*!40000 ALTER TABLE `authitemchild` DISABLE KEYS */;
INSERT INTO `authitemchild` VALUES ('operator','VehicleShift.Admin'),('operator','VehicleShift.Create');
/*!40000 ALTER TABLE `authitemchild` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profiles`
--

DROP TABLE IF EXISTS `profiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profiles` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `lastname` varchar(50) NOT NULL DEFAULT '',
  `firstname` varchar(50) NOT NULL DEFAULT '',
  `sector_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  CONSTRAINT `user_profile_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profiles`
--

LOCK TABLES `profiles` WRITE;
/*!40000 ALTER TABLE `profiles` DISABLE KEYS */;
INSERT INTO `profiles` VALUES (1,'Admin','Administrator',0),(2,'Demo','Demo',NULL),(5,'operator01','operator01',1),(6,'operator02','operator02',3);
/*!40000 ALTER TABLE `profiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profiles_fields`
--

DROP TABLE IF EXISTS `profiles_fields`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profiles_fields` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `varname` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `field_type` varchar(50) NOT NULL,
  `field_size` varchar(15) NOT NULL DEFAULT '0',
  `field_size_min` varchar(15) NOT NULL DEFAULT '0',
  `required` int(1) NOT NULL DEFAULT '0',
  `match` varchar(255) NOT NULL DEFAULT '',
  `range` varchar(255) NOT NULL DEFAULT '',
  `error_message` varchar(255) NOT NULL DEFAULT '',
  `other_validator` varchar(5000) NOT NULL DEFAULT '',
  `default` varchar(255) NOT NULL DEFAULT '',
  `widget` varchar(255) NOT NULL DEFAULT '',
  `widgetparams` varchar(5000) NOT NULL DEFAULT '',
  `position` int(3) NOT NULL DEFAULT '0',
  `visible` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `varname` (`varname`,`widget`,`visible`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profiles_fields`
--

LOCK TABLES `profiles_fields` WRITE;
/*!40000 ALTER TABLE `profiles_fields` DISABLE KEYS */;
INSERT INTO `profiles_fields` VALUES (1,'lastname','Last Name','VARCHAR','50','3',1,'','','Incorrect Last Name (length between 3 and 50 characters).','','','','',2,3),(2,'firstname','First Name','VARCHAR','50','3',1,'','','Incorrect First Name (length between 3 and 50 characters).','','','','',1,3),(3,'sector_id','Sector','INTEGER','10','0',1,'','','','','0','UWrelBelongsTo','{\"modelName\":\"SectorEkab\",\"optionName\":\"name\",\"emptyField\":\"select a sector\",\"relationName\":\"sector\"}',3,3);
/*!40000 ALTER TABLE `profiles_fields` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rights`
--

DROP TABLE IF EXISTS `rights`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rights` (
  `itemname` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  PRIMARY KEY (`itemname`),
  CONSTRAINT `rights_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rights`
--

LOCK TABLES `rights` WRITE;
/*!40000 ALTER TABLE `rights` DISABLE KEYS */;
/*!40000 ALTER TABLE `rights` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sector_ekab`
--

LOCK TABLES `sector_ekab` WRITE;
/*!40000 ALTER TABLE `sector_ekab` DISABLE KEYS */;
INSERT INTO `sector_ekab` VALUES (1,'ΙΩΑΝΝΙΝΑ','ΙΩΑΝΝΙΝΑ','Ε.Κ.Α.Β ΙΩΑΝΝΙΝΩΝ'),(2,'ΑΡΤΑ','ΑΡΤΑ','Ε.Κ.Α.Β ΑΡΤΑΣ'),(3,'ΠΡΕΒΕΖΑ','ΠΡΕΒΕΖΑ','Ε.Κ.Α.Β. ΠΡΕΒΕΖΑ'),(4,'ΘΕΣΠΡΩΤΙΑΣ','ΘΕΣΠΡΩΤΙΑΣ','Ε.Κ.Α.Β ΘΕΣΠΡΩΤΙΑΣ');
/*!40000 ALTER TABLE `sector_ekab` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `activkey` varchar(128) NOT NULL DEFAULT '',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastvisit_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `superuser` int(1) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  KEY `status` (`status`),
  KEY `superuser` (`superuser`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','21232f297a57a5a743894a0e4a801fc3','webmaster@example.com','9a24eff8c15a6a141ece27eb6947da0f','2015-02-13 15:44:12','2015-04-24 06:36:54',1,1),(2,'demo','fe01ce2a7fbac8fafaed7c982a04e229','demo@example.com','099f825543f7850cc038b90aaff39fac','2015-02-13 15:44:12','2015-02-26 09:42:45',0,1),(5,'operator01','3dcb6c888b963164fbda84fd7197b076','operator01@ekab.gr','08450113ba29185348447f76a8fa7388','2015-03-09 07:22:36','2015-03-18 15:31:42',0,1),(6,'operator02','97867ce2c54e0df82b740f27d2313402','operator02@ekab.gr','6bbbb17128fd4124174c1b9454b45b4d','2015-03-09 07:30:16','2015-03-11 15:46:40',0,1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `v_service_v_parts`
--

DROP TABLE IF EXISTS `v_service_v_parts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `v_service_v_parts` (
  `v_service_id` int(10) unsigned NOT NULL,
  `v_part_id` int(10) unsigned NOT NULL,
  `vehicle_part_item` int(10) DEFAULT NULL,
  `vehicle_part_quantity` int(10) DEFAULT NULL,
  `net_price` decimal(10,0) DEFAULT '0',
  `vat_price` decimal(10,0) DEFAULT '0',
  `description` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`v_service_id`,`v_part_id`),
  KEY `fk_service_id_idx` (`v_service_id`),
  KEY `v_service_parts_vehicleparts_fk_idx` (`v_part_id`),
  CONSTRAINT `vservicevparts_vehicleparts_fk` FOREIGN KEY (`v_part_id`) REFERENCES `vehicle_parts` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `vservicevparts_vehicleservice_fk` FOREIGN KEY (`v_service_id`) REFERENCES `vehicle_service` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `v_service_v_parts`
--

LOCK TABLES `v_service_v_parts` WRITE;
/*!40000 ALTER TABLE `v_service_v_parts` DISABLE KEYS */;
INSERT INTO `v_service_v_parts` VALUES (12,5,5,2,2,1,'description'),(15,3,NULL,NULL,8,7,''),(15,4,NULL,NULL,5,4,''),(17,5,3,0,14,7,'starter'),(18,2,NULL,NULL,0,0,''),(18,6,NULL,NULL,0,0,'');
/*!40000 ALTER TABLE `v_service_v_parts` ENABLE KEYS */;
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
  `nextservice_km` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `vehicle_sectorekab_fk` (`sector_ekab_id`),
  CONSTRAINT `vehicle_sectorekab_fk` FOREIGN KEY (`sector_ekab_id`) REFERENCES `sector_ekab` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehicle`
--

LOCK TABLES `vehicle` WRITE;
/*!40000 ALTER TABLE `vehicle` DISABLE KEYS */;
INSERT INTO `vehicle` VALUES (2,'INI 3435',14500,'2012-12-12','2012-12-12','NA','car',1,NULL),(3,'INO 4546',23000,'2012-12-12','2012-12-12','NA','CAR',3,NULL),(4,'INA 1111',23000,'2012-12-12','2012-12-12','NA','CAR',2,NULL),(6,'ΡΑΡ 8586',15000,'2008-03-05','2009-03-18','','',1,NULL);
/*!40000 ALTER TABLE `vehicle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehicle_parts`
--

DROP TABLE IF EXISTS `vehicle_parts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vehicle_parts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=ucs2;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehicle_parts`
--

LOCK TABLES `vehicle_parts` WRITE;
/*!40000 ALTER TABLE `vehicle_parts` DISABLE KEYS */;
INSERT INTO `vehicle_parts` VALUES (1,'Filter oil','Filter'),(2,'Engine Oil','Oil'),(3,'filter air',''),(4,'brakes pads',''),(5,'starter',''),(6,'turn indicators','');
/*!40000 ALTER TABLE `vehicle_parts` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehicle_service`
--

LOCK TABLES `vehicle_service` WRITE;
/*!40000 ALTER TABLE `vehicle_service` DISABLE KEYS */;
INSERT INTO `vehicle_service` VALUES (12,'annual','2015-04-25','annual service',NULL,NULL,NULL,NULL,'','garage1',2),(13,'','1970-01-01','',NULL,NULL,NULL,NULL,'','garage',3),(15,'','1970-01-01','',NULL,NULL,NULL,NULL,'','garage',3),(17,'annual','2015-04-29','test',NULL,NULL,NULL,NULL,'','garage',2),(18,'','2015-04-23','',NULL,NULL,NULL,NULL,'','garage',4);
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehicle_shift`
--

LOCK TABLES `vehicle_shift` WRITE;
/*!40000 ALTER TABLE `vehicle_shift` DISABLE KEYS */;
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

-- Dump completed on 2015-04-24 13:38:12
