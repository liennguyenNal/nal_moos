-- phpMyAdmin SQL Dump
-- version 4.4.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 29, 2015 at 10:54 AM
-- Server version: 5.5.41-MariaDB
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mooslive`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE IF NOT EXISTS `administrator` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `attachment_types`
--

CREATE TABLE IF NOT EXISTS `attachment_types` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `is_required` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `careers`
--

CREATE TABLE IF NOT EXISTS `careers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE IF NOT EXISTS `cities` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(11) NOT NULL,
  `code` varchar(20) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `first_name_kana` varchar(255) NOT NULL,
  `last_name_kana` varchar(255) NOT NULL,
  `company` varchar(255) DEFAULT NULL,
  `type` int(11) NOT NULL DEFAULT '1' COMMENT '1: normal; 2: media; 3: construction company; 4: Other ',
  `phone` varchar(30) NOT NULL,
  `content` text,
  `created` datetime DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '1: Un-read, 2: Read, 3: Answer',
  `updated` datetime DEFAULT NULL,
  `change_status_at` datetime DEFAULT NULL,
  `comment` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `expect_areas`
--

CREATE TABLE IF NOT EXISTS `expect_areas` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_num_1` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `post_num_2` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `pref_id` int(11) NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `guarantor_work_requireds`
--

CREATE TABLE IF NOT EXISTS `guarantor_work_requireds` (
  `id` int(11) NOT NULL,
  `work_id` int(11) NOT NULL,
  `company` tinyint(1) NOT NULL DEFAULT '0',
  `company_kana` int(11) NOT NULL DEFAULT '0',
  `company_post_num_1` tinyint(1) NOT NULL DEFAULT '0',
  `company_post_num_2` tinyint(1) NOT NULL DEFAULT '0',
  `company_pref_id` tinyint(1) NOT NULL DEFAULT '0',
  `company_city` tinyint(1) NOT NULL DEFAULT '0',
  `company_address` tinyint(1) NOT NULL DEFAULT '0',
  `company_phone` tinyint(1) NOT NULL DEFAULT '0',
  `company_fax` tinyint(1) NOT NULL DEFAULT '0',
  `career_id` tinyint(1) NOT NULL DEFAULT '0',
  `company_position` tinyint(1) NOT NULL DEFAULT '0',
  `company_department` tinyint(1) NOT NULL DEFAULT '0',
  `company_job_desc` tinyint(1) NOT NULL DEFAULT '0',
  `month_worked` int(11) NOT NULL DEFAULT '0',
  `year_worked` int(11) NOT NULL DEFAULT '0',
  `income_month` int(11) NOT NULL DEFAULT '0',
  `income_year` int(11) NOT NULL DEFAULT '0',
  `salary_receive_id` tinyint(1) NOT NULL DEFAULT '0',
  `salary_type` int(11) NOT NULL DEFAULT '0',
  `insurance_id` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `insurances`
--

CREATE TABLE IF NOT EXISTS `insurances` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `married_statuses`
--

CREATE TABLE IF NOT EXISTS `married_statuses` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prefs`
--

CREATE TABLE IF NOT EXISTS `prefs` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL COMMENT '都道府県名'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `residences`
--

CREATE TABLE IF NOT EXISTS `residences` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE IF NOT EXISTS `statuses` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `admin_status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_name_kana` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name_kana` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `age_of_birth` int(11) NOT NULL,
  `day_of_birth` int(11) NOT NULL,
  `month_of_birth` int(11) NOT NULL,
  `year_of_birth` int(11) NOT NULL,
  `gender` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `married_status_id` int(11) NOT NULL,
  `live_with_family` int(11) NOT NULL DEFAULT '1',
  `num_child` int(11) NOT NULL DEFAULT '0',
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `home_phone` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_type` int(11) DEFAULT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `status_id` int(11) NOT NULL DEFAULT '1',
  `user_partner_id` int(11) DEFAULT NULL,
  `user_address_id` int(11) DEFAULT NULL,
  `user_company_id` int(11) DEFAULT NULL,
  `last_login_ip` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_login_time` datetime DEFAULT NULL,
  `access_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `debt_count` int(11) DEFAULT NULL,
  `debt_total_value` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `debt_pay_per_month` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_guarantor_id` int(11) DEFAULT NULL,
  `need_more_guarantor` tinyint(1) NOT NULL DEFAULT '0',
  `other_guarantor_id` int(11) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `approved_register_date` datetime DEFAULT NULL,
  `approved_date` datetime DEFAULT NULL,
  `payment_date` datetime DEFAULT NULL,
  `max_payment` int(11) DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_addresses`
