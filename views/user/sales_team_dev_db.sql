-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2018 at 01:15 PM
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
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `city_id` int(11) NOT NULL,
  `city_name` varchar(255) NOT NULL,
  `state_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`city_id`, `city_name`, `state_id`, `country_id`) VALUES
(1, 'Udupi', 1, 1),
(2, 'Bangalore', 1, 1),
(3, 'Mysore', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `client_details`
--

CREATE TABLE `client_details` (
  `clientId` int(11) NOT NULL,
  `clientFirstName` varchar(100) DEFAULT NULL,
  `clientLastName` varchar(200) DEFAULT NULL,
  `clientEmail` varchar(300) NOT NULL,
  `clientMobile` bigint(13) DEFAULT NULL,
  `clientCategory` varchar(50) DEFAULT NULL,
  `clientDesignation` varchar(50) DEFAULT NULL,
  `clientAddress` varchar(255) DEFAULT NULL,
  `clientCity` varchar(100) DEFAULT NULL,
  `clientState` varchar(100) DEFAULT NULL,
  `clientCountry` varchar(100) DEFAULT NULL,
  `clientLinkedInId` varchar(255) DEFAULT NULL,
  `clientFacebookId` varchar(255) DEFAULT NULL,
  `clientTwitterId` varchar(255) DEFAULT NULL,
  `clientCompanyId` int(20) DEFAULT NULL,
  `clientStatus` varchar(25) DEFAULT NULL,
  `clientDateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_manager_id` int(11) DEFAULT NULL,
  `bde_user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_details`
--

INSERT INTO `client_details` (`clientId`, `clientFirstName`, `clientLastName`, `clientEmail`, `clientMobile`, `clientCategory`, `clientDesignation`, `clientAddress`, `clientCity`, `clientState`, `clientCountry`, `clientLinkedInId`, `clientFacebookId`, `clientTwitterId`, `clientCompanyId`, `clientStatus`, `clientDateTime`, `user_manager_id`, `bde_user_id`) VALUES
(1, 'Shruti', 'Shru', 'shru@gmail.com', 9874563217, ' abcdef', 'developer', 'werkr', 'Pune', 'Maharashtra', 'India', 'aere', 'asd2qq', 'fdggg', 1, 'Active', '2018-03-23 10:04:36', NULL, NULL),
(3, 'Vidya', 'vidya', 'vidya@rediff.com', 9874582361, 'asdfghj', 'devleoper', 'werir', 'Tumkur', 'Karnataka', 'India', 'qweqq', '2233rfdsf', 'fgfg', 3, 'Active', '2018-03-23 10:04:36', NULL, NULL),
(4, 'Manasa', 'manu', 'manu@hotmail.com', 5874289637, 'poiuyt', 'testing', 'sdlnf', 'Blore', 'Karnataka', 'India', 'asd', 'sfggg', 'asds', 4, 'Active', '2018-03-23 10:04:36', NULL, NULL),
(5, 'Ronald', 'prajval', 'rp@gmail.com', 9836745821, 'ldfldfl', 'admin', 'sajhfdfj', 'Hassan', 'Karnataka', 'India', 'asdff', 'fgrrr', 'qwewqe', 5, 'Active', '2018-03-23 10:04:36', NULL, NULL),
(6, 'Sneha', 'Swathi', 'snehaswathi@gmail.com', 8652397418, 'dfgfggf', 'Java', 'sdfrgg', 'Shimoga', 'Karnataka', 'India', 'gdfgfg', 'fgfg', 'fgfdgfg', 6, 'Active', '2018-03-23 10:04:36', NULL, NULL),
(7, 'Vijay', 'V S', 'vijay@gmail.com', 5874123697, 'xcn vksd', 'ewrer', 'werew', '1', '1', '1', 'erewr', 'ewrewr', 'reer', 7, 'Active', '2018-03-24 07:30:25', NULL, NULL),
(8, 'Amoga', 'A M ', 'amoga@yahoo.com', 6874593218, 'cvbcvb', 'fgfgd', 'fgfg', '1', '1', '1', 'fggsgyrty', 'gsgsrtytry', 'sgsfgtrt', 8, 'Active', '2018-03-24 06:07:47', NULL, NULL),
(9, 'Shashi', 'Shashi', 'shashi@yahoo.co.in', 9874563258, 'dgfvfg', 'sdfdf', 'sdfsdf', 'sdfds', 'fsdf', 'fsdf', 'ass', 'fdsf', 'dfdf', 9, 'Active', '2018-03-23 10:04:36', NULL, NULL),
(10, 'Vandana', 'J', 'va@gmail.com', 7945621369, 'kfnvgfkdsl', 'jdnfkd', 'nklqnk', '1', '1', '1', 'nklndk', 'nkwdnkw', 'nkwsnqkl', 7, 'Active', '2018-03-24 07:33:56', NULL, NULL),
(11, 'Vishu', 'V S', 'vishu@yhaoo.com', 9874563215, 'dfgfggf', 'fgfgd', 'fgg', '1', '1', '1', 'dfjdsfjsd`', 'fddksf', 'fkfd', 1, 'Active', '2018-03-26 05:19:20', NULL, NULL),
(12, 'Sonam', 'sonu', 'sonam@rediff.com', 9582367841, 'cvcv', 'dsfsdf', 'sdfdsf', 'Kolar', 'Karnataka', 'India', 'sjdfbdsjf', 'sdfnsd', 'dssnfds', 2, 'Active', '2018-03-23 10:04:36', NULL, NULL),
(13, 'Payal', 'prajval', 'paya@rediff.com', 6548712369, 'sdsdf', 'fddsf', 'dsfdsf', 'munich', 'germany', 'Europe', 'sdjfh', 'sdjkfsd', 'sdk', 3, 'Active', '2018-03-20 06:03:08', NULL, NULL),
(14, 'Anu', 'N', 'anu@gmail.com', 8745632158, 'asdfg', 'testing', 'blore', 'karnataka', 'India', 'blore', 'skldf', 'sdknf', 'sdifj', 5, 'Active', '2018-03-20 06:07:18', NULL, NULL),
(15, 'deepu', 'M', 'deepu@gmail.com', 8745632158, 'asdfg', 'testing', 'blore', 'karnataka', 'India', 'blore', 'skldf', 'sdknf', 'sdifj', 5, 'Active', '2018-03-20 06:07:18', NULL, NULL),
(16, 'deepa', 'S', 'deepa@gmail.com', 8745632158, 'asdfg', 'developer', 'hassan', 'karnataka', 'India', 'blore', 'skldf', 'sdknf', 'sdifj', 5, 'Active', '2018-03-20 06:07:18', NULL, NULL),
(17, 'shwetha', 'M', 'malpe@gmail.com', 8745632158, 'asdfg', 'testing', 'blore', 'karnataka', 'India', 'blore', 'skldf', 'sdknf', 'sdifj', 5, 'Active', '2018-03-20 06:07:18', NULL, NULL),
(18, 'sony', 'M', 'deep@gmail.com', 8745632158, 'asdfg', 'testing', 'blore', 'karnataka', 'India', 'blore', 'skldf', 'sdknf', 'sdifj', 5, 'Active', '2018-03-20 06:07:18', NULL, NULL),
(19, 'vishu', 'deppa', 'vde@yahoo.com', 9874563219, 'qwerty', 'java', 'Shmg', 'karnataka', 'India', 'blore', 'dsfdnf', 'sjdfndsnf', 'fndfn', 6, 'Active', '2018-03-20 06:07:18', NULL, NULL),
(20, 'Sonal', 'sonam', 'sonal@rediff.com', 7896541236, 'a', 'x', 'Vignan nagar, Blore.', 'bangalore', 'karanataka', 'india', 'http://www.linkedin.com/fdskf?=ndfkdfn', 'http://www.facebook.com/fdskf?=ndfkdfn', 'http://www.twitter.com/fdskf?=ndfkdfn', 5, 'New', '2018-03-20 06:11:32', NULL, NULL),
(21, 'Mahesh', 'kumar', 'mahesh@gmail.com', 8745963215, 'b', 'x', 'sdfdsfdfsd', 'bangalore', 'karanataka', 'india', 'sdfsdfsf', 'sdfsdfsdf', 'sdfsdfsdf', 6, 'New', '2018-03-21 06:01:17', NULL, NULL),
(23, 'Sushma', 'bindhu', 'sush@gmail.com', 9874563215, 'a', 'y', 'sdfdsfsdf', 'bangalore', 'karanataka', 'india', 'dfgsddsf', 'sdfdsf', 'sdfsdf', 8, 'New', '2018-03-21 06:50:13', NULL, NULL),
(24, 'sdfsdf', 'sdfsdf', 'asdf@gmail.com', 7894565137, 'b', 'x', 'sdfsdfdsf', 'bangalore', 'karanataka', 'india', 'sdfsdfs', 'sdfsdfsd', 'fsdfdsfds', 9, 'New', '2018-03-21 07:38:03', NULL, NULL),
(25, 'sdfsdf', 'sdfdfs', 'sdfdfewr@gmail.com', 4444444444, 'b', 'x', 'sdfsdfsd', 'bangalore', 'karanataka', 'india', 'sdfsdf', 'sdfsdf', 'sdfsdf', 10, 'New', '2018-03-21 07:43:01', NULL, NULL),
(26, 'asdas', 'asd', 'asd@asds.com', 1111111111, 'a', 'x', 'asds', 'bangalore', 'karanataka', 'india', 'sfsd', 'sdfd`', 'sdfs', 13, 'New', '2018-03-21 09:22:34', 1011, NULL),
(27, 'Manju', 'M', 'manu@gmail.com', 9874563215, 'a', 'x', 'dfdsfdsf', 'bangalore', 'karanataka', 'india', 'dsfsdfdf', 'dfdsfdsf', 'dfdfdff', 13, 'New', '2018-03-21 09:59:52', NULL, NULL),
(28, 'sdfdsf', 'sdfsdf', 'dsfdsfn@gmail.com', 8888888889, 'a', 'x', 'asff', 'bangalore', 'karanataka', 'india', 'asdasd', 'asdsd', 'asdsad', 15, 'New', '2018-03-21 10:10:52', 1009, NULL),
(29, 'kavitha', 'S', 'kavi@gmail.com', 9999988888, 'a', 'x', 'Blore', 'bangalore', 'karanataka', 'india', 'asfddffd', 'sdfsdfdf', 'sdfdfs', 16, 'New', '2018-03-21 10:26:00', 1009, NULL),
(30, 'Suresh', 'k', 'suresh@gmail.com', 9999999995, 'a', 'x', 'sdfdsf', 'bangalore', 'karanataka', 'india', 'ewredfdsf', 'sdfsdfsdf', 'sdfsdfsdf', 17, 'New', '2018-03-21 10:30:23', 1009, NULL),
(31, 'Shiva', 's', 'shiv@gmial.com', 9999998888, 'a', 'x', 'sdfdsfdsf', 'bangalore', 'karanataka', 'india', 'sdfsdf', 'sdfsdfsdf', 'dsfdsf', 18, 'New', '2018-03-21 10:43:08', 1009, NULL),
(33, 'Anusha', 'J', 'anu@yahoo.com', 587412369, 'BDM', 'Developer', 'Kolar', '1', '1', '1', 'ejhewh', '`dfnkfn', 'kshdfnkdf', 20, 'New', '2018-03-26 11:03:53', 1011, 1002),
(34, 'Sonam', 'S', 'sonam@gmail.com', 8745632159, 'admin', 'testing', 'marthahalli,bore.', 'bangalore', 'karanataka', 'india', 'sdfsdf', 'sdfdsf', 'sdfsdf', 19, 'New', '2018-03-24 04:09:08', 1011, NULL),
(35, 'Ronald', 'R', 'ronald@gmail.com', 4578963215, 'Admin', 'Developer', 'Marthahalli', 'Blore', 'Karnataka', 'India', 'sdfdsf', 'dsfdf', 'dfdfsdf', 20, 'New', '2018-03-26 09:02:19', 1011, 1002),
(37, 'Manasa', 'M', 'manasa@yahoo.com', 9874563215, 'BDE', 'Developer', 'Electronic city', 'Blore', 'Karnataka', 'India', 'sfjnjn', 'bjnkj', 'jnjknjkn', 20, 'New', '2018-03-26 09:02:19', 1011, 1002),
(40, 'Shruti', 'V S', 'shru@rediff.com', 8745693219, 'BDE', 'Developer', 'C.V.Raman Nagar', 'Blore', 'Karnataka', 'India', 'qwerty', 'qwertyu', 'ehrrhiewr', 20, 'New', '2018-03-26 09:02:19', 1011, 1002),
(42, 'Raj', 'Malhothra', 'raj@gmail.com', 4789561235, 'admin', 'testing', 'blore', 'bangalore', 'karanataka', 'india', 'assadsad', 'asdasdd', 'asdsadasd', 20, 'New', '2018-03-26 09:07:09', 1011, 1002),
(47, 'Ramya', 'M', 'ramaya@gmail.com', 9874562148, 'BDE', 'testing', 'Vivekanadanagar', 'Mysore', 'Karantaka', 'India', 'skdfsdm', 'sdfjjkd', 'jsdbfjsdfnb', 20, 'New', '2018-03-26 09:02:19', 1011, 1002);

