-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 22, 2020 at 10:29 PM
-- Server version: 5.6.46-cll-lve
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tms`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_id` int(11) NOT NULL,
  `company_name` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `company_name`) VALUES
(1, 'Central Negros Power Reliability Inc. (CENPRI)'),
(2, 'Energreen Power Inter-Island Corp. (EPIIC)'),
(3, 'PROGEN Deiseltech'),
(4, 'Mindoro Harvest Energy Corp. (MHECO)'),
(5, 'Calapan Power Generation Corp. (CPGC)'),
(6, 'Sta. Isabel Power Corp. (SIPC)'),
(7, 'Negros Harvest Energy Corp. (NHECO)'),
(8, 'Yooreka');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` int(11) NOT NULL,
  `department_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `department_name`) VALUES
(1, 'Accounting Department'),
(2, 'IT Site Department'),
(3, 'Human Resource Department'),
(4, 'Finance Department'),
(5, 'Research and Development'),
(6, 'Special Projects'),
(7, 'Administrative Department'),
(8, 'Yooreka'),
(9, 'Operations Department'),
(10, 'CENPRI Warehouse Department'),
(11, 'PROGEN Warehouse');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `employee_id` int(11) NOT NULL,
  `employee_name` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `contact_no` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employee_id`, `employee_name`, `email`, `contact_no`) VALUES
(15, 'Merry Michelle Dato', 'merrydioso.energreen@gmail.com', '0920 520 5418'),
(16, 'Mila Arana', 'mba_energreen2013@yahoo.com', '0917 715 1951'),
(17, 'Rose Brennette Gaudite', 'rbrenettegaudite.cenpri@gmail.com', '0919 348 9566'),
(18, 'Alma Lucerna', 'almalucerna.energreen@gmail.com', '0939 725 0763'),
(19, 'Alona Arroyo', 'alarroyo.cenpri@gmail.com', '0919 372 5319'),
(20, 'Rashelle Joy Bating', 'rjoy.cenpri@gmail.com', '0909 991 1466'),
(21, 'Crizeal Precious Claire Hilado', 'crizeal.cenpri@gmail.com', '0975 444 4800'),
(22, 'Melinda Aquino', 'melaquino.cenpri@gmail.com', '0949 300 5813');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `location_id` int(11) NOT NULL,
  `location_name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`location_id`, `location_name`) VALUES
(2, 'Bacolod'),
(3, 'Calapan'),
(4, 'Manila');

-- --------------------------------------------------------

--
-- Table structure for table `notification_logs`
--

