-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2018 at 01:54 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zundae`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `accID` int(10) NOT NULL,
  `accLevel` int(1) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `Fname` varchar(50) NOT NULL,
  `Mname` varchar(3) NOT NULL,
  `Lname` varchar(50) NOT NULL,
  `FatherName` varchar(100) NOT NULL,
  `MotherName` varchar(100) NOT NULL,
  `gender` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(150) NOT NULL,
  `Nationality` varchar(50) NOT NULL,
  `DOB` date NOT NULL,
  `religion` varchar(100) NOT NULL,
  `WifeHusName` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`accID`, `accLevel`, `username`, `password`, `Fname`, `Mname`, `Lname`, `FatherName`, `MotherName`, `gender`, `email`, `address`, `Nationality`, `DOB`, `religion`, `WifeHusName`, `status`) VALUES
(1, 1, 'admin', 'admin', 'Rhalp darren', 'R', 'Cabrera', 'Dalmacio A cabrera', 'Rowena Cabrera', 'Male', 'rhalpdarrencabrera@gmail.com', 'blk 38 lot 11 phase 2b southville 2', 'Filipino', '1997-09-26', '', 'null', 'single'),
(2, 2, 'staff', 'staff', 'Rhalp darren', 'R', 'Cabrera', 'Dalmacio A cabrera', 'Rowena Cabrera', 'Male', 'rhalpdarrencabrera@gmail.com', 'blk 38 lot 11 phase 2b southville 2', 'Filipino', '1997-09-26', '', 'null', 'single'),
(3, 3, 'executive', 'executive', 'Rhalp darren', 'R', 'Cabrera', 'Dalmacio A cabrera', 'Rowena Cabrera', 'Male', 'rhalpdarrencabrera@gmail.com', 'blk 38 lot 11 phase 2b southville 2', 'Filipino', '1997-09-26', '', 'null', 'single'),
(4, 2, 'sample1', 'sample1', 'sample1', 'S', 'sample1', 'sample1', 'sample1', 'sample1', 'sample1@gmail.com', 'blk 38 lot 11 phase 2b southville 2', 'Filipino', '2017-05-19', '', 'null', 'single'),
(5, 2, 'sample2', 'sample1', 'sample1', 'S', 'sample1', 'sample1', 'sample1', 'sample1', 'sample1@gmail.com', 'blk 38 lot 11 phase 2b southville 2', 'Filipino', '2017-05-19', '', 'null', 'single'),
(6, 2, 'sample3', 'sample1', 'sample1', 'S', 'sample1', 'sample1', 'sample1', 'sample1', 'sample1@gmail.com', 'blk 38 lot 11 phase 2b southville 2', 'Filipino', '2017-05-19', '', 'null', 'single'),
(7, 2, 'sample4', 'sample1', 'sample1', 'S', 'sample1', 'sample1', 'sample1', 'sample1', 'sample1@gmail.com', 'blk 38 lot 11 phase 2b southville 2', 'Filipino', '2017-05-19', '', 'null', 'single'),
(8, 2, 'sample5', 'sample1', 'sample1', 'S', 'sample1', 'sample1', 'sample1', 'sample1', 'sample1@gmail.com', 'blk 38 lot 11 phase 2b southville 2', 'Filipino', '2017-05-19', '', 'null', 'single'),
(9, 2, 'sample6', 'sample1', 'sample1', 'S', 'sample1', 'sample1', 'sample1', 'sample1', 'sample1@gmail.com', 'blk 38 lot 11 phase 2b southville 2', 'Filipino', '2017-05-19', '', 'null', 'single'),
(12, 2, 'sample9', 'sample1', 'sample1', 'S', 'sample1', 'sample1', 'sample1', 'sample1', 'sample1@gmail.com', 'blk 38 lot 11 phase 2b southville 2', 'Filipino', '2017-05-19', '', 'null', 'single'),
(13, 2, 'sample10', 'sample1', 'sample1', 'S', 'sample1', 'sample1', 'sample1', 'sample1', 'sample1@gmail.com', 'blk 38 lot 11 phase 2b southville 2', 'Filipino', '2017-05-19', '', 'null', 'single');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `proj_ID` int(11) NOT NULL,
  `proj_Title` varchar(150) NOT NULL,
  `proj_Owner` varchar(50) NOT NULL,
  `proj_Location` varchar(150) NOT NULL,
  `proj_DateStarted` date NOT NULL,
  `proj_EstimatedDate` date NOT NULL,
  `proj_Costing` varchar(100) NOT NULL COMMENT 'Amount of contract',
  `proj_Head` varchar(50) NOT NULL,
  `proj_Status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`proj_ID`, `proj_Title`, `proj_Owner`, `proj_Location`, `proj_DateStarted`, `proj_EstimatedDate`, `proj_Costing`, `proj_Head`, `proj_Status`) VALUES
(1, 'asdasd', 'zundae fariñas', 'asdasd', '2017-05-02', '2017-05-24', '1231313', 'zundae fariñas', 'Complete'),
(2, 'asdasd', 'zundae fariñas', 'asdasd', '2017-05-02', '2017-05-24', '1231313', 'zundae fariñas', 'Complete'),
(3, 'asdasd', '', 'asdasd', '2017-05-02', '2017-05-24', '1231313', 'zundae fariñas', 'Ongoing'),
(4, 'asdasd', '', 'asdasd', '2017-05-02', '2017-05-24', '1231313', 'zundae fariñas', 'Ongoing'),
(5, 'asdasd', '', 'asdasd', '2017-05-02', '2017-05-24', '1231313', 'zundae fariñas', 'Ongoing'),
(6, 'asdasd', '', 'asdasd', '2017-05-02', '2017-05-24', '1231313', '', 'Ongoing'),
(7, 'asdasd', '', 'asdasd', '2017-05-02', '2017-05-24', '1231313', '', 'Complete'),
(8, 'asdasd', '', 'asdasd', '2017-05-02', '2017-05-24', '1231313', '', 'Complete'),
(9, 'asdasd', '', 'asdasd', '2017-05-02', '2017-05-24', '1231313', '', 'Complete'),
(10, 'asdasd', '', 'asdasd', '2017-05-02', '2017-05-24', '1231313', '', 'Ongoing'),
(11, 'asdasd', '', 'asdasd', '2017-05-02', '2017-05-24', '1231313', '', 'Complete'),
(12, 'asdasd', '', 'asdasd', '2017-05-02', '2017-05-24', '1231313', '', 'Ongoing'),
(13, 'asdasd', '', 'asdasd', '2017-05-02', '2017-05-24', '1231313', '', 'Complete'),
(14, 'asdasd', '', 'asdasd', '2017-05-02', '2017-05-24', '1231313', '', 'Complete'),
(15, 'asdasd', '', 'asdasd', '2017-05-02', '2017-05-24', '1231313', '', 'Ongoing');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`accID`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`proj_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `accID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
