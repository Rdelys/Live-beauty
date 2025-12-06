-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 06, 2025 at 08:54 AM
-- Server version: 8.3.0
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `original-studio`
--

-- --------------------------------------------------------

--
-- Table structure for table `achats`
--

CREATE TABLE `achats` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `modele_id` bigint UNSIGNED NOT NULL,
  `jetons` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'detail',
  `photo_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `achats`
--

INSERT INTO `achats` (`id`, `user_id`, `modele_id`, `jetons`, `created_at`, `updated_at`, `type`, `photo_path`) VALUES
(38, 9, 5, 0, '2025-11-30 13:17:49', '2025-11-30 13:17:49', 'album', 'gallery_photos/OKTi1ZhqY1khPhmjGCz8JwnYg3yBoT5X3v0S9zXM.jpg'),
(39, 9, 5, 0, '2025-11-30 13:17:49', '2025-11-30 13:17:49', 'album', 'gallery_photos/YZLyOUlBoi9o9w8JUKF7TEPlcogETBzMrqXQu6Hf.png'),
(40, 9, 5, 0, '2025-11-30 13:17:49', '2025-11-30 13:17:49', 'album', 'gallery_photos/hP2qQdCDseiW2BbjilLuXlTre2wqmJm6chtO5Nyr.png'),
(41, 9, 5, 0, '2025-11-30 13:17:49', '2025-11-30 13:17:49', 'album', 'gallery_photos/t7dJFP8uE8ugQ8KySt5Ndl1m0duzHUjNKlD2adLn.jpg'),
(42, 9, 5, 0, '2025-11-30 13:17:49', '2025-11-30 13:17:49', 'album', 'gallery_photos/A7z5GAWaJFM8Mmp7b5KdheYgvnv1PAJUHp40oRIz.jpg'),
(43, 9, 5, 0, '2025-11-30 13:17:49', '2025-11-30 13:17:49', 'album', 'gallery_photos/GUbIGwotODznIJliWDdQYkj31em7EHYFAJI3KdYG.png'),
(44, 9, 5, 0, '2025-11-30 13:17:49', '2025-11-30 13:17:49', 'album', 'gallery_photos/l1YUR2uIdSV4dG4WWRlsWyn1lDxXXhV4MWSAYcbo.jpg'),
(45, 9, 5, 25, '2025-11-30 13:19:23', '2025-11-30 13:19:23', 'detail', 'gallery_photos/OKTi1ZhqY1khPhmjGCz8JwnYg3yBoT5X3v0S9zXM.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'KarlAdmin', '$2y$12$l5RhTbok3hqc.NffkWypj.UOHpspxkAgYPGXSVanWOkEilJuxxl9y', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE `albums` (
  `id` bigint UNSIGNED NOT NULL,
  `modele_id` bigint UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `etat` enum('gratuit','payant') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'gratuit',
  `type_flou` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prix` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`id`, `modele_id`, `nom`, `etat`, `type_flou`, `prix`, `created_at`, `updated_at`) VALUES
(15, 5, 'Moi', 'payant', 'strong', 25.00, '2025-11-30 08:54:46', '2025-11-30 08:54:46');

-- --------------------------------------------------------

--
-- Table structure for table `chat_messages`
--

