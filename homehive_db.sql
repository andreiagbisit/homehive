-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2024 at 04:25 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `homehive_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_type`
--

CREATE TABLE `account_type` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account_type`
--

INSERT INTO `account_type` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', NULL, NULL),
(2, 'Admin', NULL, NULL),
(3, 'User', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bulletin_board`
--

CREATE TABLE `bulletin_board` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `category_id` tinyint(3) UNSIGNED NOT NULL,
  `post_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bulletin_board`
--

INSERT INTO `bulletin_board` (`id`, `title`, `description`, `category_id`, `post_date`, `created_at`, `updated_at`) VALUES
(1, 'Final Defense', '<p>Final Defense</p>', 5, '2024-11-05', '2024-10-17 04:52:24', '2024-10-17 04:52:24'),
(2, 'Final Defense 2', '<p><ul><li><span style=\"color: rgb(0, 128, 0);\">Final Defense</span></li></ul></p>', 5, '2024-11-06', '2024-10-18 08:44:07', '2024-10-18 08:44:07'),
(3, 'Christmas Party', '<p><span style=\"color: rgb(255, 0, 0); font-weight: bold;\">Christmas Party</span></p>', 3, '2024-12-20', '2024-10-19 17:45:43', '2024-10-19 17:45:43'),
(4, 'Christmas Party 2', '<p style=\"text-align: center; \"><span style=\"font-weight: bold; font-style: italic; text-decoration-line: underline; background-color: rgb(255, 153, 0); font-size: 36px; font-family: &quot;Comic Sans MS&quot;;\">Christmas Party</span></p>', 3, '2024-10-15', '2024-10-19 17:48:22', '2024-10-19 17:48:22');

-- --------------------------------------------------------

--
-- Table structure for table `bulletin_board_category`
--

CREATE TABLE `bulletin_board_category` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `hex_code` varchar(7) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bulletin_board_category`
--

INSERT INTO `bulletin_board_category` (`id`, `name`, `hex_code`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Test Category 2', '#ffffff', '2024-10-14 07:14:42', '2024-10-17 00:38:53', '2024-10-17 00:38:53'),
(2, 'Test Category Hello', '#000000', '2024-10-17 00:39:11', '2024-10-17 02:49:32', '2024-10-17 02:49:32'),
(3, 'Christmas Party', '#ff0000', '2024-10-17 02:59:37', '2024-10-18 21:50:24', NULL),
(4, 'Thanksgiving', '#000000', '2024-10-17 03:00:04', '2024-10-17 03:09:34', NULL),
(5, 'Final Defense', '#00eb2f', '2024-10-17 03:54:37', '2024-10-17 03:54:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('bc33ea4e26e5e1af1408321416956113a4658763', 'i:1;', 1729329863),
('bc33ea4e26e5e1af1408321416956113a4658763:timer', 'i:1729329863;', 1729329863);

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
-- Table structure for table `facility_reservation`
--

CREATE TABLE `facility_reservation` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `facility_id` tinyint(3) UNSIGNED NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `fee` int(10) UNSIGNED NOT NULL,
  `payment_mode_id` smallint(5) UNSIGNED NOT NULL,
  `payment_collector_id` tinyint(3) UNSIGNED NOT NULL,
  `appt_date` date NOT NULL,
  `appt_time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(42, '0001_01_01_000001_create_cache_table', 1),
