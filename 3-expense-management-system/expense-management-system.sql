-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2023 at 06:07 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `expense-management-system`
--

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `amount` int(30) NOT NULL,
  `date` varchar(30) NOT NULL,
  `category` varchar(30) NOT NULL,
  `reading_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `email`, `amount`, `date`, `category`, `reading_time`) VALUES
(1, 'ganesh@gmail.com', 20, '2023-01-16', 'Food', '2023-01-15 10:34:16'),
(2, 'ganesh@gmail.com', 150, '2023-01-09', 'Food', '2023-01-15 12:24:00'),
(3, 'ganesh@gmail.com', 2, '2023-01-08', 'Medicine', '2023-01-15 12:42:22'),
(4, 'ganesh@gmail.com', 1000, '2023-01-02', 'House Rent', '2023-01-15 12:42:40'),
(5, 'ganesh@gmail.com', 8, '2023-01-11', 'Household things', '2023-01-15 12:44:28'),
(6, 'ganesh@gmail.com', 20, '2023-01-18', 'Clothing', '2023-01-15 12:44:51'),
(7, 'ganesh@gmail.com', 100, '2023-01-02', 'Entertainment', '2023-01-15 12:45:09'),
(8, 'ganesh@gmail.com', 500, '2023-01-17', 'Mobile Recharge', '2023-01-15 12:45:29'),
(9, 'ganesh@gmail.com', 200, '2023-01-10', 'Others', '2023-01-15 12:45:51'),
(10, 'nishitha@gmail.com', 120, '2023-01-09', 'Food', '2023-01-15 16:56:47'),
(11, 'nishitha@gmail.com', 20, '2023-01-01', 'House Rent', '2023-01-15 16:57:49');

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE `income` (
  `id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `amount` int(10) NOT NULL,
  `date` varchar(30) NOT NULL,
  `description` varchar(50) NOT NULL,
  `reading_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `income`
--

INSERT INTO `income` (`id`, `email`, `amount`, `date`, `description`, `reading_time`) VALUES
(1, 'ganesh@gmail.com', 5000, '2023-01-16', 'salary', '2023-01-15 09:55:18'),
(2, 'ganesh@gmail.com', 2000, '2023-01-09', 'packet money', '2023-01-15 10:21:23'),
(3, 'ganesh@gmail.com', 1000, '2023-01-09', 'asd', '2023-01-15 10:37:31'),
(4, 'ganesh@gmail.com', 4000, '2023-01-02', 'bonus', '2023-01-15 12:43:22'),
(5, 'ganesh@gmail.com', 2000, '2023-01-10', 'salary', '2023-01-15 12:51:46'),
(6, 'ganesh@gmail.com', 3000, '2023-01-25', 'parent give', '2023-01-15 12:52:37'),
(7, 'nishitha@gmail.com', 6000, '2023-01-10', 'salary', '2023-01-15 16:57:20');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `register_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `first_name`, `last_name`, `email`, `password`, `register_time`) VALUES
(1, 'ganeshan', 'kumaran', 'ganesh@gmail.com', '12345', '2023-01-14 19:20:04'),
(2, 'nishitha', 'D', 'nishitha@gmail.com', '1234', '2023-01-14 08:18:13'),
(3, 'nishitha', 'D', 'nishitha@gmail.com', '1234', '2023-01-14 08:25:22'),
(4, 'ramya', 'loosu', 'ramya@gmail.com', 'ramya', '2023-01-14 08:33:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `income`
--
ALTER TABLE `income`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `income`
--
ALTER TABLE `income`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
