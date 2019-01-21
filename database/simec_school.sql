-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2019 at 11:45 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simec_school`
--

-- --------------------------------------------------------

--
-- Table structure for table `assign_marks`
--

CREATE TABLE `assign_marks` (
  `id` int(10) UNSIGNED NOT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class` int(11) NOT NULL,
  `section` int(11) NOT NULL,
  `student` int(11) NOT NULL,
  `exam` int(11) NOT NULL,
  `subject` int(11) NOT NULL,
  `written` decimal(8,2) NOT NULL,
  `mcq` decimal(8,2) DEFAULT NULL,
  `practical` decimal(8,2) DEFAULT NULL,
  `total_marks` decimal(8,2) DEFAULT NULL,
  `got_grade` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `got_gpa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assign_marks`
--

INSERT INTO `assign_marks` (`id`, `year`, `class`, `section`, `student`, `exam`, `subject`, `written`, `mcq`, `practical`, `total_marks`, `got_grade`, `got_gpa`, `created_at`, `updated_at`) VALUES
(5, '2019', 7, 1, 139, 1, 1, '44.00', '43.00', NULL, '87.00', 'A+', '5', '2019-01-15 01:42:38', '2019-01-15 01:42:38'),
(6, '2019', 7, 1, 140, 1, 1, '42.00', '39.00', NULL, '81.00', 'A+', '5', '2019-01-15 01:42:38', '2019-01-15 01:42:38'),
(7, '2019', 7, 1, 141, 1, 1, '41.00', '48.00', NULL, '89.00', 'A+', '5', '2019-01-15 01:42:38', '2019-01-15 01:42:38'),
(8, '2019', 10, 1, 146, 8, 26, '45.00', '42.00', '0.00', '87.00', 'A+', '5', '2019-01-20 02:10:21', '2019-01-20 02:10:21'),
(9, '2019', 10, 1, 146, 9, 26, '41.00', '36.00', '0.00', '77.00', 'A', '4', '2019-01-20 02:21:00', '2019-01-20 02:21:00');

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` int(10) UNSIGNED NOT NULL,
  `teacher` tinyint(4) NOT NULL,
  `class` tinyint(4) NOT NULL,
  `section` tinyint(4) NOT NULL,
  `student` bigint(20) NOT NULL,
  `status` enum('0','1','2') COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `teacher`, `class`, `section`, `student`, `status`, `date`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 3, 80, '2', '2019-01-08', '2019-01-08 05:17:06', '2019-01-08 05:17:06'),
(2, 1, 1, 3, 82, '1', '2019-01-08', '2019-01-08 05:17:06', '2019-01-08 05:17:06'),
(3, 1, 1, 3, 88, '2', '2019-01-08', '2019-01-08 05:17:06', '2019-01-08 05:17:06'),
(4, 1, 1, 2, 75, '2', '2019-01-09', '2019-01-08 05:21:46', '2019-01-08 05:21:46'),
(5, 1, 1, 3, 80, '2', '2019-01-07', '2019-01-08 05:23:09', '2019-01-08 05:23:09'),
(6, 1, 1, 3, 82, '1', '2019-01-07', '2019-01-08 05:23:09', '2019-01-08 05:23:09'),
(7, 1, 1, 3, 88, '1', '2019-01-07', '2019-01-08 05:23:09', '2019-01-08 05:23:09'),
(8, 1, 1, 2, 75, '1', '2019-01-07', '2019-01-10 06:06:41', '2019-01-10 06:06:41'),
(9, 1, 1, 2, 75, '2', '2019-01-01', '2019-01-13 06:21:56', '2019-01-13 06:21:56'),
(10, 1, 1, 2, 117, '2', '2019-01-01', '2019-01-13 06:21:56', '2019-01-13 06:21:56'),
(11, 1, 1, 2, 145, '1', '2019-01-01', '2019-01-13 06:21:57', '2019-01-13 06:21:57'),
(12, 1, 1, 2, 75, '1', '2019-01-02', '2019-01-13 06:24:25', '2019-01-13 06:24:25'),
(13, 1, 1, 2, 117, '1', '2019-01-02', '2019-01-13 06:24:25', '2019-01-13 06:24:25'),
(14, 1, 1, 2, 145, '1', '2019-01-02', '2019-01-13 06:24:25', '2019-01-13 06:24:25'),
(15, 1, 1, 2, 75, '1', '2019-01-03', '2019-01-13 06:24:38', '2019-01-13 06:24:38'),
(16, 1, 1, 2, 117, '2', '2019-01-03', '2019-01-13 06:24:38', '2019-01-13 06:24:38'),
(17, 1, 1, 2, 145, '1', '2019-01-03', '2019-01-13 06:24:38', '2019-01-13 06:24:38'),
(18, 1, 1, 2, 75, '1', '2019-01-05', '2019-01-13 06:25:23', '2019-01-13 06:25:23'),
(19, 1, 1, 2, 117, '1', '2019-01-05', '2019-01-13 06:25:23', '2019-01-13 06:25:23'),
(20, 1, 1, 2, 145, '1', '2019-01-05', '2019-01-13 06:25:23', '2019-01-13 06:25:23'),
(21, 1, 1, 2, 75, '1', '2019-01-06', '2019-01-13 06:27:21', '2019-01-13 06:27:21'),
(22, 1, 1, 2, 117, '1', '2019-01-06', '2019-01-13 06:27:21', '2019-01-13 06:27:21'),
(23, 1, 1, 2, 145, '1', '2019-01-06', '2019-01-13 06:27:21', '2019-01-13 06:27:21');

-- --------------------------------------------------------

--
-- Table structure for table `cashcollections`
--

CREATE TABLE `cashcollections` (
  `id` int(10) UNSIGNED NOT NULL,
  `student` tinyint(4) NOT NULL,
  `class` tinyint(4) NOT NULL,
  `feetype` tinyint(4) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `month` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(10) UNSIGNED NOT NULL,
  `classes_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `classes_rank` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `classes_name`, `classes_rank`, `created_at`, `updated_at`) VALUES
(1, 'Play', 0, '2018-12-10 06:00:26', '2019-01-14 23:15:34'),
(2, 'One', 1, '2018-12-10 06:00:40', '2019-01-14 23:15:45'),
(3, 'Two', 2, '2018-12-10 06:00:56', '2019-01-14 23:16:00'),
(4, 'Three', 3, '2018-12-10 06:01:11', '2019-01-14 23:16:18'),
(5, 'Four', 4, '2019-01-14 23:14:50', '2019-01-14 23:16:30'),
(6, 'Five', 5, '2019-01-14 23:16:40', '2019-01-14 23:16:40'),
(7, 'Six', 6, '2019-01-14 23:16:51', '2019-01-14 23:16:51'),
(8, 'Seven', 7, '2019-01-14 23:17:00', '2019-01-14 23:17:00'),
(9, 'Eight', 8, '2019-01-14 23:17:08', '2019-01-14 23:17:08'),
(10, 'Nine', 9, '2019-01-14 23:17:19', '2019-01-14 23:17:19'),
(11, 'Ten', 10, '2019-01-14 23:17:29', '2019-01-14 23:17:29');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `phone`, `email`, `address`, `created_at`, `updated_at`) VALUES
(2, '+8801711033730', 'contact@school.com', 'H#420, R#20, Mirpur-14,\r\nDhaka-1212', '2019-01-06 01:25:02', '2019-01-06 01:25:02');

-- --------------------------------------------------------

--
-- Table structure for table `disciplines`
--

