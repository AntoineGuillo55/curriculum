-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 07 déc. 2024 à 09:35
-- Version du serveur : 11.4.2-MariaDB
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `curriculum`
--

-- --------------------------------------------------------

--
-- Structure de la table `job`
--

DROP TABLE IF EXISTS `job`;
CREATE TABLE IF NOT EXISTS `job` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `job_title` varchar(50) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `description` longtext DEFAULT NULL,
  `contract_type` varchar(20) NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date DEFAULT NULL,
  `localization` varchar(50) NOT NULL,
  `company_logo` varchar(250) DEFAULT NULL,
  `memory_photo` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `job`
--

INSERT INTO `job` (`id`, `job_title`, `company_name`, `description`, `contract_type`, `date_start`, `date_end`, `localization`, `company_logo`, `memory_photo`) VALUES
(1, 'Agent Polyvalent', 'Mairie de Lancieux', 'Nettoyage des rues et des sanitaires publics de la commune de Lancieux', 'CDD', '2010-07-01', '2010-07-31', 'Lancieux', NULL, NULL),
(2, 'Agent polyvalent', 'Mairie de Lancieux', 'Nettoyage des sanitaires du camping de Lancieux, visite guidée du moulin et gardiennage du terrain de tennis communal', 'CDD', '2011-07-01', '2011-07-31', 'Lancieux', NULL, NULL),
(3, 'Facteur', 'La Poste', 'Facteur de renfort pendant la période estivale sur la commune de Dinard', 'CDD', '2012-07-02', '2012-08-31', 'Lancieux', NULL, NULL),
(4, 'Plongeur', 'Olivhe SARL', 'Plonge et nettoyage des sols, frigo et machines dans une boucherie charcuterie traiteur', 'CDD', '2012-07-02', '2012-08-31', 'Lancieux', NULL, NULL),
(5, 'Téléprospecteur', 'Digitaleo', 'Prospection et prise de rendez-vous qualifiés pour les commerciaux sédentaire auprès de garages et de supermarchés', 'alternance', '2012-09-01', '2014-08-31', 'Rennes', NULL, NULL),
(6, 'Assistant commercial', 'Arval', 'Missions d\'assistant commercial auprès d\'une commercial sédentaire dans une entreprise de location de véhicule longue durée, en relation avec un réseau d\'apporteurs d\'affaires.', 'stage', '2015-01-06', '2015-06-30', 'Saint Grégoire', NULL, NULL),
(7, 'Mareyeur', 'Ets Guillo', 'Livraison 2 fois par semaines de poissons et fruits de la mer achetés à la criée d\'Erquy à une clientèle de restaurant à Paris et prospection de nouveaux clients', 'CDD', '2015-09-01', '2016-04-30', 'Lancieux', NULL, NULL),
(8, 'Conseiller financier', 'La Banque Postale', 'Conseiller financier auprès d\'une clientèle de particuliers au bureau de poste de Rennes Le Gast', 'alternance', '2016-09-01', '2017-08-31', 'Rennes', NULL, NULL),
(9, 'Conseiller financier', 'La Banque Postale', 'Conseiller financier auprès d\'une clientèle de particuliers à la poste de Vitré, puis de Cesson-Sévigné', 'CDI', '2017-09-01', '2021-10-31', 'Vitré et Cesson-Sévigné', NULL, NULL),
(10, 'Stagiaire en développement web', 'Black Sequoia', 'Stage de fin de formation DWWM pendant laquelle j\'ai eu à créer un thème wordpress pour un site e-commerce', 'stage', '2022-08-15', '2022-11-15', 'Rennes', NULL, NULL),
(11, 'Attaché parlementaire', 'Assemblée nationale', 'Attaché parlementaire en circonscription d\'un député de l\'assemblée nationale', 'CDI', '2022-11-01', '2023-10-31', 'Rennes et Paris', NULL, NULL),
(12, 'Développeur web', 'Black Sequoia', 'Maintenance de site e-commerce sous prestashop et wordpress et création de modules prestashop', 'alternance', '2024-01-22', NULL, 'Rennes', NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
