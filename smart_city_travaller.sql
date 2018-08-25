-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2018 at 12:54 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smart_city_travaller`
--

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `state` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `lat` varchar(100) NOT NULL,
  `lang` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `state`, `city`, `lat`, `lang`) VALUES
(1, 'GUJARAT', 'Ahmedabad', '23.0225', '72.5714'),
(2, 'GUJARAT', 'Surat', '21.1702', '72.8311'),
(3, 'GUJARAT', 'Vadodara', '22.3072', '73.1812'),
(4, 'GUJARAT', 'Rajkot', '22.3039', '70.8022'),
(5, 'GUJARAT', 'Surendranaga', '22.7739', '71.6673'),
(8, 'RAJASTHAN', 'Jaipur', '', ''),
(9, 'RAJASTHAN', 'Jodhpur', '', ''),
(10, 'RAJASTHAN', 'Udaipur', '', ''),
(11, 'RAJASTHAN', 'Ajmer', '', ''),
(12, 'RAJASTHAN', 'Kota', '', ''),
(16, 'DELHI', 'Faridabad', '', ''),
(17, 'DELHI', 'Gurugram', '', ''),
(18, 'DELHI', 'Hastsal', '', ''),
(19, 'DELHI', 'Meerut', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `holdplace`
--

CREATE TABLE `holdplace` (
  `id` int(11) NOT NULL,
  `placename` varchar(200) NOT NULL,
  `lat` float NOT NULL,
  `lang` float NOT NULL,
  `planid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `holdplace`
--

INSERT INTO `holdplace` (`id`, `placename`, `lat`, `lang`, `planid`) VALUES
(1, 'Comfort Inn President', 23.035, 72.56, 2);

-- --------------------------------------------------------

--
-- Table structure for table `insertcity`
--

CREATE TABLE `insertcity` (
  `id` int(11) NOT NULL,
  `cityname` varchar(300) NOT NULL,
  `planid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `insertcity`
--

INSERT INTO `insertcity` (`id`, `cityname`, `planid`) VALUES
(1, 'Ahmedabad', 1),
(2, 'Ahmedabad', 2);

-- --------------------------------------------------------

--
-- Table structure for table `journydate`
--

CREATE TABLE `journydate` (
  `id` int(11) NOT NULL,
  `fromdate` date NOT NULL,
  `todate` date NOT NULL,
  `planid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `journydate`
--

INSERT INTO `journydate` (`id`, `fromdate`, `todate`, `planid`) VALUES
(1, '2018-04-09', '2018-04-11', 2);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `uname` varchar(200) NOT NULL,
  `pwd` varchar(200) NOT NULL,
  `emailid` varchar(200) NOT NULL,
  `mobileno` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `fname`, `lname`, `uname`, `pwd`, `emailid`, `mobileno`) VALUES
(1, 'akshay', 'soni', 'akshay', '123', '', 0),
(2, 'soni', 'akshay', 'akshay8000', '123', 'soni@gmail.com', 800062326),
(3, 'bhp', 'BCJJ', 'bhOOMI', '123', 'BHH@GMAIL.COM', 9000),
(4, 'Bhoomi', 'joshi', 'Bhoomi123', '123445', 'Bhomijoshi@gmail.com', 8000);

-- --------------------------------------------------------

--
-- Table structure for table `plan`
--

CREATE TABLE `plan` (
  `id` int(11) NOT NULL,
  `uid` varchar(300) NOT NULL,
  `planname` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plan`
--

INSERT INTO `plan` (`id`, `uid`, `planname`) VALUES
(1, '1', 'abc'),
(2, '1', 'abc');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `holdplace`
--
ALTER TABLE `holdplace`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `insertcity`
--
ALTER TABLE `insertcity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `journydate`
--
ALTER TABLE `journydate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `holdplace`
--
ALTER TABLE `holdplace`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `insertcity`
--
ALTER TABLE `insertcity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `journydate`
--
ALTER TABLE `journydate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `plan`
--
ALTER TABLE `plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
