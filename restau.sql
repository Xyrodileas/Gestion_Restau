-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 13 Juin 2014 à 15:45
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `restau`
--

-- --------------------------------------------------------

--
-- Structure de la table `restaurant`
--

CREATE TABLE IF NOT EXISTS `restaurant` (
  `idrestaurant` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `specialite` varchar(150) NOT NULL,
  `idproprietaire` int(11) NOT NULL,
  `idrestaurateur` int(11) NOT NULL,
  `adresse` text NOT NULL,
  PRIMARY KEY (`idrestaurant`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `restaurant`
--

INSERT INTO `restaurant` (`idrestaurant`, `nom`, `description`, `specialite`, `idproprietaire`, `idrestaurateur`, `adresse`) VALUES
(1, 'Restau Italien', 'Specialite italiennes', 'Pates', 2, 1, '29 A rue blulard'),
(2, 'Schartz', 'Smoked meat sandwich !', 'Viande fumee', 1, 1, 'St Laurant'),
(3, 'Odaki', 'Sushi sushi sushi !', '', 3, 2, 'Atwater street');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `mdp` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rang` int(11) NOT NULL DEFAULT '0',
  `telephone` int(11) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `datenaissance` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`nom`, `prenom`, `mdp`, `email`, `id`, `rang`, `telephone`, `adresse`, `datenaissance`) VALUES
('Marshall', 'Antho', '4df3c3f68fcc83b27e9d42c90431a72499f17875c81a599b566c9889b9696703', 'gjfkdl@ggfd.com', 1, 0, 0, '', '0000-00-00'),
('xyro', 'alz', 'fjklj', 'fjdslkj', 2, 0, 0, '', '0000-00-00'),
('Bob', 'Razovsky', '4df3c3f68fcc83b27e9d42c90431a72499f17875c81a599b566c9889b9696703', 'bla@bla.com', 3, 0, 0, '', '0000-00-00'),
('bla', 'bla', '4df3c3f68fcc83b27e9d42c90431a72499f17875c81a599b566c9889b9696703', 'bla@bla.com', 4, 0, 0, '', '0000-00-00'),
('Alexis', 'Vuillaume', '4df3c3f68fcc83b27e9d42c90431a72499f17875c81a599b566c9889b9696703', 'pop3@pop.com', 26, 3, 0, '', '0000-00-00'),
('Salut', 'Salut', '4df3c3f68fcc83b27e9d42c90431a72499f17875c81a599b566c9889b9696703', 'pop3@pop.com', 27, 0, 0, '', '0000-00-00'),
('Vuillaume', 'Alexis', '4df3c3f68fcc83b27e9d42c90431a72499f17875c81a599b566c9889b9696703', 'bla@blabla.com', 28, 0, 54487448, '1114 rue du fort', '1993-11-12'),
('azerry', 'azerty', '4df3c3f68fcc83b27e9d42c90431a72499f17875c81a599b566c9889b9696703', 'azerty@azerty.com', 29, 0, 54487448, 'azerty', '1993-11-12'),
('azerty', 'azerty', '4df3c3f68fcc83b27e9d42c90431a72499f17875c81a599b566c9889b9696703', 'test@test.t', 30, 0, 554, 'Eco', '0000-00-00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
