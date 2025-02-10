-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 10, 2025 at 08:17 AM
-- Server version: 10.6.21-MariaDB
-- PHP Version: 8.3.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `headwayy_textile`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_groups`
--

CREATE TABLE `account_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `account_groups`
--

INSERT INTO `account_groups` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'EXPORT SALES', 1, '2024-07-05 10:00:45', '2024-10-11 05:41:19');

-- --------------------------------------------------------

--
-- Table structure for table `agents`
--

CREATE TABLE `agents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `country_id` int(11) DEFAULT NULL,
  `primary_contact_no` varchar(255) DEFAULT NULL,
  `secondary_contact_no` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `pin_code` varchar(255) DEFAULT NULL,
  `agent_percent` double DEFAULT NULL,
  `agent_type_id` int(11) DEFAULT NULL,
  `account_group_id` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `agents`
--

INSERT INTO `agents` (`id`, `name`, `country_id`, `primary_contact_no`, `secondary_contact_no`, `address`, `pin_code`, `agent_percent`, `agent_type_id`, `account_group_id`, `status`, `created_at`, `updated_at`) VALUES
(9, 'DIRECT', 1, NULL, NULL, NULL, NULL, 0, 6, NULL, 1, '2024-10-11 06:36:05', '2024-10-11 06:36:05'),
(10, 'AGENT', 1, NULL, NULL, NULL, NULL, 0, 6, NULL, 1, '2024-10-11 06:36:34', '2025-01-08 12:29:43');

-- --------------------------------------------------------

--
-- Table structure for table `agent_types`
--

CREATE TABLE `agent_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `agent_types`
--

INSERT INTO `agent_types` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Export Sales', 1, '2024-07-05 10:00:45', '2024-08-26 16:08:40'),
(2, 'Domestic Sales', 1, NULL, NULL),
(3, 'Yarn Purchase', 1, NULL, NULL),
(4, 'Yarn Sales', 1, NULL, NULL),
(5, 'JobWork', 1, NULL, NULL),
(6, 'All', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bale_packings`
--

CREATE TABLE `bale_packings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `packing_date` date DEFAULT NULL,
  `packing_type_id` int(11) DEFAULT NULL,
  `order_type` varchar(100) DEFAULT NULL,
  `buyer_id` int(11) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `bale_length` varchar(150) DEFAULT NULL,
  `quality_id` int(11) DEFAULT NULL,
  `yard_id` int(11) DEFAULT NULL,
  `tare_weight` double DEFAULT NULL,
  `gross_weight` double DEFAULT NULL,
  `location` int(11) DEFAULT NULL,
  `company` varchar(150) DEFAULT NULL,
  `bale_roll_number` double DEFAULT NULL,
  `bale_roll_manual_no` double DEFAULT NULL,
  `loom_type_id` int(11) DEFAULT NULL,
  `consignee_id` int(11) DEFAULT NULL,
  `remarks` varchar(150) DEFAULT NULL,
  `conversion` varchar(150) DEFAULT NULL,
  `by_location` tinyint(1) DEFAULT NULL,
  `grade_id` int(11) DEFAULT NULL,
  `rack_location` date DEFAULT NULL,
  `fabric_seconds_sales` tinyint(1) DEFAULT NULL,
  `piece_no_to_scan` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `bale_packings`
--

INSERT INTO `bale_packings` (`id`, `created_at`, `updated_at`, `packing_date`, `packing_type_id`, `order_type`, `buyer_id`, `order_id`, `bale_length`, `quality_id`, `yard_id`, `tare_weight`, `gross_weight`, `location`, `company`, `bale_roll_number`, `bale_roll_manual_no`, `loom_type_id`, `consignee_id`, `remarks`, `conversion`, `by_location`, `grade_id`, `rack_location`, `fabric_seconds_sales`, `piece_no_to_scan`) VALUES
(1, '2024-07-25 07:14:03', '2024-07-25 09:55:39', '2024-07-19', 1, NULL, NULL, 13, 'good length', 1, 1, NULL, NULL, NULL, 'sez', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL),
(2, '2024-08-08 16:43:01', '2024-08-29 12:04:48', '2024-08-08', 1, 'export', 1, 23, 'short length', 3, 1, 31, 31, 2, 'sez', 31, 31, 2, NULL, '31', '31', 0, 7, '2024-08-08', 0, '31'),
(3, '2024-09-07 08:47:44', '2024-09-07 08:47:44', '2024-09-03', 1, 'export', 1, 13, 'good length', 1, 1, 12, 25, 2, 'sez', 23, 25, 2, 2, NULL, NULL, 1, 6, '2024-09-11', NULL, NULL),
(4, '2024-10-19 16:08:35', '2024-10-19 16:08:35', '2024-11-09', 1, 'export', 9, 37, 'good length', 4, 0, 69, 69, 10, 'sez', 69, 69, 3, 10, NULL, NULL, NULL, 3, NULL, NULL, NULL),
(5, '2024-11-30 16:28:01', '2025-02-03 11:31:09', '2024-01-01', 1, 'export', 9, 40, 'good length', 39, 1, 22, 22, 10, 'sez', 22, 22, 3, 10, '22', '22', 0, 3, NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bale_packing_details`
--

CREATE TABLE `bale_packing_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `bale_packing_id` int(11) DEFAULT NULL,
  `piece_number_id` varchar(20) DEFAULT NULL,
  `piece_meters` double DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `yard` double DEFAULT NULL,
  `net_wt` double DEFAULT NULL,
  `avg_wt` double DEFAULT NULL,
  `glm` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `bale_packing_details`
--

INSERT INTO `bale_packing_details` (`id`, `created_at`, `updated_at`, `bale_packing_id`, `piece_number_id`, `piece_meters`, `location`, `yard`, `net_wt`, `avg_wt`, `glm`) VALUES
(1, '2024-07-25 07:14:03', '2024-07-25 07:14:03', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, '2024-07-25 07:31:19', '2024-07-25 07:31:19', 1, NULL, 2, '23', 3, 3, 3, 3),
(3, '2024-07-25 07:50:40', '2024-07-25 07:50:40', 1, NULL, 2, '23', 3, 3, 3, 3),
(4, '2024-07-25 09:55:32', '2024-07-25 09:55:32', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, '2024-07-25 09:55:32', '2024-07-25 09:55:32', 1, NULL, 2, '23', 3, 3, 3, 3),
(6, '2024-07-25 09:55:32', '2024-07-25 09:55:32', 1, NULL, 2, '23', 3, 3, 3, 3),
(7, '2024-07-25 09:55:39', '2024-07-25 09:55:39', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, '2024-07-25 09:55:39', '2024-07-25 09:55:39', 1, NULL, 2, '23', 3, 3, 3, 3),
(9, '2024-07-25 09:55:39', '2024-07-25 09:55:39', 1, NULL, 2, '23', 3, 3, 3, 3),
(10, '2024-07-25 09:55:39', '2024-07-25 09:55:39', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, '2024-07-25 09:55:39', '2024-07-25 09:55:39', 1, NULL, 2, '23', 3, 3, 3, 3),
(12, '2024-07-25 09:55:39', '2024-07-25 09:55:39', 1, NULL, 2, '23', 3, 3, 3, 3),
(49, '2024-08-29 12:13:26', '2024-08-29 12:13:26', 2, '113', 50, '31', 31, 31, 31, 31),
(50, '2024-09-07 08:47:44', '2024-09-07 08:47:44', 3, '113', 65165, '651561nscjn', 24, 6262, 5261, 5526256),
(51, '2024-10-19 16:08:35', '2024-10-19 16:08:35', 4, '69', 69, '69', 69, 69, 69, 69),
(53, '2025-02-03 11:31:09', '2025-02-03 11:31:09', 5, '22', 22, '22', 222, 22, 22, 22);

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Bank India', 1, '2024-07-05 10:00:45', '2024-08-26 16:08:40'),
(2, 'bank 2', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `beam_inwards`
--

CREATE TABLE `beam_inwards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sizing_plan_id` int(11) DEFAULT NULL,
  `receive_date` date DEFAULT NULL,
  `no_of_cones_issued` double DEFAULT NULL,
  `warp_count_measure` double DEFAULT NULL,
  `receipt_no` double DEFAULT NULL,
  `dc_no` varchar(100) DEFAULT NULL,
  `vehicle_no` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `beam_inwards`
--

INSERT INTO `beam_inwards` (`id`, `created_at`, `updated_at`, `sizing_plan_id`, `receive_date`, `no_of_cones_issued`, `warp_count_measure`, `receipt_no`, `dc_no`, `vehicle_no`) VALUES
(1, '2024-07-05 10:00:45', '2024-07-05 13:26:19', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, '2024-07-20 17:07:14', '2024-07-20 17:07:14', 5, '2024-07-06', 12, 12, 12, '21', '21'),
(3, '2024-08-05 06:54:28', '2024-08-05 06:54:28', 7, '2024-12-31', 1, 1, 1, '1', '1'),
(4, '2024-08-05 16:30:52', '2024-08-05 16:30:52', 6, '2024-08-08', 2, 2, 1, 'aa', 'aa'),
(5, '2024-08-08 11:10:38', '2024-08-08 11:10:38', 11, '2024-08-08', 15, 15, 15, '15', '15'),
(6, '2024-10-06 15:32:56', '2024-10-06 15:32:56', 12, '2024-10-13', 0, 0, 69, '12', '12'),
(7, '2024-10-19 15:34:50', '2024-10-19 15:34:50', 13, '2025-02-01', 2, 2, 21, '12', '12'),
(8, '2024-11-04 16:26:39', '2024-11-04 16:26:39', 16, '2024-11-04', 12, 11, 22, '33', '44'),
(9, '2024-11-08 16:23:45', '2024-11-08 16:23:45', 17, '2024-11-09', 12, 12, 12, '12', '12'),
(10, '2024-11-30 16:10:25', '2024-11-30 16:10:25', 18, '2024-01-01', 22, 2, 22, '2', '22'),
(11, '2025-01-18 08:24:16', '2025-01-18 08:24:16', 19, '2025-01-18', 0, 1750, 0, '0', '111'),
(12, '2025-02-05 06:54:38', '2025-02-05 06:54:38', 20, '2025-02-08', 12, 12, 12, '12', '12');

-- --------------------------------------------------------

--
-- Table structure for table `beam_inward_details`
--

CREATE TABLE `beam_inward_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `beam_inward_id` int(11) DEFAULT NULL,
  `weaving_contract_id` int(11) DEFAULT NULL,
  `receive_metrs` double DEFAULT NULL,
  `beam_number` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `beam_inward_details`
--

INSERT INTO `beam_inward_details` (`id`, `beam_inward_id`, `weaving_contract_id`, `receive_metrs`, `beam_number`, `created_at`, `updated_at`) VALUES
(5, 5, 10, 15, 15, '2024-08-08 11:10:38', '2024-08-08 11:10:38'),
(6, 5, 9, 15, 15, '2024-08-08 11:10:38', '2024-08-08 11:10:38'),
(7, 2, 1, 17, 22, '2024-08-29 12:01:55', '2024-08-29 12:01:55'),
(8, 6, 11, 12, 1, '2024-10-06 15:32:56', '2024-10-06 15:32:56'),
(9, 7, 14, 69, 12, '2024-10-19 15:34:50', '2024-10-19 15:34:50'),
(10, 8, 12, 12, 23, '2024-11-04 16:26:59', '2024-11-04 16:26:59'),
(11, 9, 15, 23, 23, '2024-11-08 16:23:45', '2024-11-08 16:23:45'),
(12, 10, 17, 22, 22, '2024-11-30 16:10:25', '2024-11-30 16:10:25'),
(14, 11, 18, 1750, 12, '2025-01-18 08:42:38', '2025-01-18 08:42:38');

-- --------------------------------------------------------

--
-- Table structure for table `beam_outwards`
--

CREATE TABLE `beam_outwards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `outward_number` varchar(150) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `size_id` int(11) DEFAULT NULL,
  `set_id` int(11) DEFAULT NULL,
  `sort_id` int(11) DEFAULT NULL,
  `outward_date` date DEFAULT NULL,
  `vehicule_number` varchar(100) DEFAULT NULL,
  `transport` varchar(100) DEFAULT NULL,
  `hsn_code` varchar(100) DEFAULT NULL,
  `sac_code` varchar(100) DEFAULT NULL,
  `e_way_bill_no` varchar(100) DEFAULT NULL,
  `approx_value` varchar(100) DEFAULT NULL,
  `dc_no` int(11) DEFAULT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `set_close` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `beam_outwards`
--

INSERT INTO `beam_outwards` (`id`, `outward_number`, `created_at`, `updated_at`, `size_id`, `set_id`, `sort_id`, `outward_date`, `vehicule_number`, `transport`, `hsn_code`, `sac_code`, `e_way_bill_no`, `approx_value`, `dc_no`, `vendor_id`, `set_close`) VALUES
(2, 'BO-2', '2024-07-19 17:56:04', '2024-07-20 10:38:48', 1, 5, 10, '2024-07-21', 'aaa23', '2323', '3232', '2323', '23', '2323', 23, 1, 1),
(4, 'BO-4', '2024-08-08 11:11:24', '2024-08-29 12:02:07', 1, 11, 14, '2024-08-08', '14', 'A1 TRAVELS', '16', '16', '16', '16', 16, 2, 1),
(6, 'BO-6', '2024-10-19 15:35:35', '2024-10-19 15:35:35', 9, 12, 44, '2025-02-01', '12', 'trs 2', NULL, NULL, NULL, NULL, 69, 8, 1),
(7, 'BO-7', '2024-10-19 15:36:15', '2024-10-19 15:36:15', 9, 12, 44, '2025-02-01', '12', 'trs 2', NULL, NULL, NULL, NULL, 69, 8, 0),
(8, 'BO-8', '2024-10-19 15:36:48', '2024-10-20 11:29:19', 9, 12, 44, '2025-03-09', '12', 'trs 2', NULL, NULL, NULL, NULL, 69, 10, 1),
(9, 'BO-9', '2024-10-20 11:36:10', '2024-10-20 11:36:10', 9, 10, 39, '2024-10-20', NULL, NULL, NULL, NULL, NULL, NULL, 5, 8, 0),
(10, 'BO-10', '2024-11-08 16:25:49', '2024-11-08 16:25:49', 10, 13, 44, '2024-12-01', '69', 'A1 TRAVELS', '12`12`', '12', '12', '12', 12, 10, 0),
(11, 'BO-11', '2024-11-30 16:11:36', '2024-11-30 16:11:36', 10, 15, 46, '2024-01-01', '22', '22', '2', '2', '22', '22', 22, 10, 0),
(12, 'BO-12', '2025-01-18 08:44:59', '2025-01-18 08:44:59', 8, 13, 47, '2025-01-18', '69', NULL, NULL, NULL, NULL, NULL, 0, 8, 0);

-- --------------------------------------------------------

--
-- Table structure for table `beam_outward_details`
--

CREATE TABLE `beam_outward_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `beam_outward_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `weaver_id` int(11) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `beam_number` double DEFAULT NULL,
  `yarn_id` int(11) DEFAULT NULL,
  `meteres` double DEFAULT NULL,
  `width` double DEFAULT NULL,
  `expexted_weaving_mtr` double DEFAULT NULL,
  `reed_space` double DEFAULT NULL,
  `picks` double DEFAULT NULL,
  `total_ends` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `beam_outward_details`
--

INSERT INTO `beam_outward_details` (`id`, `beam_outward_id`, `created_at`, `updated_at`, `weaver_id`, `order_id`, `beam_number`, `yarn_id`, `meteres`, `width`, `expexted_weaving_mtr`, `reed_space`, `picks`, `total_ends`) VALUES
(2, 2, '2024-07-20 10:55:55', '2024-07-20 10:55:55', 1, 1, 22, 1, 7, 22, 2, 22, 22, 22),
(3, 2, '2024-07-20 10:56:08', '2024-07-20 11:02:18', 1, 1, 22, 1, 8, 22, 2, 22, 22, 22),
(4, 2, '2024-07-20 10:58:04', '2024-07-20 11:02:18', 1, 13, 22, 1, 9, 22, 2, 22, 22, 22),
(5, 2, '2024-07-20 10:58:18', '2024-07-20 11:02:18', 1, 13, 22, 1, 10, 22, 2, 22, 22, 22),
(6, 4, '2024-08-08 11:22:33', '2024-08-08 11:22:33', 1, 23, 16, 3, 5, 16, 5, 16, 16, 16),
(8, 9, '2024-10-20 11:36:10', '2024-10-20 11:36:10', 1, 23, NULL, 3, 10, NULL, 10, NULL, NULL, NULL),
(9, 10, '2024-11-08 16:25:49', '2024-11-08 16:25:49', 1, 37, 25, 4, 69, NULL, 69, NULL, NULL, NULL),
(10, 12, '2025-01-18 08:44:59', '2025-01-18 08:44:59', 1, 37, 12, 4, 1750, NULL, 69, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `beam_receive_from_weavers`
--

CREATE TABLE `beam_receive_from_weavers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `blends`
--

CREATE TABLE `blends` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `buyers`
--

CREATE TABLE `buyers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(150) DEFAULT NULL,
  `gst` varchar(150) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `address_1` varchar(250) DEFAULT NULL,
  `address_2` varchar(250) DEFAULT NULL,
  `address_3` varchar(250) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `buyer_pincode` varchar(100) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `buyer_no` varchar(100) DEFAULT NULL,
  `buyer_code` varchar(100) DEFAULT NULL,
  `bank` varchar(150) DEFAULT NULL,
  `bank_country_id` int(11) DEFAULT NULL,
  `bank_state_id` int(11) DEFAULT NULL,
  `state_code` varchar(150) DEFAULT NULL,
  `bank_address` varchar(250) DEFAULT NULL,
  `pincode` varchar(100) DEFAULT NULL,
  `bank_city_id` int(11) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `credit_limit` double DEFAULT NULL,
  `interest` double DEFAULT NULL,
  `gst_type` int(11) DEFAULT NULL,
  `consignee_as_buyer` tinyint(1) DEFAULT NULL,
  `account_group` int(11) DEFAULT NULL,
  `vendor_group_id` int(11) DEFAULT NULL,
  `tax_id` int(11) DEFAULT NULL,
  `pan` varchar(100) DEFAULT NULL,
  `port_landing` int(11) DEFAULT NULL,
  `port_destination` int(11) DEFAULT NULL,
  `currency` varchar(100) DEFAULT NULL,
  `is_self` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `buyers`
--

INSERT INTO `buyers` (`id`, `name`, `gst`, `country_id`, `state_id`, `address_1`, `address_2`, `address_3`, `city_id`, `phone`, `buyer_pincode`, `email`, `buyer_no`, `buyer_code`, `bank`, `bank_country_id`, `bank_state_id`, `state_code`, `bank_address`, `pincode`, `bank_city_id`, `is_active`, `credit_limit`, `interest`, `gst_type`, `consignee_as_buyer`, `account_group`, `vendor_group_id`, `tax_id`, `pan`, `port_landing`, `port_destination`, `currency`, `is_self`, `created_at`, `updated_at`) VALUES
(9, 'DIBELLA', NULL, 1, 2, '187/1, FIRST FLOOR, KUDULU MAIN ROAD    BEHIND BHAGYA VEG,560068 ADJACENT TO TVS YARD HOSUR ROAD,BANGALORE,', 'BEHIND BHAGYA VEG,560068', 'ADJACENT TO TVS YARD HOSUR ROAD,BANGALORE,', 14, '9632857411', '560068', NULL, 'BE00002', NULL, 'iob', 1, 2, NULL, NULL, NULL, 14, 1, NULL, NULL, 17, 1, 1, NULL, NULL, 'ARRPS6899K', NULL, NULL, 'usd', 1, '2024-10-19 15:06:40', '2025-01-08 10:35:56'),
(10, 'SUSTAINABLY CRAFTED CLOTHING PVT LTD', '3371521', 1, 4, 'NO.30/1 A2 NARANIKUPPAM,KODIPALLI POST,KRISHNAGIRI - 635121', NULL, NULL, 6, NULL, '635121', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 17, 1, NULL, NULL, NULL, 'ABBCS7152C', NULL, NULL, NULL, 1, '2025-01-08 12:53:12', '2025-01-08 12:53:12'),
(11, 'GOODWILL FABRICS PVT LTD', '2919441', 1, 2, 'SITE NO.1/B1,SY.NO.12&13 GOODWILL,19TH MAIN ROAD,  HSR LAYOUT 3RD SECTOR,NR.NARAYANA HOSPITAL,', NULL, NULL, NULL, NULL, '560101', NULL, 'BE00001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 17, 1, NULL, NULL, NULL, 'AABCG1944M', NULL, NULL, NULL, 1, '2025-01-18 06:54:33', '2025-01-18 06:54:33'),
(12, 'Buyer new', '123513', 1, 4, 'site no 1, america', 'site no 2, america', 'site no 3, america', 9, '1234567895', '654123', 'lkfajlfd@gmail.com', '1235', '1235', 'iob', 8, 4, '1235', NULL, '654123', 9, 1, NULL, NULL, 8, 1, 1, NULL, NULL, NULL, 4, 6, 'usd', 1, '2025-01-28 18:40:00', '2025-01-28 18:42:59');

-- --------------------------------------------------------

--
-- Table structure for table `buyer_consignee_details`
--

CREATE TABLE `buyer_consignee_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `buyer_id` int(11) DEFAULT NULL,
  `name` varchar(250) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `phone_number` varchar(250) DEFAULT NULL,
  `pin_code` varchar(250) DEFAULT NULL,
  `email_id` varchar(250) DEFAULT NULL,
  `gstn` varchar(250) DEFAULT NULL,
  `pan_no` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `buyer_consignee_details`
--

INSERT INTO `buyer_consignee_details` (`id`, `buyer_id`, `name`, `country_id`, `state_id`, `city_id`, `address`, `phone_number`, `pin_code`, `email_id`, `gstn`, `pan_no`, `created_at`, `updated_at`) VALUES
(7, 1, 'aaa', 4, 1, 1, 'aaa', 'ee', 'zz', 'rr', 'tt', 'ttgg', '2024-09-15 08:10:30', '2024-09-15 08:10:30'),
(11, 8, 'asdfadf', 5, 1, 4, 'afds', '554545', '545', '5455dfd', '654646', '6465646', '2024-09-24 14:56:21', '2024-09-24 14:56:21'),
(16, 7, 'fahd', NULL, 2, NULL, 'kldsfla', '6541564894', '3516', 'dfsafml', '6562', '65656', '2024-10-11 06:09:03', '2024-10-11 06:09:03'),
(17, 7, 'thalif', NULL, 2, NULL, 'sd', '6848648648646', '6846854', '84asfda', '864646', '6486466', '2024-10-11 06:09:03', '2024-10-11 06:09:03'),
(18, 12, 'Number 1', 1, 2, 9, 'site no 2, america', '9541538995', '654123', 'fdaskdfhs@gmail.com', '123546dafda', '3213156adfsasd115', '2025-01-28 18:42:59', '2025-01-28 18:42:59');

-- --------------------------------------------------------

--
-- Table structure for table `buyer_representatives`
--

CREATE TABLE `buyer_representatives` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `buyer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `representative_name` varchar(255) DEFAULT NULL,
  `representative_phone` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `buyer_representatives`
--

INSERT INTO `buyer_representatives` (`id`, `buyer_id`, `representative_name`, `representative_phone`, `created_at`, `updated_at`) VALUES
(12, 5, 'fahd', '09514376900', '2024-09-07 08:27:23', '2024-09-07 08:27:23'),
(19, 6, NULL, NULL, '2024-09-15 08:10:00', '2024-09-15 08:10:00'),
(20, 1, 'aaaa', '12154', '2024-09-15 08:10:30', '2024-09-15 08:10:30'),
(21, 1, '5487zaz', 'zazaz', '2024-09-15 08:10:30', '2024-09-15 08:10:30'),
(26, 8, NULL, NULL, '2024-09-24 14:56:21', '2024-09-24 14:56:21'),
(31, 10, NULL, NULL, '2025-01-08 12:54:21', '2025-01-08 12:54:21'),
(32, 11, NULL, NULL, '2025-01-18 06:54:33', '2025-01-18 06:54:33'),
(34, 12, 'rep 1', '516516849615', '2025-01-28 18:42:59', '2025-01-28 18:42:59');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('spatie.permission.cache', 'a:3:{s:5:\"alias\";a:5:{s:1:\"a\";s:2:\"id\";s:1:\"b\";s:4:\"name\";s:1:\"c\";s:7:\"libelle\";s:1:\"d\";s:11:\"perm_fam_id\";s:1:\"e\";s:10:\"guard_name\";}s:11:\"permissions\";a:384:{i:0;a:5:{s:1:\"a\";s:1:\"1\";s:1:\"b\";s:23:\"e_invoice_settings-view\";s:1:\"c\";s:20:\"E - Invoice Settings\";s:1:\"d\";s:1:\"1\";s:1:\"e\";s:3:\"web\";}i:1;a:5:{s:1:\"a\";s:1:\"2\";s:1:\"b\";s:25:\"e_invoice_settings-create\";s:1:\"c\";s:20:\"E - Invoice Settings\";s:1:\"d\";s:1:\"1\";s:1:\"e\";s:3:\"web\";}i:2;a:5:{s:1:\"a\";s:1:\"3\";s:1:\"b\";s:25:\"e_invoice_settings-update\";s:1:\"c\";s:20:\"E - Invoice Settings\";s:1:\"d\";s:1:\"1\";s:1:\"e\";s:3:\"web\";}i:3;a:5:{s:1:\"a\";s:1:\"4\";s:1:\"b\";s:25:\"e_invoice_settings-delete\";s:1:\"c\";s:20:\"E - Invoice Settings\";s:1:\"d\";s:1:\"1\";s:1:\"e\";s:3:\"web\";}i:4;a:5:{s:1:\"a\";s:1:\"5\";s:1:\"b\";s:23:\"certification_type-view\";s:1:\"c\";s:18:\"Certification Type\";s:1:\"d\";s:1:\"1\";s:1:\"e\";s:3:\"web\";}i:5;a:5:{s:1:\"a\";s:1:\"6\";s:1:\"b\";s:25:\"certification_type-create\";s:1:\"c\";s:18:\"Certification Type\";s:1:\"d\";s:1:\"1\";s:1:\"e\";s:3:\"web\";}i:6;a:5:{s:1:\"a\";s:1:\"7\";s:1:\"b\";s:25:\"certification_type-update\";s:1:\"c\";s:18:\"Certification Type\";s:1:\"d\";s:1:\"1\";s:1:\"e\";s:3:\"web\";}i:7;a:5:{s:1:\"a\";s:1:\"8\";s:1:\"b\";s:25:\"certification_type-delete\";s:1:\"c\";s:18:\"Certification Type\";s:1:\"d\";s:1:\"1\";s:1:\"e\";s:3:\"web\";}i:8;a:5:{s:1:\"a\";s:1:\"9\";s:1:\"b\";s:14:\"consignee-view\";s:1:\"c\";s:9:\"Consignee\";s:1:\"d\";s:1:\"1\";s:1:\"e\";s:3:\"web\";}i:9;a:5:{s:1:\"a\";s:2:\"10\";s:1:\"b\";s:16:\"consignee-create\";s:1:\"c\";s:9:\"Consignee\";s:1:\"d\";s:1:\"1\";s:1:\"e\";s:3:\"web\";}i:10;a:5:{s:1:\"a\";s:2:\"11\";s:1:\"b\";s:16:\"consignee-update\";s:1:\"c\";s:9:\"Consignee\";s:1:\"d\";s:1:\"1\";s:1:\"e\";s:3:\"web\";}i:11;a:5:{s:1:\"a\";s:2:\"12\";s:1:\"b\";s:16:\"consignee-delete\";s:1:\"c\";s:9:\"Consignee\";s:1:\"d\";s:1:\"1\";s:1:\"e\";s:3:\"web\";}i:12;a:5:{s:1:\"a\";s:2:\"13\";s:1:\"b\";s:17:\"shade_master-view\";s:1:\"c\";s:12:\"Shade Master\";s:1:\"d\";s:1:\"1\";s:1:\"e\";s:3:\"web\";}i:13;a:5:{s:1:\"a\";s:2:\"14\";s:1:\"b\";s:19:\"shade_master-create\";s:1:\"c\";s:12:\"Shade Master\";s:1:\"d\";s:1:\"1\";s:1:\"e\";s:3:\"web\";}i:14;a:5:{s:1:\"a\";s:2:\"15\";s:1:\"b\";s:19:\"shade_master-update\";s:1:\"c\";s:12:\"Shade Master\";s:1:\"d\";s:1:\"1\";s:1:\"e\";s:3:\"web\";}i:15;a:5:{s:1:\"a\";s:2:\"16\";s:1:\"b\";s:19:\"shade_master-delete\";s:1:\"c\";s:12:\"Shade Master\";s:1:\"d\";s:1:\"1\";s:1:\"e\";s:3:\"web\";}i:16;a:5:{s:1:\"a\";s:2:\"17\";s:1:\"b\";s:11:\"vendor-view\";s:1:\"c\";s:6:\"Vendor\";s:1:\"d\";s:1:\"1\";s:1:\"e\";s:3:\"web\";}i:17;a:5:{s:1:\"a\";s:2:\"18\";s:1:\"b\";s:13:\"vendor-create\";s:1:\"c\";s:6:\"Vendor\";s:1:\"d\";s:1:\"1\";s:1:\"e\";s:3:\"web\";}i:18;a:5:{s:1:\"a\";s:2:\"19\";s:1:\"b\";s:13:\"vendor-update\";s:1:\"c\";s:6:\"Vendor\";s:1:\"d\";s:1:\"1\";s:1:\"e\";s:3:\"web\";}i:19;a:5:{s:1:\"a\";s:2:\"20\";s:1:\"b\";s:13:\"vendor-delete\";s:1:\"c\";s:6:\"Vendor\";s:1:\"d\";s:1:\"1\";s:1:\"e\";s:3:\"web\";}i:20;a:5:{s:1:\"a\";s:2:\"21\";s:1:\"b\";s:15:\"group_type-view\";s:1:\"c\";s:10:\"Group Type\";s:1:\"d\";s:1:\"1\";s:1:\"e\";s:3:\"web\";}i:21;a:5:{s:1:\"a\";s:2:\"22\";s:1:\"b\";s:17:\"group_type-create\";s:1:\"c\";s:10:\"Group Type\";s:1:\"d\";s:1:\"1\";s:1:\"e\";s:3:\"web\";}i:22;a:5:{s:1:\"a\";s:2:\"23\";s:1:\"b\";s:17:\"group_type-update\";s:1:\"c\";s:10:\"Group Type\";s:1:\"d\";s:1:\"1\";s:1:\"e\";s:3:\"web\";}i:23;a:5:{s:1:\"a\";s:2:\"24\";s:1:\"b\";s:17:\"group_type-delete\";s:1:\"c\";s:10:\"Group Type\";s:1:\"d\";s:1:\"1\";s:1:\"e\";s:3:\"web\";}i:24;a:5:{s:1:\"a\";s:2:\"25\";s:1:\"b\";s:17:\"vendor_group-view\";s:1:\"c\";s:12:\"Vendor Group\";s:1:\"d\";s:1:\"1\";s:1:\"e\";s:3:\"web\";}i:25;a:5:{s:1:\"a\";s:2:\"26\";s:1:\"b\";s:19:\"vendor_group-create\";s:1:\"c\";s:12:\"Vendor Group\";s:1:\"d\";s:1:\"1\";s:1:\"e\";s:3:\"web\";}i:26;a:5:{s:1:\"a\";s:2:\"27\";s:1:\"b\";s:19:\"vendor_group-update\";s:1:\"c\";s:12:\"Vendor Group\";s:1:\"d\";s:1:\"1\";s:1:\"e\";s:3:\"web\";}i:27;a:5:{s:1:\"a\";s:2:\"28\";s:1:\"b\";s:19:\"vendor_group-delete\";s:1:\"c\";s:12:\"Vendor Group\";s:1:\"d\";s:1:\"1\";s:1:\"e\";s:3:\"web\";}i:28;a:5:{s:1:\"a\";s:2:\"29\";s:1:\"b\";s:20:\"godown_location-view\";s:1:\"c\";s:15:\"Godown Location\";s:1:\"d\";s:1:\"1\";s:1:\"e\";s:3:\"web\";}i:29;a:5:{s:1:\"a\";s:2:\"30\";s:1:\"b\";s:22:\"godown_location-create\";s:1:\"c\";s:15:\"Godown Location\";s:1:\"d\";s:1:\"1\";s:1:\"e\";s:3:\"web\";}i:30;a:5:{s:1:\"a\";s:2:\"31\";s:1:\"b\";s:22:\"godown_location-update\";s:1:\"c\";s:15:\"Godown Location\";s:1:\"d\";s:1:\"1\";s:1:\"e\";s:3:\"web\";}i:31;a:5:{s:1:\"a\";s:2:\"32\";s:1:\"b\";s:22:\"godown_location-delete\";s:1:\"c\";s:15:\"Godown Location\";s:1:\"d\";s:1:\"1\";s:1:\"e\";s:3:\"web\";}i:32;a:5:{s:1:\"a\";s:2:\"33\";s:1:\"b\";s:22:\"sales_master_type-view\";s:1:\"c\";s:17:\"Sales Master Type\";s:1:\"d\";s:1:\"1\";s:1:\"e\";s:3:\"web\";}i:33;a:5:{s:1:\"a\";s:2:\"34\";s:1:\"b\";s:24:\"sales_master_type-create\";s:1:\"c\";s:17:\"Sales Master Type\";s:1:\"d\";s:1:\"1\";s:1:\"e\";s:3:\"web\";}i:34;a:5:{s:1:\"a\";s:2:\"35\";s:1:\"b\";s:24:\"sales_master_type-update\";s:1:\"c\";s:17:\"Sales Master Type\";s:1:\"d\";s:1:\"1\";s:1:\"e\";s:3:\"web\";}i:35;a:5:{s:1:\"a\";s:2:\"36\";s:1:\"b\";s:24:\"sales_master_type-delete\";s:1:\"c\";s:17:\"Sales Master Type\";s:1:\"d\";s:1:\"1\";s:1:\"e\";s:3:\"web\";}i:36;a:5:{s:1:\"a\";s:2:\"37\";s:1:\"b\";s:8:\"gst-view\";s:1:\"c\";s:3:\"GST\";s:1:\"d\";s:1:\"1\";s:1:\"e\";s:3:\"web\";}i:37;a:5:{s:1:\"a\";s:2:\"38\";s:1:\"b\";s:10:\"gst-create\";s:1:\"c\";s:3:\"GST\";s:1:\"d\";s:1:\"1\";s:1:\"e\";s:3:\"web\";}i:38;a:5:{s:1:\"a\";s:2:\"39\";s:1:\"b\";s:10:\"gst-update\";s:1:\"c\";s:3:\"GST\";s:1:\"d\";s:1:\"1\";s:1:\"e\";s:3:\"web\";}i:39;a:5:{s:1:\"a\";s:2:\"40\";s:1:\"b\";s:10:\"gst-delete\";s:1:\"c\";s:3:\"GST\";s:1:\"d\";s:1:\"1\";s:1:\"e\";s:3:\"web\";}i:40;a:5:{s:1:\"a\";s:2:\"41\";s:1:\"b\";s:10:\"color-view\";s:1:\"c\";s:5:\"Color\";s:1:\"d\";s:1:\"1\";s:1:\"e\";s:3:\"web\";}i:41;a:5:{s:1:\"a\";s:2:\"42\";s:1:\"b\";s:12:\"color-create\";s:1:\"c\";s:5:\"Color\";s:1:\"d\";s:1:\"1\";s:1:\"e\";s:3:\"web\";}i:42;a:5:{s:1:\"a\";s:2:\"43\";s:1:\"b\";s:12:\"color-update\";s:1:\"c\";s:5:\"Color\";s:1:\"d\";s:1:\"1\";s:1:\"e\";s:3:\"web\";}i:43;a:5:{s:1:\"a\";s:2:\"44\";s:1:\"b\";s:12:\"color-delete\";s:1:\"c\";s:5:\"Color\";s:1:\"d\";s:1:\"1\";s:1:\"e\";s:3:\"web\";}i:44;a:5:{s:1:\"a\";s:2:\"45\";s:1:\"b\";s:11:\"copart-view\";s:1:\"c\";s:6:\"Copart\";s:1:\"d\";s:1:\"1\";s:1:\"e\";s:3:\"web\";}i:45;a:5:{s:1:\"a\";s:2:\"46\";s:1:\"b\";s:13:\"copart-create\";s:1:\"c\";s:6:\"Copart\";s:1:\"d\";s:1:\"1\";s:1:\"e\";s:3:\"web\";}i:46;a:5:{s:1:\"a\";s:2:\"47\";s:1:\"b\";s:13:\"copart-update\";s:1:\"c\";s:6:\"Copart\";s:1:\"d\";s:1:\"1\";s:1:\"e\";s:3:\"web\";}i:47;a:5:{s:1:\"a\";s:2:\"48\";s:1:\"b\";s:13:\"copart-delete\";s:1:\"c\";s:6:\"Copart\";s:1:\"d\";s:1:\"1\";s:1:\"e\";s:3:\"web\";}i:48;a:5:{s:1:\"a\";s:2:\"49\";s:1:\"b\";s:18:\"contract_type-view\";s:1:\"c\";s:13:\"Contract Type\";s:1:\"d\";s:1:\"1\";s:1:\"e\";s:3:\"web\";}i:49;a:5:{s:1:\"a\";s:2:\"50\";s:1:\"b\";s:20:\"contract_type-create\";s:1:\"c\";s:13:\"Contract Type\";s:1:\"d\";s:1:\"1\";s:1:\"e\";s:3:\"web\";}i:50;a:5:{s:1:\"a\";s:2:\"51\";s:1:\"b\";s:20:\"contract_type-update\";s:1:\"c\";s:13:\"Contract Type\";s:1:\"d\";s:1:\"1\";s:1:\"e\";s:3:\"web\";}i:51;a:5:{s:1:\"a\";s:2:\"52\";s:1:\"b\";s:20:\"contract_type-delete\";s:1:\"c\";s:13:\"Contract Type\";s:1:\"d\";s:1:\"1\";s:1:\"e\";s:3:\"web\";}i:52;a:5:{s:1:\"a\";s:2:\"53\";s:1:\"b\";s:11:\"agents-view\";s:1:\"c\";s:6:\"Agents\";s:1:\"d\";s:2:\"10\";s:1:\"e\";s:3:\"web\";}i:53;a:5:{s:1:\"a\";s:2:\"54\";s:1:\"b\";s:13:\"agents-create\";s:1:\"c\";s:6:\"Agents\";s:1:\"d\";s:2:\"10\";s:1:\"e\";s:3:\"web\";}i:54;a:5:{s:1:\"a\";s:2:\"55\";s:1:\"b\";s:13:\"agents-update\";s:1:\"c\";s:6:\"Agents\";s:1:\"d\";s:2:\"10\";s:1:\"e\";s:3:\"web\";}i:55;a:5:{s:1:\"a\";s:2:\"56\";s:1:\"b\";s:13:\"agents-delete\";s:1:\"c\";s:6:\"Agents\";s:1:\"d\";s:2:\"10\";s:1:\"e\";s:3:\"web\";}i:56;a:5:{s:1:\"a\";s:2:\"57\";s:1:\"b\";s:19:\"transportation-view\";s:1:\"c\";s:14:\"Transportation\";s:1:\"d\";s:1:\"1\";s:1:\"e\";s:3:\"web\";}i:57;a:5:{s:1:\"a\";s:2:\"58\";s:1:\"b\";s:21:\"transportation-create\";s:1:\"c\";s:14:\"Transportation\";s:1:\"d\";s:1:\"1\";s:1:\"e\";s:3:\"web\";}i:58;a:5:{s:1:\"a\";s:2:\"59\";s:1:\"b\";s:21:\"transportation-update\";s:1:\"c\";s:14:\"Transportation\";s:1:\"d\";s:1:\"1\";s:1:\"e\";s:3:\"web\";}i:59;a:5:{s:1:\"a\";s:2:\"60\";s:1:\"b\";s:21:\"transportation-delete\";s:1:\"c\";s:14:\"Transportation\";s:1:\"d\";s:1:\"1\";s:1:\"e\";s:3:\"web\";}i:60;a:5:{s:1:\"a\";s:2:\"61\";s:1:\"b\";s:14:\"loom_type-view\";s:1:\"c\";s:9:\"Loom Type\";s:1:\"d\";s:2:\"15\";s:1:\"e\";s:3:\"web\";}i:61;a:5:{s:1:\"a\";s:2:\"62\";s:1:\"b\";s:16:\"loom_type-create\";s:1:\"c\";s:9:\"Loom Type\";s:1:\"d\";s:2:\"15\";s:1:\"e\";s:3:\"web\";}i:62;a:5:{s:1:\"a\";s:2:\"63\";s:1:\"b\";s:16:\"loom_type-update\";s:1:\"c\";s:9:\"Loom Type\";s:1:\"d\";s:2:\"15\";s:1:\"e\";s:3:\"web\";}i:63;a:5:{s:1:\"a\";s:2:\"64\";s:1:\"b\";s:16:\"loom_type-delete\";s:1:\"c\";s:9:\"Loom Type\";s:1:\"d\";s:2:\"15\";s:1:\"e\";s:3:\"web\";}i:64;a:5:{s:1:\"a\";s:2:\"65\";s:1:\"b\";s:19:\"delivery_items-view\";s:1:\"c\";s:14:\"Delivery Items\";s:1:\"d\";s:1:\"1\";s:1:\"e\";s:3:\"web\";}i:65;a:5:{s:1:\"a\";s:2:\"66\";s:1:\"b\";s:21:\"delivery_items-create\";s:1:\"c\";s:14:\"Delivery Items\";s:1:\"d\";s:1:\"1\";s:1:\"e\";s:3:\"web\";}i:66;a:5:{s:1:\"a\";s:2:\"67\";s:1:\"b\";s:21:\"delivery_items-update\";s:1:\"c\";s:14:\"Delivery Items\";s:1:\"d\";s:1:\"1\";s:1:\"e\";s:3:\"web\";}i:67;a:5:{s:1:\"a\";s:2:\"68\";s:1:\"b\";s:21:\"delivery_items-delete\";s:1:\"c\";s:14:\"Delivery Items\";s:1:\"d\";s:1:\"1\";s:1:\"e\";s:3:\"web\";}i:68;a:5:{s:1:\"a\";s:2:\"69\";s:1:\"b\";s:20:\"inspection_type-view\";s:1:\"c\";s:15:\"Inspection Type\";s:1:\"d\";s:1:\"1\";s:1:\"e\";s:3:\"web\";}i:69;a:5:{s:1:\"a\";s:2:\"70\";s:1:\"b\";s:22:\"inspection_type-create\";s:1:\"c\";s:15:\"Inspection Type\";s:1:\"d\";s:1:\"1\";s:1:\"e\";s:3:\"web\";}i:70;a:5:{s:1:\"a\";s:2:\"71\";s:1:\"b\";s:22:\"inspection_type-update\";s:1:\"c\";s:15:\"Inspection Type\";s:1:\"d\";s:1:\"1\";s:1:\"e\";s:3:\"web\";}i:71;a:5:{s:1:\"a\";s:2:\"72\";s:1:\"b\";s:22:\"inspection_type-delete\";s:1:\"c\";s:15:\"Inspection Type\";s:1:\"d\";s:1:\"1\";s:1:\"e\";s:3:\"web\";}i:72;a:5:{s:1:\"a\";s:2:\"73\";s:1:\"b\";s:17:\"packing_type-view\";s:1:\"c\";s:12:\"Packing Type\";s:1:\"d\";s:1:\"9\";s:1:\"e\";s:3:\"web\";}i:73;a:5:{s:1:\"a\";s:2:\"74\";s:1:\"b\";s:19:\"packing_type-create\";s:1:\"c\";s:12:\"Packing Type\";s:1:\"d\";s:1:\"9\";s:1:\"e\";s:3:\"web\";}i:74;a:5:{s:1:\"a\";s:2:\"75\";s:1:\"b\";s:19:\"packing_type-update\";s:1:\"c\";s:12:\"Packing Type\";s:1:\"d\";s:1:\"9\";s:1:\"e\";s:3:\"web\";}i:75;a:5:{s:1:\"a\";s:2:\"76\";s:1:\"b\";s:19:\"packing_type-delete\";s:1:\"c\";s:12:\"Packing Type\";s:1:\"d\";s:1:\"9\";s:1:\"e\";s:3:\"web\";}i:76;a:5:{s:1:\"a\";s:2:\"77\";s:1:\"b\";s:16:\"mill_master-view\";s:1:\"c\";s:11:\"Mill Master\";s:1:\"d\";s:2:\"14\";s:1:\"e\";s:3:\"web\";}i:77;a:5:{s:1:\"a\";s:2:\"78\";s:1:\"b\";s:18:\"mill_master-create\";s:1:\"c\";s:11:\"Mill Master\";s:1:\"d\";s:2:\"14\";s:1:\"e\";s:3:\"web\";}i:78;a:5:{s:1:\"a\";s:2:\"79\";s:1:\"b\";s:18:\"mill_master-update\";s:1:\"c\";s:11:\"Mill Master\";s:1:\"d\";s:2:\"14\";s:1:\"e\";s:3:\"web\";}i:79;a:5:{s:1:\"a\";s:2:\"80\";s:1:\"b\";s:18:\"mill_master-delete\";s:1:\"c\";s:11:\"Mill Master\";s:1:\"d\";s:2:\"14\";s:1:\"e\";s:3:\"web\";}i:80;a:5:{s:1:\"a\";s:2:\"81\";s:1:\"b\";s:12:\"country-view\";s:1:\"c\";s:7:\"Country\";s:1:\"d\";s:2:\"10\";s:1:\"e\";s:3:\"web\";}i:81;a:5:{s:1:\"a\";s:2:\"82\";s:1:\"b\";s:14:\"country-create\";s:1:\"c\";s:7:\"Country\";s:1:\"d\";s:2:\"10\";s:1:\"e\";s:3:\"web\";}i:82;a:5:{s:1:\"a\";s:2:\"83\";s:1:\"b\";s:14:\"country-update\";s:1:\"c\";s:7:\"Country\";s:1:\"d\";s:2:\"10\";s:1:\"e\";s:3:\"web\";}i:83;a:5:{s:1:\"a\";s:2:\"84\";s:1:\"b\";s:14:\"country-delete\";s:1:\"c\";s:7:\"Country\";s:1:\"d\";s:2:\"10\";s:1:\"e\";s:3:\"web\";}i:84;a:5:{s:1:\"a\";s:2:\"85\";s:1:\"b\";s:18:\"payment_types-view\";s:1:\"c\";s:13:\"Payment types\";s:1:\"d\";s:1:\"1\";s:1:\"e\";s:3:\"web\";}i:85;a:5:{s:1:\"a\";s:2:\"86\";s:1:\"b\";s:20:\"payment_types-create\";s:1:\"c\";s:13:\"Payment types\";s:1:\"d\";s:1:\"1\";s:1:\"e\";s:3:\"web\";}i:86;a:5:{s:1:\"a\";s:2:\"87\";s:1:\"b\";s:20:\"payment_types-update\";s:1:\"c\";s:13:\"Payment types\";s:1:\"d\";s:1:\"1\";s:1:\"e\";s:3:\"web\";}i:87;a:5:{s:1:\"a\";s:2:\"88\";s:1:\"b\";s:20:\"payment_types-delete\";s:1:\"c\";s:13:\"Payment types\";s:1:\"d\";s:1:\"1\";s:1:\"e\";s:3:\"web\";}i:88;a:5:{s:1:\"a\";s:2:\"89\";s:1:\"b\";s:18:\"payment_terms-view\";s:1:\"c\";s:13:\"Payment Terms\";s:1:\"d\";s:1:\"1\";s:1:\"e\";s:3:\"web\";}i:89;a:5:{s:1:\"a\";s:2:\"90\";s:1:\"b\";s:20:\"payment_terms-create\";s:1:\"c\";s:13:\"Payment Terms\";s:1:\"d\";s:1:\"1\";s:1:\"e\";s:3:\"web\";}i:90;a:5:{s:1:\"a\";s:2:\"91\";s:1:\"b\";s:20:\"payment_terms-update\";s:1:\"c\";s:13:\"Payment Terms\";s:1:\"d\";s:1:\"1\";s:1:\"e\";s:3:\"web\";}i:91;a:5:{s:1:\"a\";s:2:\"92\";s:1:\"b\";s:20:\"payment_terms-delete\";s:1:\"c\";s:13:\"Payment Terms\";s:1:\"d\";s:1:\"1\";s:1:\"e\";s:3:\"web\";}i:92;a:5:{s:1:\"a\";s:2:\"93\";s:1:\"b\";s:24:\"gst_registered_type-view\";s:1:\"c\";s:19:\"GST Registered Type\";s:1:\"d\";s:1:\"1\";s:1:\"e\";s:3:\"web\";}i:93;a:5:{s:1:\"a\";s:2:\"94\";s:1:\"b\";s:26:\"gst_registered_type-create\";s:1:\"c\";s:19:\"GST Registered Type\";s:1:\"d\";s:1:\"1\";s:1:\"e\";s:3:\"web\";}i:94;a:5:{s:1:\"a\";s:2:\"95\";s:1:\"b\";s:26:\"gst_registered_type-update\";s:1:\"c\";s:19:\"GST Registered Type\";s:1:\"d\";s:1:\"1\";s:1:\"e\";s:3:\"web\";}i:95;a:5:{s:1:\"a\";s:2:\"96\";s:1:\"b\";s:26:\"gst_registered_type-delete\";s:1:\"c\";s:19:\"GST Registered Type\";s:1:\"d\";s:1:\"1\";s:1:\"e\";s:3:\"web\";}i:96;a:5:{s:1:\"a\";s:2:\"97\";s:1:\"b\";s:18:\"account_group-view\";s:1:\"c\";s:13:\"Account Group\";s:1:\"d\";s:1:\"1\";s:1:\"e\";s:3:\"web\";}i:97;a:5:{s:1:\"a\";s:2:\"98\";s:1:\"b\";s:20:\"account_group-create\";s:1:\"c\";s:13:\"Account Group\";s:1:\"d\";s:1:\"1\";s:1:\"e\";s:3:\"web\";}i:98;a:5:{s:1:\"a\";s:2:\"99\";s:1:\"b\";s:20:\"account_group-update\";s:1:\"c\";s:13:\"Account Group\";s:1:\"d\";s:1:\"1\";s:1:\"e\";s:3:\"web\";}i:99;a:5:{s:1:\"a\";s:3:\"100\";s:1:\"b\";s:20:\"account_group-delete\";s:1:\"c\";s:13:\"Account Group\";s:1:\"d\";s:1:\"1\";s:1:\"e\";s:3:\"web\";}i:100;a:5:{s:1:\"a\";s:3:\"101\";s:1:\"b\";s:10:\"buyer-view\";s:1:\"c\";s:5:\"Buyer\";s:1:\"d\";s:1:\"2\";s:1:\"e\";s:3:\"web\";}i:101;a:5:{s:1:\"a\";s:3:\"102\";s:1:\"b\";s:12:\"buyer-create\";s:1:\"c\";s:5:\"Buyer\";s:1:\"d\";s:1:\"2\";s:1:\"e\";s:3:\"web\";}i:102;a:5:{s:1:\"a\";s:3:\"103\";s:1:\"b\";s:12:\"buyer-update\";s:1:\"c\";s:5:\"Buyer\";s:1:\"d\";s:1:\"2\";s:1:\"e\";s:3:\"web\";}i:103;a:5:{s:1:\"a\";s:3:\"104\";s:1:\"b\";s:12:\"buyer-delete\";s:1:\"c\";s:5:\"Buyer\";s:1:\"d\";s:1:\"2\";s:1:\"e\";s:3:\"web\";}i:104;a:5:{s:1:\"a\";s:3:\"105\";s:1:\"b\";s:16:\"sales_order-view\";s:1:\"c\";s:11:\"Sales Order\";s:1:\"d\";s:1:\"2\";s:1:\"e\";s:3:\"web\";}i:105;a:5:{s:1:\"a\";s:3:\"106\";s:1:\"b\";s:18:\"sales_order-create\";s:1:\"c\";s:11:\"Sales Order\";s:1:\"d\";s:1:\"2\";s:1:\"e\";s:3:\"web\";}i:106;a:5:{s:1:\"a\";s:3:\"107\";s:1:\"b\";s:18:\"sales_order-update\";s:1:\"c\";s:11:\"Sales Order\";s:1:\"d\";s:1:\"2\";s:1:\"e\";s:3:\"web\";}i:107;a:5:{s:1:\"a\";s:3:\"108\";s:1:\"b\";s:18:\"sales_order-delete\";s:1:\"c\";s:11:\"Sales Order\";s:1:\"d\";s:1:\"2\";s:1:\"e\";s:3:\"web\";}i:108;a:5:{s:1:\"a\";s:3:\"109\";s:1:\"b\";s:17:\"packing_list-view\";s:1:\"c\";s:12:\"Packing List\";s:1:\"d\";s:1:\"2\";s:1:\"e\";s:3:\"web\";}i:109;a:5:{s:1:\"a\";s:3:\"110\";s:1:\"b\";s:19:\"packing_list-create\";s:1:\"c\";s:12:\"Packing List\";s:1:\"d\";s:1:\"2\";s:1:\"e\";s:3:\"web\";}i:110;a:5:{s:1:\"a\";s:3:\"111\";s:1:\"b\";s:19:\"packing_list-update\";s:1:\"c\";s:12:\"Packing List\";s:1:\"d\";s:1:\"2\";s:1:\"e\";s:3:\"web\";}i:111;a:5:{s:1:\"a\";s:3:\"112\";s:1:\"b\";s:19:\"packing_list-delete\";s:1:\"c\";s:12:\"Packing List\";s:1:\"d\";s:1:\"2\";s:1:\"e\";s:3:\"web\";}i:112;a:5:{s:1:\"a\";s:3:\"113\";s:1:\"b\";s:24:\"export_invoice_list-view\";s:1:\"c\";s:19:\"Export Invoice List\";s:1:\"d\";s:1:\"2\";s:1:\"e\";s:3:\"web\";}i:113;a:5:{s:1:\"a\";s:3:\"114\";s:1:\"b\";s:26:\"export_invoice_list-create\";s:1:\"c\";s:19:\"Export Invoice List\";s:1:\"d\";s:1:\"2\";s:1:\"e\";s:3:\"web\";}i:114;a:5:{s:1:\"a\";s:3:\"115\";s:1:\"b\";s:26:\"export_invoice_list-update\";s:1:\"c\";s:19:\"Export Invoice List\";s:1:\"d\";s:1:\"2\";s:1:\"e\";s:3:\"web\";}i:115;a:5:{s:1:\"a\";s:3:\"116\";s:1:\"b\";s:26:\"export_invoice_list-delete\";s:1:\"c\";s:19:\"Export Invoice List\";s:1:\"d\";s:1:\"2\";s:1:\"e\";s:3:\"web\";}i:116;a:5:{s:1:\"a\";s:3:\"117\";s:1:\"b\";s:12:\"licence-view\";s:1:\"c\";s:7:\"Licence\";s:1:\"d\";s:1:\"2\";s:1:\"e\";s:3:\"web\";}i:117;a:5:{s:1:\"a\";s:3:\"118\";s:1:\"b\";s:14:\"licence-create\";s:1:\"c\";s:7:\"Licence\";s:1:\"d\";s:1:\"2\";s:1:\"e\";s:3:\"web\";}i:118;a:5:{s:1:\"a\";s:3:\"119\";s:1:\"b\";s:14:\"licence-update\";s:1:\"c\";s:7:\"Licence\";s:1:\"d\";s:1:\"2\";s:1:\"e\";s:3:\"web\";}i:119;a:5:{s:1:\"a\";s:3:\"120\";s:1:\"b\";s:14:\"licence-delete\";s:1:\"c\";s:7:\"Licence\";s:1:\"d\";s:1:\"2\";s:1:\"e\";s:3:\"web\";}i:120;a:5:{s:1:\"a\";s:3:\"121\";s:1:\"b\";s:20:\"pre_carriage_by-view\";s:1:\"c\";s:15:\"Pre-Carriage By\";s:1:\"d\";s:1:\"2\";s:1:\"e\";s:3:\"web\";}i:121;a:5:{s:1:\"a\";s:3:\"122\";s:1:\"b\";s:22:\"pre_carriage_by-create\";s:1:\"c\";s:15:\"Pre-Carriage By\";s:1:\"d\";s:1:\"2\";s:1:\"e\";s:3:\"web\";}i:122;a:5:{s:1:\"a\";s:3:\"123\";s:1:\"b\";s:22:\"pre_carriage_by-update\";s:1:\"c\";s:15:\"Pre-Carriage By\";s:1:\"d\";s:1:\"2\";s:1:\"e\";s:3:\"web\";}i:123;a:5:{s:1:\"a\";s:3:\"124\";s:1:\"b\";s:22:\"pre_carriage_by-delete\";s:1:\"c\";s:15:\"Pre-Carriage By\";s:1:\"d\";s:1:\"2\";s:1:\"e\";s:3:\"web\";}i:124;a:5:{s:1:\"a\";s:3:\"125\";s:1:\"b\";s:9:\"port-view\";s:1:\"c\";s:4:\"Port\";s:1:\"d\";s:1:\"2\";s:1:\"e\";s:3:\"web\";}i:125;a:5:{s:1:\"a\";s:3:\"126\";s:1:\"b\";s:11:\"port-create\";s:1:\"c\";s:4:\"Port\";s:1:\"d\";s:1:\"2\";s:1:\"e\";s:3:\"web\";}i:126;a:5:{s:1:\"a\";s:3:\"127\";s:1:\"b\";s:11:\"port-update\";s:1:\"c\";s:4:\"Port\";s:1:\"d\";s:1:\"2\";s:1:\"e\";s:3:\"web\";}i:127;a:5:{s:1:\"a\";s:3:\"128\";s:1:\"b\";s:11:\"port-delete\";s:1:\"c\";s:4:\"Port\";s:1:\"d\";s:1:\"2\";s:1:\"e\";s:3:\"web\";}i:128;a:5:{s:1:\"a\";s:3:\"129\";s:1:\"b\";s:24:\"port_of_destination-view\";s:1:\"c\";s:19:\"Port Of Destination\";s:1:\"d\";s:1:\"2\";s:1:\"e\";s:3:\"web\";}i:129;a:5:{s:1:\"a\";s:3:\"130\";s:1:\"b\";s:26:\"port_of_destination-create\";s:1:\"c\";s:19:\"Port Of Destination\";s:1:\"d\";s:1:\"2\";s:1:\"e\";s:3:\"web\";}i:130;a:5:{s:1:\"a\";s:3:\"131\";s:1:\"b\";s:26:\"port_of_destination-update\";s:1:\"c\";s:19:\"Port Of Destination\";s:1:\"d\";s:1:\"2\";s:1:\"e\";s:3:\"web\";}i:131;a:5:{s:1:\"a\";s:3:\"132\";s:1:\"b\";s:26:\"port_of_destination-delete\";s:1:\"c\";s:19:\"Port Of Destination\";s:1:\"d\";s:1:\"2\";s:1:\"e\";s:3:\"web\";}i:132;a:5:{s:1:\"a\";s:3:\"133\";s:1:\"b\";s:9:\"bank-view\";s:1:\"c\";s:4:\"Bank\";s:1:\"d\";s:1:\"2\";s:1:\"e\";s:3:\"web\";}i:133;a:5:{s:1:\"a\";s:3:\"134\";s:1:\"b\";s:11:\"bank-create\";s:1:\"c\";s:4:\"Bank\";s:1:\"d\";s:1:\"2\";s:1:\"e\";s:3:\"web\";}i:134;a:5:{s:1:\"a\";s:3:\"135\";s:1:\"b\";s:11:\"bank-update\";s:1:\"c\";s:4:\"Bank\";s:1:\"d\";s:1:\"2\";s:1:\"e\";s:3:\"web\";}i:135;a:5:{s:1:\"a\";s:3:\"136\";s:1:\"b\";s:11:\"bank-delete\";s:1:\"c\";s:4:\"Bank\";s:1:\"d\";s:1:\"2\";s:1:\"e\";s:3:\"web\";}i:136;a:5:{s:1:\"a\";s:3:\"137\";s:1:\"b\";s:19:\"container_size-view\";s:1:\"c\";s:14:\"Container Size\";s:1:\"d\";s:1:\"2\";s:1:\"e\";s:3:\"web\";}i:137;a:5:{s:1:\"a\";s:3:\"138\";s:1:\"b\";s:21:\"container_size-create\";s:1:\"c\";s:14:\"Container Size\";s:1:\"d\";s:1:\"2\";s:1:\"e\";s:3:\"web\";}i:138;a:5:{s:1:\"a\";s:3:\"139\";s:1:\"b\";s:21:\"container_size-update\";s:1:\"c\";s:14:\"Container Size\";s:1:\"d\";s:1:\"2\";s:1:\"e\";s:3:\"web\";}i:139;a:5:{s:1:\"a\";s:3:\"140\";s:1:\"b\";s:21:\"container_size-delete\";s:1:\"c\";s:14:\"Container Size\";s:1:\"d\";s:1:\"2\";s:1:\"e\";s:3:\"web\";}i:140;a:5:{s:1:\"a\";s:3:\"141\";s:1:\"b\";s:24:\"sales_co_ordinators-view\";s:1:\"c\";s:19:\"Sales Co Ordinators\";s:1:\"d\";s:1:\"2\";s:1:\"e\";s:3:\"web\";}i:141;a:5:{s:1:\"a\";s:3:\"142\";s:1:\"b\";s:26:\"sales_co_ordinators-create\";s:1:\"c\";s:19:\"Sales Co Ordinators\";s:1:\"d\";s:1:\"2\";s:1:\"e\";s:3:\"web\";}i:142;a:5:{s:1:\"a\";s:3:\"143\";s:1:\"b\";s:26:\"sales_co_ordinators-update\";s:1:\"c\";s:19:\"Sales Co Ordinators\";s:1:\"d\";s:1:\"2\";s:1:\"e\";s:3:\"web\";}i:143;a:5:{s:1:\"a\";s:3:\"144\";s:1:\"b\";s:26:\"sales_co_ordinators-delete\";s:1:\"c\";s:19:\"Sales Co Ordinators\";s:1:\"d\";s:1:\"2\";s:1:\"e\";s:3:\"web\";}i:144;a:5:{s:1:\"a\";s:3:\"145\";s:1:\"b\";s:19:\"shipping_terms-view\";s:1:\"c\";s:14:\"Shipping Terms\";s:1:\"d\";s:1:\"2\";s:1:\"e\";s:3:\"web\";}i:145;a:5:{s:1:\"a\";s:3:\"146\";s:1:\"b\";s:21:\"shipping_terms-create\";s:1:\"c\";s:14:\"Shipping Terms\";s:1:\"d\";s:1:\"2\";s:1:\"e\";s:3:\"web\";}i:146;a:5:{s:1:\"a\";s:3:\"147\";s:1:\"b\";s:21:\"shipping_terms-update\";s:1:\"c\";s:14:\"Shipping Terms\";s:1:\"d\";s:1:\"2\";s:1:\"e\";s:3:\"web\";}i:147;a:5:{s:1:\"a\";s:3:\"148\";s:1:\"b\";s:21:\"shipping_terms-delete\";s:1:\"c\";s:14:\"Shipping Terms\";s:1:\"d\";s:1:\"2\";s:1:\"e\";s:3:\"web\";}i:148;a:5:{s:1:\"a\";s:3:\"149\";s:1:\"b\";s:13:\"so_types-view\";s:1:\"c\";s:8:\"So Types\";s:1:\"d\";s:1:\"2\";s:1:\"e\";s:3:\"web\";}i:149;a:5:{s:1:\"a\";s:3:\"150\";s:1:\"b\";s:15:\"so_types-create\";s:1:\"c\";s:8:\"So Types\";s:1:\"d\";s:1:\"2\";s:1:\"e\";s:3:\"web\";}i:150;a:5:{s:1:\"a\";s:3:\"151\";s:1:\"b\";s:15:\"so_types-update\";s:1:\"c\";s:8:\"So Types\";s:1:\"d\";s:1:\"2\";s:1:\"e\";s:3:\"web\";}i:151;a:5:{s:1:\"a\";s:3:\"152\";s:1:\"b\";s:15:\"so_types-delete\";s:1:\"c\";s:8:\"So Types\";s:1:\"d\";s:1:\"2\";s:1:\"e\";s:3:\"web\";}i:152;a:5:{s:1:\"a\";s:3:\"153\";s:1:\"b\";s:23:\"terms_&_conditions-view\";s:1:\"c\";s:18:\"Terms & Conditions\";s:1:\"d\";s:1:\"2\";s:1:\"e\";s:3:\"web\";}i:153;a:5:{s:1:\"a\";s:3:\"154\";s:1:\"b\";s:25:\"terms_&_conditions-create\";s:1:\"c\";s:18:\"Terms & Conditions\";s:1:\"d\";s:1:\"2\";s:1:\"e\";s:3:\"web\";}i:154;a:5:{s:1:\"a\";s:3:\"155\";s:1:\"b\";s:25:\"terms_&_conditions-update\";s:1:\"c\";s:18:\"Terms & Conditions\";s:1:\"d\";s:1:\"2\";s:1:\"e\";s:3:\"web\";}i:155;a:5:{s:1:\"a\";s:3:\"156\";s:1:\"b\";s:25:\"terms_&_conditions-delete\";s:1:\"c\";s:18:\"Terms & Conditions\";s:1:\"d\";s:1:\"2\";s:1:\"e\";s:3:\"web\";}i:156;a:5:{s:1:\"a\";s:3:\"157\";s:1:\"b\";s:10:\"units-view\";s:1:\"c\";s:5:\"Units\";s:1:\"d\";s:1:\"2\";s:1:\"e\";s:3:\"web\";}i:157;a:5:{s:1:\"a\";s:3:\"158\";s:1:\"b\";s:12:\"units-create\";s:1:\"c\";s:5:\"Units\";s:1:\"d\";s:1:\"2\";s:1:\"e\";s:3:\"web\";}i:158;a:5:{s:1:\"a\";s:3:\"159\";s:1:\"b\";s:12:\"units-update\";s:1:\"c\";s:5:\"Units\";s:1:\"d\";s:1:\"2\";s:1:\"e\";s:3:\"web\";}i:159;a:5:{s:1:\"a\";s:3:\"160\";s:1:\"b\";s:12:\"units-delete\";s:1:\"c\";s:5:\"Units\";s:1:\"d\";s:1:\"2\";s:1:\"e\";s:3:\"web\";}i:160;a:5:{s:1:\"a\";s:3:\"161\";s:1:\"b\";s:29:\"yarn_certification_types-view\";s:1:\"c\";s:24:\"Yarn Certification Types\";s:1:\"d\";s:1:\"2\";s:1:\"e\";s:3:\"web\";}i:161;a:5:{s:1:\"a\";s:3:\"162\";s:1:\"b\";s:31:\"yarn_certification_types-create\";s:1:\"c\";s:24:\"Yarn Certification Types\";s:1:\"d\";s:1:\"2\";s:1:\"e\";s:3:\"web\";}i:162;a:5:{s:1:\"a\";s:3:\"163\";s:1:\"b\";s:31:\"yarn_certification_types-update\";s:1:\"c\";s:24:\"Yarn Certification Types\";s:1:\"d\";s:1:\"2\";s:1:\"e\";s:3:\"web\";}i:163;a:5:{s:1:\"a\";s:3:\"164\";s:1:\"b\";s:31:\"yarn_certification_types-delete\";s:1:\"c\";s:24:\"Yarn Certification Types\";s:1:\"d\";s:1:\"2\";s:1:\"e\";s:3:\"web\";}i:164;a:5:{s:1:\"a\";s:3:\"165\";s:1:\"b\";s:14:\"export_so-view\";s:1:\"c\";s:9:\"Export SO\";s:1:\"d\";s:1:\"3\";s:1:\"e\";s:3:\"web\";}i:165;a:5:{s:1:\"a\";s:3:\"166\";s:1:\"b\";s:16:\"export_so-create\";s:1:\"c\";s:9:\"Export SO\";s:1:\"d\";s:1:\"3\";s:1:\"e\";s:3:\"web\";}i:166;a:5:{s:1:\"a\";s:3:\"167\";s:1:\"b\";s:16:\"export_so-update\";s:1:\"c\";s:9:\"Export SO\";s:1:\"d\";s:1:\"3\";s:1:\"e\";s:3:\"web\";}i:167;a:5:{s:1:\"a\";s:3:\"168\";s:1:\"b\";s:16:\"export_so-delete\";s:1:\"c\";s:9:\"Export SO\";s:1:\"d\";s:1:\"3\";s:1:\"e\";s:3:\"web\";}i:168;a:5:{s:1:\"a\";s:3:\"169\";s:1:\"b\";s:28:\"po_fabric_processing_jw-view\";s:1:\"c\";s:23:\"PO-Fabric Processing JW\";s:1:\"d\";s:1:\"3\";s:1:\"e\";s:3:\"web\";}i:169;a:5:{s:1:\"a\";s:3:\"170\";s:1:\"b\";s:30:\"po_fabric_processing_jw-create\";s:1:\"c\";s:23:\"PO-Fabric Processing JW\";s:1:\"d\";s:1:\"3\";s:1:\"e\";s:3:\"web\";}i:170;a:5:{s:1:\"a\";s:3:\"171\";s:1:\"b\";s:30:\"po_fabric_processing_jw-update\";s:1:\"c\";s:23:\"PO-Fabric Processing JW\";s:1:\"d\";s:1:\"3\";s:1:\"e\";s:3:\"web\";}i:171;a:5:{s:1:\"a\";s:3:\"172\";s:1:\"b\";s:30:\"po_fabric_processing_jw-delete\";s:1:\"c\";s:23:\"PO-Fabric Processing JW\";s:1:\"d\";s:1:\"3\";s:1:\"e\";s:3:\"web\";}i:172;a:5:{s:1:\"a\";s:3:\"173\";s:1:\"b\";s:12:\"po_yarn-view\";s:1:\"c\";s:7:\"PO Yarn\";s:1:\"d\";s:1:\"3\";s:1:\"e\";s:3:\"web\";}i:173;a:5:{s:1:\"a\";s:3:\"174\";s:1:\"b\";s:14:\"po_yarn-create\";s:1:\"c\";s:7:\"PO Yarn\";s:1:\"d\";s:1:\"3\";s:1:\"e\";s:3:\"web\";}i:174;a:5:{s:1:\"a\";s:3:\"175\";s:1:\"b\";s:14:\"po_yarn-update\";s:1:\"c\";s:7:\"PO Yarn\";s:1:\"d\";s:1:\"3\";s:1:\"e\";s:3:\"web\";}i:175;a:5:{s:1:\"a\";s:3:\"176\";s:1:\"b\";s:14:\"po_yarn-delete\";s:1:\"c\";s:7:\"PO Yarn\";s:1:\"d\";s:1:\"3\";s:1:\"e\";s:3:\"web\";}i:176;a:5:{s:1:\"a\";s:3:\"177\";s:1:\"b\";s:12:\"invoice-view\";s:1:\"c\";s:7:\"Invoice\";s:1:\"d\";s:1:\"3\";s:1:\"e\";s:3:\"web\";}i:177;a:5:{s:1:\"a\";s:3:\"178\";s:1:\"b\";s:14:\"invoice-create\";s:1:\"c\";s:7:\"Invoice\";s:1:\"d\";s:1:\"3\";s:1:\"e\";s:3:\"web\";}i:178;a:5:{s:1:\"a\";s:3:\"179\";s:1:\"b\";s:14:\"invoice-update\";s:1:\"c\";s:7:\"Invoice\";s:1:\"d\";s:1:\"3\";s:1:\"e\";s:3:\"web\";}i:179;a:5:{s:1:\"a\";s:3:\"180\";s:1:\"b\";s:14:\"invoice-delete\";s:1:\"c\";s:7:\"Invoice\";s:1:\"d\";s:1:\"3\";s:1:\"e\";s:3:\"web\";}i:180;a:5:{s:1:\"a\";s:3:\"181\";s:1:\"b\";s:10:\"count-view\";s:1:\"c\";s:5:\"Count\";s:1:\"d\";s:2:\"14\";s:1:\"e\";s:3:\"web\";}i:181;a:5:{s:1:\"a\";s:3:\"182\";s:1:\"b\";s:12:\"count-create\";s:1:\"c\";s:5:\"Count\";s:1:\"d\";s:2:\"14\";s:1:\"e\";s:3:\"web\";}i:182;a:5:{s:1:\"a\";s:3:\"183\";s:1:\"b\";s:12:\"count-update\";s:1:\"c\";s:5:\"Count\";s:1:\"d\";s:2:\"14\";s:1:\"e\";s:3:\"web\";}i:183;a:5:{s:1:\"a\";s:3:\"184\";s:1:\"b\";s:12:\"count-delete\";s:1:\"c\";s:5:\"Count\";s:1:\"d\";s:2:\"14\";s:1:\"e\";s:3:\"web\";}i:184;a:5:{s:1:\"a\";s:3:\"185\";s:1:\"b\";s:8:\"ply-view\";s:1:\"c\";s:3:\"Ply\";s:1:\"d\";s:2:\"14\";s:1:\"e\";s:3:\"web\";}i:185;a:5:{s:1:\"a\";s:3:\"186\";s:1:\"b\";s:10:\"ply-create\";s:1:\"c\";s:3:\"Ply\";s:1:\"d\";s:2:\"14\";s:1:\"e\";s:3:\"web\";}i:186;a:5:{s:1:\"a\";s:3:\"187\";s:1:\"b\";s:10:\"ply-update\";s:1:\"c\";s:3:\"Ply\";s:1:\"d\";s:2:\"14\";s:1:\"e\";s:3:\"web\";}i:187;a:5:{s:1:\"a\";s:3:\"188\";s:1:\"b\";s:10:\"ply-delete\";s:1:\"c\";s:3:\"Ply\";s:1:\"d\";s:2:\"14\";s:1:\"e\";s:3:\"web\";}i:188;a:5:{s:1:\"a\";s:3:\"189\";s:1:\"b\";s:8:\"uom-view\";s:1:\"c\";s:3:\"Uom\";s:1:\"d\";s:2:\"14\";s:1:\"e\";s:3:\"web\";}i:189;a:5:{s:1:\"a\";s:3:\"190\";s:1:\"b\";s:10:\"uom-create\";s:1:\"c\";s:3:\"Uom\";s:1:\"d\";s:2:\"14\";s:1:\"e\";s:3:\"web\";}i:190;a:5:{s:1:\"a\";s:3:\"191\";s:1:\"b\";s:10:\"uom-update\";s:1:\"c\";s:3:\"Uom\";s:1:\"d\";s:2:\"14\";s:1:\"e\";s:3:\"web\";}i:191;a:5:{s:1:\"a\";s:3:\"192\";s:1:\"b\";s:10:\"uom-delete\";s:1:\"c\";s:3:\"Uom\";s:1:\"d\";s:2:\"14\";s:1:\"e\";s:3:\"web\";}i:192;a:5:{s:1:\"a\";s:3:\"193\";s:1:\"b\";s:17:\"yarn_variety-view\";s:1:\"c\";s:12:\"Yarn Variety\";s:1:\"d\";s:2:\"14\";s:1:\"e\";s:3:\"web\";}i:193;a:5:{s:1:\"a\";s:3:\"194\";s:1:\"b\";s:19:\"yarn_variety-create\";s:1:\"c\";s:12:\"Yarn Variety\";s:1:\"d\";s:2:\"14\";s:1:\"e\";s:3:\"web\";}i:194;a:5:{s:1:\"a\";s:3:\"195\";s:1:\"b\";s:19:\"yarn_variety-update\";s:1:\"c\";s:12:\"Yarn Variety\";s:1:\"d\";s:2:\"14\";s:1:\"e\";s:3:\"web\";}i:195;a:5:{s:1:\"a\";s:3:\"196\";s:1:\"b\";s:19:\"yarn_variety-delete\";s:1:\"c\";s:12:\"Yarn Variety\";s:1:\"d\";s:2:\"14\";s:1:\"e\";s:3:\"web\";}i:196;a:5:{s:1:\"a\";s:3:\"197\";s:1:\"b\";s:14:\"yarn_type-view\";s:1:\"c\";s:9:\"Yarn Type\";s:1:\"d\";s:2:\"14\";s:1:\"e\";s:3:\"web\";}i:197;a:5:{s:1:\"a\";s:3:\"198\";s:1:\"b\";s:16:\"yarn_type-create\";s:1:\"c\";s:9:\"Yarn Type\";s:1:\"d\";s:2:\"14\";s:1:\"e\";s:3:\"web\";}i:198;a:5:{s:1:\"a\";s:3:\"199\";s:1:\"b\";s:16:\"yarn_type-update\";s:1:\"c\";s:9:\"Yarn Type\";s:1:\"d\";s:2:\"14\";s:1:\"e\";s:3:\"web\";}i:199;a:5:{s:1:\"a\";s:3:\"200\";s:1:\"b\";s:16:\"yarn_type-delete\";s:1:\"c\";s:9:\"Yarn Type\";s:1:\"d\";s:2:\"14\";s:1:\"e\";s:3:\"web\";}i:200;a:5:{s:1:\"a\";s:3:\"201\";s:1:\"b\";s:14:\"filaments-view\";s:1:\"c\";s:9:\"Filaments\";s:1:\"d\";s:2:\"14\";s:1:\"e\";s:3:\"web\";}i:201;a:5:{s:1:\"a\";s:3:\"202\";s:1:\"b\";s:16:\"filaments-create\";s:1:\"c\";s:9:\"Filaments\";s:1:\"d\";s:2:\"14\";s:1:\"e\";s:3:\"web\";}i:202;a:5:{s:1:\"a\";s:3:\"203\";s:1:\"b\";s:16:\"filaments-update\";s:1:\"c\";s:9:\"Filaments\";s:1:\"d\";s:2:\"14\";s:1:\"e\";s:3:\"web\";}i:203;a:5:{s:1:\"a\";s:3:\"204\";s:1:\"b\";s:16:\"filaments-delete\";s:1:\"c\";s:9:\"Filaments\";s:1:\"d\";s:2:\"14\";s:1:\"e\";s:3:\"web\";}i:204;a:5:{s:1:\"a\";s:3:\"205\";s:1:\"b\";s:8:\"tpm-view\";s:1:\"c\";s:3:\"TPM\";s:1:\"d\";s:2:\"14\";s:1:\"e\";s:3:\"web\";}i:205;a:5:{s:1:\"a\";s:3:\"206\";s:1:\"b\";s:10:\"tpm-create\";s:1:\"c\";s:3:\"TPM\";s:1:\"d\";s:2:\"14\";s:1:\"e\";s:3:\"web\";}i:206;a:5:{s:1:\"a\";s:3:\"207\";s:1:\"b\";s:10:\"tpm-update\";s:1:\"c\";s:3:\"TPM\";s:1:\"d\";s:2:\"14\";s:1:\"e\";s:3:\"web\";}i:207;a:5:{s:1:\"a\";s:3:\"208\";s:1:\"b\";s:10:\"tpm-delete\";s:1:\"c\";s:3:\"TPM\";s:1:\"d\";s:2:\"14\";s:1:\"e\";s:3:\"web\";}i:208;a:5:{s:1:\"a\";s:3:\"209\";s:1:\"b\";s:11:\"blends-view\";s:1:\"c\";s:6:\"Blends\";s:1:\"d\";s:2:\"14\";s:1:\"e\";s:3:\"web\";}i:209;a:5:{s:1:\"a\";s:3:\"210\";s:1:\"b\";s:13:\"blends-create\";s:1:\"c\";s:6:\"Blends\";s:1:\"d\";s:2:\"14\";s:1:\"e\";s:3:\"web\";}i:210;a:5:{s:1:\"a\";s:3:\"211\";s:1:\"b\";s:13:\"blends-update\";s:1:\"c\";s:6:\"Blends\";s:1:\"d\";s:2:\"14\";s:1:\"e\";s:3:\"web\";}i:211;a:5:{s:1:\"a\";s:3:\"212\";s:1:\"b\";s:13:\"blends-delete\";s:1:\"c\";s:6:\"Blends\";s:1:\"d\";s:2:\"14\";s:1:\"e\";s:3:\"web\";}i:212;a:5:{s:1:\"a\";s:3:\"213\";s:1:\"b\";s:16:\"yarn_master-view\";s:1:\"c\";s:11:\"Yarn Master\";s:1:\"d\";s:2:\"14\";s:1:\"e\";s:3:\"web\";}i:213;a:5:{s:1:\"a\";s:3:\"214\";s:1:\"b\";s:18:\"yarn_master-create\";s:1:\"c\";s:11:\"Yarn Master\";s:1:\"d\";s:2:\"14\";s:1:\"e\";s:3:\"web\";}i:214;a:5:{s:1:\"a\";s:3:\"215\";s:1:\"b\";s:18:\"yarn_master-update\";s:1:\"c\";s:11:\"Yarn Master\";s:1:\"d\";s:2:\"14\";s:1:\"e\";s:3:\"web\";}i:215;a:5:{s:1:\"a\";s:3:\"216\";s:1:\"b\";s:18:\"yarn_master-delete\";s:1:\"c\";s:11:\"Yarn Master\";s:1:\"d\";s:2:\"14\";s:1:\"e\";s:3:\"web\";}i:216;a:5:{s:1:\"a\";s:3:\"217\";s:1:\"b\";s:16:\"yarn_inward-view\";s:1:\"c\";s:11:\"Yarn Inward\";s:1:\"d\";s:1:\"5\";s:1:\"e\";s:3:\"web\";}i:217;a:5:{s:1:\"a\";s:3:\"218\";s:1:\"b\";s:18:\"yarn_inward-create\";s:1:\"c\";s:11:\"Yarn Inward\";s:1:\"d\";s:1:\"5\";s:1:\"e\";s:3:\"web\";}i:218;a:5:{s:1:\"a\";s:3:\"219\";s:1:\"b\";s:18:\"yarn_inward-update\";s:1:\"c\";s:11:\"Yarn Inward\";s:1:\"d\";s:1:\"5\";s:1:\"e\";s:3:\"web\";}i:219;a:5:{s:1:\"a\";s:3:\"220\";s:1:\"b\";s:18:\"yarn_inward-delete\";s:1:\"c\";s:11:\"Yarn Inward\";s:1:\"d\";s:1:\"5\";s:1:\"e\";s:3:\"web\";}i:220;a:5:{s:1:\"a\";s:3:\"221\";s:1:\"b\";s:12:\"yarn_po-view\";s:1:\"c\";s:7:\"Yarn PO\";s:1:\"d\";s:1:\"6\";s:1:\"e\";s:3:\"web\";}i:221;a:5:{s:1:\"a\";s:3:\"222\";s:1:\"b\";s:14:\"yarn_po-create\";s:1:\"c\";s:7:\"Yarn PO\";s:1:\"d\";s:1:\"6\";s:1:\"e\";s:3:\"web\";}i:222;a:5:{s:1:\"a\";s:3:\"223\";s:1:\"b\";s:14:\"yarn_po-update\";s:1:\"c\";s:7:\"Yarn PO\";s:1:\"d\";s:1:\"6\";s:1:\"e\";s:3:\"web\";}i:223;a:5:{s:1:\"a\";s:3:\"224\";s:1:\"b\";s:14:\"yarn_po-delete\";s:1:\"c\";s:7:\"Yarn PO\";s:1:\"d\";s:1:\"6\";s:1:\"e\";s:3:\"web\";}i:224;a:5:{s:1:\"a\";s:3:\"225\";s:1:\"b\";s:13:\"csp_list-view\";s:1:\"c\";s:8:\"CSP List\";s:1:\"d\";s:1:\"6\";s:1:\"e\";s:3:\"web\";}i:225;a:5:{s:1:\"a\";s:3:\"226\";s:1:\"b\";s:15:\"csp_list-create\";s:1:\"c\";s:8:\"CSP List\";s:1:\"d\";s:1:\"6\";s:1:\"e\";s:3:\"web\";}i:226;a:5:{s:1:\"a\";s:3:\"227\";s:1:\"b\";s:15:\"csp_list-update\";s:1:\"c\";s:8:\"CSP List\";s:1:\"d\";s:1:\"6\";s:1:\"e\";s:3:\"web\";}i:227;a:5:{s:1:\"a\";s:3:\"228\";s:1:\"b\";s:15:\"csp_list-delete\";s:1:\"c\";s:8:\"CSP List\";s:1:\"d\";s:1:\"6\";s:1:\"e\";s:3:\"web\";}i:228;a:5:{s:1:\"a\";s:3:\"229\";s:1:\"b\";s:14:\"hairiness-view\";s:1:\"c\";s:9:\"Hairiness\";s:1:\"d\";s:1:\"6\";s:1:\"e\";s:3:\"web\";}i:229;a:5:{s:1:\"a\";s:3:\"230\";s:1:\"b\";s:16:\"hairiness-create\";s:1:\"c\";s:9:\"Hairiness\";s:1:\"d\";s:1:\"6\";s:1:\"e\";s:3:\"web\";}i:230;a:5:{s:1:\"a\";s:3:\"231\";s:1:\"b\";s:16:\"hairiness-update\";s:1:\"c\";s:9:\"Hairiness\";s:1:\"d\";s:1:\"6\";s:1:\"e\";s:3:\"web\";}i:231;a:5:{s:1:\"a\";s:3:\"232\";s:1:\"b\";s:16:\"hairiness-delete\";s:1:\"c\";s:9:\"Hairiness\";s:1:\"d\";s:1:\"6\";s:1:\"e\";s:3:\"web\";}i:232;a:5:{s:1:\"a\";s:3:\"233\";s:1:\"b\";s:13:\"count_cv-view\";s:1:\"c\";s:8:\"Count CV\";s:1:\"d\";s:1:\"6\";s:1:\"e\";s:3:\"web\";}i:233;a:5:{s:1:\"a\";s:3:\"234\";s:1:\"b\";s:15:\"count_cv-create\";s:1:\"c\";s:8:\"Count CV\";s:1:\"d\";s:1:\"6\";s:1:\"e\";s:3:\"web\";}i:234;a:5:{s:1:\"a\";s:3:\"235\";s:1:\"b\";s:15:\"count_cv-update\";s:1:\"c\";s:8:\"Count CV\";s:1:\"d\";s:1:\"6\";s:1:\"e\";s:3:\"web\";}i:235;a:5:{s:1:\"a\";s:3:\"236\";s:1:\"b\";s:15:\"count_cv-delete\";s:1:\"c\";s:8:\"Count CV\";s:1:\"d\";s:1:\"6\";s:1:\"e\";s:3:\"web\";}i:236;a:5:{s:1:\"a\";s:3:\"237\";s:1:\"b\";s:16:\"strength_cv-view\";s:1:\"c\";s:11:\"Strength CV\";s:1:\"d\";s:1:\"6\";s:1:\"e\";s:3:\"web\";}i:237;a:5:{s:1:\"a\";s:3:\"238\";s:1:\"b\";s:18:\"strength_cv-create\";s:1:\"c\";s:11:\"Strength CV\";s:1:\"d\";s:1:\"6\";s:1:\"e\";s:3:\"web\";}i:238;a:5:{s:1:\"a\";s:3:\"239\";s:1:\"b\";s:18:\"strength_cv-update\";s:1:\"c\";s:11:\"Strength CV\";s:1:\"d\";s:1:\"6\";s:1:\"e\";s:3:\"web\";}i:239;a:5:{s:1:\"a\";s:3:\"240\";s:1:\"b\";s:18:\"strength_cv-delete\";s:1:\"c\";s:11:\"Strength CV\";s:1:\"d\";s:1:\"6\";s:1:\"e\";s:3:\"web\";}i:240;a:5:{s:1:\"a\";s:3:\"241\";s:1:\"b\";s:20:\"selvedge_master-view\";s:1:\"c\";s:15:\"Selvedge Master\";s:1:\"d\";s:2:\"15\";s:1:\"e\";s:3:\"web\";}i:241;a:5:{s:1:\"a\";s:3:\"242\";s:1:\"b\";s:22:\"selvedge_master-create\";s:1:\"c\";s:15:\"Selvedge Master\";s:1:\"d\";s:2:\"15\";s:1:\"e\";s:3:\"web\";}i:242;a:5:{s:1:\"a\";s:3:\"243\";s:1:\"b\";s:22:\"selvedge_master-update\";s:1:\"c\";s:15:\"Selvedge Master\";s:1:\"d\";s:2:\"15\";s:1:\"e\";s:3:\"web\";}i:243;a:5:{s:1:\"a\";s:3:\"244\";s:1:\"b\";s:22:\"selvedge_master-delete\";s:1:\"c\";s:15:\"Selvedge Master\";s:1:\"d\";s:2:\"15\";s:1:\"e\";s:3:\"web\";}i:244;a:5:{s:1:\"a\";s:3:\"245\";s:1:\"b\";s:10:\"weave-view\";s:1:\"c\";s:5:\"Weave\";s:1:\"d\";s:2:\"15\";s:1:\"e\";s:3:\"web\";}i:245;a:5:{s:1:\"a\";s:3:\"246\";s:1:\"b\";s:12:\"weave-create\";s:1:\"c\";s:5:\"Weave\";s:1:\"d\";s:2:\"15\";s:1:\"e\";s:3:\"web\";}i:246;a:5:{s:1:\"a\";s:3:\"247\";s:1:\"b\";s:12:\"weave-update\";s:1:\"c\";s:5:\"Weave\";s:1:\"d\";s:2:\"15\";s:1:\"e\";s:3:\"web\";}i:247;a:5:{s:1:\"a\";s:3:\"248\";s:1:\"b\";s:12:\"weave-delete\";s:1:\"c\";s:5:\"Weave\";s:1:\"d\";s:2:\"15\";s:1:\"e\";s:3:\"web\";}i:248;a:5:{s:1:\"a\";s:3:\"249\";s:1:\"b\";s:20:\"paper_tube_size-view\";s:1:\"c\";s:15:\"Paper Tube Size\";s:1:\"d\";s:2:\"15\";s:1:\"e\";s:3:\"web\";}i:249;a:5:{s:1:\"a\";s:3:\"250\";s:1:\"b\";s:22:\"paper_tube_size-create\";s:1:\"c\";s:15:\"Paper Tube Size\";s:1:\"d\";s:2:\"15\";s:1:\"e\";s:3:\"web\";}i:250;a:5:{s:1:\"a\";s:3:\"251\";s:1:\"b\";s:22:\"paper_tube_size-update\";s:1:\"c\";s:15:\"Paper Tube Size\";s:1:\"d\";s:2:\"15\";s:1:\"e\";s:3:\"web\";}i:251;a:5:{s:1:\"a\";s:3:\"252\";s:1:\"b\";s:22:\"paper_tube_size-delete\";s:1:\"c\";s:15:\"Paper Tube Size\";s:1:\"d\";s:2:\"15\";s:1:\"e\";s:3:\"web\";}i:252;a:5:{s:1:\"a\";s:3:\"253\";s:1:\"b\";s:16:\"sort_master-view\";s:1:\"c\";s:11:\"Sort Master\";s:1:\"d\";s:2:\"15\";s:1:\"e\";s:3:\"web\";}i:253;a:5:{s:1:\"a\";s:3:\"254\";s:1:\"b\";s:18:\"sort_master-create\";s:1:\"c\";s:11:\"Sort Master\";s:1:\"d\";s:2:\"15\";s:1:\"e\";s:3:\"web\";}i:254;a:5:{s:1:\"a\";s:3:\"255\";s:1:\"b\";s:18:\"sort_master-update\";s:1:\"c\";s:11:\"Sort Master\";s:1:\"d\";s:2:\"15\";s:1:\"e\";s:3:\"web\";}i:255;a:5:{s:1:\"a\";s:3:\"256\";s:1:\"b\";s:18:\"sort_master-delete\";s:1:\"c\";s:11:\"Sort Master\";s:1:\"d\";s:2:\"15\";s:1:\"e\";s:3:\"web\";}i:256;a:5:{s:1:\"a\";s:3:\"257\";s:1:\"b\";s:16:\"orders_list-view\";s:1:\"c\";s:11:\"Orders List\";s:1:\"d\";s:1:\"8\";s:1:\"e\";s:3:\"web\";}i:257;a:5:{s:1:\"a\";s:3:\"258\";s:1:\"b\";s:18:\"orders_list-create\";s:1:\"c\";s:11:\"Orders List\";s:1:\"d\";s:1:\"8\";s:1:\"e\";s:3:\"web\";}i:258;a:5:{s:1:\"a\";s:3:\"259\";s:1:\"b\";s:18:\"orders_list-update\";s:1:\"c\";s:11:\"Orders List\";s:1:\"d\";s:1:\"8\";s:1:\"e\";s:3:\"web\";}i:259;a:5:{s:1:\"a\";s:3:\"260\";s:1:\"b\";s:18:\"orders_list-delete\";s:1:\"c\";s:11:\"Orders List\";s:1:\"d\";s:1:\"8\";s:1:\"e\";s:3:\"web\";}i:260;a:5:{s:1:\"a\";s:3:\"261\";s:1:\"b\";s:29:\"jobwork_weaving_contract-view\";s:1:\"c\";s:24:\"Jobwork Weaving Contract\";s:1:\"d\";s:1:\"8\";s:1:\"e\";s:3:\"web\";}i:261;a:5:{s:1:\"a\";s:3:\"262\";s:1:\"b\";s:31:\"jobwork_weaving_contract-create\";s:1:\"c\";s:24:\"Jobwork Weaving Contract\";s:1:\"d\";s:1:\"8\";s:1:\"e\";s:3:\"web\";}i:262;a:5:{s:1:\"a\";s:3:\"263\";s:1:\"b\";s:31:\"jobwork_weaving_contract-update\";s:1:\"c\";s:24:\"Jobwork Weaving Contract\";s:1:\"d\";s:1:\"8\";s:1:\"e\";s:3:\"web\";}i:263;a:5:{s:1:\"a\";s:3:\"264\";s:1:\"b\";s:31:\"jobwork_weaving_contract-delete\";s:1:\"c\";s:24:\"Jobwork Weaving Contract\";s:1:\"d\";s:1:\"8\";s:1:\"e\";s:3:\"web\";}i:264;a:5:{s:1:\"a\";s:3:\"265\";s:1:\"b\";s:31:\"jobwork_weaving_weft_issue-view\";s:1:\"c\";s:26:\"Jobwork Weaving Weft Issue\";s:1:\"d\";s:1:\"8\";s:1:\"e\";s:3:\"web\";}i:265;a:5:{s:1:\"a\";s:3:\"266\";s:1:\"b\";s:33:\"jobwork_weaving_weft_issue-create\";s:1:\"c\";s:26:\"Jobwork Weaving Weft Issue\";s:1:\"d\";s:1:\"8\";s:1:\"e\";s:3:\"web\";}i:266;a:5:{s:1:\"a\";s:3:\"267\";s:1:\"b\";s:33:\"jobwork_weaving_weft_issue-update\";s:1:\"c\";s:26:\"Jobwork Weaving Weft Issue\";s:1:\"d\";s:1:\"8\";s:1:\"e\";s:3:\"web\";}i:267;a:5:{s:1:\"a\";s:3:\"268\";s:1:\"b\";s:33:\"jobwork_weaving_weft_issue-delete\";s:1:\"c\";s:26:\"Jobwork Weaving Weft Issue\";s:1:\"d\";s:1:\"8\";s:1:\"e\";s:3:\"web\";}i:268;a:5:{s:1:\"a\";s:3:\"269\";s:1:\"b\";s:29:\"jobwork_process_contract-view\";s:1:\"c\";s:24:\"JobWork Process Contract\";s:1:\"d\";s:1:\"8\";s:1:\"e\";s:3:\"web\";}i:269;a:5:{s:1:\"a\";s:3:\"270\";s:1:\"b\";s:31:\"jobwork_process_contract-create\";s:1:\"c\";s:24:\"JobWork Process Contract\";s:1:\"d\";s:1:\"8\";s:1:\"e\";s:3:\"web\";}i:270;a:5:{s:1:\"a\";s:3:\"271\";s:1:\"b\";s:31:\"jobwork_process_contract-update\";s:1:\"c\";s:24:\"JobWork Process Contract\";s:1:\"d\";s:1:\"8\";s:1:\"e\";s:3:\"web\";}i:271;a:5:{s:1:\"a\";s:3:\"272\";s:1:\"b\";s:31:\"jobwork_process_contract-delete\";s:1:\"c\";s:24:\"JobWork Process Contract\";s:1:\"d\";s:1:\"8\";s:1:\"e\";s:3:\"web\";}i:272;a:5:{s:1:\"a\";s:3:\"273\";s:1:\"b\";s:35:\"jobwork_process_contract_issue-view\";s:1:\"c\";s:30:\"JobWork Process Contract Issue\";s:1:\"d\";s:1:\"8\";s:1:\"e\";s:3:\"web\";}i:273;a:5:{s:1:\"a\";s:3:\"274\";s:1:\"b\";s:37:\"jobwork_process_contract_issue-create\";s:1:\"c\";s:30:\"JobWork Process Contract Issue\";s:1:\"d\";s:1:\"8\";s:1:\"e\";s:3:\"web\";}i:274;a:5:{s:1:\"a\";s:3:\"275\";s:1:\"b\";s:37:\"jobwork_process_contract_issue-update\";s:1:\"c\";s:30:\"JobWork Process Contract Issue\";s:1:\"d\";s:1:\"8\";s:1:\"e\";s:3:\"web\";}i:275;a:5:{s:1:\"a\";s:3:\"276\";s:1:\"b\";s:37:\"jobwork_process_contract_issue-delete\";s:1:\"c\";s:30:\"JobWork Process Contract Issue\";s:1:\"d\";s:1:\"8\";s:1:\"e\";s:3:\"web\";}i:276;a:5:{s:1:\"a\";s:3:\"277\";s:1:\"b\";s:36:\"jobwork_finished_fabric_receive-view\";s:1:\"c\";s:31:\"JobWork Finished Fabric Receive\";s:1:\"d\";s:1:\"8\";s:1:\"e\";s:3:\"web\";}i:277;a:5:{s:1:\"a\";s:3:\"278\";s:1:\"b\";s:38:\"jobwork_finished_fabric_receive-create\";s:1:\"c\";s:31:\"JobWork Finished Fabric Receive\";s:1:\"d\";s:1:\"8\";s:1:\"e\";s:3:\"web\";}i:278;a:5:{s:1:\"a\";s:3:\"279\";s:1:\"b\";s:38:\"jobwork_finished_fabric_receive-update\";s:1:\"c\";s:31:\"JobWork Finished Fabric Receive\";s:1:\"d\";s:1:\"8\";s:1:\"e\";s:3:\"web\";}i:279;a:5:{s:1:\"a\";s:3:\"280\";s:1:\"b\";s:38:\"jobwork_finished_fabric_receive-delete\";s:1:\"c\";s:31:\"JobWork Finished Fabric Receive\";s:1:\"d\";s:1:\"8\";s:1:\"e\";s:3:\"web\";}i:280;a:5:{s:1:\"a\";s:3:\"281\";s:1:\"b\";s:16:\"sizing_plan-view\";s:1:\"c\";s:11:\"Sizing Plan\";s:1:\"d\";s:1:\"8\";s:1:\"e\";s:3:\"web\";}i:281;a:5:{s:1:\"a\";s:3:\"282\";s:1:\"b\";s:18:\"sizing_plan-create\";s:1:\"c\";s:11:\"Sizing Plan\";s:1:\"d\";s:1:\"8\";s:1:\"e\";s:3:\"web\";}i:282;a:5:{s:1:\"a\";s:3:\"283\";s:1:\"b\";s:18:\"sizing_plan-update\";s:1:\"c\";s:11:\"Sizing Plan\";s:1:\"d\";s:1:\"8\";s:1:\"e\";s:3:\"web\";}i:283;a:5:{s:1:\"a\";s:3:\"284\";s:1:\"b\";s:18:\"sizing_plan-delete\";s:1:\"c\";s:11:\"Sizing Plan\";s:1:\"d\";s:1:\"8\";s:1:\"e\";s:3:\"web\";}i:284;a:5:{s:1:\"a\";s:3:\"285\";s:1:\"b\";s:22:\"sizing_yarn_issue-view\";s:1:\"c\";s:17:\"Sizing Yarn Issue\";s:1:\"d\";s:1:\"8\";s:1:\"e\";s:3:\"web\";}i:285;a:5:{s:1:\"a\";s:3:\"286\";s:1:\"b\";s:24:\"sizing_yarn_issue-create\";s:1:\"c\";s:17:\"Sizing Yarn Issue\";s:1:\"d\";s:1:\"8\";s:1:\"e\";s:3:\"web\";}i:286;a:5:{s:1:\"a\";s:3:\"287\";s:1:\"b\";s:24:\"sizing_yarn_issue-update\";s:1:\"c\";s:17:\"Sizing Yarn Issue\";s:1:\"d\";s:1:\"8\";s:1:\"e\";s:3:\"web\";}i:287;a:5:{s:1:\"a\";s:3:\"288\";s:1:\"b\";s:24:\"sizing_yarn_issue-delete\";s:1:\"c\";s:17:\"Sizing Yarn Issue\";s:1:\"d\";s:1:\"8\";s:1:\"e\";s:3:\"web\";}i:288;a:5:{s:1:\"a\";s:3:\"289\";s:1:\"b\";s:16:\"beam_inward-view\";s:1:\"c\";s:11:\"Beam Inward\";s:1:\"d\";s:1:\"8\";s:1:\"e\";s:3:\"web\";}i:289;a:5:{s:1:\"a\";s:3:\"290\";s:1:\"b\";s:18:\"beam_inward-create\";s:1:\"c\";s:11:\"Beam Inward\";s:1:\"d\";s:1:\"8\";s:1:\"e\";s:3:\"web\";}i:290;a:5:{s:1:\"a\";s:3:\"291\";s:1:\"b\";s:18:\"beam_inward-update\";s:1:\"c\";s:11:\"Beam Inward\";s:1:\"d\";s:1:\"8\";s:1:\"e\";s:3:\"web\";}i:291;a:5:{s:1:\"a\";s:3:\"292\";s:1:\"b\";s:18:\"beam_inward-delete\";s:1:\"c\";s:11:\"Beam Inward\";s:1:\"d\";s:1:\"8\";s:1:\"e\";s:3:\"web\";}i:292;a:5:{s:1:\"a\";s:3:\"293\";s:1:\"b\";s:17:\"beam_outward-view\";s:1:\"c\";s:12:\"Beam Outward\";s:1:\"d\";s:1:\"8\";s:1:\"e\";s:3:\"web\";}i:293;a:5:{s:1:\"a\";s:3:\"294\";s:1:\"b\";s:19:\"beam_outward-create\";s:1:\"c\";s:12:\"Beam Outward\";s:1:\"d\";s:1:\"8\";s:1:\"e\";s:3:\"web\";}i:294;a:5:{s:1:\"a\";s:3:\"295\";s:1:\"b\";s:19:\"beam_outward-update\";s:1:\"c\";s:12:\"Beam Outward\";s:1:\"d\";s:1:\"8\";s:1:\"e\";s:3:\"web\";}i:295;a:5:{s:1:\"a\";s:3:\"296\";s:1:\"b\";s:19:\"beam_outward-delete\";s:1:\"c\";s:12:\"Beam Outward\";s:1:\"d\";s:1:\"8\";s:1:\"e\";s:3:\"web\";}i:296;a:5:{s:1:\"a\";s:3:\"297\";s:1:\"b\";s:27:\"jobwork_fabric_receive-view\";s:1:\"c\";s:22:\"Jobwork Fabric Receive\";s:1:\"d\";s:1:\"9\";s:1:\"e\";s:3:\"web\";}i:297;a:5:{s:1:\"a\";s:3:\"298\";s:1:\"b\";s:29:\"jobwork_fabric_receive-create\";s:1:\"c\";s:22:\"Jobwork Fabric Receive\";s:1:\"d\";s:1:\"9\";s:1:\"e\";s:3:\"web\";}i:298;a:5:{s:1:\"a\";s:3:\"299\";s:1:\"b\";s:29:\"jobwork_fabric_receive-update\";s:1:\"c\";s:22:\"Jobwork Fabric Receive\";s:1:\"d\";s:1:\"9\";s:1:\"e\";s:3:\"web\";}i:299;a:5:{s:1:\"a\";s:3:\"300\";s:1:\"b\";s:29:\"jobwork_fabric_receive-delete\";s:1:\"c\";s:22:\"Jobwork Fabric Receive\";s:1:\"d\";s:1:\"9\";s:1:\"e\";s:3:\"web\";}i:300;a:5:{s:1:\"a\";s:3:\"301\";s:1:\"b\";s:17:\"bale_packing-view\";s:1:\"c\";s:12:\"Bale Packing\";s:1:\"d\";s:1:\"9\";s:1:\"e\";s:3:\"web\";}i:301;a:5:{s:1:\"a\";s:3:\"302\";s:1:\"b\";s:19:\"bale_packing-create\";s:1:\"c\";s:12:\"Bale Packing\";s:1:\"d\";s:1:\"9\";s:1:\"e\";s:3:\"web\";}i:302;a:5:{s:1:\"a\";s:3:\"303\";s:1:\"b\";s:19:\"bale_packing-update\";s:1:\"c\";s:12:\"Bale Packing\";s:1:\"d\";s:1:\"9\";s:1:\"e\";s:3:\"web\";}i:303;a:5:{s:1:\"a\";s:3:\"304\";s:1:\"b\";s:19:\"bale_packing-delete\";s:1:\"c\";s:12:\"Bale Packing\";s:1:\"d\";s:1:\"9\";s:1:\"e\";s:3:\"web\";}i:304;a:5:{s:1:\"a\";s:3:\"305\";s:1:\"b\";s:18:\"cloth_challan-view\";s:1:\"c\";s:13:\"Cloth Challan\";s:1:\"d\";s:1:\"9\";s:1:\"e\";s:3:\"web\";}i:305;a:5:{s:1:\"a\";s:3:\"306\";s:1:\"b\";s:20:\"cloth_challan-create\";s:1:\"c\";s:13:\"Cloth Challan\";s:1:\"d\";s:1:\"9\";s:1:\"e\";s:3:\"web\";}i:306;a:5:{s:1:\"a\";s:3:\"307\";s:1:\"b\";s:20:\"cloth_challan-update\";s:1:\"c\";s:13:\"Cloth Challan\";s:1:\"d\";s:1:\"9\";s:1:\"e\";s:3:\"web\";}i:307;a:5:{s:1:\"a\";s:3:\"308\";s:1:\"b\";s:20:\"cloth_challan-delete\";s:1:\"c\";s:13:\"Cloth Challan\";s:1:\"d\";s:1:\"9\";s:1:\"e\";s:3:\"web\";}i:308;a:5:{s:1:\"a\";s:3:\"309\";s:1:\"b\";s:20:\"inspection_list-view\";s:1:\"c\";s:15:\"Inspection List\";s:1:\"d\";s:2:\"10\";s:1:\"e\";s:3:\"web\";}i:309;a:5:{s:1:\"a\";s:3:\"310\";s:1:\"b\";s:22:\"inspection_list-create\";s:1:\"c\";s:15:\"Inspection List\";s:1:\"d\";s:2:\"10\";s:1:\"e\";s:3:\"web\";}i:310;a:5:{s:1:\"a\";s:3:\"311\";s:1:\"b\";s:22:\"inspection_list-update\";s:1:\"c\";s:15:\"Inspection List\";s:1:\"d\";s:2:\"10\";s:1:\"e\";s:3:\"web\";}i:311;a:5:{s:1:\"a\";s:3:\"312\";s:1:\"b\";s:22:\"inspection_list-delete\";s:1:\"c\";s:15:\"Inspection List\";s:1:\"d\";s:2:\"10\";s:1:\"e\";s:3:\"web\";}i:312;a:5:{s:1:\"a\";s:3:\"313\";s:1:\"b\";s:19:\"delivery_terms-view\";s:1:\"c\";s:14:\"Delivery Terms\";s:1:\"d\";s:2:\"10\";s:1:\"e\";s:3:\"web\";}i:313;a:5:{s:1:\"a\";s:3:\"314\";s:1:\"b\";s:21:\"delivery_terms-create\";s:1:\"c\";s:14:\"Delivery Terms\";s:1:\"d\";s:2:\"10\";s:1:\"e\";s:3:\"web\";}i:314;a:5:{s:1:\"a\";s:3:\"315\";s:1:\"b\";s:21:\"delivery_terms-update\";s:1:\"c\";s:14:\"Delivery Terms\";s:1:\"d\";s:2:\"10\";s:1:\"e\";s:3:\"web\";}i:315;a:5:{s:1:\"a\";s:3:\"316\";s:1:\"b\";s:21:\"delivery_terms-delete\";s:1:\"c\";s:14:\"Delivery Terms\";s:1:\"d\";s:2:\"10\";s:1:\"e\";s:3:\"web\";}i:316;a:5:{s:1:\"a\";s:3:\"317\";s:1:\"b\";s:9:\"city-view\";s:1:\"c\";s:4:\"City\";s:1:\"d\";s:2:\"10\";s:1:\"e\";s:3:\"web\";}i:317;a:5:{s:1:\"a\";s:3:\"318\";s:1:\"b\";s:11:\"city-create\";s:1:\"c\";s:4:\"City\";s:1:\"d\";s:2:\"10\";s:1:\"e\";s:3:\"web\";}i:318;a:5:{s:1:\"a\";s:3:\"319\";s:1:\"b\";s:11:\"city-update\";s:1:\"c\";s:4:\"City\";s:1:\"d\";s:2:\"10\";s:1:\"e\";s:3:\"web\";}i:319;a:5:{s:1:\"a\";s:3:\"320\";s:1:\"b\";s:11:\"city-delete\";s:1:\"c\";s:4:\"City\";s:1:\"d\";s:2:\"10\";s:1:\"e\";s:3:\"web\";}i:320;a:5:{s:1:\"a\";s:3:\"321\";s:1:\"b\";s:10:\"state-view\";s:1:\"c\";s:5:\"State\";s:1:\"d\";s:2:\"10\";s:1:\"e\";s:3:\"web\";}i:321;a:5:{s:1:\"a\";s:3:\"322\";s:1:\"b\";s:12:\"state-create\";s:1:\"c\";s:5:\"State\";s:1:\"d\";s:2:\"10\";s:1:\"e\";s:3:\"web\";}i:322;a:5:{s:1:\"a\";s:3:\"323\";s:1:\"b\";s:12:\"state-update\";s:1:\"c\";s:5:\"State\";s:1:\"d\";s:2:\"10\";s:1:\"e\";s:3:\"web\";}i:323;a:5:{s:1:\"a\";s:3:\"324\";s:1:\"b\";s:12:\"state-delete\";s:1:\"c\";s:5:\"State\";s:1:\"d\";s:2:\"10\";s:1:\"e\";s:3:\"web\";}i:324;a:5:{s:1:\"a\";s:3:\"325\";s:1:\"b\";s:22:\"party_to_location-view\";s:1:\"c\";s:17:\"Party to Location\";s:1:\"d\";s:2:\"10\";s:1:\"e\";s:3:\"web\";}i:325;a:5:{s:1:\"a\";s:3:\"326\";s:1:\"b\";s:24:\"party_to_location-create\";s:1:\"c\";s:17:\"Party to Location\";s:1:\"d\";s:2:\"10\";s:1:\"e\";s:3:\"web\";}i:326;a:5:{s:1:\"a\";s:3:\"327\";s:1:\"b\";s:24:\"party_to_location-update\";s:1:\"c\";s:17:\"Party to Location\";s:1:\"d\";s:2:\"10\";s:1:\"e\";s:3:\"web\";}i:327;a:5:{s:1:\"a\";s:3:\"328\";s:1:\"b\";s:24:\"party_to_location-delete\";s:1:\"c\";s:17:\"Party to Location\";s:1:\"d\";s:2:\"10\";s:1:\"e\";s:3:\"web\";}i:328;a:5:{s:1:\"a\";s:3:\"329\";s:1:\"b\";s:27:\"roll_/_bale_print_page-view\";s:1:\"c\";s:22:\"Roll / Bale Print Page\";s:1:\"d\";s:2:\"10\";s:1:\"e\";s:3:\"web\";}i:329;a:5:{s:1:\"a\";s:3:\"330\";s:1:\"b\";s:29:\"roll_/_bale_print_page-create\";s:1:\"c\";s:22:\"Roll / Bale Print Page\";s:1:\"d\";s:2:\"10\";s:1:\"e\";s:3:\"web\";}i:330;a:5:{s:1:\"a\";s:3:\"331\";s:1:\"b\";s:29:\"roll_/_bale_print_page-update\";s:1:\"c\";s:22:\"Roll / Bale Print Page\";s:1:\"d\";s:2:\"10\";s:1:\"e\";s:3:\"web\";}i:331;a:5:{s:1:\"a\";s:3:\"332\";s:1:\"b\";s:29:\"roll_/_bale_print_page-delete\";s:1:\"c\";s:22:\"Roll / Bale Print Page\";s:1:\"d\";s:2:\"10\";s:1:\"e\";s:3:\"web\";}i:332;a:5:{s:1:\"a\";s:3:\"333\";s:1:\"b\";s:13:\"customer-view\";s:1:\"c\";s:8:\"Customer\";s:1:\"d\";s:2:\"10\";s:1:\"e\";s:3:\"web\";}i:333;a:5:{s:1:\"a\";s:3:\"334\";s:1:\"b\";s:15:\"customer-create\";s:1:\"c\";s:8:\"Customer\";s:1:\"d\";s:2:\"10\";s:1:\"e\";s:3:\"web\";}i:334;a:5:{s:1:\"a\";s:3:\"335\";s:1:\"b\";s:15:\"customer-update\";s:1:\"c\";s:8:\"Customer\";s:1:\"d\";s:2:\"10\";s:1:\"e\";s:3:\"web\";}i:335;a:5:{s:1:\"a\";s:3:\"336\";s:1:\"b\";s:15:\"customer-delete\";s:1:\"c\";s:8:\"Customer\";s:1:\"d\";s:2:\"10\";s:1:\"e\";s:3:\"web\";}i:336;a:5:{s:1:\"a\";s:3:\"337\";s:1:\"b\";s:24:\"sourcing_executives-view\";s:1:\"c\";s:19:\"Sourcing Executives\";s:1:\"d\";s:2:\"10\";s:1:\"e\";s:3:\"web\";}i:337;a:5:{s:1:\"a\";s:3:\"338\";s:1:\"b\";s:26:\"sourcing_executives-create\";s:1:\"c\";s:19:\"Sourcing Executives\";s:1:\"d\";s:2:\"10\";s:1:\"e\";s:3:\"web\";}i:338;a:5:{s:1:\"a\";s:3:\"339\";s:1:\"b\";s:26:\"sourcing_executives-update\";s:1:\"c\";s:19:\"Sourcing Executives\";s:1:\"d\";s:2:\"10\";s:1:\"e\";s:3:\"web\";}i:339;a:5:{s:1:\"a\";s:3:\"340\";s:1:\"b\";s:26:\"sourcing_executives-delete\";s:1:\"c\";s:19:\"Sourcing Executives\";s:1:\"d\";s:2:\"10\";s:1:\"e\";s:3:\"web\";}i:340;a:5:{s:1:\"a\";s:3:\"341\";s:1:\"b\";s:18:\"weave_factors-view\";s:1:\"c\";s:13:\"Weave Factors\";s:1:\"d\";s:2:\"10\";s:1:\"e\";s:3:\"web\";}i:341;a:5:{s:1:\"a\";s:3:\"342\";s:1:\"b\";s:20:\"weave_factors-create\";s:1:\"c\";s:13:\"Weave Factors\";s:1:\"d\";s:2:\"10\";s:1:\"e\";s:3:\"web\";}i:342;a:5:{s:1:\"a\";s:3:\"343\";s:1:\"b\";s:20:\"weave_factors-update\";s:1:\"c\";s:13:\"Weave Factors\";s:1:\"d\";s:2:\"10\";s:1:\"e\";s:3:\"web\";}i:343;a:5:{s:1:\"a\";s:3:\"344\";s:1:\"b\";s:20:\"weave_factors-delete\";s:1:\"c\";s:13:\"Weave Factors\";s:1:\"d\";s:2:\"10\";s:1:\"e\";s:3:\"web\";}i:344;a:5:{s:1:\"a\";s:3:\"345\";s:1:\"b\";s:12:\"costing-view\";s:1:\"c\";s:7:\"Costing\";s:1:\"d\";s:2:\"10\";s:1:\"e\";s:3:\"web\";}i:345;a:5:{s:1:\"a\";s:3:\"346\";s:1:\"b\";s:14:\"costing-create\";s:1:\"c\";s:7:\"Costing\";s:1:\"d\";s:2:\"10\";s:1:\"e\";s:3:\"web\";}i:346;a:5:{s:1:\"a\";s:3:\"347\";s:1:\"b\";s:14:\"costing-update\";s:1:\"c\";s:7:\"Costing\";s:1:\"d\";s:2:\"10\";s:1:\"e\";s:3:\"web\";}i:347;a:5:{s:1:\"a\";s:3:\"348\";s:1:\"b\";s:14:\"costing-delete\";s:1:\"c\";s:7:\"Costing\";s:1:\"d\";s:2:\"10\";s:1:\"e\";s:3:\"web\";}i:348;a:5:{s:1:\"a\";s:3:\"349\";s:1:\"b\";s:9:\"user-view\";s:1:\"c\";s:4:\"User\";s:1:\"d\";s:2:\"11\";s:1:\"e\";s:3:\"web\";}i:349;a:5:{s:1:\"a\";s:3:\"350\";s:1:\"b\";s:11:\"user-create\";s:1:\"c\";s:4:\"User\";s:1:\"d\";s:2:\"11\";s:1:\"e\";s:3:\"web\";}i:350;a:5:{s:1:\"a\";s:3:\"351\";s:1:\"b\";s:11:\"user-update\";s:1:\"c\";s:4:\"User\";s:1:\"d\";s:2:\"11\";s:1:\"e\";s:3:\"web\";}i:351;a:5:{s:1:\"a\";s:3:\"352\";s:1:\"b\";s:11:\"user-delete\";s:1:\"c\";s:4:\"User\";s:1:\"d\";s:2:\"11\";s:1:\"e\";s:3:\"web\";}i:352;a:5:{s:1:\"a\";s:3:\"353\";s:1:\"b\";s:13:\"set_list-view\";s:1:\"c\";s:8:\"Set List\";s:1:\"d\";s:2:\"15\";s:1:\"e\";s:3:\"web\";}i:353;a:5:{s:1:\"a\";s:3:\"354\";s:1:\"b\";s:15:\"set_list-create\";s:1:\"c\";s:8:\"Set List\";s:1:\"d\";s:2:\"15\";s:1:\"e\";s:3:\"web\";}i:354;a:5:{s:1:\"a\";s:3:\"355\";s:1:\"b\";s:15:\"set_list-update\";s:1:\"c\";s:8:\"Set List\";s:1:\"d\";s:2:\"15\";s:1:\"e\";s:3:\"web\";}i:355;a:5:{s:1:\"a\";s:3:\"356\";s:1:\"b\";s:15:\"set_list-delete\";s:1:\"c\";s:8:\"Set List\";s:1:\"d\";s:2:\"15\";s:1:\"e\";s:3:\"web\";}i:356;a:5:{s:1:\"a\";s:3:\"357\";s:1:\"b\";s:12:\"machine-view\";s:1:\"c\";s:7:\"Machine\";s:1:\"d\";s:1:\"1\";s:1:\"e\";s:3:\"web\";}i:357;a:5:{s:1:\"a\";s:3:\"358\";s:1:\"b\";s:14:\"machine-create\";s:1:\"c\";s:7:\"Machine\";s:1:\"d\";s:1:\"1\";s:1:\"e\";s:3:\"web\";}i:358;a:5:{s:1:\"a\";s:3:\"359\";s:1:\"b\";s:14:\"machine-update\";s:1:\"c\";s:7:\"Machine\";s:1:\"d\";s:1:\"1\";s:1:\"e\";s:3:\"web\";}i:359;a:5:{s:1:\"a\";s:3:\"360\";s:1:\"b\";s:14:\"machine-delete\";s:1:\"c\";s:7:\"Machine\";s:1:\"d\";s:1:\"1\";s:1:\"e\";s:3:\"web\";}i:360;a:5:{s:1:\"a\";s:3:\"361\";s:1:\"b\";s:14:\"fabric_po-view\";s:1:\"c\";s:9:\"Fabric PO\";s:1:\"d\";s:1:\"6\";s:1:\"e\";s:3:\"web\";}i:361;a:5:{s:1:\"a\";s:3:\"362\";s:1:\"b\";s:16:\"fabric_po-create\";s:1:\"c\";s:9:\"Fabric PO\";s:1:\"d\";s:1:\"6\";s:1:\"e\";s:3:\"web\";}i:362;a:5:{s:1:\"a\";s:3:\"363\";s:1:\"b\";s:16:\"fabric_po-update\";s:1:\"c\";s:9:\"Fabric PO\";s:1:\"d\";s:1:\"6\";s:1:\"e\";s:3:\"web\";}i:363;a:5:{s:1:\"a\";s:3:\"364\";s:1:\"b\";s:16:\"fabric_po-delete\";s:1:\"c\";s:9:\"Fabric PO\";s:1:\"d\";s:1:\"6\";s:1:\"e\";s:3:\"web\";}i:364;a:5:{s:1:\"a\";s:3:\"365\";s:1:\"b\";s:23:\"po_fabric_purchase-view\";s:1:\"c\";s:18:\"PO-Fabric Purchase\";s:1:\"d\";s:1:\"3\";s:1:\"e\";s:3:\"web\";}i:365;a:5:{s:1:\"a\";s:3:\"366\";s:1:\"b\";s:25:\"po_fabric_purchase-create\";s:1:\"c\";s:18:\"PO-Fabric Purchase\";s:1:\"d\";s:1:\"3\";s:1:\"e\";s:3:\"web\";}i:366;a:5:{s:1:\"a\";s:3:\"367\";s:1:\"b\";s:25:\"po_fabric_purchase-update\";s:1:\"c\";s:18:\"PO-Fabric Purchase\";s:1:\"d\";s:1:\"3\";s:1:\"e\";s:3:\"web\";}i:367;a:5:{s:1:\"a\";s:3:\"368\";s:1:\"b\";s:25:\"po_fabric_purchase-delete\";s:1:\"c\";s:18:\"PO-Fabric Purchase\";s:1:\"d\";s:1:\"3\";s:1:\"e\";s:3:\"web\";}i:368;a:5:{s:1:\"a\";s:3:\"369\";s:1:\"b\";s:18:\"fabric_inward-view\";s:1:\"c\";s:13:\"Fabric Inward\";s:1:\"d\";s:1:\"5\";s:1:\"e\";s:3:\"web\";}i:369;a:5:{s:1:\"a\";s:3:\"370\";s:1:\"b\";s:20:\"fabric_inward-create\";s:1:\"c\";s:13:\"Fabric Inward\";s:1:\"d\";s:1:\"5\";s:1:\"e\";s:3:\"web\";}i:370;a:5:{s:1:\"a\";s:3:\"371\";s:1:\"b\";s:20:\"fabric_inward-update\";s:1:\"c\";s:13:\"Fabric Inward\";s:1:\"d\";s:1:\"5\";s:1:\"e\";s:3:\"web\";}i:371;a:5:{s:1:\"a\";s:3:\"372\";s:1:\"b\";s:20:\"fabric_inward-delete\";s:1:\"c\";s:13:\"Fabric Inward\";s:1:\"d\";s:1:\"5\";s:1:\"e\";s:3:\"web\";}i:372;a:5:{s:1:\"a\";s:3:\"373\";s:1:\"b\";s:25:\"yarn_opening_balance-view\";s:1:\"c\";s:20:\"Yarn Opening Balance\";s:1:\"d\";s:1:\"5\";s:1:\"e\";s:3:\"web\";}i:373;a:5:{s:1:\"a\";s:3:\"374\";s:1:\"b\";s:27:\"yarn_opening_balance-create\";s:1:\"c\";s:20:\"Yarn Opening Balance\";s:1:\"d\";s:1:\"5\";s:1:\"e\";s:3:\"web\";}i:374;a:5:{s:1:\"a\";s:3:\"375\";s:1:\"b\";s:27:\"yarn_opening_balance-update\";s:1:\"c\";s:20:\"Yarn Opening Balance\";s:1:\"d\";s:1:\"5\";s:1:\"e\";s:3:\"web\";}i:375;a:5:{s:1:\"a\";s:3:\"376\";s:1:\"b\";s:27:\"yarn_opening_balance-delete\";s:1:\"c\";s:20:\"Yarn Opening Balance\";s:1:\"d\";s:1:\"5\";s:1:\"e\";s:3:\"web\";}i:376;a:5:{s:1:\"a\";s:3:\"377\";s:1:\"b\";s:27:\"fabric_opening_balance-view\";s:1:\"c\";s:22:\"Fabric Opening Balance\";s:1:\"d\";s:1:\"5\";s:1:\"e\";s:3:\"web\";}i:377;a:5:{s:1:\"a\";s:3:\"378\";s:1:\"b\";s:29:\"fabric_opening_balance-create\";s:1:\"c\";s:22:\"Fabric Opening Balance\";s:1:\"d\";s:1:\"5\";s:1:\"e\";s:3:\"web\";}i:378;a:5:{s:1:\"a\";s:3:\"379\";s:1:\"b\";s:29:\"fabric_opening_balance-update\";s:1:\"c\";s:22:\"Fabric Opening Balance\";s:1:\"d\";s:1:\"5\";s:1:\"e\";s:3:\"web\";}i:379;a:5:{s:1:\"a\";s:3:\"380\";s:1:\"b\";s:29:\"fabric_opening_balance-delete\";s:1:\"c\";s:22:\"Fabric Opening Balance\";s:1:\"d\";s:1:\"5\";s:1:\"e\";s:3:\"web\";}i:380;a:5:{s:1:\"a\";s:3:\"381\";s:1:\"b\";s:12:\"ship_to-view\";s:1:\"c\";s:7:\"Ship To\";s:1:\"d\";s:1:\"2\";s:1:\"e\";s:3:\"web\";}i:381;a:5:{s:1:\"a\";s:3:\"382\";s:1:\"b\";s:14:\"ship_to-create\";s:1:\"c\";s:7:\"Ship To\";s:1:\"d\";s:1:\"2\";s:1:\"e\";s:3:\"web\";}i:382;a:5:{s:1:\"a\";s:3:\"383\";s:1:\"b\";s:14:\"ship_to-update\";s:1:\"c\";s:7:\"Ship To\";s:1:\"d\";s:1:\"2\";s:1:\"e\";s:3:\"web\";}i:383;a:5:{s:1:\"a\";s:3:\"384\";s:1:\"b\";s:14:\"ship_to-delete\";s:1:\"c\";s:7:\"Ship To\";s:1:\"d\";s:1:\"2\";s:1:\"e\";s:3:\"web\";}}s:5:\"roles\";a:0:{}}', 1739261837);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `certifications`
--

CREATE TABLE `certifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `certifications`
--

INSERT INTO `certifications` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(5, 'EUROPEAN FLAX-BVFR15619259', 1, '2025-01-08 12:06:53', '2025-01-08 12:06:53'),
(6, 'OKEO TEX', 1, '2025-01-08 12:06:59', '2025-01-08 12:06:59'),
(7, 'LI', 1, '2025-01-08 12:07:05', '2025-01-08 12:07:05');

-- --------------------------------------------------------

--
-- Table structure for table `checks`
--

CREATE TABLE `checks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `checks`
--

INSERT INTO `checks` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Bank 1', 1, '2024-07-05 10:00:45', '2024-07-05 13:26:19'),
(2, 'Cheq 2', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(5, 'NEW DELHI', 1, '2024-10-11 12:03:37', '2024-10-11 12:03:37'),
(6, 'TIRUPUR', 1, '2024-10-12 11:00:05', '2024-10-12 11:00:05'),
(7, 'NAMAKKAL', 1, '2024-10-12 11:00:10', '2024-10-12 11:00:10'),
(8, 'SALEM', 1, '2024-10-12 11:00:18', '2024-10-12 11:00:18'),
(9, 'COIMBATORE', 1, '2024-10-12 11:00:25', '2024-10-12 11:00:25'),
(10, 'CUDDALORE', 1, '2024-10-12 11:00:32', '2024-10-12 11:00:32'),
(11, 'THANE', 1, '2024-10-12 11:00:42', '2024-10-12 11:00:42'),
(12, 'KATUNAYAKE', 1, '2024-10-12 11:00:45', '2024-10-12 11:00:45'),
(13, 'NOIDA', 1, '2024-10-12 11:00:52', '2024-10-12 11:00:52'),
(14, 'KORAMANGALA', 1, '2024-10-12 11:00:58', '2024-10-12 11:00:58'),
(15, 'GURGAON', 1, '2024-10-12 11:01:14', '2024-10-12 11:01:14'),
(16, 'CHENNAI', 1, '2024-10-12 11:01:22', '2024-10-12 11:01:22'),
(17, 'JAIPUR', 1, '2024-10-12 11:01:29', '2024-10-12 11:01:29'),
(18, 'ERODE', 1, '2024-10-12 11:03:44', '2024-10-12 11:03:44'),
(19, 'KRISHNAGIRI', 1, '2025-01-08 12:51:04', '2025-01-08 12:51:04');

-- --------------------------------------------------------

--
-- Table structure for table `cloth_challans`
--

CREATE TABLE `cloth_challans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `challan_date` date DEFAULT NULL,
  `challan_type` varchar(150) DEFAULT NULL,
  `buyer_id` int(11) DEFAULT NULL,
  `company` varchar(150) DEFAULT NULL,
  `lr_number` double DEFAULT NULL,
  `lr_date` date DEFAULT NULL,
  `ewaybill_number` varchar(150) DEFAULT NULL,
  `transportation_id` int(11) DEFAULT NULL,
  `remarks` varchar(150) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `sort_id` int(11) DEFAULT NULL,
  `no_of_bale_roll` double DEFAULT NULL,
  `consignee_id` int(11) DEFAULT NULL,
  `vehicle_number` varchar(150) DEFAULT NULL,
  `rate` double DEFAULT NULL,
  `challan_no` varchar(150) DEFAULT NULL,
  `fabric_seconds_sales` tinyint(1) DEFAULT NULL,
  `order_sort_id` int(11) DEFAULT NULL,
  `packing_type_id` int(11) DEFAULT NULL,
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `meter_range_id` int(11) DEFAULT NULL,
  `available_bales` double DEFAULT NULL,
  `no_of_bales_rolls` double DEFAULT NULL,
  `from_bale_id` int(11) DEFAULT NULL,
  `to_bale_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `cloth_challans`
--

INSERT INTO `cloth_challans` (`id`, `created_at`, `updated_at`, `challan_date`, `challan_type`, `buyer_id`, `company`, `lr_number`, `lr_date`, `ewaybill_number`, `transportation_id`, `remarks`, `order_id`, `sort_id`, `no_of_bale_roll`, `consignee_id`, `vehicle_number`, `rate`, `challan_no`, `fabric_seconds_sales`, `order_sort_id`, `packing_type_id`, `from_date`, `to_date`, `meter_range_id`, `available_bales`, `no_of_bales_rolls`, `from_bale_id`, `to_bale_id`) VALUES
(1, '2024-07-25 09:48:54', '2024-08-29 12:13:57', '2024-07-13', 'export', 1, 'sez', 34, '2024-07-07', '4343', 1, NULL, 9, 9, NULL, NULL, NULL, 1, '212-554A', 0, 9, 1, NULL, NULL, NULL, NULL, NULL, 1, 2),
(2, '2024-11-26 14:46:45', '2024-11-26 14:46:45', '2024-01-01', 'domestic', 9, 'sez', NULL, NULL, NULL, NULL, NULL, 32, 44, NULL, NULL, NULL, 12, NULL, NULL, 44, 1, '2024-11-30', '2024-12-13', NULL, NULL, NULL, 4, 3),
(3, '2024-11-30 16:30:11', '2024-11-30 16:30:11', '2025-02-01', 'domestic', 9, 'sez', NULL, NULL, NULL, NULL, NULL, 34, 46, NULL, 10, NULL, 22, NULL, NULL, 46, 1, NULL, NULL, NULL, NULL, NULL, 5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `cloth_challan_details`
--

CREATE TABLE `cloth_challan_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cloth_challan_id` int(11) DEFAULT NULL,
  `order_sort_id` int(11) DEFAULT NULL,
  `packing_type_id` int(11) DEFAULT NULL,
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `meter_range_id` int(11) DEFAULT NULL,
  `available_bales` double DEFAULT NULL,
  `no_of_bales_rolls` double DEFAULT NULL,
  `from_bale_id` int(11) DEFAULT NULL,
  `to_bale_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'red', '', 1, '2024-07-06 15:49:05', '2024-07-06 15:49:05'),
(2, 'green', '', 1, '2024-07-06 15:49:12', '2024-07-06 15:49:12'),
(3, 'yellow', 'zzz', 1, '2024-07-06 15:49:20', '2024-08-22 11:35:03'),
(4, 'Black', '', 1, '2024-08-26 11:22:26', '2024-08-26 11:22:33'),
(5, 'OPTIC', '100% LINEN', 1, '2024-10-12 03:05:11', '2024-10-12 03:06:36');

-- --------------------------------------------------------

--
-- Table structure for table `consignees`
--

CREATE TABLE `consignees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `state_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `gstn` varchar(255) NOT NULL,
  `pin` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `pan` varchar(255) NOT NULL,
  `buyer_id` int(11) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `consignees`
--

INSERT INTO `consignees` (`id`, `name`, `state_id`, `city_id`, `address`, `gstn`, `pin`, `contact`, `pan`, `buyer_id`, `active`, `created_at`, `updated_at`) VALUES
(10, '1', 2, 19, '1', '1', '1', '1', '1', NULL, 1, '2025-01-18 06:24:17', '2025-01-18 06:24:17');

-- --------------------------------------------------------

--
-- Table structure for table `container_sizes`
--

CREATE TABLE `container_sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `container_sizes`
--

INSERT INTO `container_sizes` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(5, '20', 1, '2024-10-11 06:28:57', '2024-10-11 06:28:57'),
(6, '40', 1, '2024-10-11 06:29:01', '2024-10-11 06:29:01');

-- --------------------------------------------------------

--
-- Table structure for table `contracts`
--

CREATE TABLE `contracts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `contracts`
--

INSERT INTO `contracts` (`id`, `name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'contract 1', NULL, 1, NULL, NULL),
(2, 'contract 2', NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contract_types`
--

CREATE TABLE `contract_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `code` varchar(250) DEFAULT NULL,
  `type` varchar(150) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `contract_types`
--

INSERT INTO `contract_types` (`id`, `name`, `code`, `type`, `status`, `created_at`, `updated_at`) VALUES
(5, 'EXPORT', 'EX01', 'Export', 1, '2024-09-22 13:29:12', '2024-09-22 13:29:12'),
(6, 'DOMESTIC', 'DOM01', 'Domestic', 1, '2024-09-24 14:57:18', '2024-10-29 11:41:05');

-- --------------------------------------------------------

--
-- Table structure for table `contract_type_details`
--

CREATE TABLE `contract_type_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contract_type_id` int(11) DEFAULT NULL,
  `contract_order_route_name` varchar(250) DEFAULT NULL,
  `contract_order_route_code` varchar(250) DEFAULT NULL,
  `show_in_ppc` tinyint(1) DEFAULT NULL,
  `show_in_fabric_po` tinyint(1) DEFAULT NULL,
  `show_in_warehouse` tinyint(1) DEFAULT NULL,
  `bank_purpose` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `contract_type_details`
--

INSERT INTO `contract_type_details` (`id`, `contract_type_id`, `contract_order_route_name`, `contract_order_route_code`, `show_in_ppc`, `show_in_fabric_po`, `show_in_warehouse`, `bank_purpose`, `created_at`, `updated_at`) VALUES
(11, 1, 'ww', 'wwww', 1, 1, 1, NULL, '2024-09-11 16:01:11', '2024-09-11 16:01:11'),
(12, 4, 'bus', '123', 1, 1, 1, 1, '2024-09-15 08:06:23', '2024-09-15 08:06:23'),
(34, 6, 'JW SIZING+IH WEAVING', 'JWSIHW', 1, 1, 1, NULL, '2025-01-18 05:20:52', '2025-01-18 05:20:52'),
(35, 6, 'JW SIZING+JW WEAVING', 'JWSJWW', 1, 1, 1, NULL, '2025-01-18 05:20:52', '2025-01-18 05:20:52'),
(36, 6, 'JW SIZING+JW WEAVING', 'IHWIHW', 1, 1, 1, NULL, '2025-01-18 05:20:52', '2025-01-18 05:20:52'),
(37, 6, 'JW SIZING+JW WEAVING', 'IHWJWW', 1, 1, 1, NULL, '2025-01-18 05:20:52', '2025-01-18 05:20:52'),
(38, 6, 'IH WARPING+IH WEAVING+JW SIZING+JW WEAVING', 'IHWIHWJWSJWW', 1, 1, 1, NULL, '2025-01-18 05:20:52', '2025-01-18 05:20:52'),
(39, 6, 'STOCK', 'STOCK', NULL, NULL, 1, NULL, '2025-01-18 05:20:52', '2025-01-18 05:20:52'),
(40, 5, 'JW SIZING+IH WEAVING', 'JWSIHW', 1, 1, 1, NULL, '2025-01-18 05:21:00', '2025-01-18 05:21:00'),
(41, 5, 'JW SIZING+JW WEAVING', 'JWSJWW', 1, 1, 1, NULL, '2025-01-18 05:21:00', '2025-01-18 05:21:00'),
(42, 5, 'IH WARPING+IH WEAVING', 'IHWIHW', 1, 1, 1, NULL, '2025-01-18 05:21:00', '2025-01-18 05:21:00'),
(43, 5, 'IH WARPING+JW WEAVING', 'IHWJWW', 1, 1, 1, NULL, '2025-01-18 05:21:00', '2025-01-18 05:21:00'),
(44, 5, 'IH WARPING+IH WEAVING+JW SIZING+JW WEAVING', 'IHWIHWJWSJWW', 1, 1, 1, NULL, '2025-01-18 05:21:00', '2025-01-18 05:21:00'),
(45, 5, 'STOCK', 'STOCK', NULL, NULL, 1, NULL, '2025-01-18 05:21:00', '2025-01-18 05:21:00');

-- --------------------------------------------------------

--
-- Table structure for table `coparts`
--

CREATE TABLE `coparts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `coparts`
--

INSERT INTO `coparts` (`id`, `name`, `value`, `status`, `created_at`, `updated_at`) VALUES
(1, 'SINGLE', '1.0', 1, '2024-07-15 13:25:05', '2025-01-08 12:28:29');

-- --------------------------------------------------------

--
-- Table structure for table `costings`
--

CREATE TABLE `costings` (
  `id` int(11) NOT NULL,
  `costing_number` varchar(150) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `agent_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `sourcing_id` int(11) DEFAULT NULL,
  `weave_factor_id` int(11) DEFAULT NULL,
  `quality` varchar(150) DEFAULT NULL,
  `shafts` varchar(150) DEFAULT NULL,
  `marketing_executive` varchar(150) DEFAULT NULL,
  `buyer_reference` varchar(150) DEFAULT NULL,
  `is_warp_butta` tinyint(1) DEFAULT NULL,
  `is_weft_butta` tinyint(1) DEFAULT NULL,
  `is_warp2_sizing_count` tinyint(1) DEFAULT NULL,
  `is_seersucker` tinyint(1) DEFAULT NULL,
  `grey_width` double DEFAULT NULL,
  `epi_difference` double DEFAULT NULL,
  `meters_per_120yards` double DEFAULT NULL,
  `warp_crimp` double DEFAULT NULL,
  `total_ends` double DEFAULT NULL,
  `margin_percent` double DEFAULT NULL,
  `target_price` double DEFAULT NULL,
  `order_quantity` double DEFAULT NULL,
  `sizing_per_kg` double DEFAULT NULL,
  `weaving_charges` double DEFAULT NULL,
  `fabric_processing_cost` double DEFAULT NULL,
  `freight_per_kg_mtr` double DEFAULT NULL,
  `packaging_charges` double DEFAULT NULL,
  `butta_cutting_per_mtr` double DEFAULT NULL,
  `yarn_wastage` double DEFAULT NULL,
  `value_loss` double DEFAULT NULL,
  `interest_etc` double DEFAULT NULL,
  `payment_term` varchar(200) DEFAULT NULL,
  `commission_cd` double DEFAULT NULL,
  `remark` varchar(200) DEFAULT NULL,
  `other_cost_rate` tinyint(1) DEFAULT NULL,
  `other_cost_remarks` varchar(200) DEFAULT NULL,
  `extra_remarks` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `code`, `status`, `created_at`, `updated_at`) VALUES
(1, 'INDIA', 'INDIA', 1, '2024-07-07 08:51:19', '2024-10-11 05:23:54'),
(7, 'CHINA', 'CHINA', 1, '2025-01-08 12:39:34', '2025-01-08 12:39:34'),
(8, 'SRI LANKA', 'SRI LANKA', 1, '2025-01-08 12:39:43', '2025-01-08 12:39:43'),
(9, 'UNREGISTER', 'UNREGISTER', 1, '2025-01-08 12:39:51', '2025-01-08 12:39:51'),
(10, 'BANGLADESH', 'BANGLADESH', 1, '2025-01-08 12:39:58', '2025-01-08 12:39:58');

-- --------------------------------------------------------

--
-- Table structure for table `counts`
--

CREATE TABLE `counts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `count` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `counts`
--

INSERT INTO `counts` (`id`, `count`, `status`, `created_at`, `updated_at`) VALUES
(8, '26.0', 1, '2025-01-08 11:26:08', '2025-01-08 11:26:08'),
(9, '36.0', 1, '2025-01-08 11:26:15', '2025-01-08 11:26:15'),
(10, '15.0', 1, '2025-01-08 11:26:24', '2025-01-08 11:26:24'),
(11, '33.0', 1, '2025-01-08 11:27:21', '2025-01-08 11:27:21'),
(12, '30.0', 1, '2025-01-08 11:27:27', '2025-01-08 11:27:27'),
(13, '24.0', 1, '2025-01-08 11:27:34', '2025-01-08 11:27:34'),
(14, '20.0', 1, '2025-01-08 11:27:42', '2025-01-08 11:27:42'),
(15, '28.0', 1, '2025-01-08 11:27:48', '2025-01-08 11:27:48'),
(16, '21.0', 1, '2025-01-08 11:27:57', '2025-01-08 11:27:57'),
(17, '12.0', 1, '2025-01-08 11:28:04', '2025-01-08 11:28:04'),
(18, '16.0', 1, '2025-01-08 11:28:11', '2025-01-08 11:28:11'),
(19, '11.0', 1, '2025-01-08 11:28:18', '2025-01-08 11:28:18'),
(20, '10.0', 1, '2025-01-08 11:28:30', '2025-01-08 11:28:30'),
(21, '7.0', 1, '2025-01-08 11:28:39', '2025-01-08 11:28:39'),
(22, '40.0', 1, '2025-01-08 11:28:46', '2025-01-08 11:28:46'),
(23, '6.0', 1, '2025-01-08 11:28:54', '2025-01-08 11:28:54'),
(24, '32.0', 1, '2025-01-08 11:29:00', '2025-01-08 11:29:00'),
(25, '13.0', 1, '2025-01-08 11:29:08', '2025-01-08 11:29:08'),
(26, '3.0', 1, '2025-01-08 11:29:15', '2025-01-08 11:29:15');

-- --------------------------------------------------------

--
-- Table structure for table `count_cvs`
--

CREATE TABLE `count_cvs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `count_cvs`
--

INSERT INTO `count_cvs` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'CV 1D', 1, '2024-07-05 10:00:45', '2024-08-28 08:45:09');

-- --------------------------------------------------------

--
-- Table structure for table `csps`
--

CREATE TABLE `csps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `csps`
--

INSERT INTO `csps` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(2, 'CSP 1D', 1, NULL, '2024-08-28 08:44:55'),
(3, 'alsdkf;', 1, '2024-10-06 14:27:43', '2024-10-06 14:27:43');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'cust', 1, '2024-07-05 10:00:45', '2024-08-22 12:33:44');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_items`
--

CREATE TABLE `delivery_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `delivery_items`
--

INSERT INTO `delivery_items` (`id`, `name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'FOB', 'aa', 1, NULL, '2025-01-08 12:34:51'),
(3, 'fob', NULL, 1, '2025-01-08 12:35:23', '2025-01-08 12:35:23'),
(4, 'hello', 'aaa', 1, '2025-01-27 07:55:58', '2025-01-27 16:47:21'),
(5, 'checking delivery item desc', 'description', 1, '2025-01-27 16:55:46', '2025-01-27 16:55:46');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_terms`
--

CREATE TABLE `delivery_terms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `delivery_for` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `delivery_terms`
--

INSERT INTO `delivery_terms` (`id`, `name`, `description`, `delivery_for`, `status`, `created_at`, `updated_at`) VALUES
(3, 'FOB', 'Goods once sold Cannot be taken back \r\n Subject to ERODE jurisdiction', 'domestic', 1, '2024-08-06 12:05:45', '2024-08-06 12:05:45');

-- --------------------------------------------------------

--
-- Table structure for table `domestic_buyers`
--

CREATE TABLE `domestic_buyers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `gst` varchar(255) DEFAULT NULL,
  `country_id` varchar(255) DEFAULT NULL,
  `state_id` varchar(255) DEFAULT NULL,
  `address_1` varchar(255) NOT NULL,
  `address_2` varchar(255) DEFAULT NULL,
  `address_3` varchar(255) DEFAULT NULL,
  `city_id` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `buyer_pincode` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `buyer_no` varchar(255) DEFAULT NULL,
  `buyer_code` varchar(255) DEFAULT NULL,
  `bank` varchar(255) DEFAULT NULL,
  `bank_country_id` varchar(255) DEFAULT NULL,
  `bank_state_id` varchar(255) DEFAULT NULL,
  `state_code` varchar(255) DEFAULT NULL,
  `bank_address` varchar(255) DEFAULT NULL,
  `pincode` varchar(255) DEFAULT NULL,
  `bank_city_id` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `credit_limit` varchar(255) DEFAULT NULL,
  `interest` varchar(255) DEFAULT NULL,
  `gst_type` varchar(255) DEFAULT NULL,
  `consignee_as_buyer` tinyint(1) NOT NULL DEFAULT 1,
  `account_group` varchar(255) DEFAULT NULL,
  `vendor_group_id` varchar(255) DEFAULT NULL,
  `pan` varchar(255) DEFAULT NULL,
  `tcs_applied` varchar(255) DEFAULT NULL,
  `tcs_declaration` varchar(255) DEFAULT NULL,
  `collectee_type` varchar(255) DEFAULT NULL,
  `market` varchar(255) DEFAULT NULL,
  `sector` varchar(255) DEFAULT NULL,
  `is_self` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `domestic_buyer_representatives`
--

CREATE TABLE `domestic_buyer_representatives` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `buyer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `representative_name` varchar(255) DEFAULT NULL,
  `representative_phone` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `employes`
--

CREATE TABLE `employes` (
  `id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `employes`
--

INSERT INTO `employes` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'empl 1', 1, NULL, NULL),
(2, 'emplo 2', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fabric_inwards`
--

CREATE TABLE `fabric_inwards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `vendor_group_id` int(11) DEFAULT NULL,
  `po_id` int(11) DEFAULT NULL,
  `inward_no` varchar(25) DEFAULT NULL,
  `received_date` date DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  `is_inspected` varchar(20) DEFAULT 'No',
  `is_last_piece` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `fabric_inwards`
--

INSERT INTO `fabric_inwards` (`id`, `created_at`, `updated_at`, `vendor_group_id`, `po_id`, `inward_no`, `received_date`, `location_id`, `is_inspected`, `is_last_piece`) VALUES
(2, '2024-11-20 08:20:26', '2024-11-20 08:20:26', 6, 12, '111', '2024-11-23', 1, 'Yes', 1),
(3, '2024-11-26 14:35:55', '2024-11-26 14:35:55', 7, 13, '12', '2024-02-02', 1, 'Yes', 0),
(4, '2024-11-30 16:33:35', '2024-11-30 16:33:35', 7, 13, '2', '2024-11-08', 2, 'Yes', 0);

-- --------------------------------------------------------

--
-- Table structure for table `fabric_inward_details`
--

CREATE TABLE `fabric_inward_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `fabric_inward_id` int(11) DEFAULT NULL,
  `quality_id` int(11) DEFAULT NULL,
  `quality_name` text DEFAULT NULL,
  `char` varchar(100) DEFAULT NULL,
  `piece_no` double DEFAULT NULL,
  `net_piece_mtrs` double DEFAULT NULL,
  `fold` double DEFAULT NULL,
  `piece_meter` double DEFAULT NULL,
  `weight` double DEFAULT NULL,
  `avg_wt` double DEFAULT NULL,
  `picks` double DEFAULT NULL,
  `job_rate` double DEFAULT NULL,
  `grade_id` int(11) DEFAULT NULL,
  `remarks` varchar(100) DEFAULT NULL,
  `is_cutpiece` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `fabric_inward_details`
--

INSERT INTO `fabric_inward_details` (`id`, `created_at`, `updated_at`, `fabric_inward_id`, `quality_id`, `quality_name`, `char`, `piece_no`, `net_piece_mtrs`, `fold`, `piece_meter`, `weight`, `avg_wt`, `picks`, `job_rate`, `grade_id`, `remarks`, `is_cutpiece`) VALUES
(2, '2024-11-20 08:37:47', '2024-11-20 08:37:47', 2, 39, 'ARNEY PD/67\" 00/24LINENX0/36LINEN 50X52 PLAIN', '1', 2, 3, 4, 0.75, 0.75, 5, 6, 7, 3, 'aazzaa', 1),
(3, '2024-11-26 14:35:55', '2024-11-26 14:35:55', 3, 44, '69/69\" 0/36LINENX0/36LINEN 2380.5X69 PLAIN', '2', 2, 2, 2, 2, 2, 2, 2, 2, 3, '22', 1);

-- --------------------------------------------------------

--
-- Table structure for table `fabric_opening_balances`
--

CREATE TABLE `fabric_opening_balances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `vendor_group_id` int(11) DEFAULT NULL,
  `inward_no` varchar(25) DEFAULT NULL,
  `received_date` date DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  `is_inspected` varchar(20) DEFAULT 'No',
  `calculation_from_master` tinyint(1) DEFAULT NULL,
  `is_last_piece` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `fabric_opening_balances`
--

INSERT INTO `fabric_opening_balances` (`id`, `created_at`, `updated_at`, `vendor_group_id`, `inward_no`, `received_date`, `location_id`, `is_inspected`, `calculation_from_master`, `is_last_piece`) VALUES
(2, '2024-11-26 14:41:35', '2024-11-26 14:41:35', 6, '2', '2024-01-31', 1, 'Yes', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `fabric_opening_balance_details`
--

CREATE TABLE `fabric_opening_balance_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `fabric_opening_balance_id` int(11) DEFAULT NULL,
  `quality_id` int(11) DEFAULT NULL,
  `quality_name` text DEFAULT NULL,
  `char` varchar(100) DEFAULT NULL,
  `piece_no` double DEFAULT NULL,
  `net_piece_mtrs` double DEFAULT NULL,
  `fold` double DEFAULT NULL,
  `piece_meter` double DEFAULT NULL,
  `weight` double DEFAULT NULL,
  `avg_wt` double DEFAULT NULL,
  `picks` double DEFAULT NULL,
  `job_rate` double DEFAULT NULL,
  `grade_id` int(11) DEFAULT NULL,
  `job_work_piece_rate` varchar(25) DEFAULT NULL,
  `remarks` varchar(100) DEFAULT NULL,
  `is_cutpiece` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `fabric_opening_balance_details`
--

INSERT INTO `fabric_opening_balance_details` (`id`, `created_at`, `updated_at`, `fabric_opening_balance_id`, `quality_id`, `quality_name`, `char`, `piece_no`, `net_piece_mtrs`, `fold`, `piece_meter`, `weight`, `avg_wt`, `picks`, `job_rate`, `grade_id`, `job_work_piece_rate`, `remarks`, `is_cutpiece`) VALUES
(7, '2025-02-05 08:56:45', '2025-02-05 08:56:45', 2, 40, 'ARNEY PD-BLACK/57\" 00/24LINENX0/36LINEN 1X52 PLAIN', '23', 2121212121, 23, 2, 232, 23223, 2323, 23, 2, 4, '2', '2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `fabric_pos`
--

CREATE TABLE `fabric_pos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `po_number` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `po_date` date DEFAULT NULL,
  `vendor_group_id` int(11) DEFAULT NULL,
  `igst` tinyint(1) DEFAULT 1,
  `cgst_sgst` tinyint(1) DEFAULT NULL,
  `agent_id` int(11) DEFAULT NULL,
  `fabric_type_id` int(11) DEFAULT NULL,
  `so_num_id` int(11) DEFAULT NULL,
  `payment_terms_id` int(11) DEFAULT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `terms_conditions_id` int(11) DEFAULT NULL,
  `consignee_id` int(11) DEFAULT NULL,
  `purchase_type_id` int(11) DEFAULT NULL,
  `company` varchar(250) DEFAULT NULL,
  `customer_so` varchar(250) DEFAULT NULL,
  `is_gst_applicable` int(1) DEFAULT NULL,
  `approval` int(1) DEFAULT NULL,
  `approval_date` date DEFAULT NULL,
  `internal_remark` varchar(250) DEFAULT NULL,
  `customer_instruction` varchar(250) DEFAULT NULL,
  `comments` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `fabric_pos`
--

INSERT INTO `fabric_pos` (`id`, `po_number`, `created_at`, `updated_at`, `po_date`, `vendor_group_id`, `igst`, `cgst_sgst`, `agent_id`, `fabric_type_id`, `so_num_id`, `payment_terms_id`, `vendor_id`, `terms_conditions_id`, `consignee_id`, `purchase_type_id`, `company`, `customer_so`, `is_gst_applicable`, `approval`, `approval_date`, `internal_remark`, `customer_instruction`, `comments`) VALUES
(12, 'FPO-12', '2024-11-18 13:42:27', '2024-11-18 16:51:19', '2024-11-18', 6, 1, NULL, 9, 1, 35, 4, 8, 1, 7, 1, 'domestic', '55', NULL, 1, '2024-11-18', '11', '22', '33'),
(13, 'FPO-13', '2024-11-26 14:31:07', '2024-11-26 14:34:24', '2024-11-27', 7, 1, NULL, 9, 1, 38, 5, 8, 1, 5, 1, 'sez', '2', 0, 1, '2024-11-26', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fabric_po_details`
--

CREATE TABLE `fabric_po_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fabric_po_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `quantity` double DEFAULT NULL,
  `basic_amount` double DEFAULT NULL,
  `igst_val` double DEFAULT NULL,
  `cgst_val` double DEFAULT NULL,
  `sgst_val` double DEFAULT NULL,
  `igst_amount` double DEFAULT NULL,
  `cgst_amount` double DEFAULT 0,
  `sgst_amount` double DEFAULT 0,
  `total_amount` double DEFAULT 0,
  `provisional_freight` double DEFAULT NULL,
  `mill_gst_price` double DEFAULT NULL,
  `final_price` double DEFAULT NULL,
  `delivery_date` date DEFAULT NULL,
  `inr_conversion_value` double DEFAULT NULL,
  `curreny` varchar(250) DEFAULT NULL,
  `quality_id` int(11) DEFAULT NULL,
  `unit_id` int(11) DEFAULT NULL,
  `unit_price` double DEFAULT NULL,
  `remark` text DEFAULT NULL,
  `delivery_term_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `fabric_po_details`
--

INSERT INTO `fabric_po_details` (`id`, `fabric_po_id`, `created_at`, `updated_at`, `quantity`, `basic_amount`, `igst_val`, `cgst_val`, `sgst_val`, `igst_amount`, `cgst_amount`, `sgst_amount`, `total_amount`, `provisional_freight`, `mill_gst_price`, `final_price`, `delivery_date`, `inr_conversion_value`, `curreny`, `quality_id`, `unit_id`, `unit_price`, `remark`, `delivery_term_id`) VALUES
(1, 1, '2024-07-05 10:00:45', '2024-07-16 16:53:58', 3, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 2, '2024-07-16 15:57:42', '2024-08-28 08:44:44', 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 2, '2024-07-17 14:54:03', '2024-08-28 08:44:44', 5, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 3, '2024-08-04 18:25:35', '2024-08-04 18:25:35', 2, 42, NULL, NULL, NULL, NULL, NULL, NULL, 2, 2, 2, 62, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 4, '2024-08-05 06:48:29', '2024-08-05 06:48:29', 1, 2, 0, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 5, '2024-08-07 18:52:41', '2024-08-07 19:16:31', 11, 121, 5, NULL, NULL, 6.05, NULL, NULL, 11, 11, 11, 33, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 5, '2024-08-07 18:55:14', '2024-08-07 18:55:14', 12, 144, 5, NULL, NULL, NULL, NULL, NULL, 12, 12, 12, 36, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 6, '2024-10-06 14:29:23', '2024-10-06 14:29:23', 441, 441, 8, NULL, NULL, 35.28, 0, 0, 6, 11, 12, 24, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 7, '2024-10-29 07:14:15', '2024-10-29 07:14:15', 3, 3, 5, 2.5, 2.5, 0.15, 0.075, 0.075, 32, 21, 35, 5, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 8, '2024-11-01 16:04:10', '2024-11-01 16:04:10', 89, 7921, 5, 2.5, 2.5, 396.05, 198.025, 198.025, NULL, NULL, NULL, NULL, NULL, 89, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 9, '2024-11-01 16:12:10', '2024-11-01 16:12:10', 67, 67, 5, 2.5, 2.5, 3.35, 1.675, 1.675, NULL, NULL, NULL, NULL, NULL, 67, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 10, '2024-11-08 16:08:18', '2024-11-08 16:08:18', 26, 676, 0, 5, 2.5, 0, 33.8, 16.9, 26, 26, 26, 26, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 11, '2024-11-18 13:39:31', '2024-11-18 13:39:31', 2, 5, 5, NULL, NULL, 0.25, NULL, NULL, 120, 1454, 15, 1479, NULL, NULL, NULL, 40, 6, 10, 'aaaaaaa', 6),
(14, 12, '2024-11-18 13:42:27', '2024-11-18 14:08:31', 2, 5, 5, NULL, NULL, 0.25, NULL, NULL, 120, 11, 15, 36, '2024-11-22', NULL, NULL, 40, 6, 10, 'aaaaaaa', NULL),
(15, 13, '2024-11-26 14:31:07', '2024-11-26 14:31:07', 23, NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, 23, NULL, NULL, NULL, NULL, NULL, 44, 6, 2, NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `fabric_po_detail_yarn_certifications`
--

CREATE TABLE `fabric_po_detail_yarn_certifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fabric_po_detail_id` int(11) DEFAULT NULL,
  `yarn_certification_type_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `fabric_po_detail_yarn_certifications`
--

INSERT INTO `fabric_po_detail_yarn_certifications` (`id`, `fabric_po_detail_id`, `yarn_certification_type_id`, `created_at`, `updated_at`) VALUES
(1, 0, 1, '2024-07-05 10:00:45', '2024-07-05 13:26:19'),
(2, 4, 1, '2024-07-09 15:39:06', '2024-07-09 15:39:06'),
(3, 4, 1, '2024-07-09 15:39:06', '2024-07-09 15:39:06'),
(4, 6, 1, '2024-07-09 15:44:52', '2024-07-09 15:44:52'),
(5, 6, NULL, '2024-07-09 15:44:52', '2024-07-09 15:44:52'),
(6, 7, 1, '2024-07-09 15:53:58', '2024-07-09 15:53:58'),
(7, 7, NULL, '2024-07-09 15:53:58', '2024-07-09 15:53:58'),
(8, 8, 1, '2024-07-09 15:55:01', '2024-07-09 15:55:01'),
(9, 8, 1, '2024-07-09 15:55:01', '2024-07-09 15:55:01'),
(24, 10, 1, '2024-08-03 07:51:50', '2024-08-03 07:51:50'),
(27, 12, NULL, '2024-08-03 19:15:02', '2024-08-03 19:15:02'),
(29, 17, NULL, '2024-08-26 11:28:08', '2024-08-26 11:28:08'),
(34, 9, 1, '2024-09-11 16:24:01', '2024-09-11 16:24:01'),
(35, 9, 1, '2024-09-11 16:24:01', '2024-09-11 16:24:01'),
(36, 22, 1, '2024-09-24 15:12:27', '2024-09-24 15:12:27'),
(38, 23, 2, '2024-09-25 09:22:57', '2024-09-25 09:22:57'),
(39, 23, 1, '2024-09-25 09:22:57', '2024-09-25 09:22:57'),
(40, 24, 1, '2024-09-25 09:27:25', '2024-09-25 09:27:25'),
(41, 24, NULL, '2024-09-25 09:27:25', '2024-09-25 09:27:25'),
(43, 25, 1, '2024-10-03 14:42:47', '2024-10-03 14:42:47'),
(44, 26, 1, '2024-10-03 14:44:49', '2024-10-03 14:44:49'),
(45, 26, 2, '2024-10-03 14:44:49', '2024-10-03 14:44:49'),
(46, 27, 1, '2024-10-10 14:15:07', '2024-10-10 14:15:07'),
(47, 27, NULL, '2024-10-10 14:15:07', '2024-10-10 14:15:07'),
(48, 28, 2, '2024-10-10 14:27:36', '2024-10-10 14:27:36'),
(50, 29, NULL, '2024-10-12 03:11:16', '2024-10-12 03:11:16'),
(52, 30, 1, '2024-10-15 09:34:20', '2024-10-15 09:34:20'),
(55, 31, 1, '2024-10-29 12:05:34', '2024-10-29 12:05:34'),
(56, 31, 2, '2024-10-29 12:05:34', '2024-10-29 12:05:34'),
(57, 32, 1, '2024-11-08 16:33:02', '2024-11-08 16:33:02'),
(58, 32, 1, '2024-11-08 16:33:02', '2024-11-08 16:33:02'),
(60, 14, 2, '2024-11-18 14:08:31', '2024-11-18 14:08:31'),
(61, 14, 1, '2024-11-18 14:08:31', '2024-11-18 14:08:31'),
(62, 15, NULL, '2024-11-26 14:31:07', '2024-11-26 14:31:07');

-- --------------------------------------------------------

--
-- Table structure for table `fabric_types`
--

CREATE TABLE `fabric_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `fabric_types`
--

INSERT INTO `fabric_types` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Finished', 1, '2024-07-05 10:00:45', '2024-07-05 13:26:19'),
(2, 'Grey', 1, '2024-10-15 14:59:45', '2024-10-15 14:59:45');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `filaments`
--

CREATE TABLE `filaments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `godown_locations`
--

CREATE TABLE `godown_locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `vendor_group_id` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `zone` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `is_default` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `godown_locations`
--

INSERT INTO `godown_locations` (`id`, `name`, `description`, `location`, `code`, `vendor_group_id`, `type`, `zone`, `status`, `is_default`, `created_at`, `updated_at`) VALUES
(3, 'location 1', '123', 'Yarn Godown', '123', '6', '2', 'dasf', 1, 1, '2025-01-28 18:36:09', '2025-01-28 18:36:09');

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(3, 'PASS', 1, NULL, NULL),
(4, 'B', 1, NULL, NULL),
(5, 'C', 1, NULL, NULL),
(6, 'R', 1, NULL, NULL),
(7, 'HOLD', 1, NULL, NULL),
(8, 'FAIL', 1, NULL, NULL),
(9, 'LAB', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `group_types`
--

CREATE TABLE `group_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `group_types`
--

INSERT INTO `group_types` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Yarn Supplier', 1, '2024-07-05 10:00:45', '2024-07-05 13:26:19'),
(2, 'Item Supplier', 1, NULL, NULL),
(3, 'Weaver', 1, NULL, NULL),
(4, 'Sizing', 1, NULL, NULL),
(5, 'Winding', 1, NULL, NULL),
(6, 'Buyer', 1, NULL, NULL),
(7, 'Fabric Supplier', 1, NULL, NULL),
(8, 'Process JW', 1, NULL, NULL),
(9, 'All', 1, NULL, '2024-09-12 12:21:18');

-- --------------------------------------------------------

--
-- Table structure for table `gst_registered_types`
--

CREATE TABLE `gst_registered_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `gst_registered_types`
--

INSERT INTO `gst_registered_types` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(8, 'UnRegistered B2B', 1, '2024-09-12 12:09:55', '2024-09-12 12:09:55'),
(9, 'Export', 1, '2024-09-12 12:10:02', '2024-09-12 12:10:02'),
(17, 'Registered B2B', 1, '2024-10-11 05:35:51', '2024-10-11 05:35:51'),
(18, 'SEZ', 1, '2024-10-11 05:36:04', '2024-10-11 05:37:31');

-- --------------------------------------------------------

--
-- Table structure for table `g_s_t_s`
--

CREATE TABLE `g_s_t_s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gst_type` varchar(255) DEFAULT NULL,
  `igst` varchar(255) NOT NULL DEFAULT '0',
  `sgst` varchar(255) NOT NULL DEFAULT '0',
  `cgst` varchar(255) NOT NULL DEFAULT '0',
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `g_s_t_s`
--

INSERT INTO `g_s_t_s` (`id`, `gst_type`, `igst`, `sgst`, `cgst`, `status`, `created_at`, `updated_at`) VALUES
(10, '2', '0.00', '5.0', '5.0', 1, '2025-01-08 12:26:20', '2025-01-08 12:26:20'),
(11, '2', '0.00', '6.0', '6.0', 1, '2025-01-08 12:26:40', '2025-01-08 12:26:40'),
(12, '2', '0.00', '0.0', '0.0', 1, '2025-01-08 12:26:56', '2025-01-08 12:26:56'),
(13, '1', '0.0', '0.00', '0.00', 1, '2025-01-08 12:27:13', '2025-01-08 12:27:13'),
(14, '2', '0.00', '2.5', '2.5', 1, '2025-01-08 12:27:36', '2025-01-08 12:27:36'),
(15, '1', '5.0', '0.00', '0.00', 1, '2025-01-08 12:27:58', '2025-01-08 12:27:58');

-- --------------------------------------------------------

--
-- Table structure for table `hairiness`
--

CREATE TABLE `hairiness` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `hairiness`
--

INSERT INTO `hairiness` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Hairiness 1D', 1, '2024-07-05 10:00:45', '2024-08-28 08:45:03');

-- --------------------------------------------------------

--
-- Table structure for table `inspections`
--

CREATE TABLE `inspections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `jobwork_fabric_receive_detail_id` int(11) DEFAULT NULL,
  `jobwork_finished_fabric_receive_detail_id` int(11) DEFAULT NULL,
  `fabric_inward_detail_id` int(11) DEFAULT NULL,
  `fabric_opening_balance_detail_id` int(11) DEFAULT NULL,
  `quality_id` int(11) DEFAULT NULL,
  `width` double DEFAULT NULL,
  `inspection_date` date DEFAULT NULL,
  `epi` varchar(150) DEFAULT NULL,
  `ppi` varchar(150) DEFAULT NULL,
  `weft_count` varchar(250) DEFAULT NULL,
  `warp_count` varchar(250) DEFAULT NULL,
  `shift` varchar(150) DEFAULT NULL,
  `remark` varchar(150) DEFAULT NULL,
  `packing_type_id` int(11) DEFAULT NULL,
  `is_first_meter_inspection` tinyint(1) DEFAULT NULL,
  `is_last_piece` tinyint(1) DEFAULT NULL,
  `checker_id` int(11) DEFAULT NULL,
  `vendor_group_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `inspections`
--

INSERT INTO `inspections` (`id`, `created_at`, `updated_at`, `jobwork_fabric_receive_detail_id`, `jobwork_finished_fabric_receive_detail_id`, `fabric_inward_detail_id`, `fabric_opening_balance_detail_id`, `quality_id`, `width`, `inspection_date`, `epi`, `ppi`, `weft_count`, `warp_count`, `shift`, `remark`, `packing_type_id`, `is_first_meter_inspection`, `is_last_piece`, `checker_id`, `vendor_group_id`) VALUES
(1, '2024-07-24 15:18:43', '2024-07-24 15:18:43', NULL, NULL, NULL, NULL, 1, 7, '2024-07-26', NULL, '7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, '2024-07-24 15:19:30', '2024-07-24 15:19:30', NULL, NULL, NULL, NULL, 1, 7, '2024-07-26', NULL, '7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, '2024-08-05 10:12:48', '2024-08-05 10:12:48', NULL, NULL, NULL, NULL, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, '2024-08-08 13:56:58', '2024-08-08 13:56:58', NULL, NULL, NULL, NULL, 14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, '2024-10-06 15:59:19', '2024-10-11 11:32:22', NULL, NULL, NULL, NULL, 37, NULL, '2024-10-26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, '2024-10-19 15:48:20', '2024-10-19 15:48:20', NULL, NULL, NULL, NULL, 44, 69, '2026-02-01', '69', '69', '69', '69', NULL, NULL, 1, NULL, NULL, 1, 7),
(7, '2024-10-21 14:28:41', '2024-10-21 15:08:38', 18, NULL, NULL, NULL, 44, NULL, '2024-10-23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, '2024-10-26 22:26:53', '2024-10-26 22:26:53', NULL, 24, NULL, NULL, 39, NULL, '2024-10-26', '50', '52', '36', '24.0', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, '2024-11-04 16:18:27', '2024-11-04 16:18:27', 25, NULL, NULL, NULL, 44, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, '2024-11-21 16:28:51', '2024-11-21 16:28:51', 2, NULL, NULL, NULL, 39, 11, NULL, '22', '33', '44', '55', NULL, 'AZAZAZ', 1, NULL, NULL, 1, 6),
(11, '2024-11-21 16:31:49', '2024-11-21 16:31:49', NULL, NULL, 2, NULL, 39, 11, NULL, '22', '33', '44', '55', NULL, '66', 1, NULL, NULL, NULL, NULL),
(12, '2024-11-26 16:23:55', '2024-11-26 16:23:55', 26, NULL, NULL, NULL, 44, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, '2024-11-30 16:15:28', '2024-11-30 16:15:28', 27, NULL, NULL, NULL, 46, NULL, '2024-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, '2024-11-30 16:27:18', '2024-11-30 16:27:18', NULL, NULL, 3, NULL, 44, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, '2024-12-09 09:01:02', '2024-12-09 09:01:02', 24, NULL, NULL, NULL, 40, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, '2025-01-08 05:59:41', '2025-01-08 05:59:41', 17, NULL, NULL, NULL, 39, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, '2025-01-18 08:57:07', '2025-01-18 08:57:07', 28, NULL, NULL, NULL, 47, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, '2025-02-03 05:23:06', '2025-02-03 05:23:06', NULL, 26, NULL, NULL, 48, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `inspection_details`
--

CREATE TABLE `inspection_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `inspection_id` int(11) DEFAULT NULL,
  `piece_no` varchar(100) DEFAULT NULL,
  `inward_meters` int(11) DEFAULT NULL,
  `after_fold_length` int(11) DEFAULT NULL,
  `shortage_excess_quantity` int(11) DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `avg_weight` int(11) DEFAULT NULL,
  `measured_width_in_inches` int(11) DEFAULT NULL,
  `total_defect` int(11) DEFAULT NULL,
  `defect_point` int(11) DEFAULT NULL,
  `grade_id` int(11) DEFAULT NULL,
  `batch` varchar(100) DEFAULT NULL,
  `fent` int(11) DEFAULT NULL,
  `fold` int(11) DEFAULT NULL,
  `total_mtrs` int(11) DEFAULT NULL,
  `is_sample` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `inspection_details`
--

INSERT INTO `inspection_details` (`id`, `created_at`, `updated_at`, `inspection_id`, `piece_no`, `inward_meters`, `after_fold_length`, `shortage_excess_quantity`, `weight`, `avg_weight`, `measured_width_in_inches`, `total_defect`, `defect_point`, `grade_id`, `batch`, `fent`, `fold`, `total_mtrs`, `is_sample`) VALUES
(1, '2024-07-24 15:18:43', '2024-07-24 15:18:43', 1, '2', 7, 7, 7, -1, NULL, 7, NULL, NULL, 3, '7', 7, 7, NULL, NULL),
(2, '2024-07-24 15:19:30', '2024-07-24 15:19:30', 2, '2', 7, 7, 7, -1, NULL, 7, NULL, NULL, 3, '7', 7, 7, NULL, NULL),
(3, '2024-08-08 13:56:58', '2024-08-08 13:57:15', 4, '113', 113, 6, 0, 113, 12, 12, 12, 12, 6, '12', 12, 20, 12, 0),
(4, '2024-10-06 15:59:19', '2024-10-06 15:59:19', 5, '1', 1, 1, 0, 1, 1, 1, 1, 1, NULL, '1', 1, 1, 23, 1),
(5, '2024-10-19 15:48:20', '2024-10-21 13:41:26', 6, '69', 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 25, 0),
(6, '2024-10-21 14:28:41', '2024-10-21 15:12:02', 7, '69', 0, 0, 0, 0, NULL, NULL, NULL, NULL, 7, NULL, NULL, NULL, NULL, 0),
(7, '2024-10-26 22:26:53', '2024-10-26 22:28:02', 8, '11', 11, 11, 0, 0, NULL, NULL, NULL, NULL, 6, NULL, NULL, 11, NULL, 0),
(8, '2024-11-04 16:18:27', '2024-11-04 16:18:27', 9, '26', 26, 1, 0, 26, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 26, NULL, NULL),
(9, '2024-11-21 16:28:51', '2024-11-21 16:28:51', 10, '2', 3, 1, 0, 5, NULL, NULL, NULL, NULL, 3, NULL, NULL, 4, NULL, NULL),
(10, '2024-11-21 16:31:49', '2024-11-21 16:31:49', 11, '2', 3, 1, 0, 5, NULL, NULL, NULL, NULL, 3, NULL, NULL, 4, NULL, NULL),
(11, '2024-11-26 16:23:55', '2024-11-26 16:23:55', 12, '23', 23, 1, 0, 23, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 23, NULL, NULL),
(12, '2024-11-30 16:15:28', '2024-11-30 16:15:28', 13, '22', 22, 1, 0, 22, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 22, NULL, NULL),
(13, '2024-11-30 16:27:18', '2024-11-30 16:27:18', 14, '2', 2, 2, 0, 2, NULL, NULL, NULL, NULL, 3, NULL, NULL, 2, NULL, NULL),
(14, '2024-12-09 09:01:02', '2024-12-09 09:01:02', 15, '69', 0, 0, 0, 0, NULL, 112312121, 212121, 1212111, 3, NULL, NULL, NULL, NULL, NULL),
(15, '2025-01-08 05:59:41', '2025-01-08 05:59:41', 16, '1', 1, 1, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
(16, '2025-01-18 08:57:07', '2025-01-18 08:57:07', 17, 'HST-01', 1750, 1750, 0, 15, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
(17, '2025-02-03 05:23:06', '2025-02-03 05:23:06', 18, '2025', 10, 10, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `inspection_detail_variations`
--

CREATE TABLE `inspection_detail_variations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `inspection_detail_id` int(11) DEFAULT NULL,
  `variation` int(11) DEFAULT NULL,
  `from_mtrs` int(11) DEFAULT NULL,
  `to_mtrs` int(11) DEFAULT NULL,
  `reason_id` int(11) DEFAULT NULL,
  `defect_points` int(11) DEFAULT NULL,
  `weaver_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `inspection_detail_variations`
--

INSERT INTO `inspection_detail_variations` (`id`, `created_at`, `updated_at`, `inspection_detail_id`, `variation`, `from_mtrs`, `to_mtrs`, `reason_id`, `defect_points`, `weaver_id`) VALUES
(1, '2024-07-24 15:19:30', '2024-07-24 15:19:30', 2, NULL, NULL, NULL, NULL, NULL, NULL),
(2, '2024-07-24 15:19:30', '2024-07-24 15:19:30', 2, NULL, NULL, NULL, NULL, NULL, NULL),
(3, '2024-07-24 15:29:21', '2024-07-24 15:29:21', 2, 3, 3, 3, NULL, 3, 1),
(4, '2024-07-24 15:29:47', '2024-07-24 15:29:47', 2, 7, 7, 7, NULL, 7, 1),
(5, '2024-07-24 15:31:32', '2024-07-24 15:31:32', 2, 5, 6, 6, NULL, 6, NULL),
(6, '2024-10-06 15:59:19', '2024-10-06 15:59:19', NULL, 1, 1, 1, NULL, 1, 1),
(7, '2024-10-19 15:48:20', '2024-10-19 15:48:20', NULL, 69, 69, 69, NULL, 69, 6),
(8, '2024-11-30 16:15:28', '2024-11-30 16:15:28', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `inspection_types`
--

CREATE TABLE `inspection_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `inspection_types`
--

INSERT INTO `inspection_types` (`id`, `name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(3, '4 POINT SYSTEM', '0', 1, '2024-08-06 12:06:22', '2024-08-06 12:06:22');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cloth_challan_id` int(11) DEFAULT NULL,
  `invoice_number` varchar(100) DEFAULT NULL,
  `approval` int(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `approval_date` date DEFAULT NULL,
  `internal_remark` varchar(150) DEFAULT NULL,
  `customer_instruction` varchar(150) DEFAULT NULL,
  `comments` varchar(150) DEFAULT NULL,
  `exporter_id` varchar(250) DEFAULT NULL,
  `invoice_date` date DEFAULT NULL,
  `exporter_ref` varchar(150) DEFAULT NULL,
  `so_no` varchar(150) DEFAULT NULL,
  `reuse_deleted_invoice` tinyint(1) DEFAULT NULL,
  `lc_no` varchar(150) DEFAULT NULL,
  `lc_date` date DEFAULT NULL,
  `company_bank_id` int(11) DEFAULT NULL,
  `other_reference` varchar(200) DEFAULT NULL,
  `term_of_price_id` int(11) DEFAULT NULL,
  `mode_of_shipment` varchar(150) DEFAULT NULL,
  `buyer` varchar(150) DEFAULT NULL,
  `buyer_if_other_than_consignee` varchar(150) DEFAULT NULL,
  `buyer_id` int(11) DEFAULT NULL,
  `buyer_description` varchar(150) DEFAULT NULL,
  `to_order` varchar(150) DEFAULT NULL,
  `Notify_id` int(11) DEFAULT NULL,
  `challan_number` varchar(150) DEFAULT NULL,
  `country_of_origin_of_goods` varchar(150) DEFAULT NULL,
  `destination_country_id` int(11) DEFAULT NULL,
  `pre_carriage_by_id` int(11) DEFAULT NULL,
  `place_of_receipt_by_pre_carrier` varchar(150) DEFAULT NULL,
  `vehicle_flight_number` varchar(150) DEFAULT NULL,
  `port_of_loading_id` int(11) DEFAULT NULL,
  `port_of_loading_details` varchar(150) DEFAULT NULL,
  `port_of_discharge_id` int(11) DEFAULT NULL,
  `final_destination_id` int(11) DEFAULT NULL,
  `container_no` varchar(150) DEFAULT NULL,
  `container_size_id` int(11) DEFAULT NULL,
  `forwarder_id` int(11) DEFAULT NULL,
  `line_name_id` int(11) DEFAULT NULL,
  `agent_id` int(11) DEFAULT NULL,
  `agent_percent` varchar(150) DEFAULT NULL,
  `licence_type` varchar(150) DEFAULT NULL,
  `licence_number_id` int(11) DEFAULT NULL,
  `epcg_license_number` varchar(150) DEFAULT NULL,
  `epcg_license_holder` varchar(150) DEFAULT NULL,
  `terms_of_delivery_and_payment` varchar(150) DEFAULT NULL,
  `chipper_seal_number` varchar(150) DEFAULT NULL,
  `vehicle_number` varchar(150) DEFAULT NULL,
  `rfid_seal_number` varchar(150) DEFAULT NULL,
  `transportation_id` int(11) DEFAULT NULL,
  `container_type_id` int(11) DEFAULT NULL,
  `sales_type_id` int(11) DEFAULT NULL,
  `lr_no` varchar(150) DEFAULT NULL,
  `lr_date` date DEFAULT NULL,
  `add` double DEFAULT NULL,
  `less` double DEFAULT NULL,
  `total_tax` double DEFAULT NULL,
  `total_amount` double DEFAULT NULL,
  `insurance` varchar(150) DEFAULT NULL,
  `freight` varchar(150) DEFAULT NULL,
  `commission` varchar(150) DEFAULT NULL,
  `inr_value` varchar(150) DEFAULT NULL,
  `insurance_hsn` varchar(150) DEFAULT NULL,
  `freight_hsn` varchar(150) DEFAULT NULL,
  `currency_convertion_value` varchar(150) DEFAULT NULL,
  `including_gst_inr_value` varchar(150) DEFAULT NULL,
  `bale_role_no_range` varchar(150) DEFAULT NULL,
  `igst_lut` varchar(150) DEFAULT NULL,
  `lc_bank_id` int(11) DEFAULT NULL,
  `dbk` varchar(150) DEFAULT NULL,
  `ritc` varchar(150) DEFAULT NULL,
  `place` varchar(150) DEFAULT NULL,
  `documents_delivered` varchar(150) DEFAULT NULL,
  `company_logo` varchar(150) DEFAULT NULL,
  `amount_chargable` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `cloth_challan_id`, `invoice_number`, `approval`, `created_at`, `updated_at`, `approval_date`, `internal_remark`, `customer_instruction`, `comments`, `exporter_id`, `invoice_date`, `exporter_ref`, `so_no`, `reuse_deleted_invoice`, `lc_no`, `lc_date`, `company_bank_id`, `other_reference`, `term_of_price_id`, `mode_of_shipment`, `buyer`, `buyer_if_other_than_consignee`, `buyer_id`, `buyer_description`, `to_order`, `Notify_id`, `challan_number`, `country_of_origin_of_goods`, `destination_country_id`, `pre_carriage_by_id`, `place_of_receipt_by_pre_carrier`, `vehicle_flight_number`, `port_of_loading_id`, `port_of_loading_details`, `port_of_discharge_id`, `final_destination_id`, `container_no`, `container_size_id`, `forwarder_id`, `line_name_id`, `agent_id`, `agent_percent`, `licence_type`, `licence_number_id`, `epcg_license_number`, `epcg_license_holder`, `terms_of_delivery_and_payment`, `chipper_seal_number`, `vehicle_number`, `rfid_seal_number`, `transportation_id`, `container_type_id`, `sales_type_id`, `lr_no`, `lr_date`, `add`, `less`, `total_tax`, `total_amount`, `insurance`, `freight`, `commission`, `inr_value`, `insurance_hsn`, `freight_hsn`, `currency_convertion_value`, `including_gst_inr_value`, `bale_role_no_range`, `igst_lut`, `lc_bank_id`, `dbk`, `ritc`, `place`, `documents_delivered`, `company_logo`, `amount_chargable`) VALUES
(1, 1, 'invoice-1', 1, '2024-07-05 10:00:45', '2024-07-05 13:26:19', NULL, NULL, NULL, NULL, 'SEZ', '2024-08-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, NULL, 'invoice-2', -1, NULL, '2024-08-29 16:06:35', '2024-08-29', NULL, NULL, NULL, NULL, '2024-08-02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, NULL, 'invoice-3', 0, '2024-08-26 11:32:15', '2024-08-29 15:55:19', '2024-08-29', 'AA', 'ZZ', 'EE', NULL, '2024-08-03', 'a', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'acceptence', 'logo', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `invoice_additionals`
--

CREATE TABLE `invoice_additionals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `invoice_id` int(11) DEFAULT NULL,
  `type` varchar(150) DEFAULT NULL,
  `value` double DEFAULT NULL,
  `percent` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_discounts`
--

CREATE TABLE `invoice_discounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `invoice_id` int(11) DEFAULT NULL,
  `type` varchar(150) DEFAULT NULL,
  `value` double DEFAULT NULL,
  `percent` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_others`
--

CREATE TABLE `invoice_others` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `invoice_id` int(11) DEFAULT NULL,
  `sales_order_id` int(11) DEFAULT NULL,
  `polds_date_id` int(11) DEFAULT NULL,
  `quantity` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_settings`
--

CREATE TABLE `invoice_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `invoice_settings`
--

INSERT INTO `invoice_settings` (`id`, `key`, `value`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Inv', 'HST Private limited', 1, '2024-06-24 06:47:04', '2024-09-06 15:16:04'),
(3, 'cc', '2', 1, '2024-09-13 15:19:04', '2024-09-13 15:19:04'),
(4, '335356', '54587', 1, '2024-09-13 15:19:13', '2024-09-13 15:19:13'),
(5, 'ds', 'fdsaf', 1, '2024-09-20 14:29:46', '2024-09-20 14:29:46');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_types`
--

CREATE TABLE `invoice_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(250) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `invoice_types`
--

INSERT INTO `invoice_types` (`id`, `created_at`, `updated_at`, `name`, `status`) VALUES
(1, NULL, NULL, 'SEZ', 1),
(2, NULL, NULL, 'DOMESTIC', 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `jobwork_fabric_receives`
--

CREATE TABLE `jobwork_fabric_receives` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `jobwork_id` int(11) DEFAULT NULL,
  `pick_rate` double DEFAULT NULL,
  `slip_no` varchar(100) DEFAULT NULL,
  `received_date` date DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  `chk_name_id` int(11) DEFAULT NULL,
  `chk_no` int(11) DEFAULT NULL,
  `picks` int(11) DEFAULT NULL,
  `unit_no` double DEFAULT NULL,
  `total_beam_inward_mtrs` double DEFAULT NULL,
  `total_fabric_receive_ptrs` double DEFAULT NULL,
  `balance_mtrs` double DEFAULT NULL,
  `is_last_piece` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `jobwork_fabric_receives`
--

INSERT INTO `jobwork_fabric_receives` (`id`, `created_at`, `updated_at`, `vendor_id`, `jobwork_id`, `pick_rate`, `slip_no`, `received_date`, `location_id`, `chk_name_id`, `chk_no`, `picks`, `unit_no`, `total_beam_inward_mtrs`, `total_fabric_receive_ptrs`, `balance_mtrs`, `is_last_piece`) VALUES
(1, '2024-07-21 16:55:56', '2024-07-21 16:55:56', 1, 1, 22, '232-232', '2024-07-12', 1, 1, 232, 3, 2, NULL, NULL, NULL, 0),
(2, '2024-07-21 16:56:30', '2024-07-24 18:01:29', 1, 1, 223, '232-23233', '2024-07-12', 1, 1, 232, 33, 23, NULL, NULL, NULL, 0),
(3, '2024-08-05 07:32:00', '2024-08-05 07:32:00', 1, 1, 1, '1', '2024-12-31', 1, 1, 2, 1, 12, NULL, NULL, NULL, 12),
(4, '2024-08-08 11:53:49', '2024-08-29 12:04:13', 2, 10, 113, '113', '2024-08-08', 2, 2, 113, 113, 113, NULL, NULL, NULL, 1),
(5, '2024-10-06 15:55:28', '2024-10-11 11:11:56', 8, 11, 1, '10', '2025-03-01', 8, 1, 10, NULL, NULL, NULL, NULL, NULL, 1),
(6, '2024-10-12 10:55:09', '2024-10-12 10:55:09', 8, 12, 0, '1', NULL, 8, 1, 1, 1, 1, NULL, NULL, NULL, 0),
(7, '2024-10-15 16:31:14', '2024-10-15 16:31:14', 8, 12, 0.21, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(8, '2024-10-19 15:42:47', '2024-10-29 11:46:19', 10, 14, 69, '69', '2027-04-02', 8, 2, 69, NULL, NULL, NULL, NULL, NULL, 1),
(9, '2024-11-04 16:11:23', '2024-11-04 16:11:23', 10, 14, 69, '69', '2024-01-01', 2, 2, 65, 69, 56, NULL, NULL, NULL, 0),
(10, '2024-11-08 16:28:47', '2024-11-08 16:28:47', 9, 15, 26, '23', '2024-12-01', 2, 1, 12, 52, 12, NULL, NULL, NULL, 0),
(11, '2024-11-30 16:14:54', '2024-11-30 16:14:54', 10, 17, 22, '22', '2024-01-01', 2, 2, 22, 22, NULL, NULL, NULL, NULL, 0),
(12, '2025-01-18 08:50:23', '2025-01-18 08:50:23', 8, 18, 0, '1', '2025-01-18', 1, 1, 0, 50, NULL, NULL, NULL, NULL, 0),
(13, '2025-02-03 11:21:58', '2025-02-03 11:21:58', 8, 15, 26, '12', '2025-01-01', 1, 1, 12, 52, 12, NULL, NULL, NULL, 0),
(14, '2025-02-05 05:10:59', '2025-02-05 05:10:59', 8, 16, 12, '12', '2025-02-12', 1, 2, 12, NULL, NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `jobwork_fabric_receive_details`
--

CREATE TABLE `jobwork_fabric_receive_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `jobwork_fabric_receive_id` int(11) DEFAULT NULL,
  `quality_id` int(11) DEFAULT NULL,
  `char` varchar(100) DEFAULT NULL,
  `piece_no` double DEFAULT NULL,
  `vendor_piece_number` double DEFAULT NULL,
  `net_piece_mtrs` double DEFAULT NULL,
  `fold` double DEFAULT NULL,
  `piece_meter` double DEFAULT NULL,
  `weight` double DEFAULT NULL,
  `avg_wt` double DEFAULT NULL,
  `picks` double DEFAULT NULL,
  `job_rate` double DEFAULT NULL,
  `grade` varchar(100) DEFAULT NULL,
  `remarks` varchar(100) DEFAULT NULL,
  `is_cutpiece` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `jobwork_fabric_receive_details`
--

INSERT INTO `jobwork_fabric_receive_details` (`id`, `created_at`, `updated_at`, `jobwork_fabric_receive_id`, `quality_id`, `char`, `piece_no`, `vendor_piece_number`, `net_piece_mtrs`, `fold`, `piece_meter`, `weight`, `avg_wt`, `picks`, `job_rate`, `grade`, `remarks`, `is_cutpiece`) VALUES
(1, '2024-07-21 16:55:56', '2024-07-21 16:55:56', 1, 1, '2', 3, 3, 3, 3, 3, 3, 3, 3, 3, 'PASS', '3', 1),
(2, '2024-07-21 16:55:56', '2024-07-21 16:55:56', 1, 1, '5', 5, 5, 5, 15, 5, 5, 5, 5, 5, 'R', '5', NULL),
(10, '2024-07-24 18:01:29', '2024-07-24 18:01:29', 2, 1, '4', 4, 4, 4, 2, 2, 2, 2, 2, 2, 'C', '2', 1),
(11, '2024-08-05 07:32:00', '2024-08-05 07:32:00', 3, 6, '1', 1, 1, 1, 1, 1, 1, 1, 1, 1, 'C', '1', 1),
(14, '2024-08-29 12:04:13', '2024-08-29 12:04:13', 4, 14, '113', 113, 113, 113, 20, 5.65, 113, 113, 113, 113, 'B', '113', 1),
(16, '2024-10-11 11:11:56', '2024-10-11 11:11:56', 5, 37, '1', 1, 1, 1, 1, 1, 1, 1, 1, 1, NULL, '1', 1),
(17, '2024-10-12 10:55:09', '2024-10-12 10:55:09', 6, 39, '1', 1, 1, 1, 1, 1, 1, 1, 1, 1, 'PASS', NULL, 0),
(24, '2024-10-29 11:46:27', '2024-10-29 11:46:27', 8, 40, NULL, 69, 69, NULL, NULL, NULL, 69, NULL, 69, NULL, 'PASS', NULL, 0),
(25, '2024-11-04 16:11:23', '2024-11-04 16:11:23', 9, 44, '26', 26, 26, 26, 26, 1, 1, 26, 26, 26, 'PASS', '26', 1),
(26, '2024-11-08 16:28:47', '2024-11-08 16:28:47', 10, 44, '26', 23, 23, 23, 23, 1, 1, 23, 23, 23, NULL, '23', 1),
(27, '2024-11-30 16:14:54', '2024-11-30 16:14:54', 11, 46, '22', 22, 22, 22, 22, 1, 1, 22, 22, 22, NULL, '222', 0),
(28, '2025-01-18 08:50:23', '2025-01-18 08:50:23', 12, 47, '1', 1, 1, 1750, 1, 1750, 1750, 15, 0, 0, 'PASS', '0', 0),
(29, '2025-02-03 11:21:58', '2025-02-03 11:21:58', 13, 40, '12', 12, 12, 12, 12, 1, 1, 12, 12, 12, NULL, '12', 0),
(30, '2025-02-05 05:10:59', '2025-02-05 05:10:59', 14, 48, '1', 1, 1, 1, 1, 1, 1, 1, 1, 1, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `jobwork_finished_fabric_receives`
--

CREATE TABLE `jobwork_finished_fabric_receives` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `jobwork_process_contract_id` int(11) DEFAULT NULL,
  `slip_no` varchar(100) DEFAULT NULL,
  `received_date` date DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  `chk_no` double DEFAULT NULL,
  `chk_id` int(11) DEFAULT NULL,
  `ent_no` varchar(100) DEFAULT NULL,
  `lot_number` varchar(100) DEFAULT NULL,
  `is_last_piece` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `jobwork_finished_fabric_receives`
--

INSERT INTO `jobwork_finished_fabric_receives` (`id`, `created_at`, `updated_at`, `vendor_id`, `jobwork_process_contract_id`, `slip_no`, `received_date`, `location_id`, `chk_no`, `chk_id`, `ent_no`, `lot_number`, `is_last_piece`) VALUES
(3, '2024-10-19 16:02:59', '2024-10-19 16:03:24', 10, 3, '69', '2027-01-02', 10, 69, NULL, NULL, '333', 0),
(4, '2024-11-04 17:07:09', '2024-11-04 17:07:09', 8, 2, '26', '2024-01-01', 8, 356, NULL, NULL, NULL, 0),
(5, '2024-11-30 16:23:39', '2024-11-30 16:23:39', 10, 7, '22', '2025-02-01', 10, 2, NULL, NULL, NULL, 0),
(6, '2025-01-31 18:53:43', '2025-01-31 18:53:43', 8, 5, '252', '2025-01-01', 8, NULL, NULL, NULL, NULL, 0),
(8, '2025-02-05 07:55:05', '2025-02-05 07:55:05', 10, 8, '1', NULL, NULL, NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `jobwork_finished_fabric_receive_details`
--

CREATE TABLE `jobwork_finished_fabric_receive_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `jobwork_finished_fabric_receive_id` int(11) DEFAULT NULL,
  `quality_id` int(11) DEFAULT NULL,
  `design_id` int(11) DEFAULT NULL,
  `char` varchar(100) DEFAULT NULL,
  `piece_no` int(11) DEFAULT NULL,
  `vendor_piece_number` int(11) DEFAULT NULL,
  `vendor_lot_number` varchar(100) DEFAULT NULL,
  `issued_mtrs` int(11) DEFAULT NULL,
  `piece_meter` int(11) DEFAULT NULL,
  `fold` int(11) DEFAULT NULL,
  `net_piece_mtrs` int(11) DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `remarks` varchar(250) DEFAULT NULL,
  `is_cutpiece` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `jobwork_finished_fabric_receive_details`
--

INSERT INTO `jobwork_finished_fabric_receive_details` (`id`, `created_at`, `updated_at`, `jobwork_finished_fabric_receive_id`, `quality_id`, `design_id`, `char`, `piece_no`, `vendor_piece_number`, `vendor_lot_number`, `issued_mtrs`, `piece_meter`, `fold`, `net_piece_mtrs`, `weight`, `remarks`, `is_cutpiece`) VALUES
(24, '2024-10-21 10:09:08', '2024-10-21 10:09:08', 3, 1, NULL, '11', 11, 11, '12', 11, 11, 11, 11, 11, '11', 0),
(27, '2025-02-03 11:13:15', '2025-02-03 11:13:15', 4, 40, NULL, '1', 1, 1, '1', 11, 1, 1, 1, 1, '1', 0),
(28, '2025-02-03 11:13:30', '2025-02-03 11:13:30', 5, 48, NULL, '22', 22, 222, '22', 2, 2, 2, 2, 2, '2', 0),
(29, '2025-02-05 07:55:05', '2025-02-05 07:55:05', 8, 48, NULL, '1', 1, 1, '1', 1, 1, 1, 1, 1, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `jobwork_process_contracts`
--

CREATE TABLE `jobwork_process_contracts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `booking_date` date DEFAULT NULL,
  `process_id` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `contract_number` varchar(100) DEFAULT NULL,
  `contract_date` date DEFAULT NULL,
  `agent_id` int(11) DEFAULT NULL,
  `contact_person_1_id` int(11) DEFAULT NULL,
  `contact_person_2_id` int(11) DEFAULT NULL,
  `rate_per_meter` double DEFAULT NULL,
  `delivery_date` date DEFAULT NULL,
  `inspection_type_id` int(11) DEFAULT NULL,
  `payment_term_id` int(11) DEFAULT NULL,
  `order_mtrs` double DEFAULT NULL,
  `transport_id` int(11) DEFAULT NULL,
  `delivery_location_id` int(11) DEFAULT NULL,
  `wastage` double DEFAULT NULL,
  `sort_id` int(11) DEFAULT NULL,
  `is_opening_contract` tinyint(1) DEFAULT NULL,
  `gst_type` varchar(100) DEFAULT NULL,
  `terms_condition_id` int(11) DEFAULT NULL,
  `remarks_1` varchar(250) DEFAULT NULL,
  `taxable_amount` double DEFAULT NULL,
  `gst_percent` double DEFAULT NULL,
  `igst_amount` double DEFAULT NULL,
  `sgst_amount` double DEFAULT NULL,
  `cgst_amount` double DEFAULT NULL,
  `grand_total` double DEFAULT NULL,
  `approval` int(11) DEFAULT NULL,
  `approval_date` text DEFAULT NULL,
  `internal_remark` varchar(250) DEFAULT NULL,
  `customer_instruction` varchar(250) DEFAULT NULL,
  `comments` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `jobwork_process_contracts`
--

INSERT INTO `jobwork_process_contracts` (`id`, `created_at`, `updated_at`, `booking_date`, `process_id`, `group_id`, `vendor_id`, `contract_number`, `contract_date`, `agent_id`, `contact_person_1_id`, `contact_person_2_id`, `rate_per_meter`, `delivery_date`, `inspection_type_id`, `payment_term_id`, `order_mtrs`, `transport_id`, `delivery_location_id`, `wastage`, `sort_id`, `is_opening_contract`, `gst_type`, `terms_condition_id`, `remarks_1`, `taxable_amount`, `gst_percent`, `igst_amount`, `sgst_amount`, `cgst_amount`, `grand_total`, `approval`, `approval_date`, `internal_remark`, `customer_instruction`, `comments`) VALUES
(1, '2024-07-24 15:55:58', '2024-07-24 18:02:01', '2024-07-12', 1, 1, 1, '2323', '2024-07-06', NULL, NULL, 1, 3, NULL, NULL, 2, 3, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, 222, 1, 33, 22, 22, 33, 1, '2024-07-24', '2222', NULL, NULL),
(2, '2024-08-08 14:33:09', '2024-10-12 11:09:19', '2024-08-08', 2, 7, 10, '1', '2024-08-08', 9, 2, 2, 23, '2024-08-08', 3, 3, 23, 4, NULL, 23, NULL, NULL, 'sgst_cgst', 1, NULL, 32, 0, 23, NULL, 23, 322, 1, '2024-08-08', 'sss', 'ddd', 'fff'),
(3, '2024-10-19 15:49:01', '2024-10-24 12:01:23', '2027-02-01', 2, 7, 10, '69', '2026-02-02', 10, 1, 1, 69, '2026-03-01', 3, 7, 69, 4, NULL, NULL, NULL, NULL, 'igst', NULL, NULL, 0.1, 5, 0, 0, 0, 0.1, 1, '2024-11-19', NULL, NULL, NULL),
(4, '2024-11-04 16:20:14', '2024-11-04 16:20:44', '2024-12-01', NULL, 7, 9, '15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-11-04', NULL, NULL, NULL),
(5, '2024-11-04 16:34:29', '2024-11-07 17:40:36', '2024-01-01', 2, 7, 10, '25', '2024-01-02', 10, 2, 1, 69, '2024-12-01', 2, 4, 6, 4, 9, 69, NULL, NULL, 'igst', 1, NULL, 11700, 5, 5.32, 180, 88, 11973.32, 1, '2024-11-04', NULL, NULL, NULL),
(6, '2024-11-08 16:41:20', '2024-11-08 16:42:11', '2025-02-01', 1, 7, 10, '23', '2024-12-01', 10, 1, 1, 12, '2024-01-01', 3, 3, 12, 1, NULL, 12, NULL, NULL, 'igst', 2, NULL, 144, 0, 10, 25, 25, 204, 1, '2024-11-08', NULL, NULL, NULL),
(7, '2024-11-30 16:16:52', '2024-11-30 16:17:14', '2024-01-01', 2, 7, 10, '37', '2024-01-01', 9, 1, 1, NULL, '2024-01-01', 3, 7, 22, 4, 9, 22, NULL, NULL, NULL, 2, NULL, 484, NULL, 0, 0, 0, 484, 1, '2024-11-30', NULL, NULL, NULL),
(8, '2025-01-18 08:58:29', '2025-01-28 05:55:50', '2025-01-18', 2, 7, 10, '100', '2025-01-18', 9, 1, NULL, NULL, '2025-01-25', NULL, 14, 1440, NULL, NULL, 3, NULL, NULL, 'sgst_cgst', 1, NULL, 14400, 5, NULL, 720, 720, NULL, 1, '2025-01-28', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jobwork_process_contract_details`
--

CREATE TABLE `jobwork_process_contract_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `jobwork_process_contract_id` int(11) DEFAULT NULL,
  `sort_id` int(11) DEFAULT NULL,
  `sort_no` varchar(100) DEFAULT NULL,
  `finished_quality` varchar(100) DEFAULT NULL,
  `grey_quality` varchar(100) DEFAULT NULL,
  `order_no` varchar(100) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `rate` int(11) DEFAULT NULL,
  `taxable_amount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `jobwork_process_contract_details`
--

INSERT INTO `jobwork_process_contract_details` (`id`, `created_at`, `updated_at`, `jobwork_process_contract_id`, `sort_id`, `sort_no`, `finished_quality`, `grey_quality`, `order_no`, `quantity`, `rate`, `taxable_amount`) VALUES
(1, '2024-07-30 22:49:06', '2024-07-30 22:49:06', 1, 7, '1414', '333', '333', 'HST/EX01/13', 79, 10, 7),
(10, '2024-10-12 11:09:19', '2024-10-12 11:09:19', 2, 40, 'ARNEY PD-BLACK', 'ARNEY PD-BLACK/57', 'ARNEY PD-BLACK/57', 'HST/EX01/35', 1, 1, 1),
(13, '2024-10-24 12:01:23', '2024-10-24 12:01:23', 3, 44, '69-69 - grey', '69/69', '69/69', 'HST/EX01/37', 100, 1000, 0),
(18, '2024-11-07 17:40:36', '2024-11-07 17:40:36', 5, 44, '69-69 - grey', '69/69', '69/69', 'HST/EX01/37', 1170, 10, 11700),
(19, '2024-11-08 16:41:20', '2024-11-08 16:41:20', 6, 44, '69-69 - grey', '69/69', '69/69', 'HST/EX01/38', 12, 12, 144),
(20, '2024-11-30 16:16:52', '2024-11-30 16:16:52', 7, 46, '22-kaakhi', '22/22', '22/22', 'HST/EX01/40', 22, 22, 484),
(23, '2025-01-28 05:55:36', '2025-01-28 05:55:36', 8, 48, 'CP01/01-SKY BLUE CHAMBRAY', 'CP01/01-SKY BLUE CHAMBRAY/57', 'CP01/01-SKY BLUE CHAMBRAY/57', 'HST/EX01/41', 1440, 10, 14400);

-- --------------------------------------------------------

--
-- Table structure for table `jobwork_process_contract_issues`
--

CREATE TABLE `jobwork_process_contract_issues` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `jobwork_process_contract_id` int(11) DEFAULT NULL,
  `vendor_name` varchar(100) DEFAULT NULL,
  `issue_date` date DEFAULT NULL,
  `transporter_id` int(11) DEFAULT NULL,
  `lr_no` varchar(100) DEFAULT NULL,
  `lr_date` date DEFAULT NULL,
  `internal_lot_no` varchar(100) DEFAULT NULL,
  `vendor_lot_no` varchar(100) DEFAULT NULL,
  `fabric_type` varchar(100) DEFAULT NULL,
  `mode_of_shipment` varchar(100) DEFAULT NULL,
  `vehicle_number` varchar(100) DEFAULT NULL,
  `issue_type` varchar(100) DEFAULT NULL,
  `complete` int(11) NOT NULL DEFAULT 0,
  `complete_date` datetime DEFAULT NULL,
  `comments` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `jobwork_process_contract_issues`
--

INSERT INTO `jobwork_process_contract_issues` (`id`, `created_at`, `updated_at`, `jobwork_process_contract_id`, `vendor_name`, `issue_date`, `transporter_id`, `lr_no`, `lr_date`, `internal_lot_no`, `vendor_lot_no`, `fabric_type`, `mode_of_shipment`, `vehicle_number`, `issue_type`, `complete`, `complete_date`, `comments`) VALUES
(1, '2024-07-24 16:35:12', '2024-07-24 16:49:53', 1, 'aaa', '2024-07-17', 1, '333', '2024-07-13', '333', '33', 'pieces', 'ROAD', '3', 'Reprocess', 0, NULL, NULL),
(2, '2024-08-08 15:52:59', '2024-08-29 11:54:59', 2, NULL, '2024-08-08', 4, '32', '2024-08-08', '32', '32', 'cloth_challan', 'ROAD', '32', 'Reprocess', 0, NULL, NULL),
(3, '2024-10-12 10:56:39', '2024-10-12 10:56:39', 1, NULL, NULL, 4, NULL, NULL, NULL, NULL, 'pieces', 'ROAD', '```', 'New', 0, NULL, NULL),
(4, '2024-10-12 11:09:45', '2024-10-12 11:10:48', 2, NULL, NULL, 4, '1', NULL, '1', '1', 'pieces', 'ROAD', '1', 'New', 0, NULL, NULL),
(5, '2024-10-19 16:01:03', '2024-10-19 16:01:03', 3, NULL, '2027-03-01', 4, '69', '2025-02-01', NULL, NULL, 'pieces', 'SEA', '69', 'New', 0, NULL, NULL),
(6, '2024-11-30 16:22:35', '2024-11-30 16:22:35', 7, NULL, '2024-01-01', 4, '2', NULL, NULL, NULL, NULL, 'SEA', NULL, 'New', 0, NULL, NULL),
(7, '2025-01-18 08:59:24', '2025-01-18 09:00:22', 8, NULL, '2025-01-18', 5, '1', '2025-01-18', '1', '1', 'pieces', 'ROAD', '1', 'New', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jobwork_process_contract_issue_details`
--

CREATE TABLE `jobwork_process_contract_issue_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `jobwork_process_contract_issue_id` int(11) DEFAULT NULL,
  `quality` varchar(100) DEFAULT NULL,
  `piece_no` varchar(100) DEFAULT NULL,
  `piece_mtr` varchar(100) DEFAULT NULL,
  `weight` varchar(100) DEFAULT NULL,
  `avg_wt` varchar(100) DEFAULT NULL,
  `picks` varchar(100) DEFAULT NULL,
  `grade` varchar(100) DEFAULT NULL,
  `lot_no` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `jobwork_process_contract_issue_details`
--

INSERT INTO `jobwork_process_contract_issue_details` (`id`, `created_at`, `updated_at`, `jobwork_process_contract_issue_id`, `quality`, `piece_no`, `piece_mtr`, `weight`, `avg_wt`, `picks`, `grade`, `lot_no`) VALUES
(1, '2024-07-31 00:03:49', '2024-07-31 00:03:49', 1, '1125azazsss', '3', '3', '3', '3', '3', NULL, NULL),
(2, '2024-08-08 15:52:59', '2024-08-08 15:52:59', 2, '777/Finished ----...', '113', '5.65', '113', '113', '113', NULL, NULL),
(3, '2024-10-12 10:56:39', '2024-10-12 10:56:39', 3, 'ARNEY PD/67', '1', '1', '1', '1', '1', NULL, NULL),
(4, '2024-10-12 11:09:45', '2024-10-12 11:09:45', 4, 'ARNEY PD/67', '1', '1', '1', '1', '1', NULL, NULL),
(5, '2024-10-19 16:01:03', '2024-10-19 16:01:03', 5, '69/69', '69', NULL, '69', NULL, '69', NULL, NULL),
(6, '2024-10-29 12:28:20', '2024-10-29 12:28:20', 5, 'ARNEY PD-BLACK/57', '69', NULL, '69', NULL, '69', NULL, NULL),
(7, '2024-11-30 16:22:35', '2024-11-30 16:22:35', 6, '22/22', '22', '1', '1', '22', '22', NULL, NULL),
(8, '2025-01-18 08:59:24', '2025-01-18 08:59:24', 7, 'CP01/01/64.0', '1', '1750', '1750', '15', '0', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jobwork_weaving_contracts`
--

CREATE TABLE `jobwork_weaving_contracts` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `contract_type_id` int(11) DEFAULT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `contract_no` int(11) DEFAULT NULL,
  `contract_year` varchar(20) DEFAULT NULL,
  `contract_number` varchar(100) DEFAULT NULL,
  `contract_date` date DEFAULT NULL,
  `sort_id` int(11) DEFAULT NULL,
  `jobwork_number` varchar(100) DEFAULT NULL,
  `pick_rate` tinyint(1) DEFAULT NULL,
  `merchandiser_id` int(11) DEFAULT NULL,
  `delivery_date` date DEFAULT NULL,
  `inspection_type_id` int(11) DEFAULT NULL,
  `payment_term_id` int(11) DEFAULT NULL,
  `wastage` double DEFAULT NULL,
  `packing_type_id` int(11) DEFAULT NULL,
  `production_mtrs` double DEFAULT NULL,
  `piece_length_80` double DEFAULT NULL,
  `piece_length_20` double DEFAULT NULL,
  `quality_reed` double DEFAULT NULL,
  `quality_picks` double DEFAULT NULL,
  `no_of_ends` double DEFAULT NULL,
  `reed_space` double DEFAULT NULL,
  `l_to_l` double DEFAULT NULL,
  `selvedge_id` int(11) DEFAULT NULL,
  `dents` double DEFAULT NULL,
  `ends_per_dent` double DEFAULT NULL,
  `selvedge_ends` double DEFAULT NULL,
  `width` double DEFAULT NULL,
  `catch_cord_ends` double DEFAULT NULL,
  `ends_per_wire` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `jobwork_weaving_contracts`
--

INSERT INTO `jobwork_weaving_contracts` (`id`, `created_at`, `updated_at`, `contract_type_id`, `vendor_id`, `contract_no`, `contract_year`, `contract_number`, `contract_date`, `sort_id`, `jobwork_number`, `pick_rate`, `merchandiser_id`, `delivery_date`, `inspection_type_id`, `payment_term_id`, `wastage`, `packing_type_id`, `production_mtrs`, `piece_length_80`, `piece_length_20`, `quality_reed`, `quality_picks`, `no_of_ends`, `reed_space`, `l_to_l`, `selvedge_id`, `dents`, `ends_per_dent`, `selvedge_ends`, `width`, `catch_cord_ends`, `ends_per_wire`) VALUES
(13, '2024-10-15 09:36:14', '2024-10-15 09:36:14', 5, 7, 9, '24-25', 'JWC/24-25/9', '2025-02-01', 40, 'JW-13', 21, 1, '2024-01-01', 3, 4, 21, 1, 21, 21, 21, NULL, NULL, NULL, 58, 21, 3, 0, 0, 50, 57, NULL, 21),
(14, '2024-10-23 11:28:04', '2024-10-23 11:28:04', 5, 7, 10, '24-25', 'JWC/24-25/10', '2025-02-01', 44, 'JW-14', 69, 1, '2026-02-01', 3, 7, 6, 2, 69, 69, 69, 11.21, 11, 22, 138, 68.99, 3, 1.18, 2, 4.36, 69, -0.01, 44),
(15, '2024-11-04 16:26:25', '2024-11-04 16:26:25', 6, 6, 11, '24-25', 'JWC/24-25/11', '2024-12-01', 39, 'JW-15', 26, 2, '2024-01-01', 3, 7, 26, 2, 0.05, 26, 26, 50, 52, 3400, 68, 26, 3, 0, 0, 50, 67, 25, 25),
(16, '2024-11-08 16:36:12', '2024-11-08 16:36:12', 6, 6, 12, '24-25', 'JWC/24-25/12', '2024-12-01', 43, 'JW-16', 12, 2, '2024-12-01', 3, 3, 12, 1, 125, 12, 12, 69, 69, 328512.18, 138, 12, 3, 1.18, 2, 4.36, 69, NULL, NULL),
(18, '2025-01-18 07:44:31', '2025-01-18 07:44:31', 6, 6, 13, '25-26', 'JWC/25-26/13', '2025-01-18', 47, 'JW-18', 0, 2, '2025-01-18', 3, 13, 3, 2, 1440, NULL, NULL, 68, 50, 4424, 65, 0, 3, 2, 2, 68, 64, NULL, NULL),
(19, '2025-02-03 11:13:36', '2025-02-03 11:13:36', 5, 7, 14, '25-26', 'JWC/25-26/14', '2025-02-07', 47, 'JW-19', 23, 1, '2025-02-27', 3, 11, 12, 1, 12, NULL, NULL, 68, 50, 4424, 65, 21, 3, 2, 2, 68, 64, NULL, NULL),
(20, '2025-02-05 06:23:20', '2025-02-05 06:23:20', 6, 7, 15, '25-26', 'JWC/25-26/15', '2025-02-08', 49, 'JW-20', 15, 1, '2025-02-08', 3, 10, 15, 1, 15, 12, 12, 15, 15, 3378.18, 30, 15, 3, 1.18, 2, 4.36, 15, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jobwork_weaving_contract_orders`
--

CREATE TABLE `jobwork_weaving_contract_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sales_order_detail_id` int(11) DEFAULT NULL,
  `jobwork_weaving_contract_id` int(11) DEFAULT NULL,
  `planned_quantity` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `jobwork_weaving_contract_orders`
--

INSERT INTO `jobwork_weaving_contract_orders` (`id`, `sales_order_detail_id`, `jobwork_weaving_contract_id`, `planned_quantity`, `created_at`, `updated_at`) VALUES
(32, 29, 13, 1, '2024-10-15 09:36:14', '2024-10-15 09:36:14'),
(33, 29, 13, 1, '2024-10-15 09:36:14', '2024-10-15 09:36:14'),
(36, 31, 14, 69, '2024-10-23 11:28:04', '2024-10-23 11:28:04'),
(44, 31, 15, NULL, '2024-11-07 17:17:05', '2024-11-07 17:17:05'),
(45, 32, 16, 12, '2024-11-08 16:36:12', '2024-11-08 16:36:12'),
(47, 35, 18, 1440, '2025-01-18 07:44:31', '2025-01-18 07:44:31'),
(48, 30, 19, NULL, '2025-02-03 11:13:36', '2025-02-03 11:13:36'),
(49, 36, 20, 15, '2025-02-05 06:23:20', '2025-02-05 06:23:20');

-- --------------------------------------------------------

--
-- Table structure for table `jobwork_weaving_contract_warps`
--

CREATE TABLE `jobwork_weaving_contract_warps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jobwork_weaving_contract_id` int(11) DEFAULT NULL,
  `show_in_print` tinyint(1) DEFAULT NULL,
  `actual_id` int(11) DEFAULT NULL,
  `material_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `jobwork_weaving_contract_warps`
--

INSERT INTO `jobwork_weaving_contract_warps` (`id`, `jobwork_weaving_contract_id`, `show_in_print`, `actual_id`, `material_id`, `created_at`, `updated_at`) VALUES
(3, 15, 1, 1, 1, '2024-11-07 17:17:05', '2024-11-07 17:17:05'),
(4, 16, 1, NULL, 4, '2024-11-08 16:36:12', '2024-11-08 16:36:12'),
(5, 17, 1, NULL, 2, '2024-11-30 15:48:12', '2024-11-30 15:48:12'),
(6, 18, 1, NULL, 1, '2025-01-18 07:44:31', '2025-01-18 07:44:31'),
(7, 19, 1, NULL, 1, '2025-02-03 11:13:36', '2025-02-03 11:13:36'),
(8, 20, 1, NULL, 4, '2025-02-05 06:23:20', '2025-02-05 06:23:20');

-- --------------------------------------------------------

--
-- Table structure for table `jobwork_weaving_contract_wefts`
--

CREATE TABLE `jobwork_weaving_contract_wefts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jobwork_weaving_contract_id` int(11) DEFAULT NULL,
  `show_in_print` tinyint(1) DEFAULT NULL,
  `actual_id` int(11) DEFAULT NULL,
  `material_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `jobwork_weaving_contract_wefts`
--

INSERT INTO `jobwork_weaving_contract_wefts` (`id`, `jobwork_weaving_contract_id`, `show_in_print`, `actual_id`, `material_id`, `created_at`, `updated_at`) VALUES
(2, 15, 0, 1, 1, '2024-11-07 17:17:05', '2024-11-07 17:17:05'),
(3, 16, 1, NULL, 4, '2024-11-08 16:36:12', '2024-11-08 16:36:12'),
(4, 17, 1, NULL, 2, '2024-11-30 15:48:12', '2024-11-30 15:48:12'),
(5, 18, 1, NULL, 2, '2025-01-18 07:44:31', '2025-01-18 07:44:31'),
(6, 19, 1, NULL, 2, '2025-02-03 11:13:36', '2025-02-03 11:13:36'),
(7, 20, 1, NULL, 4, '2025-02-05 06:23:20', '2025-02-05 06:23:20');

-- --------------------------------------------------------

--
-- Table structure for table `jobwork_weaving_weft_issues`
--

CREATE TABLE `jobwork_weaving_weft_issues` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jobwork_id` int(11) DEFAULT NULL,
  `issue_date` date DEFAULT NULL,
  `receiving_person` varchar(150) DEFAULT NULL,
  `vehicle_number` varchar(100) DEFAULT NULL,
  `dc_number` int(11) DEFAULT NULL,
  `transport_id` int(11) DEFAULT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `gate_pass_no` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `jobwork_weaving_weft_issues`
--

INSERT INTO `jobwork_weaving_weft_issues` (`id`, `jobwork_id`, `issue_date`, `receiving_person`, `vehicle_number`, `dc_number`, `transport_id`, `vendor_id`, `gate_pass_no`, `created_at`, `updated_at`) VALUES
(1, 2, '2024-07-19', NULL, NULL, NULL, 1, 1, 'aaaa', '2024-07-21 11:41:32', '2024-07-21 12:37:33'),
(2, 1, '2024-01-01', '1', '1', 1, 2, 1, '1', '2024-08-05 07:00:42', '2024-08-05 07:00:42'),
(3, 10, '2024-08-08', '111', '111', 111, 4, NULL, '111aaaa', '2024-08-08 11:31:52', '2024-08-29 11:50:52'),
(4, 13, '2024-10-13', 'aaaaz', 'zzzze', 1254, 4, 8, '69 69 69', '2024-10-06 15:41:54', '2024-10-18 16:57:28'),
(5, 14, '2026-03-03', NULL, '69', 69, 4, 10, '69', '2024-10-19 15:39:51', '2024-10-19 15:39:51'),
(6, 14, '2024-01-01', NULL, NULL, NULL, NULL, 9, '2', '2024-10-28 15:10:36', '2024-10-28 15:10:36'),
(7, 14, NULL, 'sdhfkja', '9879432', 878, 1, 10, '789', '2024-10-29 14:05:12', '2024-10-29 14:05:12'),
(8, 17, '2024-01-01', NULL, NULL, NULL, NULL, 10, '22', '2024-11-30 16:12:11', '2024-11-30 16:12:11'),
(9, 17, '2024-01-27', NULL, NULL, NULL, NULL, 10, '22', '2024-11-30 16:12:27', '2024-11-30 16:12:27'),
(10, 17, '2024-02-21', NULL, NULL, NULL, NULL, 10, '22', '2024-11-30 16:13:00', '2024-11-30 16:13:00'),
(11, 17, '2024-02-21', NULL, NULL, NULL, NULL, 10, '22', '2024-11-30 16:13:41', '2024-11-30 16:13:41'),
(12, 12, '2024-12-04', NULL, NULL, NULL, 1, 8, '3232', '2024-12-02 08:49:13', '2024-12-02 08:49:13'),
(13, 17, '2024-01-01', NULL, NULL, NULL, NULL, 10, '26', '2024-12-02 18:58:26', '2024-12-02 18:58:26');

-- --------------------------------------------------------

--
-- Table structure for table `jobwork_weaving_weft_issue_details`
--

CREATE TABLE `jobwork_weaving_weft_issue_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jobwork_weaving_weft_issue_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `actual_count_id` int(11) DEFAULT NULL,
  `cone_tip_color` varchar(250) DEFAULT NULL,
  `location` varchar(250) DEFAULT NULL,
  `lot_no` varchar(250) DEFAULT NULL,
  `item_type` varchar(250) DEFAULT NULL,
  `item` varchar(250) DEFAULT NULL,
  `mill` varchar(250) DEFAULT NULL,
  `stock_receipt_id` int(11) DEFAULT NULL,
  `available_quantity` double DEFAULT NULL,
  `available_bags` double DEFAULT NULL,
  `no_of_bags_issuing` double DEFAULT NULL,
  `kgs_per_bag` double DEFAULT NULL,
  `cones_per_bag` double DEFAULT NULL,
  `issued_cones` double DEFAULT NULL,
  `issuing_quantity` double DEFAULT NULL,
  `convertion_value` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `jobwork_weaving_weft_issue_details`
--

INSERT INTO `jobwork_weaving_weft_issue_details` (`id`, `jobwork_weaving_weft_issue_id`, `created_at`, `updated_at`, `actual_count_id`, `cone_tip_color`, `location`, `lot_no`, `item_type`, `item`, `mill`, `stock_receipt_id`, `available_quantity`, `available_bags`, `no_of_bags_issuing`, `kgs_per_bag`, `cones_per_bag`, `issued_cones`, `issuing_quantity`, `convertion_value`) VALUES
(2, 1, '2024-07-30 21:58:38', '2024-07-30 21:58:38', NULL, '-', 'AAAA', 'a, 55,', NULL, '8/1 UOM2 TYPE1 VRT1 green', 'AAAA', 3, 33, 339, NULL, 33, 33, NULL, NULL, NULL),
(4, 2, '2024-08-05 07:01:36', '2024-08-05 07:01:36', NULL, '-', 'AAAA', 'a, 55,', NULL, '8/1 UOM2 TYPE1 VRT1 green', 'AAAA', 3, 33, 33, 11, 33, 33, 1, 2, NULL),
(8, 3, '2024-08-29 11:50:52', '2024-08-29 11:50:52', 3, '-', 'AAAA', '13--02,', NULL, 'PLY2/COUNT1 UOM2 YRNTYPE2 VRT12222 red', 'AAAA', 13, 144, 12, 11, 12, 12, 11, 11, NULL),
(11, 4, '2024-10-18 16:57:28', '2024-10-18 16:57:28', 1, '-', 'Vendor 1', '1,', NULL, 'SINGLE/COUNT1a KGS TYPE19999D VRT12222e green', 'Vendor 1', 32, 15, 15, NULL, 1, 2, NULL, NULL, NULL),
(12, 5, '2024-10-19 15:39:51', '2024-10-19 15:39:51', 1, '-', 'undefined', '4,', NULL, 'SINGLE/COUNT1a KGS TYPE19999D VRT12222e green', 'undefined', 4, 15, 15, NULL, 1, 4, NULL, NULL, NULL),
(13, 6, '2024-10-28 15:10:36', '2024-10-28 15:10:36', 1, '-', 'undefined', '4,', NULL, 'SINGLE/COUNT1a KGS TYPE19999D VRT12222e green', 'undefined', 4, 15, 15, NULL, 1, 4, NULL, NULL, NULL),
(14, 7, '2024-10-29 14:05:12', '2024-10-29 14:05:12', 1, '-', 'undefined', '4,', NULL, 'SINGLE/COUNT1a KGS TYPE19999D VRT12222e green', 'undefined', 4, 15, 15, NULL, 1, 4, NULL, NULL, NULL),
(15, 11, '2024-12-02 08:47:43', '2024-12-02 08:47:43', 3, '-', 'SRI VEDHA MILLS PVT LTD', '56,', NULL, '1.00/24 NM 100% LINEN YARN LY', 'hekki', NULL, 56, 56, NULL, 21, 21, NULL, NULL, NULL),
(16, 12, '2024-12-02 08:49:13', '2024-12-02 08:49:13', 1, '-', NULL, '4,', NULL, 'SINGLE/COUNT1a KGS TYPE19999D VRT12222e green', NULL, 4, 15, 15, NULL, 1, 4, NULL, NULL, NULL),
(17, 13, '2024-12-02 18:58:26', '2024-12-02 18:58:26', 2, '-', 'SRI VEDHA MILLS PVT LTD', '22,', NULL, '2.0/26 NE 100% LINEN YARN LYOL red', 'BVM OVERSEAS LIMITED', NULL, 676, 26, NULL, 26, 22, NULL, NULL, NULL);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `licences`
--

CREATE TABLE `licences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `number` varchar(255) DEFAULT NULL,
  `type` varchar(250) DEFAULT NULL,
  `import_hsn_no` varchar(250) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `export_hsn_no` varchar(250) DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `volume` varchar(250) DEFAULT NULL,
  `uom_id` int(11) DEFAULT NULL,
  `value` varchar(250) DEFAULT NULL,
  `currency_type` varchar(250) DEFAULT NULL,
  `convertion_value` varchar(250) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'HST EXPORT PVT LTD', 1, '2024-07-05 10:00:45', '2024-07-05 13:26:19'),
(2, 'BANG STOCK', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `location_types`
--

CREATE TABLE `location_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `location_types`
--

INSERT INTO `location_types` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Bank 1', 1, '2024-07-05 10:00:45', '2024-07-05 13:26:19'),
(2, 'bank 2', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `loom_types`
--

CREATE TABLE `loom_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `loom_types`
--

INSERT INTO `loom_types` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(3, 'SAUREN', 1, '2024-07-05 15:41:30', '2024-10-11 07:24:15');

-- --------------------------------------------------------

--
-- Table structure for table `loom_type_details`
--

CREATE TABLE `loom_type_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model` varchar(255) DEFAULT NULL,
  `make` varchar(150) DEFAULT NULL,
  `loom_type_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `loom_type_details`
--

INSERT INTO `loom_type_details` (`id`, `model`, `make`, `loom_type_id`, `created_at`, `updated_at`) VALUES
(7, 'cc', 'ffooooo', 8, '2024-08-04 18:26:06', '2024-08-04 18:26:06'),
(8, 'gg', 'zz', 8, '2024-08-04 18:26:06', '2024-08-04 18:26:06'),
(9, 'D', 'DD', 2, '2024-08-28 08:45:27', '2024-08-28 08:45:27'),
(10, 'dsaf,d;,', 'fsd;\'\'.d\'af', 9, '2024-09-07 08:46:34', '2024-09-07 08:46:34'),
(11, NULL, NULL, 9, '2024-09-07 08:46:34', '2024-09-07 08:46:34');

-- --------------------------------------------------------

--
-- Table structure for table `machines`
--

CREATE TABLE `machines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `machines`
--

INSERT INTO `machines` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'MC01', 1, '2024-07-05 10:00:45', '2025-01-08 12:48:20'),
(3, 'MC02', 1, '2024-10-28 14:48:50', '2025-01-08 12:48:08'),
(4, 'MC03', 1, '2025-01-08 12:48:27', '2025-01-08 12:48:27');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_05_10_063601_create_invoice_settings_table', 1),
(5, '2024_05_10_110520_create_buyers_table', 1),
(6, '2024_05_23_144727_create_certifications_table', 1),
(7, '2024_05_23_145328_create_consignees_table', 1),
(8, '2024_05_23_145341_create_shades_table', 1),
(9, '2024_05_23_145350_create_vendors_table', 1),
(10, '2024_05_23_145609_create_vendor_groups_table', 1),
(11, '2024_05_23_145708_create_godown_locations_table', 1),
(12, '2024_05_23_145733_create_sales_types_table', 1),
(13, '2024_05_23_145744_create_g_s_t_s_table', 1),
(14, '2024_05_23_145754_create_coparts_table', 1),
(15, '2024_05_23_145804_create_contracts_table', 1),
(16, '2024_05_23_145814_create_agents_table', 1),
(17, '2024_05_23_145823_create_transportations_table', 1),
(18, '2024_05_23_145834_create_weave_types_table', 1),
(19, '2024_05_23_145846_create_loom_types_table', 1),
(20, '2024_05_23_145900_create_delivery_terms_table', 1),
(21, '2024_05_23_145911_create_inspection_types_table', 1),
(22, '2024_05_23_145919_create_packing_types_table', 1),
(23, '2024_05_23_145939_create_mills_table', 1),
(24, '2024_05_23_150037_create_qualities_table', 1),
(25, '2024_05_23_150048_create_countries_table', 1),
(26, '2024_05_23_150055_create_payment_terms_table', 1),
(27, '2024_06_04_223330_create_jobwork_weaving_weft_issues_table', 1),
(28, '2024_06_05_103810_create_beam_receive_from_weavers_table', 1),
(29, '2024_06_05_104013_create_jobwork_process_contracts_table', 1),
(30, '2024_06_05_104031_create_jobwork_process_contract_issues_table', 1),
(31, '2024_06_05_104054_create_jobwork_finished_fabric_receives_table', 1),
(32, '2024_06_05_124644_create_sizing_plans_table', 1),
(33, '2024_06_05_132702_create_yarn_processing_contracts_table', 1),
(34, '2024_06_05_132723_create_yarn_processing_contract_issues_table', 1),
(35, '2024_06_05_132747_create_yarn_processing_receives_table', 1),
(36, '2024_06_05_132806_create_yarn_processing_returns_table', 1),
(37, '2024_06_05_151144_create_jobwork_fabric_receives_table', 1),
(38, '2024_06_05_151258_create_sale_returns_table', 1),
(39, '2024_06_05_151323_create_process_returns_table', 1),
(40, '2024_06_05_151344_create_purchase_returns_table', 1),
(41, '2024_06_09_201227_create_count_table', 1),
(42, '2024_06_19_182149_create_states_table', 1),
(43, '2024_06_21_044253_create_cities_table', 1),
(44, '2024_06_21_185653_create_pre_carriage_table', 1),
(45, '2024_06_21_192203_create_weave_table', 1),
(46, '2024_06_22_190001_create_packings_table', 1),
(47, '2024_06_22_230124_create_ply_table', 1),
(48, '2024_06_22_230606_create_uom_table', 1),
(49, '2024_06_22_231521_create_variety_table', 1),
(50, '2024_06_22_232459_create_ports_table', 1),
(51, '2024_06_22_234252_create_yarn_types_table', 1),
(52, '2024_06_23_013627_create_yarns_table', 1),
(53, '2024_06_23_161848_create_selvedge_table', 2),
(54, '2024_06_24_162043_create_buyer_representive_table', 3),
(55, '2024_06_25_161018_create_domestic_buyers_table', 3),
(56, '2024_06_25_161659_create_domestic_buyer_representatives_table', 3),
(57, '2024_06_25_222524_create_colors_table', 3),
(58, '2024_06_27_002229_create_sorts_table', 4),
(59, '2024_06_27_002240_create_sort_warp_table', 4),
(60, '2024_06_27_002247_create_sort_weft_table', 4),
(61, '2024_09_18_082906_create_permission_tables', 5);

-- --------------------------------------------------------

--
-- Table structure for table `mills`
--

CREATE TABLE `mills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `mills`
--

INSERT INTO `mills` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(8, 'NAVAGIRI SPINNING MILLS PVT LTD', 1, '2024-10-11 07:02:27', '2024-10-11 07:02:27'),
(9, 'SCM TEXTILES SPINNERS', 1, '2024-10-11 07:02:35', '2024-10-11 07:02:35'),
(10, 'RAYMOND LUXURY COTTONS LIMITED', 1, '2024-10-11 07:02:41', '2024-10-11 07:02:41'),
(11, 'PRABHU SPINNING MILLS PRIVATE LIMITED', 1, '2024-10-11 07:02:46', '2024-10-11 07:02:46'),
(12, 'LUCKY YARN TEX INDIA PRIVATE LIMITED', 1, '2024-10-11 07:02:52', '2024-10-11 07:02:52'),
(13, 'COTTON LEAF INDIA', 1, '2024-10-11 07:02:57', '2024-10-11 07:02:57'),
(14, 'MOTHI SPINNER PRIVATE LIMITED', 1, '2024-10-11 07:03:04', '2024-10-11 07:03:04'),
(15, 'PRATHYSSHA RAVINA EXPORTS', 1, '2024-10-11 07:03:14', '2024-10-11 07:03:14'),
(16, 'SRI SURYODHAYAA PROCESSING PVT LTD', 1, '2024-10-11 07:03:18', '2024-10-11 07:03:18'),
(17, 'BHUVANESHWARI TEXTILE MANUFACTURES&PROCESSORS', 1, '2024-10-11 07:03:23', '2024-10-11 07:03:23'),
(18, 'RSR TEXTILES', 1, '2024-10-11 07:03:34', '2024-10-11 07:03:34'),
(19, 'TEXVENTURES PRIVATE LIMITED', 1, '2024-10-11 07:03:38', '2024-10-11 07:03:38'),
(20, 'ANUSREE YARN TEX', 1, '2024-10-11 07:03:49', '2024-10-11 07:03:49'),
(21, 'JECATEX TONGXIANG LIMITED', 1, '2024-10-11 07:03:56', '2024-10-11 07:03:56'),
(22, 'ERAI YARNS', 1, '2024-10-11 07:04:01', '2024-10-11 07:04:01'),
(23, 'SUDHAN TECH', 1, '2024-10-11 07:04:06', '2024-10-11 07:04:06'),
(24, 'SAKTHI TEXTILES', 1, '2024-10-11 07:04:13', '2024-10-11 07:04:13'),
(25, 'TRADERS&TRADERS', 1, '2024-10-11 07:04:21', '2024-10-11 07:04:21'),
(26, 'BANNARI AMMAN SPINNING MILLS LIMITED UNIT-II', 1, '2024-10-11 07:04:27', '2024-10-11 07:04:27'),
(27, 'ADITYA EXPORTS', 1, '2024-10-11 07:04:43', '2024-10-11 07:04:43'),
(28, 'NANDHINI TRADERS', 1, '2024-10-11 07:04:45', '2024-10-11 07:04:45'),
(29, 'DEIVEEGAM DYERS', 1, '2024-10-11 07:04:50', '2024-10-11 07:04:50'),
(30, 'AVANTIKA TEXTILES', 1, '2024-10-11 07:04:55', '2024-10-11 07:04:55'),
(31, 'INDETEX INDUSTRIES', 1, '2024-10-11 07:05:00', '2024-10-11 07:05:00'),
(32, 'HST EXPORTS PVT LTD-DOM', 1, '2024-10-11 07:05:06', '2024-10-11 07:05:06'),
(33, 'SRI GOWSHALYA YARN STORES', 1, '2024-10-11 07:05:13', '2024-10-11 07:05:13'),
(34, 'BANG TEXTILES AND CLOTHING PRIVATE LIMITED', 1, '2024-10-11 07:05:19', '2024-10-11 07:05:19'),
(35, 'JMD INTERNATIONAL', 1, '2024-10-11 07:05:25', '2024-10-11 07:05:25'),
(36, 'HUAREN LINEN (HK) CO., LTD', 1, '2024-10-11 07:05:31', '2024-10-11 07:05:31'),
(37, 'BVM OVERSEAS LIMITED', 1, '2024-10-11 07:05:41', '2024-10-11 07:05:41'),
(38, 'GOODWILL FABRICS PVT.LTD', 1, '2024-10-11 07:05:45', '2024-10-11 07:05:45'),
(39, 'ZHEJIANG JINYUAN FLAX CO.,LTD', 1, '2024-10-11 07:05:51', '2024-10-29 12:39:07'),
(40, 'HST EXPORTS PVT LTD', 1, '2024-10-11 07:05:59', '2024-10-11 07:05:59');

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `model_has_permissions`
--

INSERT INTO `model_has_permissions` (`permission_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(1, 'App\\Models\\User', 10),
(1, 'App\\Models\\User', 11),
(2, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 11),
(3, 'App\\Models\\User', 1),
(3, 'App\\Models\\User', 11),
(4, 'App\\Models\\User', 1),
(4, 'App\\Models\\User', 11),
(5, 'App\\Models\\User', 1),
(5, 'App\\Models\\User', 10),
(5, 'App\\Models\\User', 11),
(6, 'App\\Models\\User', 1),
(6, 'App\\Models\\User', 11),
(7, 'App\\Models\\User', 1),
(7, 'App\\Models\\User', 11),
(8, 'App\\Models\\User', 1),
(8, 'App\\Models\\User', 11),
(9, 'App\\Models\\User', 1),
(9, 'App\\Models\\User', 10),
(9, 'App\\Models\\User', 11),
(10, 'App\\Models\\User', 1),
(10, 'App\\Models\\User', 11),
(11, 'App\\Models\\User', 1),
(11, 'App\\Models\\User', 11),
(12, 'App\\Models\\User', 1),
(12, 'App\\Models\\User', 11),
(13, 'App\\Models\\User', 1),
(13, 'App\\Models\\User', 10),
(13, 'App\\Models\\User', 11),
(14, 'App\\Models\\User', 1),
(14, 'App\\Models\\User', 11),
(15, 'App\\Models\\User', 1),
(15, 'App\\Models\\User', 11),
(16, 'App\\Models\\User', 1),
(16, 'App\\Models\\User', 11),
(17, 'App\\Models\\User', 1),
(17, 'App\\Models\\User', 10),
(17, 'App\\Models\\User', 11),
(18, 'App\\Models\\User', 1),
(18, 'App\\Models\\User', 11),
(19, 'App\\Models\\User', 1),
(19, 'App\\Models\\User', 11),
(20, 'App\\Models\\User', 1),
(20, 'App\\Models\\User', 11),
(21, 'App\\Models\\User', 1),
(21, 'App\\Models\\User', 10),
(21, 'App\\Models\\User', 11),
(22, 'App\\Models\\User', 1),
(22, 'App\\Models\\User', 11),
(23, 'App\\Models\\User', 1),
(23, 'App\\Models\\User', 11),
(24, 'App\\Models\\User', 1),
(24, 'App\\Models\\User', 11),
(25, 'App\\Models\\User', 1),
(25, 'App\\Models\\User', 10),
(25, 'App\\Models\\User', 11),
(26, 'App\\Models\\User', 1),
(26, 'App\\Models\\User', 11),
(27, 'App\\Models\\User', 1),
(27, 'App\\Models\\User', 11),
(28, 'App\\Models\\User', 1),
(28, 'App\\Models\\User', 11),
(29, 'App\\Models\\User', 1),
(29, 'App\\Models\\User', 10),
(29, 'App\\Models\\User', 11),
(30, 'App\\Models\\User', 1),
(30, 'App\\Models\\User', 11),
(31, 'App\\Models\\User', 1),
(31, 'App\\Models\\User', 11),
(32, 'App\\Models\\User', 1),
(32, 'App\\Models\\User', 11),
(33, 'App\\Models\\User', 1),
(33, 'App\\Models\\User', 10),
(33, 'App\\Models\\User', 11),
(34, 'App\\Models\\User', 1),
(34, 'App\\Models\\User', 11),
(35, 'App\\Models\\User', 1),
(35, 'App\\Models\\User', 11),
(36, 'App\\Models\\User', 1),
(36, 'App\\Models\\User', 11),
(37, 'App\\Models\\User', 1),
(37, 'App\\Models\\User', 10),
(37, 'App\\Models\\User', 11),
(38, 'App\\Models\\User', 1),
(38, 'App\\Models\\User', 11),
(39, 'App\\Models\\User', 1),
(39, 'App\\Models\\User', 11),
(40, 'App\\Models\\User', 1),
(40, 'App\\Models\\User', 11),
(41, 'App\\Models\\User', 1),
(41, 'App\\Models\\User', 10),
(41, 'App\\Models\\User', 11),
(42, 'App\\Models\\User', 1),
(42, 'App\\Models\\User', 11),
(43, 'App\\Models\\User', 1),
(43, 'App\\Models\\User', 11),
(44, 'App\\Models\\User', 1),
(44, 'App\\Models\\User', 11),
(45, 'App\\Models\\User', 1),
(45, 'App\\Models\\User', 10),
(45, 'App\\Models\\User', 11),
(46, 'App\\Models\\User', 1),
(46, 'App\\Models\\User', 11),
(47, 'App\\Models\\User', 1),
(47, 'App\\Models\\User', 11),
(48, 'App\\Models\\User', 1),
(48, 'App\\Models\\User', 11),
(49, 'App\\Models\\User', 1),
(49, 'App\\Models\\User', 10),
(49, 'App\\Models\\User', 11),
(50, 'App\\Models\\User', 1),
(50, 'App\\Models\\User', 11),
(51, 'App\\Models\\User', 1),
(51, 'App\\Models\\User', 11),
(52, 'App\\Models\\User', 1),
(52, 'App\\Models\\User', 11),
(53, 'App\\Models\\User', 1),
(53, 'App\\Models\\User', 11),
(54, 'App\\Models\\User', 1),
(54, 'App\\Models\\User', 11),
(55, 'App\\Models\\User', 1),
(55, 'App\\Models\\User', 11),
(56, 'App\\Models\\User', 1),
(56, 'App\\Models\\User', 11),
(57, 'App\\Models\\User', 1),
(57, 'App\\Models\\User', 10),
(57, 'App\\Models\\User', 11),
(58, 'App\\Models\\User', 1),
(58, 'App\\Models\\User', 11),
(59, 'App\\Models\\User', 1),
(59, 'App\\Models\\User', 11),
(60, 'App\\Models\\User', 1),
(60, 'App\\Models\\User', 11),
(61, 'App\\Models\\User', 1),
(61, 'App\\Models\\User', 11),
(62, 'App\\Models\\User', 1),
(62, 'App\\Models\\User', 11),
(63, 'App\\Models\\User', 1),
(63, 'App\\Models\\User', 11),
(64, 'App\\Models\\User', 1),
(64, 'App\\Models\\User', 11),
(65, 'App\\Models\\User', 1),
(65, 'App\\Models\\User', 10),
(65, 'App\\Models\\User', 11),
(66, 'App\\Models\\User', 1),
(66, 'App\\Models\\User', 11),
(67, 'App\\Models\\User', 1),
(67, 'App\\Models\\User', 11),
(68, 'App\\Models\\User', 1),
(68, 'App\\Models\\User', 11),
(69, 'App\\Models\\User', 1),
(69, 'App\\Models\\User', 10),
(69, 'App\\Models\\User', 11),
(70, 'App\\Models\\User', 1),
(70, 'App\\Models\\User', 11),
(71, 'App\\Models\\User', 1),
(71, 'App\\Models\\User', 11),
(72, 'App\\Models\\User', 1),
(72, 'App\\Models\\User', 11),
(73, 'App\\Models\\User', 1),
(73, 'App\\Models\\User', 11),
(74, 'App\\Models\\User', 1),
(74, 'App\\Models\\User', 11),
(75, 'App\\Models\\User', 1),
(75, 'App\\Models\\User', 11),
(76, 'App\\Models\\User', 1),
(76, 'App\\Models\\User', 11),
(77, 'App\\Models\\User', 1),
(77, 'App\\Models\\User', 11),
(78, 'App\\Models\\User', 1),
(78, 'App\\Models\\User', 11),
(79, 'App\\Models\\User', 1),
(79, 'App\\Models\\User', 11),
(80, 'App\\Models\\User', 1),
(80, 'App\\Models\\User', 11),
(81, 'App\\Models\\User', 1),
(81, 'App\\Models\\User', 11),
(82, 'App\\Models\\User', 1),
(82, 'App\\Models\\User', 11),
(83, 'App\\Models\\User', 1),
(83, 'App\\Models\\User', 11),
(84, 'App\\Models\\User', 1),
(84, 'App\\Models\\User', 11),
(85, 'App\\Models\\User', 1),
(85, 'App\\Models\\User', 10),
(85, 'App\\Models\\User', 11),
(86, 'App\\Models\\User', 1),
(86, 'App\\Models\\User', 11),
(87, 'App\\Models\\User', 1),
(87, 'App\\Models\\User', 11),
(88, 'App\\Models\\User', 1),
(88, 'App\\Models\\User', 11),
(89, 'App\\Models\\User', 1),
(89, 'App\\Models\\User', 10),
(89, 'App\\Models\\User', 11),
(90, 'App\\Models\\User', 1),
(90, 'App\\Models\\User', 11),
(91, 'App\\Models\\User', 1),
(91, 'App\\Models\\User', 11),
(92, 'App\\Models\\User', 1),
(92, 'App\\Models\\User', 11),
(93, 'App\\Models\\User', 1),
(93, 'App\\Models\\User', 10),
(93, 'App\\Models\\User', 11),
(94, 'App\\Models\\User', 1),
(94, 'App\\Models\\User', 11),
(95, 'App\\Models\\User', 1),
(95, 'App\\Models\\User', 11),
(96, 'App\\Models\\User', 1),
(96, 'App\\Models\\User', 11),
(97, 'App\\Models\\User', 1),
(97, 'App\\Models\\User', 10),
(97, 'App\\Models\\User', 11),
(98, 'App\\Models\\User', 1),
(98, 'App\\Models\\User', 11),
(99, 'App\\Models\\User', 1),
(99, 'App\\Models\\User', 11),
(100, 'App\\Models\\User', 1),
(100, 'App\\Models\\User', 11),
(101, 'App\\Models\\User', 1),
(101, 'App\\Models\\User', 11),
(102, 'App\\Models\\User', 1),
(102, 'App\\Models\\User', 11),
(103, 'App\\Models\\User', 1),
(103, 'App\\Models\\User', 11),
(104, 'App\\Models\\User', 1),
(104, 'App\\Models\\User', 11),
(105, 'App\\Models\\User', 1),
(105, 'App\\Models\\User', 11),
(106, 'App\\Models\\User', 1),
(106, 'App\\Models\\User', 11),
(107, 'App\\Models\\User', 1),
(107, 'App\\Models\\User', 11),
(108, 'App\\Models\\User', 1),
(108, 'App\\Models\\User', 11),
(109, 'App\\Models\\User', 1),
(109, 'App\\Models\\User', 11),
(110, 'App\\Models\\User', 1),
(110, 'App\\Models\\User', 11),
(111, 'App\\Models\\User', 1),
(111, 'App\\Models\\User', 11),
(112, 'App\\Models\\User', 1),
(112, 'App\\Models\\User', 11),
(113, 'App\\Models\\User', 1),
(113, 'App\\Models\\User', 11),
(114, 'App\\Models\\User', 1),
(114, 'App\\Models\\User', 11),
(115, 'App\\Models\\User', 1),
(115, 'App\\Models\\User', 11),
(116, 'App\\Models\\User', 1),
(116, 'App\\Models\\User', 11),
(117, 'App\\Models\\User', 1),
(117, 'App\\Models\\User', 11),
(118, 'App\\Models\\User', 1),
(118, 'App\\Models\\User', 11),
(119, 'App\\Models\\User', 1),
(119, 'App\\Models\\User', 11),
(120, 'App\\Models\\User', 1),
(120, 'App\\Models\\User', 11),
(121, 'App\\Models\\User', 1),
(121, 'App\\Models\\User', 11),
(122, 'App\\Models\\User', 1),
(122, 'App\\Models\\User', 11),
(123, 'App\\Models\\User', 1),
(123, 'App\\Models\\User', 11),
(124, 'App\\Models\\User', 1),
(124, 'App\\Models\\User', 11),
(125, 'App\\Models\\User', 1),
(125, 'App\\Models\\User', 11),
(126, 'App\\Models\\User', 1),
(126, 'App\\Models\\User', 11),
(127, 'App\\Models\\User', 1),
(127, 'App\\Models\\User', 11),
(128, 'App\\Models\\User', 1),
(128, 'App\\Models\\User', 11),
(129, 'App\\Models\\User', 1),
(129, 'App\\Models\\User', 11),
(130, 'App\\Models\\User', 1),
(130, 'App\\Models\\User', 11),
(131, 'App\\Models\\User', 1),
(131, 'App\\Models\\User', 11),
(132, 'App\\Models\\User', 1),
(132, 'App\\Models\\User', 11),
(133, 'App\\Models\\User', 1),
(133, 'App\\Models\\User', 11),
(134, 'App\\Models\\User', 1),
(134, 'App\\Models\\User', 11),
(135, 'App\\Models\\User', 1),
(135, 'App\\Models\\User', 11),
(136, 'App\\Models\\User', 1),
(136, 'App\\Models\\User', 11),
(137, 'App\\Models\\User', 1),
(137, 'App\\Models\\User', 11),
(138, 'App\\Models\\User', 1),
(138, 'App\\Models\\User', 11),
(139, 'App\\Models\\User', 1),
(139, 'App\\Models\\User', 11),
(140, 'App\\Models\\User', 1),
(140, 'App\\Models\\User', 11),
(141, 'App\\Models\\User', 1),
(141, 'App\\Models\\User', 11),
(142, 'App\\Models\\User', 1),
(142, 'App\\Models\\User', 11),
(143, 'App\\Models\\User', 1),
(143, 'App\\Models\\User', 11),
(144, 'App\\Models\\User', 1),
(144, 'App\\Models\\User', 11),
(145, 'App\\Models\\User', 1),
(145, 'App\\Models\\User', 11),
(146, 'App\\Models\\User', 1),
(146, 'App\\Models\\User', 11),
(147, 'App\\Models\\User', 1),
(147, 'App\\Models\\User', 11),
(148, 'App\\Models\\User', 1),
(148, 'App\\Models\\User', 11),
(149, 'App\\Models\\User', 1),
(149, 'App\\Models\\User', 11),
(150, 'App\\Models\\User', 1),
(150, 'App\\Models\\User', 11),
(151, 'App\\Models\\User', 1),
(151, 'App\\Models\\User', 11),
(152, 'App\\Models\\User', 1),
(152, 'App\\Models\\User', 11),
(153, 'App\\Models\\User', 1),
(153, 'App\\Models\\User', 11),
(154, 'App\\Models\\User', 1),
(154, 'App\\Models\\User', 11),
(155, 'App\\Models\\User', 1),
(155, 'App\\Models\\User', 11),
(156, 'App\\Models\\User', 1),
(156, 'App\\Models\\User', 11),
(157, 'App\\Models\\User', 1),
(157, 'App\\Models\\User', 11),
(158, 'App\\Models\\User', 1),
(158, 'App\\Models\\User', 11),
(159, 'App\\Models\\User', 1),
(159, 'App\\Models\\User', 11),
(160, 'App\\Models\\User', 1),
(160, 'App\\Models\\User', 11),
(161, 'App\\Models\\User', 1),
(161, 'App\\Models\\User', 11),
(162, 'App\\Models\\User', 1),
(162, 'App\\Models\\User', 11),
(163, 'App\\Models\\User', 1),
(163, 'App\\Models\\User', 11),
(164, 'App\\Models\\User', 1),
(164, 'App\\Models\\User', 11),
(165, 'App\\Models\\User', 1),
(165, 'App\\Models\\User', 11),
(166, 'App\\Models\\User', 1),
(166, 'App\\Models\\User', 11),
(167, 'App\\Models\\User', 1),
(167, 'App\\Models\\User', 11),
(168, 'App\\Models\\User', 1),
(168, 'App\\Models\\User', 11),
(169, 'App\\Models\\User', 1),
(169, 'App\\Models\\User', 11),
(170, 'App\\Models\\User', 1),
(170, 'App\\Models\\User', 11),
(171, 'App\\Models\\User', 1),
(171, 'App\\Models\\User', 11),
(172, 'App\\Models\\User', 1),
(172, 'App\\Models\\User', 11),
(173, 'App\\Models\\User', 1),
(173, 'App\\Models\\User', 11),
(174, 'App\\Models\\User', 1),
(174, 'App\\Models\\User', 11),
(175, 'App\\Models\\User', 1),
(175, 'App\\Models\\User', 11),
(176, 'App\\Models\\User', 1),
(176, 'App\\Models\\User', 11),
(177, 'App\\Models\\User', 1),
(177, 'App\\Models\\User', 11),
(178, 'App\\Models\\User', 1),
(178, 'App\\Models\\User', 11),
(179, 'App\\Models\\User', 1),
(179, 'App\\Models\\User', 11),
(180, 'App\\Models\\User', 1),
(180, 'App\\Models\\User', 11),
(181, 'App\\Models\\User', 1),
(181, 'App\\Models\\User', 11),
(182, 'App\\Models\\User', 1),
(182, 'App\\Models\\User', 11),
(183, 'App\\Models\\User', 1),
(183, 'App\\Models\\User', 11),
(184, 'App\\Models\\User', 1),
(184, 'App\\Models\\User', 11),
(185, 'App\\Models\\User', 1),
(185, 'App\\Models\\User', 11),
(186, 'App\\Models\\User', 1),
(186, 'App\\Models\\User', 11),
(187, 'App\\Models\\User', 1),
(187, 'App\\Models\\User', 11),
(188, 'App\\Models\\User', 1),
(188, 'App\\Models\\User', 11),
(189, 'App\\Models\\User', 1),
(189, 'App\\Models\\User', 11),
(190, 'App\\Models\\User', 1),
(190, 'App\\Models\\User', 11),
(191, 'App\\Models\\User', 1),
(191, 'App\\Models\\User', 11),
(192, 'App\\Models\\User', 1),
(192, 'App\\Models\\User', 11),
(193, 'App\\Models\\User', 1),
(193, 'App\\Models\\User', 11),
(194, 'App\\Models\\User', 1),
(194, 'App\\Models\\User', 11),
(195, 'App\\Models\\User', 1),
(195, 'App\\Models\\User', 11),
(196, 'App\\Models\\User', 1),
(196, 'App\\Models\\User', 11),
(197, 'App\\Models\\User', 1),
(197, 'App\\Models\\User', 11),
(198, 'App\\Models\\User', 1),
(198, 'App\\Models\\User', 11),
(199, 'App\\Models\\User', 1),
(199, 'App\\Models\\User', 11),
(200, 'App\\Models\\User', 1),
(200, 'App\\Models\\User', 11),
(201, 'App\\Models\\User', 1),
(201, 'App\\Models\\User', 11),
(202, 'App\\Models\\User', 1),
(202, 'App\\Models\\User', 11),
(203, 'App\\Models\\User', 1),
(203, 'App\\Models\\User', 11),
(204, 'App\\Models\\User', 1),
(204, 'App\\Models\\User', 11),
(205, 'App\\Models\\User', 1),
(205, 'App\\Models\\User', 11),
(206, 'App\\Models\\User', 1),
(206, 'App\\Models\\User', 11),
(207, 'App\\Models\\User', 1),
(207, 'App\\Models\\User', 11),
(208, 'App\\Models\\User', 1),
(208, 'App\\Models\\User', 11),
(209, 'App\\Models\\User', 1),
(209, 'App\\Models\\User', 11),
(210, 'App\\Models\\User', 1),
(210, 'App\\Models\\User', 11),
(211, 'App\\Models\\User', 1),
(211, 'App\\Models\\User', 11),
(212, 'App\\Models\\User', 1),
(212, 'App\\Models\\User', 11),
(213, 'App\\Models\\User', 1),
(213, 'App\\Models\\User', 11),
(214, 'App\\Models\\User', 1),
(214, 'App\\Models\\User', 11),
(215, 'App\\Models\\User', 1),
(215, 'App\\Models\\User', 11),
(216, 'App\\Models\\User', 1),
(216, 'App\\Models\\User', 11),
(217, 'App\\Models\\User', 1),
(217, 'App\\Models\\User', 11),
(218, 'App\\Models\\User', 1),
(218, 'App\\Models\\User', 11),
(219, 'App\\Models\\User', 1),
(219, 'App\\Models\\User', 11),
(220, 'App\\Models\\User', 1),
(220, 'App\\Models\\User', 11),
(221, 'App\\Models\\User', 1),
(221, 'App\\Models\\User', 11),
(222, 'App\\Models\\User', 1),
(222, 'App\\Models\\User', 11),
(223, 'App\\Models\\User', 1),
(223, 'App\\Models\\User', 11),
(224, 'App\\Models\\User', 1),
(224, 'App\\Models\\User', 11),
(225, 'App\\Models\\User', 1),
(225, 'App\\Models\\User', 11),
(226, 'App\\Models\\User', 1),
(226, 'App\\Models\\User', 11),
(227, 'App\\Models\\User', 1),
(227, 'App\\Models\\User', 11),
(228, 'App\\Models\\User', 1),
(228, 'App\\Models\\User', 11),
(229, 'App\\Models\\User', 1),
(229, 'App\\Models\\User', 11),
(230, 'App\\Models\\User', 1),
(230, 'App\\Models\\User', 11),
(231, 'App\\Models\\User', 1),
(231, 'App\\Models\\User', 11),
(232, 'App\\Models\\User', 1),
(232, 'App\\Models\\User', 11),
(233, 'App\\Models\\User', 1),
(233, 'App\\Models\\User', 11),
(234, 'App\\Models\\User', 1),
(234, 'App\\Models\\User', 11),
(235, 'App\\Models\\User', 1),
(235, 'App\\Models\\User', 11),
(236, 'App\\Models\\User', 1),
(236, 'App\\Models\\User', 11),
(237, 'App\\Models\\User', 1),
(237, 'App\\Models\\User', 11),
(238, 'App\\Models\\User', 1),
(238, 'App\\Models\\User', 11),
(239, 'App\\Models\\User', 1),
(239, 'App\\Models\\User', 11),
(240, 'App\\Models\\User', 1),
(240, 'App\\Models\\User', 11),
(241, 'App\\Models\\User', 1),
(241, 'App\\Models\\User', 11),
(242, 'App\\Models\\User', 1),
(242, 'App\\Models\\User', 11),
(243, 'App\\Models\\User', 1),
(243, 'App\\Models\\User', 11),
(244, 'App\\Models\\User', 1),
(244, 'App\\Models\\User', 11),
(245, 'App\\Models\\User', 1),
(245, 'App\\Models\\User', 11),
(246, 'App\\Models\\User', 1),
(246, 'App\\Models\\User', 11),
(247, 'App\\Models\\User', 1),
(247, 'App\\Models\\User', 11),
(248, 'App\\Models\\User', 1),
(248, 'App\\Models\\User', 11),
(249, 'App\\Models\\User', 1),
(249, 'App\\Models\\User', 11),
(250, 'App\\Models\\User', 1),
(250, 'App\\Models\\User', 11),
(251, 'App\\Models\\User', 1),
(251, 'App\\Models\\User', 11),
(252, 'App\\Models\\User', 1),
(252, 'App\\Models\\User', 11),
(253, 'App\\Models\\User', 1),
(253, 'App\\Models\\User', 11),
(254, 'App\\Models\\User', 1),
(254, 'App\\Models\\User', 11),
(255, 'App\\Models\\User', 1),
(255, 'App\\Models\\User', 11),
(256, 'App\\Models\\User', 1),
(256, 'App\\Models\\User', 11),
(257, 'App\\Models\\User', 1),
(257, 'App\\Models\\User', 11),
(258, 'App\\Models\\User', 1),
(258, 'App\\Models\\User', 11),
(259, 'App\\Models\\User', 1),
(259, 'App\\Models\\User', 11),
(260, 'App\\Models\\User', 1),
(260, 'App\\Models\\User', 11),
(261, 'App\\Models\\User', 1),
(261, 'App\\Models\\User', 11),
(262, 'App\\Models\\User', 1),
(262, 'App\\Models\\User', 11),
(263, 'App\\Models\\User', 1),
(263, 'App\\Models\\User', 11),
(264, 'App\\Models\\User', 1),
(264, 'App\\Models\\User', 11),
(265, 'App\\Models\\User', 1),
(265, 'App\\Models\\User', 11),
(266, 'App\\Models\\User', 1),
(266, 'App\\Models\\User', 11),
(267, 'App\\Models\\User', 1),
(267, 'App\\Models\\User', 11),
(268, 'App\\Models\\User', 1),
(268, 'App\\Models\\User', 11),
(269, 'App\\Models\\User', 1),
(269, 'App\\Models\\User', 11),
(270, 'App\\Models\\User', 1),
(270, 'App\\Models\\User', 11),
(271, 'App\\Models\\User', 1),
(271, 'App\\Models\\User', 11),
(272, 'App\\Models\\User', 1),
(272, 'App\\Models\\User', 11),
(273, 'App\\Models\\User', 1),
(273, 'App\\Models\\User', 11),
(274, 'App\\Models\\User', 1),
(274, 'App\\Models\\User', 11),
(275, 'App\\Models\\User', 1),
(275, 'App\\Models\\User', 11),
(276, 'App\\Models\\User', 1),
(276, 'App\\Models\\User', 11),
(277, 'App\\Models\\User', 1),
(277, 'App\\Models\\User', 11),
(278, 'App\\Models\\User', 1),
(278, 'App\\Models\\User', 11),
(279, 'App\\Models\\User', 1),
(279, 'App\\Models\\User', 11),
(280, 'App\\Models\\User', 1),
(280, 'App\\Models\\User', 11),
(281, 'App\\Models\\User', 1),
(281, 'App\\Models\\User', 11),
(282, 'App\\Models\\User', 1),
(282, 'App\\Models\\User', 11),
(283, 'App\\Models\\User', 1),
(283, 'App\\Models\\User', 11),
(284, 'App\\Models\\User', 1),
(284, 'App\\Models\\User', 11),
(285, 'App\\Models\\User', 1),
(285, 'App\\Models\\User', 11),
(286, 'App\\Models\\User', 1),
(286, 'App\\Models\\User', 11),
(287, 'App\\Models\\User', 1),
(287, 'App\\Models\\User', 11),
(288, 'App\\Models\\User', 1),
(288, 'App\\Models\\User', 11),
(289, 'App\\Models\\User', 1),
(289, 'App\\Models\\User', 11),
(290, 'App\\Models\\User', 1),
(290, 'App\\Models\\User', 11),
(291, 'App\\Models\\User', 1),
(291, 'App\\Models\\User', 11),
(292, 'App\\Models\\User', 1),
(292, 'App\\Models\\User', 11),
(293, 'App\\Models\\User', 1),
(293, 'App\\Models\\User', 11),
(294, 'App\\Models\\User', 1),
(294, 'App\\Models\\User', 11),
(295, 'App\\Models\\User', 1),
(295, 'App\\Models\\User', 11),
(296, 'App\\Models\\User', 1),
(296, 'App\\Models\\User', 11),
(297, 'App\\Models\\User', 1),
(297, 'App\\Models\\User', 11),
(298, 'App\\Models\\User', 1),
(298, 'App\\Models\\User', 11),
(299, 'App\\Models\\User', 1),
(299, 'App\\Models\\User', 11),
(300, 'App\\Models\\User', 1),
(300, 'App\\Models\\User', 11),
(301, 'App\\Models\\User', 1),
(301, 'App\\Models\\User', 11),
(302, 'App\\Models\\User', 1),
(302, 'App\\Models\\User', 11),
(303, 'App\\Models\\User', 1),
(303, 'App\\Models\\User', 11),
(304, 'App\\Models\\User', 1),
(304, 'App\\Models\\User', 11),
(305, 'App\\Models\\User', 1),
(305, 'App\\Models\\User', 11),
(306, 'App\\Models\\User', 1),
(306, 'App\\Models\\User', 11),
(307, 'App\\Models\\User', 1),
(307, 'App\\Models\\User', 11),
(308, 'App\\Models\\User', 1),
(308, 'App\\Models\\User', 11),
(309, 'App\\Models\\User', 1),
(309, 'App\\Models\\User', 11),
(310, 'App\\Models\\User', 11),
(311, 'App\\Models\\User', 11),
(312, 'App\\Models\\User', 11),
(313, 'App\\Models\\User', 1),
(313, 'App\\Models\\User', 11),
(314, 'App\\Models\\User', 1),
(314, 'App\\Models\\User', 11),
(315, 'App\\Models\\User', 1),
(315, 'App\\Models\\User', 11),
(316, 'App\\Models\\User', 1),
(316, 'App\\Models\\User', 11),
(317, 'App\\Models\\User', 1),
(317, 'App\\Models\\User', 11),
(318, 'App\\Models\\User', 1),
(318, 'App\\Models\\User', 11),
(319, 'App\\Models\\User', 1),
(319, 'App\\Models\\User', 11),
(320, 'App\\Models\\User', 1),
(320, 'App\\Models\\User', 11),
(321, 'App\\Models\\User', 1),
(321, 'App\\Models\\User', 11),
(322, 'App\\Models\\User', 1),
(322, 'App\\Models\\User', 11),
(323, 'App\\Models\\User', 1),
(323, 'App\\Models\\User', 11),
(324, 'App\\Models\\User', 1),
(324, 'App\\Models\\User', 11),
(325, 'App\\Models\\User', 1),
(325, 'App\\Models\\User', 11),
(326, 'App\\Models\\User', 1),
(326, 'App\\Models\\User', 11),
(327, 'App\\Models\\User', 1),
(327, 'App\\Models\\User', 11),
(328, 'App\\Models\\User', 1),
(328, 'App\\Models\\User', 11),
(329, 'App\\Models\\User', 1),
(329, 'App\\Models\\User', 11),
(330, 'App\\Models\\User', 1),
(330, 'App\\Models\\User', 11),
(331, 'App\\Models\\User', 1),
(331, 'App\\Models\\User', 11),
(332, 'App\\Models\\User', 1),
(332, 'App\\Models\\User', 11),
(333, 'App\\Models\\User', 1),
(333, 'App\\Models\\User', 11),
(334, 'App\\Models\\User', 1),
(334, 'App\\Models\\User', 11),
(335, 'App\\Models\\User', 1),
(335, 'App\\Models\\User', 11),
(336, 'App\\Models\\User', 1),
(336, 'App\\Models\\User', 11),
(337, 'App\\Models\\User', 1),
(337, 'App\\Models\\User', 11),
(338, 'App\\Models\\User', 1),
(338, 'App\\Models\\User', 11),
(339, 'App\\Models\\User', 1),
(339, 'App\\Models\\User', 11),
(340, 'App\\Models\\User', 1),
(340, 'App\\Models\\User', 11),
(341, 'App\\Models\\User', 1),
(341, 'App\\Models\\User', 11),
(342, 'App\\Models\\User', 1),
(342, 'App\\Models\\User', 11),
(343, 'App\\Models\\User', 1),
(343, 'App\\Models\\User', 11),
(344, 'App\\Models\\User', 1),
(344, 'App\\Models\\User', 11),
(345, 'App\\Models\\User', 1),
(345, 'App\\Models\\User', 11),
(346, 'App\\Models\\User', 1),
(346, 'App\\Models\\User', 11),
(347, 'App\\Models\\User', 1),
(347, 'App\\Models\\User', 11),
(348, 'App\\Models\\User', 1),
(348, 'App\\Models\\User', 11),
(349, 'App\\Models\\User', 1),
(349, 'App\\Models\\User', 11),
(350, 'App\\Models\\User', 1),
(350, 'App\\Models\\User', 11),
(351, 'App\\Models\\User', 1),
(351, 'App\\Models\\User', 11),
(352, 'App\\Models\\User', 1),
(352, 'App\\Models\\User', 11),
(353, 'App\\Models\\User', 1),
(353, 'App\\Models\\User', 11),
(354, 'App\\Models\\User', 1),
(354, 'App\\Models\\User', 11),
(355, 'App\\Models\\User', 1),
(355, 'App\\Models\\User', 11),
(356, 'App\\Models\\User', 1),
(356, 'App\\Models\\User', 11),
(357, 'App\\Models\\User', 1),
(357, 'App\\Models\\User', 11),
(358, 'App\\Models\\User', 1),
(358, 'App\\Models\\User', 11),
(359, 'App\\Models\\User', 1),
(359, 'App\\Models\\User', 11),
(360, 'App\\Models\\User', 1),
(360, 'App\\Models\\User', 11),
(361, 'App\\Models\\User', 1),
(361, 'App\\Models\\User', 11),
(362, 'App\\Models\\User', 1),
(362, 'App\\Models\\User', 11),
(363, 'App\\Models\\User', 1),
(363, 'App\\Models\\User', 11),
(364, 'App\\Models\\User', 1),
(364, 'App\\Models\\User', 11),
(365, 'App\\Models\\User', 1),
(365, 'App\\Models\\User', 11),
(366, 'App\\Models\\User', 1),
(366, 'App\\Models\\User', 11),
(367, 'App\\Models\\User', 1),
(367, 'App\\Models\\User', 11),
(368, 'App\\Models\\User', 1),
(368, 'App\\Models\\User', 11),
(369, 'App\\Models\\User', 1),
(369, 'App\\Models\\User', 11),
(370, 'App\\Models\\User', 1),
(370, 'App\\Models\\User', 11),
(371, 'App\\Models\\User', 1),
(371, 'App\\Models\\User', 11),
(372, 'App\\Models\\User', 1),
(372, 'App\\Models\\User', 11),
(373, 'App\\Models\\User', 1),
(373, 'App\\Models\\User', 11),
(374, 'App\\Models\\User', 1),
(374, 'App\\Models\\User', 11),
(375, 'App\\Models\\User', 1),
(375, 'App\\Models\\User', 11),
(376, 'App\\Models\\User', 1),
(376, 'App\\Models\\User', 11),
(377, 'App\\Models\\User', 1),
(377, 'App\\Models\\User', 11),
(378, 'App\\Models\\User', 1),
(378, 'App\\Models\\User', 11),
(379, 'App\\Models\\User', 1),
(379, 'App\\Models\\User', 11),
(380, 'App\\Models\\User', 1),
(380, 'App\\Models\\User', 11),
(381, 'App\\Models\\User', 1),
(381, 'App\\Models\\User', 11),
(382, 'App\\Models\\User', 1),
(382, 'App\\Models\\User', 11),
(383, 'App\\Models\\User', 1),
(383, 'App\\Models\\User', 11),
(384, 'App\\Models\\User', 1),
(384, 'App\\Models\\User', 11);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `packings`
--

CREATE TABLE `packings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `packings`
--

INSERT INTO `packings` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ROLL', 1, '2024-08-06 12:06:46', '2024-08-06 12:06:46'),
(2, 'BALE', 1, '2024-08-06 12:06:51', '2024-08-26 11:25:00');

-- --------------------------------------------------------

--
-- Table structure for table `packing_types`
--

CREATE TABLE `packing_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(250) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `packing_types`
--

INSERT INTO `packing_types` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ROLE', 1, NULL, NULL),
(2, 'BALE', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `paper_tube_sizes`
--

CREATE TABLE `paper_tube_sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `paper_tube_sizes`
--

INSERT INTO `paper_tube_sizes` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(2, '0.250', 1, '2024-07-07 08:43:50', '2024-10-11 11:37:14');

-- --------------------------------------------------------

--
-- Table structure for table `party_to_locations`
--

CREATE TABLE `party_to_locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `payment_terms`
--

CREATE TABLE `payment_terms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `payment_terms_for` int(11) DEFAULT NULL,
  `days` int(11) NOT NULL DEFAULT 0,
  `interest` double NOT NULL DEFAULT 0,
  `advance` double NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `payment_terms`
--

INSERT INTO `payment_terms` (`id`, `name`, `description`, `payment_terms_for`, `days`, `interest`, `advance`, `status`, `created_at`, `updated_at`) VALUES
(8, 'PI TERMS DOM', 'TERMS & CONDITION :\r\nTERMS AND CONDITIONS\r\nNo Credit will be allowed \r\n\r\nT.T before shipment\r\n\r\nGoods once sold Cannot be taken back Subject to TIRUPPUR jurisdiction\r\n\r\nWe Declare that this invoice shows the actual price of goods Described and that all particulars are\r\nBANK: STATE BANK OF INDIA\r\nA/C NO : 43135352133\r\nIFSC NO: SBIN0064320\r\nBRANCH: CHENNAI', 9, 0, 0, 0, 1, '2025-01-08 12:41:53', '2025-01-08 12:41:53'),
(9, '30 DAYS PDC', '30 DAYS PDC', 8, 0, 0, 0, 1, '2025-01-08 12:43:26', '2025-01-08 12:43:26'),
(10, 'PI TERMS', 'No Credit will be allowed \r\n\r\nT.T before shipment\r\n\r\nGoods once sold Cannot be taken back Subject to TIRUPPUR jurisdiction\r\n\r\nWe Declare that this invoice shows the actual price of goods Described and that all particulars are\r\nBANK: ICICI BANK\r\nA/C NO : 262805000214   \r\nIFSC NO: ICIC0002628\r\nBRANCH: PALAKKAD', 9, 0, 0, 0, 1, '2025-01-08 12:43:55', '2025-01-08 12:43:55'),
(11, 'ADVANCE PAYMENT ,NO CREDIT', 'ADVANCE PAYMENT ,NO CREDIT', 9, 0, 0, 0, 1, '2025-01-08 12:44:20', '2025-01-08 12:44:20'),
(12, '30 DAYS CREDIT', '30 DAYS CREDIT', 9, 0, 0, 0, 1, '2025-01-08 12:44:37', '2025-01-08 12:44:37'),
(13, 'AGAINST INVOICE', 'No Credit will be allowed \r\nPayment only by NEFT/RTGS/IMPS/UPI \r\nInterest @ 18% will be charged if the payment is not made in 30days\r\n\r\nWe Declare that this invoice shows the actual price of goods Described and that all particulars are correct', 9, 0, 0, 0, 1, '2025-01-08 12:45:03', '2025-01-08 12:45:03'),
(14, 'AGAINST INVOICE', 'No Credit will be allowed \r\nPayment only by TT transfer  \r\nInterest @ 18% will be charged if the payment is not made in 30days\r\n\r\nWe Declare that this invoice shows the actual price of goods Described and that all particulars are correct', 8, 0, 0, 0, 1, '2025-01-08 12:45:38', '2025-01-08 12:45:38');

-- --------------------------------------------------------

--
-- Table structure for table `payment_types`
--

CREATE TABLE `payment_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `payment_types`
--

INSERT INTO `payment_types` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(8, 'EXPORT', 1, '2024-10-11 06:45:25', '2024-10-11 06:45:25'),
(9, 'DOMESTIC', 1, '2024-10-11 06:45:36', '2024-10-11 06:45:36');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `libelle` varchar(250) DEFAULT NULL,
  `perm_fam_id` int(11) DEFAULT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `libelle`, `perm_fam_id`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'e_invoice_settings-view', 'E - Invoice Settings', 1, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(2, 'e_invoice_settings-create', 'E - Invoice Settings', 1, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(3, 'e_invoice_settings-update', 'E - Invoice Settings', 1, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(4, 'e_invoice_settings-delete', 'E - Invoice Settings', 1, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(5, 'certification_type-view', 'Certification Type', 1, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(6, 'certification_type-create', 'Certification Type', 1, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(7, 'certification_type-update', 'Certification Type', 1, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(8, 'certification_type-delete', 'Certification Type', 1, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(9, 'consignee-view', 'Consignee', 1, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(10, 'consignee-create', 'Consignee', 1, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(11, 'consignee-update', 'Consignee', 1, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(12, 'consignee-delete', 'Consignee', 1, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(13, 'shade_master-view', 'Shade Master', 1, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(14, 'shade_master-create', 'Shade Master', 1, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(15, 'shade_master-update', 'Shade Master', 1, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(16, 'shade_master-delete', 'Shade Master', 1, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(17, 'vendor-view', 'Vendor', 1, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(18, 'vendor-create', 'Vendor', 1, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(19, 'vendor-update', 'Vendor', 1, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(20, 'vendor-delete', 'Vendor', 1, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(21, 'group_type-view', 'Group Type', 1, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(22, 'group_type-create', 'Group Type', 1, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(23, 'group_type-update', 'Group Type', 1, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(24, 'group_type-delete', 'Group Type', 1, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(25, 'vendor_group-view', 'Vendor Group', 1, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(26, 'vendor_group-create', 'Vendor Group', 1, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(27, 'vendor_group-update', 'Vendor Group', 1, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(28, 'vendor_group-delete', 'Vendor Group', 1, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(29, 'godown_location-view', 'Godown Location', 1, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(30, 'godown_location-create', 'Godown Location', 1, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(31, 'godown_location-update', 'Godown Location', 1, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(32, 'godown_location-delete', 'Godown Location', 1, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(33, 'sales_master_type-view', 'Sales Master Type', 1, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(34, 'sales_master_type-create', 'Sales Master Type', 1, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(35, 'sales_master_type-update', 'Sales Master Type', 1, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(36, 'sales_master_type-delete', 'Sales Master Type', 1, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(37, 'gst-view', 'GST', 1, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(38, 'gst-create', 'GST', 1, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(39, 'gst-update', 'GST', 1, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(40, 'gst-delete', 'GST', 1, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(41, 'color-view', 'Color', 1, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(42, 'color-create', 'Color', 1, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(43, 'color-update', 'Color', 1, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(44, 'color-delete', 'Color', 1, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(45, 'copart-view', 'Copart', 1, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(46, 'copart-create', 'Copart', 1, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(47, 'copart-update', 'Copart', 1, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(48, 'copart-delete', 'Copart', 1, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(49, 'contract_type-view', 'Contract Type', 1, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(50, 'contract_type-create', 'Contract Type', 1, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(51, 'contract_type-update', 'Contract Type', 1, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(52, 'contract_type-delete', 'Contract Type', 1, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(53, 'agents-view', 'Agents', 10, 'web', '2024-09-18 10:24:24', '2025-02-01 10:12:50'),
(54, 'agents-create', 'Agents', 10, 'web', '2024-09-18 10:24:24', '2025-02-01 10:12:50'),
(55, 'agents-update', 'Agents', 10, 'web', '2024-09-18 10:24:24', '2025-02-01 10:12:50'),
(56, 'agents-delete', 'Agents', 10, 'web', '2024-09-18 10:24:24', '2025-02-01 10:12:50'),
(57, 'transportation-view', 'Transportation', 1, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(58, 'transportation-create', 'Transportation', 1, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(59, 'transportation-update', 'Transportation', 1, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(60, 'transportation-delete', 'Transportation', 1, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(61, 'loom_type-view', 'Loom Type', 15, 'web', '2024-09-18 10:24:24', '2025-02-01 10:12:49'),
(62, 'loom_type-create', 'Loom Type', 15, 'web', '2024-09-18 10:24:24', '2025-02-01 10:12:49'),
(63, 'loom_type-update', 'Loom Type', 15, 'web', '2024-09-18 10:24:24', '2025-02-01 10:12:49'),
(64, 'loom_type-delete', 'Loom Type', 15, 'web', '2024-09-18 10:24:24', '2025-02-01 10:12:49'),
(65, 'delivery_items-view', 'Delivery Items', 1, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(66, 'delivery_items-create', 'Delivery Items', 1, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(67, 'delivery_items-update', 'Delivery Items', 1, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(68, 'delivery_items-delete', 'Delivery Items', 1, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(69, 'inspection_type-view', 'Inspection Type', 1, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(70, 'inspection_type-create', 'Inspection Type', 1, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(71, 'inspection_type-update', 'Inspection Type', 1, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(72, 'inspection_type-delete', 'Inspection Type', 1, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(73, 'packing_type-view', 'Packing Type', 9, 'web', '2024-09-18 10:24:24', '2025-02-01 10:12:50'),
(74, 'packing_type-create', 'Packing Type', 9, 'web', '2024-09-18 10:24:24', '2025-02-01 10:12:50'),
(75, 'packing_type-update', 'Packing Type', 9, 'web', '2024-09-18 10:24:24', '2025-02-01 10:12:50'),
(76, 'packing_type-delete', 'Packing Type', 9, 'web', '2024-09-18 10:24:24', '2025-02-01 10:12:50'),
(77, 'mill_master-view', 'Mill Master', 14, 'web', '2024-09-18 10:24:24', '2025-02-01 10:12:49'),
(78, 'mill_master-create', 'Mill Master', 14, 'web', '2024-09-18 10:24:24', '2025-02-01 10:12:49'),
(79, 'mill_master-update', 'Mill Master', 14, 'web', '2024-09-18 10:24:24', '2025-02-01 10:12:49'),
(80, 'mill_master-delete', 'Mill Master', 14, 'web', '2024-09-18 10:24:24', '2025-02-01 10:12:49'),
(81, 'country-view', 'Country', 10, 'web', '2024-09-18 10:24:24', '2025-02-01 10:12:50'),
(82, 'country-create', 'Country', 10, 'web', '2024-09-18 10:24:24', '2025-02-01 10:12:50'),
(83, 'country-update', 'Country', 10, 'web', '2024-09-18 10:24:24', '2025-02-01 10:12:50'),
(84, 'country-delete', 'Country', 10, 'web', '2024-09-18 10:24:24', '2025-02-01 10:12:50'),
(85, 'payment_types-view', 'Payment types', 1, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(86, 'payment_types-create', 'Payment types', 1, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(87, 'payment_types-update', 'Payment types', 1, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(88, 'payment_types-delete', 'Payment types', 1, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(89, 'payment_terms-view', 'Payment Terms', 1, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(90, 'payment_terms-create', 'Payment Terms', 1, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(91, 'payment_terms-update', 'Payment Terms', 1, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(92, 'payment_terms-delete', 'Payment Terms', 1, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(93, 'gst_registered_type-view', 'GST Registered Type', 1, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(94, 'gst_registered_type-create', 'GST Registered Type', 1, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(95, 'gst_registered_type-update', 'GST Registered Type', 1, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(96, 'gst_registered_type-delete', 'GST Registered Type', 1, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(97, 'account_group-view', 'Account Group', 1, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(98, 'account_group-create', 'Account Group', 1, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(99, 'account_group-update', 'Account Group', 1, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(100, 'account_group-delete', 'Account Group', 1, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(101, 'buyer-view', 'Buyer', 2, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(102, 'buyer-create', 'Buyer', 2, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(103, 'buyer-update', 'Buyer', 2, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(104, 'buyer-delete', 'Buyer', 2, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(105, 'sales_order-view', 'Sales Order', 2, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(106, 'sales_order-create', 'Sales Order', 2, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(107, 'sales_order-update', 'Sales Order', 2, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(108, 'sales_order-delete', 'Sales Order', 2, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(109, 'packing_list-view', 'Packing List', 2, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(110, 'packing_list-create', 'Packing List', 2, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(111, 'packing_list-update', 'Packing List', 2, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(112, 'packing_list-delete', 'Packing List', 2, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(113, 'export_invoice_list-view', 'Export Invoice List', 2, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(114, 'export_invoice_list-create', 'Export Invoice List', 2, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(115, 'export_invoice_list-update', 'Export Invoice List', 2, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(116, 'export_invoice_list-delete', 'Export Invoice List', 2, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(117, 'licence-view', 'Licence', 2, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(118, 'licence-create', 'Licence', 2, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(119, 'licence-update', 'Licence', 2, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(120, 'licence-delete', 'Licence', 2, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(121, 'pre_carriage_by-view', 'Pre-Carriage By', 2, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(122, 'pre_carriage_by-create', 'Pre-Carriage By', 2, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(123, 'pre_carriage_by-update', 'Pre-Carriage By', 2, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(124, 'pre_carriage_by-delete', 'Pre-Carriage By', 2, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(125, 'port-view', 'Port', 2, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(126, 'port-create', 'Port', 2, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(127, 'port-update', 'Port', 2, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(128, 'port-delete', 'Port', 2, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(129, 'port_of_destination-view', 'Port Of Destination', 2, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(130, 'port_of_destination-create', 'Port Of Destination', 2, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(131, 'port_of_destination-update', 'Port Of Destination', 2, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(132, 'port_of_destination-delete', 'Port Of Destination', 2, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(133, 'bank-view', 'Bank', 2, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(134, 'bank-create', 'Bank', 2, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(135, 'bank-update', 'Bank', 2, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(136, 'bank-delete', 'Bank', 2, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(137, 'container_size-view', 'Container Size', 2, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(138, 'container_size-create', 'Container Size', 2, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(139, 'container_size-update', 'Container Size', 2, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(140, 'container_size-delete', 'Container Size', 2, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(141, 'sales_co_ordinators-view', 'Sales Co Ordinators', 2, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(142, 'sales_co_ordinators-create', 'Sales Co Ordinators', 2, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(143, 'sales_co_ordinators-update', 'Sales Co Ordinators', 2, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(144, 'sales_co_ordinators-delete', 'Sales Co Ordinators', 2, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(145, 'shipping_terms-view', 'Shipping Terms', 2, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(146, 'shipping_terms-create', 'Shipping Terms', 2, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(147, 'shipping_terms-update', 'Shipping Terms', 2, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(148, 'shipping_terms-delete', 'Shipping Terms', 2, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(149, 'so_types-view', 'So Types', 2, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(150, 'so_types-create', 'So Types', 2, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(151, 'so_types-update', 'So Types', 2, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(152, 'so_types-delete', 'So Types', 2, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(153, 'terms_&_conditions-view', 'Terms & Conditions', 2, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(154, 'terms_&_conditions-create', 'Terms & Conditions', 2, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(155, 'terms_&_conditions-update', 'Terms & Conditions', 2, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(156, 'terms_&_conditions-delete', 'Terms & Conditions', 2, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(157, 'units-view', 'Units', 2, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(158, 'units-create', 'Units', 2, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(159, 'units-update', 'Units', 2, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(160, 'units-delete', 'Units', 2, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(161, 'yarn_certification_types-view', 'Yarn Certification Types', 2, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(162, 'yarn_certification_types-create', 'Yarn Certification Types', 2, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(163, 'yarn_certification_types-update', 'Yarn Certification Types', 2, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(164, 'yarn_certification_types-delete', 'Yarn Certification Types', 2, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(165, 'export_so-view', 'Export SO', 3, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(166, 'export_so-create', 'Export SO', 3, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(167, 'export_so-update', 'Export SO', 3, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(168, 'export_so-delete', 'Export SO', 3, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(169, 'po_fabric_processing_jw-view', 'PO-Fabric Processing JW', 3, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(170, 'po_fabric_processing_jw-create', 'PO-Fabric Processing JW', 3, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(171, 'po_fabric_processing_jw-update', 'PO-Fabric Processing JW', 3, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(172, 'po_fabric_processing_jw-delete', 'PO-Fabric Processing JW', 3, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(173, 'po_yarn-view', 'PO Yarn', 3, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(174, 'po_yarn-create', 'PO Yarn', 3, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(175, 'po_yarn-update', 'PO Yarn', 3, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(176, 'po_yarn-delete', 'PO Yarn', 3, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(177, 'invoice-view', 'Invoice', 3, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(178, 'invoice-create', 'Invoice', 3, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(179, 'invoice-update', 'Invoice', 3, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(180, 'invoice-delete', 'Invoice', 3, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(181, 'count-view', 'Count', 14, 'web', '2024-09-18 10:24:24', '2024-10-15 13:07:58'),
(182, 'count-create', 'Count', 14, 'web', '2024-09-18 10:24:24', '2024-10-15 13:07:58'),
(183, 'count-update', 'Count', 14, 'web', '2024-09-18 10:24:24', '2024-10-15 13:07:58'),
(184, 'count-delete', 'Count', 14, 'web', '2024-09-18 10:24:24', '2024-10-15 13:07:58'),
(185, 'ply-view', 'Ply', 14, 'web', '2024-09-18 10:24:24', '2024-10-15 13:07:58'),
(186, 'ply-create', 'Ply', 14, 'web', '2024-09-18 10:24:24', '2024-10-15 13:07:58'),
(187, 'ply-update', 'Ply', 14, 'web', '2024-09-18 10:24:24', '2024-10-15 13:07:58'),
(188, 'ply-delete', 'Ply', 14, 'web', '2024-09-18 10:24:24', '2024-10-15 13:07:58'),
(189, 'uom-view', 'Uom', 14, 'web', '2024-09-18 10:24:24', '2024-10-15 13:07:58'),
(190, 'uom-create', 'Uom', 14, 'web', '2024-09-18 10:24:24', '2024-10-15 13:07:58'),
(191, 'uom-update', 'Uom', 14, 'web', '2024-09-18 10:24:24', '2024-10-15 13:07:58'),
(192, 'uom-delete', 'Uom', 14, 'web', '2024-09-18 10:24:24', '2024-10-15 13:07:58'),
(193, 'yarn_variety-view', 'Yarn Variety', 14, 'web', '2024-09-18 10:24:24', '2024-10-15 13:07:58'),
(194, 'yarn_variety-create', 'Yarn Variety', 14, 'web', '2024-09-18 10:24:24', '2024-10-15 13:07:58'),
(195, 'yarn_variety-update', 'Yarn Variety', 14, 'web', '2024-09-18 10:24:24', '2024-10-15 13:07:58'),
(196, 'yarn_variety-delete', 'Yarn Variety', 14, 'web', '2024-09-18 10:24:24', '2024-10-15 13:07:58'),
(197, 'yarn_type-view', 'Yarn Type', 14, 'web', '2024-09-18 10:24:24', '2024-10-15 13:07:58'),
(198, 'yarn_type-create', 'Yarn Type', 14, 'web', '2024-09-18 10:24:24', '2024-10-15 13:07:58'),
(199, 'yarn_type-update', 'Yarn Type', 14, 'web', '2024-09-18 10:24:24', '2024-10-15 13:07:58'),
(200, 'yarn_type-delete', 'Yarn Type', 14, 'web', '2024-09-18 10:24:24', '2024-10-15 13:07:58'),
(201, 'filaments-view', 'Filaments', 14, 'web', '2024-09-18 10:24:24', '2024-10-15 13:07:58'),
(202, 'filaments-create', 'Filaments', 14, 'web', '2024-09-18 10:24:24', '2024-10-15 13:07:58'),
(203, 'filaments-update', 'Filaments', 14, 'web', '2024-09-18 10:24:24', '2024-10-15 13:07:58'),
(204, 'filaments-delete', 'Filaments', 14, 'web', '2024-09-18 10:24:24', '2024-10-15 13:07:58'),
(205, 'tpm-view', 'TPM', 14, 'web', '2024-09-18 10:24:24', '2024-10-15 13:07:58'),
(206, 'tpm-create', 'TPM', 14, 'web', '2024-09-18 10:24:24', '2024-10-15 13:07:58'),
(207, 'tpm-update', 'TPM', 14, 'web', '2024-09-18 10:24:24', '2024-10-15 13:07:58'),
(208, 'tpm-delete', 'TPM', 14, 'web', '2024-09-18 10:24:24', '2024-10-15 13:07:58'),
(209, 'blends-view', 'Blends', 14, 'web', '2024-09-18 10:24:24', '2024-10-15 13:07:58'),
(210, 'blends-create', 'Blends', 14, 'web', '2024-09-18 10:24:24', '2024-10-15 13:07:58'),
(211, 'blends-update', 'Blends', 14, 'web', '2024-09-18 10:24:24', '2024-10-15 13:07:58'),
(212, 'blends-delete', 'Blends', 14, 'web', '2024-09-18 10:24:24', '2024-10-15 13:07:58'),
(213, 'yarn_master-view', 'Yarn Master', 14, 'web', '2024-09-18 10:24:24', '2024-10-15 13:07:58'),
(214, 'yarn_master-create', 'Yarn Master', 14, 'web', '2024-09-18 10:24:24', '2024-10-15 13:07:58'),
(215, 'yarn_master-update', 'Yarn Master', 14, 'web', '2024-09-18 10:24:24', '2024-10-15 13:07:58'),
(216, 'yarn_master-delete', 'Yarn Master', 14, 'web', '2024-09-18 10:24:24', '2024-10-15 13:07:58'),
(217, 'yarn_inward-view', 'Yarn Inward', 5, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(218, 'yarn_inward-create', 'Yarn Inward', 5, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(219, 'yarn_inward-update', 'Yarn Inward', 5, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(220, 'yarn_inward-delete', 'Yarn Inward', 5, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(221, 'yarn_po-view', 'Yarn PO', 6, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(222, 'yarn_po-create', 'Yarn PO', 6, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(223, 'yarn_po-update', 'Yarn PO', 6, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(224, 'yarn_po-delete', 'Yarn PO', 6, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(225, 'csp_list-view', 'CSP List', 6, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(226, 'csp_list-create', 'CSP List', 6, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(227, 'csp_list-update', 'CSP List', 6, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(228, 'csp_list-delete', 'CSP List', 6, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(229, 'hairiness-view', 'Hairiness', 6, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(230, 'hairiness-create', 'Hairiness', 6, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(231, 'hairiness-update', 'Hairiness', 6, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(232, 'hairiness-delete', 'Hairiness', 6, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(233, 'count_cv-view', 'Count CV', 6, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(234, 'count_cv-create', 'Count CV', 6, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(235, 'count_cv-update', 'Count CV', 6, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(236, 'count_cv-delete', 'Count CV', 6, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(237, 'strength_cv-view', 'Strength CV', 6, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(238, 'strength_cv-create', 'Strength CV', 6, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(239, 'strength_cv-update', 'Strength CV', 6, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(240, 'strength_cv-delete', 'Strength CV', 6, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(241, 'selvedge_master-view', 'Selvedge Master', 15, 'web', '2024-09-18 10:24:24', '2024-10-15 13:07:58'),
(242, 'selvedge_master-create', 'Selvedge Master', 15, 'web', '2024-09-18 10:24:24', '2024-10-15 13:07:58'),
(243, 'selvedge_master-update', 'Selvedge Master', 15, 'web', '2024-09-18 10:24:24', '2024-10-15 13:07:58'),
(244, 'selvedge_master-delete', 'Selvedge Master', 15, 'web', '2024-09-18 10:24:24', '2024-10-15 13:07:58'),
(245, 'weave-view', 'Weave', 15, 'web', '2024-09-18 10:24:24', '2024-10-15 13:07:58'),
(246, 'weave-create', 'Weave', 15, 'web', '2024-09-18 10:24:24', '2024-10-15 13:07:58'),
(247, 'weave-update', 'Weave', 15, 'web', '2024-09-18 10:24:24', '2024-10-15 13:07:58'),
(248, 'weave-delete', 'Weave', 15, 'web', '2024-09-18 10:24:24', '2024-10-15 13:07:58'),
(249, 'paper_tube_size-view', 'Paper Tube Size', 15, 'web', '2024-09-18 10:24:24', '2024-10-15 13:07:58'),
(250, 'paper_tube_size-create', 'Paper Tube Size', 15, 'web', '2024-09-18 10:24:24', '2024-10-15 13:07:58'),
(251, 'paper_tube_size-update', 'Paper Tube Size', 15, 'web', '2024-09-18 10:24:24', '2024-10-15 13:07:58'),
(252, 'paper_tube_size-delete', 'Paper Tube Size', 15, 'web', '2024-09-18 10:24:24', '2024-10-15 13:07:58'),
(253, 'sort_master-view', 'Sort Master', 15, 'web', '2024-09-18 10:24:24', '2024-10-15 13:07:58'),
(254, 'sort_master-create', 'Sort Master', 15, 'web', '2024-09-18 10:24:24', '2024-10-15 13:07:58'),
(255, 'sort_master-update', 'Sort Master', 15, 'web', '2024-09-18 10:24:24', '2024-10-15 13:07:58'),
(256, 'sort_master-delete', 'Sort Master', 15, 'web', '2024-09-18 10:24:24', '2024-10-15 13:07:58'),
(257, 'orders_list-view', 'Orders List', 8, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(258, 'orders_list-create', 'Orders List', 8, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(259, 'orders_list-update', 'Orders List', 8, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(260, 'orders_list-delete', 'Orders List', 8, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(261, 'jobwork_weaving_contract-view', 'Jobwork Weaving Contract', 8, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(262, 'jobwork_weaving_contract-create', 'Jobwork Weaving Contract', 8, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(263, 'jobwork_weaving_contract-update', 'Jobwork Weaving Contract', 8, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(264, 'jobwork_weaving_contract-delete', 'Jobwork Weaving Contract', 8, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(265, 'jobwork_weaving_weft_issue-view', 'Jobwork Weaving Weft Issue', 8, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(266, 'jobwork_weaving_weft_issue-create', 'Jobwork Weaving Weft Issue', 8, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(267, 'jobwork_weaving_weft_issue-update', 'Jobwork Weaving Weft Issue', 8, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(268, 'jobwork_weaving_weft_issue-delete', 'Jobwork Weaving Weft Issue', 8, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(269, 'jobwork_process_contract-view', 'JobWork Process Contract', 8, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(270, 'jobwork_process_contract-create', 'JobWork Process Contract', 8, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(271, 'jobwork_process_contract-update', 'JobWork Process Contract', 8, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(272, 'jobwork_process_contract-delete', 'JobWork Process Contract', 8, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(273, 'jobwork_process_contract_issue-view', 'JobWork Process Contract Issue', 8, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(274, 'jobwork_process_contract_issue-create', 'JobWork Process Contract Issue', 8, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(275, 'jobwork_process_contract_issue-update', 'JobWork Process Contract Issue', 8, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(276, 'jobwork_process_contract_issue-delete', 'JobWork Process Contract Issue', 8, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(277, 'jobwork_finished_fabric_receive-view', 'JobWork Finished Fabric Receive', 8, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(278, 'jobwork_finished_fabric_receive-create', 'JobWork Finished Fabric Receive', 8, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(279, 'jobwork_finished_fabric_receive-update', 'JobWork Finished Fabric Receive', 8, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(280, 'jobwork_finished_fabric_receive-delete', 'JobWork Finished Fabric Receive', 8, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(281, 'sizing_plan-view', 'Sizing Plan', 8, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(282, 'sizing_plan-create', 'Sizing Plan', 8, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(283, 'sizing_plan-update', 'Sizing Plan', 8, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(284, 'sizing_plan-delete', 'Sizing Plan', 8, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(285, 'sizing_yarn_issue-view', 'Sizing Yarn Issue', 8, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(286, 'sizing_yarn_issue-create', 'Sizing Yarn Issue', 8, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(287, 'sizing_yarn_issue-update', 'Sizing Yarn Issue', 8, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(288, 'sizing_yarn_issue-delete', 'Sizing Yarn Issue', 8, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(289, 'beam_inward-view', 'Beam Inward', 8, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(290, 'beam_inward-create', 'Beam Inward', 8, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(291, 'beam_inward-update', 'Beam Inward', 8, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(292, 'beam_inward-delete', 'Beam Inward', 8, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(293, 'beam_outward-view', 'Beam Outward', 8, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(294, 'beam_outward-create', 'Beam Outward', 8, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(295, 'beam_outward-update', 'Beam Outward', 8, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(296, 'beam_outward-delete', 'Beam Outward', 8, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(297, 'jobwork_fabric_receive-view', 'Jobwork Fabric Receive', 9, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(298, 'jobwork_fabric_receive-create', 'Jobwork Fabric Receive', 9, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(299, 'jobwork_fabric_receive-update', 'Jobwork Fabric Receive', 9, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(300, 'jobwork_fabric_receive-delete', 'Jobwork Fabric Receive', 9, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(301, 'bale_packing-view', 'Bale Packing', 9, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(302, 'bale_packing-create', 'Bale Packing', 9, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(303, 'bale_packing-update', 'Bale Packing', 9, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(304, 'bale_packing-delete', 'Bale Packing', 9, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(305, 'cloth_challan-view', 'Cloth Challan', 9, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(306, 'cloth_challan-create', 'Cloth Challan', 9, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(307, 'cloth_challan-update', 'Cloth Challan', 9, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(308, 'cloth_challan-delete', 'Cloth Challan', 9, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(309, 'inspection_list-view', 'Inspection List', 10, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(310, 'inspection_list-create', 'Inspection List', 10, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(311, 'inspection_list-update', 'Inspection List', 10, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(312, 'inspection_list-delete', 'Inspection List', 10, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(313, 'delivery_terms-view', 'Delivery Terms', 10, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(314, 'delivery_terms-create', 'Delivery Terms', 10, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(315, 'delivery_terms-update', 'Delivery Terms', 10, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(316, 'delivery_terms-delete', 'Delivery Terms', 10, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(317, 'city-view', 'City', 10, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(318, 'city-create', 'City', 10, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(319, 'city-update', 'City', 10, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(320, 'city-delete', 'City', 10, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(321, 'state-view', 'State', 10, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(322, 'state-create', 'State', 10, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(323, 'state-update', 'State', 10, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(324, 'state-delete', 'State', 10, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(325, 'party_to_location-view', 'Party to Location', 10, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(326, 'party_to_location-create', 'Party to Location', 10, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(327, 'party_to_location-update', 'Party to Location', 10, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(328, 'party_to_location-delete', 'Party to Location', 10, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(329, 'roll_/_bale_print_page-view', 'Roll / Bale Print Page', 10, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(330, 'roll_/_bale_print_page-create', 'Roll / Bale Print Page', 10, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(331, 'roll_/_bale_print_page-update', 'Roll / Bale Print Page', 10, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(332, 'roll_/_bale_print_page-delete', 'Roll / Bale Print Page', 10, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(333, 'customer-view', 'Customer', 10, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(334, 'customer-create', 'Customer', 10, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(335, 'customer-update', 'Customer', 10, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(336, 'customer-delete', 'Customer', 10, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(337, 'sourcing_executives-view', 'Sourcing Executives', 10, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(338, 'sourcing_executives-create', 'Sourcing Executives', 10, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(339, 'sourcing_executives-update', 'Sourcing Executives', 10, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(340, 'sourcing_executives-delete', 'Sourcing Executives', 10, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(341, 'weave_factors-view', 'Weave Factors', 10, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(342, 'weave_factors-create', 'Weave Factors', 10, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(343, 'weave_factors-update', 'Weave Factors', 10, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(344, 'weave_factors-delete', 'Weave Factors', 10, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(345, 'costing-view', 'Costing', 10, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(346, 'costing-create', 'Costing', 10, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(347, 'costing-update', 'Costing', 10, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(348, 'costing-delete', 'Costing', 10, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(349, 'user-view', 'User', 11, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(350, 'user-create', 'User', 11, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(351, 'user-update', 'User', 11, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(352, 'user-delete', 'User', 11, 'web', '2024-09-18 10:24:24', '2024-09-18 10:24:24'),
(353, 'set_list-view', 'Set List', 15, 'web', '2024-09-18 10:24:24', '2024-10-15 13:07:58'),
(354, 'set_list-create', 'Set List', 15, 'web', '2024-09-18 10:24:24', '2024-10-15 13:07:58'),
(355, 'set_list-update', 'Set List', 15, 'web', '2024-09-18 10:24:24', '2024-10-15 13:07:58'),
(356, 'set_list-delete', 'Set List', 15, 'web', '2024-09-18 10:24:24', '2024-10-15 13:07:58'),
(357, 'machine-view', 'Machine', 1, 'web', '2024-10-15 13:07:58', '2024-10-15 13:07:58'),
(358, 'machine-create', 'Machine', 1, 'web', '2024-10-15 13:07:58', '2024-10-15 13:07:58'),
(359, 'machine-update', 'Machine', 1, 'web', '2024-10-15 13:07:58', '2024-10-15 13:07:58'),
(360, 'machine-delete', 'Machine', 1, 'web', '2024-10-15 13:07:58', '2024-10-15 13:07:58'),
(361, 'fabric_po-view', 'Fabric PO', 6, 'web', '2024-11-18 09:21:06', '2024-11-18 09:21:06'),
(362, 'fabric_po-create', 'Fabric PO', 6, 'web', '2024-11-18 09:21:06', '2024-11-18 09:21:06'),
(363, 'fabric_po-update', 'Fabric PO', 6, 'web', '2024-11-18 09:21:06', '2024-11-18 09:21:06'),
(364, 'fabric_po-delete', 'Fabric PO', 6, 'web', '2024-11-18 09:21:06', '2024-11-18 09:21:06'),
(365, 'po_fabric_purchase-view', 'PO-Fabric Purchase', 3, 'web', '2024-11-18 16:20:28', '2024-11-18 16:20:28'),
(366, 'po_fabric_purchase-create', 'PO-Fabric Purchase', 3, 'web', '2024-11-18 16:20:28', '2024-11-18 16:20:28'),
(367, 'po_fabric_purchase-update', 'PO-Fabric Purchase', 3, 'web', '2024-11-18 16:20:28', '2024-11-18 16:20:28'),
(368, 'po_fabric_purchase-delete', 'PO-Fabric Purchase', 3, 'web', '2024-11-18 16:20:28', '2024-11-18 16:20:28'),
(369, 'fabric_inward-view', 'Fabric Inward', 5, 'web', '2024-11-19 19:57:15', '2024-11-19 19:57:15'),
(370, 'fabric_inward-create', 'Fabric Inward', 5, 'web', '2024-11-19 19:57:15', '2024-11-19 19:57:15'),
(371, 'fabric_inward-update', 'Fabric Inward', 5, 'web', '2024-11-19 19:57:15', '2024-11-19 19:57:15'),
(372, 'fabric_inward-delete', 'Fabric Inward', 5, 'web', '2024-11-19 19:57:15', '2024-11-19 19:57:15'),
(373, 'yarn_opening_balance-view', 'Yarn Opening Balance', 5, 'web', '2024-11-19 19:57:15', '2024-11-19 19:57:15'),
(374, 'yarn_opening_balance-create', 'Yarn Opening Balance', 5, 'web', '2024-11-19 19:57:15', '2024-11-19 19:57:15'),
(375, 'yarn_opening_balance-update', 'Yarn Opening Balance', 5, 'web', '2024-11-19 19:57:15', '2024-11-19 19:57:15'),
(376, 'yarn_opening_balance-delete', 'Yarn Opening Balance', 5, 'web', '2024-11-19 19:57:15', '2024-11-19 19:57:15'),
(377, 'fabric_opening_balance-view', 'Fabric Opening Balance', 5, 'web', '2024-11-19 19:57:15', '2024-11-19 19:57:15'),
(378, 'fabric_opening_balance-create', 'Fabric Opening Balance', 5, 'web', '2024-11-19 19:57:15', '2024-11-19 19:57:15'),
(379, 'fabric_opening_balance-update', 'Fabric Opening Balance', 5, 'web', '2024-11-19 19:57:15', '2024-11-19 19:57:15'),
(380, 'fabric_opening_balance-delete', 'Fabric Opening Balance', 5, 'web', '2024-11-19 19:57:15', '2024-11-19 19:57:15'),
(381, 'ship_to-view', 'Ship To', 2, 'web', '2025-02-01 10:12:49', '2025-02-01 10:12:49'),
(382, 'ship_to-create', 'Ship To', 2, 'web', '2025-02-01 10:12:49', '2025-02-01 10:12:49'),
(383, 'ship_to-update', 'Ship To', 2, 'web', '2025-02-01 10:12:49', '2025-02-01 10:12:49'),
(384, 'ship_to-delete', 'Ship To', 2, 'web', '2025-02-01 10:12:49', '2025-02-01 10:12:49');

-- --------------------------------------------------------

--
-- Table structure for table `permissions_fams`
--

CREATE TABLE `permissions_fams` (
  `id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `libelle` varchar(250) DEFAULT NULL,
  `ordre` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `permissions_fams`
--

INSERT INTO `permissions_fams` (`id`, `name`, `libelle`, `ordre`, `created_at`, `updated_at`) VALUES
(1, 'Masters', 'Masters', 0, '2024-09-18 10:03:20', '2024-09-18 10:03:20'),
(2, 'Export', 'Export', 25, '2024-09-18 10:17:46', '2024-09-18 10:17:46'),
(3, 'Approvals', 'Approvals', 41, '2024-09-18 10:17:46', '2024-09-18 10:17:46'),
(5, 'Stock', 'Stock', 55, '2024-09-18 10:17:46', '2024-09-18 10:17:46'),
(6, 'Purchase', 'Purchase', 56, '2024-09-18 10:17:46', '2024-09-18 10:17:46'),
(8, 'Planning', 'Planning', 66, '2024-09-18 10:17:46', '2024-09-18 10:17:46'),
(9, 'Warehouse', 'Warehouse', 76, '2024-09-18 10:17:46', '2024-09-18 10:17:46'),
(10, 'Others', 'Others', 80, '2024-09-18 10:17:46', '2024-09-18 10:17:46'),
(11, 'Users', 'Users', 92, '2024-09-18 10:17:46', '2024-09-18 10:17:46'),
(12, 'Yarn_Master', 'Yarn Master', 45, '2024-09-18 13:21:08', '2024-09-18 13:21:08'),
(13, 'Sort_Master', 'Sort Master', 61, '2024-09-18 13:21:08', '2024-09-18 13:21:08'),
(14, 'Yarn_Master', 'Yarn_Master', 46, '2024-10-15 13:07:58', '2024-10-15 13:07:58'),
(15, 'Sort_Master', 'Sort_Master', 62, '2024-10-15 13:07:58', '2024-10-15 13:07:58');

-- --------------------------------------------------------

--
-- Table structure for table `ply`
--

CREATE TABLE `ply` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ply` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ply`
--

INSERT INTO `ply` (`id`, `ply`, `status`, `created_at`, `updated_at`) VALUES
(7, '1.0', 1, '2024-10-11 06:57:28', '2024-10-12 02:55:48'),
(8, '2.0', 1, '2024-10-11 06:57:33', '2024-10-12 02:55:54'),
(9, '3.0', 1, '2024-10-11 06:57:37', '2024-10-12 02:55:42');

-- --------------------------------------------------------

--
-- Table structure for table `ports`
--

CREATE TABLE `ports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `pin` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `city` int(11) NOT NULL,
  `state` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ports`
--

INSERT INTO `ports` (`id`, `name`, `code`, `pin`, `description`, `city`, `state`, `status`, `created_at`, `updated_at`) VALUES
(4, 'loading port 1', '3211', '325641', 'loading port 1', 8, 2, 1, '2025-01-28 18:41:04', '2025-01-28 18:41:04');

-- --------------------------------------------------------

--
-- Table structure for table `port_of_destinations`
--

CREATE TABLE `port_of_destinations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `pin` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `city` int(11) NOT NULL,
  `state` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `po_types`
--

CREATE TABLE `po_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `po_types`
--

INSERT INTO `po_types` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Direct', 1, '2024-07-05 10:00:45', '2024-07-05 13:26:19'),
(2, 'PR', 1, '2024-10-15 14:59:45', '2024-10-15 14:59:45');

-- --------------------------------------------------------

--
-- Table structure for table `pre_carriage`
--

CREATE TABLE `pre_carriage` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `pre_carriage`
--

INSERT INTO `pre_carriage` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'BY ROAD', 1, '2024-08-16 11:10:02', '2025-01-08 13:16:39');

-- --------------------------------------------------------

--
-- Table structure for table `processes`
--

CREATE TABLE `processes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `processes`
--

INSERT INTO `processes` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'DEYING', 1, '2024-07-05 10:00:45', '2024-07-05 13:26:19'),
(2, 'FINISHING', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `process_returns`
--

CREATE TABLE `process_returns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `prs`
--

CREATE TABLE `prs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `prs`
--

INSERT INTO `prs` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'pr-1', 1, '2024-07-05 10:00:45', '2024-07-05 13:26:19');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_returns`
--

CREATE TABLE `purchase_returns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_types`
--

CREATE TABLE `purchase_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `purchase_types`
--

INSERT INTO `purchase_types` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Domestic', 1, '2024-07-05 10:00:45', '2024-07-05 13:26:19'),
(2, 'Import', 1, '2024-07-05 10:00:45', '2024-07-05 13:26:19');

-- --------------------------------------------------------

--
-- Table structure for table `qualities`
--

CREATE TABLE `qualities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `reasons`
--

CREATE TABLE `reasons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'super-admin', 'web', '2024-09-18 10:02:00', '2024-09-18 10:02:00');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `roll_bale_print_pages`
--

CREATE TABLE `roll_bale_print_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `roll_bale_print_pages`
--

INSERT INTO `roll_bale_print_pages` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Roll', 1, '2024-07-05 10:00:45', '2024-08-16 10:50:33');

-- --------------------------------------------------------

--
-- Table structure for table `sales_co_ordinators`
--

CREATE TABLE `sales_co_ordinators` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `sales_co_ordinators`
--

INSERT INTO `sales_co_ordinators` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(5, 'admin', 1, '2024-09-22 15:07:26', '2024-10-11 06:54:40');

-- --------------------------------------------------------

--
-- Table structure for table `sales_orders`
--

CREATE TABLE `sales_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_no` varchar(100) DEFAULT NULL,
  `invoice_type_id` int(11) DEFAULT NULL,
  `contract_type_id` int(11) DEFAULT NULL,
  `buyer_id` int(11) DEFAULT NULL,
  `tax_id` int(11) DEFAULT NULL,
  `sourcing_executive_id` int(11) DEFAULT NULL,
  `ship_to_id` int(11) DEFAULT NULL,
  `agent_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `order_route_id` int(11) DEFAULT NULL,
  `shipping_terms_id` int(11) DEFAULT NULL,
  `bank_id` int(11) DEFAULT NULL,
  `container_size_id` int(11) DEFAULT NULL,
  `payment_terms_id` int(11) DEFAULT NULL,
  `terms_conditions_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `sales_co_ordinator_id` int(11) DEFAULT NULL,
  `so_type_id` int(11) DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  `po_date` date DEFAULT NULL,
  `confirmation_date` date DEFAULT NULL,
  `pi_date` date DEFAULT NULL,
  `po_no` varchar(150) DEFAULT NULL,
  `adress` varchar(250) DEFAULT NULL,
  `ship_adress` varchar(250) DEFAULT NULL,
  `sale_contract_no` varchar(250) DEFAULT NULL,
  `agent_percent` double DEFAULT NULL,
  `port_loading` int(11) DEFAULT NULL,
  `port_destination` int(11) DEFAULT NULL,
  `insurance` varchar(150) DEFAULT NULL,
  `shipping_terms_det` varchar(250) DEFAULT NULL,
  `shipping_method` varchar(250) DEFAULT NULL,
  `remark` varchar(250) DEFAULT NULL,
  `approval` int(1) DEFAULT NULL COMMENT '-1: canceled, 0: Hold or 1: Approved',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `sales_orders`
--

INSERT INTO `sales_orders` (`id`, `order_no`, `invoice_type_id`, `contract_type_id`, `buyer_id`, `tax_id`, `sourcing_executive_id`, `ship_to_id`, `agent_id`, `city_id`, `order_route_id`, `shipping_terms_id`, `bank_id`, `container_size_id`, `payment_terms_id`, `terms_conditions_id`, `user_id`, `sales_co_ordinator_id`, `so_type_id`, `order_date`, `po_date`, `confirmation_date`, `pi_date`, `po_no`, `adress`, `ship_adress`, `sale_contract_no`, `agent_percent`, `port_loading`, `port_destination`, `insurance`, `shipping_terms_det`, `shipping_method`, `remark`, `approval`, `created_at`, `updated_at`) VALUES
(35, 'HST/EX01/35', 1, 5, 7, NULL, NULL, NULL, 9, NULL, 14, NULL, NULL, 5, NULL, NULL, 1, 5, 3, '2024-10-11', NULL, NULL, NULL, NULL, '187/1, FIRST FLOOR, KUDULU MAIN ROAD', NULL, NULL, 0, NULL, NULL, NULL, NULL, 'road', '', NULL, '2024-10-11 12:21:51', '2024-11-07 16:31:10'),
(36, 'HST/EX01/36', 1, 5, 7, NULL, NULL, NULL, NULL, NULL, 14, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1, NULL, NULL, NULL, NULL, NULL, '187/1, FIRST FLOOR, KUDULU MAIN ROAD', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '2024-10-15 09:29:04', '2024-11-04 16:22:20'),
(37, 'HST/EX01/37', 1, 5, 9, NULL, NULL, NULL, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 3, NULL, NULL, '2025-02-01', NULL, NULL, 'ukkadam', NULL, NULL, 3, 1, 3, NULL, NULL, NULL, 'lm;gl', NULL, '2024-10-19 15:09:49', '2024-10-29 12:05:34'),
(38, 'HST/EX01/38', 1, 5, 9, NULL, NULL, NULL, 9, NULL, 20, 1, NULL, NULL, NULL, NULL, NULL, 5, 1, '2024-01-01', '2024-01-01', '2024-01-01', NULL, '21', '187/1, FIRST FLOOR, KUDULU MAIN ROAD', NULL, NULL, 0, 1, 1, 'ghv', NULL, 'sea', '', NULL, '2024-11-08 16:33:02', '2024-11-08 16:33:42'),
(39, 'HST/EX01/39', 1, 5, 9, NULL, NULL, NULL, 10, NULL, 21, 1, 1, 5, 3, 1, 10, 5, 3, '2024-12-06', '2025-01-22', '2024-12-06', NULL, '22', '187/1, FIRST FLOOR, KUDULU MAIN ROAD', NULL, NULL, 3, 1, 3, NULL, NULL, 'sea', '', NULL, '2024-11-30 15:42:54', '2025-01-18 07:01:44'),
(40, 'HST/EX01/40', 1, 5, 9, NULL, NULL, NULL, 10, NULL, 21, 1, 1, 5, 3, 1, 10, 5, 3, '2024-12-06', '2025-01-22', '2024-12-06', NULL, '22', '187/1, FIRST FLOOR, KUDULU MAIN ROAD', NULL, NULL, 3, 1, 3, NULL, NULL, 'sea', 'falk;lfdka;', NULL, '2024-11-30 15:43:12', '2024-11-30 15:43:39'),
(41, 'HST/EX01/41', 1, 5, 9, NULL, NULL, 1, 9, NULL, 44, NULL, NULL, 5, 14, 6, 1, 5, 1, '2025-01-18', NULL, NULL, NULL, '12345678', '187/1, FIRST FLOOR, KUDULU MAIN ROAD    BEHIND BHAGYA VEG,560068 ADJACENT TO TVS YARD HOSUR ROAD,BANGALORE,', 'aaaaaa', NULL, 0, NULL, NULL, NULL, NULL, 'road', NULL, NULL, '2025-01-18 07:16:32', '2025-02-05 08:44:55'),
(42, 'HST/EX01/42', 2, 5, 12, 159, 34, 1, 10, NULL, 41, 1, 1, 6, 10, 2, 1, 5, 1, '2025-02-05', '2025-02-06', '2025-02-07', '2025-02-07', '951', 'site no 1, america', 'aaaaaa', '159', 0, 4, 6, 'nope', 'PPC', 'road', '', NULL, '2025-02-05 05:49:01', '2025-02-05 06:02:58');

-- --------------------------------------------------------

--
-- Table structure for table `sales_order_details`
--

CREATE TABLE `sales_order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sales_order_id` int(11) DEFAULT NULL,
  `finished_quality_id` int(11) DEFAULT NULL,
  `weave_type_id` int(11) DEFAULT NULL,
  `first_quality_id` int(11) DEFAULT NULL,
  `selvedge_id` int(11) DEFAULT NULL,
  `unit_id` int(11) DEFAULT NULL,
  `inspection_type_id` int(11) DEFAULT NULL,
  `paper_tube_size_id` int(11) DEFAULT NULL,
  `costing_number` int(11) DEFAULT NULL,
  `hsn_code` double DEFAULT NULL,
  `quantity` double DEFAULT NULL,
  `rate_per_unit` double DEFAULT NULL,
  `val` double DEFAULT NULL,
  `frieght_charge` double DEFAULT NULL,
  `surcharge` double DEFAULT NULL,
  `exchange_rate` double DEFAULT NULL,
  `inr_rate` double DEFAULT NULL,
  `piece_length` double DEFAULT NULL,
  `variation` double DEFAULT NULL,
  `fold` varchar(250) DEFAULT NULL,
  `yarn_det` varchar(250) DEFAULT NULL,
  `packing_type` varchar(250) DEFAULT NULL,
  `buyer_sort` varchar(250) DEFAULT NULL,
  `sort_code` varchar(100) DEFAULT NULL,
  `weaving_qty` double DEFAULT NULL,
  `purchase_qty` double DEFAULT NULL,
  `instruction_factory` varchar(250) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `fabric_type` varchar(250) DEFAULT NULL,
  `approval` int(1) DEFAULT NULL COMMENT '-1: canceled, 0: Hold or 1: Approved	',
  `yarn_require` tinyint(1) NOT NULL DEFAULT 0,
  `shrinkage` double NOT NULL DEFAULT 0,
  `comment` varchar(250) DEFAULT NULL,
  `set_created_date` date DEFAULT NULL,
  `currency` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `sales_order_details`
--

INSERT INTO `sales_order_details` (`id`, `sales_order_id`, `finished_quality_id`, `weave_type_id`, `first_quality_id`, `selvedge_id`, `unit_id`, `inspection_type_id`, `paper_tube_size_id`, `costing_number`, `hsn_code`, `quantity`, `rate_per_unit`, `val`, `frieght_charge`, `surcharge`, `exchange_rate`, `inr_rate`, `piece_length`, `variation`, `fold`, `yarn_det`, `packing_type`, `buyer_sort`, `sort_code`, `weaving_qty`, `purchase_qty`, `instruction_factory`, `description`, `fabric_type`, `approval`, `yarn_require`, `shrinkage`, `comment`, `set_created_date`, `currency`, `created_at`, `updated_at`) VALUES
(29, 35, 40, 1, 40, NULL, 6, 3, 2, NULL, 53092920, 1, 1, 1, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, 'ARNEY PD-BLACK/57\" 00/24LINENX0/36LINEN 54X52 PLAIN', 'ARNEY PD-BLACK', 1, 0, 'nill', 'ARNEY PD\r\n100% LINEN WOVEN FABRIC\r\nSHADE :BLACK', 'finished', 1, 1, 0, '', NULL, 'usd', '2024-10-11 12:21:51', '2025-01-08 13:24:29'),
(30, 36, 40, 1, 40, NULL, 6, 1, NULL, NULL, 53092920, 25, 41, 1025, NULL, NULL, 12, 492, NULL, NULL, NULL, NULL, NULL, 'ARNEY PD-BLACK/57\" 00/24LINENX0/36LINEN 54X52 PLAIN', 'ARNEY PD-BLACK', NULL, 256, '', NULL, 'finished', 1, 1, 0, '', NULL, 'usd', '2024-10-15 09:29:04', '2024-11-04 16:24:25'),
(31, 37, 44, 1, 44, 3, 6, 3, NULL, NULL, 69, 44555, 69, 3074295, NULL, NULL, 69, 4761, NULL, NULL, NULL, NULL, NULL, '69/69\" 0/36LINENX0/36LINEN 2380.5X69 PLAIN', '69-69 - grey', NULL, 69, ';laf;lklds', NULL, 'finished', 1, 1, 0, 'lkmlk', NULL, 'rupees', '2024-10-19 15:09:49', '2024-10-29 12:05:34'),
(32, 38, 44, 1, 44, 3, 6, 3, NULL, NULL, 69, 12, 12, 144, NULL, NULL, 12, 144, NULL, NULL, NULL, NULL, NULL, '69/69\" 0/36LINENX0/36LINEN 2380.5X69 PLAIN', '69-69 - grey', 12, 25, 'jdkfjkajfksd', 'gjhk', 'finished', 1, 1, 0, '', NULL, 'usd', '2024-11-08 16:33:02', '2024-11-08 16:34:27'),
(33, 39, 46, 1, 46, 3, 7, 3, NULL, NULL, NULL, 22, 22, 484, NULL, NULL, 22, 484, NULL, NULL, NULL, 'ajdlfkadm', NULL, '22/22\" 0/26LINENX0/26LINEN 242X22 PLAIN', '22-kaakhi', 22, 22, '', NULL, 'finished', 1, 0, 0, '', NULL, 'usd', '2024-11-30 15:42:54', '2025-01-18 07:01:44'),
(34, 40, 46, 1, 46, 3, 7, 3, NULL, NULL, NULL, 22, 22, 484, NULL, NULL, 22, 484, NULL, NULL, NULL, 'ajdlfkadm', NULL, '22/22\" 0/26LINENX0/26LINEN 242X22 PLAIN', '22-kaakhi', 22, 22, 'adfk;l', NULL, 'finished', 1, 1, 0, 'lkaf;lkfdas', NULL, 'usd', '2024-11-30 15:43:12', '2024-11-30 15:45:21'),
(35, 41, 48, 1, 48, 3, 6, 3, 2, NULL, 53092910, 1440, 322, 463680, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 'CP01/01-SKY BLUE CHAMBRAY/57\" 0/40LINENX0/26LINEN 74X50 PLAIN', 'CP01/01-SKY BLUE CHAMBRAY', 1440, 0, NULL, NULL, 'finished', 1, 1, 0, '', NULL, 'rupees', '2025-01-18 07:16:33', '2025-01-18 07:41:58'),
(36, 42, 50, 1, 50, 3, 7, 3, 2, NULL, 15, 15, 15, 225, 15, 15, 15, 225, 15, 15, NULL, '15', NULL, '951/15\" 0/40LINENX0/40LINEN 112.5X15 PLAIN', '951-951checking', 15, 15, '151515', 'dfldsak', 'finished', 1, 1, 0, '', NULL, 'rupees', '2025-02-05 05:49:01', '2025-02-05 06:13:07');

-- --------------------------------------------------------

--
-- Table structure for table `sales_order_sub_details`
--

CREATE TABLE `sales_order_sub_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sales_order_detail_id` int(11) DEFAULT NULL,
  `fcl` double DEFAULT NULL,
  `po_lds` date DEFAULT NULL,
  `ex_factory_date` date DEFAULT NULL,
  `actual_ex_factory_date` date DEFAULT NULL,
  `lc_expire_date` date DEFAULT NULL,
  `lds_date` date DEFAULT NULL,
  `lc_no` varchar(150) DEFAULT NULL,
  `line` varchar(150) DEFAULT NULL,
  `etd` date DEFAULT NULL,
  `eta` date DEFAULT NULL,
  `office_remark` varchar(250) DEFAULT NULL,
  `factory_remark` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `sales_order_sub_details`
--

INSERT INTO `sales_order_sub_details` (`id`, `created_at`, `updated_at`, `sales_order_detail_id`, `fcl`, `po_lds`, `ex_factory_date`, `actual_ex_factory_date`, `lc_expire_date`, `lds_date`, `lc_no`, `line`, `etd`, `eta`, `office_remark`, `factory_remark`) VALUES
(21, '2024-10-11 12:21:51', '2024-10-11 12:21:51', 29, 1, '2024-10-11', '2024-10-11', NULL, NULL, '2024-10-11', NULL, NULL, NULL, NULL, NULL, NULL),
(22, '2024-10-15 09:29:04', '2024-10-15 09:29:04', 30, NULL, NULL, '2024-10-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, '2024-10-19 15:09:49', '2024-10-19 15:09:49', 31, NULL, NULL, '2024-10-26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, '2024-11-08 16:33:02', '2024-11-08 16:33:02', 32, NULL, NULL, '2024-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, '2024-11-30 15:43:12', '2024-11-30 15:43:12', 34, 22, '2222-02-22', '2222-02-22', '2022-02-22', '2222-02-22', NULL, NULL, NULL, NULL, '2022-02-22', NULL, NULL),
(26, '2025-01-18 07:16:33', '2025-01-18 07:16:33', 35, 1440, '2025-01-25', '2025-01-25', NULL, NULL, '2025-01-25', NULL, NULL, NULL, NULL, NULL, NULL),
(27, '2025-02-05 05:49:01', '2025-02-05 05:49:01', 36, 15, '2025-02-08', '2025-02-08', '2025-02-08', '2025-02-08', '2025-02-08', '15', '156', '2025-02-08', '2025-02-08', '15', '15');

-- --------------------------------------------------------

--
-- Table structure for table `sales_order_yarn_certifications`
--

CREATE TABLE `sales_order_yarn_certifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sales_order_detail_id` int(11) DEFAULT NULL,
  `yarn_certification_type_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `sales_order_yarn_certifications`
--

INSERT INTO `sales_order_yarn_certifications` (`id`, `sales_order_detail_id`, `yarn_certification_type_id`, `created_at`, `updated_at`) VALUES
(1, 0, 1, '2024-07-05 10:00:45', '2024-07-05 13:26:19'),
(2, 4, 1, '2024-07-09 15:39:06', '2024-07-09 15:39:06'),
(3, 4, 1, '2024-07-09 15:39:06', '2024-07-09 15:39:06'),
(4, 6, 1, '2024-07-09 15:44:52', '2024-07-09 15:44:52'),
(5, 6, NULL, '2024-07-09 15:44:52', '2024-07-09 15:44:52'),
(6, 7, 1, '2024-07-09 15:53:58', '2024-07-09 15:53:58'),
(7, 7, NULL, '2024-07-09 15:53:58', '2024-07-09 15:53:58'),
(8, 8, 1, '2024-07-09 15:55:01', '2024-07-09 15:55:01'),
(9, 8, 1, '2024-07-09 15:55:01', '2024-07-09 15:55:01'),
(24, 10, 1, '2024-08-03 07:51:50', '2024-08-03 07:51:50'),
(27, 12, NULL, '2024-08-03 19:15:02', '2024-08-03 19:15:02'),
(29, 17, NULL, '2024-08-26 11:28:08', '2024-08-26 11:28:08'),
(34, 9, 1, '2024-09-11 16:24:01', '2024-09-11 16:24:01'),
(35, 9, 1, '2024-09-11 16:24:01', '2024-09-11 16:24:01'),
(36, 22, 1, '2024-09-24 15:12:27', '2024-09-24 15:12:27'),
(38, 23, 2, '2024-09-25 09:22:57', '2024-09-25 09:22:57'),
(39, 23, 1, '2024-09-25 09:22:57', '2024-09-25 09:22:57'),
(40, 24, 1, '2024-09-25 09:27:25', '2024-09-25 09:27:25'),
(41, 24, NULL, '2024-09-25 09:27:25', '2024-09-25 09:27:25'),
(43, 25, 1, '2024-10-03 14:42:47', '2024-10-03 14:42:47'),
(44, 26, 1, '2024-10-03 14:44:49', '2024-10-03 14:44:49'),
(45, 26, 2, '2024-10-03 14:44:49', '2024-10-03 14:44:49'),
(46, 27, 1, '2024-10-10 14:15:07', '2024-10-10 14:15:07'),
(47, 27, NULL, '2024-10-10 14:15:07', '2024-10-10 14:15:07'),
(48, 28, 2, '2024-10-10 14:27:36', '2024-10-10 14:27:36'),
(50, 29, NULL, '2024-10-12 03:11:16', '2024-10-12 03:11:16'),
(52, 30, 1, '2024-10-15 09:34:20', '2024-10-15 09:34:20'),
(55, 31, 1, '2024-10-29 12:05:34', '2024-10-29 12:05:34'),
(56, 31, 2, '2024-10-29 12:05:34', '2024-10-29 12:05:34'),
(57, 32, 1, '2024-11-08 16:33:02', '2024-11-08 16:33:02'),
(58, 32, 1, '2024-11-08 16:33:02', '2024-11-08 16:33:02'),
(59, 34, 1, '2024-11-30 15:43:12', '2024-11-30 15:43:12'),
(67, 36, 4, '2025-02-05 05:49:10', '2025-02-05 05:49:10');

-- --------------------------------------------------------

--
-- Table structure for table `sales_types`
--

CREATE TABLE `sales_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `account_group` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `sales_types`
--

INSERT INTO `sales_types` (`id`, `name`, `account_group`, `status`, `created_at`, `updated_at`) VALUES
(1, 'EXPORT SALES', 'Select A/C Group', 1, '2024-08-16 11:32:02', '2025-01-08 12:22:36'),
(2, 'DOMESTIC SALES', 'Select A/C Group', 1, '2025-01-08 12:22:46', '2025-01-08 12:22:46');

-- --------------------------------------------------------

--
-- Table structure for table `sale_returns`
--

CREATE TABLE `sale_returns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `selvedge`
--

CREATE TABLE `selvedge` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `catch_cord_ends` double DEFAULT NULL,
  `reed_count` double DEFAULT NULL,
  `selvedge_width` double DEFAULT NULL,
  `dents` double DEFAULT NULL,
  `ends_per_dent` double DEFAULT NULL,
  `extra_ends` double DEFAULT NULL,
  `selvedge_ends` double DEFAULT NULL,
  `weave_id` varchar(255) DEFAULT NULL,
  `ends_per_heild` double DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `ends_per_wire` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `selvedge`
--

INSERT INTO `selvedge` (`id`, `name`, `catch_cord_ends`, `reed_count`, `selvedge_width`, `dents`, `ends_per_dent`, `extra_ends`, `selvedge_ends`, `weave_id`, `ends_per_heild`, `status`, `ends_per_wire`, `created_at`, `updated_at`) VALUES
(3, '2/30 s cotton', 2, 60, 1, 1.18, 2, 0, 4.36, '1', 0, 1, 2, '2024-09-18 15:24:56', '2025-02-05 08:51:41');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('044Mt0IUhngtuqdkLYep0uyOUygC1SWzM0auBXmy', NULL, '182.44.8.254', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVEVKeDF2U0NZQmhSblVuRUF5Y3dFQW9GV0haSW1uU2wwR2dldGU2WCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTk6Imh0dHA6Ly9oZWFkd2F5eS5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1739173021),
('0DYAWvBLwoTRaYRvSh9HfVeNyOyxjzUky3VFCNMz', NULL, '34.228.241.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.3', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaWw2dlRYRHMyMjhhNEluU3dGSzVpemg0M2dFWGFkeVBUbXdqcHVpMSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjU6Imh0dHBzOi8vbWFpbC5oZWFkd2F5eS5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1738907072),
('0hpmD4np0rJTz13s9SQGk5nAIqXCfgSrzTtdNmVB', NULL, '13.79.216.116', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiMlpnZ0lMQ2VjTlZEbHppZ1M1N0dVNFBiNjBySTFkbDdJRllXN3lwbiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1738889039),
('12nlX0VmBuyNQuzcESs9qYcryX8iz2UyS1KLh8O6', NULL, '165.22.31.161', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_6) AppleWebKit/537.78.2 (KHTML, like Gecko) Version/7.0.6 Safari/537.78.2', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWUZyUEpBODhjQkN1ZVBmdlRJMUxYUlRKQlQ3cThoVGx2TXcyb05WNyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTk6Imh0dHA6Ly9oZWFkd2F5eS5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1738856182),
('28sdWC0T1cr4rnLKfuSfKXvzM0xgb4ohBuhpyK0m', NULL, '182.44.67.97', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiclNBbG95WWlRQmlqaEQwMk40ZEF4Nk1ZZGJaSEhRVUdMdFlUd2hrNiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHA6Ly93d3cuaGVhZHdheXkuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1738975705),
('2bxwf2fE9CqzatiOJ6bX9axpIW32dym8cBGZJX6O', NULL, '178.62.34.45', 'Mozilla/5.0 (compatible)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieTR4RU9ucG9xWWV4OE5GaGI3cVVwelo1M1hJRXBsUzRXaGVSSmJUcSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHA6Ly93d3cuaGVhZHdheXkuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1738910118),
('3LBulvQU48AMeH3m8TlpBtKYX2w2vobv0Kgmpex0', NULL, '216.244.66.247', 'Mozilla/5.0 (compatible; DotBot/1.2; +https://opensiteexplorer.org/dotbot; help@moz.com)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUmpmRlY2UlhBdGN2UDBlUkVLaU9HS0Y1VERJSERRdnlnNVBHaUExaSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHA6Ly93d3cuaGVhZHdheXkuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1739086577),
('4pJCc2DkFjPRnZLMau0dgQ9EDncR5WDX4juc1wRT', NULL, '49.7.227.204', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibWEyVnVDeFB1TnphRkRXVVZhRnl3Wjh6QjhGaEtjYTlPTzJ6ZzFLcyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHA6Ly93d3cuaGVhZHdheXkuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1739083600),
('5sv2LCYeKsniOev31IgRnbLmFy1r7oG98VnvqhPe', NULL, '27.115.124.109', 'Mozilla/5.0 (Linux; U; Android 8.1.0; zh-cn; MI 8 Build/OPM1.171019.011) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/57.0.2987.108 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQVJERHRjMmNsODY1dXBvQllGTElYZVNScE5rN0lPNWltMXpEczRobCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHA6Ly93d3cuaGVhZHdheXkuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1738844237),
('63UmTcwblTmaCAstA0Px1mqt9nXTWFzR15pwOZwi', NULL, '42.83.147.56', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko)Chrome/74.0.3729.169 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTW5rbWlmOVVub0p3c0lrbmdYMEVQR2xJdDlyWmJUaEN1SHF4dVlnOSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTk6Imh0dHA6Ly9oZWFkd2F5eS5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1739024627),
('6fXJWN5Xc0AEq5jqOJsA0rTbPiJvmk12FMwt53ZV', NULL, '34.228.241.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.3', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZDZjVUl6OWpPbW5LeWdRSG0xNGdRcUd2ZkM1dW52R2tqSnJqT1YxeSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjU6Imh0dHBzOi8vbWFpbC5oZWFkd2F5eS5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1738948898),
('8NQKEvx48K1LBSym7ugMZgsGw7qTZFYDjgZzWrIj', NULL, '110.166.71.39', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMXduSFF2M0JzMk5HV1ZYTkNtSDZZTE1IVWFyWFV0NzZEZGxIc2V1SSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHA6Ly93d3cuaGVhZHdheXkuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1738902785),
('8UkEbci9u9nIVhok7SdZcqfQHp9vxocku8RWdWW6', NULL, '64.23.236.169', 'Mozilla/5.0 (compatible)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoib0x3MlRRMUFpOGlVNmQwRUlkblV0YUxPMEM0VkEwd1ZVbzg4Z2FRRyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjA6Imh0dHBzOi8vaGVhZHdheXkuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1739138507),
('9AAhDyMZbaiwdsGKIeGj5TGsTvecNq9fT0wrQ2l7', NULL, '104.152.52.62', 'curl/7.61.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOFFGWHBxbTk0cEczU3FrY2d3cFhKMlVnWGMzbFg4UmoyR3lLa1RQZyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vd3d3LmhlYWR3YXl5LmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1739139489),
('9W6ofwwG6Dz6kOCgievMNImwfoWwdh8YDgFa8uaJ', 1, '103.154.35.145', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoicTd0aGV6MlVrWHdiUWJlV1czaG9JWG1yaFlwVXVhTTc3YmxHQ01zZiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyNToiaHR0cHM6Ly9oZWFkd2F5eS5jb20vdXNlciI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI2OiJodHRwczovL2hlYWR3YXl5LmNvbS9jb3VudCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czo3OiJjb21wYW55IjtzOjM6InNleiI7fQ==', 1738838976),
('ahYByMc6jZYRCYqVIZLkTDL3E5nNfnaqkXXrNft6', NULL, '178.128.227.196', 'Mozilla/5.0 (compatible)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRUZUblB6bTVjSjBKbVV2NVNqa1F4b2pwSGZGdVJLSzByak5NeUE5UyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHA6Ly9tYWlsLmhlYWR3YXl5LmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1739101823),
('b2pjS8f3wXgA5p3HNoae2h0jP6pnxYFdIQcGiH2j', NULL, '46.17.174.153', 'Go-http-client/2.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiS3ZZeWpMOG8zRm41WVFSTTRuQWlDdzdINTRJbEtyVlNFRER0bG1qUSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1739157162),
('Bav7BGddhWuafZe7vsGEcmizgkPdPNVwRGMHO4wR', NULL, '105.157.179.143', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoib2s5b3FyeHJnMWp6TlFkZjVnS3ZXOGZEZ3RXdW1well3cUlJcnloVCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjA6Imh0dHBzOi8vaGVhZHdheXkuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1738919841),
('BCHOulj9PamAJ6vCyMePtW9ennKknsV7sHbDYq8D', NULL, '87.106.67.223', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:133.0) Gecko/20100101 Firefox/133.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTlFmNlFWUEk3SlZUVnV6Z3BlclphcGFiTDFTRE1PaU1oVGwxUlViRiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHA6Ly93d3cuaGVhZHdheXkuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1738927983),
('bFHqeDp187cyNpwJ4PIumqlaAuwGzBpYIx1qmbbH', NULL, '46.17.174.153', 'Go-http-client/2.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiWDJTcktLeTZGdGpZUEpFbHM3YW5OR1F6WjBQN3VBeFRNQnRaMlpWOCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1739094853),
('BW3iRrKdEcP0AqsIZLsIWF0in3ym99v0BDjuTaw0', NULL, '13.79.216.116', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiMlpCaTBjYjlMWmxTTjFJOWZpNmVhdlZjaGNaWTE2ZDhVVzU5UE9SNyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1738917218),
('CHK8mKahW8f3xvleFOtoen6YlPkKeL5dj17faKPL', NULL, '13.79.216.116', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoicHNZYlJqVjNwbWd2c2RQdkE5YU5YWU83RXY4OGIyQnZ5VktPR2xKYSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1738975008),
('DpYqyTgdunpwgi4Zu5gfBr7jD3DYz6M4eBwtOJld', NULL, '94.247.172.129', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_2)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMFBVeFprdFBLdWRySmlQblNpYmx4VmIwUEtZM1NheDVtTXFUS0h0dSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHA6Ly93d3cuaGVhZHdheXkuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1739049724),
('dZfMhnQW9xIFRP78YreTZQu5zqtAl1lDdBUCsO2W', NULL, '54.36.148.253', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMmE3R01Eb0YwV0YwaUQ1UFZyMk9yQUNDTENYQzRhNG5RcjBid0dlQSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjA6Imh0dHBzOi8vaGVhZHdheXkuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1739029011),
('E966P13OqAjHTX2xj1D17bWbAFniABHmKIYJVFZQ', NULL, '158.46.164.134', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZnhjYjZCa0tCUjU4a29SNFJJUXBIV1dsczhreGY0eWVvQjNwZjRYQiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjA6Imh0dHBzOi8vaGVhZHdheXkuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1739121462),
('EinwsuXFH6dS1FiEEAXDOm0IcoRRinBp01cDewKS', NULL, '216.244.66.247', 'Mozilla/5.0 (compatible; DotBot/1.2; +https://opensiteexplorer.org/dotbot; help@moz.com)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidmZEQUFEdG5ESWFsUld0Tzloa2JSd1Z2NjJDT0sxNWhaekpjVFFGeSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHA6Ly93d3cuaGVhZHdheXkuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1739090523),
('fC7P7CKUydvS1pq6GzgTcI2GIBsJxh9Bq383q90h', NULL, '104.152.52.70', 'curl/7.61.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSDhNMDJxazR3dzA2Yk9nVzJGYjM1ekVoWVFZUllMeXZHN2EwNFdSayI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjA6Imh0dHBzOi8vaGVhZHdheXkuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1738863628),
('FHq6lCE7CtOGLH0y95BuW9dPJppOQjZzPfl0BT26', 1, '103.154.35.149', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoidERmRlVSa0tBS2VHRW9Wc3QyM1o1ZzczQk1VV2xycnlTSk00aUp1NSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyNToiaHR0cHM6Ly9oZWFkd2F5eS5jb20veWFybiI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMyOiJodHRwczovL2hlYWR3YXl5LmNvbS9zYWxlc19vcmRlciI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czo3OiJjb21wYW55IjtzOjM6InNleiI7fQ==', 1739012110),
('FNxMRmMtuWzhC7SsTFPshLQSAXZnoaq99vYmaVDv', NULL, '104.248.90.202', 'Mozilla/5.0 (compatible)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZW8zYmlLQWM5WWxISkFTUzJTSjRjMWl4cDAzeFVDOXhGU2s2cllWRSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjU6Imh0dHBzOi8vbWFpbC5oZWFkd2F5eS5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1738849557),
('fP183c9xoS3OXYcZrSi9uHMGcBMl2Ztnh0nahJj8', NULL, '36.111.67.189', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiU2c5akpSRFFXc0c4Um9COEsyTUNnWjVUb0ttU1E3R29kdU1nRXJOSyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTk6Imh0dHA6Ly9oZWFkd2F5eS5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1739065930),
('gHr8sHldTmCnOdq1chET7xyKG9ZWcq5V4ykmiyj8', NULL, '87.250.224.25', 'Mozilla/5.0 (compatible; YandexBot/3.0; +http://yandex.com/bots)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQThZN2pDNU5xY2JnYVJBVjFUMXVEUDNiSG8zWWtCNGtyRDhDR0w3TSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjA6Imh0dHBzOi8vaGVhZHdheXkuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1739089839),
('giDPlBohYJmxvM5id6Lk0QamRZOyVliqZdVibU5y', NULL, '196.3.98.107', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiV0Q2SnZGRFhPR1RxeE40V09odHF0MXFzQ3o3dzVUN042MTBMV3pDMSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjA6Imh0dHBzOi8vaGVhZHdheXkuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1738846441),
('Gjke2gwNSBpLrTKdJOkOqTNbpC1wNpvGvqVWf4AF', NULL, '182.42.110.255', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMXkydFFwSXhweGpzNmgxeW5UeHpBY1E0WEVzZ2UxUmhLcHdoTG1OaCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTk6Imh0dHA6Ly9oZWFkd2F5eS5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1738849214),
('gyVee7RpYMTOQEk24SkajwpmZjDLJvfiqPvit6FQ', NULL, '178.62.34.45', 'Mozilla/5.0 (compatible)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoib1RWemRLR3IwYzIxSEN0ZzQ2dWhacHEydG9pd3FsTlo4djhPZ2Q5RSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vd3d3LmhlYWR3YXl5LmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1738910119),
('gZ8vEgMa4xMgQEm4Qsimb50SJpTlqATOT0r76PnE', NULL, '188.134.80.97', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:45.0) Gecko/20100101 Firefox/45.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoib1ZmcnBabnQ1T0xRSEZzMkJnMzU4bjRrNm9LU1VQVUdCejVUckNMRCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjA6Imh0dHBzOi8vaGVhZHdheXkuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1738923993),
('H0CiINLjWMQDYhHsvmU5YvE56ohbo3ymMcFt7tsS', NULL, '185.6.11.146', 'Mozilla/5.0 (X11; CrOS x86_64 14541.0.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.3', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiS3BCQmdabmZ6ekVJcEZXTmQzeExTdFBOSnNtd21ORVZ6MEJncGkzUyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTk6Imh0dHA6Ly9oZWFkd2F5eS5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1739111966),
('hrTGplCXuRz27ko55pTW2rUn8zfDfFVOKhcYZRZZ', NULL, '143.110.163.83', 'Mozilla/5.0 (compatible)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTHZhOElMVVd1WDZKRlNqekhRUnJ6cGxYOVFlQ2poYWdVamJGdjM5QiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjA6Imh0dHBzOi8vaGVhZHdheXkuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1738954525),
('hSNlY7sw9ZHeYioaRPr59Ej1J4KqvrDq11lEZ3WS', NULL, '42.106.84.28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiNnBMcVlUMjZzdGtaWXFVdUlkU05ZWXl0OE1sR0k2dVpuVEhsSFhKbyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1739008226),
('hzyvKP1SpqTMxXCcn8vCGG0ZDGzYhxzZli8RQ95l', NULL, '34.228.241.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.3', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQWdtZGw5Y0xxTTZDU25TUTM1WlFnNklpQk5uRlQ1RkhtVmJEV3ozWSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjA6Imh0dHBzOi8vaGVhZHdheXkuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1738907102),
('IBZsQw0oBZeUKKaBqkA1mcggiFw2txg95GFoWgy5', NULL, '13.79.216.116', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiZTRaQUtldEJWVzFnSWd0cnZMMVFTektXMWNkNjlJVlpUOTBwazNZWSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1738946267),
('iCuj14RdfescAxkj3ggL8O9Lx6vdEA2Qut76Uuli', NULL, '93.158.91.24', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYWNmTWhNV3ZQeU1zTVRvdEJ0WDY2NFNhbndDV25VZFFpY1hVVDF2aiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjA6Imh0dHBzOi8vaGVhZHdheXkuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1739013171),
('iFPWbYZmfR3MWH2XsCLNTyMPZwY8veH5LivBav4z', NULL, '117.62.235.53', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZ3FENTJqTGx6UVhaWWV1aVhrSlVrY2ZLbWZGWEtGSmJtTDRraDN6dCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHA6Ly93d3cuaGVhZHdheXkuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1739154929),
('IsEKDLfDkxYYnoYXQlNDv5Afxr1EsCUrp2GZJnCX', NULL, '3.12.197.217', 'python-requests/2.27.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieThjaTR4dklienJ2eFFNU05IYzdNZGF1ZlRuSFVFUHRXemdUbFFoZiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTk6Imh0dHA6Ly9oZWFkd2F5eS5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1738886818),
('iW2WTcu55QWwyYWJKY6IVEzOUoQO2PYphGlhFKqj', NULL, '13.79.216.116', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiT1ZUTWZIU3JaUXZDeVBONTJFenFSYTBQenZJUjQ4ZVk0Rkphc0hoSSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1738860226),
('JEaH0bbBAL3iZl1wICvQIObDZPIHk3B8cp7nlsRP', NULL, '121.229.185.160', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTlZMbmJyTzFRNWlYdVY3aEpaNzlQdTl3QXY1aEl0RTJtaDFobXJZSSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHA6Ly93d3cuaGVhZHdheXkuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1738867463),
('Jgh9aL3bEltzvTIfRE0RYxquhFCeyOZ0QSN7hz0Z', NULL, '111.172.249.49', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVlVKb1BDWGZPS2tnMFBmUWpHbW1DZUs5WEZySlZSd01wSHdlTkp5RSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTk6Imh0dHA6Ly9oZWFkd2F5eS5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1739137459),
('jkcxWW46mAmApUBnGn56v7Gw8eWeQv5guDJyLwrx', 1, '103.154.35.149', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoib0lzd3VKdjlEV3Z4YWJrWUtlRTNYeFhmcTQ5YzJJN1I1VmZNeG1JNSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyNToiaHR0cHM6Ly9oZWFkd2F5eS5jb20veWFybiI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQxOiJodHRwczovL2hlYWR3YXl5LmNvbS9hcHByb3ZhbC9leHBvcnRfc28vMSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czo3OiJjb21wYW55IjtzOjM6InNleiI7fQ==', 1738999238),
('jQy05hpXwI9xmUoaILJ5u7hOVLiplEIYrk2MtbWZ', NULL, '13.79.216.116', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoib1JtbzJ0b0lQb2ZHM1p6UVVGclIzaWtCR21IM3hIMlRsaG1hNlhpYyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1739031730),
('JyMmQ3WSx7GKdursrcCLP7bpvwkZOwYW3feYjiml', NULL, '157.15.134.130', 'python-requests/2.32.3', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiekVjMFk1T1c1cGlDdEwzNnc5QVdCc2E3UUZ5T1NjS29qbmtlem8xSCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1739031721),
('K0oED22tpckyfclouZPzlcG9PStIh81XCycpAk8P', NULL, '49.7.227.204', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYURPNmFVN0tDYTdzbENsUXVabjdSakE0WHJZdXNNTWNCdVBKRWVjaSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTk6Imh0dHA6Ly9oZWFkd2F5eS5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1738921654),
('KLELO2r57wbZVqsDQcwSkBJj0f2BYVIoB64OEZkF', NULL, '34.76.146.130', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWURFckxrNzFwckljaE81RzlNNmp3WmdESGdvTmlzbUtzZVY0SzhzdCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHA6Ly93d3cuaGVhZHdheXkuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1739154665),
('kTuZ9dJrNIlxy7gtt7hiDxTgpibmfhk8YSxifCld', NULL, '43.159.132.207', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNTJESmo3Z2V3MFJaWldFa1dvdFZ6RHMzcXhRckFudW9jVUlLVGduNyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTk6Imh0dHA6Ly9oZWFkd2F5eS5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1739143573),
('KZau2T5NxxOlwEpTm93sPfbX9Su97omQ1SdfUFwu', NULL, '46.17.174.153', 'Go-http-client/2.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiS1pHd0JuVEJxSnhSM1N2Q0JibGF0cENJSkZsU3Vna0JFTEdvWDZUVyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1739007457),
('lm7CG6fZ9ehIOOSir45Pri4fTvylGskAcgmWtc4c', NULL, '167.94.146.62', 'Mozilla/5.0 (compatible; CensysInspect/1.1; +https://about.censys.io/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYWc4dEVIVFJyeExhV1c4RmNNa2F3cVNCZjdSSDU3ellwNVhMaFVpMCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHA6Ly93d3cuaGVhZHdheXkuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1739084169),
('Msj4YZKR4dcEXv6v7Hr7x9QIp2e97fns4LA9klXu', NULL, '104.152.52.65', 'curl/7.61.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidFNjeHk3THU4WUI2MUNUam43NHlsMDlsMmNBaEJ5c01idUtyc2hMUiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjU6Imh0dHBzOi8vbWFpbC5oZWFkd2F5eS5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1739139212),
('nTNkjd5zyxMEu30pO9CXFTSQogsv6lA3n9rG4kjk', NULL, '143.110.163.83', 'Mozilla/5.0 (compatible)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVm93MlZXRzE5R0ljYUZVTkZmRlA5NGVvQUZXNEVvamtQOVNyMW5qSCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTk6Imh0dHA6Ly9oZWFkd2F5eS5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1738954524),
('olNilOU4zN5v1T7cSgtMDyAyS6ND7Z6tsaX8sACl', NULL, '196.89.152.242', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoieUJqWjR1NUJOWkJkZ1pKR3ZXY0QwNUN3aEk4MjV5WmJKbzY2NEFJSyI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo1NjoiaHR0cHM6Ly9oZWFkd2F5eS5jb20vam9id29ya19wcm9jZXNzX2NvbnRyYWN0X2lzc3VlX2xpc3QiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyMDoiaHR0cHM6Ly9oZWFkd2F5eS5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1739175096),
('Orf3X8etdoyEnVyPPoSHsSPDNKMjwsXc5NkWESzG', NULL, '216.244.66.247', 'Mozilla/5.0 (compatible; DotBot/1.2; +https://opensiteexplorer.org/dotbot; help@moz.com)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUWZBQkxzcGMwU3BZUHJIRUlIR3M1OTNmOGVKTjVoN3FIeTNwUktSWiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHA6Ly93d3cuaGVhZHdheXkuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1739084748),
('oTZhYaZK72F7A0Gdh7noHa7vO4B1B64D2VQAx2ao', NULL, '64.23.236.169', 'Mozilla/5.0 (compatible)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaUZtN21KdVp3MnZSQnp4S3FsOUU0am13WU54WGNNdlI2STZROVp6VSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTk6Imh0dHA6Ly9oZWFkd2F5eS5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1739138505),
('oy2PEfMozEtWOW4MqjZi1gfLjpI8c4fLKSteFQ2s', NULL, '40.77.167.4', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRFdMWmNxWlZuUEhrczdlV3VsZGUzbEFZblhlUHVQbWdPUjZjc2w3ciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHA6Ly93d3cuaGVhZHdheXkuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1738901312),
('P6mrlnYOrGfPx0Hhe010RkcuE6uTRJebhWmn8oLg', NULL, '170.106.74.253', 'Mozilla/5.0 (iPhone; CPU iPhone OS 14_4 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/15.4 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiak1PaG5QWXZQSTdQazBVMmtQQ2VBWVgxS2FoaHJGU25XNXBoakNWRCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTk6Imh0dHA6Ly9oZWFkd2F5eS5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1739132403),
('pBQJmoGrr6wJP6qkYJXexQbVV5c5CAhogS2jwxA5', NULL, '27.111.8.26', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaXowaklTeUg2cWR0VUlJWWx4cnFCTlVMR0J1NWZGRmE5MTdtU01oUiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjA6Imh0dHBzOi8vaGVhZHdheXkuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1739087334),
('Pcd1ddGU35u4CX5ZdllJ8pMlc1Fvc5fGldSFT72o', NULL, '182.44.67.97', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicDk4MGR6ckRuOFgxWkdqQW50NjMzVzFHeDNESTNyNEx5czFHa1Q4UiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHA6Ly93d3cuaGVhZHdheXkuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1738940091),
('pEGYQoLiKDSUSoxV0SK5VpTcfy1ZaXZFrJwXElbS', NULL, '52.91.31.176', 'w3m/0.5.3+git20230121', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSmphaVlBR3dDMTlyTUhnT3o5c2NPSHN1bXBrRGRFc01CWVVUVm9ScyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTk6Imh0dHA6Ly9oZWFkd2F5eS5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1739053113),
('PwRVOvdNQoMfEgh5bu3TMsBOdGBfVWjfiiT6oU0C', 1, '42.106.77.5', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoibFhqYkdmMEtYODd4S09IMUI0WFdDbE84c2c5aGRJNDIxbXFOcVljNCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjc6ImNvbXBhbnkiO3M6Mzoic2V6IjtzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMDoiaHR0cHM6Ly9oZWFkd2F5eS5jb20vZGFzaGJvYXJkIjt9fQ==', 1739175438),
('q07PPblhRzDRoQdnawBl7dJw1Phhyayg5D5Z0qCv', 1, '103.154.35.145', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiRGQ0WGJOREZpeE9VUFJnUnJDSGVaczdMUlZVV0NMY1pwR2pZdnZrSiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyNToiaHR0cHM6Ly9oZWFkd2F5eS5jb20veWFybiI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjIwOiJodHRwczovL2hlYWR3YXl5LmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czo3OiJjb21wYW55IjtzOjM6InNleiI7fQ==', 1738837525),
('QgmkrUtRP8989DsBJBtD9fVlHZYznvnjINnu3fkX', NULL, '51.81.46.212', '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYWFsOXlUVEMzNlh4elRGMlFleEdtYmp1MFg3cnNnWkh1blphNE9uZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjA6Imh0dHBzOi8vaGVhZHdheXkuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1739106791),
('RGxo4LhWL8E89c3tE4C5Dbrfvaa4ZwcOI0YMiMtv', NULL, '44.211.186.13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiT1ROUU02MW56YXpwaXhZY1BRU1Rld2tWZXB4ZE52T3NLbTdWdTJYdyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTk6Imh0dHA6Ly9oZWFkd2F5eS5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1739173646),
('RItCDirCgc9hZcKgrc8UF6JHhCeDtU9COy5ItQDT', NULL, '199.45.154.127', 'Mozilla/5.0 (compatible; CensysInspect/1.1; +https://about.censys.io/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiamZ1YmZ2amlQUHRjWjY5bWxjTVFMVXF0ZmpuaFVIVzhDalByREROWCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjU6Imh0dHBzOi8vbWFpbC5oZWFkd2F5eS5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1739153836),
('RUIRsPS0Q3sUsEW2RvDRAbHt9PSVkyvO3WFuN3xP', NULL, '34.78.207.233', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMk5kM0MxSTdBalRTdFg3Wk1RNzA5d0pFODFBT0ppc0FHMmhicENzSiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHA6Ly93d3cuaGVhZHdheXkuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1738943907),
('S1rjD1iFx1yM5e5x93i0H8rq3Ij9salFXZi9xt15', NULL, '216.244.66.247', 'Mozilla/5.0 (compatible; DotBot/1.2; +https://opensiteexplorer.org/dotbot; help@moz.com)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidHdqTFBzRkZYY3l6OFRzSWs1OXF0N3ptSHB6V2FPNDFraFA1TUFMYSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHA6Ly93d3cuaGVhZHdheXkuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1739088571),
('sDfyhPvK4ZRot1Jq2WJr6ZYc0Z1xDcm2W6Zm1YmQ', NULL, '34.228.241.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.3', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZlpXeWNDN29mejFscURQMjV5Slg4UG9BWEJycmdCYnM1VzNqSGNSNiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjA6Imh0dHBzOi8vaGVhZHdheXkuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1738948905),
('t79ScRLi0fhmEfrEcHkKVSw4fjtQ7ZGiErA8Iiab', NULL, '222.79.104.23', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiY0U3TGZCVG0ydGxTS3F6TW8xdFBJeGhrbUlGVkNKRmQwRzJETTl3QyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTk6Imh0dHA6Ly9oZWFkd2F5eS5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1739030572),
('UNmK3UM7XHpWyyTv216JSKljXlYWbg9dCnjXYeze', NULL, '49.44.122.40', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiM3A4QW14T3ZrMGR1ZlVobFR5akp4VlI5V3E4bGxrdUw5OXN6ekpTMSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTk6Imh0dHA6Ly9oZWFkd2F5eS5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1738887634),
('upqVdCwudAacEnkYBPOoFyklVlezruLC5gYNnG2l', NULL, '178.128.227.196', 'Mozilla/5.0 (compatible)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiblcwdldRZENnenFRaWhjQ1g5d2lab09PUVVFYmlCQ3NUN3JudGowWSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjU6Imh0dHBzOi8vbWFpbC5oZWFkd2F5eS5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1739101825),
('uV4YpqYI5uga887CoYSY00M0UATDeGse1VYEuen7', NULL, '54.36.149.86', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNDdCdkFvVDZ0RHJhQTdPeFZ4MUdsNWx0VU1MNUJTVGdCSkRhRkJUMSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjA6Imh0dHBzOi8vaGVhZHdheXkuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1738836329),
('VqKgWrVT5rsmQRzEwHwnEIOeUzKAIlMBUob84o6j', 1, '196.77.23.51', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiSk1WN040aXlLNmtWZHRGem9ZUTJIV0xZQjR3NEozOGdHcmxERDVPdiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTY6Imh0dHBzOi8vaGVhZHdheXkuY29tL2pvYndvcmtfcHJvY2Vzc19jb250cmFjdF9pc3N1ZV9saXN0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjc6ImNvbXBhbnkiO3M6Mzoic2V6Ijt9', 1739006477),
('VSzblLQxhcZpRN6mDDV2gQr70MYjlSL0tpoI7eU0', NULL, '43.131.249.153', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoib2RVam1EMUJVTjFHbDYxVmI5bVN3NTBMbldpa2FtZ2xHNkFPMUNaaSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHA6Ly93d3cuaGVhZHdheXkuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1738871188),
('wDm8Vrd0KytVkBJfQIwpLfBKeCFVUEbBpviGBqEC', NULL, '13.79.216.116', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiaDlnSnVGZHRUTkJxZ3NFOVByN3l5aFpyMGlZTTh6N0w4SFJaSG9iZCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1739002884),
('wF8wnhK2xuYUsBTMOn6Nd6GPWrJuOAMjwmJTYqbS', NULL, '105.157.179.143', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQnZabElPTmpEcmtzdjY4QXBMQUNoeXJWbVlOYnRiZ3lxQzFzaFNrSSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjA6Imh0dHBzOi8vaGVhZHdheXkuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1738840303),
('Wz4w0CFMrckjkxA0P3fn1ECkutVzcaZ86dK8KSDk', NULL, '46.17.174.153', 'Go-http-client/2.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiQUZ4emx2QVM4a1dVWDBnbVVIR2tGNWc4Rk9TQ1JFR2w1cEI4b0tZbSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1738903468),
('x1nie6MDTw0und3dJt2JhyU2k5l42aZZvAd7Dhxz', NULL, '104.248.90.202', 'Mozilla/5.0 (compatible)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVnE2R0ZQTHdrZzdKY1JUNXVieUs5OVNVVnpNcEc1cmZkQnVKZWdBciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHA6Ly9tYWlsLmhlYWR3YXl5LmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1738849556),
('x64Gp4ICbQqxqXNmYUb12gksSRtAbQVmQaI10wuy', NULL, '43.135.183.82', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibUdoeEs2TlA4UWZ4SlFlMTJqeDJBSjZ6WkZHMkFYTGZyR25Zd2hrdiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTk6Imh0dHA6Ly9oZWFkd2F5eS5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1738953183),
('xDPVXc5tB9KjNGcH97oVXrvMaL10cEyNEL9OK2k1', NULL, '182.44.67.97', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYjN1d0pNdnVWUFBnZnE4THBoZDJ6VjQyYW4wZ0lxN2xQZFM3Qm9BdyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTk6Imh0dHA6Ly9oZWFkd2F5eS5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1739101690),
('XQM1pzecNiAekLypaGKiWzXx0mqLCnh3mrGbR6x9', NULL, '81.182.128.111', 'python-requests/2.28.2', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWTA0d0Z2Y1B0ZHVhUlFRSjRWQkdiMlR2MlZEUXBKZXo5RnRFTjVkVSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTk6Imh0dHA6Ly9oZWFkd2F5eS5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1738940677),
('YiqZR6ODrg63ffNqSDelFzNfvR1vh7NZfI1HiPAp', NULL, '72.13.46.6', 'Mozilla/5.0 (compatible; ips-agent)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOEE1Y2Q2Q09ZVUVuY3hjZG54VVFlMmYwd0MxVkloYjhrT3l3Rk5qTiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHA6Ly93d3cuaGVhZHdheXkuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1739112926),
('YUFMfkLreoDMdHnEE4R7NkH9WFu8pgyO3ME1vs7e', NULL, '18.222.218.254', 'python-requests/2.27.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaE1VUEVHanVzS3lYQjdsS3ZDZ3MyZTZLRmJxR0FwWFJjbWpTUDh4cyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTk6Imh0dHA6Ly9oZWFkd2F5eS5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1738886700),
('yV1DMW5O1O92Q6n2SRT2HW8Un30Ti8ivJsf3U0KI', NULL, '221.229.106.25', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYklQWWU4ZnlKQlh5dUNNMk9LZWlVWm50blJuTkxJR29ZZXN3MEt0OSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHA6Ly93d3cuaGVhZHdheXkuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1739012064),
('z3RsGPLiQsw4QSPeUmqSnqVwU0FzS8g9doFRHZyZ', 1, '42.104.210.215', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiSXhqWDhDcjVFOXlleDhIT2hTOTFhN2RyZ0xsYnBrMXQ3ZHFrb1FKVCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjA6Imh0dHBzOi8vaGVhZHdheXkuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjc6ImNvbXBhbnkiO3M6Mzoic2V6Ijt9', 1739083466),
('zCtWSHbUOJusr6JnfqYsJGrDnDGdvFxoI2qi8m7T', NULL, '124.226.222.66', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiN2lnM1ZtRzJ6WDNRR3k0dmd0UlA5Z2p1QnBBdGxCNEx6Rm5zZVV4VSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHA6Ly93d3cuaGVhZHdheXkuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1739119796),
('ZOtJtQn3YtaYd7d1djCcK7WUZ0ApTFIP0EXbSDl6', NULL, '113.219.218.197', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiY3M4VEczVVN6V1lCQUN6NXc3T1RHUnZkcDZPdlNyaDlXNWFDQm5pRyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTk6Imh0dHA6Ly9oZWFkd2F5eS5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1738993593);

-- --------------------------------------------------------

--
-- Table structure for table `sets`
--

CREATE TABLE `sets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `set_number` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sales_order_details_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `order_quantity` double DEFAULT NULL,
  `plan_quantity` double DEFAULT NULL,
  `last_set` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `sets`
--

INSERT INTO `sets` (`id`, `set_number`, `created_at`, `updated_at`, `sales_order_details_id`, `date`, `order_quantity`, `plan_quantity`, `last_set`) VALUES
(9, 'S-9', '2024-10-09 18:04:40', '2024-10-10 11:26:47', 26, '2024-10-09', 1, 1, 0),
(10, 'S-10', '2024-10-10 14:17:02', '2024-10-10 14:17:02', 27, '2024-10-10', 2, 2, 1),
(11, 'S-11', '2024-10-10 14:32:49', '2024-10-10 14:32:49', 28, '2024-10-10', 2, 2, 1),
(12, 'S-12', '2024-10-19 15:13:09', '2024-10-19 15:13:09', 31, '2024-10-19', 69, 69, 1),
(13, 'S-13', '2024-11-04 16:24:25', '2024-11-04 16:24:25', 30, '2024-11-04', 25, 25, 1),
(14, 'S-14', '2024-11-08 16:34:27', '2024-11-08 16:34:27', 32, '2024-11-08', 12, 12, 1),
(15, 'S-15', '2024-11-30 15:45:21', '2024-11-30 15:45:21', 34, '2024-11-30', 22, 22, 1),
(16, 'S-16', '2025-01-08 13:24:29', '2025-01-08 13:24:29', 29, '2025-01-08', 1, 1, 1),
(17, 'S-17', '2025-01-18 07:41:58', '2025-01-18 07:41:58', 35, '2025-01-18', 1440, 1440, 1),
(18, 'S-18', '2025-02-05 06:13:07', '2025-02-05 06:13:07', 36, '2025-02-05', 15, 15, 1);

-- --------------------------------------------------------

--
-- Table structure for table `set_single_doubles`
--

CREATE TABLE `set_single_doubles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `set_single_doubles`
--

INSERT INTO `set_single_doubles` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'aa', 1, '2024-07-02 11:15:42', '2024-07-02 11:15:42'),
(2, 's 2', 1, '2024-07-02 11:36:07', '2024-07-02 11:36:07'),
(3, 's 3', 1, '2024-07-02 11:40:50', '2024-07-02 11:40:50');

-- --------------------------------------------------------

--
-- Table structure for table `shades`
--

CREATE TABLE `shades` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(150) DEFAULT NULL,
  `parent_sort_id` int(11) DEFAULT NULL,
  `actual_sort_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `shades`
--

INSERT INTO `shades` (`id`, `name`, `parent_sort_id`, `actual_sort_id`, `created_at`, `updated_at`) VALUES
(1, 'red', 1, 8, '2024-07-07 13:52:49', '2024-07-10 14:58:27'),
(2, 'yellow', 6, 11, '2024-07-07 13:54:00', '2024-08-02 22:50:12'),
(3, 'green', 1, 24, '2024-07-07 13:57:25', '2024-09-10 18:16:27'),
(4, 'green', 1, 25, '2024-07-07 13:59:19', '2024-09-10 18:17:41'),
(5, 'green', 1, 0, '2024-07-07 13:59:36', '2024-07-07 13:59:36'),
(6, 'green aaaa', 1, 0, '2024-07-07 14:00:02', '2024-07-07 14:43:46'),
(7, 'aaaa', 7, 10, '2024-07-10 15:09:50', '2024-07-10 15:18:12'),
(8, 'salman', 1, 13, '2024-08-03 07:46:46', '2024-08-03 07:47:14'),
(9, 'ROUGE', 14, 15, '2024-08-07 13:28:33', '2024-08-07 13:28:39'),
(10, 'Fahd', 16, 17, '2024-09-05 16:17:42', '2024-09-05 16:18:11'),
(11, 'kllk', 17, NULL, '2024-09-15 09:35:46', '2024-09-15 09:35:46'),
(12, 'SIXTYNINE', 29, 34, '2024-09-22 13:07:04', '2024-09-23 10:46:13'),
(13, 'aldfkm', 34, 36, '2024-09-23 18:39:56', '2024-10-11 05:12:39'),
(14, 'summamammamam', 12, 35, '2024-09-24 14:53:15', '2024-09-24 14:55:05'),
(15, 'RED', 37, 38, '2024-10-11 11:44:09', '2024-10-11 11:44:14'),
(16, 'BLACK', 39, 40, '2024-10-12 03:10:05', '2024-10-12 03:10:07'),
(17, '989 - summa', 42, NULL, '2024-10-15 09:33:24', '2024-10-15 09:33:24'),
(18, '69 - grey', 43, 44, '2024-10-19 15:02:02', '2024-10-19 15:02:14'),
(19, 'kaakhi', 45, 46, '2024-11-30 15:37:04', '2024-11-30 15:37:31'),
(20, 'SKY BLUE CHAMBRAY', 47, 48, '2025-01-18 07:08:30', '2025-01-18 07:08:34'),
(21, '951checking', 49, 50, '2025-02-05 05:31:29', '2025-02-05 05:31:32');

-- --------------------------------------------------------

--
-- Table structure for table `shade_warps`
--

CREATE TABLE `shade_warps` (
  `id` int(11) NOT NULL,
  `shade_id` int(11) DEFAULT NULL,
  `warp_id` int(11) DEFAULT NULL,
  `actual_id` int(11) DEFAULT NULL,
  `material_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `shade_warps`
--

INSERT INTO `shade_warps` (`id`, `shade_id`, `warp_id`, `actual_id`, `material_id`, `created_at`, `updated_at`) VALUES
(1, 5, NULL, 1, 1, '2024-07-07 13:59:36', '2024-07-07 13:59:36'),
(3, 6, NULL, 1, 1, '2024-07-07 14:44:32', '2024-07-07 14:44:32'),
(4, 1, NULL, 1, 1, '2024-07-07 14:44:55', '2024-07-07 14:44:55'),
(5, 7, 2, 1, 1, '2024-07-10 15:09:50', '2024-07-10 15:09:50'),
(6, 7, 3, 1, 1, '2024-07-10 15:09:50', '2024-07-10 15:09:50'),
(7, 7, 4, 1, 1, '2024-07-10 15:09:50', '2024-07-10 15:09:50'),
(8, 7, 5, 1, 1, '2024-07-10 15:09:50', '2024-07-10 15:09:50'),
(9, 7, 6, 1, 1, '2024-07-10 15:09:50', '2024-07-10 15:09:50'),
(10, 7, 7, 1, 1, '2024-07-10 15:09:50', '2024-07-10 15:09:50'),
(11, 7, 8, 1, 1, '2024-07-10 15:09:50', '2024-07-10 15:09:50'),
(13, 8, NULL, 1, 1, '2024-08-03 07:47:11', '2024-08-03 07:47:11'),
(14, 9, NULL, 3, 3, '2024-08-07 13:28:33', '2024-08-07 13:28:33'),
(15, 10, NULL, 1, 1, '2024-09-05 16:17:42', '2024-09-05 16:17:42'),
(16, 11, NULL, 1, 1, '2024-09-15 09:35:46', '2024-09-15 09:35:46'),
(17, 12, NULL, 3, 3, '2024-09-22 13:07:04', '2024-09-22 13:07:04'),
(18, 13, NULL, 3, 2, '2024-09-23 18:39:56', '2024-09-23 18:39:56'),
(19, 14, NULL, 1, 1, '2024-09-24 14:53:15', '2024-09-24 14:53:15'),
(20, 15, NULL, 1, 1, '2024-10-11 11:44:09', '2024-10-11 11:44:09'),
(21, 16, NULL, 3, 3, '2024-10-12 03:10:05', '2024-10-12 03:10:05'),
(23, 18, NULL, 4, 4, '2024-10-19 15:02:02', '2024-10-19 15:02:02'),
(24, 17, NULL, NULL, 4, '2024-11-18 08:56:12', '2024-11-18 08:56:12'),
(25, 19, NULL, 2, 2, '2024-11-30 15:37:04', '2024-11-30 15:37:04'),
(26, 20, NULL, 1, 1, '2025-01-18 07:08:30', '2025-01-18 07:08:30'),
(27, 21, NULL, 4, 4, '2025-02-05 05:31:29', '2025-02-05 05:31:29');

-- --------------------------------------------------------

--
-- Table structure for table `shade_wefts`
--

CREATE TABLE `shade_wefts` (
  `id` int(11) NOT NULL,
  `shade_id` int(11) DEFAULT NULL,
  `actual_id` int(11) DEFAULT NULL,
  `material_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `shade_wefts`
--

INSERT INTO `shade_wefts` (`id`, `shade_id`, `actual_id`, `material_id`, `created_at`, `updated_at`) VALUES
(2, 6, 1, 1, '2024-07-07 14:44:32', '2024-07-07 14:44:32'),
(3, 1, 1, 1, '2024-07-07 14:44:55', '2024-07-07 14:44:55'),
(4, 7, 1, 1, '2024-07-10 15:09:50', '2024-07-10 15:09:50'),
(5, 7, 1, 1, '2024-07-10 15:09:50', '2024-07-10 15:09:50'),
(6, 7, 1, 1, '2024-07-10 15:09:50', '2024-07-10 15:09:50'),
(7, 7, 1, 1, '2024-07-10 15:09:50', '2024-07-10 15:09:50'),
(8, 7, 1, 1, '2024-07-10 15:09:50', '2024-07-10 15:09:50'),
(9, 7, 1, 1, '2024-07-10 15:09:50', '2024-07-10 15:09:50'),
(11, 8, 1, 1, '2024-08-03 07:47:11', '2024-08-03 07:47:11'),
(12, 9, 2, 2, '2024-08-07 13:28:33', '2024-08-07 13:28:33'),
(13, 10, 1, 2, '2024-09-05 16:17:42', '2024-09-05 16:17:42'),
(14, 11, 1, 2, '2024-09-15 09:35:46', '2024-09-15 09:35:46'),
(15, 12, 3, 3, '2024-09-22 13:07:04', '2024-09-22 13:07:04'),
(16, 13, 3, 2, '2024-09-23 18:39:56', '2024-09-23 18:39:56'),
(17, 14, 1, 1, '2024-09-24 14:53:15', '2024-09-24 14:53:15'),
(18, 15, 1, 1, '2024-10-11 11:44:09', '2024-10-11 11:44:09'),
(19, 16, 4, 4, '2024-10-12 03:10:05', '2024-10-12 03:10:05'),
(21, 18, 4, 4, '2024-10-19 15:02:02', '2024-10-19 15:02:02'),
(22, 17, NULL, 4, '2024-11-18 08:56:12', '2024-11-18 08:56:12'),
(23, 19, 2, 2, '2024-11-30 15:37:04', '2024-11-30 15:37:04'),
(24, 20, 2, 2, '2025-01-18 07:08:30', '2025-01-18 07:08:30'),
(25, 21, 4, 4, '2025-02-05 05:31:29', '2025-02-05 05:31:29');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_terms`
--

CREATE TABLE `shipping_terms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `shipping_terms`
--

INSERT INTO `shipping_terms` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'FOB', 1, '2024-07-05 10:00:45', '2024-10-11 06:25:42');

-- --------------------------------------------------------

--
-- Table structure for table `ship_tos`
--

CREATE TABLE `ship_tos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(500) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ship_tos`
--

INSERT INTO `ship_tos` (`id`, `name`, `address`, `status`, `created_at`, `updated_at`) VALUES
(1, 'AA', 'aaaaaa', 1, '2024-07-05 10:00:45', '2025-02-01 10:22:26');

-- --------------------------------------------------------

--
-- Table structure for table `sizing_plans`
--

CREATE TABLE `sizing_plans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `plan_number` varchar(50) DEFAULT NULL,
  `is_complete` tinyint(1) DEFAULT NULL,
  `default_meter_for_beam` double DEFAULT NULL,
  `given_meters` double DEFAULT NULL,
  `copart_id` int(11) DEFAULT NULL,
  `no_of_bags` double DEFAULT NULL,
  `meter_per_part` double DEFAULT NULL,
  `expected_meter` double DEFAULT NULL,
  `total_meter` double DEFAULT NULL,
  `bottom_percent` double DEFAULT NULL,
  `weight_per_cone` double DEFAULT NULL,
  `kg_per_bag` double DEFAULT NULL,
  `cone_per_bag` double DEFAULT NULL,
  `mill_name_id` int(11) DEFAULT NULL,
  `yarn_id` int(11) DEFAULT NULL,
  `actual_count_id` int(11) DEFAULT NULL,
  `count` double DEFAULT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `beam_recieve_date` date DEFAULT NULL,
  `ref_number` double DEFAULT NULL,
  `merchandiser_id` int(11) DEFAULT NULL,
  `machine_id` int(11) DEFAULT NULL,
  `payment_term_id` int(11) DEFAULT NULL,
  `remarks` varchar(250) DEFAULT NULL,
  `sizing_amount` double DEFAULT NULL,
  `planning_date` date DEFAULT NULL,
  `is_sizing_order` tinyint(1) DEFAULT NULL,
  `sizing_name_id` int(11) DEFAULT NULL,
  `sizing_for` varchar(100) DEFAULT NULL,
  `yarn_issue` int(11) DEFAULT NULL,
  `beam_inward_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `sizing_plans`
--

INSERT INTO `sizing_plans` (`id`, `plan_number`, `is_complete`, `default_meter_for_beam`, `given_meters`, `copart_id`, `no_of_bags`, `meter_per_part`, `expected_meter`, `total_meter`, `bottom_percent`, `weight_per_cone`, `kg_per_bag`, `cone_per_bag`, `mill_name_id`, `yarn_id`, `actual_count_id`, `count`, `vendor_id`, `beam_recieve_date`, `ref_number`, `merchandiser_id`, `machine_id`, `payment_term_id`, `remarks`, `sizing_amount`, `planning_date`, `is_sizing_order`, `sizing_name_id`, `sizing_for`, `yarn_issue`, `beam_inward_id`, `created_at`, `updated_at`) VALUES
(5, 'SP-5', 1, 1, 2, 1, NULL, 2, NULL, 2, 2, 2, 2, 2, 1, 1, 1, NULL, 1, '2024-07-16', 2, 1, 1, 2, '2', 1, '2024-07-21', 1, 1, 'jobwork', NULL, NULL, '2024-07-15 17:28:25', '2024-07-16 09:27:04'),
(6, 'SP-6', 0, 0, 2, 1, 1, 1, NULL, 1, 1, 1, 1, 1, 1, 1, 1, NULL, 1, '2024-01-01', 1, 1, 1, 2, '1', 1, '2024-12-30', 0, 1, 'jobwork', NULL, NULL, '2024-08-03 08:35:19', '2024-08-03 08:35:19'),
(7, 'SP-7', 0, 0, 1, 1, 1, 1, NULL, 1, 1, 1, 1, 1, 1, 1, 1, NULL, 1, '2024-01-02', 2, 1, 1, 2, '1', 1, '2024-12-31', 0, 1, 'jobwork', NULL, NULL, '2024-08-03 08:38:01', '2024-08-03 08:38:01'),
(8, 'SP-8', 0, 0, 10, 1, 10, 10, NULL, 10, 10, 1, 10, 10, 1, 3, 3, NULL, 1, '2024-08-07', 10, 1, 1, 3, '10---00', 10, '2024-08-07', 0, 1, 'jobwork', NULL, NULL, '2024-08-07 13:50:44', '2024-08-07 13:50:44'),
(9, 'SP-9', 0, 0, 10, 1, 10, 10, NULL, 10, 10, 1, 10, 10, 1, 3, 3, NULL, 1, '2024-08-07', 10, 1, 1, 3, '10---00', 10, '2024-08-07', 0, 1, 'jobwork', NULL, NULL, '2024-08-07 13:50:53', '2024-08-07 13:50:53'),
(10, 'SP-10', 0, 0, 10, 1, 10, 10, NULL, 10, 10, 1, 10, 10, 1, 3, 3, NULL, 1, '2024-08-07', 10, 1, 1, 3, '10---00', 10, '2024-08-07', 0, 1, 'jobwork', NULL, NULL, '2024-08-07 13:52:28', '2024-08-07 13:52:28'),
(11, 'SP-11', 0, 0, 5, 1, 5, 5, 5, 5, 5, 1, 5, 5, 2, 3, 3, NULL, 2, '2024-08-07', 5, 1, 1, 3, 'PPPP', 5, '2024-08-07', 0, 2, 'jobwork', NULL, NULL, '2024-08-07 18:38:16', '2024-08-29 12:01:29'),
(12, 'SP-12', 1, 0, 0, 1, 0, 0, 16990, 17338, 2, 0.6666666666666666, 4, 6, 8, 3, 3, NULL, 8, '2024-05-02', NULL, 1, 1, 3, 'hkskdfk', 6, '2024-10-13', 1, 8, 'jobwork', NULL, NULL, '2024-10-06 15:05:31', '2024-10-15 15:56:59'),
(13, 'SP-13', 0, 0, 69, 1, 69, 69, 69, 69, 69, 1, 69, 69, 12, 4, 4, NULL, 10, '2026-01-01', 1565, 1, 1, 4, ';m;ml', 69, '2025-01-01', 0, 10, 'jobwork', NULL, NULL, '2024-10-19 15:21:32', '2024-10-19 15:21:32'),
(15, 'SP-15', 0, 0, 26, 1, 26, 26, 26, 26, 26, 1, 26, 26, 23, 4, 4, NULL, 10, '2024-01-31', 26, 1, 1, 7, '26', 26, '2024-01-01', 0, 10, 'jobwork', NULL, NULL, '2024-11-04 15:45:39', '2024-11-04 15:45:39'),
(16, 'SP-16', 1, 1, 26, 1, 26, 26, 26, 26, 26, 1, 26, 26, 23, 4, 4, 36, 10, '2024-01-31', 26, 1, 1, 7, '26', 26, '2024-01-01', 1, 10, 'jobwork', NULL, NULL, '2024-11-04 15:47:17', '2024-11-04 16:22:13'),
(17, 'SP-17', 0, 0, 21, 2, 12, 21, 12, 12, 21, 1.75, 21, 12, 35, 4, 4, 36, 10, '2025-11-01', 12, 2, 3, 7, '12', 12, '2024-12-01', 0, 10, 'jobwork', NULL, NULL, '2024-11-08 16:14:16', '2024-11-08 16:14:16'),
(18, 'SP-18', 0, 0, 25.99, 1, 22, 22, 22, 22, 22, 1, 22, 22, 11, 2, 2, 26, 10, '2222-02-02', 22, 1, 1, 7, '22', 22, '2024-12-31', 0, 10, 'jobwork', NULL, NULL, '2024-11-30 15:54:58', '2024-11-30 15:54:58'),
(19, 'SP-19', 0, 0, 1750, 1, 0, 0, 0, 0, 0, 1.3333333333333333, 40, 30, 40, 1, 1, 40, 8, '2025-01-18', NULL, 1, 4, 13, NULL, 100, '2025-01-18', 0, 8, 'jobwork', NULL, NULL, '2025-01-18 07:55:58', '2025-01-18 07:55:58'),
(20, 'SP-20', 0, 0, 15, 1, 15, 15, 15, 15, 15, 1, 15, 15, 39, 4, 4, 40, 10, '2025-02-08', 15, 1, 4, 10, '15', 15, '2025-02-08', 0, 10, 'jobwork', NULL, NULL, '2025-02-05 06:28:26', '2025-02-05 06:28:26');

-- --------------------------------------------------------

--
-- Table structure for table `sizing_plan_beams`
--

CREATE TABLE `sizing_plan_beams` (
  `id` int(11) NOT NULL,
  `sizing_plan_id` int(11) DEFAULT NULL,
  `is_set_beam` tinyint(1) DEFAULT NULL,
  `loom_ched_id` int(11) DEFAULT NULL,
  `beam_dia` double DEFAULT NULL,
  `warp_meters` double DEFAULT NULL,
  `expected_fabric_mtrs` double DEFAULT NULL,
  `beam_meters` double DEFAULT NULL,
  `loom_number_id` int(11) DEFAULT NULL,
  `loom_model_id` int(11) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `weaver_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `sizing_plan_beams`
--

INSERT INTO `sizing_plan_beams` (`id`, `sizing_plan_id`, `is_set_beam`, `loom_ched_id`, `beam_dia`, `warp_meters`, `expected_fabric_mtrs`, `beam_meters`, `loom_number_id`, `loom_model_id`, `order_id`, `weaver_id`, `created_at`, `updated_at`) VALUES
(1, 4, 0, 3, NULL, NULL, NULL, NULL, 3, 2, 13, 1, '2024-07-15 17:13:42', '2024-07-15 17:13:42'),
(21, 5, 0, 2, 2, 2, 2, 7, 2, 3, 13, 1, '2024-07-16 09:27:27', '2024-07-16 09:27:27'),
(22, 5, 1, 3, 3, 3, 3, 3, NULL, NULL, NULL, NULL, '2024-07-16 09:27:27', '2024-07-16 09:27:27'),
(23, 7, 0, 3, 1, 1, 1, 1, 2, 2, 13, 1, '2024-08-03 08:38:01', '2024-08-03 08:38:01'),
(24, 10, 0, 2, 10, 10, 10, 10, 2, 2, 23, 1, '2024-08-07 13:52:28', '2024-08-07 13:52:28'),
(29, 11, 1, 2, 5, 5, 5, 5, 2, 2, 23, 1, '2024-08-29 12:01:29', '2024-08-29 12:01:29'),
(34, 12, 1, NULL, NULL, 0, 1, 0, NULL, NULL, NULL, 1, '2024-10-15 15:56:59', '2024-10-15 15:56:59'),
(35, 12, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-15 15:56:59', '2024-10-15 15:56:59'),
(36, 13, 1, 3, 69, 69, 69, 69, 3, 3, 37, 1, '2024-10-19 15:21:32', '2024-10-19 15:21:32'),
(37, 14, 0, NULL, 541, 5412, 242, 5, NULL, NULL, NULL, NULL, '2024-10-28 15:06:31', '2024-10-28 15:06:31'),
(38, 14, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-28 15:06:31', '2024-10-28 15:06:31'),
(39, 14, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-28 15:06:31', '2024-10-28 15:06:31'),
(41, 16, 1, 3, 54, 78, 50, 15, 3, 3, 35, 1, '2024-11-04 16:23:46', '2024-11-04 16:23:46'),
(45, 17, 1, 3, 32, 23, 32, 23, 3, 3, 37, 1, '2024-11-08 16:18:46', '2024-11-08 16:18:46'),
(46, 17, 1, 3, 23, 32, 23, 32, 3, 3, 37, 6, '2024-11-08 16:18:46', '2024-11-08 16:18:46'),
(47, 18, 1, 3, 22, 22, 22, 22, 3, 3, 40, 1, '2024-11-30 15:54:58', '2024-11-30 15:54:58'),
(48, 19, 0, NULL, NULL, 1750, NULL, 1750, 3, 3, 41, 1, '2025-01-18 07:55:58', '2025-01-18 07:55:58'),
(49, 20, 0, 3, 15, 15, 15, 15, 3, 3, 42, 1, '2025-02-05 06:28:26', '2025-02-05 06:28:26');

-- --------------------------------------------------------

--
-- Table structure for table `sizing_plan_yarns`
--

CREATE TABLE `sizing_plan_yarns` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sizing_plan_id` int(11) DEFAULT NULL,
  `yarn_id` int(11) DEFAULT NULL,
  `sort_id` int(11) DEFAULT NULL,
  `sort_ends` double DEFAULT NULL,
  `sizing_ends` double DEFAULT NULL,
  `width` double DEFAULT NULL,
  `parts` double DEFAULT NULL,
  `ends_per_parts` double DEFAULT NULL,
  `dbf` double DEFAULT NULL,
  `weave_type_id` int(11) DEFAULT NULL,
  `loom_type_id` int(11) DEFAULT NULL,
  `meters` double DEFAULT NULL,
  `warp_meters` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `sizing_plan_yarns`
--

INSERT INTO `sizing_plan_yarns` (`id`, `created_at`, `updated_at`, `sizing_plan_id`, `yarn_id`, `sort_id`, `sort_ends`, `sizing_ends`, `width`, `parts`, `ends_per_parts`, `dbf`, `weave_type_id`, `loom_type_id`, `meters`, `warp_meters`) VALUES
(1, '2024-07-15 17:09:51', '2024-07-15 17:09:51', 1, 1, 1, 11, 1, 1, 1, 1, 1, NULL, 2, 1, 1),
(2, '2024-07-15 17:10:55', '2024-07-15 17:10:55', 2, 1, 1, 11, 1, 1, 1, 1, 1, NULL, 2, 1, 1),
(3, '2024-07-15 17:13:28', '2024-07-15 17:13:28', 3, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL),
(4, '2024-07-15 17:13:42', '2024-07-15 17:13:42', 4, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL),
(39, '2024-07-16 09:27:27', '2024-07-16 09:27:27', 5, 1, 7, 4, 4, 4, 4, 4, 4, NULL, 2, 4, 4),
(40, '2024-07-16 09:27:27', '2024-07-16 09:27:27', 5, 1, 10, 2, 2, 2, 2, 2, 2, NULL, 3, 2, 2),
(41, '2024-08-03 08:38:01', '2024-08-03 08:38:01', 7, 1, 1, 1, 11, 11, 1, 11, 1, 1, 3, 1, 1),
(42, '2024-08-07 13:50:44', '2024-08-07 13:50:44', 8, 3, 14, 10, 70, 7, 10, 10, 10, 1, 2, 10, 1010),
(43, '2024-08-07 13:50:53', '2024-08-07 13:50:53', 9, 3, 14, 10, 70, 7, 10, 10, 10, 1, 2, 10, 1010),
(44, '2024-08-07 13:52:28', '2024-08-07 13:52:28', 10, 3, 14, 10, 70, 7, 10, 10, 10, 1, 2, 10, 1010),
(49, '2024-08-29 12:01:29', '2024-08-29 12:01:29', 11, 3, 14, 5, 35, 7, 5, 7, 5, 1, 2, 5, 55),
(53, '2024-10-15 15:56:59', '2024-10-15 15:56:59', 12, 3, 39, 36, 3400, 67, 0, 1, 1, 1, 3, 1, 1),
(54, '2024-10-19 15:21:32', '2024-10-19 15:21:32', 13, 4, 44, 69, 4761, 69, 69, 69, 69, 1, 3, 69, 69),
(55, '2024-10-28 15:06:31', '2024-10-28 15:06:31', 14, 1, 42, 2.5, 47.5, 19, 2.5, 2.5, 2.5, 1, 3, 2.5, 2.5),
(58, '2024-11-04 16:23:46', '2024-11-04 16:23:46', 16, 1, 39, 3400, 3400, 67, 10, 22780, 15, 1, 3, 80, 80),
(61, '2024-11-08 16:18:46', '2024-11-08 16:18:46', 17, 1, 44, 328512.18, 328512.18, 69, 23, 985536.5399999999, 12, 1, 3, 12, 12),
(62, '2024-11-30 15:54:58', '2024-11-30 15:54:58', 18, 2, 46, 10651.18, 10651.18, 22, 22, 10651.18, 22, 1, 3, 22, 22),
(63, '2025-01-18 07:55:58', '2025-01-18 07:55:58', 19, 1, 47, 4424, 4424, 64, 0, 0, 0, 1, 3, 1750, 1750),
(64, '2025-02-05 06:28:26', '2025-02-05 06:28:26', 20, 1, 49, 3378.18, 3378.18, 15, 15, 3378.18, 15, 1, 3, 15, 15);

-- --------------------------------------------------------

--
-- Table structure for table `sizing_yarn_issues`
--

CREATE TABLE `sizing_yarn_issues` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sizing_plan_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `set_no` double DEFAULT NULL,
  `van_no` varchar(150) DEFAULT NULL,
  `approx_value` varchar(150) DEFAULT NULL,
  `transport_id` int(11) DEFAULT NULL,
  `dc_no` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `sizing_yarn_issues`
--

INSERT INTO `sizing_yarn_issues` (`id`, `sizing_plan_id`, `created_at`, `updated_at`, `set_no`, `van_no`, `approx_value`, `transport_id`, `dc_no`) VALUES
(5, 5, '2024-07-29 16:16:33', '2024-07-29 16:16:33', 2, '3', '3', 2, NULL),
(6, 7, '2024-08-03 09:09:18', '2024-08-05 06:51:15', 2, '2321', '112', 3, NULL),
(7, 11, '2024-08-08 11:09:37', '2024-08-08 11:09:37', 14, '14', '14', 4, NULL),
(8, 12, '2024-10-06 15:23:38', '2024-10-06 15:23:38', 12, '12', '12', 2, NULL),
(9, 13, '2024-10-19 15:29:20', '2024-10-19 15:29:20', 69, '69', '69', 4, NULL),
(10, 18, '2024-11-30 16:03:51', '2024-11-30 16:03:51', 22, '22', '22', 1, NULL),
(11, 20, '2025-02-05 06:46:07', '2025-02-05 06:46:07', NULL, NULL, NULL, 5, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sizing_yarn_issue_details`
--

CREATE TABLE `sizing_yarn_issue_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sizing_yarn_issue_id` int(11) DEFAULT NULL,
  `jobwork_weaving_contract_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `actual_count_id` int(11) DEFAULT NULL,
  `cone_tip_color` varchar(250) DEFAULT NULL,
  `location` varchar(250) DEFAULT NULL,
  `lot_no` varchar(250) DEFAULT NULL,
  `item_type` varchar(250) DEFAULT NULL,
  `item` varchar(250) DEFAULT NULL,
  `mill` varchar(250) DEFAULT NULL,
  `stock_receipt_id` int(11) DEFAULT NULL,
  `available_quantity` double DEFAULT NULL,
  `available_bags` double DEFAULT NULL,
  `no_of_bags_issuing` double DEFAULT NULL,
  `kgs_per_bag` double DEFAULT NULL,
  `cones_per_bag` double DEFAULT NULL,
  `issued_cones` double DEFAULT NULL,
  `issuing_quantity` double DEFAULT NULL,
  `convertion_value` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `sizing_yarn_issue_details`
--

INSERT INTO `sizing_yarn_issue_details` (`id`, `sizing_yarn_issue_id`, `jobwork_weaving_contract_id`, `created_at`, `updated_at`, `actual_count_id`, `cone_tip_color`, `location`, `lot_no`, `item_type`, `item`, `mill`, `stock_receipt_id`, `available_quantity`, `available_bags`, `no_of_bags_issuing`, `kgs_per_bag`, `cones_per_bag`, `issued_cones`, `issuing_quantity`, `convertion_value`) VALUES
(2, 6, NULL, '2024-08-05 06:51:15', '2024-08-05 06:51:15', 1, '-', 'AAAA', 'a, 55,', NULL, '8/1 UOM2 TYPE1 VRT1 green', 'AAAA', 3, 33, 33, NULL, 33, 33, NULL, NULL, NULL),
(4, 7, NULL, '2024-08-29 12:01:44', '2024-08-29 12:01:44', 2, '-', 'AAAA', '13--01,', NULL, 'SINGLE/26 NM 100% Linen Yarn LY', 'AAAA', 13, 121, 11, 14, 11, 11, 154, 154, 154),
(5, 8, NULL, '2024-10-06 15:23:38', '2024-10-06 15:23:38', NULL, '-', 'Vendor 1', '1,', NULL, 'SINGLE/COUNT1a KGS TYPE19999D VRT12222e green', 'Vendor 1', 32, 15, 15, NULL, 1, 2, NULL, NULL, NULL),
(7, 9, NULL, '2024-10-19 15:29:33', '2024-10-19 15:29:33', NULL, '-', 'undefined', '4,', NULL, 'SINGLE/COUNT1a KGS TYPE19999D VRT12222e green', 'undefined', 4, 15, 15, NULL, 1, 4, NULL, NULL, NULL),
(9, 10, NULL, '2024-11-30 16:08:54', '2024-11-30 16:08:54', 2, '-', 'undefined', '4,', NULL, 'SINGLE/COUNT1a KGS TYPE19999D VRT12222e green', 'undefined', 4, 15, 15, NULL, 1, 4, NULL, NULL, NULL),
(10, 11, NULL, '2025-02-05 06:46:31', '2025-02-05 06:46:31', NULL, '-', 'undefined', '4,', NULL, '1.0/40.0 NE 100% LINEN YARN CY red', 'undefined', 4, 15, 15, NULL, 1, 4, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sorts`
--

CREATE TABLE `sorts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fabric` varchar(255) DEFAULT NULL,
  `sort_no` varchar(255) DEFAULT NULL,
  `details` text DEFAULT NULL,
  `weave` int(11) DEFAULT NULL,
  `create_for` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `numeric` varchar(255) DEFAULT NULL,
  `yarn` varchar(255) DEFAULT NULL,
  `reed` varchar(255) DEFAULT NULL,
  `denting` varchar(255) DEFAULT NULL,
  `epi` varchar(255) DEFAULT NULL,
  `width` varchar(255) DEFAULT NULL,
  `e_width` varchar(255) DEFAULT NULL,
  `reed_space` varchar(255) DEFAULT NULL,
  `total_ends` varchar(255) DEFAULT NULL,
  `picks` varchar(255) DEFAULT NULL,
  `pick_insert` varchar(255) DEFAULT NULL,
  `width_cm` varchar(255) DEFAULT NULL,
  `composition` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `loom_type` varchar(255) DEFAULT NULL,
  `selvedge` varchar(255) DEFAULT NULL,
  `dents` varchar(255) DEFAULT NULL,
  `s_width` varchar(255) DEFAULT NULL,
  `ends_per_dent` varchar(255) DEFAULT NULL,
  `selvedge_ends` varchar(255) DEFAULT NULL,
  `ends_with_selvedge` varchar(255) DEFAULT NULL,
  `beam_type` varchar(255) DEFAULT NULL,
  `selvedge_drawing` varchar(255) DEFAULT NULL,
  `tube_size` varchar(255) DEFAULT NULL,
  `total_warp_patterns` varchar(255) DEFAULT NULL,
  `total_weft_patterns` varchar(255) DEFAULT NULL,
  `total_warp_grams` varchar(255) DEFAULT NULL,
  `total_weft_grams` varchar(255) DEFAULT NULL,
  `cal_glm_shrinkage` varchar(255) DEFAULT NULL,
  `cal_gsm_shrinkage` varchar(255) DEFAULT NULL,
  `cal_glm_wihtout_shrinkage` varchar(255) DEFAULT NULL,
  `cal_gsm_without_shrinkage` varchar(255) DEFAULT NULL,
  `master_quality` int(11) DEFAULT NULL,
  `act_glm` varchar(255) DEFAULT NULL,
  `act_gsm` varchar(255) DEFAULT NULL,
  `on_loom` varchar(255) DEFAULT NULL,
  `drawing` varchar(255) DEFAULT NULL,
  `peg_plan` varchar(255) DEFAULT NULL,
  `display_quality` varchar(255) DEFAULT NULL,
  `design_paper_image` varchar(255) DEFAULT NULL,
  `fabric_image` varchar(255) DEFAULT NULL,
  `thread_count` varchar(255) DEFAULT NULL,
  `fabric_cover` varchar(255) DEFAULT NULL,
  `fabric_cover_range` varchar(255) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `is_master` tinyint(1) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `hsn` varchar(255) DEFAULT NULL,
  `igst` varchar(255) DEFAULT NULL,
  `cgst` varchar(255) DEFAULT NULL,
  `sgst` varchar(255) DEFAULT NULL,
  `cess` varchar(255) DEFAULT NULL,
  `hsn_description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `sorts`
--

INSERT INTO `sorts` (`id`, `fabric`, `sort_no`, `details`, `weave`, `create_for`, `code`, `company`, `numeric`, `yarn`, `reed`, `denting`, `epi`, `width`, `e_width`, `reed_space`, `total_ends`, `picks`, `pick_insert`, `width_cm`, `composition`, `size`, `loom_type`, `selvedge`, `dents`, `s_width`, `ends_per_dent`, `selvedge_ends`, `ends_with_selvedge`, `beam_type`, `selvedge_drawing`, `tube_size`, `total_warp_patterns`, `total_weft_patterns`, `total_warp_grams`, `total_weft_grams`, `cal_glm_shrinkage`, `cal_gsm_shrinkage`, `cal_glm_wihtout_shrinkage`, `cal_gsm_without_shrinkage`, `master_quality`, `act_glm`, `act_gsm`, `on_loom`, `drawing`, `peg_plan`, `display_quality`, `design_paper_image`, `fabric_image`, `thread_count`, `fabric_cover`, `fabric_cover_range`, `remarks`, `is_master`, `status`, `hsn`, `igst`, `cgst`, `sgst`, `cess`, `hsn_description`, `created_at`, `updated_at`) VALUES
(39, 'grey', 'ARNEY PD', 'ARNEY PD/67\" 00/24LINENX0/36LINEN 50X52 PLAIN', 1, 'both', NULL, NULL, 'ARNEY PD-67\" 24/1LINENX36/1LINEN 50X52 PLAIN', '100% LINEN', '50.0', '2', '50', '67', '1', '68', '3400', '52', NULL, NULL, '100% LINEN', NULL, '3', NULL, '0', '0', '0.0', '50.0', '3400', NULL, NULL, '2', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ARNEY PD/67\" 00/24LINENX0/36LINEN 50X52 PLAIN', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '53092920', '5.0', '2.5', '2.5', NULL, NULL, '2024-10-11 12:19:21', '2024-10-12 03:08:55'),
(40, 'finished', 'ARNEY PD-BLACK', 'ARNEY PD-BLACK/57\" 00/24LINENX0/36LINEN 1X52 PLAIN', 1, 'both', NULL, NULL, 'ARNEY PD-67\" 24/1LINENX36/1LINEN 50X52 PLAIN', '100% LINEN', '1', '2', '1', '57', '1', '58', '58', '52', NULL, NULL, '100% LINEN', NULL, '3', NULL, '0', '0', '0.0', '50.0', '58', NULL, NULL, '2', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ARNEY PD-BLACK/57\" 00/24LINENX0/36LINEN 1X52 PLAIN', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '53092920', '5.0', '2.5', '2.5', NULL, NULL, '2024-10-12 03:10:07', '2025-01-08 06:20:04'),
(47, 'grey', 'CP01/01', 'CP01/01/64.0\" 0/40LINENX0/26LINEN 68X50 PLAIN', 1, 'both', '1', NULL, 'CAPECASTEL YD/CP01/01-64\" 40/1CY(5016)X26/1LINEN() 68X50 PLAIN', '65% LINEN 35% COTTON', '68.0', '2', '68', '64.0', '1', '65', '4420', '50', '1', NULL, '65% LINEN 35% COTTON', NULL, '3', '3', '2.0', '1', '2', '68.0', '4424', NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 47, NULL, NULL, NULL, NULL, NULL, 'CP01/01/64.0\" 0/40LINENX0/26LINEN 68X50 PLAIN', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '53092910', '5.0', '2.5', '2.5', NULL, '65% LINEN 35% COTTON', '2025-01-08 11:22:17', '2025-01-18 07:07:35'),
(48, 'finished', 'CP01/01-SKY BLUE CHAMBRAY', 'CP01/01-SKY BLUE CHAMBRAY/57\" 0/40LINENX0/26LINEN 74X50 PLAIN', 1, 'both', '1', NULL, 'CAPECASTEL YD/CP01/01-64\" 40/1CY(5016)X26/1LINEN() 68X50 PLAIN', '65% LINEN 35% COTTON', '74', '2', '74', '57', '1', '58', '4292', '50', '1', NULL, '65% LINEN 35% COTTON', NULL, '3', '3', '2.0', '1', '2', '68.0', '4296', NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 47, NULL, NULL, NULL, NULL, NULL, 'CP01/01-SKY BLUE CHAMBRAY/57\" 0/40LINENX0/26LINEN 74X50 PLAIN', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '53092910', '5.0', '2.5', '2.5', NULL, '65% LINEN 35% COTTON', '2025-01-18 07:08:34', '2025-01-18 07:09:37'),
(49, 'grey', '951', '951/15\" 0/40LINENX0/40LINEN 112.5X15 PLAIN', 1, 'domestic', '159', NULL, 'Quality', 'composition', '15', '15', '112.5', '15', '15', '30', '3375', '15', '15', '38.1', '15', '15', '3', '3', '1.18', '1', '2', '4.36', '3378.18', '1', '15', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '15', '15', '15', NULL, NULL, '951/15\" 0/40LINENX0/40LINEN 112.5X15 PLAIN', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '15', NULL, NULL, NULL, NULL, NULL, '2025-02-05 05:29:31', '2025-02-05 05:29:31'),
(50, 'finished', '951-951checking', '951/15\" 0/40LINENX0/40LINEN 112.5X15 PLAIN', 1, 'domestic', '159', NULL, 'Quality', 'composition', '15', '15', '112.5', '15', '15', '30', '3375', '15', '159', NULL, '15', '15', '3', '3', '1.18', '1', '2', '4.36', '3378.18', NULL, '15', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 50, '15', '15', '15', NULL, NULL, '951/15\" 0/40LINENX0/40LINEN 112.5X15 PLAIN', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '15', NULL, NULL, NULL, NULL, NULL, '2025-02-05 05:31:32', '2025-02-05 05:31:53');

-- --------------------------------------------------------

--
-- Table structure for table `sort_greys`
--

CREATE TABLE `sort_greys` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_sort_id` int(11) DEFAULT NULL,
  `sort_id` int(11) DEFAULT NULL,
  `consumption` varchar(150) DEFAULT NULL,
  `weave_id` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `sort_greys`
--

INSERT INTO `sort_greys` (`id`, `parent_sort_id`, `sort_id`, `consumption`, `weave_id`, `status`, `created_at`, `updated_at`) VALUES
(21, 39, 40, NULL, NULL, 1, '2025-01-08 06:20:04', '2025-01-08 06:20:04'),
(24, 47, 48, NULL, NULL, 1, '2025-01-18 07:09:37', '2025-01-18 07:09:37'),
(26, 49, 50, NULL, NULL, 1, '2025-02-05 05:31:53', '2025-02-05 05:31:53');

-- --------------------------------------------------------

--
-- Table structure for table `sort_warp`
--

CREATE TABLE `sort_warp` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sort` int(11) DEFAULT NULL,
  `warp_pattern` varchar(255) DEFAULT NULL,
  `warp_material` varchar(255) DEFAULT NULL,
  `warp_shrinkage` varchar(255) DEFAULT NULL,
  `warp_total_ends` varchar(255) DEFAULT NULL,
  `warp_grams_meters` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `sort_warp`
--

INSERT INTO `sort_warp` (`id`, `sort`, `warp_pattern`, `warp_material`, `warp_shrinkage`, `warp_total_ends`, `warp_grams_meters`, `created_at`, `updated_at`) VALUES
(29, 23, '25555', '1', '22', '1336.12', '0.0005', '2024-09-10 18:07:45', '2024-09-10 18:07:45'),
(38, 31, '69', '3', '06', '216', '0.0089', '2024-09-22 13:09:17', '2024-09-22 13:09:17'),
(44, 39, '1.0', '3', '10', '3400', '0.1439', '2024-10-11 12:19:21', '2024-10-12 02:58:11'),
(45, 40, '1.0', '3', '10', '58', '0.1439', '2024-10-12 03:10:07', '2025-01-08 06:20:04'),
(52, 47, '1', '1', '15.0', '4420', '0.0751', '2025-01-08 11:22:17', '2025-01-18 07:07:35'),
(53, 48, '1', '1', '15.0', '4292', '0.0751', '2025-01-18 07:08:34', '2025-01-18 07:09:37'),
(54, 49, '15', '4', '15', '3375', '0.1079', '2025-02-05 05:29:31', '2025-02-05 05:29:31'),
(55, 50, '15', '4', '15', '3375', '0.1079', '2025-02-05 05:31:32', '2025-02-05 05:31:32');

-- --------------------------------------------------------

--
-- Table structure for table `sort_weft`
--

CREATE TABLE `sort_weft` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sort` int(11) DEFAULT NULL,
  `weft_pattern` varchar(255) DEFAULT NULL,
  `weft_material` varchar(255) DEFAULT NULL,
  `weft_shrinkage` varchar(255) DEFAULT NULL,
  `weft_picks` varchar(255) DEFAULT NULL,
  `weft_grams_meters` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `sort_weft`
--

INSERT INTO `sort_weft` (`id`, `sort`, `weft_pattern`, `weft_material`, `weft_shrinkage`, `weft_picks`, `weft_grams_meters`, `created_at`, `updated_at`) VALUES
(26, 23, '22', '1', '33', '1', '0.0273', '2024-09-10 18:07:45', '2024-09-10 18:07:45'),
(34, 31, '69', '3', '6', '0', 'NaN', '2024-09-22 13:09:17', '2024-09-22 13:09:17'),
(40, 39, '1', '4', '5', NULL, '0.0992', '2024-10-11 12:19:21', '2024-10-12 03:08:55'),
(41, 40, '1', '4', '5', NULL, '0.0992', '2024-10-12 03:10:07', '2024-10-12 03:10:07'),
(48, 47, '1', '2', '5.0', '50', '2.7431', '2025-01-08 11:22:17', '2025-01-08 11:22:17'),
(49, 48, '1', '2', '5.0', '50', '2.7431', '2025-01-18 07:08:34', '2025-01-18 07:08:34'),
(50, 49, '15', '4', '15', '15', '0.1079', '2025-02-05 05:29:31', '2025-02-05 05:29:31'),
(51, 50, '15', '4', '15', '15', '0.1079', '2025-02-05 05:31:32', '2025-02-05 05:31:32');

-- --------------------------------------------------------

--
-- Table structure for table `sourcing_executives`
--

CREATE TABLE `sourcing_executives` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `sourcing_executives`
--

INSERT INTO `sourcing_executives` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Sourc', 1, '2024-07-05 10:00:45', '2024-07-06 10:02:51');

-- --------------------------------------------------------

--
-- Table structure for table `so_types`
--

CREATE TABLE `so_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `so_types`
--

INSERT INTO `so_types` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Bulk', 1, '2024-07-05 10:00:45', '2024-10-11 06:52:36'),
(3, 'Sampling', 1, '2024-10-11 06:52:26', '2024-10-11 06:52:56');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Karnataka', 1, '2024-07-07 08:52:14', '2024-10-11 05:27:11'),
(4, 'TAMILNADU', 1, '2024-09-06 15:26:38', '2024-10-11 05:25:37'),
(5, 'BANGALORE', 1, '2025-01-18 09:30:57', '2025-01-18 09:30:57');

-- --------------------------------------------------------

--
-- Table structure for table `stock_types`
--

CREATE TABLE `stock_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `stock_types`
--

INSERT INTO `stock_types` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'F', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `strength_cvs`
--

CREATE TABLE `strength_cvs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `strength_cvs`
--

INSERT INTO `strength_cvs` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'strength 1D', 1, '2024-07-05 10:00:45', '2024-08-28 08:45:15');

-- --------------------------------------------------------

--
-- Table structure for table `terms_conditions`
--

CREATE TABLE `terms_conditions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `terms_conditions`
--

INSERT INTO `terms_conditions` (`id`, `name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(6, 'TERMS AND CONDITION FOR PI SEZ', 'TERMS AND CONDITIONS No Credit will be allowed   T.T before shipment  Goods once sold Cannot be taken back Subject to TIRUPPUR jurisdiction  We Declare that this invoice shows the actual price of goods Described and that all particulars are BANK NAME : KOTAK MAHINDRA BANK  ACCOUNT NO : 5146144281  SWIFT CODE : KKBKINBBCPC  IFSC CODE : KKBK0009301  BRANCH ; PALAKKAD', 1, '2025-02-05 08:42:02', '2025-02-05 08:42:02'),
(7, 'TERMS AND CONDITIONS FOR INVOICE', 'TERMS AND CONDITIONS No Credit will be allowed   Payment only by NEFT/RTGS/IMPS/UPI Interest @ 18% will be charged if the payment is not made in 30days   Goods once sold Cannot be taken back Subject to TIRUPPUR jurisdiction   We Declare that this invoice shows the actual price of goods Described and that all particulars are', 1, '2025-02-05 08:43:21', '2025-02-05 08:43:21'),
(8, 'TERMS AND CONDITIONS FOR FABRIC PO', 'TERMS AND CONDITIONS 1) Job card will issued with each order & the same need to be returned after process completion 2) Shrinkage should be below 4% 3) Rejection % should be below 1% /skew/ bow need to avoid in all stages of processing 4) In a single dye lot of 2000mtr there should be no more than 2 dye lots 5) Side center shade variation is not acceptable in dye lots 6) slippage, tensile strength should meet the requested standards 7) Weight loss should be not more than 5%', 1, '2025-02-05 08:43:48', '2025-02-05 08:43:48');

-- --------------------------------------------------------

--
-- Table structure for table `tpms`
--

CREATE TABLE `tpms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tpms`
--

INSERT INTO `tpms` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(4, '3', 1, '2025-01-08 13:21:12', '2025-01-08 13:21:12');

-- --------------------------------------------------------

--
-- Table structure for table `transportations`
--

CREATE TABLE `transportations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `gst` varchar(255) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `transportations`
--

INSERT INTO `transportations` (`id`, `name`, `contact`, `address`, `gst`, `remark`, `created_at`, `updated_at`) VALUES
(1, 'A1 TRAVELS', '0', 'VIJAYAMANGALAM', '33ADGPT8295H1Z0', '0', NULL, '2025-01-08 12:32:37'),
(5, 'HST TRANSPORT', '0', 'TIRUPPUR', '33ABACS8833R2ZO', '0', '2025-01-08 12:33:07', '2025-01-08 12:33:07'),
(6, 'ST COURIER', '0', '.', '33ABACS1175L1ZC', '0', '2025-01-08 12:33:49', '2025-01-08 12:33:49');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(6, 'MTR', 1, '2024-10-11 07:10:48', '2024-10-11 07:16:10'),
(7, 'KGS', 1, '2024-10-11 07:16:16', '2024-10-11 07:16:16');

-- --------------------------------------------------------

--
-- Table structure for table `uom`
--

CREATE TABLE `uom` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `to_meter` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `uom`
--

INSERT INTO `uom` (`id`, `code`, `description`, `to_meter`, `type`, `status`, `created_at`, `updated_at`) VALUES
(10, 'YRD', 'Yards', '0.9144', 'fabric', 1, '2024-10-11 07:00:48', '2024-10-11 07:00:48'),
(11, 'KGS', 'KGS', '1.0', 'other_item', 1, '2024-10-12 02:48:01', '2024-10-12 02:48:01'),
(12, 'MTR', 'Meters', '1.0', 'fabric', 1, '2024-10-12 02:48:23', '2024-10-12 02:48:23'),
(13, 'NE', 'NE', '1.0', 'yarn_unit', 1, '2024-10-12 02:48:46', '2024-10-12 02:48:46'),
(14, 'DEN', 'DENIER POLYESTER YARN', '1.0', 'yarn_unit', 1, '2024-10-12 02:49:12', '2024-10-12 02:49:12'),
(15, 'NM', 'NM', '1000.0', 'yarn_unit', 1, '2024-10-12 02:49:37', '2024-10-12 02:49:37'),
(16, 'OTHERS', '', '0', 'other_item', 1, '2024-10-12 02:49:58', '2024-10-12 02:49:58'),
(17, 'KGSS', '', '0', 'fabric', 1, '2024-10-12 02:50:16', '2024-10-12 02:50:16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@demo.com', NULL, '$2y$12$3prcrLIyhvZ15jcqiMvRG.4AiDJALjPzFFEcOCIQqNmv8yk8yV6gO', NULL, NULL, NULL),
(10, 'Shafeeq', 'shafee2k3@gmail.com', NULL, '$2y$12$1Sq6OfJZPXVKJTCHt7LFQ.CbdM8GKXa20GXzT3IARFxbvCo64WJBC', NULL, '2024-10-03 16:04:24', '2024-10-03 16:04:24'),
(11, 'shafeeq123', 'shafeeq@gmail.com', NULL, '$2y$12$ryXjwrD8SVRm34aaMrWwSO2iD9tK6cJlEBORSHirdPlVqJowzWXBS', NULL, '2025-02-02 16:39:12', '2025-02-02 16:39:12');

-- --------------------------------------------------------

--
-- Table structure for table `variety`
--

CREATE TABLE `variety` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `variety`
--

INSERT INTO `variety` (`id`, `name`, `code`, `status`, `created_at`, `updated_at`) VALUES
(14, '55% LINEN 45% LYOCEL', 'LLYO', 1, '2025-01-08 11:49:55', '2025-01-08 11:49:55'),
(15, '55% LYOCEL 45% LINEN', 'LYOL', 1, '2025-01-08 11:50:12', '2025-01-08 11:50:12'),
(16, '35% POLYESTER 65% COTTON', 'PC', 1, '2025-01-08 11:50:26', '2025-01-08 11:50:26'),
(17, '50% HEMP 50% COTTON', 'HC', 1, '2025-01-08 11:50:39', '2025-01-08 11:50:39'),
(18, '100% LINEN DRYSPUN YARN', 'LDY', 1, '2025-01-08 11:50:51', '2025-01-08 11:50:51'),
(19, '95% COTTON 5% SPANDEX', 'CS', 1, '2025-01-08 11:51:04', '2025-01-08 11:51:04'),
(20, '100% TENSIL YARN', 'TL', 1, '2025-01-08 11:51:16', '2025-01-08 11:51:16'),
(21, '82% LYOCELL 18% LINEN', 'LL', 1, '2025-01-08 11:51:24', '2025-01-08 11:51:24'),
(22, '100% ORGANIC LINEN YARN', 'OLY', 1, '2025-01-08 11:51:36', '2025-01-08 11:51:36'),
(23, '100% LINEN BLEACHED WETSPUN', 'LBW', 1, '2025-01-08 11:51:47', '2025-01-08 11:51:47'),
(24, '55% LINEN 45% COTTON', 'LC', 1, '2025-01-08 11:51:58', '2025-01-08 11:51:58'),
(25, '55% LINEN 45% VISCOSE', 'LV', 1, '2025-01-08 11:52:08', '2025-01-08 11:52:08'),
(26, '70% VISCOSE 30% LINEN', 'VL', 1, '2025-01-08 11:52:19', '2025-01-08 11:52:19'),
(27, '95% VISCOSE 5% SPANDEX', 'VS', 1, '2025-01-08 11:52:31', '2025-01-08 11:52:31'),
(28, '100% COTTON YARN', 'CY', 1, '2025-01-08 11:52:38', '2025-01-08 11:52:38'),
(29, '100% LINEN YARN', 'LY', 1, '2025-01-08 11:52:51', '2025-01-08 11:52:51'),
(30, '100% VISCOSE YARN', 'VY', 1, '2025-01-08 11:53:04', '2025-01-08 11:53:04'),
(31, '70% COTTON 30% HEMP', 'CH', 1, '2025-01-08 11:53:16', '2025-01-08 11:53:16');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `code` varchar(100) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `vendor_prefix` varchar(255) DEFAULT NULL,
  `contact_person_name` varchar(255) DEFAULT NULL,
  `contact_no` varchar(255) DEFAULT NULL,
  `landline_number` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `pincode` varchar(255) DEFAULT NULL,
  `fax` varchar(255) DEFAULT NULL,
  `gstn` varchar(255) DEFAULT NULL,
  `vendor_rating` varchar(255) DEFAULT NULL,
  `vendor_preference` varchar(255) DEFAULT NULL,
  `interest_percent` varchar(255) DEFAULT NULL,
  `gst_reg_type_id` int(11) DEFAULT NULL,
  `vendor_group_id` int(11) DEFAULT NULL,
  `pan_number` varchar(255) DEFAULT NULL,
  `account_group_id` int(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `is_tds_applicable` varchar(255) DEFAULT NULL,
  `deductee_type` varchar(255) DEFAULT NULL,
  `msme_non_msme` varchar(255) DEFAULT NULL,
  `purchase_type` varchar(255) DEFAULT NULL,
  `msme_type` varchar(255) DEFAULT NULL,
  `msme_number` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `name`, `code`, `status`, `created_at`, `updated_at`, `vendor_prefix`, `contact_person_name`, `contact_no`, `landline_number`, `email`, `state_id`, `city_id`, `pincode`, `fax`, `gstn`, `vendor_rating`, `vendor_preference`, `interest_percent`, `gst_reg_type_id`, `vendor_group_id`, `pan_number`, `account_group_id`, `address`, `is_tds_applicable`, `deductee_type`, `msme_non_msme`, `purchase_type`, `msme_type`, `msme_number`) VALUES
(8, 'LISMOUNT TEX INDIA LLP', NULL, 1, '2024-10-11 05:15:44', '2025-01-08 12:17:08', NULL, NULL, NULL, NULL, NULL, 4, 6, '638812', NULL, '33AALFL6261D1ZG', NULL, NULL, NULL, NULL, 6, 'AALFL6261D', 1, 'BUILDING NO./FLAT NO.: 1/250-D NALLAGOUNDAN PAL', NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'SRI VEDHA MILLS PVT LTD', NULL, 1, '2024-10-12 11:06:02', '2024-10-12 11:06:02', NULL, NULL, NULL, NULL, NULL, 4, 18, '638107', NULL, '33AASCS8191H1ZR', NULL, NULL, NULL, 17, 7, 'AASCS8191H', NULL, 'DOOR NO:77/1,77/2,NASIYANUR ROAD,\r\nONDIKARANPALAYAM,\r\nVILLARASAMPATTI POST,\r\nERODE,\r\n638107', 'No', NULL, NULL, NULL, NULL, NULL),
(11, 'PRIYANKA TEX', NULL, 1, '2025-02-06 10:28:43', '2025-02-06 10:28:43', NULL, NULL, NULL, NULL, NULL, 4, 18, '638056', NULL, '33AYPPS2872K1ZR', NULL, NULL, NULL, 17, 9, NULL, NULL, 'PRIYANKA TEX 3/437,KAIKOLAPALAYAM& (PO), VIJIYAMANGALAM, PERUNDURAI TALUK, ERODE', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vendor_banks`
--

CREATE TABLE `vendor_banks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `bank_id` int(11) DEFAULT NULL,
  `account_number` varchar(250) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `pin_code` varchar(250) DEFAULT NULL,
  `phone_number` varchar(250) DEFAULT NULL,
  `ifsc_code` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `vendor_banks`
--

INSERT INTO `vendor_banks` (`id`, `vendor_id`, `bank_id`, `account_number`, `country_id`, `state_id`, `city_id`, `address`, `pin_code`, `phone_number`, `ifsc_code`, `created_at`, `updated_at`) VALUES
(2, 9, 1, NULL, NULL, NULL, NULL, 'dvcC', NULL, NULL, NULL, '2024-10-12 08:57:41', '2024-10-12 08:57:41');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_groups`
--

CREATE TABLE `vendor_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `group` varchar(255) DEFAULT NULL,
  `group_type` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `is_internal` tinyint(1) DEFAULT 0,
  `status` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `vendor_groups`
--

INSERT INTO `vendor_groups` (`id`, `group`, `group_type`, `code`, `is_internal`, `status`, `created_at`, `updated_at`) VALUES
(6, 'LISMOUNT TEX INDIA LLP', '9', 'LISMOUNT TEX INDIA LLP', 1, 1, '2024-10-11 05:17:02', '2024-10-11 05:17:02'),
(7, 'SRI VEDHA MILLS PVT LTD', '8', 'SRI VEDHA MILLS PVT LTD', 1, 1, '2024-10-12 10:58:07', '2024-10-12 10:58:07'),
(9, 'PRIYANKA TEX', '3', 'PRIYANKA TEX', 1, 1, '2025-02-06 10:27:17', '2025-02-06 10:27:26');

-- --------------------------------------------------------

--
-- Table structure for table `weaves`
--

CREATE TABLE `weaves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `no_of_heald_frame` double NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `weaves`
--

INSERT INTO `weaves` (`id`, `name`, `no_of_heald_frame`, `status`, `created_at`, `updated_at`) VALUES
(1, 'PLAIN', 2, 1, '2024-07-06 16:08:47', '2024-10-11 07:26:48'),
(6, 'DOBBY', 6, 1, '2024-09-05 15:57:01', '2024-10-11 07:27:14'),
(7, 'BROKEN', 1, 1, '2024-10-11 07:28:10', '2024-10-11 07:28:10');

-- --------------------------------------------------------

--
-- Table structure for table `weave_factors`
--

CREATE TABLE `weave_factors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `weave_factors`
--

INSERT INTO `weave_factors` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'weave', 1, '2024-07-05 10:00:45', '2024-08-04 18:30:07');

-- --------------------------------------------------------

--
-- Table structure for table `weave_types`
--

CREATE TABLE `weave_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `yarns`
--

CREATE TABLE `yarns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `count` int(11) NOT NULL,
  `ply` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `variety` int(11) NOT NULL,
  `filaments` varchar(255) NOT NULL,
  `tpm` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `reorder` varchar(255) NOT NULL,
  `buy_uom` varchar(255) NOT NULL,
  `blend` varchar(255) NOT NULL,
  `danger` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `display_name` varchar(255) NOT NULL,
  `conversion` varchar(255) NOT NULL,
  `hsn` varchar(255) NOT NULL,
  `igst` varchar(255) NOT NULL,
  `cgst` varchar(255) NOT NULL,
  `sgst` varchar(255) NOT NULL,
  `cess` varchar(255) NOT NULL,
  `is_apply` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `yarns`
--

INSERT INTO `yarns` (`id`, `count`, `ply`, `type`, `unit`, `variety`, `filaments`, `tpm`, `color`, `reorder`, `buy_uom`, `blend`, `danger`, `name`, `display_name`, `conversion`, `hsn`, `igst`, `cgst`, `sgst`, `cess`, `is_apply`, `status`, `created_at`, `updated_at`) VALUES
(1, 22, 7, 18, '13', 28, '', '', '1', '', '11', '', '', '1.0/40.0 NE 100% LINEN YARN CY red', '1/40 NE 100% COTTON YARN OPEN AIR-5016', '40.0', '5306100000', '5.0', '2.5', '2.5', '', 1, 1, '2024-07-06 15:24:42', '2025-01-08 11:58:05'),
(2, 5, 8, 5, '13', 6, '', '', '1', '11', '11', '', '111', '2.0/26 NE 100% LINEN YARN LYOL red', '2.0/26 NE 100% LINEN YARN LYOL red', '1', '1', '0.00', '2.5', '5.0', '11', 1, 1, '2024-08-04 17:47:39', '2024-10-21 11:23:47'),
(3, 7, 7, 5, '15', 12, '', '', '', '', '11', '', '', '1.00/24 NM 100% LINEN YARN LY', '24/1 NM  100% LINEN YARN', '15.35', '5309190000', '5.0', '2.5', '2.5', '', 1, 1, '2024-08-06 11:45:44', '2024-10-12 02:54:25'),
(4, 22, 7, 5, '15', 14, '', '', '', '', '11', '', '', '1.0/40.0 NM 100% LINEN YARN LLYO', '1.0/40.0 NM 100% LINEN YARN LLYO', '21.26', '53091910', '5.0', '2.5', '2.5', '', 1, 1, '2024-10-12 03:08:25', '2025-01-17 09:44:59');

-- --------------------------------------------------------

--
-- Table structure for table `yarn_certification_types`
--

CREATE TABLE `yarn_certification_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `yarn_certification_types`
--

INSERT INTO `yarn_certification_types` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(4, '123', 1, '2025-02-05 05:48:55', '2025-02-05 05:48:55');

-- --------------------------------------------------------

--
-- Table structure for table `yarn_count_rate_contents`
--

CREATE TABLE `yarn_count_rate_contents` (
  `id` int(11) NOT NULL,
  `costing_id` int(11) NOT NULL,
  `is_warp` tinyint(1) NOT NULL DEFAULT 1,
  `is_weft` tinyint(1) NOT NULL DEFAULT 0,
  `count` int(11) DEFAULT NULL,
  `rate_per_kg` int(11) DEFAULT NULL,
  `yarn_dyeing` varchar(150) DEFAULT NULL,
  `rate_incl_gst` int(11) DEFAULT NULL,
  `gst` int(11) DEFAULT NULL,
  `content` varchar(150) DEFAULT NULL,
  `yarn_type` varchar(150) DEFAULT NULL,
  `mill` varchar(150) DEFAULT NULL,
  `epi_on_loom` int(11) DEFAULT NULL,
  `ppi` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `yarn_inwards`
--

CREATE TABLE `yarn_inwards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `date` date DEFAULT NULL,
  `transportation_details` varchar(150) DEFAULT NULL,
  `vendor_group_id` int(11) DEFAULT NULL,
  `gate_pass_no` varchar(150) DEFAULT NULL,
  `gate_pass_date` date DEFAULT NULL,
  `taxable_amount` int(11) DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  `purchase_order_id` int(11) DEFAULT NULL,
  `agent_id` int(11) DEFAULT NULL,
  `sale_order_id` int(11) DEFAULT NULL,
  `vehicle_number` varchar(150) DEFAULT NULL,
  `receipt_number` varchar(150) DEFAULT NULL,
  `remarks` varchar(150) DEFAULT NULL,
  `lorry_no` varchar(150) DEFAULT NULL,
  `lorry_weight` double DEFAULT NULL,
  `lorry_empty_weight` double DEFAULT NULL,
  `is_jobwork_order` tinyint(1) DEFAULT NULL,
  `approval` int(1) DEFAULT NULL,
  `approval_date` date DEFAULT NULL,
  `internal_remark` varchar(250) DEFAULT NULL,
  `customer_instruction` varchar(250) DEFAULT NULL,
  `comments` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `yarn_inwards`
--

INSERT INTO `yarn_inwards` (`id`, `created_at`, `updated_at`, `date`, `transportation_details`, `vendor_group_id`, `gate_pass_no`, `gate_pass_date`, `taxable_amount`, `location_id`, `purchase_order_id`, `agent_id`, `sale_order_id`, `vehicle_number`, `receipt_number`, `remarks`, `lorry_no`, `lorry_weight`, `lorry_empty_weight`, `is_jobwork_order`, `approval`, `approval_date`, `internal_remark`, `customer_instruction`, `comments`) VALUES
(3, '2024-07-21 22:21:16', '2024-07-21 22:21:16', '2024-07-06', '33', 1, '33', '2024-07-27', 33, 1, 2, 1, 13, '33', '3', '33', '33', 33, 33, 1, NULL, NULL, NULL, NULL, NULL),
(4, '2024-08-04 17:49:18', '2024-08-04 17:49:18', '2024-08-03', '44', 1, '4', '2024-08-04', 4, 1, 2, 1, 13, '4', '4', '4', '4', 4, 4, 1, NULL, NULL, NULL, NULL, NULL),
(5, '2024-08-04 17:51:25', '2024-08-04 17:51:25', '2024-08-03', '44', 1, '4', '2024-08-04', 4, 1, 2, 1, 13, '4', '4', '4', '4', 4, 4, 1, NULL, NULL, NULL, NULL, NULL),
(6, '2024-08-05 06:52:28', '2024-08-05 06:52:28', '2024-12-31', '1', 1, '11', '2024-12-31', 1, 1, 2, 1, 13, '1', '1', '1', '1', 1, 1, 1, NULL, NULL, NULL, NULL, NULL),
(7, '2024-08-08 08:39:53', '2024-08-28 08:44:08', '2024-08-08', '13', 3, '13', '2024-08-08', 13, 2, 5, 2, 23, '13', '13', 'SSSSSS', '13', 13, 13, 0, NULL, NULL, NULL, NULL, NULL),
(8, '2024-10-06 15:17:09', '2024-10-06 15:17:09', '2024-10-13', 'hey buddy nalla irkiya', 3, '12', '2025-02-01', 12, 2, 2, 3, 28, '123', '32', 'KSDFLKAM', '124', 126, 226, 1, NULL, NULL, NULL, NULL, NULL),
(9, '2024-11-01 16:09:01', '2024-11-01 16:09:01', '2025-01-01', 'jhgjh', 7, 'hgh', '2024-01-31', 7, 10, 8, 9, 37, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, '2024-11-04 10:06:28', '2024-11-04 10:06:28', '2024-01-01', NULL, 8, NULL, NULL, NULL, 9, 9, 10, 35, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, '2024-11-04 15:37:31', '2024-11-04 15:37:31', '2024-11-05', 'hello', 7, '25', '2024-01-31', 25, 10, 8, 9, 35, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, '2024-11-30 16:05:47', '2024-11-30 16:05:47', '2024-01-01', 'kbkj', 7, NULL, '2024-01-01', NULL, 10, 10, 9, 40, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL),
(13, '2025-02-05 06:42:55', '2025-02-06 10:36:48', '2025-02-22', NULL, 7, NULL, NULL, NULL, 8, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `yarn_inward_details`
--

CREATE TABLE `yarn_inward_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `yarn_inward_id` int(11) DEFAULT NULL,
  `yarn_id` int(11) DEFAULT NULL,
  `mill_id` int(11) DEFAULT NULL,
  `total_no_of_bags` double DEFAULT NULL,
  `kgs_per_bag` double DEFAULT NULL,
  `cones_per_bag` double DEFAULT NULL,
  `total_cones` double DEFAULT NULL,
  `total_kgs` double DEFAULT NULL,
  `rate_per_kg` double DEFAULT NULL,
  `basic_amount` double DEFAULT NULL,
  `gross_weight` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `yarn_inward_details`
--

INSERT INTO `yarn_inward_details` (`id`, `created_at`, `updated_at`, `yarn_inward_id`, `yarn_id`, `mill_id`, `total_no_of_bags`, `kgs_per_bag`, `cones_per_bag`, `total_cones`, `total_kgs`, `rate_per_kg`, `basic_amount`, `gross_weight`) VALUES
(6, '2024-08-04 17:49:18', '2024-08-04 17:49:18', 4, 1, 1, 15, 1, 4, 4, 15, 1, NULL, 4),
(10, '2024-08-05 06:52:28', '2024-08-05 06:52:28', 6, 1, 1, 15, 1, 1, 11, 15, 1, 1, 1),
(11, '2024-08-05 06:52:28', '2024-08-05 06:52:28', 6, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(12, '2024-08-08 08:39:53', '2024-08-08 08:39:53', 7, 3, 1, 11, 11, 11, 121, 121, 11, 121, 13),
(13, '2024-08-08 08:39:53', '2025-02-06 10:36:48', 7, 3, 10, 23, 25, 32, 736, 575, 3, 3, NULL),
(14, '2024-10-06 15:17:09', '2024-10-06 15:17:09', 8, 1, 2, 15, 1, 2, 30, 15, 12, NULL, NULL),
(15, '2024-11-01 16:09:01', '2024-11-01 16:09:01', 9, 3, 44, 56, 21, 21, NULL, 56, 89, 7921, NULL),
(17, '2024-11-04 15:37:31', '2024-11-04 15:37:31', 11, 3, 44, 15, 21, 21, 26, 256, 89, 7921, 54),
(18, '2024-11-30 16:05:47', '2024-11-30 16:05:47', 12, 2, 37, 26, 26, 22, 22, 676, 26, 676, NULL),
(19, '2025-02-05 06:42:55', '2025-02-05 06:42:55', 13, 3, 10, 23, 25, 32, 736, 575, 3, 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `yarn_inward_detail_lots`
--

CREATE TABLE `yarn_inward_detail_lots` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `yarn_inward_detail_id` int(11) DEFAULT NULL,
  `cone_tip_color_id` int(11) DEFAULT NULL,
  `lot_no` varchar(100) DEFAULT NULL,
  `no_of_bags` double DEFAULT NULL,
  `kgs_per_bag` double DEFAULT NULL,
  `totalkgs` double DEFAULT NULL,
  `cones_per_bag` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `yarn_inward_detail_lots`
--

INSERT INTO `yarn_inward_detail_lots` (`id`, `created_at`, `updated_at`, `yarn_inward_detail_id`, `cone_tip_color_id`, `lot_no`, `no_of_bags`, `kgs_per_bag`, `totalkgs`, `cones_per_bag`) VALUES
(5, '2024-08-04 17:49:18', '2024-08-04 17:49:18', 6, 1, '4', 4, 4, 4, 4),
(7, '2024-08-08 08:39:53', '2024-08-08 08:39:53', 12, 3, '13--01', 13, 13, 13, 13),
(11, '2024-10-06 15:17:09', '2024-10-06 15:17:09', 14, 2, '1', 1, 1, 1, 1),
(12, '2024-11-01 16:09:01', '2024-11-01 16:09:01', 15, 3, '56', 56, 56, 56, 56),
(13, '2024-11-04 15:37:31', '2024-11-04 15:37:31', 17, 2, '25', 25, 25, 2525, 25),
(14, '2024-11-30 16:05:47', '2024-11-30 16:05:47', 18, 4, '22', 22, 22, 22, 22);

-- --------------------------------------------------------

--
-- Table structure for table `yarn_opening_balances`
--

CREATE TABLE `yarn_opening_balances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `date` date DEFAULT NULL,
  `transportation_details` varchar(150) DEFAULT NULL,
  `vendor_group_id` int(11) DEFAULT NULL,
  `gate_pass_no` varchar(150) DEFAULT NULL,
  `gate_pass_date` date DEFAULT NULL,
  `taxable_amount` int(11) DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  `stock_type_id` int(11) DEFAULT NULL,
  `is_jobwork_order` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `yarn_opening_balances`
--

INSERT INTO `yarn_opening_balances` (`id`, `created_at`, `updated_at`, `date`, `transportation_details`, `vendor_group_id`, `gate_pass_no`, `gate_pass_date`, `taxable_amount`, `location_id`, `stock_type_id`, `is_jobwork_order`) VALUES
(1, '2024-11-22 17:07:30', '2024-11-22 17:07:30', '2024-11-23', '1', 6, '2', '2024-11-23', 3, 1, 1, 1),
(2, '2024-11-26 14:39:46', '2024-11-26 14:39:46', '2024-12-03', 'jgjghj', 8, NULL, NULL, NULL, 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `yarn_opening_balance_details`
--

CREATE TABLE `yarn_opening_balance_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `yarn_opening_balance_id` int(11) DEFAULT NULL,
  `yarn_id` int(11) DEFAULT NULL,
  `mill_id` int(11) DEFAULT NULL,
  `total_no_of_bags` double DEFAULT NULL,
  `kgs_per_bag` double DEFAULT NULL,
  `cones_per_bag` double DEFAULT NULL,
  `total_cones` double DEFAULT NULL,
  `total_kgs` double DEFAULT NULL,
  `rate_per_kg` double DEFAULT NULL,
  `basic_amount` double DEFAULT NULL,
  `gross_weight` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `yarn_opening_balance_details`
--

INSERT INTO `yarn_opening_balance_details` (`id`, `created_at`, `updated_at`, `yarn_opening_balance_id`, `yarn_id`, `mill_id`, `total_no_of_bags`, `kgs_per_bag`, `cones_per_bag`, `total_cones`, `total_kgs`, `rate_per_kg`, `basic_amount`, `gross_weight`) VALUES
(2, '2024-11-26 14:39:46', '2024-11-26 14:39:46', 2, 4, 10, 2, 2, 2, 2, 2, 2, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `yarn_opening_balance_detail_lots`
--

CREATE TABLE `yarn_opening_balance_detail_lots` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `yarn_opening_balance_detail_id` int(11) DEFAULT NULL,
  `cone_tip_color_id` int(11) DEFAULT NULL,
  `lot_no` varchar(100) DEFAULT NULL,
  `no_of_bags` double DEFAULT NULL,
  `kgs_per_bag` double DEFAULT NULL,
  `totalkgs` double DEFAULT NULL,
  `cones_per_bag` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `yarn_opening_balance_detail_lots`
--

INSERT INTO `yarn_opening_balance_detail_lots` (`id`, `created_at`, `updated_at`, `yarn_opening_balance_detail_id`, `cone_tip_color_id`, `lot_no`, `no_of_bags`, `kgs_per_bag`, `totalkgs`, `cones_per_bag`) VALUES
(2, '2024-11-26 14:39:46', '2024-11-26 14:39:46', 2, NULL, '12', 12, 12, 12, 12);

-- --------------------------------------------------------

--
-- Table structure for table `yarn_pos`
--

CREATE TABLE `yarn_pos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `po_number` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `po_date` date DEFAULT NULL,
  `vendor_group_id` int(11) DEFAULT NULL,
  `igst` tinyint(1) DEFAULT 1,
  `cgst_sgst` tinyint(1) DEFAULT NULL,
  `agent_id` int(11) DEFAULT NULL,
  `manual_po_number` double DEFAULT NULL,
  `certification_type_id` int(11) DEFAULT NULL,
  `po_type_id` int(11) DEFAULT NULL,
  `pr_num_id` int(11) DEFAULT NULL,
  `so_num_id` int(11) DEFAULT NULL,
  `payment_terms_id` int(11) DEFAULT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `terms_conditions_id` int(11) DEFAULT NULL,
  `remark` varchar(250) DEFAULT NULL,
  `consignee_id` int(11) DEFAULT NULL,
  `yarn_type_id` varchar(250) DEFAULT NULL,
  `delivery_term_id` int(11) DEFAULT NULL,
  `purchase_type_id` int(11) DEFAULT NULL,
  `approval` int(1) DEFAULT NULL,
  `approval_date` date DEFAULT NULL,
  `internal_remark` varchar(250) DEFAULT NULL,
  `customer_instruction` varchar(250) DEFAULT NULL,
  `comments` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `yarn_pos`
--

INSERT INTO `yarn_pos` (`id`, `po_number`, `created_at`, `updated_at`, `po_date`, `vendor_group_id`, `igst`, `cgst_sgst`, `agent_id`, `manual_po_number`, `certification_type_id`, `po_type_id`, `pr_num_id`, `so_num_id`, `payment_terms_id`, `vendor_id`, `terms_conditions_id`, `remark`, `consignee_id`, `yarn_type_id`, `delivery_term_id`, `purchase_type_id`, `approval`, `approval_date`, `internal_remark`, `customer_instruction`, `comments`) VALUES
(7, 'YPO-7', '2024-10-29 07:14:15', '2024-11-01 16:05:37', '2025-02-01', 7, 1, NULL, 9, 69, 3, 1, NULL, 37, 6, 8, 1, NULL, NULL, NULL, NULL, 2, 1, '2024-11-01', NULL, NULL, NULL),
(8, 'YPO-8', '2024-11-01 16:04:10', '2024-11-04 10:03:56', '2024-01-01', 7, 1, NULL, NULL, NULL, NULL, 1, NULL, NULL, 4, 8, 1, NULL, NULL, NULL, NULL, 2, 1, '2024-11-04', NULL, NULL, NULL),
(9, 'YPO-9', '2024-11-01 16:12:10', '2024-11-01 16:12:22', '2024-01-01', 8, 1, NULL, NULL, NULL, NULL, 1, NULL, NULL, 4, 9, 2, NULL, NULL, NULL, NULL, 2, 1, '2024-11-01', NULL, NULL, NULL),
(10, 'YPO-10', '2024-11-08 16:08:18', '2024-11-08 16:09:16', '0255-02-25', 7, 1, NULL, 9, 26, 1, 1, NULL, 36, 5, 10, 1, NULL, 5, 'Weft', 3, 1, 1, '2024-11-08', NULL, NULL, NULL),
(11, 'YPO-11', '2025-02-05 06:44:47', '2025-02-05 06:44:47', '2025-02-20', 6, 1, NULL, 10, NULL, 5, 1, NULL, NULL, 13, 8, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `yarn_po_details`
--

CREATE TABLE `yarn_po_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `yarn_po_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `count_id` int(11) DEFAULT NULL,
  `cones_per_bag` double DEFAULT NULL,
  `kg_per_bag` double DEFAULT NULL,
  `cone_weight` double DEFAULT NULL,
  `mill_name_id` int(11) DEFAULT NULL,
  `no_of_bags` double DEFAULT NULL,
  `quantity` double DEFAULT NULL,
  `mill_price` double DEFAULT NULL,
  `basic_amount` double DEFAULT NULL,
  `igst_val` double DEFAULT NULL,
  `cgst_val` double DEFAULT NULL,
  `sgst_val` double DEFAULT NULL,
  `igst_amount` double DEFAULT NULL,
  `cgst_amount` double DEFAULT 0,
  `sgst_amount` double DEFAULT 0,
  `total_amount` double DEFAULT 0,
  `provisional_freight` double DEFAULT NULL,
  `mill_gst_price` double DEFAULT NULL,
  `final_price` double DEFAULT NULL,
  `delivery_date` date DEFAULT NULL,
  `csp_id` int(11) DEFAULT NULL,
  `hairiness_index_h_id` int(11) DEFAULT NULL,
  `count_cv_id` int(11) DEFAULT NULL,
  `strenght_cv_id` int(11) DEFAULT NULL,
  `inr_conversion_value` double DEFAULT NULL,
  `curreny` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `yarn_po_details`
--

INSERT INTO `yarn_po_details` (`id`, `yarn_po_id`, `created_at`, `updated_at`, `count_id`, `cones_per_bag`, `kg_per_bag`, `cone_weight`, `mill_name_id`, `no_of_bags`, `quantity`, `mill_price`, `basic_amount`, `igst_val`, `cgst_val`, `sgst_val`, `igst_amount`, `cgst_amount`, `sgst_amount`, `total_amount`, `provisional_freight`, `mill_gst_price`, `final_price`, `delivery_date`, `csp_id`, `hairiness_index_h_id`, `count_cv_id`, `strenght_cv_id`, `inr_conversion_value`, `curreny`) VALUES
(1, 1, '2024-07-05 10:00:45', '2024-07-16 16:53:58', 1, NULL, 22, NULL, 1, NULL, 3, 3, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 2, '2024-07-16 15:57:42', '2024-08-28 08:44:44', 1, NULL, 1, NULL, 2, 15, 11, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 2, '2024-07-17 14:54:03', '2024-08-28 08:44:44', 1, NULL, 5, NULL, 2, NULL, 5, 5, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 3, '2024-08-04 18:25:35', '2024-08-04 18:25:35', 1, 2, 2, 2, 1, 2, 2, 2, 42, NULL, NULL, NULL, NULL, NULL, NULL, 2, 2, 2, 62, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 4, '2024-08-05 06:48:29', '2024-08-05 06:48:29', 2, 1, 1, 1, 1, 2, 1, 2, 2, 0, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 5, '2024-08-07 18:52:41', '2024-08-07 19:16:31', 3, 11, 11, 11, 1, 11, 11, 11, 121, 5, NULL, NULL, 6.05, NULL, NULL, 11, 11, 11, 33, NULL, 2, 1, 1, 1, NULL, NULL),
(7, 5, '2024-08-07 18:55:14', '2024-08-07 18:55:14', 2, 12, 12, 12, 1, 12, 12, 12, 144, 5, NULL, NULL, NULL, NULL, NULL, 12, 12, 12, 36, NULL, 2, NULL, NULL, NULL, NULL, NULL),
(8, 6, '2024-10-06 14:29:23', '2024-10-06 14:29:23', 1, 12, 21, 1, 2, 21, 441, 1, 441, 8, NULL, NULL, 35.28, 0, 0, 6, 11, 12, 24, NULL, 2, 1, 1, 1, NULL, NULL),
(9, 7, '2024-10-29 07:14:15', '2024-10-29 07:14:15', 3, 32, 25, 25, 10, 23, 3, 3, 3, 5, 2.5, 2.5, 0.15, 0.075, 0.075, 32, 21, 35, 5, NULL, 2, NULL, NULL, NULL, 3, NULL),
(10, 8, '2024-11-01 16:04:10', '2024-11-01 16:04:10', 3, 21, 21, 24, 44, NULL, 89, 89, 7921, 5, 2.5, 2.5, 396.05, 198.025, 198.025, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 89, NULL),
(11, 9, '2024-11-01 16:12:10', '2024-11-01 16:12:10', 3, NULL, 89, NULL, 38, 67, 67, 67, 67, 5, 2.5, 2.5, 3.35, 1.675, 1.675, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 67, NULL),
(12, 10, '2024-11-08 16:08:18', '2024-11-08 16:08:18', 2, NULL, 26, 26, 37, 26, 26, 26, 676, 0, 5, 2.5, 0, 33.8, 16.9, 26, 26, 26, 26, NULL, 2, 1, 1, NULL, NULL, NULL),
(13, 11, '2025-02-05 06:44:47', '2025-02-05 06:44:47', 4, NULL, 12, NULL, 40, NULL, 12, 1, 12, 5, 2.5, 2.5, 0.6, 0.3, 0.3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `yarn_processing_contracts`
--

CREATE TABLE `yarn_processing_contracts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `yarn_processing_contract_issues`
--

CREATE TABLE `yarn_processing_contract_issues` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `yarn_processing_receives`
--

CREATE TABLE `yarn_processing_receives` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `yarn_processing_returns`
--

CREATE TABLE `yarn_processing_returns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `yarn_types`
--

CREATE TABLE `yarn_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `unit` int(11) NOT NULL,
  `factor` varchar(255) NOT NULL,
  `loss` varchar(255) NOT NULL,
  `system` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `yarn_types`
--

INSERT INTO `yarn_types` (`id`, `type`, `unit`, `factor`, `loss`, `system`, `code`, `status`, `created_at`, `updated_at`) VALUES
(5, '100% LINEN YARN', 15, '1.0', '0', 'indirect', 'LINEN', 1, '2024-10-12 02:51:12', '2025-01-08 11:34:03'),
(6, '100% COTTON LYCRA', 13, '1.0', '0', 'direct', 'LY01', 1, '2025-01-08 11:32:15', '2025-01-08 11:32:15'),
(7, 'HEMP TENCIL', 13, '1.0', '0', 'direct', 'HT01', 1, '2025-01-08 11:32:46', '2025-01-08 11:32:46'),
(8, '55% LINEN 45% LYOCEL', 13, '1.0', '0', 'indirect', '55% LINEN 45% LYOCEL', 1, '2025-01-08 11:33:32', '2025-01-08 11:33:32'),
(9, '55% LYOCEL 45% LINEN', 13, '1.0', '0', 'direct', '55% LYOCEL 45% LINEN', 1, '2025-01-08 11:33:53', '2025-01-08 11:34:13'),
(10, '35% POLYESTER 65% COTTON', 13, '1.0', '0', 'direct', '35% POLYESTER 65% COTTON', 1, '2025-01-08 11:34:27', '2025-01-08 11:34:27'),
(11, '50% HEMP 50% COTTON', 13, '1.0', '0', 'direct', '50% HEMP 50% COTTON', 1, '2025-01-08 11:34:42', '2025-01-08 11:34:42'),
(12, '100% LINEN DRYSPUN YARN', 13, '1.0', '0', 'direct', '100% LINEN DRYSPUN YARN', 1, '2025-01-08 11:34:55', '2025-01-08 11:34:55'),
(13, '95% COTTON 5% SPANDEX', 13, '1.0', '0', 'direct', '95% COTTON 5% SPANDEX', 1, '2025-01-08 11:35:08', '2025-01-08 11:35:08'),
(14, '100% COTTON SLUB', 13, '1.0', '0', 'direct', '100% COTTON SLUB', 1, '2025-01-08 11:35:23', '2025-01-08 11:35:23'),
(15, '100% TENCIL YARN', 13, '1.0', '0', 'direct', '100% TENCIL YARN', 1, '2025-01-08 11:35:39', '2025-01-08 11:35:39'),
(16, '82% LYOCELL 18% LINEN', 13, '1.0', '0', 'direct', '82% LYOCELL 18% LINEN', 1, '2025-01-08 11:35:58', '2025-01-08 11:35:58'),
(17, '100% ORGANIC LINEN YARN', 13, '1.69', '0', 'direct', '100% ORGANIC LINEN YARN', 1, '2025-01-08 11:36:15', '2025-01-08 11:36:36'),
(18, '100% LINEN YARN', 13, '1.69', '0', 'indirect', '100% LINEN YARN', 1, '2025-01-08 11:40:15', '2025-01-08 11:40:15'),
(19, '55% LINEN 45% COTTON', 13, '1.0', '0', 'direct', '55% LINEN 45% COTTON', 1, '2025-01-08 11:40:40', '2025-01-08 11:40:40'),
(20, '55% LINEN 45% VISCOSE', 13, '1.0', '0', 'direct', '55% LINEN 45% VISCOSE', 1, '2025-01-08 11:40:55', '2025-01-08 11:40:55'),
(21, '70% VISCOSE 30% LINEN', 13, '1.0', '0', 'direct', '70% VISCOSE 30% LINEN', 1, '2025-01-08 11:41:12', '2025-01-08 11:41:12'),
(22, '95% VISCOSE 5% SPANDEX', 13, '1.0', '0', 'direct', '95% VISCOSE 5% SPANDEX', 1, '2025-01-08 11:41:25', '2025-01-08 11:41:25'),
(23, '100% COTTON YARN', 13, '1.0', '0', 'direct', '100% COTTON YARN', 1, '2025-01-08 11:41:41', '2025-01-08 11:41:41'),
(24, '100% VISCOSE YARN', 13, '1.0', '0', 'direct', '100% VISCOSE YARN', 1, '2025-01-08 11:41:56', '2025-01-08 11:41:56'),
(25, '50% LINEN 50% VISCOSE', 13, '1.0', '0', 'direct', '50% LINEN 50% VISCOSE', 1, '2025-01-08 11:42:26', '2025-01-08 11:42:26'),
(26, '70% COTTON 30% HEMP', 13, '1.0', '0', 'direct', '70% COTTON 30% HEMP', 1, '2025-01-08 11:42:40', '2025-01-08 11:42:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_groups`
--
ALTER TABLE `account_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agent_types`
--
ALTER TABLE `agent_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bale_packings`
--
ALTER TABLE `bale_packings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bale_packing_details`
--
ALTER TABLE `bale_packing_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `beam_inwards`
--
ALTER TABLE `beam_inwards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `beam_inward_details`
--
ALTER TABLE `beam_inward_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `beam_outwards`
--
ALTER TABLE `beam_outwards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `beam_outward_details`
--
ALTER TABLE `beam_outward_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `beam_receive_from_weavers`
--
ALTER TABLE `beam_receive_from_weavers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blends`
--
ALTER TABLE `blends`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buyers`
--
ALTER TABLE `buyers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buyer_consignee_details`
--
ALTER TABLE `buyer_consignee_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buyer_representatives`
--
ALTER TABLE `buyer_representatives`
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
-- Indexes for table `certifications`
--
ALTER TABLE `certifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checks`
--
ALTER TABLE `checks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cloth_challans`
--
ALTER TABLE `cloth_challans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cloth_challan_details`
--
ALTER TABLE `cloth_challan_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `consignees`
--
ALTER TABLE `consignees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `container_sizes`
--
ALTER TABLE `container_sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contracts`
--
ALTER TABLE `contracts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contract_types`
--
ALTER TABLE `contract_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contract_type_details`
--
ALTER TABLE `contract_type_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coparts`
--
ALTER TABLE `coparts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `costings`
--
ALTER TABLE `costings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `counts`
--
ALTER TABLE `counts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `count_cvs`
--
ALTER TABLE `count_cvs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `csps`
--
ALTER TABLE `csps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_items`
--
ALTER TABLE `delivery_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_terms`
--
ALTER TABLE `delivery_terms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `domestic_buyers`
--
ALTER TABLE `domestic_buyers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `domestic_buyer_representatives`
--
ALTER TABLE `domestic_buyer_representatives`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employes`
--
ALTER TABLE `employes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fabric_inwards`
--
ALTER TABLE `fabric_inwards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fabric_inward_details`
--
ALTER TABLE `fabric_inward_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fabric_opening_balances`
--
ALTER TABLE `fabric_opening_balances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fabric_opening_balance_details`
--
ALTER TABLE `fabric_opening_balance_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fabric_pos`
--
ALTER TABLE `fabric_pos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fabric_po_details`
--
ALTER TABLE `fabric_po_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fabric_po_detail_yarn_certifications`
--
ALTER TABLE `fabric_po_detail_yarn_certifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fabric_types`
--
ALTER TABLE `fabric_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `filaments`
--
ALTER TABLE `filaments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `godown_locations`
--
ALTER TABLE `godown_locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_types`
--
ALTER TABLE `group_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gst_registered_types`
--
ALTER TABLE `gst_registered_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `g_s_t_s`
--
ALTER TABLE `g_s_t_s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hairiness`
--
ALTER TABLE `hairiness`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inspections`
--
ALTER TABLE `inspections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inspection_details`
--
ALTER TABLE `inspection_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inspection_detail_variations`
--
ALTER TABLE `inspection_detail_variations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inspection_types`
--
ALTER TABLE `inspection_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_additionals`
--
ALTER TABLE `invoice_additionals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_discounts`
--
ALTER TABLE `invoice_discounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_others`
--
ALTER TABLE `invoice_others`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_settings`
--
ALTER TABLE `invoice_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_types`
--
ALTER TABLE `invoice_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `jobwork_fabric_receives`
--
ALTER TABLE `jobwork_fabric_receives`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobwork_fabric_receive_details`
--
ALTER TABLE `jobwork_fabric_receive_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobwork_finished_fabric_receives`
--
ALTER TABLE `jobwork_finished_fabric_receives`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobwork_finished_fabric_receive_details`
--
ALTER TABLE `jobwork_finished_fabric_receive_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobwork_process_contracts`
--
ALTER TABLE `jobwork_process_contracts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobwork_process_contract_details`
--
ALTER TABLE `jobwork_process_contract_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobwork_process_contract_issues`
--
ALTER TABLE `jobwork_process_contract_issues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobwork_process_contract_issue_details`
--
ALTER TABLE `jobwork_process_contract_issue_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobwork_weaving_contracts`
--
ALTER TABLE `jobwork_weaving_contracts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobwork_weaving_contract_orders`
--
ALTER TABLE `jobwork_weaving_contract_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobwork_weaving_contract_warps`
--
ALTER TABLE `jobwork_weaving_contract_warps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobwork_weaving_contract_wefts`
--
ALTER TABLE `jobwork_weaving_contract_wefts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobwork_weaving_weft_issues`
--
ALTER TABLE `jobwork_weaving_weft_issues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobwork_weaving_weft_issue_details`
--
ALTER TABLE `jobwork_weaving_weft_issue_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `licences`
--
ALTER TABLE `licences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location_types`
--
ALTER TABLE `location_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loom_types`
--
ALTER TABLE `loom_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loom_type_details`
--
ALTER TABLE `loom_type_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `machines`
--
ALTER TABLE `machines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mills`
--
ALTER TABLE `mills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `packings`
--
ALTER TABLE `packings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packing_types`
--
ALTER TABLE `packing_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paper_tube_sizes`
--
ALTER TABLE `paper_tube_sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `party_to_locations`
--
ALTER TABLE `party_to_locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payment_terms`
--
ALTER TABLE `payment_terms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_types`
--
ALTER TABLE `payment_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `permissions_fams`
--
ALTER TABLE `permissions_fams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ply`
--
ALTER TABLE `ply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ports`
--
ALTER TABLE `ports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `port_of_destinations`
--
ALTER TABLE `port_of_destinations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `po_types`
--
ALTER TABLE `po_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pre_carriage`
--
ALTER TABLE `pre_carriage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `processes`
--
ALTER TABLE `processes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `process_returns`
--
ALTER TABLE `process_returns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prs`
--
ALTER TABLE `prs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_returns`
--
ALTER TABLE `purchase_returns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_types`
--
ALTER TABLE `purchase_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qualities`
--
ALTER TABLE `qualities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reasons`
--
ALTER TABLE `reasons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `roll_bale_print_pages`
--
ALTER TABLE `roll_bale_print_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_co_ordinators`
--
ALTER TABLE `sales_co_ordinators`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_orders`
--
ALTER TABLE `sales_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_order_details`
--
ALTER TABLE `sales_order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_order_sub_details`
--
ALTER TABLE `sales_order_sub_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_order_yarn_certifications`
--
ALTER TABLE `sales_order_yarn_certifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_types`
--
ALTER TABLE `sales_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_returns`
--
ALTER TABLE `sale_returns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `selvedge`
--
ALTER TABLE `selvedge`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `sets`
--
ALTER TABLE `sets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `set_single_doubles`
--
ALTER TABLE `set_single_doubles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shades`
--
ALTER TABLE `shades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shade_warps`
--
ALTER TABLE `shade_warps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shade_wefts`
--
ALTER TABLE `shade_wefts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_terms`
--
ALTER TABLE `shipping_terms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ship_tos`
--
ALTER TABLE `ship_tos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizing_plans`
--
ALTER TABLE `sizing_plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizing_plan_beams`
--
ALTER TABLE `sizing_plan_beams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizing_plan_yarns`
--
ALTER TABLE `sizing_plan_yarns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizing_yarn_issues`
--
ALTER TABLE `sizing_yarn_issues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizing_yarn_issue_details`
--
ALTER TABLE `sizing_yarn_issue_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sorts`
--
ALTER TABLE `sorts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sort_greys`
--
ALTER TABLE `sort_greys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sort_warp`
--
ALTER TABLE `sort_warp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sort_weft`
--
ALTER TABLE `sort_weft`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sourcing_executives`
--
ALTER TABLE `sourcing_executives`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `so_types`
--
ALTER TABLE `so_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_types`
--
ALTER TABLE `stock_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `strength_cvs`
--
ALTER TABLE `strength_cvs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terms_conditions`
--
ALTER TABLE `terms_conditions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tpms`
--
ALTER TABLE `tpms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transportations`
--
ALTER TABLE `transportations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uom`
--
ALTER TABLE `uom`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `variety`
--
ALTER TABLE `variety`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor_banks`
--
ALTER TABLE `vendor_banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor_groups`
--
ALTER TABLE `vendor_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `weaves`
--
ALTER TABLE `weaves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `weave_factors`
--
ALTER TABLE `weave_factors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `weave_types`
--
ALTER TABLE `weave_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `yarns`
--
ALTER TABLE `yarns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `yarn_certification_types`
--
ALTER TABLE `yarn_certification_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `yarn_count_rate_contents`
--
ALTER TABLE `yarn_count_rate_contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `yarn_inwards`
--
ALTER TABLE `yarn_inwards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `yarn_inward_details`
--
ALTER TABLE `yarn_inward_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `yarn_inward_detail_lots`
--
ALTER TABLE `yarn_inward_detail_lots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `yarn_opening_balances`
--
ALTER TABLE `yarn_opening_balances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `yarn_opening_balance_details`
--
ALTER TABLE `yarn_opening_balance_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `yarn_opening_balance_detail_lots`
--
ALTER TABLE `yarn_opening_balance_detail_lots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `yarn_pos`
--
ALTER TABLE `yarn_pos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `yarn_po_details`
--
ALTER TABLE `yarn_po_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `yarn_processing_contracts`
--
ALTER TABLE `yarn_processing_contracts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `yarn_processing_contract_issues`
--
ALTER TABLE `yarn_processing_contract_issues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `yarn_processing_receives`
--
ALTER TABLE `yarn_processing_receives`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `yarn_processing_returns`
--
ALTER TABLE `yarn_processing_returns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `yarn_types`
--
ALTER TABLE `yarn_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_groups`
--
ALTER TABLE `account_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `agents`
--
ALTER TABLE `agents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `agent_types`
--
ALTER TABLE `agent_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `bale_packings`
--
ALTER TABLE `bale_packings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bale_packing_details`
--
ALTER TABLE `bale_packing_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `beam_inwards`
--
ALTER TABLE `beam_inwards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `beam_inward_details`
--
ALTER TABLE `beam_inward_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `beam_outwards`
--
ALTER TABLE `beam_outwards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `beam_outward_details`
--
ALTER TABLE `beam_outward_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `beam_receive_from_weavers`
--
ALTER TABLE `beam_receive_from_weavers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blends`
--
ALTER TABLE `blends`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `buyers`
--
ALTER TABLE `buyers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `buyer_consignee_details`
--
ALTER TABLE `buyer_consignee_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `buyer_representatives`
--
ALTER TABLE `buyer_representatives`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `certifications`
--
ALTER TABLE `certifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `checks`
--
ALTER TABLE `checks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `cloth_challans`
--
ALTER TABLE `cloth_challans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cloth_challan_details`
--
ALTER TABLE `cloth_challan_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `consignees`
--
ALTER TABLE `consignees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `container_sizes`
--
ALTER TABLE `container_sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contracts`
--
ALTER TABLE `contracts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contract_types`
--
ALTER TABLE `contract_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contract_type_details`
--
ALTER TABLE `contract_type_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `coparts`
--
ALTER TABLE `coparts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `costings`
--
ALTER TABLE `costings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `counts`
--
ALTER TABLE `counts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `count_cvs`
--
ALTER TABLE `count_cvs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `csps`
--
ALTER TABLE `csps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `delivery_items`
--
ALTER TABLE `delivery_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `delivery_terms`
--
ALTER TABLE `delivery_terms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `domestic_buyers`
--
ALTER TABLE `domestic_buyers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `domestic_buyer_representatives`
--
ALTER TABLE `domestic_buyer_representatives`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employes`
--
ALTER TABLE `employes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fabric_inwards`
--
ALTER TABLE `fabric_inwards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `fabric_inward_details`
--
ALTER TABLE `fabric_inward_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `fabric_opening_balances`
--
ALTER TABLE `fabric_opening_balances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fabric_opening_balance_details`
--
ALTER TABLE `fabric_opening_balance_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `fabric_pos`
--
ALTER TABLE `fabric_pos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `fabric_po_details`
--
ALTER TABLE `fabric_po_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `fabric_po_detail_yarn_certifications`
--
ALTER TABLE `fabric_po_detail_yarn_certifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `fabric_types`
--
ALTER TABLE `fabric_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `filaments`
--
ALTER TABLE `filaments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `godown_locations`
--
ALTER TABLE `godown_locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `group_types`
--
ALTER TABLE `group_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `gst_registered_types`
--
ALTER TABLE `gst_registered_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `g_s_t_s`
--
ALTER TABLE `g_s_t_s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `hairiness`
--
ALTER TABLE `hairiness`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `inspections`
--
ALTER TABLE `inspections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `inspection_details`
--
ALTER TABLE `inspection_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `inspection_detail_variations`
--
ALTER TABLE `inspection_detail_variations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `inspection_types`
--
ALTER TABLE `inspection_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `invoice_additionals`
--
ALTER TABLE `invoice_additionals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice_discounts`
--
ALTER TABLE `invoice_discounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice_others`
--
ALTER TABLE `invoice_others`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice_settings`
--
ALTER TABLE `invoice_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `invoice_types`
--
ALTER TABLE `invoice_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobwork_fabric_receives`
--
ALTER TABLE `jobwork_fabric_receives`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `jobwork_fabric_receive_details`
--
ALTER TABLE `jobwork_fabric_receive_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `jobwork_finished_fabric_receives`
--
ALTER TABLE `jobwork_finished_fabric_receives`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `jobwork_finished_fabric_receive_details`
--
ALTER TABLE `jobwork_finished_fabric_receive_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `jobwork_process_contracts`
--
ALTER TABLE `jobwork_process_contracts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `jobwork_process_contract_details`
--
ALTER TABLE `jobwork_process_contract_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `jobwork_process_contract_issues`
--
ALTER TABLE `jobwork_process_contract_issues`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jobwork_process_contract_issue_details`
--
ALTER TABLE `jobwork_process_contract_issue_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `jobwork_weaving_contracts`
--
ALTER TABLE `jobwork_weaving_contracts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `jobwork_weaving_contract_orders`
--
ALTER TABLE `jobwork_weaving_contract_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `jobwork_weaving_contract_warps`
--
ALTER TABLE `jobwork_weaving_contract_warps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `jobwork_weaving_contract_wefts`
--
ALTER TABLE `jobwork_weaving_contract_wefts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jobwork_weaving_weft_issues`
--
ALTER TABLE `jobwork_weaving_weft_issues`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `jobwork_weaving_weft_issue_details`
--
ALTER TABLE `jobwork_weaving_weft_issue_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `licences`
--
ALTER TABLE `licences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `location_types`
--
ALTER TABLE `location_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `loom_types`
--
ALTER TABLE `loom_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `loom_type_details`
--
ALTER TABLE `loom_type_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `machines`
--
ALTER TABLE `machines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `mills`
--
ALTER TABLE `mills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `packings`
--
ALTER TABLE `packings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `packing_types`
--
ALTER TABLE `packing_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `paper_tube_sizes`
--
ALTER TABLE `paper_tube_sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `party_to_locations`
--
ALTER TABLE `party_to_locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payment_terms`
--
ALTER TABLE `payment_terms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `payment_types`
--
ALTER TABLE `payment_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=385;

--
-- AUTO_INCREMENT for table `permissions_fams`
--
ALTER TABLE `permissions_fams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `ply`
--
ALTER TABLE `ply`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `ports`
--
ALTER TABLE `ports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `port_of_destinations`
--
ALTER TABLE `port_of_destinations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `po_types`
--
ALTER TABLE `po_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pre_carriage`
--
ALTER TABLE `pre_carriage`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `processes`
--
ALTER TABLE `processes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `process_returns`
--
ALTER TABLE `process_returns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prs`
--
ALTER TABLE `prs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `purchase_returns`
--
ALTER TABLE `purchase_returns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_types`
--
ALTER TABLE `purchase_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `qualities`
--
ALTER TABLE `qualities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reasons`
--
ALTER TABLE `reasons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roll_bale_print_pages`
--
ALTER TABLE `roll_bale_print_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sales_co_ordinators`
--
ALTER TABLE `sales_co_ordinators`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sales_orders`
--
ALTER TABLE `sales_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `sales_order_details`
--
ALTER TABLE `sales_order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `sales_order_sub_details`
--
ALTER TABLE `sales_order_sub_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `sales_order_yarn_certifications`
--
ALTER TABLE `sales_order_yarn_certifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `sales_types`
--
ALTER TABLE `sales_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sale_returns`
--
ALTER TABLE `sale_returns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `selvedge`
--
ALTER TABLE `selvedge`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sets`
--
ALTER TABLE `sets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `set_single_doubles`
--
ALTER TABLE `set_single_doubles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `shades`
--
ALTER TABLE `shades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `shade_warps`
--
ALTER TABLE `shade_warps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `shade_wefts`
--
ALTER TABLE `shade_wefts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `shipping_terms`
--
ALTER TABLE `shipping_terms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ship_tos`
--
ALTER TABLE `ship_tos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sizing_plans`
--
ALTER TABLE `sizing_plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `sizing_plan_beams`
--
ALTER TABLE `sizing_plan_beams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `sizing_plan_yarns`
--
ALTER TABLE `sizing_plan_yarns`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `sizing_yarn_issues`
--
ALTER TABLE `sizing_yarn_issues`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sizing_yarn_issue_details`
--
ALTER TABLE `sizing_yarn_issue_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sorts`
--
ALTER TABLE `sorts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `sort_greys`
--
ALTER TABLE `sort_greys`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `sort_warp`
--
ALTER TABLE `sort_warp`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `sort_weft`
--
ALTER TABLE `sort_weft`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `sourcing_executives`
--
ALTER TABLE `sourcing_executives`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `so_types`
--
ALTER TABLE `so_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `stock_types`
--
ALTER TABLE `stock_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `strength_cvs`
--
ALTER TABLE `strength_cvs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `terms_conditions`
--
ALTER TABLE `terms_conditions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tpms`
--
ALTER TABLE `tpms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transportations`
--
ALTER TABLE `transportations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `uom`
--
ALTER TABLE `uom`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `variety`
--
ALTER TABLE `variety`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `vendor_banks`
--
ALTER TABLE `vendor_banks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vendor_groups`
--
ALTER TABLE `vendor_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `weaves`
--
ALTER TABLE `weaves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `weave_factors`
--
ALTER TABLE `weave_factors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `weave_types`
--
ALTER TABLE `weave_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `yarns`
--
ALTER TABLE `yarns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `yarn_certification_types`
--
ALTER TABLE `yarn_certification_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `yarn_count_rate_contents`
--
ALTER TABLE `yarn_count_rate_contents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `yarn_inwards`
--
ALTER TABLE `yarn_inwards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `yarn_inward_details`
--
ALTER TABLE `yarn_inward_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `yarn_inward_detail_lots`
--
ALTER TABLE `yarn_inward_detail_lots`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `yarn_opening_balances`
--
ALTER TABLE `yarn_opening_balances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `yarn_opening_balance_details`
--
ALTER TABLE `yarn_opening_balance_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `yarn_opening_balance_detail_lots`
--
ALTER TABLE `yarn_opening_balance_detail_lots`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `yarn_pos`
--
ALTER TABLE `yarn_pos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `yarn_po_details`
--
ALTER TABLE `yarn_po_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `yarn_processing_contracts`
--
ALTER TABLE `yarn_processing_contracts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `yarn_processing_contract_issues`
--
ALTER TABLE `yarn_processing_contract_issues`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `yarn_processing_receives`
--
ALTER TABLE `yarn_processing_receives`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `yarn_processing_returns`
--
ALTER TABLE `yarn_processing_returns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `yarn_types`
--
ALTER TABLE `yarn_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
