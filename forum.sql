-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Ven 02 Juin 2017 à 21:51
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `forum`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `Cat_id` int(11) NOT NULL,
  `Cat_name` text NOT NULL,
  `Cat_order` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `forum`
--

CREATE TABLE `forum` (
  `Forum_id` int(11) NOT NULL,
  `Cat_id` int(11) NOT NULL,
  `Forum_name` text NOT NULL,
  `Forum_desc` int(11) NOT NULL,
  `Forum_order` int(11) NOT NULL,
  `Last_post` text NOT NULL,
  `Forum_topic` text NOT NULL,
  `Forum_post` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `members`
--

CREATE TABLE `members` (
  `Member_id` int(11) NOT NULL,
  `Member_pseudo` varchar(15) DEFAULT NULL,
  `Member_passwd` varchar(30) DEFAULT NULL,
  `Member_email` varchar(50) DEFAULT NULL,
  `Member_admin` int(11) DEFAULT '0',
  `Member_ban` int(11) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `members`
--

INSERT INTO `members` (`Member_id`, `Member_pseudo`, `Member_passwd`, `Member_email`, `Member_admin`, `Member_ban`) VALUES
(1, 'leo62220', 'testmdp', 'leo@free.fr', 1, 0),
(7, 'antoine', 'antoine', 'antoine@antoine.fr', 0, 1),
(8, 'Alex', 'laex', 'alex@alex.alex', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `responses`
--

CREATE TABLE `responses` (
  `responses_id` int(11) NOT NULL,
  `topic_id` int(11) DEFAULT NULL,
  `responses_content` varchar(50) DEFAULT NULL,
  `responses_creator` varchar(15) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `responses`
--

INSERT INTO `responses` (`responses_id`, `topic_id`, `responses_content`, `responses_creator`) VALUES
(20, 36, 'Ok viens sur facebook ', 'antoine'),
(19, 35, 'Yep ! ', 'antoine'),
(21, 37, 'peut être sale fainéant  ', 'leo62220'),
(17, 33, 'Merci mec c\'était trop bon ! ', 'antoine'),
(16, 31, 'D\'accord, merci ! ', 'leo62220'),
(15, 32, 'Regarde le cours voyons ! ', 'leo62220'),
(14, 31, 'Va voir la biblio ', 'antoine');

-- --------------------------------------------------------

--
-- Structure de la table `test`
--

CREATE TABLE `test` (
  `post_content` varchar(100) NOT NULL,
  `post_name` varchar(50) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `test`
--

INSERT INTO `test` (`post_content`, `post_name`, `post_id`) VALUES
('', '', 1),
('', '', 2),
(' azerty', 'Bonjour', 3),
('', '', 4),
('', '', 5),
(' azerty', 'Bonjour', 6),
(' president', 'Lele', 7),
(' Je fais mon mpm', 'New topic', 8);

-- --------------------------------------------------------

--
-- Structure de la table `topic`
--

CREATE TABLE `topic` (
  `Topic_id` int(11) NOT NULL,
  `Forum_id` int(11) DEFAULT NULL,
  `Topic_title` varchar(50) DEFAULT NULL,
  `Topic_creator` varchar(50) DEFAULT NULL,
  `Topic_date` date DEFAULT NULL,
  `Topic_content` text NOT NULL,
  `Topic_genre` varchar(40) DEFAULT NULL,
  `Topic_grade` int(11) DEFAULT NULL,
  `Topic_first post` text,
  `Topic_last_post` text,
  `responses` varchar(150) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `topic`
--

INSERT INTO `topic` (`Topic_id`, `Forum_id`, `Topic_title`, `Topic_creator`, `Topic_date`, `Topic_content`, `Topic_genre`, `Topic_grade`, `Topic_first post`, `Topic_last_post`, `responses`) VALUES
(36, NULL, 'Matrice', 'leo62220', NULL, 'aidez nous à résoudre le problème qu\'on a eu hier svp ', 'Mathematiques', NULL, NULL, NULL, NULL),
(37, NULL, 'L\'espagnol..', 'antoine', NULL, 'ça va être facultatif ? ', 'Langues', NULL, NULL, NULL, NULL),
(35, NULL, 'J\'adore le MPM', 'leo62220', NULL, 'c\'était un chouette projet ! ', 'Informatique', NULL, NULL, NULL, NULL),
(33, NULL, 'Une bonne tarte aux pommes', 'leo62220', NULL, 'Salut, vous trouverez ci joint un lien pour une tarte aux pommes : \r\nhttp://www.marmiton.org/recettes/recettes-incontournables-detail_tarte-aux-pommes_r_34.aspx', 'Cuisine', NULL, NULL, NULL, NULL),
(32, NULL, 'Aide pour les matrices', 'antoine', NULL, 'Comment on calcul le déterminant d\'une matrice 4x4 ? ', 'Informatique', NULL, NULL, NULL, NULL),
(31, NULL, 'Aide pour le C', 'leo62220', NULL, 'Je voudrais savoir comment installer la SDL 2 ', 'Informatique', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `topic_post`
--

CREATE TABLE `topic_post` (
  `Post_id` int(11) NOT NULL,
  `Topic_id` int(11) NOT NULL,
  `Post_creator` varchar(50) NOT NULL,
  `Post_name` varchar(50) NOT NULL,
  `Post_date` date NOT NULL,
  `Post_content` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`Cat_id`);

--
-- Index pour la table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`Forum_id`);

--
-- Index pour la table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`Member_id`);

--
-- Index pour la table `responses`
--
ALTER TABLE `responses`
  ADD PRIMARY KEY (`responses_id`);

--
-- Index pour la table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`post_id`);

--
-- Index pour la table `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`Topic_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `members`
--
ALTER TABLE `members`
  MODIFY `Member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `responses`
--
ALTER TABLE `responses`
  MODIFY `responses_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT pour la table `test`
--
ALTER TABLE `test`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `topic`
--
ALTER TABLE `topic`
  MODIFY `Topic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
