-- MySQL dump 10.13  Distrib 5.6.13, for FreeBSD9.1 (amd64)
--
-- Host: localhost    Database: sf
-- ------------------------------------------------------
-- Server version	5.6.13

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
-- Table structure for table `AuthAssignment`
--

DROP TABLE IF EXISTS `AuthAssignment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `AuthAssignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,`userid`),
  CONSTRAINT `AuthAssignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `AuthItem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `AuthAssignment`
--

LOCK TABLES `AuthAssignment` WRITE;
/*!40000 ALTER TABLE `AuthAssignment` DISABLE KEYS */;
/*!40000 ALTER TABLE `AuthAssignment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `AuthItem`
--

DROP TABLE IF EXISTS `AuthItem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `AuthItem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `AuthItem`
--

LOCK TABLES `AuthItem` WRITE;
/*!40000 ALTER TABLE `AuthItem` DISABLE KEYS */;
/*!40000 ALTER TABLE `AuthItem` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `AuthItemChild`
--

DROP TABLE IF EXISTS `AuthItemChild`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `AuthItemChild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `AuthItemChild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `AuthItem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `AuthItemChild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `AuthItem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `AuthItemChild`
--

LOCK TABLES `AuthItemChild` WRITE;
/*!40000 ALTER TABLE `AuthItemChild` DISABLE KEYS */;
/*!40000 ALTER TABLE `AuthItemChild` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_address`
--

DROP TABLE IF EXISTS `tbl_address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `address` varchar(200) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `tbl_clients_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `tbl_clients_id_idx` (`tbl_clients_id`),
  CONSTRAINT `tbl_clients_id` FOREIGN KEY (`tbl_clients_id`) REFERENCES `tbl_clients` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_address`
--

LOCK TABLES `tbl_address` WRITE;
/*!40000 ALTER TABLE `tbl_address` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_blocked`
--

DROP TABLE IF EXISTS `tbl_blocked`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_blocked` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(200) NOT NULL,
  `date` datetime NOT NULL,
  `tbl_user_id` int(11) NOT NULL,
  `tbl_clients_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_tbl_blocked_tbl_user1_idx` (`tbl_user_id`),
  KEY `fk_tbl_blocked_tbl_clients1_idx` (`tbl_clients_id`),
  CONSTRAINT `fk_tbl_blocked_tbl_user1` FOREIGN KEY (`tbl_user_id`) REFERENCES `tbl_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_blocked_tbl_clients1` FOREIGN KEY (`tbl_clients_id`) REFERENCES `tbl_clients` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_blocked`
--

LOCK TABLES `tbl_blocked` WRITE;
/*!40000 ALTER TABLE `tbl_blocked` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_blocked` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_cat`
--

DROP TABLE IF EXISTS `tbl_cat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_cat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `image` varchar(45) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `enabled` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_cat`
--

LOCK TABLES `tbl_cat` WRITE;
/*!40000 ALTER TABLE `tbl_cat` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_cat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_claim`
--

DROP TABLE IF EXISTS `tbl_claim`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_claim` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `resolution` varchar(100) NOT NULL,
  `description` varchar(300) DEFAULT NULL,
  `tbl_order_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_tbl_claim_tbl_order1_idx` (`tbl_order_id`),
  CONSTRAINT `fk_tbl_claim_tbl_order1` FOREIGN KEY (`tbl_order_id`) REFERENCES `tbl_order` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_claim`
--

LOCK TABLES `tbl_claim` WRITE;
/*!40000 ALTER TABLE `tbl_claim` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_claim` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_clients`
--

DROP TABLE IF EXISTS `tbl_clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `tbl_discount_type_id` int(11) NOT NULL,
  `blocked` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `tbl_discount_type_id_idx` (`tbl_discount_type_id`),
  CONSTRAINT `tbl_discount_type_id` FOREIGN KEY (`tbl_discount_type_id`) REFERENCES `tbl_discount_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_clients`
--

LOCK TABLES `tbl_clients` WRITE;
/*!40000 ALTER TABLE `tbl_clients` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_count_in`
--

DROP TABLE IF EXISTS `tbl_count_in`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_count_in` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `count` float DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `tbl_unit_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_tbl_count_in_tbl_unit1_idx` (`tbl_unit_id`),
  CONSTRAINT `fk_tbl_count_in_tbl_unit1` FOREIGN KEY (`tbl_unit_id`) REFERENCES `tbl_unit` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_count_in`
--

LOCK TABLES `tbl_count_in` WRITE;
/*!40000 ALTER TABLE `tbl_count_in` DISABLE KEYS */;
INSERT INTO `tbl_count_in` VALUES (3,0.5,'Рис 500',1);
/*!40000 ALTER TABLE `tbl_count_in` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_courier`
--

DROP TABLE IF EXISTS `tbl_courier`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_courier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_courier`
--

LOCK TABLES `tbl_courier` WRITE;
/*!40000 ALTER TABLE `tbl_courier` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_courier` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_discount_type`
--

DROP TABLE IF EXISTS `tbl_discount_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_discount_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(45) NOT NULL,
  `date` datetime DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `value` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_discount_type`
--

LOCK TABLES `tbl_discount_type` WRITE;
/*!40000 ALTER TABLE `tbl_discount_type` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_discount_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_ingred`
--

DROP TABLE IF EXISTS `tbl_ingred`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_ingred` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `amount` int(11) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `tbl_provider_id` int(11) NOT NULL,
  `image` varchar(45) DEFAULT 'tbl_ingred.png',
  `cost` decimal(10,2) DEFAULT NULL,
  `tbl_unit_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_tbl_ingred_tbl_provider1_idx` (`tbl_provider_id`),
  KEY `fk_tbl_ingred_tbl_unit1_idx` (`tbl_unit_id`),
  CONSTRAINT `fk_tbl_ingred_tbl_provider1` FOREIGN KEY (`tbl_provider_id`) REFERENCES `tbl_provider` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_ingred_tbl_unit1` FOREIGN KEY (`tbl_unit_id`) REFERENCES `tbl_unit` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_ingred`
--

LOCK TABLES `tbl_ingred` WRITE;
/*!40000 ALTER TABLE `tbl_ingred` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_ingred` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_ingred_invoice`
--

DROP TABLE IF EXISTS `tbl_ingred_invoice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_ingred_invoice` (
  `tbl_ingred_id` int(11) NOT NULL,
  `tbl_invoice_id` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_tbl_ingred_has_tbl_invoice_tbl_invoice1_idx` (`tbl_invoice_id`),
  KEY `fk_tbl_ingred_has_tbl_invoice_tbl_ingred1_idx` (`tbl_ingred_id`),
  CONSTRAINT `fk_tbl_ingred_has_tbl_invoice_tbl_ingred1` FOREIGN KEY (`tbl_ingred_id`) REFERENCES `tbl_ingred` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_ingred_has_tbl_invoice_tbl_invoice1` FOREIGN KEY (`tbl_invoice_id`) REFERENCES `tbl_invoice` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_ingred_invoice`
--

LOCK TABLES `tbl_ingred_invoice` WRITE;
/*!40000 ALTER TABLE `tbl_ingred_invoice` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_ingred_invoice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_invoice`
--

DROP TABLE IF EXISTS `tbl_invoice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_invoice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `count` float NOT NULL,
  `cost` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_invoice`
--

LOCK TABLES `tbl_invoice` WRITE;
/*!40000 ALTER TABLE `tbl_invoice` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_invoice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_kitchen`
--

DROP TABLE IF EXISTS `tbl_kitchen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_kitchen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `image` varchar(45) DEFAULT 'tbl_kitchen.png',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_kitchen`
--

LOCK TABLES `tbl_kitchen` WRITE;
/*!40000 ALTER TABLE `tbl_kitchen` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_kitchen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_order`
--

DROP TABLE IF EXISTS `tbl_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_time` datetime NOT NULL,
  `tbl_user_id` int(11) NOT NULL,
  `tbl_client_id` int(11) NOT NULL,
  `description` varchar(200) DEFAULT NULL,
  `tbl_courier_id` int(11) NOT NULL,
  `tbl_state_id` int(11) NOT NULL,
  `cost` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `tbl_user_id_idx` (`tbl_user_id`),
  KEY `tbl_client_id_idx` (`tbl_client_id`),
  KEY `fk_tbl_order_tbl_courier1_idx` (`tbl_courier_id`),
  KEY `fk_tbl_order_tbl_state1_idx` (`tbl_state_id`),
  CONSTRAINT `tbl_user_id` FOREIGN KEY (`tbl_user_id`) REFERENCES `tbl_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `tbl_client_id` FOREIGN KEY (`tbl_client_id`) REFERENCES `tbl_clients` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_order_tbl_courier1` FOREIGN KEY (`tbl_courier_id`) REFERENCES `tbl_courier` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_order_tbl_state1` FOREIGN KEY (`tbl_state_id`) REFERENCES `tbl_state` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_order`
--

LOCK TABLES `tbl_order` WRITE;
/*!40000 ALTER TABLE `tbl_order` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_order_list`
--

DROP TABLE IF EXISTS `tbl_order_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_order_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `count` int(11) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `tbl_product_id` int(11) NOT NULL,
  `tbl_order_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_tbl_order_list_tbl_product1_idx` (`tbl_product_id`),
  KEY `fk_tbl_order_list_tbl_order1_idx` (`tbl_order_id`),
  CONSTRAINT `fk_tbl_order_list_tbl_product1` FOREIGN KEY (`tbl_product_id`) REFERENCES `tbl_product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_order_list_tbl_order1` FOREIGN KEY (`tbl_order_id`) REFERENCES `tbl_order` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_order_list`
--

LOCK TABLES `tbl_order_list` WRITE;
/*!40000 ALTER TABLE `tbl_order_list` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_order_list` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_phones`
--

DROP TABLE IF EXISTS `tbl_phones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_phones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `phone` int(11) NOT NULL,
  `enable` tinyint(1) NOT NULL,
  `tbl_clients_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_tbl_phones_tbl_clients1_idx` (`tbl_clients_id`),
  CONSTRAINT `fk_tbl_phones_tbl_clients1` FOREIGN KEY (`tbl_clients_id`) REFERENCES `tbl_clients` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_phones`
--

LOCK TABLES `tbl_phones` WRITE;
/*!40000 ALTER TABLE `tbl_phones` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_phones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_prepack`
--

DROP TABLE IF EXISTS `tbl_prepack`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_prepack` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `image` varchar(45) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `cost` decimal(10,2) DEFAULT NULL,
  `out` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_prepack`
--

LOCK TABLES `tbl_prepack` WRITE;
/*!40000 ALTER TABLE `tbl_prepack` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_prepack` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_prepack_ingred`
--

DROP TABLE IF EXISTS `tbl_prepack_ingred`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_prepack_ingred` (
  `tbl_prepack_id` int(11) NOT NULL,
  `tbl_ingred_id` int(11) NOT NULL,
  `out` float DEFAULT NULL,
  `count` float DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `image` varchar(45) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_tbl_prepack_has_tbl_ingred_tbl_ingred1_idx` (`tbl_ingred_id`),
  KEY `fk_tbl_prepack_has_tbl_ingred_tbl_prepack1_idx` (`tbl_prepack_id`),
  CONSTRAINT `fk_tbl_prepack_has_tbl_ingred_tbl_ingred1` FOREIGN KEY (`tbl_ingred_id`) REFERENCES `tbl_ingred` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_prepack_has_tbl_ingred_tbl_prepack1` FOREIGN KEY (`tbl_prepack_id`) REFERENCES `tbl_prepack` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_prepack_ingred`
--

LOCK TABLES `tbl_prepack_ingred` WRITE;
/*!40000 ALTER TABLE `tbl_prepack_ingred` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_prepack_ingred` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_prepack_prepack`
--

DROP TABLE IF EXISTS `tbl_prepack_prepack`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_prepack_prepack` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tbl_prepack_id` int(11) NOT NULL,
  `prepack_id` int(11) DEFAULT NULL,
  `count` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_table2_tbl_prepack1_idx` (`tbl_prepack_id`),
  CONSTRAINT `fk_table2_tbl_prepack1` FOREIGN KEY (`tbl_prepack_id`) REFERENCES `tbl_prepack` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_prepack_prepack`
--

LOCK TABLES `tbl_prepack_prepack` WRITE;
/*!40000 ALTER TABLE `tbl_prepack_prepack` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_prepack_prepack` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_product`
--

DROP TABLE IF EXISTS `tbl_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` varchar(200) DEFAULT NULL,
  `tbl_kitchen_id` int(11) NOT NULL,
  `image` varchar(200) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `enabled` tinyint(1) DEFAULT '1',
  `own_price` decimal(10,2) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_tbl_product_tbl_kitchen1_idx` (`tbl_kitchen_id`),
  CONSTRAINT `fk_tbl_product_tbl_kitchen1` FOREIGN KEY (`tbl_kitchen_id`) REFERENCES `tbl_kitchen` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_product`
--

LOCK TABLES `tbl_product` WRITE;
/*!40000 ALTER TABLE `tbl_product` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_product_cat`
--

DROP TABLE IF EXISTS `tbl_product_cat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_product_cat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sort` int(11) DEFAULT NULL,
  `tbl_product_id` int(11) NOT NULL,
  `tbl_cat_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_tbl_product_cat_tbl_product1_idx` (`tbl_product_id`),
  KEY `fk_tbl_product_cat_tbl_cat1_idx` (`tbl_cat_id`),
  CONSTRAINT `fk_tbl_product_cat_tbl_product1` FOREIGN KEY (`tbl_product_id`) REFERENCES `tbl_product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_product_cat_tbl_cat1` FOREIGN KEY (`tbl_cat_id`) REFERENCES `tbl_cat` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_product_cat`
--

LOCK TABLES `tbl_product_cat` WRITE;
/*!40000 ALTER TABLE `tbl_product_cat` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_product_cat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_product_ingred`
--

DROP TABLE IF EXISTS `tbl_product_ingred`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_product_ingred` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tbl_product_id` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `tbl_ingred_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_tbl_product_ingred_tbl_product1_idx` (`tbl_product_id`),
  KEY `fk_tbl_product_ingred_tbl_ingred1_idx` (`tbl_ingred_id`),
  CONSTRAINT `fk_tbl_product_ingred_tbl_product1` FOREIGN KEY (`tbl_product_id`) REFERENCES `tbl_product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_product_ingred_tbl_ingred1` FOREIGN KEY (`tbl_ingred_id`) REFERENCES `tbl_ingred` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_product_ingred`
--

LOCK TABLES `tbl_product_ingred` WRITE;
/*!40000 ALTER TABLE `tbl_product_ingred` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_product_ingred` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_product_prepack`
--

DROP TABLE IF EXISTS `tbl_product_prepack`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_product_prepack` (
  `tbl_product_id` int(11) NOT NULL,
  `tbl_prepack_id` int(11) NOT NULL,
  `count` float DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_tbl_product_has_tbl_prepack_tbl_prepack1_idx` (`tbl_prepack_id`),
  KEY `fk_tbl_product_has_tbl_prepack_tbl_product1_idx` (`tbl_product_id`),
  CONSTRAINT `fk_tbl_product_has_tbl_prepack_tbl_product1` FOREIGN KEY (`tbl_product_id`) REFERENCES `tbl_product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_product_has_tbl_prepack_tbl_prepack1` FOREIGN KEY (`tbl_prepack_id`) REFERENCES `tbl_prepack` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_product_prepack`
--

LOCK TABLES `tbl_product_prepack` WRITE;
/*!40000 ALTER TABLE `tbl_product_prepack` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_product_prepack` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_provider`
--

DROP TABLE IF EXISTS `tbl_provider`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_provider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `phone` int(11) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `contact_person` varchar(45) DEFAULT NULL,
  `image` varchar(45) DEFAULT 'tbl_provider.png',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_provider`
--

LOCK TABLES `tbl_provider` WRITE;
/*!40000 ALTER TABLE `tbl_provider` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_provider` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_state`
--

DROP TABLE IF EXISTS `tbl_state`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_state` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_state`
--

LOCK TABLES `tbl_state` WRITE;
/*!40000 ALTER TABLE `tbl_state` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_state` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_unit`
--

DROP TABLE IF EXISTS `tbl_unit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_unit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_unit`
--

LOCK TABLES `tbl_unit` WRITE;
/*!40000 ALTER TABLE `tbl_unit` DISABLE KEYS */;
INSERT INTO `tbl_unit` VALUES (1,'Килограмм'),(2,'Штука'),(3,'Литр');
/*!40000 ALTER TABLE `tbl_unit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role` int(11) NOT NULL,
  `enable` tinyint(1) NOT NULL DEFAULT '1',
  `tbl_user_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_user`
--

LOCK TABLES `tbl_user` WRITE;
/*!40000 ALTER TABLE `tbl_user` DISABLE KEYS */;
INSERT INTO `tbl_user` VALUES (3,'admin','$2a$13$hxhacbzPirvit5jih3yil.cjMZT/Uye39FFONOvjKVJroGCtphcK2',1,1,1,'2029-11-20 13:00:00'),(4,'demo','$2a$13$hFvwnM13t7OgL/KubYo7QOGvPUPYXylANO8jU7B.zVre4T12v4xo6',2,1,1,'2002-12-20 13:00:00'),(6,'lim','$2a$13$aN3i2OxfukHZOfayYd6d4eHwWxJw3whUFflT34WaIuqUUjU48RwKa',2,1,0,'2012-03-20 13:00:00');
/*!40000 ALTER TABLE `tbl_user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-12-30 13:04:54
