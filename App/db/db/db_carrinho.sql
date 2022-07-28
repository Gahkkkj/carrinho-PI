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


CREATE TABLE `fornecedor` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `cnpj` bigint,
  `descricao` TEXT,
  `numero_end` INT,
  `rua_end` VARCHAR(255),
  `bairro_end` VARCHAR(255),
  `cidade_end` VARCHAR(255),
  `estado_end` VARCHAR(255),
  `ordem` INT(10) NOT NULL,
  `status` enum('s', 'n') DEFAULT NULL,
  `data_inc` timestamp NULL DEFAULT NULL,
  `fk_id_grupo` int,
  PRIMARY KEY (`id`)
) ENGINE = innodb;

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
  `data_compra` timestamp NULL DEFAULT NULL,
  `preco_produto` double(10, 2) NOT NULL DEFAULT '0.00',
  `IMAGE` varchar(45) NULL DEFAULT '',
  `DESCRIPTION` text,
  `quantidade` int,
  `fk_id_categoria` int,
  PRIMARY KEY (`PID`)
) ENGINE = InnoDB DEFAULT CHARSET = latin1 AUTO_INCREMENT = 6;

-- ------------------------------------------------------
--
--  table `usuario`
--
CREATE TABLE `usuario` (
  `UID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(150) NOT NULL DEFAULT '',
  `CONTACT` varchar(150) NOT NULL DEFAULT '',
  `ADDRESS` text,
  `CITY` varchar(45) NOT NULL DEFAULT '',
  `PINCODE` varchar(45) NOT NULL DEFAULT '',
  `EMAIL` varchar(45) NOT NULL DEFAULT '',
  `niveis_acesso_id` int(1)NOT NULL,
  PRIMARY KEY (`UID`)
) ENGINE = InnoDB ;

CREATE TABLE `categoria` (
 `id` INT(10) NOT NULL AUTO_INCREMENT,
 `nome` VARCHAR(255) DEFAULT NULL,
 `descricao` VARCHAR(255) DEFAULT NULL,
 PRIMARY KEY (`id`)
) ENGINE = innodb;


INSERT INTO `usuario` (`UID`, `NAME`, `EMAIL`, `PINCODE`, `niveis_acesso_id`) VALUES

(9, 'Gerente', 'Gerente@gmail.com.br', '123',  1),
(10, 'Usuario', 'Usuario@gmail.com.br', '123',  2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
