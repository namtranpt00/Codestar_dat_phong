-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2021 at 04:43 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codestar_dat_phong`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(4, '2014_10_12_200000_add_two_factor_columns_to_users_table', 2),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(6, '2020_12_26_035146_create_sessions_table', 2),
(11, '2014_10_12_000000_create_users_table', 3),
(12, '2014_10_12_100000_create_password_resets_table', 3),
(13, '2019_08_19_000000_create_failed_jobs_table', 3),
(14, '2021_01_01_014421_add_chucvu_to_users_table', 3),
(15, '2021_01_01_015534_create_rooms_table', 3),
(16, '2021_01_01_015637_create_services_table', 3),
(17, '2021_01_01_015726_create_room_services_table', 3),
(18, '2021_01_01_015806_create_orders_table', 4),
(19, '2021_01_01_015834_create_order_details_table', 4),
(20, '2021_01_01_023711_add_is_admin_to_users_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `time_start` datetime NOT NULL,
  `time_end` datetime NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT -1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `room_id`, `user_id`, `time_start`, `time_end`, `note`, `status`, `created_at`, `updated_at`) VALUES
(1, 17, 9, '2021-01-22 06:00:00', '2021-01-22 12:00:00', 'test', 0, '2021-01-08 19:51:57', '2021-01-09 02:28:29'),
(2, 17, 9, '2021-01-22 06:00:00', '2021-01-22 12:00:00', 'test', -1, '2021-01-08 19:53:16', '2021-01-08 19:53:16'),
(3, 17, 9, '2021-01-30 06:00:00', '2021-01-30 12:00:00', 'tết', 1, '2021-01-08 19:59:34', '2021-01-09 03:10:47'),
(4, 15, 9, '2021-01-28 12:00:00', '2021-01-28 18:00:00', '123', 0, '2021-01-08 20:00:16', '2021-01-09 02:33:33'),
(5, 14, 11, '2021-02-20 13:00:00', '2021-02-20 18:00:00', 'Học bù', 0, '2021-01-09 06:15:49', '2021-01-09 06:34:43'),
(6, 14, 11, '2021-02-26 13:00:00', '2021-02-26 18:00:00', 'Đặt phòng học clb', 1, '2021-01-09 06:24:25', '2021-01-09 06:34:31'),
(7, 15, 12, '2021-02-20 13:00:00', '2021-02-20 18:00:00', 'Mượn phòng học bù', 0, '2021-01-09 07:59:50', '2021-01-09 19:10:17'),
(8, 20, 14, '2021-02-01 06:00:00', '2021-02-01 12:00:00', 'Học bù giải tích', 1, '2021-01-09 19:07:46', '2021-01-09 19:10:08');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_of_seats` bigint(20) NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `images` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `type`, `number_of_seats`, `address`, `images`, `created_at`, `updated_at`, `is_deleted`) VALUES
(1, '101-G2', 'Phòng học', 100, 'G2', '', NULL, '2021-01-06 02:22:02', 1),
(2, '102-G2', 'Phòng học', 50, 'G2', '[]', '2021-01-06 00:15:26', '2021-01-06 00:26:51', 0),
(3, '102', '102', 10, '102', '[]', '2021-01-06 01:33:22', '2021-01-06 01:33:22', 0),
(4, '1', '1', 1, '1', '[]', '2021-01-06 01:33:47', '2021-01-06 01:33:47', 0),
(5, '1', '1', 1, '1', NULL, '2021-01-06 01:59:12', '2021-01-06 02:21:43', 1),
(6, '2', '2', 2, '2', NULL, '2021-01-06 02:00:24', '2021-01-06 02:21:56', 1),
(7, '3', '3', 3, '3', NULL, '2021-01-06 02:01:15', '2021-01-06 02:21:54', 1),
(8, '4', '4', 4, '4', NULL, '2021-01-06 02:02:18', '2021-01-06 02:21:51', 1),
(9, '5', '5', 5, '5', NULL, '2021-01-06 02:03:08', '2021-01-06 02:21:49', 1),
(10, '6', '6', 6, '6', NULL, '2021-01-06 02:03:30', '2021-01-06 02:21:46', 1),
(11, '6', '6', 6, '6', '135861792_141912637585806_8163960805772651636_n.jpg', '2021-01-06 02:03:57', '2021-01-06 02:03:57', 0),
(12, '7', '7', 7, '7', 'images.png', '2021-01-06 02:18:01', '2021-01-06 02:18:01', 0),
(13, '6', '6', 6, '6', '[]', '2021-01-06 02:18:59', '2021-01-06 02:18:59', 0),
(14, '301 G2', 'Phòng học', 60, 'G2', 'room2.jpg', '2021-01-06 02:49:57', '2021-01-06 02:49:57', 0),
(15, '101 G2', 'phòng học', 50, 'G2', 'room2.jpg', '2021-01-06 02:51:35', '2021-01-06 02:51:35', 0),
(16, '301GĐ2', 'Phòng học', 60, 'GĐ2', 'room3.jpg', '2021-01-06 02:52:24', '2021-01-06 02:52:24', 0),
(17, '202 G2', 'Phòng máy', 60, 'G23', 'room5.jpg', '2021-01-06 02:52:57', '2021-01-06 10:19:39', 0),
(18, '11', '11', 1, '1', 'room4.jpg', '2021-01-06 02:53:15', '2021-01-06 09:53:07', 1),
(19, '307GĐ2', 'phòng học', 60, 'GĐ2', 'room3.jpg', '2021-01-09 06:51:20', '2021-01-09 06:51:20', 0),
(20, 'codestar', 'Phòng học', 50, 'Bắc hà', 'room5.jpg', '2021-01-09 19:00:28', '2021-01-09 19:00:45', 0);

