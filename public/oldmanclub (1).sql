-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2024 at 04:48 PM
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

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`id`, `user_id`, `client_id`, `message`, `created_at`, `updated_at`) VALUES
(1, 2, 5, 'hello', NULL, NULL);

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
(1, '[\"Shopping Benefits\",\"      Shop & Save at USA\",\"      Uk Stores\",\"      Avoid paying Us Sales Tax\",\"      Deals & Coupons\",\"     Top Stores Details\",\"      Package Return Services \",\"     Guaranteed Pricing\",\"      Discounted Carrier Prices\"]', 'tnzjLZO2vgM', '2024-01-11 05:07:09', '2024-01-11 07:36:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name_en` varchar(255) NOT NULL,
  `first_name_bn` varchar(255) DEFAULT NULL,
  `middle_name_en` varchar(255) DEFAULT NULL,
  `middle_name_bn` varchar(255) DEFAULT NULL,
  `last_name_en` varchar(255) NOT NULL,
  `last_name_bn` varchar(255) DEFAULT NULL,
  `date_of_birth` date NOT NULL,
  `contact_en` varchar(255) NOT NULL,
  `contact_bn` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `address_line_1` varchar(255) DEFAULT NULL,
  `address_line_2` varchar(255) DEFAULT NULL,
  `country` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
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
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '1=>active, 0=>inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `first_name_en`, `first_name_bn`, `middle_name_en`, `middle_name_bn`, `last_name_en`, `last_name_bn`, `date_of_birth`, `contact_en`, `contact_bn`, `email`, `password`, `address_line_1`, `address_line_2`, `country`, `city`, `state`, `zip_code`, `nationality`, `id_no`, `id_no_type`, `image`, `cover_photo`, `photo_id`, `is_photo_verified`, `address_proof_photo`, `address_proof_type`, `is_address_verified`, `is_email_verified`, `is_contact_verified`, `status`, `created_at`, `updated_at`) VALUES
(1, 'jasim', NULL, NULL, NULL, 'uddin', NULL, '2024-01-01', '123', NULL, 'jasim@gmail.com', '$2y$12$zDvdxrmqP08u.UMjhw9hveDydjtgFlhIDTqNiijbl/Y27qhMZ2vAy', 'Hazi Para', 'Hazi Para', 'Bangladesh', 'chattogram', 'chittagong', '4213', 'Bangladeshi', '123456789', '1', '7791705488098.jpg', '2841705488098.png', NULL, 0, NULL, NULL, 0, 0, 0, 1, '2024-01-17 02:44:46', '2024-01-19 06:32:38'),
(5, 'kaiser', NULL, 'ahmed', NULL, 'ahmed', NULL, '2024-01-05', '147', NULL, 'kaiser@gmail.com', '$2y$12$64WoxpfIchgPd.FQtWGlQOoThdRw5XIsKYkiss00sYfJQj9WbyEwC', 'Hazi Para', 'Hazi Para', 'Bangladesh', 'Wazedia', 'chittagong', '4213', 'Bangladeshi', '987654321', '1', '7391705668341.jpg', NULL, NULL, 0, NULL, NULL, 0, 0, 0, 1, '2024-01-19 06:44:08', '2024-01-19 06:45:41');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code_en` varchar(255) NOT NULL,
  `code_bn` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_bn` varchar(255) DEFAULT NULL,
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

--
-- Dumping data for table `email_sends`
--

INSERT INTO `email_sends` (`id`, `sender_id`, `to_email`, `subject`, `message`, `file`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 5, 'jasimuddinm180@gmail.com', 'abc', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to', NULL, '2024-01-31 07:52:33', '2024-01-31 07:52:33', NULL),
(2, 5, 'kaiser@gmail.com', 'abc', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it', NULL, '2024-01-31 14:30:26', '2024-01-31 14:30:26', NULL),
(3, 5, 'sss', 'jj', 'kk', NULL, '2024-01-31 14:43:02', '2024-01-31 14:43:02', NULL),
(4, 5, 'jasimuddinm180@gmail.com', 'aaa', 'psum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '1451706712462.txt', '2024-01-31 14:47:42', '2024-01-31 14:47:42', NULL);

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
(1, 'NFC Card', 'https://www.google.com/', '828.png', '2024-01-06 02:22:20', '2024-01-08 09:22:51', NULL);

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
(1, 'ONE-DEMAND SHIPPING SERVICE WORLDWIDE', 'Are you looking for a streamlined 3pL eCommerce fullfilment service and warehouse center to support your brand and order fullfilment  fulfyld is the ultimate  third party fullfilment warehousing partner  you can rely on  for a personalized apporoach and efficient fullfilment services.', '189.png', '2024-01-11 03:07:10', '2024-01-11 03:11:36', NULL);

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
(1, 'We understand the demand of growing market and your interest in multiple. There is a lot of my about service but there is  no alternative to your need', 'Welcome to Old club man one of the multiple service companies in Bangladesh. Old club man is a company where customer ideas count and implemented. Where determination creates a new world-class services.', '767.png', 'https://www.google.com/', 'See old club man everywhere to make it easier for you when you move locations', '972.png', 'These are the stories of our customers who have joined us with great pleasure when using this crazy feature.', '2024-01-05 23:36:37', '2024-01-05 23:43:38', NULL);

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
(1, 'Form your LLC with confidence', '[\"A Fully-Formed LLC\",\"Registred Agent Service\",\"Business Address\",\"Bank Account and Cards\",\"Mail Forwarding\",\"Privacy by default\",\"Corporate Guide Service\"]', '281.png', 'U5lCwGLMSYw', '2024-01-12 04:45:55', '2024-01-12 08:27:53', NULL);

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
(1, 'Sign Up For A Free Business Bank Account With Your USA Company Order', 'Join the thousand of companies that started their business without the hassle. We value our customers with expert guidance alongwith unique benefits including more than $100 cashback from our partners and bank offers.', '374.png', 'Are you interested in Our LLC USA Company?', 'If you want to evolve your digital performance and learn more about how our LLC services can help, get in touch with the team today.', '2024-01-12 06:21:02', '2024-01-12 06:26:32', NULL);

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
(1, 'Launch and manage your US business from anywhere', 'Apply for an LLC, open a US bank account and start getting paid in USD', '708.jpg', '2024-01-12 03:58:10', '2024-01-12 08:05:19', NULL);

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
(1, 'Starter Plan', '15', 'LTD Company Package', '[\"Bank accounts\",\"Printed Share Certificate\",\"Digital Company Register\",\"Free Accountancy Consultant\",\"HMRC UTR Number.\"]', '2024-01-12 05:32:14', '2024-01-12 05:32:14', NULL),
(2, 'Basic Plan', '20', 'LTD Company Package', '[\"Bank accounts\",\"Printed Share Certificate\",\"Digital Company Register\",\"Free Accountancy Consultant\",\"HMRC UTR Number.\"]', '2024-01-12 05:33:00', '2024-01-12 05:58:18', NULL),
(3, 'Popular Plan', '28', 'LTD Company Package', '[\"Bank accounts\",\"Printed Share Certificate\",\"Digital Company Register\",\"Free Accountancy Consultant\",\"HMRC UTR Number.\"]', '2024-01-12 05:38:30', '2024-01-12 05:38:30', NULL),
(5, 'Premium Plan', '120', 'LTD Company Package', '[\"Bank accounts\",\"Printed Share Certificate\",\"Digital Company Register\",\"Free Accountancy Consultant\",\"HMRC UTR Number.\"]', '2024-01-12 05:59:34', '2024-01-12 05:59:34', NULL);

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

--
-- Dumping data for table `mail_boxes`
--

INSERT INTO `mail_boxes` (`id`, `number_of_mail`, `validity`, `price`, `package_type`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '500', '30 days', 50.00, '2', '2024-01-27 03:06:23', '2024-01-27 03:19:34', NULL);

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
(13, '2024_01_02_133453_create_clients_table', 2),
(15, '2024_01_05_121923_create_settings_table', 3),
(16, '2024_01_05_145229_create_sliders_table', 4),
(17, '2024_01_06_032524_create_our_services_table', 5),
(19, '2024_01_06_042433_create_homepages_table', 6),
(20, '2024_01_06_054933_create_customer_feedback_table', 7),
(21, '2024_01_06_074858_create_global_net_work_images_table', 8),
(23, '2024_01_08_094246_create_nfc_card_images_table', 9),
(24, '2024_01_09_085437_create_nfc_card_price_sections_table', 10),
(25, '2024_01_09_093553_create_nfc_card_prices_table', 11),
(26, '2024_01_09_104435_create_subscribe_sections_table', 12),
(28, '2024_01_11_082705_create_header_sections_table', 13),
(29, '2024_01_11_091309_create_service_sections_table', 14),
(30, '2024_01_11_102820_create_choice_sections_table', 15),
(31, '2024_01_12_093058_create_llc_hero_sections_table', 16),
(32, '2024_01_12_100513_create_llcservices_table', 17),
(33, '2024_01_12_105727_create_llc_pricings_table', 18),
(34, '2024_01_12_120125_create_llc_cardsections_table', 19),
(35, '2024_01_13_084217_create_phone_number_heroes_table', 20),
(36, '2024_01_13_095314_create_phone_number_services_table', 21),
(37, '2024_01_13_102756_create_phone_virtual_maps_table', 22),
(38, '2024_01_13_105019_create_phone_customer_feedback_table', 23),
(39, '2024_01_13_133611_create_smart_mail_heroes_table', 24),
(40, '2024_01_13_135609_create_smart_work_sections_table', 25),
(42, '2024_01_13_141343_create_smart_sms_services_table', 26),
(43, '2024_01_13_142558_create_smart_phonebook_services_table', 27),
(44, '2024_01_15_092440_create_printing_heroes_table', 28),
(45, '2024_01_15_100723_create_print_video_sections_table', 29),
(46, '2024_01_15_105721_create_print_card_sections_table', 30),
(47, '2024_01_15_112242_create_print_customer_feedback_table', 31),
(48, '2024_01_18_092205_create_chats_table', 32),
(50, '2024_01_18_105432_create_chats_table', 33),
(55, '2024_01_25_103421_create_sms_packages_table', 35),
(58, '2024_01_22_085542_create_phone_books_table', 37),
(61, '2024_01_21_132307_create_phone_groups_table', 38),
(63, '2024_01_27_081531_create_mail_boxes_table', 39),
(64, '2024_01_27_092528_create_shippings_table', 40),
(65, '2024_01_27_132106_create_shipping_status_types_table', 41),
(66, '2024_01_27_145710_create_shipping_trackings_table', 42),
(69, '2024_01_29_083524_create_shipping_comments_table', 43),
(71, '2024_01_31_110923_create_email_sends_table', 44);

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
(1, 'NFC BUSINESS CARD WITH OLD CLUB MAN', 'Itroducing KSA card-a complimentary service that extends the reach of your individual business card online. Utilizing intelligent scanning technology. It promtly directs clients to shedules sign-up forms. And all the essential elements that drive your business forward', '510.png', 'tnzjLZO2vgM', '[\"NFC Enabled Smart Card\",\"          Customizable online digital profile\",\"          NFC chip\",\"          Unlimited steps\",\"          Digital QR code\",\"          Lead generation mode\",\"          Lifetime Validity.\"]', '493.png', '2024-01-08 04:52:16', '2024-01-11 07:46:32', NULL);

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
(1, 'Basic', '4.99', 'Regular Card', 'One Time Payment', '[\"Unlimited Taps\",\" Digital QR Code\",\" Leading generation mode\",\" Personel landing page\"]', '2024-01-09 04:31:27', '2024-01-09 04:31:27', NULL),
(2, 'Premium', '7.99', 'Custom Design Card', 'One-Time Payment', '[\"Custom Design\",\"Unlimited Taps\",\" Digital QR Code\",\" Leading generation mode\",\" Personel landing page\"]', '2024-01-09 04:33:48', '2024-01-09 04:33:48', NULL),
(3, 'Team', '20.99', 'Design card for Team', 'One-Time Payment', '[\"Team Menbar Cards\",\"Custom Design\",\"Unlimited Taps\",\" Digital QR Code\",\" Leading generation mode\",\" Personel landing page\"]', '2024-01-09 04:35:22', '2024-01-09 04:43:03', NULL);

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
(1, 'NFC BUSINESS CARD PRICE', 'Choose from our affordable 3packages', '2024-01-09 03:19:16', '2024-01-09 03:32:37', NULL);

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
(1, 'Product Shipping Service', '#', '508.png', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2024-01-05 21:59:22', '2024-01-09 08:00:10', NULL),
(2, 'E-commerce System', '#', '373.png', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2024-01-08 06:51:47', '2024-01-08 07:08:11', NULL),
(3, 'NFC Business Card', '#', '547.png', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2024-01-08 06:52:21', '2024-01-08 07:08:36', NULL),
(4, 'Printing Service', '#', '712.png', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2024-01-08 06:52:58', '2024-01-08 06:52:58', NULL),
(5, 'USA Company Registration', '#', '885.png', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2024-01-08 06:53:29', '2024-01-08 06:53:29', NULL),
(6, 'Smart Mail Service', '#', '613.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2024-01-08 07:01:19', '2024-01-08 07:01:19', NULL);

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
(1, 5, 1, 'kaiser', NULL, '88015155555555', NULL, 'kaiser@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-25 08:14:44', '2024-01-25 08:14:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `phone_customer_feedback`
--

CREATE TABLE `phone_customer_feedback` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_message` varchar(255) DEFAULT NULL,
  `customer_name` varchar(255) DEFAULT NULL,
  `customer_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `phone_customer_feedback`
--

INSERT INTO `phone_customer_feedback` (`id`, `customer_message`, `customer_name`, `customer_image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.\"', 'Burhan Uddin Fuad', '217.jpg', '2024-01-13 05:12:34', '2024-01-13 05:17:37', NULL),
(2, '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.\"', 'Jasim uddin', '556.jpg', '2024-01-13 05:17:58', '2024-01-13 05:19:14', NULL),
(4, '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.\"', 'Burhan Uddin Fuad', '710.jpg', '2024-01-13 05:19:33', '2024-01-13 05:19:33', NULL);

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
(1, 5, 'Family', '2024-01-29 09:14:59', '2024-01-29 09:14:59', NULL);

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
(1, 'Have a Virtual Phone Number', 'Virtual Phone Number is the best solution for people who do not want to limit their business to a specific geographical location.', '610.png', '2.79', '2024-01-13 03:16:36', '2024-01-13 03:51:38', NULL);

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
(1, 'Why Do You Need A Virtual Phone Number?', 'You can open a virtual office anywhere in the world. Clients and partners will call you on their local phone number while you can be based anywhere in the world. Having a virtual phone number in a particular country gives your company a professional brand image and it shows that you care about your customers. Virtual office increase global or regional visibility, at the same time they can reduce technological costs significantly.', '428.png', '2024-01-13 04:21:39', '2024-01-13 04:25:25', NULL);

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
(1, 'Large selection and geographical coverage of virtual phone numbers', 'More than 30000 phone numbers in 100 countries are available for purchase and immediate connection.', '352.png', '2024-01-13 04:46:36', '2024-01-13 04:49:19', NULL);

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
(2, 'ONE-DEMAND SHIPPING SERVICE WORLDWIDE', 'Some text goes here about the on-demand shipping service. You can customize this as needed.', '648.png', '2024-01-15 04:05:35', '2024-01-15 04:30:46', NULL);

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
(1, '590.png', 'Create your Custom Design1', '2024-01-15 05:16:42', '2024-01-15 05:20:43', NULL),
(2, '210.jpg', '120 products to customize with your own designs', '2024-01-15 05:17:51', '2024-01-15 05:17:51', NULL),
(3, '589.jpg', 'Fulfillment centers in USA, Europe, Australia, Uk & more locations', '2024-01-15 05:18:08', '2024-01-15 05:21:18', NULL);

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
(5, 1, '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.\"', '2024-01-19 08:49:41', '2024-01-19 08:49:41', NULL),
(6, 5, '\"1Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.\"', '2024-01-19 08:50:12', '2024-01-19 08:50:12', NULL);

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
(1, 'What is print-on-demand?', 'Print on demand is a more sustainable alternative to the fashion industry standard. Producing items on-demand means no over-production & wasteful-stock. Our core business model keeps our footprint smaller for a greener future.', 'tnzjLZO2vgM', '2024-01-15 04:40:54', '2024-01-15 04:44:24', NULL);

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
(1, 'Admin', 'admin', NULL, NULL),
(2, 'User', 'user', '2024-01-20 02:29:43', '2024-01-20 02:29:43');

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
(1, '179.png', 'Get a business Address', 'Are you looking for a streamlined 3pL eCommerce fullfilment service and warehouse center to support your brand and order fullfilment  fulfyld is the ultimate  third party fullfilment warehousing partner  you can rely on  for a personalized apporoach and efficient fullfilment services.', '2024-01-11 03:50:41', '2024-01-11 09:33:47', NULL),
(2, '698.png', 'Tell us how you want to ship & save', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vel metus vel quam bibendum aliquet. Duis sit amet turpis eu mauris facilisis convallis. In hac habitasse platea dictumst. Ut vitae orci ac augue luctus bibendum. Vivamus nec lectus eu justo sollicitudin bibendum ac vel justo. Aenean vulputate, odio eu tincidunt vehicula,', '2024-01-11 07:12:44', '2024-01-11 09:34:00', NULL),
(3, '911.png', 'Get your goods fast & worry-free', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vel metus vel quam bibendum aliquet. Duis sit amet turpis eu mauris facilisis convallis. In hac habitasse platea dictumst. Ut vitae orci ac augue luctus bibendum. Vivamus nec lectus eu justo sollicitudin bibendum ac vel justo. Aenean vulputate, odio eu tincidunt vehicula,', '2024-01-11 07:14:19', '2024-01-11 09:34:12', NULL);

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
(2, '7741704716417.png', 'Old Club Man', '1', NULL, 'oldman@gmail.com', 'https://www.facebook.com', 'https://twitter.com', 'https://www.linkedin.com/', 'https://www.instagram.com/', 'Old Man Club is a Multipurpose Platform that serves unique service througout the world.', '7571704466145.png', '2024-01-05 08:49:05', '2024-01-09 08:58:45', NULL);

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
(1, 5, 'Product name', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', '2', 'afsdf', '2024-01-27 04:27:05', '2024-01-27 08:25:32', NULL),
(2, 5, 'product', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', '3', 'asdfds', '2024-01-27 06:42:34', '2024-01-29 06:11:46', NULL),
(3, 5, 'product name', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', '1', NULL, '2024-01-29 07:17:53', '2024-01-29 07:17:53', NULL);

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

--
-- Dumping data for table `shipping_comments`
--

INSERT INTO `shipping_comments` (`id`, `shipping_id`, `client_message`, `user_message`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'hello', 'hi', '2024-01-29 06:09:55', '2024-01-29 07:08:23', NULL);

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
(1, 1, 'abc', 'def', 'pickup', '2024-01-27 08:29:25', '2024-01-27 08:29:25', NULL),
(2, 1, 'abcd', 'def', 'pickup', '2024-01-27 08:29:59', '2024-01-29 02:21:39', '2024-01-29 02:21:39');

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
(1, 1, '3', 'Agrabad,Chittagong', 'adsfdf', '2024-01-27 09:30:30', '2024-01-27 09:47:59', NULL);

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
(1, 'WANT ANYTHING TO BE EASY WITH OLD MAN CLUB', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been', 'https://www.google.com/', '4131704900554.png', 1, '2024-01-05 09:50:47', '2024-01-10 09:29:14', NULL),
(2, 'WANT ANYTHING TO BE EASY WITH OLD MAN CLUB', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been', 'https://www.google.com/', '9421704706076.png', 1, '2024-01-08 03:19:46', '2024-01-08 03:27:56', NULL);

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
(1, 'Get A Virtual Mailing Address', 'View And Manage Your Postal Mail Online', '400.png', '2024-01-13 07:53:03', '2024-01-13 07:55:27', NULL);

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
(1, 'Save Your Data With Our PhoneBook', 'You can open a virtual office anywhere in the world. Clients and Partners will call you on their local phone number while you can be based anywhere in the world. Having a virtual phone number in a particular country gives your company a professional brand image and it reflects your sincereity about your customers\' experience. Not only virtual offices increase your regional or global visibility, but also it reduces technological costs significantly.', '258.png', '2024-01-13 08:36:06', '2024-01-13 08:36:55', NULL);

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
(1, 'Voice & Text Messaging', 'You can open a virtual office anywhere in the world. Clients and Partners will call you on their local phone number while you can be based anywhere in the world. Having a virtual phone number in a particular country gives your company a professional brand image and it reflects your sincereity about your customers\' experience. Not only virtual offices increase your regional or global visibility, but also it reduces technological costs significantly.', '709.png', '2024-01-13 08:24:15', '2024-01-13 08:24:51', NULL);

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
(1, 'Select a Mailing Address', 'To get started, select a mailing address and a subscription plan. We offer 700+ mailing address for both personal and business.', '856.png', '2024-01-13 08:10:29', '2024-01-13 08:11:49', NULL),
(2, 'We\'ll receive your mail', 'We\'ll receive your mail and package deliveries, scan the front of mail items and make them available to you online. Nothing more than that!', '823.png', '2024-01-13 08:10:57', '2024-01-13 08:10:57', NULL),
(3, 'Tell us what to do', 'Simply log into your online mailbox account and request to open and scan, recycle or forward your physical mail items. Local pickup is also available. How can we help you?', '778.png', '2024-01-13 08:11:19', '2024-01-13 08:12:13', NULL);

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

--
-- Dumping data for table `sms_packages`
--

INSERT INTO `sms_packages` (`id`, `title`, `number_of_sms`, `validity`, `price`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Off Net', '100 SMS', '2 days', 10.00, 1, '2024-01-25 05:32:32', '2024-01-25 05:51:25', NULL);

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
(1, 'SUBSCRIBE NOW FOR GET SPECIAL FEATURES', 'Let\'s subscribe with us and find the fun', '2024-01-09 05:00:49', '2024-01-09 05:08:57', NULL);

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
  `name_en` varchar(255) NOT NULL,
  `name_bn` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contact_no_en` varchar(255) NOT NULL,
  `contact_no_bn` varchar(255) DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `language` varchar(255) NOT NULL DEFAULT 'en',
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

INSERT INTO `users` (`id`, `name_en`, `name_bn`, `email`, `contact_no_en`, `contact_no_bn`, `role_id`, `password`, `language`, `image`, `full_access`, `status`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'Jasim', 'জসিম', 'jasim@gmail.com', '1', '১', 1, '$2y$12$k5dBNGsrSScy.GYfyCcM8.oJOROAZrXmvjy9f2Ybm4N/lIE/xxdj2', 'en', '4361704190632.jpg', 1, 1, NULL, '2024-01-02 03:30:59', '2024-01-02 07:11:08', NULL),
(3, 'Fuad', NULL, 'fuad@gmail.com', '2', '2', 1, '$2y$12$QnJQj4MjCpSno.nViz6NW.1fq3.HEuIv73KLYWanFsCnC1iSkGnYm', 'en', '9201704201108.jpg', 1, 1, NULL, '2024-01-02 07:11:48', '2024-01-02 07:11:48', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chats_user_id_index` (`user_id`),
  ADD KEY `chats_client_id_index` (`client_id`);

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
  ADD UNIQUE KEY `clients_email_unique` (`email`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `countries_code_en_unique` (`code_en`),
  ADD UNIQUE KEY `countries_code_bn_unique` (`code_bn`),
  ADD UNIQUE KEY `countries_name_en_unique` (`name_en`);

--
-- Indexes for table `customer_feedback`
--
ALTER TABLE `customer_feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_feedback_customer_id_index` (`customer_id`);

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
-- Indexes for table `nfc_card_images`
--
ALTER TABLE `nfc_card_images`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `our_services`
--
ALTER TABLE `our_services`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `shipping_comments`
--
ALTER TABLE `shipping_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shipping_comments_shipping_id_index` (`shipping_id`);

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
  ADD UNIQUE KEY `users_contact_no_en_unique` (`contact_no_en`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_contact_no_bn_unique` (`contact_no_bn`),
  ADD KEY `users_role_id_index` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `choice_sections`
--
ALTER TABLE `choice_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer_feedback`
--
ALTER TABLE `customer_feedback`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mail_boxes`
--
ALTER TABLE `mail_boxes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `nfc_card_images`
--
ALTER TABLE `nfc_card_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- AUTO_INCREMENT for table `our_services`
--
ALTER TABLE `our_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `phone_customer_feedback`
--
ALTER TABLE `phone_customer_feedback`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `phone_groups`
--
ALTER TABLE `phone_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `print_card_sections`
--
ALTER TABLE `print_card_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `print_customer_feedback`
--
ALTER TABLE `print_customer_feedback`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `print_video_sections`
--
ALTER TABLE `print_video_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `service_sections`
--
ALTER TABLE `service_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `shipping_comments`
--
ALTER TABLE `shipping_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shipping_status_types`
--
ALTER TABLE `shipping_status_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chats`
--
ALTER TABLE `chats`
  ADD CONSTRAINT `chats_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `chats_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

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
-- Constraints for table `shipping_comments`
--
ALTER TABLE `shipping_comments`
  ADD CONSTRAINT `shipping_comments_shipping_id_foreign` FOREIGN KEY (`shipping_id`) REFERENCES `shippings` (`id`) ON DELETE CASCADE;

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
