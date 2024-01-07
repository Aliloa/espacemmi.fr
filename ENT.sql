-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 07 jan. 2024 à 16:22
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
-- Structure de la table `abscence_retard`
--

DROP TABLE IF EXISTS `abscence_retard`;
CREATE TABLE IF NOT EXISTS `abscence_retard` (
  `id_abs` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `nombre` time NOT NULL,
  `cours` varchar(255) NOT NULL,
  PRIMARY KEY (`id_abs`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `abscence_retard`
--

INSERT INTO `abscence_retard` (`id_abs`, `titre`, `date`, `nombre`, `cours`) VALUES
(1, 'absence', '2023-12-13', '02:00:00', ''),
(2, 'absence', '2024-01-07', '02:00:00', '');

-- --------------------------------------------------------

--
-- Structure de la table `controle`
--

DROP TABLE IF EXISTS `controle`;
CREATE TABLE IF NOT EXISTS `controle` (
  `controle` varchar(255) NOT NULL,
  `id_controle` int NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `enseignant` varchar(255) NOT NULL,
  PRIMARY KEY (`id_controle`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `controle`
--

INSERT INTO `controle` (`controle`, `id_controle`, `date`, `enseignant`) VALUES
('Culture numérique', 4, '2024-01-09', 'Bilel Benbouzid'),
('Traitement de l\'information ', 5, '2023-11-13', 'Florence Bister'),
('Marketing', 6, '2024-01-25', 'Leyla Jaoued Abassi');

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

DROP TABLE IF EXISTS `cours`;
CREATE TABLE IF NOT EXISTS `cours` (
  `id_cours` int NOT NULL AUTO_INCREMENT,
  `cours` varchar(50) NOT NULL,
  `prof` varchar(50) NOT NULL,
  `img` varchar(50) NOT NULL,
  PRIMARY KEY (`id_cours`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `cours`
--

INSERT INTO `cours` (`id_cours`, `cours`, `prof`, `img`) VALUES
(1, 'Protocole SAE 3.02', 'Renault Einpstein', 'img/1-dev.png'),
(2, 'Marketing POST 8890', 'Leyla Jaoued', 'img/1-comp.png'),
(3, 'Protocole Narratif Bande Son', 'Karim Pierrre Chabane', 'img/1-conc'),
(4, 'Display Grid', 'Gaelle Charpentier', 'img/1-dev.png'),
(5, 'Consigne production sonore', 'Tony Houziaux', 'img/1-conc');

-- --------------------------------------------------------

--
-- Structure de la table `crous`
--

DROP TABLE IF EXISTS `crous`;
CREATE TABLE IF NOT EXISTS `crous` (
  `id` int NOT NULL AUTO_INCREMENT,
  `entre` varchar(100) NOT NULL,
  `plat` varchar(100) NOT NULL,
  `dessert` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `image_plat` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `crous`
--

INSERT INTO `crous` (`id`, `entre`, `plat`, `dessert`, `date`, `image_plat`) VALUES
(2, 'Betterave cube, Salade sicillienne, Rillette', 'Poulet basquaise, Riz, Haricots verts', 'Varietés de yaourt, Fromage blanc, Salade fruits frais', '2023-12-24', 'https://i.pinimg.com/564x/9a/ae/48/9aae48129f83440cefa035f03591902e.jpg'),
(5, 'Salade de chèvre chaud, Carpaccio de boeuf, Velouté de potiron', 'Saumon grillé, Poulet rôti aux herbes, Risotto aux champignons', 'Tiramisu aux fraises, Fondant au chocolat, Crème brûlée à la vanille', '2023-12-25', 'https://i.pinimg.com/564x/2e/d9/cd/2ed9cd93457d912a5ee30828131f3aca.jpg'),
(6, 'Soupe de potiron, Ceviche de poisson', 'Poulet curry coco, Filet mignon aux champignons, Lasagnes végétariennes', 'Tarte aux pommes, Mousse au chocolat, Panna cotta aux fruits rouges, Fondue au chocolat avec fruits ', '2023-12-26', 'https://i.pinimg.com/564x/a5/81/56/a58156cbd213bb58cdc4d24160c6b2c9.jpg'),
(7, 'Carpaccio de saumon aux agrumes, Salade de chèvre chaud au miel', 'Filet de boeuf, Risotto aux champignons, Poulet rôti', 'Tiramisu aux fruits rouges, Crème brûlée à la vanille, Fondant au chocolat', '2023-12-30', 'https://img.cuisineaz.com/660x660/2017/09/04/i132139-risotto-aux-champignons-au-companion.jpeg'),
(8, 'Velouté de potiron à la crème fraîche, Bruschetta à la tomate et mozzarella', 'Pâtes carbonara, Magret de canard à l\'orange, Poisson en croûte d\'amandes', 'Mousse au chocolat noir, Tarte aux pommes caramélisées, Sorbet au citron', '2023-12-31', 'https://img.cuisineaz.com/1024x1024/2015/10/12/i6388-magret-de-canard-a-l-orange-au-miel.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `notes`
--

DROP TABLE IF EXISTS `notes`;
CREATE TABLE IF NOT EXISTS `notes` (
  `notes` varchar(255) NOT NULL,
  `id_note` int NOT NULL AUTO_INCREMENT,
  `matiere` varchar(255) NOT NULL,
  `professeur` varchar(255) NOT NULL,
  PRIMARY KEY (`id_note`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `notes`
--

INSERT INTO `notes` (`notes`, `id_note`, `matiere`, `professeur`) VALUES
('18', 1, 'Anglais', 'Alexandre Leroy'),
('12', 2, 'Représentation et Traitement de l\'information', 'Florence Bister'),
('9', 3, 'Gestion de projet', ''),
('10', 4, 'Ux design', ''),
('20', 5, 'Communication et rhétorique', ''),
('14', 6, 'Marketing', ''),
('12', 7, 'Intégration web', ''),
('8', 8, 'Développement web back', ''),
('17', 9, 'Anglais web', ''),
('8', 10, 'Droit', '');

-- --------------------------------------------------------

--
-- Structure de la table `travail_a_faire`
--

DROP TABLE IF EXISTS `travail_a_faire`;
CREATE TABLE IF NOT EXISTS `travail_a_faire` (
  `id_travail` int NOT NULL AUTO_INCREMENT,
  `travail` varchar(225) NOT NULL,
  `date` date NOT NULL,
  `enseignant` varchar(255) NOT NULL,
  PRIMARY KEY (`id_travail`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `travail_a_faire`
--

INSERT INTO `travail_a_faire` (`id_travail`, `travail`, `date`, `enseignant`) VALUES
(3, 'Miniblog', '2023-12-24', 'Renaud Epstein'),
(4, 'Tracking et motion design', '2023-12-22', 'Anne Tasso'),
(5, 'Campagne publicitaire', '2023-12-10', 'Frédéric Poisson'),
(6, 'Mockup ENT', '2023-11-22', 'Fatima Laoufi'),
(7, 'Note d’intention personnelle', '2024-01-12', 'Leyla Jaoued Abassi');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `login` varchar(100) NOT NULL,
  `nom` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `prenom` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_utilisateurs` int NOT NULL AUTO_INCREMENT,
  `mot_de_passe` varchar(255) NOT NULL,
  `photoprofil` text NOT NULL,
  `role` varchar(800) NOT NULL,
  `email` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `promotion` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `bio` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id_utilisateurs`),
  UNIQUE KEY `nom` (`nom`),
  UNIQUE KEY `prenom` (`prenom`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `login` (`login`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`login`, `nom`, `prenom`, `id_utilisateurs`, `mot_de_passe`, `photoprofil`, `role`, `email`, `promotion`, `bio`) VALUES
('Anchu', 'FATIMARAJAN', 'Anchana', 13, '$2y$10$df6vZg0tHy/YSsynr8Obge8DoI9jPOP1JzXeoZzJweXlHM4yj4gT2', 'profil_Anchu.png', 'eleve', 'anchana.mlp@gmail.com', 'MMI2', NULL),
('Gaelle', 'CHARPENTIER', 'Gaëlle', 14, '$2y$10$mlXzRJslQ48Qop1SHycqD.5hnC6oVYPSUMWfXYCekHRwe7cIQMxn2', 'default.png', 'professeur', 'gaelle@gmail.com', NULL, 'hey j\'aime les chats'),
('Alilo', 'ZHYLA', 'Alina', 15, '$2y$10$p1RRb4DHd.gCIEvkGnUaAO5YEmD5P6mfovyYe92yaJxnXe3LTLVZm', 'default.png', 'membre_crous', 'alina@gmail.com', NULL, NULL),
('kelis', 'OSHOFFA', 'Kelis', 16, '$2y$10$i2SO7dXWh8mUfy.ZEcT8TuhgLdTUyrfIx2DFUpdYPc5MKh//hEV6W', '1-icon.png', 'eleve', 'keliskeren@gmail.com', 'mmi2', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
