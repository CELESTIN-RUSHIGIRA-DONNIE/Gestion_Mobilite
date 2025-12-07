-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2025 at 10:16 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gestion_mobilite`
--

-- --------------------------------------------------------

--
-- Table structure for table `agents`
--

CREATE TABLE `agents` (
  `id` int(11) NOT NULL,
  `code_agent` varchar(200) NOT NULL,
  `nom` varchar(200) DEFAULT NULL,
  `postnom` varchar(200) DEFAULT NULL,
  `prenom` varchar(200) DEFAULT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `matricule` varchar(200) NOT NULL,
  `Grade` varchar(200) DEFAULT NULL,
  `sexe` varchar(20) DEFAULT NULL,
  `date_nais` varchar(50) DEFAULT NULL,
  `adress` varchar(200) DEFAULT NULL,
  `telephone` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `role` varchar(254) DEFAULT NULL,
  `id_ut_fk` int(11) NOT NULL,
  `id_faculte` int(11) DEFAULT NULL,
  `id_departement` int(11) DEFAULT NULL,
  `date_enre` timestamp NOT NULL DEFAULT current_timestamp(),
  `reset_token_hash` varchar(100) DEFAULT NULL,
  `reset_token_expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `agents`
--

INSERT INTO `agents` (`id`, `code_agent`, `nom`, `postnom`, `prenom`, `photo`, `matricule`, `Grade`, `sexe`, `date_nais`, `adress`, `telephone`, `email`, `password`, `role`, `id_ut_fk`, `id_faculte`, `id_departement`, `date_enre`, `reset_token_hash`, `reset_token_expires_at`) VALUES
(2, 'AG2025112612035663', 'ELIENAI', 'KANEFU', 'BUCHAKUZI', 'face18.jpg', '3040', 'Proffeseur', 'Male', '17 November, 2025', 'BUKAVU', '0997746535', 'elienaikanefu@gmail.com', '$2y$10$eh5dyHlGWSAWbWNvLT5uueaDa1CKTTFIEHaxVXwUKNEutywjmGYTm', 'DOYEN', 1, 3, 4, '2025-11-26 11:03:56', NULL, NULL),
(3, 'AG2025112621485130', 'DONNIE ', 'RONDE', 'Theophile', 'user8-128x128.jpg', '841', 'Proffeseur', 'Female', '26 November, 2025', 'Uvira, Kasenga, av Membo n6', '0976089545', 'donnie@gmail.com', '$2y$10$4fPGE.EQmVDjDolYs51bA.AnaYAUlNofC1tlnuEGWuos.ePe1MdnW', 'SGAC', 1, 0, 1, '2025-11-26 20:48:51', NULL, NULL),
(4, 'AG2025112621491313', 'RECTRICE', 'FATUMA', 'ASSANI', 'user7-128x128.jpg', '1234', 'Proffeseure', 'Female', '7 May, 2023', 'BUKAVU', '0991123891', 'cele@gmail.com', '$2y$10$rmPiAdpWrZXqmR00uHyIN.NrlawL5cc3YPPoyYshplV0QQtU20ho6', 'RECTORAT', 1, 2, 2, '2025-11-26 20:49:13', NULL, NULL),
(8, 'AG2025120413135314', 'CELESTIN', 'RUSHIGIRA', 'DONNIE', '2.jpg', '21IGGJ119426', 'Proffeseur', 'Male', '27 December, 2025', 'BUKAVU', '0979599841', 'celestinrushigiradonnie@gmail.com', '$2y$10$kfrDoUDzwJcvOhQlryFN8O6T3pLxUt/52YXR3YL6t5qMzH7omGE4i', 'SGR', 2, 2, 2, '2025-12-04 12:13:53', NULL, NULL),
(14, 'AG2025120509550587', 'BALLY', 'KASAMBI', 'IT', '7.jpg', '1100', 'Assistant', 'Male', '26 December, 2025', 'BUKAVU', '0991123891', 'kasambi@gmail.com', '$2y$10$ml3tEqVK3LSa2eUUay0MV.2knrufpWzWllaTKbLJGNngL/tqE7HeK', 'Personnel', 8, 1, 1, '2025-12-05 08:55:05', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `demande_bourse`
--

CREATE TABLE `demande_bourse` (
  `id` int(11) NOT NULL,
  `code_bourse` varchar(255) NOT NULL,
  `pays` varchar(200) DEFAULT NULL,
  `date_debut_bourse` date DEFAULT NULL,
  `duree_bourse` varchar(200) DEFAULT NULL,
  `ver_doyen` varchar(50) DEFAULT 'no_verify',
  `ver_sgr` varchar(50) DEFAULT 'no_verify',
  `ver_acad` varchar(50) DEFAULT 'no_verify',
  `ver_rect` varchar(50) DEFAULT 'no_verify',
  `date_ver_doyen` date DEFAULT NULL,
  `date_ver_sgr` date DEFAULT NULL,
  `date_ver_acad` date DEFAULT NULL,
  `date_ver_rect` date DEFAULT NULL,
  `id_doyen` int(11) DEFAULT NULL,
  `id_sgr` int(11) DEFAULT NULL,
  `id_acad` int(11) DEFAULT NULL,
  `id_rect` int(11) DEFAULT NULL,
  `id_ut_bour_fk` int(11) NOT NULL,
  `date_enre_bourse` timestamp NOT NULL DEFAULT current_timestamp(),
  `type_mobilite` varchar(200) NOT NULL,
  `objectif_mobilite` varchar(200) NOT NULL,
  `dure_sejour` varchar(200) NOT NULL,
  `organisation_accueil` varchar(200) NOT NULL,
  `programme_intervention` varchar(200) NOT NULL,
  `date_depart` date NOT NULL,
  `date_retour` date NOT NULL,
  `finance_mobilite` varchar(200) NOT NULL,
  `soutient_uea` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL DEFAULT 'null',
  `avis_doyen` varchar(300) DEFAULT NULL,
  `justification_doyen` varchar(300) DEFAULT NULL,
  `contrat_bourse` varchar(200) DEFAULT NULL,
  `chemin_contrat` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departement`
--

CREATE TABLE `departement` (
  `id` int(11) NOT NULL,
  `id_faculte` int(11) NOT NULL,
  `nom_departement` varchar(200) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `departement`
--

INSERT INTO `departement` (`id`, `id_faculte`, `nom_departement`, `id_user`) VALUES
(1, 1, 'PEDIATRIE', 1),
(2, 2, 'Science de l\'eau et de sol', 1),
(3, 4, 'Economie Rurale', 8),
(4, 3, 'Resolution de Confli', 8),
(5, 4, 'Economie Monaitaire', 8);

-- --------------------------------------------------------

--
-- Table structure for table `faculte`
--

CREATE TABLE `faculte` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `designation` varchar(200) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculte`
--

INSERT INTO `faculte` (`id`, `name`, `designation`, `id_user`) VALUES
(1, 'MEDECINE', 'FAC-MED', 1),
(2, 'Agronomie et Environement', 'FAC AGRO', 1),
(3, 'Science Sociale', 'SC-S', 8),
(4, 'Sciece Economique et Gestion', 'SCEC-G', 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `demande_bourse`
--
ALTER TABLE `demande_bourse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departement`
--
ALTER TABLE `departement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculte`
--
ALTER TABLE `faculte`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agents`
--
ALTER TABLE `agents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `demande_bourse`
--
ALTER TABLE `demande_bourse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `departement`
--
ALTER TABLE `departement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `faculte`
--
ALTER TABLE `faculte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
