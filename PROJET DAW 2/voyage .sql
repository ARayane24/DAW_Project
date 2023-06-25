-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Jun 25, 2023 at 10:05 PM
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
-- Table structure for table `continent`
--

DROP TABLE IF EXISTS `continent`;
CREATE TABLE IF NOT EXISTS `continent` (
  `Idcon` int(11) NOT NULL AUTO_INCREMENT,
  `Nomcon` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`Idcon`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `continent`
--

INSERT INTO `continent` (`Idcon`, `Nomcon`) VALUES
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
) ENGINE=MyISAM AUTO_INCREMENT=189 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `necessaire`
--

INSERT INTO `necessaire` (`Idnec`, `typenec`, `nomnec`, `Idvil`) VALUES
(39, 'Restaurant', 'Restaurant3', 65),
(38, 'Hotel', 'HÃ´tel2', 65),
(152, 'Gare', 'jehf g ahe', 97),
(139, 'Hotel', 'Hotel', 88),
(37, 'Hotel', 'HÃ´tel1', 65),
(151, 'Hotel', 'Hotel', 96),
(150, 'Hotel', 'Hotel', 95),
(149, 'Hotel', 'Hotel', 94),
(148, 'Gare', 'jehf g ahe', 93),
(113, 'Aeroports', 'AÃ©roport1', 75),
(112, 'Gare', 'Gare3', 75),
(40, 'Gare', 'Gare1', 65),
(41, 'Gare', 'Gare2', 65),
(42, 'Aeroports', 'AÃ©roport3', 65),
(43, 'Aeroports', 'Gery', 65),
(111, 'Restaurant', 'Restaurant3', 75),
(110, 'Restaurant', 'Restaurant2', 75),
(109, 'Restaurant', 'Restaurant1', 75),
(103, 'Restaurant', 'Restaurant2', 74),
(102, 'Restaurant', 'Restaurant1', 74),
(101, 'Hotel', 'HÃ´tel2', 74),
(100, 'Hotel', 'HÃ´tel1', 74),
(58, 'Hotel', 'HÃ´tel1', 68),
(59, 'Hotel', 'HÃ´tel2', 68),
(60, 'Restaurant', 'Restaurant3', 68),
(61, 'Gare', 'Gare1', 68),
(62, 'Gare', 'Gare2', 68),
(63, 'Aeroports', 'AÃ©roport3', 68),
(64, 'Aeroports', 'Gery', 68),
(108, 'Hotel', 'HÃ´tel2', 75),
(107, 'Hotel', 'HÃ´tel1', 75),
(106, 'Aeroports', 'AÃ©roport1', 74),
(105, 'Gare', 'Gare3', 74),
(104, 'Restaurant', 'Restaurant3', 74),
(72, 'Hotel', 'HÃ´tel1', 70),
(73, 'Hotel', 'HÃ´tel2', 70),
(74, 'Restaurant', 'Restaurant3', 70),
(75, 'Gare', 'Gare1', 70),
(76, 'Gare', 'Gare2', 70),
(77, 'Aeroports', 'AÃ©roport3', 70),
(78, 'Aeroports', 'Gery', 70),
(147, 'Hotel', 'Hotel', 93),
(146, 'Gare', 'jehf g ahe', 92),
(145, 'Hotel', 'Hotel', 92),
(144, 'Gare', 'jehf g ahe', 91),
(143, 'Hotel', 'Hotel', 91),
(142, 'Gare', 'jehf g ahe', 89),
(141, 'Hotel', 'Hotel', 89),
(140, 'Gare', 'jehf g ahe', 88),
(138, 'Gare', 'jehf g ahe', 87),
(137, 'Hotel', 'Hotel', 87),
(160, 'Hotel', 'Parisien', 0),
(133, 'Hotel', 'Hotel', 86),
(134, 'Restaurant', 'Resto', 86),
(159, 'Hotel', 'Hotel de paris', 0),
(153, 'Hotel', 'Hotel', 100),
(154, 'Aeroport', 'l7hchich', 101),
(155, 'Aeroport', 'l7hchich', 102),
(156, 'Hotel', 'Hotel', 103),
(157, 'Hotel', 'Hotel', 104),
(158, 'Hotel', 'Hotel', 105),
(161, 'Restaurant', 'Resto ta3 la fac', 0),
(162, 'Restaurant', 'Resto inim', 0),
(163, 'Restaurant', 'khamj w bnin', 0),
(164, 'Gare', 'Gares Paris 19 oue', 0),
(165, 'Aeroport', 'Alger 19', 0),
(166, 'Aeroport', 'paris', 0),
(167, 'Hotel', 'Goolge', 0),
(168, 'Hotel', 'GHOGHLE', 0),
(169, 'Hotel', 'GHOGHLE3232', 0),
(170, 'Restaurant', 'Ghir ida', 0),
(171, 'Gare', 'Japncaof', 0),
(172, 'Aeroport', 'Aeoroport', 0),
(173, 'Hotel', 'GHOGHLE3232', 0),
(174, 'Restaurant', 'Ghir ida', 0),
(175, 'Gare', 'Japncaof', 0),
(176, 'Aeroport', 'Aeoroport', 0),
(177, 'Hotel', 'GHOGHLE3232', 0),
(178, 'Restaurant', 'Ghir ida', 0),
(179, 'Gare', 'Japncaof', 0),
(180, 'Aeroport', 'Aeoroport', 0),
(181, 'Hotel', 'Parisien', 0),
(182, 'Restaurant', 'khamj w bnin', 0),
(183, 'Gare', 'fhbeqh', 0),
(184, 'Aeroport', 'paris', 0),
(185, 'Hotel', 'GHOGHLE3232', 335),
(186, 'Restaurant', 'Ghir ida', 335),
(187, 'Gare', 'Japncaof', 335),
(188, 'Aeroport', 'Aeoroport', 335);

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
) ENGINE=MyISAM AUTO_INCREMENT=73 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pays`
--

INSERT INTO `pays` (`Idpay`, `Nompay`, `Idcon`) VALUES
(14, 'Angola', 1),
(13, 'Algerie', 1),
(12, 'France', 2),
(11, 'dfs', 1),
(7, 'Sydney', 3),
(8, 'chine', 4),
(9, 'hind', 4),
(10, 'Sydney2', 3),
(16, 'Botswana', 1),
(17, 'Burkina Faso', 1),
(18, 'Burundi', 1),
(19, 'Cabo Verde', 1),
(20, 'Cameroun', 1),
(22, 'Tchad', 1),
(23, 'Comores', 1),
(24, 'Angola', 1),
(26, 'Botswana', 1),
(27, 'Burkina Faso', 1),
(28, 'Burundi', 1),
(29, 'Cabo Verde', 1),
(30, 'Cameroun', 1),
(32, 'Tchad', 1),
(33, 'Comores', 1),
(35, 'Djibouti', 1),
(38, 'Eswatini', 1),
(40, 'Gabon', 1),
(41, 'Gambie', 1),
(42, 'Ghana', 1),
(45, 'Kenya', 1),
(46, 'Lesotho', 1),
(47, 'Liberia', 1),
(48, 'Libye', 1),
(49, 'Madagascar', 1),
(50, 'Malawi', 1),
(51, 'Mali', 1),
(52, 'Mauritanie', 1),
(53, 'Maurice', 1),
(54, 'Maroc', 1),
(55, 'Mozambique', 1),
(56, 'Namibie', 1),
(57, 'Niger', 1),
(59, 'Rwanda', 1),
(61, 'Seychelles', 1),
(62, 'Sierra Leone', 1),
(63, 'Somalie', 1),
(64, 'Afrique du Sud', 1),
(65, 'Soudan', 1),
(66, 'Soudan du Sud', 1),
(67, 'Tanzanie', 1),
(68, 'Togo', 1),
(69, 'Tunisie', 1),
(70, 'Ouganda', 1),
(71, 'Zambie', 1),
(72, 'Zimbabwe', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sites`
--

