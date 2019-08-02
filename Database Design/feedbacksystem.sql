-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2019 at 12:17 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `feedbacksystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `uid` int(11) NOT NULL,
  `user_uid` int(10) NOT NULL,
  `feedback_form_uid` int(10) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`uid`, `user_uid`, `feedback_form_uid`, `status`) VALUES
(61, 2017450001, 2, 0),
(62, 2017450002, 2, 0),
(63, 2017450003, 2, 1),
(64, 2017450004, 2, 1),
(65, 2017450005, 2, 0),
(66, 2017450006, 2, 0),
(67, 2017450007, 2, 0),
(68, 2017450008, 2, 0),
(69, 2017450009, 2, 0),
(70, 2017450010, 2, 0),
(71, 2017450011, 2, 0),
(72, 2017450012, 2, 0),
(73, 2017450013, 2, 0),
(74, 2017450014, 2, 0),
(75, 2017450015, 2, 0),
(76, 2017450016, 2, 0),
(77, 2017450017, 2, 0),
(78, 2017450018, 2, 0),
(79, 2017450019, 2, 0),
(80, 2017450020, 2, 0),
(81, 2017450021, 2, 0),
(82, 2017450022, 2, 0),
(83, 2017450023, 2, 0),
(84, 2017450024, 2, 0),
(85, 2017450025, 2, 0),
(86, 2017450026, 2, 0),
(87, 2017450027, 2, 0),
(88, 2017450028, 2, 0),
(89, 2017450029, 2, 0),
(90, 2017450030, 2, 0),
(91, 2017450031, 2, 0),
(92, 2017450032, 2, 0),
(93, 2017450033, 2, 0),
(94, 2017450034, 2, 0),
(95, 2017450035, 2, 0),
(96, 2017450036, 2, 0),
(97, 2017450037, 2, 0),
(98, 2017450038, 2, 0),
(99, 2017450039, 2, 0),
(100, 2017450040, 2, 0),
(101, 2017450041, 2, 0),
(102, 2017450042, 2, 0),
(103, 2017450043, 2, 0),
(104, 2017450044, 2, 0),
(105, 2017450045, 2, 0),
(106, 2017450046, 2, 0),
(107, 2017450047, 2, 0),
(108, 2017450048, 2, 0),
(109, 2017450049, 2, 0),
(110, 2017450050, 2, 0),
(111, 2017450051, 2, 0),
(112, 2017450052, 2, 0),
(113, 2017450053, 2, 0),
(114, 2017450054, 2, 0),
(115, 2017450055, 2, 0),
(116, 2017450056, 2, 0),
(117, 2017450057, 2, 0),
(118, 2017450058, 2, 0),
(119, 2017450059, 2, 0),
(120, 2017450060, 2, 0),
(360, 2017450060, 6, 0),
(359, 2017450059, 6, 0),
(358, 2017450058, 6, 0),
(357, 2017450057, 6, 0),
(356, 2017450056, 6, 0),
(355, 2017450055, 6, 0),
(354, 2017450054, 6, 0),
(353, 2017450053, 6, 0),
(352, 2017450052, 6, 0),
(351, 2017450051, 6, 0),
(350, 2017450050, 6, 0),
(349, 2017450049, 6, 0),
(348, 2017450048, 6, 0),
(347, 2017450047, 6, 0),
(346, 2017450046, 6, 0),
(345, 2017450045, 6, 0),
(344, 2017450044, 6, 0),
(343, 2017450043, 6, 0),
(342, 2017450042, 6, 0),
(341, 2017450041, 6, 0),
(340, 2017450040, 6, 0),
(339, 2017450039, 6, 0),
(338, 2017450038, 6, 0),
(337, 2017450037, 6, 0),
(336, 2017450036, 6, 0),
(335, 2017450035, 6, 0),
(334, 2017450034, 6, 0),
(333, 2017450033, 6, 0),
(332, 2017450032, 6, 0),
(331, 2017450031, 6, 0),
(330, 2017450030, 6, 0),
(329, 2017450029, 6, 0),
(328, 2017450028, 6, 0),
(327, 2017450027, 6, 0),
(326, 2017450026, 6, 0),
(325, 2017450025, 6, 0),
(324, 2017450024, 6, 0),
(323, 2017450023, 6, 0),
(322, 2017450022, 6, 0),
(321, 2017450021, 6, 0),
(320, 2017450020, 6, 0),
(319, 2017450019, 6, 0),
(318, 2017450018, 6, 0),
(317, 2017450017, 6, 0),
(316, 2017450016, 6, 0),
(315, 2017450015, 6, 0),
(314, 2017450014, 6, 0),
(313, 2017450013, 6, 0),
(312, 2017450012, 6, 0),
(311, 2017450011, 6, 0),
(310, 2017450010, 6, 0),
(309, 2017450009, 6, 0),
(308, 2017450008, 6, 0),
(307, 2017450007, 6, 0),
(306, 2017450006, 6, 0),
(305, 2017450005, 6, 0),
(304, 2017450004, 6, 1),
(303, 2017450003, 6, 1),
(302, 2017450002, 6, 0),
(301, 2017450001, 6, 0),
(181, 2017450001, 4, 0),
(182, 2017450002, 4, 0),
(183, 2017450003, 4, 1),
(184, 2017450004, 4, 0),
(185, 2017450005, 4, 0),
(186, 2017450006, 4, 0),
(187, 2017450007, 4, 0),
(188, 2017450008, 4, 0),
(189, 2017450009, 4, 0),
(190, 2017450010, 4, 0),
(191, 2017450011, 4, 0),
(192, 2017450012, 4, 0),
(193, 2017450013, 4, 0),
(194, 2017450014, 4, 0),
(195, 2017450015, 4, 0),
(196, 2017450016, 4, 0),
(197, 2017450017, 4, 0),
(198, 2017450018, 4, 0),
(199, 2017450019, 4, 0),
(200, 2017450020, 4, 0),
(201, 2017450021, 4, 0),
(202, 2017450022, 4, 0),
(203, 2017450023, 4, 0),
(204, 2017450024, 4, 0),
(205, 2017450025, 4, 0),
(206, 2017450026, 4, 0),
(207, 2017450027, 4, 0),
(208, 2017450028, 4, 0),
(209, 2017450029, 4, 0),
(210, 2017450030, 4, 0),
(211, 2017450031, 4, 0),
(212, 2017450032, 4, 0),
(213, 2017450033, 4, 0),
(214, 2017450034, 4, 0),
(215, 2017450035, 4, 0),
(216, 2017450036, 4, 0),
(217, 2017450037, 4, 0),
(218, 2017450038, 4, 0),
(219, 2017450039, 4, 0),
(220, 2017450040, 4, 0),
(221, 2017450041, 4, 0),
(222, 2017450042, 4, 0),
(223, 2017450043, 4, 0),
(224, 2017450044, 4, 0),
(225, 2017450045, 4, 0),
(226, 2017450046, 4, 0),
(227, 2017450047, 4, 0),
(228, 2017450048, 4, 0),
(229, 2017450049, 4, 0),
(230, 2017450050, 4, 0),
(231, 2017450051, 4, 0),
(232, 2017450052, 4, 0),
(233, 2017450053, 4, 0),
(234, 2017450054, 4, 0),
(235, 2017450055, 4, 0),
(236, 2017450056, 4, 0),
(237, 2017450057, 4, 0),
(238, 2017450058, 4, 0),
(239, 2017450059, 4, 0),
(240, 2017450060, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `feedback_form`
--

CREATE TABLE `feedback_form` (
  `uid` int(10) NOT NULL,
  `createdby` int(10) NOT NULL,
  `title` text,
  `year` text,
  `coursecode` text,
  `semester` text,
  `class` text,
  `extrainfo` text,
  `fromrange` varchar(45) DEFAULT NULL,
  `torange` varchar(45) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback_form`