-- --------------------------------------------------------

--
-- Table structure for table `room_services`
--

CREATE TABLE `room_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `min` int(11) NOT NULL DEFAULT 0,
  `max` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room_services`
--

INSERT INTO `room_services` (`id`, `room_id`, `service_id`, `min`, `max`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 0, 1, '2021-01-06 01:33:22', '2021-01-06 01:33:22'),
(2, 3, 2, 0, 1, '2021-01-06 01:33:22', '2021-01-06 01:33:22'),
(3, 4, 1, 0, 1, '2021-01-06 01:33:47', '2021-01-06 01:33:47'),
(4, 9, 1, 0, 1, '2021-01-06 02:03:08', '2021-01-06 02:03:08'),
(5, 11, 2, 0, 1, '2021-01-06 02:03:57', '2021-01-06 02:03:57'),
(6, 12, 1, 0, 1, '2021-01-06 02:18:01', '2021-01-06 02:18:01'),
(7, 12, 2, 0, 1, '2021-01-06 02:18:01', '2021-01-06 02:18:01'),
(8, 13, 2, 0, 1, '2021-01-06 02:18:59', '2021-01-06 02:18:59'),
(11, 15, 1, 0, 1, '2021-01-06 02:51:35', '2021-01-06 02:51:35'),
(12, 15, 2, 0, 1, '2021-01-06 02:51:35', '2021-01-06 02:51:35'),
(13, 15, 3, 0, 1, '2021-01-06 02:51:35', '2021-01-06 02:51:35'),
(14, 16, 1, 0, 1, '2021-01-06 02:52:24', '2021-01-06 02:52:24'),
(15, 16, 2, 0, 1, '2021-01-06 02:52:24', '2021-01-06 02:52:24'),
(16, 16, 3, 0, 1, '2021-01-06 02:52:24', '2021-01-06 02:52:24'),
(19, 14, 1, 0, 1, '2021-01-06 08:51:09', '2021-01-06 08:51:09'),
(20, 14, 2, 0, 1, '2021-01-06 08:51:09', '2021-01-06 08:51:09'),
(39, 18, 3, 0, 1, '2021-01-06 09:52:32', '2021-01-06 09:52:32'),
(58, 17, 1, 0, 1, '2021-01-06 10:19:39', '2021-01-06 10:19:39'),
(59, 17, 2, 0, 1, '2021-01-06 10:19:39', '2021-01-06 10:19:39'),
(60, 17, 3, 0, 1, '2021-01-06 10:19:39', '2021-01-06 10:19:39'),
(61, 17, 5, 0, 1, '2021-01-06 10:19:39', '2021-01-06 10:19:39'),
(62, 19, 1, 0, 1, '2021-01-09 06:51:20', '2021-01-09 06:51:20'),
(63, 19, 2, 0, 1, '2021-01-09 06:51:20', '2021-01-09 06:51:20'),
(64, 19, 3, 0, 1, '2021-01-09 06:51:20', '2021-01-09 06:51:20'),
(68, 20, 1, 0, 1, '2021-01-09 19:00:45', '2021-01-09 19:00:45'),
(69, 20, 2, 0, 1, '2021-01-09 19:00:45', '2021-01-09 19:00:45'),
(70, 20, 3, 0, 1, '2021-01-09 19:00:45', '2021-01-09 19:00:45');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `type`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Máy chiếu', 'BOOLEAN', 1, '2021-01-05 07:24:50', '2021-01-06 08:23:07'),
(2, 'Micro', 'BOOLEAN', 1, '2021-01-05 07:25:04', '2021-01-06 08:23:06'),
(3, 'Điều hòa', 'BOOLEAN', 1, '2021-01-05 07:25:22', '2021-01-06 08:23:05'),
(4, 'PC', 'BOOLEAN', 0, '2021-01-06 04:23:18', '2021-01-06 08:23:40'),
(5, 'PC', 'BOOLEAN', 1, '2021-01-06 08:23:47', '2021-01-06 08:23:47'),
(6, 'Quạt trần', 'BOOLEAN', 1, '2021-01-09 07:38:17', '2021-01-09 07:38:17'),
(7, 'Quạt trần', 'BOOLEAN', 1, '2021-01-09 07:39:48', '2021-01-09 07:39:48'),
(8, 'Đầu chuyển HDMI', 'BOOLEAN', 1, '2021-01-09 07:45:06', '2021-01-09 07:45:06'),
(9, 'codestar', 'BOOLEAN', 1, '2021-01-09 19:01:43', '2021-01-09 19:01:43');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('6F2M1UPmQ9CuDk3bdKennRASyyN1Dtt2gVG4q3kq', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZVZONko5YkFZYjRDNVdiVFBGQk9acjU4TWhOejJoRklhVW4xVENYMyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTM6Imh0dHA6Ly9sb2NhbGhvc3Q6ODA4MC9Db2RlU3Rhcl9kYXRfcGhvbmcvcHVibGljL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1608954897);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `roll` tinyint(1) NOT NULL DEFAULT 0,
  `activated` tinyint(1) NOT NULL DEFAULT 1,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `roll`, `activated`, `is_admin`) VALUES
