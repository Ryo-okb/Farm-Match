-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:8889
-- 生成日時: 2023 年 5 月 29 日 21:43
-- サーバのバージョン： 5.7.39
-- PHP のバージョン: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `farm`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `farms`
--

CREATE TABLE `farms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `way` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `del_flg` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `farms`
--

INSERT INTO `farms` (`id`, `name`, `address`, `area`, `way`, `user_id`, `created_at`, `updated_at`, `image`, `del_flg`) VALUES
(36, 'test', '滋賀', '200', 'test', 6, '2023-05-22 07:28:35', '2023-05-27 21:46:45', 'mYUvlTCRHptIRczKjeeh4tMCgOxZu0XlBppAweig.bin', 0),
(37, 'user', '愛媛', '10', '米', 6, '2023-05-23 19:18:57', '2023-05-27 21:47:43', 'OQm0bZWeMSYyILwDGpr8FFFhEI7ybMcmhvhKdWUH.bin', 0),
(38, 'user', '東京', '10', '米', 6, '2023-05-24 23:56:53', '2023-05-24 23:57:09', 'xZjGeqlzZ341tId83ynwHdet95YKq8VzFOIWvgpn.bin', 1),
(39, 'user', '高知県高知市１２３番地', '200', '畜産', 6, '2023-05-27 19:07:34', '2023-05-27 19:07:34', '4SwV9A8uss3vK6ajbuoYA6BotfFdudgFbcrT6BMo.bin', 0);

-- --------------------------------------------------------

--
-- テーブルの構造 `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_05_18_053309_create_farms_table', 2),
(8, '2023_05_21_083319_add_user_id_to_farms', 3),
(9, '2023_05_21_090911_add_image_to_farms', 4),
(10, '2023_05_24_043406_add_reservation_date_to_reservations', 5),
(11, '2023_05_24_074030_add_reservation_time_to_reservations', 6),
(12, '2023_05_25_082352_add_del_flg_to_farms', 7),
(13, '2023_05_26_074421_add_role_to_users', 8);

-- --------------------------------------------------------

--
-- テーブルの構造 `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('b@b', '$2y$10$wyV7ogsBntMf0do6sWl2qeeIVgRsAczX0uWmzgJIeZ3p1UZ.zaCGG', '2023-05-24 21:15:12');

-- --------------------------------------------------------

--
-- テーブルの構造 `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `reservations`
--

