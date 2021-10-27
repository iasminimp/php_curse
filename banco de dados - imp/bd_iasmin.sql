-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 27-Out-2021 às 13:35
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
-- Banco de dados: `bd_iasmin`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `enderecos`
--

DROP TABLE IF EXISTS `enderecos`;
CREATE TABLE IF NOT EXISTS `enderecos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `logradouro` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero` varchar(220) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bairro` varchar(220) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cidade` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `complemento` varchar(220) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `enderecos`
--

INSERT INTO `enderecos` (`id`, `logradouro`, `numero`, `bairro`, `cidade`, `complemento`, `user_id`, `created`, `modified`) VALUES
(1, 'Av. Winston Churchill', '936', 'Capão Raso', 'Curitiba', NULL, 1, '2021-10-25 08:44:37', NULL),
(3, 'Rua Marechal Deodoro', '630', 'Centro', 'Curitiba', NULL, 2, '2021-10-25 08:45:59', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `niveis_acessos`
--

DROP TABLE IF EXISTS `niveis_acessos`;
CREATE TABLE IF NOT EXISTS `niveis_acessos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `niveis_acessos`
--

INSERT INTO `niveis_acessos` (`id`, `nome`, `created`, `modified`) VALUES
(1, 'Super Administrador', '2021-10-27 09:52:07', NULL),
(2, 'Administrador', '2021-10-27 09:52:07', NULL),
(3, 'Aluno', '2021-10-27 09:52:51', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sits_users`
--

DROP TABLE IF EXISTS `sits_users`;
CREATE TABLE IF NOT EXISTS `sits_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `sits_users`
--

INSERT INTO `sits_users` (`id`, `nome`, `created`, `modified`) VALUES
(1, 'Ativo', '2021-10-26 09:14:46', NULL),
(2, 'Inativo', '2021-10-26 09:14:46', NULL),
(3, 'Aguardando Confirmação', '2021-10-26 09:14:46', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `telefones`
--

DROP TABLE IF EXISTS `telefones`;
CREATE TABLE IF NOT EXISTS `telefones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `celular` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(220) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `telefones`
--

INSERT INTO `telefones` (`id`, `celular`, `telefone`, `created`, `modified`, `user_id`) VALUES
(1, '(41) 98861-0440', '(41) 90000-0000', '2021-10-25 08:55:51', NULL, 1),
(2, '(41) 91111-1111', '(41) 92222-2222', '2021-10-25 08:56:44', NULL, 2),
(3, '27 999090753', '27 999090753', '2021-10-27 10:31:50', NULL, 3),
(4, '27 99990907854', '27 99990907854', '2021-10-27 10:31:50', NULL, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(220) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `senha` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sits_user_id` int(11) NOT NULL,
  `niveis_acesso_id` int(11) NOT NULL,
  `endereco` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `nome`, `email`, `senha`, `sits_user_id`, `niveis_acesso_id`, `endereco`, `telefone`, `created`, `modified`) VALUES
(1, 'Cesar', 'cesar@celke.com.br', '123456', 1, 1, 'Av. Winston Churchill, 936 - Capão Raso, Curitiba', '(41) 98861-0440 - (41) 90000-0000', '2020-04-23 00:00:00', NULL),
(2, 'Kelly', 'kelly@celk.com.br', '123456', 2, 2, 'Rua Marechal Deodoro, 630 - Centro, Curitiba', '(41) 91111-1111 - (41) 92222-2222', '2020-04-23 00:00:00', NULL),
(3, 'Jessica', 'jessica@email.com.br', '123456', 2, 3, 'Av. Winston Churchill, 936 - Capão Raso, Curitiba', '(41) 98861-0440 - (41) 90000-0000', '2021-10-26 09:17:17', NULL),
(4, 'Marcos', 'marcos@email.com.br', '123456', 3, 3, 'Av. Winston Churchill, 936 - Capão Raso, Curitiba', '(41) 98861-0440 - (41) 90000-0000', '2021-10-26 09:17:17', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
