-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 02 août 2024 à 01:48
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `erp_sez`
--

-- --------------------------------------------------------

--
-- Structure de la table `agents`
--

CREATE TABLE `agents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `country_id` int(11) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `s_contact` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `percent` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `account_group` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Déchargement des données de la table `agents`
--

INSERT INTO `agents` (`id`, `name`, `country_id`, `contact`, `s_contact`, `address`, `code`, `percent`, `type`, `account_group`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ag 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-07-06 09:51:31', '2024-07-06 09:51:36');

-- --------------------------------------------------------

--
-- Structure de la table `bale_packings`
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
-- Déchargement des données de la table `bale_packings`
--

INSERT INTO `bale_packings` (`id`, `created_at`, `updated_at`, `packing_date`, `packing_type_id`, `order_type`, `buyer_id`, `order_id`, `bale_length`, `quality_id`, `yard_id`, `tare_weight`, `gross_weight`, `location`, `company`, `bale_roll_number`, `bale_roll_manual_no`, `loom_type_id`, `consignee_id`, `remarks`, `conversion`, `by_location`, `grade_id`, `rack_location`, `fabric_seconds_sales`, `piece_no_to_scan`) VALUES
(1, '2024-07-25 07:14:03', '2024-07-25 09:55:39', '2024-07-19', 1, NULL, NULL, 13, 'good length', 1, 1, NULL, NULL, NULL, 'sez', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `bale_packing_details`
--

CREATE TABLE `bale_packing_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `bale_packing_id` int(11) DEFAULT NULL,
  `piece_number_id` double DEFAULT NULL,
  `piece_meters` double DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `yard` double DEFAULT NULL,
  `net_wt` double DEFAULT NULL,
  `avg_wt` double DEFAULT NULL,
  `glm` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Déchargement des données de la table `bale_packing_details`
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
(12, '2024-07-25 09:55:39', '2024-07-25 09:55:39', 1, NULL, 2, '23', 3, 3, 3, 3);

-- --------------------------------------------------------

--
-- Structure de la table `banks`
--

CREATE TABLE `banks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Déchargement des données de la table `banks`
--

INSERT INTO `banks` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Bank 1', 1, '2024-07-05 10:00:45', '2024-07-05 13:26:19'),
(2, 'bank 2', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `beam_inwards`
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
-- Déchargement des données de la table `beam_inwards`
--

INSERT INTO `beam_inwards` (`id`, `created_at`, `updated_at`, `sizing_plan_id`, `receive_date`, `no_of_cones_issued`, `warp_count_measure`, `receipt_no`, `dc_no`, `vehicle_no`) VALUES
(1, '2024-07-05 10:00:45', '2024-07-05 13:26:19', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, '2024-07-20 17:07:14', '2024-07-20 17:07:14', 5, '2024-07-06', 12, 12, 12, '21', '21');

-- --------------------------------------------------------

--
-- Structure de la table `beam_inward_details`
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
-- Déchargement des données de la table `beam_inward_details`
--

INSERT INTO `beam_inward_details` (`id`, `beam_inward_id`, `weaving_contract_id`, `receive_metrs`, `beam_number`, `created_at`, `updated_at`) VALUES
(3, 2, 1, 17, 2, '2024-07-20 17:38:25', '2024-07-20 17:38:25');

-- --------------------------------------------------------

--
-- Structure de la table `beam_outwards`
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
-- Déchargement des données de la table `beam_outwards`
--

INSERT INTO `beam_outwards` (`id`, `outward_number`, `created_at`, `updated_at`, `size_id`, `set_id`, `sort_id`, `outward_date`, `vehicule_number`, `transport`, `hsn_code`, `sac_code`, `e_way_bill_no`, `approx_value`, `dc_no`, `vendor_id`, `set_close`) VALUES
(2, 'BO-2', '2024-07-19 17:56:04', '2024-07-20 10:38:48', 1, 5, 10, '2024-07-21', 'aaa23', '2323', '3232', '2323', '23', '2323', 23, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `beam_outward_details`
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
-- Déchargement des données de la table `beam_outward_details`
--

INSERT INTO `beam_outward_details` (`id`, `beam_outward_id`, `created_at`, `updated_at`, `weaver_id`, `order_id`, `beam_number`, `yarn_id`, `meteres`, `width`, `expexted_weaving_mtr`, `reed_space`, `picks`, `total_ends`) VALUES
(2, 2, '2024-07-20 10:55:55', '2024-07-20 10:55:55', 1, 1, 22, 1, 7, 22, 2, 22, 22, 22),
(3, 2, '2024-07-20 10:56:08', '2024-07-20 11:02:18', 1, 1, 22, 1, 8, 22, 2, 22, 22, 22),
(4, 2, '2024-07-20 10:58:04', '2024-07-20 11:02:18', 1, 13, 22, 1, 9, 22, 2, 22, 22, 22),
(5, 2, '2024-07-20 10:58:18', '2024-07-20 11:02:18', 1, 13, 22, 1, 10, 22, 2, 22, 22, 22);

-- --------------------------------------------------------

--
-- Structure de la table `beam_receive_from_weavers`
--

CREATE TABLE `beam_receive_from_weavers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Structure de la table `blends`
--

CREATE TABLE `blends` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Déchargement des données de la table `blends`
--

INSERT INTO `blends` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Blend 2', 1, '2024-07-05 10:00:45', '2024-07-07 08:45:30'),
(2, 'Blend 1', 1, '2024-07-07 08:45:21', '2024-07-07 08:45:21');

-- --------------------------------------------------------

--
-- Structure de la table `buyers`
--

CREATE TABLE `buyers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(150) DEFAULT NULL,
  `gst` int(11) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `address_1` varchar(250) DEFAULT NULL,
  `address_2` varchar(250) DEFAULT NULL,
  `address_3` varchar(250) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `buyer_pincode` int(11) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `buyer_no` int(11) DEFAULT NULL,
  `buyer_code` varchar(100) DEFAULT NULL,
  `bank` varchar(150) DEFAULT NULL,
  `bank_country_id` int(11) DEFAULT NULL,
  `bank_state_id` int(11) DEFAULT NULL,
  `state_code` int(11) DEFAULT NULL,
  `bank_address` varchar(250) DEFAULT NULL,
  `pincode` int(11) DEFAULT NULL,
  `bank_city_id` int(11) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `credit_limit` double DEFAULT NULL,
  `interest` double DEFAULT NULL,
  `gst_type` varchar(100) DEFAULT NULL,
  `consignee_as_buyer` tinyint(1) DEFAULT NULL,
  `account_group` varchar(100) DEFAULT NULL,
  `vendor_group_id` int(11) DEFAULT NULL,
  `tax_id` int(11) DEFAULT NULL,
  `pan` int(11) DEFAULT NULL,
  `port_landing` int(11) DEFAULT NULL,
  `port_destination` varchar(100) NOT NULL,
  `currency` varchar(100) NOT NULL,
  `is_self` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Déchargement des données de la table `buyers`
--

INSERT INTO `buyers` (`id`, `name`, `gst`, `country_id`, `state_id`, `address_1`, `address_2`, `address_3`, `city_id`, `phone`, `buyer_pincode`, `email`, `buyer_no`, `buyer_code`, `bank`, `bank_country_id`, `bank_state_id`, `state_code`, `bank_address`, `pincode`, `bank_city_id`, `is_active`, `credit_limit`, `interest`, `gst_type`, `consignee_as_buyer`, `account_group`, `vendor_group_id`, `tax_id`, `pan`, `port_landing`, `port_destination`, `currency`, `is_self`, `created_at`, `updated_at`) VALUES
(1, 'buyer 111', 11, 1, 1, '111', '111', '111', 1, '11', 11, '111@11.11', 11, '11', '11', 1, 1, 11, '11', 11, 1, 1, 11, 11, 'registered_b2b', 1, 'land', 1, 11, 11, 1, 'bangalore', 'usd', 1, '2024-07-07 10:02:22', '2024-07-11 15:32:21');

-- --------------------------------------------------------

--
-- Structure de la table `buyer_representatives`
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
-- Déchargement des données de la table `buyer_representatives`
--

INSERT INTO `buyer_representatives` (`id`, `buyer_id`, `representative_name`, `representative_phone`, `created_at`, `updated_at`) VALUES
(5, 1, '333', '333', '2024-07-11 15:32:21', '2024-07-11 15:32:21');

-- --------------------------------------------------------

--
-- Structure de la table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Structure de la table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Structure de la table `certifications`
--

CREATE TABLE `certifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Structure de la table `checks`
--

CREATE TABLE `checks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Déchargement des données de la table `checks`
--

INSERT INTO `checks` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Bank 1', 1, '2024-07-05 10:00:45', '2024-07-05 13:26:19'),
(2, 'Cheq 2', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Déchargement des données de la table `cities`
--

INSERT INTO `cities` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'city A', 1, '2024-07-02 10:55:34', '2024-07-02 10:55:34');

-- --------------------------------------------------------

--
-- Structure de la table `cloth_challans`
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
-- Déchargement des données de la table `cloth_challans`
--

INSERT INTO `cloth_challans` (`id`, `created_at`, `updated_at`, `challan_date`, `challan_type`, `buyer_id`, `company`, `lr_number`, `lr_date`, `ewaybill_number`, `transportation_id`, `remarks`, `order_id`, `sort_id`, `no_of_bale_roll`, `consignee_id`, `vehicle_number`, `rate`, `challan_no`, `fabric_seconds_sales`, `order_sort_id`, `packing_type_id`, `from_date`, `to_date`, `meter_range_id`, `available_bales`, `no_of_bales_rolls`, `from_bale_id`, `to_bale_id`) VALUES
(1, '2024-07-25 09:48:54', '2024-07-31 10:52:54', '2024-07-13', 'export', 1, 'sez', 34, '2024-07-07', '4343', 1, NULL, 9, 9, NULL, NULL, NULL, 1, '212-554A', 0, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `cloth_challan_details`
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
-- Structure de la table `colors`
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
-- Déchargement des données de la table `colors`
--

INSERT INTO `colors` (`id`, `name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'red', '', 1, '2024-07-06 15:49:05', '2024-07-06 15:49:05'),
(2, 'green', '', 1, '2024-07-06 15:49:12', '2024-07-06 15:49:12'),
(3, 'yellow', '', 1, '2024-07-06 15:49:20', '2024-07-06 15:49:20');

-- --------------------------------------------------------

--
-- Structure de la table `consignees`
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
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Structure de la table `container_sizes`
--

CREATE TABLE `container_sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Déchargement des données de la table `container_sizes`
--

INSERT INTO `container_sizes` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'card', 1, '2024-07-05 10:00:45', '2024-07-05 13:26:19');

-- --------------------------------------------------------

--
-- Structure de la table `contracts`
--

CREATE TABLE `contracts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Déchargement des données de la table `contracts`
--

