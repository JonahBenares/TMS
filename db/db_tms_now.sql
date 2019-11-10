-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2019 at 12:56 AM
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

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
(5, 'Zyndyryn Rosales'),
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
  `followup_date` varchar(20) DEFAULT NULL,
  `updated_by` int(11) NOT NULL DEFAULT '0',
  `create_date` varchar(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_details`
--

INSERT INTO `project_details` (`pd_id`, `project_id`, `remarks`, `status_percentage`, `update_date`, `followup_date`, `updated_by`, `create_date`) VALUES
(1, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '10.00', '2019-11-05', '2019-11-11', 2, '2019-11-04 03:46:10'),
(2, 1, 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '15.00', '2019-11-08', '2019-11-20', 2, '2019-11-04 03:47:06'),
(3, 1, 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. ', '20.00', '2019-11-11', NULL, 2, '2019-11-04 03:49:16'),
(4, 2, 'Lorem ipsum dolor sit amet.', '10.00', '2019-11-07', '2019-11-14', 2, '2019-11-07 07:36:43');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_extension`
--

INSERT INTO `project_extension` (`extension_id`, `project_id`, `pd_id`, `extension_date`, `extension_reason`) VALUES
(1, 1, 3, '2019-11-30', 'Sample extension reason'),
(2, 1, 2, '2019-11-25', 'sample sample sample');

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
  `task_no` varchar(50) DEFAULT NULL,
  `status` int(11) DEFAULT '0' COMMENT '0=pending, 1=done, 2=cancelled',
  `cancel_date` varchar(20) DEFAULT NULL,
  `cancel_reason` text,
  `create_date` varchar(20) DEFAULT NULL,
  `monitor_person` int(11) NOT NULL DEFAULT '0',
  `from` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_head`
--

INSERT INTO `project_head` (`project_id`, `start_date`, `completion_date`, `project_title`, `project_description`, `priority_no`, `company_id`, `department_id`, `employee`, `task_no`, `status`, `cancel_date`, `cancel_reason`, `create_date`, `monitor_person`, `from`) VALUES
(1, '2019-11-04', '2019-11-20', 'Sample Project', 'Sample Project Description', 1, 1, 1, '2', '001', 0, NULL, NULL, '2019-11-04 03:45:12', 8, 'Verbally'),
(2, '2019-11-07', '2019-11-30', 'Hello World!', 'This is the project description of Hello World Project.', 1, 2, 2, '8', '002', 0, NULL, NULL, '2019-11-07 07:36:23', 2, 'Verbally');

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
  `cancel_reason` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`user_id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `company_id` int(11) NOT NULL DEFAULT '0',
  `department_id` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  `email` varchar(100) DEFAULT NULL,
  `usertype` int(11) NOT NULL DEFAULT '0' COMMENT '1=admin, 2=head, 3=employee'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `fullname`, `company_id`, `department_id`, `status`, `email`, `usertype`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 1, 1, 1, NULL, 1),
(2, 'hen', 'e811af40e80c396fb9dd59c45a1c9ce5', 'Hennelen Tanan', 2, 3, 1, NULL, 2),
(3, 'jason', 'd38e99d9790733c939e88698afbc30b6', 'Jason Flor', 3, 4, 2, 'jasonflor.cenpri@gmail.com', 2),
(4, 'tep', 'e6893ef750669444cb220cd64888e617', 'Stephine David Severino', 4, 1, 2, NULL, 2),
(6, 'jonah', '827ccb0eea8a706c4c34a16891f84e7b ', 'Jonah Faye Benares', 1, 2, 1, 'jonahbenares.cenpri@gmail.com', 2);

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
MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
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
-- AUTO_INCREMENT for table `project_extension`
--
ALTER TABLE `project_extension`
MODIFY `extension_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `project_head`
--
ALTER TABLE `project_head`
MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `reminders`
--
ALTER TABLE `reminders`
MODIFY `reminder_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
