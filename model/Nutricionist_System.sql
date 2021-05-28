-- MySQL Script generated by MySQL Workbench
-- Fri May 14 16:34:17 2021
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema NUTRITIONISTS_SYSTEM
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema NUTRITIONISTS_SYSTEM
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `NUTRITIONISTS_SYSTEM` DEFAULT CHARACTER SET utf8 ;
USE `NUTRITIONISTS_SYSTEM` ;

-- -----------------------------------------------------
-- Table `NUTRITIONISTS_SYSTEM`.`NUTRITIONISTS`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `NUTRITIONISTS_SYSTEM`.`NUTRITIONISTS` ;

CREATE TABLE IF NOT EXISTS `NUTRITIONISTS_SYSTEM`.`NUTRITIONISTS` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `CPF` VARCHAR(11) NOT NULL,
  `NAME` VARCHAR(45) NOT NULL,
  `REGISTER_NUMBER` VARCHAR(45) NOT NULL,
  `EMAIL` VARCHAR(70) NOT NULL,
  `PASSWORD` VARCHAR(50) NOT NULL,
  `VALIDATION_CODE` VARCHAR(70) NULL,
  `EMAIL_VALIDATED` BOOLEAN DEFAULT 0,
  PRIMARY KEY (`ID`),
  UNIQUE INDEX `CPF_UNIQUE` (`CPF` ASC) VISIBLE,
  UNIQUE INDEX `REGISTER_NUMBER_UNIQUE` (`REGISTER_NUMBER` ASC) VISIBLE,
  UNIQUE INDEX `EMAIL_UNIQUE` (`EMAIL` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `NUTRITIONISTS_SYSTEM`.`PATIENTS`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `NUTRITIONISTS_SYSTEM`.`PATIENTS` ;

CREATE TABLE IF NOT EXISTS `NUTRITIONISTS_SYSTEM`.`PATIENTS` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `CPF` VARCHAR(11) NOT NULL,
  `NAME` VARCHAR(45) NOT NULL,
  `DATE_BIRTH` VARCHAR(10) NOT NULL,
  `WEIGHT` FLOAT(10,2) NOT NULL,
  `HEIGHT` FLOAT(10,2) NOT NULL,
  `OBJECTIVE` VARCHAR(50) NOT NULL,
  `PASSWORD` VARCHAR(50) NOT NULL,
  `EMAIL` VARCHAR(70) NOT NULL,
  `VALIDATION_CODE` VARCHAR(45) NULL,
  `EMAIL_VALIDATED` BOOLEAN DEFAULT 0,
  PRIMARY KEY (`ID`),
  UNIQUE INDEX `CPF_UNIQUE` (`CPF` ASC) VISIBLE,
  UNIQUE INDEX `EMAIL_UNIQUE` (`EMAIL` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `NUTRITIONISTS_SYSTEM`.`EATING_PLANS`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `NUTRITIONISTS_SYSTEM`.`EATING_PLANS` ;

CREATE TABLE IF NOT EXISTS `NUTRITIONISTS_SYSTEM`.`EATING_PLANS` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `DATE_START` VARCHAR(10) NOT NULL,
  `DATE_FINISH` VARCHAR(10) NOT NULL,
  `OBJECTIVE` VARCHAR(100) NULL,
  `NUTRITIONIST_ID` INT NOT NULL,
  `PATIENT_ID` INT NOT NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_EATING_PLANS_NUTRITIONISTS1_idx` (`NUTRITIONIST_ID` ASC) VISIBLE,
  INDEX `fk_EATING_PLANS_PATIENTS1_idx` (`PATIENT_ID` ASC) VISIBLE,
  CONSTRAINT `fk_EATING_PLANS_NUTRITIONISTS1`
    FOREIGN KEY (`NUTRITIONIST_ID`)
    REFERENCES `NUTRITIONISTS_SYSTEM`.`NUTRITIONISTS` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_EATING_PLANS_PATIENTS1`
    FOREIGN KEY (`PATIENT_ID`)
    REFERENCES `NUTRITIONISTS_SYSTEM`.`PATIENTS` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `NUTRITIONISTS_SYSTEM`.`MEALS`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `NUTRITIONISTS_SYSTEM`.`MEALS` ;

CREATE TABLE IF NOT EXISTS `NUTRITIONISTS_SYSTEM`.`MEALS` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `NAME` VARCHAR(45) NOT NULL,
  `WEIGHT` FLOAT(10,2) NOT NULL,
  `EATING_PLANS_ID` INT NOT NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_MEALS_EATING_PLANS1_idx` (`EATING_PLANS_ID` ASC) VISIBLE,
  CONSTRAINT `fk_MEALS_EATING_PLANS1`
    FOREIGN KEY (`EATING_PLANS_ID`)
    REFERENCES `NUTRITIONISTS_SYSTEM`.`EATING_PLANS` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;