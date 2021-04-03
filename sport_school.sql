-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 03 avr. 2021 à 09:20
-- Version du serveur :  8.0.21
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sport_school`
--

-- --------------------------------------------------------

--
-- Structure de la table `activity`
--

DROP TABLE IF EXISTS `activity`;
CREATE TABLE IF NOT EXISTS `activity` (
  `id_activity` int NOT NULL AUTO_INCREMENT,
  `sport` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_activity`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `activity`
--

INSERT INTO `activity` (`id_activity`, `sport`) VALUES
(1, NULL),
(2, 'judo'),
(3, 'football'),
(4, 'natation'),
(5, 'cyclisme'),
(6, 'boxe');

-- --------------------------------------------------------

--
-- Structure de la table `school`
--

DROP TABLE IF EXISTS `school`;
CREATE TABLE IF NOT EXISTS `school` (
  `student_id` int NOT NULL AUTO_INCREMENT,
  `school_id` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `student_name` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `school`
--

INSERT INTO `school` (`student_id`, `school_id`, `student_name`) VALUES
(1, 'b', 'Abel'),
(2, 'b', 'Adon'),
(3, 'b', 'Akuma'),
(4, 'b', 'Balrog'),
(5, 'c', 'Blanka'),
(6, 'c', 'Cammy'),
(7, 'b', 'Cell'),
(8, 'a', 'Chun-Li'),
(9, 'b', 'Cody'),
(10, 'a', 'C. Viper'),
(11, 'b', 'Dan'),
(12, 'c', 'Dee Jay'),
(13, 'a', 'Dhalsim'),
(14, 'a', 'Dudley'),
(15, 'a', 'E. Honda'),
(16, 'a', 'El Fuerte'),
(17, 'a', 'Fei Long'),
(18, 'c', 'Gen'),
(19, 'b', 'Gouken'),
(20, 'c', 'Guile'),
(21, 'b', 'Guy'),
(22, 'b', 'Hakan'),
(23, 'c', 'Ibuki'),
(24, 'c', 'Juri'),
(25, 'c', 'Ken'),
(26, 'b', 'Makoto'),
(27, 'b', 'M. Bison'),
(28, 'a', 'Rose'),
(29, 'c', 'Rufus'),
(30, 'c', 'Ryu'),
(31, 'c', 'Sagat'),
(32, 'b', 'Sakura'),
(33, 'c', 'Seth'),
(34, 'b', 'Sangoku'),
(35, 'c', 'Sangohan'),
(36, 'c', 'Sangoten'),
(37, 'b', 'T. Hawk'),
(38, 'b', 'Vega'),
(39, 'c', 'Zangief'),
(40, 'c', 'Evil Ryu'),
(41, 'b', 'Yang'),
(42, 'c', 'Yun'),
(43, 'b', 'Violent Ken');

-- --------------------------------------------------------

--
-- Structure de la table `student_activity`
--

DROP TABLE IF EXISTS `student_activity`;
CREATE TABLE IF NOT EXISTS `student_activity` (
  `id_student` int DEFAULT NULL,
  `id_sport` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `student_activity`
--

INSERT INTO `student_activity` (`id_student`, `id_sport`) VALUES
(1, 5),
(1, 3),
(2, 5),
(2, 4),
(3, 3),
(3, 6),
(4, 4),
(4, 3),
(4, 5),
(5, 2),
(6, 5),
(7, 6),
(8, 3),
(9, 2),
(9, 5),
(9, 1),
(10, 1),
(10, 6),
(11, 1),
(11, 5),
(12, 3),
(12, 1),
(13, 3),
(13, 3),
(13, 4),
(14, 5),
(14, 4),
(15, 5),
(15, 5),
(16, 6),
(16, 4),
(16, 1),
(17, 3),
(17, 5),
(18, 4),
(18, 5),
(19, 6),
(19, 1),
(20, 3),
(20, 5),
(20, 5),
(21, 5),
(21, 4),
(22, 6),
(22, 4),
(23, 1),
(24, 2),
(24, 2),
(24, 2),
(25, 5),
(26, 3),
(26, 1),
(27, 1),
(27, 5),
(28, 1),
(28, 5),
(29, 5),
(30, 3),
(30, 3),
(30, 6),
(31, 3),
(32, 5),
(32, 5),
(33, 3),
(33, 6),
(34, 1),
(35, 3),
(35, 5),
(35, 6),
(36, 5),
(36, 3),
(36, 4),
(37, 1),
(38, 1),
(39, 4),
(39, 3),
(39, 4),
(40, 5),
(40, 4),
(41, 1),
(42, 1),
(42, 2),
(43, 1),
(43, 4);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
