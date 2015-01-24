-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2015 at 08:17 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `j2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(40) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(130) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `username`, `password`) VALUES
(1, 'Admin', 'temp', '1fcff248de3a0dd21de0ee4a37b7bd7e418323e7c1b8c03f5f2967a7a697f363d4316254ed4515a0ae49927eb8805577294da1e75fb87e21c3744b2ec7b4ddfe');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE IF NOT EXISTS `attendance` (
  `student_id` int(11) NOT NULL,
  `subject_code` varchar(10) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `attendance` int(11) DEFAULT NULL,
  `total_classes` int(11) NOT NULL,
  `final_submit` tinyint(4) NOT NULL DEFAULT '0',
  `submit` tinyint(4) NOT NULL DEFAULT '0',
  `saved` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`student_id`,`subject_code`,`from_date`,`to_date`),
  KEY `subject_code` (`subject_code`),
  KEY `from_date` (`from_date`,`to_date`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`student_id`, `subject_code`, `from_date`, `to_date`, `attendance`, `total_classes`, `final_submit`, `submit`, `saved`) VALUES
(123, 'CEN-401', '2015-01-23', '2015-01-24', 1, 2, 1, 1, 0),
(123, 'CEN-402', '2015-01-23', '2015-01-24', 1, 2, 0, 1, 0),
(123, 'CEN-403', '2015-01-23', '2015-01-24', 2, 2, 0, 1, 0),
(123, 'CEN-404', '2015-01-23', '2015-01-24', 2, 2, 0, 1, 0),
(234, 'CEN-401', '2015-01-23', '2015-01-24', 2, 2, 1, 1, 0),
(234, 'CEN-402', '2015-01-23', '2015-01-24', 1, 2, 0, 1, 0),
(234, 'CEN-403', '2015-01-23', '2015-01-24', 1, 2, 0, 1, 0),
(234, 'CEN-404', '2015-01-23', '2015-01-24', 1, 2, 0, 1, 0),
(9897, 'CEN-401', '2015-01-23', '2015-01-24', 1, 2, 1, 1, 0),
(9897, 'CEN-402', '2015-01-23', '2015-01-24', 1, 2, 0, 1, 0),
(9897, 'CEN-403', '2015-01-23', '2015-01-24', 2, 2, 0, 1, 0),
(9897, 'CEN-404', '2015-01-23', '2015-01-24', 2, 2, 0, 1, 0),
(9898, 'CEN-401', '2015-01-23', '2015-01-24', 1, 2, 1, 1, 0),
(9898, 'CEN-402', '2015-01-23', '2015-01-24', 2, 2, 0, 1, 0),
(9898, 'CEN-403', '2015-01-23', '2015-01-24', 1, 2, 0, 1, 0),
(9898, 'CEN-404', '2015-01-23', '2015-01-24', 2, 2, 0, 1, 0),
(9899, 'CEN-401', '2015-01-23', '2015-01-24', 2, 2, 1, 1, 0),
(9899, 'CEN-402', '2015-01-23', '2015-01-24', 2, 2, 0, 1, 0),
(9899, 'CEN-403', '2015-01-23', '2015-01-24', 1, 2, 0, 1, 0),
(9899, 'CEN-404', '2015-01-23', '2015-01-24', 1, 2, 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '''0''',
  `ip_address` varchar(45) NOT NULL DEFAULT '''0''',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) NOT NULL DEFAULT '0',
  `user_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('cbedd9686160becf40f3f9705f1215a4', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:35.0) Gecko/20100101 Firefox/35.0', 1422083834, '');

-- --------------------------------------------------------

--
-- Table structure for table `period`
--

CREATE TABLE IF NOT EXISTS `period` (
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `timstamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`from_date`,`to_date`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `period`
--

INSERT INTO `period` (`from_date`, `to_date`, `timstamp`) VALUES
('2015-01-23', '2015-01-24', '2015-01-24 07:10:31');

-- --------------------------------------------------------

--
-- Table structure for table `sessionals`
--

CREATE TABLE IF NOT EXISTS `sessionals` (
  `subject_code` varchar(10) NOT NULL,
  `student_id` int(11) NOT NULL,
  `current_year` year(4) NOT NULL,
  `type` tinyint(4) NOT NULL,
  `total_marks` int(11) NOT NULL,
  `marks` int(11) NOT NULL,
  `timstamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`subject_code`,`student_id`,`current_year`,`type`),
  KEY `student_id` (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `student_id` int(11) NOT NULL,
  `roll_number` varchar(10) NOT NULL,
  `student_name` varchar(40) NOT NULL,
  `semester` tinyint(1) NOT NULL,
  `batch` year(4) NOT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `roll_number`, `student_name`, `semester`, `batch`) VALUES
(123, '12CSS13', 'John Guttag', 4, 1997),
(234, '15CSS78', 'Bob Marley', 4, 1998),
(9897, '10sww77', 'Peter', 4, 2012),
(9898, '10mpp78', 'Harry', 4, 2012),
(9899, '10sww78', 'Tom', 4, 2012);

-- --------------------------------------------------------

--
-- Table structure for table `studies`
--

