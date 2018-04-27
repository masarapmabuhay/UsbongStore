-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2017 at 07:34 AM
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
(176, 1, 7, 16, 0, 400, '2017-07-04 17:55:58', '2017-07-07 08:23:40', '2017-07-08 01:15:10'),
(177, 2, 7, NULL, 0, 400, '2017-07-04 17:56:04', '0000-00-00 00:00:00', '2017-07-08 01:15:13'),
(178, 4, 7, NULL, 0, 500, '2017-07-04 17:56:28', '0000-00-00 00:00:00', '2017-07-04 05:56:38'),
(179, 2, 7, 25, 0, 400, '2017-07-07 08:29:40', '2017-07-07 10:07:48', '2017-07-08 01:15:13'),
(180, 28, 7, NULL, 0, 420, '2017-07-07 20:16:03', '0000-00-00 00:00:00', '2017-07-08 01:15:09'),
(181, 28, 7, NULL, 0, 420, '2017-07-07 20:16:31', '0000-00-00 00:00:00', '2017-07-08 01:15:09'),
(182, 28, 7, NULL, 0, 420, '2017-07-07 20:16:56', '0000-00-00 00:00:00', '2017-07-08 01:15:09'),
(183, 28, 7, NULL, 0, 420, '2017-07-07 20:17:20', '0000-00-00 00:00:00', '2017-07-08 01:15:09'),
(184, 28, 7, NULL, 0, 420, '2017-07-07 20:18:44', '0000-00-00 00:00:00', '2017-07-08 01:15:09'),
(185, 28, 7, NULL, 0, 420, '2017-07-07 20:19:06', '0000-00-00 00:00:00', '2017-07-08 01:15:09'),
(186, 28, 7, NULL, 0, 420, '2017-07-07 20:20:01', '0000-00-00 00:00:00', '2017-07-08 01:15:09'),
(187, 28, 7, NULL, 0, 420, '2017-07-07 20:20:25', '0000-00-00 00:00:00', '2017-07-08 01:15:09'),
(188, 1, 7, NULL, 0, 400, '2017-07-07 20:23:48', '0000-00-00 00:00:00', '2017-07-08 01:15:10'),
(189, 21, 7, NULL, 0, 400, '2017-07-07 20:23:58', '0000-00-00 00:00:00', '2017-07-08 09:26:34'),
(190, 28, 7, NULL, 0, 420, '2017-07-08 09:26:46', '0000-00-00 00:00:00', '2017-07-08 01:15:09'),
(191, 30, 7, NULL, 0, 420, '2017-07-08 10:02:33', '0000-00-00 00:00:00', '2017-07-08 10:34:40'),
(192, 30, 7, NULL, 0, 420, '2017-07-08 10:22:13', '0000-00-00 00:00:00', '2017-07-08 10:34:40'),
(193, 30, 7, 93, 2, 420, '2017-07-08 10:34:47', '2017-07-08 01:15:14', '0000-00-00 00:00:00'),
(194, 28, 7, NULL, 0, 420, '2017-07-08 10:34:55', '0000-00-00 00:00:00', '2017-07-08 01:15:09'),
(195, 28, 7, NULL, 0, 420, '2017-07-08 10:35:04', '0000-00-00 00:00:00', '2017-07-08 01:15:09'),
(196, 1, 7, NULL, 0, 400, '2017-07-08 10:43:00', '0000-00-00 00:00:00', '2017-07-08 01:15:10'),
(197, 2, 7, NULL, 0, 400, '2017-07-08 10:43:08', '0000-00-00 00:00:00', '2017-07-08 01:15:13'),
(198, 33, 7, NULL, 0, 400, '2017-07-08 10:43:17', '0000-00-00 00:00:00', '2017-07-08 01:15:07');

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
  `mode_of_payment_id` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_first_name`, `customer_last_name`, `customer_email_address`, `customer_password`, `customer_contact_number`, `customer_shipping_address`, `customer_city`, `customer_country`, `customer_postal_code`, `mode_of_payment_id`) VALUES
(1, 'Michael', 'Syson', 'masarapmabuhay@gmail.com', 'mbs', 0, '', '0', '', 0, 0),
(3, 'm', 'm', 'm@usbong.ph', 'm', 0, '', '0', '', 0, 0),
(4, 'Mike', 'Syson', 'a@c.ph', 'aa', 0, '', '0', '', 0, 0),
(5, 's', 's', '$2y$10$WL6z4DXSb0EJmiZt1FxKhOK', 's', 0, '', '0', '', 0, 0),
(6, 'b', 'b', 'b@usbong.ph', '$2y$10$WtGuuf9v8gplDmKGBKKb5OBzifJNW.tbl4GCoOye1UBu/6tfVFWYq', 0, '', '0', '', 0, 0),
(7, 'abc', 'abc', 'abc@usbong.ph', '$2y$10$IoTjRH3daPfVTcDnQVOS8uyuDFQMMyL2JeF79x4/zM6e8g9FPDIzC', 0, '', '0', '', 0, 0),
(8, 'b', 'b', 'b@usbong.ph', '$2y$10$Lz2GQBQrmxsZK5df1OmZnO34YJy98TnTuJBkf5zktP475xCMSyX.2', 0, '', '0', '', 0, 0),
(10, 'd', 'd', 'd@usbong.ph', '$2y$10$J3/pUt5KIN9BSceypK8m5Ow09/AU9Awk5IFbc/bcB39LZ965uD2sa', 0, '', '0', '', 0, 0),
(11, 'e', 'e', 'e@usbong.ph', '$2y$10$EqVlR7nDUh3TomX.5iLE0OPc0/ZXWRfJIm8fn1W6AyntLJnsGzmdO', 0, '', '0', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer_order`
--

