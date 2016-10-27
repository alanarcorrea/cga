-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Database cga
-- -----------------------------------------------------
CREATE DATABASE IF NOT EXISTS cga DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE cga ;

-- -----------------------------------------------------
-- Table Ambientes
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS Ambientes 
  (
    id INT NOT NULL AUTO_INCREMENT ,
    descricao VARCHAR(45) NOT NULL ,
    PRIMARY KEY (id)  
  );

-- -----------------------------------------------------
-- Table Moveis
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS Moveis 
  (
    id INT NOT NULL AUTO_INCREMENT ,
    descricao VARCHAR(250) NOT NULL ,
    altura VARCHAR(30) NOT NULL ,
    largura VARCHAR(30) NOT NULL ,
    profundidade VARCHAR(30) NOT NULL ,
    preco FLOAT(8,2) NOT NULL ,
    ambientes_id INT NOT NULL ,
    destque VARCHAR(1) NOT NULL,

    PRIMARY KEY (id)  ,
    INDEX idx_Moveis_Ambientes (ambientes_id ASC)  ,

    CONSTRAINT fk_Moveis_Ambientes
      FOREIGN KEY (ambientes_id)
      REFERENCES Ambientes (id)
  );


-- -----------------------------------------------------
-- Table Fotografias
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS Fotografias 
  (
    id INT NOT NULL AUTO_INCREMENT ,
    descricao VARCHAR(100) NOT NULL ,
    moveis_id INT NOT NULL ,

    PRIMARY KEY (id)  ,
    INDEX idx_Fotografias_Moveis (moveis_id ASC)  ,

    CONSTRAINT fk_Fotografias_Moveis
      FOREIGN KEY (moveis_id)
      REFERENCES Moveis (id)
  );


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
