SET
  SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

SET
  time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;

/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;

/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;

/*!40101 SET NAMES utf8 */
;

-- COMANDO DE CRIAÇÃO DE BANDO DE DADOS
CREATE DATABASE `dbmaxel`;

USE `dbmaxel`;

-- COMANDO DE CRIAÇÃO DE TABELA DE GRUPOS
CREATE TABLE `grupo` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `descricao` TEXT,
  `ordem` INT(10) NOT NULL,
  `status` enum('s', 'n') DEFAULT NULL,
  `data_inc` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE = innodb;

-- COMANDO DE CRIAÇÃO DE TABELA DE EMPRESAS
CREATE TABLE `produtos`(
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `descricao` TEXT,
  `data_compra` timestamp NULL DEFAULT NULL,
  `nota_fiscal` INT,
  `preco` double(10, 2) NOT NULL DEFAULT '0.00',
  `quantidade` INT,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB DEFAULT CHARSET = latin1 AUTO_INCREMENT = 1;

-- COMANDO DE CRIAÇÃO DE TABELA DE USUÁRIOS

CREATE TABLE `orders` (
  `OID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `PEDIDO_NO` varchar(45) NOT NULL DEFAULT '',
  `data_pedido` date NOT NULL DEFAULT '0000-00-00',
  `UID` int(10) unsigned NOT NULL DEFAULT '0',
  `TOTAL_AMT` double(10, 2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`OID`)
) ENGINE = InnoDB DEFAULT CHARSET = latin1 AUTO_INCREMENT = 1;

-- --------------------------------------------------------
--
--  table `detalhes_pedido`
--
CREATE TABLE `detalhes_pedido` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `OID` int(10) unsigned NOT NULL DEFAULT '0',
  `PID` int(10) unsigned NOT NULL DEFAULT '0',
  `PNAME` varchar(45) NOT NULL DEFAULT '',
  `preco_produto` double(10, 2) NOT NULL DEFAULT '0.00',
  `QTY` int(10) unsigned NOT NULL DEFAULT '0',
  `TOTAL` double(10, 2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`ID`)
) ENGINE = InnoDB DEFAULT CHARSET = latin1 AUTO_INCREMENT = 1;

-- --------------------------------------------------------
-- table `produtos`
CREATE TABLE `produtos_carrinho` (
  `PID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `PRODUCT` varchar(45) NOT NULL DEFAULT '',
  `preco_produto` double(10, 2) NOT NULL DEFAULT '0.00',
  `IMAGE` varchar(45) NULL DEFAULT '',
  `DESCRIPTION` text,
  PRIMARY KEY (`PID`)
) ENGINE = InnoDB DEFAULT CHARSET = latin1 AUTO_INCREMENT = 6;

-- ------------------------------------------------------
--
--  table `Usuario`
--
CREATE TABLE `Usuario` (
  `UID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(150) NOT NULL DEFAULT '',
  `CONTACT` varchar(150) NOT NULL DEFAULT '',
  `ADDRESS` text,
  `CITY` varchar(45) NOT NULL DEFAULT '',
  `PINCODE` varchar(45) NOT NULL DEFAULT '',
  `EMAIL` varchar(45) NOT NULL DEFAULT '',
  PRIMARY KEY (`UID`)
) ENGINE = InnoDB DEFAULT CHARSET = latin1 AUTO_INCREMENT = 1;

-- ADICIONANDO FOREIGN KEY DE ID / GRUPO EM EMPRESA
ALTER TABLE
  `empresa`
ADD
  CONSTRAINT `fk_id_grupo` FOREIGN KEY (`fk_id_grupo`) REFERENCES `grupo` (`id`);

-- ADICIONANDO FOREIGN KEY DE ID / EMPRESA EM USUARIO
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;
