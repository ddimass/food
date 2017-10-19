-- MySQL dump 10.13  Distrib 5.1.71, for redhat-linux-gnu (x86_64)
--
-- Host: localhost    Database: Sofit_Food
-- ------------------------------------------------------
-- Server version	5.1.71-log

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_address`
--

LOCK TABLES `tbl_address` WRITE;
/*!40000 ALTER TABLE `tbl_address` DISABLE KEYS */;
INSERT INTO `tbl_address` VALUES (1,'ул. Клиническая 5',NULL,1),(2,'ул. Сомера 10',NULL,2);
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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_cat`
--

LOCK TABLES `tbl_cat` WRITE;
/*!40000 ALTER TABLE `tbl_cat` DISABLE KEYS */;
INSERT INTO `tbl_cat` VALUES (1,'Роллы','',NULL,NULL,1),(2,'Запечённые роллы','',NULL,NULL,1),(3,'Роллы маленькие','',NULL,NULL,1),(4,'Крем-роллы','',NULL,NULL,1),(5,'Суши','',NULL,NULL,1),(6,'Острые суши','',NULL,NULL,1),(7,'Запечённые суши','',NULL,NULL,1),(8,'Сашими','',NULL,NULL,1),(9,'Сеты','',NULL,NULL,1),(10,'Салаты','',NULL,NULL,1),(11,'Супы','',NULL,NULL,1),(12,'Японские сендвичи','',NULL,NULL,1),(13,'Лапша','',NULL,NULL,1);
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_clients`
--

LOCK TABLES `tbl_clients` WRITE;
/*!40000 ALTER TABLE `tbl_clients` DISABLE KEYS */;
INSERT INTO `tbl_clients` VALUES (1,'Ирина',1,0),(2,'Игорь',1,0);
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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_count_in`
--

LOCK TABLES `tbl_count_in` WRITE;
/*!40000 ALTER TABLE `tbl_count_in` DISABLE KEYS */;
INSERT INTO `tbl_count_in` VALUES (5,1,'Один к одному',7),(6,0.9,'Рис 900',7),(9,20,'Уксус 20 литров',5),(10,19,'Соус Киккоман 19 литров',5),(11,0.14,'Нори 140',7),(12,0.5,'Масаго',7),(13,0.42,'Масло Кунжутное 420 мл',5),(14,1.8,'Паста Кимчи 1,8 л',5),(15,0.3,'Вермишель  0,3 кг',7),(16,0.9,'Бутылка 0.9',5),(17,0.39,'Упаковка 390',7);
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_courier`
--

LOCK TABLES `tbl_courier` WRITE;
/*!40000 ALTER TABLE `tbl_courier` DISABLE KEYS */;
INSERT INTO `tbl_courier` VALUES (1,'Александр Свистоплясов','9211119876');
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_discount_type`
--

