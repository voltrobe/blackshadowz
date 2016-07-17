-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2016 at 03:19 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `shadow`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE IF NOT EXISTS `attendance` (
  `studid` int(10) NOT NULL,
  `studname` varchar(100) NOT NULL,
  `studbatch` varchar(20) NOT NULL,
  `attendance` varchar(10) NOT NULL DEFAULT 'absent',
  `attenddate` bigint(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`studid`, `studname`, `studbatch`, `attendance`, `attenddate`) VALUES
(14, 'Tousif Sayyed', 'regular', 'absent', 1468745476),
(15, 'ravindra', 'monday', 'present', 1468759407),
(4, 'Sourabh', 'monday', 'absent', 1468759968);

-- --------------------------------------------------------

--
-- Table structure for table `login_info`
--

CREATE TABLE IF NOT EXISTS `login_info` (
`id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `encrpass` varchar(50) NOT NULL,
  `myfile` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_info`
--

INSERT INTO `login_info` (`id`, `name`, `email`, `password`, `encrpass`, `myfile`) VALUES
(1, 'Moin', 'aa@aa.aa', 'aaa', '47bce5c74f589f4867dbd57e9ca9f808', '../../uploads/1466934852.jpg'),
(3, 'rahul', 'rahul@rahul.com', 'rahul', '439ed537979d8e831561964dbbbd7413', '../../uploads/1467224863.jpg'),
(4, 'im', 'im@im.im', 'im', '73bebce395b6f1efedcf6842fbdb4d76', '../../uploads/1467227435.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE IF NOT EXISTS `student_info` (
`id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact` varchar(30) NOT NULL,
  `age` int(11) NOT NULL,
  `doj` varchar(30) NOT NULL,
  `totalfees` int(11) NOT NULL,
  `feespaid` int(11) NOT NULL,
  `address` varchar(50) NOT NULL,
  `myfile` varchar(30) NOT NULL,
  `batch` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `occupation` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`id`, `name`, `email`, `contact`, `age`, `doj`, `totalfees`, `feespaid`, `address`, `myfile`, `batch`, `gender`, `occupation`) VALUES
(2, 'tousif', 'tousif@yahoo.co.in', '7204704252', 30, '05/15/2016', 10000, 8400, 'House no 9, Old post office road, camp, Belgaum', '../../uploads/1466879194.jpg', 'weekend', 'male', 'engineer'),
(4, 'Sourabh', 'test@test.test', '9876543210', 25, '06/21/2016', 2000, 1200, 'Bapat galli , house 13', '../../uploads/1466879077.jpg', 'monday', 'male', 'student'),
(14, 'Tousif Sayyed', 'tousifcooldude@yahoo.co.in', '7204704252', 20, '06/14/2016', 5000, 1050, 'House no 9, Old post office road, camp, Belgaum', '../../uploads/1466879194.jpg', 'regular', 'male', 'student'),
(15, 'ravindra', 'ravya@gmail.com', '8923648932', 24, '06/09/2016', 3000, 500, 'tilakwadi , lokhandwala complex', '../../uploads/1467083668.jpg', 'monday', 'male', 'doctor'),
(16, 'santosh', 'vebcrumbs@gmail.com', '9864816487', 26, '07/15/2016', 2000, 600, 'tilakwadi , belgaum', '../../uploads/1468668866.jpg', 'tuesday', 'male', 'officer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login_info`
--
ALTER TABLE `login_info`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login_info`
--
ALTER TABLE `login_info`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `student_info`
--
ALTER TABLE `student_info`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
