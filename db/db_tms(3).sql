-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2020 at 04:29 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_tms`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
`company_id` int(11) NOT NULL,
  `company_name` varchar(150) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

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
(8, 'Test Company');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
`department_id` int(11) NOT NULL,
  `department_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `department_name`) VALUES
(1, 'Accounting Department'),
(2, 'IT Department'),
(3, 'Human Resource Department'),
(4, 'Finance Department'),
(5, 'Research and Development'),
(6, 'Special Projects'),
(7, 'Admin'),
(8, 'test department');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE IF NOT EXISTS `employees` (
`employee_id` int(11) NOT NULL,
  `employee_name` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `contact_no` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employee_id`, `employee_name`, `email`, `contact_no`) VALUES
(1, 'Jonah Faye Benares', 'sample@gmail.com', ''),
(2, 'Hennelen Tanan', 'hentanan.cenpri@gmail.com', NULL),
(3, 'Mila Arana', 'sample@gmail.com', ''),
(6, 'Alma Lucerna', 'almalucerna.energreen@gmail.com', NULL),
(7, 'Stephine Severino', 'sample@gmail.com', ''),
(8, 'Jason Flor', 'sample@gmail.com', ''),
(9, 'Merry Michelle Dato', 'merrydioso.energreen@gmail.com', NULL),
(10, 'David Tan', NULL, NULL),
(11, 'Rose Brennette Gaudite', 'rbrenettegaudite.cenpri@gmail.com', NULL),
(12, 'Crizeal Precious Claire Hilado', 'crizeal.cenpri@gmail.com', NULL),
(13, 'Alona Arroyo', 'alarroyo.cenpri@gmail.com', ''),
(14, 'Rashelle Joy Bating', 'rjoy.cenpri@gmail.com', ''),
(15, 'Jordan Yap', 'jordan@gmail.com', '09000000000');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
`location_id` int(11) NOT NULL,
  `location_name` varchar(150) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`location_id`, `location_name`) VALUES
(2, 'Bacolod'),
(3, 'Calapan'),
(4, 'Manila'),
(5, 'test location');

-- --------------------------------------------------------

--
-- Table structure for table `notification_logs`
--

CREATE TABLE IF NOT EXISTS `notification_logs` (
`notification_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL DEFAULT '0',
  `recipient` varchar(20) DEFAULT NULL,
  `role` varchar(100) DEFAULT NULL,
  `notification_message` text,
  `project_id` int(11) NOT NULL DEFAULT '0',
  `pd_id` int(11) DEFAULT '0',
  `notification_date` varchar(20) DEFAULT NULL,
  `open` int(11) NOT NULL DEFAULT '0',
  `open_date` varchar(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification_logs`
--

INSERT INTO `notification_logs` (`notification_id`, `employee_id`, `recipient`, `role`, `notification_message`, `project_id`, `pd_id`, `notification_date`, `open`, `open_date`) VALUES
(1, 9, '8,', 'Accountable Person', 'A new project titled QR Scanner has been assigned to you.', 1, 0, '2020-08-13 08:35:01', 0, NULL),
(2, 9, '8,7,', 'Accountable Person', 'A new project titled QR Scanner has been assigned to you.', 1, 0, '2020-08-13 08:35:01', 0, NULL),
(3, 9, '8,7,2,', 'Accountable Person', 'A new project titled QR Scanner has been assigned to you.', 1, 0, '2020-08-13 08:35:01', 0, NULL),
(4, 9, '1', 'Monitor Person/Task', 'A new project titled QR Scanner has been added for monitoring.', 1, 0, '2020-08-13 08:35:01', 0, NULL),
(5, 9, '3', 'Monitor Person/Location', 'A new project titled QR Scanner has been added for monitoring.', 1, 0, '2020-08-13 08:35:01', 0, NULL),
(6, 9, '10', 'Admin', 'A new project titled QR Scanner has been added.', 1, 0, '2020-08-13 08:35:01', 0, NULL),
(7, 9, '8', 'Accountable Person', 'Added an update in project QR Scanner', 1, 1, '2020-08-13 08:49:32', 0, NULL),
(8, 9, '7', 'Accountable Person', 'Added an update in project QR Scanner', 1, 1, '2020-08-13 08:49:32', 0, NULL),
(9, 9, '2', 'Accountable Person', 'Added an update in project QR Scanner', 1, 1, '2020-08-13 08:49:32', 0, NULL),
(10, 9, '1', 'Monitor Person/Task', 'Added an update in project QR Scanner', 1, 1, '2020-08-13 08:49:32', 0, NULL),
(11, 9, '3', 'Monitor Person/Location', 'Added an update in project QR Scanner', 1, 1, '2020-08-13 08:49:32', 0, NULL),
(12, 9, '9', 'Admin', 'Added an update in project QR Scanner', 1, 1, '2020-08-13 08:49:32', 0, NULL),
(13, 9, '10', 'Admin', 'Added an update in project QR Scanner', 1, 1, '2020-08-13 08:49:32', 0, NULL),
(14, 9, '11,', 'Accountable Person', 'A new project titled Construction of DG 6 has been assigned to you.', 2, 0, '2020-08-13 11:30:17', 0, NULL),
(15, 9, '11,12,', 'Accountable Person', 'A new project titled Construction of DG 6 has been assigned to you.', 2, 0, '2020-08-13 11:30:17', 0, NULL),
(16, 9, '6', 'Monitor Person/Task', 'A new project titled Construction of DG 6 has been added for monitoring.', 2, 0, '2020-08-13 11:30:17', 0, NULL),
(17, 9, NULL, 'Monitor Person/Location', 'A new project titled Construction of DG 6 has been added for monitoring.', 2, 0, '2020-08-13 11:30:17', 0, NULL),
(18, 9, '10', 'Admin', 'A new project titled Construction of DG 6 has been added.', 2, 0, '2020-08-13 11:30:17', 0, NULL),
(19, 9, '12,', 'Accountable Person', 'A new project titled Quarantine Facility has been assigned to you.', 3, 0, '2020-08-13 11:31:34', 0, NULL),
(20, 9, '12,13,', 'Accountable Person', 'A new project titled Quarantine Facility has been assigned to you.', 3, 0, '2020-08-13 11:31:34', 0, NULL),
(21, 9, '13', 'Monitor Person/Task', 'A new project titled Quarantine Facility has been added for monitoring.', 3, 0, '2020-08-13 11:31:34', 0, NULL),
(22, 9, NULL, 'Monitor Person/Location', 'A new project titled Quarantine Facility has been added for monitoring.', 3, 0, '2020-08-13 11:31:34', 0, NULL),
(23, 9, '10', 'Admin', 'A new project titled Quarantine Facility has been added.', 3, 0, '2020-08-13 11:31:34', 0, NULL),
(24, 9, '8,', 'Accountable Person', 'A new project titled Contact Tracing System has been assigned to you.', 4, 0, '2020-08-13 11:33:27', 0, NULL),
(25, 9, '8,7,', 'Accountable Person', 'A new project titled Contact Tracing System has been assigned to you.', 4, 0, '2020-08-13 11:33:27', 0, NULL),
(26, 9, '2', 'Monitor Person/Task', 'A new project titled Contact Tracing System has been added for monitoring.', 4, 0, '2020-08-13 11:33:27', 0, NULL),
(27, 9, '3', 'Monitor Person/Location', 'A new project titled Contact Tracing System has been added for monitoring.', 4, 0, '2020-08-13 11:33:27', 0, NULL),
(28, 9, '10', 'Admin', 'A new project titled Contact Tracing System has been added.', 4, 0, '2020-08-13 11:33:27', 0, NULL),
(29, 9, '15,', 'Accountable Person', 'A new project titled Inventory System Enhancement has been assigned to you.', 5, 0, '2020-08-13 11:36:57', 0, NULL),
(30, 9, '15,1,', 'Accountable Person', 'A new project titled Inventory System Enhancement has been assigned to you.', 5, 0, '2020-08-13 11:36:57', 0, NULL),
(31, 9, '3', 'Monitor Person/Task', 'A new project titled Inventory System Enhancement has been added for monitoring.', 5, 0, '2020-08-13 11:36:57', 0, NULL),
(32, 9, '10', 'Admin', 'A new project titled Inventory System Enhancement has been added.', 5, 0, '2020-08-13 11:36:57', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `project_details`
--

CREATE TABLE IF NOT EXISTS `project_details` (
`pd_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL DEFAULT '0',
  `remarks` text,
  `status_percentage` decimal(10,2) NOT NULL DEFAULT '0.00',
  `update_date` varchar(20) DEFAULT NULL,
  `followup_date` varchar(20) DEFAULT NULL,
  `updated_by` varchar(30) DEFAULT NULL,
  `create_date` varchar(20) DEFAULT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_details`
--

INSERT INTO `project_details` (`pd_id`, `project_id`, `remarks`, `status_percentage`, `update_date`, `followup_date`, `updated_by`, `create_date`, `user_id`) VALUES
(1, 1, 'add follow up date', '0.00', '2020-08-13 08:49', '2020-08-14', '0', '2020-08-13 08:49:32', 1),
(2, 3, 'done task', '100.00', '2020-08-13 11:31', '1970-01-01', '13,12', '2020-08-13 11:32:11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `project_extension`
--

CREATE TABLE IF NOT EXISTS `project_extension` (
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

CREATE TABLE IF NOT EXISTS `project_head` (
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_head`
--

INSERT INTO `project_head` (`project_id`, `start_date`, `completion_date`, `project_title`, `project_description`, `priority_no`, `location_id`, `company_id`, `department_id`, `employee`, `task_no`, `status`, `cancel_date`, `cancel_by`, `cancel_reason`, `cancel_timestamp`, `user_id`, `create_date`, `monitor_person`, `from`) VALUES
(1, '2020-08-13', '2020-08-19', 'QR Scanner', 'Replace Biometrics', 1, 2, 1, 2, '8,7,2', '001', 0, NULL, 0, NULL, NULL, 1, '2020-08-13 08:35:01', 1, 'Emailed'),
(2, '2020-08-13', '2020-08-31', 'Construction of DG 6', 'Construction of DG 6 @ calapan', 2, 3, 5, 7, '11,12', '002', 0, NULL, 0, NULL, NULL, 1, '2020-08-13 11:30:17', 6, 'Memo'),
(3, '2020-08-13', '2020-08-15', 'Quarantine Facility', 'Quarantine Facility for core employees', 3, 4, 2, 3, '12,13', '003', 1, NULL, 0, NULL, NULL, 1, '2020-08-13 11:31:34', 13, 'Emailed'),
(4, '2020-08-13', '2020-08-13', 'Contact Tracing System', 'Contact Tracing System for CENPRI Employees', 1, 2, 1, 7, '8,7', '004', 0, NULL, 0, NULL, NULL, 1, '2020-08-13 11:33:27', 2, 'Emailed'),
(5, '2020-08-13', '2020-08-17', 'Inventory System Enhancement', 'Inventory System Enhancement Description', 1, 2, 1, 5, '15,1', '005', 2, '2020-08-13', 1, 'Not needed anymore', '2020-08-13 11:37:30', 1, '2020-08-13 11:36:57', 3, 'Meeting');

-- --------------------------------------------------------

--
-- Table structure for table `reminders`
--

CREATE TABLE IF NOT EXISTS `reminders` (
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reminders`
--

INSERT INTO `reminders` (`reminder_id`, `notes`, `employee_id`, `due_date`, `done_date`, `status`, `cancel_date`, `cancel_reason`, `added_by`, `timestamp`) VALUES
(1, 'sample notes', '2', '2020-08-14', NULL, 0, NULL, NULL, 9, '2020-08-14 10:10:59'),
(2, 'sample notes', '2', '2020-08-14', NULL, 0, NULL, NULL, 9, '2020-08-14 10:11:17'),
(3, 'sample notes', '2', '2020-08-14', NULL, 0, NULL, NULL, 9, '2020-08-14 10:11:27'),
(4, 'sample notes', '2', '2020-08-14', NULL, 0, NULL, NULL, 9, '2020-08-14 10:11:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
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
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `fullname`, `location_id`, `employee_id`, `company_id`, `department_id`, `status`, `email`, `usertype`) VALUES
(1, 'admin', 'c93ccd78b2076528346216b3b2f701e6', 'admin', 0, 9, 1, 1, 1, NULL, 1),
(2, 'hen', '827ccb0eea8a706c4c34a16891f84e7b', NULL, 0, 2, 2, 3, 1, '', 3),
(6, 'jonah', '827ccb0eea8a706c4c34a16891f84e7b ', NULL, 0, 1, 3, 2, 1, 'jonahbenares.cenpri@gmail.com', 3),
(8, 'rct', '2650801e79db80f9dac78d532e718415', 'David Tan', 0, 10, 0, 0, 1, NULL, 0),
(11, 'jason', '827ccb0eea8a706c4c34a16891f84e7b', NULL, 0, 8, 1, 2, 1, 'jasonflor.cenpri@gmail.com', 3),
(12, 'mila', '827ccb0eea8a706c4c34a16891f84e7b', NULL, 2, 3, 1, 4, 1, NULL, 2),
(15, 'tep', '827ccb0eea8a706c4c34a16891f84e7b', NULL, 0, 7, 1, 2, 1, NULL, 3),
(16, 'alma', '827ccb0eea8a706c4c34a16891f84e7b', NULL, 0, 6, 2, 3, 1, NULL, 3),
(17, 'rose', '827ccb0eea8a706c4c34a16891f84e7b', NULL, 0, 11, 1, 1, 1, NULL, 3),
(18, 'crizeal', '827ccb0eea8a706c4c34a16891f84e7b', NULL, 0, 12, 1, 5, 1, NULL, 3),
(19, 'alona', '827ccb0eea8a706c4c34a16891f84e7b', NULL, 0, 13, 1, 7, 1, NULL, 3),
(20, 'joy', '827ccb0eea8a706c4c34a16891f84e7b', NULL, 0, 14, 1, 6, 1, NULL, 3),
(21, 'jordan', '827ccb0eea8a706c4c34a16891f84e7b', NULL, 0, 15, 1, 6, 1, NULL, 3);

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
MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `notification_logs`
--
ALTER TABLE `notification_logs`
MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `project_details`
--
ALTER TABLE `project_details`
MODIFY `pd_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `project_extension`
--
ALTER TABLE `project_extension`
MODIFY `extension_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `project_head`
--
ALTER TABLE `project_head`
MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `reminders`
--
ALTER TABLE `reminders`
MODIFY `reminder_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
