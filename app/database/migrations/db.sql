-- phpMyAdmin SQL Dump
-- version 4.2.5
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Dec 01, 2014 at 08:25 AM
-- Server version: 5.5.38
-- PHP Version: 5.5.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `WAT`
--

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
  `id` int(11) NOT NULL,
  `topic` varchar(500) NOT NULL,
  `author` int(11) NOT NULL,
  `detail` text NOT NULL,
  `category` varchar(10) DEFAULT NULL,
  `isPendding` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`id`, `topic`, `author`, `detail`, `category`, `isPendding`, `created_at`, `updated_at`) VALUES
(0, 'Hello', 1, 'Hello This is Golf', '1', 1, '2014-12-01 14:28:13', '2014-12-01 14:28:13'),
(0, 'sss', 1, '  ssss', NULL, NULL, '2014-12-01 14:48:20', '2014-12-01 14:48:20'),
(0, '', 1, '  ', NULL, NULL, '2014-12-01 14:51:41', '2014-12-01 14:51:41'),
(0, 'dsafdsf', 1, '  afdsfasdf', NULL, NULL, '2014-12-01 15:08:59', '2014-12-01 15:08:59');

-- --------------------------------------------------------

--
-- Table structure for table `thread_categories`
--

CREATE TABLE `thread_categories` (
  `id` varchar(10) NOT NULL,
  `categoryName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `thread_categories`
--

INSERT INTO `thread_categories` (`id`, `categoryName`) VALUES
('1', 'testCAT'),
('1', 'testCAT');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
`id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `firstName` varchar(100) DEFAULT NULL,
  `lastName` varchar(100) DEFAULT NULL,
  `degree` varchar(50) DEFAULT NULL,
  `school` varchar(100) DEFAULT NULL,
  `lifeTime` int(11) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL,
  `usable` int(11) DEFAULT NULL,
  `pictureURL` varchar(500) DEFAULT NULL,
  `summaryProfile` text,
  `joinDate` timestamp NULL DEFAULT NULL,
  `penddingPoint` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `firstName`, `lastName`, `degree`, `school`, `lifeTime`, `semester`, `usable`, `pictureURL`, `summaryProfile`, `joinDate`, `penddingPoint`) VALUES
(1, 'pakdiyin@usc.edu', '1234567', 'Jonathan', 'Joestar', 'Master''s degree', 'Viterbi', 10000, 10000, 10000, NULL, NULL, '2014-11-30 08:00:00', 500),
(2, 'pakdiyin@usc.edu', '1234567', 'Jonathan', 'Joestar', 'Master''s degree', 'Viterbi', 10000, 10000, 10000, NULL, NULL, '2014-11-30 08:00:00', 500);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
