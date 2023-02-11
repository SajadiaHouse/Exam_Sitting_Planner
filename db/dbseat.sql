-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 12, 2022 at 07:24 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbseat`
--

-- --------------------------------------------------------

--
-- Table structure for table `grid`
--

DROP TABLE IF EXISTS `grid`;
CREATE TABLE IF NOT EXISTS `grid` (
  `gid` int(11) NOT NULL AUTO_INCREMENT,
  `rows` varchar(50) NOT NULL,
  `col` varchar(50) NOT NULL,
  `seat` varchar(50) NOT NULL,
  `exam_type` varchar(200) NOT NULL,
  `center` varchar(200) NOT NULL,
  PRIMARY KEY (`gid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grid`
--

INSERT INTO `grid` (`gid`, `rows`, `col`, `seat`, `exam_type`, `center`) VALUES
(1, '10', '7', '70', 'Mid Term Exam', 'Virtual Universty'),
(3, '8', '6', '42', 'Mid term', 'Lahore center');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `std_id` int(6) NOT NULL AUTO_INCREMENT,
  `std_name` varchar(200) NOT NULL,
  `std_exam_id` varchar(100) NOT NULL,
  `subject_code` varchar(100) NOT NULL,
  `std_class` varchar(10) NOT NULL,
  PRIMARY KEY (`std_id`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`std_id`, `std_name`, `std_exam_id`, `subject_code`, `std_class`) VALUES
(1, 'abc', '0987654', 'CS201', '1'),
(2, 'abc', '09874654', 'CS201', '1'),
(3, 'abc', '09876554', 'CS202', '1'),
(4, 'abc', '09876654', 'CS203', '1'),
(5, 'abc', '09877654', 'CS203', '1'),
(6, 'abc', '09887654', 'CS203', '1'),
(7, 'abc', '09876054', 'CS202', '1'),
(8, 'abc', '09879654', 'CS202', '1'),
(9, 'abc', '098765SP4', 'CS202', '1'),
(10, 'abc', '098765I4', 'CS205', '1'),
(11, 'abc', '098765SO4', 'CS204', '1'),
(12, 'abc', '0987654U', 'CS205', '1'),
(13, 'abc', '098765S4', 'CS204', '1'),
(14, 'abc', '0987654Y', 'CS205', '1'),
(15, 'abc', '098765T4', 'CS201', '1'),
(16, 'abc', '098765R4', 'CS201', '1'),
(17, 'abc', '09876D54', 'CS203', '1'),
(18, 'abc', '098765L4', 'CS204', '1'),
(19, 'abc', '098765D4', 'CS204', '1'),
(20, 'abc', '09876454', 'CS206', '1'),
(21, 'abc', '09876R54', 'CS207', '1'),
(22, 'abc', '09876O54', 'CS208', '1'),
(23, 'abc', '0987654J', 'CS208', '1'),
(24, 'abc', '098765D4', 'CS209', '1'),
(25, 'abc', '098765H4', 'CS202', '1'),
(26, 'abc', '098765F4', 'CS203', '1'),
(27, 'abc', '098765F4', 'CS205', '1'),
(28, 'abc', '0987654A', 'CS207', '1'),
(29, 'abc', '09876544', 'CS204', '1'),
(30, 'abc', '098765457', 'CS207', '1'),
(31, 'abc', '09876574', 'CS207', '1'),
(32, 'xyz', '87654', 'CS301', '2'),
(33, 'xyz', '87654', 'CS301', '2'),
(34, 'xyz', '87654', 'CS301', '2'),
(35, 'xyz', '87654', 'CS302', '2'),
(36, 'xyz', '87654', 'CS301', '2'),
(37, 'xyz', '87654', 'CS303', '2'),
(38, 'xyz', '87654', 'CS304', '2'),
(39, 'xyz', '87654', 'CS305', '2'),
(40, 'xyz', '87654', 'CS305', '2'),
(41, 'xyz', '87654', 'CS307', '2'),
(42, 'xyz', '87654', 'CS307', '2'),
(43, 'xyz', '87654', 'CS308', '2'),
(44, 'xyz', '87654', 'CS309', '2'),
(45, 'xyz', '87654', 'CS302', '2'),
(46, 'xyz', '87654', 'CS304', '2'),
(47, 'xyz', '87654', 'CS301', '2');

-- --------------------------------------------------------

--
-- Table structure for table `s_user`
--

DROP TABLE IF EXISTS `s_user`;
CREATE TABLE IF NOT EXISTS `s_user` (
  `uid` int(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `cell` varchar(50) NOT NULL,
  `department` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type` varchar(50) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `s_user`
--

INSERT INTO `s_user` (`uid`, `name`, `email`, `cell`, `department`, `password`, `type`) VALUES
(7, 'abc', 'abc@gmail.com', '23456789', 'South', '1234', 'user'),
(8, 'xyz', 'xyz@gmail.com', '12345678', 'vu', '1234', 'user');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
