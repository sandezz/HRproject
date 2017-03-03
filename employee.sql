-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 27, 2016 at 03:38 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `employee`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(20) NOT NULL,
  `username` text NOT NULL,
  `date1` date NOT NULL,
  `check_in` time NOT NULL,
  `check_out` time NOT NULL,
  `total_hours` text NOT NULL,
  `reason` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `username`, `date1`, `check_in`, `check_out`, `total_hours`, `reason`) VALUES
(1, 'sdahal', '2016-12-13', '15:41:13', '00:00:00', '00:00:00', ''),
(2, 'spokharel', '2016-12-13', '15:50:13', '00:00:00', '00:00:00', ''),
(3, 'bbasnet', '2016-12-13', '16:05:32', '00:00:00', '00:00:00', ''),
(4, 'nkayastha', '2016-12-13', '16:24:45', '00:00:00', '00:00:00', ''),
(5, 'rpaudel', '2016-12-13', '16:26:41', '00:00:00', '00:00:00', ''),
(6, 'sdahal', '2016-12-14', '08:18:00', '08:18:25', '00:00:00', ''),
(7, 'dadhikari', '2016-12-14', '08:33:27', '00:00:00', '00:00:00', ''),
(8, 'stimsina', '2016-12-14', '08:49:51', '00:00:00', '00:00:00', ''),
(9, 'rpaudel', '2016-12-14', '09:02:07', '09:06:06', '00:00:00', ''),
(10, 'bdahal', '2016-12-14', '09:06:42', '09:06:54', '00:00:00', ''),
(11, 'nkayastha', '2016-12-14', '09:13:19', '00:00:00', '00:00:00', ''),
(12, 'sshrestha', '2016-12-14', '11:34:20', '00:00:00', '00:00:00', ''),
(13, 'spandit', '2016-12-14', '11:35:26', '00:00:00', '00:00:00', ''),
(14, 'nkayastha', '2016-12-15', '09:25:16', '15:05:34', '00:00:00', 'working!!'),
(15, 'usilwal', '2016-12-15', '09:25:50', '00:00:00', '00:00:00', ''),
(16, 'stimsina', '2016-12-15', '11:05:35', '00:00:00', '00:00:00', ''),
(17, 'rpaudel', '2016-12-15', '14:18:26', '00:00:00', '00:00:00', ''),
(18, 'mtaslima', '2016-12-16', '08:16:34', '00:00:00', '00:00:00', ''),
(19, 'rpaudel', '2016-12-16', '08:30:49', '00:00:00', '00:00:00', 'testing\r\n'),
(20, 'nkayastha', '2016-12-16', '12:51:59', '16:20:39', '3hr:3min', ''),
(21, 'slamichhane', '2016-12-16', '13:35:41', '00:00:00', '00:00:00', ''),
(22, 'stimsina', '2016-12-16', '13:36:01', '16:11:57', '2hr:34min', 'okay'),
(23, 'sdahal', '2016-12-16', '16:27:45', '16:30:24', '-17h:-28m', ''),
(24, 'rpaudel', '2016-12-19', '08:35:35', '09:08:28', '0h:32m', ''),
(25, 'nkayastha', '2016-12-19', '09:09:43', '10:11:11', '1h:1m', 'okay'),
(26, 'stimsina', '2016-12-19', '11:45:25', '12:43:37', '0h:58m', ''),
(27, 'rpaudel', '2016-12-21', '11:28:41', '15:50:33', '1h:20m', ''),
(28, 'nkayastha', '2016-12-21', '15:50:41', '00:00:00', '', ''),
(29, 'rpaudel', '2016-12-22', '08:26:17', '11:23:42', '2h:57m', ''),
(30, 'nkayastha', '2016-12-22', '11:24:03', '11:36:03', '0h:12m', ''),
(31, 'spokharel', '2016-12-22', '15:00:04', '00:00:00', '', ''),
(32, 'rpaudel', '2016-12-23', '08:15:06', '16:43:22', '8h:28m', 'okay i was late because of heavy snowfall.'),
(33, 'Sdahal', '2016-12-23', '08:35:37', '00:00:00', '', ''),
(34, 'rpaudel', '2016-12-26', '08:27:55', '16:35:36', '8h:7m', ''),
(35, 'sdahal', '2016-12-26', '12:43:02', '00:00:00', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `full_name` text NOT NULL,
  `fname` text NOT NULL,
  `mname` text NOT NULL,
  `lname` varchar(50) NOT NULL,
  `dob` text NOT NULL,
  `address` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `mobile` varchar(25) NOT NULL,
  `department` varchar(50) NOT NULL,
  `employeetype` varchar(50) NOT NULL,
  `hiredate` text NOT NULL,
  `worklocation` varchar(50) NOT NULL,
  `nationality` text NOT NULL,
  `bloodgroup` varchar(5) NOT NULL,
  `citizenshipno` varchar(20) NOT NULL,
  `emergencyno` varchar(25) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `marital` varchar(20) NOT NULL,
  `medical` text NOT NULL,
  `previouscomp` varchar(70) NOT NULL,
  `previousjob` varchar(30) NOT NULL,
  `fromdate` text NOT NULL,
  `todate` text NOT NULL,
  `job` text NOT NULL,
  `education` varchar(50) NOT NULL,
  `fieldofstudy` varchar(50) NOT NULL,
  `interest` text NOT NULL,
  `familyname` varchar(50) NOT NULL,
  `familyrel` varchar(30) NOT NULL,
  `familyno` text NOT NULL,
  `aboutyou` text NOT NULL,
  `hrnote` text NOT NULL,
  `mnote` text NOT NULL,
  `status` varchar(50) NOT NULL,
  `state` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `country` varchar(30) NOT NULL,
  `licenceno` varchar(25) NOT NULL,
  `prevdepartment` varchar(50) NOT NULL,
  `degree_year` text NOT NULL,
  `userPic` varchar(500) NOT NULL,
  `salary` int(11) NOT NULL,
  `cit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`id`, `username`, `password`, `full_name`, `fname`, `mname`, `lname`, `dob`, `address`, `email`, `phone`, `mobile`, `department`, `employeetype`, `hiredate`, `worklocation`, `nationality`, `bloodgroup`, `citizenshipno`, `emergencyno`, `gender`, `marital`, `medical`, `previouscomp`, `previousjob`, `fromdate`, `todate`, `job`, `education`, `fieldofstudy`, `interest`, `familyname`, `familyrel`, `familyno`, `aboutyou`, `hrnote`, `mnote`, `status`, `state`, `city`, `country`, `licenceno`, `prevdepartment`, `degree_year`, `userPic`, `salary`, `cit`) VALUES
(1, 'sdahal', 'Zi4kHNU2rt3Ww56xDAvxT5gQgBIJhD9XWMBjEx0JUs8=', 'Sagarika Dahal', '', '', '', '', '', '', '', '', 'Manager', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0),
(2, 'sparajuli', '1iz1de3p9P92Rhg57Cuva/Ee4BsCBkSjbJ/UHB6iWjM=', 'Sunil  Parajuli', '', '', '', '', '', 'sparajuli@sevadev.com', '', '', 'Manager', '', '', '', '', 'Consu', '', '', 'Female', 'Divorced', '', '', '', '', '', '', '', 'O-Level', '', '', '', '', '', '', '', 'active', '', '', '', '', '', '', '127981.jpg', 0, 0),
(3, 'spokharel', 'siD4legRylJCQsZiPqwVzqhSDqNEOd1JCmSSAA85o3w=', 'Sanjaya   Pokharel', '', '', '', '', '', 'spokharel@sevadev.com', '', '', 'Consultant', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', '', '', '', '', '', '', '', 0, 0),
(4, 'bbasnet', 'RkEdYsF5qk8hw1GpVt8L0j0uYThzCUWHTHzMLJ96Igc=', 'Bijaya  Basnet', '', '', '', '', '', 'bbasnet@sevadev.com', '', '', 'Consultant', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', '', '', '', '', '', '', '', 0, 0),
(5, 'sbasnet', 'RkEdYsF5qk8hw1GpVt8L0j0uYThzCUWHTHzMLJ96Igc=', 'Saroj  Basnet', '', '', '', '', '', 'sbasnet@sevadev.com', '', '', 'Consultant', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', '', '', '', '', '', '', '', 0, 0),
(6, 'madhikari', 'OWBOlGyW7Y0Er2LsIsIjmD2bo7liePyjYYriNRHM6KU=', 'Madhusudan  Adhikari', '', '', '', '', '', 'madhikari@sevadev.com', '', '', 'Consultant', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', '', '', '', '', '', '', '', 0, 0),
(7, 'rdahal', 'Zi4kHNU2rt3Ww56xDAvxT5gQgBIJhD9XWMBjEx0JUs8=', 'Rammani  Dahal', '', '', '', '', '', 'rdahal@sevadev.com', '', '', 'Consultant', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', '', '', '', '', '', '', '', 0, 0),
(8, 'bdahal', 'Zi4kHNU2rt3Ww56xDAvxT5gQgBIJhD9XWMBjEx0JUs8=', 'Bishwas  Dahal', '', '', '', '', '', 'bdahal@sevadev.com', '', '', 'Consultant', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', '', '', '', '', '', '', '', 0, 0),
(9, 'rpaudel', 'ejol5mDwBLUsu6zWCch7sL6NAB7cir/lsmQ1NR5rIIE=', 'Rizu  Paudel', '', '', '', '', 'kth', 'rpaudel@sevadev.com', '243546', '', 'Consultant', 'full', '', '', '', 'Consu', '', '', 'Female', 'Yes', '', '', '', '', '', '', '', '', '', '', '', '', '', 'la', 'okay cha ta', 'active', 'kathmandu', '', '', '', '', '', '242923.jpg', 50000, 24),
(10, 'rshrestha', '8sh2VUbzMh+LzfKqJVYWaxdGXnWqmRaz6fz7HvtLlHI=', 'Ronish  Shrestha', '', '', '', '', '', 'rshrestha@sevadev.com', '', '', 'Consultant', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', '', '', '', '', '', '', '', 0, 0),
(11, 'sbhetwal', 'g7KsLzc1ERzmasnabuKakqMQyc1+i3WFP8Bj4ztBlPU=', 'Sandesh  Bhetwal', '', '', '', '', '', 'sbhetwal@sevadev.com', '', '', 'Consultant', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', '', '', '', '', '', '', '', 0, 0),
(12, 'pkafle', 'nx2KpOZ0xhMvPViNys9tovGLrAbXAlNgh/687kk8GGo=', 'Pramod  Kafle', '', '', '', '', '', 'pkafle@sevadev.com', '', '', 'Consultant', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', '', '', '', '', '', '', '', 0, 0),
(13, 'pacharya', 'oN5AhUCSGrmSaEgcOJ+pHxY8CWDQAmXWJGSRjqUtbNg=', 'Prabesh  Acharya', '', '', '', '', '', 'pacharya@sevadev.com', '', '', 'Consultant', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', '', '', '', '', '', '', '', 0, 0),
(14, 'usilwal', 'QzLXRwGSTKXMSoFu94mzURjOHj+UhqASJjZqa965+9Y=', 'Ujjwal  Silwal', '', '', '', '', '', 'usilwal@sevadev.com', '', '', 'Consultant', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', '', '', '', '', '', '', '', 0, 0),
(15, 'dadhikari', 'OWBOlGyW7Y0Er2LsIsIjmD2bo7liePyjYYriNRHM6KU=', 'Dipesh  Adhikari', '', '', '', '', '', 'dadhikari@sevadev.com', '', '', 'Consultant', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', '', '', '', '', '', '', '', 0, 0),
(16, 'dbhattarai', 'PQ3iQcjbQ/wFULwi0vuejOIkwJW/tEw+yqKQdbiZrTc=', 'Dipesh  Bhattarai', '', '', '', '', '', 'dbhattarai@sevadev.com', '', '', 'Consultant', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', '', '', '', '', '', '', '', 0, 0),
(17, 'ashrestha', '8sh2VUbzMh+LzfKqJVYWaxdGXnWqmRaz6fz7HvtLlHI=', 'Anjana  Shrestha', '', '', '', '', '', 'ashrestha@sevadev.com', '', '', 'Intern', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', '', '', '', '', '', '', '', 0, 0),
(18, 'bneupane', 'NKZi52GHtfB2/wG6tGg5OOhnTVtSWLGgTBDm1MEBhBE=', 'Baburam  Neupane', '', '', '', '', '', 'bneupane@sevadev.com', '', '', 'Intern', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', '', '', '', '', '', '', '', 0, 0),
(19, 'rdhakal', 'G4nNo84rmnQnq2YpI3CLBAY3u3zW4bPo47kFf9PByUE=', 'Ravi  Dhakal', '', '', '', '', '', 'rdhakal@sevadev.com', '', '', 'Intern', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', '', '', '', '', '', '', '', 0, 0),
(20, 'sacharya', 'oN5AhUCSGrmSaEgcOJ+pHxY8CWDQAmXWJGSRjqUtbNg=', 'Shreedhar  Acharya', '', '', '', '', '', 'sacharya@sevadev.com', '', '', 'Intern', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', '', '', '', '', '', '', '', 0, 0),
(21, 'stimsina', 'vOprEzX6EJTiMh3l5uEQFpQP1QETXqbRRIylDfWYZRA=', 'Sanju  Timsina', '', '', '', '', '', 'stimsina@sevadev.com', '', '', 'Intern', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'z zxc x', '', 'active', '', '', '', '', '', '', '', 0, 0),
(22, 'dbhandari', 'ZCMlNX8iiI4LWvrctrMNLvQ7CtvnDjkSpmpifpCI4NQ=', 'Damodar  Bhandari', '', '', '', '', '', 'dbhandari@sevadev.com', '', '', 'Intern', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', '', '', '', '', '', '', '', 0, 0),
(23, 'nirmita', 'iQVcGGOpsHIXRXU2e9j4AGVjTWmyQJ14LM5snjJdqkw=', 'Nirmita  K.C', '', '', '', '', '', 'nirmita931@gmail.com', '', '', 'Trainee', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', '', '', '', '', '', '', '', 0, 0),
(24, 'slamichhane', 'NuFGDzopwViL78YLB/UkZzW1hulhoXbCXaHAkfFHkqM=', 'Shristi  Lamichhane', '', '', '', '', '', 'spokharel@sevadev.com', '', '', 'Trainee', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', '', '', '', '', '', '', '', 0, 0),
(25, 'skhatun', 'eHyl9i5CgRJrT03dQI4UV4mkKD4cwKeng5DZdJRroFw=', 'Sabiya  Khatun', '', '', '', '', '', 'sabikhatun6@gmail.com', '', '', 'Trainee', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', '', '', '', '', '', '', '', 0, 0),
(26, 'mtaslima', 'LTn7lLQbkkTHUwBf5+sPrsLlbauRkstXRxGWK2uOqMY=', 'Taslima  Miya', '', '', '', '', '', 'khantaslima1998@gmail.com', '', '', 'Trainee', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', '', '', '', '', '', '', '', 0, 0),
(27, 'asamikshya', 'kU6cx1rxWhNZvfr1wF5L2Omw+4hwHXBtm+WJ0NowmhU=', 'Samikshya  Adhikari', '', '', '', '', '', 'adhisamiksha2@gmail.com', '', '', 'Trainee', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', '', '', '', '', '', '', '', 0, 0),
(28, 'gaurab', '5rH8wOFZ2ebmP+kFrI3/wNkyypz/f0O6Z7Ha+MhuYkY=', 'Gaurab  K.C', '', '', '', '', '', 'gaurabkc26@gmail.com', '', '', 'Trainee', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', '', '', '', '', '', '', '', 0, 0),
(29, 'spandit', 'rDVgigTUWdj+0T5Wg3iobuiUMyzpuSxzBPH4WLramuo=', 'Sajan  Pandit', '', '', '', '', '', 'lunatic.h3art@gmail.com', '', '', 'Trainee', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', '', '', '', '', '', '', '', 0, 0),
(30, 'achhetri', '4Cnyy0FDta0SaQnCSaqy7VO/2Ez3mx3uu4agH3OgIfM=', 'Abishkar Tiwari Chhetri', '', '', '', '', '', 'lefty.abis@gmail.com', '', '', 'Trainee', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', '', '', '', '', '', '', '', 0, 0),
(31, 'mkarki', 'BSQOhI6w4qLtBch3MvA3begep7/XrYOkzIEgBOliir8=', 'Manju  Karki', '', '', '', '', '', 'manjuthapa980@gmail.com', '', '', 'Trainee', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', '', '', '', '', '', '', '', 0, 0),
(32, 'mdura', 'ynhzre4Uw8fLpp2vNvinoHUe7HMffiAekQdxPsPgjeU=', 'Mantaj  Dura', '', '', '', '', '', 'mantaj.dura@gmail.com', '', '', 'Trainee', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', '', '', '', '', '', '', '', 0, 0),
(33, 'mshrestha', '8sh2VUbzMh+LzfKqJVYWaxdGXnWqmRaz6fz7HvtLlHI=', 'Mamata  Shrestha', '', '', '', '', '', 'mamata.shrestha67@gmail.com', '', '', 'Trainee', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', '', '', '', '', '', '', '', 0, 0),
(34, 'mgurung', 'uNsdvLerVPHj1XfjPopumzoUEJpkD3ihEpU5DC2Rqeo=', 'Manita  Gurung', '', '', '', '', '', 'manitagrg980@gmail.com', '', '', 'Trainee', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', '', '', '', '', '', '', '', 0, 0),
(35, 'ksajida', 'WmKkJAx784PTKAL4Ek1iS+5uKA/OxrPqOy2/BTLG+lg=', 'Sajida  Khatun', '', '', '', '', '', 'khatunsajida029@gmail.com', '', '', 'Trainee', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', '', '', '', '', '', '', '', 0, 0),
(36, 'bpabitra', 'cliWX1If5AFGHZBU267i+4olLh1YRKphnZccW5KNSYA=', 'Pabitra  B.K', '', '', '', '', '', 'angelpabitra123@gmail.com', '', '', 'Trainee', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', '', '', '', '', '', '', '', 0, 0),
(37, 'krekha', 'ZKZ1h5UEfNd0w9gSjYJbVBwxKlY02dqH01Q4v+wsWAg=', 'Rekha  Kunwar', '', '', '', '', '', 'kunwarrekha098@gmail.com', '', '', 'Trainee', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', '', '', '', '', '', '', '', 0, 0),
(38, 'sshrestha', '8sh2VUbzMh+LzfKqJVYWaxdGXnWqmRaz6fz7HvtLlHI=', 'Sujan  Shrestha', '', '', '', '', '', 'sthsujan13@gmail.com', '', '', 'Trainee', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', '', '', '', '', '', '', '', 0, 0),
(39, 'nkayastha', 'JnhVspEPA5IgGWUmiWPHak2j4GeOOrOPuljgeFOb2Qo=', 'Nitesh  Kayastha', '', '', '', '', '', 'nkayastha@sevadev.com', '', '', 'Manager', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', '', '', '', '', '', '', '', 0, 0),
(40, 'bsharma', 'lJlNJ3j6awKHNVXw3H2gSFjo7WezEZI5Yhu7NkgS63o=', 'Bhavesh  Sharma', '', '', '', '', '', 'bsharma@sevadev.com', '', '', 'Manager', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', '', '', '', '', '', '', '', 0, 0),
(41, 'psushil', 'L4l/RmraPXP3EJ/xJNQKZLQaIBHHciFGgpgC5CY4l6Y=', 'Sushil  Pandit', '', '', '', '', '', 'psushil@gmail.com', '', '', 'Trainee', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'passive', '', '', '', '', '', '', '', 0, 0),
(42, 'demouser', 'HuU80qcDegQXv6Pkj3lFFAmPmi9xz3GHXzwY6PQL230=', 'Demo Middle Last', '', '', '', '', '', 'demo@demo.com', '', '', 'Consultant', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', '', '', '', '', '', '', '', 0, 0),
(43, 'demopassive', 'HuU80qcDegQXv6Pkj3lFFAmPmi9xz3GHXzwY6PQL230=', 'Demo Passive Last', '', '', '', '', '', 'demopassive@demo.com', '', '', 'Consultant', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'passive', '', '', '', '', '', '', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `leave`
--

CREATE TABLE `leave` (
  `username` text NOT NULL,
  `no_of_days` decimal(10,1) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `half_date` date NOT NULL,
  `half_day` text NOT NULL,
  `manager` text NOT NULL,
  `reason` text NOT NULL,
  `leave_type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leave`
--

INSERT INTO `leave` (`username`, `no_of_days`, `from_date`, `to_date`, `half_date`, `half_day`, `manager`, `reason`, `leave_type`) VALUES
('stimsina', '78.0', '0000-00-00', '0000-00-00', '0000-00-00', '', 'Nitesh Kayastha', 'dkjbSDKV', 'floating'),
('stimsina', '0.0', '0000-00-00', '0000-00-00', '0000-00-00', '', 'Line Manager', 'jksbcszjkf', 'Floating leave'),
('nkayastha', '0.0', '2016-12-06', '2016-12-23', '0000-00-00', 'Second Half', 'Line Manager', 'swSD', 'Pay leave'),
('nkayastha', '0.0', '0000-00-00', '0000-00-00', '0000-00-00', '', 'Line Manager', 'SCS', 'Floating leave'),
('nkayastha', '0.0', '0000-00-00', '0000-00-00', '0000-00-00', '', 'Line Manager', 'SDC ', 'Floating leave'),
('nkayastha', '0.0', '0000-00-00', '0000-00-00', '0000-00-00', '', 'Line Manager', 'S S', 'Floating leave'),
('nkayastha', '0.0', '0000-00-00', '0000-00-00', '0000-00-00', 'Second Half', 'Line Manager', 'KJNSDCS', 'Floating leave'),
('nkayastha', '0.0', '0000-00-00', '0000-00-00', '0000-00-00', 'Second Half', 'Line Manager', 'SCSDC', 'Floating leave'),
('nkayastha', '0.0', '0000-00-00', '0000-00-00', '0000-00-00', 'Second Half', 'Line Manager', 'SCSDC', 'Floating leave'),
('nkayastha', '0.0', '0000-00-00', '0000-00-00', '0000-00-00', '', 'Line Manager', 'sc', 'Floating leave'),
('nkayastha', '0.0', '0000-00-00', '0000-00-00', '0000-00-00', '', 'Line Manager', 'sdcsd', 'Floating leave'),
('nkayastha', '0.0', '0000-00-00', '0000-00-00', '0000-00-00', '', 'Line Manager', 'dscsd', 'Floating leave'),
('nkayastha', '0.0', '0000-00-00', '0000-00-00', '0000-00-00', 'Second Half', 'Line Manager', 'wefcsd', 'Floating leave'),
('nkayastha', '0.0', '0000-00-00', '0000-00-00', '0000-00-00', 'Second Half', 'Line Manager', 'sdcs', 'Floating leave'),
('nkayastha', '0.0', '0000-00-00', '0000-00-00', '0000-00-00', 'Second Half', 'Line Manager', 'ssv', 'Floating leave'),
('nkayastha', '0.0', '0000-00-00', '0000-00-00', '0000-00-00', 'Second Half', 'Line Manager', 'asvsfv', 'Floating leave'),
('nkayastha', '0.0', '0000-00-00', '0000-00-00', '0000-00-00', 'Second Half', 'Line Manager', 'dcsad', 'Floating leave'),
('nkayastha', '0.0', '0000-00-00', '0000-00-00', '0000-00-00', 'First Half', 'Line Manager', 'sadcs', 'Floating leave'),
('nkayastha', '0.0', '0000-00-00', '0000-00-00', '0000-00-00', 'First Half', 'Line Manager', 'sadcs', 'Floating leave'),
('nkayastha', '0.0', '0000-00-00', '0000-00-00', '0000-00-00', 'First Half', 'Line Manager', 'sadcs', 'Floating leave'),
('nkayastha', '0.0', '0000-00-00', '0000-00-00', '0000-00-00', 'First Half', 'Line Manager', 'sadcs', 'Floating leave'),
('nkayastha', '0.0', '0000-00-00', '0000-00-00', '0000-00-00', 'First Half', 'Line Manager', 'sadcs', 'Floating leave'),
('nkayastha', '0.0', '0000-00-00', '0000-00-00', '0000-00-00', 'First Half', 'Line Manager', 'sadcs', 'Floating leave'),
('nkayastha', '0.0', '0000-00-00', '0000-00-00', '0000-00-00', 'First Half', 'Line Manager', 'sadcs', 'Floating leave'),
('nkayastha', '0.0', '0000-00-00', '0000-00-00', '0000-00-00', 'First Half', 'Line Manager', 'sadcs', 'Floating leave'),
('nkayastha', '0.0', '0000-00-00', '0000-00-00', '0000-00-00', 'First Half', 'Line Manager', 'sadcs', 'Floating leave'),
('nkayastha', '0.0', '2016-12-22', '2016-12-23', '0000-00-00', '', 'Line Manager', 'aca', 'Casual leave');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
