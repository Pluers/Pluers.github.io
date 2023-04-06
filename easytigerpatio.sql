-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema EasyTiger-Patio
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema EasyTiger-Patio
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `EasyTiger-Patio` DEFAULT CHARACTER SET utf8 ;
-- -----------------------------------------------------
-- Schema easytiger-patio
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema easytiger-patio
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `easytiger-patio` DEFAULT CHARACTER SET utf8mb3 ;
USE `EasyTiger-Patio` ;

-- -----------------------------------------------------
-- Table `EasyTiger-Patio`.`band`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `EasyTiger-Patio`.`band` (
  `idband` INT NOT NULL AUTO_INCREMENT,
  `naam` VARCHAR(45) NULL,
  `prijs` DOUBLE NULL,
  `genre` VARCHAR(45) NULL,
  `herkomst` VARCHAR(45) NULL,
  `omschrijving` VARCHAR(45) NULL,
  PRIMARY KEY (`idband`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `EasyTiger-Patio`.`event`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `EasyTiger-Patio`.`event` (
  `idevent` INT NOT NULL AUTO_INCREMENT,
  `datum` VARCHAR(45) NULL,
  `omzet` VARCHAR(45) NULL,
  `aanvangstijd` VARCHAR(45) NULL,
  `prijs` VARCHAR(45) NULL,
  PRIMARY KEY (`idevent`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `EasyTiger-Patio`.`bezoeker`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `EasyTiger-Patio`.`bezoeker` (
  `idbezoeker` INT NOT NULL AUTO_INCREMENT,
  `postcode` VARCHAR(6) NOT NULL,
  `event_idevent` INT NOT NULL,
  PRIMARY KEY (`idbezoeker`),
  INDEX `fk_bezoeker_event1_idx` (`event_idevent` ASC) VISIBLE,
  CONSTRAINT `fk_bezoeker_event1`
    FOREIGN KEY (`event_idevent`)
    REFERENCES `EasyTiger-Patio`.`event` (`idevent`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `EasyTiger-Patio`.`band_has_event`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `EasyTiger-Patio`.`band_has_event` (
  `aantal_sets` INT NULL,
  `duur` TIME NULL,
  `band_idband` INT NOT NULL,
  `event_idevent` INT NOT NULL,
  INDEX `fk_act_band1_idx` (`band_idband` ASC) VISIBLE,
  INDEX `fk_act_event1_idx` (`event_idevent` ASC) VISIBLE,
  PRIMARY KEY (`band_idband`, `event_idevent`),
  CONSTRAINT `fk_act_band1`
    FOREIGN KEY (`band_idband`)
    REFERENCES `EasyTiger-Patio`.`band` (`idband`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_act_event1`
    FOREIGN KEY (`event_idevent`)
    REFERENCES `EasyTiger-Patio`.`event` (`idevent`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `EasyTiger-Patio`.`bandlid`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `EasyTiger-Patio`.`bandlid` (
  `idbandlid` INT NOT NULL AUTO_INCREMENT,
  `voornaam` VARCHAR(45) NULL,
  `tussenvoegsel` VARCHAR(45) NULL,
  `achternaam` VARCHAR(45) NULL,
  `email` VARCHAR(45) NULL,
  `telefoonnummer` VARCHAR(45) NULL,
  `band_idband` INT NOT NULL,
  PRIMARY KEY (`idbandlid`),
  INDEX `fk_bandlid_band_idx` (`band_idband` ASC) VISIBLE,
  CONSTRAINT `fk_bandlid_band`
    FOREIGN KEY (`band_idband`)
    REFERENCES `EasyTiger-Patio`.`band` (`idband`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `EasyTiger-Patio`.`admin`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `EasyTiger-Patio`.`admin` (
  `idadmin` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idadmin`))
ENGINE = InnoDB;

USE `easytiger-patio` ;

-- -----------------------------------------------------
-- Table `easytiger-patio`.`band`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `easytiger-patio`.`band` (
  `idband` INT NOT NULL AUTO_INCREMENT,
  `naam` VARCHAR(45) NULL DEFAULT NULL,
  `prijs` DOUBLE NULL DEFAULT NULL,
  `genre` VARCHAR(45) NULL DEFAULT NULL,
  `herkomst` VARCHAR(45) NULL DEFAULT NULL,
  `omschrijving` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`idband`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `easytiger-patio`.`event`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `easytiger-patio`.`event` (
  `idevent` INT NOT NULL,
  `datum` VARCHAR(45) NULL DEFAULT NULL,
  `omzet` VARCHAR(45) NULL DEFAULT NULL,
  `aanvangstijd` VARCHAR(45) NULL DEFAULT NULL,
  `prijs` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`idevent`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `easytiger-patio`.`band_has_event`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `easytiger-patio`.`band_has_event` (
  `aantal_sets` INT NULL DEFAULT NULL,
  `duur` TIME NULL DEFAULT NULL,
  `band_idband` INT NOT NULL,
  `event_idevent` INT NOT NULL,
  PRIMARY KEY (`band_idband`, `event_idevent`),
  INDEX `fk_act_band1_idx` (`band_idband` ASC) VISIBLE,
  INDEX `fk_act_event1_idx` (`event_idevent` ASC) VISIBLE,
  CONSTRAINT `fk_act_band1`
    FOREIGN KEY (`band_idband`)
    REFERENCES `easytiger-patio`.`band` (`idband`),
  CONSTRAINT `fk_act_event1`
    FOREIGN KEY (`event_idevent`)
    REFERENCES `easytiger-patio`.`event` (`idevent`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `easytiger-patio`.`bandlid`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `easytiger-patio`.`bandlid` (
  `idbandlid` INT NOT NULL,
  `voornaam` VARCHAR(45) NULL DEFAULT NULL,
  `tussenvoegsel` VARCHAR(45) NULL DEFAULT NULL,
  `achternaam` VARCHAR(45) NULL DEFAULT NULL,
  `email` VARCHAR(45) NULL DEFAULT NULL,
  `telefoonnummer` VARCHAR(45) NULL DEFAULT NULL,
  `band_idband` INT NOT NULL,
  PRIMARY KEY (`idbandlid`),
  INDEX `fk_bandlid_band_idx` (`band_idband` ASC) VISIBLE,
  CONSTRAINT `fk_bandlid_band`
    FOREIGN KEY (`band_idband`)
    REFERENCES `easytiger-patio`.`band` (`idband`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `easytiger-patio`.`bezoeker`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `easytiger-patio`.`bezoeker` (
  `idbezoeker` INT NOT NULL,
  `postcode` VARCHAR(6) NULL DEFAULT NULL,
  `event_idevent` INT NOT NULL,
  PRIMARY KEY (`idbezoeker`),
  INDEX `fk_bezoeker_event1_idx` (`event_idevent` ASC) VISIBLE,
  CONSTRAINT `fk_bezoeker_event1`
    FOREIGN KEY (`event_idevent`)
    REFERENCES `easytiger-patio`.`event` (`idevent`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `easytiger-patio`.`myguests`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `easytiger-patio`.`myguests` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `firstname` VARCHAR(30) NOT NULL,
  `lastname` VARCHAR(30) NOT NULL,
  `email` VARCHAR(50) NULL DEFAULT NULL,
  `reg_date` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8mb3;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
