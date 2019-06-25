-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2019 at 05:36 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pictsgram`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `ID_COMMENT` int(11) NOT NULL,
  `ID_POST` int(11) DEFAULT NULL,
  `USERNAME` varchar(16) DEFAULT NULL,
  `COMMENT` varchar(250) DEFAULT NULL,
  `TIME` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `comment`
--
DELIMITER $$
CREATE TRIGGER `dec_comment` AFTER DELETE ON `comment` FOR EACH ROW UPDATE post set TOTAL_COMMENT = (TOTAL_COMMENT - 1) WHERE post.ID_POST = old.ID_POST
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `inc_comment` AFTER INSERT ON `comment` FOR EACH ROW UPDATE post set TOTAL_COMMENT = (TOTAL_COMMENT + 1) WHERE post.ID_POST = new.ID_POST
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `love`
--

CREATE TABLE `love` (
  `ID_LOVE` int(11) NOT NULL,
  `ID_POST` int(11) DEFAULT NULL,
  `USERNAME` varchar(16) DEFAULT NULL,
  `TIME` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `love`
--
DELIMITER $$
CREATE TRIGGER `decc_love` AFTER DELETE ON `love` FOR EACH ROW UPDATE post set TOTAL_LOVE = (TOTAL_LOVE - 1) WHERE post.ID_POST = old.ID_POST
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `inc_love` AFTER INSERT ON `love` FOR EACH ROW UPDATE post set TOTAL_LOVE = (TOTAL_LOVE + 1) WHERE post.ID_POST = new.ID_POST
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `ID_POST` int(11) NOT NULL,
  `USERNAME` varchar(16) DEFAULT NULL,
  `IMAGE` varchar(250) DEFAULT NULL,
  `CAPTION` varchar(250) DEFAULT NULL,
  `TOTAL_LOVE` int(11) DEFAULT '0',
  `TOTAL_COMMENT` int(11) DEFAULT '0',
  `TOTAL_VIEW` int(11) DEFAULT '0',
  `TIME` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `post`
--
DELIMITER $$
CREATE TRIGGER `dec_post` AFTER DELETE ON `post` FOR EACH ROW UPDATE user SET TOTAL_POST = (TOTAL_POST - 1) WHERE user.USERNAME = USERNAME
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `inc_post` AFTER INSERT ON `post` FOR EACH ROW UPDATE user SET TOTAL_POST = (TOTAL_POST + 1) WHERE user.USERNAME = USERNAME
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `relationship`
--

CREATE TABLE `relationship` (
  `ID_RELATIONSHIP` int(11) NOT NULL,
  `USERNAME_A` varchar(16) DEFAULT NULL,
  `USERNAME_B` varchar(16) DEFAULT NULL,
  `TIME` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `relationship`
--
DELIMITER $$
CREATE TRIGGER `dec_follow` AFTER DELETE ON `relationship` FOR EACH ROW UPDATE user a, user b SET a.TOTAL_FOLLOWING = (a.TOTAL_FOLLOWING - 1), b.TOTAL_FOLLOWERS = (b.TOTAL_FOLLOWERS - 1) WHERE a.USERNAME = old.USERNAME_A AND b.USERNAME = old.USERNAME_B
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `inc_follow` AFTER INSERT ON `relationship` FOR EACH ROW UPDATE user a, user b SET a.TOTAL_FOLLOWING = (a.TOTAL_FOLLOWING + 1), b.TOTAL_FOLLOWERS = (b.TOTAL_FOLLOWERS + 1) WHERE a.USERNAME = new.USERNAME_A AND b.USERNAME = new.USERNAME_B
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `USERNAME` varchar(16) NOT NULL,
  `PASSWORD` varchar(16) DEFAULT NULL,
  `NAME` varchar(100) DEFAULT NULL,
  `GENDER` char(1) DEFAULT NULL,
  `ABOUT` varchar(200) DEFAULT NULL,
  `EMAIL` varchar(50) DEFAULT NULL,
  `PHONE` varchar(15) DEFAULT NULL,
  `WEBSITE` varchar(50) DEFAULT NULL,
  `IMAGE` varchar(250) DEFAULT NULL,
  `TOTAL_POST` int(11) DEFAULT '0',
  `TOTAL_FOLLOWING` int(11) DEFAULT '0',
  `TOTAL_FOLLOWERS` int(11) DEFAULT '0',
  `STATUS` varchar(10) DEFAULT NULL,
  `TIME` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`ID_COMMENT`),
  ADD KEY `FK_RELATIONSHIP_3` (`ID_POST`),
  ADD KEY `FK_RELATIONSHIP_4` (`USERNAME`);

--
-- Indexes for table `love`
--
ALTER TABLE `love`
  ADD PRIMARY KEY (`ID_LOVE`),
  ADD KEY `FK_RELATIONSHIP_5` (`ID_POST`),
  ADD KEY `FK_RELATIONSHIP_6` (`USERNAME`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`ID_POST`),
  ADD KEY `FK_RELATIONSHIP_2` (`USERNAME`);

--
-- Indexes for table `relationship`
--
ALTER TABLE `relationship`
  ADD PRIMARY KEY (`ID_RELATIONSHIP`),
  ADD KEY `FK_RELATIONSHIP_7` (`USERNAME_A`),
  ADD KEY `FK_RELATIONSHIP_8` (`USERNAME_B`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`USERNAME`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `ID_COMMENT` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `love`
--
ALTER TABLE `love`
  MODIFY `ID_LOVE` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `ID_POST` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `relationship`
--
ALTER TABLE `relationship`
  MODIFY `ID_RELATIONSHIP` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `FK_RELATIONSHIP_3` FOREIGN KEY (`ID_POST`) REFERENCES `post` (`ID_POST`),
  ADD CONSTRAINT `FK_RELATIONSHIP_4` FOREIGN KEY (`USERNAME`) REFERENCES `user` (`USERNAME`);

--
-- Constraints for table `love`
--
ALTER TABLE `love`
  ADD CONSTRAINT `FK_RELATIONSHIP_5` FOREIGN KEY (`ID_POST`) REFERENCES `post` (`ID_POST`),
  ADD CONSTRAINT `FK_RELATIONSHIP_6` FOREIGN KEY (`USERNAME`) REFERENCES `user` (`USERNAME`);

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `FK_RELATIONSHIP_2` FOREIGN KEY (`USERNAME`) REFERENCES `user` (`USERNAME`);

--
-- Constraints for table `relationship`
--
ALTER TABLE `relationship`
  ADD CONSTRAINT `FK_RELATIONSHIP_7` FOREIGN KEY (`USERNAME_A`) REFERENCES `user` (`USERNAME`),
  ADD CONSTRAINT `FK_RELATIONSHIP_8` FOREIGN KEY (`USERNAME_B`) REFERENCES `user` (`USERNAME`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
