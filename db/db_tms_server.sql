-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 05, 2020 at 06:31 PM
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
(1, 'Central Negros Power Reliability Inc.'),
(2, 'Energreen Power Inter-Island Corp.'),
(3, 'PROGEN Deiseltech'),
(4, 'Mindoro Harvest Energy Corp.');

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
(2, 'IT Department'),
(3, 'Human Resource Department'),
(4, 'Finance Department'),
(5, 'Research and Development');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `employee_id` int(11) NOT NULL,
  `employee_name` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employee_id`, `employee_name`, `email`) VALUES
(1, 'Jonah Faye Benares', 'jonahbenares.cenpri@gmail.com'),
(2, 'Hennelen Tanan', 'hentanan.cenpri@gmail.com'),
(3, 'Mila Arana', 'mba_energreen2013@yahoo.com'),
(6, 'Alma Lucerna', 'almalucerna.energreen@gmail.com'),
(7, 'Stephine Severino', 'stephineseverino.cenpri@gmail.com'),
(8, 'Jason Flor', 'jasonflor.cenpri@gmail.com'),
(9, 'Merry Michelle Dato', 'merrydioso.energreen@gmail.com'),
(10, 'David Tan', NULL),
(11, 'Rose Brennette Gaudite', 'rbrenettegaudite.cenpri@gmail.com'),
(12, 'Crizeal Precious Claire Hilado', 'crizeal.cenpri@gmail.com');

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
  `recipient` int(11) NOT NULL DEFAULT '0',
  `role` varchar(100) DEFAULT NULL,
  `notification_message` text,
  `project_id` int(11) NOT NULL DEFAULT '0',
  `pd_id` int(11) DEFAULT '0',
  `notification_date` varchar(20) DEFAULT NULL,
  `open` int(11) NOT NULL DEFAULT '0',
  `open_date` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification_logs`
--

