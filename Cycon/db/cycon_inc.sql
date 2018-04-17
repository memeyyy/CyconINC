-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2018 at 11:25 PM
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
-- Database: `cycon_inc`
--

-- --------------------------------------------------------

--
-- Table structure for table `boq_detail`
--

CREATE TABLE `boq_detail` (
  `boqdet_ID` int(11) UNSIGNED NOT NULL,
  `boqdet_Descr` varchar(250) DEFAULT NULL,
  `boqdet_Amount` double DEFAULT NULL,
  `proj_ID` int(11) UNSIGNED DEFAULT NULL,
  `boqdet_Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `boq_detail`
--

INSERT INTO `boq_detail` (`boqdet_ID`, `boqdet_Descr`, `boqdet_Amount`, `proj_ID`, `boqdet_Date`) VALUES
(10, 'hutht1', 500, 21, '2018-03-20 22:52:44'),
(11, 'jhfvhgfgh', 600, 21, '2018-03-12 19:57:16'),
(15, 'Installation of Substation', 30000, 23, '2018-03-13 03:08:41'),
(16, 'Materials', 800000, 23, '2018-03-13 03:09:54'),
(17, 'Others', 120000, 23, '2018-03-13 03:14:36'),
(18, 'Replacement of Transformer', 30000, 24, '2018-03-13 04:36:45'),
(19, 'Supply and Installation of Incoming Primary Line of First Private Pole and H-Frame', 1534116.38, 24, '2018-03-13 04:37:50'),
(20, 'Others', 120000, 24, '2018-03-13 04:41:34'),
(21, 'Repair of Substation', 30000, 25, '2018-03-13 05:52:54'),
(22, 'Supply', 100000, 25, '2018-03-13 05:53:40'),
(23, 'Replacement', 30000, 26, '2018-03-13 06:25:57'),
(24, 'sdsdf', 423, 28, '2018-03-15 00:23:23'),
(25, 'sdssss', 1111, 28, '2018-03-15 00:23:32'),
(26, '1', 123123123, 31, '2018-03-27 18:57:20'),
(27, 'eq', 32, 22, '2018-04-03 14:08:24');

-- --------------------------------------------------------

--
-- Table structure for table `boq_material_list`
--

CREATE TABLE `boq_material_list` (
  `boq_ID` int(11) UNSIGNED NOT NULL,
  `proj_ID` int(11) UNSIGNED DEFAULT NULL,
  `material_Name` varchar(100) DEFAULT NULL,
  `unit_ID` int(11) UNSIGNED DEFAULT NULL,
  `material_Qty` int(11) DEFAULT NULL,
  `material_Price` float DEFAULT NULL,
  `boqdet_ID` int(11) UNSIGNED DEFAULT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `boq_material_list`
--

INSERT INTO `boq_material_list` (`boq_ID`, `proj_ID`, `material_Name`, `unit_ID`, `material_Qty`, `material_Price`, `boqdet_ID`, `date_added`) VALUES
(1, 23, 'Bolts', 2, 100, 40000, 16, '2018-03-15 00:51:10'),
(2, 23, 'Substation KVA 1000', 4, 1, 700000, 16, '2018-03-15 00:51:10'),
(3, 23, 'Wires', 1, 2, 60000, 16, '2018-03-15 00:51:10'),
(4, 23, 'Equipment', 3, 1, 40000, 17, '2018-03-15 00:51:10'),
(5, 23, 'Testing and Commissioning', 3, 1, 40000, 17, '2018-03-15 00:51:10'),
(6, 23, 'Mobilization and Demobilization', 3, 1, 40000, 17, '2018-03-15 00:51:10'),
(7, 24, 'Power Fuse', 1, 1, 320000, 19, '2018-03-15 00:51:10'),
(8, 24, 'Power Fuse Refill', 2, 3, 49500, 19, '2018-03-15 00:51:10'),
(9, 24, 'Miscellaneous', 3, 1, 1164620, 19, '2018-03-15 00:51:10'),
(10, 24, 'Equipment', 3, 1, 40000, 20, '2018-03-15 00:51:10'),
(11, 24, 'Testing', 3, 1, 40000, 20, '2018-03-15 00:51:10'),
(12, 24, 'Mobilization and Demobilization', 3, 1, 40000, 20, '2018-03-15 00:51:10'),
(13, 25, 'Power Fuse', 1, 1, 10000, 22, '2018-03-15 00:51:10'),
(14, 25, 'Pole Bond', 2, 1, 80000, 22, '2018-03-15 00:51:10'),
(15, 25, 'Miscellaneous', 3, 1, 10000, 22, '2018-03-15 00:51:10'),
(16, 31, 'zz', 3, 1, 15.5, 26, '2018-04-03 14:04:40');

-- --------------------------------------------------------

--
-- Table structure for table `cycon_info`
--

CREATE TABLE `cycon_info` (
  `cinfo_ID` int(10) UNSIGNED NOT NULL,
  `cinfo_History` text,
  `cinfo_Mission` text,
  `cinfo_Vission` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cycon_info`
--

INSERT INTO `cycon_info` (`cinfo_ID`, `cinfo_History`, `cinfo_Mission`, `cinfo_Vission`) VALUES
(1, '<div>asdasd</div>', 'We, CYCON Inc. commit the quality of our output that will satisfy the present and anticipated needs of consumers through highly motivated and competent contractor by contributing to the well-being of our clients.', 'CYCON Inc. aims to become reliable and stable supplier of electrical contractor and quality of service.');

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE `equipment` (
  `equip_ID` int(11) UNSIGNED NOT NULL,
  `equip_Name` varchar(50) DEFAULT NULL,
  `equip_Quantity` int(11) DEFAULT NULL,
  `unit_ID` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`equip_ID`, `equip_Name`, `equip_Quantity`, `unit_ID`) VALUES
(13, 'Linemen Safety Belts', 20, 1),
(14, '3tons Lever Block', 25, 2),
(15, '1.5 tons Lever Block', 10, 2),
(16, '3/4 tons Lever Block', 1, 2),
(17, '5 tons Chain Block', 1, 2),
(18, '3 tons Chain Block', 1, 2),
(19, 'Linemen Tools (pliers, wrenches, hammers)', 1, 3),
(20, 'Extendable Ladder 21 ft. Fiberglass', 2, 2),
(21, 'Aluminum Ladder 10 ft.', 2, 2),
(22, 'Cable Reel Stand', 4, 2),
(23, 'Turn Table Reel Stand', 1, 2),
(24, 'Hydraulic Crimping Tool (14mm^2-60mm^2)', 1, 1),
(25, 'Hydraulic Compression Crimping Tool (good up to 40', 1, 1),
(26, 'Hexagonal Compression Crimping Tool (180^o-500^o)', 1, 1),
(27, 'Hexagonal Compression Crimping Tool (725^o-850^o)', 1, 1),
(28, 'Assorted Digging Tools', 1, 3),
(29, 'Cable Rollers-Assorted Types', 200, 2),
(30, 'Bolt Cutter', 4, 2),
(31, 'Walking Measure Device', 2, 1),
(32, 'Welding Machine 300A', 11, 1),
(33, 'Automatic Cutting Machine', 1, 1),
(34, 'Rotary Hammer', 3, 1),
(35, 'Electric Hand Drill', 4, 4),
(36, 'Automatic Press Drill 3 phase', 1, 4),
(37, 'Hydraulic Cable Cutter', 3, 4),
(38, 'Portable Jack Hammer', 3, 4),
(39, 'Pipe Cutter', 1, 2),
(40, 'Pipe Vise', 2, 2),
(41, 'Pipe Threader 1/2\" to 2\"', 3, 4),
(42, 'Pipe Threading Machine 1/2\" to 2\"', 3, 4),
(43, 'Pipe Wrench', 1, 3),
(44, 'Pipe Bender 1/2\" to 3/4\"', 3, 2),
(45, 'Pipe Bender 1 1/4\"', 1, 1),
(46, 'Air Compressor 1Hp', 1, 1),
(47, 'Angle Grinder 7 1/4\"', 2, 4),
(48, 'Angle Grinder 4\"', 2, 4),
(49, 'Hilti (fastening) Gun', 1, 1),
(50, 'Knock-out Puncher 15mm-50mm', 1, 1),
(51, 'Jig Saw', 1, 4),
(52, 'Generator w/ Welding Machine', 1, 1),
(53, 'Portable Office 20 ft Container Van', 2, 2),
(54, 'Emergency Flood Light (denyo)', 1, 2),
(55, 'Denyo DCA75 SPH 75kva', 1, 4),
(56, 'Electric Generator 15kva', 1, 4),
(57, 'High Voltage Tester 69kv', 1, 4),
(58, 'Metal Puncher', 2, 4),
(59, 'Motorize Metal Puncher', 2, 4),
(60, 'Hydraulic Angle Cutter', 2, 4),
(61, 'ZZ', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `equipment_added`
--

CREATE TABLE `equipment_added` (
  `eadd_ID` int(11) UNSIGNED NOT NULL,
  `equip_ID` int(11) UNSIGNED DEFAULT NULL,
  `eadd_Quantity` int(11) DEFAULT NULL,
  `eadd_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `equipment_added`
--

INSERT INTO `equipment_added` (`eadd_ID`, `equip_ID`, `eadd_Quantity`, `eadd_Date`) VALUES
(1, 14, 5, '2018-03-25 02:43:16'),
(2, 61, 1, '2018-03-26 17:42:04');

-- --------------------------------------------------------

--
-- Table structure for table `equipment_return`
--

CREATE TABLE `equipment_return` (
  `return_ID` int(11) UNSIGNED NOT NULL,
  `usage_ID` int(11) UNSIGNED DEFAULT NULL,
  `return_Quantity` int(11) DEFAULT NULL,
  `return_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `equipment_return`
--

INSERT INTO `equipment_return` (`return_ID`, `usage_ID`, `return_Quantity`, `return_Date`) VALUES
(1, 2, 1, '2018-04-01 17:33:55'),
(2, 1, 3, '2018-04-01 17:34:02'),
(3, 1, 2, '2018-04-01 17:34:08'),
(4, 3, 4, '2018-04-01 17:39:58'),
(5, 4, 3, '2018-04-01 17:40:05'),
(6, 4, 2, '2018-04-01 17:40:11'),
(7, 3, 1, '2018-04-01 17:40:18'),
(8, 6, 3, '2018-04-02 03:34:03'),
(9, 6, 2, '2018-04-02 03:34:12');

-- --------------------------------------------------------

--
-- Table structure for table `equipment_usage`
--

CREATE TABLE `equipment_usage` (
  `usage_ID` int(11) UNSIGNED NOT NULL,
  `equip_ID` int(11) UNSIGNED DEFAULT NULL,
  `proj_ID` int(11) UNSIGNED DEFAULT NULL,
  `usage_Quantity` int(11) DEFAULT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `equipment_usage`
--

INSERT INTO `equipment_usage` (`usage_ID`, `equip_ID`, `proj_ID`, `usage_Quantity`, `date_added`) VALUES
(1, 15, 31, 5, '2018-04-01 17:33:29'),
(2, 18, 31, 1, '2018-04-01 17:33:48'),
(3, 15, 31, 5, '2018-04-01 17:39:42'),
(4, 15, 31, 5, '2018-04-01 17:39:47'),
(5, 16, 27, 1, '2018-04-02 03:32:42'),
(6, 15, 31, 5, '2018-04-02 03:33:52');

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE `gender` (
  `gender_ID` int(11) UNSIGNED NOT NULL,
  `gender_Name` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`gender_ID`, `gender_Name`) VALUES
(1, 'Male'),
(2, 'Gender');

-- --------------------------------------------------------

--
-- Table structure for table `payment_term`
--

CREATE TABLE `payment_term` (
  `term_ID` int(11) UNSIGNED NOT NULL,
  `term_Name` varchar(25) DEFAULT NULL,
  `term_percent` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_term`
--

INSERT INTO `payment_term` (`term_ID`, `term_Name`, `term_percent`) VALUES
(1, 'Downpayment', 30),
(2, 'Progressbilling', 60),
(3, 'Retension', 10);

-- --------------------------------------------------------

--
-- Table structure for table `project_milestone`
--

CREATE TABLE `project_milestone` (
  `proj_ID` int(11) UNSIGNED DEFAULT NULL,
  `mstone_ID` int(11) UNSIGNED NOT NULL,
  `mstone_Title` varchar(100) DEFAULT NULL,
  `mstone_Percent` int(11) DEFAULT NULL,
  `mstone_DateStarted` date DEFAULT NULL,
  `mstone_DateEnded` date DEFAULT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_milestone`
--

INSERT INTO `project_milestone` (`proj_ID`, `mstone_ID`, `mstone_Title`, `mstone_Percent`, `mstone_DateStarted`, `mstone_DateEnded`, `date_added`) VALUES
(21, 1, 'sadasd', 10, '2018-03-06', '2018-03-09', '2018-04-10 19:14:04'),
(23, 2, 'Surveying of Area', 5, '2018-03-14', '2018-03-14', '2018-04-10 19:14:04'),
(23, 3, 'Laying of 65m Concrete Pole', 30, '2018-03-15', '2018-04-20', '2018-04-10 19:14:04'),
(23, 4, 'Installation', 65, '2018-04-21', '2018-12-07', '2018-04-10 19:14:04'),
(24, 6, 'Surveying of Area', 10, '2018-03-13', '2018-03-13', '2018-04-10 19:14:04'),
(25, 8, 'Surveying of Area', 10, '2018-03-13', '2018-03-13', '2018-04-10 19:14:04'),
(26, 9, 'Surveying of Area', 20, '2018-03-13', '2018-03-13', '2018-04-10 19:14:04'),
(27, 10, 'Surveying of Area', 5, '2018-03-01', '2018-03-01', '2018-04-10 19:14:04'),
(26, 11, 'sdfsdf', 10, '2018-03-22', '2018-03-23', '2018-04-10 19:14:04'),
(31, 15, 'Mobilization and Demobilization', 5, '2018-04-13', '2018-04-19', '2018-04-10 19:14:04'),
(32, 16, 'Excavation and Concreting for Flatform', 21, '2018-04-09', '2018-04-12', '2018-04-10 19:15:37'),
(32, 17, 'Mobilization and Demobilization', 2, '2018-04-13', '0000-00-00', '2018-04-10 19:15:45'),
(32, 18, 'Excavation and Concrete Breaking for Pole Erection', 50, '2018-04-01', '0000-00-00', '2018-04-10 19:16:23');

-- --------------------------------------------------------

--
-- Table structure for table `project_monitoring`
--

CREATE TABLE `project_monitoring` (
  `proj_ID` int(11) UNSIGNED NOT NULL,
  `proj_Title` varchar(150) DEFAULT NULL,
  `proj_Owner` varchar(50) DEFAULT NULL,
  `proj_Location` varchar(150) DEFAULT NULL,
  `proj_Costing` float DEFAULT NULL COMMENT 'Amount of contract',
  `proj_DateStarted` date DEFAULT NULL,
  `proj_DateEnded` date DEFAULT NULL,
  `proj_Scope` varchar(50) DEFAULT NULL COMMENT 'Scope of Work',
  `proj_Head` varchar(50) DEFAULT NULL,
  `status_ID` int(11) UNSIGNED DEFAULT NULL,
  `proj_Expenses` float UNSIGNED DEFAULT NULL,
  `visibility` tinyint(4) DEFAULT '1',
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_monitoring`
--

INSERT INTO `project_monitoring` (`proj_ID`, `proj_Title`, `proj_Owner`, `proj_Location`, `proj_Costing`, `proj_DateStarted`, `proj_DateEnded`, `proj_Scope`, `proj_Head`, `status_ID`, `proj_Expenses`, `visibility`, `date_added`) VALUES
(21, 'Wiring of Concrete Pole Station 7', 'HTI', 'Batangas City', 1100, '2018-03-05', '2018-03-16', 'Wiring', 'Toto Valde III', 3, 0, 1, '2018-03-19 13:55:19'),
(22, 'Substation KVA 2500', 'HRD', 'PEZA', 32, '2018-03-02', '2018-03-08', 'Installation of Substation', 'Cyril Salamanque', 3, 100000, 1, '2018-04-03 14:08:25'),
(23, 'Installation of Substation KVA Load 1000Watts', 'Majestic', 'City of General Trias, Cavite', 950000, '2018-03-13', '2018-12-13', 'Substation', 'Ricardo Rondola', 4, 500000, 1, '2018-03-19 13:55:19'),
(24, 'Tiling First Private Pole and H-Frame', 'HTI', 'City of General Trias, Cavite', 1684120, '2018-03-13', '2019-03-13', 'Tiling and Poling', 'Engr. Toto Valde III', 3, NULL, 1, '2018-04-03 17:24:01'),
(25, 'Repair of Substation Station 2', 'Scad', 'General Trias, Cavite', 130000, '2018-03-13', '2018-04-13', 'Repair', 'Engr. Rainier', 3, NULL, 1, '2018-04-01 16:55:58'),
(26, 'Concrete Pole Line Installation', 'HTI', 'General Trias, Cavite', 30000, '2018-03-13', '2018-04-13', 'Installation', 'Ricardo Rondola', 3, NULL, 1, '2018-03-19 13:55:19'),
(27, 'Propose Innovation Factory Building', 'Tokyo Reparts', 'Pampanga Economic Zone', 0, '2017-11-20', '2018-03-13', 'Renovation of Electrical', 'Engr Rainier', 3, NULL, 1, '2018-03-15 00:48:34'),
(28, '123', '123123', '123123', 1534, '2018-03-03', '2018-03-22', '12312312', '3123123', 3, NULL, NULL, '2018-03-19 13:55:19'),
(29, 'visible', 'visible', 'visible', 0, '2018-03-10', '2018-03-16', 'visible', 'visible', 3, NULL, NULL, '2018-03-19 13:54:05'),
(30, 'z', 'z', 'z', 0, '2018-03-16', '2018-03-09', 'asd', 'z', 3, NULL, NULL, '2018-03-19 13:54:05'),
(31, 'asdddddddddd', 'asdasd', '123asd', 123123000, '2018-03-17', '2018-03-23', 'asdasdas', 'asdasdasd', 3, NULL, 1, '2018-03-19 14:35:24'),
(32, 'z', 'z', 'z', 0, '2018-04-19', '2018-04-11', 'z', 'z', 3, NULL, 1, '2018-04-10 19:05:18');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order`
--

CREATE TABLE `purchase_order` (
  `po_ID` int(10) UNSIGNED NOT NULL,
  `po_ORNum` varchar(25) NOT NULL,
  `proj_ID` int(11) UNSIGNED DEFAULT NULL COMMENT 'project id',
  `po_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'date issue of P.O',
  `status_ID` int(11) UNSIGNED DEFAULT NULL,
  `po_lock` tinyint(3) UNSIGNED DEFAULT NULL,
  `visibility` tinyint(4) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_order`
--

INSERT INTO `purchase_order` (`po_ID`, `po_ORNum`, `proj_ID`, `po_Date`, `status_ID`, `po_lock`, `visibility`) VALUES
(19, '', 21, '2018-03-12 19:57:24', 3, 1, NULL),
(20, '', 22, '2018-04-03 17:24:40', 3, 1, NULL),
(21, '', 23, '2018-03-13 03:17:11', 3, 1, NULL),
(22, '', 24, '2018-03-13 04:43:19', 3, 1, NULL),
(23, '', 25, '2018-03-19 16:13:37', 4, 1, NULL),
(24, '', 26, '2018-03-13 06:26:17', 3, 1, NULL),
(25, '', 27, '2018-03-14 06:42:39', 3, NULL, NULL),
(26, '', 28, '2018-03-19 13:51:19', 4, 1, 1),
(27, '', 29, '2018-03-19 13:52:23', 3, NULL, 1),
(28, '', 30, '2018-03-19 13:53:57', 3, NULL, 1),
(29, '', 31, '2018-03-19 14:35:12', 3, NULL, 1),
(30, '', 32, '2018-04-10 18:57:20', 3, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_transaction`
--

CREATE TABLE `purchase_transaction` (
  `pt_ID` int(11) NOT NULL,
  `po_ID` int(11) UNSIGNED DEFAULT NULL,
  `pt_amount` float DEFAULT NULL,
  `pt_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `term_ID` int(11) UNSIGNED DEFAULT NULL,
  `status_ID` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_transaction`
--

INSERT INTO `purchase_transaction` (`pt_ID`, `po_ID`, `pt_amount`, `pt_date`, `term_ID`, `status_ID`) VALUES
(1, 19, 330, '2018-03-12 19:58:15', 1, 2),
(3, 19, 10, '2018-03-12 20:04:27', 2, 2),
(4, 19, 5.1, '2018-04-03 17:22:53', 2, 2),
(5, 21, 285000, '2018-03-13 03:17:32', 1, 2),
(6, 21, 500000, '2018-03-13 03:19:10', 2, 2),
(7, 21, 450000, '2018-03-13 03:19:30', 2, 2),
(8, 21, 95000, '2018-03-13 03:20:29', 2, 2),
(9, 21, 95000, '2018-03-13 03:20:46', 2, 2),
(10, 21, 95000, '2018-03-13 03:23:26', 2, 2),
(11, 21, 570000, '2018-03-13 03:25:37', 2, 2),
(12, 19, 645, '2018-03-13 04:00:47', 2, 2),
(13, 19, 110, '2018-03-13 04:00:59', 3, 2),
(14, 22, 505235, '2018-03-13 04:45:25', 1, 2),
(15, 22, 1010470, '2018-03-13 04:47:15', 2, 2),
(16, 22, 1, '2018-03-13 04:47:40', 2, 2),
(17, 23, 39000, '2018-03-13 05:57:58', 1, 2),
(18, 23, 8000, '2018-03-13 05:58:51', 2, 2),
(19, 23, 70000, '2018-03-13 05:59:03', 2, 2),
(20, 23, 13000, '2018-03-13 05:59:30', 3, 2),
(21, 24, 9000, '2018-03-13 06:27:18', 1, 2),
(22, 24, 8000, '2018-03-13 06:27:40', 2, 2),
(23, 24, 10000, '2018-03-13 06:27:52', 2, 2),
(24, 24, 3000, '2018-03-13 06:28:11', 3, 2),
(25, 26, 460, '2018-03-15 00:23:43', 1, 2),
(26, 26, 920, '2018-03-15 00:23:59', 2, 2),
(27, 26, 153, '2018-03-15 00:24:11', 3, 2),
(28, 20, 9.6, '2018-04-03 17:24:40', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `status_ID` int(11) UNSIGNED NOT NULL,
  `status_Name` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_ID`, `status_Name`) VALUES
(1, 'Pending'),
(2, 'Receive'),
(3, 'Ongoing'),
(4, 'Complete');

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `unit_ID` int(11) UNSIGNED NOT NULL,
  `unit_Name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`unit_ID`, `unit_Name`) VALUES
(3, 'lot'),
(2, 'pc'),
(1, 'set'),
(4, 'unit');

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `user_ID` int(11) NOT NULL,
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(80) DEFAULT NULL,
  `level_ID` int(11) DEFAULT NULL,
  `user_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`user_ID`, `username`, `password`, `level_ID`, `user_created`) VALUES
(1, 'president', 'president', 1, '2018-03-07 16:12:21'),
(2, 'secretary', 'secretary', 2, '2018-03-22 16:00:00'),
(3, 'engineer', 'engineer', 3, '2018-03-07 16:12:39'),
(4, 'inventory', 'inventory', 5, '2018-03-07 16:12:45'),
(5, 'accounting', 'accounting', 4, '2018-03-07 16:12:32'),
(11, 'admin', 'admin', 6, '2018-04-10 16:00:00'),
(14, 'admin1', 'admin1', 6, '2018-04-10 21:24:16');

-- --------------------------------------------------------

--
-- Table structure for table `user_detail`
--

CREATE TABLE `user_detail` (
  `detail_ID` int(11) NOT NULL,
  `user_ID` int(11) DEFAULT NULL,
  `detail_img` longblob,
  `detail_Fname` varchar(50) DEFAULT NULL,
  `detail_Mname` varchar(3) DEFAULT NULL,
  `detail_Lname` varchar(50) DEFAULT NULL,
  `gender_ID` int(11) UNSIGNED DEFAULT NULL,
  `detail_email` varchar(50) DEFAULT NULL,
  `detail_address` varchar(150) DEFAULT NULL,
  `detail_dob` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_detail`
--

INSERT INTO `user_detail` (`detail_ID`, `user_ID`, `detail_img`, `detail_Fname`, `detail_Mname`, `detail_Lname`, `gender_ID`, `detail_email`, `detail_address`, `detail_dob`) VALUES
(1, 1, '', 'president', 'T', 'Fariñas', 1, 'Zundae@gmail.com', 'tanzaa', '1996-10-06'),
(2, 2, '', 'secretary', 'T', 'Fariñas', 1, 'Zundae@gmail.com', 'tanzaa', '1996-10-06'),
(3, 5, '', 'accounting', 'T', 'Fariñas', 1, 'Zundae@gmail.com', 'tanzaa', '1996-10-06'),
(4, 3, '', 'engineer', 'T', 'Fariñas', 1, 'Zundae@gmail.com', 'tanzaa', '1996-10-06'),
(5, 4, '', 'inventory', 'T', 'Fariñas', 1, 'Zundae@gmail.com', 'tanzaa', '1996-10-06');
INSERT INTO `user_detail` (`detail_ID`, `user_ID`, `detail_img`, `detail_Fname`, `detail_Mname`, `detail_Lname`, `gender_ID`, `detail_email`, `detail_address`, `detail_dob`) VALUES
(9, 14, 0x89504e470d0a1a0a0000000d49484452000004b000000610080600000065a2b30800000006624b474400ff00ff00ffa0bda7930000200049444154789cecdd79b46f695ddff9770d14355a4855412150cc44400504010515300ced80a2493b267627b18d6370756c3b31c38ab6a6bb35c69876688dad112311a78851c4a80cb682a02088c83c16545105c5500555b7865bfdc7bed55505f79ee1de73cef3fcce7ebdd6faae3b2cc08feb59bfb39ffbf9edfdecd30280c3efeceae2ea82eafceac26373feb1b9a0badbb15f2fb8c3df7dea1dfe37ee5a9d7b873f9f73ec7ff736e755679de0fffe2dd547ab6babebabebaa8f54575757546fadde50fd45f5a193fb7f11d80777ab1e5a3db87a60f5a0ea3e2d3f1bce6ff9dc9fd79d7f56dcd1f5d50d77f8f31d3fdf47aa8fb7fc5cb8b6e5e7c2b5c7fe33d77ec27cb8fa60cbcf8cab8ffd770160554e1b1d00004ed245d53daa4baa7b1e9b4b8efddda5c77e7f4975af96326a131c6d29b15e54fd42f5c6b17160754eaf3eaffaaaeaa9d5671cfbbbd97cb4bab2a5ccfa40f5feeaaa6e2fb8de7b6c2e4fd905c021a1c00260467769b9cbe17ed5fd8fcd1d7f7fef63ff99c3ee0faaefadfe74741038e4ceabbea97a4ecbcf9ac3e2d696a2eb3dd5bb5b0aad771efbf3e5c7feeeca51e10060371458008c72f7ead38fcdfd8fcd03aacb5a0aaa3346059bccadd58f55df933b29603f7c4df5a32d7771aed1919622ebadd59babb71cfbf5adc7fefe9671d100e0760a2c00f6d3692d77333cb47a78f5b063bf7f44cbe37decdc4bab2f6e393307387577ad7eb6fafad1412676a47a7bf5a66e2fb8deda52725d3e3017002ba4c00260af5c567d764b39f58896a2ead35b1ecd616ffc76f5652d77650127efdc96cfd39307e7d8641fadfeaa7a5df597c7e6752d07ce03c09e536001b05ba7b5bc8deb31d5a3eff0ebc52343adc8b7573f3e3a046cb8e756df303ac421f59e6e2fb36e2bb6de58dd343214009b4f8105c056ce68b993eab692eab38ffd7ae1c8502b776dcbdd6eee728093f38dd5cf8f0eb13237b69458afab5e756c5e53dd303214009b458105c01d5d503dbefafc9657c93fa13a7f68228ee7bbab1f1e1d0236d0792de7387ddae8207453cbdd59af3c36afaafe3a87c60370020a2c8075bb77f5c4ea492d85d5a3f2f6bf4df0d6ea21a343c006faceeadf8d0ec1095d57fd794b99755bb1f5aea189009886020b603d4e6b395cfdb6bbab9e54dd7f64204ec983abb78d0e011be695d5e78c0ec1ae5c55bdbce54dac2fad5e9bbbb4005649810570b8ddab7a7af5b4ea8baa4bc7c6610f7d73f5d3a343c00679604adfc3e023d51f552f6b29b45e5ddd3c34110007e2ccd10100d853e7565fd852583dadfa8cb171d8470f1f1d0036cc634707604f5c587de9b1a9e5c5167fdced85d6abf2c6438043498105b0d94e6f792be0d3abbfd9729ed55d8726e2a038030b76e731a303b02f2ea89e796caa3ed6f2c8e1cbaadf6f796cd4238700878047080136cfb9d533aa2fafbeb8ba646c1c06f9cbeab34687800df26bd5578e0ec181bba6fa6fd5ef56bf5d5d3d360e00274b8105b019ee517d594b69f537ab73c6c66102efac1e303a046c90ffd6f2f393f53adaf296c3dfad5e98bbb300368a020b605e0fadbea27a56f5b92d8f0bc26dae6e2936819df106423ed11defcefaddeacab17100d88a020b602e8fab9edd525c7dfae02ccc4d8105bbf3baea334787605ab7567fd15264bda0a5f03c3a34110077a2c00218efe1d5d7565fd7f29a77d88937560f1b1d0236c81f579f373a041be37dd56f56bf51bd246f3604184e810530c665d557b794568f1a9c85cdf4ff569f3f3a046c9097565f303a041be9432d07c0ff9796b3b33e3e360ec03a9d393a00c08a5c54fded96d2ea8939d38a5373c5e800b0617c6638599f5a7dc3b1f958f55bd5f35bcaac1b06e60258150516c0fe3aa7e54cabafad9e51dd656c1c0e91578c0e001be65da30370289c577dcdb1f968cb6386cfaf7eafba71602e000038298faafeafeac32d07c31ab3d7f3d880ddf8fb8dffdc9ac33bd754ff77cb63aa8e6901d8077eb802ec9d0b5aeeb4faa6940becaf0f559754b78c0e021be411d5eb47876015de51fd62f59faa370dce02706828b0004edd13aa7fd07228fbf983b3b00e3f5c7df7e810b0614e6b79b3dca5a383b02aaf6829b27ea9e52e2d0000385077afbea37a5de31f5b30eb9a5baafb079c8c1f6afc67d8ac73ae6fb92beb29b98900e0a4f8e109b03b8fac9ed372b7d53983b3b04ebf507de3e810b0a11e5cbd212fd460acb7553f5bfdc796bb020100604f9c5e7d59f5078dff06d7ac7bde5f5d1c702a7ea4f19f65636ead6eae7ea3e52dc56e2c0000e0a49d577d6bcb01aca337b9c61cadbe2ae0549d5dbdaaf19f6963ee386faebeabba5b0000b043f7adfef796c356476f688db96dfe71c05eb947f5cac67fae8df9c4f958f533d5a302008013785cf5bceac6c66f608db96d8e56ff3260af9d57fddb9617238cfe9c1b73bcf9a3ea2b5b8e32000080bea87a49e337aac67ce27ca8fa8a80fdf4b09603b5af6dfc67de98e3cd5baa6f6b295d0156cb6181c09afd77d53fab3e6f7410f80447abff5c7d6ff5ceb1516035ce69394cfb49d5e7568fcedb6699cb35d54f553f9eb717022ba4c002d6e6b4eacb5b8aabc70cce029fe8aaea37ab1fab5e3f380bacdd5daa47540fac1e74ecd707b69c9378dfeafc71d158b91babe7b69cd7f9d6c159000e8c020b588bd35bdee0f6bdd5230767615d8eb4dc45f5f6eabdd547aa1b5a1e57baf60ebf7f6ff58a96bbaf80f95d58dda7a5ccbaa4baf8d8dcb3bae80e7fbee4d89f61afdd52fd72f5aff3a507b0020a2ce0b03bb3fa9aea9fb69c73027be9a696bba6aea8de7fecf7efa9ded15258bda3a598524ac1ba9ddd5274dd56785d76ecf7f7a9ee573d20e71b71f26e6db97bf707ab570dce02b06f1458c061755af5b7abffad7ac8e02c6cb6cb5b0ed07debb179f3b15fafac3e30301770b8dca7e57af5d0eac1c77efd1b2de5d6590373b1595e54fdf31459c021a4c0020ea32757ff67f5398373b0596ea85e5bfd45f59aeacfab37541f1f190a58bd335bcaac47569f75875fef3d321453bbb5faad9622eb7583b300ec19051670983cb2e540d3678e0ec2d4ae6fb98beab67943cb06ff8dd5cd037301ecc645d5a35aae7d9fd3f2e6c4fb0d4dc46c8e56bf5afdcb966b1cc04653600187c165d5f757dfd072583bdce69dd59fb5dc4df5eaea4dd5bb5bbe9d06386c2ead1e5f3de1d83c366f4b6439ecfd17ab7fd1720d04d8480a2c60935d54fd93eadbabbb0ecec2781faffee8d8bcaaa5b4fae0d04400639dd1f2b8e193aba7565f507dcac8400c757df5632d77ab7f787016805d5360019be8ecea39d5f754771b9c85716e6929aafea0fafdeae5d591a18900e67646f598ea292da5d6937287d61a7da0e5b1c29fcea3f30000fbe64b5ade0877ab59e5bca5fa89ea2baa0b03e0549cd57267d60f577fddf89ff1e660e74dd5b30300604f3da87a41e3377be660e783d5af54df54dd3f00f6d383aaefa85ed4f2b8d9e86b803998f9c3eae10100704acea9fe55cbf946a3377866ffe748f592ea9fb6bc55eb8c0018e1bceaabaae755d736fefa60f6776eac7e288f9402009c9467b7bc456ef4a6ceecef5c53fd7cf5ac6c9c0166744ef595d52f551f6dfc75c3ecdfbcb7fada0000d89187542f6cfc26ceecdf5c51fd64f5f4ea2e01b029ce69f982e9977277f4619e17570f0b0080e33aa7fa8196c7c8466fdcccdecf3baa1fa93ebf3a3d0036dd85d5ff54fd49e3af3166efe748f52f5a0efb0700e09827566f6cfc66cdecedbcabfac196d7b60370783db4fabe969ffba3af3d666fe775d5e3020058b9f3aa1fad6e69fc06cdeccddc503dbfe5f140775a01accbe9d5d3aa5fab6e6efc35c9eccddc5cfddb967d1b00c0ea3cb97a5be33765666fe60dd57755f70800ea3ed5f7b79c7b38fa1a65f666de5e3d35008095b8a0e500efa38ddf8899539b6bab9fab3e370038beb3aaafa95ed6f8eb9639f5395afd9beaec00000eb167e47c8cc330af6a39b8f7820060e71e553db7baa9f1d732736af397d567050070c85c58fd3f8ddf6c99939f23d57faa9e10009c9afbb59c81795de3af6fe6e4e786eabb73e6250070483cb17a67e33759e6e4e67d2dafd1be3400d85b77affe59f5fec65fefccc9cf8babcb0200d8506754ff328f096ceafc71cb992577f9c48505803d7676f51dd57b1b7ffd33273757b5bc81180060a35c96c35a37718eb43ceaf9d99fbca400b0efcea99e535dd9f86ba2d9fddc527d5fcb97980000d3fbaaea9ac66fa2cccee7e6ea3f560f38ce7a02c0413bb7e56ca5ab1a7f8d34bb9f3fccd10300c0c4cead7ea6f19b26b3f3395a3dbf7ad871d61300463bbffa27d5871a7fcd34bb9b2baaa77cf29202008cf5e8eaaf1bbf59323b9fff9a470501d80c17573f9e7335376d6eaabefd38eb090030c4b7b6bc4679f426c9ec6c5edcf2664800d8340fab7ebdf1d752b3bbf9a9bc14060018e8eceae71abf29323b9bbfac9e76dc950480cdf2e4ead58dbfb69a9dcf8b5beea403003850f7ad5ed9f8cd90d97e3e547d6775e67157120036d3e9d5dfafae6efcb5d6ec6cde563de2788b0900b01fbeb07a7fe3374166ebb9a5fad9ea92e32f23001c0a17553fdd72dd1b7ded35dbcf47aba71f77250100f6d03fca01aa9b30afac1e7f82350480c3e873abd734fe1a6cb69f23d5d71f7f1901004ecd39d52f347ec363b69eab5b1ea738fdf8cb080087da992d5fb67da4f1d764b3f51cadfee7e32f2300c0c9b95ff5e78ddfe89813cf2dd5bfafee768235048035b96ff5bb8dbf3e9bede787abd38ebf8c00003bf779391c75f67955f5d8132d2000acd469d53fc8dd589b30bf589d75fc650400d8de57561f6ffca6c61c7f3e547d5b1e170480adb81b6b33e645d5f9275843008013fa47799bcfac73b47a6e75e909570f00b82377636dc6fc498e43000076e8f4ea471abf8131c79fbfae9e7ac2d50300b6f280eae58dbf9e9b13cfabab8b4fb4800000556757cf6ffcc6c57cf2dc527d7fce870080537566f503b9d37ce67943f569275a400060ddee5ebdacf11b16f3c97375f5f4132f1d0070129e5abdb7f1d77973fc796b75ff132d1e00b04e0fa8ded8f88d8af9e4797975d989970e00380597542f68fcf5de1c7fde5dfd8d13ae1e00b02a8faaae68fc06c57cf2fcfb3c320800fbedb4ea1f573735feda6f3e79aeac1e76c2d5030056e131d5071bbf3131779e6babafde62dd0080bdf7d4eaaac6ef03cc27cf15d5a79f78e90080c3ec09d5871bbf2131779ebfca060d0046b9acfab3c6ef07cc27cf7bab879e78e90080c3e849d5471abf1131779e5fa9cedf62dd0080fd7776f5b38ddf17984f9ecbab879c78e90080c3e429d5758ddf8098dbe7e6ea7f6d3983030098c3b75437367e9f60ee3cefa91eb4c5ba010087c0d3aa8f357ee3616e9f6baa676eb56800c0304fcf910b33cebbab076eb16e00c006fbe2eafac66f38ccedf3da7c830800b3fb8cea5d8ddf37983bcf5baa7b6eb16e00c006faf2ea48e3371ae6f6f9e59c7705009be2d2ea558ddf3f983bcfebaa0bb758370060833c33e5d54c73b4fa9e9c7705009be6bcea371abf9730779e3fa9cedd62dd00800df0f89c7935d3dc58fd9d2d570c0098d919d58f377e4f61ee3c2facceda62dd0080897d660e1d9d693e567de9962b06006c8a1f6cfcdec2dc799ed7523002001be4c1d5e58ddf489865aea99eb8e58a01009be67f69391a60f43ec3dc3e3fb1e58a010053b9b4e5ad2ca337106699f7b5dc0d07001c3edf5cdddcf8fd86b97d9eb3e58a010053b8b0e56d2ca3370e6699b754f7df6ac100808df7b57961ce4c7373f5ac2d570c0018eadcea8f1bbf6930cbbcaebae7962b06001c16cf4e8935d37cace5654600c064ceaafe6be3370b6699b754f7d872c50080c3e66fe571c299e6aa967361018089fc44e3370966997755f7d97ab9008043eaab5362cd346f6e3962030098c0b7367e736096b922dff401c0dafd9d945833cd0bab33b65c310060df3db5baa9f11b03531fc8db060180c5ff581d6dfcfec42cf3435b2f1700b09f1edc529a8cde1098fa700e0a0500eeec5b1abf4731b7cf376cbd5c00c07eb8b0faabc66f04ccf2969b276fb95a00c05afdebc6ef55cced7bb6c76ebd5c00c05e3aa3faedc66f02cc72bec5b3b65e2e0060c54eab7eaef17b16b3cc7baa7b6eb96200c09ef9e1c65ffccd32dfb2cd5a01009c51fd66e3f72d6699dfcfa1ee00b0efbeb1f1177db3cc3fdf66ad00006e736ef58ac6ef5fcc32ff6aebe502004ec56757d737fe826fea27b6592b00804f7449f596c6ef63cc720cc4d3b65e2e00e0645c58bdadf1177bb33c02e0b67300e0643cbce5edc5a3f733a6de5f7ddad6cb0500ecc669d5af35fe226fea652d8f0000009cac2f69b90368f4bec62c7b3b5f4cc286f06185f97d57f59cd121e8ddd517551f191d0400d8686f693916c2236ce3ddefd8af2f191902000e83cfa98e34fedba9b5cf91ea71dbac1500c06efc42e3f738a66eaa1ebfcd5a01005b38af7a53e32feaa6fee1366b0500b05b67e5cd84b3cc5baaf3b75e2e00e044fe43e32fe666f9761400603fdcbbbabaf1fb1db3ecbd01805d7a76e32fe2a65e9743db0180fdf5ccea68e3f73da69eb5cd5a01007770afea838dbf80af7d3e5c3d749bb50200d80b3fd8f8bd8fa9f757176fb35600c0312f68fcc5dbd4dfda6ea10000f6c819d5cb1abfff31f58bdbac150050fdddc65fb44dfdfc36eb0400b0d7ee5d5dd5f87d90a92fde66ad0060d53eadbaa6f117ecb5cfbbaa0bb7592b0080fde03cac39e6ddd505dbac1570c0ce181d00f8fffd52f5c8d12156eed6eaabaa378e0e0200acd25bab4baac78d0eb272171e9bdf191d040066f3d58dffa6c9d4bfdb6ea10000f6d979d59b1bbf2f5afb1cad9eb8cd5a01c0aa5c58bdaff117e9b5cf1bab73b6592b008083f084eae6c6ef8fd63eafc9534b300d1f4618ef47aaa78e0eb17237575fd672fe1500c06897b77cb1f6a4d14156eed2eacaeacf46070180d19e50ddd2f86f97d63e3fb8dd4201001cb0b3aad7367e9fb4f6b9a6e55c320058ad335a6e4b1e7d515efbbca93a7b9bb5020018e191d58d8ddf2fad7d7e66bb850280c3ec5b1a7f315efb1cadbe60bb85020018e8ff68fc9e69ed734bf5d8ed160a000ea38baa0f34fe62bcf6f9c9ed160a0060b0f3aa77347edfb4f679f1760b050087d14f34fe22bcf6b9bce50d900000b3fb92c6ef9d4c7de9760b050087c967e6b5c833cc976fb750000013f995c6ef9fd63eaf6f39c7160056e1b71b7ff15dfbfceab6ab040030977b571f69fc3e6aedf3f7b65b2800380c9ed2f88beedae763d565db2d1400c084beb3f17ba9b5cf7baa73b75b2800d864a755af6cfc4577edf37ddb2d1400c0a4ee52bdb1f1fba9b5cf776db75000b0c9fefbc65f6cd73e97e71b330060b33dabf17baab5cf15d539db2d14b0b71c400707e3cc9673972e1a1d64e5beadfaf3d12100004ec19baa2fa81e303ac88a9d5f5d5dfde9e82000b0d7fe6ee3bf295afbbcbce5314e00804df7e8ea96c6efafd63cefcd5d5870a0dc8105fbefcceaf9d5dd470759b15b5b1ee1bc7c741000803d706575ff96228b312e685987578e0e02007be57f68fc37446b9f5fda6e91000036ccbdaaeb1abfcf5af3bcabe5cb6ae000b8030bf6d799d5af549f3a3ac88a1d6db9fbea83a3830000eca1ebaa0bab278e0eb26217b6bc15f2f5a38300c0a9fabac67f33b4f671f7150070585d525ddbf8fdd69ae7d5dbae12b027dc8105fbe7b4ea17aa4b470759b1a3d5d757578d0e0200b00f3e5e7d4af5a4d14156ec5ed54bab770ece010027ed198dff4668edf3abdbae1200c066bba8fa68e3f75d6b9effb2ed2a01c0c4feb0f117d335cfd1ea91dbae1200c0e6fb81c6efbdd63cb7540fde7695805372fae80070483dba7acae8102bf782eab5a34300001c807fd3721716639c5e7dd3e81070d829b0607f3c677400fafed10100000ec835d54f8e0eb1727faf3a6b740800d88d8babeb1b7f2bf39ae7c5dbae1200c0e172afea48e3f7616b9eafdd76958093e60e2cd87bffb03a7b748895fbd1d10100000ed815d57f1e1d62e5be79740038cc4e1b1d000e9933abb757f71d1d64c5de583da2e510770080357974f5ead12156ecd6eae12dfb51608fb9030bf6d697a6bc1aed47525e0100ebf49aea45a343acd869d5378c0e01003bf15b8d7ff67ecd737575ceb6ab040070783da3f17bb235cfdbf3a413ec0b7760c1deb957f5ccd12156eec75b0ed0070058abdfabde303ac48a3da07ae2e810701829b060ef7c63cb19588c71634b810500b066b7664f349ac708611fb8b511f6ce9baa878e0eb162cfabbe6e7408008009dcad7a6f75eee8202b754dcbd319378e0e0287893bb0606f3c2ee5d5683f353a0000c0243e5c3d7f748815bb7bf5d4d121e0b05160c1de70e7cf587f55bd6c7408008089fc87d10156ee2b470780c3468105a7ee8ceaab47875839775f0100dcd91f57af1f1d62c5bebce5df09c01e5160c1a97b6a75e9e8102b765df5dcd121000026e42eac71ee513d697408384c145870eadc7d35d6f3aa8f8c0e010030a1e75647468758b1678f0e008789020b4ecd19d5b3468758b99f1f1d00006052d754bf333ac48a7dd9e800709828b0e0d43cb1ba647488157b6ff58ad121000026f6cba303acd803ab878c0e018785020b4e8dbbafc6fab5eae8e810000013fbad96334319e399a303c061a1c08253f315a303acdcaf8f0e000030b98f572f181d62c59e313a001c160a2c38799f513d68748815bbb2faa3d121000036c0f3460758b1a754771d1d020e0305169c3cdfa68cf5eb797c100060277eafe540770edeb92de7e602a748810527efe9a303ac9cc707010076e6c6ea37468758b12f1c1d000e0305169c9c73aacf1f1d62c53e52bd74740800800df25ba303acd8178c0e008781020b4ece17b694588cf17bd5cda34300006c90dfabae1f1d62a59e9073b0e09429b0e0e43c6d7480957be1e80000001be6faea0f478758a9b3abc78d0e019b4e810527c76dc0e3dc5abd68740800800df4dba303ac987f3fc0295260c1ee9d5f3d6a7488157b4df5bed12100003690026b9cc78f0e009b4e8105bbf7b9d599a343ac98bbaf00004ecebbabd78e0eb1529f333a006c3a0516ec9eb70f8ef53ba30300006c306f231ce3d2eab2d121609329b060f79e383ac08a5d5bfde9e81000001becc5a303ac9883dce11428b060774eaf1e3b3ac48afd5175d3e81000001bece5d591d121564a8105a7408105bbf390ea5346875831df1802009c9aeb7347fb285e0405a7408105bbf398d10156ee0f4607000038045e323ac04a3d727400d8640a2cd81d8f0f8e734dde9a0300b017dcd53ec63d5a0e73074e82020b76c71d58e3bcb43a3a3a0400c021f08aea86d12156ea334707804da5c082dd71c119e7a5a30300001c1237b494581c3c8f11c2495260c1ceddabfad4d12156ec95a30300001c22bf3f3ac04a3d627400d8540a2cd8b9878f0eb06237e7fc2b0080bdf4bba303acd4834607804da5c0829d53608df3faeae3a34300001c22afa9ae1a1d6285145870921458b0730aac71fe7c7400008043e6681e231ce1d3aaf34687804da4c0829d7bf0e8002bf667a30300001c422f1c1d60a51e383a006c220516ec9c0bcd380a2c0080bdf792d10156ca638470121458b0336756978d0eb15237577f393a0400c02174f9b1e16079b2034e82020b76e6be2d251607efcdd591d12100000ea93f191d6085dc8105274181053be3f1c171dc7d0500b07f1458074f8105274181053be3f1c171de303a0000c021f68ad10156c8238470121458b033f71c1d60c5dc810500b07ffe7a748015ba6f7597d12160d328b060672e1d1d60c5fe6a7400008043eca3d595a343accc99d5bd4787804da3c0829d718119e386ea6da34300001c726f191d6085ee313a006c1a0516ec8c0bcc186fab6e191d0200e0907bf3e8002b74afd10160d328b060679c8135c63b470700005881b78e0eb042be20875d5260c1cedc6d7480957ae7e80000002bf0fed10156c81d58b04b0a2cd81905d618ef181d000060053e303ac00ab9030b76498105db3bbbbaebe8102bf5f6d101000056c01d5807cf5bce61971458b03d775f8df3ced101000056e083a303ac90337661971458b03d05d638ef1a1d00006005ae1a1d60851458b04b0a2cd8de5d460758a91bab6b4687000058816bab23a343ac8c470861971458b0bd73470758a9ab4707000058916b470758990baa734687804da2c082edb9036b8c2b4707000058918f8f0eb042178f0e009b448105dbf306c231bc0d0700e0e07c6c748015fa94d101609328b0607b678f0eb0520a2c00808373e3e8002b74c1e800b0491458c0ac3e303a0000c08a3803ebe0b9030b76418105cceac3a3030000acc80da303ac90020b76418105ccca41a2000007e7c8e8002be41142d8050516302b051600c0c1f9e8e8002be40e2cd805051630abeb4607000058915b470758210516ec82020b98956f0101000e8e33b00e9e470861171458c0ac3c42080070709c8175f0dc8105bba0c00266f5b1d1010000601fb9030b76418105ccca195800001c66178e0e009b448105cceadad101000056c4238407cfbfc761177c60805929b000000e8e43dc0f9e470861171458c0ac3c4208000040a5c002e6746375d3e8100000b08f9c8105bba0c0026674fde80000002be30c2c606a0a2c0000009c8175f09c8105bba0c00200008083e7dfe3b00b3e3000000070f0ce1b1d003689020b0000000ede99a303c0265160010000c0c13b677400d8240a2c0000003878678d0e009b448105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000635c303a006c0a05160000008ce1dfe4b0433e2c000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000dc323a00c05614580000005c373a00c056145800000030c659a303c0a65060010000c018e78c0e009b428105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d4146d47f85e000020004944415458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000639c3d3a006c0a05160000008c71d7d101605328b0607b678d0e000000006ba6c082ed9d333a00000000ac99020b00000080a929b000000000989a020b00000080a929b000000000989a020b00000080a929b000000000989a020b00000080a929b000000000989a020b00000080a929b000000000989a020bb677c1e800000000b0660a2cd89ecf090000000ce41fe6000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105db3b7b74000000d867378c0e00b01505166cefaea3030000c03e3b323a00c0561458b03d9f1300000018c83fcc617b178c0e000000006ba6c002000000606a0a2cd8deb9a303000000c09a29b0607b77191d000000f6d9c7470700d88a020bb677e6e8000000b0cf6e1a1d60a5bcf11c76488105db3b6f74000000e0503a7b7400d8140a2c00000000a6a6c082ed5d303a00000000ac99020bb6e711c28377dde80000002bf391d10156ca2384b0430a2cd8def9a303acd02da3030000accc8da303ac9443dc61871458b03d7760010070d85d3f3a00c0561458b03d67601dbc1b4607000058998f8d0e00b01505166cef53460758a123a3030000ac8c4708c738677400d8140a2cd89e4708010038ecae1d1d60a5ce1a1d003685020bb676d7ea2ea343ac90b7e000001c2c77c003535360c1d6dc7d35866f0001000e963348c738737400d8140a2cd8daf9a303ac94020b00e0e05d373ac00af9c21c764881055b7380fb181f1d1d000060851ce47ef01458b0430a2cd8dadd47075829776001001c3c77601dbcbb8e0e009b4281055bbb7874809572071600c0c1bb7e748015726409ec90020bb676c9e8002be50e2c008083f7a1d10156c82384b0430a2cd8da3d46075829776001001c3c05d6c1f30821ec90020bb676d1e8002bf5c1d101000056c81eece0798410764881055bf308e118ef1f1d00006085dc8175f0ce1d1d003685020bb6a6c01a4381050070f0145807ef6ea303c0a65060c1d63c4238c695a3030000ac9002ebe0dd737400d8140a2cd89a0bcac1bbbeba6e740800801552601d3c5f98c30e29b0606b178f0eb042ef1b1d000060a5145807efa2eab4d121601328b0e0c43e35afb51de1ead101000056eac3a303acd019b90b0b764481052776bfd10156ea8ad101000056ea83a303ac94020b7640810527a6c01ac3238400006328b0c6b8747400d8040a2c38b1cb460758a9778e0e00fc7fecdd79b465675de7ff77658284404848988500019942838c8ab638402322280da8e03cd04eedd0d88e3f6d8756fc69776baba0bf56bb6d01a5b1414545c18180cc9332cf330448024980cc49e5f7c72e0845d5bde75652759f73eff37aadf5594514581fd653679fbdbf67ef670330a973aa2b469798d019a30bc04e6080051b3b7d748149bd7b7401008049edcd760e231860c1161860c1c6dc8135c67b4617000098d8874617989001166c8101166cecf4d105266580050030ce07471798d09d4617809dc0000b366613f7ed777e5edf0c00309201d6f6bbfde802b0131860c1c19d509d36bac484de3bba0000c0e43c42b8fd4ecc6384b09201161c9cbbafc678d7e8020000937307d618f7195d00d69d01161cdce9a30b4cea9da30b00004cce006b8cfb8d2e00ebce000b0eeeeea30b4ceacda30b00004ceeecd105266580052b1860c1c119608df186d105000026f7a16aefe81213ba5775cce812b0ce0cb0e0e0ee36bac084aeaade36ba0400c0e42eafde37bac4844ea8ee39ba04ac33032c38d0d1d55d479798d0bbaa4b46970000a0b78e2e30a9078d2e00ebcc000b0e74fbeaf8d12526f4a6d1050000a8dc153fca978f2e00ebcc000b0e64ffab310cb00000d68301d6185f5c1d3bba04ac2b032c389001d6186f1c5d000080aade32bac0a46e58dd7774095857065870201bb88ff12fa30b000050b9036ba4078d2e00ebca000b0e74e6e80213bab07afbe812000054f591ea82d12526f5a0d105605d1960c1feae5fdd69748909bdb2ba7a740900003ec39b08c7b85faed3e1a07c30607ff7ac8e195d6242af1a5d000080fdb83b7e8c93aabb8c2e01ebc8000bf677ffd10526f5cad1050000d88f17ec8cf380d105601d1960c1fe7c598cf18ad1050000d88f1f18c7f9c2d105601d1960c1feee37bac0843ed0b251280000ebe335d555a34b4cca8fea70100658708d9b56b71f5d6242eebe0200583f9faade3cbac4a4eed2b21716f0590cb0e01aff7a748149bd78740100000eca6384631c553d70740958370658708d2f1d5d60522f185d0000808372a7fc380f1e5d00d68d01165cc3006bfb9d57bd61740900000eca1d58e31860c1e730c082c54daabb8f2e31a11754578f2e0100c041bdb1ba78748949ddadbae5e812b04e0cb060f1a5d59ed12526e4f1410080f57555f5ead12526f695a30bc03a31c082c5bf195d6052678d2e0000c0a65e36bac0c41e32ba00ac13032c583c747481099d5dbd657409000036f5fcd10526f615794a043ec3000b96e7cb6f33bac4843c3e0800b0fe5e525d34bac4a46e5e7dc1e812b02e0cb0c0dd57a33c777401000056ba2cdb3e8cf475a30bc0ba30c082faead105267445065800003b85c708c731c0827d0cb098dd29d5978c2e31a11757178c2e0100c09618608d73d7eaf3479780756080c5ec1e511d33bac484fe7a74010000b6ecadd5fb47979898bbb020032cf06530c67346170000e0903c6f748189b966810cb098db89d583479798d05bab778c2e0100c02131c01ae7bed5ad479780d10cb098d95757c78f2e31218f0f0200ec3ccfaf2e1e5d62527baa6f185d024633c062668f1b5d6052cf1a5d00008043f6c9bc457aa46f1e5d004633c06256a7560f1d5d6242efad5e3eba040000d7ca1f8f2e30b17b54f71c5d024632c062568fad8e1b5d6242cfa8ae1e5d0200806be5b9d527469798d8b78c2e0023196031ab6f1a5d60527eb50300d8b92eab9e3dbac4c41e571d33ba048c6280c58cee543d60748909bd615f0000d8b9fe64748189ddac7ac8e812308a011633face963779b0bd9e31ba000000d7d93f56e78c2e31b16f1b5d004631c06236c755df3ebac484aece000b006037b8b2fad3d12526f6c8ea16a34bc0080658cce651d569a34b4ce865d5bb47970000e0b078eae802133baefaaed1256004032c66f3dda30b4ceaf747170000e0b07945f5aad12526f6efb2993b1332c0622677adbe6c7489095d58fd9fd125000038ac7e7b748189ddaafabad12560bb196031931fcee6ed233cbdba78740900000eabff539d37bac4c4be6f7401008e8c535b862857cbb6e71e5b581f0000769effdcf873cd9973d7d54b04bb873bb098c5f754c78f2e31a19757af1f5d02008023e27fb4bc9590317e647401000eafe3aab31bff0bc98cf98e2dac0f00003bd7b31a7fce396b2eab6eb97a89607770071633f8f6ea16a34b4ce8826cde0e00b0dbfdd6e802133baefa0fa34b0070781c53bdbbf1bf8ecc985fdbc2fa0000b0f3fd73e3cf3d67cd27ab53562f11ec7ceec062b7fbe6ea76a34b4ce8cafc1a0700308b9f1b5d606227563f30ba0400d7cd31d5db1bffabc88c79ea16d6070080dd614ff59ac69f83ce9a73ab1bac5c25d8e1dc81c56ef6f5d51d479798d47f1b5d0000806d7375f5f3a34b4cecd4ea09a34b0070ed1c5bbdb3f1bf86cc98176c617d0000d85ddc8535361fad6eb872956007730716bbd513aa3b8c2e31a95f195d0000806d7775f6c21ae9a6d50f8d2e0147d29ed105e00838b1e5eeab9b8d2e32a13757776f39810100602e7baa5756f7195d64521756b7af3e3eba081c09eec06237fa0f195e8df24b195e0100ccca5d58639d54fdc4e81270a4b8038bdde6a62d775f79fe7bfbbda5e5eeabbda38b000030d48baa2f195d625297b4bcc8ea43a38bc0e1e60e2c769b5fcaf06a949fcbf00a0080e58908e785631c5ffdece812006cee3ed5558d7f03c88c797d06e200005ce3f71a7f8e3a6bae687932028035b4a77a59e3bf2c66cda3572f1100001339ad6553f1d1e7a9b3e61f572f1100237c6be3bf2466cd3f673f3d00000ef4c4c69fabce9cc7ac5e2200b6d349d5871bff05316b1eb97a89000098d0b12d2ffa197dbe3a6bde579db072956087b0670dbbc1af56371f5d62522fa99e33ba0400006be98a96bbb018e336d54f8c2e01c0e2412d6f3819fdebc68cd95bdd77e50a010030bbbf6afcb9ebacb9a4baddea2502e048ba7ef5f6c67f29cc9aa7ae5e220000e80ed5a71a7ffe3a6bfe7af512c1fa3b7a7401b80e7e31fb2f8d7271f575d5274617010060ed9d5f5d543d74749149ddb17a67f586d1450066749f9667ea47ff9a316b7e7ef5120100c0671c55bdb8f1e7b1b3e6dceab495ab04c061757cf5e6c67f09cc9a0f563758b94a0000b0bf3bb7ecc934fa7c76d6fcf1ea2582f5e5114276a2ff567df5e81213fbc1ea55a34b0000b0e39cd7f214c583471799d499d5abab778c2e02308387e4ad8323f3a26acfca55020080833bba658832fabc76d67ca0bae1ca5502e03a39a5e5f1b5d107fd597369759795ab0400009b3bb3baacf1e7b7b3e67fad5e22583f1e2164a7d8533dbdbadfe82213fbe5ea4f4797000060c73ba76553f72f1b5d6452f7acde5abd69741180dde8871aff4bc5cc795b75fd95ab0400005b736cf5f2c69fe7ce9a8f579fb77295003824f7cd2dc623b337bf8e010070f8ddaebab0f1e7bbb3e61f5bee84831dc12384acbb93abbfaf6e32bac8c4fe77f51ba34b0000b0eb5c50bdbffab7a38b4cea76d525d54b461701d8e9f6547fd1f85f2666ce47323c0400e0c8fac3c69ff7ce9acbaa7baf5c210036f5d38d3fa0cf9e47ac5c250000b86e4eacdedef873df59f3ee9637be03702d3cbcbaaaf107f399f3fb2b570900000e8f7b67dfdb91796ef6c362cdd9038b7574e79603e8f1a38b4cecddd5d755978f2e0200c0143e5c5d5a3d64749149ddb16590f5c2d14500768a9372fbf0e85c597df1aa85020080c36c4ff5b78d3f1f9e3557560f5db94a007474cb9d57a30fdcb3e757562d1400001c21a7551f68fc39f1ac39afbaedca550298dc531a7fc09e3dff521db76aa10000e008ba7ff6c31a99575727ac5c258049fd44e30fd4b3e793d55d562d1400006c832734fefc78e6fc45f6cc0638c0e3abbd8d3f48cf9ec7ad5a280000d8467fd0f873e499636b1180cf72ffea92c61f9c67cf53562d1400006cb3ebb73cce36fa5c79e63c61e52a014ce0f3ab731a7f509e3dafa9aeb762ad00006084db56e736fe9c79d65c567df9ca5502d8c53e2f6f1759879c5fdd6ec55a0100c0480fa9ae6cfcb9f3acb9a0badbca5502d8854eabded1f803f1ecd95b7ded8ab502008075f0938d3f7f9e391fa86ebd729500769193aad735fe002cf5a4156b050000eb624ff5acc69f43cf9cb7b7dc8c00b0eb9d50bda4f1075ef15a5c0000769e13b2a9fbe8bcaae5a604805debfad5df36fe802bf5faeac4cd970b0000d6d2adb397eee8fc4375fcaa8502d8890cafd627e7b46ca00f00003bd5fdab8b1a7f6e3d733cd101ec3a8657eb934b5bbeec010060a77b6ccb4b89469f63cf9c6756c7ac5a28809dc0f06a7db2b77afce6cb0500003bcacf34fe3c7bf6fc6975ecaa85025867d7affea6f1075459f24b9b2f170000ec387baaa737fe5c7bf6fcdfeab8156b05b0966e50fd5de30fa4b2e4f75abedc010060b739a17a79e3cfb967cfb333c40276981b572f69fc015496d85c110080ddeee67933e13ae4cf33c40276889b56af6dfc81539678bd2d0000b338b3baa0f1e7e0b3e779d5892bd60a60a8db546f6dfc015396bcae3a69d315030080dde5cbabcb1a7f2e3e7b5e5edd64c55a010c71c7eabd8d3f50ca927754a76db6600000b04b3dbee50ddca3cfc967cf5baadbae582b806d75bfeaa38d3f40ca92b3ab33365d310000d8dd7ea2f1e7e5b2ec4b76d7156b05b02dbea6fa54e30f8cb2e4eceaf3375d31000098c3531a7f7e2ef5b1ea8b56ac15c011f57dd5958d3f20ca12c32b0000b8c6d12d6fe41e7d9e2e7549f50d9b2f17c0e1b7a7fa95c61f04e59a9c5ddd79b345030080099d54bdbef1e7ebb2ec4bf60b2dd7930047dc09d5331b7ff0936b62780500001bbb75cb5e4ca3cfdb65c933abe3375d3180ebe8d6d56b1a7fc0936bf2e10caf0000609533ab0b1a7ffe2e4b5e59dd72d31503b896eedf72a7cfe8039d5c13775e0100c0d67d717551e3cfe365c907aafb6cba620087e8f12d9bee8d3ec0c935794775fa266b0600001ce82baa8b1b7f3e2f4b2e6d793918c075726cf5df1b7f5093fdf3daea669bac1b0000b0b187559735febc5eaec9d3aa1b6cb668001bb955f5d2c61fc864ff9c55dd68e365030000b6e051d5958d3fbf976bf2866c91021ca22fabce69fc014cf6cf5f54d7df64dd000080adfb860cb1d62d17568fd96cd100aa8eaa7e3a07f175ccffaa8ede78e90000806be1dbabbd8d3fdf97fdf33ff24821b0815b56ffd0f803951c985faaf66cbc740000c075f0adf9117f1df3b6eabe9bac1b30a187e791c175cca5d5b76dbc6c0000c061f2c896f3efd1d700b27f2eaffe9f3c8d02d3bb5ef5ebb965761d736ef5c51b2f1d000070987d79f589c65f0bc881797175fa862b07ec6af76a79cbc3e803911c98375777d878e900008023e47ed5798dbf2690037361f5846caf02d338b6faf9965b31471f80e4c03caf3a69c3d50300008eb4bb551f6afcb5811c3c2fa8ced870f5805de1eed56b1b7fc09183e729d5311bae1e0000b05d4eafded2f86b0439782eae7e34d74fb0eb1c57fd5c7559e30f3472602ea9be63a3c50300008638b9e50989d1d70bb2715e55dd63a3050476962f6ed95369f481450e9e77b7ec47060000ac9f63aa2737feba4136cee5d5af55276eb086c09abb71f53bd5558d3fa0c8c1f3d7d5291b2d200000b036bebfbaa2f1d710b271ceae1e9f4dde61c7d8537d6bcb8777f401440e9eabaa9fad8eda600d010080f5f390eafcc65f4fc8e6f9a73ce5026bef5ed54b1b7fc0908d735ef5d08d16100000586b77cee6ee3b2157b63cfae989175833a7b67c383d2eb8de7971759b0dd6100000d8196e543db3f1d717b23ae7554fac8e3fe84a02dbe6fa2d1f46b7b1ae77ae687964f0e8832f230000b003fd407569e3af376475de577d5bb671816db7a7fac6960fe1e803816c9e77555f74f06504000076b8fbb4bc597cf475876c2d6fac1e7ed095040ebb7f53bda2f11f7c599da7b6dc5e0c0000ec5e37aefeacf1d71fb2f5bca8fa92832d2670dd7d69cbdb14467fd065752e68b9430e000098c39eea07ab8b1b7f3d225bcf59d5971db89cc0b5f145d5df35fe832d5bcb0baad30fb6900000c0ae77d7ea558dbf2e9143cb4bf2b678b8d6beb2651832fa832c5bcb27aaef6bf9e505000098d731d5cfb7bccc69f4758a1c5a5e513d22d775b0d251d523b3c7d54ecbf3aadb1e643d01008079dda77a4be3af57e4d0f3c6eabbabeb1fb0aa30b91bb53c2ffdf6c67f5065eb39bffa8e4ce7010080833bbefa8deaaac65fbfc8a1e7dcea17ab9b7feec2c26cee54fd56cbe367a33f987268f9cbea56072e290000c001beb07a7de3af63e4dae5d2ea0fab7b061339aafaaaea6faabd8dff20caa1e523d5e30f5855000080cd1d5bfd64de54b8d3f34fd5b7b4dc5d07bbd249d5bfafded6f80f9c1c7aae6cb95beec69fbbb000000087e0f62dfbe88ebec691eb96f35bae11cf0c768163abafae9e595dd2f80f985cbbbcb4ba5700000087cfe35b9ef0187dbd23d73d2f6bd91ff9c46087b977f5ebd5471bff41926b9f73abefcc26ed0000c09171e3eabf549735fefa47ae7b3e593dad7a58cb0d2db0966e55fd78cbeb36477f68e4bae5aaea77ab5302000038f2eedcb24ff2e86b21397c39a77a72f5c0dc14c11ab87df5c4ea85792dea6ec90babfb040000b0fd1e5abda9f1d7457278f39eea975b9ed632cc625bec69196efce7bc0275b7e51dd5d705000030d631d5f7551f6bfc75921cfebcbfe5ceac07e731430eb3ebb5fcc57a72cb5fb4d17fd9e5f0e6dceafbabe3020000581f37ae9e547daaf1d74d7264727ef5c7d563ab1bc54a6e5fdbdfd12d77597df9be3cb03a7e68238e844baaa7b4dc4d77c1e02e0000001bb945f5d3d577e787f7ddecca96b719fe5df5f7d52b5bb62a82cfd853dda3faa1ea39d5858d9fc2ca91cbde9609f76d020000d8396e57fd51f65f9e25e757cfaabea73a23aaf9eec03ab9badfbedc7f5f4e1dda88ed7075f557d5cf56ff32b80b0000c0b575f7ea17ab4736dff5fcccde5fbda47af1be3fdfd8847768ede6bff0d7abfe55fb0faceed8eefedfcc819e5bfda7ead5a38b0000001c2667b63c5af898eaa8c15dd87e9fa85edaf2d8e13f55af6ad92f6d57db0dc39ca3abdbb73c0a78f7cfca192d6f70604e7fdf72c7d5cb46170100003842ee52fd54f50db9fe9dd9deea9dd56bab7fde97d7b6bccd72d7d84903ac9bb60ca56edf7227d519d5e75777cd46eb5ce385d5cfb44ca1010000667087ea27ab6fce66ef5ce3fd2dc3acd7556fdd97b74fd8c38a000020004944415457178d2c756dadcb00ebd896b72b7c5e75abea962d1b6d7f5ecb07f10e79ad249bfbc7ea97f6fd09000030a3cfab7eb07a42aea139b8ababf7b50cb2ded232d47a5bf5deea83d515c39aad70a4065837a86e5c9db42f37a94eab6ed67227d5a99ff5cf37df977519a6b173ecadfebcfa9596677e0100005886574f6819667ddee02eec1c7babb35b065cef6bb983ebfdfbfef507abf3aa731b34e43a94a1d1512d1ba17f65754ad70ca74e6a19569dfc59ffecd95b8ea4cbaba755bfd6322d060000e040c7565f5f3db1bae7e02eec1e1fafce6919669d5b7d64df9f1fea9a01d8d9fbfe7d87cd560658a7563f5a7d5bcb1d5330caa7aaff51fd7acbf417000080adf9b2963bb2bea6e5656870a45d54bdbb7ad7be3fdfd9b21fd76bab4b0ff5bf6cb301d651d58fb56c04e7d95946fa68f5e47d39ac135c000080c9dcb6fa9eeabb5a6e5881ed7645cb10eb65d5735a5ec6b6f7dafe979d5a3daf65732f91517965f54dd5f5020000e070ba5ef5ad2dfb098fbef693b9f3feea87aae33b44376dd98d7ef4ff00993397574faf1e10000000dbe17ed5ffaa2e6efc35a1cc9bb7550f6c039ffb08e149d53f55676ef41f8023e4232dfb5bfd6ef5e1c15d000000667452f5f8eabbb3e93b635cd6f224d6ff5df56ffcd3c64fdc64aebc2c8f09020000ac9bfbb6dc64f0c9c65f37ca5cb9ac83dc89f5d977607d4dcbe65970a47dbc7a5af5fbd51b0677010000606327565f5f7d4bf5256dfe3238385cde5f7d7e9ff5b6c24fffc53bae7a47759b01a598c3d5d559d51fb4dc0a78d9d0360000001caadbb60cb21e57dd79701776bf1faf7ef5d3fff0e901d637567f3ca40ebbdd87ab3faa7eaf7ad7e02e0000001c1e0f68d92feb1bab9b0ceec2eef49eea0e2d37c47c6680f5c2ea5f8f6ac4ae7345f537d5ffac9ebbef9f010000d87d8ead1ed6b2b7f1d7647f630eaf07562ffdf43f7c5ee337e8929d9fbd2d6fb0fc9eea9400000098cd29d513aa17b75c238ebe4e959d9f9f6c9f3dd537547f125c3b6f6e79fcf4e9d57bc756010000604ddca1e511c3c757771adc859debaf5aeeec6b4ff5dbd5f70fadc34e7376f58c963709fef3e02e000000acb77f553d765fce18dc859de52dd55d6b1960bdb8e59942d8cc47aa3fabfeb47a5175d5d83a000000ec405fd035c3acdb0deec2fabbb8ba412d03acb7569f3fb40eebeafdd5b3f7e5252dcf30030000c0e170df9641d663aadb0eeec2fa3aa1ba644f754e75dae032ac8f7757cf6ab9d3ead52d9ba6010000c091b2a7ba5ff5f5d5a35b5e36079f76727541d5158ddf555ec6e7b9d5bd0200008071f654ffba7a4de3af93653d729b5afe625c5a5d2fa8f7b5ec73e59141000000b6d371d557548faabeb63a756c1dd6c889d5457b5a6ec33a697019d6cf47aa3f6f799cf0aceacaa16d000000d86dae5f3da46568f5c8eac663ebb0862e69d903ab3d2d1b757bbe94cd7cac7a4ecb30ebefabcbc6d60100006087ba41f5b0eadfeefbf38663ebb0e6dedfbe0dfef7b43c2af64543ebb0937ca2fa9b9661d673ab8bc6d601000060cd1d5b3db47a7cf588eaf8b175d841feb2e5ef4c4755ef1d5a859de6462d6f867866756ecb9e598fcd01080000806bec69b959e6c9d5875b9eeaf9fa5c3b7268cefaec7f7862e37794979d9f0bab3fac1e5c1d1d00000033ba73f50bd5bb1a7f9d2a3b3ff76c9f4f4f445f121c3e1faefe4ff5f4ead583bb0000007064ddb47a5ccb2382f719dc85dde375d5bd5a0659ed69b95be67dd5ad069662f77a5bf5c72dc3ac770dee020000c0e17154cb1b04bfb3e50d82c78eadc32ef4add51f7dfa1ff6ecfbf349d54f0ca9c34c5ede32c87a6675cee02e0000001cbadb54dfd632b8bacdd82aec621fa8cea82efff4ffe1d303ac53ab7756270d28c57caeacfeae6598f5ecea92b175000000d8c4b1d5d7b40cad1eda72f7151c490fabfe66a3ffe777367e732e992f1faf7eabe5b956000000d6c7edaa5fa93edaf86b4799277fd016fcfa1a149579f3eaeafb7227200000c0485f51fd597555e3af1365aebca83aa12dfa8fd5656b505ae6cdc52d1bb57d610000006c8713aa27546f68fc35a1cc9997772d6e6839b3fa8b6aef1afc0f90b9f3da96c75bb73c8105000060cb4eaf7eb5657b97d1d77f326ffeb03ab1ebe04ed5cfb44cc12e5d83ff41326f3e5efdd796b71000000070dd7c49cb4bb5ae6cfcf59ecc9b0f558f6f0bf6acfeb77cc6b1d5bfaaee5bddb5ba6dcb2b336f539d7c08ff3d705decad9e5ffdc6be3faf1e5b07000060c7d8d3f236c19fc8962d8cf5d6eab75b366cbf742bff814319606de606d52daa9beecbcd0ff2af4fab6e96611787cf9babff563dad65df360000000e746cf5b8eac75a6e488123e582ea13d5859ff5e7a7fff505d5bb5b6e4679efa1fe171fae01d6a138ae659875d3ead62d77729dbeefcf4fffebd306f462e7fa48f5e4ea77abf30677010000581737a8beabfa0f2d4f4fc1a1f8787576f5e1eadc96ebedf3aa73f6e5bcf61f585d7024cb8c18606dc5092d83acd3abbb5477feac3f6f32ac15ebeee2ea7fb7ec95f5aec15d00000046b949f5efab1fc83534077759cb5d50ef6ab92bea832dfb517da06568f5c1ea9251e50e665d07589b39adba5bcb06f3776dd997eb0baa1b8d2cc55ab9b27a46f5cbd55b0677010000d82e27b7dc6df543d50d077761bcab5a06546fa8ded132a87ae7be3f3fd0b2c7f48eb113075807b3a7e5ed74f7aaeedd32d0fa82ea9491a5186e6ff5acea97aad70dee02000070a4dca8fa91ea87ab1b0feec2181fa8def83979735bdc207d27d82d03ac8d9cdef2668507565f5cddbd3a7a642186b8ba7a4ef58bd56b0677010000385c4e6c794cf047f3a8e04cceab5e51bdf2b3f2f1a18db6c16e1f607dae1b555fb42f5f52ddb765533be6f1d7d54fe78e2c000060e73abefabeeac7f312b4ddeecaea552d43aa4f0fadecf93ca163ab7fdd7267ce2b5afe625c2dbb3e57554f6f79ec14000060a738a66570f5e1c65f57c991bb5efde7eabf545fdd72971d1ce094ead1d5ef55ef69fc5f5c39b2b9bcfa9dea16010000acb7afa9ded4f8eb2839fc797bf5bbd563aa53836be1ced58f552f6d99828efe4b2d47261757bf92cd0e010080f573afea058dbf6e92c3972bf7ade90f55b70b0eb39b554f68d943e9d2c6ff8597c39f735b6ec73d26000080b16e53fd516ea6d82db9a87a76f52dd9709f6d74c3965bfb9ed972f7cee80f821cdebcb17a50000000dbef86d57fceb5e66ec8c7aa3fa81ed1b2f13e0c7552f56dd5f3b309fc6ecbb3b3d13b0000b03df654df549dddf86b21b9f6b9bcfaf3ea6babeb056bea16d50fb7bcd672f487460e4f2e6df9f5c39b1f00008023e56ed5598dbffe916b9f57573f904dd8d981eedcf2dacb731aff4192eb9ef7560f0f0000e0f039b1fab5ea8ac65ff3c8a1e7432d2f04bbcbe72e2cec44d7abbebefafb6a6fe33f6072ddf28ceae60100005c378fad3ed8f86b1c39b4ec6dd942e8ababa30e5855d825ce6899ce7eb4f11f3ab9f639bfe58d947b0200003834776a19808cbeae9143cba7aadfcddd564ce6b8ea9babd734fe4328d73e2f6a7954140000609563aa1faf2e69fcb58c6c3defa9fe6375f2814b0a737950cb1b0aae6afc07530e3d97b61cccdc3a0a00006ce41ed5ab1a7ffd225bcf59d5a3aaa30f5c4e98db19d56f569f6cfc0755aeddc1edb69fbba80000c0d48eab7ebebaacf1d72cb23a5755cfaeee7db0c504f67772f5b3d5c71affe19543cb85d5b71cb8a40000c084ee5bbdbef1d729b23a57564fafee76d095043675c3eaa7aa731aff619643cbffad4e3d7049010080095cbffad5ea8ac65f9bc8e6b9aa7a6a75c783ae2470486e503db1fa48e33fdcb2f59c5d3de420eb090000ec5e67566f68fcf5886c9ebd2d7b51dffde0cb085c17c7573f589ddbf80fbb6c2d5755bf900dde010060b7dbd372bde60d83eb9fbfabee77f065040ea7135b3601b4d9fbcec9f3aad30eb6980000c08e77b3ea6f1a7fdd219be74dd543375843e008ba79f5e4eaf2c61f0864753e587de14157120000d8a91e5e7db4f1d71bb2713e5a7d5f75cc066b086c9333aa67b43cc33bfac0209be7f2ea475a6e2f06000076aee3abdfce75d83ae7b2eaff6d798a0958230fa85ed3f88384acce335b36e7070000769e3b56ffd2f8eb0ad9387f5fdd65a30504c63baafaee6cf4be13f2eaea96075f460000604d7d6d757ee3af27e4e0f940f5d80d570f583b376ed91feb8ac61f4064f383eb3d3758430000607d1c5dfd4a1e195cd75c55fdf73c2e083bd63dab1736fe60221be793d5d76cb4800000c07037abfeb1f1d70e72f0bcbe654b1d6087db533da1baa0f107163978ae6cd9dc1d0000582f0f6c79a3f8e86b06393097563f5b1db7e1ea013bd2adaabf68fc414636ceefb4dc9a0c00008cf7fd2d6f121f7d9d2007e635d55d375e3a6037f886eaa38d3fe0c8c1f3a7f905010000463abafaadc65f1bc881b9a2fa85ead80d570fd8556e523db5f1071f39789e5b9db0e1ea01000047ca49d5df36fe9a400ecc5babfb6fbc74c06ef6a8eabcc61f88e4c0bcb0bad1c64b0700001c66b7abded8f86b013930bf931ff9617ab7ac9edff803921c985755a76ebc740000c061f2c06cb5b28e39bffab79bac1b30993dd50f579734fe0025fbe7cd2d43460000e0c8f8a69637da8d3ef797fdf3d2eab69bac1b30b133abd735fe4025fbe71dd5ad3759370000e0daf9f16a6fe3cff9e59aecad7eb93a66937503e8fad5ffd7f88396ec9f3755a76db26e0000c0d6eda9fe6be3cff365ff9c5f3d7c93750338c0b7541735fe0026d7e4b52d6f45010000aebd63aa3f6afcf9bdec9fd757676cb26e001bba7bf5f6c61fc8e49abcacbac1668b0600006ce884ea2f1b7f5e2ffbe78f739d035c4737aafeb4f10734b926ff9057c80200c0a13ab9faa7c69fcfcb35b9b2fa91cd160de050eca99ed87270197d8093257f551db7d9a20100009f718b9647d4469fc7cb35b9a0faaacd160de0dafaaa9683cce8039d2c795acb70110000d8d82daab734fefc5daec9bbaabb6db66800d7d5ddaa7736fe80274b9eb4f9720100c0d40cafd62f2faa4edd6cd1000e97535b0e3aa30f7cb2e47b375f2e00009892e1d5fae5a9d90a05d866c7557fd0f803a02c7b933d62f3e5020080a9185ead5f7e355ba00003fd74b5b7f107c3d9735175ff156b0500003330bc5aaf5c55fde0a62b06b04dbe336f285c879c539db162ad000060373b2dc3ab75caa5d563365d31806df6c8ea92c61f2067cf3b5abeb4010060362755ffd2f87372597261f5a59bae18c0205f5a9ddff803e5ec797975c28ab5020080dde4f8ea1f1a7f2e2e4bceadeeb3e98a010c768feaecc61f3067cf5f5447af582b0000d80d8e6e39ff1d7d0e2e4b3e58dd65d31503581377a8dedff803e7ec79caaa850200801d6e4ff53f1b7fee2d4bde599dbed98201ac9bdb57ef6bfc0174f6fcd0aa850200801dec498d3fe79625afaf6ebef97201aca7db55ef6dfc8174e65c593d7cc53a0100c04ef4e38d3fdf9625afa94ed97cb900d6dbe9d57b1a7f409d39175467ae58270000d8491e515dd5f8736d31bc027691db56ef6efc8175e6bca73a6dd5420100c00e708feaa2c69f638be115b00bddb6fa40e30fb033e7e5d571ab160a0000d6d8cd735db12e31bc0276adbb55e734fe403b739ed6f2a6160000d8694e68f95176f439b52cc3ab93375f2e809dedfed5858d3fe0ce9c9f5ab94a0000b05ef6544f6ffcb9b42c6f1bb43d0930852faf2e6bfc8177d6ecad1eb372950000607dfc4ce3cfa3a5de51dd6ac55a01ec2a8fa8ae6cfc0178d65c54dd7de52a0100c0780f6bf91176f439f4ecf9407587156b05b02b7d6fe30fc233e71dd5492b57090000c639bdfa58e3cf9d67cf39f9011c98dc931a7f309e397f954ddd0100584fc755af6afc39f3ecb9a0baef8ab502d8f5f6547fdef883f2ccf94f2b57090000b6df531a7fae3c7baeacbe72d54201ccc2eb70c7666fcbbe020000b02e1ed7f8f36459b67d01e0b3dcaa6553c0d107e859737e75c6ca5502008023efaed5a71a7f8e3c7b9eb46aa100667566bea846e6752d77c30100c028c7576f6afcb9f1ec795af6ca05d8d4631b7fb09e397fb27a890000e088f98dc69f13cf9e17b46ca00f6be5e8d105e073bca9ba71f580d1452675f79657e4be7a74110000a6f395d56fe7ce9f91de5b3da4fae4e01e003bc2b1d53f35fe9787597371cb200b0000b6cbc9d5071b7f2e3c732eaaeeb16aa100d8df2daa0f37fe203e6bded8b2ff0000006c873f69fc39f0ccd95b3d7ae52a0170505f525ddef883f9acf99dd54b040000d7d93736fedc77f6fcc2ca550260533fd6f883f9ccf9bad54b040000d7daadab8f37febc77e6fc65f61d03b8ce8eaafea1f107f559f3b1ea362b57090000ae9de734fe9c77e6bcb73a65d52201b035b76a19a48c3eb8cf9a17e68da500001c7e8f6efcb9eeccb9acbaffca558235e1a2949de093d5bbaac78e2e32a9dbb66ceaf8c2d1450000d8356edcf2e8da0d471799d813ab678d2e01b01bfd7ee37fa598355756f759bd440000b025bfdbf873dc99f3ecec7b0570c49c58bdbdf107fb59f3faeab895ab0400009b7b60cb1dfea3cf6f67cdfbab9357ae12ac198f10b2935c5ebda6faf6fc5a30c2cd5abef0ce1adc0300809debb8eaafab9b8e2e32a9abab47556f195d046006bfd9f85f2d66cde5d599ab970800000eeaa71b7f4e3b73feebea2502e07039b17a4fe30ffeb3e6d5d5312b57090000f677cb9617348d3e9f9d356fa8aebf7295604d7984909de8f2965b5ebf79749149ddb2bab47af1e8220000ec28bf59dd6f7489495d567d55f5a1d1450066f4878dff1563d65c52dd79e50a0100c0e23ed5558d3f8f9d353fb37a890038524ea93edcf82f8359f3d2eaa895ab040000f5a2c69fbfce9a37e46de200c33daef15f0833e7bb562f110000937b74e3cf5b67cd95d503562f110047da9eea9f1affc5306bcea96ebc7295000098d5f5aa7737febc75d6fcf7d54b04c076f13cfdd8fc97d54b0400c0a47eb4f1e7abb3e67d2d6f7007608dfc5ee3bf2066cde5d9d01d008003ddb0e58efdd1e7abb3e651ab970880ed765a757ee3bf2466cddfae5e22000026f3538d3f4f9d35cfdbc2fac08e72f4e80270985c5c5d527dd5e822933aa37a75f58ed1450000580b2755cfac8e1f5d644257548facce1b5d0480833ba67a4be37fed98356f6fd9a41300007eaef1e7a7b3c61eb5ec4aeec06237d95b7db47aece82293ba497561f5d2d145000018ea94ea4faaeb8f2e32a18fb6ec7d75f9e822006c6e4ff5aac6ffea316bce6bd9ac13008079fd52e3cf4b67cdf76e617d0058130f6efc17c7ccf9a9d54b0400c02e7572f5c9c69f93ce98b7b76cab02c00ef20f8dff029935eec2020098d7ffd3f8f3d159f3e82dac0f006be6fe2d7b628dfe129935eec2020098cff5aab31b7f2e3a635ed1b29d0a003bd0731aff45326b3e96bbb0000066f3dd8d3f0f9d355fb985f501604dddbff15f2433c75d580000f3d853bda9f1e7a033e6c55b581f00d6dc3f36fe0b65d67cacbad1ea25020060177844e3cf3f67cd43b6b03eb0e31d35ba001c614f1a5d6062a754df3fba040000dbe247461798d42baae78f2e01c0e1f1aac6ff2a326b3e9057f90200ec76f76efc79e7ac79d816d60776057760310377618d73ebea51a34b000070447defe80293fae7eab9a34b0070f81c55bdb9f1bf8ecc9a17ac5e22000076a81b559f6cfc39e78cf9962dac0fec1aeec062067babdf1a5d62620faace1c5d02008023e29baa13479798d087ab678c2e01dbc9008b593cb5ba70748989fdfbd10500003822fedde802937a4a75f9e812001c19bfd9f8db7c67cd27ab1baf5e22000076900734fe3c73c65c5c9dba85f5815dc51d58cce4c92d077cb6df89d5778c2e0100c061f584d10526f58ceabcd1250038b2feb6f1bf98cc9ab7577b562f1100003bc049d5458d3fc79c31f7dbc2fac0aee30e2c66f33ba30b4cec8ef9b20500d82d1e5d9d30bac4845e57bd72740918c1008bd9fc65f581d12526f68da30b000070583c6e748149fdeee802308a0116b3d95b3d6d7489893d26c71d00809dee16d583469798d0a7aaa78f2e01a3b89064467f34bac0c46e597de9e81200005c278fcdb5e4087fd6f2766f9892830e337a6bf58ad12526f60da30b0000709d787c708ca78e2e00231960312b07ff711e551d3bba040000d7ca197931cf081faefe71740918c9008b593da3ba7c7489499d5a3d7874090000ae15775f8df127d555a34bc0480658ccea63d55f8d2e31b1af1f5d0000806be5d1a30b4ccae6ed4ccf008b993d637481897d758e3f00003bcdedab33479798d0bbabd78e2e01a3b98064667f535d32bac4a46e52dd7b740900000ec9c3471798d4b3471780756080c5cc3e553d7f7489893d64740100000ec923471798940116648005be0cc6f937a30b0000b06527555f32bac484ceae5e31ba04ac03032c66f797d515a34b4cea01d50d47970000604b1e561d3bbac484fea2da3bba04ac03032c66777e75d6e812933ab6fab2d1250000d812fb5f8df1d7a30bc0ba30c0827ad6e80213f3182100c0fa3ba6e52dd26cafcbf2633b7c8601162c6f23648c078f2e0000c04af76dd9038bedf5a2eaa2d125605d186041bdbf7adbe81293ba6375dbd1250000d8946d1fc678dee802b04e0cb060f177a30b4cec01a30b0000b0a92f1f5d60520658f0590cb060f1fcd1052676bfd1050000d8d0f5aa2f1a5d6242e7546f1a5d02d68901162cceaaae185d6252f71d5d0000800d7d6175fce812133aabba7a740958270658b0f864f5f2d1252675ef9637db0000b07e3c3e38c60b47178075638005d7b00fd6182754771b5d02008083b281fb180658f0390cb0e01a2f1a5d60621e230400583f2754f71f5d6242e7566f1e5d02d68d01165ce355d595a34b4cca891100c0fab96775ece812137a79f6bf82031860c1352eae5e37bac4a4dc810500b07e1e30bac0a4eccd0b07618005fb7bf1e80293ba5bde6e0300b06eee37bac0a45e35ba00ac23032cd89f5f3bc638a6bad3e8120000ecc7360fdb6f6ff5cad125601d1960c1fe5e36bac0c4ee32ba0000009f71d3eaf4d12526f4b6eac2d125601d1960c1fede577d707489497dfee80200007c86bbafc678fde802b0ae0cb0e040f6c11ac3000b00607d78c9ce186f1a5d00d69501161ce8acd10526e511420080f5719fd10526f5c6d105605d1960c181ce1a5d605277acf68c2e010040b5bc259aed6780051b70b10807f7a1ea96a34b4ce8b6d5fb4797000098dc49d505a34b4ce892ea86d555a38bc03a7207161cdc59a30b4ceacea30b0000d05d471798d49b33bc820d1960c1c19d35bac0a46ce40e0030de99a30b4cca06eeb009032c38b8978d2e30a93b8e2e000080fdaf06b1ff156cc2000b0eee2dd5a7469798d0ad46170000a0bb8f2e30a9378c2e00ebcc000b0eeeaaea35a34b4ce8d6a30b0000e00eac41de3cba00ac33032cd8d8ab471798903bb00000c63ab9bad9e81213babcfae0e812b0ce0cb06063af185d604237af8e1e5d02006062a78f2e30a90f567b479780756680051b7bfde802133aba65880500c01877185d6052ef1d5d00d69d01166cecddd595a34b4cc863840000e3dc7e748149bd7f740158770658b0b12bf24532828ddc0100c6397d748149bd77740158770658b0b9b78f2e3021776001008ce30eac31de37ba00ac3b032cd8dcbb46179890011600c038b71b5d60520658b08201166cce006bfbdd6274010080491d9547084731c082150cb060731f1c5d6042a78d2e000030a99b55c78d2e31a1bdd507469780756780059bfbd8e802133a797401008049b9137e8cb35b5e20056cc2000b3677eee8021332c0020018e3a6a30b4cea23a30bc04e6080059b33c0da7e0658000063dc7c74814979ea03b6c0000b36e7cb64fb196001008c71b3d10526f5d1d105602730c082cd5d9121d6763bb63a71740900800919608de17a03b6c0000b563b7f7481099d32ba0000c0843c4238c679a30bc04e608005ab5d32bac0840cb00000b69f4ddcc738677401d8090cb060b54f8e2e3021fb6001006cbfd3461798944708610b0cb060b5cb46179890011600c0f6bbf1e80293f2e673d802032c58ede2d1052664800500b0fd6e34bac0a40cb0600b0cb060b54f8d2e30a1e34717000098d00d471798944708610b0cb060358f106ebf134717000098cc0daaa34797989401166c810116ac76d1e80213bafee802000093f1f8e0189faaae1e5d027602032c58cd006bfb5d6f74010080c918608d61bb12d822032c58edcad1052664ff050080ede5fc6b0c3f96c316196001ebe8d8d105000026e30eac31dc81055b648005ab5d3cbac0846ce20e00b0bdbc057a8c4f8e2e003b850116ac76c5e8021372020500c00c0cb0608b0cb0807574dce8020000b00d3c42085b648005ac237b3000006caf934617989401166c910116ace64b65fbd9c41d008019780b216c910116ac76d5e80213bac1e8020000b00dfc580e5b64800500008097e88c611377d822032c000000bc44678cbda30bc04e618005abf95564fbd944140080195c3eba00ec140658b09a5f4500008023e192d10560a730c00200000060ad1960010000c0189f185d00760a032c00000018e3ead10560a730c002d691b7e000003083cb4617809dc2000b5847c78f2e000000dbe0d2d10560a730c00200000060ad1960010000c018178e2e003b850116000000006bcd000b00000080b5668005000000c05a33c00200000060ad196001000000b0d60cb000000000586b065800000000ac35032c00000000d69a01160000008c71e1e802b053186001000000b0d60cb000000000586b065800000000ac35032c00000000d69a0116000000006bcd000b56bb68740100000098990116ac76e5e8020000003033032c00000000d69a0116000000006bcd000b00000080b5668005000000c05a33c002000080313e31ba00ec14065800000030c6d5a30bc04e618005000000c05a33c00200000060ad196001000000b0d60cb000000000586b065800000000ac35032c00000000d69a0116000000006bcd000b00000080b5668005000000c05a33c00200000060ad196001000000b0d60cb000000000586b065800000000ac35032c00000000d69a0116000000006bcd000b00000080b5668005000000c05a33c00200000060ad196001000000b0d60cb000000000586b065800000000ac35032c00000000d69a0116000000006bcd000b00000080b5668005000000c05a33c00200000060ad196001000000b0d60cb000000000586b065800000000ac35032c00000000d69a0116000000006bcd000b00000080b5668005000000c05a33c00200000060ad196001000000b0d60cb000000000586b065800000000ac35032c00000000d69a013eada59a000020004944415416000000006bcd000b00000080b5668005000000c05a33c00200000060ad196001000000b0d60cb000000000586b065800000000ac35032c00000000d69a0116000000006bcd000b00000080b5668005000000c05a33c00200000060ad196001000000b0d60cb000000000586b065800000000ac35032c00000000d69a0116000000006bcd000b00000080b5668005000000c05a33c00200000060ad196001000000b0d60cb000000000586b0658000000f0ffb777efd1be9d757defdf3b0921376e816044e42217c3cd22a5828272912a0a4a291c152fb48ada7354d4564ff160adad3d0ead8eda1e691d5a2db56a2d5245d0daa31c4144e5a20242b808c82d885c4312209090cdcef9632e1a42f65e97bdd75ecfb37ef3f51ae333d602fef90e1ff79acfeff39bf399c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105cce8c8e8010000009887020b98d12d470f000000c03c1458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d8105000000c0d41458000000004c4d81053bfbd0e80100000060cd1458b0b3eb470f000000006ba6c002000000606a0a2c00000000a6a6c002000000606a0a2c00000000a6a6c002000000606a0a2c00000000a6a6c002000000606a0a2c00000000a6a6c0829d5d3f7a0000000058330516ecec43a30700000080355360010000003035051600000000535360010000003035051600000000535360010000003035051600000000535360c1ce3e3c7a0000000058330516ececd8e80100000060cd1458b0b3ab470f000000006ba6c0829d1d1d3dc04a9d3f7a00000000e6a0c0829d5d337a80953a6bf400000000cc4181053bbb76f400000000b0660a2cd89deb460f000000006ba5c082ddf9e8e80156e8c8e8010000009883020b76e713a30758a15b8e1e000000803928b060773e327a00000000582b0516ec8e3bb000000060100516ecce87460fb042fe3e01000050f98008bbf5e1d103acd02d460f000000c01c1458b03b578d1e0000004ea30b460f00b01d0516ec8e47080100d864e78d1e00603b0a2cd81d05d6c1b38902003838e78f1e00603b0a2cd81d05d6c13b67f40000002be21142606a0a2cd81d05d6c1b389020038385ea0034c4d8105bba3c03a781e21040038381e2104a6a6c082ddf9f0e80156c82384000007e7b6a30700d88e020b76c71d5807cf2384000007e7e2d103006c478105bba3c03a786e6307003838b71f3dc04a5d357a00382c1458b03b978f1e60853c42080070306e5edd7af41000db5160c1eefccde80156e856a307000058098f0f8ee30e2cd8250516ecce07aaeb470fb132b71b3d0000c04a787c700c9f2f600f1458b03b475b4a2c0e8e8d1400c0c1b8e3e80156ea8ad103c061a2c082dd7befe80156468105007030ee3a7a8095ba72f400709828b060f71458074b810500703014586328b0600f1458b07bef193dc0ca28b000000e86026b0c0516ec81020b76ef7da307589973f23a670080837097d103ac9433b0600f1458b07beec03a78f7183d0000c00adc65f4002be50e2cd8030516ec9e3bb00ede25a3070000d8709f519d3f7a88957ad7e801e0305160c1eebd7bf4002b74afd10300006cb8fb8c1e60c53ce1017ba0c082ddbb6cf4002ba4c0020038bdee3b7a8015f30539ec81020b76ef2dd5b1d143ac8c020b00e0f47207d6381e21843d5060c1ee7dbc7ae7e82156e69ed545a3870000d860f71b3dc08ab9030bf64081057bf3d6d103accc91ea8b470f0100b0c1ee3d7a8095fa780a2cd8130516eccd9b470fb0420f1b3d0000c086ba5375abd143acd43baa4f8c1e020e130516ec8d3bb00ede978c1e00006043dd7ff4002be67305ec91020bf6e62da30758a1cfab6e3f7a0800800df4a0d103ac98020bf64881057bf357a30758a133aac78c1e0200600329b0c679dbe801e0b05160c1deb8036b8caf1e3d0000c08639a37ae0e82156ec8da30780c34681057bf3e1ea7da38758a12fabce1d3d0400c006b9570e701fe975a30780c34681057be74d8407efbcea4b470f0100b041be60f4002b76751e21843d5360c1def9b6648c478f1e0000608338ff6a9cbfac8e8d1e020e1b0516ecdd6b460fb0520f1f3d0000c006f992d103acd86b470f008791020bf6eed5a30758a97b57b71b3d0400c006b87d75c9e82156cc17e270121458b077978e1e60a58ee42e2c0080fdf0252d7b2bc678c5e801e0305260c1de5d555d367a88957af8e80100003680c707c7f9440a2c38290a2c38392e3a633c7cf40000001be061a30758b137561f193d041c460a2c38392f1f3dc04addbbba68f410000087d885d57d470fb1627f367a0038ac145870725c78c638523d62f410000087d8c3f23970249f23e024f9c30527e7cfaa63a38758a9c78c1e0000e0107bfce80156ee8f460f008795374fc0c97b6d759fd143acd0075b5efdfc89d18300001c3237afde5bdd6af4202bf5c196e3307c110e27c11d5870f25e367a8095bab0fac2d14300001c425f9af26aa43f4e7905274d810527efc5a30758318f110200ecdd13470fb0721e1f8453a0c08293f787a3075831051600c0dedcac7adce82156cee70738050a2c3879efd80a07ef7ed59d460f010070883ca2e52806c6f860f5cad143c061a6c08253e35b94717c830800b07b4f183dc0cafd7e5e4204a7448105a7468135ced78e1e0000e09038b37afce82156eef9a30780c3eec8e801e090fbaceaaf470fb152d75777cd639c00003bf9d2963b8018e7b3f3b9014e893bb0e0d4bcabba74f4102b752477610100ecc6df1f3dc0ca5d9af20a4e99020b4eddef8e1e60c59e347a000080c99d91026bb4df1a3d006c0205169c3a05d638f7af3e77f4100000137b6875f1e82156eeb9a307804da0c08253f727d547460fb1625f3f7a0000808979fbe0589755af183d046c0205169cba6b7317d6485f97175200001ccf99d513470fb172cf6d79f910708a1458b03f9e337a8015bb67f5b0d14300004ce851d51d460fb172bf397a00d8140a2cd81fffb3e54e2cc6f8b6d10300004ce89b460fb0727f53bd78f410b0291458b03faeaa5e387a88157b4275dbd14300004ce496d5e3470fb172cfaa8e8d1e023685020bf68fdb83c7b979f5e4d14300004ce489d579a38758b95f1d3d006c12071fc3feb95df5aeeaecd183acd41baa7b8f1e020060122fca39a123bdb1ba64f410b049dc8105fbe703791be148f7aa1e3a7a08008009dca5fa92d143acdcaf8c1e00368d020bf6d77f1d3dc0ca3d75f400000013784a9eb619e913d52f8e1e02368d3f6ab0bfcea9dedb72682607ef6875b7eab2d18300000c7241cb5ee836a30759b1dfa91e3b7a08d834eec082fd754df5df470fb16267e52e2c0060ddbe39e5d568cf1c3d006c227760c1fefbe2eac5a38758b12bab3b551f1e3d0800c0013ba3e5f0f0bb8f1e64c5de5b7d7675dde84160d3b8030bf6df1fb5bc118f316e5dfda3d14300000cf0f7535e8df6cc9457001c22df535d2fc3f28e96c7090100d6e4a58ddf87ad39d7b53c09009c06eec082d3e397aa8f8d1e62c5ee543d61f410000007e8c15b619cdfcccb84e0b45160c1e97145f5ecd143acdc0fe66f1c00b01eff72f400f433a307008093f1e0c6dfc6bcf67ccd8eab040070f83db2f1fbaeb5e7953bae12004ccc390463f3dadc8505006cb623d5cb1abfef5a7b9ebcd34201c0cc1edff88be9daf3753bae1200c0e165bf393e5e2004c0a17746f5e6c65f54d79cd7e72e2c0060339dd5b2d719bddf5a7b9ebad34201a7eeccd103c086bb7eebe7570c9d62dd2eaade545d3a7a1000807df6cdd553460fb1721fa8bea93a3a7a1000385517549737fe9ba135e74dd5cd765a28008043e49ceab2c6efb3d69e1fdc69a180fde10e2c38fd3ede529e3c72f4202b76db9612f1e5a3070100d827df573d61f4102b7745f50dd5b5a3070180fd72abea838dff8668cdf940759b9d160a00e010b8a8baaaf1fbabb5e7e93b2d14b07fdc810507e3daeae6d523460fb262e7556757bf377a10008053f493d543470fb17297575fdff2b405006c945bb7dc663cfa9ba235e7daeaee3b2d1400c0c4ee555dd7f87dd5daf3b49d160ad85feec08283734d756ef5f0c173acd999d51dab678f1e0400e0243db3a5c4629cf754dfd8522402c046ba65f5fec67f63b4f63c7c8775020098d1231bbf8f92faf69d160a0036c17737fea2bbf6bcbee54c320080c3e2acea558ddf47ad3dafdb5a0b00d87867577fd5f88befdaf3833b2d1400c044beb7f1fb27a9c7eeb45000b049bea6f117dfb5e76339d01d00381c3eabfa50e3f74f6bcf0b775a2800d83447aa3f6dfc4578ed79fe4e0b0500308167377edfb4f61cadeebfd34201c0267a6875acf117e3b5e7eb775a28008081bea2f1fb25a99fd969a1006093fd62e32fc66bcf7baa0b775827008011cec9d9a933e403d56d77582b00d86817575735fea2bcf6fcda4e0b050030c0bf6afc3e49eaffd869a100600dbc51668e7cdd4e0b050070803ebfbaa6f17ba4b5e715d5993bac1500acc259d5a58dbf38af3d975777d861ad00000ec2f9d51b1abf3f5a7baeab1eb0c35a0107e48cd103001dadbeb3e522c9381756bfd0f286480080919e515d327a08fa77d52b470f0100b3f999c67fcb24f56d3b2d1400c069f4a4c6ef87a4de529db7c35a01c02adda2baacf117ebb5e7c3d53d77582b0080d3e1ae79c1cf0c39567dd90e6b0500abf6958dbf604bbdaa3a7787b50200d84f37ab5edef87d90d4cfefb0560040f5cb8dbf684bfdec4e0b0500b08f7ebcf1fb1fa9b7b73c190100ece076d5bb1b7ff196fafa1dd60a00603f7c55cb636ba3f73e6bcfb1ea913bac1500f029be329b9819f2a1ea7377582b008053f139d5158ddff7c8f2f64700608fbc95708ebc3ae7610100a7c7b9d52b1bbfdf917a43de3a080027e5bc960be9e88bb92ce7920100ecb7ffd4f87d8ed435d5fd77582b00601b7fbbbab6f11775a97fbac35a0100ecc5b7347e7f234bbe6787b5020076e1ff6afc455dea68f5d81dd60a0060373ebffa68e3f73752ffa33ab2fd720100bb7146f5bb8dbfb84b5d59dd67fbe50200d8d645d55b1abfaf917a5775fbed970b00d88b8baabf6efc455eeacdd585db2f1700c0719d5bbdacf1fb19a98f570fdd7eb9008093f1d0eabac65feca55e509dbdfd720100dcc891ea571abf8f9125dfb7fd720100a7e2fb1b7fb19725bf92f3120080ddfbb1c6ef5f64c973b28f0380d3ea48f5bcc65ff465c94f6cbf5c0000557d63e3f72db2e4cdd5adb65f2e00603fdcaa7a53e32ffeb2e407b65f2e0060e51e595ddbf83d8b2c2fe4b9f7f6cb0500eca74b5a2ec0a3370152c7aa6fd87eb9008095ba4ff5c1c6ef57a48e568fdd7eb90080d3e1b12d17e2d19b0159be557dd4f6cb0500accc03aaf7377e9f224b9ebefd720100a7d3d31bbf19902557570fdb7eb9008095f8a2dc2d3f53bc7c0700063b523dabf19b0259f291eaa1dbae1800b0e91e517db8f1fb1259f2b2eabc6d570c003810e7b55c98476f0e64c955d5176ebb6200c0a6fa8aeaa38ddf8fc8923757176dbb6200c081baa8e5023d7a93204baeacfeceb62b06006c9ac7e76d8333e5caeaeedbae180030c47d72d6c24cb9a2e5f0560060f37d7d755de3f71fb2e4daea91dbae180030d423f3cddf4cb9a27ac8b62b06001c76df9a3743cf94a3d5e3b65d3100600adf501d6bfce641965c5d7df9b62b06001c56df957dd74c39567dd3b62b06004ce5071abf81901b726df5c46d570c00386c9ed6f83d86dc384fdd76c5008029fd9bc66f22e4861cadbe65db1503000e8b1f69fcde426e9c1fda76c50080691da99ed9f8cd84dc9063d53fde6ed10080a91da97eb2f17b0ab9717e6abb450300e67766f59b8ddf54c88df38cadb501000e8fb3aaffd8f87d84dc38cf6c2916018043eeecea058ddf5cc88df35bd505dbac1b00308fdb54bfdff8fd83dc38bf9e2f050160a39c5fbdacf19b0cb971febcbac336eb06008c77b7ea0d8ddf37c88df33b2d5fd402001be636d52b1bbfd9901be7b2ea7edbac1b0030cec3aa0f347ebf2037ce6fa4bc02808d76dbea558ddf74c88df3a1eaabb6593700e0e0fdc3eadac6ef13e4c6f9953c360800ab7051f5eac66f3ee4c63956fdcbea8c132f1d007000cea87ea2f17b03b9697e3ee51500acca45d5a58ddf84c84df33bd5ad4fbc7400c06974fbeab71bbf1f909be61979db2000acd245d5eb1abf19919be6cdd5e79d78e90080d3e0b1d57b1abf0f909be6c7b759370060053ea37a6de3372572d37ca47ad289970e00d827e7573fdbf86bbf1c3f3f74e2a50300d6e4b6d52b1abf3991e3e717aaf34eb87a00c0a97850f5a6c65fefe5a639567dff89970e0058a35b557fdcf88d8a1c3f6fa8ee7fc2d50300f6eaacea5f54d735fe3a2f37cdb5d5934fb47800c0ba9d5ffd7f8ddfb0c8f1734df53d39bc14004ed53dab9737feda2ec7cf07ab479c70f50000aa73aadf6afcc6454e9cdf6e39801f00d89b33aaefad3edaf8ebb91c3f6fabee73a2050400f8546757cf6afc06464e9cf7548f3fd10202003771b7ea0f1b7f0d9713e74fab8b4fb4800000c77366f51f1abf9191edf3ab2d87f00300c777a4fa8e96b7fb8ebe6ecb89f3dc96e32c00004eca3f6b7903cce84d8d9c38eec60280e3bb73f582c65fab65fbfc74cb97a70000a7e429d5d1c66f6e64fbb81b0b001647aa6fabae6afcf5594e9ca32d67920100ec9bafaeae6efc4647b6cffbaa7f90371502b05e0fa95edaf86bb26c9f2baac79c600d01004ec9175697377ec3233be7c5d57d8fbf8c00b091ee5e3da7f1d760d9397fd172a83e00c06973efea2d8ddff8c8ceb9aefa89ea82e3ae24006c86dbb59ca1746de3afbdb2737eb93aefb82b0900b0cf6e57bda8f11b20d95d2eab9e70bc85048043ec9ceafb5a1e451b7dad959df3f1eaa9c75d490080d3e866d5cf357e3324bbcf1f540f38de6202c0217246f58dd53b1a7f6d95dde55d2d679301000cf3d49647d5466f8c647739d6f2b6c23b1d6f3101606267544faaded0f8eba9ec3e2fae2e3ece7a02001cb8bf5b7da0f11b24d97d3e5afddf391f0b80f99d517d4df5bac65f3f656ff9772d77ed03004ce3ced59f357ea3247bcbdfb4dc4577f39b2e29000c75a4e50cc7d734fe7a297bcbfbabafbee9920200cce1e6d5331abf6992bde79dd5ff5e9d7d935505808375a47a7cf5eac65f1f65ef797ef5993759550080097d6df5e1c66fa064ef797bf5adb9dd1f80837756f575d5ab1a7f3d94bde79aea9fb41490000087c625d5a58ddf4cc9c9e52dd537a7c802e0f4bba0fade962f51465fffe4e4f2baea6f050070489d53fd74cb9bef466face4e47259cbb7a9b70800f6d7c5d58f569737fe7a27279763d5cf54e70600b001bebce5b0f0d19b2c39f95cd1f221c36bb00138559f5bfd42cb2367a3af6f72f2795ff55501006c98db55bfd9f8cd969c5a3e56fd5ccb870f00d8ad33aa4755cfab3ed1f8eb999c5a9e972fb500800df7add5871abff19253cbb1eaf7aac755670600c77749f563d53b1a7fed9253cf7baaaf09006025ee52fd6ee33761b23f797bf503d54501405d587d57f592c65fa364fff28b5b6b0b00b02a475ade727745e33764b23fb9a6faa5ea0b03606d6ed67257ee7fcfd9569b96b7b69c670a00b06a77a89edbf8cd99ec6fde503d6d6b7d01d84c47aa8754ff4ff5dec65f7b647ff389eadf56e70700c0fff2a4eadd8ddfacc9fee668f5fcea1bf28a6d804df1c0ea2773aed526e7b5d5830300e0b86e5d3d236f27dad45c59fd7ccb5ba81cfc0e70b8dcaffad1eaaf1a7f3d91d3978f56ffbc3a3b000076f480eae58ddfc4c9e9cbfbaa9fadbe346516c0ac2ea97eb87a5de3af1b72faf3ebd59d0200604fcea8bebdbabcf11b3a39bdf96499f5a8eaac0018e59ceacbaa7f535ddaf8eb831c4c5e573d3c00004ec9edaaff505dd7f80d9e9cfe5c59fd5af5e4eaa20038dd2ea9fe71f5bbd5d58dbf0ec8c1e58aeaa9f9f20800605fddbbfa7f1bbfd99383cb27aa97544fafee1f00fbe1c2ea092d6712beb3f17feb65ccf5f53fb67c490870a81c193d00c01e3cbae5d1867b8f1e8403f7eeea0faa176efd7cebd871000e857b545f50fd9d96b7ca3d30670faed94babefac5e357a108093a1c0020e9bb35acec7fae7d5670c9e8571ded60d85d60b5b0a2e8035bb63f5b7b7f2c9d2eac2a113318bb756ffac7a56cb5d58008792020b38ac2ea8bea7fafeead6836761bcb7b6bcbdf2a52d8f1ebeba3a3a742280d3e7335beea6fa6461f5c0eae2a11331a377573fdaf2c8e8c707cf0270ca1458c0617761f54fabefaece1d3c0bf3f858f5e72d65d6cbabbf68b96b0be0b0b97d3794550fdcca1d864ec4ecaeac7eb2fae9ea23836701d8370a2c60537c66cb6385df529d3d7816e67455f59a9632eb93795d75edc8a1005aee24be7bcb99559f1e8f01b25b1fabfe7df5afabcb07cf02b0ef1458c0a6b94bf5b41459ecced1eacdd55f566facde54bd61ebe70707ce056c9e5b5477abeed90d65d53db77e5e34702e0ebfa3d57fae7ea4faebc1b3009c360a2c6053ddb1fa81ea29d5398367e170fa404bb1f596eaedd5659f966b864d06cce8fc96978b5c5cddb5a5acba47f5392d85d5edc78dc6863a56fd7af5432d5fbc006c340516b0e9ee50fd9fd53fca1959ecaff7b41459ef6a3928f7fd5b794ff5beaddfdf5b5d316a40e094ddb6a578baa81bcaa913fd7edea019599fa3d5af563fde72d730c02a28b080b5b87df5d4ea3b729e0807ebe32d25d7bb5a0aafbfd9faf9d6eaaf5aeeee720e17cce1bcea71d5e3ab47b73cf607b3b8b6e551c19fc88b4980155260016b737ecbf958df57dd79f02c50cb2320efac5e59bdac7a69cb1b143f3646e5629d0000062a4944415472285899b3ab6faf9edef2521098c9d5d5cf553fd5f2650800002b7256f5752da5c1f52293e59aeab9d5dfabce08389dee595ddaf87ff7229f9e2bab7f55dd2e0000a81e51fd46cb9912a337ab229f9ed7577f37e074785c7555e3ff9d8b7c6adedb7237e02d030080e3b84bf5afab0f367ef32af2e9f9a9dc8d05fbe9912d670a8dfeb72df2c9bca2fa07d5cd0300805d38affab63c5222f3e51702f6c37d5a1ecf1afd6f5ae4baead9d54303008053f090eabf541f6dfc2657e4fa9637690227efcc963b5d46ff5b9675e703d58f559f1d0000eca3db54df5dbdb6f19b5e5977aec881be702afe49e3ff1dcb7af39a96bbbccf0d00004eb38754ffb9fa70e337c2b2cefc48c0c93837e71ccac1e7da96c7041f190027edc8e801000eb10baa2756df5c7d71fea672702eabee5a1d1b3d081c32ffb0e50b083808af6f39bbf0bf56ef1b3c0bc0a1e7c316c0feb85bf5e4ea1bb67e87d3edfed5ab470f0187cc4baa2f1c3d041bed23d5af55ffa97ae9e05900368a020b607f1d6979c4f049d5ff565d34761c36d853ab7f3f7a0838446ed37270f619a3076123bdb4e56eab67b7945800ec33177080fd757df5c7d5775677a8bea2faa5ea43238762237ddee801e0907970f6beecaff755ffb6ba77f545d533535e019c36678d1e0060831dad7e772be7565f597dedd6cff307cec566b8f3e801e09079c8e801d8085756cf69794cf005d527c68e03b01e0a2c8083f1b1ea37b6726ef5e52d8f183eb6bae5c0b938bcee387a003864ee347a000eadababdfae9ed5f2a5d4b563c70158270516c0c1fb58f5dcaddcbc7a54cbdb0c1f9333b3d8bd0b460f0087cced460fc0a1726df57bd57f6b29afae1e3b0e000e710798c719d517b414598f6979cb9cbfd39cc8e5f9400e7bf1b2ea41a387606a1faf5ed4f278e0735a1e170460123e1801ccebb35acecb7a4ccb5d5acecde2535d515d387a0838445e597dfee82198ce152d8f053e6febe75563c701e04414580087c339d597545fd55268dd75ec384ce0b21ce40e7bf107d5c3470fc114de56fd56cba3817fd8f2d2150026a7c002389ceed57200fca35b5edd7dced87118e075d57d470f0187c8f3aaaf1e3d04431cabfebce5ff077ebbba74ec38009c0c87b8031c4e6fd8ca4fb694575fd47267c1235aced13a7bd8641c940f8c1e000e99778e1e8003f5beea055bf99fd5bbc78e03c0a95260011c7ed7542fdc4a2d67653da41b0aad07e6effd26facbd103c021f3cad103705a5d5dbdb8a5b0fafdea35d5f5432702605ff94003b079aeae9ebf95aa5b545fdc52683db2e5ed86670e998cfda4c082bd79c5e801d85747ab3feb86c2eaa52d6f1104604339030b607d6edd7287d683aa07b73c7278aba11371321e50bd6af41070c8bcb9bafbe8213829d7b5dc45f7d2ea455bf1c6408015516001704675494b99f5a0addc377769cdec6faa3be6f118d8ab1faefec5e821d8950fb694552fa9fea8e510f68f0d9d0880a11458001ccf052d67673db81b8aad8b874ec4a7fa89ea69a3878043e8a296bbb0dc753a97eb5b1e8b7e69f5275b3fff32253d009f428105c06eddb9e5b1b5fb57f7dbfa79975c4b0edac75bfeefee8d5a7072bebfe50dae8cf3969647a0ff62ebe79fe6cdaa00ecc0870e004ec52dabcfdbcadfdacafdaaf3460eb5e17eb8fa91d143c0217666f53faa478f1e64058eb6dc49f5aa96f3abfe622b578e1c0a80c3498105c07e3ba3e590e44f165af76d3963eb73aa9b0d9c6b13fc49cbdb248f0e9e030ebb5b552f6cb9ab94fdf19eeaf5d59b5a4aaa5754afadae193914009b438105c04139abba6b75cfea73b77e7ef2f73b0c9cebb0f8f3ea5179eb16ec970baa67558f193dc821725dcbe37f6fa8ded87277d527e36f1300a795020b8019dca2a5ccba474ba1758f9633b7ee5c7d664bf9b566cfac9e5a7d74f420b0618e544f697931c26d06cf328b8f556fab2edbca5b5beeaa7afdd6efd78d1b0d803553600130bbb35aeed0ba534ba1f5d95bbf7ff23fdfa9e52cae4df492ea07ab170d9e0336ddadabefa8beaba534df6497774339f5f6ea1d5bb96cebe7fb874d0600db506001b0096edd52725d545d5cdd7eebf7cfd8ca455bffddc52d8f0dcdea587569f5fcea97b77e070ece99d5c3aabf573da2ba77cbb97e333bd6523abdbf7a5fcb59549ffccfeffe94dfdfb3f5bfbb93138043e9ff07b683750cffa8c0a10000000049454e44ae426082, 'zd', 'asd', 'asd', 2, 'asdasdasd@yahoo.com', 'asd', '2018-04-09');

-- --------------------------------------------------------

--
-- Table structure for table `user_level`
--

CREATE TABLE `user_level` (
  `level_ID` int(11) NOT NULL,
  `level_Name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_level`
--

INSERT INTO `user_level` (`level_ID`, `level_Name`) VALUES
(1, 'General Manager/President'),
(2, 'Corporate Treasurer/Secretary'),
(3, 'Foreman/Head Engineer'),
(4, 'Accounting Staff/General Admin'),
(5, 'Inventory Personnel '),
(6, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `user_log`
--

CREATE TABLE `user_log` (
  `log_ID` int(11) UNSIGNED NOT NULL,
  `log_Type` tinyint(4) DEFAULT NULL,
  `log_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_log`
--

INSERT INTO `user_log` (`log_ID`, `log_Type`, `log_Date`, `user_ID`) VALUES
(1, NULL, '2018-03-26 17:02:06', 2),
(2, 0, '2018-03-26 17:02:15', 2),
(5, NULL, '2018-03-27 18:22:54', 2),
(6, 0, '2018-03-27 18:22:58', 2),
(9, NULL, '2018-03-27 18:25:33', 1),
(10, 0, '2018-03-27 18:25:35', 1),
(15, NULL, '2018-04-10 19:27:54', 2),
(16, 0, '2018-04-10 19:27:57', 2),
(24, 0, '2018-04-10 19:35:53', 11),
(26, 0, '2018-04-10 19:36:59', 11),
(27, NULL, '2018-04-10 19:37:02', 11),
(28, 0, '2018-04-10 20:10:57', 11),
(29, NULL, '2018-04-10 20:11:09', 5),
(30, 0, '2018-04-10 20:49:11', 5),
(31, NULL, '2018-04-10 20:49:14', 11),
(32, 0, '2018-04-10 21:23:18', 11),
(33, NULL, '2018-04-10 21:24:22', 14),
(34, 0, '2018-04-10 21:24:26', 14);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `boq_detail`
--
ALTER TABLE `boq_detail`
  ADD PRIMARY KEY (`boqdet_ID`);

--
-- Indexes for table `boq_material_list`
--
ALTER TABLE `boq_material_list`
  ADD PRIMARY KEY (`boq_ID`),
  ADD KEY `unit_ID` (`unit_ID`);

--
-- Indexes for table `cycon_info`
--
ALTER TABLE `cycon_info`
  ADD PRIMARY KEY (`cinfo_ID`);

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`equip_ID`),
  ADD KEY `unit_ID` (`unit_ID`);

--
-- Indexes for table `equipment_added`
--
ALTER TABLE `equipment_added`
  ADD PRIMARY KEY (`eadd_ID`);

--
-- Indexes for table `equipment_return`
--
ALTER TABLE `equipment_return`
  ADD PRIMARY KEY (`return_ID`);

--
-- Indexes for table `equipment_usage`
--
ALTER TABLE `equipment_usage`
  ADD PRIMARY KEY (`usage_ID`),
  ADD KEY `proj_ID` (`proj_ID`),
  ADD KEY `equip_ID` (`equip_ID`);

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`gender_ID`);

--
-- Indexes for table `payment_term`
--
ALTER TABLE `payment_term`
  ADD PRIMARY KEY (`term_ID`);

--
-- Indexes for table `project_milestone`
--
ALTER TABLE `project_milestone`
  ADD PRIMARY KEY (`mstone_ID`),
  ADD KEY `proj_ID` (`proj_ID`) USING BTREE;

--
-- Indexes for table `project_monitoring`
--
ALTER TABLE `project_monitoring`
  ADD PRIMARY KEY (`proj_ID`),
  ADD KEY `status_ID` (`status_ID`);

--
-- Indexes for table `purchase_order`
--
ALTER TABLE `purchase_order`
  ADD PRIMARY KEY (`po_ID`),
  ADD KEY `proj_ID` (`proj_ID`),
  ADD KEY `status_ID` (`status_ID`);

--
-- Indexes for table `purchase_transaction`
--
ALTER TABLE `purchase_transaction`
  ADD PRIMARY KEY (`pt_ID`),
  ADD KEY `po_ID` (`po_ID`),
  ADD KEY `term_ID` (`term_ID`),
  ADD KEY `status_ID` (`status_ID`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_ID`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`unit_ID`),
  ADD UNIQUE KEY `unit_Name` (`unit_Name`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`user_ID`),
  ADD KEY `level_ID` (`level_ID`);

--
-- Indexes for table `user_detail`
--
ALTER TABLE `user_detail`
  ADD PRIMARY KEY (`detail_ID`),
  ADD KEY `user_ID` (`user_ID`),
  ADD KEY `gender_ID` (`gender_ID`);

--
-- Indexes for table `user_level`
--
ALTER TABLE `user_level`
  ADD PRIMARY KEY (`level_ID`);

--
-- Indexes for table `user_log`
--
ALTER TABLE `user_log`
  ADD PRIMARY KEY (`log_ID`),
  ADD KEY `user_ID` (`user_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `boq_detail`
--
ALTER TABLE `boq_detail`
  MODIFY `boqdet_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `boq_material_list`
--
ALTER TABLE `boq_material_list`
  MODIFY `boq_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `cycon_info`
--
ALTER TABLE `cycon_info`
  MODIFY `cinfo_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `equipment`
--
ALTER TABLE `equipment`
  MODIFY `equip_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `equipment_added`
--
ALTER TABLE `equipment_added`
  MODIFY `eadd_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `equipment_return`
--
ALTER TABLE `equipment_return`
  MODIFY `return_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `equipment_usage`
--
ALTER TABLE `equipment_usage`
  MODIFY `usage_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `gender`
--
ALTER TABLE `gender`
  MODIFY `gender_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment_term`
--
ALTER TABLE `payment_term`
  MODIFY `term_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `project_milestone`
--
ALTER TABLE `project_milestone`
  MODIFY `mstone_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `project_monitoring`
--
ALTER TABLE `project_monitoring`
  MODIFY `proj_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `purchase_order`
--
ALTER TABLE `purchase_order`
  MODIFY `po_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `purchase_transaction`
--
ALTER TABLE `purchase_transaction`
  MODIFY `pt_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `status_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `unit_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `user_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_detail`
--
ALTER TABLE `user_detail`
  MODIFY `detail_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_level`
--
ALTER TABLE `user_level`
  MODIFY `level_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_log`
--
ALTER TABLE `user_log`
  MODIFY `log_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `boq_material_list`
--
ALTER TABLE `boq_material_list`
  ADD CONSTRAINT `boq_material_list_ibfk_1` FOREIGN KEY (`unit_ID`) REFERENCES `unit` (`unit_ID`);

--
-- Constraints for table `equipment`
--
ALTER TABLE `equipment`
  ADD CONSTRAINT `equipment_ibfk_1` FOREIGN KEY (`unit_ID`) REFERENCES `unit` (`unit_ID`);

--
-- Constraints for table `equipment_usage`
--
ALTER TABLE `equipment_usage`
  ADD CONSTRAINT `equipment_usage_ibfk_1` FOREIGN KEY (`proj_ID`) REFERENCES `project_monitoring` (`proj_ID`),
  ADD CONSTRAINT `equipment_usage_ibfk_2` FOREIGN KEY (`equip_ID`) REFERENCES `equipment` (`equip_ID`);

--
-- Constraints for table `project_milestone`
--
ALTER TABLE `project_milestone`
  ADD CONSTRAINT `project_milestone_ibfk_1` FOREIGN KEY (`proj_ID`) REFERENCES `project_monitoring` (`proj_ID`);

--
-- Constraints for table `project_monitoring`
--
ALTER TABLE `project_monitoring`
  ADD CONSTRAINT `project_monitoring_ibfk_1` FOREIGN KEY (`status_ID`) REFERENCES `status` (`status_ID`);

--
-- Constraints for table `purchase_order`
--
ALTER TABLE `purchase_order`
  ADD CONSTRAINT `purchase_order_ibfk_1` FOREIGN KEY (`proj_ID`) REFERENCES `project_monitoring` (`proj_ID`),
  ADD CONSTRAINT `purchase_order_ibfk_2` FOREIGN KEY (`status_ID`) REFERENCES `status` (`status_ID`);

--
-- Constraints for table `purchase_transaction`
--
ALTER TABLE `purchase_transaction`
  ADD CONSTRAINT `purchase_transaction_ibfk_1` FOREIGN KEY (`po_ID`) REFERENCES `purchase_order` (`po_ID`),
  ADD CONSTRAINT `purchase_transaction_ibfk_2` FOREIGN KEY (`term_ID`) REFERENCES `payment_term` (`term_ID`),
  ADD CONSTRAINT `purchase_transaction_ibfk_3` FOREIGN KEY (`status_ID`) REFERENCES `status` (`status_ID`);

--
-- Constraints for table `user_account`
--
ALTER TABLE `user_account`
  ADD CONSTRAINT `user_account_ibfk_1` FOREIGN KEY (`level_ID`) REFERENCES `user_level` (`level_ID`);

--
-- Constraints for table `user_detail`
--
ALTER TABLE `user_detail`
  ADD CONSTRAINT `user_detail_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `user_account` (`user_ID`),
  ADD CONSTRAINT `user_detail_ibfk_2` FOREIGN KEY (`gender_ID`) REFERENCES `gender` (`gender_ID`);

--
-- Constraints for table `user_log`
--
ALTER TABLE `user_log`
  ADD CONSTRAINT `user_log_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `user_account` (`user_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