-- --------------------------------------------------------

--
-- Table structure for table `company_details`
--

CREATE TABLE `company_details` (
  `companyId` int(11) NOT NULL,
  `companyName` varchar(100) NOT NULL,
  `companyWebsite` varchar(100) NOT NULL,
  `companyEmail` varchar(300) NOT NULL,
  `companyPhone` bigint(13) NOT NULL,
  `companyLinkedIn` varchar(100) NOT NULL,
  `companyAddress` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_details`
--

INSERT INTO `company_details` (`companyId`, `companyName`, `companyWebsite`, `companyEmail`, `companyPhone`, `companyLinkedIn`, `companyAddress`) VALUES
(1, 'Wipro India Pvt.,Ltd.', 'http://www.wipro.com', 'adbc@wipro.com', 789456321, 'sfsdfdsfsdf', 'sdfsdfdsfdsf'),
(2, 'asdsankdf', 'http://www.abc.com', 'asdnsakd@abc.com', 5874693218, 'asdff', 'fddfdsf'),
(3, 'zxccxz', 'http://www.ashf.com', 'askfj@google.com', 666666678, 'kdfmdks', 'dkfdsf'),
(4, 'sdfsdf', 'http://www.asdfg.com', 'djfdfn@gmail.com', 9874563215, 'sdfasf', 'sdfsdfsdf'),
(5, 'Infosys Inida Pvt.,Ltd.', 'http://www.infosys.com', 'qwerty@infosys.com', 9874563215, 'http://www.linkedin.com/asdfg?=asdsd', 'Marthahalli, Blore.'),
(6, 'Symphony', 'http://www.symphony.com', 'qwert@symphony.com', 9874563215, 'sdfsdfsdf', 'sdfsdfdfdsf'),
(8, 'Concentrix', 'http://www.concentrix.com', 'candida@concentrix.com', 8745963217, 'sfdfdsf', 'sdfdsffsdf'),
(9, 'dfgfd', 'http://www.ashds.Com', 'ksank@ashds.com', 7952212333, 'sdjfndskjf', 'sdfsdfsdf'),
(10, 'sdfsdf', 'http://www.werk.com', 'werllk@werk.com', 7868121269, 'sdkfjsafj', 'ksdfmlsdf'),
(11, 'dflsdr,ms;f', 'http://www.sdf.com', 'bsdbf@jdf.com', 7894563214, 'sdf', 'sdfdsf'),
(12, 'sdsa', 'http://as.asdasd.asdas', 'asdas', 1111111111, 'asd', 'sadas'),
(13, 'asd', 'http://aas.asasas.asd', 'asdas', 1212121212, 'sdsad', 'sadsada'),
(15, 'sdfsdf', 'http://www.sasdffa.com', 'jdnsadn@gja.com', 3333333333, 'jadnsja', 'dfnskfn'),
(16, 'Samsung', 'http://www.samsung.com', 'asdfg@samsung.com', 7777777798, 'shsdbfdsjf', 'sdfsdfsdf'),
(17, 'xyz', 'http://www.xyz.com', 'xyz@gmail.com', 9999998888, 'sdfhindsikf', 'sdfsdfdsf'),
(18, 'qwerty', 'http://www.qwertty.com', 'ksdnf@gmail.com', 7899999999, 'sdjfbsjkdf', 'sdfsdf'),
(19, 'Mcaffee', 'http://www.mcaffee.com', 'asdfgh@mcaffee.com', 9874563215, 'dfdsfsdf', 'dfsdfsdfsdf'),
(20, 'TCS', 'http://www.tcs.com', 'qwerty@tcs.com', 7894563214, 'sdjf;fmnl;sdfmlsd;', 'mdsnfsdmknfsdmfl;k');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `country_id` int(11) NOT NULL,
  `country_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`country_id`, `country_name`) VALUES
