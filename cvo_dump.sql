-- MySQL dump 10.13  Distrib 5.7.18, for Linux (x86_64)
--
-- Host: localhost    Database: test
-- ------------------------------------------------------
-- Server version	5.7.18-0ubuntu0.16.04.1

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
-- Table structure for table `blocks`
--

DROP TABLE IF EXISTS `blocks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blocks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `page_id` int(11) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `preview` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blocks`
--

LOCK TABLES `blocks` WRITE;
/*!40000 ALTER TABLE `blocks` DISABLE KEYS */;
INSERT INTO `blocks` VALUES (1,1,'Default block','<p>PREVIEWWWWWWWWWWWWWWWWWw</p>','<p>The collection is inspired by the Renaissance town of Verona, symbol of the classic and highly appreciated Italian style, romantic and elegant at a time. Special care is devoted to details, the selection of tissues, and the coordination of color nuances.</p>',NULL,'2017-06-19 05:55:44','2017-06-19 08:36:38'),(2,1,'Default block','<p>PREVIEWWWWWWWWWWWWWWWWWw</p>','<p>The collection is inspired by the Renaissance town of Verona, symbol of the classic and highly appreciated Italian style, romantic and elegant at a time. Special care is devoted to details, the selection of tissues, and the coordination of color nuances.</p>',NULL,'2017-06-19 05:55:44','2017-06-20 04:33:58'),(3,1,'Default block','<p>PREVIEWWWWWWWWWWWWWWWWWw</p>','<p>The collection is inspired by the Renaissance town of Verona, symbol of the classic and highly appreciated Italian style, romantic and elegant at a time. Special care is devoted to details, the selection of tissues, and the coordination of color nuances.</p>',NULL,'2017-06-19 05:55:44','2017-06-19 08:36:38'),(4,1,'Default block','<p>PREVIEWWWWWWWWWWWWWWWWWw</p>','<p>The collection is inspired by the Renaissance town of Verona, symbol of the classic and highly appreciated Italian style, romantic and elegant at a time. Special care is devoted to details, the selection of tissues, and the coordination of color nuances.</p>',NULL,'2017-06-19 05:55:44','2017-06-19 08:36:38'),(5,1,'Default block','<p>PREVIEWWWWWWWWWWWWWWWWWw</p>','<p>The collection is inspired by the Renaissance town of Verona, symbol of the classic and highly appreciated Italian style, romantic and elegant at a time. Special care is devoted to details, the selection of tissues, and the coordination of color nuances.</p>',NULL,'2017-06-19 05:55:44','2017-06-19 08:36:38'),(6,1,'Default block','<p>PREVIEWWWWWWWWWWWWWWWWWw</p>','<p>The collection is inspired by the Renaissance town of Verona, symbol of the classic and highly appreciated Italian style, romantic and elegant at a time. Special care is devoted to details, the selection of tissues, and the coordination of color nuances.</p>',NULL,'2017-06-19 05:55:44','2017-06-19 08:36:38'),(7,2,'Default block','PREVIEWWWWWWWWWWWWWWWWWw','The collection is inspired by the Renaissance town of Verona, symbol of the classic and highly appreciated Italian style, romantic and elegant at a time. Special care is devoted to details, the selection of tissues, and the coordination of color nuances.',NULL,'2017-06-19 05:55:44','2017-06-19 05:55:44'),(8,2,'Default block','PREVIEWWWWWWWWWWWWWWWWWw','The collection is inspired by the Renaissance town of Verona, symbol of the classic and highly appreciated Italian style, romantic and elegant at a time. Special care is devoted to details, the selection of tissues, and the coordination of color nuances.',NULL,'2017-06-19 05:55:44','2017-06-19 05:55:44'),(9,2,'Default block','PREVIEWWWWWWWWWWWWWWWWWw','The collection is inspired by the Renaissance town of Verona, symbol of the classic and highly appreciated Italian style, romantic and elegant at a time. Special care is devoted to details, the selection of tissues, and the coordination of color nuances.',NULL,'2017-06-19 05:55:44','2017-06-19 05:55:44'),(10,2,'Default block','PREVIEWWWWWWWWWWWWWWWWWw','The collection is inspired by the Renaissance town of Verona, symbol of the classic and highly appreciated Italian style, romantic and elegant at a time. Special care is devoted to details, the selection of tissues, and the coordination of color nuances.',NULL,'2017-06-19 05:55:44','2017-06-19 05:55:44'),(11,2,'Default block','PREVIEWWWWWWWWWWWWWWWWWw','The collection is inspired by the Renaissance town of Verona, symbol of the classic and highly appreciated Italian style, romantic and elegant at a time. Special care is devoted to details, the selection of tissues, and the coordination of color nuances.',NULL,'2017-06-19 05:55:44','2017-06-19 05:55:44'),(12,2,'Default block','PREVIEWWWWWWWWWWWWWWWWWw','The collection is inspired by the Renaissance town of Verona, symbol of the classic and highly appreciated Italian style, romantic and elegant at a time. Special care is devoted to details, the selection of tissues, and the coordination of color nuances.',NULL,'2017-06-19 05:55:44','2017-06-19 05:55:44'),(13,3,'Default block','PREVIEWWWWWWWWWWWWWWWWWw','The collection is inspired by the Renaissance town of Verona, symbol of the classic and highly appreciated Italian style, romantic and elegant at a time. Special care is devoted to details, the selection of tissues, and the coordination of color nuances.',NULL,'2017-06-19 05:55:44','2017-06-19 05:55:44'),(14,3,'Default block','PREVIEWWWWWWWWWWWWWWWWWw','The collection is inspired by the Renaissance town of Verona, symbol of the classic and highly appreciated Italian style, romantic and elegant at a time. Special care is devoted to details, the selection of tissues, and the coordination of color nuances.',NULL,'2017-06-19 05:55:44','2017-06-19 05:55:44'),(15,3,'Default block','PREVIEWWWWWWWWWWWWWWWWWw','The collection is inspired by the Renaissance town of Verona, symbol of the classic and highly appreciated Italian style, romantic and elegant at a time. Special care is devoted to details, the selection of tissues, and the coordination of color nuances.',NULL,'2017-06-19 05:55:44','2017-06-19 05:55:44'),(16,3,'Default block','PREVIEWWWWWWWWWWWWWWWWWw','The collection is inspired by the Renaissance town of Verona, symbol of the classic and highly appreciated Italian style, romantic and elegant at a time. Special care is devoted to details, the selection of tissues, and the coordination of color nuances.',NULL,'2017-06-19 05:55:44','2017-06-19 05:55:44'),(17,3,'Default block','PREVIEWWWWWWWWWWWWWWWWWw','The collection is inspired by the Renaissance town of Verona, symbol of the classic and highly appreciated Italian style, romantic and elegant at a time. Special care is devoted to details, the selection of tissues, and the coordination of color nuances.',NULL,'2017-06-19 05:55:44','2017-06-19 05:55:44'),(18,3,'Default block','PREVIEWWWWWWWWWWWWWWWWWw','The collection is inspired by the Renaissance town of Verona, symbol of the classic and highly appreciated Italian style, romantic and elegant at a time. Special care is devoted to details, the selection of tissues, and the coordination of color nuances.',NULL,'2017-06-19 05:55:44','2017-06-19 05:55:44'),(19,4,'Default block','PREVIEWWWWWWWWWWWWWWWWWw','The collection is inspired by the Renaissance town of Verona, symbol of the classic and highly appreciated Italian style, romantic and elegant at a time. Special care is devoted to details, the selection of tissues, and the coordination of color nuances.',NULL,'2017-06-19 05:55:44','2017-06-19 05:55:44'),(20,4,'Default block','PREVIEWWWWWWWWWWWWWWWWWw','The collection is inspired by the Renaissance town of Verona, symbol of the classic and highly appreciated Italian style, romantic and elegant at a time. Special care is devoted to details, the selection of tissues, and the coordination of color nuances.',NULL,'2017-06-19 05:55:44','2017-06-19 05:55:44'),(21,4,'Default block','PREVIEWWWWWWWWWWWWWWWWWw','The collection is inspired by the Renaissance town of Verona, symbol of the classic and highly appreciated Italian style, romantic and elegant at a time. Special care is devoted to details, the selection of tissues, and the coordination of color nuances.',NULL,'2017-06-19 05:55:44','2017-06-19 05:55:44'),(22,4,'Default block','PREVIEWWWWWWWWWWWWWWWWWw','The collection is inspired by the Renaissance town of Verona, symbol of the classic and highly appreciated Italian style, romantic and elegant at a time. Special care is devoted to details, the selection of tissues, and the coordination of color nuances.',NULL,'2017-06-19 05:55:44','2017-06-19 05:55:44'),(23,4,'Default block','PREVIEWWWWWWWWWWWWWWWWWw','The collection is inspired by the Renaissance town of Verona, symbol of the classic and highly appreciated Italian style, romantic and elegant at a time. Special care is devoted to details, the selection of tissues, and the coordination of color nuances.',NULL,'2017-06-19 05:55:44','2017-06-19 05:55:44'),(24,4,'Default block','PREVIEWWWWWWWWWWWWWWWWWw','The collection is inspired by the Renaissance town of Verona, symbol of the classic and highly appreciated Italian style, romantic and elegant at a time. Special care is devoted to details, the selection of tissues, and the coordination of color nuances.',NULL,'2017-06-19 05:55:44','2017-06-19 05:55:44'),(25,5,'Default block','PREVIEWWWWWWWWWWWWWWWWWw','The collection is inspired by the Renaissance town of Verona, symbol of the classic and highly appreciated Italian style, romantic and elegant at a time. Special care is devoted to details, the selection of tissues, and the coordination of color nuances.',NULL,'2017-06-19 05:55:44','2017-06-19 05:55:44'),(26,5,'Default block','PREVIEWWWWWWWWWWWWWWWWWw','The collection is inspired by the Renaissance town of Verona, symbol of the classic and highly appreciated Italian style, romantic and elegant at a time. Special care is devoted to details, the selection of tissues, and the coordination of color nuances.',NULL,'2017-06-19 05:55:44','2017-06-19 05:55:44'),(27,5,'Default block','PREVIEWWWWWWWWWWWWWWWWWw','The collection is inspired by the Renaissance town of Verona, symbol of the classic and highly appreciated Italian style, romantic and elegant at a time. Special care is devoted to details, the selection of tissues, and the coordination of color nuances.',NULL,'2017-06-19 05:55:44','2017-06-19 05:55:44'),(28,5,'Default block','PREVIEWWWWWWWWWWWWWWWWWw','The collection is inspired by the Renaissance town of Verona, symbol of the classic and highly appreciated Italian style, romantic and elegant at a time. Special care is devoted to details, the selection of tissues, and the coordination of color nuances.',NULL,'2017-06-19 05:55:44','2017-06-19 05:55:44'),(29,5,'Default block','PREVIEWWWWWWWWWWWWWWWWWw','The collection is inspired by the Renaissance town of Verona, symbol of the classic and highly appreciated Italian style, romantic and elegant at a time. Special care is devoted to details, the selection of tissues, and the coordination of color nuances.',NULL,'2017-06-19 05:55:44','2017-06-19 05:55:44'),(30,5,'Default block','PREVIEWWWWWWWWWWWWWWWWWw','The collection is inspired by the Renaissance town of Verona, symbol of the classic and highly appreciated Italian style, romantic and elegant at a time. Special care is devoted to details, the selection of tissues, and the coordination of color nuances.',NULL,'2017-06-19 05:55:44','2017-06-19 05:55:44');
/*!40000 ALTER TABLE `blocks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rgt` int(11) DEFAULT NULL,
  `depth` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `categories_parent_id_index` (`parent_id`),
  KEY `categories_lft_index` (`lft`),
  KEY `categories_rgt_index` (`rgt`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,NULL,1,10,0,'root',NULL,'2017-06-19 08:02:31','2017-06-19 12:14:34'),(5,NULL,11,12,0,'gdfgdfgdf','1497877695.png','2017-06-19 10:08:25','2017-06-19 12:14:34'),(6,NULL,13,16,0,'sdfdsfcsdc','1497877897.png','2017-06-19 10:11:39','2017-06-20 07:55:35'),(7,1,2,9,1,'bdfsgdfb','1497877974.png','2017-06-19 10:12:57','2017-06-19 12:14:34'),(8,7,3,8,2,'sdafsdfcsdsd',NULL,'2017-06-19 10:20:08','2017-06-19 12:14:34'),(9,8,4,7,3,'dasdasdasd',NULL,'2017-06-19 10:20:15','2017-06-19 12:14:34'),(10,9,5,6,4,'dfasdasdasd','1497944255.jpg','2017-06-19 12:14:34','2017-06-20 04:37:38'),(12,6,14,15,1,'sdfsdfsdfsd',NULL,'2017-06-20 07:55:34','2017-06-20 07:55:35');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `collections`
--

DROP TABLE IF EXISTS `collections`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `collections` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `collections`
--

LOCK TABLES `collections` WRITE;
/*!40000 ALTER TABLE `collections` DISABLE KEYS */;
INSERT INTO `collections` VALUES (1,'Some collect213123213ion','Some description','1497875527.jpg','2017-06-19 05:55:45','2017-06-19 09:32:10'),(2,'Some collection','Some description','','2017-06-19 05:55:45','2017-06-19 05:55:45'),(3,'Some collection','Some description','','2017-06-19 05:55:45','2017-06-19 05:55:45'),(4,'Some collection','Some description','1497871768.jpg','2017-06-19 05:55:45','2017-06-19 08:29:31'),(5,'test_BiGGG','asdasdasd','1497950475.jpg','2017-06-20 06:21:29','2017-06-20 06:21:29');
/*!40000 ALTER TABLE `collections` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `f_a_q_s`
--

DROP TABLE IF EXISTS `f_a_q_s`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `f_a_q_s` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `f_a_q_s`
--

LOCK TABLES `f_a_q_s` WRITE;
/*!40000 ALTER TABLE `f_a_q_s` DISABLE KEYS */;
INSERT INTO `f_a_q_s` VALUES (1,'<p>dasdasdas</p>','<p>dasdasdasd</p>','2017-06-19 10:25:34','2017-06-19 10:25:34');
/*!40000 ALTER TABLE `f_a_q_s` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `faqs`
--

DROP TABLE IF EXISTS `faqs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `faqs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faqs`
--

LOCK TABLES `faqs` WRITE;
/*!40000 ALTER TABLE `faqs` DISABLE KEYS */;
/*!40000 ALTER TABLE `faqs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `history`
--

DROP TABLE IF EXISTS `history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `history` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `entity_id` int(10) unsigned DEFAULT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `assets` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `history_type_id_foreign` (`type_id`),
  KEY `history_user_id_foreign` (`user_id`),
  CONSTRAINT `history_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `history_types` (`id`) ON DELETE CASCADE,
  CONSTRAINT `history_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `history`
--

LOCK TABLES `history` WRITE;
/*!40000 ALTER TABLE `history` DISABLE KEYS */;
INSERT INTO `history` VALUES (1,4,1,2,'save','bg-aqua','trans(\"history.backend.news.updated\") <strong>Default news</strong>',NULL,'2017-06-19 06:08:33','2017-06-19 06:08:33'),(2,5,1,4,'save','bg-aqua','trans(\"history.backend.collection.updated\") <strong>Some collection</strong>',NULL,'2017-06-19 08:29:31','2017-06-19 08:29:31'),(3,5,1,1,'save','bg-aqua','trans(\"history.backend.collection.updated\") <strong>Some collect213123213ion</strong>',NULL,'2017-06-19 08:33:31','2017-06-19 08:33:31'),(4,3,1,1,'save','bg-aqua','trans(\"history.backend.page.updated\") <strong>About us</strong>',NULL,'2017-06-19 08:36:38','2017-06-19 08:36:38'),(5,3,1,1,'save','bg-aqua','trans(\"history.backend.page.updated\") <strong>About us</strong>',NULL,'2017-06-19 09:29:26','2017-06-19 09:29:26'),(6,4,1,1,'save','bg-aqua','trans(\"history.backend.news.updated\") <strong>Default news</strong>',NULL,'2017-06-19 09:30:20','2017-06-19 09:30:20'),(7,5,1,1,'save','bg-aqua','trans(\"history.backend.collection.updated\") <strong>Some collect213123213ion</strong>',NULL,'2017-06-19 09:32:10','2017-06-19 09:32:10'),(8,4,1,1,'save','bg-aqua','trans(\"history.backend.news.updated\") <strong>Default news</strong>',NULL,'2017-06-19 09:44:08','2017-06-19 09:44:08'),(9,4,1,6,'plus','bg-green','trans(\"history.backend.news.created\") <strong></strong>',NULL,'2017-06-19 10:11:39','2017-06-19 10:11:39'),(10,6,1,4,'trash','bg-maroon','trans(\"history.backend.category.deleted\") <strong>ыфвфывфыв</strong>',NULL,'2017-06-19 10:12:45','2017-06-19 10:12:45'),(11,6,1,7,'plus','bg-green','trans(\"history.backend.category.created\") <strong>bdfsgdfb</strong>',NULL,'2017-06-19 10:12:57','2017-06-19 10:12:57'),(12,6,1,8,'plus','bg-green','trans(\"history.backend.category.created\") <strong>sdafsdfcsdsd</strong>',NULL,'2017-06-19 10:20:08','2017-06-19 10:20:08'),(13,6,1,9,'plus','bg-green','trans(\"history.backend.category.created\") <strong>dasdasdasd</strong>',NULL,'2017-06-19 10:20:15','2017-06-19 10:20:15'),(14,4,1,2,'trash','bg-maroon','trans(\"history.backend.news.deleted\") <strong>Default news</strong>',NULL,'2017-06-19 10:21:37','2017-06-19 10:21:37'),(15,7,1,1,'plus','bg-green','trans(\"history.backend.faq.created\") <strong>1</strong>',NULL,'2017-06-19 10:25:34','2017-06-19 10:25:34'),(16,7,1,1,'save','bg-aqua','trans(\"history.backend.faq.updated\") <strong>1</strong>',NULL,'2017-06-19 10:27:02','2017-06-19 10:27:02'),(17,6,1,10,'plus','bg-green','trans(\"history.backend.category.created\") <strong>dfasdasdasd</strong>',NULL,'2017-06-19 12:14:35','2017-06-19 12:14:35'),(18,3,1,1,'save','bg-aqua','trans(\"history.backend.page.updated\") <strong>About us</strong>',NULL,'2017-06-20 04:33:58','2017-06-20 04:33:58'),(19,6,1,10,'save','bg-aqua','trans(\"history.backend.category.updated\") <strong>dfasdasdasd</strong>',NULL,'2017-06-20 04:37:38','2017-06-20 04:37:38'),(20,6,1,11,'plus','bg-green','trans(\"history.backend.category.created\") <strong>testBIG</strong>',NULL,'2017-06-20 06:18:03','2017-06-20 06:18:03'),(21,5,1,5,'plus','bg-green','trans(\"history.backend.collection.created\") <strong>test_BiGGG</strong>',NULL,'2017-06-20 06:21:29','2017-06-20 06:21:29'),(22,6,1,11,'trash','bg-maroon','trans(\"history.backend.category.deleted\") <strong>testBIG</strong>',NULL,'2017-06-20 07:44:50','2017-06-20 07:44:50'),(23,6,1,12,'plus','bg-green','trans(\"history.backend.category.created\") <strong>sdfsdfsdfsd</strong>',NULL,'2017-06-20 07:55:35','2017-06-20 07:55:35'),(24,2,1,3,'save','bg-aqua','trans(\"history.backend.roles.updated\") <strong>User</strong>',NULL,'2017-06-20 08:40:19','2017-06-20 08:40:19');
/*!40000 ALTER TABLE `history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `history_types`
--

DROP TABLE IF EXISTS `history_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `history_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `history_types`
--

LOCK TABLES `history_types` WRITE;
/*!40000 ALTER TABLE `history_types` DISABLE KEYS */;
INSERT INTO `history_types` VALUES (1,'User','2017-06-19 05:55:43','2017-06-19 05:55:43'),(2,'Role','2017-06-19 05:55:43','2017-06-19 05:55:43'),(3,'Page','2017-06-19 05:55:43','2017-06-19 05:55:43'),(4,'News','2017-06-19 05:55:43','2017-06-19 05:55:43'),(5,'Collection','2017-06-19 05:55:43','2017-06-19 05:55:43'),(6,'Category','2017-06-19 05:55:43','2017-06-19 05:55:43'),(7,'FAQ','2017-06-19 05:55:43','2017-06-19 05:55:43');
/*!40000 ALTER TABLE `history_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `markers`
--

DROP TABLE IF EXISTS `markers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `markers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `collection_id` int(11) NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `x` double(8,2) NOT NULL,
  `y` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `markers`
--

LOCK TABLES `markers` WRITE;
/*!40000 ALTER TABLE `markers` DISABLE KEYS */;
INSERT INTO `markers` VALUES (1,1,'11111','Default title',290.00,173.00,'2017-06-19 05:55:46','2017-06-19 09:36:58'),(2,1,'11111','Default title',271.00,82.00,'2017-06-19 05:55:46','2017-06-19 09:36:58'),(3,1,'11111','Default title',0.30,0.50,'2017-06-19 05:55:46','2017-06-19 05:55:46'),(4,1,'11111','Default title',799.00,78.00,'2017-06-19 05:55:46','2017-06-19 09:32:33'),(5,1,'11111','Default title',0.30,0.50,'2017-06-19 05:55:46','2017-06-19 05:55:46'),(6,2,'11111','Default title',0.30,0.50,'2017-06-19 05:55:46','2017-06-19 05:55:46'),(7,2,'11111','Default title',0.30,0.50,'2017-06-19 05:55:46','2017-06-19 05:55:46'),(8,2,'11111','Default title',0.30,0.50,'2017-06-19 05:55:46','2017-06-19 05:55:46'),(9,2,'11111','Default title',0.30,0.50,'2017-06-19 05:55:46','2017-06-19 05:55:46'),(10,2,'11111','Default title',0.30,0.50,'2017-06-19 05:55:46','2017-06-19 05:55:46'),(11,3,'11111','Default title',0.30,0.50,'2017-06-19 05:55:46','2017-06-19 05:55:46'),(12,3,'11111','Default title',0.30,0.50,'2017-06-19 05:55:46','2017-06-19 05:55:46'),(13,3,'11111','Default title',0.30,0.50,'2017-06-19 05:55:46','2017-06-19 05:55:46'),(14,3,'11111','Default title',0.30,0.50,'2017-06-19 05:55:46','2017-06-19 05:55:46'),(15,3,'11111','Default title',0.30,0.50,'2017-06-19 05:55:46','2017-06-19 05:55:46'),(17,4,'11111','Default title',712.00,184.00,'2017-06-19 05:55:46','2017-06-19 08:29:48'),(18,4,'11111','Default title',676.00,198.00,'2017-06-19 05:55:46','2017-06-19 08:29:48'),(19,4,'11111','Default title',0.30,0.50,'2017-06-19 05:55:46','2017-06-19 05:55:46'),(20,4,'11111','Default title',0.30,0.50,'2017-06-19 05:55:46','2017-06-19 05:55:46'),(21,5,'11111','Default title',0.30,0.50,'2017-06-19 05:55:46','2017-06-19 05:55:46'),(22,5,'11111','Default title',0.30,0.50,'2017-06-19 05:55:46','2017-06-19 05:55:46'),(23,5,'11111','Default title',0.30,0.50,'2017-06-19 05:55:46','2017-06-19 05:55:46'),(24,5,'11111','Default title',0.30,0.50,'2017-06-19 05:55:46','2017-06-19 05:55:46'),(25,5,'11111','Default title',0.30,0.50,'2017-06-19 05:55:46','2017-06-19 05:55:46'),(26,4,'#00001','Default tile',0.30,0.50,'2017-06-19 08:26:28','2017-06-19 08:26:28'),(27,4,'#00001','Default tile',0.30,0.50,'2017-06-19 08:28:43','2017-06-19 08:28:43'),(28,5,'#00001','Default title',679.00,149.00,'2017-06-20 06:21:29','2017-06-20 06:21:29'),(29,5,'#00001','Default title',679.00,149.00,'2017-06-20 06:21:29','2017-06-20 06:21:29'),(30,5,'#00001','Default title',679.00,149.00,'2017-06-20 06:21:29','2017-06-20 06:21:29'),(31,5,'#00001','Default title',679.00,149.00,'2017-06-20 06:21:29','2017-06-20 06:21:29'),(32,5,'#00001','Default title',679.00,149.00,'2017-06-20 06:21:29','2017-06-20 06:21:29');
/*!40000 ALTER TABLE `markers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=251 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (238,'2014_10_12_000000_create_users_table',1),(239,'2014_10_12_100000_create_password_resets_table',1),(240,'2015_12_28_171741_create_social_logins_table',1),(241,'2015_12_29_015055_setup_access_tables',1),(242,'2016_07_03_062439_create_history_tables',1),(243,'2017_04_04_131153_create_sessions_table',1),(244,'2017_06_01_105650_create_pages_table',1),(245,'2017_06_01_105739_create_blocks_table',1),(246,'2017_06_05_070036_create_categories_table',1),(247,'2017_06_07_070735_create_news_table',1),(248,'2017_06_08_074756_create_collections_table',1),(249,'2017_06_09_062536_create_faqs_table',1),(250,'2017_06_12_082546_create_markers_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `preview` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (1,'Default news','<head><meta charset=\"utf-8\"><meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\"><meta name=\"description\" content=\"\"><meta name=\"viewport\" content=\"width=device-width,initial-scale=1,maximum-scale=1\">','<p>PREVIEWWWWWWWWWWWWWWWWWw</p>','<p>The collection is inspired by the Renaissance town of Verona, symbol of the classic and highly appreciated Italian style, romantic and elegant at a time. Special care is devoted to details, the selection of tissues, and the coordination of color nuances.</p>','news','1497876244.png','2017-06-19 05:55:45','2017-06-19 09:44:08');
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pageKey` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pages`
--

LOCK TABLES `pages` WRITE;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
INSERT INTO `pages` VALUES (1,'about','About us','<head><meta charset=\"utf-8\"><meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\r\n<meta name=\"description\" content=\"\"><meta name=\"viewport\" content=\"width=device-width,initial-scale=1,maximum-scale=1\">','<p><strong>The collection is inspired by the Renaissance town of Verona, symbol of the classic and highly appreciated Italian style, romantic and </strong>elegant at a time. Special care is devoted to details, the selection of tissues, and the coordination of color nuances.</p>','2017-06-19 05:55:43','2017-06-20 04:33:58'),(2,'contacts','Contact us','<head><meta charset=\"utf-8\"><meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\n<meta name=\"description\" content=\"\"><meta name=\"viewport\" content=\"width=device-width,initial-scale=1,maximum-scale=1\">','The collection is inspired by the Renaissance town of Verona, symbol of the classic and highly appreciated Italian style, romantic and elegant at a time. Special care is devoted to details, the selection of tissues, and the coordination of color nuances.','2017-06-19 05:55:43','2017-06-19 05:55:43'),(3,'faq','Questions','<head><meta charset=\"utf-8\"><meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\n<meta name=\"description\" content=\"\"><meta name=\"viewport\" content=\"width=device-width,initial-scale=1,maximum-scale=1\">','The collection is inspired by the Renaissance town of Verona, symbol of the classic and highly appreciated Italian style, romantic and elegant at a time. Special care is devoted to details, the selection of tissues, and the coordination of color nuances.','2017-06-19 05:55:43','2017-06-19 05:55:43'),(4,'news','News','<head><meta charset=\"utf-8\"><meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\n<meta name=\"description\" content=\"\"><meta name=\"viewport\" content=\"width=device-width,initial-scale=1,maximum-scale=1\">','The collection is inspired by the Renaissance town of Verona, symbol of the classic and highly appreciated Italian style, romantic and elegant at a time. Special care is devoted to details, the selection of tissues, and the coordination of color nuances.','2017-06-19 05:55:43','2017-06-19 05:55:43'),(5,'showrooms','Showrooms','<head><meta charset=\"utf-8\"><meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\n<meta name=\"description\" content=\"\"><meta name=\"viewport\" content=\"width=device-width,initial-scale=1,maximum-scale=1\">','The collection is inspired by the Renaissance town of Verona, symbol of the classic and highly appreciated Italian style, romantic and elegant at a time. Special care is devoted to details, the selection of tissues, and the coordination of color nuances.','2017-06-19 05:55:43','2017-06-19 05:55:43'),(6,'payments','Payments and delivery','<head><meta charset=\"utf-8\"><meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\n<meta name=\"description\" content=\"\"><meta name=\"viewport\" content=\"width=device-width,initial-scale=1,maximum-scale=1\">','The collection is inspired by the Renaissance town of Verona, symbol of the classic and highly appreciated Italian style, romantic and elegant at a time. Special care is devoted to details, the selection of tissues, and the coordination of color nuances.','2017-06-19 05:55:43','2017-06-19 05:55:43');
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permission_role`
--

DROP TABLE IF EXISTS `permission_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permission_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `permission_role_permission_id_foreign` (`permission_id`),
  KEY `permission_role_role_id_foreign` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission_role`
--

LOCK TABLES `permission_role` WRITE;
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;
INSERT INTO `permission_role` VALUES (1,1,2);
/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort` smallint(5) unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'view-backend','View Backend',1,'2017-06-19 05:55:42','2017-06-19 05:55:42');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_user`
--

DROP TABLE IF EXISTS `role_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `role_user_user_id_foreign` (`user_id`),
  KEY `role_user_role_id_foreign` (`role_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_user`
--

LOCK TABLES `role_user` WRITE;
/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;
INSERT INTO `role_user` VALUES (1,1,1),(2,2,2),(3,3,3);
/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `all` tinyint(1) NOT NULL DEFAULT '0',
  `sort` smallint(5) unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Administrator',1,1,'2017-06-19 05:55:40','2017-06-19 05:55:40'),(2,'Executive',0,2,'2017-06-19 05:55:40','2017-06-19 05:55:40'),(3,'User',1,1,'2017-06-19 05:55:40','2017-06-20 08:40:19');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  UNIQUE KEY `sessions_id_unique` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('rS0anbeo2705fXNS8fFlorKzF8hG4Zmeu6XfMlCk',1,'127.0.0.1','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36','ZXlKcGRpSTZJa05OYkdkdE4zRmtabE5LT1hKUFNuTnhZVUZtWm1jOVBTSXNJblpoYkhWbElqb2lTVGR2V0ZsTmQyWmNMMDF4ZEhGSWFsZGxSMlJsVFVJMWVIUm5WWFpxWlU5emVXSTBWVWR1TkZjMlJITlJhRVU1UzBsdlRqbGhhMk5WTTFSblRuZHBPV2gySzBOVlMwazNWMVZPZUhoUk5HMXZPSGhoYkZWcGJVeFBjM2hZTjNaeWFHWTNSSFpZVUZkT1dqTk9VV05uY1hKUWRuVjJlblJ5T0Z3dmFreHRZbXhYU0RSRWNWSTBVR1pZVjFsM2IxVk1kRlpEZG1KbUsxZHBaWGhxUkRaak9UTXdRek5qWm5WTE1GaHhNMHhtTlRaU1l6SXdZalZaVW5waGVHWTNZV1ZGVDFSek5HcENSRFJ0Y2l0Y0wwOVlhVVJYU3pkelpIRlBhakIyUkVkMGNEaDBSR3hRSzA5dFpVZ3lVRWc1VldZeVJXc3lNR2RHTTFWaE1VWlNTalpCY1dkbVZVRmFabWh6YW5kUU5XZFBaa2czY0dkbVJEbEpWM2cyU1VwU2RWTTNXazljTDFRNWJIVmlRWEZwWlRWRmVtczFObVJpWEM5MlRraGpiVXcxVFZOMlhDOXBZV2R2UVU1ME5WcGFNMGgwY1hodVlVNDFiMU4zYjF3dmMyVm9VVWRYYUhoaU1HVndkRTlzTWpaTFZsZFNWSFpDVFhkY0x6UlROU3RWVVRKd1NXYzJOMG8wZWl0Sk5VMWFUR3BxYTNCbGJsd3ZYQzlhU3pWUE1WbEZka28zTjAxbmFFeEJNV0ZxYUZKRmQySmlha3R3WjFneFdFSTRNVnBTY1ZGbE5tRktXVzVXVTNjNE5HNDRjRUZOUmpWWWJ6QnRURGRqYkhCRksyVnRSSFJSUFQwaUxDSnRZV01pT2lJNFpEaGxZV1k0Tnpkak1XUmxZbUUzTVRJek5ETXdPR1pqTVdRMFlUaGhObUU0TVdVeE9XUTBZamN6WXpreFltVmtOMll4TVRFM1l6RXpPR1k0TlRBMUluMD0=',1497963549);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `social_logins`
--

DROP TABLE IF EXISTS `social_logins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `social_logins` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `provider` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `social_logins_user_id_foreign` (`user_id`),
  CONSTRAINT `social_logins_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `social_logins`
--

LOCK TABLES `social_logins` WRITE;
/*!40000 ALTER TABLE `social_logins` DISABLE KEYS */;
/*!40000 ALTER TABLE `social_logins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `confirmation_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin','Istrator','admin@admin.com','$2y$10$9Syy2FDFltlRTp87RUtRAOFqZhGXHV1NhvgGfEgVh9PQ018YZhyXu',1,'95f8ddf36def50cc96bad8f37caafe1d',1,'nwqWoMu7Ejj8R1vHTAEwzP7pvyJEQwu80C3NrldiryieaJedDGEXoRpbTADu','2017-06-19 05:55:39','2017-06-19 05:55:39',NULL),(2,'Backend','User','executive@executive.com','$2y$10$G1Uq5Tjh2UvTFsLDB6etNuVICQbsZoev39IE44c2wWQEkzHJMf1DC',1,'cc8b8e0b372d6a05fd414a4eb6c24807',1,NULL,'2017-06-19 05:55:39','2017-06-19 05:55:39',NULL),(3,'Default','User','user@user.com','$2y$10$mDPmuIAAO8DvdzufIHuc3OJKdNDbNI0if.oSsOWcWx6haAgL7dmbW',1,'e08614633709205752125fc1dcc82488',1,NULL,'2017-06-19 05:55:39','2017-06-19 05:55:39',NULL);
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

-- Dump completed on 2017-06-20 16:37:56
