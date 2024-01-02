-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 02 jan. 2024 à 14:34
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ent`
--

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `login` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_utilisateurs` int NOT NULL AUTO_INCREMENT,
  `mot_de_passe` varchar(255) NOT NULL,
  PRIMARY KEY (`id_utilisateurs`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`login`, `id_utilisateurs`, `mot_de_passe`) VALUES
('loana.chalach', 1, '$2y$10$1mhX1X9WpFmpqnfmVAYYc.NEUGAOl6fD2T/57w16GIqrWUCVKzSQO'),
('loana.chalach', 2, '$2y$10$KEtXbV1eHYYKraJo39HeouPDGxRB/I9L0SoecYxFPqJO1d783QXx.'),
('lolo', 3, '$2y$10$nQB2aG.qbFowrU.A1qbqbOo1J.UCWR3pmAvjh9U00UhUZ4hO8sV2u'),
('lolo', 4, '$2y$10$dILRNr2b86WMr3nwo/xMf.CDiuWpdrnrSFPzpP50VRihKR1U60VRO'),
('loanacha', 5, '$2y$10$3xWP6KntZaUWICjDoZ1yAuIgQDmsyUoVtbn3K9uDgHWjTTNYPW2B.'),
('alinaspicot@gmail.com', 6, '$2y$10$/q8TvQre1/VFWB5FQhkF1ObMYilYUkLezOPylxSHEDMZhM2r4Hg3W'),
('alinaspicot@gmail.com', 7, '$2y$10$b2oJw34seok5jQRhf7ylP.CEV8DkXYLAg.xDgkjTJKrDtwNhVPUHe'),
('alinaspicot@gmail.com', 8, '$2y$10$HQqF3ed/.ZH8EdyAs7YqaO3gEDdHm11n9DQScO9ywY7CIJQf18VWe');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
