-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2016 at 06:49 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ahg`
--
CREATE DATABASE IF NOT EXISTS `ahg` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ahg`;

-- --------------------------------------------------------

--
-- Table structure for table `phplogin`
--

CREATE TABLE `phplogin` (
  `id` int(11) NOT NULL,
  `user` varchar(65) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `phplogin`
--

INSERT INTO `phplogin` (`id`, `user`, `pass`) VALUES
(1000, 'keivan', 'keivan'),
(1100, 'om', 'om');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `phplogin`
--
ALTER TABLE `phplogin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `phplogin`
--
ALTER TABLE `phplogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1101;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
