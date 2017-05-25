-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Ven 19 Mai 2017 à 07:04
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
  `Member_email` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `members`
--

INSERT INTO `members` (`Member_id`, `Member_pseudo`, `Member_passwd`, `Member_email`) VALUES
(1, 'leo62220', 'testmdp', 'leo@free.fr'),
(7, 'antoine', 'antoine', 'antoine@antoine.fr'),
(8, 'Alex', 'laex', 'alex@alex.alex');

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
(1, 21, ' regarde internet\r\n', NULL),
(2, 18, ' regarde le cours', NULL),
(3, 18, ' regarde le cours', NULL),
(4, 18, ' Non va voir le prof', NULL),
(5, 17, ' A faire passer un string en int', NULL),
(6, 17, ' A rien', NULL);

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
(1, 0, 'J\'ai du mal en maths', 'Landry', '2017-05-07', 'Bonjour je recherche quelqu\'un qui puisse m\'aider a reviser les applications lineaires merci', 'Mathematiques', 1, '', '', NULL),
(2, NULL, 'Test', NULL, NULL, 'test', NULL, NULL, NULL, NULL, NULL),
(3, NULL, 'MPM', 'leo62220', NULL, 'Je suis maintenant capable de lancer un topic', NULL, NULL, NULL, NULL, NULL),
(4, NULL, 'SDA', 'leo62220', NULL, 'Comment on fait une boucle ?', 'Informatique', NULL, NULL, NULL, NULL),
(5, NULL, 'zsdqdfsdd', 'leo62220', NULL, 'Comment calculer le déterminant d\'une matrice carre ? ', 'Mathématiques ', NULL, NULL, NULL, NULL),
(22, NULL, 'Structure SDA', 'Alex', NULL, 'Comment on fait une struct', 'Informatique', NULL, NULL, NULL, NULL),
(21, NULL, 'Canvas', 'antoine', NULL, 'Comment on creer un canvas ?', 'Informatique', NULL, NULL, NULL, ' Regarde internet'),
(20, NULL, '', '', NULL, '', '', NULL, NULL, NULL, ' BONJOUR'),
(14, NULL, 'My topic', 'leo62220', NULL, 'Comment determiné une droite de charge ?', 'Industriel', NULL, NULL, NULL, NULL),
(17, NULL, 'azerty', 'leo62220', NULL, 'A quoi sert la fonction atoi ?', 'Informatique', NULL, NULL, NULL, ' A convertir un int en string'),
(18, NULL, 'ENI', 'leo62220', NULL, 'Comment faire une droite de charge\r\n', 'Industriel', NULL, NULL, NULL, NULL);

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
  MODIFY `responses_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `test`
--
ALTER TABLE `test`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `topic`
--
ALTER TABLE `topic`
  MODIFY `Topic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
