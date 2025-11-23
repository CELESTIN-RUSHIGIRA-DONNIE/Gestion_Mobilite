-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : sam. 22 nov. 2025 à 07:40
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projectb`
--

-- --------------------------------------------------------

--
-- Structure de la table `agents`
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



CREATE TABLE `demande_bourse` (
  `id` int(11) NOT NULL,
  `code_bourse` varchar(255) NOT NULL,
  `type_bourse` varchar(200) DEFAULT NULL,
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
  `status` varchar(200) NOT NULL DEFAULT 'null'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `demande_bourse`
--

INSERT INTO `demande_bourse` (`id`, `code_bourse`, `type_bourse`, `pays`, `date_debut_bourse`, `duree_bourse`, `ver_doyen`, `ver_sgr`, `ver_acad`, `ver_rect`, `date_ver_doyen`, `date_ver_sgr`, `date_ver_acad`, `date_ver_rect`, `id_doyen`, `id_sgr`, `id_acad`, `id_rect`, `id_ut_bour_fk`, `date_enre_bourse`, `type_mobilite`, `objectif_mobilite`, `dure_sejour`, `organisation_accueil`, `programme_intervention`, `date_depart`, `date_retour`, `finance_mobilite`, `soutient_uea`, `status`) VALUES
(3, 'BOU2025111819280783', NULL, NULL, NULL, NULL, 'no_verify', 'no_verify', 'no_verify', 'no_verify', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, '2025-11-18 18:28:07', 'dbfdsdfcv', 'rdfdwerre', 'dfbf', '', 'dfee', '2025-11-19', '2026-02-19', 'usa', 'added', 'en attente');

-- --------------------------------------------------------

--
-- Structure de la table `departement`
--

CREATE TABLE `departement` (
  `id` int(11) NOT NULL,
  `id_faculte` int(11) NOT NULL,
  `nom` varchar(200) NOT NULL,
  `designation` varchar(200) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `departement`
--

INSERT INTO `departement` (`id`, `id_faculte`, `nom`, `designation`, `id_user`) VALUES
(1, 1, 'Economie Rurale', 'Eco Rur', 0),
(3, 2, 'Relation Internationale', 'ReInt', 10);

-- --------------------------------------------------------

--
-- Structure de la table `faculte`
--

CREATE TABLE `faculte` (
  `id` int(11) NOT NULL,
  `nom` varchar(200) NOT NULL,
  `designation` varchar(200) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `faculte`
--

INSERT INTO `faculte` (`id`, `nom`, `designation`, `id_user`) VALUES
(1, 'Economie', 'Fac Eco', 0),
(2, 'Science Sociale', 'Fac TS', 0),
(4, 'Medecine', 'FacMed', 10);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `reset_token_hash` (`reset_token_hash`);

--
-- Index pour la table `demande_bourse`
--
ALTER TABLE `demande_bourse`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `departement`
--
ALTER TABLE `departement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_faculte` (`id_faculte`);

--
-- Index pour la table `faculte`
--
ALTER TABLE `faculte`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `agents`
--
ALTER TABLE `agents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `demande_bourse`
--
ALTER TABLE `demande_bourse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `departement`
--
ALTER TABLE `departement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `faculte`
--
ALTER TABLE `faculte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `departement`
--
ALTER TABLE `departement`
  ADD CONSTRAINT `departement_ibfk_1` FOREIGN KEY (`id_faculte`) REFERENCES `faculte` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
