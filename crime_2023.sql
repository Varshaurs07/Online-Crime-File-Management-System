-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2023 at 09:45 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crime_2023`
--

-- --------------------------------------------------------

--
-- Table structure for table `crime_2023_complaint`
--

CREATE TABLE `crime_2023_complaint` (
  `id` int(10) NOT NULL,
  `uid` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `policestation` varchar(255) NOT NULL,
  `explanation` text NOT NULL,
  `certify` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `police` varchar(255) NOT NULL,
  `policename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `crime_2023_missingperson`
--

CREATE TABLE `crime_2023_missingperson` (
  `id` int(10) NOT NULL,
  `uid` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `missingdate` varchar(255) NOT NULL,
  `missinglocation` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `notifylocation` varchar(255) NOT NULL,
  `notifydate` varchar(255) NOT NULL,
  `notifytime` varchar(255) NOT NULL,
  `notifyuser` varchar(255) NOT NULL,
  `notifyusername` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `crime_2023_missingperson`
--

INSERT INTO `crime_2023_missingperson` (`id`, `uid`, `name`, `alias`, `missingdate`, `missinglocation`, `status`, `notifylocation`, `notifydate`, `notifytime`, `notifyuser`, `notifyusername`, `image`) VALUES
(2, 'uid_20c6bf9759', 'person1', 'person1', '2023-12-30', 'person', 'closed', 'Location', '2023-12-29', '11:43', 'user@user.com', 'user', 'docs/user.jpg'),
(3, 'uid_c7a59f969b', 'person2', 'person2', '2023-12-31', 'person2', 'closed', 'username', '2023-12-30', '14:15', 'user@user.com', 'user', 'docs/user.png');

-- --------------------------------------------------------

--
-- Table structure for table `crime_2023_police`
--

CREATE TABLE `crime_2023_police` (
  `id` int(10) NOT NULL,
  `uid` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `stationname` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `crime_2023_police`
--

INSERT INTO `crime_2023_police` (`id`, `uid`, `name`, `gender`, `stationname`, `designation`, `email`, `password`, `phone`) VALUES
(2, 'uid_22fe52e2ac', 'police', 'Male', 'KUVEMPUNAGARA POLICE STATION', 'constable', 'laughumust@gmail.com', 'police', '9876543210'),
(3, 'uid_1b0cb481e7', 'police2', 'Male', 'SARSWARTHIPURAM POLICE STATION', 'head constable', 'police2@police2.com', 'police2', '9876543212');

-- --------------------------------------------------------

--
-- Table structure for table `crime_2023_user`
--

CREATE TABLE `crime_2023_user` (
  `id` int(10) NOT NULL,
  `uid` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `crime_2023_user`
--

INSERT INTO `crime_2023_user` (`id`, `uid`, `name`, `email`, `password`, `phone`, `address`) VALUES
(1, 'uid_dc8cc18d83', 'user', 'user@user.com', 'user', '9876543210', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `crime_2023_wantedperson`
--

CREATE TABLE `crime_2023_wantedperson` (
  `id` int(10) NOT NULL,
  `uid` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `crimedate` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `notifylocation` varchar(255) NOT NULL,
  `notifydate` varchar(255) NOT NULL,
  `notifytime` varchar(255) NOT NULL,
  `notifyuser` varchar(255) NOT NULL,
  `notifyusername` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `crime_2023_wantedperson`
--

INSERT INTO `crime_2023_wantedperson` (`id`, `uid`, `name`, `alias`, `type`, `crimedate`, `status`, `notifylocation`, `notifydate`, `notifytime`, `notifyuser`, `notifyusername`, `image`) VALUES
(1, 'uid_ca3206fceb', 'person1', 'person1', 'fraud', '2023-12-29', 'closed', 'Location', '2023-12-29', '14:30', 'user@user.com', 'user', 'docs/user.jpg'),
(3, 'uid_951bc7a8cc', 'person2', 'person2', 'robbery', '2023-12-29', 'closed', 'Location', '2023-12-29', '14:19', 'user@user.com', 'user', 'docs/user.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `crime_2023_complaint`
--
ALTER TABLE `crime_2023_complaint`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crime_2023_missingperson`
--
ALTER TABLE `crime_2023_missingperson`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crime_2023_police`
--
ALTER TABLE `crime_2023_police`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crime_2023_user`
--
ALTER TABLE `crime_2023_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crime_2023_wantedperson`
--
ALTER TABLE `crime_2023_wantedperson`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `crime_2023_complaint`
--
ALTER TABLE `crime_2023_complaint`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `crime_2023_missingperson`
--
ALTER TABLE `crime_2023_missingperson`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `crime_2023_police`
--
ALTER TABLE `crime_2023_police`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `crime_2023_user`
--
ALTER TABLE `crime_2023_user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `crime_2023_wantedperson`
--
ALTER TABLE `crime_2023_wantedperson`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