LOCK TABLES `tbl_discount_type` WRITE;
/*!40000 ALTER TABLE `tbl_discount_type` DISABLE KEYS */;
INSERT INTO `tbl_discount_type` VALUES (1,'Нет','0000-00-00 00:00:00','',0);
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
  `amount` float DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `image` varchar(45) DEFAULT 'tbl_ingred.png',
  `cost` decimal(10,2) DEFAULT NULL,
  `tbl_count_in_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_tbl_ingred_tbl_count_in1_idx` (`tbl_count_in_id`),
  CONSTRAINT `fk_tbl_ingred_tbl_count_in1` FOREIGN KEY (`tbl_count_in_id`) REFERENCES `tbl_count_in` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=109 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_ingred`
--

LOCK TABLES `tbl_ingred` WRITE;
/*!40000 ALTER TABLE `tbl_ingred` DISABLE KEYS */;
INSERT INTO `tbl_ingred` VALUES (6,'Рис',95,NULL,'tbl_ingred.png','1867.33',5),(7,'Семга филе',20,NULL,'tbl_ingred.png','8400.00',5),(8,'Сыр',3.52,NULL,'tbl_ingred.png','739.20',5),(9,'Уксус',20,NULL,'tbl_ingred.png','1500.00',9),(10,'Соус Киккоман',19,NULL,'tbl_ingred.png','1950.00',10),(11,'Комбу',1,NULL,'tbl_ingred.png','500.00',5),(12,'Сахар',61,NULL,'tbl_ingred.png','1486.90',5),(13,'Соль',11,NULL,'tbl_ingred.png','90.90',5),(14,'Масло растительное',10,NULL,'tbl_ingred.png','480.00',5),(15,'Нори',0.7,NULL,'tbl_ingred.png','750.00',11),(16,'Майонез',10,NULL,'tbl_ingred.png','578.27',5),(17,'Сыр  Творожный',12,NULL,'tbl_ingred.png','3104.40',5),(18,'Масага ',2.5,NULL,'tbl_ingred.png','880.00',12),(19,'Морской коктель',1.5,NULL,'tbl_ingred.png','280.00',5),(20,'Мясо мидии',0.5,NULL,'tbl_ingred.png','224.00',5),(21,'Креветка тигровая 16/20',2,NULL,'tbl_ingred.png','625.00',5),(22,'Краб мясо',0.75,NULL,'tbl_ingred.png','181.80',5),(23,'Соус ореховый',1,NULL,'tbl_ingred.png','450.00',5),(24,'Соус ореховый(изменить)',NULL,NULL,'tbl_ingred.png',NULL,5),(25,'Паста Мисо',3,NULL,'tbl_ingred.png','300.00',5),(26,'Масло кунжутное 420 мл',0.42,NULL,'tbl_ingred.png','140.00',13),(27,'Паста Табаджан',1,NULL,'tbl_ingred.png','450.00',5),(28,'Паста Кимчи 1,8 л',1.8,NULL,'tbl_ingred.png','630.00',14),(29,'Вермишель 0,3',3,NULL,'tbl_ingred.png','450.00',15),(30,'Вакаме',0,NULL,'tbl_ingred.png','250.00',5),(31,'Тосака',2,NULL,'tbl_ingred.png','1800.00',5),(32,'Темпура',5,NULL,'tbl_ingred.png','425.00',5),(33,'Стружка Тунца',0.5,NULL,'tbl_ingred.png','600.00',5),(34,'Салат из водорослей Чука',2,NULL,'tbl_ingred.png','500.00',5),(35,'Тунец филе',3,NULL,'tbl_ingred.png','3050.00',5),(36,'Сыр Тофу',0.349,NULL,'tbl_ingred.png','90.00',5),(37,'Хондаши',NULL,NULL,'tbl_ingred.png',NULL,5),(38,'Грибы черные древесные',1,NULL,'tbl_ingred.png','215.00',5),(39,'Соус',NULL,NULL,'tbl_ingred.png',NULL,16),(40,'Угорь',5,NULL,'tbl_ingred.png','5500.00',5),(41,'Каракатица',3,NULL,'tbl_ingred.png','1530.00',5),(42,'Авокадо',2,NULL,'tbl_ingred.png','43.00',5),(43,'Укроп',0.2,NULL,'tbl_ingred.png','28.40',5),(44,'Перец свежий',0.716,NULL,'tbl_ingred.png','69.97',5),(45,'Дайкон',0.482,NULL,'tbl_ingred.png','31.28',5),(46,'Лук репчатый',2.03,NULL,'tbl_ingred.png','82.74',5),(47,'Сахар(изменить)',NULL,NULL,'tbl_ingred.png',NULL,5),(48,'Огурец свежий',0.6,NULL,'tbl_ingred.png','56.80',5),(49,'Морковь',1,NULL,'tbl_ingred.png','30.90',5),(50,'Перец черный молотый',0.025,NULL,'tbl_ingred.png','17.90',5),(51,'Лимон(изменить)',NULL,NULL,'tbl_ingred.png',NULL,5),(52,'Чеснок(изменить)',NULL,NULL,'tbl_ingred.png',NULL,5),(53,'Помидоры',0.426,NULL,'tbl_ingred.png','20.83',5),(54,'Овощи для жарки',0.39,NULL,'tbl_ingred.png','33.90',17),(55,'Филей ЧМК',0.168,NULL,'tbl_ingred.png','68.88',5),(56,'Овощная смесь',0.39,NULL,'tbl_ingred.png','26.90',17),(57,'Капуста пиинская',1.2,NULL,'tbl_ingred.png','27.48',5),(58,'Соль(изменить)',NULL,NULL,'tbl_ingred.png',NULL,5),(59,'Лимон',0.284,NULL,'tbl_ingred.png','15.31',5),(60,'Чеснок',0.314,NULL,'tbl_ingred.png','29.17',5),(61,'Куриное филе в/к',0.41,NULL,'tbl_ingred.png','84.00',5),(62,'Куриное бедро б/к',2,NULL,'tbl_ingred.png','230.00',5),(63,'Свиная шея',NULL,NULL,'tbl_ingred.png',NULL,5),(64,'Судак филе',2,NULL,'tbl_ingred.png','400.00',5),(65,'Крабовые палочки',5.6,NULL,'tbl_ingred.png','1512.00',5),(66,'Икра Масаго красная',1.5,NULL,'tbl_ingred.png','528.00',5),(67,'Икра Масаго оранжевая',1.5,NULL,'tbl_ingred.png','528.00',5),(68,'Икра Масаго черная',1.5,NULL,'tbl_ingred.png','528.00',5),(69,'Кунжут белый',2,NULL,'tbl_ingred.png','320.00',5),(70,'Грибы шитаке',1,NULL,'tbl_ingred.png','350.00',5),(71,'Креветки тигровые б/г',2,NULL,'tbl_ingred.png','1180.00',5),(72,'Сыр  Творожный(изменить)',NULL,NULL,'tbl_ingred.png',NULL,5),(73,'Васаби',10,NULL,'tbl_ingred.png','1450.00',5),(74,'Имбирь маринованый',10,NULL,'tbl_ingred.png','1100.00',5),(75,'Тунец филе(изменить)',NULL,NULL,'tbl_ingred.png',NULL,5),(76,'Пакет',NULL,NULL,'tbl_ingred.png',NULL,5),(77,'Палочки бамбуковые',1000,NULL,'tbl_ingred.png','810.00',5),(78,'Семга х/к',0.3,NULL,'tbl_ingred.png','180.00',5),(79,'Вода для рецептов',100,NULL,'tbl_ingred.png','0.01',5),(80,'Глютанат натрия',1,NULL,'tbl_ingred.png','80.00',5),(81,'Унаги соус',100,NULL,'tbl_ingred.png','0.01',5),(82,'Стакан бумажный 250 мл.',200,NULL,'tbl_ingred.png','262.00',5),(83,'Крышка для стакана бум. 250 мл.',NULL,NULL,'tbl_ingred.png',NULL,5),(84,'Контейнер малый 176*96*20',NULL,NULL,'tbl_ingred.png',NULL,5),(85,'Контейне средний 185*129*20',NULL,NULL,'tbl_ingred.png',NULL,5),(86,'Контейнер большой 215*135*20',NULL,NULL,'tbl_ingred.png',NULL,5),(87,'Крышка 176*96*31',NULL,NULL,'tbl_ingred.png',NULL,5),(88,'Крышка 190*135*30',NULL,NULL,'tbl_ingred.png',NULL,5),(89,'Крышка 215*135*80',NULL,NULL,'tbl_ingred.png',NULL,5),(90,'Контейнер 9197 (150 мл.)',NULL,NULL,'tbl_ingred.png',NULL,5),(91,'Крышка Р9196',NULL,NULL,'tbl_ingred.png',NULL,5),(92,'Контейнер 8750',NULL,NULL,'tbl_ingred.png',NULL,5),(93,'Крышка Р8750',NULL,NULL,'tbl_ingred.png',NULL,5),(94,'Пакет HDPE10*22 (1/1000)',NULL,NULL,'tbl_ingred.png',NULL,5),(95,'Салфетка 24*24 (1/100)',NULL,NULL,'tbl_ingred.png',NULL,5),(96,'Палочки для шашлыка 20 см',NULL,NULL,'tbl_ingred.png',NULL,5),(97,'Зубочистка (1/1000)',NULL,NULL,'tbl_ingred.png',NULL,5),(98,'Перчатки п/э (1/100)',500,NULL,'tbl_ingred.png','92.00',5),(99,'Пакет - майка 30*55(1/100)',500,NULL,'tbl_ingred.png','297.00',5),(100,'Струна 15*20 (1/100)',200,NULL,'tbl_ingred.png','107.00',5),(101,'Ложка столовая (1/100)',500,NULL,'tbl_ingred.png','199.00',5),(102,'Вилка большая (1/100)',500,NULL,'tbl_ingred.png','174.00',5),(103,'Меню бокс 1 секц.',100,NULL,'tbl_ingred.png','350.00',5),(104,'Миска из пеноп. 0,34 л.(1/25)',100,NULL,'tbl_ingred.png','204.00',5),(105,'Крышка для миски пеноп.(1/50)',100,NULL,'tbl_ingred.png','109.00',5),(106,'Полотенца бумажные',5,NULL,'tbl_ingred.png','424.00',5),(107,'Мешалка для гор. напитков (1/1000)',1000,NULL,'tbl_ingred.png','108.00',5),(108,'Коробка д/лапши 0,55 мл.',100,NULL,'tbl_ingred.png','650.00',5);
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
  `count` float NOT NULL,
  `cost` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_tbl_ingred_has_tbl_invoice_tbl_invoice1_idx` (`tbl_invoice_id`),
  KEY `fk_tbl_ingred_has_tbl_invoice_tbl_ingred1_idx` (`tbl_ingred_id`),
  CONSTRAINT `fk_tbl_ingred_has_tbl_invoice_tbl_ingred1` FOREIGN KEY (`tbl_ingred_id`) REFERENCES `tbl_ingred` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_ingred_has_tbl_invoice_tbl_invoice1` FOREIGN KEY (`tbl_invoice_id`) REFERENCES `tbl_invoice` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=211 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_ingred_invoice`
--

