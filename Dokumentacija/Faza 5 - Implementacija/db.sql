CREATE DATABASE  IF NOT EXISTS `tobagodb`;
USE `tobagodb`;
-- MySQL dump 10.13  Distrib 8.0.29, for Linux (x86_64)
--
-- Host: localhost    Database: tobagodb
-- ------------------------------------------------------
-- Server version	8.0.29

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Comment`
--

DROP TABLE IF EXISTS `Comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Comment` (
  `idComment` bigint unsigned NOT NULL AUTO_INCREMENT,
  `commenter` bigint unsigned DEFAULT NULL,
  `post` bigint unsigned NOT NULL,
  `content` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `timeCreated` timestamp NOT NULL,
  PRIMARY KEY (`idComment`),
  KEY `comment_commenter_index` (`commenter`),
  KEY `comment_post_index` (`post`),
  CONSTRAINT `comment_commenter_foreign` FOREIGN KEY (`commenter`) REFERENCES `User` (`idUser`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `comment_post_foreign` FOREIGN KEY (`post`) REFERENCES `Post` (`idPost`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Comment`
--

LOCK TABLES `Comment` WRITE;
/*!40000 ALTER TABLE `Comment` DISABLE KEYS */;
INSERT INTO `Comment` VALUES (1,1,1,'Razumna pretpostavka makes the world go round!','2022-06-02 08:17:21'),(2,8,2,'Tobego Tobago','2022-06-02 08:17:21'),(3,7,3,'Da budem menadžer i posle se zaposlim u fabrici menadžmenta!','2022-06-02 08:17:21'),(4,2,4,':(','2022-06-02 08:17:21'),(5,9,4,':(','2022-06-02 08:17:21'),(6,4,4,':(','2022-06-02 08:17:21'),(7,10,5,'Ili što bi rekao Rambo Amadeus: Prijatelju, prijateljuu..','2022-06-02 08:17:21'),(8,2,5,'Danas na ASP2 učimo trivijalna stabla pretrage :D','2022-06-02 08:17:21'),(9,6,6,'haha brain rot funni','2022-06-02 08:17:21'),(10,2,8,':(','2022-06-02 08:17:21'),(11,9,8,':(','2022-06-02 08:17:21'),(12,3,8,':(','2022-06-02 08:17:21'),(13,7,8,':(','2022-06-02 08:17:21'),(14,8,8,':(','2022-06-02 08:17:21'),(15,1,8,':(','2022-06-02 08:17:21'),(16,1,9,'Vive la TOBAGO!','2022-06-02 08:17:21'),(17,5,9,'TOBAGO eterna e sua vitoria!','2022-06-02 08:17:21'),(18,6,9,'TOBAGO Banzai!','2022-06-02 08:17:21'),(19,7,9,'Za Tobago i Kavujliju!','2022-06-02 08:17:21');
/*!40000 ALTER TABLE `Comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Post`
--

DROP TABLE IF EXISTS `Post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Post` (
  `idPost` bigint unsigned NOT NULL AUTO_INCREMENT,
  `isPermanent` tinyint(1) NOT NULL,
  `timePosted` timestamp NOT NULL,
  `heading` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` bigint unsigned DEFAULT NULL,
  `isLocked` tinyint(1) NOT NULL,
  PRIMARY KEY (`idPost`),
  KEY `post_author_index` (`author`),
  CONSTRAINT `post_author_foreign` FOREIGN KEY (`author`) REFERENCES `User` (`idUser`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Post`
--

LOCK TABLES `Post` WRITE;
/*!40000 ALTER TABLE `Post` DISABLE KEYS */;
INSERT INTO `Post` VALUES (1,0,'2022-06-02 08:17:21','Razumna pretpostavka','Mit. Na ETF-u ne postoji razum.',3,0),(2,0,'2022-06-02 07:27:34','Računarski centar','Pogresan naziv za računski centar :) ',4,0),(3,0,'2022-06-02 08:10:36','ETF','E, Treb\'o sam FON',5,0),(4,0,'2022-06-02 08:05:58','Projekat iz OS1','Koncentrisana agonija predstavljena kao predispitna obaveza.',6,0),(5,1,'2022-06-01 07:17:53','Kolega, ovo je trivijalno','Izjava vredna recitovanja pesme o psu, ljubavi i majci.',7,0),(6,0,'2022-06-02 07:40:58','Poništio devetku','Simptom poslednjeg stadijuma encefalopatije',8,0),(7,0,'2022-06-02 07:22:24','Goli Otok','Mesto za ljude koji klikću hemijskom i cupkaju nogom za vreme ispita.',9,0),(8,1,'2022-05-21 07:31:04','Cyber Sex','Cyber šta??',10,0),(9,0,'2022-06-02 08:13:05','Kavujlija','U potpunosti originalna ideja. Nikakve veze nema sa Vukajlijom. P.S. Živeo TOBAGO!',11,0);
/*!40000 ALTER TABLE `Post` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Role`
--

DROP TABLE IF EXISTS `Role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Role` (
  `idRole` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `privilege` int NOT NULL,
  PRIMARY KEY (`idRole`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Role`
--

LOCK TABLES `Role` WRITE;
/*!40000 ALTER TABLE `Role` DISABLE KEYS */;
INSERT INTO `Role` VALUES (1,'user',0),(2,'moderator',0),(3,'administrator',0);
/*!40000 ALTER TABLE `Role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `User`
--

DROP TABLE IF EXISTS `User`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `User` (
  `idUser` bigint unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postStatus` int NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` bigint unsigned NOT NULL,
  `isBanned` tinyint(1) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`idUser`),
  UNIQUE KEY `user_username_unique` (`username`),
  KEY `user_role_index` (`role`),
  CONSTRAINT `user_role_foreign` FOREIGN KEY (`role`) REFERENCES `Role` (`idRole`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `User`
--

LOCK TABLES `User` WRITE;
/*!40000 ALTER TABLE `User` DISABLE KEYS */;
INSERT INTO `User` VALUES (1,'admin','$2y$10$1Q25/9s83IF1o1npaWkHPu5YWL6VeWpPBHe.H5uDh6yuecR/BAeS2',0,'Regional manager',3,0,NULL),(2,'mod','$2y$10$Pp2y/piJMYZWf8f0Lx7KHO6FvLgolZtT6DP.l3TqYxRDTwMu84RTS',0,'Assistant TO the regional manager',2,0,NULL),(3,'Sturm','$2y$10$FIvdlcj1X6HI.9ZeJ5A.POY63l/dMv9UhFIXTknk41yW7aM4AehSm',1,NULL,1,0,NULL),(4,'Tobago','$2y$10$ylwLUJGnwJ31dqxHvy/AUeNZM2hLqkxDTMORTlEwHnfQPqD.U.m.S',1,'? ? ?',1,0,NULL),(5,'Asha20','$2y$10$qs4osD8dJlXejQDh0OmjjenZC31XZBKRmOKLjul/bsIleszimj.W.',1,'JS Wizard, tetris crackhead',1,0,NULL),(6,'SlavicLeshy','$2y$10$4fKQuG0qp7vHb9/9NM9aAudg/w5b4VhpNi286UDYiYRALeSokNq4a',1,'Violence enjoyer',1,0,NULL),(7,'Walter','$2y$10$uFXPk6oKOg90U9U0QWfRBurhbhb.SyX85RfDf9HW5hio0NCeqgehm',0,'Branim Sarajevo',1,0,NULL),(8,'Ćeđor','$2y$10$qg4Yun441Rvfe2bBegGkcOL2C9n2DYD04FsfKyhL4Xesnze6MPXUu',1,'?',1,0,NULL),(9,'Trinidad','$2y$10$VEWZxOiOqjfMvxLgofvCbenh034zh./i4Fn8S8aOet.77bGGXjdHS',1,'? ? ?',1,0,NULL),(10,'RickAstley','$2y$10$zxZU/RyolxebLlpgaK7Vle0jUx/4xISyCsMpijXFLA7QEC/Q2d9PK',0,'https://www.youtube.com/watch?v=dQw4w9WgXcQ',1,0,NULL),(11,'DaftPunk','$2y$10$D9rQ9IqLlZfoaXSOJ1CIH.1bymky3.f7rIIT4VgldLj.8ogDpkHPS',1,'around the world around the world around the world around the world around the world',1,0,NULL);
/*!40000 ALTER TABLE `User` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Vote`
--

DROP TABLE IF EXISTS `Vote`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Vote` (
  `idVote` bigint unsigned NOT NULL AUTO_INCREMENT,
  `voter` bigint unsigned NOT NULL,
  `post` bigint unsigned NOT NULL,
  `value` tinyint(1) NOT NULL,
  PRIMARY KEY (`idVote`),
  UNIQUE KEY `vote_voter_post_unique` (`voter`,`post`),
  KEY `vote_voter_index` (`voter`),
  KEY `vote_post_index` (`post`),
  CONSTRAINT `vote_post_foreign` FOREIGN KEY (`post`) REFERENCES `Post` (`idPost`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `vote_voter_foreign` FOREIGN KEY (`voter`) REFERENCES `User` (`idUser`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Vote`
--

LOCK TABLES `Vote` WRITE;
/*!40000 ALTER TABLE `Vote` DISABLE KEYS */;
INSERT INTO `Vote` VALUES (1,1,1,1),(2,2,1,1),(3,3,1,1),(4,4,1,1),(5,5,1,-1),(6,4,2,-1),(7,5,2,-1),(8,6,2,-1),(9,7,2,-1),(10,8,2,1),(11,5,3,1),(12,6,3,1),(13,2,3,1),(14,10,3,-1),(15,1,3,1),(16,2,4,1),(17,11,4,1),(18,1,4,1),(19,2,5,1),(20,3,5,1),(21,4,5,1),(22,6,5,1),(23,9,5,1),(24,11,5,1),(25,6,6,1),(26,9,6,-1),(27,11,6,-1),(28,9,7,1),(29,11,7,1),(30,1,8,1),(31,11,8,1),(32,2,8,1),(33,3,8,1),(34,4,8,1),(35,5,8,-1),(36,6,8,1),(37,7,8,-1),(38,4,9,1),(39,5,9,-1),(40,6,9,1),(41,7,9,-1);
/*!40000 ALTER TABLE `Vote` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2019_12_14_000001_create_personal_access_tokens_table',1),(2,'2022_05_12_090201_create_role_table',1),(3,'2022_05_12_090211_create_user_table',1),(4,'2022_05_12_090716_create_post_table',1),(5,'2022_05_12_090849_create_vote_table',1),(6,'2022_05_12_091105_create_comment_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-06-02 12:19:03
