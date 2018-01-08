-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema usbong_store
-- -----------------------------------------------------

USE `usbong_store`;

-- -----------------------------------------------------
-- Table `usbong_store`.`auto_email_template`
-- -----------------------------------------------------

ALTER TABLE `usbong_store`.`auto_email_template` ADD `data_01_type` ENUM('image', 'text', 'textarea') NULL DEFAULT 'text' COMMENT '';
ALTER TABLE `usbong_store`.`auto_email_template` ADD `data_02_type` ENUM('image', 'text', 'textarea') NULL DEFAULT 'text' COMMENT '';
ALTER TABLE `usbong_store`.`auto_email_template` ADD `data_03_type` ENUM('image', 'text', 'textarea') NULL DEFAULT 'text' COMMENT '';
ALTER TABLE `usbong_store`.`auto_email_template` ADD `data_04_type` ENUM('image', 'text', 'textarea') NULL DEFAULT 'text' COMMENT '';
ALTER TABLE `usbong_store`.`auto_email_template` ADD `data_05_type` ENUM('image', 'text', 'textarea') NULL DEFAULT 'text' COMMENT '';

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `usbong_store`.`auto_email_template`
-- -----------------------------------------------------
START TRANSACTION;
USE `usbong_store`;
INSERT INTO `usbong_store`.`auto_email_template` (`auto_email_template_id`, `view`, `data_01_used`, `data_02_used`, `data_03_used`, `data_04_used`, `data_05_used`, `data_01_attribute`, `data_02_attribute`, `data_03_attribute`, `data_04_attribute`, `data_05_attribute`, `data_01_type`, `data_02_type`, `data_03_type`, `data_04_type`, `data_05_type`, `description`, `image`, `product_capacity`) VALUES (2, 'email_frame_single_template', 1, 1, 1, 1, 0, 'Image', 'Message', 'Call to Action Text', 'Call to Action URL', NULL, 'image', 'textarea', 'text', 'text', NULL, 'This template is mobile ready. It addresses recipients by first name. It can house one engagement image with one call to action.', 'email_frame_single_template.jpg', 0);

COMMIT;
