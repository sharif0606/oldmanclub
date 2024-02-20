-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2024 at 04:38 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oldmanclub`
--

-- --------------------------------------------------------

--
-- Table structure for table `address_verifications`
--

CREATE TABLE `address_verifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `id_image` varchar(255) NOT NULL,
  `document` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `address_verifications`
--

INSERT INTO `address_verifications` (`id`, `client_id`, `id_image`, `document`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, '9781708427975.png', '5841708427976.pdf', '2024-02-20 11:19:36', '2024-02-20 11:19:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `client_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, '2024-02-19 08:46:17', '2024-02-19 08:46:17', NULL),
(3, 2, '2024-02-19 09:03:24', '2024-02-19 09:03:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cart_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `price` decimal(10,2) NOT NULL,
  `dis_type` tinyint(4) NOT NULL DEFAULT 1,
  `discount` decimal(10,2) NOT NULL DEFAULT 1.00,
  `sample_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart_items`
--

INSERT INTO `cart_items` (`id`, `cart_id`, `quantity`, `price`, `dis_type`, `discount`, `sample_image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 100.00, 1, 1.00, NULL, '2024-02-19 08:46:17', '2024-02-19 08:46:17', NULL),
(2, 1, 1, 100.00, 1, 1.00, NULL, '2024-02-19 08:46:17', '2024-02-19 08:46:17', NULL),
(5, 3, 1, 100.00, 1, 1.00, NULL, '2024-02-19 09:03:24', '2024-02-19 09:03:24', NULL),
(6, 3, 1, 500.00, 1, 1.00, NULL, '2024-02-19 09:03:24', '2024-02-19 09:03:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `message` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `check_outs`
--

CREATE TABLE `check_outs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cart_data` longtext NOT NULL,
  `client_id` bigint(20) NOT NULL,
  `txnid` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 active, 0 inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `choice_sections`
--

CREATE TABLE `choice_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `feature_list` varchar(255) DEFAULT NULL,
  `video_link` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `choice_sections`
--

INSERT INTO `choice_sections` (`id`, `feature_list`, `video_link`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '[\"Shopping Benefits\",\" Shop & Save at USA\",\" Uk Stores\",\" Avoid paying Us Sales Tax\",\" Deals & Coupons\",\"Top Stores Details\",\" Package Return Services \",\"Guaranteed Pricing\",\" Discounted Carrier Prices\"]', 'U5lCwGLMSYw', '2024-02-13 12:40:11', '2024-02-13 12:40:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `contact_no` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `address_line_1` varchar(255) DEFAULT NULL,
  `address_line_2` varchar(255) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `zip_code` varchar(255) DEFAULT NULL,
  `nationality` varchar(255) DEFAULT NULL,
  `id_no` varchar(255) DEFAULT NULL,
  `id_no_type` varchar(255) DEFAULT NULL COMMENT '0=>Passport, 1=>National ID, 2=>Driver License, 3=>Birth Certificate',
  `image` varchar(255) DEFAULT NULL,
  `cover_photo` varchar(255) DEFAULT NULL,
  `photo_id` varchar(255) DEFAULT NULL,
  `is_photo_verified` int(11) DEFAULT 0 COMMENT '0=>No, 1=>Yes',
  `address_proof_photo` varchar(255) DEFAULT NULL,
  `address_proof_type` int(11) DEFAULT NULL COMMENT '0=>Utility, 1=>Bank Statement, 2=>Printed Letter',
  `is_address_verified` int(11) NOT NULL DEFAULT 0 COMMENT '0=>No, 1=>Yes',
  `is_email_verified` int(11) NOT NULL DEFAULT 0 COMMENT '0=>No, 1=>Yes',
  `is_contact_verified` int(11) NOT NULL DEFAULT 0 COMMENT '0=>No, 1=>Yes',
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1=>active, 0=>inactive',
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `fname`, `middle_name`, `last_name`, `dob`, `contact_no`, `email`, `password`, `address_line_1`, `address_line_2`, `country_id`, `city_id`, `state_id`, `zip_code`, `nationality`, `id_no`, `id_no_type`, `image`, `cover_photo`, `photo_id`, `is_photo_verified`, `address_proof_photo`, `address_proof_type`, `is_address_verified`, `is_email_verified`, `is_contact_verified`, `status`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'jasim', 'uddin', 'uddin', '2000-01-01', '123', 'jasim@gmail.com', '$2y$12$B/YnzBpYaY7QDRICZnV7vOz2gOzeXwRyyhFRg6514Akxyn9K63Cny', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '4991707836139.jpg', '9251707836139.jpg', NULL, 0, NULL, NULL, 0, 0, 0, 1, NULL, '2024-02-13 10:44:46', '2024-02-13 14:55:39', NULL),
(2, 'Kaiser', 'Ahmed', 'Kaiser', NULL, '012', 'kaiser@gmail.com', '$2y$12$rLzC7tGG0b.T9CTnTKlW8OS3ArAmQfHqCjnvYBpZek6rY8ShAY33y', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '9021707923710.jpg', '9611707924492.jpg', NULL, 0, NULL, NULL, 0, 0, 0, 1, NULL, '2024-02-13 12:08:23', '2024-02-14 15:28:12', NULL),
(3, 'Robiul', 'Hossain', 'Robiul', NULL, '01', 'robiul@gmail.com', '$2y$12$qujgVDfGb0z8pkrIAWdjauElizCeBoB6GrO9MxX/Ee2cIMqZp3tGO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 1, NULL, '2024-02-20 15:33:54', '2024-02-20 15:33:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `qrcode` varchar(50) DEFAULT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_logo` varchar(255) NOT NULL,
  `contact_no` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip_code` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `contact_person_name` varchar(255) DEFAULT NULL,
  `contact_person_email` varchar(255) DEFAULT NULL,
  `contact_person_phone` varchar(255) DEFAULT NULL,
  `company_document` varchar(255) NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1 => Pending, 2 => Accepted, 3 => Rejected',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `qrcode`, `company_name`, `company_logo`, `contact_no`, `email`, `phone_number`, `address`, `city`, `state`, `zip_code`, `description`, `contact_person_name`, `contact_person_email`, `contact_person_phone`, `company_document`, `client_id`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'com-409334', 'company', '2081708429323.png', '012', 'company@gmail.com', '014', 'Lorem ipsum dolor sit amet, consectetaur adipisicing elit, sed do eiusmod tempor', 'Chattogram', 'xyz', '4213', 'Lorem ipsum dolor sit amet, consectetaur adipisicing elit, sed do eiusmod tempor', NULL, NULL, NULL, '2891708439335.jpg,7191708439335.jpg,5901708439335.jpg,7921708439335.jpg,3941708439651.png,7761708439651.png,6491708439651.png', 2, 2, '2024-02-20 11:42:03', '2024-02-20 14:34:11', NULL),
(2, 'ABC-384965', 'ABCDEF', '3321708439810.png', '0123', 'abcder@gmail.com', '01', 'Lorem ipsum dolor sit amet, consectetaur adipisicing elit, sed do', 'Dhaka', 'Dhaka', '5213', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. In posuere felis nec tortor. Pellentesque faucibus. Ut accumsan ultricies elit. Maecenas at justo id velit placerat molestie. Donec dictum lectus non odio. Cras a ante vitae enim iaculis aliquam. Mauris nunc quam, venenatis nec, euismod sit amet, egestas placerat, est. Pellentesque habitant morbi tristique', NULL, NULL, NULL, '1721708439810.jpg,9491708439810.jpg,1361708439810.jpg', 2, 2, '2024-02-20 14:36:50', '2024-02-20 14:51:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer_feedback`
--

CREATE TABLE `customer_feedback` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `rate` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `show_hide` int(11) NOT NULL DEFAULT 1 COMMENT '0=>hide 1=>show ',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_feedback`
--

INSERT INTO `customer_feedback` (`id`, `customer_id`, `rate`, `message`, `show_hide`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '4.5*', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took', 1, '2024-02-13 12:05:51', '2024-02-13 12:05:51', NULL),
(2, 2, '4.6*', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took', 1, '2024-02-13 12:10:11', '2024-02-13 12:10:11', NULL),
(3, 1, '4.6*', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took', 1, '2024-02-13 12:14:34', '2024-02-13 12:14:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `design_cards`
--

CREATE TABLE `design_cards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `design_name` varchar(255) DEFAULT NULL,
  `svg` text DEFAULT NULL,
  `template_id` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=>Classic, 2=> Modern, 3=>Flat, 4=>Sleek',
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `design_cards`
--

INSERT INTO `design_cards` (`id`, `design_name`, `svg`, `template_id`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Classic', NULL, 1, 1, NULL, NULL, NULL, NULL),
(2, 'Modern', NULL, 2, 1, NULL, NULL, NULL, NULL),
(3, 'Flat', NULL, 3, 1, NULL, NULL, NULL, NULL),
(4, 'Sleek', NULL, 4, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `division_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_bn` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_bn` varchar(255) DEFAULT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `email_sends`
--

CREATE TABLE `email_sends` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` bigint(20) UNSIGNED NOT NULL,
  `to_email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `global_net_work_images`
--

CREATE TABLE `global_net_work_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `global_net_work_images`
--

INSERT INTO `global_net_work_images` (`id`, `title`, `link`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'NFC Card', 'https://quickpicker.xyz/oldclubman/', '834.png', '2024-02-13 12:17:08', '2024-02-13 12:17:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `header_sections`
--

CREATE TABLE `header_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `text_large` varchar(255) DEFAULT NULL,
  `text_small` text DEFAULT NULL,
  `header_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `header_sections`
--

INSERT INTO `header_sections` (`id`, `text_large`, `text_small`, `header_image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'ONE-DEMAND SHIPPING SERVICE WORLDWIDE', 'Are you looking for a streamlined 3pL eCommerce fullfilment service and warehouse center to support your brand and order fullfilment  fulfyld is the ultimate  third party fullfilment warehousing partner  you can rely on  for a personalized apporoach and efficient fullfilment services.', '852.png', '2024-02-13 12:36:27', '2024-02-13 12:36:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `homepages`
--

CREATE TABLE `homepages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_section_text` varchar(255) NOT NULL,
  `special_offer_text` varchar(255) NOT NULL,
  `special_offer_image` varchar(255) NOT NULL,
  `special_offer_link` varchar(255) NOT NULL,
  `global_network_text` varchar(255) NOT NULL,
  `global_network_image` varchar(255) NOT NULL,
  `customer_feedback_text` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `homepages`
--

INSERT INTO `homepages` (`id`, `service_section_text`, `special_offer_text`, `special_offer_image`, `special_offer_link`, `global_network_text`, `global_network_image`, `customer_feedback_text`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'We understand the demand of growing market and your interest in multiple. There is a lot of my about service but there is  no alternative to your need', 'Welcome to Old club man one of the multiple service companies in Bangladesh. Old club man is a company where customer ideas count and implemented. Where determination creates a new world-class services.', '888.png', '#', 'See old club man everywhere to make it easier for you when you move locations', '671.png', 'These are the stories of our customers who have joined us with great pleasure when using this crazy feature.', '2024-02-13 12:02:12', '2024-02-13 12:02:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `llcservices`
--

CREATE TABLE `llcservices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `feature_list` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `video_link` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `llcservices`
--

INSERT INTO `llcservices` (`id`, `title`, `feature_list`, `image`, `video_link`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Form your LLC with confidence', '[\"A Fully-Formed LLC\",\"Registred Agent Service\",\"Business Address\",\"Bank Account and Cards\",\"Mail Forwarding\",\"Privacy by default\",\"Corporate Guide Service.\"]', '478.png', 'U5lCwGLMSYw', '2024-02-13 12:45:19', '2024-02-13 12:45:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `llc_cardsections`
--

CREATE TABLE `llc_cardsections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `text_large` varchar(255) DEFAULT NULL,
  `text_small` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `contact_text_large` varchar(255) DEFAULT NULL,
  `contact_text_small` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `llc_cardsections`
--

INSERT INTO `llc_cardsections` (`id`, `text_large`, `text_small`, `image`, `contact_text_large`, `contact_text_small`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Sign Up For A Free Business Bank Account With Your USA Company Order', 'Join the thousand of companies that started their business without the hassle. We value our customers with expert guidance alongwith unique benefits including more than $100 cashback from our partners and bank offers.', '884.png', 'Are you interested in Our LLC USA Company?', 'If you want to evolve your digital performance and learn more about how our LLC services can help, get in touch with the team today.', '2024-02-13 12:50:28', '2024-02-13 12:50:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `llc_hero_sections`
--

CREATE TABLE `llc_hero_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `text_large` varchar(255) DEFAULT NULL,
  `text_small` varchar(255) DEFAULT NULL,
  `background_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `llc_hero_sections`
--

INSERT INTO `llc_hero_sections` (`id`, `text_large`, `text_small`, `background_image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Launch and manage your US business from anywhere', 'Apply for an LLC, open a US bank account and start getting paid in USD', '939.jpg', '2024-02-13 12:42:17', '2024-02-13 12:42:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `llc_pricings`
--

CREATE TABLE `llc_pricings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `llcpricing_plan` varchar(255) DEFAULT NULL,
  `llcprice` varchar(255) DEFAULT NULL,
  `llcpricing_package` varchar(255) DEFAULT NULL,
  `llcpricingfeature_list` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `llc_pricings`
--

INSERT INTO `llc_pricings` (`id`, `llcpricing_plan`, `llcprice`, `llcpricing_package`, `llcpricingfeature_list`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Starter Plan', '120', 'LTD Company Package', '[\"Bank accounts\",\"Printed Share Certificate\",\"Digital Company Register\",\"Free Accountancy Consultant\",\"HMRC UTR Number.\"]', '2024-02-13 12:46:18', '2024-02-13 12:46:18', NULL),
(2, 'Basic Plan', '$20', 'LTD Company Package', '[\"Bank accounts\",\"Printed Share Certificate\",\"Digital Company Register\",\"Free Accountancy Consultant\",\"HMRC UTR Number.\"]', '2024-02-13 12:47:03', '2024-02-13 12:47:03', NULL),
(3, 'Premium Plan', '200', 'LTD Company Package', '[\"Bank accounts\",\"Printed Share Certificate\",\"Digital Company Register\",\"Free Accountancy Consultant\",\"HMRC UTR Number.\"]', '2024-02-13 12:47:48', '2024-02-13 12:47:48', NULL),
(4, 'Popular Plan', '120', 'LTD Company Package', '[\"Bank accounts\",\"Printed Share Certificate\",\"Digital Company Register\",\"Free Accountancy Consultant\",\"HMRC UTR Number.\"]', '2024-02-13 12:48:21', '2024-02-13 12:48:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mail_boxes`
--

CREATE TABLE `mail_boxes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `number_of_mail` varchar(255) DEFAULT NULL,
  `validity` varchar(255) DEFAULT NULL,
  `price` decimal(8,2) DEFAULT NULL,
  `package_type` varchar(255) NOT NULL DEFAULT '1' COMMENT '1=>one time, 2=>monthly',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
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
(1, '2011_11_06_051139_create_countries_table', 1),
(2, '2011_11_06_060534_create_divisions_table', 1),
(3, '2011_11_08_050855_create_districts_table', 1),
(4, '2011_11_09_144244_create_upazilas_table', 1),
(5, '2011_11_10_072650_create_thanas_table', 1),
(6, '2013_11_01_070215_create_roles_table', 1),
(7, '2014_10_12_000000_create_users_table', 1),
(8, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(9, '2023_11_12_043129_create_permissions_table', 1),
(10, '2024_01_02_133453_create_clients_table', 1),
(11, '2024_01_05_121923_create_settings_table', 1),
(12, '2024_01_05_145229_create_sliders_table', 1),
(13, '2024_01_06_032524_create_our_services_table', 1),
(14, '2024_01_06_042433_create_homepages_table', 1),
(15, '2024_01_06_054933_create_customer_feedback_table', 1),
(16, '2024_01_06_074858_create_global_net_work_images_table', 1),
(17, '2024_01_08_094246_create_nfc_card_images_table', 1),
(18, '2024_01_09_085437_create_nfc_card_price_sections_table', 1),
(19, '2024_01_09_093553_create_nfc_card_prices_table', 1),
(20, '2024_01_09_104435_create_subscribe_sections_table', 1),
(21, '2024_01_11_082705_create_header_sections_table', 1),
(22, '2024_01_11_091309_create_service_sections_table', 1),
(23, '2024_01_11_102820_create_choice_sections_table', 1),
(24, '2024_01_12_093058_create_llc_hero_sections_table', 1),
(25, '2024_01_12_100513_create_llcservices_table', 1),
(26, '2024_01_12_105727_create_llc_pricings_table', 1),
(27, '2024_01_12_120125_create_llc_cardsections_table', 1),
(28, '2024_01_13_084217_create_phone_number_heroes_table', 1),
(29, '2024_01_13_095314_create_phone_number_services_table', 1),
(30, '2024_01_13_102756_create_phone_virtual_maps_table', 1),
(31, '2024_01_13_105019_create_phone_customer_feedback_table', 1),
(32, '2024_01_13_133611_create_smart_mail_heroes_table', 1),
(33, '2024_01_13_135609_create_smart_work_sections_table', 1),
(34, '2024_01_13_141343_create_smart_sms_services_table', 1),
(35, '2024_01_13_142558_create_smart_phonebook_services_table', 1),
(36, '2024_01_15_092440_create_printing_heroes_table', 1),
(37, '2024_01_15_100723_create_print_video_sections_table', 1),
(38, '2024_01_15_105721_create_print_card_sections_table', 1),
(39, '2024_01_15_112242_create_print_customer_feedback_table', 1),
(40, '2024_01_18_105432_create_chats_table', 1),
(41, '2024_01_21_132307_create_phone_groups_table', 1),
(42, '2024_01_22_085542_create_phone_books_table', 1),
(43, '2024_01_25_103421_create_sms_packages_table', 1),
(44, '2024_01_27_081531_create_mail_boxes_table', 1),
(45, '2024_01_27_092528_create_shippings_table', 1),
(46, '2024_01_27_132106_create_shipping_status_types_table', 1),
(47, '2024_01_27_145710_create_shipping_trackings_table', 1),
(48, '2024_01_29_083524_create_shipping_comments_table', 1),
(49, '2024_01_31_110923_create_email_sends_table', 1),
(50, '2024_02_05_114448_create_nfc_fields_table', 1),
(51, '2024_02_05_116648_create_nfc_cards_table', 1),
(52, '2024_02_06_112507_create_design_cards_table', 1),
(53, '2024_02_06_122244_create_nfc_designs_table', 1),
(54, '2024_02_06_123650_create_nfc_information_table', 1),
(55, '2024_02_06_140343_create_nfc_card_nfc_field_table', 1),
(56, '2024_02_08_150031_create_printing_services_table', 1),
(57, '2024_02_08_150057_create_printing_service_images_table', 1),
(59, '2024_02_09_192936_create_check_outs_table', 1),
(60, '2024_02_12_185955_create_address_verifications_table', 1),
(61, '2024_02_13_171234_create_shipping_addresses_table', 2),
(63, '2024_02_13_174790_create_cart_items_table', 3),
(64, '2024_02_13_180000_create_orders_table', 3),
(65, '2024_02_13_180200_create_payments_table', 3),
(66, '2024_02_14_111759_create_shipping_details_table', 4),
(67, '2024_02_13_174754_create_carts_table', 5),
(71, '2024_02_19_165828_create_companies_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `nfc_cards`
--

CREATE TABLE `nfc_cards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `card_name` varchar(255) DEFAULT NULL,
  `card_type` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=> Work, 2=> Personal',
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nfc_cards`
--

INSERT INTO `nfc_cards` (`id`, `client_id`, `card_name`, `card_type`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, NULL, 1, 1, NULL, '2024-02-13 10:44:46', '2024-02-13 10:44:46', NULL),
(2, 2, NULL, 1, 2, NULL, '2024-02-13 12:08:23', '2024-02-13 12:08:23', NULL),
(3, 3, NULL, 1, 3, NULL, '2024-02-20 15:33:54', '2024-02-20 15:33:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nfc_card_images`
--

CREATE TABLE `nfc_card_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `header_text_large` varchar(255) NOT NULL,
  `header_text_small` text NOT NULL,
  `header_image` varchar(255) NOT NULL,
  `video_link` varchar(255) NOT NULL,
  `feature_list` varchar(255) NOT NULL,
  `feature_image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nfc_card_images`
--

INSERT INTO `nfc_card_images` (`id`, `header_text_large`, `header_text_small`, `header_image`, `video_link`, `feature_list`, `feature_image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'NFC BUSINESS CARD WITH OLD CLUB MAN', 'Itroducing KSA card-a complimentary service that extends the reach of your individual business card online. Utilizing intelligent scanning technology. It promtly directs clients to shedules sign-up forms. And all the essential elements that drive your business forward', '856.png', 'U5lCwGLMSYw', '[\"NFC Enabled Smart Card\",\"  Customizable online digital profile\",\"  NFC chip\",\"  Unlimited steps\",\"  Digital QR code\",\"  Lead generation mode\",\"  Lifetimr Validity.\"]', '942.png', '2024-02-13 12:20:09', '2024-02-19 08:18:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nfc_card_nfc_field`
--

CREATE TABLE `nfc_card_nfc_field` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nfc_field_id` bigint(20) UNSIGNED NOT NULL,
  `nfc_card_id` bigint(20) UNSIGNED NOT NULL,
  `field_value` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nfc_card_prices`
--

CREATE TABLE `nfc_card_prices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nfc_card_name` varchar(255) NOT NULL,
  `card_price` varchar(255) NOT NULL,
  `card_title` varchar(255) NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `card_feature_list` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nfc_card_prices`
--

INSERT INTO `nfc_card_prices` (`id`, `nfc_card_name`, `card_price`, `card_title`, `payment_type`, `card_feature_list`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Basic', '4.99', 'Regular Card', 'One Time Payment', '[\"Unlimited Taps\",\" Digital QR Code\",\" Leading generation mode\",\" Personel landing page\"]', '2024-02-13 12:26:13', '2024-02-13 12:26:13', NULL),
(2, 'Premium', '7.99', 'Custom Design Card', 'One-Time Payment', '[\"Custom Design\",\"Unlimited Taps\",\" Digital QR Code\",\" Leading generation mode\",\" Personel landing page\"]', '2024-02-13 12:31:55', '2024-02-13 12:31:55', NULL),
(3, 'Team', '20.99', 'Design card for Team', 'One Time Payment', '[\"Team Menbar Cards\",\"Custom Design\",\"Unlimited Taps\",\" Digital QR Code\",\" Leading generation mode\",\" Personel landing page\"]', '2024-02-13 12:32:13', '2024-02-13 12:32:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nfc_card_price_sections`
--

CREATE TABLE `nfc_card_price_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `text_large` varchar(255) DEFAULT NULL,
  `text_small` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nfc_card_price_sections`
--

INSERT INTO `nfc_card_price_sections` (`id`, `text_large`, `text_small`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'NFC BUSINESS CARD PRICE', 'Choose from our affordable 3packages', '2024-02-13 12:25:04', '2024-02-13 12:25:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nfc_designs`
--

CREATE TABLE `nfc_designs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nfc_card_id` bigint(20) UNSIGNED NOT NULL,
  `design_card_id` bigint(20) UNSIGNED NOT NULL,
  `color` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `badges` varchar(255) DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nfc_designs`
--

INSERT INTO `nfc_designs` (`id`, `nfc_card_id`, `design_card_id`, `color`, `logo`, `badges`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, NULL, NULL, NULL, 1, NULL, '2024-02-13 10:44:46', '2024-02-13 10:44:46', NULL),
(2, 2, 1, NULL, NULL, NULL, 2, NULL, '2024-02-13 12:08:23', '2024-02-13 12:08:23', NULL),
(3, 3, 1, NULL, NULL, NULL, 3, NULL, '2024-02-20 15:33:54', '2024-02-20 15:33:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nfc_fields`
--

CREATE TABLE `nfc_fields` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `icon` varchar(100) DEFAULT NULL,
  `category` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1 => Most Popular, 2 => Social, 3 => Communication, 4 => Payment, 5 => Video, 6=> Music, 7=> Design, 8=> Gaming, 9=> Other',
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=> Show, 2=> Hide',
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nfc_information`
--

CREATE TABLE `nfc_information` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nfc_card_id` bigint(20) UNSIGNED NOT NULL,
  `prefix` varchar(50) DEFAULT NULL,
  `suffix` varchar(50) DEFAULT NULL,
  `accreditations` varchar(50) DEFAULT NULL,
  `preferred_name` varchar(100) DEFAULT NULL,
  `maiden_name` varchar(100) DEFAULT NULL,
  `pronoun` varchar(100) DEFAULT NULL,
  `title` text DEFAULT NULL,
  `department` varchar(100) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `headline` text DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nfc_information`
--

INSERT INTO `nfc_information` (`id`, `nfc_card_id`, `prefix`, `suffix`, `accreditations`, `preferred_name`, `maiden_name`, `pronoun`, `title`, `department`, `company`, `headline`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2024-02-13 10:44:46', '2024-02-13 10:44:46', NULL),
(2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, '2024-02-13 12:08:23', '2024-02-13 12:08:23', NULL),
(3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, '2024-02-20 15:33:54', '2024-02-20 15:33:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tracking_no` varchar(255) NOT NULL,
  `client_id` int(11) NOT NULL,
  `shipping_address_id` bigint(20) UNSIGNED NOT NULL,
  `cart_id` bigint(20) UNSIGNED NOT NULL,
  `order_status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1 => Processing,2 => Printing,3 => Complete,4 => Delivered,5=>Cancel',
  `tax` double(8,2) DEFAULT 0.00,
  `total` double(8,2) DEFAULT 0.00,
  `discount` double(8,2) DEFAULT 0.00,
  `payable` double(8,2) DEFAULT 0.00 COMMENT 'Total-discount=total+deliveryfee',
  `additional_note` text DEFAULT NULL,
  `order_cancel_note` text DEFAULT NULL,
  `is_paid` tinyint(1) NOT NULL DEFAULT 0,
  `is_delivered` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `tracking_no`, `client_id`, `shipping_address_id`, `cart_id`, `order_status`, `tax`, `total`, `discount`, `payable`, `additional_note`, `order_cancel_note`, `is_paid`, `is_delivered`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'TN17083323774caa8529', 2, 1, 1, 1, 0.00, 200.00, 0.00, 200.00, NULL, NULL, 0, 0, '2024-02-19 08:46:17', '2024-02-19 08:46:17', NULL),
(2, 'TN17083334041c4fbfe9', 2, 3, 3, 2, 0.00, 600.00, 0.00, 600.00, NULL, NULL, 0, 0, '2024-02-19 09:03:24', '2024-02-19 09:03:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `our_services`
--

CREATE TABLE `our_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `details` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `our_services`
--

INSERT INTO `our_services` (`id`, `title`, `link`, `image`, `details`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Product Shipping Service', '#', '949.png', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2024-02-13 11:52:06', '2024-02-13 11:52:06', NULL),
(2, 'E-commerce system', '#', '264.png', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2024-02-13 11:53:10', '2024-02-13 11:53:10', NULL),
(3, 'NFC Business Card', '#', '748.png', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\', '2024-02-13 11:54:54', '2024-02-13 11:54:54', NULL),
(4, 'Printing Service', '#', '962.png', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2024-02-13 11:55:44', '2024-02-13 11:55:44', NULL),
(5, 'USA Company Registration', '#', '687.png', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2024-02-13 11:57:25', '2024-02-13 11:57:25', NULL),
(6, 'Smart Mail Service', '#', '529.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2024-02-13 11:58:45', '2024-02-13 11:58:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `total` double(8,2) DEFAULT 0.00,
  `discount` double(8,2) DEFAULT 0.00,
  `payable` double(8,2) DEFAULT 0.00 COMMENT 'Total-discount=total+deliveryfee',
  `description` text DEFAULT NULL,
  `payment_method` varchar(255) NOT NULL DEFAULT '1' COMMENT '1=>Cash On Delivery',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `client_id`, `order_id`, `total`, `discount`, `payable`, `description`, `payment_method`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 200.00, 0.00, 200.00, NULL, '1', '2024-02-19 08:46:17', '2024-02-19 08:46:17'),
(2, 2, 2, 600.00, 0.00, 600.00, NULL, '1', '2024-02-19 09:03:24', '2024-02-19 09:03:24');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `phone_books`
--

CREATE TABLE `phone_books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `group_id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_bn` varchar(255) DEFAULT NULL,
  `contact_en` varchar(255) NOT NULL,
  `contact_bn` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `given_name` varchar(255) DEFAULT NULL,
  `additional_name` varchar(255) DEFAULT NULL,
  `family_name` varchar(255) DEFAULT NULL,
  `yomi_name` varchar(255) DEFAULT NULL,
  `given_name_yomi` varchar(255) DEFAULT NULL,
  `additional_name_yomi` varchar(255) DEFAULT NULL,
  `family_name_yomi` varchar(255) DEFAULT NULL,
  `name_prefix` varchar(255) DEFAULT NULL,
  `name_suffix` varchar(255) DEFAULT NULL,
  `initials` varchar(255) DEFAULT NULL,
  `short_name` varchar(255) DEFAULT NULL,
  `maiden_name` varchar(255) DEFAULT NULL,
  `birthday` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `billing_information` varchar(255) DEFAULT NULL,
  `directory_server` varchar(255) DEFAULT NULL,
  `mileage_occupation` varchar(255) DEFAULT NULL,
  `hobby` varchar(255) DEFAULT NULL,
  `sensitivity` varchar(255) DEFAULT NULL,
  `priority` varchar(255) DEFAULT NULL,
  `subject_notes` varchar(255) DEFAULT NULL,
  `language` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `group_membership` varchar(255) DEFAULT NULL,
  `phone_1_type` varchar(255) DEFAULT NULL,
  `Phone_1_value` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `phone_books`
--

INSERT INTO `phone_books` (`id`, `client_id`, `group_id`, `name_en`, `name_bn`, `contact_en`, `contact_bn`, `email`, `given_name`, `additional_name`, `family_name`, `yomi_name`, `given_name_yomi`, `additional_name_yomi`, `family_name_yomi`, `name_prefix`, `name_suffix`, `initials`, `short_name`, `maiden_name`, `birthday`, `gender`, `location`, `billing_information`, `directory_server`, `mileage_occupation`, `hobby`, `sensitivity`, `priority`, `subject_notes`, `language`, `photo`, `group_membership`, `phone_1_type`, `Phone_1_value`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 'Harun', NULL, '123', NULL, 'harun@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-13 15:06:13', '2024-02-13 15:06:13', NULL),
(2, 1, 2, '123456789', NULL, 'kaiser', NULL, 'kaiser@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-13 15:06:38', '2024-02-13 15:06:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `phone_customer_feedback`
--

CREATE TABLE `phone_customer_feedback` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_message` varchar(255) DEFAULT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `phone_customer_feedback`
--

INSERT INTO `phone_customer_feedback` (`id`, `customer_message`, `customer_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.\"', 1, '2024-02-13 13:04:13', '2024-02-13 13:04:13', NULL),
(2, '\"1Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.\"', 2, '2024-02-13 13:08:43', '2024-02-13 13:08:43', NULL),
(3, '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.\"', 1, '2024-02-13 13:08:54', '2024-02-13 13:08:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `phone_groups`
--

CREATE TABLE `phone_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `phone_groups`
--

INSERT INTO `phone_groups` (`id`, `client_id`, `group_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Family', '2024-02-13 15:04:12', '2024-02-13 15:04:12', NULL),
(2, 1, 'Friends', '2024-02-13 15:05:23', '2024-02-13 15:05:23', NULL),
(3, 1, 'Others', '2024-02-13 15:05:32', '2024-02-13 15:05:32', NULL),
(4, 1, 'Office', '2024-02-13 15:05:40', '2024-02-13 15:05:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `phone_number_heroes`
--

CREATE TABLE `phone_number_heroes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `text_large` varchar(255) DEFAULT NULL,
  `text_small` varchar(255) DEFAULT NULL,
  `background_image` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `phone_number_heroes`
--

INSERT INTO `phone_number_heroes` (`id`, `text_large`, `text_small`, `background_image`, `price`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Have a Virtual Phone Number', 'Virtual Phone Number is the best solution for people who do not want to limit their business to a specific geographical location.', '717.png', '2.79 Per Month', '2024-02-13 12:52:56', '2024-02-13 12:52:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `phone_number_services`
--

CREATE TABLE `phone_number_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `text_heading` varchar(255) DEFAULT NULL,
  `text_small` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `phone_number_services`
--

INSERT INTO `phone_number_services` (`id`, `text_heading`, `text_small`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Why Do You Need A Virtual Phone Number?', 'Why Do You Need A Virtual Phone Number? You can open a virtual office anywhere in the world. Clients and partners will call you on their local phone number while you can be based anywhere in the world. Having a virtual phone number in a particular country gives your company a professional brand image and it shows that you care about your customers. Virtual office increase global or regional visibility, at the same time they can reduce technological costs significantly.', '798.png', '2024-02-13 12:54:18', '2024-02-13 12:54:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `phone_virtual_maps`
--

CREATE TABLE `phone_virtual_maps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `text_large` varchar(255) DEFAULT NULL,
  `text_small` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `phone_virtual_maps`
--

INSERT INTO `phone_virtual_maps` (`id`, `text_large`, `text_small`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Large selection and geographical coverage of virtual phone numbers', 'More than 30000 phone numbers in 100 countries are available for purchase and immediate connection.', '758.png', '2024-02-13 12:55:07', '2024-02-13 12:55:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `printing_heroes`
--

CREATE TABLE `printing_heroes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `text_large` varchar(255) DEFAULT NULL,
  `text_small` varchar(255) DEFAULT NULL,
  `hero_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `printing_heroes`
--

INSERT INTO `printing_heroes` (`id`, `text_large`, `text_small`, `hero_image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'On-demand shipping service worldwide', 'Some text goes here about the on-demand shipping service. You can customize this as needed.', '786.png', '2024-02-13 13:21:32', '2024-02-13 13:21:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `printing_services`
--

CREATE TABLE `printing_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_name` varchar(255) DEFAULT NULL,
  `service_details` text DEFAULT NULL,
  `qty` int(11) NOT NULL DEFAULT 1,
  `price` decimal(10,2) NOT NULL DEFAULT 0.00 COMMENT 'Per Qty Price',
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `printing_services`
--

INSERT INTO `printing_services` (`id`, `service_name`, `service_details`, `qty`, `price`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'ABC', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries</p>', 1, 10.00, 1, 1, '2024-02-17 13:43:19', '2024-02-17 15:11:29', NULL),
(2, 'Product Name', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.&nbsp;</p>', 2, 100.00, 1, 1, '2024-02-19 08:27:11', '2024-02-19 09:26:35', NULL),
(3, 'Product Name', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.&nbsp;</p>', 1, 500.00, 1, 1, '2024-02-19 08:28:56', '2024-02-19 10:18:35', NULL),
(4, 'XYZ', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.&nbsp;</p>', 1, 100.00, 1, 1, '2024-02-19 08:29:43', '2024-02-19 10:04:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `printing_service_images`
--

CREATE TABLE `printing_service_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `printing_service_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `is_featured` tinyint(1) NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `printing_service_images`
--

INSERT INTO `printing_service_images` (`id`, `printing_service_id`, `image`, `is_featured`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '7781708330922.jpg', 1, 1, NULL, '2024-02-19 08:22:02', '2024-02-19 09:38:04', NULL),
(2, 2, '490.jpg', 1, 1, NULL, '2024-02-19 08:27:11', '2024-02-19 09:26:35', NULL),
(3, 3, '197.png', 1, 1, NULL, '2024-02-19 08:28:56', '2024-02-19 10:20:31', NULL),
(4, 4, '704.png', 1, 1, NULL, '2024-02-19 08:29:43', '2024-02-19 10:14:03', NULL),
(5, 1, '5421708334464.png', 0, 1, NULL, '2024-02-19 09:21:04', '2024-02-19 09:21:04', NULL),
(6, 1, '7271708334464.png', 0, 1, NULL, '2024-02-19 09:21:04', '2024-02-19 09:21:04', NULL),
(7, 1, '1671708334464.png', 0, 1, NULL, '2024-02-19 09:21:04', '2024-02-19 09:21:04', NULL),
(8, 2, '8991708334781.jpg', 0, 1, NULL, '2024-02-19 09:26:21', '2024-02-19 09:26:21', NULL),
(9, 2, '1581708334781.jpg', 0, 1, NULL, '2024-02-19 09:26:21', '2024-02-19 09:26:21', NULL),
(10, 2, '7211708334781.jpg', 0, 1, NULL, '2024-02-19 09:26:21', '2024-02-19 09:26:21', NULL),
(11, 3, '1571708334836.jpg', 0, 1, NULL, '2024-02-19 09:27:16', '2024-02-19 09:27:16', NULL),
(12, 3, '7301708334836.jpg', 0, 1, NULL, '2024-02-19 09:27:16', '2024-02-19 09:27:16', NULL),
(13, 4, '8391708334907.png', 0, 1, NULL, '2024-02-19 09:28:27', '2024-02-19 09:28:27', NULL),
(14, 4, '9381708334907.jpg', 0, 1, NULL, '2024-02-19 09:28:27', '2024-02-19 09:28:27', NULL),
(15, 4, '5671708334907.png', 0, 1, NULL, '2024-02-19 09:28:27', '2024-02-19 09:28:27', NULL),
(16, 1, '3021708335059.jpg', 0, 1, NULL, '2024-02-19 09:30:59', '2024-02-19 09:30:59', NULL),
(17, 1, '7991708335473.png', 0, 1, NULL, '2024-02-19 09:37:53', '2024-02-19 09:37:53', NULL),
(18, 2, '5001708335571.png', 0, 1, NULL, '2024-02-19 09:39:31', '2024-02-19 09:39:31', NULL),
(19, 2, '5531708335571.jpg', 0, 1, NULL, '2024-02-19 09:39:31', '2024-02-19 09:39:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `print_card_sections`
--

CREATE TABLE `print_card_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `print_card_sections`
--

INSERT INTO `print_card_sections` (`id`, `image`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '245.png', 'Create your Custom Design', '2024-02-13 13:30:01', '2024-02-13 13:30:01', NULL),
(2, '698.jpg', '120 products to customize with your own designs', '2024-02-13 13:30:24', '2024-02-13 13:30:24', NULL),
(3, '927.jpg', 'Fulfillment centers in USA, Europe, Australia, Uk & more locations', '2024-02-13 13:30:42', '2024-02-13 13:30:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `print_customer_feedback`
--

CREATE TABLE `print_customer_feedback` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `customer_message` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `print_customer_feedback`
--

INSERT INTO `print_customer_feedback` (`id`, `customer_id`, `customer_message`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.\"', '2024-02-13 13:32:26', '2024-02-13 13:32:26', NULL),
(2, 2, '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.\"', '2024-02-13 13:33:19', '2024-02-13 13:33:19', NULL),
(3, 1, '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.\"', '2024-02-13 13:33:30', '2024-02-13 13:33:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `print_video_sections`
--

CREATE TABLE `print_video_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `text_large` varchar(255) DEFAULT NULL,
  `text_small` varchar(255) DEFAULT NULL,
  `video_link` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `print_video_sections`
--

INSERT INTO `print_video_sections` (`id`, `text_large`, `text_small`, `video_link`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'What is print-on-demand?', 'Print on demand is a more sustainable alternative to the fashion industry standard. Producing items on-demand means no over-production & wasteful-stock. Our core business model keeps our footprint smaller for a greener future.', 'U5lCwGLMSYw', '2024-02-13 13:25:45', '2024-02-13 13:25:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `identity` varchar(30) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `identity`, `created_at`, `updated_at`) VALUES
(1, 'Superadmin', 'superadmin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `service_sections`
--

CREATE TABLE `service_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_image` varchar(255) DEFAULT NULL,
  `service_title` varchar(255) DEFAULT NULL,
  `service_description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_sections`
--

INSERT INTO `service_sections` (`id`, `service_image`, `service_title`, `service_description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '318.png', 'Get a business Address', 'Are you looking for a streamlined 3pL eCommerce fullfilment service and warehouse center to support your brand and order fullfilment  fulfyld is the ultimate  third party fullfilment warehousing partner  you can rely on  for a personalized apporoach and efficient fullfilment services.', '2024-02-13 12:38:42', '2024-02-13 12:38:42', NULL),
(2, '422.png', 'Tell us how you want to ship & save', 'Are you looking for a streamlined 3pL eCommerce fullfilment service and warehouse center to support your brand and order fullfilment  fulfyld is the ultimate  third party fullfilment warehousing partner  you can rely on  for a personalized apporoach and efficient fullfilment services.', '2024-02-13 12:39:08', '2024-02-13 12:39:08', NULL),
(3, '875.png', 'Get your goods fast & worry-free', 'Are you looking for a streamlined 3pL eCommerce fullfilment service and warehouse center to support your brand and order fullfilment  fulfyld is the ultimate  third party fullfilment warehousing partner  you can rely on  for a personalized apporoach and efficient fullfilment services.', '2024-02-13 12:39:26', '2024-02-13 12:39:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `header_logo` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `contact_no_en` varchar(255) NOT NULL,
  `contact_no_bn` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `facebook_icon` varchar(255) DEFAULT NULL,
  `twitter_icon` varchar(255) DEFAULT NULL,
  `linkedln_icon` varchar(255) DEFAULT NULL,
  `instagram_icon` varchar(255) DEFAULT NULL,
  `footer_text` varchar(255) NOT NULL,
  `footer_logo` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `header_logo`, `company_name`, `contact_no_en`, `contact_no_bn`, `email`, `facebook_icon`, `twitter_icon`, `linkedln_icon`, `instagram_icon`, `footer_text`, `footer_logo`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '8381707824567.png', 'Old Club Man', '123456789', NULL, 'example@gmail.com', 'https://www.facebook.com', 'https://twitter.com', 'https://www.linkedin.com', 'https://www.instagram.com', 'Old Man Club is a Multipurpose Platform that serves unique service througout the world.', '1171707824567.png', '2024-02-13 11:42:47', '2024-02-13 11:42:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `shipping_title` varchar(255) DEFAULT NULL,
  `shipping_description` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT '1' COMMENT '1=>pending,2=>approved,3=>reject',
  `reject_note` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shippings`
--

INSERT INTO `shippings` (`id`, `client_id`, `shipping_title`, `shipping_description`, `status`, `reject_note`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 'product', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', '3', 'gfhgfgh', '2024-02-13 14:47:56', '2024-02-20 09:45:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shipping_addresses`
--

CREATE TABLE `shipping_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1 => Home, 2 => Work, 3 => Other',
  `address` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping_addresses`
--

INSERT INTO `shipping_addresses` (`id`, `client_id`, `type`, `address`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 1, 'xyz', '2024-02-19 08:46:17', '2024-02-19 08:46:17', NULL),
(3, 2, 1, 'Agrabad', '2024-02-19 09:03:24', '2024-02-19 09:03:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shipping_comments`
--

CREATE TABLE `shipping_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shipping_id` bigint(20) UNSIGNED NOT NULL,
  `client_message` text DEFAULT NULL,
  `user_message` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shipping_details`
--

CREATE TABLE `shipping_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shipping_id` bigint(20) UNSIGNED NOT NULL,
  `shipping_title` varchar(255) DEFAULT NULL,
  `shipping_description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `image_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shipping_status_types`
--

CREATE TABLE `shipping_status_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shipping_id` bigint(20) UNSIGNED NOT NULL,
  `shipping_address` varchar(255) DEFAULT NULL,
  `delivery_address` varchar(255) DEFAULT NULL,
  `shipping_method` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping_status_types`
--

INSERT INTO `shipping_status_types` (`id`, `shipping_id`, `shipping_address`, `delivery_address`, `shipping_method`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'agrabad', 'Muradpur', 'pickup', '2024-02-13 14:50:34', '2024-02-13 14:50:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shipping_trackings`
--

CREATE TABLE `shipping_trackings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shipping_id` bigint(20) UNSIGNED NOT NULL,
  `tracking_status` varchar(255) NOT NULL DEFAULT '1' COMMENT '1=>order,2=>delivered, 3=>received',
  `location` varchar(255) NOT NULL,
  `tracking_note` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping_trackings`
--

INSERT INTO `shipping_trackings` (`id`, `shipping_id`, `tracking_status`, `location`, `tracking_note`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '2', 'Agrabad,Chittagong', 'adsfdf', '2024-02-13 14:51:02', '2024-02-13 14:51:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `text_large` varchar(255) NOT NULL,
  `text_small` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `order_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `text_large`, `text_small`, `link`, `image`, `order_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'WANT ANYTHING TO BE EASY WITH OLD MAN CLUB', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been', 'https://quickpicker.xyz/oldclubman/', '7551707824875.png', 1, '2024-02-13 11:47:55', '2024-02-13 11:47:55', NULL),
(2, 'WANT ANYTHING TO BE EASY WITH OLD MAN CLUB', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been', 'https://quickpicker.xyz/oldclubman/', '1611707824931.png', 2, '2024-02-13 11:48:51', '2024-02-13 11:48:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `smart_mail_heroes`
--

CREATE TABLE `smart_mail_heroes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `text_large` varchar(255) DEFAULT NULL,
  `text_small` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `smart_mail_heroes`
--

INSERT INTO `smart_mail_heroes` (`id`, `text_large`, `text_small`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Get A Virtual Mailing Address', 'View And Manage Your Postal Mail Online', '737.png', '2024-02-13 13:43:12', '2024-02-13 13:43:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `smart_phonebook_services`
--

CREATE TABLE `smart_phonebook_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `text_large` varchar(255) DEFAULT NULL,
  `text_small` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `smart_phonebook_services`
--

INSERT INTO `smart_phonebook_services` (`id`, `text_large`, `text_small`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Save Your Data With Our PhoneBook', 'You can open a virtual office anywhere in the world. Clients and Partners will call you on their local phone number while you can be based anywhere in the world. Having a virtual phone number in a particular country gives your company a professional brand image and it reflects your sincereity about your customers\' experience. Not only virtual offices increase your regional or global visibility, but also it reduces technological costs significantly.', '592.png', '2024-02-13 13:47:52', '2024-02-13 13:47:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `smart_sms_services`
--

CREATE TABLE `smart_sms_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `text_large` varchar(255) DEFAULT NULL,
  `text_small` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `smart_sms_services`
--

INSERT INTO `smart_sms_services` (`id`, `text_large`, `text_small`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Voice & Text Messaging', 'You can open a virtual office anywhere in the world. Clients and Partners will call you on their local phone number while you can be based anywhere in the world. Having a virtual phone number in a particular country gives your company a professional brand image and it reflects your sincereity about your customers\' experience. Not only virtual offices increase your regional or global visibility, but also it reduces technological costs significantly.', '361.png', '2024-02-13 13:47:07', '2024-02-13 13:47:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `smart_work_sections`
--

CREATE TABLE `smart_work_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `text_large` varchar(255) DEFAULT NULL,
  `text_small` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `smart_work_sections`
--

INSERT INTO `smart_work_sections` (`id`, `text_large`, `text_small`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Select a Mailing Address', 'To get started, select a mailing address and a subscription plan. We offer 700+ mailing address for both personal and business.', '421.png', '2024-02-13 13:44:14', '2024-02-13 13:44:14', NULL),
(2, 'We\'ll receive your mail', 'We\'ll receive your mail and package deliveries, scan the front of mail items and make them available to you online. Nothing more than that!', '960.png', '2024-02-13 13:44:45', '2024-02-13 13:44:45', NULL),
(3, 'Tell us what to do', 'Simply log into your online mailbox account and request to open and scan, recycle or forward your physical mail items. Local pickup is also available. How can we help you?', '255.png', '2024-02-13 13:45:23', '2024-02-13 13:45:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sms_packages`
--

CREATE TABLE `sms_packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `number_of_sms` varchar(255) NOT NULL,
  `validity` varchar(255) NOT NULL,
  `price` double(8,2) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1=>active 0=>inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscribe_sections`
--

CREATE TABLE `subscribe_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `text_large` varchar(255) DEFAULT NULL,
  `text_small` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribe_sections`
--

INSERT INTO `subscribe_sections` (`id`, `text_large`, `text_small`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'SUBSCRIBE NOW FOR GET SPECIAL FEATURES1', 'Let\'s subscribe with us and find the fun1', '2024-02-13 12:32:50', '2024-02-13 12:32:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `thanas`
--

CREATE TABLE `thanas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(255) DEFAULT NULL,
  `name_bn` varchar(255) DEFAULT NULL,
  `upazila_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `upazilas`
--

CREATE TABLE `upazilas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_bn` varchar(255) DEFAULT NULL,
  `district_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contact_no` varchar(255) NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `full_access` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1=>yes 0=>no',
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1=>active 2=>inactive',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `contact_no`, `role_id`, `password`, `image`, `full_access`, `status`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Jasim Uddin', 'jasim@gmail.com', '1', 1, '$2y$12$eA.IjKzQ8qznrYpfRpvPo.fGcwJOMF4ebpTroEAyDXpAX2QuEIU4K', NULL, 0, 1, NULL, NULL, '2024-02-13 13:49:27', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address_verifications`
--
ALTER TABLE `address_verifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `address_verifications_client_id_index` (`client_id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_client_id_foreign` (`client_id`);

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chats_user_id_index` (`user_id`),
  ADD KEY `chats_client_id_index` (`client_id`);

--
-- Indexes for table `check_outs`
--
ALTER TABLE `check_outs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `choice_sections`
--
ALTER TABLE `choice_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clients_contact_no_unique` (`contact_no`),
  ADD UNIQUE KEY `clients_email_unique` (`email`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `companies_contact_no_unique` (`contact_no`),
  ADD UNIQUE KEY `companies_email_unique` (`email`),
  ADD UNIQUE KEY `companies_phone_number_unique` (`phone_number`),
  ADD UNIQUE KEY `companies_qrcode_unique` (`qrcode`),
  ADD KEY `companies_client_id_index` (`client_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `countries_code_unique` (`code`),
  ADD UNIQUE KEY `countries_name_unique` (`name`);

--
-- Indexes for table `customer_feedback`
--
ALTER TABLE `customer_feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_feedback_customer_id_index` (`customer_id`);

--
-- Indexes for table `design_cards`
--
ALTER TABLE `design_cards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `districts_name_en_unique` (`name_en`),
  ADD KEY `districts_division_id_index` (`division_id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `divisions_name_en_unique` (`name_en`),
  ADD KEY `divisions_country_id_index` (`country_id`);

--
-- Indexes for table `email_sends`
--
ALTER TABLE `email_sends`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email_sends_sender_id_index` (`sender_id`);

--
-- Indexes for table `global_net_work_images`
--
ALTER TABLE `global_net_work_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `header_sections`
--
ALTER TABLE `header_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homepages`
--
ALTER TABLE `homepages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `llcservices`
--
ALTER TABLE `llcservices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `llc_cardsections`
--
ALTER TABLE `llc_cardsections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `llc_hero_sections`
--
ALTER TABLE `llc_hero_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `llc_pricings`
--
ALTER TABLE `llc_pricings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mail_boxes`
--
ALTER TABLE `mail_boxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nfc_cards`
--
ALTER TABLE `nfc_cards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nfc_cards_client_id_foreign` (`client_id`);

--
-- Indexes for table `nfc_card_images`
--
ALTER TABLE `nfc_card_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nfc_card_nfc_field`
--
ALTER TABLE `nfc_card_nfc_field`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nfc_card_nfc_field_nfc_field_id_foreign` (`nfc_field_id`),
  ADD KEY `nfc_card_nfc_field_nfc_card_id_foreign` (`nfc_card_id`);

--
-- Indexes for table `nfc_card_prices`
--
ALTER TABLE `nfc_card_prices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nfc_card_price_sections`
--
ALTER TABLE `nfc_card_price_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nfc_designs`
--
ALTER TABLE `nfc_designs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nfc_designs_nfc_card_id_foreign` (`nfc_card_id`),
  ADD KEY `nfc_designs_design_card_id_foreign` (`design_card_id`);

--
-- Indexes for table `nfc_fields`
--
ALTER TABLE `nfc_fields`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nfc_information`
--
ALTER TABLE `nfc_information`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nfc_information_nfc_card_id_foreign` (`nfc_card_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_shipping_address_id_foreign` (`shipping_address_id`),
  ADD KEY `orders_cart_id_foreign` (`cart_id`);

--
-- Indexes for table `our_services`
--
ALTER TABLE `our_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_client_id_foreign` (`client_id`),
  ADD KEY `payments_order_id_foreign` (`order_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permissions_role_id_index` (`role_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `phone_books`
--
ALTER TABLE `phone_books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `phone_books_client_id_index` (`client_id`),
  ADD KEY `phone_books_group_id_index` (`group_id`);

--
-- Indexes for table `phone_customer_feedback`
--
ALTER TABLE `phone_customer_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phone_groups`
--
ALTER TABLE `phone_groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `phone_groups_client_id_index` (`client_id`);

--
-- Indexes for table `phone_number_heroes`
--
ALTER TABLE `phone_number_heroes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phone_number_services`
--
ALTER TABLE `phone_number_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phone_virtual_maps`
--
ALTER TABLE `phone_virtual_maps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `printing_heroes`
--
ALTER TABLE `printing_heroes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `printing_services`
--
ALTER TABLE `printing_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `printing_service_images`
--
ALTER TABLE `printing_service_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `printing_service_images_printing_service_id_foreign` (`printing_service_id`);

--
-- Indexes for table `print_card_sections`
--
ALTER TABLE `print_card_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `print_customer_feedback`
--
ALTER TABLE `print_customer_feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `print_customer_feedback_customer_id_index` (`customer_id`);

--
-- Indexes for table `print_video_sections`
--
ALTER TABLE `print_video_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`),
  ADD UNIQUE KEY `roles_identity_unique` (`identity`);

--
-- Indexes for table `service_sections`
--
ALTER TABLE `service_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_contact_no_en_unique` (`contact_no_en`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shippings_client_id_index` (`client_id`);

--
-- Indexes for table `shipping_addresses`
--
ALTER TABLE `shipping_addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shipping_addresses_client_id_foreign` (`client_id`);

--
-- Indexes for table `shipping_comments`
--
ALTER TABLE `shipping_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shipping_comments_shipping_id_index` (`shipping_id`);

--
-- Indexes for table `shipping_details`
--
ALTER TABLE `shipping_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shipping_details_shipping_id_foreign` (`shipping_id`);

--
-- Indexes for table `shipping_status_types`
--
ALTER TABLE `shipping_status_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shipping_status_types_shipping_id_index` (`shipping_id`);

--
-- Indexes for table `shipping_trackings`
--
ALTER TABLE `shipping_trackings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shipping_trackings_shipping_id_index` (`shipping_id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smart_mail_heroes`
--
ALTER TABLE `smart_mail_heroes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smart_phonebook_services`
--
ALTER TABLE `smart_phonebook_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smart_sms_services`
--
ALTER TABLE `smart_sms_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smart_work_sections`
--
ALTER TABLE `smart_work_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms_packages`
--
ALTER TABLE `sms_packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribe_sections`
--
ALTER TABLE `subscribe_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thanas`
--
ALTER TABLE `thanas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `thanas_upazila_id_index` (`upazila_id`);

--
-- Indexes for table `upazilas`
--
ALTER TABLE `upazilas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `upazilas_district_id_index` (`district_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_contact_no_unique` (`contact_no`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_index` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address_verifications`
--
ALTER TABLE `address_verifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `check_outs`
--
ALTER TABLE `check_outs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `choice_sections`
--
ALTER TABLE `choice_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer_feedback`
--
ALTER TABLE `customer_feedback`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `design_cards`
--
ALTER TABLE `design_cards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `email_sends`
--
ALTER TABLE `email_sends`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `global_net_work_images`
--
ALTER TABLE `global_net_work_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `header_sections`
--
ALTER TABLE `header_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `homepages`
--
ALTER TABLE `homepages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `llcservices`
--
ALTER TABLE `llcservices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `llc_cardsections`
--
ALTER TABLE `llc_cardsections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `llc_hero_sections`
--
ALTER TABLE `llc_hero_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `llc_pricings`
--
ALTER TABLE `llc_pricings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mail_boxes`
--
ALTER TABLE `mail_boxes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `nfc_cards`
--
ALTER TABLE `nfc_cards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nfc_card_images`
--
ALTER TABLE `nfc_card_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nfc_card_nfc_field`
--
ALTER TABLE `nfc_card_nfc_field`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nfc_card_prices`
--
ALTER TABLE `nfc_card_prices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nfc_card_price_sections`
--
ALTER TABLE `nfc_card_price_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nfc_designs`
--
ALTER TABLE `nfc_designs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nfc_fields`
--
ALTER TABLE `nfc_fields`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nfc_information`
--
ALTER TABLE `nfc_information`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `our_services`
--
ALTER TABLE `our_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phone_books`
--
ALTER TABLE `phone_books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `phone_customer_feedback`
--
ALTER TABLE `phone_customer_feedback`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `phone_groups`
--
ALTER TABLE `phone_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `phone_number_heroes`
--
ALTER TABLE `phone_number_heroes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `phone_number_services`
--
ALTER TABLE `phone_number_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `phone_virtual_maps`
--
ALTER TABLE `phone_virtual_maps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `printing_heroes`
--
ALTER TABLE `printing_heroes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `printing_services`
--
ALTER TABLE `printing_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `printing_service_images`
--
ALTER TABLE `printing_service_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `print_card_sections`
--
ALTER TABLE `print_card_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `print_customer_feedback`
--
ALTER TABLE `print_customer_feedback`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `print_video_sections`
--
ALTER TABLE `print_video_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `service_sections`
--
ALTER TABLE `service_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shipping_addresses`
--
ALTER TABLE `shipping_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `shipping_comments`
--
ALTER TABLE `shipping_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shipping_details`
--
ALTER TABLE `shipping_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shipping_status_types`
--
ALTER TABLE `shipping_status_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shipping_trackings`
--
ALTER TABLE `shipping_trackings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `smart_mail_heroes`
--
ALTER TABLE `smart_mail_heroes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `smart_phonebook_services`
--
ALTER TABLE `smart_phonebook_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `smart_sms_services`
--
ALTER TABLE `smart_sms_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `smart_work_sections`
--
ALTER TABLE `smart_work_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sms_packages`
--
ALTER TABLE `sms_packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscribe_sections`
--
ALTER TABLE `subscribe_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `thanas`
--
ALTER TABLE `thanas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `upazilas`
--
ALTER TABLE `upazilas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address_verifications`
--
ALTER TABLE `address_verifications`
  ADD CONSTRAINT `address_verifications_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`);

--
-- Constraints for table `chats`
--
ALTER TABLE `chats`
  ADD CONSTRAINT `chats_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `chats_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `companies`
--
ALTER TABLE `companies`
  ADD CONSTRAINT `companies_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `customer_feedback`
--
ALTER TABLE `customer_feedback`
  ADD CONSTRAINT `customer_feedback_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `divisions`
--
ALTER TABLE `divisions`
  ADD CONSTRAINT `divisions_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `email_sends`
--
ALTER TABLE `email_sends`
  ADD CONSTRAINT `email_sends_sender_id_foreign` FOREIGN KEY (`sender_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `nfc_cards`
--
ALTER TABLE `nfc_cards`
  ADD CONSTRAINT `nfc_cards_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`);

--
-- Constraints for table `nfc_card_nfc_field`
--
ALTER TABLE `nfc_card_nfc_field`
  ADD CONSTRAINT `nfc_card_nfc_field_nfc_card_id_foreign` FOREIGN KEY (`nfc_card_id`) REFERENCES `nfc_cards` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `nfc_card_nfc_field_nfc_field_id_foreign` FOREIGN KEY (`nfc_field_id`) REFERENCES `nfc_fields` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `nfc_designs`
--
ALTER TABLE `nfc_designs`
  ADD CONSTRAINT `nfc_designs_design_card_id_foreign` FOREIGN KEY (`design_card_id`) REFERENCES `design_cards` (`id`),
  ADD CONSTRAINT `nfc_designs_nfc_card_id_foreign` FOREIGN KEY (`nfc_card_id`) REFERENCES `nfc_cards` (`id`);

--
-- Constraints for table `nfc_information`
--
ALTER TABLE `nfc_information`
  ADD CONSTRAINT `nfc_information_nfc_card_id_foreign` FOREIGN KEY (`nfc_card_id`) REFERENCES `nfc_cards` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_cart_id_foreign` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`id`),
  ADD CONSTRAINT `orders_shipping_address_id_foreign` FOREIGN KEY (`shipping_address_id`) REFERENCES `shipping_addresses` (`id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `payments_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Constraints for table `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `phone_books`
--
ALTER TABLE `phone_books`
  ADD CONSTRAINT `phone_books_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `phone_books_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `phone_groups` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `phone_groups`
--
ALTER TABLE `phone_groups`
  ADD CONSTRAINT `phone_groups_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `printing_service_images`
--
ALTER TABLE `printing_service_images`
  ADD CONSTRAINT `printing_service_images_printing_service_id_foreign` FOREIGN KEY (`printing_service_id`) REFERENCES `printing_services` (`id`);

--
-- Constraints for table `print_customer_feedback`
--
ALTER TABLE `print_customer_feedback`
  ADD CONSTRAINT `print_customer_feedback_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `shippings`
--
ALTER TABLE `shippings`
  ADD CONSTRAINT `shippings_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `shipping_addresses`
--
ALTER TABLE `shipping_addresses`
  ADD CONSTRAINT `shipping_addresses_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`);

--
-- Constraints for table `shipping_comments`
--
ALTER TABLE `shipping_comments`
  ADD CONSTRAINT `shipping_comments_shipping_id_foreign` FOREIGN KEY (`shipping_id`) REFERENCES `shippings` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `shipping_details`
--
ALTER TABLE `shipping_details`
  ADD CONSTRAINT `shipping_details_shipping_id_foreign` FOREIGN KEY (`shipping_id`) REFERENCES `shippings` (`id`);

--
-- Constraints for table `shipping_status_types`
--
ALTER TABLE `shipping_status_types`
  ADD CONSTRAINT `shipping_status_types_shipping_id_foreign` FOREIGN KEY (`shipping_id`) REFERENCES `shippings` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `shipping_trackings`
--
ALTER TABLE `shipping_trackings`
  ADD CONSTRAINT `shipping_trackings_shipping_id_foreign` FOREIGN KEY (`shipping_id`) REFERENCES `shippings` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `thanas`
--
ALTER TABLE `thanas`
  ADD CONSTRAINT `thanas_upazila_id_foreign` FOREIGN KEY (`upazila_id`) REFERENCES `thanas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `upazilas`
--
ALTER TABLE `upazilas`
  ADD CONSTRAINT `upazilas_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