LOCK TABLES `tbl_ingred_invoice` WRITE;
/*!40000 ALTER TABLE `tbl_ingred_invoice` DISABLE KEYS */;
INSERT INTO `tbl_ingred_invoice` VALUES (16,33,37,10,'578.27'),(12,31,42,10,'255.00'),(14,31,43,10,'480.00'),(8,31,44,3.52,'739.20'),(7,29,48,20,'8400.00'),(12,26,51,50,'1200.00'),(13,26,52,10,'80.00'),(6,30,54,50,'1700.00'),(18,32,57,5,'880.00'),(19,32,58,0.5,'140.00'),(20,32,59,0.5,'112.00'),(21,32,60,1,'625.00'),(22,32,61,0.75,'181.80'),(10,28,98,1,'1950.00'),(9,28,99,1,'1500.00'),(11,28,100,1,'500.00'),(15,28,101,5,'750.00'),(23,28,102,1,'450.00'),(25,28,103,3,'300.00'),(26,28,104,1,'140.00'),(27,28,105,1,'450.00'),(28,28,106,1,'630.00'),(29,28,107,10,'450.00'),(31,28,108,2,'1800.00'),(32,28,109,5,'425.00'),(33,28,110,0.5,'600.00'),(34,28,111,2,'500.00'),(35,28,112,1,'1250.00'),(36,28,113,0.349,'90.00'),(38,34,114,1,'215.00'),(17,35,115,10,'2600.00'),(40,36,118,5,'5500.00'),(41,36,119,3,'1530.00'),(55,39,128,0.168,'68.88'),(54,39,129,1,'33.90'),(56,39,130,1,'26.90'),(57,40,131,1.2,'27.48'),(42,41,132,2,'43.00'),(44,42,134,0.716,'69.97'),(43,42,135,0.1,'28.40'),(45,42,136,0.482,'31.28'),(46,42,137,2.03,'82.74'),(12,42,138,1,'31.90'),(48,42,139,0.6,'56.80'),(49,42,140,1,'30.90'),(50,42,141,0.025,'17.90'),(53,42,142,0.426,'20.83'),(13,42,143,1,'10.90'),(59,42,144,0.284,'15.31'),(60,42,145,0.314,'29.17'),(61,43,146,0.41,'84.00'),(62,44,147,2,'230.00'),(64,45,148,2,'400.00'),(65,46,150,5.6,'1512.00'),(66,46,151,1.5,'528.00'),(67,46,152,1.5,'528.00'),(68,46,153,1.5,'528.00'),(35,47,155,2,'1800.00'),(77,47,156,1000,'810.00'),(73,48,158,10,'1450.00'),(74,48,159,10,'1100.00'),(69,49,161,2,'320.00'),(70,49,162,1,'350.00'),(71,50,163,2,'1180.00'),(6,51,164,45,'167.33'),(17,52,165,2,'504.40'),(78,55,169,0.3,'180.00'),(80,56,171,1,'80.00'),(79,54,172,100,'0.01'),(81,54,173,100,'0.01'),(21,57,174,1,'0.00'),(82,59,184,200,'262.00'),(98,58,200,500,'92.00'),(99,58,201,500,'297.00'),(100,58,202,200,'107.00'),(101,58,203,500,'199.00'),(102,58,204,500,'174.00'),(103,58,205,100,'350.00'),(104,58,206,100,'204.00'),(105,58,207,100,'109.00'),(106,58,208,5,'424.00'),(107,58,209,1000,'108.00'),(108,58,210,100,'650.00');
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
  `number` varchar(45) DEFAULT NULL,
  `tbl_provider_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_tbl_invoice_tbl_provider1_idx` (`tbl_provider_id`),
  CONSTRAINT `fk_tbl_invoice_tbl_provider1` FOREIGN KEY (`tbl_provider_id`) REFERENCES `tbl_provider` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_invoice`
--

LOCK TABLES `tbl_invoice` WRITE;
/*!40000 ALTER TABLE `tbl_invoice` DISABLE KEYS */;
INSERT INTO `tbl_invoice` VALUES (26,'2013-12-27 00:00:00','9441',3),(28,'2013-12-11 00:00:00','3007',4),(29,'2013-12-11 00:00:00','б/н',5),(30,'2013-12-26 00:00:00','01000110241',6),(31,'2013-12-11 00:00:00','8926',3),(32,'2013-12-10 00:00:00','31235',7),(33,'2013-12-11 00:00:00','0002929543',2),(34,'2013-12-11 00:00:00','3007',4),(35,'2013-12-27 00:00:00','0002958590',2),(36,'2013-12-10 00:00:00','3342',8),(39,'2013-12-15 00:00:00','01/000000024',17),(40,'2013-12-14 00:00:00','063480',17),(41,'2013-12-11 00:00:00','154',18),(42,'2013-12-11 00:00:00','195',17),(43,'2013-12-14 00:00:00','б/н',15),(44,'2013-12-11 00:00:00','б/н',14),(45,'2013-12-11 00:00:00','б/н',13),(46,'2013-12-27 00:00:00','33202',7),(47,'2013-12-27 00:00:00','122',11),(48,'2013-12-27 00:00:00','939',10),(49,'2013-12-14 00:00:00','3049',4),(50,'2013-12-11 00:00:00','3347',8),(51,'2013-12-11 00:00:00','21000020560',12),(52,'2013-12-11 00:00:00','26368-000459-22/0002929542',2),(54,'2001-12-20 13:00:00','0000вода для рецептов',2),(55,'2014-12-20 13:00:00','б/н',16),(56,'2011-12-20 13:00:00','3010',4),(57,'0000-00-00 00:00:00','0000000',2),(58,'2003-01-20 14:00:00','3(вторая часть накладной)',9),(59,'2003-01-20 14:00:00','3',9);
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_kitchen`
--

