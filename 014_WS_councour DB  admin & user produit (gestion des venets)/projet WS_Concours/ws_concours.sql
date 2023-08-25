-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 06 jan. 2022 à 14:51
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
-- Base de données : `ws_concours`
--

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `idprod` int(11) NOT NULL,
  `refpdt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `libpdt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix` int(100) NOT NULL,
  `qte` int(100) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`idprod`, `refpdt`, `libpdt`, `prix`, `qte`, `description`, `image`, `type`) VALUES
(5, 'p456123', 'infinix hot 7 pro', 4000, 1, 'infinix hot 7 pro infinix hot 7 pro infinix hot 7 pro infinix hot 7 pro ', 'productimg/infinix-hot-7-pro.jpg', 'electronic'),
(6, 'p456123', 'iphone 11 pro', 40000, 2, 'iphone 11 pro iphone 11 pro iphone 11 pro iphone 11 pro iphone 11 pro ', 'productimg/iphone11pro.jpg', 'electronic');

-- --------------------------------------------------------

--
-- Structure de la table `type produit`
--

CREATE TABLE `type produit` (
  `idtype` int(11) NOT NULL,
  `type` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `type produit`
--

INSERT INTO `type produit` (`idtype`, `type`) VALUES
(1, 'electronique'),
(2, 'electricite'),
(3, 'informatique');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `idutil` int(11) NOT NULL,
  `login` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idutil`, `login`, `pass`, `type`) VALUES
(1, 'admin', 'admin', 'administrateur'),
(2, 'fadil', '1111', 'user'),
(3, 'teste', 'teste', 'user'),
(4, 'user', 'user', 'user'),
(5, 'user05', '0000', 'user');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`idprod`);

--
-- Index pour la table `type produit`
--
ALTER TABLE `type produit`
  ADD PRIMARY KEY (`idtype`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`idutil`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `idprod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `type produit`
--
ALTER TABLE `type produit`
  MODIFY `idtype` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `idutil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