(1, 'Trần Nguyễn Phương Nam', 'admin@gmail.com', NULL, '$2y$10$DIhMk.S6XdSdsM3v5ChR7.lms38fEnABcCKCWSpwxsbywBovOol1O', NULL, '2020-12-31 19:35:10', '2020-12-31 19:35:10', 1, 1, 1),
(2, 'tk1', 'tk1@gmail.com', NULL, '$2y$10$Dwop9fjDrNCxvywvQy0ep.pTNI7ajr0zrdXL7.v8qjzOSMPaGleh6', NULL, '2021-01-01 09:09:29', '2021-01-05 06:22:03', 0, 0, 0),
(3, 'Trần Nguyễn Phương Nam', 'a@gmail.com', NULL, '$2y$10$gdgvqOFux23kozlxgE7CTOVXfiuKMfd0gray/HPCrC7p9iabNu1C.', NULL, '2021-01-01 20:06:52', '2021-01-09 06:13:04', 0, 0, 1),
(9, 'Phương Nam', 'user@gmail.com', NULL, '$2y$10$eIuMSKv6aADxpX1HfLVDW.I9lsvyqgtenARFClZfRN26qeMJucwZC', NULL, '2021-01-06 04:35:39', '2021-01-09 06:13:03', 0, 0, 0),
(10, 'Nguyễn Văn A', 'NVA@gmail.com', NULL, '$2y$10$AQta1bzkqoViLfFkrItPIO5u2PK.u5Raasyr0pI8DXGsOJYXMb05u', NULL, '2021-01-09 06:13:51', '2021-01-09 06:13:51', 0, 1, 0),
(11, 'Nguyễn Văn B', 'b@gmail.com', NULL, '$2y$10$UiEw6.LRnSjuJ5lmJREHN.1s3xf8wOJoF1kcBGJI.xokbf3zX3cL.', NULL, '2021-01-09 06:14:20', '2021-01-09 07:48:12', 1, 0, 0),
(12, 'Nguyễn Thị C', 'c@gmail.com', NULL, '$2y$10$KAtDTQ.Pnr6MdupmBwUZOebJstvV8Uh9JWhjDwMlZjhloXXl0vvV2', NULL, '2021-01-09 07:48:42', '2021-01-09 07:59:05', 0, 1, 0),
(13, 'Trần E', 'd@gmail.com', NULL, '$2y$10$7ygP4N43uIBKEwypSiu4veG0bIxJy03Rm6wLb4Np6lLp69nR76tju', NULL, '2021-01-09 08:20:15', '2021-01-09 08:20:31', 0, 0, 0),
(14, 'codestar', 'codestar@gmail.com', NULL, '$2y$10$NIcORAURjE8goe2vc4TmFeujmAEgMDa/vqeopEYVDDaJShSQJ1GuC', NULL, '2021-01-09 18:58:10', '2021-01-09 19:05:38', 0, 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_room_id_foreign` (`room_id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`),
  ADD KEY `order_details_service_id_foreign` (`service_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_services`
--
ALTER TABLE `room_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_services_room_id_foreign` (`room_id`),
  ADD KEY `room_services_service_id_foreign` (`service_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `room_services`
--
ALTER TABLE `room_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`),
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_details_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`);

--
-- Constraints for table `room_services`
--
ALTER TABLE `room_services`
  ADD CONSTRAINT `room_services_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`),
  ADD CONSTRAINT `room_services_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
