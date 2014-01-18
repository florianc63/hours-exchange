-- phpMyAdmin SQL Dump
-- version 3.4.11.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 13, 2014 at 01:40 PM
-- Server version: 5.5.35
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kodewebs_hx`
--

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `groups_name_unique` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `permissions`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '{"admin":1}', '2013-11-13 04:08:29', '2013-11-13 04:08:29'),
(2, 'Member', '{"user.create":1,"user.profile":1}', '2013-11-13 04:08:29', '2013-11-13 04:08:29');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2012_12_06_225921_migration_cartalyst_sentry_install_users', 1),
('2012_12_06_225929_migration_cartalyst_sentry_install_groups', 1),
('2012_12_06_225945_migration_cartalyst_sentry_install_users_groups_pivot', 1),
('2012_12_06_225988_migration_cartalyst_sentry_install_throttle', 1),
('2013_09_09_093745_create_offers_table', 2),
('2013_09_09_093815_create_pages_table', 2),
('2013_09_19_085023_create_services_table', 2),
('2013_09_19_085023_create_serviceuser_table', 2),
('2013_09_19_085023_create_skillscategories_table', 2),
('2013_09_19_131509_create_skills_table', 2),
('2013_09_20_125138_create_userdetails_table', 2),
('2013_10_27_091755_create_settings_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

DROP TABLE IF EXISTS `offers`;
CREATE TABLE IF NOT EXISTS `offers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci,
  `price` float(8,2) NOT NULL,
  `date_expire` datetime NOT NULL,
  `qty` int(11) NOT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `visible` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `user_id`, `service_id`, `title`, `slug`, `body`, `price`, `date_expire`, `qty`, `location`, `image`, `visible`, `created_at`, `updated_at`) VALUES