--

INSERT INTO `feedback_form` (`uid`, `createdby`, `title`, `year`, `coursecode`, `semester`, `class`, `extrainfo`, `fromrange`, `torange`) VALUES
(2, 4, 'DBMS', '2018-2019', 'DBMS321', 'III', 'SYMCA', 'Tutorial Included', '2017450001', '2017450060'),
(6, 1, 'Data Algorithms & Analysis', '2018-2019', 'DAA123', '4', 'SYMCA', 'Tutorial Included', '2017450001', '2017450060'),
(4, 6, 'OS', '', '', '', '', '', '2017450001', '2017450060');

-- --------------------------------------------------------

--
-- Table structure for table `feedback_questions`
--

CREATE TABLE `feedback_questions` (
  `uid` int(10) NOT NULL,
  `user_uid` int(10) NOT NULL,
  `feedback_form` int(10) NOT NULL,
  `question` text,
  `type` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback_questions`
--

INSERT INTO `feedback_questions` (`uid`, `user_uid`, `feedback_form`, `question`, `type`) VALUES
(4, 4, 2, 'Rate teaching', 'rating'),
(5, 4, 2, 'Rate content', 'rating'),
(6, 4, 2, 'Suggestions?', 'review'),
(11, 1, 6, 'How was the content?', 'rating'),
(8, 6, 4, 'hOW WAS THE SUBJECT?', 'rating'),
(9, 6, 4, 'sUGGESTIONS?', 'review'),
(12, 1, 6, 'Any Suggestions?', 'review');

-- --------------------------------------------------------

--
-- Table structure for table `feedback_record`
--

CREATE TABLE `feedback_record` (
  `uid` int(10) NOT NULL,
  `feedback_questions_uid` int(10) NOT NULL,
  `feedback_form_uid` int(10) NOT NULL,
  `answer` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback_record`
--

INSERT INTO `feedback_record` (`uid`, `feedback_questions_uid`, `feedback_form_uid`, `answer`) VALUES
(1, 1, 1, 'Good'),
(2, 2, 1, 'Good'),
(3, 3, 1, 'Good'),
(4, 1, 1, 'Very Good'),
(5, 2, 1, 'Good'),
(6, 3, 1, 'Good nothing'),
(7, 4, 2, 'Good'),
(8, 5, 2, 'Very Good'),
(9, 6, 2, 'good'),
(10, 7, 3, 'Very Good'),
(11, 4, 2, 'Average'),
(12, 5, 2, 'Average'),
(13, 6, 2, 'hello 1223'),
(14, 7, 3, 'Average'),
(15, 8, 4, 'Very Good'),
(16, 9, 4, 'iT WAS GOOG'),
(17, 11, 6, 'Very Good'),
(18, 12, 6, 'dherhehdgnd'),
(19, 11, 6, 'Good'),
(20, 12, 6, 'Suggestion 1');

-- --------------------------------------------------------

--
-- Table structure for table `preferences`
--

CREATE TABLE `preferences` (
  `name` text NOT NULL,
  `value` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `preferences`
--

INSERT INTO `preferences` (`name`, `value`) VALUES
('threshold', '0');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(10) NOT NULL,
  `usertype` varchar(10) NOT NULL DEFAULT 'student',
  `loginid` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL DEFAULT '0',
  `name` varchar(30) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `usercol` varchar(45) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `usertype`, `loginid`, `password`, `name`, `dob`, `email`, `phone`, `create_time`, `usercol`) VALUES
(1, 'hod', '1001', '123', 'Dr. Pooja Raundale', '1996-01-01', 'hod@spit.ac.in', '0123456789', '2019-04-14 05:27:31', NULL),
(2, 'student', '2017450003', '123', 'Devang Chhajed', '1996-06-10', 'devangchhajed@gmail.com', '9887722857', '2019-04-14 05:31:01', NULL),
(3, 'student', '2017450004', '123', 'Taiyeeba Chikhalia', '1996-07-23', 'taiyeeba.chikhalia@spit.ac.in', '9876543210', '2019-04-14 05:33:35', NULL),
(4, 'faculty', '1002', '123', 'Prof. Harshil Kanakia', '2019-12-31', 'abc@def.com', '987654321', '2019-04-14 05:44:51', NULL),
(5, 'faculty', '123', '123', 'Abc', '2019-12-31', 'abc@abc.com', '9876543210', '2019-04-23 05:27:35', NULL),
(6, 'faculty', '1003', '123', 'Pallavi', '1985-12-10', 'vernex@hi2.in', '', '2019-04-23 05:28:21', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `feedback_form`
--
ALTER TABLE `feedback_form`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `feedback_questions`
--
ALTER TABLE `feedback_questions`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `feedback_record`
--
ALTER TABLE `feedback_record`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=481;
--
-- AUTO_INCREMENT for table `feedback_form`
--
ALTER TABLE `feedback_form`
  MODIFY `uid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `feedback_questions`
--
ALTER TABLE `feedback_questions`
  MODIFY `uid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `feedback_record`
--
ALTER TABLE `feedback_record`
  MODIFY `uid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
