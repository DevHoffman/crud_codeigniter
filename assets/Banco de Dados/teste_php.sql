-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 28-Maio-2021 às 22:45
-- Versão do servidor: 5.7.31
-- versão do PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `teste_php`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_logs`
--

DROP TABLE IF EXISTS `tbl_logs`;
CREATE TABLE IF NOT EXISTS `tbl_logs` (
  `CodiLog` int(11) NOT NULL AUTO_INCREMENT,
  `Log` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DataLog` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `CodiUsuario` int(10) NOT NULL,
  `Ip` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`CodiLog`),
  KEY `CodiUsuario_fk` (`CodiUsuario`)
) ENGINE=MyISAM AUTO_INCREMENT=73 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tbl_logs`
--

INSERT INTO `tbl_logs` (`CodiLog`, `Log`, `DataLog`, `CodiUsuario`, `Ip`) VALUES
(1, 'Usuário Autenticado', '2020-01-14 21:47:10', 50, '127.0.0.1'),
(2, 'Usuário Autenticado', '2020-01-14 22:11:09', 50, '127.0.0.1'),
(3, 'Usuário Autenticado', '2020-01-14 22:50:14', 50, '127.0.0.1'),
(4, 'Usuário Autenticado', '2020-01-15 09:23:48', 50, '127.0.0.1'),
(5, 'Usuário Autenticado', '2020-01-15 09:33:12', 50, '127.0.0.1'),
(6, 'Usuário Autenticado', '2020-01-15 12:12:43', 50, '127.0.0.1'),
(7, 'Usuário Autenticado', '2020-01-15 12:14:52', 50, '127.0.0.1'),
(8, 'Usuário Autenticado', '2020-01-15 12:23:04', 50, '127.0.0.1'),
(9, 'Usuário Autenticado', '2020-01-15 12:29:21', 50, '127.0.0.1'),
(10, 'Usuário Autenticado', '2020-01-15 12:32:39', 50, '127.0.0.1'),
(11, 'Usuário Autenticado', '2020-01-15 12:52:50', 50, '127.0.0.1'),
(12, 'Usuário Autenticado', '2020-01-15 18:14:47', 50, '127.0.0.1'),
(13, 'Usuário Autenticado', '2020-01-15 22:41:29', 50, '127.0.0.1'),
(14, 'Usuário Autenticado', '2020-01-16 08:58:05', 50, '127.0.0.1'),
(15, 'Usuário Autenticado', '2020-01-16 21:35:50', 50, '127.0.0.1'),
(16, 'Usuário Autenticado', '2020-01-16 21:52:20', 50, '127.0.0.1'),
(17, 'Usuário Autenticado', '2020-01-16 22:50:45', 50, '127.0.0.1'),
(18, 'Usuário Autenticado', '2020-01-17 08:38:43', 50, '127.0.0.1'),
(19, 'Usuário Autenticado', '2020-01-17 08:39:33', 50, '127.0.0.1'),
(20, 'Usuário Autenticado', '2020-01-17 08:39:57', 50, '127.0.0.1'),
(21, 'Usuário Autenticado', '2020-01-17 08:44:42', 50, '127.0.0.1'),
(22, 'Usuário Autenticado', '2020-01-17 09:17:26', 50, '127.0.0.1'),
(23, 'Usuário Autenticado', '2020-01-19 22:20:44', 68, '127.0.0.1'),
(24, 'Usuário Autenticado', '2020-01-20 15:50:29', 50, '127.0.0.1'),
(25, 'Usuário Autenticado', '2020-01-21 06:46:06', 50, '127.0.0.1'),
(26, 'Usuário Autenticado', '2020-01-21 11:31:47', 50, '127.0.0.1'),
(27, 'Usuário Autenticado', '2020-01-22 11:24:37', 50, '127.0.0.1'),
(28, 'Usuário Autenticado', '2020-01-22 12:18:15', 69, '127.0.0.1'),
(29, 'Usuário Autenticado', '2020-01-22 12:35:18', 70, '127.0.0.1'),
(30, 'Usuário Autenticado', '2020-01-22 13:54:00', 69, '127.0.0.1'),
(31, 'Usuário Autenticado', '2020-01-22 23:54:27', 69, '127.0.0.1'),
(32, 'Usuário Autenticado', '2020-01-23 09:06:43', 69, '127.0.0.1'),
(33, 'Usuário Autenticado', '2020-01-23 11:51:46', 83, '127.0.0.1'),
(34, 'Usuário Autenticado', '2020-01-23 11:52:28', 83, '127.0.0.1'),
(35, 'Usuário Autenticado', '2020-01-23 13:40:20', 69, '127.0.0.1'),
(36, 'Usuário Autenticado', '2020-01-23 15:44:26', 69, '::1'),
(37, 'Usuário Autenticado', '2020-01-23 15:45:07', 69, '::1'),
(38, 'Usuário Autenticado', '2020-01-23 15:45:55', 69, '::1'),
(39, 'Usuário Autenticado', '2020-01-23 23:51:28', 69, '::1'),
(40, 'Usuário Autenticado', '2020-01-24 11:20:26', 69, '::1'),
(41, 'Usuário Autenticado', '2020-01-24 16:04:52', 69, '::1'),
(42, 'Usuário Autenticado', '2020-01-25 12:56:39', 69, '::1'),
(43, 'Usuário Autenticado', '2020-01-25 15:22:53', 69, '::1'),
(44, 'Usuário Autenticado', '2020-01-26 14:52:48', 69, '::1'),
(45, 'Usuário Autenticado', '2020-01-26 18:02:58', 69, '::1'),
(46, 'Usuário Autenticado', '2020-01-26 19:28:10', 69, '::1'),
(47, 'Usuário Autenticado', '2020-01-27 00:10:50', 69, '::1'),
(48, 'Usuário Autenticado', '2020-01-27 12:57:25', 69, '::1'),
(49, 'Usuário Autenticado', '2020-01-27 21:56:15', 69, '::1'),
(50, 'Usuário Autenticado', '2020-01-28 12:38:11', 69, '::1'),
(51, 'Usuário Autenticado', '2021-05-26 18:05:54', 69, '::1'),
(52, 'Usuário Autenticado', '2021-05-26 18:09:30', 69, '::1'),
(53, 'Usuário Autenticado', '2021-05-26 18:15:43', 69, '::1'),
(54, 'Usuário Autenticado', '2021-05-26 18:18:33', 69, '::1'),
(55, 'Usuário Autenticado', '2021-05-26 19:04:10', 69, '::1'),
(56, 'Usuário Autenticado', '2021-05-26 19:04:54', 69, '::1'),
(57, 'Usuário Autenticado', '2021-05-26 19:07:12', 69, '::1'),
(58, 'Usuário Autenticado', '2021-05-26 19:27:42', 69, '::1'),
(59, 'Usuário Autenticado', '2021-05-26 19:28:51', 69, '::1'),
(60, 'Usuário Autenticado', '2021-05-26 21:21:55', 69, '::1'),
(61, 'Usuário Autenticado', '2021-05-26 21:23:57', 69, '::1'),
(62, 'Usuário Autenticado', '2021-05-28 09:26:15', 69, '::1'),
(63, 'Usuário Autenticado', '2021-05-28 11:44:13', 104, '::1'),
(64, 'Usuário Autenticado', '2021-05-28 12:41:36', 104, '::1'),
(65, 'Usuário Autenticado', '2021-05-28 12:43:37', 104, '::1'),
(66, 'Usuário Autenticado', '2021-05-28 12:45:27', 69, '::1'),
(67, 'Usuário Autenticado', '2021-05-28 12:45:58', 104, '::1'),
(68, 'Usuário Autenticado', '2021-05-28 13:52:18', 104, '::1'),
(69, 'Usuário Autenticado', '2021-05-28 14:07:35', 88, '::1'),
(70, 'Usuário Autenticado', '2021-05-28 14:07:35', 88, '::1'),
(71, 'Usuário Autenticado', '2021-05-28 14:18:48', 104, '::1'),
(72, 'Usuário Autenticado', '2021-05-28 14:23:23', 104, '::1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_nivelacesso`
--

