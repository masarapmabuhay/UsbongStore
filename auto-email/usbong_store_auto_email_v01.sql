-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema usbong_store
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema usbong_store
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `usbong_store` DEFAULT CHARACTER SET utf8 ;
USE `usbong_store` ;

-- -----------------------------------------------------
-- Table `usbong_store`.`auto_email_template`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `usbong_store`.`auto_email_template` (
  `auto_email_template_id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '',
  `view` VARCHAR(255) NOT NULL COMMENT 'What is the name of the view file to be used for this template?',
  `date_01_used` INT(1) NOT NULL COMMENT '',
  `date_02_used` INT(1) NOT NULL COMMENT '',
  `date_03_used` INT(1) NOT NULL COMMENT '',
  `date_04_used` INT(1) NOT NULL COMMENT '',
  `date_05_used` INT(1) NOT NULL COMMENT '',
  `date_01_attribute` VARCHAR(255) NULL COMMENT '',
  `date_02_attribute` VARCHAR(255) NULL COMMENT '',
  `date_03_attribute` VARCHAR(255) NULL COMMENT '',
  `date_04_attribute` VARCHAR(255) NULL COMMENT '',
  `date_05_attribute` VARCHAR(255) NULL COMMENT '',
  PRIMARY KEY (`auto_email_template_id`)  COMMENT '')
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `usbong_store`.`auto_email`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `usbong_store`.`auto_email` (
  `auto_email_id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '',
  `subject` VARCHAR(255) NOT NULL COMMENT 'What subject would you like to place in the email?',
  `auto_email_template_id` INT(11) UNSIGNED NOT NULL COMMENT 'What email template in table auto_email_template would you like to use?',
  `datetime` DATETIME NOT NULL COMMENT 'When was the email created?',
  `data_01` VARCHAR(2000) NULL COMMENT 'What template specific data would you like to use?',
  `data_02` VARCHAR(2000) NULL COMMENT 'What template specific data would you like to use?',
  `data_03` VARCHAR(2000) NULL COMMENT 'What template specific data would you like to use?',
  `data_04` VARCHAR(2000) NULL COMMENT 'What template specific data would you like to use?',
  `data_05` VARCHAR(2000) NULL COMMENT 'What template specific data would you like to use?',
  PRIMARY KEY (`auto_email_id`)  COMMENT '',
  INDEX `auto_email_fk_auto_email_template_id` (`auto_email_template_id` ASC)  COMMENT '',
  CONSTRAINT `auto_email_fk_auto_email_template_id`
    FOREIGN KEY (`auto_email_template_id`)
    REFERENCES `usbong_store`.`auto_email_template` (`auto_email_template_id`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `usbong_store`.`auto_email_product`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `usbong_store`.`auto_email_product` (
  `auto_email_product_id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '',
  `auto_email_id` INT(11) UNSIGNED NOT NULL COMMENT '',
  `product_id` INT(11) NOT NULL COMMENT '',
  PRIMARY KEY (`auto_email_product_id`)  COMMENT '',
  INDEX `auto_email_product_fk_auto_email_id` (`auto_email_id` ASC)  COMMENT '',
  INDEX `auto_email_product_fk_product_id` (`product_id` ASC)  COMMENT '',
  CONSTRAINT `auto_email_product_fk_auto_email_id`
    FOREIGN KEY (`auto_email_id`)
    REFERENCES `usbong_store`.`auto_email` (`auto_email_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `auto_email_product_fk_product_id`
    FOREIGN KEY (`product_id`)
    REFERENCES `usbong_store`.`product` (`product_id`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `usbong_store`.`auto_email_schedule`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `usbong_store`.`auto_email_schedule` (
  `auto_email_schedule_id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '',
  `auto_email_id` INT(11) UNSIGNED NOT NULL COMMENT '',
  `start_customer_id` INT(11) NOT NULL COMMENT '',
  `end_customer_id` INT(11) NOT NULL COMMENT '',
  `start_datetime` DATETIME NOT NULL COMMENT 'If the current time is later than this, then this batch will be processed.',
  `status` ENUM('QUEUED', 'ACTIVE', 'PAUSED', 'ERROR', 'DONE') NOT NULL COMMENT '',
  PRIMARY KEY (`auto_email_schedule_id`)  COMMENT '',
  INDEX `auto_email_schedule_fk_auto_email_id` (`auto_email_id` ASC)  COMMENT '',
  INDEX `auto_email_schedule_fk_start_customer_id` (`start_customer_id` ASC)  COMMENT '',
  INDEX `auto_email_schedule_fk_end_customer_id` (`end_customer_id` ASC)  COMMENT '',
  CONSTRAINT `auto_email_schedule_fk_auto_email_id`
    FOREIGN KEY (`auto_email_id`)
    REFERENCES `usbong_store`.`auto_email` (`auto_email_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `auto_email_schedule_fk_start_customer_id`
    FOREIGN KEY (`start_customer_id`)
    REFERENCES `usbong_store`.`customer` (`customer_id`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE,
  CONSTRAINT `auto_email_schedule_fk_end_customer_id`
    FOREIGN KEY (`end_customer_id`)
    REFERENCES `usbong_store`.`customer` (`customer_id`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `usbong_store`.`auto_email_sent`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `usbong_store`.`auto_email_sent` (
  `auto_email_sent_id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '',
  `auto_email_schedule_id` INT(11) UNSIGNED NOT NULL COMMENT '',
  `customer_id` INT(11) NOT NULL COMMENT '',
  `datetime` DATETIME NOT NULL COMMENT 'If the current time is later than this, then this batch will be processed.',
  `status` ENUM('SENT', 'ERROR') NULL COMMENT '',
  `error` TEXT NULL COMMENT '',
  PRIMARY KEY (`auto_email_sent_id`)  COMMENT '',
  INDEX `auto_email_sent_fk_start_customer_id` (`customer_id` ASC)  COMMENT '',
  INDEX `auto_email_sent_fk_auto_email_schedule_id` (`auto_email_schedule_id` ASC)  COMMENT '',
  UNIQUE INDEX `auto_email_sent_unique_auto_email_schedule_cross_customer` (`auto_email_schedule_id` ASC, `customer_id` ASC)  COMMENT '',
  CONSTRAINT `auto_email_sent_fk_auto_email_schedule_id`
    FOREIGN KEY (`auto_email_schedule_id`)
    REFERENCES `usbong_store`.`auto_email_schedule` (`auto_email_schedule_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `auto_email_sent_fk_customer_id`
    FOREIGN KEY (`customer_id`)
    REFERENCES `usbong_store`.`customer` (`customer_id`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `usbong_store`.`auto_email_setting`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `usbong_store`.`auto_email_setting` (
  `auto_email_setting_id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '',
  `attribute` VARCHAR(255) NOT NULL COMMENT '',
  `value` VARCHAR(255) NOT NULL COMMENT '',
  `remarks` VARCHAR(255) NOT NULL COMMENT '',
  PRIMARY KEY (`auto_email_setting_id`)  COMMENT '')
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = latin1;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `usbong_store`.`auto_email_setting`
-- -----------------------------------------------------
START TRANSACTION;
USE `usbong_store`;
INSERT INTO `usbong_store`.`auto_email_setting` (`auto_email_setting_id`, `attribute`, `value`, `remarks`) VALUES (1, 'max_send', '20', 'The max number of emails that can be sent out per script call.');

COMMIT;

