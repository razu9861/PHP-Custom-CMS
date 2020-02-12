-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 14, 2016 at 09:08 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `last_log_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `last_log_date`) VALUES
(1, 'Raju', 'raju', '2016-11-10');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `member_no` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(10) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `address_line_one` varchar(300) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `password` char(32) NOT NULL,
  `subscribed` tinyint(1) NOT NULL DEFAULT '0',
  `acc_type` int(1) NOT NULL,
  PRIMARY KEY (`member_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_no`, `title`, `first_name`, `last_name`, `address_line_one`, `email_address`, `password`, `subscribed`, `acc_type`) VALUES
(1, 'Mr.', 'Raju', 'Chaudhary', 'Kathamndu, nepal', 'raju@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0, 0),
(17, 'Mr.', 'David', 'GIll', 'kathmandu', 'david@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0, 0),
(18, 'Miss.', 'Rina', 'Thapa', 'Kathmandu', 'rina@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `task_name` varchar(250) NOT NULL,
  `category` varchar(300) NOT NULL,
  `taskcom_incomp` varchar(250) NOT NULL,
  `details` text NOT NULL,
  `date_added` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `task_name`, `category`, `taskcom_incomp`, `details`, `date_added`) VALUES
(1, 'CSR', 'Chapter 1', 'Incomplete', 'Please complete chapter 1', '2016-11-11'),
(2, 'Accounting', 'Chapter 3', 'Complete', 'Please Complete all the Questions of Chapter 3', '2016-11-12'),
(3, 'Mergers and Acquisitions', 'Chapter 4', 'Complete', 'Please do some research on Mergers and Acquisitions theory. ', '2016-11-12');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
