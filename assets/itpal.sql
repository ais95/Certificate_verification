-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2016 at 10:40 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `itpal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(35) NOT NULL,
  `user_email` varchar(35) NOT NULL,
  `user_password` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user_name`, `user_email`, `user_password`) VALUES
(1, 'ariful islam', 'arifulislammsn@hotmail.com', 'ariful islam');

-- --------------------------------------------------------

--
-- Table structure for table `certificate_verification`
--

CREATE TABLE IF NOT EXISTS `certificate_verification` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `s_id` varchar(80) DEFAULT NULL,
  `s_name` varchar(50) NOT NULL,
  `p_name` varchar(50) NOT NULL,
  `duration` int(20) NOT NULL,
  `issuing_date` varchar(25) NOT NULL,
  `photo` varchar(250) NOT NULL,
  `scaned_copy` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `certificate_verification`
--

INSERT INTO `certificate_verification` (`id`, `s_id`, `s_name`, `p_name`, `duration`, `issuing_date`, `photo`, `scaned_copy`) VALUES
(8, '34534TTY', 'Ariful isalm', 'Web development', 120, '29-Nov-2016', 'students-photo/15094228_788962367908912_4635663992488393086_n.jpg', 'scaned-copy/Golden-Formal-Award-Certificate-Template-Preview.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
