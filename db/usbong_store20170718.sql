-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2017 at 06:26 AM
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
  `removed_datetime_stamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `product_id`, `customer_id`, `customer_order_id`, `quantity`, `price`, `added_datetime_stamp`, `purchased_datetime_stamp`, `removed_datetime_stamp`) VALUES
(176, 1, 7, 16, 0, 400, '2017-07-04 17:55:58', '2017-07-07 08:23:40', '2017-07-13 02:39:06'),
(177, 2, 7, NULL, 0, 400, '2017-07-04 17:56:04', '0000-00-00 00:00:00', '2017-07-13 15:30:21'),
(178, 4, 7, NULL, 0, 500, '2017-07-04 17:56:28', '0000-00-00 00:00:00', '2017-07-04 05:56:38'),
(179, 2, 7, 25, 0, 400, '2017-07-07 08:29:40', '2017-07-07 10:07:48', '2017-07-13 15:30:21'),
(180, 28, 7, NULL, 0, 420, '2017-07-07 20:16:03', '0000-00-00 00:00:00', '2017-07-08 01:15:09'),
(181, 28, 7, NULL, 0, 420, '2017-07-07 20:16:31', '0000-00-00 00:00:00', '2017-07-08 01:15:09'),
(182, 28, 7, NULL, 0, 420, '2017-07-07 20:16:56', '0000-00-00 00:00:00', '2017-07-08 01:15:09'),
(183, 28, 7, NULL, 0, 420, '2017-07-07 20:17:20', '0000-00-00 00:00:00', '2017-07-08 01:15:09'),
(184, 28, 7, NULL, 0, 420, '2017-07-07 20:18:44', '0000-00-00 00:00:00', '2017-07-08 01:15:09'),
(185, 28, 7, NULL, 0, 420, '2017-07-07 20:19:06', '0000-00-00 00:00:00', '2017-07-08 01:15:09'),
(186, 28, 7, NULL, 0, 420, '2017-07-07 20:20:01', '0000-00-00 00:00:00', '2017-07-08 01:15:09'),
(187, 28, 7, NULL, 0, 420, '2017-07-07 20:20:25', '0000-00-00 00:00:00', '2017-07-08 01:15:09'),
(188, 1, 7, NULL, 0, 400, '2017-07-07 20:23:48', '0000-00-00 00:00:00', '2017-07-13 02:39:06'),
(189, 21, 7, NULL, 0, 400, '2017-07-07 20:23:58', '0000-00-00 00:00:00', '2017-07-08 09:26:34'),
(190, 28, 7, NULL, 0, 420, '2017-07-08 09:26:46', '0000-00-00 00:00:00', '2017-07-08 01:15:09'),
(191, 30, 7, NULL, 0, 420, '2017-07-08 10:02:33', '0000-00-00 00:00:00', '2017-07-10 04:12:58'),
(192, 30, 7, NULL, 0, 420, '2017-07-08 10:22:13', '0000-00-00 00:00:00', '2017-07-10 04:12:58'),
(193, 30, 7, 93, 0, 420, '2017-07-08 10:34:47', '2017-07-08 01:15:14', '2017-07-10 04:12:58'),
(194, 28, 7, NULL, 0, 420, '2017-07-08 10:34:55', '0000-00-00 00:00:00', '2017-07-08 01:15:09'),
(195, 28, 7, NULL, 0, 420, '2017-07-08 10:35:04', '0000-00-00 00:00:00', '2017-07-08 01:15:09'),
(196, 1, 7, NULL, 0, 400, '2017-07-08 10:43:00', '0000-00-00 00:00:00', '2017-07-13 02:39:06'),
(197, 2, 7, NULL, 0, 400, '2017-07-08 10:43:08', '0000-00-00 00:00:00', '2017-07-13 15:30:21'),
(198, 33, 7, NULL, 0, 400, '2017-07-08 10:43:17', '0000-00-00 00:00:00', '2017-07-08 01:15:07'),
(199, 1, 7, 130, 0, 400, '2017-07-10 16:13:03', '2017-07-10 04:13:10', '2017-07-13 02:39:06'),
(200, 2, 7, 181, 0, 400, '2017-07-11 10:22:08', '2017-07-11 10:23:14', '2017-07-13 15:30:21'),
(201, 1, 7, 198, 0, 400, '2017-07-11 10:39:01', '2017-07-11 10:39:03', '2017-07-13 02:39:06'),
(202, 3, 7, 200, 0, 400, '2017-07-11 13:59:05', '2017-07-11 02:35:03', '2017-07-13 15:30:22'),
(203, 11, 7, 265, 0, 400, '2017-07-13 13:38:08', '2017-07-13 01:38:15', '2017-07-13 02:39:08'),
(204, 2, 7, 268, 0, 400, '2017-07-13 14:39:14', '2017-07-13 02:42:02', '2017-07-13 15:30:21'),
(205, 3, 7, 268, 0, 400, '2017-07-13 14:41:57', '2017-07-13 02:42:02', '2017-07-13 15:30:22'),
(206, 5, 7, 270, 2, 400, '2017-07-13 14:47:56', '2017-07-13 02:48:00', '0000-00-00 00:00:00'),
(207, 4, 7, 271, 1, 500, '2017-07-13 14:49:28', '2017-07-13 02:49:36', '0000-00-00 00:00:00'),
(208, 10, 7, 271, 1, 400, '2017-07-13 14:49:32', '2017-07-13 02:49:36', '0000-00-00 00:00:00'),
(209, 21, 7, 272, 1, 400, '2017-07-13 15:00:42', '2017-07-13 03:00:46', '0000-00-00 00:00:00'),
(210, 1, 7, 273, 1, 400, '2017-07-13 15:10:15', '2017-07-13 03:10:25', '0000-00-00 00:00:00'),
(211, 4, 7, 273, 1, 500, '2017-07-13 15:10:19', '2017-07-13 03:10:25', '0000-00-00 00:00:00'),
(212, 9, 7, 274, 1, 250, '2017-07-13 15:15:55', '2017-07-13 15:16:27', '0000-00-00 00:00:00'),
(213, 3, 7, 275, 0, 400, '2017-07-13 15:20:56', '2017-07-13 15:20:58', '2017-07-13 15:30:22'),
(214, 2, 7, 276, 0, 400, '2017-07-13 15:21:58', '2017-07-13 15:22:01', '2017-07-13 15:30:21'),
(215, 5, 7, 277, 1, 400, '2017-07-13 15:23:07', '2017-07-13 15:23:11', '0000-00-00 00:00:00'),
(216, 2, 7, NULL, 0, 400, '2017-07-13 15:25:10', '0000-00-00 00:00:00', '2017-07-13 15:30:21'),
(217, 3, 7, NULL, 0, 400, '2017-07-13 15:29:49', '0000-00-00 00:00:00', '2017-07-13 15:30:22'),
(218, 8, 7, 278, 1, 1000, '2017-07-13 15:30:17', '2017-07-13 15:30:27', '0000-00-00 00:00:00'),
(219, 1, 7, 279, 1, 400, '2017-07-13 15:31:00', '2017-07-13 15:31:03', '0000-00-00 00:00:00'),
(220, 5, 7, 280, 1, 400, '2017-07-13 15:34:48', '2017-07-13 15:34:51', '0000-00-00 00:00:00'),
(221, 2, 7, 281, 1, 400, '2017-07-13 15:35:42', '2017-07-13 15:35:45', '0000-00-00 00:00:00'),
(222, 1, 7, 282, 1, 400, '2017-07-13 15:40:52', '2017-07-13 15:40:56', '0000-00-00 00:00:00'),
(223, 1, 7, 283, 1, 400, '2017-07-13 15:41:58', '2017-07-13 15:42:01', '0000-00-00 00:00:00'),
(224, 1, 7, 284, 1, 400, '2017-07-13 15:42:48', '2017-07-13 15:42:51', '0000-00-00 00:00:00'),
(225, 1, 7, 285, 1, 400, '2017-07-13 15:43:05', '2017-07-13 15:43:10', '0000-00-00 00:00:00'),
(226, 1, 7, 285, 1, 400, '2017-07-13 15:43:06', '2017-07-13 15:43:10', '0000-00-00 00:00:00'),
(227, 1, 7, 286, 1, 400, '2017-07-13 15:44:00', '2017-07-13 15:44:02', '0000-00-00 00:00:00'),
(228, 1, 7, 287, 1, 400, '2017-07-13 15:46:00', '2017-07-13 15:46:02', '0000-00-00 00:00:00'),
(229, 4, 7, 288, 1, 500, '2017-07-13 15:50:24', '2017-07-13 15:50:29', '0000-00-00 00:00:00'),
(230, 4, 7, 288, 1, 500, '2017-07-13 15:50:26', '2017-07-13 15:50:29', '0000-00-00 00:00:00'),
(231, 1, 7, 289, 1, 400, '2017-07-13 15:52:58', '2017-07-13 15:53:00', '0000-00-00 00:00:00'),
(232, 1, 7, 290, 1, 400, '2017-07-13 15:53:33', '2017-07-13 15:53:36', '0000-00-00 00:00:00'),
(233, 3, 7, 291, 1, 400, '2017-07-13 15:54:21', '2017-07-13 15:54:24', '0000-00-00 00:00:00'),
(234, 2, 7, 292, 1, 400, '2017-07-14 17:37:14', '2017-07-15 17:03:13', '0000-00-00 00:00:00'),
(235, 1, 7, 292, 2, 400, '2017-07-15 17:03:10', '2017-07-15 17:03:13', '0000-00-00 00:00:00'),
(236, 4, 7, 293, 1, 500, '2017-07-16 09:03:19', '2017-07-16 09:04:00', '0000-00-00 00:00:00'),
(237, 5, 7, 294, 2, 400, '2017-07-16 10:05:45', '2017-07-16 10:05:48', '0000-00-00 00:00:00'),
(238, 3, 7, NULL, 1, 400, '2017-07-16 14:43:33', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(239, 2, 12, 295, 1, 400, '2017-07-16 15:37:48', '2017-07-16 15:53:35', '0000-00-00 00:00:00'),
(240, 1, 12, 296, 1, 400, '2017-07-17 20:09:40', '2017-07-17 20:09:47', '0000-00-00 00:00:00'),
(241, 3, 13, 297, 1, 400, '2017-07-18 08:56:49', '2017-07-18 08:57:49', '0000-00-00 00:00:00'),
(242, 9, 13, 298, 3, 250, '2017-07-18 09:16:24', '2017-07-18 09:16:28', '0000-00-00 00:00:00'),
(243, 1, 12, NULL, 1, 400, '2017-07-18 10:07:33', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
  `is_admin` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_first_name`, `customer_last_name`, `customer_email_address`, `customer_password`, `customer_contact_number`, `customer_shipping_address`, `customer_city`, `customer_country`, `customer_postal_code`, `mode_of_payment_id`, `is_admin`) VALUES
