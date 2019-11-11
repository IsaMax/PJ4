-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  jeu. 07 nov. 2019 à 18:20
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet_4`
--

-- --------------------------------------------------------

--
-- Structure de la table `billets`
--

CREATE TABLE `billets` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `contenu` text NOT NULL,
  `date_billet` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lien_image` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `billets`
--

INSERT INTO `billets` (`id`, `titre`, `contenu`, `date_billet`, `lien_image`) VALUES
(1, 'Lorem Ipsum 1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2019-10-25 12:55:23', NULL),
(2, 'Lorem Ipsum 2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"', '2019-10-25 12:55:23', NULL),
(3, 'Lorem Ipsum 3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2019-10-25 12:55:53', NULL),
(4, 'Lorem Ipsum 4', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"', '2019-10-25 12:55:53', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `id` int(11) NOT NULL,
  `id_billet` int(11) NOT NULL,
  `pseudo` varchar(255) DEFAULT NULL,
  `commentaire` text NOT NULL,
  `date_commentaire` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `signalement` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `id_billet`, `pseudo`, `commentaire`, `date_commentaire`, `signalement`) VALUES
(1, 1, 'Monsieur Lorem', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '2019-10-25 12:57:35', 0),
(2, 1, 'Monsieur lorem 2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '2019-10-25 12:57:35', 0),
(3, 3, 'Monsieur Lorem', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '2019-10-25 12:57:54', 1),
(4, 2, 'Monsieur lorem 3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '2019-10-25 12:57:54', 0),
(5, 4, NULL, 'Ce chapitre est excellent !', '2019-10-26 19:03:18', 0),
(6, 4, NULL, 'Ce chapitre est excellent !', '2019-10-26 19:08:14', 1),
(7, 4, NULL, 'Ce chapitre est excellent !', '2019-10-26 19:08:44', 1),
(8, 4, NULL, 'Ce chapitre est excellent !', '2019-10-26 19:09:26', 1),
(9, 4, NULL, 'Ce chapitre est excellent !', '2019-10-26 19:10:25', 1),
(10, 4, NULL, 'Ce chapitre est excellent !', '2019-10-26 19:17:45', 0),
(11, 4, NULL, 'Ce chapitre est excellent !', '2019-10-26 19:19:27', 0),
(12, 4, NULL, 'Ce chapitre est excellent !', '2019-10-26 19:19:36', 0),
(13, 4, NULL, 'Ce chapitre est excellent !', '2019-10-26 19:22:41', 0),
(14, 4, NULL, 'Ce chapitre est excellent !', '2019-10-26 19:23:05', 0),
(15, 4, NULL, 'Ce chapitre est excellent !', '2019-10-26 19:24:41', 0),
(16, 4, NULL, 'Ce chapitre est excellent !', '2019-10-26 19:25:23', 0),
(17, 4, NULL, 'Ce chapitre est excellent !', '2019-10-26 19:27:29', 0),
(18, 4, NULL, 'encore un commentaire', '2019-10-30 14:20:13', 0),
(19, 4, NULL, 'encore un commentaire', '2019-10-30 14:24:25', 0),
(39, 4, NULL, 'bonjour ajax', '2019-10-30 14:45:53', 0),
(40, 4, NULL, 'dsfdssff sdf', '2019-10-30 15:22:57', 0),
(41, 4, NULL, 'encore un ', '2019-10-30 15:23:55', 0),
(42, 4, NULL, 'f', '2019-10-30 15:24:02', 0),
(43, 4, NULL, 'eze zefezf ', '2019-10-30 15:24:07', 0),
(44, 4, NULL, 'zef ', '2019-10-30 15:24:14', 0),
(45, 4, NULL, 'efsdf ', '2019-10-30 15:25:05', 0),
(46, 4, NULL, 'eee', '2019-10-30 15:25:12', 0),
(47, 4, NULL, 'sfds', '2019-10-30 15:25:17', 0),
(48, 4, NULL, 'ezr ez', '2019-10-30 15:25:28', 0),
(49, 4, NULL, 'fg fgfg', '2019-10-30 15:25:36', 0);

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `contenu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `prenom`, `mail`, `contenu`) VALUES
(1, 'max', 'maxime.isambert@gmail.com', 'bonjoir et bienvenue');

-- --------------------------------------------------------

--
-- Structure de la table `reponse_commentaire`
--

CREATE TABLE `reponse_commentaire` (
  `id` int(11) NOT NULL,
  `id_parent` int(11) NOT NULL,
  `pseudo` varchar(255) DEFAULT NULL,
  `commentaire` text NOT NULL,
  `date_reponse` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `signalement` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reponse_commentaire`
--

INSERT INTO `reponse_commentaire` (`id`, `id_parent`, `pseudo`, `commentaire`, `date_reponse`, `signalement`) VALUES
(54, 7, NULL, 'oui trop :)', '2019-10-29 19:33:52', 0),
(55, 5, NULL, 'fdfdfdfdf dfdfdfd', '2019-10-29 19:34:32', 0),
(56, 15, NULL, 'blabla ', '2019-10-29 19:34:50', 0),
(57, 12, NULL, 'hého', '2019-10-29 19:58:25', 0),
(58, 5, NULL, 'ouioui', '2019-10-30 12:04:00', 0),
(59, 15, NULL, 'hoooo ho', '2019-10-30 12:18:16', 0),
(60, 5, NULL, 'commentaire de rép', '2019-10-30 14:55:27', 0),
(61, 5, NULL, 'cart', '2019-10-30 14:57:54', 0),
(62, 5, NULL, 'hopla', '2019-10-30 15:22:39', 0),
(63, 5, NULL, 'reponse ', '2019-10-30 15:42:26', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `billets`
--
ALTER TABLE `billets`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reponse_commentaire`
--
ALTER TABLE `reponse_commentaire`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `billets`
--
ALTER TABLE `billets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `reponse_commentaire`
--
ALTER TABLE `reponse_commentaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
