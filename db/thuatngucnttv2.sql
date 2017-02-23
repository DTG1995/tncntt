-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2017 at 09:02 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thuatngucntt`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `EMAIL` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `NAMEDISPLAY` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `PASSWORD` text COLLATE utf8_unicode_ci NOT NULL,
  `ISADMIN` tinyint(1) NOT NULL,
  `CREATED` datetime NOT NULL,
  `LAST_LOGIN` datetime NOT NULL,
  `STATUS` int(1) NOT NULL DEFAULT '1',
  `ACTIVE` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`EMAIL`, `NAMEDISPLAY`, `PASSWORD`, `ISADMIN`, `CREATED`, `LAST_LOGIN`, `STATUS`, `ACTIVE`) VALUES
('tiengioiit@gmail.com', 'DTG', '1693638116', 1, '2017-02-21 00:00:00', '2017-02-21 00:00:00', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `categorys`
--

CREATE TABLE `categorys` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ACTIVE` tinyint(1) NOT NULL,
  `CONTRIBUTE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categorys`
--

INSERT INTO `categorys` (`ID`, `NAME`, `ACTIVE`, `CONTRIBUTE`) VALUES
(2, 'NetWork', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `commentdefinitions`
--

CREATE TABLE `commentdefinitions` (
  `ID` int(11) NOT NULL,
  `CONTENT` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `CREATED` datetime NOT NULL,
  `IDPARENT` int(11) NOT NULL,
  `IDDEFINITION` int(11) NOT NULL,
  `EMAIL` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `commentmeans`
--

CREATE TABLE `commentmeans` (
  `ID` int(11) NOT NULL,
  `CONTENT` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `CREATED` datetime NOT NULL,
  `IDPARENT` int(11) DEFAULT NULL,
  `IDMEANS` int(11) NOT NULL,
  `EMAIL` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `definitions`
--

CREATE TABLE `definitions` (
  `ID` int(11) NOT NULL,
  `IDWORD` int(11) NOT NULL,
  `DEFINE` text COLLATE utf8_unicode_ci NOT NULL,
  `EMAIL` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `CONTRIBUTE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `likedefinitions`
--

CREATE TABLE `likedefinitions` (
  `IDDEFINITION` int(11) NOT NULL,
  `EMAIL` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ISLIKE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `likemeans`
--

CREATE TABLE `likemeans` (
  `IDMEAN` int(11) NOT NULL,
  `EMAIL` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ISLIKE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `means`
--

CREATE TABLE `means` (
  `ID` int(11) NOT NULL,
  `IDWORD` int(11) NOT NULL,
  `MEAN` text COLLATE utf8_unicode_ci NOT NULL,
  `CONTRIBUTE` int(11) NOT NULL,
  `EMAIL` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `words`
--

CREATE TABLE `words` (
  `ID` int(11) NOT NULL,
  `WORD` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `IDCATE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `words`
--

INSERT INTO `words` (`ID`, `WORD`, `IDCATE`) VALUES
(2, 'CCNA', 2),
(4, 'OBJ', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`EMAIL`);

--
-- Indexes for table `categorys`
--
ALTER TABLE `categorys`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `commentdefinitions`
--
ALTER TABLE `commentdefinitions`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `IDDEFINITION` (`IDDEFINITION`),
  ADD KEY `EMAIL` (`EMAIL`);

--
-- Indexes for table `commentmeans`
--
ALTER TABLE `commentmeans`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `IDMEANS` (`IDMEANS`),
  ADD KEY `EMAIL` (`EMAIL`);

--
-- Indexes for table `definitions`
--
ALTER TABLE `definitions`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `IDWORD` (`IDWORD`);

--
-- Indexes for table `likedefinitions`
--
ALTER TABLE `likedefinitions`
  ADD PRIMARY KEY (`IDDEFINITION`,`EMAIL`),
  ADD KEY `EMAIL` (`EMAIL`);

--
-- Indexes for table `likemeans`
--
ALTER TABLE `likemeans`
  ADD PRIMARY KEY (`IDMEAN`,`EMAIL`),
  ADD KEY `EMAIL` (`EMAIL`);

--
-- Indexes for table `means`
--
ALTER TABLE `means`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `IDWORD` (`IDWORD`);

--
-- Indexes for table `words`
--
ALTER TABLE `words`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `IDCATE` (`IDCATE`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorys`
--
ALTER TABLE `categorys`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `commentdefinitions`
--
ALTER TABLE `commentdefinitions`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `commentmeans`
--
ALTER TABLE `commentmeans`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `means`
--
ALTER TABLE `means`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `words`
--
ALTER TABLE `words`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `commentdefinitions`
--
ALTER TABLE `commentdefinitions`
  ADD CONSTRAINT `commentdefinitions_ibfk_1` FOREIGN KEY (`IDDEFINITION`) REFERENCES `definitions` (`ID`),
  ADD CONSTRAINT `commentdefinitions_ibfk_2` FOREIGN KEY (`EMAIL`) REFERENCES `accounts` (`EMAIL`);

--
-- Constraints for table `commentmeans`
--
ALTER TABLE `commentmeans`
  ADD CONSTRAINT `commentmeans_ibfk_1` FOREIGN KEY (`IDMEANS`) REFERENCES `means` (`ID`),
  ADD CONSTRAINT `commentmeans_ibfk_2` FOREIGN KEY (`EMAIL`) REFERENCES `accounts` (`EMAIL`);

--
-- Constraints for table `definitions`
--
ALTER TABLE `definitions`
  ADD CONSTRAINT `definitions_ibfk_1` FOREIGN KEY (`IDWORD`) REFERENCES `words` (`ID`);

--
-- Constraints for table `likedefinitions`
--
ALTER TABLE `likedefinitions`
  ADD CONSTRAINT `likedefinitions_ibfk_1` FOREIGN KEY (`IDDEFINITION`) REFERENCES `definitions` (`ID`),
  ADD CONSTRAINT `likedefinitions_ibfk_2` FOREIGN KEY (`EMAIL`) REFERENCES `accounts` (`EMAIL`);

--
-- Constraints for table `likemeans`
--
ALTER TABLE `likemeans`
  ADD CONSTRAINT `likemeans_ibfk_1` FOREIGN KEY (`IDMEAN`) REFERENCES `means` (`ID`),
  ADD CONSTRAINT `likemeans_ibfk_2` FOREIGN KEY (`EMAIL`) REFERENCES `accounts` (`EMAIL`);

--
-- Constraints for table `means`
--
ALTER TABLE `means`
  ADD CONSTRAINT `means_ibfk_1` FOREIGN KEY (`IDWORD`) REFERENCES `words` (`ID`);

--
-- Constraints for table `words`
--
ALTER TABLE `words`
  ADD CONSTRAINT `words_ibfk_1` FOREIGN KEY (`IDCATE`) REFERENCES `categorys` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
