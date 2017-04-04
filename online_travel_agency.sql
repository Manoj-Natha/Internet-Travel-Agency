-- phpMyAdmin SQL Dump
-- version 4.2.7
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Apr 30, 2016 at 04:03 AM
-- Server version: 5.5.41-log
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `online_travel_agency`
--
CREATE DATABASE IF NOT EXISTS `online_travel_agency` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `online_travel_agency`;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL,
  `uid` varchar(20) NOT NULL,
  `tid` varchar(20) NOT NULL,
  `qty` int(11) NOT NULL,
  `tcost` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `uid`, `tid`, `qty`, `tcost`) VALUES
(100, 'natha_manoj', '1', 2, 200),
(101, 'natha_manoj', '2', 3, 360),
(102, 'natha_manoj', '1', 6, 1199.94),
(103, 'natha_manoj', '31', 10, 6000),
(104, 'natha_manoj', '31', 5, 3000),
(105, 'natha_manoj', '31', 2, 1200),
(106, 'natha_manoj', '31', 3, 1800),
(107, 'natha_manoj', '30', 10, 8000),
(108, 'natha_manoj', '30', 5, 4000),
(109, 'chai', '1', 7, 1399.93),
(110, 'chai', '2', 10, 1200),
(111, 'natha_manoj', '31', 5, 3000);

-- --------------------------------------------------------

--
-- Table structure for table `tours`
--

CREATE TABLE IF NOT EXISTS `tours` (
  `id` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  `cost` double NOT NULL,
  `total_qty` int(11) NOT NULL,
  `start_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tours`
--

INSERT INTO `tours` (`id`, `name`, `description`, `cost`, `total_qty`, `start_date`) VALUES
('1', 'Dallas', 'tour for dallas', 199.99, 87, '2016-04-14'),
('2', 'austin', 'this is tour of austin', 150, 150, '2016-04-15'),
('3', 'California', '3 days tour of cali', 299.99, 40, '2016-10-10'),
('30', 'India tour', '', 800, 45, '2016-05-10'),
('31', 'chennai', 'ctour', 600, 15, '2016-05-20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` varchar(20) NOT NULL,
  `pswd` varchar(20) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `pno` bigint(11) NOT NULL,
  `addr` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `pswd`, `fname`, `lname`, `gender`, `dob`, `email`, `pno`, `addr`) VALUES
('abhi', '1234qwASD', 'Abhishek', 'T', 'M', '1990-03-31', 'abhi@gmail.com', 3444, '2200 waterview parkway, APT# 26107'),
('admin', 'admin', 'admin', '', 'm', '1990-01-01', 'admin@mactravels.com', 9999999999, 'Dallas, Texas'),
('chai', 'qwer', 'chai', 'v', 'm', '2016-04-01', 'vvv@gmail.com', 111111, 'dallas,tx'),
('chaithu', '1234567qW', 'chai', 'V', 'M', '2011-01-01', 'c@c', 4697407546, '2200 waterview parkway, APT# 26107'),
('mxn151930', '1234qwerA!', 'Manoj Kumar', 'Natha', 'M', '1993-07-31', 'mxn151930@utdallas.edu', 4697407546, '2200 Waterview Parkway, APT# 26107,\r\nRichardson, TX-75080'),
('natha_manoj', 'qwert1234', 'Manoj Kumar', 'Natha', 'm', '1993-07-31', 'natha.manoj@gmail.com', 4697407546, 'Richardson, Texas'),
('shake', '1234567qW', 'Abhishek', 'T', 'M', '2016-04-05', 'abhi1@gmail.com', 4697407546, '2200 waterview parkway, APT# 26107');

-- --------------------------------------------------------

--
-- Table structure for table `wish_list`
--

CREATE TABLE IF NOT EXISTS `wish_list` (
  `uid` varchar(20) NOT NULL,
  `tid` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wish_list`
--

INSERT INTO `wish_list` (`uid`, `tid`) VALUES
('chai', '2'),
('natha_manoj', '1'),
('natha_manoj', '2'),
('natha_manoj', '3'),
('natha_manoj', '30'),
('natha_manoj', '31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
 ADD PRIMARY KEY (`id`), ADD KEY `uid` (`uid`), ADD KEY `tid` (`tid`);

--
-- Indexes for table `tours`
--
ALTER TABLE `tours`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `wish_list`
--
ALTER TABLE `wish_list`
 ADD PRIMARY KEY (`tid`,`uid`), ADD KEY `uid` (`uid`), ADD KEY `tid` (`tid`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
ADD CONSTRAINT `tour_id_fkey` FOREIGN KEY (`tid`) REFERENCES `tours` (`id`),
ADD CONSTRAINT `user_id_fkey` FOREIGN KEY (`uid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wish_list`
--
ALTER TABLE `wish_list`
ADD CONSTRAINT `wish_list_tid_fk` FOREIGN KEY (`tid`) REFERENCES `tours` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `wish_list_uid_fk` FOREIGN KEY (`uid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
