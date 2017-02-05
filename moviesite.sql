-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le : Sam 03 Août 2013 à 13:51
-- Version du serveur: 5.5.31
-- Version de PHP: 5.3.10-1ubuntu3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `moviesite`
--

-- --------------------------------------------------------

--
-- Structure de la table `movie`
--

CREATE TABLE IF NOT EXISTS `movie` (
  `movie_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `movie_name` varchar(255) NOT NULL,
  `movie_type` tinyint(4) NOT NULL DEFAULT '0',
  `movie_year` smallint(5) unsigned NOT NULL DEFAULT '0',
  `movie_leadactor` int(10) unsigned NOT NULL DEFAULT '0',
  `movie_director` int(10) unsigned NOT NULL DEFAULT '0',
  `movie_running_time` tinyint(3) unsigned DEFAULT NULL,
  `movie_cost` decimal(4,1) DEFAULT NULL,
  `movie_takings` decimal(4,1) DEFAULT NULL,
  PRIMARY KEY (`movie_id`),
  KEY `movie_type` (`movie_type`,`movie_year`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `movie`
--

INSERT INTO `movie` (`movie_id`, `movie_name`, `movie_type`, `movie_year`, `movie_leadactor`, `movie_director`, `movie_running_time`, `movie_cost`, `movie_takings`) VALUES
(1, 'Bruce Almighty', 5, 2003, 1, 2, 101, 81.0, 242.6),
(2, 'Office Space', 5, 1999, 5, 6, 89, 10.0, 10.8),
(3, 'Grand Canyon', 2, 1991, 4, 3, 134, NULL, 33.2);

-- --------------------------------------------------------

--
-- Structure de la table `movietype`
--

CREATE TABLE IF NOT EXISTS `movietype` (
  `movietype_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `movietype_label` varchar(100) NOT NULL,
  PRIMARY KEY (`movietype_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `movietype`
--

INSERT INTO `movietype` (`movietype_id`, `movietype_label`) VALUES
(1, 'Sci Fi'),
(2, 'Drama'),
(3, 'Adventure'),
(4, 'War'),
(5, 'Comedy'),
(6, 'Horror'),
(7, 'Action'),
(8, 'Kids');

-- --------------------------------------------------------

--
-- Structure de la table `people`
--

CREATE TABLE IF NOT EXISTS `people` (
  `people_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `people_fullname` varchar(255) NOT NULL,
  `people_isactor` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `people_isdirector` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`people_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `people`
--

INSERT INTO `people` (`people_id`, `people_fullname`, `people_isactor`, `people_isdirector`) VALUES
(1, 'Jim Carrey', 1, 0),
(2, 'Tom Shadyac', 0, 1),
(3, 'Lawrence Kasdan', 0, 1),
(4, 'Kevin Kline', 1, 0),
(5, 'Ron Livingston', 1, 0),
(6, 'Mike Judge', 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `reviews`
--

CREATE TABLE IF NOT EXISTS `reviews` (
  `review_movie_id` int(10) unsigned NOT NULL,
  `review_date` date NOT NULL,
  `reviewer_name` varchar(255) NOT NULL,
  `review_comment` varchar(255) NOT NULL,
  `review_rating` tinyint(3) unsigned NOT NULL DEFAULT '0',
  KEY `review_movie_id` (`review_movie_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `reviews`
--

INSERT INTO `reviews` (`review_movie_id`, `review_date`, `reviewer_name`, `review_comment`, `review_rating`) VALUES
(1, '2008-09-23', 'John Doe', 'I thought this was a great movie\nEven though my girlfriend made me see it against my will.', 4),
(1, '2008-09-23', 'Billy Bob', 'I liked Eraserhead better.', 2),
(1, '2008-09-28', 'Peppermint Patty', 'I wish I’d have seen it\nsooner!', 5),
(2, '2008-09-23', 'Marvin Martian', 'This is my favorite movie. I\ndidn’t wear my flair to the movie but I loved it anyway.', 5),
(3, '2008-09-23', 'George B.', 'I liked this movie, even though I\nThought it was an informational video from my travel agent.', 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
