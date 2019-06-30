-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2019 at 06:51 AM
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
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`ID_COMMENT`, `ID_POST`, `USERNAME`, `COMMENT`, `TIME`) VALUES
(15, 13, 'firnas_reyhan', 'I like your style', '2019-06-30 11:51:01');

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
-- Dumping data for table `love`
--

INSERT INTO `love` (`ID_LOVE`, `ID_POST`, `USERNAME`, `TIME`) VALUES
(15, 13, 'firnas_reyhan', '2019-06-30 11:50:51');

--
-- Triggers `love`
--
DELIMITER $$
CREATE TRIGGER `dec_love` AFTER DELETE ON `love` FOR EACH ROW UPDATE post set TOTAL_LOVE = (TOTAL_LOVE - 1) WHERE post.ID_POST = old.ID_POST
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
  `WIDTH` int(11) NOT NULL,
  `HEIGHT` int(11) NOT NULL,
  `TOTAL_LOVE` int(11) DEFAULT '0',
  `TOTAL_COMMENT` int(11) DEFAULT '0',
  `TOTAL_VIEW` int(11) DEFAULT '0',
  `TIME` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`ID_POST`, `USERNAME`, `IMAGE`, `CAPTION`, `WIDTH`, `HEIGHT`, `TOTAL_LOVE`, `TOTAL_COMMENT`, `TOTAL_VIEW`, `TIME`) VALUES
(13, 'firnas_reyhan', '50775281_526770567810407_5368146341845270528_n.jpg', 'Blade!', 736, 736, 1, 1, 3, '2019-06-30 11:50:37');

--
-- Triggers `post`
--
DELIMITER $$
CREATE TRIGGER `dec_post` AFTER DELETE ON `post` FOR EACH ROW UPDATE user SET TOTAL_POST = (TOTAL_POST - 1) WHERE user.USERNAME = old.USERNAME
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `inc_post` AFTER INSERT ON `post` FOR EACH ROW UPDATE user SET TOTAL_POST = (TOTAL_POST + 1) WHERE user.USERNAME = new.USERNAME
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
-- Dumping data for table `relationship`
--

INSERT INTO `relationship` (`ID_RELATIONSHIP`, `USERNAME_A`, `USERNAME_B`, `TIME`) VALUES
(17, 'firnas_reyhan', 'firnas_reyhan', '2019-06-30 11:49:03');

--
-- Triggers `relationship`
--
DELIMITER $$
CREATE TRIGGER `dec_follow` AFTER DELETE ON `relationship` FOR EACH ROW IF(old.USERNAME_A != old.USERNAME_B) THEN
UPDATE user a, user b SET a.TOTAL_FOLLOWING = (a.TOTAL_FOLLOWING - 1), b.TOTAL_FOLLOWERS = (b.TOTAL_FOLLOWERS - 1) WHERE a.USERNAME = old.USERNAME_A AND b.USERNAME = old.USERNAME_B;
END IF
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `inc_follow` AFTER INSERT ON `relationship` FOR EACH ROW IF(new.USERNAME_A != new.USERNAME_B) THEN
UPDATE user a, user b SET a.TOTAL_FOLLOWING = (a.TOTAL_FOLLOWING + 1), b.TOTAL_FOLLOWERS = (b.TOTAL_FOLLOWERS + 1) WHERE a.USERNAME = new.USERNAME_A AND b.USERNAME = new.USERNAME_B;
END IF
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `top_post`
-- (See below for the actual view)
--
CREATE TABLE `top_post` (
`ID_POST` int(11)
,`USERNAME` varchar(16)
,`PROFILE` varchar(250)
,`IMAGE` varchar(250)
,`WIDTH` int(11)
,`HEIGHT` int(11)
,`TOTAL_LOVE` int(11)
,`TOTAL_COMMENT` int(11)
,`TOTAL_VIEW` int(11)
,`POINT` decimal(16,4)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `top_user`
-- (See below for the actual view)
--
CREATE TABLE `top_user` (
`USERNAME` varchar(16)
,`IMAGE` varchar(250)
,`TOTALFOLLOWERS` int(11)
,`TOTALLOVE` decimal(32,0)
,`TOTALVIEW` decimal(32,0)
,`POINT` decimal(38,4)
);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `USERNAME` varchar(16) NOT NULL,
  `PASSWORD` varchar(16) DEFAULT NULL,
  `NAME` varchar(100) DEFAULT NULL,
  `GENDER` varchar(10) DEFAULT 'None',
  `ABOUT` varchar(200) DEFAULT NULL,
  `EMAIL` varchar(50) DEFAULT NULL,
  `PHONE` varchar(15) DEFAULT NULL,
  `WEBSITE` varchar(50) DEFAULT NULL,
  `IMAGE` varchar(250) DEFAULT 'no_profile.jpg',
  `TOTAL_POST` int(11) DEFAULT '0',
  `TOTAL_FOLLOWING` int(11) DEFAULT '0',
  `TOTAL_FOLLOWERS` int(11) DEFAULT '0',
  `STATUS` varchar(10) DEFAULT NULL,
  `TIME` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`USERNAME`, `PASSWORD`, `NAME`, `GENDER`, `ABOUT`, `EMAIL`, `PHONE`, `WEBSITE`, `IMAGE`, `TOTAL_POST`, `TOTAL_FOLLOWING`, `TOTAL_FOLLOWERS`, `STATUS`, `TIME`) VALUES
