-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 04, 2019 at 09:30 AM
-- Server version: 5.5.54-0ubuntu0.12.04.1
-- PHP Version: 5.3.10-1ubuntu3.26

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `qa`
--

-- --------------------------------------------------------

--
-- Table structure for table `password_reset`
--

CREATE TABLE IF NOT EXISTS `password_reset` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `link` varchar(255) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(225) DEFAULT NULL,
  `email` varchar(225) DEFAULT NULL,
  `password` varchar(225) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `everified` int(11) DEFAULT NULL,
  `login_type` int(11) DEFAULT NULL,
  `social_id` varchar(255) DEFAULT NULL,
  `social_platform` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `status`, `created_at`, `link`, `everified`, `login_type`, `social_id`, `social_platform`) VALUES
(5, 'krishna kumar k.k', 'krishnakum1arandkk@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, '2019-07-27 11:20:46', '51564206646', 0, 0, NULL, NULL),
(6, 'krishna kumar k.k', 'w@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, '2019-07-27 11:27:46', '61564207066', 0, 0, NULL, NULL),
(7, 'krishna kumar k.k', 'krishnakumarandkk@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, '2019-07-27 11:28:52', '', 1, 0, NULL, NULL),
(8, 'afrewrtery', 'test@gmail.com', 'cc03e747a6afbbcbf8be7668acfebee5', 1, '2019-08-03 11:20:00', '81564811400', 0, 0, NULL, NULL),
(9, 'krishnakumar kk', '', '', 1, '2019-08-03 12:27:55', '91564815475', 0, 2, '116560942641867309342', 'google');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
