-- MariaDB dump 10.19  Distrib 10.4.28-MariaDB, for osx10.10 (x86_64)
--
-- Host: localhost    Database: acmi_db
-- ------------------------------------------------------
-- Server version	10.4.28-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `activity_logs`
--

DROP TABLE IF EXISTS `activity_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `activity_logs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `activity_type` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activity_logs`
--

LOCK TABLES `activity_logs` WRITE;
/*!40000 ALTER TABLE `activity_logs` DISABLE KEYS */;
INSERT INTO `activity_logs` VALUES (1,'faq','Super Admin updated a FAQ',1,'2026-05-23 13:00:54','2026-05-23 13:00:54'),(2,'post','Super Admin updated a post',1,'2026-05-24 02:07:32','2026-05-24 02:07:32'),(3,'post','Super Admin updated a post',1,'2026-05-24 02:09:11','2026-05-24 02:09:11'),(4,'post','Super Admin moved a post to trash',1,'2026-05-24 02:11:51','2026-05-24 02:11:51'),(5,'post','Super Admin moved a post to trash',1,'2026-05-24 02:12:12','2026-05-24 02:12:12'),(6,'faq','Super Admin updated a FAQ',1,'2026-05-24 02:15:50','2026-05-24 02:15:50'),(7,'faq','Super Admin created a FAQ',1,'2026-05-24 02:17:05','2026-05-24 02:17:05'),(8,'faq','Super Admin created a FAQ',1,'2026-05-24 02:17:41','2026-05-24 02:17:41'),(9,'product','Super Admin updated a product',1,'2026-05-24 02:23:48','2026-05-24 02:23:48'),(10,'product','Super Admin updated a product',1,'2026-05-24 02:25:49','2026-05-24 02:25:49'),(11,'product','Super Admin updated a product',1,'2026-05-24 02:28:33','2026-05-24 02:28:33'),(12,'product','Super Admin updated a product',1,'2026-05-24 02:31:21','2026-05-24 02:31:21'),(13,'product','Super Admin updated a product',1,'2026-05-24 02:36:02','2026-05-24 02:36:02'),(14,'product','Super Admin updated a product',1,'2026-05-24 02:36:13','2026-05-24 02:36:13'),(15,'media','Super Admin moved media to trash',1,'2026-05-24 02:36:55','2026-05-24 02:36:55'),(16,'media','Super Admin updated media',1,'2026-05-24 02:37:21','2026-05-24 02:37:21'),(17,'media_partner','Super Admin moved a media partner to trash',1,'2026-05-24 02:44:30','2026-05-24 02:44:30'),(18,'media_partner','Super Admin moved a media partner to trash',1,'2026-05-24 02:44:38','2026-05-24 02:44:38'),(19,'media_partner','Super Admin moved a media partner to trash',1,'2026-05-24 02:44:45','2026-05-24 02:44:45'),(20,'faq','Super Admin updated a FAQ',1,'2026-05-24 03:01:05','2026-05-24 03:01:05'),(21,'media_partner','Super Admin updated a media partner',1,'2026-05-24 03:01:59','2026-05-24 03:01:59'),(22,'media_partner','Super Admin updated a media partner',1,'2026-05-24 06:26:38','2026-05-24 06:26:38'),(23,'faq','Super Admin updated a FAQ',1,'2026-05-24 06:48:30','2026-05-24 06:48:30'),(24,'media_partner','Super Admin restored a media partner',1,'2026-06-15 13:13:43','2026-06-15 13:13:43'),(25,'media','Super Admin created a media category',1,'2026-06-15 13:20:10','2026-06-15 13:20:10'),(26,'media','Super Admin deleted a media category',1,'2026-06-15 13:20:23','2026-06-15 13:20:23'),(27,'media','Super Admin deleted a media category',1,'2026-06-15 13:21:09','2026-06-15 13:21:09'),(28,'post','Super Admin created a new post',1,'2026-06-15 13:30:57','2026-06-15 13:30:57'),(29,'product','Super Admin created a new product',1,'2026-06-16 12:44:30','2026-06-16 12:44:30'),(30,'product','Super Admin created a new product',1,'2026-06-16 12:48:07','2026-06-16 12:48:07'),(31,'product','Super Admin created a new product',1,'2026-06-17 02:17:26','2026-06-17 02:17:26'),(32,'post','Super Admin created a new post',1,'2026-06-17 08:09:46','2026-06-17 08:09:46'),(33,'post','Super Admin created a new post',1,'2026-06-17 08:45:37','2026-06-17 08:45:37'),(34,'post','Super Admin updated a post',1,'2026-06-17 12:01:00','2026-06-17 12:01:00'),(35,'post','Super Admin moved a post to trash',1,'2026-06-17 12:01:08','2026-06-17 12:01:08'),(36,'Update Member Sub Status','Updated member sub status: Toto Wolf',NULL,'2026-06-18 03:52:43','2026-06-18 03:52:43'),(37,'Update Member Sub Status','Updated member sub status: Toto Wolf',NULL,'2026-06-18 03:52:46','2026-06-18 03:52:46'),(38,'Update Member Sub Status','Updated member sub status: Toto Wolf',NULL,'2026-06-18 04:01:40','2026-06-18 04:01:40'),(39,'Update Member Sub Status','Updated member sub status: Toto Wolf',NULL,'2026-06-18 04:01:42','2026-06-18 04:01:42'),(40,'Update Member Sub Status','Updated member sub status: Balqis Faiha',NULL,'2026-06-18 04:21:18','2026-06-18 04:21:18'),(41,'Update Member Sub Status','Updated member sub status: Balqis Faiha',NULL,'2026-06-18 04:21:20','2026-06-18 04:21:20'),(42,'product','Super Admin updated a product',1,'2026-06-18 07:08:12','2026-06-18 07:08:12'),(43,'product','Super Admin created a new product',1,'2026-06-18 07:09:46','2026-06-18 07:09:46'),(44,'product','Super Admin moved a product to trash',1,'2026-06-18 07:16:12','2026-06-18 07:16:12'),(45,'post','Super Admin created a new post',1,'2026-06-27 06:28:42','2026-06-27 06:28:42'),(46,'post','Super Admin moved a post to trash',1,'2026-06-27 06:32:30','2026-06-27 06:32:30'),(47,'testimonial','Super Admin created a testimonial',1,'2026-06-27 06:34:18','2026-06-27 06:34:18'),(48,'product','Super Admin created a new product',1,'2026-06-27 06:35:18','2026-06-27 06:35:18'),(49,'media','Super Admin added new media',1,'2026-06-27 06:35:49','2026-06-27 06:35:49'),(50,'media_partner','Super Admin added a media partner',1,'2026-06-27 06:36:34','2026-06-27 06:36:34'),(51,'media','Super Admin updated media',1,'2026-07-09 07:52:36','2026-07-09 07:52:36'),(52,'media','Super Admin updated media',1,'2026-07-09 07:52:47','2026-07-09 07:52:47'),(53,'media','Super Admin updated media',1,'2026-07-09 07:52:54','2026-07-09 07:52:54'),(54,'media','Super Admin added new media',1,'2026-07-09 07:53:23','2026-07-09 07:53:23'),(55,'testimonial','Super Admin created a testimonial',1,'2026-07-09 09:39:56','2026-07-09 09:39:56'),(56,'testimonial','Super Admin created a testimonial',1,'2026-07-09 09:40:51','2026-07-09 09:40:51'),(57,'post','Super Admin created a new post',1,'2026-07-09 09:54:58','2026-07-09 09:54:58'),(58,'media_partner','Super Admin updated a media partner',1,'2026-07-09 22:18:48','2026-07-09 22:18:48'),(59,'media_partner','Super Admin updated a media partner',1,'2026-07-09 22:18:59','2026-07-09 22:18:59'),(60,'media_partner','Super Admin updated a media partner',1,'2026-07-09 22:19:07','2026-07-09 22:19:07'),(61,'media_partner','Super Admin updated a media partner',1,'2026-07-09 22:19:15','2026-07-09 22:19:15'),(62,'media_partner','Super Admin updated a media partner',1,'2026-07-09 22:19:21','2026-07-09 22:19:21'),(63,'media_partner','Super Admin updated a media partner',1,'2026-07-09 22:19:29','2026-07-09 22:19:29'),(64,'media_partner','Super Admin updated a media partner',1,'2026-07-09 22:19:34','2026-07-09 22:19:34'),(65,'media_partner','Super Admin updated a media partner',1,'2026-07-09 22:20:27','2026-07-09 22:20:27'),(66,'media_partner','Super Admin updated a media partner',1,'2026-07-09 22:21:02','2026-07-09 22:21:02'),(67,'media_partner','Super Admin updated a media partner',1,'2026-07-09 22:21:19','2026-07-09 22:21:19'),(68,'media_partner','Super Admin updated a media partner',1,'2026-07-09 22:21:53','2026-07-09 22:21:53'),(69,'product','Super Admin created a new product',1,'2026-07-09 22:26:54','2026-07-09 22:26:54'),(70,'product','Super Admin created a new product',1,'2026-07-09 22:30:14','2026-07-09 22:30:14'),(71,'product','Super Admin created a new product',1,'2026-07-10 04:34:35','2026-07-10 04:34:35'),(72,'product','Super Admin restored a product',1,'2026-07-10 04:34:53','2026-07-10 04:34:53'),(73,'product','Super Admin updated a product',1,'2026-07-10 04:35:01','2026-07-10 04:35:01'),(74,'product','Super Admin updated a product',1,'2026-07-10 04:35:27','2026-07-10 04:35:27'),(75,'media','Super Admin added new media',1,'2026-07-10 06:31:43','2026-07-10 06:31:43'),(76,'media','Super Admin updated media',1,'2026-07-10 06:31:55','2026-07-10 06:31:55'),(77,'media','Super Admin added new media',1,'2026-07-10 06:32:30','2026-07-10 06:32:30'),(78,'sponsored_banner','Super Admin added a sponsored banner',1,'2026-07-17 07:38:25','2026-07-17 07:38:25'),(79,'sponsored_banner','Super Admin updated a sponsored banner',1,'2026-07-17 07:39:00','2026-07-17 07:39:00'),(80,'sponsored_banner','Super Admin updated a sponsored banner',1,'2026-07-17 07:39:19','2026-07-17 07:39:19'),(81,'sponsored_banner','Super Admin updated a sponsored banner',1,'2026-07-17 07:39:24','2026-07-17 07:39:24'),(82,'sponsored_banner','Super Admin updated a sponsored banner',1,'2026-07-17 08:04:36','2026-07-17 08:04:36'),(83,'sponsored_banner','Super Admin added a sponsored banner',1,'2026-07-22 05:21:37','2026-07-22 05:21:37'),(84,'sponsored_banner','Super Admin added a sponsored banner',1,'2026-07-22 06:55:16','2026-07-22 06:55:16'),(85,'sponsored_banner','Super Admin updated a sponsored banner',1,'2026-07-22 08:14:57','2026-07-22 08:14:57'),(86,'header','Super Admin updated the header configuration',1,'2026-08-24 09:53:22','2026-08-24 09:53:22'),(87,'header','Super Admin updated the header configuration',1,'2026-08-24 09:54:17','2026-08-24 09:54:17'),(88,'header','Super Admin updated the header configuration',1,'2026-08-24 09:54:33','2026-08-24 09:54:33');
/*!40000 ALTER TABLE `activity_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` bigint(20) NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` bigint(20) NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Edukasi Bisnis','edukasi-bisnis','2026-05-04 20:25:17','2026-05-04 20:25:17',NULL),(2,'Artikel','artikel','2026-05-04 20:25:17','2026-07-15 16:21:17','2026-07-15 16:21:17'),(3,'Promo','promo','2026-05-04 20:25:17','2026-05-04 20:25:17',NULL),(4,'Networking','networking','2026-05-04 20:25:17','2026-05-04 20:25:17',NULL),(5,'Event','event','2026-05-04 20:25:17','2026-05-04 20:25:17',NULL),(6,'Pengumuman','pengumuman','2026-05-04 20:25:17','2026-05-04 20:25:17',NULL),(7,'Press Release','press-release','2026-05-04 20:25:17','2026-05-04 20:25:17',NULL),(9,'Tech Bussines','tech-bussines','2026-05-14 03:54:21','2026-05-14 03:54:29','2026-05-14 03:54:29'),(10,'Sport','sport','2026-06-17 08:08:34','2026-06-17 08:08:34',NULL);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category_post`
--

DROP TABLE IF EXISTS `category_post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category_post` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` bigint(20) unsigned NOT NULL,
  `category_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category_post_post_id_foreign` (`post_id`),
  KEY `category_post_category_id_foreign` (`category_id`),
  CONSTRAINT `category_post_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  CONSTRAINT `category_post_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category_post`
--

LOCK TABLES `category_post` WRITE;
/*!40000 ALTER TABLE `category_post` DISABLE KEYS */;
INSERT INTO `category_post` VALUES (1,1,1),(8,7,3),(9,7,1),(11,10,2),(12,10,7),(13,11,2),(14,11,5),(18,14,5),(19,15,5),(20,16,3),(21,14,2),(22,13,4),(23,13,5),(24,17,1),(25,17,3),(26,18,10),(27,19,1),(28,19,2),(29,20,2),(30,21,1),(31,21,5);
/*!40000 ALTER TABLE `category_post` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
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
-- Table structure for table `faqs`
--

DROP TABLE IF EXISTS `faqs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `faqs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `question` varchar(255) NOT NULL,
  `question_en` varchar(255) DEFAULT NULL,
  `question_id` varchar(255) DEFAULT NULL,
  `answer` text NOT NULL,
  `answer_en` text DEFAULT NULL,
  `answer_id` text DEFAULT NULL,
  `status` enum('draft','published','archived') DEFAULT 'published',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faqs`
--

LOCK TABLES `faqs` WRITE;
/*!40000 ALTER TABLE `faqs` DISABLE KEYS */;
INSERT INTO `faqs` VALUES (2,'Why us?',NULL,NULL,'because us',NULL,NULL,'draft','2026-05-14 03:56:42','2026-05-14 06:29:43','2026-05-14 06:29:43'),(3,'Is it the asnwer',NULL,NULL,'lorem reality club',NULL,NULL,'archived','2026-05-14 03:57:55','2026-05-14 06:29:52','2026-05-14 06:29:52'),(6,'Why you?',NULL,NULL,'because me ;p',NULL,NULL,'archived','2026-05-14 03:58:47','2026-05-14 06:29:46','2026-05-14 06:29:46'),(7,'Apa aja syarat gabung ACMI?',NULL,NULL,'- Aktif ikut kegiatan. Jangan cuma daftar, harus nongkrong juga ya!\r\n- Taat aturan. Setuju sama visi-misi ACMI.\r\n- Perusahaan udah jalan minimal 3 tahun. Kamu CEO beneran, bukan CEO abal-abal!',NULL,NULL,'published','2026-05-14 06:28:00','2026-05-24 02:15:50',NULL),(8,'Why choose ACMI',NULL,NULL,'because ACMI wonderful Amazing',NULL,NULL,'draft','2026-05-14 06:38:20','2026-05-14 06:38:20',NULL),(9,'Ada acara seru apa aja di ACMI?',NULL,NULL,'- Gerebek Kantor Teman: Jalan-jalan sambil belajar bisnis langsung di tempat.\r\n- Reboan: Sharing pengalaman dari para CEO.\r\n- Kopdar Wilayah: Ngopi bareng member di kotamu!\r\n- Meet the Investors: Siapa tahu ketemu investor yang cocok!.',NULL,NULL,'published','2026-05-14 06:39:09','2026-05-14 06:39:09',NULL),(10,'Kalau aku gabung, apa harus aktif?',NULL,NULL,'Wajib! ACMI itu komunitas yang hidup dari keterlibatan anggotanya. Jangan cuma daftar, jadilah bagian dari kegiatan kami. Biar makin akrab dan dapet manfaat maksimal!',NULL,NULL,'archived','2026-05-14 06:40:24','2026-05-14 06:40:24',NULL),(11,'ACMI bantu aku ngembangin bisnis gimana?',NULL,NULL,'- Mentoring. Belajar langsung dari mereka yang udah sukses!\r\n- Konsultasi. Dari hukum, pajak, marketing, sampai SDM, kita siap bantu.\r\n- Kegiatan. Ada networking, workshop, dan kunjungan bisnis. Gimana nggak tambah berkembang!.',NULL,NULL,'draft','2026-05-16 15:41:33','2026-05-23 13:00:54',NULL),(12,'Apa yang aku dapat kalau join?',NULL,NULL,'- Teman-teman CEO keren! Networking nggak ada matinya.\r\n- Ilmu mantap. Ada seminar, pelatihan, bahkan mentoring langsung dari expert!\r\n- Dukungan komunitas. Saling bantu, saling support, karena di ACMI nggak ada yang sendirian.\r\n- Akses spesial. Ke acara premium kayak Meet the Investors atau Weekend Business Seminar.',NULL,NULL,'published','2026-05-19 01:19:08','2026-05-19 01:19:08',NULL),(13,'Apa bedanya jadi Anggota Biasa sama Anggota Kehormatan?',NULL,NULL,'- Anggota Dengan Hak Suara: Bisa voting, milih, bahkan jadi pengurus! - Anggota Tanpa Hak Suara: Tetap bisa ikut seru-seruan kegiatan ACMI. - Anggota Kehormatan: Dikhususkan untuk mereka yang bikin ACMI makin keren!.',NULL,NULL,'archived','2026-05-19 01:19:31','2026-05-23 12:21:12',NULL),(14,'Gimana caranya jadi anggota ACMI?',NULL,NULL,'Mudah banget! Kamu cuma perlu:\r\n- Isi formulir pendaftaran. Gampang kok, tinggal klik!\r\n- Bayar biaya pendaftaran. Jangan khawatir, ini investasi masa depanmu!\r\n- Kirim dokumen. Kayak bukti usahamu yang kece itu.\r\nSetelah semua oke, tinggal tunggu verifikasi dari tim ACMI, dan tadaaa! Kamu resmi jadi bagian dari kita.',NULL,NULL,'draft','2026-05-24 02:17:05','2026-05-24 06:48:30',NULL),(15,'Apa aku harus bayar lagi setelah daftar?',NULL,NULL,'No, tidak ada iuran rutin buat dukung semua kegiatan seru ACMI. Jadi tenang, manfaatnya jauh lebih besar dari itu.',NULL,NULL,'draft','2026-05-24 02:17:41','2026-05-24 03:01:05',NULL);
/*!40000 ALTER TABLE `faqs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `headers`
--

DROP TABLE IF EXISTS `headers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `headers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title_1` varchar(255) DEFAULT NULL,
  `title_2` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`images`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `headers`
--

LOCK TABLES `headers` WRITE;
/*!40000 ALTER TABLE `headers` DISABLE KEYS */;
INSERT INTO `headers` VALUES (1,'Indonesia’s CEOs & Executives',NULL,NULL,'[\"headers\\/lJ9eSYRPhb8UntOxxIDGoiDlb1TwjbafV46FFihn.jpg\"]','2026-08-24 09:53:22','2026-08-24 09:54:33');
/*!40000 ALTER TABLE `headers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inbounds`
--

DROP TABLE IF EXISTS `inbounds`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inbounds` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `domicile` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `shirt_size` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `company_url` varchar(255) DEFAULT NULL,
  `company_address` text DEFAULT NULL,
  `business_detail` text DEFAULT NULL,
  `linkedin_url` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `tiktok` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `industry` varchar(255) DEFAULT NULL,
  `employee_size` varchar(255) DEFAULT NULL,
  `annual_revenue` varchar(255) DEFAULT NULL,
  `motivation_referral` text DEFAULT NULL,
  `ceo_mm_batch` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `approved_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inbounds`
--

LOCK TABLES `inbounds` WRITE;
/*!40000 ALTER TABLE `inbounds` DISABLE KEYS */;
INSERT INTO `inbounds` VALUES (1,'Nael Muna','naelmuna2009@gmail.com','082125483805',NULL,NULL,NULL,NULL,NULL,'PT Muna Jaya','PT Muna Jaya','CEO','https://www.linkedin.com/in/nael-muna-782275243/',NULL,NULL,NULL,NULL,NULL,NULL,'Teknologi',NULL,NULL,NULL,NULL,'lorem ipsum','2026-05-21 06:40:47','2026-06-16 06:59:37','review',NULL),(2,'Syakira','syakira@gmail.com','082125483805',NULL,NULL,NULL,NULL,NULL,'PT Azka Kira','PT Azka Kira','CEO','https://www.linkedin.com/in/nael-muna-782275243/',NULL,NULL,NULL,NULL,NULL,NULL,'Manufaktur',NULL,NULL,NULL,NULL,'lorem ipsum','2026-05-21 06:48:02','2026-05-22 02:33:43','review',NULL),(3,'Nisrina Asad','nisrinaasad@gmail.com','082125483805',NULL,NULL,NULL,NULL,NULL,'PT Satu Dua','PT Satu Dua','CEO','https://www.linkedin.com/in/nael-muna-782275243/',NULL,NULL,NULL,NULL,NULL,NULL,'F&B / Retail',NULL,NULL,NULL,NULL,'lorem ipsum','2026-05-21 06:49:49','2026-05-22 02:33:49','review',NULL),(4,'Yasmin Jinan','yasminji@gmail.com','082125483805',NULL,NULL,NULL,NULL,NULL,'PT Awal Satu','PT Awal Satu','CEO','https://www.linkedin.com/in/nael-muna-782275243/',NULL,NULL,NULL,NULL,NULL,NULL,'Energi',NULL,NULL,NULL,NULL,'dvruoiehv','2026-05-21 06:50:15','2026-05-22 03:17:43','rejected',NULL),(5,'Azka Nisrin','azkanisrina@gmail.com','082125483805',NULL,NULL,NULL,NULL,NULL,'PT Azka Rina','PT Azka Rina','CTO','https://www.linkedin.com/in/nael-muna-782275243/',NULL,NULL,NULL,NULL,NULL,NULL,'F&B / Retail',NULL,NULL,NULL,NULL,'lorem Ipsum','2026-05-21 13:47:46','2026-05-22 02:34:00','approved',NULL),(6,'Budi Utomo','budiutomo@gmail.com','082125483805',NULL,NULL,NULL,NULL,NULL,'PT Adidaya','PT Adidaya','CEO','https://acmi.hahabid.com/',NULL,NULL,'https://www.linkedin.com/in/nael-muna-782275243/',NULL,NULL,NULL,'Properti & Real Estate',NULL,'IDR 10 - 50 Miliar','Lorem ipsum dolor sit amet',NULL,'Lorem ipsum dolor sit amet','2026-05-22 13:15:44','2026-05-22 13:17:27','approved',NULL),(7,'Test','test@test.com','081234567890',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2026-05-23 04:13:34','2026-05-23 04:55:04','rejected',NULL),(8,'Test','test@test.com','08123456789',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2026-05-23 04:43:36','2026-05-23 04:54:59','rejected',NULL),(9,'Test Form','test@test.com','08123456789',NULL,NULL,NULL,NULL,NULL,'PT Test','PT Test',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2026-05-23 04:46:52','2026-05-23 04:54:55','rejected',NULL),(10,'Antonelli','antonelli@gmail.com','082125483805',NULL,NULL,NULL,NULL,NULL,'PT Satu Dua','PT Satu Dua','CEO','https://acmi.hahabid.com/',NULL,NULL,NULL,NULL,NULL,NULL,'Healthcare',NULL,NULL,'sdciuhcj ajcneuao',NULL,'sdciuhcj ajcneuao','2026-05-23 04:54:23','2026-05-23 04:55:11','approved',NULL),(11,'Nasyrah','nasyrahlatifa@gmail.com','082125483805',NULL,NULL,NULL,NULL,NULL,'PT Latifa','PT Latifa','CEO','https://acmi.hahabid.com/',NULL,NULL,NULL,NULL,NULL,NULL,'Media & Entertainment',NULL,NULL,'kjnciue aiudyevi',NULL,'kjnciue aiudyevi','2026-05-23 05:20:45','2026-05-23 05:20:45','review',NULL),(12,'Dhia Nufah','dhianu@gmail.com','082125483805',NULL,NULL,NULL,NULL,NULL,'PT Nufah','PT Nufah','CEO','https://acmi.hahabid.com/',NULL,NULL,NULL,NULL,NULL,NULL,'F&B','201-500 Karyawan',NULL,'cieulnue aoijeunna',NULL,'cieulnue aoijeunna','2026-05-23 05:45:17','2026-06-18 04:49:35','approved','2026-06-18 04:49:35'),(13,'Diva','hanadiva@gmail.com','082125483805',NULL,NULL,NULL,NULL,NULL,'PT Belok Kanan','PT Belok Kanan','CEO','https://acmi.hahabid.com/',NULL,NULL,NULL,NULL,NULL,NULL,'Properti & Real Estate','1000+ Karyawan',NULL,'dhbwclywec',NULL,'dhbwclywec','2026-05-23 05:46:23','2026-05-24 05:16:32','approved','2026-05-24 05:16:32'),(14,'HIlwa Ilham','hilwailham@gmail.com','082125483805',NULL,NULL,NULL,NULL,NULL,'PT Biru Terang','PT Biru Terang','CEO','https://acmi.hahabid.com/',NULL,NULL,'https://www.linkedin.com/in/nael-muna-782275243/',NULL,NULL,NULL,'F&B','51-200 Karyawan',NULL,'acjneiuio',NULL,'acjneiuio','2026-05-23 05:53:34','2026-05-24 05:16:32','approved','2026-05-24 05:16:32'),(15,'Emiliana','emil@gmail.com','082125483805',NULL,NULL,NULL,NULL,NULL,'PT Carlene Olivia','PT Carlene Olivia','CEO','https://acmi.hahabid.com/',NULL,NULL,'https://www.linkedin.com/in/nael-muna-782275243/',NULL,NULL,NULL,'Keuangan & Fintech','201-500 Karyawan',NULL,'scuin evuun acueioam',NULL,'scuin evuun acueioam','2026-05-23 05:57:41','2026-05-24 05:16:32','approved','2026-05-24 05:16:32'),(16,'Raisa Amanda','raisa@gmail.com','082125483805',NULL,NULL,NULL,NULL,NULL,'PT Coba Aja Dulu','PT Coba Aja Dulu','CEO','https://acmi.hahabid.com/',NULL,NULL,'https://www.linkedin.com/in/nael-muna-782275243/',NULL,NULL,NULL,'Teknologi & Software','501-1000 Karyawan',NULL,'acoelkm qec',NULL,'acoelkm qec','2026-05-23 06:02:14','2026-05-24 05:16:32','approved','2026-05-24 05:16:32'),(17,'George Russel','georgerussel@gmail.com','082125483805',NULL,NULL,NULL,NULL,NULL,'PT Russel','PT Russel','CEO','https://acmi.hahabid.com/',NULL,NULL,'https://www.linkedin.com/in/nael-muna-782275243/',NULL,NULL,NULL,'Energi & Resources','201-500 Karyawan',NULL,'adcjeijneiuhai',NULL,'adcjeijneiuhai','2026-05-23 06:03:52','2026-05-23 13:34:11','approved','2026-05-23 13:34:11'),(18,'Pelangi Pagi','pelangi@gmail.com','082125483805',NULL,NULL,NULL,NULL,NULL,'PT Pagi Sejahtera','PT Pagi Sejahtera','CEO','https://acmi.hahabid.com/',NULL,NULL,'https://www.linkedin.com/in/nael-muna-782275243/',NULL,NULL,NULL,'Teknologi & Software','201-500 Karyawan',NULL,'acooinaxnue',NULL,'acooinaxnue','2026-05-23 06:08:02','2026-05-23 13:02:58','approved','2026-05-23 13:02:58'),(19,'Kimi Anton','kimitoni@gmail.com','082125483805',NULL,NULL,NULL,NULL,NULL,'PT Antoni','PT Antoni','CTO','https://acmi.hahabid.com/',NULL,NULL,'https://www.linkedin.com/in/nael-muna-782275243/',NULL,NULL,NULL,'Media & Entertainment','201-500 Karyawan','IDR 50 - 200 Miliar','yap',NULL,'yap','2026-05-23 06:12:27','2026-05-23 12:23:15','approved','2026-05-23 12:23:15'),(20,'Azwa Khalisa','azwakhalisa@gmail.com','082125483805',NULL,NULL,NULL,NULL,NULL,'PT Khalisa','PT Khalisa','CTO','https://acmi.hahabid.com/',NULL,NULL,'https://www.linkedin.com/in/nael-muna-782275243/',NULL,NULL,NULL,'Properti & Real Estate','1-50 Karyawan','< IDR 10 Miliar','semoga berhasil',NULL,'semoga berhasil','2026-05-23 07:24:16','2026-05-23 08:22:27','approved','2026-05-23 08:22:27'),(21,'Balqis Faiha','balqis@gmail.com','082125483805',NULL,NULL,NULL,NULL,NULL,'PT Garasi Salwa','PT Garasi Salwa','CEO','https://acmi.hahabid.com/',NULL,NULL,'https://www.linkedin.com/in/nael-muna-782275243/',NULL,NULL,NULL,'Retail & E-commerce','201-500 Karyawan','IDR 10 - 50 Miliar','lorem ipsum dolor sit amet',NULL,'lorem ipsum dolor sit amet','2026-05-24 05:09:33','2026-06-18 04:19:52','approved','2026-06-18 04:19:52'),(22,'Isack Hadjar','hadjar@gmail.com','082125483805',NULL,NULL,NULL,NULL,NULL,'PT Isack','PT Isack','CTO','https://acmi.hahabid.com/',NULL,NULL,'https://www.linkedin.com/in/nael-muna-782275243/',NULL,NULL,NULL,'Manufaktur','201-500 Karyawan','IDR 10 - 50 Miliar','lorem ipsum dolor sit',NULL,'lorem ipsum dolor sit','2026-05-24 05:10:12','2026-05-24 05:10:12','review',NULL),(23,'Lando Norris','landonorris@gmail.com','082125483805',NULL,NULL,NULL,NULL,NULL,'PT Tracher','PT Tracher','CEO','https://acmi.hahabid.com/',NULL,NULL,'https://www.linkedin.com/in/nael-muna-782275243/',NULL,NULL,NULL,'Energi & Resources','501-1000 Karyawan','IDR 50 - 200 Miliar','lorem ipsum dolor sit amet',NULL,'lorem ipsum dolor sit amet','2026-05-24 05:18:32','2026-05-24 05:18:32','review',NULL),(24,'Toto Wolf','toto@gmail.com','082125483805',NULL,NULL,NULL,NULL,NULL,'PT Wolfto','PT Wolfto','CEO','https://acmi.hahabid.com/',NULL,NULL,'https://www.linkedin.com/in/nael-muna-782275243/',NULL,NULL,NULL,'Media & Entertainment','51-200 Karyawan','IDR 50 - 200 Miliar','Lorem ipsum dolorna sit amet',NULL,'Lorem ipsum dolorna sit amet','2026-05-24 05:21:01','2026-06-18 01:49:22','approved','2026-06-18 01:49:22'),(25,'Nael Muna','naelmuna2009@gmail.com','082125483805',NULL,NULL,NULL,NULL,NULL,'PT Muna Jaya','PT Muna Jaya','CEO','https://acmi.hahabid.com/',NULL,NULL,'https://www.linkedin.com/in/nael-muna-782275243/',NULL,NULL,NULL,'Keuangan & Fintech','51-200 Karyawan','IDR 10 - 50 Miliar','Lorem ipsum dolor',NULL,'Lorem ipsum dolor','2026-05-24 06:53:01','2026-06-15 13:41:15','approved','2026-06-15 13:41:15'),(26,'Emiliana','emil@gmail.com','082125483805',NULL,NULL,NULL,NULL,NULL,'PT Olivia','PT Olivia','CEO','https://acmi.hahabid.com/',NULL,NULL,'https://www.linkedin.com/in/nael-muna-782275243/',NULL,NULL,NULL,'F&B','51-200 Karyawan','> IDR 1 Triliun','Lorem ipsum odlor acjkneu',NULL,'Lorem ipsum odlor acjkneu','2026-06-16 06:06:33','2026-06-18 01:48:54','approved','2026-06-18 01:48:54'),(27,'Tanzani Akasyah','tanzanini@gmail.com','082125483805',NULL,NULL,NULL,NULL,NULL,'PT Akasyah','PT Akasyah','CEO','https://acmi.hahabid.com/',NULL,NULL,'https://www.linkedin.com/in/nael-muna-782275243/',NULL,NULL,NULL,'Properti & Real Estate','201-500 Karyawan','> IDR 1 Triliun','masuk surga',NULL,'masuk surga','2026-06-16 06:08:39','2026-06-16 07:01:22','approved','2026-06-16 07:01:22'),(28,'Athiyah','athiyah@gmail.com','082125483805',NULL,NULL,NULL,NULL,NULL,'Alba Corp','Alba Corp','CTO','https://acmi.hahabid.com/',NULL,NULL,'https://www.linkedin.com/in/nael-muna-782275243/',NULL,NULL,NULL,'Media & Entertainment','501-1000 Karyawan','IDR 200 Miliar - 1 Triliun','indonesia maju',NULL,'indonesia maju','2026-06-16 06:09:57','2026-06-16 06:57:30','rejected',NULL),(29,'Test User','test@example.com','08123456789',NULL,NULL,NULL,NULL,NULL,'Test Corp','Test Corp','CEO',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Testing API Connection',NULL,'Testing API Connection','2026-08-24 09:28:18','2026-08-24 09:28:18','review',NULL),(30,'Test User','test@example.com','08123456789',NULL,NULL,NULL,NULL,NULL,'Test Corp','Test Corp','CEO',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Testing API Connection',NULL,'Testing API Connection','2026-08-24 09:28:21','2026-08-24 09:28:21','review',NULL),(31,'Test User','test@example.com','08123456789',NULL,NULL,NULL,NULL,NULL,'Test Corp','Test Corp','CEO',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Testing API Connection',NULL,'Testing API Connection','2026-08-24 09:28:21','2026-08-24 09:28:21','review',NULL),(32,'Test User','test@example.com','08123456789',NULL,NULL,NULL,NULL,NULL,'Test Corp','Test Corp','CEO',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Testing API Connection',NULL,'Testing API Connection','2026-08-24 09:30:17','2026-08-24 09:30:17','review',NULL);
/*!40000 ALTER TABLE `inbounds` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `instagram_posts`
--

DROP TABLE IF EXISTS `instagram_posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `instagram_posts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `apify_id` varchar(255) DEFAULT NULL,
  `caption` text DEFAULT NULL,
  `post_url` varchar(255) DEFAULT NULL,
  `apify_image_url` text DEFAULT NULL,
  `local_image_path` varchar(255) DEFAULT NULL,
  `posted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `instagram_posts`
--

LOCK TABLES `instagram_posts` WRITE;
/*!40000 ALTER TABLE `instagram_posts` DISABLE KEYS */;
INSERT INTO `instagram_posts` VALUES (1,'3893619375824113672','Classic Vintage @ HUT @acmi_official \nBersama guest star @spartacomp_ \n\n#acmi #hutacmi #ceo','https://www.instagram.com/p/DYI6jFqkxAI/','https://scontent-xxc1-1.cdninstagram.com/v/t51.82787-15/688639480_18423671188121500_3636017915091236426_n.jpg?stp=dst-jpg_e35_p1080x1080_sh2.08_tt6&_nc_ht=scontent-xxc1-1.cdninstagram.com&_nc_cat=104&_nc_oc=Q6cZ2gH8u0RnrLUZ_NRYUSDd3f438elJe8fIiJXqjtqLH7u0li3xSkItB9I9eSt0qI2bubo&_nc_ohc=fnXgOEXaYZQQ7kNvwF5bc9x&_nc_gid=H_T_E_G4uqLm7X5GLOhLEQ&edm=APs17CUBAAAA&ccb=7-5&oh=00_Af7H47sk0a_Fl9O2XLX5ambVL6gI6lqoewB1LW-cliQYQg&oe=6A0B03A3&_nc_sid=10d13b',NULL,'2026-05-10 01:17:19','2026-05-20 06:44:52','2026-05-20 06:44:52'),(2,'3894562797905030400','sefruit tips sukses yang belum terbongkar!\n@dearly_dave @oncyungu \n\n#bisnis #entrepreneur #lifehack #tipsbisnis #strategibisnis','https://www.instagram.com/p/DYMRDr8lK0A/','https://scontent-hou1-1.cdninstagram.com/v/t51.82787-15/689287335_18579966250019396_8292151915711832688_n.jpg?stp=dst-jpg_e15_tt6&_nc_ht=scontent-hou1-1.cdninstagram.com&_nc_cat=108&_nc_oc=Q6cZ2gGTYsvcWNck_oOgAYvaK8Y0yr9BWCxKLeZFDjzjZ40I5a60mMOhEScb1AH0rYovIb4&_nc_ohc=mW4g7PT7wy8Q7kNvwFd1y3p&_nc_gid=qWUJvd-lc8a5DNZGJ6WlUQ&edm=APs17CUBAAAA&ccb=7-5&oh=00_Af4Z7HLExSVTpn89HjzfKwqsPylpi_UzaUWuBvesdRK82A&oe=6A0B189C&_nc_sid=10d13b',NULL,'2026-05-11 08:28:29','2026-05-20 06:45:06','2026-05-20 06:45:06'),(3,'3896068449218813084','Selamat Dan Sukses \nAtas Terselenggaranya HUT ACMI 5 di kota Bandung \nPada 8-10 Mei 2026\n\n“Ngariung Dina Rasa, Ngahiji Dina Laku”\n\nSemoga ACMI semakin solid, kompak & juara 🔥','https://www.instagram.com/p/DYRnZzAS1yc/','https://scontent-iad3-1.cdninstagram.com/v/t51.71878-15/698799533_26810546491900822_2741084534358741961_n.jpg?stp=dst-jpg_e15_tt6&_nc_ht=scontent-iad3-1.cdninstagram.com&_nc_cat=110&_nc_oc=Q6cZ2gGCxR08RYUW4Wf-PdblWaqUFj9eaftBxOh349NNTqnQDVMJhydAp7mNKTGK_9s8DUk&_nc_ohc=lYHg0d1agA0Q7kNvwGQaw8J&_nc_gid=5LlT9jEjqYQ9IviLyXghSQ&edm=APs17CUBAAAA&ccb=7-5&oh=00_Af5JNlG6cGTSiWndwe_RMd-nsq3nZsMvfwmVuQpq0kWqVA&oe=6A0B19A0&_nc_sid=10d13b',NULL,'2026-05-13 10:47:19','2026-05-20 06:45:07','2026-05-20 06:45:07'),(4,'3896069966391051306','5 tahun perjalanan, kolaborasi, dan cerita yang terus bertumbuh. \n\nTerima kasih telah menjadi bagian dari perjalanan luar biasa ini.\nSee you on the next milestone ✨\n\n#ACMI5thAnniversary #acmi','https://www.instagram.com/p/DYRnv3-zoQq/','https://scontent-lga3-2.cdninstagram.com/v/t51.82787-15/698737684_18083482895572508_7141798604608200426_n.jpg?stp=dst-jpg_e35_p1080x1080_sh2.08_tt6&_nc_ht=scontent-lga3-2.cdninstagram.com&_nc_cat=108&_nc_oc=Q6cZ2gHN3ny6gelL5mXb1TTSXreHB6BDqmsxvq5iVo22X6goPSo6a_sI23pvCR5ljDsg9T0&_nc_ohc=ORDGf9amFWkQ7kNvwEBKLAC&_nc_gid=Kg_6XRjfBpmG2NjOGK7r0g&edm=APs17CUBAAAA&ccb=7-5&oh=00_Af7HQxi2TdyO6vJwRHnSbK7CEiHwhzdrSUFWf7vKsStWgA&oe=6A0B0DB3&_nc_sid=10d13b',NULL,'2026-05-13 10:23:44','2026-05-20 06:45:10','2026-05-20 06:45:10'),(5,'3894525162793470058','ACMI 5th ANNIVERSARY\n\nTeman bantu teman! ❤️\n\nDengan bertambahnya usia @acmi_official semoga semakin menjadi ‘Rumah’ yang nyaman bagi para Mastermind yang ada di Indonesia. Karena ACMI bukan hanya sekedar asosiasi, ACMI adalah Family.','https://www.instagram.com/p/DYMIgBhIAhq/','https://scontent-sjc6-1.cdninstagram.com/v/t51.71878-15/692474151_1650760469502812_6957464943075231559_n.jpg?stp=dst-jpg_e15_tt6&_nc_ht=scontent-sjc6-1.cdninstagram.com&_nc_cat=108&_nc_oc=Q6cZ2gGEnX8zFHZWrTiyGgki_jnhIl98bQ_pYKhNFVvIgYT3ukANUxI8O-T57sRLVug5Gww&_nc_ohc=ESJxxSX5DW0Q7kNvwFao77k&_nc_gid=xYuKri45SiN64bljpQ9Qtw&edm=APs17CUBAAAA&ccb=7-5&oh=00_Af4XoR_Ik1FbjtL8vEBl6Ejk32jjWjRjt7Tj_frDJIw9Cw&oe=6A0B1720&_nc_sid=10d13b',NULL,'2026-05-11 07:22:39','2026-05-20 06:45:11','2026-05-20 06:45:11'),(6,'3892597901807050982','GALA DINNER \n\nACMI 5th ANNIVERSARY\nat @homer_coffee ❤️\n\nBandung, 8 - 10 Mei 2026\n\n@acmi_official \n@acmi_official','https://www.instagram.com/p/DYFSSr2o-Dm/','https://scontent-phx1-1.cdninstagram.com/v/t51.71878-15/672423348_1278187931116960_4882638625558413801_n.jpg?stp=dst-jpg_e15_tt6&_nc_ht=scontent-phx1-1.cdninstagram.com&_nc_cat=104&_nc_oc=Q6cZ2gElAqnm04Y6cxVojYNyXMdWQjfNqAD0YccmihvqA-AYvuEscAec1vmQcwA-NysR1mg&_nc_ohc=7caxsjgYAhoQ7kNvwGsGQ_8&_nc_gid=iBUGplQN4d7lnc5bUPe59w&edm=APs17CUBAAAA&ccb=7-5&oh=00_Af6aK7h5DNQ7oLKYLD8y1m7ksoiopGdvsuHHlqRQ8K0ofw&oe=6A0B0E84&_nc_sid=10d13b',NULL,'2026-05-08 15:32:07','2026-05-20 06:45:12','2026-05-20 06:45:12');
/*!40000 ALTER TABLE `instagram_posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `media_categories`
--

DROP TABLE IF EXISTS `media_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `media_categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT 0,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `media_categories_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `media_categories`
--

LOCK TABLES `media_categories` WRITE;
/*!40000 ALTER TABLE `media_categories` DISABLE KEYS */;
INSERT INTO `media_categories` VALUES (1,'Summit',1,'summit','2026-05-04 20:25:17','2026-06-15 13:21:09','2026-06-15 13:21:09'),(2,'Roundtable',1,'roundtable','2026-05-04 20:25:17','2026-05-04 20:25:17',NULL),(3,'Masterclass',1,'masterclass','2026-05-04 20:25:17','2026-05-04 20:25:17',NULL),(4,'Mission',1,'mission','2026-05-04 20:25:17','2026-05-04 20:25:17',NULL),(5,'Networking',1,'networking','2026-05-04 20:25:17','2026-05-04 20:25:17',NULL),(6,'Gala',1,'gala','2026-05-04 20:25:17','2026-05-15 06:53:56','2026-05-15 06:53:56'),(7,'Apa',0,'apa','2026-05-04 20:59:03','2026-05-15 06:53:43','2026-05-15 06:53:43'),(8,'Cooking',0,'cooking','2026-05-08 06:22:09','2026-05-15 06:54:00','2026-05-15 06:54:00'),(9,'Tech',0,'tech','2026-06-15 13:20:10','2026-06-15 13:20:23','2026-06-15 13:20:23');
/*!40000 ALTER TABLE `media_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `media_items`
--

DROP TABLE IF EXISTS `media_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `media_items` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `status` enum('published','draft','archived') NOT NULL DEFAULT 'published',
  `media_category_id` bigint(20) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `media_items_media_category_id_foreign` (`media_category_id`),
  CONSTRAINT `media_items_media_category_id_foreign` FOREIGN KEY (`media_category_id`) REFERENCES `media_categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `media_items`
--

LOCK TABLES `media_items` WRITE;
/*!40000 ALTER TABLE `media_items` DISABLE KEYS */;
INSERT INTO `media_items` VALUES (1,'published',4,'ACMI GREBEK','media/xNixAISgIDFVI761rEUx2KGXi8l6NtN7gzuRj8AZ.png','2026-05-06 18:52:35','2026-07-09 07:52:47',NULL),(2,'published',2,'Ketua MPR ACMI','media/pj6UV8v4Jemye1K6bG19BHrnyeIsXkNSVcX7Jk4D.jpg','2026-05-08 06:18:43','2026-05-24 02:37:21',NULL),(4,'published',1,'Summit ACMI 2024','media/AMmnk56aP0gP3BLAfsK7SGLDnV1uwqN9NqYpEUIY.jpg','2026-05-19 01:30:07','2026-05-24 02:36:55','2026-05-24 02:36:55'),(5,'published',4,'ACMI Sport','media/dM5CszAUVsPntw9fCqwkkypPPK0l7JIV4lXFWUf6.jpg','2026-05-19 01:33:24','2026-05-19 01:34:48',NULL),(6,'published',3,'Reuni Acmi 2024','media/YNUO13xA9iHowygRC9hRhiOlcS0QY9cvogXiDiH2.jpg','2026-05-19 01:36:59','2026-05-19 01:36:59',NULL),(7,'published',2,'Summit Acmi 2024','media/Kqf40lkJk9IG2AT5AvwLE8tID3RDoLTHfvZMV6qG.jpg','2026-05-19 01:37:20','2026-07-09 07:52:54',NULL),(8,'published',5,'ACMI Bersama','media/cNaIftWN8KlftndIutocd4A851G8Ulyv5z6hiG1r.jpg','2026-06-27 06:35:49','2026-07-09 07:52:36',NULL),(9,'published',5,'ACMI Rewarding','media/V1YGXCvZwzaCUjiq1Hh7TJZe1kCJ76VeHTvYF2HI.jpg','2026-07-09 07:53:23','2026-07-09 07:53:23',NULL),(10,'published',2,'ACMI Peduli','media/7SNVhbscwQMKO6VQ3FG4Jyoa325ZmqqaRM7YCMOL.jpg','2026-07-10 06:31:43','2026-07-10 06:31:55',NULL),(11,'published',3,'ACMI Talk','media/FVBxjqNbL1EYs9jEelQFYlUZrLpHW0eWEoHYduCT.jpg','2026-07-10 06:32:30','2026-07-10 06:32:30',NULL);
/*!40000 ALTER TABLE `media_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `media_partners`
--

DROP TABLE IF EXISTS `media_partners`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `media_partners` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `status` enum('published','draft','archived') NOT NULL DEFAULT 'published',
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `media_partners`
--

LOCK TABLES `media_partners` WRITE;
/*!40000 ALTER TABLE `media_partners` DISABLE KEYS */;
INSERT INTO `media_partners` VALUES (2,'published','F1','media-partners/xpyYHoUPYkFjQSUC6HBBUtfMjeJDvgov30V1PENS.jpg','https://www.bca.co.id/','2026-05-14','2026-05-18','2026-05-14 04:05:50','2026-05-19 01:40:33','2026-05-19 01:40:33'),(3,'archived','AWS','media-partners/kWH1q6gIbS6yqj2qTovH1NuxxTHEUjB5Sv73NueJ.png','https://www.bca.co.id/','2026-05-18','2026-05-25','2026-05-14 04:06:29','2026-05-14 04:09:27',NULL),(4,'published','Louis Vuitton','media-partners/FVRImaiANzcQ2pGYQrD48NIqNOAArRWRZrmtW8PQ.png','https://www.bca.co.id/','2026-05-21','2026-05-28','2026-05-14 04:09:11','2026-05-19 01:40:54','2026-05-19 01:40:54'),(5,'published','ISCA','media-partners/ioks2DwgM3dup5gcZt7so6GrB4tOkwfWzmqYznLJ.png','https://www.bca.co.id/','2026-05-17','2026-05-25','2026-05-18 13:36:01','2026-05-24 02:44:30','2026-05-24 02:44:30'),(6,'published','AWS','media-partners/S8OkhW6tUX3GpOI9SFr7SeymC7QFYk3DnoB0e2am.png','https://www.bca.co.id/','2026-05-10','2027-01-07','2026-05-18 13:37:43','2026-07-09 22:19:34',NULL),(7,'published','Astra','media-partners/QJr9CFJdUfS4fWtr1WfvXqTr4fnOAf2V6XL6TycM.png','https://www.astra.co.id/','2026-05-18','2027-01-07','2026-05-19 01:41:23','2026-07-09 22:19:29',NULL),(8,'published','Telkom','media-partners/51LOXVT0RJr3eFnWJkiXdEgJbSHxdFDXs5vPO6dc.png','https://www.telkom.co.id/','2026-05-18','2027-01-07','2026-05-19 01:41:45','2026-07-09 22:19:15',NULL),(9,'published','Indofood','media-partners/mef9uMrLE2vxbbsHc8MvuhbSVRNJznOpAgMbjzk6.png','https://www.indofood.com/','2026-05-20','2026-07-02','2026-05-19 01:45:13','2026-07-09 22:21:53',NULL),(10,'published','BCA','media-partners/7XDL40dsGnGBc0a7URzEjhoLsov4OEsZjBx9I8sM.png','https://www.bca.co.id/','2026-05-19','2026-07-30','2026-05-19 01:48:04','2026-07-09 22:21:02',NULL),(11,'published','Sinarmas','media-partners/wHxNFcKXdTwcAuJBqakdRZzG1xs6QayizXLGxbIM.png','http://www.sinarmas.com/images/gallery/','2026-05-21','2027-01-07','2026-05-19 01:48:50','2026-07-09 22:19:07',NULL),(12,'published','Paragon Corp','media-partners/PvN1TX9Z8ACTFiDmuT8eeT9cUy6p9tLJ6NjV92q6.png','https://www.paragon-innovation.com/','2026-05-26','2026-05-28','2026-05-19 01:51:44','2026-05-24 02:44:38','2026-05-24 02:44:38'),(13,'published','Goto Indonesia','media-partners/oscCh5VWj0WUbb9Uh7iCl5fiX1biTTzEpEzQavio.png','https://www.gotocompany.com/','2026-05-19','2027-01-07','2026-05-19 01:52:21','2026-07-09 22:18:59',NULL),(14,'published','NafasBumi','media-partners/OYsruIkWOMOAYCWCYH1qI947KlwJrbTR7bNwM8Ou.jpg','https://www.astra.co.id/','2026-06-26','2026-07-02','2026-06-27 06:36:34','2026-07-09 22:21:19',NULL);
/*!40000 ALTER TABLE `media_partners` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `member_requests`
--

DROP TABLE IF EXISTS `member_requests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `member_requests` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `status` enum('review','approved','rejected') NOT NULL DEFAULT 'review',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `industry` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `company_url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `member_requests`
--

LOCK TABLES `member_requests` WRITE;
/*!40000 ALTER TABLE `member_requests` DISABLE KEYS */;
/*!40000 ALTER TABLE `member_requests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `members`
--

DROP TABLE IF EXISTS `members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `members` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `industry` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `company_url` varchar(255) DEFAULT NULL,
  `linkedin_url` varchar(255) DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'active',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `employee_size` varchar(255) DEFAULT NULL,
  `annual_revenue` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `sub_status` varchar(255) NOT NULL DEFAULT 'active',
  PRIMARY KEY (`id`),
  UNIQUE KEY `members_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `members`
--

LOCK TABLES `members` WRITE;
/*!40000 ALTER TABLE `members` DISABLE KEYS */;
INSERT INTO `members` VALUES (1,'Member Ke-1','member1@example.com','081234567801','PT Sukses Jaya 1','Energi','Manager','https://www.suksesjaya1.com',NULL,'published',NULL,'2026-05-21 13:42:34','2026-05-21 13:42:34',NULL,NULL,NULL,'active'),(2,'Member Ke-2','member2@example.com','081234567802','PT Sukses Jaya 2','Manufaktur','Manager','https://www.suksesjaya2.com',NULL,'published',NULL,'2026-05-21 13:42:34','2026-05-21 13:42:34',NULL,NULL,NULL,'active'),(3,'Member Ke-3','member3@example.com','081234567803','PT Sukses Jaya 3','Energi','Manager','https://www.suksesjaya3.com',NULL,'published',NULL,'2026-05-21 13:42:34','2026-05-21 13:42:34',NULL,NULL,NULL,'active'),(4,'Member Ke-4','member4@example.com','081234567804','PT Sukses Jaya 4','FnB','Manager','https://www.suksesjaya4.com',NULL,'published',NULL,'2026-05-21 13:42:34','2026-05-21 13:42:34',NULL,NULL,NULL,'active'),(5,'Member Ke-5','member5@example.com','081234567805','PT Sukses Jaya 5','Manufaktur','Manager','https://www.suksesjaya5.com',NULL,'published',NULL,'2026-05-21 13:42:34','2026-05-21 13:42:34',NULL,NULL,NULL,'active'),(6,'Member Ke-6','member6@example.com','081234567806','PT Sukses Jaya 6','Energi','Manager','https://www.suksesjaya6.com',NULL,'published',NULL,'2026-05-21 13:42:34','2026-05-21 13:42:34',NULL,NULL,NULL,'active'),(7,'Member Ke-7','member7@example.com','081234567807','PT Sukses Jaya 7','Properti','Manager','https://www.suksesjaya7.com',NULL,'published',NULL,'2026-05-21 13:42:34','2026-05-21 13:42:34',NULL,NULL,NULL,'active'),(8,'Member Ke-8','member8@example.com','081234567808','PT Sukses Jaya 8','Fintech','Manager','https://www.suksesjaya8.com',NULL,'published',NULL,'2026-05-21 13:42:34','2026-05-21 13:42:34',NULL,NULL,NULL,'active'),(9,'Member Ke-9','member9@example.com','081234567809','PT Sukses Jaya 9','Software','Manager','https://www.suksesjaya9.com',NULL,'published',NULL,'2026-05-21 13:42:34','2026-05-21 13:42:34',NULL,NULL,NULL,'active'),(10,'Member Ke-10','member10@example.com','081234567810','PT Sukses Jaya 10','Software','Manager','https://www.suksesjaya10.com',NULL,'published',NULL,'2026-05-21 13:42:34','2026-05-21 13:42:34',NULL,NULL,NULL,'active'),(11,'Member Ke-11','member11@example.com','081234567811','PT Sukses Jaya 11','Manufaktur','Manager','https://www.suksesjaya11.com',NULL,'published',NULL,'2026-05-21 13:42:34','2026-05-21 13:42:34',NULL,NULL,NULL,'active'),(12,'Member Ke-12','member12@example.com','081234567812','PT Sukses Jaya 12','Properti','Manager','https://www.suksesjaya12.com',NULL,'published',NULL,'2026-05-21 13:42:34','2026-05-21 13:42:34',NULL,NULL,NULL,'active'),(13,'Member Ke-13','member13@example.com','081234567813','PT Sukses Jaya 13','Software','Manager','https://www.suksesjaya13.com',NULL,'published',NULL,'2026-05-21 13:42:34','2026-05-21 13:42:34',NULL,NULL,NULL,'active'),(14,'Member Ke-14','member14@example.com','081234567814','PT Sukses Jaya 14','Software','Manager','https://www.suksesjaya14.com',NULL,'published',NULL,'2026-05-21 13:42:34','2026-05-21 13:42:34',NULL,NULL,NULL,'active'),(15,'Member Ke-15','member15@example.com','081234567815','PT Sukses Jaya 15','FnB','Manager','https://www.suksesjaya15.com',NULL,'published',NULL,'2026-05-21 13:42:34','2026-05-21 13:42:34',NULL,NULL,NULL,'active'),(16,'Member Ke-16','member16@example.com','081234567816','PT Sukses Jaya 16','Properti','Manager','https://www.suksesjaya16.com',NULL,'published',NULL,'2026-05-21 13:42:34','2026-05-21 13:42:34',NULL,NULL,NULL,'active'),(17,'Member Ke-17','member17@example.com','081234567817','PT Sukses Jaya 17','FnB','Manager','https://www.suksesjaya17.com',NULL,'published',NULL,'2026-05-21 13:42:34','2026-05-21 13:42:34',NULL,NULL,NULL,'active'),(18,'Member Ke-18','member18@example.com','081234567818','PT Sukses Jaya 18','Fintech','Manager','https://www.suksesjaya18.com',NULL,'published',NULL,'2026-05-21 13:42:34','2026-05-21 13:42:34',NULL,NULL,NULL,'active'),(19,'Member Ke-19','member19@example.com','081234567819','PT Sukses Jaya 19','FnB','Manager','https://www.suksesjaya19.com',NULL,'published',NULL,'2026-05-21 13:42:34','2026-05-21 13:42:34',NULL,NULL,NULL,'active'),(20,'Member Ke-20','member20@example.com','081234567820','PT Sukses Jaya 20','Software','Manager','https://www.suksesjaya20.com',NULL,'published',NULL,'2026-05-21 13:42:34','2026-05-21 13:42:34',NULL,NULL,NULL,'active'),(21,'Nael Muna','naelmuna2009@gmail.com','082125483805','PT Muna Jaya','Teknologi','CEO','https://www.linkedin.com/in/nael-muna-782275243/',NULL,'published',NULL,'2026-05-22 02:32:45','2026-06-16 06:59:37',NULL,NULL,'lorem ipsum','active'),(22,'Azka Nisrin','azkanisrina@gmail.com','082125483805','PT Azka Rina','F&B / Retail','CTO','https://www.linkedin.com/in/nael-muna-782275243/',NULL,'published',NULL,'2026-05-22 02:34:00','2026-05-22 02:34:00',NULL,NULL,NULL,'active'),(23,'Budi Utomo','budiutomo@gmail.com','082125483805','PT Adidaya','Properti & Real Estate','CEO','https://acmi.hahabid.com/',NULL,'published',NULL,'2026-05-22 13:17:27','2026-05-22 13:17:27',NULL,NULL,NULL,'active'),(24,'Antonelli','antonelli@gmail.com','082125483805','PT Satu Dua','Healthcare','CEO','https://acmi.hahabid.com/',NULL,'published',NULL,'2026-05-23 04:55:11','2026-05-23 04:55:11',NULL,NULL,NULL,'active'),(25,'Azwa Khalisa','azwakhalisa@gmail.com','082125483805','PT Khalisa','Properti & Real Estate','CTO','https://acmi.hahabid.com/','https://www.linkedin.com/in/nael-muna-782275243/','published',NULL,'2026-05-23 08:22:27','2026-05-23 08:22:27','1-50 Karyawan','< IDR 10 Miliar','semoga berhasil','active'),(26,'Kimi Anton','kimitoni@gmail.com','082125483805','PT Antoni','Media & Entertainment','CTO','https://acmi.hahabid.com/','https://www.linkedin.com/in/nael-muna-782275243/','published',NULL,'2026-05-23 12:23:15','2026-05-23 12:23:15','201-500 Karyawan','IDR 50 - 200 Miliar','yap','active'),(27,'Pelangi Pagi','pelangi@gmail.com','082125483805','PT Pagi Sejahtera','Teknologi & Software','CEO','https://acmi.hahabid.com/','https://www.linkedin.com/in/nael-muna-782275243/','published',NULL,'2026-05-23 13:02:58','2026-05-23 13:02:58','201-500 Karyawan',NULL,'acooinaxnue','active'),(28,'George Russel','georgerussel@gmail.com','082125483805','PT Russel','Energi & Resources','CEO','https://acmi.hahabid.com/','https://www.linkedin.com/in/nael-muna-782275243/','published',NULL,'2026-05-23 13:34:11','2026-05-23 13:34:11','201-500 Karyawan',NULL,'adcjeijneiuhai','active'),(29,'Diva','hanadiva@gmail.com','082125483805','PT Belok Kanan','Properti & Real Estate','CEO','https://acmi.hahabid.com/',NULL,'published',NULL,'2026-05-24 05:16:32','2026-05-24 05:16:32','1000+ Karyawan',NULL,'dhbwclywec','active'),(30,'HIlwa Ilham','hilwailham@gmail.com','082125483805','PT Biru Terang','F&B','CEO','https://acmi.hahabid.com/','https://www.linkedin.com/in/nael-muna-782275243/','published',NULL,'2026-05-24 05:16:32','2026-05-24 05:16:32','51-200 Karyawan',NULL,'acjneiuio','active'),(31,'Emiliana','emil@gmail.com','082125483805','PT Olivia','F&B','CEO','https://acmi.hahabid.com/','https://www.linkedin.com/in/nael-muna-782275243/','published',NULL,'2026-05-24 05:16:32','2026-06-18 01:48:54','51-200 Karyawan','> IDR 1 Triliun','Lorem ipsum odlor acjkneu','active'),(32,'Raisa Amanda','raisa@gmail.com','082125483805','PT Coba Aja Dulu','Teknologi & Software','CEO','https://acmi.hahabid.com/','https://www.linkedin.com/in/nael-muna-782275243/','published',NULL,'2026-05-24 05:16:32','2026-05-24 05:16:32','501-1000 Karyawan',NULL,'acoelkm qec','active'),(33,'Tanzani Akasyah','tanzanini@gmail.com','082125483805','PT Akasyah','Properti & Real Estate','CEO','https://acmi.hahabid.com/','https://www.linkedin.com/in/nael-muna-782275243/','published',NULL,'2026-06-16 07:01:22','2026-06-16 07:01:22','201-500 Karyawan','> IDR 1 Triliun','masuk surga','active'),(34,'Toto Wolf','toto@gmail.com','082125483805','PT Wolfto','Media & Entertainment','CEO','https://acmi.hahabid.com/','https://www.linkedin.com/in/nael-muna-782275243/','published',NULL,'2026-06-18 01:49:22','2026-06-18 04:01:42','51-200 Karyawan','IDR 50 - 200 Miliar','Lorem ipsum dolorna sit amet','active'),(35,'Balqis Faiha','balqis@gmail.com','082125483805','PT Garasi Salwa','Retail & E-commerce','CEO','https://acmi.hahabid.com/','https://www.linkedin.com/in/nael-muna-782275243/','published',NULL,'2026-06-18 04:19:52','2026-06-18 04:21:20','201-500 Karyawan','IDR 10 - 50 Miliar','lorem ipsum dolor sit amet','active'),(36,'Dhia Nufah','dhianu@gmail.com','082125483805','PT Nufah','F&B','CEO','https://acmi.hahabid.com/',NULL,'published',NULL,'2026-06-18 04:49:35','2026-06-18 04:49:35','201-500 Karyawan',NULL,'cieulnue aoijeunna','active');
/*!40000 ALTER TABLE `members` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2026_04_17_060606_create_posts_table',1),(5,'2026_04_18_074721_create_member_requests_table',1),(6,'2026_04_18_074731_create_members_table',1),(7,'2026_04_18_074737_create_website_views_table',1),(8,'2026_04_18_074749_create_activity_logs_table',1),(9,'2026_04_18_095036_add_fields_to_member_requests_table',1),(10,'2026_04_18_095140_add_fields_to_members_table',1),(11,'2026_04_18_110907_create_faqs_table',1),(12,'2026_04_20_034615_create_categories_table',1),(13,'2026_04_20_035151_create_category_post_table',1),(14,'2026_04_24_061714_add_status_to_faqs_table',1),(15,'2026_04_27_022630_create_products_table',1),(16,'2026_04_27_034012_create_media_categories_table',1),(17,'2026_04_27_034021_create_media_items_table',1),(18,'2026_04_30_081916_add_is_default_to_media_categories_table',1),(19,'2026_05_02_085635_update_status_enum_on_faqs_table',1),(20,'2026_05_02_094706_create_inbounds_table',1),(21,'2026_05_02_113117_create_product_categories_table',2),(22,'2026_05_02_101341_add_status_to_inbounds_table',3),(23,'2026_05_04_023733_create_media_partners_table',3),(24,'2026_05_05_023040_add_slug_to_posts_table',4),(25,'2026_05_05_031225_add_details_to_inbounds_table',4),(26,'2026_05_05_063142_add_content_en_to_posts_table',4),(27,'2026_05_06_014331_add_deleted_at_to_post_table',4),(28,'2026_05_06_022906_add_deleted_at_to_members_table',4),(29,'2026_05_06_031441_add_deleted_at_to_categories_table',5),(30,'2026_05_06_061732_add_deleted_at_to_faqs_table',6),(31,'2026_05_06_061825_add_deleted_at_to_product_table',7),(32,'2026_05_06_061928_add_deleted_at_to_media_table',8),(33,'2026_05_06_062020_add_deleted_at_to_media_partner_table',8),(34,'2026_05_06_062239_add_deleted_at_to_product_categories_table',8),(35,'2026_05_06_062255_add_deleted_at_to_media_categories_table',8),(36,'2026_05_06_061928_add_deleted_at_to_media_items_table',9),(37,'2026_05_06_065124_add_status_to_products_table',9),(38,'2026_05_06_065249_add_status_to_media_items_table',9),(39,'2026_05_06_065538_add_status_to_media_partner_table',9),(40,'2026_05_07_014432_add_image_to_products_table',10),(41,'2026_05_07_040424_add_soft_deletes_to_products_table',11),(42,'2026_05_07_032831_add_status_to_media_partners_table',12),(43,'2026_05_07_071911_add_status_to_products_table',12),(44,'2026_05_07_072026_add_status_to_posts_table',12),(45,'2026_05_08_134657_add_images_to_products_table',13),(46,'2026_05_07_035151_add_details_to_members_table',14),(47,'2026_05_08_131948_add_content_to_posts_table',15),(48,'2026_05_11_141935_make_company_name_nullable_in_members_table',15),(49,'2026_05_11_204448_add_id_fields_to_posts_table',15),(50,'2026_05_12_101354_add_user_id_to_activity_logs_table',16),(52,'2026_05_15_110015_add_slug_to_products_table',17),(53,'2026_05_16_160528_add_address_to_products_table',18),(55,'2026_05_20_101522_create_instagram_posts_table',19),(56,'2026_05_21_133453_add_fields_to_inbounds_table',20),(57,'2026_05_21_133856_make_company_nullable_in_inbounds_table',21),(58,'2026_05_21_201540_create_members_table',22),(59,'2026_05_21_200457_add_extra_fields_to_inbounds_table',23),(61,'2026_05_22_195012_add_linkedin_url_to_members_table',24),(62,'2026_05_23_110522_make_message_nullable_in_inbounds_table',25),(63,'2026_05_23_120058_fix_phone_nullable_in_members_table',26),(64,'2026_05_23_120058_add_extra_fields_to_members_table',27),(65,'2026_05_23_141252_add_approved_at_to_inbounds_table',28),(66,'2026_06_16_135901_update_status_enum_in_members_table',29),(67,'2026_05_23_123525_change_category_to_json_in_products_table',30),(68,'2026_06_08_163443_add_soft_deletes_to_media_categories_table',30),(69,'2026_06_17_094938_add_id_columns_to_posts_table',30),(70,'2026_06_17_100059_add_en_columns_to_products_table',31),(71,'2026_06_17_100104_add_id_columns_to_products_table',31),(72,'2026_06_17_102622_add_en_columns_to_faqs_table',31),(73,'2026_06_17_102630_add_id_columns_to_faqs_table',31),(74,'2026_06_17_135027_add_slug_language_to_posts_table',32),(75,'2026_06_17_152907_add_published_at_to_posts_table',33),(77,'2026_06_17_110208_create_subscriptions_table',34),(78,'2026_06_18_104826_add_sub_status_to_members_table',35),(79,'2026_06_18_094218_create_testimonials_table',36),(80,'2026_07_09_173944_create_headers_table',37),(81,'2026_07_10_085845_rename_columns_in_subscriptions_table',38),(82,'2026_07_15_175542_add_new_fields_to_inbounds_table',38),(83,'2026_07_17_130000_create_sponsored_banners_table',38),(84,'2026_07_20_153716_add_size_to_sponsored_banners_table',39);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `title_id` varchar(255) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `slug_id` varchar(255) DEFAULT NULL,
  `slug_en` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `description_en` text DEFAULT NULL,
  `description_id` text DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `content_en` longtext DEFAULT NULL,
  `content_id` longtext DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` enum('published','draft','archived') NOT NULL DEFAULT 'draft',
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `posts_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,'acmi 2025','acmi 2025',NULL,'acmi-2025-1778731214',NULL,NULL,'lorem','lorem',NULL,'<h3>HAI HEHHEE</h3>','<h3>HAI HEHHEE</h3>',NULL,'posts/rPn5ACiDVBnurzGNS1nRwzAmacA6pACd6LRDfomQ.webp','published',NULL,'2026-05-05 20:23:32','2026-05-17 09:20:41','2026-05-17 09:20:41'),(7,'Rakernas','Rakernas',NULL,'rakernas-1778570179',NULL,NULL,'hahah','hahah',NULL,'<h1>lorem ipsum dolorna</h1>\r\n<p>&nbsp;</p>\r\n<h4>moon tell the world</h4>\r\n<p>lorem dolor sit amet<br><br>bismillah aamin bisa</p>','<h1>lorem ipsum dolorna</h1>\r\n<p>&nbsp;</p>\r\n<h4>moon tell the world</h4>\r\n<p>lorem dolor sit amet<br><br>bismillah aamin bisa</p>',NULL,'posts/da4Jx4cEqL7df8WXYmZ6BbfzvhnsqgvIw1RrLOtD.jpg','published',NULL,'2026-05-12 03:57:36','2026-05-24 02:12:12','2026-05-24 02:12:12'),(8,'Acmi Grebek','Acmi Grebek',NULL,'acmi-grebek-1778664226',NULL,NULL,'lorem ipsum','lorem ipsum',NULL,'<h3>Haihalo</h3>\r\n<p>lorem ipsum</p>','<h3>Haihalo</h3>\r\n<p>lorem ipsum</p>',NULL,'posts/hCfgr9wMIBDmMT3I0SAMo6ydjI65PacqjqW3BNJV.webp','published',NULL,'2026-05-13 09:10:04','2026-05-24 02:11:51','2026-05-24 02:11:51'),(10,'acmi grebek 2','acmi grebek 2',NULL,'acmi-grebek-2-1778731175',NULL,NULL,'lorem ipsum','lorem ipsum',NULL,'<p>lorem dolor sit amet haii</p>','<p>lorem dolor sit amet haii</p>',NULL,'posts/FCd0xZs9i23C7x7APkQLCcwNd06uyK6LC6sdzomS.jpg','published',NULL,'2026-05-14 03:54:36','2026-05-17 09:22:08','2026-05-17 09:22:08'),(11,'Ketua MPR Dorong Pemantapan Nilai Kebangsaan di Kalangan Pengusaha - ACMI','Ketua MPR Dorong Pemantapan Nilai Kebangsaan di Kalangan Pengusaha - ACMI',NULL,'ketua-mpr-dorong-pemantapan-nilai-kebangsaan-di-kalangan-pengusaha-acmi-1779010013',NULL,'ketua-mpr-dorong-pemantapan-nilai-kebangsaan-di-kalangan-pengusaha-acmi-11','Ketua MPR RI sekaligus Wakil Ketua Umum Partai Golkar Bambang Soesatyo mendukung penyelenggaraan Pendidikan dan Pelatihan (Diklat) Pemantapan Nilai-nilai Kebangsaan Angkatan Ke-1. Diselenggarakan Asosiasi CEO Mastermind Indonesia (ACMI) bersama Lemhannas RI, pada 4 Desember 2023.','Ketua MPR RI sekaligus Wakil Ketua Umum Partai Golkar Bambang Soesatyo mendukung penyelenggaraan Pendidikan dan Pelatihan (Diklat) Pemantapan Nilai-nilai Kebangsaan Angkatan Ke-1. Diselenggarakan Asosiasi CEO Mastermind Indonesia (ACMI) bersama Lemhannas RI, pada 4 Desember 2023.',NULL,'<p>&ldquo;Sebagai asosiasi yang beranggotakan pengusaha Indonesia dari berbagai bidang sekaligus wadah membangun kerjasama dan relasi untuk membuat lapangan pekerjaan, ACMI tidak hanya fokus pada kegiatan ekonomi. Melainkan juga pada pemantapan nilai-nilai kebangsaan. Hal ini sangat penting, mengingat lingkungan global saat ini tidak sedang baik-baik saja. Kita sedang dihadapkan pada ancaman krisis ekonomi-politik global. IMF memperkirakan sepertiga ekonomi dunia akan mengalami penyusutan. Bank Dunia memprediksi terjadinya resesi ekonomi global,&rdquo; ujar Bamsoet usai menerima pengurus ACMI, di <em>Jakarta, Senin (20/11/2023)</em>.</p>\r\n<h2><strong>Ketua DPR RI ke-20</strong> dan mantan Ketua Komisi III DPR RI bidang Hukum, HAM, dan Keamanan ini menjelaskan&nbsp;Dalam dimensi ekonomi, para pengusaha muda adalah elemen penggerak pembangunan sebagai generator dan sekaligus dinamisator. Dalam dimensi kehidupan berbangsa dan bernegara, pengusaha muda adalah pembentuk masa depan perekonomian nasional.</h2>\r\n<p>&ldquo;Seperti apa wajah &ldquo;negara kesejahteraan&rdquo; yang diamanatkan oleh Konstitusi dapat kita realisasikan, akan ditentukan oleh seberapa dalam rasa nasionalisme, dan seberapa luas wawasan kebangsaan, mengakar kuat dalam jatidiri para pelaku ekonomi. Khususnya para pengusaha muda,&rdquo; jelas Bamsoet.</p>\r\n<p>Ketua Dewan Pembina Depinas SOKSI dan Kepala Badan Polhukam KADIN Indonesia ini juga mendorong para pelaku usaha mewujudkan ketahanan ekonomi nasional, meningkatkan daya saing global, serta melindungi kepentingan ekonomi nasional. Termasuk dalam menghadapi berbagai persoalan seperti perburuhan, konflik sosial, kerusakan lingkungan, hingga ketergantungan pada pihak asing.</p>\r\n<p>&ldquo;Sebagaimana ditekankan dalam rumusan pasal 33 ayat (1) UUD NRI Tahun 1945, bahwa sistem perekonomian nasional kita adalah sistem perekonomian yang khas, yang berbeda dengan dua kutub dikotomi perekonomian yang telah menjadi hegemoni global. Sistem perekonomian kita bukanlah sistem ekonomi sosialis, di mana negara menjadi dominan sebagai pelaku ekonomi. Sistem perekonomian kita juga bukan sistem ekonomi kapitalis, dimana individu dan pasar menjadi dominan menentukan perilaku ekonomi,&rdquo; pungkas Bamsoet.</p>\r\n<p>Pengurus ACMI yang hadir antara lain, Ketua Umum Donny Wahyudi, Wakil Sekjen Candra AS, Humas Achmad Arief, dan Koordinator Wilayah Tengah Iwan Prabowo.</p>\r\n<pre>Penulis: Herdi<br>Editor: Pahala Simanjuntak</pre>','<p>&ldquo;Sebagai asosiasi yang beranggotakan pengusaha Indonesia dari berbagai bidang sekaligus wadah membangun kerjasama dan relasi untuk membuat lapangan pekerjaan, ACMI tidak hanya fokus pada kegiatan ekonomi. Melainkan juga pada pemantapan nilai-nilai kebangsaan. Hal ini sangat penting, mengingat lingkungan global saat ini tidak sedang baik-baik saja. Kita sedang dihadapkan pada ancaman krisis ekonomi-politik global. IMF memperkirakan sepertiga ekonomi dunia akan mengalami penyusutan. Bank Dunia memprediksi terjadinya resesi ekonomi global,&rdquo; ujar Bamsoet usai menerima pengurus ACMI, di <em>Jakarta, Senin (20/11/2023)</em>.</p>\r\n<h2><strong>Ketua DPR RI ke-20</strong> dan mantan Ketua Komisi III DPR RI bidang Hukum, HAM, dan Keamanan ini menjelaskan&nbsp;Dalam dimensi ekonomi, para pengusaha muda adalah elemen penggerak pembangunan sebagai generator dan sekaligus dinamisator. Dalam dimensi kehidupan berbangsa dan bernegara, pengusaha muda adalah pembentuk masa depan perekonomian nasional.</h2>\r\n<p>&ldquo;Seperti apa wajah &ldquo;negara kesejahteraan&rdquo; yang diamanatkan oleh Konstitusi dapat kita realisasikan, akan ditentukan oleh seberapa dalam rasa nasionalisme, dan seberapa luas wawasan kebangsaan, mengakar kuat dalam jatidiri para pelaku ekonomi. Khususnya para pengusaha muda,&rdquo; jelas Bamsoet.</p>\r\n<p>Ketua Dewan Pembina Depinas SOKSI dan Kepala Badan Polhukam KADIN Indonesia ini juga mendorong para pelaku usaha mewujudkan ketahanan ekonomi nasional, meningkatkan daya saing global, serta melindungi kepentingan ekonomi nasional. Termasuk dalam menghadapi berbagai persoalan seperti perburuhan, konflik sosial, kerusakan lingkungan, hingga ketergantungan pada pihak asing.</p>\r\n<p>&ldquo;Sebagaimana ditekankan dalam rumusan pasal 33 ayat (1) UUD NRI Tahun 1945, bahwa sistem perekonomian nasional kita adalah sistem perekonomian yang khas, yang berbeda dengan dua kutub dikotomi perekonomian yang telah menjadi hegemoni global. Sistem perekonomian kita bukanlah sistem ekonomi sosialis, di mana negara menjadi dominan sebagai pelaku ekonomi. Sistem perekonomian kita juga bukan sistem ekonomi kapitalis, dimana individu dan pasar menjadi dominan menentukan perilaku ekonomi,&rdquo; pungkas Bamsoet.</p>\r\n<p>Pengurus ACMI yang hadir antara lain, Ketua Umum Donny Wahyudi, Wakil Sekjen Candra AS, Humas Achmad Arief, dan Koordinator Wilayah Tengah Iwan Prabowo.</p>\r\n<pre>Penulis: Herdi<br>Editor: Pahala Simanjuntak</pre>',NULL,'posts/2qyNga6Ln10f30r0iyONBLYsn5V5MGDRapnoQkd2.jpg','published','2026-05-14 04:00:37','2026-05-14 04:00:37','2026-06-17 08:33:35',NULL),(13,'Super Networking','Super Networking',NULL,'super-networking-1779588551',NULL,'super-networking-13','Asosiasi CEO MasterMind Indonesia (ACMI) yang berfokus pada para pemimpin dan pengusaha terkemuka, tentu juga memiliki perhatian terhadap pentingnya keseimbangan antara dunia bisnis dan gaya hidup sehat. Dalam konteks ini, kegiatan olahraga menjadi salah satu cara untuk mengintegrasikan kebugaran fisik dan mental, sambil memperkuat networking antar para anggota.','Asosiasi CEO MasterMind Indonesia (ACMI) yang berfokus pada para pemimpin dan pengusaha terkemuka, tentu juga memiliki perhatian terhadap pentingnya keseimbangan antara dunia bisnis dan gaya hidup sehat. Dalam konteks ini, kegiatan olahraga menjadi salah satu cara untuk mengintegrasikan kebugaran fisik dan mental, sambil memperkuat networking antar para anggota.',NULL,'<p dir=\"ltr\">Beberapa kegiatan olahraga yang mungkin relevan dan bisa diadakan dalam lingkungan CEO MasterMind Indonesia antara lain:</p>\r\n<ol>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Golf Tournament: Golf sering menjadi pilihan utama bagi para CEO dan pengusaha. Kegiatan turnamen golf dapat menjadi cara yang efektif untuk menjalin relasi bisnis sambil menikmati olahraga.</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Fitness Challenge atau Bootcamp: Mengadakan acara fitness bersama yang tidak hanya fokus pada kebugaran fisik, tetapi juga meningkatkan ketahanan mental, seperti bootcamp atau tantangan kebugaran.</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Yoga atau Meditasi: Banyak CEO dan pengusaha yang mulai melibatkan diri dalam kegiatan yoga atau meditasi untuk menjaga kesehatan mental dan tubuh. Kegiatan ini bisa dilakukan secara rutin, bahkan dengan mengundang instruktur profesional.</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Turnamen Olahraga Rekreasi: Mengadakan turnamen olahraga yang lebih santai, seperti futsal, basket, atau tenis, yang dapat melibatkan CEO dan pengusaha dalam suasana yang lebih informal dan santai, tetapi tetap kompetitif.</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Networking Event dengan Olahraga: Acara olahraga yang dikombinasikan dengan sesi networking, di mana para CEO dan pengusaha dapat berinteraksi lebih bebas sambil berolahraga bersama.</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Charity Run atau Fun Run: Mengadakan acara lari amal yang melibatkan para anggota dan komunitas dengan tujuan mengumpulkan dana untuk kegiatan sosial. Ini juga dapat memberikan kesempatan bagi para CEO untuk menunjukkan kepedulian terhadap masalah sosial sekaligus berolahraga.</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Pelatihan Kepemimpinan dan Olahraga: Mengorganisir kegiatan pelatihan kepemimpinan yang dipadukan dengan olahraga, seperti kegiatan outbound atau aktivitas fisik yang mengajarkan kerja tim, komunikasi, dan pengambilan keputusan.</p>\r\n</li>\r\n</ol>\r\n<p dir=\"ltr\">Kegiatan olahraga ini tidak hanya bertujuan untuk kesehatan fisik, tetapi juga untuk meningkatkan hubungan antar anggota, serta menciptakan peluang untuk kolaborasi yang bermanfaat dalam dunia bisnis.</p>\r\n<p>&nbsp;</p>','<p dir=\"ltr\">Beberapa kegiatan olahraga yang mungkin relevan dan bisa diadakan dalam lingkungan CEO MasterMind Indonesia antara lain:</p>\r\n<ol>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Golf Tournament: Golf sering menjadi pilihan utama bagi para CEO dan pengusaha. Kegiatan turnamen golf dapat menjadi cara yang efektif untuk menjalin relasi bisnis sambil menikmati olahraga.</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Fitness Challenge atau Bootcamp: Mengadakan acara fitness bersama yang tidak hanya fokus pada kebugaran fisik, tetapi juga meningkatkan ketahanan mental, seperti bootcamp atau tantangan kebugaran.</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Yoga atau Meditasi: Banyak CEO dan pengusaha yang mulai melibatkan diri dalam kegiatan yoga atau meditasi untuk menjaga kesehatan mental dan tubuh. Kegiatan ini bisa dilakukan secara rutin, bahkan dengan mengundang instruktur profesional.</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Turnamen Olahraga Rekreasi: Mengadakan turnamen olahraga yang lebih santai, seperti futsal, basket, atau tenis, yang dapat melibatkan CEO dan pengusaha dalam suasana yang lebih informal dan santai, tetapi tetap kompetitif.</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Networking Event dengan Olahraga: Acara olahraga yang dikombinasikan dengan sesi networking, di mana para CEO dan pengusaha dapat berinteraksi lebih bebas sambil berolahraga bersama.</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Charity Run atau Fun Run: Mengadakan acara lari amal yang melibatkan para anggota dan komunitas dengan tujuan mengumpulkan dana untuk kegiatan sosial. Ini juga dapat memberikan kesempatan bagi para CEO untuk menunjukkan kepedulian terhadap masalah sosial sekaligus berolahraga.</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Pelatihan Kepemimpinan dan Olahraga: Mengorganisir kegiatan pelatihan kepemimpinan yang dipadukan dengan olahraga, seperti kegiatan outbound atau aktivitas fisik yang mengajarkan kerja tim, komunikasi, dan pengambilan keputusan.</p>\r\n</li>\r\n</ol>\r\n<p dir=\"ltr\">Kegiatan olahraga ini tidak hanya bertujuan untuk kesehatan fisik, tetapi juga untuk meningkatkan hubungan antar anggota, serta menciptakan peluang untuk kolaborasi yang bermanfaat dalam dunia bisnis.</p>\r\n<p>&nbsp;</p>',NULL,'posts/6TCuHg7MVgFcLNBzXwkANda9cQdqfh9cfu3Rmonn.jpg','published','2026-05-14 04:01:45','2026-05-14 04:01:45','2026-06-17 08:33:35',NULL),(14,'HUT Asosiasi CEO Mastermind Indonesia Ke-3 Di Banyuwangi','HUT Asosiasi CEO Mastermind Indonesia Ke-3 Di Banyuwangi',NULL,'hut-asosiasi-ceo-mastermind-indonesia-ke-3-di-banyuwangi-1779588452',NULL,'hut-asosiasi-ceo-mastermind-indonesia-ke-3-di-banyuwangi-14','Banyuwangi menjadi saksi kesuksesan perayaan Hari Ulang Tahun (HUT) ke-3 Asosiasi CEO Mastermind Indonesia (ACMI). Acara yang berlangsung pada 7-8 Desember 2024 di Ketapang Indah Hotel ini mengangkat tema “Nyawiji Ing Sinergi” dan menghadirkan para pemimpin bisnis dari berbagai penjuru Indonesia. Selain itu, perayaan Hari Ulang Tahun ACMI ini tidak hanya menjadi perayaan tahunan, tetapi juga wadah untuk menjalin kolaborasi, sinergi, dan berbagi inspirasi antar-CEO.','Banyuwangi menjadi saksi kesuksesan perayaan Hari Ulang Tahun (HUT) ke-3 Asosiasi CEO Mastermind Indonesia (ACMI). Acara yang berlangsung pada 7-8 Desember 2024 di Ketapang Indah Hotel ini mengangkat tema “Nyawiji Ing Sinergi” dan menghadirkan para pemimpin bisnis dari berbagai penjuru Indonesia. Selain itu, perayaan Hari Ulang Tahun ACMI ini tidak hanya menjadi perayaan tahunan, tetapi juga wadah untuk menjalin kolaborasi, sinergi, dan berbagi inspirasi antar-CEO.',NULL,'<h3 dir=\"ltr\">Momen Inspiratif bersama Helmy Yahya</h3>\r\n<p dir=\"ltr\">Salah satu sorotan utama acara ini adalah kehadiran Helmy Yahya sebagai pembina ACMI. Dalam sesi yang penuh inspirasi, Helmy Yahya mengingatkan peserta tentang pentingnya soliditas dalam bisnis. Ia menegaskan bahwa keberhasilan perusahaan tidak hanya diukur dari besarnya penghasilan, tetapi juga dari kemampuannya bertahan di tengah tantangan.</p>\r\n<p dir=\"ltr\">&ldquo;<em>Soliditas adalah fondasi. Dengan tim yang kuat, perusahaan dapat menghadapi segala rintangan dan terus relevan di tengah persaingan global,&rdquo;</em> <strong>ujar Helmy</strong>. Pesan ini memotivasi para peserta untuk lebih fokus membangun kekuatan internal perusahaan dan terus berinovasi.</p>\r\n<h3 dir=\"ltr\">Kepemimpinan Tim KSB ACMI</h3>\r\n<p dir=\"ltr\">Tim KSB (Ketua, Sekretaris, dan Bendahara) memimpin jalannya perayaan Hari Ulang Tahun ACMI ini dengan penuh dedikasi. Ketua Umum ACMI, Donny Wahyudi, dalam sambutannya menyoroti pentingnya kolaborasi dan sinergi di dunia bisnis yang semakin kompleks.</p>\r\n<p dir=\"ltr\"><em>&ldquo;Acara ini kami harapkan menjadi wadah bagi para CEO untuk bertukar pikiran dan belajar dari pengalaman negara maju, seperti China. Dengan begitu, kita bisa mengadaptasi strategi-strategi yang relevan untuk membangun ekosistem bisnis yang lebih tangguh,&rdquo;</em> j<strong>elas Donny</strong>.<br><br>Sumber : Banggaindonesia.com</p>\r\n<h1>&nbsp;</h1>','<h3 dir=\"ltr\">Momen Inspiratif bersama Helmy Yahya</h3>\r\n<p dir=\"ltr\">Salah satu sorotan utama acara ini adalah kehadiran Helmy Yahya sebagai pembina ACMI. Dalam sesi yang penuh inspirasi, Helmy Yahya mengingatkan peserta tentang pentingnya soliditas dalam bisnis. Ia menegaskan bahwa keberhasilan perusahaan tidak hanya diukur dari besarnya penghasilan, tetapi juga dari kemampuannya bertahan di tengah tantangan.</p>\r\n<p dir=\"ltr\">&ldquo;<em>Soliditas adalah fondasi. Dengan tim yang kuat, perusahaan dapat menghadapi segala rintangan dan terus relevan di tengah persaingan global,&rdquo;</em> <strong>ujar Helmy</strong>. Pesan ini memotivasi para peserta untuk lebih fokus membangun kekuatan internal perusahaan dan terus berinovasi.</p>\r\n<h3 dir=\"ltr\">Kepemimpinan Tim KSB ACMI</h3>\r\n<p dir=\"ltr\">Tim KSB (Ketua, Sekretaris, dan Bendahara) memimpin jalannya perayaan Hari Ulang Tahun ACMI ini dengan penuh dedikasi. Ketua Umum ACMI, Donny Wahyudi, dalam sambutannya menyoroti pentingnya kolaborasi dan sinergi di dunia bisnis yang semakin kompleks.</p>\r\n<p dir=\"ltr\"><em>&ldquo;Acara ini kami harapkan menjadi wadah bagi para CEO untuk bertukar pikiran dan belajar dari pengalaman negara maju, seperti China. Dengan begitu, kita bisa mengadaptasi strategi-strategi yang relevan untuk membangun ekosistem bisnis yang lebih tangguh,&rdquo;</em> j<strong>elas Donny</strong>.<br><br>Sumber : Banggaindonesia.com</p>\r\n<h1>&nbsp;</h1>',NULL,'posts/eX8BbKpdRiycXJS1c1RjLnLOMRQ5Bw0w9elHTaHm.webp','published','2026-05-17 09:30:52','2026-05-17 09:30:52','2026-06-17 08:33:35',NULL),(15,'ACMI Rakernas 2026','ACMI Rakernas 2026',NULL,'acmi-rakernas-2026-1779518875',NULL,'acmi-rakernas-2026-15','lorem ipsum dolor sit amet','lorem ipsum dolor sit amet',NULL,'<h1>Lorem ipsum dolor Rakernas 2026</h1>\r\n<p>&nbsp;</p>\r\n<p>lorem ipsum dolor sit amet.</p>\r\n<p>lorem 34, ajscuiehbnaioje aceybakjniuehiahjb&nbsp; aoiejfuhyabxjwnubad aneuybuasueubjhhbsuycbenasbcueiasciuehjh jhbscbcja ajdhcbyuvhjansiebuakceubuia x awdbuijsygc aje8bakwdiowybcnnaldyejha aiucyebhjaskjuye fkakfuiehhjabdhjbwyu akcbeyaheuyhbcyueakdbeuyaksnciueh ajhbeyaknuiblabyueb ja ebbasiulce&nbsp;</p>','<h1>Lorem ipsum dolor Rakernas 2026</h1>\r\n<p>&nbsp;</p>\r\n<p>lorem ipsum dolor sit amet.</p>\r\n<p>lorem 34, ajscuiehbnaioje aceybakjniuehiahjb&nbsp; aoiejfuhyabxjwnubad aneuybuasueubjhhbsuycbenasbcueiasciuehjh jhbscbcja ajdhcbyuvhjansiebuakceubuia x awdbuijsygc aje8bakwdiowybcnnaldyejha aiucyebhjaskjuye fkakfuiehhjabdhjbwyu akcbeyaheuyhbcyueakdbeuyaksnciueh ajhbeyaknuiblabyueb ja ebbasiulce&nbsp;</p>',NULL,'posts/EEh7nmyTOxjlT5BY8ARNrnMJzUC3hzQItY8yNHRr.webp','draft','2026-05-18 02:30:53','2026-05-18 02:30:53','2026-06-17 08:33:35',NULL),(16,'Acmi Grebek','Acmi Grebek',NULL,'acmi-grebek-1779518855',NULL,NULL,'acmi','acmi',NULL,'<h1>sdkuhcfikjk&nbsp;</h1>\r\n<p>&nbsp;</p>\r\n<p>sdcjkurh</p>','<h1>sdkuhcfikjk&nbsp;</h1>\r\n<p>&nbsp;</p>\r\n<p>sdcjkurh</p>',NULL,NULL,'published',NULL,'2026-05-23 06:47:35','2026-05-23 06:47:46','2026-05-23 06:47:46'),(17,'Acmi Powerhouse',NULL,'Acmi Powerhouse','acmi-powerhouse-1781530256','acmi-powerhouse-17',NULL,'akjadncliueh',NULL,'akjadncliueh','<h1>aeckjeu</h1>\r\n<p>ajcbeiu</p>',NULL,'<h1>aeckjeu</h1>\r\n<p>ajcbeiu</p>','posts/5iaXapBLCFPrIOK3BI3MVqsbveBVAwRlWKcRUlAg.png','published','2026-06-15 13:30:56','2026-06-15 13:30:56','2026-06-17 12:01:07','2026-06-17 12:01:07'),(18,'ACMI SPORT 2024','ACMI SPORT 2024',NULL,'acmi-sport-2024-1781697660',NULL,'acmi-sport-2024-18','lorem ipsum dolor sit amet','lorem ipsum dolor sit amet',NULL,'<h2>Lorem Ipsum</h2>\r\n<p>&nbsp;</p>\r\n<p>loremacdjie aoijcuyeioa c7ueoja</p>\r\n<p>acniueoamsxoiji</p>\r\n<p>acejoija</p>\r\n<p>&nbsp;</p>\r\n<h1>SPORT24</h1>','<h2>Lorem Ipsum</h2>\r\n<p>&nbsp;</p>\r\n<p>loremacdjie aoijcuyeioa c7ueoja</p>\r\n<p>acniueoamsxoiji</p>\r\n<p>acejoija</p>\r\n<p>&nbsp;</p>\r\n<h1>SPORT24</h1>',NULL,'posts/JeC8ptdlaTXncteu3yWeDI6030nnloZXjt42TLhX.jpg','published','2026-06-17 08:09:46','2026-06-17 08:09:46','2026-06-17 12:01:00',NULL),(19,'cspockoe','cspockoe',NULL,'cspockoe-1781685937',NULL,NULL,'aecei;o','aecei;o',NULL,'<p>aecioeaca</p>\r\n<p>ceunra</p>','<p>aecioeaca</p>\r\n<p>ceunra</p>',NULL,'posts/3nE2yxydl1xNlYnZeKGsjV3GPHXlpF07vex0Mqph.png','published','2026-06-17 08:45:37','2026-06-17 08:45:37','2026-06-27 06:32:29','2026-06-27 06:32:29'),(20,'Acmi Grebek','Acmi Grebek',NULL,'acmi-grebek-1782541721',NULL,NULL,'lorem ipsum dolor sit amet','lorem ipsum dolor sit amet',NULL,'<h2>Salam</h2>\r\n<p>bismillah</p>\r\n<p>&nbsp;</p>','<h2>Salam</h2>\r\n<p>bismillah</p>\r\n<p>&nbsp;</p>',NULL,'posts/JhJ3zRH7L6lf3u0U01SgqyxbKXyI8s1tjkTmflwo.png','published','2026-06-27 06:28:41','2026-06-27 06:28:41','2026-06-27 06:28:41',NULL),(21,'Gelar Rakernas 2022, ACMI Bicara Soal Tantangan Para CEO di Tengah Ancaman Resesi Global',NULL,'Gelar Rakernas 2022, ACMI Bicara Soal Tantangan Para CEO di Tengah Ancaman Resesi Global','gelar-rakernas-2022-acmi-bicara-soal-tantangan-para-ceo-di-tengah-ancaman-resesi-global-1783590898',NULL,NULL,'TRIBUNNEWS.COM, JAKARTA - Asosiasi CEO Mastermind Indonesia (ACMI) menggelar rapat kerja nasional (rakernas) tahun 2022, bertepatan dengan anniversary ACMI yang pertama.',NULL,'TRIBUNNEWS.COM, JAKARTA - Asosiasi CEO Mastermind Indonesia (ACMI) menggelar rapat kerja nasional (rakernas) tahun 2022, bertepatan dengan anniversary ACMI yang pertama.','<h2>Ketua Umum ACMI,&nbsp;<a class=\"blue\" href=\"https://www.tribunnews.com/tag/donny-wahyudi\">Donny Wahyudi</a>&nbsp;mengatakan, pada prinsipnya Rakernas yang diselenggarakan ini adalah kegiatan untuk menyusun program tahun 2023.</h2>\r\n<p>&nbsp;</p>\r\n<p>Dalam Rakernas yang membawa tema Jumangkah Majeng Sesarengan (Melangkah Maju Bersama), asosiasi yang beranggotakan pengusaha Indonesia dari berbagai bidang ini dibentuk sebagai wadah membangun kerja sama dan relasi untuk membuat lapangan pekerjaan.</p>\r\n<p><em>\"Kita sebagai tempat solusi dan saling kolaborasi dengan sesama anggota ACMI, pemberdayaan&nbsp;<a class=\"blue\" href=\"https://www.tribunnews.com/tag/umkm\">UMKM</a>, targetnya ACMI bermanfaat untuk masyarakat,\" </em>ujar Donny didampingi Sekjen Sonny Arca Adryanto, di sela Rakernas di Hotel Griya Persada Kaliurang Convention Hotel &amp; Resort DIY, dalam keterangan yang diterima, <strong>Jumat (28/10/2022).</strong></p>\r\n<p>Donny kemudian mengatakan soal <strong>Winter is Coming 2023</strong> yang kerap diartikan sebagai tahun tergelap karena disebut-sebut bakal terjadi resesi di sejumlah negara.</p>',NULL,'<h2>Ketua Umum ACMI,&nbsp;<a class=\"blue\" href=\"https://www.tribunnews.com/tag/donny-wahyudi\">Donny Wahyudi</a>&nbsp;mengatakan, pada prinsipnya Rakernas yang diselenggarakan ini adalah kegiatan untuk menyusun program tahun 2023.</h2>\r\n<p>&nbsp;</p>\r\n<p>Dalam Rakernas yang membawa tema Jumangkah Majeng Sesarengan (Melangkah Maju Bersama), asosiasi yang beranggotakan pengusaha Indonesia dari berbagai bidang ini dibentuk sebagai wadah membangun kerja sama dan relasi untuk membuat lapangan pekerjaan.</p>\r\n<p><em>\"Kita sebagai tempat solusi dan saling kolaborasi dengan sesama anggota ACMI, pemberdayaan&nbsp;<a class=\"blue\" href=\"https://www.tribunnews.com/tag/umkm\">UMKM</a>, targetnya ACMI bermanfaat untuk masyarakat,\" </em>ujar Donny didampingi Sekjen Sonny Arca Adryanto, di sela Rakernas di Hotel Griya Persada Kaliurang Convention Hotel &amp; Resort DIY, dalam keterangan yang diterima, <strong>Jumat (28/10/2022).</strong></p>\r\n<p>Donny kemudian mengatakan soal <strong>Winter is Coming 2023</strong> yang kerap diartikan sebagai tahun tergelap karena disebut-sebut bakal terjadi resesi di sejumlah negara.</p>','posts/BfY3PeXjzlLQ7hsAqSGATnjwvj8YXYWHBR0LWKDS.jpg','published','2026-07-09 09:54:58','2026-07-09 09:54:58','2026-07-09 09:54:58',NULL);
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_categories`
--

DROP TABLE IF EXISTS `product_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_categories`
--

LOCK TABLES `product_categories` WRITE;
/*!40000 ALTER TABLE `product_categories` DISABLE KEYS */;
INSERT INTO `product_categories` VALUES (1,'Software','2026-05-04 20:39:26','2026-05-04 20:39:26',NULL),(2,'Energi','2026-05-04 20:39:26','2026-05-04 20:39:26',NULL),(3,'FnB','2026-05-04 20:39:26','2026-05-04 20:39:26',NULL),(4,'Manufaktur','2026-05-04 20:39:26','2026-05-04 20:39:26',NULL),(5,'Properti','2026-05-04 20:39:26','2026-05-04 20:39:26',NULL),(6,'Fintech','2026-05-04 20:39:26','2026-05-04 20:39:26',NULL),(7,'Logistik','2026-05-04 20:39:26','2026-05-04 20:39:26',NULL),(8,'Health','2026-05-04 20:39:26','2026-05-04 20:39:26',NULL),(9,'Technology','2026-05-06 18:56:53','2026-05-06 18:56:53',NULL),(10,'Economy','2026-05-06 18:56:59','2026-05-06 18:56:59',NULL),(11,'Engineering','2026-05-21 07:20:05','2026-05-21 07:20:05',NULL);
/*!40000 ALTER TABLE `product_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `status` enum('published','draft','archived') NOT NULL DEFAULT 'published',
  `category` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `title_id` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) NOT NULL,
  `ceo_name` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `description_en` text DEFAULT NULL,
  `description_id` text DEFAULT NULL,
  `features` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`features`)),
  `website` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`images`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `features_en` longtext DEFAULT NULL,
  `features_id` text DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `products_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (3,'published','[\"FnB\"]','Premium Coffee Beans',NULL,NULL,'properti','PT kopi Nusantara','Agus Wijaya','Jl. Sudirman Kav. 52, Jakarta','PT Kopi Nusantara menghadirkan biji kopi single-origin premium dari perkebunan terbaik di Aceh, Toraja, dan Flores. Dengan proses roasting artisanal dan quality control ketat, kami melayani kebutuhan kopi premium untuk hotel, restoran, dan korporasi.',NULL,NULL,'[\"Single Origin\",\"Artisanal Roasting\",\"B2B Supply\",\"Custom Blend\",\"Cupping Session\"]','https://kopinusantara.co.id/','order@kopinusantara.co.id','+62 21 555 0303','\"products\\/JsUlxc9oyERLaRN3SY653lIpW1TUXymYydex9iiz.jpg\"','[\"products\\/JsUlxc9oyERLaRN3SY653lIpW1TUXymYydex9iiz.jpg\",\"products\\/CxyU7peT7OeCS8oGHNvCJuxgb5vOCaJ1r4mxuVuK.jpg\"]','2026-05-06 19:02:32','2026-05-24 02:28:33',NULL,NULL,NULL),(5,'published','[\"Manufaktur\"]','Pabrika',NULL,NULL,'pabrika','PT Abadi','Muna',NULL,'snvru',NULL,NULL,'[\"aef4f\"]','https://jayamandirikertas.com/','bendahara@gmail.com','082125483805','\"products\\/taYSEj46Zb8dUeliUS8iKLMOqqZ7aWx0ksCZmvcx.png\"','[\"products\\/taYSEj46Zb8dUeliUS8iKLMOqqZ7aWx0ksCZmvcx.png\"]','2026-05-06 19:04:29','2026-07-10 04:34:53',NULL,NULL,NULL),(6,'published','[\"Properti\"]','Luxury Property Collection',NULL,NULL,'techbar','PT Properti Prima','Herman Tanoto','Pacific Place Lt. 42, Jakarta','PT Properti Prima mengembangkan hunian mewah dan properti komersial premium di lokasi-lokasi strategis Indonesia. Dengan standar internasional dan desain award-winning, setiap proyek kami mencerminkan kemewahan dan kenyamanan terbaik.',NULL,NULL,'[\"Lokasi Premium\",\"Desain Award-Winning\",\"Smart Home\",\"Concierge Services\",\"Investment Grade\"]','https://propertiprima.co.id/','inquiry@propertiprima.co.id','+62 21 555 0505','\"products\\/rb3y4nA6pIP51OspkgLvLJwk17BhT3EGa3r3UZwa.jpg\"','[\"products\\/rb3y4nA6pIP51OspkgLvLJwk17BhT3EGa3r3UZwa.jpg\",\"products\\/pbndhibxB4YwV6Xv9PNGN8IUtQKlqNIWS1hu0zvR.jpg\"]','2026-05-08 07:07:51','2026-05-24 02:25:49',NULL,NULL,NULL),(7,'published','[\"Manufaktur\"]','Smart Manufacturing System',NULL,NULL,'green-energy','PT Industri Cerdas','Ratna Permata','Kawasan Industri MM2100, Bekasi','Smart Manufacturing System menghadirkan revolusi Industri 4.0 ke lantai produksi Anda. Dengan kombinasi AI, IoT, dan robotika, kami mengoptimalkan proses manufaktur, meningkatkan kualitas produk, dan mengurangi downtime hingga 80%.',NULL,NULL,'[\"AI Quality Control\",\"IoT Monitoring\",\"Predictive Maintenance\",\"Digital Twin\",\"Real-time Analytics\"]','https://industricerdas.co.id','sales@industricerdas.co.id','+62 21 555 0404','\"products\\/DThV0YxzIxNqy5rVcUAMXKPsT6Nfsp0kcwnZPPGb.jpg\"','[\"products\\/DThV0YxzIxNqy5rVcUAMXKPsT6Nfsp0kcwnZPPGb.jpg\",\"products\\/9rS4tpQcmxU2dtum9ce3ie4F8DUy7w8PIqOjGlLL.jpg\"]','2026-05-12 13:27:39','2026-05-24 02:31:21',NULL,NULL,NULL),(8,'published','[\"Energi\",\"Engineering\"]','Green Energy Solutions',NULL,NULL,'solar-panel','PT Energi Hijau Indonesia','Dewi Kusuma','Green Tower Lt. 20, Jakarta Selatan','Green Energy Solutions menyediakan solusi energi terbarukan komprehensif mulai dari konsultasi, instalasi panel surya, hingga maintenance untuk sektor industri dan komersial. Komitmen kami terhadap keberlanjutan membantu perusahaan mengurangi carbon footprint sekaligus menekan biaya energi.',NULL,NULL,'[\"Panel Surya Premium\",\"Konsultasi Energi\",\"Maintenance 24\\/7\",\"ROI Calculator\",\"Carbon Credit Trading\"]','https://energihijau.co.id/','contact@energihijau.co.id','+62 21 555 0202','\"products\\/HEpDAymaCmdfcv6loDG8OTRQRLhFhvZZm7ebeAjx.jpg\"','[\"products\\/HEpDAymaCmdfcv6loDG8OTRQRLhFhvZZm7ebeAjx.jpg\",\"products\\/kkXXpVGjXzeoV8sgYXBgqGOTZtHURLMx2FlfoNys.jpg\"]','2026-05-14 04:04:12','2026-05-24 02:23:48',NULL,NULL,NULL),(9,'published','[\"Technology\",\"Energi\"]','Engine Formula',NULL,NULL,'engine-formula','PT Muna One','Muna',NULL,'Formula 1 v12 engine jegerrrrrr',NULL,NULL,'[\"Oil\",\"Power\"]','https://jayamandirikertas.com/','muunaell@gmail.com','082125483805','\"products\\/pX93UZycM4FKoPYngx6tydWCrD3RmdHKUN0Y8Xw7.jpg\"','[\"products\\/pX93UZycM4FKoPYngx6tydWCrD3RmdHKUN0Y8Xw7.jpg\"]','2026-05-19 01:04:33','2026-07-10 04:35:00',NULL,NULL,NULL),(10,'published','[\"Technology\",\"Properti\"]','Max Verstappen Helmet',NULL,NULL,'max-verstappen-helmet','Formula 1','Nael',NULL,'Lorem ipsum dolor sit amet',NULL,NULL,'[\"Hardcover\",\"Signature\"]','https://jayamandirikertas.com/','muunaell@gmail.com','082125483805','\"products\\/O8Wm6MjWBzpxk5S5n6ygMPYdFqw9E5mYso1ULtV7.jpg\"','[\"products\\/O8Wm6MjWBzpxk5S5n6ygMPYdFqw9E5mYso1ULtV7.jpg\",\"products\\/py7xsxuYadz6skVBVWqxhTnCqKuxXiQPeQuMm11D.jpg\",\"products\\/oW3JArcLeHNP7cTSpYkljjjh9PG0v9vi5OgCaDge.jpg\"]','2026-05-19 01:05:57','2026-07-10 04:35:27',NULL,NULL,NULL),(11,'published','[\"Engineering\",\"Manufaktur\"]','Redbull Helmet',NULL,NULL,'redbull-helmet','PT RBAT','Nael Verstappen','Pacific Place Lt. 42, Jakarta','Redbull Advanced Helmet Max Version',NULL,NULL,'[\"strong\",\"unique\",\"hard\"]','https://jayamandirikertas.com/','muunaell@gmail.com','+62 21 555 0202','\"products\\/Z4hqs43cxb9GrJapO5ZhgNVdLr8nXwiFP4uQ1XBA.jpg\"','[\"products\\/Z4hqs43cxb9GrJapO5ZhgNVdLr8nXwiFP4uQ1XBA.jpg\"]','2026-06-16 12:44:30','2026-06-16 12:44:30',NULL,NULL,NULL),(12,'published','[\"Engineering\",\"Energi\"]','Redbull Engine',NULL,NULL,'redbull-engine','Redbull Advanced Tech','Nael Muna','Jl. Sudirman Kav. 52, Jakarta','lorme isusvnieun',NULL,NULL,'[\"engine\",\"fast\"]','https://industricerdas.co.id','muunaell@gmail.com','+62 21 555 0505','\"products\\/4du52COBy1EKwl4GnzaqphikSPaijSgkI6ZyySXR.jpg\"','[\"products\\/4du52COBy1EKwl4GnzaqphikSPaijSgkI6ZyySXR.jpg\",\"products\\/KvRAzKDWIzZaifUCQdgqsR2tCbxD1ry9UJ6eZQr4.jpg\"]','2026-06-16 12:48:07','2026-06-18 07:08:12',NULL,NULL,NULL),(13,'published','[\"Manufaktur\"]','Car Ride',NULL,NULL,'car-ride','PT Evanji','Akasyah','Green Tower Lt. 20, Jakarta Selatan','lorem ipsum',NULL,NULL,'[\"Machine\",\"Ban\"]','https://propertiprima.co.id/','bendahara@gmail.com','+62 21 555 0505','\"products\\/02gFMtXOQ5X34OxK2dzFTky7MpUdCRVyyb9woijC.jpg\"','[\"products\\/02gFMtXOQ5X34OxK2dzFTky7MpUdCRVyyb9woijC.jpg\"]','2026-06-17 02:17:26','2026-06-17 02:17:26',NULL,NULL,NULL),(14,'published','[\"Energi\"]','dsvwe',NULL,NULL,'dsvwe','aefve','wevas','Jl. Sudirman Kav. 52, Jakarta','sdverva',NULL,NULL,'[\"cvesc\",\"ewcfqevqe\"]','https://energihijau.co.id/','bendahara@gmail.com','+62 21 555 0202','\"products\\/1T37ySRzOiGGU6rsENrhbI2V9ys6lZqxGQ0CP8MF.jpg\"','[\"products\\/1T37ySRzOiGGU6rsENrhbI2V9ys6lZqxGQ0CP8MF.jpg\"]','2026-06-18 07:09:46','2026-06-18 07:16:11','2026-06-18 07:16:11',NULL,NULL),(15,'published','[\"Energi\"]','Solar Powered',NULL,NULL,'solar-powered','PT Jaya Mandiri','Muna','Pacific Place Lt. 42, Jakarta','lorem ipsum dolor sit amet',NULL,NULL,'[\"sustainable\",\"storng\",\"long-terms\"]','https://propertiprima.co.id/','admin@gmail.com','+62 21 555 0404','\"products\\/jJG8qviCGo8sxcYqouWBgqSE4jaeSp8qT4zPATng.jpg\"','[\"products\\/jJG8qviCGo8sxcYqouWBgqSE4jaeSp8qT4zPATng.jpg\"]','2026-06-27 06:35:17','2026-06-27 06:35:17',NULL,NULL,NULL),(16,'published','[\"Engineering\",\"Technology\"]','Robot arm Industry',NULL,NULL,'robot-arm-industry','PT Abadi','Nasyafatah Ilham','Jl. Sudirman Kav. 52, Jakarta','Arm robot dengan bobot 50 gram yang berfungsi mengangkat barang serta sorter belt yang memsortarisasi product sesuai code dari product tapi sensor ini mendeteksi color jadi dia sorter product berdasarkan warna dari box product',NULL,NULL,'[\"Strong\",\"Solar Power\"]','https://industricerdas.co.id','naell@gmail.com','+62 21 555 0303','\"products\\/9HQmjQI7fC98ihguaQ1nHIoa7g26gOrVThVWABGQ.jpg\"','[\"products\\/9HQmjQI7fC98ihguaQ1nHIoa7g26gOrVThVWABGQ.jpg\"]','2026-07-09 22:26:54','2026-07-09 22:26:54',NULL,NULL,NULL),(17,'published','[\"Manufaktur\",\"Properti\"]','Shanghai Sky Building',NULL,NULL,'shanghai-sky-building','PT Shin','Meimei','Green Tower Lt. 20, Jakarta Selatan','Shanghai tech company, estate in shanghai boost your property',NULL,NULL,'[\"Cool\",\"Awesome\"]','https://propertiprima.co.id/','admin@gmail.com','+62 21 555 0202','\"products\\/tFeTkZwF2B8WAQixz0bPvckb2zIII5SL5umfcAol.jpg\"','[\"products\\/tFeTkZwF2B8WAQixz0bPvckb2zIII5SL5umfcAol.jpg\",\"products\\/CeSQHwxpMqq85h5e9kGuWWpyxa0trIBFjea3i76c.jpg\"]','2026-07-09 22:30:14','2026-07-09 22:30:14',NULL,NULL,NULL),(18,'published','[\"Fintech\",\"Properti\"]','Jewerly Cat',NULL,NULL,'jewerly-cat','PT Cahaya Surga','Devi Sudiyah','Green Tower Lt. 20, Jakarta Selatan','lksjieomaknceio ajdnvuoeonuefbnaioeh f cejbcaniose aioeksaco;e haveoihvoajivih echieho iaheoihj sn',NULL,NULL,'[\"100 Diamond\",\"Water Resist\"]','https://industricerdas.co.id','bendahara@gmail.com','+62 21 555 0202','\"products\\/MtkK9qb5WLjUa8xuhJ0ompArqibnicIyooKZyH4U.jpg\"','[\"products\\/MtkK9qb5WLjUa8xuhJ0ompArqibnicIyooKZyH4U.jpg\"]','2026-07-10 04:34:35','2026-07-10 04:34:35',NULL,NULL,NULL);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('0gIMFi0cs9KzDOti7YYcKdJZX2xHnLPimJp8mar6',1,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36','eyJfdG9rZW4iOiJRWXdkUzZDaUJLZ1B2NVdZV0t0UEt3ZkFmMHg2M2g3djJwaXVHbG04IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzAuMC4wLjA6ODAwMFwvZGFzaGJvYXJkIiwicm91dGUiOiJkYXNoYm9hcmQifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI6MX0=',1785501920),('29WvQY3Alljph8m7fOe0MFVCIXURIduKZkGDq8eW',1,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36','eyJfdG9rZW4iOiJlNUhNMG82eXljVFdiazJFQ3BMR1NTREM2WmRTUlEzQmlXeVRNWmN4IiwibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiOjEsIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfSwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9tZWRpYT9zdGF0dXM9cHVibGlzaGVkIiwicm91dGUiOiJtZWRpYSJ9fQ==',1783665150),('2O1vHw9RWxS1YpXGDQqpmyHr8nnnTpmNC8HgYpnF',1,'::1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36','eyJfdG9rZW4iOiIwQzNWOThETlNYcjdtSERMRVRKQ3BuQjlCa0hZV0hEa3l0cEsyRHFYIiwibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiOjEsIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfSwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2xvY2FsaG9zdDo4MDAwXC9zcG9uc29yZWQtYmFubmVyIiwicm91dGUiOiJzcG9uc29yZWQtYmFubmVyIn19',1784697697),('34W2jVPECliFAmTEr6aJ7EqbttPZ1jIsCatuN7nj',NULL,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36','eyJfdG9rZW4iOiJBaE0wWnVvTng0YUZxWjBudFp1cmRvVFh3THExSEtjWHVGZHFQdkZqIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9zaWduaW4iLCJyb3V0ZSI6ImxvZ2luIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=',1784007763),('3UQICwYcu1blllmW1x4wMPG9QwGLFqTpm58tvwo8',NULL,'::1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36','eyJfdG9rZW4iOiJmYXRlT0tPSmJBbEpxeUM3QkF2czFCVnVCbHFucVE5dUFWZmVUa2xxIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2xvY2FsaG9zdDo4MDAwXC9zaWduaW4iLCJyb3V0ZSI6ImxvZ2luIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=',1784697496),('5OfpfH7FUpJt4jtsuOMWxqSUYfytRAhnejEj5lDE',1,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36','eyJfdG9rZW4iOiJxdnJhVDhOdFpuQ0gwdEV3clFIemxHZFBiMzdZZnJSZWdVY3hBd1dIIiwidXJsIjpbXSwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9kYXNoYm9hcmQiLCJyb3V0ZSI6ImRhc2hib2FyZCJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX0sImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjoxfQ==',1784695728),('6I2xW2hEiGuSsSa2RCRwtVyv1FRmUaZXp8Y1C8UC',1,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36','eyJfdG9rZW4iOiJ5eG1VYUpvUFlVb0YxeGFQcU1BOHB4Qkx2dWZXSEJmaGYybDA0YWMxIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9kYXNoYm9hcmQiLCJyb3V0ZSI6ImRhc2hib2FyZCJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX0sImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjoxfQ==',1784191855),('8dIQgJsfVChEehCF8o8P3RZcmf633z92AmzjbMjZ',1,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36','eyJfdG9rZW4iOiJhR1I4YXNnOVVabUFVZGdVQ0FqU3NpaHZVYUQwdENoNmt0TGh0VDFKIiwidXJsIjpbXSwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9tZWRpYS1wYXJ0bmVyIiwicm91dGUiOiJtZWRpYS1wYXJ0bmVyIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfSwibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiOjF9',1783635574),('8mApkR6mN71CkAo4bJu3pAMUCtf9HluCQhG56kvT',1,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36','eyJfdG9rZW4iOiJNMDFWSkh5M282a0NXbmFiY1NKTmxyTWJ0Vml2UGFTMWk3c1VkZFh1IiwidXJsIjpbXSwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9jc3JmLXRva2VuLXJlZnJlc2giLCJyb3V0ZSI6bnVsbH0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfSwibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiOjF9',1784304335),('8waEfK8jYR7uvwuDuAlntATwOjFpUT7zsnVfhxwN',1,'::1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36','eyJfdG9rZW4iOiJNQkdkcDk4VVJvMFhDbjBQQWdJR2NwbnpQczBCUlpLa2Q2Q29xWVBCIiwidXJsIjpbXSwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2xvY2FsaG9zdDo4MDAwXC9zcG9uc29yZWQtYmFubmVyIiwicm91dGUiOiJzcG9uc29yZWQtYmFubmVyIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfSwibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiOjF9',1784703316),('9mvict8vegH0Go99QKT4e5w6kpTWIdsbZc70ZOfE',1,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36','eyJfdG9rZW4iOiJRYU5UaWlYQm9QRXozaTNudWFtdzhDNGgyYVZuUkhHeVVBcDBWb1NUIiwidXJsIjpbXSwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9tZWRpYS1wYXJ0bmVyP3N0YXR1cz1wdWJsaXNoZWQiLCJyb3V0ZSI6Im1lZGlhLXBhcnRuZXIifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI6MX0=',1783635679),('9Ru0CglzeSZbAdDyc8v5ASBvH411zx7E2EXcWkGZ',NULL,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36','eyJfdG9rZW4iOiJXSmozUGRRNHZ3eTU3WXR5d2Zwa29LeU81aUpiMmFIZDNkbE9MMHFkIiwidXJsIjp7ImludGVuZGVkIjoiaHR0cDpcL1wvMTI3LjAuMC4xOjgwMDBcL2NzcmYtdG9rZW4tcmVmcmVzaCJ9LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cDpcL1wvMTI3LjAuMC4xOjgwMDBcL3NpZ25pbiIsInJvdXRlIjoibG9naW4ifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==',1783666952),('A8neqFhG2KeOzi735HQb937Dc8Cqq7HGeGllRPos',NULL,'::1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36','eyJfdG9rZW4iOiIyNTNuSVBpckRXTU9yZHdjWGdENFE0VTA5MGx0aGpnOXFiYTVSUnJEIiwidXJsIjp7ImludGVuZGVkIjoiaHR0cDpcL1wvbG9jYWxob3N0OjgwMDBcL2NzcmYtdG9rZW4tcmVmcmVzaCJ9LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cDpcL1wvbG9jYWxob3N0OjgwMDBcL3NpZ25pbiIsInJvdXRlIjoibG9naW4ifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==',1784701298),('Bu87MhrshFNpEl62EA02kTHOpmMPy6bOjff5Nn4i',1,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36','eyJfdG9rZW4iOiJ3ajBjcVJvaGs5aHZXMkhGanpRbXpWZTE5MWlXV0QxclB3YkhjRmpaIiwidXJsIjpbXSwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9wcm9kdWN0Iiwicm91dGUiOiJwcm9kdWN0LmluZGV4In0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfSwibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiOjF9',1783636014),('dVOmzgoFT4GSEli61TGgtlNHzVKFnB9ySYA9SfVj',1,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36','eyJfdG9rZW4iOiI3OFR1YUpXSmhsTmNwdlpLWFhNMFBHWERlT3NlZlZLakltQktpZkdFIiwibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiOjEsIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfSwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9kYXNoYm9hcmQiLCJyb3V0ZSI6ImRhc2hib2FyZCJ9fQ==',1783657819),('EjOhYfQ88YnGRTDQBJJOGI4AFjKRGMZTK3FCwRbm',NULL,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36','eyJfdG9rZW4iOiJSUmx1Q1NyUFE3clBGdFhIa21VdGFad1R6T2p2OXFMYWo4dVFwMG90IiwidXJsIjp7ImludGVuZGVkIjoiaHR0cDpcL1wvMTI3LjAuMC4xOjgwMDBcL2NzcmYtdG9rZW4tcmVmcmVzaCJ9LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cDpcL1wvMTI3LjAuMC4xOjgwMDBcL3NpZ25pbiIsInJvdXRlIjoibG9naW4ifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==',1784131415),('eTpwlQLhqXYMj2T4udKbfBIcXRMUN1ai0DV8ujxy',1,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36','eyJfdG9rZW4iOiJXNXoxdnVNSW5YcWpldWo1MTJqTGRYc3I0U01IUGI5c1FNS0NOVUNxIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9jc3JmLXRva2VuLXJlZnJlc2giLCJyb3V0ZSI6bnVsbH0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfSwibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiOjF9',1784695405),('F7ooadCrgAbVS85JNw4lkAIUnzXzmonU5OpMSGri',NULL,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36','eyJfdG9rZW4iOiJFSXplM3FYTGY5Q0NiMFNTeWRkdTc3aGlDa3dpMUFqUTlrcXZvOWNrIiwidXJsIjp7ImludGVuZGVkIjoiaHR0cDpcL1wvMTI3LjAuMC4xOjgwMDBcL2Rhc2hib2FyZCJ9LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cDpcL1wvMTI3LjAuMC4xOjgwMDBcL3NpZ25pbiIsInJvdXRlIjoibG9naW4ifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==',1784191747),('fekYtOfoCoP9lRqlG68zt4QwGusuF0547bQBRpF6',1,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36','eyJfdG9rZW4iOiJMYzZ5ZnRENFFyeWJadDdqZFJYam9PYkFpbHRVS1A3YU9KSlpxZlExIiwibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiOjEsIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfSwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9zdWJzY3JpcHRpb24iLCJyb3V0ZSI6InN1YnNjcmlwdGlvbi5pbmRleCJ9fQ==',1783673588),('gFxsL3kJvN1TcWsBUqEAgbl2IFHugLZcv3KNyKIH',1,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36','eyJfdG9rZW4iOiJ3dnFlUWdSd3Z1Q0xpU3VpMGI1bXFHQkhLbTdkU1g2Q1RrT20wWFh1IiwidXJsIjpbXSwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9kYXNoYm9hcmQiLCJyb3V0ZSI6ImRhc2hib2FyZCJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX0sImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjoxfQ==',1784132912),('GKGZwwFaWw3SqHnzs0fD5L5HFiTNiszV8CfBMhow',NULL,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36','eyJfdG9rZW4iOiJrMm1iUjBFQklaQUhlZ2hjamFaU0ZpVmZPOUh3WmhPOTFnT2ZwazhOIiwidXJsIjp7ImludGVuZGVkIjoiaHR0cDpcL1wvMTI3LjAuMC4xOjgwMDBcL21lZGlhIn0sIl9wcmV2aW91cyI6eyJ1cmwiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvc2lnbmluIiwicm91dGUiOiJsb2dpbiJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19',1783634917),('icQLI5vM03B3aEpSmMMyekmeoZMkQnbjYvQtrplz',1,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36','eyJfdG9rZW4iOiI0cW44WHZkSUk5Z2dYUEozVk5mOGE4SFNEeUloYzJsVmVRam5Zem1IIiwidXJsIjpbXSwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9wcm9kdWN0Iiwicm91dGUiOiJwcm9kdWN0LmluZGV4In0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfSwibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiOjF9',1783636214),('Itg3Cfxt1z1xgWe3NlO9kRh3UnUuklhwu5DkxVpz',NULL,'::1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36','eyJfdG9rZW4iOiJhcjIzaWxzSGRjemRVOElFVVI0SWhCSjJKcWIyaWY2QUJ5MVhpbjdKIiwidXJsIjp7ImludGVuZGVkIjoiaHR0cDpcL1wvbG9jYWxob3N0OjgwMDBcL2NzcmYtdG9rZW4tcmVmcmVzaCJ9LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cDpcL1wvbG9jYWxob3N0OjgwMDBcL3NpZ25pbiIsInJvdXRlIjoibG9naW4ifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==',1784713499),('izrVjUJ1i1P92SiUj8oAjDBonMB511hP17eK7Z76',NULL,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36','eyJfdG9rZW4iOiJsNjczaFIyTDFGMXdaOHNHRGJYSWE5NXAzS0lCRmxoMlVTQjZkSFExIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9zaWduaW4iLCJyb3V0ZSI6ImxvZ2luIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=',1785311553),('jgtZniFfSHJfx1lFgKQI8lRhUS36viw6zgLs1cNo',NULL,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36','eyJfdG9rZW4iOiJyTEFLTmVsRDB3eURLTGhweTZrc3pRc21sdzdUbkx2UUxkeXQ3SUhnIiwidXJsIjp7ImludGVuZGVkIjoiaHR0cDpcL1wvMTI3LjAuMC4xOjgwMDBcL3Byb2R1Y3QifSwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9zaWduaW4iLCJyb3V0ZSI6ImxvZ2luIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=',1783663609),('LOqNAlTQA756IOsX6oY1ivI3qstxsR9RBzZJoJSo',NULL,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36','eyJfdG9rZW4iOiJiQW5GeU1FaGJWQnByYmtFQzRRWWo5SUhVcTVDYzdMOU95UU9DVWxMIiwidXJsIjp7ImludGVuZGVkIjoiaHR0cDpcL1wvMC4wLjAuMDo4MDAwXC9jc3JmLXRva2VuLXJlZnJlc2gifSwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzAuMC4wLjA6ODAwMFwvc2lnbmluIiwicm91dGUiOiJsb2dpbiJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19',1785503722),('n3nFu8qK6L9NoYOuVGbUCB47Xikhnatd93JOzDkI',NULL,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36','eyJfdG9rZW4iOiJ4RFF5V3JnZ0t4WGhwQUwyVjJDbjRsakFtd0d4cktyZjlhbTA1OWpBIiwidXJsIjp7ImludGVuZGVkIjoiaHR0cDpcL1wvMTI3LjAuMC4xOjgwMDBcL2NzcmYtdG9rZW4tcmVmcmVzaCJ9LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cDpcL1wvMTI3LjAuMC4xOjgwMDBcL3NpZ25pbiIsInJvdXRlIjoibG9naW4ifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==',1784208068),('noC3jc92ddIwHztMnkY39ZMrwCoKyIGfuFSHXe8f',1,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36','eyJfdG9rZW4iOiJkWFVMSEd5OXlyeTFVZk9MTWhQRGhJT25NNGplS2JWVVI2TlBENnpPIiwidXJsIjpbXSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cDpcL1wvMTI3LjAuMC4xOjgwMDBcL21lZGlhLXBhcnRuZXI/c3RhdHVzPXB1Ymxpc2hlZCIsInJvdXRlIjoibWVkaWEtcGFydG5lciJ9LCJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI6MX0=',1783635713),('O6tUnozKoCvTjlZFseIu7Hq7JwiSHuU11a7j4cub',1,'::1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36','eyJfdG9rZW4iOiJNRWtIMFpjdlVKd3ZNWFlQNUdDSFJHb0ZWNzZEcEhPcE9vclcxRnlpIiwidXJsIjpbXSwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2xvY2FsaG9zdDo4MDAwXC9zcG9uc29yZWQtYmFubmVyIiwicm91dGUiOiJzcG9uc29yZWQtYmFubmVyIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfSwibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiOjF9',1784708097),('o7EIFWf142RqEmhUeU7dEAV9VuTxXM3Y1GpWeddH',NULL,'127.0.0.1','curl/8.7.1','eyJfdG9rZW4iOiJ1cFVqM3FZRHpOZzZGV2FlMktqbFRTUHNyVXV3RjRtcTBzR0RrNXpQIiwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==',1785222069),('OEdlGSLruDwG4JKAbM7JL8Bl0IT4MPumcikVkucS',1,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36','eyJfdG9rZW4iOiJ4TVN2NkpjQ3N0RXJMcm9tbDF4NW5kNjNLV1pUUXU1ZllSV2ZEVTZKIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9kYXNoYm9hcmQiLCJyb3V0ZSI6ImRhc2hib2FyZCJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX0sImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjoxfQ==',1783635136),('oFa9ytOdNpHYf8Iqf62MIMCrcfFncTdYUwZlosf5',1,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36','eyJfdG9rZW4iOiJ4R1B4MUtjUlVmMjdwOFJPUUZrNXBjM0toT3FSNkpYNFpxbXNINEZtIiwidXJsIjpbXSwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9wcm9kdWN0Iiwicm91dGUiOiJwcm9kdWN0LmluZGV4In0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfSwibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiOjF9',1783658127),('PNemWd7p6GlSaCCi2Fewl52kTWfdfdaDhMYlkq6k',NULL,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36','eyJfdG9rZW4iOiJNa1Z0YnhuUFd1VHp2RzR2T1hjbkdrVEVSWHQxS3N4U3EzOHRFc3ltIiwidXJsIjp7ImludGVuZGVkIjoiaHR0cDpcL1wvMTI3LjAuMC4xOjgwMDBcL2NzcmYtdG9rZW4tcmVmcmVzaCJ9LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cDpcL1wvMTI3LjAuMC4xOjgwMDBcL3NpZ25pbiIsInJvdXRlIjoibG9naW4ifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==',1784134713),('qF75K6pBnXc2zQyWlbkmA70Mh1JhfKdY1mWP7Eff',1,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36','eyJfdG9rZW4iOiJ1ekFFNUlUV3hjanU3anVPZ2JMaFJnN3V1MUEwNnU2QWtHTzR4RGRXIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9kYXNoYm9hcmQiLCJyb3V0ZSI6ImRhc2hib2FyZCJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX0sImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjoxfQ==',1784122414),('RANUzTW0Bt0DGVGq3NvIRyLS4LisZfp9bev9H0vl',1,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36','eyJfdG9rZW4iOiJUcm5rR20zaFkxU2hhODFGVUw1M3RvcXlqMUdXYnY0QUtId1lvZW0xIiwidXJsIjpbXSwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9wcm9kdWN0Iiwicm91dGUiOiJwcm9kdWN0LmluZGV4In0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfSwibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiOjF9',1783657832),('RQYxPM7e5yG1w0ZxMa9VXhtMtxaLocd044F54qB7',NULL,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36','eyJfdG9rZW4iOiIxcTIxTFR3bFViRWcxYkZ3M2pFNVBKZGQ1UGQ3TDVBVmRjOXdlWkNpIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9zaWduaW4iLCJyb3V0ZSI6ImxvZ2luIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=',1785222098),('rraRd6ylRF1Jn8nI4LKNGGg6zLCo4COh7RG2xd97',NULL,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36','eyJfdG9rZW4iOiJEa09UbWNvcXM4Z3ZvZ1ZWWldtUjZ2bE11TnFiQXkwendFWnRqbEtIIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzAuMC4wLjA6ODAwMFwvc2lnbmluIiwicm91dGUiOiJsb2dpbiJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19',1785222174),('TjM2ADUVcJHMflSro9iConCcjpnfi7Jl6bMq3N7R',1,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36','eyJfdG9rZW4iOiJBMW1zOHRaNjk3OHNMbjNxaUNMQmRaRUlYbVRpRG5DV0UxWjRRdzdYIiwidXJsIjpbXSwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9kYXNoYm9hcmQiLCJyb3V0ZSI6ImRhc2hib2FyZCJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX0sImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjoxfQ==',1784132480),('TKsNgzkLebW38Cw0IPk2M5wTiuKbdSXmXvBLQSrS',NULL,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36','eyJfdG9rZW4iOiJINklON1piR1RER1F2YnJ3WWE5RFJMUmpYUEdnaFZ4ZGFnY2d6bnJrIiwidXJsIjp7ImludGVuZGVkIjoiaHR0cDpcL1wvMTI3LjAuMC4xOjgwMDBcL2Rhc2hib2FyZCJ9LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cDpcL1wvMTI3LjAuMC4xOjgwMDBcL3NpZ25pbiIsInJvdXRlIjoibG9naW4ifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==',1783672174),('u7OF69fA9LwGlAsttLbVHG32RqLNqAQDoEDu1qwa',NULL,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36','eyJfdG9rZW4iOiJrV1ZsWWNydTdmeTV5ZUFvR243QU5EaUU0dmR1Q3dXb24yU1pvd2ZkIiwidXJsIjp7ImludGVuZGVkIjoiaHR0cDpcL1wvMTI3LjAuMC4xOjgwMDBcL3Byb2R1Y3QifSwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9zaWduaW4iLCJyb3V0ZSI6ImxvZ2luIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=',1783657806),('uiTvZijQ20VRjOOxi5uFff7KVdZ36r46mLTnoZrH',NULL,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36','eyJfdG9rZW4iOiJWa3YxTW9LSjk5U0lDY1piTU04QW1Panp6V0RDZlVWSTJoSUQxakRSIiwidXJsIjp7ImludGVuZGVkIjoiaHR0cDpcL1wvMTI3LjAuMC4xOjgwMDBcL2NzcmYtdG9rZW4tcmVmcmVzaCJ9LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cDpcL1wvMTI3LjAuMC4xOjgwMDBcL3NpZ25pbiIsInJvdXRlIjoibG9naW4ifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==',1784126015),('vSs2TxxdfSirm5Lo28bi8UIa8Y9nIFoeGOLY8uHV',NULL,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36','eyJfdG9rZW4iOiJsemwxWXc1ZVdwVEJmemJZaFIyY25ZNTJWZ2xHNjhLMElsaWszMzY5IiwidXJsIjp7ImludGVuZGVkIjoiaHR0cDpcL1wvMTI3LjAuMC4xOjgwMDBcL2NzcmYtdG9rZW4tcmVmcmVzaCJ9LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cDpcL1wvMTI3LjAuMC4xOjgwMDBcL3NpZ25pbiIsInJvdXRlIjoibG9naW4ifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==',1784124215),('VXxFdmpDEnIf3P07vdUYPtZvu4lGsb77E6hhOHif',1,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36','eyJfdG9rZW4iOiI5UzY0NFpLYXVRODVLbDQ4NURiYzR6YU9HZ1Z2aUtnRkZHWjBTUnk2IiwidXJsIjpbXSwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9kYXNoYm9hcmQiLCJyb3V0ZSI6ImRhc2hib2FyZCJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX0sImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjoxfQ==',1784696298),('x0FLHhHwhbRM0mKv0DZOLdJ3EeMU2bhiHRoaKrxl',1,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36','eyJfdG9rZW4iOiJVdXBmZ3dZSklGekxRdHJqRHhtYmVIdEF1UkI4aExBSjBQdkNuamIzIiwidXJsIjpbXSwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9kYXNoYm9hcmQiLCJyb3V0ZSI6ImRhc2hib2FyZCJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX0sImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjoxfQ==',1783635748),('XTQApN1mAeJpHbtaYY4hxv2irNxwzuAQoD2DB3xJ',NULL,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36','eyJfdG9rZW4iOiJaYU9QcDhGQVdkNlBOQ1l3ZWZDREZ5b1NOaTNHSTRLV3l6YmkxSFZZIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2xvY2FsaG9zdDo4MDAwXC9zaWduaW4iLCJyb3V0ZSI6ImxvZ2luIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=',1784192699);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sponsored_banners`
--

DROP TABLE IF EXISTS `sponsored_banners`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sponsored_banners` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL DEFAULT '728x90',
  `link_sponsored` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `is_forever` tinyint(1) NOT NULL DEFAULT 0,
  `impressions` int(11) NOT NULL DEFAULT 0,
  `status` varchar(255) NOT NULL DEFAULT 'published',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sponsored_banners`
--

LOCK TABLES `sponsored_banners` WRITE;
/*!40000 ALTER TABLE `sponsored_banners` DISABLE KEYS */;
INSERT INTO `sponsored_banners` VALUES (1,'KEMEN','sponsored-banners/ilbPeyHWzqg2fTib59Q1ntVsJjOyTHYDisBwqHfO.jpg','728x90','https://www.base64-image.de/','2026-07-17','2026-07-18',1,0,'published','2026-07-17 07:38:25','2026-08-23 09:43:43',NULL),(2,'GMMC WWDC','sponsored-banners/HBi4NzMgfrT74UYhWTSIxMs7FMcCpUvsxn9YZIvO.jpg','970x250','https://jdih.kemenpora.go.id/','2026-07-22','2026-07-25',1,0,'published','2026-07-22 05:21:37','2026-08-23 09:43:43',NULL),(3,'KEMEN','sponsored-banners/HNuVPPtHBzGSslyX3TE6DRDfpSnBHKKZRuCthEY0.jpg','336x280','https://jdih.kemenpora.go.id/','2026-07-22','2026-07-23',1,0,'published','2026-07-22 06:55:16','2026-08-23 09:43:43',NULL);
/*!40000 ALTER TABLE `sponsored_banners` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subscriptions`
--

DROP TABLE IF EXISTS `subscriptions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subscriptions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `industry` varchar(255) DEFAULT NULL,
  `business_model` varchar(255) DEFAULT NULL,
  `transaction_image` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'published',
  `sub_status` varchar(255) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subscriptions`
--

LOCK TABLES `subscriptions` WRITE;
/*!40000 ALTER TABLE `subscriptions` DISABLE KEYS */;
INSERT INTO `subscriptions` VALUES (1,'Member Ke-1','member1@example.com','081234567801','PT Sukses Jaya 1','Energi','Manager',NULL,'published','active','2026-06-18 04:05:57','2026-06-18 04:06:18'),(2,'Member Ke-2','member2@example.com','081234567802','PT Sukses Jaya 2','Manufaktur','Manager',NULL,'published','active','2026-06-18 04:05:57','2026-06-18 04:06:18'),(3,'Member Ke-3','member3@example.com','081234567803','PT Sukses Jaya 3','Energi','Manager',NULL,'published','active','2026-06-18 04:05:57','2026-06-18 04:06:18'),(4,'Member Ke-4','member4@example.com','081234567804','PT Sukses Jaya 4','FnB','Manager',NULL,'published','active','2026-06-18 04:05:57','2026-06-18 04:06:18'),(5,'Member Ke-5','member5@example.com','081234567805','PT Sukses Jaya 5','Manufaktur','Manager',NULL,'published','active','2026-06-18 04:05:57','2026-06-18 04:06:18'),(6,'Member Ke-6','member6@example.com','081234567806','PT Sukses Jaya 6','Energi','Manager',NULL,'published','active','2026-06-18 04:05:57','2026-06-18 04:06:18'),(7,'Member Ke-7','member7@example.com','081234567807','PT Sukses Jaya 7','Properti','Manager',NULL,'published','active','2026-06-18 04:05:57','2026-06-18 04:06:18'),(8,'Member Ke-8','member8@example.com','081234567808','PT Sukses Jaya 8','Fintech','Manager',NULL,'published','active','2026-06-18 04:05:57','2026-06-18 04:06:18'),(9,'Member Ke-9','member9@example.com','081234567809','PT Sukses Jaya 9','Software','Manager',NULL,'published','active','2026-06-18 04:05:57','2026-06-18 04:06:18'),(10,'Member Ke-10','member10@example.com','081234567810','PT Sukses Jaya 10','Software','Manager',NULL,'published','active','2026-06-18 04:05:57','2026-06-18 04:06:18'),(11,'Member Ke-11','member11@example.com','081234567811','PT Sukses Jaya 11','Manufaktur','Manager',NULL,'published','active','2026-06-18 04:05:57','2026-06-18 04:06:18'),(12,'Member Ke-12','member12@example.com','081234567812','PT Sukses Jaya 12','Properti','Manager',NULL,'published','active','2026-06-18 04:05:57','2026-06-18 04:06:18'),(13,'Member Ke-13','member13@example.com','081234567813','PT Sukses Jaya 13','Software','Manager',NULL,'published','active','2026-06-18 04:05:57','2026-06-18 04:06:18'),(14,'Member Ke-14','member14@example.com','081234567814','PT Sukses Jaya 14','Software','Manager',NULL,'published','active','2026-06-18 04:05:57','2026-06-18 04:06:18'),(15,'Member Ke-15','member15@example.com','081234567815','PT Sukses Jaya 15','FnB','Manager',NULL,'published','active','2026-06-18 04:05:57','2026-06-18 04:06:18'),(16,'Member Ke-16','member16@example.com','081234567816','PT Sukses Jaya 16','Properti','Manager',NULL,'published','active','2026-06-18 04:05:57','2026-06-18 04:06:18'),(17,'Member Ke-17','member17@example.com','081234567817','PT Sukses Jaya 17','FnB','Manager',NULL,'published','active','2026-06-18 04:05:57','2026-06-18 04:06:18'),(18,'Member Ke-18','member18@example.com','081234567818','PT Sukses Jaya 18','Fintech','Manager',NULL,'published','active','2026-06-18 04:05:57','2026-06-18 04:06:18'),(19,'Member Ke-19','member19@example.com','081234567819','PT Sukses Jaya 19','FnB','Manager',NULL,'published','active','2026-06-18 04:05:57','2026-06-18 04:06:18'),(20,'Member Ke-20','member20@example.com','081234567820','PT Sukses Jaya 20','Software','Manager',NULL,'published','active','2026-06-18 04:05:57','2026-06-18 04:06:18'),(21,'Nael Muna','naelmuna2009@gmail.com','082125483805','PT Muna Jaya','Teknologi','CEO',NULL,'published','active','2026-06-18 04:05:57','2026-06-18 04:06:18'),(22,'Azka Nisrin','azkanisrina@gmail.com','082125483805','PT Azka Rina','F&B / Retail','CTO',NULL,'published','active','2026-06-18 04:05:57','2026-06-18 04:06:18'),(23,'Budi Utomo','budiutomo@gmail.com','082125483805','PT Adidaya','Properti & Real Estate','CEO',NULL,'published','active','2026-06-18 04:05:57','2026-06-18 04:06:18'),(24,'Antonelli','antonelli@gmail.com','082125483805','PT Satu Dua','Healthcare','CEO',NULL,'published','active','2026-06-18 04:05:57','2026-06-18 04:06:18'),(25,'Azwa Khalisa','azwakhalisa@gmail.com','082125483805','PT Khalisa','Properti & Real Estate','CTO',NULL,'published','active','2026-06-18 04:05:57','2026-06-18 04:06:18'),(26,'Kimi Anton','kimitoni@gmail.com','082125483805','PT Antoni','Media & Entertainment','CTO',NULL,'published','active','2026-06-18 04:05:57','2026-06-18 04:06:18'),(27,'Pelangi Pagi','pelangi@gmail.com','082125483805','PT Pagi Sejahtera','Teknologi & Software','CEO',NULL,'published','active','2026-06-18 04:05:57','2026-06-18 04:06:18'),(28,'George Russel','georgerussel@gmail.com','082125483805','PT Russel','Energi & Resources','CEO',NULL,'published','active','2026-06-18 04:05:57','2026-06-18 04:06:18'),(29,'Diva','hanadiva@gmail.com','082125483805','PT Belok Kanan','Properti & Real Estate','CEO',NULL,'published','active','2026-06-18 04:05:57','2026-06-18 04:06:18'),(30,'HIlwa Ilham','hilwailham@gmail.com','082125483805','PT Biru Terang','F&B','CEO',NULL,'published','active','2026-06-18 04:05:57','2026-06-18 04:06:18'),(31,'Emiliana','emil@gmail.com','082125483805','PT Olivia','F&B','CEO',NULL,'published','active','2026-06-18 04:05:57','2026-06-18 04:06:18'),(32,'Raisa Amanda','raisa@gmail.com','082125483805','PT Coba Aja Dulu','Teknologi & Software','CEO',NULL,'published','active','2026-06-18 04:05:57','2026-06-18 04:06:18'),(33,'Tanzani Akasyah','tanzanini@gmail.com','082125483805','PT Akasyah','Properti & Real Estate','CEO',NULL,'published','active','2026-06-18 04:05:57','2026-06-18 04:06:18'),(34,'Toto Wolf','toto@gmail.com','082125483805','PT Wolfto','Media & Entertainment','CEO',NULL,'published','active','2026-06-18 04:05:57','2026-06-18 04:06:18'),(35,'Balqis Faiha','balqis@gmail.com','082125483805','PT Garasi Salwa','Retail & E-commerce','CEO',NULL,'published','active','2026-06-18 04:19:52','2026-06-18 04:19:52'),(36,'Dhia Nufah','dhianu@gmail.com','082125483805','PT Nufah','F&B','CEO',NULL,'trash','unactive','2026-06-18 04:49:35','2026-06-18 04:52:12');
/*!40000 ALTER TABLE `subscriptions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `testimonials`
--

DROP TABLE IF EXISTS `testimonials`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `testimonials` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `rating` int(11) NOT NULL DEFAULT 5,
  `status` enum('published','draft','archived') NOT NULL DEFAULT 'published',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `testimonials`
--

LOCK TABLES `testimonials` WRITE;
/*!40000 ALTER TABLE `testimonials` DISABLE KEYS */;
INSERT INTO `testimonials` VALUES (1,'Sarah Wijaya','Founder | PT Wijayanto','Joining acmi opens connecting to',5,'published','2026-06-18 06:20:52','2026-06-18 06:20:52',NULL),(2,'Nael Muna','CTO | PT Munajaya','ACMI Jaya jaya jaya',5,'published','2026-06-18 06:33:17','2026-06-18 06:33:17',NULL),(3,'Antonelli','Founder | PT Wijayanto','ACMI KEREN SANGAT. COCOK untuk bangsa agar dimajukan',5,'published','2026-06-27 06:34:18','2026-06-27 06:34:18',NULL),(4,'Nael Muna','CTO | PT Munajaya','ACMI membuat perusahaan tech saya terus berkembang',5,'published','2026-07-09 09:39:55','2026-07-09 09:39:55',NULL),(5,'Athaya','Founder | PT Devika','Asosiasi yang cocok untuk perusahaan berkembang, networking lancar dan mendapat materi serta seminar yang ga kalah seru',5,'published','2026-07-09 09:40:51','2026-07-09 09:40:51',NULL);
/*!40000 ALTER TABLE `testimonials` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Super Admin','superadmin@gmail.com','2026-05-04 20:31:19','$2y$12$F/i/S0XuVLNaIT21YtBwgud0523QauwBCwlGda.1Lw5CXiwJt/6E.',NULL,'2026-05-04 20:25:17','2026-05-04 20:31:19');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `website_views`
--

DROP TABLE IF EXISTS `website_views`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `website_views` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `page_url` varchar(255) DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `website_views`
--

LOCK TABLES `website_views` WRITE;
/*!40000 ALTER TABLE `website_views` DISABLE KEYS */;
/*!40000 ALTER TABLE `website_views` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-08-24 19:04:45
