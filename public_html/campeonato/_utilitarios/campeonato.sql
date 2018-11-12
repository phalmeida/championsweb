-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 01-Mar-2016 às 22:39
-- Versão do servidor: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `campeonato`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `campeonato`
--

CREATE TABLE IF NOT EXISTS `campeonato` (
`id_campeonato` int(11) NOT NULL,
  `nome_campeonato` varchar(100) DEFAULT NULL,
  `date_campeonato` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `campeonato`
--

INSERT INTO `campeonato` (`id_campeonato`, `nome_campeonato`, `date_campeonato`) VALUES
(1, 'Game ADAV', '2016-03-01');

-- --------------------------------------------------------

--
-- Estrutura da tabela `jogadores`
--

CREATE TABLE IF NOT EXISTS `jogadores` (
`id_jogadores` int(11) NOT NULL,
  `nome_jogadores` varchar(100) DEFAULT NULL,
  `foto_jogadores` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `jogadores`
--

INSERT INTO `jogadores` (`id_jogadores`, `nome_jogadores`, `foto_jogadores`) VALUES
(1, 'ALLAN', NULL),
(2, 'REGÍS', NULL),
(3, 'JAIME', NULL),
(4, 'PH', NULL),
(5, 'EDSON', NULL),
(6, 'FELIPINHO', NULL),
(7, 'KALEBE', NULL),
(8, 'EMANUEL', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `jogadores_campeonato`
--

CREATE TABLE IF NOT EXISTS `jogadores_campeonato` (
`id_jogadores_campeonato` int(11) NOT NULL,
  `id_jogadores` int(11) DEFAULT '0',
  `pontos` int(2) DEFAULT '0',
  `jogos` int(2) DEFAULT '0',
  `vitoria` int(2) DEFAULT '0',
  `empate` int(2) DEFAULT '0',
  `derrota` int(2) DEFAULT '0',
  `gp` int(2) DEFAULT '0',
  `gc` int(2) DEFAULT '0',
  `sg` int(2) DEFAULT '0',
  `id_campeonato` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `jogadores_campeonato`
--

INSERT INTO `jogadores_campeonato` (`id_jogadores_campeonato`, `id_jogadores`, `pontos`, `jogos`, `vitoria`, `empate`, `derrota`, `gp`, `gc`, `sg`, `id_campeonato`) VALUES
(1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1),
(2, 5, 0, 0, 0, 0, 0, 0, 0, 0, 1),
(3, 8, 0, 0, 0, 0, 0, 0, 0, 0, 1),
(4, 6, 0, 0, 0, 0, 0, 0, 0, 0, 1),
(5, 3, 0, 0, 0, 0, 0, 0, 0, 0, 1),
(6, 7, 0, 0, 0, 0, 0, 0, 0, 0, 1),
(7, 4, 0, 0, 0, 0, 0, 0, 0, 0, 1),
(8, 2, 0, 0, 0, 0, 0, 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `jogadores_partidadas`
--

CREATE TABLE IF NOT EXISTS `jogadores_partidadas` (
`id_jogadores_partidadas` int(11) NOT NULL,
  `id_jogadores_1` int(11) DEFAULT NULL,
  `nome_time_1` varchar(45) DEFAULT NULL,
  `num_gols_jogador_1` int(2) DEFAULT NULL,
  `id_jogadores_2` int(11) DEFAULT NULL,
  `nome_time_2` varchar(45) DEFAULT NULL,
  `num_gols_jogador_2` int(2) DEFAULT NULL,
  `num_partida` int(2) DEFAULT NULL,
  `rodada` int(2) DEFAULT NULL,
  `turno` int(2) DEFAULT NULL,
  `num_jogo` int(2) DEFAULT NULL,
  `id_campeonato` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `jogadores_partidadas`
--

INSERT INTO `jogadores_partidadas` (`id_jogadores_partidadas`, `id_jogadores_1`, `nome_time_1`, `num_gols_jogador_1`, `id_jogadores_2`, `nome_time_2`, `num_gols_jogador_2`, `num_partida`, `rodada`, `turno`, `num_jogo`, `id_campeonato`) VALUES
(1, 1, 'Zenit', NULL, 2, 'Inter de Milão', NULL, 1, 1, 1, 1, 1),
(2, 5, 'Everton', NULL, 3, 'Milan', NULL, 1, 1, 1, 2, 1),
(3, 6, 'Lazio', NULL, 4, 'Zenit', NULL, 1, 1, 1, 3, 1),
(4, 8, 'Benfica', NULL, 7, 'Chelsea', NULL, 1, 1, 1, 4, 1),
(5, 6, 'Atl. Madrid', NULL, 3, 'AS Monaco', NULL, 1, 2, 1, 5, 1),
(6, 1, 'Palermo', NULL, 8, 'Liverpool', NULL, 1, 2, 1, 6, 1),
(7, 4, 'Real Madrid', NULL, 2, 'Parma', NULL, 1, 2, 1, 7, 1),
(8, 5, 'AS Monaco', NULL, 7, 'Fiorentina', NULL, 1, 2, 1, 8, 1),
(9, 3, 'Atl. Madrid', NULL, 2, 'Arsenal', NULL, 1, 3, 1, 9, 1),
(10, 6, 'Palermo', NULL, 7, 'AS Monaco', NULL, 1, 3, 1, 10, 1),
(11, 1, 'Atl. Madrid', NULL, 5, 'Palermo', NULL, 1, 3, 1, 11, 1),
(12, 8, 'Lazio', NULL, 4, 'Atl. Madrid', NULL, 1, 3, 1, 12, 1),
(13, 8, 'Chelsea', NULL, 3, 'Zenit', NULL, 1, 4, 1, 13, 1),
(14, 7, 'Atl. Madrid', NULL, 2, 'Bayer', NULL, 1, 4, 1, 14, 1),
(15, 5, 'Lazio', NULL, 6, 'Inter de Milão', NULL, 1, 4, 1, 15, 1),
(16, 1, 'Barcelona', NULL, 4, 'Arsenal', NULL, 1, 4, 1, 16, 1),
(17, 8, 'Bayer', NULL, 2, 'Palermo', NULL, 1, 5, 1, 17, 1),
(18, 3, 'Chelsea', NULL, 7, 'Everton', NULL, 1, 5, 1, 18, 1),
(19, 5, 'Roma', NULL, 4, 'Lazio', NULL, 1, 5, 1, 19, 1),
(20, 1, 'Fiorentina', NULL, 6, 'Everton', NULL, 1, 5, 1, 20, 1),
(21, 6, 'Roma', NULL, 2, 'Atl. Madrid', NULL, 1, 6, 1, 21, 1),
(22, 3, 'Everton', NULL, 4, 'Sevilla', NULL, 1, 6, 1, 22, 1),
(23, 1, 'Roma', NULL, 7, 'Juventus', NULL, 1, 6, 1, 23, 1),
(24, 5, 'Atl. Madrid', NULL, 8, 'AS Monaco', NULL, 1, 6, 1, 24, 1),
(25, 8, 'Liverpool', NULL, 6, 'Inter de Milão', NULL, 1, 7, 1, 25, 1),
(26, 7, 'Atl. Madrid', NULL, 4, 'Sevilla', NULL, 1, 7, 1, 26, 1),
(27, 1, 'Palermo', NULL, 3, 'Atl. Madrid', NULL, 1, 7, 1, 27, 1),
(28, 5, 'Chelsea', NULL, 2, 'Palermo', NULL, 1, 7, 1, 28, 1),
(29, 1, 'Fiorentina', NULL, 2, 'Arsenal', NULL, 1, 8, 2, 29, 1),
(30, 5, 'Lazio', NULL, 3, 'Zenit', NULL, 1, 8, 2, 30, 1),
(31, 6, 'Palermo', NULL, 4, 'Atl. Madrid', NULL, 1, 8, 2, 31, 1),
(32, 8, 'Bayer', NULL, 7, 'Atl. Madrid', NULL, 1, 8, 2, 32, 1),
(33, 6, 'Inter de Milão', NULL, 3, 'Milan', NULL, 1, 9, 2, 33, 1),
(34, 1, 'Roma', NULL, 8, 'Liverpool', NULL, 1, 9, 2, 34, 1),
(35, 4, 'Real Madrid', NULL, 2, 'Inter de Milão', NULL, 1, 9, 2, 35, 1),
(36, 5, 'Chelsea', NULL, 7, 'AS Monaco', NULL, 1, 9, 2, 36, 1),
(37, 3, 'Everton', NULL, 2, 'Bayer', NULL, 1, 10, 2, 37, 1),
(38, 6, 'Everton', NULL, 7, 'Fiorentina', NULL, 1, 10, 2, 38, 1),
(39, 1, 'Atl. Madrid', NULL, 5, 'Everton', NULL, 1, 10, 2, 39, 1),
(40, 8, 'Chelsea', NULL, 4, 'Arsenal', NULL, 1, 10, 2, 40, 1),
(41, 8, 'AS Monaco', NULL, 3, 'Atl. Madrid', NULL, 1, 11, 2, 41, 1),
(42, 7, 'Chelsea', NULL, 2, 'Parma', NULL, 1, 11, 2, 42, 1),
(43, 5, 'Lazio', NULL, 6, 'Atl. Madrid', NULL, 1, 11, 2, 43, 1),
(44, 1, 'Barcelona', NULL, 4, 'Sevilla', NULL, 1, 11, 2, 44, 1),
(45, 8, 'Benfica', NULL, 2, 'Palermo', NULL, 1, 12, 2, 45, 1),
(46, 3, 'AS Monaco', NULL, 7, 'Everton', NULL, 1, 12, 2, 46, 1),
(47, 5, 'AS Monaco', NULL, 4, 'Zenit', NULL, 1, 12, 2, 47, 1),
(48, 1, 'Zenit', NULL, 6, 'Roma', NULL, 1, 12, 2, 48, 1),
(49, 6, 'Lazio', NULL, 2, 'Atl. Madrid', NULL, 1, 13, 2, 49, 1),
(50, 3, 'Chelsea', NULL, 4, 'Lazio', NULL, 1, 13, 2, 50, 1),
(51, 1, 'Palermo', NULL, 7, 'Juventus', NULL, 1, 13, 2, 51, 1),
(52, 5, 'Roma', NULL, 8, 'Lazio', NULL, 1, 13, 2, 52, 1),
(53, 8, 'Chelsea', NULL, 6, 'Everton', NULL, 1, 14, 2, 53, 1),
(54, 7, 'Everton', NULL, 4, 'Atl. Madrid', NULL, 1, 14, 2, 54, 1),
(55, 1, 'Roma', NULL, 3, 'Milan', NULL, 1, 14, 2, 55, 1),
(56, 5, 'Atl. Madrid', NULL, 2, 'Arsenal', NULL, 1, 14, 2, 56, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `jogador_times`
--

CREATE TABLE IF NOT EXISTS `jogador_times` (
`id` int(11) NOT NULL,
  `id_jogadores` int(11) DEFAULT NULL,
  `id_times` int(11) DEFAULT NULL,
  `aux` char(1) DEFAULT 'F'
) ENGINE=InnoDB AUTO_INCREMENT=207 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `jogador_times`
--

INSERT INTO `jogador_times` (`id`, `id_jogadores`, `id_times`, `aux`) VALUES
(85, 8, 7, 'F'),
(86, 8, 28, 'F'),
(87, 8, 27, 'F'),
(88, 8, 2, 'F'),
(89, 8, 13, 'F'),
(90, 8, 4, 'F'),
(120, 2, 1, 'F'),
(121, 2, 19, 'F'),
(122, 2, 28, 'F'),
(123, 2, 11, 'F'),
(124, 2, 16, 'F'),
(125, 2, 17, 'F'),
(144, 5, 7, 'F'),
(145, 5, 19, 'F'),
(146, 5, 2, 'F'),
(147, 5, 3, 'F'),
(148, 5, 13, 'F'),
(149, 5, 16, 'F'),
(150, 5, 18, 'F'),
(159, 6, 19, 'F'),
(160, 6, 3, 'F'),
(161, 6, 11, 'F'),
(162, 6, 13, 'F'),
(163, 6, 16, 'F'),
(164, 6, 18, 'F'),
(170, 3, 7, 'F'),
(171, 3, 19, 'F'),
(172, 3, 2, 'F'),
(173, 3, 3, 'F'),
(174, 3, 14, 'F'),
(175, 3, 31, 'F'),
(176, 7, 7, 'F'),
(177, 7, 19, 'F'),
(178, 7, 2, 'F'),
(179, 7, 3, 'F'),
(180, 7, 9, 'F'),
(181, 7, 12, 'F'),
(195, 4, 1, 'F'),
(196, 4, 19, 'F'),
(197, 4, 13, 'F'),
(198, 4, 21, 'F'),
(199, 4, 23, 'F'),
(200, 4, 31, 'F'),
(201, 1, 19, 'F'),
(202, 1, 20, 'F'),
(203, 1, 9, 'F'),
(204, 1, 16, 'F'),
(205, 1, 18, 'F'),
(206, 1, 31, 'F');

-- --------------------------------------------------------

--
-- Estrutura da tabela `times`
--

CREATE TABLE IF NOT EXISTS `times` (
`id_times` int(11) NOT NULL,
  `nome_time` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `times`
--

INSERT INTO `times` (`id_times`, `nome_time`) VALUES
(1, 'Arsenal'),
(2, 'Chelsea'),
(3, 'Everton'),
(4, 'Liverpool'),
(5, 'Man. City'),
(6, 'Man. United'),
(7, 'AS Monaco'),
(8, 'PSG'),
(9, 'Fiorentina'),
(10, 'Genoa'),
(11, 'Inter de Milão'),
(12, 'Juventus'),
(13, 'Lazio'),
(14, 'Milan'),
(15, 'Napoli'),
(16, 'Palermo'),
(17, 'Parma'),
(18, 'Roma'),
(19, 'Atl. Madrid'),
(20, 'Barcelona'),
(21, 'Real Madrid'),
(22, 'Real Sociedad'),
(23, 'Sevilla'),
(24, 'Valencia'),
(25, 'Villareal'),
(26, 'Porto'),
(27, 'Benfica'),
(28, 'Bayer'),
(29, 'Schalke 04'),
(30, 'Shakhtar Donetsk'),
(31, 'Zenit'),
(32, 'Galatasaray'),
(33, 'Boca Juniors');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
`id_usuario` int(11) NOT NULL,
  `usuario` varchar(11) COLLATE utf8_bin NOT NULL,
  `senha_usuario` varchar(250) COLLATE utf8_bin NOT NULL,
  `session_usuario` varchar(80) COLLATE utf8_bin NOT NULL,
  `permissao_usuario` int(1) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `usuario`, `senha_usuario`, `session_usuario`, `permissao_usuario`) VALUES
(1, 'Admin', '$2a$08$2sGQinTFe3GF/YqAYQ66auL9o6HeFCQryHdqUDvuEVN0J1vdhimii', 'lt5ahupj53mbmobie86d17oi20', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `campeonato`
--
ALTER TABLE `campeonato`
 ADD PRIMARY KEY (`id_campeonato`);

--
-- Indexes for table `jogadores`
--
ALTER TABLE `jogadores`
 ADD PRIMARY KEY (`id_jogadores`);

--
-- Indexes for table `jogadores_campeonato`
--
ALTER TABLE `jogadores_campeonato`
 ADD PRIMARY KEY (`id_jogadores_campeonato`), ADD KEY `fk_jogadores_campeonato_campeonato1_idx` (`id_campeonato`), ADD KEY `fk_jogadores_campeonato_jogadores1_idx` (`id_jogadores`);

--
-- Indexes for table `jogadores_partidadas`
--
ALTER TABLE `jogadores_partidadas`
 ADD PRIMARY KEY (`id_jogadores_partidadas`), ADD KEY `fk_jogadores_partidadas_jogadores1_idx` (`id_jogadores_1`), ADD KEY `fk_jogadores_partidadas_jogadores2_idx` (`id_jogadores_2`), ADD KEY `fk_jogadores_partidadas_campeonato1_idx` (`id_campeonato`);

--
-- Indexes for table `jogador_times`
--
ALTER TABLE `jogador_times`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_jogador_times_jogadores_idx` (`id_jogadores`), ADD KEY `fk_jogador_times_times1_idx` (`id_times`);

--
-- Indexes for table `times`
--
ALTER TABLE `times`
 ADD PRIMARY KEY (`id_times`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `campeonato`
--
ALTER TABLE `campeonato`
MODIFY `id_campeonato` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `jogadores`
--
ALTER TABLE `jogadores`
MODIFY `id_jogadores` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `jogadores_campeonato`
--
ALTER TABLE `jogadores_campeonato`
MODIFY `id_jogadores_campeonato` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `jogadores_partidadas`
--
ALTER TABLE `jogadores_partidadas`
MODIFY `id_jogadores_partidadas` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `jogador_times`
--
ALTER TABLE `jogador_times`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=207;
--
-- AUTO_INCREMENT for table `times`
--
ALTER TABLE `times`
MODIFY `id_times` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `jogadores_campeonato`
--
ALTER TABLE `jogadores_campeonato`
ADD CONSTRAINT `fk_jogadores_campeonato_campeonato1` FOREIGN KEY (`id_campeonato`) REFERENCES `campeonato` (`id_campeonato`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_jogadores_campeonato_jogadores1` FOREIGN KEY (`id_jogadores`) REFERENCES `jogadores` (`id_jogadores`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `jogadores_partidadas`
--
ALTER TABLE `jogadores_partidadas`
ADD CONSTRAINT `fk_jogadores_partidadas_campeonato1` FOREIGN KEY (`id_campeonato`) REFERENCES `campeonato` (`id_campeonato`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_jogadores_partidadas_jogadores1` FOREIGN KEY (`id_jogadores_1`) REFERENCES `jogadores` (`id_jogadores`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_jogadores_partidadas_jogadores2` FOREIGN KEY (`id_jogadores_2`) REFERENCES `jogadores` (`id_jogadores`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `jogador_times`
--
ALTER TABLE `jogador_times`
ADD CONSTRAINT `fk_jogador_times_jogadores` FOREIGN KEY (`id_jogadores`) REFERENCES `jogadores` (`id_jogadores`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_jogador_times_times1` FOREIGN KEY (`id_times`) REFERENCES `times` (`id_times`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