(1, 2, 8, 'First job offer', 'first-job-offer', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 3.00, '2013-12-12 21:08:29', 5, 'Vancouver', NULL, 'yes', '2013-11-06 04:08:29', '2013-11-06 04:08:29'),
(2, 2, 7, 'Second job offer', 'second-job-offer', 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1.50, '2013-11-26 21:08:29', 12, 'North Vancouver', '/uploads/h6VjJP_Koala.jpg', 'yes', '2013-11-13 04:08:29', '2013-11-14 04:45:24'),
(3, 3, 11, 'Third job', 'third-job', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 2.50, '2013-11-09 21:08:29', 10, 'California', NULL, 'yes', '2013-10-13 03:08:29', '2013-10-13 03:08:29'),
(6, 3, 1, 'I will create a website for you', 'i-will-create-a-website-for-you', 'Description to pass validation', 25.00, '2013-12-10 00:00:00', 5, 'Anywhere', '/uploads/r6c5u8_Desert.jpg', 'yes', '2013-11-14 04:42:13', '2013-11-14 04:42:13');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `slug`, `body`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'About us', 'about-us', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, '2013-11-06 04:08:29', '2013-11-06 04:08:29'),
(2, 'Terms of Service', 'terms-of-service', 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 1, '2013-11-12 04:08:29', '2013-11-12 04:08:29'),
(3, 'Contact', 'contact', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, '2013-11-12 04:08:29', '2013-11-12 04:08:29'),
(4, 'Hour Exchange - Hr : X', 'welcome', '\n<p>The more you give, the richer you are.</p>\n<p>Trade your work, your skills and capacities.</p>\n \n<h3>Why is Hour Exchange better than volunteering?</h3>\n<p>We are strong supporters of volunteering and we have created this platform to match the needs of people.</p>\n<p>We believe that Hr:X community offers large advantages over traditional volunteering. You can join because you need help getting a job done and in the same time you know your experience can help someone else.</p>\n<p>When you complete a traditional volunteering position you receive a letter of reference that you can attach to your resume. You get the chance to show your work resume and your vast volunteering experience to a possible employer only after you get selected for an interview.  With Hr:X after you complete a job you receive an online review that attaches to your on-line profile. Your profile can be accessed anytime by any of our business members.</p>\n \n<h3>What do our members have in common?</h3>\n<p>All our members offer and request work proposals. We are not a classified adds page where corporations and NGOs are posting jobs and volunteering positions while prospects have to request an interview to be selected for the job. We are a work exchange platform where everybody has to solicit and offer work tasks. The more tasks are posted the richer the community is and every matched and accomplished task brings experience and trust.</p>\n<p>Every member has direct access to all the community resources, our work task database. Every member’s community wealth is in direct proportion with the community’s total capacity. The richer the community is, the richer you are. Because you don’t need everything all the time and you can offer only some things sometime, our online community page exists to match the needs of what you have to offer and what you want to receive with those of all the others members of our community.</p>\n \n<h3>How many members?</h3>\n<p>The more members the better. We have two types of memberships. Business and Individual. The difference is the HourX transaction capacity. An Individual Member can post a task offer and transaction only one other Member (Individual or Business) to do the task while a Business Member can post a task offer and transaction multiple other members for multiple positions.</p>\n<p>View-Only Memberships are Free. These members can create a profile, view and reply to postings. They can receive reviews for completed work.</p>\n				', 1, '2013-11-13 04:08:29', '2013-11-13 04:08:29'),
(5, 'HTML Editor', 'html-editor', '\n				<p><img src="https://ucarecdn.com/87390d01-4fd8-4ea6-a016-07fd8c096547/" /></p>\n\n<p>Lorem ipsum dolor sit amet, <a href="http://hx.kodewebsites.com">consectetur adipisicing elit</a>, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>\n\n<p><img src="https://ucarecdn.com/ff9995a8-416f-4ee3-915e-2a82bbe0d22b/" /></p>\n\n<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. <strong>Excepteur sint</strong> occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>\n				', 1, '2013-11-13 04:08:29', '2013-11-13 04:08:29');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `place` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=19 ;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `slug`, `place`, `created_at`, `updated_at`) VALUES
(1, 'Arts & Crafts', '', 1, '2013-11-13 04:08:29', '2013-11-13 04:08:29'),
(2, 'Building Services', '', 2, '2013-11-13 04:08:29', '2013-11-13 04:08:29'),
(3, 'Business & Administration', '', 3, '2013-11-13 04:08:29', '2013-11-13 04:08:29'),
(4, 'Children & Childcare', '', 4, '2013-11-13 04:08:29', '2013-11-13 04:08:29'),
(5, 'Computers', '', 5, '2013-11-13 04:08:29', '2013-11-13 04:08:29'),
(6, 'Counseling & Therapy', '', 6, '2013-11-13 04:08:29', '2013-11-13 04:08:29'),
(7, 'Education', '', 7, '2013-11-13 04:08:29', '2013-11-13 04:08:29'),
(8, 'Food', '', 8, '2013-11-13 04:08:29', '2013-11-13 04:08:29'),
(9, 'Gardening & Yard Work', '', 9, '2013-11-13 04:08:29', '2013-11-13 04:08:29'),
(10, 'Goods', '', 10, '2013-11-13 04:08:29', '2013-11-13 04:08:29'),
(11, 'Health & Personal', '', 11, '2013-11-13 04:08:29', '2013-11-13 04:08:29'),
(12, 'Household', '', 12, '2013-11-13 04:08:29', '2013-11-13 04:08:29'),
(13, 'Miscellaneous', '', 13, '2013-11-13 04:08:29', '2013-11-13 04:08:29'),
(14, 'Music & Entertainment', '', 14, '2013-11-13 04:08:29', '2013-11-13 04:08:29'),
(15, 'Pets', '', 15, '2013-11-13 04:08:29', '2013-11-13 04:08:29'),
(16, 'Sports & Recreation', '', 16, '2013-11-13 04:08:29', '2013-11-13 04:08:29'),
(17, 'Teaching', '', 17, '2013-11-13 04:08:29', '2013-11-13 04:08:29'),
(18, 'Transportation', '', 18, '2013-11-13 04:08:29', '2013-11-13 04:08:29');

-- --------------------------------------------------------

--
-- Table structure for table `service_user`
--

DROP TABLE IF EXISTS `service_user`;
CREATE TABLE IF NOT EXISTS `service_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `service_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `service_user`
--

INSERT INTO `service_user` (`id`, `service_id`, `user_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 2),
(4, 4, 2),
(5, 5, 3),
(6, 6, 3);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`) VALUES
(1, 'site_title', 'Hour Exchange'),
(2, 'homepage', '4');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

DROP TABLE IF EXISTS `skills`;
CREATE TABLE IF NOT EXISTS `skills` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `place` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `name`, `slug`, `category_id`, `user_id`, `place`, `created_at`, `updated_at`) VALUES
(1, 'Cashier', 'cashier', 1, 1, 1, '2013-11-13 04:08:29', '2013-11-13 04:08:29'),
(2, 'Waitress', 'waitress', 1, 1, 2, '2013-11-13 04:08:29', '2013-11-13 04:08:29'),
(3, 'Waiter', 'waiter', 1, 1, 3, '2013-11-13 04:08:29', '2013-11-13 04:08:29'),
(4, 'Bartender', 'bartender', 1, 1, 4, '2013-11-13 04:08:29', '2013-11-13 04:08:29'),
(5, 'Public relations', 'public-relations', 2, 1, 5, '2013-11-13 04:08:29', '2013-11-13 04:08:29'),
(6, 'Keeping records', 'keeping-records', 2, 1, 6, '2013-11-13 04:08:29', '2013-11-13 04:08:29');

