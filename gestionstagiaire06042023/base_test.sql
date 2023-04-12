-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 04 avr. 2023 à 15:59
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `base_test`
--

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

CREATE TABLE `groupe` (
  `id` int(11) NOT NULL,
  `nomg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `groupe`
--

INSERT INTO `groupe` (`id`, `nomg`) VALUES
(1, 'dev104'),
(5, 'dev110'),
(6, 'dev102'),
(7, 'dev209'),
(8, 'dev203');

-- --------------------------------------------------------

--
-- Structure de la table `stagiaire`
--

CREATE TABLE `stagiaire` (
  `id` int(11) NOT NULL,
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `date_nais` date NOT NULL,
  `avatarurl` text DEFAULT NULL,
  `avatartype` text DEFAULT NULL,
  `cvurl` text DEFAULT NULL,
  `cvtype` text DEFAULT NULL,
  `idg` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `stagiaire`
--

INSERT INTO `stagiaire` (`id`, `nom`, `prenom`, `date_nais`, `avatarurl`, `avatartype`, `cvurl`, `cvtype`, `idg`) VALUES
(1, 'ELassali', 'ghita', '2000-11-29', './avatars/avatar4.jpg', 'image/jpeg', './cvs/cv1.pdf', 'application/pdf', 5),
(2, 'ELBARJAOUI', 'ahmed', '1998-09-29', './avatars/avatar1.png', 'image/png', './cvs/cv4.pdf', 'application/pdf', 7),
(3, 'sghir', 'houda', '2001-07-01', './avatars/avatar5.jpg', 'image/jpeg', './cvs/cv2.pdf', 'application/pdf', 1),
(4, 'drkaoui', 'aissam', '1996-12-30', './avatars/avatar2.png', 'image/png', './cvs/cv4.pdf', 'application/pdf', 8);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `groupe`
--
ALTER TABLE `groupe`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `stagiaire`
--
ALTER TABLE `stagiaire`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Fk_stagiaire_groupe` (`idg`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `groupe`
--
ALTER TABLE `groupe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `stagiaire`
--
ALTER TABLE `stagiaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `stagiaire`
--
ALTER TABLE `stagiaire`
  ADD CONSTRAINT `Fk_stagiaire_groupe` FOREIGN KEY (`idg`) REFERENCES `groupe` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
