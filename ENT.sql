-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 03 jan. 2024 à 22:01
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
-- Structure de la table `forum`
--

DROP TABLE IF EXISTS `forum`;
CREATE TABLE IF NOT EXISTS `forum` (
  `id` int NOT NULL AUTO_INCREMENT,
  `login` varchar(50) NOT NULL,
  `commentaire` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `forum`
--

INSERT INTO `forum` (`id`, `login`, `commentaire`) VALUES
(1, 'kelis', 'pitié qu\'on en finisse de cet ent maudit'),
(2, 'user_broken', 'comment vesqui un devoir coeff 10 svp ?');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
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
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`nom`, `prenom`, `id_utilisateurs`, `mot_de_passe`, `photoprofil`, `role`, `email`, `promotion`, `bio`) VALUES
('FATIMARAJAN', 'Anchana', 13, '$2y$10$df6vZg0tHy/YSsynr8Obge8DoI9jPOP1JzXeoZzJweXlHM4yj4gT2', 'default.png', 'eleve', 'fatimarajananchana@gmail.com', 'mmi2', NULL),
('CHARPENTIER', 'Gaëlle', 14, '$2y$10$mlXzRJslQ48Qop1SHycqD.5hnC6oVYPSUMWfXYCekHRwe7cIQMxn2', 'default.png', 'professeur', 'gaelle@gmail.com', NULL, NULL),
('ZHYLA', 'Alina', 15, '$2y$10$p1RRb4DHd.gCIEvkGnUaAO5YEmD5P6mfovyYe92yaJxnXe3LTLVZm', 'default.png', 'membre_crous', 'alina@gmail.com', NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
