-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2016 at 05:04 PM
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
-- Table structure for table `login_info`
--

CREATE TABLE IF NOT EXISTS `login_info` (
`id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `encrpass` varchar(50) NOT NULL,
  `myfile` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_info`
--

INSERT INTO `login_info` (`id`, `name`, `email`, `password`, `encrpass`, `myfile`) VALUES
(1, 'Moin', 'aa@aa.aa', 'aaa', '47bce5c74f589f4867dbd57e9ca9f808', '../../uploads/1466934852.jpg'),
(2, 'admin', 'as@as.as', 'aa', '4124bc0a9335c27f086f24ba207a4912', '../../uploads/1466934852.jpg');

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
  `batch` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`id`, `name`, `email`, `contact`, `age`, `doj`, `totalfees`, `feespaid`, `address`, `myfile`, `batch`) VALUES
(2, 'tousif', 'tousif@yahoo.co.in', '7204704252', 30, '05/15/2016', 10000, 7800, 'House no 9, Old post office road, camp, Belgaum', '../../uploads/1466879194.jpg', 'regular'),
(4, 'Sourabh', 'test@test.test', '9876543210', 25, '06/21/2016', 2000, 1200, 'Bapat galli , house 13', '../../uploads/1466879077.jpg', 'monday'),
(14, 'Tousif Sayyed', 'tousifcooldude@yahoo.co.in', '7204704252', 20, '06/14/2016', 5000, 1000, 'House no 9, Old post office road, camp, Belgaum', '../../uploads/1466879194.jpg', 'regular'),
(15, 'ravindra', 'ravya@gmail.com', '8923648932', 24, '06/09/2016', 3000, 500, 'tilakwadi , lokhandwala complex', '../../uploads/1467083668.jpg', 'monday');

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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `student_info`
--
ALTER TABLE `student_info`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