(43, '0001_01_01_000002_create_jobs_table', 1),
(44, '2024_07_24_183443_create_account_type_table', 1),
(45, '2024_07_24_183501_create_payment_category_table', 1),
(46, '2024_07_24_183520_create_payment_mode_table', 1),
(47, '2024_07_24_183539_create_payment_status_table', 1),
(48, '2024_07_24_183548_create_payment_collector_table', 1),
(49, '2024_07_24_183603_create_permission_table', 1),
(50, '2024_07_24_183615_create_privilege_table', 1),
(51, '2024_07_24_183630_create_subdivision_role_table', 1),
(52, '2024_07_24_183641_create_subdivision_facility_table', 1),
(53, '2024_07_24_183701_create_users_table', 1),
(54, '2024_07_24_183723_create_bulletin_board_category_table', 1),
(55, '2024_07_24_183737_create_bulletin_board_table', 1),
(56, '2024_07_24_183746_create_notification_table', 1),
(57, '2024_07_24_183753_create_payment_table', 1),
(58, '2024_07_24_183806_create_facility_reservation_table', 1),
(59, '2024_07_24_183818_create_vehicle_sticker_application_table', 1),
(60, '2024_08_29_060930_add_street_to_users_table', 1),
(61, '2024_09_01_065411_update_street_column_in_users_table', 1),
(62, '2024_09_11_120656_add_profile_picture_to_users_table', 2),
(63, '2024_10_13_034558_add_is_verified_to_users_table', 3),
(64, '2024_10_13_101703_add_deleted_at_to_users_table', 4),
(65, '2024_10_14_035100_modify_street_nullable', 5),
(66, '2024_10_14_084033_update_unique_constraints_on_users_table', 6),
(67, '2024_10_14_144949_add_hex_code_to_bulletin_board_category', 7),
(68, '2024_10_17_081744_add_deleted_at_to_bulletin_board_category_table', 8),
(69, '2024_10_19_094053_create_password_resets_table', 9),
(70, '2024_10_20_022343_modify_description_column_in_bulletin_board_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `number` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `category_id` tinyint(3) UNSIGNED NOT NULL,
  `fee` int(11) NOT NULL,
  `status_id` tinyint(3) UNSIGNED NOT NULL,
  `pay_date` date NOT NULL,
  `mode_id` smallint(5) UNSIGNED NOT NULL,
  `collector_id` tinyint(3) UNSIGNED NOT NULL,
  `receipt_img` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_category`
--

CREATE TABLE `payment_category` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_collector`
--

CREATE TABLE `payment_collector` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_mode`
--

CREATE TABLE `payment_mode` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_status`
--

CREATE TABLE `payment_status` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE `permission` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `privilege`
--

CREATE TABLE `privilege` (
  `id` int(10) UNSIGNED NOT NULL,
  `account_type_id` tinyint(3) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('jAUiYT1jW4niBpmdh2BCNiOF7qV9mmaIh764x9sr', 20, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36 OPR/113.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoieldXd3Rnd0pWcHVaY1YyRWx5Z21tNllGWERrRGdoUzRiNVFvS1J3VyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9idWxsZXRpbi1ib2FyZC9hZG1pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjIwO30=', 1729390667);

-- --------------------------------------------------------

--
-- Table structure for table `subdivision_facility`
--

CREATE TABLE `subdivision_facility` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subdivision_role`
--

CREATE TABLE `subdivision_role` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subdivision_role`
--

INSERT INTO `subdivision_role` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Sample Role', '2024-10-13 01:30:20', '2024-10-17 00:49:34'),
(2, 'Resident', '2024-10-13 01:33:38', '2024-10-13 01:33:38'),
(3, 'Resident', '2024-10-13 01:33:46', '2024-10-13 01:33:46'),
(4, 'Resident', '2024-10-13 02:00:25', '2024-10-13 02:00:25'),
(5, 'Panel Admin', '2024-10-13 02:00:33', '2024-10-14 04:09:40'),
(6, 'Subdivision Super Admin', '2024-10-13 03:39:45', '2024-10-13 03:39:45'),
(7, 'HOA President', '2024-10-14 05:42:17', '2024-10-14 05:42:17'),
(8, 'Resident', '2024-10-16 23:46:07', '2024-10-16 23:46:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `uname` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL,
  `account_type_id` tinyint(3) UNSIGNED NOT NULL,
  `is_verified` tinyint(1) NOT NULL DEFAULT 0,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) NOT NULL,
  `bdate` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_no` varchar(255) NOT NULL,
  `street` varchar(255) DEFAULT NULL,
  `house_blk_no` tinyint(3) UNSIGNED NOT NULL,
  `house_lot_no` tinyint(3) UNSIGNED NOT NULL,
  `subdivision_role_id` tinyint(3) UNSIGNED DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uname`, `password`, `account_type_id`, `is_verified`, `fname`, `mname`, `lname`, `bdate`, `email`, `contact_no`, `street`, `house_blk_no`, `house_lot_no`, `subdivision_role_id`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`, `profile_picture`, `deleted_at`) VALUES
(6, 'SuperAdmin', '$2y$12$/.PuSnnydoipKbH4wDMV9ePwiUS7Nb7Q.6qrZ.Yskc.C2SB2VCyFO', 1, 1, 'Super', 'Homehive', 'Admin', '2024-09-17', 'SuperAdmin@gmail.com', '09576458344', 'Acacia', 23, 32, 6, '2024-10-19 07:55:45', NULL, '2024-09-02 09:47:30', '2024-10-13 03:39:45', 'https://homehivemedia.blob.core.windows.net/homehivemedia/profile-pictures/1727510961_steph.jpg', NULL),
(7, 'Panel 1 Admin', '$2y$12$vwtdh6uD7ZRUzpd0.JbVauB7e3bH4T1ZsXzgww87gRbsYSq0cDr/m', 2, 1, 'Daisy', 'Yap', 'Admin', '2024-09-10', 'Panel1Admin@gmail.com', '09857456755', 'Sesame', 22, 22, 5, '2024-10-19 07:55:45', NULL, '2024-09-02 01:48:32', '2024-10-16 23:35:04', 'https://homehivemedia.blob.core.windows.net/homehivemedia/profile-pictures/default-profile.png', NULL),
(8, 'Panel 2 Admin', '$2y$12$DupB3AqYdi/xegtyeTD9rOKq/RKKYRuuX4m7J.cZNHoL9DzEvjcXe', 2, 1, 'Joey', 'Aviles', 'Admin', '2024-09-24', 'Panel2Admin@gmail.com', '09867564566', 'Acacia', 23, 42, 4, '2024-10-19 07:55:45', NULL, '2024-09-02 01:49:07', '2024-10-14 01:19:26', NULL, NULL),
(11, 'Panel 1 Resident', '$2y$12$Mt3xKO7fSV.KiGU8qCVnNOzydpxE38iqJupIBl18Entq1lxaZ06I6', 2, 1, 'Daisy', 'Yap', 'Resident', '2024-09-20', 'Panel1Resident@gmail.com', '09576857433', 'Sesame', 3, 23, 2, '2024-10-19 07:55:45', NULL, '2024-09-02 02:31:25', '2024-10-14 01:25:58', NULL, NULL),
(12, 'User45', '$2y$12$TUSI95Ud14EtWuQqen4gCexfwuyF1zo73SLiu.77ffPfw7isPJX4u', 3, 1, 'User45', NULL, 'User45', '2024-09-24', 'User45@gmail.com', '09576458344', 'Acacia', 32, 3, NULL, NULL, NULL, '2024-09-02 03:04:05', '2024-10-13 02:29:14', NULL, '2024-10-13 02:29:14'),
(13, 'User100', '$2y$12$6gFO5BXvZR2n1g28gmZJH.PyDzFox/3l6qCevw1rv4.2yc5M80aaK', 3, 1, 'User100', NULL, 'User100', '2024-09-19', 'User100@gmail.com', '09576857433', 'Santol', 45, 63, NULL, NULL, NULL, '2024-09-02 03:08:05', '2024-10-13 02:24:23', NULL, '2024-10-13 02:24:23'),
(14, 'User56', '$2y$12$WPU.SwTrL/jbnTIdy9vGB.BHNvGz/eBiGRUE217lB4a7Y65yvYoNu', 3, 1, 'User45', 'User45', 'User45', '2024-10-01', 'User54@gmail.com', '09876574566', 'Rizal', 3, 6, NULL, NULL, NULL, '2024-09-02 03:15:41', '2024-10-13 02:34:09', NULL, '2024-10-13 02:34:09'),
(15, 'Panel 2 Resident', '$2y$12$YIAaWPMcucBlAb9W3gUe4.TlwJ1K96hjZHeEgYf7oTKCIWLCm3EaS', 3, 1, 'Joey', 'Aviles', 'Resident', '2024-09-24', 'Panel2Resident@gmail.com', '09857456755', 'Seaside', 25, 54, NULL, '2024-10-19 07:55:45', NULL, '2024-09-02 03:26:52', '2024-10-13 21:35:49', 'https://homehivemedia.blob.core.windows.net/homehivemedia/profile-pictures/default-profile.png', NULL),
(16, 'User1', '$2y$12$siYUNwr7iols/841pnMS/OPhWBjakbsINhoru.1WASjyrTN.lU82K', 3, 1, 'User1', 'User12', 'User12', '2024-09-09', 'User1@gmail.com', '09867564566', 'Santol', 4, 78, NULL, NULL, NULL, '2024-09-02 03:37:32', '2024-10-13 23:42:38', 'https://homehivemedia.blob.core.windows.net/homehivemedia/profile-pictures/default-profile.png', '2024-10-13 23:42:38'),
(17, 'User2', '$2y$12$/.8L5APdF59ddw.ifpxXqu.hAreg17C24C8x1Gbp5NvggED3SEfXa', 3, 1, 'User2', NULL, 'User13', '2024-09-24', 'User2@gmail.com', '09574653455', 'Lucy', 32, 67, NULL, NULL, NULL, '2024-09-02 03:38:30', '2024-10-17 02:48:18', NULL, '2024-10-17 02:48:18'),
(18, 'User1', '$2y$12$0P2y5jwe0KXBlL8aa9pMLujfEnZBR7BsAaY0gE09mN7ktS9NvDHAW', 3, 1, 'User14', NULL, 'User14', '2024-09-17', 'User1@gmail.com', '09576458344', 'Bonifacio', 32, 32, 8, NULL, NULL, '2024-09-02 03:39:12', '2024-10-17 02:54:31', NULL, '2024-10-17 02:54:31'),
(20, 'Admin', '$2y$12$OeVaNvRzDxhk1cVw6hSRUuE5ncpQJWdWRntR4yvjloik128HZs7SS', 2, 1, 'Trinidad', 'Village', 'Admin', '2024-09-20', 'Admin@gmail.com', '09576857433', 'Acacia', 23, 45, 1, '2024-10-19 07:55:45', NULL, '2024-09-02 12:17:22', '2024-10-19 17:44:33', 'https://homehivemedia.blob.core.windows.net/homehivemedia/profile-pictures/default-profile.png', NULL),
(22, 'HOA President Josuel', '$2y$12$ulYgDxuLSieSvGVDo2BXUO19IUUSeaZ5SIfKoM7889pNuCqdWAquq', 2, 1, 'Josuel', 'Josuel', 'Josuel', '2024-09-23', 'User3@gmail.com', '09867564566', 'Los Angeles', 11, 14, 7, '2024-10-19 07:55:45', NULL, '2024-09-03 21:54:45', '2024-10-14 05:42:17', NULL, NULL),
(23, 'User50', '$2y$12$FvVqXVnTnH01sSoEDcaCT.IF0bi6jEqx8NhtObVV78kEFaAokviQ.', 3, 1, 'User50', NULL, 'User50', '2024-09-12', 'User50@gmail.com', '09876574566', 'Bonifacio', 3, 32, 3, NULL, NULL, '2024-09-27 20:12:54', '2024-10-13 02:34:38', NULL, '2024-10-13 02:34:38'),
(24, 'Steak and Frice Resident', '$2y$12$3pedxkURd1XLHZxATaX2OO8TzWU10M6.ZzZat1H.EbCIQuHYGIaiW', 3, 1, 'Unverified', NULL, 'User', '2024-10-15', 'UnverifiedUser@gmail.com', '09576458344', 'Bonifacio', 4, 32, NULL, '2024-10-19 07:55:45', NULL, '2024-10-12 19:32:50', '2024-10-19 00:45:20', 'https://homehivemedia.blob.core.windows.net/homehivemedia/profile-pictures/1728793967_unnamed.png', NULL),
(25, 'HomeHiveUser', '$2y$12$WsWWeHdulBjYKuYPygh/6.WYZGJiouPJbzXtG54eHDV78zdIpflJa', 3, 0, 'Home', 'Hive', 'User', '2024-10-15', 'homehivesystem@gmail.com', '858340958309453', 'Bonifacio', 11, 11, NULL, '2024-10-18 23:35:26', NULL, '2024-10-18 23:19:21', '2024-10-18 23:56:49', NULL, '2024-10-18 23:56:49'),
(26, 'HomeHiveUser', '$2y$12$.JszieeyINJEaiYMNjelme2k.ZWPNGhNQbRDBS0E7Cn2dhkdvPg.C', 3, 0, 'Home', 'Hiv', 'User', '2024-10-15', 'homehivesystem@gmail.com', '0985734752', 'Bonifacio', 32, 3, NULL, '2024-10-19 00:02:43', NULL, '2024-10-19 00:02:29', '2024-10-19 00:03:59', NULL, '2024-10-19 00:03:59'),
(27, 'HomeHiveUser', '$2y$12$LWyFDNpIT3Q7NKULcC7v3uT.kVLWjSciYEqT99QLYJqDHVIZH4Dx2', 3, 1, 'Home', 'Hive', 'User', '2024-10-01', 'homehivesystem@gmail.com', '09576458344', 'Sesame', 45, 3, NULL, '2024-10-19 01:23:23', NULL, '2024-10-19 01:23:13', '2024-10-19 02:25:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_sticker_application`
--

CREATE TABLE `vehicle_sticker_application` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `registered_owner` varchar(255) NOT NULL,
  `make` varchar(255) NOT NULL,
  `series` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `plate_no` varchar(255) NOT NULL,
  `fee` int(10) UNSIGNED NOT NULL,
  `payment_mode_id` smallint(5) UNSIGNED NOT NULL,
  `payment_collector_id` tinyint(3) UNSIGNED NOT NULL,
  `appt_date` date NOT NULL,
  `appt_time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_type`
--
ALTER TABLE `account_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bulletin_board`
--
ALTER TABLE `bulletin_board`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bulletin_board_category_id_foreign` (`category_id`);

--
-- Indexes for table `bulletin_board_category`
--
ALTER TABLE `bulletin_board_category`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `facility_reservation`
--
ALTER TABLE `facility_reservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `facility_reservation_user_id_foreign` (`user_id`),
  ADD KEY `facility_reservation_facility_id_foreign` (`facility_id`),
  ADD KEY `facility_reservation_payment_mode_id_foreign` (`payment_mode_id`),
  ADD KEY `facility_reservation_payment_collector_id_foreign` (`payment_collector_id`);

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
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notification_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `payment_number_unique` (`number`),
  ADD KEY `payment_user_id_foreign` (`user_id`),
  ADD KEY `payment_category_id_foreign` (`category_id`),
  ADD KEY `payment_status_id_foreign` (`status_id`),
  ADD KEY `payment_mode_id_foreign` (`mode_id`),
  ADD KEY `payment_collector_id_foreign` (`collector_id`);

--
-- Indexes for table `payment_category`
--
ALTER TABLE `payment_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_collector`
--
ALTER TABLE `payment_collector`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_mode`
--
ALTER TABLE `payment_mode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_status`
--
ALTER TABLE `payment_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `privilege`
--
ALTER TABLE `privilege`
  ADD PRIMARY KEY (`id`),
  ADD KEY `privilege_account_type_id_foreign` (`account_type_id`),
  ADD KEY `privilege_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `subdivision_facility`
--
ALTER TABLE `subdivision_facility`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subdivision_role`
--
ALTER TABLE `subdivision_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_uname_deleted_at_unique` (`uname`,`deleted_at`),
  ADD UNIQUE KEY `users_email_deleted_at_unique` (`email`,`deleted_at`),
  ADD KEY `users_account_type_id_foreign` (`account_type_id`),
  ADD KEY `users_subdivision_role_id_foreign` (`subdivision_role_id`);

--
-- Indexes for table `vehicle_sticker_application`
--
ALTER TABLE `vehicle_sticker_application`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vehicle_sticker_application_user_id_foreign` (`user_id`),
  ADD KEY `vehicle_sticker_application_payment_mode_id_foreign` (`payment_mode_id`),
  ADD KEY `vehicle_sticker_application_payment_collector_id_foreign` (`payment_collector_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_type`
--
ALTER TABLE `account_type`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bulletin_board`
--
ALTER TABLE `bulletin_board`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bulletin_board_category`
--
ALTER TABLE `bulletin_board_category`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `facility_reservation`
--
ALTER TABLE `facility_reservation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_category`
--
ALTER TABLE `payment_category`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_collector`
--
ALTER TABLE `payment_collector`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_mode`
--
ALTER TABLE `payment_mode`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_status`
--
ALTER TABLE `payment_status`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permission`
--
ALTER TABLE `permission`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `privilege`
--
ALTER TABLE `privilege`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subdivision_facility`
--
ALTER TABLE `subdivision_facility`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subdivision_role`
--
ALTER TABLE `subdivision_role`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `vehicle_sticker_application`
--
ALTER TABLE `vehicle_sticker_application`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bulletin_board`
--
ALTER TABLE `bulletin_board`
  ADD CONSTRAINT `bulletin_board_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `bulletin_board_category` (`id`);

--
-- Constraints for table `facility_reservation`
--
ALTER TABLE `facility_reservation`
  ADD CONSTRAINT `facility_reservation_facility_id_foreign` FOREIGN KEY (`facility_id`) REFERENCES `subdivision_facility` (`id`),
  ADD CONSTRAINT `facility_reservation_payment_collector_id_foreign` FOREIGN KEY (`payment_collector_id`) REFERENCES `payment_collector` (`id`),
  ADD CONSTRAINT `facility_reservation_payment_mode_id_foreign` FOREIGN KEY (`payment_mode_id`) REFERENCES `payment_mode` (`id`),
  ADD CONSTRAINT `facility_reservation_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `payment_category` (`id`),
  ADD CONSTRAINT `payment_collector_id_foreign` FOREIGN KEY (`collector_id`) REFERENCES `payment_collector` (`id`),
  ADD CONSTRAINT `payment_mode_id_foreign` FOREIGN KEY (`mode_id`) REFERENCES `payment_mode` (`id`),
  ADD CONSTRAINT `payment_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `payment_status` (`id`),
  ADD CONSTRAINT `payment_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `privilege`
--
ALTER TABLE `privilege`
  ADD CONSTRAINT `privilege_account_type_id_foreign` FOREIGN KEY (`account_type_id`) REFERENCES `account_type` (`id`),
  ADD CONSTRAINT `privilege_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permission` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_account_type_id_foreign` FOREIGN KEY (`account_type_id`) REFERENCES `account_type` (`id`),
  ADD CONSTRAINT `users_subdivision_role_id_foreign` FOREIGN KEY (`subdivision_role_id`) REFERENCES `subdivision_role` (`id`);

--
-- Constraints for table `vehicle_sticker_application`
--
ALTER TABLE `vehicle_sticker_application`
  ADD CONSTRAINT `vehicle_sticker_application_payment_collector_id_foreign` FOREIGN KEY (`payment_collector_id`) REFERENCES `payment_collector` (`id`),
  ADD CONSTRAINT `vehicle_sticker_application_payment_mode_id_foreign` FOREIGN KEY (`payment_mode_id`) REFERENCES `payment_mode` (`id`),
  ADD CONSTRAINT `vehicle_sticker_application_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
