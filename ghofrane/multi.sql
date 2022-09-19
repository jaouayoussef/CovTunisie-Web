-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 04 déc. 2020 à 21:45
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `multi`
--

-- --------------------------------------------------------

--
-- Structure de la table `livreurr`
--

DROP TABLE IF EXISTS `livreurr`;
CREATE TABLE IF NOT EXISTS `livreurr` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cin` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `dispo` varchar(255) NOT NULL,
  `secteur` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `date_naiss` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `num_permis` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `livreurr`
--

INSERT INTO `livreurr` (`id`, `cin`, `login`, `nom`, `prenom`, `dispo`, `secteur`, `tel`, `date_naiss`, `mail`, `adresse`, `num_permis`) VALUES
(6, '98900919', '1', '1', '1', '1', '1', '1', '2001-02-03', '1', '1', '1');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `datecreation` varchar(255) NOT NULL,
  `etat` varchar(255) NOT NULL DEFAULT 'en_cours',
  `dateDeTest` varchar(255) NOT NULL,
  `clinique` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
