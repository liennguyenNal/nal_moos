-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Aug 31, 2015 at 12:02 PM
-- Server version: 5.5.42
-- PHP Version: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `moos`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `first_name_kana` varchar(255) NOT NULL,
  `last_name_kana` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `birthday` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `last_login_ip` varchar(255) DEFAULT NULL,
  `last_login_time` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`id`, `username`, `first_name`, `last_name`, `first_name_kana`, `last_name_kana`, `email`, `password`, `birthday`, `address`, `phone`, `last_login_ip`, `last_login_time`, `created`, `updated`) VALUES
(1, 'admin', 'administrator 1', 'moos 2', 'first name kana', 'last name kana', 'admin@moos.jp', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, NULL, NULL, NULL, '2015-08-29 05:28:51'),
(2, 'admin', 'administrator 1', 'moos', 'first name kana', 'last name kana', 'admin@moos.jp', '0192023a7bbd73250516f069df18b500', NULL, NULL, NULL, NULL, NULL, NULL, '2015-08-29 05:53:13');

-- --------------------------------------------------------

--
-- Table structure for table `approved_rounds`
--

CREATE TABLE `approved_rounds` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `approved_rounds`
--

INSERT INTO `approved_rounds` (`id`, `name`, `description`) VALUES
(1, 'Restister Basic Info', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `short_content` text NOT NULL,
  `content` text NOT NULL,
  `small_image` varchar(255) DEFAULT NULL,
  `large_image` varchar(255) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `author` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT '0',
  `view_count` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `short_content`, `content`, `small_image`, `large_image`, `slug`, `author`, `created`, `updated`, `created_by`, `updated_by`, `is_published`, `view_count`) VALUES
(2, 'test news', 'short description', 'test\r\ntest\r\ntest test  ', NULL, NULL, '', NULL, '2015-08-28 12:23:09', '2015-08-28 12:23:09', NULL, NULL, 1, 0),
(3, 'fdsggsfdgsdf gsdf gsfd gg', '123', 'fdsfsgsd fg\r\nsdfg \r\nsdf \r\nsdfg\r\nsdfg\r\nsdf g\r\nfds g\r\n', '2000px-No_Logo_logo1.png', '2000px-No_Logo_logo1.png', '', 'author', '2015-08-28 12:23:24', '2015-08-31 10:26:34', NULL, NULL, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `careers`
--

CREATE TABLE `careers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text,
  `created` datetime DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '1: Un-read, 2: Read, 3: Answer',
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `email`, `name`, `title`, `content`, `created`, `status`, `updated`) VALUES
(1, 'a', 'bc', 'adfdsaf', 'sdf sadfsda', '2015-08-28 13:28:36', 1, '2015-08-28 13:28:36');

-- --------------------------------------------------------

--
-- Table structure for table `family_structures`
--

CREATE TABLE `family_structures` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `health_insurrances`
--

CREATE TABLE `health_insurrances` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_name_kana` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name_kana` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_of_birth` int(11) NOT NULL,
  `day_of_birth` int(11) NOT NULL,
  `month_of_birth` int(11) NOT NULL,
  `year_of_birth` int(11) NOT NULL,
  `genre` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `married_status` int(11) NOT NULL,
  `family_structure` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `approved_round_id` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `first_name_kana`, `last_name_kana`, `email`, `password`, `date_of_birth`, `day_of_birth`, `month_of_birth`, `year_of_birth`, `genre`, `married_status`, `family_structure`, `created`, `updated`, `approved_round_id`) VALUES
