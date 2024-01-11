-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 11 jan. 2024 à 21:40
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
  `titre` enum('Absence','Retard') CHARACTER SET utf8mb4  NOT NULL,
  `date` date NOT NULL,
  `debut` time NOT NULL,
  `fin` time NOT NULL,
  `matiere_ext` varchar(255) CHARACTER SET utf8mb4  NOT NULL,
  `prof` int NOT NULL,
  `eleve` int NOT NULL,
  `justificatif` text CHARACTER SET utf8mb4,
  PRIMARY KEY (`id_abs`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4  ;

--
-- Déchargement des données de la table `abscence_retard`
--

INSERT INTO `abscence_retard` (`id_abs`, `titre`, `date`, `debut`, `fin`, `matiere_ext`, `prof`, `eleve`, `justificatif`) VALUES
(1, 'Absence', '2023-12-13', '02:00:00', '00:00:00', '8', 0, 16, ''),
(2, 'Absence', '2024-01-07', '02:00:00', '00:00:00', '15', 0, 13, ''),
(3, 'Retard', '2024-01-13', '16:28:00', '16:30:00', '6', 0, 13, NULL),
(5, 'Absence', '2024-01-11', '10:30:00', '12:30:00', '9', 0, 16, NULL),
(6, 'Absence', '2024-01-10', '08:15:00', '12:15:00', '7', 23, 13, NULL);

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
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4  ;

--
-- Déchargement des données de la table `controle`
--

INSERT INTO `controle` (`controle`, `id_controle`, `date`, `enseignant`) VALUES
('Culture numérique', 4, '2024-01-09', 'Bilel Benbouzid'),
('Traitement de l\'information ', 5, '2023-11-13', 'Florence Bister'),
('Marketing', 6, '2024-01-25', 'Leyla Jaoued Abassi'),
('Le règne animal', 8, '2024-01-27', 'Renaud Eppstein');

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

DROP TABLE IF EXISTS `cours`;
CREATE TABLE IF NOT EXISTS `cours` (
  `id_cours` int NOT NULL AUTO_INCREMENT,
  `cours` varchar(50) NOT NULL,
  `document` text NOT NULL,
  `externe_prof` int NOT NULL,
  `coef` int DEFAULT NULL,
  `ext_matiere` int NOT NULL,
  PRIMARY KEY (`id_cours`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4  ;

--
-- Déchargement des données de la table `cours`
--

INSERT INTO `cours` (`id_cours`, `cours`, `document`, `externe_prof`, `coef`, `ext_matiere`) VALUES
(14, 'TP mini projet', 'TP miniblog_S3_2023.pdf', 22, 3, 9),
(12, 'Marketing POST 8890', 'post-5345-Principe de marketing.pptx', 23, 2, 7),
(13, 'Consigne production sonore', 'SAE_3.02_-_Les_sons_de_lhorrifique_en_BD__de_lillustration_de_roman.pdf', 24, NULL, 8),
(11, 'Display Grid', 'TP2-grid.zip', 21, NULL, 6),
(15, 'Protocole SAE 3.02', 'SAÉ 301 V1_2023.pdf', 22, 4, 15);

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
  `lieu` enum('ESIEE','Copernic') CHARACTER SET utf8mb4  NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4  ;

--
-- Déchargement des données de la table `crous`
--

INSERT INTO `crous` (`id`, `entre`, `plat`, `dessert`, `date`, `image_plat`, `lieu`) VALUES
(2, 'Betterave cube, Salade sicillienne, Rillette', 'Poulet basquaise, Riz, Haricots verts', 'Varietés de yaourt, Fromage blanc, Salade fruits frais', '2024-01-22', 'https://i.pinimg.com/564x/9a/ae/48/9aae48129f83440cefa035f03591902e.jpg', 'ESIEE'),
(5, 'Salade de chèvre chaud, Carpaccio de boeuf, Velouté de potiron', 'Saumon grillé, Poulet rôti aux herbes, Risotto aux champignons', 'Tiramisu aux fraises, Fondant au chocolat, Crème brûlée à la vanille', '2024-01-23', 'https://i.pinimg.com/564x/2e/d9/cd/2ed9cd93457d912a5ee30828131f3aca.jpg', 'ESIEE'),
(6, 'Soupe de potiron, Ceviche de poisson', 'Poulet curry coco, Filet mignon aux champignons, Lasagnes végétariennes', 'Tarte aux pommes, Mousse au chocolat, Panna cotta aux fruits rouges, Fondue au chocolat avec fruits ', '2024-01-24', 'https://i.pinimg.com/564x/a5/81/56/a58156cbd213bb58cdc4d24160c6b2c9.jpg', 'ESIEE'),
(7, 'Carpaccio de saumon aux agrumes, Salade de chèvre chaud au miel', 'Filet de boeuf, Risotto aux champignons, Poulet rôti', 'Tiramisu aux fruits rouges, Crème brûlée à la vanille, Fondant au chocolat', '2024-01-25', 'https://img.cuisineaz.com/660x660/2017/09/04/i132139-risotto-aux-champignons-au-companion.jpeg', 'ESIEE'),
(8, 'Velouté de potiron à la crème fraîche, Bruschetta à la tomate et mozzarella', 'Pâtes carbonara, Magret de canard à l\'orange, Poisson en croûte d\'amandes', 'Mousse au chocolat noir, Tarte aux pommes caramélisées, Sorbet au citron', '2024-01-26', 'https://img.cuisineaz.com/1024x1024/2015/10/12/i6388-magret-de-canard-a-l-orange-au-miel.jpg', 'ESIEE'),
(9, 'salade aux oeufs, pates, tomate', 'pates bolo, poisson, porc', 'chocolat, vanille, caramel', '2024-01-29', 'https://www.potimarron.com/images/wishlists/img/spaghettis-bolognaise-maison-DWMmS.jpg', 'ESIEE'),
(10, 'salade aux oeufs, pates, tomate', 'pates bolo, poisson, porc', 'chocolat, vanille, caramel', '2024-01-22', 'https://www.potimarron.com/images/wishlists/img/spaghettis-bolognaise-maison-DWMmS.jpg', 'Copernic'),
(12, 'Velouté de potiron à la crème fraîche, Bruschetta à la tomate et mozzarella', 'Pâtes carbonara, Magret de canard à l\'orange, Poisson en croûte d\'amandes', 'Mousse au chocolat noir, Tarte aux pommes caramélisées, Sorbet au citron', '2024-01-23', 'https://img.cuisineaz.com/1024x1024/2015/10/12/i6388-magret-de-canard-a-l-orange-au-miel.jpg', 'Copernic'),
(15, 'Carpaccio de saumon aux agrumes, Salade de chèvre chaud au miel', 'Filet de boeuf, Risotto aux champignons, Poulet rôti', 'Tiramisu aux fruits rouges, Crème brûlée à la vanille, Fondant au chocolat', '2024-01-25', 'https://img.cuisineaz.com/660x660/2017/09/04/i132139-risotto-aux-champignons-au-companion.jpeg', 'Copernic'),
(16, 'Soupe de potiron, Ceviche de poisson', 'Poulet curry coco, Filet mignon aux champignons, Lasagnes végétariennes', 'Tarte aux pommes, Mousse au chocolat, Panna cotta aux fruits rouges, Fondue au chocolat avec fruits ', '2024-01-24', 'https://i.pinimg.com/564x/a5/81/56/a58156cbd213bb58cdc4d24160c6b2c9.jpg', 'Copernic');

-- --------------------------------------------------------

--
-- Structure de la table `grossematiere`
--

DROP TABLE IF EXISTS `grossematiere`;
CREATE TABLE IF NOT EXISTS `grossematiere` (
  `id_matiere` int NOT NULL AUTO_INCREMENT,
  `nom_mat` text NOT NULL,
  `coefficient` int NOT NULL,
  `illustration` text NOT NULL,
  `type` varchar(200) CHARACTER SET utf8mb4  NOT NULL,
  `prof_ext` int NOT NULL,
  PRIMARY KEY (`id_matiere`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4  ;

--
-- Déchargement des données de la table `grossematiere`
--

INSERT INTO `grossematiere` (`id_matiere`, `nom_mat`, `coefficient`, `illustration`, `type`, `prof_ext`) VALUES
(15, 'Sae 303 Dataviz', 3, 'matiere_e.renaud_Sae 303 Dataviz.png', 'SAE', 22),
(6, 'Intégration web', 3, 'matiere_c.gaelle_Intégration web.png', 'Ressources', 21),
(7, 'Marketing', 3, 'matiere_j.leyla_Marketing.png', 'Ressources', 23),
(8, 'Sound design', 1, 'matiere_h.tony_Sound design.png', 'Ressources', 24),
(9, 'Développement back', 2, 'matiere_e.renaud_Développement back.png', 'Ressources', 22);

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id_message` int NOT NULL AUTO_INCREMENT,
  `objet` varchar(800) NOT NULL,
  `contenu_mss` text NOT NULL,
  `expediteur` int NOT NULL,
  `destinataire` int NOT NULL,
  `piece_jointe` text CHARACTER SET utf8mb4,
  `solooutous` varchar(200) NOT NULL,
  `date_mess` date NOT NULL,
  PRIMARY KEY (`id_message`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4  ;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id_message`, `objet`, `contenu_mss`, `expediteur`, `destinataire`, `piece_jointe`, `solooutous`, `date_mess`) VALUES
(5, 'Contrôle Boostrap', 'Je vous rappelle que demain vous avez un TP test sur Bootstrap. L\'utilisation de ChatGPT et autre IA est formellement interdite et vous mènera à une sanction sévère si je vous attrape l\'utiliser.', 21, 13, NULL, 'tous', '2024-01-11'),
(4, 'Devoir à rendre', 'Vous devez impérativement rendre la note d\'intention sur le script météo !', 24, 16, NULL, 'solo', '2024-01-11'),
(6, 'Le Miniblog', 'Vous devez réaliser un miniblog sur le thème de votre choix. Je veux m\'assurer que vous savez les sessions !!', 22, 13, 'TP miniblog_S3_2023.pdf', 'tous', '2024-01-11'),
(7, 'Le Miniblog', 'Vous devez réaliser un miniblog sur le thème de votre choix. Je veux m\'assurer que vous savez les sessions !!', 22, 16, 'TP miniblog_S3_2023.pdf', 'tous', '2024-01-11'),
(8, 'Le Miniblog', 'Vous devez réaliser un miniblog sur le thème de votre choix. Je veux m\'assurer que vous savez les sessions !!', 22, 18, 'TP miniblog_S3_2023.pdf', 'tous', '2024-01-11');

-- --------------------------------------------------------

--
-- Structure de la table `notes`
--

DROP TABLE IF EXISTS `notes`;
CREATE TABLE IF NOT EXISTS `notes` (
  `notes` float NOT NULL,
  `id_note` int NOT NULL AUTO_INCREMENT,
  `nom_note` varchar(255) CHARACTER SET utf8mb4  NOT NULL,
  `ext_module` varchar(800) CHARACTER SET utf8mb4  NOT NULL,
  `ext_prof` int NOT NULL,
  `ext_cours` int NOT NULL,
  `ext_eleve` int NOT NULL,
  `coef_cours` int NOT NULL,
  `coef_matiere` int NOT NULL,
  `date_note` date NOT NULL,
  PRIMARY KEY (`id_note`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4  ;

--
-- Déchargement des données de la table `notes`
--

INSERT INTO `notes` (`notes`, `id_note`, `nom_note`, `ext_module`, `ext_prof`, `ext_cours`, `ext_eleve`, `coef_cours`, `coef_matiere`, `date_note`) VALUES
(18, 21, 'DST dev', '15', 22, 15, 16, 4, 3, '2023-11-15'),
(20, 22, 'Oral usability', '15', 22, 15, 13, 15, 15, '2023-09-30'),
(18, 12, 'TPTEST', '15', 22, 14, 0, 0, 0, '2023-12-23'),
(14, 17, 'Contrôle amphi', '7', 23, 12, 16, 2, 3, '2023-12-28'),
(5, 18, 'un oral', '7', 23, 12, 18, 2, 3, '2024-01-05'),
(15, 23, 'Note Dataviz', '15', 22, 15, 16, 15, 15, '2024-01-10');

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
  `tache_prof` int NOT NULL,
  PRIMARY KEY (`id_travail`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4  ;

--
-- Déchargement des données de la table `travail_a_faire`
--

INSERT INTO `travail_a_faire` (`id_travail`, `travail`, `date`, `enseignant`, `tache_prof`) VALUES
(3, 'Miniblog', '2023-12-24', 'Renaud Epstein', 0),
(4, 'Tracking et motion design', '2023-12-22', 'Anne Tasso', 0),
(5, 'Campagne publicitaire', '2023-12-10', 'Frédéric Poisson', 0),
(6, 'Mockup ENT', '2023-11-22', 'Fatima Laoufi', 0),
(7, 'Note d’intention personnelle', '2024-01-12', 'Leyla Jaoued Abassi', 0);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `login` varchar(100) NOT NULL,
  `nom` varchar(200) CHARACTER SET utf8mb4  NOT NULL,
  `prenom` varchar(200) CHARACTER SET utf8mb4  NOT NULL,
  `id_utilisateurs` int NOT NULL AUTO_INCREMENT,
  `mot_de_passe` varchar(255) NOT NULL,
  `photoprofil` text NOT NULL,
  `role` varchar(800) NOT NULL,
  `email` varchar(200) CHARACTER SET utf8mb4  NOT NULL,
  `promotion` varchar(100) CHARACTER SET utf8mb4  DEFAULT NULL,
  `bio` varchar(500) CHARACTER SET utf8mb4  DEFAULT NULL,
  PRIMARY KEY (`id_utilisateurs`),
  UNIQUE KEY `nom` (`nom`),
  UNIQUE KEY `prenom` (`prenom`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `login` (`login`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4  ;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`login`, `nom`, `prenom`, `id_utilisateurs`, `mot_de_passe`, `photoprofil`, `role`, `email`, `promotion`, `bio`) VALUES
('f.anchana', 'Fatimarajan', 'Anchana', 13, '$2y$10$df6vZg0tHy/YSsynr8Obge8DoI9jPOP1JzXeoZzJweXlHM4yj4gT2', 'profil_f.anchana.png', 'Étudiant.e', 'anchana.mlp@gmail.com', 'MMI2', 'J\'adore Kirbyyyy'),
('Alilo', 'Zhyla', 'Alina', 15, '$2y$10$p1RRb4DHd.gCIEvkGnUaAO5YEmD5P6mfovyYe92yaJxnXe3LTLVZm', 'default.png', 'Membre du CROUS', 'alina@gmail.com', NULL, NULL),
('o.kelis', 'Oshoffa', 'Kelis', 16, '$2y$10$i2SO7dXWh8mUfy.ZEcT8TuhgLdTUyrfIx2DFUpdYPc5MKh//hEV6W', '1-icon.png', 'Étudiant.e', 'keliskeren@gmail.com', 'MMI2', NULL),
('c.gaelle', 'Charpentier', 'Gaëlle', 21, '$2y$10$cF.Hon4PfAh9z6oLQvL0F.B11NA57.974N2yVdZEJEJQfa9.SX9N6', 'default.png', 'Enseignant.e', 'gaelle.charpentier@univ-eiffel.fr', NULL, NULL),
('Admin', 'Admin', 'Admin', 17, '$2y$10$PwueylyOGxe1/ma1GyfN4OdjAC65xPB247Fr1p6ztobzzyxQJb9LK', 'default.png', 'Admin', 'fatimarajananchana@gmail.com', NULL, NULL),
('c.loana', 'Chalach', 'Loana', 18, '$2y$10$2BHq1NZWGm9gkS8IXxQ40e5wE6C8BHSAAAocvZkSzk7NXyo2AAGA.', 'default.png', 'Étudiant.e', 'loana@gmail.com', 'MMI2', NULL),
('b.matthieu', 'Berthet', 'Matthieu', 20, '$2y$10$xsKquIGhkz/d2S7OMU4bZezkGP7cyF9i61hBdeUDcuxlI87me.epW', 'default.png', 'Enseignant.e', 'matthieu.berthet@univ-eiffel.fr', NULL, NULL),
('e.renaud', 'Renaud', 'Eppstein', 22, '$2y$10$5V5zeXlfL4VPsCECFv.3Z.IcM0CzHRBt2iBve0eBmgHYOv9w2JFAa', 'default.png', 'Enseignant.e', 'renaud.eppstein@univ-eiffel.fr', NULL, NULL),
('j.leyla', 'Jaoued', 'Leyla', 23, '$2y$10$hhWVMlGqPWhf1f2k.PTDpOp3MHHFeWPBVNM7JJ02hDCmaifBBtFFK', 'default.png', 'Enseignant.e', 'leyla.jaoued@univ-eiffel.fr', NULL, NULL),
('h.tony', 'Houziaux', 'Tony', 24, '$2y$10$1hyGlVm4J3DSe2yXhyztd.6W9zoMDp.dNVgRKicTV.5nHloPwVP2y', 'default.png', 'Enseignant.e', 'tonyhouziaux@gmail.com', NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
