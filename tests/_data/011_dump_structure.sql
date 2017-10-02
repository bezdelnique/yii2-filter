-- MySQL dump 10.16  Distrib 10.2.8-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: 192.168.9.2    Database: yii2_filter_test
-- ------------------------------------------------------
-- Server version	10.2.8-MariaDB

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
-- Table structure for table `companies`
--

DROP TABLE IF EXISTS `companies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `companies` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `name` varchar(255) NOT NULL COMMENT 'Название',
  `nick` varchar(255) NOT NULL COMMENT 'Псевдоним URL',
  `hasLogo` tinyint(1) NOT NULL COMMENT 'Есть логотип',
  `createdAt` datetime DEFAULT current_timestamp() COMMENT 'Дата создания',
  PRIMARY KEY (`id`),
  UNIQUE KEY `nick_IDX` (`nick`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `file_subtypes`
--

DROP TABLE IF EXISTS `file_subtypes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `file_subtypes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `name` varchar(255) NOT NULL COMMENT 'Название',
  `fileTypeId` int(10) unsigned NOT NULL COMMENT 'Тип файла',
  `createdAt` datetime DEFAULT current_timestamp() COMMENT 'Дата создания',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `file_types`
--

DROP TABLE IF EXISTS `file_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `file_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `name` varchar(255) NOT NULL COMMENT 'Название',
  `nick` varchar(255) NOT NULL COMMENT 'Псевдоним URL',
  `createdAt` datetime DEFAULT current_timestamp() COMMENT 'Дата создания',
  PRIMARY KEY (`id`),
  UNIQUE KEY `nick_IDX` (`nick`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `filters_small_pregen`
--

DROP TABLE IF EXISTS `filters_small_pregen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `filters_small_pregen` (
  `hardwareId` int(11) NOT NULL COMMENT 'Аппаратное обеспечение',
  `hardwareTypeId` int(11) NOT NULL COMMENT 'Тип аппаратного обеспечения',
  `companyId` int(11) NOT NULL COMMENT 'Производитель',
  `operationSystemId` int(11) NOT NULL COMMENT 'Операционная система',
  `operationSystemBitId` int(11) NOT NULL COMMENT 'Разрядность операционной системы',
  `fileTypeId` int(11) NOT NULL COMMENT 'Тип файла',
  PRIMARY KEY (`hardwareId`,`hardwareTypeId`,`companyId`,`operationSystemId`,`operationSystemBitId`,`fileTypeId`),
  KEY `companyId_IDX` (`companyId`) USING BTREE,
  KEY `hardwareTypeId_IDX` (`hardwareTypeId`) USING BTREE,
  KEY `coht_IDX` (`companyId`,`hardwareTypeId`) USING BTREE,
  KEY `coos_IDX` (`companyId`,`operationSystemId`) USING BTREE,
  KEY `coha_IDX` (`companyId`,`hardwareId`) USING BTREE,
  KEY `haco_IDX` (`hardwareTypeId`,`companyId`) USING BTREE,
  KEY `haos_IDX` (`hardwareTypeId`,`operationSystemId`) USING BTREE,
  KEY `hwht_IDX` (`hardwareId`,`hardwareTypeId`) USING BTREE,
  KEY `hwos_IDX` (`hardwareId`,`operationSystemId`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hardware_subtypes`
--

DROP TABLE IF EXISTS `hardware_subtypes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hardware_subtypes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `name` varchar(255) NOT NULL COMMENT 'Название',
  `hardwareTypeId` int(10) unsigned NOT NULL COMMENT 'Тип оборудования',
  `createdAt` datetime DEFAULT current_timestamp() COMMENT 'Дата создания',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hardware_types`
--

DROP TABLE IF EXISTS `hardware_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hardware_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `name` varchar(255) NOT NULL COMMENT 'Название',
  `nick` varchar(255) NOT NULL COMMENT 'Псевдоним URL',
  `createdAt` datetime DEFAULT current_timestamp() COMMENT 'Дата создания',
  PRIMARY KEY (`id`),
  UNIQUE KEY `nick_IDX` (`nick`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `operation_system_bits`
--

DROP TABLE IF EXISTS `operation_system_bits`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `operation_system_bits` (
  `id` int(10) unsigned NOT NULL COMMENT 'ID',
  `name` varchar(255) DEFAULT NULL COMMENT 'Название',
  `nick` varchar(255) NOT NULL COMMENT 'Псевдоним URL',
  `createdAt` datetime DEFAULT current_timestamp() COMMENT 'Дата создания',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `operation_system_versions`
--

DROP TABLE IF EXISTS `operation_system_versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `operation_system_versions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `name` varchar(255) DEFAULT NULL COMMENT 'Название',
  `type` int(10) unsigned NOT NULL COMMENT 'Операционная система',
  `bit` int(1) unsigned NOT NULL COMMENT 'Разрядность ОС',
  `text` text DEFAULT NULL COMMENT 'Описание',
  `createdAt` datetime DEFAULT current_timestamp() COMMENT 'Дата создания',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `operation_systems`
--

DROP TABLE IF EXISTS `operation_systems`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `operation_systems` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `name` varchar(255) NOT NULL COMMENT 'Название',
  `nick` varchar(255) NOT NULL COMMENT 'Псевдоним URL',
  `createdAt` datetime DEFAULT current_timestamp() COMMENT 'Дата создания',
  PRIMARY KEY (`id`),
  UNIQUE KEY `nick_IDX` (`nick`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-10-02 20:08:24
