-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2025 at 07:05 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kretek`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `uid` varchar(40) NOT NULL,
  `patient_uid` varchar(40) DEFAULT NULL,
  `service_uid` varchar(40) DEFAULT NULL,
  `date_sched` datetime NOT NULL,
  `keluhan` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`uid`, `patient_uid`, `service_uid`, `date_sched`, `keluhan`, `status`, `created_at`, `created_by`) VALUES
('0a93b7ce-dd9c-4b2b-a86d-2b5202c5d358', 'b3ceaa78-dfdb-4773-a4a0-de75e0618cec', '3a34e957-ffd2-4c48-9f31-8f855828d9c7', '2025-06-10 14:00:00', 'pengen dipijit aja', 1, '2025-06-10 03:18:38', 'a9467865-37c1-4104-bd63-b26a33c915db'),
('0d0a1137-1c8e-4248-8f80-4cc2df96b0c7', 'de4cb802-a7d2-4726-996c-956b4773e814', 'c9ef66e0-0566-4011-a668-392157bd1ef3', '2025-06-09 12:00:00', 'Sakit Awak', 1, '2025-06-09 16:00:50', 'a9467865-37c1-4104-bd63-b26a33c915db'),
('42cff628-57d6-449d-bad5-b73a07ceaad3', '098268d1-d59c-4851-ad2a-15dd8776d5aa', '249e9d71-8fb9-4afd-af93-24bd680adce9', '2025-06-11 11:58:00', NULL, 1, '2025-06-11 02:57:27', 'a9467865-37c1-4104-bd63-b26a33c915db');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES
(15, 'default', '{\"uuid\":\"8586ab54-7c48-4697-9f9c-9dc06d66027b\",\"displayName\":\"App\\\\Events\\\\ChatEvent\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:20:\\\"App\\\\Events\\\\ChatEvent\\\":1:{s:7:\\\"message\\\";s:4:\\\"chat\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1732602469, 1732602469),
(16, 'default', '{\"uuid\":\"8b80ab09-56a4-4247-ae2b-e5be676359e5\",\"displayName\":\"App\\\\Events\\\\ChatEvent\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:20:\\\"App\\\\Events\\\\ChatEvent\\\":1:{s:7:\\\"message\\\";s:4:\\\"chat\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1732602472, 1732602472),
(17, 'default', '{\"uuid\":\"30fb5f08-59d1-4083-a4c6-c45902c338da\",\"displayName\":\"App\\\\Events\\\\ChatEvent\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:20:\\\"App\\\\Events\\\\ChatEvent\\\":1:{s:7:\\\"message\\\";s:4:\\\"chat\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1732602732, 1732602732),
(18, 'default', '{\"uuid\":\"15e5a1d2-609c-4a5c-8842-3d08c28b4205\",\"displayName\":\"App\\\\Events\\\\ChatEvent\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:20:\\\"App\\\\Events\\\\ChatEvent\\\":1:{s:7:\\\"message\\\";s:4:\\\"chat\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1732851178, 1732851178),
(19, 'default', '{\"uuid\":\"2f9bce35-6cf5-4a43-8b2b-d0d3517fc2f9\",\"displayName\":\"App\\\\Events\\\\ChatEvent\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:20:\\\"App\\\\Events\\\\ChatEvent\\\":1:{s:7:\\\"message\\\";s:4:\\\"chat\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1732851179, 1732851179),
(20, 'default', '{\"uuid\":\"1e214d9f-0134-4617-9409-f2b2ea05baf2\",\"displayName\":\"App\\\\Events\\\\ChatEvent\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:20:\\\"App\\\\Events\\\\ChatEvent\\\":1:{s:7:\\\"message\\\";s:4:\\\"chat\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1732851181, 1732851181),
(21, 'default', '{\"uuid\":\"353a75bf-6baa-4fa1-a935-43095a403bba\",\"displayName\":\"App\\\\Events\\\\ChatEvent\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:20:\\\"App\\\\Events\\\\ChatEvent\\\":1:{s:7:\\\"message\\\";s:4:\\\"chat\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1732851191, 1732851191),
(22, 'default', '{\"uuid\":\"b0127e39-2b17-47a2-b105-424b8e5b2200\",\"displayName\":\"App\\\\Events\\\\ChatEvent\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:20:\\\"App\\\\Events\\\\ChatEvent\\\":1:{s:7:\\\"message\\\";s:4:\\\"chat\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1732851195, 1732851195);

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

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
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(5, '2024_11_14_999999_add_active_status_to_users', 2),
(6, '2024_11_14_999999_add_avatar_to_users', 2),
(7, '2024_11_14_999999_add_dark_mode_to_users', 2),
(8, '2024_11_14_999999_add_messenger_color_to_users', 2),
(9, '2024_11_14_999999_create_chatify_favorites_table', 2),
(10, '2024_11_14_999999_create_chatify_messages_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `uid` varchar(40) NOT NULL,
  `description` text DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` varchar(40) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`uid`, `description`, `name`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