INSERT INTO `notification_logs` (`notification_id`, `employee_id`, `recipient`, `role`, `notification_message`, `project_id`, `pd_id`, `notification_date`, `open`, `open_date`) VALUES
(1, 9, 6, 'Accountable Person', 'A new project titled Biomass Research: Survey of Rice Mills has been assigned to you.', 1, 0, '2019-12-17 13:59:21', 1, '2019-12-17 13:59:39'),
(2, 9, 3, 'Monitor Person/Task', 'A new project titled Biomass Research: Survey of Rice Mills has been added for monitoring.', 1, 0, '2019-12-17 13:59:21', 0, NULL),
(3, 9, 10, 'Admin', 'A new project titled Biomass Research: Survey of Rice Mills has been added.', 1, 0, '2019-12-17 13:59:21', 0, NULL),
(4, 6, 3, 'Monitor Person/Task', 'Added an update in project Biomass Research: Survey of Rice Mills', 1, 1, '2019-12-17 14:04:43', 0, NULL),
(5, 6, 9, 'Admin', 'Added an update in project Biomass Research: Survey of Rice Mills', 1, 1, '2019-12-17 14:04:43', 1, '2019-12-17 14:32:14'),
(6, 6, 10, 'Admin', 'Added an update in project Biomass Research: Survey of Rice Mills', 1, 1, '2019-12-17 14:04:43', 0, NULL),
(7, 6, 3, 'Monitor Person/Task', 'Added an update in project Biomass Research: Survey of Rice Mills', 1, 2, '2019-12-17 14:12:14', 0, NULL),
(8, 6, 9, 'Admin', 'Added an update in project Biomass Research: Survey of Rice Mills', 1, 2, '2019-12-17 14:12:14', 1, '2019-12-17 14:51:28'),
(9, 6, 10, 'Admin', 'Added an update in project Biomass Research: Survey of Rice Mills', 1, 2, '2019-12-17 14:12:14', 0, NULL),
(10, 9, 12, 'Accountable Person', 'A new project titled Biomass: Contracts and Compliance  has been assigned to you.', 2, 0, '2019-12-17 14:31:48', 0, NULL),
(11, 9, 6, 'Monitor Person/Task', 'A new project titled Biomass: Contracts and Compliance  has been added for monitoring.', 2, 0, '2019-12-17 14:31:48', 1, '2019-12-17 17:03:33'),
(12, 9, 3, 'Monitor Person/Location', 'A new project titled Biomass: Contracts and Compliance  has been added for monitoring.', 2, 0, '2019-12-17 14:31:48', 0, NULL),
(13, 9, 10, 'Admin', 'A new project titled Biomass: Contracts and Compliance  has been added.', 2, 0, '2019-12-17 14:31:48', 0, NULL),
(14, 9, 9, 'Accountable Person', 'A new project titled Biomass: Napier Grass has been assigned to you.', 3, 0, '2019-12-17 14:46:10', 1, '2019-12-17 14:51:30'),
(15, 9, 3, 'Monitor Person/Task', 'A new project titled Biomass: Napier Grass has been added for monitoring.', 3, 0, '2019-12-17 14:46:10', 0, NULL),
(16, 9, 10, 'Admin', 'A new project titled Biomass: Napier Grass has been added.', 3, 0, '2019-12-17 14:46:10', 0, NULL),
(17, 9, 3, 'Monitor Person/Task', 'Added an update in project Biomass: Napier Grass', 3, 3, '2019-12-17 14:50:48', 0, NULL),
(18, 9, 9, 'Admin', 'Added an update in project Biomass: Napier Grass', 3, 3, '2019-12-17 14:50:48', 1, '2019-12-17 15:00:15'),
(19, 9, 10, 'Admin', 'Added an update in project Biomass: Napier Grass', 3, 3, '2019-12-17 14:50:48', 0, NULL),
(20, 9, 6, 'Accountable Person', 'A new project titled Biomass: Solar Energy has been assigned to you.', 4, 0, '2019-12-17 14:53:52', 1, '2019-12-18 16:45:32'),
(21, 9, 3, 'Monitor Person/Task', 'A new project titled Biomass: Solar Energy has been added for monitoring.', 4, 0, '2019-12-17 14:53:52', 0, NULL),
(22, 9, 10, 'Admin', 'A new project titled Biomass: Solar Energy has been added.', 4, 0, '2019-12-17 14:53:52', 0, NULL),
(23, 9, 3, 'Monitor Person/Task', 'Added an update in project Biomass: Napier Grass', 3, 5, '2019-12-17 16:53:05', 0, NULL),
(24, 9, 9, 'Admin', 'Added an update in project Biomass: Napier Grass', 3, 5, '2019-12-17 16:53:05', 0, NULL),
(25, 9, 10, 'Admin', 'Added an update in project Biomass: Napier Grass', 3, 5, '2019-12-17 16:53:05', 0, NULL),
(26, 6, 3, 'Monitor Person/Task', 'Added an update in project Biomass: Solar Energy', 4, 6, '2019-12-23 09:02:40', 0, NULL),
(27, 6, 9, 'Admin', 'Added an update in project Biomass: Solar Energy', 4, 6, '2019-12-23 09:02:40', 0, NULL),
(28, 6, 10, 'Admin', 'Added an update in project Biomass: Solar Energy', 4, 6, '2019-12-23 09:02:40', 0, NULL);

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

--
-- Dumping data for table `project_details`
--

INSERT INTO `project_details` (`pd_id`, `project_id`, `remarks`, `status_percentage`, `update_date`, `followup_date`, `updated_by`, `create_date`, `user_id`) VALUES
(1, 1, '', '10.00', '2019-12-17 14:04', '1970-01-01', '6', '2019-12-17 14:04:43', 16),
(2, 1, '', '10.00', '1970-01-01 03:03', '2020-01-05', '6', '2019-12-17 14:12:14', 16),
(3, 3, '1 Hectare only at Borromeo\'s property acquired by Energreen', '0.00', '2019-12-17 02:49', '2019-12-26', '9', '2019-12-17 14:50:48', 1),
(4, 4, 'Power Plants who applied for FIT (partial report):\r\n1. Negros Biomass Holdings, Inc.\r\n2. South Negros Biopower\r\n3. North Negros Biopower\r\n4. Negros Island Solar Power', '5.00', '2019-12-17 02:55', '2019-12-23', '6', '2019-12-17 14:57:11', 1),
(5, 3, 'As per convo with Mr. Luis Perez, he will harvest napier grass within the week. \r\n\r\nConfirm schedule and arrange service vehicle once the date is confirmed to observe how they harvest the napier grass, take pictures, and request for sample cuttings.', '0.00', '2019-12-17 04:48', '1970-01-01', '9', '2019-12-17 16:53:05', 1),
(6, 4, 'Additional Power Plants\r\n1.	Silay Solar Power, Inc.  \r\n2.	San Carlos Solar Energy Inc. (SACASOL) \r\n3.	Monte Solar Energy Inc. (MonteSol)\r\n', '10.00', '2019-12-23 09:00', '2020-01-07', '6', '2019-12-23 09:02:40', 16);

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

