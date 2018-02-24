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
-- Table `usbong_store`.`customer_reset_password`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `usbong_store`.`customer_reset_password` (
  `customer_reset_password_id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '',
  `customer_id` INT(11) NOT NULL COMMENT '',
  `datetime_used` DATETIME NULL COMMENT '',
  `datetime_expire` DATETIME NOT NULL COMMENT '',
  PRIMARY KEY (`customer_reset_password_id`)  COMMENT '',
  INDEX `fk_customer_reset_password_customer_id_idx` (`customer_id` ASC)  COMMENT '',
  CONSTRAINT `fk_customer_reset_password_customer_id`
    FOREIGN KEY (`customer_id`)
    REFERENCES `usbong_store`.`customer` (`customer_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
