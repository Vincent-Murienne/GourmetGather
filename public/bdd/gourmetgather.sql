-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 26 fév. 2024 à 17:18
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gourmetgather`
--

-- --------------------------------------------------------

--
-- Structure de la table `avis`
--

DROP TABLE IF EXISTS `avis`;
CREATE TABLE IF NOT EXISTS `avis` (
  `idAvis` int NOT NULL AUTO_INCREMENT,
  `dateAvis` date DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `notes` int DEFAULT NULL,
  `idRecette` int DEFAULT NULL,
  `idUser` int DEFAULT NULL,
  PRIMARY KEY (`idAvis`),
  KEY `idRecette` (`idRecette`),
  KEY `fk_user_id` (`idUser`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `avis`
--

INSERT INTO `avis` (`idAvis`, `dateAvis`, `description`, `notes`, `idRecette`, `idUser`) VALUES
(1, '2024-02-13', 'Recette excellente !', 5, 1, 1),
(2, '2024-02-15', 'Excellent', 4, 4, 3),
(3, '2024-02-01', 'Très moyen', 3, 1, 2),
(4, '2024-02-13', 'Passable', 3, 1, 4),
(5, '2024-02-15', 'A ne pas refaire !', 1, 1, 5);

-- --------------------------------------------------------

--
-- Structure de la table `detenir`
--

DROP TABLE IF EXISTS `detenir`;
CREATE TABLE IF NOT EXISTS `detenir` (
  `idDetenir` int NOT NULL AUTO_INCREMENT,
  `idIngredient` int NOT NULL,
  `idEtape` int NOT NULL,
  PRIMARY KEY (`idDetenir`,`idIngredient`,`idEtape`),
  KEY `idIngredient` (`idIngredient`),
  KEY `idEtape` (`idEtape`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `detenir`
--

INSERT INTO `detenir` (`idDetenir`, `idIngredient`, `idEtape`) VALUES
(1, 1, 2),
(2, 2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `etape`
--

DROP TABLE IF EXISTS `etape`;
CREATE TABLE IF NOT EXISTS `etape` (
  `idEtape` int NOT NULL AUTO_INCREMENT,
  `numeroEtape` int DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `temps` int DEFAULT NULL,
  `unitéTemps` varchar(50) DEFAULT NULL,
  `temperature` int DEFAULT NULL,
  PRIMARY KEY (`idEtape`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `etape`
--

INSERT INTO `etape` (`idEtape`, `numeroEtape`, `description`, `temps`, `unitéTemps`, `temperature`) VALUES
(1, 1, 'Préchauffez le four', 10, 'min', 180),
(2, 2, 'Enfournez votre plat puis préparez votre pain', 15, 'min', 180);

-- --------------------------------------------------------

--
-- Structure de la table `ingredient`
--

DROP TABLE IF EXISTS `ingredient`;
CREATE TABLE IF NOT EXISTS `ingredient` (
  `idIngredient` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) DEFAULT NULL,
  `quantité` int DEFAULT NULL,
  `unitéMesure` varchar(50) DEFAULT NULL,
  `photo` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`idIngredient`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `ingredient`
--

INSERT INTO `ingredient` (`idIngredient`, `nom`, `quantité`, `unitéMesure`, `photo`) VALUES
(1, 'Camembert', 250, 'g', 'https://androuet.com/images-up/images/recettes/camembertfondu.PNG'),
(2, 'Pain de campagne', 50, 'g', 'https://images.radio-canada.ca/v1/alimentation/recette/16x9/ithq-pain-campagne.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `posseder`
--

DROP TABLE IF EXISTS `posseder`;
CREATE TABLE IF NOT EXISTS `posseder` (
  `idPosseder` int NOT NULL AUTO_INCREMENT,
  `idRecette` int NOT NULL,
  `idEtape` int NOT NULL,
  PRIMARY KEY (`idPosseder`,`idRecette`,`idEtape`),
  KEY `idRecette` (`idRecette`),
  KEY `idEtape` (`idEtape`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `posseder`
--

INSERT INTO `posseder` (`idPosseder`, `idRecette`, `idEtape`) VALUES
(1, 1, 1),
(2, 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `recette`
--

DROP TABLE IF EXISTS `recette`;
CREATE TABLE IF NOT EXISTS `recette` (
  `idRecette` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `nombrePortions` int DEFAULT NULL,
  `photo` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`idRecette`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `recette`
--

INSERT INTO `recette` (`idRecette`, `titre`, `description`, `nombrePortions`, `photo`) VALUES
(1, 'Fondue de camembert', 'Fondue de camembert\r\n', 1, 'https://www.president.fr/wp-content/uploads/2019/12/la-fondue-camembert-aux-pommes-540x540.png'),
(2, 'Pizza Margherita', 'Pizza avec tomates et mozzarella', 4, 'https://e7.pngegg.com/pngimages/424/785/png-clipart-neapolitan-pizza-neapolitan-cuisine-italian-cuisine-pizza-margherita-pizza-food-recipe.png'),
(3, 'Salade César', 'Salade fraîche avec poulet grillé', 2, 'https://breaknfood.fr/wp-content/uploads/2021/05/SALADE.jpg'),
(4, 'Spaghetti Bolognaise', 'Spaghetti avec sauce à la viande', 3, 'https://png.pngtree.com/background/20230829/original/pngtree-spaghetti-bolognese-isolated-delicious-dinner-spice-photo-picture-image_4882166.jpg'),
(5, 'Tarte aux pommes', 'Tarte sucrée aux pommes caramélisées', 6, 'https://img.freepik.com/photos-premium/tarte-aux-pommes-isole-fond-blanc-gros-plan_185193-65096.jpg'),
(6, 'Boeuf Bourguignon', 'Viande de boeuf et légumes', 4, 'https://pure-saveur.com/wp-content/uploads/2020/09/bourguinion.png');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `idUser` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `motDePasse` varchar(50) DEFAULT NULL,
  `roles` int DEFAULT NULL,
  `reset_token_hash` varchar(64) DEFAULT NULL,
  `reset_token_expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`idUser`),
  UNIQUE KEY `reset_token_hash` (`reset_token_hash`)
) ENGINE=MyISAM AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`idUser`, `nom`, `prenom`, `email`, `motDePasse`, `roles`, `reset_token_hash`, `reset_token_expires_at`) VALUES
(1, 'Murienne', 'Vincent', 'muriennevincent@gmail.com', 'Phan@1972', 0, '6d78b7e5c15b6c0aa5505ce55391ff96b4fedd1e295b37e2d80bbfb15539c1fc', '2024-02-26 16:43:01'),
(2, 'Murienne', 'Vincent', 'vmurienne-gourmetgather@gmail.com', 'Phan@1972', 1, NULL, NULL),
(3, 'Roger', 'John', 'johnroger@yahoo.fr', 'johnRoger@123', 0, NULL, NULL),
(4, 'Hadil', 'Hadil', 'Hadil@gmail.com', 'Hadil', 0, NULL, NULL),
(6, 'Robert', 'Alembert', 'robertalembert@gmail.com', '$2y$10$QARUfekniPgFqNRDwBPEreQBgBYhRgMlyP1.yUxKNmx', 0, NULL, NULL),
(5, 'Selva', 'Brass', 'Brass943@gmail.com', 'Jeanestachier94', 0, NULL, NULL),
(46, 'Jean', 'David', 'jeandavid@gmail.com', '$2y$10$p7a4gOpnjLZiQOBJZ7jIGOIjXuOCDkXEKI5h1U/.tvE', 0, NULL, NULL),
(49, 'John', 'John', 'John@gmail.com', '$2y$10$KDSmHfwaYRMo1lFHk709Bubl38KdqOmXozoGVN.9icp', 0, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