DROP TABLE IF EXISTS `tbl_nivelacesso`;
CREATE TABLE IF NOT EXISTS `tbl_nivelacesso` (
  `CodiNivelAcesso` int(11) NOT NULL AUTO_INCREMENT,
  `NivelAcesso` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`CodiNivelAcesso`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tbl_nivelacesso`
--

INSERT INTO `tbl_nivelacesso` (`CodiNivelAcesso`, `NivelAcesso`) VALUES
(1, 'Administrador'),
(0, 'Usuário');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_usuarios`
--

DROP TABLE IF EXISTS `tbl_usuarios`;
CREATE TABLE IF NOT EXISTS `tbl_usuarios` (
  `CodiUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `Usuario` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Login` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Senha` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `CodiNivelAcesso` int(10) NOT NULL DEFAULT '2',
  `Foto` varchar(155) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'user.png',
  `Status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`CodiUsuario`),
  KEY `CodiNivelAcesso_fk` (`CodiNivelAcesso`)
) ENGINE=MyISAM AUTO_INCREMENT=112 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tbl_usuarios`
--

INSERT INTO `tbl_usuarios` (`CodiUsuario`, `Usuario`, `Login`, `Senha`, `Email`, `CodiNivelAcesso`, `Foto`, `Status`) VALUES
(69, 'Thyago Hoffman', 'hoffman', '$2y$10$4l0SJCP4b5AvD2XkDuv/deb5mQ3H7ibQAugYX2U6BBiUmX/Ozr/iK', 'thoffman1698@gmail.com', 1, 'user-04.jpg', 0),
(88, 'Teste', 'Teste', '$2y$10$4t/eEJGN/IZe3lJoGhtIbuKTGmXYw85ZH2s0DQ4RkO9OxRAG47mY2', 'teste@teste.com', 0, 'user.png', 0),
(104, 'Thyago Hoffman', 'thyago.hoffman', '$2y$10$BbYVj3/NojM0i3r2mp7Jeu2ocesIB6980kXDRZ2v0vR6kUVhIGnUq', 'thoffman1698@gmail.com', 1, 'IMG_20181023_191655539.jpg', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
