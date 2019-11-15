-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2019 at 01:56 AM
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `department_name`) VALUES
(1, 'Accounting Department'),
(2, 'IT Department'),
(3, 'Human Resource Department'),
(4, 'Finance Department'),
(5, 'asdasd');

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
-- Table structure for table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
`location_id` int(11) NOT NULL,
  `location_name` varchar(150) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`location_id`, `location_name`) VALUES
(2, 'Bacolod'),
(3, 'Calapan'),
(4, 'Manila');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_details`
--

INSERT INTO `project_details` (`pd_id`, `project_id`, `remarks`, `status_percentage`, `update_date`, `followup_date`, `updated_by`, `create_date`) VALUES
(1, 1, 'test', '10.00', '2019-11-15 10:15', '2019-11-22', 2, '2019-11-15 01:52:40'),
(2, 1, 'test remarks', '100.00', '2019-11-15 14:48', '2019-11-22', 2, '2019-11-15 01:55:00');

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
  `company_id` int(11) NOT NULL DEFAULT '0',
  `department_id` int(11) NOT NULL DEFAULT '0',
  `employee` varchar(100) DEFAULT NULL,
  `task_no` varchar(50) DEFAULT NULL,
  `status` int(11) DEFAULT '0' COMMENT '0=pending, 1=done, 2=cancelled',
  `cancel_date` varchar(20) DEFAULT NULL,
  `cancel_reason` text,
  `cancel_timestamp` varchar(20) DEFAULT NULL,
  `create_date` varchar(20) DEFAULT NULL,
  `monitor_person` int(11) NOT NULL DEFAULT '0',
  `from` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_head`
--

INSERT INTO `project_head` (`project_id`, `start_date`, `completion_date`, `project_title`, `project_description`, `priority_no`, `company_id`, `department_id`, `employee`, `task_no`, `status`, `cancel_date`, `cancel_reason`, `cancel_timestamp`, `create_date`, `monitor_person`, `from`) VALUES
(1, '2019-11-15', '2019-11-30', 'test project', 'description', 1, 1, 1, '2, 3', '001', 1, NULL, NULL, NULL, '2019-11-15 01:52:16', 3, 'Emailed');

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
  `employee_id` int(11) NOT NULL DEFAULT '0',
  `company_id` int(11) NOT NULL DEFAULT '0',
  `department_id` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  `email` varchar(100) DEFAULT NULL,
  `usertype` int(11) NOT NULL DEFAULT '0' COMMENT '1=admin, 2=head, 3=employee'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `fullname`, `employee_id`, `company_id`, `department_id`, `status`, `email`, `usertype`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 0, 1, 1, 1, NULL, 1),
(2, 'hen', 'e811af40e80c396fb9dd59c45a1c9ce5', 'Hennelen Tanan', 0, 2, 3, 1, NULL, 2),
(3, 'jason', 'd38e99d9790733c939e88698afbc30b6', 'Jason Flor', 0, 3, 4, 2, 'jasonflor.cenpri@gmail.com', 2),
(4, 'tep', 'e6893ef750669444cb220cd64888e617', 'Stephine David Severino', 0, 4, 1, 2, NULL, 2),
(6, 'jonah', '827ccb0eea8a706c4c34a16891f84e7b ', 'Jonah Faye Benares', 0, 1, 2, 1, 'jonahbenares.cenpri@gmail.com', 2),
(7, 'lloyd', '344c8024766ac77d11d5346b85cab6ad', 'Lloyd Jamero', 0, 1, 2, 1, 'lloyd@gmail.com', 3);

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
MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
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
MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `reminders`
--
ALTER TABLE `reminders`
MODIFY `reminder_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