--

CREATE TABLE IF NOT EXISTS `user_addresses` (
  `id` int(11) NOT NULL,
  `residence_id` int(11) DEFAULT NULL,
  `housing_costs` varchar(20) DEFAULT NULL,
  `year_residence` int(11) DEFAULT NULL,
  `month_residence` int(11) DEFAULT NULL,
  `post_num_1` varchar(20) DEFAULT NULL,
  `post_num_2` varchar(20) DEFAULT NULL,
  `pref_id` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `address_kana` varchar(255) DEFAULT NULL,
  `house_name` varchar(255) DEFAULT NULL,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user_attachments`
--

CREATE TABLE IF NOT EXISTS `user_attachments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `attachment_type_id` int(11) NOT NULL,
  `file_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `full_path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_companies`
--

CREATE TABLE IF NOT EXISTS `user_companies` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `name_kana` varchar(255) DEFAULT NULL,
  `post_num_1` varchar(11) DEFAULT NULL,
  `post_num_2` varchar(11) DEFAULT NULL,
  `pref_id` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `house_name` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `fax` varchar(20) DEFAULT NULL,
  `career_id` int(11) DEFAULT NULL,
  `work_id` int(11) DEFAULT NULL,
  `description` text,
  `department` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `year_worked` int(11) DEFAULT NULL,
  `month_worked` int(11) DEFAULT NULL,
  `salary_type` varchar(255) DEFAULT NULL,
  `salary_type_other` varchar(255) DEFAULT NULL,
  `salary_year` varchar(20) DEFAULT NULL,
  `salary_month` varchar(20) DEFAULT NULL,
  `salary_receive_id` int(11) DEFAULT NULL,
  `salary_date` int(11) DEFAULT NULL,
  `insurance_id` int(11) DEFAULT NULL,
  `working_id` int(11) DEFAULT NULL,
  `note` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user_guarantors`
--

CREATE TABLE IF NOT EXISTS `user_guarantors` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_name_kana` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name_kana` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `home_phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `contact_type_id` int(11) NOT NULL,
  `post_num_1` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `post_num_2` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pref_id` int(11) NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `house_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `day_of_birth` int(11) NOT NULL,
  `month_of_birth` int(11) NOT NULL,
  `year_of_birth` int(11) NOT NULL,
  `num_child` int(11) NOT NULL DEFAULT '0',
  `married_status_id` int(11) DEFAULT NULL,
  `live_with_family` int(11) NOT NULL DEFAULT '0',
  `relate` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `year_residence` int(11) DEFAULT NULL,
  `residence_id` int(11) DEFAULT NULL,
  `housing_cost` int(11) DEFAULT NULL,
  `work_id` int(11) NOT NULL,
  `company` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company_kana` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company_post_num_1` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company_post_num_2` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company_pref_id` int(11) DEFAULT NULL,
  `company_city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company_house_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company_phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company_fax` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `career_id` int(11) DEFAULT NULL,
  `company_job_desc` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company_department` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company_position` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `month_worked` int(11) DEFAULT NULL,
  `year_worked` int(11) DEFAULT NULL,
  `salary_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `salary_type_other` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `income_month` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `income_year` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `salary_date` int(11) DEFAULT NULL,
  `salary_receive_id` int(11) DEFAULT NULL,
  `insurance_id` int(11) DEFAULT NULL,
  `note` text COLLATE utf8_unicode_ci,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_partners`
--

CREATE TABLE IF NOT EXISTS `user_partners` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `first_name_kana` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name_kana` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL,
  `day_of_birth` int(11) DEFAULT NULL,
  `month_of_birth` int(11) DEFAULT NULL,
  `year_of_birth` int(11) DEFAULT NULL,
  `work_id` int(11) DEFAULT NULL,
  `company` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company_kana` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company_post_num_1` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company_post_num_2` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company_pref_id` int(11) DEFAULT NULL,
  `company_city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company_house_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company_phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company_fax` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `career_id` int(11) DEFAULT NULL,
  `company_job_desc` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company_department` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company_position` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `month_worked` int(11) DEFAULT NULL,
  `year_worked` int(11) DEFAULT NULL,
  `salary_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `salary_type_other` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `income_month` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `income_year` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `salary_date` int(11) DEFAULT NULL,
  `salary_receive_id` int(11) DEFAULT NULL,
  `insurance_id` int(11) DEFAULT NULL,
  `note` text COLLATE utf8_unicode_ci,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_relations`
--

CREATE TABLE IF NOT EXISTS `user_relations` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `first_name_kana` varchar(255) DEFAULT NULL,
  `last_name_kana` varchar(255) DEFAULT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `day_of_birth` int(11) DEFAULT NULL,
  `month_of_birth` int(11) DEFAULT NULL,
  `year_of_birth` int(11) DEFAULT NULL,
  `relate` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `school` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `works`
--

CREATE TABLE IF NOT EXISTS `works` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `work_requireds`
--

CREATE TABLE IF NOT EXISTS `work_requireds` (
  `id` int(11) NOT NULL,
  `work_id` int(11) NOT NULL,
  `name` tinyint(1) NOT NULL DEFAULT '0',
  `name_kana` int(11) NOT NULL DEFAULT '0',
  `post_num_1` tinyint(1) NOT NULL DEFAULT '0',
  `post_num_2` tinyint(1) NOT NULL DEFAULT '0',
  `pref_id` tinyint(1) NOT NULL DEFAULT '0',
  `city` tinyint(1) NOT NULL DEFAULT '0',
  `address` tinyint(1) NOT NULL DEFAULT '0',
  `phone` tinyint(1) NOT NULL DEFAULT '0',
  `fax` tinyint(1) NOT NULL DEFAULT '0',
  `career_id` tinyint(1) NOT NULL DEFAULT '0',
  `position` tinyint(1) NOT NULL DEFAULT '0',
  `department` tinyint(1) NOT NULL DEFAULT '0',
  `description` tinyint(1) NOT NULL DEFAULT '0',
  `month_worked` int(11) NOT NULL DEFAULT '0',
  `year_worked` int(11) NOT NULL DEFAULT '0',
  `salary_month` int(11) NOT NULL DEFAULT '0',
  `salary_year` int(11) NOT NULL DEFAULT '0',
  `salary_receive_id` tinyint(1) NOT NULL DEFAULT '0',
  `salary_type` int(11) NOT NULL DEFAULT '0',
  `insurance_id` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `zipcodes`
--

CREATE TABLE IF NOT EXISTS `zipcodes` (
  `id` int(11) NOT NULL,
  `zipcode` varchar(7) DEFAULT NULL,
  `pref_id` int(11) DEFAULT NULL,
  `ward` varchar(255) DEFAULT NULL,
  `addr1` varchar(255) DEFAULT NULL,
  `addr2` varchar(255) DEFAULT NULL,
  `disable_flag` tinyint(4) DEFAULT '0',
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL
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
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attachment_types`
--
ALTER TABLE `attachment_types`
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
-- Indexes for table `expect_areas`
--
ALTER TABLE `expect_areas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `insurances`
--
ALTER TABLE `insurances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `married_statuses`
--
ALTER TABLE `married_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prefs`
--
ALTER TABLE `prefs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `residences`
--
ALTER TABLE `residences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_addresses`
--
ALTER TABLE `user_addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_attachments`
--
ALTER TABLE `user_attachments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_companies`
--
ALTER TABLE `user_companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_guarantors`
--
ALTER TABLE `user_guarantors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_partners`
--
ALTER TABLE `user_partners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_relations`
--
ALTER TABLE `user_relations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `works`
--
ALTER TABLE `works`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work_requireds`
--
ALTER TABLE `work_requireds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zipcodes`
--
ALTER TABLE `zipcodes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pref_id` (`pref_id`),
  ADD KEY `zipcode` (`zipcode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `attachment_types`
--
ALTER TABLE `attachment_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `expect_areas`
--
ALTER TABLE `expect_areas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `insurances`
--
ALTER TABLE `insurances`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `married_statuses`
--
ALTER TABLE `married_statuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `prefs`
--
ALTER TABLE `prefs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `residences`
--
ALTER TABLE `residences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_addresses`
--
ALTER TABLE `user_addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_attachments`
--
ALTER TABLE `user_attachments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_companies`
--
ALTER TABLE `user_companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_guarantors`
--
ALTER TABLE `user_guarantors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_partners`
--
ALTER TABLE `user_partners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_relations`
--
ALTER TABLE `user_relations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `works`
--
ALTER TABLE `works`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `work_requireds`
--
ALTER TABLE `work_requireds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `zipcodes`
--
ALTER TABLE `zipcodes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

ALTER TABLE `users`
  ADD `first_login` tinyint(1) AFTER `is_deleted`;