(1, 'Michael', 'Syson', 'masarapmabuhay@gmail.com', 'mbs', 0, '', '0', '', 0, 0, 0),
(3, 'm', 'm', 'm@usbong.ph', 'm', 0, '', '0', '', 0, 0, 0),
(4, 'Mike', 'Syson', 'a@c.ph', 'aa', 0, '', '0', '', 0, 0, 0),
(5, 's', 's', '$2y$10$WL6z4DXSb0EJmiZt1FxKhOK', 's', 0, '', '0', '', 0, 0, 0),
(6, 'b', 'b', 'b@usbong.ph', '$2y$10$WtGuuf9v8gplDmKGBKKb5OBzifJNW.tbl4GCoOye1UBu/6tfVFWYq', 0, '', '0', '', 0, 0, 0),
(7, 'Michael', 'Syson', 'masarapmabuhay@gmail.com', '$2y$10$IoTjRH3daPfVTcDnQVOS8uyuDFQMMyL2JeF79x4/zM6e8g9FPDIzC', 2147483647, '2 E. Rodriguez Ave. Sto. Nino', 'Marikina City', 'Philippines', 1800, 1, 0),
(8, 'b', 'b', 'b@usbong.ph', '$2y$10$Lz2GQBQrmxsZK5df1OmZnO34YJy98TnTuJBkf5zktP475xCMSyX.2', 0, '', '0', '', 0, 0, 0),
(10, 'd', 'd', 'd@usbong.ph', '$2y$10$J3/pUt5KIN9BSceypK8m5Ow09/AU9Awk5IFbc/bcB39LZ965uD2sa', 0, '', '0', '', 0, 0, 0),
(11, 'e', 'e', 'e@usbong.ph', '$2y$10$EqVlR7nDUh3TomX.5iLE0OPc0/ZXWRfJIm8fn1W6AyntLJnsGzmdO', 0, '', '0', '', 0, 0, 0),
(12, '123', '123', '123@usbong.ph', '$2y$10$HxeLHivsr.iKdjFgVi8bBu72mm8T4V.cbin02cpAsnXXvxI4ZTbqG', 1234567, '2 E. Rodriguez Ave. Sto. Nino', 'Marikina City', 'Philippines', 1800, 0, 1),
(13, 'def', 'def', 'def@usbong.ph', '$2y$10$A2T3XTfAol2Vrmlt7RYOfeDksQMyhvI3WEEQbjCjWwhYowCL5yRn6', 1234567, '2 E. Rodriguez Ave. Sto. Nino', 'Marikina City', 'Philippines', 1800, 0, 0),
(14, '456', '456', '456@usbong.ph', '$2y$10$EXfXo5ezmHSBCrKhd3fi4uyI1EwKgSdM7NWDb02bNoVyTsfrQMRly', NULL, NULL, NULL, NULL, NULL, 0, 0);

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
  `fulfilled_status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_order`
--