LOCK TABLES `tbl_kitchen` WRITE;
/*!40000 ALTER TABLE `tbl_kitchen` DISABLE KEYS */;
INSERT INTO `tbl_kitchen` VALUES (1,'Суши','',NULL,NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_phones`
--

LOCK TABLES `tbl_phones` WRITE;
/*!40000 ALTER TABLE `tbl_phones` DISABLE KEYS */;
INSERT INTO `tbl_phones` VALUES (1,975799,1,1),(2,324543,1,2);
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
  `name` varchar(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `image` varchar(45) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `cost` decimal(10,2) DEFAULT NULL,
  `out` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_prepack`
--

LOCK TABLES `tbl_prepack` WRITE;
/*!40000 ALTER TABLE `tbl_prepack` DISABLE KEYS */;
INSERT INTO `tbl_prepack` VALUES (1,'Сушидзе п/ф','',NULL,NULL,'54.47',1.83),(2,'Рис ПФ','',NULL,NULL,'24.02',2),(3,'Сёмга ПФ','',NULL,NULL,'491.22',0.46),(4,'Суши с лососем ПФ','',NULL,NULL,'224.25',0.035),(5,'Соус Яки','',NULL,NULL,'84.57',0.165),(6,'Суши запечённые с лососем','',NULL,NULL,'203.63',0.036),(7,'Угорь пф','',NULL,NULL,'1796.67',0.6),(8,'Суши с угрем','',NULL,NULL,'667.89',0.033),(9,'Морской коктейль ПФ','',NULL,NULL,'0.00',0.6),(10,'Креветка тигровая ПФ','',NULL,NULL,'1180.00',0.5),(11,'Икра Масага красная ПФ','',NULL,NULL,'370.53',0.95),(12,'Икра Масага оранжевая ПФ','',NULL,NULL,'370.53',0.95),(13,'Икра Масага черная ПФ','',NULL,NULL,'370.53',0.95),(14,'Огурец свежий ПФ','',NULL,NULL,'99.65',0.95),(15,'Лимон ПФ','',NULL,NULL,'57.66',0.935),(16,'Перец свежий ПФ','',NULL,NULL,'101.27',0.965),(17,'Сыр сливочный ПФ','',NULL,NULL,'214.29',0.98),(18,'Сыр Гауда ПФ','',NULL,NULL,'210.00',1),(19,'Кунжут ПФ','',NULL,NULL,'168.42',0.95),(20,'Кляр ПФ','',NULL,NULL,'63.75',0.2),(21,'Авокадо ПФ','',NULL,NULL,'32.32',0.145),(22,'Дайкон ПФ','',NULL,NULL,'72.44',0.43),(23,'Лист салата ПФ','',NULL,NULL,NULL,0.06),(24,'Укроп ПФ','',NULL,NULL,'302.13',0.47),(25,'Чеснок ПФ','',NULL,NULL,'103.22',0.9),(26,'Крабовые палочки ПФ','',NULL,NULL,'355.26',0.76),(27,'Тунец ПФ','',NULL,NULL,'1070.18',0.95),(28,'Роллы Калифорния классик ПФ','',NULL,NULL,'113.83',0.205),(29,'Роллы с лососем','',NULL,NULL,'133.73',0.205),(30,'Лосось ПФ','',NULL,NULL,'491.22',0.46),(31,'Роллы Калифорния темпура','',NULL,NULL,'102.26',0.22),(32,'Роллы Филадельфия классик','',NULL,NULL,'172.76',0.22),(33,'Роллы Филадельфия с копченым лососем','',NULL,NULL,'167.04',0.218),(34,'Спайс ПФ','',NULL,NULL,'91.71',1),(35,'Яни соус ПФ','',NULL,NULL,'87.24',1),(36,'Роллы Филадельфия темпура ПФ','',NULL,NULL,'142.51',0.2),(37,'Роллы Дракон ПФ','',NULL,NULL,'378.54',0.22),(38,'Роллы Дракон темпура ПФ','',NULL,NULL,'292.55',0.235),(39,'Роллы Унаги ПФ','',NULL,NULL,'327.96',0.205),(40,'Роллы Аляска ПФ','',NULL,NULL,'151.61',0.2),(41,'Роллы Фреш ролл ПФ','',NULL,NULL,'48.11',0.185),(42,'Роллы Фитнес ролл ПФ','',NULL,NULL,'123.93',0.185),(43,'Роллы Сёгун ПФ','',NULL,NULL,'120.12',0.2),(44,'Роллы Грин ПФ','',NULL,NULL,'158.92',0.205),(45,'Роллы Домино ПФ','',NULL,NULL,'337.38',0.21),(46,'Роллы Хоккайдо ПФ','',NULL,NULL,'133.88',0.18),(47,'Роллы Тори маки ПФ','',NULL,NULL,'76.79',0.185),(48,'Роллы Динамит ПФ','',NULL,NULL,'57.42',0.12),(49,'Роллы Япончик ПФ','',NULL,NULL,'123.21',0.205),(50,'Лосось копченый ПФ','',NULL,NULL,'600.00',1),(51,'Чука ПФ','',NULL,NULL,'400.00',1),(52,'Мидии ПФ','',NULL,NULL,'658.56',1),(53,'Лосось в кляре ПФ','',NULL,NULL,'298.08',1.3),(54,'Судак в кляре ПФ','',NULL,NULL,'136.79',1.3),(55,'Курица копченая ПФ','',NULL,NULL,'204.88',1),(56,'Роллы маленькие с лососем ПФ','',NULL,NULL,'158.65',0.105),(57,'Роллы маленькие с тунцом ПФ','',NULL,NULL,'324.07',0.105),(58,'Роллы маленькие с угрем ПФ','',NULL,NULL,'533.24',0.105),(59,'Роллы маленькие с копченым лососем ПФ','',NULL,NULL,'189.73',0.105),(60,'Роллы маленькие с кальмаром ПФ','',NULL,NULL,'0.00',0.105),(61,'Роллы маленькие с огурцом ПФ','',NULL,NULL,'46.77',0.105),(62,'Роллы маленькие с авокадо ПФ','',NULL,NULL,'110.64',0.105),(63,'Кальмар ПФ','',NULL,NULL,NULL,0.95),(64,'Запеченые роллы Катана ПФ','',NULL,NULL,'159.20',0.22),(65,'Запеченые роллы Япончик ПФ','',NULL,NULL,'148.94',0.235),(66,'Запеченые роллы с беконом ПФ(добавить)','',NULL,NULL,'63.83',0.2),(67,'Суши с лососем ПФ','',NULL,NULL,'224.25',0.035),(68,'Крем роллы с лососем ПФ','',NULL,NULL,'146.35',0.14),(69,'Крем роллы с тунцом ПФ','',NULL,NULL,'249.74',0.14),(70,'Крем роллы с угрем ПФ','',NULL,NULL,'379.47',0.14),(71,'Крем роллы с копченым лососем ПФ','',NULL,NULL,'165.77',0.14),(72,'Крем роллы с кальмаром ПФ','',NULL,NULL,'58.63',0.14),(73,'Крем роллы с огурцом ПФ','',NULL,NULL,'76.43',0.14),(74,'Крем роллы с авокадо ПФ','',NULL,NULL,'64.40',0.14),(75,'Суши с тунцом ПФ','',NULL,NULL,'472.37',0.035),(76,'Суши с угрем ПФ','',NULL,NULL,'673.00',0.033),(77,'Суши с тигровой креветкой ПФ','',NULL,NULL,'488.01',0.03),(78,'Суши с копченым лососем ПФ','',NULL,NULL,'210.91',0.031),(79,'Суши с кальмаром ПФ','',NULL,NULL,'27.45',0.031),(80,'Суши с икрой Масага ПФ','',NULL,NULL,'139.52',0.03),(81,'Суши с салатом Чукка ПФ','',NULL,NULL,'176.01',0.03),(82,'Острые суши с копченой курицей ПФ','',NULL,NULL,'91.83',0.035),(83,'Сашими с лососем ПФ','',NULL,NULL,'340.06',0.12),(84,'Сашими с тунцом ПФ','',NULL,NULL,'629.54',0.12),(85,'Сашими с Угрем ПФ','',NULL,NULL,'903.46',0.108),(86,'Сашими с кальмаром ПФ','',NULL,NULL,'118.06',0.096),(87,'Сашими с тигровой креветкой ПФ','',NULL,NULL,'513.34',0.1),(88,'Кальмар ПФ','',NULL,NULL,'431.58',0.95),(89,'Соевый соус ПФ','',NULL,NULL,'53.04',4.335),(90,'Имбирь ПФ','',NULL,NULL,'110.00',1),(91,'Васаби ПФ','',NULL,NULL,'145.00',1),(92,'Набор чистюля ПФ','',NULL,NULL,NULL,1);
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
) ENGINE=InnoDB AUTO_INCREMENT=134 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_prepack_ingred`
--

LOCK TABLES `tbl_prepack_ingred` WRITE;
/*!40000 ALTER TABLE `tbl_prepack_ingred` DISABLE KEYS */;
INSERT INTO `tbl_prepack_ingred` VALUES (1,9,NULL,1,NULL,NULL,NULL,5),(1,12,NULL,0.8,NULL,NULL,NULL,6),(1,13,NULL,0.06,NULL,NULL,NULL,7),(1,11,NULL,0.01,NULL,NULL,NULL,8),(2,6,NULL,0.9,NULL,NULL,NULL,10),(3,7,NULL,0.538,NULL,NULL,NULL,15),(5,16,NULL,0.15,NULL,NULL,NULL,18),(5,18,NULL,0.015,NULL,NULL,NULL,19),(6,15,NULL,0.0005,NULL,NULL,NULL,40),(6,8,NULL,0.002,NULL,NULL,NULL,41),(7,40,NULL,0.98,NULL,NULL,NULL,43),(11,66,NULL,1,NULL,NULL,NULL,45),(12,67,NULL,1,NULL,NULL,NULL,46),(13,68,NULL,1,NULL,NULL,NULL,47),(14,48,NULL,1,NULL,NULL,NULL,48),(15,59,NULL,1,NULL,NULL,NULL,49),(16,44,NULL,1,NULL,NULL,NULL,50),(17,8,NULL,1,NULL,NULL,NULL,51),(18,8,NULL,1,NULL,NULL,NULL,52),(19,69,NULL,1,NULL,NULL,NULL,54),(20,32,NULL,0.15,NULL,NULL,NULL,61),(20,79,NULL,0.05,NULL,NULL,NULL,62),(21,42,NULL,0.218,NULL,NULL,NULL,63),(22,45,NULL,0.48,NULL,NULL,NULL,64),(24,43,NULL,1,NULL,NULL,NULL,66),(25,60,NULL,1,NULL,NULL,NULL,67),(26,65,NULL,1,NULL,NULL,NULL,69),(27,35,NULL,1,NULL,NULL,NULL,70),(28,16,NULL,0.007,NULL,NULL,NULL,73),(30,7,NULL,0.538,NULL,NULL,NULL,75),(31,16,NULL,0.007,NULL,NULL,NULL,80),(31,14,NULL,0.03,NULL,NULL,NULL,81),(34,16,NULL,0.875,NULL,NULL,NULL,88),(34,27,NULL,0.06,NULL,NULL,NULL,89),(34,28,NULL,0.03,NULL,NULL,NULL,90),(36,14,NULL,0.03,NULL,NULL,NULL,91),(38,14,NULL,0.03,NULL,NULL,NULL,93),(50,78,NULL,1,NULL,NULL,NULL,94),(41,16,NULL,0.007,NULL,NULL,NULL,96),(51,34,NULL,1.6,NULL,NULL,NULL,97),(52,20,NULL,1.47,NULL,NULL,NULL,98),(53,14,NULL,0.2,NULL,NULL,NULL,99),(45,16,NULL,0.007,NULL,NULL,NULL,102),(55,61,NULL,1,NULL,NULL,NULL,103),(54,64,NULL,0.72,NULL,NULL,NULL,104),(54,14,NULL,0.2,NULL,NULL,NULL,105),(29,16,NULL,0.007,NULL,NULL,NULL,107),(35,16,NULL,0.9,NULL,NULL,NULL,110),(35,66,NULL,0.1,NULL,NULL,NULL,111),(10,71,NULL,1,NULL,NULL,NULL,112),(83,31,NULL,0.008,NULL,NULL,NULL,113),(84,31,NULL,0.008,NULL,NULL,NULL,114),(85,31,NULL,0.008,NULL,NULL,NULL,115),(88,55,NULL,1,NULL,NULL,NULL,116),(86,31,NULL,0.008,NULL,NULL,NULL,117),(89,10,NULL,2,NULL,NULL,NULL,118),(89,12,NULL,0.2,NULL,NULL,NULL,119),(89,11,NULL,0.025,NULL,NULL,NULL,120),(89,80,NULL,0.01,NULL,NULL,NULL,121),(89,79,NULL,2,NULL,NULL,NULL,122),(89,45,NULL,0.1,NULL,NULL,NULL,123),(91,73,NULL,1,NULL,NULL,NULL,124),(90,74,NULL,1,NULL,NULL,NULL,125),(92,95,NULL,1,NULL,NULL,NULL,130),(92,97,NULL,1,NULL,NULL,NULL,131),(92,77,NULL,1,NULL,NULL,NULL,132),(92,99,NULL,1,NULL,NULL,NULL,133);
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
) ENGINE=InnoDB AUTO_INCREMENT=411 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_prepack_prepack`
--

