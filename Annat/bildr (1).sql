-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 18 maj 2017 kl 15:27
-- Serverversion: 5.7.11
-- PHP-version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `bildr`
--
CREATE DATABASE IF NOT EXISTS `bildr` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bildr`;

-- --------------------------------------------------------

--
-- Tabellstruktur `imagedata`
--

CREATE TABLE `imagedata` (
  `bildid` varchar(20) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `uploaderid` varchar(20) NOT NULL,
  `time` datetime NOT NULL,
  `private` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `imagedata`
--

INSERT INTO `imagedata` (`bildid`, `title`, `description`, `uploaderid`, `time`, `private`) VALUES
('bH729k', 'Project plan wery gud, yis', 'first bild 4eve', '0', '2017-05-03 13:40:23', 0),
('5dbo', 'test6', 'yjui Ã¥Ã¤Ã¶', 'wspj', '2017-05-18 12:47:47', 1),
('ruw0', 'testing', 'jioedo', 'wspj', '2017-05-18 13:49:40', 1),
('7em0', 'Adam3, like FOR REAL', 'LEZXYNY!', '\01', '2017-05-18 13:37:33', 1),
('xw3o', 'Pingvin', 'Detta är en pingvin', '\01', '2017-05-18 14:12:21', 1),
('ex6f', 'Breakout', 'yes', '\01', '2017-05-18 14:37:59', 1),
('232f', 'Vector', 'Awsome sak', 'wspj', '2017-05-18 14:03:10', 1),
('a83k', 'weeeee', 'asdwdaw', 'wspj', '2017-05-18 14:05:40', 1),
('358f', 'Tegelsten', 'Tegel, Tegel, Tegelsten!', '\01', '2017-05-18 14:46:49', 1),
('ofos', 'Harold1', 'yes', '\01', '2017-05-18 14:54:29', 1),
('lp4l', 'Harold2', 'yes', '\01', '2017-05-18 14:56:28', 1),
('2xsq', 'Harold3', 'yes', '\01', '2017-05-18 14:56:42', 1),
('cpiu', 'Harold4', 'yes', '\01', '2017-05-18 14:56:59', 1),
('89p5', 'Harold5', 'yes yes yes yes', '\01', '2017-05-18 14:57:23', 1);

-- --------------------------------------------------------

--
-- Tabellstruktur `userdata`
--

CREATE TABLE `userdata` (
  `userid` varchar(20) NOT NULL,
  `username` varchar(21) NOT NULL,
  `password` varchar(22) NOT NULL,
  `mail` varchar(52) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `userdata`
--

INSERT INTO `userdata` (`userid`, `username`, `password`, `mail`) VALUES
('\00', 'hugo', '\0robertebest', '\0hugsin@bildr.se'),
('\01', 'robban', 'hugonastbest', 'robbilibobban@wifu.club@bildr.se'),
('v5f8', '\0Hej', '1234567890qwertyuiopÃ¥', 'Hammaren@mailen.mail'),
('4337', '\0user1', '\0los', '\0min@email.com'),
('wspj', 'Hejsan', 'åäööäå', 'haldnasifnsd@aosif.asd');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
