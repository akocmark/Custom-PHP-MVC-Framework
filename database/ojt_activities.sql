-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2013 at 02:43 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ojt_activities`
--
CREATE DATABASE `ojt_activities` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ojt_activities`;

-- --------------------------------------------------------

--
-- Table structure for table `tbllogbook`
--

CREATE TABLE IF NOT EXISTS `tbllogbook` (
  `ID` int(255) NOT NULL AUTO_INCREMENT,
  `UserID` int(255) NOT NULL,
  `LogIn` datetime NOT NULL,
  `LogOut` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `tbllogbook`
--

INSERT INTO `tbllogbook` (`ID`, `UserID`, `LogIn`, `LogOut`) VALUES
(38, 1, '2013-07-10 20:32:43', '2013-07-10 20:33:53'),
(39, 2, '2013-07-10 20:34:02', '2013-07-10 14:34:11'),
(40, 1, '2013-07-10 20:34:22', '2013-07-10 20:34:27'),
(41, 2, '2013-07-10 20:34:44', '2013-07-10 14:41:23'),
(44, 2, '2013-07-10 20:41:55', '2013-07-10 14:42:43');

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE IF NOT EXISTS `tblusers` (
  `ID` int(255) NOT NULL AUTO_INCREMENT,
  `AccountType` enum('Admin','User') NOT NULL DEFAULT 'User',
  `FirstName` varchar(100) DEFAULT NULL,
  `MiddleName` varchar(100) DEFAULT NULL,
  `LastName` varchar(100) DEFAULT NULL,
  `UserName` varchar(150) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`ID`, `AccountType`, `FirstName`, `MiddleName`, `LastName`, `UserName`, `Password`, `Date`) VALUES
(1, 'User', 'Mark', 'Lagman', 'Gutierrez', 'akocmark', '298c7d559d0364f3a81dc3c57177422c', '2013-07-02 02:30:12'),
(2, 'Admin', 'Rachel', NULL, 'Jaro', 'primerg', '07d31fd221d4721dbc590813a6f6a85e', '2013-07-02 21:09:26'),
(16, 'User', 'Rex', NULL, 'Manalo', 'rex', '3b86a8ae82d4e8c93c2a174b094f20d7', '2013-07-10 06:18:28');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