('10aa1d11-270c-47ab-8c03-d20bc20225e8', 'Role', 'Role', '2024-10-17 07:29:42', NULL, '2024-10-17 07:29:42', NULL),
('3cf3d831-0a27-4c1d-8cce-cd7a6649ecd7', 'User', 'User', '2024-10-17 07:29:49', NULL, '2024-10-17 07:29:49', NULL),
('42634834-66e0-45bf-8835-99f2004a3b05', 'Dashboard', 'Dashboard', '2024-10-17 03:56:14', NULL, '2024-10-17 03:57:23', NULL),
('78eefbc3-b248-4d7c-a355-a83ed0103c4b', 'Module', 'Module', '2024-10-17 07:29:38', NULL, '2024-10-17 07:29:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `uid` varchar(40) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`uid`, `nama`, `created_at`, `created_by`) VALUES
('098268d1-d59c-4851-ad2a-15dd8776d5aa', 'Mochammad Qaysa Al-Haq', '2025-06-11 02:57:27', 'a9467865-37c1-4104-bd63-b26a33c915db'),
('9bd686f8-f720-4a09-a6dc-8e40f9317bec', 'Mochammad Qaysa Al-Haq', '2025-06-11 02:56:46', 'a9467865-37c1-4104-bd63-b26a33c915db'),
('b3ceaa78-dfdb-4773-a4a0-de75e0618cec', 'Mokhammad Arip', '2025-06-10 03:18:38', 'a9467865-37c1-4104-bd63-b26a33c915db'),
('de4cb802-a7d2-4726-996c-956b4773e814', 'Rifky Pratama', '2025-06-09 16:00:50', 'a9467865-37c1-4104-bd63-b26a33c915db');

-- --------------------------------------------------------

--
-- Table structure for table `patient_metas`
--

CREATE TABLE `patient_metas` (
  `patient_uid` varchar(40) NOT NULL,
  `meta_field` text DEFAULT NULL,
  `meta_value` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient_metas`
--

INSERT INTO `patient_metas` (`patient_uid`, `meta_field`, `meta_value`) VALUES
('de4cb802-a7d2-4726-996c-956b4773e814', 'nama', 'Rifky Pratama'),
('de4cb802-a7d2-4726-996c-956b4773e814', 'jenis_kelamin', 'PRIA'),
('de4cb802-a7d2-4726-996c-956b4773e814', 'kontak', NULL),
('de4cb802-a7d2-4726-996c-956b4773e814', 'email', NULL),
('de4cb802-a7d2-4726-996c-956b4773e814', 'tanggal_lahir', '2025-06-10'),
('de4cb802-a7d2-4726-996c-956b4773e814', 'alamat', 'Deket Unibi'),
('b3ceaa78-dfdb-4773-a4a0-de75e0618cec', 'nama', 'Mokhammad Arip'),
('b3ceaa78-dfdb-4773-a4a0-de75e0618cec', 'jenis_kelamin', 'PRIA'),
('b3ceaa78-dfdb-4773-a4a0-de75e0618cec', 'kontak', NULL),
('b3ceaa78-dfdb-4773-a4a0-de75e0618cec', 'email', NULL),
('b3ceaa78-dfdb-4773-a4a0-de75e0618cec', 'tanggal_lahir', '2025-01-01'),
('b3ceaa78-dfdb-4773-a4a0-de75e0618cec', 'alamat', 'dimana mana hatiku senang'),
('9bd686f8-f720-4a09-a6dc-8e40f9317bec', 'nama', 'Mochammad Qaysa Al-Haq'),
('9bd686f8-f720-4a09-a6dc-8e40f9317bec', 'email', 'rifky@gmail.com'),
('9bd686f8-f720-4a09-a6dc-8e40f9317bec', 'kontak', NULL),
('9bd686f8-f720-4a09-a6dc-8e40f9317bec', 'tanggal_lahir', '2003-01-11'),
('9bd686f8-f720-4a09-a6dc-8e40f9317bec', 'jenis_kelamin', 'PRIA'),
('9bd686f8-f720-4a09-a6dc-8e40f9317bec', 'alamat', NULL),
('098268d1-d59c-4851-ad2a-15dd8776d5aa', 'nama', 'Mochammad Qaysa Al-Haq'),
('098268d1-d59c-4851-ad2a-15dd8776d5aa', 'email', 'rifky@gmail.com'),
('098268d1-d59c-4851-ad2a-15dd8776d5aa', 'kontak', NULL),
('098268d1-d59c-4851-ad2a-15dd8776d5aa', 'tanggal_lahir', '2003-01-11'),
('098268d1-d59c-4851-ad2a-15dd8776d5aa', 'jenis_kelamin', 'PRIA'),
('098268d1-d59c-4851-ad2a-15dd8776d5aa', 'alamat', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `uid` varchar(40) NOT NULL,
  `description` text DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `module_uid` varchar(40) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` varchar(40) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`uid`, `description`, `name`, `slug`, `module_uid`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
('1e65f1cc-4a52-4a25-949f-18e436984511', 'Module List View Permit', 'Module List View', 'module.list', '78eefbc3-b248-4d7c-a355-a83ed0103c4b', '2024-10-17 07:30:45', NULL, '2024-10-17 07:30:45', NULL),
('4b4a3ae2-ce54-47a5-b682-0ef8e86ae0f6', 'User Create Permit', 'User Create', 'user.create', '3cf3d831-0a27-4c1d-8cce-cd7a6649ecd7', '2024-10-17 07:34:20', NULL, '2024-10-17 07:34:20', NULL),
('54932999-cc85-4131-a857-107714f4edc5', 'Role Update Permit', 'Role Update', 'role.update', '10aa1d11-270c-47ab-8c03-d20bc20225e8', '2024-10-17 07:33:04', NULL, '2024-10-17 07:33:04', NULL),
('55c3c286-5727-44cc-8693-ab369406fd1d', 'User List View Permit', 'User List View', 'user.list', '3cf3d831-0a27-4c1d-8cce-cd7a6649ecd7', '2024-10-17 07:33:47', NULL, '2024-10-17 07:33:47', NULL),
('5851c5a8-325b-434e-a36c-75ba0f2e2bd6', 'Module Create Permit', 'Module Create', 'module.create', '78eefbc3-b248-4d7c-a355-a83ed0103c4b', '2024-10-17 07:30:57', NULL, '2024-10-17 07:30:57', NULL),
('96803e1a-f019-4518-a8fb-12334d079922', 'Module Update Permit', 'Module Update', 'module.update', '78eefbc3-b248-4d7c-a355-a83ed0103c4b', '2024-10-17 07:31:15', NULL, '2024-10-17 07:31:15', NULL),
('aa1f7900-4741-4f75-8854-9506cc4bacc9', 'Role Delete Permit', 'Role Delete', 'role.delete', '10aa1d11-270c-47ab-8c03-d20bc20225e8', '2024-10-17 07:33:15', NULL, '2024-10-17 07:33:15', NULL),
('be784f9b-9c10-409d-ae84-21f270d680de', 'Module Delete Permit', 'Module Delete', 'module.delete', '78eefbc3-b248-4d7c-a355-a83ed0103c4b', '2024-10-17 07:31:53', NULL, '2024-10-17 07:31:53', NULL),
('c4114751-4829-45a2-88f9-96b07f8c3ff8', 'Dashboard View Permit', 'Dashboard View', 'dashboard.view', '42634834-66e0-45bf-8835-99f2004a3b05', '2024-10-17 04:28:31', NULL, '2024-10-17 04:32:15', NULL),
('ca64c1af-3bd1-4804-9181-7f4b325d2368', 'User Delete Permit', 'User Delete', 'user.delete', '3cf3d831-0a27-4c1d-8cce-cd7a6649ecd7', '2024-10-17 07:34:46', NULL, '2024-10-17 07:34:46', NULL),
('cd7e7337-b2f6-4ad2-bd0f-c27d2de0cc96', 'User Update Permit', 'User Update', 'user.update', '3cf3d831-0a27-4c1d-8cce-cd7a6649ecd7', '2024-10-17 07:34:36', NULL, '2024-10-17 07:34:36', NULL),
('f2238d3b-9cc8-4cba-ae56-1abe592c990e', 'Role List View Permit', 'Role List View', 'role.list', '10aa1d11-270c-47ab-8c03-d20bc20225e8', '2024-10-17 07:32:37', NULL, '2024-10-17 07:32:37', NULL),
('f99117e0-ba23-4a96-8aef-b428916a7001', 'Role Create Permit', 'Role Create', 'role.create', '10aa1d11-270c-47ab-8c03-d20bc20225e8', '2024-10-17 07:32:52', NULL, '2024-10-17 07:32:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `uid` varchar(40) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`uid`, `name`, `slug`, `description`) VALUES
('4dd36f70-7a68-44e3-9b43-42d85c179f77', 'Admin', 'admin', 'Admin Pengadilan'),
('731f53cb-5c48-4b5f-add6-bb5e6abc9698', 'Super Admin', 'super_admin', 'Being a super admin');

-- --------------------------------------------------------

--
-- Table structure for table `role_permissions`
--

CREATE TABLE `role_permissions` (
  `role_uid` varchar(40) NOT NULL,
  `permission_uid` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role_permissions`
--

INSERT INTO `role_permissions` (`role_uid`, `permission_uid`) VALUES
('4dd36f70-7a68-44e3-9b43-42d85c179f77', 'c4114751-4829-45a2-88f9-96b07f8c3ff8'),
('731f53cb-5c48-4b5f-add6-bb5e6abc9698', '1e65f1cc-4a52-4a25-949f-18e436984511'),
('731f53cb-5c48-4b5f-add6-bb5e6abc9698', '4b4a3ae2-ce54-47a5-b682-0ef8e86ae0f6'),
('731f53cb-5c48-4b5f-add6-bb5e6abc9698', '54932999-cc85-4131-a857-107714f4edc5'),
('731f53cb-5c48-4b5f-add6-bb5e6abc9698', '55c3c286-5727-44cc-8693-ab369406fd1d'),
('731f53cb-5c48-4b5f-add6-bb5e6abc9698', '5851c5a8-325b-434e-a36c-75ba0f2e2bd6'),
('731f53cb-5c48-4b5f-add6-bb5e6abc9698', '96803e1a-f019-4518-a8fb-12334d079922'),
('731f53cb-5c48-4b5f-add6-bb5e6abc9698', 'aa1f7900-4741-4f75-8854-9506cc4bacc9'),
('731f53cb-5c48-4b5f-add6-bb5e6abc9698', 'be784f9b-9c10-409d-ae84-21f270d680de'),
('731f53cb-5c48-4b5f-add6-bb5e6abc9698', 'c4114751-4829-45a2-88f9-96b07f8c3ff8'),
('731f53cb-5c48-4b5f-add6-bb5e6abc9698', 'ca64c1af-3bd1-4804-9181-7f4b325d2368'),
('731f53cb-5c48-4b5f-add6-bb5e6abc9698', 'cd7e7337-b2f6-4ad2-bd0f-c27d2de0cc96'),
('731f53cb-5c48-4b5f-add6-bb5e6abc9698', 'f2238d3b-9cc8-4cba-ae56-1abe592c990e'),
('731f53cb-5c48-4b5f-add6-bb5e6abc9698', 'f99117e0-ba23-4a96-8aef-b428916a7001');

-- --------------------------------------------------------

--
-- Table structure for table `schedule_settings`
--

CREATE TABLE `schedule_settings` (
  `meta_field` text DEFAULT NULL,
  `meta_value` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schedule_settings`
--

INSERT INTO `schedule_settings` (`meta_field`, `meta_value`) VALUES
('day_schedule', 'Monday,Tuesday,Wednesday,Thursday,Friday'),
('morning_schedule', '07:00,12:00'),
('afternoon_schedule', '14:00,17:00');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `uid` varchar(40) NOT NULL,
  `nama` varchar(40) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `harga` decimal(20,3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`uid`, `nama`, `deskripsi`, `harga`) VALUES
('249e9d71-8fb9-4afd-af93-24bd680adce9', 'BEKAM BASAH', 'Bekam basah, cangkir akan dibiarkan menempel dalam waktu yang ditentukan, biasanya sekitar 3 menit. kemudian ditusukan jarum kecil pada kulit agar darah kotor keluar. Efektif untuk yang mempunyai penyakit dalam seperti hipertensi. Cukup membayar 100 ribu rupiah.', 100000.000),
('3a34e957-ffd2-4c48-9f31-8f855828d9c7', 'KRETEK ASLI', 'Fullbody kretek dan fokus pada satu titik keluhan. Cukup membayar 200 ribu rupiah dengan durasi 20-25 menit.', 200000.000),
('46c68fb3-9ec0-4f56-b50b-68004372d64f', 'KRETEK ASLI RETOS', 'Kretek Fullbody + Keluhan + Reposisi tulang otot sendi. Cukup membayar 300 ribu rupiah dengan durasi 30-40 menit.', 300000.000),
('5552d020-d45d-4d3f-b1d9-fe77e505e8fc', 'FISIKAL PROBLEM', 'Bantu penanganan fokus pada 1 keluhan fisik yang ingin diatasi. Cukup membayar 150 ribu rupiah dengan durasi 15 menit.', 150000.000),
('85219a38-18ff-436a-a38d-fb65452a841e', 'TOTOK DARAH (AL FASHDU)', 'Pengobatan dengan cara mengeluarkan darah dari pembuluh darah vena. Disarankan untuk yang mempunyai keluhan hipertensi, kolesterol, asam urat, diabetes. Cukup membayar 100 ribu rupiah dengan durasi 30 menit.', 100000.000),
('95b73568-82f9-4b3f-94a7-f1f0f8b39435', 'KRETEK FLASH', 'Rasakan sensasi kretek fullbody untuk Anda yang memiliki keluhan pegal-pegal dan ingin coba kretek untuk relaksasi dan kebugaran, Cukup membayar 100 ribu rupiah dengan durasi 10 sampai 15 menit.', 100000.000),
('aa623b08-b4a9-433a-9b06-7d1c0fa0194a', 'SPORT MASSAGE / INJURY', 'Terapi pijat kombinasi cedera olahraga dan gerakan dasar kretek. Cukup membayar 200 ribu rupiah dengan durasi 30 menit.', 200000.000),
('c9ef66e0-0566-4011-a668-392157bd1ef3', 'BEKAM KERING', 'Bekam kering, cangkir akan dibiarkan menempel dalam waktu yang ditentukan, biasanya sekitar 3 menit. Berfungsi untuk menarik otot dalam atau mengeluarkan angin dalam tubuh dan melenturkan otot. Cukup membayar 100 ribu rupiah.', 100000.000);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('FObRuouRR6zazM1l5V4r9zyglAOGXF6bkXm5bVNC', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQjhLMlJXTWFtY0lYemtTd1JjMFlWM3V4M3h0NGZhbklTUTc2WGtlZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1731547014),
('I5kGvl0De1BaMuEpRJdYuZ0sLmkzlr1i1F61QwPs', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoid2hyajN5czdCQThQV2VsN1pDMkJIMjdiNXV0ZllzeDU2dzVWcDFncyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1731547233);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` varchar(40) NOT NULL,
  `id` bigint(50) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nip` varchar(100) DEFAULT NULL,
  `ekstansi` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `no_telp` varchar(20) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `role_uid` varchar(40) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` varchar(40) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` varchar(40) DEFAULT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT 0,
  `avatar` varchar(255) NOT NULL DEFAULT 'avatar.png',
  `dark_mode` tinyint(1) NOT NULL DEFAULT 0,
  `messenger_color` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `id`, `name`, `profile_picture`, `username`, `password`, `nip`, `ekstansi`, `email`, `no_telp`, `active`, `role_uid`, `created_at`, `created_by`, `updated_at`, `updated_by`, `active_status`, `avatar`, `dark_mode`, `messenger_color`) VALUES
('a9467865-37c1-4104-bd63-b26a33c915db', 5, 'Super Admin', NULL, 'admin', '$2y$12$ZW/e7ChmDQjTZ5S04FD9ZuGlnSkFxPcLplevfGfcrIYTLQNDDU6hm', '132456', 'Kantor Pusat Pengadilan', 'admin@email.com', '081212341234', 1, '731f53cb-5c48-4b5f-add6-bb5e6abc9698', '2024-10-18 06:52:21', NULL, '2025-03-12 20:21:34', NULL, 0, 'avatar.png', 0, '#2180f3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`uid`),
  ADD KEY `patient_uid` (`patient_uid`),
  ADD KEY `appointments_ibfk_2` (`service_uid`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`uid`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `patient_metas`
--
ALTER TABLE `patient_metas`
  ADD KEY `patient_uid` (`patient_uid`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`uid`),
  ADD KEY `module_uid` (`module_uid`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `unique_uid` (`uid`);

--
-- Indexes for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD PRIMARY KEY (`role_uid`,`permission_uid`),
  ADD KEY `permission_uid` (`permission_uid`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `unique_uid` (`uid`),
  ADD UNIQUE KEY `user_id` (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `role_uid` (`role_uid`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_ibfk_1` FOREIGN KEY (`patient_uid`) REFERENCES `patients` (`uid`) ON DELETE CASCADE,
  ADD CONSTRAINT `appointments_ibfk_2` FOREIGN KEY (`service_uid`) REFERENCES `services` (`uid`) ON DELETE CASCADE;

--
-- Constraints for table `modules`
--
ALTER TABLE `modules`
  ADD CONSTRAINT `modules_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`uid`),
  ADD CONSTRAINT `modules_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`uid`);

--
-- Constraints for table `patient_metas`
--
ALTER TABLE `patient_metas`
  ADD CONSTRAINT `patient_metas_ibfk_1` FOREIGN KEY (`patient_uid`) REFERENCES `patients` (`uid`) ON DELETE CASCADE;

--
-- Constraints for table `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `permissions_ibfk_1` FOREIGN KEY (`module_uid`) REFERENCES `modules` (`uid`) ON DELETE CASCADE,
  ADD CONSTRAINT `permissions_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `users` (`uid`),
  ADD CONSTRAINT `permissions_ibfk_3` FOREIGN KEY (`updated_by`) REFERENCES `users` (`uid`);

--
-- Constraints for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD CONSTRAINT `role_permissions_ibfk_1` FOREIGN KEY (`role_uid`) REFERENCES `roles` (`uid`),
  ADD CONSTRAINT `role_permissions_ibfk_2` FOREIGN KEY (`permission_uid`) REFERENCES `permissions` (`uid`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_uid`) REFERENCES `roles` (`uid`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `users` (`uid`),
  ADD CONSTRAINT `users_ibfk_3` FOREIGN KEY (`updated_by`) REFERENCES `users` (`uid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
