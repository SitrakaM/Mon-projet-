-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 23 oct. 2023 à 05:29
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `digitaldistrict`
--

-- --------------------------------------------------------

--
-- Structure de la table `administration`
--

DROP TABLE IF EXISTS `administration`;
CREATE TABLE IF NOT EXISTS `administration` (
  `Fokontany` varchar(100) NOT NULL,
  `Faritra` varchar(100) NOT NULL,
  `Kaody` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `administration`
--

INSERT INTO `administration` (`Fokontany`, `Faritra`, `Kaody`) VALUES
('Andranomanalina Isotry', 'Analamanga', 'azamanambanyrasta');

-- --------------------------------------------------------

--
-- Structure de la table `historique`
--

DROP TABLE IF EXISTS `historique`;
CREATE TABLE IF NOT EXISTS `historique` (
  `id_historique` int(255) NOT NULL AUTO_INCREMENT,
  `action` varchar(100) NOT NULL,
  `date` varchar(20) NOT NULL,
  `heure` varchar(20) NOT NULL,
  PRIMARY KEY (`id_historique`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `historique`
--

INSERT INTO `historique` (`id_historique`, `action`, `date`, `heure`) VALUES
(1, 'Fisokafan\'ny rindrin-kajy', '2023-10-22', '17:19:25'),
(2, 'Nampidirina tao anaty lisitra i RANDRIAMAHEFARIVO Sandratriniaina Tsiaro Julio', '2023-10-22', '17:21:33'),
(3, 'Fisokafan\'ny rindrin-kajy', '2023-10-23', '08:19:14');

-- --------------------------------------------------------

--
-- Structure de la table `mere`
--

DROP TABLE IF EXISTS `mere`;
CREATE TABLE IF NOT EXISTS `mere` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(120) NOT NULL,
  `Prof_mere` varchar(100) NOT NULL,
  `id_fils` int(3) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_Mere` (`id_fils`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `mere`
--

INSERT INTO `mere` (`id`, `Nom`, `Prof_mere`, `id_fils`) VALUES
(1, 'TENAINTSOA Mahefarivo Marie', 'Mpivarotra', 1);

-- --------------------------------------------------------

--
-- Structure de la table `pere`
--

DROP TABLE IF EXISTS `pere`;
CREATE TABLE IF NOT EXISTS `pere` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(120) NOT NULL,
  `Prof_pere` varchar(100) NOT NULL,
  `id_fils` int(3) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_fils` (`id_fils`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `pere`
--

INSERT INTO `pere` (`id`, `Nom`, `Prof_pere`, `id_fils`) VALUES
(1, 'RAMANAKOARIVO Eugène', 'Mpivarotra', 1);

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

DROP TABLE IF EXISTS `personne`;
CREATE TABLE IF NOT EXISTS `personne` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `Lastname` varchar(80) NOT NULL,
  `Firstname` varchar(80) NOT NULL,
  `Birthday` varchar(10) NOT NULL,
  `Birthplace` varchar(30) NOT NULL,
  `adress` varchar(50) NOT NULL,
  `CIN` varchar(15) NOT NULL,
  `Profession` varchar(100) NOT NULL,
  `Sexe` tinyint(1) NOT NULL,
  `Nationalite` varchar(10) NOT NULL DEFAULT 'MALAGASY',
  `Numero_carnet` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `personne`
--

INSERT INTO `personne` (`id`, `Lastname`, `Firstname`, `Birthday`, `Birthplace`, `adress`, `CIN`, `Profession`, `Sexe`, `Nationalite`, `Numero_carnet`) VALUES
(1, 'RANDRIAMAHEFARIVO', 'Sandratriniaina Tsiaro Julio', '22-08-2005', '67ha Sud', 'Lot B25 Andranomanalina Isotry', '', 'Mpianatra', 1, 'Malagasy', 'Tsiaro_Randriamahefarivo.jpg');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `mere`
--
ALTER TABLE `mere`
  ADD CONSTRAINT `mere_ibfk_1` FOREIGN KEY (`id_fils`) REFERENCES `personne` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `pere`
--
ALTER TABLE `pere`
  ADD CONSTRAINT `pere_ibfk_1` FOREIGN KEY (`id_fils`) REFERENCES `personne` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
