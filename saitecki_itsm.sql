-- phpMyAdmin SQL Dump
-- version 4.9.11
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 28, 2023 at 07:49 AM
-- Server version: 5.7.23-23
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `saitecki_itsm`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `phone`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Murugan', '9003134721', 'murugan.p@xcmgindia.com', NULL, '$2y$10$EsmZBMfc2LwcMUPUDY6oF.CyjqOCiDySmdKupK0T.UmKxq/O/IfD.', NULL, NULL, NULL),
(2, 'Selvinkumar', '9003134721', 'selvinkumar.s@saiteck.in', NULL, '$2y$10$EsmZBMfc2LwcMUPUDY6oF.CyjqOCiDySmdKupK0T.UmKxq/O/IfD.', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `consultants`
--

CREATE TABLE `consultants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `consultants`
--

INSERT INTO `consultants` (`id`, `name`, `department`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Aravind', 'PP', 'sap_pp@innovasivtech.com', NULL, '$2y$10$k4T.XuWko11G0/YWS/R.me2XRPA9p68I4SRzMybLHSMnb.bBK6vea', NULL, '2023-03-17 22:25:55', '2023-03-17 22:25:55'),
(2, 'Venkata Krishnan', 'MM', 'sap_mm@innovasivtech.com', NULL, '$2y$10$OKsyQ5jqzBstlgWQyNRxN.uLVAl49U2zKCkEJBCKdhUb/elnnAuGG', NULL, '2023-03-17 22:26:49', '2023-03-17 22:26:49'),
(3, 'Arunkumar', 'QM', 'sap_qm@innovasivtech.com', NULL, '$2y$10$LIamnNY80l.QSN6M3PSuFOxHA/.ZJCHFOZCGqztNLWzOAbfEefW6q', NULL, '2023-03-17 22:31:27', '2023-03-17 22:31:27'),
(4, 'DinakarRaja', 'FI', 'sap_fi@innovasivtech.com', NULL, '$2y$10$guyYpmA1/1fbICPU2NP9suv6zZZVQspHdVEqlb9k55Ct/DL7XxXDa', NULL, '2023-03-17 22:32:14', '2023-03-17 22:32:14'),
(5, 'Suryaprakash', 'CO', 'sap_co@innovasivtech.com', NULL, '$2y$10$qLge5kRAYrX1boXfIrqffOerbJ2qZcd1q3oFkQDicWqN4mjDq3NuG', NULL, '2023-03-17 22:32:50', '2023-03-17 22:32:50'),
(6, 'Gobinath', 'SD', 'sap_sd@innovasivtech.com', NULL, '$2y$10$Hw12O2G8FFbbcMsbRtHIgucyyP9sdeTgBPdW5t9XQMzaRcIZuv0F2', NULL, '2023-03-17 22:33:32', '2023-03-17 22:33:32'),
(7, 'Gurumoorthy', 'SECURITY', 'sap_security@innovasivtech.com', NULL, '$2y$10$6VYBw0qxJY65kW6eGGkb2uzSNSZysQEsdcO3zCVDtQv2eWEEGOP3.', NULL, '2023-03-23 23:06:04', '2023-03-23 23:06:04');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ticket` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `to` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_read` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `from`, `ticket`, `to`, `message`, `is_read`, `created_at`, `updated_at`) VALUES
(1, 'Venkata Krishnan', '1', 'Amitkumar.B', 'Kindly mention the PO document number sir', 1, '2023-03-20 20:20:44', '2023-03-24 15:26:23'),
(2, 'Arunkumar', '2', 'Karthik.K', 'Dear Sir,\nBy using Serial number tile,we can able to track the current status of the material serial number, production order wise & Stage-wise.So depending upon the stage at which the serialnumber/machine is currently present, we can proceed with the relevant transactions.(like Goods issue,Order confirmation,GR etc).', 1, '2023-03-21 15:53:13', '2023-03-27 10:14:47'),
(3, 'Suryaprakash', '3', 'Amitkumar.B', 'Now we have resolved the issue, the G/L which is assigned as per the requirement has been changed now in a Production system.', 1, '2023-03-22 17:38:56', '2023-03-24 16:55:25'),
(4, 'DinakarRaja', '5', 'Suresh. R', 'updated', 1, '2023-03-23 17:04:37', '2023-03-28 06:26:49'),
(5, 'Aravind', '4', 'Abraham Lingan.VR', 'Kindly Check the stock of particular  Serial Number (.30 level)in MMBE.', 1, '2023-03-23 17:29:14', '2023-03-25 09:31:16'),
(6, 'Aravind', '6', 'Abraham Lingan.VR', 'Storage location is not maintained for the Specific materials, pls share the list to your MDM team(Mr.Weichan) they will extend the storage location', 1, '2023-03-23 18:40:11', '2023-03-25 09:31:16'),
(7, 'Aravind', '7', 'Abraham Lingan.VR', 'kindly check with weichen sir once again, Material is not extended properly.so that you are facing same error', 1, '2023-03-24 15:57:14', '2023-03-25 09:31:16'),
(8, 'Suryaprakash', '3', 'Amitkumar.B', 'Issue resolve kindly close the ticket.', 1, '2023-03-24 16:55:25', '2023-03-24 16:55:25'),
(9, 'Arunkumar', '8', 'Karthik.K', 'Dear sir,\nIn order to solve this error,\n\nStep 1: Assign Inspection type 08 to the respective material.\n\nStep 2: Transfer the stock from unrestricted to quality (322 Movement type)by using \"Transfer Stock-In plant\" tile and transfer the stock(wrongly entered serial number)\nNote: As a result of stock transfer ,an inspection lot of 08 origin will get generated. Don\'t clear the lot.\n\nStep 3: Now cancel the Goods receipt of production order by using MIGO(102 Movement type).\n\nStep 4: Perform Goods receipt for the same production order.Delete the wrongly entered serial number and paste the correct serial number. Check & then Save.\n\nStep 5: Material document will get generated. As a result of this inspection lot will get triggered with correct serial Number.\n\nStep 6: Go to \"Process inspection lot worklist\" tile. Perform Result recording & Usage decision. Stock will be moved to Unrestricted use.', 1, '2023-03-27 10:13:51', '2023-03-27 10:14:47'),
(10, 'Arunkumar', '8', 'Karthik.K', 'Dear sir,\n\nSolution provided. Kindly close the ticket', 1, '2023-03-27 10:14:22', '2023-03-27 10:14:47'),
(11, 'DinakarRaja', '9', 'Suresh. R', 'Changes has been made, Kindly check and close the ticket sir', 1, '2023-03-28 06:26:48', '2023-03-28 06:26:49');

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
(4, '2021_07_26_094505_create_tickets_table', 1),
(5, '2021_08_02_110156_create_admins_table', 2),
(6, '2021_08_02_121800_create_consultants_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `name`, `created_at`) VALUES
(1, 'BASIS', ''),
(2, 'ABAP', ''),
(3, 'FI', ''),
(4, 'CO', ''),
(5, 'PP', ''),
(6, 'QM', ''),
(7, 'MM', ''),
(8, 'SD', ''),
(9, 'PM', ''),
(10, 'SECURITY', '');

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
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_project` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `proj_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `proj_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `proj_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `id_project`, `created_at`, `updated_at`, `proj_name`, `proj_code`, `proj_type`, `company_location`, `company_name`) VALUES
(1, 'XCMM', '2023-03-20 18:13:09', '2023-03-20 18:13:09', 'XCMM', 'XRISE001', 'Support', 'Cheyyar', 'XCMM India Private Limited (XCMG)');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_app_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modulename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `change_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cancel_reson` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `WUI` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_time_input_request` timestamp NULL DEFAULT NULL,
  `project` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `severity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `responsible` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fileformat` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `assignedto` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `assignedat` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `acceptedat` timestamp NULL DEFAULT NULL,
  `solution` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `completedat` timestamp NULL DEFAULT NULL,
  `reassign` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `response_sent` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nosolutionsent` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `close_status` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_close_status` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `type`, `time_app_status`, `modulename`, `change_time`, `cancel_reson`, `WUI`, `date_time_input_request`, `project`, `summary`, `description`, `level`, `severity`, `responsible`, `status`, `fileformat`, `created_by`, `assignedto`, `assignedat`, `created_at`, `updated_at`, `acceptedat`, `solution`, `completedat`, `reassign`, `response_sent`, `nosolutionsent`, `close_status`, `user_close_status`) VALUES
