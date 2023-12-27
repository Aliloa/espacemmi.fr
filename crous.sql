-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 27 déc. 2023 à 10:36
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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
