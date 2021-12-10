-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 08-Dez-2021 às 15:41
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
-- Banco de dados: `i4smin`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `sts_footers`
--

DROP TABLE IF EXISTS `sts_footers`;
CREATE TABLE IF NOT EXISTS `sts_footers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title_site` varchar(45) NOT NULL,
  `title_contact` varchar(45) NOT NULL,
  `phone` varchar(45) NOT NULL,
  `address_footer` varchar(220) NOT NULL,
  `url_adress` varchar(220) NOT NULL,
  `cnpj` varchar(220) NOT NULL,
  `url_cnpj` varchar(220) NOT NULL,
  `title_social_networks` varchar(220) NOT NULL,
  `txt_one_social_networks` varchar(45) NOT NULL,
  `link_one_social_networks` varchar(220) NOT NULL,
  `txt_two_social_networks` varchar(45) NOT NULL,
  `link_two_social_networks` varchar(220) NOT NULL,
  `txt_three_social_networks` varchar(45) NOT NULL,
  `link_three_social_networks` varchar(220) NOT NULL,
  `txt_four_social_networks` varchar(45) NOT NULL,
  `link_four_social_networks` varchar(220) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `sts_footers`
--

INSERT INTO `sts_footers` (`id`, `title_site`, `title_contact`, `phone`, `address_footer`, `url_adress`, `cnpj`, `url_cnpj`, `title_social_networks`, `txt_one_social_networks`, `link_one_social_networks`, `txt_two_social_networks`, `link_two_social_networks`, `txt_three_social_networks`, `link_three_social_networks`, `txt_four_social_networks`, `link_four_social_networks`, `created`, `modified`) VALUES
(1, 'titulo site', 'titulo contato', 'telefone aqui', 'endereço - rua 08, n 34', 'url do endereco', '12345789789 - cnpj', 'url do cnpj', 'titulo - social midia', 'titulo 1 - social midia', 'texto 1 - social midia', 'titulo 2 - social midia', 'texto 2 - social midia', 'titulo 3 - social midia', 'texto 3 - social midia', 'titulo 4 - social midia', 'texto 4 - social midia', '2021-12-08 11:21:52', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sts_homes_actions`
--

DROP TABLE IF EXISTS `sts_homes_actions`;
CREATE TABLE IF NOT EXISTS `sts_homes_actions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title_action` varchar(220) NOT NULL,
  `subtitle_action` varchar(220) NOT NULL,
  `description_action` varchar(220) NOT NULL,
  `link_btn_action` varchar(220) NOT NULL,
  `txt_btn_action` varchar(45) NOT NULL,
  `image_action` varchar(220) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `sts_homes_actions`
--

INSERT INTO `sts_homes_actions` (`id`, `title_action`, `subtitle_action`, `description_action`, `link_btn_action`, `txt_btn_action`, `image_action`, `created`, `modified`) VALUES
(1, 'titulo da acao', 'subtitulo da acao', 'descricao da acao', 'link da acao ', 'testo botao - acao', 'image', '2021-12-08 11:12:40', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sts_homes_dets`
--

DROP TABLE IF EXISTS `sts_homes_dets`;
CREATE TABLE IF NOT EXISTS `sts_homes_dets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title_det` varchar(220) NOT NULL,
  `subtitle_det` varchar(220) NOT NULL,
  `description_det` varchar(220) NOT NULL,
  `image_dets` varchar(220) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `sts_homes_dets`
--

INSERT INTO `sts_homes_dets` (`id`, `title_det`, `subtitle_det`, `description_det`, `image_dets`, `created`, `modified`) VALUES
(1, 'titulo det', 'subtitulo det', 'descricao det', 'image det', '2021-12-08 11:13:35', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sts_homes_servs`
--

DROP TABLE IF EXISTS `sts_homes_servs`;
CREATE TABLE IF NOT EXISTS `sts_homes_servs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title_serv` varchar(220) NOT NULL,
  `description_serv` varchar(220) NOT NULL,
  `icone_um_serv` varchar(45) NOT NULL,
  `titulo_um_serv` varchar(45) NOT NULL,
  `description_um_serv` varchar(220) NOT NULL,
  `icone_dois_serv` varchar(45) NOT NULL,
  `titulo_dois_serv` varchar(45) NOT NULL,
  `description_dois_serv` varchar(220) NOT NULL,
  `icone_tres_serv` varchar(45) NOT NULL,
  `titulo_tres_serv` varchar(45) NOT NULL,
  `description_tres_serv` varchar(220) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `sts_homes_servs`
--

INSERT INTO `sts_homes_servs` (`id`, `title_serv`, `description_serv`, `icone_um_serv`, `titulo_um_serv`, `description_um_serv`, `icone_dois_serv`, `titulo_dois_serv`, `description_dois_serv`, `icone_tres_serv`, `titulo_tres_serv`, `description_tres_serv`, `created`, `modified`) VALUES
(1, 'titulo serviço', 'descrição do serviço', 'icone - serviço 1', ' título - serviço 1', 'descrição do serviço 1', 'icone - serviço 2', ' título - serviço 2', 'descrição do serviço 2', 'icone - serviço 3', ' título - serviço 3', 'descrição do serviço 3', '2021-12-06 18:02:16', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sts_homes_tops`
--

DROP TABLE IF EXISTS `sts_homes_tops`;
CREATE TABLE IF NOT EXISTS `sts_homes_tops` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title_top` varchar(220) NOT NULL,
  `description_top` varchar(220) NOT NULL,
  `link_btn_top` varchar(220) NOT NULL,
  `txt_btn_top` varchar(45) NOT NULL,
  `image_top` varchar(220) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `sts_homes_tops`
--

INSERT INTO `sts_homes_tops` (`id`, `title_top`, `description_top`, `link_btn_top`, `txt_btn_top`, `image_top`, `created`, `modified`) VALUES
(1, 'Titulo Top', 'descricao top.', 'link do botao', 'texto botao', 'image', '2021-12-08 11:01:44', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
