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
('threshold', '10');

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
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;
--
-- AUTO_INCREMENT for table `feedback_form`
--
ALTER TABLE `feedback_form`
  MODIFY `uid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;
--
-- AUTO_INCREMENT for table `feedback_questions`
--
ALTER TABLE `feedback_questions`
  MODIFY `uid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;
--
-- AUTO_INCREMENT for table `feedback_record`
--
ALTER TABLE `feedback_record`
  MODIFY `uid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;
