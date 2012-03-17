-- phpMyAdmin SQL Dump
-- version 3.5.0-beta1
-- http://www.phpmyadmin.net
--
-- Host: mysql-shared-02.phpfog.com
-- Generation Time: Mar 17, 2012 at 02:28 PM
-- Server version: 5.5.12-log
-- PHP Version: 5.3.2-1ubuntu4.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `community_gardens_phpfogapp_com`
--

-- --------------------------------------------------------

--
-- Table structure for table `open_data_app`
--

CREATE TABLE IF NOT EXISTS `open_data_app` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `street_address` text COLLATE utf8_unicode_ci NOT NULL,
  `longitude` double NOT NULL,
  `latitude` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=31 ;

--
-- Dumping data for table `open_data_app`
--

INSERT INTO `open_data_app` (`id`, `name`, `street_address`, `longitude`, `latitude`) VALUES
(1, 'Bethany Church Community Garde', '382 Centrepointe Dr.', -75.7734388991705, 45.345499587655),
(2, 'Bytown Urban Gardens (BUGs) CG', '75 Glendale Ave.', -75.6988143060323, 45.4050394322286),
(3, 'Carlington Community Garden', '900 Merivale Rd.', -75.7346269034471, 45.382842490324),
(4, 'Centretown Community Garden', '461 Lisgar St.', -75.7016583295769, 45.415195101353),
(5, 'Chateau Donald Community Garde', '251 Donald St.', -75.6577031103256, 45.4293097723174),
(6, 'Children''s Garden', '321 Main St.', -75.6759578122613, 45.406127619525),
(7, 'Debra Dynes Family House Commu', '955 Debra Ave.', -75.7060251774863, 45.3680604451643),
(8, 'Friendship Community Garden', '1240/1244 Donald St.', -75.6361507417946, 45.4273895810549),
(9, 'Gloucester Allotment Gardens', 'N/A Corner of Weir and Anderson', -75.5676971825545, 45.420592825487),
(10, 'GO-VEG (Glebe Organic Vegetabl', '185 Fifth Ave.', -75.6919950762557, 45.4012929697314),
(11, 'Go Green Community Garden', '110 Laurier Ave.', -75.6893017438533, 45.4210842738369),
(12, 'Jardin Arrowsmith Thyme-Less C', '2040 Arrowsmith Drive', -75.5953760439295, 45.4385515707265),
(13, 'Jardin Communautaire Orleans C', '3350 St Joseph Blvd.', -75.4989466307579, 45.4837565286994),
(14, 'Jardin Communautaire Vanier Co', '300 des Peres Blancs.', -75.658575092874, 45.4437362531784),
(15, 'Kilborn Allotment Garden', '1909/1975 Kilborn Ave.', -75.6388368817179, 45.3908440878158),
(16, 'Leslie Park Community Garden', '31 Abingdon Dr.', -75.7878754564841, 45.3341129371286),
(17, 'Lowertown/Basseville Community', '40 Cobourg st.', -75.6817654861477, 45.4347668377398),
(18, 'Michele Heights Community Gard', '2955 Michelle Dr.', -75.800576543261, 45.3552345931046),
(19, 'Nanny Goat Hill Community Gard', '575/551 Laurier Ave. West', -75.707485107864, 45.4153043246147),
(20, 'Nepean Allotment Garden', '230 Viewmont', -75.7180421437094, 45.3465105482307),
(21, 'Operation Go Home Community Ga', '179 Murray St.', -75.6907938739199, 45.4310697631841),
(22, 'Ottawa East Community Garden', '249/223/175 Main St.', -75.6755847910067, 45.408059625321),
(23, 'Rochester Heights Children''s G', '299 Rochester St.', -75.708440804817, 45.4045126456476),
(24, 'Sandy Hill CG', '3 Hurdman Rd.', -75.6680134788833, 45.4199458444146),
(25, 'Somali CG', '1975 Kilborn Ave.', -75.639200787966, 45.3895870241171),
(26, 'Strathcona Heights Community G', '3 Hurdman Rd.', -75.669424051288, 45.4187323045188),
(27, 'Sweet Willow Community Garden', '31 Rochester St.', -75.7134104370893, 45.4118448361988),
(28, 'Van Lang CG', '295 Churchill Ave.', -75.7555660409407, 45.3956959360145),
(29, 'Viscount Alexander CG', '55 Mann Ave.', -75.6747042678713, 45.4202733418521),
(30, 'West Barrhaven Community Garde', '3058 Jockvale Rd.', -75.757698621139, 45.2710350131028);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
