-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 07, 2015 at 05:16 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yourboyzreviews`
--

-- --------------------------------------------------------

--
-- Table structure for table `Media`
--

CREATE TABLE IF NOT EXISTS `Media` (
  `id` int(10) NOT NULL,
  `title` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Media`
--

INSERT INTO `Media` (`id`, `title`) VALUES
(1, 'Your Highness');

-- --------------------------------------------------------

--
-- Table structure for table `Movie`
--

CREATE TABLE IF NOT EXISTS `Movie` (
  `id` int(10) NOT NULL,
  `media` int(10) NOT NULL,
  `release_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Movie`
--

INSERT INTO `Movie` (`id`, `media`, `release_date`) VALUES
(1, 0, '2011-04-11 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `TVEpisode`
--

CREATE TABLE IF NOT EXISTS `TVEpisode` (
  `id` int(10) NOT NULL,
  `tv_show` int(10) NOT NULL COMMENT 'foreignkey to TVShow',
  `season` int(2) NOT NULL,
  `episode_number` int(4) NOT NULL,
  `episode_title` varchar(150) NOT NULL,
  `air_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `TVShow`
--

CREATE TABLE IF NOT EXISTS `TVShow` (
  `id` int(10) NOT NULL,
  `media` int(10) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE IF NOT EXISTS `User` (
  `id` int(10) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`id`, `first_name`, `last_name`, `email`, `password`, `date_created`) VALUES
(1, 'eric', 'rodey', 'test@gmail.com', 'test123', '0000-00-00 00:00:00'),
(3, 'test', 'login', 'welcome@gmail.com', 'test123', '0000-00-00 00:00:00'),
(4, 'Jack', 'Gadsten', 'jack@gmail.com', 'test123', '0000-00-00 00:00:00'),
(5, 'p', 'sure', 'psure@t.com', 'test123', '0000-00-00 00:00:00'),
(6, 'test', 'butt', 'test@butt.com', 'test1234', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `UserRecommendation`
--

CREATE TABLE IF NOT EXISTS `UserRecommendation` (
  `id` int(10) NOT NULL,
  `from_user` int(10) NOT NULL,
  `to_user` int(10) NOT NULL,
  `media` int(10) NOT NULL,
  `rating` int(1) NOT NULL,
  `comment` varchar(2500) DEFAULT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `UserReview`
--

CREATE TABLE IF NOT EXISTS `UserReview` (
  `id` int(10) NOT NULL,
  `rating` int(1) NOT NULL,
  `comment` varchar(2500) DEFAULT NULL,
  `media` int(10) NOT NULL COMMENT 'foreignkey to media',
  `user` int(10) NOT NULL COMMENT 'foreignkey to user',
  `date_created` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `UserReview`
--

INSERT INTO `UserReview` (`id`, `rating`, `comment`, `media`, `user`, `date_created`) VALUES
(1, 5, 'The best commedy of all time.', 1, 6, '2015-12-06 00:00:00'),
(2, 4, 'okie dokie', 1, 1, '2015-12-06 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Media`
--
ALTER TABLE `Media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Movie`
--
ALTER TABLE `Movie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`media`);

--
-- Indexes for table `TVEpisode`
--
ALTER TABLE `TVEpisode`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`tv_show`);

--
-- Indexes for table `TVShow`
--
ALTER TABLE `TVShow`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`media`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `UserRecommendation`
--
ALTER TABLE `UserRecommendation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `from_user` (`from_user`),
  ADD KEY `to_user` (`to_user`),
  ADD KEY `media` (`media`);

--
-- Indexes for table `UserReview`
--
ALTER TABLE `UserReview`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`user`),
  ADD KEY `media` (`media`),
  ADD KEY `user` (`user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Media`
--
ALTER TABLE `Media`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `Movie`
--
ALTER TABLE `Movie`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `TVEpisode`
--
ALTER TABLE `TVEpisode`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `TVShow`
--
ALTER TABLE `TVShow`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `UserRecommendation`
--
ALTER TABLE `UserRecommendation`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `UserReview`
--
ALTER TABLE `UserReview`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `UserRecommendation`
--
ALTER TABLE `UserRecommendation`
  ADD CONSTRAINT `UserRecommendation_ibfk_1` FOREIGN KEY (`to_user`) REFERENCES `User` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