CREATE TABLE `disciplines` (
  `id` int(10) UNSIGNED NOT NULL,
  `disciplines_title` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `disciplines_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `disciplines`
--

INSERT INTO `disciplines` (`id`, `disciplines_title`, `disciplines_description`, `created_at`, `updated_at`) VALUES
(1, 'Class Miss', 'Fine = 10 tk', '2018-12-30 06:57:33', '2018-12-30 06:57:43');

-- --------------------------------------------------------

--
-- Table structure for table `evaluate_home_works`
--

CREATE TABLE `evaluate_home_works` (
  `id` int(10) UNSIGNED NOT NULL,
  `home_work` int(11) NOT NULL,
  `student` int(11) NOT NULL,
  `status` enum('0','1','2') COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `evaluate_home_works`
--

INSERT INTO `evaluate_home_works` (`id`, `home_work`, `student`, `status`, `date`, `created_at`, `updated_at`) VALUES
(10, 1, 75, '1', '2019-01-11', '2019-01-11 04:41:34', '2019-01-11 04:41:34'),
(11, 2, 80, '1', '2019-01-13', '2019-01-11 04:45:29', '2019-01-11 04:45:29'),
(12, 2, 82, '2', '2019-01-13', '2019-01-11 04:45:29', '2019-01-11 04:45:29'),
(13, 2, 88, '1', '2019-01-13', '2019-01-11 04:45:29', '2019-01-11 04:45:29'),
(14, 3, 75, '1', '2019-01-13', '2019-01-13 06:32:20', '2019-01-13 06:32:20'),
(15, 3, 117, '2', '2019-01-13', '2019-01-13 06:32:20', '2019-01-13 06:32:20'),
(16, 3, 145, '1', '2019-01-13', '2019-01-13 06:32:20', '2019-01-13 06:32:20');

-- --------------------------------------------------------

--
-- Table structure for table `examinations`
--

CREATE TABLE `examinations` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exam_class` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exam_date` date NOT NULL,
  `comment` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `examinations`
--

INSERT INTO `examinations` (`id`, `name`, `exam_class`, `exam_date`, `comment`, `created_at`, `updated_at`) VALUES
(1, 'প্রথম সাময়িক', '5', '2019-04-10', 'পঞ্চম শ্রেণী পর্যন্ত', '2019-01-13 22:19:45', '2019-01-19 23:12:51'),
(2, 'দ্বিতীয় সাময়িক', '5', '2019-08-04', 'পঞ্চম শ্রেণী পর্যন্ত', '2019-01-13 22:20:41', '2019-01-19 23:12:57'),
(3, 'বার্ষিক', '5', '2019-11-17', 'পঞ্চম শ্রেণী পর্যন্ত', '2019-01-13 22:21:09', '2019-01-19 23:13:02'),
(6, 'অর্ধবার্ষিক পরীক্ষা', '8', '2019-07-10', 'অষ্টম শ্রেণী পর্যন্ত', '2019-01-19 23:14:54', '2019-01-19 23:14:54'),
(7, 'বার্ষিক পরীক্ষা', '8', '2019-12-08', 'অষ্টম শ্রেণী পর্যন্ত', '2019-01-19 23:15:31', '2019-01-19 23:15:31'),
(8, 'প্রথম সাময়িক পরীক্ষা', '10', '2019-04-14', 'দশম শ্রেণী পর্যন্ত', '2019-01-19 23:18:25', '2019-01-19 23:18:25'),
(9, 'দ্বিতীয় সাময়িক পরীক্ষা', '10', '2019-09-02', 'দশম শ্রেণী পর্যন্ত', '2019-01-19 23:18:58', '2019-01-19 23:18:58'),
(10, 'বার্ষিক পরীক্ষা', '10', '2019-12-02', 'দশম শ্রেণী পর্যন্ত', '2019-01-19 23:19:32', '2019-01-19 23:19:32');

-- --------------------------------------------------------

--
-- Table structure for table `favicons`
--

CREATE TABLE `favicons` (
  `id` int(10) UNSIGNED NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `favicons`
--

INSERT INTO `favicons` (`id`, `photo`, `created_at`, `updated_at`) VALUES
(5, 'favicon-1546761120.png', '2019-01-06 01:52:00', '2019-01-06 01:52:00');

-- --------------------------------------------------------

--
-- Table structure for table `feetypes`
--

CREATE TABLE `feetypes` (
  `id` int(10) UNSIGNED NOT NULL,
  `type_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feetypes`
--

INSERT INTO `feetypes` (`id`, `type_name`, `created_at`, `updated_at`) VALUES
(2, 'Admission', '2018-12-12 04:21:05', '2018-12-12 04:21:05'),
(3, 'Examination', '2018-12-12 04:21:14', '2018-12-12 04:21:14'),
(4, 'Class Test', '2018-12-12 04:21:22', '2018-12-12 04:21:22');

-- --------------------------------------------------------

--
-- Table structure for table `home_works`
--

CREATE TABLE `home_works` (
  `id` int(10) UNSIGNED NOT NULL,
  `class` int(11) NOT NULL,
  `section` int(11) NOT NULL,
  `subject` int(11) NOT NULL,
  `date` date NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_works`
--

INSERT INTO `home_works` (`id`, `class`, `section`, `subject`, `date`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 3, '2019-01-12', 'Text Home Work', '<h4>Business School</h4>\r\n\r\n<p>Cras vitae turpis lacinia, lacinia la cus non, fermentum nisi.</p>\r\n\r\n<h4>Marketing</h4>\r\n\r\n<p>Lacinia, lacinia la cus non, fermen tum nisi.</p>\r\n\r\n<h4>Photography</h4>\r\n\r\n<p>Cras vitae turpis lacinia, lacinia la cus non, fermentum nisi.</p>\r\n\r\n<h4>Social Media</h4>\r\n\r\n<p>Cras vitae turpis lacinia, lacinia la cus non, fermentum nisi.</p>', '2019-01-10 13:43:10', '2019-01-11 04:21:53'),
(2, 1, 3, 3, '2019-01-13', 'Provide contextual feedback messages for typical user actions with the handful of available and flexible alert messages.', '<ul>\r\n	<li>\r\n	<h2>No default class</h2>\r\n	</li>\r\n</ul>\r\n\r\n<p>Alerts don&#39;t have default classes, only base and modifier classes. A default gray alert doesn&#39;t make too much sense, so you&#39;re required to specify a type via contextual class. Choose from success, info, warning, or danger.</p>', '2019-01-11 04:44:53', '2019-01-11 04:44:53'),
(3, 1, 2, 3, '2019-01-13', 'ghjghjghj', '<p>ghjghjghjghj</p>', '2019-01-13 06:31:31', '2019-01-13 06:31:31');

-- --------------------------------------------------------

--
-- Table structure for table `incomeexpanseheads`
--

CREATE TABLE `incomeexpanseheads` (
  `id` int(10) UNSIGNED NOT NULL,
  `headtype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `head_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `incomeexpanseheads`
--

INSERT INTO `incomeexpanseheads` (`id`, `headtype`, `head_name`, `created_at`, `updated_at`) VALUES
(3, 'Income', 'Exam Fee', '2018-12-12 04:01:14', '2018-12-12 04:01:14'),
(4, 'Income', 'Admission Fee', '2018-12-12 04:01:26', '2018-12-12 04:01:26'),
(5, 'Income', 'Registration Fee', '2018-12-12 04:02:05', '2018-12-12 04:02:05'),
(6, 'Expanse', 'Accessories', '2018-12-12 04:02:30', '2018-12-12 04:02:30'),
(7, 'Expanse', 'Snaks & Tea', '2018-12-21 09:24:49', '2018-12-21 09:24:49');

-- --------------------------------------------------------

--
-- Table structure for table `logos`
--

CREATE TABLE `logos` (
  `id` int(10) UNSIGNED NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logos`
--

INSERT INTO `logos` (`id`, `photo`, `created_at`, `updated_at`) VALUES
(4, 'logo-1546761100.png', '2019-01-06 01:51:40', '2019-01-06 01:51:40'),
(5, 'logo-1547232647.jpg', '2019-01-11 12:50:47', '2019-01-11 12:50:47');

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
(3, '2018_12_02_164746_create_sessions_table', 2),
(5, '2018_12_02_192335_create_sections_table', 3),
(6, '2018_12_03_153245_create_student_registrations_table', 4),
(8, '2018_12_05_070143_create_disciplines_table', 6),
(9, '2018_12_05_150226_create_notices_table', 7),
(10, '2018_12_05_200249_create_subjects_table', 8),
(13, '2018_12_05_232105_create_students_table', 9),
(14, '2018_12_10_074125_create_examinations_table', 10),
(15, '2018_12_10_100732_create_monthlyfees_table', 11),
(16, '2018_12_02_192141_create_classes_table', 12),
(17, '2018_12_10_120424_create_incomeexpanseheads_table', 13),
(18, '2018_12_12_100656_create_feetypes_table', 14),
(20, '2018_12_12_110235_create_cashcollections_table', 15),
(21, '2018_12_30_120821_create_syllabi_table', 16),
(24, '2019_01_02_042353_create_setresults_table', 17),
(25, '2018_12_03_191856_create_teachers_table', 18),
(26, '2019_01_03_162208_create_sliders_table', 19),
(27, '2019_01_03_172608_create_favicons_table', 20),
(28, '2019_01_06_062349_create_logos_table', 21),
(31, '2019_01_06_065841_create_contacts_table', 22),
(32, '2019_01_06_101245_create_attendances_table', 23),
(33, '2019_01_10_051653_create_teacher_attendances_table', 24),
(36, '2019_01_10_190737_create_evaluate_home_works_table', 26),
(37, '2019_01_10_190322_create_home_works_table', 27),
(39, '2019_01_14_035101_create_assign_marks_table', 28),
(40, '2019_01_15_043825_create_playto_five_results_table', 29),
(41, '2019_01_19_065739_create_six_to_eight_results_table', 30);

-- --------------------------------------------------------

--
-- Table structure for table `monthlyfees`
--

CREATE TABLE `monthlyfees` (
  `id` int(10) UNSIGNED NOT NULL,
  `class` tinyint(4) NOT NULL,
  `fee` decimal(12,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `monthlyfees`
--

INSERT INTO `monthlyfees` (`id`, `class`, `fee`, `created_at`, `updated_at`) VALUES
(3, 2, '355.00', '2018-12-10 04:41:48', '2018-12-10 05:01:35'),
(9, 3, '450.00', '2018-12-10 05:53:52', '2018-12-10 05:53:52'),
(10, 4, '550.00', '2018-12-10 05:54:02', '2018-12-10 05:54:02'),
(11, 1, '500.00', '2018-12-23 11:31:45', '2018-12-23 11:31:45');

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `id` int(10) UNSIGNED NOT NULL,
  `notice_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notice_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `notice_file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`id`, `notice_title`, `notice_description`, `notice_file`, `created_at`, `updated_at`) VALUES
(4, 'A new Notice 2', '<h1>Here is a Notice to publish</h1>', 'notice-1544043296.jpg', '2018-12-05 13:47:41', '2019-01-04 23:36:04'),
(5, 'sdfsdf', 'dfdsfsdf', 'notice-5c082c78420de.jpg', '2018-12-05 13:52:24', '2018-12-05 13:52:24');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `playto_five_results`
--

CREATE TABLE `playto_five_results` (
  `id` int(10) UNSIGNED NOT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class` int(11) NOT NULL,
  `section` int(11) NOT NULL,
  `student` int(11) NOT NULL,
  `exam` int(11) NOT NULL,
  `subject` int(11) NOT NULL,
  `total_marks` int(8) NOT NULL,
  `got_grade` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `got_gpa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `playto_five_results`
--

INSERT INTO `playto_five_results` (`id`, `year`, `class`, `section`, `student`, `exam`, `subject`, `total_marks`, `got_grade`, `got_gpa`, `created_at`, `updated_at`) VALUES
(1, '2019', 1, 1, 1, 1, 1, 91, 'A+', '5', '2019-01-15 00:14:44', '2019-01-15 00:14:44'),
(2, '2019', 1, 1, 70, 1, 1, 85, 'A', '4', '2019-01-15 00:14:44', '2019-01-15 00:14:44'),
(3, '2019', 1, 1, 71, 1, 1, 89, 'A', '4', '2019-01-15 00:14:44', '2019-01-15 00:14:44'),
(4, '2019', 1, 1, 72, 1, 1, 82, 'A', '4', '2019-01-15 00:14:44', '2019-01-15 00:14:44'),
(5, '2019', 1, 2, 73, 1, 1, 87, 'A', '4', '2019-01-15 00:16:38', '2019-01-15 00:16:38'),
(6, '2019', 1, 2, 74, 1, 1, 86, 'A', '4', '2019-01-15 00:16:38', '2019-01-15 00:16:38'),
(7, '2019', 1, 2, 75, 1, 1, 77, 'A-', '3.5', '2019-01-15 00:16:38', '2019-01-15 00:16:38'),
(8, '2019', 1, 2, 76, 1, 1, 75, 'A-', '3.5', '2019-01-15 00:16:38', '2019-01-15 00:16:38'),
(9, '2019', 1, 1, 1, 1, 4, 91, 'A+', '5', '2019-01-15 04:06:36', '2019-01-15 04:06:36'),
(10, '2019', 1, 1, 70, 1, 4, 91, 'A+', '5', '2019-01-15 04:06:36', '2019-01-15 04:06:36'),
(11, '2019', 1, 1, 71, 1, 4, 88, 'A', '4', '2019-01-15 04:06:36', '2019-01-15 04:06:36'),
(12, '2019', 1, 1, 72, 1, 4, 89, 'A', '4', '2019-01-15 04:06:36', '2019-01-15 04:06:36'),
(13, '2019', 1, 1, 1, 2, 1, 94, 'A+', '5', '2019-01-15 04:25:27', '2019-01-15 04:25:27'),
(14, '2019', 1, 1, 70, 2, 1, 91, 'A+', '5', '2019-01-15 04:25:28', '2019-01-15 04:25:28'),
(15, '2019', 1, 1, 71, 2, 1, 88, 'A', '4', '2019-01-15 04:25:28', '2019-01-15 04:25:28'),
(16, '2019', 1, 1, 72, 2, 1, 85, 'A', '4', '2019-01-15 04:25:28', '2019-01-15 04:25:28'),
(17, '2019', 1, 1, 1, 2, 4, 92, 'A+', '5', '2019-01-15 04:25:53', '2019-01-15 04:25:53'),
(18, '2019', 1, 1, 70, 2, 4, 87, 'A', '4', '2019-01-15 04:25:53', '2019-01-15 04:25:53'),
(19, '2019', 1, 1, 71, 2, 4, 86, 'A', '4', '2019-01-15 04:25:53', '2019-01-15 04:25:53'),
(20, '2019', 1, 1, 72, 2, 4, 85, 'A', '4', '2019-01-15 04:25:53', '2019-01-15 04:25:53'),
(21, '2019', 1, 1, 1, 3, 6, 90, 'A+', '5', '2019-01-16 05:01:06', '2019-01-16 05:01:06'),
(22, '2019', 1, 1, 70, 3, 6, 89, 'A', '4', '2019-01-16 05:01:06', '2019-01-16 05:01:06'),
(23, '2019', 1, 1, 71, 3, 6, 87, 'A', '4', '2019-01-16 05:01:06', '2019-01-16 05:01:06'),
(24, '2019', 1, 1, 72, 3, 6, 88, 'A', '4', '2019-01-16 05:01:06', '2019-01-16 05:01:06'),
(25, '2019', 1, 1, 1, 3, 1, 97, 'A+', '5', '2019-01-16 05:03:51', '2019-01-16 05:03:51'),
(26, '2019', 1, 1, 70, 3, 1, 89, 'A', '4', '2019-01-16 05:03:51', '2019-01-16 05:03:51'),
(27, '2019', 1, 1, 71, 3, 1, 88, 'A', '4', '2019-01-16 05:03:51', '2019-01-16 05:03:51'),
(28, '2019', 1, 1, 72, 3, 1, 90, 'A+', '5', '2019-01-16 05:03:51', '2019-01-16 05:03:51'),
(29, '2019', 1, 1, 1, 3, 4, 87, 'A', '4', '2019-01-16 05:04:44', '2019-01-16 05:04:44'),
(30, '2019', 1, 1, 70, 3, 4, 89, 'A', '4', '2019-01-16 05:04:45', '2019-01-16 05:04:45'),
(31, '2019', 1, 1, 71, 3, 4, 90, 'A+', '5', '2019-01-16 05:04:45', '2019-01-16 05:04:45'),
(32, '2019', 1, 1, 72, 3, 4, 92, 'A+', '5', '2019-01-16 05:04:45', '2019-01-16 05:04:45'),
(33, '2019', 1, 1, 1, 1, 6, 88, 'A', '4', '2019-01-16 05:05:29', '2019-01-16 05:05:29'),
(34, '2019', 1, 1, 70, 1, 6, 87, 'A', '4', '2019-01-16 05:05:29', '2019-01-16 05:05:29'),
(35, '2019', 1, 1, 71, 1, 6, 87, 'A', '4', '2019-01-16 05:05:29', '2019-01-16 05:05:29'),
(36, '2019', 1, 1, 72, 1, 6, 89, 'A', '4', '2019-01-16 05:05:29', '2019-01-16 05:05:29'),
(37, '2019', 1, 1, 1, 2, 6, 92, 'A+', '5', '2019-01-16 05:06:07', '2019-01-16 05:06:07'),
(38, '2019', 1, 1, 70, 2, 6, 90, 'A+', '5', '2019-01-16 05:06:07', '2019-01-16 05:06:07'),
(39, '2019', 1, 1, 71, 2, 6, 95, 'A+', '5', '2019-01-16 05:06:07', '2019-01-16 05:06:07'),
(40, '2019', 1, 1, 72, 2, 6, 87, 'A', '4', '2019-01-16 05:06:07', '2019-01-16 05:06:07'),
(41, '2019', 5, 1, 102, 1, 1, 91, 'A+', '5', '2019-01-20 01:35:45', '2019-01-20 01:35:45'),
(42, '2019', 5, 1, 103, 1, 1, 88, 'A', '4', '2019-01-20 01:35:45', '2019-01-20 01:35:45'),
(43, '2019', 5, 1, 104, 1, 1, 87, 'A', '4', '2019-01-20 01:35:45', '2019-01-20 01:35:45'),
(44, '2019', 5, 1, 105, 1, 1, 90, 'A+', '5', '2019-01-20 01:35:45', '2019-01-20 01:35:45'),
(45, '2019', 5, 1, 102, 2, 1, 89, 'A', '4', '2019-01-20 01:39:12', '2019-01-20 01:39:12'),
(46, '2019', 5, 1, 103, 2, 1, 92, 'A+', '5', '2019-01-20 01:39:12', '2019-01-20 01:39:12'),
(47, '2019', 5, 1, 104, 2, 1, 91, 'A+', '5', '2019-01-20 01:39:13', '2019-01-20 01:39:13'),
(48, '2019', 5, 1, 105, 2, 1, 93, 'A+', '5', '2019-01-20 01:39:13', '2019-01-20 01:39:13'),
(49, '2019', 5, 1, 102, 3, 1, 90, 'A+', '5', '2019-01-20 01:39:46', '2019-01-20 01:39:46'),
(50, '2019', 5, 1, 103, 3, 1, 89, 'A', '4', '2019-01-20 01:39:46', '2019-01-20 01:39:46'),
(51, '2019', 5, 1, 104, 3, 1, 92, 'A+', '5', '2019-01-20 01:39:46', '2019-01-20 01:39:46'),
(52, '2019', 5, 1, 105, 3, 1, 89, 'A', '4', '2019-01-20 01:39:46', '2019-01-20 01:39:46'),
(53, '2019', 1, 1, 1, 1, 7, 90, 'A+', '5', '2019-01-20 01:53:22', '2019-01-20 01:53:22'),
(54, '2019', 1, 1, 70, 1, 7, 89, 'A', '4', '2019-01-20 01:53:22', '2019-01-20 01:53:22'),
(55, '2019', 1, 1, 71, 1, 7, 92, 'A+', '5', '2019-01-20 01:53:22', '2019-01-20 01:53:22'),
(56, '2019', 1, 1, 72, 1, 7, 93, 'A+', '5', '2019-01-20 01:53:22', '2019-01-20 01:53:22');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` int(10) UNSIGNED NOT NULL,
  `sections_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sections_rank` int(2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `sections_name`, `sections_rank`, `created_at`, `updated_at`) VALUES
(1, 'A', 1, '2018-12-03 09:31:07', '2018-12-10 00:24:34'),
(2, 'B', 2, '2019-01-06 06:05:46', '2019-01-06 06:05:46');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` int(10) UNSIGNED NOT NULL,
  `sessions_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `sessions_name`, `created_at`, `updated_at`) VALUES
(6, '2016-2017', '2018-12-02 19:11:37', '2018-12-02 13:11:37'),
(7, '2017-2018', '2018-12-02 19:11:43', '2018-12-02 13:11:43'),
(8, '2018-2019', '2018-12-03 17:23:27', '2018-12-02 13:11:49');

-- --------------------------------------------------------

--
-- Table structure for table `setresults`
--

CREATE TABLE `setresults` (
  `id` int(10) UNSIGNED NOT NULL,
  `grade` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `point_lowest` decimal(5,2) NOT NULL,
  `point_highest` decimal(5,2) NOT NULL,
  `markrange_lowest` tinyint(4) NOT NULL,
  `markrange_highest` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setresults`
--

INSERT INTO `setresults` (`id`, `grade`, `point_lowest`, `point_highest`, `markrange_lowest`, `markrange_highest`, `created_at`, `updated_at`) VALUES
(1, 'A+', '5.00', '5.00', 80, 100, '2019-01-01 23:23:28', '2019-01-01 23:23:28'),
(2, 'A', '4.00', '4.99', 70, 79, '2019-01-01 23:24:05', '2019-01-01 23:24:05'),
(3, 'A-', '3.50', '3.99', 60, 69, '2019-01-01 23:24:33', '2019-01-01 23:24:33'),
(4, 'B', '3.00', '3.49', 50, 59, '2019-01-01 23:25:05', '2019-01-01 23:25:05'),
(5, 'C', '2.50', '2.99', 40, 49, '2019-01-01 23:25:46', '2019-01-01 23:25:46'),
(6, 'D', '2.00', '2.49', 33, 39, '2019-01-01 23:26:15', '2019-01-01 23:26:15'),
(8, 'F', '0.00', '1.99', 0, 32, '2019-01-01 23:33:02', '2019-01-01 23:33:02');

-- --------------------------------------------------------

--
-- Table structure for table `six_to_eight_results`
--

CREATE TABLE `six_to_eight_results` (
  `id` int(10) UNSIGNED NOT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class` int(11) NOT NULL,
  `section` int(11) NOT NULL,
  `student` int(11) NOT NULL,
  `exam` int(11) NOT NULL,
  `subject` int(11) NOT NULL,
  `written` int(11) NOT NULL,
  `mcq` int(11) NOT NULL,
  `practical` int(11) NOT NULL,
  `monthly_avg` int(11) NOT NULL,
  `total_marks` int(11) NOT NULL,
  `got_grade` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `got_gpa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `six_to_eight_results`
--

INSERT INTO `six_to_eight_results` (`id`, `year`, `class`, `section`, `student`, `exam`, `subject`, `written`, `mcq`, `practical`, `monthly_avg`, `total_marks`, `got_grade`, `got_gpa`, `created_at`, `updated_at`) VALUES
(1, '2019', 7, 1, 139, 6, 12, 63, 19, 0, 16, 82, 'A+', '5', '2019-01-19 12:03:07', '2019-01-19 12:03:07'),
(2, '2019', 7, 1, 140, 6, 12, 59, 22, 0, 16, 81, 'A+', '5', '2019-01-19 12:03:07', '2019-01-19 12:03:07'),
(3, '2019', 7, 1, 141, 6, 12, 61, 21, 0, 13, 79, 'A', '4', '2019-01-19 12:03:08', '2019-01-19 12:03:08'),
(5, '2019', 7, 1, 139, 7, 12, 60, 26, 0, 14, 83, 'A+', '5', '2019-01-20 00:52:47', '2019-01-20 00:52:47'),
(6, '2019', 7, 1, 140, 7, 12, 57, 24, 0, 17, 82, 'A+', '5', '2019-01-20 00:52:47', '2019-01-20 00:52:47'),
(7, '2019', 7, 1, 141, 7, 12, 53, 23, 0, 16, 77, 'A', '4', '2019-01-20 00:52:47', '2019-01-20 00:52:47'),
(8, '2019', 7, 1, 139, 6, 13, 55, 19, 0, 17, 76, 'A', '4', '2019-01-20 01:15:42', '2019-01-20 01:15:42'),
(9, '2019', 7, 1, 140, 6, 13, 56, 21, 0, 19, 81, 'A+', '5', '2019-01-20 01:15:42', '2019-01-20 01:15:42'),
(10, '2019', 7, 1, 141, 6, 13, 54, 24, 0, 18, 80, 'A+', '5', '2019-01-20 01:15:42', '2019-01-20 01:15:42'),
(11, '2019', 7, 1, 139, 7, 13, 52, 28, 0, 17, 81, 'A+', '5', '2019-01-20 01:17:31', '2019-01-20 01:17:31'),
(12, '2019', 7, 1, 140, 7, 13, 51, 30, 0, 18, 83, 'A+', '5', '2019-01-20 01:17:31', '2019-01-20 01:17:31'),
(13, '2019', 7, 1, 141, 7, 13, 56, 26, 0, 15, 81, 'A+', '5', '2019-01-20 01:17:31', '2019-01-20 01:17:31');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'Each migration file name contains a timestamp which allows Laravel', 'slider-1546534827.jpg', '2019-01-03 11:00:27', '2019-01-03 11:00:27'),
(2, 'To limit the number of results returned from the query', 'slider-1546535339.jpg', '2019-01-03 11:08:59', '2019-01-03 11:08:59'),
(3, 'Sometimes you may want clauses to apply to a query.', 'slider-1546535361.jpg', '2019-01-03 11:09:21', '2019-01-03 11:09:21');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(10) UNSIGNED NOT NULL,
  `reg_no` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` date DEFAULT NULL,
  `gender` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blood_group` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `session_id` tinyint(4) DEFAULT NULL,
  `class_id` tinyint(4) DEFAULT NULL,
  `section_id` tinyint(4) DEFAULT NULL,
  `parent_id` tinyint(4) DEFAULT NULL,
  `roll` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `reg_no`, `name`, `birthday`, `gender`, `religion`, `blood_group`, `address1`, `address2`, `phone`, `email`, `password`, `father_name`, `mother_name`, `session_id`, `class_id`, `section_id`, `parent_id`, `roll`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'REG-123', 'Md Salman Sajib', '1987-01-02', 'male', 'Islam', 'O+', 'Coolest Strongest Toys Which Actually Exist', 'Coolest Strongest Toys Which Actually Exist 3333', '01711033730', 'std1@gmail.com', '$2y$10$oHlNOgl/QrFkVZwYD/M5GuJtTCukte1K3LNvzbjVh48D4ME.mFq8y', 'Md Abu Talib Miah', 'Most. Nasima Begum', 8, 1, 1, NULL, '001', 'student-1544105488.jpg', '2018-12-06 08:11:28', '2019-01-02 04:04:27'),
(70, 'REG-1', 'Md Mushfikur Rahman', '2003-10-27', 'male', '', '', 'Sector 14, India House, New Delhi', 'Dhaka, Bangladesh', '019955996699', 'student@student.com', '$2y$10$oHlNOgl/QrFkVZwYD/M5GuJtTCukte1K3LNvzbjVh48D4ME.mFq8y', '', '', 7, 1, 1, 0, 'N001', 'student-1544427405.jpg', '2018-12-06 08:11:28', '2018-12-10 01:36:45'),
(71, 'REG-2', 'Ambika Ghaiwatkar', '2004-10-11', 'female', 'Christian', '', 'Sector , Gwalior city', 'Dhaka, Bangladesh', '9898989898', 'ambi.ghaiwatkar@a.com', '$2y$10$oHlNOgl/QrFkVZwYD/M5GuJtTCukte1K3LNvzbjVh48D4ME.mFq8y', 'Mr. Demo Father', 'Mrs. Demo Mother', 6, 1, 1, 0, 'N002', 'student-1544427414.jpg', '2018-12-06 08:11:28', '2019-01-15 02:49:19'),
(72, 'REG-3', 'Mangla Ashtankar', '2004-10-11', 'female', '', '', 'Sector , Gwalior city', 'Dhaka, Bangladesh', '9898989898', 'ashtankarmangla612@a.com', '$2y$10$oHlNOgl/QrFkVZwYD/M5GuJtTCukte1K3LNvzbjVh48D4ME.mFq8y', '', '', 6, 1, 1, 0, 'N003', 'student-1544427421.jpg', '2018-12-06 08:11:28', '2018-12-10 01:37:01'),
(73, 'REG-4', 'Pooja Ganvir', '2004-10-11', 'female', '', '', 'Sector , Gwalior city', 'Dhaka, Bangladesh', '9898989898', 'poojaganvir94@a.com', '$2y$10$oHlNOgl/QrFkVZwYD/M5GuJtTCukte1K3LNvzbjVh48D4ME.mFq8y', '', '', 7, 1, 2, 0, 'N004', 'student-1544434669.jpg', '2018-12-06 08:11:28', '2018-12-10 03:37:49'),
(74, 'REG-5', 'Pradhnya Bhoyar', '2004-10-11', 'female', '', '', 'Sector , Gwalior city', 'Dhaka, Bangladesh', '9898989898', 'pradhnya.bhoyar18@a.com', '$2y$10$oHlNOgl/QrFkVZwYD/M5GuJtTCukte1K3LNvzbjVh48D4ME.mFq8y', '', '', 7, 1, 2, 0, 'N005', 'student-1544434679.jpg', '2018-12-06 08:11:28', '2018-12-10 03:37:59'),
(75, 'REG-6', 'Surabhi Parate', '2004-10-11', 'female', '', '', 'Sector , Gwalior city', 'Dhaka, Bangladesh', '9898989898', 'surabhiparate@a.com', '$2y$10$oHlNOgl/QrFkVZwYD/M5GuJtTCukte1K3LNvzbjVh48D4ME.mFq8y', '', '', 6, 1, 2, 0, 'N006', 'student-1546410279.jpg', '2018-12-06 08:11:28', '2019-01-02 00:24:39'),
(76, 'REG-7', 'Piyush Shukla', '2004-10-11', 'male', '', '', 'Sector , Gwalior city', 'Dhaka, Bangladesh', '9898989898', 'shukla.piyush318@a.com', '$2y$10$oHlNOgl/QrFkVZwYD/M5GuJtTCukte1K3LNvzbjVh48D4ME.mFq8y', '', '', 6, 1, 2, 0, 'N007', 'student-1546410910.jpg', '2018-12-06 08:11:28', '2019-01-02 00:35:10'),
(77, 'REG-8', 'Pranay Kamble', '2004-10-11', 'male', 'Christian', '', 'Sector , Gwalior city', 'Dhaka, Bangladesh', '9898989898', 'pranaykamble007@gamail.com', '$2y$10$oHlNOgl/QrFkVZwYD/M5GuJtTCukte1K3LNvzbjVh48D4ME.mFq8y', 'Mr. Jelly Fish', 'Mrs Jelly Fish', 8, 2, 1, 0, 'N008', 'student-1546432066.jpg', '2018-12-06 08:11:28', '2019-01-02 06:27:46'),
(79, 'REG-10', 'Abhishek Motdhare', '2004-10-11', 'male', NULL, '', 'Sector , Gwalior city', 'Dhaka, Bangladesh', '9898989898', 'abhi.motdhare@a.com', '$2y$10$oHlNOgl/QrFkVZwYD/M5GuJtTCukte1K3LNvzbjVh48D4ME.mFq8y', 'Father Name', 'Mother Name', 8, 2, 1, 0, 'N010', 'student-1546432108.jpg', '2018-12-06 08:11:28', '2019-01-02 06:28:28'),
(80, 'REG-11', 'AMBU P. AMBADARE', '2004-10-11', 'male', '', '', 'Sector , Gwalior city', 'Dhaka, Bangladesh', '9898989898', 'Ambuambadare16@a.com', '$2y$10$oHlNOgl/QrFkVZwYD/M5GuJtTCukte1K3LNvzbjVh48D4ME.mFq8y', '', '', 7, 2, 1, 0, 'N011', '0', '2018-12-06 08:11:28', '2018-12-06 08:11:28'),
(81, 'REG-12', 'ANKITA B. SINGH', '2004-10-11', 'female', '', '', 'Sector , Gwalior city', 'Dhaka, Bangladesh', '9898989898', 'Ankitasingh346@a.com', '$2y$10$oHlNOgl/QrFkVZwYD/M5GuJtTCukte1K3LNvzbjVh48D4ME.mFq8y', '', '', 8, 2, 1, 0, 'N012', '0', '2018-12-06 08:11:28', '2018-12-06 08:11:28'),
(82, 'REG-13', 'ANKITA PATLE', '2004-10-11', 'female', '', '', 'Sector , Gwalior city', 'Dhaka, Bangladesh', '9898989898', 'Apatle204@a.com', '$2y$10$oHlNOgl/QrFkVZwYD/M5GuJtTCukte1K3LNvzbjVh48D4ME.mFq8y', '', '', 6, 2, 2, 0, 'N013', '0', '2018-12-06 08:11:28', '2018-12-06 08:11:28'),
(83, 'REG-14', 'KAJAL D. THAKUR', '2004-10-11', 'female', '', '', 'Sector , Gwalior city', 'Dhaka, Bangladesh', '9898989898', 'Rajputkajal94@a.com', '$2y$10$oHlNOgl/QrFkVZwYD/M5GuJtTCukte1K3LNvzbjVh48D4ME.mFq8y', '', '', 7, 2, 2, 0, 'N014', '0', '2018-12-06 08:11:28', '2018-12-06 08:11:28'),
(84, 'REG-15', 'KIRAN R. KAMBLE', '2004-10-11', 'female', '', '', 'Sector , Gwalior city', 'Dhaka, Bangladesh', '9898989898', 'Kirankamble984@a.com', '$2y$10$oHlNOgl/QrFkVZwYD/M5GuJtTCukte1K3LNvzbjVh48D4ME.mFq8y', '', '', 8, 2, 2, 0, 'N015', '0', '2018-12-06 08:11:28', '2018-12-06 08:11:28'),
(85, 'REG-16', 'KOMAL R. NAXINE', '2004-10-11', 'female', '', '', 'Sector , Gwalior city', 'Dhaka, Bangladesh', '9898989898', 'Komalnaxine12@a.com', '$2y$10$oHlNOgl/QrFkVZwYD/M5GuJtTCukte1K3LNvzbjVh48D4ME.mFq8y', '', '', 6, 2, 2, 0, 'N016', '0', '2018-12-06 08:11:28', '2018-12-06 08:11:28'),
(86, 'REG-17', 'MINAL S. KHARTAD', '2004-10-11', 'female', '', '', 'Sector , Gwalior city', 'Dhaka, Bangladesh', '9898989898', 'Minalkhartad14@a.com', '$2y$10$oHlNOgl/QrFkVZwYD/M5GuJtTCukte1K3LNvzbjVh48D4ME.mFq8y', '', '', 8, 3, 1, 0, 'N017', '0', '2018-12-06 08:11:28', '2018-12-06 08:11:28'),
(87, 'REG-18', 'PALLAVI S. FEGADE', '2004-10-11', 'female', '', '', 'Sector , Gwalior city', 'Dhaka, Bangladesh', '9898989898', 'Pallavifegade2@a.com', '$2y$10$oHlNOgl/QrFkVZwYD/M5GuJtTCukte1K3LNvzbjVh48D4ME.mFq8y', '', '', 8, 3, 1, 0, 'N018', '0', '2018-12-06 08:11:28', '2018-12-06 08:11:28'),
(88, 'REG-19', 'PRIYANKA S. DEWHARE', '2004-10-11', 'female', '', '', 'Sector , Gwalior city', 'Dhaka, Bangladesh', '9898989898', 'priyankadewhare@a.com', '$2y$10$oHlNOgl/QrFkVZwYD/M5GuJtTCukte1K3LNvzbjVh48D4ME.mFq8y', '', '', 7, 3, 1, 0, 'N019', '0', '2018-12-06 08:11:28', '2018-12-06 08:11:28'),
(89, 'REG-20', 'RAKSHANA N. SHELKE', '2004-10-11', 'female', '', '', 'Sector , Gwalior city', 'Dhaka, Bangladesh', '9898989898', 'rakshanshelke@a.com', '$2y$10$oHlNOgl/QrFkVZwYD/M5GuJtTCukte1K3LNvzbjVh48D4ME.mFq8y', '', '', 8, 3, 1, 0, 'N020', '0', '2018-12-06 08:11:28', '2018-12-06 08:11:28'),
(90, 'REG-21', 'RASHMI T. GHATOLE', '2004-10-11', 'male', '', '', 'Sector , Gwalior city', 'Dhaka, Bangladesh', '9898989898', 'rashmighatole@gmal.com', '$2y$10$oHlNOgl/QrFkVZwYD/M5GuJtTCukte1K3LNvzbjVh48D4ME.mFq8y', '', '', 8, 3, 2, 0, 'N021', '0', '2018-12-06 08:11:28', '2018-12-06 08:11:28'),
(91, 'REG-22', 'SANJIVANI B. PATIL', '2004-10-11', 'female', '', '', 'Sector , Gwalior city', 'Dhaka, Bangladesh', '9898989898', 'sanjuppatil14@a.com', '$2y$10$oHlNOgl/QrFkVZwYD/M5GuJtTCukte1K3LNvzbjVh48D4ME.mFq8y', '', '', 8, 3, 2, 0, 'N022', '0', '2018-12-06 08:11:28', '2018-12-06 08:11:28'),
(92, 'REG-23', 'SHAHINA SHEIKH', '2004-10-11', 'female', '', '', 'Sector , Gwalior city', 'Dhaka, Bangladesh', '9898989898', 'shahinasheikh123@a.com', '$2y$10$oHlNOgl/QrFkVZwYD/M5GuJtTCukte1K3LNvzbjVh48D4ME.mFq8y', '', '', 8, 3, 2, 0, 'N023', '0', '2018-12-06 08:11:28', '2018-12-06 08:11:28'),
(93, 'REG-24', 'SHAHISTA SHEIKH', '2004-10-11', 'female', '', '', 'Sector , Gwalior city', 'Dhaka, Bangladesh', '9898989898', 'sheikhsahista67@a.com', '$2y$10$oHlNOgl/QrFkVZwYD/M5GuJtTCukte1K3LNvzbjVh48D4ME.mFq8y', '', '', 8, 3, 2, 0, 'N024', '0', '2018-12-06 08:11:28', '2018-12-06 08:11:28'),
(94, 'REG-25', 'SHRADDHA S. SHARMA', '2004-10-11', 'female', '', '', 'Sector , Gwalior city', 'Dhaka, Bangladesh', '9898989898', 'shraddhasharma71120@a.com', '$2y$10$oHlNOgl/QrFkVZwYD/M5GuJtTCukte1K3LNvzbjVh48D4ME.mFq8y', '', '', 8, 4, 1, 0, 'N025', '0', '2018-12-06 08:11:28', '2018-12-06 08:11:28'),
(95, 'REG-26', 'SNEHAL K. DESHMUKH', '2004-10-11', 'female', '', '', 'Sector , Gwalior city', 'Dhaka, Bangladesh', '9898989898', 'shehaldeshmukh963434@a.com', '$2y$10$oHlNOgl/QrFkVZwYD/M5GuJtTCukte1K3LNvzbjVh48D4ME.mFq8y', '', '', 7, 4, 1, 0, 'N026', '0', '2018-12-06 08:11:28', '2018-12-06 08:11:28'),
(96, 'REG-52', 'zmbimz phziwztmzr', '2004-10-11', 'female', '', '', 'Agarpur', 'Dhaka, Bangladesh', '9898989898', 'KGmbi.ghKGiwKGtkKGr@KG.com', '$2y$10$oHlNOgl/QrFkVZwYD/M5GuJtTCukte1K3LNvzbjVh48D4ME.mFq8y', '', '', 7, 4, 1, 0, 'KG001', '0', '2018-12-06 08:11:28', '2018-12-06 08:11:28'),
(97, 'REG-53', 'Mznplz zshtznmzr', '2004-10-11', 'female', '', '', 'Agwarkhas', 'Dhaka, Bangladesh', '9898989898', 'KGshtKGnkKGrmKGnglKG612@KG.com', '$2y$10$oHlNOgl/QrFkVZwYD/M5GuJtTCukte1K3LNvzbjVh48D4ME.mFq8y', '', '', 7, 4, 1, 0, 'KG002', '0', '2018-12-06 08:11:28', '2018-12-06 08:11:28'),
(98, 'REG-54', 'Poojz pznvir', '2004-10-11', 'female', '', '', 'Aharan', 'Dhaka, Bangladesh', '9898989898', 'poojKGgKGnvir94@KG.com', '$2y$10$oHlNOgl/QrFkVZwYD/M5GuJtTCukte1K3LNvzbjVh48D4ME.mFq8y', '', '', 7, 4, 2, 0, 'KG003', '0', '2018-12-06 08:11:28', '2018-12-06 08:11:28'),
(99, 'REG-55', 'Przdhnyz Bhoyzr', '2004-10-11', 'female', '', '', 'Amanabad', 'Dhaka, Bangladesh', '9898989898', 'prKGdhnyKG.bhoyKGr18@KG.com', '$2y$10$oHlNOgl/QrFkVZwYD/M5GuJtTCukte1K3LNvzbjVh48D4ME.mFq8y', '', '', 7, 4, 2, 0, 'KG004', '0', '2018-12-06 08:11:28', '2018-12-06 08:11:28'),
(100, 'REG-56', 'Surzbhi Pzrzte ', '2004-10-11', 'female', '', '', 'Anwal Khera', 'Dhaka, Bangladesh', '9898989898', 'surKGbhipKGrKGte@KG.com', '$2y$10$oHlNOgl/QrFkVZwYD/M5GuJtTCukte1K3LNvzbjVh48D4ME.mFq8y', '', '', 7, 4, 2, 0, 'KG005', '0', '2018-12-06 08:11:28', '2018-12-06 08:11:28'),
(101, 'REG-57', 'Piyush Shumlz ', '2004-10-11', 'male', '', '', 'Arela', '9898989898', 'Dhaka, Banglade', 'shuklKG.piyush318@KG.com', '$2y$10$oHlNOgl/QrFkVZwYD/M5GuJtTCukte1K3LNvzbjVh48D4ME.mFq8y', '', '', 7, 4, 2, 0, 'KG006', '0', '2018-12-06 08:11:28', '2018-12-06 08:11:28'),
(102, 'REG-58', 'Prznzy mzmble', '2004-10-11', 'male', '', '', 'Bahrampur', '9898989898', 'Dhaka, Banglade', 'prKGnKGykKGmble007@gKGmKGil.com', '$2y$10$oHlNOgl/QrFkVZwYD/M5GuJtTCukte1K3LNvzbjVh48D4ME.mFq8y', '', '', 6, 5, 1, 0, 'KG007', '0', '2018-12-06 08:11:28', '2018-12-06 08:11:28'),
(103, 'REG-59', 'Shubzhnshu Szhzre', '2004-10-11', 'male', '', '', 'Bailoth', '9898989898', 'Dhaka, Banglade', 'sKGhKGreshubhKGnshu@gKGmil.com', '$2y$10$oHlNOgl/QrFkVZwYD/M5GuJtTCukte1K3LNvzbjVh48D4ME.mFq8y', '', '', 6, 5, 1, 0, 'KG008', '0', '2018-12-06 08:11:28', '2018-12-06 08:11:28'),
(104, 'REG-55555', 'Mr New Student', '1991-02-03', 'male', NULL, NULL, 'Dhanmondi, Dhaka', 'Pirojpur, Dhaka', '+8896854785944', 'jelly@gmail.com', '$2y$10$6e3Gqgnub90CbLm9E0sJLOcAPu8YmoolHc53VDRsU3.1juaC2ZUP.', NULL, NULL, 8, 5, 1, NULL, 'R985', 'student-1546428846.jpg', '2019-01-02 05:34:06', '2019-01-02 05:34:06'),
(105, 'REG-0009', 'Mr Another Std', '2004-02-14', 'male', NULL, NULL, 'dfgdfgdfg', 'dfgdfgdfg', '65464545445', 'another@fff.ddd', '$2y$10$1ivbHt.ns28reeGeI9/xX.2esY8ee6GnXz1xK99rN/a4Z0NMFoTRO', NULL, NULL, 8, 5, 1, NULL, 'R9853', 'student-1546939477.png', '2019-01-08 03:24:38', '2019-01-08 03:24:38'),
(106, 'REG-364', 'MD. Maruf Hossen', '2003-10-25', 'male', 'Islam', 'O+', 'Zoo Road,Mirpur, Dhaka 1216', 'Zoo Road,Mirpur, Dhaka 1216', '1935734656', 'stdbbbb@gmail.com', '$2y$10$gNhepc7wOp5na13XrGQinuZiZrWh6x2sqbF71zzWnfoWysphWrCUK', 'Ali Akber', 'Most Amena', 8, 5, 2, 1, 'NO254', NULL, '2019-01-11 11:00:06', '2019-01-11 11:00:06'),
(109, 'REG-881', 'MD. Maruf Hossen', '2003-03-10', 'male', 'Islam', 'O+', 'Zoo Road,Mirpur, Dhaka 1216', 'Zoo Road,Mirpur, Dhaka 1216', '1935734656', 'std@gmail.com', '$2y$10$XuH3cUkSvC72guHDwhWzme1QAOrk9ctwcrI9bJV29S0vlo8QffeWe', 'Ali Akber', 'Most Amena', 8, 5, 2, 1, 'N2541', NULL, '2019-01-11 11:36:06', '2019-01-11 11:36:06'),
(110, 'REG-882', 'Khandokar Emrul Hasan', '2003-03-11', 'male', 'Islam', 'A-', 'Zoo Road,Mirpur, Dhaka 1217', 'Zoo Road,Mirpur, Dhaka 1217', '1726289080', 'std2@gmail.com', '$2y$10$B.d9KOFRJzLkaY5zOVXTbO3qqMQy2D6HjOqVh/BNJP.F4OtsCcGb6', 'Ali Akber2', 'Most Amena', 7, 5, 2, 1, 'N89874', NULL, '2019-01-11 11:36:06', '2019-01-11 11:36:06'),
(111, 'REG-883', 'Mahmudul Hasan', '2003-03-12', 'male', 'Islam', 'B+', 'Zoo Road,Mirpur, Dhaka 1218', 'Zoo Road,Mirpur, Dhaka 1218', '1991269404', 'std3@gmail.com', '$2y$10$N1QIIWj7Curb3TjWIYnDcuxTCVBeG98QytVI0EGt/d16Cc3k/5GXa', '3Ali Akber', 'Most Amena', 6, 5, 2, 1, 'N5874', NULL, '2019-01-11 11:36:06', '2019-01-11 11:36:06'),
(112, 'REG-884', 'Junayeda Rahman', '2003-03-13', 'female', 'Islam', 'O+', 'Zoo Road,Mirpur, Dhaka 1219', 'Zoo Road,Mirpur, Dhaka 1219', '1715802253', '3std@gmail.com', '$2y$10$XvtuVWSAlf2LBgOqFdSrIOWSUmA3e5dXeyH/WBTYJY7cyZ4/w1vmi', '6Ali Akber', 'Most Amena', 6, 6, 1, 1, 'N96584', NULL, '2019-01-11 11:36:06', '2019-01-11 11:36:06'),
(113, 'REG-885', 'M.A Galib', '2003-03-14', 'male', 'Islam', 'A+', 'Zoo Road,Mirpur, Dhaka 1220', 'Zoo Road,Mirpur, Dhaka 1220', '1750850977', '4std@gmail.com', '$2y$10$j/vpOsdGxJmfLjzHjNvYeuz5mZ24xNBdxYvA6Oi/7Hd1ZQlIvfQEy', '6Ali Akber', 'Most Amena', 8, 6, 1, 1, 'N98754', NULL, '2019-01-11 11:36:07', '2019-01-11 11:36:07'),
(114, 'REG-886', 'Rabiul Hasan Rifat', '2003-03-15', 'male', 'Islam', 'B-', 'Zoo Road,Mirpur, Dhaka 1221', 'Zoo Road,Mirpur, Dhaka 1221', '1798065959', '5std@gmail.com', '$2y$10$2ecTMTVjOCgZLsj5sJ29duEsDoATXjKgN5K4BPVZqWg2cAatVHB6q', '5Ali Akber', 'Most Amena', 7, 6, 1, 1, 'N98755', NULL, '2019-01-11 11:36:07', '2019-01-11 11:36:07'),
(115, 'REG-887', 'MD. Mutakabbir', '2003-03-16', 'male', 'Islam', 'O+', 'Zoo Road,Mirpur, Dhaka 1222', 'Zoo Road,Mirpur, Dhaka 1222', '1947440509', '6std@gmail.com', '$2y$10$QVcaZl.wB/LVaHUIPS6PD.rv8d2lqPhKqmK3pyYmzywvGpRykQgTK', '9Ali Akber', 'Most Amena', 7, 6, 1, 1, 'N98756', NULL, '2019-01-11 11:36:07', '2019-01-11 11:36:07'),
(116, 'REG-888', 'Fardina Islam', '2003-03-17', 'female', 'Islam', 'O+', 'Zoo Road,Mirpur, Dhaka 1223', 'Zoo Road,Mirpur, Dhaka 1223', '1920103239', '7std@gmail.com', '$2y$10$9gVHkByQw6GO3Z9PtjKpaO3Ti2QTgadO15n5c0LlWLsTCGU7b7vse', '78Ali Akber', 'Most Amena', 8, 6, 2, 1, 'N98757', NULL, '2019-01-11 11:36:07', '2019-01-11 11:36:07'),
(117, 'REG-889', 'Sabbir Hossen', '2003-03-18', 'male', 'Islam', 'B+', 'Zoo Road,Mirpur, Dhaka 1224', 'Zoo Road,Mirpur, Dhaka 1224', '1936967444', '9std@gmail.com', '$2y$10$oJ4LqLKCPUAOk9jVUZWi3eZdFoIRh./5RU/jhJsypqzwAWi9oHKI.', '88888Ali Akber', 'Most Amena', 6, 6, 2, 1, 'N98758', NULL, '2019-01-11 11:36:07', '2019-01-11 11:36:07'),
(137, 'REG-99999', 'MD. Maruf Hossen', '2003-03-10', 'male', 'Islam', 'O+', 'Zoo Road,Mirpur, Dhaka 1216', 'Zoo Road,Mirpur, Dhaka 1216', '1935734656', 'std53@gmail.com', '$2y$10$imWpFqmg/oNSJMF2Qmd4lepzCvJ/8X4OIoz6TfVpEYyL/cgWzy0US', 'Ali Akber', 'Most Amena', 8, 6, 2, 0, 'N2541', NULL, '2019-01-11 11:56:01', '2019-01-11 11:56:01'),
(138, 'REG-100000', 'Khandokar Emrul Hasan', '2003-03-11', 'male', 'Islam', 'A-', 'Zoo Road,Mirpur, Dhaka 1217', 'Zoo Road,Mirpur, Dhaka 1217', '1726289080', 'std233@gmail.com', '$2y$10$tUE.JruvwlIKBoAObstxeeR0ZCFVGToOh8p.iKMNBNwGc6z.94LxG', 'Ali Akber2', 'Most Amena', 7, 6, 2, 0, 'N89874', NULL, '2019-01-11 11:56:01', '2019-01-11 11:56:01'),
(139, 'REG-100001', 'Mahmudul Hasan', '2003-03-12', 'male', 'Islam', 'B+', 'Zoo Road,Mirpur, Dhaka 1218', 'Zoo Road,Mirpur, Dhaka 1218', '1991269404', 'std443@gmail.com', '$2y$10$nUOTx9e05G5DAUQ/jz.BNOzzJf3vXeCXtZ6mfRw..QBEkMjm04MwO', '3Ali Akber', 'Most Amena', 6, 7, 1, 0, 'N5874', NULL, '2019-01-11 11:56:01', '2019-01-11 11:56:01'),
(140, 'REG-100002', 'Junayeda Rahman', '2003-03-13', 'female', 'Islam', 'O+', 'Zoo Road,Mirpur, Dhaka 1219', 'Zoo Road,Mirpur, Dhaka 1219', '1715802253', '3st33d@gmail.com', '$2y$10$gvwiC6LuY/y8UOsJCG/hkeyr.XhOAuQH875vYHwfI39ZVs4QjzVEO', '6Ali Akber', 'Most Amena', 6, 7, 1, 0, 'N96584', NULL, '2019-01-11 11:56:01', '2019-01-11 11:56:01'),
(141, 'REG-100003', 'M.A Galib', '2003-03-14', 'male', 'Islam', 'A+', 'Zoo Road,Mirpur, Dhaka 1220', 'Zoo Road,Mirpur, Dhaka 1220', '1750850977', '4st333d@gmail.com', '$2y$10$7zetoIZ0W/zMhTQiRcdmPu99nfmrv8m90MmbKd6akmfCPp10slDuy', '6Ali Akber', 'Most Amena', 8, 7, 1, 0, 'N98754', NULL, '2019-01-11 11:56:01', '2019-01-11 11:56:01'),
(142, 'REG-100004', 'Rabiul Hasan Rifat', '2003-03-15', 'male', 'Islam', 'B-', 'Zoo Road,Mirpur, Dhaka 1221', 'Zoo Road,Mirpur, Dhaka 1221', '1798065959', '5stdtyuy@gmail.com', '$2y$10$m0t/asQcWyH7mbBPlTfRN.WHGFtNkF3qWsMQ8.3aBFhGPdurLdUnG', '5Ali Akber', 'Most Amena', 7, 7, 2, 0, 'N98755', NULL, '2019-01-11 11:56:01', '2019-01-11 11:56:01'),
(143, 'REG-100005', 'MD. Mutakabbir', '2003-03-16', 'male', 'Islam', 'O+', 'Zoo Road,Mirpur, Dhaka 1222', 'Zoo Road,Mirpur, Dhaka 1222', '1947440509', '6sttyutyud@gmail.com', '$2y$10$cjsSkbBqZh5CXagNeS47iOf3/kxiyOUEmVqU0QLrdbwJWsAFJeuNu', '9Ali Akber', 'Most Amena', 7, 7, 2, 0, 'N98756', NULL, '2019-01-11 11:56:01', '2019-01-11 11:56:01'),
(144, 'REG-100006', 'Fardina Islam', '2003-03-17', 'female', 'Islam', 'O+', 'Zoo Road,Mirpur, Dhaka 1223', 'Zoo Road,Mirpur, Dhaka 1223', '1920103239', '7styutyutd@gmail.com', '$2y$10$8xBoDQgbOn76U5hQ1RGVUuyD3npZ/7kVx74VDhxA0ZmXqj67aNHXa', '78Ali Akber', 'Most Amena', 8, 7, 2, 0, 'N98757', 'student-1547230013.jpg', '2019-01-11 11:56:01', '2019-01-11 12:06:53'),
(146, 'REG-X999', 'Class Nine Student', '2004-06-15', 'male', 'Islam', 'P+', 'Addresss', 'sdfsdfsdf Permanent Address', '999999999999999', 'nine@ten.com', '$2y$10$qKLyt54VFHiHXA1GVFUE6eB.M6cLPhha5TQMETEvt.9YVhkOE0KhC', 'Mr Nine Father', 'Mrs Nine Mother', 8, 10, 1, 0, 'NX9999', 'student-1547971637.jpg', '2019-01-20 02:07:17', '2019-01-20 02:09:16');

-- --------------------------------------------------------

--
-- Table structure for table `student_registrations`
--

CREATE TABLE `student_registrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `reg_no` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sessions_id` tinyint(4) NOT NULL,
  `classes_id` tinyint(4) NOT NULL,
  `sections_id` tinyint(4) NOT NULL,
  `student_name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_dob` date NOT NULL,
  `student_gender` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_address1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_address2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_registrations`
--

INSERT INTO `student_registrations` (`id`, `reg_no`, `sessions_id`, `classes_id`, `sections_id`, `student_name`, `student_dob`, `student_gender`, `student_phone`, `student_address1`, `student_address2`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'REG-5c07661eda91f', 8, 2, 2, 'Md Razeeb', '2010-01-02', 'male', '01711033730', 'dhaka', 'bangladesh', 'rrrrr@fffff.bbb', NULL, '$2y$10$VtjtbSW8r2mFAH6KzKW3puan5ayXfAlQ7As0AV4XXY2F7NyTIIlAG', NULL, '2018-12-04 23:48:19', '2018-12-04 23:48:19');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(10) UNSIGNED NOT NULL,
  `subject_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_class` int(5) NOT NULL,
  `subject_mark` int(5) NOT NULL,
  `subject_pass_mark` int(3) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `subject_name`, `subject_code`, `subject_type`, `subject_class`, `subject_mark`, `subject_pass_mark`, `created_at`, `updated_at`) VALUES
(1, 'Bengali', 'xxxx', 'Theory', 5, 100, 40, '2018-12-05 14:33:55', '2019-01-15 05:51:06'),
(4, 'English', 'xxxxx', 'Theory', 5, 100, 40, '2019-01-14 23:52:10', '2019-01-15 05:51:14'),
(6, 'Mathemetics', 'xxxx', 'Theory', 5, 100, 40, '2019-01-14 23:52:54', '2019-01-15 05:51:21'),
(7, 'Social Science', 'xxxxx', 'Theory', 5, 100, 40, '2019-01-14 23:53:15', '2019-01-15 05:51:33'),
(8, 'General Science', 'xxxxxx', 'Theory', 5, 100, 40, '2019-01-14 23:53:31', '2019-01-15 05:52:04'),
(9, 'General Knowledge', 'xxxxx', 'Practical', 5, 50, 20, '2019-01-14 23:54:03', '2019-01-15 05:52:45'),
(10, 'Drawing', 'xxxxxxx', 'Theory', 5, 50, 20, '2019-01-15 00:02:57', '2019-01-15 05:52:27'),
(11, 'Religion', 'xxxxx', 'Theory', 5, 100, 40, '2019-01-15 00:03:33', '2019-01-15 05:53:42'),
(12, 'বাংলা ১ম পত্র', 'bbbb', 'Theory', 8, 100, 33, '2019-01-15 00:04:59', '2019-01-19 02:57:12'),
(13, 'বাংলা ২য় পত্র', 'BBBB', 'Theory', 8, 100, 33, '2019-01-15 00:05:12', '2019-01-19 02:56:45'),
(14, 'ইংরেজি ১ম পত্র', 'EEEE', 'Theory', 8, 100, 33, '2019-01-15 00:05:24', '2019-01-19 02:55:51'),
(15, 'ইংরেজি ২য় পত্র', 'EEEE', 'Theory', 8, 100, 33, '2019-01-15 00:05:47', '2019-01-19 02:55:27'),
(16, 'গণিত (আবশ্যিক)', 'MMMM', 'Theory', 8, 100, 33, '2019-01-15 00:06:07', '2019-01-19 02:53:55'),
(18, 'ধর্ম ও নৈতিক শিক্ষা', 'RRRR', 'Theory', 8, 100, 33, '2019-01-19 02:37:39', '2019-01-19 02:53:16'),
(19, 'বাংলাদেশ ও বিশ্বপরিচয়', 'BBBB', 'Theory', 8, 100, 33, '2019-01-19 02:40:57', '2019-01-19 02:52:41'),
(20, 'বিজ্ঞান', 'SSSS', 'Theory', 8, 100, 33, '2019-01-19 02:41:32', '2019-01-19 02:51:52'),
(21, 'কৃষি/গার্হস্থ্য বিজ্ঞান', 'KKKKK', 'Theory', 8, 100, 33, '2019-01-19 02:44:10', '2019-01-19 02:49:40'),
(22, 'চারু - কারুকলা', 'CCCC', 'Theory', 8, 100, 33, '2019-01-19 02:45:29', '2019-01-19 02:45:29'),
(23, 'শারীরিক শিক্ষা ও স্বাস্থ্য', 'SSSS', 'Theory', 8, 100, 33, '2019-01-19 02:46:33', '2019-01-19 02:46:33'),
(24, 'তথ্য ও যোগাযোগ প্রযুক্তি', 'TTTT', 'Theory', 8, 100, 33, '2019-01-19 02:47:34', '2019-01-19 02:47:34'),
(25, 'কর্ম ও জীবনমুখী শিক্ষা', 'KKKK', 'Theory', 8, 100, 33, '2019-01-19 02:48:39', '2019-01-19 02:48:39'),
(26, 'বাংলা ১ম পত্র', 'RRRR', 'Theory', 10, 100, 33, '2019-01-19 03:02:52', '2019-01-19 03:02:52');

-- --------------------------------------------------------

--
-- Table structure for table `syllabi`
--

CREATE TABLE `syllabi` (
  `id` int(10) UNSIGNED NOT NULL,
  `subject` tinyint(4) NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `syllabi`
--

INSERT INTO `syllabi` (`id`, `subject`, `details`, `created_at`, `updated_at`) VALUES
(3, 1, 'Chapter: 1\r\nChapter: 2', '2018-12-30 06:56:28', '2018-12-30 06:56:28');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `religion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blood_group` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `sex`, `religion`, `blood_group`, `address`, `phone`, `photo`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mr New Teacher', 'Male', 'Islam', 'A-', 'Dhaka, Bangladesh', '+8801971033730', 'teacher-1546432144.jpg', 'teacher1@gmail.com', NULL, '$2y$10$ioKTPtZNxlUrUHxlgt.moOzukj/ieN/c7sgy4EfHJtcuN2Dy9GU7G', NULL, '2019-01-02 05:54:04', '2019-01-02 06:29:04'),
(2, 'Another Teacher', 'Female', 'Hindu', 'B+', 'Sector:5, Uttara, Dhaka', '+880121212546', 'teacher-1546569736.gif', 'another@teacher.com', NULL, '$2y$10$velY8Z8uIbVFtabgcSK4oeKTTcn8qK0gnU7wVGlEDEtzVJiluNn/S', NULL, '2019-01-03 20:42:16', '2019-01-03 20:42:16'),
(3, 'One More Tracher', 'Male', 'Khristan', 'A+', 'Sector:14, Uttara, Dhaka', '+8801356987458', 'teacher-1546573696.jpg', 'onemore@teacher.com', NULL, '$2y$10$VtbqfKFRgWo7JAfOAvdnT.CDUUeRPv/fUIcDb5XPaBwzgSzDs9xlK', NULL, '2019-01-03 21:48:16', '2019-01-03 21:48:16');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_attendances`
--

CREATE TABLE `teacher_attendances` (
  `id` int(10) UNSIGNED NOT NULL,
  `teacher` int(11) NOT NULL,
  `status` enum('0','1','2') COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teacher_attendances`
--

INSERT INTO `teacher_attendances` (`id`, `teacher`, `status`, `date`, `created_at`, `updated_at`) VALUES
(1, 1, '1', '2019-01-09', '2019-01-09 23:56:48', '2019-01-09 23:56:48'),
(2, 2, '2', '2019-01-09', '2019-01-09 23:56:48', '2019-01-09 23:56:48'),
(3, 3, '1', '2019-01-09', '2019-01-09 23:56:48', '2019-01-09 23:56:48'),
(4, 1, '1', '2019-01-10', '2019-01-09 23:57:08', '2019-01-09 23:57:08'),
(5, 2, '1', '2019-01-10', '2019-01-09 23:57:08', '2019-01-09 23:57:08'),
(6, 3, '1', '2019-01-10', '2019-01-09 23:57:08', '2019-01-09 23:57:08'),
(7, 1, '1', '2019-01-08', '2019-01-10 03:56:52', '2019-01-10 03:56:52'),
(8, 2, '1', '2019-01-08', '2019-01-10 03:56:52', '2019-01-10 03:56:52'),
(9, 3, '1', '2019-01-08', '2019-01-10 03:56:52', '2019-01-10 03:56:52'),
(10, 1, '0', '2019-01-11', '2019-01-10 06:09:02', '2019-01-10 06:09:02'),
(11, 2, '0', '2019-01-11', '2019-01-10 06:09:03', '2019-01-10 06:09:03'),
(12, 3, '0', '2019-01-11', '2019-01-10 06:09:03', '2019-01-10 06:09:03'),
(13, 1, '1', '2019-01-12', '2019-01-10 06:10:09', '2019-01-10 06:10:09'),
(14, 2, '2', '2019-01-12', '2019-01-10 06:10:09', '2019-01-10 06:10:09'),
(15, 3, '1', '2019-01-12', '2019-01-10 06:10:09', '2019-01-10 06:10:09'),
(16, 1, '2', '2019-01-01', '2019-01-10 09:49:04', '2019-01-10 09:49:04'),
(17, 2, '1', '2019-01-01', '2019-01-10 09:49:04', '2019-01-10 09:49:04'),
(18, 3, '1', '2019-01-01', '2019-01-10 09:49:04', '2019-01-10 09:49:04'),
(19, 1, '1', '2019-01-13', '2019-01-13 05:31:35', '2019-01-13 05:31:35'),
(20, 2, '1', '2019-01-13', '2019-01-13 05:31:35', '2019-01-13 05:31:35'),
(21, 3, '1', '2019-01-13', '2019-01-13 05:31:35', '2019-01-13 05:31:35'),
(22, 1, '1', '2019-01-02', '2019-01-13 05:33:58', '2019-01-13 05:33:58'),
(23, 2, '1', '2019-01-02', '2019-01-13 05:33:58', '2019-01-13 05:33:58'),
(24, 3, '1', '2019-01-02', '2019-01-13 05:33:58', '2019-01-13 05:33:58'),
(25, 1, '1', '2019-01-03', '2019-01-13 05:34:06', '2019-01-13 05:34:06'),
(26, 2, '2', '2019-01-03', '2019-01-13 05:34:06', '2019-01-13 05:34:06'),
(27, 3, '1', '2019-01-03', '2019-01-13 05:34:06', '2019-01-13 05:34:06'),
(28, 1, '1', '2019-01-05', '2019-01-13 05:34:24', '2019-01-13 05:34:24'),
(29, 2, '1', '2019-01-05', '2019-01-13 05:34:24', '2019-01-13 05:34:24'),
(30, 3, '1', '2019-01-05', '2019-01-13 05:34:24', '2019-01-13 05:34:24'),
(31, 1, '1', '2019-01-06', '2019-01-13 05:34:32', '2019-01-13 05:34:32'),
(32, 2, '1', '2019-01-06', '2019-01-13 05:34:32', '2019-01-13 05:34:32'),
(33, 3, '2', '2019-01-06', '2019-01-13 05:34:32', '2019-01-13 05:34:32'),
(34, 1, '2', '2019-01-07', '2019-01-13 05:34:42', '2019-01-13 05:34:42'),
(35, 2, '1', '2019-01-07', '2019-01-13 05:34:42', '2019-01-13 05:34:42'),
(36, 3, '1', '2019-01-07', '2019-01-13 05:34:42', '2019-01-13 05:34:42'),
(37, 1, '2', '2019-01-14', '2019-01-13 06:29:31', '2019-01-13 06:29:31'),
(38, 2, '1', '2019-01-14', '2019-01-13 06:29:31', '2019-01-13 06:29:31'),
(39, 3, '1', '2019-01-14', '2019-01-13 06:29:31', '2019-01-13 06:29:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Md Salman Sajib', 'salman@gmail.com', NULL, '$2y$10$39Gt4HFLJ8Ry1KbbvqX8guvGE8DtIB.ltSv6Yqv/IANQyu8Cf5nCm', 'jPTw10t7deohPSRyQafFG1CPiKe0DSzIDtsmYG8QQA7eoOc8dIUQpqBV5oEm', '2018-12-02 03:03:43', '2018-12-02 03:03:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assign_marks`
--
ALTER TABLE `assign_marks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cashcollections`
--
ALTER TABLE `cashcollections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `classes_classes_rank_unique` (`classes_rank`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `disciplines`
--
ALTER TABLE `disciplines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `evaluate_home_works`
--
ALTER TABLE `evaluate_home_works`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `examinations`
--
ALTER TABLE `examinations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favicons`
--
ALTER TABLE `favicons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feetypes`
--
ALTER TABLE `feetypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_works`
--
ALTER TABLE `home_works`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `incomeexpanseheads`
--
ALTER TABLE `incomeexpanseheads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logos`
--
ALTER TABLE `logos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monthlyfees`
--
ALTER TABLE `monthlyfees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `playto_five_results`
--
ALTER TABLE `playto_five_results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setresults`
--
ALTER TABLE `setresults`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `six_to_eight_results`
--
ALTER TABLE `six_to_eight_results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_reg_no_unique` (`reg_no`),
  ADD UNIQUE KEY `students_email_unique` (`email`);

--
-- Indexes for table `student_registrations`
--
ALTER TABLE `student_registrations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_registrations_email_unique` (`email`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `syllabi`
--
ALTER TABLE `syllabi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `teachers_email_unique` (`email`);

--
-- Indexes for table `teacher_attendances`
--
ALTER TABLE `teacher_attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assign_marks`
--
ALTER TABLE `assign_marks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `cashcollections`
--
ALTER TABLE `cashcollections`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `disciplines`
--
ALTER TABLE `disciplines`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `evaluate_home_works`
--
ALTER TABLE `evaluate_home_works`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `examinations`
--
ALTER TABLE `examinations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `favicons`
--
ALTER TABLE `favicons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `feetypes`
--
ALTER TABLE `feetypes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `home_works`
--
ALTER TABLE `home_works`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `incomeexpanseheads`
--
ALTER TABLE `incomeexpanseheads`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `logos`
--
ALTER TABLE `logos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `monthlyfees`
--
ALTER TABLE `monthlyfees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `playto_five_results`
--
ALTER TABLE `playto_five_results`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `setresults`
--
ALTER TABLE `setresults`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `six_to_eight_results`
--
ALTER TABLE `six_to_eight_results`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT for table `student_registrations`
--
ALTER TABLE `student_registrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `syllabi`
--
ALTER TABLE `syllabi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `teacher_attendances`
--
ALTER TABLE `teacher_attendances`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
