-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Sep 07, 2015 at 09:09 AM
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`id`, `username`, `first_name`, `last_name`, `first_name_kana`, `last_name_kana`, `email`, `password`, `birthday`, `address`, `phone`, `last_login_ip`, `last_login_time`, `created`, `updated`) VALUES
(1, 'admin', 'administrator 1', 'moos 2', 'first name kana', 'last name kana', 'admin@moos.jp', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, NULL, NULL, NULL, '2015-08-29 05:28:51'),
(2, 'admin', 'administrator 1', 'moos', 'first name kana', 'last name kana', 'admin@moos.jp', '0192023a7bbd73250516f069df18b500', NULL, NULL, NULL, NULL, NULL, NULL, '2015-08-29 05:53:13'),
(3, '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '2015-09-01 10:11:27', '2015-09-01 10:11:27'),
(4, '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '2015-09-01 10:13:26', '2015-09-01 10:13:26');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `short_content`, `content`, `small_image`, `large_image`, `slug`, `author`, `created`, `updated`, `created_by`, `updated_by`, `is_published`, `view_count`) VALUES
(2, 'test news', 'short description', 'test\r\ntest\r\ntest test  ', NULL, NULL, '', NULL, '2015-08-28 12:23:09', '2015-08-28 12:23:09', NULL, NULL, 1, 0),
(3, 'fdsggsfdgsdf gsdf gsfd gg', '123', 'fdsfsgsd fg\r\nsdfg \r\nsdf \r\nsdfg\r\nsdfg\r\nsdf g\r\nfds g\r\n', '2000px-No_Logo_logo1.png', '2000px-No_Logo_logo1.png', '', 'author', '2015-08-28 12:23:24', '2015-08-31 10:26:34', NULL, NULL, 1, 0),
(4, 'aerwer f', 'ewrewr', 'ewr ưer', NULL, NULL, '', 'ewrewr', '2015-09-01 10:23:27', '2015-09-03 09:35:23', NULL, NULL, 1, 0);

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
  `description` text
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `description`) VALUES
(1, 'Tokyo', '0'),
(2, 'Kyoto', NULL);

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
(1, 'a', 'bc', 'adfdsaf', 'sdf sadfsda', '2015-08-28 13:28:36', 3, '2015-08-28 13:28:36');

-- --------------------------------------------------------

--
-- Table structure for table `family_structures`
--

CREATE TABLE `family_structures` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `family_structures`
--

INSERT INTO `family_structures` (`id`, `name`, `description`) VALUES
(1, 'test structure', NULL);

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
-- Table structure for table `married_statuses`
--

CREATE TABLE `married_statuses` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `married_statuses`
--

INSERT INTO `married_statuses` (`id`, `name`, `description`) VALUES
(1, 'Single', NULL),
(2, 'Married', NULL),
(3, 'Divorced', NULL);

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
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `age_of_birth` int(11) NOT NULL,
  `day_of_birth` int(11) NOT NULL,
  `month_of_birth` int(11) NOT NULL,
  `year_of_birth` int(11) NOT NULL,
  `genre` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `married_status_id` int(11) NOT NULL,
  `family_structure_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `status_id` int(11) NOT NULL DEFAULT '1',
  `user_address_id` int(11) DEFAULT NULL,
  `user_company_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `first_name_kana`, `last_name_kana`, `username`, `password`, `age_of_birth`, `day_of_birth`, `month_of_birth`, `year_of_birth`, `genre`, `married_status_id`, `family_structure_id`, `created`, `updated`, `status_id`, `user_address_id`, `user_company_id`) VALUES
