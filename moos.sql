-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Aug 26, 2015 at 12:47 PM
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
  `firts_name` varchar(255) NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=ujis;

-- --------------------------------------------------------

--
-- Table structure for table `approved_rounds`
--

CREATE TABLE `approved_rounds` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=ujis;

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
  `is_publish` tinyint(1) NOT NULL DEFAULT '0',
  `view_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ujis;

-- --------------------------------------------------------

--
-- Table structure for table `careers`
--

CREATE TABLE `careers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=ujis;

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ujis;

-- --------------------------------------------------------

--
-- Table structure for table `family_structures`
--

CREATE TABLE `family_structures` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=ujis;

-- --------------------------------------------------------

--
-- Table structure for table `health_insurrances`
--

CREATE TABLE `health_insurrances` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=ujis;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `first_name_kana` varchar(255) NOT NULL,
  `last_name_kana` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_of_birth` int(11) NOT NULL,
  `day_of_birth` int(11) NOT NULL,
  `month_of_birth` int(11) NOT NULL,
  `year_of_birth` int(11) NOT NULL,
  `genre` varchar(6) NOT NULL,
  `married_status` int(11) NOT NULL,
  `family_structure` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `approved_round_id` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=ujis;

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
) ENGINE=InnoDB DEFAULT CHARSET=ujis;

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
) ENGINE=InnoDB DEFAULT CHARSET=ujis;

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
) ENGINE=InnoDB DEFAULT CHARSET=ujis;

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
) ENGINE=InnoDB DEFAULT CHARSET=ujis;

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
) ENGINE=InnoDB DEFAULT CHARSET=ujis;

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
) ENGINE=InnoDB DEFAULT CHARSET=ujis;

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
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
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