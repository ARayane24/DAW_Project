-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Jun 08, 2023 at 08:45 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `voyage`
--

-- --------------------------------------------------------

--
-- Table structure for table `contient`
--

DROP TABLE IF EXISTS `contient`;
CREATE TABLE IF NOT EXISTS `contient` (
  `Idcon` int(11) NOT NULL AUTO_INCREMENT,
  `Nomcon` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`Idcon`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contient`
--

INSERT INTO `contient` (`Idcon`, `Nomcon`) VALUES
(1, 'Affrique'),
(3, 'Australie'),
(2, 'Europ'),
(4, 'Asie');

-- --------------------------------------------------------

--
-- Table structure for table `necessaire`
--

DROP TABLE IF EXISTS `necessaire`;
CREATE TABLE IF NOT EXISTS `necessaire` (
  `Idnec` int(11) NOT NULL AUTO_INCREMENT,
  `typenec` varchar(10) DEFAULT NULL,
  `nomnec` varchar(30) DEFAULT NULL,
  `Idvil` int(11) DEFAULT NULL,
  PRIMARY KEY (`Idnec`),
  KEY `Idvil` (`Idvil`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pays`
--

DROP TABLE IF EXISTS `pays`;
CREATE TABLE IF NOT EXISTS `pays` (
  `Idpay` int(11) NOT NULL AUTO_INCREMENT,
  `Nompay` varchar(30) DEFAULT NULL,
  `Idcon` int(11) DEFAULT NULL,
  PRIMARY KEY (`Idpay`),
  KEY `Idcon` (`Idcon`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pays`
--

INSERT INTO `pays` (`Idpay`, `Nompay`, `Idcon`) VALUES
(1, 'Algerie', 1),
(2, 'Egypte', 1),
(3, 'Guinee', 1),
(4, 'Ghana', 1),
(5, 'Tunisie', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sites`
--

DROP TABLE IF EXISTS `sites`;
CREATE TABLE IF NOT EXISTS `sites` (
  `idsit` int(11) DEFAULT NULL,
  `nomsit` varchar(10) DEFAULT NULL,
  `cheminphoto` varchar(255) DEFAULT NULL,
  `idvil` int(11) DEFAULT NULL,
  KEY `idvil` (`idvil`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ville`
--

DROP TABLE IF EXISTS `ville`;
CREATE TABLE IF NOT EXISTS `ville` (
  `Idvil` int(11) NOT NULL AUTO_INCREMENT,
  `Nomvil` varchar(30) DEFAULT NULL,
  `descvil` varchar(30) DEFAULT NULL,
  `Idpay` int(11) DEFAULT NULL,
  PRIMARY KEY (`Idvil`),
  KEY `Idpay` (`Idpay`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ville`
--

INSERT INTO `ville` (`Idvil`, `Nomvil`, `descvil`, `Idpay`) VALUES
(1, 'Sour EL Ghozlen', 'Makan makan', 1),
(2, 'Oran', 'OK', 1),
(3, 'EL Kahira', 'Fara3ina', 2),
(4, 'Alger', '19 oué oué', 1),
(9, '', '', 5),
(10, 'TiziOuzou', 'Kabily', 1),
(8, 'Boumerdas, Boumerdes, Algeria', 'khkhfdidfgljlÃ¹j', 2),
(11, '', '', 5),
(12, '', '', 5);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