INSERT INTO `customer_order` (`customer_order_id`, `customer_id`, `added_datetime_stamp`, `quantity`, `status_accepted`, `order_total_price`, `fulfilled_status`) VALUES
(0, 7, '2017-07-03 12:52:44', 10, 0, 10000, 0),
(2, 7, '2017-07-03 16:50:11', 5, 1, 2000, 0),
(3, 7, '2017-07-03 16:55:11', 5, 1, 2000, 0),
(4, 7, '2017-07-03 17:07:39', 5, 1, 2000, 0),
(5, 7, '2017-07-03 17:10:02', 2, 1, 650, 0),
(6, 7, '2017-07-03 17:12:40', 5, 1, 2000, 0),
(7, 7, '2017-07-03 17:24:43', 5, 1, 2000, 0),
(8, 7, '2017-07-03 17:26:12', 3, 1, 1000, 0),
(9, 7, '2017-07-03 17:40:50', 6, 1, 1750, 0),
(10, 7, '2017-07-04 10:10:53', 6, 1, 1750, 0),
(11, 7, '2017-07-04 10:13:45', 7, 1, 2150, 0),
(12, 7, '2017-07-04 10:14:08', 7, 1, 2150, 0),
(13, 7, '2017-07-04 10:14:39', 7, 1, 2150, 0),
(14, 7, '2017-07-04 10:15:58', 5, 1, 1500, 0),
(15, 7, '2017-07-04 15:40:41', 4, 1, 2800, 0),
(16, 7, '2017-07-07 08:23:40', 2, 1, 800, 0),
(17, 7, '2017-07-07 08:26:23', 2, 1, 800, 0),
(18, 7, '2017-07-07 08:27:15', 2, 1, 800, 0),
(19, 7, '2017-07-07 08:27:42', 2, 1, 800, 0),
(20, 7, '2017-07-07 08:27:59', 0, 1, 0, 0),
(21, 7, '2017-07-07 08:28:09', 0, 1, 0, 0),
(22, 7, '2017-07-07 08:28:19', 0, 1, 0, 0),
(23, 7, '2017-07-07 08:28:27', 0, 1, 0, 0),
(24, 7, '2017-07-07 08:28:55', 0, 1, 0, 0),
(25, 7, '2017-07-07 10:07:48', 1, 1, 400, 0),
(26, 7, '2017-07-07 10:15:44', 1, 1, 400, 0),
(27, 7, '2017-07-07 10:16:00', 0, 1, 0, 0),
(28, 7, '2017-07-07 10:16:07', 0, 1, 0, 0),
(29, 7, '2017-07-07 10:16:54', 0, 1, 0, 0),
(30, 7, '2017-07-07 10:17:00', 0, 1, 0, 0),
(31, 7, '2017-07-07 10:18:12', 0, 1, 0, 0),
(32, 7, '2017-07-07 10:18:17', 0, 1, 0, 0),
(33, 7, '2017-07-07 10:18:27', 0, 1, 0, 0),
(34, 7, '2017-07-07 10:19:26', 0, 1, 0, 0),
(35, 7, '2017-07-07 10:19:34', 0, 1, 0, 0),
(36, 7, '2017-07-07 10:20:01', 0, 1, 0, 0),
(37, 7, '2017-07-07 10:20:23', 0, 1, 0, 0),
(38, 7, '2017-07-07 10:20:29', 0, 1, 0, 0),
(39, 7, '2017-07-07 10:20:46', 0, 1, 0, 0),
(40, 7, '2017-07-07 10:20:53', 0, 1, 0, 0),
(41, 7, '2017-07-07 10:21:03', 0, 1, 0, 0),
(42, 7, '2017-07-07 10:21:28', 0, 1, 0, 0),
(43, 7, '2017-07-07 10:22:57', 0, 1, 0, 0),
(44, 7, '2017-07-07 10:24:04', 0, 1, 0, 0),
(45, 7, '2017-07-07 10:24:21', 0, 1, 0, 0),
(46, 7, '2017-07-07 10:27:31', 0, 1, 0, 0),
(47, 7, '2017-07-07 10:27:41', 0, 1, 0, 0),
(48, 7, '2017-07-07 10:28:21', 0, 1, 0, 0),
(49, 7, '2017-07-07 10:29:12', 0, 1, 0, 0),
(50, 7, '2017-07-07 10:33:59', 0, 1, 0, 0),
(51, 7, '2017-07-07 10:34:20', 0, 1, 0, 0),
(52, 7, '2017-07-07 10:34:39', 0, 1, 0, 0),
(53, 7, '2017-07-07 10:35:03', 0, 1, 0, 0),
(54, 7, '2017-07-07 10:35:18', 0, 1, 0, 0),
(55, 7, '2017-07-07 12:54:50', 0, 1, 0, 0),
(56, 7, '2017-07-07 12:55:36', 0, 1, 0, 0),
(57, 7, '2017-07-07 12:56:22', 0, 1, 0, 0),
(58, 7, '2017-07-07 12:56:29', 0, 1, 0, 0),
(59, 7, '2017-07-07 12:56:40', 0, 1, 0, 0),
(60, 7, '2017-07-07 12:58:23', 0, 1, 0, 0),
(61, 7, '2017-07-07 12:59:09', 0, 1, 0, 0),
(62, 7, '2017-07-07 12:59:19', 0, 1, 0, 0),
(63, 7, '2017-07-07 12:59:33', 0, 1, 0, 0),
(64, 7, '2017-07-07 13:00:48', 0, 1, 0, 0),
(65, 7, '2017-07-07 13:02:37', 0, 1, 0, 0),
(66, 7, '2017-07-07 13:07:05', 0, 1, 0, 0),
(67, 7, '2017-07-07 13:11:44', 0, 1, 0, 0),
(68, 7, '2017-07-07 13:12:09', 0, 1, 0, 0),
(69, 7, '2017-07-07 13:12:26', 0, 1, 0, 0),
(70, 7, '2017-07-07 13:13:45', 0, 1, 0, 0),
(71, 7, '2017-07-07 13:14:26', 0, 1, 0, 0),
(72, 7, '2017-07-07 13:14:44', 0, 1, 0, 0),
(73, 7, '2017-07-07 13:15:11', 0, 1, 0, 0),
(74, 7, '2017-07-07 13:16:27', 0, 1, 0, 0),
(75, 7, '2017-07-07 13:17:30', 0, 1, 0, 0),
(76, 7, '2017-07-07 13:19:06', 0, 1, 0, 0),
(77, 7, '2017-07-07 13:20:06', 0, 1, 0, 0),
(78, 7, '2017-07-07 13:20:36', 0, 1, 0, 0),
(79, 7, '2017-07-07 13:20:51', 0, 1, 0, 0),
(80, 7, '2017-07-07 13:22:01', 0, 1, 0, 0),
(81, 7, '2017-07-07 13:22:42', 0, 1, 0, 0),
(82, 7, '2017-07-07 13:23:17', 0, 1, 0, 0),
(83, 7, '2017-07-07 13:24:14', 0, 1, 0, 0),
(84, 7, '2017-07-07 13:24:42', 0, 1, 0, 0),
(85, 7, '2017-07-07 13:25:57', 0, 1, 0, 0),
(86, 7, '2017-07-07 13:39:27', 0, 1, 0, 0),
(87, 7, '2017-07-07 19:48:17', 0, 1, 0, 0),
(88, 7, '2017-07-07 19:49:41', 0, 1, 0, 0),
(89, 7, '2017-07-07 19:49:46', 0, 1, 0, 0),
(90, 7, '2017-07-07 19:51:17', 0, 1, 0, 0),
(91, 7, '2017-07-07 19:53:33', 0, 1, 0, 0),
(92, 7, '2017-07-07 19:53:58', 0, 1, 0, 0),
(93, 7, '2017-07-08 13:15:14', 2, 1, 840, 0),
(94, 7, '2017-07-08 13:15:36', 2, 1, 840, 0),
(95, 7, '2017-07-09 15:47:14', 2, 1, 840, 0),
(96, 7, '2017-07-09 15:48:51', 0, 1, 0, 0),
(97, 7, '2017-07-09 15:48:58', 0, 1, 0, 0),
(98, 7, '2017-07-09 15:50:25', 0, 1, 0, 0),
(99, 7, '2017-07-09 15:51:06', 0, 1, 0, 0),
(100, 7, '2017-07-09 15:51:12', 0, 1, 0, 0),
(101, 7, '2017-07-09 15:51:46', 0, 1, 0, 0),
(102, 7, '2017-07-09 16:00:17', 0, 1, 0, 0),
(103, 7, '2017-07-09 16:02:59', 0, 1, 0, 0),
(104, 7, '2017-07-09 16:03:45', 0, 1, 0, 0),
(105, 7, '2017-07-09 16:04:31', 0, 1, 0, 0),
(106, 7, '2017-07-09 16:04:40', 0, 1, 0, 0),
(107, 7, '2017-07-09 16:11:35', 0, 1, 0, 0),
(108, 7, '2017-07-09 16:13:02', 0, 1, 0, 0),
(109, 7, '2017-07-09 16:13:47', 0, 1, 0, 0),
(110, 7, '2017-07-09 16:15:47', 0, 1, 0, 0),
(111, 7, '2017-07-09 16:16:04', 0, 1, 0, 0),
(112, 7, '2017-07-09 16:18:58', 0, 1, 0, 0),
(113, 7, '2017-07-09 16:26:49', 0, 1, 0, 0),
(114, 7, '2017-07-09 16:28:49', 0, 1, 0, 0),
(115, 7, '2017-07-09 16:30:23', 0, 1, 0, 0),
(116, 7, '2017-07-09 16:31:59', 0, 1, 0, 0),
(117, 7, '2017-07-10 08:52:33', 0, 1, 0, 0),
(118, 7, '2017-07-10 08:53:05', 0, 1, 0, 0),
(119, 7, '2017-07-10 08:53:10', 0, 1, 0, 0),
(120, 7, '2017-07-10 08:54:46', 0, 1, 0, 0),
(121, 7, '2017-07-10 08:57:26', 0, 1, 0, 0),
(122, 7, '2017-07-10 08:58:56', 0, 1, 0, 0),
(123, 7, '2017-07-10 08:59:33', 0, 1, 0, 0),
(124, 7, '2017-07-10 08:59:51', 0, 1, 0, 0),
(125, 7, '2017-07-10 09:01:19', 0, 1, 0, 0),
(126, 7, '2017-07-10 09:02:49', 0, 1, 0, 0),
(127, 7, '2017-07-10 09:35:32', 0, 1, 0, 0),
(128, 7, '2017-07-10 09:37:05', 0, 1, 0, 0),
(129, 7, '2017-07-10 16:09:19', 0, 1, 0, 0),
(130, 7, '2017-07-10 16:13:10', 1, 1, 400, 0),
(131, 7, '2017-07-10 16:14:18', 1, 1, 400, 0),
(132, 7, '2017-07-10 16:21:24', 1, 1, 400, 0),
(133, 7, '2017-07-10 16:25:50', 1, 1, 400, 0),
(134, 7, '2017-07-10 16:34:18', 1, 1, 400, 0),
(135, 7, '2017-07-10 16:34:25', 1, 1, 400, 0),
(136, 7, '2017-07-10 16:34:53', 1, 1, 400, 0),
(137, 7, '2017-07-10 16:36:11', 1, 1, 400, 0),
(138, 7, '2017-07-10 16:36:30', 1, 1, 400, 0),
(139, 7, '2017-07-10 16:37:18', 1, 1, 400, 0),
(140, 7, '2017-07-10 16:37:45', 1, 1, 400, 0),
(141, 7, '2017-07-10 16:38:01', 1, 1, 400, 0),
(142, 7, '2017-07-10 16:38:16', 1, 1, 400, 0),
(143, 7, '2017-07-10 16:38:38', 1, 1, 400, 0),
(144, 7, '2017-07-10 16:39:44', 1, 1, 400, 0),
(145, 7, '2017-07-10 16:39:55', 1, 1, 400, 0),
(146, 7, '2017-07-10 16:40:11', 1, 1, 400, 0),
(147, 7, '2017-07-10 16:41:42', 1, 1, 400, 0),
(148, 7, '2017-07-10 16:41:50', 1, 1, 400, 0),
(149, 7, '2017-07-10 16:42:28', 1, 1, 400, 0),
(150, 7, '2017-07-10 16:42:43', 1, 1, 400, 0),
(151, 7, '2017-07-10 16:43:16', 1, 1, 400, 0),
(152, 7, '2017-07-10 16:44:50', 1, 1, 400, 0),
(153, 7, '2017-07-10 16:46:07', 1, 1, 400, 0),
(154, 7, '2017-07-10 16:46:38', 1, 1, 400, 0),
(155, 7, '2017-07-10 16:46:47', 1, 1, 400, 0),
(156, 7, '2017-07-10 16:47:06', 1, 1, 400, 0),
(157, 7, '2017-07-10 16:48:50', 1, 1, 400, 0),
(158, 7, '2017-07-10 16:49:04', 1, 1, 400, 0),
(159, 7, '2017-07-10 16:51:05', 1, 1, 400, 0),
(160, 7, '2017-07-10 16:52:06', 1, 1, 400, 0),
(161, 7, '2017-07-10 16:54:00', 1, 1, 400, 0),
(162, 7, '2017-07-10 16:54:29', 1, 1, 400, 0),
(163, 7, '2017-07-10 16:55:00', 1, 1, 400, 0),
(164, 7, '2017-07-10 16:55:22', 1, 1, 400, 0),
(165, 7, '2017-07-10 16:55:29', 1, 1, 400, 0),
(166, 7, '2017-07-10 16:56:28', 1, 1, 400, 0),
(167, 7, '2017-07-10 16:56:59', 1, 1, 400, 0),
(168, 7, '2017-07-10 16:57:08', 1, 1, 400, 0),
(169, 7, '2017-07-10 16:57:26', 1, 1, 400, 0),
(170, 7, '2017-07-10 16:57:33', 1, 1, 400, 0),
(171, 7, '2017-07-10 16:57:42', 1, 1, 400, 0),
(172, 7, '2017-07-10 16:58:20', 1, 1, 400, 0),
(173, 7, '2017-07-10 16:58:31', 1, 1, 400, 0),
(174, 7, '2017-07-10 16:59:15', 1, 1, 400, 0),
(175, 7, '2017-07-10 16:59:23', 1, 1, 400, 0),
(176, 7, '2017-07-10 16:59:37', 1, 1, 400, 0),
(177, 7, '2017-07-10 17:00:33', 1, 1, 400, 0),
(178, 7, '2017-07-10 17:06:24', 1, 1, 400, 0),
(179, 7, '2017-07-10 20:10:06', 1, 1, 400, 0),
(180, 7, '2017-07-10 20:14:51', 1, 1, 400, 0),
(181, 7, '2017-07-11 10:23:14', 2, 1, 800, 0),
(182, 7, '2017-07-11 10:24:04', 2, 1, 800, 0),
(183, 7, '2017-07-11 10:25:01', 2, 1, 800, 0),
(184, 7, '2017-07-11 10:26:55', 2, 1, 800, 0),
(185, 7, '2017-07-11 10:28:19', 2, 1, 800, 0),
(186, 7, '2017-07-11 10:29:43', 2, 1, 800, 0),
(187, 7, '2017-07-11 10:32:10', 2, 1, 800, 0),
(188, 7, '2017-07-11 10:32:24', 2, 1, 800, 0),
(189, 7, '2017-07-11 10:33:12', 2, 1, 800, 0),
(190, 7, '2017-07-11 10:33:46', 2, 1, 800, 0),
(191, 7, '2017-07-11 10:34:08', 2, 1, 800, 0),
(192, 7, '2017-07-11 10:35:18', 2, 1, 800, 0),
(193, 7, '2017-07-11 10:36:15', 2, 1, 800, 0),
(194, 7, '2017-07-11 10:36:27', 2, 1, 800, 0),
(195, 7, '2017-07-11 10:36:38', 2, 1, 800, 0),
(196, 7, '2017-07-11 10:38:05', 2, 1, 800, 0),
(197, 7, '2017-07-11 10:38:53', 2, 1, 800, 0),
(198, 7, '2017-07-11 10:39:03', 3, 1, 1200, 0),
(199, 7, '2017-07-11 10:40:37', 3, 1, 1200, 0),
(200, 7, '2017-07-11 14:35:03', 4, 1, 1600, 0),
(201, 7, '2017-07-11 16:18:35', 4, 1, 1600, 0),
(202, 7, '2017-07-11 16:19:34', 4, 1, 1600, 0),
(203, 7, '2017-07-11 16:20:15', 4, 1, 1600, 0),
(204, 7, '2017-07-11 16:21:58', 4, 1, 1600, 0),
(205, 7, '2017-07-11 16:28:26', 4, 1, 1600, 0),
(206, 7, '2017-07-11 16:30:36', 4, 1, 1600, 0),
(207, 7, '2017-07-11 16:31:38', 4, 1, 1600, 0),
(208, 7, '2017-07-11 16:34:40', 4, 1, 1600, 0),
(209, 7, '2017-07-11 16:36:58', 4, 1, 1600, 0),
(210, 7, '2017-07-11 16:37:48', 4, 1, 1600, 0),
(211, 7, '2017-07-11 16:38:08', 4, 1, 1600, 0),
(212, 7, '2017-07-11 16:38:29', 4, 1, 1600, 0),
(213, 7, '2017-07-11 16:39:41', 4, 1, 1600, 0),
(214, 7, '2017-07-11 16:39:58', 4, 1, 1600, 0),
(215, 7, '2017-07-11 16:40:43', 4, 1, 1600, 0),
(216, 7, '2017-07-11 16:41:45', 4, 1, 1600, 0),
(217, 7, '2017-07-11 16:43:38', 4, 1, 1600, 0),
(218, 7, '2017-07-11 16:47:13', 4, 1, 1600, 0),
(219, 7, '2017-07-11 16:47:36', 4, 1, 1600, 0),
(220, 7, '2017-07-11 16:47:50', 4, 1, 1600, 0),
(221, 7, '2017-07-11 16:48:08', 4, 1, 1600, 0),
(222, 7, '2017-07-11 16:49:10', 4, 1, 1600, 0),
(223, 7, '2017-07-11 16:49:52', 4, 1, 1600, 0),
(224, 7, '2017-07-11 16:50:13', 4, 1, 1600, 0),
(225, 7, '2017-07-11 16:51:02', 4, 1, 1600, 0),
(226, 7, '2017-07-11 16:51:26', 4, 1, 1600, 0),
(227, 7, '2017-07-11 16:51:35', 4, 1, 1600, 0),
(228, 7, '2017-07-11 16:52:05', 4, 1, 1600, 0),
(229, 7, '2017-07-11 16:53:07', 4, 1, 1600, 0),
(230, 7, '2017-07-11 16:53:20', 4, 1, 1600, 0),
(231, 7, '2017-07-11 16:53:58', 4, 1, 1600, 0),
(232, 7, '2017-07-11 16:55:48', 4, 1, 1600, 0),
(233, 7, '2017-07-11 16:56:12', 4, 1, 1600, 0),
(234, 7, '2017-07-11 16:57:17', 4, 1, 1600, 0),
(235, 7, '2017-07-11 16:57:54', 4, 1, 1600, 0),
(236, 7, '2017-07-11 17:00:49', 4, 1, 1600, 0),
(237, 7, '2017-07-11 17:02:10', 4, 1, 1600, 0),
(238, 7, '2017-07-11 17:02:21', 4, 1, 1600, 0),
(239, 7, '2017-07-11 17:04:32', 4, 1, 1600, 0),
(240, 7, '2017-07-11 17:05:06', 4, 1, 1600, 0),
(241, 7, '2017-07-11 17:06:14', 4, 1, 1600, 0),
(242, 7, '2017-07-11 17:07:08', 4, 1, 1600, 0),
(243, 7, '2017-07-11 17:13:52', 4, 1, 1600, 0),
(244, 7, '2017-07-13 13:06:26', 4, 1, 1600, 0),
(245, 7, '2017-07-13 13:08:04', 4, 1, 1600, 0),
(246, 7, '2017-07-13 13:08:18', 4, 1, 1600, 0),
(247, 7, '2017-07-13 13:08:31', 4, 1, 1600, 0),
(248, 7, '2017-07-13 13:10:09', 4, 1, 1600, 0),
(249, 7, '2017-07-13 13:11:28', 4, 1, 1600, 0),
(250, 7, '2017-07-13 13:11:42', 4, 1, 1600, 0),
(251, 7, '2017-07-13 13:11:59', 4, 1, 1600, 0),
(252, 7, '2017-07-13 13:12:56', 4, 1, 1600, 0),
(253, 7, '2017-07-13 13:13:09', 4, 1, 1600, 0),
(254, 7, '2017-07-13 13:13:20', 4, 1, 1600, 0),
(255, 7, '2017-07-13 13:21:24', 4, 1, 1600, 0),
(256, 7, '2017-07-13 13:22:41', 4, 1, 1600, 0),
(257, 7, '2017-07-13 13:23:55', 4, 1, 1600, 0),
(258, 7, '2017-07-13 13:25:15', 4, 1, 1600, 0),
(259, 7, '2017-07-13 13:25:30', 4, 1, 1600, 0),
(260, 7, '2017-07-13 13:25:48', 4, 1, 1600, 0),
(261, 7, '2017-07-13 13:32:24', 4, 1, 1600, 0),
(262, 7, '2017-07-13 13:35:02', 4, 1, 1600, 0),
(263, 7, '2017-07-13 13:37:47', 4, 1, 1600, 0),
(264, 7, '2017-07-13 13:38:00', 4, 1, 1600, 0),
(265, 7, '2017-07-13 13:38:15', 5, 1, 2000, 0),
(266, 7, '2017-07-13 13:42:14', 5, 1, 2000, 0),
(267, 7, '2017-07-13 14:35:39', 5, 1, 2000, 0),
(268, 7, '2017-07-13 14:42:02', 3, 1, 1200, 0),
(269, 7, '2017-07-13 14:43:23', 3, 1, 1200, 0),
(270, 7, '2017-07-13 14:48:00', 2, 1, 800, 0),
(271, 7, '2017-07-13 14:49:36', 2, 1, 900, 0),
(272, 7, '2017-07-13 15:00:46', 1, 1, 400, 0),
(273, 7, '2017-07-13 03:10:25', 2, 1, 900, 0),
(274, 7, '2017-07-13 15:16:27', 1, 1, 250, 0),
(275, 7, '2017-07-13 15:20:58', 1, 1, 400, 0),
(276, 7, '2017-07-13 15:22:01', 1, 1, 400, 0),
(277, 7, '2017-07-13 15:23:11', 1, 1, 400, 0),
(278, 7, '2017-07-13 15:30:27', 1, 1, 1000, 0),
(279, 7, '2017-07-13 15:31:03', 1, 1, 400, 0),
(280, 7, '2017-07-13 15:34:51', 1, 1, 400, 0),
(281, 7, '2017-07-13 15:35:45', 1, 1, 400, 0),
(282, 7, '2017-07-13 15:40:56', 1, 1, 400, 0),
(283, 7, '2017-07-13 15:42:01', 1, 1, 400, 0),
(284, 7, '2017-07-13 15:42:51', 1, 1, 400, 0),
(285, 7, '2017-07-13 15:43:10', 2, 1, 800, 0),
(286, 7, '2017-07-13 15:44:02', 1, 1, 400, 0),
(287, 7, '2017-07-13 15:46:02', 1, 1, 400, 0),
(288, 7, '2017-07-13 15:50:29', 2, 1, 1000, 0),
(289, 7, '2017-07-13 15:53:00', 1, 1, 400, 0),
(290, 7, '2017-07-13 15:53:36', 1, 1, 400, 0),
(291, 7, '2017-07-13 15:54:24', 1, 1, 400, 0),
(292, 7, '2017-07-15 17:03:13', 3, 1, 1200, 0),
(293, 7, '2017-07-16 09:04:00', 1, 1, 500, 0),
(294, 7, '2017-07-16 10:05:48', 2, 1, 800, 0),
(295, 12, '2017-07-16 15:53:35', 1, 1, 400, 0),
(296, 12, '2017-07-17 20:09:47', 1, 1, 400, 1),
(297, 13, '2017-07-18 08:57:49', 1, 1, 400, 1),
(298, 13, '2017-07-18 09:16:28', 3, 1, 750, 1);

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
(1, 'Usbong Specialty Bookstore', 'Uplifting Human Lives', '#6f5630'),
(2, 'RetroCC', 'Keep Reading.<br>Keep Collecting.', '#FFFFFF');

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
(1, 'Paypal');

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
  `language` varchar(20) DEFAULT 'English',
  `author` varchar(50) DEFAULT NULL,
  `supplier` varchar(30) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `image_location` varchar(30) DEFAULT NULL,
  `format` varchar(10) DEFAULT NULL,
  `quantity_in_stock` int(11) NOT NULL,
  `translator` varchar(50) DEFAULT NULL,
  `product_overview` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `merchant_id`, `product_type_id`, `name`, `price`, `language`, `author`, `supplier`, `description`, `image_location`, `format`, `quantity_in_stock`, `translator`, `product_overview`) VALUES
