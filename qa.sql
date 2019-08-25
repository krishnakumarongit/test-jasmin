-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 26, 2019 at 12:21 AM
-- Server version: 5.7.27-0ubuntu0.16.04.1
-- PHP Version: 7.3.8-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qa`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `right_answer` int(11) NOT NULL,
  `answer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `question_id`, `right_answer`, `answer`) VALUES
(1, 1, 0, '2nd answer for question 1'),
(2, 1, 1, '3 answer for question1'),
(3, 2, 0, '4 answer for question1'),
(5, 2, 1, '1st answer for question 1');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset`
--

CREATE TABLE `password_reset` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `link` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `exam` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `exam`, `status`) VALUES
(1, 'test question 1', '2841F3341738C9DC0D3CA84B0CE9D25D', 1),
(2, 'test question 2', '2841F3341738C9DC0D3CA84B0CE9D25D', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
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
  `contact_email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `status`, `created_at`, `link`, `everified`, `login_type`, `social_id`, `social_platform`, `contact_email`) VALUES
(5, 'krishna kumar k.k', 'krishnakum1arandkk@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, '2019-07-27 11:20:46', '51564206646', 0, 0, NULL, NULL, NULL),
(6, 'krishna kumar k.k', 'w@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, '2019-07-27 11:27:46', '61564207066', 0, 0, NULL, NULL, NULL),
(7, 'krishna kumar k.k', 'krishnakumarandkk@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, '2019-07-27 11:28:52', '', 1, 0, NULL, NULL, NULL),
(8, 'afrewrtery', 'test@gmail.com', 'cc03e747a6afbbcbf8be7668acfebee5', 1, '2019-08-03 11:20:00', '81564811400', 0, 0, NULL, NULL, NULL),
(9, 'krishnakumar kk', '', '', 1, '2019-08-03 12:27:55', '91564815475', 0, 2, '116560942641867309342', 'google', NULL),
(10, 'krishnakumar kk', '', '', 1, '2019-08-05 23:31:45', '101565028105', 0, 2, '116939675255069662313', 'google', NULL),
(11, 'USER-1565852423', '', '', 1, '2019-08-15 12:30:23', '111565852423', 0, 2, '1103614253359739', 'facebook', NULL),
(12, 'krishnakumar', '', '', 1, '2019-08-15 12:48:19', '', 1, 2, '296889016', 'twitter', 'mekrishnakumarkk@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user_answer`
--

CREATE TABLE `user_answer` (
  `id` int(11) NOT NULL,
  `exam_id` varchar(255) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `for_review` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_answer`
--

INSERT INTO `user_answer` (`id`, `exam_id`, `question_id`, `answer_id`, `user_id`, `for_review`) VALUES
(25, '2841F3341738C9DC0D3CA84B0CE9D25D', 2, 0, 10, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset`
--
ALTER TABLE `password_reset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_answer`
--
ALTER TABLE `user_answer`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `password_reset`
--
ALTER TABLE `password_reset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_answer`
--
ALTER TABLE `user_answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
