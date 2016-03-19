-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 19, 2016 at 07:49 PM
-- Server version: 5.5.47-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `skillswap`
--

-- --------------------------------------------------------

--
-- Table structure for table `Mailbox`
--

CREATE TABLE IF NOT EXISTS `Mailbox` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `mailbox` tinyint(1) NOT NULL,
  `message_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `message_id` (`message_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=55 ;

--
-- Dumping data for table `Mailbox`
--

INSERT INTO `Mailbox` (`id`, `user_id`, `mailbox`, `message_id`) VALUES
(4, 31, 1, 2),
(6, 31, 1, 3),
(23, 31, 0, 11),
(44, 31, 1, 22),
(45, 1, 0, 22),
(48, 1, 1, 24),
(49, 31, 0, 24),
(50, 31, 1, 25),
(51, 1, 0, 25),
(52, 1, 1, 26);

-- --------------------------------------------------------

--
-- Table structure for table `Message`
--

CREATE TABLE IF NOT EXISTS `Message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(255) NOT NULL,
  `to` int(11) NOT NULL,
  `from` int(11) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `to` (`to`),
  KEY `from` (`from`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `Message`
--

INSERT INTO `Message` (`id`, `content`, `to`, `from`, `date_time`) VALUES
(1, 'Hi Cindy', 1, 2, '2016-03-07 00:10:32'),
(2, 'test', 31, 1, '2016-03-07 00:10:32'),
(3, 'another test', 31, 1, '2016-03-07 00:10:32'),
(4, 'test', 1, 1, '2016-03-07 00:10:32'),
(5, 'test', 31, 1, '2016-03-07 00:11:04'),
(6, 'test', 1, 1, '2016-03-07 00:13:29'),
(7, 'Hi Daj', 1, 1, '2016-03-08 22:57:30'),
(8, 'Hi Dajwa', 1, 1, '2016-03-09 00:29:38'),
(9, 'test', 1, 1, '2016-03-09 00:40:16'),
(10, 'Hi Dajwa', 1, 1, '2016-03-09 02:05:57'),
(11, 'BRO! Sup?', 1, 31, '2016-03-10 04:27:03'),
(12, 'Not much. You?', 31, 1, '2016-03-10 04:30:33'),
(13, 'test', 31, 1, '2016-03-10 22:55:51'),
(14, 'TEST', 31, 1, '2016-03-10 22:57:28'),
(15, 'TEST', 31, 1, '2016-03-10 22:57:53'),
(16, 'sdmakdmaskmdsakdm  msakdm sakd msakdm sakmd sakdm kasm kasmd kmsdkam kdmsamdkas mkasm das maskdm sakdm kasdm kasmdk masdk msakd m msdak ksdma', 31, 1, '2016-03-10 23:09:00'),
(17, '', 31, 1, '2016-03-10 23:26:38'),
(18, 'test', 31, 1, '2016-03-11 00:36:03'),
(19, 'Hi me!', 1, 1, '2016-03-11 00:50:42'),
(20, 'yo', 1, 1, '2016-03-11 01:02:23'),
(21, 'Hi you!', 1, 1, '2016-03-11 03:21:09'),
(22, 'Hey I know some quilting. Let''s go quilt.', 31, 1, '2016-03-11 03:29:55'),
(23, 'This is a deliberate attempt at a really long message. Here is more typing. This will be very long. And it will to continue to be long. Like so.', 1, 1, '2016-03-11 04:01:53'),
(24, 'I''m down for some quilting later today.', 1, 31, '2016-03-11 04:40:09'),
(25, 'I really enjoyed our quilting. Let''s do it again some time.', 31, 1, '2016-03-11 17:35:58'),
(26, 'Note to self: remember that I have a hockey meetup tomorrow.', 1, 1, '2016-03-11 22:51:41');

-- --------------------------------------------------------

--
-- Table structure for table `Skill`
--

CREATE TABLE IF NOT EXISTS `Skill` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `Skill`
--

INSERT INTO `Skill` (`id`, `name`) VALUES
(28, 'algebra'),
(8, 'AutoCAD'),
(9, 'baking'),
(15, 'baking ham'),
(23, 'ballet'),
(26, 'boxing'),
(3, 'chess'),
(25, 'clarinet'),
(13, 'cooking'),
(7, 'dancing'),
(14, 'fencing'),
(12, 'fighting'),
(19, 'fishing'),
(21, 'hiking'),
(6, 'hockey'),
(2, 'knitting'),
(1, 'piano'),
(27, 'poetry'),
(4, 'poker'),
(24, 'programming'),
(17, 'quilting'),
(18, 'raking'),
(10, 'reading'),
(16, 'running'),
(22, 'singing'),
(5, 'soccer'),
(20, 'swimming'),
(11, 'wizardry');

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE IF NOT EXISTS `User` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(255) DEFAULT NULL,
  `username` varchar(20) NOT NULL,
  `image` bit(1) NOT NULL,
  `age` tinyint(3) DEFAULT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `zip` int(5) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`,`image`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`id`, `description`, `username`, `image`, `age`, `gender`, `zip`, `password`) VALUES
