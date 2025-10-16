-- MySQL dump 10.13  Distrib 8.0.43, for Linux (x86_64)
--
-- Host: localhost    Database: live-beauty
-- ------------------------------------------------------
-- Server version	8.0.43-0ubuntu0.22.04.1

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
-- Table structure for table `achats`
--

DROP TABLE IF EXISTS `achats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `achats` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `modele_id` bigint unsigned NOT NULL,
  `jetons` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'detail',
  `photo_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `achats_user_modele_type_photo_unique` (`user_id`,`modele_id`,`type`,`photo_path`),
  KEY `achats_modele_id_foreign` (`modele_id`),
  CONSTRAINT `achats_modele_id_foreign` FOREIGN KEY (`modele_id`) REFERENCES `modeles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `achats_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `achats`
--

LOCK TABLES `achats` WRITE;
/*!40000 ALTER TABLE `achats` DISABLE KEYS */;
INSERT INTO `achats` VALUES (1,1,2,0,'2025-09-28 11:40:12','2025-09-28 11:40:12','detail','photos/7ueMRKc0Wq4xz7gA8sGtKLsbu0OuQPKow7mZIfpb.jpg'),(2,1,2,5,'2025-09-28 11:40:26','2025-09-28 11:40:26','global',''),(3,6,2,6,'2025-09-28 16:49:00','2025-09-28 16:49:00','detail','photos/7ueMRKc0Wq4xz7gA8sGtKLsbu0OuQPKow7mZIfpb.jpg'),(4,6,2,10,'2025-09-28 16:49:09','2025-09-28 16:49:09','global','');
/*!40000 ALTER TABLE `achats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `favoris`
--

DROP TABLE IF EXISTS `favoris`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `favoris` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `modele_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `favoris_user_id_foreign` (`user_id`),
  KEY `favoris_modele_id_foreign` (`modele_id`),
  CONSTRAINT `favoris_modele_id_foreign` FOREIGN KEY (`modele_id`) REFERENCES `modeles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `favoris_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `favoris`
--

LOCK TABLES `favoris` WRITE;
/*!40000 ALTER TABLE `favoris` DISABLE KEYS */;
INSERT INTO `favoris` VALUES (6,3,2,NULL,NULL),(7,6,2,NULL,NULL);
/*!40000 ALTER TABLE `favoris` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `historique_show_prives`
--

DROP TABLE IF EXISTS `historique_show_prives`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `historique_show_prives` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `show_prive_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `modele_id` bigint unsigned NOT NULL,
  `date` date NOT NULL,
  `debut` time NOT NULL,
  `fin` time NOT NULL,
  `duree` int NOT NULL,
  `jetons_total` int NOT NULL,
  `etat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en_attente',
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `is_live` tinyint(1) NOT NULL DEFAULT '1',
  `room_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `access_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `socket_room` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `broadcaster_socket_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `historique_show_prives`
--

LOCK TABLES `historique_show_prives` WRITE;
/*!40000 ALTER TABLE `historique_show_prives` DISABLE KEYS */;
/*!40000 ALTER TABLE `historique_show_prives` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jetons`
--

DROP TABLE IF EXISTS `jetons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jetons` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `modele_id` bigint unsigned DEFAULT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre_de_jetons` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jetons`
--

LOCK TABLES `jetons` WRITE;
/*!40000 ALTER TABLE `jetons` DISABLE KEYS */;
INSERT INTO `jetons` VALUES (1,NULL,'Jeton','Jeton',10.00,'2025-07-06 08:59:18','2025-07-06 08:59:18'),(2,4,'Saut','Sauté',10.00,'2025-07-28 11:23:40','2025-07-28 11:23:40'),(3,4,'Tourné','Tourné',15.00,'2025-07-28 11:23:54','2025-07-28 11:23:54'),(4,4,'Courrir','Courrir',50.00,'2025-07-28 11:24:14','2025-07-28 11:24:14'),(12,2,'Suce ton doigt',NULL,5.00,'2025-10-05 18:23:58','2025-10-05 18:23:58'),(13,2,'Mords-toi les lèvres',NULL,5.00,'2025-10-05 18:24:04','2025-10-05 18:24:04'),(14,2,'lèche tes lèvres',NULL,5.00,'2025-10-05 18:24:09','2025-10-05 18:24:09'),(15,2,'Envoie un Bisous',NULL,5.00,'2025-10-05 18:24:13','2025-10-05 18:24:13'),(16,2,'5 fessées',NULL,15.00,'2025-10-05 18:24:21','2025-10-05 18:24:21'),(17,2,'montre tes seins',NULL,25.00,'2025-10-05 18:24:26','2025-10-05 18:24:26'),(18,2,'Twerk',NULL,25.00,'2025-10-05 18:24:30','2025-10-05 18:24:30');
/*!40000 ALTER TABLE `jetons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jetons_proposes`
--

DROP TABLE IF EXISTS `jetons_proposes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jetons_proposes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `nombre_de_jetons` int NOT NULL DEFAULT '0',
  `inputs` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jetons_proposes`
--

LOCK TABLES `jetons_proposes` WRITE;
/*!40000 ALTER TABLE `jetons_proposes` DISABLE KEYS */;
INSERT INTO `jetons_proposes` VALUES (2,'Suce ton doigt',NULL,5,NULL,'2025-10-05 17:50:37','2025-10-05 17:50:37'),(3,'Mords-toi les lèvres',NULL,5,NULL,'2025-10-05 17:53:02','2025-10-05 17:53:02'),(4,'lèche tes lèvres',NULL,5,NULL,'2025-10-05 17:54:02','2025-10-05 17:54:02'),(5,'Envoie un Bisous',NULL,5,NULL,'2025-10-05 17:55:10','2025-10-05 17:55:10'),(6,'5 fessées',NULL,15,NULL,'2025-10-05 17:56:04','2025-10-05 17:56:04'),(7,'montre tes seins',NULL,25,NULL,'2025-10-05 18:02:53','2025-10-05 18:02:53'),(8,'Twerk',NULL,25,NULL,'2025-10-05 18:03:48','2025-10-05 18:03:48');
/*!40000 ALTER TABLE `jetons_proposes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lives`
--

DROP TABLE IF EXISTS `lives`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lives` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `modele_id` bigint unsigned NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lives_modele_id_foreign` (`modele_id`),
  CONSTRAINT `lives_modele_id_foreign` FOREIGN KEY (`modele_id`) REFERENCES `modeles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lives`
--

LOCK TABLES `lives` WRITE;
/*!40000 ALTER TABLE `lives` DISABLE KEYS */;
/*!40000 ALTER TABLE `lives` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_reset_tokens_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2025_06_28_100115_create_modeles_table',1),(6,'2025_06_29_072855_add_email_and_password_to_modeles_table',1),(7,'2025_06_29_085425_create_jetons_table',1),(8,'2025_06_29_140357_add_en_ligne_to_modeles_table',1),(9,'2025_06_29_143126_create_lives_table',1),(10,'2025_06_29_180015_create_users_table',2),(11,'2025_07_19_175830_add_en_live_to_modeles_table',3),(12,'2025_07_19_183435_add_en_live_to_modeles_table',3),(13,'2025_07_25_182417_add_jetons_to_users_table',4),(14,'2025_07_26_150724_make_all_users_columns_nullable',5),(15,'2025_07_26_203332_rename_prix_column_in_jetons_table',6),(16,'2025_07_26_204441_add_modele_id_to_jetons_table',6),(17,'2025_08_09_144151_create_favoris_table',7),(18,'2025_08_09_154025_change_video_columns_to_json_in_modeles_table',8),(19,'2025_08_13_191018_add_banni_to_users_table',9),(20,'2025_08_15_183926_add_jetons_surprise_to_modeles_table',10),(21,'2025_08_19_163352_add_nombre_jetons_show_privee_to_modeles_table',11),(22,'2025_08_19_171413_add_duree_show_privee_to_modeles_table',11),(23,'2025_08_19_184449_create_shows_prives_table',11),(24,'2025_09_10_191943_add_infos_to_modeles_table',12),(25,'2025_09_10_193538_change_services_column_in_modeles_table',12),(26,'2025_09_14_145051_create_model_connections_table',13),(27,'2025_09_14_145203_create_user_token_histories_table',13),(28,'2025_09_14_150445_create_modele_historiques_table',13),(29,'2025_09_16_222655_update_show_prives_and_create_historique_table',14),(30,'2025_09_25_182925_add_blur_fields_to_modeles_table',15),(31,'2025_09_27_130516_create_achats_table',16),(32,'2025_09_27_175120_add_prix_flou_detail_to_modeles_table',17),(33,'2025_09_27_192541_add_type_and_photo_to_achats_table',17),(34,'2025_09_27_195928_update_achats_unique_index',17),(35,'2025_09_29_193251_create_jetons_proposes_table',18),(36,'2025_10_08_191320_add_prive_to_modeles_table',19);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_connections`
--

DROP TABLE IF EXISTS `model_connections`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_connections` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `modele_id` bigint unsigned NOT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `model_connections_modele_id_index` (`modele_id`),
  CONSTRAINT `model_connections_modele_id_foreign` FOREIGN KEY (`modele_id`) REFERENCES `modeles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_connections`
--

LOCK TABLES `model_connections` WRITE;
/*!40000 ALTER TABLE `model_connections` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_connections` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modele_historiques`
--

DROP TABLE IF EXISTS `modele_historiques`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `modele_historiques` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `modele_id` bigint unsigned NOT NULL,
  `jour` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `modele_historiques_modele_id_index` (`modele_id`),
  CONSTRAINT `modele_historiques_modele_id_foreign` FOREIGN KEY (`modele_id`) REFERENCES `modeles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modele_historiques`
--

LOCK TABLES `modele_historiques` WRITE;
/*!40000 ALTER TABLE `modele_historiques` DISABLE KEYS */;
INSERT INTO `modele_historiques` VALUES (1,2,'2025-09-16','2025-09-16 22:00:14','2025-09-16 22:00:14'),(2,2,'2025-09-19','2025-09-19 18:07:26','2025-09-19 18:07:26'),(3,2,'2025-09-19','2025-09-19 19:32:15','2025-09-19 19:32:15'),(4,2,'2025-09-21','2025-09-21 17:36:17','2025-09-21 17:36:17'),(5,2,'2025-09-23','2025-09-23 20:53:19','2025-09-23 20:53:19'),(6,2,'2025-09-25','2025-09-25 07:24:22','2025-09-25 07:24:22'),(7,2,'2025-09-25','2025-09-25 07:26:56','2025-09-25 07:26:56'),(8,2,'2025-09-25','2025-09-25 07:49:48','2025-09-25 07:49:48'),(9,2,'2025-09-25','2025-09-25 19:34:38','2025-09-25 19:34:38'),(10,2,'2025-09-27','2025-09-27 14:19:04','2025-09-27 14:19:04'),(11,2,'2025-09-28','2025-09-28 16:46:37','2025-09-28 16:46:37'),(12,2,'2025-09-28','2025-09-28 16:56:08','2025-09-28 16:56:08'),(13,2,'2025-10-01','2025-10-01 10:48:38','2025-10-01 10:48:38'),(14,2,'2025-10-04','2025-10-04 18:35:11','2025-10-04 18:35:11'),(15,2,'2025-10-04','2025-10-04 18:39:55','2025-10-04 18:39:55'),(16,2,'2025-10-04','2025-10-04 18:40:31','2025-10-04 18:40:31'),(18,13,'2025-10-09','2025-10-09 18:03:14','2025-10-09 18:03:14'),(19,2,'2025-10-09','2025-10-09 18:05:09','2025-10-09 18:05:09'),(20,2,'2025-10-09','2025-10-09 19:42:34','2025-10-09 19:42:34'),(21,2,'2025-10-10','2025-10-10 10:53:46','2025-10-10 10:53:46'),(22,2,'2025-10-10','2025-10-10 10:54:33','2025-10-10 10:54:33'),(23,2,'2025-10-10','2025-10-10 10:58:20','2025-10-10 10:58:20'),(24,2,'2025-10-10','2025-10-10 10:59:35','2025-10-10 10:59:35'),(25,2,'2025-10-10','2025-10-10 11:01:33','2025-10-10 11:01:33'),(26,2,'2025-10-10','2025-10-10 11:28:13','2025-10-10 11:28:13'),(27,2,'2025-10-10','2025-10-10 14:22:57','2025-10-10 14:22:57'),(28,2,'2025-10-10','2025-10-10 14:27:00','2025-10-10 14:27:00'),(29,2,'2025-10-10','2025-10-10 14:42:16','2025-10-10 14:42:16'),(30,2,'2025-10-10','2025-10-10 14:49:31','2025-10-10 14:49:31'),(31,2,'2025-10-10','2025-10-10 14:52:06','2025-10-10 14:52:06'),(32,2,'2025-10-10','2025-10-10 15:22:24','2025-10-10 15:22:24'),(33,2,'2025-10-10','2025-10-10 15:52:43','2025-10-10 15:52:43');
/*!40000 ALTER TABLE `modele_historiques` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modeles`
--

DROP TABLE IF EXISTS `modeles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `modeles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_link` json DEFAULT NULL,
  `video_file` json DEFAULT NULL,
  `photos` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_ligne` tinyint(1) NOT NULL DEFAULT '0',
  `prive` int NOT NULL DEFAULT '0',
  `mode` tinyint NOT NULL DEFAULT '0',
  `type_flou` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prix_flou` decimal(8,2) DEFAULT NULL,
  `prix_flou_detail` double(8,2) DEFAULT NULL,
  `nombre_jetons_show_privee` int DEFAULT NULL,
  `duree_show_privee` int DEFAULT NULL,
  `jetons_surprise` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `en_live` tinyint(1) NOT NULL DEFAULT '0',
  `age` int DEFAULT NULL,
  `taille` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `silhouette` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `poitrine` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fesse` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `langue` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `services` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `modeles_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modeles`
--

LOCK TABLES `modeles` WRITE;
/*!40000 ALTER TABLE `modeles` DISABLE KEYS */;
INSERT INTO `modeles` VALUES (2,'Vany','Vaninyah','Salut toi 😘 Je suis Vaninyah, une coquine naturelle qui adore jouer en live. J’aime quand tu prends le contrôle… ou que tu me laisses le prendre. Viens t’amuser avec moi, je t’attends toute nue et toute excitée 💋',NULL,'[]','[\"photos/7ueMRKc0Wq4xz7gA8sGtKLsbu0OuQPKow7mZIfpb.jpg\", \"photos/Q1O5zKv1Q3npHk0Z0OLwwFBuxA4aQ39yTrkZaJqO.jpg\"]','2025-07-10 18:29:34','2025-10-10 15:52:43','vaninyah@hotmail.com','$2y$12$C8ht4/7CzgNqdHdjENzR4O46TltrxmtgHDpaBJAv5WwJZ.Wu2pShm',1,0,0,'strong',10.00,6.00,25,5,'242',1,32,'167',NULL,'Grosse','Grosse','FR',NULL),(4,'Nina','NinaLove','Toujours disponible',NULL,NULL,'\"[\\\"photos\\\\/UALNejZidE0PYU83rcJs3QEdxIWnpNEQPZtnNQT4.jpg\\\"]\"','2025-07-28 11:19:57','2025-08-03 11:46:29','tira1@hotmail.fr','$2y$12$LQkHKwhyKKjh0yaAJzAMFOTp5Hz3uz/1C0liq5PE8ap9KyLPl/k/C',1,0,0,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(13,'Test','test','deeded','[null]','[]','[\"photos/mQ8m09HROJmz5NYGMhJw7qpyTVWzGu8HzxSyoy9W.png\"]','2025-10-09 18:02:50','2025-10-09 18:03:27','rdauphinelys@gmail.com','$2y$12$sVUl5DY8VbNZax42btz.wui96tNNy6DzmXAEa2aSiF0eUnhPLqmci',0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,0,21,'123','test','test','sets','FR','tsete');
/*!40000 ALTER TABLE `modeles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
INSERT INTO `password_reset_tokens` VALUES ('cynthia20252025@outlook.fr','$2y$12$bdY2wvoOMn3hgws1LU34VuBpGx7HsxuzBoo2u4rEEn0nbfR5Scxeq','2025-08-20 13:21:59'),('mickaelferron123@hotmail.com','$2y$12$5jbTQeI4meremX6KWGDl2uIguKeiu/WeBjGGlh8JCweREOpgK1ptS','2025-09-24 11:03:42'),('test@test.com','$2y$12$RrhF5S60KJT262FR0PZU2elP10xNWI/.4sGxI0ZGBlKji9nH3zJjO','2025-10-09 18:01:29');
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
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
  `expires_at` timestamp NULL DEFAULT NULL,
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

--
-- Table structure for table `show_prives`
--

DROP TABLE IF EXISTS `show_prives`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `show_prives` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `modele_id` bigint unsigned NOT NULL,
  `date` date NOT NULL,
  `debut` time NOT NULL,
  `fin` time NOT NULL,
  `duree` int NOT NULL,
  `jetons_total` int NOT NULL,
  `etat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en_attente',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `is_live` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `show_prives_user_id_foreign` (`user_id`),
  KEY `show_prives_modele_id_foreign` (`modele_id`),
  CONSTRAINT `show_prives_modele_id_foreign` FOREIGN KEY (`modele_id`) REFERENCES `modeles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `show_prives_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `show_prives`
--

LOCK TABLES `show_prives` WRITE;
/*!40000 ALTER TABLE `show_prives` DISABLE KEYS */;
INSERT INTO `show_prives` VALUES (1,6,2,'2025-08-20','12:00:00','12:15:00',15,0,'Terminer','2025-08-19 21:31:01','2025-09-23 20:21:02',0,1),(2,6,2,'2025-08-24','13:59:00','14:05:00',6,160,'Terminer','2025-08-24 11:57:34','2025-09-23 20:21:02',0,1),(3,6,2,'2025-09-19','19:48:00','19:53:00',5,25,'Terminer','2025-09-19 18:46:24','2025-09-23 20:21:02',0,1),(4,6,2,'2025-09-21','19:45:00','17:50:02',5,25,'Terminer','2025-09-21 17:44:19','2025-09-23 20:21:02',0,1),(5,6,2,'2025-09-23','23:02:00','21:14:10',5,25,'Terminer','2025-09-23 21:01:37','2025-09-23 21:14:10',0,1),(6,6,2,'2025-09-23','23:02:00','23:07:00',5,25,'Terminer','2025-09-23 21:01:42','2025-09-23 23:07:01',0,1);
/*!40000 ALTER TABLE `show_prives` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_token_histories`
--

DROP TABLE IF EXISTS `user_token_histories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_token_histories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `previous_jetons` int NOT NULL DEFAULT '0',
  `new_jetons` int NOT NULL DEFAULT '0',
  `delta` int unsigned NOT NULL DEFAULT '0',
  `source` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_token_histories_user_id_index` (`user_id`),
  CONSTRAINT `user_token_histories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_token_histories`
--

LOCK TABLES `user_token_histories` WRITE;
/*!40000 ALTER TABLE `user_token_histories` DISABLE KEYS */;
INSERT INTO `user_token_histories` VALUES (1,3,225,1225,1000,'admin','2025-09-25 07:18:36','2025-09-25 07:18:36'),(2,6,1071,1171,100,'admin','2025-09-27 14:32:10','2025-09-27 14:32:10'),(3,1,0,1000,1000,'admin','2025-09-28 11:40:02','2025-09-28 11:40:02');
/*!40000 ALTER TABLE `user_token_histories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prenoms` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` int DEFAULT NULL,
  `pseudo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `departement` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `jetons` int NOT NULL DEFAULT '0',
  `banni` tinyint NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Dauphin Elys','Razafindrakoto',25,'Elys','Test','rdauphinelys@gmail.com','$2y$12$puYCTVFydk7MuGDqU7CJP.jqty6XwpWwGB5aOTOoxVBW6fsBayMGK','2025-06-29 19:48:10','2025-10-09 18:04:07',991,0),(2,'Char','David',34,'Didi','93','davidchar1@hotmail.fr','$2y$12$IucvWER22hNu3NhzkRVe3.18aMPK4roMeEeY1OVMv8hpg3eiq5OLy','2025-07-06 08:39:25','2025-07-06 08:39:25',0,0),(3,'Juju','Ju',25,'Jul','93','julieazer1@hotmail.fr','$2y$12$O15J2GOwPoU/OHSYevfc/e7ftsJK1e7Rg6fhHczQg8z19MJPxxb8i','2025-07-22 19:22:50','2025-10-05 18:44:08',1220,0),(5,NULL,NULL,NULL,'Pièces',NULL,'david1@hotmail.fr','$2y$12$z7lgP8JlYPW6XV4Ok3XBHe7Mvzmu3g7bnZFLNxnTAIXo4odRH2v4i','2025-07-28 02:38:38','2025-07-28 02:38:38',0,0),(6,NULL,NULL,NULL,'Gerarg',NULL,'gerardfoujanet123@hotmail.com','$2y$12$bwA2.qC4SgJu87uUwLTJ/eeHQl2ORePWuU1akeLoSUxb/Pek3lE5a','2025-07-28 08:23:49','2025-10-05 18:43:17',1009,0),(7,NULL,NULL,NULL,'maria2025',NULL,'maria2025@gmail.com','$2y$12$FnceN5J36g3UMmf6B6vfzOp1bYZU9O2dko2w.9lKvlCJKffUdwicu','2025-07-28 11:36:16','2025-07-28 11:36:16',0,0),(8,NULL,NULL,NULL,'Elys',NULL,'test@gmail.com','$2y$12$u7Uzp9/Nhl8IMpQEF4WnwOkXk4YZ8vE5zCfow28Q05ENiy8QX7Dt.','2025-07-31 19:27:29','2025-07-31 19:27:29',0,0),(9,NULL,NULL,NULL,'Elys',NULL,'rezervekoofficiel@gmail.com','$2y$12$ZHrdHI/rPcosS5WedviZxOW5e5QwUR1jkx0SXJ9ajShQOQQEnCfqG','2025-08-02 19:19:50','2025-08-02 19:19:50',0,0),(10,NULL,NULL,NULL,'Mickael',NULL,'mickaelferron123@hotmail.com','$2y$12$2dyefJrjApp11oErLRCFYO54EAs9U/a.tVwmxGviCZYp3RCdxxCnC','2025-08-10 06:42:53','2025-08-16 07:28:46',0,0),(11,NULL,NULL,NULL,'Elys',NULL,'livange24@gmail.com','$2y$12$xoTmTmZ5XiaBJACdSCPYieEtcFM69XrgKvKVtkYD7MQzsi4B9wlTe','2025-08-13 20:06:22','2025-08-13 20:06:22',0,0),(12,NULL,NULL,NULL,'Cynthe',NULL,'cynthia20252025@outlook.fr','$2y$12$vtGQh0ofIw0XJs39ZyR0ne2mjdgTNFloYxqxV9YVvFRwooIw/ZjlK','2025-08-20 12:10:00','2025-08-20 12:10:00',0,0);
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

-- Dump completed on 2025-10-11 18:49:45
