-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 15 déc. 2022 à 19:18
-- Version du serveur : 10.4.25-MariaDB
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `rpg_aventure`
--

-- --------------------------------------------------------

--
-- Structure de la table `boss`
--

CREATE TABLE `boss` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `pv` int(11) NOT NULL,
  `atk` int(11) NOT NULL,
  `def` int(11) NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `boss`
--

INSERT INTO `boss` (`id`, `name`, `pv`, `atk`, `def`, `img`) VALUES
(1, 'Crow', 200, 35, 14, 'Crow.png');

-- --------------------------------------------------------

--
-- Structure de la table `classesjouable`
--

CREATE TABLE `classesjouable` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `pv` int(11) NOT NULL,
  `pm` int(11) NOT NULL,
  `atk` int(11) NOT NULL,
  `def` int(11) NOT NULL,
  `sort` text NOT NULL,
  `coutPm` int(11) NOT NULL,
  `regen` int(11) NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `classesjouable`
--

INSERT INTO `classesjouable` (`id`, `name`, `pv`, `pm`, `atk`, `def`, `sort`, `coutPm`, `regen`, `img`) VALUES
(1, 'Guerrier', 150, 50, 23, 7, 'Boost', 2, 45, 'guerrier.png'),
(2, 'mage', 100, 150, 15, 5, 'Boule de Feu', 5, 35, 'mage.png');

-- --------------------------------------------------------

--
-- Structure de la table `monster`
--

CREATE TABLE `monster` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `pv` int(11) NOT NULL,
  `atk` int(11) NOT NULL,
  `def` int(11) NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `monster`
--

INSERT INTO `monster` (`id`, `name`, `pv`, `atk`, `def`, `img`) VALUES
(1, 'Orc', 70, 15, 5, 'orc.png'),
(2, 'Urukai', 90, 20, 8, 'urukai.png'),
(3, 'Gobelin', 50, 10, 3, 'gobelin.png'),
(4, 'Dragon', 120, 20, 12, 'dragon.png');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `boss`
--
ALTER TABLE `boss`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `classesjouable`
--
ALTER TABLE `classesjouable`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `monster`
--
ALTER TABLE `monster`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `boss`
--
ALTER TABLE `boss`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `classesjouable`
--
ALTER TABLE `classesjouable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `monster`
--
ALTER TABLE `monster`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
