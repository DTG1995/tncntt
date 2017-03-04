-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2017 at 03:55 AM
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
-- Table structure for table `categorys`
--

CREATE TABLE `categorys` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `contribute` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categorys`
--

INSERT INTO `categorys` (`id`, `name`, `active`, `contribute`) VALUES
(2, 'network', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `commentdefinitions`
--

CREATE TABLE `commentdefinitions` (
  `id` int(11) NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `commentdefinition_id` int(11) NOT NULL,
  `definition_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `commentmeans`
--

CREATE TABLE `commentmeans` (
  `id` int(11) NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `commentmean_id` int(11) DEFAULT NULL,
  `mean_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `commentmeans`
--

INSERT INTO `commentmeans` (`id`, `content`, `created`, `commentmean_id`, `mean_id`, `user_id`) VALUES
(1, 'test', '2017-03-03 00:00:00', NULL, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `definitions`
--

CREATE TABLE `definitions` (
  `id` int(11) NOT NULL,
  `word_id` int(11) NOT NULL,
  `define` text COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `contribute` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `definitions`
--

INSERT INTO `definitions` (`id`, `word_id`, `define`, `user_id`, `contribute`, `category_id`) VALUES
(1, 2, 'con chim nhỏ ak', 1, 25, 2);

-- --------------------------------------------------------

--
-- Table structure for table `likedefinitions`
--

CREATE TABLE `likedefinitions` (
  `definition_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `islike` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `likemeans`
--

CREATE TABLE `likemeans` (
  `mean_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `islike` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `means`
--

CREATE TABLE `means` (
  `id` int(11) NOT NULL,
  `word_id` int(11) NOT NULL,
  `mean` text COLLATE utf8_unicode_ci NOT NULL,
  `contribute` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `means`
--

INSERT INTO `means` (`id`, `word_id`, `mean`, `contribute`, `user_id`, `category_id`) VALUES
(3, 2, 'con chim non á', 25, 1, 2),
(4, 2, 'cacsacascascsaccsacsa', 50, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `namedisplay` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `isadmin` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `last_login` datetime NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `namedisplay`, `password`, `isadmin`, `created`, `last_login`, `status`, `active`) VALUES
(1, 'abc@123.a', 'dtg', 'abc', 1, '2017-02-21 00:00:00', '2017-02-28 07:21:19', 1, 0),
(2, 'dtg', 'DTG', 'abc', 1, '2017-03-04 02:41:56', '2017-03-04 02:41:00', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `words`
--

CREATE TABLE `words` (
  `id` int(11) NOT NULL,
  `word` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `words`
--

INSERT INTO `words` (`id`, `word`) VALUES
(1, 'obj'),
(2, 'ccna'),
(3, 'abc');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorys`
--
ALTER TABLE `categorys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commentdefinitions`
--
ALTER TABLE `commentdefinitions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `iddefinition` (`definition_id`);

--
-- Indexes for table `commentmeans`
--
ALTER TABLE `commentmeans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idmeans` (`mean_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `definitions`
--
ALTER TABLE `definitions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `word_id` (`word_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `likedefinitions`
--
ALTER TABLE `likedefinitions`
  ADD PRIMARY KEY (`definition_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `likemeans`
--
ALTER TABLE `likemeans`
  ADD PRIMARY KEY (`mean_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `means`
--
ALTER TABLE `means`
  ADD PRIMARY KEY (`id`),
  ADD KEY `word_id` (`word_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `words`
--
ALTER TABLE `words`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorys`
--
ALTER TABLE `categorys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `commentdefinitions`
--
ALTER TABLE `commentdefinitions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `commentmeans`
--
ALTER TABLE `commentmeans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `definitions`
--
ALTER TABLE `definitions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `means`
--
ALTER TABLE `means`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `words`
--
ALTER TABLE `words`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `commentdefinitions`
--
ALTER TABLE `commentdefinitions`
  ADD CONSTRAINT `commentdefinitions_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `commentdefinitions_ibfk_3` FOREIGN KEY (`definition_id`) REFERENCES `definitions` (`id`);

--
-- Constraints for table `commentmeans`
--
ALTER TABLE `commentmeans`
  ADD CONSTRAINT `commentmeans_ibfk_1` FOREIGN KEY (`mean_id`) REFERENCES `means` (`id`),
  ADD CONSTRAINT `commentmeans_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `definitions`
--
ALTER TABLE `definitions`
  ADD CONSTRAINT `definitions_ibfk_1` FOREIGN KEY (`word_id`) REFERENCES `words` (`id`),
  ADD CONSTRAINT `definitions_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `definitions_ibfk_3` FOREIGN KEY (`category_id`) REFERENCES `categorys` (`id`);

--
-- Constraints for table `likedefinitions`
--
ALTER TABLE `likedefinitions`
  ADD CONSTRAINT `likedefinitions_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `likedefinitions_ibfk_3` FOREIGN KEY (`definition_id`) REFERENCES `definitions` (`id`);

--
-- Constraints for table `likemeans`
--
ALTER TABLE `likemeans`
  ADD CONSTRAINT `likemeans_ibfk_1` FOREIGN KEY (`mean_id`) REFERENCES `means` (`id`),
  ADD CONSTRAINT `likemeans_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `means`
--
ALTER TABLE `means`
  ADD CONSTRAINT `means_ibfk_1` FOREIGN KEY (`word_id`) REFERENCES `words` (`id`),
  ADD CONSTRAINT `means_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `means_ibfk_3` FOREIGN KEY (`category_id`) REFERENCES `categorys` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
