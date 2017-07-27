-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2017 at 01:06 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pms`
--

-- --------------------------------------------------------

--
-- Table structure for table `pms_login`
--

CREATE TABLE `pms_login` (
  `ID` int(100) NOT NULL,
  `user` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` int(10) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pms_login`
--

INSERT INTO `pms_login` (`ID`, `user`, `password`, `status`, `role`) VALUES
(1, 'admin', '471dec4fae586a5451dbf51306c3b52f', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pms_message`
--

CREATE TABLE `pms_message` (
  `ID` int(11) NOT NULL,
  `from_id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `message` text NOT NULL,
  `date` date NOT NULL,
  `thread` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pms_message`
--

INSERT INTO `pms_message` (`ID`, `from_id`, `to_id`, `subject`, `message`, `date`, `thread`, `status`) VALUES
(1, 1, 2, 'Test Message', 'Description ', '2017-07-28', 1, 1),
(2, 1, 3, 'Test msg 2', 'Description 2', '2017-07-30', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pms_project`
--

CREATE TABLE `pms_project` (
  `ID` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` varchar(500) NOT NULL,
  `location` varchar(200) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `assigned_to` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pms_project`
--

INSERT INTO `pms_project` (`ID`, `name`, `description`, `location`, `start_date`, `end_date`, `assigned_to`, `status`, `active`) VALUES
(1, 'Project 3', 'description', 'location', '2017-07-04', '2017-07-08', '2', 1, 1),
(2, 'Project 2', 'description', 'location', '2017-07-05', '2017-07-15', 'assigned_to', 1, 1),
(5, 'Project 1', 'qwe', 'wqe', '2017-07-25', '2017-07-17', '1', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pms_task`
--

CREATE TABLE `pms_task` (
  `ID` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `assigned_to` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pms_task`
--

INSERT INTO `pms_task` (`ID`, `project_id`, `name`, `description`, `start_date`, `end_date`, `assigned_to`, `status`, `active`) VALUES
(1, 1, 'Task 1', 'task 1. project 1 ', '2017-07-23', '2017-07-31', 1, 1, 1),
(2, 1, 'Task 2', 'Task 2. Project 2. user 2', '2017-07-05', '2017-07-31', 2, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pms_user`
--

CREATE TABLE `pms_user` (
  `ID` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pms_user`
--

INSERT INTO `pms_user` (`ID`, `user_id`, `firstname`, `email`, `status`) VALUES
(1, 1, 'Administrator', 'sayushpalakkal@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_log`
--

CREATE TABLE `users_log` (
  `ID` int(11) NOT NULL,
  `loggedin` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_log`
--

INSERT INTO `users_log` (`ID`, `loggedin`, `email`) VALUES
(1, '12', '12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pms_login`
--
ALTER TABLE `pms_login`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `pms_message`
--
ALTER TABLE `pms_message`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `pms_project`
--
ALTER TABLE `pms_project`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `pms_task`
--
ALTER TABLE `pms_task`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `pms_user`
--
ALTER TABLE `pms_user`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users_log`
--
ALTER TABLE `users_log`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pms_login`
--
ALTER TABLE `pms_login`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pms_message`
--
ALTER TABLE `pms_message`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pms_project`
--
ALTER TABLE `pms_project`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `pms_task`
--
ALTER TABLE `pms_task`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pms_user`
--
ALTER TABLE `pms_user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users_log`
--
ALTER TABLE `users_log`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
