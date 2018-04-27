-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2017 at 02:46 AM
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
-- Database: `usbong_store`
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

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `product_id`, `customer_id`, `customer_order_id`, `quantity`, `price`, `added_datetime_stamp`, `purchased_datetime_stamp`, `removed_datetime_stamp`, `fulfilled_status`) VALUES
(1, 129, 1, 1, 1, 125, '2017-09-23 13:57:40', '2017-09-23 13:58:18', '0000-00-00 00:00:00', 0),
(2, 131, 1, 2, 1, 180, '2017-09-23 13:59:06', '2017-09-23 14:05:42', '0000-00-00 00:00:00', 0),
(3, 131, 1, 2, 1, 180, '2017-09-23 14:05:12', '2017-09-23 14:05:42', '0000-00-00 00:00:00', 0),
(4, 132, 1, 3, 1, 296, '2017-09-23 14:06:06', '2017-09-23 14:06:15', '0000-00-00 00:00:00', 0),
(5, 65, 1, 3, 1, 500, '2017-09-23 14:06:10', '2017-09-23 14:06:15', '0000-00-00 00:00:00', 0),
(6, 132, 1, 4, 1, 296, '2017-09-23 14:13:48', '2017-09-23 14:13:59', '0000-00-00 00:00:00', 0),
(7, 131, 1, 4, 1, 180, '2017-09-23 14:13:55', '2017-09-23 14:13:59', '0000-00-00 00:00:00', 0),
(8, 129, 1, 5, 1, 125, '2017-09-23 14:14:40', '2017-09-23 14:14:52', '0000-00-00 00:00:00', 0),
(9, 207, 1, 5, 1, 196, '2017-09-23 14:14:45', '2017-09-23 14:14:52', '0000-00-00 00:00:00', 0),
(10, 140, 1, 5, 1, 158, '2017-09-23 14:14:49', '2017-09-23 14:14:52', '0000-00-00 00:00:00', 0),
(11, 131, 1, 6, 1, 180, '2017-09-23 14:15:21', '2017-09-23 14:15:33', '0000-00-00 00:00:00', 0),
(12, 132, 1, 6, 1, 296, '2017-09-23 14:15:26', '2017-09-23 14:15:33', '0000-00-00 00:00:00', 0),
(13, 155, 1, 6, 1, 96, '2017-09-23 14:15:30', '2017-09-23 14:15:33', '0000-00-00 00:00:00', 0),
(14, 106, 3, 7, 1, 180, '2017-09-27 08:18:07', '2017-09-27 08:37:27', '0000-00-00 00:00:00', 0),
(15, 235, 3, 7, 1, 500, '2017-09-27 08:37:10', '2017-09-27 08:37:27', '0000-00-00 00:00:00', 0),
(16, 140, 3, 7, 1, 158, '2017-09-27 08:37:20', '2017-09-27 08:37:27', '0000-00-00 00:00:00', 0),
(17, 65, 3, 8, 1, 500, '2017-09-29 14:20:07', '2017-09-29 14:21:33', '0000-00-00 00:00:00', 0),
(18, 65, 1, 9, 2, 500, '2017-10-09 14:11:52', '2017-10-09 14:11:57', '0000-00-00 00:00:00', 0),
(19, 274, 1, 10, 1, 450, '2017-10-09 14:12:29', '2017-10-09 14:12:38', '0000-00-00 00:00:00', 0),
(20, 117, 1, 10, 1, 300, '2017-10-09 14:12:35', '2017-10-09 14:12:38', '0000-00-00 00:00:00', 0),
(21, 238, 1, NULL, 0, 500, '2017-10-09 14:18:02', '0000-00-00 00:00:00', '2017-11-17 14:15:49', 0),
(22, 209, 4, 11, 1, 500, '2017-10-10 12:38:06', '2017-10-10 12:38:23', '0000-00-00 00:00:00', 0),
(23, 235, 3, 12, 1, 500, '2017-10-11 17:21:53', '2017-10-11 17:22:05', '0000-00-00 00:00:00', 0),
(24, 210, 3, NULL, 0, 400, '2017-10-11 20:36:44', '0000-00-00 00:00:00', '2017-10-12 08:29:07', 0),
(25, 210, 3, NULL, 0, 122, '2017-10-12 08:05:32', '0000-00-00 00:00:00', '2017-10-12 08:29:07', 0),
(26, 235, 3, 13, 1, 500, '2017-10-12 08:28:48', '2017-10-12 12:48:58', '0000-00-00 00:00:00', 0),
(27, 65, 3, 13, 1, 500, '2017-10-12 12:48:52', '2017-10-12 12:48:58', '0000-00-00 00:00:00', 0),
(28, 236, 3, NULL, 1, 420, '2017-10-19 14:43:41', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(29, 235, 1, NULL, 0, 500, '2017-10-21 20:16:31', '0000-00-00 00:00:00', '2017-10-21 20:16:35', 0),
(30, 235, 1, 14, 1, 500, '2017-11-17 14:15:46', '2017-11-17 14:15:51', '0000-00-00 00:00:00', 0),
(31, 235, 1, 15, 1, 500, '2017-11-17 14:16:04', '2017-11-17 14:16:08', '0000-00-00 00:00:00', 0),
(32, 65, 1, 16, 1, 500, '2017-11-17 14:20:45', '2017-11-17 14:20:54', '0000-00-00 00:00:00', 0),
(33, 274, 1, 16, 1, 450, '2017-11-17 14:20:49', '2017-11-17 14:20:54', '0000-00-00 00:00:00', 0),
(34, 235, 1, 17, 1, 500, '2017-11-17 17:18:51', '2017-11-17 17:19:18', '0000-00-00 00:00:00', 0),
(35, 312, 1, 17, 1, 400, '2017-11-17 17:18:54', '2017-11-17 17:19:18', '0000-00-00 00:00:00', 0),
(36, 65, 1, 18, 1, 500, '2017-11-17 17:19:59', '2017-11-17 17:20:27', '0000-00-00 00:00:00', 0),
(37, 274, 1, 18, 1, 450, '2017-11-17 17:20:02', '2017-11-17 17:20:27', '0000-00-00 00:00:00', 0),
(38, 274, 1, 19, 1, 450, '2017-11-17 17:29:51', '2017-11-17 17:30:00', '0000-00-00 00:00:00', 0),
(39, 209, 1, 19, 1, 500, '2017-11-17 17:29:55', '2017-11-17 17:30:00', '0000-00-00 00:00:00', 0),
(40, 236, 1, 20, 2, 420, '2017-11-17 17:30:53', '2017-11-17 17:30:59', '0000-00-00 00:00:00', 0),
(41, 336, 1, 21, 1, 320, '2017-11-17 19:11:32', '2017-11-17 19:11:35', '0000-00-00 00:00:00', 0);

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

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_first_name`, `customer_last_name`, `customer_email_address`, `customer_password`, `customer_contact_number`, `customer_shipping_address`, `customer_city`, `customer_country`, `customer_postal_code`, `mode_of_payment_id`, `is_admin`, `merchant_id`, `last_logged_in_datetime_stamp`, `last_logged_out_datetime_stamp`) VALUES
(-1, 'n/a', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL),
(1, 'abc', 'def', 'usbong.ph@gmail.com', '$2y$10$sJ172qJOmDLBy60.nhp81OoDBQzSmi/aHcvJxJSQh5IJfx844Ec6i', '1234567', '2 E. Rodriguez Ave. Sto. Niño', 'Marikina City', 'Philippines', 1800, 0, 1, 0, '2017-12-25 15:39:03', '2017-12-16 14:48:39'),
(3, 'Usbong', 'Mart', 'support@usbong.ph', '$2y$10$WD6CJTicdUiWuptZXX4cT.CQVwQQe.qsQ9offPBLKU.jUYWnkSDWC', '7894561', '2 E. Rodriguez Ave. Sto. Niño', 'Marikina City', 'Philippines', 1800, 2, 0, 4, '2017-11-18 11:18:31', '2017-11-16 09:47:28'),
(4, 'M', 'S', 'help@usbong.ph', '$2y$10$xqixUcO58M71QM4.eG.bvOkebw/gj/LOR7VbBrsdNyDFNQ/I2KSqC', '1234567', '2 E. Rodriguez Ave. Sto. Niño', 'Marikina City', 'Philippines', 1800, 2, 0, 0, NULL, NULL),
(5, 'A', 'Z', 'learn@usbong.ph', '$2y$10$OHtrmYEeLXs5npFy5oBXue4YxA.PN3bLSHBMYaPy67h04w9hIDaoG', NULL, NULL, NULL, NULL, NULL, 0, 0, 1, '2017-11-18 11:18:15', '2017-11-18 11:18:22'),
(6, 'a', 'z', 'az@usbong.ph', '$2y$10$9rKaLwedQY8EkLqpyl7H9uTeRIpIF9m1KsJvpK0cOBR7o7J2LTzDu', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, '2017-11-14 12:39:49', NULL),
(7, 'z', 'a', 'za@usbong.ph', '$2y$10$Hkuqpmupo0SXlc1iARDooe3TB9AzlfILJq5TDMFqtSEKLI3LY.osy', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, '2017-11-14 12:45:15', NULL),
(8, 'b', 'b', 'b@usbong.ph', '$2y$10$p3JAa3nM/ZmXiUu5WIOfOuTt75BuO/YXK1dih5Rtl2SxsCyHOQKke', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, '2017-11-14 12:46:10', NULL),
(10, 'Usbong', 'Apply', 'apply@usbong.ph', '$2y$10$sJ172qJOmDLBy60.nhp81OoDBQzSmi/aHcvJxJSQh5IJfx844Ec6i', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, '2017-12-25 15:38:31', '2017-12-25 15:38:33');

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

--
-- Dumping data for table `customer_order`
--

INSERT INTO `customer_order` (`customer_order_id`, `customer_id`, `added_datetime_stamp`, `quantity`, `status_accepted`, `order_total_price`, `order_total_discount`, `fulfilled_status`, `customer_shipping_address`, `customer_city`, `customer_country`, `customer_postal_code`) VALUES
(1, 1, '2017-09-23 13:58:18', 1, 1, 125, 70, 0, '2 E. Rodriguez Ave. Sto. Niño', 'Marikina City', 'Philippines', 1800),
(2, 1, '2017-09-23 14:05:42', 2, 1, 360, 140, 0, '2 E. Rodriguez Ave. Sto. Niño', 'Marikina City', 'Philippines', 1800),
(3, 1, '2017-09-23 14:06:15', 2, 1, 796, 140, 0, '2 E. Rodriguez Ave. Sto. Niño', 'Marikina City', 'Philippines', 1800),
(4, 1, '2017-09-23 14:13:59', 2, 1, 476, 140, 0, '2 E. Rodriguez Ave. Sto. Niño', 'Marikina City', 'Philippines', 1800),
(5, 1, '2017-09-23 14:14:52', 3, 1, 479, 210, 1, '2 E. Rodriguez Ave. Sto. Niño', 'Marikina City', 'Philippines', 1800),
(6, 1, '2017-09-23 14:15:33', 3, 1, 572, 210, 1, '2 E. Rodriguez Ave. Sto. Niño', 'Marikina City', 'Philippines', 1800),
(7, 3, '2017-09-27 08:37:27', 3, 1, 838, 140, 0, 'abc', 'Marikina City', 'Philippines', 1800),
(8, 3, '2017-09-29 14:21:33', 1, 1, 500, 70, 0, '2 E. Rodriguez Ave. Sto. Niño', 'Marikina City', 'Philippines', 1800),
(9, 1, '2017-10-09 14:11:57', 2, 1, 1000, 140, 0, '2 E. Rodriguez Ave. Sto. Niño', 'Marikina City', 'Philippines', 1800),
(10, 1, '2017-10-09 14:12:38', 2, 1, 750, 140, 0, '2 E. Rodriguez Ave. Sto. Niño', 'Marikina City', 'Philippines', 1800),
(11, 4, '2017-10-10 12:38:23', 1, 1, 500, 70, 0, '2 E. Rodriguez Ave. Sto. Niño', 'Marikina City', 'Philippines', 1800),
(12, 3, '2017-10-11 17:22:05', 1, 1, 500, 70, 0, '2 E. Rodriguez Ave. Sto. Niño', 'Marikina City', 'Philippines', 1800),
(13, 3, '2017-10-12 12:48:58', 2, 1, 1000, 140, 1, '2 E. Rodriguez Ave. Sto. Niño', 'Marikina City', 'Philippines', 1800),
(14, 1, '2017-11-17 14:15:51', 1, 1, 500, 70, 0, '2 E. Rodriguez Ave. Sto. Niño', 'Marikina City', 'Philippines', 1800),
(15, 1, '2017-11-17 14:16:08', 1, 1, 500, 70, 0, '2 E. Rodriguez Ave. Sto. Niño', 'Marikina City', 'Philippines', 1800),
(16, 1, '2017-11-17 14:20:54', 2, 1, 950, 140, 0, '2 E. Rodriguez Ave. Sto. Niño', 'Marikina City', 'Philippines', 1800),
(17, 1, '2017-11-17 17:19:18', 2, 1, 900, 140, 0, '2 E. Rodriguez Ave. Sto. Niño', 'Marikina City', 'Philippines', 1800),
(18, 1, '2017-11-17 17:20:27', 2, 1, 950, 140, 0, '2 E. Rodriguez Ave. Sto. Niño', 'Marikina City', 'Philippines', 1800),
(19, 1, '2017-11-17 17:30:00', 2, 1, 950, 140, 0, '2 E. Rodriguez Ave. Sto. Niño', 'Marikina City', 'Philippines', 1800),
(20, 1, '2017-11-17 17:30:59', 2, 1, 840, 140, 0, '2 E. Rodriguez Ave. Sto. Niño', 'Marikina City', 'Philippines', 1800),
(21, 1, '2017-11-17 19:11:35', 1, 1, 320, 70, 0, '2 E. Rodriguez Ave. Sto. Niño', 'Marikina City', 'Philippines', 1800);

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

--
-- Dumping data for table `customer_request`
--

INSERT INTO `customer_request` (`customer_request_id`, `customer_id`, `added_datetime_stamp`, `product_name`, `product_link`, `product_type`, `quantity`, `request_total_budget`, `comments`, `fulfilled_status`, `fulfilled_datetime_stamp`) VALUES
(1, 1, '2017-10-26 09:29:09', 'Hello', 'https://www.amazon.com/gp/product/0765364883/ref=s9u_simh_gw_i1?ie=UTF8&fpl=fresh&pd_rd_i=0765364883&pd_rd_r=AE7GQJWM2ZECGYZXNTK1&pd_rd_w=l4pdt&pd_rd_wg=3jxtz&pf_rd_m=ATVPDKIKX0DER&pf_rd_s=&pf_rd_r=F772MNHHTNKSBPE0Q4XA&pf_rd_t=36701&pf_rd_p=1cf9d009-399c-49e1-901a-7b8786e59436&pf_rd_i=desktop', 1, 1, 500, 'Thank you!', 1, '2017-10-27 14:16:48'),
(2, 1, '2017-10-27 14:22:44', 'hey', 'http://usbong.ph', 1, 1, 100, 'Peace.', 0, '2017-10-27 14:22:44'),
(3, 1, '2017-10-30 07:53:14', 'hey', 'hey', 1, 1, 200, 'Thank you.', 0, '2017-10-30 07:53:14'),
(4, 1, '2017-12-17 17:34:37', 'UCC Coffee Rich Blend ', 'http://localhost:8080/request/UCC-Coffee-Rich-Blend-/29', 1, 1, 100, 'Thank you.', 0, '0000-00-00 00:00:00');

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

--
-- Dumping data for table `customer_sell`
--

INSERT INTO `customer_sell` (`customer_sell_id`, `customer_id`, `added_datetime_stamp`, `product_name`, `product_image_link`, `product_type`, `quantity`, `sell_total_cost`, `comments`, `fulfilled_datetime_stamp`, `fulfilled_status`) VALUES
(1, 1, '2017-10-30 08:19:38', 'hello', 'hello', 0, 1, 50, 'Salamat.', '2017-10-30 08:19:38', 0),
(2, 1, '2017-10-30 08:22:46', 'hi', 'hi', 0, 1, 50, 'Thanks.', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `fields`
--

CREATE TABLE `fields` (
  `fields_id` int(11) NOT NULL,
  `fields_name` varchar(30) NOT NULL,
  `product_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fields`
--

INSERT INTO `fields` (`fields_id`, `fields_name`, `product_type_id`) VALUES
(1, 'name', 1),
(2, 'price', 1),
(3, 'supplier', 1),
(4, 'description', 1),
(5, 'image_location', 1),
(6, 'author', 2),
(7, 'language', 4);

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

--
-- Dumping data for table `merchant`
--

INSERT INTO `merchant` (`merchant_id`, `merchant_name`, `merchant_motto`, `merchant_motto_font_color`) VALUES
(0, 'n/a', NULL, '#6f5630'),
(1, 'Usbong Specialty Bookstore', 'Uplifting Human Lives', '#6f5630'),
(2, 'RetroCC', 'Keep Reading.<br>Keep Collecting.', '#FFFFFF'),
(3, 'Adarna House, Inc', 'Una sa Filipino', '#0b7900'),
(4, 'Usbong Mart', 'Uplifting Human Lives', '#6f5630');

-- --------------------------------------------------------

--
-- Table structure for table `merchant_product_type`
--

CREATE TABLE `merchant_product_type` (
  `merchant_product_type_id` int(11) NOT NULL,
  `merchant_id` int(11) NOT NULL,
  `product_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `merchant_product_type`
--

INSERT INTO `merchant_product_type` (`merchant_product_type_id`, `merchant_id`, `product_type_id`) VALUES
(1, 1, 2),
(2, 1, 10),
(3, 1, 5),
(4, 1, 7),
(5, 1, 9),
(6, 1, 8),
(7, 2, 6),
(8, 2, 8),
(9, 3, 10),
(10, 3, 6),
(11, 3, 7),
(14, 4, 11),
(15, 4, 3),
(16, 4, 12),
(17, 1, 12);

-- --------------------------------------------------------

--
-- Table structure for table `mode_of_payment`
--

CREATE TABLE `mode_of_payment` (
  `mode_of_payment_id` tinyint(1) NOT NULL,
  `mode_of_payment_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mode_of_payment`
--

INSERT INTO `mode_of_payment` (`mode_of_payment_id`, `mode_of_payment_name`) VALUES
(0, 'Bank Deposit'),
(1, 'Paypal'),
(2, 'Cash upon Meetup at MOSC');

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
  `language` varchar(30) DEFAULT 'English',
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
  `quantity_sold` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `merchant_id`, `product_type_id`, `name`, `price`, `previous_price`, `language`, `author`, `supplier`, `description`, `image_location`, `format`, `quantity_in_stock`, `translator`, `product_overview`, `pages`, `product_view_num`, `quantity_sold`) VALUES
(1, 1, 2, 'The Remains of the Day', 400, NULL, 'English', 'Kazuo Ishiguro', NULL, 'Used - Acceptable', NULL, 'Hardcover', 1, '', 'The novelist, Kazuo Ishiguro, has said, \"A novel may not give us facts that are true, [but] what it tells us about experience, the emotion that it conveys, is something that we recognize as true. And sometimes, very important emotions, feelings are conveyed in a novel that cannot be conveyed in more factual stories, or in factual books. I think most importantly, perhaps, a key to it, I think, a novel can tell us how it feels to be in a certain situation. A work of history or journalism can tell us that some people starved in a particular time and place. But, perhaps, it cannot convey the pain of starving, or losing someone close to you or your child to starvation... We need someone to tell us how it felt... Is it true that it feels like that to be in that situation, or is this not true? I think we still have to ask that question. But I think that\'s why we turn to stories, because we feel there\'s something missing in just the factual account.\"', NULL, 0, 0),
(2, 1, 2, 'The Daydreamer', 400, NULL, 'English', 'Ian McEwan', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, '', 'While we know \"Google\" as the search engine giant, Peter, the protagonist in this book, discovered \"Googol\", which is pronounced somewhat similarly, while thinking about the largest number in the world. A \"Googol\" is ten multiplied by ten a hundred times. Moreover, \"Googolplex\" is ten multiplied by ten a googol number of times! But what I really remember about this book is the story about how Peter became friends with the school bully by realizing that he and his classmates only dreamed him up to be strong and powerful, because in reality, he is a nice, ordinary little boy just like any of them.', NULL, 0, 0),
(3, 1, 2, 'Myths to Live By', 400, NULL, 'English', 'Joseph Campbell', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, '', 'Here is a quotation from the book, which you are free to agree or disagree.\r\n\r\n\"All societies are evil, sorrowful, inequitable; and so they will always be. So if you really want to help this world, what you will have to teach is how to live in it. And that no one can do who has not himself learned how to live in it in the joyful sorrow and sorrowful joy of the knowledge of life as it is.\"', NULL, 0, 0),
(4, 1, 2, 'The Seasons of a Man\'s Life', 500, NULL, 'English', 'Daniel Levinson et al.', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, '', 'This book provides a more or less general picture of the so-called \"seasons\" of a man\'s life. It shows examples of various men who set out to realize their dream or ideal life, only to discover later in life that they must confront and eventually accept the reality that they may not be able to actually fulfill that initial dream. One example that I can remember is the academic who wanted to receive recognition for his work by receiving the Nobel prize, but to his great disappointment was beaten to it by a rival group. He later found solace in providing mentorship to the younger generation of scientists in his field.', NULL, 0, 0),
(5, 1, 2, 'The Last Lecture', 400, NULL, 'English', 'Randy Pausch et al.', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, '', 'While the \"Last Lecture\" doesn\'t necessarily mean that it\'s a professor\'s last lecture, and is simply a way for senior professors at Carnegie Mellon University to share wisdom to younger students and faculty, for Randy Pausch, it really was somewhat of a last lecture, because he was already grappling with pancreatic cancer and his chance of survival was low. This book offers his insights about living.', NULL, 0, 0),
(6, 1, 2, 'The Innovators', 600, NULL, 'English', 'Walter Isaacson', NULL, 'Used - Very Good', NULL, 'Paperback', 1, '', 'This book chronicles the many people who contributed to the development of an important tool that is the computer and the many innovations that went with it. It was interesting for me to discover glimpses of inventors as humans, working together to build things that would amplify even further their capabilities and shape the world forever. ', NULL, 0, 0),
(7, 1, 2, 'Steve Jobs', 500, NULL, 'English', 'Walter Isaacson', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, '', 'This book offers glimpses of Steve Jobs\' life as a human person, warts and all. I particularly liked discovering that despite the wealth that he was able to accumulate in his life, he decided that he didn\'t want to change his simple, yet efficient lifestyle, only for the sake of being able to live the rich life that is glamorized by media.\r\n<br><br>\r\np.s. I like the iPAD + pencil combo.', NULL, 0, 0),
(8, 1, 9, 'Tokyo University\'s English', 1000, NULL, 'Japanese/English', 'Masafumi Satou', NULL, 'Used - Acceptable', NULL, 'Paperback', 0, '', 'While this book is intended for Japanese students who\'ll be taking the Tokyo University entrance exam, it can be used by Japanese language learners as well. The sample readings are in English, while the translation and explanations are in Japanese. The articles are also quite interesting. I particularly remember the one about how our hopes and fears are \"often illusions promising to change our way of life, but leaving us exactly as we were before.\"', NULL, 0, 0),
(9, 1, 2, 'Siddhartha', 300, NULL, 'English', 'Hermann Hesse', NULL, 'Used - Very Good', NULL, 'Paperback', 1, '', 'This story relates the transitions a person undertook to achieve the state of everlasting peace. He first lived the life of a scholar, and then became an ascetic, and then a merchant, and then a boatman. I found it particularly interesting to learn how an ascetic could become a merchant. As it turns out, having the ability to read and write, as well as the patience to wait and fast, instead of having to seek any kind of work due to being driven by hunger, proved useful to this transition. Another key idea that I got from the book is that there are things that cannot be taught in words, but must truly be experienced for another person to understand.', NULL, 0, 0),
(10, 1, 2, 'The Montessori Method', 400, NULL, 'English', 'Maria Montessori', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, '', 'The first dawn of real discipline comes through action. When a child has learned to respond naturally through action that is aimed towards an objective, that is, action that is no longer erratic, he is no more the child that he was at first, but an individual. When, further, he has freed himself from being dependent on others due to his own inferiority, he has overcome himself and the limits of his age, and has made a great step forward by conquering his future while in the present.', NULL, 0, 0),
(11, 1, 2, 'The Soul of a New Machine', 400, NULL, 'English', 'Tracy Kidder', NULL, 'Used - Acceptable', NULL, 'Hardcover', 1, '', 'What is the soul of a new machine? It is the collective soul etched in silicon and microcode of a team of dedicated engineers who brought the machine to life. In the end, \"It\'s just a computer. It\'s really a small thing in the world, you know.\"', NULL, 0, 0),
(12, 1, 2, 'Outliers: The Story of Success', 400, NULL, 'English', 'Malcolm Gladwell', NULL, 'Used - Acceptable', NULL, 'Hardcover', 1, '', 'There are two things that make rice farming meaningful. First, there is a clear relationship between effort and reward, in that the harder you work a rice field, the more it yields. Second, its complexity is akin to running a small business that is composed of a family workforce, who must hedge uncertainty through seed selection, building and managing a sophisticated irrigation system, and at the same time coordinating the complicated process of crop harvesting and crop preparation.', NULL, 0, 0),
(13, 1, 2, 'Guns, Germs, and Steel', 500, NULL, 'English', 'Jared Diamond', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, '', 'Where do innovations actually come from? As it turns out, much technology is not invented solely locally and is not done by a lone individual. Instead, it is borrowed from other societies and from other inventors who’ve gone before. The spread of useful invention depends on whether a society that learns about it is receptive to it and adopts it. Societies lacking the invention often find themselves at a disadvantage in relation to the receptive society, even becoming overwhelmed and replaced if the disadvantage is sufficiently great.', NULL, 0, 0),
(14, 1, 2, 'The Tao of Pooh', 300, NULL, 'English', 'Benjamin Hoff', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, '', 'To Laozi, the universe was not a setter of traps, but a teacher of valuable lessons. While it would be arrogant to attempt to adequately put how the universe operates into words, its nature could be understood. And the natural result of being able to appreciate, learn from, and work with whatever happens in everyday life is happiness.', NULL, 0, 0),
(15, 1, 2, 'The Different Drum', 400, NULL, 'English', 'M. Scott Peck, M.D.', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, '', 'The reality of human nature is that we are all profoundly different. This is due to our capacity to be molded by culture and experience in extremely variable ways. At the same time, it is this same capacity that opens the way for all of us to *transformation*, which paradoxically, is both the basic cause of war and the basic cure for war.', NULL, 0, 0),
(16, 1, 2, 'The Lives of a Cell', 300, NULL, 'English', 'Lewis Thomas', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, '', 'The sky is a miraculous achievement. It is, after all, far and away the grandest product of collaboration in all of nature. Earth would not be alive as we know it without such cooperation. Moreover, the shelter it provides prevents millions of meteorites from pounding us like the powdered surface of the moon. While we may not be sensitive enough to hear it, we find solace in knowing that the sound is there above, “like the random noise of rain on the roof at night.”', NULL, 0, 0),
(17, 1, 2, 'The Plague', 400, NULL, 'English', 'Albert Camus', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, '', 'The town of Oran is hit by a devastating plague. Everyone is locked in the town. Nobody comes in, nobody goes out. Gripped by this circumstance, the people are challenged to confront their strongly held beliefs. Meanwhile, a group of tenacious men and women work together to fight the plague, hoping that they\'ll eventually figure out a cure to put an end to it. Eventually, indeed, the plague is brought to a stop. But how? Could it be divine intervention? It\'s not what you think.', NULL, 0, 0),
(18, 1, 2, 'Living Language: French', 500, NULL, 'English', 'Anne Heminway', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, '', 'While the book may be dated, e.g. the currency is not in euros, I found the sequence of chapters relevant to one who is learning French. The chapters start with a dialogue, then an explanation of certain grammar points, then some exercises, and finally a cultural note, which all provide a much better glimpse of French culture. Using tools like Google Translate to help you with the pronunciation, you should be able to gradually learn to speak, read, and understand French as you go through this book.', NULL, 0, 0),
(19, 1, 2, 'Starting Point, 1979-1996', 850, NULL, 'English', 'Hayao Miyazaki', NULL, 'New', NULL, 'Paperback', 1, 'Beth Cary/Frederik L. Schodt', 'I first got a copy of this book (Japanese version) while studying in Japan as an exchange student. I wanted to eventually be able to read it in the original. About 10 years later, I was indeed able to read the chapter on \"Animation and Manga Movies\". It was a pleasant surprise that my Japanese language ability had improved to the extent that I could already read such texts. I then translated the chapter for my class on Japanese Films. Having said this, it is still fun even now to just randomly flip a page and read insights from MiyazakiSAN.', NULL, 0, 0),
(20, 1, 2, 'Turning Point, 1997-2008', 1400, NULL, 'English', 'Hayao Miyazaki', NULL, 'New', NULL, 'Hardcover', 1, 'Beth Cary/Frederik L. Schodt', 'I first got a copy of the first book, \"Starting Point, 1979-1996 (Japanese version)\", while studying in Japan as an exchange student. I wanted to eventually be able to read it in the original. About 10 years later, I was indeed able to read the chapter on \"Animation and Manga Movies\". It was a pleasant surprise that my Japanese language ability had improved to the extent that I could already read such texts. I then translated the chapter for my class on Japanese Films. Not long after, I got a copy of this book in the original Japanese. It is indeed fun to just randomly flip a page and read insights from MiyazakiSAN.', NULL, 0, 0),
(21, 1, 2, 'Made in Japan', 400, NULL, 'English', 'Akio Morita et al.', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, 'Edwin M. Reingold/Mitsuko Shimomura', 'Here\'s my English translation of an excerpt taken from an interview with Akio Morita on NHK\'s 「あの人に会いたい」(I want to meet that person).<br>\r\n「私は日本製品を売ろうとしていたが、\r\nドイツ人の目にはこの傘が日本製品を象徴していると」\"I was trying to sell Japanese products, but in the eyes of Germans, Japanese products were small umbrellas that are put on top of ice creams!\"<br>\r\n「この傘がメイドインジャパンだったわけです」\r\n\"This umbrella represented products made in Japan.\"<br>\r\n「それ以来、私はメイドインジャパンのイメージを変えなければと一生懸命やってきた」\r\n\"After that, I did my very best to change the \'Made in Japan\' image.\"', NULL, 0, 0),
(22, 1, 2, 'Wikinomics', 400, NULL, 'English', 'Don Tapscott/Anthony Williams', NULL, 'Used - Acceptable', NULL, 'Hardcover', 1, NULL, 'This book provides an optimistic view on how technology, particularly the internet, is enabling people to massively collaborate. While we know that technology is a double-edged sword, that is, it can be used for good or ill depending on its wielder, one is left with a positive and optimistic feeling that things are getting better instead of worse after reading this book. ', NULL, 0, 0),
(23, 1, 2, 'The Dancing Wu Li Masters', 400, NULL, 'English', 'Gary Zukav', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, NULL, 'This book is a must-read for anyone who wants to understand Physics, that is, not the Physics that students commonly learn in school, where there are equations that one must solve in a sort of computer-like way, without really understanding deeply what kind of thinking and perspective brought about those equations in the first place. One question that this book asks is, what is a living thing? If we break down a human person into very, very tiny, little pieces, we\'ll find that a rock is made up of those very tiny, little pieces as well. And yet, we do not call a rock a living thing. Why is that? Eventually, if you continue asking such questions, you\'ll arrive with the answer that we don\'t know. And the book concludes with an invitation to an opening towards eastern culture. ', NULL, 0, 0),
(24, 1, 10, 'Le Petit Prince', 320, '<strike>&#x20B1;400</strike>', 'French', 'Antoine de Saint-Exupéry', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, NULL, 'This book\'s often quoted phrase, «On ne voit bien qu’avec le cœur. L’essentiel est invisible pour les yeux.  (We can only see well with our hearts. What is essential is invisible to the eye.)» reminds us that a person can be vain, difficult, and demanding, but it is the quality time that we spent for that person that makes him or her special and unique from all the other persons in the world.', NULL, 0, 0),
(25, 1, 2, 'Founders at Work', 500, NULL, 'English', 'Jessica Livingston', NULL, 'Used - Acceptable', NULL, 'Hardcover', 1, NULL, 'Reading this book gives a person an idea of what founders of startups had to undergo to be able to achieve what they\'ve achieved. It contains interviews upon interviews of founders of companies that even now we still recognize and whose services we still use. I hope that this book gives you a better appreciation and respect for company founders, and inspires you to become one someday.', NULL, 0, 0),
(26, 1, 2, 'Standard First Aid & Personal Safety', 500, NULL, 'English', 'American Red Cross', NULL, 'Used - Acceptable', NULL, 'Paperback', 0, NULL, 'While there are copies of First Aid guides, which a person can download free-of-charge online, this printed copy shows ways of how an ordinary person, without having to prescribe any medicine, can provide first aid when needed. Examples include applying various bandages, positioning a person in certain ways, and so on. What is most important, however, is achieving a calm and tranquil state of mind to act and do what must be done even during times of accidents or disaster. Hopefully, this book helps you attain such a state of presence.', NULL, 0, 0),
(27, 1, 9, 'HSK Level 5 Sample Exam', 1500, NULL, 'Mandarin/Japanese', 'Confucius Institute (Hanban)', NULL, 'Used - Acceptable', NULL, 'Paperback', 0, '株式会社スプリックス', 'This book is a good learning tool not only for those who\'ll be taking the HSK Level 5 exam, but also those who simply enjoy reading interesting texts or articles from a variety of fields. The texts are in Mandarin (Simplified), while the translation and explanations are in Japanese. One story that I remember from this book is the one about the business man, his son, and their donkey. The lesson it shared was that it is difficult to please everybody. And if you mistakenly think that you can satisfy everyone, you\'ll realize that you won\'t be happy and the people you wanted to satisfy won\'t be satisfied either. ', NULL, 0, 0),
(28, 4, 3, 'M&S Earl Grey Tea', 295, NULL, 'English', NULL, NULL, NULL, NULL, NULL, 1, NULL, 'Douglas Adams has this to say about tea. It is from the chapter on \"Tea\" from the book, <b><a href=\'https://store.usbong.ph/w/The-Salmon-of-Doubt-Douglas-Adams/69\'>The Salmon of Doubt</a></b>. \"Drink it. After a few moments you will begin to think that the place you\'ve come to \r\nisn\'t maybe quite so strange and crazy after all.\"', NULL, 0, 0),
(29, 4, 3, 'UCC Coffee (Rich Blend)', 580, NULL, 'Japanese', NULL, NULL, NULL, NULL, NULL, 0, NULL, 'The Finns or the Finnish people are said to be heavy coffee drinkers. Perhaps it\'s due to the seemingly predominantly stark climate they\'re in. Yet other than the Finnish sauna, what better way to celebrate life than the smell of freshly brewed coffee for 2 at home?', NULL, 0, 0),
(30, 4, 3, 'sencha (Green Tea)', 225, NULL, 'Japanese', NULL, NULL, NULL, NULL, NULL, 1, NULL, 'While at present, Filipinos in general favor coffee over tea, I hope that someday we would all appreciate the simple and calming effects of drinking Japanese green tea. While other teas may contain plenty of caffeine, or would easily cause molds to form if not consumed quickly, green tea offers few, if at all, caffeine, such that one can drink it even before going to sleep, and can store it in room temperature without molds forming. If you find that you\'ve made too much green tea, you can put it inside the refrigerator and drink it later as cold tea, without the disadvantage of too much added sugar found in commercialized iced teas.', NULL, 0, 0),
(31, 1, 5, 'PROMO-Le Petit Prince, Living Language French, The Plague', 1080, NULL, 'French/English', 'Saint-Exupéry, Heminway, Camus', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(32, 1, 5, 'PROMO-Wikinomics, Guns, Germs, and Steel, The Soul of a New Machine, The Different Drum', 1490, NULL, 'English', 'Tapscott/Williams, Diamond, Kidder, Peck', NULL, 'Used - Acceptable', NULL, 'Mixed', 1, NULL, NULL, NULL, 0, 0),
(33, 1, 5, 'PROMO-Made in Japan, The Soul of a New Machine, Founders at Work, Outliers', 1490, NULL, 'English', 'Morita et al., Kidder, Gladwell, Livingston', NULL, 'Used - Acceptable', NULL, 'Mixed', 1, NULL, NULL, NULL, 0, 0),
(34, 1, 5, 'PROMO-Starting Point, Turning Point', 2180, NULL, 'English', 'Hayao Miyazaki', NULL, 'New', NULL, 'Mixed', 1, 'Beth Cary and Frederik L. Schodt', NULL, NULL, 0, 0),
(35, 1, 5, 'PROMO-Steve Jobs, The Innovators', 1025, NULL, 'English', 'Walter Isaacson', NULL, 'Used - Very Good', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(36, 2, 6, 'ACTION COMICS 1-52 (complete set)', 8000, NULL, 'English', NULL, NULL, 'new, 1-52 + extras, VF-NM', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(37, 2, 6, 'Silver Surfer vol 1 (complete set)', 32000, NULL, 'English', NULL, NULL, 'VG-F', NULL, 'Paperback', 1, NULL, '<br>\r\n1-18 (Complete)', NULL, 0, 0),
(38, 2, 6, 'Batman Superman set', 3000, NULL, 'English', NULL, NULL, 'VF-NM', NULL, 'Paperback', 1, NULL, '<br>1-31, annual 1-2, future\'s end 1, missing issue 32', 0, 0, 0),
(39, 2, 6, 'ULTIMATE FALLOUT set', 1800, NULL, 'English', NULL, NULL, 'VF-NM', NULL, 'Paperback', 1, NULL, 'Ultimate Fallout 1-6<br>\r\nIssue 4 1st appearance Miles Morales<br>\r\nDeath of Spider-man 2nd print', NULL, 0, 0),
(40, 2, 6, 'KLAUS boom studios', 1200, NULL, 'English', NULL, NULL, 'complete set 1-7, VF-NM', NULL, NULL, 1, NULL, NULL, NULL, 0, 0),
(41, 2, 6, 'Empire of the Dead', 1500, NULL, 'English', NULL, NULL, 'VF', NULL, 'Paperback', 1, NULL, '<br>\r\nComplete 1st arc, 1-5', NULL, 0, 0),
(42, 2, 6, 'Fairest (complete set)', 3500, '<strike>&#x20B1;4000</strike>', 'English', NULL, NULL, 'VF', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(43, 2, 6, 'Batman and Robin New 52 set', 6000, NULL, 'English', NULL, NULL, 'VF-NM', NULL, 'Paperback', 1, NULL, '<br>Complete set of Batman and Robin new 52', NULL, 0, 0),
(44, 1, 7, 'One Piece Manga set (1-20)', 2405, '<strike>&#x20B1;3700</strike>', 'Japanese', NULL, NULL, 'Used - Acceptable', NULL, 'Paperback', 1, NULL, 'I started collecting manga (and retro video games) when I first went to Japan on my own as an exchange student. However, it was only about 10 years later that I actually sat down and read the manga\'s (and played the video games; not just tested them to see if they worked). I had set out to learn Japanese language and culture, because I was very much into Japanese pop culture. But during that time when I was learning, I hardly had time left to enjoy the things which got me learning in the first place. While what urged me to go back and enjoy the manga and the video games is another story for another time, One Piece is one of the manga\'s that I returned to reading after that more or less 10 year period of serious learning.', NULL, 0, 0),
(45, 1, 7, 'Conan Manga set (1-9)', 1082, '<strike>&#x20B1;1665</strike>', 'Japanese', NULL, NULL, 'Used - Acceptable', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(46, 1, 7, 'Rurouni Kenshin Manga set (1-27 complete)', 3510, '<strike>&#x20B1;5400</strike>', 'Japanese', NULL, NULL, 'Used - Good', NULL, 'Paperback', 1, NULL, 'If you\'re like most Filipinos, you\'ve probably seen the anime first, before having read the manga. Of course, if you\'re part of the younger generation, you may have likely seen the films first before either the anime or the manga. In any case, I found the anime more toned down than the manga in terms of the harsh reality of life. Having said this, this manga set should still offer good reading material, especially for nihongo learners. As to my favorite character in the series, that\'s another story for another time.', NULL, 0, 0),
(47, 2, 8, 'DAREDEVIL', 800, NULL, 'English', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, 0, 0),
(48, 2, 8, 'Spider-man Marvel Toybiz 90s', 700, NULL, 'English', NULL, NULL, 'New', NULL, NULL, 1, NULL, 'MOC', NULL, 0, 0),
(49, 2, 8, 'Marvel Legends Wave 1 X-MEN BAF Juggernaut', 10000, NULL, 'English', NULL, NULL, 'VF-NM', NULL, NULL, 0, NULL, NULL, NULL, 0, 0),
(50, 1, 9, 'shimbun de manabu nihongo (with CDs)', 1900, '<strike>&#x20B1;2700</strike>', 'Japanese', 'Mizutani Osamu et al.', NULL, 'New', NULL, 'Paperback', 2, NULL, NULL, NULL, 0, 0),
(51, 1, 9, 'kanzen masta- 2kyuu', 910, '<strike>&#x20B1;1296</strike>', 'Japanese', '3A Corporation', NULL, 'New', NULL, 'Paperback', 2, NULL, NULL, NULL, 0, 0),
(52, 1, 9, 'kanzen masta- 1kyuu', 910, '<strike>&#x20B1;1296</strike>', 'Japanese', '3A Corporation', NULL, 'New', NULL, 'Paperback', 2, NULL, NULL, NULL, 0, 0),
(53, 1, 9, 'kanji look and learn', 950, '<strike>&#x20B1;1350</strike>', 'Japanese', 'Eri Banno et al. (The Japan Times)', NULL, 'New', NULL, 'Paperback', 1, NULL, 'This book contains 512 Kanji characters with drawings or illustrations, mnemonic hints, the correct stroke order, as well as their various readings, to help the student master this incredible invention that should cover up to N2 of the Japanese Language Proficiency Test (JLPT).<br><br>\r\n<i>Discounted from <strike>&#x20B1;1350</strike></i>', NULL, 0, 0),
(54, 1, 9, 'genki II 2nd ed (with CD)', 2650, '<strike>&#x20B1;3780</strike>', 'Japanese', 'Eri Banno et al. (The Japan Times)', NULL, 'New', NULL, 'Paperback', 2, NULL, 'This is one of the textbooks my classmates and I used back when I was an exchange student in Japan. I was so determined to learn the Japanese language that even before arriving in Japan, I had already taken several classes. <br><br>Actually, I started learning nihongo on my own when I was in 4th year high school. After I graduated, I took language classes in Ortigas. There I met my first Filipino teacher in nihongo. He advised me to apply in the exchange programs offered in universities. This is what he did as a student at De La Salle University (DLSU). <br><br>I continued taking classes in Ortigas every Saturday during my time in college, while making sure that I arrive on time for ROTC (Reserve Officers\' Training Course). At the time, we didn\'t have any alternative to ROTC, unlike university students these days. When I finally took my first foreign language class in college, I already had some background. <br><br>Eventually, I was fortunate enough to be accepted as a student in Japan for 2 semesters in my junior year. When I took the placement test, I earned enough points to land on a Japanese Language and Culture class that used this textbook. <br><br>I never used the <b><a href=\'http://localhost:8080/w/genki-I-2nd-ed-with-CD-Eri-Banno-et-al.-The-Japan-Times/55\'>first Genki textbook</a></b>, until several years later, when I became a teacher. To tell you the truth, I didn\'t know I\'d become a teacher. I didn\'t really set out to be one. But I guess I\'m getting ahead of myself, because that\'s another story for another time.', NULL, 0, 0),
(55, 1, 9, 'genki I 2nd ed (with CD)', 2650, '<strike>&#x20B1;3780</strike>', 'Japanese', 'Eri Banno et al. (The Japan Times)', NULL, 'New', NULL, 'Paperback', 2, NULL, NULL, NULL, 0, 0),
(56, 1, 9, 'erin (with DVD) vol 3', 1820, '<strike>&#x20B1;2592</strike>', 'Japanese', 'The Japan Foundation', NULL, 'New', NULL, 'Paperback', 2, NULL, 'This is volume 3 of the erin series. It contains manga, cultural notes, basic and advanced skits (translated from Japanese to English, Portuguese, Korean, and Simplified Mandarin) as well as their videos in DVD, as they share the story of erin, an international student, studying in a high school in Japan and living with a Japanese host family.', NULL, 0, 0),
(57, 1, 9, 'erin (with DVD) vol 2', 1820, '<strike>&#x20B1;2592</strike>', 'Japanese', 'The Japan Foundation', NULL, 'New', NULL, 'Paperback', 2, NULL, 'This is volume 2 of the erin series. It contains manga, cultural notes, basic and advanced skits (translated from Japanese to English, Portuguese, Korean, and Simplified Mandarin) as well as their videos in DVD, as they share the story of erin, an international student, studying in a high school in Japan and living with a Japanese host family.', NULL, 0, 0),
(58, 1, 9, 'erin (with DVD) vol 1', 1820, '<strike>&#x20B1;2592</strike>', 'Japanese', 'The Japan Foundation', NULL, 'New', NULL, 'Paperback', 2, NULL, 'This is volume 1 of the erin series. It contains manga, cultural notes, basic and advanced skits (translated from Japanese to English, Portuguese, Korean, and Simplified Mandarin) as well as their videos in DVD, as they share the story of erin, an international student, studying in a high school in Japan and living with a Japanese host family.', NULL, 0, 0),
(59, 1, 2, 'kenshuui junjou monogatari', 350, NULL, 'Japanese', 'Keiichi Kawafuchi', NULL, 'New', NULL, 'Paperback', 1, NULL, '\"Honest Tales of a Medical Resident: Don\'t Call Me Doctor!\", by Keiichi Kawafuchi, relates the author\'s own experiences as a resident in a university hospital. The road that he took to become a medical doctor wasn\'t straight-forward. He first worked in various and odd jobs, even turning into a hikikomori (someone who withdraws from society), before deciding at 30 to become a medical doctor. He eventually graduated at 37 years old from Kyoto University\'s Medical School, and is now a freelance internist and writer. Although reviews may be mixed (one side likes the book, the other side doesn\'t), I found the author\'s experiences and musings quite honest and frank.', NULL, 0, 0),
(60, 1, 2, 'Godel, Escher, Bach', 700, NULL, 'English', 'Douglas Hofstadter', NULL, 'Used - Acceptable', NULL, 'Paperback', 2, NULL, 'This book shows through historical examples of real persons who\'ve stumbled upon the paradoxes of logic, and have emerged with masterpieces that defy reason. I highly recommend this book to people who are stuck in the realm of thinking, and have yet to appreciate the beauty of what is beyond logic.', NULL, 0, 0),
(61, 1, 2, 'The Intelligent Investor', 550, NULL, 'English', 'Benjamin Graham', NULL, 'Used - Acceptable', NULL, 'Hardcover', 2, NULL, 'One key idea from the book is this: Unlike many people, who think that money in investment is made out of buying and selling of stocks, real money is actually made, as it has been done since the past, out of owning and holding securities. From these, one receives interest and dividends as well as increases in value.', NULL, 0, 0),
(63, 1, 2, 'The Hero with a Thousand Faces', 600, NULL, 'English', 'Joseph Campbell', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, NULL, 'According to the author, there is a pattern in the stories humankind has told time and time again since the ancient past. Stories about love where out of the many who have tried and failed, emerges a hero who would be able to defeat the hideous ogre, which may symbolize the dear damsel\'s parents, and triumphantly save the princess and be able to live together in everlasting bliss. But if so many have failed, how does the hero in fact do this incredible and seemingly insurmountable task?', NULL, 0, 0),
(64, 1, 2, 'The Seasons of a Woman\'s Life', 500, NULL, 'English', 'Daniel Levinson et al.', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, NULL, 'From the team that brought out the book, \"The Seasons of a Man\'s Life\", comes another notable work that provides a more or less general picture of the so-called \"seasons\" of a woman\'s life as she lives her 20s, 30s, and 40s. An impression that I got from this book is the difficult reality of simply living one\'s life, especially for women. It is indeed full of disappointments and heartaches, yet can be turned into triumphs where one emerges much stronger and less naive about the world and a woman\'s place in it.', NULL, 0, 0),
(65, 1, 2, 'A New Earth', 500, NULL, 'English', 'Eckhart Tolle', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, NULL, 'The author\'s message doesn\'t necessarily deviate from the one that is brought forth in eastern philosophy. And if from this book you are able to have a better appreciation of life and our world, with all the pain and imperfections that come along with it, then I believe that we\'ve gained one more peaceful person, and our world is so much better for it.', NULL, 0, 0),
(66, 1, 2, 'The Richest Man in Babylon', 300, NULL, 'English', 'George Clason', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, NULL, 'This book offers guidance to becoming wealthy. The lessons are brought out using stories revolving in the great ancient city of Babylon. I often find myself rereading and rereading this book to make sure that I am able to internalize what I\'ve learned. One key lesson from the book is the setting aside of no less than 10% of one\'s income. Even with only 10pesos saved everyday for 30 days you could already accumulate 300pesos! Afterwards, it is important to make your money work and earn more for you by investing it in honorable and trustworthy people who can keep safe the principal, yet provide you with adequate returns for years and years to come.<br><br>\"Babylon became the wealthiest city of the ancient world because its citizens were the richest people of their time.\"', NULL, 0, 0),
(67, 1, 7, 'Full Metal Alchemist Manga set (1-27 complete)', 3705, '<strike>&#x20B1;5700</strike>', 'Japanese', 'Hiromu Arakawa', NULL, 'Used - Very Good', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(68, 1, 7, 'Ranma Manga set (1-38 complete)', 4550, '<strike>&#x20B1;7000</strike>', 'Japanese', 'Rumiko Takahashi', NULL, 'Used - Very Good', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(69, 1, 2, 'The Salmon of Doubt', 400, NULL, 'English', 'Douglas Adams', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, NULL, 'The author wrote a chapter on \"Tea\". This is what he has to say: \"Drink it. After a few moments you will begin to think that the place you\'ve come to isn\'t maybe quite so strange and crazy after all.\"', NULL, 0, 0),
(70, 1, 2, 'Banker to the Poor', 400, NULL, 'English', 'Muhammad Yunus', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, NULL, 'In one of my travels in Southeast Asia, I was fortunate to have met a Bangladeshi who was attending the same conference I was attending on ICTD (Information and Communication Technologies and Development). He was kind enough to have treated me to a scrumptious vegetarian meal after accompanying him to a mall to have our travellers cheques exchanged and get himself a new sim card for use during his stay in the country.<br><br>\r\nI remember mentioning to him Muhammad Yunus whom he knew, since they\'re both from Bangladesh. \r\n<br><br>\r\nWhile it is always better to be cautious with strangers, given the right environment, it can be good to meet and interact with other people and learn from them too.\r\n<br><br>\r\nMuhammad Yunus has said: \"Who has given the ultimate verdict that people are motivated only by money--that the desire to do great things for the world can\'t be just as powerful a driving force in human behavior?\"', NULL, 0, 0),
(71, 1, 2, 'Delivering Happiness', 500, NULL, 'English', 'Tony Hsieh', NULL, 'Used - Acceptable', NULL, 'Hardcover', 3, NULL, 'The author shares the story of how he and his team built the online store, Zappos.com, which was later acquired by Amazon.com. I found it interesting to realize that when everyone is selling the same products at more or less the same price, what would set the company apart would none other than be the customer experience or the company\'s customer service.', NULL, 0, 0),
(72, 1, 9, 'software kaihatsu gijutsusha 2008 ed', 2700, NULL, 'Japanese', 'nikkei BP company', NULL, 'Used - Acceptable', NULL, 'Paperback', 0, NULL, NULL, NULL, 0, 0),
(73, 1, 2, 'Surgeons Do Not Cry', 500, NULL, 'English', 'Ting Tiongco', NULL, 'Used - Acceptable', NULL, 'Paperback', 0, NULL, '\"Learn from the People\"', NULL, 0, 0),
(74, 1, 2, 'John L Gokongwei Jr', 500, NULL, 'English', 'Marites Khanser', NULL, 'Used - Acceptable', NULL, 'Paperback', 0, NULL, 'It was interesting for me to discover the life story of Mr. John Gokongwei Jr, and how he was able to build an empire from the ground-up. \r\n<br><br>\r\nSometime ago, I was with my dad on our way to a conference in Macau. As we were waiting for our call to board the Cebu Pac plane, my dad quickly recognized Mr. John Gokongwei Jr sitting quietly, and he humbly introduced himself and I to him.\r\n<br><br>\r\nWhen he learned that we were going to a conference in Macau, his eyes widened, and, somehow, he reminded me of Richard Feynman.\r\n<br><br>\r\nYears later, I would meet, somewhat serendipitously, his son.\r\n<br><br>\r\nHaving said this, the book mentions that the common business sectors of the top Philippine Listed Holding Firms include: 1) Banking and Finance, 2) Hotels, Malls and Apartments, 3) Manufacturing, and 4) Real Estate and Property Development.', NULL, 0, 0),
(75, 1, 2, 'The Millionaire Next Door', 400, NULL, 'English', 'Thomas Stanley/William Danko', NULL, 'Used - Acceptable', NULL, 'Paperback', 5, NULL, 'Along with \"The Richest Man in Babylon\", this is a book that I often find myself rereading and rereading. \r\n<br><br>\r\nA key idea from the book is the importance of frugality. Moreover, for a family to become financially independent, either the wife or the husband should be thriftier than his or her already thrifty spouse.\r\n<br><br>\r\nI should also add that the book advises that more valuable than money are: good health, longevity, happiness, a loving family, self-reliance, and fine friends.', NULL, 0, 0),
(76, 1, 2, 'Managing in a Time of Great Change', 500, NULL, 'English', 'Peter Drucker', NULL, 'Used - Acceptable', NULL, 'Paperback', 2, NULL, 'I learned many things from this book. Here are some of them:<br><br>\r\n1) It has been said that the Japanese owe their success to running the modern corporation as a family. Peter Drucker adds that the overseas Chinese owe their success to running their family as a modern corporation.<br><br>\r\n2) People  have always worked in teams, because very few people could work effectively by themselves. \"The farmer had to have a wife, and the farmwife had to have a husband.\" Both of them worked as a team with their employees, the hired hands. The craftsman, too, had to have a wife. \"He took care of the craft work, she took care of the customers, the apprentices, and the business altogether.\" Both of them worked as a team with journeymen and apprentices.', NULL, 0, 0),
(77, 1, 2, 'Direct from Dell', 500, NULL, 'English', 'Michael Dell (with Catherine Fredman)', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, NULL, 'Michael Dell shares the story of how he and his team built Dell Computer Corporation. I particularly liked the part about his company\'s early days, and how he started by buying cheap components and upgrading computers himself to sell them to customers at a much lower cost than resellers who simply bought assembled computers and sold them with an added overhead fee. Focusing on what customers actually want, instead of what a person thinks they want, is one of the many things that I learned from reading this book.', NULL, 0, 0),
(78, 1, 2, 'The HP Way', 500, NULL, 'English', 'David Packard', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, NULL, 'After doing Computer Science for 10 years, I learned that there will be always something to add, something to fix, and something to improve on. And if you\'re the type of person who dislikes finding out that you\'ve got to fix another bug, then you\'re better off in another industry.<br><br>\r\nGiven this circumstance, we may ask why anyone would want to put his or herself in such a system. And we can say that because it\'s fun. It\'s fun because we\'re with a company of good friends, building something together.<br><br>\r\n\"...the best job can be done when the manager has a genuine and thorough understanding of the work. I don\'t see how managers can even understand what standards to observe, what performance to require, and how to measure results unless they understand in some detail the specific nature of the work they are trying to supervise.\"', NULL, 0, 0),
(79, 3, 10, 'Noong Unang Panahon', 180, '<strike>&#x20B1;260</strike>', 'Filipino/English', ' Rafaelita Valera/Ghani Madueño', 'Adarna House, Inc.', 'New', NULL, 'Paperback', 99, NULL, 'Story by Rafaelita S. Valera.<br>Illustrations by Ghani Madueño.<br><br>How was the world created? Where did man come from? Read three legends, from the Samal, Ifugaw, and Tagalog and Visayan, that explain the origins of the world and mankind.\r\n<br><br>\r\nPaano nilikha ang mundo? Saan nanggaling ang tao? Basahin ang tatlong alamat, mula sa mga Samal, Ifugaw, at Tagalog at Bisaya, na nagpapaliwanag ng pinagmulan ng daigdig at ng tao.', 32, 0, 0),
(80, 3, 10, 'Si Lurat, Kidhat, Pirok, ug Piyong', 180, '<strike>&#x20B1;260</strike>', 'Filipino/Cebuano', ' Virgilio S. Almario/Albert Gamos', 'Adarna House, Inc.', 'New', NULL, 'Paperback', 99, NULL, 'Story by Virgilio S. Almario.<br>Illustrations by Albert Gamos.<br><br>Once, four fishermen rowed their boat in a glass of water in search of a bright star. They were Open, Wink, Blink, and Close. Follow their exciting adventure as they go after their star.<br><br> Diha kadto’y upat ka mangingisda nga namangka sa usa ka basong tubig aron pangitaon ang usa ka tahom nga bitoon. Sila si Lurat, Kidhat, Pirok, ug Piyong. Kutas ang ilang panimpalad sa pamangka una nila nakit-an ang ilang gipangandoy nga bitoon.', 32, 0, 0),
(81, 3, 10, 'Can We Live Without Trees', 230, '<strike>&#x20B1;310</strike>', 'English', 'May Tobias-Papa/Fran Alvarez', 'Adarna House, Inc.', 'New', NULL, 'Paperback', 99, NULL, 'Text by May Tobias-Papa.<br>Illustrations by Fran Alvarez.<br><br>Here is a reference book about how important trees are to humans and all living things, how biologically diverse the Philippines is, and how we can help save our forests. Find out whether we can really live without trees.', 40, 0, 0),
(82, 3, 10, 'Florante at Laura', 280, '<strike>&#x20B1;360</strike>', 'Filipino', 'Francisco Balagtas/Virgilio S. Almario', 'Adarna House, Inc.', 'New', NULL, 'Paperback', 99, NULL, 'Written by Francisco Balagtas.<br>With annotations by Virgilio S. Almario<br><br>BAGONG SALIKSIK sa pagtuklas ng totoong teksto ni Balagtas, batay sa masinop na pagsusuri sa pinakamatandang edisyon ng Florante at Laura noong ika-19 siglo.', 152, 0, 0),
(83, 3, 10, 'Displaced', 330, '<strike>&#x20B1;410</strike>', 'English', 'Aneka Rodriguez/Mitzi Villavecer', 'Adarna House, Inc.', 'New', NULL, 'Paperback', 99, NULL, 'Written by Aneka Rodriguez.<br>Illustrations by Mitzi Villavecer.<br><br>Elay is in her last year of high school. As if things weren’t complicated enough, her mother comes home after years of separation, and her best friend is not acting like a friend at all.<br><br>2012 NBDB Highly Recommended Supplementary Material', 160, 0, 0),
(84, 3, 10, 'Mga Tala sa Dagat', 330, '<strike>&#x20B1;410</strike>', 'Filipino', 'Annette Acacio Flores/Nanoy Rafael', 'Adarna House, Inc.', 'New', NULL, 'Paperback', 99, 'Nanoy Rafael', 'Written by Annette Acacio Flores<br>\r\nTranslated by Nanoy Rafael<br><br>\r\nIsang pag-iibigan ang nabuo sa pagitan ng prinsesa at isang mangingisda. Isang bata ang kailangang isuko ang paglalaro at pag-aaral, alang-alang sa pagiging pinakamahusay na mangingisda ng bayan. Nauugnay ang lahat ng ito ng isang pangako, isang pangako tungkol sa higanteng dagat na may mga dala-dalang mga tala.\r\n\r\nIto ang kuwento ng isang pamilya ng mga mangingisda at ng kanilang tadhanang nakatali sa dagat.', 100, 0, 0),
(85, 3, 10, 'Ibong Adarna (Complete Text)', 330, '<strike>&#x20B1;410</strike>', 'Filipino', 'Virgilio S. Almario (Editor)', 'Adarna House, Inc.', 'New', NULL, 'Paperback', 99, NULL, 'Edited and annotated by Virgilio S. Almario<br><br>\r\n\r\nNarito ang orihinal na korido at buong kuwento ng Ibong Adarna. Bagong saliksik. Bagong pag-aaral. Dagdag na patnubay para sa guro at modernong mambabasa.', 268, 0, 0),
(86, 3, 10, 'Si Janus Silang at ang Tiyanak ng Tabon', 255, '<strike>&#x20B1;335</strike>', 'Filipino', 'Edgar Calabia Samar', 'Adarna House, Inc.', 'New', NULL, 'Paperback', 99, NULL, 'Sa tournament ng TALA Online sa bayan ng Balanga, namatay ang lahat ng manlalaro maliban kay Janus. Sunod-sunod pa ang naging kaso ng pagkamatay ng mga kabataan sa computer shops sa iba’t ibang panig ng bansa. Kinontak si Janus ng nagpakilalang Joey, isa rin umano sa mga nakaligtas sa paglalaro ng TALA na gaya niya. Hindi inasahan ni Janus ang mga matutuklasan niya mula rito na mag-uugnay sa kanya sa misteryo ng kinahuhumalingan niyang RPG—at sa alamat ng Tiyanak mula sa Tábon!<br><br>\r\n2015 ﻿National Book Award, Novel in Filipino<br>\r\n2016 National Children\'s Book Award, Best Reads for Kids', 180, 0, 0),
(87, 3, 10, 'Si Janus Silang at ang Labanang Manananggal Mambabarang', 280, '<strike>&#x20B1;360</strike>', 'Filipino', 'Edgar Calabia Samar', 'Adarna House, Inc.', 'New', NULL, 'Paperback', 99, NULL, 'Apat na buwan na si Janus sa mansiyon nina Manong Joey sa Angono pero naroon pa rin ang sakit ng dilang-karayom ng manananggal sa puso niya dahil sa pagkawala ng mga mahal sa buhay at sapilitang paglayo kay Mica.\r\n\r\nSimula ng Christmas break nang mawasak ang proteksiyon ng mansiyon laban sa Tiyanak at sa mga kampon nito. Matinding barang ba ito? Nawawala rin si Mira, ang isa sa kambal na baganing kasing-edad ni Janus at inampon din nina Manong Joey. Ipinagtapat naman ni Renzo kay Janus ang matagal na palang sinusundan ni Manong Isyo: bumalik sa mapa ng utak ng dalawang manong ang brain imprint ng Papa ni Janus at maaaring buhay pa pala ito!\r\n<br><br>\r\nAdditional Information:<br>\r\nIkalawang libro sa serye ng Janus Silang', 204, 0, 0),
(88, 3, 10, 'Buwan, Buwang Bulawan', 300, '<strike>&#x20B1;380</strike>', 'Filipino', 'Virgilio S. Almario/Abi Goy', 'Adarna House, Inc.', 'New', NULL, 'Paperback', 99, NULL, 'Poems by Virgilio S. Almario<br>\r\nWith illustrations by Abi Goy<br><br>\r\n\r\nA collection of poems for children, written by National Artist for Literature Rio Alma.\r\n<br><br>\r\nIsang koleksiyon ng mga tulang pambata ni Rio Alma, Pambansang Alagad ng Sining.', 120, 0, 0),
(89, 3, 6, 'Light', 410, NULL, '(wordless)', 'Rob Cham', 'Adarna House, Inc.', 'New', NULL, 'Paperback', 99, NULL, 'Story and illustrations by Rob Cham<br><br>\r\nThis wordless comic book follows the exploits of a backpack-toting adventurer in a quest to find a mysterious treasure. Framed in black, the illustrations offer delightful bursts of color and are sure to entertain readers of any age.\r\n<br><br>\r\n2016 National Book Award, Best Book of Graphic Literature (Wordless)', 114, 0, 0),
(90, 3, 6, 'Sixty Six', 435, NULL, 'Filipino', 'Russell Molina/Ian Sta. Maria', 'Adarna House, Inc.', 'New', NULL, 'Paperback', 99, NULL, 'Written by Russell Molina<br>\r\nIllustrated by Ian Sta. Maria<br><br>\r\nKuwento ni Celestino Cabal. Kabebertdey niya lang. Mayroon siyang natanggap na regalo na ngayo’y unti-unti niyang binubuksan. Ika nga ng matatanda, “Huli man daw at magaling, maihahabol din.”', 148, 0, 0),
(91, 3, 7, 'Si Janus Silang at ang Tiyanak ng Tabon (Manga)', 410, NULL, 'Filipino', 'Edgar Calabia Samar/Carljoe Javier/Natasha Ringor', 'Adarna House, Inc.', 'New', NULL, 'Paperback', 99, NULL, 'Based on the novel by Edgar Calabia Samar<br>\r\nAdaptation by Carljoe Javier<br>\r\nIllustrations by Natasha Ringor<br><br>\r\n\r\nAng akala ni Janus, pangkaraniwang laro lang ang TALA Online. Sunod-sunod ang pagbabago sa buhay niya matapos ang kahindik-hindik na pangyayari sa RPG tournament sa sinalihan niya. Pero nang matuklasan niya ang tunay na kaugnayan ng larong ito sa alamat ng Tiyanak ng Tabon, wala na siyang magawa kundi ipagpatuloy ang paglalaro!', 125, 0, 0),
(92, 3, 10, 'Detective Boys of Masangkay: Ang Mangkukulam', 355, '<strike>&#x20B1;435</strike>', 'Filipino', 'Bernalyn Hapin Sastrillo/Borg Sinaban', 'Adarna House, Inc.', 'New', NULL, 'Paperback', 99, NULL, 'Story by Bernalyn Hapin Sastrillo<br>\r\nIllustrations by Borg Sinaban<br><br>\r\nNawawala ang alagang pusa ni Ate Lotlot at ang alagang tuta ni Junjun. Ninakaw ang mga sinampay ni Aling Cora. Pinatay ang mga panabong na manok ni Mang Jimmy. Na-kidnap ang sikat na Shino Kid. May isang mangkukulam. May isang dalagitang bagong lipat.\r\n<br><br>\r\nMay tatlong binatilyong fans ni Detective Conan. Sila ang lulutas sa lahat ng misteryong bumabalot sa Barangay Masangkay.', 216, 0, 0),
(93, 3, 10, 'Piagsugpatan: Stories of the Mandaya', 280, '<strike>&#x20B1;360</strike>', 'English', 'Marcy Dans Lee et al.', 'Adarna House, Inc.', 'New', NULL, 'Paperback', 99, NULL, 'Retellings by Marcy Dans Lee<br>\r\nIllustrations by Marcy Dans Lee, Conrad Raquel, Aldy Aguirre, Teresa Escano<br><br>\r\nFor the Mandaya people, piagsugpatan or the horizon is a part of their lives. Piagsugpatan bridges the three material worlds: Langit, Lupa, at Ugsuban. In this book are eight stories that will help bridge the ancient Mandaya worldview with today’s young readers.', 90, 0, 0),
(94, 3, 10, 'Si Tito Libro at Ako', 280, '<strike>&#x20B1;360</strike>', 'Filipino', 'Uma Krishnaswami/Nanoy Rafael/JC Galag', 'Adarna House, Inc.', 'New', NULL, 'Paperback', 99, 'Nanoy Rafael', 'Story by Uma Krishnaswami<br>\r\nTranslated by Nanoy Rafael<br>\r\nIllustrations by JC Galag<br><br>\r\nPlano ng siyam na taóng gulang na si Yasmin na makapagbasá ng isang libro kada araw, habambuhay. Palaging may tamang libro para sa kaniya si Tito Libro, ang may-ari ng aklatan sa kanto. Pero biglang ipinasara ang aklat ni Tito Libro at kailangang huminto ni Yasmin sa pagbabasa para tulungan siya. Ano nga ba ang magagawa ni Yasmin at ng kaniyang mga kaibigan sa gitna ng nalalapit na eleksiyon? Matutulungan kaya sila ng artistang si Samuel Karate na tumatakbong Mayor?', 115, 0, 0);
INSERT INTO `product` (`product_id`, `merchant_id`, `product_type_id`, `name`, `price`, `previous_price`, `language`, `author`, `supplier`, `description`, `image_location`, `format`, `quantity_in_stock`, `translator`, `product_overview`, `pages`, `product_view_num`, `quantity_sold`) VALUES
(95, 3, 10, 'Supremo', 280, '<strike>&#x20B1;360</strike>', 'Filipino', 'Xi Zuq/Al Estrella ', 'Adarna House, Inc.', 'New', NULL, 'Paperback', 99, NULL, 'Story by Xi Zuq<br>\r\nWith illustrations by Al Estrella<br><br>\r\n“Supremo Andro!”<br><br>\r\n‘Yan ang gustong marinig ni Andro pagtuntong niya ng Grade 6. Kaya naisip niyang tumakbo bilang Supremo ng Katipunan.<br><br>\r\nHindi niya inakala na marami palang dapat gawin bago maging Supremo. Hindi niya inaasahan ang mga matututuhan niya bago maging pinuno.<br><br>\r\nMatupad kaya ang kaniyang pangarap na maging Supremo?<br><br>\r\n2016 National Children\'s Book Award, Best Reads for Kids', 105, 0, 0),
(96, 3, 10, 'Pangkat Papaya', 280, '<strike>&#x20B1;360</strike>', 'English', 'Xi Zuq/Al Estrella', 'Adarna House, Inc.', 'New', NULL, 'Paperback', 99, NULL, 'APAKOPO APANG HAPARIPI SAPA IPISKUPUL.\r\n<br><br>\r\nIto ang secret code na nakita ni Andro sa poster para sa Clubs Day ng kanilang paaralan. Akala niya magagawa niyang tuklasin ito kasama ni Miyo. Na dapat ay kasama rin niya sa paghahanda ng booth nila sa Comics Club. Pero parang may iba kay Miyo, at may mga lihim pa itong hindi niya alam.\r\n<br><br>\r\nMatuklasan kaya niya ang mga lihim na ito?', 105, 0, 0),
(97, 3, 10, 'Ang Lihim ng San Esteban', 280, '<strike>&#x20B1;360</strike>', 'Filipino', 'Acacio Flores/Nanoy Rafael', 'Adarna House, Inc.', 'New', NULL, 'Paperback', 99, NULL, 'Story by Annette Acacio Flores<br>\r\nTranslation by Nanoy Rafael<br>\r\n<br>\r\nUnang beses magbabakasyon ni Jacobo sa San Esteban sa Ilocos, at magkahalong pananabik at kaba ang dala ng biyahe papunta sa probinsiya ng mga magulang niya. Siguradong marami siyang matutuklasan tungkol sa kasaysayan ng kaniyang pamilya mula kay Lola Carmen! Ngunit hindi niya inaasahang may mas malaking lihim sa mga lumang bahay at multo ng San Esteban. Ang mga ito kaya ang susi sa misteryong pilit na ikinukubli ni Lola Carmen?', 100, 0, 0),
(98, 3, 10, 'Can We Live on Mars', 230, '<strike>&#x20B1;310</strike>', 'English', 'Gidget Jimenez/Bru', 'Adarna House, Inc.', 'New', NULL, 'Paperback', 99, NULL, 'Text by Gidget Jimenez<br>\r\nIllustrations by Bru<br>\r\n<br>\r\nAt the rate that people are exploring space, will it take long before we actually start living on Mars? Discover the beginnings of astronomy, the different kinds of heavenly bodies, and the many space explorations taking place. Find out whether we can live on Mars.<br><br>\r\n2010 Best Reads for Kids, 1st National Children’s Book Awards', 40, 0, 0),
(99, 3, 10, 'Can We Drink the Ocean', 230, '<strike>&#x20B1;310</strike>', 'English', 'Gidget Jimenez/Isabel Roxas', 'Adarna House, Inc.', 'New', NULL, 'Paperback', 99, NULL, 'Text by Gidget Jimenez<br>\r\nIllustrations by Isabel Roxas<br>\r\n<br>\r\nIf 70 percent of the world is made up of water, why is everyone worrying about it running out? Discover the properties of water, along with its cycle, treatment, distribution, and how you can help conserve it. Find out whether we can drink the ocean.', 40, 0, 0),
(100, 3, 10, 'Can We Plug Into Lightning', 230, '<strike>&#x20B1;310</strike>', 'English', 'Gidget Jimenez/Beth Parrocha-Doctolero', 'Adarna House, Inc.', 'New', NULL, 'Paperback', 99, NULL, 'Text by Gidget Jimenez<br>\r\nIllustrations by Beth Parrocha-Doctolero<br>\r\n<br>\r\nThey say that lightning is made of electricity. Is that where the electricity of a light bulb comes from? Discover how a light bulb works, the sources of energy, how energy is changed to electricity, and how electricity travels to our home.', 40, 0, 0),
(101, 3, 10, 'Guardians of Tradition: The Gawad sa Manlilikha ng Bayan', 230, '<strike>&#x20B1;310</strike>', 'English', 'Mae Astrid Tobias/Rommel Joson/Renato S. Rastrollo', 'Adarna House, Inc.', 'New', NULL, 'Paperback', 99, NULL, 'Text by Mae Astrid Tobias<br>\r\nIllustrations by Rommel Joson<br>\r\nPhotos by Renato S. Rastrollo<br>\r\n<br>\r\nJoin Banog and Kiko as they discover the Philippines’ National Living Treasures: Uwang Ahadas, Hadja Amina Appi, Ginaw Bilog, Federico Caballero, Lang Dulay, Masino Intaray, Salinta Monon, Eduardo Mutuc, Alonzo Saclag, Darhata Sawabi, and Samaon Sulaiman. Read about these people’s dedication to their craft and the tradition of their forebears.', 32, 0, 0),
(102, 3, 10, 'Handa Ako', 200, '<strike>&#x20B1;280</strike>', 'Filipino', 'Liwliwa Malabed/Mia Lagos', 'Adarna House, Inc.', 'New', NULL, 'Paperback', 99, NULL, 'Written by Liwliwa Malabed<br>\r\nIllustrated by Mia Lagos<br>\r\n<br>\r\nAno ang dapat gawin kapag may bagyo, lindol, sumabog na bulkan, o sunog? Ang aklat na ito ang maghahanda sa iyo sa anumang sakuna!', 44, 0, 0),
(103, 3, 10, 'Diksiyonaryong Adarna', 830, '<strike>&#x20B1;910</strike>', 'Filipino', 'Adarna House, Inc.', 'Adarna House, Inc.', 'New', NULL, 'Paperback', 99, NULL, 'A Filipino dictionary for high school, Diksiyonaryong Adarna was created to be the partner of students in their study of Philippine language and literature. It contains unfamiliar words found in El Filibusterismo, Noli Me Tangere, and Florante at Laura. To make it easier to understand, main entries also include sample sentences. It also contains entries that represent art, culture, and local beliefs of the different ethnic groups in the Philippines. Apart from being an instrument towards discovering how rich the Filipino language is, Diksiyonaryong Adarna also aims to instill in students a love for their own language.', 800, 0, 0),
(104, 3, 10, 'What Kids Should Know About Andres and the Katipunan', 230, '<strike>&#x20B1;310</strike>', 'English', 'Weng Cahiles/Isa Natividad', 'Adarna House, Inc.', 'New', NULL, 'Paperback', 99, NULL, 'Author: Weng Cahiles<br>\r\nIllustrator: Isa Natividad<br>\r\n<br>\r\nWho was Andres Bonifacio? How was Andres as a brother, a husband, and as a revolutionary leader? Here is a handy reference for children on the life of the Supremo and the Katipunan.\r\n<br><br>\r\n2014 Best Read for Kids, 3rd National Children’s Book Awards', 48, 0, 0),
(105, 3, 6, 'Piko', 410, NULL, 'Filipino/English', 'Josel Nicolas (Editor) et al.', 'Adarna House, Inc.', 'New', NULL, 'Paperback', 99, NULL, 'Edited by Josel Nicolas\r\n<br><br>\r\nA Filipino comic book for kids, this is a collection of 20 visual stories from 22 creators.\r\n<br><br>\r\nAwit ng Paggala (Laraine Gazmen & Adam David)<br>\r\nCaptain Old vs Pambatang Komiks (Josel Nicolas)<br>\r\nDressing Up with Dolly (Trizha Ko)<br>\r\nThe Sculptor (Rommel Estanislao)<br>\r\nLimang Kuwentong _ _ _ _ _ (Marlon Hacla & Apol Sta. Maria)<br>\r\nAng Panaginip ni Benjo Bato (Josel Nicolas)<br>\r\nLucky (Julius Villanueva)<br>\r\nIñigo’s Day Out (Adam David & Mervin Malonzo)<br>\r\nSalamin (Josel Nicolas)<br>\r\nKukote Ko (Rob Cham with Karize Uy)<br>\r\nThe Magic Brush (Daniela Go)<br>\r\nTreat (Joanne Cesario & Michelle Bacabac)<br>\r\nImposible (JP Palabon)<br>\r\nHotcakes X Jimbob at ang Ulan (Josel Nicolas)<br>\r\nSi Ella at ang Sigwa (Manix Abrera, Kyth Pallogan, & Karize Uy)<br>\r\nAng Kahon (Bong Redila)<br>\r\nSalamin Part 2 (Josel Nicolas)<br>\r\nAwit ng Pagbalik (Adam David & Laraine Gazmen)', 96, 0, 0),
(106, 3, 10, 'Hating Kapatid', 180, '<strike>&#x20B1;260</strike>', 'Filipino/English', 'Raissa Rivera Falgui/Fran Alvarez', 'Adarna House, Inc.', 'New', NULL, 'Paperback', 99, NULL, 'Story by Raissa Rivera Falgui<br>\r\nIllustrations by Fran Alvarez<br>\r\n<br>\r\nHati kami ni Kuya sa anumang pagkain. Pero bakit palaging mas marami at mas malaki ang napupunta sa kaniya? Ganito ba talaga ang hating kapatid?\r\n<br><br>\r\nKuya and I always share food. But why is his share always bigger? Is this what fair share means?\r\n<br><br>\r\n2014 Best Read for Kids, 3rd National Children’s Book Awards', 32, 0, 0),
(107, 3, 10, 'Kung Linggo', 180, '<strike>&#x20B1;260</strike>', 'Filipino', 'Virgilio S. Almario/Abi Goy', 'Adarna House, Inc.', 'New', NULL, 'Paperback', 99, NULL, '\"Kung Linggo, nag-iimbita ako ng tigre...\"\r\n<br><br>\r\nNaglalaman ang librong ito ng tula tungkol sa mga pambihirang pangyayari tuwing kasama ng isang bata ang kaniyang pang-Linggong kalaro.', 32, 0, 0),
(108, 3, 10, 'Pag-abot ni Kolor sa Lungsod', 180, '<strike>&#x20B1;260</strike>', 'Cebuano/Filipino', 'Susan Dela Rosa Aragon', 'Adarna House, Inc.', 'New', NULL, 'Paperback', 99, 'Susan Dela Rosa Aragon', 'Kaniadto hugaw ug subo ang lungsod sa Abog. Tapolan man god manglimpiyo ang mga tawo dinhi. Nausab lang ang tanan dihang miabot sa ilang dapit ang usa ka mamimintal nga subling gahatag og kolor sa palibot.\r\n<br><br>\r\nAdditional Information:\r\n<br>\r\nHinubad sa Cebuano ni Richel Dorotan ug Dr. Erlinda K. Alburo', 32, 0, 0),
(109, 3, 10, 'Si Ambongan', 180, '<strike>&#x20B1;260</strike>', 'Cebuano/Filipino', 'Lamberto Antonio/J.B. dela Peña', 'Adarna House, Inc.', 'New', NULL, 'Paperback', 99, NULL, 'Adaptation by Lamberto Antonio<br>\r\nIllustrations by J.B. dela Peña<br>\r\n<br>\r\nKini ang sugid sa kabayanihan ni Ambongan, usa ka batang nagpuyo sa Mactan sa panahon sa pag-abot ni Magellan. Pinauyon kining sugid sa Makisig, The Little Hero of Mactan nga sinulat ni Gemma Cruz Araneta kinsa maoy nakadaog sa unang ganti sa indigay sa panulat og sigulanong pangbata.', 32, 0, 0),
(110, 3, 10, 'Si Diwayen, Noong Bago Dumating ang mga Espanyol', 180, '<strike>&#x20B1;260</strike>', 'Filipino/English', 'Augie Rivera/Paolo Lim', 'Adarna House, Inc.', 'New', NULL, 'Paperback', 99, NULL, 'Story by Augie Rivera<br>\r\nIllustrations by Paolo Lim<br>\r\n<br>\r\nLunhaw and Diwayen are friends. But their fates are just too different: Lunhaw is a princess, while Diwayen is a slave. Will Diwayen ever taste true freedom?\r\n<br><br>\r\nMagkaibigan si Lunhaw at si Diwayen. Ngunit sadyang magkaiba ang kanilang kapalaran: prinsesa si Lunhaw habang alipin naman si Diwayen. Makamit kaya ni Diwayen ang tunay na kalayaan?\r\n<br><br>\r\nAdditional Information:<br>\r\nFeatured in the Batang Historyador series are stories of the challenges, dreams, and awakening of five children from five different relevant points of Philippine history. Each story is a glimpse in the way of life and rights of the children during these periods, and a look back at the colorful past of the country.', 32, 0, 0),
(111, 1, 8, 'Scratchbuild Revolution Hobbymate 12th Anniversary Edition', 3500, NULL, 'English', NULL, 'USA Gundam Store', 'New', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(112, 1, 2, 'Tuesdays with Morrie', 300, NULL, 'English', 'Mitch Albom', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, NULL, '\"The way to get meaning into your life is to devote yourself to loving others, devote yourself to your community around you, and devote yourself to creating something that gives you purpose and meaning.\"', NULL, 0, 0),
(113, 1, 6, 'Watchmen', 500, NULL, 'English', 'Alan Moore/Dave Gibbons', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, NULL, 'In the midst of a global crisis, where people and nations are in conflict with each other, how do you get everyone to resolve their differences, and be united as one community?', NULL, 0, 0),
(114, 1, 2, 'The Alchemist', 350, NULL, 'English', 'Paulo Coelho', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, NULL, 'Brazilian writer, Paulo Coelho, was 39 years old when he wrote \"The Alchemist\". It was one of the many books that he wrote after coming from a pilgrimage in \"El camino\". One of the things that I remember after reading this book is that the universe helps each person to realize his or her dream. \r\n<br><br>\r\nIn life, there comes a point when we find ourselves locked in a system where we feel that instead of helping us realize our dream, the universe seems to be conspiring against us. And the worst part is that the moment you believe this lie, it becomes a reality.\r\n<br><br>\r\nWhile it may be true that the infinite possibilities of life have already been written down, and therefore, there may be times when we may feel that we have not been given much choice on the path that we take, by being good and kind to as many people as we can, naturally, effortlessly, that is, not forced, we can learn to trust that things are going well, as they should.', NULL, 0, 0),
(115, 1, 2, 'Made in America', 350, NULL, 'English', 'Sam Walton/John Huey', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, NULL, 'This is a book which after finishing reading, I started reading again from the beginning. It shares the story of Sam Walton and how he and his team built the retail giant, Wal-Mart. I highly recommend this book to anyone who wants to understand the retail industry and the history of its development in the American context.<br><br>Here are 3 key lessons: 1) the US heavily imports its goods from Asia because their cost and quality are much more competitive abroad (this reminds me of the situation in the Philippines), 2) a successful IPO can wipe off debt and make many people millionaires, and 3) Even if many people become millionaires and after having lowered the cost of goods down to a cheap level, yet still guarantee customer satisfaction, there will always be people who, one way or another, would remain economically poor and would rather receive handouts from rich people. This third one is an important insight for those who like Usbong also have a mission to defeat poverty.', NULL, 0, 0),
(116, 1, 2, 'Goethe\'s Faust', 400, NULL, 'German/English', 'Goethe/Walter Kaufmann', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, 'Walter Kaufmann', 'In this classic masterpiece, we find Dr. Faust, a middle-aged scholar and scientist who has promised the devil his soul in exchange for finding the true meaning of life. It took the German poet, Goethe, his whole life to complete this poem. And the poem does show how Goethe\'s way of thinking evolved as he aged from the time he began writing it at age 20, until he finished it just before he passed away at 83.\r\n<br><br>\r\nIf you haven\'t read it, or have yet to hear the story, consider this: if you were given a choice to live any life you want, e.g. become the wealthiest, be loved by anyone, become the most powerful, and in exchange, you\'ll have to die, would you take it?\r\n<br><br>\r\nThis version includes the original German and English translation.', NULL, 0, 0),
(117, 1, 2, 'Blink', 300, NULL, 'English', 'Malcolm Gladwell', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, NULL, '\"The Power of Thinking Without Thinking\"', NULL, 0, 0),
(118, 1, 2, 'The Tipping Point', 300, NULL, 'English', 'Malcolm Gladwell', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(119, 1, 8, 'The Art of the Matrix', 500, NULL, 'English', NULL, NULL, 'Used - Very Good', NULL, 'Paperback', 1, NULL, 'This Matrix collectible contains concept designs, shooting script (final draft before filming), scene notes, as well as deleted script excerpts. If you haven\'t yet seen the film, here\'s something to ponder on: if you were given two pills, one pill leads you to the truth about everything, which is grim and far from anything ideal, while the other leads you back to the fantasy world where all your dreams can come true, which would you take?', NULL, 0, 0),
(120, 1, 9, 'BJT Business Japanese Proficiency Test Listening and Reading Comprehension (with 2 CDs)', 1170, NULL, 'Japanese', 'JETRO', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, NULL, 'This is one of three BJT (Business Japanese Test) reviewers that I bought to prepare for the exam. I had passed the highest level of the Japanese Language Proficiency Test (JLPT) in about 5 years time, after I formally began studying the language, yet I knew that my nihongo was far from perfect. <br><br>Passing the JLPT offered some sort of an assurance to employers and schools that a student is able to effectively use the language at a level somewhat equivalent to a high school student. However, for specialized words that are learned in university, graduate school, and the workplace, the student will have to learn to pick them up his or herself. Little did I know that what I lacked wasn\'t really more complicated words, but understanding of Japanese culture. <br><br>I never did get to take the BJT. Somehow, I found myself out of the corporate world to which I am ever grateful for the many hard lessons that I\'ve learned, and in school, teaching Japanese language and culture (at least from what I can understand) to high school students. <br><br>It will take me several more years before the cultural aspect of Japan really began to dawn on me. I cannot say that I fully understand it, but I do know that my becoming a teacher helped me.', NULL, 0, 0),
(121, 1, 9, 'BJT Business Japanese Proficiency Test Official Guide (with CD)', 820, NULL, 'Japanese', 'JETRO', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, NULL, 'This is one of three BJT (Business Japanese Test) reviewers that I bought to prepare for the exam. I had passed the highest level of the Japanese Language Proficiency Test (JLPT) in about 5 years time, after I formally began studying the language, yet I knew that my nihongo was far from perfect. <br><br>Passing the JLPT offered some sort of an assurance to employers and schools that a student is able to effectively use the language at a level somewhat equivalent to a high school student. However, for specialized words that are learned in university, graduate school, and the workplace, the student will have to learn to pick them up his or herself. Little did I know that what I lacked wasn\'t really more complicated words, but understanding of Japanese culture. <br><br>I never did get to take the BJT. Somehow, I found myself out of the corporate world to which I am ever grateful for the many hard lessons that I\'ve learned, and in school, teaching Japanese language and culture (at least from what I can understand) to high school students. <br><br>It will take me several more years before the cultural aspect of Japan really began to dawn on me. I cannot say that I fully understand it, but I do know that my becoming a teacher helped me.', NULL, 0, 0),
(122, 1, 9, 'BJT Business Japanese Proficiency Test-Practice Test and Strategies (with CD)', 1100, NULL, 'Japanese', 'JAL Academy', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, NULL, 'This is one of three BJT (Business Japanese Test) reviewers that I bought to prepare for the exam. I had passed the highest level of the Japanese Language Proficiency Test (JLPT) in about 5 years time, after I formally began studying the language, yet I knew that my nihongo was far from perfect. <br><br>Passing the JLPT offered some sort of an assurance to employers and schools that a student is able to effectively use the language at a level somewhat equivalent to a high school student. However, for specialized words that are learned in university, graduate school, and the workplace, the student will have to learn to pick them up his or herself. Little did I know that what I lacked wasn\'t really more complicated words, but understanding of Japanese culture. <br><br>I never did get to take the BJT. Somehow, I found myself out of the corporate world to which I am ever grateful for the many hard lessons that I\'ve learned, and in school, teaching Japanese language and culture (at least from what I can understand) to high school students. <br><br>It will take me several more years before the cultural aspect of Japan really began to dawn on me. I cannot say that I fully understand it, but I do know that my becoming a teacher helped me.', NULL, 0, 0),
(123, 4, 11, 'Hondashi 1kg', 870, NULL, 'Japanese/Mandarin', NULL, NULL, 'New', NULL, NULL, 1, NULL, 'This is a necessary ingredient for many Japanese cuisines.<br><br>Expiration: Dec. 16, 2018', NULL, 0, 0),
(125, 4, 11, 'Golden Curry Regular Hot', 235, NULL, 'Japanese', NULL, NULL, 'New', NULL, NULL, 1, NULL, 'Recipe:<br>\r\n1) Put chopped potatoes, carrots, onions, thinly sliced meat into a pot of water that is only 1 inch higher when all the ingredients are in place.<br>\r\n2) Cover the pot and boil the ingredients.<br>\r\n3) When the potatoes and the carrots can be easily pierced using a wooden chopstick, break into 4 smaller cubes 1 of the 2 big cubes of Golden Curry, put them in the pot, and boil until they melt.<br>\r\n4) In low heat, mix from time to time until it becomes thick.\r\n<br><br>\r\nExpiration: Feb. 1, 2019', NULL, 0, 0),
(126, 4, 11, 'Kikkoman Soy Sauce Naturally Brewed 1Litre', 350, NULL, 'English', NULL, NULL, NULL, NULL, NULL, 1, NULL, 'Combined with water and plenty of sugar, this forms a vital ingredient to any Japanese cuisine, such as yasai itame (sautéed mixed vegetables). I also like adding this sauce\'s combination to boiled chopped daikon and carrots.', NULL, 0, 0),
(127, 4, 11, 'Spam 340g', 220, NULL, 'English', NULL, NULL, NULL, NULL, NULL, 1, NULL, 'I remember my American professor in Japan calmly joking that while we commonly know spam as unsolicited emails from strangers, Spam, the food, is actually amazingly popular in the state of Hawaii.', NULL, 0, 0),
(128, 4, 11, 'Heinz Tomato Ketchup', 115, NULL, 'English', NULL, NULL, 'New', NULL, NULL, 1, NULL, 'I often find myself putting a lot of this Heinz Tomato Ketchup when I eat my home-made clubhouse sandwich. Simply delicious.\r\n<br><br>\r\nNet Weight: 20 Oz<br>\r\nExpiration: July 7, 2018', NULL, 0, 0),
(129, 4, 12, 'Schick Exact 2 Razors 2plus1', 125, NULL, 'English', NULL, NULL, NULL, NULL, NULL, 1, NULL, 'It is said that a Zen Buddhist monk carried only a few things with him. One of those things is a razor for shaving. ', NULL, 0, 0),
(130, 4, 11, 'Nissin Cup Noodles with Shrimp 64g', 115, NULL, 'English', NULL, NULL, 'New', NULL, NULL, 1, NULL, 'During my brief stay in UTown (University Town), Singapore, I brought with me a number of Nissin Cup Noodles, because I didn\'t want to spend too much time and energy looking for food that would cost way beyond my budget. As it turned out,  UTown has a wonderful cafeteria which sold authentic noodle soups that cost more or less the same as the Nissin Cup Noodles I brought. Still, it is good to come prepared. Just add hot water, wait for 5mins, and you\'re ready to eat!', NULL, 0, 0),
(131, 4, 12, 'Safeguard Value Pack 3x135g', 180, NULL, 'English', NULL, NULL, 'New', NULL, NULL, 1, NULL, 'We\'ve been using Safeguard soap since I can remember. It is difficult to imagine a world without it.', NULL, 0, 0),
(132, 4, 12, 'Old Spice High Endurance Dry Cream Pure Sport 45g', 296, NULL, 'English', NULL, NULL, 'New', NULL, NULL, 1, NULL, 'I remember saying as a kid that only people who stink use deodorants. While honestly true, deodorants were made precisely because people didn\'t want to stink...', NULL, 0, 0),
(133, 4, 11, 'JBC Happy Peanuts 100g', 100, NULL, 'English', NULL, NULL, 'New', NULL, NULL, 1, NULL, NULL, NULL, 0, 0),
(134, 1, 8, 'The Legend of Zelda Hyrule Historia', 2000, NULL, 'English', NULL, NULL, 'Used - Very Good', NULL, NULL, 1, NULL, 'There was a time when I could say that I\'ve played all the Zelda games for the Gameboy. Now, with all the Nintendo consoles, new and not-so-new, I must admit that I have yet to catch up. This book provides a historia of the development of this wonderful game from its early beginnings until Skyward Sword. It includes character designs, concept art, and a manga towards the end. What I particularly like about the Zelda series is that unlike other role-playing games, a person need not have to spend time \"leveling-up\". Instead, he or she must use his wit to solve puzzles and defeat bosses, which can be quickly achieved if one understands the way.', NULL, 0, 0),
(135, 4, 11, 'marukome dashiiri katsuo kombu miso 1kg', 250, NULL, 'Japanese', NULL, NULL, NULL, NULL, NULL, 1, NULL, 'Miso shiru or Miso soup is a common--we can say--even daily food in Japan. Moreover, unlike other miso\'s sold in the market, this already contains hondashi, so there is no more need to add it, and the soup will still have an authentic taste. ', NULL, 0, 0),
(136, 4, 11, 'yakisoba sauce 1,200g', 350, NULL, 'Japanese', NULL, NULL, NULL, NULL, NULL, 1, NULL, 'Although the carton says that it\'s yakisoba (stir-fried noodles) sauce, one can use this sauce for other food as well. For example, as a sort of teriyaki sauce for chicken, fish, and other types of meat.<br><br>\r\nExpiration: May 8, 2019', NULL, 0, 0),
(137, 4, 11, 'kewpie Japanese mayonnaise 500g', 275, NULL, 'Japanese', NULL, NULL, NULL, NULL, NULL, 1, NULL, 'Kewpie Japanese mayonnaise has a distinct taste when compared to mayonnaise sold in the local market. In Japan, there is even a name for people who like mayonnaise. It\'s \"mayo-ra\".', NULL, 0, 0),
(138, 4, 11, 'The Original Hotcake Mix Fluffy n Tasty', 135, NULL, 'English', NULL, NULL, NULL, NULL, NULL, 1, NULL, 'I remember in Hayao Miyazaki\'s Kiki\'s Delivery Service, the protagonist, Kiki, went out to a far away town to learn to become independent. Because she had a tight budget, she mostly ate hot cakes. At some point in the film, she lamented that she didn\'t know what she\'d do if she became a grandma and still no customers appeared. On a happy note, she and her elder sister-like friend flipped hot cakes and ate them for dinner during one of their stays in a forest cabin.', NULL, 0, 0),
(139, 4, 11, 'McCormick Iodized Salt 140g', 100, NULL, 'English', NULL, NULL, 'New', NULL, NULL, 1, NULL, 'Iodized salt prevents iodine deficiency disorders. According to the World Health Organization (WHO), \"Iodine is essential for healthy brain development in the fetus and young child. Iodine deficiency negatively affects the health of women, as well as economic productivity and quality of life.\"\r\n<br><br>\r\nReference:<br> <a href=\"http://www.who.int/elena/titles/salt_iodization/en/\">http://www.who.int/elena/titles/salt_iodization/en/</a>; last accessed: 20170821', NULL, 0, 0),
(140, 4, 12, 'izumi Glass Teapot with Strainer 700ml', 158, NULL, 'English', NULL, NULL, NULL, NULL, NULL, 1, NULL, 'This izumi Glass Teapot with Strainer combines well with sencha (Green Tea). Just put enough sencha leaves to cover the bottom part of the strainer, fill the teapot with hot water (yes, the water needs to be really hot, not warm), and then wait for 3mins. You\'ll see that the color of the water will turn lime green. It should now be ready to drink. If you wait longer, the color of the water will eventually turn brown. It will still be drinkable, but it may already be cold.', NULL, 0, 0),
(141, 4, 5, 'PROMO-sencha (Green Tea), izumi Glass Teapot with Strainer 700ml', 312, '<strike>&#x20B1;383</strike>', 'English', NULL, NULL, NULL, NULL, NULL, 1, NULL, 'This izumi Glass Teapot with Strainer combines well with sencha (Green Tea). Just put enough sencha leaves to cover the bottom part of the strainer, fill the teapot with hot water (yes, the water needs to be really hot, not warm), and then wait for 3mins. You\'ll see that the color of the water will turn lime green. It should now be ready to drink. If you wait longer, the color of the water will eventually turn brown. It will still be drinkable, but it may already be tepid.', NULL, 0, 0),
(142, 1, 5, 'PROMO-erin (with DVDs) vol 1-3', 5320, '<strike>&#x20B1;7776</strike>', 'Japanese', NULL, NULL, NULL, NULL, 'Paperback', 1, NULL, 'This erin series contains manga, cultural notes, basic and advanced skits (translated from Japanese to English, Portuguese, Korean, and Simplified Mandarin) as well as their videos in DVDs, as they share the story of erin, an international student, studying in a high school in Japan and living with a Japanese host family.', NULL, 0, 0),
(143, 1, 7, 'Nodame Manga set (1-25 complete)', 3250, '<strike>&#x20B1;5000</strike>', 'Japanese', NULL, NULL, 'Used - Good', NULL, NULL, 1, NULL, NULL, NULL, 0, 0),
(144, 1, 5, 'PROMO-kanzen masta- 1kyuu and 2kyuu', 1750, '<strike>&#x20B1;1820</strike>', 'Japanese', NULL, NULL, 'New', NULL, NULL, 1, NULL, 'These two books are invaluable reference guides pertaining to the intricate grammar structure of the Japanese language. As a reference guide, I do not recommend reading them from cover to cover, but referring to them when one encounters a new or perplexing grammar pattern. These should not only be helpful in passing N2 and N1 of the Japanese Language Proficiency Test (JLPT), but also in achieving mastery of the ever evolving Japanese language.\r\n<br><br>\r\n<i>Discounted from <strike>&#x20B1;1820</strike></i>\r\n', NULL, 0, 0),
(145, 3, 10, 'Alpabetong Filipino', 180, '<strike>&#x20B1;260</strike>', 'Filipino', 'Virgilio S. Almario/Paul Eric Roca', NULL, 'New', NULL, 'Paperback', 99, NULL, 'Story by Virgilio S. Almario<br>\r\nIllustrations by Paul Eric Roca<br>\r\n<br>\r\nIsa sa mga unang libro ng bata, tungkol sa alpabetong Filipino, na nagtatampok ng mga halimbawang salita para sa bawat titik.', 32, 0, 0),
(146, 3, 10, 'Ang Alamat ng Palay', 180, '<strike>&#x20B1;260</strike>', 'Filipino/English', 'Virgilio S. Almario/Conrad Raquel', NULL, 'New', NULL, 'Paperback', 99, NULL, 'Story by Virgilio S. Almario<br>\r\nIllustrations by Conrad Raquel<br>\r\n<br>\r\nRice is very important to the Filipino, which is why there are so many legends regarding the grain. One of these stories is of husband-and-wife Banag and Danas, and how agriculture began in the Philippines.\r\n<br><br>\r\nNapakahalaga ng bigas sa mga Filipino. Kaya naman napakaraming alamat tungkol sa palay. Isa na rito ang kuwento ng mag-asawang Banag at Danas, at kung paano nagsimula ang agrikultura sa Filipinas.', 32, 0, 0),
(147, 3, 10, 'Alamat ng Ampalaya', 180, '<strike>&#x20B1;260</strike>', 'Filipino/English', 'Augie Rivera/Kora Dandan-Albano', NULL, 'New', NULL, 'Paperback', 99, NULL, 'Story by Augie Rivera<br>\r\nIllustrations by Kora Dandan-Albano<br>\r\n<br>\r\nThis is an original story on the legend of the bitter gourd. The story excites the imagination of children and warns them against the evil of envy and greed.\r\n<br><br>\r\nIsang orihinal na kuwento tungkol sa alamat ng ampalaya, pinupukaw nito ang imahinasyon ng mga bata at binabalaan sila sa kasamaang dulot ng pagkainggit at kasakiman.\r\n<br><br>\r\nFinalist – 1995 PBBY-Salanga Prize', 32, 0, 0),
(148, 3, 10, 'Filemon Mamon', 180, '<strike>&#x20B1;260</strike>', 'Filipino/English', 'Christine Bellen/Jason Moss', NULL, 'New', NULL, 'Paperback', 99, NULL, 'Story by Christine Bellen<br>\r\nIllustrations by Jason Moss<br>\r\n<br>\r\n“Charge!” shouts Filemon Mamon, raising his arms that shook with fat. He dreams of playing the revolutionary hero Andres Bonifacio for the school play. Do lead roles only go to skinny people?\r\n<br><br>\r\n“Sugod, mga kapatid!” sigaw ni Filemon Mamon, sabay taas ng mga braso niyang umaalog sa taba. Pangarap niyang gumanap bilang Andres Bonifacio sa dula. Ngunit payat nga lang ba ang maaaring maging bida?', 32, 0, 0),
(149, 3, 10, 'Naging Manlililok si Wigan', 180, '<strike>&#x20B1;260</strike>', 'Filipino', 'Felice Prudente Sta. Maria et al.', NULL, 'New', NULL, 'Paperback', 99, NULL, 'Story by Felice Prudente Sta. Maria<br>\r\nIllustrations by Robbie Bautista<br>\r\nTranslation by Michael M. Coroza<br>\r\n<br>\r\nAlong with other Ifugaw farmers, Wigan farms on the highlands’ magnificent payyo. When his crops suddenly and unexpectedly fail, he asks help from the gods in heaven. It is through these gods that Wigan learns to create a bul-ol, and begins the art of sculpture.\r\n<br><br>\r\nIsa si Wigan sa mga Ifugaw na nagsasaka sa dakilang payyo. Nang hindi maging sapat ang kaniyang ani, agad siyang humingi ng tulong sa mga diyos sa kalangitan. Sa tulong ng mga diyos, natutuhan niyang lumikha ng bul-ol: dito nagsimula ang sining ng paglililok\r\n<br><br>\r\nPublished in partnership with Filipinas Heritage Library and National Commission on Culture and Arts', 32, 0, 0),
(150, 3, 10, 'Si Pilandok at ang Manok na Nangingitlog ng Ginto', 180, '<strike>&#x20B1;260</strike>', 'Filipino/English', 'Virgilio S. Almario/Kora Dandan-Albano', NULL, 'New', NULL, 'Paperback', 99, NULL, 'Retelling by Virgilio S. Almario<br> Illustrations by Kora Dandan-Albano<br>\r\n<br>\r\nPilandok is a well-loved folk hero especially popular in the Muslim areas. His name is the Filipino equivalent for the mouse deer. In folk tales, Pilandok is portrayed as a clever creature who loves to play tricks—and his tricks often land him in difficult situations! However, it is also because of his wit that he is saved, unscathed, every time.  \r\n<br><br>\r\nIsang kilalang tauhan si Pilandok sa mga kuwentong bayan ng Timog, lalo na sa lugar ng mga Muslim. Ang kaniyang pangalan ay ang salin para sa ‘mouse deer.’ Sa mga kuwentong bayan, si Pilandok ay matalino at palabiro kaya’t malimit siyang nalalagay sa panganib. Ngunit, ang kaniyang katalinuhan din ang sumasagip sa kaniya.', 32, 0, 0),
(151, 1, 12, 'Best Buy Popsicle Sticks 100pieces Red', 122, NULL, 'English', NULL, NULL, 'New', NULL, NULL, 99, NULL, 'If you already have a glue gun with glue sticks, you can already start building all sorts of nifty stuff with 100pieces of popsicle sticks. For example, miniature houses, boats, buildings, just to name a few. And you can easily find many more DIY (Do-It-Yourself) examples on Youtube. I recommend 7 year olds to start building things with popsicle sticks, together with their parents.<br><br>Check out our PROMOS category if you want to get all 3 items (glue gun, glue sticks, and popsicle sticks) in one go!', NULL, 0, 0),
(152, 1, 12, 'Best Buy Popsicle Sticks 100pieces Yellow', 122, NULL, 'English', NULL, NULL, 'New', NULL, NULL, 99, NULL, 'If you already have a glue gun with glue sticks, you can already start building all sorts of nifty stuff with 100pieces of popsicle sticks. For example, miniature houses, boats, buildings, just to name a few. And you can easily find many more DIY (Do-It-Yourself) examples on Youtube. I recommend 7 year olds to start building things with popsicle sticks, together with their parents.<br><br>Check out our PROMOS category if you want to get all 3 items (glue gun, glue sticks, and popsicle sticks) in one go!', NULL, 0, 0),
(153, 1, 12, 'Best Buy Popsicle Sticks 300pieces Yellow', 206, NULL, 'English', NULL, NULL, 'New', NULL, NULL, 99, NULL, 'If you already have a glue gun with glue sticks, you can already start building all sorts of nifty stuff with 300pieces of popsicle sticks. For example, miniature houses, boats, buildings, just to name a few. And you can easily find many more DIY (Do-It-Yourself) examples on Youtube. I recommend 7 year olds to start building things with popsicle sticks, together with their parents.<br><br>Check out our PROMOS category if you want to get all 3 items (glue gun, glue sticks, and popsicle sticks) in one go!', NULL, 0, 0),
(154, 1, 12, 'Glue Gun Small Acura ZD-5', 200, NULL, 'English', NULL, NULL, 'New', NULL, NULL, 99, NULL, 'If you already have glue sticks and popsicle sticks, you can already start building all sorts of nifty stuff. For example, miniature houses, boats, buildings, just to name a few. And you can easily find many more DIY (Do-It-Yourself) examples on Youtube. I recommend 7 year olds to start building things with popsicle sticks, together with their parents.<br><br>Check out our PROMOS category if you want to get all 3 items (glue gun, glue sticks, and popsicle sticks) in one go!\r\n', NULL, 0, 0),
(155, 1, 12, 'Glue Stick Small 6pieces', 96, NULL, 'English', NULL, NULL, 'New', NULL, NULL, 99, NULL, 'If you already have a glue gun and popsicle sticks, you can already start building all sorts of nifty stuff. For example, miniature houses, boats, buildings, just to name a few. And you can easily find many more DIY (Do-It-Yourself) examples on Youtube. I recommend 7 year olds to start building things with popsicle sticks, together with their parents.<br><br>Check out our PROMOS category if you want to get all 3 items (glue gun, glue sticks, and popsicle sticks) in one go!\r\n', NULL, 0, 0),
(156, 1, 5, 'PROMO-Glue Gun, Glue Sticks 6pieces, Popsicle Sticks 100pieces', 274, NULL, 'English', NULL, NULL, 'New', NULL, NULL, 99, NULL, 'With these 3 items, you can build all sorts of nifty stuff. For example, miniature houses, boats, buildings, just to name a few. And you can easily find many more DIY (Do-It-Yourself) examples on Youtube. I recommend 7 year olds to start building things with popsicle sticks, together with their parents.', NULL, 0, 0),
(157, 1, 2, 'The Sandman Book of Dreams', 375, NULL, 'English', 'Neil Gaiman/Ed Kramer (Eds.)', NULL, NULL, NULL, 'Paperback', 3, NULL, 'This book contains over 16 short stories from various authors who have been inspired by the bestselling graphic novel, \"The Sandman\", by Neil Gaiman.<br><br>\r\nEdited by Neil, himself, and Ed Kramer, I particularly like \"The Mender of Broken Dreams\" by Nancy A. Collins.', NULL, 0, 0),
(158, 2, 6, 'Fantastic four forever story arc set', 800, NULL, 'English', NULL, NULL, 'VF-NM', NULL, 'Paperback', 1, NULL, '<br>issues 600-604', NULL, 0, 0),
(159, 2, 6, 'amazing spider-man comics lot', 800, NULL, 'English', NULL, NULL, 'VF-NM', NULL, 'Paperback', 1, NULL, '<br>\r\nissues 674-681', NULL, 0, 0),
(160, 2, 6, 'superior spider-man complete goblin nation story arc', 1000, NULL, 'English', NULL, NULL, 'VF', NULL, 'Paperback', 1, NULL, '<br>issues 27-31', NULL, 0, 0),
(161, 2, 6, 'spider-man no turning back story arc', 600, NULL, 'English', NULL, NULL, 'VF-NM', NULL, 'Paperback', 1, NULL, '<br>\r\ncomplete no turning back story arc<br>\r\nissues 688-691', NULL, 0, 0),
(162, 2, 6, 'spider-man ends of the earth story arc', 1200, NULL, 'English', NULL, NULL, 'VF-NM', NULL, 'Paperback', 1, NULL, '<br>complete ends of the earth story arc<br>\r\nissues 682-687', NULL, 0, 0),
(163, 2, 6, 'Spider-man spider island story arc set', 1200, NULL, 'English', NULL, NULL, 'VF-NM', NULL, 'Paperback', 1, NULL, '<br>spider-man complete spider island comic set<br>\r\nissues 666-673', NULL, 0, 0),
(164, 2, 6, 'civil war II', 1400, NULL, 'English', NULL, NULL, 'NM', NULL, 'Paperback', 1, NULL, '<br>civil war II complete set<br>\r\nissues 0-8', NULL, 0, 0),
(165, 2, 6, 'battleworld thors set', 400, NULL, 'English', NULL, NULL, 'VF-NM', NULL, 'Paperback', 1, NULL, '<br>complete set 1-4', NULL, 0, 0),
(166, 2, 6, 'dc comics presents deadman story arc', 500, NULL, 'English', NULL, NULL, 'VF-NM', NULL, 'Paperback', 1, NULL, '<br>1st story arc of dc comics presents new 52<br>\r\ndeadman<br>\r\n1-5\r\n', NULL, 0, 0),
(167, 2, 6, 'warland comics set + extra', 1200, NULL, 'English', NULL, NULL, 'VG-F', NULL, 'Paperback', 1, NULL, '<br>all you see in the pic is included', NULL, 0, 0),
(168, 2, 6, 'green lantern new 52', 400, NULL, 'English', NULL, NULL, 'VF-NM', NULL, 'Paperback', 1, NULL, '<br>1-5', NULL, 0, 0),
(169, 2, 6, 'captain atom new 52', 300, NULL, 'English', NULL, NULL, 'VF-NM', NULL, 'Paperback', 1, NULL, '<br>1-5', NULL, 0, 0),
(170, 2, 6, 'spaceman set', 900, NULL, 'English', NULL, NULL, 'VF-NM', NULL, 'Paperback', 1, NULL, '<br>complete 1-9', NULL, 0, 0),
(171, 2, 6, 'penguin pain and prejudice set', 600, NULL, 'English', NULL, NULL, 'VF-NM', NULL, 'Paperback', 1, NULL, '<br>1-5 complete', NULL, 0, 0),
(172, 2, 6, 'superman new 52', 600, NULL, 'English', NULL, NULL, 'VF-NM', NULL, 'Paperback', 1, NULL, '<br>1-6', NULL, 0, 0),
(173, 2, 6, 'green arrow new 52 number 1', 400, NULL, 'English', NULL, NULL, 'NM', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(174, 2, 6, 'animal man new 52', 450, NULL, 'English', NULL, NULL, 'VF', NULL, 'Paperback', 1, NULL, '<br>1-5<br>\r\nissue 1 is 2nd print', NULL, 0, 0),
(175, 2, 6, 'swamp thing new 52', 400, NULL, 'English', NULL, NULL, 'VF', NULL, 'Paperback', 1, NULL, '<br>1-5', NULL, 0, 0),
(176, 2, 6, 'x-men number 12', 8000, NULL, 'English', NULL, NULL, 'VG', NULL, 'Paperback', 1, NULL, '<br>BEST OFFER AVAILABLE<br>\r\n1st appearance juggernaut', NULL, 0, 0),
(177, 2, 6, 'ultimate comics new spider-man set', 4500, NULL, 'English', NULL, NULL, 'VF-NM', NULL, 'Paperback', 1, NULL, '<br>complete set 1-28', NULL, 0, 0),
(178, 2, 6, 'spider-men complete set', 1200, NULL, 'English', NULL, NULL, 'VF-NM', NULL, 'Paperback', 1, NULL, '<br>complete set<br>\r\n1-5', NULL, 0, 0),
(179, 2, 6, 'INDESTRUCTIBLE hulk set', 1500, NULL, 'English', NULL, NULL, 'F', NULL, 'Paperback', 1, NULL, '<br>complete set 1-20 + extras', NULL, 0, 0),
(180, 2, 6, 'sub-mariner number 8', 900, NULL, 'English', NULL, NULL, 'VG-F', NULL, 'Paperback', 1, NULL, '<br>BEST OFFER AVAILABLE', NULL, 0, 0),
(181, 2, 8, 'BTAS killer croc', 800, NULL, 'English', NULL, NULL, 'New', NULL, NULL, 1, NULL, NULL, NULL, 0, 0),
(182, 2, 8, 'punisher art print', 1000, NULL, 'English', NULL, NULL, 'New', NULL, NULL, 1, NULL, 'signed by artist mike zeck<br>\r\n11\"x17\"', NULL, 0, 0),
(183, 2, 8, 'BTAS Mr. Freeze', 800, NULL, 'English', NULL, NULL, 'New', NULL, NULL, 1, NULL, NULL, NULL, 0, 0),
(184, 2, 8, 'BTAS scarecrow', 800, NULL, 'English', NULL, NULL, 'New', NULL, NULL, 1, NULL, NULL, NULL, 0, 0),
(185, 2, 8, 'captain america cards', 200, NULL, 'English', NULL, NULL, 'New', NULL, NULL, 1, NULL, NULL, NULL, 0, 0),
(186, 2, 8, 'Venom marvel toybiz 90s', 700, NULL, 'English', NULL, NULL, 'New', NULL, NULL, 1, NULL, 'MOC', NULL, 0, 0),
(187, 2, 8, 'Morbius', 400, NULL, 'English', NULL, NULL, 'New', NULL, NULL, 1, NULL, NULL, NULL, 0, 0),
(188, 2, 8, 'Rogue', 400, NULL, 'English', NULL, NULL, 'New', NULL, NULL, 1, NULL, NULL, NULL, 0, 0),
(189, 2, 8, 'Carnage', 600, NULL, 'English', NULL, NULL, 'New', NULL, '', 1, NULL, NULL, NULL, 0, 0),
(190, 2, 8, 'captain america art print', 1000, NULL, 'English', NULL, NULL, 'New', NULL, NULL, 1, NULL, 'signed by artist mike zeck<br>\r\n11\"x17\"', NULL, 0, 0),
(191, 2, 8, 'silver surfer', 800, NULL, 'English', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, 0, 0),
(192, 2, 8, 'US agent', 500, NULL, 'English', NULL, NULL, 'New', NULL, NULL, 1, NULL, NULL, NULL, 0, 0),
(193, 2, 8, 'talking venom', 700, NULL, 'English', NULL, NULL, 'New', NULL, NULL, 1, NULL, 'in good working condition', NULL, 0, 0),
(194, 2, 8, 'deathlok', 650, NULL, 'English', NULL, NULL, 'New', NULL, NULL, 1, NULL, NULL, NULL, 0, 0),
(195, 2, 8, 'scarlet spider', 850, NULL, 'English', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, 0, 0),
(196, 2, 8, 'green goblin marvel 90s', 400, NULL, 'English', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, 0, 0),
(197, 2, 8, 'black widow marvel 90s', 400, NULL, 'English', NULL, NULL, 'New', NULL, NULL, 1, NULL, NULL, NULL, 0, 0),
(198, 2, 8, 'captain marvel', 600, NULL, 'English', NULL, NULL, 'New', NULL, NULL, 1, NULL, NULL, NULL, 0, 0),
(199, 2, 8, 'iron fist marvel 90s', 800, NULL, 'English', NULL, NULL, 'New', NULL, NULL, 1, NULL, NULL, NULL, 0, 0),
(200, 2, 8, 'Falcon marvel 90s', 500, NULL, 'English', NULL, NULL, 'New', NULL, NULL, 1, NULL, NULL, NULL, 0, 0),
(201, 2, 8, 'bullseye and electra', 700, NULL, 'English', NULL, NULL, 'New', NULL, NULL, 1, NULL, NULL, NULL, 0, 0),
(202, 2, 8, 'cyclops and jean grey marvel 90s', 700, NULL, 'English', NULL, NULL, 'New', NULL, NULL, 1, NULL, NULL, NULL, 0, 0),
(203, 2, 8, 'DD marvel toybiz 90s', 500, NULL, 'English', NULL, NULL, 'New', NULL, NULL, 1, NULL, NULL, NULL, 0, 0),
(204, 2, 8, 'metal gear liquid snake action figure', 1500, NULL, 'English', NULL, NULL, 'New', NULL, NULL, 1, NULL, 'complete and in good condition', NULL, 0, 0),
(205, 2, 8, 'green goblin marvel toybiz 90s', 600, NULL, 'English', NULL, NULL, 'New', NULL, NULL, 1, NULL, 'MOC', NULL, 0, 0),
(207, 4, 12, 'head and shoulders apple fresh shampoo 170ml', 196, NULL, 'English', NULL, NULL, 'New', NULL, NULL, 99, NULL, NULL, NULL, 0, 0),
(208, 4, 11, 'Ligo Sardines Easy Open Tomato Chili 155g 6cans', 166, NULL, 'English', NULL, NULL, 'New', NULL, NULL, 99, NULL, 'I remember when I did homestay in the mountains of Antipolo, I saw people combining sardines with instant noodles. It was an inexpensive recipe for the people there. Now that I\'m living in a valley in the Philippines, I still eat sardines, particularly Ligo Sardines with tomato and chili sauce, because when I don\'t want to spend time preparing and cooking food, I can just pick a can, open it using its built-in opener, pour the contents on top of steaming rice, and then, without having to cook or heat it anymore, I\'m already ready to eat. ', NULL, 0, 0),
(209, 1, 2, 'A Truck Full of Money', 500, NULL, 'English', 'Tracy Kidder', NULL, 'Used - Very Good', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 1),
(210, 1, 2, 'Made to Stick', 550, NULL, 'English', 'Chip Heath/Dan Heath', NULL, 'Used - Good', NULL, 'Paperback', 2, NULL, 'I have often seen Chip and Dan Heath\'s book, \"Made to Stick\", mentioned by other authors. It describes six key qualities of an idea for it to stick: <b>\"SUCCES\"</b><br><br>\r\n1) <b>S</b>implicity<br>\r\n2) <b>U</b>nexpectedness<br>\r\n3) <b>C</b>oncreteness<br>\r\n4) <b>C</b>redibility<br>\r\n5) <b>E</b>motional<br>\r\n6) <b>S</b>tories<br>\r\n<br>\r\nBut for you to understand what the authors mean by these words, you may actually have to get a copy of the book and read their examples.', NULL, 0, 0),
(211, 1, 2, 'Mountains Beyond Mountains', 500, NULL, 'English', 'Tracy Kidder', NULL, 'Used - Good', NULL, 'Hardcover', 1, NULL, NULL, NULL, 0, 0),
(213, 1, 2, 'My Stroke of Insight', 500, NULL, 'English', 'Jill Bolte Taylor, Ph.D.', NULL, 'Used - Good', NULL, 'Hardcover', 1, NULL, NULL, NULL, 0, 0),
(214, 1, 2, 'Presentation Zen', 500, NULL, 'English', 'Garr Reynolds', NULL, 'Used - Good', NULL, 'Paperback', 2, NULL, 'I remember taking the author\'s class back in Japan as an exchange student. It was on cross-cultural communication. We discussed about direct and indirect communication, how some cultures are more high-touch than others, and so on. We also had to write a journal of our soujourn. \r\n<br><br>\r\nTwo things I remember about our teacher: 1) he was a big promoter of Apple products, like the MacBook, and 2) whenever we met, he would greet me by my first name. The second one stuck with me after I returned to my home country, the Philippines. I remember testing it out by greeting people I met with their first names. I had a feeling that somehow, the person had to also remember what my first name was, and in that way, remembered me. \r\n<br><br>\r\nHis book, \"Presentation Zen\", offers advice on how to make aesthetically appealing presentations by drawing from the teachings of Zen. If you want to learn about Zen \"and the Art of Making Great Presentations\", you can check out this book. ', NULL, 0, 0),
(215, 1, 2, 'Surely You\'re Joking, Mr. Feynman', 500, NULL, 'English', 'Richard Feynman', NULL, 'Used - Good', '', 'Paperback', 2, NULL, 'Here\'s an excerpt from the book: \"Physics disgusts me a little bit now, but I used to enjoy doing physics. Why did I enjoy it? I used to play with it. I used to do whatever I felt like doing-- it didn\'t have to do with whether it was important for the development of nuclear physics, but whether it was interesting and amusing for me to play with.... That didn\'t make any difference: I\'d invent things and play with things for my own entertainment... I\'m going to play with physics, whenever I want to, without worrying about any importance whatsoever.\"', NULL, 0, 0),
(216, 1, 2, 'The Pleasure of Finding Things Out', 500, NULL, 'English', 'Richard Feynman', NULL, 'Used - Good', NULL, 'Paperback', 2, NULL, NULL, NULL, 0, 0),
(217, 1, 2, 'The Road Less Traveled', 350, NULL, 'English', 'M. Scott. Peck, M.D.', NULL, 'Used - Good', NULL, 'Paperback', 2, NULL, NULL, NULL, 0, 0),
(218, 1, 2, 'The Youngest Science', 400, NULL, 'English', 'Lewis Thomas', NULL, 'Used - Good', NULL, 'Hardcover', 1, NULL, NULL, NULL, 0, 0),
(219, 1, 2, 'When All You\'ve Ever Wanted Isn\'t Enough', 400, NULL, 'English', 'Harold Kushner', NULL, 'Used - Very Good', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(220, 1, 2, 'The Myth of Sisyphus', 400, NULL, 'English', 'Albert Camus', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(221, 1, 2, 'Musicophilia', 500, NULL, 'English', 'Oliver Sacks', NULL, 'Used - Acceptable', NULL, 'Hardcover', 2, NULL, NULL, NULL, 0, 0),
(222, 1, 2, 'Thinking, Fast and Slow', 950, NULL, 'English', 'Daniel Kahneman', NULL, 'Used - Acceptable', NULL, 'Hardcover', 1, NULL, NULL, NULL, 0, 0),
(223, 1, 2, 'The World is Flat', 400, NULL, 'English', 'Thomas Friedman', NULL, 'Used - Good', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(224, 1, 2, 'The Complete Original Illustrated Sherlock Holmes', 600, NULL, 'English', 'Arthur Conan Doyle', NULL, 'Used - Very Good', NULL, 'Hardcover', 1, NULL, 'This rare collector\'s piece contains 37 original Sherlock Holmes stories and the complete novel, \"The Hound of the Baskervilles\", as they first appeared in the British magazine, \"The Strand\", between 1891 to 1903.<br><br>\r\nThe fascimiles also include 356 original illustrations by Sidney Paget.<br><br>\r\nIf you are a strong advocate of the power of logic and reasoning, then I would highly recommend reading Sherlock Holmes.<br><br>\r\nA keen observer, however, may notice that Sherlock doesn\'t have a wife. And neither does he have children...<br><br>\r\nBut that\'s another story for another time.', NULL, 0, 0),
(225, 1, 2, 'Great Detectives', 600, NULL, 'English', 'David Willis McCullough (Ed)', NULL, 'Used - Very Good', NULL, 'Hardcover', 1, NULL, NULL, NULL, 0, 0),
(226, 1, 2, 'The Dilbert Principle', 400, NULL, 'English', 'Scott Adams', NULL, 'Used - Good', NULL, 'Hardcover', 1, NULL, 'The author spent nine years as a necktie-wearing, corporate employee at the headquarters of Pacific Bell. This book, which is filled with illustrations from the author\'s \"Dilbert\" comic strips, reveals in twenty-six chapters the secrets of management in every company. I highly recommend this bestseller to everyone who is now running his or her own company.', NULL, 0, 0);
INSERT INTO `product` (`product_id`, `merchant_id`, `product_type_id`, `name`, `price`, `previous_price`, `language`, `author`, `supplier`, `description`, `image_location`, `format`, `quantity_in_stock`, `translator`, `product_overview`, `pages`, `product_view_num`, `quantity_sold`) VALUES
(227, 1, 2, 'Introduction to Zen Buddhism', 460, NULL, 'English', 'D. T. Suzuki', NULL, 'Used - Good', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(228, 4, 11, 'Rebisco Strawberry Cream-Filled Cracker Sandwich 10x32g packs', 132, NULL, 'English', NULL, NULL, 'New', NULL, NULL, 99, NULL, 'Although the Rebisco Cream-Filled Cracker Sandwich has a variety of flavors, I particularly like this one, strawberry. The way I eat it is, I break the rectangular cracker sandwich into three smaller rectangular pieces. This makes it easy to eat, i.e. less crumbs falling, and to share it with family and friends.', NULL, 0, 0),
(229, 1, 2, 'Creating a World Without Poverty', 500, NULL, 'English', 'Muhammad Yunus', NULL, 'Used - Good', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(231, 1, 2, 'Letters to a Young Poet', 270, NULL, 'English', 'Rainer Maria Rilke/Stephen Mitchell', NULL, 'Used - Good', NULL, 'Paperback', 1, 'Stephen Mitchell', 'Although I don\'t agree with everything Rainer Maria Rilke says, here are a few things that I\'ve found noteworthy:\r\n<br><br>\r\n1) While Rilke focuses more on the magnificence of solitude, I much prefer being in the company of people with whom I am able to engage in genuine dialogue with.\r\n<br><br>\r\n2) He also wrote the poem, Der Panther (The Panther). I remember speaking with a History teacher who spoke German. Although he was Dutch, his German was good enough to perceive that the cadence with which the poem was written was quite remarkable.\r\n<br><br>\r\n3) Years ago, I found myself dining with a CEO/surgeon who was also battling poverty.<br><br>\r\n\"How do we solve poverty? I\'ve been asking the same question for years. I\'m now 66 and I\'m still asking that question!\"\r\n<br><br>\r\nHe then paused, as if remembering something. In fact, he was trying to recall the words from the poet, Rainer Maria Rilke. \r\n<br><br>\r\n\"Try to love the questions themselves... And you might... Might!\" He laughed to himself.\r\n<br><br>\r\n\"...you might live your way into the answer.\"', NULL, 0, 0),
(232, 1, 2, 'The Long Tail', 500, NULL, 'English', 'Chris Anderson', NULL, 'Used - Good', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(233, 1, 2, 'The Dilbert Future', 400, NULL, 'English', 'Scott Adams', NULL, 'Used - Good', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(234, 1, 2, 'The Greatest Show on Earth', 500, NULL, 'English', 'Richard Dawkins', NULL, 'Used - Good', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(235, 1, 2, 'A Brief History of Time', 500, NULL, 'English', 'Stephen Hawking', NULL, 'Used - Good', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(236, 1, 2, 'A Whole New Mind', 420, NULL, 'English', 'Daniel Pink', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 2),
(237, 1, 2, 'Among Schoolchildren', 400, NULL, 'English', 'Tracy Kidder', NULL, 'Used - Good', NULL, 'Hardcover', 1, NULL, NULL, NULL, 0, 0),
(238, 1, 2, 'Born to Run', 500, NULL, 'English', 'Christopher McDougall', NULL, 'Used - Good', NULL, 'Hardcover', 1, NULL, NULL, NULL, 0, 0),
(239, 1, 2, 'Einstein\'s Dreams', 420, NULL, 'English', 'Alan Lightman', NULL, 'Used - Good', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(240, 1, 2, 'Hanging Out with the Dream King', 480, NULL, 'English', 'Joseph McCabe (Ed)', NULL, 'Used - Good', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(241, 1, 2, 'In Search of Excellence', 420, NULL, 'English', 'Thomas J. Peters/Robert H. Waterman, Jr.', NULL, 'Used - Good', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(242, 1, 2, 'Mere Christianity', 460, NULL, 'English', 'C. S. Lewis', NULL, 'Used - Good', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(243, 1, 2, 'They Call Me Coach', 600, NULL, 'English', 'John Wooden/Jack Tobin', NULL, 'Used - Good', NULL, 'Paperback', 1, NULL, 'I first learned about Coach John Wooden after watching his TED talk on <b><a href=\"https://www.ted.com/talks/john_wooden_on_the_difference_between_winning_and_success\" target=\"_blank\">the difference between winning and success</a></b>. As an English teacher and an Athletics coach, most notably for basketball, he was firm about never being late and developing a better understanding of success, which is not necessarily based on student grades. In this classic autobiography, Coach John Wooden shares his reflections on life, which includes poetry on every chapter. I particularly like the one on Chapter 7: \"Do not let what you cannot do interfere with what you can do.\", and his definition of success: \"peace of mind which is a direct result of self-satisfaction in knowing you did your best to become the best that you are capable of becoming.\" And by this, I understand it to mean, \"every single day.\"', NULL, 0, 0),
(244, 1, 2, 'The Happiness Project', 420, NULL, 'English', 'Gretchen Rubin', NULL, 'Used - Good', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(245, 1, 2, 'Strength in What Remains', 500, NULL, 'English', 'Tracy Kidder', NULL, 'Used - Good', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(246, 1, 2, 'Things Fall Apart', 500, NULL, 'English', 'Chinua Achebe', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(247, 1, 2, 'Harvard Med', 500, NULL, 'English', 'John Langone', NULL, 'Used - Good', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(248, 1, 2, 'The Lean Startup', 800, NULL, 'English', 'Eric Ries', NULL, 'Used - Very Good', NULL, 'Hardcover', 1, NULL, NULL, NULL, 0, 0),
(249, 1, 2, 'Einstein', 600, NULL, 'English', 'Walter Isaacson', NULL, 'Used - Very Good', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(250, 1, 2, 'Quiet', 600, NULL, 'English', 'Susan Cain', NULL, 'Used - Good', NULL, 'Paperback', 1, NULL, 'Susan Cain\'s \"Quiet\" emphasizes the often undermined contribution that introverts have to a world that can\'t stop talking. What I remember about this book is the theory by developmental psychologist, Jerome Kagan et al., which says that infants who start out as high-reactive, that is, they are easily stimulated with the environment, tend to grow up to become timid, shy, and seek less stimulating places. On the other hand, children who start out as low-reactive, tend to grow up to become outgoing, spontaneous, and seek stimulating places such as events with loud music, and such things.', NULL, 0, 0),
(251, 1, 2, 'Wooden', 400, NULL, 'English', 'John Wooden/Steve Jamison', NULL, 'Used - Good', NULL, 'Hardcover', 1, NULL, 'I first learned about Coach John Wooden after watching his TED talk on <b><a href=\"https://www.ted.com/talks/john_wooden_on_the_difference_between_winning_and_success\" target=\"_blank\">the difference between winning and success</a></b>. This book contains Coach John Wooden\'s observations and reflections about life. I particularly like and remember this one on Love and Marriage. He says that Abraham Lincoln once said that \"the best thing a man can do for his children is to love their mother.\"', NULL, 0, 0),
(252, 1, 2, 'Good Boss, Bad Boss', 500, NULL, 'English', 'Robert Sutton, PhD', NULL, 'Used - Good', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(253, 1, 2, 'Vintage Sacks', 450, NULL, 'English', 'Oliver Sacks', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(254, 4, 11, 'M&S Digestives Made with Demerara Sugar for a Crispier Crunchier Texture', 225, NULL, 'English', NULL, NULL, 'New', NULL, NULL, 99, NULL, 'Standard size.<br>\r\nSuitable for vegetarians.<br><br>\r\n<b>STORAGE:</b><br>\r\nStore in a cool, dry place. Once opened, store in an airtight container.\r\n<br><br>\r\n<b>Best Before:</b> Dec. 6, 2017', NULL, 0, 0),
(255, 4, 11, 'M&S Milk Chocolate Digestives', 225, NULL, 'English', NULL, NULL, 'New', NULL, NULL, 99, NULL, 'Standard size.<br>\r\nSuitable for vegetarians.<br><br>\r\n<b>STORAGE:</b><br>\r\nStore in a cool, dry place. Once opened, store in an airtight container.<br><br><b>Best Before:</b> Dec. 6, 2017', NULL, 0, 0),
(256, 1, 2, 'Como agua para chocolate', 400, NULL, 'Spanish', 'Laura Esquivel', NULL, 'Used - Good', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(257, 1, 2, 'Brave New World', 400, NULL, 'English', 'Aldous Huxley', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(258, 1, 2, 'Et Cetera Et Cetera', 450, NULL, 'English', 'Lewis Thomas', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(259, 1, 2, 'The Lost World', 400, NULL, 'English', 'Arthur Conan Doyle', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(260, 1, 2, 'The Science of Everyday Life', 400, NULL, 'English', 'Jay Ingram', NULL, 'Used - Good', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(261, 1, 2, 'Vietnamese Legends Folk Tales', 400, NULL, 'English', 'Culture and Information Publishing House', NULL, 'Used - Good', NULL, 'Paperback', 0, NULL, NULL, NULL, 0, 0),
(262, 1, 7, 'Slam Dunk Manga set (23-31)', 1170, '<strike>&#x20B1;1800</strike>', 'Japanese', NULL, NULL, 'Used - Acceptable', NULL, 'Paperback', 1, NULL, 'Back as an undergrad, I remember leaving school early, and riding the jeepney home to be able to be on time, at 5pm, to watch Slam Dunk on TV. Its dubbing, which was in Filipino, was surprisingly good, which meant that it sounded natural, not forced. I would take a big bag of Monde Bread Stix and eat it, while watching the show. Nowadays, I rarely watch traditional TV anymore. Instead, I prefer to spend my time quietly reading books, manga, and such things. Or as is often the case, I lie in bed and dream, quite naturally, all sorts of dreams.', NULL, 0, 0),
(263, 1, 2, 'Coders at Work', 1600, NULL, 'English', 'Peter Seibel', NULL, 'Used - Good', NULL, 'Paperback', 0, NULL, NULL, NULL, 0, 0),
(264, 1, 2, 'Crossing the Chasm', 450, NULL, 'English', 'Geoffrey Moore', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(265, 1, 2, 'e boys', 400, NULL, 'English', 'Randall Stross', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(266, 1, 2, 'Fluid Concepts and Creative Analogies', 600, NULL, 'English', 'Douglas Hofstadter', NULL, 'Used - Good', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(267, 1, 2, 'Glimpses of the Harvard Past', 500, NULL, 'English', 'Bernard Bailyn et al.', NULL, 'Used - Acceptable', NULL, 'Hardcover', 1, NULL, NULL, NULL, 0, 0),
(268, 1, 2, 'The Solitaire Mystery', 400, NULL, 'English', 'Jostein Gaarder', NULL, 'Used - Good', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(269, 1, 2, 'The Virtual Community', 400, NULL, 'English', 'Howard Rheingold', NULL, 'Used - Good', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(270, 1, 2, 'MBA Fundamentals Business Law', 600, NULL, 'English', 'Ellen Curry, JD', NULL, 'Used - Good', NULL, 'Paperback', 0, NULL, NULL, NULL, 0, 0),
(271, 1, 2, 'Super Crunchers', 400, NULL, 'English', 'Ian Ayres', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(272, 1, 2, 'The New New Thing', 450, NULL, 'English', 'Michael Lewis', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(273, 4, 11, 'Bread Stix 130g', 99, NULL, 'English', NULL, NULL, 'New', NULL, NULL, 99, NULL, 'While the packaging is now different, and it seems that anything larger than 130g aren\'t sold anymore, it still tastes the same as the one I was eating when I was watching Slam Dunk on TV, during my undergrad days.', NULL, 0, 0),
(274, 1, 2, 'A Small Treatise on the Great Virtues', 450, NULL, 'English', 'André Comte-Sponville', NULL, 'Used - Good', NULL, 'Paperback', 1, NULL, 'Back in 2011, I bought a secondhand copy of the book called, \"A Small Treatise in the Great Virtues,\" by French philosopher, André Comte-Sponville. \r\n<br><br>\r\nI must admit though that, just like all other Philosophy books, it would take me several times of rereading to fully understand what he means in the text. \r\n<br><br>\r\nNevertheless, so far, I\'ve learned that overall, there are three degrees of love: 1) want (eros), 2) joy or friendship (philia), and 3) charity (agape). \r\n<br><br>\r\nCharity, he says, is \"more like a smile, when it is not a desire to cry, as it sometimes is.\" He explains that \"our laughter can often be cruel; our tears rarely if ever are.\"\r\n<br><br>\r\nIn addition, I have come to particularly like the following lines from this chapter on Love. \"I rejoice in the thought that you exist... Thank you for existing, thank you for being what you are, for being real and not a figment of my imagination!\" \r\n<br><br>\r\nAccording to Comte-Sponville, \"this declaration is one of  fulfilled love.\" It asks nothing in return. He adds that \"sometimes a mere look, a smile, a caress, or a joy can say the same thing.\"\r\n<br><br>\r\nOct. 8, 2012', NULL, 0, 1),
(275, 1, 2, 'Core Concepts in Health 10th ed', 600, NULL, 'English', 'Paul Insel/Walton Roth', NULL, 'Used - Acceptable', '', 'Paperback', 0, NULL, NULL, NULL, 0, 0),
(276, 1, 2, 'How to Learn a Foreign Language', 900, NULL, 'English', 'Paul Pimsleur', NULL, 'Used - Good', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(277, 1, 2, 'Slumdog Millionaire', 400, NULL, 'English', 'Vikas Swarup', NULL, 'Used - Good', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(278, 4, 11, 'Quaker Oat Cookies 4 flavor 7 packs plus 1 free', 168, NULL, 'English', NULL, NULL, 'New', NULL, NULL, 99, NULL, 'This Quaker Oat Cookies set has 7 packs plus 1 free. It has 4 flavors, which include: choco chip, honey nuts, raisins, and apple-cinnamon. I particularly like this assorted set, because not only does it taste good, the packaging is also well done. This means that a person can offer this as merienda or snack to guests without feeling ashamed. I remember bringing sets of this during trips and offering it to people when I didn\'t have anything else to offer. As it turns out, not all countries have this particular packaged set.', NULL, 0, 0),
(279, 3, 10, 'Nemo, ang Batang Papel', 180, NULL, 'Filipino/English', 'Rene O. Villanueva/Haru Sabijon', NULL, 'New', NULL, 'Paperback', 1, NULL, 'Story by Rene O. Villanueva<br>\r\nIllustrations by Haru Sabijon<br>\r\n<br>\r\nMay layang lumipad bilang batang papel si Nemo. Pero mas gusto niyang tumakbo, tumawa, at maglaro tulad ng isang tunay na bata.\r\n<br><br>\r\nA boy made of paper, Nemo can fly. But what he really wants is to run, laugh, and play like a real child.\r\n<br><br>\r\n1992 Carlos Palanca Memorial Awards for Literature, First Prize, Short Story for Children (Filipino Division)<br>\r\n1994 PBBY-Salanga and PBBY-Alcala Prizes', NULL, 0, 0),
(280, 3, 10, 'Si Janus Silang at ang Pitumpu\'t Pitong Pusong', 380, NULL, 'Filipino', 'Edgar Calabia Samar/Borg Sinaban', NULL, 'New', NULL, 'Paperback', 99, NULL, 'Written by Edgar Calabia Samar<br>\r\nDesigned and illustrated by Borg Sinaban\r\n<br><br>\r\nBago naglaho si Janus habang naglalaro ng TALA, nakita ni Manong Joey sa utak nito ang hinahanap nilang paraluman. Sinundo ni Renzo si Mica sa Balanga para protektahan ito sa Angono at dahil may kaugnayan ito sa paralumang nakita ni Manong Joey kay Janus. Samantala, nasa Kalibutan pa rin sina Manong Isyo para hanapin si Mira na malamang na nakuha ng mga mambabarang. Walang kaalam-alam ang lahat kung nasaan na si Janus hanggang sa makita ni Manong Joey na humihiwalay ang anino ni Renzo sa katawan nito at maaaring matagal na pala itong ginagamit ng Tiyanak!\r\n<br><br>\r\nAdditional Information:<br>\r\nIkatlong libro sa serye ng Janus Silang', NULL, 0, 0),
(281, 3, 10, 'Matandang Matabang Pusa', 356, NULL, 'Filipino', 'Virgilio S. Almario/Felix Mago Miguel', NULL, 'New', NULL, 'Paperback', 99, NULL, 'Story by Virgilio S. Almario<br>\r\nIllustrations by Felix Mago Miguel<br>\r\n<br>\r\nMabagal at lampa. Mahina at antukin pa. Ano pa ba ang magagawa ng isang matandang matabang pusa?', NULL, 0, 0),
(282, 3, 10, 'Ang Halimaw ng mga Kulay (coloring book)', 230, NULL, 'Filipino', 'Anna Llenas', NULL, 'New', NULL, 'Paperback', 99, NULL, 'Sa paglalarawan ng karaniwang mga damdamin tulad ng saya, lungkot, galit, takot, at payapa, marahang hinihikayat ng mapag-unawang librong ito ang mga bata na ibahagi sa mga magulang at guro nila ang kanilang mga nararamdaman.\r\n<br><br>\r\nAlso see: Ang Halimaw ng mga Kulay (picture book)', NULL, 0, 0),
(283, 3, 10, 'Ang Halimaw ng mga Kulay (picture book)', 480, NULL, 'Filipino/English', 'Anna Llenas', NULL, 'New', NULL, 'Paperback', 99, NULL, 'Created by Anna Llenas<br><br>\r\nSa paglalarawan ng karaniwang mga damdamin tulad ng saya, lungkot, galit, takot, at payapa, marahang hinihikayat ng mapag-unawang librong ito ang mga bata na ibahagi sa mga magulang at guro nila ang kanilang mga nararamdaman.\r\n<br><br>\r\nBy illustrating such common emotions as happiness, sadness, anger, fear, and calm, this sensitive book gently encourages young children to open up with parents, teachers, and daycare providers.\r\n<br><br>\r\nAlso see: Ang Halimaw ng mga Kulay (coloring book)', NULL, 0, 0),
(284, 3, 10, 'Ang Madyik Silya ni Titoy', 180, NULL, 'Filipino/English', 'Russell Molina/Marcus Nada', NULL, 'New', NULL, 'Paperback', 99, NULL, 'Story Russell Molina<br>\r\nIllustrations by Marcus Nada<br>\r\n<br>\r\nNandito na ang madyik silya ni Titoy! Kaya nitong maging kotse, eroplano, o tren. Sumamang maglakbay at tuklasin kung paano nalagpasan ni Titoy ang kapansanan sa tulong ng kaniyang mapaglarong imahinasyon.\r\n<br><br>\r\nHere comes Titoy’s magic chair! Watch it turn into a car, a plane, or a train, and take Titoy to many wondrous places! Here is a heartwarming story about how a child’s boundless imagination helps him overcome his limitations.\r\n<br><br>\r\nGintong Aklat Award, First Runner-up (2004)', NULL, 0, 0),
(285, 3, 10, 'Ang Mahiyaing Manok', 180, NULL, 'Filipino/English', 'Rebecca Añonuevo/Ruben de Jesus', NULL, 'New', NULL, 'Paperback', 99, NULL, 'Story by Rebecca Añonuevo<br>\r\nIllustrations by Ruben de Jesus<br>\r\n<br>\r\nSa lahat ng mga manok ni Mang Oca, itong si Onyok ang mukmok nang mukmok. Paano’y hindi niya magawang tumilaok tulad ng ibang mga kapuwa manok. Paanong palalakasin ang loob ng isang mahiyaing manok?\r\n<br><br>\r\nOnyok is a young rooster who cannot crow as good and as loud as the others, so he spends most of his time sulking. How can a shy rooster prove his worth?\r\n<br><br>\r\n2000 Noma Concours for Children’s Picture Book Illustrations, Encouragement Prize<br>\r\n1996 Carlos Palanca Memorial Awards for Literature, Third Prize for Filipino Short Story for Children', NULL, 0, 0),
(286, 3, 10, 'Apolakus', 180, NULL, 'Filipino/English', 'Alice Mallari/ Leo Agtuca', NULL, 'New', NULL, 'Paperback', 99, NULL, 'Story by Alice Mallari<br>\r\nIllustrations by Leo Agtuca<br>\r\n<br>\r\nIsang Lunes nang umaga, nawala ang batang si Dadoy at biglang lumitaw ang isang batang madyikero. Sa isang kumpas ng mahiwagang patpat at isang tumataginting na “Gimokus apolakus!” may mga kakaibang nagaganap. Pero kapag kaharap ng batang madyikero sina Jay-Jay at Yuki, nawawalan siya ng kapangyarihan. Paano sila matatalo ng batang madyikero?\r\n<br><br>\r\nOne Monday morning, the boy Dadoy disappeared and a little magician appeared. In one flick of his magic wand and a loud “Gimokus apolakus!” amazing things happen. But when the boy magician comes face-to-face with Jay-Jay and Yuki, his powers go away. How can the boy magician beat them?', NULL, 0, 0),
(287, 3, 10, 'Bakit Matagal ang Sundo Ko', 180, NULL, 'Filipino/English', 'Kristine Canon/Mariano Ching', NULL, 'New', NULL, 'Paperback', 99, NULL, 'Story by Kristine Canon<br>\r\nIllustrations by Mariano Ching<br>\r\n<br>\r\nNasaan kaya si Nanay? Sumakay kaya siya sa likod ng isang pagong? Naglambitin kaya siya kasabay ng mga unggoy? O baka nakisabay siya sa isang agila?\r\n<br><br>\r\nWhere could Mother be? Did she ride on the back of a turtle? Did she swing along with monkeys? Or did she hitch a ride with an eagle?\r\n<br><br>\r\n2001 PBBY-Salanga Writer’s Prize<br>\r\n2001 PBBY-Alcala Illustrator’s Prize', NULL, 0, 0),
(288, 3, 10, 'Si Pilandok at ang mga Buwaya', 180, NULL, 'Filipino/English', 'Virgilio S. Almario/ Kora Dandan-Albano', NULL, 'New', NULL, 'Paperback', 99, NULL, 'Retelling by Virgilio S. Almario<br>\r\nIllustrated by Kora Dandan-Albano<br>\r\n<br>\r\nNarito ang isa pang nakatutuwang pakikipagsapalaran ni Pilandok. Sa kuwentong bayang ito, kailangan niyang tumawid sa isang ilog na binabantayan ng mababangis ng mga buwaya. Ano kaya ang gagawin ng ating bayani para makaligtas?\r\n<br><br>\r\nHere is another one of wily Pilandok’s adventures! In this folktale, Pilandok has to cross a river that is guarded by alligators. What will our hero do this time?', NULL, 0, 0),
(289, 3, 10, 'Si Pilandok sa Pulo ng Pawikan', 180, NULL, 'Filipino/English', 'Virgilio S. Almario/Kora Dandan-Albano', NULL, 'New', NULL, 'Paperback', 99, NULL, 'Story by Virgilio S. Almario<br>\r\nIllustrated by Kora Dandan-Albano<br>\r\n<br>\r\nIpinapakita sa kuwentong ito sa serye ng mga pakikipagsapalaran ni Pilandok hindi lamang ang kaniyang bantog na katalinuhan, ngunit pati ang kaniyang malasakit sa kalikasan. Lalabanan muli ni Pilandok ang ganid na si Datu Usman na nagtatangka sa buhay ng mga pawikan.\r\n<br><br>\r\nThis tale in the Pilandok series of adventures is not only a show of our folk hero’s trademark cleverness but also of his concern for the environment. Pilandok once again battles the scheming Datu Usman who threatens the existence of pawikans.', NULL, 0, 0),
(290, 3, 10, 'Si Pilandok, Ang Bantay ng Kalikasan', 180, NULL, 'Filipino/English', 'Virgilio S. Almario/Kora Dandan-Albano', NULL, 'New', NULL, 'Paperback', 99, NULL, 'Retelling by Virgilio S. Almario<br>\r\nIllustrated by Kora Dandan-Albano<br>\r\n<br>\r\nNagpasiya si Pilandok na ipagtanggol ang gubat laban sa pang-aabuso ng mga tao ng kaniyang kalabang si Datu Usman. Ipinagbawal ni Pilandok ang walang pigil na pagputol ng mga puno, na ikinagalit lalo ng sakim na pinuno. Dito, sinubok ni Pilandok gamitin ang kaalaman niya sa kalikasan para mautakan ang mga sundalo.\r\n<br><br>\r\nPilandok took it upon himself to protect the forest against the abusive followers of his arch-enemy Datu Usman. Pilandok forbade the indiscriminate cutting of trees and this further angered the greedy ruler. Here, our clever hero tries to use his familiarity with nature to outwit the soldiers.\r\n<br><br>\r\nFinalist – 2000 Gintong Aklat Award, Best Children’s Book', NULL, 0, 0),
(291, 3, 10, 'The Cat Painter', 180, NULL, 'English', 'Becky Bravo/Mark Salvatus', NULL, 'New', NULL, 'Paperback', 99, NULL, 'Story by Becky Bravo<br>\r\nIllustrations by Mark Salvatus<br>\r\n<br>\r\nCats come in three colors: black, white, and yellow—this is what Miral, chief cat painter, teaches all his students. All is well until Rajal, a playful painter, comes along. Find out why, since then, cats have never been the same.\r\n<br><br>\r\nFirst Prize – 2004 Don Carlos Palanca Memorial Awards for Literature, Short Story for Children<br>\r\n2007 National Book Award, Best Children’s Book', NULL, 0, 0),
(292, 3, 10, 'The Love of Lam-Ang', 180, NULL, 'Filipino/English', 'Virgilio S. Almario/Albert Gamos', NULL, 'New', NULL, 'Paperback', 99, NULL, 'Retelling by Virgilio S. Almario<br>\r\nIllustrations by Albert Gamos<br>\r\n<br>\r\nThe legendary tales about Lam-ang are popular in the Ilocos region. The oldest written story in verse is said to have been written by the blind poet Pedro Bukaneg, who lived in the late 16th century. The following story tells of how Lam-ang wins the love of Ines Kannoyan.\r\n<br><br>\r\nKilala sa Ilocos ang pambihirang kuwento ni Lam-ang. Sinasabing isinulat ang kuwentong ito ng bulag na makatang Pedro Bukaneg, na nabuhay sa huling bahagi ng ika-16 siglo. Sa librong ito sinasabi kung paano nakamit ni Lam-ang ang pag-ibig ni Ines Kannoyan.', NULL, 0, 0),
(293, 3, 10, 'When Zero Left Numberland', 180, NULL, 'English', 'Maita Songco Salvador/Iori Espiritu', NULL, 'New', NULL, 'Paperback', 99, NULL, 'Story by Maita Songco Salvador<br>\r\nIllustrated by Iori Espiritu<br>\r\n<br>\r\nWhen Zero heard the news about him, leaving Number Land was best, it seemed. So off he went to find a new home. Will he finally find a place of his own?', NULL, 0, 0),
(294, 3, 10, 'Whuush', 180, NULL, 'Filipino/English', 'Glenda Oris/Aldy Aguirre', NULL, 'New', NULL, 'Paperback', 99, NULL, 'Story by Glenda Oris<br>\r\nIllustrated by Aldy Aguirre<br>\r\n<br>\r\nPaborito ng hanging si Ling-ling ang maglaro sa bundok ng Makiling. Pinagbabawalan man, sumama pa rin siya kay Paros sa lungsod, upang doon magsanay at maging malakas na hangin. Magustuhan kaya niya ang Maynila?\r\n<br>\r\nPlaying in the mountains of Makiling is the wind Ling-ling’s favorite pasttime. Even though she was forbidden, she still went with Paros to the city, to train herself and be a strong wind. Would she like being in Manila?', NULL, 0, 0),
(295, 3, 10, 'Xilef', 180, NULL, 'Filipino/English', 'Augie Rivera/Beth Parrocha-Doctolero', NULL, 'New', NULL, 'Paperback', 99, NULL, 'Story by Augie Rivera<br>\r\nIllustrated by Beth Parrocha-Doctolero<br>\r\n<br>\r\nXilef ang kauna-unahang Filipinong kuwentong pambata na tumutulong upang magkaroong ng ganap na pag-unawa at pagtanggap sa mga batang dyslexic.\r\n<br><br>\r\nXilef is the first Filipino children’s story that helps develop greater understanding and acceptance of dyslexic children.\r\n<br><br>\r\nThird Prize – 1999 Don Carlos Palanca Memorial Awards for Literature, Short Story for Children<br>\r\n2005 International Board on Books for Young People (IBBY) Outstanding Books for Young People with Disabilities', NULL, 0, 0),
(296, 1, 10, 'Charlotte\'s Web', 300, NULL, 'English', 'E. B. White', NULL, 'Used - Good', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(297, 1, 2, 'The Eye of the World', 300, NULL, 'English', 'Robert Jordan', NULL, 'Used - Good', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(298, 1, 10, 'Charlie and the Chocolate Factory', 400, NULL, 'English', 'Roald Dahl', NULL, 'New', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(299, 1, 2, 'Forrest Gump', 400, NULL, 'English', 'Winston Groom', NULL, 'Used - Good', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(300, 1, 2, 'Gump and Co', 400, NULL, 'English', 'Winston Groom', NULL, 'Used - Good', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(301, 1, 2, 'How Children Succeed', 400, NULL, 'English', 'Paul Tough', NULL, 'Used - Good', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(302, 1, 2, 'Snow Crash', 400, NULL, 'English', 'Neal Stephenson', NULL, 'Used - Good', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(303, 1, 2, 'The Art of Possibility', 400, NULL, 'English', 'Rosamund Zander/Benjamin Zander', NULL, 'Used - Good', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(304, 1, 2, 'The Book of Virtues', 500, NULL, 'English', 'William Bennett', NULL, 'Used - Good', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(305, 1, 2, 'The Complete Winnie The Pooh', 500, NULL, 'English', 'A. A. Milne', NULL, 'Used - Good', NULL, 'Hardcover', 0, NULL, NULL, NULL, 0, 0),
(306, 1, 2, 'The Moral Compass', 500, NULL, 'English', 'William Bennett', NULL, 'Used - Good', NULL, 'Hardcover', 1, NULL, 'I first learned about the author from his book, <b><a href=\'http://localhost:8080/w/The-Book-of-Virtues-William-Bennett/304\'>\"The Book of Virtues\"</a></b>. This book contains stories upon stories on various themes, such as mothers and fathers, husbands and wives, as well as citizenship and leadership. \r\n<br><br>\r\nI particularly remember and like the following stories: \"The Roses of Saint Elizabeth\", \"An Excellent Wife\", \"The Most Precious Thing\", \"The Lion\'s Hair\", and \"The Three Wishes\".\r\n<br><br>\r\nLet me now share with you this story from Sweden: \"The Three Wishes\".\r\n<br><br>\r\nOnce there was a poor woodcutter who was given three wishes by a fairy for sparing the tree where the fairy lived. When the man went home, he told his wife about this encounter, and they pondered on what to wish for. Soon enough, they got hungry, and the man wished for the sausages that his wife used to make so that they can have something for dinner. Immediately, a great sausage fell through their chimney and into their hearth. His wife got angry at him for wasting one of their wishes, and inadvertently wished that the sausage was stuck in the man\'s nose. It did, and the man desperately wanted to have the sausage removed. The wife stopped him for she didn\'t want to waste their last wish. The man, however, wouldn\'t agree to this, and the wife eventually obliged. \r\n<br><br>\r\nSo those three wishes from the fairy turned out to be sausage for dinner. But it was the best sausage they had ever eaten. As the man said, \"...there\'s nothing much better in the world to wish for than a full stomach.\"', NULL, 0, 0),
(307, 1, 2, 'Why We Buy', 400, NULL, 'English', 'Paco Underhill', NULL, 'Used - Good', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(308, 1, 2, 'The Princeton Review College Essays 2nd ed', 400, NULL, 'English', 'The Princeton Review', NULL, 'Used - Good', NULL, 'Paperback', 0, NULL, NULL, NULL, 0, 0),
(309, 1, 2, 'The Princeton Review Law School Essays', 400, NULL, 'English', 'The Princeton Review', NULL, 'Used - Good', NULL, 'Paperback', 0, NULL, NULL, NULL, 0, 0),
(310, 1, 2, 'The Princeton Review Medical School Essays', 400, NULL, 'English', 'The Princeton Review', NULL, 'Used - Good', NULL, 'Paperback', 0, NULL, NULL, NULL, 0, 0),
(311, 1, 2, 'Leadership is an Art', 400, NULL, 'English', 'Max de Pree', NULL, 'Used - Good', NULL, 'Paperback', 1, NULL, 'The author is chairman emeritus of Herman Miller, Inc., an innovator in the furniture business for sixty years, having been regularly included as one of Fortune\'s 25 Most Admired Companies in the US. But perhaps what really struck me other than the lessons on leadership that Herman Miller, Inc. exemplified, is the way the book has been designed. It\'s double-spaced. Indeed, \"Leadership is an Art\". ', NULL, 0, 0),
(312, 1, 2, 'A Memory of Light', 400, NULL, 'English', 'Robert Jordan', NULL, 'Used - Good', NULL, 'Hardcover', 1, NULL, '\"A Memory of Light\" is book fourteen, the final volume, in the Wheel of Time series. And the imagery that I use whenever I think about what happened in this book is the armies of light and darkness battling it out on the ground, while a giant Rand, the protagonist, and a giant Dark One fight it out not with material weapons, but with philosophical reasoning. Could the force of Light finally triumph over the force of Darkness? Maybe.', NULL, 0, 0),
(313, 1, 10, 'Disney All-Time Favorite Classics', 500, NULL, 'English', 'Disney', NULL, 'Used - Good', NULL, 'Hardcover', 1, NULL, 'I grew up watching Disney shows, not only in the cinema, but also on TV. This book contains thirteen classic Disney favorites. It took the Disney company many years to establish a brand that is easily recognized by people, such that without even reading the movie reviews, a family can go and watch their films. However, there was a time when even Disney had to struggle with animated films that weren\'t doing as well as their earlier releases.\r\n<br><br>\r\nIn any case, what I like about this book is that a person can take a photo of an illustration, and then practice how to draw using a WACOM Tablet + Stylus or an iPAD + Pencil. To tell you the truth, I wanted to become a cartoonist or an animator. But video games offered a more appealing medium where people can interact with the objects on the screen. \r\n<br><br>\r\nMany years later, I am now writing stories, which my team and I turn into storybook apps.\r\n<br><br>\r\nSometimes, while the specifics of what a person wants may be different from what he or she initially wanted, if one ventures to look within, the core remains the same.', NULL, 0, 0),
(314, 1, 2, 'Autobiography of a Yogi', 400, NULL, 'English', 'Paramahansa Yogananda', NULL, 'Used - Good', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(315, 1, 2, 'Great Illustrated Classics The Swiss Family Robinson', 400, NULL, 'English', 'Johann Wyss', NULL, 'Used - Good', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(316, 1, 2, 'Grinding it Out', 450, NULL, 'English', 'Ray Kroc', NULL, 'Used - Good', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(317, 1, 2, 'Hackers and Painters', 500, NULL, 'English', 'Paul Graham', NULL, 'Used - Good', NULL, 'Hardcover', 1, NULL, NULL, NULL, 0, 0),
(318, 1, 10, 'Harry Potter and the Chamber of Secrets', 400, NULL, 'English', 'J. K. Rowling', NULL, 'Used - Good', NULL, 'Paperback', 1, NULL, 'Unlike many precocious children, I didn\'t develop the habit of reading early in life. I preferred to watch cartoons on TV. Eventually, I got into video games. However, my parents allowed us, their children, to play video games only during the summer. So for the rest of the school year, we didn\'t get to play any video games at all. My older brother encouraged me to read fantasy novels instead, which was somewhat of a substitute.<br><br>\r\nIt was only during my third year in high school that I started to enjoy reading, even if my English was still poor.<br><br>\r\nAt the time, the Harry Potter series became quite popular, and it was one of the books that I read.<br><br>\r\nThe series has a very important message, which I believe people who are getting married or are already married should understand as a sign of maturity. When we\'re young, we like to do whatever we want, e.g. visit all sorts of places, experience all sorts of things. But if you\'re lucky, there comes a point when you say to yourself that you\'ve had enough of it. And this realization opens you up to a life that is not only for yourself, but for another, so that that person may enjoy the kind of life you enjoyed. In other words, it is so that that person may live.', NULL, 0, 0),
(319, 1, 10, 'Harry Potter and the Sorcerer\'s Stone', 400, NULL, 'English', 'J. K. Rowling', NULL, 'Used - Good', NULL, 'Paperback', 1, NULL, 'Unlike many precocious children, I didn\'t develop the habit of reading early in life. I preferred to watch cartoons on TV. Eventually, I got into video games. However, my parents allowed us, their children, to play video games only during the summer. So for the rest of the school year, we didn\'t get to play any video games at all. My older brother encouraged me to read fantasy novels instead, which was somewhat of a substitute.<br><br>\r\nIt was only during my third year in high school that I started to enjoy reading, even if my English was still poor.<br><br>\r\nAt the time, the Harry Potter series became quite popular, and it was one of the books that I read.<br><br>\r\nThe series has a very important message, which I believe people who are getting married or are already married should understand as a sign of maturity. When we\'re young, we like to do whatever we want, e.g. visit all sorts of places, experience all sorts of things. But if you\'re lucky, there comes a point when you say to yourself that you\'ve had enough of it. And this realization opens you up to a life that is not only for yourself, but for another, so that that person may enjoy the kind of life you enjoyed. In other words, it is so that that person may live.', NULL, 0, 0),
(320, 1, 2, 'McDonald\'s Behind the Arches', 400, NULL, 'English', 'John Love', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(321, 1, 10, 'The Chronicles of Narnia', 500, NULL, 'English', 'C. S. Lewis', NULL, 'Used - Good', NULL, 'Paperback', 1, NULL, 'I remember choosing C.S. Lewis\' the Narnia Chronicles, particularly the \"Silver Chair\", for one of my final papers in college. In the book, there is a part there where after finally seeing his long lost son, King Caspian eventually dies. <br><br>\r\nAfter building King Caspian’s character in two preceding books, getting to know him as a young boy and then as a courageous seafarer, one cannot help but feel sympathy for the man. Just when he has finally found his son after years and years of searching, he no longer has the strength to enjoy once again his company. \r\n<br><br>\r\nIn life, we often find ourselves faced with such seemingly insurmountable odds that it is easy to give in to despair. Yet just when reason is already shouting at us that all is lost, and the situation is simply too much to bear for any single person, we discover that we are not alone in this struggle. Other people are also fighting their own seemingly insurmountable battles. \r\n<br><br>\r\nAnd with this understanding, when the protagonists, Eustance, Jill, and Aslan, came to where King Caspian\'s body laid, all three stood and wept. Soon afterwards, with this strength that moves all of us, King Caspian\'s dead body began to transform and return to youthfulness, until finally culminating to King Caspian belching out a laugh.<br><br>\r\nIndeed, it is wonderful to be alive. Masarap mabuhay! Peace.', NULL, 0, 0),
(322, 1, 10, 'The Silver Chair', 400, NULL, 'English', 'C. S. Lewis', NULL, 'Used - Good', NULL, 'Paperback', 1, NULL, 'I remember choosing C.S. Lewis\' the Narnia Chronicles, particularly the \"Silver Chair\", for one of my final papers in college. In the book, there is a part there where after finally seeing his long lost son, King Caspian eventually dies. <br><br>\r\nAfter building King Caspian’s character in two preceding books, getting to know him as a young boy and then as a courageous seafarer, one cannot help but feel sympathy for the man. Just when he has finally found his son after years and years of searching, he no longer has the strength to enjoy once again his company. \r\n<br><br>\r\nIn life, we often find ourselves faced with such seemingly insurmountable odds that it is easy to give in to despair. Yet just when reason is already shouting at us that all is lost, and the situation is simply too much to bear for any single person, we discover that we are not alone in this struggle. Other people are also fighting their own seemingly insurmountable battles. \r\n<br><br>\r\nAnd with this understanding, when the protagonists, Eustance, Jill, and Aslan, came to where King Caspian\'s body laid, all three stood and wept. Soon afterwards, with this strength that moves all of us, King Caspian\'s dead body began to transform and return to youthfulness, until finally culminating to King Caspian belching out a laugh.<br><br>\r\nIndeed, it is wonderful to be alive. Masarap mabuhay! Peace.', NULL, 0, 0),
(323, 1, 10, 'The Lightning Thief', 400, NULL, 'English', 'Rick Riordan', NULL, 'Used - Good', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(324, 1, 2, 'Wizard\'s First Rule', 400, NULL, 'English', 'Terry Goodkind', NULL, 'Used - Good', NULL, 'Paperback', 1, NULL, 'It was my older brother who encouraged me to read fantasy novels. Although I didn\'t particularly like how the \"Sword of Truth\" series turn out, I remember and like the following Wizardry rules:<br><br>\r\n1) \"People would believe any lie either because they want it to be true, or they\'re afraid it might be true.\"<br>\r\n2) \"The greatest harm can result from the best intention.\"<br>\r\n3) \"There is magic in forgiveness.\"', NULL, 0, 0),
(325, 1, 2, 'Zen in the Art of Archery', 400, NULL, 'English', 'Eugen Herrigel', NULL, 'Used - Good', '', 'Paperback', 1, NULL, 'When I\'m all by myself, without any friends to play with, I used to play the basketball game \"21\", where, in the Philippines, it\'s played with the player shooting the ball into the basket from the free-throw line. \r\n<br><br>\r\nIf the ball successfully goes in, he earns 2pts. He then has to do a rebound, while keeping the ball bouncing only once. After rebounding, the player can shoot the ball again, which is worth 1pt if it goes in. The goal is to reach exactly 21. If I\'m by myself, I don\'t really count the scores. I just keep on shooting the ball. \r\n<br><br>\r\nWhat I like about this is that after shooting some hoops my body gets into a trance, where I aim, shoot, rebound, and then shoot again mechanically, such that I don\'t really think that much about moving my hands, and getting the rebound, and so forth, anymore.\r\n<br><br>\r\nYears ago, I would let myself think and reflect about things.\r\n<br><br>\r\nSo what was I thinking about? \r\n<br><br>\r\nI thought about how cool it would be to have a son or daughter and play sports together with him or her. I remember that scene in \"Father of the Bride\", where George Banks was playing basketball with his daughter, Annie, as she was growing up. I liked that very much.\r\n<br><br>\r\nNowadays, however, similar to when I do my 6km jog, I don\'t dwell on the thoughts that pass through my mind. \r\n<br><br>\r\nI just keep on moving forward.', NULL, 0, 0),
(326, 1, 2, 'The Pixar Touch', 400, NULL, 'English', 'David Price', NULL, 'Used - Good', NULL, 'Hardcover', 1, NULL, 'This book chronicles the story of how a company of good friends were able to build what would become Pixar Animation Studios as they strove to make their dream of producing a computer animated feature-length film a reality.\r\n<br><br>\r\nTo tell you the truth, except for Disney/Pixar films, I don\'t get to go out to see movies as much anymore. When people ask me if I\'ve seen a particular film, and I tell them no, they usually become hesitant in saying more about it, lest they give away any spoilers. But I would insist in letting them tell the story, because while we may not remember every single detail, the ones that we do, reveal to us what kind of person we are.', NULL, 0, 0),
(327, 1, 8, 'Gundam Fix: The Works of Katoki Hajime', 1200, NULL, 'English/Japanese', 'Katoki Hajime', NULL, 'New', NULL, 'Paperback', 0, NULL, NULL, NULL, 0, 0),
(328, 1, 8, 'Teenage Mutant Ninja Turtles 32 Cards and 8 Designs', 100, NULL, 'English', NULL, NULL, 'Used - Good', NULL, NULL, 2, NULL, NULL, NULL, 0, 0),
(329, 1, 8, 'Teenage Mutant Ninja Turtles 32 Cards and 35 Stickers', 100, NULL, 'English', NULL, NULL, 'Used - Good', NULL, NULL, 2, NULL, NULL, NULL, 0, 0),
(330, 1, 8, 'Teenage Mutant Ninja Turtles 32 Punch-Out Stand-up Cards', 100, NULL, 'English', NULL, NULL, 'Used - Good', NULL, NULL, 2, NULL, NULL, NULL, 0, 0),
(331, 1, 8, 'The Dark Eye Core Rules', 2543, NULL, 'English', 'Markus Plötz/Alex Spohr/Jens Ullrich', NULL, 'New', NULL, 'Hardcover', 0, NULL, NULL, NULL, 0, 0),
(332, 1, 10, 'Boy Tales of Childhood', 235, NULL, 'English', 'Roald Dahl', NULL, 'Used - Good', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(333, 1, 10, 'Charlie and the Great Glass Elevator', 235, NULL, 'English', 'Roald Dahl', NULL, 'Used - Good', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(334, 1, 10, 'Danny the Champion of the World', 235, NULL, 'English', 'Roald Dahl', NULL, 'Used - Good', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(335, 1, 10, 'Esio Trot', 235, NULL, 'English', 'Roald Dahl', NULL, 'Used - Good', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(336, 1, 10, 'Going Solo', 320, NULL, 'English', 'Roald Dahl', NULL, 'Used - Good', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 1),
(337, 1, 10, 'James and the Giant Peach', 400, NULL, 'English', 'Roald Dahl', NULL, 'Used - Good', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(338, 1, 10, 'The BFG', 235, NULL, 'English', 'Roald Dahl', NULL, 'Used - Good', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(339, 1, 10, 'The Magic Finger', 235, NULL, 'English', 'Roald Dahl', NULL, 'Used - Good', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(340, 1, 10, 'The Twits', 235, NULL, 'English', 'Roald Dahl', NULL, 'Used - Good', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(341, 1, 10, 'The Witches', 235, NULL, 'English', 'Roald Dahl', NULL, 'Used - Good', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(342, 1, 10, 'The Wonderful World of Dr Seuss set (1-20)', 560, NULL, 'English', 'Dr. Seuss', NULL, 'Used - Good', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(343, 1, 10, 'The World of Peter Rabbit set (1-23 complete)', 1060, NULL, 'English', 'Beatrix Potter', NULL, 'Used - Good', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(344, 1, 2, 'Super Mario', 1000, NULL, 'English', 'Jeff Ryan', NULL, 'Used - Good', NULL, 'Hardcover', 1, NULL, NULL, NULL, 0, 0),
(345, 4, 11, 'Presto Creams Peanut Butter Sandwich Cookies', 102, NULL, 'English', NULL, NULL, 'New', NULL, NULL, 99, NULL, NULL, NULL, 0, 0),
(346, 1, 8, 'Super Mario Series for Easy Piano (Music Sheet)', 1000, NULL, 'English', NULL, NULL, 'Used - Good', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(347, 1, 8, 'The Legend of Zelda Series for Easy Piano (Music Sheet)', 1000, NULL, 'English', NULL, NULL, 'Used - Good', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(348, 1, 2, 'Foundation and Earth', 300, NULL, 'English', 'Isaac Asimov', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(349, 1, 2, 'Getting to Yes (2nd Ed)', 320, NULL, 'English', 'Roger Fisher, William Ury, Bruce Patton', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(350, 1, 10, 'Sesame Street', 240, NULL, 'English', 'Sesame Workshop', NULL, 'Used - Very Good', NULL, 'Paperback', 1, NULL, 'I remember watching Sesame Street as a child. For some reason, I liked Oscar the Grouch. Nowadays, I like Cookie Monster. \"Night, night, delicious food.\"\r\n<br><br>\r\nThis book is a celebration of 40 years of Sesame Street. From what I can understand, a child can only keep his or her attention on the screen for 3 to 5 minutes. So it was necessary to bring in a Sesame Street character when the child is looking elsewhere due to perhaps too much talking by the adult human characters.\r\n<br><br>\r\nBack when I was a teacher at the university, I eventually learned that I cannot continuously talk and hold my students\' attention beyond 30 minutes. So I had to bring in activities, such as situational quizzes and learning team seatworks, to keep my students from getting bored.\r\n<br><br>\r\nAs a software engineer, I\'ve also learned that I cannot continuously write code the entire day without losing productivity. I use what I call \"short bursts (of intense concentration)\". So for a short span of time, about 30 minutes, I\'ll write code. And then, I\'ll do something else, like read a book, play music, take a short nap, eat something, drink tea, and such things.\r\n<br><br>\r\nIn the workplace, people also intuitively understand that they cannot sit in front of the computer and work and still be productive the entire day. That\'s why there\'ll be meetings and time where people talk to each other, preferably face-to-face. Of course, because of this, there\'ll also be lots of (to my mind) unnecessary politicking, drama, and less actual work getting done. This usually happens when you put any group of people together.\r\n<br><br>\r\nSo a possible remedy to this (and this is what we do at Usbong) is to have the tasks written down as clearly as possible and then delegated to people. They can then do them wherever they want, e.g. the coffee shop, the library, at home. Once they\'re done, they submit their assigned task, and are compensated accordingly. \r\n<br><br>\r\nMeetings are substantially reduced, and the people can do whatever they want with their time, e.g. talk with their spouse, take care of their kids. In this way, the drama can be contained to the people who genuinely care for them, and not necessarily with those who are vying for position or whatnot.', NULL, 0, 0),
(352, 1, 2, 'the five people you meet in heaven', 300, NULL, 'English', 'Mitch Albom', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(353, 1, 2, 'for one more day', 300, NULL, 'English', 'Mitch Albom', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, NULL, 'I no longer remember the story, \"for one more day\", but I do recall crying after finishing the book, and thinking about my mother.', NULL, 0, 0),
(354, 1, 2, 'Gathering Blue', 300, NULL, 'English', 'Lois Lowry', NULL, 'Used - Good', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(355, 1, 2, 'messenger', 300, NULL, 'English', 'Lois Lowry', NULL, 'Used - Good', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(356, 1, 2, 'The Giver', 300, NULL, 'English', 'Lois Lowry', NULL, 'Used - Good', NULL, 'Paperback', 1, NULL, 'I read \"The Giver\" for our Philosophy class back when I was in college. What I particularly remember and like about the story is how The Giver taught the protagonist by transferring to him memories of experiences.\r\n<br><br>\r\nIn the same way, when I began teaching, I did my best to tell stories of my experiences to my students. Of course, to make them a lot more uplifting, I would embellish them somewhat. \r\n<br><br>\r\nI guess I was fortunate that there were students who appreciated the stories. \r\n<br><br>\r\nOne time, there was a student who asked me what this Kanji character meant, 流 (nagare). And I remember sharing with him its meaning by letting him imagine that he was on a boat or a raft that is being carried by a river, which is the character at the bottom, 川  (kawa). And let\'s say the river is raging, 激流 (gekiryuu). Now the water is splashing him all over, which is what the left portion in the character 流 (nagare) means. But the raft continues to flow with the water. 流 (nagare) means \"to flow\".\r\n<br><br>\r\nYears later, the same student came back to the Philippines after migrating to Hawaii and we happened to meet each other again at the university. I was glad to learn that one of the stories that he remembered was me.\r\n<br><br>\r\nMasarap mabuhay!', NULL, 0, 0),
(357, 1, 2, 'Northern Lights', 350, NULL, 'English', 'Philip Pullman', NULL, 'Used - Good', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(358, 1, 2, 'The Amber Spyglass', 350, NULL, 'English', 'Philip Pullman', NULL, 'Used - Good', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0);
INSERT INTO `product` (`product_id`, `merchant_id`, `product_type_id`, `name`, `price`, `previous_price`, `language`, `author`, `supplier`, `description`, `image_location`, `format`, `quantity_in_stock`, `translator`, `product_overview`, `pages`, `product_view_num`, `quantity_sold`) VALUES
(359, 1, 2, 'The Golden Compass', 350, NULL, 'English', 'Philip Pullman', NULL, 'Used - Good', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(360, 1, 2, 'The Subtle Knife', 350, NULL, 'English', 'Philip Pullman', NULL, 'Used - Good', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(361, 1, 8, 'hajimete no hisashiburi no otona no piano (Music Sheet)', 850, NULL, 'Japanese', NULL, '', 'New', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(362, 1, 8, 'Mr Children yasashii piano solo (Music Sheet)', 1175, NULL, 'Japanese', NULL, NULL, 'Used - Good', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(363, 1, 8, 'The Lord of the Rings Instrumental Solos (Music Sheet)', 200, NULL, 'English', NULL, NULL, 'Used - Good', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(364, 1, 7, 'fruits basket set (1-23 complete)', 1650, NULL, 'Japanese', NULL, NULL, 'New', 'Paperback', NULL, 1, NULL, NULL, NULL, 0, 0),
(365, 1, 7, 'fushigi yuugi set (1-18 complete)', 2120, NULL, 'Japanese', NULL, NULL, 'New', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(366, 1, 7, 'hanayori dango set (1-37 complete)', 2145, NULL, 'Japanese', NULL, NULL, 'New', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(367, 1, 6, 'kaze no tani no naushika comic set (1-7 complete)', 1330, NULL, 'English', 'Hayao Miyazaki', NULL, 'New', NULL, 'Paperback', 2, NULL, NULL, NULL, 0, 0),
(368, 1, 2, 'Zen and Japanese Culture', 500, NULL, 'English', 'D. T. Suzuki', NULL, 'Used - Good', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(369, 1, 2, 'Host Family Survival Kit (2nd Ed)', 300, NULL, 'English', 'Nancy King/Ken Huff', NULL, 'Used - Very Good', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(370, 1, 2, 'I and Thou', 300, NULL, 'English', 'Martin Buber', NULL, 'Used - Very Good', NULL, 'Paperback', 1, NULL, 'I don\'t read a lot of Philosophy books anymore, particularly from Western Philosophy, because from my experience, what usually happens is that while the goal is to make sense of, for example, the human condition, I only find myself getting buried with all sorts of words and labels for this and that until I realize that I’ve gotten myself even more confused.\r\n<br><br>\r\nWhat I can understand from \"I and Thou\", however, is that if we treat another person or animal, not as a thing or an object, but somewhat like ourself, with needs and emotions, we can actually experience even momentarily what it would be like to go beyond our self and be in that person or animal\'s situation.\r\n<br><br>\r\nSo for example, at home, we have quite a number of stray cats. Usually, when I pass by, they would scurry off and hide. However, there would be one or two of them who would stay their ground and not be flustered by my approach at all.\r\n<br><br>\r\nSomehow, I find myself admiring these cats who exude such quiet confidence.', NULL, 0, 0),
(371, 1, 10, 'The Last Olympian', 350, NULL, 'English', 'Rick Riordan', NULL, 'Used - Good', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(372, 1, 2, 'Carrying the Fire', 315, NULL, 'English', 'Michael Collins', NULL, 'Used - Good', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(373, 1, 2, 'Star Trek Memories', 400, NULL, 'English', 'William Shatner/Chris Kreski', NULL, 'Used - Good', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(374, 1, 2, 'Emotional Intelligence', 320, NULL, 'English', 'Daniel Goleman', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(375, 1, 2, 'Leap of Faith', 280, NULL, 'English', 'Gordon Cooper/Bruce Henderson', NULL, 'Used - Good', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(376, 1, 2, 'First Man The Life of Neil A Armstrong', 285, NULL, 'English', 'James Hansen', NULL, 'Used - Good', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(377, 1, 2, 'The Millionaire Mind', 450, NULL, 'English', 'Thomas Stanley, Ph.D.', NULL, 'Used - Good', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(378, 1, 2, 'True at First Light', 320, NULL, 'English', 'Ernest Hemingway', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(379, 1, 2, 'Crime and Punishment (Unabridged)', 300, NULL, 'English', 'Fyodor Dostoyevsky', NULL, 'Used - Acceptable', NULL, 'Paperback', 0, NULL, 'I remember reading \"Crime and Punishment (Unabridged)\". I liked it. It felt true.', NULL, 0, 0),
(380, 1, 2, 'Dirk Gently\'s Holistic Detective Agency and The Long Dark Tea-time of the Soul', 320, NULL, 'English', 'Douglas Adams', NULL, 'Used - Acceptable', NULL, 'Hardcover', 1, NULL, NULL, NULL, 0, 0),
(381, 1, 2, 'Moonwalking with Einstein', 450, NULL, 'English', 'Joshua Foer', NULL, 'New', NULL, 'Harcover', 1, NULL, NULL, NULL, 0, 0),
(382, 1, 2, 'A Farewell to Arms', 320, NULL, 'English', 'Ernest Hemingway', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(383, 1, 2, 'Baksheesh and Brahman', 450, NULL, 'English', 'Joseph Campbell', NULL, 'Used - Good', NULL, 'Hardcover', 1, NULL, NULL, NULL, 0, 0),
(384, 1, 10, 'Bridge to Terabithia', 300, NULL, 'English', 'Katherine Paterson', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(385, 1, 2, 'For Whom The Bell Tolls', 320, NULL, 'English', 'Ernest Hemingway', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(386, 1, 2, 'Six Easy Pieces', 320, NULL, 'English', 'Richard Feynman', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(387, 1, 2, 'The Tale of Genji', 400, NULL, 'English', 'Murasaki Shikibu', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(388, 1, 2, 'Walden', 320, NULL, 'English', 'Henry David Thoreau', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(389, 1, 2, 'A World of Ideas', 320, NULL, 'English', 'Bill Moyers, et al.', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(390, 1, 2, 'Now and Forever', 320, NULL, 'English', 'Ray Bradbury', NULL, 'Used - Good', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(391, 1, 2, 'The Martian Chronicles', 320, NULL, 'English', 'Ray Bradbury', NULL, 'Used - Good', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(392, 1, 2, 'Rendezvous with Rama', 320, NULL, 'English', 'Arthur Clarke', NULL, 'Used - Good', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(393, 1, 8, 'Polaris The Roleplaying Game', 3270, NULL, 'English', 'Tessier, Philippe', NULL, 'New', NULL, 'Hardcover', 0, NULL, NULL, NULL, 0, 0),
(394, 1, 8, 'Paranoia', 4312, NULL, 'English', 'Mangoose Publishing', NULL, 'New', NULL, 'Paperback', 0, NULL, NULL, NULL, 0, 0),
(395, 1, 2, 'Teach Yourself Brain Training for Babies', 250, NULL, 'English', 'Fergus Lowe/Brigid Lowe', NULL, 'Used - Good', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(396, 1, 2, 'Teach Yourself Raise a Confident Child', 250, NULL, 'English', 'Hilary Pereira', NULL, 'Used - Good', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(397, 1, 2, 'Teach Yourself Successful Breastfeeding', 250, NULL, 'English', 'Pauline Lim', NULL, 'Used - Good', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(398, 1, 2, 'Teach Yourself Understand Eastern Philosophy', 250, NULL, 'English', 'Mel Thompson', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(399, 1, 2, 'Teach Yourself Your Baby\'s Development', 250, NULL, 'English', 'Caroline Deacon', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(400, 1, 2, 'The Innovator\'s Dilemma', 250, NULL, 'English', 'Clayton Christensen', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, NULL, NULL, NULL, 0, 0),
(401, 1, 6, 'Expeditions Comics', 599, NULL, 'English', 'Rhea Llamas, et al.', NULL, 'Used - Good', NULL, 'Paperback', 0, NULL, NULL, NULL, 0, 0),
(402, 1, 2, 'Expeditions Prose', 499, NULL, 'English', 'Rhea Llamas, et al.', NULL, 'Used - Good', NULL, 'Paperback', 0, NULL, NULL, NULL, 0, 0),
(403, 1, 2, 'Preparation for the SAT (11th ed)', 250, NULL, 'English', 'Edward Deptula, MA, et al.', NULL, 'Used - Acceptable', NULL, 'Paperback', 0, NULL, NULL, NULL, 0, 0),
(404, 1, 8, 'Chinese Classic Cartoons (7plus1 films)', 2800, NULL, 'English/Mandarin (Traditional)', NULL, NULL, 'Used - Good', NULL, NULL, 0, NULL, 'I bought this during a trip to Taiwan; I haven\'t seen all the films yet, but I do remember showing one of the \"Journey to the West (西遊記)\" films to my Chinese Mandarin class. \r\n<br><br>\r\nI can recall its artwork from a series of books I saw in the library back in grade school. Somehow, I found myself hanging out in the library, even though I didn\'t really read much, not even comic books. I think I had a copy of Jughead comics. It\'s the one where he was eating lots of hamburgers. Anyway, maybe I was in the library, because we weren\'t given a lot of time to play outside.\r\n<br><br>\r\nThe Monkey character is interesting, because he is quite unbeatable, such that even the celestial beings couldn\'t stop him. Eventually, a golden headband was put on his head to supposedly subdue/control him, but he was able to eventually remove it. \r\n<br><br>\r\nIn the \"Journey to the West\" stories, he acts for the best interest of their group, even if he is often misunderstood. \r\n<br><br>\r\nI would relate the Monkey to a flowing, even raging, river, which does what is good for all. And no matter how people attempt to control or influence it to suit their own hidden agendas, they only find themselves being swept away.\r\n<br><br>\r\nAnd what is it that a person should do when he or she becomes aware that he or she is in this river? \r\n<br><br>\r\nNow that\'s another story for another time.', NULL, 0, 0),
(405, 1, 8, 'Disney Hits Easy Piano', 500, NULL, 'English', NULL, NULL, 'Used - Acceptable', NULL, 'Paperback', 0, NULL, NULL, NULL, 0, 0),
(406, 1, 9, 'Hangeul Wikang korean Prime Korean', 280, NULL, 'English/Korean', 'Johnson Park', NULL, 'Used - Acceptable', NULL, 'Paperback', 0, NULL, 'The \"Hangeul Wikang korean Prime Korean\" is actually surprisingly good material for learning Korean, because aside from basic grammar patterns, it has sample sentences in various everyday contexts. The sentences are in Hanguel as well as in romanized form.\r\n<br><br>\r\nLearning Korean has actually offered me some interesting experiences, especially since there are quite a number of Korean people living in the Philippines.\r\n<br><br>\r\nOne time, I remember eating at a Korean restaurant during my dad\'s company staff lunch. It was run by a Korean couple.\r\n<br><br>\r\nAfter awhile, I thought of getting myself some water. I approached the couple, who were near the entrance of the store. I politely greeted them with peace in Korean, and asked them where I could get water. \r\n<br><br>\r\nMaybe I felt that I spoke too quickly in English, because I followed it up by asking them if there was water, using the little that I knew of the Korean language. \r\n<br><br>\r\nFortunately, they understood what I was asking, which is how I got my water. After we\'ve had our lunch, I learned that we got ourselves seaweeds as thank you. ', NULL, 0, 0),
(407, 1, 10, 'Journey to the West (xiyouji)', 420, NULL, 'Mandarin (Traditional)', 'wu cheng en, et al.', NULL, 'Used - Good', NULL, 'Paperback', 0, NULL, NULL, NULL, 0, 0),
(408, 1, 10, 'Water Margin (shuihuzhuan)', 420, NULL, 'Mandarin (Traditional)', 'shi nai an, et al.', NULL, 'New', NULL, 'Paperback', 0, NULL, NULL, NULL, 0, 0),
(409, 1, 2, 'The Analects of Confucius', 180, NULL, 'English', 'Yuan Fang Publishing', NULL, 'Used - Good', NULL, 'Paperback', 0, NULL, NULL, NULL, 0, 0),
(410, 1, 9, 'Select Essays for Recitation', 420, NULL, 'English/Mandarin (Traditional)', 'yi xiong ge yue, et al.', NULL, 'Used - Acceptable', NULL, 'Paperback', 0, NULL, NULL, NULL, 0, 0),
(411, 1, 9, '2008-2010 English Reading', 450, NULL, 'English/Mandarin (Traditional)', 'nie qun, et al.', NULL, 'Used - Acceptable', NULL, 'Paperback', 0, NULL, NULL, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_type`
--

CREATE TABLE `product_type` (
  `product_type_id` int(11) NOT NULL,
  `product_type_name` varchar(30) NOT NULL,
  `product_type_view_num` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_type`
--

INSERT INTO `product_type` (`product_type_id`, `product_type_name`, `product_type_view_num`) VALUES
(1, 'All', 921),
(2, 'Books', 1001),
(3, 'Beverages', 182),
(4, 'Books/Beverages', 0),
(5, 'Promos', 151),
(6, 'Comics', 203),
(7, 'Manga', 156),
(8, 'Toys & Collectibles', 211),
(9, 'Textbooks', 171),
(10, 'Children\'s', 478),
(11, 'Food', 242),
(12, 'Miscellaneous', 198);

-- --------------------------------------------------------

--
-- Table structure for table `search`
--

CREATE TABLE `search` (
  `search_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `searched_item` varchar(512) NOT NULL,
  `added_datetime_stamp` datetime NOT NULL,
  `fulfilled_datetime_stamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `search`
--

INSERT INTO `search` (`search_id`, `customer_id`, `searched_item`, `added_datetime_stamp`, `fulfilled_datetime_stamp`) VALUES
(1, -1, 'popsicle', '2017-09-15 17:04:59', '0000-00-00 00:00:00'),
(2, -1, 'japan', '2017-09-15 17:05:28', '0000-00-00 00:00:00'),
(3, -1, 'popsicle', '2017-09-15 17:05:58', '0000-00-00 00:00:00'),
(4, -1, 'popsicle', '2017-09-15 19:48:43', '0000-00-00 00:00:00'),
(5, -1, 'wooden', '2017-09-26 17:02:31', '0000-00-00 00:00:00'),
(6, -1, 'wooden', '2017-10-07 16:52:48', '0000-00-00 00:00:00'),
(7, -1, 'wooden', '2017-10-07 16:52:55', '0000-00-00 00:00:00'),
(8, -1, 'wooden', '2017-10-07 16:53:02', '0000-00-00 00:00:00'),
(9, -1, 'wooden', '2017-10-07 16:53:21', '0000-00-00 00:00:00'),
(10, -1, 'wooden', '2017-10-07 17:00:57', '0000-00-00 00:00:00'),
(11, -1, 'wooden', '2017-10-07 17:01:09', '0000-00-00 00:00:00'),
(12, -1, 'wooden', '2017-10-07 17:01:20', '0000-00-00 00:00:00'),
(13, -1, 'tea', '2017-10-07 17:01:23', '0000-00-00 00:00:00'),
(14, -1, 'wooden', '2017-10-07 17:01:28', '0000-00-00 00:00:00'),
(15, -1, 'wooden', '2017-10-07 17:02:11', '0000-00-00 00:00:00'),
(16, -1, 'tea', '2017-10-07 17:02:16', '0000-00-00 00:00:00'),
(17, 1, 'wooden', '2017-10-08 16:10:38', '0000-00-00 00:00:00'),
(18, 1, 'genki', '2017-10-08 16:12:57', '0000-00-00 00:00:00'),
(19, -1, 'dilbert', '2017-10-09 19:32:03', '0000-00-00 00:00:00'),
(20, 3, 'made to stick', '2017-10-11 20:36:37', '0000-00-00 00:00:00'),
(21, -1, 'stick', '2017-10-12 08:05:16', '0000-00-00 00:00:00'),
(22, 3, 'stick', '2017-10-12 08:05:28', '0000-00-00 00:00:00'),
(23, 3, 'stick', '2017-10-12 12:49:13', '0000-00-00 00:00:00'),
(24, -1, 'peace', '2017-10-12 17:02:24', '0000-00-00 00:00:00'),
(25, -1, 'community', '2017-10-12 17:02:30', '0000-00-00 00:00:00'),
(26, -1, 'Roald Dahl', '2017-11-07 19:32:56', '0000-00-00 00:00:00'),
(27, 1, 'Roald Dahl', '2017-11-08 07:40:59', '0000-00-00 00:00:00'),
(28, -1, 'bjt', '2017-11-09 13:53:16', '0000-00-00 00:00:00'),
(29, 1, 'piano', '2017-11-11 14:54:33', '0000-00-00 00:00:00'),
(30, -1, 'mario', '2017-11-26 07:51:38', '0000-00-00 00:00:00'),
(31, -1, 'tea', '2017-11-26 08:57:00', '0000-00-00 00:00:00'),
(32, -1, 'Green Tea', '2017-11-26 08:57:10', '0000-00-00 00:00:00'),
(33, -1, 'sencha', '2017-11-26 08:57:19', '0000-00-00 00:00:00'),
(34, -1, 'dream', '2017-11-26 19:52:49', '0000-00-00 00:00:00'),
(35, -1, 'music', '2017-11-27 13:34:01', '0000-00-00 00:00:00'),
(36, -1, 'piano', '2017-11-27 13:34:08', '0000-00-00 00:00:00'),
(37, -1, 'music', '2017-11-27 13:39:21', '0000-00-00 00:00:00'),
(38, -1, 'Music Sheet', '2017-11-27 13:39:34', '0000-00-00 00:00:00'),
(39, -1, 'piano music', '2017-11-27 13:39:59', '0000-00-00 00:00:00'),
(40, -1, 'first star fire', '2017-12-06 07:47:44', '0000-00-00 00:00:00'),
(41, -1, 'life star fire', '2017-12-06 07:48:05', '0000-00-00 00:00:00'),
(42, -1, '\"life star fire\"', '2017-12-06 07:48:16', '0000-00-00 00:00:00'),
(43, -1, 'life || star || fire', '2017-12-06 07:48:54', '0000-00-00 00:00:00'),
(44, -1, 'life+star', '2017-12-07 10:18:04', '0000-00-00 00:00:00'),
(45, -1, 'music', '2017-12-07 16:28:50', '0000-00-00 00:00:00'),
(46, -1, 'quiet', '2017-12-09 08:11:33', '0000-00-00 00:00:00');

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
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `customer_order`
--
ALTER TABLE `customer_order`
  MODIFY `customer_order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `customer_request`
--
ALTER TABLE `customer_request`
  MODIFY `customer_request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `customer_sell`
--
ALTER TABLE `customer_sell`
  MODIFY `customer_sell_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=412;
--
-- AUTO_INCREMENT for table `product_type`
--
ALTER TABLE `product_type`
  MODIFY `product_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `search`
--
ALTER TABLE `search`
  MODIFY `search_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
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