(1, 'I am dajwa.', 'dajwa', b'1', 24, 'male', 2029, 'cc03e747a6afbbcbf8be7668acfebee5'),
(2, 'I am Cindy.', 'hered22c', b'0', 21, 'female', 1075, 'cc03e747a6afbbcbf8be7668acfebee5'),
(3, 'i am super', 'superman', b'0', 12, 'male', 2027, 'cc03e747a6afbbcbf8be7668acfebee5'),
(4, 'test', 'superman2', b'0', 23, 'male', 2026, 'cc03e747a6afbbcbf8be7668acfebee5'),
(5, 'test', 'test', b'0', 23, 'male', 2026, 'cc03e747a6afbbcbf8be7668acfebee5'),
(11, 'mad', 'mm', b'0', 23, 'male', 2333, 'cc03e747a6afbbcbf8be7668acfebee5'),
(16, 'test', 'test233', b'0', 24, 'male', 2026, 'cc03e747a6afbbcbf8be7668acfebee5'),
(17, 'Frank', 'moomoo', b'0', 23, 'male', 2026, 'cc03e747a6afbbcbf8be7668acfebee5'),
(18, 'Moo', 'test234', b'0', 34, 'male', 2026, 'cc03e747a6afbbcbf8be7668acfebee5'),
(19, 'I am Jeff.', 'clamsmasher', b'0', 23, 'male', 2026, 'cc03e747a6afbbcbf8be7668acfebee5'),
(20, 'Mooooo', 'clamsmasher5000', b'0', 23, 'male', 2026, 'cc03e747a6afbbcbf8be7668acfebee5'),
(21, 'test3', 'testtest', b'0', 21, 'female', 2026, '1fb0e331c05a52d5eb847d6fc018320d'),
(31, 'test2', 'dajwa5', b'1', 25, 'male', 0, '1fb0e331c05a52d5eb847d6fc018320d'),
(32, 'test3', 'dajwa2', b'0', 23, 'male', 2026, '1fb0e331c05a52d5eb847d6fc018320d'),
(33, 'I am awesome.', 'dajwa32', b'1', 23, 'female', 2026, '1fb0e331c05a52d5eb847d6fc018320d'),
(34, 'test2', 'dajabinx', b'0', 18, 'female', 2026, '1fb0e331c05a52d5eb847d6fc018320d'),
(35, 'testtest', 'jinxlover', b'0', 20, 'other', 2026, '1fb0e331c05a52d5eb847d6fc018320d');

-- --------------------------------------------------------

--
-- Table structure for table `UserDesiredSkill`
--

CREATE TABLE IF NOT EXISTS `UserDesiredSkill` (
  `user_id` int(11) NOT NULL,
  `skill_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`skill_id`),
  KEY `user_id` (`user_id`),
  KEY `skill_id` (`skill_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `UserDesiredSkill`
--

INSERT INTO `UserDesiredSkill` (`user_id`, `skill_id`) VALUES
(1, 6),
(1, 14),
(1, 16),
(1, 20),
(31, 17),
(35, 1),
(35, 23),
(35, 28);

-- --------------------------------------------------------

--
-- Table structure for table `UserSkill`
--

CREATE TABLE IF NOT EXISTS `UserSkill` (
  `user_id` int(11) NOT NULL,
  `skill_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`skill_id`),
  KEY `skill_id` (`skill_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `UserSkill`
--

INSERT INTO `UserSkill` (`user_id`, `skill_id`) VALUES
(1, 3),
(1, 5),
(35, 5),
(1, 9),
(35, 22),
(1, 25),
(35, 27);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Mailbox`
--
ALTER TABLE `Mailbox`
  ADD CONSTRAINT `Mailbox_ibfk_2` FOREIGN KEY (`message_id`) REFERENCES `Message` (`id`),
  ADD CONSTRAINT `Mailbox_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `User` (`id`);

--
-- Constraints for table `Message`
--
ALTER TABLE `Message`
  ADD CONSTRAINT `Message_ibfk_1` FOREIGN KEY (`to`) REFERENCES `User` (`id`),
  ADD CONSTRAINT `Message_ibfk_2` FOREIGN KEY (`from`) REFERENCES `User` (`id`);

--
-- Constraints for table `UserDesiredSkill`
--
ALTER TABLE `UserDesiredSkill`
  ADD CONSTRAINT `UserDesiredSkill_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `User` (`id`),
  ADD CONSTRAINT `UserDesiredSkill_ibfk_2` FOREIGN KEY (`skill_id`) REFERENCES `Skill` (`id`);

--
-- Constraints for table `UserSkill`
--
ALTER TABLE `UserSkill`
  ADD CONSTRAINT `UserSkill_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `User` (`id`),
  ADD CONSTRAINT `UserSkill_ibfk_2` FOREIGN KEY (`skill_id`) REFERENCES `Skill` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
