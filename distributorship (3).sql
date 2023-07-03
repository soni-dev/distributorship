-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2023 at 08:53 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `distributorship`
--

-- --------------------------------------------------------

--
-- Table structure for table `advertisement`
--

CREATE TABLE `advertisement` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `detail` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `advertisement`
--

INSERT INTO `advertisement` (`id`, `image`, `position`, `detail`, `created_at`, `updated_at`) VALUES
(1, 'banner_ad.jpg', 'bottom', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `apr_admin`
--

CREATE TABLE `apr_admin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `apr_admin`
--

INSERT INTO `apr_admin` (`id`, `name`, `email`, `password`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'distributor@gmail.com', '7ece99e593ff5dd200e2b9233d9ba654', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `apr_blogs`
--

CREATE TABLE `apr_blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_title` varchar(255) NOT NULL,
  `blog_slug` varchar(500) NOT NULL,
  `blog_image` varchar(500) NOT NULL,
  `meta_desc` text NOT NULL,
  `blog_description` text NOT NULL,
  `scheduled_date` date NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `is_featured` enum('0','1') NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `apr_campaigns`
--

CREATE TABLE `apr_campaigns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `campaigns_title` varchar(255) NOT NULL,
  `campaigns_slug` varchar(255) NOT NULL,
  `campaigns_meta_desc` text DEFAULT NULL,
  `campaigns_desc` text DEFAULT NULL,
  `campaigns_feat_img` varchar(255) DEFAULT NULL,
  `campaigns_detail_img` varchar(255) DEFAULT NULL,
  `campaigns_orgainsed_by` varchar(255) DEFAULT NULL,
  `campaigns_amount` int(11) DEFAULT NULL,
  `campaigns_start_date` varchar(255) NOT NULL,
  `campaigns_end_date` varchar(255) NOT NULL,
  `campaigns_duration` varchar(255) DEFAULT NULL,
  `campaigns_comment` text DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `apr_cms`
--

CREATE TABLE `apr_cms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(100) NOT NULL,
  `content` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `apr_donations`
--

CREATE TABLE `apr_donations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(50) NOT NULL,
  `amount` int(11) NOT NULL,
  `donation_type` varchar(100) NOT NULL,
  `doner_name` varchar(255) DEFAULT NULL,
  `doner_email` varchar(255) DEFAULT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `payment_id` varchar(255) DEFAULT NULL,
  `payment_status` varchar(30) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `apr_donations`
--

INSERT INTO `apr_donations` (`id`, `type`, `amount`, `donation_type`, `doner_name`, `doner_email`, `transaction_id`, `payment_id`, `payment_status`, `created_at`, `updated_at`) VALUES
(1, 'Donation', 2736, '6-month', 'Anand Kumar', NULL, '5057d95ead774349bcf60bc33b95452d', NULL, NULL, '2022-12-16 00:58:56', '2022-12-16 00:58:56');

-- --------------------------------------------------------

--
-- Table structure for table `apr_media`
--

CREATE TABLE `apr_media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `media_name` varchar(255) NOT NULL,
  `media_type` varchar(20) NOT NULL,
  `media_thumb` varchar(255) DEFAULT NULL,
  `media_path` varchar(300) NOT NULL,
  `media_news` text DEFAULT NULL,
  `media_meta_desc` text DEFAULT NULL,
  `media_slug` varchar(500) DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `apr_queries`
--

CREATE TABLE `apr_queries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `is_replied` varchar(10) DEFAULT NULL,
  `sent_attachments` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `name`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Agriculture', '2022-12-16 01:40:33', '2022-12-16 01:40:33'),
(2, NULL, 'Information Technology', '2022-12-16 01:51:11', '2022-12-16 01:51:11'),
(3, NULL, 'Construction', '2022-12-16 01:51:25', '2022-12-16 01:51:25'),
(4, NULL, 'Food', '2022-12-16 02:18:30', '2022-12-16 02:18:30'),
(5, NULL, 'Chemical', '2022-12-16 08:01:46', '2022-12-16 08:01:46'),
(6, NULL, 'Commerce', '2022-12-16 08:02:02', '2022-12-16 08:02:02'),
(7, 1, 'Crop farming', NULL, NULL),
(8, 1, 'Fisheries and aquaculture', NULL, NULL),
(9, 2, 'Automation', NULL, NULL),
(10, 2, 'Artificial intelligence', NULL, NULL),
(11, 3, 'Infrastructure', NULL, NULL),
(12, 3, 'Federal', NULL, NULL),
(13, 4, 'Fish and Seafood', NULL, NULL),
(14, 4, 'Dairy Foods', NULL, NULL),
(15, 5, 'sodium lorel', '2023-06-29 23:36:05', '2023-06-29 23:36:05'),
(16, 5, 'sodium lorel sulphate', '2023-06-29 23:37:12', '2023-06-29 23:37:12');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '0=>inactive,1=>active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Australia/New zealand', 1, NULL, NULL),
(2, 'North America', 1, NULL, NULL),
(3, 'Northern Europe', 1, NULL, NULL),
(4, 'Northern Africa', 1, NULL, NULL),
(5, 'Southern Europe', 1, NULL, NULL),
(6, 'Central America', 1, NULL, NULL),
(7, 'Southern Europe', 1, NULL, NULL),
(8, 'Eastern Europe', 1, NULL, NULL),
(9, 'Eastern Africa', 1, NULL, NULL),
(10, 'Western Africa', 1, NULL, NULL),
(11, 'Southern Africa', 1, NULL, NULL),
(12, 'Western Asia And Middle East', 1, NULL, NULL),
(13, 'Central Africa (Middle Africa)', 1, NULL, NULL),
(14, 'Caribbean', 1, NULL, NULL),
(15, 'South America', 1, NULL, NULL),
(16, 'Northern Asia', 1, NULL, NULL),
(17, 'Eastern Asia', 1, NULL, NULL),
(18, 'South-Central Asia', 1, NULL, NULL),
(19, 'South-East Asia', 1, NULL, NULL),
(20, 'Across India', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `distributors`
--

CREATE TABLE `distributors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `mode` enum('appoint','become') NOT NULL DEFAULT 'appoint',
  `gst` varchar(255) DEFAULT NULL,
  `pan` varchar(255) DEFAULT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `establishment` varchar(50) DEFAULT NULL,
  `anualsale_start` varchar(50) DEFAULT NULL,
  `anualsale_end` varchar(50) DEFAULT NULL,
  `anualsale_unit` varchar(50) DEFAULT NULL,
  `total_distributors` int(11) DEFAULT NULL,
  `space` varchar(100) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `category_id` varchar(255) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `zip` varchar(100) DEFAULT NULL,
  `about` text DEFAULT NULL,
  `products` text DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `meta_title` varchar(500) DEFAULT NULL,
  `meta_desc` text DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `gallery` text DEFAULT NULL,
  `experience` text DEFAULT NULL,
  `remark` text DEFAULT NULL,
  `type_distributorship` text DEFAULT NULL,
  `business_profile` text DEFAULT NULL,
  `product_keyword` text DEFAULT NULL,
  `investment_required` text DEFAULT NULL,
  `country_id` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`country_id`)),
  `state_id` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`state_id`)),
  `investment_time` varchar(255) DEFAULT NULL,
  `sub_category_id` longtext DEFAULT '["7","8"]',
  `investment_capacity` varchar(255) DEFAULT NULL,
  `is_featured` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `distributors`
--

INSERT INTO `distributors` (`id`, `user_id`, `name`, `mode`, `gst`, `pan`, `brand`, `establishment`, `anualsale_start`, `anualsale_end`, `anualsale_unit`, `total_distributors`, `space`, `logo`, `category_id`, `address`, `city`, `state`, `zip`, `about`, `products`, `slug`, `meta_title`, `meta_desc`, `status`, `gallery`, `experience`, `remark`, `type_distributorship`, `business_profile`, `product_keyword`, `investment_required`, `country_id`, `state_id`, `investment_time`, `sub_category_id`, `investment_capacity`, `is_featured`, `created_at`, `updated_at`) VALUES
(1, 1, 'GLOBAL WHEELS', 'appoint', '34224vdvfdfg54353', 'ASDF678FHH', 'GW', '1990', '50', '70', 'Lacs', 10, '1500', 'assets/uploads/distributors/logo/GLOBAL_WHEELS1671985910.jpg', NULL, '209, Krishan Vihar, Pocket 1', 'Ghaziabad', 'UP', '201009', NULL, NULL, 'global-wheels', NULL, NULL, '1', '[\"1673002659_1668768024463.JPEG\",\"1673002786_Italian_Flag.gif\",\"1686031243_Capture.PNG\"]', NULL, '', '', '', '', '', NULL, NULL, NULL, '[\"7\",\"8\"]', NULL, 0, '2022-12-25 11:01:50', '2023-06-06 00:30:43'),
(2, 1, 'MEDICLUE SURGICAL & DISPOSABLE PVT. LTD.', 'appoint', '', NULL, 'Mediclue', '1990', '20', '30', 'Lacs', 5, '1000', 'assets/uploads/distributors/logo/MEDICLUE_SURGICAL_&_DISPOSABLE_PVT._LTD.1673022433.jpg', NULL, '209, Krishan Vihar, Pocket 1', 'GZB', 'UP', '201009', 'o constantly please customers, we procure this line of products from only the most reliable vendors. We work with the most famous brands that we handpick after thorough research of the marketplace. Our team of experts quality test each product with care.\r\n\r\nTo make this marvelous range available to even larger customer base, we aspire to partner up with talented distributors of the industry. We are looking for associates, who can take on the responsibility of quality and punctuality of work. If you consider that you are perfect for the job, contact us today!\r\n', '- Surgical Gloves\r\n- Surgical Mask\r\n- Surgical Scissors\r\n- Latex Hand Gloves\r\n- Non Woven Disposable Cap', 'MEDICLUESURGICALDISPOSABLEPVTLTD', NULL, NULL, '1', NULL, NULL, 'unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit,', '[\"Region Wise\",\"State Wise\",\"City Wise\"]', 'unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit,', 'medication', NULL, NULL, '[\"11\",\"17\",\"2\"]', NULL, '[\"7\",\"8\"]', NULL, 0, '2023-01-06 10:57:13', '2023-06-21 07:28:21'),
(3, 6, 'Title India', 'appoint', 'LKIJD4458547OPKD', 'AIGPB25621K', 'Brand Food', '2021', '500000', '40000000', 'Lacs', 2, '800', 'assets/uploads/distributors/logo/Title_India1676391689.png', NULL, '25', 'delhi', 'delhi', '110025', NULL, 'india,distributor', 'TitleIndia', NULL, NULL, '1', NULL, NULL, '', '', '', '', '', '[1,2]', '[3,4]', NULL, '[\"7\",\"8\"]', NULL, 0, '2023-02-14 16:21:29', '2023-02-14 16:21:29'),
(4, 1, 'test', 'appoint', '5400', 'ASDF678FHH', 'GW', '1990', '20', '30', 'Lacs', 5, '1000', 'assets/uploads/distributors/logo/test1680888442.png', NULL, 'g67', 'Chino', 'California', '201009', NULL, NULL, 'test', NULL, NULL, '1', NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, '[\"7\",\"8\"]', NULL, 0, '2023-04-07 17:27:22', '2023-04-07 17:27:22'),
(5, 1, 'test x', 'appoint', '5400', 'dsdsa', 'GW', '2012', '20', '30', 'Lacs', 5, '1000', 'assets/uploads/distributors/logo/test_x1680889483.png', NULL, '', '', '', '', NULL, NULL, 'testx', NULL, NULL, '1', NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, '[\"7\",\"8\"]', NULL, 0, '2023-04-07 17:44:43', '2023-04-07 17:44:43'),
(6, 1, 'test x', 'appoint', '5400', 'dsdsa', 'GW', '2012', '20', '30', 'Lacs', 5, '1000', 'assets/uploads/distributors/logo/test_x1680889525.png', NULL, '', '', '', '', NULL, NULL, 'testx', NULL, NULL, '1', NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, '[\"7\",\"8\"]', NULL, 1, '2023-04-07 17:45:25', '2023-06-30 22:15:33'),
(7, 6, 'IPL', 'appoint', 'ikji8987ujd898', 'aigpc9890k', 'My Brand', '2023', '10', '15', 'Lacs', 5, '1000', 'assets/uploads/distributors/logo/IPL1681230904.png', NULL, '', '', '', '', NULL, NULL, 'IPL', NULL, NULL, '1', NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, '[\"7\",\"8\"]', NULL, 0, '2023-04-11 16:35:04', '2023-04-11 16:35:04'),
(8, 1, 'Developer Solution', 'appoint', '123445643', 'DECM7459', 'developer', '2023', '2022', '2023', 'Lacs', 23, '234', 'assets/uploads/distributors/logo/Developer_Solution1685944620.png', NULL, '', '', '', '', NULL, NULL, 'DeveloperSolution', NULL, NULL, '1', NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, '[\"7\",\"8\"]', NULL, 0, '2023-06-05 00:27:01', '2023-06-05 00:27:01'),
(9, 1, 'Developer Solution', 'appoint', NULL, NULL, 'developer', '2023', '2022', '2023', 'Lacs', 23, '234', 'assets/uploads/distributors/logo/Developer_Solution1686039417.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DeveloperSolution', NULL, NULL, '1', NULL, NULL, 'wrrwrqwrq', '[\"Country Wise\",\"Region Wise\"]', '24', '2414', '321', NULL, NULL, NULL, '[\"7\",\"8\"]', NULL, 0, '2023-06-06 02:46:58', '2023-06-06 02:46:58'),
(10, 1, 'Developer Solution2', 'become', '25325', 'DECM7459', 'developer', '2023', '23', '23', 'Lacs', 23, '234', 'assets/uploads/distributors/logo/Developer_Solution21686039647.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DeveloperSolution2', NULL, NULL, '1', NULL, '243', 'werwrewre', '[\"Country Wise\",\"Region Wise\"]', 'wreewr', 'wrewre', NULL, NULL, NULL, NULL, '[\"7\",\"8\"]', NULL, 0, '2023-06-06 02:50:47', '2023-06-06 02:50:47'),
(11, 1, 'Developer Solution', 'appoint', NULL, NULL, 'developer', '2023', '2022', '2023', 'Lacs', 23, '234', 'assets/uploads/distributors/logo/Developer_Solution1687266768.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DeveloperSolution', NULL, NULL, '1', NULL, NULL, 'sdtstdstdtd', '[\"Country Wise\",\"Region Wise\",\"State Wise\",\"City Wise\"]', 'stdsttsdst', 'stdtsdtsdtsd', '321', '[\"14\",\"4\",\"5\"]', '[\"11\",\"34\",\"35\",\"4\",\"33\",\"1\",\"27\",\"19\"]', NULL, '[\"7\",\"8\"]', NULL, 0, '2023-06-20 07:42:49', '2023-06-20 07:42:49'),
(12, 1, 'Developer Solution', 'appoint', NULL, NULL, NULL, NULL, '2022', '2023', 'Lacs', NULL, NULL, 'assets/uploads/distributors/logo/Developer_Solution1687324861.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DeveloperSolution', NULL, NULL, '1', NULL, NULL, 'perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.', '[\"State Wise\"]', 'perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.', 'med', NULL, '[\"14\"]', '[\"4\"]', NULL, '[\"7\",\"8\"]', NULL, 0, '2023-06-20 23:51:01', '2023-06-20 23:51:01'),
(13, 1, 'Developer Solution', 'appoint', NULL, NULL, 'developer', NULL, '2022', '2023', 'Lacs', NULL, NULL, 'assets/uploads/distributors/logo/Developer_Solution1687325001.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DeveloperSolution', NULL, NULL, '1', NULL, NULL, 'perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.', '[\"Region Wise\"]', 'perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.', 'medi', NULL, '[\"14\"]', '[\"35\",\"4\"]', NULL, '[\"7\",\"8\"]', NULL, 0, '2023-06-20 23:53:21', '2023-06-20 23:53:21'),
(14, 1, 'Developer Solution', 'appoint', NULL, NULL, NULL, NULL, '2022', '2023', 'Lacs', NULL, NULL, 'assets/uploads/distributors/logo/Developer_Solution1687325144.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DeveloperSolution', NULL, NULL, '1', NULL, NULL, 'perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.', '[\"Region Wise\"]', 'perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.', 'ned', NULL, NULL, '[\"4\"]', NULL, '[\"7\",\"8\"]', NULL, 0, '2023-06-20 23:55:44', '2023-06-20 23:55:44'),
(15, 1, 'Developer Solution', 'become', NULL, NULL, NULL, NULL, NULL, NULL, 'Lacs', NULL, NULL, 'assets/uploads/distributors/logo/Developer_Solution1687351191.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DeveloperSolution', NULL, NULL, '1', '[\"1687591044_1687437394_kauteek_fashion1672825551.png\",\"1687591050_1687437293_Developer_Solution1687324992.jpg\"]', NULL, 'perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.', '[\"Country Wise\",\"Region Wise\",\"State Wise\"]', 'perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.', 'ned', NULL, NULL, '[\"35\",\"10\",\"30\",\"5\"]', '1 month', '[\"1\",\"8\"]', NULL, 1, '2023-06-21 00:03:07', '2023-06-30 22:50:19'),
(16, 1, 'test', 'appoint', NULL, NULL, 'test', '2023', '12', '12', 'Lacs', 12, '212', 'assets/uploads/distributors/logo/test1687419633.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'test', NULL, NULL, '1', '[]', NULL, '2121', '[\"Region Wise\",\"State Wise\",\"City Wise\"]', '2121', '2121', '21', '[\"13\"]', '[\"34\",\"15\"]', NULL, '[\"8\"]', NULL, 1, '2023-06-22 02:10:33', '2023-06-30 22:50:20'),
(17, 1, 'PINK', 'appoint', NULL, NULL, 'testb', '2023', '12', '12', 'Lacs', 12, '200', 'assets/uploads/distributors/logo/PINK1687846434.jpg', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'PINK', NULL, NULL, '1', '[\"1687873639_1687437293_Developer_Solution1687324992.jpg\",\"1687873647_1687437394_kauteek_fashion1672825551.png\"]', NULL, 'test', '[\"Region Wise\",\"State Wise\"]', 'test', 'test', '21', NULL, '[\"35\",\"13\"]', NULL, '[\"7\",\"8\"]', NULL, 1, '2023-06-27 00:43:54', '2023-06-30 22:50:17'),
(18, 1, 'test', 'appoint', NULL, NULL, 'test', '2023', '12', '13', 'Lacs', NULL, '200', 'assets/uploads/distributors/logo/test1687956927.png', '2', NULL, NULL, NULL, NULL, NULL, NULL, 'test', NULL, NULL, '1', '[]', NULL, 'test', '[\"Region Wise\"]', 'test', 'test', NULL, NULL, '[\"34\",\"2\",\"7\"]', NULL, '[\"9\",\"10\"]', NULL, 1, '2023-06-28 07:25:28', '2023-06-30 22:50:16'),
(19, 1, 'greem', 'become', NULL, NULL, NULL, NULL, NULL, NULL, 'Lacs', NULL, NULL, 'assets/uploads/distributors/logo/greem1687957026.jpg', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'greem', NULL, NULL, '1', NULL, NULL, 'greem', '[\"Region Wise\",\"State Wise\"]', 'greem', 'greem', NULL, NULL, '[\"35\",\"13\"]', '1 month', '[\"7\",\"8\"]', NULL, 1, '2023-06-28 07:27:06', '2023-06-30 22:50:15');

-- --------------------------------------------------------

--
-- Table structure for table `enquiries`
--

CREATE TABLE `enquiries` (
  `register_user_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `brand_name` varchar(255) DEFAULT NULL,
  `appoint_distributors_id` varchar(255) DEFAULT NULL,
  `become_distributors_id` varchar(255) DEFAULT NULL,
  `mobile` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `interested_in` int(11) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `enquiries`
--

INSERT INTO `enquiries` (`register_user_id`, `id`, `brand_name`, `appoint_distributors_id`, `become_distributors_id`, `mobile`, `email`, `interested_in`, `message`, `created_at`, `updated_at`) VALUES
(95, 1, 'Cloud Computer Ltd', '41', NULL, '9978678923', 'sonis@yopmail.com', 1, 'testing', '2023-06-26 08:56:32', '2023-06-26 08:56:32'),
(95, 2, 'Cloud Computer Ltd', '41', NULL, '9978678923', 'sonis@yopmail.com', 1, 'test', '2023-06-26 08:59:43', '2023-06-26 08:59:43'),
(7, 3, 'GW', '1', NULL, '9978678923', 'kuber@yopmail.com', 1, 'test', '2023-06-26 09:02:02', '2023-06-26 09:02:02'),
(1, 4, 'GW', '1', NULL, '9978678923', 'sonis@yopmail.com', 0, 'testing', '2023-06-26 22:32:58', '2023-06-26 22:32:58'),
(1, 5, 'GW', '1', NULL, '9978678923', 'rs@yopmail.com', 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', '2023-06-26 22:45:44', '2023-06-26 22:45:44'),
(5, 6, 'Karan Medical Supllies', '1', NULL, '9978678923', 'kuber@yopmail.com', 1, 'test', '2023-06-27 02:15:32', '2023-06-27 02:15:32'),
(5, 7, 'Karan Medical Supllies', '1', NULL, '9978678923', 'sonirs@yopmail.com', 1, 'test..', '2023-06-27 02:19:22', '2023-06-27 02:19:22'),
(5, 8, 'Karan Medical Supllies', '1', NULL, '9978678923', 'sonis@yopmail.com', 0, 'test', '2023-06-27 06:39:12', '2023-06-27 06:39:12'),
(1, 9, 'GW', '1', NULL, '9978678923', 'sonirs@yopmail.com', 1, 'test', '2023-06-28 00:23:54', '2023-06-28 00:23:54'),
(1, 10, 'testb', '17', NULL, '9978678923', 'sonirs@yopmail.com', 1, 'test', '2023-06-28 00:44:52', '2023-06-28 00:44:52'),
(5, 11, 'test', '7', NULL, '9978678923', 'sonis@yopmail.com', 1, 'test', '2023-06-28 01:01:26', '2023-06-28 01:01:26'),
(1, 12, 'testb', '17', NULL, '9978678923', 'sonirs@yopmail.com', 1, 'tst', '2023-06-28 01:08:51', '2023-06-28 01:08:51'),
(1, 13, 'testb', '17', NULL, '9978678923', 'sonirs@yopmail.com', 2, 'test', '2023-06-28 01:09:22', '2023-06-28 01:09:22'),
(5, 14, 'test', '7', NULL, '9978678923', 'sonirs@yopmail.com', 1, 'test', '2023-06-28 01:14:33', '2023-06-28 01:14:33'),
(1, 15, 'testb', '17', NULL, '9978678923', 'sonirs@yopmail.com', 1, 'test', '2023-06-28 01:15:00', '2023-06-28 01:15:00'),
(1, 16, 'testb', '17', NULL, '9978678923', 'sonis@yopmail.com', 1, 'test', '2023-06-28 01:16:25', '2023-06-28 01:16:25'),
(1, 17, 'testb', '17', NULL, '9978678923', 'sonis@yopmail.com', 1, 'test', '2023-06-28 01:17:44', '2023-06-28 01:17:44'),
(1, 18, 'testb', '17', NULL, '9978678923', 'sonis@yopmail.com', 0, 'test', '2023-06-28 06:47:57', '2023-06-28 06:47:57'),
(1, 19, 'testb', '17', NULL, '9978678923', 'sonis@yopmail.com', 0, 'test', '2023-06-28 06:48:25', '2023-06-28 06:48:25'),
(1, 20, 'testb', '17', NULL, '9978678923', 'sonis@yopmail.com', 0, 'test', '2023-06-28 06:48:33', '2023-06-28 06:48:33'),
(1, 21, 'testb', '17', NULL, '9978678923', 'sonis@yopmail.com', 0, 'test', '2023-06-28 06:48:52', '2023-06-28 06:48:52'),
(1, 22, 'testb', '17', NULL, '9978678923', 'sonis@yopmail.com', 2, 'test', '2023-06-28 06:50:20', '2023-06-28 06:50:20'),
(1, 23, 'testb', '17', NULL, '9978678923', 'sonis@yopmail.com', 1, 'test', '2023-06-28 06:50:43', '2023-06-28 06:50:43'),
(5, 24, 'test', '7', NULL, '9978678923', 'sonis@yopmail.com', 1, 'test', '2023-06-28 06:51:35', '2023-06-28 06:51:35'),
(5, 25, 'test', '7', NULL, '9978678923', 'sonis@yopmail.com', 1, 'tses', '2023-06-28 06:52:05', '2023-06-28 06:52:05'),
(5, 26, 'test', '7', NULL, '9978678923', 'sonis@yopmail.com', 1, 'test', '2023-06-28 07:01:28', '2023-06-28 07:01:28'),
(7, 27, 'Sales Agent', '4', NULL, '9978678923', 'sonirs@yopmail.com', 0, 'test', '2023-06-28 07:19:55', '2023-06-28 07:19:55'),
(7, 28, 'Sales Agent', '4', NULL, '9978678923', 'sonirs@yopmail.com', 1, 'test', '2023-06-28 07:21:01', '2023-06-28 07:21:01'),
(1, 29, 'GW', '4', NULL, '9978678923', 'sonirs@yopmail.com', 1, 'tsst', '2023-06-28 07:29:32', '2023-06-28 07:29:32'),
(5, 30, 'DIGITRESOURCE', '13', NULL, '9978678923', 'kuber@yopmail.com', 1, 'test', '2023-06-28 07:35:41', '2023-06-28 07:35:41'),
(7, 31, 'Sales Agent', '14', NULL, '9978678923', 'sonis@yopmail.com', 1, 'tst', '2023-06-28 07:41:06', '2023-06-28 07:41:06'),
(1, 32, 'testb', '17', NULL, '9978678923', 'sonis@yopmail.com', 1, 'tsting', '2023-06-29 23:10:08', '2023-06-29 23:10:08');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `franchisees`
--

CREATE TABLE `franchisees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `mode` enum('appoint','become') NOT NULL DEFAULT 'appoint',
  `brand` varchar(255) DEFAULT NULL,
  `establishment` varchar(50) DEFAULT NULL,
  `total_companies` int(11) DEFAULT NULL,
  `total_franchisee` int(11) DEFAULT NULL,
  `space` varchar(100) DEFAULT NULL,
  `product_keywords` varchar(255) DEFAULT NULL,
  `fr_partner` varchar(50) DEFAULT NULL,
  `investment_amt` varchar(50) DEFAULT NULL,
  `investment_unit` varchar(50) DEFAULT NULL,
  `fee` enum('1','0') NOT NULL DEFAULT '0',
  `equip` enum('1','0') NOT NULL DEFAULT '0',
  `furn` enum('1','0') NOT NULL DEFAULT '0',
  `advert` enum('1','0') NOT NULL DEFAULT '0',
  `training_program` enum('1','0') NOT NULL DEFAULT '0',
  `softsupport` enum('1','0') NOT NULL DEFAULT '0',
  `is_renew` enum('1','0') NOT NULL DEFAULT '0',
  `business_profile` text DEFAULT NULL,
  `meta_title` varchar(500) DEFAULT NULL,
  `meta_desc` text DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `gallery` text DEFAULT NULL,
  `state_id` longtext DEFAULT NULL,
  `country_id` longtext DEFAULT NULL,
  `industry_type` varchar(255) DEFAULT NULL,
  `investment_time` varchar(255) DEFAULT NULL,
  `gst` varchar(255) DEFAULT NULL,
  `pan` varchar(255) DEFAULT NULL,
  `remark` longtext DEFAULT NULL,
  `investment_capacity` varchar(255) DEFAULT NULL,
  `sub_category_id` longtext DEFAULT NULL,
  `category_id` varchar(10) DEFAULT NULL,
  `experience` varchar(100) DEFAULT NULL,
  `is_featured` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `franchisees`
--

INSERT INTO `franchisees` (`id`, `name`, `logo`, `user_id`, `mode`, `brand`, `establishment`, `total_companies`, `total_franchisee`, `space`, `product_keywords`, `fr_partner`, `investment_amt`, `investment_unit`, `fee`, `equip`, `furn`, `advert`, `training_program`, `softsupport`, `is_renew`, `business_profile`, `meta_title`, `meta_desc`, `slug`, `status`, `gallery`, `state_id`, `country_id`, `industry_type`, `investment_time`, `gst`, `pan`, `remark`, `investment_capacity`, `sub_category_id`, `category_id`, `experience`, `is_featured`, `created_at`, `updated_at`) VALUES
(1, 'KARAN MEDICAL SUPLLIES', 'assets/uploads/franchise/logo/KARAN_MEDICAL_SUPLLIES1672514672.jpg', 5, 'appoint', 'Karan Medical Supllies', '2020', 2, 12, '1000', 'MEDICAL', 'singleunit', '200000', 'USD', '1', '1', '1', '1', '1', '1', '1', '<p>lorem spum&nbsp;</p>\r\n<p>lorem spum&nbsp;</p>\r\n<p>lorem spum&nbsp;</p>\r\n<p>lorem spum&nbsp;</p>\r\n<p>lorem spum&nbsp;</p>\r\n<p>lorem spum&nbsp;</p>', 'ok', 'ok', 'KARANMEDICALSUPLLIES', '0', '[\"1687750601_1687437394_kauteek_fashion1672825551.png\",\"1687750608_1687437293_Developer_Solution1687324992.jpg\"]', '[\"35\",\"17\"]', NULL, NULL, NULL, NULL, NULL, 'test', NULL, '[\"7\",\"8\"]', NULL, NULL, 0, '2022-12-31 13:54:32', '2023-06-25 22:06:48'),
(2, 'sf', 'assets/uploads/franchise/logo/sf1686062160.png', 5, 'become', NULL, NULL, NULL, NULL, NULL, NULL, 'singleunit', NULL, 'INR', '1', '1', '1', '1', '1', '1', '1', '<p>fhdfhd</p>', 'fhdfhd', 'fhdfhd', 'sf', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"7\",\"8\"]', NULL, NULL, 0, '2023-06-06 09:06:00', '2023-06-06 09:06:00'),
(3, 'Developer Solution', 'assets/uploads/franchise/logo/Developer_Solution1687268221.png', 5, 'appoint', 'developer', '2344', NULL, NULL, NULL, 'sfdsfd', 'singleunit', NULL, 'INR', '1', '1', '1', '1', '1', '1', '1', '<p>sfdddddddd</p>', NULL, NULL, 'DeveloperSolution', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"7\",\"8\"]', NULL, NULL, 0, '2023-06-20 08:07:02', '2023-06-20 08:07:02'),
(4, 'Developer Solution', 'assets/uploads/franchise/logo/Developer_Solution1687268513.png', 5, 'appoint', 'sfdfsd', '2023', NULL, NULL, NULL, NULL, 'singleunit', NULL, 'INR', '1', '1', '1', '1', '1', '1', '1', '<p>fdsfds</p>', NULL, NULL, 'DeveloperSolution', '0', NULL, '[\"34\",\"35\",\"2\",\"23\",\"9\",\"27\",\"19\"]', '[\"13\",\"16\",\"7\"]', NULL, NULL, NULL, NULL, NULL, NULL, '[\"7\",\"8\"]', NULL, NULL, 1, '2023-06-20 08:11:53', '2023-06-30 23:06:44'),
(5, 'Sed ut perspiciatis unde omnis iste natus error si', 'assets/uploads/franchise/logo/Sed_ut_perspiciatis_unde_omnis_iste_natus_error_si1687323498.jpg', 5, 'become', 'developer', NULL, NULL, NULL, NULL, 'perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.', 'singleunit', NULL, 'INR', '1', '1', '1', '1', '1', '1', '1', '<p>perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.&nbsp;</p>', NULL, NULL, 'Sedutperspiciatisundeomnisistenatuserrorsi', '0', NULL, '[\"35\"]', '', NULL, NULL, NULL, NULL, NULL, NULL, '[\"7\",\"8\"]', NULL, NULL, 1, '2023-06-20 23:28:18', '2023-06-30 22:50:11'),
(6, 'Want to become', 'assets/uploads/franchise/logo/Want_to_become1687323569.jpg', 5, 'become', NULL, NULL, NULL, NULL, NULL, NULL, 'singleunit', NULL, 'INR', '1', '1', '1', '1', '1', '1', '1', '<p>perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.&nbsp;</p>', 'test', 'test', 'Wanttobecome', '0', NULL, '[\"34\"]', NULL, 'general', '1 month', 'DECPM750234423', 'DECPM750', 'test', '1 CR', '[\"7\",\"8\"]', NULL, NULL, 1, '2023-06-20 23:29:29', '2023-06-30 22:50:10'),
(7, 'test', 'assets/uploads/franchise/logo/test1687409906.png', 5, 'appoint', 'test', '2023', 12, 120, '200', 'med', 'singleunit', '20000', 'INR', '1', '1', '1', '1', '1', '1', '1', '<p>test</p>', 'test', 'test', 'test', '0', NULL, '[\"11\",\"20\"]', NULL, NULL, NULL, NULL, NULL, 'test', NULL, '[\"7\",\"8\"]', NULL, NULL, 0, '2023-06-21 23:28:27', '2023-06-21 23:29:55'),
(8, 'testb', 'assets/uploads/franchise/logo/testb1687410073.png', 5, 'become', 'testb', '2023', 120, 120, '200', 'med', 'singleunit', '20000', 'INR', '1', '1', '1', '1', '1', '1', '1', '<p>testb</p>', 'testb', 'testb', 'testb', '0', NULL, '[\"17\",\"13\"]', NULL, 'general', '2 month', 'DECPM750234423', 'DECPM750', 'testb', '1 CR', '[\"7\",\"8\"]', NULL, NULL, 0, '2023-06-21 23:31:13', '2023-06-21 23:35:41'),
(9, 'PINK', 'assets/uploads/franchise/logo/PINK1687410266.png', 5, 'become', NULL, NULL, NULL, NULL, NULL, NULL, 'singleunit', NULL, 'INR', '1', '1', '1', '1', '1', '1', '1', '<p>testb</p>', 'test', 'test', 'PINK', '0', NULL, '[\"11\",\"20\"]', NULL, 'general', '2 month', 'DECPM750234423', 'DECPM750', 'test', '2 CR', '[\"7\",\"8\"]', NULL, NULL, 0, '2023-06-21 23:34:27', '2023-06-21 23:34:27'),
(10, 'soni test', 'assets/uploads/franchise/logo/soni_test1687410593.jpg', 5, 'appoint', 'soni test', '2023', 12, 120, '200', 'med', 'singleunit', '20000', 'INR', '1', '1', '1', '1', '1', '1', '1', '<p>soni test</p>', 'soni test', 'soni test', 'sonitest', '0', NULL, '[\"34\",\"17\"]', NULL, NULL, NULL, NULL, NULL, 'soni test', NULL, '[\"7\",\"8\"]', NULL, NULL, 1, '2023-06-21 23:39:53', '2023-06-30 22:26:04'),
(11, 'RED', 'assets/uploads/franchise/logo/RED1687411057.png', 5, 'appoint', 'test', '2023', 12, 120, NULL, 'med', 'singleunit', '20000', 'INR', '1', '1', '1', '1', '1', '1', '1', '<p>testb</p>', 'test', 'test', 'RED', '0', NULL, '[\"34\",\"17\"]', NULL, NULL, NULL, NULL, NULL, 'test', NULL, '[\"7\",\"8\"]', NULL, NULL, 1, '2023-06-21 23:47:37', '2023-06-30 22:50:07'),
(12, 'test', 'assets/uploads/franchise/logo/test1687418846.png', 5, 'appoint', 'test', '2023', 12, 120, '200', 'med', 'singleunit', '20000', 'INR', '1', '1', '1', '1', '1', '1', '1', '<p>test</p>', NULL, NULL, 'test', '0', '[\"1687591133_1687437293_Developer_Solution1687324992.jpg\",\"1687957225_1687437293_Developer_Solution1687324992.jpg\"]', '[\"15\",\"33\"]', NULL, 'general', '1 month', NULL, 'DECPM750', 'test', '1 CR', '[\"13\",\"14\"]', '4', '12', 1, '2023-06-22 01:57:27', '2023-06-30 22:50:05'),
(13, 'DIGITRESOURCE', 'assets/uploads/franchise/logo/DIGITRESOURCE1687957459.png', 5, 'appoint', 'DIGITRESOURCE', NULL, NULL, NULL, '50', 'DIGITRESOURCE', 'singleunit', '50k-99k', 'INR', '1', '1', '1', '1', '1', '1', '1', '<p>test</p>', NULL, NULL, 'DIGITRESOURCE', '0', NULL, '[\"2\",\"13\",\"33\",\"7\"]', NULL, NULL, NULL, NULL, NULL, 'DIGITRESOURCE', NULL, '[\"8\"]', '2', NULL, 1, '2023-06-28 07:34:19', '2023-06-30 22:50:03');

-- --------------------------------------------------------

--
-- Table structure for table `image_gallery`
--

CREATE TABLE `image_gallery` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `listing_type` varchar(255) DEFAULT NULL,
  `listing_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `listing_cat`
--

CREATE TABLE `listing_cat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `listing_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `listing_cat`
--

INSERT INTO `listing_cat` (`id`, `listing_id`, `category_id`, `created_at`, `updated_at`) VALUES
(4, 3, 14, '2023-02-14 16:21:29', '2023-02-14 16:21:29'),
(5, 4, 9, '2023-04-07 17:27:22', '2023-04-07 17:27:22'),
(9, 9, 7, '2023-06-06 02:46:58', '2023-06-06 02:46:58'),
(10, 9, 8, '2023-06-06 02:46:58', '2023-06-06 02:46:58'),
(11, 10, 7, '2023-06-06 02:50:47', '2023-06-06 02:50:47'),
(12, 10, 8, '2023-06-06 02:50:47', '2023-06-06 02:50:47'),
(19, 11, 7, '2023-06-20 07:42:49', '2023-06-20 07:42:49'),
(20, 11, 8, '2023-06-20 07:42:50', '2023-06-20 07:42:50'),
(21, 3, 7, '2023-06-20 08:07:02', '2023-06-20 08:07:02'),
(22, 3, 8, '2023-06-20 08:07:02', '2023-06-20 08:07:02'),
(23, 4, 7, '2023-06-20 08:11:53', '2023-06-20 08:11:53'),
(24, 3, 7, '2023-06-20 08:17:05', '2023-06-20 08:17:05'),
(25, 3, 8, '2023-06-20 08:17:05', '2023-06-20 08:17:05'),
(26, 4, 7, '2023-06-20 22:33:00', '2023-06-20 22:33:00'),
(27, 4, 8, '2023-06-20 22:33:00', '2023-06-20 22:33:00'),
(28, 5, 11, '2023-06-20 22:34:03', '2023-06-20 22:34:03'),
(29, 5, 12, '2023-06-20 22:34:03', '2023-06-20 22:34:03'),
(32, 5, 7, '2023-06-20 23:28:18', '2023-06-20 23:28:18'),
(33, 5, 8, '2023-06-20 23:28:18', '2023-06-20 23:28:18'),
(36, 12, 7, '2023-06-20 23:51:01', '2023-06-20 23:51:01'),
(37, 12, 8, '2023-06-20 23:51:01', '2023-06-20 23:51:01'),
(38, 13, 7, '2023-06-20 23:53:21', '2023-06-20 23:53:21'),
(39, 13, 8, '2023-06-20 23:53:21', '2023-06-20 23:53:21'),
(40, 14, 7, '2023-06-20 23:55:44', '2023-06-20 23:55:44'),
(47, 15, 7, '2023-06-21 07:09:51', '2023-06-21 07:09:51'),
(48, 15, 8, '2023-06-21 07:09:51', '2023-06-21 07:09:51'),
(49, 2, 7, '2023-06-21 07:28:21', '2023-06-21 07:28:21'),
(50, 2, 8, '2023-06-21 07:28:21', '2023-06-21 07:28:21'),
(67, 6, 7, '2023-06-21 22:46:09', '2023-06-21 22:46:09'),
(68, 6, 8, '2023-06-21 22:46:09', '2023-06-21 22:46:09'),
(75, 1, 11, '2023-06-21 23:04:18', '2023-06-21 23:04:18'),
(76, 1, 12, '2023-06-21 23:04:18', '2023-06-21 23:04:18'),
(79, 7, 7, '2023-06-21 23:29:55', '2023-06-21 23:29:55'),
(80, 7, 8, '2023-06-21 23:29:55', '2023-06-21 23:29:55'),
(83, 9, 7, '2023-06-21 23:34:27', '2023-06-21 23:34:27'),
(84, 9, 8, '2023-06-21 23:34:27', '2023-06-21 23:34:27'),
(85, 8, 7, '2023-06-21 23:35:41', '2023-06-21 23:35:41'),
(86, 8, 8, '2023-06-21 23:35:41', '2023-06-21 23:35:41');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_11_21_114230_create_apr_cms_table', 1),
(6, '2022_11_23_051407_create_apr_campaigns_table', 1),
(7, '2022_11_23_053350_add_campaigns_slug_column_apr_campaigns_table', 1),
(8, '2022_11_24_072302_add_start_end_date_time_in_campaign_table', 1),
(9, '2022_11_24_072751_renaming_columns_name_in_campaign_table', 1),
(10, '2022_11_24_074900_change_column_type_of_campaigns_date_in_campaign_table', 1),
(11, '2022_11_25_055748_change_column_type_of_meta_desc_and_comment_in_campaign_table', 1),
(12, '2022_11_25_074606_remove_columns_from_apr_campaigns_table', 1),
(13, '2022_11_25_100932_add_status_column_in_apr_campaigns_table', 1),
(14, '2022_11_29_071344_create_apr_donations_table', 1),
(15, '2022_11_30_071931_create_apr_blogs_table', 1),
(16, '2022_11_30_072406_create_apr_media_table', 1),
(17, '2022_11_30_072653_create_apr_queries_table', 1),
(18, '2022_11_30_073046_create_apr_admin_table', 1),
(19, '2022_11_30_075034_add_status_column_in_apr_admin_table', 1),
(20, '2022_12_16_064121_create_categories_table', 2),
(21, '2022_12_17_162234_create_distributors_table', 3),
(22, '2022_12_24_145756_create_listing_cat_table', 4),
(23, '2022_12_31_120719_create_franchisees_table', 5),
(24, '2023_01_05_093243_create_image_gallery_table', 6),
(25, '2023_01_06_192308_create_advertisement_table', 6),
(27, '2023_06_05_072439_create_regions_table', 7),
(28, '2023_06_05_072457_create_state_table', 8),
(29, '2023_06_05_123139_create_countries_table', 9),
(31, '2023_06_05_133135_add_column_distributors', 10),
(32, '2023_06_06_130627_create_table_sales', 11),
(33, '2023_06_26_134713_create_enquiries__table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('rs@yopmail.com', '$2y$10$nYGBXVGkAIczGz6RJpL04OSD5kfbbdHJqreG299SNyxFIpMKiO2lu', '2022-12-17 04:20:52');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '0=>inactive,1=>active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Central', 1, '2023-06-05 12:02:54', '2023-06-05 12:02:54'),
(2, 'East', 1, '2023-06-05 12:02:54', '2023-06-05 12:02:54'),
(3, 'West', 1, '2023-06-05 12:02:54', '2023-06-05 12:02:54'),
(4, 'North', 1, '2023-06-05 12:02:54', '2023-06-05 12:02:54'),
(5, 'South', 1, '2023-06-05 12:02:54', '2023-06-05 12:02:54'),
(6, 'Union Territories', 1, '2023-06-05 12:02:54', '2023-06-05 12:02:54'),
(7, 'World Wide', 1, '2023-06-05 12:02:54', '2023-06-05 12:02:54');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `name` varchar(255) DEFAULT NULL,
  `id` bigint(20) UNSIGNED NOT NULL,
  `agent_type` int(11) DEFAULT NULL,
  `mode` enum('appoint','become') DEFAULT 'appoint',
  `gst` varchar(255) DEFAULT NULL,
  `pan` varchar(255) DEFAULT NULL,
  `annual_sale` varchar(200) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `experience` varchar(100) DEFAULT NULL,
  `education` varchar(200) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `sub_category_id` text DEFAULT NULL,
  `state_id` varchar(100) DEFAULT NULL,
  `country_id` varchar(100) DEFAULT NULL,
  `products` text DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `product_detail` text DEFAULT NULL,
  `target_customer` text DEFAULT NULL,
  `expected_work` text DEFAULT NULL,
  `cities_needed` text DEFAULT NULL,
  `remark` text DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `slug` varchar(255) DEFAULT NULL,
  `business_profile` varchar(255) DEFAULT NULL,
  `gallery` text DEFAULT NULL,
  `is_featured` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`name`, `id`, `agent_type`, `mode`, `gst`, `pan`, `annual_sale`, `dob`, `experience`, `education`, `logo`, `category_id`, `sub_category_id`, `state_id`, `country_id`, `products`, `user_id`, `product_detail`, `target_customer`, `expected_work`, `cities_needed`, `remark`, `status`, `slug`, `business_profile`, `gallery`, `is_featured`, `created_at`, `updated_at`) VALUES
('sfdsd', 1, NULL, 'appoint', NULL, NULL, NULL, NULL, NULL, NULL, 'assets/uploads/sales/logo/sfdsd1686059854.png', NULL, '[\"7\",\"8\"]', '[\"25\",\"26\"]', '', NULL, 7, 'gsdsgdgsd', 'sgdgsdgsd', 'sgdsgdgds', 'sgdsgd', 'gsdsgd', '0', 'sfdsd', NULL, NULL, 1, '2023-06-06 08:27:34', '2023-06-30 22:10:17'),
('gsgd', 2, 1, 'appoint', NULL, '435edsffsd', 'sgsg', '2023-06-08', '2', '1', 'assets/uploads/sales/logo/gsgd1686060279.png', NULL, '[\"7\",\"8\"]', '[\"3\",\"2\"]', '', NULL, 7, 'vvcvc', 'vcvc', 'vcvc', 'vcvc', 'vcvxc', '0', 'gsgd', NULL, NULL, 1, '2023-06-06 08:34:40', '2023-06-30 22:07:06'),
('xczxcz', 3, NULL, 'appoint', NULL, NULL, NULL, NULL, NULL, NULL, 'assets/uploads/sales/logo/xczxcz1687268825.png', NULL, '[\"7\",\"8\"]', '[\"34\",\"22\",\"33\"]', '[\"4\",\"16\"]', NULL, 7, 'xczxcz', 'cxzcxz', 'xczxcz', 'xzcxcz', 'xczxczxcz', '0', 'xczxcz', NULL, NULL, 0, '2023-06-20 08:17:05', '2023-06-20 08:17:05'),
('Developer Solution', 4, 1, 'become', NULL, NULL, NULL, NULL, '24', '1', 'assets/uploads/sales/logo/Developer_Solution1687320180.jpg', NULL, '[\"7\",\"8\"]', '[\"35\",\"24\",\"25\"]', '', NULL, 7, 'Reference site about Lorem Ipsum, giving information on its origins, as well as a random Lipsum generator.', 'Reference site about Lorem Ipsum, giving information on its origins, as well as a random Lipsum generator.', 'Reference site about Lorem Ipsum, giving information on its origins, as well as a random Lipsum generator.', 'Reference site about Lorem Ipsum, giving information on its origins, as well as a random Lipsum generator.', 'Reference site about Lorem Ipsum, giving information on its origins, as well as a random Lipsum generator.Reference site about Lorem Ipsum, giving information on its origins, as well as a random Lipsum generator.', '0', 'DeveloperSolution', NULL, NULL, 1, '2023-06-20 22:33:00', '2023-06-30 22:49:58'),
('Want to appoint', 5, NULL, 'appoint', NULL, NULL, NULL, NULL, NULL, NULL, 'assets/uploads/sales/logo/Want_to_appoint1687320243.jpg', NULL, '[\"11\",\"12\"]', '[\"34\",\"13\"]', '', NULL, 7, 'Reference site about Lorem Ipsum, giving information on its origins, as well as a random Lipsum generator.', 'Reference site about Lorem Ipsum, giving information on its origins, as well as a random Lipsum generator.', 'Reference site about Lorem Ipsum, giving information on its origins, as well as a random Lipsum generator.', 'Reference site about Lorem Ipsum, giving information on its origins, as well as a random Lipsum generator.', 'Reference site about Lorem Ipsum, giving information on its origins, as well as a random Lipsum generator.Reference site about Lorem Ipsum, giving information on its origins, as well as a random Lipsum generator.', '0', 'Wanttoappoint', NULL, NULL, 1, '2023-06-20 22:34:03', '2023-06-30 22:14:37'),
('Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremqu', 6, NULL, 'appoint', NULL, NULL, NULL, NULL, NULL, NULL, 'assets/uploads/sales/logo/Sed_ut_perspiciatis_unde_omnis_iste_natus_error_sit_voluptatem_accusantium_doloremqu1687322043.jpg', NULL, '[\"7\",\"8\"]', '', '[\"13\",\"16\"]', NULL, 7, '\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur', '\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur', '\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur', '\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur', '\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur', '0', 'Sedutperspiciatisundeomnisistenatuserrorsitvoluptatemaccusantiumdoloremqu', NULL, NULL, 0, '2023-06-20 23:04:04', '2023-06-20 23:04:04'),
('Developer Solution', 7, NULL, 'appoint', NULL, NULL, NULL, NULL, NULL, NULL, 'assets/uploads/sales/logo/Developer_Solution1687325801.png', NULL, '[\"7\",\"8\"]', '[\"35\"]', NULL, NULL, 7, 'perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.', 'perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.', 'perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.', 'perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.', 'perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.', '0', 'DeveloperSolution', NULL, NULL, 0, '2023-06-21 00:06:42', '2023-06-21 00:06:42'),
('Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremqu', 8, 1, 'become', NULL, NULL, NULL, '2023-06-22', '12', '1', 'assets/uploads/sales/logo/Sed_ut_perspiciatis_unde_omnis_iste_natus_error_sit_voluptatem_accusantium_doloremqu1687417093.png', NULL, '[\"7\",\"8\"]', NULL, '[\"13\",\"16\"]', NULL, 7, 'test', '\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur', '\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur', '\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur', '\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur', '0', 'Sedutperspiciatisundeomnisistenatuserrorsitvoluptatemaccusantiumdoloremqu', 'test', NULL, 0, '2023-06-22 01:07:15', '2023-06-22 01:29:46'),
('Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremqu', 9, NULL, 'appoint', NULL, NULL, NULL, NULL, NULL, NULL, 'assets/uploads/sales/logo/Sed_ut_perspiciatis_unde_omnis_iste_natus_error_sit_voluptatem_accusantium_doloremqu1687416833.jpg', NULL, '[\"7\",\"8\"]', NULL, '[\"13\",\"16\"]', NULL, 7, 'test', '\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur', '\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur', '\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur', '\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur', '0', 'Sedutperspiciatisundeomnisistenatuserrorsitvoluptatemaccusantiumdoloremqu', NULL, NULL, 0, '2023-06-22 01:23:53', '2023-06-22 01:23:53'),
('Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremqu', 10, NULL, 'appoint', NULL, NULL, NULL, NULL, NULL, NULL, 'assets/uploads/sales/logo/Sed_ut_perspiciatis_unde_omnis_iste_natus_error_sit_voluptatem_accusantium_doloremqu1687417336.png', NULL, '[\"7\",\"8\"]', NULL, '[\"13\",\"16\"]', NULL, 7, 'tt', '\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur', '\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur', '\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur', '\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur', '0', 'Sedutperspiciatisundeomnisistenatuserrorsitvoluptatemaccusantiumdoloremqu', 'tt', NULL, 1, '2023-06-22 01:25:26', '2023-06-30 22:49:50'),
('Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremqu', 11, NULL, 'appoint', NULL, NULL, NULL, NULL, NULL, NULL, 'assets/uploads/sales/logo/Sed_ut_perspiciatis_unde_omnis_iste_natus_error_sit_voluptatem_accusantium_doloremqu1687417351.jpg', NULL, '[\"7\",\"8\"]', NULL, '[\"13\",\"16\"]', NULL, 7, 'test', '\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur', '\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur', '\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur', '\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur', '0', 'Sedutperspiciatisundeomnisistenatuserrorsitvoluptatemaccusantiumdoloremqu', 'test', '[\"1687437114_Developer_Solution1687324992.jpg\",\"1687437221_Developer_Solution1687324992.jpg\",\"1687437226_Developer_Solution1687324992.jpg\",\"1687437726_Developer_Solution1687324992.jpg\",\"1687438316_IPL1681230904.png\"]', 1, '2023-06-22 01:26:42', '2023-06-30 22:49:52'),
('RED', 12, NULL, 'appoint', NULL, NULL, NULL, NULL, NULL, NULL, 'assets/uploads/sales/logo/RED1687579632.png', NULL, '[\"7\",\"8\"]', '[\"22\",\"7\"]', '[\"14\"]', NULL, 7, 'test', 'test', 'test', 'test', 'test', '0', 'RED', 'test', '[\"1687751195_1687437293_Developer_Solution1687324992.jpg\"]', 1, '2023-06-23 22:37:13', '2023-06-30 08:49:47'),
('soni', 13, NULL, 'appoint', NULL, NULL, NULL, NULL, NULL, NULL, 'assets/uploads/sales/logo/soni1687846332.png', 3, '[\"11\",\"12\"]', '[\"35\",\"2\"]', '[\"14\"]', NULL, 7, 'test', 'test', 'test', 'test', 'test', '0', 'soni', 'test', NULL, 1, '2023-06-27 00:42:13', '2023-06-30 22:48:58'),
('PRATEEK PACKAGING', 14, NULL, 'appoint', NULL, NULL, NULL, NULL, NULL, NULL, 'assets/uploads/sales/logo/PRATEEK_PACKAGING1687957736.jpg', 1, '[\"7\"]', '[\"13\",\"7\"]', NULL, NULL, 7, 'package', 'package', 'package', 'Shimla', 'ShimlaShimlaShimla', '0', 'PRATEEKPACKAGING', 'package', NULL, 1, '2023-06-28 07:38:56', '2023-06-30 22:48:55'),
('test', 15, 1, 'become', NULL, NULL, NULL, '2023-06-23', '12', '1', 'assets/uploads/sales/logo/test1687957802.jpg', 3, '[\"11\"]', '[\"13\",\"7\"]', NULL, NULL, 7, 'Shimla', 'Shimla', 'Shimla', 'Shimla', 'Shimla', '0', 'test', 'Shimla', NULL, 1, '2023-06-28 07:40:02', '2023-06-30 22:48:53');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `region_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL DEFAULT 20,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '0=>inactive,1=>active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`, `region_id`, `country_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Andhra pradesh', 5, 20, 1, NULL, NULL),
(2, 'Assam', 2, 20, 1, NULL, NULL),
(3, 'Arunachal pradesh', 2, 20, 1, NULL, NULL),
(4, 'Bihar', 1, 20, 1, NULL, NULL),
(5, 'Gujrat', 3, 20, 1, NULL, NULL),
(6, 'Haryana', 4, 20, 1, NULL, NULL),
(7, 'Himachal pradesh', 4, 20, 1, NULL, NULL),
(8, 'Jammu & kashmir', 4, 20, 1, NULL, NULL),
(9, 'Karnataka', 5, 20, 1, NULL, NULL),
(10, 'Kerala', 5, 20, 1, NULL, NULL),
(11, 'Madhya pradesh', 1, 20, 1, NULL, NULL),
(12, 'Maharashtra', 3, 20, 1, NULL, NULL),
(13, 'Manipur', 2, 20, 1, NULL, NULL),
(14, 'Meghalaya', 2, 20, 1, NULL, NULL),
(15, 'Mizoram', 2, 20, 1, NULL, NULL),
(16, 'Nagaland', 2, 20, 1, NULL, NULL),
(17, 'Orissa', 2, 20, 1, NULL, NULL),
(18, 'Punjab', 4, 20, 1, NULL, NULL),
(19, 'Rajasthan', 3, 20, 1, NULL, NULL),
(20, 'Sikkim', 2, 20, 1, NULL, NULL),
(21, 'Tamil nadu', 5, 20, 1, NULL, NULL),
(22, 'Tripura', 2, 20, 1, NULL, NULL),
(23, 'Uttar pradesh', 4, 20, 1, NULL, NULL),
(24, 'West bengal', 2, 20, 1, NULL, NULL),
(25, 'Delhi', 4, 20, 1, NULL, NULL),
(26, 'Goa', 3, 20, 1, NULL, NULL),
(27, 'Pondichery', 6, 20, 1, NULL, NULL),
(28, 'Lakshdweep', 6, 20, 1, NULL, NULL),
(29, 'Daman & diu', 6, 20, 1, NULL, NULL),
(30, 'Dadra and nagar haveli', 6, 20, 1, NULL, NULL),
(31, 'Chandigarh', 6, 20, 1, NULL, NULL),
(32, 'Andaman & nicobar islands', 6, 20, 1, NULL, NULL),
(33, 'Uttarakhand', 4, 20, 1, NULL, NULL),
(34, 'Jharkhand', 1, 20, 1, NULL, NULL),
(35, 'Chattisgarh', 1, 20, 1, NULL, NULL),
(36, 'Telangana', 5, 20, 1, NULL, NULL);

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
  `intrested` int(11) NOT NULL COMMENT '0->distributors, 1->Franchises, 2->sales agent',
  `phone` varchar(20) DEFAULT NULL,
  `company_name` varchar(100) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `zipcode` int(11) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `intrested`, `phone`, `company_name`, `address`, `city`, `zipcode`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Rajat Shah', 'rs@yopmail.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, '9978678954', 'SRI MAHALAXMI INDUSTRIES', 'Sri Mahalaxmi Industries, Post Office Road, Hethur, Sakleshpur', 'Karnataka', 573123, 'rl3ieEcartkqIebdrA1WkqF7anYdHfBPDPSsS7MUrw7mfhd1ympIGElGb1eg', '2022-12-17 01:39:29', '2023-07-02 23:52:37'),
(3, 'Dinesh Shah', 'ds@yopmail.com', NULL, '$2y$10$XswKsvcPA0EcpnvhdTcyAeXOuYNyCBEVOOwVj1L6yp.vVUiMpJmP2', 0, '9978678954', NULL, NULL, NULL, NULL, NULL, '2022-12-17 01:40:56', '2022-12-17 01:40:56'),
(5, 'Nitin', 'ns@yopmail.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, '9978678954', NULL, NULL, NULL, NULL, 'tNR6lrvT9a8YsO27hZz3IUV3EBuxa7V7V8n367pPdJk2c0TCkHlQqNicHi08', '2022-12-17 08:34:42', '2022-12-17 08:34:42'),
(6, 'Kuber Bisht', 'kuberbish@gmail.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, '9978678954', NULL, NULL, NULL, NULL, 'SgtiOtssysVUshdJHvXmeTuVJV055OvcpV0OMLnvlMzLo2oqperxPOSKSINw', '2023-01-09 05:33:47', '2023-02-14 16:12:31'),
(7, 'kuber', 'kuber@yopmail.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 2, '9818468887', 'SAMRAT PLASTIC INDUSTRIES', 'P-25B, UG, Vijay Vihar', 'New Delhi', 110059, 'd0rNE8hAof35vAKS2dTPlRR3Xbvduw6sq2vin3NVZtLaPeT0Ch8d443hi805', '2023-04-04 05:47:29', '2023-07-03 00:12:11'),
(8, 'Bharat', 'bharat@yopmail.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, '9978678954', NULL, NULL, NULL, NULL, NULL, '2023-04-12 04:31:59', '2023-04-12 04:31:59'),
(9, 'soni', 'sonis@yopmail.com', NULL, '$2y$10$P73cgtC4soYiVuRweaaxPebs.v44Unt7HjoFeHmAIydKIWBqrVQzq', 0, '9978678954', NULL, NULL, NULL, NULL, NULL, '2023-06-26 07:18:27', '2023-06-26 07:18:27'),
(10, 'soni', 'sonirs@yopmail.com', NULL, '$2y$10$f83euAt9cZaG1C55QB9dzuoSujgmP0Xllw3EyU8ql89lKmFnYJrG.', 0, '9978678954', NULL, NULL, NULL, NULL, NULL, '2023-06-26 07:19:42', '2023-06-26 07:19:42'),
(11, 'soni', 'test@gmail.com', NULL, '$2y$10$XDHbZpjHter7KF8QUfSzUuc7AIgwEQkhNfdMaE2.0yOLKYESDKu8y', 0, '8879567896', 'SRI MAHALAXMI INDUSTRIES', 'Delhi', 'Delhi', 201014, NULL, '2023-07-02 23:57:40', '2023-07-03 00:02:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advertisement`
--
ALTER TABLE `advertisement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `apr_admin`
--
ALTER TABLE `apr_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `apr_blogs`
--
ALTER TABLE `apr_blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `apr_campaigns`
--
ALTER TABLE `apr_campaigns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `apr_cms`
--
ALTER TABLE `apr_cms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `apr_donations`
--
ALTER TABLE `apr_donations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `apr_media`
--
ALTER TABLE `apr_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `apr_queries`
--
ALTER TABLE `apr_queries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `distributors`
--
ALTER TABLE `distributors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enquiries`
--
ALTER TABLE `enquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `franchisees`
--
ALTER TABLE `franchisees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image_gallery`
--
ALTER TABLE `image_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `listing_cat`
--
ALTER TABLE `listing_cat`
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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
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
-- AUTO_INCREMENT for table `advertisement`
--
ALTER TABLE `advertisement`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `apr_admin`
--
ALTER TABLE `apr_admin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `apr_blogs`
--
ALTER TABLE `apr_blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `apr_campaigns`
--
ALTER TABLE `apr_campaigns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `apr_cms`
--
ALTER TABLE `apr_cms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `apr_donations`
--
ALTER TABLE `apr_donations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `apr_media`
--
ALTER TABLE `apr_media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `apr_queries`
--
ALTER TABLE `apr_queries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `distributors`
--
ALTER TABLE `distributors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `enquiries`
--
ALTER TABLE `enquiries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `franchisees`
--
ALTER TABLE `franchisees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `image_gallery`
--
ALTER TABLE `image_gallery`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `listing_cat`
--
ALTER TABLE `listing_cat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