('firnas_reyhan', 'muraf212', 'Reyhan Firnas', 'Male', 'Ilmuan Gila', 'firnasreyhan@gmail.com', '082336704502', 'www.google.com', '50574252_526771077810356_2845049936746119168_o.jpg', 1, 0, 0, 'Active', '2019-06-30 11:49:03');

-- --------------------------------------------------------

--
-- Structure for view `top_post`
--
DROP TABLE IF EXISTS `top_post`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `top_post`  AS  select `post`.`ID_POST` AS `ID_POST`,`post`.`USERNAME` AS `USERNAME`,`user`.`IMAGE` AS `PROFILE`,`post`.`IMAGE` AS `IMAGE`,`post`.`WIDTH` AS `WIDTH`,`post`.`HEIGHT` AS `HEIGHT`,`post`.`TOTAL_LOVE` AS `TOTAL_LOVE`,`post`.`TOTAL_COMMENT` AS `TOTAL_COMMENT`,`post`.`TOTAL_VIEW` AS `TOTAL_VIEW`,(((`post`.`TOTAL_LOVE` + `post`.`TOTAL_COMMENT`) + `post`.`TOTAL_VIEW`) / 3) AS `POINT` from (`user` join `post`) where (`user`.`USERNAME` = `post`.`USERNAME`) order by (((`post`.`TOTAL_LOVE` + `post`.`TOTAL_COMMENT`) + `post`.`TOTAL_VIEW`) / 3) desc ;

-- --------------------------------------------------------

--
-- Structure for view `top_user`
--
DROP TABLE IF EXISTS `top_user`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `top_user`  AS  select `user`.`USERNAME` AS `USERNAME`,`user`.`IMAGE` AS `IMAGE`,`user`.`TOTAL_FOLLOWERS` AS `TOTALFOLLOWERS`,sum(`post`.`TOTAL_LOVE`) AS `TOTALLOVE`,sum(`post`.`TOTAL_VIEW`) AS `TOTALVIEW`,(((sum(`post`.`TOTAL_LOVE`) + sum(`post`.`TOTAL_VIEW`)) + `user`.`TOTAL_FOLLOWERS`) / (count(`post`.`USERNAME`) + 1)) AS `POINT` from (`user` join `post`) where (`user`.`USERNAME` = `post`.`USERNAME`) group by `post`.`USERNAME` order by (((sum(`post`.`TOTAL_LOVE`) + sum(`post`.`TOTAL_VIEW`)) + `user`.`TOTAL_FOLLOWERS`) / (count(`post`.`USERNAME`) + 1)) desc limit 10 ;

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
  ADD PRIMARY KEY (`USERNAME`),
  ADD UNIQUE KEY `EMAIL` (`EMAIL`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `ID_COMMENT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `love`
--
ALTER TABLE `love`
  MODIFY `ID_LOVE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `ID_POST` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `relationship`
--
ALTER TABLE `relationship`
  MODIFY `ID_RELATIONSHIP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `FK_RELATIONSHIP_3` FOREIGN KEY (`ID_POST`) REFERENCES `post` (`ID_POST`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_RELATIONSHIP_4` FOREIGN KEY (`USERNAME`) REFERENCES `user` (`USERNAME`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `love`
--
ALTER TABLE `love`
  ADD CONSTRAINT `FK_RELATIONSHIP_5` FOREIGN KEY (`ID_POST`) REFERENCES `post` (`ID_POST`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_RELATIONSHIP_6` FOREIGN KEY (`USERNAME`) REFERENCES `user` (`USERNAME`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `FK_RELATIONSHIP_2` FOREIGN KEY (`USERNAME`) REFERENCES `user` (`USERNAME`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `relationship`
--
ALTER TABLE `relationship`
  ADD CONSTRAINT `FK_RELATIONSHIP_7` FOREIGN KEY (`USERNAME_A`) REFERENCES `user` (`USERNAME`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_RELATIONSHIP_8` FOREIGN KEY (`USERNAME_B`) REFERENCES `user` (`USERNAME`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
