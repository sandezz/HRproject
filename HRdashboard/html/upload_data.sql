-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2016 at 08:50 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testdatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `upload_data`
--

CREATE TABLE `upload_data` (
  `ID` int(5) NOT NULL,
  `USER_CODE` int(4) UNSIGNED ZEROFILL NOT NULL,
  `FILE_NAME` varchar(200) NOT NULL,
  `FILE_SIZE` varchar(200) NOT NULL,
  `FILE_TYPE` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upload_data`
--

INSERT INTO `upload_data` (`ID`, `USER_CODE`, `FILE_NAME`, `FILE_SIZE`, `FILE_TYPE`) VALUES
(3, 0000, '020161128_105720.jpg', '5901352', 'image/jpeg'),
(4, 0000, '020161128_110225.jpg', '1423835', 'image/jpeg'),
(5, 0000, '020161128_105655.jpg', '5148954', 'image/jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `upload_data`
--
ALTER TABLE `upload_data`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `upload_data`
--
ALTER TABLE `upload_data`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
