-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 16-Jul-2020 às 05:42
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

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
  `nome` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `preco` decimal(10,1) NOT NULL,
  `quantidade` int(4) NOT NULL,
  `valor` decimal(10,1) NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE IF NOT EXISTS `produto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `nome` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `valor` decimal(10,1) NOT NULL,
  `disponibilidade` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `foto` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `informacao` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `indicacao` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `beneficio` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `modo` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `recomendacao` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `sobrenome`, `email`, `cpf`, `celular`, `senha`, `sexo`, `cep`, `dataNascimento`, `foto`) VALUES
(0, 'administrador', 'adm', 'farmacia@farmacia.com', '000.000.000-00', '(00)00000-0000', 'administrador00', 'masculino', '00000-000', '2020-06-30', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
