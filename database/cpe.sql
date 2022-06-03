-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Jun 03, 2022 at 03:07 PM
-- Server version: 10.5.8-MariaDB-1:10.5.8+maria~focal
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cpereq`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_01_28_175945_create_sessions_table', 1),
(7, '2022_01_30_161734_create_groups_table', 1),
(8, '2022_01_30_161741_create_links_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project_groups`
--

CREATE TABLE `project_groups` (
  `id` int(10) NOT NULL,
  `project_name` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `project_advisor` int(10) UNSIGNED DEFAULT NULL,
  `committee1` int(10) UNSIGNED DEFAULT NULL,
  `committee2` int(10) UNSIGNED DEFAULT NULL,
  `committee3` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project_groups`
--

INSERT INTO `project_groups` (`id`, `project_name`, `project_advisor`, `committee1`, `committee2`, `committee3`) VALUES
(1, 'Project IPT - Action Puzzle Game with Butterfly Effect', 1, 7, 2, 3),
(2, 'ระบบปัญญาประดิษฐ์ที่ช่วยในการจัดตารางเรียนภาควิชาวิศวกรรมคอมพิวเตอร์', 2, 16, 4, 7),
(3, 'An Artificial Intelligence System for Real Estate Price Estimation Assistant', 2, 8, 12, 13),
(4, 'Just Exam, a web application for an online exam', 3, 9, 18, 20),
(5, 'แอปพลิเคชันสำหรับเฝ้าระวังป้องกัน และแจ้งเตือนให้กับผู้ประสบภัยทางธรรมชาติ', 3, 14, 15, 12),
(6, 'SanamMai?:แอปพลิเคชันสำหรับจองสนามกีฬาและหาเพื่อนเล่นกีฬา', 3, 9, 4, 15),
(7, 'Menta : Choreography tutorial web application', 3, 9, 19, 15),
(8, 'Data Warehouse to Support Agoda Product', 3, 1, 19, 20),
(9, 'Web application for data integration', 3, 13, 6, 20),
(11, 'Kmutt Student Organization Election on Blockchain Technology', 5, 15, 18, 20),
(12, 'ConfigChain: Web Application for Network Configuration\nManagement with Blockchain Technology', 5, 15, 13, 20),
(13, 'The Decentralized Yield Aggregator Ecosystem', 5, 17, 16, 8),
(14, 'Forex Technical Indicator Dashboard System for Monitoring and Decision Trading', 5, 6, 18, 19),
(15, 'Blockchain base donation platform', 5, 4, 13, 18),
(16, 'Hi-Tech Low-Level Contactless IoT Payment Terminal', 5, 17, 13, 18),
(17, 'แอปพลิเคชันรักษ์แมวไทย (Mobile Application Rak Maew Thai)', 6, 4, 9, 7),
(18, 'TV Series Recommendation System for True ID Application', 6, 4, 9, 21),
(19, 'Alice’s Nightmare: เกมเพื่อการศึกษาสำหรับการเรียนรู้วิชาภาษาอังกฤษแนว RPG', 7, 14, 1, 21),
(20, 'Programming Grader System V.2 (Continue from the previous year topic)', 7, 16, 20, 21),
(21, 'Turn-based Strategy Game for Resource Management Skill', 7, 2, 13, 18),
(22, 'LOGICA: Digital Educational Game for Learning Boolean Algebra and Flip-Flop Circuits', 7, 16, 18, 4),
(23, 'Realtime Strategy Multiplayer Tower Defense game', 7, 9, 3, 6),
(24, 'Mobile Suit Gundam Volt’s Resolution : Digital Educational Game For Basic Digital Circuit Learning', 9, 2, 13, 8),
(25, 'DETEKTIV : 3D Puzzle C Learning Game', 1, 7, 10, 19),
(26, '2d pixel game', 7, 2, 12, 16),
(27, 'Internal UI Framework for LINE MAN iOS', 9, 6, 9, 14),
(28, 'ซอฟต์แวร์สร้างชุดคำสั่งสำหรับทดสอบเว็บไซต์แบบอัตโนมัติ สำหรับผู้ไม่ชำนาญด้านการเขียนโปรแกรมผ่านการเขียนโปรแกรมด้วยภาพ (Visual Programming Language (VPL))', 8, 6, 4, 1),
(29, 'Automatic human pose retargeting algorithm for motion capture system \"อัลกอริทึมสำหรับถ่ายโอนท่าทางของโมเดลมนุษย์แบบอัตโนมัติสำหรับใช้งานร่วมกับระบบโมชั่นแคปเจอร์\"', 8, 13, 4, 5),
(30, 'Informing shop for the blind line bot', 8, 16, 18, 2),
(31, 'ระบบวัดขนาดหน้าตัดท่อนไม้อัตโนมัติ', 8, 18, 4, 5),
(32, 'ระบบปัญญาประดิษฐ์สำหรับลดความซับซ้อนของประโยคภาษาไทย', 8, 9, 17, 2),
(33, 'EV Charger IoT', 8, 17, 16, 10),
(34, 'Mobile Application for Mood Tracker Diary and Mood Tracking Analysis\nแอปพลิเคชันมือถือสำหรับบันทึกอารมณ์จากเหตุการณ์ในชีวิตประจำวันและวิเคราะห์อารมณ์ความรู้สึก', 9, 8, 14, 21),
(35, 'Route Monitoring and Tuning Recommendation for Border Gateway Protocol in Service Provider Networks', 10, 6, 20, 12),
(36, 'Forecasting COVID-19 cases in Thailand using machine learning models (การพยากรณ์จำนวนผู้ติดเชื้อจากโรคโควิด-19 โดยใช้การเรียนรู้ของเครื่องในประเทศไทย)', 10, 24, 26, 6),
(37, 'Development of lung performance analytical model of screening of factory workers exposed to dust and and at risk for restrictive lung diseases (การสร้างแบบจําลองเพื่อวิเคราะห์ประสิทธิภาพปอดสําหรับการคัด กรองผู้มีโอกาสเกิดกลุ่มโรคที่มีการจํากัดการขยายตัวของปอด)', 10, 26, 24, 11),
(38, 'โปรแกรมตรวจจับมาลาเรียบนฟิล์มเลือด \n(Malaria detection program on blood film)', 11, 23, 2, 26),
(39, 'Web application for predicting severity of road accident victims', 11, 26, 20, 25),
(40, 'RaisenAsk: an Application for Live Interactive Learning Platform with Built-in Prepared-in-advance Quizzes and Exercises', 11, 14, 3, 1),
(41, 'FlexForm: Flexible Form Builder with Data Analytics', 11, 14, 12, 4),
(42, 'Speech Stroop Test: โปรแกรมเพื่อตรวจจับความผิดปกติทางความคิดเชิงบริหาร (Executive Function) ของผู้สูงอายุในประเทศไทย', 11, 17, 19, 10),
(43, 'The web application for t-shirt wholesale business with a recommendation system', 11, 14, 12, 19),
(45, 'Re:Civilization : Probabilities Mathematic Game Development for High School Students', 14, 7, 12, 16),
(48, 'Research and Comparison of Quantum Gradient', 15, 13, 1, 21),
(49, 'Quantum Circuit Editor for Various Architectures of IBMQ', 15, 13, 1, 21),
(50, 'Quantum Programming Studio for Educators and Learners', 15, 1, 13, 21),
(51, 'Operational plan for ERP system development for factory', 15, 14, 4, 3),
(52, 'The Development of Interface for Job Management in Kubernetes', 15, 1, 16, 3),
(53, 'Refactor a core feature to a new service to support Mass Emailing', 15, 4, 12, 10),
(54, 'เว็บแอปพลิเคชันสำหรับการควบคุม/ดูแลน้ำหนักตัวในยุควิถีชีวิตใหม่ด้วยตนเอง\nWeb application for weight management in New Normal lifestyle', 16, 25, 5, 21),
(55, 'Robot-OS-based Automated Guided Vehicle(AGV)', 16, 1, 2, 18),
(56, 'Analysis of genotype-phenotype-environment association problem within cassava storage roots metabolic reaction network (การวิเคราะห์ปัญหาความสัมพันธ์ระหว่างจีโนไทป์ ฟีโนไทป์ และสภาพแวดล้อมในโครงข่ายเมตาบอลิซึมของรากมันสำปะหลัง)', 17, 27, 22, 19),
(57, 'Core/Pan genome analysis of leptospire genomes', 17, 27, 25, 6),
(58, 'Cryptocurrency Analysis for monitoring Transactions of Ethereum coins on Chatbot', 17, 5, 8, 20),
(59, 'ServerTweet: Systems Management, Monitoring, and Data Analytics on Web Application', 17, 10, 19, 11),
(60, 'Macroeconomic indicators prediction from past financial data and news', 17, 5, 8, 20),
(61, 'Vertica Database Performance Dashboard', 17, 10, 20, 11),
(62, 'Building ETL tools in Spark for Agoda Data Platform', 17, 10, 7, 12),
(63, 'Virtual exhibitions @KMUTT archive', 19, 14, 18, 9),
(64, 'KMUTT information center', 19, 11, 12, 12),
(65, 'An Image based access control system', 20, 19, 11, 2),
(66, 'CPE32 CTF Playground', 20, 18, 6, 11),
(67, 'Mobile Application for collecting user history medication data.\n(แอพพลิเคชันสำหรับเก็บข้อมูลประวัติการได้รับยา)', 21, 10, 24, 22),
(68, 'Spatiotemporal epidemiology and analysis of dengue infection and control in Thailand: insights from a mixed-methods approach.', 21, 23, 22, 3),
(69, 'การแบ่งส่วนกลีบปอดและรอยโรคเพื่อการจำแนกระดับความรุนแรงของภาพถ่ายเอกซเรย์คอมพิวเตอร์ปอดผู้ป่วยโควิด-19\n(Segmentation of lung lobes and lesions for severity classification of COVID-19 CT scans)', 21, 22, 23, 6),
(70, 'เว็บแอปพลิเคชันสำหรับการหางานในต่างประเทศ (A Web Application for Finding a Job Aboard)', 21, 15, 6, 9),
(71, 'Auto mood tracker', 21, 5, 24, 8),
(72, 'Point Of Sale System on Web Application (New Project)', 17, 14, 13, 12);

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `request_by` int(10) UNSIGNED NOT NULL,
  `request_to` int(10) UNSIGNED NOT NULL,
  `project_group` int(10) NOT NULL,
  `request_file` varchar(200) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` int(1) NOT NULL,
  `review` text DEFAULT NULL,
  `review_file` varchar(200) DEFAULT NULL,
  `sign` int(1) DEFAULT NULL,
  `created_at` varchar(100) DEFAULT NULL,
  `updated_at` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('e3Ld5uTKlw4ANRFkZxzkIg0EQJcVLlGQaa3FxkDH', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.61 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSEt6ejV5Q0wxN1MwU3RnRjNQemlKclFPMUZQWTlyMjJERExQa0NiaiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7fX0=', 1654268844);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(1) DEFAULT 0,
  `project_group` int(10) DEFAULT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `project_group`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Aj. Jaturon', 'jaturon@cpe.kmutt.ac.th', NULL, '$2y$10$SpYo2oxDXz3lOCOq7nvD6.Qx34C4MfbKXEagINAqn/i2AgiCs7EGC', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Aj. Jumpol', 'jumpol@cpe.kmutt.ac.th', NULL, '$2y$10$SpYo2oxDXz3lOCOq7nvD6.Qx34C4MfbKXEagINAqn/i2AgiCs7EGC', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'Aj. Khajonpong', 'khajonpon@cpe.kmutt.ac.th', NULL, '$2y$10$SpYo2oxDXz3lOCOq7nvD6.Qx34C4MfbKXEagINAqn/i2AgiCs7EGC', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'Aj. Kharittha', 'kharittha@cpe.kmutt.ac.th', NULL, '$2y$10$SpYo2oxDXz3lOCOq7nvD6.Qx34C4MfbKXEagINAqn/i2AgiCs7EGC', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'Aj. Marong', 'marong@cpe.kmutt.ac.th', NULL, '$2y$10$SpYo2oxDXz3lOCOq7nvD6.Qx34C4MfbKXEagINAqn/i2AgiCs7EGC', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'Aj. Naruemon', 'naruemon@cpe.kmutt.ac.th', NULL, '$2y$10$SpYo2oxDXz3lOCOq7nvD6.Qx34C4MfbKXEagINAqn/i2AgiCs7EGC', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'Aj. Natasha', 'natasha@cpe.kmutt.ac.th', NULL, '$2y$10$SpYo2oxDXz3lOCOq7nvD6.Qx34C4MfbKXEagINAqn/i2AgiCs7EGC', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'Aj. Nuntipat', 'nuntipat@cpe.kmutt.ac.th', NULL, '$2y$10$SpYo2oxDXz3lOCOq7nvD6.Qx34C4MfbKXEagINAqn/i2AgiCs7EGC', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'Aj. Nuttanart', 'nuttanart@cpe.kmutt.ac.th', NULL, '$2y$10$SpYo2oxDXz3lOCOq7nvD6.Qx34C4MfbKXEagINAqn/i2AgiCs7EGC', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'Aj. Peerapon', 'peerapon@cpe.kmutt.ac.th', NULL, '$2y$10$SpYo2oxDXz3lOCOq7nvD6.Qx34C4MfbKXEagINAqn/i2AgiCs7EGC', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'Aj. Phond', 'phond@cpe.kmutt.ac.th', NULL, '$2y$10$SpYo2oxDXz3lOCOq7nvD6.Qx34C4MfbKXEagINAqn/i2AgiCs7EGC', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'Aj. Piyanit', 'piyanit@cpe.kmutt.ac.th', NULL, '$2y$10$SpYo2oxDXz3lOCOq7nvD6.Qx34C4MfbKXEagINAqn/i2AgiCs7EGC', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'Aj. Prapong', 'prapong@cpe.kmutt.ac.th', NULL, '$2y$10$SpYo2oxDXz3lOCOq7nvD6.Qx34C4MfbKXEagINAqn/i2AgiCs7EGC', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'Aj. Priyakorn', 'priyakorn@cpe.kmutt.ac.th', NULL, '$2y$10$SpYo2oxDXz3lOCOq7nvD6.Qx34C4MfbKXEagINAqn/i2AgiCs7EGC', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'Aj. Rajchawit', 'rajchawit@cpe.kmutt.ac.th', NULL, '$2y$10$SpYo2oxDXz3lOCOq7nvD6.Qx34C4MfbKXEagINAqn/i2AgiCs7EGC', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 'Aj. Sanan', 'sanan@cpe.kmutt.ac.th', NULL, '$2y$10$SpYo2oxDXz3lOCOq7nvD6.Qx34C4MfbKXEagINAqn/i2AgiCs7EGC', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'Aj. Santitham', 'santitham@cpe.kmutt.ac.th', NULL, '$2y$10$SpYo2oxDXz3lOCOq7nvD6.Qx34C4MfbKXEagINAqn/i2AgiCs7EGC', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'Aj. Surapont', 'sarapont@cpe.kmutt.ac.th', NULL, '$2y$10$SpYo2oxDXz3lOCOq7nvD6.Qx34C4MfbKXEagINAqn/i2AgiCs7EGC', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 'Aj. Suthathip', 'suthathip@cpe.kmutt.ac.th', NULL, '$2y$10$SpYo2oxDXz3lOCOq7nvD6.Qx34C4MfbKXEagINAqn/i2AgiCs7EGC', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 'Aj. Thumrongrat', 'thumrongrat@cpe.kmutt.ac.th', NULL, '$2y$10$SpYo2oxDXz3lOCOq7nvD6.Qx34C4MfbKXEagINAqn/i2AgiCs7EGC', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 'Aj. Unchalisa', 'unchalisa@cpe.kmutt.ac.th', NULL, '$2y$10$SpYo2oxDXz3lOCOq7nvD6.Qx34C4MfbKXEagINAqn/i2AgiCs7EGC', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, '(HDS) Aj. Kamolwan', 'kamolwan@hds.kmutt.ac.th', NULL, '$2y$10$SpYo2oxDXz3lOCOq7nvD6.Qx34C4MfbKXEagINAqn/i2AgiCs7EGC', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, '(HDS) Aj. Peeruth', 'peeruth@hds.kmutt.ac.th', NULL, '$2y$10$SpYo2oxDXz3lOCOq7nvD6.Qx34C4MfbKXEagINAqn/i2AgiCs7EGC', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, '(HDS) Aj. Rojchanaphond', 'rojchanaphond@hds.kmutt.ac.th', NULL, '$2y$10$SpYo2oxDXz3lOCOq7nvD6.Qx34C4MfbKXEagINAqn/i2AgiCs7EGC', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, '(HDS) Aj. Saimai', 'saimai@hds.kmutt.ac.th', NULL, '$2y$10$SpYo2oxDXz3lOCOq7nvD6.Qx34C4MfbKXEagINAqn/i2AgiCs7EGC', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, '(HDS) Aj. Wiriya', 'wiriya@hds.kmutt.ac.th', NULL, '$2y$10$SpYo2oxDXz3lOCOq7nvD6.Qx34C4MfbKXEagINAqn/i2AgiCs7EGC', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, '(HDS) Aj. Woranich', 'woranich@hds.kmutt.ac.th', NULL, '$2y$10$SpYo2oxDXz3lOCOq7nvD6.Qx34C4MfbKXEagINAqn/i2AgiCs7EGC', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, 'Waranat Suttikan', 'waranat.cpe@gmail.com', NULL, '$2y$10$XKysibXXuFUh/2XU5UtmluT/QGFeY6zL2uxyn1Em.7PrgsvkSjxru', 0, 13, NULL, NULL, NULL, NULL, NULL, '2022-06-03 15:05:44', '2022-06-03 15:07:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `project_groups`
--
ALTER TABLE `project_groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_advisor` (`project_advisor`),
  ADD KEY `committee1` (`committee1`),
  ADD KEY `committee2` (`committee2`),
  ADD KEY `committee3` (`committee3`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `request_by` (`request_by`),
  ADD KEY `request_to` (`request_to`),
  ADD KEY `project_group` (`project_group`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `project_group` (`project_group`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_groups`
--
ALTER TABLE `project_groups`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `project_groups`
--
ALTER TABLE `project_groups`
  ADD CONSTRAINT `project_groups_ibfk_1` FOREIGN KEY (`project_advisor`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `project_groups_ibfk_2` FOREIGN KEY (`committee1`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `project_groups_ibfk_3` FOREIGN KEY (`committee2`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `project_groups_ibfk_4` FOREIGN KEY (`committee3`) REFERENCES `users` (`id`);

--
-- Constraints for table `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `requests_ibfk_1` FOREIGN KEY (`request_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `requests_ibfk_2` FOREIGN KEY (`request_to`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `requests_ibfk_3` FOREIGN KEY (`project_group`) REFERENCES `project_groups` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`project_group`) REFERENCES `project_groups` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
