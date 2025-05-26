-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2025 at 08:04 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `finanor`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` int(10) UNSIGNED NOT NULL,
  `space_id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `entity_id` int(10) UNSIGNED NOT NULL,
  `entity_type` varchar(255) NOT NULL,
  `action` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `space_id`, `user_id`, `entity_id`, `entity_type`, `action`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'tag', 'tag.created', '2025-01-21 22:18:09', '2025-01-21 22:18:09'),
(2, 1, 1, 1, 'recurring', 'recurring.created', '2025-01-21 22:19:32', '2025-01-21 22:19:32'),
(3, 1, 1, 1, 'earning', 'transaction.created', '2025-01-21 22:20:13', '2025-01-21 22:20:13'),
(4, 1, 1, 2, 'tag', 'tag.created', '2025-01-21 22:20:43', '2025-01-21 22:20:43'),
(5, 1, 1, 3, 'tag', 'tag.created', '2025-01-21 22:20:57', '2025-01-21 22:20:57'),
(6, 1, 1, 4, 'tag', 'tag.created', '2025-01-21 22:21:11', '2025-01-21 22:21:11'),
(7, 1, 1, 5, 'tag', 'tag.created', '2025-01-21 22:21:25', '2025-01-21 22:21:25'),
(8, 1, 1, 6, 'tag', 'tag.created', '2025-01-21 22:21:36', '2025-01-21 22:21:36'),
(9, 1, 1, 1, 'spending', 'transaction.created', '2025-01-21 22:22:01', '2025-01-21 22:22:01'),
(10, 1, 1, 2, 'spending', 'transaction.created', '2025-01-21 22:26:35', '2025-01-21 22:26:35'),
(11, 1, 1, 3, 'spending', 'transaction.created', '2025-01-21 22:29:54', '2025-01-21 22:29:54'),
(12, 2, 2, 2, 'earning', 'transaction.created', '2025-04-01 18:22:05', '2025-04-01 18:22:05'),
(13, 2, 2, 7, 'tag', 'tag.created', '2025-04-01 18:22:33', '2025-04-01 18:22:33'),
(14, 2, 2, 8, 'tag', 'tag.created', '2025-04-01 18:22:47', '2025-04-01 18:22:47'),
(15, 2, 2, 9, 'tag', 'tag.created', '2025-04-01 18:23:37', '2025-04-01 18:23:37'),
(16, 2, 2, 3, 'earning', 'transaction.created', '2025-04-01 18:24:51', '2025-04-01 18:24:51'),
(17, 2, 2, 4, 'spending', 'transaction.created', '2025-04-01 18:25:31', '2025-04-01 18:25:31'),
(18, 2, 2, 5, 'spending', 'transaction.created', '2025-04-01 18:27:59', '2025-04-01 18:27:59'),
(19, 2, 2, 6, 'spending', 'transaction.created', '2025-04-01 18:28:39', '2025-04-01 18:28:39'),
(20, 2, 2, 7, 'spending', 'transaction.created', '2025-04-01 18:52:54', '2025-04-01 18:52:54'),
(21, 2, 2, 4, 'earning', 'transaction.created', '2025-04-01 18:57:28', '2025-04-01 18:57:28'),
(22, 2, 2, 5, 'earning', 'transaction.created', '2025-04-01 18:58:04', '2025-04-01 18:58:04'),
(23, 2, 2, 8, 'spending', 'transaction.created', '2025-04-01 18:58:36', '2025-04-01 18:58:36'),
(24, 2, 2, 9, 'spending', 'transaction.created', '2025-04-03 09:13:18', '2025-04-03 09:13:18'),
(25, 2, 2, 10, 'spending', 'transaction.created', '2025-04-07 10:19:18', '2025-04-07 10:19:18'),
(26, 2, 2, 10, 'spending', 'transaction.deleted', '2025-04-07 10:19:57', '2025-04-07 10:19:57'),
(27, 2, 2, 11, 'spending', 'transaction.created', '2025-04-09 07:00:53', '2025-04-09 07:00:53'),
(28, 2, 2, 12, 'spending', 'transaction.created', '2025-04-09 07:02:00', '2025-04-09 07:02:00'),
(29, 2, 2, 6, 'earning', 'transaction.created', '2025-04-09 07:03:37', '2025-04-09 07:03:37'),
(30, 2, 2, 10, 'tag', 'tag.created', '2025-04-09 07:07:33', '2025-04-09 07:07:33'),
(31, 2, 2, 11, 'tag', 'tag.created', '2025-04-09 07:07:54', '2025-04-09 07:07:54'),
(32, 2, 2, 2, 'recurring', 'recurring.created', '2025-04-09 07:08:47', '2025-04-09 07:08:47'),
(33, 2, 2, 13, 'spending', 'transaction.created', '2025-04-10 02:48:59', '2025-04-10 02:48:59'),
(34, 2, 2, 7, 'earning', 'transaction.created', '2025-04-10 02:49:39', '2025-04-10 02:49:39'),
(35, 2, 2, 14, 'spending', 'transaction.created', '2025-04-10 02:50:53', '2025-04-10 02:50:53'),
(36, 2, 2, 3, 'recurring', 'recurring.created', '2025-04-10 06:26:22', '2025-04-10 06:26:22'),
(37, 2, 2, 4, 'recurring', 'recurring.created', '2025-04-10 06:27:13', '2025-04-10 06:27:13'),
(38, 2, 2, 12, 'tag', 'tag.created', '2025-04-10 06:27:54', '2025-04-10 06:27:54'),
(39, 2, 2, 15, 'spending', 'transaction.created', '2025-04-10 06:28:14', '2025-04-10 06:28:14'),
(40, 2, 2, 16, 'spending', 'transaction.created', '2025-04-10 12:34:33', '2025-04-10 12:34:33'),
(41, 2, 2, 5, 'recurring', 'recurring.created', '2025-04-10 12:35:35', '2025-04-10 12:35:35'),
(42, 2, 2, 6, 'recurring', 'recurring.created', '2025-04-10 12:36:33', '2025-04-10 12:36:33'),
(43, 2, 2, 7, 'recurring', 'recurring.created', '2025-04-10 12:40:07', '2025-04-10 12:40:07'),
(44, 2, 2, 17, 'spending', 'transaction.created', '2025-04-10 12:41:38', '2025-04-10 12:41:38'),
(45, 2, 2, 13, 'tag', 'tag.created', '2025-04-10 12:43:42', '2025-04-10 12:43:42'),
(46, 2, 2, 8, 'earning', 'transaction.created', '2025-04-10 12:44:15', '2025-04-10 12:44:15'),
(47, 2, 2, 18, 'spending', 'transaction.created', '2025-04-10 12:45:27', '2025-04-10 12:45:27'),
(48, 2, 2, 19, 'spending', 'transaction.created', '2025-04-10 12:46:12', '2025-04-10 12:46:12'),
(49, 2, 2, 9, 'earning', 'transaction.created', '2025-04-10 13:15:22', '2025-04-10 13:15:22'),
(50, 2, 2, 20, 'spending', 'transaction.created', '2025-04-10 13:16:01', '2025-04-10 13:16:01'),
(51, 2, 2, 21, 'spending', 'transaction.created', '2025-04-12 00:31:10', '2025-04-12 00:31:10'),
(52, 2, 2, 21, 'spending', 'transaction.deleted', '2025-04-12 00:31:15', '2025-04-12 00:31:15'),
(53, 2, 2, 7, 'earning', 'transaction.deleted', '2025-04-12 00:31:22', '2025-04-12 00:31:22'),
(54, 2, 2, 8, 'earning', 'transaction.deleted', '2025-04-12 00:31:25', '2025-04-12 00:31:25'),
(55, 2, 2, 9, 'earning', 'transaction.deleted', '2025-04-12 00:31:27', '2025-04-12 00:31:27'),
(56, 2, 2, 5, 'earning', 'transaction.deleted', '2025-04-12 00:33:51', '2025-04-12 00:33:51'),
(57, 2, 2, 4, 'earning', 'transaction.deleted', '2025-04-12 00:33:54', '2025-04-12 00:33:54'),
(58, 2, 2, 3, 'earning', 'transaction.deleted', '2025-04-12 00:33:58', '2025-04-12 00:33:58'),
(59, 2, 2, 2, 'earning', 'transaction.deleted', '2025-04-12 00:34:02', '2025-04-12 00:34:02'),
(60, 2, 2, 6, 'earning', 'transaction.deleted', '2025-04-12 00:34:05', '2025-04-12 00:34:05'),
(61, 2, 2, 10, 'earning', 'transaction.created', '2025-04-12 00:40:01', '2025-04-12 00:40:01'),
(62, 2, 2, 13, 'tag', 'tag.deleted', '2025-04-12 00:41:12', '2025-04-12 00:41:12'),
(63, 2, 2, 8, 'tag', 'tag.deleted', '2025-04-12 00:41:20', '2025-04-12 00:41:20'),
(64, 2, 2, 11, 'earning', 'transaction.created', '2025-04-12 00:41:50', '2025-04-12 00:41:50'),
(65, 2, 2, 12, 'earning', 'transaction.created', '2025-04-12 00:42:40', '2025-04-12 00:42:40'),
(66, 2, 2, 13, 'earning', 'transaction.created', '2025-04-12 00:43:11', '2025-04-12 00:43:11'),
(67, 2, 2, 14, 'earning', 'transaction.created', '2025-04-12 00:43:58', '2025-04-12 00:43:58'),
(68, 2, 2, 22, 'spending', 'transaction.created', '2025-04-12 00:46:15', '2025-04-12 00:46:15'),
(69, 2, 2, 23, 'spending', 'transaction.created', '2025-04-12 00:47:04', '2025-04-12 00:47:04'),
(70, 2, 2, 24, 'spending', 'transaction.created', '2025-04-12 00:48:01', '2025-04-12 00:48:01'),
(71, 2, 2, 14, 'tag', 'tag.created', '2025-04-12 00:53:02', '2025-04-12 00:53:02'),
(72, 2, 2, 25, 'spending', 'transaction.created', '2025-04-12 00:53:39', '2025-04-12 00:53:39'),
(73, 4, 4, 15, 'earning', 'transaction.created', '2025-04-12 01:27:49', '2025-04-12 01:27:49'),
(74, 4, 4, 15, 'tag', 'tag.created', '2025-04-12 01:28:13', '2025-04-12 01:28:13'),
(75, 4, 4, 16, 'tag', 'tag.created', '2025-04-12 01:28:25', '2025-04-12 01:28:25'),
(76, 4, 4, 26, 'spending', 'transaction.created', '2025-04-12 01:28:46', '2025-04-12 01:28:46'),
(77, 4, 4, 27, 'spending', 'transaction.created', '2025-04-12 01:29:44', '2025-04-12 01:29:44'),
(78, 2, 2, 28, 'spending', 'transaction.created', '2025-04-12 04:43:16', '2025-04-12 04:43:16'),
(79, 2, 2, 29, 'spending', 'transaction.created', '2025-04-18 22:51:34', '2025-04-18 22:51:34'),
(80, 2, 2, 30, 'spending', 'transaction.created', '2025-04-20 09:18:17', '2025-04-20 09:18:17'),
(81, 2, 2, 16, 'earning', 'transaction.created', '2025-04-23 10:14:19', '2025-04-23 10:14:19'),
(82, 2, 2, 31, 'spending', 'transaction.created', '2025-04-23 10:15:08', '2025-04-23 10:15:08'),
(83, 2, 2, 32, 'spending', 'transaction.created', '2025-04-27 12:20:42', '2025-04-27 12:20:42'),
(84, 2, 2, 33, 'spending', 'transaction.created', '2025-04-27 12:21:24', '2025-04-27 12:21:24'),
(85, 2, 2, 17, 'earning', 'transaction.created', '2025-05-18 00:18:55', '2025-05-18 00:18:55'),
(86, 2, 2, 34, 'spending', 'transaction.created', '2025-05-18 00:19:36', '2025-05-18 00:19:36'),
(87, 2, 2, 35, 'spending', 'transaction.created', '2025-05-18 00:24:32', '2025-05-18 00:24:32'),
(88, 2, 2, 36, 'spending', 'transaction.created', '2025-05-18 00:26:32', '2025-05-18 00:26:32'),
(89, 2, 2, 37, 'spending', 'transaction.created', '2025-05-18 00:27:12', '2025-05-18 00:27:12'),
(90, 2, 2, 18, 'earning', 'transaction.created', '2025-05-21 23:47:26', '2025-05-21 23:47:26'),
(91, 2, 2, 19, 'earning', 'transaction.created', '2025-05-21 23:51:14', '2025-05-21 23:51:14'),
(92, 2, 2, 38, 'spending', 'transaction.created', '2025-05-22 00:29:25', '2025-05-22 00:29:25'),
(93, 2, 2, 39, 'spending', 'transaction.created', '2025-05-23 05:07:37', '2025-05-23 05:07:37'),
(94, 2, 2, 40, 'spending', 'transaction.created', '2025-05-23 05:09:38', '2025-05-23 05:09:38'),
(95, 2, 2, 20, 'earning', 'transaction.created', '2025-05-24 11:15:25', '2025-05-24 11:15:25'),
(96, 2, 2, 21, 'earning', 'transaction.created', '2025-05-24 11:15:56', '2025-05-24 11:15:56'),
(97, 2, 2, 41, 'spending', 'transaction.created', '2025-05-24 11:16:40', '2025-05-24 11:16:40'),
(98, 2, 2, 22, 'earning', 'transaction.created', '2025-05-24 11:18:13', '2025-05-24 11:18:13'),
(99, 2, 2, 42, 'spending', 'transaction.created', '2025-05-24 11:18:57', '2025-05-24 11:18:57');