LOCK TABLES `tbl_prepack_prepack` WRITE;
/*!40000 ALTER TABLE `tbl_prepack_prepack` DISABLE KEYS */;
INSERT INTO `tbl_prepack_prepack` VALUES (2,2,1,0.32),(43,6,2,0.02),(44,6,3,0.012),(49,8,2,0.02),(50,8,7,0.012),(51,4,2,0.02),(52,4,3,0.015),(68,28,2,0.12),(69,28,14,0.015),(70,28,21,0.015),(71,28,26,0.03),(72,28,12,0.02),(92,31,2,0.12),(93,31,14,0.015),(94,31,21,0.015),(95,31,26,0.03),(96,31,12,0.008),(97,31,20,0.034),(102,32,2,0.12),(103,32,17,0.04),(104,32,14,0.02),(105,32,30,0.05),(106,34,25,0.035),(107,33,2,0.12),(108,33,17,0.03),(109,33,34,0.006),(110,33,14,0.02),(111,33,30,0.05),(112,36,2,0.12),(113,36,17,0.02),(114,36,14,0.03),(115,36,30,0.03),(116,36,20,0.034),(125,37,2,0.12),(126,37,17,0.02),(127,37,14,0.01),(128,37,34,0.007),(129,37,16,0.01),(130,37,22,0.015),(131,37,7,0.04),(132,37,19,0.003),(142,38,2,0.12),(143,38,17,0.02),(144,38,14,0.01),(145,38,34,0.007),(146,38,16,0.01),(147,38,22,0.015),(148,38,7,0.03),(149,38,19,0.002),(150,38,20,0.034),(156,39,2,0.12),(157,39,17,0.03),(158,39,14,0.015),(159,39,7,0.03),(160,39,19,0.015),(171,40,2,0.12),(172,40,21,0.015),(173,40,17,0.03),(174,40,50,0.03),(175,40,19,0.015),(182,41,2,0.12),(183,41,14,0.015),(184,41,16,0.015),(185,41,21,0.015),(186,41,23,0.005),(187,41,24,0.007),(188,42,2,0.12),(189,42,51,0.04),(190,42,16,0.015),(191,42,19,0.015),(195,53,20,0.38),(196,53,3,0.72),(202,43,2,0.12),(203,43,17,0.02),(204,43,14,0.02),(205,43,53,0.025),(206,43,13,0.02),(211,44,2,0.12),(212,44,17,0.02),(213,44,50,0.03),(214,44,13,0.02),(227,45,2,0.12),(228,45,27,0.022),(229,45,7,0.022),(230,45,12,0.005),(231,45,14,0.02),(232,45,21,0.02),(233,46,2,0.12),(234,46,17,0.02),(235,46,26,0.02),(236,46,30,0.02),(241,47,2,0.12),(242,47,34,0.007),(243,47,14,0.01),(244,47,16,0.01),(245,47,55,0.03),(246,47,19,0.015),(251,54,20,0.38),(252,48,2,0.12),(253,48,34,0.003),(254,48,14,0.01),(255,48,54,0.02),(256,49,2,0.12),(257,49,23,0.005),(258,49,34,0.007),(259,49,52,0.02),(260,49,54,0.03),(261,49,14,0.015),(262,49,11,0.008),(280,29,2,0.12),(281,29,14,0.015),(282,29,21,0.015),(283,29,30,0.03),(284,29,11,0.02),(287,57,2,0.08),(288,57,27,0.03),(291,56,2,0.08),(292,56,30,0.03),(293,58,2,0.08),(294,58,7,0.03),(295,58,19,0.001),(296,59,2,0.08),(297,59,50,0.03),(298,61,2,0.08),(299,61,14,0.03),(300,62,2,0.08),(301,62,21,0.3),(310,64,2,0.12),(311,64,14,0.02),(312,64,17,0.02),(313,64,18,0.015),(314,64,30,0.03),(315,64,35,0.02),(316,64,19,0.015),(317,64,11,0.01),(318,65,2,0.12),(319,65,14,0.015),(320,65,17,0.02),(321,65,52,0.03),(322,65,54,0.02),(323,65,35,0.02),(324,65,18,0.01),(325,66,2,0.12),(326,66,14,0.02),(327,66,35,0.02),(328,66,55,0.03),(329,68,2,0.09),(330,68,30,0.025),(331,68,17,0.018),(332,68,19,0.013),(333,69,2,0.09),(334,69,27,0.025),(335,69,17,0.018),(336,69,19,0.013),(341,70,2,0.09),(342,70,7,0.025),(343,70,17,0.018),(344,70,19,0.013),(345,71,2,0.09),(346,71,50,0.025),(347,71,17,0.018),(348,71,19,0.013),(353,73,2,0.09),(354,73,14,0.025),(355,73,17,0.018),(356,73,19,0.013),(357,74,2,0.09),(358,74,21,0.025),(359,74,17,0.018),(360,74,19,0.013),(361,67,2,0.02),(362,67,30,0.015),(365,75,2,0.02),(366,75,27,0.015),(367,76,2,0.02),(368,76,7,0.012),(369,76,19,0.001),(371,77,2,0.02),(372,77,10,0.012),(373,78,2,0.02),(374,78,50,0.01),(375,78,15,0.001),(376,80,2,0.02),(377,80,11,0.01),(378,81,2,0.02),(379,81,51,0.012),(380,82,2,0.02),(381,82,34,0.003),(382,82,55,0.012),(383,83,30,0.06),(384,83,22,0.02),(385,83,14,0.02),(386,83,15,0.012),(387,84,27,0.06),(388,84,22,0.02),(389,84,14,0.02),(390,84,15,0.012),(391,85,7,0.048),(392,85,22,0.02),(393,85,14,0.02),(394,85,15,0.012),(395,87,10,0.04),(396,87,22,0.02),(397,87,14,0.02),(398,87,15,0.012),(399,60,60,0.08),(400,72,2,0.09),(401,72,63,0.025),(402,72,17,0.018),(403,72,19,0.013),(404,79,2,0.02),(405,79,63,0.01),(406,79,11,0.001),(407,86,63,0.036),(408,86,22,0.02),(409,86,14,0.02),(410,86,15,0.012);
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
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_product`
--

LOCK TABLES `tbl_product` WRITE;
/*!40000 ALTER TABLE `tbl_product` DISABLE KEYS */;
INSERT INTO `tbl_product` VALUES (1,'Суши с лососем','рис, лосось',1,'Лосось.JPG',50,1,'7.85','35.00'),(2,'Запечённые суши с тигровой креветкой','рис, нори, тигровая креветка, яки-соус, сыр гауда',1,'Запеченые суши.jpg',NULL,1,'7.13','40.00'),(3,'Суши с угрем','рис, нори, угорь, соус унаги, кунжут',1,'Угорь.JPG',NULL,1,'22.04','500.00'),(4,'Роллы Калифорния классик','рис, нори, огурец, авокадо, майонез, снежный краб, масаго (оранж)',1,'Калифорния Классик.JPG',NULL,1,'23.34','35.00'),(5,'Роллы Калифорния с лососем','рис, нори, огурец, авокадо, майонез, лосось, масаго (малиновая)',1,'Калифорния с лососем.JPG',NULL,1,'27.41','35.00'),(6,'Роллы Калифорния темпура','рис, нори, огурец, авокадо, майонез, снежный краб, кляр, масаго (оранж)',1,'Калифорния в темпуре.JPG',NULL,1,'22.50','35.00'),(7,'Роллы Филадельфия классик','',1,'Филадельфия классик.JPG',NULL,1,'38.01','35.00'),(8,'Роллы Филадельфия с копченым лососем','рис, нори, сливочный сыр, спайс, огурец, лосось копченый',1,'Филадельфия с копченым лососем.JPG',NULL,1,'36.41','35.00'),(9,'Роллы Филадельфия темпура','рис, нори, сливочный сыр, огурец, лосось, кляр',1,'Филадельфия в темпуре.JPG',NULL,1,'28.50','35.00'),(10,'Роллы Дракон','рис, нори, сливочный сыр, снежный краб, лосось',1,'Дракон.JPG',NULL,1,'83.28','35.00'),(11,'Роллы Дракон темпура','рис, нори, сыр, огурец, спайс, перец, дайокон, угорь, унаги-соус, кунжут',1,'Дракон в темпуре.JPG',NULL,1,'68.75','35.00'),(12,'Роллы Унаги','рис, нори, сливочный сыр, огурец, угорь, унаги-соус, кунжут',1,'Унаги маки.JPG',NULL,1,'67.23','35.00'),(13,'Ролл Аляска','рис, нори, авакадо, сливочный сыр, копч.лосось, кунжут',1,'Аляска.JPG',NULL,1,'30.32','35.00'),(14,'Роллы Фреш','рис, нори, огурец, перец сл., авакадо, лолло-росса, укроп, майонез',1,'Фреш ролл.JPG',NULL,1,'8.90','35.00'),(15,'Роллы Фитнес','рис, нори, салат чукка, перец сл., кунжут',1,'Фитнес ролл.JPG',NULL,1,'22.93','35.00'),(16,'Роллы Сёгун','рис, нори, сливочный сыр, огурец, лосось в кляре, масаго (чёрная)',1,'Сегун.JPG',NULL,1,'24.02','35.00'),(17,'Роллы Грин','рис, нори, сливочный сыр, огурец, лосось копченый, масаго (зелёная)',1,'Грин.JPG',NULL,1,'32.58','35.00'),(18,'Роллы Домино','рис, нори, майонез, масаго, тунец, угорь. унаги-соус, кунжут',1,'Домино.JPG',NULL,1,'70.85','35.00'),(19,'Роллы Хоккайдо','рис, нори, сливочный сыр, снежный краб, лосось',1,'Хокайдо.JPG',NULL,1,'24.10','35.00'),(20,'Роллы Тори маки','рис, нори, спайс-соус, огурец, перец, курица копч., кунжут',1,'Тори маки.JPG',NULL,1,'14.21','35.00'),(21,'Роллы Динамит','рис, нори, табаско, огурец, филе судака в кляре',1,'Динамит.JPG',NULL,1,'6.89','35.00'),(22,'Роллы Япончик','рис, нори, соус спайс, лист салата, мидии, судак в кляре, огурец, масаго',1,'Япончик.JPG',NULL,1,'25.26','35.00'),(23,'Роллы с беконом','рис, нори, соус, спайс, огурец, лолло-росса, перец сл., бекон',1,NULL,NULL,1,'0.00','35.00'),(24,'Запечёные роллы Катана','рис, нори, сливочный сыр, огурец, лосось, яки-соус, сыр гауда',1,'Катана.jpg',NULL,1,'35.02','35.00'),(25,'Запечёные роллы Фермерский','рис, нори, копч.курица, бекон, огурец, яки-соус, сыр гауда',1,'Фермерский.jpg',NULL,1,'0.00','35.00'),(26,'Запечённые роллы Япончик','рис, нори, сливочный сыр, огурец, мидии, обжаренное филе судака',1,'Запеченый япончик.jpg',NULL,1,'35.00','35.00'),(27,'Роллы маленькие с лососем','рис, нори, лосось',1,'Ролл с лососем.JPG',NULL,1,'16.66','20.00'),(28,'Роллы маленькие с тунцом','рис, нори. тунец',1,'Ролл с тунцом.JPG',NULL,1,'34.03','20.00'),(29,'Роллы маленькие с угрём','рис, нори, угорь',1,'Ролл с угрем.JPG',NULL,1,'55.99','20.00'),(30,'Роллы маленькие с копч.лососем','рис, нори, копч.лосось',1,'Ролл с копченым лососем.jpg',NULL,1,'19.92','20.00'),(31,'Роллы маленькие с кальмаром','рис. нори, кальмар',1,'Ролл с кальмаром.JPG',NULL,1,'0.00','20.00'),(32,'Роллы маленькие с огурцом','рис, нори, огурец',1,'Ролл с огурцом.JPG',NULL,1,'4.91','20.00'),(33,'Роллы маленькие с авокадо','рис, нори, авокадо',1,'Ролл с авокадо.JPG',NULL,1,'11.62','20.00'),(34,'Крем-роллы с лососем','рис, нори, лосось, сливочный сыр, кунжут',1,'Крем ролл с лососем.JPG',NULL,1,'20.49','40.00'),(35,'Крем-роллы с тунцом','рис, нори, тунец, сливочный сыр, кунжут',1,'Крем ролл с тунцом.JPG',NULL,1,'34.96','40.00'),(36,'Крем-роллы с угрём','рис, нори, угорь, сливочный сыр, кунжут',1,'Крем ролл с угрем.JPG',NULL,1,'53.13','40.00'),(37,'Крем-роллы с морским окунем','рис, нори, окунь, сливочный сыр, кунжут',1,NULL,NULL,1,'10.89','40.00'),(38,'Крем-роллы с копч.лососем','рис, нори, копч.лосось, сливочный сыр, кунжут',1,NULL,NULL,1,'23.21','40.00'),(39,'Крем-роллы с кальмаром','рис, нори, кальмар, сливочный сыр, кунжут',1,'Крем ролл с кальмаром.JPG',NULL,1,'8.21','20.00'),(40,'Крем-роллы с огурцом','рис, нори, огурец, сливочный сыр, кунжут',1,'Крем ролл с огурцом.JPG',NULL,1,'10.70','40.00'),(41,'Крем-роллы с авокадо','рис, нори, авокадо, сливочный сыр, кунжут',1,'Крем ролл с авокадо.JPG',NULL,1,'9.02','40.00'),(42,'Суши с тунцом','рис, тунец',1,'Тунец.JPG',NULL,1,'16.53','40.00'),(43,'Суши с копчёной курицей','рис, копч.курица',1,NULL,NULL,1,'0.00','40.00'),(44,'Суши с тигровой креветкой','рис, тигровая креветка',1,'Креветка.JPG',NULL,1,'14.64','40.00'),(45,'Суши с копч.лососем','рис, копч.лосось',1,'Копченый лосось.JPG',NULL,1,'6.54','40.00'),(46,'Суши с кальмаром','рис, нори, соус спайс, кальмар',1,'Кальмар.JPG',NULL,1,'0.85','40.00'),(47,'Суши с икрой масага','рис, нори, икра масага',1,'Гункан с икрой масаго.JPG',NULL,1,'4.19','40.00'),(48,'Суши с салатом чукка','рис, нори, салат чукка',1,'Гункан Чукка.JPG',NULL,1,'5.28','40.00'),(49,'Острые суши с лосоем','рис, нори, соус спайс, лосось',1,'Лосось.JPG',NULL,1,'4.80','40.00'),(50,'Острые суши с тунцом','рис, нори, соус спайс, тунец',1,'Тунец.JPG',NULL,1,'0.00','40.00'),(51,'Острые суши с угрем','рис, нори, соус спайс, угорь',1,'Угорь.JPG',NULL,1,'0.00','40.00'),(52,'Острые суши с  копченой курицей','рис, нори, соус спайс, копч.курица',1,NULL,NULL,1,'3.21','40.00'),(53,'Острые суши с тигровой креветкой','рис, нори, соус спайс, тигровая креветка',1,'Креветка.JPG',NULL,1,'0.00','40.00'),(54,'Острые суши с кальмаром','рис, нори, соус спайс, кальмар',1,'Кальмар.JPG',NULL,1,'0.00','40.00'),(55,'Запечённые суши с лососем','рис, нори, лосось, яки-соус, сыр гауда',1,NULL,NULL,1,'0.00','40.00'),(56,'Острые суши с копч.лососем','рис, нори, соус спайс, копч.лосось',1,'Копченый лосось.JPG',NULL,1,'0.00','40.00'),(57,'Острые суши со снежным крабом','рис, нори, соус спайс, снежный краб',1,NULL,NULL,1,'0.00','40.00'),(58,'Острые суши с мидиями','рис, нори, соус спайс, мидии',1,NULL,NULL,1,NULL,'40.00'),(59,'Запечённые суши с тунцом','рис, нори, тунец, яки-соус, сыр гауда',1,NULL,NULL,1,'0.00','40.00'),(60,'Запечённые суши с угрём','рис, нори, угорь, яки-соус, сыр гауда',1,NULL,NULL,1,'0.00','40.00'),(61,'Запечённые суши с копчёной курицей','рис, нори, копч.курица, яки-соус, сыр гауда',1,NULL,NULL,1,'0.00','40.00'),(62,'Запечённые суши с копчёным лососем','рис, нори, кальмар, яки-соус, сыр гауда',1,NULL,NULL,1,NULL,'40.00'),(63,'Запечённые суши с кальмаром','рис, нори, кальмар, яки-соус, сыр гауда',1,NULL,NULL,1,NULL,'40.00'),(64,'Запечённые суши со снежным крабом','рис, нори, снежный краб, яки--соус, сыр гауда',1,NULL,NULL,1,NULL,'40.00'),(65,'Запечённые суши с мидиями','рис, нори, мидии, яки-соус, сыр гауда',1,NULL,NULL,1,NULL,'40.00'),(66,'Сашими с лососем','нарезки лосося, дайкон, водоросли тосака, огурец, лимон',1,'Сашими лосось.JPG',NULL,1,'40.81','40.00'),(67,'Сашими с тунцом','нарезки тунца, дайкон, водоросли тосака, огурец, лимон',1,'Сашими тунец.JPG',NULL,1,'75.54','40.00'),(68,'Сашими с угрём','нарезки угря, дайкон, водоросли тосака, огурец, лимон',1,'Сашими угорь.JPG',NULL,1,'97.57','40.00'),(69,'Сашими с кальмаром','нарезки кальмара, дайкон, водоросли тосака, огурец, лимон',1,'Сашими кальмар.JPG',NULL,1,'11.33','40.00'),(70,'Сашими с тигровой креветкой','тигровые креветки, дайкон, водоросли тосака, огурец, лимон',1,'Сашими креветка.JPG',NULL,1,'51.33','40.00'),(71,'Сет с лососем','ролл с лососем + 4 суши с лосоесм',1,'Мини сет с лососем.jpg',NULL,1,'0.00','40.00'),(72,'Сет с тунцом','ролл с угрём + 4 суши с угрём',1,'Мини сет с тунцом.jpg',NULL,1,'0.00','40.00'),(73,'Сет с креветкой','ролл с креветкой + 4 суши с креветкой',1,'Мини сет с креветкой.jpg',NULL,1,'0.00','40.00'),(74,'Сет с кальмаром','ролл с кальмаром + 4 суши с кальмаром',1,'Мини сет с кальмаром.jpg',NULL,1,'0.00','40.00'),(75,'Сет Сашими','5 видов сашими: с лососем, с тунцом, с угрём, с кальмаром, с тигровой креветкой',1,NULL,NULL,1,'0.00','50.00'),(76,'Сет Калифорния','роллы: Калифорния классик, Калифорния с лососем, Калифорния темпура',1,'Калифорния сет.JPG',NULL,1,'0.00','50.00'),(77,'Сет Филадельфия','роллы: Филадельфия классик, Филадельфия с копч.лососем, Филадельфия темпура',1,'Филадельфия сет.JPG',NULL,1,'0.00','40.00'),(78,'Сет Фреш','роллы:фреш ролл, ролл с салатом чукка,ролл с огурцом,ролл с авокадо,крем-ролл с огурцом,крем-ролл с авокадо',1,'Фреш сет.JPG',NULL,1,'0.00','50.00'),(79,'Сет Темпура','роллы:Калифорния темпура, Филадельфия темпура, Дракон, суши запеченные:со снежным крабом 2шт., ',1,'Темпура сет.JPG',NULL,1,'0.00','50.00'),(80,'Сет Катана','',1,'Сет Катана.JPG',NULL,1,'0.00','50.00'),(81,'Сет Облака','роллы: Филадельфия классик 0,5, Филадельфия с копч.лососем 0,5',1,'Облака.JPG',NULL,1,'0.00','50.00'),(82,'Сет Семейный','роллы',1,'Семейный.JPG',NULL,1,'0.00','50.00'),(83,'Сет Харакири','роллы: Калифорния с лососем 0.5, Филадельфия 0.5, Японский сендвич с лососем',1,'Харакири.JPG',NULL,1,'0.00','50.00'),(84,'Сет ТопСет','роллы: Калифорния с лососем 0.5, Филадельфия классик 0.5, Ясай маки ',1,'Топ сет.JPG',NULL,1,NULL,'50.00'),(85,'Сет Киото','ролл с лососем, суши с креветкой, суши с лососем, суши с угрем, суши с кальмаром, суши с тунцом',1,'Киото сет.jpg',NULL,1,'0.00','50.00'),(86,'Сет Вулкан','Запеченные суши с копч.курицей 2 шт., с лососем 2 шт., с угрем 2 шт',1,'Вулкан.jpg',NULL,1,'0.00','50.00'),(87,'Салат Чукка','чукка, лимон, соус Гамадари',1,'Чукка.JPG',NULL,1,NULL,'50.00'),(88,'Салат Кайсо','чукка, вакаме, тосака, лимон, соус Гамадари',1,'Кайсо.JPG',NULL,1,NULL,'50.00'),(89,'Салат с угрём','угорь, огурец, вакаме, соус унаги, кунжут, лист салата',1,'С угрем.JPG',NULL,1,NULL,'50.00'),(90,'Салат Калифорния','снежный краб, огурец. авакадо, майнез, икра Масаго',1,'Калифорния.JPG',NULL,1,NULL,'50.00'),(91,'Суп Мисо','мисо-бульон, вакаме, сыр Тофу, лук зеленый, грибы',1,'_GUS5222.JPG',NULL,1,'0.00','50.00'),(92,'Суп Мисо с лососем','мисо-бульон, вакаме, сыр Тофу, лук зеленый, грибы',1,'_GUS5222.JPG',NULL,1,'0.00','50.00'),(93,'Сендвич с лососем','рис, нори, сливочный сыр, лосось, соус спайс, кунжут',1,'С лососем.jpg',NULL,1,'0.00','50.00'),(94,'Сендвич с копченым лососем','рис, нори, сливочный сыр, копч.лосось, кунжут',1,'С копченым лососем.jpg',NULL,1,NULL,'50.00'),(95,'Сендвич с угрём','рис, нори, сливочный сыр, угорь, кунжут',1,'Сендвич с угрем.jpg',NULL,1,NULL,'50.00'),(96,'Лапша Удон','',1,'_GUS5222.JPG',NULL,1,'0.00','50.00'),(97,'Лапша','Лапша Соба',1,'_GUS5222.JPG',NULL,1,'0.00','50.00'),(98,'Японский рис Гохан','',1,NULL,NULL,1,'0.00','50.00'),(99,'Набор для суши (добавить соусник)','',1,NULL,NULL,1,'6.30','0.00'),(100,'Набор чистюля','',1,NULL,NULL,1,'0.00','0.00');
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
) ENGINE=InnoDB AUTO_INCREMENT=193 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_product_cat`
--

