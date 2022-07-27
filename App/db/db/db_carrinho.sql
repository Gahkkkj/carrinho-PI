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
  PRIMARY KEY (`UID`)
) ENGINE = InnoDB DEFAULT CHARSET = latin1 AUTO_INCREMENT = 1;

CREATE TABLE `categoria` (
 `id` INT(10) NOT NULL AUTO_INCREMENT,
 `nome` VARCHAR(255) DEFAULT NULL,
 `descricao` VARCHAR(255) DEFAULT NULL,
 PRIMARY KEY (`id`)
) ENGINE = innodb;




--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(220) NOT NULL,
  `email` varchar(520) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `situacoe_id` int(11) NOT NULL DEFAULT '0',
  `niveis_acesso_id` int(11) NOT NULL,
 
  PRIMARY KEY (`id`)
) ENGINE=InnoDB ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `situacoe_id`, `niveis_acesso_id`) VALUES
(1, 'Cesar Szpak', 'cesar@celke.com.br', '202cb962ac59075b964b07152d234b70', 1, 1),
(2, 'Kelly', 'kelly@celke.com.br', '202cb962ac59075b964b07152d234b70', 1, 2),
(3, 'Jessica', 'jessica@celke.com.br', '202cb962ac59075b964b07152d234b70', 1, 3),
(5, 'Marcia', 'marcia@celke.com.br', '831efa4c96023f4e602ebf86ca27a1d1', 1, 1),
(9, 'Celke', 'cesar@celke.com.br', '123', 2, 3),
(10, 'Celke', 'cesar@celke.com.br', '123', 2, 3);


-- --------------------------------------------------------

--
-- Estrutura da tabela `niveis_acessos`
--

CREATE TABLE IF NOT EXISTS `niveis_acessos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,

  PRIMARY KEY (`id`)
) ENGINE=InnoDB ;

--
-- Extraindo dados da tabela `niveis_acessos`
--

INSERT INTO `niveis_acessos` (`id`, `nome`) VALUES
(1, 'Administrador'),
(2, 'Colaborador'),
(3, 'Cliente');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */