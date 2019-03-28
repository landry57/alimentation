-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  jeu. 28 mars 2019 à 21:29
-- Version du serveur :  10.1.37-MariaDB
-- Version de PHP :  7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `produit_v`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'legumes'),
(2, 'cereales'),
(3, 'fruits'),
(4, 'feculents'),
(5, 'feuilles et bulbes');

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

CREATE TABLE `compte` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sum` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `datsend` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `compte`
--

INSERT INTO `compte` (`id`, `user_id`, `sum`, `code`, `datsend`) VALUES
(18, 2, '11045', '', '2019-03-27 20:53:36'),
(19, 3, '11545', '', '2019-03-28 10:15:42'),
(23, 11, '9200', '', '2019-03-28 20:11:50');

-- --------------------------------------------------------

--
-- Structure de la table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `image` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `items`
--

INSERT INTO `items` (`id`, `name`, `description`, `price`, `image`, `category_id`) VALUES
(4, 'Violette', 'utilisé pour les menus comme le tchep:(vendu par nombre de kilo)', 400, 'au1.jpeg', 1),
(5, 'Aubergine blanche', 'utilisée pour une délicieuse sauce:(vendu par nombre de kilo)', 450, 'auber.jpeg', 1),
(6, 'Tomate', 'utilisée des sauce comme la Sauce Bolognaise(vendue par kilo)', 500, 'to4.jpg', 1),
(7, 'Piment', 'vendu par kilo', 300, 'p.jpeg', 1),
(8, 'piment', 'piement', 350, 'piment1.jpeg', 1),
(9, 'maïs', 'maïs', 250, 'mai.jpeg', 2),
(10, 'Riz locale', 'riz', 450, 'rizlo.jpeg', 2);

-- --------------------------------------------------------

--
-- Structure de la table `recharge`
--

CREATE TABLE `recharge` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sum` float NOT NULL,
  `code` varchar(100) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `q` varchar(255) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `sales`
--

INSERT INTO `sales` (`id`, `user_id`, `prod_id`, `q`, `date`) VALUES
(42, 11, 4, '2', '2019-03-28 20:12:46');

-- --------------------------------------------------------

--
-- Structure de la table `ussers`
--

CREATE TABLE `ussers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ussers`
--

INSERT INTO `ussers` (`id`, `name`, `lastname`, `email`, `tel`, `password`) VALUES
(2, 'fofana', 'landry', 'landry.fof@yahoo.com', '+22567890090', '7c4a8d09ca3762af61e59520943dc26494f8941b'),
(3, 'marceline', 'silue', 'marceline@gmail.com', '+22556789034', '7c4a8d09ca3762af61e59520943dc26494f8941b'),
(10, 'kone', 'lacina', 'la@gmail.com', '+2256787900', '7c4a8d09ca3762af61e59520943dc26494f8941b'),
(11, 'coulibaly', 'fanta', 'fanta@gmail.com', '+22588657900', '7c4a8d09ca3762af61e59520943dc26494f8941b');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `compte`
--
ALTER TABLE `compte`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `recharge`
--
ALTER TABLE `recharge`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ussers`
--
ALTER TABLE `ussers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `compte`
--
ALTER TABLE `compte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `recharge`
--
ALTER TABLE `recharge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT pour la table `ussers`
--
ALTER TABLE `ussers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