-- --------------------------------------------------------

--
-- Table structure for table `skills_categories`
--

DROP TABLE IF EXISTS `skills_categories`;
CREATE TABLE IF NOT EXISTS `skills_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `place` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `skills_categories`
--

INSERT INTO `skills_categories` (`id`, `name`, `slug`, `place`, `created_at`, `updated_at`) VALUES
(1, 'Restaurant', 'restaurant', 1, '2013-11-13 04:08:29', '2013-11-13 04:08:29'),
(2, 'Sales', 'sales', 2, '2013-11-13 04:08:29', '2013-11-13 04:08:29'),
(3, 'Construction', 'construction', 3, '2013-11-13 04:08:29', '2013-11-13 04:08:29');

-- --------------------------------------------------------

--
-- Table structure for table `throttle`
--

DROP TABLE IF EXISTS `throttle`;
CREATE TABLE IF NOT EXISTS `throttle` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `ip_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `attempts` int(11) NOT NULL DEFAULT '0',
  `suspended` tinyint(1) NOT NULL DEFAULT '0',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `last_attempt_at` timestamp NULL DEFAULT NULL,
  `suspended_at` timestamp NULL DEFAULT NULL,
  `banned_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `throttle_user_id_index` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `throttle`
--

INSERT INTO `throttle` (`id`, `user_id`, `ip_address`, `attempts`, `suspended`, `banned`, `last_attempt_at`, `suspended_at`, `banned_at`) VALUES
(1, 3, NULL, 0, 0, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `activated` tinyint(1) NOT NULL DEFAULT '0',
  `activation_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activated_at` timestamp NULL DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `persist_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reset_password_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_activation_code_index` (`activation_code`),
  KEY `users_reset_password_code_index` (`reset_password_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `permissions`, `activated`, `activation_code`, `activated_at`, `last_login`, `persist_code`, `reset_password_code`, `first_name`, `last_name`, `created_at`, `updated_at`) VALUES
(1, 'admin@hourexchange.com', '$2y$10$2qrqPzo1IE1Ak6Xo5pSIGO14hEQUW.jYblw99tkz5Yq2VNsi7v9JS', NULL, 1, NULL, NULL, NULL, NULL, NULL, 'Admin', ' ', '2013-11-13 04:08:29', '2013-11-13 04:08:29'),
(2, 'gus@kodewebsites.com', '$2y$10$37MuVs0uIPFdhVkQ1QXvbuPHFPpFlW7rV3ORO3bxI98.UHUxJHifi', NULL, 1, NULL, NULL, NULL, NULL, NULL, 'Gus', 'Munteanu', '2013-11-13 04:08:29', '2013-11-13 04:08:29'),
(3, 'traian.cazacu@gmail.com', '$2y$10$69.4669fttwQsWsKb0IThes6Xz/qfrAEJ8Ma/3igxkw/Y4wQqx4dW', NULL, 1, NULL, NULL, '2013-11-14 03:15:07', '$2y$10$ZduQQjiPFYSTDFcs7DRDyev7McaKaBLHz5Ve8LjUHn4L7vHrs5Rqy', NULL, 'Traian', 'Cazacu', '2013-11-13 04:08:29', '2013-11-14 03:15:07');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

DROP TABLE IF EXISTS `users_groups`;
CREATE TABLE IF NOT EXISTS `users_groups` (
  `user_id` int(10) unsigned NOT NULL,
  `group_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`user_id`, `group_id`) VALUES
(1, 1),
(2, 2),
(3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

DROP TABLE IF EXISTS `user_details`;
CREATE TABLE IF NOT EXISTS `user_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `type` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'free',
  `first_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `descr` text COLLATE utf8_unicode_ci,
  `city` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `province` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `postal` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Canada',
  `linkedin` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `job_status` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `user_id`, `type`, `first_name`, `last_name`, `mobile`, `address`, `descr`, `city`, `province`, `postal`, `country`, `linkedin`, `job_status`, `created_at`, `updated_at`) VALUES
(1, 1, 'free', 'John', 'Smith', '', '', NULL, '', '', '', 'Canada', NULL, NULL, '2013-11-13 04:08:29', '2013-11-13 04:08:29'),
(2, 2, 'free', 'Gus', 'Mun', '', '', NULL, '', '', '', 'Canada', NULL, NULL, '2013-11-13 04:08:29', '2013-11-13 04:08:29'),
(3, 3, 'free', 'Traian', 'Cazacu', '', '', NULL, '', '', '', 'Canada', NULL, NULL, '2013-11-13 04:08:29', '2013-11-13 04:08:29');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
