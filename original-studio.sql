-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 27, 2026 at 01:31 PM
-- Server version: 8.4.3
-- PHP Version: 8.3.26

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
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'detail',
  `photo_path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint UNSIGNED NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `nom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `etat` enum('gratuit','payant') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'gratuit',
  `type_flou` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prix` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chat_messages`
--

CREATE TABLE `chat_messages` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `pseudo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `original_language` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `translated_message` text COLLATE utf8mb4_unicode_ci,
  `translation_target` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `translation_success` tinyint(1) NOT NULL DEFAULT '0',
  `sender` enum('client','admin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'client',
  `read` tinyint(1) NOT NULL DEFAULT '0',
  `replied` tinyint(1) NOT NULL DEFAULT '0',
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint UNSIGNED NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `reponse` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `categorie` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `reponse`, `order`, `active`, `categorie`, `created_at`, `updated_at`) VALUES
(1, 'test454', 'test', 1, 0, 'test', '2025-12-20 16:34:30', '2025-12-20 16:41:26'),
(2, 'test23', 'test', 1, 0, 'test', '2025-12-20 16:34:53', '2025-12-20 16:41:57'),
(3, 'test34', '3R3RER', 0, 1, 'RERER', '2025-12-20 16:46:26', '2025-12-20 16:46:26'),
(4, 'test34', '3R3RER', 0, 0, 'RERER', '2025-12-20 16:46:49', '2025-12-20 16:51:35'),
(5, 'TGDS', 'GSGDS', 7, 1, 'GSDGS', '2025-12-20 16:51:07', '2025-12-20 16:51:07'),
(6, 'undefined', 'FDVDSDSDSVD', 0, 0, 'VSDSDFSDFS', '2025-12-20 16:51:48', '2025-12-20 16:51:48');

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
  `detail` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `minutes` int NOT NULL,
  `jetons` int NOT NULL,
  `type_envoi` enum('email','whatsapp') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `statut` enum('en_cours','envoye','termine') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en_cours',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `films_descriptions`
--

CREATE TABLE `films_descriptions` (
  `id` bigint UNSIGNED NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `photo_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position_photo` int NOT NULL DEFAULT '0',
  `video_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payant` tinyint(1) NOT NULL DEFAULT '0',
  `prix` decimal(8,2) DEFAULT NULL,
  `type_flou` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `album_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `historique_jetons`
--

CREATE TABLE `historique_jetons` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `modele_id` bigint UNSIGNED DEFAULT NULL,
  `nombre_jetons` int UNSIGNED NOT NULL,
  `type` enum('jeton_action','surprise') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'jeton_action',
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `historique_jetons`
--

INSERT INTO `historique_jetons` (`id`, `user_id`, `modele_id`, `nombre_jetons`, `type`, `description`, `created_at`, `updated_at`) VALUES
(5, 9, NULL, 70, 'jeton_action', 'Fesse', '2025-11-30 15:52:51', '2025-11-30 15:52:51'),
(6, 9, NULL, 5, 'surprise', 'Envoi d’une surprise 🎁', '2025-11-30 15:53:15', '2025-11-30 15:53:15'),
(7, 9, NULL, 76, 'jeton_action', 'Test', '2025-11-30 15:55:57', '2025-11-30 15:55:57'),
(8, 9, NULL, 10, 'surprise', 'Envoi d’une surprise 🎁', '2025-11-30 15:56:09', '2025-11-30 15:56:09'),
(9, 9, NULL, 70, 'jeton_action', 'Fesse', '2025-11-30 16:12:24', '2025-11-30 16:12:24'),
(10, 9, NULL, 70, 'jeton_action', 'Fesse', '2025-11-30 16:12:31', '2025-11-30 16:12:31'),
(11, 9, NULL, 70, 'jeton_action', 'Fesse', '2025-11-30 16:12:34', '2025-11-30 16:12:34'),
(12, 9, NULL, 76, 'jeton_action', 'Test', '2025-11-30 16:12:40', '2025-11-30 16:12:40'),
(13, 9, NULL, 70, 'jeton_action', 'Fesse', '2025-11-30 16:12:49', '2025-11-30 16:12:49'),
(14, 9, NULL, 70, 'jeton_action', 'Fesse', '2025-11-30 16:12:59', '2025-11-30 16:12:59'),
(15, 9, NULL, 70, 'jeton_action', 'Fesse', '2025-11-30 16:17:16', '2025-11-30 16:17:16'),
(16, 9, NULL, 70, 'jeton_action', 'Fesse', '2025-11-30 16:17:30', '2025-11-30 16:17:30'),
(17, 9, NULL, 70, 'jeton_action', 'Fesse', '2025-11-30 16:17:36', '2025-11-30 16:17:36'),
(18, 9, NULL, 70, 'jeton_action', 'Fesse', '2025-11-30 16:21:54', '2025-11-30 16:21:54'),
(19, 9, NULL, 70, 'jeton_action', 'Fesse', '2025-11-30 16:21:56', '2025-11-30 16:21:56'),
(20, 9, NULL, 70, 'jeton_action', 'Fesse', '2025-11-30 16:22:00', '2025-11-30 16:22:00'),
(21, 9, NULL, 70, 'jeton_action', 'Fesse', '2025-11-30 16:22:22', '2025-11-30 16:22:22'),
(22, 9, NULL, 70, 'jeton_action', 'Fesse', '2025-11-30 16:23:08', '2025-11-30 16:23:08'),
(23, 9, 11, 5, 'surprise', 'Envoi d’une surprise 🎁', '2025-12-20 13:05:56', '2025-12-20 13:05:56'),
(24, 9, 11, 50, 'surprise', 'Envoi d’une surprise 🎁', '2025-12-20 13:06:21', '2025-12-20 13:06:21'),
(25, 9, 11, 70, 'jeton_action', 'Fesse', '2025-12-20 13:16:36', '2025-12-20 13:16:36'),
(26, 9, 11, 111, 'jeton_action', 'test', '2025-12-20 13:16:41', '2025-12-20 13:16:41'),
(27, 9, 11, 111, 'jeton_action', 'test', '2025-12-20 13:17:44', '2025-12-20 13:17:44');