(1, 'の管理', 'việt nam 1', 'first name Kana', 'last name kana', 'test@nal.vn', 'fcea920f7412b5da7be0cf42b8c93759', 100, 1, 1, 1990, 'male', 1, 1, '2015-08-27 15:00:45', '2015-09-01 10:14:22', 1, NULL, NULL),
(2, 'a', 'a', 'a', 'fds', '', '', 3, 0, 3, 2004, '', 0, 0, '2015-09-04 06:17:55', '2015-09-04 06:17:55', 1, NULL, NULL),
(3, 'a', 'a', 'a', 'fds', '', '', 3, 0, 3, 2004, '', 0, 0, '2015-09-04 06:18:03', '2015-09-04 06:18:03', 0, NULL, NULL),
(4, 'a', 'bc', 'aaa', 'bbbbccc', 'aaa_bbbbccc_4', '2e04b276f98363e990a500f2e1789588', 0, 4, 5, 2002, 'male', 2, 0, '2015-09-04 09:00:08', '2015-09-04 09:00:08', 2, NULL, NULL),
(5, 'a', 'bc', 'aaa', 'bbbbccc', 'aaa_bbbbccc_5', 'e10adc3949ba59abbe56e057f20f883e', 0, 4, 5, 2002, 'male', 2, 0, '2015-09-04 09:03:09', '2015-09-04 09:03:09', 2, NULL, NULL),
(6, 'test', 'test', 'test', 'test', '', '', 1996, 8, 6, 1996, 'male', 2, 0, '2015-09-05 04:53:45', '2015-09-05 04:53:45', 1, NULL, NULL),
(7, 'test 123', 'bc bc', 'test', 'bbbbccc', 'test_bbbbccc_7', 'e10adc3949ba59abbe56e057f20f883e', 2000, 8, 7, 2000, 'male', 2, 0, '2015-09-05 04:58:21', '2015-09-05 05:28:56', 2, 4, 4),
(8, 'test 123', 'bc', 'test', 'last name kana', '', '', 2000, 8, 7, 2000, 'male', 2, 0, '2015-09-05 05:25:20', '2015-09-05 05:25:20', 1, NULL, NULL),
(9, 'test 123', 'bc', 'test', 'last name kana', '', '', 2000, 8, 7, 2000, 'male', 2, 0, '2015-09-05 05:27:02', '2015-09-05 05:27:02', 1, NULL, NULL),
(10, 'abc', 'a', 'a', 'b', 'a_b_10', 'f0ad81c6d621ab9f09d235e4b0c06310', 1998, 5, 4, 1998, 'male', 1, 1, '2015-09-07 06:25:58', '2015-09-07 06:25:58', 2, 7, 7),
(11, 'test 123', 'việt nam 1', 'a', 'fds', 'a_fds_11', '348542685816e4be8a9dcf49e9ebb3ed', 2000, 3, 4, 2001, 'Female', 2, 1, '2015-09-07 06:32:46', '2015-09-07 06:32:46', 2, 8, 8);

-- --------------------------------------------------------

--
-- Table structure for table `user_addresses`
--

