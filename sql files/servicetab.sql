-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2023 at 09:47 AM
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
-- Table structure for table `servicetab`
--

CREATE TABLE `servicetab` (
  `UNIT_ID` int(30) NOT NULL,
  `S_PS` varchar(50) NOT NULL,
  `S_SRTYPE` varchar(50) NOT NULL,
  `S_SRNUMBER` varchar(50) NOT NULL,
  `S_SRDATE` varchar(50) NOT NULL,
  `S_PA` varchar(50) NOT NULL,
  `S_BN` varchar(50) NOT NULL,
  `S_UN` varchar(50) NOT NULL,
  `S_CN` varchar(50) NOT NULL,
  `S_PL` varchar(50) NOT NULL,
  `S_S` varchar(50) NOT NULL,
  `S_QUO` varchar(50) NOT NULL,
  `S_QD` varchar(50) NOT NULL,
  `S_PO` varchar(50) NOT NULL,
  `S_POD` varchar(50) NOT NULL,
  `S_DR` varchar(50) NOT NULL,
  `S_JO` varchar(50) NOT NULL,
  `S_JOD` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `servicetab`
--
ALTER TABLE `servicetab`
  ADD PRIMARY KEY (`UNIT_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `servicetab`
--
ALTER TABLE `servicetab`
  MODIFY `UNIT_ID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