LOCK TABLES `tbl_product_cat` WRITE;
/*!40000 ALTER TABLE `tbl_product_cat` DISABLE KEYS */;
INSERT INTO `tbl_product_cat` VALUES (51,NULL,48,5),(52,NULL,49,6),(53,NULL,50,6),(54,NULL,51,6),(55,NULL,52,6),(65,NULL,58,6),(72,NULL,59,7),(73,NULL,60,7),(74,NULL,61,7),(76,NULL,62,7),(77,NULL,63,7),(78,NULL,64,7),(79,NULL,65,7),(94,NULL,1,6),(96,NULL,3,2),(97,NULL,4,1),(98,NULL,5,1),(99,NULL,77,9),(100,NULL,76,9),(102,NULL,8,1),(103,NULL,7,1),(106,NULL,12,1),(107,NULL,13,1),(109,NULL,15,1),(110,NULL,14,1),(111,NULL,16,1),(112,NULL,17,1),(113,NULL,18,1),(114,NULL,19,1),(116,NULL,20,1),(117,NULL,21,1),(118,NULL,22,1),(119,NULL,23,1),(120,NULL,24,2),(121,NULL,25,2),(122,NULL,26,2),(123,NULL,27,3),(124,NULL,28,3),(125,NULL,29,3),(126,NULL,30,3),(127,NULL,31,3),(128,NULL,32,3),(129,NULL,33,3),(130,NULL,34,4),(131,NULL,35,4),(132,NULL,36,4),(135,NULL,39,4),(136,NULL,40,4),(137,NULL,41,4),(138,NULL,42,5),(139,NULL,43,5),(140,NULL,45,5),(141,NULL,46,5),(142,NULL,10,1),(143,NULL,79,9),(147,NULL,82,9),(149,NULL,83,9),(150,NULL,84,9),(153,NULL,87,10),(154,NULL,88,10),(155,NULL,89,10),(159,NULL,94,12),(160,NULL,93,12),(161,NULL,95,12),(164,NULL,47,5),(165,NULL,6,1),(166,NULL,2,7),(168,NULL,9,1),(169,NULL,11,1),(170,NULL,37,4),(171,NULL,38,4),(172,NULL,55,2),(173,NULL,56,6),(174,NULL,57,6),(175,NULL,66,8),(176,NULL,67,8),(177,NULL,68,8),(178,NULL,69,8),(179,NULL,70,8),(180,NULL,71,9),(181,NULL,72,9),(182,NULL,73,9),(183,NULL,74,9),(184,NULL,80,9),(185,NULL,75,9),(186,NULL,85,9),(187,NULL,86,9),(188,NULL,91,11),(190,NULL,96,13),(191,NULL,92,11),(192,NULL,97,13);
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
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_product_prepack`
--

LOCK TABLES `tbl_product_prepack` WRITE;
/*!40000 ALTER TABLE `tbl_product_prepack` DISABLE KEYS */;
INSERT INTO `tbl_product_prepack` VALUES (2,6,0.035,5),(3,8,0.033,8),(1,4,0.035,9),(4,28,0.205,10),(5,29,0.205,11),(6,31,0.22,12),(7,32,0.22,13),(8,33,0.218,14),(9,36,0.2,15),(10,37,0.22,16),(11,38,0.235,17),(12,39,0.205,18),(13,40,0.2,19),(14,41,0.185,20),(15,42,0.185,21),(16,43,0.2,22),(17,44,0.205,23),(18,45,0.21,24),(19,46,0.18,25),(20,47,0.185,26),(21,48,0.12,27),(22,49,0.205,28),(24,64,0.22,29),(26,65,0.235,30),(27,56,0.105,31),(28,57,0.105,32),(29,58,0.105,33),(30,59,0.105,34),(31,60,0.105,37),(32,61,0.105,38),(33,62,0.105,39),(34,68,0.14,40),(35,69,0.14,41),(36,70,0.14,42),(38,71,0.14,43),(39,72,0.14,44),(40,73,0.14,45),(41,74,0.14,46),(42,75,0.035,47),(44,77,0.03,48),(45,78,0.031,49),(46,79,0.031,50),(47,80,0.03,51),(48,81,0.03,52),(52,82,0.035,53),(66,83,0.12,54),(67,84,0.12,55),(68,85,0.108,56),(69,86,0.096,57),(70,87,0.1,58),(99,89,0.05,60),(99,90,0.02,61),(99,91,0.01,62),(49,2,0.2,63),(37,1,0.2,65),(100,92,1,70);
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
  `inn` int(11) DEFAULT NULL,
  `nds` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_provider`
