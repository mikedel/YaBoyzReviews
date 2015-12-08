-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 08, 2015 at 09:58 AM
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
-- Table structure for table `Friendlist`
--

CREATE TABLE IF NOT EXISTS `Friendlist` (
  `id` int(10) NOT NULL,
  `user` int(10) NOT NULL,
  `friend` int(10) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Friendlist`
--

INSERT INTO `Friendlist` (`id`, `user`, `friend`, `date_created`) VALUES
(11, 11, 10, '2015-12-08 09:09:06'),
(12, 10, 11, '2015-12-08 09:09:06'),
(13, 12, 10, '2015-12-08 09:56:10'),
(14, 10, 12, '2015-12-08 09:56:10');

-- --------------------------------------------------------

--
-- Table structure for table `Media`
--

CREATE TABLE IF NOT EXISTS `Media` (
  `id` int(10) NOT NULL,
  `title` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Media`
--

INSERT INTO `Media` (`id`, `title`) VALUES
(6, 'Your Highness'),
(7, 'Gladiator'),
(8, 'The Walking Dead'),
(9, 'Blade'),
(10, 'Armageddon'),
(11, 'Crank'),
(13, 'Trailer Park Boys'),
(14, 'Godfather'),
(15, 'Eragon'),
(17, 'Fat Albert'),
(19, 'The Matrix');

-- --------------------------------------------------------

--
-- Table structure for table `Message`
--

CREATE TABLE IF NOT EXISTS `Message` (
  `id` int(10) NOT NULL,
  `to_user` int(11) NOT NULL,
  `from_user` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `content` varchar(500) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Message`
--

INSERT INTO `Message` (`id`, `to_user`, `from_user`, `date_created`, `content`) VALUES
(26, 10, 11, '2015-12-08 09:09:13', 'Hey man'),
(27, 10, 11, '2015-12-08 09:09:26', 'Call me?'),
(28, 11, 10, '2015-12-08 09:09:55', 'Remember the retraining order, Blade.');

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE IF NOT EXISTS `User` (
  `id` int(10) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`id`, `first_name`, `last_name`, `email`, `password`, `date_created`) VALUES
(9, 'Joe', 'Shmoe', 'Joe@Shmoe.com', '937e8d5fbb48bd4949536cd65b8d35c426b80d2f830c5c308e2cdec422ae2244', '0000-00-00 00:00:00'),
(10, 'John', 'Stamos', 'john@stamos.com', '937e8d5fbb48bd4949536cd65b8d35c426b80d2f830c5c308e2cdec422ae2244', '0000-00-00 00:00:00'),
(11, 'Wesley', 'Snipes', 'snipes@gmail.com', '937e8d5fbb48bd4949536cd65b8d35c426b80d2f830c5c308e2cdec422ae2244', '0000-00-00 00:00:00'),
(12, 'Michael', 'DelSignore', 'mcdelsi@gmail.com', '937e8d5fbb48bd4949536cd65b8d35c426b80d2f830c5c308e2cdec422ae2244', '0000-00-00 00:00:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `UserRecommendation`
--

INSERT INTO `UserRecommendation` (`id`, `from_user`, `to_user`, `media`, `rating`, `comment`, `date_created`) VALUES
(4, 11, 10, 11, 5, 'You were amazing in this movie man! When are we gonna do some work together? Have your people call mine.', '2015-12-08 09:08:54'),
(5, 10, 11, 12, 5, 'I know Kung Fu.', '2015-12-08 09:35:04');

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `UserReview`
--

INSERT INTO `UserReview` (`id`, `rating`, `comment`, `media`, `user`, `date_created`) VALUES
(7, 2, 'Zombies are so cliche.  It would also be a much better show if I was in it.', 8, 10, '2015-12-08 09:06:17'),
(8, 5, 'Best movie of all time HANDS DOWN!', 9, 10, '2015-12-08 09:06:59'),
(9, 1, 'Bad old movie, would not watch again. Totally unrealistic.', 10, 11, '2015-12-08 09:08:12'),
(10, 5, 'Rawr', 15, 10, '2015-12-08 09:22:11');

-- --------------------------------------------------------

--
-- Table structure for table `Watchlist`
--

CREATE TABLE IF NOT EXISTS `Watchlist` (
  `id` int(10) NOT NULL,
  `user` int(10) NOT NULL,
  `media` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Watchlist`
--

INSERT INTO `Watchlist` (`id`, `user`, `media`) VALUES
(19, 10, 8),
(20, 10, 13),
(21, 10, 17);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Friendlist`
--
ALTER TABLE `Friendlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Media`
--
ALTER TABLE `Media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Message`
--
ALTER TABLE `Message`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `Watchlist`
--
ALTER TABLE `Watchlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Friendlist`
--
ALTER TABLE `Friendlist`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `Media`
--
ALTER TABLE `Media`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `Message`
--
ALTER TABLE `Message`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `UserRecommendation`
--
ALTER TABLE `UserRecommendation`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `UserReview`
--
ALTER TABLE `UserReview`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `Watchlist`
--
ALTER TABLE `Watchlist`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
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
