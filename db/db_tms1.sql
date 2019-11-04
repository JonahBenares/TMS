-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2019 at 08:03 AM
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

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

CREATE TABLE IF NOT EXISTS `department` (
`department_id` int(11) NOT NULL,
  `department_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `department_name`) VALUES
(1, 'Accounting Department'),
(2, 'IT Department'),
(3, 'Human Resource Department'),
(4, 'Finance Department');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE IF NOT EXISTS `employees` (
`employee_id` int(11) NOT NULL,
  `employee_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employee_id`, `employee_name`) VALUES
(1, 'Jonah Faye Benares'),
(2, 'Hennelen Tanan'),
(3, 'Mila Arana'),
(4, 'Syndey Sinoro'),
(6, 'Maylen Cabaylo'),
(7, 'Stephine Severino'),
(8, 'Jason Flor');

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
  `updated_by` varchar(100) DEFAULT NULL,
  `create_date` varchar(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_details`
--

INSERT INTO `project_details` (`pd_id`, `project_id`, `remarks`, `status_percentage`, `update_date`, `updated_by`, `create_date`) VALUES
(1, 1, 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', '10.00', '2019-10-24', '2, 1', '2019-10-22 04:18:34'),
(2, 2, '1. number 1\r\n2. number 2\r\n3. number 3', '15.00', '2019-10-22', '3', '2019-10-22 04:20:42'),
(3, 1, 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. \r\n\r\nDuis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. ', '100.00', '2019-10-31', '2', '2019-10-22 04:54:00'),
(4, 3, 'hello hello', '18.00', '2019-10-22', '8', '2019-10-22 05:22:12');

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
  `company_id` int(11) NOT NULL DEFAULT '0',
  `department_id` int(11) NOT NULL DEFAULT '0',
  `employee` varchar(100) DEFAULT NULL,
  `status` int(11) DEFAULT '0' COMMENT '0=pending, 1=done, 2=cancelled',
  `cancel_date` varchar(20) DEFAULT NULL,
  `cancel_reason` text,
  `cancel_timestamp` varchar(20) DEFAULT NULL,
  `create_date` varchar(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_head`
--

INSERT INTO `project_head` (`project_id`, `start_date`, `completion_date`, `project_title`, `project_description`, `priority_no`, `company_id`, `department_id`, `employee`, `status`, `cancel_date`, `cancel_reason`, `cancel_timestamp`, `create_date`) VALUES
(1, '2019-10-22', '2019-11-15', 'IT Deployment of Systems', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. ', 1, 1, 2, '2, 1', 1, NULL, NULL, NULL, '2019-10-22 04:17:44'),
(2, '2019-09-01', '2020-01-31', 'Accounting Chuva Ek ek', 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\nDuis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.\r\n1. hello\r\n2. hi\r\n3. kamusta', 2, 2, 1, '3', 2, '2019-10-22', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ', '2019-10-22 04:54:53', '2019-10-22 04:19:54'),
(3, '2019-10-01', '2019-10-31', 'Title 1', 'Project Description 1', 1, 1, 4, '8, 7', 2, '2019-10-22', 'test', NULL, '2019-10-22 05:21:49');

-- --------------------------------------------------------

--
-- Table structure for table `reminders`
--

CREATE TABLE IF NOT EXISTS `reminders` (
`reminder_id` int(11) NOT NULL,
  `notes` text,
  `employee_id` varchar(50) DEFAULT NULL,
  `due_date` varchar(20) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '0= active, 1= cancelled, 2 = done',
  `done_date` varchar(20) DEFAULT NULL,
  `cancel_date` varchar(20) DEFAULT NULL,
  `cancel_reason` text
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reminders`
--

INSERT INTO `reminders` (`reminder_id`, `notes`, `employee_id`, `due_date`, `status`, `done_date`, `cancel_date`, `cancel_reason`) VALUES
(1, 'test', '2', '2019-12-20', 1, NULL, '2019-10-23', 'ghdh'),
(2, 'adasd', '2', '2019-10-31', 1, NULL, '2019-10-23', 'aafdf'),
(3, 'afsdfsdf', '3', '2019-10-31', 1, NULL, '2019-11-01', 'sdfsdf'),
(4, 'dsfsg', '8', '2019-10-25', 2, '2019-10-22 07:52:39', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`user_id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `fullname`) VALUES
(1, 'admin', 'admin', 'admin'),
(2, 'hen', 'hen', 'Hennelen Tanan'),
(3, 'flor', 'flor', 'Jason Flor'),
(4, 'tep', 'tep', 'Stephine David Severino'),
(5, 'imelda', 'cenpri', 'Imelda Espera');

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
-- Indexes for table `project_details`
--
ALTER TABLE `project_details`
 ADD PRIMARY KEY (`pd_id`);

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
MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `project_details`
--
ALTER TABLE `project_details`
MODIFY `pd_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `project_head`
--
ALTER TABLE `project_head`
MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `reminders`
--
ALTER TABLE `reminders`
MODIFY `reminder_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
