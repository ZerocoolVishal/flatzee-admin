-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 12, 2018 at 08:33 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flatzeedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `negotiable` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `bathroom` varchar(255) NOT NULL,
  `balconies` varchar(255) NOT NULL,
  `society` varchar(255) NOT NULL,
  `super_area` float NOT NULL,
  `build_up_area` float NOT NULL,
  `carpet_area` float NOT NULL,
  `furnished_status` varchar(255) NOT NULL,
  `car_parking` varchar(255) NOT NULL,
  `floor` int(11) NOT NULL,
  `total_floor` int(11) NOT NULL,
  `facing` varchar(255) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `monthly_maintenance` float NOT NULL,
  `security_deposit` float NOT NULL,
  `location` varchar(255) NOT NULL,
  `landmarks` varchar(255) NOT NULL,
  `age_of_construction` int(11) NOT NULL,
  `available_since` varchar(255) NOT NULL,
  `available_to` int(11) NOT NULL,
  `date_added` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`id`,`slug`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