CREATE TABLE `user_addresses` (
  `id` int(11) NOT NULL,
  `residence_id` int(11) DEFAULT NULL,
  `housing_costs` int(11) DEFAULT NULL,
  `year_residence` int(11) DEFAULT NULL,
  `month_residence` int(11) DEFAULT NULL,
  `post_num` int(11) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `address_kana` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `home_phone` varchar(20) DEFAULT NULL,
  `day_phone` varchar(20) DEFAULT NULL,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_addresses`
--

INSERT INTO `user_addresses` (`id`, `residence_id`, `housing_costs`, `year_residence`, `month_residence`, `post_num`, `city`, `address`, `address_kana`, `email`, `phone`, `home_phone`, `day_phone`, `updated`) VALUES
(1, NULL, NULL, NULL, NULL, 12345, NULL, '34567', 'aaaa', 'dsfdsf@gmail.com', 'dfsdf', '23232', NULL, '2015-09-04 09:00:08'),
(2, NULL, NULL, NULL, NULL, 12345, NULL, '34567', 'aaaa', 'dsfdsf@gmail.com', 'dfsdf', '23232', NULL, '2015-09-04 09:03:09'),
(3, NULL, NULL, NULL, NULL, 123, NULL, 'sadf', 'asdf', 'dsfdsf@gmail.com', '0989834934', '051111111', NULL, '2015-09-05 04:53:45'),
(4, NULL, NULL, NULL, NULL, 123456, NULL, 'sadf Tokyo1', 'Tokyo 1', 'dsfdsf@gmail.com', '0989834934', '05114567899', NULL, '2015-09-05 05:28:56'),
(5, NULL, NULL, NULL, NULL, 123, NULL, 'sadf Tokyo', 'Tokyo', 'dsfdsf@gmail.com', '0989834934', '05114567899', NULL, '2015-09-05 05:25:20'),
(6, NULL, NULL, NULL, NULL, 123, NULL, 'sadf Tokyo', 'Tokyo', 'dsfdsf@gmail.com', '0989834934', '05114567899', NULL, '2015-09-05 05:27:02'),
(7, NULL, NULL, NULL, NULL, 123, NULL, '124 dfsf sfsdf', '124 dfsf sfsdf', 'dsfdsf@gmail.com', '0989834934', '05114567899', NULL, '2015-09-07 06:25:58'),
(8, NULL, NULL, NULL, NULL, 123123, NULL, '34567', 'saf', 'test@nal.vn', '0989834934', '', NULL, '2015-09-07 06:32:46');

-- --------------------------------------------------------

--
-- Table structure for table `user_companies`
--

CREATE TABLE `user_companies` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `name_kana` varchar(255) DEFAULT NULL,
  `post_num` varchar(20) DEFAULT NULL,
  `city_id` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `address_kana` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `phone_contact` varchar(20) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `year_worked` int(11) DEFAULT NULL,
  `month_worked` int(11) DEFAULT NULL,
  `tax_of_year` varchar(20) DEFAULT NULL,
  `tax_of_month` varchar(20) DEFAULT NULL,
  `salary_date` int(11) DEFAULT NULL,
  `health_insurrance_type` int(11) DEFAULT NULL,
  `working_status_id` int(11) DEFAULT NULL,
  `note` text
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_companies`
--

INSERT INTO `user_companies` (`id`, `name`, `name_kana`, `post_num`, `city_id`, `address`, `address_kana`, `phone`, `phone_contact`, `type`, `department`, `position`, `year_worked`, `month_worked`, `tax_of_year`, `tax_of_month`, `salary_date`, `health_insurrance_type`, `working_status_id`, `note`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2323, 3423432, NULL, '324324', NULL, NULL, NULL, NULL),
(2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2323, 3423432, NULL, '324324', NULL, NULL, NULL, NULL),
(3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 35, NULL, '1000', NULL, NULL, NULL, NULL),
(4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 122, 1223, NULL, '10000', NULL, NULL, NULL, NULL),
(5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12, 122, NULL, '1000', NULL, NULL, NULL, NULL),
(6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12, 122, NULL, '1000', NULL, NULL, NULL, NULL),
(7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10, 100, NULL, '1000', NULL, NULL, 3, NULL),
(8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2323, 100, NULL, '10000', NULL, NULL, 2, NULL);

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

-- --------------------------------------------------------

--
-- Table structure for table `working_statuses`
--

CREATE TABLE `working_statuses` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `working_statuses`
--

INSERT INTO `working_statuses` (`id`, `name`, `description`) VALUES
(1, 'No work', NULL),
(2, 'Full time', NULL),
(3, 'Part time', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
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
-- Indexes for table `married_statuses`
--
ALTER TABLE `married_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_addresses`
--
ALTER TABLE `user_addresses`
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
-- Indexes for table `working_statuses`
--
ALTER TABLE `working_statuses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `careers`
--
ALTER TABLE `careers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `family_structures`
--
ALTER TABLE `family_structures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `health_insurrances`
--
ALTER TABLE `health_insurrances`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `married_statuses`
--
ALTER TABLE `married_statuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `user_addresses`
--
ALTER TABLE `user_addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user_companies`
--
ALTER TABLE `user_companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
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
--
-- AUTO_INCREMENT for table `working_statuses`
--
ALTER TABLE `working_statuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;