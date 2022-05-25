-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 05, 2021 at 09:54 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `php_minglebox`
--
CREATE DATABASE IF NOT EXISTS `php_minglebox` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `php_minglebox`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `userid` varchar(100) NOT NULL,
  `pwd` varchar(50) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`userid`, `pwd`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `buyers`
--

CREATE TABLE IF NOT EXISTS `buyers` (
  `buyername` varchar(200) NOT NULL,
  `cmp` varchar(500) NOT NULL,
  `country` varchar(100) NOT NULL,
  `userid` varchar(200) NOT NULL,
  `pwd` varchar(50) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buyers`
--

INSERT INTO `buyers` (`buyername`, `cmp`, `country`, `userid`, `pwd`) VALUES
('James', 'Horizon Technologies,\r\n232, Marine Drive,\r\nMumbai', 'India', 'james@gmail.com', 'james'),
('Rahul', 'Abc Technologies,\r\n492, Hubli Ghat,\r\nKolkata.', 'India', 'rahul@gmail.com', 'rahul');

-- --------------------------------------------------------

--
-- Table structure for table `coderinterest`
--

CREATE TABLE IF NOT EXISTS `coderinterest` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `coderid` varchar(100) NOT NULL,
  `dt` date NOT NULL,
  `postid` int(11) NOT NULL,
  `coderamt` float NOT NULL,
  `accept` varchar(20) NOT NULL DEFAULT 'pending',
  PRIMARY KEY (`coderid`,`postid`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `coderinterest`
--

INSERT INTO `coderinterest` (`id`, `coderid`, `dt`, `postid`, `coderamt`, `accept`) VALUES
(1, 'ram@gmail.com', '2021-03-02', 1, 34000, 'accept'),
(7, 'ram@gmail.com', '2021-03-05', 2, 95000, 'pending'),
(3, 'sam@gmail.com', '2021-03-02', 1, 33000, 'reject'),
(5, 'sam@gmail.com', '2021-03-04', 2, 100000, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `coderreview`
--

CREATE TABLE IF NOT EXISTS `coderreview` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dt` date NOT NULL,
  `buyerid` varchar(200) NOT NULL,
  `coderid` varchar(200) NOT NULL,
  `projid` int(11) NOT NULL,
  `cmnt` varchar(5000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `coderreview`
--

INSERT INTO `coderreview` (`id`, `dt`, `buyerid`, `coderid`, `projid`, `cmnt`) VALUES
(2, '2021-03-04', 'james@gmail.com', 'ram@gmail.com', 1, 'The project modules are completed in Time.  The work is done correctly.  Good Work...!');

-- --------------------------------------------------------

--
-- Table structure for table `coders`
--

CREATE TABLE IF NOT EXISTS `coders` (
  `codername` varchar(200) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `country` varchar(50) NOT NULL,
  `currency` varchar(20) NOT NULL,
  `userid` varchar(200) NOT NULL,
  `pwd` varchar(50) NOT NULL,
  `expr` varchar(10) NOT NULL,
  `lang` varchar(300) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coders`
--

INSERT INTO `coders` (`codername`, `gender`, `country`, `currency`, `userid`, `pwd`, `expr`, `lang`) VALUES
('Ganesh', 'Male', 'India', 'rupee', 'ganesh@gmail.com', 'ba2e4e8b8ab27814a47bf9e6a29ac32f7e70e5f6', '3', '.NET,ANDROID,JAVA,PHP'),
('Ram', 'Male', 'India', 'rupee', 'ram@gmail.com', '77c7960e890deddebb7ff2e55e340d2ed1708368', '3', 'IOS,JAVA,JSP,PHP'),
('Samuel', 'Male', 'India', 'rupee', 'sam@gmail.com', 'f16bed56189e249fe4ca8ed10a1ecae60e8ceac0', '2', '.NET,JAVA,JSP,PHP');

-- --------------------------------------------------------

--
-- Table structure for table `newtech`
--

CREATE TABLE IF NOT EXISTS `newtech` (
  `tname` varchar(200) NOT NULL,
  PRIMARY KEY (`tname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newtech`
--

INSERT INTO `newtech` (`tname`) VALUES
('.NET'),
('ANDROID'),
('IOS'),
('JAVA'),
('JSP'),
('PHP'),
('PYTHON');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `buyerid` varchar(200) NOT NULL,
  `postdt` date NOT NULL,
  `ptitle` varchar(200) NOT NULL,
  `descr` varchar(2000) NOT NULL,
  `apptype` varchar(100) NOT NULL,
  `technology` varchar(500) NOT NULL,
  `delivertime` varchar(200) NOT NULL,
  `pamt` varchar(50) NOT NULL,
  `coderid` varchar(200) NOT NULL,
  `allotdt` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `buyerid`, `postdt`, `ptitle`, `descr`, `apptype`, `technology`, `delivertime`, `pamt`, `coderid`, `allotdt`) VALUES
(1, 'james@gmail.com', '2021-01-05', 'Shopping Cart', 'Admin module for managing products and client module for shopping', 'web', 'PHP', 'Feb-2021', '35000', 'ram@gmail.com', '2021-03-04'),
(2, 'rahul@gmail.com', '2021-03-03', 'Stock Market', 'Stock Market Application to monitor the stock price at NSE', 'web', 'JSP', 'April-2020', '100000', '', '0000-00-00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
