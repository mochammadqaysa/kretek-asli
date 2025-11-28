-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2025 at 03:12 AM
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
  `terapis_uid` varchar(40) DEFAULT NULL,
  `date_sched` datetime NOT NULL,
  `keluhan` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`uid`, `patient_uid`, `service_uid`, `terapis_uid`, `date_sched`, `keluhan`, `status`, `created_at`, `created_by`) VALUES
('0cbfa882-a8f2-43a3-8a0f-00c8633f86c7', 'bb2b9e8e-b227-4f2d-8c73-d03dbb2890ad', '3a34e957-ffd2-4c48-9f31-8f855828d9c7', 'a6d38b93-44fe-4e4b-a748-4cb058f79cad', '2025-11-24 08:30:00', 'sakit', 1, '2025-11-22 18:13:51', 'a9467865-37c1-4104-bd63-b26a33c915db'),
('456ae502-d5f9-4bb7-bb2c-2fb0acbaf40a', '7a2a2d8a-829f-473c-972e-c6c0b42923f8', '3a34e957-ffd2-4c48-9f31-8f855828d9c7', NULL, '2025-07-17 20:00:00', 'loro awak', 1, '2025-07-17 07:37:01', NULL),
('6085a123-615e-4873-953e-9c952946d63c', '7b7f8c3f-630a-4657-9bf5-b24b9b31f816', '3a34e957-ffd2-4c48-9f31-8f855828d9c7', NULL, '2025-07-17 20:00:00', 'loroo', 1, '2025-07-17 07:38:32', NULL),
('88e00478-ecce-46f9-8d23-29408700fd7f', 'b1f7bdf2-daf3-4d88-9c2c-0806fe53074d', '3a34e957-ffd2-4c48-9f31-8f855828d9c7', 'a6d38b93-44fe-4e4b-a748-4cb058f79cad', '2025-11-24 09:00:00', 'sakiut', 1, '2025-11-22 18:35:40', NULL),
('c809f61e-de58-4eb2-86c0-631fd59457e2', '02b8947f-ba03-400a-88c9-eaa6fe39fb97', '46c68fb3-9ec0-4f56-b50b-68004372d64f', NULL, '2025-07-17 20:00:00', 'rareti', 1, '2025-07-17 07:39:15', NULL),
('ec4ac523-eeea-48a3-acd7-92f6e01f0979', 'e999f450-411d-42ca-97fb-29cbcb318e67', '3a34e957-ffd2-4c48-9f31-8f855828d9c7', NULL, '2025-07-17 13:00:00', 'pinggang sakit', 1, '2025-07-15 04:49:31', NULL),
('ec9a1125-5bf0-48bc-b961-c22288730de6', 'da0c31b7-8955-4c0f-a920-f20285688f79', '3a34e957-ffd2-4c48-9f31-8f855828d9c7', 'a6d38b93-44fe-4e4b-a748-4cb058f79cad', '2025-11-24 08:00:00', 'sakit', 1, '2025-11-22 18:12:01', 'a9467865-37c1-4104-bd63-b26a33c915db'),
('fdeb4ab8-c6bd-483d-8e3c-310bc74c1561', '8e90d224-f6bf-4e78-915e-45f830b09702', '95b73568-82f9-4b3f-94a7-f1f0f8b39435', NULL, '2025-07-15 15:30:00', 'pinggang sakit', 1, '2025-07-15 05:30:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cabang`
--

CREATE TABLE `cabang` (
  `uid` varchar(40) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `map_link` text DEFAULT NULL,
  `img_path` varchar(255) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` varchar(40) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cabang`
--

INSERT INTO `cabang` (`uid`, `nama`, `alamat`, `map_link`, `img_path`, `latitude`, `longitude`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
('6d8289c9-86a6-442e-bda7-3f6325074616', 'Kretek Bandung', 'Jl. Muara Baru No.25, Situsaeur, Kec. Bojongloa Kidul, Kota Bandung, Jawa Barat 40233', 'https://www.google.com/maps/place/Kretek+Bandung/@-6.9399531,107.5952135,17z/data=!3m1!4b1!4m6!3m5!1s0x2e68e90006f34d5d:0xac42010e7bb1ba9c!8m2!3d-6.9399584!4d107.5977884!16s%2Fg%2F11vqsclrs2?entry=tts&g_ep=EgoyMDI1MDgyNS4wIPu8ASoASAFQAw%3D%3D&skid=d0e2c60d-1811-4c88-b8ff-279fc9251a98', '1764294416.png', '-6.939945343603998', '107.59778753807441', '2025-11-21 04:19:49', NULL, '2025-11-28 01:46:56', NULL),
('bb855045-2173-4632-ae4a-43934cd297bc', 'Kretek Parahyangan', 'Jl. Sukamulya Indah 8 No.8, Sukagalih, Kec. Sukajadi, Kota Bandung, Jawa Barat 40163', 'https://www.google.com/maps/place/Kretek+Parahyangan+-%22International+Certified%22/@-6.8861336,107.5861939,17z/data=!3m1!4b1!4m6!3m5!1s0x2e68e7c833e8048d:0xb92684c33afd5bb8!8m2!3d-6.8861336!4d107.5861939!16s%2Fg%2F11ltjpbr_t?entry=ttu&g_ep=EgoyMDI1MTExNy4wIKXMDSoASAFQAw%3D%3D', '1764005694.png', '-6.886117754449917', '107.58619571744178', '2025-11-21 03:48:55', NULL, '2025-11-28 01:40:31', NULL),
('c4b1ea59-695d-446b-8919-76f6dc4176bf', 'Kretek Asli', 'Komp, Jl. Ujungberung Indah Raya No.Kav 15, RW.No 15, Cigending, Kec. Ujung Berung, Kota Bandung, Jawa Barat 40199', 'https://www.google.com/maps/place/Kretek+Asli+-+%22International+Certified%22/data=!4m2!3m1!1s0x0:0x6213dde3fdc9d755?sa=X&ved=1t:2428&ictx=111', '1764294467.png', '-6.909927379387688', '107.69691714767148', '2025-11-24 17:04:26', NULL, '2025-11-28 01:47:47', NULL);

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
('02b8947f-ba03-400a-88c9-eaa6fe39fb97', 'kae', '2025-07-17 07:39:15', NULL),
('04173860-5611-45e3-8a25-57c35e460fd9', 'indra', '2025-07-19 12:58:14', NULL),
('0a29ee10-0875-48eb-bfee-ceedf15fb96e', 'Rifki Pratama OKtavian', '2025-06-11 06:03:21', NULL),
('4797c859-e113-471b-bf1c-5525ed906f84', 'kowe', '2025-07-17 07:37:49', NULL),
('52235a23-911e-4fc6-99c6-5bc92a4f4c20', 'MAGNUM', '2025-11-21 08:30:48', NULL),
('5414690d-54a8-4c0f-8de2-cdf09194dad2', 'toni', '2025-07-19 12:58:55', NULL),
('60ccec07-d962-49e0-9937-936d2126bda2', 'MAGNUM', '2025-11-21 08:26:09', 'a9467865-37c1-4104-bd63-b26a33c915db'),
('6de95bb7-078b-4a5f-a17f-c4993fcc02ca', 'angga', '2025-07-19 12:57:28', NULL),
('7a2a2d8a-829f-473c-972e-c6c0b42923f8', 'Aku', '2025-07-17 07:37:01', NULL),
('7b7f8c3f-630a-4657-9bf5-b24b9b31f816', 'koen', '2025-07-17 07:38:32', NULL),
('8e90d224-f6bf-4e78-915e-45f830b09702', 'Rifki Pratama OKtavian', '2025-07-15 05:30:26', NULL),
('967dbd30-6636-4226-b94f-cb1ec3980e1a', 'Rifki Pratama OKtavian', '2025-06-11 06:03:14', NULL),
('9bd686f8-f720-4a09-a6dc-8e40f9317bec', 'Mochammad Qaysa Al-Haq', '2025-06-11 02:56:46', 'a9467865-37c1-4104-bd63-b26a33c915db'),
('a9f1d393-9b90-47bc-b29b-dd024f20066b', 'Fajar', '2025-11-22 18:35:02', NULL),
('b1f7bdf2-daf3-4d88-9c2c-0806fe53074d', 'Fajar', '2025-11-22 18:35:40', NULL),
('b5e7d2a7-0d0b-48f8-abdb-bc4b79d54bee', 'ABS', '2025-11-21 08:09:30', 'a9467865-37c1-4104-bd63-b26a33c915db'),
('bb2b9e8e-b227-4f2d-8c73-d03dbb2890ad', 'Fauzan', '2025-11-22 18:13:51', 'a9467865-37c1-4104-bd63-b26a33c915db'),
('da0c31b7-8955-4c0f-a920-f20285688f79', 'Ahdim', '2025-11-22 18:12:01', 'a9467865-37c1-4104-bd63-b26a33c915db'),
('e999f450-411d-42ca-97fb-29cbcb318e67', 'indra permana', '2025-07-15 04:49:31', NULL);

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
('9bd686f8-f720-4a09-a6dc-8e40f9317bec', 'nama', 'Mochammad Qaysa Al-Haq'),
('9bd686f8-f720-4a09-a6dc-8e40f9317bec', 'email', 'rifky@gmail.com'),
('9bd686f8-f720-4a09-a6dc-8e40f9317bec', 'kontak', NULL),
('9bd686f8-f720-4a09-a6dc-8e40f9317bec', 'tanggal_lahir', '2003-01-11'),
('9bd686f8-f720-4a09-a6dc-8e40f9317bec', 'jenis_kelamin', 'PRIA'),
('9bd686f8-f720-4a09-a6dc-8e40f9317bec', 'alamat', NULL),
('967dbd30-6636-4226-b94f-cb1ec3980e1a', 'nama', 'Rifki Pratama OKtavian'),
('967dbd30-6636-4226-b94f-cb1ec3980e1a', 'email', 'rifki@gmail.com'),
('967dbd30-6636-4226-b94f-cb1ec3980e1a', 'kontak', '081212341234'),
('967dbd30-6636-4226-b94f-cb1ec3980e1a', 'tanggal_lahir', '2019-02-11'),
('967dbd30-6636-4226-b94f-cb1ec3980e1a', 'jenis_kelamin', 'PRIA'),
('967dbd30-6636-4226-b94f-cb1ec3980e1a', 'alamat', 'dekat unibi'),
('0a29ee10-0875-48eb-bfee-ceedf15fb96e', 'nama', 'Rifki Pratama OKtavian'),
('0a29ee10-0875-48eb-bfee-ceedf15fb96e', 'email', 'rifki@gmail.com'),
('0a29ee10-0875-48eb-bfee-ceedf15fb96e', 'kontak', '081212341234'),
('0a29ee10-0875-48eb-bfee-ceedf15fb96e', 'tanggal_lahir', '2019-02-11'),
('0a29ee10-0875-48eb-bfee-ceedf15fb96e', 'jenis_kelamin', 'PRIA'),
('0a29ee10-0875-48eb-bfee-ceedf15fb96e', 'alamat', 'dekat unibi'),
('e999f450-411d-42ca-97fb-29cbcb318e67', 'nama', 'indra permana'),
('e999f450-411d-42ca-97fb-29cbcb318e67', 'email', 'indra@gmail.com'),
('e999f450-411d-42ca-97fb-29cbcb318e67', 'kontak', '0882971978198'),
('e999f450-411d-42ca-97fb-29cbcb318e67', 'tanggal_lahir', '2000-11-17'),
('e999f450-411d-42ca-97fb-29cbcb318e67', 'jenis_kelamin', 'PRIA'),
('e999f450-411d-42ca-97fb-29cbcb318e67', 'alamat', 'kircon'),
('8e90d224-f6bf-4e78-915e-45f830b09702', 'nama', 'Rifki Pratama OKtavian'),
('8e90d224-f6bf-4e78-915e-45f830b09702', 'email', 'rifki@gmail.com'),
('8e90d224-f6bf-4e78-915e-45f830b09702', 'kontak', '087575678'),
('8e90d224-f6bf-4e78-915e-45f830b09702', 'tanggal_lahir', '2001-01-25'),
('8e90d224-f6bf-4e78-915e-45f830b09702', 'jenis_kelamin', 'PRIA'),
('8e90d224-f6bf-4e78-915e-45f830b09702', 'alamat', 'kircon'),
('7a2a2d8a-829f-473c-972e-c6c0b42923f8', 'nama', 'Aku'),
('7a2a2d8a-829f-473c-972e-c6c0b42923f8', 'email', 'hbsb@gmail.com'),
('7a2a2d8a-829f-473c-972e-c6c0b42923f8', 'kontak', '08820823727'),
('7a2a2d8a-829f-473c-972e-c6c0b42923f8', 'tanggal_lahir', '1999-06-11'),
('7a2a2d8a-829f-473c-972e-c6c0b42923f8', 'jenis_kelamin', 'PRIA'),
('7a2a2d8a-829f-473c-972e-c6c0b42923f8', 'alamat', 'kircon'),
('4797c859-e113-471b-bf1c-5525ed906f84', 'nama', 'kowe'),
('4797c859-e113-471b-bf1c-5525ed906f84', 'email', 'kowe@gmail.com'),
('4797c859-e113-471b-bf1c-5525ed906f84', 'kontak', '06876543456'),
('4797c859-e113-471b-bf1c-5525ed906f84', 'tanggal_lahir', '1995-07-28'),
('4797c859-e113-471b-bf1c-5525ed906f84', 'jenis_kelamin', 'PRIA'),
('4797c859-e113-471b-bf1c-5525ed906f84', 'alamat', 'bubat'),
('7b7f8c3f-630a-4657-9bf5-b24b9b31f816', 'nama', 'koen'),
('7b7f8c3f-630a-4657-9bf5-b24b9b31f816', 'email', 'koen2gmail.com'),
('7b7f8c3f-630a-4657-9bf5-b24b9b31f816', 'kontak', '067898574576'),
('7b7f8c3f-630a-4657-9bf5-b24b9b31f816', 'tanggal_lahir', '1998-07-21'),
('7b7f8c3f-630a-4657-9bf5-b24b9b31f816', 'jenis_kelamin', 'PRIA'),
('7b7f8c3f-630a-4657-9bf5-b24b9b31f816', 'alamat', 'uber'),
('02b8947f-ba03-400a-88c9-eaa6fe39fb97', 'nama', 'kae'),
('02b8947f-ba03-400a-88c9-eaa6fe39fb97', 'email', 'kae@gmail.com'),
('02b8947f-ba03-400a-88c9-eaa6fe39fb97', 'kontak', '0656789'),
('02b8947f-ba03-400a-88c9-eaa6fe39fb97', 'tanggal_lahir', '1998-04-02'),
('02b8947f-ba03-400a-88c9-eaa6fe39fb97', 'jenis_kelamin', 'PRIA'),
('02b8947f-ba03-400a-88c9-eaa6fe39fb97', 'alamat', 'cibiru'),
('6de95bb7-078b-4a5f-a17f-c4993fcc02ca', 'nama', 'angga'),
('6de95bb7-078b-4a5f-a17f-c4993fcc02ca', 'email', 'angga@gmail.com'),
('6de95bb7-078b-4a5f-a17f-c4993fcc02ca', 'kontak', '08765678'),
('6de95bb7-078b-4a5f-a17f-c4993fcc02ca', 'tanggal_lahir', '2001-02-06'),
('6de95bb7-078b-4a5f-a17f-c4993fcc02ca', 'jenis_kelamin', 'PRIA'),
('6de95bb7-078b-4a5f-a17f-c4993fcc02ca', 'alamat', 'buabat'),
('04173860-5611-45e3-8a25-57c35e460fd9', 'nama', 'indra'),
('04173860-5611-45e3-8a25-57c35e460fd9', 'email', 'indra@gmail.com'),
('04173860-5611-45e3-8a25-57c35e460fd9', 'kontak', '087657890'),
('04173860-5611-45e3-8a25-57c35e460fd9', 'tanggal_lahir', '2003-07-09'),
('04173860-5611-45e3-8a25-57c35e460fd9', 'jenis_kelamin', 'PRIA'),
('04173860-5611-45e3-8a25-57c35e460fd9', 'alamat', 'cibiru'),
('5414690d-54a8-4c0f-8de2-cdf09194dad2', 'nama', 'toni'),
('5414690d-54a8-4c0f-8de2-cdf09194dad2', 'email', 'toni@gmail.com'),
('5414690d-54a8-4c0f-8de2-cdf09194dad2', 'kontak', '08765768980'),
('5414690d-54a8-4c0f-8de2-cdf09194dad2', 'tanggal_lahir', '2002-06-11'),
('5414690d-54a8-4c0f-8de2-cdf09194dad2', 'jenis_kelamin', 'PRIA'),
('5414690d-54a8-4c0f-8de2-cdf09194dad2', 'alamat', 'uuber'),
('b5e7d2a7-0d0b-48f8-abdb-bc4b79d54bee', 'nama', 'ABS'),
('b5e7d2a7-0d0b-48f8-abdb-bc4b79d54bee', 'jenis_kelamin', 'PRIA'),
('b5e7d2a7-0d0b-48f8-abdb-bc4b79d54bee', 'kontak', NULL),
('b5e7d2a7-0d0b-48f8-abdb-bc4b79d54bee', 'email', NULL),
('b5e7d2a7-0d0b-48f8-abdb-bc4b79d54bee', 'tanggal_lahir', '2025-11-20'),
('b5e7d2a7-0d0b-48f8-abdb-bc4b79d54bee', 'alamat', NULL),
('60ccec07-d962-49e0-9937-936d2126bda2', 'nama', 'MAGNUM'),
('60ccec07-d962-49e0-9937-936d2126bda2', 'jenis_kelamin', 'PRIA'),
('60ccec07-d962-49e0-9937-936d2126bda2', 'kontak', NULL),
('60ccec07-d962-49e0-9937-936d2126bda2', 'email', NULL),
('60ccec07-d962-49e0-9937-936d2126bda2', 'tanggal_lahir', '2025-11-21'),
('60ccec07-d962-49e0-9937-936d2126bda2', 'alamat', NULL),
('52235a23-911e-4fc6-99c6-5bc92a4f4c20', 'nama', 'MAGNUM'),
('52235a23-911e-4fc6-99c6-5bc92a4f4c20', 'email', NULL),
('52235a23-911e-4fc6-99c6-5bc92a4f4c20', 'kontak', NULL),
('52235a23-911e-4fc6-99c6-5bc92a4f4c20', 'tanggal_lahir', '2025-11-21'),
('52235a23-911e-4fc6-99c6-5bc92a4f4c20', 'jenis_kelamin', 'PRIA'),
('52235a23-911e-4fc6-99c6-5bc92a4f4c20', 'alamat', NULL),
('da0c31b7-8955-4c0f-a920-f20285688f79', 'nama', 'Ahdim'),
('da0c31b7-8955-4c0f-a920-f20285688f79', 'jenis_kelamin', 'PRIA'),
('da0c31b7-8955-4c0f-a920-f20285688f79', 'kontak', NULL),
('da0c31b7-8955-4c0f-a920-f20285688f79', 'email', NULL),
('da0c31b7-8955-4c0f-a920-f20285688f79', 'tanggal_lahir', '2025-11-23'),
('da0c31b7-8955-4c0f-a920-f20285688f79', 'alamat', NULL),
('bb2b9e8e-b227-4f2d-8c73-d03dbb2890ad', 'nama', 'Fauzan'),
('bb2b9e8e-b227-4f2d-8c73-d03dbb2890ad', 'jenis_kelamin', 'PRIA'),
('bb2b9e8e-b227-4f2d-8c73-d03dbb2890ad', 'kontak', NULL),
('bb2b9e8e-b227-4f2d-8c73-d03dbb2890ad', 'email', NULL),
('bb2b9e8e-b227-4f2d-8c73-d03dbb2890ad', 'tanggal_lahir', '2025-11-23'),
('bb2b9e8e-b227-4f2d-8c73-d03dbb2890ad', 'alamat', NULL),
('a9f1d393-9b90-47bc-b29b-dd024f20066b', 'nama', 'Fajar'),
('a9f1d393-9b90-47bc-b29b-dd024f20066b', 'email', NULL),
('a9f1d393-9b90-47bc-b29b-dd024f20066b', 'kontak', NULL),
('a9f1d393-9b90-47bc-b29b-dd024f20066b', 'tanggal_lahir', '2025-11-23'),
('a9f1d393-9b90-47bc-b29b-dd024f20066b', 'jenis_kelamin', 'PRIA'),
('a9f1d393-9b90-47bc-b29b-dd024f20066b', 'alamat', NULL),
('b1f7bdf2-daf3-4d88-9c2c-0806fe53074d', 'nama', 'Fajar'),
('b1f7bdf2-daf3-4d88-9c2c-0806fe53074d', 'email', NULL),
('b1f7bdf2-daf3-4d88-9c2c-0806fe53074d', 'kontak', NULL),
('b1f7bdf2-daf3-4d88-9c2c-0806fe53074d', 'tanggal_lahir', '2025-11-23'),
('b1f7bdf2-daf3-4d88-9c2c-0806fe53074d', 'jenis_kelamin', 'PRIA'),
('b1f7bdf2-daf3-4d88-9c2c-0806fe53074d', 'alamat', NULL);

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
('4dd36f70-7a68-44e3-9b43-42d85c179f77', 'Admin', 'admin', 'Admin Kretek Asli'),
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
('morning_schedule', '08:00,12:00'),
('afternoon_schedule', '13:00,22:00');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `uid` varchar(40) NOT NULL,
  `nama` varchar(40) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `harga` decimal(20,3) DEFAULT NULL,
  `durasi` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`uid`, `nama`, `deskripsi`, `harga`, `durasi`) VALUES
('3a34e957-ffd2-4c48-9f31-8f855828d9c7', 'KRETEK ASLI', 'Fullbody kretek dan fokus pada satu titik keluhan. Cukup membayar 200 ribu rupiah dengan durasi 20-25 menit.', 200000.000, 30),
('46c68fb3-9ec0-4f56-b50b-68004372d64f', 'KRETEK ASLI RETOS', 'Kretek Fullbody + Keluhan + Reposisi tulang otot sendi. Cukup membayar 300 ribu rupiah dengan durasi 30-40 menit.', 300000.000, 40),
('5552d020-d45d-4d3f-b1d9-fe77e505e8fc', 'FISIKAL PROBLEM', 'Bantu penanganan fokus pada 1 keluhan fisik yang ingin diatasi. Cukup membayar 150 ribu rupiah dengan durasi 15 menit.', 150000.000, 15),
('95b73568-82f9-4b3f-94a7-f1f0f8b39435', 'KRETEK FLASH', 'Rasakan sensasi kretek fullbody untuk Anda yang memiliki keluhan pegal-pegal dan ingin coba kretek untuk relaksasi dan kebugaran, Cukup membayar 100 ribu rupiah dengan durasi 10 sampai 15 menit.', 100000.000, 15),
('aa623b08-b4a9-433a-9b06-7d1c0fa0194a', 'SPORT MASSAGE / INJURY', 'Terapi pijat kombinasi cedera olahraga dan gerakan dasar kretek. Cukup membayar 200 ribu rupiah dengan durasi 30 menit.', 200000.000, 25);

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
-- Table structure for table `terapis`
--

CREATE TABLE `terapis` (
  `uid` varchar(40) NOT NULL,
  `cabang_uid` varchar(40) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` varchar(40) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `terapis`
--

INSERT INTO `terapis` (`uid`, `cabang_uid`, `nama`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
('50d0b01d-4b63-4391-9ae5-e04de9fe0244', 'bb855045-2173-4632-ae4a-43934cd297bc', 'Tonny Bintaro', '2025-11-21 07:43:45', NULL, '2025-11-21 07:43:45', NULL),
('a6d38b93-44fe-4e4b-a748-4cb058f79cad', '6d8289c9-86a6-442e-bda7-3f6325074616', 'Gilang Bandung', '2025-11-21 04:20:03', NULL, '2025-11-21 07:43:31', NULL);

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
('a9467865-37c1-4104-bd63-b26a33c915db', 5, 'Super Admin', NULL, 'admin', '$2y$12$ZW/e7ChmDQjTZ5S04FD9ZuGlnSkFxPcLplevfGfcrIYTLQNDDU6hm', '132456', 'Admin Kretek Asli', 'admin@email.com', '081212341234', 1, '731f53cb-5c48-4b5f-add6-bb5e6abc9698', '2024-10-18 06:52:21', NULL, '2025-06-21 05:24:47', NULL, 0, 'avatar.png', 0, '#2180f3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`uid`),
  ADD KEY `patient_uid` (`patient_uid`),
  ADD KEY `appointments_ibfk_2` (`service_uid`),
  ADD KEY `terapis_uid` (`terapis_uid`);

--
-- Indexes for table `cabang`
--
ALTER TABLE `cabang`
  ADD PRIMARY KEY (`uid`);

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
-- Indexes for table `terapis`
--
ALTER TABLE `terapis`
  ADD PRIMARY KEY (`uid`),
  ADD KEY `cabang_uid` (`cabang_uid`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

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
  ADD CONSTRAINT `appointments_ibfk_2` FOREIGN KEY (`service_uid`) REFERENCES `services` (`uid`) ON DELETE CASCADE,
  ADD CONSTRAINT `terapis_uid` FOREIGN KEY (`terapis_uid`) REFERENCES `terapis` (`uid`) ON DELETE CASCADE;

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
-- Constraints for table `terapis`
--
ALTER TABLE `terapis`
  ADD CONSTRAINT `terapis_ibfk_1` FOREIGN KEY (`cabang_uid`) REFERENCES `cabang` (`uid`) ON DELETE CASCADE,
  ADD CONSTRAINT `terapis_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `users` (`uid`),
  ADD CONSTRAINT `terapis_ibfk_3` FOREIGN KEY (`updated_by`) REFERENCES `users` (`uid`);

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
