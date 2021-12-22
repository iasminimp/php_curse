-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 22-Dez-2021 às 20:44
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
-- Estrutura da tabela `sts_abouts_companies`
--

DROP TABLE IF EXISTS `sts_abouts_companies`;
CREATE TABLE IF NOT EXISTS `sts_abouts_companies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_about` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_about` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sts_situation_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sts_situation_id` (`sts_situation_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `sts_abouts_companies`
--

INSERT INTO `sts_abouts_companies` (`id`, `title`, `description_about`, `image_about`, `sts_situation_id`, `created`, `modified`) VALUES
(1, 'Sobre a empresa - Titulo 1', 'Sobre a empresa - texto de descrição', 'detalhes_servico.jpg', 1, '2021-12-10 12:03:19', NULL),
(2, 'Sobre a empresa - Titulo 2', 'Sobre a empresa - texto de descrição', 'detalhes_servico.jpg', 1, '2021-12-10 12:04:17', NULL),
(3, 'Sobre a empresa - Titulo 3', 'Sobre a empresa - texto de descrição', 'detalhes_servico.jpg', 2, '2021-12-10 12:04:17', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sts_contacts`
--

DROP TABLE IF EXISTS `sts_contacts`;
CREATE TABLE IF NOT EXISTS `sts_contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title_opening_hours` varchar(220) CHARACTER SET utf8 NOT NULL,
  `opening_hours` varchar(220) CHARACTER SET utf8 NOT NULL,
  `title_address` varchar(220) CHARACTER SET utf8 NOT NULL,
  `address_one` varchar(220) CHARACTER SET utf8 NOT NULL,
  `address_two` varchar(220) CHARACTER SET utf8 NOT NULL,
  `phone` varchar(220) CHARACTER SET utf8 NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `sts_contacts`
--

INSERT INTO `sts_contacts` (`id`, `title_opening_hours`, `opening_hours`, `title_address`, `address_one`, `address_two`, `phone`, `created`, `modified`) VALUES
(1, 'Entre em contato', 'Segunda a Sexta: 08:30 as 12;00 e 13:30 as 18:00', 'Endereço', 'Avenida Oceano Atlantico, 636', 'São Mateus - ES', '(XX) X.XXXX-XXXX', '2021-12-13 08:57:59', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sts_contacts_msgs`
--

DROP TABLE IF EXISTS `sts_contacts_msgs`;
CREATE TABLE IF NOT EXISTS `sts_contacts_msgs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sts_sits_conts_msg_id` int(11) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sts_sits_conts_msg_id` (`sts_sits_conts_msg_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `sts_contacts_msgs`
--

INSERT INTO `sts_contacts_msgs` (`id`, `name`, `email`, `subject`, `content`, `sts_sits_conts_msg_id`, `created`, `modified`) VALUES
(1, 'iasmin', 'iasmin@gmail.com', 'alo', 'wewew', 1, '2021-12-13 11:34:28', NULL),
(2, 'iasmin', 'iasmin@gmail.com', 'assunto - 123', ' sdshaduh adsad hauhau mensagem ', 1, '2021-12-13 11:35:00', NULL),
(3, 'iasmin marques', 'iasminimp7@gmail.com', 'asssunto - materia', 'mesagem hello, bitches', 1, '2021-12-13 11:38:31', NULL),
(4, 'iasmin', 'iasmin@gmail.com', 'assunto - 123', ' sdshaduh adsad hauhau mensagem ', 1, '2021-12-13 12:05:52', NULL),
(5, 'iasmin', 'iasmin@gmail.com', 'assunto - 123', ' sdshaduh adsad hauhau mensagem ', 1, '2021-12-13 12:06:48', NULL),
(6, 'antonio verturine', 'antonio@email.com', 'teste final ', ' AAAAAAAAAAAAAAAAAAAAA AAAAAAAAAAAA', 1, '2021-12-16 11:40:40', NULL),
(7, 'antonio verturine', 'antonio@email.com', 'teste final ', ' AAAAAAAAAAAAAAAAAAAAA AAAAAAAAAAAA', 1, '2021-12-16 11:41:21', NULL),
(8, 'antonio verturine', 'antonio@email.com', 'teste final ', 'asddddddddddaddada', 1, '2021-12-16 11:41:30', NULL),
(9, 'antonio verturine', 'antonio@email.com', 'teste final', 'asddddddddddaddada', 1, '2021-12-16 11:48:53', NULL),
(10, 'celke', 'celke@gmail.com', 'teste - celke', 'asd a sduhausd asdkamdk', 1, '2021-12-16 12:02:38', NULL),
(11, 'celke 2', 'celke@gmail.com', 'assunto', 'ConteÃ­do $%#@@_^~', 1, '2021-12-16 12:03:40', NULL),
(12, 'celke', 'celke@gmail.com', 'Ã£ssunto', 'conteÃºdo asda ^`!@@#23$%', 1, '2021-12-16 12:04:17', NULL),
(13, 'celke3', 'celke@gmail.com', 'assunto 12', 'conteÃºdo', 1, '2021-12-16 12:06:41', NULL),
(14, 'celke3', 'celke@gmail.com', 'assunto 12', 'conteÃºdo', 1, '2021-12-16 12:17:41', NULL),
(15, 'celke3', 'celke@gmail.com', 'assunto 12', 'conteÃºdo', 1, '2021-12-16 12:30:13', NULL),
(16, 'ernanda', 'nanda@gmail.com', '123', 'adsd adadas das', 1, '2021-12-21 14:44:14', NULL),
(17, 'ernanda', 'nanda@gmail.com', '123', 'adsd adadas das', 1, '2021-12-21 14:48:30', NULL),
(18, 'farles', 'farles@gmail.com', 'farles - assunto', '123456789', 1, '2021-12-21 14:49:14', NULL),
(19, 'fabinho', 'fabio123@gmail.com', 'asdad', 'sdsd', 1, '2021-12-22 17:31:14', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sts_footer`
--

DROP TABLE IF EXISTS `sts_footer`;
CREATE TABLE IF NOT EXISTS `sts_footer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title_site` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_contact` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `endereco_footer` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `endereco_url` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cnpj_footer` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cnpj_url` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_redes` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text_rede_um` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_rede_um` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text_rede_dois` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_rede_dois` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text_rede_tres` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_rede_tres` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text_rede_quatro` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_rede_quatro` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `sts_footer`
--

INSERT INTO `sts_footer` (`id`, `title_site`, `title_contact`, `phone`, `endereco_footer`, `endereco_url`, `cnpj_footer`, `cnpj_url`, `title_redes`, `text_rede_um`, `link_rede_um`, `text_rede_dois`, `link_rede_dois`, `text_rede_tres`, `link_rede_tres`, `text_rede_quatro`, `link_rede_quatro`, `created`, `modified`) VALUES
(1, 'titulo site', 'contato', '(27) 999090753', 'rua 08 N 34 - cohab', 'url endereco', '000 000 000 000 000', 'url - cnpj', 'redes sociais', 'T1 redes sociais', 'Link 1 redes sociais', 'T2 redes sociais', 'Link 2 redes sociais', 'T3 redes sociais', 'Link 3 redes sociais', 'T4 redes sociais', 'Link 4 redes sociais', '2021-12-21 16:30:21', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sts_footers`
--

DROP TABLE IF EXISTS `sts_footers`;
CREATE TABLE IF NOT EXISTS `sts_footers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title_site` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_contact` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_footer` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url_adress` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cnpj` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url_cnpj` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_social_networks` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `txt_one_social_networks` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_one_social_networks` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `txt_two_social_networks` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_two_social_networks` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `txt_three_social_networks` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_three_social_networks` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `txt_four_social_networks` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_four_social_networks` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `title_action` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle_action` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_action` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_btn_action` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `txt_btn_action` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_action` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `title_det` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle_det` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_det` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_dets` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `title_serv` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_serv` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icone_um_serv` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `titulo_um_serv` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_um_serv` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icone_dois_serv` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `titulo_dois_serv` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_dois_serv` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icone_tres_serv` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `titulo_tres_serv` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_tres_serv` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `sts_homes_servs`
--

INSERT INTO `sts_homes_servs` (`id`, `title_serv`, `description_serv`, `icone_um_serv`, `titulo_um_serv`, `description_um_serv`, `icone_dois_serv`, `titulo_dois_serv`, `description_dois_serv`, `icone_tres_serv`, `titulo_tres_serv`, `description_tres_serv`, `created`, `modified`) VALUES
(1, 'titulo serviço', 'descrição do serviço', 'fas fa-map-marked-alt', ' título - serviço 1', 'descrição do serviço 1', 'fas fa-map-marked-alt', ' título - serviço 2', 'descrição do serviço 2', 'fas fa-map-marked-alt', ' título - serviço 3', 'descrição do serviço 3', '2021-12-06 18:02:16', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sts_homes_tops`
--

DROP TABLE IF EXISTS `sts_homes_tops`;
CREATE TABLE IF NOT EXISTS `sts_homes_tops` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title_top` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_top` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_btn_top` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `txt_btn_top` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_top` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `sts_homes_tops`
--

INSERT INTO `sts_homes_tops` (`id`, `title_top`, `description_top`, `link_btn_top`, `txt_btn_top`, `image_top`, `created`, `modified`) VALUES
(1, 'Titulo Top', 'descricao top.', 'link do botao', 'texto botao', 'image', '2021-12-08 11:01:44', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sts_pages`
--

DROP TABLE IF EXISTS `sts_pages`;
CREATE TABLE IF NOT EXISTS `sts_pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_page` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_page` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `sts_pages`
--

INSERT INTO `sts_pages` (`id`, `name_page`, `title_page`, `descricao`, `created`, `modified`) VALUES
(1, 'home', 'home - iasmin', 'site sobre ...', '2021-12-22 09:29:56', NULL),
(2, 'contato', 'contato- iasmin', 'página sobre a empresa...', '2021-12-22 09:29:56', NULL),
(3, 'sobre', 'sobre - iasmin', 'pagina de contato com a empresa ...', '2021-12-22 09:29:56', NULL),
(4, '404', 'pagina nao encontrada - iasmin', 'pagina não encontrada', '2021-12-22 09:34:18', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sts_rodape`
--

DROP TABLE IF EXISTS `sts_rodape`;
CREATE TABLE IF NOT EXISTS `sts_rodape` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title_site` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagem_rodape` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contato_rodape` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_rodape` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_redes_rodape` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_rede_um` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text_rede_um` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_rede_dois` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text_rede_dois` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `sts_rodape`
--

INSERT INTO `sts_rodape` (`id`, `title_site`, `imagem_rodape`, `contato_rodape`, `phone_rodape`, `title_redes_rodape`, `title_rede_um`, `text_rede_um`, `title_rede_dois`, `text_rede_dois`, `created`, `modified`) VALUES
(1, 'titulo site', 'imagem rodape .png', 'contato', '(xx) x.xxxx - xxxx', 'titulo redes', 'rede 1 - title', 'rede 1 - text', 'rede 2 - title', 'rede 2 - text', '2021-12-22 08:25:46', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sts_sits_conts_msgs`
--

DROP TABLE IF EXISTS `sts_sits_conts_msgs`;
CREATE TABLE IF NOT EXISTS `sts_sits_conts_msgs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `sts_sits_conts_msgs`
--

INSERT INTO `sts_sits_conts_msgs` (`id`, `name`, `created`, `modified`) VALUES
(1, 'pendente', '2021-12-13 10:46:10', NULL),
(2, 'respondida\r\n', '2021-12-13 10:46:10', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sts_situations`
--

DROP TABLE IF EXISTS `sts_situations`;
CREATE TABLE IF NOT EXISTS `sts_situations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `sts_situations`
--

INSERT INTO `sts_situations` (`id`, `name`, `created`, `modified`) VALUES
(1, 'Ativo', '2021-12-10 12:14:24', NULL),
(2, 'Inativo', '2021-12-10 12:14:24', NULL);

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `sts_abouts_companies`
--
ALTER TABLE `sts_abouts_companies`
  ADD CONSTRAINT `sts_abouts_companies_ibfk_1` FOREIGN KEY (`sts_situation_id`) REFERENCES `sts_situations` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `sts_contacts_msgs`
--
ALTER TABLE `sts_contacts_msgs`
  ADD CONSTRAINT `sts_contacts_msgs_ibfk_1` FOREIGN KEY (`sts_sits_conts_msg_id`) REFERENCES `sts_sits_conts_msgs` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
