SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema usbong_store
-- -----------------------------------------------------

USE `usbong_store`;

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
  `contact_case_type_name` varchar(100) NOT NULL,
  `contact_case_type_name_shortened` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

--
-- Dumping data for table `contact_case_type`
--

INSERT INTO `contact_case_type` (`contact_case_type_id`, `contact_case_type_name`, `contact_case_type_name_shortened`) VALUES
(1, 'General feedback, no need to reply', 'No reply OK'),
(2, 'Need help with an issue', 'Issue'),
(3, 'Need help with software development', 'Software Dev.');



-- --------------------------------------------------------

COMMIT;