--
-- Dumping data for table `project_head`
--

INSERT INTO `project_head` (`project_id`, `start_date`, `completion_date`, `project_title`, `project_description`, `priority_no`, `location_id`, `company_id`, `department_id`, `employee`, `task_no`, `status`, `cancel_date`, `cancel_by`, `cancel_reason`, `cancel_timestamp`, `user_id`, `create_date`, `monitor_person`, `from`) VALUES
(1, '2019-12-13', '2019-02-28', 'Biomass Research: Survey of Rice Mills', 'Continuation of Rice Mills Survey within 40 km Radius from Plant Site (Purok San Jose, Brgy. Calumangan, Bago City, Neg. Occ.)', 1, 2, 1, 5, '6', '001', 0, NULL, 0, NULL, NULL, 1, '2019-12-17 13:59:21', 3, 'Meeting'),
(2, '2019-12-17', '2020-02-28', 'Biomass: Contracts and Compliance ', 'Plot needed documents for Filing of Biomass Energy Operating Contracts (BEOC)', 1, 2, 1, 5, '12', '002', 0, NULL, 0, NULL, NULL, 1, '2019-12-17 14:31:48', 6, 'Meeting'),
(3, '2019-12-13', '2020-02-28', 'Biomass: Napier Grass', 'Identify Accumulation Yard for Napier Grass', 2, 2, 1, 5, '9', '003', 0, NULL, 0, NULL, NULL, 1, '2019-12-17 14:46:10', 3, 'Meeting'),
(4, '2019-12-13', '2020-02-28', 'Biomass: Solar Energy', 'Collect/Collate Corporate Records of Solar Power Plants who filed FIT', 1, 2, 1, 5, '6', '004', 0, NULL, 0, NULL, NULL, 1, '2019-12-17 14:53:52', 3, 'Meeting');

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
(1, 'admin', 'c93ccd78b2076528346216b3b2f701e6', 'admin', 0, 9, 1, 1, 1, NULL, 1),
(2, 'hen', '827ccb0eea8a706c4c34a16891f84e7b', NULL, 0, 2, 2, 3, 1, '', 3),
(6, 'jonah', '827ccb0eea8a706c4c34a16891f84e7b ', NULL, 0, 1, 3, 2, 1, 'jonahbenares.cenpri@gmail.com', 3),
(8, 'rct', '2650801e79db80f9dac78d532e718415', 'David Tan', 0, 10, 0, 0, 1, NULL, 0),
(11, 'jason', '827ccb0eea8a706c4c34a16891f84e7b', NULL, 0, 8, 1, 2, 1, 'jasonflor.cenpri@gmail.com', 3),
(12, 'mila', '827ccb0eea8a706c4c34a16891f84e7b', NULL, 2, 3, 1, 4, 1, NULL, 2),
(15, 'tep', '827ccb0eea8a706c4c34a16891f84e7b', NULL, 0, 7, 1, 2, 1, NULL, 3),
(16, 'alma', '827ccb0eea8a706c4c34a16891f84e7b', NULL, 0, 6, 2, 3, 1, NULL, 3),
(17, 'rose', '827ccb0eea8a706c4c34a16891f84e7b', NULL, 0, 11, 1, 1, 1, NULL, 3),
(18, 'crizeal', '827ccb0eea8a706c4c34a16891f84e7b', NULL, 0, 12, 1, 5, 1, NULL, 3);

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
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `notification_logs`
--
ALTER TABLE `notification_logs`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `project_details`
--
ALTER TABLE `project_details`
  MODIFY `pd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `project_extension`
--
ALTER TABLE `project_extension`
  MODIFY `extension_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_head`
--
ALTER TABLE `project_head`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reminders`
--
ALTER TABLE `reminders`
  MODIFY `reminder_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