CREATE TABLE IF NOT EXISTS `studies` (
  `student_id` int(11) NOT NULL,
  `subject_code` varchar(10) NOT NULL,
  PRIMARY KEY (`student_id`,`subject_code`),
  KEY `subject_code` (`subject_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `subject_code` varchar(10) NOT NULL,
  `subject_name` varchar(50) NOT NULL,
  `subject_abbr` varchar(10) NOT NULL,
  `semester` tinyint(1) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  PRIMARY KEY (`subject_code`),
  KEY `teacher_id` (`teacher_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_code`, `subject_name`, `subject_abbr`, `semester`, `teacher_id`) VALUES
('CEN-301', 'Data Structures and Programming', 'DS', 3, 0),
('CEN-302', 'Digital Logic Theory', 'DLT', 3, 0),
('CEN-303', 'Discrete Mathematics', 'DM', 3, 0),
('CEN-304', 'Electronic Devices and Applications', 'EDA', 3, 0),
('CEN-305', 'Mathematics-1', 'MA', 3, 0),
('CEN-306', 'Signals and Systems', 'SS', 3, 0),
('CEN-401', 'Computer Organization', 'CO', 4, 41),
('CEN-402', 'Operating System - 1', 'OS1', 4, 41),
('CEN-403', 'Information Technology', 'IT', 4, 41),
('CEN-404', 'Analog and Digital Communication', 'ADC', 4, 41),
('CEN-405', 'Mathematics-2', 'MA2', 4, 0),
('CEN-406', 'System Software', 'SS', 4, 0),
('CEN-501', 'Computer Architecture', 'CA', 5, 0),
('CEN-502', 'Automata Theory', 'AT', 5, 0),
('CEN-503', 'Computer Network-1', 'CN1', 5, 0),
('CEN-504', 'Database Systems', 'DBMS', 5, 0),
('CEN-505', 'Microprocessor', 'MC', 5, 0),
('CEN-506', 'Operating Systems-2', 'OS2', 5, 0),
('CEN-701', 'Internet Fundamentals', 'IF', 7, 0),
('CEN-702', 'Management Science', 'MS', 7, 0),
('CEN-703', 'Language Proccessor 2', 'LP2', 7, 0),
('CEN-704', 'Mobile Communication', 'MC', 7, 0),
('CEN-705', 'Data Mining', 'DM', 7, 0),
('CEN-706', 'Embedded System', 'ES', 7, 0),
('CEN-801', 'Advanced algorithms & current trends in computing', 'AACTC', 8, 0),
('CEN-802', 'Artificial Intelligence', 'AI', 8, 0),
('CEN-803', 'Software Project Management', 'SPM', 8, 0),
('CEN-804', 'Distributed Processing', 'DP', 8, 0),
('CS-201', 'Fundamentals of Computing', 'FC', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE IF NOT EXISTS `teacher` (
  `teacher_id` int(11) NOT NULL AUTO_INCREMENT,
  `teacher_name` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(130) NOT NULL,
  PRIMARY KEY (`teacher_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `teacher_name`, `email`, `username`, `password`) VALUES
(0, 'void', 'zishanrbp@gmail.com', 'void', 'void'),
(41, 'Teacher 1', '', 'teacher', '01fb5a6bfeeac3e520094442c9eddc34471c2a907a56b9a6baddcaf390def046e1daf65dd41b238fd03cdd4c95012802f44cb059497dbd5a16c00aa79e355aa6');

-- --------------------------------------------------------

--
-- Table structure for table `total_attendance`
--

CREATE TABLE IF NOT EXISTS `total_attendance` (
  `student_id` int(11) NOT NULL,
  `subject_code` varchar(10) NOT NULL,
  `attendance` int(11) NOT NULL,
  `semester` tinyint(1) NOT NULL,
  `batch` year(4) NOT NULL,
  `total_classes` int(11) NOT NULL,
  `year` year(4) NOT NULL,
  PRIMARY KEY (`student_id`,`subject_code`,`semester`,`batch`,`year`),
  KEY `subject_code` (`subject_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`),
  ADD CONSTRAINT `attendance_ibfk_2` FOREIGN KEY (`subject_code`) REFERENCES `subject` (`subject_code`),
  ADD CONSTRAINT `attendance_ibfk_3` FOREIGN KEY (`from_date`) REFERENCES `period` (`from_date`),
  ADD CONSTRAINT `attendance_ibfk_4` FOREIGN KEY (`from_date`, `to_date`) REFERENCES `period` (`from_date`, `to_date`);

--
-- Constraints for table `sessionals`
--
ALTER TABLE `sessionals`
  ADD CONSTRAINT `sessionals_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sessionals_ibfk_2` FOREIGN KEY (`subject_code`) REFERENCES `subject` (`subject_code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `studies`
--
ALTER TABLE `studies`
  ADD CONSTRAINT `studies_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`),
  ADD CONSTRAINT `studies_ibfk_2` FOREIGN KEY (`subject_code`) REFERENCES `subject` (`subject_code`);

--
-- Constraints for table `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `subject_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`teacher_id`);

--
-- Constraints for table `total_attendance`
--
ALTER TABLE `total_attendance`
  ADD CONSTRAINT `total_attendance_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `total_attendance_ibfk_2` FOREIGN KEY (`subject_code`) REFERENCES `subject` (`subject_code`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
