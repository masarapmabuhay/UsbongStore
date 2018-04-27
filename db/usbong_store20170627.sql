-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2017 at 01:31 AM
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
  `quantity` int(6) NOT NULL,
  `price` int(6) NOT NULL,
  `added_datetime_stamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `purchased_datetime_stamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `product_id`, `customer_id`, `quantity`, `price`, `added_datetime_stamp`, `purchased_datetime_stamp`) VALUES
(1, 1, 7, 1, 400, '2017-06-26 19:47:10', '0000-00-00 00:00:00'),
(2, 1, 7, 1, 400, '2017-06-26 19:50:51', '0000-00-00 00:00:00'),
(3, 1, 7, 1, 400, '2017-06-26 20:35:48', '0000-00-00 00:00:00'),
(4, 1, 7, 1, 400, '2017-06-26 20:46:47', '0000-00-00 00:00:00'),
(5, 1, 7, 1, 400, '2017-06-26 20:57:04', '0000-00-00 00:00:00'),
(6, 1, 7, 1, 400, '2017-06-27 07:21:28', '0000-00-00 00:00:00'),
(7, 4, 7, 1, 500, '2017-06-27 07:21:58', '0000-00-00 00:00:00'),
(8, 7, 7, 1, 500, '2017-06-27 07:31:13', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_first_name` varchar(16) DEFAULT NULL,
  `customer_last_name` varchar(16) DEFAULT NULL,
  `customer_email_address` varchar(30) DEFAULT NULL,
  `customer_password` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_first_name`, `customer_last_name`, `customer_email_address`, `customer_password`) VALUES
