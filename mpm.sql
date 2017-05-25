-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Lun 15 Mai 2017 à 15:09
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mpm`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--
CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(30) collate latin1_general_ci NOT NULL,
  `cat_order` int(11) NOT NULL,
  PRIMARY KEY  (`cat_id`),
  UNIQUE KEY `cat_order` (`cat_order`)
);

-- --------------------------------------------------------

--
-- Structure de la table `forum`
--

CREATE TABLE `forum` (
  `forum_id` int(11) NOT NULL AUTO_INCREMENT,
  `forum_cat_id` mediumint(8) NOT NULL,
  `forum_name` varchar(30) collate latin1_general_ci NOT NULL,
  `forum_desc` text collate latin1_general_ci NOT NULL,
  `forum_ordre` mediumint(8) NOT NULL,
  `forum_last_post_id` int(11) NOT NULL,
  `forum_topic` mediumint(8) NOT NULL,
  `forum_post` mediumint(8) NOT NULL,
  PRIMARY KEY  (`forum_id`)
);

-- --------------------------------------------------------

--
-- Structure de la table `members`
--

CREATE TABLE `members` (
  `Member_id` int(11) NOT NULL AUTO_INCREMENT,
  `Member_pseudo` varchar(15) NOT NULL,
  `Member_passwd` varchar(30) NOT NULL,
  `Member_email` varchar(40) NOT NULL,
--  `Member_avatar` text,
--  `Member_localisation` text,
--  `Member_last_visit` date DEFAULT NULL,
--  `Member_rank` int(11) DEFAULT NULL,
--  `Member_admin` int(11) DEFAULT NULL,
--  `Member_posts` text
  PRIMARY KEY(Member_id)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `members`
--

INSERT INTO `members` (`Member_id`, `Member_pseudo`, `Member_passwd`, `Member_email`, `Member_avatar`, `Member_localisation`, `Member_last_visit`, `Member_rank`, `Member_admin`, `Member_posts`) VALUES
('0', 'azerty', 'qwerty', 'bonjour@bonjour.fr', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `members` (`Member_id`, `Member_pseudo`, `Member_passwd`, `Member_email`, `Member_avatar`, `Member_localisation`, `Member_last_visit`, `Member_rank`, `Member_admin`, `Member_posts`) VALUES ('1','leo6220','testmdp', 'bonjour@free.fr', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `members` (`Member_id`, `Member_pseudo`, `Member_passwd`, `Member_email`, `Member_avatar`, `Member_localisation`, `Member_last_visit`, `Member_rank`, `Member_admin`, `Member_posts`) VALUES ('2','landrybg','koala', 'bonjour@free.fr', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `topic`
--

CREATE TABLE `topic` (
  `Topic_id` int(11) NOT NULL AUTO_INCREMENT,
  `Forum_id` int(11) NOT NULL,
  `Topic_title` char(60) collate latin1_general_ci NOT NULL,
  `Topic_creator` int(11) NOT NULL,
  `Topic_view` mediumint(8) NOT NULL,
  `Topic_time` int(11) NOT NULL,
  `Topic_genre` varchar(30) collate latin1_general_ci NOT NULL,
  `Topic_last_post` int(11) NOT NULL,
  `Topic_first_post` int(11) NOT NULL,
  `Topic_post` mediumint(8) NOT NULL,
  PRIMARY KEY  (`topic_id`),
  UNIQUE KEY `topic_last_post` (`topic_last_post`)
);

INSERT INTO `topic` (`Topic_id`, `Topic_name`, `Forum_id`, `Topic_title`, `Topic_creator`, `Topic_date`, `Topic_content`, `Topic_genre`, `Topic_grade`, `Topic_first post`, `Topic_last_post`) VALUES
(1, 'J\'ai du mal en maths', 0, 'J\'ai du mal en maths', 'Landry', '2017-05-07', 'Bonjour je recherche quelqu\'un qui puisse m\'aider a reviser les applications lineaires merci', 'Mathematiques', 1, '', ''),
(2, 'ENI', 123, 'ENI', 'Petit leo', '2017-05-11', 'Comment on fait un branchement', 'ENI', 1, '', ''),
(3, 'qwerty', 1, 'qwerty', 'azerty', '2017-05-02', 'comment on passe de qwerty a azerty', 'Divers', 2, '', '');
(4, 'du sale', 1, 'Web', 'Landrybg', '2017-05-02', 'Le mpm ? DU SAAAAALE!', 'Divers', 2, '', '');


-- --------------------------------------------------------

--
-- Structure de la table `topic_post`
--

CREATE TABLE `topic_post` (

 `Post_id` int(11) NOT NULL AUTO_INCREMENT,
  `Post_creaor` int(11) NOT NULL,
  `Post_content` text collate latin1_general_ci NOT NULL,
  `Post_time` int(11) NOT NULL,
  `Topic_id` int(11) NOT NULL,
  `Post_forum_id` int(11) NOT NULL,
  PRIMARY KEY  (`post_id`)
);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
