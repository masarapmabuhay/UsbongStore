-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema usbong_store
-- -----------------------------------------------------
USE `usbong_store` ;

-- -----------------------------------------------------
-- Table `usbong_store`.`product`
-- -----------------------------------------------------
ALTER TABLE `product` ADD `external_url` TEXT NULL DEFAULT NULL COMMENT '';
ALTER TABLE `product` ADD `show` BIT(1) NOT NULL DEFAULT 1 COMMENT '';

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
