-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2018 at 02:19 AM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `usbong_store20180126structure`
--

-- --------------------------------------------------------

--
-- Table structure for table `auto_email`
--

CREATE TABLE `auto_email` (
  `auto_email_id` int(11) UNSIGNED NOT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'What subject would you like to place in the email?',
  `auto_email_template_id` int(11) UNSIGNED NOT NULL COMMENT 'What email template in table auto_email_template would you like to use?',
  `datetime` datetime NOT NULL COMMENT 'When was the email created?',
  `data_01` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'What template specific data would you like to use?',
  `data_02` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'What template specific data would you like to use?',
  `data_03` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'What template specific data would you like to use?',
  `data_04` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'What template specific data would you like to use?',
  `data_05` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'What template specific data would you like to use?'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auto_email_product`
--

CREATE TABLE `auto_email_product` (
  `auto_email_product_id` int(11) UNSIGNED NOT NULL,
  `auto_email_id` int(11) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auto_email_schedule`
--

CREATE TABLE `auto_email_schedule` (
  `auto_email_schedule_id` int(11) UNSIGNED NOT NULL,
  `auto_email_id` int(11) UNSIGNED NOT NULL,
  `start_customer_id` int(11) NOT NULL,
  `end_customer_id` int(11) NOT NULL,
  `start_datetime` datetime NOT NULL COMMENT 'If the current time is later than this, then this batch will be processed.',
  `status` enum('QUEUED','ACTIVE','PAUSED','ERROR','DONE') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auto_email_sent`
--

CREATE TABLE `auto_email_sent` (
  `auto_email_sent_id` int(11) UNSIGNED NOT NULL,
  `auto_email_schedule_id` int(11) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `datetime` datetime NOT NULL COMMENT 'If the current time is later than this, then this batch will be processed.',
  `status` enum('SENT','ERROR') COLLATE utf8_unicode_ci DEFAULT NULL,
  `error` mediumtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auto_email_setting`
--

CREATE TABLE `auto_email_setting` (
  `auto_email_setting_id` int(11) UNSIGNED NOT NULL,
  `attribute` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remarks` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auto_email_template`
--

CREATE TABLE `auto_email_template` (
  `auto_email_template_id` int(11) UNSIGNED NOT NULL,
  `view` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'What is the name of the view file to be used for this template?',
  `data_01_used` int(1) NOT NULL,
  `data_02_used` int(1) NOT NULL,
  `data_03_used` int(1) NOT NULL,
  `data_04_used` int(1) NOT NULL,
  `data_05_used` int(1) NOT NULL,
  `data_01_attribute` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data_02_attribute` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data_03_attribute` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data_04_attribute` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data_05_attribute` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Where in the assets/images/auto-email folder is the sample image stored?',
  `product_capacity` int(11) NOT NULL,
  `data_01_type` enum('image','text','textarea') COLLATE utf8_unicode_ci DEFAULT 'text',
  `data_02_type` enum('image','text','textarea') COLLATE utf8_unicode_ci DEFAULT 'text',
  `data_03_type` enum('image','text','textarea') COLLATE utf8_unicode_ci DEFAULT 'text',
  `data_04_type` enum('image','text','textarea') COLLATE utf8_unicode_ci DEFAULT 'text',
  `data_05_type` enum('image','text','textarea') COLLATE utf8_unicode_ci DEFAULT 'text'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auto_email_unsubscribe`
--

CREATE TABLE `auto_email_unsubscribe` (
  `customer_id` int(11) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='customer_ids placed in this table do not want to receive emails.';

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `customer_order_id` int(11) DEFAULT NULL,
  `quantity` int(6) NOT NULL,
  `price` int(6) NOT NULL,
  `added_datetime_stamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `purchased_datetime_stamp` datetime NOT NULL,
  `removed_datetime_stamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contact_case`
--

CREATE TABLE `contact_case` (
  `contact_case_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `contact_case_first_name` varchar(20) NOT NULL,
  `contact_case_last_name` varchar(20) NOT NULL,
  `contact_case_email_address` varchar(30) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `added_datetime_stamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `contact_case_type_id` tinyint(4) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contact_case_type`
--

CREATE TABLE `contact_case_type` (
  `contact_case_type_id` tinyint(4) NOT NULL,
  `contact_case_type_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_first_name` varchar(16) DEFAULT NULL,
  `customer_last_name` varchar(16) DEFAULT NULL,
  `customer_email_address` varchar(30) DEFAULT NULL,
  `customer_password` varchar(250) DEFAULT NULL,
  `customer_contact_number` char(16) DEFAULT NULL,
  `customer_shipping_address` text,
  `customer_city` text,
  `customer_country` text,
  `customer_postal_code` int(11) DEFAULT NULL,
  `mode_of_payment_id` tinyint(1) NOT NULL DEFAULT '0',
  `is_admin` tinyint(4) NOT NULL DEFAULT '0',
  `merchant_id` int(11) NOT NULL DEFAULT '0',
  `last_logged_in_datetime_stamp` datetime DEFAULT NULL,
  `last_logged_out_datetime_stamp` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer_order`
--

CREATE TABLE `customer_order` (
  `customer_order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `added_datetime_stamp` datetime NOT NULL,
  `quantity` int(11) NOT NULL,
  `status_accepted` tinyint(1) NOT NULL DEFAULT '0',
  `order_total_price` int(11) NOT NULL,
  `order_total_discount` int(11) NOT NULL DEFAULT '0',
  `fulfilled_status` tinyint(4) NOT NULL DEFAULT '0',
  `customer_shipping_address` text,
  `customer_city` text,
  `customer_country` text,
  `customer_postal_code` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer_request`
--

CREATE TABLE `customer_request` (
  `customer_request_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `added_datetime_stamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `product_name` text NOT NULL,
  `product_link` text NOT NULL,
  `product_type` tinyint(1) NOT NULL DEFAULT '1',
  `quantity` int(11) NOT NULL,
  `request_total_budget` int(11) NOT NULL,
  `comments` text NOT NULL,
  `fulfilled_status` tinyint(4) NOT NULL DEFAULT '0',
  `fulfilled_datetime_stamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer_sell`
--

CREATE TABLE `customer_sell` (
  `customer_sell_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `added_datetime_stamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `product_name` text NOT NULL,
  `product_image_link` text NOT NULL,
  `product_type` tinyint(1) NOT NULL DEFAULT '1',
  `quantity` int(11) NOT NULL,
  `sell_total_cost` int(11) NOT NULL,
  `comments` text NOT NULL,
  `fulfilled_datetime_stamp` datetime NOT NULL,
  `fulfilled_status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fields`
--

CREATE TABLE `fields` (
  `fields_id` int(11) NOT NULL,
  `fields_name` varchar(30) NOT NULL,
  `product_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `merchant`
--

CREATE TABLE `merchant` (
  `merchant_id` int(11) NOT NULL,
  `merchant_name` varchar(50) NOT NULL,
  `merchant_motto` varchar(50) DEFAULT NULL,
  `merchant_motto_font_color` varchar(8) NOT NULL DEFAULT '#6f5630'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `merchant_product_type`
--

CREATE TABLE `merchant_product_type` (
  `merchant_product_type_id` int(11) NOT NULL,
  `merchant_id` int(11) NOT NULL,
  `product_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mode_of_payment`
--

CREATE TABLE `mode_of_payment` (
  `mode_of_payment_id` tinyint(1) NOT NULL,
  `mode_of_payment_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `merchant_id` int(11) NOT NULL,
  `product_type_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `previous_price` varchar(30) DEFAULT NULL,
  `language` varchar(50) DEFAULT 'English',
  `author` varchar(50) DEFAULT NULL,
  `supplier` varchar(30) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `image_location` varchar(30) DEFAULT NULL,
  `format` varchar(10) DEFAULT NULL,
  `quantity_in_stock` int(11) NOT NULL,
  `translator` varchar(50) DEFAULT NULL,
  `product_overview` text,
  `pages` int(11) DEFAULT NULL,
  `product_view_num` int(11) NOT NULL DEFAULT '0',
  `quantity_sold` int(11) NOT NULL DEFAULT '0',
  `external_url` text,
  `show` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product_type`
--

CREATE TABLE `product_type` (
  `product_type_id` int(11) NOT NULL,
  `product_type_name` varchar(30) NOT NULL,
  `product_type_view_num` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `search`
--

CREATE TABLE `search` (
  `search_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `searched_item` varchar(512) NOT NULL,
  `added_datetime_stamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auto_email`
--
ALTER TABLE `auto_email`
  ADD PRIMARY KEY (`auto_email_id`),
  ADD KEY `auto_email_fk_auto_email_template_id` (`auto_email_template_id`);

--
-- Indexes for table `auto_email_product`
--
ALTER TABLE `auto_email_product`
  ADD PRIMARY KEY (`auto_email_product_id`),
  ADD KEY `auto_email_product_fk_auto_email_id` (`auto_email_id`),
  ADD KEY `auto_email_product_fk_product_id` (`product_id`);

--
-- Indexes for table `auto_email_schedule`
--
ALTER TABLE `auto_email_schedule`
  ADD PRIMARY KEY (`auto_email_schedule_id`),
  ADD KEY `auto_email_schedule_fk_auto_email_id` (`auto_email_id`),
  ADD KEY `auto_email_schedule_fk_start_customer_id` (`start_customer_id`),
  ADD KEY `auto_email_schedule_fk_end_customer_id` (`end_customer_id`);

--
-- Indexes for table `auto_email_sent`
--
ALTER TABLE `auto_email_sent`
  ADD PRIMARY KEY (`auto_email_sent_id`),
  ADD UNIQUE KEY `auto_email_sent_unique_auto_email_schedule_cross_customer` (`auto_email_schedule_id`,`customer_id`),
  ADD KEY `auto_email_sent_fk_start_customer_id` (`customer_id`),
  ADD KEY `auto_email_sent_fk_auto_email_schedule_id` (`auto_email_schedule_id`);

--
-- Indexes for table `auto_email_setting`
--
ALTER TABLE `auto_email_setting`
  ADD PRIMARY KEY (`auto_email_setting_id`);

--
-- Indexes for table `auto_email_template`
--
ALTER TABLE `auto_email_template`
  ADD PRIMARY KEY (`auto_email_template_id`);

--
-- Indexes for table `auto_email_unsubscribe`
--
ALTER TABLE `auto_email_unsubscribe`
  ADD PRIMARY KEY (`customer_id`),
  ADD KEY `auto_email_unsubscribe_fk_customer_id` (`customer_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `customer_order_id` (`customer_order_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD KEY `mode_of_payment_id` (`mode_of_payment_id`);

--
-- Indexes for table `customer_order`
--
ALTER TABLE `customer_order`
  ADD PRIMARY KEY (`customer_order_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `customer_request`
--
ALTER TABLE `customer_request`
  ADD PRIMARY KEY (`customer_request_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `customer_sell`
--
ALTER TABLE `customer_sell`
  ADD PRIMARY KEY (`customer_sell_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `fields`
--
ALTER TABLE `fields`
  ADD PRIMARY KEY (`fields_id`),
  ADD KEY `product_type_id` (`product_type_id`);

--
-- Indexes for table `merchant`
--
ALTER TABLE `merchant`
  ADD PRIMARY KEY (`merchant_id`);

--
-- Indexes for table `merchant_product_type`
--
ALTER TABLE `merchant_product_type`
  ADD PRIMARY KEY (`merchant_product_type_id`),
  ADD KEY `merchant_id` (`merchant_id`),
  ADD KEY `product_type_id` (`product_type_id`);

--
-- Indexes for table `mode_of_payment`
--
ALTER TABLE `mode_of_payment`
  ADD PRIMARY KEY (`mode_of_payment_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `merchant_id` (`merchant_id`),
  ADD KEY `product_type_id` (`product_type_id`);

--
-- Indexes for table `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`product_type_id`);

--
-- Indexes for table `search`
--
ALTER TABLE `search`
  ADD PRIMARY KEY (`search_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auto_email`
--
ALTER TABLE `auto_email`
  MODIFY `auto_email_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `auto_email_product`
--
ALTER TABLE `auto_email_product`
  MODIFY `auto_email_product_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;
--
-- AUTO_INCREMENT for table `auto_email_schedule`
--
ALTER TABLE `auto_email_schedule`
  MODIFY `auto_email_schedule_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `auto_email_sent`
--
ALTER TABLE `auto_email_sent`
  MODIFY `auto_email_sent_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `auto_email_setting`
--
ALTER TABLE `auto_email_setting`
  MODIFY `auto_email_setting_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `auto_email_template`
--
ALTER TABLE `auto_email_template`
  MODIFY `auto_email_template_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `customer_order`
--
ALTER TABLE `customer_order`
  MODIFY `customer_order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `customer_request`
--
ALTER TABLE `customer_request`
  MODIFY `customer_request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `customer_sell`
--
ALTER TABLE `customer_sell`
  MODIFY `customer_sell_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fields`
--
ALTER TABLE `fields`
  MODIFY `fields_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `merchant`
--
ALTER TABLE `merchant`
  MODIFY `merchant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `merchant_product_type`
--
ALTER TABLE `merchant_product_type`
  MODIFY `merchant_product_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `mode_of_payment`
--
ALTER TABLE `mode_of_payment`
  MODIFY `mode_of_payment_id` tinyint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=428;
--
-- AUTO_INCREMENT for table `product_type`
--
ALTER TABLE `product_type`
  MODIFY `product_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `search`
--
ALTER TABLE `search`
  MODIFY `search_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `auto_email`
--
ALTER TABLE `auto_email`
  ADD CONSTRAINT `auto_email_fk_auto_email_template_id` FOREIGN KEY (`auto_email_template_id`) REFERENCES `auto_email_template` (`auto_email_template_id`) ON UPDATE CASCADE;

--
-- Constraints for table `auto_email_product`
--
ALTER TABLE `auto_email_product`
  ADD CONSTRAINT `auto_email_product_fk_auto_email_id` FOREIGN KEY (`auto_email_id`) REFERENCES `auto_email` (`auto_email_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auto_email_product_fk_product_id` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON UPDATE CASCADE;

--
-- Constraints for table `auto_email_schedule`
--
ALTER TABLE `auto_email_schedule`
  ADD CONSTRAINT `auto_email_schedule_fk_auto_email_id` FOREIGN KEY (`auto_email_id`) REFERENCES `auto_email` (`auto_email_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auto_email_schedule_fk_end_customer_id` FOREIGN KEY (`end_customer_id`) REFERENCES `customer` (`customer_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `auto_email_schedule_fk_start_customer_id` FOREIGN KEY (`start_customer_id`) REFERENCES `customer` (`customer_id`) ON UPDATE CASCADE;

--
-- Constraints for table `auto_email_sent`
--
ALTER TABLE `auto_email_sent`
  ADD CONSTRAINT `auto_email_sent_fk_auto_email_schedule_id` FOREIGN KEY (`auto_email_schedule_id`) REFERENCES `auto_email_schedule` (`auto_email_schedule_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auto_email_sent_fk_customer_id` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON UPDATE CASCADE;

--
-- Constraints for table `auto_email_unsubscribe`
--
ALTER TABLE `auto_email_unsubscribe`
  ADD CONSTRAINT `auto_email_unsubscribe_fk_customer_id` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`),
  ADD CONSTRAINT `cart_ibfk_3` FOREIGN KEY (`customer_order_id`) REFERENCES `customer_order` (`customer_order_id`);

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`mode_of_payment_id`) REFERENCES `mode_of_payment` (`mode_of_payment_id`);

--
-- Constraints for table `customer_order`
--
ALTER TABLE `customer_order`
  ADD CONSTRAINT `customer_order_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`);

--
-- Constraints for table `customer_request`
--
ALTER TABLE `customer_request`
  ADD CONSTRAINT `customer_request_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`);

--
-- Constraints for table `fields`
--
ALTER TABLE `fields`
  ADD CONSTRAINT `fields_ibfk_1` FOREIGN KEY (`product_type_id`) REFERENCES `product_type` (`product_type_id`);

--
-- Constraints for table `merchant_product_type`
--
ALTER TABLE `merchant_product_type`
  ADD CONSTRAINT `merchant_product_type_ibfk_1` FOREIGN KEY (`merchant_id`) REFERENCES `merchant` (`merchant_id`),
  ADD CONSTRAINT `merchant_product_type_ibfk_2` FOREIGN KEY (`product_type_id`) REFERENCES `product_type` (`product_type_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`merchant_id`) REFERENCES `merchant` (`merchant_id`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`product_type_id`) REFERENCES `product_type` (`product_type_id`);

--
-- Constraints for table `search`
--
ALTER TABLE `search`
  ADD CONSTRAINT `search_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
