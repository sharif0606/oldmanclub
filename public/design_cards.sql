-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2024 at 11:46 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

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
-- Table structure for table `design_cards`
--

CREATE TABLE `design_cards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `design_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `svg` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
(1, 'Classic', '<svg viewBox=\"0 0 72 72\" focusable=\"false\" class=\"chakra-icon chakra-icon css-ttqjt2\"><g clip-path=\"url(#clip0_1931_53838)\"><path d=\"M0 -24H72V54H0V-24Z\" fill=\"currentColor\"></path><path d=\"M72 72.5V39.18C44.16 29.9533 29.568 63.3176 0 41.7337V72.5H72Z\" fill=\"white\"></path></g><defs><clipPath id=\"clip0_1931_53838\"><rect fill=\"white\" height=\"72\" rx=\"16\" width=\"72\"></rect></clipPath></defs></svg>', 1, 1, NULL, NULL, NULL, NULL),
(2, 'Modern', '<svg viewBox=\"0 0 72 72\" focusable=\"false\" class=\"chakra-icon chakra-icon css-ttqjt2\"><g clip-path=\"url(#clip0_805_62524)\"><rect fill=\"white\" height=\"72\" rx=\"16\" width=\"72\"></rect><g clip-path=\"url(#clip1_805_62524)\"><path d=\"M0 -16.875H72V30.3333L0 55.637V-16.875Z\" fill=\"url(#paint0_linear_805_62524)\"></path><circle cx=\"53\" cy=\"27.125\" fill=\"#EDF2F7\" r=\"14\"></circle></g></g><defs><linearGradient gradientUnits=\"userSpaceOnUse\" id=\"paint0_linear_805_62524\" x1=\"36\" x2=\"36\" y1=\"-16.875\" y2=\"55.637\"><stop offset=\"0\" stop-color=\"currentColor\"></stop><stop offset=\"0.75\" stop-color=\"currentColor\" stop-opacity=\"0.75\"></stop></linearGradient><clipPath id=\"clip0_805_62524\"><rect fill=\"white\" height=\"72\" rx=\"16\" width=\"72\"></rect></clipPath><clipPath id=\"clip1_805_62524\"><rect fill=\"white\" height=\"72.576\" transform=\"translate(0 -16.875)\" width=\"72\"></rect></clipPath></defs></svg>', 2, 1, NULL, NULL, NULL, NULL),
(3, 'Flat', '<svg viewBox=\"0 0 72 72\" focusable=\"false\" class=\"chakra-icon chakra-icon css-ttqjt2\"><g clip-path=\"url(#a)\"><rect fill=\"#F5F5F5\" height=\"72\" rx=\"16\" width=\"72\"></rect><circle cx=\"36\" cy=\"-6.75\" fill=\"currentColor\" r=\"59.625\"></circle><path d=\"M15.75 42.75h41.625v13.5H15.75z\" fill=\"#fff\"></path></g><defs><clipPath id=\"a\"><rect fill=\"#fff\" height=\"72\" rx=\"16\" width=\"72\"></rect></clipPath></defs></svg>', 3, 1, NULL, NULL, NULL, NULL),
(4, 'Sleek', '<svg viewBox=\"0 0 72 72\" focusable=\"false\" class=\"chakra-icon chakra-icon css-ttqjt2\"><g clip-path=\"url(#a)\"><rect fill=\"#fff\" height=\"72\" rx=\"16\" width=\"72\"></rect><g clip-path=\"url(#b)\" fill=\"currentColor\"><path d=\"M0-29.25h72v72.512H0z\"></path><path d=\"M0 32.184v4.88c13.344 7.171 24 7.605 40.224-.83 16.224-8.436 24-7.34 31.776-5.4V29.57c-17.856-5.99-32.352 5.845-43.584 8.798C17.184 41.319 9.888 39.21 0 32.184Z\"></path></g></g><defs><clipPath id=\"a\"><rect fill=\"#fff\" height=\"72\" rx=\"16\" width=\"72\"></rect></clipPath><clipPath id=\"b\"><path d=\"M0-29.25h72v72.576H0z\" fill=\"#fff\"></path></clipPath></defs></svg>', 4, 1, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `design_cards`
--
ALTER TABLE `design_cards`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `design_cards`
--
ALTER TABLE `design_cards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
