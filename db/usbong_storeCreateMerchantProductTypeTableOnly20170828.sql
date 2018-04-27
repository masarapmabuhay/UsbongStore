-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 28, 2017 at 03:10 AM
-- Server version: 5.7.19-0ubuntu0.16.04.1
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
(16, 4, 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `merchant_product_type`
--
ALTER TABLE `merchant_product_type`
  ADD PRIMARY KEY (`merchant_product_type_id`),
  ADD KEY `merchant_id` (`merchant_id`),
  ADD KEY `product_type_id` (`product_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `merchant_product_type`
--
ALTER TABLE `merchant_product_type`
  MODIFY `merchant_product_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `merchant_product_type`
--
ALTER TABLE `merchant_product_type`
  ADD CONSTRAINT `merchant_product_type_ibfk_1` FOREIGN KEY (`merchant_id`) REFERENCES `merchant` (`merchant_id`),
  ADD CONSTRAINT `merchant_product_type_ibfk_2` FOREIGN KEY (`product_type_id`) REFERENCES `product_type` (`product_type_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
