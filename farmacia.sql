-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 15-Dez-2020 às 21:50
-- Versão do servidor: 5.6.17
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `farmacia`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `carrinho`
--

CREATE TABLE IF NOT EXISTS `carrinho` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `valor` decimal(10,2) NOT NULL,
  `idusuario` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_usuario` (`idusuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagamentos`
--

CREATE TABLE IF NOT EXISTS `pagamentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idusuario` int(11) NOT NULL,
  `pedido` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `data` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `produtos` text COLLATE utf8_unicode_ci NOT NULL,
  `quantidade` int(10) NOT NULL,
  `valor` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_usuario_pagamento` (`idusuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE IF NOT EXISTS `produto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idtipo` int(11) NOT NULL,
  `nome` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `disponibilidade` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `foto` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `informacao` text COLLATE utf8_unicode_ci NOT NULL,
  `indicacao` text COLLATE utf8_unicode_ci NOT NULL,
  `beneficio` text COLLATE utf8_unicode_ci NOT NULL,
  `modo` text COLLATE utf8_unicode_ci NOT NULL,
  `recomendacao` text COLLATE utf8_unicode_ci NOT NULL,
  `quantidade` int(200) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tipo` (`idtipo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto_carrinho`
--

CREATE TABLE IF NOT EXISTS `produto_carrinho` (
  `id` int(11) NOT NULL,
  `idcarrinho` int(11) NOT NULL,
  `idproduto` int(11) NOT NULL,
  `quantidade` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_carrinho_has_produto_carrinho1` (`idcarrinho`),
  KEY `fk_carrinho_has_produto_produto1` (`idproduto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto_pedido`
--

CREATE TABLE IF NOT EXISTS `produto_pedido` (
  `id` int(11) NOT NULL,
  `idpagamento` int(11) NOT NULL,
  `idproduto` int(11) NOT NULL,
  `valor` decimal(10,2) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pedido_has_produto_pedido1` (`idpagamento`),
  KEY `fk_pedido_has_produto_produto1` (`idproduto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo`
--

CREATE TABLE IF NOT EXISTS `tipo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `tipo`
--

INSERT INTO `tipo` (`id`, `nome`) VALUES
(1, 'Medicamento'),
(2, 'Higiene'),
(3, 'Dermocosmeticos'),
(4, 'Suplementos'),
(5, 'Alimentos'),
(6, 'outro'),
(7, 'teste');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `sobrenome` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cpf` varchar(14) COLLATE utf8_unicode_ci NOT NULL,
  `celular` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sexo` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `cep` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `dataNascimento` date NOT NULL,
  `foto` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `numcasa` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `endereco` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `sobrenome`, `email`, `cpf`, `celular`, `senha`, `sexo`, `cep`, `dataNascimento`, `foto`, `numcasa`, `endereco`) VALUES
(1, '', '', 'farmacia@farmacia.com', '', '', 'administrador00', '', '', '0000-00-00', '', '', '');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `carrinho`
--
ALTER TABLE `carrinho`
  ADD CONSTRAINT `fk_usuario` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`id`);

--
-- Limitadores para a tabela `pagamentos`
--
ALTER TABLE `pagamentos`
  ADD CONSTRAINT `fk_usuario_pagamento` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`id`);

--
-- Limitadores para a tabela `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `fk_tipo` FOREIGN KEY (`idtipo`) REFERENCES `tipo` (`id`);

--
-- Limitadores para a tabela `produto_carrinho`
--
ALTER TABLE `produto_carrinho`
  ADD CONSTRAINT `fk_carrinho_has_produto_carrinho1` FOREIGN KEY (`idcarrinho`) REFERENCES `carrinho` (`id`),
  ADD CONSTRAINT `fk_carrinho_has_produto_produto1` FOREIGN KEY (`idproduto`) REFERENCES `produto` (`id`);

--
-- Limitadores para a tabela `produto_pedido`
--
ALTER TABLE `produto_pedido`
  ADD CONSTRAINT `fk_pedido_has_produto_pedido1` FOREIGN KEY (`idpagamento`) REFERENCES `pagamentos` (`id`),
  ADD CONSTRAINT `fk_pedido_has_produto_produto1` FOREIGN KEY (`idproduto`) REFERENCES `produto` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