CREATE TABLE `chat_messages` (
  `id` bigint UNSIGNED NOT NULL,
  `live_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favoris`
--

CREATE TABLE `favoris` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `modele_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `films`
--

CREATE TABLE `films` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `modele_id` bigint UNSIGNED NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `minutes` int NOT NULL,
  `jetons` int NOT NULL,
  `type_envoi` enum('email','whatsapp') COLLATE utf8mb4_unicode_ci NOT NULL,
  `statut` enum('en_cours','envoye','termine') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en_cours',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `films`
--

INSERT INTO `films` (`id`, `user_id`, `modele_id`, `detail`, `minutes`, `jetons`, `type_envoi`, `statut`, `created_at`, `updated_at`) VALUES
(1, 9, 5, 'Film en business, nude', 10, 350, 'whatsapp', 'envoye', '2025-11-30 17:26:30', '2025-11-30 18:12:18'),
(2, 9, 5, 'test', 5, 250, 'whatsapp', 'en_cours', '2025-11-30 18:10:09', '2025-11-30 18:10:09'),
(3, 9, 5, 'test', 5, 250, 'whatsapp', 'envoye', '2025-11-30 18:11:11', '2025-11-30 18:13:14'),
(5, 9, 5, 'fsdfsdfsdf', 5, 250, 'whatsapp', 'en_cours', '2025-11-30 19:14:15', '2025-11-30 19:14:15');

-- --------------------------------------------------------

--
-- Table structure for table `films_descriptions`
--

CREATE TABLE `films_descriptions` (
  `id` bigint UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `films_descriptions`
--

INSERT INTO `films_descriptions` (`id`, `description`, `created_at`, `updated_at`) VALUES
(1, 'test  test', '2025-11-30 19:07:45', '2025-11-30 19:07:52'),
(3, 'fsdfsdfsdf', '2025-11-30 19:08:47', '2025-11-30 19:08:47'),
(4, 'fdsvdsvdsvd', '2025-11-30 19:08:51', '2025-11-30 19:08:51');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_photos`
--

CREATE TABLE `gallery_photos` (
  `id` bigint UNSIGNED NOT NULL,
  `modele_id` bigint UNSIGNED NOT NULL,
  `photo_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position_photo` int NOT NULL DEFAULT '0',
  `video_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payant` tinyint(1) NOT NULL DEFAULT '0',
  `prix` decimal(8,2) DEFAULT NULL,
  `type_flou` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `album_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gallery_photos`
--

INSERT INTO `gallery_photos` (`id`, `modele_id`, `photo_url`, `position_photo`, `video_url`, `payant`, `prix`, `type_flou`, `created_at`, `updated_at`, `album_id`) VALUES
(40, 5, 'gallery_photos/OKTi1ZhqY1khPhmjGCz8JwnYg3yBoT5X3v0S9zXM.jpg', 1, NULL, 1, 25.00, 'strong', '2025-11-30 08:55:17', '2025-11-30 08:55:17', 15),
(41, 5, 'gallery_photos/YZLyOUlBoi9o9w8JUKF7TEPlcogETBzMrqXQu6Hf.png', 2, NULL, 1, 25.00, 'strong', '2025-11-30 08:55:17', '2025-11-30 08:55:17', 15),
(42, 5, 'gallery_photos/hP2qQdCDseiW2BbjilLuXlTre2wqmJm6chtO5Nyr.png', 3, NULL, 1, 25.00, 'strong', '2025-11-30 08:55:17', '2025-11-30 08:55:17', 15),
(43, 5, 'gallery_photos/t7dJFP8uE8ugQ8KySt5Ndl1m0duzHUjNKlD2adLn.jpg', 4, NULL, 1, 25.00, 'strong', '2025-11-30 08:55:17', '2025-11-30 08:55:17', 15),
(44, 5, 'gallery_photos/A7z5GAWaJFM8Mmp7b5KdheYgvnv1PAJUHp40oRIz.jpg', 5, NULL, 1, 25.00, 'strong', '2025-11-30 08:55:17', '2025-11-30 08:55:17', 15),
(45, 5, 'gallery_photos/GUbIGwotODznIJliWDdQYkj31em7EHYFAJI3KdYG.png', 6, NULL, 1, 25.00, 'strong', '2025-11-30 08:55:17', '2025-11-30 08:55:17', 15),
(46, 5, 'gallery_photos/l1YUR2uIdSV4dG4WWRlsWyn1lDxXXhV4MWSAYcbo.jpg', 7, NULL, 1, 25.00, 'strong', '2025-11-30 08:55:18', '2025-11-30 08:55:18', 15);

-- --------------------------------------------------------

--
-- Table structure for table `historique_jetons`
--

CREATE TABLE `historique_jetons` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `modele_id` bigint UNSIGNED DEFAULT NULL,
  `nombre_jetons` int UNSIGNED NOT NULL,
  `type` enum('jeton_action','surprise') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'jeton_action',
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `historique_jetons`
--

INSERT INTO `historique_jetons` (`id`, `user_id`, `modele_id`, `nombre_jetons`, `type`, `description`, `created_at`, `updated_at`) VALUES
(5, 9, 5, 70, 'jeton_action', 'Fesse', '2025-11-30 15:52:51', '2025-11-30 15:52:51'),
(6, 9, 5, 5, 'surprise', 'Envoi d’une surprise 🎁', '2025-11-30 15:53:15', '2025-11-30 15:53:15'),
(7, 9, 5, 76, 'jeton_action', 'Test', '2025-11-30 15:55:57', '2025-11-30 15:55:57'),
(8, 9, 5, 10, 'surprise', 'Envoi d’une surprise 🎁', '2025-11-30 15:56:09', '2025-11-30 15:56:09'),
(9, 9, 5, 70, 'jeton_action', 'Fesse', '2025-11-30 16:12:24', '2025-11-30 16:12:24'),
(10, 9, 5, 70, 'jeton_action', 'Fesse', '2025-11-30 16:12:31', '2025-11-30 16:12:31'),
(11, 9, 5, 70, 'jeton_action', 'Fesse', '2025-11-30 16:12:34', '2025-11-30 16:12:34'),
(12, 9, 5, 76, 'jeton_action', 'Test', '2025-11-30 16:12:40', '2025-11-30 16:12:40'),
(13, 9, 5, 70, 'jeton_action', 'Fesse', '2025-11-30 16:12:49', '2025-11-30 16:12:49'),
(14, 9, 5, 70, 'jeton_action', 'Fesse', '2025-11-30 16:12:59', '2025-11-30 16:12:59'),
(15, 9, 5, 70, 'jeton_action', 'Fesse', '2025-11-30 16:17:16', '2025-11-30 16:17:16'),
(16, 9, 5, 70, 'jeton_action', 'Fesse', '2025-11-30 16:17:30', '2025-11-30 16:17:30'),
(17, 9, 5, 70, 'jeton_action', 'Fesse', '2025-11-30 16:17:36', '2025-11-30 16:17:36'),
(18, 9, 5, 70, 'jeton_action', 'Fesse', '2025-11-30 16:21:54', '2025-11-30 16:21:54'),
(19, 9, 5, 70, 'jeton_action', 'Fesse', '2025-11-30 16:21:56', '2025-11-30 16:21:56'),
(20, 9, 5, 70, 'jeton_action', 'Fesse', '2025-11-30 16:22:00', '2025-11-30 16:22:00'),
(21, 9, 5, 70, 'jeton_action', 'Fesse', '2025-11-30 16:22:22', '2025-11-30 16:22:22'),
(22, 9, 5, 70, 'jeton_action', 'Fesse', '2025-11-30 16:23:08', '2025-11-30 16:23:08');

-- --------------------------------------------------------

--
-- Table structure for table `historique_show_prives`
--

CREATE TABLE `historique_show_prives` (
  `id` bigint UNSIGNED NOT NULL,
  `show_prive_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `modele_id` bigint UNSIGNED NOT NULL,
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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jetons`
--

CREATE TABLE `jetons` (
  `id` bigint UNSIGNED NOT NULL,
  `jeton_propose_id` bigint UNSIGNED DEFAULT NULL,
  `jeton_propose_prise` tinyint(1) NOT NULL DEFAULT '0',
  `modele_id` bigint UNSIGNED DEFAULT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre_de_jetons` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jetons`
--

INSERT INTO `jetons` (`id`, `jeton_propose_id`, `jeton_propose_prise`, `modele_id`, `nom`, `description`, `nombre_de_jetons`, `created_at`, `updated_at`) VALUES
(1, NULL, 0, NULL, 'Poitrine', 'Bouge poitrine fortement', 20, '2025-06-29 06:01:19', '2025-06-29 06:01:19'),
(2, NULL, 0, NULL, 'Tete', 'Tete bouge', 50, '2025-07-26 17:36:13', '2025-07-26 17:36:13'),
(3, NULL, 0, NULL, 'Dauphin Elys', '555', 85, '2025-07-26 18:02:18', '2025-07-26 18:02:18'),
(4, NULL, 0, 2, 'Dauphin Elys', 'efafeaf', 124, '2025-07-26 18:03:48', '2025-07-26 18:03:48'),
(10, 2, 1, 5, 'Fesse', 'Montrer mon fesse', 70, '2025-10-18 17:16:30', '2025-10-18 17:16:30'),
(11, 3, 1, 5, 'Test', 'test', 76, '2025-11-23 05:15:05', '2025-11-23 05:15:05');

-- --------------------------------------------------------

--
-- Table structure for table `jetons_proposes`
--

CREATE TABLE `jetons_proposes` (
  `id` bigint UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `nombre_de_jetons` int NOT NULL DEFAULT '0',
  `prise` tinyint(1) NOT NULL DEFAULT '0',
  `inputs` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jetons_proposes`
--

INSERT INTO `jetons_proposes` (`id`, `nom`, `description`, `nombre_de_jetons`, `prise`, `inputs`, `created_at`, `updated_at`) VALUES
(2, 'Fesse', 'Montrer mon fesse', 70, 1, NULL, '2025-09-29 16:42:56', '2025-10-18 17:16:30'),
(3, 'Test', 'test', 76, 1, NULL, '2025-09-29 16:56:35', '2025-11-23 05:15:05'),
(4, 'Test25', 'test', 1000, 0, NULL, '2025-11-23 08:44:01', '2025-11-23 08:44:01');

-- --------------------------------------------------------

--
-- Table structure for table `lives`
--

CREATE TABLE `lives` (
  `id` bigint UNSIGNED NOT NULL,
  `modele_id` bigint UNSIGNED NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_06_28_100115_create_modeles_table', 1),
(6, '2025_06_29_072855_add_email_and_password_to_modeles_table', 2),
(7, '2025_06_29_085425_create_jetons_table', 3),
(8, '2025_06_29_140357_add_en_ligne_to_modeles_table', 4),
(9, '2025_06_29_143126_create_lives_table', 5),
(10, '2025_06_29_180015_create_users_table', 6),
(11, '2025_07_19_175830_add_en_live_to_modeles_table', 7),
(12, '2025_07_19_183435_add_en_live_to_modeles_table', 8),
(13, '2025_07_20_164404_add_last_token_payment_to_modeles_table', 9),
(14, '2025_07_25_182417_add_jetons_to_users_table', 10),
(15, '2025_07_26_150724_make_all_users_columns_nullable', 11),
(16, '2025_07_26_203059_modify_prix_column_in_jetons_table', 12),
(17, '2025_07_26_203231_rename_prix_column_in_jetons_table', 13),
(18, '2025_07_26_203332_rename_prix_column_in_jetons_table', 14),
(19, '2025_07_26_204441_add_modele_id_to_jetons_table', 15),
(20, '2025_07_27_200807_add_peer_id_to_modeles_table', 16),
(21, '2025_07_29_164450_create_messages_table', 17),
(22, '2025_07_29_185814_create_chat_messages_table', 18),
(23, '2025_08_09_141841_create_favoris_table', 19),
(24, '2025_08_09_144151_create_favoris_table', 20),
(25, '2025_08_09_154025_change_video_columns_to_json_in_modeles_table', 21),
(26, '2025_08_13_191018_add_banni_to_users_table', 22),
(27, '2025_08_15_183926_add_jetons_surprise_to_modeles_table', 23),
(28, '2025_08_19_163352_add_nombre_jetons_show_privee_to_modeles_table', 24),
(29, '2025_08_19_171413_add_duree_show_privee_to_modeles_table', 25),
(30, '2025_08_19_184449_create_shows_prives_table', 26),
(31, '2025_09_07_135921_add_live_fields_to_show_prives_table', 27),
(32, '2025_09_10_191943_add_infos_to_modeles_table', 28),
(33, '2025_09_10_193538_change_services_column_in_modeles_table', 29),
(34, '2025_09_14_145051_create_model_connections_table', 30),
(35, '2025_09_14_145203_create_user_token_histories_table', 30),
(36, '2025_09_14_150445_create_modele_historiques_table', 31),
(37, '2025_09_14_195948_add_is_active_and_room_key_to_show_prives_table', 32),
(38, '2025_09_16_220317_modify_show_prives_and_create_historique_table', 33),
(39, '2025_09_16_221242_create_historique_show_prives_table_and_modify_is_live_in_show_prives', 34),
(40, '2025_09_16_222655_update_show_prives_and_create_historique_table', 35),
(41, '2025_09_25_182925_add_blur_fields_to_modeles_table', 36),
(42, '2025_09_27_130516_create_achats_table', 37),
(43, '2025_09_27_175120_add_prix_flou_detail_to_modeles_table', 38),
(44, '2025_09_27_185755_add_media_path_to_achats_table', 39),
(45, '2025_09_27_192541_add_type_and_photo_to_achats_table', 40),
(46, '2025_09_27_195928_update_achats_unique_index', 41),
(47, '2025_09_28_101159_create_jetons_proposes_table', 42),
(48, '2025_09_28_111506_create_jetons_proposes_table', 43),
(49, '2025_09_29_193251_create_jetons_proposes_table', 44),
(50, '2025_10_08_183859_add_show_prive_to_modeles_table', 45),
(51, '2025_10_08_190418_add_prive_to_modeles_table', 46),
(52, '2025_10_08_191320_add_prive_to_modeles_table', 47),
(53, '2025_10_16_180354_create_gallery_photos_table', 48),
(54, '2025_10_18_175142_add_video_url_to_gallery_photos_table', 49),
(55, '2025_10_18_180049_update_photo_url_nullable_in_gallery_photos_table', 50),
(56, '2025_10_18_200420_update_jetons_and_jetons_proposes_tables', 51),
(57, '2025_11_05_195252_create_historique_jetons_table', 52),
(58, '2025_11_05_203156_add_position_photo_to_gallery_photos_table', 53),
(59, '2025_11_06_180356_create_albums_table', 54),
(60, '2025_11_06_182110_add_album_id_to_gallery_photos_table', 55),
(61, '2025_11_15_182846_create_admins_table', 56),
(62, '2025_11_16_191845_add_prix_to_albums_table', 57),
(63, '2025_11_30_112313_add_etat_and_type_flou_to_albums_table', 58),
(64, '2025_11_30_154331_add_album_id_to_users_table', 59),
(65, '2025_11_30_202253_create_films_table', 60),
(66, '2025_11_30_205356_add_numero_whatsapp_to_users_table', 61),
(67, '2025_11_30_215243_create_films_descriptions_table', 62);

-- --------------------------------------------------------

--
-- Table structure for table `modeles`
--

CREATE TABLE `modeles` (
  `id` bigint UNSIGNED NOT NULL,
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
  `last_token_payment` timestamp NULL DEFAULT NULL,
  `peer_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` int DEFAULT NULL,
  `taille` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `silhouette` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `poitrine` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fesse` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `langue` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `services` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `modeles`
--

INSERT INTO `modeles` (`id`, `nom`, `prenom`, `description`, `video_link`, `video_file`, `photos`, `created_at`, `updated_at`, `email`, `password`, `en_ligne`, `prive`, `mode`, `type_flou`, `prix_flou`, `prix_flou_detail`, `nombre_jetons_show_privee`, `duree_show_privee`, `jetons_surprise`, `en_live`, `last_token_payment`, `peer_id`, `age`, `taille`, `silhouette`, `poitrine`, `fesse`, `langue`, `services`) VALUES
(3, 'Sexy', 'Anime', 'Izaho dia sexy mampipoaka, test', '[]', NULL, '\"[\\\"photos\\\\/RGdYH4yHNZVOAgGN6hMWBELvehMGAFkViH2v1FJF.jpg\\\",\\\"photos\\\\/aRkBPMBL59JcJJjrmsbLSu1rGNfmpYa2RXRFQAia.jpg\\\",\\\"photos\\\\/qPXfTbSr8RQYumeZwt1A3Jw4V5bB94rxQ4De24la.jpg\\\"]\"', '2025-08-09 11:07:37', '2025-11-26 13:20:57', 'livange24@gmail.com', '$2y$12$.Wl4gKBNmgy5QdHP8dwwiuphGZJ4rOl/f7l3IPruAiidoPbWbNPHy', 0, 0, 0, 'strong', NULL, NULL, 20, 20, NULL, 0, NULL, NULL, 25, '200', 'Top', '25', 'Gros', 'FR', 'Toutes actions que vous voulez'),
(5, 'mami', 'be', 'test', NULL, '[]', '[\"photos/ZPJmDsc7mgu7QKYxoOvJHjMBnbzjnHIvHMslFD1s.png\"]', '2025-09-04 17:41:55', '2025-11-30 18:16:34', 'rdauphinelys@gmail.com', '$2y$12$W9eFHyIzdGBeoKw4XKlpM.wWYohVigqKzOKzNTFCItDSvqCMYl3C6', 0, 0, 0, NULL, NULL, NULL, 100, 60, '1277', 0, NULL, NULL, NULL, NULL, 'test', NULL, NULL, 'FR,DE,IT,PT', NULL),
(6, 'Test', 'test', 'test', NULL, '[]', '[\"photos/PcVnEFqViB3lk89O62oWDvt8dnzKPcvF7hJWx7ch.jpg\"]', '2025-09-10 16:36:14', '2025-09-26 16:37:03', 'test@test.com', '$2y$12$kLVra.lNRYVnWG0f7x/RL.zaoTiymMpToXIGLaRc/CapmpZ1efsAC', 0, 0, 1, 'strong', 25.00, NULL, 30, 30, '100', 0, NULL, NULL, 25, '300', 'L', '12', 'Big', 'FR', 'Tout'),
(10, 'test', 'test', 'tefsfs', '[null]', '[]', '[\"photos/2RbIkzxPaPGZyKlddG60YRTZoHsxOUnEqNcpyOph.png\"]', '2025-11-05 15:53:46', '2025-11-05 15:53:46', 'admin@test.com', '$2y$12$.nCwfz6ivlFEzDYTbUX8NuQA7b0DP.sVPnNoTXjMcfH3zjlibf2QW', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 25, '187', '45', '544', '555', 'ES,PT', '4555552');

-- --------------------------------------------------------

--
-- Table structure for table `modele_historiques`
--

CREATE TABLE `modele_historiques` (
  `id` bigint UNSIGNED NOT NULL,
  `modele_id` bigint UNSIGNED NOT NULL,
  `jour` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `modele_historiques`
--

INSERT INTO `modele_historiques` (`id`, `modele_id`, `jour`, `created_at`, `updated_at`) VALUES
(1, 6, '2025-09-14', '2025-09-14 12:07:44', '2025-09-14 12:07:44'),
(2, 6, '2025-09-14', '2025-09-14 17:07:13', '2025-09-14 17:07:13'),
(3, 6, '2025-09-15', '2025-09-15 15:51:05', '2025-09-15 15:51:05'),
(4, 6, '2025-09-15', '2025-09-15 16:01:01', '2025-09-15 16:01:01'),
(5, 6, '2025-09-15', '2025-09-15 17:30:21', '2025-09-15 17:30:21'),
(6, 6, '2025-09-16', '2025-09-16 16:45:37', '2025-09-16 16:45:37'),
(7, 6, '2025-09-16', '2025-09-16 18:44:53', '2025-09-16 18:44:53'),
(8, 6, '2025-09-20', '2025-09-20 09:19:39', '2025-09-20 09:19:39'),
(9, 6, '2025-09-21', '2025-09-21 05:14:27', '2025-09-21 05:14:27'),
(10, 6, '2025-09-21', '2025-09-21 10:28:57', '2025-09-21 10:28:57'),
(11, 6, '2025-09-23', '2025-09-23 15:13:58', '2025-09-23 15:13:58'),
(12, 5, '2025-09-23', '2025-09-23 16:03:12', '2025-09-23 16:03:12'),
(13, 6, '2025-09-23', '2025-09-23 16:03:26', '2025-09-23 16:03:26'),
(14, 5, '2025-09-23', '2025-09-23 16:49:42', '2025-09-23 16:49:42'),
(15, 6, '2025-09-25', '2025-09-25 15:46:43', '2025-09-25 15:46:43'),
(16, 6, '2025-09-26', '2025-09-26 15:50:22', '2025-09-26 15:50:22'),
(17, 5, '2025-09-27', '2025-09-27 13:20:42', '2025-09-27 13:20:42'),
(18, 3, '2025-09-27', '2025-09-27 13:20:59', '2025-09-27 13:20:59'),
(19, 5, '2025-09-28', '2025-09-28 06:51:14', '2025-09-28 06:51:14'),
(20, 5, '2025-09-29', '2025-09-29 16:48:53', '2025-09-29 16:48:53'),
(21, 5, '2025-10-02', '2025-10-02 13:19:57', '2025-10-02 13:19:57'),
(22, 5, '2025-10-02', '2025-10-02 15:30:53', '2025-10-02 15:30:53'),
(23, 5, '2025-10-02', '2025-10-02 15:55:23', '2025-10-02 15:55:23'),
(24, 5, '2025-10-04', '2025-10-04 11:38:18', '2025-10-04 11:38:18'),
(25, 5, '2025-10-04', '2025-10-04 16:49:55', '2025-10-04 16:49:55'),
(26, 5, '2025-10-06', '2025-10-06 13:11:31', '2025-10-06 13:11:31'),
(27, 5, '2025-10-07', '2025-10-07 13:07:05', '2025-10-07 13:07:05'),
(28, 5, '2025-10-08', '2025-10-08 15:26:13', '2025-10-08 15:26:13'),
(29, 5, '2025-10-08', '2025-10-08 15:29:26', '2025-10-08 15:29:26'),
(30, 5, '2025-10-18', '2025-10-18 13:09:32', '2025-10-18 13:09:32'),
(31, 5, '2025-10-19', '2025-10-19 09:04:45', '2025-10-19 09:04:45'),
(32, 5, '2025-10-19', '2025-10-19 14:23:34', '2025-10-19 14:23:34'),
(33, 5, '2025-10-20', '2025-10-20 16:50:47', '2025-10-20 16:50:47'),
(34, 5, '2025-10-22', '2025-10-22 16:01:20', '2025-10-22 16:01:20'),
(35, 5, '2025-10-23', '2025-10-23 14:57:30', '2025-10-23 14:57:30'),
(36, 5, '2025-10-25', '2025-10-25 02:24:03', '2025-10-25 02:24:03'),
(37, 5, '2025-10-25', '2025-10-25 06:05:03', '2025-10-25 06:05:03'),
(38, 5, '2025-10-25', '2025-10-25 10:16:14', '2025-10-25 10:16:14'),
(39, 5, '2025-10-25', '2025-10-25 10:32:01', '2025-10-25 10:32:01'),
(40, 5, '2025-10-25', '2025-10-25 10:32:19', '2025-10-25 10:32:19'),
(41, 5, '2025-10-28', '2025-10-28 16:04:40', '2025-10-28 16:04:40'),
(42, 5, '2025-11-01', '2025-11-01 14:28:05', '2025-11-01 14:28:05'),
(43, 5, '2025-11-01', '2025-11-01 16:26:22', '2025-11-01 16:26:22'),
(44, 5, '2025-11-02', '2025-11-02 10:59:55', '2025-11-02 10:59:55'),
(45, 5, '2025-11-03', '2025-11-03 14:11:38', '2025-11-03 14:11:38'),
(46, 5, '2025-11-03', '2025-11-03 14:56:57', '2025-11-03 14:56:57'),
(47, 5, '2025-11-05', '2025-11-05 16:55:49', '2025-11-05 16:55:49'),
(48, 5, '2025-11-06', '2025-11-06 13:36:06', '2025-11-06 13:36:06'),
(49, 5, '2025-11-06', '2025-11-06 13:46:33', '2025-11-06 13:46:33'),
(50, 5, '2025-11-06', '2025-11-06 14:56:25', '2025-11-06 14:56:25'),
(51, 5, '2025-11-06', '2025-11-06 15:13:03', '2025-11-06 15:13:03'),
(52, 5, '2025-11-06', '2025-11-06 15:25:20', '2025-11-06 15:25:20'),
(53, 5, '2025-11-06', '2025-11-06 15:26:47', '2025-11-06 15:26:47'),
(54, 5, '2025-11-15', '2025-11-15 13:05:55', '2025-11-15 13:05:55'),
(55, 3, '2025-11-15', '2025-11-15 14:11:44', '2025-11-15 14:11:44'),
(56, 5, '2025-11-16', '2025-11-16 11:13:08', '2025-11-16 11:13:08'),
(57, 5, '2025-11-16', '2025-11-16 11:17:55', '2025-11-16 11:17:55'),
(58, 3, '2025-11-16', '2025-11-16 11:18:14', '2025-11-16 11:18:14'),
(59, 5, '2025-11-16', '2025-11-16 14:41:24', '2025-11-16 14:41:24'),
(60, 3, '2025-11-16', '2025-11-16 16:02:56', '2025-11-16 16:02:56'),
(61, 5, '2025-11-16', '2025-11-16 17:29:16', '2025-11-16 17:29:16'),
(62, 5, '2025-11-23', '2025-11-23 05:14:53', '2025-11-23 05:14:53'),
(63, 5, '2025-11-23', '2025-11-23 05:32:45', '2025-11-23 05:32:45'),
(64, 5, '2025-11-23', '2025-11-23 05:58:29', '2025-11-23 05:58:29'),
(65, 5, '2025-11-23', '2025-11-23 09:02:00', '2025-11-23 09:02:00'),
(66, 3, '2025-11-23', '2025-11-23 11:47:51', '2025-11-23 11:47:51'),
(67, 3, '2025-11-26', '2025-11-26 13:09:03', '2025-11-26 13:09:03'),
(68, 5, '2025-11-26', '2025-11-26 13:21:07', '2025-11-26 13:21:07'),
(69, 5, '2025-11-30', '2025-11-30 05:00:41', '2025-11-30 05:00:41'),
(70, 5, '2025-11-30', '2025-11-30 15:34:34', '2025-11-30 15:34:34'),
(71, 5, '2025-11-30', '2025-11-30 17:34:12', '2025-11-30 17:34:12');

-- --------------------------------------------------------

--
-- Table structure for table `model_connections`
--

CREATE TABLE `model_connections` (
  `id` bigint UNSIGNED NOT NULL,
  `modele_id` bigint UNSIGNED NOT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('livange24@gmail.com', '$2y$12$nIneLuz0H3mXY.x1RZFGKOMZMdqxoy1HsqlI1B3tVzv28GnPgatgm', '2025-08-13 17:36:34');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'api', '5b84f981bc7d94c16098aabe159bda3d711b0dbc51620df6a29c7d5a9e811053', '[\"*\"]', NULL, NULL, '2025-07-20 13:50:13', '2025-07-20 13:50:13'),
(2, 'App\\Models\\User', 1, 'api', 'c42446517b79d60b9d23a1e62bc76d95b880f9774026d6d7c1052a930dc0687e', '[\"*\"]', NULL, NULL, '2025-07-20 13:50:13', '2025-07-20 13:50:13');

-- --------------------------------------------------------

--
-- Table structure for table `show_prives`
--

CREATE TABLE `show_prives` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `modele_id` bigint UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `debut` time NOT NULL,
  `fin` time NOT NULL,
  `duree` int NOT NULL,
  `jetons_total` int NOT NULL,
  `etat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en_attente',
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `room_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_live` tinyint(1) NOT NULL DEFAULT '1',
  `access_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `socket_room` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `broadcaster_socket_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prenoms` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` int DEFAULT NULL,
  `pseudo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `departement` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numero_whatsapp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `jetons` int NOT NULL DEFAULT '0',
  `album_id` json DEFAULT NULL,
  `banni` tinyint NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenoms`, `age`, `pseudo`, `departement`, `email`, `numero_whatsapp`, `password`, `created_at`, `updated_at`, `jetons`, `album_id`, `banni`) VALUES
(8, NULL, NULL, NULL, 'Petit', NULL, 'livange24@gmail.com', NULL, '$2y$12$Kruvt1fXmfHUchj4grZE5eY3DssP3ltUkCU5UUVMalAMsdLmm83Fu', '2025-09-16 18:48:21', '2025-11-23 05:52:40', 499990, NULL, 0),
(9, NULL, NULL, NULL, 'Petit', NULL, 'rdauphinelys@gmail.com', '261340033320', '$2y$12$fPbnWKrcaqhels30I53pWu6Jh9oal9Rxmcg0sutKJDYbkUa.fKFcO', '2025-11-23 06:48:50', '2025-12-04 14:28:56', 497393, '[15]', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_token_histories`
--

CREATE TABLE `user_token_histories` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `previous_jetons` int NOT NULL DEFAULT '0',
  `new_jetons` int NOT NULL DEFAULT '0',
  `delta` int UNSIGNED NOT NULL DEFAULT '0',
  `source` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `achats`
--
ALTER TABLE `achats`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `achats_user_modele_type_photo_unique` (`user_id`,`modele_id`,`type`,`photo_path`),
  ADD KEY `achats_modele_id_foreign` (`modele_id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_username_unique` (`username`);

--
-- Indexes for table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id`),
  ADD KEY `albums_modele_id_foreign` (`modele_id`);

--
-- Indexes for table `chat_messages`
--
ALTER TABLE `chat_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chat_messages_live_id_foreign` (`live_id`),
  ADD KEY `chat_messages_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `favoris`
--
ALTER TABLE `favoris`
  ADD PRIMARY KEY (`id`),
  ADD KEY `favoris_user_id_foreign` (`user_id`),
  ADD KEY `favoris_modele_id_foreign` (`modele_id`);

--
-- Indexes for table `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`id`),
  ADD KEY `films_user_id_foreign` (`user_id`),
  ADD KEY `films_modele_id_foreign` (`modele_id`);

--
-- Indexes for table `films_descriptions`
--
ALTER TABLE `films_descriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery_photos`
--
ALTER TABLE `gallery_photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gallery_photos_modele_id_foreign` (`modele_id`),
  ADD KEY `gallery_photos_position_photo_index` (`position_photo`),
  ADD KEY `gallery_photos_album_id_foreign` (`album_id`);

--
-- Indexes for table `historique_jetons`
--
ALTER TABLE `historique_jetons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `historique_jetons_user_id_foreign` (`user_id`),
  ADD KEY `historique_jetons_modele_id_foreign` (`modele_id`);

--
-- Indexes for table `historique_show_prives`
--
ALTER TABLE `historique_show_prives`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jetons`
--
ALTER TABLE `jetons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jetons_jeton_propose_id_foreign` (`jeton_propose_id`);

--
-- Indexes for table `jetons_proposes`
--
ALTER TABLE `jetons_proposes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lives`
--
ALTER TABLE `lives`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lives_modele_id_foreign` (`modele_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modeles`
--
ALTER TABLE `modeles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `modeles_email_unique` (`email`);

--
-- Indexes for table `modele_historiques`
--
ALTER TABLE `modele_historiques`
  ADD PRIMARY KEY (`id`),
  ADD KEY `modele_historiques_modele_id_index` (`modele_id`);

--
-- Indexes for table `model_connections`
--
ALTER TABLE `model_connections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `model_connections_modele_id_index` (`modele_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `show_prives`
--
ALTER TABLE `show_prives`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `show_prives_access_token_unique` (`access_token`),
  ADD KEY `shows_prives_user_id_foreign` (`user_id`),
  ADD KEY `shows_prives_modele_id_foreign` (`modele_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_token_histories`
--
ALTER TABLE `user_token_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_token_histories_user_id_index` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `achats`
--
ALTER TABLE `achats`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `albums`
--
ALTER TABLE `albums`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `chat_messages`
--
ALTER TABLE `chat_messages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favoris`
--
ALTER TABLE `favoris`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `films`
--
ALTER TABLE `films`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `films_descriptions`
--
ALTER TABLE `films_descriptions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gallery_photos`
--
ALTER TABLE `gallery_photos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `historique_jetons`
--
ALTER TABLE `historique_jetons`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `historique_show_prives`
--
ALTER TABLE `historique_show_prives`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jetons`
--
ALTER TABLE `jetons`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `jetons_proposes`
--
ALTER TABLE `jetons_proposes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lives`
--
ALTER TABLE `lives`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `modeles`
--
ALTER TABLE `modeles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `modele_historiques`
--
ALTER TABLE `modele_historiques`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `model_connections`
--
ALTER TABLE `model_connections`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `show_prives`
--
ALTER TABLE `show_prives`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_token_histories`
--
ALTER TABLE `user_token_histories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `achats`
--
ALTER TABLE `achats`
  ADD CONSTRAINT `achats_modele_id_foreign` FOREIGN KEY (`modele_id`) REFERENCES `modeles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `achats_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `albums`
--
ALTER TABLE `albums`
  ADD CONSTRAINT `albums_modele_id_foreign` FOREIGN KEY (`modele_id`) REFERENCES `modeles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `chat_messages`
--
ALTER TABLE `chat_messages`
  ADD CONSTRAINT `chat_messages_live_id_foreign` FOREIGN KEY (`live_id`) REFERENCES `lives` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `chat_messages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `favoris`
--
ALTER TABLE `favoris`
  ADD CONSTRAINT `favoris_modele_id_foreign` FOREIGN KEY (`modele_id`) REFERENCES `modeles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `favoris_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `films`
--
ALTER TABLE `films`
  ADD CONSTRAINT `films_modele_id_foreign` FOREIGN KEY (`modele_id`) REFERENCES `modeles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `films_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `gallery_photos`
--
ALTER TABLE `gallery_photos`
  ADD CONSTRAINT `gallery_photos_album_id_foreign` FOREIGN KEY (`album_id`) REFERENCES `albums` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `gallery_photos_modele_id_foreign` FOREIGN KEY (`modele_id`) REFERENCES `modeles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `historique_jetons`
--
ALTER TABLE `historique_jetons`
  ADD CONSTRAINT `historique_jetons_modele_id_foreign` FOREIGN KEY (`modele_id`) REFERENCES `modeles` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `historique_jetons_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `jetons`
--
ALTER TABLE `jetons`
  ADD CONSTRAINT `jetons_jeton_propose_id_foreign` FOREIGN KEY (`jeton_propose_id`) REFERENCES `jetons_proposes` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `lives`
--
ALTER TABLE `lives`
  ADD CONSTRAINT `lives_modele_id_foreign` FOREIGN KEY (`modele_id`) REFERENCES `modeles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `modele_historiques`
--
ALTER TABLE `modele_historiques`
  ADD CONSTRAINT `modele_historiques_modele_id_foreign` FOREIGN KEY (`modele_id`) REFERENCES `modeles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_connections`
--
ALTER TABLE `model_connections`
  ADD CONSTRAINT `model_connections_modele_id_foreign` FOREIGN KEY (`modele_id`) REFERENCES `modeles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `show_prives`
--
ALTER TABLE `show_prives`
  ADD CONSTRAINT `shows_prives_modele_id_foreign` FOREIGN KEY (`modele_id`) REFERENCES `modeles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `shows_prives_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_token_histories`
--
ALTER TABLE `user_token_histories`
  ADD CONSTRAINT `user_token_histories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
