-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2020 at 10:36 AM
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
  `isActive` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_details`
--

INSERT INTO `exam_details` (`id`, `ex_id`, `sub_code`, `date_of_exam`, `time_of_exam`, `end_time`, `f_marks`, `semester`, `exam_type`, `any_inst`, `faculty_id`, `isActive`) VALUES
(1, 'IITP_OE-01', 'SDFGHJ', '2020-05-03', '13:27:00', '13:32:00', '100', '6th', 'MID-SEM Exam', ' asdtgas duyasdgasdu aisugasjdaui sdg uasdosadh i', 'fac1', 1);

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
  `ans` varchar(255) DEFAULT NULL,
  `mark` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `ex_id`, `question`, `que_type`, `o1`, `o2`, `o3`, `o4`, `o5`, `ans`, `mark`) VALUES
(1, 'IITP_OE-01', 'a1', 'mcq', 'a', 'b', 'c', 'd', NULL, 'a', '1'),
(2, 'IITP_OE-01', 'a2', 'mcq', 'a', 'b', 'c', 'd', NULL, 'a', '1'),
(3, 'IITP_OE-01', 'a3', 'mcq', 'a', 'b', 'c', 'd', NULL, 'a', '1'),
(4, 'IITP_OE-01', 'a4', 'mcq', 'a', 'b', 'c', 'd', NULL, 'a', '1'),
(5, 'IITP_OE-01', 'a5', 'mcq', 'a', 'b', 'c', 'd', NULL, 'a', '1'),
(6, 'IITP_OE-01', 'a6', 'mcq', 'a', 'b', 'c', 'd', NULL, 'a', '1'),
(7, 'IITP_OE-01', 'a7', 'mcq', 'a', 'b', 'c', 'd', NULL, 'a', '1'),
(8, 'IITP_OE-01', 'a8', 'mcq', 'a', 'b', 'c', 'd', NULL, 'a', '1'),
(9, 'IITP_OE-01', 'b1', 'que_ans', '', '', '', '', NULL, '', '10'),
(10, 'IITP_OE-01', 'b2', 'que_ans', '', '', '', '', NULL, '', '10'),
(11, 'IITP_OE-01', 'b3', 'que_ans', '', '', '', '', NULL, '', '10'),
(12, 'IITP_OE-01', 'b4', 'que_ans', '', '', '', '', NULL, '', '10'),
(13, 'IITP_OE-01', 'b5', 'que_ans', '', '', '', '', NULL, '', '10'),
(14, 'IITP_OE-01', 'b6', 'que_ans', '', '', '', '', NULL, '', '10'),
(15, 'IITP_OE-01', 'b7', 'que_ans', '', '', '', '', NULL, '', '10'),
(16, 'IITP_OE-01', 'b8', 'que_ans', '', '', '', '', NULL, '', '10');

-- --------------------------------------------------------

--
-- Table structure for table `registerpage`
--

CREATE TABLE `registerpage` (
  `id` int(20) NOT NULL,
  `user_name` text NOT NULL,
  `roll_no` bigint(11) NOT NULL,
  `phone_no` bigint(11) NOT NULL,
  `paswd` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registerpage`
--

INSERT INTO `registerpage` (`id`, `user_name`, `roll_no`, `phone_no`, `paswd`) VALUES
(81, 'sample', 123456, 9999999999, 'sample');

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

--
-- Dumping data for table `response`
--

