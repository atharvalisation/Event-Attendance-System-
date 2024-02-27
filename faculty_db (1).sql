-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2024 at 11:56 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `faculty_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `day_five`
--

CREATE TABLE `day_five` (
  `id` int(11) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `attendance` tinyint(1) NOT NULL DEFAULT 0,
  `faculty_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `day_four`
--

CREATE TABLE `day_four` (
  `id` int(11) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `attendance` tinyint(1) NOT NULL DEFAULT 0,
  `faculty_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `day_one`
--

CREATE TABLE `day_one` (
  `id` int(11) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `faculty_name` varchar(255) NOT NULL,
  `attendance` tinyint(1) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `day_one`
--

INSERT INTO `day_one` (`id`, `faculty_id`, `faculty_name`, `attendance`, `timestamp`) VALUES
(33, 46, 'Record 1', 0, '2023-12-28 11:29:30'),
(34, 47, 'Record 2', 0, '2023-12-28 11:29:30'),
(35, 48, 'Record 3', 0, '2023-12-28 11:29:30'),
(36, 49, 'Record 4', 0, '2023-12-28 11:29:30'),
(37, 50, 'Record 5', 0, '2023-12-28 11:29:30'),
(38, 52, 'Record 6', 1, '2023-12-28 11:55:39'),
(39, 53, 'Record 7', 1, '2023-12-28 12:27:47'),
(40, 54, 'Record 8', 1, '2023-12-28 12:33:51'),
(41, 55, 'Record 9', 1, '2023-12-28 12:35:36'),
(42, 56, 'Record 10', 1, '2023-12-28 15:44:13'),
(43, 57, 'Record 11', 1, '2024-01-31 10:26:46');

-- --------------------------------------------------------

--
-- Table structure for table `day_six`
--

CREATE TABLE `day_six` (
  `id` int(11) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `attendance` tinyint(1) NOT NULL DEFAULT 0,
  `faculty_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `day_three`
--

CREATE TABLE `day_three` (
  `id` int(11) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `attendance` tinyint(1) NOT NULL DEFAULT 0,
  `faculty_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `day_two`
--

CREATE TABLE `day_two` (
  `id` int(11) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `attendance` tinyint(1) NOT NULL DEFAULT 0,
  `faculty_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faculty_details`
--

CREATE TABLE `faculty_details` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `college` varchar(255) NOT NULL,
  `mobile_number` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL,
  `kit_provided` enum('Yes','No') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `faculty_details`
--

INSERT INTO `faculty_details` (`id`, `name`, `college`, `mobile_number`, `email`, `role`, `kit_provided`) VALUES
(46, 'Record 1', 'GPM', '08208557692', 'atharvamane44@gmail.com', 'Student', 'Yes'),
(47, 'Record 2', 'GPM', '08208557692', 'atharvamane44@gmail.com', 'Student', 'Yes'),
(48, 'Record 3', 'GPM', '08208557692', 'atharvamane44@gmail.com', 'Student', 'No'),
(49, 'Record 4', 'GPM', '08208557692', 'atharvamane44@gmail.com', 'Student', 'Yes'),
(50, 'Record 5', 'GPM', '08208557692', 'atharvamane44@gmail.com', 'Student', 'No'),
(52, 'Record 6', 'GPM', '08208557692', 'atharvamane44@gmail.com', 'Student', 'Yes'),
(53, 'Record 7', 'GPM ', '08208557692 ', 'atharvamane44@gmail.com', 'Student ', 'Yes'),
(54, 'Record 8', 'GPM ', '08208557692 ', 'atharvamane44@gmail.com', 'faculty', 'Yes'),
(55, 'Record 9', 'GPM ', '08208557692 ', 'atharvamane44@gmail.com', 'faculty', 'Yes'),
(56, 'Record 10', 'GPM ', '08208557692 ', 'atharvamane44@gmail.com', 'faculty', 'No'),
(57, 'Record 11', '11', '11', 'atharva@mail.com', 'faculty', 'Yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `day_five`
--
ALTER TABLE `day_five`
  ADD PRIMARY KEY (`id`),
  ADD KEY `faculty_id` (`faculty_id`);

--
-- Indexes for table `day_four`
--
ALTER TABLE `day_four`
  ADD PRIMARY KEY (`id`),
  ADD KEY `faculty_id` (`faculty_id`);

--
-- Indexes for table `day_one`
--
ALTER TABLE `day_one`
  ADD PRIMARY KEY (`id`),
  ADD KEY `faculty_id` (`faculty_id`);

--
-- Indexes for table `day_six`
--
ALTER TABLE `day_six`
  ADD PRIMARY KEY (`id`),
  ADD KEY `faculty_id` (`faculty_id`);

--
-- Indexes for table `day_three`
--
ALTER TABLE `day_three`
  ADD PRIMARY KEY (`id`),
  ADD KEY `faculty_id` (`faculty_id`);

--
-- Indexes for table `day_two`
--
ALTER TABLE `day_two`
  ADD PRIMARY KEY (`id`),
  ADD KEY `faculty_id` (`faculty_id`);

--
-- Indexes for table `faculty_details`
--
ALTER TABLE `faculty_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `day_five`
--
ALTER TABLE `day_five`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `day_four`
--
ALTER TABLE `day_four`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `day_one`
--
ALTER TABLE `day_one`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `day_six`
--
ALTER TABLE `day_six`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `day_three`
--
ALTER TABLE `day_three`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `day_two`
--
ALTER TABLE `day_two`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faculty_details`
--
ALTER TABLE `faculty_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `day_five`
--
ALTER TABLE `day_five`
  ADD CONSTRAINT `day_five_ibfk_1` FOREIGN KEY (`faculty_id`) REFERENCES `faculty_details` (`id`);

--
-- Constraints for table `day_four`
--
ALTER TABLE `day_four`
  ADD CONSTRAINT `day_four_ibfk_1` FOREIGN KEY (`faculty_id`) REFERENCES `faculty_details` (`id`);

--
-- Constraints for table `day_one`
--
ALTER TABLE `day_one`
  ADD CONSTRAINT `day_one_ibfk_1` FOREIGN KEY (`faculty_id`) REFERENCES `faculty_details` (`id`);

--
-- Constraints for table `day_six`
--
ALTER TABLE `day_six`
  ADD CONSTRAINT `day_six_ibfk_1` FOREIGN KEY (`faculty_id`) REFERENCES `faculty_details` (`id`);

--
-- Constraints for table `day_three`
--
ALTER TABLE `day_three`
  ADD CONSTRAINT `day_three_ibfk_1` FOREIGN KEY (`faculty_id`) REFERENCES `faculty_details` (`id`);

--
-- Constraints for table `day_two`
--
ALTER TABLE `day_two`
  ADD CONSTRAINT `day_two_ibfk_1` FOREIGN KEY (`faculty_id`) REFERENCES `faculty_details` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
