-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2024 at 01:40 PM
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
-- Database: `php_assignment`
--

-- --------------------------------------------------------

--
-- Table structure for table `buses`
--

CREATE TABLE `buses` (
  `id` int(255) NOT NULL,
  `bus_number` varchar(30) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buses`
--

INSERT INTO `buses` (`id`, `bus_number`, `type`) VALUES
(1, 'HP72A', 'ac'),
(2, 'HP72b', 'non ac'),
(3, 'hr 20c', 'ac');

-- --------------------------------------------------------

--
-- Table structure for table `bus_routes`
--

CREATE TABLE `bus_routes` (
  `id` int(10) NOT NULL,
  `route_id` int(100) NOT NULL,
  `bus_id` int(100) NOT NULL,
  `departure_time` varchar(20) NOT NULL,
  `available_seats` int(50) NOT NULL,
  `ticket_price` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bus_routes`
--

INSERT INTO `bus_routes` (`id`, `route_id`, `bus_id`, `departure_time`, `available_seats`, `ticket_price`) VALUES
(1, 1, 1, '7:00AM', 45, '111'),
(2, 1, 2, '8:00AM', 40, '132'),
(3, 2, 1, '5:00AM', 42, '155'),
(4, 5, 2, '1:00AM', 40, '125');

-- --------------------------------------------------------

--
-- Table structure for table `routes`
--

CREATE TABLE `routes` (
  `route_id` int(255) NOT NULL,
  `from` varchar(50) NOT NULL,
  `to` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `routes`
--

INSERT INTO `routes` (`route_id`, `from`, `to`) VALUES
(1, 'una', 'shimla'),
(2, 'shimla', 'una'),
(3, 'chandigarh', 'dehli'),
(4, 'delhi', 'una'),
(5, 'una', 'chd');

-- --------------------------------------------------------

--
-- Table structure for table `seets1`
--

CREATE TABLE `seets1` (
  `id` int(255) NOT NULL,
  `seet_name` varchar(30) NOT NULL,
  `bus_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seets1`
--

INSERT INTO `seets1` (`id`, `seet_name`, `bus_id`) VALUES
(1, '1a', 1),
(2, '2a', 1),
(3, '3a', 1),
(4, '4a', 1),
(5, '5a', 1),
(6, '6a', 1),
(7, '7a', 1),
(8, '8a', 1),
(9, '9a', 1),
(10, '10a', 1),
(11, '1b', 2),
(14, '2a', 2),
(15, '3a', 2),
(16, '4a', 2),
(17, '5a', 2),
(18, '6a', 2),
(19, '7a', 2),
(20, '8a', 2),
(21, '9a', 2),
(22, '10a', 2),
(23, '1a', 3),
(24, '2a', 3),
(25, '3a', 3),
(26, '4a', 3),
(27, '5a', 3),
(28, '6a', 3),
(29, '7a', 3),
(30, '8a', 3),
(31, '9a', 3),
(32, '10a', 3);

-- --------------------------------------------------------

--
-- Table structure for table `seet_booking`
--

CREATE TABLE `seet_booking` (
  `id` int(100) NOT NULL,
  `seet_id` int(100) NOT NULL,
  `bus_id` int(10) NOT NULL,
  `route_id` int(10) NOT NULL,
  `user_id` int(5) NOT NULL,
  `book_date` date NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `name` text NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buses`
--
ALTER TABLE `buses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bus_number` (`bus_number`);

--
-- Indexes for table `bus_routes`
--
ALTER TABLE `bus_routes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `abcd_fk` (`bus_id`),
  ADD KEY `asffff_)fk` (`route_id`);

--
-- Indexes for table `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`route_id`);

--
-- Indexes for table `seets1`
--
ALTER TABLE `seets1`
  ADD PRIMARY KEY (`id`),
  ADD KEY `busidfk` (`bus_id`);

--
-- Indexes for table `seet_booking`
--
ALTER TABLE `seet_booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shshsh_fk` (`bus_id`),
  ADD KEY `sduifbef_fk` (`route_id`),
  ADD KEY `fk_seet_id` (`seet_id`),
  ADD KEY `WAESDGB_FK` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buses`
--
ALTER TABLE `buses`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bus_routes`
--
ALTER TABLE `bus_routes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `routes`
--
ALTER TABLE `routes`
  MODIFY `route_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `seets1`
--
ALTER TABLE `seets1`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `seet_booking`
--
ALTER TABLE `seet_booking`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bus_routes`
--
ALTER TABLE `bus_routes`
  ADD CONSTRAINT `abcd_fk` FOREIGN KEY (`bus_id`) REFERENCES `buses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `asffff_)fk` FOREIGN KEY (`route_id`) REFERENCES `routes` (`route_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `seets1`
--
ALTER TABLE `seets1`
  ADD CONSTRAINT `busidfk` FOREIGN KEY (`bus_id`) REFERENCES `buses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `seet_booking`
--
ALTER TABLE `seet_booking`
  ADD CONSTRAINT `fk_seet_id` FOREIGN KEY (`seet_id`) REFERENCES `seets1` (`id`),
  ADD CONSTRAINT `sduifbef_fk` FOREIGN KEY (`route_id`) REFERENCES `routes` (`route_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `shshsh_fk` FOREIGN KEY (`bus_id`) REFERENCES `seets1` (`bus_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
