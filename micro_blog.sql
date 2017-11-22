-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `micro_blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `contenu` text NOT NULL,
  `date` int(100) NOT NULL,
  `id_utilisateurs` int(11) NOT NULL,
  `votes` int(11),
  `derniereIP` varchar(20) 
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `messages`
--

INSERT INTO `messages` (`id`, `contenu`, `date`, `id_utilisateurs`) VALUES
(91, 'Try', 1484776118, 4),
(86, 'Test Gadhena\r\n', 1484664281, 1),
(85, 'Test Delattre', 1484664180, 2),
(82, 'Test 12', 1484663939, 1),
(89, 'zacharie essombe', 1484842030, 1),
(88, 'delattre', 1484664535, 2),
(1, 'Test de nouveau message', 1488484370, 1);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `nom` varchar(60) NOT NULL,
  `prenom` varchar(60) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `sid` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `prenom`, `email`, `mdp`, `pseudo`, `sid`) VALUES
(1, '', '', 'thomas_delattre@hotmail.fr', 'ab4f63f9ac65152575886860dde480a1', 'Gadhena', '83182203d2c88d7281b459ffbd1ebf70'),
(2, '', '', 'thomas@hotmail.fr', 'ab4f63f9ac65152575886860dde480a1', 'Delattre Thomas', 'd4ba00cd3951cd7a42bb0e058066fd43'),
(3, 'Delattre', 'Thomas', 'truman.harry@hotmail.fr', 'ab4f63f9ac65152575886860dde480a1', 'Elthari', '0546c8ff2196cfd7c9dc31c9da804f11'),
(4, 'Zacharie', 'Essombe', 'zac@hotmail.fr', 'ab4f63f9ac65152575886860dde480a1', 'ZE07', '9713ba24f2398e572f5908c32774a499'),
(5, 'Delattre', 't', '', 'd41d8cd98f00b204e9800998ecf8427e', '', NULL),
(6, 'Mathias', 'Anais', 'anais@hotmail.fr', 'b6edd10559b20cb0a3ddaeb15e5267cc', 'anais.mathias', '677f44d7b2988070981ca1d9abe1bf2b'),
(1, 'Admin', 'Admin', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', 'Admin', '7d1d7c9c1b7acfe0465891befda2cf77');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_utilisateurs` (`id_utilisateurs`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pseudo` (`pseudo`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;
--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`

  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
