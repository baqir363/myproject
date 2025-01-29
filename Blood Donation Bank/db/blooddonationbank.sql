-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2025 at 03:59 AM
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
-- Database: `blooddonationbank`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `cnic` varchar(45) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `userrole` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `cnic`, `password`, `designation`, `userrole`) VALUES
(1, 'mohsin', '32102321321', 'qwe', 'qwe', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `donors`
--

CREATE TABLE `donors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `bloodgroup` text DEFAULT NULL,
  `contact` varchar(45) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `donationmonth` varchar(45) DEFAULT NULL,
  `donationyear` year(4) DEFAULT NULL,
  `currtime` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donors`
--

INSERT INTO `donors` (`id`, `name`, `bloodgroup`, `contact`, `date`, `donationmonth`, `donationyear`, `currtime`) VALUES
(1, 'Muhammad Baqir', 'B+ve', '03345126006', NULL, NULL, NULL, NULL),
(2, 'qwe', 'B+ve', '123', NULL, NULL, NULL, NULL),
(3, 'ewq', 'A+ve', '321', '2024-05-09', 'May', '2024', '07:02:59');

-- --------------------------------------------------------

--
-- Table structure for table `studentuser`
--

CREATE TABLE `studentuser` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `cnic` varchar(45) DEFAULT NULL,
  `rollno` varchar(45) DEFAULT NULL,
  `department` varchar(45) DEFAULT NULL,
  `program` varchar(45) DEFAULT NULL,
  `semester` varchar(11) DEFAULT NULL,
  `bloodgroup` varchar(11) DEFAULT NULL,
  `dob` varchar(11) DEFAULT NULL,
  `userrole` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `studentuser`
--

INSERT INTO `studentuser` (`id`, `name`, `cnic`, `rollno`, `department`, `program`, `semester`, `bloodgroup`, `dob`, `userrole`) VALUES
(1, 'baqir', '32102123123', '07', 'it', 'iet', '6', 'B+ve', '01/04/1995', 'Voter');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donors`
--
ALTER TABLE `donors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studentuser`
--
ALTER TABLE `studentuser`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `donors`
--
ALTER TABLE `donors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `studentuser`
--
ALTER TABLE `studentuser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
