-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2023 at 09:46 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stelsendb`
--

-- --------------------------------------------------------

--
-- Table structure for table `deleted_subjects`
--

CREATE TABLE `deleted_subjects` (
  `USER_ID` int(30) NOT NULL,
  `PM_PS` varchar(50) NOT NULL,
  `PM_SRTYPE` varchar(50) NOT NULL,
  `PM_SRNUMBER` varchar(50) NOT NULL,
  `PM_SRDATE` varchar(50) NOT NULL,
  `PM_PA` varchar(50) NOT NULL,
  `PM_BN` varchar(50) NOT NULL,
  `PM_UN` varchar(50) NOT NULL,
  `PM_CN` varchar(50) NOT NULL,
  `PM_PL` varchar(50) NOT NULL,
  `PM_MOP` varchar(50) NOT NULL,
  `CONTRACT` varchar(50) NOT NULL,
  `REMARKS` varchar(50) NOT NULL,
  `PM_PM` varchar(50) NOT NULL,
  `PM_QUO` varchar(60) NOT NULL,
  `PM_QD` varchar(60) NOT NULL,
  `PM_PO` varchar(60) NOT NULL,
  `PM_POD` varchar(60) NOT NULL,
  `PM_DR` varchar(60) NOT NULL,
  `PM_JO` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `deleted_subjects`
--
ALTER TABLE `deleted_subjects`
  ADD PRIMARY KEY (`USER_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `deleted_subjects`
--
ALTER TABLE `deleted_subjects`
  MODIFY `USER_ID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
