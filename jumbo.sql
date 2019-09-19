-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2019 at 10:20 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jumbo`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'sanjay'),
(2, 'test2'),
(3, 'box'),
(4, 'table'),
(5, 'sdffs');

-- --------------------------------------------------------

--
-- Table structure for table `pet`
--

CREATE TABLE `pet` (
  `id` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `photoUrls` varchar(100) NOT NULL,
  `tags` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pet`
--

INSERT INTO `pet` (`id`, `category`, `name`, `photoUrls`, `tags`, `status`, `createdate`) VALUES
(1, 1, 'othernamett2', 'test2', 1, 'available', '2019-09-16 03:07:21'),
(2, 1, 'rima', '2.png', 1, 'sold', '2019-09-17 06:06:48'),
(3, 3, 'test3', 'NWVB2126.JPG', 3, 'pending', '2019-09-19 06:12:04'),
(4, 4, 'test4', 'test4', 4, 'sold', '2019-09-16 12:05:08');

-- --------------------------------------------------------

--
-- Table structure for table `pet_order`
--

CREATE TABLE `pet_order` (
  `id` int(11) NOT NULL,
  `petId` int(11) NOT NULL,
  `quantity` bigint(20) NOT NULL,
  `shipDate` datetime NOT NULL,
  `status` varchar(100) NOT NULL,
  `complete` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pet_order`
--

INSERT INTO `pet_order` (`id`, `petId`, `quantity`, `shipDate`, `status`, `complete`) VALUES
(1, 1, 22, '2019-09-17 06:09:01', 'placed', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`) VALUES
(1, 'suchita'),
(2, 'test2'),
(3, 'tag3'),
(4, 'tag4'),
(5, 'fdff');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `userStatus` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `firstName`, `lastName`, `email`, `password`, `phone`, `userStatus`) VALUES
(0, 'string', 'string', 'string', 'string', 'string', 'string', 0),
(1, 'admin', 'suchita', 'rai', 'admin@gmail.com', '1234', '469098777', 0),
(2, 'suchita', 'suchita', 'rai', 'suchita@gmail.com', '1234', '469098777', 1),
(3, 'sanjay', 'sanjay', 'yadav', 'sksksan@gmail.com', '1234', '0406122445', 1),
(4, 'cherry', 'cherru', 'san', 'cherru@gmail.com', '1234', '9990377714', 1),
(5, 'adu', 'advik', 'san', 'adsan@gmail.com', '1234', '9990377714', 1),
(6, 'broc', 'broc', 'mahoni', 'broc@gmail.com', '12345', '987654321', 0),
(7, 'madu', 'broc', 'mandu', 'mandu@gmail.com', '12345', '987654321', 0),
(8, 'TTTT', 'string', 'string', 'string', 'string', 'string', 0),
(9, 'kala', 'ss', 'string', 'ss@gmail', '5432', '9876543221', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pet`
--
ALTER TABLE `pet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pet_order`
--
ALTER TABLE `pet_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pet`
--
ALTER TABLE `pet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pet_order`
--
ALTER TABLE `pet_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
