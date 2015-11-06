-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2+deb7u1
-- http://www.phpmyadmin.net
--

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
--
--

-- --------------------------------------------------------

--
-- Structure de la table `Client_Compagnie`
--

CREATE TABLE IF NOT EXISTS `Client_Compagnie` (
  `Cli_id` int(11) NOT NULL,
  `Com_id` int(11) NOT NULL,
  PRIMARY KEY (`Cli_id`,`Com_id`),
  KEY `FK_association1` (`Com_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Client_Compagnie`
--

INSERT INTO `Client_Compagnie` (`Cli_id`, `Com_id`) VALUES
(1, 2),
(2, 3);

-- --------------------------------------------------------

--
-- Structure de la table `Conteneur`
--

CREATE TABLE IF NOT EXISTS `Conteneur` (
  `Com_id` int(11) NOT NULL,
  `Nav_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `Cli_id` int(11) DEFAULT NULL,
  `evp` int(11) DEFAULT NULL,
  PRIMARY KEY (`Com_id`,`Nav_id`,`id`),
  KEY `FK_association7` (`Cli_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Conteneur`
--

INSERT INTO `Conteneur` (`Com_id`, `Nav_id`, `id`, `Cli_id`, `evp`) VALUES
(2, 0, 0, 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `Escale`
--

CREATE TABLE IF NOT EXISTS `Escale` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Com_id` int(11) DEFAULT NULL,
  `Nav_id` int(11) DEFAULT NULL,
  `dateEntree` int(11) DEFAULT NULL,
  `dateSortie` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_association8` (`Com_id`,`Nav_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `Escale`
--

INSERT INTO `Escale` (`id`, `Com_id`, `Nav_id`, `dateEntree`, `dateSortie`) VALUES
(3, 2, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `Mouvement`
--

CREATE TABLE IF NOT EXISTS `Mouvement` (
  `Com_id` int(11) NOT NULL,
  `Nav_id` int(11) NOT NULL,
  `Con_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `Esc_id` int(11) DEFAULT NULL,
  `chargement` int(11) DEFAULT NULL,
  PRIMARY KEY (`Com_id`,`Nav_id`,`Con_id`,`id`),
  KEY `FK_association6` (`Esc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Mouvement`
--

INSERT INTO `Mouvement` (`Com_id`, `Nav_id`, `Con_id`, `id`, `Esc_id`, `chargement`) VALUES
(2, 0, 0, 0, 3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `Navire`
--

CREATE TABLE IF NOT EXISTS `Navire` (
  `Com_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  PRIMARY KEY (`Com_id`,`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Navire`
--

INSERT INTO `Navire` (`Com_id`, `id`) VALUES
(2, 0),
(2, 12),
(3, 2),
(3, 3),
(3, 4),
(3, 14),
(3, 16),
(3, 17),
(16, 5),
(16, 13),
(16, 15),
(16, 20),
(17, 11),
(19, 6),
(19, 7),
(19, 8),
(19, 9),
(19, 10),
(19, 18),
(25, 19);

-- --------------------------------------------------------

--
-- Structure de la table `Navire_Conteneur`
--

CREATE TABLE IF NOT EXISTS `Navire_Conteneur` (
  `idNavire` int(11) NOT NULL,
  `idConteneur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Personne`
--

CREATE TABLE IF NOT EXISTS `Personne` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mdp` varchar(254) DEFAULT NULL,
  `email` varchar(254) DEFAULT NULL,
  `personneTypeId` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Contenu de la table `Personne`
--

INSERT INTO `Personne` (`id`, `mdp`, `email`, `personneTypeId`) VALUES
(1, 'df4789443cdc4d5e2d478c2eb33bb3449612337b50072203ccb3ce7ac5f48115', 'kocal@live.fr', 3),
(2, '5090f0cd1bb6e87db17535b9177bda58376a2be2b2a9f3eae8976fdc9f897b12', 'arnaud@arnaud.com', 3),
(3, '1e383305eb887c3c041fc5e14afd326567e92d7dbecdcc1536d55f1d840f9e77', 'thekocallive@gmail.com', 3),
(10, 'df4789443cdc4d5e2d478c2eb33bb3449612337b50072203ccb3ce7ac5f48115', 'test@lol.fr', 3),
(13, 'df4789443cdc4d5e2d478c2eb33bb3449612337b50072203ccb3ce7ac5f48115', 'compagnie@test.fr', 2),
(16, 'df4789443cdc4d5e2d478c2eb33bb3449612337b50072203ccb3ce7ac5f48115', 'compagnie@test.fr', 2),
(17, 'df4789443cdc4d5e2d478c2eb33bb3449612337b50072203ccb3ce7ac5f48115', 'compagnie@test.fr', 2),
(18, 'df4789443cdc4d5e2d478c2eb33bb3449612337b50072203ccb3ce7ac5f48115', 'compagnie@test.fr', 2),
(19, 'df4789443cdc4d5e2d478c2eb33bb3449612337b50072203ccb3ce7ac5f48115', 'compagnie@test.fr', 2),
(20, 'df4789443cdc4d5e2d478c2eb33bb3449612337b50072203ccb3ce7ac5f48115', 'compagnie@test.fr', 2),
(21, 'df4789443cdc4d5e2d478c2eb33bb3449612337b50072203ccb3ce7ac5f48115', 'compagnie@test.fr', 2),
(22, 'df4789443cdc4d5e2d478c2eb33bb3449612337b50072203ccb3ce7ac5f48115', 'qdqsd@lol.fr', 2),
(23, '68ce1040d2c03a70f302e1ae8c66fae0dd9e2e848a5d8b5e32d1e8f90daba5f8', '', 2),
(24, 'df4789443cdc4d5e2d478c2eb33bb3449612337b50072203ccb3ce7ac5f48115', 'test@abc.fr', 2),
(25, '04bbd3705919c24be42a7e320b0f89abde191ba8d4cae35e48c3d8a1826e8f80', 'embraser01@gmail.com', 3),
(27, '68ce1040d2c03a70f302e1ae8c66fae0dd9e2e848a5d8b5e32d1e8f90daba5f8', NULL, 2),
(28, '68ce1040d2c03a70f302e1ae8c66fae0dd9e2e848a5d8b5e32d1e8f90daba5f8', NULL, 2),
(29, '68ce1040d2c03a70f302e1ae8c66fae0dd9e2e848a5d8b5e32d1e8f90daba5f8', NULL, 2),
(30, '68ce1040d2c03a70f302e1ae8c66fae0dd9e2e848a5d8b5e32d1e8f90daba5f8', NULL, 2),
(31, '68ce1040d2c03a70f302e1ae8c66fae0dd9e2e848a5d8b5e32d1e8f90daba5f8', '', 2),
(32, '68ce1040d2c03a70f302e1ae8c66fae0dd9e2e848a5d8b5e32d1e8f90daba5f8', '', 2),
(33, '68ce1040d2c03a70f302e1ae8c66fae0dd9e2e848a5d8b5e32d1e8f90daba5f8', '', 2),
(34, '68ce1040d2c03a70f302e1ae8c66fae0dd9e2e848a5d8b5e32d1e8f90daba5f8', '', 2),
(35, '68ce1040d2c03a70f302e1ae8c66fae0dd9e2e848a5d8b5e32d1e8f90daba5f8', '', 2),
(36, '2043a305b9dff6cc14e41258680f06969b442e07de3d4a9ac3a8b881ad9c9b44', 'toto', 3),
(37, '1010d7a6db6a1e2f48727dd4f574d439421090af20e74ddefda0746ced7735c3', 'titi', 3),
(38, '4828574016249be4cd38285a8bc04362a178d63c0b5dade58b73cdc1c2f424f7', 'totocompagnie@gmail.com', 2),
(39, '1010d7a6db6a1e2f48727dd4f574d439421090af20e74ddefda0746ced7735c3', 'titiclient@gmail.com', 2),
(40, '6bf3d8d1b1ea4b9f4e558f62fc99b14530c0b4941db2cb364c18a3a38012a4e4', 'asandolo3@gmail.com', 3),
(41, '6bf3d8d1b1ea4b9f4e558f62fc99b14530c0b4941db2cb364c18a3a38012a4e4', 'asandolo3@gmail.com', 2);

-- --------------------------------------------------------

--
-- Structure de la table `PersonneTypes`
--

CREATE TABLE IF NOT EXISTS `PersonneTypes` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `type` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `PersonneTypes`
--

INSERT INTO `PersonneTypes` (`id`, `type`) VALUES
(1, 'Client'),
(2, 'CompagnieMaritime'),
(3, 'AgentPortuaire');

-- --------------------------------------------------------

--
-- Structure de la table `Personne_AgentPortuaire`
--

CREATE TABLE IF NOT EXISTS `Personne_AgentPortuaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `Personne_Client`
--

CREATE TABLE IF NOT EXISTS `Personne_Client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `personne_id` int(2) NOT NULL,
  `nom` varchar(254) CHARACTER SET latin1 DEFAULT NULL,
  `adresse` varchar(254) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `Personne_Client`
--

INSERT INTO `Personne_Client` (`id`, `personne_id`, `nom`, `adresse`) VALUES
(1, 0, 'Remy Laville', '15, quartier du poulet'),
(2, 0, 'Jackie Chan', '784, Chinatown');

-- --------------------------------------------------------

--
-- Structure de la table `Personne_CompagnieMaritime`
--

CREATE TABLE IF NOT EXISTS `Personne_CompagnieMaritime` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `personne_id` int(2) NOT NULL,
  `nom` varchar(254) DEFAULT NULL,
  `adresse` varchar(254) DEFAULT NULL,
  `pays` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Contenu de la table `Personne_CompagnieMaritime`
--

INSERT INTO `Personne_CompagnieMaritime` (`id`, `personne_id`, `nom`, `adresse`, `pays`) VALUES
(2, 0, 'Preve Corporation', '3, Allée des potes', 'Madagascar'),
(3, 0, 'Bateaux Le Poidevin', '8, quai des dindons', 'France'),
(16, 21, 'Toast', '12 rue des babouins', 'République Démocratique du Congo'),
(17, 22, 'blblbl', 'etsdlkqslk', 'lkqsjdlkqsjd'),
(19, 24, 'Compagnie', 'banane', 'FRANCE '),
(20, 0, 'what', 'il n''est pas top', 'oulalala'),
(21, 27, NULL, NULL, NULL),
(22, 28, 'test', 'test', 'test'),
(23, 29, NULL, NULL, NULL),
(24, 30, NULL, NULL, NULL),
(25, 31, '', '', '');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `Client_Compagnie`
--
ALTER TABLE `Client_Compagnie`
  ADD CONSTRAINT `FK_association1` FOREIGN KEY (`Cli_id`) REFERENCES `Personne_Client` (`id`);

--
-- Contraintes pour la table `Conteneur`
--
ALTER TABLE `Conteneur`
  ADD CONSTRAINT `FK_association3` FOREIGN KEY (`Com_id`, `Nav_id`) REFERENCES `Navire` (`Com_id`, `id`),
  ADD CONSTRAINT `FK_association7` FOREIGN KEY (`Cli_id`) REFERENCES `Personne_Client` (`id`);

--
-- Contraintes pour la table `Escale`
--
ALTER TABLE `Escale`
  ADD CONSTRAINT `FK_association8` FOREIGN KEY (`Com_id`, `Nav_id`) REFERENCES `Navire` (`Com_id`, `id`);

--
-- Contraintes pour la table `Mouvement`
--
ALTER TABLE `Mouvement`
  ADD CONSTRAINT `FK_association4` FOREIGN KEY (`Com_id`, `Nav_id`, `Con_id`) REFERENCES `Conteneur` (`Com_id`, `Nav_id`, `id`),
  ADD CONSTRAINT `FK_association6` FOREIGN KEY (`Esc_id`) REFERENCES `Escale` (`id`);

--
-- Contraintes pour la table `Navire`
--
ALTER TABLE `Navire`
  ADD CONSTRAINT `FK_association2` FOREIGN KEY (`Com_id`) REFERENCES `Personne_CompagnieMaritime` (`id`);

--
-- Contraintes pour la table `Personne_AgentPortuaire`
--
ALTER TABLE `Personne_AgentPortuaire`
  ADD CONSTRAINT `FK_Generalisation_3` FOREIGN KEY (`id`) REFERENCES `Personne` (`id`);

--
-- Contraintes pour la table `Personne_Client`
--
ALTER TABLE `Personne_Client`
  ADD CONSTRAINT `FK_Generalisation_1` FOREIGN KEY (`id`) REFERENCES `Personne` (`id`);

--
-- Contraintes pour la table `Personne_CompagnieMaritime`
--
ALTER TABLE `Personne_CompagnieMaritime`
  ADD CONSTRAINT `FK_Generalisation_2` FOREIGN KEY (`id`) REFERENCES `Personne` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
