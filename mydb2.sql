-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 02 avr. 2021 à 12:51
-- Version du serveur :  8.0.21
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mydb2`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `idarticles` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) DEFAULT NULL,
  `prixHT` float DEFAULT NULL,
  PRIMARY KEY (`idarticles`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`idarticles`, `nom`, `prixHT`) VALUES
(1, 'cafe', 2),
(2, 'chocolat', 1.5),
(3, 'the', 3.2),
(4, 'petits gateaux', 3.7);

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `idclient` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) DEFAULT NULL,
  `adresse postale` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idclient`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`idclient`, `nom`, `adresse postale`) VALUES
(1, 'Michu', 'Paris'),
(2, 'Meremichelle', 'Caen'),
(3, 'Panis', 'Marseille'),
(4, 'SaintJulien', 'Bordeaux');

-- --------------------------------------------------------

--
-- Structure de la table `paniervente`
--

DROP TABLE IF EXISTS `paniervente`;
CREATE TABLE IF NOT EXISTS `paniervente` (
  `idpaniervente` int NOT NULL AUTO_INCREMENT,
  `articles_idarticles` int NOT NULL,
  `ventes_idventes` int NOT NULL,
  `ventes_client_idclient` int NOT NULL,
  PRIMARY KEY (`idpaniervente`,`articles_idarticles`,`ventes_idventes`,`ventes_client_idclient`),
  KEY `fk_paniervente_articles1_idx` (`articles_idarticles`),
  KEY `fk_paniervente_ventes1_idx` (`ventes_idventes`,`ventes_client_idclient`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `paniervente`
--

INSERT INTO `paniervente` (`idpaniervente`, `articles_idarticles`, `ventes_idventes`, `ventes_client_idclient`) VALUES
(1, 1, 1, 1),
(1, 2, 1, 1),
(2, 3, 2, 2),
(2, 4, 2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `ventes`
--

DROP TABLE IF EXISTS `ventes`;
CREATE TABLE IF NOT EXISTS `ventes` (
  `idventes` int NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `quantite` int NOT NULL,
  `totalHT` float NOT NULL,
  `totalTTC` float NOT NULL,
  `client_idclient` int NOT NULL,
  PRIMARY KEY (`idventes`,`client_idclient`),
  KEY `fk_ventes_client_idx` (`client_idclient`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `ventes`
--

INSERT INTO `ventes` (`idventes`, `date`, `quantite`, `totalHT`, `totalTTC`, `client_idclient`) VALUES
(1, '2021-03-24', 3, 5, 5.98, 1),
(2, '2021-03-25', 2, 6.9, 8.2524, 2),
(3, '2021-03-25', 1, 3.2, 3.8272, 3);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `paniervente`
--
ALTER TABLE `paniervente`
  ADD CONSTRAINT `fk_paniervente_articles1` FOREIGN KEY (`articles_idarticles`) REFERENCES `articles` (`idarticles`),
  ADD CONSTRAINT `fk_paniervente_ventes1` FOREIGN KEY (`ventes_idventes`,`ventes_client_idclient`) REFERENCES `ventes` (`idventes`, `client_idclient`);

--
-- Contraintes pour la table `ventes`
--
ALTER TABLE `ventes`
  ADD CONSTRAINT `fk_ventes_client` FOREIGN KEY (`client_idclient`) REFERENCES `client` (`idclient`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