-- --------------------------------------------------------

--
-- Table structure for table `historique_lives`
--

CREATE TABLE `historique_lives` (
  `id` bigint UNSIGNED NOT NULL,
  `modele_id` bigint UNSIGNED NOT NULL,
  `statut` enum('commencer','fin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'commencer',
  `is_prive` tinyint(1) NOT NULL DEFAULT '0',
  `date_commencement` timestamp NULL DEFAULT NULL,
  `date_fin` timestamp NULL DEFAULT NULL,
  `duree` int DEFAULT NULL COMMENT 'Durée en minutes',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `historique_lives`
--

INSERT INTO `historique_lives` (`id`, `modele_id`, `statut`, `is_prive`, `date_commencement`, `date_fin`, `duree`, `created_at`, `updated_at`) VALUES
(1, 11, 'commencer', 0, '2025-12-17 08:06:49', NULL, 0, '2025-12-17 08:06:49', '2025-12-17 08:06:49'),
(2, 11, 'fin', 0, '2025-12-17 08:06:49', '2025-12-17 08:07:23', 0, '2025-12-17 08:07:23', '2025-12-17 08:07:23'),
(3, 11, 'commencer', 0, '2025-12-17 09:00:18', NULL, NULL, '2025-12-17 09:00:18', '2025-12-17 09:00:18'),
(4, 11, 'fin', 0, '2025-12-17 09:00:18', '2025-12-17 09:04:40', 4, '2025-12-17 09:04:40', '2025-12-17 09:04:40'),
(5, 11, 'commencer', 0, '2025-12-17 09:06:54', NULL, NULL, '2025-12-17 09:06:54', '2025-12-17 09:06:54'),
(6, 11, 'fin', 0, '2025-12-17 09:06:54', '2025-12-17 09:07:08', 0, '2025-12-17 09:07:08', '2025-12-17 09:07:08'),
(7, 11, 'commencer', 0, '2025-12-17 09:08:43', NULL, NULL, '2025-12-17 09:08:43', '2025-12-17 09:08:43'),
(8, 11, 'commencer', 1, '2025-12-17 09:08:53', NULL, NULL, '2025-12-17 09:08:53', '2025-12-17 09:08:53'),
(9, 11, 'fin', 0, '2025-12-17 09:08:43', '2025-12-17 09:09:20', 0, '2025-12-17 09:09:20', '2025-12-17 09:09:20'),
(10, 11, 'fin', 1, '2025-12-17 09:08:53', '2025-12-17 09:09:24', 0, '2025-12-17 09:09:24', '2025-12-17 09:09:24'),
(11, 11, 'commencer', 0, '2025-12-17 09:09:35', NULL, NULL, '2025-12-17 09:09:35', '2025-12-17 09:09:35'),
(12, 11, 'fin', 0, '2025-12-17 09:09:35', '2025-12-17 09:10:07', 0, '2025-12-17 09:10:07', '2025-12-17 09:10:07'),
(13, 11, 'commencer', 0, '2025-12-17 10:08:05', NULL, NULL, '2025-12-17 10:08:05', '2025-12-17 10:08:05'),
(14, 11, 'fin', 0, '2025-12-17 10:08:05', '2025-12-17 10:08:31', 0, '2025-12-17 10:08:31', '2025-12-17 10:08:31'),
(15, 11, 'commencer', 0, '2025-12-17 10:16:31', NULL, NULL, '2025-12-17 10:16:31', '2025-12-17 10:16:31'),
(16, 11, 'fin', 0, '2025-12-17 10:16:31', '2025-12-17 10:18:45', 2, '2025-12-17 10:18:45', '2025-12-17 10:18:45'),
(17, 11, 'commencer', 0, '2025-12-19 02:47:12', NULL, NULL, '2025-12-19 02:47:12', '2025-12-19 02:47:12'),
(18, 11, 'commencer', 1, '2025-12-19 02:47:50', NULL, NULL, '2025-12-19 02:47:50', '2025-12-19 02:47:50'),
(19, 11, 'fin', 0, '2025-12-19 02:47:12', '2025-12-19 02:48:07', 0, '2025-12-19 02:48:07', '2025-12-19 02:48:07'),
(20, 11, 'fin', 1, '2025-12-19 02:47:50', '2025-12-19 02:48:11', 0, '2025-12-19 02:48:11', '2025-12-19 02:48:11'),
(21, 11, 'commencer', 0, '2025-12-19 18:05:32', NULL, NULL, '2025-12-19 18:05:32', '2025-12-19 18:05:32'),
(22, 11, 'fin', 0, '2025-12-19 18:05:32', '2025-12-19 18:07:13', 1, '2025-12-19 18:07:13', '2025-12-19 18:07:13'),
(23, 11, 'commencer', 0, '2025-12-19 18:08:42', NULL, NULL, '2025-12-19 18:08:42', '2025-12-19 18:08:42'),
(24, 11, 'fin', 0, '2025-12-19 18:08:42', '2025-12-19 18:09:40', 0, '2025-12-19 18:09:40', '2025-12-19 18:09:40'),
(25, 11, 'commencer', 0, '2025-12-19 18:10:24', NULL, NULL, '2025-12-19 18:10:24', '2025-12-19 18:10:24'),
(26, 11, 'fin', 0, '2025-12-19 18:10:24', '2025-12-19 18:11:44', 1, '2025-12-19 18:11:44', '2025-12-19 18:11:44'),
(27, 11, 'commencer', 0, '2025-12-19 18:18:55', NULL, NULL, '2025-12-19 18:18:55', '2025-12-19 18:18:55'),
(28, 11, 'fin', 0, '2025-12-19 18:18:55', '2025-12-19 18:20:02', 1, '2025-12-19 18:20:02', '2025-12-19 18:20:02'),
(29, 11, 'commencer', 0, '2025-12-19 18:21:18', NULL, NULL, '2025-12-19 18:21:18', '2025-12-19 18:21:18'),
(30, 11, 'fin', 0, '2025-12-19 18:21:18', '2025-12-19 18:22:15', 0, '2025-12-19 18:22:15', '2025-12-19 18:22:15'),
(31, 11, 'commencer', 0, '2025-12-19 18:22:23', NULL, NULL, '2025-12-19 18:22:23', '2025-12-19 18:22:23'),
(32, 11, 'fin', 0, '2025-12-19 18:22:23', '2025-12-19 18:24:56', 2, '2025-12-19 18:24:56', '2025-12-19 18:24:56'),
(33, 11, 'commencer', 0, '2025-12-19 18:25:03', NULL, NULL, '2025-12-19 18:25:03', '2025-12-19 18:25:03'),
(34, 11, 'fin', 0, '2025-12-19 18:25:03', '2025-12-19 18:25:56', 0, '2025-12-19 18:25:56', '2025-12-19 18:25:56'),
(35, 11, 'commencer', 0, '2025-12-19 18:26:02', NULL, NULL, '2025-12-19 18:26:02', '2025-12-19 18:26:02'),
(36, 11, 'commencer', 1, '2025-12-19 18:26:38', NULL, NULL, '2025-12-19 18:26:38', '2025-12-19 18:26:38'),
(37, 11, 'fin', 1, '2025-12-19 18:26:38', '2025-12-19 18:26:47', 0, '2025-12-19 18:26:47', '2025-12-19 18:26:47'),
(38, 11, 'fin', 0, '2025-12-19 18:26:02', '2025-12-19 18:26:51', 0, '2025-12-19 18:26:51', '2025-12-19 18:26:51'),
(39, 11, 'commencer', 0, '2025-12-19 18:28:57', NULL, NULL, '2025-12-19 18:28:57', '2025-12-19 18:28:57'),
(40, 11, 'fin', 1, '2025-12-19 18:26:38', '2025-12-19 18:29:12', 2, '2025-12-19 18:29:12', '2025-12-19 18:29:12'),
(41, 11, 'commencer', 1, '2025-12-19 18:29:24', NULL, NULL, '2025-12-19 18:29:24', '2025-12-19 18:29:24'),
(42, 11, 'fin', 1, '2025-12-19 18:29:24', '2025-12-19 18:29:42', 0, '2025-12-19 18:29:42', '2025-12-19 18:29:42'),
(43, 11, 'fin', 1, '2025-12-19 18:29:24', '2025-12-19 18:29:44', 0, '2025-12-19 18:29:44', '2025-12-19 18:29:44'),
(44, 11, 'fin', 0, '2025-12-19 18:28:57', '2025-12-19 18:32:12', 3, '2025-12-19 18:32:12', '2025-12-19 18:32:12'),
(45, 11, 'commencer', 0, '2025-12-19 18:32:18', NULL, NULL, '2025-12-19 18:32:18', '2025-12-19 18:32:18'),
(46, 11, 'fin', 0, '2025-12-19 18:32:18', '2025-12-19 18:32:29', 0, '2025-12-19 18:32:29', '2025-12-19 18:32:29'),
(47, 11, 'commencer', 0, '2025-12-19 18:33:26', NULL, NULL, '2025-12-19 18:33:26', '2025-12-19 18:33:26'),
(48, 11, 'fin', 0, '2025-12-19 18:33:26', '2025-12-19 18:33:34', 0, '2025-12-19 18:33:34', '2025-12-19 18:33:34'),
(49, 11, 'commencer', 0, '2025-12-19 18:33:41', NULL, NULL, '2025-12-19 18:33:41', '2025-12-19 18:33:41'),
(50, 11, 'fin', 0, '2025-12-19 18:33:41', '2025-12-19 18:33:53', 0, '2025-12-19 18:33:53', '2025-12-19 18:33:53'),
(51, 11, 'commencer', 0, '2025-12-19 18:33:59', NULL, NULL, '2025-12-19 18:33:59', '2025-12-19 18:33:59'),
(52, 11, 'commencer', 1, '2025-12-19 18:34:25', NULL, NULL, '2025-12-19 18:34:25', '2025-12-19 18:34:25'),
(53, 11, 'fin', 0, '2025-12-19 18:33:59', '2025-12-19 18:34:36', 0, '2025-12-19 18:34:36', '2025-12-19 18:34:36'),
(54, 11, 'fin', 1, '2025-12-19 18:34:25', '2025-12-19 18:34:41', 0, '2025-12-19 18:34:41', '2025-12-19 18:34:41'),
(55, 11, 'commencer', 0, '2025-12-20 13:05:31', NULL, NULL, '2025-12-20 13:05:31', '2025-12-20 13:05:31'),
(56, 11, 'commencer', 1, '2025-12-20 13:14:08', NULL, NULL, '2025-12-20 13:14:08', '2025-12-20 13:14:08'),
(57, 11, 'fin', 1, '2025-12-20 13:14:08', '2025-12-20 13:14:26', 0, '2025-12-20 13:14:26', '2025-12-20 13:14:26'),
(58, 11, 'fin', 1, '2025-12-20 13:14:08', '2025-12-20 13:16:28', 2, '2025-12-20 13:16:28', '2025-12-20 13:16:28'),
(59, 11, 'commencer', 1, '2025-12-20 13:16:48', NULL, NULL, '2025-12-20 13:16:48', '2025-12-20 13:16:48'),
(60, 11, 'fin', 1, '2025-12-20 13:16:48', '2025-12-20 13:17:36', 0, '2025-12-20 13:17:36', '2025-12-20 13:17:36'),
(61, 11, 'fin', 1, '2025-12-20 13:16:48', '2025-12-20 13:17:38', 0, '2025-12-20 13:17:38', '2025-12-20 13:17:38'),
(62, 11, 'commencer', 1, '2025-12-20 13:17:50', NULL, NULL, '2025-12-20 13:17:50', '2025-12-20 13:17:50'),
(63, 11, 'fin', 1, '2025-12-20 13:17:50', '2025-12-20 13:18:02', 0, '2025-12-20 13:18:02', '2025-12-20 13:18:02'),
(64, 11, 'fin', 1, '2025-12-20 13:17:50', '2025-12-20 13:22:37', 4, '2025-12-20 13:22:37', '2025-12-20 13:22:37'),
(65, 11, 'fin', 0, '2025-12-20 13:05:31', '2025-12-20 18:49:15', 343, '2025-12-20 18:49:15', '2025-12-20 18:49:15'),
(66, 11, 'commencer', 0, '2025-12-20 18:50:22', NULL, NULL, '2025-12-20 18:50:22', '2025-12-20 18:50:22'),
(67, 11, 'fin', 0, '2025-12-20 18:50:22', '2025-12-20 18:50:33', 0, '2025-12-20 18:50:33', '2025-12-20 18:50:33'),
(68, 11, 'commencer', 0, '2025-12-20 18:50:59', NULL, NULL, '2025-12-20 18:50:59', '2025-12-20 18:50:59'),
(69, 11, 'fin', 0, '2025-12-20 18:50:59', '2025-12-20 18:51:02', 0, '2025-12-20 18:51:02', '2025-12-20 18:51:02'),
(70, 11, 'commencer', 0, '2025-12-20 18:51:10', NULL, NULL, '2025-12-20 18:51:10', '2025-12-20 18:51:10'),
(71, 11, 'fin', 0, '2025-12-20 18:51:10', '2025-12-20 18:51:11', 0, '2025-12-20 18:51:11', '2025-12-20 18:51:11'),
(72, 11, 'commencer', 0, '2025-12-20 18:51:36', NULL, NULL, '2025-12-20 18:51:36', '2025-12-20 18:51:36'),
(73, 11, 'fin', 0, '2025-12-20 18:51:36', '2025-12-20 18:51:37', 0, '2025-12-20 18:51:37', '2025-12-20 18:51:37'),
(74, 11, 'commencer', 0, '2025-12-20 19:01:58', NULL, NULL, '2025-12-20 19:01:58', '2025-12-20 19:01:58'),
(75, 11, 'fin', 0, '2025-12-20 19:01:58', '2025-12-20 19:02:00', 0, '2025-12-20 19:02:00', '2025-12-20 19:02:00'),
(76, 11, 'commencer', 0, '2025-12-20 19:06:58', NULL, NULL, '2025-12-20 19:06:58', '2025-12-20 19:06:58'),
(77, 11, 'fin', 0, '2025-12-20 19:06:58', '2025-12-20 19:07:00', 0, '2025-12-20 19:07:00', '2025-12-20 19:07:00'),
(78, 11, 'commencer', 0, '2025-12-20 19:07:19', NULL, NULL, '2025-12-20 19:07:19', '2025-12-20 19:07:19'),
(79, 11, 'fin', 0, '2025-12-20 19:07:19', '2025-12-20 19:07:21', 0, '2025-12-20 19:07:21', '2025-12-20 19:07:21'),
(80, 11, 'commencer', 0, '2025-12-20 19:08:54', NULL, NULL, '2025-12-20 19:08:54', '2025-12-20 19:08:54'),
(81, 11, 'fin', 0, '2025-12-20 19:08:54', '2025-12-20 19:08:58', 0, '2025-12-20 19:08:58', '2025-12-20 19:08:58'),
(82, 11, 'commencer', 0, '2025-12-29 09:59:50', NULL, NULL, '2025-12-29 09:59:50', '2025-12-29 09:59:50'),
(83, 11, 'fin', 0, '2025-12-29 09:59:50', '2025-12-29 09:59:53', 0, '2025-12-29 09:59:53', '2025-12-29 09:59:53'),
(84, 11, 'commencer', 0, '2025-12-29 15:42:17', NULL, NULL, '2025-12-29 15:42:17', '2025-12-29 15:42:17'),
(85, 11, 'fin', 0, '2025-12-29 15:42:17', '2025-12-29 15:42:31', 0, '2025-12-29 15:42:31', '2025-12-29 15:42:31'),
(86, 11, 'commencer', 0, '2025-12-29 16:19:23', NULL, NULL, '2025-12-29 16:19:23', '2025-12-29 16:19:23'),
(87, 11, 'fin', 0, '2025-12-29 16:19:23', '2026-01-06 16:09:01', 11509, '2026-01-06 16:09:01', '2026-01-06 16:09:01'),
(88, 11, 'commencer', 0, '2026-01-06 16:09:18', NULL, NULL, '2026-01-06 16:09:18', '2026-01-06 16:09:18'),
(89, 11, 'fin', 0, '2026-01-06 16:09:18', '2026-01-06 16:23:08', 13, '2026-01-06 16:23:08', '2026-01-06 16:23:08'),
(90, 11, 'commencer', 0, '2026-01-06 16:23:24', NULL, NULL, '2026-01-06 16:23:24', '2026-01-06 16:23:24'),
(91, 11, 'fin', 0, '2026-01-06 16:23:24', '2026-01-06 16:35:24', 12, '2026-01-06 16:35:24', '2026-01-06 16:35:24'),
(92, 11, 'commencer', 0, '2026-01-06 16:35:40', NULL, NULL, '2026-01-06 16:35:40', '2026-01-06 16:35:40'),
(93, 11, 'commencer', 1, '2026-01-06 16:38:13', NULL, NULL, '2026-01-06 16:38:13', '2026-01-06 16:38:13'),
(94, 11, 'fin', 1, '2026-01-06 16:38:13', '2026-01-06 16:39:02', 0, '2026-01-06 16:39:02', '2026-01-06 16:39:02'),
(95, 11, 'fin', 1, '2026-01-06 16:38:13', '2026-01-06 16:39:07', 0, '2026-01-06 16:39:07', '2026-01-06 16:39:07'),
(96, 11, 'fin', 0, '2026-01-06 16:35:40', '2026-01-06 16:39:47', 4, '2026-01-06 16:39:47', '2026-01-06 16:39:47'),
(97, 11, 'commencer', 0, '2026-01-06 17:10:00', NULL, NULL, '2026-01-06 17:10:00', '2026-01-06 17:10:00');

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
  `etat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en_attente',
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `is_live` tinyint(1) NOT NULL DEFAULT '1',
  `room_key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `access_token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `socket_room` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `broadcaster_socket_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `nom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
(11, 3, 1, 5, 'Test', 'test', 76, '2025-11-23 05:15:05', '2025-11-23 05:15:05'),
(20, 2, 1, 11, 'Fesse', 'Montrer mon fesse', 70, '2025-12-10 03:54:11', '2025-12-10 03:54:11'),
(21, 5, 1, 11, 'test', 'eff', 111, '2025-12-20 13:12:46', '2025-12-20 13:12:46');

-- --------------------------------------------------------

--
-- Table structure for table `jetons_proposes`
--

CREATE TABLE `jetons_proposes` (
  `id` bigint UNSIGNED NOT NULL,
  `nom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `nombre_de_jetons` int NOT NULL DEFAULT '0',
  `prise` tinyint(1) NOT NULL DEFAULT '0',
  `modele_id` bigint UNSIGNED DEFAULT NULL,
  `inputs` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jetons_proposes`
--

INSERT INTO `jetons_proposes` (`id`, `nom`, `description`, `nombre_de_jetons`, `prise`, `modele_id`, `inputs`, `created_at`, `updated_at`) VALUES
(2, 'Fesse', 'Montrer mon fesse', 70, 1, 11, NULL, '2025-09-29 16:42:56', '2025-12-10 03:54:11'),
(3, 'Test', 'test', 76, 0, NULL, NULL, '2025-09-29 16:56:35', '2025-11-23 05:15:05'),
(4, 'Test25', 'test', 1000, 0, NULL, NULL, '2025-11-23 08:44:01', '2025-12-09 09:40:05'),
(5, 'test', 'eff', 111, 1, 11, NULL, '2025-12-08 03:55:18', '2025-12-20 13:12:46'),
(6, '2EFEFS', 'FEFSFS', 11222, 0, NULL, NULL, '2025-12-08 03:55:28', '2025-12-10 03:52:17'),
(7, 'FDFDFD', 'FEFDFDF', 1122, 0, NULL, NULL, '2025-12-08 03:55:44', '2025-12-10 03:52:10'),
(8, 'FDFDF', 'DFDF', 123, 0, NULL, NULL, '2025-12-08 03:55:54', '2025-12-10 03:52:24'),
(9, 'RERER', 'GGSGS', 1122, 0, NULL, NULL, '2025-12-08 03:56:04', '2025-12-10 03:52:33'),
(10, 'dsdgsdgs', 'ééé', 12334, 0, NULL, NULL, '2025-12-08 03:56:19', '2025-12-10 03:52:42');

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
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
(67, '2025_11_30_215243_create_films_descriptions_table', 62),
(68, '2025_12_08_064647_create_sessions_table', 63),
(69, '2025_12_10_064820_add_modele_id_to_jetons_proposes_table', 64),
(70, '2025_12_13_160949_drop_old_chat_messages_table', 65),
(71, '2025_12_13_161055_create_chat_messages_table', 66),
(72, '2025_12_13_190513_drop_old_chat_messages_table', 67),
(73, '2025_12_13_190554_create_chat_messages_table', 68),
(74, '2024_12_17_000000_create_historique_lives_table', 69),
(75, '2025_12_17_115306_add_duree_to_historique_lives_table', 70),
(76, '2025_12_17_122549_create_modele_connexions_table', 71),
(77, '2025_12_20_000000_add_lang_fields_to_chat_messages', 72),
(78, '2025_12_20_000001_add_preferred_language_to_users', 72),
(79, '2025_12_20_191504_create_faqs_table', 73),
(80, '2025_12_29_182308_add_message_settings_to_modeles_table', 74);

-- --------------------------------------------------------

--
-- Table structure for table `modeles`
--

CREATE TABLE `modeles` (
  `id` bigint UNSIGNED NOT NULL,
  `nom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_link` json DEFAULT NULL,
  `video_file` json DEFAULT NULL,
  `photos` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_ligne` tinyint(1) NOT NULL DEFAULT '0',
  `prive` int NOT NULL DEFAULT '0',
  `message_font_size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '14px',
  `message_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '#ffffff',
  `received_message_font_size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '14px',
  `received_message_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '#ffffff',
  `mode` tinyint NOT NULL DEFAULT '0',
  `type_flou` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prix_flou` decimal(8,2) DEFAULT NULL,
  `prix_flou_detail` double(8,2) DEFAULT NULL,
  `nombre_jetons_show_privee` int DEFAULT NULL,
  `duree_show_privee` int DEFAULT NULL,
  `jetons_surprise` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `en_live` tinyint(1) NOT NULL DEFAULT '0',
  `last_token_payment` timestamp NULL DEFAULT NULL,
  `peer_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` int DEFAULT NULL,
  `taille` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `silhouette` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `poitrine` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fesse` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `langue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `services` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `modeles`
--

INSERT INTO `modeles` (`id`, `nom`, `prenom`, `description`, `video_link`, `video_file`, `photos`, `created_at`, `updated_at`, `email`, `password`, `en_ligne`, `prive`, `message_font_size`, `message_color`, `received_message_font_size`, `received_message_color`, `mode`, `type_flou`, `prix_flou`, `prix_flou_detail`, `nombre_jetons_show_privee`, `duree_show_privee`, `jetons_surprise`, `en_live`, `last_token_payment`, `peer_id`, `age`, `taille`, `silhouette`, `poitrine`, `fesse`, `langue`, `services`) VALUES
(11, 'Tester', 'Admin', 'Testeur Admin', '[null]', '[]', '[\"photos/Fd3Twx13lEN6whcfrBBAiCF66HBlNHV2kelcF4nZ.png\"]', '2025-12-08 03:49:12', '2026-01-06 17:10:00', 'rdauphinelys@gmail.com', '$2y$12$ja1NGQhYREqJc.bH9HHLLeIgKwVY.9EJnGMLwp8pjfrrlw1EkIq66', 1, 0, '16px', '#d21e1e', '16px', '#685b18', 0, NULL, NULL, NULL, 50, 60, '55', 1, NULL, NULL, 25, '175', 'M', '12', 'Top', 'FR,EN,DE,ES,IT,PT,NL', 'Test'),
(12, 'Test', 'Admin 2', 'tst', '[null]', '[]', '[\"photos/kf84WjzsEXL46fxnlj5JM1JybIM9rdSiD4n8s2Zv.png\"]', '2025-12-10 03:58:52', '2025-12-17 06:01:01', 'livange24@gmail.com', '$2y$12$J8TcqI.6vA0jxpd8I.CLTOL6MWU8EBF5j9hXl1Dcgjay0L.uuPfgm', 0, 0, '14px', '#ffffff', '14px', '#ffffff', 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 50, '122', '12', '12', '122', 'PT', '2124');

-- --------------------------------------------------------

--
-- Table structure for table `modele_connexions`
--

CREATE TABLE `modele_connexions` (
  `id` bigint UNSIGNED NOT NULL,
  `modele_id` bigint UNSIGNED NOT NULL,
  `date_connexion` timestamp NULL DEFAULT NULL,
  `date_deconnexion` timestamp NULL DEFAULT NULL,
  `duree_session_secondes` int DEFAULT NULL COMMENT 'Durée en secondes',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `modele_connexions`
--

INSERT INTO `modele_connexions` (`id`, `modele_id`, `date_connexion`, `date_deconnexion`, `duree_session_secondes`, `created_at`, `updated_at`) VALUES
(1, 11, '2025-12-17 09:27:47', '2025-12-17 09:33:34', 347, '2025-12-17 09:27:47', '2025-12-17 09:33:34'),
(2, 11, '2025-12-17 09:44:36', '2025-12-17 09:58:05', 809, '2025-12-17 09:44:36', '2025-12-17 09:58:05'),
(3, 11, '2025-12-17 10:07:58', '2025-12-17 10:19:53', 715, '2025-12-17 10:07:58', '2025-12-17 10:19:53'),
(4, 11, '2025-12-19 02:35:42', '2025-12-19 02:50:52', 910, '2025-12-19 02:35:42', '2025-12-19 02:50:52'),
(5, 11, '2025-12-19 17:58:42', '2025-12-19 18:35:33', 2211, '2025-12-19 17:58:42', '2025-12-19 18:35:33'),
(6, 11, '2025-12-20 13:05:18', '2025-12-20 13:22:33', 1035, '2025-12-20 13:05:18', '2025-12-20 13:22:33'),
(7, 11, '2025-12-20 17:38:55', NULL, NULL, '2025-12-20 17:38:55', '2025-12-20 17:38:55'),
(8, 11, '2025-12-20 17:51:01', '2025-12-20 17:52:09', 68, '2025-12-20 17:51:01', '2025-12-20 17:52:09'),
(9, 11, '2025-12-20 18:39:33', NULL, NULL, '2025-12-20 18:39:33', '2025-12-20 18:39:33'),
(10, 11, '2025-12-23 17:40:46', NULL, NULL, '2025-12-23 17:40:46', '2025-12-23 17:40:46'),
(11, 11, '2025-12-29 09:59:30', NULL, NULL, '2025-12-29 09:59:30', '2025-12-29 09:59:30'),
(12, 11, '2025-12-29 15:03:23', '2025-12-29 16:21:30', 4687, '2025-12-29 15:03:23', '2025-12-29 16:21:30'),
(13, 11, '2026-01-06 15:33:14', NULL, NULL, '2026-01-06 15:33:14', '2026-01-06 15:33:14'),
(14, 11, '2026-01-06 17:09:55', NULL, NULL, '2026-01-06 17:09:55', '2026-01-06 17:09:55');

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
(72, 11, '2025-12-08', '2025-12-08 03:54:56', '2025-12-08 03:54:56'),
(73, 11, '2025-12-08', '2025-12-08 06:44:44', '2025-12-08 06:44:44'),
(74, 11, '2025-12-09', '2025-12-09 09:39:11', '2025-12-09 09:39:11'),
(75, 11, '2025-12-09', '2025-12-09 09:59:57', '2025-12-09 09:59:57'),
(76, 11, '2025-12-10', '2025-12-10 03:35:18', '2025-12-10 03:35:18'),
(77, 12, '2025-12-10', '2025-12-10 03:59:20', '2025-12-10 03:59:20'),
(78, 11, '2025-12-10', '2025-12-10 04:01:38', '2025-12-10 04:01:38'),
(79, 11, '2025-12-13', '2025-12-13 13:37:27', '2025-12-13 13:37:27'),
(80, 12, '2025-12-17', '2025-12-17 05:54:23', '2025-12-17 05:54:23'),
(81, 11, '2025-12-17', '2025-12-17 06:01:09', '2025-12-17 06:01:09'),
(82, 11, '2025-12-17', '2025-12-17 09:22:34', '2025-12-17 09:22:34'),
(83, 11, '2025-12-17', '2025-12-17 09:27:47', '2025-12-17 09:27:47'),
(84, 11, '2025-12-17', '2025-12-17 09:44:36', '2025-12-17 09:44:36'),
(85, 11, '2025-12-17', '2025-12-17 10:07:58', '2025-12-17 10:07:58'),
(86, 11, '2025-12-19', '2025-12-19 02:35:42', '2025-12-19 02:35:42'),
(87, 11, '2025-12-19', '2025-12-19 17:58:42', '2025-12-19 17:58:42'),
(88, 11, '2025-12-20', '2025-12-20 13:05:18', '2025-12-20 13:05:18'),
(89, 11, '2025-12-20', '2025-12-20 17:38:55', '2025-12-20 17:38:55'),
(90, 11, '2025-12-20', '2025-12-20 17:51:01', '2025-12-20 17:51:01'),
(91, 11, '2025-12-20', '2025-12-20 18:39:33', '2025-12-20 18:39:33'),
(92, 11, '2025-12-23', '2025-12-23 17:40:46', '2025-12-23 17:40:46'),
(93, 11, '2025-12-29', '2025-12-29 09:59:30', '2025-12-29 09:59:30'),
(94, 11, '2025-12-29', '2025-12-29 15:03:23', '2025-12-29 15:03:23'),
(95, 11, '2026-01-06', '2026-01-06 15:33:14', '2026-01-06 15:33:14'),
(96, 11, '2026-01-06', '2026-01-06 17:09:55', '2026-01-06 17:09:55');

-- --------------------------------------------------------

--
-- Table structure for table `model_connections`
--

CREATE TABLE `model_connections` (
  `id` bigint UNSIGNED NOT NULL,
  `modele_id` bigint UNSIGNED NOT NULL,
  `ip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
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
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('2b70gwAnuecD2xIzVEjfbAeQpAkixc9c6Osc6vnv', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMVdtY3pkWkk0cXFDcnVnNmFKWWhNYlBGc2Zoa0VpWTNGa3k4eVRDMyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hcGkvbGl2ZS9hY3RpdmUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1767730417),
('pMwUZ8cEdeiNIQ0sZ5k7i8v8iqrAaP97ypZs2zai', 10, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiUlhmNllhckhteG1LMGlqWW9NMzBVRWdqN1BIYWQ4eTQ3R2xlREdSdCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hcGkvbGl2ZS9wcml2YXRlIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTA7fQ==', 1767730530),
('xQcivEafEY2P20VgGsYN5J4sszvGZ22x6bMDk8tM', 9, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoicnR6a3RIUk0wU25kVlZ1MFFsQ3ZtZ3RLSmpQbzFMVHdjSFdGQThKcSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hcGkvbGl2ZS9wcml2YXRlIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czoxNjoibW9kZWxlX2xvZ2dlZF9pbiI7YjoxO3M6OToibW9kZWxlX2lkIjtpOjExO3M6MzoidXJsIjthOjE6e3M6ODoiaW50ZW5kZWQiO3M6Mzg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hcGkvbGl2ZS9wcml2YXRlIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6OTt9', 1767730550);

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
  `etat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en_attente',
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `room_key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_live` tinyint(1) NOT NULL DEFAULT '1',
  `access_token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `socket_room` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `broadcaster_socket_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `nom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prenoms` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` int DEFAULT NULL,
  `pseudo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `departement` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `preferred_language` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'FR',
  `numero_whatsapp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `jetons` int NOT NULL DEFAULT '0',
  `album_id` json DEFAULT NULL,
  `banni` tinyint NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenoms`, `age`, `pseudo`, `departement`, `email`, `preferred_language`, `numero_whatsapp`, `password`, `created_at`, `updated_at`, `jetons`, `album_id`, `banni`) VALUES
(9, NULL, NULL, NULL, 'Petit', NULL, 'rdauphinelys@gmail.com', 'FR', '261340033320', '$2y$12$fPbnWKrcaqhels30I53pWu6Jh9oal9Rxmcg0sutKJDYbkUa.fKFcO', '2025-11-23 06:48:50', '2026-01-06 16:39:07', 497053, '[15]', 0),
(10, NULL, NULL, NULL, 'Elys', NULL, 'livange24@gmail.com', 'FR', NULL, '$2y$12$VOHuKwBfVGuSTbzVYjmidO/sFQVearely9yDzF0H08ji3nKJydyOq', '2026-01-06 17:13:32', '2026-01-06 17:13:32', 0, NULL, 0);

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
  `source` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  ADD KEY `chat_messages_user_id_created_at_index` (`user_id`,`created_at`),
  ADD KEY `chat_messages_read_replied_index` (`read`,`replied`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `historique_lives`
--
ALTER TABLE `historique_lives`
  ADD PRIMARY KEY (`id`),
  ADD KEY `historique_lives_modele_id_statut_index` (`modele_id`,`statut`),
  ADD KEY `historique_lives_is_prive_date_commencement_index` (`is_prive`,`date_commencement`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `jetons_proposes_modele_id_foreign` (`modele_id`);

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
-- Indexes for table `modele_connexions`
--
ALTER TABLE `modele_connexions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `modele_connexions_modele_id_index` (`modele_id`),
  ADD KEY `modele_connexions_date_connexion_index` (`date_connexion`),
  ADD KEY `modele_connexions_date_deconnexion_index` (`date_deconnexion`);

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
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `historique_lives`
--
ALTER TABLE `historique_lives`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `historique_show_prives`
--
ALTER TABLE `historique_show_prives`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jetons`
--
ALTER TABLE `jetons`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `jetons_proposes`
--
ALTER TABLE `jetons_proposes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `lives`
--
ALTER TABLE `lives`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `modeles`
--
ALTER TABLE `modeles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `modele_connexions`
--
ALTER TABLE `modele_connexions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `modele_historiques`
--
ALTER TABLE `modele_historiques`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
-- Constraints for table `historique_lives`
--
ALTER TABLE `historique_lives`
  ADD CONSTRAINT `historique_lives_modele_id_foreign` FOREIGN KEY (`modele_id`) REFERENCES `modeles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `jetons`
--
ALTER TABLE `jetons`
  ADD CONSTRAINT `jetons_jeton_propose_id_foreign` FOREIGN KEY (`jeton_propose_id`) REFERENCES `jetons_proposes` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `jetons_proposes`
--
ALTER TABLE `jetons_proposes`
  ADD CONSTRAINT `jetons_proposes_modele_id_foreign` FOREIGN KEY (`modele_id`) REFERENCES `modeles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `lives`
--
ALTER TABLE `lives`
  ADD CONSTRAINT `lives_modele_id_foreign` FOREIGN KEY (`modele_id`) REFERENCES `modeles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `modele_connexions`
--
ALTER TABLE `modele_connexions`
  ADD CONSTRAINT `modele_connexions_modele_id_foreign` FOREIGN KEY (`modele_id`) REFERENCES `modeles` (`id`) ON DELETE CASCADE;

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
