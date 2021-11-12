-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 11, 2021 at 10:53 AM
-- Server version: 8.0.21
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dcms`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblacyear`
--

DROP TABLE IF EXISTS `tblacyear`;
CREATE TABLE IF NOT EXISTS `tblacyear` (
  `id` int NOT NULL AUTO_INCREMENT,
  `year` year NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblapproval`
--

DROP TABLE IF EXISTS `tblapproval`;
CREATE TABLE IF NOT EXISTS `tblapproval` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fname` varchar(25) NOT NULL,
  `mname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `city` varchar(30) NOT NULL,
  `dob` date NOT NULL,
  `gender` char(1) NOT NULL,
  `contactno` bigint NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `instituteid` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblevaluationcriteria`
--

DROP TABLE IF EXISTS `tblevaluationcriteria`;
CREATE TABLE IF NOT EXISTS `tblevaluationcriteria` (
  `id` int NOT NULL AUTO_INCREMENT,
  `criteria` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tblevaluationcriteria`
--

INSERT INTO `tblevaluationcriteria` (`id`, `criteria`) VALUES
(1, 'Expression'),
(2, 'Sync'),
(3, 'abc'),
(4, 'xyz');

-- --------------------------------------------------------

--
-- Table structure for table `tblevent`
--

DROP TABLE IF EXISTS `tblevent`;
CREATE TABLE IF NOT EXISTS `tblevent` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `eventtype` varchar(5) NOT NULL,
  `event_date` datetime NOT NULL,
  `venue` varchar(100) NOT NULL,
  `poster` varchar(255) NOT NULL,
  `rules` varchar(255) NOT NULL,
  `agenda` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tblevent`
--

INSERT INTO `tblevent` (`id`, `name`, `eventtype`, `event_date`, `venue`, `poster`, `rules`, `agenda`) VALUES
(1, 'Folk', 'Solo', '2021-12-01 10:40:00', 'PT Hall', 'files/phpD41A.tmp', 'files/phpD41B.tmp', 'files/'),
(2, 'Folk', 'Solo', '2021-12-01 10:41:00', 'PT Hall', 'files/php2B21.tmp', 'files/php2B22.tmp', 'files/php2B23.tmp'),
(3, 'Free Style', 'Duo', '2021-11-10 10:43:00', 'JD Hall', 'files/phpDE46.tmp', 'files/phpDE47.tmp', 'files/phpDE57.tmp'),
(4, 'bollywood style', 'Group', '2021-11-18 10:44:00', 'PT Hall', 'files/php600B.tmp', 'files/php601C.tmp', 'files/php601D.tmp'),
(5, 'Diwali Dance Competition', 'Solo', '2021-10-27 14:20:00', 'PT Hall', 'files/php5117.tmp', 'files/php5128.tmp', 'files/php5129.tmp'),
(6, 'abc', 'Duo', '2021-11-10 09:00:00', 'JD Hall', 'files/phpC77D.tmp', 'files/phpC77E.tmp', 'files/phpC77F.tmp');

-- --------------------------------------------------------

--
-- Table structure for table `tbleventcoordinator`
--

DROP TABLE IF EXISTS `tbleventcoordinator`;
CREATE TABLE IF NOT EXISTS `tbleventcoordinator` (
  `id` int NOT NULL AUTO_INCREMENT,
  `eventid` int NOT NULL,
  `memberid` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `eventid` (`eventid`),
  KEY `memberid` (`memberid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbleventcoordinator`
--

INSERT INTO `tbleventcoordinator` (`id`, `eventid`, `memberid`) VALUES
(1, 5, 4),
(2, 6, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbleventcriteria`
--

DROP TABLE IF EXISTS `tbleventcriteria`;
CREATE TABLE IF NOT EXISTS `tbleventcriteria` (
  `id` int NOT NULL AUTO_INCREMENT,
  `eventid` int NOT NULL,
  `evaluationCriteriaId` int NOT NULL,
  `weightage` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `eventid` (`eventid`),
  KEY `evaluationCriteriaId` (`evaluationCriteriaId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbleventcriteria`
--

INSERT INTO `tbleventcriteria` (`id`, `eventid`, `evaluationCriteriaId`, `weightage`) VALUES
(1, 5, 1, 5),
(2, 5, 2, 5),
(3, 5, 3, 5),
(4, 5, 4, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbleventjudge`
--

DROP TABLE IF EXISTS `tbleventjudge`;
CREATE TABLE IF NOT EXISTS `tbleventjudge` (
  `id` int NOT NULL AUTO_INCREMENT,
  `eventid` int NOT NULL,
  `judgeid` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `eventid` (`eventid`),
  KEY `judgeid` (`judgeid`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbleventjudge`
--

INSERT INTO `tbleventjudge` (`id`, `eventid`, `judgeid`) VALUES
(16, 5, 1),
(17, 5, 2),
(18, 5, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbleventparticipants`
--

DROP TABLE IF EXISTS `tbleventparticipants`;
CREATE TABLE IF NOT EXISTS `tbleventparticipants` (
  `id` int NOT NULL AUTO_INCREMENT,
  `enro` int NOT NULL,
  `eventid` int NOT NULL,
  `teamid` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `eventid` (`eventid`),
  KEY `teamid` (`teamid`),
  KEY `enro` (`enro`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbleventscore`
--

DROP TABLE IF EXISTS `tbleventscore`;
CREATE TABLE IF NOT EXISTS `tbleventscore` (
  `id` int NOT NULL AUTO_INCREMENT,
  `eventJudgeid` int NOT NULL,
  `teamid` int NOT NULL,
  `eventCriteriaid` int NOT NULL,
  `team_score` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `teamid` (`teamid`),
  KEY `eventCriteriaid` (`eventCriteriaid`),
  KEY `eventJudgeid` (`eventJudgeid`)
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbleventscore`
--

INSERT INTO `tbleventscore` (`id`, `eventJudgeid`, `teamid`, `eventCriteriaid`, `team_score`) VALUES
(49, 16, 1, 1, 1),
(50, 16, 1, 2, 2),
(51, 16, 1, 3, 3),
(52, 16, 1, 4, 4),
(53, 17, 1, 1, 5),
(54, 17, 1, 2, 6),
(55, 17, 1, 3, 7),
(56, 17, 1, 4, 8),
(57, 18, 1, 1, 9),
(58, 18, 1, 2, 10),
(59, 18, 1, 3, 11),
(60, 18, 1, 4, 12),
(61, 16, 2, 1, 13),
(62, 16, 2, 2, 14),
(63, 16, 2, 3, 15),
(64, 16, 2, 4, 16),
(65, 17, 2, 1, 17),
(66, 17, 2, 2, 18),
(67, 17, 2, 3, 19),
(68, 17, 2, 4, 20),
(69, 18, 2, 1, 21),
(70, 18, 2, 2, 22),
(71, 18, 2, 3, 23),
(72, 18, 2, 4, 24),
(77, 16, 3, 1, 25),
(78, 16, 3, 2, 26),
(79, 16, 3, 3, 27),
(80, 16, 3, 4, 28),
(81, 17, 3, 1, 29),
(82, 17, 3, 2, 30),
(83, 17, 3, 3, 31),
(84, 17, 3, 4, 32),
(85, 18, 3, 1, 33),
(86, 18, 3, 2, 34),
(87, 18, 3, 3, 35),
(88, 18, 3, 4, 36);

-- --------------------------------------------------------

--
-- Table structure for table `tblinstitute`
--

DROP TABLE IF EXISTS `tblinstitute`;
CREATE TABLE IF NOT EXISTS `tblinstitute` (
  `id` int NOT NULL AUTO_INCREMENT,
  `institutename` varchar(100) NOT NULL,
  `status` char(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tblinstitute`
--

INSERT INTO `tblinstitute` (`id`, `institutename`, `status`) VALUES
(1, 'BABU MADHAV INSTITUTE OF INFORMATION TECHNOLOGY', 'A'),
(2, 'C.G. BHAKTA INSTITUTE OF BIOTECHNOLOGY', 'A'),
(3, 'CHOTUBHAI GOPALBHAI PATEL INSTITUTE OF TECHNOLOGY', 'A'),
(4, 'DIWALIBA POLITECHNIC', 'A'),
(5, 'DEPARTMENT OF MATHEMATICS', 'A'),
(6, 'DEPARTMENT OF PHYSICS', 'A'),
(7, 'DEPARTMENT OF CHEMISTRY', 'A'),
(8, 'BHULABHAI VANMALIBHAI PATEL INSTITUTE OF COMMERCE', 'A'),
(9, 'BHULABHAI VANMALIBHAI PATEL INSTITUTE OF COMPUTER SCIENCE', 'A'),
(10, 'MALIBA PHARMACY COLLEGE', 'A'),
(11, 'MANIBA-BHULA NURSING COLLEGE', 'A'),
(12, 'RAMAN BHAKTA SCHOLL OF ARCHITECHTURE', 'A'),
(13, 'SHRIMAD RAJCHANDRA INSTITUTE OF MANAGEMENT & COMPUTER APPLICATION', 'A'),
(14, 'BHULABHAI VANMALIBHAI PATEL INSTITUTE OF MANAGEMENT', 'A'),
(15, 'SHRIMAD RAJCHANDRA COLLEGE OF PHYSIOTHERAPY', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `tbljudge`
--

DROP TABLE IF EXISTS `tbljudge`;
CREATE TABLE IF NOT EXISTS `tbljudge` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(20) NOT NULL,
  `middlename` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(50) NOT NULL,
  `gender` char(1) NOT NULL,
  `contactno` bigint NOT NULL,
  `email` varchar(30) NOT NULL,
  `profile_attachment` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbljudge`
--

INSERT INTO `tbljudge` (`id`, `firstname`, `middlename`, `lastname`, `address`, `city`, `gender`, `contactno`, `email`, `profile_attachment`) VALUES
(1, 'Dhanvin', 'Manish', 'Lad', 'Vikas Nagar, Chikhli', 'Navsari', 'F', 8465736745, 'ladhanvin01@gmail.com', 'files/phpC3CB.tmp'),
(2, 'def', 'abc', 'sty', 'iudhisbkjbd', 'Surat', 'F', 7456487568, 'def@gmail.com', 'files/phpB06E.tmp'),
(3, 'Yash', 'Lalu', 'Bhakta', 'Kamrej', 'Surat', 'M', 9738456473, 'yash@gmail.com', 'files/php61C2.tmp');

-- --------------------------------------------------------

--
-- Table structure for table `tblmember`
--

DROP TABLE IF EXISTS `tblmember`;
CREATE TABLE IF NOT EXISTS `tblmember` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(20) NOT NULL,
  `middlename` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `gender` char(1) NOT NULL,
  `contactno` bigint NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `instituteid` int NOT NULL,
  `role` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `status` char(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `instituteid` (`instituteid`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tblmember`
--

INSERT INTO `tblmember` (`id`, `firstname`, `middlename`, `lastname`, `city`, `dob`, `gender`, `contactno`, `email`, `password`, `instituteid`, `role`, `status`) VALUES
(1, 'Deep', 'Manish', 'Lad', 'Surat', '2001-12-12', 'M', 9827467583, 'ladeep7772@gmail.com', '$2y$10$KeZx2..b0faJJiaOyoptc.JnJ4qjm/kySCd43tsUoKEauuNhHKul2', 1, 'Admin', 'A'),
(4, 'Bhavik', 'Dharmesh', 'Bharucha', 'Navsari', '2001-12-12', 'M', 9827467583, '19bmiit023@gmail.com', '$2y$10$2DZpYRX6.E94eSS7MvPZg.xVxDoJb7d0BV51pRaUuNNMo7yxtPCCG', 1, 'Faculty', 'D'),
(5, 'Bhavik', 'abc', 'Sarang', 'Navsari', '1900-10-10', 'M', 9826484657, 'bhavik.sarang@gmail.com', '$2y$10$YpnXSQitKbbvFLjRidb4heAZlfxcx1NYvoFXC4HOTnnTcJgR0kY16', 8, 'Chairman', 'A'),
(7, 'Manish', 'Narsinhbhai', 'Lad', 'Valsad', '1972-07-13', 'M', 9727437124, 'ladmanish1972@gmail.com', 'admin', 7, 'Co-Chairman', 'D'),
(15, 'Manish', 'Narsinhbhai', 'Lad', 'Navsari', '1972-07-13', 'M', 9727437124, 'ladmanish72@gmail.com', '$2y$10$UjBA2D3U8qoFNWIXuTaxt.MHWgMURZBVdtAksLSJhR1HDpXLWdmia', 7, 'Co-Chairman', 'A'),
(19, 'Bhavik', 'Dharmesh', 'Bharucha', 'Surat', '2001-01-01', 'M', 9510020500, '19bmiit023@gmail.com', '$2y$10$AK7QFPPiFPZIyZUtWSCaNeHC646vbTrZH3kMDDuoD5o5g6LPYQXWy', 10, 'Faculty', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `tblnotification`
--

DROP TABLE IF EXISTS `tblnotification`;
CREATE TABLE IF NOT EXISTS `tblnotification` (
  `id` int NOT NULL AUTO_INCREMENT,
  `subject` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL,
  `venue` varchar(100) NOT NULL,
  `attachments` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tblnotification`
--

INSERT INTO `tblnotification` (`id`, `subject`, `description`, `datetime`, `venue`, `attachments`) VALUES
(1, 'TEST-1', 'SUCCESS !', '2021-11-05 05:00:00', 'Chikhli', 'notifications/php1636.tmp'),
(2, 'TEST-1', 'SUCCESS !', '2021-11-05 05:00:00', 'Chikhli', 'notifications/php5395.tmp'),
(3, 'TEST-2', 'Yes , its working !\r\nSUCCESS wooh !', '2021-11-05 05:00:00', 'Chikhli', 'notifications/php325D.tmp'),
(4, 'TEST-2', 'Yes , its working !\r\nSUCCESS wooh !', '2021-11-05 05:00:00', 'Chikhli', 'notifications/phpD476.tmp'),
(5, 'TEST-3', 'Try-3', '2021-11-05 05:00:00', 'Chikhli', 'notifications/php550F.tmp'),
(6, 'TEST-4', 'Try-4', '2021-11-05 05:01:00', 'Chikhli', 'notifications/phpA3CE.tmp'),
(7, 'TEST-5', 'Try-5', '2021-11-05 05:00:00', 'Chikhli', 'notifications/php656A.tmp'),
(8, 'TEST-5', 'Try-5', '2021-11-05 05:00:00', 'Chikhli', 'notifications/phpCAF8.tmp'),
(9, 'TEST-5', 'Try-5', '2021-11-05 05:00:00', 'Chikhli', 'notifications/php71C9.tmp'),
(10, 'TEST-5', 'Try-5', '2021-11-05 05:00:00', 'Chikhli', 'notifications/php8317.tmp'),
(11, 'TEST-5', 'Try-5', '2021-11-05 05:00:00', 'Chikhli', 'notifications/phpF1A5.tmp'),
(12, 'TEST-6', 'Try-6', '2021-11-05 05:00:00', 'Chikhli', 'notifications/phpC177.tmp'),
(13, 'TEST-7', 'Try-7', '2021-11-05 05:00:00', 'Chikhli', 'notifications/php8012.tmp'),
(14, 'TEST-7', 'Try-7', '2021-11-05 05:00:00', 'Chikhli', 'notifications/php3075.tmp'),
(15, 'TEST-Bhavik', 'ybg-exbq-eup', '2021-11-05 05:00:00', 'Bardoli', 'notifications/php89E1.tmp');

-- --------------------------------------------------------

--
-- Table structure for table `tblparticipants`
--

DROP TABLE IF EXISTS `tblparticipants`;
CREATE TABLE IF NOT EXISTS `tblparticipants` (
  `enro` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(20) NOT NULL,
  `middlename` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `gender` char(1) NOT NULL,
  `contactno` bigint NOT NULL,
  `email` varchar(30) NOT NULL,
  `instituteid` int NOT NULL,
  PRIMARY KEY (`enro`),
  KEY `instituteid` (`instituteid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblstudent`
--

DROP TABLE IF EXISTS `tblstudent`;
CREATE TABLE IF NOT EXISTS `tblstudent` (
  `enro` int NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `middlename` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `gender` char(1) NOT NULL,
  `contactno` bigint NOT NULL,
  `email` varchar(30) NOT NULL,
  `instituteid` int NOT NULL,
  `status` char(1) NOT NULL,
  PRIMARY KEY (`enro`),
  KEY `instituteid` (`instituteid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tblstudent`
--

INSERT INTO `tblstudent` (`enro`, `firstname`, `middlename`, `lastname`, `city`, `gender`, `contactno`, `email`, `instituteid`, `status`) VALUES
(2147483647, 'Dev', 'Mukesh', 'Patel', 'Surat', 'M', 8467345467, 'dev@gmail.com', 5, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `tblstudent_coordinator`
--

DROP TABLE IF EXISTS `tblstudent_coordinator`;
CREATE TABLE IF NOT EXISTS `tblstudent_coordinator` (
  `id` int NOT NULL,
  `tec_id` int NOT NULL,
  `enro` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tec_id` (`tec_id`),
  KEY `enro` (`enro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tblstudent_coordinator`
--

INSERT INTO `tblstudent_coordinator` (`id`, `tec_id`, `enro`) VALUES
(0, 1, 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `tblteam`
--

DROP TABLE IF EXISTS `tblteam`;
CREATE TABLE IF NOT EXISTS `tblteam` (
  `id` int NOT NULL AUTO_INCREMENT,
  `teamcode` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tblteam`
--

INSERT INTO `tblteam` (`id`, `teamcode`) VALUES
(1, 1006),
(2, 1006),
(3, 1003);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbleventcoordinator`
--
ALTER TABLE `tbleventcoordinator`
  ADD CONSTRAINT `tbleventcoordinator_ibfk_1` FOREIGN KEY (`eventid`) REFERENCES `tblevent` (`id`),
  ADD CONSTRAINT `tbleventcoordinator_ibfk_2` FOREIGN KEY (`memberid`) REFERENCES `tblmember` (`id`);

--
-- Constraints for table `tbleventcriteria`
--
ALTER TABLE `tbleventcriteria`
  ADD CONSTRAINT `tbleventcriteria_ibfk_1` FOREIGN KEY (`eventid`) REFERENCES `tblevent` (`id`),
  ADD CONSTRAINT `tbleventcriteria_ibfk_2` FOREIGN KEY (`evaluationCriteriaId`) REFERENCES `tblevaluationcriteria` (`id`);

--
-- Constraints for table `tbleventjudge`
--
ALTER TABLE `tbleventjudge`
  ADD CONSTRAINT `tbleventjudge_ibfk_1` FOREIGN KEY (`eventid`) REFERENCES `tblevent` (`id`),
  ADD CONSTRAINT `tbleventjudge_ibfk_2` FOREIGN KEY (`judgeid`) REFERENCES `tbljudge` (`id`);

--
-- Constraints for table `tbleventparticipants`
--
ALTER TABLE `tbleventparticipants`
  ADD CONSTRAINT `tbleventparticipants_ibfk_1` FOREIGN KEY (`eventid`) REFERENCES `tblevent` (`id`),
  ADD CONSTRAINT `tbleventparticipants_ibfk_2` FOREIGN KEY (`teamid`) REFERENCES `tblteam` (`id`),
  ADD CONSTRAINT `tbleventparticipants_ibfk_3` FOREIGN KEY (`enro`) REFERENCES `tblparticipants` (`enro`);

--
-- Constraints for table `tbleventscore`
--
ALTER TABLE `tbleventscore`
  ADD CONSTRAINT `tbleventscore_ibfk_1` FOREIGN KEY (`teamid`) REFERENCES `tblteam` (`id`),
  ADD CONSTRAINT `tbleventscore_ibfk_3` FOREIGN KEY (`eventCriteriaid`) REFERENCES `tblevaluationcriteria` (`id`),
  ADD CONSTRAINT `tbleventscore_ibfk_4` FOREIGN KEY (`eventJudgeid`) REFERENCES `tbleventjudge` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `tblmember`
--
ALTER TABLE `tblmember`
  ADD CONSTRAINT `tblmember_ibfk_1` FOREIGN KEY (`instituteid`) REFERENCES `tblinstitute` (`id`);

--
-- Constraints for table `tblparticipants`
--
ALTER TABLE `tblparticipants`
  ADD CONSTRAINT `tblparticipants_ibfk_1` FOREIGN KEY (`instituteid`) REFERENCES `tblinstitute` (`id`);

--
-- Constraints for table `tblstudent`
--
ALTER TABLE `tblstudent`
  ADD CONSTRAINT `tblstudent_ibfk_1` FOREIGN KEY (`instituteid`) REFERENCES `tblinstitute` (`id`);

--
-- Constraints for table `tblstudent_coordinator`
--
ALTER TABLE `tblstudent_coordinator`
  ADD CONSTRAINT `tblstudent_coordinator_ibfk_1` FOREIGN KEY (`tec_id`) REFERENCES `tbleventcoordinator` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `tblstudent_coordinator_ibfk_2` FOREIGN KEY (`enro`) REFERENCES `tblstudent` (`enro`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