(1, 'India'),
(2, 'United States of America'),
(3, 'Australia'),
(4, 'Mexico');

-- --------------------------------------------------------

--
-- Table structure for table `csv_table`
--

CREATE TABLE `csv_table` (
  `csv_id` int(100) NOT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `email` varchar(300) DEFAULT NULL,
  `mobile` bigint(13) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `designation` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `linkedIn_Id` varchar(100) DEFAULT NULL,
  `facebook_Id` varchar(100) DEFAULT NULL,
  `twitter_Id` varchar(100) DEFAULT NULL,
  `company_id` int(20) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `csv_table`
--

INSERT INTO `csv_table` (`csv_id`, `firstname`, `lastname`, `email`, `mobile`, `category`, `designation`, `city`, `state`, `country`, `address`, `linkedIn_Id`, `facebook_Id`, `twitter_Id`, `company_id`, `status`, `datetime`) VALUES
(1, 'donald', 'M', 'donald@gmail.com', 8745632158, 'asdfg', 'testing', 'blore', 'karnataka', 'India', 'blore', 'skldf', 'sdknf', 'sdifj', 5, 'Active', '2018-03-15 04:19:06'),
(2, 'Anu', 'N', 'anu@gmail.com', 8745632158, 'asdfg', 'testing', 'blore', 'karnataka', 'India', 'blore', 'skldf', 'sdknf', 'sdifj', 5, 'Active', '2018-03-15 04:19:06'),
(3, 'deepu', 'M', 'deepu@gmail.com', 8745632158, 'asdfg', 'testing', 'blore', 'karnataka', 'India', 'blore', 'skldf', 'sdknf', 'sdifj', 5, 'Active', '2018-03-15 04:19:06'),
(4, 'deepa', 'S', 'deepa@gmail.com', 8745632158, 'asdfg', 'developer', 'hassan', 'karnataka', 'India', 'blore', 'skldf', 'sdknf', 'sdifj', 5, 'Active', '2018-03-15 04:19:06'),
(5, 'shwetha', 'M', 'malpe@gmail.com', 8745632158, 'asdfg', 'testing', 'blore', 'karnataka', 'India', 'blore', 'skldf', 'sdknf', 'sdifj', 5, 'Active', '2018-03-15 04:19:06'),
(6, 'sony', 'M', 'deep@gmail.com', 8745632158, 'asdfg', 'testing', 'blore', 'karnataka', 'India', 'blore', 'skldf', 'sdknf', 'sdifj', 5, 'Active', '2018-03-15 04:19:06'),
(7, 'Shruti', 'Shru', 'shru@gmail.com', 9874563217, ' abcdef', 'developer', 'Pune', 'Maharashtra', 'India', 'werkr', 'aere', 'asd2qq', 'fdggg', 1, 'Active', '2018-03-15 06:07:10'),
(8, 'Anusha', 'anu', 'anu@yahoo.com', 8748523691, 'qwerty', 'testing', 'Blore', 'Karnataka', 'India', 'qwejr', 'qweqwe', '2qwerr', 'fdggg', 2, 'Active', '2018-03-15 06:07:10'),
(9, 'Vidya', 'vidya', 'vidya@rediff.com', 9874582361, 'asdfghj', 'devleoper', 'Tumkur', 'Karnataka', 'India', 'werir', 'qweqq', '2233rfdsf', 'fgfg', 3, 'Active', '2018-03-15 06:07:10'),
(10, 'Manasa', 'manu', 'manu@hotmail.com', 5874289637, 'poiuyt', 'testing', 'Blore', 'Karnataka', 'India', 'sdlnf', 'asd', 'sfggg', 'asds', 4, 'Active', '2018-03-15 06:07:10'),
(11, 'Ronald', 'prajval', 'rp@gmail.com', 9836745821, 'ldfldfl', 'admin', 'Hassan', 'Karnataka', 'India', 'sajhfdfj', 'asdff', 'fgrrr', 'qwewqe', 5, 'Active', '2018-03-15 06:07:10'),
(12, 'Sneha', 'Swathi', 'snehaswathi@gmail.com', 8652397418, 'dfgfggf', 'Java', 'Bangalore', 'Karnataka', 'India', 'sdfrgg', 'gdfgfg', 'fgfg', 'fgfdgfg', 6, 'Active', '2018-03-15 06:07:10'),
(13, 'Vijay', 'V S', 'vijay@gmail.com', 5874123697, 'xcn vksd', 'ewrer', 'werewr', 'erewr', 'rewr', 'werew', 'erewr', 'ewrewr', 'reer', 7, 'Active', '2018-03-15 06:07:10'),
(14, 'Amoga', 'A M ', 'amoga@yahoo.com', 6874593218, 'cvbcvb', 'fgfgd', 'fgfg', 'fgfg', 'gffg', 'fgfg', 'fggsg', 'gsgs', 'sgsfg', 8, 'Active', '2018-03-15 06:07:10'),
(15, 'lokesh', 'M', 'lokesh@gmail.com', 8745632158, 'asdfg', 'testing', 'blore', 'karnataka', 'India', 'blore', 'skldf', 'sdknf', 'sdifj', 5, 'Active', '2018-03-14 10:09:35'),
(18, 'spoorthy', 'S', 'spoo@gmail.com', 8745632158, 'asdfg', 'testing', 'blore', 'karnataka', 'India', 'blore', 'skldf', 'sdknf', 'sdifj', 5, 'Active', '2018-03-14 10:09:35'),
(19, '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 'Active', '2018-03-14 10:09:35'),
(33, 'vishu', 'deppa', 'vde@yahoo.com', 9874563219, 'qwerty', 'java', 'Shmg', 'karnataka', 'India', 'blore', 'dsfdnf', 'sjdfndsnf', 'fndfn', 0, 'Active', '2018-03-15 04:19:06'),
(89, 'Shashi', 'Shashi', 'shashi@yahoo.co.in', 9874563258, 'dgfvfg', 'sdfdf', 'fsdf', 'sdfds', 'fsdf', 'sdfsdf', 'ass', 'fdsf', 'dfdf', 9, 'Active', '2018-03-15 06:07:10'),
(106, 'Vandana', 'J', 'va@gmail.com', 7945621369, 'kfnvgfkdsl', 'jdnfkd', 'nfklnf', 'ndkledn', 'nklsfdnsk', 'nklqnk', 'nklndk', 'nkwdnkw', 'nkwsnqkl', 7, 'Active', '2018-03-15 06:07:10');

-- --------------------------------------------------------

--
-- Table structure for table `employeeinfo`
--

CREATE TABLE `employeeinfo` (
  `emp_id` int(50) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `reg_date` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(50) NOT NULL,
  `role_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`) VALUES
(1, 'ADMIN'),
(2, 'BDM'),
(3, 'BDE');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `state_id` int(11) NOT NULL,
  `state_name` varchar(255) NOT NULL,
  `country_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`state_id`, `state_name`, `country_id`) VALUES
(1, 'Karnataka', 1),
(2, 'Maharastra', 1),
(3, 'Texas', 2),
(4, 'Tasmania', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_emp_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `user_manager_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_emp_id`, `user_name`, `user_email`, `user_password`, `role_id`, `user_manager_id`) VALUES
(1, 1000, 'admin', 'admin@xyz.com', 'TjhYaFFaVWZ6MkZobzBuMVFxZTR6UT09', 1, 0),
(15, 1002, 'shruti', 'shruti@xyz.com', 'VDZIcy80dlYyVU9SSjhKcDJXamM1QT09', 3, 1011),
(23, 1007, 'vijay', 'vijay@xyz.com', 'VDZIcy80dlYyVU9SSjhKcDJXamM1QT09', 3, 0),
(24, 1008, 'amogh', 'amogh@xyz.com', 'VDZIcy80dlYyVU9SSjhKcDJXamM1QT09', 3, 0),
(25, 1009, 'vidya', 'vid@gmail.com', 'UGZWMDByUktXcVpmMXBxcnJBR1Mzdz09', 2, 0),
(26, 1010, 'manasa', 'manasa@gmail.com', 'dkp4bXQxVDN0eDNwWFk4Rk0ycHVtZz09', 3, 1009),
(27, 1011, 'anusha', 'anusha@xyz.com', 'VDZIcy80dlYyVU9SSjhKcDJXamM1QT09', 2, 0),
(28, 1012, 'piyush', 'piyush@xyz.com', 'VDZIcy80dlYyVU9SSjhKcDJXamM1QT09', 3, 0),
(30, 1013, 'bdmtest', 'bdmtest@xyz.com', 'VDZIcy80dlYyVU9SSjhKcDJXamM1QT09', 2, 0),
(32, 1014, 'bde1', 'bde1@xyz.com', 'VDZIcy80dlYyVU9SSjhKcDJXamM1QT09', 3, 0),
(33, 1015, 'bde2', 'bde2@xyz.com', 'VDZIcy80dlYyVU9SSjhKcDJXamM1QT09', 3, 0),
(34, 1016, 'bde3', 'bde3@xyz.com', 'VDZIcy80dlYyVU9SSjhKcDJXamM1QT09', 3, 0),
(35, 1017, 'bde4', 'bde4@xyz.com', 'VDZIcy80dlYyVU9SSjhKcDJXamM1QT09', 3, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client_details`
--
ALTER TABLE `client_details`
  ADD PRIMARY KEY (`clientId`),
  ADD UNIQUE KEY `clientEmail` (`clientEmail`);

--
-- Indexes for table `company_details`
--
ALTER TABLE `company_details`
  ADD PRIMARY KEY (`companyId`),
  ADD UNIQUE KEY `companyWebsite` (`companyWebsite`);

--
-- Indexes for table `csv_table`
--
ALTER TABLE `csv_table`
  ADD PRIMARY KEY (`csv_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `employeeinfo`
--
ALTER TABLE `employeeinfo`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_emp_id` (`user_emp_id`),
  ADD KEY `fk_users_role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client_details`
--
ALTER TABLE `client_details`
  MODIFY `clientId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `company_details`
--
ALTER TABLE `company_details`
  MODIFY `companyId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `csv_table`
--
ALTER TABLE `csv_table`
  MODIFY `csv_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `employeeinfo`
--
ALTER TABLE `employeeinfo`
  MODIFY `emp_id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_role_id` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