(1, 'の管理', 'việt nam', 'first name Kana', 'last name kana', 'test@nal.vn', 'fcea920f7412b5da7be0cf42b8c93759', 100, 1, 1, 1990, 'male', 1, 1, '2015-08-27 15:00:45', '2015-08-27 15:00:45', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_address`
--

CREATE TABLE `user_address` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `residence` int(11) NOT NULL,
  `housing_costs` int(11) NOT NULL,
  `year_residence` int(11) NOT NULL,
  `month_residence` int(11) NOT NULL,
  `post_num` int(11) NOT NULL,
  `city` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `address_kana` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `home_phone` varchar(20) DEFAULT NULL,
  `day_phone` varchar(20) NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user_companies`
--

CREATE TABLE `user_companies` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_name_kana` varchar(255) NOT NULL,
  `company_post_num` varchar(20) NOT NULL,
  `company_city` varchar(255) NOT NULL,
  `compnay_address` varchar(255) NOT NULL,
  `company_address_kana` varchar(255) NOT NULL,
  `company_phone` varchar(20) NOT NULL,
  `company_phone_contact` varchar(20) NOT NULL,
  `company_type` int(11) NOT NULL,
  `company_department` varchar(255) NOT NULL,
  `company_position` varchar(255) NOT NULL,
  `company_year_working_num` int(11) NOT NULL,
  `company_month_working_num` int(11) NOT NULL,
  `tax_of_year` varchar(20) NOT NULL,
  `tax_of_month` varchar(20) NOT NULL,
  `salary_date` int(11) NOT NULL,
  `health_insurrance_type` int(11) NOT NULL,
  `working_status` int(11) NOT NULL,
  `note` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user_debts`
--

CREATE TABLE `user_debts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `is_dept` tinyint(1) NOT NULL DEFAULT '0',
  `number` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `money_per_month` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user_guardians`
--

CREATE TABLE `user_guardians` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `first_name_kana` varchar(255) NOT NULL,
  `last_name_kana` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_of_birth` int(11) NOT NULL,
  `day_of_birth` int(11) NOT NULL,
  `month_of_birth` int(11) NOT NULL,
  `year_of_birth` int(11) NOT NULL,
  `genre` varchar(6) NOT NULL,
  `married_status` int(11) NOT NULL,
  `family_structure` int(11) NOT NULL,
  `relationship_id` int(11) NOT NULL,
  `post_num` int(11) NOT NULL,
  `city` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `address_kana` varchar(255) NOT NULL,
  `year_residence` int(11) NOT NULL,
  `month_residence` int(11) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `home_phone` varchar(20) NOT NULL,
  `residence_status` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user_parkings`
--

CREATE TABLE `user_parkings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `license_plate` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user_relations`
--

CREATE TABLE `user_relations` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` int(11) NOT NULL,
  `date_of_ birth` int(11) NOT NULL,
  `day_of_birth` int(11) NOT NULL,
  `month_of_birth` int(11) NOT NULL,
  `year_of_birth` int(11) NOT NULL,
  `relate` varchar(255) NOT NULL,
  `address` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `approved_rounds`
--
ALTER TABLE `approved_rounds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `careers`
--
ALTER TABLE `careers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `family_structures`
--
ALTER TABLE `family_structures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `health_insurrances`
--
ALTER TABLE `health_insurrances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_address`
--
ALTER TABLE `user_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_companies`
--
ALTER TABLE `user_companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_debts`
--
ALTER TABLE `user_debts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_guardians`
--
ALTER TABLE `user_guardians`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_parkings`
--
ALTER TABLE `user_parkings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_relations`
--
ALTER TABLE `user_relations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT for table `approved_rounds`
--
ALTER TABLE `approved_rounds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT for table `careers`
--
ALTER TABLE `careers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT for table `family_structures`
--
ALTER TABLE `family_structures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `health_insurrances`
--
ALTER TABLE `health_insurrances`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT for table `user_address`
--
ALTER TABLE `user_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_companies`
--
ALTER TABLE `user_companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_debts`
--
ALTER TABLE `user_debts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_guardians`
--
ALTER TABLE `user_guardians`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_parkings`
--
ALTER TABLE `user_parkings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_relations`
--
ALTER TABLE `user_relations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;