-- --------------------------------------------------------

--
-- Table structure for table `api_keys`
--

CREATE TABLE `api_keys` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attachments`
--

CREATE TABLE `attachments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaction_type` varchar(255) NOT NULL,
  `transaction_id` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `budgets`
--

CREATE TABLE `budgets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `space_id` int(10) UNSIGNED NOT NULL,
  `tag_id` int(10) UNSIGNED NOT NULL,
  `period` varchar(255) NOT NULL,
  `amount` int(10) UNSIGNED NOT NULL,
  `starts_on` date NOT NULL,
  `ends_on` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `budgets`
--

INSERT INTO `budgets` (`id`, `space_id`, `tag_id`, `period`, `amount`, `starts_on`, `ends_on`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, 2, 10, 'monthly', 200000, '2025-05-01', NULL, '2025-04-12 00:51:47', '2025-05-23 14:20:07', NULL),
(6, 2, 14, 'monthly', 200000, '2025-05-01', NULL, '2025-04-12 00:53:13', '2025-05-22 01:30:40', NULL),
(7, 2, 11, 'monthly', 350000, '2025-05-01', NULL, '2025-04-23 10:16:24', '2025-05-23 14:20:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `conversion_rates`
--

CREATE TABLE `conversion_rates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `base_currency_id` int(10) UNSIGNED NOT NULL,
  `target_currency_id` int(10) UNSIGNED NOT NULL,
  `rate` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `symbol` varchar(255) NOT NULL,
  `iso` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `name`, `symbol`, `iso`) VALUES
(1, 'Euro', '&euro;', 'EUR'),
(2, 'US Dollar', '&dollar;', 'USD'),
(3, 'British Pound', '&pound;', 'GBP'),
(4, 'Libyan Dinar', 'LYD', 'LYD'),
(5, 'Tunisian Dinar', 'TND', 'TND'),
(6, 'Ghanaian Cedis', 'GHS', 'GHS'),
(7, 'Sudanese Pound', 'SDG', 'SDG'),
(8, 'Moroccan Dirham', 'MAD', 'MAD'),
(9, 'Botswana Pula', 'BWP', 'BWP'),
(10, 'South African Rand', 'ZAR', 'ZAR'),
(11, 'Egyptian Pound', 'EGP', 'EGP'),
(12, 'Eritrean Nakfa', 'ERN', 'ERN'),
(13, 'Zambian Kwacha', 'ZMW', 'ZMW'),
(14, 'Angolan Kwanza', 'AKZ', 'AKZ'),
(15, 'Argentine Peso', 'ARS', 'ARS'),
(16, 'Bolivian Boliviano', 'BOB', 'BOB'),
(17, 'Brazilian Real', 'BRL', 'BRL'),
(18, 'Chilean Peso', 'CLP', 'CLP'),
(19, 'Colombian Peso', 'COP', 'COP'),
(20, 'Paraguayan Guarani', 'PYG', 'PYG'),
(21, 'Peruvian Novo Sol', 'PEN', 'PEN'),
(22, 'Uruguayan Peso', 'UYU', 'UYU'),
(23, 'Venezuelan Bolivar', 'VES', 'VES'),
(24, 'Danish Krone', 'DKK', 'DKK'),
(25, 'Icelandic Krona', 'ISK', 'ISK'),
(26, 'Norwegian Krone', 'NOK', 'NOK'),
(27, 'Swedish Krona', 'SEK', 'SEK'),
(28, 'Albanian Lek', 'ALL', 'ALL'),
(29, 'Armenian Dram', 'AMD', 'AMD'),
(30, 'Azerbaijani Manat', 'AZN', 'AZN'),
(31, 'Bosnia and Herzegovina Convertible Mark', 'BAM', 'BAM'),
(32, 'Bulgarian Lev', 'BGN', 'BGN'),
(33, 'Belarusian Ruble', 'BYN', 'BYN'),
(34, 'Swiss Franc', 'CHF', 'CHF'),
(35, 'Czech Koruna', 'CZK', 'CZK'),
(36, 'Turkish lira', 'TRY', 'TRY'),
(37, 'Yuan', '元', 'CNY'),
(38, 'Yen', '&yen;', 'JPY'),
(39, 'Australian dollar', '$', 'AUD'),
(40, 'Hong Kong dollar', 'HK$', 'HKD'),
(41, 'Indian rupee', '₹', 'INR'),
(42, 'Rupiah', 'Rp', 'IDR'),
(43, 'Ringgit', 'RM', 'MYR'),
(44, 'South Korean won', '₩', 'KRW'),
(45, 'Philippine peso', '₱', 'PHP'),
(46, 'Singapore dollar', '$', 'SGD'),
(47, 'New Taiwan dollar', 'NT$', 'TWD'),
(48, 'Baht', '฿', 'THB'),
(49, 'đồng', '₫', 'VND'),
(50, 'Bangladeshi taka', 'BDT', 'BDT'),
(51, 'Mexican peso', '$', 'MXN');

-- --------------------------------------------------------

--
-- Table structure for table `daily_savings`
--

CREATE TABLE `daily_savings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `daily_savings`
--

INSERT INTO `daily_savings` (`id`, `user_id`, `date`, `amount`, `created_at`, `updated_at`) VALUES
(1, 2, '2025-05-01', 20260.00, '2025-05-23 05:06:46', '2025-05-24 11:45:28'),
(2, 2, '2025-04-09', 1200.00, '2025-04-24 05:06:46', '2025-04-26 05:08:00');

-- --------------------------------------------------------

--
-- Table structure for table `earnings`
--

CREATE TABLE `earnings` (
  `id` int(10) UNSIGNED NOT NULL,
  `space_id` int(10) UNSIGNED NOT NULL,
  `recurring_id` int(10) UNSIGNED DEFAULT NULL,
  `happened_on` date NOT NULL,
  `description` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `earnings`
--

INSERT INTO `earnings` (`id`, `space_id`, `recurring_id`, `happened_on`, `description`, `amount`, `created_at`, `updated_at`, `deleted_at`) VALUES
(11, 2, NULL, '2025-04-01', 'Salary', 3500000, '2025-04-12 00:41:50', '2025-04-12 00:42:12', NULL),
(12, 2, NULL, '2025-04-09', 'Business', 2000000, '2025-04-12 00:42:40', '2025-04-12 00:42:40', NULL),
(13, 2, NULL, '2025-04-12', 'Online Business', 1200000, '2025-04-12 00:43:11', '2025-04-12 00:43:11', NULL),
(14, 2, NULL, '2025-04-04', 'Freelancing', 1800000, '2025-04-12 00:43:57', '2025-04-12 00:45:11', NULL),
(15, 4, NULL, '2025-04-01', 'Withdrow', 5000000, '2025-04-12 01:27:49', '2025-04-12 01:27:49', NULL),
(16, 2, NULL, '2025-04-23', 'New', 500000, '2025-04-23 10:14:19', '2025-04-23 10:14:19', NULL),
(17, 2, NULL, '2025-05-18', 'Salary', 100000, '2025-05-18 00:18:55', '2025-05-18 00:18:55', NULL),
(18, 2, NULL, '2025-05-22', 'Personal', 100000, '2025-05-21 23:47:26', '2025-05-22 00:29:47', NULL),
(19, 2, NULL, '2025-05-22', 'Freelanching', 2000000, '2025-05-21 23:51:14', '2025-05-21 23:51:14', NULL),
(20, 2, NULL, '2025-05-02', 'Income', 300000, '2025-05-24 11:15:25', '2025-05-24 11:15:25', NULL),
(21, 2, NULL, '2025-05-05', 'Business', 1400000, '2025-05-24 11:15:56', '2025-05-24 11:15:56', NULL),
(22, 2, NULL, '2025-05-12', 'Business', 100000, '2025-05-24 11:18:13', '2025-05-24 11:18:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) DEFAULT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `imports`
--

CREATE TABLE `imports` (
  `id` int(10) UNSIGNED NOT NULL,
  `space_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `column_happened_on` varchar(255) DEFAULT NULL,
  `column_description` varchar(255) DEFAULT NULL,
  `column_amount` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
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
(1, 'default', '{\"uuid\":\"7c462f5c-aba0-4436-9ed5-c9673ea28f2b\",\"displayName\":\"App\\\\Mail\\\\VerifyRegistration\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:27:\\\"App\\\\Mail\\\\VerifyRegistration\\\":3:{s:7:\\\"\\u0000*\\u0000user\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:22:\\\"shakilsb4646@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1737519319, 1737519319),
(2, 'default', '{\"uuid\":\"b4ddd47e-4cfa-47bc-b443-3b273de2861d\",\"displayName\":\"App\\\\Jobs\\\\ProcessRecurrings\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\ProcessRecurrings\",\"command\":\"O:26:\\\"App\\\\Jobs\\\\ProcessRecurrings\\\":0:{}\"}}', 0, NULL, 1737519572, 1737519572),
(3, 'default', '{\"uuid\":\"63587b24-857c-4560-8ba0-6f15f832e8f7\",\"displayName\":\"App\\\\Mail\\\\VerifyRegistration\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:27:\\\"App\\\\Mail\\\\VerifyRegistration\\\":3:{s:7:\\\"\\u0000*\\u0000user\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:22:\\\"shakilsb4646@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1737520876, 1737520876),
(4, 'default', '{\"uuid\":\"bfdc2d53-b757-4230-88b4-a654073bdc20\",\"displayName\":\"App\\\\Mail\\\\VerifyRegistration\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:27:\\\"App\\\\Mail\\\\VerifyRegistration\\\":3:{s:7:\\\"\\u0000*\\u0000user\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:2;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:14:\\\"test@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1743553053, 1743553053),
(5, 'default', '{\"uuid\":\"1519b7cc-191c-45d8-9952-cee7c3b7c592\",\"displayName\":\"App\\\\Jobs\\\\ProcessRecurrings\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\ProcessRecurrings\",\"command\":\"O:26:\\\"App\\\\Jobs\\\\ProcessRecurrings\\\":0:{}\"}}', 0, NULL, 1744204128, 1744204128),
(6, 'default', '{\"uuid\":\"e7db70ca-967a-40e4-8032-c58693064052\",\"displayName\":\"App\\\\Mail\\\\VerifyRegistration\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:27:\\\"App\\\\Mail\\\\VerifyRegistration\\\":3:{s:7:\\\"\\u0000*\\u0000user\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:3;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:15:\\\"munna@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1744278290, 1744278290),
(7, 'default', '{\"uuid\":\"acfdbeec-0d0f-4984-8f8b-71c8f590ee60\",\"displayName\":\"App\\\\Jobs\\\\ProcessRecurrings\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\ProcessRecurrings\",\"command\":\"O:26:\\\"App\\\\Jobs\\\\ProcessRecurrings\\\":0:{}\"}}', 0, NULL, 1744287982, 1744287982),
(8, 'default', '{\"uuid\":\"1e654a22-5b78-4862-985b-fbb0b2e0b67a\",\"displayName\":\"App\\\\Jobs\\\\ProcessRecurrings\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\ProcessRecurrings\",\"command\":\"O:26:\\\"App\\\\Jobs\\\\ProcessRecurrings\\\":0:{}\"}}', 0, NULL, 1744288033, 1744288033),
(9, 'default', '{\"uuid\":\"504bd2e6-cfaf-4e2e-b4b2-64dee00f270a\",\"displayName\":\"App\\\\Jobs\\\\ProcessRecurrings\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\ProcessRecurrings\",\"command\":\"O:26:\\\"App\\\\Jobs\\\\ProcessRecurrings\\\":0:{}\"}}', 0, NULL, 1744310139, 1744310139),
(10, 'default', '{\"uuid\":\"0f4c97cd-adad-4230-9730-37c9de43df28\",\"displayName\":\"App\\\\Jobs\\\\ProcessRecurrings\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\ProcessRecurrings\",\"command\":\"O:26:\\\"App\\\\Jobs\\\\ProcessRecurrings\\\":0:{}\"}}', 0, NULL, 1744310193, 1744310193),
(11, 'default', '{\"uuid\":\"9d334af8-f081-4c80-bcb4-038f89bdbce9\",\"displayName\":\"App\\\\Jobs\\\\ProcessRecurrings\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\ProcessRecurrings\",\"command\":\"O:26:\\\"App\\\\Jobs\\\\ProcessRecurrings\\\":0:{}\"}}', 0, NULL, 1744310407, 1744310407),
(12, 'default', '{\"uuid\":\"72b2a726-7f36-4aaa-b48a-6ddaeee0c455\",\"displayName\":\"App\\\\Mail\\\\PasswordChanged\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:24:\\\"App\\\\Mail\\\\PasswordChanged\\\":3:{s:13:\\\"\\u0000*\\u0000updated_at\\\";O:25:\\\"Illuminate\\\\Support\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2025-04-12 06:26:55.000000\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:3:\\\"UTC\\\";}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:14:\\\"test@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1744439219, 1744439219),
(13, 'default', '{\"uuid\":\"b9913221-9b81-450b-8f0c-e66dd8f0460f\",\"displayName\":\"App\\\\Mail\\\\VerifyRegistration\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:27:\\\"App\\\\Mail\\\\VerifyRegistration\\\":3:{s:7:\\\"\\u0000*\\u0000user\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:4;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:16:\\\"munna2@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1744442759, 1744442759);

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip` varchar(255) NOT NULL,
  `failed` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `login_attempts`
--

INSERT INTO `login_attempts` (`id`, `user_id`, `ip`, `failed`, `created_at`, `updated_at`) VALUES
(1, 1, '127.0.0.1', 0, '2025-01-21 22:15:19', '2025-01-21 22:15:19'),
(2, 2, '127.0.0.1', 0, '2025-04-01 18:17:33', '2025-04-01 18:17:33'),
(3, 2, '127.0.0.1', 0, '2025-04-02 10:44:16', '2025-04-02 10:44:16'),
(4, 2, '127.0.0.1', 0, '2025-04-03 09:12:27', '2025-04-03 09:12:27'),
(5, 2, '127.0.0.1', 0, '2025-04-07 10:18:37', '2025-04-07 10:18:37'),
(6, 2, '127.0.0.1', 0, '2025-04-09 06:12:51', '2025-04-09 06:12:51'),
(7, 2, '127.0.0.1', 0, '2025-04-09 06:52:06', '2025-04-09 06:52:06'),
(8, 2, '127.0.0.1', 0, '2025-04-10 02:16:14', '2025-04-10 02:16:14'),
(9, 2, '127.0.0.1', 0, '2025-04-10 03:41:59', '2025-04-10 03:41:59'),
(10, NULL, '127.0.0.1', 1, '2025-04-10 03:44:15', '2025-04-10 03:44:15'),
(11, 3, '127.0.0.1', 0, '2025-04-10 03:44:50', '2025-04-10 03:44:50'),
(12, 2, '127.0.0.1', 0, '2025-04-10 04:03:29', '2025-04-10 04:03:29'),
(13, 2, '127.0.0.1', 0, '2025-04-10 06:18:16', '2025-04-10 06:18:16'),
(14, 2, '127.0.0.1', 0, '2025-04-10 12:20:11', '2025-04-10 12:20:11'),
(15, 2, '127.0.0.1', 0, '2025-04-10 13:09:15', '2025-04-10 13:09:15'),
(16, 2, '127.0.0.1', 0, '2025-04-11 11:57:37', '2025-04-11 11:57:37'),
(17, 2, '127.0.0.1', 0, '2025-04-12 00:17:00', '2025-04-12 00:17:00'),
(18, 4, '127.0.0.1', 0, '2025-04-12 01:25:59', '2025-04-12 01:25:59'),
(19, 2, '127.0.0.1', 0, '2025-04-12 01:27:11', '2025-04-12 01:27:11'),
(20, 4, '127.0.0.1', 0, '2025-04-12 01:27:29', '2025-04-12 01:27:29'),
(21, 2, '127.0.0.1', 0, '2025-04-12 02:40:01', '2025-04-12 02:40:01'),
(22, 2, '127.0.0.1', 0, '2025-04-18 22:47:58', '2025-04-18 22:47:58'),
(23, 2, '127.0.0.1', 0, '2025-04-20 07:37:04', '2025-04-20 07:37:04'),
(24, 2, '127.0.0.1', 0, '2025-04-21 01:46:46', '2025-04-21 01:46:46'),
(25, 2, '127.0.0.1', 0, '2025-04-23 10:09:06', '2025-04-23 10:09:06'),
(26, 2, '127.0.0.1', 0, '2025-04-23 10:10:10', '2025-04-23 10:10:10'),
(27, 2, '127.0.0.1', 0, '2025-04-25 23:16:43', '2025-04-25 23:16:43'),
(28, 2, '127.0.0.1', 0, '2025-04-27 11:09:51', '2025-04-27 11:09:51'),
(29, 2, '127.0.0.1', 0, '2025-05-04 05:45:44', '2025-05-04 05:45:44'),
(30, 2, '127.0.0.1', 0, '2025-05-18 00:17:48', '2025-05-18 00:17:48'),
(31, 2, '127.0.0.1', 0, '2025-05-21 23:45:54', '2025-05-21 23:45:54'),
(32, 2, '127.0.0.1', 0, '2025-05-22 07:31:41', '2025-05-22 07:31:41'),
(33, 2, '127.0.0.1', 0, '2025-05-23 04:37:58', '2025-05-23 04:37:58'),
(34, 2, '127.0.0.1', 0, '2025-05-23 14:09:16', '2025-05-23 14:09:16'),
(35, 2, '127.0.0.1', 0, '2025-05-24 10:16:23', '2025-05-24 10:16:23');

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
(1, '2014_10_11_000000_create_currencies_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2017_07_19_000000_create_tags_table', 1),
(5, '2017_07_20_000000_create_spendings_table', 1),
(6, '2017_07_21_000000_create_earnings_table', 1),
(7, '2018_09_12_150232_create_jobs_table', 1),
(8, '2018_09_13_112448_create_recurrings_table', 1),
(9, '2018_10_02_185825_create_spaces_table', 1),
(10, '2018_10_02_190502_create_user_space_table', 1),
(11, '2018_10_05_195046_add_overdue_foreign_keys', 1),
(12, '2018_10_10_150420_create_failed_jobs_table', 1),
(13, '2018_10_14_122724_create_imports_table', 1),
(14, '2018_10_14_132003_add_import_id_column_to_spendings_table', 1),
(15, '2018_10_24_062234_insert_major_western_currencies', 1),
(16, '2018_11_06_201307_create_ideas_table', 1),
(17, '2018_11_19_180234_insert_african_currencies', 1),
(18, '2018_11_23_161828_move_currency_id_column_to_spaces_table', 1),
(19, '2018_12_17_174821_create_activities_table', 1),
(20, '2019_01_02_230218_create_login_attempts_table', 1),
(21, '2020_06_05_153853_add_recurring_id_column_to_earnings_table', 1),
(22, '2020_06_05_160120_rename_type_column_to_interval_in_recurrings_table', 1),
(23, '2020_06_05_160648_add_type_column_to_recurrings_table', 1),
(24, '2020_06_13_151635_create_attachments_table', 1),
(25, '2020_06_16_184356_insert_south_american_currencies', 1),
(26, '2020_06_20_145102_insert_nordic_currencies', 1),
(27, '2020_06_22_151359_insert_remaining_european_currencies', 1),
(28, '2020_06_28_202633_create_conversion_rates_table', 1),
(29, '2020_06_30_204814_add_currency_id_column_to_recurrings_table', 1),
(30, '2020_07_01_181201_create_budgets_table', 1),
(31, '2020_07_01_230418_add_iso_column_to_currencies_table', 1),
(32, '2020_07_15_195639_create_space_invites_table', 1),
(33, '2020_07_21_184946_add_last_verification_mail_sent_at_column_to_users_table', 1),
(34, '2020_07_25_130850_add_plan_column_to_users_table', 1),
(35, '2020_07_26_162432_add_stripe_customer_id_column_to_users_table', 1),
(36, '2020_07_28_211805_create_widgets_table', 1),
(37, '2020_09_27_212734_insert_turkish_lira_into_currencies_table', 1),
(38, '2020_09_28_153744_add_default_transaction_type_column_to_users_table', 1),
(39, '2020_09_28_181541_insert_asian_currencies', 1),
(40, '2020_09_29_193515_add_first_day_of_week_column_to_users_table', 1),
(41, '2020_12_21_232350_add_uuid_column_to_failed_jobs_table', 1),
(42, '2020_12_21_232403_generate_missing_uuids_for_failed_jobs', 1),
(43, '2020_12_27_202727_create_default_widgets_for_existing_users', 1),
(44, '2021_01_15_124130_insert_bangladeshi_taka_into_currencies_table', 1),
(45, '2021_06_23_200708_delete_budgets_without_tags', 1),
(46, '2023_10_26_220756_change_column_type_to_unsigned_big_integer_for_id_in_users_table', 1),
(47, '2023_11_05_012524_create_api_keys_table', 1),
(48, '2023_12_24_210952_remove_stripe_and_plan_related_columns_from_users_table', 1),
(49, '2023_12_26_214729_drop_ideas_table', 1),
(50, '2024_08_31_211536_insert_mexican_peso_into_currencies_table', 1),
(51, '2025_01_22_041133_create_sessions_table', 2),
(52, '2025_04_27_171646_add_emotion_to_expenses_table', 3),
(53, '2025_04_27_171849_add_emotion_to_expenses_table', 4),
(54, '2025_05_22_140948_create_daily_savings_table', 5);

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
-- Table structure for table `recurrings`
--

CREATE TABLE `recurrings` (
  `id` int(10) UNSIGNED NOT NULL,
  `space_id` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `interval` varchar(255) NOT NULL,
  `day` varchar(255) NOT NULL,
  `starts_on` date NOT NULL,
  `ends_on` date DEFAULT NULL,
  `last_used_on` date DEFAULT NULL,
  `tag_id` int(10) UNSIGNED DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `currency_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `recurrings`
--

INSERT INTO `recurrings` (`id`, `space_id`, `type`, `interval`, `day`, `starts_on`, `ends_on`, `last_used_on`, `tag_id`, `description`, `amount`, `currency_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'earning', 'monthly', '1', '2025-01-01', NULL, NULL, NULL, 'Salary paichi', 3000000, 50, '2025-01-21 22:19:32', '2025-01-21 22:19:32', NULL),
(2, 2, 'spending', 'daily', '9', '2025-04-09', NULL, NULL, NULL, 'sd', 500000, 50, '2025-04-09 07:08:47', '2025-04-09 07:08:47', NULL),
(3, 2, 'spending', 'daily', '10', '2025-04-10', NULL, NULL, NULL, 'sssss', 1000, 50, '2025-04-10 06:26:22', '2025-04-10 06:26:22', NULL),
(4, 2, 'spending', 'weekly', '10', '2025-04-10', NULL, NULL, NULL, 'Hakaw', 500000, 50, '2025-04-10 06:27:13', '2025-04-10 06:27:13', NULL),
(5, 2, 'spending', 'weekly', '10', '2025-04-10', '2026-04-11', NULL, NULL, 'new tour', 100000, 50, '2025-04-10 12:35:35', '2025-04-10 12:35:35', NULL),
(6, 2, 'spending', 'weekly', '11', '2025-04-11', NULL, NULL, NULL, 'niche', 100000, 50, '2025-04-10 12:36:33', '2025-04-10 12:36:33', NULL),
(7, 2, 'spending', 'monthly', '10', '2025-04-10', NULL, NULL, NULL, 'Onno', 20000, 50, '2025-04-10 12:40:07', '2025-04-10 12:40:07', NULL);

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
('qJsH4rjIN3wywCjBaLuVRvZunpuX7Xeyof1Fgf6D', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:134.0) Gecko/20100101 Firefox/134.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYTdNRGdWWlJuQ0I4MXoycEc1SWhyYjJjeFhtdDd4MWFSQnFWaGx3MiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1737519111);

-- --------------------------------------------------------

--
-- Table structure for table `spaces`
--

CREATE TABLE `spaces` (
  `id` int(10) UNSIGNED NOT NULL,
  `currency_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `spaces`
--

INSERT INTO `spaces` (`id`, `currency_id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 50, 'Sadbin\'s Space', '2025-01-21 22:15:19', '2025-01-21 22:15:19', NULL),
(2, 50, 'Sadbin\'s Space', '2025-04-01 18:17:30', '2025-04-01 18:17:30', NULL),
(3, 50, 'Munna\'s Space', '2025-04-10 03:44:49', '2025-04-10 03:44:49', NULL),
(4, 50, 'Munna2\'s Space', '2025-04-12 01:25:58', '2025-04-12 01:25:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `space_invites`
--

CREATE TABLE `space_invites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `space_id` int(10) UNSIGNED NOT NULL,
  `invitee_user_id` int(10) UNSIGNED NOT NULL,
  `inviter_user_id` int(10) UNSIGNED NOT NULL,
  `role` varchar(255) NOT NULL,
  `accepted` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `spendings`
--

CREATE TABLE `spendings` (
  `id` int(10) UNSIGNED NOT NULL,
  `space_id` int(10) UNSIGNED NOT NULL,
  `import_id` int(10) UNSIGNED DEFAULT NULL,
  `recurring_id` int(10) UNSIGNED DEFAULT NULL,
  `tag_id` int(10) UNSIGNED DEFAULT NULL,
  `happened_on` date NOT NULL,
  `description` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `emotion` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `spendings`
--

INSERT INTO `spendings` (`id`, `space_id`, `import_id`, `recurring_id`, `tag_id`, `happened_on`, `description`, `amount`, `emotion`, `created_at`, `updated_at`, `deleted_at`) VALUES
(22, 2, NULL, NULL, 7, '2025-04-05', 'Basa Vara', 1500000, NULL, '2025-04-12 00:46:15', '2025-04-12 00:46:15', NULL),
(23, 2, NULL, NULL, 9, '2025-04-08', 'Tuition Fee', 850000, NULL, '2025-04-12 00:47:04', '2025-04-12 00:47:25', NULL),
(24, 2, NULL, NULL, 10, '2025-04-12', 'Gash Bill', 150000, NULL, '2025-04-12 00:48:01', '2025-04-12 00:48:01', NULL),
(25, 2, NULL, NULL, 14, '2025-04-06', 'Friend Adda, dinner', 150000, NULL, '2025-04-12 00:53:39', '2025-04-12 00:53:50', NULL),
(26, 4, NULL, NULL, 15, '2025-04-05', 'Basa Vara', 500000, '3', '2025-04-12 01:28:46', '2025-04-12 01:28:46', NULL),
(27, 4, NULL, NULL, 16, '2025-04-12', 'nasta bill', 50000, '1', '2025-04-12 01:29:44', '2025-04-12 01:29:44', NULL),
(28, 2, NULL, NULL, 10, '2025-04-12', 'c', 50000, '1', '2025-04-12 04:43:16', '2025-04-12 04:43:16', NULL),
(29, 2, NULL, NULL, 7, '2025-04-19', 's', 400000, '2', '2025-04-18 22:51:34', '2025-04-18 22:51:34', NULL),
(30, 2, NULL, NULL, 14, '2025-04-20', 'weafs', 500000, '2', '2025-04-20 09:18:17', '2025-04-20 09:18:17', NULL),
(31, 2, NULL, NULL, 11, '2025-04-23', 'Tour', 100000, '3', '2025-04-23 10:15:08', '2025-04-23 10:15:08', NULL),
(32, 2, NULL, NULL, 12, '2025-04-27', 'sdf', 166600, '1', '2025-04-27 12:20:42', '2025-04-27 12:20:42', NULL),
(33, 2, NULL, NULL, 11, '2025-04-27', 'adf', 444400, '4', '2025-04-27 12:21:24', '2025-04-27 12:21:24', NULL),
(34, 2, NULL, NULL, 7, '2025-05-10', 'Basa vara', 1000000, '3', '2025-05-18 00:19:36', '2025-05-18 00:19:36', NULL),
(35, 2, NULL, NULL, 10, '2025-05-18', 'Gash Bil', 100000, '4', '2025-05-18 00:24:32', '2025-05-18 00:24:32', NULL),
(36, 2, NULL, NULL, 10, '2025-05-18', 'current', 110000, '3', '2025-05-18 00:26:32', '2025-05-18 00:26:32', NULL),
(37, 2, NULL, NULL, 11, '2025-05-18', 'TOur', 300000, '1', '2025-05-18 00:27:12', '2025-05-18 00:27:12', NULL),
(38, 2, NULL, NULL, 14, '2025-05-22', 'Kacchi Bhai', 100000, '1', '2025-05-22 00:29:25', '2025-05-22 00:29:25', NULL),
(39, 2, NULL, NULL, 9, '2025-05-23', 'Buy Book', 12000, '1', '2025-05-23 05:07:37', '2025-05-23 05:07:37', NULL),
(40, 2, NULL, NULL, 12, '2025-05-23', 'Charger', 2000, '3', '2025-05-23 05:09:38', '2025-05-23 05:09:38', NULL),
(41, 2, NULL, NULL, 14, '2025-05-14', 'Food', 300000, '3', '2025-05-24 11:16:40', '2025-05-24 11:16:40', NULL),
(42, 2, NULL, NULL, 14, '2025-05-24', 'Food', 50000, '4', '2025-05-24 11:18:57', '2025-05-24 11:18:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `space_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `color` char(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `space_id`, `name`, `color`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Job', 'D91212', '2025-01-21 22:18:09', '2025-01-21 22:18:09', NULL),
(2, 1, 'rent', '97BA21', '2025-01-21 22:20:43', '2025-01-21 22:20:43', NULL),
(3, 1, 'basa khoroc', '5e6d21', '2025-01-21 22:20:57', '2025-01-21 22:20:57', NULL),
(4, 1, 'hat khoroc', '11985c', '2025-01-21 22:21:11', '2025-01-21 22:21:11', NULL),
(5, 1, 'osud', '6fb875', '2025-01-21 22:21:25', '2025-01-21 22:21:25', NULL),
(6, 1, 'transport', '629d21', '2025-01-21 22:21:36', '2025-01-21 22:21:36', NULL),
(7, 2, 'Rent', 'B14747', '2025-04-01 18:22:33', '2025-04-01 18:22:33', NULL),
(8, 2, 'Salary', '54d013', '2025-04-01 18:22:47', '2025-04-12 00:41:20', '2025-04-12 00:41:20'),
(9, 2, 'Education', 'e76196', '2025-04-01 18:23:37', '2025-04-01 18:23:37', NULL),
(10, 2, 'Utilites', '540a79', '2025-04-09 07:07:33', '2025-04-09 07:07:33', NULL),
(11, 2, 'Tour', '6b4a5a', '2025-04-09 07:07:54', '2025-04-09 07:07:54', NULL),
(12, 2, 'New', '7efb76', '2025-04-10 06:27:54', '2025-04-10 06:27:54', NULL),
(13, 2, 'Basa Vara', '331b67', '2025-04-10 12:43:42', '2025-04-12 00:41:12', '2025-04-12 00:41:12'),
(14, 2, 'Pocket Money', 'e06b7f', '2025-04-12 00:53:02', '2025-04-12 00:53:02', NULL),
(15, 4, 'Rent', '17d100', '2025-04-12 01:28:13', '2025-04-12 01:28:13', NULL),
(16, 4, 'Pocket Money', 'ec5563', '2025-04-12 01:28:25', '2025-04-12 01:28:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `verification_token` varchar(100) DEFAULT NULL,
  `last_verification_mail_sent_at` datetime DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `language` varchar(255) NOT NULL DEFAULT 'en',
  `theme` varchar(255) NOT NULL DEFAULT 'light',
  `weekly_report` tinyint(1) NOT NULL DEFAULT 1,
  `default_transaction_type` varchar(255) NOT NULL DEFAULT 'earning',
  `first_day_of_week` varchar(255) NOT NULL DEFAULT 'monday',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `avatar`, `name`, `email`, `password`, `verification_token`, `last_verification_mail_sent_at`, `remember_token`, `language`, `theme`, `weekly_report`, `default_transaction_type`, `first_day_of_week`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Sadbin', 'shakilsb4646@gmail.com', '$2y$10$58ZkXa...WCroU9I8dzn0u5aI6y11zZm3M/VCNB.amyszQkH4uZEy', '0mbrcR2kqUhYlde2SLyPlUDMzucJUcn2acPC4Bk1xZW4KMk8OJUPmMGqU0LNczz5ugeSIOeWbmlmk8YIeuSLsyuAA5rpCugWQlH4', '2025-01-22 04:41:16', NULL, 'en', 'dark', 1, 'earning', 'monday', '2025-01-21 22:15:19', '2025-01-21 22:41:16'),
(2, '19EY1Jj1qEMEuiWAJqO87iwjwMVuOfHh03KBEZ4f.jpg', 'Sadbin', 'test@gmail.com', '$2y$10$qO5ctuaNJosZb1CH4ikQg..1YCrLKry0vadtvUjAIi9fbGAfZETri', 'ON636vqGXLiIWfBVJA5Ifikio2uYhMucVbxNruqN3TttqeJqbrCtRAAN2QQmXG5JenLcgW1RzvchTntDaxB4E2l0wo8bU5rldwS7', '2025-04-02 00:17:33', NULL, 'en', 'light', 0, 'earning', 'sunday', '2025-04-01 18:17:30', '2025-05-23 14:22:21'),
(3, 'vSNTp8PIuZYanu7j5Z7UzqCM7gqiqjacdhkXs5o1.png', 'Munna', 'munna@gmail.com', '$2y$10$vDme7MrAKEgg.WAIq4F6BeRvaghrxBamnPAp38lWafm.Z2RkV06Ju', '8l3DQIu0N3IYGaq2jcNCITygFZN6e0d7ryUxyYaP4TjaqBU9SnJchvm62wi6HXUhLKsPZ1Fr52RNC4U8vKswJMy89fu5Rj1OESM7', '2025-04-10 09:44:50', NULL, 'en', 'light', 1, 'earning', 'monday', '2025-04-10 03:44:49', '2025-04-10 03:47:04'),
(4, 'KLL9YrDnUjokJZquNlUp5e2MFN6VHboVnJhXs5DJ.png', 'Munna2', 'munna2@gmail.com', '$2y$10$IlD1iiO7IXFkc4UZ09arnuvAPg1WENtCPUOiZh0q5SQ1x2mOtCSnS', 'YjzPKgpMeReKRBuZL1H0yn1i4IqTrNCsDd1nn4keO1gg4tWFJAzPgreYufe1e9UahLe2rtsvowWeoGoWHPklHnN6TTuJ5bVUfgPC', '2025-04-12 07:25:59', NULL, 'en', 'light', 1, 'earning', 'monday', '2025-04-12 01:25:58', '2025-04-12 01:26:49');

-- --------------------------------------------------------

--
-- Table structure for table `user_space`
--

CREATE TABLE `user_space` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `space_id` int(10) UNSIGNED NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'regular'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_space`
--

INSERT INTO `user_space` (`id`, `user_id`, `space_id`, `role`) VALUES
(1, 1, 1, 'admin'),
(2, 2, 2, 'admin'),
(3, 3, 3, 'admin'),
(4, 4, 4, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `widgets`
--

CREATE TABLE `widgets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `sorting_index` int(10) UNSIGNED NOT NULL,
  `properties` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `widgets`
--

INSERT INTO `widgets` (`id`, `user_id`, `type`, `sorting_index`, `properties`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'balance', 0, '{}', '2025-01-21 22:15:19', '2025-01-21 22:15:19', NULL),
(2, 1, 'spent', 1, '{\"period\":\"today\"}', '2025-01-21 22:15:19', '2025-01-21 22:24:30', NULL),
(3, 1, 'spent', 2, '{\"period\":\"this_month\"}', '2025-01-21 22:15:19', '2025-01-21 22:24:30', NULL),
(4, 2, 'balance', 0, '{}', '2025-04-01 18:17:30', '2025-04-01 18:17:30', NULL),
(5, 2, 'spent', 1, '{\"period\":\"today\"}', '2025-04-01 18:17:30', '2025-04-01 18:17:30', NULL),
(6, 2, 'spent', 2, '{\"period\":\"this_month\"}', '2025-04-01 18:17:30', '2025-04-10 03:15:26', NULL),
(7, 2, 'balance', 3, '{}', '2025-04-10 03:06:44', '2025-04-10 03:15:30', '2025-04-10 03:15:30'),
(8, 3, 'balance', 0, '{}', '2025-04-10 03:44:49', '2025-04-10 03:44:49', NULL),
(9, 3, 'spent', 1, '{\"period\":\"today\"}', '2025-04-10 03:44:49', '2025-04-10 03:44:49', NULL),
(10, 3, 'spent', 2, '{\"period\":\"this_month\"}', '2025-04-10 03:44:49', '2025-04-10 03:44:49', NULL),
(11, 4, 'balance', 0, '{}', '2025-04-12 01:25:58', '2025-04-12 01:25:58', NULL),
(12, 4, 'spent', 1, '{\"period\":\"today\"}', '2025-04-12 01:25:58', '2025-04-12 01:25:58', NULL),
(13, 4, 'spent', 2, '{\"period\":\"this_month\"}', '2025-04-12 01:25:58', '2025-04-12 01:25:58', NULL),
(14, 2, 'balance', 3, '{}', '2025-05-24 10:17:18', '2025-05-24 10:34:25', '2025-05-24 10:34:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activities_space_id_foreign` (`space_id`),
  ADD KEY `activities_user_id_foreign` (`user_id`);

--
-- Indexes for table `api_keys`
--
ALTER TABLE `api_keys`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `api_keys_token_unique` (`token`),
  ADD KEY `api_keys_user_id_foreign` (`user_id`);

--
-- Indexes for table `attachments`
--
ALTER TABLE `attachments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `budgets`
--
ALTER TABLE `budgets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conversion_rates`
--
ALTER TABLE `conversion_rates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daily_savings`
--
ALTER TABLE `daily_savings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `daily_savings_user_id_foreign` (`user_id`);

--
-- Indexes for table `earnings`
--
ALTER TABLE `earnings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `earnings_space_id_foreign` (`space_id`),
  ADD KEY `earnings_recurring_id_foreign` (`recurring_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `imports`
--
ALTER TABLE `imports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `imports_space_id_foreign` (`space_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `login_attempts_user_id_foreign` (`user_id`);

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
-- Indexes for table `recurrings`
--
ALTER TABLE `recurrings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recurrings_space_id_foreign` (`space_id`),
  ADD KEY `recurrings_tag_id_foreign` (`tag_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `spaces`
--
ALTER TABLE `spaces`
  ADD PRIMARY KEY (`id`),
  ADD KEY `spaces_currency_id_foreign` (`currency_id`);

--
-- Indexes for table `space_invites`
--
ALTER TABLE `space_invites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spendings`
--
ALTER TABLE `spendings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `spendings_space_id_foreign` (`space_id`),
  ADD KEY `spendings_recurring_id_foreign` (`recurring_id`),
  ADD KEY `spendings_tag_id_foreign` (`tag_id`),
  ADD KEY `spendings_import_id_foreign` (`import_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tags_space_id_foreign` (`space_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_space`
--
ALTER TABLE `user_space`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_space_space_id_foreign` (`space_id`),
  ADD KEY `user_space_user_id_foreign` (`user_id`);

--
-- Indexes for table `widgets`
--
ALTER TABLE `widgets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `widgets_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `api_keys`
--
ALTER TABLE `api_keys`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attachments`
--
ALTER TABLE `attachments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `budgets`
--
ALTER TABLE `budgets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `conversion_rates`
--
ALTER TABLE `conversion_rates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `daily_savings`
--
ALTER TABLE `daily_savings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `earnings`
--
ALTER TABLE `earnings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `imports`
--
ALTER TABLE `imports`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `recurrings`
--
ALTER TABLE `recurrings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `spaces`
--
ALTER TABLE `spaces`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `space_invites`
--
ALTER TABLE `space_invites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `spendings`
--
ALTER TABLE `spendings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_space`
--
ALTER TABLE `user_space`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `widgets`
--
ALTER TABLE `widgets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activities`
--
ALTER TABLE `activities`
  ADD CONSTRAINT `activities_space_id_foreign` FOREIGN KEY (`space_id`) REFERENCES `spaces` (`id`),
  ADD CONSTRAINT `activities_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `api_keys`
--
ALTER TABLE `api_keys`
  ADD CONSTRAINT `api_keys_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `daily_savings`
--
ALTER TABLE `daily_savings`
  ADD CONSTRAINT `daily_savings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `earnings`
--
ALTER TABLE `earnings`
  ADD CONSTRAINT `earnings_recurring_id_foreign` FOREIGN KEY (`recurring_id`) REFERENCES `recurrings` (`id`),
  ADD CONSTRAINT `earnings_space_id_foreign` FOREIGN KEY (`space_id`) REFERENCES `spaces` (`id`);

--
-- Constraints for table `imports`
--
ALTER TABLE `imports`
  ADD CONSTRAINT `imports_space_id_foreign` FOREIGN KEY (`space_id`) REFERENCES `spaces` (`id`);

--
-- Constraints for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD CONSTRAINT `login_attempts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `recurrings`
--
ALTER TABLE `recurrings`
  ADD CONSTRAINT `recurrings_space_id_foreign` FOREIGN KEY (`space_id`) REFERENCES `spaces` (`id`),
  ADD CONSTRAINT `recurrings_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`);

--
-- Constraints for table `spaces`
--
ALTER TABLE `spaces`
  ADD CONSTRAINT `spaces_currency_id_foreign` FOREIGN KEY (`currency_id`) REFERENCES `currencies` (`id`);

--
-- Constraints for table `spendings`
--
ALTER TABLE `spendings`
  ADD CONSTRAINT `spendings_import_id_foreign` FOREIGN KEY (`import_id`) REFERENCES `imports` (`id`),
  ADD CONSTRAINT `spendings_recurring_id_foreign` FOREIGN KEY (`recurring_id`) REFERENCES `recurrings` (`id`),
  ADD CONSTRAINT `spendings_space_id_foreign` FOREIGN KEY (`space_id`) REFERENCES `spaces` (`id`),
  ADD CONSTRAINT `spendings_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`);

--
-- Constraints for table `tags`
--
ALTER TABLE `tags`
  ADD CONSTRAINT `tags_space_id_foreign` FOREIGN KEY (`space_id`) REFERENCES `spaces` (`id`);

--
-- Constraints for table `user_space`
--
ALTER TABLE `user_space`
  ADD CONSTRAINT `user_space_space_id_foreign` FOREIGN KEY (`space_id`) REFERENCES `spaces` (`id`),
  ADD CONSTRAINT `user_space_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `widgets`
--
ALTER TABLE `widgets`
  ADD CONSTRAINT `widgets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