INSERT INTO `response` (`id`, `student_id`, `ex_id`, `question`, `answer`, `o1`, `o2`, `o3`, `o4`, `o5`, `mark`, `type`) VALUES
(641, 'IITP_OE-01_sedrftgyhuji', 'IITP_OE-01', '	\r\nPHP Stands for?', 'Hypertext Preprocessor', 'a', 'b', 'c', 'd', '', '1', 'mcq'),
(642, 'IITP_OE-01_sedrftgyhuji', 'IITP_OE-01', '	\r\nPHP is an example of ___________ scripting language.', 'Server-side', 'a', 'b', 'c', 'd', '', '1', 'mcq'),
(643, 'IITP_OE-01_sedrftgyhuji', 'IITP_OE-01', '	\r\nWho is known as the father of PHP?', 'Rasmus Lerdorf', 'a', 'b', 'c', 'd', '', '1', 'mcq'),
(645, 'IITP_OE-01_sedrftgyhuji', 'IITP_OE-01', '	\r\nPHP scripts are enclosed within _______', '', 'a', 'b', 'c', 'd', '', '1', 'mcq'),
(646, 'IITP_OE-01_sedrftgyhuji', 'IITP_OE-01', 'Which of the following is not true?', '', 'a', 'b', 'c', 'd', '', '1', 'mcq'),
(649, 'IITP_OE-01_sedrftgyhuji', 'IITP_OE-01', 'What is PHP?', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '', '', '', '', '', '10', 'que_ans'),
(650, 'IITP_OE-01_sedrftgyhuji', 'IITP_OE-01', 'What is PEAR in PHP? ', '', '', '', '', '', '', '10', 'que_ans'),
(651, 'IITP_OE-01_sedrftgyhuji', 'IITP_OE-01', 'Who is known as the father of PHP?', 'Consequat id porta nibh venenatis cras. Vel pharetra vel turpis nunc eget. Suspendisse potenti nullam ac tortor. Amet mattis vulputate enim nulla aliquet. Fames ac turpis egestas sed tempus urna et pharetra pharetra. Pharetra convallis posuere morbi leo urna molestie at. Tristique senectus et netus et malesuada. Elementum sagittis vitae et leo duis. Quam id leo in vitae. Id porta nibh venenatis cras sed.', '', '', '', '', '', '10', 'que_ans'),
(652, 'IITP_OE-01_sedrftgyhuji', 'IITP_OE-01', 'What was the old name of PHP?', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '', '', '', '', '', '10', 'que_ans'),
(653, 'IITP_OE-01_sedrftgyhuji', 'IITP_OE-01', 'Explain the difference b/w static and dynamic websites?', '', '', '', '', '', '', '10', 'que_ans'),
(654, 'IITP_OE-01_sedrftgyhuji', 'IITP_OE-01', 'What is the name of scripting engine in PHP?', 'Consequat id porta nibh venenatis cras. Vel pharetra vel turpis nunc eget. Suspendisse potenti nullam ac tortor. Amet mattis vulputate enim nulla aliquet. Fames ac turpis egestas sed tempus urna et pharetra pharetra. Pharetra convallis posuere morbi leo urna molestie at. Tristique senectus et netus et malesuada. Elementum sagittis vitae et leo duis. Quam id leo in vitae. Id porta nibh venenatis cras sed.', '', '', '', '', '', '10', 'que_ans'),
(655, 'IITP_OE-01_sedrftgyhuji', 'IITP_OE-01', ' Explain the difference between PHP4 and PHP5.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '', '', '', '', '', '10', 'que_ans'),
(657, 'IITP_OE-01_123456789', 'IITP_OE-01', 'a6', 'Not-attempt', 'a', 'b', 'c', 'd', '', '1', 'mcq'),
(658, 'IITP_OE-01_123456789', 'IITP_OE-01', 'a2', '', 'a', 'b', 'c', 'd', '', '1', 'mcq'),
(659, 'IITP_OE-01_123456789', 'IITP_OE-01', 'a3', '', 'a', 'b', 'c', 'd', '', '1', 'mcq'),
(660, 'IITP_OE-01_123456789', 'IITP_OE-01', 'a7', '', 'a', 'b', 'c', 'd', '', '1', 'mcq'),
(661, 'IITP_OE-01_123456789', 'IITP_OE-01', 'a5', 'b', 'a', 'b', 'c', 'd', '', '1', 'mcq'),
(662, 'IITP_OE-01_123456789', 'IITP_OE-01', 'a1', 'b', 'a', 'b', 'c', 'd', '', '1', 'mcq'),
(663, 'IITP_OE-01_123456789', 'IITP_OE-01', 'a8', '', 'a', 'b', 'c', 'd', '', '1', 'mcq'),
(664, 'IITP_OE-01_123456789', 'IITP_OE-01', 'a4', '', 'a', 'b', 'c', 'd', '', '1', 'mcq'),
(665, 'IITP_OE-01_123456789', 'IITP_OE-01', 'b2', 'sedfghjerdtfyguhijnokmlrctfyvgubhnj', '', '', '', '', '', '10', 'que_ans'),
(666, 'IITP_OE-01_123456789', 'IITP_OE-01', 'b1', '', '', '', '', '', '', '10', 'que_ans'),
(667, 'IITP_OE-01_123456789', 'IITP_OE-01', 'b4', '', '', '', '', '', '', '10', 'que_ans'),
(668, 'IITP_OE-01_123456789', 'IITP_OE-01', 'b5', '', '', '', '', '', '', '10', 'que_ans'),
(669, 'IITP_OE-01_123456789', 'IITP_OE-01', 'b8', '', '', '', '', '', '', '10', 'que_ans'),
(670, 'IITP_OE-01_123456789', 'IITP_OE-01', 'b7', '', '', '', '', '', '', '10', 'que_ans'),
(671, 'IITP_OE-01_123456789', 'IITP_OE-01', 'b6', '', '', '', '', '', '', '10', 'que_ans'),
(672, 'IITP_OE-01_123456789', 'IITP_OE-01', 'b3', '', '', '', '', '', '', '10', 'que_ans'),
(673, 'IITP_OE-01_FSYFHSDJ', 'IITP_OE-01', 'a5', '', 'a', 'b', 'c', 'd', '', '1', 'mcq'),
(674, 'IITP_OE-01_FSYFHSDJ', 'IITP_OE-01', 'a6', '', 'a', 'b', 'c', 'd', '', '1', 'mcq'),
(675, 'IITP_OE-01_FSYFHSDJ', 'IITP_OE-01', 'a8', '', 'a', 'b', 'c', 'd', '', '1', 'mcq'),
(676, 'IITP_OE-01_FSYFHSDJ', 'IITP_OE-01', 'a2', '', 'a', 'b', 'c', 'd', '', '1', 'mcq'),
(677, 'IITP_OE-01_FSYFHSDJ', 'IITP_OE-01', 'a4', '', 'a', 'b', 'c', 'd', '', '1', 'mcq'),
(678, 'IITP_OE-01_FSYFHSDJ', 'IITP_OE-01', 'a3', '', 'a', 'b', 'c', 'd', '', '1', 'mcq'),
(679, 'IITP_OE-01_FSYFHSDJ', 'IITP_OE-01', 'a7', '', 'a', 'b', 'c', 'd', '', '1', 'mcq'),
(680, 'IITP_OE-01_FSYFHSDJ', 'IITP_OE-01', 'a1', '', 'a', 'b', 'c', 'd', '', '1', 'mcq'),
(681, 'IITP_OE-01_FSYFHSDJ', 'IITP_OE-01', 'b5', '', '', '', '', '', '', '10', 'que_ans'),
(682, 'IITP_OE-01_FSYFHSDJ', 'IITP_OE-01', 'b6', '', '', '', '', '', '', '10', 'que_ans'),
(683, 'IITP_OE-01_FSYFHSDJ', 'IITP_OE-01', 'b7', '', '', '', '', '', '', '10', 'que_ans'),
(684, 'IITP_OE-01_FSYFHSDJ', 'IITP_OE-01', 'b3', '', '', '', '', '', '', '10', 'que_ans'),
(685, 'IITP_OE-01_FSYFHSDJ', 'IITP_OE-01', 'b4', '', '', '', '', '', '', '10', 'que_ans'),
(686, 'IITP_OE-01_FSYFHSDJ', 'IITP_OE-01', 'b2', '', '', '', '', '', '', '10', 'que_ans'),
(687, 'IITP_OE-01_FSYFHSDJ', 'IITP_OE-01', 'b1', '', '', '', '', '', '', '10', 'que_ans'),
(688, 'IITP_OE-01_FSYFHSDJ', 'IITP_OE-01', 'b8', '', '', '', '', '', '', '10', 'que_ans'),
(689, 'IITP_OE-01_23456789', 'IITP_OE-01', 'a6', '', 'a', 'b', 'c', 'd', '', '1', 'mcq'),
(690, 'IITP_OE-01_23456789', 'IITP_OE-01', 'a7', '', 'a', 'b', 'c', 'd', '', '1', 'mcq'),
(691, 'IITP_OE-01_23456789', 'IITP_OE-01', 'a4', '', 'a', 'b', 'c', 'd', '', '1', 'mcq'),
(692, 'IITP_OE-01_23456789', 'IITP_OE-01', 'a5', '', 'a', 'b', 'c', 'd', '', '1', 'mcq'),
(693, 'IITP_OE-01_23456789', 'IITP_OE-01', 'a8', '', 'a', 'b', 'c', 'd', '', '1', 'mcq'),
(694, 'IITP_OE-01_23456789', 'IITP_OE-01', 'a2', '', 'a', 'b', 'c', 'd', '', '1', 'mcq'),
(695, 'IITP_OE-01_23456789', 'IITP_OE-01', 'a3', '', 'a', 'b', 'c', 'd', '', '1', 'mcq'),
(696, 'IITP_OE-01_23456789', 'IITP_OE-01', 'a1', '', 'a', 'b', 'c', 'd', '', '1', 'mcq'),
(697, 'IITP_OE-01_23456789', 'IITP_OE-01', 'b7', '', '', '', '', '', '', '10', 'que_ans'),
(698, 'IITP_OE-01_23456789', 'IITP_OE-01', 'b2', '', '', '', '', '', '', '10', 'que_ans'),
(699, 'IITP_OE-01_23456789', 'IITP_OE-01', 'b4', '', '', '', '', '', '', '10', 'que_ans'),
(700, 'IITP_OE-01_23456789', 'IITP_OE-01', 'b1', '', '', '', '', '', '', '10', 'que_ans'),
(701, 'IITP_OE-01_23456789', 'IITP_OE-01', 'b3', '', '', '', '', '', '', '10', 'que_ans'),
(702, 'IITP_OE-01_23456789', 'IITP_OE-01', 'b8', '', '', '', '', '', '', '10', 'que_ans'),
(703, 'IITP_OE-01_23456789', 'IITP_OE-01', 'b5', '', '', '', '', '', '', '10', 'que_ans'),
(704, 'IITP_OE-01_23456789', 'IITP_OE-01', 'b6', '', '', '', '', '', '', '10', 'que_ans'),
(705, 'IITP_OE-01_KUFHISGDUSK', 'IITP_OE-01', 'a2', 'b', 'a', 'b', 'c', 'd', '', '1', 'mcq'),
(706, 'IITP_OE-01_KUFHISGDUSK', 'IITP_OE-01', 'a4', 'c', 'a', 'b', 'c', 'd', '', '1', 'mcq'),
(707, 'IITP_OE-01_KUFHISGDUSK', 'IITP_OE-01', 'a5', 'c', 'a', 'b', 'c', 'd', '', '1', 'mcq'),
(708, 'IITP_OE-01_KUFHISGDUSK', 'IITP_OE-01', 'a6', 'Not-attempt', 'a', 'b', 'c', 'd', '', '1', 'mcq'),
(709, 'IITP_OE-01_KUFHISGDUSK', 'IITP_OE-01', 'a3', 'c', 'a', 'b', 'c', 'd', '', '1', 'mcq'),
(710, 'IITP_OE-01_KUFHISGDUSK', 'IITP_OE-01', 'a1', '', 'a', 'b', 'c', 'd', '', '1', 'mcq'),
(711, 'IITP_OE-01_KUFHISGDUSK', 'IITP_OE-01', 'a8', '', 'a', 'b', 'c', 'd', '', '1', 'mcq'),
(712, 'IITP_OE-01_KUFHISGDUSK', 'IITP_OE-01', 'a7', '', 'a', 'b', 'c', 'd', '', '1', 'mcq'),
(713, 'IITP_OE-01_KUFHISGDUSK', 'IITP_OE-01', 'b6', 'gwutwiow djwhdwijdowpqj jkwhdwjdopjdwodjkljo', '', '', '', '', '', '10', 'que_ans'),
(714, 'IITP_OE-01_KUFHISGDUSK', 'IITP_OE-01', 'b3', 'bwkldjwl;dk;wkdlekcmken', '', '', '', '', '', '10', 'que_ans'),
(715, 'IITP_OE-01_KUFHISGDUSK', 'IITP_OE-01', 'b4', '', '', '', '', '', '', '10', 'que_ans'),
(716, 'IITP_OE-01_KUFHISGDUSK', 'IITP_OE-01', 'b8', '', '', '', '', '', '', '10', 'que_ans'),
(717, 'IITP_OE-01_KUFHISGDUSK', 'IITP_OE-01', 'b5', '', '', '', '', '', '', '10', 'que_ans'),
(718, 'IITP_OE-01_KUFHISGDUSK', 'IITP_OE-01', 'b1', '', '', '', '', '', '', '10', 'que_ans'),
(719, 'IITP_OE-01_KUFHISGDUSK', 'IITP_OE-01', 'b2', '', '', '', '', '', '', '10', 'que_ans'),
(720, 'IITP_OE-01_KUFHISGDUSK', 'IITP_OE-01', 'b7', '', '', '', '', '', '', '10', 'que_ans'),
(721, 'IITP_OE-01_usytdsj', 'IITP_OE-01', 'a5', 'b', 'a', 'b', 'c', 'd', '', '1', 'mcq'),
(722, 'IITP_OE-01_usytdsj', 'IITP_OE-01', 'a8', 'c', 'a', 'b', 'c', 'd', '', '1', 'mcq'),
(723, 'IITP_OE-01_usytdsj', 'IITP_OE-01', 'a6', 'c', 'a', 'b', 'c', 'd', '', '1', 'mcq'),
(724, 'IITP_OE-01_usytdsj', 'IITP_OE-01', 'a1', '', 'a', 'b', 'c', 'd', '', '1', 'mcq'),
(725, 'IITP_OE-01_usytdsj', 'IITP_OE-01', 'a7', '', 'a', 'b', 'c', 'd', '', '1', 'mcq'),
(726, 'IITP_OE-01_usytdsj', 'IITP_OE-01', 'a2', '', 'a', 'b', 'c', 'd', '', '1', 'mcq'),
(727, 'IITP_OE-01_usytdsj', 'IITP_OE-01', 'a3', '', 'a', 'b', 'c', 'd', '', '1', 'mcq'),
(728, 'IITP_OE-01_usytdsj', 'IITP_OE-01', 'a4', '', 'a', 'b', 'c', 'd', '', '1', 'mcq'),
(729, 'IITP_OE-01_usytdsj', 'IITP_OE-01', 'b1', '', '', '', '', '', '', '10', 'que_ans'),
(730, 'IITP_OE-01_usytdsj', 'IITP_OE-01', 'b4', '', '', '', '', '', '', '10', 'que_ans'),
(731, 'IITP_OE-01_usytdsj', 'IITP_OE-01', 'b3', '', '', '', '', '', '', '10', 'que_ans'),
(732, 'IITP_OE-01_usytdsj', 'IITP_OE-01', 'b6', '', '', '', '', '', '', '10', 'que_ans'),
(733, 'IITP_OE-01_usytdsj', 'IITP_OE-01', 'b8', '', '', '', '', '', '', '10', 'que_ans'),
(734, 'IITP_OE-01_usytdsj', 'IITP_OE-01', 'b5', '', '', '', '', '', '', '10', 'que_ans'),
(735, 'IITP_OE-01_usytdsj', 'IITP_OE-01', 'b2', '', '', '', '', '', '', '10', 'que_ans'),
(736, 'IITP_OE-01_usytdsj', 'IITP_OE-01', 'b7', '', '', '', '', '', '', '10', 'que_ans');

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
-- Dumping data for table `studentdetails`
--

INSERT INTO `studentdetails` (`id`, `student_id`, `name`, `roll`, `username`, `ex_id`, `login_time`) VALUES
(51, 'IITP_OE-01_sedrftgyhuji', 'edrftgyhuji', 'sedrftgyhuji', 'testing', 'IITP_OE-01', '2020-04-19 14:09:55'),
(52, 'IITP_OE-01_123456789', 'Ankita', '123456789', 'testing', 'IITP_OE-01', '2020-05-03 13:00:05'),
(53, 'IITP_OE-01_FSYFHSDJ', 'afshHFH', 'FSYFHSDJ', 'testing', 'IITP_OE-01', '2020-05-03 13:05:20'),
(54, 'IITP_OE-01_23456789', 'Ankan Ghosh', '23456789', 'testing', 'IITP_OE-01', '2020-05-03 13:06:54'),
(55, 'IITP_OE-01_KUFHISGDUSK', 'SKHDYFAJSDHUG', 'KUFHISGDUSK', 'testing', 'IITP_OE-01', '2020-05-03 13:08:13'),
(56, 'IITP_OE-01_usytdsj', 'sgdydug', 'usytdsj', 'testing', 'IITP_OE-01', '2020-05-03 13:27:44');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `registerpage`
--
ALTER TABLE `registerpage`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `response`
--
ALTER TABLE `response`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=737;

--
-- AUTO_INCREMENT for table `studentdetails`
--
ALTER TABLE `studentdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
