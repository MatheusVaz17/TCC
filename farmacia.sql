-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 28-Abr-2020 às 19:54
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
-- Estrutura da tabela `produto`
--

CREATE TABLE IF NOT EXISTS `produto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `nome` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `valor` decimal(10,1) NOT NULL,
  `disponibilidade` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `foto` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id`, `tipo`, `nome`, `valor`, `disponibilidade`, `foto`) VALUES
(19, 'Medicamento', 'Ibupofeno', '15.0', 'Disponivel', 'ab62c4804082d9f2392c2b76679ea0b6.jpg'),
(20, 'Medicamento', 'Paracetamol', '12.0', 'Disponivel', '4d7e5d20432d42cc4ce61da73554a811.jpg'),
(21, 'Medicamento', 'Multigrip', '12.0', 'Disponivel', 'a2b6b2a32a1459592df6eab08a8dae2e.jpg'),
(22, 'Medicamento', 'Aspirina', '10.0', 'Disponivel', '1fc3f7a4572239c5e44912301aa8ca89webp'),
(24, 'Medicamento', 'Dorflex', '14.0', 'Disponivel', 'da8742d4773fb46d00d63aa4ac3b2df3webp'),
(25, 'Higiene', 'Cotonete', '5.0', 'Disponivel', '36662c743a67565ffde0097df2adefb4webp'),
(27, 'Higiene', 'Shampoo Dove', '10.0', 'Disponivel', 'a1f8f4b4c756c999307d0fa157072a29webp'),
(28, 'Higiene', 'Listerine', '8.0', 'Disponivel', 'bf17e657f58c82bf245d85ecd5aba183webp'),
(29, 'Higiene', 'Sabonete Dove', '4.0', 'Disponivel', '609c1a010e7eeb6318c8777c211de531webp'),
(30, 'Higiene', 'LenÃ§o', '8.0', 'Disponivel', '2f7b8ae8d8c15f02ad79cb9de880c7dawebp'),
(31, 'Higiene', 'Escova de dente', '13.0', 'Disponivel', '327ce018e6945419a1e1c64b30bb6782jpeg'),
(39, 'Medicamento', 'Eno', '5.0', 'Disponivel', '2345cbe73a19e3e213186323b263a520.jpg'),
(40, 'Higiene', 'Desodorante Nivea', '5.8', 'Disponivel', 'd937af8d4a8919b7796bdad6438be113webp'),
(41, 'Higiene', 'Sabonete Sensi', '3.0', 'Disponivel', '9684ecbec34a4cd29786fb6bd76286f0webp'),
(42, 'Medicamento', 'Engov', '5.0', 'Disponivel', '2e236b22ba1a0b226558591acb66db33.jpg'),
(43, 'Higiene', 'Fralda', '30.0', 'Disponivel', 'f4b123722a39ddaed201d0337a2140c5webp'),
(44, 'Medicamento', 'Xarope vick', '30.0', 'Disponivel', 'cfabe3d5a1a21684d5e36e3ee82b6dd8webp');

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `sobrenome`, `email`, `cpf`, `celular`, `senha`, `sexo`, `cep`, `dataNascimento`) VALUES
(1, 'Matheus', 'Flores', 'matheusvaz765@gmail.com', '042.074.940-30', '(55) 99126-5637', 'testesenha', 'Masculino', '97513-230', '2002-06-02'),
(2, 'Nome', 'Sobrenome', 'matheusvaz765@gmail.com', '111.111.111-11', '(55) 55555-5555', 'senhasenha', 'Masculino', '33333-333', '2002-06-02'),
(3, 'Mauricio', 'Flores', 'mauriciovaz@gmail.com', '343.473.437', '(77) 77777-7777', 'awdsadwadasd', 'Masculino', '38732-623', '2002-06-02'),
(4, 'Mauricio', 'Flores', 'mauriciovaz698@gmail.com', '042.075.040-10', '(55) 99112-2198', 'timmaia', 'Masculino', '97513-230', '2002-06-02');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
