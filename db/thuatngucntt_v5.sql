-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2017 at 04:25 AM
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
(2, 'network', 0, 0),
(3, 'programing', 1, -1);

-- --------------------------------------------------------

--
-- Table structure for table `commentdefinitions`
--

CREATE TABLE `commentdefinitions` (
  `id` int(11) NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `commentdefinition_id` int(11) DEFAULT NULL,
  `definition_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `commentdefinitions`
--

INSERT INTO `commentdefinitions` (`id`, `content`, `created`, `commentdefinition_id`, `definition_id`, `user_id`) VALUES
(5, 'asdasd', '2017-03-05 15:04:00', NULL, 1, 1),
(6, 'asdasd', '2017-03-05 15:04:27', NULL, 1, 1),
(7, 'asdasd', '2017-03-05 15:04:49', NULL, 1, 1),
(8, 'asdas', '2017-03-05 15:05:15', 5, 1, 1),
(9, 'asdasd', '2017-03-05 15:05:18', 5, 1, 1),
(10, 'asdasd', '2017-03-05 15:05:20', 5, 1, 1),
(11, 'asdasd', '2017-03-05 15:05:21', 5, 1, 1),
(12, 'asdasd', '2017-03-05 15:05:28', 5, 1, 1),
(13, '1231', '2017-03-05 15:05:32', 6, 1, 1),
(14, 'asdas', '2017-03-05 15:05:35', 6, 1, 1),
(15, 'sdas', '2017-03-05 15:06:42', 5, 1, 1),
(16, 'asddad', '2017-03-05 15:20:39', 7, 1, 1),
(17, 'asdasd', '2017-03-05 15:20:42', NULL, 1, 1),
(18, 'sddasd', '2017-03-05 15:20:50', 6, 1, 1),
(19, 'sdasdasd', '2017-03-05 15:21:01', NULL, 1, 1),
(20, 'adad', '2017-03-05 15:21:08', 19, 1, 1),
(21, 'sfsd', '2017-03-05 15:21:10', 19, 1, 1),
(22, 'wef', '2017-03-05 15:22:57', NULL, 1, 1),
(23, '123', '2017-03-05 15:24:12', NULL, 1, 1),
(24, '23e', '2017-03-05 15:24:19', 23, 1, 1),
(25, 'wqe', '2017-03-05 15:24:22', 23, 1, 1),
(26, 'asdas', '2017-03-05 15:29:57', 23, 1, 1),
(27, 'sdfaf', '2017-03-05 15:30:00', 23, 1, 1),
(28, 'asdasasd', '2017-03-05 15:43:37', 23, 1, 1),
(29, 'sai roi', '2017-03-05 16:51:35', NULL, 1, 9),
(30, 'iukhl', '2017-03-07 04:02:20', NULL, 1, 1),
(31, '123axs', '2017-03-14 03:28:30', NULL, 1, 1);

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
(1, 'test', '2017-03-03 00:00:00', NULL, 3, 1),
(2, 'test2', '2017-03-04 00:00:00', 1, 3, 1),
(3, 'asdasdasdasdasd', '2017-03-05 00:00:00', NULL, 3, 1),
(4, 'asdsad', '2017-03-05 10:23:30', NULL, 3, 1),
(6, 'asdsad', '2017-03-05 10:28:39', NULL, 3, 1),
(7, 'asdsad', '2017-03-05 10:41:14', NULL, 3, 1),
(64, '123123', '2017-03-05 12:58:53', NULL, 4, 1),
(65, '123123', '2017-03-05 12:58:55', NULL, 4, 1),
(66, 'dasd', '2017-03-05 13:07:49', 65, 4, 1),
(67, 'sdfsd', '2017-03-05 13:10:27', NULL, 5, 1),
(68, 'sdfsd', '2017-03-05 13:10:45', NULL, 5, 1),
(69, 'cnas', '2017-03-05 14:00:03', NULL, 3, 1),
(70, 'asddas', '2017-03-05 15:25:06', 69, 3, 1),
(71, 'sdasd', '2017-03-05 15:25:08', 69, 3, 1),
(72, 'dasd', '2017-03-05 15:29:43', 69, 3, 1),
(73, 'asdd', '2017-03-05 15:29:48', 69, 3, 1),
(74, 'asdas', '2017-03-05 15:29:51', 69, 3, 1),
(75, 'qua chuan', '2017-03-05 16:51:46', NULL, 4, 9),
(76, 'qua chuan', '2017-03-05 16:51:48', NULL, 4, 9),
(77, 'qua chuan', '2017-03-05 16:51:48', NULL, 4, 9),
(78, 'qua chuan', '2017-03-05 16:51:49', NULL, 4, 9),
(79, 'qua chuan', '2017-03-05 16:51:49', NULL, 4, 9),
(80, 'qua ok', '2017-03-05 16:51:55', NULL, 5, 9),
(81, 'qua ok', '2017-03-05 16:51:55', NULL, 5, 9),
(82, 'qua ok', '2017-03-05 16:51:56', NULL, 5, 9),
(83, 'qua ok', '2017-03-05 16:51:56', NULL, 5, 9),
(84, 'sdas', '2017-03-05 16:53:38', NULL, 5, 9),
(85, 'asd', '2017-03-05 16:53:46', NULL, 5, 9),
(86, 'ad', '2017-03-05 16:53:49', NULL, 3, 9),
(87, 'asd', '2017-03-05 16:53:54', 86, 3, 9),
(88, 'asdsad', '2017-03-07 03:02:34', NULL, 3, 1),
(89, 'hdj', '2017-03-07 07:40:27', 78, 4, 1),
(90, 'dasdas', '2017-03-14 03:28:18', NULL, 3, 1),
(91, '123321', '2017-03-14 03:28:25', NULL, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `definitions`
--

CREATE TABLE `definitions` (
  `id` int(11) NOT NULL,
  `word_id` int(11) NOT NULL,
  `define` text COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `contribute` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `author` text COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `definitions`
--

INSERT INTO `definitions` (`id`, `word_id`, `define`, `user_id`, `contribute`, `category_id`, `author`, `active`) VALUES
(1, 2, 'con chim nhỏ ak', 1, 25, 2, '', 0),
(2, 2, 'hojc vien mang', 1, 1, 2, '::1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `likedefinitions`
--

CREATE TABLE `likedefinitions` (
  `definition_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `islike` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `likedefinitions`
--

INSERT INTO `likedefinitions` (`definition_id`, `user_id`, `islike`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `likemeans`
--

CREATE TABLE `likemeans` (
  `mean_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `islike` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `likemeans`
--

INSERT INTO `likemeans` (`mean_id`, `user_id`, `islike`) VALUES
(3, 1, -1),
(3, 2, 1),
(3, 3, -1),
(4, 1, -1),
(5, 1, -1);

-- --------------------------------------------------------

--
-- Table structure for table `means`
--

CREATE TABLE `means` (
  `id` int(11) NOT NULL,
  `word_id` int(11) NOT NULL,
  `mean` text COLLATE utf8_unicode_ci NOT NULL,
  `contribute` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `author` text COLLATE utf8_unicode_ci,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `means`
--

INSERT INTO `means` (`id`, `word_id`, `mean`, `contribute`, `user_id`, `category_id`, `author`, `active`) VALUES
(3, 2, 'con chim non á', 25, 1, 2, '', 0),
(4, 2, 'cacsacascascsaccsacsa', 30, 1, 2, '', 0),
(5, 2, 'qweqweqwe', 23, 1, 2, '', 0),
(6, 2, '123123123', 12, 1, 3, '', 0),
(14, 3, 'test1', 1, 1, 2, '::1', 0),
(15, 3, 'test2', 1, 1, 2, '::1', 0),
(16, 3, 'test3', 1, 1, 2, '::1', 0),
(21, 1, 'object', 1, 1, 3, '::1', 0);

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
(1, 'abc@123.a', 'dtg', '$2y$10$yFKtodjN5XaQy.e1h4hkJOJxeIh0VxNrmZeWnEVXMXwn.pE62zY8K', 1, '2017-02-21 00:00:00', '2017-02-28 07:21:19', 1, 0),
(2, 'dtg', 'DTG', 'abc', 1, '2017-03-04 02:41:56', '2017-03-04 02:41:00', 1, 0),
(3, 'sadasd', 'asdasd', 'sadads', 0, '2017-03-04 03:20:59', '2017-03-04 03:20:00', 1, 0),
(4, 'dtg@123.abc', 'DTG', '$2y$10$yFKtodjN5XaQy.e1h4hkJOJxeIh0VxNrmZeWnEVXMXwn.pE62zY8K', 1, '2017-03-04 09:10:24', '2017-03-04 09:10:00', 1, 0),
(5, 'wqe', 'qwe', '$2y$10$iHj.csHWXSRgEHlNhD6oBOFISoU0dWP8SrGyskfujO8SacJfX.w8a', 0, '2017-03-05 16:33:09', '2017-03-05 16:33:00', 1, 0),
(6, 'sdf', 'sdas', '$2y$10$WKQjHA15o.qjjgEaS0xQCuMfVO8L73rS0dIwkajQ4exV2Q4w0IEPO', 0, '2017-03-05 16:40:49', '2017-03-05 16:39:00', 1, 0),
(7, 'sdf23', 'sdas', '$2y$10$/H49G2VwCX64oYZWI/uV2.Gw5FRf4hHbJDv8xr8bOYVaM6Z73SNsm', 0, '2017-03-05 16:41:41', '2017-03-05 16:39:00', 1, 0),
(8, 'adasdasd', 'asdasdsada', '$2y$10$d0mURoUCXLVBBZXx3r34ROKATpRh1/PfIM885tcYwoBs/GXaDWJ8K', 0, '2017-03-05 16:50:43', '0000-00-00 00:00:00', 1, 0),
(9, 'dtg123', 'DTG22', '$2y$10$tcuX6sCT6aEav/oOsdAsG.gAc57Q8Ik71PEPHC1lXdMbp330rMRaW', 0, '2017-03-05 16:51:02', '0000-00-00 00:00:00', 1, 0),
(10, '1234@123.com', 'DTG', '$2y$10$TPKQ1aihbrouJG7jwgLuR.FEm8QUcgMcXABgu3wsJBzXHQDyCEYlm', 0, '2017-03-10 09:33:46', '0000-00-00 00:00:00', 1, 0);

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
(3, 'abc'),
(4, 'test');

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
  ADD KEY `user_id` (`user_id`),
  ADD KEY `commentmean_id` (`commentmean_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `commentdefinitions`
--
ALTER TABLE `commentdefinitions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `commentmeans`
--
ALTER TABLE `commentmeans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;
--
-- AUTO_INCREMENT for table `definitions`
--
ALTER TABLE `definitions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `means`
--
ALTER TABLE `means`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `words`
--
ALTER TABLE `words`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
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
  ADD CONSTRAINT `commentmeans_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `commentmeans_ibfk_3` FOREIGN KEY (`commentmean_id`) REFERENCES `commentmeans` (`id`);

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
