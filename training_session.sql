-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2021 at 07:04 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `outridersports`
--

-- --------------------------------------------------------

--
-- Table structure for table `training_session`
--

CREATE TABLE `training_session` (
  `id` int(11) NOT NULL,
  `trainingDay` varchar(250) NOT NULL,
  `trainingTime` time NOT NULL,
  `trainingVenue` varchar(250) NOT NULL,
  `teamName` varchar(250) NOT NULL,
  `trainerName` varchar(250) NOT NULL,
  `trainerEmail` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `training_session`
--

INSERT INTO `training_session` (`id`, `trainingDay`, `trainingTime`, `trainingVenue`, `teamName`, `trainerName`, `trainerEmail`) VALUES
(1, 'Monday', '04:00:00', 'Mark Arthur Hall', 'Blanders', 'Ebo Kasim', 'mark.asw@gmail'),
(2, 'Tuesday', '00:00:00', 'Elwalk Sports Stadium', 'North Warriors', 'Theresa Balm', 'balm122@yahoo.com'),
(3, 'Tuesday', '14:00:00', 'Tank Court Tema', 'Blazzers', 'Ebo Cobina', 'ebocobb@yahoo.com'),
(5, 'Wednesday', '15:00:00', 'Lincon Trade Field', 'Blazzers', 'Micheal Asempa', 'asempa112@yahoo.com'),
(6, 'Tuesday', '16:00:00', 'Elwalk Sports Stadium', 'North Warriors', 'Theresa Balm', 'balm122@yahoo.com'),
(7, 'Tuesday', '12:00:00', 'Tank Court Tema', 'Highlanders', 'Ebo Cobina', 'ebocobb@yahoo.com'),
(10, 'Tuesday', '14:30:00', 'Tank Court Tema', 'West Arrivers', 'Adrain Nervel', 'nervel@yahoo.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `training_session`
--
ALTER TABLE `training_session`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `training_session`
--
ALTER TABLE `training_session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
