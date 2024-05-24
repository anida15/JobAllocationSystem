-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 27, 2024 at 12:05 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `job-allocation`
--

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `task_id` int(11) NOT NULL,
  `profession` varchar(100) NOT NULL,
  `task_name` varchar(600) NOT NULL,
  `number_of_works` varchar(100) NOT NULL,
  `task_description` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`task_id`, `profession`, `task_name`, `number_of_works`, `task_description`, `timestamp`) VALUES
(81, 'Electrical Engineering', 're', '34', 'rs', '2024-04-09 10:44:01'),
(82, 'Service Engineering', '53', '535', 'sfsf', '2024-04-09 10:44:33');

-- --------------------------------------------------------

--
-- Table structure for table `task_allocated`
--

CREATE TABLE `task_allocated` (
  `task_allocated_id` int(11) NOT NULL,
  `user_id` varchar(100) DEFAULT NULL,
  `task_title` varchar(600) DEFAULT NULL,
  `task_description` text DEFAULT NULL,
  `price` varchar(1000) DEFAULT NULL,
  `task_completion_status` varchar(100) DEFAULT NULL,
  `task_id` varchar(100) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `task_allocated`
--

INSERT INTO `task_allocated` (`task_allocated_id`, `user_id`, `task_title`, `task_description`, `price`, `task_completion_status`, `task_id`, `timestamp`) VALUES
(648, '12', 're', 'rs', NULL, 'NO', '81', '2024-04-09 10:44:05'),
(649, '11', 're', 'rs', NULL, 'NO', '81', '2024-04-09 10:44:05'),
(650, '2', '53', 'sfsf', NULL, 'NO', '82', '2024-04-09 10:44:33'),
(651, '10', '53', 'sfsf', NULL, 'NO', '82', '2024-04-09 10:44:33'),
(652, '15', '53', 'sfsf', NULL, 'NO', '82', '2024-04-09 10:44:33'),
(653, '3', '53', 'sfsf', NULL, 'NO', '82', '2024-04-09 10:44:33'),
(654, '6', '53', 'sfsf', NULL, 'NO', '82', '2024-04-09 10:44:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `profession` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(110) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `profession`, `password`, `user_type`, `created_at`) VALUES
(1, 'admin', 'Administrator', '$2y$10$rE3k385ItecIz7eggzEzW.ay3/DMjCAdGVLZ5ykWiQy53aXzQoazC', 'Admin', '2024-01-31 12:35:51'),
(2, 'user1', 'Service Engineering', '$2y$10$rE3k385ItecIz7eggzEzW.ay3/DMjCAdGVLZ5ykWiQy53aXzQoazC', 'standard', '2024-01-31 12:35:51'),
(3, 'user2', 'Service Engineering', 'password2', 'standard', '2024-01-31 12:35:51'),
(6, 'user5', 'Service Engineering', 'password5', 'standard', '2024-01-31 12:35:51'),
(7, 'user6', 'Electrical Engineering', 'password6', 'standard', '2024-01-31 12:35:51'),
(10, 'user9', 'Service Engineering', 'password9', 'standard', '2024-01-31 12:35:51'),
(11, 'user10', 'Electrical Engineering', 'password10', 'standard', '2024-01-31 12:35:51'),
(12, 'user11', 'Electrical Engineering', 'password11', 'standard', '2024-01-31 12:35:51'),
(13, 'user12', 'Computer Engineering', 'password12', 'standard', '2024-01-31 12:35:51'),
(14, 'user13', 'Mechanical Engineering', 'password13', 'standard', '2024-01-31 12:35:51'),
(15, 'user14', 'Service Engineering', 'password14', 'standard', '2024-01-31 12:35:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`task_id`);

--
-- Indexes for table `task_allocated`
--
ALTER TABLE `task_allocated`
  ADD PRIMARY KEY (`task_allocated_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `task_allocated`
--
ALTER TABLE `task_allocated`
  MODIFY `task_allocated_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=655;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
