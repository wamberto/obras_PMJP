-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 15-Out-2014 às 10:51
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `obras`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_obras`
--

CREATE TABLE IF NOT EXISTS `tb_obras` (
  `id_obra` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `titulo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descricao` text COLLATE utf8_unicode_ci,
  `endereco` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contrato` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ordem` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `categoria` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `localidade` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `valor` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data_iniciio` date DEFAULT NULL,
  `previsao` date DEFAULT NULL,
  `percent_exec` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `situacao` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `empresa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `responsavel` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fonte de recursos` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bairros` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `orgaos envolvidos` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `demanda do OD` char(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `latitude` decimal(16,14) NOT NULL,
  `longitude` decimal(16,14) NOT NULL,
  `setor_publico` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `unidade` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `icone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_obra`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `tb_obras`
--

INSERT INTO `tb_obras` (`id_obra`, `tipo`, `titulo`, `descricao`, `endereco`, `contrato`, `ordem`, `categoria`, `localidade`, `valor`, `data_iniciio`, `previsao`, `percent_exec`, `situacao`, `empresa`, `responsavel`, `fonte de recursos`, `bairros`, `orgaos envolvidos`, `demanda do OD`, `latitude`, `longitude`, `setor_publico`, `unidade`, `icone`) VALUES
(1, 'Obra', 'Revitalização da Lagoa do Parque Solon de Lucena', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '20%', 'Em Andamento', NULL, NULL, NULL, 'Centro', NULL, NULL, '-7.12229450000000', '-34.87907229999996', NULL, NULL, 'http://www.joaopessoa.pb.gov.br/portal/wp-content/uploads/2014/09/meio.png'),
(2, 'Obra', 'Construção do Viaduto de Mangabeira', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '05%', 'Em Andamento', NULL, NULL, NULL, 'Mangabeira, Bancários', NULL, NULL, '-7.16148100000000', '-34.83832900000000', NULL, NULL, 'http://www.joaopessoa.pb.gov.br/portal/wp-content/uploads/2014/09/inicio.png');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
