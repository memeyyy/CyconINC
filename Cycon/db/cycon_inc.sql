-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2018 at 05:16 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cycon_inc`
--

-- --------------------------------------------------------

--
-- Table structure for table `project_monitoring`
--

CREATE TABLE `project_monitoring` (
  `proj_ID` int(11) NOT NULL,
  `proj_Title` varchar(150) NOT NULL,
  `proj_Owner` varchar(50) NOT NULL,
  `proj_Location` varchar(150) NOT NULL,
  `proj_Costing` int(11) NOT NULL COMMENT 'Amount of contract',
  `proj_DateStarted` date NOT NULL,
  `proj_DateEnded` date NOT NULL,
  `proj_Scope` varchar(50) DEFAULT NULL COMMENT 'Scope of Work',
  `proj_Head` varchar(50) NOT NULL,
  `proj_Status` varchar(50) NOT NULL DEFAULT 'Ongoing'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_monitoring`
--

INSERT INTO `project_monitoring` (`proj_ID`, `proj_Title`, `proj_Owner`, `proj_Location`, `proj_Costing`, `proj_DateStarted`, `proj_DateEnded`, `proj_Scope`, `proj_Head`, `proj_Status`) VALUES
(1, 'Supply and Installation of Electrical Work for 1MVA Substation', 'Majestic Landscape Corporation', 'General Trias, Cavite', 9100000, '2016-05-23', '0000-00-00', 'Installation', '', 'Ongoing');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `project_monitoring`
--
ALTER TABLE `project_monitoring`
  ADD PRIMARY KEY (`proj_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `project_monitoring`
--
ALTER TABLE `project_monitoring`
  MODIFY `proj_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
