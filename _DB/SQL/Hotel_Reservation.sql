SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `Booking` ;
CREATE SCHEMA IF NOT EXISTS `Booking` DEFAULT CHARACTER SET utf8 COLLATE utf8_polish_ci ;
USE `Booking` ;

-- -----------------------------------------------------
-- Table `room_type`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `room_type` (
  `idroom_type` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `type_name` VARCHAR(255) NOT NULL,
  `capacity` TINYINT UNSIGNED NOT NULL DEFAULT 2,
  `price` INT UNSIGNED NOT NULL,
  `desc` TEXT NULL,
  PRIMARY KEY (`idroom_type`),
  UNIQUE INDEX `idroom_type_UNIQUE` (`idroom_type` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rooms`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rooms` (
  `idrooms` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `desc` TEXT NULL,
  `type` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`idrooms`),
  UNIQUE INDEX `idrooms_UNIQUE` (`idrooms` ASC),
  INDEX `fk_rooms_room_type_idx` (`type` ASC),
  CONSTRAINT `fk_rooms_room_type`
    FOREIGN KEY (`type`)
    REFERENCES `room_type` (`idroom_type`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `guest`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `guest` (
  `idguest` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `family` VARCHAR(45) NOT NULL,
  `melli_code` VARCHAR(10) NOT NULL,
  `phone` VARCHAR(20) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `adults` TINYINT NOT NULL DEFAULT 2,
  `children` TINYINT NOT NULL,
  PRIMARY KEY (`idguest`),
  UNIQUE INDEX `idguest_UNIQUE` (`idguest` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `reservation`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `reservation` (
  `idreservation` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `start` DATE NOT NULL,
  `end` DATE NOT NULL,
  `rooms_idrooms` INT UNSIGNED NOT NULL,
  `guest_idguest` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`idreservation`),
  UNIQUE INDEX `idreservation_UNIQUE` (`idreservation` ASC),
  INDEX `fk_reservation_rooms_idx` (`rooms_idrooms` ASC),
  INDEX `fk_reservation_guest_idx` (`guest_idguest` ASC),
  CONSTRAINT `fk_reservation_rooms`
    FOREIGN KEY (`rooms_idrooms`)
    REFERENCES `rooms` (`idrooms`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_reservation_guest`
    FOREIGN KEY (`guest_idguest`)
    REFERENCES `guest` (`idguest`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `account`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `account` (
  `username` VARCHAR(128) NOT NULL,
  `password` VARCHAR(128) NOT NULL,
  PRIMARY KEY (`username`),
  UNIQUE INDEX `username_UNIQUE` (`username` ASC))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `account`
-- -----------------------------------------------------
START TRANSACTION;
USE `Booking`;
INSERT INTO `account` (`username`, `password`) VALUES ('admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918');

COMMIT;