DROP TABLE IF EXISTS `sites`;
CREATE TABLE IF NOT EXISTS `sites` (
  `idsit` int(11) NOT NULL AUTO_INCREMENT,
  `nomsit` varchar(10) DEFAULT NULL,
  `cheminphoto` varchar(255) DEFAULT NULL,
  `idvil` int(11) DEFAULT NULL,
  PRIMARY KEY (`idsit`),
  KEY `idvil` (`idvil`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sites`
--

INSERT INTO `sites` (`idsit`, `nomsit`, `cheminphoto`, `idvil`) VALUES
(2, 'tasahoumi', 'src imgs/tasahoumi', 93),
(3, '0', 'src imgs/tasahoumni', 94),
(4, '0', 'src imgs/tasahoumni', 95),
(5, 'tasahoumni', 'src imgs/tasahoumni', 96),
(6, 'tasahoumni', 'src imgs/x1-removebg-preview (2).png', 100),
(7, 'tasahoumi', 'src imgs/Supp.png', 105),
(8, 'tasahoumi', 'src imgs/f8d4f2ee-48bf-490c-b389-5d90d6f3f498.jfif', 106),
(9, 'tasahoumi', 'src imgs/f8d4f2ee-48bf-490c-b389-5d90d6f3f498.jfif', 107),
(27, 'nnnnnnnnnn', 'grgrgrgrg', 116),
(11, 'a', 'llglglglglglg', 109),
(12, 's', 'llglglglglglg', 109),
(13, 'a', 'llglglglglglg', 109),
(14, 't', 'llglglglglglg', 111),
(15, 't', 'llglglglglglg', 112),
(16, 'o', 'llglglglglglg', 112),
(17, 'u', 'llglglglglglg', 112),
(18, 'r', 'llglglglglglg', 112),
(19, 't', 'llglglglglglg', 113),
(20, 'o', 'llglglglglglg', 113),
(21, 'u', 'llglglglglglg', 113),
(22, 'r', 'llglglglglglg', 113),
(23, 'e', 'llglglglglglg', 113),
(24, 't', 'llglglglglglg', 114),
(25, 'o', 'llglglglglglg', 114),
(26, 'u', 'llglglglglglg', 114),
(28, 'BCVBCB', 'nnnnnnnnnnghqetjqetj', 117),
(29, 'BCVBCB', 'nnnnnnnnnnghqetjqetj', 117),
(30, 'BCVBCB', 'nnnnnnnnnnghqetjqetj', 117),
(31, 'BCVBCB', 'nnnnnnnnnnghqetjqetj', 117),
(32, 'BCVBCB', 'nnnnnnnnnnghqetjqetj', 117),
(33, 'BCVBCB', 'nnnnnnnnnnghqetjqetj', 117),
(34, 'BCVBCB', 'nnnnnnnnnnghqetjqetj', 118),
(35, 'BCVBCB', 'nnnnnnnnnnghqetjqetj', 118),
(36, 'BCVBCB', 'nnnnnnnnnnghqetjqetj', 118),
(37, 'BCVBCB', 'nnnnnnnnnnghqetjqetj', 118),
(38, 'BCVBCB', 'nnnnnnnnnnghqetjqetj', 118);

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
) ENGINE=MyISAM AUTO_INCREMENT=336 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ville`
--

INSERT INTO `ville` (`Idvil`, `Nomvil`, `descvil`, `Idpay`) VALUES
(88, 'Testimage', 'earerfafrar', 9),
(40, 'Madride', 'aeda', 6),
(94, 'ndfnrfdn', 'earerfafrar', 9),
(93, 'Testimllll', 'earerfafrar', 9),
(92, 'Testim', 'earerfafrar', 9),
(89, 'Testimage', 'earerfafrar', 9),
(83, 'Paris', 'HGGHFGHG', 10),
(84, 'marssile', 'gfdgdfdfgdfgdg', 10),
(74, 'el Ghozlen', '159687459', 6),
(68, 'Ghozlen', 'okh', 4),
(87, 'Testimage', 'earerfafrar', 9),
(75, 'el Ghozlen', '159687459', 6),
(59, 'Bouira Sour el Ghozlen', '', 3),
(63, 'Bouira Sour el Ghozlen', 'yjedthdh', 4),
(86, 'Khoooooooo', 'Ghir ida', 7),
(62, 'kahira', 'ah magmahfa fiahaihfaf a ', 2),
(98, 'uh k,qb ', 'earerfafrar', 9),
(99, 'uh k,qb ', 'earerfafrar', 9),
(100, 'Gourey', 'earerfafrar', 9),
(101, 'Khooo2', 'Ghir ida', 7),
(108, 'Ville', ' hrogzlÃ¹e vjbz v* Ã¹h rh ', 7),
(111, 'Bouira Sou', 'ykryk,dyk', 7),
(117, 'ygnfyrgn', 'kujhgvfsc hb', 7),
(335, 'LKLKLKLKLK', 'jgÃ¹ÂµQen,ng', 14),
(122, 'Test321456', 'Okeyyyyyyyyyyyy', 8),
(123, 'Alger', 'Description Alger', 13),
(124, 'Oran', 'Description Oran', 13),
(126, 'Annaba', 'Description Annaba', 13),
(127, 'Tlemcen', 'Description de Tlemcen', 13),
(130, 'Laghouat', 'Description de Laghouat', 13),
(131, 'Oum El Bouaghi', 'Description d Oum El Bouaghi', 13),
(134, 'Biskra', 'Description de Biskra', 13),
(136, 'Blida', 'Description de Blida', 13),
(137, 'Bouira', 'Description de Bouira', 13),
(138, 'Tamanrasset', 'Description de Tamanrasset', 13),
(141, 'Tiaret', 'Description de Tiaret', 13),
(142, 'Tizi Ouzou', 'Description de Tizi Ouzou', 13),
(148, 'Skikda', 'Description de Skikda', 13),
(154, 'Mostaganem', 'Description de Mostaganem', 13),
(155, 'MSila', 'Description de M Sila', 13),
(157, 'Ouargla', 'Description d Ouargla', 13),
(160, 'Illizi', 'Description d Illizi', 13),
(231, 'Batna', 'Description de Batna', 13),
(250, 'Guelma', 'Description de Guelma', 13),
(260, 'Adrar', 'Description d Adrar', 13),
(261, 'Chlef', 'Description de Chlef', 13),
(276, 'Djelfa', 'Description de Djelfa', 13),
(277, 'Jijel', 'Description de Jijel', 13),
(284, 'Constantine', 'Description de Constantine', 13),
(288, 'Mascara', 'Description de Mascara', 13),
(291, 'El Bayadh', 'Description d El Bayadh', 13),
(293, 'Bordj Bou Arreridj', 'Desc Bordj Bou Arreridj', 13),
(295, 'El Tarf', 'Description d El Tarf', 13),
(296, 'Tindouf', 'Description de Tindouf', 13),
(297, 'Tissemsilt', 'Description de Tissemsilt', 13),
(298, 'El Oued', 'Description dEl Oued', 13),
(299, 'Khenchela', 'Description de Khenchela', 13),
(300, 'Souk Ahras', 'Description de Souk Ahras', 13),
(301, 'Tipaza', 'Description de Tipaza', 13),
(302, 'Mila', 'Description de Mila', 13),
(307, 'Relizane', 'Description de Relizane', 13),
(308, 'Allemagne', 'Description de l Allemagne', 12),
(309, 'Autriche', 'Description de l Autriche', 12),
(310, 'Belgique', 'Description de la Belgique', 12),
(311, 'Bulgarie', 'Description de la Bulgarie', 12),
(312, 'Chypre', 'Description de Chypre', 12),
(313, 'Croatie', 'Description de la Croatie', 12),
(314, 'Danemark', 'Description du Danemark', 12),
(315, 'Espagne', 'Description de l Espagne', 12),
(316, 'Estonie', 'Description de l Estonie', 12),
(317, 'Finlande', 'Description de la Finlande', 12),
(318, 'France', 'Description de la France', 12),
(320, 'Hongrie', 'Description de la Hongrie', 12),
(321, 'Irlande', 'Description de l Irlande', 12),
(322, 'Italie', 'Description de l Italie', 12),
(323, 'Lettonie', 'Description de la Lettonie', 12),
(325, 'Luxembourg', 'Description du Luxembourg', 12),
(326, 'Malte', 'Description de Malte', 12),
(327, 'Pays-Bas', 'Description des Pays-Bas', 12),
(328, 'Pologne', 'Description de la Pologne', 12),
(329, 'Portugal', 'Description du Portugal', 12),
(331, 'Roumanie', 'Description de la Roumanie', 12),
(332, 'Slovaquie', 'Description de la Slovaquie', 12);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
