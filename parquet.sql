-- MySQL dump 10.13  Distrib 5.5.41, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: parquet
-- ------------------------------------------------------
-- Server version	5.5.41-0ubuntu0.14.04.1

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
-- Table structure for table `brand`
--

DROP TABLE IF EXISTS `brand`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `brand` (
  `title` varchar(64) DEFAULT NULL,
  `id_category` varchar(64) DEFAULT NULL,
  `url` varchar(64) NOT NULL,
  `image` varchar(100) NOT NULL,
  `country` varchar(34) DEFAULT NULL,
  `text` text,
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brand`
--

LOCK TABLES `brand` WRITE;
/*!40000 ALTER TABLE `brand` DISABLE KEYS */;
INSERT INTO `brand` VALUES ('Karelia','0','karelia','','Финляндия','Описание',1),('Quick-Step','0','quick_step','','Бельгия','<b>Quick-Step Show-Room (шоу-рум)</b> - виртуальная комната паркетной доски Quick-Step. Вы выбираете цвет стен в комнате, цвет мебели, освещение, цвет доски и сможете увидеть выбранный декор в интерьере.',16),('Quick-Step','0','quick_step','','Бельгия','Паркетная доска высокого уровня',17),('Quick-Step','0','quick_step','','Бельгия','Описание',18),('Quick-Step','0','quick_step','','Бельгия','Описание',19),('Quick-Step','0','quick_step','','Бельгия','Описание',20),('Quick-Step','0','quick_step','','Бельгия','Описание',21),('Millenium','1','millenium','','Италия','Паркетная доска Crespano Parchetti (Креспано Паркет), Италия',29),('De Pino Parquets','1','de_pino_parquets','','Италия','Паркетная доскав',30),('Friulparchet','1','friulparchet','','Италия','Паркетная доска Friulparchet (ФриулПаркет), Италия',31),('Garbelotto','1','garbelotto','','Италия','Паркетная доска Garbelotto (Гарбелотто), Италия',32),('Karelia','0','karelia','','Финляндия','Описание',42);
/*!40000 ALTER TABLE `brand` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `brandList`
--

DROP TABLE IF EXISTS `brandList`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `brandList` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_brand` varchar(128) NOT NULL,
  `brand` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='таблица коллекций';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brandList`
--

LOCK TABLES `brandList` WRITE;
/*!40000 ALTER TABLE `brandList` DISABLE KEYS */;
INSERT INTO `brandList` VALUES (1,'quick_step','Quick-Step'),(2,'karelia','Karelia');
/*!40000 ALTER TABLE `brandList` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `url` varchar(32) NOT NULL,
  `title` varchar(64) NOT NULL,
  `image` varchar(100) NOT NULL,
  PRIMARY KEY (`url`),
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=224 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'flooring_ita','Итальянская паркетная доска','flooring_ita.png'),(2,'laminate','Ламинат','laminate.png'),(3,'solid_wood','Массивная доска','solid_wood.png'),(4,'parquet','Штучный паркет','parquet.png'),(5,'cork','Пробковое покрытие','cork.png'),(6,'sport','Спортивные полы','sport.png'),(7,'modular','Модульный паркет','modular.png'),(8,'decking','Террасная доска','decking.png'),(9,'plinth','Плинтуса и пороги','plinth.png'),(10,'substrate','Подложка','substrate.png'),(11,'door','Двери','door.png'),(12,'chemistry','Паркетная химия','chemistry.png'),(13,'leather','Кожаные полы','leather.png'),(14,'vinyl','Виниловые полы','vinyl.png'),(15,'mosaic','Деревянная мозаика','mosaic.png'),(16,'testfds','Test','flooring_ita.png'),(0,'flooring','Паркетная доска','flooring.png');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shipment`
--

DROP TABLE IF EXISTS `shipment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shipment` (
  `title` varchar(128) DEFAULT NULL,
  `image` varchar(64) DEFAULT NULL,
  `id_shipment` varchar(128) NOT NULL,
  `id_brand` varchar(64) DEFAULT NULL,
  `id_collection` varchar(64) DEFAULT NULL,
  `describe` text NOT NULL,
  `wood` varchar(64) DEFAULT NULL,
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `news` tinyint(1) DEFAULT '0',
  `discount` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shipment`
--

LOCK TABLES `shipment` WRITE;
/*!40000 ALTER TABLE `shipment` DISABLE KEYS */;
INSERT INTO `shipment` VALUES ('Дуб Безупречный','images/upload/buk-VIL1361.jpg','dub_bezuprechnyjj_matovyjj-VIL1360','karelia','collection_light','Описание','Дуб (oak)',1,0,1),('Дуб Благородный Натуральный Сатин','images/upload/buk-VIL1361.jpg','dub_blagorodnyjj_naturalnyjj_satin-CAS1335321','quick_step','villa','Брашированная, матовая','Дуб',13,0,1),('Бук','images/upload/buk-VIL1361.jpg','buk-VIL1361','karelia','libra','Описание','Бук',30,0,0),('Сосна Безупречная Матовая','images/upload/buk-VIL1361.jpg','sosna_bezuprechnaya_matovaya-PIN3321','karelia','libra','Описание','Сосна',27,1,0),('Бук Безупречный Матовый','images/upload/buk-VIL1361.jpg','buk_bezuprechnyjj_matovyjj-VIL1361','karelia','libra','Описание','Бук',28,0,0),('Бук Безупречный ','images/upload/buk-VIL1361.jpg','buk_bezuprechnyjj-VIL1361','karelia','libra','Описание','Бук',29,0,0);
/*!40000 ALTER TABLE `shipment` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-03-16 18:47:39
