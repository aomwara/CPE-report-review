-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Jun 02, 2022 at 02:56 PM
-- Server version: 10.5.8-MariaDB-1:10.5.8+maria~focal
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cpereq`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_01_28_175945_create_sessions_table', 1),
(7, '2022_01_30_161734_create_groups_table', 1),
(8, '2022_01_30_161741_create_links_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project_groups`
--

CREATE TABLE `project_groups` (
  `id` int(10) NOT NULL,
  `project_name` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `project_advisor` int(10) UNSIGNED DEFAULT NULL,
  `project_type` varchar(20) DEFAULT NULL,
  `committee1` int(10) UNSIGNED DEFAULT NULL,
  `committee2` int(10) UNSIGNED DEFAULT NULL,
  `committee3` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project_groups`
--

INSERT INTO `project_groups` (`id`, `project_name`, `project_advisor`, `project_type`, `committee1`, `committee2`, `committee3`) VALUES
(13, 'The Decentralized Yield Aggregator Ecosystem', 5, 'SENIOR', 7, 6, 8),
(14, 'Forex Technical Indicator Dashboard System for Monitoring and Decision Trading', 5, 'SENIOR', 8, 6, 7);

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `request_by` int(10) UNSIGNED NOT NULL,
  `request_to` int(10) UNSIGNED NOT NULL,
  `project_group` int(10) NOT NULL,
  `request_file` varchar(200) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` int(1) NOT NULL,
  `review` text DEFAULT NULL,
  `review_file` varchar(200) DEFAULT NULL,
  `created_at` varchar(100) DEFAULT NULL,
  `updated_at` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `request_by`, `request_to`, `project_group`, `request_file`, `description`, `status`, `review`, `review_file`, `created_at`, `updated_at`) VALUES
(6, 1, 6, 13, '13-20220602145127.pdf', '<p>jkhjhfhgfhgfhgj</p>', 0, NULL, NULL, '2022-06-02 | 14:51:27', '2022-06-02 | 14:51:27');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
('fx4hYMyFRHYTme2axA6auYqNNp8U21CTHuBDdFlR', 9, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.61 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoibnZQcjlseUxwb05JbnpTNlMwWGJtWmdTMm8wY2JoT1l0NGFRSTdrQyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hZG1pbi9kYXNoYm9hcmQiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo5O3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkRlo3UmFlYWFSanEuYzNkSmszcGpPdVhvSW93RmxOZDRKc2k2SUJDdWRCY0tiTW9YQ2ZQbksiO30=', 1654177388),
('rkCcf1uAZnC0pclR8T2Dn6ss14tyyvTkIPvaQqxd', 1, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.61 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiUVN2QnpBTUp4RXVyQno4ekVuWldYTXJJSk9mRWVtVGxFRXQyckd2NCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hZG1pbi9teXJlcXVlc3QiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkLmo3ZDFVVC9od3VSekd4NkZ1ZjM4dTcweS9mclVNY09FLmRYUWlkMVlqTXJLZXhVTkhhSWkiO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJC5qN2QxVVQvaHd1UnpHeDZGdWYzOHU3MHkvZnJVTWNPRS5kWFFpZDFZak1yS2V4VU5IYUlpIjt9', 1654181487);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(1) DEFAULT 0,
  `project_group` int(10) DEFAULT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `project_group`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'waranat suttikan', 'waranat.cpe@gmail.com', NULL, '$2y$10$.j7d1UT/hwuRzGx6Fuf38u70y/frUMcOE.dXQid1YjMrKexUNHaIi', 0, 13, NULL, NULL, NULL, NULL, NULL, '2022-01-30 16:34:25', '2022-06-02 14:51:18'),
(5, 'Aj.Marong', 'marong@gmail.com', NULL, '$2y$10$Zt.UcJvXxeXfCeq8WqkvYOws8gVthp.3c7Rpnmhg1od.M8fk3QmZG', 1, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-02 09:52:57', '2022-06-02 09:52:57'),
(6, 'Aj.Sanan', 'sanan@gmail.com', NULL, '$2y$10$FmP6ixRxhH7WXXvYDdKYReh1DLMNpokGT37qKw5/NTB2kg5OUI53C', 1, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-02 09:53:41', '2022-06-02 09:53:41'),
(7, 'Aj.Yai', 'yai@gmail.com', NULL, '$2y$10$fpo6mvL5yKDztqZvDf.2beUGBP6tx2Xrc8XiA/KAznmxGsbZ7KawW', 1, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-02 09:53:56', '2022-06-02 09:53:56'),
(8, 'Aj.Palm', 'palm@gmail.com', NULL, '$2y$10$BARPyiRoPWY.X9iil93gUeo60NeGJ1XRABoX/rpN/mBmczvyJtH5e', 1, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-02 09:54:28', '2022-06-02 09:54:28'),
(9, 'Girayu', 'jack@gmail.com', NULL, '$2y$10$FZ7RaeaaRjq.c3dJk3pjOuXoIowFlNd4Jsi6IBCudBcKbMoXCfPnK', 0, 13, NULL, NULL, NULL, NULL, NULL, '2022-06-02 13:28:56', '2022-06-02 13:29:04');

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
-- Indexes for table `project_groups`
--
ALTER TABLE `project_groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_advisor` (`project_advisor`),
  ADD KEY `committee1` (`committee1`),
  ADD KEY `committee2` (`committee2`),
  ADD KEY `committee3` (`committee3`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `request_by` (`request_by`),
  ADD KEY `request_to` (`request_to`),
  ADD KEY `project_group` (`project_group`);

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
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `project_group` (`project_group`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_groups`
--
ALTER TABLE `project_groups`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `project_groups`
--
ALTER TABLE `project_groups`
  ADD CONSTRAINT `project_groups_ibfk_1` FOREIGN KEY (`project_advisor`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `project_groups_ibfk_2` FOREIGN KEY (`committee1`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `project_groups_ibfk_3` FOREIGN KEY (`committee2`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `project_groups_ibfk_4` FOREIGN KEY (`committee3`) REFERENCES `users` (`id`);

--
-- Constraints for table `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `requests_ibfk_1` FOREIGN KEY (`request_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `requests_ibfk_2` FOREIGN KEY (`request_to`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `requests_ibfk_3` FOREIGN KEY (`project_group`) REFERENCES `project_groups` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`project_group`) REFERENCES `project_groups` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
