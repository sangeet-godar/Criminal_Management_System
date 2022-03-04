-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2020 at 12:51 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_criminal_record`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `username`, `password`) VALUES
(1, 'bibek', 'bibek123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_court`
--

CREATE TABLE `tbl_court` (
  `court_id` int(10) UNSIGNED NOT NULL,
  `court_type` varchar(25) NOT NULL,
  `court_name` varchar(50) NOT NULL,
  `place` varchar(50) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_court`
--

INSERT INTO `tbl_court` (`court_id`, `court_type`, `court_name`, `place`, `description`) VALUES
(1, 'supreme', 'how come', 'Koteshowr', '   khai data yesma new'),
(4, 'District', 'Sarbochha Court', 'Banepa', 'bakwas  court');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_crime`
--

CREATE TABLE `tbl_crime` (
  `crime_id` int(10) UNSIGNED NOT NULL,
  `crime_date` date NOT NULL,
  `crime_place` varchar(100) NOT NULL,
  `crime_description` text NOT NULL,
  `criminal_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `prison_id` int(10) UNSIGNED NOT NULL,
  `court_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_crime_category`
--

CREATE TABLE `tbl_crime_category` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_crime_category`
--

INSERT INTO `tbl_crime_category` (`category_id`, `category_name`, `description`) VALUES
(2, 'Theft', 'Theft is common these day'),
(3, 'Murder', 'Murder is very unforgivable crime');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_criminal`
--

CREATE TABLE `tbl_criminal` (
  `criminal_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `height` float UNSIGNED NOT NULL,
  `weight` float UNSIGNED NOT NULL,
  `email` varchar(50) NOT NULL,
  `date_of_birth` date NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(20) NOT NULL,
  `country` varchar(20) NOT NULL,
  `photo` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_criminal`
--

INSERT INTO `tbl_criminal` (`criminal_id`, `name`, `phone`, `height`, `weight`, `email`, `date_of_birth`, `address`, `city`, `country`, `photo`) VALUES
(20, '', '1232', 4.5, 43, 'ram@gmail.com', '2020-03-07', 'where', 'nowhere', 'anywhere', 'uploads/20202020_0303_0606_1212_0000_4747_59593153_599334110580981_9207121379550298112_n.jpg'),
(28, '', '', 0, 0, '', '0000-00-00', '', '', '', 'uploads/20202020_0303_0606_1212_4141_2020_');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prison`
--

CREATE TABLE `tbl_prison` (
  `prison_id` int(10) UNSIGNED NOT NULL,
  `prison_name` varchar(50) NOT NULL,
  `place` varchar(50) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_prison`
--

INSERT INTO `tbl_prison` (`prison_id`, `prison_name`, `place`, `description`) VALUES
(1, 'Central Jails', 'Hanuman Dhoka', 'This prison holds more than 200 prisoners '),
(18, 'Pokhara Jail', 'pokhara', 'established in 2019');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `tbl_court`
--
ALTER TABLE `tbl_court`
  ADD PRIMARY KEY (`court_id`),
  ADD UNIQUE KEY `court_name` (`court_name`);

--
-- Indexes for table `tbl_crime`
--
ALTER TABLE `tbl_crime`
  ADD PRIMARY KEY (`crime_id`),
  ADD KEY `criminal_id` (`criminal_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `prison_id` (`prison_id`),
  ADD KEY `court_id` (`court_id`);

--
-- Indexes for table `tbl_crime_category`
--
ALTER TABLE `tbl_crime_category`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `category_name` (`category_name`);

--
-- Indexes for table `tbl_criminal`
--
ALTER TABLE `tbl_criminal`
  ADD PRIMARY KEY (`criminal_id`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tbl_prison`
--
ALTER TABLE `tbl_prison`
  ADD PRIMARY KEY (`prison_id`),
  ADD UNIQUE KEY `prison_name` (`prison_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_court`
--
ALTER TABLE `tbl_court`
  MODIFY `court_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_crime`
--
ALTER TABLE `tbl_crime`
  MODIFY `crime_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_crime_category`
--
ALTER TABLE `tbl_crime_category`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_criminal`
--
ALTER TABLE `tbl_criminal`
  MODIFY `criminal_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbl_prison`
--
ALTER TABLE `tbl_prison`
  MODIFY `prison_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_crime`
--
ALTER TABLE `tbl_crime`
  ADD CONSTRAINT `tbl_crime_ibfk_1` FOREIGN KEY (`criminal_id`) REFERENCES `tbl_criminal` (`criminal_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_crime_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `tbl_crime_category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_crime_ibfk_3` FOREIGN KEY (`prison_id`) REFERENCES `tbl_prison` (`prison_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_crime_ibfk_4` FOREIGN KEY (`court_id`) REFERENCES `tbl_court` (`court_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
