-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2025 at 04:01 AM
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
-- Database: `todoapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `task_description` text DEFAULT NULL,
  `task_date` date DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `task_added_by_id` int(11) DEFAULT NULL,
  `task_added_on_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `task_description`, `task_date`, `status`, `task_added_by_id`, `task_added_on_date`) VALUES
(1, 'Go to university at 8 AM sharp', '2024-04-30', 'Pending', 1, '2024-04-29'),
(2, 'kjhklhjkhhj', '2024-04-29', 'Pending', 1, '2024-04-29'),
(3, 'internship tomorrow', '2024-11-04', 'Accomplished', 1, '2024-11-04'),
(4, 'intership', '2024-11-11', 'Accomplished', 1, '2024-11-10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `usersname` varchar(255) DEFAULT NULL,
  `email_address` text DEFAULT NULL,
  `password` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `usersname`, `email_address`, `password`) VALUES
(1, 'baqir', 'baqir@live.com', 'f10e2821bbbea527ea02200352313bc059445190'),
(2, 'amir', 'amir@live.com', '1dd89e5367785ba89076cd264daac0464fdf0d7b'),
(3, 'malkani', 'malkani@live.com', 'f86a6467ac8d85fe112fac9286bc94255f6017b0'),
(4, 'Balooch', 'balooch@khan.com', 'f96a403bab7cd1e06da04c124d4e77bb336574d4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_address` (`email_address`) USING HASH;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