CREATE TABLE `reservations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `land_id` bigint(20) UNSIGNED NOT NULL,
  `reservation_date` date DEFAULT NULL,
  `reservation_time` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `reservations`
--

INSERT INTO `reservations` (`id`, `user_id`, `land_id`, `reservation_date`, `reservation_time`, `created_at`, `updated_at`) VALUES
(1, 6, 36, NULL, NULL, '2023-05-22 07:45:45', '2023-05-22 07:45:45'),
(2, 6, 36, NULL, NULL, '2023-05-22 07:48:28', '2023-05-22 07:48:28'),
(3, 7, 36, NULL, NULL, '2023-05-22 07:52:32', '2023-05-22 07:52:32'),
(4, 6, 36, NULL, NULL, '2023-05-23 19:50:21', '2023-05-23 19:50:21'),
(5, 6, 36, '2023-05-26', NULL, '2023-05-23 19:54:07', '2023-05-23 19:54:07'),
(6, 6, 37, '2023-05-26', NULL, '2023-05-23 22:45:22', '2023-05-23 22:45:22'),
(7, 6, 37, '2023-05-26', '20:46:00', '2023-05-23 22:46:41', '2023-05-23 22:46:41'),
(8, 6, 37, '2023-05-27', '09:00:00', '2023-05-25 22:53:30', '2023-05-25 22:53:30'),
(9, 6, 37, '2023-05-31', '09:00:00', '2023-05-26 22:57:38', '2023-05-26 22:57:38'),
(10, 6, 37, '2023-05-30', '09:00:00', '2023-05-26 22:58:51', '2023-05-26 22:58:51'),
(11, 6, 39, '2023-05-31', '09:00:00', '2023-05-27 23:50:31', '2023-05-27 23:50:31'),
(12, 6, 39, '2023-05-31', '09:00:00', '2023-05-27 23:51:17', '2023-05-27 23:51:17'),
(13, 6, 39, '2023-05-31', '09:00:00', '2023-05-27 23:52:39', '2023-05-27 23:52:39'),
(14, 6, 39, '2023-05-31', '09:00:00', '2023-05-27 23:52:57', '2023-05-27 23:52:57'),
(15, 6, 39, '2023-05-31', '09:00:00', '2023-05-27 23:54:10', '2023-05-27 23:54:10'),
(16, 6, 39, '2023-05-31', '09:00:00', '2023-05-27 23:54:25', '2023-05-27 23:54:25'),
(17, 6, 39, '2023-05-31', '09:00:00', '2023-05-27 23:55:18', '2023-05-27 23:55:18');

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `users`
--

INSERT INTO `users` (`id`, `name`, `tel`, `email`, `address`, `password`, `created_at`, `updated_at`, `role`) VALUES
(1, '石川tarou', '00000', 'wwwwww@oo', 'aiti', '$2y$10$ly8qpPP2EQMRAglfngYbguWV05emB7g3ALfqn.MEPr7X6GakhAR1u', '2023-05-16 22:04:12', '2023-05-16 22:04:12', 0),
(2, '武ゴンザレス', '0000000', 'wwwwww@oo11', 'aiti', '$2y$10$L/JM8yYd7lb1JSBmpOvvMeN.3cap.A7QR8tBRdKBI2uUggef9LHje', '2023-05-16 22:44:26', '2023-05-16 22:44:26', 0),
(3, 'riko', '0000000', 'wwwwww@oo1222', 'aiti', '$2y$10$7XZDjVhHEwmLxUS9tQknIeGIdP.eoIJTKssirn27VKr2nHk7gd6te', '2023-05-16 22:48:21', '2023-05-16 22:48:21', 0),
(4, '2riko', '0000000', 'wwwwww@22222', 'aiti', '$2y$10$ospgXvgyTMUXVMbpEwoM/OZcthTp8LHDPobeYgwPbPJjIA4sN0c/6', '2023-05-16 22:50:41', '2023-05-16 22:50:41', 0),
(5, '2riko2', '0000000', 'wwwwww@21212121', 'aiti', '$2y$10$7ehUKnLUYSHWhl1k34U2.eDtrk40gd30NqnKUivaEipy0GjpfJ7iu', '2023-05-16 22:52:19', '2023-05-16 22:52:19', 0),
(6, 'user', '0000000000', 'a@a', 'aiti', '$2y$10$C3aXxwJiIdK42Z4KgVE5Q.OlfGTQetCMXpqzrgvhnLG4D2G6Nfk82', '2023-05-17 00:41:06', '2023-05-17 00:41:06', 0),
(7, '岡林', '000000000', 'b@b', '東京', '$2y$10$/Pdtj5qWNwPkGC42Q1ryB.IscMf6oII7dyFTrW5a5atNKitK/y9jW', '2023-05-22 07:51:22', '2023-05-24 21:38:06', 0),
(8, 'admin', '000000000', 'admin@a', 'host', '$2y$10$9ngkjQG6Qp4Nq5xi.lFz8u1FRdIh2ploLd4jldWJV8puug6VzDmri', NULL, '2023-05-26 22:33:15', 1);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- テーブルのインデックス `farms`
--
ALTER TABLE `farms`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- テーブルのインデックス `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- テーブルのインデックス `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reservations_user_id_foreign` (`user_id`);

--
-- テーブルのインデックス `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `farms`
--
ALTER TABLE `farms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- テーブルの AUTO_INCREMENT `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- テーブルの AUTO_INCREMENT `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- テーブルの AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- ダンプしたテーブルの制約
--

--
-- テーブルの制約 `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
