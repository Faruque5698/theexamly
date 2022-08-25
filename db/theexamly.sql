-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 07, 2021 at 09:51 AM
-- Server version: 5.7.31
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `theexamly`
--

-- --------------------------------------------------------

--
-- Table structure for table `assign_teachers`
--

DROP TABLE IF EXISTS `assign_teachers`;
CREATE TABLE IF NOT EXISTS `assign_teachers` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_name` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `subject_name` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `batch_name` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` tinyint(4) DEFAULT NULL,
  `updated_by` tinyint(4) DEFAULT NULL,
  `deleted_by` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

DROP TABLE IF EXISTS `attendances`;
CREATE TABLE IF NOT EXISTS `attendances` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `action` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attendance_date` date NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` tinyint(4) DEFAULT NULL,
  `updated_by` tinyint(4) DEFAULT NULL,
  `deleted_by` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `badges`
--

DROP TABLE IF EXISTS `badges`;
CREATE TABLE IF NOT EXISTS `badges` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `top_text` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bottom_text` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` tinyint(4) DEFAULT NULL,
  `updated_by` tinyint(4) DEFAULT NULL,
  `deleted_by` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `badges`
--

INSERT INTO `badges` (`id`, `top_text`, `bottom_text`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, '999+', 'Successful admission', '2020-11-30 09:54:49', '2021-01-03 05:10:09', NULL, 1, 1, NULL),
(2, '80+', 'Board Stand', '2020-11-30 10:01:59', '2020-11-30 10:01:59', NULL, 1, NULL, NULL),
(3, '70+', 'A+', '2020-11-30 10:03:01', '2020-11-30 10:03:01', NULL, 1, NULL, NULL),
(4, '12+', 'Batches', '2020-11-30 10:03:27', '2020-11-30 10:03:27', NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

DROP TABLE IF EXISTS `banners`;
CREATE TABLE IF NOT EXISTS `banners` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` tinyint(4) DEFAULT NULL,
  `updated_by` tinyint(4) DEFAULT NULL,
  `deleted_by` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `image`, `status`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, '1603005981Speedhunters_Rushton_Skinner_Bonneville_DSCF4653.jpg', 0, '2020-10-18 01:26:21', '2021-01-18 06:13:11', '2021-01-18 06:13:11', 1, 1, 1),
(2, '16030063781600922476.png', 0, '2020-10-18 01:32:58', '2021-01-18 06:13:15', '2021-01-18 06:13:15', 1, 1, 1),
(3, '16032633361.jpg', 0, '2020-10-21 00:55:37', '2021-01-18 06:13:31', '2021-01-18 06:13:31', 1, 1, 1),
(10, '1603268711-250X250.png', 0, '2020-10-21 02:25:11', '2020-10-21 02:25:11', NULL, 1, NULL, NULL),
(11, '1612260198-exambanner.jpg', 1, '2021-02-02 10:03:18', '2021-02-02 10:07:56', '2021-02-02 10:07:56', 1, 1, 1),
(12, '1612260256-exambanner2.jpg', 0, '2021-02-02 10:04:16', '2021-02-02 10:08:03', '2021-02-02 10:08:03', 1, 1, 1),
(13, '1612260505-exambanner01.jpg', 0, '2021-02-02 10:08:25', '2021-02-02 10:10:22', '2021-02-02 10:10:22', 1, 1, 1),
(14, '1612260522-exambanner00.jpg', 1, '2021-02-02 10:08:43', '2021-02-02 10:10:29', '2021-02-02 10:10:29', 1, 1, 1),
(15, '1612260659-exambanner00_1920x120.jpg', 0, '2021-02-02 10:10:59', '2021-02-02 10:11:33', NULL, 1, 1, NULL),
(16, '1612260704-exambanner01_1920x120.jpg', 0, '2021-02-02 10:11:45', '2021-02-02 10:12:07', NULL, 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `batches`
--

DROP TABLE IF EXISTS `batches`;
CREATE TABLE IF NOT EXISTS `batches` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `batchCategory_id` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `subject_id` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `seat_capacity` int(11) DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `days` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `routine` json DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `description` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_id` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `moodle_course_id` int(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` tinyint(4) DEFAULT NULL,
  `updated_by` tinyint(4) DEFAULT NULL,
  `deleted_by` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `batches`
--

INSERT INTO `batches` (`id`, `name`, `batchCategory_id`, `subject_id`, `seat_capacity`, `start_date`, `end_date`, `start_time`, `end_time`, `days`, `routine`, `status`, `description`, `course_id`, `moodle_course_id`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, 'Engineering_01_Batch Name', NULL, NULL, 19, '2021-02-01', '2021-03-31', NULL, NULL, NULL, NULL, 1, NULL, '1', NULL, '2021-02-01 11:09:02', '2021-02-01 11:09:48', NULL, 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `batch_categories`
--

DROP TABLE IF EXISTS `batch_categories`;
CREATE TABLE IF NOT EXISTS `batch_categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` tinyint(4) DEFAULT NULL,
  `updated_by` tinyint(4) DEFAULT NULL,
  `deleted_by` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `batch_schedules`
--

DROP TABLE IF EXISTS `batch_schedules`;
CREATE TABLE IF NOT EXISTS `batch_schedules` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `batch_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` tinyint(4) DEFAULT NULL,
  `updated_by` tinyint(4) DEFAULT NULL,
  `deleted_by` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `batch_schedule__days`
--

DROP TABLE IF EXISTS `batch_schedule__days`;
CREATE TABLE IF NOT EXISTS `batch_schedule__days` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `day` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batchSchedule_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `topic_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `teacher_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `room_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` tinyint(4) DEFAULT NULL,
  `updated_by` tinyint(4) DEFAULT NULL,
  `deleted_by` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `batch_students`
--

DROP TABLE IF EXISTS `batch_students`;
CREATE TABLE IF NOT EXISTS `batch_students` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `roll_no` int(11) DEFAULT NULL,
  `course_id` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `batch_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admission_date` date DEFAULT NULL,
  `description` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `course_fee` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `paymented_amount` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `due_amount` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `commitment_date` date DEFAULT NULL,
  `transfer_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` tinyint(4) DEFAULT NULL,
  `updated_by` tinyint(4) DEFAULT NULL,
  `deleted_by` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `batch_students`
--

INSERT INTO `batch_students` (`id`, `user_id`, `student_id`, `roll_no`, `course_id`, `batch_id`, `admission_date`, `description`, `course_fee`, `paymented_amount`, `due_amount`, `commitment_date`, `transfer_date`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, 9, 211010001, 1, '1', '1', '2021-02-01', NULL, '10000', '10000', '0', NULL, NULL, '2021-02-01 11:09:48', '2021-02-01 11:09:48', NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `batch__day__times`
--

DROP TABLE IF EXISTS `batch__day__times`;
CREATE TABLE IF NOT EXISTS `batch__day__times` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `batch_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `day` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date DEFAULT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `room_no` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `teacher_id` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `subject_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` tinyint(4) DEFAULT NULL,
  `updated_by` tinyint(4) DEFAULT NULL,
  `deleted_by` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `batch__day__times`
--

INSERT INTO `batch__day__times` (`id`, `batch_id`, `day`, `date`, `start_time`, `end_time`, `room_no`, `teacher_id`, `subject_id`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, '1', 'Sat', NULL, '17:08:00', '18:08:00', NULL, NULL, NULL, '2021-02-01 11:09:02', '2021-02-01 11:09:02', NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cash_on_payments`
--

DROP TABLE IF EXISTS `cash_on_payments`;
CREATE TABLE IF NOT EXISTS `cash_on_payments` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_fee` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_code` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_type` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admission_date` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `user_type` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_role` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` tinyint(4) DEFAULT NULL,
  `updated_by` tinyint(4) DEFAULT NULL,
  `deleted_by` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `creator_ip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `keywords` text COLLATE utf8mb4_unicode_ci,
  `priority` int(11) DEFAULT NULL,
  `created_by` tinyint(4) DEFAULT NULL,
  `updated_by` tinyint(4) DEFAULT NULL,
  `deleted_by` tinyint(4) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category_post`
--

DROP TABLE IF EXISTS `category_post`;
CREATE TABLE IF NOT EXISTS `category_post` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category_post_category_id_foreign` (`category_id`),
  KEY `category_post_post_id_foreign` (`post_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `collect_fees`
--

DROP TABLE IF EXISTS `collect_fees`;
CREATE TABLE IF NOT EXISTS `collect_fees` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `roll_no` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `total_amount` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `payment_amount` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `coupon_code` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `due` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `payment_method` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `payment_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` tinyint(4) DEFAULT NULL,
  `updated_by` tinyint(4) DEFAULT NULL,
  `deleted_by` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `config_week_days`
--

DROP TABLE IF EXISTS `config_week_days`;
CREATE TABLE IF NOT EXISTS `config_week_days` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` tinyint(4) DEFAULT NULL,
  `updated_by` tinyint(4) DEFAULT NULL,
  `deleted_by` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `config_week_days`
--

INSERT INTO `config_week_days` (`id`, `name`, `status`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, 'Saturday', 1, '2020-09-29 02:09:37', '2020-09-29 04:46:41', NULL, 1, 1, NULL),
(2, 'Sunday', 1, '2020-09-29 02:43:40', '2020-09-29 04:02:10', NULL, 1, 1, 1),
(3, 'Monday', 1, '2020-09-29 04:00:57', '2020-09-29 04:00:57', NULL, 1, NULL, NULL),
(4, 'Tuesday', 1, '2020-09-29 04:01:11', '2020-09-29 04:02:08', NULL, 1, 1, NULL),
(5, 'Wednesday', 1, '2020-09-29 04:01:21', '2020-09-29 04:02:06', NULL, 1, 1, NULL),
(6, 'Thursday', 1, '2020-09-29 04:01:30', '2020-09-29 04:02:05', NULL, 1, 1, NULL),
(7, 'Friday', 0, '2020-09-29 04:01:54', '2020-09-29 04:02:04', NULL, 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

DROP TABLE IF EXISTS `contact_us`;
CREATE TABLE IF NOT EXISTS `contact_us` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

DROP TABLE IF EXISTS `coupons`;
CREATE TABLE IF NOT EXISTS `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prefix` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `use_status` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'cupon',
  `discount_amount` int(11) NOT NULL,
  `is_fixed` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'fixed',
  `starts_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `expires_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` tinyint(4) DEFAULT NULL,
  `deleted_by` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `coupons_code_unique` (`code`)
) ENGINE=MyISAM AUTO_INCREMENT=145 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `code`, `name`, `prefix`, `description`, `use_status`, `type`, `discount_amount`, `is_fixed`, `starts_at`, `expires_at`, `created_by`, `deleted_by`, `created_at`, `updated_at`) VALUES
(138, '4122057186', 'pk1000PPSkDP', 'pk', NULL, 0, 'cupon', 1000, 'fixed', '2021-02-02 18:00:00', '2021-02-27 18:00:00', 1, NULL, '2021-02-03 04:27:49', '2021-02-03 04:27:49'),
(139, '3846971313', 'pk1000jBCCcb', 'pk', NULL, 0, 'cupon', 1000, 'fixed', '2021-02-02 18:00:00', '2021-02-27 18:00:00', 1, NULL, '2021-02-03 04:27:49', '2021-02-03 04:27:49'),
(144, '471177467', 'pk10007129', 'pk', NULL, 0, 'cupon', 1000, 'fixed', '2021-02-02 18:00:00', '2021-02-27 18:00:00', 1, NULL, '2021-02-03 04:48:50', '2021-02-03 04:48:50'),
(143, '4160990019', 'pk10005046', 'pk', NULL, 0, 'cupon', 1000, 'fixed', '2021-02-02 18:00:00', '2021-02-27 18:00:00', 1, NULL, '2021-02-03 04:48:50', '2021-02-03 04:48:50');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
CREATE TABLE IF NOT EXISTS `courses` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `full_name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `short_name` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `course_fee_type` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `moodle_course_id` int(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` tinyint(4) DEFAULT NULL,
  `updated_by` tinyint(4) DEFAULT NULL,
  `deleted_by` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `full_name`, `short_name`, `course_fee_type`, `status`, `description`, `moodle_course_id`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, 'Engineering', 'Engg', '1', 1, NULL, NULL, '2021-02-01 11:08:06', '2021-02-01 11:08:06', NULL, 1, NULL, NULL),
(2, 'University', 'UV', '1', 1, NULL, NULL, '2021-02-03 06:19:45', '2021-02-03 06:19:45', NULL, 1, NULL, NULL),
(3, 'Medical', 'Medical', '1', 1, NULL, NULL, '2021-02-03 07:05:03', '2021-02-03 07:05:03', NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `course_categories`
--

DROP TABLE IF EXISTS `course_categories`;
CREATE TABLE IF NOT EXISTS `course_categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` tinyint(4) DEFAULT NULL,
  `updated_by` tinyint(4) DEFAULT NULL,
  `deleted_by` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_categories`
--

INSERT INTO `course_categories` (`id`, `name`, `description`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(2, 'Admission', NULL, '2021-02-03 08:48:14', '2021-02-03 08:48:14', NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `course_course_category`
--

DROP TABLE IF EXISTS `course_course_category`;
CREATE TABLE IF NOT EXISTS `course_course_category` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `course_category_id` int(20) DEFAULT NULL,
  `course_id` int(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `course_course_category`
--

INSERT INTO `course_course_category` (`id`, `course_category_id`, `course_id`, `created_at`) VALUES
(4, 2, 1, '2021-02-03 08:48:14'),
(5, 2, 3, '2021-02-03 08:48:14');

-- --------------------------------------------------------

--
-- Table structure for table `course_fees`
--

DROP TABLE IF EXISTS `course_fees`;
CREATE TABLE IF NOT EXISTS `course_fees` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `batch_id` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `course_id` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `course_fee` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_duration` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` tinyint(4) DEFAULT NULL,
  `updated_by` tinyint(4) DEFAULT NULL,
  `deleted_by` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_fees`
--

INSERT INTO `course_fees` (`id`, `batch_id`, `course_id`, `course_fee`, `course_duration`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`) VALUES
(1, NULL, '1', '15000', NULL, '2021-01-14 04:28:59', 1, NULL, NULL, '2020-11-11 09:23:22', '2021-01-14 04:28:59'),
(2, NULL, '2', '15000', '4', '2021-01-14 04:29:03', 1, NULL, NULL, '2020-11-11 09:24:09', '2021-01-14 04:29:03'),
(3, NULL, '3', '12000', '4', '2021-01-14 04:29:06', 1, NULL, NULL, '2020-11-11 09:25:25', '2021-01-14 04:29:06'),
(4, NULL, '4', '10000', '6', '2021-01-14 04:29:10', 1, NULL, NULL, '2020-11-11 09:26:15', '2021-01-14 04:29:10'),
(5, NULL, '5', '10000', '6', '2021-01-14 04:29:13', 1, NULL, NULL, '2020-11-11 09:27:01', '2021-01-14 04:29:13'),
(6, NULL, '6', '12000', '2', '2021-01-14 04:29:16', 1, NULL, NULL, '2020-11-11 09:28:13', '2021-01-14 04:29:16'),
(7, NULL, '7', '11000', '2', '2021-01-14 04:28:54', 1, NULL, NULL, '2020-12-08 08:58:05', '2021-01-14 04:28:54'),
(8, NULL, '1', '10000', '6', NULL, 1, NULL, NULL, '2021-02-01 11:08:06', '2021-02-01 11:08:06'),
(9, NULL, '2', '8000', '6', NULL, 1, NULL, NULL, '2021-02-03 06:19:46', '2021-02-03 06:19:46');

-- --------------------------------------------------------

--
-- Table structure for table `course_subject`
--

DROP TABLE IF EXISTS `course_subject`;
CREATE TABLE IF NOT EXISTS `course_subject` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `course_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` tinyint(4) DEFAULT NULL,
  `updated_by` tinyint(4) DEFAULT NULL,
  `deleted_by` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_subject`
--

INSERT INTO `course_subject` (`id`, `course_id`, `subject_id`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(16, '1', '1', NULL, NULL, NULL, NULL, NULL, NULL),
(17, '2', '1', NULL, NULL, NULL, NULL, NULL, NULL),
(18, '3', '1', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

DROP TABLE IF EXISTS `districts`;
CREATE TABLE IF NOT EXISTS `districts` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Dhaka', '2020-10-29 23:47:22', '2015-09-13 04:36:20'),
(2, 'Faridpur', '2020-10-29 23:47:22', '2015-09-13 04:36:20'),
(3, 'Gazipur', '2020-10-29 23:47:22', '2015-09-13 04:36:20'),
(4, 'Gopalganj', '2020-10-29 23:47:22', '2015-09-13 04:36:20'),
(5, 'Jamalpur', '2020-10-29 23:47:22', '2016-04-06 10:48:38'),
(6, 'Kishoreganj', '2020-10-29 23:47:22', '2015-09-13 04:36:20'),
(7, 'Madaripur', '2020-10-29 23:47:22', '2015-09-13 04:36:20'),
(8, 'Manikganj', '2020-10-29 23:47:22', '2015-09-13 04:36:20'),
(9, 'Munshiganj', '2020-10-29 23:47:22', '2015-09-13 04:36:20'),
(10, 'Mymensingh', '2020-10-29 23:47:22', '2016-04-06 10:49:01'),
(11, 'Narayanganj', '2020-10-29 23:47:22', '2015-09-13 04:36:20'),
(12, 'Narsingdi', '2020-10-29 23:47:22', '2015-09-13 04:36:20'),
(13, 'Netrokona', '2020-10-29 23:47:22', '2016-04-06 10:46:31'),
(14, 'Rajbari', '2020-10-29 23:47:22', '2015-09-13 04:36:20'),
(15, 'Shariatpur', '2020-10-29 23:47:22', '2015-09-13 04:36:20'),
(16, 'Sherpur', '2020-10-29 23:47:22', '2016-04-06 10:48:21'),
(17, 'Tangail', '2020-10-29 23:47:22', '2015-09-13 04:36:20'),
(18, 'Bogra', '2020-10-29 23:47:22', '2015-09-13 04:36:20'),
(19, 'Joypurhat', '2020-10-29 23:47:22', '2015-09-13 04:36:20'),
(20, 'Naogaon', '2020-10-29 23:47:22', '2015-09-13 04:36:20'),
(21, 'Natore', '2020-10-29 23:47:22', '2015-09-13 04:36:20'),
(22, 'Nawabganj', '2020-10-29 23:47:22', '2015-09-13 04:36:20'),
(23, 'Pabna', '2020-10-29 23:47:22', '2015-09-13 04:36:20'),
(24, 'Rajshahi', '2020-10-29 23:47:22', '2015-09-13 04:36:20'),
(25, 'Sirajgonj', '2020-10-29 23:47:22', '2015-09-13 04:36:20'),
(26, 'Dinajpur', '2020-10-29 23:47:22', '2015-09-13 04:36:20'),
(27, 'Gaibandha', '2020-10-29 23:47:22', '2015-09-13 04:36:20'),
(28, 'Kurigram', '2020-10-29 23:47:22', '2015-09-13 04:36:20'),
(29, 'Lalmonirhat', '2020-10-29 23:47:22', '2015-09-13 04:36:20'),
(30, 'Nilphamari', '2020-10-29 23:47:22', '2015-09-13 04:36:20'),
(31, 'Panchagarh', '2020-10-29 23:47:22', '2015-09-13 04:36:20'),
(32, 'Rangpur', '2020-10-29 23:47:22', '2015-09-13 04:36:20'),
(33, 'Thakurgaon', '2020-10-29 23:47:22', '2015-09-13 04:36:20'),
(34, 'Barguna', '2020-10-29 23:47:22', '2015-09-13 04:36:20'),
(35, 'Barisal', '2020-10-29 23:47:22', '2015-09-13 04:36:20'),
(36, 'Bhola', '2020-10-29 23:47:22', '2015-09-13 04:36:20'),
(37, 'Jhalokati', '2020-10-29 23:47:22', '2015-09-13 04:36:20'),
(38, 'Patuakhali', '2020-10-29 23:47:22', '2015-09-13 04:36:20'),
(39, 'Pirojpur', '2020-10-29 23:47:22', '2015-09-13 04:36:20'),
(40, 'Bandarban', '2020-10-29 23:47:22', '2015-09-13 04:36:20'),
(41, 'Brahmanbaria', '2020-10-29 23:47:22', '2015-09-13 04:36:20'),
(42, 'Chandpur', '2020-10-29 23:47:22', '2015-09-13 04:36:20'),
(43, 'Chittagong', '2020-10-29 23:47:22', '2015-09-13 04:36:20'),
(44, 'Comilla', '2020-10-29 23:47:22', '2015-09-13 04:36:20'),
(45, 'Cox\'s Bazar', '2020-10-29 23:47:22', '2015-09-13 04:36:20'),
(46, 'Feni', '2020-10-29 23:47:22', '2015-09-13 04:36:20'),
(47, 'Khagrachari', '2020-10-29 23:47:22', '2015-09-13 04:36:20'),
(48, 'Lakshmipur', '2020-10-29 23:47:22', '2015-09-13 04:36:20'),
(49, 'Noakhali', '2020-10-29 23:47:22', '2015-09-13 04:36:20'),
(50, 'Rangamati', '2020-10-29 23:47:22', '2015-09-13 04:36:20'),
(51, 'Habiganj', '2020-10-29 23:47:22', '2015-09-13 04:36:20'),
(52, 'Maulvibazar', '2020-10-29 23:47:22', '2015-09-13 04:36:20'),
(53, 'Sunamganj', '2020-10-29 23:47:22', '2015-09-13 04:36:20'),
(54, 'Sylhet', '2020-10-29 23:47:22', '2015-09-13 04:36:20'),
(55, 'Bagerhat', '2020-10-29 23:47:22', '2015-09-13 04:36:20'),
(56, 'Chuadanga', '2020-10-29 23:47:22', '2015-09-13 04:36:20'),
(57, 'Jessore', '2020-10-29 23:47:22', '2015-09-13 04:36:20'),
(58, 'Jhenaidah', '2020-10-29 23:47:22', '2015-09-13 04:36:20'),
(59, 'Khulna', '2020-10-29 23:47:22', '2015-09-13 04:36:20'),
(60, 'Kushtia', '2020-10-29 23:47:22', '2015-09-13 04:36:20'),
(61, 'Magura', '2020-10-29 23:47:22', '2015-09-13 04:36:20'),
(62, 'Meherpur', '2020-10-29 23:47:22', '2015-09-13 04:36:20'),
(63, 'Narail', '2020-10-29 23:47:22', '2015-09-13 04:36:20'),
(64, 'Satkhira', '2020-10-29 23:47:22', '2015-09-13 04:36:20');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` tinyint(4) DEFAULT NULL,
  `updated_by` tinyint(4) DEFAULT NULL,
  `deleted_by` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `description`, `image`, `status`, `start_date`, `end_date`, `location`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(6, 'Job Opening', '<p><em>We are hiring new instructors.</em></p>', '1603366793-1.jpg', 1, '2020-10-22', '2020-10-25', 'Debasish Physics Care', '2020-10-22 05:39:53', '2020-10-22 05:39:53', NULL, 1, NULL, NULL),
(5, 'New Branch Opening', '<p>We are opening in Dhaka</p>', '1603366715-Speedhunters_Rushton_Skinner_Bonneville_DSCF4653.jpg', 1, '2020-10-22', '2020-10-22', 'Farm Gate', '2020-10-22 05:38:35', '2020-10-22 05:38:35', NULL, 1, NULL, NULL),
(7, 'New Batch Opening', '<p>We are opening a new <strong>batch </strong>for <strong>Engineering</strong>.</p>', '1603366935-2.jpg', 1, '2020-10-23', '2020-10-23', 'Debasish Physics Care', '2020-10-22 05:42:15', '2020-10-22 05:42:15', NULL, 1, NULL, NULL),
(8, 'Admission Batch Special Class', '<p>We are holding special exam session for <s>admission</s>&nbsp;engineering&nbsp;applicant students.</p>', '1603367116-lockscreen-bg.jpg', 1, '2020-11-24', '2020-12-24', 'Debasish Physics Care', '2020-10-22 05:45:16', '2020-10-22 05:45:32', NULL, 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `examinations`
--

DROP TABLE IF EXISTS `examinations`;
CREATE TABLE IF NOT EXISTS `examinations` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `batch_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exam_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_mark` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `written` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `mcq` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` tinyint(4) DEFAULT NULL,
  `updated_by` tinyint(4) DEFAULT NULL,
  `deleted_by` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exam_creates`
--

DROP TABLE IF EXISTS `exam_creates`;
CREATE TABLE IF NOT EXISTS `exam_creates` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `batch_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exam_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_mark` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `written` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mcq` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` tinyint(4) DEFAULT NULL,
  `updated_by` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

DROP TABLE IF EXISTS `expenses`;
CREATE TABLE IF NOT EXISTS `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `expenseCategory_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` tinyint(4) DEFAULT NULL,
  `updated_by` tinyint(4) DEFAULT NULL,
  `deleted_by` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expense_categories`
--

DROP TABLE IF EXISTS `expense_categories`;
CREATE TABLE IF NOT EXISTS `expense_categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `expense_title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expense_description` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` tinyint(4) DEFAULT NULL,
  `updated_by` tinyint(4) DEFAULT NULL,
  `deleted_by` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `failed_jobs`
--

INSERT INTO `failed_jobs` (`id`, `connection`, `queue`, `payload`, `exception`, `failed_at`) VALUES
(1, 'database', 'default', '{\"uuid\":\"cbf6bfb7-dff2-4254-af98-16f7e0ae7a6a\",\"displayName\":\"App\\\\Jobs\\\\SendEmailJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendEmailJob\",\"command\":\"O:21:\\\"App\\\\Jobs\\\\SendEmailJob\\\":8:{s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 'ErrorException: Undefined property: App\\Jobs\\SendEmailJob::$details in C:\\wamp64\\www\\prcms\\app\\Jobs\\SendEmailJob.php:33\nStack trace:\n#0 C:\\wamp64\\www\\prcms\\app\\Jobs\\SendEmailJob.php(33): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError(8, \'Undefined prope...\', \'C:\\\\wamp64\\\\www\\\\p...\', 33, Array)\n#1 [internal function]: App\\Jobs\\SendEmailJob->handle()\n#2 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(33): call_user_func_array(Array, Array)\n#3 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(37): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#4 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(91): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#5 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#6 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(592): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#7 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(94): Illuminate\\Container\\Container->call(Array)\n#8 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\SendEmailJob))\n#9 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\SendEmailJob))\n#10 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(98): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#11 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(83): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\SendEmailJob), false)\n#12 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\SendEmailJob))\n#13 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\SendEmailJob))\n#14 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(85): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#15 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(59): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\SendEmailJob))\n#16 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#17 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(356): Illuminate\\Queue\\Jobs\\Job->fire()\n#18 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(306): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#19 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(265): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#20 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(112): Illuminate\\Queue\\Worker->runNextJob(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#21 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(96): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#22 [internal function]: Illuminate\\Queue\\Console\\WorkCommand->handle()\n#23 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(33): call_user_func_array(Array, Array)\n#24 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(37): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#25 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(91): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#26 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#27 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(592): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#28 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(134): Illuminate\\Container\\Container->call(Array)\n#29 C:\\wamp64\\www\\prcms\\vendor\\symfony\\console\\Command\\Command.php(258): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#30 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#31 C:\\wamp64\\www\\prcms\\vendor\\symfony\\console\\Application.php(911): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#32 C:\\wamp64\\www\\prcms\\vendor\\symfony\\console\\Application.php(264): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#33 C:\\wamp64\\www\\prcms\\vendor\\symfony\\console\\Application.php(140): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#34 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(93): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#35 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#36 C:\\wamp64\\www\\prcms\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#37 {main}', '2020-10-24 23:31:21'),
(2, 'database', 'default', '{\"uuid\":\"f928f757-4d58-49b0-943b-b7ad7b4eae4c\",\"displayName\":\"App\\\\Jobs\\\\SendEmailJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendEmailJob\",\"command\":\"O:21:\\\"App\\\\Jobs\\\\SendEmailJob\\\":8:{s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 'ErrorException: Undefined property: App\\Jobs\\SendEmailJob::$details in C:\\wamp64\\www\\prcms\\app\\Jobs\\SendEmailJob.php:33\nStack trace:\n#0 C:\\wamp64\\www\\prcms\\app\\Jobs\\SendEmailJob.php(33): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError(8, \'Undefined prope...\', \'C:\\\\wamp64\\\\www\\\\p...\', 33, Array)\n#1 [internal function]: App\\Jobs\\SendEmailJob->handle()\n#2 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(33): call_user_func_array(Array, Array)\n#3 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(37): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#4 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(91): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#5 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#6 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(592): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#7 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(94): Illuminate\\Container\\Container->call(Array)\n#8 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\SendEmailJob))\n#9 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\SendEmailJob))\n#10 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(98): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#11 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(83): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\SendEmailJob), false)\n#12 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\SendEmailJob))\n#13 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\SendEmailJob))\n#14 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(85): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#15 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(59): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\SendEmailJob))\n#16 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#17 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(356): Illuminate\\Queue\\Jobs\\Job->fire()\n#18 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(306): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#19 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(265): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#20 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(112): Illuminate\\Queue\\Worker->runNextJob(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#21 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(96): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#22 [internal function]: Illuminate\\Queue\\Console\\WorkCommand->handle()\n#23 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(33): call_user_func_array(Array, Array)\n#24 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(37): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#25 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(91): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#26 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#27 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(592): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#28 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(134): Illuminate\\Container\\Container->call(Array)\n#29 C:\\wamp64\\www\\prcms\\vendor\\symfony\\console\\Command\\Command.php(258): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#30 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#31 C:\\wamp64\\www\\prcms\\vendor\\symfony\\console\\Application.php(911): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#32 C:\\wamp64\\www\\prcms\\vendor\\symfony\\console\\Application.php(264): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#33 C:\\wamp64\\www\\prcms\\vendor\\symfony\\console\\Application.php(140): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#34 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(93): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#35 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#36 C:\\wamp64\\www\\prcms\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#37 {main}', '2020-10-24 23:51:07'),
(3, 'database', 'default', '{\"uuid\":\"28bd92df-2df0-4faa-acad-dfddab00f267\",\"displayName\":\"App\\\\Jobs\\\\SendEmailJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendEmailJob\",\"command\":\"O:21:\\\"App\\\\Jobs\\\\SendEmailJob\\\":8:{s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 'ErrorException: Undefined property: App\\Jobs\\SendEmailJob::$details in C:\\wamp64\\www\\prcms\\app\\Jobs\\SendEmailJob.php:33\nStack trace:\n#0 C:\\wamp64\\www\\prcms\\app\\Jobs\\SendEmailJob.php(33): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError(8, \'Undefined prope...\', \'C:\\\\wamp64\\\\www\\\\p...\', 33, Array)\n#1 [internal function]: App\\Jobs\\SendEmailJob->handle()\n#2 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(33): call_user_func_array(Array, Array)\n#3 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(37): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#4 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(91): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#5 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#6 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(592): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#7 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(94): Illuminate\\Container\\Container->call(Array)\n#8 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\SendEmailJob))\n#9 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\SendEmailJob))\n#10 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(98): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#11 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(83): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\SendEmailJob), false)\n#12 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\SendEmailJob))\n#13 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\SendEmailJob))\n#14 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(85): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#15 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(59): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\SendEmailJob))\n#16 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#17 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(356): Illuminate\\Queue\\Jobs\\Job->fire()\n#18 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(306): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#19 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(265): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#20 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(112): Illuminate\\Queue\\Worker->runNextJob(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#21 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(96): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#22 [internal function]: Illuminate\\Queue\\Console\\WorkCommand->handle()\n#23 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(33): call_user_func_array(Array, Array)\n#24 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(37): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#25 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(91): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#26 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#27 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(592): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#28 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(134): Illuminate\\Container\\Container->call(Array)\n#29 C:\\wamp64\\www\\prcms\\vendor\\symfony\\console\\Command\\Command.php(258): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#30 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#31 C:\\wamp64\\www\\prcms\\vendor\\symfony\\console\\Application.php(911): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#32 C:\\wamp64\\www\\prcms\\vendor\\symfony\\console\\Application.php(264): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#33 C:\\wamp64\\www\\prcms\\vendor\\symfony\\console\\Application.php(140): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#34 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(93): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#35 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#36 C:\\wamp64\\www\\prcms\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#37 {main}', '2020-10-25 00:38:30'),
(4, 'database', 'default', '{\"uuid\":\"aa6ed87f-17c0-4990-8bbd-290c338d7ad3\",\"displayName\":\"App\\\\Jobs\\\\SendEmailJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendEmailJob\",\"command\":\"O:21:\\\"App\\\\Jobs\\\\SendEmailJob\\\":8:{s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 'ErrorException: Undefined property: App\\Jobs\\SendEmailJob::$details in C:\\wamp64\\www\\prcms\\app\\Jobs\\SendEmailJob.php:33\nStack trace:\n#0 C:\\wamp64\\www\\prcms\\app\\Jobs\\SendEmailJob.php(33): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError(8, \'Undefined prope...\', \'C:\\\\wamp64\\\\www\\\\p...\', 33, Array)\n#1 [internal function]: App\\Jobs\\SendEmailJob->handle()\n#2 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(33): call_user_func_array(Array, Array)\n#3 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(37): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#4 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(91): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#5 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#6 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(592): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#7 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(94): Illuminate\\Container\\Container->call(Array)\n#8 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\SendEmailJob))\n#9 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\SendEmailJob))\n#10 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(98): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#11 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(83): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\SendEmailJob), false)\n#12 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\SendEmailJob))\n#13 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\SendEmailJob))\n#14 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(85): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#15 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(59): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\SendEmailJob))\n#16 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#17 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(356): Illuminate\\Queue\\Jobs\\Job->fire()\n#18 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(306): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#19 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(265): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#20 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(112): Illuminate\\Queue\\Worker->runNextJob(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#21 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(96): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#22 [internal function]: Illuminate\\Queue\\Console\\WorkCommand->handle()\n#23 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(33): call_user_func_array(Array, Array)\n#24 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(37): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#25 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(91): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#26 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#27 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(592): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#28 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(134): Illuminate\\Container\\Container->call(Array)\n#29 C:\\wamp64\\www\\prcms\\vendor\\symfony\\console\\Command\\Command.php(258): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#30 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#31 C:\\wamp64\\www\\prcms\\vendor\\symfony\\console\\Application.php(911): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#32 C:\\wamp64\\www\\prcms\\vendor\\symfony\\console\\Application.php(264): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#33 C:\\wamp64\\www\\prcms\\vendor\\symfony\\console\\Application.php(140): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#34 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(93): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#35 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#36 C:\\wamp64\\www\\prcms\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#37 {main}', '2020-10-25 00:39:23'),
(5, 'database', 'default', '{\"uuid\":\"2c75f412-0e25-4845-bbbe-f4bc692310f6\",\"displayName\":\"App\\\\Jobs\\\\SendEmailJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendEmailJob\",\"command\":\"O:21:\\\"App\\\\Jobs\\\\SendEmailJob\\\":8:{s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 'ErrorException: Undefined property: App\\Jobs\\SendEmailJob::$details in C:\\wamp64\\www\\prcms\\app\\Jobs\\SendEmailJob.php:33\nStack trace:\n#0 C:\\wamp64\\www\\prcms\\app\\Jobs\\SendEmailJob.php(33): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError(8, \'Undefined prope...\', \'C:\\\\wamp64\\\\www\\\\p...\', 33, Array)\n#1 [internal function]: App\\Jobs\\SendEmailJob->handle()\n#2 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(33): call_user_func_array(Array, Array)\n#3 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(37): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#4 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(91): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#5 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#6 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(592): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#7 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(94): Illuminate\\Container\\Container->call(Array)\n#8 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\SendEmailJob))\n#9 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\SendEmailJob))\n#10 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(98): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#11 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(83): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\SendEmailJob), false)\n#12 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\SendEmailJob))\n#13 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\SendEmailJob))\n#14 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(85): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#15 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(59): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\SendEmailJob))\n#16 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#17 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(356): Illuminate\\Queue\\Jobs\\Job->fire()\n#18 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(306): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#19 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(265): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#20 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(112): Illuminate\\Queue\\Worker->runNextJob(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#21 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(96): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#22 [internal function]: Illuminate\\Queue\\Console\\WorkCommand->handle()\n#23 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(33): call_user_func_array(Array, Array)\n#24 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(37): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#25 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(91): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#26 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#27 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(592): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#28 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(134): Illuminate\\Container\\Container->call(Array)\n#29 C:\\wamp64\\www\\prcms\\vendor\\symfony\\console\\Command\\Command.php(258): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#30 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#31 C:\\wamp64\\www\\prcms\\vendor\\symfony\\console\\Application.php(911): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#32 C:\\wamp64\\www\\prcms\\vendor\\symfony\\console\\Application.php(264): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#33 C:\\wamp64\\www\\prcms\\vendor\\symfony\\console\\Application.php(140): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#34 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(93): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#35 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#36 C:\\wamp64\\www\\prcms\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#37 {main}', '2020-10-25 00:40:08'),
(6, 'database', 'default', '{\"uuid\":\"007f1b5d-b4e9-4c65-8e15-083ad7bb85d0\",\"displayName\":\"App\\\\Jobs\\\\SendEmailJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendEmailJob\",\"command\":\"O:21:\\\"App\\\\Jobs\\\\SendEmailJob\\\":8:{s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 'ErrorException: Undefined property: App\\Jobs\\SendEmailJob::$details in C:\\wamp64\\www\\prcms\\app\\Jobs\\SendEmailJob.php:33\nStack trace:\n#0 C:\\wamp64\\www\\prcms\\app\\Jobs\\SendEmailJob.php(33): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError(8, \'Undefined prope...\', \'C:\\\\wamp64\\\\www\\\\p...\', 33, Array)\n#1 [internal function]: App\\Jobs\\SendEmailJob->handle()\n#2 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(33): call_user_func_array(Array, Array)\n#3 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(37): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#4 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(91): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#5 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#6 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(592): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#7 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(94): Illuminate\\Container\\Container->call(Array)\n#8 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\SendEmailJob))\n#9 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\SendEmailJob))\n#10 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(98): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#11 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(83): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\SendEmailJob), false)\n#12 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\SendEmailJob))\n#13 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\SendEmailJob))\n#14 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(85): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#15 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(59): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\SendEmailJob))\n#16 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#17 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(356): Illuminate\\Queue\\Jobs\\Job->fire()\n#18 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(306): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#19 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(265): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#20 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(112): Illuminate\\Queue\\Worker->runNextJob(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#21 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(96): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#22 [internal function]: Illuminate\\Queue\\Console\\WorkCommand->handle()\n#23 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(33): call_user_func_array(Array, Array)\n#24 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(37): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#25 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(91): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#26 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#27 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(592): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#28 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(134): Illuminate\\Container\\Container->call(Array)\n#29 C:\\wamp64\\www\\prcms\\vendor\\symfony\\console\\Command\\Command.php(258): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#30 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#31 C:\\wamp64\\www\\prcms\\vendor\\symfony\\console\\Application.php(911): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#32 C:\\wamp64\\www\\prcms\\vendor\\symfony\\console\\Application.php(264): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#33 C:\\wamp64\\www\\prcms\\vendor\\symfony\\console\\Application.php(140): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#34 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(93): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#35 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#36 C:\\wamp64\\www\\prcms\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#37 {main}', '2020-10-25 00:42:31');
INSERT INTO `failed_jobs` (`id`, `connection`, `queue`, `payload`, `exception`, `failed_at`) VALUES
(7, 'database', 'default', '{\"uuid\":\"0835ee15-c698-4a51-b1b7-2afb8ff938c9\",\"displayName\":\"App\\\\Jobs\\\\SendEmailJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendEmailJob\",\"command\":\"O:21:\\\"App\\\\Jobs\\\\SendEmailJob\\\":8:{s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 'ErrorException: Undefined property: App\\Jobs\\SendEmailJob::$details in C:\\wamp64\\www\\prcms\\app\\Jobs\\SendEmailJob.php:33\nStack trace:\n#0 C:\\wamp64\\www\\prcms\\app\\Jobs\\SendEmailJob.php(33): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError(8, \'Undefined prope...\', \'C:\\\\wamp64\\\\www\\\\p...\', 33, Array)\n#1 [internal function]: App\\Jobs\\SendEmailJob->handle()\n#2 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(33): call_user_func_array(Array, Array)\n#3 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(37): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#4 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(91): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#5 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#6 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(592): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#7 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(94): Illuminate\\Container\\Container->call(Array)\n#8 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\SendEmailJob))\n#9 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\SendEmailJob))\n#10 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(98): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#11 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(83): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\SendEmailJob), false)\n#12 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\SendEmailJob))\n#13 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\SendEmailJob))\n#14 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(85): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#15 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(59): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\SendEmailJob))\n#16 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#17 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(356): Illuminate\\Queue\\Jobs\\Job->fire()\n#18 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(306): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#19 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(265): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#20 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(112): Illuminate\\Queue\\Worker->runNextJob(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#21 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(96): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#22 [internal function]: Illuminate\\Queue\\Console\\WorkCommand->handle()\n#23 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(33): call_user_func_array(Array, Array)\n#24 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(37): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#25 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(91): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#26 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#27 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(592): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#28 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(134): Illuminate\\Container\\Container->call(Array)\n#29 C:\\wamp64\\www\\prcms\\vendor\\symfony\\console\\Command\\Command.php(258): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#30 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#31 C:\\wamp64\\www\\prcms\\vendor\\symfony\\console\\Application.php(911): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#32 C:\\wamp64\\www\\prcms\\vendor\\symfony\\console\\Application.php(264): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#33 C:\\wamp64\\www\\prcms\\vendor\\symfony\\console\\Application.php(140): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#34 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(93): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#35 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#36 C:\\wamp64\\www\\prcms\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#37 {main}', '2020-10-25 00:44:20'),
(8, 'database', 'default', '{\"uuid\":\"94eae372-870e-4013-9659-017ded1b69b8\",\"displayName\":\"App\\\\Jobs\\\\SendEmailJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendEmailJob\",\"command\":\"O:21:\\\"App\\\\Jobs\\\\SendEmailJob\\\":9:{s:10:\\\"\\u0000*\\u0000details\\\";a:6:{s:5:\\\"title\\\";s:12:\\\"Testing Mail\\\";s:4:\\\"body\\\";s:11:\\\"lorem epsum\\\";s:5:\\\"email\\\";s:28:\\\"nowrozjunaedrahman@gmail.com\\\";s:5:\\\"phone\\\";s:11:\\\"01744444444\\\";s:4:\\\"name\\\";s:13:\\\"Jakir Hossain\\\";s:4:\\\"from\\\";s:14:\\\"jakir@mail.com\\\";}s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 'ErrorException: Undefined property: App\\Mail\\SendEmailContact::$details in C:\\wamp64\\www\\prcms\\app\\Mail\\SendEmailContact.php:31\nStack trace:\n#0 C:\\wamp64\\www\\prcms\\app\\Mail\\SendEmailContact.php(31): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError(8, \'Undefined prope...\', \'C:\\\\wamp64\\\\www\\\\p...\', 31, Array)\n#1 [internal function]: App\\Mail\\SendEmailContact->build()\n#2 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(33): call_user_func_array(Array, Array)\n#3 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(37): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#4 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(91): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#5 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#6 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(592): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#7 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailable.php(165): Illuminate\\Container\\Container->call(Array)\n#8 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Traits\\Localizable.php(19): Illuminate\\Mail\\Mailable->Illuminate\\Mail\\{closure}()\n#9 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailable.php(178): Illuminate\\Mail\\Mailable->withLocale(NULL, Object(Closure))\n#10 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(304): Illuminate\\Mail\\Mailable->send(Object(Illuminate\\Mail\\Mailer))\n#11 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(258): Illuminate\\Mail\\Mailer->sendMailable(Object(App\\Mail\\SendEmailContact))\n#12 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\PendingMail.php(122): Illuminate\\Mail\\Mailer->send(Object(App\\Mail\\SendEmailContact))\n#13 C:\\wamp64\\www\\prcms\\app\\Jobs\\SendEmailJob.php(35): Illuminate\\Mail\\PendingMail->send(Object(App\\Mail\\SendEmailContact))\n#14 [internal function]: App\\Jobs\\SendEmailJob->handle()\n#15 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(33): call_user_func_array(Array, Array)\n#16 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(37): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#17 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(91): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#18 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#19 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(592): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#20 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(94): Illuminate\\Container\\Container->call(Array)\n#21 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\SendEmailJob))\n#22 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\SendEmailJob))\n#23 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(98): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#24 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(83): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\SendEmailJob), false)\n#25 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\SendEmailJob))\n#26 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\SendEmailJob))\n#27 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(85): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#28 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(59): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\SendEmailJob))\n#29 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#30 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(356): Illuminate\\Queue\\Jobs\\Job->fire()\n#31 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(306): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#32 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(265): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#33 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(112): Illuminate\\Queue\\Worker->runNextJob(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#34 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(96): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#35 [internal function]: Illuminate\\Queue\\Console\\WorkCommand->handle()\n#36 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(33): call_user_func_array(Array, Array)\n#37 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(37): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#38 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(91): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#39 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#40 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(592): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#41 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(134): Illuminate\\Container\\Container->call(Array)\n#42 C:\\wamp64\\www\\prcms\\vendor\\symfony\\console\\Command\\Command.php(258): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#43 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#44 C:\\wamp64\\www\\prcms\\vendor\\symfony\\console\\Application.php(911): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#45 C:\\wamp64\\www\\prcms\\vendor\\symfony\\console\\Application.php(264): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#46 C:\\wamp64\\www\\prcms\\vendor\\symfony\\console\\Application.php(140): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#47 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(93): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#48 C:\\wamp64\\www\\prcms\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#49 C:\\wamp64\\www\\prcms\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#50 {main}', '2020-10-25 00:48:36');

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

DROP TABLE IF EXISTS `galleries`;
CREATE TABLE IF NOT EXISTS `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `content_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` tinyint(4) DEFAULT NULL,
  `updated_by` tinyint(4) DEFAULT NULL,
  `deleted_by` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `content_id`, `content_type`, `status`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(9, '11', 'news', 1, '2020-10-17 06:22:14', '2021-02-02 09:33:06', '2021-02-02 09:33:06', 1, NULL, NULL),
(10, '12', 'news', 1, '2020-10-24 01:16:36', '2021-02-02 09:32:59', '2021-02-02 09:32:59', 1, NULL, NULL),
(11, '13', 'news', 1, '2020-10-24 05:02:40', '2021-02-02 09:32:50', '2021-02-02 09:32:50', 1, NULL, NULL),
(12, '14', 'news', 1, '2021-01-17 08:21:45', '2021-02-02 09:27:53', '2021-02-02 09:27:53', 1, NULL, NULL),
(13, '15', 'news', 1, '2021-02-02 09:34:51', '2021-02-02 09:34:51', NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `general_settings`
--

DROP TABLE IF EXISTS `general_settings`;
CREATE TABLE IF NOT EXISTS `general_settings` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency_symbol` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timezone` date DEFAULT NULL,
  `language` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `mail_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtp_host` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtp_port` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtp_username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtp_password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtp_encryption` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sms_api_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sms_username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sms_password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ssl_active` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `validation_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `youtube` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `instagram` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `linkedin` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` tinyint(4) DEFAULT NULL,
  `updated_by` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `general_settings_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `general_settings`
--

INSERT INTO `general_settings` (`id`, `name`, `site_title`, `phone`, `email`, `currency_symbol`, `timezone`, `language`, `address`, `mail_type`, `from_email`, `from_name`, `smtp_host`, `smtp_port`, `smtp_username`, `smtp_password`, `smtp_encryption`, `sms_api_url`, `sid`, `sms_username`, `sms_password`, `ssl_active`, `customer_name`, `customer_email`, `customer_phone`, `validation_id`, `amount`, `customer_password`, `image`, `facebook`, `twitter`, `youtube`, `instagram`, `linkedin`, `deleted_at`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'The Examly', 'http://theexamly.com', '01913800800', 'theexamly@gmail.com', 'TK', NULL, 'English', 'Laily Bhaban, 03 Assam Colony,\r\nRajshahi-6203, Bangladesh.', 'mail', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://smsplus.sslwireless.com', 'Sid api', 'DesktopIT-b5b257fb-2732-4905-99e9-54d0d206e9db', NULL, 'Yes', NULL, NULL, NULL, NULL, NULL, NULL, '1612246873-m the examly .png', NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-14 07:29:59', '2021-02-02 06:21:13', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

DROP TABLE IF EXISTS `grades`;
CREATE TABLE IF NOT EXISTS `grades` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `grade_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grade_point` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_from` int(11) NOT NULL,
  `number_to` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` tinyint(4) DEFAULT NULL,
  `updated_by` tinyint(4) DEFAULT NULL,
  `deleted_by` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mark_inputs`
--

DROP TABLE IF EXISTS `mark_inputs`;
CREATE TABLE IF NOT EXISTS `mark_inputs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exam_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `written` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mcq` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_mark` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `result` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grade` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `point` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `merit_list` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` tinyint(4) DEFAULT NULL,
  `updated_by` tinyint(4) DEFAULT NULL,
  `deleted_by` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `message_templates`
--

DROP TABLE IF EXISTS `message_templates`;
CREATE TABLE IF NOT EXISTS `message_templates` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` tinyint(4) DEFAULT NULL,
  `updated_by` tinyint(4) DEFAULT NULL,
  `deleted_by` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=87 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2020_07_09_171700_create_categories_table', 1),
(2, '2020_07_09_171700_create_category_post_table', 1),
(3, '2020_07_09_171700_create_departments_table', 1),
(4, '2020_07_09_171700_create_failed_jobs_table', 1),
(5, '2020_07_09_171700_create_general_settings_table', 1),
(6, '2020_07_09_171700_create_modules_table', 1),
(7, '2020_07_09_171700_create_password_resets_table', 1),
(8, '2020_07_09_171700_create_permission_role_table', 1),
(9, '2020_07_09_171700_create_permission_user_table', 1),
(10, '2020_07_09_171700_create_permissions_table', 1),
(11, '2020_07_09_171700_create_post_images_table', 1),
(12, '2020_07_09_171700_create_posts_table', 1),
(13, '2020_07_09_171700_create_role_user_table', 1),
(14, '2020_07_09_171700_create_roles_table', 1),
(15, '2020_07_09_171700_create_staff_table', 1),
(44, '2020_07_09_171700_create_students_table', 17),
(17, '2020_07_09_171700_create_teachers_table', 1),
(18, '2020_07_09_171700_create_users_table', 1),
(74, '2020_10_31_191303_create_sms_table', 33),
(20, '2020_09_17_054627_create_course_categories_table', 1),
(21, '2020_09_17_052503_create_courses_table', 2),
(22, '2020_09_19_061314_create_batch_categories_table', 3),
(24, '2020_09_19_052000_create_batches_table', 4),
(25, '2020_09_21_072413_create_general_settings_table', 5),
(31, '2020_09_26_073634_create_subjects_table', 8),
(30, '2020_09_26_105653_create_batch_schedules_table', 7),
(32, '2020_09_26_174935_create_batch_schedules_table', 9),
(33, '2020_09_28_175354_create_config_week_days_table', 10),
(34, '2020_09_29_212919_create_week_days_table', 11),
(35, '2020_09_30_180435_create_batch_schedules_table', 12),
(36, '2020_10_07_201003_create_examinations_table', 13),
(37, '2020_10_08_190106_create_examinations_table', 14),
(38, '2020_10_07_071218_create_expenses_table', 15),
(39, '2020_10_07_071235_create_expense_categories_table', 15),
(40, '2020_10_08_094006_create_grades_table', 16),
(45, '2020_10_11_200256_create_results_table', 18),
(46, '2020_10_11_045326_create_attendances_table', 19),
(47, '2020_10_14_054108_create_notice_categories_table', 20),
(51, '2020_10_14_054222_create_notices_table', 21),
(52, '2020_10_15_044550_create_photos_table', 22),
(56, '2020_10_15_045303_create_news_table', 23),
(57, '2020_10_17_072103_create_photos_table', 24),
(59, '2020_10_17_072610_create_galleries_table', 25),
(60, '2020_10_12_195612_create_exam_creates_table', 26),
(61, '2020_10_12_230606_create_mark_inputs_table', 26),
(62, '2020_10_13_193910_create_transactions_table', 26),
(63, '2020_10_14_203009_create_course_fees_table', 26),
(64, '2020_10_18_175634_create_batch_students_table', 26),
(65, '2020_10_17_162935_create_banners_table', 27),
(66, '2020_10_18_071057_create_cupons_table', 28),
(67, '2020_10_18_101309_create_slider_images_table', 28),
(68, '2020_10_18_113303_create_course_subject', 29),
(70, '2020_10_19_113301_create_events_table', 30),
(71, '2020_10_23_055509_create_payment_histories_table', 31),
(72, '2020_10_24_115629_create_contact_us_table', 31),
(73, '2020_10_25_045008_create_jobs_table', 32),
(75, '2020_11_05_193414_create_assign_teachers_table', 34),
(76, '2020_11_05_194741_create_assign_teachers_table', 35),
(77, '2020_11_08_002952_create_monthly_fee_sets_table', 36),
(78, '2020_11_18_135355_create_temp_students_table', 37),
(80, '2020_11_21_165151_create_moodle_data_table', 38),
(81, '2020_11_28_134330_create_phone_books_table', 39),
(82, '2020_11_28_135014_create_phone_book_groups_table', 40),
(83, '2020_11_29_151321_create_message_templates_table', 41),
(84, '2020_12_01_112923_create_zoom_api_data_table', 42),
(85, '2020_12_02_103358_create_zoom_meeting_details_table', 43),
(86, '2021_02_03_115558_create_exam_category_group_table', 44);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

DROP TABLE IF EXISTS `modules`;
CREATE TABLE IF NOT EXISTS `modules` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` tinyint(4) DEFAULT NULL,
  `updated_by` tinyint(4) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `modules_name_unique` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=73 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `name`, `slug`, `created_by`, `updated_by`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Fronted CMS', 'fronted-cms', 1, NULL, 1, '2020-11-02 04:42:34', '2020-11-02 04:42:34'),
(15, 'Settings', 'settings', 1, NULL, 1, '2020-11-02 05:28:48', '2020-11-02 05:28:48'),
(18, 'Report', 'report', 1, NULL, 1, '2020-11-02 05:29:51', '2020-11-02 05:29:51'),
(21, 'SMS', 'sms', 1, NULL, 1, '2020-11-02 05:30:45', '2020-11-02 05:30:45'),
(24, 'Account', 'account', 1, NULL, 1, '2020-11-02 05:32:09', '2020-11-02 05:32:09'),
(28, 'Coupon', 'coupon', 1, NULL, 1, '2020-11-02 05:35:53', '2020-11-02 05:35:53'),
(32, 'Payment', 'payment', 1, NULL, 1, '2020-11-02 05:37:28', '2020-11-02 05:37:28'),
(37, 'Examination', 'examination', 1, NULL, 1, '2020-11-02 05:39:19', '2020-11-02 05:39:19'),
(40, 'Attendance', 'attendance', 1, NULL, 1, '2020-11-02 05:41:04', '2020-11-02 05:41:04'),
(45, 'Students', 'students', 1, 1, 1, '2020-11-02 05:42:49', '2020-11-09 08:06:27'),
(48, 'BatchSchedule', 'batchschedule', 1, NULL, 1, '2020-11-02 05:44:21', '2020-11-02 05:44:21'),
(52, 'Batch', 'batch', 1, NULL, 1, '2020-11-02 05:45:40', '2020-11-02 05:45:40'),
(54, 'Batch Category', 'batch-category', 1, NULL, 1, '2020-11-02 05:46:21', '2020-11-02 05:46:21'),
(57, 'Subject', 'subject', 1, 1, 1, '2020-11-02 05:47:05', '2020-11-09 08:06:28'),
(60, 'Courses', 'courses', 1, NULL, 1, '2020-11-02 05:47:50', '2020-11-02 05:47:50'),
(66, 'Dashboard', 'dashboard', 1, 1, 1, '2020-11-02 05:49:59', '2020-11-01 05:38:34'),
(67, 'Teachers', 'teachers', 1, 1, 1, '2020-11-03 22:20:29', '2020-11-09 08:05:40'),
(68, 'Staff', 'staff', 1, 1, 1, '2020-11-09 08:07:01', '2020-11-09 09:43:37'),
(69, 'Profile', 'profile', 1, NULL, 1, '2020-11-12 03:05:49', '2020-11-12 03:05:49'),
(70, 'ID Card', 'id-card', 1, NULL, 1, '2020-12-09 10:15:55', '2020-12-09 10:15:55'),
(71, 'Communication', 'communication', 1, NULL, 1, '2021-01-13 17:13:02', '2021-01-13 17:13:02'),
(72, 'Notification', 'notification', 1, NULL, 1, '2021-01-14 05:37:47', '2021-01-14 05:37:47');

-- --------------------------------------------------------

--
-- Table structure for table `monthly_fee_sets`
--

DROP TABLE IF EXISTS `monthly_fee_sets`;
CREATE TABLE IF NOT EXISTS `monthly_fee_sets` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `course_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admission_fee` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `monthly_fee` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `installment` int(10) DEFAULT NULL,
  `last_payment_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` tinyint(4) DEFAULT NULL,
  `updated_by` tinyint(4) DEFAULT NULL,
  `deleted_by` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `moodle_data`
--

DROP TABLE IF EXISTS `moodle_data`;
CREATE TABLE IF NOT EXISTS `moodle_data` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `moodle_domain_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_user` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `enrol_user` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` tinyint(4) DEFAULT NULL,
  `updated_by` tinyint(4) DEFAULT NULL,
  `deleted_by` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `moodle_data`
--

INSERT INTO `moodle_data` (`id`, `moodle_domain_name`, `create_user`, `enrol_user`, `status`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, 'https://oe.theexamly.com', 'a', 'a', 1, '2020-11-21 11:20:56', '2021-02-02 07:01:52', NULL, 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` tinyint(4) DEFAULT NULL,
  `updated_by` tinyint(4) DEFAULT NULL,
  `deleted_by` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `description`, `status`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(11, 'Admission Notice', '<p><strong>Testing Notice&nbsp;Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 1, '2020-10-17 06:22:14', '2021-02-02 09:33:06', '2021-02-02 09:33:06', 1, 1, 1),
(12, 'Time Schedule Change', '<p><strong>Testing Notice&nbsp;Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 1, '2020-10-24 01:16:36', '2021-02-02 09:32:59', '2021-02-02 09:32:59', 1, 1, 1),
(13, 'Branch Opening Ceremony', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 1, '2020-10-24 05:02:40', '2021-02-02 09:32:51', '2021-02-02 09:32:51', 1, 1, 1),
(14, 'Test', '<p>This news for test.............</p>', 1, '2021-01-17 08:21:45', '2021-02-02 09:27:54', '2021-02-02 09:27:54', 1, 1, 1),
(15, 'Upcoming admission............', '<p>Fast Registration as soon as possible......</p>', 1, '2021-02-02 09:34:51', '2021-02-02 09:37:33', NULL, 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

DROP TABLE IF EXISTS `notices`;
CREATE TABLE IF NOT EXISTS `notices` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` tinyint(4) DEFAULT NULL,
  `updated_by` tinyint(4) DEFAULT NULL,
  `deleted_by` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`id`, `title`, `description`, `file`, `status`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, 'Admission Notice', '<p><strong>Admission Notice 2</strong></p>', '1602677498.png', 1, '2020-10-14 04:33:09', '2020-10-23 22:27:38', NULL, 1, 1, 1),
(2, 'Test Notice', '<p><em>Hello World</em></p>', '1602676246.pdf', 1, '2020-10-14 05:50:46', '2020-10-23 22:27:37', NULL, 1, 1, 1),
(3, 'Admission Notice', '<p>aad</p>', '1602755831.pdf', 1, '2020-10-15 03:57:11', '2020-10-23 22:27:36', NULL, 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_histories`
--

DROP TABLE IF EXISTS `payment_histories`;
CREATE TABLE IF NOT EXISTS `payment_histories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `paymented_amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_id` int(20) DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` tinyint(4) DEFAULT NULL,
  `updated_by` tinyint(4) DEFAULT NULL,
  `deleted_by` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_histories`
--

INSERT INTO `payment_histories` (`id`, `user_id`, `student_id`, `batch_id`, `paymented_amount`, `coupon_code`, `payment_method`, `payment_date`, `transaction_id`, `description`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, 9, 211010001, 1, '10000', NULL, 'cash', '01-02-2021', NULL, NULL, '2021-02-01 11:09:48', '2021-02-01 11:09:48', NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `module_id` int(11) DEFAULT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` tinyint(4) DEFAULT NULL,
  `updated_by` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=204 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `slug`, `module_id`, `display_name`, `description`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'fronted_cms', 'fronted-cms', 1, 'Fronted Cms Menu', 'Fronted CMS Menu', 1, NULL, '2020-11-02 04:50:09', '2020-11-02 04:50:09'),
(2, 'notice', 'notice', 1, 'Notice Sub Menu', 'Notice Sub Menu', 1, 1, '2020-11-02 05:11:50', '2020-11-02 08:30:37'),
(3, 'news', 'news', 1, 'News Submenu', 'News SubMenu', 1, 1, '2020-11-02 05:54:00', '2020-11-02 08:30:49'),
(4, 'event', 'event', 1, 'Event Submenu', 'Event SubMenu', 1, 1, '2020-11-02 05:54:37', '2020-11-02 08:31:01'),
(5, 'gallery', 'gallery', 1, 'Gallery Submenu', 'Gallery SubMenu', 1, 1, '2020-11-02 05:55:38', '2020-11-02 08:31:12'),
(6, 'banner_image', 'banner-image', 1, 'Banner Image Submenu', 'Banner Image SubMenu', 1, 1, '2020-11-02 05:56:36', '2020-11-02 08:31:26'),
(7, 'slider_images', 'slider-images', 1, 'Slider Image Submenu', 'Slider Image SubMenu', 1, 1, '2020-11-02 05:57:56', '2020-11-03 22:26:18'),
(8, 'contact_us_records', 'contact-us-records', 1, 'Contact Us Records Submenu', 'Contact us Records SubMenu', 1, 1, '2020-11-02 05:58:52', '2020-11-02 08:31:53'),
(9, 'dashboard', 'dashboard', 66, 'Dashboard Menu', 'Dashboard', 1, NULL, '2020-11-02 06:18:16', '2020-11-02 06:18:16'),
(10, 'dashboard_courses', 'dashboard-courses', 66, 'Number Of Courses Dashboard Content', 'Number Of Courses Dashboard Content', 1, NULL, '2020-11-02 06:19:54', '2020-11-02 06:19:54'),
(11, 'dashboard_batches', 'dashboard-batches', 66, 'Number Of Batches Dashboard Content', 'Number Of Batches Dashboard Content', 1, NULL, '2020-11-02 06:21:11', '2020-11-02 06:21:11'),
(12, 'dashboard_students', 'dashboard-students', 66, 'Number Of Students Dashboard Content', 'Number Of Students Dashboard Content', 1, NULL, '2020-11-02 06:21:58', '2020-11-02 06:21:58'),
(13, 'dashboard_monthly_income', 'dashboard-monthly-income', 66, 'Monthly Income Dashboard Content', 'Monthly Income Dashboard Content', 1, NULL, '2020-11-02 06:22:57', '2020-11-02 06:22:57'),
(14, 'dashboard_monthly_expense', 'dashboard-monthly-expense', 66, 'Monthly Expense Dashboard Content', 'Monthly Expense Dashboard Content', 1, NULL, '2020-11-02 06:24:14', '2020-11-02 06:24:14'),
(15, 'course_list', 'course-list', 60, 'Course List Submenu', 'Course List SubMenu', 1, 1, '2020-11-02 06:29:28', '2020-11-02 08:45:21'),
(16, 'add_course', 'add-course', 60, 'Add Course Submenu', 'Add Course SubMenu', 1, 1, '2020-11-02 06:30:18', '2020-11-02 08:19:33'),
(17, 'course', 'course', 60, 'Courses Menu', 'Courses Menu', 1, NULL, '2020-11-02 06:30:50', '2020-11-02 06:30:50'),
(18, 'subject', 'subject', 57, 'Subject Menu', 'Subject Menu', 1, NULL, '2020-11-02 06:31:43', '2020-11-02 06:31:43'),
(19, 'add_subject', 'add-subject', 57, 'Add Subject Submenu', 'Add Subject SubMenu', 1, 1, '2020-11-02 06:32:37', '2020-11-02 08:43:35'),
(20, 'subject_list', 'subject-list', 57, 'Subject List Submenu', 'Subject List SubMenu', 1, 1, '2020-11-02 06:33:17', '2020-11-02 08:43:50'),
(21, 'batch_category', 'batch-category', 54, 'Batch Category Menu', 'Batch Category Menu', 1, NULL, '2020-11-02 06:34:46', '2020-11-02 06:34:46'),
(22, 'add_batch_category_btn', 'add-batch-category-btn', 54, 'Add Batch Category Button', 'Add Batch Category Button', 1, 1, '2020-11-02 06:37:32', '2020-11-02 23:09:27'),
(23, 'batch', 'batch', 52, 'Batch Menu', 'Batch Menu', 1, NULL, '2020-11-02 06:38:24', '2020-11-02 06:38:24'),
(24, 'add_batch', 'add-batch', 52, 'Add Batch Submenu', 'Add Batch SubMenu', 1, 1, '2020-11-02 06:39:00', '2020-11-02 08:45:02'),
(25, 'running_batch', 'running-batch', 52, 'Running Batch Submenu', 'Running Batch SubMenu', 1, 1, '2020-11-02 06:39:54', '2020-11-02 08:44:44'),
(26, 'archieve_batch', 'archieve-batch', 52, 'Archive Batch Submenu', 'Archive Batch SubMenu', 1, 1, '2020-11-02 07:09:20', '2020-11-02 08:44:26'),
(27, 'batchSchedule', 'batchschedule', 48, 'Batchschedule Menu', 'BatchSchedule Menu', 1, NULL, '2020-11-02 07:10:45', '2020-11-02 07:10:45'),
(28, 'batchSchedule_list', 'batchschedule-list', 48, 'Batchschedule List Submenu', 'BatchSchedule List SubMenu', 1, 1, '2020-11-02 07:11:44', '2020-11-02 08:39:40'),
(29, 'add_batchSchedule', 'add-batchschedule', 48, 'Add Batchschedule Submenu', 'Add BatchSchedule SubMenu', 1, 1, '2020-11-02 07:12:42', '2020-11-02 08:39:55'),
(30, 'students', 'students', 45, 'Students Menu', 'Students Menu', 1, NULL, '2020-11-02 07:13:40', '2020-11-02 07:13:40'),
(31, 'add_student', 'add-student', 45, 'Add Student Submenu', 'Add Student SubMenu', 1, 1, '2020-11-02 07:15:06', '2020-11-02 08:43:08'),
(32, 'student_list', 'student-list', 45, 'Student List Submneu', 'Student List SubMneu', 1, 1, '2020-11-02 07:15:50', '2020-11-02 08:42:47'),
(33, 'batch_student', 'batch-student', 45, 'Batch Student Submenu', 'Batch Student SubMenu', 1, 1, '2020-11-02 07:16:31', '2020-11-02 08:42:24'),
(34, 're_admission', 're-admission', 45, 'Re-Admission Submenu', 'Re-admission SubMenu', 1, 1, '2020-11-02 07:17:22', '2020-11-02 08:42:07'),
(35, 'attendance', 'attendance', 40, 'Attendance Menu', 'Attendance Menu', 1, NULL, '2020-11-02 07:18:52', '2020-11-02 07:18:52'),
(36, 'daily_attendance', 'daily-attendance', 40, 'Daily Attendance Submenu', 'Daily Attendance SubMenu', 1, 1, '2020-11-02 07:20:56', '2020-11-02 08:39:24'),
(37, 'view_attendance', 'view-attendance', 40, 'View Attendance Submenu', 'View Attendance SubMenu', 1, 1, '2020-11-02 07:21:40', '2020-11-02 08:38:56'),
(38, 'examination', 'examination', 37, 'Examination Menu', 'Examination Menu', 1, NULL, '2020-11-02 07:22:55', '2020-11-02 07:22:55'),
(39, 'grade_info', 'grade-info', 37, 'Grade Info Submenu', 'Grade Info SubMenu', 1, 1, '2020-11-02 07:26:20', '2020-11-02 08:37:16'),
(40, 'create_exam_routine', 'create-exam-routine', 37, 'Create Exam & Routine Submenu', 'Create Exam & Routine SubMenu', 1, 1, '2020-11-02 07:27:53', '2020-11-02 08:38:04'),
(41, 'all_exam_list', 'all-exam-list', 37, 'All Exam List Submneu', 'All Exam List SubMneu', 1, 1, '2020-11-02 07:28:32', '2020-11-02 08:37:48'),
(42, 'input_marks', 'input-marks', 37, 'Input Marks Submenu', 'Input Marks SubMenu', 1, 1, '2020-11-02 07:29:13', '2020-11-02 08:37:33'),
(43, 'payment', 'payment', 32, 'Payment Menu', 'Payment Menu', 1, NULL, '2020-11-02 07:29:52', '2020-11-02 07:29:52'),
(44, 'collect_fees_batch', 'collect-fees-batch', 32, 'Collect Fees(Batch Wise) Submenu', 'Collect Fees(Batch Wise) SubMenu', 1, 1, '2020-11-02 07:40:35', '2020-11-02 08:38:37'),
(45, 'collect_fees_individual', 'collect-fees-individual', 32, 'Collect Fees(Individual) Submenu', 'Collect Fees(Individual) SubMenu', 1, 1, '2020-11-02 07:41:37', '2020-11-02 08:38:21'),
(46, 'due_payment', 'due-payment', 32, 'Due Payment Submenu', 'Due Payment SubMenu', 1, 1, '2020-11-02 07:42:20', '2020-11-02 08:37:01'),
(47, 'coupon', 'coupon', 28, 'Coupon Menu', 'Coupon Menu', 1, NULL, '2020-11-02 07:43:22', '2020-11-02 07:43:22'),
(48, 'show_coupon', 'show-coupon', 28, 'Show Coupons Submenu', 'Show Coupons SubMenu', 1, 1, '2020-11-02 07:50:43', '2020-11-02 08:35:17'),
(49, 'create_coupon', 'create-coupon', 28, 'Create Coupon Submenu', 'Create Coupon SubMenu', 1, 1, '2020-11-02 07:51:50', '2020-11-02 08:35:32'),
(50, 'search_coupon', 'search-coupon', 28, 'Search Coupon Submenu', 'Search Coupon SubMenu', 1, 1, '2020-11-02 07:52:35', '2020-11-02 08:35:48'),
(51, 'account', 'account', 24, 'Account Menu', 'Account Menu', 1, NULL, '2020-11-02 07:53:29', '2020-11-02 07:53:29'),
(52, 'income', 'income', 24, 'Income Submenu', 'Income SubMenu', 1, 1, '2020-11-02 07:54:09', '2020-11-02 08:36:43'),
(53, 'expense', 'expense', 24, 'Expense Submenu', 'Expense SubMenu', 1, 1, '2020-11-02 07:55:25', '2020-11-02 08:36:25'),
(54, 'expense_category', 'expense-category', 24, 'Expense Category Submenu', 'Expense Category SubMenu', 1, 1, '2020-11-02 07:56:46', '2020-11-02 08:36:04'),
(55, 'expense_list', 'expense-list', 24, 'Expense List Submenu', 'Expense List SubMenu', 1, 1, '2020-11-02 07:57:34', '2020-11-02 08:35:01'),
(56, 'add_expense', 'add-expense', 24, 'Add Expense Submenu', 'Add Expense SubMenu', 1, 1, '2020-11-02 07:58:17', '2020-11-02 08:34:44'),
(57, 'sms', 'sms', 21, 'Sms Menu', 'SMS Menu', 1, NULL, '2020-11-02 07:58:45', '2020-11-02 07:58:45'),
(58, 'sms_list', 'sms-list', 21, 'Sms List Submenu', 'SMS List SubMenu', 1, 1, '2020-11-02 07:59:20', '2020-11-02 08:34:23'),
(59, 'send_sms', 'send-sms', 21, 'Send Sms Submenu', 'Send SMS SubMenu', 1, 1, '2020-11-02 08:00:03', '2020-11-02 08:34:06'),
(60, 'report', 'report', 18, 'Report Menu', 'Report Menu', 1, NULL, '2020-11-02 08:00:37', '2020-11-02 08:00:37'),
(61, 'income_report', 'income-report', 18, 'Income Report Submenu', 'Income Report SubMenu', 1, 1, '2020-11-02 08:01:24', '2020-11-02 08:33:50'),
(62, 'expense_report', 'expense-report', 18, 'Expense Report Submenu', 'Expense Report SubMenu', 1, 1, '2020-11-02 08:02:10', '2020-11-02 08:33:33'),
(63, 'settings', 'settings', 15, 'Settings Menu', 'Settings Menu', 1, NULL, '2020-11-02 08:02:47', '2020-11-02 08:02:47'),
(64, 'system_settings', 'system-settings', 15, 'System Settings Submenu', 'System Settings SubMenu', 1, 1, '2020-11-02 08:04:58', '2020-11-02 08:33:14'),
(65, 'day_settings', 'day-settings', 15, 'Day Settings Submenu', 'Day Settings SubMenu', 1, 1, '2020-11-02 08:05:40', '2020-11-02 08:33:00'),
(66, 'modules', 'modules', 15, 'Modules Submenu', 'Modules SubMenu', 1, 1, '2020-11-02 08:06:21', '2020-11-02 08:32:46'),
(67, 'permissions', 'permissions', 15, 'Permissions Submenu', 'Permissions SubMenu', 1, 1, '2020-11-02 08:06:53', '2020-11-02 08:32:33'),
(68, 'roles', 'roles', 15, 'Roles Submenu', 'Roles SubMenu', 1, 1, '2020-11-02 08:07:30', '2020-11-02 08:32:20'),
(69, 'users', 'users', 15, 'Users Submenu', 'Users SubMenu', 1, 1, '2020-11-02 08:08:04', '2020-11-02 08:32:07'),
(70, 'view_student', 'view-student', 45, 'View Student Button', 'View Student Button', 1, NULL, '2020-11-02 22:25:53', '2020-11-02 22:25:53'),
(71, 'edit_student', 'edit-student', 45, 'Edit Student Button', 'Edit Student Button', 1, NULL, '2020-11-02 22:26:32', '2020-11-02 22:26:32'),
(72, 'delete_student', 'delete-student', 45, 'Delete Student Button', 'Delete Student button', 1, NULL, '2020-11-02 22:27:16', '2020-11-02 22:27:16'),
(73, 'add_student_btn', 'add-student-btn', 45, 'Add Student Button', 'Add Student Button', 1, NULL, '2020-11-02 22:29:51', '2020-11-02 22:29:51'),
(74, 'add_course_btn', 'add-course-btn', 60, 'Add Course Button', 'Add Course Button', 1, NULL, '2020-11-02 22:52:09', '2020-11-02 22:52:09'),
(75, 'edit_course', 'edit-course', 60, 'Edit Course Button', 'Edit Course Button', 1, NULL, '2020-11-02 22:52:42', '2020-11-02 22:52:42'),
(76, 'delete_course', 'delete-course', 60, 'Delete Course Button', 'Delete Course button', 1, NULL, '2020-11-02 22:53:40', '2020-11-02 22:53:40'),
(77, 'activate_course', 'activate-course', 60, 'Change Course Status Toggle', 'Change Course Status toggle', 1, 1, '2020-11-02 22:54:17', '2020-11-02 23:03:19'),
(78, 'add_subject_btn', 'add-subject-btn', 57, 'Add Subject Button', 'Add Subject Button', 1, NULL, '2020-11-02 22:57:39', '2020-11-02 22:57:39'),
(79, 'activate_subject', 'activate-subject', 57, 'Change Subject Status Toggle', 'Change Subject Status Toggle', 1, 1, '2020-11-02 22:58:24', '2020-11-02 23:05:46'),
(80, 'edit_subject', 'edit-subject', 57, 'Edit Subject Button', 'Edit Subject Button', 1, 1, '2020-11-02 22:58:58', '2020-11-02 23:05:29'),
(81, 'delete_subject', 'delete-subject', 57, 'Delete Subject Button', 'Delete Subject button', 1, 1, '2020-11-02 22:59:44', '2020-11-02 23:01:23'),
(82, 'edit_batch_category', 'edit-batch-category', 54, 'Edit Batch Category Button', 'Edit Batch Category Button', 1, NULL, '2020-11-02 23:10:56', '2020-11-02 23:10:56'),
(83, 'delete_batch_category', 'delete-batch-category', 54, 'Delete Batch Category Button', 'Delete Batch Category Button', 1, NULL, '2020-11-02 23:11:48', '2020-11-02 23:11:48'),
(84, 'add_batch_btn', 'add-batch-btn', 52, 'Add New Batch Button', 'Add New Batch Button', 1, NULL, '2020-11-02 23:14:54', '2020-11-02 23:14:54'),
(85, 'edit_batch', 'edit-batch', 52, 'Edit Batch Button', 'Edit Batch Button', 1, NULL, '2020-11-02 23:19:31', '2020-11-02 23:19:31'),
(86, 'delete_batch', 'delete-batch', 52, 'Delete Batch Button', 'Delete Batch Button', 1, NULL, '2020-11-02 23:20:17', '2020-11-02 23:20:17'),
(87, 'activate_batch', 'activate-batch', 52, 'Change Batch Status Toggle', 'Change Batch Status toggle', 1, NULL, '2020-11-02 23:21:45', '2020-11-02 23:21:45'),
(88, 'view_batch', 'view-batch', 52, 'View Batch Button', 'View Batch Button', 1, NULL, '2020-11-02 23:24:20', '2020-11-02 23:24:20'),
(89, 'view_archive_batch', 'view-archive-batch', 52, 'View Archive Batch Button', 'View Archive Batch Button', 1, NULL, '2020-11-02 23:26:20', '2020-11-02 23:26:20'),
(90, 'add_batch_schedule_btn', 'add-batch-schedule-btn', 48, 'Add Batch Schedule Button', 'Add Batch Schedule Button', 1, NULL, '2020-11-02 23:37:23', '2020-11-02 23:37:23'),
(91, 'edit_batch_schedule', 'edit-batch-schedule', 48, 'Edit Batch Schedule Button', 'Edit Batch Schedule Button', 1, 1, '2020-11-02 23:38:17', '2020-11-02 23:39:36'),
(92, 'delete_batch_schedule', 'delete-batch-schedule', 48, 'Delete Batch Schedule Button', 'Delete Batch Schedule Button', 1, NULL, '2020-11-02 23:39:04', '2020-11-02 23:39:04'),
(93, 'add_student_batchwise_btn', 'add-student-batchwise-btn', 45, 'Add Student Batchwise Button', 'Add Student Batchwise Button', 1, NULL, '2020-11-02 23:50:20', '2020-11-02 23:50:20'),
(94, 'edit_student_batchwise', 'edit-student-batchwise', 45, 'Edit Student Batchwise Button', 'Edit Student Batchwise Button', 1, 1, '2020-11-02 23:54:31', '2020-11-02 23:58:16'),
(95, 'delete_student_batchwise', 'delete-student-batchwise', 45, 'Delete Student Batchwise Button', 'Delete Student Batchwise Button', 1, 1, '2020-11-02 23:55:28', '2020-11-02 23:58:10'),
(96, 'view_student_batchwise', 'view-student-batchwise', 45, 'View Student Batchwise Button', 'View Student Batchwise Button', 1, 1, '2020-11-02 23:56:47', '2020-11-02 23:58:02'),
(97, 'attendance_edit', 'attendance-edit', 40, 'Edit Attendance Button', 'Edit Attendance Button', 1, NULL, '2020-11-03 00:11:33', '2020-11-03 00:11:33'),
(98, 'attendance_take', 'attendance-take', 40, 'Take Attendance Button', 'Take Attendance Button', 1, NULL, '2020-11-03 00:12:36', '2020-11-03 00:12:36'),
(99, 'add_grade_btn', 'add-grade-btn', 37, 'Add Exam Grade Button', 'Add Exam Grade Button', 1, NULL, '2020-11-03 00:49:57', '2020-11-03 00:49:57'),
(100, 'edit_grade', 'edit-grade', 37, 'Edit Exam Grade Button', 'Edit Exam Grade Button', 1, 1, '2020-11-03 00:52:02', '2020-11-03 00:58:42'),
(101, 'delete_grade', 'delete-grade', 37, 'Delete Exam Grade Button', 'Delete Exam Grade Button', 1, 1, '2020-11-03 00:52:34', '2020-11-03 00:58:23'),
(102, 'add_exam_btn', 'add-exam-btn', 37, 'Add Exam Button', 'Add Exam Button', 1, NULL, '2020-11-03 00:57:12', '2020-11-03 00:57:12'),
(103, 'edit_exam', 'edit-exam', 37, 'Edit Exam Button', 'Edit Exam Button', 1, NULL, '2020-11-03 00:57:53', '2020-11-03 00:57:53'),
(104, 'view_exam', 'view-exam', 37, 'View Exam Button', 'View Exam Button', 1, NULL, '2020-11-03 01:00:30', '2020-11-03 01:00:30'),
(105, 'delete_exam', 'delete-exam', 37, 'Delete Exam Button', 'Delete Exam Button', 1, NULL, '2020-11-03 01:01:32', '2020-11-03 01:01:32'),
(106, 'batchwise_collect_fees', 'batchwise-collect-fees', 32, 'Offline Batchwise Collect Fees Button', 'Offline Batchwise Collect Fees Button', 1, 1, '2020-11-03 01:06:32', '2020-11-03 01:09:04'),
(107, 'batchwise_add_payment', 'batchwise-add-payment', 32, 'Offline Batchwise Payment Page Add Payment Button', 'Offline Batchwise Payment page Add Payment Button', 1, 1, '2020-11-03 01:07:26', '2020-11-03 01:08:51'),
(108, 'individual_add_payment', 'individual-add-payment', 32, 'Offline Individual Payment Page Add Payment Button', 'Offline Individual Payment page Add Payment Button', 1, NULL, '2020-11-03 01:15:07', '2020-11-03 01:15:07'),
(109, 'individual_delete_payment', 'individual-delete-payment', 32, 'Offline Individual Payment Page Delete Payment Button', 'Offline Individual Payment page Delete Payment Button', 1, NULL, '2020-11-03 01:16:18', '2020-11-03 01:16:18'),
(110, 'make_due_payment', 'make-due-payment', 32, 'Offline Due Payment Button', 'Offline Due Payment Button', 1, NULL, '2020-11-03 01:17:03', '2020-11-03 01:17:03'),
(111, 'view_coupon', 'view-coupon', 28, 'View Coupon Button', 'View Coupon Button', 1, NULL, '2020-11-03 01:19:11', '2020-11-03 01:19:11'),
(112, 'add_coupon_btn', 'add-coupon-btn', 28, 'Add Coupon Button', 'Add Coupon Button', 1, NULL, '2020-11-03 01:19:55', '2020-11-03 01:19:55'),
(113, 'income_details_btn', 'income-details-btn', 18, 'Payment Report Income Details Button', 'Payment Report Income Details Button', 1, NULL, '2020-11-03 03:35:09', '2020-11-03 03:35:09'),
(114, 'add_expense_category_btn', 'add-expense-category-btn', 24, 'Add Expense Category Button', 'Add Expense Category Button', 1, NULL, '2020-11-03 03:38:34', '2020-11-03 03:38:34'),
(115, 'edit_expense_category', 'edit-expense-category', 24, 'Edit Expense Category Button', 'Edit Expense Category Button', 1, NULL, '2020-11-03 03:40:08', '2020-11-03 03:40:08'),
(116, 'delete_expense_category', 'delete-expense-category', 24, 'Delete Expense Category Button', 'Delete Expense Category Button', 1, NULL, '2020-11-03 03:41:24', '2020-11-03 03:41:24'),
(117, 'add_expense_btn', 'add-expense-btn', 24, 'Add Expense Button', 'Add Expense Button', 1, NULL, '2020-11-03 03:52:37', '2020-11-03 03:52:37'),
(118, 'edit_expense', 'edit-expense', 24, 'Edit Expense Button', 'Edit Expense Button', 1, NULL, '2020-11-03 03:54:25', '2020-11-03 03:54:25'),
(119, 'delete_expense', 'delete-expense', 24, 'Delete Expense Button', 'Delete Expense Button', 1, NULL, '2020-11-03 03:55:04', '2020-11-03 03:55:04'),
(120, 'add_modules', 'add-modules', 15, 'Add Modules Button', 'Add Modules Button', 1, NULL, '2020-11-03 03:58:44', '2020-11-03 03:58:44'),
(121, 'edit_modules', 'edit-modules', 15, 'Edit Modules Button', 'Edit Modules Button', 1, NULL, '2020-11-03 03:59:14', '2020-11-03 03:59:14'),
(122, 'delete_modules', 'delete-modules', 15, 'Delete Modules Button', 'Delete Modules Button', 1, NULL, '2020-11-03 03:59:46', '2020-11-03 03:59:46'),
(123, 'add_permissions', 'add-permissions', 15, 'Add Permission Button', 'Add Permission Button', 1, NULL, '2020-11-03 04:01:32', '2020-11-03 04:01:32'),
(124, 'edit_permissions', 'edit-permissions', 15, 'Edit Permission Button', 'Edit Permission Button', 1, NULL, '2020-11-03 04:02:47', '2020-11-03 04:02:47'),
(125, 'delete_permissions', 'delete-permissions', 15, 'Delete Permission Button', 'Delete Permission Button', 1, 1, '2020-11-03 04:04:58', '2020-11-03 04:06:39'),
(126, 'add_roles', 'add-roles', 15, 'Add Role Button', 'Add Role Button', 1, NULL, '2020-11-03 04:10:30', '2020-11-03 04:10:30'),
(127, 'edit_roles', 'edit-roles', 15, 'Edit Roles Button', 'Edit Roles Button', 1, NULL, '2020-11-03 04:11:20', '2020-11-03 04:11:20'),
(128, 'delete_roles', 'delete-roles', 15, 'Delete Role Button', 'Delete Role Button', 1, NULL, '2020-11-03 04:11:53', '2020-11-03 04:11:53'),
(129, 'add_users', 'add-users', 15, 'Add User Button', 'Add User Button', 1, NULL, '2020-11-03 04:14:56', '2020-11-03 04:14:56'),
(130, 'edit_users', 'edit-users', 15, 'Edit User Button', 'Edit User Button', 1, NULL, '2020-11-03 04:15:28', '2020-11-03 04:15:28'),
(131, 'delete_users', 'delete-users', 15, 'Delete User Button', 'Delete User Button', 1, NULL, '2020-11-03 04:15:59', '2020-11-03 04:15:59'),
(132, 'add_notice_btn', 'add-notice-btn', 1, 'Add Notice Button', 'Add Notice Button', 1, NULL, '2020-11-03 04:34:16', '2020-11-03 04:34:16'),
(133, 'edit_notice', 'edit-notice', 1, 'Edit Notice Button', 'Edit Notice Button', 1, NULL, '2020-11-03 04:34:52', '2020-11-03 04:34:52'),
(134, 'delete_notice', 'delete-notice', 1, 'Delete Notice Button', 'Delete Notice Button', 1, NULL, '2020-11-03 04:35:30', '2020-11-03 04:35:30'),
(135, 'view_notice', 'view-notice', 1, 'View Notice Button', 'View Notice Button', 1, NULL, '2020-11-03 04:36:27', '2020-11-03 04:36:27'),
(136, 'activate_notice', 'activate-notice', 1, 'Notice Status Toggle', 'Notice Status Toggle', 1, NULL, '2020-11-03 04:37:44', '2020-11-03 04:37:44'),
(137, 'add_news_btn', 'add-news-btn', 1, 'Add News Button', 'Add News Button', 1, NULL, '2020-11-03 04:48:59', '2020-11-03 04:48:59'),
(138, 'edit_news', 'edit-news', 1, 'Edit News Button', 'Edit News Button', 1, 1, '2020-11-03 04:50:06', '2020-11-03 04:50:32'),
(139, 'delete_news', 'delete-news', 1, 'Delete News Button', 'Delete News Button', 1, NULL, '2020-11-03 04:51:18', '2020-11-03 04:51:18'),
(140, 'view_news', 'view-news', 1, 'View News Button', 'View News Button', 1, NULL, '2020-11-03 04:51:52', '2020-11-03 04:51:52'),
(141, 'activate_news', 'activate-news', 1, 'News Status Toggle', 'News Status Toggle', 1, NULL, '2020-11-03 04:52:31', '2020-11-03 04:52:31'),
(142, 'add_event_btn', 'add-event-btn', 1, 'Add Event Button', 'Add Event Button', 1, NULL, '2020-11-03 05:04:21', '2020-11-03 05:04:21'),
(143, 'edit_event', 'edit-event', 1, 'Edit Event Button', 'Edit Event Button', 1, NULL, '2020-11-03 05:04:58', '2020-11-03 05:04:58'),
(144, 'delete_event', 'delete-event', 1, 'Delete Event Button', 'Delete Event Button', 1, NULL, '2020-11-03 05:05:35', '2020-11-03 05:05:35'),
(145, 'activate_event', 'activate-event', 1, 'Event Status Toggle', 'Event Status Toggle', 1, NULL, '2020-11-03 05:06:22', '2020-11-03 05:06:22'),
(146, 'view_event', 'view-event', 1, 'View Event Button', 'View Event Button', 1, NULL, '2020-11-03 05:07:05', '2020-11-03 05:07:05'),
(147, 'add_banner_image_btn', 'add-banner-image-btn', 1, 'Add Banner Image Button', 'Add Banner Image Button', 1, NULL, '2020-11-03 05:23:52', '2020-11-03 05:23:52'),
(148, 'view_banner_image', 'view-banner-image', 1, 'View Banner Image Button', 'View Banner Image Button', 1, 1, '2020-11-03 05:24:38', '2020-11-03 05:31:54'),
(149, 'delete_banner_image', 'delete-banner-image', 1, 'Delete Banner Image Button', 'Delete Banner Image Button', 1, NULL, '2020-11-03 05:25:25', '2020-11-03 05:25:25'),
(150, 'activate_banner_image', 'activate-banner-image', 1, 'Activate Banner Image', 'Activate Banner Image', 1, NULL, '2020-11-03 05:26:21', '2020-11-03 05:26:21'),
(151, 'view_contactus', 'view-contactus', 1, 'View Contact Us Button', 'View Contact us Button', 1, NULL, '2020-11-03 05:34:35', '2020-11-03 05:34:35'),
(152, 'send_sms_btn', 'send-sms-btn', 21, 'Send Sms Button', 'Send SMS Button', 1, NULL, '2020-11-03 05:37:59', '2020-11-03 05:37:59'),
(153, 'teachers', 'teachers', 67, 'Teachers Menu', 'Teachers Menu', 1, NULL, '2020-11-03 22:20:57', '2020-11-03 22:20:57'),
(154, 'add_teacher', 'add-teacher', 67, 'Add Teacher Submenu', 'Add Teacher Submenu', 1, NULL, '2020-11-03 22:23:49', '2020-11-03 22:23:49'),
(155, 'add_slider_image_btn', 'add-slider-image-btn', 1, 'Add Slider Image Button', 'Add Slider Image Button', 1, NULL, '2020-11-03 22:32:42', '2020-11-03 22:32:42'),
(156, 'activate_slider_image', 'activate-slider-image', 1, 'Change Slider Image Status Status Toggle', 'Change Slider Image Status Status toggle', 1, NULL, '2020-11-03 22:33:23', '2020-11-03 22:33:23'),
(157, 'view_slider_image', 'view-slider-image', 1, 'View Slider Image Button', 'View Slider Image Button', 1, NULL, '2020-11-03 22:34:02', '2020-11-03 22:34:02'),
(158, 'delete_slider_image', 'delete-slider-image', 1, 'Delete Slider Image Button', 'Delete Slider Image Button', 1, NULL, '2020-11-03 22:34:51', '2020-11-03 22:34:51'),
(159, 'teachers_list', 'teachers-list', 67, 'Teachers List Submenu', 'Teachers List Submenu', 1, NULL, '2020-11-03 22:37:04', '2020-11-03 22:37:04'),
(160, 'add_teacher_btn', 'add-teacher-btn', 67, 'Add Teacher Button', 'Add Teacher Button', 1, NULL, '2020-11-03 22:41:23', '2020-11-03 22:41:23'),
(161, 'view_teacher', 'view-teacher', 67, 'View Teacher Button', 'View Teacher Button', 1, NULL, '2020-11-03 22:41:56', '2020-11-03 22:41:56'),
(162, 'edit_teacher', 'edit-teacher', 67, 'Edit Teacher Button', 'Edit Teacher Button', 1, NULL, '2020-11-03 22:42:33', '2020-11-03 22:42:33'),
(163, 'delete_teacher', 'delete-teacher', 67, 'Delete Teacher Button', 'Delete Teacher Button', 1, NULL, '2020-11-03 22:43:10', '2020-11-03 22:43:10'),
(164, 'staff', 'staff', 68, 'Staff Menu', 'Staff Menu', 1, NULL, '2020-11-09 08:10:36', '2020-11-09 08:10:36'),
(165, 'staff_list', 'staff-list', 68, 'Staff List Submenu', 'Staff List SubMenu', 1, NULL, '2020-11-09 08:11:50', '2020-11-09 08:11:50'),
(166, 'add_staff', 'add-staff', 68, 'Add Staff Submenu', 'Add Staff SubMenu', 1, NULL, '2020-11-09 08:13:04', '2020-11-09 08:13:04'),
(167, 'view_staff', 'view-staff', 68, 'View Staff Button', 'View Staff button', 1, NULL, '2020-11-09 08:15:26', '2020-11-09 08:15:26'),
(168, 'edit_staff', 'edit-staff', 68, 'Edit Staff Button', 'Edit Staff Button', 1, NULL, '2020-11-09 08:16:40', '2020-11-09 08:16:40'),
(169, 'delete_staff', 'delete-staff', 68, 'Delete Staff Button', 'Delete Staff Button', 1, NULL, '2020-11-09 08:17:31', '2020-11-09 08:17:31'),
(170, 'notification_button', 'notification-button', 66, 'Notification Button In Header', 'Notification Button in Header', 1, NULL, '2020-11-11 06:47:30', '2020-11-11 06:47:30'),
(171, 'notification_drop-down', 'notification-drop-down', 66, 'Notification Drop-Down In Header', 'Notification Drop-Down in Header', 1, NULL, '2020-11-11 06:48:35', '2020-11-11 06:48:35'),
(172, 'change_image', 'change-image', 69, 'Change Image Profile', 'Change Image Profile', 1, NULL, '2020-11-12 03:07:05', '2020-11-12 03:07:05'),
(173, 'change_password', 'change-password', 69, 'Change Password Profile', 'Change Password Profile', 1, NULL, '2020-11-12 03:07:55', '2020-11-12 03:07:55'),
(174, 'update', 'update', 69, 'Update Button Profile', 'Update Button Profile', 1, NULL, '2020-11-12 03:09:56', '2020-11-12 03:09:56'),
(175, 'batch_seat_admin', 'batch-seat-admin', 45, 'Batch Seat Limitation Show By Admin', 'Batch Seat Limitation Show by Admin', 1, NULL, '2020-11-17 05:11:33', '2020-11-17 05:11:33'),
(176, 'batch_seat_manager', 'batch-seat-manager', 45, 'Batch Seat Limitation Shown By Manager', 'Batch Seat Limitation Shown by Manager', 1, NULL, '2020-11-17 05:12:37', '2020-11-17 05:12:37'),
(177, 'edit_weekDays', 'edit-weekdays', 15, 'Edit Weekdays Button', 'Edit weekDays Button', 1, NULL, '2020-11-17 05:37:03', '2020-11-17 05:37:03'),
(178, 'delete_weekDays', 'delete-weekdays', 15, 'Delete Weekdays Button', 'Delete weekDays Button', 1, NULL, '2020-11-17 05:38:00', '2020-11-17 05:38:00'),
(179, 'individual_edit_payment', 'individual-edit-payment', 32, 'Individual Edit Payment', 'individual_edit_payment', 1, NULL, '2020-12-07 10:07:17', '2020-12-07 10:07:17'),
(180, 'studentSearch', 'studentsearch', 45, 'Student Search By Thana, District, Institution, Address', 'Student Search by Thana, District, Institution, Address', 1, NULL, '2020-12-07 11:15:08', '2020-12-07 11:15:08'),
(181, 'batch_transfer', 'batch-transfer', 45, 'Batch Transfer', 'batch_transfer', 1, NULL, '2020-12-07 11:41:56', '2020-12-07 11:41:56'),
(182, 'dashboard_teachers', 'dashboard-teachers', 66, 'Dashboard Number Of Teachers', 'Dashboard Number of Teachers List', 1, NULL, '2020-12-09 08:11:12', '2020-12-09 08:11:12'),
(183, 'dashboard_due', 'dashboard-due', 66, 'Dashboard Due Count', 'Dashboard Due Count', 1, NULL, '2020-12-09 08:12:05', '2020-12-09 08:12:05'),
(184, 'student_course_name', 'student-course-name', 66, 'Dashboard Individual Student Course Name', 'Dashboard Individual Student Course Name', 1, NULL, '2020-12-09 08:13:44', '2020-12-09 08:13:44'),
(185, 'student_batch_name', 'student-batch-name', 66, 'Dashboard Individual Student Batch Name', 'Dashboard Individual Student Batch Name', 1, NULL, '2020-12-09 08:14:51', '2020-12-09 08:14:51'),
(186, 'student_due_amount', 'student-due-amount', 66, 'Dashboard Individual Student Due Amount', 'Dashboard Individual Student Due Amount', 1, NULL, '2020-12-09 08:16:53', '2020-12-09 08:16:53'),
(187, 'student_payment_amount', 'student-payment-amount', 66, 'Dashboard Student  Individual Payment Amount', 'Dashboard Student  Individual Payment Amount', 1, NULL, '2020-12-09 10:05:26', '2020-12-09 10:05:26'),
(188, 'profile_change_password', 'profile-change-password', 69, 'Profile Change Password Header', 'Profile Change Password Header', 1, 1, '2020-12-09 10:11:10', '2020-12-09 10:22:50'),
(189, 'idCard', 'idcard', 70, 'Id Card Menu', 'Id Card Menu', 1, 1, '2020-12-09 10:15:12', '2020-12-09 10:16:39'),
(190, 'view_class_routine', 'view-class-routine', 48, 'View Class Routine Button', 'View Class Routine Button', 1, NULL, '2020-12-09 10:34:50', '2020-12-09 10:34:50'),
(191, 'edit_class_routine', 'edit-class-routine', 48, 'Edit Class Routine Button', 'Edit Class Routine Button', 1, NULL, '2020-12-09 10:35:42', '2020-12-09 10:35:42'),
(192, 'delete_class_routine', 'delete-class-routine', 48, 'Delete Class Routine Button', 'Delete Class Routine Button', 1, NULL, '2020-12-09 10:36:45', '2020-12-09 10:36:45'),
(193, 'addTopic_class_routine', 'addtopic-class-routine', 48, 'Add Topic Class Routine Button', 'Add Topic Class Routine Button', 1, NULL, '2020-12-09 11:04:49', '2020-12-09 11:04:49'),
(194, 'zoom_communication', 'zoom-communication', 71, 'Communication Menu', 'zoom_communication', 1, NULL, '2021-01-13 17:23:41', '2021-01-13 17:23:41'),
(195, 'zoom_meeting_list', 'zoom-meeting-list', 71, 'Zoom Meeting List Submenu', 'zoom_meeting_list', 1, NULL, '2021-01-13 17:25:06', '2021-01-13 17:25:06'),
(196, 'zoom_meeting_create', 'zoom-meeting-create', 71, 'Zoom Meeting Create Submenu', 'zoom_meeting_create', 1, NULL, '2021-01-13 17:26:06', '2021-01-13 17:26:06'),
(197, 'zoom_api_list', 'zoom-api-list', 71, 'Zoom Api List Submenu', 'zoom_api_list', 1, NULL, '2021-01-13 17:27:24', '2021-01-13 17:27:24'),
(198, 'zoom_api_create', 'zoom-api-create', 71, 'Zoom Api Create Submenu', 'zoom_api_create', 1, NULL, '2021-01-13 17:28:24', '2021-01-13 17:28:24'),
(199, 'approve_btn', 'approve-btn', 72, 'Online Applicant Approve Button', 'approve_btn', 1, 1, '2021-01-14 05:13:43', '2021-01-14 05:38:37'),
(200, 'due_payment_btn', 'due-payment-btn', 72, 'Due Alert Payment Button', 'due_payment_btn', 1, 1, '2021-01-14 05:17:16', '2021-01-14 05:39:08'),
(201, 'zoom_meeting_status', 'zoom-meeting-status', 71, 'Zoom Meeting Status Button', 'zoom_meeting_status', 1, NULL, '2021-01-14 05:47:09', '2021-01-14 05:47:09'),
(202, 'zoom_meeting_delete', 'zoom-meeting-delete', 71, 'Zoom Meeting Delete Button', 'zoom_meeting_delete', 1, NULL, '2021-01-14 05:47:47', '2021-01-14 05:47:47'),
(203, 'online_applicant_list', 'online-applicant-list', 72, 'Online Applicant Submenu', 'Online Applicant Submenu', 1, NULL, '2021-01-30 07:34:46', '2021-01-30 07:34:46');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

DROP TABLE IF EXISTS `permission_role`;
CREATE TABLE IF NOT EXISTS `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_role_id_foreign` (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(3, 1),
(3, 2),
(4, 1),
(4, 2),
(5, 1),
(5, 2),
(6, 1),
(6, 2),
(7, 1),
(7, 2),
(8, 1),
(8, 2),
(9, 1),
(9, 2),
(9, 3),
(9, 4),
(9, 5),
(10, 1),
(10, 2),
(10, 4),
(11, 1),
(11, 2),
(11, 4),
(12, 1),
(12, 2),
(12, 4),
(12, 5),
(13, 1),
(13, 2),
(13, 5),
(14, 1),
(14, 2),
(14, 5),
(15, 1),
(15, 2),
(15, 3),
(15, 4),
(15, 5),
(16, 1),
(16, 2),
(16, 5),
(17, 1),
(17, 2),
(17, 3),
(17, 4),
(18, 1),
(18, 2),
(18, 4),
(19, 1),
(19, 2),
(19, 5),
(20, 1),
(20, 2),
(20, 4),
(20, 5),
(21, 1),
(21, 2),
(22, 1),
(22, 2),
(23, 1),
(23, 2),
(23, 4),
(24, 1),
(24, 2),
(25, 1),
(25, 2),
(25, 4),
(26, 1),
(26, 2),
(27, 1),
(27, 2),
(27, 3),
(27, 4),
(28, 1),
(28, 2),
(28, 3),
(28, 4),
(29, 1),
(29, 2),
(30, 1),
(30, 2),
(30, 3),
(30, 4),
(30, 5),
(31, 1),
(31, 2),
(31, 5),
(32, 1),
(32, 2),
(32, 3),
(32, 4),
(32, 5),
(33, 1),
(33, 2),
(33, 4),
(33, 5),
(34, 1),
(34, 2),
(35, 1),
(35, 2),
(35, 5),
(36, 1),
(36, 2),
(36, 5),
(37, 1),
(37, 2),
(37, 5),
(38, 1),
(39, 1),
(39, 2),
(40, 1),
(40, 2),
(41, 1),
(41, 2),
(42, 1),
(42, 2),
(43, 1),
(43, 2),
(43, 5),
(44, 1),
(44, 2),
(44, 5),
(45, 1),
(45, 2),
(45, 5),
(46, 1),
(46, 2),
(46, 5),
(47, 1),
(47, 2),
(48, 1),
(48, 2),
(49, 1),
(49, 2),
(50, 1),
(50, 2),
(51, 1),
(51, 2),
(51, 5),
(52, 1),
(52, 2),
(53, 1),
(53, 2),
(53, 5),
(54, 1),
(54, 2),
(54, 5),
(55, 1),
(55, 2),
(55, 5),
(56, 1),
(56, 2),
(56, 5),
(57, 1),
(57, 2),
(58, 1),
(58, 2),
(59, 1),
(59, 2),
(60, 1),
(60, 2),
(61, 1),
(61, 2),
(61, 5),
(62, 1),
(62, 2),
(62, 5),
(63, 1),
(63, 2),
(64, 1),
(65, 1),
(66, 1),
(67, 1),
(67, 2),
(68, 1),
(68, 2),
(69, 1),
(69, 2),
(70, 1),
(70, 2),
(70, 3),
(70, 4),
(70, 5),
(71, 1),
(71, 2),
(71, 5),
(72, 1),
(73, 1),
(73, 2),
(73, 5),
(74, 1),
(74, 2),
(74, 5),
(75, 1),
(75, 2),
(76, 1),
(77, 1),
(77, 2),
(77, 5),
(78, 1),
(78, 2),
(78, 5),
(79, 1),
(79, 2),
(79, 5),
(80, 1),
(80, 2),
(81, 1),
(82, 1),
(82, 2),
(83, 1),
(84, 1),
(84, 2),
(85, 1),
(85, 2),
(86, 1),
(87, 1),
(87, 2),
(88, 1),
(88, 2),
(89, 1),
(89, 2),
(90, 1),
(90, 2),
(91, 1),
(91, 2),
(92, 1),
(93, 1),
(93, 2),
(93, 5),
(94, 1),
(94, 2),
(94, 5),
(95, 1),
(96, 1),
(96, 2),
(96, 4),
(96, 5),
(97, 1),
(97, 2),
(98, 1),
(98, 2),
(98, 5),
(99, 1),
(99, 2),
(100, 1),
(100, 2),
(101, 1),
(102, 1),
(102, 2),
(103, 1),
(103, 2),
(104, 1),
(104, 2),
(105, 1),
(106, 1),
(106, 2),
(106, 5),
(107, 1),
(107, 2),
(107, 5),
(108, 1),
(108, 2),
(108, 5),
(109, 1),
(110, 1),
(110, 2),
(110, 5),
(111, 1),
(111, 2),
(112, 1),
(112, 2),
(113, 1),
(113, 2),
(113, 5),
(114, 1),
(114, 2),
(114, 5),
(115, 1),
(115, 2),
(115, 5),
(116, 1),
(117, 1),
(117, 2),
(117, 5),
(118, 1),
(118, 2),
(118, 5),
(119, 1),
(120, 1),
(121, 1),
(122, 1),
(123, 1),
(124, 1),
(125, 1),
(126, 1),
(126, 2),
(127, 1),
(127, 2),
(128, 1),
(129, 1),
(129, 2),
(130, 1),
(130, 2),
(131, 1),
(132, 1),
(132, 2),
(133, 1),
(133, 2),
(134, 1),
(134, 2),
(135, 1),
(135, 2),
(136, 1),
(136, 2),
(137, 1),
(137, 2),
(138, 1),
(138, 2),
(139, 1),
(139, 2),
(140, 1),
(140, 2),
(141, 1),
(141, 2),
(142, 1),
(142, 2),
(143, 1),
(143, 2),
(144, 1),
(144, 2),
(145, 1),
(145, 2),
(146, 1),
(146, 2),
(147, 1),
(147, 2),
(148, 1),
(148, 2),
(149, 1),
(149, 2),
(150, 1),
(150, 2),
(151, 1),
(151, 2),
(152, 1),
(152, 2),
(153, 1),
(153, 2),
(153, 4),
(154, 1),
(154, 2),
(155, 1),
(155, 2),
(156, 1),
(156, 2),
(157, 1),
(157, 2),
(158, 1),
(158, 2),
(159, 1),
(159, 2),
(159, 4),
(160, 1),
(160, 2),
(161, 1),
(161, 2),
(162, 1),
(162, 2),
(163, 1),
(164, 1),
(164, 2),
(165, 1),
(165, 2),
(166, 1),
(166, 2),
(167, 1),
(167, 2),
(168, 1),
(168, 2),
(169, 1),
(170, 1),
(170, 2),
(171, 1),
(171, 2),
(172, 1),
(172, 2),
(172, 4),
(172, 5),
(173, 1),
(173, 2),
(173, 4),
(173, 5),
(174, 1),
(174, 2),
(174, 4),
(174, 5),
(175, 1),
(175, 2),
(176, 5),
(179, 1),
(179, 2),
(180, 1),
(180, 5),
(181, 1),
(181, 2),
(182, 1),
(182, 2),
(183, 1),
(183, 2),
(183, 5),
(184, 3),
(185, 3),
(186, 3),
(187, 3),
(188, 1),
(188, 2),
(188, 4),
(188, 5),
(189, 1),
(189, 2),
(190, 1),
(190, 2),
(190, 3),
(190, 4),
(191, 1),
(191, 2),
(192, 1),
(193, 1),
(193, 2),
(193, 4),
(194, 1),
(194, 2),
(194, 3),
(194, 4),
(195, 1),
(195, 2),
(195, 3),
(195, 4),
(196, 1),
(196, 2),
(197, 1),
(198, 1),
(199, 1),
(199, 2),
(199, 5),
(200, 1),
(200, 2),
(200, 5),
(201, 1),
(201, 2),
(202, 1),
(203, 1),
(203, 2),
(203, 5);

-- --------------------------------------------------------

--
-- Table structure for table `permission_user`
--

DROP TABLE IF EXISTS `permission_user`;
CREATE TABLE IF NOT EXISTS `permission_user` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`,`permission_id`,`user_type`),
  KEY `permission_user_permission_id_foreign` (`permission_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_user`
--

INSERT INTO `permission_user` (`permission_id`, `user_id`, `user_type`) VALUES
(1, 2, 'App\\User'),
(2, 2, 'App\\User'),
(3, 2, 'App\\User'),
(4, 2, 'App\\User'),
(5, 2, 'App\\User'),
(6, 2, 'App\\User'),
(7, 2, 'App\\User'),
(8, 2, 'App\\User'),
(9, 2, 'App\\User'),
(10, 2, 'App\\User'),
(11, 2, 'App\\User'),
(12, 2, 'App\\User'),
(13, 2, 'App\\User'),
(14, 2, 'App\\User'),
(15, 2, 'App\\User'),
(16, 2, 'App\\User'),
(17, 2, 'App\\User'),
(18, 2, 'App\\User'),
(19, 2, 'App\\User'),
(20, 2, 'App\\User'),
(21, 2, 'App\\User'),
(22, 2, 'App\\User'),
(23, 2, 'App\\User'),
(24, 2, 'App\\User'),
(25, 2, 'App\\User'),
(26, 2, 'App\\User'),
(27, 2, 'App\\User'),
(28, 2, 'App\\User'),
(29, 2, 'App\\User'),
(30, 2, 'App\\User'),
(31, 2, 'App\\User'),
(32, 2, 'App\\User'),
(33, 2, 'App\\User'),
(34, 2, 'App\\User'),
(35, 2, 'App\\User'),
(36, 2, 'App\\User'),
(37, 2, 'App\\User'),
(39, 2, 'App\\User'),
(40, 2, 'App\\User'),
(41, 2, 'App\\User'),
(42, 2, 'App\\User'),
(43, 2, 'App\\User'),
(44, 2, 'App\\User'),
(45, 2, 'App\\User'),
(46, 2, 'App\\User'),
(47, 2, 'App\\User'),
(48, 2, 'App\\User'),
(49, 2, 'App\\User'),
(50, 2, 'App\\User'),
(51, 2, 'App\\User'),
(52, 2, 'App\\User'),
(53, 2, 'App\\User'),
(54, 2, 'App\\User'),
(55, 2, 'App\\User'),
(56, 2, 'App\\User'),
(57, 2, 'App\\User'),
(58, 2, 'App\\User'),
(59, 2, 'App\\User'),
(60, 2, 'App\\User'),
(61, 2, 'App\\User'),
(62, 2, 'App\\User'),
(63, 2, 'App\\User'),
(67, 2, 'App\\User'),
(68, 2, 'App\\User'),
(69, 2, 'App\\User'),
(70, 2, 'App\\User'),
(71, 2, 'App\\User'),
(73, 2, 'App\\User'),
(74, 2, 'App\\User'),
(75, 2, 'App\\User'),
(77, 2, 'App\\User'),
(78, 2, 'App\\User'),
(79, 2, 'App\\User'),
(80, 2, 'App\\User'),
(82, 2, 'App\\User'),
(84, 2, 'App\\User'),
(85, 2, 'App\\User'),
(87, 2, 'App\\User'),
(88, 2, 'App\\User'),
(89, 2, 'App\\User'),
(90, 2, 'App\\User'),
(91, 2, 'App\\User'),
(93, 2, 'App\\User'),
(94, 2, 'App\\User'),
(96, 2, 'App\\User'),
(97, 2, 'App\\User'),
(98, 2, 'App\\User'),
(99, 2, 'App\\User'),
(100, 2, 'App\\User'),
(102, 2, 'App\\User'),
(103, 2, 'App\\User'),
(104, 2, 'App\\User'),
(106, 2, 'App\\User'),
(107, 2, 'App\\User'),
(108, 2, 'App\\User'),
(110, 2, 'App\\User'),
(111, 2, 'App\\User'),
(112, 2, 'App\\User'),
(113, 2, 'App\\User'),
(114, 2, 'App\\User'),
(115, 2, 'App\\User'),
(117, 2, 'App\\User'),
(118, 2, 'App\\User'),
(126, 2, 'App\\User'),
(127, 2, 'App\\User'),
(129, 2, 'App\\User'),
(130, 2, 'App\\User'),
(132, 2, 'App\\User'),
(133, 2, 'App\\User'),
(134, 2, 'App\\User'),
(135, 2, 'App\\User'),
(136, 2, 'App\\User'),
(137, 2, 'App\\User'),
(138, 2, 'App\\User'),
(139, 2, 'App\\User'),
(140, 2, 'App\\User'),
(141, 2, 'App\\User'),
(142, 2, 'App\\User'),
(143, 2, 'App\\User'),
(144, 2, 'App\\User'),
(145, 2, 'App\\User'),
(146, 2, 'App\\User'),
(147, 2, 'App\\User'),
(148, 2, 'App\\User'),
(149, 2, 'App\\User'),
(150, 2, 'App\\User'),
(151, 2, 'App\\User'),
(152, 2, 'App\\User'),
(153, 2, 'App\\User'),
(154, 2, 'App\\User'),
(155, 2, 'App\\User'),
(156, 2, 'App\\User'),
(157, 2, 'App\\User'),
(158, 2, 'App\\User'),
(159, 2, 'App\\User'),
(160, 2, 'App\\User'),
(161, 2, 'App\\User'),
(162, 2, 'App\\User'),
(164, 2, 'App\\User'),
(165, 2, 'App\\User'),
(166, 2, 'App\\User'),
(167, 2, 'App\\User'),
(168, 2, 'App\\User'),
(170, 2, 'App\\User'),
(171, 2, 'App\\User'),
(172, 2, 'App\\User'),
(173, 2, 'App\\User'),
(174, 2, 'App\\User'),
(175, 2, 'App\\User'),
(179, 2, 'App\\User'),
(181, 2, 'App\\User'),
(182, 2, 'App\\User'),
(183, 2, 'App\\User'),
(188, 2, 'App\\User'),
(189, 2, 'App\\User'),
(190, 2, 'App\\User'),
(191, 2, 'App\\User'),
(193, 2, 'App\\User'),
(194, 2, 'App\\User'),
(195, 2, 'App\\User'),
(196, 2, 'App\\User'),
(199, 2, 'App\\User'),
(200, 2, 'App\\User'),
(201, 2, 'App\\User'),
(9, 3, 'App\\User'),
(10, 3, 'App\\User'),
(11, 3, 'App\\User'),
(12, 3, 'App\\User'),
(13, 3, 'App\\User'),
(14, 3, 'App\\User'),
(30, 3, 'App\\User'),
(31, 3, 'App\\User'),
(32, 3, 'App\\User'),
(33, 3, 'App\\User'),
(34, 3, 'App\\User'),
(43, 3, 'App\\User'),
(44, 3, 'App\\User'),
(45, 3, 'App\\User'),
(46, 3, 'App\\User'),
(51, 3, 'App\\User'),
(52, 3, 'App\\User'),
(53, 3, 'App\\User'),
(54, 3, 'App\\User'),
(55, 3, 'App\\User'),
(56, 3, 'App\\User'),
(60, 3, 'App\\User'),
(61, 3, 'App\\User'),
(62, 3, 'App\\User'),
(70, 3, 'App\\User'),
(71, 3, 'App\\User'),
(73, 3, 'App\\User'),
(93, 3, 'App\\User'),
(94, 3, 'App\\User'),
(96, 3, 'App\\User'),
(106, 3, 'App\\User'),
(107, 3, 'App\\User'),
(108, 3, 'App\\User'),
(110, 3, 'App\\User'),
(113, 3, 'App\\User'),
(114, 3, 'App\\User'),
(115, 3, 'App\\User'),
(117, 3, 'App\\User'),
(118, 3, 'App\\User'),
(176, 3, 'App\\User'),
(183, 3, 'App\\User'),
(9, 4, 'App\\User'),
(12, 4, 'App\\User'),
(13, 4, 'App\\User'),
(14, 4, 'App\\User'),
(15, 4, 'App\\User'),
(16, 4, 'App\\User'),
(19, 4, 'App\\User'),
(20, 4, 'App\\User'),
(30, 4, 'App\\User'),
(31, 4, 'App\\User'),
(32, 4, 'App\\User'),
(33, 4, 'App\\User'),
(35, 4, 'App\\User'),
(36, 4, 'App\\User'),
(37, 4, 'App\\User'),
(43, 4, 'App\\User'),
(44, 4, 'App\\User'),
(45, 4, 'App\\User'),
(46, 4, 'App\\User'),
(51, 4, 'App\\User'),
(53, 4, 'App\\User'),
(54, 4, 'App\\User'),
(55, 4, 'App\\User'),
(56, 4, 'App\\User'),
(61, 4, 'App\\User'),
(62, 4, 'App\\User'),
(70, 4, 'App\\User'),
(71, 4, 'App\\User'),
(73, 4, 'App\\User'),
(74, 4, 'App\\User'),
(77, 4, 'App\\User'),
(78, 4, 'App\\User'),
(79, 4, 'App\\User'),
(93, 4, 'App\\User'),
(94, 4, 'App\\User'),
(96, 4, 'App\\User'),
(98, 4, 'App\\User'),
(106, 4, 'App\\User'),
(107, 4, 'App\\User'),
(108, 4, 'App\\User'),
(110, 4, 'App\\User'),
(113, 4, 'App\\User'),
(114, 4, 'App\\User'),
(115, 4, 'App\\User'),
(117, 4, 'App\\User'),
(118, 4, 'App\\User'),
(172, 4, 'App\\User'),
(173, 4, 'App\\User'),
(174, 4, 'App\\User'),
(176, 4, 'App\\User'),
(180, 4, 'App\\User'),
(183, 4, 'App\\User'),
(188, 4, 'App\\User'),
(195, 4, 'App\\User'),
(200, 4, 'App\\User'),
(9, 5, 'App\\User'),
(12, 5, 'App\\User'),
(13, 5, 'App\\User'),
(14, 5, 'App\\User'),
(15, 5, 'App\\User'),
(16, 5, 'App\\User'),
(19, 5, 'App\\User'),
(20, 5, 'App\\User'),
(30, 5, 'App\\User'),
(31, 5, 'App\\User'),
(32, 5, 'App\\User'),
(33, 5, 'App\\User'),
(35, 5, 'App\\User'),
(36, 5, 'App\\User'),
(37, 5, 'App\\User'),
(43, 5, 'App\\User'),
(44, 5, 'App\\User'),
(45, 5, 'App\\User'),
(46, 5, 'App\\User'),
(51, 5, 'App\\User'),
(53, 5, 'App\\User'),
(54, 5, 'App\\User'),
(55, 5, 'App\\User'),
(56, 5, 'App\\User'),
(61, 5, 'App\\User'),
(62, 5, 'App\\User'),
(70, 5, 'App\\User'),
(71, 5, 'App\\User'),
(73, 5, 'App\\User'),
(74, 5, 'App\\User'),
(77, 5, 'App\\User'),
(78, 5, 'App\\User'),
(79, 5, 'App\\User'),
(93, 5, 'App\\User'),
(94, 5, 'App\\User'),
(96, 5, 'App\\User'),
(98, 5, 'App\\User'),
(106, 5, 'App\\User'),
(107, 5, 'App\\User'),
(108, 5, 'App\\User'),
(110, 5, 'App\\User'),
(113, 5, 'App\\User'),
(114, 5, 'App\\User'),
(115, 5, 'App\\User'),
(117, 5, 'App\\User'),
(118, 5, 'App\\User'),
(173, 5, 'App\\User'),
(174, 5, 'App\\User'),
(176, 5, 'App\\User'),
(180, 5, 'App\\User'),
(183, 5, 'App\\User'),
(188, 5, 'App\\User'),
(199, 5, 'App\\User'),
(200, 5, 'App\\User'),
(9, 6, 'App\\User'),
(12, 6, 'App\\User'),
(13, 6, 'App\\User'),
(14, 6, 'App\\User'),
(15, 6, 'App\\User'),
(16, 6, 'App\\User'),
(19, 6, 'App\\User'),
(20, 6, 'App\\User'),
(30, 6, 'App\\User'),
(31, 6, 'App\\User'),
(32, 6, 'App\\User'),
(33, 6, 'App\\User'),
(35, 6, 'App\\User'),
(36, 6, 'App\\User'),
(37, 6, 'App\\User'),
(43, 6, 'App\\User'),
(44, 6, 'App\\User'),
(45, 6, 'App\\User'),
(46, 6, 'App\\User'),
(51, 6, 'App\\User'),
(53, 6, 'App\\User'),
(54, 6, 'App\\User'),
(55, 6, 'App\\User'),
(56, 6, 'App\\User'),
(61, 6, 'App\\User'),
(62, 6, 'App\\User'),
(70, 6, 'App\\User'),
(71, 6, 'App\\User'),
(73, 6, 'App\\User'),
(74, 6, 'App\\User'),
(77, 6, 'App\\User'),
(78, 6, 'App\\User'),
(79, 6, 'App\\User'),
(93, 6, 'App\\User'),
(94, 6, 'App\\User'),
(96, 6, 'App\\User'),
(98, 6, 'App\\User'),
(106, 6, 'App\\User'),
(107, 6, 'App\\User'),
(108, 6, 'App\\User'),
(110, 6, 'App\\User'),
(114, 6, 'App\\User'),
(115, 6, 'App\\User'),
(117, 6, 'App\\User'),
(118, 6, 'App\\User'),
(172, 6, 'App\\User'),
(174, 6, 'App\\User'),
(176, 6, 'App\\User'),
(180, 6, 'App\\User'),
(183, 6, 'App\\User'),
(188, 6, 'App\\User'),
(194, 6, 'App\\User'),
(199, 6, 'App\\User'),
(200, 6, 'App\\User'),
(9, 9, 'App\\User'),
(15, 9, 'App\\User'),
(17, 9, 'App\\User'),
(27, 9, 'App\\User'),
(28, 9, 'App\\User'),
(30, 9, 'App\\User'),
(32, 9, 'App\\User'),
(70, 9, 'App\\User'),
(184, 9, 'App\\User'),
(185, 9, 'App\\User'),
(186, 9, 'App\\User'),
(187, 9, 'App\\User'),
(190, 9, 'App\\User'),
(194, 9, 'App\\User'),
(195, 9, 'App\\User');

-- --------------------------------------------------------

--
-- Table structure for table `phone_books`
--

DROP TABLE IF EXISTS `phone_books`;
CREATE TABLE IF NOT EXISTS `phone_books` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `group_no` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` tinyint(4) DEFAULT NULL,
  `updated_by` tinyint(4) DEFAULT NULL,
  `deleted_by` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `phone_book_groups`
--

DROP TABLE IF EXISTS `phone_book_groups`;
CREATE TABLE IF NOT EXISTS `phone_book_groups` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `group_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` tinyint(4) DEFAULT NULL,
  `updated_by` tinyint(4) DEFAULT NULL,
  `deleted_by` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `phone_book_groups`
--

INSERT INTO `phone_book_groups` (`id`, `group_name`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, 'Friends', '2020-11-28 08:49:30', '2020-11-29 05:23:59', NULL, 1, 1, NULL),
(2, 'Family', '2020-11-28 08:51:13', '2020-11-29 05:23:42', NULL, 1, 1, 1),
(3, 'Relatives', '2020-11-28 09:41:46', '2020-11-28 09:41:46', NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

DROP TABLE IF EXISTS `photos`;
CREATE TABLE IF NOT EXISTS `photos` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `gallery_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` tinyint(4) DEFAULT NULL,
  `updated_by` tinyint(4) DEFAULT NULL,
  `deleted_by` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `gallery_id`, `image`, `status`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(46, '9', '1602937393.1600922476.png', 1, '2020-10-17 06:23:13', '2020-10-17 06:23:13', NULL, 1, NULL, NULL),
(45, '9', '1602937393.1600922458.jPg', 1, '2020-10-17 06:23:13', '2020-10-17 06:23:13', NULL, 1, NULL, NULL),
(44, '9', '1602937335.register-bg.jpg', 1, '2020-10-17 06:22:15', '2020-10-17 06:22:15', NULL, 1, NULL, NULL),
(43, '9', '1602937335.register_2.jpg', 1, '2020-10-17 06:22:15', '2020-10-17 06:22:15', NULL, 1, NULL, NULL),
(40, '9', '1602937334.lockscreen-bg.jpg', 1, '2020-10-17 06:22:14', '2020-10-17 06:22:14', NULL, 1, NULL, NULL),
(41, '9', '1602937334.login_2.jpg', 1, '2020-10-17 06:22:15', '2020-10-17 06:22:15', NULL, 1, NULL, NULL),
(42, '9', '1602937335.login-bg.jpg', 1, '2020-10-17 06:22:15', '2020-10-17 06:22:15', NULL, 1, NULL, NULL),
(47, '10', '1603523796.lockscreen-bg.jpg', 1, '2020-10-24 01:16:37', '2020-10-24 01:16:37', NULL, 1, NULL, NULL),
(48, '10', '1603523797.login_2.jpg', 1, '2020-10-24 01:16:37', '2020-10-24 01:16:37', NULL, 1, NULL, NULL),
(49, '10', '1603523797.login-bg.jpg', 1, '2020-10-24 01:16:38', '2020-10-24 01:16:38', NULL, 1, NULL, NULL),
(50, '10', '1603523798.register_2.jpg', 1, '2020-10-24 01:16:38', '2020-10-24 01:16:38', NULL, 1, NULL, NULL),
(51, '10', '1603523798.register-bg.jpg', 1, '2020-10-24 01:16:38', '2020-10-24 01:16:38', NULL, 1, NULL, NULL),
(52, '11', '1603537360.1.jpg', 1, '2020-10-24 05:02:40', '2020-10-24 05:02:40', NULL, 1, NULL, NULL),
(53, '11', '1603537360.2.jpg', 1, '2020-10-24 05:02:41', '2020-10-24 05:02:41', NULL, 1, NULL, NULL),
(54, '12', 'default.jpg', 1, '2021-01-17 08:21:45', '2021-01-17 08:21:45', NULL, 1, NULL, NULL),
(55, '11', '1612258002.1601033716.png', 1, '2021-02-02 09:26:43', '2021-02-02 09:26:43', NULL, 1, NULL, NULL),
(56, '10', '1612258023.1601104053.jPg', 1, '2021-02-02 09:27:04', '2021-02-02 09:27:04', NULL, 1, NULL, NULL),
(57, '9', '1612258065.default.jpg', 1, '2021-02-02 09:27:45', '2021-02-02 09:27:45', NULL, 1, NULL, NULL),
(58, '11', '1612258276.1600922476.png', 1, '2021-02-02 09:31:16', '2021-02-02 09:31:16', NULL, 1, NULL, NULL),
(59, '13', '1612258491.1600922476.png', 1, '2021-02-02 09:34:52', '2021-02-02 09:34:52', NULL, 1, NULL, NULL),
(60, '13', '1612258653.abc.png', 1, '2021-02-02 09:37:33', '2021-02-02 09:37:33', NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `keywords` text COLLATE utf8mb4_unicode_ci,
  `created_by` tinyint(3) UNSIGNED DEFAULT NULL,
  `updated_by` tinyint(3) UNSIGNED DEFAULT NULL,
  `deleted_by` tinyint(3) UNSIGNED DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_images`
--

DROP TABLE IF EXISTS `post_images`;
CREATE TABLE IF NOT EXISTS `post_images` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `post_id` bigint(20) NOT NULL,
  `image_file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_image` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

DROP TABLE IF EXISTS `results`;
CREATE TABLE IF NOT EXISTS `results` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `student_id` int(11) NOT NULL,
  `degree` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `institution` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `group` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `result` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_mark` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passingYear` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` tinyint(4) DEFAULT NULL,
  `updated_by` tinyint(4) DEFAULT NULL,
  `deleted_by` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` tinyint(4) DEFAULT NULL,
  `updated_by` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `slug`, `display_name`, `description`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'super-admin', 'Super Admin', 'super-admin', 1, 1, '2020-11-02 05:25:20', '2020-11-02 08:10:33'),
(2, 'Admin', 'admin', 'Admin', 'admin', 1, 1, '2020-11-02 05:25:46', '2020-11-02 08:12:20'),
(3, 'Student', 'student', 'Student', 'student', 1, 1, '2020-11-02 05:26:11', '2020-11-02 08:47:34'),
(4, 'Teacher', 'teacher', 'Teacher', 'teacher', 1, 1, '2020-11-05 03:07:37', '2020-11-11 09:15:22'),
(5, 'Manager', 'manager', 'Manager', 'manager', 1, 1, '2020-11-09 09:42:34', '2021-01-14 04:48:49');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

DROP TABLE IF EXISTS `role_user`;
CREATE TABLE IF NOT EXISTS `role_user` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  KEY `role_user_role_id_foreign` (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`, `user_type`) VALUES
(1, 1, 'App\\User'),
(2, 2, 'App\\User'),
(5, 3, 'App\\User'),
(5, 4, 'App\\User'),
(5, 5, 'App\\User'),
(5, 6, 'App\\User'),
(5, 7, 'App\\User'),
(3, 9, 'App\\User');

-- --------------------------------------------------------

--
-- Table structure for table `slider_images`
--

DROP TABLE IF EXISTS `slider_images`;
CREATE TABLE IF NOT EXISTS `slider_images` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` tinyint(4) DEFAULT NULL,
  `updated_by` tinyint(4) DEFAULT NULL,
  `deleted_by` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slider_images`
--

INSERT INTO `slider_images` (`id`, `image`, `status`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(9, '1603277552-3.jpg', 0, '2020-10-21 04:52:32', '2021-01-18 06:09:58', '2021-01-18 06:09:58', 1, 1, 1),
(7, '1603277527-1.jpg', 0, '2020-10-21 04:52:07', '2021-01-18 06:08:53', '2021-01-18 06:08:53', 1, 1, 1),
(8, '1603277541-2.jpg', 0, '2020-10-21 04:52:21', '2021-01-18 06:10:01', '2021-01-18 06:10:01', 1, 1, 1),
(10, '1609650262-1605417096-Banner-2.jpg', 0, '2021-01-03 05:04:23', '2021-01-03 05:05:34', '2021-01-03 05:05:34', 1, 1, 1),
(11, '1609650275-1605417111-Banner-3.jpg', 0, '2021-01-03 05:04:35', '2021-02-02 07:49:28', '2021-02-02 07:49:28', 1, 1, 1),
(12, '1609650291-1605418737-Banner-2.jpg', 0, '2021-01-03 05:04:52', '2021-01-18 06:09:41', '2021-01-18 06:09:41', 1, 1, 1),
(13, '1609650356-1605417125-Banner-1.jpg', 0, '2021-01-03 05:05:56', '2021-01-18 06:09:06', '2021-01-18 06:09:06', 1, 1, 1),
(14, '1610871569-1605417096-Banner-2.jpg', 1, '2021-01-17 08:19:30', '2021-01-18 06:09:34', '2021-01-18 06:09:34', 1, 1, 1),
(15, '1610871591-1605417111-Banner-3.jpg', 1, '2021-01-17 08:19:52', '2021-01-18 06:09:27', '2021-01-18 06:09:27', 1, 1, 1),
(16, '1610871612-1605417125-Banner-1.jpg', 1, '2021-01-17 08:20:13', '2021-01-18 06:09:20', '2021-01-18 06:09:20', 1, 1, 1),
(17, '1610950248-WEB-SLIDE-academy-001-conferm.jpg', 1, '2021-01-18 06:10:48', '2021-02-02 07:51:24', '2021-02-02 07:51:24', 1, 1, 1),
(18, '1610950266-WEB-SLIDE-academy-003.jpg', 1, '2021-01-18 06:11:06', '2021-02-02 07:51:54', '2021-02-02 07:51:54', 1, 1, 1),
(19, '1610950283-WEB-SLIDE-academy-004.jpg', 1, '2021-01-18 06:11:24', '2021-02-02 07:51:47', '2021-02-02 07:51:47', 1, 1, 1),
(20, '1610950302-Web-Slider-IELTS-(Private)-004.jpg', 1, '2021-01-18 06:11:42', '2021-02-02 07:51:40', '2021-02-02 07:51:40', 1, 1, 1),
(21, '1610950320-Web-Slider-Spoken-and-Phonetics-001.jpg', 1, '2021-01-18 06:12:00', '2021-02-02 07:51:33', '2021-02-02 07:51:33', 1, 1, 1),
(22, '1612252380-examly1.jpg', 1, '2021-02-02 07:53:02', '2021-02-02 07:53:10', NULL, 1, 1, NULL),
(23, '1612252403-examly2.jpg', 1, '2021-02-02 07:53:25', '2021-02-02 07:53:33', NULL, 1, 1, NULL),
(24, '1612252431-desk.jpg', 1, '2021-02-02 07:53:52', '2021-02-02 07:54:46', NULL, 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sms`
--

DROP TABLE IF EXISTS `sms`;
CREATE TABLE IF NOT EXISTS `sms` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `send_though` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `batch_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `group_id` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` tinyint(4) DEFAULT NULL,
  `updated_by` tinyint(4) DEFAULT NULL,
  `deleted_by` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
CREATE TABLE IF NOT EXISTS `staff` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `batch_id` int(11) DEFAULT NULL,
  `designation` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` tinyint(4) DEFAULT NULL,
  `updated_by` tinyint(4) DEFAULT NULL,
  `deleted_by` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `user_id`, `batch_id`, `designation`, `address`, `details`, `status`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, 8, NULL, NULL, 'Rajshahi', NULL, 1, '2021-01-30 06:44:36', '2021-01-30 06:44:36', NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `moodle_user_id` int(20) DEFAULT NULL,
  `short_name` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `primary_contact_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `roll_no` int(11) NOT NULL,
  `student_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fa_occupation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fa_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fa_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fa_nid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ma_occupation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ma_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ma_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ma_nid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `present_address` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `permanent_address` text COLLATE utf8mb4_unicode_ci,
  `district` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thana` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `birth_id` int(11) DEFAULT NULL,
  `height` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `weight` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `blood_group` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `allergies` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `conditions` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `local_guardian` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `relation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `local_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `local_address` text COLLATE utf8mb4_unicode_ci,
  `local_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `school_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `school_roll_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `school_district` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `school_thana` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `result_1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `result_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `result_3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `result_4` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `batch_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `files` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` tinyint(4) DEFAULT NULL,
  `updated_by` tinyint(4) DEFAULT NULL,
  `deleted_by` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `user_id`, `moodle_user_id`, `short_name`, `primary_contact_no`, `roll_no`, `student_id`, `father_name`, `fa_occupation`, `fa_phone`, `fa_email`, `fa_nid`, `mother_name`, `ma_occupation`, `ma_phone`, `ma_email`, `ma_nid`, `present_address`, `permanent_address`, `district`, `thana`, `birth_date`, `birth_id`, `height`, `weight`, `blood_group`, `allergies`, `conditions`, `local_guardian`, `relation`, `local_phone`, `local_address`, `local_email`, `school_name`, `school_roll_no`, `class`, `school_district`, `school_thana`, `result_1`, `result_2`, `result_3`, `result_4`, `batch_id`, `image`, `files`, `deleted_at`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, 9, 7, NULL, NULL, 1, '211010001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, '2021-02-01 11:09:48', '2021-02-01 11:09:49', 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

DROP TABLE IF EXISTS `subjects`;
CREATE TABLE IF NOT EXISTS `subjects` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `description` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` tinyint(4) DEFAULT NULL,
  `updated_by` tinyint(4) DEFAULT NULL,
  `deleted_by` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `status`, `description`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, 'English', 1, NULL, '2021-02-01 11:07:28', '2021-02-01 11:07:28', NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sample`
--

DROP TABLE IF EXISTS `tbl_sample`;
CREATE TABLE IF NOT EXISTS `tbl_sample` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

DROP TABLE IF EXISTS `teachers`;
CREATE TABLE IF NOT EXISTS `teachers` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `batch_id` int(11) DEFAULT NULL,
  `designation` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `details` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` tinyint(4) DEFAULT NULL,
  `updated_by` tinyint(4) DEFAULT NULL,
  `deleted_by` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `temp_students`
--

DROP TABLE IF EXISTS `temp_students`;
CREATE TABLE IF NOT EXISTS `temp_students` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `moodle_user_id` int(20) DEFAULT NULL,
  `student_id` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `roll_no` int(20) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `course_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_fee` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_amount` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `coupon_code` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `admission_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `user_role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` tinyint(4) DEFAULT NULL,
  `updated_by` tinyint(4) DEFAULT NULL,
  `deleted_by` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `temp_students`
--

INSERT INTO `temp_students` (`id`, `user_id`, `moodle_user_id`, `student_id`, `roll_no`, `name`, `phone`, `email`, `password`, `course_name`, `batch_name`, `course_fee`, `payment_amount`, `coupon_code`, `admission_date`, `user_type`, `address`, `user_role`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, '10', NULL, '2021010002', 2, 'Md. Nazmul Hasan Abir', '01731283881', 'hdfh@gmail.com', 'nyiMLD71#', '1', '1', '10000', '10000', NULL, '02-02-2021', 'Student', NULL, '3', '2021-02-02 09:58:08', '2021-02-02 09:58:08', NULL, 1, NULL, NULL),
(2, '10', NULL, '2021010002', 2, 'Md. Nazmul Hasan Abir', '01731283881', 'hdfh@gmail.com', 'nyiMLD71#', '1', '1', '10000', '10000', NULL, '02-02-2021', 'Student', NULL, '3', '2021-02-02 09:58:56', '2021-02-02 09:58:56', NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

DROP TABLE IF EXISTS `testimonials`;
CREATE TABLE IF NOT EXISTS `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `author` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `place_employment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` tinyint(4) DEFAULT NULL,
  `updated_by` tinyint(4) DEFAULT NULL,
  `deleted_by` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `author`, `designation`, `place_employment`, `description`, `image`, `status`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, 'John Doe', 'Teacher', 'Yell', '', '1606712269-1600922458.jPg', 1, '2020-11-30 04:47:47', '2020-11-30 04:58:04', NULL, 1, 1, 1),
(2, 'asdads', 'asdasd', 'sadasd', '', 'testimonial_default.jpg', 0, '2020-11-30 06:37:02', '2020-11-30 06:37:02', NULL, 1, NULL, NULL),
(3, 'Hasan Kamal', 'Chairman', 'Alumni Society', '', 'testimonial_default.jpg', 1, '2020-11-30 06:40:04', '2020-11-30 06:40:04', NULL, 1, NULL, NULL),
(4, 'Fabiha Kalam', 'CEO', 'Unitech', '', 'testimonial_default.jpg', 1, '2020-11-30 06:40:47', '2020-11-30 06:40:47', NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `thanas`
--

DROP TABLE IF EXISTS `thanas`;
CREATE TABLE IF NOT EXISTS `thanas` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `district_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=595 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `thanas`
--

INSERT INTO `thanas` (`id`, `district_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 34, 'Amtali', '2020-10-29 23:47:25', '2016-04-06 06:48:39'),
(2, 34, 'Bamna ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(3, 34, 'Barguna Sadar ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(4, 34, 'Betagi ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(5, 34, 'Patharghata ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(6, 34, 'Taltali ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(7, 35, 'Muladi ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(8, 35, 'Babuganj ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(9, 35, 'Agailjhara ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(10, 35, 'Barisal Sadar ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(11, 35, 'Bakerganj ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(12, 35, 'Banaripara ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(13, 35, 'Gaurnadi ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(14, 35, 'Hizla ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(15, 35, 'Mehendiganj ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(16, 35, 'Wazirpur ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(17, 36, 'Bhola Sadar ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(18, 36, 'Burhanuddin ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(19, 36, 'Char Fasson ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(20, 36, 'Daulatkhan ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(21, 36, 'Lalmohan ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(22, 36, 'Manpura ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(23, 36, 'Tazumuddin ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(24, 37, 'Jhalokati Sadar ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(25, 37, 'Kathalia ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(26, 37, 'Nalchity ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(27, 37, 'Rajapur ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(28, 38, 'Bauphal ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(29, 38, 'Dashmina ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(30, 38, 'Galachipa ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(31, 38, 'Kalapara ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(32, 38, 'Mirzaganj ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(33, 38, 'Patuakhali Sadar ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(34, 38, 'Dumki ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(35, 38, 'Rangabali ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(36, 39, 'Bhandaria', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(37, 39, 'Kaukhali', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(38, 39, 'Mathbaria', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(39, 39, 'Nazirpur', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(40, 39, 'Nesarabad', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(41, 39, 'Pirojpur Sadar', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(42, 39, 'Zianagar', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(43, 40, 'Bandarban Sadar', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(44, 40, 'Thanchi', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(45, 40, 'Lama', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(46, 40, 'Naikhongchhari', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(47, 40, 'Ali kadam', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(48, 40, 'Rowangchhari', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(49, 40, 'Ruma', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(50, 41, 'Brahmanbaria Sadar ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(51, 41, 'Ashuganj ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(52, 41, 'Nasirnagar ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(53, 41, 'Nabinagar ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(54, 41, 'Sarail ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(55, 41, 'Shahbazpur Town', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(56, 41, 'Kasba ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(57, 41, 'Akhaura ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(58, 41, 'Bancharampur ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(59, 41, 'Bijoynagar ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(60, 42, 'Chandpur Sadar', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(61, 42, 'Faridganj', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(62, 42, 'Haimchar', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(63, 42, 'Haziganj', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(64, 42, 'Kachua', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(65, 42, 'Matlab Uttar', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(66, 42, 'Matlab Dakkhin', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(67, 42, 'Shahrasti', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(68, 43, 'Anwara ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(69, 43, 'Banshkhali ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(70, 43, 'Boalkhali ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(71, 43, 'Chandanaish ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(72, 43, 'Fatikchhari ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(73, 43, 'Hathazari ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(74, 43, 'Lohagara ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(75, 43, 'Mirsharai ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(76, 43, 'Patiya ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(77, 43, 'Rangunia ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(78, 43, 'Raozan ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(79, 43, 'Sandwip ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(80, 43, 'Satkania ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(81, 43, 'Sitakunda ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(82, 44, 'Barura ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(83, 44, 'Brahmanpara ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(84, 44, 'Burichong ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(85, 44, 'Chandina ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(86, 44, 'Chauddagram ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(87, 44, 'Daudkandi ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(88, 44, 'Debidwar ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(89, 44, 'Homna ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(90, 44, 'Comilla Sadar ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(91, 44, 'Laksam ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(92, 44, 'Monohorgonj ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(93, 44, 'Meghna ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(94, 44, 'Muradnagar ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(95, 44, 'Nangalkot ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(96, 44, 'Comilla Sadar South ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(97, 44, 'Titas ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(98, 45, 'Chakaria ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(99, 45, 'Chakaria ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(100, 45, 'Cox\'s Bazar Sadar ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(101, 45, 'Kutubdia ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(102, 45, 'Maheshkhali ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(103, 45, 'Ramu ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(104, 45, 'Teknaf ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(105, 45, 'Ukhia ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(106, 45, 'Pekua ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(107, 46, 'Feni Sadar', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(108, 46, 'Chagalnaiya', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(109, 46, 'Daganbhyan', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(110, 46, 'Parshuram', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(111, 46, 'Fhulgazi', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(112, 46, 'Sonagazi', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(113, 47, 'Dighinala ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(114, 47, 'Khagrachhari ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(115, 47, 'Lakshmichhari ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(116, 47, 'Mahalchhari ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(117, 47, 'Manikchhari ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(118, 47, 'Matiranga ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(119, 47, 'Panchhari ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(120, 47, 'Ramgarh ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(121, 48, 'Lakshmipur Sadar ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(122, 48, 'Raipur ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(123, 48, 'Ramganj ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(124, 48, 'Ramgati ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(125, 48, 'Komol Nagar ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(126, 49, 'Noakhali Sadar ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(127, 49, 'Begumganj ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(128, 49, 'Chatkhil ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(129, 49, 'Companyganj ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(130, 49, 'Shenbag ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(131, 49, 'Hatia ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(132, 49, 'Kobirhat ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(133, 49, 'Sonaimuri ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(134, 49, 'Suborno Char ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(135, 50, 'Rangamati Sadar ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(136, 50, 'Belaichhari ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(137, 50, 'Bagaichhari ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(138, 50, 'Barkal ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(139, 50, 'Juraichhari ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(140, 50, 'Rajasthali ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(141, 50, 'Kaptai ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(142, 50, 'Langadu ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(143, 50, 'Nannerchar ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(144, 50, 'Kaukhali ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(150, 2, 'Faridpur Sadar ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(151, 2, 'Boalmari ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(152, 2, 'Alfadanga ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(153, 2, 'Madhukhali ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(154, 2, 'Bhanga ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(155, 2, 'Nagarkanda ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(156, 2, 'Charbhadrasan ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(157, 2, 'Sadarpur ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(158, 2, 'Shaltha ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(159, 3, 'Gazipur Sadar-Joydebpur', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(160, 3, 'Kaliakior', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(161, 3, 'Kapasia', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(162, 3, 'Sripur', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(163, 3, 'Kaliganj', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(164, 3, 'Tongi', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(165, 4, 'Gopalganj Sadar ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(166, 4, 'Kashiani ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(167, 4, 'Kotalipara ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(168, 4, 'Muksudpur ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(169, 4, 'Tungipara ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(170, 5, 'Dewanganj ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(171, 5, 'Baksiganj ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(172, 5, 'Islampur ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(173, 5, 'Jamalpur Sadar ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(174, 5, 'Madarganj ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(175, 5, 'Melandaha ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(176, 5, 'Sarishabari ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(177, 5, 'Narundi Police I.C', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(178, 6, 'Astagram ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(179, 6, 'Bajitpur ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(180, 6, 'Bhairab ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(181, 6, 'Hossainpur ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(182, 6, 'Itna ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(183, 6, 'Karimganj ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(184, 6, 'Katiadi ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(185, 6, 'Kishoreganj Sadar ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(186, 6, 'Kuliarchar ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(187, 6, 'Mithamain ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(188, 6, 'Nikli ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(189, 6, 'Pakundia ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(190, 6, 'Tarail ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(191, 7, 'Madaripur Sadar', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(192, 7, 'Kalkini', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(193, 7, 'Rajoir', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(194, 7, 'Shibchar', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(195, 8, 'Manikganj Sadar ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(196, 8, 'Singair ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(197, 8, 'Shibalaya ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(198, 8, 'Saturia ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(199, 8, 'Harirampur ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(200, 8, 'Ghior ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(201, 8, 'Daulatpur ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(202, 9, 'Lohajang ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(203, 9, 'Sreenagar ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(204, 9, 'Munshiganj Sadar ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(205, 9, 'Sirajdikhan ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(206, 9, 'Tongibari ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(207, 9, 'Gazaria ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(208, 10, 'Bhaluka', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(209, 10, 'Trishal', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(210, 10, 'Haluaghat', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(211, 10, 'Muktagachha', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(212, 10, 'Dhobaura', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(213, 10, 'Fulbaria', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(214, 10, 'Gaffargaon', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(215, 10, 'Gauripur', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(216, 10, 'Ishwarganj', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(217, 10, 'Mymensingh Sadar', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(218, 10, 'Nandail', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(219, 10, 'Phulpur', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(220, 11, 'Araihazar ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(221, 11, 'Sonargaon ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(222, 11, 'Bandar', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(223, 11, 'Naryanganj Sadar ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(224, 11, 'Rupganj ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(225, 11, 'Siddirgonj ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(226, 12, 'Belabo ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(227, 12, 'Monohardi ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(228, 12, 'Narsingdi Sadar ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(229, 12, 'Palash ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(230, 12, 'Raipura , Narsingdi', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(231, 12, 'Shibpur ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(232, 13, 'Kendua Upazilla', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(233, 13, 'Atpara Upazilla', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(234, 13, 'Barhatta Upazilla', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(235, 13, 'Durgapur Upazilla', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(236, 13, 'Kalmakanda Upazilla', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(237, 13, 'Madan Upazilla', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(238, 13, 'Mohanganj Upazilla', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(239, 13, 'Netrakona-S Upazilla', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(240, 13, 'Purbadhala Upazilla', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(241, 13, 'Khaliajuri Upazilla', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(242, 14, 'Baliakandi ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(243, 14, 'Goalandaghat ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(244, 14, 'Pangsha ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(245, 14, 'Kalukhali ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(246, 14, 'Rajbari Sadar ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(247, 15, 'Shariatpur Sadar -Palong', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(248, 15, 'Damudya ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(249, 15, 'Naria ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(250, 15, 'Jajira ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(251, 15, 'Bhedarganj ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(252, 15, 'Gosairhat ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(253, 16, 'Jhenaigati ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(254, 16, 'Nakla ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(255, 16, 'Nalitabari ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(256, 16, 'Sherpur Sadar ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(257, 16, 'Sreebardi ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(258, 17, 'Tangail Sadar ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(259, 17, 'Sakhipur ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(260, 17, 'Basail ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(261, 17, 'Madhupur ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(262, 17, 'Ghatail ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(263, 17, 'Kalihati ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(264, 17, 'Nagarpur ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(265, 17, 'Mirzapur ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(266, 17, 'Gopalpur ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(267, 17, 'Delduar ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(268, 17, 'Bhuapur ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(269, 17, 'Dhanbari ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(270, 55, 'Bagerhat Sadar ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(271, 55, 'Chitalmari ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(272, 55, 'Fakirhat ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(273, 55, 'Kachua ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(274, 55, 'Mollahat ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(275, 55, 'Mongla ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(276, 55, 'Morrelganj ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(277, 55, 'Rampal ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(278, 55, 'Sarankhola ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(279, 56, 'Damurhuda ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(280, 56, 'Chuadanga-S ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(281, 56, 'Jibannagar ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(282, 56, 'Alamdanga ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(283, 57, 'Abhaynagar ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(284, 57, 'Keshabpur ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(285, 57, 'Bagherpara ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(286, 57, 'Jessore Sadar ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(287, 57, 'Chaugachha ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(288, 57, 'Manirampur ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(289, 57, 'Jhikargachha ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(290, 57, 'Sharsha ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(291, 58, 'Jhenaidah Sadar ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(292, 58, 'Maheshpur ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(293, 58, 'Kaliganj ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(294, 58, 'Kotchandpur ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(295, 58, 'Shailkupa ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(296, 58, 'Harinakunda ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(297, 59, 'Terokhada ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(298, 59, 'Batiaghata ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(299, 59, 'Dacope ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(300, 59, 'Dumuria ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(301, 59, 'Dighalia ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(302, 59, 'Koyra ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(303, 59, 'Paikgachha ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(304, 59, 'Phultala ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(305, 59, 'Rupsa ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(306, 60, 'Kushtia Sadar', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(307, 60, 'Kumarkhali', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(308, 60, 'Daulatpur', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(309, 60, 'Mirpur', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(310, 60, 'Bheramara', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(311, 60, 'Khoksa', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(312, 61, 'Magura Sadar ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(313, 61, 'Mohammadpur ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(314, 61, 'Shalikha ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(315, 61, 'Sreepur ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(316, 62, 'angni ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(317, 62, 'Mujib Nagar ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(318, 62, 'Meherpur-S ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(319, 63, 'Narail-S Upazilla', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(320, 63, 'Lohagara Upazilla', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(321, 63, 'Kalia Upazilla', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(322, 64, 'Satkhira Sadar ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(323, 64, 'Assasuni ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(324, 64, 'Debhata ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(325, 64, 'Tala ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(326, 64, 'Kalaroa ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(327, 64, 'Kaliganj ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(328, 64, 'Shyamnagar ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(329, 18, 'Adamdighi', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(330, 18, 'Bogra Sadar', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(331, 18, 'Sherpur', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(332, 18, 'Dhunat', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(333, 18, 'Dhupchanchia', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(334, 18, 'Gabtali', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(335, 18, 'Kahaloo', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(336, 18, 'Nandigram', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(337, 18, 'Sahajanpur', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(338, 18, 'Sariakandi', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(339, 18, 'Shibganj', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(340, 18, 'Sonatala', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(341, 19, 'Joypurhat S', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(342, 19, 'Akkelpur', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(343, 19, 'Kalai', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(344, 19, 'Khetlal', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(345, 19, 'Panchbibi', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(346, 20, 'Naogaon Sadar ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(347, 20, 'Mohadevpur ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(348, 20, 'Manda ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(349, 20, 'Niamatpur ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(350, 20, 'Atrai ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(351, 20, 'Raninagar ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(352, 20, 'Patnitala ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(353, 20, 'Dhamoirhat ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(354, 20, 'Sapahar ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(355, 20, 'Porsha ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(356, 20, 'Badalgachhi ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(357, 21, 'Natore Sadar ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(358, 21, 'Baraigram ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(359, 21, 'Bagatipara ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(360, 21, 'Lalpur ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(361, 21, 'Natore Sadar ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(362, 21, 'Baraigram ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(363, 22, 'Bholahat ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(364, 22, 'Gomastapur ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(365, 22, 'Nachole ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(366, 22, 'Nawabganj Sadar ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(367, 22, 'Shibganj ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(368, 23, 'Atgharia ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(369, 23, 'Bera ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(370, 23, 'Bhangura ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(371, 23, 'Chatmohar ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(372, 23, 'Faridpur ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(373, 23, 'Ishwardi ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(374, 23, 'Pabna Sadar ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(375, 23, 'Santhia ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(376, 23, 'Sujanagar ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(377, 24, 'Bagha', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(378, 24, 'Bagmara', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(379, 24, 'Charghat', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(380, 24, 'Durgapur', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(381, 24, 'Godagari', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(382, 24, 'Mohanpur', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(383, 24, 'Paba', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(384, 24, 'Puthia', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(385, 24, 'Tanore', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(386, 25, 'Sirajganj Sadar ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(387, 25, 'Belkuchi ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(388, 25, 'Chauhali ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(389, 25, 'Kamarkhanda ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(390, 25, 'Kazipur ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(391, 25, 'Raiganj ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(392, 25, 'Shahjadpur ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(393, 25, 'Tarash ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(394, 25, 'Ullahpara ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(395, 26, 'Birampur ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(396, 26, 'Birganj', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(397, 26, 'Biral ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(398, 26, 'Bochaganj ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(399, 26, 'Chirirbandar ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(400, 26, 'Phulbari ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(401, 26, 'Ghoraghat ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(402, 26, 'Hakimpur ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(403, 26, 'Kaharole ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(404, 26, 'Khansama ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(405, 26, 'Dinajpur Sadar ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(406, 26, 'Nawabganj', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(407, 26, 'Parbatipur ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(408, 27, 'Fulchhari', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(409, 27, 'Gaibandha sadar', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(410, 27, 'Gobindaganj', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(411, 27, 'Palashbari', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(412, 27, 'Sadullapur', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(413, 27, 'Saghata', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(414, 27, 'Sundarganj', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(415, 28, 'Kurigram Sadar', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(416, 28, 'Nageshwari', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(417, 28, 'Bhurungamari', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(418, 28, 'Phulbari', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(419, 28, 'Rajarhat', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(420, 28, 'Ulipur', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(421, 28, 'Chilmari', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(422, 28, 'Rowmari', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(423, 28, 'Char Rajibpur', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(424, 29, 'Lalmanirhat Sadar', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(425, 29, 'Aditmari', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(426, 29, 'Kaliganj', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(427, 29, 'Hatibandha', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(428, 29, 'Patgram', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(429, 30, 'Nilphamari Sadar', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(430, 30, 'Saidpur', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(431, 30, 'Jaldhaka', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(432, 30, 'Kishoreganj', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(433, 30, 'Domar', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(434, 30, 'Dimla', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(435, 31, 'Panchagarh Sadar', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(436, 31, 'Debiganj', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(437, 31, 'Boda', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(438, 31, 'Atwari', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(439, 31, 'Tetulia', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(440, 32, 'Badarganj', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(441, 32, 'Mithapukur', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(442, 32, 'Gangachara', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(443, 32, 'Kaunia', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(444, 32, 'Rangpur Sadar', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(445, 32, 'Pirgachha', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(446, 32, 'Pirganj', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(447, 32, 'Taraganj', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(448, 33, 'Thakurgaon Sadar ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(449, 33, 'Pirganj ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(450, 33, 'Baliadangi ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(451, 33, 'Haripur ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(452, 33, 'Ranisankail ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(453, 51, 'Ajmiriganj', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(454, 51, 'Baniachang', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(455, 51, 'Bahubal', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(456, 51, 'Chunarughat', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(457, 51, 'Habiganj Sadar', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(458, 51, 'Lakhai', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(459, 51, 'Madhabpur', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(460, 51, 'Nabiganj', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(461, 51, 'Shaistagonj ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(462, 52, 'Moulvibazar Sadar', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(463, 52, 'Barlekha', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(464, 52, 'Juri', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(465, 52, 'Kamalganj', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(466, 52, 'Kulaura', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(467, 52, 'Rajnagar', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(468, 52, 'Sreemangal', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(469, 53, 'Bishwamvarpur', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(470, 53, 'Chhatak', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(471, 53, 'Derai', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(472, 53, 'Dharampasha', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(473, 53, 'Dowarabazar', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(474, 53, 'Jagannathpur', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(475, 53, 'Jamalganj', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(476, 53, 'Sulla', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(477, 53, 'Sunamganj Sadar', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(478, 53, 'Shanthiganj', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(479, 53, 'Tahirpur', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(480, 54, 'Sylhet Sadar', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(481, 54, 'Beanibazar', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(482, 54, 'Bishwanath', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(483, 54, 'Dakshin Surma ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(484, 54, 'Balaganj', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(485, 54, 'Companiganj', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(486, 54, 'Fenchuganj', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(487, 54, 'Golapganj', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(488, 54, 'Gowainghat', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(489, 54, 'Jaintiapur', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(490, 54, 'Kanaighat', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(491, 54, 'Zakiganj', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(492, 54, 'Nobigonj', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(493, 1, 'Adabor', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(494, 1, 'Airport', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(495, 1, 'Badda', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(496, 1, 'Banani', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(497, 1, 'Bangshal', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(498, 1, 'Bhashantek', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(499, 1, 'Cantonment', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(500, 1, 'Chackbazar', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(501, 1, 'Darussalam', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(502, 1, 'Daskhinkhan', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(503, 1, 'Demra', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(504, 1, 'Dhamrai', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(505, 1, 'Dhanmondi', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(506, 1, 'Dohar', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(507, 1, 'Gandaria', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(508, 1, 'Gulshan', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(509, 1, 'Hazaribag', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(510, 1, 'Jatrabari', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(511, 1, 'Kafrul', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(512, 1, 'Kalabagan', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(513, 1, 'Kamrangirchar', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(514, 1, 'Keraniganj', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(515, 1, 'Khilgaon', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(516, 1, 'Khilkhet', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(517, 1, 'Kotwali', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(518, 1, 'Lalbag', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(519, 1, 'Mirpur Model', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(520, 1, 'Mohammadpur', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(521, 1, 'Motijheel', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(522, 1, 'Mugda', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(523, 1, 'Nawabganj', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(524, 1, 'New Market', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(525, 1, 'Pallabi', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(526, 1, 'Paltan', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(527, 1, 'Ramna', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(528, 1, 'Rampura', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(529, 1, 'Rupnagar', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(530, 1, 'Sabujbag', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(531, 1, 'Savar', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(532, 1, 'Shah Ali', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(533, 1, 'Shahbag', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(534, 1, 'Shahjahanpur', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(535, 1, 'Sherebanglanagar', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(536, 1, 'Shyampur', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(537, 1, 'Sutrapur', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(538, 1, 'Tejgaon', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(539, 1, 'Tejgaon I/A', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(540, 1, 'Turag', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(541, 1, 'Uttara', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(542, 1, 'Uttara West', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(543, 1, 'Uttarkhan', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(544, 1, 'Vatara', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(545, 1, 'Wari', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(546, 1, 'Others', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(547, 35, 'Airport', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(548, 35, 'Kawnia', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(549, 35, 'Bondor', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(550, 35, 'Others', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(551, 24, 'Boalia', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(552, 24, 'Motihar', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(553, 24, 'Shahmokhdum', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(554, 24, 'Rajpara', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(555, 24, 'Others', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(556, 43, 'Akborsha', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(557, 43, 'Baijid bostami', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(558, 43, 'Bakolia', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(559, 43, 'Bandar', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(560, 43, 'Chandgaon', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(561, 43, 'Chokbazar', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(562, 43, 'Doublemooring', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(563, 43, 'EPZ', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(564, 43, 'Hali Shohor', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(565, 43, 'Kornafuli', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(566, 43, 'Kotwali', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(567, 43, 'Kulshi', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(568, 43, 'Pahartali', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(569, 43, 'Panchlaish', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(570, 43, 'Potenga', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(571, 43, 'Shodhorgat', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(572, 43, 'Others', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(573, 44, 'Others', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(574, 59, 'Aranghata', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(575, 59, 'Daulatpur', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(576, 59, 'Harintana', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(577, 59, 'Horintana', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(578, 59, 'Khalishpur', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(579, 59, 'Khanjahan Ali', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(580, 59, 'Khulna Sadar', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(581, 59, 'Labanchora', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(582, 59, 'Sonadanga', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(583, 59, 'Others', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(584, 2, 'Others', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(585, 4, 'Others', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(586, 5, 'Others', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(587, 54, 'Airport', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(588, 54, 'Hazrat Shah Paran', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(589, 54, 'Jalalabad', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(590, 54, 'Kowtali', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(591, 54, 'Moglabazar', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(592, 54, 'Osmani Nagar', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(593, 54, 'South Surma', '2020-10-29 23:47:25', '0000-00-00 00:00:00'),
(594, 54, 'Others', '2020-10-29 23:47:25', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
CREATE TABLE IF NOT EXISTS `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tran_id` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `val_id` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` double(16,2) UNSIGNED DEFAULT NULL,
  `card_type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `store_amount` double(16,2) UNSIGNED DEFAULT NULL,
  `card_no` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_tran_id` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tran_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_issuer` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_brand` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_issuer_country` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_issuer_country_code` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `store_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verify_sign` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verify_key` longtext COLLATE utf8mb4_unicode_ci,
  `cus_fax` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verify_sign_sha2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_type` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_amount` double(16,2) UNSIGNED DEFAULT NULL,
  `currency_rate` double(8,4) UNSIGNED DEFAULT NULL,
  `base_fair` double(8,4) UNSIGNED DEFAULT NULL,
  `value_a` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value_b` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value_c` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value_d` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `risk_level` int(11) DEFAULT NULL,
  `risk_title` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `error` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `key` longtext COLLATE utf8mb4_unicode_ci,
  `pass` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` tinyint(4) DEFAULT NULL,
  `updated_by` tinyint(4) DEFAULT NULL,
  `deleted_by` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `transactions_tran_id_unique` (`tran_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaction_ipns`
--

DROP TABLE IF EXISTS `transaction_ipns`;
CREATE TABLE IF NOT EXISTS `transaction_ipns` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `student_id` int(20) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tran_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `val_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` double(16,2) UNSIGNED DEFAULT NULL,
  `card_type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `store_amount` double(16,2) UNSIGNED DEFAULT NULL,
  `card_no` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_tran_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tran_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_issuer` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_brand` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_issuer_country` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_issuer_country_code` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `store_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verify_sign` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verify_key` longtext COLLATE utf8mb4_unicode_ci,
  `cus_fax` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verify_sign_sha2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_type` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_amount` double(16,2) UNSIGNED DEFAULT NULL,
  `currency_rate` double(8,4) UNSIGNED DEFAULT NULL,
  `base_fair` double(8,4) UNSIGNED DEFAULT NULL,
  `value_a` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value_b` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value_c` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value_d` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `risk_level` int(11) DEFAULT NULL,
  `risk_title` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `transactions_tran_id_unique` (`tran_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_type` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.jpg',
  `raw_password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student_id` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` tinyint(4) DEFAULT NULL,
  `updated_by` tinyint(4) DEFAULT NULL,
  `deleted_by` tinyint(4) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `last_login_ip` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login_at` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `slug`, `email`, `phone`, `user_type`, `password`, `user_image`, `raw_password`, `student_id`, `created_by`, `updated_by`, `deleted_by`, `email_verified_at`, `remember_token`, `deleted_at`, `created_at`, `updated_at`, `last_login_ip`, `last_login_at`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', '01738385821', 'Super Admin', '$2y$10$nDWr2zSiDQQpIpm503rFnebNp5Ia.w4MnR6jukplj0NuPY8tdZua2', 'default.jpg', 'admin#password', NULL, NULL, 1, NULL, NULL, 'P620oJX19SRXjQjjBMCeawoL1tPdxHFcCj8onTHoTNOACOV7GRO8pn2DrVcB', NULL, '2020-09-17 07:06:38', '2020-11-17 07:56:21', NULL, NULL),
(2, 'Romen Chakma', 'romen-chakma', 'romenchakma2@gmail.com', '+8801730601204', 'Admin', '$2y$10$5p7jMbPdFM/xmz/Wyw.RCuZ9UYbvlPlItMGyVA9ouRF8f3gRwT/5a', 'default.jpg', 'Password#', NULL, 1, 1, NULL, NULL, 'V2zQXXQFW30yIjrSL9kQ0A7SXNjixSQa0oY5wypX2NkqUx6hjOjJRXCd659d', NULL, '2020-12-10 23:38:26', '2021-01-30 05:17:20', NULL, NULL),
(3, 'accountant', 'accountant', 'accountant@gmail.com', '01711111111', 'Account-Manager', '$2y$10$5Nzb/5LMv/V/yj.SwfgBdO28VWtfqC2SmUO278sshp.8D2wyHyR/q', 'default.jpg', 'account#password', NULL, 1, 1, NULL, NULL, NULL, NULL, '2020-12-10 23:40:12', '2020-12-10 23:40:12', NULL, NULL),
(4, 'shajid', 'shajid', 'shajid@gmail.com', '01786965315', 'Manager', '$2y$10$CIbrzU14eTZvgreLoi8R4ep6lsjSTECdk84GXAe9s8xuryHxj.MGi', 'default.jpg', 'Password#', NULL, 1, 1, 1, NULL, NULL, '2021-01-30 05:48:33', '2021-01-30 05:33:10', '2021-01-30 05:48:33', NULL, NULL),
(5, 'sajid', 'sajid', 'sajid@gmail.com', '01786965315', 'Manager', '$2y$10$.Ve6Yk/./zExtsEPCWxoGOcWqHyXx7dt77lFs43u3RMnvmBpfmb52', 'default.jpg', 'Password#', NULL, 1, 1, 1, NULL, NULL, '2021-01-30 06:39:28', '2021-01-30 05:37:54', '2021-01-30 06:39:28', NULL, NULL),
(6, 'new', 'new', 'new@gmail.com', '01731398781', 'Manager', '$2y$10$oQB.wQpWege6JXKI9z/TPeT.cLQPhUIUeuKgKCWJs.AzdQPdqN0Oe', 'default.jpg', 'debasish#', NULL, 1, 1, 1, NULL, NULL, '2021-01-30 06:39:19', '2021-01-30 06:27:10', '2021-01-30 06:39:19', NULL, NULL),
(7, 'test', 'test', 'test@gmail.com', '01700000000', 'Manager', '$2y$10$nIJgypXKOz3b1djHsAosTuXiBkMueqr1S3WiozXvhXUWOS5z7Mud6', 'default.jpg', 'debasish#', NULL, 1, 1, NULL, NULL, NULL, NULL, '2021-01-30 06:40:54', '2021-01-30 06:40:55', NULL, NULL),
(8, 'Md. Habib', 'md-habib', 'jhgyuf@gmail.com', '01731583981', 'Staff', '$2y$10$IKsYvusUptonqpheNbGl6uhDcRTsrSr/.fLzh4hk.KOGWAbjWGHma', 'default.jpg', 'password', NULL, 1, NULL, NULL, NULL, NULL, NULL, '2021-01-30 06:44:36', '2021-01-30 06:44:36', NULL, NULL),
(9, 'Md. Nazmul Hasan', 'md-nazmul-hasan', 'nh@gmail.com', '01700000000', 'Student', '$2y$10$X4d2CgNNGW/31CTuhjolGOtFup9zD9zYwdcZN8icmFE5PLH0.VNrm', 'default.jpg', 'lggIRS23#', '211010001', 1, NULL, NULL, NULL, NULL, NULL, '2021-02-01 11:09:47', '2021-02-01 11:09:47', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_coupon`
--

DROP TABLE IF EXISTS `user_coupon`;
CREATE TABLE IF NOT EXISTS `user_coupon` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL,
  `student_id` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_id` bigint(20) UNSIGNED DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_coupon_user_id_coupon_id_unique` (`user_id`,`coupon_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `week_days`
--

DROP TABLE IF EXISTS `week_days`;
CREATE TABLE IF NOT EXISTS `week_days` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` tinyint(4) DEFAULT NULL,
  `updated_by` tinyint(4) DEFAULT NULL,
  `deleted_by` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `week_days`
--

INSERT INTO `week_days` (`id`, `name`, `status`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, 'Saturday', 1, '2020-09-30 04:49:40', '2021-01-13 17:09:29', NULL, 1, 1, 1),
(2, 'Sunday', 1, '2020-09-30 04:52:31', '2020-09-30 04:53:07', NULL, 1, 1, NULL),
(3, 'Monday', 1, '2020-09-30 05:00:19', '2020-09-30 05:00:19', NULL, 1, NULL, NULL),
(4, 'Tuesday', 1, '2020-09-30 05:00:35', '2020-09-30 05:00:35', NULL, 1, NULL, NULL),
(5, 'Wednesday', 1, '2020-09-30 05:00:44', '2020-09-30 05:00:44', NULL, 1, NULL, NULL),
(6, 'Thursday', 1, '2020-09-30 05:00:53', '2020-09-30 05:00:53', NULL, 1, NULL, NULL),
(7, 'Friday', 0, '2020-09-30 05:01:03', '2020-11-17 06:23:01', NULL, 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `zoom_api_data`
--

DROP TABLE IF EXISTS `zoom_api_data`;
CREATE TABLE IF NOT EXISTS `zoom_api_data` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zoom_api_url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zoom_api_key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zoom_api_secret` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` tinyint(4) DEFAULT NULL,
  `updated_by` tinyint(4) DEFAULT NULL,
  `deleted_by` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `zoom_api_data`
--

INSERT INTO `zoom_api_data` (`id`, `user_name`, `zoom_api_url`, `zoom_api_key`, `zoom_api_secret`, `status`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, '1', 'https://api.zoom.us/v2/', 'OEEPaQwnRMu3hgIUxCuiUg', 'yJUVYpDIkKG7PrysznLtrqDKTPzm0ME3TTBD', 1, '2020-12-01 06:13:16', '2020-12-10 07:50:11', NULL, 1, 1, NULL),
(2, '6', 'https://api.zoom.us/v2/', 'OEEPaQwnRMu3hgIUxCuiUg', 'EdSLHr7a4tAxIUV8jWrnjvuxfgAyiXCFoCZ6', 0, '2020-12-01 09:25:09', '2020-12-10 07:51:29', '2020-12-10 07:51:29', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `zoom_meeting_details`
--

DROP TABLE IF EXISTS `zoom_meeting_details`;
CREATE TABLE IF NOT EXISTS `zoom_meeting_details` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `topic` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agenda` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `join_url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `course_name` int(20) DEFAULT NULL,
  `batch_name` int(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` tinyint(4) DEFAULT NULL,
  `updated_by` tinyint(4) DEFAULT NULL,
  `deleted_by` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
