-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2021 at 02:09 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `notes`
--

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `sno` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `description` varchar(50) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`sno`, `title`, `description`, `date`) VALUES
(1, 'Something Went Wrong PHP', 'I can not understand it well please help', '2021-07-15 14:22:49'),
(2, 'Fix PHP myadmin error', 'replace config file under c drive PHPMyAdmin', '2021-07-15 14:25:15'),
(3, 'easy way to alert ', 'windows.alert and your message within braces', '2021-07-15 14:27:42'),
(4, 'to resolve an issue with eclip', 'Set path', '2021-07-15 14:29:24'),
(5, 'java is installed but not dete', 'javac.exe executable file not added to path', '2021-07-15 14:30:21'),
(6, 'SQL syntax errors resolve', 'use quotation marks', '2021-07-15 14:32:42'),
(7, 'Jquery cdn', 'add the jquery in the head part of the html', '2021-07-15 14:34:12'),
(8, 'If there is programming Error', 'check syntax errors and logic errors and runtime e', '2021-07-15 14:41:46'),
(9, 'Programming for beginners', 'Let us C book ', '2021-07-15 16:51:53'),
(10, 'PHP', 'Backend Technology', '2021-07-17 16:43:38'),
(11, 'How do you write notes in comp', 'Takes your notes by hand. ', '2021-08-28 17:34:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
