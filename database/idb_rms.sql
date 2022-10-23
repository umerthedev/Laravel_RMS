-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2022 at 02:22 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `idb_rms`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `food_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `food_id`, `quantity`, `created_at`, `updated_at`) VALUES
(27, '1', '6', '3', '2022-10-22 04:23:31', '2022-10-22 04:23:31');

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
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id`, `name`, `price`, `image`, `description`, `created_at`, `updated_at`) VALUES
(3, 'chicken nuggets', '120', '1664476830.jpg', 'Common menu items at fast food outlets include fish and chips, sandwiches, pitas', '2022-09-29 12:40:30', '2022-09-29 12:40:30'),
(4, 'onion rings', '80', '1664476887.jpg', 'Common menu items at fast food outlets include fish and chips, sandwiches, pitas', '2022-09-29 12:41:27', '2022-09-29 12:41:27'),
(5, 'fried chicken', '120', '1664476951.jpg', 'Common menu items at fast food outlets include fish and chips, sandwiches, pitas', '2022-09-29 12:42:31', '2022-09-29 12:42:31'),
(6, 'hamburgers', '150', '1664476989.jpg', 'Common menu items at fast food outlets include fish and chips, sandwiches, pitas', '2022-09-29 12:43:09', '2022-09-29 12:43:09'),
(8, 'sandwiches', '150', '1664477559.jpg', 'Common menu items at fast food outlets include fish and chips, sandwiches, pitas', '2022-09-29 12:52:39', '2022-09-29 12:52:39'),
(10, 'Salad', '150', '1664819006.jpg', 'Common menu items at fast food outlets include fish and chips, sandwiches, pitas', '2022-10-03 11:43:26', '2022-10-03 11:43:26');

-- --------------------------------------------------------

--
-- Table structure for table `foodchefs`
--

CREATE TABLE `foodchefs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `speciality` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `foodchefs`
--

INSERT INTO `foodchefs` (`id`, `name`, `speciality`, `image`, `created_at`, `updated_at`) VALUES
(2, 'Lina', 'Chinese', '1664816526.jpg', '2022-10-03 10:52:20', '2022-10-03 11:02:06'),
(4, 'Sujana', 'Indian', '1664816392.jpg', '2022-10-03 10:52:58', '2022-10-03 10:59:52'),
(7, 'Kyo hanabi', 'Chinese', '1664816370.jpg', '2022-10-03 10:58:16', '2022-10-03 10:59:30');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_09_25_155526_create_sessions_table', 1),
(7, '2022_09_29_150918_create_food_table', 2),
(8, '2022_09_30_180901_create_reservations_table', 3),
(9, '2022_10_03_124404_create_foodchefs_table', 4),
(10, '2022_10_14_125205_create_carts_table', 5),
(11, '2022_10_19_125344_create_orders_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `food_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `phone`, `address`, `food_name`, `price`, `quantity`, `created_at`, `updated_at`) VALUES
(8, 'Apple Mahmud', '01765678976', '123 kazipara, Mirpur Dhaka', 'fried chicken', '120', '1', '2022-10-19 08:45:40', '2022-10-19 08:45:40'),
(9, 'Apple Mahmud', '01765678976', '123 kazipara, Mirpur Dhaka', 'hamburgers', '150', '1', '2022-10-19 08:45:40', '2022-10-19 08:45:40'),
(10, 'Apple Mahmud', '01765678976', '123 kazipara, Mirpur Dhaka', 'sandwiches', '150', '1', '2022-10-19 08:45:40', '2022-10-19 08:45:40'),
(11, 'Apple Mahmud', '01765678976', '123 kazipara, Mirpur Dhaka', 'chicken nuggets', '120', '1', '2022-10-19 08:45:40', '2022-10-19 08:45:40'),
(13, 'Admin', '232234234', '123 kazipara, Mirpur Dhaka', 'hamburgers', '150', '1', '2022-10-20 09:53:45', '2022-10-20 09:53:45'),
(14, 'Admin', '01765678976', '123 kazipara, Mirpur Dhaka', 'fried chicken', '120', '2', '2022-10-20 11:54:38', '2022-10-20 11:54:38'),
(15, 'Admin', '01765678976', '123 kazipara, Mirpur Dhaka', 'hamburgers', '150', '3', '2022-10-20 11:54:38', '2022-10-20 11:54:38'),
(16, 'omar', '014567855', '123 kazipara, Mirpur Dhaka', 'fried chicken', '120', '1', '2022-10-22 11:31:57', '2022-10-22 11:31:57'),
(17, 'omar', '014567855', '123 kazipara, Mirpur Dhaka', 'hamburgers', '150', '1', '2022-10-22 11:31:57', '2022-10-22 11:31:57'),
(18, 'Apple Mahmud', '232234234', '123 kazipara, Mirpur Dhaka', 'fried chicken', '120', '1', '2022-10-22 11:37:15', '2022-10-22 11:37:15');

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guest` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `name`, `email`, `phone`, `guest`, `date`, `time`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '01765678976', '5', '26.09.2022', '00:00', 'test', '2022-09-30 12:20:49', '2022-09-30 12:20:49'),
(2, 'Dr B. Sick K', 'admin@gmail.com', '434567788888', '11', '30.10.2022', '12:12', 'tesasa', '2022-09-30 12:23:28', '2022-09-30 12:23:28'),
(4, 'Admin', 'thoma@mail.com', '012142422', '2', '26.10.2022', '12:45', 'test', '2022-10-01 08:30:59', '2022-10-01 08:30:59'),
(6, 'APPLE', 'umerthedev@gmail.com', '012142422', '10', NULL, '00:12', 'test', '2022-10-01 12:46:16', '2022-10-01 12:46:16'),
(7, 'Dr B. Sick K', 'umer@gmail.com', '012142422', '7', '11.10.2022', NULL, 'add_contact', '2022-10-07 08:43:03', '2022-10-07 08:43:03');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('Az6NqYxvDkL9CGiz6a2fmzb2XRmqIjH8xBR1jZKC', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:106.0) Gecko/20100101 Firefox/106.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiSkZiUDVZMFN0OFhQM0RnN2dlQ0RHY2ZGRGhWZmgxSWtIOENacDMzVCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTM6Imh0dHA6Ly9sb2NhbGhvc3QvbGFyYXZlbC9MYXJhdmVsX1JNUy9wdWJsaWMvY2hlZl9saXN0Ijt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1666526998);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usertype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `usertype`, `phone`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '1', '01765678976', NULL, '$2y$10$B.HjysdRCBbWUKWAb.kiiO.FQrqUyXYwBsYpCGRkNlJyVqsw80HRq', NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-25 10:07:52', '2022-09-25 10:07:52'),
(2, 'umer', 'umer@gmail.com', '0', '01232313', NULL, '$2y$10$iNg62lwSJ0yB8ErZoAxD1e7Gke/XIDuPRC0OL6Ez1wpY/B7mot5xi', NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-26 11:31:24', '2022-09-26 11:31:24'),
(4, 'apple', 'apple@gmail.com', '0', '0123455885', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'rayhan', 'rayhan@gmail.com', '0', '0124578963', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'ribol', 'ribol@gmail.com', '0', '0125896321', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'boby', 'boby@gmail.com', '0', '01923456788', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'ovi', 'ovi@gmail.com', '0', '016542447865', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foodchefs`
--
ALTER TABLE `foodchefs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
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
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
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
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `foodchefs`
--
ALTER TABLE `foodchefs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
