-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 17, 2023 at 05:44 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rxcue_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `audits`
--

CREATE TABLE `audits` (
  `id` bigint UNSIGNED NOT NULL,
  `inventory_id` bigint UNSIGNED NOT NULL,
  `current_quantity` int NOT NULL,
  `quantity` int NOT NULL,
  `new_stock` int NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `upc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `audits`
--

INSERT INTO `audits` (`id`, `inventory_id`, `current_quantity`, `quantity`, `new_stock`, `type`, `created_at`, `updated_at`, `upc`) VALUES
(277, 41, 923, -55, 923, 'purchase', '2023-12-16 03:43:58', '2023-12-16 03:43:58', NULL),
(278, 42, 932, -55, 932, 'purchase', '2023-12-16 03:55:07', '2023-12-16 03:55:07', NULL),
(279, 41, 777, -134, 777, 'purchase', '2023-12-16 04:16:51', '2023-12-16 04:16:51', NULL),
(280, 41, 789, 0, 789, 'void', '2023-12-16 04:17:35', '2023-12-16 04:17:35', NULL),
(281, 41, 789, 0, 789, 'void', '2023-12-16 05:22:37', '2023-12-16 05:22:37', NULL),
(282, 42, 920, 0, 920, 'void', '2023-12-16 05:22:38', '2023-12-16 05:22:38', NULL),
(283, 42, 932, 0, 932, 'void', '2023-12-16 05:22:40', '2023-12-16 05:22:40', NULL),
(284, 41, 768, -21, 768, 'purchase', '2023-12-16 06:30:39', '2023-12-16 06:30:39', NULL),
(285, 42, 888, -32, 888, 'purchase', '2023-12-16 06:30:41', '2023-12-16 06:30:41', NULL),
(286, 42, 888, -12, 888, 'purchase', '2023-12-16 06:30:43', '2023-12-16 06:30:43', NULL),
(287, 41, 645, -123, 645, 'purchase', '2023-12-16 21:24:41', '2023-12-16 21:24:41', NULL),
(288, 42, 856, -32, 856, 'purchase', '2023-12-16 21:24:45', '2023-12-16 21:24:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `name`, `location`, `contact`, `status`, `created_at`, `updated_at`, `user_id`) VALUES
(8, 'Victoria', 'Victoria', '09305115251', 'Active', '2023-12-13 09:31:32', '2023-12-13 09:31:32', 1),
(9, 'Calapan', 'Masipit', '09305115251', 'Active', '2023-12-13 09:39:15', '2023-12-13 09:39:15', 1),
(10, 'Bongabong', 'Bongabong', '09892389812', 'Active', '2023-12-15 23:57:55', '2023-12-15 23:57:55', 1);

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
-- Table structure for table `inventories`
--

CREATE TABLE `inventories` (
  `id` bigint UNSIGNED NOT NULL,
  `item_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `previous_quantity` int NOT NULL DEFAULT '0',
  `quantity_change` int NOT NULL DEFAULT '0',
  `new_quantity` int NOT NULL DEFAULT '0',
  `change_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `quantity` int DEFAULT '0',
  `category` enum('fluid','solid','other') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(8,2) DEFAULT '0.00',
  `upc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inventories`
--

INSERT INTO `inventories` (`id`, `item_name`, `previous_quantity`, `quantity_change`, `new_quantity`, `change_date`, `created_at`, `updated_at`, `image`, `description`, `quantity`, `category`, `price`, `upc`, `branch_id`) VALUES
(41, 'Biogesic', 0, 1000, 645, '2023-12-16', '2023-12-16 03:17:04', '2023-12-16 21:22:03', '3nvJTuvfY5dmDmZQ8d9HHoU0mUIQexUU6usyHKcJ.png', 'test', 0, 'solid', 6.00, '123126', 9),
(42, 'Mefinamic', 0, 1000, 856, '2023-12-16', '2023-12-16 03:17:27', '2023-12-16 21:22:03', 'wnvdpZFwswwPG7P0XGu1SFZRyuzFM4FmrPICXJBn.jpg', 'test', 0, 'solid', 6.00, '32145123', 9);

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
(5, '2023_11_14_015608_create_admins_table', 1),
(6, '2023_11_14_015624_create_clients_table', 2),
(7, '2023_11_14_015708_create_sellers_table', 3),
(8, '2023_11_22_035614_create_branches_table', 4),
(9, '2014_10_12_100000_create_password_resets_table', 5),
(10, '2023_11_23_073022_create_inventories_table', 6),
(11, '2023_11_23_074648_create_inventories_table', 7),
(12, '2023_11_30_055330_add_image_to_inventories', 8),
(13, '2023_12_03_133905_create_audits_table', 9),
(14, '2023_12_04_155704_add_timestamps_to_users_table', 10),
(15, '2023_12_09_035629_add_upc_to_inventories_table', 11),
(16, '2023_12_09_053135_create_sales_table', 12),
(17, '2023_12_09_053808_update_sales_table', 13),
(18, '2023_12_09_065803_create_sales_table', 14),
(19, '2023_12_09_075041_create_sales_table', 15),
(20, '2023_12_09_080221_add_upc_to_audits_table', 16),
(21, '2023_12_12_093540_add_completed_to_sales_table', 17),
(22, '2023_12_12_111531_add_voided_column_to_sales_table', 18),
(23, '2023_12_13_165624_drop_user_id_column_from_branches', 19),
(24, '2023_12_13_170337_add_branches_to_users_table', 20),
(25, '2023_12_13_172953_drop_user_id_column_from_branches', 21),
(26, '2023_12_13_173034_add_user_id_to_branches', 22),
(27, '2023_12_13_180715_update_users_table_add_address_nullable', 23),
(28, '2023_12_13_184545_add_branch_id_to_users', 24),
(29, '2023_12_13_184818_drop_branches_column_from_users', 25),
(30, '2023_12_13_195456_remove_duplicate_completed_column_from_sales_table', 26),
(31, '2023_12_13_195531_remove_duplicate_completed_column_from_sales_table', 26),
(32, '2023_12_13_212416_add_branch_id_to_inventories_table', 26),
(33, '2023_12_14_040307_add_branch_id_to_sales', 27),
(34, '2023_12_15_104257_add_completed_to_sales_table', 28),
(35, '2023_12_15_134616_remove_branch_id_from_sales_table', 29),
(36, '2023_12_15_161359_add_price_at_sale_to_sales_table', 30);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `guard`, `token`, `created_at`) VALUES
('admin@gmail.com', 'admin', 'ZFUzak9XY3k5TXlWdkRNSjZ2MExkcG5HNGdDaVg1Q0dIc3BvQWNnYnF4NXZMYXJaM0ZxZjNlMmdaQUZBU21zRA==', '2023-11-20 18:34:06');

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

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` bigint UNSIGNED NOT NULL,
  `inventory_id` bigint UNSIGNED NOT NULL,
  `quantity_sold` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `voided` tinyint(1) NOT NULL DEFAULT '0',
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  `price_at_sale` decimal(10,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `inventory_id`, `quantity_sold`, `created_at`, `updated_at`, `user_id`, `voided`, `completed`, `price_at_sale`) VALUES
(229, 41, 22, '2023-12-16 03:17:58', '2023-12-16 03:18:32', 20, 0, 1, 132.00),
(230, 42, 13, '2023-12-16 03:17:58', '2023-12-16 03:34:43', 20, 0, 1, 78.00),
(231, 42, 55, '2023-12-16 03:18:16', '2023-12-16 03:55:07', 20, 0, 1, 330.00),
(232, 41, 55, '2023-12-16 03:18:16', '2023-12-16 03:43:58', 20, 0, 1, 330.00),
(233, 41, 134, '2023-12-16 04:15:16', '2023-12-16 04:16:51', 20, 0, 1, 804.00),
(234, 42, 0, '2023-12-16 04:15:16', '2023-12-16 05:22:38', 20, 1, 0, 0.00),
(235, 42, 0, '2023-12-16 04:15:37', '2023-12-16 05:22:40', 20, 1, 0, 0.00),
(236, 41, 0, '2023-12-16 04:15:37', '2023-12-16 04:17:35', 20, 1, 0, 0.00),
(237, 41, 0, '2023-12-16 05:15:24', '2023-12-16 05:22:37', 20, 1, 0, 0.00),
(238, 42, 32, '2023-12-16 06:25:16', '2023-12-16 06:30:41', 20, 0, 1, 192.00),
(239, 42, 12, '2023-12-16 06:26:52', '2023-12-16 06:30:43', 20, 0, 1, 72.00),
(240, 41, 21, '2023-12-16 06:26:52', '2023-12-16 06:30:39', 20, 0, 1, 126.00),
(241, 41, 123, '2023-12-16 21:22:03', '2023-12-16 21:24:41', 20, 0, 1, 738.00),
(242, 42, 32, '2023-12-16 21:22:03', '2023-12-16 21:24:45', 20, 0, 1, 192.00);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) NOT NULL DEFAULT '',
  `middleName` varchar(50) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `gender` enum('male','female','other') NOT NULL,
  `age` int NOT NULL,
  `email` varchar(50) NOT NULL,
  `role` enum('admin','cashier','client') NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `branch_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `firstName`, `lastName`, `middleName`, `address`, `gender`, `age`, `email`, `role`, `password`, `created_at`, `updated_at`, `branch_id`) VALUES
(20, 'admin', 'admin', 'admin', 'admin', 'admin', 'male', 12, 'admin@gmail.com', 'client', '$2y$12$JsVK3KmJZbuajIqvck252.mQAJ9v/ROeINdVtxre/TilbFgsF7JIW', '2023-12-13 10:46:39', '2023-12-13 10:46:39', 9),
(21, 'Sett', 'Jon Wendell', 'Cabrera', 'Lontoc', 'Nacoco', 'male', 21, 'corvecc1@gmail.com', 'admin', '$2y$12$dIdhUdrCoIlySyDqCrUVyeGbmospurNXreji8E6xfjvo6PWy37Ley', '2023-12-13 10:55:16', '2023-12-13 10:55:16', 9),
(22, 'Erzie', 'Janzel', 'Bongo', 'Managaze', 'Cebu', 'female', 21, 'janzkiemalditz@gmailcom', 'cashier', '$2y$12$wP6Hs5s2J6/OnZVWtLX37OckrSYF85RtvUY/dsWO7/6iwBeg6SxS2', '2023-12-13 10:55:52', '2023-12-13 10:55:52', 9),
(23, 'test', 'test', 'test', 'test', 'test', 'female', 21, 'test@gmail.com', 'admin', '$2y$12$487hv0feyUJWdFlnJWShp.ywUoib9E7RPsJ1TJB.kdP9vPY.iqgrO', '2023-12-13 19:29:12', '2023-12-13 19:29:12', 8),
(24, 'janz', 'janzkie', 'janzkiemalditz', 'Lontoc', 'cebu', 'female', 32, 'weithingcheong@gmai.com', 'client', '$2y$12$jOFV3DAAt6OWko8xBkxiVORtb2IIEetW1Dwt9G7FWtw1nI2kBp7ii', '2023-12-13 19:37:56', '2023-12-13 19:37:56', 8),
(25, 'test2', 'test2', 'test2', 'test2', 'Victoria', 'female', 21, 'test2@gmai.com', 'cashier', '$2y$12$U5HX21bCDG1k7D3L1ln6d.DSnplWppmRGwBGxC5n6oKxs0e3aWEei', '2023-12-13 19:59:11', '2023-12-13 19:59:11', 8),
(26, 'bongabong', 'bongabong', 'bongabong', 'bongabong', 'bongabong', 'female', 21, 'bongabong@gmail.com', 'admin', '$2y$12$slGvOmv9U0GfBWa/Q2doteEY67v8zfFO..euRMwRvxGu8ruZdRzEa', '2023-12-15 23:58:38', '2023-12-15 23:58:38', 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `audits`
--
ALTER TABLE `audits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `audits_inventory_id_foreign` (`inventory_id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `inventories`
--
ALTER TABLE `inventories`
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
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sales_inventory_id_foreign` (`inventory_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_branch_id_foreign` (`branch_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `audits`
--
ALTER TABLE `audits`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=289;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventories`
--
ALTER TABLE `inventories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=243;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `audits`
--
ALTER TABLE `audits`
  ADD CONSTRAINT `audits_inventory_id_foreign` FOREIGN KEY (`inventory_id`) REFERENCES `inventories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_inventory_id_foreign` FOREIGN KEY (`inventory_id`) REFERENCES `inventories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
