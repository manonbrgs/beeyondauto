-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 26 mars 2023 à 15:37
-- Version du serveur : 8.0.31
-- Version de PHP : 8.1.12

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `beeyondauto`
--

-- --------------------------------------------------------

--
-- Structure de la table `achat`
--

DROP TABLE IF EXISTS `achat`;
CREATE TABLE IF NOT EXISTS `achat` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `idvehicule` int NOT NULL,
  `dateachat` date NOT NULL,
  `quantite` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idvehicule` (`idvehicule`),
  KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `location`
--

DROP TABLE IF EXISTS `location`;
CREATE TABLE IF NOT EXISTS `location` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `idvehicule` int NOT NULL,
  `debutlocation` date NOT NULL,
  `finlocation` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idvehicule` (`idvehicule`),
  KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `location`
--

INSERT INTO `location` (`id`, `username`, `idvehicule`, `debutlocation`, `finlocation`) VALUES
(1, '', 5, '2023-03-06', '2023-03-06'),
(2, '', 3, '2023-03-06', '2023-03-06'),
(3, '', 22, '2023-03-07', '2023-03-10'),
(6, '', 1, '2023-03-11', '2023-06-30'),
(8, '', 1, '2023-08-18', '2023-08-25'),
(18, '', 6, '2023-03-24', '2023-03-25'),
(19, '', 8, '2023-03-30', '2023-03-31');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `motdepasse` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`username`, `nom`, `prenom`, `mail`, `motdepasse`) VALUES
('', '', '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `vehicules`
--

DROP TABLE IF EXISTS `vehicules`;
CREATE TABLE IF NOT EXISTS `vehicules` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marque` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `modelFamily` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `modelRange` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `modelVariant` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `moteur` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `puissance_ch` int NOT NULL,
  `boitedevitesse` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombredeportes` int NOT NULL,
  `nombredeplaces` int NOT NULL,
  `anneedesortie` year NOT NULL,
  `stock` int NOT NULL,
  `prix_vente` int NOT NULL,
  `etat` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NEUF',
  PRIMARY KEY (`id`),
  KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `vehicules`
--

INSERT INTO `vehicules` (`id`, `username`, `marque`, `modelFamily`, `modelRange`, `modelVariant`, `type`, `moteur`, `puissance_ch`, `boitedevitesse`, `nombredeportes`, `nombredeplaces`, `anneedesortie`, `stock`, `prix_vente`, `etat`) VALUES
(1, '', 'AUDI', 'A6', 'A6', 'SA', 'BERLINE', 'DIESEL', 560, 'AUTOMATIQUE', 5, 5, 2018, 3, 60000, 'NEUF'),
(2, '', 'AUDI', 'A6', 'RS6', 'ES', 'BREAK', 'ESSENCE', 600, 'AUTOMATIQUE', 5, 5, 2020, 1, 125000, 'NEUF'),
(3, '', 'AUDI', 'A3', 'A3', 'CA', 'BERLINE', 'ESSENCE', 300, 'MANUELLE', 3, 2, 2019, 0, 30000, 'NEUF'),
(4, '', 'AUDI', 'Q5-SPORTBACK', 'SQ5-SPORTBACK', 'OD', 'SUV', 'DIESEL', 341, 'AUTOMATIQUE', 5, 5, 2021, 5, 80000, 'NEUF'),
(5, '', 'AUDI', 'A1', 'S1', 'HA', 'CITADINE', 'ESSENCE', 231, 'MANUELLE', 3, 5, 2017, 2, 15000, 'NEUF'),
(6, '', 'ABARTH', '500', '500', 'CA', 'CITADINE', 'ESSENCE', 165, 'AUTOMATIQUE', 3, 4, 2018, 0, 15200, 'NEUF'),
(7, '', 'ABARTH', '124-SPIDER', '124-SPIDER', 'CA', 'CABRIOLET', 'ESSENCE', 170, 'MANUELLE', 2, 2, 2018, 7, 27500, 'NEUF'),
(8, '', 'BMW', 'Z4', 'Z4', 'CA', 'CABRIOLET', 'ESSENCE', 197, 'AUTOMATIQUE', 3, 2, 2023, 4, 52300, 'NEUF'),
(9, '', 'BMW', 'I8', 'I8', 'CO', 'BERLINE', 'HYBRIDE', 374, 'AUTOMATIQUE', 3, 2, 2018, 0, 134800, 'NEUF'),
(10, '', 'BMW', 'SERIES-1', 'SERIES-1', 'CH', 'BERLINE', 'DIESEL', 170, 'AUTOMATIQUE', 5, 5, 2019, 4, 24675, 'NEUF'),
(11, '', 'FORD', 'B-MAX', 'B-MAX', 'HA', 'MONOSPACE', 'ESSENCE', 105, 'AUTOMATIQUE', 5, 5, 2016, 1, 7799, 'NEUF'),
(12, '', 'FORD', 'F-150', 'F-150', 'PU', 'RANGER', 'DIESEL', 375, 'AUTOMATIQUE', 2, 3, 2019, 2, 36985, 'NEUF'),
(13, '', 'FORD', 'TRANSIT-CUSTOM', 'TRANSIT-CUSTOM', 'CC', 'SOCIETE', 'DIESEL', 131, 'MANUELLE', 5, 3, 2019, 3, 14300, 'NEUF'),
(14, '', 'FORD', 'ECOSPORT', 'ECOSPORT', 'OD', 'SUV', 'ESSENCE', 125, 'MANUELLE', 5, 5, 2019, 2, 13700, 'NEUF'),
(15, '', 'FORD', 'RANGER', 'WILDTRACK', 'PU', 'RANGER', 'DIESEL', 240, 'AUTOMATIQUE', 4, 4, 2023, 6, 50650, 'NEUF'),
(16, '', 'CITROEN', 'C1', 'C1', 'MC', 'CITADINE', 'ESSENCE', 72, 'MANUELLE', 3, 4, 2019, 2, 10500, 'NEUF'),
(17, '', 'CITROEN', 'C3-AIRCROSS', 'C3-AIRCROSS', 'OD', 'SUV', 'ESSENCE', 130, 'MANUELLE', 5, 5, 2021, 9, 23400, 'NEUF'),
(18, '', 'CITROEN', 'C4', 'C4', 'HA', 'BERLINE', 'ELECTRIQUE', 136, 'AUTOMATIQUE', 5, 5, 2021, 1, 25250, 'NEUF'),
(19, '', 'TESLA', 'MODEL-3', 'MODEL-3', 'SA', 'LUXE', 'ELECTRIQUE', 325, 'AUTOMATIQUE', 5, 5, 2021, 1, 58100, 'NEUF'),
(20, '', 'TESLA', 'MODEL-S', 'MODEL-S', 'HA', 'LUXE', 'ELECTRIQUE', 422, 'AUTOMATIQUE', 5, 5, 2020, 1, 69990, 'NEUF'),
(21, '', 'BUGATTI', 'CHIRON', 'CHIRON', 'CO', 'LUXE', 'ESSENCE', 1600, 'AUTOMATIQUE', 2, 2, 2020, 3, 2800250, 'NEUF'),
(22, '', 'JAGUAR', 'F-PACE', 'F-PACE', 'OD', 'SUV', 'ESSENCE', 250, 'AUTOMATIQUE', 5, 5, 2020, 8, 47250, 'NEUF'),
(23, '', 'JAGUAR', 'XE', 'XE', 'SA', 'BERLINE', 'DIESEL', 180, 'AUTOMATIQUE', 5, 5, 2019, 2, 32999, 'NEUF'),
(24, '', 'ASTON-MARTIN', 'RAPIDE', 'RAPIDE-S', 'CO', 'LUXE', 'ESSENCE', 560, 'AUTOMATIQUE', 4, 4, 2015, 1, 139899, 'NEUF'),
(25, '', 'FIAT', '500X', '500X', 'OD', 'SUV', 'HYBRIDE', 131, 'AUTOMATIQUE', 5, 5, 2022, 13, 35370, 'NEUF'),
(26, '', 'ALPHA-ROMEO', '4C', '4C', 'CO', 'COUPÉ', 'Essence ', 157, 'AUTOMATIQUE', 3, 2, 2018, 1, 63200, 'NEUF'),
(27, '', 'CITROEN ', 'AMI', 'AMI', 'MC', 'CITADINE', 'ELECTRIQUE', 90, 'AUTOMATIQUE', 2, 2, 2021, 3, 6900, 'NEUF'),
(28, '', 'CITROEN', 'BERLINGO', 'BERLINGO', 'CV', 'UTILITAIRE', 'ELECTRIQUE', 135, 'AUTOMATIQUE', 5, 3, 2019, 5, 39240, 'NEUF'),
(29, '', 'CITROEN ', 'JUMPY', 'JUMPY', 'BU', 'MONOSPACE', 'ELECTRIQUE', 200, 'AUTOMATIQUE', 5, 7, 2020, 2, 51400, 'NEUF'),
(30, '', 'CUPRA', 'ATECA', 'ATECA', 'OD', 'SUV', 'ESSENCE', 300, 'AUTOMATIQUE', 5, 5, 2019, 2, 42500, 'NEUF'),
(34, '', 'CUPRA ', 'FORMENTOR', 'FORMENTOR', 'OD', 'SUV', 'ESSENCE ', 500, 'AUTOMATIQUE', 5, 5, 2021, 2, 63755, 'NEUF'),
(35, '', 'CUPRA', 'LEON', 'LEON', 'ES', 'SUV', 'ESSENCE', 200, 'AUTOMATIQUE', 5, 5, 2021, 3, 39480, 'NEUF'),
(36, '', 'HONDA', 'CIVIC', 'CIVIC', 'CO', 'BERLINE', 'ESSENCE', 230, 'AUTOMATIQUE', 3, 5, 2020, 3, 32400, 'NEUF'),
(37, '', 'VOLVO', 'V60', 'V60', 'CE', 'SUV', 'DIESEL', 350, 'AUTOMATIQUE', 5, 5, 2020, 1, 70500, 'NEUF'),
(38, '', 'VOLVO', 'XC90', 'XC90', 'OD', 'SUV', 'DIESEL', 420, 'AUTOMATIQUE', 5, 5, 2020, 1, 90532, 'NEUF'),
(39, '', 'VOLKSWAGEN', 'POLO', 'POLO', 'CH', 'COMPACTE', 'ESSENCE', 220, 'AUTOMATIQUE', 5, 5, 2020, 6, 35000, 'NEUF'),
(40, '', 'VOLKSWAGEN ', 'ARTEON', 'ARTEON', 'ES', 'BREAK', 'DIESEL', 350, 'AUTOMATIQUE', 5, 5, 2021, 2, 55200, 'NEUF'),
(41, '', 'JEEP', 'AVENGER', 'AVENGER', 'OD', 'SUV', 'ELECTRIQUE', 420, 'AUTOMATIQUE', 5, 5, 2023, 0, 65320, 'NEUF'),
(42, '', 'HYUNDAI', 'VELOSTER', 'VELOSTER', 'CO', 'COUP', 'ESSENCE', 190, 'AUTOMATIQUE', 3, 5, 2019, 2, 23320, 'NEUF'),
(43, '', 'KIA ', 'SPORTAGE', 'SPORTAGE', 'OD', 'SUV', 'DIESEL', 250, 'AUTOMATIQUE', 5, 5, 2022, 1, 41500, 'NEUF');

-- --------------------------------------------------------

--
-- Structure de la table `vehicules_location`
--

DROP TABLE IF EXISTS `vehicules_location`;
CREATE TABLE IF NOT EXISTS `vehicules_location` (
  `id` int NOT NULL AUTO_INCREMENT,
  `marque` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `modelFamily` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `modelRange` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `modelVariant` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `moteur` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `puissance_ch` int NOT NULL,
  `boitedevitesse` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombredeportes` int NOT NULL,
  `nombredeplaces` int NOT NULL,
  `anneedesortie` year NOT NULL,
  `prix_journalier` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `vehicules_location`
--

INSERT INTO `vehicules_location` (`id`, `marque`, `modelFamily`, `modelRange`, `modelVariant`, `type`, `moteur`, `puissance_ch`, `boitedevitesse`, `nombredeportes`, `nombredeplaces`, `anneedesortie`, `prix_journalier`) VALUES
(1, 'BENTLEY', 'BENTAYGA', 'BENTAYGA', 'OD', 'SUV', 'ESSENCE', 545, 'AUTOMATIQUE', 5, 5, 2020, 1345),
(2, 'BENTLEY', 'FLYING-SPUR', 'FLYING-SPUR', 'SA', 'LUXE', 'ESSENCE', 625, 'AUTOMATIQUE', 4, 5, 2020, 2099),
(3, 'SMART', 'FORTWO', 'FORTWO', 'MC', 'CABRIOLET', 'DIESEL', 90, 'MANUELLE', 2, 4, 2019, 46),
(4, 'LAMBORGHINI', 'HURACAN', 'HURACAN-EVO', 'CO', 'LUXE', 'ESSENCE', 639, 'AUTOMATIQUE', 2, 2, 2019, 3299),
(5, 'MASERATI', 'GHIBLI', 'GHIBLI', 'SA', 'LUXE', 'ESSENCE', 580, 'AUTOMATIQUE', 4, 5, 2021, 1299),
(6, 'MCLAREN', 'ARTURA', 'ARTURA', 'CO', 'LUXE', 'HYBRIDE', 680, 'AUTOMATIQUE', 2, 2, 2022, 1499),
(7, 'PORSHE', 'CAYENNE-COUPE', 'CAYENNE-COUPE', 'OD', 'COUPE', 'HYBRIDE', 462, 'AUTOMATIQUE', 5, 5, 2020, 699),
(8, 'AUDI', 'R8', 'R8', 'CA', 'CABRIOLET', 'DIESEL', 570, 'AUTOMATIQUE', 2, 2, 2021, 350),
(9, 'CITROEN', 'SPACETOURER', 'E-SPACETOURER', 'FW', 'MONOSPACE', 'ELECTRIQUE', 136, 'MANUELLE', 5, 7, 2021, 50),
(10, 'CITROEN', 'JUMPER', 'E-JUMPER', 'PV', 'UTILITAIRES', 'DIESEL', 120, 'MANUELLE', 4, 3, 2021, 32),
(11, 'CITROEN', 'NEMO', 'NEMO', 'CV', 'UTILITAIRES', 'DIESEL', 80, 'MANUELLE', 3, 2, 2016, 19),
(12, 'CITROEN', 'C-ZERO', 'C-ZERO', 'MC', 'BERLINE', 'ELECTRIQUE', 67, 'AUTOMATIQUE', 5, 4, 2018, 29),
(13, 'MERCEDES', 'VITO', 'E-VITO', 'CC', 'MONOSPACE', 'DIESEL', 120, 'AUTOMATIQUE', 4, 7, 2020, 42),
(14, 'MERCEDES', 'SPRINTER', 'E-SPRINTER', 'PV', 'UTILITAIRES', 'DIESEL', 143, 'MANUELLE', 2, 3, 2019, 20),
(15, 'FIAT', 'TALENTO', 'TALENTO', 'CC', 'MONOSPACE', 'DIESEL', 145, 'MANUELLE', 5, 9, 2020, 33),
(16, 'FIAT', 'TORO', 'TORO', 'PU', 'JUMPER', 'DIESEL', 170, 'MANUELLE', 4, 5, 2020, 39),
(17, 'FIAT', 'DOBLO-CARGO', 'DOBLO-CARGO', 'CV', 'SOCIETE', 'DIESEL', 90, 'MANUELLE', 3, 3, 2016, 17),
(18, 'FORD', 'MUSTANG', 'MACH-1', 'CO', 'COUPE', 'ESSENCE', 450, 'MANUELLE', 2, 4, 2021, 98),
(19, 'FORD', 'FIESTA', 'FIESTA', 'CH', 'BERLINE', 'DIESEL', 85, 'MANUELLE', 3, 5, 2020, 54),
(20, 'FORD', 'TOURNEO', 'TOURNEO-CONNECT', 'MM', 'MONOSPACE', 'HYBRIDE', 85, 'MANUELLE', 5, 7, 2022, 125),
(21, 'JEEP', 'RENEGADE', 'RENEGADE', 'CH', 'SUV', 'ESSENCE', 114, 'MANUELLE', 5, 5, 2019, 110),
(22, 'JEEP', 'WRANGLER', 'WRANGLER', 'OD', 'JUMPER', 'ESSENCE', 272, 'AUTOMATIQUE', 4, 4, 2021, 132),
(23, 'DS', 'DS-3', 'DS-3', 'CA', 'CITADINE', 'ESSENCE', 111, 'MANUELLE', 3, 5, 2018, 70),
(24, 'SEAT', 'IBIZA', 'IBIZA', 'HA', 'CITADINE', 'ESSENCE', 110, 'AUTOMATIQUE', 5, 5, 2022, 139),
(25, 'BMW', 'XM', 'XM', 'OD', 'SUV', 'HYBRIDE', 748, 'AUTOMATIQUE', 5, 5, 2023, 875);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `achat`
--
ALTER TABLE `achat`
  ADD CONSTRAINT `achat_ibfk_1` FOREIGN KEY (`idvehicule`) REFERENCES `vehicules` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `achat_ibfk_2` FOREIGN KEY (`username`) REFERENCES `utilisateurs` (`username`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `location`
--
ALTER TABLE `location`
  ADD CONSTRAINT `location_ibfk_1` FOREIGN KEY (`idvehicule`) REFERENCES `vehicules_location` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `location_ibfk_2` FOREIGN KEY (`username`) REFERENCES `utilisateurs` (`username`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `vehicules`
--
ALTER TABLE `vehicules`
  ADD CONSTRAINT `vehicules_ibfk_1` FOREIGN KEY (`username`) REFERENCES `utilisateurs` (`username`) ON DELETE RESTRICT ON UPDATE RESTRICT;
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