INSERT INTO `contracts` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'contract 1', NULL, NULL),
(2, 'contract 2', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `coparts`
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
-- Déchargement des données de la table `coparts`
--

INSERT INTO `coparts` (`id`, `name`, `value`, `status`, `created_at`, `updated_at`) VALUES
(1, 'single', '1', 1, '2024-07-15 13:25:05', '2024-07-15 13:25:05'),
(2, 'double', '2', 1, '2024-07-15 13:25:21', '2024-07-15 13:25:21');

-- --------------------------------------------------------

--
-- Structure de la table `costings`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `countries`
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
-- Déchargement des données de la table `countries`
--

INSERT INTO `countries` (`id`, `name`, `code`, `status`, `created_at`, `updated_at`) VALUES
(1, 'india', 'ind', 1, '2024-07-07 08:51:19', '2024-07-07 08:51:19'),
(2, 'Morocco', 'Mrc', 1, '2024-07-07 08:51:29', '2024-07-07 08:51:29');

-- --------------------------------------------------------

--
-- Structure de la table `counts`
--

CREATE TABLE `counts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `count` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Déchargement des données de la table `counts`
--

INSERT INTO `counts` (`id`, `count`, `status`, `created_at`, `updated_at`) VALUES
(1, 'COUNT1', 1, '2024-07-06 14:59:15', '2024-07-06 14:59:15'),
(2, 'COUNT2', 1, '2024-07-06 14:59:22', '2024-07-06 14:59:22'),
(3, '1', 1, '2024-07-06 15:22:31', '2024-07-06 15:22:31');

-- --------------------------------------------------------

--
-- Structure de la table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Déchargement des données de la table `customers`
--

INSERT INTO `customers` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'custom', 1, '2024-07-05 10:00:45', '2024-07-06 09:52:57');

-- --------------------------------------------------------

--
-- Structure de la table `delivery_terms`
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

-- --------------------------------------------------------

--
-- Structure de la table `domestic_buyers`
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
-- Structure de la table `domestic_buyer_representatives`
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
-- Structure de la table `employes`
--

CREATE TABLE `employes` (
  `id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `employes`
--

INSERT INTO `employes` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'empl 1', 1, NULL, NULL),
(2, 'emplo 2', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
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
-- Structure de la table `filaments`
--

CREATE TABLE `filaments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Déchargement des données de la table `filaments`
--

INSERT INTO `filaments` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Fil 1', 1, '2024-07-05 10:00:45', '2024-07-07 08:44:47'),
(2, 'Fil 2', 1, '2024-07-07 08:44:52', '2024-07-07 08:44:52');

-- --------------------------------------------------------

--
-- Structure de la table `godown_locations`
--

CREATE TABLE `godown_locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `location` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `vendor_group_id` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `zone` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `is_default` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Structure de la table `grades`
--

CREATE TABLE `grades` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Déchargement des données de la table `grades`
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
-- Structure de la table `g_s_t_s`
--

CREATE TABLE `g_s_t_s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gst_type` varchar(255) NOT NULL,
  `igst` varchar(255) NOT NULL,
  `sgst` varchar(255) NOT NULL,
  `cgst` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Déchargement des données de la table `g_s_t_s`
--

INSERT INTO `g_s_t_s` (`id`, `gst_type`, `igst`, `sgst`, `cgst`, `status`, `created_at`, `updated_at`) VALUES
(1, '1', '1', '0.00', '0.00', 1, '2024-07-02 10:58:04', '2024-07-02 10:58:04'),
(2, '2', '0.00', '2', '3', 1, '2024-07-02 10:58:17', '2024-07-02 10:58:17');

-- --------------------------------------------------------

--
-- Structure de la table `inspections`
--

CREATE TABLE `inspections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `jobwork_fabric_receive_detail_id` int(11) DEFAULT NULL,
  `quality_id` int(11) DEFAULT NULL,
  `width` double DEFAULT NULL,
  `inspection_date` date DEFAULT NULL,
  `epi` varchar(150) DEFAULT NULL,
  `ppi` varchar(150) DEFAULT NULL,
  `weft_count` double DEFAULT NULL,
  `warp_count` double DEFAULT NULL,
  `shift` varchar(150) DEFAULT NULL,
  `remark` varchar(150) DEFAULT NULL,
  `packing_type_id` int(11) DEFAULT NULL,
  `is_first_meter_inspection` tinyint(1) DEFAULT NULL,
  `is_last_piece` tinyint(1) DEFAULT NULL,
  `checker_id` int(11) DEFAULT NULL,
  `vendor_group_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Déchargement des données de la table `inspections`
--

INSERT INTO `inspections` (`id`, `created_at`, `updated_at`, `jobwork_fabric_receive_detail_id`, `quality_id`, `width`, `inspection_date`, `epi`, `ppi`, `weft_count`, `warp_count`, `shift`, `remark`, `packing_type_id`, `is_first_meter_inspection`, `is_last_piece`, `checker_id`, `vendor_group_id`) VALUES
(1, '2024-07-24 15:18:43', '2024-07-24 15:18:43', NULL, 1, 7, '2024-07-26', NULL, '7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, '2024-07-24 15:19:30', '2024-07-24 15:19:30', NULL, 1, 7, '2024-07-26', NULL, '7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `inspection_details`
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
-- Déchargement des données de la table `inspection_details`
--

INSERT INTO `inspection_details` (`id`, `created_at`, `updated_at`, `inspection_id`, `piece_no`, `inward_meters`, `after_fold_length`, `shortage_excess_quantity`, `weight`, `avg_weight`, `measured_width_in_inches`, `total_defect`, `defect_point`, `grade_id`, `batch`, `fent`, `fold`, `total_mtrs`, `is_sample`) VALUES
(1, '2024-07-24 15:18:43', '2024-07-24 15:18:43', 1, '2', 7, 7, 7, -1, NULL, 7, NULL, NULL, 3, '7', 7, 7, NULL, NULL),
(2, '2024-07-24 15:19:30', '2024-07-24 15:19:30', 2, '2', 7, 7, 7, -1, NULL, 7, NULL, NULL, 3, '7', 7, 7, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `inspection_detail_variations`
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
-- Déchargement des données de la table `inspection_detail_variations`
--

INSERT INTO `inspection_detail_variations` (`id`, `created_at`, `updated_at`, `inspection_detail_id`, `variation`, `from_mtrs`, `to_mtrs`, `reason_id`, `defect_points`, `weaver_id`) VALUES
(1, '2024-07-24 15:19:30', '2024-07-24 15:19:30', 2, NULL, NULL, NULL, NULL, NULL, NULL),
(2, '2024-07-24 15:19:30', '2024-07-24 15:19:30', 2, NULL, NULL, NULL, NULL, NULL, NULL),
(3, '2024-07-24 15:29:21', '2024-07-24 15:29:21', 2, 3, 3, 3, NULL, 3, 1),
(4, '2024-07-24 15:29:47', '2024-07-24 15:29:47', 2, 7, 7, 7, NULL, 7, 1),
(5, '2024-07-24 15:31:32', '2024-07-24 15:31:32', 2, 5, 6, 6, NULL, 6, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `inspection_types`
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
-- Déchargement des données de la table `inspection_types`
--

INSERT INTO `inspection_types` (`id`, `name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'insp1', 'inspection 1', 1, NULL, NULL),
(2, 'insp 2', 'inspection 2', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cloth_challan_id` int(11) DEFAULT NULL,
  `invoice_number` varchar(100) NOT NULL,
  `approval` int(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `approval_date` date DEFAULT NULL,
  `internal_remark` varchar(150) DEFAULT NULL,
  `customer_instruction` varchar(150) DEFAULT NULL,
  `comments` varchar(150) DEFAULT NULL,
  `exporter_id` int(11) DEFAULT NULL,
  `invoice_date` date DEFAULT NULL,
  `exporter_ref` varchar(150) DEFAULT NULL,
  `so_no` varchar(150) DEFAULT NULL,
  `reuse_deleted_invoice` tinyint(1) DEFAULT NULL,
  `lc_no` varchar(150) DEFAULT NULL,
  `lc_date` date DEFAULT NULL,
  `company_bank_id` int(11) DEFAULT NULL,
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
  `port_of_discharge` varchar(150) DEFAULT NULL,
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
  `company_logo` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Déchargement des données de la table `invoices`
--

INSERT INTO `invoices` (`id`, `cloth_challan_id`, `invoice_number`, `approval`, `created_at`, `updated_at`, `approval_date`, `internal_remark`, `customer_instruction`, `comments`, `exporter_id`, `invoice_date`, `exporter_ref`, `so_no`, `reuse_deleted_invoice`, `lc_no`, `lc_date`, `company_bank_id`, `buyer`, `buyer_if_other_than_consignee`, `buyer_id`, `buyer_description`, `to_order`, `Notify_id`, `challan_number`, `country_of_origin_of_goods`, `destination_country_id`, `pre_carriage_by_id`, `place_of_receipt_by_pre_carrier`, `vehicle_flight_number`, `port_of_loading_id`, `port_of_loading_details`, `port_of_discharge_id`, `final_destination_id`, `container_no`, `container_size_id`, `forwarder_id`, `line_name_id`, `agent_id`, `agent_percent`, `licence_type`, `licence_number_id`, `port_of_discharge`, `epcg_license_holder`, `terms_of_delivery_and_payment`, `chipper_seal_number`, `vehicle_number`, `rfid_seal_number`, `transportation_id`, `container_type_id`, `sales_type_id`, `lr_no`, `lr_date`, `add`, `less`, `total_tax`, `total_amount`, `insurance`, `freight`, `commission`, `inr_value`, `insurance_hsn`, `freight_hsn`, `currency_convertion_value`, `including_gst_inr_value`, `bale_role_no_range`, `igst_lut`, `lc_bank_id`, `dbk`, `ritc`, `place`, `documents_delivered`, `company_logo`) VALUES
(1, NULL, 'invoice-1', 1, '2024-07-05 10:00:45', '2024-07-05 13:26:19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, NULL, 'invoice-2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `invoice_additionals`
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
-- Structure de la table `invoice_discounts`
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
-- Structure de la table `invoice_others`
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
-- Structure de la table `invoice_settings`
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
-- Déchargement des données de la table `invoice_settings`
--

INSERT INTO `invoice_settings` (`id`, `key`, `value`, `status`, `created_at`, `updated_at`) VALUES
(1, 'tes', 'test', 1, '2024-06-24 06:47:04', '2024-06-24 06:47:04');

-- --------------------------------------------------------

--
-- Structure de la table `jobs`
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
-- Structure de la table `jobwork_fabric_receives`
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
-- Déchargement des données de la table `jobwork_fabric_receives`
--

INSERT INTO `jobwork_fabric_receives` (`id`, `created_at`, `updated_at`, `vendor_id`, `jobwork_id`, `pick_rate`, `slip_no`, `received_date`, `location_id`, `chk_name_id`, `chk_no`, `picks`, `unit_no`, `total_beam_inward_mtrs`, `total_fabric_receive_ptrs`, `balance_mtrs`, `is_last_piece`) VALUES
(1, '2024-07-21 16:55:56', '2024-07-21 16:55:56', 1, 1, 22, '232-232', '2024-07-12', 1, 1, 232, 3, 2, NULL, NULL, NULL, 0),
(2, '2024-07-21 16:56:30', '2024-07-24 18:01:29', 1, 1, 223, '232-23233', '2024-07-12', 1, 1, 232, 33, 23, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Structure de la table `jobwork_fabric_receive_details`
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
-- Déchargement des données de la table `jobwork_fabric_receive_details`
--

INSERT INTO `jobwork_fabric_receive_details` (`id`, `created_at`, `updated_at`, `jobwork_fabric_receive_id`, `quality_id`, `char`, `piece_no`, `vendor_piece_number`, `net_piece_mtrs`, `fold`, `piece_meter`, `weight`, `avg_wt`, `picks`, `job_rate`, `grade`, `remarks`, `is_cutpiece`) VALUES
(1, '2024-07-21 16:55:56', '2024-07-21 16:55:56', 1, 1, '2', 3, 3, 3, 3, 3, 3, 3, 3, 3, 'PASS', '3', 1),
(2, '2024-07-21 16:55:56', '2024-07-21 16:55:56', 1, 1, '5', 5, 5, 5, 15, 5, 5, 5, 5, 5, 'R', '5', NULL),
(10, '2024-07-24 18:01:29', '2024-07-24 18:01:29', 2, 1, '4', 4, 4, 4, 2, 2, 2, 2, 2, 2, 'C', '2', 1);

-- --------------------------------------------------------

--
-- Structure de la table `jobwork_finished_fabric_receives`
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
-- Déchargement des données de la table `jobwork_finished_fabric_receives`
--

INSERT INTO `jobwork_finished_fabric_receives` (`id`, `created_at`, `updated_at`, `vendor_id`, `jobwork_process_contract_id`, `slip_no`, `received_date`, `location_id`, `chk_no`, `chk_id`, `ent_no`, `lot_number`, `is_last_piece`) VALUES
(1, '2024-07-24 15:52:14', '2024-07-24 17:20:01', 1, 1, '33', '2024-07-20', 1, 223, NULL, '333', '333', NULL),
(2, '2024-07-24 15:53:13', '2024-07-24 15:53:13', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `jobwork_finished_fabric_receive_details`
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

-- --------------------------------------------------------

--
-- Structure de la table `jobwork_process_contracts`
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
-- Déchargement des données de la table `jobwork_process_contracts`
--

INSERT INTO `jobwork_process_contracts` (`id`, `created_at`, `updated_at`, `booking_date`, `process_id`, `group_id`, `vendor_id`, `contract_number`, `contract_date`, `agent_id`, `contact_person_1_id`, `contact_person_2_id`, `rate_per_meter`, `delivery_date`, `inspection_type_id`, `payment_term_id`, `order_mtrs`, `transport_id`, `delivery_location_id`, `wastage`, `sort_id`, `is_opening_contract`, `gst_type`, `terms_condition_id`, `remarks_1`, `taxable_amount`, `gst_percent`, `igst_amount`, `sgst_amount`, `cgst_amount`, `grand_total`, `approval`, `approval_date`, `internal_remark`, `customer_instruction`, `comments`) VALUES
(1, '2024-07-24 15:55:58', '2024-07-24 18:02:01', '2024-07-12', 1, 1, 1, '2323', '2024-07-06', NULL, NULL, 1, 3, NULL, NULL, 2, 3, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, 222, 1, 33, 22, 22, 33, 1, '2024-07-24', '2222', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `jobwork_process_contract_details`
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
-- Déchargement des données de la table `jobwork_process_contract_details`
--

INSERT INTO `jobwork_process_contract_details` (`id`, `created_at`, `updated_at`, `jobwork_process_contract_id`, `sort_id`, `sort_no`, `finished_quality`, `grey_quality`, `order_no`, `quantity`, `rate`, `taxable_amount`) VALUES
(1, '2024-07-30 22:49:06', '2024-07-30 22:49:06', 1, 7, '1414', '333', '333', 'HST/EX01/13', 79, 10, 7);

-- --------------------------------------------------------

--
-- Structure de la table `jobwork_process_contract_issues`
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
  `issue_type` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Déchargement des données de la table `jobwork_process_contract_issues`
--

INSERT INTO `jobwork_process_contract_issues` (`id`, `created_at`, `updated_at`, `jobwork_process_contract_id`, `vendor_name`, `issue_date`, `transporter_id`, `lr_no`, `lr_date`, `internal_lot_no`, `vendor_lot_no`, `fabric_type`, `mode_of_shipment`, `vehicle_number`, `issue_type`) VALUES
(1, '2024-07-24 16:35:12', '2024-07-24 16:49:53', 1, 'aaa', '2024-07-17', 1, '333', '2024-07-13', '333', '33', 'pieces', 'ROAD', '3', 'Reprocess');

-- --------------------------------------------------------

--
-- Structure de la table `jobwork_process_contract_issue_details`
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
-- Déchargement des données de la table `jobwork_process_contract_issue_details`
--

INSERT INTO `jobwork_process_contract_issue_details` (`id`, `created_at`, `updated_at`, `jobwork_process_contract_issue_id`, `quality`, `piece_no`, `piece_mtr`, `weight`, `avg_wt`, `picks`, `grade`, `lot_no`) VALUES
(1, '2024-07-31 00:03:49', '2024-07-31 00:03:49', 1, '1125azazsss', '3', '3', '3', '3', '3', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `jobwork_weaving_contracts`
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
  `reed_space` double DEFAULT NULL,
  `l_to_l` double DEFAULT NULL,
  `selvedge_id` int(11) DEFAULT NULL,
  `dents` double DEFAULT NULL,
  `ends_per_dent` double DEFAULT NULL,
  `selvedge_ends` double DEFAULT NULL,
  `width` double DEFAULT NULL,
  `catch_cord_ends` double DEFAULT NULL,
  `ends_per_wire` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `jobwork_weaving_contracts`
--

INSERT INTO `jobwork_weaving_contracts` (`id`, `created_at`, `updated_at`, `contract_type_id`, `vendor_id`, `contract_no`, `contract_year`, `contract_number`, `contract_date`, `sort_id`, `jobwork_number`, `pick_rate`, `merchandiser_id`, `delivery_date`, `inspection_type_id`, `payment_term_id`, `wastage`, `packing_type_id`, `production_mtrs`, `piece_length_80`, `piece_length_20`, `reed_space`, `l_to_l`, `selvedge_id`, `dents`, `ends_per_dent`, `selvedge_ends`, `width`, `catch_cord_ends`, `ends_per_wire`) VALUES
(1, '2024-07-20 17:30:08', '2024-07-13 16:32:13', 1, 1, 1, '24-25', 'JWC/24-25/1', '2024-07-13', 7, 'JW-1', 11, 1, '2024-07-21', 1, 2, 1, 1, 11, 8, 2, 3, 3, 1, 3, 3, 3, 3, 3, 3),
(2, '2024-07-20 17:30:59', '2024-07-13 17:49:17', 1, 1, 2, '24-25', 'JWC/24-25/2', '2024-07-14', 7, 'JW-2', 2, 1, '2024-07-21', 1, 2, 2, 1, 2, NULL, NULL, 2, 2, 1, 2, 2, 2, 2, 2, 2),
(3, '2024-07-20 17:31:01', '2024-07-13 17:49:45', 1, 1, 2, '24-25', 'JWC/24-25/2', '2024-07-14', 7, 'JW-3', 2, 1, '2024-07-21', 1, 2, 2, 1, 2, NULL, NULL, 2, 2, 1, 2, 2, 2, 2, 2, 2),
(4, '2024-07-20 17:31:06', '2024-07-15 17:03:36', NULL, 1, NULL, NULL, NULL, NULL, NULL, 'JW-4', NULL, 1, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `jobwork_weaving_contract_orders`
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
-- Déchargement des données de la table `jobwork_weaving_contract_orders`
--

INSERT INTO `jobwork_weaving_contract_orders` (`id`, `sales_order_detail_id`, `jobwork_weaving_contract_id`, `planned_quantity`, `created_at`, `updated_at`) VALUES
(16, 13, 1, 77, '2024-07-13 18:11:14', '2024-07-13 18:11:14'),
(17, 13, 1, 12, '2024-07-13 18:11:14', '2024-07-13 18:11:14'),
(18, 13, 1, 222, '2024-07-13 18:11:14', '2024-07-13 18:11:14');

-- --------------------------------------------------------

--
-- Structure de la table `jobwork_weaving_weft_issues`
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
-- Déchargement des données de la table `jobwork_weaving_weft_issues`
--

INSERT INTO `jobwork_weaving_weft_issues` (`id`, `jobwork_id`, `issue_date`, `receiving_person`, `vehicle_number`, `dc_number`, `transport_id`, `vendor_id`, `gate_pass_no`, `created_at`, `updated_at`) VALUES
(1, 2, '2024-07-19', NULL, NULL, NULL, 1, 1, 'aaaa', '2024-07-21 11:41:32', '2024-07-21 12:37:33');

-- --------------------------------------------------------

--
-- Structure de la table `jobwork_weaving_weft_issue_details`
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
-- Déchargement des données de la table `jobwork_weaving_weft_issue_details`
--

INSERT INTO `jobwork_weaving_weft_issue_details` (`id`, `jobwork_weaving_weft_issue_id`, `created_at`, `updated_at`, `actual_count_id`, `cone_tip_color`, `location`, `lot_no`, `item_type`, `item`, `mill`, `stock_receipt_id`, `available_quantity`, `available_bags`, `no_of_bags_issuing`, `kgs_per_bag`, `cones_per_bag`, `issued_cones`, `issuing_quantity`, `convertion_value`) VALUES
(2, 1, '2024-07-30 21:58:38', '2024-07-30 21:58:38', NULL, '-', 'AAAA', 'a, 55,', NULL, '8/1 UOM2 TYPE1 VRT1 green', 'AAAA', 3, 33, 339, NULL, 33, 33, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `job_batches`
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
-- Structure de la table `loom_types`
--

CREATE TABLE `loom_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Déchargement des données de la table `loom_types`
--

INSERT INTO `loom_types` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(2, 'loom type 4', 1, '2024-07-05 15:20:36', '2024-07-05 15:20:36'),
(3, '111', 1, '2024-07-05 15:41:30', '2024-07-05 15:41:35');

-- --------------------------------------------------------

--
-- Structure de la table `machines`
--

CREATE TABLE `machines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Déchargement des données de la table `machines`
--

INSERT INTO `machines` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'machine 1', 1, '2024-07-05 10:00:45', '2024-07-05 13:26:19');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Déchargement des données de la table `migrations`
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
(60, '2024_06_27_002247_create_sort_weft_table', 4);

-- --------------------------------------------------------

--
-- Structure de la table `mills`
--

CREATE TABLE `mills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Déchargement des données de la table `mills`
--

INSERT INTO `mills` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'MILL1', 1, '2024-07-06 15:00:59', '2024-07-06 15:00:59'),
(2, 'MILL2', 1, '2024-07-06 15:01:07', '2024-07-06 15:01:07');

-- --------------------------------------------------------

--
-- Structure de la table `packings`
--

CREATE TABLE `packings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Structure de la table `packing_types`
--

CREATE TABLE `packing_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(250) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Déchargement des données de la table `packing_types`
--

INSERT INTO `packing_types` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ROLE', 1, NULL, NULL),
(2, 'BALE', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `paper_tube_sizes`
--

CREATE TABLE `paper_tube_sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Déchargement des données de la table `paper_tube_sizes`
--

INSERT INTO `paper_tube_sizes` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'size 35/25', 1, '2024-07-05 10:00:45', '2024-07-07 08:43:40'),
(2, 'size 25/15', 1, '2024-07-07 08:43:50', '2024-07-07 08:43:50');

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Structure de la table `payment_terms`
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
-- Déchargement des données de la table `payment_terms`
--

INSERT INTO `payment_terms` (`id`, `name`, `description`, `payment_terms_for`, `days`, `interest`, `advance`, `status`, `created_at`, `updated_at`) VALUES
(2, 'term 122', 'term\r\nterm 1', 1, 2, 10, 10, 1, '2024-07-05 15:10:37', '2024-07-09 11:21:31');

-- --------------------------------------------------------

--
-- Structure de la table `payment_types`
--

CREATE TABLE `payment_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Déchargement des données de la table `payment_types`
--

INSERT INTO `payment_types` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'card', 1, '2024-07-05 10:00:45', '2024-07-05 13:26:19');

-- --------------------------------------------------------

--
-- Structure de la table `ply`
--

CREATE TABLE `ply` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ply` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Déchargement des données de la table `ply`
--

INSERT INTO `ply` (`id`, `ply`, `status`, `created_at`, `updated_at`) VALUES
(1, 'PLY1', 1, '2024-07-06 14:59:41', '2024-07-06 14:59:41'),
(2, 'PLY2', 1, '2024-07-06 14:59:47', '2024-07-06 14:59:47'),
(3, '8', 1, '2024-07-06 15:23:32', '2024-07-06 15:23:32');

-- --------------------------------------------------------

--
-- Structure de la table `ports`
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
-- Déchargement des données de la table `ports`
--

INSERT INTO `ports` (`id`, `name`, `code`, `pin`, `description`, `city`, `state`, `status`, `created_at`, `updated_at`) VALUES
(1, '12154', 'aaa', '1254', 'azaz', 1, 1, 1, '2024-07-07 09:00:01', '2024-07-07 09:00:01');

-- --------------------------------------------------------

--
-- Structure de la table `po_types`
--

CREATE TABLE `po_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Déchargement des données de la table `po_types`
--

INSERT INTO `po_types` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Type 1', 1, '2024-07-05 10:00:45', '2024-07-05 13:26:19');

-- --------------------------------------------------------

--
-- Structure de la table `pre_carriage`
--

CREATE TABLE `pre_carriage` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Structure de la table `processes`
--

CREATE TABLE `processes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Déchargement des données de la table `processes`
--

INSERT INTO `processes` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'DEYING', 1, '2024-07-05 10:00:45', '2024-07-05 13:26:19'),
(2, 'FINISHING', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `process_returns`
--

CREATE TABLE `process_returns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Structure de la table `prs`
--

CREATE TABLE `prs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Déchargement des données de la table `prs`
--

INSERT INTO `prs` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'pr-1', 1, '2024-07-05 10:00:45', '2024-07-05 13:26:19');

-- --------------------------------------------------------

--
-- Structure de la table `purchase_returns`
--

CREATE TABLE `purchase_returns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Structure de la table `purchase_types`
--

CREATE TABLE `purchase_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Déchargement des données de la table `purchase_types`
--

INSERT INTO `purchase_types` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Domestic', 1, '2024-07-05 10:00:45', '2024-07-05 13:26:19'),
(2, 'Import', 1, '2024-07-05 10:00:45', '2024-07-05 13:26:19');

-- --------------------------------------------------------

--
-- Structure de la table `qualities`
--

CREATE TABLE `qualities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Structure de la table `reasons`
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
-- Structure de la table `sales_co_ordinators`
--

CREATE TABLE `sales_co_ordinators` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Déchargement des données de la table `sales_co_ordinators`
--

INSERT INTO `sales_co_ordinators` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'card', 1, '2024-07-05 10:00:45', '2024-07-05 13:26:19');

-- --------------------------------------------------------

--
-- Structure de la table `sales_orders`
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
  `po_no` double DEFAULT NULL,
  `adress` varchar(250) DEFAULT NULL,
  `ship_adress` varchar(250) DEFAULT NULL,
  `sale_contract_no` varchar(250) DEFAULT NULL,
  `agent_percent` double DEFAULT NULL,
  `port_loading` varchar(250) DEFAULT NULL,
  `port_destination` varchar(250) DEFAULT NULL,
  `insurance` double DEFAULT NULL,
  `shipping_terms_det` varchar(250) DEFAULT NULL,
  `shipping_method` varchar(250) DEFAULT NULL,
  `remark` varchar(250) DEFAULT NULL,
  `approval` int(1) DEFAULT NULL COMMENT '-1: canceled, 0: Hold or 1: Approved',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Déchargement des données de la table `sales_orders`
--

INSERT INTO `sales_orders` (`id`, `order_no`, `invoice_type_id`, `contract_type_id`, `buyer_id`, `tax_id`, `sourcing_executive_id`, `ship_to_id`, `agent_id`, `city_id`, `shipping_terms_id`, `bank_id`, `container_size_id`, `payment_terms_id`, `terms_conditions_id`, `user_id`, `sales_co_ordinator_id`, `so_type_id`, `order_date`, `po_date`, `confirmation_date`, `pi_date`, `po_no`, `adress`, `ship_adress`, `sale_contract_no`, `agent_percent`, `port_loading`, `port_destination`, `insurance`, `shipping_terms_det`, `shipping_method`, `remark`, `approval`, `created_at`, `updated_at`) VALUES
(13, 'HST/EX01/13', 1, 2, 1, 11, 1, 1, 1, 1, 1, 1, 1, 2, 1, 1, 1, NULL, '2024-07-11', '2024-07-04', '2024-07-13', '2024-07-11', 11, '1111', '1111', '11', 1, '1', '1', 1, '1', 'sea', '', NULL, '2024-07-10 08:40:31', '2024-07-17 17:34:50');

-- --------------------------------------------------------

--
-- Structure de la table `sales_order_details`
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
  `currency` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Déchargement des données de la table `sales_order_details`
--

INSERT INTO `sales_order_details` (`id`, `sales_order_id`, `finished_quality_id`, `weave_type_id`, `first_quality_id`, `selvedge_id`, `unit_id`, `inspection_type_id`, `paper_tube_size_id`, `costing_number`, `hsn_code`, `quantity`, `rate_per_unit`, `val`, `frieght_charge`, `surcharge`, `exchange_rate`, `inr_rate`, `piece_length`, `variation`, `fold`, `yarn_det`, `packing_type`, `buyer_sort`, `sort_code`, `weaving_qty`, `purchase_qty`, `instruction_factory`, `description`, `fabric_type`, `approval`, `yarn_require`, `shrinkage`, `comment`, `currency`, `created_at`, `updated_at`) VALUES
(8, 12, 1, 1, 7, 1, 1, NULL, NULL, 1, NULL, 1, 1, NULL, NULL, NULL, 1, 1, NULL, NULL, NULL, '1', NULL, '1', NULL, NULL, NULL, '', '1', 'finished', 1, 0, 0, '', 'usd', '2024-07-09 15:55:01', '2024-07-12 07:55:17'),
(9, 13, 9, 1, 7, NULL, 1, NULL, 1, 1, 1, 79, 1, 2, 1, 1, 1, 1, 1, 1, '1', '1', NULL, '1', NULL, 71, 8, '', '1', 'finished', 0, 0, 7, '', 'usd', '2024-07-10 08:40:31', '2024-07-17 17:34:50');

-- --------------------------------------------------------

--
-- Structure de la table `sales_order_sub_details`
--

CREATE TABLE `sales_order_sub_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sales_order_detail_id` int(11) DEFAULT NULL,
  `fcl` int(11) DEFAULT NULL,
  `po_lds` date DEFAULT NULL,
  `ex_factory_date` date DEFAULT NULL,
  `actual_ex_factory_date` date DEFAULT NULL,
  `lc_expire_date` date DEFAULT NULL,
  `lds_date` date DEFAULT NULL,
  `lc_no` varchar(150) DEFAULT NULL,
  `line` int(150) DEFAULT NULL,
  `etd` date DEFAULT NULL,
  `eta` date DEFAULT NULL,
  `office_remark` varchar(250) DEFAULT NULL,
  `factory_remark` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Déchargement des données de la table `sales_order_sub_details`
--

INSERT INTO `sales_order_sub_details` (`id`, `created_at`, `updated_at`, `sales_order_detail_id`, `fcl`, `po_lds`, `ex_factory_date`, `actual_ex_factory_date`, `lc_expire_date`, `lds_date`, `lc_no`, `line`, `etd`, `eta`, `office_remark`, `factory_remark`) VALUES
(1, '2024-07-05 10:00:45', '2024-07-05 13:26:19', NULL, NULL, '2024-07-13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, '2024-07-09 15:38:21', '2024-07-09 15:38:21', 3, 1, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL, NULL, '1', NULL),
(3, '2024-07-09 15:39:06', '2024-07-09 15:39:06', 4, 1, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL, NULL, '1', NULL),
(4, '2024-07-09 15:44:52', '2024-07-09 15:44:52', 6, 1, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL, NULL, '1', NULL),
(5, '2024-07-09 15:53:58', '2024-07-09 15:53:58', 7, 1, '2024-07-04', NULL, NULL, NULL, NULL, '1', 1, NULL, NULL, '1', NULL),
(6, '2024-07-09 15:55:01', '2024-07-09 15:55:01', 8, 1, '2024-07-04', '2024-07-13', '2024-07-14', '2024-07-25', '2024-07-06', '1', 1, '2024-08-02', '2024-07-17', '1', NULL),
(7, '2024-07-10 08:40:31', '2024-07-11 15:33:01', 9, 5, '2024-07-10', '2024-07-10', '2024-07-10', '2024-07-10', '2024-07-10', '1', 1, '2024-07-10', '2024-07-10', '1', '1'),
(8, '2024-07-10 08:51:26', '2024-07-11 15:33:01', 9, 9, '2024-07-11', '2024-07-11', '2024-07-11', '2024-07-11', '2024-07-11', '2', 2, '2024-07-11', '2024-07-11', '2', '2');

-- --------------------------------------------------------

--
-- Structure de la table `sales_order_yarn_certifications`
--

CREATE TABLE `sales_order_yarn_certifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sales_order_detail_id` int(11) DEFAULT NULL,
  `yarn_certification_type_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Déchargement des données de la table `sales_order_yarn_certifications`
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
(22, 9, 1, '2024-07-13 18:09:11', '2024-07-13 18:09:11'),
(23, 9, 1, '2024-07-13 18:09:11', '2024-07-13 18:09:11');

-- --------------------------------------------------------

--
-- Structure de la table `sales_types`
--

CREATE TABLE `sales_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `account_group` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Structure de la table `sale_returns`
--

CREATE TABLE `sale_returns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Structure de la table `selvedge`
--

CREATE TABLE `selvedge` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `catch_cord_ends` double NOT NULL,
  `reed_count` double NOT NULL,
  `selvedge_width` double NOT NULL,
  `dents` double DEFAULT NULL,
  `ends_per_dent` double NOT NULL,
  `extra_ends` double DEFAULT NULL,
  `selvedge_ends` double DEFAULT NULL,
  `weave_id` varchar(255) NOT NULL,
  `ends_per_heild` double DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `ends_per_wire` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Déchargement des données de la table `selvedge`
--

INSERT INTO `selvedge` (`id`, `name`, `catch_cord_ends`, `reed_count`, `selvedge_width`, `dents`, `ends_per_dent`, `extra_ends`, `selvedge_ends`, `weave_id`, `ends_per_heild`, `status`, `ends_per_wire`, `created_at`, `updated_at`) VALUES
(1, 'selvedge1', 1, 2, 3, 0.12, 5, 6, 1.6, '2', 6, 1, 8, '2024-07-06 16:11:47', '2024-07-06 16:11:47');

-- --------------------------------------------------------

--
-- Structure de la table `sessions`
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
-- Déchargement des données de la table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('iWm85G7uEAOkprV7qXUiVh4qyPnvq87I2rk9EjPs', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoid294QUN2TlFZQmhPM3haMWdWeHBsMjFSYWtPRklQbjhiT0Y2NUsxTSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozMDoiaHR0cDovL2xvY2FsaG9zdC9jbG90aF9jaGFsbGFuIjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly9sb2NhbGhvc3QvY2xvdGhfY2hhbGxhbi8xL2VkaXQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6NzoiY29tcGFueSI7czozOiJzZXoiO30=', 1722427276),
('ONxGFbuISLYTcNGRjNpHbTWqdbiOEVQPRsk1AJ3O', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36 Edg/119.0.0.0', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiU2Job2lEN25zZWFIQWhobVlsNGFmT1ZGdU5SZnl4dURhZlFxSExCeiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo0NjoiaHR0cDovL2xvY2FsaG9zdC9lcnBfbmV3LW1haW4vcHVibGljL2Rhc2hib2FyZCI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjc0OiJodHRwOi8vbG9jYWxob3N0L2VycF9uZXctbWFpbi9wdWJsaWMvam9id29ya19wcm9jZXNzX2NvbnRyYWN0X2lzc3VlLzEvZWRpdCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czo3OiJjb21wYW55IjtzOjM6InNleiI7fQ==', 1722387887),
('xg5pXdvYGp7uhv6GXtff3BfE8c0fDZSR5E01NfE3', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36 Edg/127.0.0.0', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiZUl0a2VFeWtFU0x4R3dYME5VS01LTlk3Z1l1azk1OVFGSHoybWtmcSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo3NDoiaHR0cDovL2xvY2FsaG9zdC9lcnBfbmV3LW1haW4vcHVibGljL2pvYndvcmtfcHJvY2Vzc19jb250cmFjdF9pc3N1ZS8xL2VkaXQiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo1MzoiaHR0cDovL2xvY2FsaG9zdC9lcnBfbmV3LW1haW4vcHVibGljL2FwcHJvdmFsX2ludm9pY2UiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6NzoiY29tcGFueSI7czozOiJzZXoiO30=', 1722554830);

-- --------------------------------------------------------

--
-- Structure de la table `set_single_doubles`
--

CREATE TABLE `set_single_doubles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Déchargement des données de la table `set_single_doubles`
--

INSERT INTO `set_single_doubles` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'aa', 1, '2024-07-02 11:15:42', '2024-07-02 11:15:42'),
(2, 's 2', 1, '2024-07-02 11:36:07', '2024-07-02 11:36:07'),
(3, 's 3', 1, '2024-07-02 11:40:50', '2024-07-02 11:40:50');

-- --------------------------------------------------------

--
-- Structure de la table `shades`
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
-- Déchargement des données de la table `shades`
--

INSERT INTO `shades` (`id`, `name`, `parent_sort_id`, `actual_sort_id`, `created_at`, `updated_at`) VALUES
(1, 'red', 1, 8, '2024-07-07 13:52:49', '2024-07-10 14:58:27'),
(2, 'aaaaa', 1, 0, '2024-07-07 13:54:00', '2024-07-07 13:54:00'),
(3, 'green', 1, 0, '2024-07-07 13:57:25', '2024-07-07 13:57:25'),
(4, 'green', 1, 0, '2024-07-07 13:59:19', '2024-07-07 13:59:19'),
(5, 'green', 1, 0, '2024-07-07 13:59:36', '2024-07-07 13:59:36'),
(6, 'green aaaa', 1, 0, '2024-07-07 14:00:02', '2024-07-07 14:43:46'),
(7, 'aaaa', 7, 10, '2024-07-10 15:09:50', '2024-07-10 15:18:12');

-- --------------------------------------------------------

--
-- Structure de la table `shade_warps`
--

CREATE TABLE `shade_warps` (
  `id` int(11) NOT NULL,
  `shade_id` int(11) DEFAULT NULL,
  `warp_id` int(11) DEFAULT NULL,
  `actual_id` int(11) DEFAULT NULL,
  `material_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `shade_warps`
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
(11, 7, 8, 1, 1, '2024-07-10 15:09:50', '2024-07-10 15:09:50');

-- --------------------------------------------------------

--
-- Structure de la table `shade_wefts`
--

CREATE TABLE `shade_wefts` (
  `id` int(11) NOT NULL,
  `shade_id` int(11) DEFAULT NULL,
  `actual_id` int(11) DEFAULT NULL,
  `material_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `shade_wefts`
--

INSERT INTO `shade_wefts` (`id`, `shade_id`, `actual_id`, `material_id`, `created_at`, `updated_at`) VALUES
(2, 6, 1, 1, '2024-07-07 14:44:32', '2024-07-07 14:44:32'),
(3, 1, 1, 1, '2024-07-07 14:44:55', '2024-07-07 14:44:55'),
(4, 7, 1, 1, '2024-07-10 15:09:50', '2024-07-10 15:09:50'),
(5, 7, 1, 1, '2024-07-10 15:09:50', '2024-07-10 15:09:50'),
(6, 7, 1, 1, '2024-07-10 15:09:50', '2024-07-10 15:09:50'),
(7, 7, 1, 1, '2024-07-10 15:09:50', '2024-07-10 15:09:50'),
(8, 7, 1, 1, '2024-07-10 15:09:50', '2024-07-10 15:09:50'),
(9, 7, 1, 1, '2024-07-10 15:09:50', '2024-07-10 15:09:50');

-- --------------------------------------------------------

--
-- Structure de la table `shipping_terms`
--

CREATE TABLE `shipping_terms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Déchargement des données de la table `shipping_terms`
--

INSERT INTO `shipping_terms` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'card', 1, '2024-07-05 10:00:45', '2024-07-05 13:26:19');

-- --------------------------------------------------------

--
-- Structure de la table `sizing_plans`
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
-- Déchargement des données de la table `sizing_plans`
--

INSERT INTO `sizing_plans` (`id`, `plan_number`, `is_complete`, `default_meter_for_beam`, `given_meters`, `copart_id`, `no_of_bags`, `meter_per_part`, `expected_meter`, `total_meter`, `bottom_percent`, `weight_per_cone`, `kg_per_bag`, `cone_per_bag`, `mill_name_id`, `yarn_id`, `actual_count_id`, `vendor_id`, `beam_recieve_date`, `ref_number`, `merchandiser_id`, `machine_id`, `payment_term_id`, `remarks`, `sizing_amount`, `planning_date`, `is_sizing_order`, `sizing_name_id`, `sizing_for`, `yarn_issue`, `beam_inward_id`, `created_at`, `updated_at`) VALUES
(5, 'SP-5', 1, 1, 2, 1, NULL, 2, NULL, 2, 2, 2, 2, 2, 1, 1, 1, 1, '2024-07-16', 2, 1, 1, 2, '2', 1, '2024-07-21', 1, 1, 'jobwork', NULL, NULL, '2024-07-15 17:28:25', '2024-07-16 09:27:04');

-- --------------------------------------------------------

--
-- Structure de la table `sizing_plan_beams`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `sizing_plan_beams`
--

INSERT INTO `sizing_plan_beams` (`id`, `sizing_plan_id`, `is_set_beam`, `loom_ched_id`, `beam_dia`, `warp_meters`, `expected_fabric_mtrs`, `beam_meters`, `loom_number_id`, `loom_model_id`, `order_id`, `weaver_id`, `created_at`, `updated_at`) VALUES
(1, 4, 0, 3, NULL, NULL, NULL, NULL, 3, 2, 13, 1, '2024-07-15 17:13:42', '2024-07-15 17:13:42'),
(21, 5, 0, 2, 2, 2, 2, 7, 2, 3, 13, 1, '2024-07-16 09:27:27', '2024-07-16 09:27:27'),
(22, 5, 1, 3, 3, 3, 3, 3, NULL, NULL, NULL, NULL, '2024-07-16 09:27:27', '2024-07-16 09:27:27');

-- --------------------------------------------------------

--
-- Structure de la table `sizing_plan_yarns`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `sizing_plan_yarns`
--

INSERT INTO `sizing_plan_yarns` (`id`, `created_at`, `updated_at`, `sizing_plan_id`, `yarn_id`, `sort_id`, `sort_ends`, `sizing_ends`, `width`, `parts`, `ends_per_parts`, `dbf`, `weave_type_id`, `loom_type_id`, `meters`, `warp_meters`) VALUES
(1, '2024-07-15 17:09:51', '2024-07-15 17:09:51', 1, 1, 1, 11, 1, 1, 1, 1, 1, NULL, 2, 1, 1),
(2, '2024-07-15 17:10:55', '2024-07-15 17:10:55', 2, 1, 1, 11, 1, 1, 1, 1, 1, NULL, 2, 1, 1),
(3, '2024-07-15 17:13:28', '2024-07-15 17:13:28', 3, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL),
(4, '2024-07-15 17:13:42', '2024-07-15 17:13:42', 4, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL),
(39, '2024-07-16 09:27:27', '2024-07-16 09:27:27', 5, 1, 7, 4, 4, 4, 4, 4, 4, NULL, 2, 4, 4),
(40, '2024-07-16 09:27:27', '2024-07-16 09:27:27', 5, 1, 10, 2, 2, 2, 2, 2, 2, NULL, 3, 2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `sizing_yarn_issues`
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
-- Déchargement des données de la table `sizing_yarn_issues`
--

INSERT INTO `sizing_yarn_issues` (`id`, `sizing_plan_id`, `created_at`, `updated_at`, `set_no`, `van_no`, `approx_value`, `transport_id`, `dc_no`) VALUES
(5, 5, '2024-07-29 16:16:33', '2024-07-29 16:16:33', 2, '3', '3', 2, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `sizing_yarn_issue_details`
--

CREATE TABLE `sizing_yarn_issue_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
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

-- --------------------------------------------------------

--
-- Structure de la table `sorts`
--

CREATE TABLE `sorts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fabric` varchar(255) DEFAULT NULL,
  `sort_no` varchar(255) DEFAULT NULL,
  `details` text DEFAULT NULL,
  `weave` varchar(255) DEFAULT NULL,
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
  `master_quality` varchar(255) DEFAULT NULL,
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
-- Déchargement des données de la table `sorts`
--

INSERT INTO `sorts` (`id`, `fabric`, `sort_no`, `details`, `weave`, `create_for`, `code`, `company`, `numeric`, `yarn`, `reed`, `denting`, `epi`, `width`, `e_width`, `reed_space`, `total_ends`, `picks`, `pick_insert`, `width_cm`, `composition`, `size`, `loom_type`, `selvedge`, `dents`, `s_width`, `ends_per_dent`, `selvedge_ends`, `ends_with_selvedge`, `beam_type`, `selvedge_drawing`, `tube_size`, `total_warp_patterns`, `total_weft_patterns`, `total_warp_grams`, `total_weft_grams`, `cal_glm_shrinkage`, `cal_gsm_shrinkage`, `cal_glm_wihtout_shrinkage`, `cal_gsm_without_shrinkage`, `master_quality`, `act_glm`, `act_gsm`, `on_loom`, `drawing`, `peg_plan`, `display_quality`, `design_paper_image`, `fabric_image`, `thread_count`, `fabric_cover`, `fabric_cover_range`, `remarks`, `is_master`, `status`, `hsn`, `igst`, `cgst`, `sgst`, `cess`, `hsn_description`, `created_at`, `updated_at`) VALUES
(1, 'grey', '1', '1125azazsss', '2', 'export', '11', NULL, '11', '11', '11', '11', '60.5', '11', '11', '22', '1331', '1', '11', NULL, '11', '11', '3', '1', '0.12', '3', '5', '1.6', '1336.12', NULL, '111', NULL, '112', '22', '222', '22', '22', '22', '22', '22', NULL, '22', '22', '22', '22', '22', '22', NULL, NULL, NULL, '22', '22', '22', 0, 1, '66', '1', '2', '3', '22', '66', '2024-07-06 16:32:22', '2024-07-07 17:13:22'),
(2, 'grey', '333', '333', '1', 'domestic', '33', NULL, '33', '33', '33', '33', '544.5', '33', '33', '66', '35937', '33', '33', '83.82000000000001', '33', '33', '3', '1', '0.12', '3', '5', '1.6', '35942.12', '1', '33', '1', '333', '33', '33', '33', '33', '33', '33', '33', '1', '33', '33', '33', '33', '33', '33', NULL, NULL, '33', '33', '33', '33', 1, 1, '3', '1', '2', '3', '3', '3', '2024-07-07 16:37:17', '2024-07-07 16:37:17'),
(3, 'grey', '333', '333', '1', 'domestic', '33', NULL, '33', '33', '33', '33', '544.5', '33', '33', '66', '35937', '33', '33', '83.82000000000001', '33', '33', '3', '1', '0.12', '3', '5', '1.6', '35942.12', '1', '33', '1', '333', '33', '33', '33', '33', '33', '33', '33', '1', '33', '33', '33', '33', '33', '33', NULL, NULL, '33', '33', '33', '33', 1, 1, '3', '1', '2', '3', '3', '3', '2024-07-07 16:37:38', '2024-07-07 16:37:38'),
(4, 'grey', '333', '333', '1', 'domestic', '33', NULL, '33', '33', '33', '33', '544.5', '33', '33', '66', '35937', '33', '33', '83.82000000000001', '33', '33', '3', '1', '0.12', '3', '5', '1.6', '35942.12', '1', '33', '1', '333', '33', '33', '33', '33', '33', '33', '33', '1', '33', '33', '33', '33', '33', '33', NULL, NULL, '33', '33', '33', '33', 1, 1, '3', '1', '2', '3', '3', '3', '2024-07-07 16:37:51', '2024-07-07 16:37:51'),
(5, 'grey', '333', '333', '1', 'domestic', '33', NULL, '33', '33', '33', '33', '544.5', '33', '33', '66', '35937', '33', '33', '83.82000000000001', '33', '33', '3', '1', '0.12', '3', '5', '1.6', '35942.12', '1', '33', '1', '333', '33', '33', '33', '33', '33', '33', '33', '1', '33', '33', '33', '33', '33', '33', NULL, NULL, '33', '33', '33', '33', 1, 1, '3', '1', '2', '3', '3', '3', '2024-07-07 16:38:06', '2024-07-07 16:38:06'),
(6, 'grey', '333', '333', '1', 'domestic', '33', NULL, '33', '33', '33', '33', '544.5', '33', '33', '66', '35937', '33', '33', '83.82000000000001', '33', '33', '3', '1', '0.12', '3', '5', '1.6', '35942.12', '1', '33', '1', '333', '33', '33', '33', '33', '33', '33', '33', '1', '33', '33', '33', '33', '33', '33', NULL, NULL, '33', '33', '33', '33', 1, 1, '3', '1', '2', '3', '3', '3', '2024-07-07 16:39:00', '2024-07-07 16:39:00'),
(7, 'grey', '333', '333', '1', 'domestic', '33', NULL, '33', '33', '33', '33', '544.5', '33', '33', '66', '35937', '33', '33', NULL, '33', '33', '3', '1', '0.12', '3', '5', '1.6', '35942.12', NULL, '33', '1', '333', '33', '33', '33', '33', '33', '33', '33', '1', '33', '33', '33', '33', '33', '33', NULL, NULL, '33', '33', '33', '33', 1, 1, '3', '1', '2', '3', '3', '3', '2024-07-07 16:40:59', '2024-07-07 17:05:00'),
(8, 'grey', '1-red', '1', '2', 'export', '11', NULL, '11', '11', '11', '11', '60.5', '11', '11', '22', '1331', '1', '11', NULL, '11', '11', '3', '1', '0.12', '3', '5', '1.6', '1336.12', NULL, '111', NULL, '112', '22', '222', '22', '22', '22', '22', '22', NULL, '22', '22', '22', '22', '22', '22', NULL, NULL, NULL, '22', '22', '22', 0, 1, '66', '1', '2', '3', '22', '66', '2024-07-10 14:58:27', '2024-07-10 14:58:27'),
(9, 'grey', '333-aaaa', '333', '1', 'domestic', '33', NULL, '33', '33', '33', '33', '544.5', '33', '33', '66', '35937', '33', '33', NULL, '33', '33', '3', '1', '0.12', '3', '5', '1.6', '35942.12', NULL, '33', '1', '333', '33', '33', '33', '33', '33', '33', '33', '1', '33', '33', '33', '33', '33', '33', NULL, NULL, '33', '33', '33', '33', 1, 1, '3', '1', '2', '3', '3', '3', '2024-07-10 15:09:59', '2024-07-10 15:09:59'),
(10, 'grey', '333-aaaa', '333', '1', 'domestic', '33', NULL, '33', '33', '33', '33', '544.5', '33', '33', '66', '35937', '33', '33', NULL, '33', '33', '3', '1', '0.12', '3', '5', '1.6', '35942.12', NULL, '33', '1', '333', '33', '33', '33', '33', '33', '33', '33', '1', '33', '33', '33', '33', '33', '33', NULL, NULL, '33', '33', '33', '33', 1, 1, '3', '1', '2', '3', '3', '3', '2024-07-10 15:18:12', '2024-07-10 15:18:12');

-- --------------------------------------------------------

--
-- Structure de la table `sort_warp`
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
-- Déchargement des données de la table `sort_warp`
--

INSERT INTO `sort_warp` (`id`, `sort`, `warp_pattern`, `warp_material`, `warp_shrinkage`, `warp_total_ends`, `warp_grams_meters`, `created_at`, `updated_at`) VALUES
(1, 1, '25555', '1', '22', '1336.12', '0.0005', '2024-07-06 16:32:22', '2024-07-06 16:32:22'),
(2, 7, '21', '1', '3', NULL, '0.0121', '2024-07-07 16:40:59', '2024-07-07 17:07:23'),
(3, 7, '22', '1', '4', NULL, '0.0123', '2024-07-07 16:40:59', '2024-07-07 17:07:23'),
(4, 7, '23', '1', '5', NULL, '0.0124', '2024-07-07 16:40:59', '2024-07-07 17:07:23'),
(5, 7, '24', '1', '3', NULL, '0.0121', '2024-07-07 17:05:00', '2024-07-07 17:07:23'),
(6, 7, '25', '1', '4', NULL, '0.0123', '2024-07-07 17:05:00', '2024-07-07 17:07:23'),
(7, 7, '26', '1', '5', NULL, '0.0124', '2024-07-07 17:05:00', '2024-07-07 17:07:23'),
(8, 7, '27', '1', '27', '27', '0.0150', '2024-07-07 17:07:23', '2024-07-07 17:07:23'),
(9, 9, '25555', '1', '22', '1336.12', '0.0005', '2024-07-10 15:09:59', '2024-07-10 15:09:59'),
(10, 9, '25555', '1', '22', '1336.12', '0.0005', '2024-07-10 15:09:59', '2024-07-10 15:09:59'),
(11, 9, '25555', '1', '22', '1336.12', '0.0005', '2024-07-10 15:09:59', '2024-07-10 15:09:59'),
(12, 9, '25555', '1', '22', '1336.12', '0.0005', '2024-07-10 15:09:59', '2024-07-10 15:09:59'),
(13, 9, '25555', '1', '22', '1336.12', '0.0005', '2024-07-10 15:09:59', '2024-07-10 15:09:59'),
(14, 9, '25555', '1', '22', '1336.12', '0.0005', '2024-07-10 15:09:59', '2024-07-10 15:09:59'),
(15, 9, '25555', '1', '22', '1336.12', '0.0005', '2024-07-10 15:09:59', '2024-07-10 15:09:59'),
(16, 10, '21', '1', '3', NULL, '0.0121', '2024-07-10 15:18:12', '2024-07-10 15:18:12'),
(17, 10, '22', '1', '4', NULL, '0.0123', '2024-07-10 15:18:12', '2024-07-10 15:18:12'),
(18, 10, '23', '1', '5', NULL, '0.0124', '2024-07-10 15:18:12', '2024-07-10 15:18:12'),
(19, 10, '24', '1', '3', NULL, '0.0121', '2024-07-10 15:18:12', '2024-07-10 15:18:12'),
(20, 10, '25', '1', '4', NULL, '0.0123', '2024-07-10 15:18:12', '2024-07-10 15:18:12'),
(21, 10, '26', '1', '5', NULL, '0.0124', '2024-07-10 15:18:12', '2024-07-10 15:18:12'),
(22, 10, '27', '1', '27', '27', '0.0150', '2024-07-10 15:18:12', '2024-07-10 15:18:12');

-- --------------------------------------------------------

--
-- Structure de la table `sort_weft`
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
-- Déchargement des données de la table `sort_weft`
--

INSERT INTO `sort_weft` (`id`, `sort`, `weft_pattern`, `weft_material`, `weft_shrinkage`, `weft_picks`, `weft_grams_meters`, `created_at`, `updated_at`) VALUES
(1, 1, '22', '1', '33', '1', '0.0273', '2024-07-06 16:32:22', '2024-07-06 16:32:22'),
(2, 7, '66', '1', '6', '33', '2.1567', '2024-07-07 16:40:59', '2024-07-07 16:40:59'),
(3, 7, '77', '1', '7', '33', '2.1771', '2024-07-07 16:40:59', '2024-07-07 16:40:59'),
(4, 7, '88', '1', '8', '33', '2.1974', '2024-07-07 16:40:59', '2024-07-07 16:40:59'),
(5, 7, '66', '1', '6', '33', '2.1567', '2024-07-07 17:05:00', '2024-07-07 17:05:00'),
(6, 7, '77', '1', '7', '33', '2.1771', '2024-07-07 17:05:00', '2024-07-07 17:05:00'),
(7, 7, '88', '1', '8', '33', '2.1974', '2024-07-07 17:05:00', '2024-07-07 17:05:00'),
(8, 9, '22', '1', '33', '1', '0.0273', '2024-07-10 15:09:59', '2024-07-10 15:09:59'),
(9, 9, '22', '1', '33', '1', '0.0273', '2024-07-10 15:09:59', '2024-07-10 15:09:59'),
(10, 9, '22', '1', '33', '1', '0.0273', '2024-07-10 15:09:59', '2024-07-10 15:09:59'),
(11, 9, '22', '1', '33', '1', '0.0273', '2024-07-10 15:09:59', '2024-07-10 15:09:59'),
(12, 9, '22', '1', '33', '1', '0.0273', '2024-07-10 15:09:59', '2024-07-10 15:09:59'),
(13, 9, '22', '1', '33', '1', '0.0273', '2024-07-10 15:09:59', '2024-07-10 15:09:59'),
(14, 10, '66', '1', '6', '33', '2.1567', '2024-07-10 15:18:12', '2024-07-10 15:18:12'),
(15, 10, '77', '1', '7', '33', '2.1771', '2024-07-10 15:18:12', '2024-07-10 15:18:12'),
(16, 10, '88', '1', '8', '33', '2.1974', '2024-07-10 15:18:12', '2024-07-10 15:18:12'),
(17, 10, '66', '1', '6', '33', '2.1567', '2024-07-10 15:18:12', '2024-07-10 15:18:12'),
(18, 10, '77', '1', '7', '33', '2.1771', '2024-07-10 15:18:12', '2024-07-10 15:18:12'),
(19, 10, '88', '1', '8', '33', '2.1974', '2024-07-10 15:18:12', '2024-07-10 15:18:12');

-- --------------------------------------------------------

--
-- Structure de la table `sourcing_executives`
--

CREATE TABLE `sourcing_executives` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Déchargement des données de la table `sourcing_executives`
--

INSERT INTO `sourcing_executives` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Sourc', 1, '2024-07-05 10:00:45', '2024-07-06 10:02:51');

-- --------------------------------------------------------

--
-- Structure de la table `so_types`
--

CREATE TABLE `so_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Déchargement des données de la table `so_types`
--

INSERT INTO `so_types` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'card', 1, '2024-07-05 10:00:45', '2024-07-05 13:26:19');

-- --------------------------------------------------------

--
-- Structure de la table `states`
--

CREATE TABLE `states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Déchargement des données de la table `states`
--

INSERT INTO `states` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'state1', 1, '2024-07-07 08:52:05', '2024-07-07 08:52:05'),
(2, 'state2', 1, '2024-07-07 08:52:14', '2024-07-07 08:52:14');

-- --------------------------------------------------------

--
-- Structure de la table `terms_conditions`
--

CREATE TABLE `terms_conditions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Déchargement des données de la table `terms_conditions`
--

INSERT INTO `terms_conditions` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'card', 1, '2024-07-05 10:00:45', '2024-07-05 13:26:19');

-- --------------------------------------------------------

--
-- Structure de la table `tpms`
--

CREATE TABLE `tpms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Déchargement des données de la table `tpms`
--

INSERT INTO `tpms` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'TPm 1', 1, '2024-07-05 10:00:45', '2024-07-07 08:45:05'),
(2, 'TPM 2', 1, '2024-07-07 08:45:10', '2024-07-07 08:45:10');

-- --------------------------------------------------------

--
-- Structure de la table `transportations`
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
-- Déchargement des données de la table `transportations`
--

INSERT INTO `transportations` (`id`, `name`, `contact`, `address`, `gst`, `remark`, `created_at`, `updated_at`) VALUES
(1, 'trs 1', 'contact 1', 'adress 1', '', '', NULL, NULL),
(2, 'trs 2', 'contact 2', 'adress 2', '', '', NULL, NULL),
(3, 'trs 3', 'contact 3', 'adress 3', '', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Déchargement des données de la table `units`
--

INSERT INTO `units` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'unit 1', 1, '2024-07-05 10:00:45', '2024-07-05 13:26:19');

-- --------------------------------------------------------

--
-- Structure de la table `uom`
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
-- Déchargement des données de la table `uom`
--

INSERT INTO `uom` (`id`, `code`, `description`, `to_meter`, `type`, `status`, `created_at`, `updated_at`) VALUES
(1, 'YOM1', '', '5', 'fabric', 1, '2024-07-06 15:00:29', '2024-07-06 15:00:29'),
(2, 'UOM2', '', '10', 'yarn_unit', 1, '2024-07-06 15:00:42', '2024-07-06 15:00:42'),
(3, 'UOM3', '', '5', 'other_item', 1, '2024-07-06 15:08:44', '2024-07-06 15:08:44');

-- --------------------------------------------------------

--
-- Structure de la table `users`
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
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@demo.com', NULL, '$2y$12$3prcrLIyhvZ15jcqiMvRG.4AiDJALjPzFFEcOCIQqNmv8yk8yV6gO', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `variety`
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
-- Déchargement des données de la table `variety`
--

INSERT INTO `variety` (`id`, `name`, `code`, `status`, `created_at`, `updated_at`) VALUES
(1, 'VARIETY1', 'VRT1', 1, '2024-07-06 15:01:24', '2024-07-06 15:01:24'),
(2, 'VARIETY2', 'VRT2', 1, '2024-07-06 15:01:34', '2024-07-06 15:01:34');

-- --------------------------------------------------------

--
-- Structure de la table `vendors`
--

CREATE TABLE `vendors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `prefix` varchar(255) DEFAULT NULL,
  `contact_name` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `landline` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `state_id` varchar(255) DEFAULT NULL,
  `city_id` varchar(255) DEFAULT NULL,
  `pin` varchar(255) DEFAULT NULL,
  `fax` varchar(255) DEFAULT NULL,
  `gstn` varchar(255) DEFAULT NULL,
  `rating` varchar(255) DEFAULT NULL,
  `preference` varchar(255) DEFAULT NULL,
  `interest` varchar(255) DEFAULT NULL,
  `gst_reg_type` varchar(255) DEFAULT NULL,
  `vendor_group_id` varchar(255) DEFAULT NULL,
  `pan` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `account_group` varchar(255) DEFAULT NULL,
  `is_tds` tinyint(1) DEFAULT NULL,
  `deductee_type` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Déchargement des données de la table `vendors`
--

INSERT INTO `vendors` (`id`, `name`, `prefix`, `contact_name`, `contact`, `landline`, `email`, `state_id`, `city_id`, `pin`, `fax`, `gstn`, `rating`, `preference`, `interest`, `gst_reg_type`, `vendor_group_id`, `pan`, `address`, `account_group`, `is_tds`, `deductee_type`, `status`, `created_at`, `updated_at`) VALUES
(1, 'AAAA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `vendor_groups`
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
-- Déchargement des données de la table `vendor_groups`
--

INSERT INTO `vendor_groups` (`id`, `group`, `group_type`, `code`, `is_internal`, `status`, `created_at`, `updated_at`) VALUES
(1, 'VG1', NULL, NULL, 0, 1, NULL, NULL),
(2, 'VG2', NULL, NULL, 0, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `weaves`
--

CREATE TABLE `weaves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `no_of_heald_frame` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Déchargement des données de la table `weaves`
--

INSERT INTO `weaves` (`id`, `name`, `no_of_heald_frame`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Weave1', '2', 1, '2024-07-06 16:08:47', '2024-07-06 16:08:47'),
(2, 'Weave2', '5', 1, '2024-07-06 16:08:55', '2024-07-06 16:08:55');

-- --------------------------------------------------------

--
-- Structure de la table `weave_factors`
--

CREATE TABLE `weave_factors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Déchargement des données de la table `weave_factors`
--

INSERT INTO `weave_factors` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'weave', 0, '2024-07-05 10:00:45', '2024-07-06 10:06:36');

-- --------------------------------------------------------

--
-- Structure de la table `weave_types`
--

CREATE TABLE `weave_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Structure de la table `yarns`
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
-- Déchargement des données de la table `yarns`
--

INSERT INTO `yarns` (`id`, `count`, `ply`, `type`, `unit`, `variety`, `filaments`, `tpm`, `color`, `reorder`, `buy_uom`, `blend`, `danger`, `name`, `display_name`, `conversion`, `hsn`, `igst`, `cgst`, `sgst`, `cess`, `is_apply`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 3, 1, '1', 1, '2', '1', '2', 'aaa', '3', '1', 'aaaa', '8/1 UOM2 TYPE1 VRT1 green', '8/1 UOM2 TYPE1 VRT1 green', '1800', '5', '1', '3', '2', '30', 1, 1, '2024-07-06 15:24:42', '2024-07-07 13:01:58');

-- --------------------------------------------------------

--
-- Structure de la table `yarn_certification_types`
--

CREATE TABLE `yarn_certification_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Déchargement des données de la table `yarn_certification_types`
--

INSERT INTO `yarn_certification_types` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'card', 1, '2024-07-05 10:00:45', '2024-07-05 13:26:19');

-- --------------------------------------------------------

--
-- Structure de la table `yarn_count_rate_contents`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `yarn_inwards`
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
  `is_jobwork_order` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Déchargement des données de la table `yarn_inwards`
--

INSERT INTO `yarn_inwards` (`id`, `created_at`, `updated_at`, `date`, `transportation_details`, `vendor_group_id`, `gate_pass_no`, `gate_pass_date`, `taxable_amount`, `location_id`, `purchase_order_id`, `agent_id`, `sale_order_id`, `vehicle_number`, `receipt_number`, `remarks`, `lorry_no`, `lorry_weight`, `lorry_empty_weight`, `is_jobwork_order`) VALUES
(3, '2024-07-21 22:21:16', '2024-07-21 22:21:16', '2024-07-06', '33', 1, '33', '2024-07-27', 33, 1, 2, 1, 13, '33', '3', '33', '33', 33, 33, 1);

-- --------------------------------------------------------

--
-- Structure de la table `yarn_inward_details`
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
-- Déchargement des données de la table `yarn_inward_details`
--

INSERT INTO `yarn_inward_details` (`id`, `created_at`, `updated_at`, `yarn_inward_id`, `yarn_id`, `mill_id`, `total_no_of_bags`, `kgs_per_bag`, `cones_per_bag`, `total_cones`, `total_kgs`, `rate_per_kg`, `basic_amount`, `gross_weight`) VALUES
(3, '2024-07-21 22:21:16', '2024-07-21 22:21:16', 3, 1, 1, 33, 33, 33, 33, 33, 33, 33, 33);

-- --------------------------------------------------------

--
-- Structure de la table `yarn_inward_detail_lots`
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
-- Déchargement des données de la table `yarn_inward_detail_lots`
--

INSERT INTO `yarn_inward_detail_lots` (`id`, `created_at`, `updated_at`, `yarn_inward_detail_id`, `cone_tip_color_id`, `lot_no`, `no_of_bags`, `kgs_per_bag`, `totalkgs`, `cones_per_bag`) VALUES
(3, '2024-07-21 22:30:29', '2024-07-21 22:30:29', 3, 1, 'a', 22, 22, 22, 22),
(4, '2024-07-21 22:30:29', '2024-07-21 22:30:29', 3, 3, '55', 55, 55, 55, 55);

-- --------------------------------------------------------

--
-- Structure de la table `yarn_pos`
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
  `yarn_type_id` int(11) DEFAULT NULL,
  `delivery_term_id` int(11) DEFAULT NULL,
  `purchase_type_id` int(11) DEFAULT NULL,
  `approval` int(1) DEFAULT NULL,
  `approval_date` date DEFAULT NULL,
  `internal_remark` varchar(250) DEFAULT NULL,
  `customer_instruction` varchar(250) DEFAULT NULL,
  `comments` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Déchargement des données de la table `yarn_pos`
--

INSERT INTO `yarn_pos` (`id`, `po_number`, `created_at`, `updated_at`, `po_date`, `vendor_group_id`, `igst`, `cgst_sgst`, `agent_id`, `manual_po_number`, `certification_type_id`, `po_type_id`, `pr_num_id`, `so_num_id`, `payment_terms_id`, `vendor_id`, `terms_conditions_id`, `remark`, `consignee_id`, `yarn_type_id`, `delivery_term_id`, `purchase_type_id`, `approval`, `approval_date`, `internal_remark`, `customer_instruction`, `comments`) VALUES
(2, 'YPO-2', '2024-07-16 15:57:42', '2024-07-17 17:39:15', '2024-07-18', 1, 0, NULL, 1, 11, NULL, 1, NULL, NULL, 2, 1, NULL, NULL, NULL, NULL, NULL, 1, -1, '2024-07-17', 'azaz', 'zaaa', 'asqsaz');

-- --------------------------------------------------------

--
-- Structure de la table `yarn_po_details`
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
  `total_amount` double DEFAULT NULL,
  `provisional_freight` double DEFAULT NULL,
  `mill_gst_price` double DEFAULT NULL,
  `final_price` double DEFAULT NULL,
  `delivery_date` date DEFAULT NULL,
  `csp_id` int(11) DEFAULT NULL,
  `hairiness_index_h_id` int(11) DEFAULT NULL,
  `count_cv_id` int(11) DEFAULT NULL,
  `strenght_cv_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Déchargement des données de la table `yarn_po_details`
--

INSERT INTO `yarn_po_details` (`id`, `yarn_po_id`, `created_at`, `updated_at`, `count_id`, `cones_per_bag`, `kg_per_bag`, `cone_weight`, `mill_name_id`, `no_of_bags`, `quantity`, `mill_price`, `basic_amount`, `igst_val`, `cgst_val`, `sgst_val`, `total_amount`, `provisional_freight`, `mill_gst_price`, `final_price`, `delivery_date`, `csp_id`, `hairiness_index_h_id`, `count_cv_id`, `strenght_cv_id`) VALUES
(1, NULL, '2024-07-05 10:00:45', '2024-07-16 16:53:58', 1, NULL, 22, NULL, 1, NULL, 3, 3, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 2, '2024-07-16 15:57:42', '2024-07-16 16:30:17', 1, NULL, 1, NULL, 1, 15, 11, 1, NULL, 1, 3, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 2, '2024-07-17 14:54:03', '2024-07-17 14:54:03', 1, NULL, 5, NULL, 1, NULL, 5, 5, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `yarn_processing_contracts`
--

CREATE TABLE `yarn_processing_contracts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Structure de la table `yarn_processing_contract_issues`
--

CREATE TABLE `yarn_processing_contract_issues` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Structure de la table `yarn_processing_receives`
--

CREATE TABLE `yarn_processing_receives` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Structure de la table `yarn_processing_returns`
--

CREATE TABLE `yarn_processing_returns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Structure de la table `yarn_types`
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
-- Déchargement des données de la table `yarn_types`
--

INSERT INTO `yarn_types` (`id`, `type`, `unit`, `factor`, `loss`, `system`, `code`, `status`, `created_at`, `updated_at`) VALUES
(1, 'TYPE1', 2, '1', '10', 'direct', 'TYPE1', 1, '2024-07-06 15:02:11', '2024-07-06 15:02:11'),
(2, 'YRNTYPE2', 2, '4', '4', 'direct', 'YRNTYPE2', 1, '2024-07-06 15:02:38', '2024-07-06 15:02:38');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `bale_packings`
--
ALTER TABLE `bale_packings`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `bale_packing_details`
--
ALTER TABLE `bale_packing_details`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `beam_inwards`
--
ALTER TABLE `beam_inwards`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `beam_inward_details`
--
ALTER TABLE `beam_inward_details`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `beam_outwards`
--
ALTER TABLE `beam_outwards`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `beam_outward_details`
--
ALTER TABLE `beam_outward_details`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `beam_receive_from_weavers`
--
ALTER TABLE `beam_receive_from_weavers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `blends`
--
ALTER TABLE `blends`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `buyers`
--
ALTER TABLE `buyers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `buyer_representatives`
--
ALTER TABLE `buyer_representatives`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Index pour la table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Index pour la table `certifications`
--
ALTER TABLE `certifications`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `checks`
--
ALTER TABLE `checks`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cloth_challans`
--
ALTER TABLE `cloth_challans`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cloth_challan_details`
--
ALTER TABLE `cloth_challan_details`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `consignees`
--
ALTER TABLE `consignees`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `container_sizes`
--
ALTER TABLE `container_sizes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `contracts`
--
ALTER TABLE `contracts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `coparts`
--
ALTER TABLE `coparts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `costings`
--
ALTER TABLE `costings`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `counts`
--
ALTER TABLE `counts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `delivery_terms`
--
ALTER TABLE `delivery_terms`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `domestic_buyers`
--
ALTER TABLE `domestic_buyers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `domestic_buyer_representatives`
--
ALTER TABLE `domestic_buyer_representatives`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `employes`
--
ALTER TABLE `employes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `filaments`
--
ALTER TABLE `filaments`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `godown_locations`
--
ALTER TABLE `godown_locations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `g_s_t_s`
--
ALTER TABLE `g_s_t_s`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `inspections`
--
ALTER TABLE `inspections`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `inspection_details`
--
ALTER TABLE `inspection_details`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `inspection_detail_variations`
--
ALTER TABLE `inspection_detail_variations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `inspection_types`
--
ALTER TABLE `inspection_types`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `invoice_additionals`
--
ALTER TABLE `invoice_additionals`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `invoice_discounts`
--
ALTER TABLE `invoice_discounts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `invoice_others`
--
ALTER TABLE `invoice_others`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `invoice_settings`
--
ALTER TABLE `invoice_settings`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Index pour la table `jobwork_fabric_receives`
--
ALTER TABLE `jobwork_fabric_receives`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `jobwork_fabric_receive_details`
--
ALTER TABLE `jobwork_fabric_receive_details`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `jobwork_finished_fabric_receives`
--
ALTER TABLE `jobwork_finished_fabric_receives`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `jobwork_finished_fabric_receive_details`
--
ALTER TABLE `jobwork_finished_fabric_receive_details`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `jobwork_process_contracts`
--
ALTER TABLE `jobwork_process_contracts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `jobwork_process_contract_details`
--
ALTER TABLE `jobwork_process_contract_details`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `jobwork_process_contract_issues`
--
ALTER TABLE `jobwork_process_contract_issues`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `jobwork_process_contract_issue_details`
--
ALTER TABLE `jobwork_process_contract_issue_details`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `jobwork_weaving_contracts`
--
ALTER TABLE `jobwork_weaving_contracts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `jobwork_weaving_contract_orders`
--
ALTER TABLE `jobwork_weaving_contract_orders`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `jobwork_weaving_weft_issues`
--
ALTER TABLE `jobwork_weaving_weft_issues`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `jobwork_weaving_weft_issue_details`
--
ALTER TABLE `jobwork_weaving_weft_issue_details`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `loom_types`
--
ALTER TABLE `loom_types`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `machines`
--
ALTER TABLE `machines`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `mills`
--
ALTER TABLE `mills`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `packings`
--
ALTER TABLE `packings`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `packing_types`
--
ALTER TABLE `packing_types`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `paper_tube_sizes`
--
ALTER TABLE `paper_tube_sizes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `payment_terms`
--
ALTER TABLE `payment_terms`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `payment_types`
--
ALTER TABLE `payment_types`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ply`
--
ALTER TABLE `ply`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ports`
--
ALTER TABLE `ports`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `po_types`
--
ALTER TABLE `po_types`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `pre_carriage`
--
ALTER TABLE `pre_carriage`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `processes`
--
ALTER TABLE `processes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `process_returns`
--
ALTER TABLE `process_returns`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `prs`
--
ALTER TABLE `prs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `purchase_returns`
--
ALTER TABLE `purchase_returns`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `purchase_types`
--
ALTER TABLE `purchase_types`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `qualities`
--
ALTER TABLE `qualities`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reasons`
--
ALTER TABLE `reasons`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sales_co_ordinators`
--
ALTER TABLE `sales_co_ordinators`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sales_orders`
--
ALTER TABLE `sales_orders`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sales_order_details`
--
ALTER TABLE `sales_order_details`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sales_order_sub_details`
--
ALTER TABLE `sales_order_sub_details`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sales_order_yarn_certifications`
--
ALTER TABLE `sales_order_yarn_certifications`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sales_types`
--
ALTER TABLE `sales_types`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sale_returns`
--
ALTER TABLE `sale_returns`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `selvedge`
--
ALTER TABLE `selvedge`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Index pour la table `set_single_doubles`
--
ALTER TABLE `set_single_doubles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `shades`
--
ALTER TABLE `shades`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `shade_warps`
--
ALTER TABLE `shade_warps`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `shade_wefts`
--
ALTER TABLE `shade_wefts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `shipping_terms`
--
ALTER TABLE `shipping_terms`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sizing_plans`
--
ALTER TABLE `sizing_plans`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sizing_plan_beams`
--
ALTER TABLE `sizing_plan_beams`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sizing_plan_yarns`
--
ALTER TABLE `sizing_plan_yarns`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sizing_yarn_issues`
--
ALTER TABLE `sizing_yarn_issues`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sizing_yarn_issue_details`
--
ALTER TABLE `sizing_yarn_issue_details`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sorts`
--
ALTER TABLE `sorts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sort_warp`
--
ALTER TABLE `sort_warp`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sort_weft`
--
ALTER TABLE `sort_weft`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sourcing_executives`
--
ALTER TABLE `sourcing_executives`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `so_types`
--
ALTER TABLE `so_types`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `terms_conditions`
--
ALTER TABLE `terms_conditions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tpms`
--
ALTER TABLE `tpms`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `transportations`
--
ALTER TABLE `transportations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `uom`
--
ALTER TABLE `uom`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Index pour la table `variety`
--
ALTER TABLE `variety`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `vendor_groups`
--
ALTER TABLE `vendor_groups`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `weaves`
--
ALTER TABLE `weaves`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `weave_factors`
--
ALTER TABLE `weave_factors`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `weave_types`
--
ALTER TABLE `weave_types`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `yarns`
--
ALTER TABLE `yarns`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `yarn_certification_types`
--
ALTER TABLE `yarn_certification_types`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `yarn_count_rate_contents`
--
ALTER TABLE `yarn_count_rate_contents`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `yarn_inwards`
--
ALTER TABLE `yarn_inwards`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `yarn_inward_details`
--
ALTER TABLE `yarn_inward_details`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `yarn_inward_detail_lots`
--
ALTER TABLE `yarn_inward_detail_lots`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `yarn_pos`
--
ALTER TABLE `yarn_pos`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `yarn_po_details`
--
ALTER TABLE `yarn_po_details`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `yarn_processing_contracts`
--
ALTER TABLE `yarn_processing_contracts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `yarn_processing_contract_issues`
--
ALTER TABLE `yarn_processing_contract_issues`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `yarn_processing_receives`
--
ALTER TABLE `yarn_processing_receives`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `yarn_processing_returns`
--
ALTER TABLE `yarn_processing_returns`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `yarn_types`
--
ALTER TABLE `yarn_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `agents`
--
ALTER TABLE `agents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `bale_packings`
--
ALTER TABLE `bale_packings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `bale_packing_details`
--
ALTER TABLE `bale_packing_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `beam_inwards`
--
ALTER TABLE `beam_inwards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `beam_inward_details`
--
ALTER TABLE `beam_inward_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `beam_outwards`
--
ALTER TABLE `beam_outwards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `beam_outward_details`
--
ALTER TABLE `beam_outward_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `beam_receive_from_weavers`
--
ALTER TABLE `beam_receive_from_weavers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `blends`
--
ALTER TABLE `blends`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `buyers`
--
ALTER TABLE `buyers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `buyer_representatives`
--
ALTER TABLE `buyer_representatives`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `certifications`
--
ALTER TABLE `certifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `checks`
--
ALTER TABLE `checks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `cloth_challans`
--
ALTER TABLE `cloth_challans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `cloth_challan_details`
--
ALTER TABLE `cloth_challan_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `consignees`
--
ALTER TABLE `consignees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `container_sizes`
--
ALTER TABLE `container_sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `contracts`
--
ALTER TABLE `contracts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `coparts`
--
ALTER TABLE `coparts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `costings`
--
ALTER TABLE `costings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `counts`
--
ALTER TABLE `counts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `delivery_terms`
--
ALTER TABLE `delivery_terms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `domestic_buyers`
--
ALTER TABLE `domestic_buyers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `domestic_buyer_representatives`
--
ALTER TABLE `domestic_buyer_representatives`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `employes`
--
ALTER TABLE `employes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `filaments`
--
ALTER TABLE `filaments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `godown_locations`
--
ALTER TABLE `godown_locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `g_s_t_s`
--
ALTER TABLE `g_s_t_s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `inspections`
--
ALTER TABLE `inspections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `inspection_details`
--
ALTER TABLE `inspection_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `inspection_detail_variations`
--
ALTER TABLE `inspection_detail_variations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `inspection_types`
--
ALTER TABLE `inspection_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `invoice_additionals`
--
ALTER TABLE `invoice_additionals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `invoice_discounts`
--
ALTER TABLE `invoice_discounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `invoice_others`
--
ALTER TABLE `invoice_others`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `invoice_settings`
--
ALTER TABLE `invoice_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `jobwork_fabric_receives`
--
ALTER TABLE `jobwork_fabric_receives`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `jobwork_fabric_receive_details`
--
ALTER TABLE `jobwork_fabric_receive_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `jobwork_finished_fabric_receives`
--
ALTER TABLE `jobwork_finished_fabric_receives`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `jobwork_finished_fabric_receive_details`
--
ALTER TABLE `jobwork_finished_fabric_receive_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `jobwork_process_contracts`
--
ALTER TABLE `jobwork_process_contracts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `jobwork_process_contract_details`
--
ALTER TABLE `jobwork_process_contract_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `jobwork_process_contract_issues`
--
ALTER TABLE `jobwork_process_contract_issues`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `jobwork_process_contract_issue_details`
--
ALTER TABLE `jobwork_process_contract_issue_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `jobwork_weaving_contracts`
--
ALTER TABLE `jobwork_weaving_contracts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `jobwork_weaving_contract_orders`
--
ALTER TABLE `jobwork_weaving_contract_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `jobwork_weaving_weft_issues`
--
ALTER TABLE `jobwork_weaving_weft_issues`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `jobwork_weaving_weft_issue_details`
--
ALTER TABLE `jobwork_weaving_weft_issue_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `loom_types`
--
ALTER TABLE `loom_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `machines`
--
ALTER TABLE `machines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT pour la table `mills`
--
ALTER TABLE `mills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `packings`
--
ALTER TABLE `packings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `packing_types`
--
ALTER TABLE `packing_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `paper_tube_sizes`
--
ALTER TABLE `paper_tube_sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `payment_terms`
--
ALTER TABLE `payment_terms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `payment_types`
--
ALTER TABLE `payment_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `ply`
--
ALTER TABLE `ply`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `ports`
--
ALTER TABLE `ports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `po_types`
--
ALTER TABLE `po_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `pre_carriage`
--
ALTER TABLE `pre_carriage`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `processes`
--
ALTER TABLE `processes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `process_returns`
--
ALTER TABLE `process_returns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `prs`
--
ALTER TABLE `prs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `purchase_returns`
--
ALTER TABLE `purchase_returns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `purchase_types`
--
ALTER TABLE `purchase_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `qualities`
--
ALTER TABLE `qualities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `reasons`
--
ALTER TABLE `reasons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sales_co_ordinators`
--
ALTER TABLE `sales_co_ordinators`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `sales_orders`
--
ALTER TABLE `sales_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `sales_order_details`
--
ALTER TABLE `sales_order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `sales_order_sub_details`
--
ALTER TABLE `sales_order_sub_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `sales_order_yarn_certifications`
--
ALTER TABLE `sales_order_yarn_certifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `sales_types`
--
ALTER TABLE `sales_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sale_returns`
--
ALTER TABLE `sale_returns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `selvedge`
--
ALTER TABLE `selvedge`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `set_single_doubles`
--
ALTER TABLE `set_single_doubles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `shades`
--
ALTER TABLE `shades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `shade_warps`
--
ALTER TABLE `shade_warps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `shade_wefts`
--
ALTER TABLE `shade_wefts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `shipping_terms`
--
ALTER TABLE `shipping_terms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `sizing_plans`
--
ALTER TABLE `sizing_plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `sizing_plan_beams`
--
ALTER TABLE `sizing_plan_beams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `sizing_plan_yarns`
--
ALTER TABLE `sizing_plan_yarns`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT pour la table `sizing_yarn_issues`
--
ALTER TABLE `sizing_yarn_issues`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `sizing_yarn_issue_details`
--
ALTER TABLE `sizing_yarn_issue_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `sorts`
--
ALTER TABLE `sorts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `sort_warp`
--
ALTER TABLE `sort_warp`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `sort_weft`
--
ALTER TABLE `sort_weft`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `sourcing_executives`
--
ALTER TABLE `sourcing_executives`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `so_types`
--
ALTER TABLE `so_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `terms_conditions`
--
ALTER TABLE `terms_conditions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `tpms`
--
ALTER TABLE `tpms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `transportations`
--
ALTER TABLE `transportations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `uom`
--
ALTER TABLE `uom`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `variety`
--
ALTER TABLE `variety`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `vendor_groups`
--
ALTER TABLE `vendor_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `weaves`
--
ALTER TABLE `weaves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `weave_factors`
--
ALTER TABLE `weave_factors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `weave_types`
--
ALTER TABLE `weave_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `yarns`
--
ALTER TABLE `yarns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `yarn_certification_types`
--
ALTER TABLE `yarn_certification_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `yarn_count_rate_contents`
--
ALTER TABLE `yarn_count_rate_contents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `yarn_inwards`
--
ALTER TABLE `yarn_inwards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `yarn_inward_details`
--
ALTER TABLE `yarn_inward_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `yarn_inward_detail_lots`
--
ALTER TABLE `yarn_inward_detail_lots`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `yarn_pos`
--
ALTER TABLE `yarn_pos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `yarn_po_details`
--
ALTER TABLE `yarn_po_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `yarn_processing_contracts`
--
ALTER TABLE `yarn_processing_contracts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `yarn_processing_contract_issues`
--
ALTER TABLE `yarn_processing_contract_issues`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `yarn_processing_receives`
--
ALTER TABLE `yarn_processing_receives`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `yarn_processing_returns`
--
ALTER TABLE `yarn_processing_returns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `yarn_types`
--
ALTER TABLE `yarn_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
