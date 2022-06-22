SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


-- COMANDO DE CRIAÇÃO DE BANDO DE DADOS


CREATE DATABASE `dbmaxel` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `dbmaxel`;

-- COMANDO DE CRIAÇÃO DE TABELA DE GRUPOS
-- --------------------------------------------------------

--
-- table `orders`
--

CREATE TABLE `orders` (
  `OID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `PEDIDO_NO` varchar(45) NOT NULL DEFAULT '',
  `data_pedido` date NOT NULL DEFAULT '0000-00-00',
  `UID` int(10) unsigned NOT NULL DEFAULT '0',
  `TOTAL_AMT` double(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`OID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
--  table `detalhes_pedido`
--

CREATE TABLE `detalhes_pedido` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `OID` int(10) unsigned NOT NULL DEFAULT '0',
  `PID` int(10) unsigned NOT NULL DEFAULT '0',
  `PNAME` varchar(45) NOT NULL DEFAULT '',
  `preco_produto` double(10,2) NOT NULL DEFAULT '0.00',
  `QTY` int(10) unsigned NOT NULL DEFAULT '0',
  `TOTAL` double(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

-- table `produtos`


CREATE TABLE `produtos_carrinho` (
  `PID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `PRODUCT` varchar(45) NOT NULL DEFAULT '',
  `preco_produto` double(10,2) NOT NULL DEFAULT '0.00',
  `IMAGE` varchar(45) NOT NULL DEFAULT '',
  `DESCRIPTION` text,
  PRIMARY KEY (`PID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- insert table `produtos`
--

INSERT INTO `produtos_carrinho` (`PID`, `PRODUCT`, `preco_produto`, `IMAGE`, `DESCRIPTION`) VALUES
(2, 'Product 1', 100.00, '2.jpg', 'pc gamer pronto pra entrega'),
(3, 'Product 2', 75.00, '3.jpg', 'placa de video mostra'),
(4, 'Product 3', 45.00, '4.jpg', 'headset gamer black'),
(5, 'Product 4', 85.00, '5.jpg', 'garrafinha de agua tonica bolada com rgb');

-- --------------------------------------------------------

--
--  table `users`
--

CREATE TABLE `users` (
  `UID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(150) NOT NULL DEFAULT '',
  `CONTACT` varchar(150) NOT NULL DEFAULT '',
  `ADDRESS` text,
  `CITY` varchar(45) NOT NULL DEFAULT '',
  `PINCODE` varchar(45) NOT NULL DEFAULT '',
  `EMAIL` varchar(45) NOT NULL DEFAULT '',
  PRIMARY KEY (`UID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE `grupo` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `descricao` TEXT,
  `ordem` INT(10) NOT NULL,
  `status` enum('s','n') DEFAULT NULL,
  `data_inc` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
)  ENGINE = innodb;

-- COMANDO DE CRIAÇÃO DE TABELA DE EMPRESAS

CREATE TABLE `empresa` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `nome_fantasia` varchar(255) DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `cnpj` bigint,
  `descricao` TEXT,
  `numero_end` INT,
  `rua_end`  varchar(50),
  `bairro_end`  varchar(50),
  `cidade_end` varchar(50),
  `estado_end` varchar(2),
  `ordem` INT(10) NOT NULL,
  `status` enum('s','n') DEFAULT NULL,
  `data_inc` timestamp NULL DEFAULT NULL,
  `fk_id_grupo` int,
  PRIMARY KEY (`id`)
) ENGINE = innodb;

-- COMANDO DE CRIAÇÃO DE TABELA DE USUÁRIOS

CREATE TABLE `usuario` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `sobrenome` varchar(255) DEFAULT NULL,
  `cpf` bigint NOT NULL,
  `telefone` bigint,
  `email` varchar(100),
  `numero_end` INT,
  `rua_end`  varchar(50),
  `bairro_end`  varchar(50),
  `cidade_end` varchar(50),
  `estado_end` varchar(2), 
  `focal` enum('s','n') DEFAULT NULL,
  `ordem` INT(10) NOT NULL,
  `status` enum('s','n') DEFAULT NULL,
  `data_inc` timestamp NULL DEFAULT NULL,
  `fk_id_empresa` int,
  PRIMARY KEY (`id`)
) ENGINE = innodb;

-- ADICIONANDO FOREIGN KEY DE ID / GRUPO EM EMPRESA

ALTER TABLE `empresa` ADD CONSTRAINT `fk_id_grupo` FOREIGN KEY ( `fk_id_grupo` ) REFERENCES `grupo` ( `id` ) ;

-- ADICIONANDO FOREIGN KEY DE ID / EMPRESA EM USUARIO

ALTER TABLE `usuario` ADD CONSTRAINT `fk_id_empresa` FOREIGN KEY ( `fk_id_empresa` ) REFERENCES `empresa` ( `id` ) ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
