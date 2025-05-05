-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 05, 2025 at 11:07 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Kiran`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `name`) VALUES
(1, 'Kiranthapa1234', 'Kiran@1996', 'Kiran Thapa');

-- --------------------------------------------------------

--
-- Table structure for table `contact_form`
--

CREATE TABLE `contact_form` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `Date_Time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_form`
--

INSERT INTO `contact_form` (`id`, `name`, `email`, `message`, `Date_Time`) VALUES
(1, 'Kiran Thapa', 'surveykiran64@gmail.com', 'Very disgusting customer service.', '2024-04-07 15:26:26'),
(2, 'Kiran Thapa', 'surveykiran64@gmail.com', 'Delievery boy had not arrived till now.please send him quickly.', '2024-04-12 03:42:07'),
(3, 'Riya Thapa', 'riya@gmail.com', 'My order is not reached till now.', '2024-04-13 07:25:39'),
(4, 'Kiran Thapa', 'surveykiran64@gmail.com', 'not reached my food item till now', '2024-04-13 07:28:28'),
(5, 'Kiran Thapa', 'surveykiran64@gmail.com', 'Why it is so late.', '2024-04-13 07:30:03'),
(6, 'Kiran Thapa', 'surveykiran64@gmail.com', 'kljklj', '2024-04-13 07:31:30'),
(7, 'Kiran Thapa', 'surveykiran64@gmail.com', 'klasjkldjasdkas', '2024-04-13 07:32:24'),
(8, 'Roshani Sharma', 'surveykiran64@gmail.com', 'I have not received my order till now.', '2024-05-16 10:04:52'),
(9, 'Kiran Kumar Thapa', 'surveykiran64@gmail.com', 'Hi, What&#039;s up ...!!!', '2025-04-09 10:33:24');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_data`
--

CREATE TABLE `teacher_data` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone_number` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher_data`
--

INSERT INTO `teacher_data` (`ID`, `name`, `email`, `password`, `phone_number`) VALUES
(1, 'Kiran Thapa', 'surveykiran64@gmail.com', '$2y$10$KmQFGSCcKJ2mf25060gDj.jdXu6kUxXX4gtei171l4DdiPkkdXl/i', '9824212980');

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE `user_data` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone_number` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`ID`, `name`, `email`, `password`, `phone_number`) VALUES
(33, 'Kiran Kumar Thapa', 'gorkhalihoma1234@gmail.com', '$2y$10$egMAw8h9FRTNzP.gkBbNjOgwjt5l.uXmuCnoZks6WYfRbqZRSWOkW', '9824212980'),
(34, 'Karan Gurung', 'surveykiran64@gmail.com', '$2y$10$fhSStIGizh835xYFT/zcne4xESxE41zz19.ZnE7s7w.GvGoHOjECS', '9824212980'),
(35, 'Kiran Gurung', 'gurungkiran64@gmail.com', '$2y$10$UzKgRNLbgVB8suRpZlEzweFKEfQydL3FbdhfR7zsAfrKk55jKT7hG', '9824212980'),
(36, 'Ritika Thapa', 'Ritika1234@gmail.com', '$2y$10$A2fbfnR6KnxoaT9AFAzl6O4O3i4l0Liw4dZPA2fBc80c40EdN81AO', '9815260524'),
(37, 'Raman Thapa', 'Raman1234@gmail.com', '$2y$10$9.nHCC5VuqtfLEA1cdwxTOaeuiENZyX.kprEVtvcRjHC1cY5RUOVm', '9815260521'),
(38, 'Ritika Thapa', 'Ritik1234@gmail.com', '$2y$10$LyZQvgLUIWY1nhXltPy1Eu34V1oAcPnrA4r5s60lIfjLDtrf8TYgO', '9824212981');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_form`
--
ALTER TABLE `contact_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_data`
--
ALTER TABLE `teacher_data`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_form`
--
ALTER TABLE `contact_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `teacher_data`
--
ALTER TABLE `teacher_data`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_data`
--
ALTER TABLE `user_data`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
