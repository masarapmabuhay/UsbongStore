-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2017 at 02:14 PM
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
-- Database: `usbong_store20170906`
--

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
  `removed_datetime_stamp` datetime NOT NULL,
  `fulfilled_status` tinyint(4) NOT NULL DEFAULT '0'
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
  `customer_contact_number` int(16) DEFAULT NULL,
  `customer_shipping_address` text,
  `customer_city` text,
  `customer_country` text,
  `customer_postal_code` int(11) DEFAULT NULL,
  `mode_of_payment_id` tinyint(1) NOT NULL DEFAULT '0',
  `is_admin` tinyint(4) NOT NULL DEFAULT '0',
  `merchant_id` int(11) NOT NULL DEFAULT '0'
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
  `fulfilled_status` tinyint(4) NOT NULL DEFAULT '0'
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
  `comments` text NOT NULL
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
  `comments` text NOT NULL
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
  `language` varchar(20) DEFAULT 'English',
  `author` varchar(50) DEFAULT NULL,
  `supplier` varchar(30) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `image_location` varchar(30) DEFAULT NULL,
  `format` varchar(10) DEFAULT NULL,
  `quantity_in_stock` int(11) NOT NULL,
  `translator` varchar(50) DEFAULT NULL,
  `product_overview` text,
  `pages` int(11) DEFAULT NULL,
  `product_view_num` int(11) NOT NULL DEFAULT '0'
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
  ADD KEY `mode_of_payment_id` (`mode_of_payment_id`),
  ADD KEY `merchant_id` (`merchant_id`);

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
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `customer_order`
--
ALTER TABLE `customer_order`
  MODIFY `customer_order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `customer_request`
--
ALTER TABLE `customer_request`
  MODIFY `customer_request_id` int(11) NOT NULL AUTO_INCREMENT;
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
  MODIFY `merchant_product_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `mode_of_payment`
--
ALTER TABLE `mode_of_payment`
  MODIFY `mode_of_payment_id` tinyint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;
--
-- AUTO_INCREMENT for table `product_type`
--
ALTER TABLE `product_type`
  MODIFY `product_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `search`
--
ALTER TABLE `search`
  MODIFY `search_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

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
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`mode_of_payment_id`) REFERENCES `mode_of_payment` (`mode_of_payment_id`),
  ADD CONSTRAINT `customer_ibfk_2` FOREIGN KEY (`merchant_id`) REFERENCES `merchant` (`merchant_id`);

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