--

LOCK TABLES `tbl_provider` WRITE;
/*!40000 ALTER TABLE `tbl_provider` DISABLE KEYS */;
INSERT INTO `tbl_provider` VALUES (2,'Гурьянов А.А.',2147483647,'ул. Ялтинская 44','Алексей','пришвин.png',2147483647,NULL),(3,'Никс ООО ',911765654,'ул. Согласия 10/17','Марина','tbl_provider.png',2147483647,NULL),(4,'Пилецкий П.Н. ИП',778577,'С. Разина 24 кв.10','Петр','tbl_provider.png',2147483647,NULL),(5,'Идеальная Торговля',2147483647,'','Владимир','tbl_provider.png',2147483647,NULL),(6,'Агробалтик ООО',2147483647,'Алея Смелых 31','Ольга','tbl_provider.png',2147483647,NULL),(7,'Гладкий Е.В. ИП',NULL,'Г. Челнакова 40','','tbl_provider.png',2147483647,NULL),(8,'Хильшер А.А. ИП',507410,'','Юля','tbl_provider.png',2147483647,NULL),(9,'Мегапак ООО',666000,'Калининград ул. Дачна д.6','','tbl_provider.png',2147483647,NULL),(10,'Матюков В.В. ИП',NULL,'','','tbl_provider.png',NULL,NULL),(11,'Карелина Н.В.ИП',NULL,'','','tbl_provider.png',2147483647,NULL),(12,'Альшевская О.В. ИП',2147483647,'','Волжанин Л.Н.','tbl_provider.png',2147483647,NULL),(13,'Александрова В.А. ИП',NULL,'','','tbl_provider.png',2147483647,NULL),(14,'Погосян А.Б. ИП',NULL,'','','tbl_provider.png',2147483647,NULL),(15,'Козлова Е.М. ИП',NULL,'','','tbl_provider.png',2147483647,NULL),(16,'Абушик В.Н. ИП',NULL,'','','tbl_provider.png',2147483647,NULL),(17,'Седьмой континент ОАО',NULL,'','','tbl_provider.png',2147483647,NULL),(18,'Виктория',NULL,'','','tbl_provider.png',NULL,NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_unit`
--

LOCK TABLES `tbl_unit` WRITE;
/*!40000 ALTER TABLE `tbl_unit` DISABLE KEYS */;
INSERT INTO `tbl_unit` VALUES (4,'Метр'),(5,'Литр'),(6,'Штука'),(7,'Килограмм');
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

-- Dump completed on 2014-01-13 14:04:34