(1, 'Michael', 'Syson', 'masarapmabuhay@gmail.com', 'mbs'),
(3, 'm', 'm', 'm@usbong.ph', 'm'),
(4, 'Mike', 'Syson', 'a@c.ph', 'aa'),
(5, 's', 's', '$2y$10$WL6z4DXSb0EJmiZt1FxKhOK', 's'),
(6, 'b', 'b', 'b@usbong.ph', '$2y$10$WtGuuf9v8gplDmKGBKKb5OBzifJNW.tbl4GCoOye1UBu/6tfVFWYq'),
(7, 'abc', 'abc', 'abc@usbong.ph', '$2y$10$IoTjRH3daPfVTcDnQVOS8uyuDFQMMyL2JeF79x4/zM6e8g9FPDIzC'),
(8, 'b', 'b', 'b@usbong.ph', '$2y$10$Lz2GQBQrmxsZK5df1OmZnO34YJy98TnTuJBkf5zktP475xCMSyX.2'),
(10, 'd', 'd', 'd@usbong.ph', '$2y$10$J3/pUt5KIN9BSceypK8m5Ow09/AU9Awk5IFbc/bcB39LZ965uD2sa'),
(11, 'e', 'e', 'e@usbong.ph', '$2y$10$EqVlR7nDUh3TomX.5iLE0OPc0/ZXWRfJIm8fn1W6AyntLJnsGzmdO');

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
(1, 1, 2, 'The Remains of the Day', 400, 'English', 'Kazuo Ishiguro', NULL, 'Used - Acceptable', NULL, 'Hardcover', 0, '', NULL),
(2, 1, 2, 'The Daydreamer', 400, 'English', 'Ian McEwan', NULL, 'Used - Acceptable', NULL, 'Paperback', 0, '', NULL),
(3, 1, 2, 'Myths to Live By', 400, 'English', 'Joseph Campbell', NULL, 'Used - Acceptable', NULL, 'Paperback', 0, '', NULL),
(4, 1, 2, 'The Seasons of a Man\'s Life', 500, 'English', 'Daniel Levinson et al.', NULL, 'Used - Acceptable', NULL, 'Paperback', 0, '', NULL),
(5, 1, 2, 'The Last Lecture', 400, 'English', 'Randy Pausch et al.', NULL, 'Used - Acceptable', NULL, 'Paperback', 0, '', NULL),
(6, 1, 2, 'The Innovators', 600, 'English', 'Walter Isaacson', NULL, 'Used - Very Good', NULL, 'English', 0, '', NULL),
(7, 1, 2, 'Steve Jobs', 500, 'English', 'Walter Isaacson', NULL, 'Used - Acceptable', NULL, 'Paperback', 0, '', NULL),
(8, 1, 2, 'Tokyo University\'s English', NULL, 'Japanese/English', 'Masafumi Satou', NULL, NULL, NULL, 'Paperback', 0, '', NULL),
(9, 1, 2, 'Siddhartha', 250, 'English', 'Herman Hesse', NULL, 'Used - Very Good', NULL, 'Paperback', 0, '', NULL),
(10, 1, 2, 'The Montessori Method', 400, 'English', 'Maria Montessori', NULL, 'Used - Acceptable', NULL, 'Paperback', 0, '', NULL),
(11, 1, 2, 'The Soul of a New Machine', 400, 'English', 'Tracy Kidder', NULL, 'Used - Acceptable', NULL, 'Hardcover', 0, '', NULL),
(12, 1, 2, 'Outliers: The Story of Success', 400, 'English', 'Malcolm Gladwell', NULL, 'Used - Acceptable', NULL, 'Hardcover', 0, '', NULL),
(13, 1, 2, 'Guns, Germs, and Steel', 500, 'English', 'Jared Diamond', NULL, 'Used - Acceptable', NULL, 'Paperback', 0, '', NULL),
(14, 1, 2, 'The Tao of Pooh', 300, 'English', 'Benjamin Hoff', NULL, 'Used - Acceptable', NULL, 'Paperback', 0, '', NULL),
(15, 1, 2, 'The Different Drum', 400, 'English', 'M. Scott Peck, M.D.', NULL, 'Used - Acceptable', NULL, 'Paperback', 0, '', NULL),
(16, 1, 2, 'The Lives of a Cell', 250, 'English', 'Lewis Thomas', NULL, 'Used - Acceptable', NULL, 'Paperback', 0, '', NULL),
(17, 1, 2, 'The Plague', 400, 'English', 'Albert Camus', NULL, 'Used - Acceptable', NULL, 'Paperback', 0, '', NULL),
(18, 1, 2, 'Living Language: French', 500, 'English', 'Anne Heminway', NULL, 'Used - Acceptable', NULL, 'Paperback', 0, '', NULL),
(19, 1, 2, 'Starting Point, 1979-1996', 850, 'English', 'Hayao Miyazaki', NULL, 'New', NULL, 'Paperback', 0, 'Beth Cary/Frederik L. Schodt', NULL),
(20, 1, 2, 'Turning Point, 1997-2008', 1400, 'English', 'Hayao Miyazaki', NULL, 'New', NULL, 'Hardcover', 0, 'Beth Cary/Frederik L. Schodt', NULL),
(21, 1, 2, 'Made in Japan', 400, 'English', 'Akio Morita et al.', NULL, 'Used - Acceptable', NULL, 'Paperback', 0, 'Edwin M. Reingold/Mitsuko Shimomura', NULL),
(22, 1, 2, 'Wikinomics', 400, 'English', 'Don Tapscott/Anthony Williams', NULL, 'Used - Acceptable', NULL, 'Hardcover', 0, NULL, NULL),
(23, 1, 2, 'The Dancing Wu Li Masters', 400, 'English', 'Gary Zukav', NULL, 'Used - Acceptable', NULL, 'Paperback', 0, NULL, NULL),
(24, 1, 2, 'Le Petit Prince', 400, 'French', 'Antoine de Saint-Exupéry', NULL, 'Used - Acceptable', NULL, 'Paperback', 0, NULL, 'This book\'s often quoted phrase, «On ne voit bien qu’avec le cœur. L’essentiel est invisible pour les yeux.  (We can only see well with our hearts. What is essential is invisible to the eye.)» reminds us that a person can be vain, difficult, and demanding, but it is the quality time that we spent for that person that makes him or her special and unique from all the other persons in the world.'),
(25, 1, 2, 'Founders at Work', 500, 'English', 'Jessica Livingston', NULL, 'Used - Acceptable', NULL, 'Hardcover', 0, NULL, NULL),
(26, 1, 2, 'Standard First Aid & Personal Safety', NULL, 'English', 'American Red Cross', NULL, 'Used - Acceptable', NULL, 'Paperback', 0, NULL, NULL),
(27, 1, 2, 'HSK Level 5 Sample Exam', NULL, 'Mandarin/Japanese', '孔子学院总部/国家汉办', NULL, 'Used - Acceptable', NULL, 'Paperback', 0, '株式会社スプリックス', NULL),
(28, 1, 3, 'M&S Earl Grey Tea', 420, 'English', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL),
(29, 1, 3, 'UCC Coffee (Rich Blend)', 580, 'Japanese', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL),
(30, 1, 3, 'sencha (Green Tea)', 420, 'Japanese', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL),
(31, 1, 5, 'COMBO-Le Petit Prince, Living Language French, The Plague', 1250, 'French/English', 'Saint-Exupéry, Heminway, Camus', NULL, 'Used - Acceptable', NULL, 'Paperback', 0, NULL, NULL),
(32, 1, 5, 'COMBO-Wikinomics, Guns, Germs, and Steel, The Soul of a New Machine, The Different Drum', 1650, 'English', 'Tapscott/Williams, Diamond, Kidder, Peck', NULL, 'Used - Acceptable', NULL, 'Mixed', 0, NULL, NULL),
(33, 1, 5, 'COMBO-Made in Japan, The Soul of a New Machine, Founders at Work, Outliers', 1650, 'English', 'Morita et al., Kidder, Gladwell, Livingston', NULL, 'Used - Acceptable', NULL, 'Mixed', 0, NULL, NULL),
(34, 1, 5, 'COMBO-Starting Point, Turning Point', 2200, 'English', 'Hayao Miyazaki', NULL, 'New', NULL, 'Mixed', 0, 'Beth Cary and Frederik L. Schodt', NULL),
(35, 1, 5, 'COMBO-Steve Jobs, The Innovators', 1050, 'English', 'Walter Isaacson', NULL, 'Used - Very Good', NULL, 'Paperback', 0, NULL, NULL),
(36, 2, 6, 'ACTION COMICS 1-52 (complete set)', 8000, 'English', NULL, NULL, 'new, 1-52 + extras, VF-NM', NULL, NULL, 0, NULL, NULL),
(37, 2, 6, 'Silver Surfer vol 1 (complete set)', 32000, 'English', NULL, NULL, '1-18, VG-F', NULL, NULL, 0, NULL, NULL),
(38, 2, 6, 'Batman Superman set', 3000, 'English', NULL, NULL, '1-31, annual 1-2, future\'s end 1, missing issue 32, VF-NM', NULL, NULL, 0, NULL, NULL),
(39, 2, 6, 'ULTIMATE FALL OUT set', 1800, 'English', NULL, NULL, 'ultimate fallout 1-6, issue 4 1st appearance miles morales, death of spider-man 2nd print, VF-NM', NULL, NULL, 0, NULL, NULL),
(40, 2, 6, 'KLAUS boom studios', 1200, 'English', NULL, NULL, 'complete set 1-7, VF-NM', NULL, NULL, 0, NULL, NULL),
(41, 2, 6, 'Empire of the Dead', 1500, 'English', NULL, NULL, 'complete 1st arc, 1-5, VF', NULL, NULL, 0, NULL, NULL),
(42, 2, 6, 'Fairest (complete set)', 4000, 'English', NULL, NULL, 'VF', NULL, NULL, 0, NULL, NULL),
(43, 2, 6, 'Batman and Robin New 52 set', 6000, 'English', NULL, NULL, 'Complete set of batman and robin new 52,\r\nVF-NM', NULL, NULL, 0, NULL, NULL),
(44, 1, 7, 'One Piece Manga set (1-20)', 3700, 'Japanese', NULL, NULL, 'Used - Acceptable', NULL, NULL, 0, NULL, NULL),
(45, 1, 7, 'Conan Manga set (1-9)', 1665, 'Japanese', NULL, NULL, 'Used - Acceptable', NULL, NULL, 0, NULL, NULL),
(46, 1, 7, 'Rurouni Kenshin Manga set (1-10)', 1850, 'Japanese', NULL, NULL, 'Used - Acceptable', NULL, NULL, 0, NULL, NULL),
(47, 2, 8, 'DAREDEVIL', 800, 'English', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL),
(48, 2, 8, 'Spider-man Marvel Toybiz 90s', 700, 'English', NULL, NULL, 'MOC', NULL, NULL, 0, NULL, NULL),
(49, 2, 8, 'Marvel Legends Wave 1 X-MEN BAF Juggernaut', 10000, 'English', NULL, NULL, 'VF-NM', NULL, NULL, 0, NULL, NULL);

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
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

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
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
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
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

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
