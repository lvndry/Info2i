-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Lun 08 Mai 2017 à 14:56
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `Info2i`
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
  `Member_id` int(11) NOT NULL AUTO_INCREMENT,
  `Member_pseudo` varchar(15) ,
  `Member_passwd` varchar(30) ,
  -- `Member_email` varchar(40) NOT NULL AUTO_INCREMENT,
  -- `Member_avatar` text NOT NULL AUTO_INCREMENT,
  -- `Member_localisation` text NOT NULL AUTO_INCREMENT,
  -- `Member_last_visit` date NOT NULL AUTO_INCREMENT,
  -- `Membe_rank` int(11) NOT NULL AUTO_INCREMENT,
  -- `Member_admin` int(11) NOT NULL AUTO_INCREMENT,
  -- `Member_posts` text NOT NULL AUTO_INCREMENT,
  PRIMARY KEY(Member_id)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT = 7;

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
  `Topic_name` varchar(100) NOT NULL,
  `Forum_id` int(11) NOT NULL,
  `Topic_title` varchar(50) NOT NULL,
  `Topic_creator` varchar(50) NOT NULL,
  `Topic_date` date NOT NULL,
  `Topic_content` text NOT NULL,
  `Topic_genre` varchar(40) NOT NULL,
  `Topic_grade` int(11) NOT NULL,
  `Topic_first post` text NOT NULL,
  `Topic_last_post` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `topic`
--

INSERT INTO `topic` (`Topic_id`, `Topic_name`, `Forum_id`, `Topic_title`, `Topic_creator`, `Topic_date`, `Topic_content`, `Topic_genre`, `Topic_grade`, `Topic_first post`, `Topic_last_post`) VALUES
(1, 'J\'ai du mal en maths', 0, 'J\'ai du mal en maths', 'Landry', '2017-05-07', 'Bonjour je recherche quelqu\'un qui puisse m\'aider a reviser les applications lineaires merci', 'Mathematiques', 1, '', '');

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
-- Index pour la table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`post_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `test`
--
ALTER TABLE `test`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

use forum;

delete from members;

insert into members values (1,'leo62220','testmdp');