-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 05, 2019 at 10:18 PM
-- Server version: 5.7.27-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `subway`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `meals`
--

CREATE TABLE `meals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `meals`
--

INSERT INTO `meals` (`id`, `name`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Sandwich', 1, '2019-11-04 09:55:21', '2019-11-04 09:57:40');

-- --------------------------------------------------------

--
-- Table structure for table `meal_options`
--

CREATE TABLE `meal_options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `meal_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `meal_options`
--

INSERT INTO `meal_options` (`id`, `meal_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Bread', '2019-11-05 08:41:40', '2019-11-05 08:41:40'),
(2, 1, 'Bread Size', '2019-11-05 08:42:14', '2019-11-05 08:42:14'),
(3, 1, 'Baked or not', '2019-11-05 08:42:27', '2019-11-05 08:42:27'),
(4, 1, 'Taste of sandwich', '2019-11-05 08:42:39', '2019-11-05 08:42:39'),
(5, 1, 'Extras', '2019-11-05 08:43:23', '2019-11-05 08:43:23'),
(6, 1, 'Vegetables', '2019-11-05 08:43:49', '2019-11-05 08:43:49'),
(7, 1, 'Sauce', '2019-11-05 08:44:00', '2019-11-05 08:44:00');

-- --------------------------------------------------------

--
-- Table structure for table `meal_option_values`
--

CREATE TABLE `meal_option_values` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `option_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `meal_option_values`
--

INSERT INTO `meal_option_values` (`id`, `option_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Bread One', '2019-11-05 08:53:47', '2019-11-05 08:53:47'),
(2, 1, 'Bread Two', '2019-11-05 08:55:50', '2019-11-05 08:55:50'),
(4, 2, '15 cm', '2019-11-05 08:57:49', '2019-11-05 08:57:49'),
(5, 2, '30 cm', '2019-11-05 08:57:56', '2019-11-05 08:57:56'),
(6, 3, 'Yes', '2019-11-05 08:58:04', '2019-11-05 08:58:04'),
(7, 3, 'No', '2019-11-05 08:58:10', '2019-11-05 08:58:10'),
(8, 4, 'Chicken Fagita', '2019-11-05 08:58:28', '2019-11-05 08:58:28'),
(9, 5, 'Extra Bacon', '2019-11-05 08:58:47', '2019-11-05 08:58:47'),
(10, 5, 'Double Meat', '2019-11-05 08:58:57', '2019-11-05 08:58:57'),
(11, 5, 'Extra Cheese', '2019-11-05 08:59:05', '2019-11-05 08:59:05'),
(12, 6, 'Veggie One', '2019-11-05 08:59:29', '2019-11-05 08:59:29'),
(13, 6, 'Veggie Two', '2019-11-05 08:59:36', '2019-11-05 08:59:36'),
(14, 7, 'Sauce One', '2019-11-05 08:59:52', '2019-11-05 08:59:52'),
(15, 7, 'Sauce Two', '2019-11-05 09:00:00', '2019-11-05 09:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `meal_orders`
--

CREATE TABLE `meal_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `meal_id` int(11) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT '1',
  `order_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `meal_orders`
--

INSERT INTO `meal_orders` (`id`, `meal_id`, `is_active`, `order_date`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2019-11-04', '2019-11-04 10:27:47', '2019-11-04 10:30:42'),
(2, 1, 1, '2019-11-05', '2019-11-05 08:27:10', '2019-11-05 08:27:10');

-- --------------------------------------------------------

--
-- Table structure for table `message_bird_settings`
--

CREATE TABLE `message_bird_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `api_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `message_bird_settings`
--

INSERT INTO `message_bird_settings` (`id`, `api_key`, `mobile_number`, `created_at`, `updated_at`) VALUES
(1, '5EPVX4swb2HxLAQGTSDXGl8jt', '+9779843588734', NULL, NULL);

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_11_04_143915_add_column_to_users', 2),
(5, '2019_11_04_153346_create_meals_table', 3),
(7, '2019_11_04_155357_create_meal_orders_table', 4),
(8, '2019_11_05_141329_create_user_orders_table', 5),
(9, '2019_11_05_141643_create_meal_options_table', 6),
(10, '2019_11_05_143132_create_meal_option_values_table', 7),
(11, '2019_11_05_151048_add_column_options_to_user_orders', 8),
(12, '2019_11_05_151753_add_column_user_id_user_orders', 9),
(13, '2019_11_05_161223_create_message_bird_settings_table', 10);

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
  `is_active` int(11) NOT NULL DEFAULT '1',
  `user_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `is_active`, `user_type`) VALUES
(1, 'Tshering Lama', 'lamatshering23@gmail.com', NULL, '$2y$10$4TXQMrPOPKqETBeu0oP7Eejd1v67ka9brIk0D6covFX1q8HFiI.ZG', 'COy2xHSqViXhEgvXmgGFZiCqRv2lMIIu65SHIoR3uocS2U8Xa2Rmd3ESlDKi', '2019-11-04 08:51:29', '2019-11-04 08:51:29', 1, 1),
(2, 'Test User', 'testuserone@yopmail.com', NULL, '$2y$10$oerQyJgDfqzks3yr2cfhJubY2fmUWopF4ZBxVxqCUpt23xRnzQBr2', 'CEHnAdxc6usfFYeTLMnsYYPLFlEX8TEIQ0izJJ91h38XLPrkgEfjuoJ4Xsr0', '2019-11-04 09:39:50', '2019-11-04 09:44:55', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_orders`
--

CREATE TABLE `user_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `options` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_orders`
--

INSERT INTO `user_orders` (`id`, `order_id`, `user_id`, `order_date`, `options`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2019-11-05', '[\"1\",\"4\",\"6\",\"8\",\"9\",\"12\",\"14\"]', 1, '2019-11-05 10:43:02', '2019-11-05 10:43:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meals`
--
ALTER TABLE `meals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meal_options`
--
ALTER TABLE `meal_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meal_option_values`
--
ALTER TABLE `meal_option_values`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meal_orders`
--
ALTER TABLE `meal_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message_bird_settings`
--
ALTER TABLE `message_bird_settings`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_orders`
--
ALTER TABLE `user_orders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `meals`
--
ALTER TABLE `meals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `meal_options`
--
ALTER TABLE `meal_options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `meal_option_values`
--
ALTER TABLE `meal_option_values`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `meal_orders`
--
ALTER TABLE `meal_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `message_bird_settings`
--
ALTER TABLE `message_bird_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user_orders`
--
ALTER TABLE `user_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
