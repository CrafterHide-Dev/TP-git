-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 16 mai 2025 à 06:20
-- Version du serveur : 9.1.0
-- Version de PHP : 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `tpgit`
--

-- --------------------------------------------------------

--
-- Structure de la table `avis`
--

DROP TABLE IF EXISTS `avis`;
CREATE TABLE IF NOT EXISTS `avis` (
  `id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `dest_id` int DEFAULT NULL,
  `comment` text,
  `score` decimal(2,1) DEFAULT NULL,
  KEY `user_id` (`user_id`),
  KEY `dest_id` (`dest_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `destinations`
--

DROP TABLE IF EXISTS `destinations`;
CREATE TABLE IF NOT EXISTS `destinations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `country` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `city` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `zip_code` varchar(10) DEFAULT NULL,
  `street_name` varchar(255) DEFAULT NULL,
  `street_number` int DEFAULT NULL,
  `title` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `destinations`
--

INSERT INTO `destinations` (`id`, `country`, `city`, `zip_code`, `street_name`, `street_number`, `title`, `description`) VALUES
(1, 'France', 'Paris', '75007', 'Avenue Gustave Eiffel', NULL, 'La Tour Eiffel', 'Symbole de Paris et de la France, la Tour Eiffel, construite pour l\'Exposition Universelle de 1889, culmine à 330 mètres. Offrant des vues panoramiques exceptionnelles sur la ville, elle est une merveille d\'ingénierie et une destination touristique incontournable. Montez en ascenseur ou par les escaliers jusqu\'au sommet pour admirer la beauté de Paris à vos pieds.'),
(2, 'France', 'Paris', '75008', 'Place Charles de Gaulle', NULL, 'L\'Arc de Triomphe', 'Situé au centre de la place Charles-de-Gaulle, l\'Arc de Triomphe est un monument emblématique de Paris. Commandé par Napoléon Ier pour célébrer les victoires de la Grande Armée, il est un symbole de la gloire militaire française et un témoignage de l\'histoire du pays.'),
(3, 'Australia', 'Sydney', NULL, 'Bennelong Point', NULL, 'Sydney Opera House', 'Situé sur le front de mer de Sydney, le Sydney Opera House est l\'un des bâtiments les plus célèbres du XXᵉ siècle et un haut lieu des arts de la scène. Conçu par l\'architecte danois Jørn Utzon, son architecture unique évoque des voiles de bateau ou des coquillages, ce qui en fait un symbole iconique de la ville.');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int DEFAULT NULL,
  `username` varchar(24) DEFAULT NULL,
  `password` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
