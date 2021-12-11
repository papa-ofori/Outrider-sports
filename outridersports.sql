-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2021 at 07:39 AM
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
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `event_name` varchar(50) NOT NULL,
  `sports` varchar(50) NOT NULL,
  `event_venue` varchar(200) NOT NULL,
  `event_date` date NOT NULL,
  `event_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `event_name`, `sports`, `event_venue`, `event_date`, `event_time`) VALUES
(1, 'Sprite Ball ', 'Basketball', 'Dansoman SNNIT court ', '2021-11-03', '10:00:00'),
(2, 'Omo Fantastic Five', 'Football', 'West Legon Astros', '2021-11-07', '16:00:00'),
(3, 'Board game ', 'Table Tennis', 'Drezel Center Accra', '2021-11-11', '09:00:00'),
(4, 'Rack-Two', 'Tennis', 'Team Adan Center', '2021-11-13', '12:00:00'),
(5, 'Brief Eleven ', 'Football', 'Zulka Sports', '2021-11-16', '18:00:00'),
(6, 'Net Speed', 'Hand ball', 'Avail Park Spintex', '2021-11-26', '16:00:00'),
(7, 'Tracido', 'Track Events', 'Elwalk Sports Stadium ', '2021-11-30', '09:00:00'),
(8, 'Triple Double', 'Basketball', 'Tema Jucan Court ', '2021-12-01', '13:00:00'),
(9, 'Cold Sprint', 'Track Events', 'Elwalk Sports Stadium', '2021-12-13', '10:00:00'),
(10, 'Outrider Together ', 'All our present sports', 'Elwalk Sport Stadium', '2021-12-24', '09:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `registered_students_athletes`
--

CREATE TABLE `registered_students_athletes` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `emailAdress` varchar(50) NOT NULL,
  `dateofBirth` date NOT NULL,
  `gender` varchar(50) NOT NULL,
  `school` varchar(250) NOT NULL,
  `sports` varchar(250) NOT NULL,
  `user_password` varchar(250) NOT NULL,
  `trainerID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registered_students_athletes`
--

INSERT INTO `registered_students_athletes` (`id`, `username`, `emailAdress`, `dateofBirth`, `gender`, `school`, `sports`, `user_password`, `trainerID`) VALUES
(3, 'Papa Kwame Ofori-Asante', 'kwamepapa841@gmail.com', '2001-12-09', 'male', 'Ashesi', 'Basketball', '12345678', 2),
(5, 'Tainna Wilson', 'Tan12Wilson@yahoo.co', '1999-01-04', 'female', 'University of Ghana', 'Football', 'qazxswedc', 3),
(6, 'Fayde Abdulai', 'faydeabdulai@gmail.c', '2021-05-20', 'female', 'University of Ghana', 'badminton', 'poilkjmnb', 4),
(7, 'Kataale Abdulai', 'katAdbulai1123@yahoo.com', '2021-12-12', 'female', 'Faith Montessori', 'Basketball', 'tgbyhnujm123', 1),
(8, 'Chudah Yakung', 'chudah.yakks@gmail.com', '2002-01-10', 'male', 'Ghana International school', 'Tennis', 'plmoknijb', 5),
(12, 'Tensa Killson', 'tensathegee@yahoo.com', '1999-12-14', 'female', 'Accra Girls', 'Basketball', 'qwertyuiopl,mnbvcxzaq', 6),
(13, 'Afia Kumah', 'efyakujm@yahoo.com', '2001-12-30', 'female', 'Ashesi', 'Track Events', '1qazxsw23edcvfr4', 7),
(16, 'Abena Antwi', 'abena.antwi@ug.edu.gh', '1999-05-28', 'female', 'University of Ghana', 'Track Events', 'zxcvbnmasdfghjkl', 5),
(17, 'Ellen Johnson', 'ellenJohnson@edu.gh', '2000-11-30', 'female', 'Ghana International school', 'Tennis', 'qazxswedc', 4),
(18, 'Serena Amoah', 'serenaas78@yahoo.com', '2001-12-22', 'female', 'Ghana National College', 'football', 'plmoknijb', 3),
(19, 'Kofi Sannie Amosah', 'kofi.amosah@ashesi.edu.gh', '2021-04-27', 'male', 'Ashesi', 'Basketball', 'abcdefghijk', 3);

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
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registered_students_athletes`
--
ALTER TABLE `registered_students_athletes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `training_session`
--
ALTER TABLE `training_session`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `registered_students_athletes`
--
ALTER TABLE `registered_students_athletes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `training_session`
--
ALTER TABLE `training_session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