(1, 'Incident', '', 'MM', '', '', '', NULL, 'XCMM', 'PO Print Problem', 'At the time of taking PO print, showing run time error', '1', 'Critical', 'Venkata Krishnan', '5', 'png', 'Amitkumar.B', 'Venkata Krishnan', '2023-03-20 19:59:57', '2023-03-20 19:08:20', '2023-03-28 09:43:59', '2023-03-20 20:19:10', '', '2023-03-28 09:43:59', '2023-03-24 09:26:49', '', '', 'Issue Solved. Kindly close the ticket.', 'ok'),
(2, 'Service', '', 'QM', '', '', '', NULL, 'XCMM', 'Error while production order confirmation', 'Error while production order confirmation of following machines.\r\n\r\nXUGA140NPNKA00291\r\nXUGA140NKNKA00275', '2', 'High', 'Arunkumar', '5', 'png', 'Karthik.K', 'Arunkumar', '2023-03-20 21:12:28', '2023-03-20 19:21:58', '2023-03-22 00:13:17', '2023-03-20 21:12:28', '', '2023-03-22 00:13:17', '2023-03-21 09:59:38', '', '', '', 'Resolved by QM/ PP Consultant.'),
(3, 'Incident', '', 'CO', '', '', '', NULL, 'XCMM', 'Error in GRM', 'Error showing at the time of GRN against many PO , for example screen shot attatched.', '1', 'Critical', 'Suryaprakash', '3', 'png', 'Amitkumar.B', 'Suryaprakash', '2023-03-21 18:36:54', '2023-03-21 18:17:27', '2023-03-24 16:58:33', '2023-03-21 18:36:54', '', NULL, '2023-03-24 10:58:33', '', '', '', ''),
(4, 'Incident', '', 'PP', '', '', '', NULL, 'XCMM', 'Error in Post goods movement', 'serial no error while doing Post goods movement..\r\n\r\nRegards,\r\nSoundar.', '4', 'Medium', 'Aravind', '5', 'png', 'Abraham Lingan.VR', 'Aravind', '2023-03-23 17:25:39', '2023-03-22 21:35:21', '2023-03-25 05:57:06', '2023-03-23 17:25:39', '', '2023-03-25 05:57:06', '2023-03-25 11:24:57', '', '', 'Kindly Check the stock of particular Serial Number (.30 level)in MMBE.', 'ok'),
(5, 'Incident', '', 'FI', '', '', '', NULL, 'XCMM', 'TDS Round off', 'TDS is currently rounded off in SAP. TDS should not be rounded off.', '3', 'Medium', 'DinakarRaja', '5', '', 'Suresh. R', 'DinakarRaja', '2023-03-22 23:44:07', '2023-03-22 23:41:28', '2023-03-23 17:57:27', '2023-03-22 23:44:07', '', '2023-03-23 17:57:27', '2023-03-23 11:05:35', '', '', 'TDS round off has been removed', 'Ok'),
(6, 'Incident', '', 'PP', '', '', '', NULL, 'XCMM', 'Error in Create reservation', 'No storage location data for 000000960600000090 in 9260 P001', '3', 'Low', 'Aravind', '5', 'png', 'Abraham Lingan.VR', 'Aravind', '2023-03-23 18:38:40', '2023-03-23 18:35:47', '2023-03-25 05:57:15', '2023-03-23 18:38:40', '', '2023-03-25 05:57:15', '2023-03-25 11:25:08', '', '', 'Storage location is not maintained for the Specific materials, pls share the list to your MDM team(Mr.Weichan) they will extend the storage location', 'ok'),
(7, 'Incident', '', 'PP', '', '', '', NULL, 'XCMM', 'Error in Post goods movement', 'Yesterday Also Same Problem Occurs. Wei Chen Side Updated, Bur Today also Same Problem Occurs.\r\nGive me solution.', '4', 'Medium', 'Aravind', '5', 'png', 'Abraham Lingan.VR', 'Aravind', '2023-03-24 15:55:56', '2023-03-24 15:53:02', '2023-03-25 05:56:55', '2023-03-24 15:55:56', '', '2023-03-25 05:56:55', '2023-03-25 11:25:21', '', '', 'kindly check with weichen sir once again, Material is not extended properly.so that you are facing same error', 'solved'),
(8, 'Incident', '', 'QM', '', '', '', NULL, 'XCMM', 'Serial No. wrongly entered in Production Order', 'Serial No. wrongly entered in Production Order. 1000502 Goods issue, Goods Receipt and UD Done.', '4', 'Critical', 'Arunkumar', '3', 'png', 'Karthik.K', 'Arunkumar', '2023-03-24 16:13:50', '2023-03-24 16:04:05', '2023-03-27 10:14:29', '2023-03-24 16:13:50', '', NULL, '2023-03-27 15:44:29', '', '', '', ''),
(9, 'Incident', '', 'FI', '', '', '', NULL, 'XCMM', 'OBYC assignment', 'Change G/L desciption of GL 5100000124  Material cost to \r\nStock difference and Assign GL 5100000124 to OBYC settings.', '3', 'High', 'DinakarRaja', '5', '', 'Suresh. R', 'DinakarRaja', '2023-03-28 06:23:43', '2023-03-28 06:05:11', '2023-03-28 06:30:03', '2023-03-28 06:23:43', '', '2023-03-28 06:30:03', '2023-03-28 11:57:34', '', '', 'Change has been made, sir.', 'ok'),
(10, 'Incident', '', 'MM', '', '', '', NULL, 'XCMM', 'Wrong Date Capture in PR Print', 'PR Submission date is showing future date  04th Apr\'23.\r\nBut it was approved on 21st Mar\'23.\r\n\r\nSo It should be 21st Mar\'23 for submission.', '1', 'Critical', 'Venkata Krishnan', '3', 'png', 'Amitkumar.B', 'Venkata Krishnan', '2023-03-28 12:28:09', '2023-03-28 09:40:56', '2023-03-28 12:28:10', '2023-03-28 12:28:09', '', NULL, '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `proj_name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `proj_name`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Amitkumar.B', 'amitkumar.b@xcmgindia.com', '', NULL, '$2y$10$HpXE0hzEE3otE.IpiQhXeOPEi5B9Qcy8RbMP21qPmcxcfixg7WNNO', NULL, '2023-03-02 03:10:28', '2023-03-02 03:10:28'),
(2, 'Abraham Lingan.VR', 'abragamlingan.vr@xcmgindia.com', '', NULL, '$2y$10$CqG4NEK2hTjK7191qo/8YeQdHd46Z9qYpVTfq5YrDwyApJz9kwREe', NULL, '2023-03-02 04:20:54', '2023-03-02 04:20:54'),
(3, 'Ravinder.P', 'ravinder.p@xcmgindia.com', '', NULL, '$2y$10$vnOQSFD0dIFgku0FWHWyY.mkf5nblYGu949nFIhPW5XMzCTqUn.Ny', NULL, '2023-03-02 04:21:55', '2023-03-02 04:21:55'),
(4, 'Viswanathan.D', 'viswanathan.d@xcmgindia.com', '', NULL, '$2y$10$lPz1kRXJ.iuGL.LQd10Iw.YRjN8gfwq3KT7ztj0yipUwwhBcDjN0O', NULL, '2023-03-02 04:22:31', '2023-03-02 04:22:31'),
(5, 'Sathish Kumar.B', 'sathishkumar.b@xcmgindia.com', '', NULL, '$2y$10$HNxlwCdNZ1E9F2IsyjbzD.W.dNuSb3rLo5J1OZOw.Qn3iYGRU1uAi', NULL, '2023-03-02 04:23:07', '2023-03-02 04:23:07'),
(6, 'Karthik.K', 'karthik.k@xcmgindia.com', '', NULL, '$2y$10$HaTDKnIWsL6MpCcEP7FyheUJJ/SLEnyox28eZW8nbfMNZD8sAM0kS', NULL, '2023-03-02 04:24:00', '2023-03-02 04:24:00'),
(7, 'Suresh. R', 'suresh.r@xcmgindia.com', '', NULL, '$2y$10$bdmazksGYz6KNXeryLGk8uH2IXU8ZghcOd.O4PN2bly1VLcR7GQ.y', NULL, '2023-03-02 04:24:57', '2023-03-02 04:24:57'),
(8, 'Dandapani.S', 'dandapani.s@xcmgindia.com', '', NULL, '$2y$10$qkyNXdVvQw6Y7ngYqvHMA.qL6lcwK9t6RzuNEKs2ay7UoAEbgTRx2', NULL, '2023-03-02 04:25:28', '2023-03-02 04:25:28'),
(9, 'Rajeswaran.B', 'rajeswaran.b@xcmgindia.com', '', NULL, '$2y$10$baOvlZiZWC/Umv/dBUpLce7NPpNBDfcehmQFV9ZPQz7k63HTJDo5.', NULL, '2023-03-02 04:30:59', '2023-03-02 04:30:59'),
(10, 'gurumoorthy', 'sap_security@innovasivtech.com', '', NULL, '$2y$10$5TvKCYGsk1FB3au4pWDJguqtrZn.k/IKgYSDEwQwO5bqe12YVgG0e', NULL, '2023-03-23 23:01:20', '2023-03-23 23:01:20'),
(11, 'Wei Che', 'wei.chen@xcmgindia.com', '', NULL, '$2y$10$z0cX8CmIvZ1xOc5g0BrEmOQJ0isMCbFGHkpXzxyZ9eZdYkj3hnOlC', NULL, '2023-03-24 16:39:29', '2023-03-24 16:39:29');

-- --------------------------------------------------------

--
-- Table structure for table `user_assign_projects`
--

CREATE TABLE `user_assign_projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_assign_projects`
--

INSERT INTO `user_assign_projects` (`id`, `user_name`, `email`, `project_code`, `project_name`, `created_at`, `updated_at`) VALUES
(1, 'Amitkumar.B', 'amitkumar.b@xcmgindia.com', '0', 'XCMM', '2023-03-20 18:13:31', '2023-03-20 18:13:31'),
(2, 'Abraham Lingan.VR', 'abragamlingan.vr@xcmgindia.com', '0', 'XCMM', '2023-03-20 18:13:31', '2023-03-20 18:13:31'),
(3, 'Ravinder.P', 'ravinder.p@xcmgindia.com', '0', 'XCMM', '2023-03-20 18:13:31', '2023-03-20 18:13:31'),
(4, 'Viswanathan.D', 'viswanathan.d@xcmgindia.com', '0', 'XCMM', '2023-03-20 18:13:31', '2023-03-20 18:13:31'),
(5, 'Sathish Kumar.B', 'sathishkumar.b@xcmgindia.com', '0', 'XCMM', '2023-03-20 18:13:31', '2023-03-20 18:13:31'),
(6, 'Karthik.K', 'karthik.k@xcmgindia.com', '0', 'XCMM', '2023-03-20 18:13:31', '2023-03-20 18:13:31'),
(7, 'Suresh. R', 'suresh.r@xcmgindia.com', '0', 'XCMM', '2023-03-20 18:13:31', '2023-03-20 18:13:31'),
(8, 'Dandapani.S', 'dandapani.s@xcmgindia.com', '0', 'XCMM', '2023-03-20 18:13:31', '2023-03-20 18:13:31'),
(9, 'Rajeswaran.B', 'rajeswaran.b@xcmgindia.com', '0', 'XCMM', '2023-03-20 18:13:31', '2023-03-20 18:13:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `consultants`
--
ALTER TABLE `consultants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
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
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_assign_projects`
--
ALTER TABLE `user_assign_projects`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `consultants`
--
ALTER TABLE `consultants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_assign_projects`
--
ALTER TABLE `user_assign_projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