CREATE TABLE `notification_logs` (
  `notification_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL DEFAULT '0',
  `recipient` varchar(100) DEFAULT NULL,
  `role` varchar(100) DEFAULT NULL,
  `notification_message` text,
  `project_id` int(11) NOT NULL DEFAULT '0',
  `pd_id` int(11) DEFAULT '0',
  `notification_date` varchar(20) DEFAULT NULL,
  `open` int(11) NOT NULL DEFAULT '0',
  `open_date` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `project_details`
--

CREATE TABLE `project_details` (
  `pd_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL DEFAULT '0',
  `remarks` text,
  `status_percentage` decimal(10,2) NOT NULL DEFAULT '0.00',
  `update_date` varchar(20) DEFAULT NULL,
  `followup_date` varchar(20) DEFAULT NULL,
  `updated_by` varchar(30) DEFAULT NULL,
  `create_date` varchar(20) DEFAULT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `project_extension`
--

CREATE TABLE `project_extension` (
  `extension_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL DEFAULT '0',
  `pd_id` int(11) NOT NULL DEFAULT '0',
  `extension_date` varchar(20) DEFAULT NULL,
  `extension_reason` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `project_head`
--

CREATE TABLE `project_head` (
  `project_id` int(11) NOT NULL,
  `start_date` varchar(20) DEFAULT NULL,
  `completion_date` varchar(20) DEFAULT NULL,
  `project_title` varchar(255) DEFAULT NULL,
  `project_description` text,
  `priority_no` int(11) NOT NULL DEFAULT '0' COMMENT '1 = top prio and so on',
  `location_id` int(11) NOT NULL DEFAULT '0',
  `company_id` int(11) NOT NULL DEFAULT '0',
  `department_id` int(11) NOT NULL DEFAULT '0',
  `employee` varchar(100) DEFAULT NULL,
  `task_no` varchar(50) DEFAULT NULL,
  `status` int(11) DEFAULT '0' COMMENT '0=pending, 1=done, 2=cancelled',
  `cancel_date` varchar(20) DEFAULT NULL,
  `cancel_by` int(11) NOT NULL DEFAULT '0',
  `cancel_reason` text,
  `cancel_timestamp` varchar(20) DEFAULT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `create_date` varchar(20) DEFAULT NULL,
  `monitor_person` int(11) NOT NULL DEFAULT '0',
  `from` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reminders`
--

CREATE TABLE `reminders` (
  `reminder_id` int(11) NOT NULL,
  `notes` text,
  `employee_id` varchar(50) DEFAULT NULL,
  `due_date` varchar(20) DEFAULT NULL,
  `done_date` varchar(20) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '0= active, 1= cancelled',
  `cancel_date` varchar(20) DEFAULT NULL,
  `cancel_reason` text,
  `added_by` int(11) DEFAULT '0',
  `timestamp` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `location_id` int(11) NOT NULL DEFAULT '0',
  `employee_id` int(11) NOT NULL DEFAULT '0',
  `company_id` int(11) NOT NULL DEFAULT '0',
  `department_id` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  `email` varchar(100) DEFAULT NULL,
  `usertype` int(11) NOT NULL DEFAULT '0' COMMENT '0=sirdavid, 1=admin, 2=monitoring person, 3=employee'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `fullname`, `location_id`, `employee_id`, `company_id`, `department_id`, `status`, `email`, `usertype`) VALUES
(1, 'admin', 'faa40f460e10cad68ced040e18fa416c', 'Admin', 0, 0, 0, 0, 1, NULL, 1),
(2, 'michelle', 'bd63ede127f5c07b74c982f2f546c74d', NULL, 0, 15, 2, 6, 1, NULL, 1),
(3, 'mila', '42a75d589ef77471e1bc6d5fbb34c51a', NULL, 2, 16, 1, 7, 1, NULL, 2),
(4, 'bren', 'c5da1907db66abc7c8cb7662f68a5575', NULL, 0, 17, 8, 8, 1, NULL, 3),
(5, 'alma', 'd740a293facd72a64beafdb3aa5d7e93', NULL, 0, 18, 2, 5, 1, NULL, 3),
(6, 'alona', '7a0e0350daf946231275a7c35b30b291', NULL, 0, 19, 1, 9, 1, NULL, 3),
(7, 'joy', '4480105c2390c717c4c5c8aa9de62592', NULL, 0, 20, 1, 6, 1, NULL, 3),
(8, 'crizeal', 'd224731b5ad148e9a9ce79de707e582c', NULL, 0, 21, 2, 5, 1, NULL, 3),
(9, 'rct', '030dcad97fe24efebf8becb39c20dca0\r\n', 'David Tan', 0, 0, 0, 0, 1, 'energreenpower@yahoo.com', 0),
(10, 'mel', '295baf52ebbe7c5ec08e9b185757ff0d', NULL, 0, 22, 3, 11, 1, NULL, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `notification_logs`
--
ALTER TABLE `notification_logs`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `project_details`
--
ALTER TABLE `project_details`
  ADD PRIMARY KEY (`pd_id`);

--
-- Indexes for table `project_extension`
--
ALTER TABLE `project_extension`
  ADD PRIMARY KEY (`extension_id`);

--
-- Indexes for table `project_head`
--
ALTER TABLE `project_head`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `reminders`
--
ALTER TABLE `reminders`
  ADD PRIMARY KEY (`reminder_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `notification_logs`
--
ALTER TABLE `notification_logs`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_details`
--
ALTER TABLE `project_details`
  MODIFY `pd_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_extension`
--
ALTER TABLE `project_extension`
  MODIFY `extension_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_head`
--
ALTER TABLE `project_head`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reminders`
--
ALTER TABLE `reminders`
  MODIFY `reminder_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
