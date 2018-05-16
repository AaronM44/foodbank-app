-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 16, 2018 at 04:13 PM
-- Server version: 5.7.11
-- PHP Version: 5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodbank`

drop database foodbank;
--
CREATE DATABASE IF NOT EXISTS `foodbank` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `foodbank`;

-- --------------------------------------------------------

--
-- Table structure for table `application_details`
--

DROP TABLE IF EXISTS `application_details`;
CREATE TABLE `application_details` (
  `vol_no` int(3) NOT NULL,
  `OneOff` tinyint(1) DEFAULT NULL,
  `OnetoFour` tinyint(1) DEFAULT NULL,
  `Days` varchar(50) DEFAULT NULL,
  `otherAvailability` varchar(75) DEFAULT NULL,
  `why_interested` varchar(150) NOT NULL,
  `previous_work` varchar(100) DEFAULT NULL,
  `health_problems` varchar(100) DEFAULT NULL,
  `PVG` tinyint(1) DEFAULT NULL,
  `convictions` varchar(150) DEFAULT NULL,
  `further_info` varchar(100) DEFAULT NULL,
  `hear_about_FB` varchar(50) DEFAULT NULL,
  `date_applied` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `checklist_actions`
--

DROP TABLE IF EXISTS `checklist_actions`;
CREATE TABLE `checklist_actions` (
  `vol_no` int(3) NOT NULL,
  `actions` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `checklist_once_started`
--

DROP TABLE IF EXISTS `checklist_once_started`;
CREATE TABLE `checklist_once_started` (
  `vol_no` int(3) NOT NULL,
  `once_started` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `further_details`
--

DROP TABLE IF EXISTS `further_details`;
CREATE TABLE `further_details` (
  `vol_no` int(3) NOT NULL,
  `why_interested` varchar(100) NOT NULL,
  `working_towards_award` varchar(30) DEFAULT NULL,
  `PVG` tinyint(1) DEFAULT NULL,
  `convictions` varchar(50) DEFAULT NULL,
  `further_info` varchar(75) DEFAULT NULL,
  `hear_about_FB` varchar(100) NOT NULL,
  `vol_area` varchar(40) NOT NULL,
  `start_date` date NOT NULL,
  `regular_days` varchar(50) NOT NULL,
  `supervisor` varchar(20) NOT NULL,
  `buddy` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `interests`
--

DROP TABLE IF EXISTS `interests`;
CREATE TABLE `interests` (
  `interest_no` int(3) NOT NULL,
  `interest_areas` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `volunteer_details`
--

DROP TABLE IF EXISTS `volunteer_details`;
CREATE TABLE `volunteer_details` (
  `vol_no` int(3) NOT NULL,
  `title` varchar(15) NOT NULL,
  `forename` varchar(20) NOT NULL,
  `surname` varchar(25) NOT NULL,
  `address1` varchar(40) NOT NULL,
  `postcode` varchar(8) NOT NULL,
  `tel_no` varchar(12) NOT NULL,
  `email` varchar(30) NOT NULL,
  `DOB` date NOT NULL,
  `EM_name` varchar(20) NOT NULL,
  `EM_tel` varchar(20) NOT NULL,
  `EM_rel` varchar(30) NOT NULL,
  `R1_name` varchar(20) NOT NULL,
  `R1_email` varchar(40) NOT NULL,
  `R1_tel` varchar(12) NOT NULL,
  `R1_rel` varchar(20) NOT NULL,
  `R2_name` varchar(20) DEFAULT NULL,
  `R2_email` varchar(30) DEFAULT NULL,
  `R2_tel` varchar(12) DEFAULT NULL,
  `R2_rel` varchar(20) DEFAULT NULL,
  `vol_status` varchar(10) DEFAULT NULL,
  `address2` varchar(75) DEFAULT NULL,
  `town` varchar(35) DEFAULT NULL,
  `awards` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vol_interests`
--

DROP TABLE IF EXISTS `vol_interests`;
CREATE TABLE `vol_interests` (
  `vol_no` int(3) NOT NULL,
  `interest_no` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vol_weekly_hours`
--

DROP TABLE IF EXISTS `vol_weekly_hours`;
CREATE TABLE `vol_weekly_hours` (
  `vol_no` int(3) NOT NULL,
  `date_` date NOT NULL,
  `day_` varchar(20) NOT NULL,
  `hours` int(2) NOT NULL,
  `area` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `application_details`
--
ALTER TABLE `application_details`
  ADD PRIMARY KEY (`vol_no`);

--
-- Indexes for table `checklist_actions`
--
ALTER TABLE `checklist_actions`
  ADD PRIMARY KEY (`vol_no`,`actions`);

--
-- Indexes for table `checklist_once_started`
--
ALTER TABLE `checklist_once_started`
  ADD PRIMARY KEY (`vol_no`,`once_started`);

--
-- Indexes for table `further_details`
--
ALTER TABLE `further_details`
  ADD PRIMARY KEY (`vol_no`);

--
-- Indexes for table `interests`
--
ALTER TABLE `interests`
  ADD PRIMARY KEY (`interest_no`);

--
-- Indexes for table `volunteer_details`
--
ALTER TABLE `volunteer_details`
  ADD PRIMARY KEY (`vol_no`);

--
-- Indexes for table `vol_interests`
--
ALTER TABLE `vol_interests`
  ADD PRIMARY KEY (`vol_no`,`interest_no`),
  ADD KEY `interest_no` (`interest_no`);

--
-- Indexes for table `vol_weekly_hours`
--
ALTER TABLE `vol_weekly_hours`
  ADD PRIMARY KEY (`vol_no`,`date_`,`day_`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `interests`
--
ALTER TABLE `interests`
  MODIFY `interest_no` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `volunteer_details`
--
ALTER TABLE `volunteer_details`
  MODIFY `vol_no` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `application_details`
--
ALTER TABLE `application_details`
  ADD CONSTRAINT `application_details_ibfk_1` FOREIGN KEY (`vol_no`) REFERENCES `volunteer_details` (`vol_no`);

--
-- Constraints for table `checklist_actions`
--
ALTER TABLE `checklist_actions`
  ADD CONSTRAINT `checklist_actions_ibfk_1` FOREIGN KEY (`vol_no`) REFERENCES `volunteer_details` (`vol_no`);

--
-- Constraints for table `checklist_once_started`
--
ALTER TABLE `checklist_once_started`
  ADD CONSTRAINT `checklist_once_started_ibfk_1` FOREIGN KEY (`vol_no`) REFERENCES `volunteer_details` (`vol_no`);

--
-- Constraints for table `vol_interests`
--
ALTER TABLE `vol_interests`
  ADD CONSTRAINT `vol_interests_ibfk_1` FOREIGN KEY (`vol_no`) REFERENCES `volunteer_details` (`vol_no`),
  ADD CONSTRAINT `vol_interests_ibfk_2` FOREIGN KEY (`interest_no`) REFERENCES `interests` (`interest_no`);

--
-- Constraints for table `vol_weekly_hours`
--
ALTER TABLE `vol_weekly_hours`
  ADD CONSTRAINT `vol_weekly_hours_ibfk_1` FOREIGN KEY (`vol_no`) REFERENCES `volunteer_details` (`vol_no`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