CREATE TABLE `customer_order` (
  `customer_order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `added_datetime_stamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `quantity` int(11) NOT NULL,
  `status_accepted` tinyint(1) NOT NULL DEFAULT '0',
  `order_total_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_order`
--

INSERT INTO `customer_order` (`customer_order_id`, `customer_id`, `added_datetime_stamp`, `quantity`, `status_accepted`, `order_total_price`) VALUES
(0, 7, '2017-07-03 12:52:44', 10, 0, 10000),
(2, 7, '2017-07-03 16:50:11', 5, 1, 2000),
(3, 7, '2017-07-03 16:55:11', 5, 1, 2000),
(4, 7, '2017-07-03 17:07:39', 5, 1, 2000),
(5, 7, '2017-07-03 17:10:02', 2, 1, 650),
(6, 7, '2017-07-03 17:12:40', 5, 1, 2000),
(7, 7, '2017-07-03 17:24:43', 5, 1, 2000),
(8, 7, '2017-07-03 17:26:12', 3, 1, 1000),
(9, 7, '2017-07-03 17:40:50', 6, 1, 1750),
(10, 7, '2017-07-04 10:10:53', 6, 1, 1750),
(11, 7, '2017-07-04 10:13:45', 7, 1, 2150),
(12, 7, '2017-07-04 10:14:08', 7, 1, 2150),
(13, 7, '2017-07-04 10:14:39', 7, 1, 2150),
(14, 7, '2017-07-04 10:15:58', 5, 1, 1500),
(15, 7, '2017-07-04 15:40:41', 4, 1, 2800),
(16, 7, '2017-07-07 08:23:40', 2, 1, 800),
(17, 7, '2017-07-07 08:26:23', 2, 1, 800),
(18, 7, '2017-07-07 08:27:15', 2, 1, 800),
(19, 7, '2017-07-07 08:27:42', 2, 1, 800),
(20, 7, '2017-07-07 08:27:59', 0, 1, 0),
(21, 7, '2017-07-07 08:28:09', 0, 1, 0),
(22, 7, '2017-07-07 08:28:19', 0, 1, 0),
(23, 7, '2017-07-07 08:28:27', 0, 1, 0),
(24, 7, '2017-07-07 08:28:55', 0, 1, 0),
(25, 7, '2017-07-07 10:07:48', 1, 1, 400),
(26, 7, '2017-07-07 10:15:44', 1, 1, 400),
(27, 7, '2017-07-07 10:16:00', 0, 1, 0),
(28, 7, '2017-07-07 10:16:07', 0, 1, 0),
(29, 7, '2017-07-07 10:16:54', 0, 1, 0),
(30, 7, '2017-07-07 10:17:00', 0, 1, 0),
(31, 7, '2017-07-07 10:18:12', 0, 1, 0),
(32, 7, '2017-07-07 10:18:17', 0, 1, 0),
(33, 7, '2017-07-07 10:18:27', 0, 1, 0),
(34, 7, '2017-07-07 10:19:26', 0, 1, 0),
(35, 7, '2017-07-07 10:19:34', 0, 1, 0),
(36, 7, '2017-07-07 10:20:01', 0, 1, 0),
(37, 7, '2017-07-07 10:20:23', 0, 1, 0),
(38, 7, '2017-07-07 10:20:29', 0, 1, 0),
(39, 7, '2017-07-07 10:20:46', 0, 1, 0),
(40, 7, '2017-07-07 10:20:53', 0, 1, 0),
(41, 7, '2017-07-07 10:21:03', 0, 1, 0),
(42, 7, '2017-07-07 10:21:28', 0, 1, 0),
(43, 7, '2017-07-07 10:22:57', 0, 1, 0),
(44, 7, '2017-07-07 10:24:04', 0, 1, 0),
(45, 7, '2017-07-07 10:24:21', 0, 1, 0),
(46, 7, '2017-07-07 10:27:31', 0, 1, 0),
(47, 7, '2017-07-07 10:27:41', 0, 1, 0),
(48, 7, '2017-07-07 10:28:21', 0, 1, 0),
(49, 7, '2017-07-07 10:29:12', 0, 1, 0),
(50, 7, '2017-07-07 10:33:59', 0, 1, 0),
(51, 7, '2017-07-07 10:34:20', 0, 1, 0),
(52, 7, '2017-07-07 10:34:39', 0, 1, 0),
(53, 7, '2017-07-07 10:35:03', 0, 1, 0),
(54, 7, '2017-07-07 10:35:18', 0, 1, 0),
(55, 7, '2017-07-07 12:54:50', 0, 1, 0),
(56, 7, '2017-07-07 12:55:36', 0, 1, 0),
(57, 7, '2017-07-07 12:56:22', 0, 1, 0),
(58, 7, '2017-07-07 12:56:29', 0, 1, 0),
(59, 7, '2017-07-07 12:56:40', 0, 1, 0),
(60, 7, '2017-07-07 12:58:23', 0, 1, 0),
(61, 7, '2017-07-07 12:59:09', 0, 1, 0),
(62, 7, '2017-07-07 12:59:19', 0, 1, 0),
(63, 7, '2017-07-07 12:59:33', 0, 1, 0),
(64, 7, '2017-07-07 13:00:48', 0, 1, 0),
(65, 7, '2017-07-07 13:02:37', 0, 1, 0),
(66, 7, '2017-07-07 13:07:05', 0, 1, 0),
(67, 7, '2017-07-07 13:11:44', 0, 1, 0),
(68, 7, '2017-07-07 13:12:09', 0, 1, 0),
(69, 7, '2017-07-07 13:12:26', 0, 1, 0),
(70, 7, '2017-07-07 13:13:45', 0, 1, 0),
(71, 7, '2017-07-07 13:14:26', 0, 1, 0),
(72, 7, '2017-07-07 13:14:44', 0, 1, 0),
(73, 7, '2017-07-07 13:15:11', 0, 1, 0),
(74, 7, '2017-07-07 13:16:27', 0, 1, 0),
(75, 7, '2017-07-07 13:17:30', 0, 1, 0),
(76, 7, '2017-07-07 13:19:06', 0, 1, 0),
(77, 7, '2017-07-07 13:20:06', 0, 1, 0),
(78, 7, '2017-07-07 13:20:36', 0, 1, 0),
(79, 7, '2017-07-07 13:20:51', 0, 1, 0),
(80, 7, '2017-07-07 13:22:01', 0, 1, 0),
(81, 7, '2017-07-07 13:22:42', 0, 1, 0),
(82, 7, '2017-07-07 13:23:17', 0, 1, 0),
(83, 7, '2017-07-07 13:24:14', 0, 1, 0),
(84, 7, '2017-07-07 13:24:42', 0, 1, 0),
(85, 7, '2017-07-07 13:25:57', 0, 1, 0),
(86, 7, '2017-07-07 13:39:27', 0, 1, 0),
(87, 7, '2017-07-07 19:48:17', 0, 1, 0),
(88, 7, '2017-07-07 19:49:41', 0, 1, 0),
(89, 7, '2017-07-07 19:49:46', 0, 1, 0),
(90, 7, '2017-07-07 19:51:17', 0, 1, 0),
(91, 7, '2017-07-07 19:53:33', 0, 1, 0),
(92, 7, '2017-07-07 19:53:58', 0, 1, 0),
(93, 7, '2017-07-08 13:15:14', 2, 1, 840),
(94, 7, '2017-07-08 13:15:36', 2, 1, 840);

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
(4, 1, 2, 'The Seasons of a Man\'s Life', 500, 'English', 'Daniel Levinson et al.', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, '', NULL),
(5, 1, 2, 'The Last Lecture', 400, 'English', 'Randy Pausch et al.', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, '', NULL),
(6, 1, 2, 'The Innovators', 600, 'English', 'Walter Isaacson', NULL, 'Used - Very Good', NULL, 'English', 1, '', NULL),
(7, 1, 2, 'Steve Jobs', 500, 'English', 'Walter Isaacson', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, '', NULL),
(8, 1, 2, 'Tokyo University\'s English', 1000, 'Japanese/English', 'Masafumi Satou', NULL, NULL, NULL, 'Paperback', 0, '', NULL),
(9, 1, 2, 'Siddhartha', 250, 'English', 'Herman Hesse', NULL, 'Used - Very Good', NULL, 'Paperback', 1, '', NULL),
(10, 1, 2, 'The Montessori Method', 400, 'English', 'Maria Montessori', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, '', NULL),
(11, 1, 2, 'The Soul of a New Machine', 400, 'English', 'Tracy Kidder', NULL, 'Used - Acceptable', NULL, 'Hardcover', 1, '', NULL),
(12, 1, 2, 'Outliers: The Story of Success', 400, 'English', 'Malcolm Gladwell', NULL, 'Used - Acceptable', NULL, 'Hardcover', 1, '', NULL),
(13, 1, 2, 'Guns, Germs, and Steel', 500, 'English', 'Jared Diamond', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, '', NULL),
(14, 1, 2, 'The Tao of Pooh', 300, 'English', 'Benjamin Hoff', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, '', NULL),
(15, 1, 2, 'The Different Drum', 400, 'English', 'M. Scott Peck, M.D.', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, '', NULL),
(16, 1, 2, 'The Lives of a Cell', 250, 'English', 'Lewis Thomas', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, '', NULL),
(17, 1, 2, 'The Plague', 400, 'English', 'Albert Camus', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, '', NULL),
(18, 1, 2, 'Living Language: French', 500, 'English', 'Anne Heminway', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, '', NULL),
(19, 1, 2, 'Starting Point, 1979-1996', 850, 'English', 'Hayao Miyazaki', NULL, 'New', NULL, 'Paperback', 1, 'Beth Cary/Frederik L. Schodt', NULL),
(20, 1, 2, 'Turning Point, 1997-2008', 1400, 'English', 'Hayao Miyazaki', NULL, 'New', NULL, 'Hardcover', 1, 'Beth Cary/Frederik L. Schodt', NULL),
(21, 1, 2, 'Made in Japan', 400, 'English', 'Akio Morita et al.', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, 'Edwin M. Reingold/Mitsuko Shimomura', NULL),
(22, 1, 2, 'Wikinomics', 400, 'English', 'Don Tapscott/Anthony Williams', NULL, 'Used - Acceptable', NULL, 'Hardcover', 1, NULL, NULL),
(23, 1, 2, 'The Dancing Wu Li Masters', 400, 'English', 'Gary Zukav', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, NULL, NULL),
(24, 1, 2, 'Le Petit Prince', 400, 'French', 'Antoine de Saint-Exupéry', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, NULL, 'This book\'s often quoted phrase, «On ne voit bien qu’avec le cœur. L’essentiel est invisible pour les yeux.  (We can only see well with our hearts. What is essential is invisible to the eye.)» reminds us that a person can be vain, difficult, and demanding, but it is the quality time that we spent for that person that makes him or her special and unique from all the other persons in the world.'),
(25, 1, 2, 'Founders at Work', 500, 'English', 'Jessica Livingston', NULL, 'Used - Acceptable', NULL, 'Hardcover', 1, NULL, NULL),
(26, 1, 2, 'Standard First Aid & Personal Safety', 500, 'English', 'American Red Cross', NULL, 'Used - Acceptable', NULL, 'Paperback', 0, NULL, NULL),
(27, 1, 2, 'HSK Level 5 Sample Exam', 1500, 'Mandarin/Japanese', '孔子学院总部/国家汉办', NULL, 'Used - Acceptable', NULL, 'Paperback', 0, '株式会社スプリックス', NULL),
(28, 1, 3, 'M&S Earl Grey Tea', 420, 'English', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
(29, 1, 3, 'UCC Coffee (Rich Blend)', 580, 'Japanese', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
(30, 1, 3, 'sencha (Green Tea)', 420, 'Japanese', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
(31, 1, 5, 'COMBO-Le Petit Prince, Living Language French, The Plague', 1250, 'French/English', 'Saint-Exupéry, Heminway, Camus', NULL, 'Used - Acceptable', NULL, 'Paperback', 1, NULL, NULL),
(32, 1, 5, 'COMBO-Wikinomics, Guns, Germs, and Steel, The Soul of a New Machine, The Different Drum', 1650, 'English', 'Tapscott/Williams, Diamond, Kidder, Peck', NULL, 'Used - Acceptable', NULL, 'Mixed', 1, NULL, NULL),
(33, 1, 5, 'COMBO-Made in Japan, The Soul of a New Machine, Founders at Work, Outliers', 1650, 'English', 'Morita et al., Kidder, Gladwell, Livingston', NULL, 'Used - Acceptable', NULL, 'Mixed', 1, NULL, NULL),
(34, 1, 5, 'COMBO-Starting Point, Turning Point', 2200, 'English', 'Hayao Miyazaki', NULL, 'New', NULL, 'Mixed', 1, 'Beth Cary and Frederik L. Schodt', NULL),
(35, 1, 5, 'COMBO-Steve Jobs, The Innovators', 1050, 'English', 'Walter Isaacson', NULL, 'Used - Very Good', NULL, 'Paperback', 1, NULL, NULL),
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
(49, 2, 8, 'Marvel Legends Wave 1 X-MEN BAF Juggernaut', 10000, 'English', NULL, NULL, 'VF-NM', NULL, NULL, 1, NULL, NULL);

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
(8, 'Toys & Collectibles');

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
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=199;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `customer_order`
--
ALTER TABLE `customer_order`
  MODIFY `customer_order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;
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
  MODIFY `mode_of_payment_id` tinyint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `product_type`
--
ALTER TABLE `product_type`
  MODIFY `product_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
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
