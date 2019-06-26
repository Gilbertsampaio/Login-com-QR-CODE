-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: mysql.twi.com.br:3306
-- Tempo de Geração: 26/06/2019 às 17:24:55
-- Versão do Servidor: 5.6.14-log
-- Versão do PHP: 7.1.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `carlospilleradvb`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `sobrenome` varchar(255) NOT NULL,
  `nickname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `ddd` varchar(12) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `senha_descrypt` varchar(255) NOT NULL,
  `frase` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `login_status` tinyint(4) NOT NULL DEFAULT '0',
  `last_login` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=253 ;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `nome`, `sobrenome`, `nickname`, `email`, `ddd`, `telefone`, `senha`, `senha_descrypt`, `frase`, `foto`, `login_status`, `last_login`) VALUES
(251, 'Gilbert', 'Sampaio', 'Gilbert_12', 'gilbert@hotmail.com', '96', '991119111', '09f5fa9573b6f367fc2e6264ad28a2a3b6514d8f', 'gmos7380', 'Toda Semente plantada nos dá direito a uma colheita.', 'gilbert.jpg', 0, '2019-06-24 16:45:09');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
