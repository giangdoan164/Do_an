-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 26, 2013 at 12:05 PM
-- Server version: 5.1.36-community-log
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `multi_edit`
--

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `member_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`member_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `firstname`, `lastname`, `middlename`, `address`, `email`) VALUES
(8, 'john kevin', 'lorayna', 'amos', 'bago city', 'jkevlorayna@gmail.com'),
(7, 'stephanie', 'villanueva', 'batoon', 'saravia', 'ztephie_19@yahoo.com'),
(9, 'achilles', 'palma', 'eubeun', 'Talisay City', 'jkevlorayna@gmail,com'),
(10, 'brian paul', 'sablan', 'xiaboh', 'Bacolod City', 'jkevlorayna@gmail.com'),
(11, 'christian', 'sausa', 'pooly', 'Talisay City', 'jkevlorayna@gmail,com'),
(12, 'rodzil', 'camato', 'camato', 'Talisay City', 'jkevlorayna@gmail,com'),
(13, 'christian', 'Cadiz', 'abnoy', 'Talisay City', 'jkevlorayna@gmail.com'),
(14, 'sherwin', 'laylon', 'agi', 'EB magalona', 'jkevlorayna@gmail,com'),
(15, 'maricon', 'Itona', 'montecastro', 'Victorias City', 'jkevlorayna@gmail.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