(1, 1, 2, 'The Remains of the Day', 400, 'English', 'Kazuo Ishiguro', NULL, 'Used - Acceptable', NULL, 'Hardcover', 1, '', 'The novelist, Kazuo Ishiguro, has said, \"A novel may not give us facts that are true, [but] what it tells us about experience, the emotion that it conveys, is something that we recognize as true. And sometimes, very important emotions, feelings are conveyed in a novel that cannot be conveyed in more factual stories, or in factual books. I think most importantly, perhaps, a key to it, I think, a novel can tell us how it feels to be in a certain situation. A work of history or journalism can tell us that some people starved in a particular time and place. But, perhaps, it cannot convey the pain of starving, or losing someone close to you or your child to starvation... We need someone to tell us how it felt... Is it true that it feels like that to be in that situation, or is this not true? I think we still have to ask that question. But I think that\'s why we turn to stories, because we feel there\'s something missing in just the factual account.\"'),
(2, 1, 2, 'The Daydreamer', 400, 'English', 'Ian McEwan', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, '', 'While we know \"Google\" as the search engine giant, Peter, the protagonist in this book, discovered \"Googol\", which is pronounced somewhat similarly, while thinking about the largest number in the world. A \"Googol\" is ten multiplied by ten a hundred times. Moreover, \"Googolplex\" is ten multiplied by ten a googol number of times! But what I really remember about this book is the story about how Peter became friends with the school bully by realizing that he and his classmates only dreamed him up to be strong and powerful, because in reality, he is a nice, ordinary little boy just like any of them.'),
(3, 1, 2, 'Myths to Live By', 400, 'English', 'Joseph Campbell', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, '', 'Here is a quotation from the book, which you are free to agree or disagree.\r\n\r\n\"All societies are evil, sorrowful, inequitable; and so they will always be. So if you really want to help this world, what you will have to teach is how to live in it. And that no one can do who has not himself learned how to live in it in the joyful sorrow and sorrowful joy of the knowledge of life as it is.\"'),
(4, 1, 2, 'The Seasons of a Man\'s Life', 500, 'English', 'Daniel Levinson et al.', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, '', 'This book provides a more or less general picture of the so-called \"seasons\" of a man\'s life. It shows examples of various men who set out to realize their dream or ideal life, only to discover later in life that they must confront and eventually accept the reality that they may not be able to actually fulfill that initial dream. One example that I can remember is the academic who wanted to receive recognition for his work by receiving the Nobel prize, but to his great disappointment was beaten to it by a rival group. He later found solace in providing mentorship to the younger generation of scientists in his field.'),
(5, 1, 2, 'The Last Lecture', 400, 'English', 'Randy Pausch et al.', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, '', 'While the \"Last Lecture\" doesn\'t necessarily mean that it\'s a professor\'s last lecture, and is simply a way for senior professors at Carnegie Mellon University to share wisdom to younger students and faculty. For Randy Pausche\'s case it really was somewhat of a last lecture, because he was already grappling with pancreatic cancer and his chance of survival was low. This book offers his insights about living.'),
(6, 1, 2, 'The Innovators', 600, 'English', 'Walter Isaacson', NULL, 'Used - Very Good', NULL, 'English', 1, '', NULL),
(7, 1, 2, 'Steve Jobs', 500, 'English', 'Walter Isaacson', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, '', 'This book offers glimpses of Steve Jobs\' life as a human person, warts and all. I particularly liked discovering that despite the wealth that he was able to accumulate in his life, he decided that he didn\'t want to change his simple, yet efficient lifestyle, only for the sake of being able to live the rich life that is glamorized by media.'),
(8, 1, 9, 'Tokyo University\'s English', 1000, 'Japanese/English', 'Masafumi Satou', NULL, NULL, NULL, 'Paperback', 0, '', 'While this book is intended for Japanese students who\'ll be taking the Tokyo University entrance exam, it can be used by Japanese language learners as well. The sample readings are in English, while the translation and explanations are in Japanese. The articles are also quite interesting. I particularly remember the one about how our hopes and fears are \"often illusions promising to change our way of life, but leaving us exactly as we were before.\"'),
(9, 1, 2, 'Siddhartha', 250, 'English', 'Herman Hesse', NULL, 'Used - Very Good', NULL, 'Paperback', 1, '', 'This story relates the transitions a person undertook to achieve the state of everlasting peace. He first lived the life of a scholar, and then became an ascetic, and then a merchant, and then a boatman. One key idea that I got from the book is that there are things that cannot be taught in words, but must truly be experienced for another person to understand.'),
(10, 1, 2, 'The Montessori Method', 400, 'English', 'Maria Montessori', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, '', 'The first dawn of real discipline comes through action. When a child has learned to respond naturally through action that is aimed towards an objective, that is, action that is no longer erratic, he is no more the child that he was at first, but an individual. When, further, he has freed himself from being dependent on others due to his own inferiority, he has overcome himself and the limits of his age, and has made a great step forward by conquering his future while in the present.'),
(11, 1, 2, 'The Soul of a New Machine', 400, 'English', 'Tracy Kidder', NULL, 'Used - Acceptable', NULL, 'Hardcover', 1, '', 'What is the soul of a new machine? It is the collective soul etched in silicon and microcode of a team of dedicated engineers who brought the machine to life. In the end, \"It\'s just a computer. It\'s really a small thing in the world, you know.\"'),
(12, 1, 2, 'Outliers: The Story of Success', 400, 'English', 'Malcolm Gladwell', NULL, 'Used - Acceptable', NULL, 'Hardcover', 1, '', 'There are two things that make rice farming meaningful. First, there is a clear relationship between effort and reward, in that the harder you work a rice field, the more it yields. Second, its complexity is akin to running a small business that is composed of a family workforce, who must hedge uncertainty through seed selection, building and managing a sophisticated irrigation system, and at the same time coordinating the complicated process of crop harvesting and crop preparation.'),
(13, 1, 2, 'Guns, Germs, and Steel', 500, 'English', 'Jared Diamond', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, '', 'Where do innovations actually come from? As it turns out, much technology is not invented solely locally and is not done by a lone individual. Instead, it is borrowed from other societies and from other inventors who’ve gone before. The spread of useful invention depends on whether a society that learns about it is receptive to it and adopts it. Societies lacking the invention often find themselves at a disadvantage in relation to the receptive society, even becoming overwhelmed and replaced if the disadvantage is sufficiently great.'),
(14, 1, 2, 'The Tao of Pooh', 300, 'English', 'Benjamin Hoff', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, '', 'To Laozi, the universe was not a setter of traps, but a teacher of valuable lessons. While it would be arrogant to attempt to adequately put how the universe operates into words, its nature could be understood. And the natural result of being able to appreciate, learn from, and work with whatever happens in everyday life is happiness.'),
(15, 1, 2, 'The Different Drum', 400, 'English', 'M. Scott Peck, M.D.', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, '', 'The reality of human nature is that we are all profoundly different. This is due to our capacity to be molded by culture and experience in extremely variable ways. At the same time, it is this same capacity that opens the way for all of us to transformation, which paradoxically, is both the basic cause of war and the basic cure for war.'),
(16, 1, 2, 'The Lives of a Cell', 250, 'English', 'Lewis Thomas', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, '', 'The sky is a miraculous achievement. It is, after all, far and away the grandest product of collaboration in all of nature. Earth would not be alive as we know it without such cooperation. Moreover, the shelter it provides prevents millions of meteorites from pounding us like the powdered surface of the moon. While we may not be sensitive enough to hear it, we find solace in knowing that the sound is there above, “like the random noise of rain on the roof at night.”'),
(17, 1, 2, 'The Plague', 400, 'English', 'Albert Camus', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, '', 'A terrible plague has hit a town. To contain it, the town is locked in; nobody leaves, and nobody goes in. People are in a state of panic. Some though decide to do what they can to combat the plague. Eventually, the plague is stopped and disappear. But how? Find out! It is not what you think.'),
(18, 1, 2, 'Living Language: French', 500, 'English', 'Anne Heminway', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, '', 'While the book may be dated, e.g. the currency is not in euros, I found the sequence of chapters relevant to one who is learning French. The chapters start with a dialogue, then an explanation of certain grammar points, then some exercises, and finally a cultural note, which all provide a much better glimpse of French culture. Using tools like Google Translate to help you with the pronunciation, you should be able to gradually learn to speak, read, and understand French as you go through this book.'),
(19, 1, 2, 'Starting Point, 1979-1996', 850, 'English', 'Hayao Miyazaki', NULL, 'New', NULL, 'Paperback', 1, 'Beth Cary/Frederik L. Schodt', 'I first got a copy of this book (Japanese version) while studying in Japan as an exchange student. I wanted to eventually be able to read it in the original. About 10 years later, I was indeed able to read the chapter on \"Animation and Manga Movies\". It was a pleasant surprise that my Japanese language ability had improved to the extent that I could already read such texts. I then translated the chapter for my class on Japanese Films. Having said this, it is still fun even now to just randomly flip a page and read insights from MiyazakiSAN.'),
(20, 1, 2, 'Turning Point, 1997-2008', 1400, 'English', 'Hayao Miyazaki', NULL, 'New', NULL, 'Hardcover', 1, 'Beth Cary/Frederik L. Schodt', 'I first got a copy of the first book, \"Starting Point, 1979-1996 (Japanese version)\", while studying in Japan as an exchange student. I wanted to eventually be able to read it in the original. About 10 years later, I was indeed able to read the chapter on \"Animation and Manga Movies\". It was a pleasant surprise that my Japanese language ability had improved to the extent that I could already read such texts. I then translated the chapter for my class on Japanese Films. Not long after, I got a copy of this book in the original Japanese. It is indeed fun to just randomly flip a page and read insights from MiyazakiSAN.'),
(21, 1, 2, 'Made in Japan', 400, 'English', 'Akio Morita et al.', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, 'Edwin M. Reingold/Mitsuko Shimomura', 'Here\'s my English translation of an excerpt taken from an interview with Akio Morita on NHK\'s 「あの人に会いたい」(I want to meet that person).<br>\r\n「私は日本製品を売ろうとしていたが、\r\nドイツ人の目にはこの傘が日本製品を象徴していると」\"I was trying to sell Japanese products, but in the eyes of Germans, Japanese products were small umbrellas that are put on top of ice creams!\"<br>\r\n「この傘がメイドインジャパンだったわけです」\r\n\"This umbrella represented products made in Japan.\"<br>\r\n「それ以来、私はメイドインジャパンのイメージを変えなければと一生懸命やってきた」\r\n\"After that, I did my very best to change the \'Made in Japan\' image.\"'),
(22, 1, 2, 'Wikinomics', 400, 'English', 'Don Tapscott/Anthony Williams', NULL, 'Used - Acceptable', NULL, 'Hardcover', 1, NULL, 'This book provides an optimistic view on how technology, particularly the internet, is enabling people to massively collaborate. While we know that technology is a double-edged sword, that is, it can be used for good or ill depending on its wielder, one is left with a positive and optimistic feeling that things are getting better instead of worse after reading this book. '),
(23, 1, 2, 'The Dancing Wu Li Masters', 400, 'English', 'Gary Zukav', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, NULL, 'This books is a must-read for anyone who wants to understand Physics, that is, not the Physics that students commonly learn in school, where there are equations that one must solve in a sort of computer-like way, without really understanding deeply what kind of thinking and perspective brought about those equations in the first place. One question that this book asks is, what is a living thing? If we break down a human person into very, very tiny, little pieces, we\'ll find that a rock is made up of those very tiny, little pieces as well. And yet, we do not call a rock a living thing. Why is that? Eventually, if you continue asking such questions, you\'ll arrive with the answer that we don\'t know. And the book concludes with an invitation to an opening towards eastern culture. '),
(24, 1, 2, 'Le Petit Prince', 400, 'French', 'Antoine de Saint-Exupéry', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, NULL, 'This book\'s often quoted phrase, «On ne voit bien qu’avec le cœur. L’essentiel est invisible pour les yeux.  (We can only see well with our hearts. What is essential is invisible to the eye.)» reminds us that a person can be vain, difficult, and demanding, but it is the quality time that we spent for that person that makes him or her special and unique from all the other persons in the world.'),
(25, 1, 2, 'Founders at Work', 500, 'English', 'Jessica Livingston', NULL, 'Used - Acceptable', NULL, 'Hardcover', 1, NULL, 'Reading this books gives a person an idea of what founders of startups had to undergo to be able to achieve what they\'ve achieved. It contains interviews upon interviews of founders of companies that even now we still recognize and whose services we still use. I hope that this book gives you a better appreciation and respect for company founders, and inspires you to become one someday.'),
(26, 1, 2, 'Standard First Aid & Personal Safety', 500, 'English', 'American Red Cross', NULL, 'Used - Acceptable', NULL, 'Paperback', 0, NULL, 'While there are copies of First Aid guides, which a person can download free-of-charge online, this printed copy shows ways of how an ordinary person, without having to prescribe any medicine, can provide first aid when needed. Examples include applying various bandages, positioning a person in certain ways, and so on. What is most important, however, is achieving a calm and tranquil state of mind to act and do what must be done even during times of accidents or disaster. Hopefully, this books helps you attain such state of presence.'),
(27, 1, 9, 'HSK Level 5 Sample Exam', 1500, 'Mandarin/Japanese', 'Confucius Institute (Hanban)', NULL, 'Used - Acceptable', NULL, 'Paperback', 0, '株式会社スプリックス', 'This book is a good learning tool not only for those who\'ll be taking the HSK Level 5 exam, but also those who simply enjoy reading interesting texts or articles from a variety of fields. The texts are in Mandarin (Simplified), while the translation and explanations are in Japanese. One story that I remember from this book is the one about the business man, his son, and their donkey. The lesson it shared was that it is difficult to please everybody. And if you mistakenly think that you can satisfy everyone, you\'ll realize that you won\'t be happy and the people you wanted to satisfy won\'t be satisfied either. '),
(28, 1, 3, 'M&S Earl Grey Tea', 420, 'English', NULL, NULL, NULL, NULL, NULL, 1, NULL, 'Douglas Adams has this to say about tea. It is from the chapter on \"Tea\" from the book, \"The Salmon of Doubt\". \"Drink it. After a few moments you will begin to think that the place you\'ve come to \r\nisn\'t maybe quite so strange and crazy after all.\"'),
(29, 1, 3, 'UCC Coffee (Rich Blend)', 580, 'Japanese', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
(30, 1, 3, 'sencha (Green Tea)', 420, 'Japanese', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
(31, 1, 5, 'PROMO-Le Petit Prince, Living Language French, The Plague', 1250, 'French/English', 'Saint-Exupéry, Heminway, Camus', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, NULL, NULL),
(32, 1, 5, 'PROMO-Wikinomics, Guns, Germs, and Steel, The Soul of a New Machine, The Different Drum', 1650, 'English', 'Tapscott/Williams, Diamond, Kidder, Peck', NULL, 'Used - Acceptable', NULL, 'Mixed', 1, NULL, NULL),
(33, 1, 5, 'PROMO-Made in Japan, The Soul of a New Machine, Founders at Work, Outliers', 1650, 'English', 'Morita et al., Kidder, Gladwell, Livingston', NULL, 'Used - Acceptable', NULL, 'Mixed', 1, NULL, NULL),
(34, 1, 5, 'PROMO-Starting Point, Turning Point', 2200, 'English', 'Hayao Miyazaki', NULL, 'New', NULL, 'Mixed', 1, 'Beth Cary and Frederik L. Schodt', NULL),
(35, 1, 5, 'PROMO-Steve Jobs, The Innovators', 1050, 'English', 'Walter Isaacson', NULL, 'Used - Very Good', NULL, 'Paperback', 1, NULL, NULL),
(36, 2, 6, 'ACTION COMICS 1-52 (complete set)', 8000, 'English', NULL, NULL, 'new, 1-52 + extras, VF-NM', NULL, NULL, 1, NULL, NULL),
(37, 2, 6, 'Silver Surfer vol 1 (complete set)', 32000, 'English', NULL, NULL, '1-18, VG-F', NULL, NULL, 1, NULL, NULL),
(38, 2, 6, 'Batman Superman set', 3000, 'English', NULL, NULL, '1-31, annual 1-2, future\'s end 1, missing issue 32, VF-NM', NULL, NULL, 1, NULL, NULL),
(39, 2, 6, 'ULTIMATE FALL OUT set', 1800, 'English', NULL, NULL, 'ultimate fallout 1-6, issue 4 1st appearance miles morales, death of spider-man 2nd print, VF-NM', NULL, NULL, 1, NULL, NULL),
(40, 2, 6, 'KLAUS boom studios', 1200, 'English', NULL, NULL, 'complete set 1-7, VF-NM', NULL, NULL, 1, NULL, NULL),
(41, 2, 6, 'Empire of the Dead', 1500, 'English', NULL, NULL, 'complete 1st arc, 1-5, VF', NULL, NULL, 1, NULL, NULL),
(42, 2, 6, 'Fairest (complete set)', 4000, 'English', NULL, NULL, 'VF', NULL, NULL, 1, NULL, NULL),
(43, 2, 6, 'Batman and Robin New 52 set', 6000, 'English', NULL, NULL, 'Complete set of batman and robin new 52,\r\nVF-NM', NULL, NULL, 1, NULL, NULL),
(44, 1, 7, 'One Piece Manga set (1-20)', 3700, 'Japanese', NULL, NULL, 'Used - Acceptable', NULL, NULL, 1, NULL, NULL),
(45, 1, 7, 'Conan Manga set (1-9)', 1665, 'Japanese', NULL, NULL, 'Used - Acceptable', NULL, NULL, 1, NULL, NULL),
(46, 1, 7, 'Rurouni Kenshin Manga set (1-10)', 1850, 'Japanese', NULL, NULL, 'Used - Acceptable', NULL, NULL, 1, NULL, NULL),
(47, 2, 8, 'DAREDEVIL', 800, 'English', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
(48, 2, 8, 'Spider-man Marvel Toybiz 90s', 700, 'English', NULL, NULL, 'MOC', NULL, NULL, 1, NULL, NULL),
(49, 2, 8, 'Marvel Legends Wave 1 X-MEN BAF Juggernaut', 10000, 'English', NULL, NULL, 'VF-NM', NULL, NULL, 1, NULL, NULL),
(50, 1, 9, 'shimbun de manabu nihongo (with CDs)', 2700, 'Japanese', 'Mizutani Osamu et al.', NULL, 'New', NULL, 'Paperback', 2, NULL, NULL),
(51, 1, 9, 'kanzen masta- 2kyuu', 1300, 'Japanese', '3A Corporation', NULL, 'New', NULL, 'Paperback', 2, NULL, NULL),
(52, 1, 9, 'kanzen masta- 1kyuu', 1300, 'Japanese', '3A Corporation', NULL, 'New', NULL, 'Paperback', 2, NULL, NULL),
(53, 1, 9, 'kanji look and learn', 2000, 'Japanese', 'Eri Banno et al. (The Japan Times)', NULL, 'New', NULL, 'Paperback', 1, NULL, NULL),
(54, 1, 9, 'genki II 2nd ed (with CD)', 3800, 'Japanese', 'Eri Banno et al. (The Japan Times)', NULL, 'New', NULL, 'Paperback', 2, NULL, NULL),
(55, 1, 9, 'genki I 2nd ed (with CD)', 3800, 'Japanese', 'Eri Banno et al. (The Japan Times)', NULL, 'New', NULL, 'Paperback', 2, NULL, NULL),
(56, 1, 9, 'erin (with DVD) vol 3', 2600, 'Japanese', 'The Japan Foundation', NULL, 'New', NULL, 'Paperback', 2, NULL, NULL),
(57, 1, 9, 'erin (with DVD) vol 2', 2600, 'Japanese', 'The Japan Foundation', NULL, 'New', NULL, 'Paperback', 2, NULL, NULL),
(58, 1, 9, 'erin (with DVD) vol 1', 2600, 'Japanese', 'The Japan Foundation', NULL, 'New', NULL, 'Paperback', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_type`
--

CREATE TABLE `product_type` (
  `product_type_id` int(11) NOT NULL,
  `product_type_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_type`
--

INSERT INTO `product_type` (`product_type_id`, `product_type_name`) VALUES
(1, 'All'),
(2, 'Books'),
(3, 'Beverages'),
(4, 'Books/Beverages'),
(5, 'Combos'),
(6, 'Comics'),
(7, 'Manga'),
(8, 'Toys & Collectibles'),
(9, 'Textbooks');

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
  ADD KEY `mode_of_payment_id` (`mode_of_payment_id`);

--
-- Indexes for table `customer_order`
--
ALTER TABLE `customer_order`
  ADD PRIMARY KEY (`customer_order_id`),
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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=244;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `customer_order`
--
ALTER TABLE `customer_order`
  MODIFY `customer_order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=299;
--
-- AUTO_INCREMENT for table `fields`
--
ALTER TABLE `fields`
  MODIFY `fields_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `merchant`
--
ALTER TABLE `merchant`
  MODIFY `merchant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `mode_of_payment`
--
ALTER TABLE `mode_of_payment`
  MODIFY `mode_of_payment_id` tinyint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `product_type`
--
ALTER TABLE `product_type`
  MODIFY `product_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
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
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`mode_of_payment_id`) REFERENCES `mode_of_payment` (`mode_of_payment_id`);

--
-- Constraints for table `customer_order`
--
ALTER TABLE `customer_order`
  ADD CONSTRAINT `customer_order_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`);

--
-- Constraints for table `fields`
--
ALTER TABLE `fields`
  ADD CONSTRAINT `fields_ibfk_1` FOREIGN KEY (`product_type_id`) REFERENCES `product_type` (`product_type_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`merchant_id`) REFERENCES `merchant` (`merchant_id`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`product_type_id`) REFERENCES `product_type` (`product_type_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
