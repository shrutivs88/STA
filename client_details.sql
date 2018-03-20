-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2018 at 10:26 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sales_team_dev_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `client_details`
--

CREATE TABLE `client_details` (
  `clientId` int(10) NOT NULL,
  `clientFirstName` varchar(200) DEFAULT NULL,
  `clientLastName` varchar(200) DEFAULT NULL,
  `clientEmail` varchar(300) DEFAULT NULL,
  `clientMobile` bigint(13) DEFAULT NULL,
  `clientCategory` varchar(200) DEFAULT NULL,
  `clientDesignation` varchar(200) DEFAULT NULL,
  `clientState` varchar(200) DEFAULT NULL,
  `clientCity` varchar(200) DEFAULT NULL,
  `clientCountry` varchar(200) DEFAULT NULL,
  `clientAddress` varchar(200) DEFAULT NULL,
  `clientLinkedInId` varchar(200) DEFAULT NULL,
  `clientFacebookId` varchar(200) DEFAULT NULL,
  `clientTwitterId` varchar(200) DEFAULT NULL,
  `clientCompanyId` int(11) DEFAULT NULL,
  `clientStatus` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_details`
--

INSERT INTO `client_details` (`clientId`, `clientFirstName`, `clientLastName`, `clientEmail`, `clientMobile`, `clientCategory`, `clientDesignation`, `clientState`, `clientCity`, `clientCountry`, `clientAddress`, `clientLinkedInId`, `clientFacebookId`, `clientTwitterId`, `clientCompanyId`, `clientStatus`) VALUES
(1, 'ramesh', 'kumar', 'ramesh@gmail.com', 9988998899, 'a', 'x', 'karanataka', 'bangalore', 'india', 'vinayakanagar', 'a', 'a', 'a', 7, 'new'),
(2, 'madhu', 'kumar', 'madhu@gmail.com', 9988998899, 'a', 'y', 'karanataka', 'bangalore', 'india', 'a', 'a', 'a', 'a', 8, 'new'),
(3, 'a', 'a', 'a@gmail.com', 9988998888, 'a', 'x', 'karanataka', 'bangalore', 'india', 'a', 'a', 'a', 'a', 9, 'new'),
(4, 'a', 'a', 'a', 899889988, 'a', 'x', 'karanataka', 'bangalore', 'india', 'a', 'aa', 'a', 'a', 10, 'new'),
(5, 'z', 'z', 'z', 0, 'a', 'x', 'karanataka', 'bangalore', 'india', 'z', 'z', 'z', 'z', 10, 'new'),
(6, 'q', 'q', 'q', 0, 'a', 'x', 'maharashtra', 'pune', 'europe', 'q', 'q', 'q', 'q', 12, 'new'),
(7, 's', 's', 'ss', 9988009988, 'a', 'y', 'maharashtra', 'bangalore', 'india', 's', 's', 's', 's', 13, 'new'),
(8, 't', 't', 't', 9900998899, 'a', 'z', 'karanataka', 'bangalore', 'india', 'aaa', 'x', 'x', 'x', 14, 'new'),
(9, 'p', 'p', 'p', 8899889988, 'a', 'x', 'maharashtra', 'bangalore', 'india', 'a', 'a', 'a', 'a', 15, 'new'),
(10, 'g', 'G', 'G', 8899889988, 'a', 'y', 'maharashtra', 'pune', 'india', 'A', 'A', 'A', 'A', 16, 'new'),
(11, 'R', 'R', 'R', 9988009977, 'a', 'x', 'maharashtra', 'bangalore', 'india', 'A', 'A', 'A', 'A', 16, 'new'),
(12, 'S', 'S', 'S', 0, 'b', 'x', 'karanataka', 'bangalore', 'india', 'S', 'S', 'S', 'S', 16, 'new');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client_details`
--
ALTER TABLE `client_details`
  ADD PRIMARY KEY (`clientId`),
  ADD UNIQUE KEY `email` (`clientEmail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client_details`
--
ALTER TABLE `client_details`
  MODIFY `clientId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
