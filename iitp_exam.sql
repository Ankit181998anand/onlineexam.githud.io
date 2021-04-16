-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2021 at 01:46 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iitp_exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `exam_details`
--

CREATE TABLE `exam_details` (
  `id` int(11) NOT NULL,
  `ex_id` varchar(255) NOT NULL,
  `sub_code` varchar(255) NOT NULL,
  `date_of_exam` date NOT NULL,
  `time_of_exam` time NOT NULL,
  `end_time` time NOT NULL,
  `f_marks` varchar(255) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `exam_type` varchar(255) NOT NULL,
  `any_inst` varchar(225) NOT NULL,
  `faculty_id` varchar(255) NOT NULL,
  `student` varchar(250) DEFAULT '0',
  `isActive` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_details`
--

INSERT INTO `exam_details` (`id`, `ex_id`, `sub_code`, `date_of_exam`, `time_of_exam`, `end_time`, `f_marks`, `semester`, `exam_type`, `any_inst`, `faculty_id`, `student`, `isActive`) VALUES
(6, 'SR_046TU', '67543fg', '2020-05-26', '03:06:00', '04:06:00', '100', '8', 'erftgyh', 'rdtfrygh', '567fghjk', '56', 1);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `ex_id` varchar(255) NOT NULL,
  `question` varchar(50000) NOT NULL,
  `que_type` varchar(255) NOT NULL,
  `o1` varchar(255) DEFAULT NULL,
  `o2` varchar(255) DEFAULT NULL,
  `o3` varchar(255) DEFAULT NULL,
  `o4` varchar(255) DEFAULT NULL,
  `o5` varchar(255) DEFAULT NULL,
  `mark` int(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `ex_id`, `question`, `que_type`, `o1`, `o2`, `o3`, `o4`, `o5`, `mark`) VALUES
(2, 'SR_046TU', 'rdctfvgybuhnjim?', 'mcq', ' ftghy', 'erftghyu', 'hjhjmk', 'ghjuk', 'ghyjumk,', 4);

-- --------------------------------------------------------

--
-- Table structure for table `registerpage`
--

CREATE TABLE `registerpage` (
  `id` int(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email_id` varchar(250) NOT NULL,
  `roll_no` varchar(11) NOT NULL,
  `phone_no` bigint(11) NOT NULL,
  `branch` varchar(250) NOT NULL,
  `employ_id` varchar(250) NOT NULL,
  `paswd` varchar(255) NOT NULL,
  `type` varchar(250) NOT NULL,
  `aprove` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registerpage`
--

INSERT INTO `registerpage` (`id`, `name`, `email_id`, `roll_no`, `phone_no`, `branch`, `employ_id`, `paswd`, `type`, `aprove`) VALUES
(20, 'admin', 'a@a.com', '', 0, '', '', '$2y$10$8TMwvO6SlIkMG65j9GLz7.dGYpg1wvgCh8oLMJRp3goLaWlo81zA2', 'admin', 1),
(21, 'ankit', 'a@f.com', '', 34567890098, '', '567fghjk', '$2y$10$ASf0og4h58EhUF/ELMFpi.quZitNTYJds/GAbRzeQDLrX1UaJpJWu', 'faculty', 1),
(22, 'asdfg', 'student@g.com', '56', 34567890098, 'Civil Engineering', '', '$2y$10$2udw6LNRdkmdEODF1QN0OOp10VzbyqWpyo3VDiKDNMz5SrLC2YtcW', 'student', 1);

-- --------------------------------------------------------

--
-- Table structure for table `response`
--

CREATE TABLE `response` (
  `id` int(11) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `ex_id` varchar(255) NOT NULL,
  `question` varchar(3000) NOT NULL,
  `answer` varchar(30000) NOT NULL,
  `o1` varchar(255) NOT NULL,
  `o2` varchar(255) NOT NULL,
  `o3` varchar(255) NOT NULL,
  `o4` varchar(255) NOT NULL,
  `o5` varchar(255) NOT NULL,
  `mark` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `studentdetails`
--

CREATE TABLE `studentdetails` (
  `id` int(11) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `roll` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `ex_id` varchar(255) NOT NULL,
  `login_time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `exam_details`
--
ALTER TABLE `exam_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `exam_id` (`ex_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registerpage`
--
ALTER TABLE `registerpage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `response`
--
ALTER TABLE `response`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studentdetails`
--
ALTER TABLE `studentdetails`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_id` (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `exam_details`
--
ALTER TABLE `exam_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `registerpage`
--
ALTER TABLE `registerpage`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `response`
--
ALTER TABLE `response`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `studentdetails`
--
ALTER TABLE `studentdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
