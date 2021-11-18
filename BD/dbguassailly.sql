-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 18 nov. 2021 à 19:04
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `dbguassailly`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `titre` varchar(500) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `site` varchar(500) NOT NULL,
  `heure` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`titre`, `description`, `site`, `heure`) VALUES
('TITRE DE OUF', 'DESC DE OUF!!\r\n', 'SITE DE OUF!', 18),
('ENCORENOUVEAUTITRE', 'test', 'test', 14),
('ENCORENOUVEAUTITRE', 'test', 'test', 14);

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `titre` varchar(500) NOT NULL,
  `description` varchar(500) NOT NULL,
  `lien` varchar(500) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`lien`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `news`
--

INSERT INTO `news` (`titre`, `description`, `lien`, `date`) VALUES
('TITRE1', 'DESC1', 'LIEN3', '2018-11-21'),
('TITRE2', 'DESC2', 'LIEN2', '2018-11-21');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
